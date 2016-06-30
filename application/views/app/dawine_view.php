<div id="wrapperApplication" class="container-fluid"></div>
<!-- template section starts -->
<script type="text/x-kendo-template" id="layout">
	<div id="menu"></div>			
	<div id="content" class="row-fluid"></div>
</script>
<script type="text/x-kendo-template" id="blank-tmpl">
</script>
<script type="text/x-kendo-template" id="menu-tmpl">
	<div class="menu-hidden sidebar-hidden-phone fluid menu-left hidden-print">
		<div class="navbar main" id="main-menu">
			<ul class="topnav">
				<li class="dropdown dd-1 span3">
					<a href="\#" class="dropdown-toggle brand" data-toggle="dropdown" id="brand-menu">BanhJi <span id="current-section"></span></a>
					<ul class="dropdown-menu" id="dropdownMenu">
						<li id="home-menu"><a href="#/">គេហទំព័រ</a></li>
						<li id="customer-menu"><a href="#/customers">អតិថិជន</a></li>
						<li id="vendor-menu"><a href="#/vendors">អក្នផ្គត់ផ្គង់</a></li>
						<li id="account-menu"><a href="#/accounts">គណនេយ្យ</a></li>
						<li id="account-menu"><a href="#/inventories">សន្និធិ</a></li>
						<li id="water-menu"><a href="#/cashier">បេឡាករ</a></li>
						<li id="electricity-menu"><a href="#/electricity">អគ្គីសនី</a></li>
						<li id="water-menu"><a href="#/water">ទឹកស្អាត</a></li>
						<li class="divider"></li>
						<li id="myac-menu"><a href="#/my">គណនីខ្ញុំ</a></li>
		        	</ul>
		        </li>
			</ul>
			<ul class="topnav pull-right">
				<li>
					<a data-bind="attr: {href: page}"><span data-bind="text: getLogin().username"></span></a>
				</li>
				<li><a href="#logout" data-bind="click: logout"><i class="icon-power-off"></i></a></li>
			</ul>
			<ul class="topnav" id="secondary-menu">
			</ul>
		</div>
	</div>
</script>
<script type="text/x-kendo-template" id="login-template">
 	<div class="container-960">
		<div class="row">
			<div class="span3 offset4">
				<label for="email">អីម៉ែល</label>
				<input type="email" placeholder="email" data-bind="value: username, events: {onmouseout: validateEmail}">
				<label for="password">លេខសំងាត់</label>
				<input type="password" placeholder="password" data-bind="value: password">
				<button class="btn btn-primary" data-bind="click: login">ចូល</button>
				<a data-bind="click: registerBtn">ចុះឈ្មោះ</a><br/>				
			</div>
		</div>
	</div>
</script>
<script type="text/x-kendo-template" id="signup-template">
 	<div class="container-960">
		<div class="row">
			<div class="span3 offset4">
				<label for="email">អីម៉ែល</label>
				<input type="email" placeholder="email" data-bind="value: username">
				<label for="password">លេខសំងាត់</label>
				<input type="password" placeholder="password" data-bind="value: password">
				<label for="password">វាយលេខសំងាត់ម្ដងែៀត</label>
				<input type="password" placeholder="password" data-bind="value: _password">
				<button class="btn" data-bind="click: signup">ចុះឈ្មោះ</button>
				<a data-bind="click: loginBtn">ចូល</a>
				<br/>				
			</div>
		</div>
	</div>
</script>
<script type="text/x-kendo-template" id="page">
	<div id="col1" class="span2">
		<ul class="nav nav-tabs nav-stacked">
			<li><a href="#/page/userlist">User List</a></li>
			<li><a href="#/page/password">Change Password</a></li>
		</ul>
	</div>
	<div id="col2" class="span10">
	</div>
</script>
<script type="text/x-kendo-template" id="page-admin">
	<div id="col1" class="span2">
		<ul class="nav nav-tabs nav-stacked">
			<li><a href="#/page/userlist">User List</a></li>
			<li><a href="#/page/password">Change Password</a></li>
		</ul>
	</div>
	<div id="col2" class="span10">
	</div>
</script>
<script type="text/x-kendo-template" id="page-admin-userlist">
	<span class="btn btn-success pull-right" data-bind="click: add"><i class="icon-plus"></i> បន្ថែបុគ្គលិក</span>
	<table class="table">
		<thead>
			<tr>
				<th>ឈ្មោះ</th>
				<th>សិទ្ធ</th>
				<th>...</th>
			</tr>
		</thead>
		<tbody
			data-role="listview" data-bind="source: dataStore" data-template="page-admin-userlist-template"
		></tbody>
	</table>
</script>
<script type="text/x-kendo-template" id="page-admin-userlist-template">
	<tr>
		<td>#:username#</td>
		<td>#:permission.name#</td>
		<td>
			<span class="btn btn-default" data-bind="click: editRight"><i class="icon-edit-sign"></i></span> 
			<span class="btn btn-default" data-bind="click: remove"><i class="icon-remove-sign"></i></span> 
		</td>
	</tr>
</script>
<script type="text/x-kendo-template" id="page-admin-userlist-add-template">
	<div class="span4 offset3">
		<label for="user">User</label>
		<input type="text" placeholder="user" data-bind="value: current.username"/>
		<label for="password">Password</label>
		<input type="password" placeholder="password" data-bind="value: current.password"/>
		<label for="role">Role</label>
		<input type="text" placeholder="role" 
			   data-role="dropdownlist" 
			   data-bind="source: roleDS, value: current.permission" 
			   data-text-field="name" 
			   data-value-field="id" />
		<button class="btn btn-success" data-bind="click: sync">កត់ត្រា</button>
		<button class="btn btn-default" data-bind="click: cancelAdd">Cancel</button>
	</div>
</script>
<script type="text/x-kendo-template" id="page-admin-userlist-edit-role-template">
	<div class="span4 offset3">
		<label for="role">Role</label>
		<input type="text" placeholder="role" 
			   data-role="dropdownlist" 
			   data-bind="source: roleDS, value: current.permission" 
			   data-text-field="name" 
			   data-value-field="id" />
		<button class="btn btn-success" data-bind="click: sync">កត់ត្រា</button>
		<button class="btn btn-default" data-bind="click: cancelAdd">Cancel</button>
	</div>
</script>
<script type="text/x-kendo-template" id="page-admin-userlist-password-template">
	<div class="span4 offset4">
		<label for="password">Password</label>
		<input type="password" placeholder="password" 
			   data-bind="value: password" />
		<label for="password">Confirm Password</label>
		<input type="password" placeholder="cpassword" 
			   data-bind="value: _password" /><br/>
		<button class="btn btn-success" data-bind="click: changePwd">កត់ត្រា</button>
		<button class="btn btn-default" data-bind="click: cancelAdd">Cancel</button>
	</div>
</script>
<script type="text/x-kendo-template" id="index">
	<div class="row">
		<div class="span6">
			<div class="row">
				<div class="span10" style="padding-left: 0; margin-left: 0; margin-top: 0;">
					<h4 style="margin-left: 35px; width: 450px;">ក្រុមហ៊ុន: <span data-bind="text: company_name"></span></h4>
					<ul id="module-image">
						<li style="text-align:center;">
							<a href="#/customers">
								<img src="<?php echo base_url(); ?>resources/img/Customer.png" alt="Customer">
							</a>
							<span style="margin-top: 5px; font-size: 14px; font-weight: bold; color: #000000">Customer</span>
						</li>						
						<li style="text-align:center;">
							<a href="#/item_center">
								<img src="<?php echo base_url(); ?>resources/img/Inventory.png" alt="Inventory">
							</a>
							<span style="margin-top: 5px; font-size: 14px; font-weight: bold; color: #000000">Inventory</span>
						</li>					
						<li style="text-align:center;">
							<a href="#/electricity">
								<img src="<?php echo base_url(); ?>resources/img/electricity.png" alt="Electricity">
							</a>
							<span style="margin-top: 5px; font-size: 14px; font-weight: bold; color: #000000">Electricity</span>
						</li>
						<li style="text-align:center;">
							<a href="#/water">
								<img src="<?php echo base_url(); ?>resources/img/water.png" alt="Water">
							</a>
							<span style="margin-top: 5px; font-size: 14px; font-weight: bold; color: #000000">Water</span>
						</li>
						<li style="text-align:center;">
							<a href="#/cashier">
								<img src="<?php echo base_url(); ?>resources/img/cashier.png" alt="Cashier">
							</a>
							<span style="margin-top: 5px; font-size: 14px; font-weight: bold; color: #000000">Cashier</span>
						</li>						
					</ul>
				</div>
			</div>	
		</div>		
	</div>		
</script>

<!-- DAWINE ==================================================================================================== -->
<!-- ***************************
 *	SME Section               *
**************************** -->
<script id="customerCenter" type="text/x-kendo-template">	
	<div class="widget widget-heading-simple widget-body-gray widget-employees">		
		<div class="widget-body padding-none">			
			<div class="row-fluid row-merge">
				<div class="span3 listWrapper" style="height: 700px;">
					<div class="innerAll">							
						<form autocomplete="off" class="form-inline">
							<div class="widget-search separator bottom">
								<button type="button" class="btn btn-default pull-right" data-bind="click: search"><i class="icon-search"></i></button>
								<div class="overflow-hidden">
									<input type="search" placeholder="អតិថិជន..." data-bind="value: searchText, events:{change: enterSearch}">
								</div>
							</div>
							<div class="select2-container" style="width: 100%;">								
																
							</div>
						</form>					
					</div>
					
					<span class="results"><span data-bind="text: contactDS.total"></span> នាក់</span>

					<div class="table table-condensed" style="height: 580px;"						 
						 data-role="grid" 
						 data-bind="source: contactDS"
						 data-auto-bind="false" 
						 data-row-template="customerCenter-customer-list-tmpl"
						 data-columns="[{title: ''}]"
						 data-selectable=true
						 data-height="600"						 
						 data-scrollable="{virtual: true}"></div>									
				</div>
				<div class="span9 detailsWrapper">
					<div class="row-fluid">					
						<div class="span6">
							<div class="widget widget-4 widget-tabs-icons-only margin-bottom-none">

							    <!-- Widget Heading -->
							    <div class="widget-head">

							        <!-- Tabs -->
							        <ul class="pull-right">
							            <li>Filter by</li>
							            <li class="glyphicons stats active"><span data-toggle="tab" data-target="#tab1-7"><i></i></span>
							            </li>
							            <li class="glyphicons riflescope"><span data-toggle="tab" data-target="#tab2-7"><i></i></span>
							            </li>							            
							            <li class="glyphicons circle_info"><span data-toggle="tab" data-target="#tab3-7"><i></i></span>
							            </li>							            
							            <li class="glyphicons pen"><span data-toggle="tab" data-target="#tab4-7"><i></i></span>
							            </li>
							            <li class="glyphicons edit"><span data-bind="click: goEditContact"><i></i></span>
							            </li>
							            <li class="glyphicons user_add"><a href="#/customer"><i></i></a>
							            </li>
							            <li class="glyphicons circle_plus"><span data-toggle="tab" data-target="#tab7-7"><i></i></span>
							            </li>							            
							        </ul>
							        <div class="clearfix"></div>
							        <!-- // Tabs END -->

							    </div>
							    <!-- Widget Heading END -->

							    <div class="widget-body">
							        <div class="tab-content">

							            <!-- GRAPH Tab content -->
							            <div id="tab1-7" class="tab-pane active box-generic">
							            	<div id="wUsage-graph" style="height: 180px;"></div>
							            </div>
							            <!-- // GRAPH Tab content END -->

							            <!-- SEARCH Tab content -->
							            <div id="tab2-7" class="tab-pane box-generic">
							                <input data-role="dropdownlist"
							                	   data-auto-bind="false"
						            			   data-option-label="(--- រើស ប្រភេទអតិថិជន ---)"					            			   		                   
								                   data-value-primitive="true"
								                   data-text-field="name"
								                   data-value-field="id"
								                   data-bind="value: contact_type_id,
								                              source: contactTypeDS"
								                   style="width: 100%"/>

							                <input data-role="dropdownlist"
						            			   data-option-label="(--- រើស រូបិយប័ណ្ណ ---)"					            			   		                   
								                   data-value-primitive="true"
								                   data-text-field="code"
								                   data-value-field="id"
								                   data-bind="value: currency_id,
								                              source: currencyDS"
								                   style="width: 100%"/>

								            <br><br>
								            <span class="btn btn-primary btn-icon glyphicons search pull-right" data-bind="click: search"><i></i>ស្វែងរក</span>
								            <br>
							            </div>
							            <!-- // SEARCH Tab content END -->							            

							            <!-- INFO Tab content -->
							            <div id="tab3-7" class="tab-pane box-generic">
							            	<div class="row-fluid">
								            	<div class="span6">
										
													<!-- Bio -->
													<div class="widget widget-heading-simple widget-body-gray margin-none">
														<div class="widget-head">
															<h4 class="heading glyphicons user"><i></i> <span data-bind="text: obj.wnumber"></span> <span data-bind="text: obj.fullname"></span></h4>
														</div>
														<div class="widget-body">
															<ul class="unstyled icons margin-none">
																<li class="glyphicons group"><i></i> ប្រភេទ៖ <span data-bind="text: obj.contact_type[0].name"></span></li>
																<li class="glyphicons phone"><i></i> ទូរស័ព្ទ៖ <span data-bind="text: obj.phone"></span></li>
																<li class="glyphicons envelope"><i></i> អុីម៉ែល៖ <span data-bind="text: obj.email"></li>
																<li class="glyphicons calendar"><i></i> ចុះឈ្មោះ៖ <span data-bind="text: obj.registered_date"></li>
															</ul>
														</div>
													</div>
													<!-- // Bio END -->
													
												</div>
												<div class="span6">
													<!-- Bio -->
													<div class="widget widget-heading-simple widget-body-gray margin-none">
														<div class="widget-head">
															<h4 class="heading glyphicons edit" data-bind="click: goEditContact"><i></i> កែប្រែ</h4>
														</div>
														<div class="widget-body">
															<p><i class="icon-home"></i> អាស័យដ្ឋាន៖ <span data-bind="text: obj.address"></span></p>
														</div>
													</div>
													<!-- // Bio END -->
												</div>
											</div>
							            </div>
							            <!-- // INFO Tab content END -->

							            <!-- NOTE Tab content -->
							            <div id="tab4-7" class="tab-pane box-generic">

										    <div class="chat-controls">															
												<form class="margin-none">
													<div class="row-fluid">
														<div class="span10">
															<input type="text" name="message" class="input-block-level margin-none" data-bind="value: note" placeholder="កំណត់សំគាល់ ...">
														</div>
														<div class="span2">
															<span class="btn btn-block btn-primary" data-bind="click: saveNote">កត់ត្រា</span>
														</div>
													</div>
												</form>															
											</div>

											<br>

									    	<div data-role="grid"
									    	 	 data-height="100"
					 							 data-scrollable="{virtual: true}"									                 
								                 data-row-template="customerCenter-note-tmpl"
								                 data-bind="source: noteDS"
								                 data-columns="[{title: ''}]"></div>
											
							            </div>
							            <!-- // NOTE Tab content END -->

							            <!-- INVOICE Tab content -->
							            <div id="tab7-7" class="tab-pane box-generic">
							            	<table class="table table-borderless table-condensed cart_total">
								            	<tr>
								            		<td>
								            			<span class="btn btn-block btn-inverse" data-bind="click: goEstimate">សម្រង់តម្លៃ</span>
								            		</td>
								            		<td>
								            			<span class="btn btn-block btn-inverse" data-bind="click: goInvoice">វិក្កយបត្រ</span>
								            		</td>
								            	</tr>
								            	<tr>
								            		<td>
								            			<span class="btn btn-block btn-inverse" data-bind="click: goSO">បញ្ជាលក់</span>
								            		</td>
								            		<td>
								            			<span class="btn btn-block btn-inverse" data-bind="click: goReceipt">បង្កាន់ដៃលក់</span>								            			
								            		</td>
								            	</tr>
								            	<tr>
								            		<td>
								            			<span class="btn btn-block btn-inverse" data-bind="click: goGDN">លិខិតដឹកទំនិញ</span>
								            		</td>
								            		<td>
								            			<span class="btn btn-block btn-inverse" data-bind="click: goStatement">បញ្ជីសមតុល្យ</span>
								            		</td>
								            	</tr>
							            	</table>
							            </div>
							            <!-- // INVOICE Tab content END -->								            

							        </div>
							    </div>
							</div>
						</div>

						<div class="span6">
							<div class="row-fluid">
								<div class="span6">
									<div class="widget-stats widget-stats-primary widget-stats-5" data-bind="click: loadBalance">
										<span class="glyphicons coins"><i></i></span>
										<span class="txt">សមតុល្យ<span data-bind="text: balance" style="font-size:medium;"></span></span>
										<div class="clearfix"></div>
									</div>
								</div>
								<div class="span6">
									<div class="widget-stats widget-stats-inverse widget-stats-5" data-bind="click: loadDeposit">
										<span class="glyphicons briefcase"><i></i></span>
										<span class="txt">ប្រាក់កក់<span data-bind="text: deposit" style="font-size:medium;"></span></span>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>							
							
							<div class="row-fluid">
								<div class="span6">
									<div class="widget-stats widget-stats-info widget-stats-5" data-bind="click: loadBalance">
										<span class="glyphicons circle_exclamation_mark"><i></i></span>
										<span class="txt"><span data-bind="text: outInvoice"></span> មិនទាន់ទូទាត់</span>
										<div class="clearfix"></div>
									</div>
								</div>
								<div class="span6">
									<div class="widget-stats widget-stats-default widget-stats-5" data-bind="click: loadOverInvoice">
										<span class="glyphicons turtle"><i></i></span>
										<span class="txt"><span data-bind="text: overInvoice"></span> ហួសកំណត់</span>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>														
						</div>											          	
		          	</div>
					
					<div>
						<input data-role="dropdownlist"                   
					           data-value-primitive="true"
					           data-text-field="text"
					           data-value-field="value"
					           data-bind="value: sorter,
					                      source: sortList,                              
					                      events: { change: sorterChanges }" />

						<input data-role="datepicker"
							   data-format="dd-MM-yyyy"
					           data-bind="value: sdate,
					                      events: { change: dateChanges }"
					           placeholder="ចាប់ពី" >

					    <input data-role="datepicker"
					    	   data-format="dd-MM-yyyy"
					           data-bind="value: edate,
					                      events: { change: dateChanges }"
					           placeholder="ដល់" >
					    
					    <button type="button" data-role="button" data-bind="click: searchTransaction"><i class="icon-search"></i></button>
					</div>

					<table class="table table-bordered table-striped table-white">
						<thead>
							<tr>
								<th>កាលបរិច្ឆេទ</th>
								<th>ប្រភេទប្រតិបត្តិការ</th>								
								<th>លេខយោង</th>
								<th>ទឹកប្រាក់</th>
								<th>ស្ថានភាព</th>
								<th>ធ្វើការ</th>
							</tr>
						</thead>	            		
	            		<tbody data-role="listview"
	            				data-auto-bind="false"	            					            					            					            			
				                data-template="customerCenter-transaction-tmpl"
				                data-bind="source: transactionDS" >
				        </tbody>
	            	</table>

	            	<div id="pager" class="k-pager-wrap"
				    	 data-auto-bind="false"
			             data-role="pager" data-bind="source: transactionDS"></div>	            	
				</div>
			</div>			
		</div>
	</div>		
</script>
<script id="customerCenter-customer-list-tmpl" type="text/x-kendo-tmpl">
	<tr data-bind="click: selectedRow">
		<td>
			<div class="media-body">
				<span class="strong">
					#=number# #=fullname#				
				</span>
			</div>
		</td>
	</tr>
</script>
<script id="customerCenter-transaction-tmpl" type="text/x-kendo-tmpl">
    <tr>    	  	
    	<td>#=kendo.toString(new Date(issued_date), "dd-MM-yyyy")#</td>
    	<td>
        	#if(type==="eInvoice"){#								
				វិក្កយបត្រអគ្គីសនី
			#}else if(type==="wInvoice"){#
				វិក្កយបត្រទឹក
			#}else if(type==="Receipt"){#
        		បង្កាន់ដៃលក់ជាសាច់ប្រាក់	       	        		
			#}else if(type==="SO"){#
        		បញ្ជាលក់
        	#}else if(type==="Estimate"){#        		
        		សម្រង់តម្លៃ
        	#}else if(type==="GDN"){#        		
        		លិខិតដឹកជញ្ជូន
        	#}else if(type==="Notice"){#
        		លិខិតរំលឹក
        	#}else if(type==="Payment"){#
        		បង់ប្រាក់
        	#}else if(type==="Deposit"){#
        		ប្រាក់កក់
        	#}else if(type==="edeposit"){#
        		ប្រាក់កក់អគ្គីសនី
        	#}else if(type==="wdeposit"){#
        		ប្រាក់កក់ទឹកស្អាត
        	#}else{#
        		វិក្កយបត្រ
        	#}#
        </td>
        <td>
        	#if(type==="Invoice"){#								
				<a href="\#/invoice/#=id#"><i></i> #=number#</a>	
			#}else if(type==="Receipt"){#
        		<a href="\#/receipt/#=id#"><i></i> #=number#</a>        	        		
			#}else if(type==="SO"){#
        		<a href="\#/so/#=id#"><i></i> #=number#</a>
        	#}else if(type==="Estimate"){#        		
        		<a href="\#/estimate/#=id#"><i></i> #=number#</a>
        	#}else if(type==="GDN"){#        		
        		<a href="\#/gdn/#=id#"><i></i> #=number#</a>
        	#}else if(type==="Notice"){#
        		#=number#
        	#}else if(type==="Payment"){#

        	#}else if(type==="wInvoice"){#        		
        		<a href="\#/wInvoice_print/#=id#"><i></i> #=number#</a>
        	#}else if(type==="edeposit"){#        		
        		<a href="\#/eDeposit/#=id#"><i></i> #=number#</a>
        	#}else if(type==="wdeposit"){#        		
        		<a href="\#/wDeposit/#=id#"><i></i> #=number#</a>
        	#}else{#
        		#=number#
        	#}#
        </td>
    	<td class="right">#=kendo.toString(amount*rate, locale=="km-KH"?"c0":"c", "c", locale)#</td>
    	<td>        	
        	#if(type==="Invoice" || type==="eInvoice" || type==="wInvoice"){#
        		#if(status==="0" || status==="2") {#
        			# var date = new Date(), dueDate = new Date(due_date).getTime(), toDay = new Date(date).getTime(); #
					#if(dueDate < toDay) {#
						លើសកំណត់ #:Math.floor((toDay - dueDate)/(1000*60*60*24))# ថ្ងៃ
					#} else {#
						#:Math.floor((dueDate - toDay)/(1000*60*60*24))# ថ្ងៃនឹងត្រូវទូទាត់
					#}#
				#} else {#
					ទូទាត់រួច
				#}#
        	#}else if(type==="SO" || type==="GDN"){#
        		#if(status==="0"){#
        			មិនទាន់រៀបចំ
        		#}else{#
        			រៀបចំរូច        			
        		#}#
        	#}else if(type==="Estimate"){#        		
        		#if(status==="0"){#
        			មិនទាន់យល់ព្រម
        		#}else{#
        			យល់ព្រម        			
        		#}#
        	#}#			
		</td>    	
    	<td align="center">
			#if(type==="Invoice"){#
				#if(status==="0" || status==="2"){#					
					<a href="\#/cashier/#=id#"><i></i> ទទួលប្រាក់</a>					
				#}#
			#}else if(type==="wInvoice"){#
        		#if(status==="0" || status==="2"){#
        			<a href="\#/cashier/#=id#"><i></i> ទទួលប្រាក់</a>
        		#}#
        	#}else if(type==="Notice"){#
        		#if(status==="0" || status==="2"){#
        			<a href="\#/cashier/#=id#"><i></i> ទទួលប្រាក់</a>
        		#}#
			#}else if(type==="SO"){#
        		#if(status==="0"){#
        			
        		#}#
        	#}else if(type==="Estimate"){#        		
        		#if(status==="0"){#
        			
        		#}#
        	#}else if(type==="GDN"){#        		
        		#if(status==="0"){#
        			
        		#}#
        	#}#
		</td>     	
    </tr>
</script>
<script id="customerCenter-note-tmpl" type="text/x-kendo-template">
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


<script id="customer" type="text/x-kendo-template">
	<div class="container-960">	
		<div class="row-fluid">		    
			<div class="span12">			
				<div id="example" class="k-content">

					<!-- Collapsible Widget -->			
					<div class="widget">
					    <div class="widget-head">
					    	<span class="btn btn-primary pull-right" 
									onclick="javascript:window.history.back()">X</span>
					        
					        <h4 class="heading glyphicons circle_info"><i></i> <a id="title"></a> </h4>							        	
					    </div>
					    <div class="widget-body">

					    	<div class="row-fluid">
					    		<div class="span6 well">									
									<div class="row-fluid">
										<div class="span6">														
											<!-- Group -->
											<div class="control-group">										
												<label for="ddlCustomerType">ប្រភេទអតិថិជន <span style="color:red">*</span></label>
												<input id="ddlCustomerType" name="ddlCustomerType"
													data-bind="value: obj.contact_type_id" 
													required data-required-msg="ត្រូវការ ប្រភេទអតិថិជន" style="width: 100%;" />									            
											</div>
											<!-- // Group END -->
										</div>

										<div class="span6">	
											<!-- Group -->
											<div class="control-group">							
												<label for="number">លេខកូដ <span style="color:red">*</span></label>
						              			<input id="number" name="number" class="k-textbox"
							              				data-bind="value: obj.number" 
							              				placeholder="e.g. ID0001" required data-required-msg="ត្រូវការ លេខកូដ"
							              				style="width: 100%;" />
							              		<span data-bind="visible: isDuplicateNumber" style="color: red;">លេខកូដនេះបានប្រើប្រាស់រូចហើយ</span>
											</div>
											<!-- // Group END -->											
										</div>
									</div>
									
									<div class="row-fluid">
										<div class="span6">						
											<!-- Group -->
											<div class="control-group">
												<label for="surname">គោត្តនាម <span style="color:red">*</span></label>
							              		<input id="surname" name="surname" class="k-textbox" data-bind="value: obj.surname" 
									              		placeholder="ត្រកូល" required data-required-msg="ត្រូវការ គោត្តនាម"
									              		style="width: 100%;" />
											</div>
											<!-- // Group END -->
										</div>

										<div class="span6">	
											<!-- Group -->
											<div class="control-group">								
												<label for="name">នាម <span style="color:red">*</span></label>
									            <input id="name" name="name" class="k-textbox" data-bind="value: obj.name" 
									              		placeholder="ឈ្មោះ" required data-required-msg="ត្រូវការ នាម"
									              		style="width: 100%;" />
											</div>																		
											<!-- // Group END -->
										</div>
									</div>
									
									<div class="row-fluid" data-bind="visible: isCompany">
										<div class="span6">
											<!-- Group -->
											<div class="control-group">
												<label for="companyName">ឈ្មោះស្ថាប័ន <span style="color:red">*</span></label>
												<input id="companyName" name="companyName" class="k-textbox" data-bind="enabled: isCompany, value: obj.company"									
														placeholder="e.g. PCG & Partner"
														style="width: 100%;" />	
											</div>
											<!-- // Group END -->
										</div>

										<div class="span6">	
											<!-- Group -->
											<div class="control-group">
												<label for="vatNo">លេខ VAT</label>								
							            		<input id="vatNo" name="vatNo" class="k-textbox" data-bind="enabled: isCompany, value: obj.vat_no" 
														placeholder="e.g. 01234567897"
														style="width: 100%;" />												
											</div>					
											<!-- // Group END -->
										</div>
									</div>

									<div class="row-fluid">
										<div class="span6">
											<label>
												<input type="checkbox" data-bind="checked: obj.use_electricity, disabled:hasEMeter" />
												ប្រើសេវាអគ្គីសនី	
											</label>																			
										</div>
										<div class="span6">
											<label>
												<input type="checkbox" data-bind="checked: obj.use_water, disabled:hasWMeter" />
												ប្រើសេវាទឹកស្អាត
											</label>
										</div>
									</div>									
								</div>
								<div class="span6">
									<div class="row-fluid">	
										<!-- Map -->
										<div id="map" class="span12" style="height: 130px;"></div>
									</div>

									<div class="separator line bottom"></div>

									<div class="row-fluid">	
										<div class="span6">									
											<!-- Group -->
											<div class="control-group">
								    			<label for="latitute">រយះទទឹង </label>
												<div class="input-prepend">
													<span class="add-on glyphicons direction"><i></i></span>
													<input type="text" class="input-large span12" data-bind="value: obj.latitute, events:{change: loadMap}" placeholder="012345.67897">
												</div>
											</div>									
											<!-- // Group END -->
										</div>	
										
										<div class="span6">	
											<!-- Group -->
											<div class="control-group">
								    			<label for="longtitute">រយះបណ្ដោយ </label>
								    			<div class="input-prepend">
													<span class="add-on glyphicons google_maps"><i></i></span>
													<input type="text" class="input-large span12" data-bind="value: obj.longtitute, events:{change: loadMap}" placeholder="012345.67897">
												</div>										
											</div>
											<!-- // Group END -->
										</div>										
									</div>
								</div>
							</div>								
									
							<!-- // Inner Tabs -->
							<div class="row-fluid">								
								<div class="box-generic">
								    <!-- //Tabs Heading -->
								    <div class="tabsbar tabsbar-1">
								        <ul class="row-fluid row-merge">						            
								            <li class="span2 glyphicons usd active">
								            	<a href="#tab1" data-toggle="tab"><i></i> <span>គណនេយ្យ</span></a>
								            </li>
								            <li class="span2 glyphicons electrical_plug" data-bind="visible: obj.use_electricity">
								            	<a href="#tab2" data-toggle="tab"><i></i> <span>អគ្គីសនី</span></a>
								            </li>
								            <li class="span2 glyphicons tint" data-bind="visible: obj.use_water">
								            	<a href="#tab3" data-toggle="tab"><i></i> <span>ទឹកស្អាត</span></a>
								            </li>
								            <li class="span2 glyphicons nameplate_alt">
								            	<a href="#tab4" data-toggle="tab"><i></i> <span>ពត័មានទូទៅ</span></a>
								            </li>
								            <li class="span2 glyphicons parents">
								            	<a href="#tab5" data-toggle="tab"><i></i> <span>ភ្នាក់ងារ</span></a>
								            </li>						            					            
								        </ul>
								    </div>
								    <!-- // Tabs Heading END -->

								    <div class="tab-content">
								        <!-- //ACCOUNTING INFO -->
								        <div class="tab-pane active" id="tab1">
								        	<div class="row-fluid">
								        		<div class="span3">						
										            <label for="currency">រូបិយ​ប័ណ្ណ <span style="color:red">*</span></label>
										            <input id="currency" name="currency" 
										            	data-role="dropdownlist"
										            	data-value-primitive="true"
										                data-text-field="code"
										                data-value-field="id"
														data-bind="value: obj.currency_id, source: currencyDS"
														data-option-label="(--- ជ្រើសរើស ---)" 
														required data-required-msg="ត្រូវការ រូបិយ​ប័ណ្ណ" style="width: 100%;" />
										        </div>
								            	<div class="span3">
													<label for="ddlPaymentTerm">លក្ខខណ្ឌទូទាត់</label>
													<input id="ddlPaymentTerm" name="ddlPaymentTerm"
														data-role="dropdownlist"
										            	data-value-primitive="true"
										                data-text-field="name"
										                data-value-field="id"
														data-bind="value: obj.payment_term_id, source: paymentTermDS" 
														data-option-label="(--- ជ្រើសរើស ---)"
														style="width: 100%;" />
												</div>
												<div class="span3">
													<label for="ddlPaymentMethod">វិធីបង់ប្រាក់</label>
													<input id="ddlPaymentMethod" name="ddlPaymentMethod"
														data-role="dropdownlist"
										            	data-value-primitive="true"
										                data-text-field="name"
										                data-value-field="id"
														data-bind="value: obj.payment_method_id, source: paymentMethodDS"
														data-option-label="(--- ជ្រើសរើស ---)" 
														style="width: 100%;" />
												</div>
												<div class="span3">
													<label for="ddlTaxItem">ប្រភេទពន្ធ </label>
													<input id="ddlTaxItem" name="ddlTaxItem"
														data-bind="value: obj.tax_item_id" 
														style="width: 100%;" />
												</div>												
									        </div>

									        <div class="separator line bottom"></div>

									        <div class="row-fluid">								        		
								            	<div class="span3">
													<label for="ddlAR">គណនីអតិថិជន <span style="color:red">*</span></label>
													<input id="ddlAR" name="ddlAR"
														data-bind="value: obj.contact_account_id" 
														required data-required-msg="ត្រូវការ គណនីអតិថិជន" style="width: 100%;" />
												</div>
												<div class="span3">
													<label for="ddlRA">គណនីចំណូល <span style="color:red">*</span></label>
													<input id="ddlRA" name="ddlRA"
														data-bind="value: obj.ra_id" 
														required data-required-msg="ត្រូវការ គណនីចំណូល" style="width: 100%;" />
												</div>
												<div class="span3">
													<label for="ddlDepositAccount">គណនីប្រាក់កក់ <span style="color:red">*</span></label>
													<input id="ddlDepositAccount" name="ddlDepositAccount"
														data-bind="value: obj.deposit_account_id" 
														required data-required-msg="ត្រូវការ គណនីចំណូល" style="width: 100%;" />
												</div>
												<div class="span3">
													<label for="ddlDiscountAccount">គណនីបញ្ចុះតម្លៃ <span style="color:red">*</span></label>
													<input id="ddlDiscountAccount" name="ddlDiscountAccount"
														data-bind="value: obj.discount_account_id" 
														required data-required-msg="ត្រូវការ គណនីចំណូល" style="width: 100%;" />	
												</div>												
									        </div>

									        <div class="separator line bottom"></div>

									        <div class="row-fluid">	
										        <div class="span3">
													<label for="txtCreditLimit">ឥណទានអនុញ្ញាត្ត </label>								              		
										            <input data-role="numerictextbox"
										                   data-format="n"
										                   data-min="0"										                   
										                   data-bind="value: obj.credit_limit"										                  
										                   style="width: 100%;">
												</div>
												<div class="span3">
													<label for="txtBillTo" data-bind="click: copyBillTo">អាស័យដ្ឋានផ្ញើទៅ <i class="icon-share"></i></label>								              		
										            <textarea id="txtBillTo" cols="0" rows="2" class="k-textbox" 
										            		data-bind="value: obj.bill_to" style="width: 100%;"></textarea>
												</div>
												<div class="span3">
													<label for="txtShipTo">អាស័យដ្ឋានដឹកជញ្ជូន </label>								              		
										            <textarea id="txtShipTo" cols="0" rows="2" class="k-textbox" 
										            		data-bind="value: obj.ship_to" style="width: 100%;"></textarea>
												</div>												
											</div>
							        	</div>
								        <!-- //ACCOUNTING INFO END -->

								        <!-- //ELECTRICTY INFO -->
								        <div class="tab-pane" id="tab2">
							            	<div class="row-fluid">							            	

							            		<div class="span3">
								            		<!-- Group -->
													<div class="control-group">											
														<label for="ddlEBranch">អាជ្ញាបណ្ណ <span style="color:red">*</span></label>
														<input id="ddlEBranch" name="ddlEBranch"
															data-bind="value: obj.ebranch_id, enabled: obj.use_electricity" 
															required data-required-msg="ត្រូវការ អាជ្ញាបណ្ណ" style="width: 100%;" />
													</div>
													<!-- // Group END -->
												</div>

												<div class="span3">
								            		<!-- Group -->
													<div class="control-group">											
														<label for="ddlELocation">តំបន់ <span style="color:red">*</span></label>
														<input id="ddlELocation" name="ddlELocation"
															data-bind="value: obj.elocation_id" disabled="disabled" style="width: 100%;" />
													</div>
													<!-- // Group END -->
												</div>

											</div>												

							            	<div class="row-fluid">

												<div class="span3">
													<!-- Group -->
													<div class="control-group">							
														<label for="enumber">លេខកូដ <span style="color:red">*</span></label>
								              			<input id="enumber" name="enumber" class="k-textbox"
									              				data-bind="value: obj.enumber, enabled: obj.use_electricity" 
									              				placeholder="e.g. ID0001" required data-required-msg="ត្រូវការ លេខកូដ"
									              				style="width: 100%;" />
									              		<span data-bind="visible: isDuplicateENumber" style="color: red;">លេខកូដនេះបានប្រើប្រាស់រូចហើយ</span>
													</div>
													<!-- // Group END -->
												</div>

												<div class="span3">
								            		<!-- Group -->
													<div class="control-group">											
														<label for="ddlPhase">ចំនួនហ្វា <span style="color:red">*</span></label>
														<input id="ddlPhase" name="ddlPhase"
															data-bind="value: obj.phase_id, enabled: obj.use_electricity" 
															required data-required-msg="ត្រូវការ ចំនួនហ្វា" style="width: 100%;" />
													</div>
													<!-- // Group END -->
												</div>

												<div class="span3">
								            		<!-- Group -->
													<div class="control-group">											
														<label for="ddlVoltage">Voltage <span style="color:red">*</span></label>
														<input id="ddlVoltage" name="ddlVoltage"
															data-bind="value: obj.voltage_id, enabled: obj.use_electricity" 
															required data-required-msg="ត្រូវការ Voltage" style="width: 100%;" />
													</div>
													<!-- // Group END -->
												</div>

												<div class="span3">
								            		<!-- Group -->
													<div class="control-group">											
														<label for="ddlAmpere">អាំងតង់សុីតេ <span style="color:red">*</span></label>
														<input id="ddlAmpere" name="ddlAmpere"
															data-bind="value: obj.ampere_id, enabled: obj.use_electricity" 
															required data-required-msg="ត្រូវការ អាំងតង់សុីតេ" style="width: 100%;" />
													</div>
													<!-- // Group END -->
												</div>

							            	</div>
							        	</div>
								        <!-- //ELECTRICTY INFO END -->

								        <!-- //WATER INFO -->
								        <div class="tab-pane" id="tab3">
							            	<div class="row-fluid">

							            		<div class="span3">
								            		<!-- Group -->
													<div class="control-group">											
														<label for="ddlWBranch">អាជ្ញាបណ្ណ <span style="color:red">*</span></label>
														<input id="ddlWBranch" name="ddlWBranch"
															data-bind="value: obj.wbranch_id, enabled: obj.use_water" 
															required data-required-msg="ត្រូវការ អាជ្ញាបណ្ណ" style="width: 100%;" />
													</div>
													<!-- // Group END -->
												</div>

												<div class="span3">
								            		<!-- Group -->
													<div class="control-group">											
														<label for="ddlWLocation">តំបន់ <span style="color:red">*</span></label>
														<input id="ddlWLocation" name="ddlWLocation"
															data-bind="value: obj.wlocation_id" disabled="disabled" style="width: 100%;" />
													</div>
													<!-- // Group END -->
												</div>

												<div class="span3">
													<!-- Group -->
													<div class="control-group">							
														<label for="wnumber">លេខកូដ <span style="color:red">*</span></label>
								              			<input id="wnumber" name="wnumber" class="k-textbox"
									              				data-bind="value: obj.wnumber, enabled: obj.use_water" 
									              				placeholder="e.g. ID0001" required data-required-msg="ត្រូវការ លេខកូដ"
									              				style="width: 100%;" />
									              		<span data-bind="visible: isDuplicateWNumber" style="color: red;">លេខកូដនេះបានប្រើប្រាស់រូចហើយ</span>
													</div>
													<!-- // Group END -->
												</div>

							            	</div>
							        	</div>
								        <!-- //WATER INFO END -->

								        <!-- //GENERAL INFO -->
								        <div class="tab-pane" id="tab4">
							            	<table class="table table-borderless table-condensed cart_total">						            	
							            		<tr>
									                <td>ស្ថានភាព <span style="color:red">*</span></td>
									              	<td>
									              		<input id="customerStatus" name="customerStatus" 
									              				data-role="dropdownlist"
											            		data-text-field="name"
								           						data-value-field="id"
								           						data-value-primitive="true" 
											            		data-bind="source: statusList, value: obj.status"
											            		data-option-label="(--- ជ្រើសរើស ---)"
											            		required data-required-msg="ត្រូវការ ស្ថានភាព" />
									              	</td>							              	
									            	<td>ថ្ងៃចុះឈ្មោះ <span style="color:red">*</span></td>
									              	<td>
									              		<input id="registered_date" name="registered_date" 
										            		data-role="datepicker"			            		
							            					data-bind="value: obj.registered_date" 
							            					data-format="dd-MM-yyyy"
							            					data-parse-formats="yyyy-MM-dd" 
							            					placeholder="ថ្ងែ-ខែ-ឆ្នាំ" required data-required-msg="ត្រូវការ ថ្ងៃចុះឈ្មោះ" />
									              	</td>
									            </tr>
									            <tr>
									                <td>ភេទ</td>
									              	<td><select data-role="dropdownlist" data-bind="source: genders, value: obj.gender"></select></td>							              	
									            	<td>លេខទូរស័ព្ទ</td>
									              	<td><input class="k-textbox" data-bind="value: obj.phone" placeholder="e.g. 012 333 444" /></td>
									            </tr>
									            <tr>
									            	<td>ថ្ងៃកំណើត</td>
									              	<td>
									              		<input data-role="datepicker"			            		
							            					data-bind="value: obj.dob" 
							            					data-format="dd-MM-yyyy"
							            					data-parse-formats="yyyy-MM-dd" 
							            					placeholder="ថ្ងែ-ខែ-ឆ្នាំ" />
			            							</td>							              	
									            	<td>អីុម៉ែល</td>
									              	<td><input class="k-textbox" data-bind="value: obj.email" placeholder="e.g. me@email.com" />
									            </tr>
									            <tr>
									            	<td>ទីកន្លែងកំណើត</td>
									              	<td><input class="k-textbox" data-bind="value: obj.pob" placeholder="e.g. ផ្ទះ ផ្លូវ ភូមិ សង្កាត់ ខណ្ឌ" />							            	
									            	<td>លេខអត្តសញ្ញាណប័ណ្ណ</td>
									              	<td><input class="k-textbox" data-bind="value: obj.id_number" placeholder="e.g. 123456789" /></td>
									            </tr>
									            <tr valign="top">
									            	<td>អាស័យដ្ឋាន</td>
									              	<td><input class="k-textbox" data-bind="value: obj.address" placeholder="e.g. ផ្ទះ ផ្លូវ ភូមិ សង្កាត់ ខណ្ឌ" />							              	
									            	<td>សមាជិកគ្រួសារ</td>
									              	<td><input class="k-textbox" data-bind="value: obj.family_member" placeholder="e.g. 3" /></td>
									            </tr>
									            <tr valign="top">
									            	<td>សំគាល់</td>
									              	<td><input class="k-textbox" data-bind="value: obj.memo" placeholder="..." /></td>							              								            	
									              	<td>មុខរបរ</td>
									              	<td><input class="k-textbox" data-bind="value: customer.job" placeholder="e.g. គ្រូបង្រៀន" /></td>
									            </tr>							            							            								            								            			            
									        </table>
							        	</div>
								        <!-- //GENERAL INFO END -->

								        <!-- //CONTACT PERSON -->
								        <div class="tab-pane" id="tab5">
								        	<span class="btn btn-primary btn-icon glyphicons circle_plus" data-bind="click: addEmptyContactPerson"><i></i> បង្កើតភ្នាក់ងារថ្មី</span>
								        	
								        	<table class="table table-bordered table-white">
										        <thead>
										            <tr>
										                <th>ឈ្មោះ</th>
										                <th>ផ្នែក</th>						                
										                <th>លេខទូរស័ព្ទ</th>
										                <th>អុីម៉ែល</th>
										                <th width="20px"></th>										               
										            </tr>
										        </thead>
										        <tbody data-role="listview"										        		
										        		data-auto-bind="false"										        						        		 
										        		data-template="contact-person-row-tmpl" 
										        		data-bind="source: contactPersonDS">
										        </tbody>										        						        
										    </table>
							        	</div>
								        <!-- //CONTACT PERSON END -->
								    </div>
								</div>
							</div>

							<br>											
							
							<!-- Form actions -->
							<div align="center">
								<span id="notification"></span>

								<span id="save" class="btn btn-icon btn-primary glyphicons circle_ok"><i></i>កត់ត្រា</span>
								<span class="btn btn-danger btn-icon glyphicons delete" data-bind="click: delete, visible: isEdit"><i></i>លុប</span>
								<span class="btn btn-icon btn-default glyphicons ban" data-bind="click: cancel"><i></i>បោះបង់</span>
							</div>
							<!-- // Form actions END -->

						</div> <!-- End Widget-Body List -->
					</div>
					<!-- // Collapsible Widget END -->				          					                
			    											
				</div> <!-- // End div example-->  
			</div> <!-- // End div span12-->
		</div> <!-- // End div row-fluid-->	
	</div> 	
</script>
<script id="contact-person-row-tmpl" type="text/x-kendo-tmpl">
	<tr>		
		<td>
			<input id="name" name="name" 
					type="text" class="k-textbox" 
					data-bind="value: name"
					placeholder="eg: Mr. John" 
					required="required" validationMessage="ត្រូវការ ឈ្មោះ" style="width: 190px;" />
            <span data-for="name" class="k-invalid-msg"></span>
		</td>
		<td>
			<input type="text" class="k-textbox" data-bind="value: department" placeholder="eg: គណនេយ្យករ" style="width: 190px;" />
		</td>		
		<td>
			<input type="text" class="k-textbox" data-bind="value: phone" placeholder="eg: 012 333 444" style="width: 190px;" />
		</td>
		<td>
			<input type="text" class="k-textbox" data-bind="value: email" placeholder="eg: john@email.com" style="width: 190px;" />
		</td>		
		<td align="center">            
			<span class="glyphicons no-js delete" data-bind="click: deleteContactPerson"><i></i></span>									
		</td>		
	</tr>
</script>

<script id="invoice" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="container-960">					
			<div id="example" class="k-content">

				<!-- Collapsible Widget -->			
				<div class="widget">
				    <div class="widget-head">
				    	<span class="btn btn-primary pull-right" 
								onclick="javascript:window.history.back()">X</span>
				        
				        <h4 class="heading glyphicons notes"><i></i>វិក្កយបត្រ</h4>							        	
				    </div>
				    <div class="widget-body">					
						
						<!-- Upper Part -->
						<div class="row-fluid">
							<div class="span4">				
								<table class="table table-borderless table-condensed cart_total">
									<tr>
										<td>អតិថិជន</td>
										<td>
											<input id="cbbCustomer" name="cbbCustomer" 
							    				   data-role="combobox"
								                   data-placeholder="អតិថិជន..."
								                   data-auto-bind="false"
								                   data-value-primitive="true"
								                   data-filter="search"							                   
								                   data-min-length="3"							                   
								                   data-text-field="fullname"
								                   data-value-field="id"
								                   data-template='invoice-contact-combobox-template'
								                   data-bind="value: obj.contact_id,
								                              source: contactDS,
								                              events:{change:contactChanges}"
								                   required data-required-msg="ត្រូវការ អតិថិជន"
								                   style="width: 100%" />
										</td>
									</tr>					          
									<tr data-bind="visible: isEdit">				
										<td>លេខវិក្ក​យបត្រ</td>
										<td><input class="k-textbox" data-bind="value: obj.number" style="width:100%;" readonly /></td>
									</tr>
									<tr>
										<td>ចំណាត់ថ្នាក់</td>
										<td>
											<select data-role="multiselect" 
												   data-bind="source: segmentItemDS, value: obj.segments, events:{change: segmentChanges}"
												   data-value-primitive="true"
												   data-value-field="id" 
												   data-text-field="name"
												   data-placeholder="(--- ជ្រើសរើស ---)"
												   style="width: 100%" /></select>
										</td>
									</tr>								           
									<tr>
										<td colspan="2">
											អាសយដ្ឋាន
											<br>
											<textarea id="address" cols="0" rows="2" class="k-textbox" style="width:100%;" data-bind="value: obj.bill_to"></textarea>
										</td>
									</tr>
								</table>
							</div>

						    <div class="span4">
						    	<div align="center">
						    		<span class="glyphicons standard circle_ok" data-bind="visible: paid"><i></i> ទូទាត់រួច</span>				    	
						    	</div>
						    </div>

							<div class="span4">
								<table class="table table-borderless table-condensed cart_total">
									<tr>
										<td>ថ្ងៃចេញវិក្កយបត្រ</td>
										<td>
											<input id="issuedDate" name="issuedDate" 
													data-role="datepicker"
													data-format="dd-MM-yyyy" 
													data-bind="value: obj.issued_date" 
													required data-required-msg="ត្រូវការ ថ្ងៃចេញវិក្កយបត្រ" />
										</td>
									</tr>	
									<tr>
						                <td>កាលកំណត់</td>
						              	<td>
						              		<input data-role="dropdownlist"
						              		   data-option-label="(--- ជ្រើសរើស ---)"							                   
							                   data-value-primitive="true"
							                   data-text-field="name"
							                   data-value-field="id"
							                   data-bind="value: obj.payment_term_id,
							                              source: paymentTermDS"
							                   style="width: 100%;" />						              		
						              	</td>
						            </tr>				
									<tr>
										<td>ថ្ងៃផុតកំណត់</td>
										<td>
											<input id="dueDate" name="dueDate" 
													data-role="datepicker"
													data-format="dd-MM-yyyy" 
													data-bind="value: obj.due_date" 
													required data-required-msg="ត្រូវការ ថ្ងៃផុតកំណត់" />
										</td>
									</tr>													
						            <tr>
						            	<td>
						            		<input data-role="dropdownlist"
								                   data-option-label="(-- ទាញពី ---)"								                   
								                   data-value-primitive="true"
								                   data-text-field="name"
								                   data-value-field="id"
								                   data-bind="value: obj.reference_type,
								                              source: referenceTypes,
								                              events:{change: loadReference}"
								                   style="width: 100%" />						            						            		
						            	</td>				
										<td>
											<input data-role="dropdownlist"
													data-auto-bind="false"
						              				data-value-primitive="true"
													data-text-field="number" 
						              				data-value-field="id"						              				 
						              				data-bind="value: obj.reference_id,
						              							source: referenceDS,
						              							enabled: bolReference,						              							
						              							events:{change: referenceChange}" 
						              				data-option-label="(--- ជ្រើសរើស ---)" />
										</td>
									</tr>								
								</table>           		          	
						    </div>
						</div>								
						
						<!-- Item List -->
						<table class="table table-bordered table-vertical-center table-pricing table-pricing-2">
							<thead>
								<tr>
									<th style="width: 5%;" class="center">ល.រ</th>
									<th class="center">ទំនិញ</th>								
									<th class="center">ពណ៌នា</th>
									<th style="width: 230px;" class="center">ចំនួន</th>
									<th style="width: 120px;" class="center">តំលៃ</th>
									<th style="width: 80px;" class="center">ទឹកប្រាក់</th>
									<th style="width: 1%;" class="center">vat</th>
								</tr>
							</thead>	            		
		            		<tbody id="lvInvoice" data-role="listview"
		            				data-auto-bind="false"	            					            					            					            			
					                data-template="invoice-row-template"
					                data-bind="source: lineDS">
					        </tbody>
		            	</table>						
						<button class="btn btn-inverse" data-bind="click: addRow"><i class="icon-plus icon-white"></i></button>
						
						<br>
						
						<!-- Lower Part -->
						<div class="row-fluid">				
							<div class="span8">
								សំគាល់:
								<br>
								<textarea id="memo" cols="0" rows="2" class="k-textbox" style="width:250px" data-bind="value: obj.memo" placeholder="សំគាល់ 1 (សំរាប់អតិថិជន)"></textarea>
								<textarea id="memo2" cols="0" rows="2" class="k-textbox" style="width:250px" data-bind="value: obj.memo2" placeholder="សំគាល់ 2 (សំរាប់ផ្ទៃក្នុង)"></textarea>
							</div>

							<div class="span4">
								<table width="100%">								
									<tr align="right">
										<td>សរុបរង:</td>
										<td width="50%"><span data-bind="text: sub_total"></span></td>
									</tr>								
									<tr align="right">
										<td align="top">
											<input data-role="dropdownlist"
												   data-option-label="(--- រើស VAT ---)"								                   
								                   data-auto-bind="false"
								                   data-value-primitive="true"
								                   data-text-field="name"
								                   data-value-field="id"
								                   data-bind="source: vatDS, value: obj.vat_id, events: {change: changes}"
								                   style="width: 130px;" />																										
										</td>
										<td><span data-bind="text: vat"></span></td>
									</tr>
									<tr align="right">
										<td>សរុប:</td>
										<td><span data-bind="text: total"></span></td>
									</tr>						
								</table>
							</div>													
						</div>

						<br>

						<!-- Buttons -->
						<div class="row-fluid">
				          	<!-- Form actions -->
							<div align="center">
								<span id="notification"></span>

								<span id="save" class="btn btn-icon btn-primary glyphicons circle_ok"><i></i>កត់ត្រា</span>
								<span class="btn btn-danger btn-icon glyphicons delete" data-bind="click: delete, visible: isEdit"><i></i>លុប</span>
								<span class="btn btn-icon btn-default glyphicons ban" data-bind="click: cancel"><i></i>បោះបង់</span>
								<span class="btn btn-primary btn-icon glyphicons print" data-bind="click: linkPrint, visible: isEdit"><i></i> បោះពុម្ព</span>
							</div>
							<!-- // Form actions END -->
						</div>						

					</div> <!-- End Widget-Body List -->
				</div>
				<!-- // Collapsible Widget END -->

			</div>							
		</div>
	</div>
</script>
<script id="invoice-row-template" type="text/x-kendo-tmpl">		
	<tr>		
		<td>
			<i class="icon-trash" data-bind="events: { click: removeRow }"></i>
			#:banhji.invoice.lineDS.indexOf(data)+1#			
		</td>		
		<td>
			<input id="ccbItem" name="ccbItem"
				   data-role="combobox"
				   data-auto-bind="false"                   
                   data-value-primitive="true"				   
                   data-text-field="name"
                   data-value-field="id"
                   data-bind="value: item_id, source: itemList, events: {change : itemChanges}"
                   required data-required-msg="ត្រូវការ ទំនិញ" style="width: 100%" />			
		</td>		
		<td>
			<input id="description" name="description" type="text"
					class="k-textbox" 
					data-bind="value: description"					 
					required data-required-msg="ត្រូវការ ពណ៌នា"
					style="width: 100%; margin-bottom: 0;" />
		</td>
		<td>
			<input id="unit" name="unit" data-role="numerictextbox" 
					data-format="n0" data-min="1"
					data-bind="value: unit, events: {change : changes}"
					required data-required-msg="ត្រូវការ ចំនួន" style="width: 100px;" />

			<input data-role="dropdownlist"
				   data-option-label="(--- រើស ---)"
                   data-auto-bind="false"
                   data-value-primitive="true"
                   data-text-field="measurement"
                   data-value-field="measurement_id"
                   data-bind="source: priceList, value: measurement_id, events: {change: measurementChanges}"
                   style="width: 100px;" />
		</td>					
		<td>
			<input id="price" name="price" data-role="numerictextbox" 
					data-format="c" data-culture=#:locale#
					data-bind="value: price, events: {change : changes}" 
					required data-required-msg="ត្រូវការ តំលៃ" style="width: 100%;" />
		</td>		
		<td class="right">
			<span data-format="n" 
					data-culture=#:locale#
					data-bind="text: amount" 
					style="width: 100%;"></span> 						
		</td>
		<td>
			<input type="checkbox" data-bind="checked: has_vat, events: {change : changes}" />			
		</td>		
    </tr>   
</script>
<script id="invoice-contact-combobox-template" type="text/x-kendo-template">	
	#=number# #=fullname#
</script>

<script id="receipt" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="container-960">					
			<div id="example" class="k-content">

				<!-- Collapsible Widget -->			
				<div class="widget">
				    <div class="widget-head">
				    	<span class="btn btn-primary pull-right" 
								onclick="javascript:window.history.back()">X</span>
				        
				        <h4 class="heading glyphicons notes"><i></i>បង្កាន់ដៃលក់</h4>							        	
				    </div>
				    <div class="widget-body">					
						
						<!-- Upper Part -->
						<div class="row-fluid">
							<div class="span4">				
								<table class="table table-borderless table-condensed cart_total">
									<tr>
										<td>អតិថិជន</td>
										<td>
											<input id="cbbCustomer" name="cbbCustomer" 
							    				   data-role="combobox"
								                   data-placeholder="អតិថិជន..."
								                   data-auto-bind="false"
								                   data-value-primitive="true"
								                   data-filter="search"							                   
								                   data-min-length="3"							                   
								                   data-text-field="fullname"
								                   data-value-field="id"
								                   data-template='receipt-contact-combobox-template'
								                   data-bind="value: obj.contact_id,
								                              source: contactDS,
								                              events:{change:contactChanges}"
								                   required data-required-msg="ត្រូវការ អតិថិជន"
								                   style="width: 100%" />
										</td>
									</tr>					          
									<tr data-bind="visible: isEdit">				
										<td>លេខបង្កាន់ដៃ</td>
										<td><input class="k-textbox" data-bind="value: obj.number" style="width:100%;" readonly /></td>
									</tr>
									<tr>
										<td>ចំណាត់ថ្នាក់</td>
										<td>
											<select data-role="multiselect" 
												   data-bind="source: segmentItemDS, value: obj.segments, events:{change: segmentChanges}" 
												   data-value-primitive="true"
												   data-value-field="id" 
												   data-text-field="name"
												   data-placeholder="(--- ជ្រើសរើស ---)"
												   style="width: 100%" /></select>
										</td>
									</tr>								           
									<tr>
										<td colspan="2">
											អាសយដ្ឋាន
											<br>
											<textarea id="address" cols="0" rows="2" class="k-textbox" style="width: 100%;" data-bind="value: obj.bill_to"></textarea>
										</td>
									</tr>
								</table>
							</div>

						    <div class="span4">
						    	<div align="center">
						    		<span class="glyphicons standard circle_ok" data-bind="visible: paid"><i></i> ទូទាត់រួច</span>				    	
						    	</div>
						    </div>

							<div class="span4">
								<table class="table table-borderless table-condensed cart_total">
									<tr>
										<td>កាលបរិច្ឆេទ</td>
										<td>
											<input id="issuedDate" name="issuedDate" data-role="datepicker" 
													data-bind="value: obj.issued_date" data-format="dd-MM-yyyy" 
													required data-required-msg="ត្រូវការ កាលបរិច្ឆេទ" />											
										</td>
									</tr>
									<tr>
										<td>វីធីបង់ប្រាក់</td>
										<td>
											<input id="paymentMethod" name="paymentMethod"
											   data-role="dropdownlist"
											   data-option-label="(--- ជ្រើសរើស ---)"							                   
							                   data-value-primitive="true"
							                   data-text-field="name"
							                   data-value-field="id"
							                   data-bind="value: obj.payment_method_id,
							                              source: paymentMethodDS"
							                   required data-required-msg="ត្រូវការ វីធីបង់ប្រាក់" 
							                   style="width: 100%" />
										</td>
									</tr>	
									<tr>
						                <td>លេខកូដសែក</td>						              	
						              	<td><input class="k-textbox" data-bind="value: obj.check_no" style="width:100%;" /></td>
						            </tr>				
									<tr>
										<td>គណនីសាច់ប្រាក់</td>
										<td>
											<input id="cashAccount" name="cashAccount"
											   data-role="dropdownlist"
											   data-option-label="(--- ជ្រើសរើស ---)"
							                   data-auto-bind="false"
							                   data-value-primitive="true"
							                   data-text-field="name"
							                   data-value-field="id"
							                   data-template="receipt-cash-account-template"
							                   data-bind="value: obj.cash_account_id,
							                              source: cashAccountDS"
							                   required data-required-msg="ត្រូវការ គណនីសាច់ប្រាក់" 
							                   style="width: 100%" />
										</td>
									</tr>													
						            <tr>
						            	<td>
						            		<input data-role="dropdownlist"
								                   data-option-label="(-- ទាញពី ---)"								                   
								                   data-value-primitive="true"
								                   data-text-field="name"
								                   data-value-field="id"
								                   data-bind="value: obj.reference_type,
								                              source: referenceTypes,
								                              events:{change: loadReference}"
								                   style="width: 100%" />						            						            		
						            	</td>				
										<td>
											<select data-role="dropdownlist"
													data-option-label="(--- ជ្រើសរើស ---)"
													data-auto-bind="false"
						              				data-value-primitive="true"
													data-text-field="number" 
						              				data-value-field="id"						              				 
						              				data-bind="value: obj.reference_id,
						              							source: referenceDS,
						              							enabled: bolReference,						              							
						              							events:{change: referenceChange}" 
						              				style="width: 100%" ></select>
										</td>
									</tr>								
								</table>           		          	
						    </div>
						</div>								
						
						<!-- Item List -->
						<table class="table table-bordered table-vertical-center table-pricing table-pricing-2">
							<thead>
								<tr>
									<th style="width: 5%;" class="center">ល.រ</th>
									<th class="center">ទំនិញ</th>								
									<th class="center">ពណ៌នា</th>
									<th style="width: 230px;" class="center">ចំនួន</th>
									<th style="width: 120px;" class="center">តំលៃ</th>
									<th style="width: 80px;" class="center">ទឹកប្រាក់</th>
									<th style="width: 1%;" class="center">vat</th>
								</tr>
							</thead>	            		
		            		<tbody id="lvInvoice" data-role="listview"
		            				data-auto-bind="false"	            					            					            					            			
					                data-template="receipt-row-template"
					                data-bind="source: lineDS">
					        </tbody>
		            	</table>						
						<button class="btn btn-inverse" data-bind="click: addRow"><i class="icon-plus icon-white"></i></button>
						
						<br>
						
						<!-- Lower Part -->
						<div class="row-fluid">				
							<div class="span8">
								សំគាល់:
								<br>
								<textarea id="memo" cols="0" rows="2" class="k-textbox" style="width:250px" data-bind="value: obj.memo" placeholder="សំគាល់ 1 (សំរាប់អតិថិជន)"></textarea>
								<textarea id="memo2" cols="0" rows="2" class="k-textbox" style="width:250px" data-bind="value: obj.memo2" placeholder="សំគាល់ 2 (សំរាប់ផ្ទៃក្នុង)"></textarea>
							</div>

							<div class="span4">
								<table width="100%">								
									<tr align="right">
										<td>សរុបរង:</td>
										<td width="50%"><span data-bind="text: sub_total"></span></td>
									</tr>								
									<tr align="right">
										<td align="top">
											<input data-role="dropdownlist"
												   data-option-label="(--- រើស VAT ---)"								                   
								                   data-auto-bind="false"
								                   data-value-primitive="true"
								                   data-text-field="name"
								                   data-value-field="id"
								                   data-bind="source: vatDS, value: obj.vat_id, events: {change: changes}"
								                   style="width: 130px;" />																										
										</td>
										<td><span data-bind="text: vat"></span></td>
									</tr>
									<tr align="right">
										<td>សរុប:</td>
										<td><span data-bind="text: total"></span></td>
									</tr>						
								</table>
							</div>													
						</div>

						<br>

						<!-- Buttons -->
						<div class="row-fluid">
				          	<!-- Form actions -->
							<div align="center">
								<span id="notification"></span>

								<span id="save" class="btn btn-icon btn-primary glyphicons circle_ok"><i></i>កត់ត្រា</span>
								<span class="btn btn-danger btn-icon glyphicons delete" data-bind="click: delete, visible: isEdit"><i></i>លុប</span>
								<span class="btn btn-icon btn-default glyphicons ban" data-bind="click: cancel"><i></i>បោះបង់</span>
								<span class="btn btn-primary btn-icon glyphicons print" data-bind="click: linkPrint, visible: isEdit"><i></i> បោះពុម្ព</span>
							</div>
							<!-- // Form actions END -->
						</div>						

					</div> <!-- End Widget-Body List -->
				</div>
				<!-- // Collapsible Widget END -->

			</div>							
		</div>
	</div>
</script>
<script id="receipt-row-template" type="text/x-kendo-tmpl">		
	<tr>		
		<td>
			<i class="icon-trash" data-bind="events: { click: removeRow }"></i>
			#:banhji.receipt.lineDS.indexOf(data)+1#			
		</td>		
		<td>
			<input id="ccbItem" name="ccbItem"
				   data-role="combobox"
				   data-auto-bind="false"                   
                   data-value-primitive="true"				   
                   data-text-field="name"
                   data-value-field="id"
                   data-bind="value: item_id, source: itemList, events: {change : itemChanges}"
                   required data-required-msg="ត្រូវការ ទំនិញ" style="width: 100%" />			
		</td>		
		<td>
			<input id="description" name="description" type="text"
					class="k-textbox" 
					data-bind="value: description"					 
					required data-required-msg="ត្រូវការ ពណ៌នា"
					style="width: 100%; margin-bottom: 0;" />
		</td>
		<td>
			<input id="unit" name="unit" data-role="numerictextbox" 
					data-format="n0" data-min="1"
					data-bind="value: unit, events: {change : changes}"
					required data-required-msg="ត្រូវការ ចំនួន" style="width: 100px;" />

			<input data-role="dropdownlist"
				   data-option-label="(--- រើស ---)"
                   data-auto-bind="false"
                   data-value-primitive="true"
                   data-text-field="measurement"
                   data-value-field="measurement_id"
                   data-bind="source: priceList, value: measurement_id, events: {change: measurementChanges}"
                   style="width: 100px;" />
		</td>					
		<td>
			<input id="price" name="price" data-role="numerictextbox" 
					data-format="c" data-culture=#:locale#
					data-bind="value: price, events: {change : changes}" 
					required data-required-msg="ត្រូវការ តំលៃ" style="width: 100%;" />
		</td>		
		<td class="right">
			<span data-format="n" 
					data-culture=#:locale#
					data-bind="text: amount" 
					style="width: 100%;"></span> 						
		</td>
		<td>
			<input type="checkbox" data-bind="checked: has_vat, events: {change : changes}" />			
		</td>		
    </tr>   
</script>
<script id="receipt-contact-combobox-template" type="text/x-kendo-template">	
	#=number# #=fullname#
</script>
<script id="receipt-cash-account-template" type="text/x-kendo-tmpl">		
	#=code# #=name#
</script>

<script id="estimate" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="container-960">					
			<div id="example" class="k-content">

				<!-- Collapsible Widget -->			
				<div class="widget">
				    <div class="widget-head">
				    	<span class="btn btn-primary pull-right" 
								onclick="javascript:window.history.back()">X</span>
				        
				        <h4 class="heading glyphicons notes"><i></i>សម្រង់តម្លៃ</h4>							        	
				    </div>
				    <div class="widget-body">					
						
						<!-- Upper Part -->
						<div class="row-fluid">
							<div class="span4">				
								<table class="table table-borderless table-condensed cart_total">
									<tr>
										<td>អតិថិជន</td>
										<td>
											<input id="cbbCustomer" name="cbbCustomer" 
							    				   data-role="combobox"
								                   data-placeholder="អតិថិជន..."
								                   data-auto-bind="false"
								                   data-value-primitive="true"
								                   data-filter="search"							                   
								                   data-min-length="3"							                   
								                   data-text-field="fullname"
								                   data-value-field="id"
								                   data-template='estimate-contact-combobox-template'
								                   data-bind="value: obj.contact_id,
								                              source: contactDS,
								                              events:{change:contactChanges}"
								                   required data-required-msg="ត្រូវការ អតិថិជន"
								                   style="width: 100%" />
										</td>
									</tr>					          
									<tr data-bind="visible: isEdit">				
										<td>លេខវិក្ក​យបត្រ</td>
										<td><input class="k-textbox" data-bind="value: obj.number" style="width:100%;" readonly /></td>
									</tr>																	           
									<tr>
										<td colspan="2">
											អាសយដ្ឋាន
											<br>
											<textarea id="address" cols="0" rows="2" class="k-textbox" style="width:100%;" data-bind="value: obj.bill_to"></textarea>
										</td>
									</tr>
								</table>
							</div>

						    <div class="span4">
						    	<div align="center">
						    		<span class="glyphicons standard circle_ok" data-bind="visible: paid"><i></i> ទូទាត់រួច</span>				    	
						    	</div>
						    </div>

							<div class="span4">
								<table class="table table-borderless table-condensed cart_total">
									<tr>
										<td>កាលបរិច្ឆេទ</td>
										<td>
											<input id="issuedDate" name="issuedDate" 
													data-role="datepicker"
													data-format="dd-MM-yyyy" 
													data-bind="value: obj.issued_date" 
													required data-required-msg="ត្រូវការ កាលបរិច្ឆេទ" />
										</td>
									</tr>						            								
								</table>           		          	
						    </div>
						</div>								
						
						<!-- Item List -->
						<table class="table table-bordered table-vertical-center table-pricing table-pricing-2">
							<thead>
								<tr>
									<th style="width: 5%;" class="center">ល.រ</th>
									<th class="center">ទំនិញ</th>								
									<th class="center">ពណ៌នា</th>
									<th style="width: 230px;" class="center">ចំនួន</th>
									<th style="width: 120px;" class="center">តំលៃ</th>
									<th style="width: 80px;" class="center">ទឹកប្រាក់</th>
									<th style="width: 1%;" class="center">vat</th>
								</tr>
							</thead>	            		
		            		<tbody id="lvInvoice" data-role="listview"
		            				data-auto-bind="false"	            					            					            					            			
					                data-template="estimate-row-template"
					                data-bind="source: lineDS">
					        </tbody>
		            	</table>						
						<button class="btn btn-inverse" data-bind="click: addRow"><i class="icon-plus icon-white"></i></button>
						
						<br>
						
						<!-- Lower Part -->
						<div class="row-fluid">				
							<div class="span8">
								សំគាល់:
								<br>
								<textarea id="memo" cols="0" rows="2" class="k-textbox" style="width:250px" data-bind="value: obj.memo" placeholder="សំគាល់ 1 (សំរាប់អតិថិជន)"></textarea>
								<textarea id="memo2" cols="0" rows="2" class="k-textbox" style="width:250px" data-bind="value: obj.memo2" placeholder="សំគាល់ 2 (សំរាប់ផ្ទៃក្នុង)"></textarea>
							</div>

							<div class="span4">
								<table width="100%">								
									<tr align="right">
										<td>សរុបរង:</td>
										<td width="50%"><span data-bind="text: sub_total"></span></td>
									</tr>								
									<tr align="right">
										<td align="top">
											<input data-role="dropdownlist"
												   data-option-label="(--- រើស VAT ---)"								                   
								                   data-auto-bind="false"
								                   data-value-primitive="true"
								                   data-text-field="name"
								                   data-value-field="id"
								                   data-bind="source: vatDS, value: obj.vat_id, events: {change: changes}"
								                   style="width: 130px;" />																										
										</td>
										<td><span data-bind="text: vat"></span></td>
									</tr>
									<tr align="right">
										<td>សរុប:</td>
										<td><span data-bind="text: total"></span></td>
									</tr>						
								</table>
							</div>													
						</div>

						<br>

						<!-- Buttons -->
						<div class="row-fluid">
				          	<!-- Form actions -->
							<div align="center">
								<span id="notification"></span>

								<span id="save" class="btn btn-icon btn-primary glyphicons circle_ok"><i></i>កត់ត្រា</span>
								<span class="btn btn-danger btn-icon glyphicons delete" data-bind="click: delete, visible: isEdit"><i></i>លុប</span>
								<span class="btn btn-icon btn-default glyphicons ban" data-bind="click: cancel"><i></i>បោះបង់</span>
								<span class="btn btn-primary btn-icon glyphicons print" data-bind="click: linkPrint, visible: isEdit"><i></i> បោះពុម្ព</span>
							</div>
							<!-- // Form actions END -->
						</div>						

					</div> <!-- End Widget-Body List -->
				</div>
				<!-- // Collapsible Widget END -->

			</div>							
		</div>
	</div>
</script>
<script id="estimate-row-template" type="text/x-kendo-tmpl">		
	<tr>		
		<td>
			<i class="icon-trash" data-bind="events: { click: removeRow }"></i>
			#:banhji.estimate.lineDS.indexOf(data)+1#			
		</td>		
		<td>
			<input id="ccbItem" name="ccbItem"
				   data-role="combobox"
				   data-auto-bind="false"                   
                   data-value-primitive="true"				   
                   data-text-field="name"
                   data-value-field="id"
                   data-bind="value: item_id, source: itemList, events: {change : itemChanges}"
                   required data-required-msg="ត្រូវការ ទំនិញ" style="width: 100%" />			
		</td>		
		<td>
			<input id="description" name="description" type="text"
					class="k-textbox" 
					data-bind="value: description"					 
					required data-required-msg="ត្រូវការ ពណ៌នា"
					style="width: 100%; margin-bottom: 0;" />
		</td>
		<td>
			<input id="unit" name="unit" data-role="numerictextbox" 
					data-format="n0" data-min="1"
					data-bind="value: unit, events: {change : changes}"
					required data-required-msg="ត្រូវការ ចំនួន" style="width: 100px;" />

			<input data-role="dropdownlist"
				   data-option-label="(--- រើស ---)"
                   data-auto-bind="false"
                   data-value-primitive="true"
                   data-text-field="measurement"
                   data-value-field="measurement_id"
                   data-bind="source: priceList, value: measurement_id, events: {change: measurementChanges}"
                   style="width: 100px;" />
		</td>					
		<td>
			<input id="price" name="price" data-role="numerictextbox" 
					data-format="c" data-culture=#:locale#
					data-bind="value: price, events: {change : changes}" 
					required data-required-msg="ត្រូវការ តំលៃ" style="width: 100%;" />
		</td>		
		<td class="right">
			<span data-format="n" 
					data-culture=#:locale#
					data-bind="text: amount" 
					style="width: 100%;"></span> 						
		</td>
		<td>
			<input type="checkbox" data-bind="checked: has_vat, events: {change : changes}" />			
		</td>		
    </tr>   
</script>
<script id="estimate-contact-combobox-template" type="text/x-kendo-template">	
	#=number# #=fullname#
</script>

<script id="so" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="container-960">					
			<div id="example" class="k-content">

				<!-- Collapsible Widget -->			
				<div class="widget">
				    <div class="widget-head">
				    	<span class="btn btn-primary pull-right" 
								onclick="javascript:window.history.back()">X</span>
				        
				        <h4 class="heading glyphicons notes"><i></i>បញ្ជាលក់</h4>							        	
				    </div>
				    <div class="widget-body">					
						
						<!-- Upper Part -->
						<div class="row-fluid">
							<div class="span4">				
								<table class="table table-borderless table-condensed cart_total">
									<tr>
										<td>អតិថិជន</td>
										<td>
											<input id="cbbCustomer" name="cbbCustomer" 
							    				   data-role="combobox"
								                   data-placeholder="អតិថិជន..."
								                   data-auto-bind="false"
								                   data-value-primitive="true"
								                   data-filter="search"							                   
								                   data-min-length="3"							                   
								                   data-text-field="fullname"
								                   data-value-field="id"
								                   data-template='so-contact-combobox-template'
								                   data-bind="value: obj.contact_id,
								                              source: contactDS,
								                              events:{change:contactChanges}"
								                   required data-required-msg="ត្រូវការ អតិថិជន"
								                   style="width: 100%" />
										</td>
									</tr>					          
									<tr data-bind="visible: isEdit">				
										<td>លេខវិក្ក​យបត្រ</td>
										<td><input class="k-textbox" data-bind="value: obj.number" style="width:100%;" readonly /></td>
									</tr>
									<tr>
										<td>ចំណាត់ថ្នាក់</td>
										<td>
											<select data-role="multiselect" 
												   data-bind="source: segmentItemDS, value: obj.segments, events:{change: segmentChanges}" 
												   data-value-primitive="true"
												   data-value-field="id" 
												   data-text-field="name"
												   data-placeholder="(--- ជ្រើសរើស ---)"
												   style="width: 100%" /></select>
										</td>
									</tr>								           
									<tr>
										<td colspan="2">
											អាសយដ្ឋាន
											<br>
											<textarea id="address" cols="0" rows="2" class="k-textbox" style="width:100%;" data-bind="value: obj.bill_to"></textarea>
										</td>
									</tr>
								</table>
							</div>

						    <div class="span4">
						    	<div align="center">
						    		<span class="glyphicons standard circle_ok" data-bind="visible: paid"><i></i> ទូទាត់រួច</span>				    	
						    	</div>
						    </div>

							<div class="span4">
								<table class="table table-borderless table-condensed cart_total">
									<tr>
										<td>កាលបរិច្ឆេទ</td>
										<td>
											<input id="issuedDate" name="issuedDate" 
													data-role="datepicker"
													data-format="dd-MM-yyyy" 
													data-bind="value: obj.issued_date" 
													required data-required-msg="ត្រូវការ កាលបរិច្ឆេទ" />
										</td>
									</tr>												
									<tr>
										<td>ថ្ងៃរំពឹងទុក</td>
										<td>
											<input id="dueDate" name="dueDate" 
													data-role="datepicker"
													data-format="dd-MM-yyyy" 
													data-bind="value: obj.due_date" 
													required data-required-msg="ត្រូវការ ថ្ងៃរំពឹងទុក" />
										</td>
									</tr>													
						            <tr>
						            	<td>
						            		<input data-role="dropdownlist"
								                   data-option-label="(-- ទាញពី ---)"								                   
								                   data-value-primitive="true"
								                   data-text-field="name"
								                   data-value-field="id"
								                   data-bind="value: obj.reference_type,
								                              source: referenceTypes,
								                              events:{change: loadReference}"
								                   style="width: 100%" />						            						            		
						            	</td>				
										<td>
											<input data-role="dropdownlist"
													data-option-label="(--- ជ្រើសរើស ---)"
													data-auto-bind="false"
						              				data-value-primitive="true"
													data-text-field="number" 
						              				data-value-field="id"						              				 
						              				data-bind="value: obj.reference_id,
						              							source: referenceDS,
						              							enabled: bolReference,						              							
						              							events:{change: referenceChange}" />
										</td>
									</tr>								
								</table>           		          	
						    </div>
						</div>								
						
						<!-- Item List -->
						<table class="table table-bordered table-vertical-center table-pricing table-pricing-2">
							<thead>
								<tr>
									<th style="width: 5%;" class="center">ល.រ</th>
									<th class="center">ទំនិញ</th>								
									<th class="center">ពណ៌នា</th>
									<th style="width: 230px;" class="center">ចំនួន</th>
									<th style="width: 120px;" class="center">តំលៃ</th>
									<th style="width: 80px;" class="center">ទឹកប្រាក់</th>
									<th style="width: 1%;" class="center">vat</th>
								</tr>
							</thead>	            		
		            		<tbody id="lvInvoice" data-role="listview"
		            				data-auto-bind="false"	            					            					            					            			
					                data-template="so-row-template"
					                data-bind="source: lineDS">
					        </tbody>
		            	</table>						
						<button class="btn btn-inverse" data-bind="click: addRow"><i class="icon-plus icon-white"></i></button>
						
						<br>
						
						<!-- Lower Part -->
						<div class="row-fluid">				
							<div class="span8">
								សំគាល់:
								<br>
								<textarea id="memo" cols="0" rows="2" class="k-textbox" style="width:250px" data-bind="value: obj.memo" placeholder="សំគាល់ 1 (សំរាប់អតិថិជន)"></textarea>
								<textarea id="memo2" cols="0" rows="2" class="k-textbox" style="width:250px" data-bind="value: obj.memo2" placeholder="សំគាល់ 2 (សំរាប់ផ្ទៃក្នុង)"></textarea>
							</div>

							<div class="span4">
								<table width="100%">								
									<tr align="right">
										<td>សរុបរង:</td>
										<td width="50%"><span data-bind="text: sub_total"></span></td>
									</tr>								
									<tr align="right">
										<td align="top">
											<input data-role="dropdownlist"
												   data-option-label="(--- រើស VAT ---)"								                   
								                   data-auto-bind="false"
								                   data-value-primitive="true"
								                   data-text-field="name"
								                   data-value-field="id"
								                   data-bind="source: vatDS, value: obj.vat_id, events: {change: changes}"
								                   style="width: 130px;" />																										
										</td>
										<td><span data-bind="text: vat"></span></td>
									</tr>
									<tr align="right">
										<td>សរុប:</td>
										<td><span data-bind="text: total"></span></td>
									</tr>						
								</table>
							</div>													
						</div>

						<br>

						<!-- Buttons -->
						<div class="row-fluid">
				          	<!-- Form actions -->
							<div align="center">
								<span id="notification"></span>

								<span id="save" class="btn btn-icon btn-primary glyphicons circle_ok"><i></i>កត់ត្រា</span>
								<span class="btn btn-danger btn-icon glyphicons delete" data-bind="click: delete, visible: isEdit"><i></i>លុប</span>
								<span class="btn btn-icon btn-default glyphicons ban" data-bind="click: cancel"><i></i>បោះបង់</span>
								<span class="btn btn-primary btn-icon glyphicons print" data-bind="click: linkPrint, visible: isEdit"><i></i> បោះពុម្ព</span>
							</div>
							<!-- // Form actions END -->
						</div>						

					</div> <!-- End Widget-Body List -->
				</div>
				<!-- // Collapsible Widget END -->

			</div>							
		</div>
	</div>
</script>
<script id="so-row-template" type="text/x-kendo-tmpl">		
	<tr>		
		<td>
			<i class="icon-trash" data-bind="events: { click: removeRow }"></i>
			#:banhji.so.lineDS.indexOf(data)+1#			
		</td>		
		<td>
			<input id="ccbItem" name="ccbItem"
				   data-role="combobox"
				   data-auto-bind="false"                   
                   data-value-primitive="true"				   
                   data-text-field="name"
                   data-value-field="id"
                   data-bind="value: item_id, source: itemList, events: {change : itemChanges}"
                   required data-required-msg="ត្រូវការ ទំនិញ" style="width: 100%" />			
		</td>		
		<td>
			<input id="description" name="description" type="text"
					class="k-textbox" 
					data-bind="value: description"					 
					required data-required-msg="ត្រូវការ ពណ៌នា"
					style="width: 100%; margin-bottom: 0;" />
		</td>
		<td>
			<input id="unit" name="unit" data-role="numerictextbox" 
					data-format="n0" data-min="1"
					data-bind="value: unit, events: {change : changes}"
					required data-required-msg="ត្រូវការ ចំនួន" style="width: 100px;" />

			<input data-role="dropdownlist"
				   data-option-label="(--- រើស ---)"
                   data-auto-bind="false"
                   data-value-primitive="true"
                   data-text-field="measurement"
                   data-value-field="measurement_id"
                   data-bind="source: priceList, value: measurement_id, events: {change: measurementChanges}"
                   style="width: 100px;" />
		</td>					
		<td>
			<input id="price" name="price" data-role="numerictextbox" 
					data-format="c" data-culture=#:locale#
					data-bind="value: price, events: {change : changes}" 
					required data-required-msg="ត្រូវការ តំលៃ" style="width: 100%;" />
		</td>		
		<td class="right">
			<span data-format="n" 
					data-culture=#:locale#
					data-bind="text: amount" 
					style="width: 100%;"></span> 						
		</td>
		<td>
			<input type="checkbox" data-bind="checked: has_vat, events: {change : changes}" />			
		</td>		
    </tr>   
</script>
<script id="so-contact-combobox-template" type="text/x-kendo-template">	
	#=number# #=fullname#
</script>

<script id="gdn" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="container-960">					
			<div id="example" class="k-content">

				<!-- Collapsible Widget -->			
				<div class="widget">
				    <div class="widget-head">
				    	<span class="btn btn-primary pull-right" 
								onclick="javascript:window.history.back()">X</span>
				        
				        <h4 class="heading glyphicons notes"><i></i>លិខិតដឹកជញ្ជូន</h4>							        	
				    </div>
				    <div class="widget-body">					
						
						<!-- Upper Part -->
						<div class="row-fluid">
							<div class="span4">				
								<table class="table table-borderless table-condensed cart_total">
									<tr>
										<td>អតិថិជន</td>
										<td>
											<input id="cbbCustomer" name="cbbCustomer" 
							    				   data-role="combobox"
								                   data-placeholder="អតិថិជន..."
								                   data-auto-bind="false"
								                   data-value-primitive="true"
								                   data-filter="search"							                   
								                   data-min-length="3"							                   
								                   data-text-field="fullname"
								                   data-value-field="id"
								                   data-template='gdn-contact-combobox-template'
								                   data-bind="value: obj.contact_id,
								                              source: contactDS,
								                              events:{change:contactChanges}"
								                   required data-required-msg="ត្រូវការ អតិថិជន"
								                   style="width: 100%" />
										</td>
									</tr>					          
									<tr data-bind="visible: isEdit">				
										<td>លេខលិខិតដឹកជញ្ជូន</td>
										<td><input class="k-textbox" data-bind="value: obj.number" style="width:100%;" readonly /></td>
									</tr>															           
									<tr>
										<td colspan="2">
											អាសយដ្ឋាន
											<br>
											<textarea id="address" cols="0" rows="2" class="k-textbox" style="width:100%;" data-bind="value: obj.bill_to"></textarea>
										</td>
									</tr>
								</table>
							</div>

						    <div class="span4">
						    	<div align="center">
						    		<span class="glyphicons standard circle_ok" data-bind="visible: paid"><i></i> ទូទាត់រួច</span>				    	
						    	</div>
						    </div>

							<div class="span4">
								<table class="table table-borderless table-condensed cart_total">
									<tr>
										<td>កាលបរិច្ឆេទ</td>
										<td>
											<input id="issuedDate" name="issuedDate" 
													data-role="datepicker"
													data-format="dd-MM-yyyy" 
													data-bind="value: obj.issued_date" 
													required data-required-msg="ត្រូវការ កាលបរិច្ឆេទ" />
										</td>
									</tr>																		
						            <tr>
						            	<td>
						            		<input data-role="dropdownlist"
								                   data-option-label="(-- ទាញពី ---)"								                   
								                   data-value-primitive="true"
								                   data-text-field="name"
								                   data-value-field="id"
								                   data-bind="value: obj.reference_type,
								                              source: referenceTypes,
								                              events:{change: loadReference}"
								                   style="width: 100%" />						            						            		
						            	</td>				
										<td>
											<input data-role="dropdownlist"
													data-auto-bind="false"
						              				data-value-primitive="true"
													data-text-field="number" 
						              				data-value-field="id"						              				 
						              				data-bind="value: obj.reference_id,
						              							source: referenceDS,
						              							enabled: bolReference,						              							
						              							events:{change: referenceChange}" 
						              				data-option-label="(--- ជ្រើសរើស ---)" />
										</td>
									</tr>								
								</table>           		          	
						    </div>
						</div>								
						
						<!-- Item List -->
						<table class="table table-bordered table-vertical-center table-pricing table-pricing-2">
							<thead>
								<tr>
									<th style="width: 5%;" class="center">ល.រ</th>
									<th class="center">ទំនិញ</th>								
									<th class="center">ពណ៌នា</th>
									<th style="width: 250px;" class="center">ចំនួន</th>									
								</tr>
							</thead>	            		
		            		<tbody id="lvInvoice" data-role="listview"
		            				data-auto-bind="false"	            					            					            					            			
					                data-template="gdn-row-template"
					                data-bind="source: lineDS">
					        </tbody>
		            	</table>						
						<button class="btn btn-inverse" data-bind="click: addRow"><i class="icon-plus icon-white"></i></button>
						
						<br>
						
						<!-- Lower Part -->
						<div class="row-fluid">				
							<div class="span8">
								សំគាល់:
								<br>
								<textarea id="memo" cols="0" rows="2" class="k-textbox" style="width:250px" data-bind="value: obj.memo" placeholder="សំគាល់ 1 (សំរាប់អតិថិជន)"></textarea>
								<textarea id="memo2" cols="0" rows="2" class="k-textbox" style="width:250px" data-bind="value: obj.memo2" placeholder="សំគាល់ 2 (សំរាប់ផ្ទៃក្នុង)"></textarea>
							</div>

							<div class="span4">
								<table width="100%">									
									<tr align="right">
										<td>សរុប:</td>
										<td><span data-bind="text: total"></span></td>
									</tr>						
								</table>
							</div>													
						</div>

						<br>

						<!-- Buttons -->
						<div class="row-fluid">
				          	<!-- Form actions -->
							<div align="center">
								<span id="notification"></span>

								<span id="save" class="btn btn-icon btn-primary glyphicons circle_ok"><i></i>កត់ត្រា</span>
								<span class="btn btn-danger btn-icon glyphicons delete" data-bind="click: delete, visible: isEdit"><i></i>លុប</span>
								<span class="btn btn-icon btn-default glyphicons ban" data-bind="click: cancel"><i></i>បោះបង់</span>
								<span class="btn btn-primary btn-icon glyphicons print" data-bind="click: linkPrint, visible: isEdit"><i></i> បោះពុម្ព</span>
							</div>
							<!-- // Form actions END -->
						</div>						

					</div> <!-- End Widget-Body List -->
				</div>
				<!-- // Collapsible Widget END -->

			</div>							
		</div>
	</div>
</script>
<script id="gdn-row-template" type="text/x-kendo-tmpl">		
	<tr>		
		<td>
			<i class="icon-trash" data-bind="events: { click: removeRow }"></i>
			#:banhji.gdn.lineDS.indexOf(data)+1#			
		</td>		
		<td>
			<input id="ccbItem" name="ccbItem"
				   data-role="combobox"
				   data-auto-bind="false"                   
                   data-value-primitive="true"				   
                   data-text-field="name"
                   data-value-field="id"
                   data-bind="value: item_id, source: itemList, events: {change : itemChanges}"
                   required data-required-msg="ត្រូវការ ទំនិញ" style="width: 100%" />			
		</td>		
		<td>
			<input id="description" name="description" type="text"
					class="k-textbox" 
					data-bind="value: description"					 
					required data-required-msg="ត្រូវការ ពណ៌នា"
					style="width: 100%; margin-bottom: 0;" />
		</td>
		<td>
			<input id="unit" name="unit" data-role="numerictextbox" 
					data-format="n0" data-min="1"
					data-bind="value: unit, events: {change : changes}"
					required data-required-msg="ត្រូវការ ចំនួន" style="width: 100px;" />

			<input data-role="dropdownlist"
				   data-option-label="(--- រើស ---)"
                   data-auto-bind="false"
                   data-value-primitive="true"
                   data-text-field="measurement"
                   data-value-field="measurement_id"
                   data-bind="source: priceList, value: measurement_id, events: {change: measurementChanges}"
                   style="width: 100px;" />
		</td>				
    </tr>   
</script>
<script id="gdn-contact-combobox-template" type="text/x-kendo-template">	
	#=number# #=fullname#
</script>

<script id="statement" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="container-960">					
			<div id="example" class="k-content">

				<!-- Collapsible Widget -->			
				<div class="widget">
				    <div class="widget-head hidden-print">
				    	<span class="btn btn-primary pull-right" 
								onclick="javascript:window.history.back()">X</span>
				        
				        <h4 class="heading glyphicons notes"><i></i>បញ្ជីសមតុល្យ</h4>							        	
				    </div>
				    <div class="widget-body">					
					
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
					           placeholder="ចាប់ពីថ្ងៃទី" />
					        
					       	<input id="edate" name="edate"						           
					           data-bind="value: edate"
					           placeholder="ដល់ថ្ងៃទី" />						        	                    	            	
					  		
					  		<button id="search" type="button" data-role="button"><i class="icon-search"></i></button>
					  		|
							<button type="button" data-role="button" onclick="javascript:window.print()"><i class="icon-print"></i></button>					    	
					    </div>

					    <br>					    

					    <div align="center">
							<h3>បញ្ជីសមតុល្យ | Statement</h3>
							
							<span id="strDate"></span>														
						</div>

						<div class="well">
							<table class="table table-invoice">
								<tbody>
									<tr>
										<td style="width: 50%;">											
											<h2 data-bind="text: company.name"></h2>
											<address class="margin-none">												
												<p data-bind="text: company.address"></p>												
												<abbr>អុីម៉ែល:</abbr> <span data-bind="text: company.email"></span> <br> 
												<abbr>ទូរស័ព្ទ:</abbr> <span data-bind="text: company.mobile"></span> <br>
												<abbr>ទូរស័ព្ទតុ:</abbr> <span data-bind="text: company.phone"></span>
											</address>
										</td>
										<td class="right">											
											<h2 data-bind="text: obj.fullname"></h2>
											<address class="margin-none">
												<p data-bind="text: obj.bill_to"></p>
												<abbr>អុីម៉ែល:</abbr> <span data-bind="text: obj.email"></span> <br> 
												<abbr>ទូរស័ព្ទ:</abbr> <span data-bind="text: obj.phone"></span>												
											</address>
											<br>
											<div style="font-size: x-large;">សរុប៖ <span data-bind="text: total"></span></div>
										</td>
									</tr>
								</tbody>
							</table>
						</div>

						<br>			        
					    
					    <div id="gridAging"></div>

					    <br>

					    <table id="grid">			                
			                <thead>
			                    <tr>
			                        <th>កាលបរិច្ឆេទ</th>
			                        <th>ពណ៌នា</th>
			                        <th>ទឹកប្រាក់</th>			                        
			                    </tr>
			                </thead>
			                <tbody></tbody>
			            </table>	
						
					</div> <!-- End Widget-Body List -->
				</div>
				<!-- // Collapsible Widget END -->

			</div>							
		</div>
	</div>
</script>
<script id="statement-row-template" type="text/x-kendo-template">	
	<tr data-uid="#: uid #">
		<td>#=kendo.toString(new Date(issued_date), "dd-MM-yyyy")#</td>
		<td>#=description#</td>
		<td align="right">#=kendo.toString(amount, "c", locale)#</td>		
	</tr>
</script>

<script id="customerReportCenter" type="text/x-kendo-template">
	<h2>របាយការណ៍</h2>
	<br>

	<div class="row-fluid">
		<div class="span3">
			<h4>ពត៌មានគ្របគ្រងអតិថិជន</h4>
			<div class="well margin-none" style="height: 150px;">
				Description here...
				<ul>
					<li><a href='#/wCustomer_list'>បញ្ជីអតិថិជន</a></li>
	  				<li><a href='#/wBrand_new_customer'>អតិថិជនថ្មី</a></li>	  				
				</ul>
			</div>
		</div>
		<div class="span3">
			<h4>គណនីអតិថិជន</h4>
			<div class="well margin-none" style="height: 150px;">
				Description here...
				<ul>
					<li><a href='#/wCustomer_balance'>បញ្ជីសមតុល្យអតិថិជន</a></li>	  				 				  				
	  				<br>  
	  				<li><a href='#/wAging_summary'>បញ្ជីបំណុលអតិថិជនសង្ខេប</a></li> 
	  				<li><a href='#/wAging_detail'>បញ្ជីបំណុលអតិថិជនលំអិត</a></li>
				</ul>
			</div>
		</div>
		<div class="span3">
			<h4>របាយការណ៍លក់</h4>
			<div class="well margin-none" style="height: 150px;">
				Description here...
				<ul>
					<li><a href='#/wSale_summary'>របាយការណ៍លក់សង្ខេប</a></li>
	  				<li><a href='#/wSale_detail'>របាយការណ៍លក់លំអិត</a></li>	  				
				</ul>
			</div>
		</div>
		<div class="span3">
			<h4>របាយការណ៍ទទួលប្រាក់</h4>
			<div class="well margin-none" style="height: 150px;">
				Description here...
				<ul>
					<li><a href='#/wPayment_summary'>ទទួលប្រាក់សង្ខេប</a></li> 
  					<li><a href='#/wPayment_detail'>ទទួលប្រាក់លំអិត</a></li>
  					<br>  
	  				<li><a href='#/wPayment_by_source_summary'>របាយការណ៍ទទួលប្រាក់តាមប្រភពសង្ខេប</a></li>
	  				<li><a href='#/wPayment_by_source_detail'>របាយការណ៍ទទួលប្រាក់តាមប្រភពលំអិត</a></li> 
				</ul>
			</div>
		</div>
	</div>

	<p class="separator text-center"><i class="icon-ellipsis-horizontal icon-3x"></i></p>
</script>


<!-- ***************************
 *	Cashier Section      	  *
**************************** -->
<script id="cashier" type="text/x-kendo-template">
	<div class="container-fluid">
		<div class="row-fluid">				
			<div class="span12">
				<div id="example" class="k-content">
					<span class="pull-right glyphicons no-js remove_2" 
						onclick="javascript:window.history.back()"><i></i></span>

					<h3>បេឡាករ</h3>

					<div class="row-fluid">
						<div class="span3">
							<br>

							<input id="ddlContact" data-bind="value: customer_id" style="width: 100%"  />

							<br><br>							
					      					
							<h5><i class="icon-info-sign"></i> ពត៌មានសង្ខេបអតិថិជន</h5>				
							<table width="100%" style="background-color:Silver; color:black;">
								<tr>
									<td colspan="2">
										<i class="icon-user icon-li icon-fixed-width"></i> 
										<span data-bind="text: customer.fullIdName"></span>										
									</td>																			
								</tr>
								<tr>
									<td colspan="2">								
										សមតុល្យ: <span data-bind="text: customer.balance"></span>
										<span data-bind="text: customer.currency[0].code">
									</td>
								</tr>
								<tr>
									<td colspan="2">
										ប្រាក់កក់: <span data-bind="text: customer.deposit"></span>
										<span data-bind="text: customer.currency[0].code">
									</td>							
								</tr>
								<tr>
									<td>
										<i class="icon-money icon-li icon-fixed-width"></i> <span data-bind="text: customer.currency[0].code"></span>
									</td>
									<td>
										<i class="icon-phone icon-li icon-fixed-width"></i> <span data-bind="text: customer.phone"></span>
									</td>
								</tr>											
								<tr>
									<td colspan="2">
										<i class="icon-home icon-li icon-fixed-width"></i> <span data-bind="text: customer.address"></span>
									</td>						
								</tr>
							</table>

							<br>			
							
							<h5><i class="icon-list"></i> ប្រតិបត្តិការ</h5>

							<table class="table table-bordered table-striped table-white">
						        <thead>
						            <tr>
						            	<th>កាលបរិច្ឆេទ</th>						                
						                <th>ប្រភេទ</th>						                
						                <th>ទឹកប្រាក់</th>						                						                
						            </tr>
						        </thead>
						        <tbody data-role="listview"
						        		data-auto-bind="false"					        		 
						        		data-template="cashier-transaction-row-template" 
						        		data-bind="source: transactionDS"></tbody>						        					        
						    </table>
							
							<div id="pager" class="k-pager-wrap"					    		
				             	data-role="pager"
				             	data-auto-bind="false" 
				             	data-bind="source: transactionDS"></div>
						
						</div> <!-- //End span3 -->

						<div id="exampleValidator" class="span9">
							<div class="row-fluid">
								<div class="span4">
									<div class="innerAll padding-bottom-none-phone">
										<a href="javascript:void(0)" class="widget-stats widget-stats-gray widget-stats-4"> 
											<span class="txt">អតិថិជន</span>
											<span class="count" data-bind="text: total_customer"></span>
											<span class="glyphicons user"><i></i></span>
											<div class="clearfix"></div>
											<i class="icon-play-circle"></i> 
										</a>
									</div>
								</div>

								<div class="span4">
									<div class="innerAll padding-bottom-none-phone">
										<a href="#/wPayment_summary" class="widget-stats widget-stats-primary widget-stats-4">
											<span class="txt">បង់ប្រាក់ប្រចាំថ្ងៃ</span>
											<span class="count"><span data-bind="text: total_payment" style="font-size: 35px;"></span></span>
											<span class="glyphicons coins"><i></i></span>
											<div class="clearfix"></div>
											<i class="icon-play-circle"></i>
										</a>
									</div>
								</div>

								<div class="span4">
									<div class="innerAll padding-bottom-none-phone">
										<a href="#/reconcile" class="widget-stats widget-stats-inverse widget-stats-5">
											<span class="glyphicons refresh"><i></i></span>
											<span class="txt">ផ្ទៀងផ្ទាត់ &<br><br> ផ្ទេរសាច់ប្រាក់</span>
											<div class="clearfix"></div>
										</a>
									</div>
								</div>				

							</div> <!-- //End row-fluid -->
														
							<br>

							<table class="table table-bordered table-striped table-white">
						        <thead>
						            <tr>
						                <th></th>
						                <th>ល.រ</th>						                
						                <th>កាលបរិច្ឆេទ</th>
						                <th>ឈ្មោះ</th>
						                <th>វិក្កយបត្រ</th>
						                <th class="right">ទឹកប្រាក់</th>
						                <th class="right">ទទួលប្រាក់</th>							                
						            </tr>
						        </thead>
						        <tbody data-role="listview"
						        		data-auto-bind="false"					        		 
						        		data-template="cashier-row-template" 
						        		data-bind="source: invoiceList"></tbody>
						        <tfoot data-template="cashier-footer-template" 
						        		data-bind="source: this"></tfoot>						        
						    </table>						    

							<br>
							
							<span id="notification"></span>

							<div class="row-fluid">
								<div class="span4">						
									<table>
										<tr>
											<td>ថ្ងៃទទួលប្រាក់</td>
						              		<td>
						              			<input id="txtPaymentDate" name="txtPaymentDate" 
						              				data-role="datepicker" 
						              				data-format="dd-MM-yyyy"
						              				data-parse-formats="dd-MM-yyyy"
							              			data-bind="value: payment_date" 
							              			required data-required-msg="ត្រូវការ ថ្ងៃទទួលប្រាក់" />
											</td>
										</tr>										
										<tr>
						                    <td>វីធីបង់ប្រាក់</td>
						                  	<td>
						                  		<input id="ddlPaymentMethod" id="ddlPaymentMethod"
						                  			   data-role="dropdownlist"
									                   data-auto-bind="false"
									                   data-value-primitive="true"
									                   data-text-field="name"
									                   data-value-field="id"
									                   data-bind="value: payment_method_id,
									                              source: paymentMethodDS"									                   
									                   required data-required-msg="ត្រូវការ វីធីបង់ប្រាក់" />						                  					                  		
						                  	</td>
						                <tr>
										<tr>
							                <td>លេខកូដសែក</td>
							                <td><input id="check_no" class="k-textbox" data-bind="value: check_no" style="width: 161px;" /></td>
							            <tr>
							            <tr>
											<td>គណនីសាច់ប្រាក់</td>
											<td>
												<input id="ddlCashAccount" name="ddlCashAccount" 
														data-bind="value: cash_account_id" 
														required data-required-msg="ត្រូវការ គណនីសាច់ប្រាក់" />												
											</td>
										</tr>										
									</table>							
								</div>																
								<div class="span4">
									<table>	
										<tr>
											<td>ទទួលប្រាក់សរុប:</td>
											<td align="right"><span data-bind="text: pay_amount"></span></td>
										</tr>									
										<tr>
											<td>បញ្ចុះតំលៃ:</td>
											<td>
												<input data-role="numerictextbox" 
														data-format="c0" data-culture="km-KH" 
														data-bind="value: discount, events: {change : change}" />
											</td>
										</tr>
										<tr>
											<td>ទឹកប្រាក់ពិន័យ:</td>							
											<td>
												<input data-role="numerictextbox" 
														data-format="c0" data-culture="km-KH" 
														data-bind="value: fine, events: {change : change}" />
											</td>
										</tr>										
										<tr>
											<td>នៅខ្វះ</td>
											<td align="right"><span data-bind="text: remain"></span></td>
										</tr>
									</table>		          	
								</div>

								<div class="span4">
									<div class="innerAll padding-bottom-none-phone">
										<a id="save" name="save" class="widget-stats widget-stats-info widget-stats-4">
											<span class="txt">ទឹកប្រាក់ទទួលបាន</span>
											<span class="count" style="font-size: 35px;" data-bind="text: receive_amount"></span>
											<span class="glyphicons cart_in"><i></i></span>
											<div class="clearfix"></div>
											<i class="icon-play-circle"></i>
										</a>
									</div>								
								</div>
							</div>							

						</div> <!-- //End span9 -->
					</div>
				</div> <!-- //End example -->
			</div>
		</div>
	</div>
</script>
<script id="cashier-transaction-row-template" type="text/x-kendo-tmpl">
    <tr>        
        <td>#:kendo.toString(new Date(issued_date), "dd-MM-yy")#</td>
        <td>#:type# </td>
        <td align="right">#:kendo.toString(kendo.parseFloat(amount), "c", locale)#</td>        
   	</tr>
</script>
<script id="cashier-row-template" type="text/x-kendo-tmpl">		
	<tr id="rowGrid-#:id#">
		<td>
			<input type="checkbox" data-bind="checked: isPay, events:{change: checkPay}">			
		</td>
		<td class="sno">1</td>			
		<td>#:kendo.toString(new Date(issued_date), "dd-MM-yyyy")#</td>		
		<td>#=fullname#</td>
		<td>#:number#</td>				
		<td class="right">#:kendo.toString(amount, "c", locale)#</td>
		<td class="right">
			<input data-role="numerictextbox" 
					data-format="c" data-culture=#:locale#
					data-bind="value: pay_amount, events: {change : change}" 
					style="width: 120px;">
			<i class="icon-trash" data-bind="events: { click: remove "></i>						
		</td>				
    </tr>   
</script>
<script id="cashier-footer-template" type="text/x-kendo-template">
    <tr>    	
        <td class="right" colspan="7" style="font-size:30px;">
            ប្រាក់ត្រូវបង់សរុប: #:total()#
        </td>
    </tr>
</script>

<script id="reconcile" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span12">
					<div id="example" class="k-content">						
						
						<span class="pull-right glyphicons no-js remove_2" 
							onclick="javascript:window.history.back()"><i></i></span>							

						<div align="center">
							<h4>របាយការណ៍ផ្ទៀងផ្ទាត់ និង ផ្ទេរសាច់ប្រាក់</h4>
							ថ្ងៃទី
							<span data-bind="text: str_date()"></span>
							<br>
							ដោយ
							<span data-bind="text: cashier_name"></span>
						</div>

						<table class="table table-bordered table-white">
		            		<thead>
		            			<tr>
		            				<th>ប្រាក់</th>	            				
		            				<th>ចំនួនប្រាក់ដុល្លា</th>
		            				<th>ចំនួនប្រាក់រៀល</th>
		            				<th>ទឹកប្រាក់ជាដុល្លា</th>
		            				<th>ទឹកប្រាក់ជារៀល</th>	            				
		            				<th>ចំ.ប្រាក់ដុល្លាផ្ទេរ</th>
		            				<th>ចំ.ប្រាក់រៀលផ្ទេរ</th>
		            				<th>ប្រាក់ជាដុល្លាផ្ទេរ</th>
		            				<th>ប្រាក់ជារៀលផ្ទេរ</th>		            				
		            			</tr>
		            		</thead>
		            		<tbody id="lvReconcileItem" data-role="listview"
		            				data-auto-bind="false"			            			
					                data-template="denominationRowTemplate"
					                data-bind="source: reconcileItemDS">
					        </tbody>
		            	</table>

						<br>

						<div class="row-fluid">
							<!-- //Reconcile -->
							<div class="span6">
								<h4 class="heading">ផ្ទៀងផ្ទាត់</h4>

								<table class="table table-condensed">
									<tr>
										<td>ប្រាក់ទទួលបាន</td>
										<td></td>											
										<td class="right"><span class="count" data-bind="text: obj.received_amount"></span> ៛</td>												
									</tr>
									<tr>
										<td>ប្រាក់នៅសល់ពីមុន</td>
										<td></td>											
										<td class="right" style="border-bottom: 1px solid black;"><span class="count" data-bind="text: obj.previous_amount"></span> ៛</td>												
									</tr>
									<tr>
										<td>សមតុល្យសាច់ប្រាក់ (ក)</td>
										<td></td>												
										<td class="right"><span class="count" data-bind="text: obj.total_cash1"></span> ៛</td>
									</tr>

									<!-- Reconcile -->
									<tr>
										<td>ប្រាក់ជាដុល្លា</td>
										<td>
											$ <span class="count" data-bind="text: obj.usd_amount"></span> x
											<input data-role="numerictextbox" data-format="c0" data-culture="km-KH" data-min="0" data-bind="value: obj.rate, events:{change:change}"  style="width:90px;">
										</td>
										<td class="right"><span class="count" data-bind="text: obj.usd2khr_amount"></span> ៛</td>												
									</tr>
									<tr>
										<td>ប្រាក់ជារៀល</td>
										<td></td>
										<td class="right" style="border-bottom: 1px solid black;"><span class="count" data-bind="text: obj.total_cash2"></span> ៛</td>												
									</tr>
									<tr>
										<td>សាច់ប្រាក់ទទួលជាក់ស្ដែងសរុប (ខ)</td>
										<td></td>												
										<td class="right"><span class="count" data-bind="text: obj.reconciled_amount"></span> ៛</td>
									</tr>
									<tr id="reconcileAmount">
										<td>ផ្ទៀងផ្ទាត់(ក-ខ)</td>
										<td></td>												
										<td class="right"><span class="count" data-bind="text: obj.reconciled_amount"></span> ៛</td>
									</tr>																				
								</table>
							</div>

							<!-- //Transfer -->
							<div class="span6">								
								<h4 class="heading">ផ្ទេរសាច់ប្រាក់</h4>								
								
								<table class="table table-condensed">
									<tr>
										<td>ប្រាក់ផ្ទេរជាដុល្លា</td>
										<td>
											$ <span class="count" data-bind="text: obj.transfer_usd"></span> x
											<input data-role="numerictextbox" data-format="c0" data-culture="km-KH" data-min="0" data-bind="value: obj.rate, events:{change:change}"  style="width:90px;">												
										</td>
										<td class="right"><span class="count" data-bind="text: obj.usd2khr_transfer_amount"></span> ៛</td>												
									</tr>
									<tr>
										<td>ប្រាក់ផ្ទេរជារៀល</td>
										<td></td>
										<td class="right" style="border-bottom: 1px solid black;"><span class="count" data-bind="text: obj.transfer_khr"></span> ៛</td>												
									</tr>
									<tr>
										<td>ប្រាក់ផ្ទេរសរុប</td>
										<td></td>												
										<td class="right"><span class="count" data-bind="text: obj.transfered_amount"></span> ៛</td>
									</tr>
									<tr>
										<td>សាច់ប្រាក់ចុងគ្រា</td>
										<td></td>												
										<td class="right"><span class="count" data-bind="text: obj.balance"></span> ៛</td>
									</tr>
									<tr>
										<td>ផ្ទេរទៅគណនីណាមួយ</td>
										<td>
											<input id="ddlCashAccount" name="ddlCashAccount" 
													data-bind="value: obj.transfer_account_id" 
													required data-required-msg="ត្រូវការ ផ្ទេរទៅគណនីណាមួយ" />
										</td>
										<td>
											<!-- Class here -->
						              	</td>
									</tr>
									<tr class="top">
										<td>សំគាល់:</td>
										<td colspan="2">
											<textarea cols="0" rows="2" class="k-textbox" style="width:100%" data-bind="value: obj.memo"></textarea>
										</td>										
									</tr>								
								</table>																																			
							</div>									
						</div>

						<!-- Form actions -->
						<div align="right" data-bind="invisible: isExisting">
							<span id="notification"></span>

							<span class="btn btn-icon btn-success glyphicons share" data-bind="click: transferAll"><i></i>ផ្ទេរទាំងអស់</span>
							<span id="save" class="btn btn-icon btn-primary glyphicons circle_ok"><i></i>កត់ត្រាផ្ទៀងផ្ទាត់ និង ផ្ទេរសាច់ប្រាក់</span>							
							<span class="btn btn-icon btn-default glyphicons ban" data-bind="click: cancel"><i></i>បោះបង់</span>
						</div>
						<!-- // Form actions END -->

					</div><!-- //End div example-->
				</div><!-- //End div span12-->
			</div><!-- //End div row-fluid-->
		</div>
	</div>	
</script>
<script id="denominationRowTemplate" type="text/x-kendo-tmpl">		
	<tr>				
		<td class="right">#=denomination#</td>
		<td>
			<input data-role="numerictextbox" data-format="n0" data-min="0" style="width:90px;"
				data-bind="value: usd_qty, events: {change : change}" #: denomination>100 ? disabled="disabled" : "" # >
		</td>
		<td>
			<input data-role="numerictextbox" data-format="n0" data-min="0" style="width:90px;"
				data-bind="value: khr_qty, events: {change : change}" #: denomination<100 ? disabled="disabled" : "" # >
		</td>
		<td class="right">#:kendo.toString(usd_amount,'c')#</td>
		<td class="right">#:kendo.toString(khr_amount,'c0','km-KH')#</td>

		<td bgcolor="silver">
			<input data-role="numerictextbox" data-format="n0" data-min="0" style="width:90px;"
				data-bind="value: usd_transfer, events: {change : change}" #: denomination>100 ? disabled="disabled" : "" # >
		</td>
		<td bgcolor="silver">
			<input data-role="numerictextbox" data-format="n0" data-min="0" style="width:90px;"
				data-bind="value: khr_transfer, events: {change : change}" #: denomination<100 ? disabled="disabled" : "" # >
		</td>
		<td bgcolor="silver" class="right">#:kendo.toString(usd_transfer_amount,'c')#</td>
		<td bgcolor="silver" class="right">#:kendo.toString(khr_transfer_amount,'c0','km-KH')#</td>					
    </tr>   
</script>


<!-- ***************************
 *	Inventory Section      	  *
**************************** -->
<script id="itemDashBoard" type="text/x-kendo-template">
	
	<img src="uploads/pictures/banhji_inventory.png" width="300" height="100" />	

    <div class="widget widget-heading-simple widget-body-simple">		
		
		<div class="widget-body">

			<!-- Row -->
			<div class="row-fluid">
				<div class="span2">
				
					<!-- Stats Widget -->
					<a href="" class="widget-stats widget-stats-gray widget-stats-1">
						<span class="txt">ប្រភេទសន្និធិ</span>
						<div class="clearfix"></div>
						<span class="count">5</span>
					</a>
					<!-- // Stats Widget END -->
					
				</div>
				<div class="span2">
				
					<!-- Stats Widget -->
					<a href="" class="widget-stats widget-stats-1">
						<span class="txt">អនុបាតចំណេញដុលមធ្យម</span>
						<div class="clearfix"></div>
						<span class="count">10%</span>
					</a>
					<!-- // Stats Widget END -->
					
				</div>
				<div class="span2">
				
					<!-- Stats Widget -->
					<a href="" class="widget-stats widget-stats-gray widget-stats-2">
						<span class="count">30</span>
						<span class="txt">ថ្ងៃនៃរយ:ពេលបង្វិលសន្និធិជមធ្យម</span>
					</a>
					<!-- // Stats Widget END -->
					
				</div>
				<div class="span6">
				
					<!-- Stats Widget -->
					<a href="" class="widget-stats widget-stats-2">
						<span class="count">100,000,000</span>
						<span class="txt">ថ្លៃដើមសរុបសន្និធិដែលមាន</span>
					</a>
					<!-- // Stats Widget END -->
					
				</div>								
			</div>
			<!-- // Row END -->
			
		</div>
	</div>

	<br>

	<div class="row-fluid">
		<div class="span4">
			<h4>សន្និធិ ៥ ដែលមានរយ:ពេលយូជាងគេ</h4>
			
			<table class="table table-bordered table-primary table-striped table-vertical-center">
		        <thead>
		            <tr>
		                <th style="width: 1%;" class="center">ល.រ</th>
		                <th>មុខទំនិញ</th>
		                <th>សមតុល្យ</th>
		                <th>%</th>
		                <th>ថ្ងៃ</th>
		            </tr>
		        </thead>
		        <tbody data-role="listview"
		        	 data-auto-bind="false"                 
	                 data-template="itemDashBoard-top-worst-item-template"
	                 data-bind="source: topWorstItemDS"></tbody>			        
		    </table>			
		</div>
		<div class="span4">
			<h4>អ្នកផ្គត់ផ្គង់សន្និធិធំៗ ៥</h4>
			<table class="table table-bordered table-primary table-striped table-vertical-center">
		        <thead>
		            <tr>
		                <th style="width: 1%;" class="center">ល.រ</th>
		                <th>មុខទំនិញ</th>
		                <th>ទិញសរុប</th>
		                <th>%</th>		                
		            </tr>
		        </thead>
		        <tbody data-role="listview"
		        	 data-auto-bind="false"                 
	                 data-template="itemDashBoard-top-vendor-item-template"
	                 data-bind="source: topVendorItemDS"></tbody>			        
		    </table>
		</div>
		<div class="span4">
			<h4>សន្និធិ ៥ ដែលលក់ដាច់ជាងគេបំផុត</h4>
			<table class="table table-bordered table-primary table-striped table-vertical-center">
		        <thead>
		            <tr>
		                <th style="width: 1%;" class="center">ល.រ</th>
		                <th>មុខទំនិញ</th>
		                <th>ទឹកប្រាក់</th>
		                <th>%</th>
		                <th>%Margin</th>		                
		            </tr>
		        </thead>
		        <tbody data-role="listview"
		        	 data-auto-bind="false"                 
	                 data-template="itemDashBoard-top-sale-item-template"
	                 data-bind="source: topSaleItemDS"></tbody>			        
		    </table>
		</div>		
	</div>

	<p class="separator text-center"><i class="icon-ellipsis-horizontal icon-3x"></i></p>
</script>
<script id="itemDashBoard-top-worst-item-template" type="text/x-kendo-tmpl">
	<tr>
		<td>#:banhji.itemDashBoard.topWorstItemDS.indexOf(data)+1#</td>		
		<td>#=sku# #=name#</td>
		<td>#=amount#</td>
		<td>#=amount#</td>
		<td>#=amount#</td>
	</tr>
</script>
<script id="itemDashBoard-top-vendor-item-template" type="text/x-kendo-tmpl">
	<tr>
		<td>#:banhji.itemDashBoard.topVendorItemDS.indexOf(data)+1#</td>		
		<td>#=sku# #=name#</td>
		<td>#=amount#</td>
		<td>#=amount#</td>		
	</tr>
</script>
<script id="itemDashBoard-top-sale-item-template" type="text/x-kendo-tmpl">
	<tr>
		<td>#:banhji.itemDashBoard.topSaleItemDS.indexOf(data)+1#</td>		
		<td>#=sku# #=name#</td>
		<td>#=amount#</td>
		<td>#=amount#</td>
		<td>#=amount#</td>
	</tr>
</script>
<script id="itemCenter" type="text/x-kendo-template">
	<div class="container-fluid">
		<br>
		<span class="pull-right glyphicons no-js remove_2" 
			onclick="javascript:window.history.back();"><i></i></span>

		<h3>សន្និធិ</h3>

		<div class="box-generic">
		    <!-- //Tabs Heading -->
		    <div class="tabsbar">
		        <ul>
		            <li class="glyphicons star active"><a href="#tab1" data-toggle="tab" data-bind="click: searchFavorite"><i></i> ប្រើញឹកញប់ </a>
		            </li>
		            <li class="glyphicons list"><a href="#tab2" data-toggle="tab"><i></i> ប្រភេទ </a>
		            </li>
		            <li class="glyphicons building"><a href="#tab3" data-toggle="tab"><i></i> ក្រុមហ៊ុន </a>
		            </li>		            		            	            
		        </ul>
		    </div>
		    <!-- // Tabs Heading END -->

		    <div class="tab-content">
		        <!-- // FavoriteTab content -->
		        <div class="tab-pane active" id="tab1">
		        		
		        </div>
		        <!-- // Favorite Tab content END -->

		        <!-- // Category Tab content -->
		        <div class="tab-pane" id="tab2">		            
	                <input id="categories" data-bind="value: category_id" />	                
	                <input id="itemGroups" data-bind="value: item_group_id" disabled="disabled" />
            	</div>
		        <!-- // Category Tab content END -->

		        <!-- // Vendor Tab content -->
		        <div class="tab-pane" id="tab3">
		            <div data-role="listview"
		            	 data-auto-bind="false"
		            	 data-selectable="true"			                 
		                 data-template="vendor-item-center-template"
		                 data-bind="source: vendorDS, events:{ change: vendorChanges}"></div>
		        </div>
		        <!-- // Vendor Tab content END -->		        
		    </div>

		    <br>

		    <div class="input-append">
			    <input class="col-md-2" id="appendedInputButtons" 
			    	type="text" placeholder="មុខទំនិញ ..." 
			    	data-bind="value: searchField, events:{ change: search }">

			    <button class="btn btn-default" data-bind="click: search"><i class="icon-search"></i> ស្វែងរក</button>				    
			</div>
		</div>
		
		<br>

		<table class="table table-bordered">
	        <thead>
	            <tr>
	                <th>លេខកូដ</th>
	                <th>មុខទំនិញ</th>
	                <th>ពណ៌នា</th>
	                <th>ចំនួន</th>	                
	                <th>លក់</th>	                
	                <th></th>
	            </tr>
	        </thead>
	        <tbody data-template="item-center-template"
	        	data-pageable="true" 
	        	data-bind="source: dataSource"></tbody>
	    </table>
	    <div id="pager" class="k-pager-wrap"
	    	 data-auto-bind="false"
             data-role="pager" data-bind="source: dataSource"></div>        

	</div>
</script>
<script id="item-center-template" type="text/x-kendo-template">
    <tr>
    	<td>#=sku#</td>
    	<td>#=name#</td>
    	<td>#=description#</td>
    	<td>
    		#if(on_hand<=order_point){#    		
    			<span class="badge badge-danger">#=kendo.toString(on_hand, "n0")#</span>
    		#}else{#
    			<span class="badge badge-info">#=kendo.toString(on_hand, "n0")#</span>
    		#}#

    		#=measurement==null?"":measurement#
    	</td>    	
    	<td>
    		#for(var i=0; i<price_list.length; i++) {#
    			#if(price_list[i].price>0){#
    				<span class="badge badge-inverse"> #=kendo.toString(price_list[i].price, "c", price_list[i].locale)# </span> / #=price_list[i].measurement# 
    			#}else{#
    				<span class="badge badge-danger"> #=kendo.toString(price_list[i].price, "c", price_list[i].locale)# </span> / #=price_list[i].measurement#
    			#}#
    			<br>    			    						 
			#}#
    	</td>    	
    	<td>
    		<div class="btn-group">
    			<button class="btn btn-default">ធ្វើការ</button>		  	
			  	<button class="btn dropdown-toggle" data-toggle="dropdown">
			    	<span class="caret"></span>
			  	</button>
			  	<ul class="dropdown-menu">
			  		#if(is_assemble=="1"){#
			   			<li><a href="\#/item_assembly/#=id#"><i class="icon-edit"></i> កែប្រជុំមុខទំនិញ</a></li>			   		
			   		#}else if(is_catalog=="1"){#
			   			<li><a href="\#/item_catalog/#=id#"><i class="icon-edit"></i> កែកាតាឡុក</a></li>			   		
			   		#}else{#
			   			<li><a href="\#/price_list/#=id#"><i class="icon-usd"></i> កំណត់តំលៃ</a></li>			   			
			   			<li><a href="\#/item/#=id#"><i class="icon-edit"></i> កែមុខទំនិញ</a></li>
			   		#}#
			  	</ul>
			</div>
    	</td>    		
    </tr>
</script>
<script id="category-item-center-template" type="text/x-kendo-template">
	<span class="btn btn-success">#=name#</span>   
</script>
<script id="vendor-item-center-template" type="text/x-kendo-template">
    <div class="product-tmpl">
        <img src="#=image_url#" alt="#: company # image" />
        <h3>#:company#</h3>        
    </div>    
</script>
<style>
    #listView {
        padding: 10px 5px;
        margin-bottom: -1px;
        min-height: 510px;
    }
    .product-tmpl {
        float: left;
        position: relative;
        width: 111px;
        height: 170px;
        margin: 0 5px;
        padding: 0;
    }
    .product-tmpl img {
        width: 110px;
        height: 110px;
    }
    .product-tmpl h3 {
        margin: 0;
        padding: 3px 5px 0 0;
        max-width: 96px;
        overflow: hidden;
        line-height: 1.1em;
        font-size: .9em;
        font-weight: normal;
        text-transform: uppercase;
        color: #999;
    }
    .product-tmpl p {
        visibility: hidden;
    }
    .product-tmpl:hover p {
        visibility: visible;
        position: absolute;
        width: 110px;
        height: 110px;
        top: 0;
        margin: 0;
        padding: 0;
        line-height: 110px;
        vertical-align: middle;
        text-align: center;
        color: #fff;
        background-color: rgba(0,0,0,0.75);
        transition: background .2s linear, color .2s linear;
        -moz-transition: background .2s linear, color .2s linear;
        -webkit-transition: background .2s linear, color .2s linear;
        -o-transition: background .2s linear, color .2s linear;
    }
    .k-listview:after {
        content: ".";
        display: block;
        height: 0;
        clear: both;
        visibility: hidden;
    }
</style>
<script id="item" type="text/x-kendo-template">
	<div class="container-960">
		<div id="example" class="k-content">
			
			<!-- Collapsible Widget -->			
			<div class="widget">
			    <div class="widget-head">
			    	<span class="btn btn-primary pull-right" 
							onclick="javascript:window.history.back()">X</span>
			        
			        <h4 class="heading glyphicons cargo"><i></i> ទំនិញ</h4>							        	
			    </div>
			    <div class="widget-body">					
					
			    	<div class="row-fluid">
			    		<div class="span6 well">									
							<div class="row-fluid">
								<div class="span6">														
									<!-- Group -->
									<div class="control-group">										
										<label for="ddlCategory">ក្រុម <span style="color:red">*</span></label>										
										<input id="ddlCategory" name="ddlCategory"
											   data-role="dropdownlist"
											   data-option-label="(--- ជ្រើសរើស ---)"							                   
							                   data-value-primitive="true"
							                   data-text-field="name"
							                   data-value-field="id"
							                   data-bind="value: obj.category_id,
						                              source: categoryDS"
						                       required data-required-msg="ត្រូវការ ក្រុម"
							                   style="width: 100%;" />									            
									</div>
									<!-- // Group END -->
								</div>

								<div class="span6">	
									<!-- Group -->
									<div class="control-group">										
										<label for="ddlMeasurement">ខ្នាត <span style="color:red">*</span></label>										
										<input id="ddlMeasurement" name="ddlMeasurement"
										   data-option-label="(--- ជ្រើសរើស ---)" 
										   data-role="dropdownlist"						                   
						                   data-value-primitive="true"
						                   data-text-field="name"
						                   data-value-field="id"
						                   data-bind="value: obj.measurement_id,
						                              source: measurementDS"
						                   required data-required-msg="ត្រូវការ ខ្នាត"
						                   style="width: 100%;" />									            
									</div>
									<!-- // Group END -->												
								</div>
							</div>
							
							<div class="row-fluid">
								<div class="span6">	
									<!-- Group -->
									<div class="control-group">							
										<label for="txtSKU">លេខកូដ <span style="color:red">*</span></label>
				              			<input id="txtSKU" name="txtSKU" class="k-textbox"
					              				data-bind="value: obj.sku" 
					              				placeholder="e.g. ID0001" 
					              				required data-required-msg="ត្រូវការ លេខកូដ"
					              				style="width: 100%;" />
					              		<span data-bind="visible: isDuplicateNumber" style="color: red;">លេខកូដនេះបានប្រើប្រាស់រូចហើយ</span>
									</div>
									<!-- // Group END -->		
								</div>

								<div class="span6">						
									<!-- Group -->
									<div class="control-group">							
										<label for="txtSupplierCode">លេខកូដតាមអ្នកផ្គតផ្គង់</label>
				              			<input id="txtSupplierCode" name="txtSupplierCode" class="k-textbox"
					              				data-bind="value: obj.supplier_code" 
					              				placeholder="e.g. VID0001"
					              				style="width: 100%;" />					              		
									</div>
									<!-- // Group END -->
								</div>								
							</div>

							<div class="row-fluid">
								<div class="span6">	
									<!-- Group -->
									<div class="control-group">
										<label for="txtName">មុខទំនិញ <span style="color:red">*</span></label>
					              		<input id="txtName" name="txtName" class="k-textbox" data-bind="value: obj.name" 
							              		placeholder="ឈ្មោះមុខទំនិញ..." required data-required-msg="ត្រូវការ មុខទំនិញ"
							              		style="width: 100%;" />
									</div>
									<!-- // Group END -->	 			
								</div>

								<div class="span6">
									<!-- Group -->
									<div class="control-group">								
										<label for="txtOnhand">ស្ថានភាព <span style="color:red">*</span></label>
							            <input id="ddlStatus" name="ddlStatus" 
				              				data-role="dropdownlist"
						            		data-text-field="name"
			           						data-value-field="id"
			           						data-value-primitive="true" 
						            		data-bind="source: statusList, value: obj.status"
						            		data-option-label="(--- ជ្រើសរើស ---)"
						            		required data-required-msg="ត្រូវការ ស្ថានភាព" style="width: 100%;" />
									</div>																		
									<!-- // Group END -->										
								</div>								
							</div>							
						</div>
						<div class="span6">
							<div class="row-fluid">
								<div class="span6">														
									<!-- Group -->
									<div class="control-group">								
										<label for="txtCost">ថ្លៃដើម</label>
							            <input data-role="numerictextbox"
						                   data-format="n0"
						                   data-min="0"						                   
						                   data-bind="value: obj.cost"
						                   style="width: 100%">
									</div>																		
									<!-- // Group END -->
								</div>

								<div class="span6">	
									<input type="checkbox" data-bind="checked: obj.favorite" />	ប្រើញឹកញប់									
								</div>
							</div>

							<div class="row-fluid">
								<div class="span6">														
									<!-- Group -->
									<div class="control-group">								
										<label for="txtOnhand">ចំនួន</label>
							            <input data-role="numerictextbox"
						                   data-format="n0"
						                   data-min="0"						                   
						                   data-bind="value: obj.on_hand"
						                   style="width: 100%">
									</div>																		
									<!-- // Group END -->
								</div>

								<div class="span6">	
									<!-- Group -->
									<div class="control-group">								
										<label for="txtOrderPoint">ចំនួនត្រូវការម៉ង់ឡើងវិញ</label>
							            <input data-role="numerictextbox"
						                   data-format="n0"
						                   data-min="0"						                   
						                   data-bind="value: obj.order_point"
						                   style="width: 100%">
									</div>																		
									<!-- // Group END -->											
								</div>
							</div>

							<div class="row-fluid">
								<!-- Group -->
								<div class="control-group">								
									<label for="txtDescription">ពណ៌នា</label>
						            <textarea id="txtDescription" cols="0" rows="3" class="k-textbox" 
										data-bind="value: obj.bill_to" style="width: 100%;"></textarea>
								</div>																		
								<!-- // Group END -->
							</div>

						</div>
					</div>								
							
					<!-- // Inner Tabs -->
					<div class="row-fluid">								
						<div class="box-generic">
						    <!-- //Tabs Heading -->
						    <div class="tabsbar tabsbar-1">
						        <ul class="row-fluid row-merge">						            
						            <li class="span2 glyphicons usd active">
						            	<a href="#tab1" data-toggle="tab"><i></i> <span>គណនេយ្យ</span></a>
						            </li>						            					            						            					            
						        </ul>
						    </div>
						    <!-- // Tabs Heading END -->

						    <div class="tab-content">
						        <!-- //ACCOUNTING INFO -->
						        <div class="tab-pane active" id="tab1">
						        	<div class="row-fluid">						            	
										<div class="span4">
											<label for="ddlIncome">គណនីចំណូល <span style="color:red">*</span></label>
											<input id="ddlIncome" name="ddlIncome"
												data-bind="value: obj.income_account_id" 
												required data-required-msg="ត្រូវការ គណនីចំណូល" style="width: 100%;" />
										</div>
										<div class="span4">
											<label for="ddlCogs">គណនីថ្លៃដើម <span style="color:red">*</span></label>
											<input id="ddlCogs" name="ddlCogs"
												data-bind="value: obj.cogs_account_id" 
												required data-required-msg="ត្រូវការ គណនីថ្លៃដើម" style="width: 100%;" />
										</div>
										<div class="span4">
											<label for="ddlInventory">គណនីសន្និធិ <span style="color:red">*</span></label>
											<input id="ddlInventory" name="ddlInventory"
												data-bind="value: obj.inventory_account_id" 
												required data-required-msg="ត្រូវការ គណនីសន្និធិ" style="width: 100%;" />	
										</div>												
							        </div>							        
					        	</div>
						        <!-- //ACCOUNTING INFO END -->						        
						        
						    </div>
						</div>
					</div>					

					<br>											
							
					<!-- Form actions -->
					<div align="center">
						<span id="notification"></span>

						<span id="save" class="btn btn-icon btn-primary glyphicons circle_ok"><i></i>កត់ត្រា</span>
						<span class="btn btn-danger btn-icon glyphicons delete" data-bind="click: delete, visible: isEdit"><i></i>លុប</span>
						<span class="btn btn-icon btn-default glyphicons ban" data-bind="click: cancel"><i></i>បោះបង់</span>
					</div>
					<!-- // Form actions END -->

				</div> <!-- End Widget-Body List -->
			</div>
			<!-- // Collapsible Widget END -->				
					
		</div>
	</div>
</script>
<script id="itemCatalog" type="text/x-kendo-template">
	<div class="container-960">
		<div id="example" class="k-content">
			
			<!-- Collapsible Widget -->			
			<div class="widget">
			    <div class="widget-head">
			    	<span class="btn btn-primary pull-right" 
							onclick="javascript:window.history.back()">X</span>
			        
			        <h4 class="heading glyphicons sampler"><i></i> កាតាឡុក</h4>							        	
			    </div>
			    <div class="widget-body">					
					
			    	<div class="row-fluid">
			    		<div class="span6 well">							
							<div class="row-fluid">
								<div class="span6">	
									<!-- Group -->
									<div class="control-group">							
										<label for="txtSKU">លេខកូដ <span style="color:red">*</span></label>
				              			<input id="txtSKU" name="txtSKU" class="k-textbox"
					              				data-bind="value: obj.sku" 
					              				placeholder="e.g. ID0001" 
					              				required data-required-msg="ត្រូវការ លេខកូដ"
					              				style="width: 100%;" />
					              		<span data-bind="visible: isDuplicateNumber" style="color: red;">លេខកូដនេះបានប្រើប្រាស់រូចហើយ</span>
									</div>
									<!-- // Group END -->		
								</div>

								<div class="span6">	
									<!-- Group -->
									<div class="control-group">
										<label for="txtName">មុខទំនិញ <span style="color:red">*</span></label>
					              		<input id="txtName" name="txtName" class="k-textbox" data-bind="value: obj.name" 
							              		placeholder="ឈ្មោះមុខទំនិញ..." required data-required-msg="ត្រូវការ មុខទំនិញ"
							              		style="width: 100%;" />
									</div>
									<!-- // Group END -->	 			
								</div>								
							</div>

							<div class="row-fluid">
								<div class="span6">
									<!-- Group -->
									<div class="control-group">								
										<label for="txtOnhand">ស្ថានភាព <span style="color:red">*</span></label>
							            <input id="ddlStatus" name="ddlStatus" 
				              				data-role="dropdownlist"
						            		data-text-field="name"
			           						data-value-field="id"
			           						data-value-primitive="true" 
						            		data-bind="source: statusList, value: obj.status"
						            		data-option-label="(--- ជ្រើសរើស ---)"
						            		required data-required-msg="ត្រូវការ ស្ថានភាព" style="width: 100%;" />
									</div>																		
									<!-- // Group END -->										
								</div>

								<div class="span6">
									<input type="checkbox" data-bind="checked: obj.favorite" /> ប្រើញឹកញប់
								</div>															
							</div>							
						</div>
						<div class="span6">							
							<div class="row-fluid">
								<!-- Group -->
								<div class="control-group">								
									<label for="txtDescription">ពណ៌នា</label>
						            <textarea id="txtDescription" cols="0" rows="2" class="k-textbox" 
										data-bind="value: obj.bill_to" style="width: 100%;"></textarea>
								</div>																		
								<!-- // Group END -->
							</div>

							<div class="row-fluid">
								<!-- Group -->
								<div class="control-group">								
									<label for="items">រើសមុខទំនិញដើម្បីដាក់ចូលកាតាឡុក:</label>

									<select data-role="multiselect"
						                   data-placeholder="រើសមុខទំនិញ..."
						                   data-value-primitive="true"
						                   data-text-field="name"
						                   data-value-field="id"
						                   data-bind="value: obj.catalogs,
						                              source: itemDS"
						                   style="width: 100%"
						            ></select>						            
								</div>																		
								<!-- // Group END -->
							</div>																											
						</div>
					</div>
					
					<br>											
							
					<!-- Form actions -->
					<div align="center">
						<span id="notification"></span>

						<span id="save" class="btn btn-icon btn-primary glyphicons circle_ok"><i></i>កត់ត្រា</span>
						<span class="btn btn-danger btn-icon glyphicons delete" data-bind="click: delete, visible: isEdit"><i></i>លុប</span>
						<span class="btn btn-icon btn-default glyphicons ban" data-bind="click: cancel"><i></i>បោះបង់</span>
					</div>
					<!-- // Form actions END -->

				</div> <!-- End Widget-Body List -->
			</div>
			<!-- // Collapsible Widget END -->				
					
		</div>
	</div>
</script>
<script id="itemAssembly" type="text/x-kendo-template">
	<div class="container-960">
		<div id="example" class="k-content">
			
			<!-- Collapsible Widget -->			
			<div class="widget">
			    <div class="widget-head">
			    	<span class="btn btn-primary pull-right" 
							onclick="javascript:window.history.back()">X</span>
			        
			        <h4 class="heading glyphicons fins"><i></i> ប្រជំុមុខទំនិញ</h4>							        	
			    </div>
			    <div class="widget-body">					
					
			    	<div class="row-fluid">
			    		<div class="span6 well">							
							<div class="row-fluid">
								<div class="span6">	
									<!-- Group -->
									<div class="control-group">							
										<label for="txtSKU">លេខកូដ <span style="color:red">*</span></label>
				              			<input id="txtSKU" name="txtSKU" class="k-textbox"
					              				data-bind="value: obj.sku" 
					              				placeholder="e.g. ID0001" 
					              				required data-required-msg="ត្រូវការ លេខកូដ"
					              				style="width: 100%;" />
					              		<span data-bind="visible: isDuplicateNumber" style="color: red;">លេខកូដនេះបានប្រើប្រាស់រូចហើយ</span>
									</div>
									<!-- // Group END -->		
								</div>

								<div class="span6">	
									<!-- Group -->
									<div class="control-group">
										<label for="txtName">មុខទំនិញ <span style="color:red">*</span></label>
					              		<input id="txtName" name="txtName" class="k-textbox" data-bind="value: obj.name" 
							              		placeholder="ឈ្មោះមុខទំនិញ..." required data-required-msg="ត្រូវការ មុខទំនិញ"
							              		style="width: 100%;" />
									</div>
									<!-- // Group END -->	 			
								</div>								
							</div>

							<div class="row-fluid">
								<div class="span6">
									<!-- Group -->
									<div class="control-group">								
										<label for="txtOnhand">ស្ថានភាព <span style="color:red">*</span></label>
							            <input id="ddlStatus" name="ddlStatus" 
				              				data-role="dropdownlist"
						            		data-text-field="name"
			           						data-value-field="id"
			           						data-value-primitive="true" 
						            		data-bind="source: statusList, value: obj.status"
						            		data-option-label="(--- ជ្រើសរើស ---)"
						            		required data-required-msg="ត្រូវការ ស្ថានភាព" style="width: 100%;" />
									</div>																		
									<!-- // Group END -->										
								</div>

								<div class="span6">
									<input type="checkbox" data-bind="checked: obj.favorite" /> ប្រើញឹកញប់
								</div>															
							</div>							
						</div>
						<div class="span6">							
							<div class="row-fluid">
								<!-- Group -->
								<div class="control-group">								
									<label for="txtDescription">ពណ៌នា</label>
						            <textarea id="txtDescription" cols="0" rows="2" class="k-textbox" 
										data-bind="value: obj.bill_to" style="width: 100%;"></textarea>
								</div>																		
								<!-- // Group END -->
							</div>

							<div class="row-fluid">
								<!-- Group -->
								<div class="control-group">								
									<label for="items">រើសមុខទំនិញដើមប្បីដាក់ចូលក្រុម៖</label>
						           
						            <input data-role="combobox"
						                   data-placeholder="រើសមុខទំនិញ..."
						                   data-value-primitive="true"
						                   data-auto-bind="false"
						                   data-text-field="name"
						                   data-value-field="id"
						                   data-bind="value: assembly_id,
						                              source: itemDS"
						                   style="width: 90%"/>

						            <button type="button" data-role="button" data-bind="click: addItem"><i class="icon-plus"></i></button>
								</div>																		
								<!-- // Group END -->
							</div>																											
						</div>
					</div>

					<br>

					<table class="table table-bordered table-primary table-striped table-vertical-center">
				        <thead>
				            <tr>
				            	<th width="5%">ល.រ</th>				                
				                <th width="20%">មុខទំនិញ</th>
				                <th>ពណ៌នា</th>
				                <th width="25%">ចំនួន</th>
				                <th width="15%">តំលៃ</th>
				                <th width="10%">ទឹកប្រាក់</th>
				                <th width="1%"></th>
				            </tr>
				        </thead>
				        <tbody data-role="listview"
				        		data-auto-bind="false" 
				        		data-template="itemAssembly-row-template" 
				        		data-bind="source: assemblyDS"></tbody>				        
				    </table>

				    <br>

				    <div class="row-fluid">
					    <div class="span4 pull-right">
							<div class="well pull-right">
								សរុប៖	<strong data-bind="text: total"></strong>
							</div>							
						</div>
					</div>
					
					<br>											
							
					<!-- Form actions -->
					<div align="center">
						<span id="notification"></span>

						<span id="save" class="btn btn-icon btn-primary glyphicons circle_ok"><i></i>កត់ត្រា</span>
						<span class="btn btn-danger btn-icon glyphicons delete" data-bind="click: delete, visible: isEdit"><i></i>លុប</span>
						<span class="btn btn-icon btn-default glyphicons ban" data-bind="click: cancel"><i></i>បោះបង់</span>
					</div>
					<!-- // Form actions END -->

				</div> <!-- End Widget-Body List -->
			</div>
			<!-- // Collapsible Widget END -->				
					
		</div>
	</div>
</script>
<script id="itemAssembly-row-template" type="text/x-kendo-tmpl">
	<tr>
		<td>
			<i class="icon-trash" data-bind="events: { click: removeItem }"></i>
			#:banhji.itemAssembly.assemblyDS.indexOf(data)+1#
		</td>		
		<td>
			<span data-bind="text: assembly[0].sku"></span>
			<span data-bind="text: assembly[0].name"></span>
		</td>
		<td>
			<span data-bind="text: assembly[0].description"></span>
		</td>
		<td>
			<input id="unit" name="unit" data-role="numerictextbox" 
					data-format="n0" data-min="1"
					data-bind="value: quantity, events: {change : changes}"
					required data-required-msg="ត្រូវការ ចំនួន" style="width: 100px;" />

			<input data-role="dropdownlist"
				   data-option-label="(--- រើស ---)"
                   data-auto-bind="false"
                   data-value-primitive="true"
                   data-text-field="measurement"
                   data-value-field="measurement_id"
                   data-bind="source: price_list, value: measurement_id, events: {change: measurementChanges}"
                   style="width: 100px;" />
		</td>					
		<td>
			<input id="price" name="price" data-role="numerictextbox" 
					data-format="c" data-culture=#:currency[0].locale#
					data-bind="value: price, events: {change : changes}" 
					required data-required-msg="ត្រូវការ តំលៃ" style="width: 100%;" />
		</td>		
		<td class="right">
			<span data-format="n" 
					data-culture=#:currency[0].locale#
					data-bind="text: amount" 
					style="width: 100%;"></span> 						
		</td>		
	</tr>
</script>
<script id="priceList" type="text/x-kendo-template">
	<div class="container-960">		
		<div id="example" class="k-content">
			<br>
			<div align="right">
				<span class="glyphicons no-js remove_2" 
					onclick="javascript:window.history.back();"><i></i></span>
			</div>
			
			<div class="widget widget-heading-simple widget-body-white">
				<h3>តំលៃមុខទំនិញ</h3>

				<div class="widget widget-heading-simple widget-body-white">
				    <div class="widget-body">
				        <div class="innerL">
				            <div class="glyphicons glyphicon-large cargo">
				                	<i></i>
				                	<h4> 
				                		<span data-bind="text: product.sku"></span>
				                		-
				                		<span data-bind="text: product.name"></span>
				                	</h4>
				                	<p>
				                		ចំនួន: <span data-bind="text: product.on_hand"></span> 
				                		<span data-bind="text: product.unit"></span> <br>		                		
										ពណ៌នា: <span data-bind="text: product.description"></span>										
				                	</p>
				            </div>
				        </div>
				    </div>
				</div>				

				<br>

				<div id="priceList-window" data-role="window" data-visible="false" data-modal="true" data-resizable="false" data-iframe="true">				    	
					<table>
						<tr>
							<td>តំលៃ</td>
							<td>
								<input data-role="numerictextbox"		                   
				                   data-min="0"		                   
				                   data-bind="value: priceList.price" />
							</td>
						</tr>
						<tr>
							<td>រូបិយ​ប័ណ្ណ</td>
							<td>
								<input data-role="dropdownlist"
									   data-option-label="(--- ជ្រើសរើស ---)"			                   
					                   data-value-primitive="true"
					                   data-text-field="code"
					                   data-value-field="id"
					                   data-bind="value: priceList.currency_id,
					                              source: currencyDS" />
							</td>
						</tr>
						<tr>
							<td>តំលៃលឯកត្តា</td>
							<td>
								<input data-role="numerictextbox"		                   
				                   data-min="0"		                   
				                   data-bind="value: priceList.unit_value" />
							</td>
						</tr>
						<tr>
							<td>ឯកត្តា</td>
							<td>
								<input data-role="dropdownlist"
									   data-option-label="(--- ជ្រើសរើស ---)"			                   
					                   data-value-primitive="true"
					                   data-text-field="name"
					                   data-value-field="id"
					                   data-bind="value: priceList.measurement_id,
					                              source: unitDS" />
							</td>
						</tr>
					</table>

					<br>

					<span class="btn btn-success btn-icon glyphicons ok_2" data-bind="click: save"><i></i>រក្សាទុក</span>
					<span class="btn btn-danger btn-icon glyphicons remove_2" data-bind="click: closeWindow"><i></i>បិទ</span>  
				</div>				

				<button class="btn btn-inverse" data-bind="click: openWindow"><i class="icon-plus icon-white"></i></button>
				បញ្ចូលតំលៃថ្មី
				</br>
				<table class="table table-bordered table-condensed">
			        <thead>
			            <tr>	            	
			            	<th>តំលៃលក់</th>			            		                
			                <th>តំលៃលឯកត្តា</th>
			                <th>ឯកត្តា</th>			                
			                <th></th>	                
			            </tr>
			        </thead>
			        <tbody data-template="priceList-template"
			        	data-auto-bind="false"			        	
			        	data-bind="source: dataSource"></tbody>
			    </table>

				<br>

				<table class="table table-bordered table-condensed">
			        <thead>
			            <tr>	            	
			            	<th>កាលបរិច្ឆេទ</th>
			            	<th>ក្រុមហ៊ុន</th>	                
			                <th>មុខទំនិញ</th>
			                <th>ពណ៌នា</th>
			                <th>ចំនួន</th>
			                <th>ឯកត្តា</th>
			                <th>តំលៃ</th>			                	                
			            </tr>
			        </thead>
			        <tbody data-template="stock-priceList-template"
			        	data-auto-bind="false"
			        	data-pageable="true" 
			        	data-bind="source: stockDS"></tbody>
			    </table>
			    <div id="pager" class="k-pager-wrap"
		             data-role="pager" data-bind="source: stockDS"></div>

			</div>
		</div>
	</div>
</script>
<script id="priceList-template" type="text/x-kendo-template">
    <tr>
    	<td>#=kendo.toString(price, "c", currency[0].locale)#</td>    	
    	<td>#=unit_value#</td>
    	<td>#=measurement#</td>    	
    	<td>
    		<span data-bind="click: edit"><i class="icon-edit"></i> កែ</span>
    		|
    		<span data-bind="click: delete"><i class="icon-remove"></i> លុប</span>
    	</td>
    </tr>
</script>
<script id="stock-priceList-template" type="text/x-kendo-template">
    <tr>    	
    	<td>#=kendo.toString(new Date(issued_date), "dd-MM-yyyy")#</td>
    	<td>#=contact[0]==null?"":contact[0].company#</td>
    	<td>#=item[0].name#</td>
    	<td>#=item[0].description#</td>
    	<td>
    		#if(unit>0){#
    			<span class="label label-success">#=unit#</span>    			
    		#}else{#
    			<span class="label label-important">#=unit#</span>
    		#}#
    	</td>
    	<td>#=measurement#</td>    	
    	<td>#=kendo.toString(amount, "c", currency[0].locale)#</td>    	
    </tr>
</script>
<script id="itemRecord" type="text/x-kendo-template">
	<div class="container-960">
		<div id="example" class="k-content">
			
			<!-- Collapsible Widget -->			
			<div class="widget">
			    <div class="widget-head">
			    	<span class="btn btn-primary pull-right" 
							onclick="javascript:window.history.back()">X</span>
			        
			        <h4 class="heading glyphicons retweet_2"><i></i> កំណត់ត្រាសន្និធិ</h4>							        	
			    </div>
			    <div class="widget-body">

			    	<div class="widget widget-heading-simple widget-body-white">
					    <div class="widget-body">
					        <div class="innerL">

					            <div class="separator bottom"></div>
					            <div class="glyphicons glyphicon-large cargo">
				                	<i></i>
				                	<h4 data-bind="text: item.name"></h4>

					                លេខកូដ៖ <span data-bind="text: item.sku"></span> <br>
					                ពណ៌នា៖​ <span data-bind="text: item.description"></span> <br>
					                ចំនួន៖ <span data-bind="text: item.description"></span> <br>					                
					                ថ្លៃជាមធ្យម៖ <span data-bind="text: item.cost"></span>
					                 
					            </div>

					        </div>
					    </div>
					</div>			
							
					<table class="table table-borderless table-condensed cart_total">						
						<tr>
							<td>កាលបរិច្ឆេទ <span style="color:red">*</span></td>
							<td>
								<input id="issuedDate" name="issuedDate"
									data-role="datepicker"
									data-format="dd-MM-yyyy"									
				                    data-bind="value: obj.issued_date"
				                   style="width: 100%"
				                   required data-required-msg="ត្រូវការ កាលបរិច្ឆេទ">
							</td>
						</tr>
						<tr>
							<td>លេខយោង</td>
							<td>
								<input data-role="combobox"
									   placeholder="រើស លេខយោង..."			                   
					                   data-value-primitive="true"
					                   data-text-field="number"
					                   data-value-field="id"
					                   data-bind="value: obj.reference_id,
					                              source: invoiceDS"					                   
					                   style="width: 100%" />
							</td>
						</tr>											
						<tr>
							<td>ក្រុមហ៊ុន</td>
							<td>
								<input data-role="combobox"
									   placeholder="រើស អ្នកផ្គត់ផ្គង់..."			                   
					                   data-value-primitive="true"
					                   data-text-field="company"
					                   data-value-field="id"
					                   data-bind="value: obj.contact_id,
					                              source: contactDS"					                   
					                   style="width: 100%" />
							</td>
						</tr>
						<tr>
							<td>ទំនិញ <span style="color:red">*</span></td>
							<td>
								<input id="cbbItem" name="cbbItem" 
									   data-role="combobox"
									   placeholder="រើស មុខទំនិញ..."			                   
					                   data-value-primitive="true"
					                   data-text-field="name"
					                   data-value-field="id"
					                   data-bind="value: obj.item_id,
					                              source: itemDS,
					                              events:{change: itemChanges}"					                   
					                   style="width: 100%" 
					                   required data-required-msg="ត្រូវការ ទំនិញ" />
							</td>
						</tr>																	
						<tr>
							<td>ចំនួន <span style="color:red">*</span></td>
							<td>
								<input id="txtUnit" name="txtUnit"
								   data-role="numerictextbox"				                                      
				                   data-bind="value: obj.unit"
				                   required data-required-msg="ត្រូវការ ចំនួន"
				                   style="width: 100%" />
							</td>
						</tr>											
						<tr>
							<td>ខ្នាត <span style="color:red">*</span></td>
							<td>
								<input id="ddlUnit" name="ddlUnit" 
									   data-role="dropdownlist"
									   data-option-label="(--- ជ្រើសរើស ---)"			                   
					                   data-value-primitive="true"
					                   data-text-field="name"
					                   data-value-field="id"
					                   data-bind="value: obj.measurement_id,
					                              source: measurementDS"					                   
					                   required data-required-msg="ត្រូវការ ខ្នាត"
					                   style="width: 100%" />
							</td>
						</tr>											
						<tr>
							<td>តំលៃ <span style="color:red">*</span></td>
							<td>
								<input id="txtPrice" name="txtPrice"
								   data-role="numerictextbox"				                                      
				                   data-bind="value: obj.price"
				                   required data-required-msg="ត្រូវការ តំលៃ"
				                   style="width: 100%" />
							</td>
						</tr>
						<tr>
							<td>ទឹកប្រាក់ <span style="color:red">*</span></td>
							<td>
								<input id="txtAmount" name="txtAmount"
								   data-role="numerictextbox"				                                      
				                   data-bind="value: obj.amount"
				                   required data-required-msg="ត្រូវការ ទឹកប្រាក់"
				                   style="width: 100%" />
							</td>
						</tr>
						<tr>
							<td>រូបិយ​ប័ណ្ណ <span style="color:red">*</span></td>
							<td>
								<input id="ddlCurrency" name="ddlCurrency" 
									   data-role="dropdownlist"
									   data-option-label="(--- ជ្រើសរើស ---)"			                   
					                   data-value-primitive="true"
					                   data-text-field="code"
					                   data-value-field="id"
					                   data-bind="value: obj.currency_id,
					                              source: currencyDS"					                   
					                   style="width: 100%" 
					                   required data-required-msg="ត្រូវការ រូបិយ​ប័ណ្ណ" />
							</td>							
						</tr>
						<tr>
							<td>សំគាល់</td>
							<td>
								<textarea id="txtDescription" cols="0" rows="2" class="k-textbox" 
										data-bind="value: obj.memo" style="width: 100%;"></textarea>
							</td>							
						</tr>												
					</table>

					<br>											
							
					<!-- Form actions -->
					<div align="center">
						<span id="notification"></span>

						<span id="save" class="btn btn-icon btn-primary glyphicons circle_ok"><i></i>កត់ត្រា</span>
						<span class="btn btn-danger btn-icon glyphicons delete" data-bind="click: delete, visible: isEdit"><i></i>លុប</span>
						<span class="btn btn-icon btn-default glyphicons ban" data-bind="click: cancel"><i></i>បោះបង់</span>
					</div>
					<!-- // Form actions END -->

				</div> <!-- End Widget-Body List -->
			</div>
			<!-- // Collapsible Widget END -->				
					
		</div>
	</div>
</script>
<script id="itemAdjustment" type="text/x-kendo-template">
	<div class="container-960">
		<div id="example" class="k-content">
			
			<!-- Collapsible Widget -->			
			<div class="widget">
			    <div class="widget-head">
			    	<span class="btn btn-primary pull-right" 
							onclick="javascript:window.history.back()">X</span>
			        
			        <h4 class="heading glyphicons sort"><i></i> ផ្ទៀងផ្ទាត់ចំនួនសន្និធិ</h4>							        	
			    </div>
			    <div class="widget-body">

			    	<table class="table table-borderless table-condensed cart_total">
			    		<tr>
			    			<td>កាលបរិច្ឆេទ</td>
			    			<td>
			    				<input id="issuedDate" name="issuedDate" 
										data-role="datepicker"
										data-format="dd-MM-yyyy" 
										data-bind="value: obj.issued_date" 
										required data-required-msg="ត្រូវការ កាលបរិច្ឆេទ" />
			    			</td>
			    			<td>លេខយោង</td>
			    			<td><input class="k-textbox" data-bind="value: obj.reference_no" placeholder="លេខយោង..." style="width:100%;" /></td>
			    		</tr>
			    		<tr>
			    			<td>គណនីផ្ទៀងផ្ទាត់</td>
			    			<td></td>
			    			<td>ចំនាត់ថ្នាក់</td>
			    			<td>
			    				<select data-role="multiselect" 
								   data-bind="source: segmentItemDS, value: obj.segments, events:{change: segmentChanges}" 
								   data-value-field="id" 
								   data-text-field="name"
								   data-placeholder="(--- ជ្រើសរើស ---)"
								   style="width: 100%" /></select>
			    			</td>
			    		</tr>
			    		<tr>
			    			<td>អ្នករាប់</td>
			    			<td>
			    				<input data-role="combobox"
					                   data-placeholder="រើសអ្នករាប់..."
					                   data-value-primitive="true"
					                   data-text-field="fullname"
					                   data-value-field="id"
					                   data-bind="value: obj.reader_id,
					                              source: contactDS"
					                   style="width: 100%" />
			    			</td>
			    			<td>សំគាល់</td>
			    			<td>
			    				<textarea cols="0" rows="2" class="k-textbox" data-bind="value: obj.memo" style="width: 100%"></textarea>
			    			</td>
			    		</tr>
			    	</table>

			    	<div data-role="grid" 
			    		data-bind="source: itemDS" 
			    		data-toolbar="['excel']" 
			    		data-excel='{ fileName: "item_adjustment.xlsx" }'
			    		data-row-template="itemAdjustment-row-template" 
			    		data-columns='[
			    			{ title: "លេខកូដ" },
			    			{ title: "មុខទំនិញ" },
			    			{ title: "ពណ៌នា" },
			    			{ title: "ចំនួន" },
			    			{ title: "ចំនួនរាប់" },
			    			{ title: "ផ្ទៀងផ្ទាត់" }
			    		]'></div>			    	
			    	
					<br>											
							
					<!-- Form actions -->
					<div align="center">
						<span id="notification"></span>

						<span id="save" class="btn btn-icon btn-primary glyphicons circle_ok"><i></i>កត់ត្រា</span>
						<span class="btn btn-danger btn-icon glyphicons delete" data-bind="click: delete, visible: isEdit"><i></i>លុប</span>
						<span class="btn btn-icon btn-default glyphicons ban" data-bind="click: cancel"><i></i>បោះបង់</span>
					</div>
					<!-- // Form actions END -->

				</div> <!-- End Widget-Body List -->
			</div>
			<!-- // Collapsible Widget END -->				
					
		</div>
	</div>
</script>
<script id="itemAdjustment-row-template" type="text/x-kendo-tmpl">
    <tr data-uid="#: uid #">
    	<td>#=sku#</td>
    	<td>#=name#</td>
    	<td>#=description#</td>
    	<td>#=on_hand#</td>
    	<td>
    		<input class="txt#=uid#" 
    			   data-role="numerictextbox"
                   data-format="n"
                   data-min="0"                   
                   data-bind="value: new_quantity,
                   			  events:{ change: onChange }"
                   style="width: 100px;">    		
    	</td>
    	<td>
    		<input data-role="numerictextbox"
                   data-format="n"                                      
                   data-bind="value: different_quantity"
                   style="width: 100px;">
    	</td>
    </tr>
</script>
<script id="itemSetting" type="text/x-kendo-template">
	<span class="pull-right glyphicons no-js remove_2" 
			onclick="javascript:window.history.back()"><i></i></span>

	<h2>កំណត់ពត៌មានទូទៅ: សន្និធិ</h2>

	<br>

	<div class="widget widget-tabs widget-tabs-double widget-tabs-vertical row-fluid row-merge widget-tabs-gray">

	    <!-- Tabs Heading -->
	    <div class="widget-head span3">
	        <ul>
	            <li class="active"><a href="#tab1-1" class="glyphicons bookmark" data-toggle="tab"><i></i><span class="strong">ប្រភេទសន្និធិ</span></a>
	            </li>
	            <li><a href="#tab2-1" class="glyphicons tag" data-toggle="tab"><i></i><span class="strong">ក្រុម</span></a>
	            </li>
	            <li><a href="#tab3-1" class="glyphicons ruller" data-toggle="tab"><i></i><span class="strong">រង្វាស់</span></a>
	            </li>
	            <li><a href="#tab4-1" class="glyphicons certificate" data-toggle="tab"><i></i><span class="strong">ម៉ាក</span></a>
	            </li>	            
	        </ul>
	    </div>
	    <!-- // Tabs Heading END -->

	    <div class="widget-body span9">
	        <div class="tab-content">	            

	            <!-- Tab Category content -->
	            <div class="tab-pane active" id="tab1-1">
	            	<input data-role="dropdownlist"
            			   data-option-label="(--- រើស ប្រភេទមេ ---)"            			   			                   
		                   data-value-primitive="true"
		                   data-auto-bind="false"
		                   data-text-field="name"
		                   data-value-field="id"
		                   data-bind="value: category_sub_of,
		                              source: subCategoryDS"/>

		            <div class="input-append">
					    <input class="span4" id="appendedInputButtons" type="text" placeholder="លេខកូដ..." data-bind="value: category_code">
					    <input class="span4" id="appendedInputButtons" type="text" placeholder="ក្រុមថ្មី..." data-bind="value: category_name">
					    <input class="span4" id="appendedInputButtons" type="text" placeholder="ទំរង់ខ្លី..." data-bind="value: category_abbr">					    
					    <button class="btn btn-default" type="button" data-bind="click: addCategory"><i class="icon-plus"></i></button>					  
					</div>
		            
	            	<table class="table table-bordered table-white">
	            		<thead>
	            			<tr>	            				            				
	            				<th>លេខកូដ</th>	
	            				<th>ឈ្មោះ</th>	
	            				<th>ទំរងខ្លី</th>	            				
	            				<th></th>
	            			</tr>
	            		</thead>
	            		<tbody data-role="listview"	            				
		            			data-edit-template="itemSetting-edit-category-template"
				                data-template="itemSetting-category-template"
				                data-bind="source: categoryDS"></tbody>
	            	</table>		            
	            </div>
	            <!-- // Tab Category Type content END -->	            

	            <!-- Tab Item Group content -->
	            <div class="tab-pane" id="tab2-1">
	            	<input data-role="dropdownlist"
            			   data-option-label="(--- រើស ប្រភេទ ---)"            			   			                   
		                   data-value-primitive="true"
		                   data-text-field="name"
		                   data-value-field="id"
		                   data-bind="value: item_group_category_id,
		                              source: categoryDS"/>

		            <input data-role="dropdownlist"
            			   data-option-label="(--- រើស មេក្រុម ---)"            			   			                   
		                   data-value-primitive="true"
		                   data-auto-bind="false"
		                   data-text-field="name"
		                   data-value-field="id"
		                   data-bind="value: item_group_sub_of,
		                              source: subItemGroupDS"/>

		            <div class="input-append">
					    <input class="span4" id="appendedInputButtons" type="text" placeholder="លេខកូដ..." data-bind="value: item_group_code">	
					    <input class="span4" id="appendedInputButtons" type="text" placeholder="ឈ្មោះថ្មី..." data-bind="value: item_group_name">
					    <input class="span4" id="appendedInputButtons" type="text" placeholder="ទំរង់ខ្លី..." data-bind="value: item_group_abbr">					    
					    <button class="btn btn-default" type="button" data-bind="click: addItemGroup"><i class="icon-plus"></i></button>					  
					</div>
		            
	            	<table class="table table-bordered table-white">
	            		<thead>
	            			<tr>	            					            				
	            				<th>លេខកូដ</th>	
	            				<th>ឈ្មោះ</th>	
	            				<th>ទំរង់ខ្លី</th>	            				
	            				<th></th>
	            			</tr>
	            		</thead>
	            		<tbody data-role="listview"	            				
		            			data-edit-template="itemSetting-edit-item-group-template"
				                data-template="itemSetting-item-group-template"
				                data-bind="source: itemGroupDS"></tbody>
	            	</table>		            
	            </div>
	            <!-- // Tab Item Group Type content END -->

	            <!-- Tab Measurement content -->
	            <div class="tab-pane" id="tab3-1">
                	<div class="input-append">
					    <input class="span12" id="appendedInputButtons" type="text" placeholder="រង្វាស់ថ្មី..." data-bind="value: measurement_name">					    
					    <button class="btn btn-default" type="button" data-bind="click: addMeasurement"><i class="icon-plus"></i></button>					  
					</div>
	            	<table class="table table-bordered table-white">
	            		<thead>
	            			<tr>
	            				<th>រង្វាស់</th>	            				
	            				<th></th>
	            			</tr>
	            		</thead>
	            		<tbody data-role="listview"	            				
		            			data-edit-template="itemSetting-edit-measurement-template"
				                data-template="itemSetting-measurement-template"
				                data-bind="source: measurementDS"></tbody>
	            	</table>
	            </div>
	            <!-- // Tab Measurement content END -->

	            <!-- Tab Brand content -->
	            <div class="tab-pane" id="tab4-1">
	            	<input data-role="dropdownlist"
            			   data-option-label="(--- រើស ម៉ាកមេ ---)"            			   			                   
		                   data-value-primitive="true"
		                   data-auto-bind="false"
		                   data-text-field="name"
		                   data-value-field="id"
		                   data-bind="value: brand_sub_of,
		                              source: subBrandDS"/>

		            <div class="input-append">
					    <input class="span4" id="appendedInputButtons" type="text" placeholder="លេខកូដ..." data-bind="value: brand_code">
					    <input class="span4" id="appendedInputButtons" type="text" placeholder="ម៉ាកថ្មី..." data-bind="value: brand_name">
					    <input class="span4" id="appendedInputButtons" type="text" placeholder="ទំរង់ខ្លី..." data-bind="value: brand_abbr">					    
					    <button class="btn btn-default" type="button" data-bind="click: addBrand"><i class="icon-plus"></i></button>					  
					</div>
		            
	            	<table class="table table-bordered table-white">
	            		<thead>
	            			<tr>
	            				<th>លេខកូដ</th>
	            				<th>ឈ្មោះ</th>	            				
	            				<th>ទំរង់ខ្លី</th>	            				
	            				<th></th>
	            			</tr>
	            		</thead>
	            		<tbody data-role="listview"	            				
		            			data-edit-template="itemSetting-edit-brand-template"
				                data-template="itemSetting-brand-template"
				                data-bind="source: brandDS"></tbody>
	            	</table>		            
	            </div>
	            <!-- // Tab Brand Type content END -->	            

	        </div>
	    </div>

	</div>
</script>
<script id="itemSetting-category-template" type="text/x-kendo-tmpl">                    
    <tr>    	   	
   		<td>
    		#:code#
   		</td>
   		<td>
    		#:name#
   		</td>
   		<td>
    		#:abbr#
   		</td>   		
   		<td>   					        
	        #if(is_system=="0"){#
	        	<div class="edit-buttons">
		        	<a class="k-button k-edit-button" href="\\#"><span class="k-icon k-edit"></span></a>
		        	<a class="k-button k-delete-button" href="\\#"><span class="k-icon k-delete"></span></a>
	        	</div>
	        #}#		   	
   		</td>
   	</tr>
</script>
<script id="itemSetting-edit-category-template" type="text/x-kendo-tmpl">
    <div class="product-view k-widget">
        <dl>
        	<dd>
                <input data-role="dropdownlist"
        			   data-option-label="(--- ជ្រើសរើស ---)"        			   		                   
	                   data-value-primitive="true"	                   
	                   data-text-field="name"
	                   data-value-field="id"
	                   data-bind="value: sub_of,
	                              source: subItemGroupDS"/>
            </dd>                
            <dd>
                <input type="text" class="k-textbox" data-bind="value:code" name="code" required="required" validationMessage="required" />
                <span data-for="code" class="k-invalid-msg"></span>
            </dd>
            <dd>
                <input type="text" class="k-textbox" data-bind="value:name" name="ProductName" required="required" validationMessage="required" />
                <span data-for="ProductName" class="k-invalid-msg"></span>
            </dd>
            <dd>
                <input type="text" class="k-textbox" data-bind="value:abbr" name="abbr" required="required" validationMessage="required" />
                <span data-for="abbr" class="k-invalid-msg"></span>
            </dd>               
        </dl>
        <div class="edit-buttons">
            <a class="k-button k-update-button" href="\\#"><span class="k-icon k-update"></span></a>
            <a class="k-button k-cancel-button" href="\\#"><span class="k-icon k-cancel"></span></a>
        </div>
    </div>
</script>
<script id="itemSetting-item-group-template" type="text/x-kendo-tmpl">                    
    <tr>    	   	
   		<td>
    		#:code#
   		</td>
   		<td>
    		#:name#
   		</td>
   		<td>
    		#:abbr#
   		</td>   		
   		<td>	        
        	<div class="edit-buttons">
	        	<a class="k-button k-edit-button" href="\\#"><span class="k-icon k-edit"></span></a>
	        	<a class="k-button k-delete-button" href="\\#"><span class="k-icon k-delete"></span></a>
        	</div>	        	   	
   		</td>
   	</tr>
</script>
<script id="itemSetting-edit-item-group-template" type="text/x-kendo-tmpl">
    <div class="product-view k-widget">
        <dl>
        	<dd>
                <input data-role="dropdownlist"
        			   data-option-label="(--- រើស ប្រភេទ ---)"        			   		                   
	                   data-value-primitive="true"
	                   data-text-field="name"
	                   data-value-field="id"
	                   data-bind="value: category_id,
	                              source: categoryDS"/>
            </dd>
            <dd>
                <input data-role="dropdownlist"
        			   data-option-label="(--- រើស មេក្រុម ---)"        			   		                   
	                   data-value-primitive="true"	                   
	                   data-text-field="name"
	                   data-value-field="id"
	                   data-bind="value: sub_of,
	                              source: subItemGroupDS"/>
            </dd>                
            <dd>
                <input type="text" class="k-textbox" data-bind="value:code" name="code" required="required" validationMessage="required" />
                <span data-for="code" class="k-invalid-msg"></span>
            </dd>
            <dd>
                <input type="text" class="k-textbox" data-bind="value:name" name="ProductName" required="required" validationMessage="required" />
                <span data-for="ProductName" class="k-invalid-msg"></span>
            </dd>
            <dd>
                <input type="text" class="k-textbox" data-bind="value:abbr" name="abbr" required="required" validationMessage="required" />
                <span data-for="abbr" class="k-invalid-msg"></span>
            </dd>               
        </dl>
        <div class="edit-buttons">
            <a class="k-button k-update-button" href="\\#"><span class="k-icon k-update"></span></a>
            <a class="k-button k-cancel-button" href="\\#"><span class="k-icon k-cancel"></span></a>
        </div>
    </div>
</script>
<script id="itemSetting-measurement-template" type="text/x-kendo-tmpl">                    
    <tr>
    	<td>
    		 #:name#
   		</td>
   		<td>
   			<div class="edit-buttons">		        
	        	<a class="k-button k-edit-button" href="\\#"><span class="k-icon k-edit"></span></a>
	        	<a class="k-button k-delete-button" href="\\#"><span class="k-icon k-delete"></span></a>		        
		   	</div>		   
   		</td>
   	</tr>
</script>
<script id="itemSetting-edit-measurement-template" type="text/x-kendo-tmpl">
    <div class="product-view k-widget">
        <dl>                
            <dd>
                <input type="text" class="k-textbox" data-bind="value:name" name="name" required="required" validationMessage="required" />
                <span data-for="name" class="k-invalid-msg"></span>
            </dd>               
        </dl>
        <div class="edit-buttons">
            <a class="k-button k-update-button" href="\\#"><span class="k-icon k-update"></span></a>
            <a class="k-button k-cancel-button" href="\\#"><span class="k-icon k-cancel"></span></a>
        </div>
    </div>
</script>
<script id="itemSetting-brand-template" type="text/x-kendo-tmpl">                    
    <tr>
    	<td>
    		 #:code#
   		</td>
   		<td>
    		 #:name#
   		</td>
   		<td>
    		 #:abbr#
   		</td>
   		<td>
   			<div class="edit-buttons">		        
	        	<a class="k-button k-edit-button" href="\\#"><span class="k-icon k-edit"></span></a>
	        	<a class="k-button k-delete-button" href="\\#"><span class="k-icon k-delete"></span></a>		        
		   	</div>		   
   		</td>
   	</tr>
</script>
<script id="itemSetting-edit-brand-template" type="text/x-kendo-tmpl">
    <div class="product-view k-widget">
        <dl>
        	<dd>
                <input data-role="dropdownlist"
        			   data-option-label="(--- រើស ម៉ាកមេ ---)"        			   		                   
	                   data-value-primitive="true"	                   
	                   data-text-field="name"
	                   data-value-field="id"
	                   data-bind="value: sub_of,
	                              source: subBrandDS"/>
            </dd>                
            <dd>
                <input type="text" class="k-textbox" data-bind="value:name" name="name" required="required" validationMessage="required" />
                <span data-for="name" class="k-invalid-msg"></span>
            </dd>
            <dd>
                <input type="text" class="k-textbox" data-bind="value:abbr" name="abbr" required="required" validationMessage="required" />
                <span data-for="abbr" class="k-invalid-msg"></span>
            </dd>               
        </dl>
        <div class="edit-buttons">
            <a class="k-button k-update-button" href="\\#"><span class="k-icon k-update"></span></a>
            <a class="k-button k-cancel-button" href="\\#"><span class="k-icon k-cancel"></span></a>
        </div>
    </div>
</script>
<script id="itemReportCenter" type="text/x-kendo-template">
	<h2>របាយការណ៍</h2>
	<br>

	<div class="row-fluid">
		<div class="span6">
			<h4>ពត៌មានគ្រប់គ្រងសន្និធិ</h4>
			<div class="well margin-none" style="height: 150px;">
				Description here...
				<ul>					
	  				<li><a href='#/'>តម្លៃសន្និធិសង្ខេប</a></li> 
	  				<li><a href='#/'>តម្លៃសន្និធិលំអិត</a></li>
	  				<br>
	  				<li><a href='#/'>សន្និធិដែលមានរយ:ពេលយូជាងគេ</a></li> 
	  				<li><a href='#/'>អ្នកផ្គត់ផ្គង់សន្និធិធំៗ</a></li>
	  				<li><a href='#/'>សន្និធិដែលលក់ដាច់ជាងគេបំផុត</a></li>
				</ul>
			</div>
		</div>		
		<div class="span6">
			<h4>ពត៌មានគ្រប់គ្រងការទិញសន្និធិ</h4>
			<div class="well margin-none" style="height: 150px;">
				Description here...
				<ul>
					<li><a href='#/'>ទិញតាមអ្នកផ្គត់ផ្គង់សង្ខេប</a></li>
	  				<li><a href='#/'>ទិញតាមអ្នកផ្គត់ផ្គង់លំអិត</a></li>
	  				<br>
	  				<li><a href='#/'>ទិញតាមមុខទំនិញសង្ខេប</a></li>
	  				<li><a href='#/'>ទិញតាមមុខទំនិញលំអិត</a></li>	  				
				</ul>
			</div>
		</div>				
	</div>

	<p class="separator text-center"><i class="icon-ellipsis-horizontal icon-3x"></i></p>
</script>


<!-- ***************************
 *	Electricity Section       *
**************************** -->
<script id="eDashBoard" type="text/x-kendo-template">
	<div class="container-fluid menu-hidden sidebar-hidden-phone fluid menu-left">
		<h1>ទំព័រអគ្គីសនី</h1>	
		<div class="row-fluid row-merge border-top">
			<div class="span4">
				<div class="innerAll padding-bottom-none-phone">
					<a href="" class="widget-stats widget-stats-primary widget-stats-4">
						<span class="txt">សមតុល្យ</span>
						<span class="count" style="font-size: 35px;" data-bind="text: balance"></span>
						<span class="glyphicons coins"><i></i></span>
						<div class="clearfix"></div>
						<i class="icon-play-circle"></i>
					</a>
				</div>
			</div>
			<div class="span4">
				<div class="innerAll padding-bottom-none-phone">
					<a href="" class="widget-stats widget-stats-inverse widget-stats-4">
						<span class="txt">ប្រាក់កក់</span>
						<span class="count" style="font-size: 35px;" data-bind="text: deposit"></span>
						<span class="glyphicons credit_card"><i></i></span>
						<div class="clearfix"></div>
						<i class="icon-play-circle"></i>
					</a>
				</div>
			</div>			
			<div class="span4">
				<div class="innerAll padding-bottom-none-phone">
					<a href="" class="widget-stats widget-stats-gray widget-stats-4">
						<span class="txt">អតិថិជន</span>
						<span class="count"​><span data-bind="text: activeCustomer"></span> <span>នាក់</span></span> 
						<span class="glyphicons user"><i></i></span>
						<div class="clearfix"></div>
						<i class="icon-play-circle"></i>
					</a>
				</div>
			</div>			
		</div>

		<div class="row-fluid">			
			<div class="span8">
				<div class="heading-buttons">
					<h2 class="heading pull-left"><i class="icon-bar-chart icon-fixed-width text-primary"></i> លក់ប្រចាំខែ</h2>
					
					<div class="clearfix"></div>
				</div>

				<div class="innerLR innerT">			
					<div id="esale-graph" style="height: 150px;"></div>
				</div>
			</div>

			<div class="span4">
				<div class="widget widget-body-white">
					<div class="widget-head"><h4 class="heading strong text-uppercase">ស្ថានភាពអតិថិជន</h4></div>
					<div class="widget-body padding-none">
						<table class="table table-striped table-vertical-center table-condensed margin-none">
							<tbody>
								<tr>									
									<td class="text-primary border-none">ផ្អាកប្រើប្រាស់</td>
									<td class="text-right strong">
										<span class="badge badge-warning" data-bind="text: voidCustomer"></span>
										នាក់
									</td>
								</tr>
								<tr>									
									<td class="text-primary">ឈប់ប្រើប្រាស់</td>
									<td class="text-right strong">
										<span class="badge badge-important" data-bind="text: inactiveCustomer"></span>
										នាក់
									</td>
								</tr>
								<tr>									
									<td class="text-primary">សរុបទាំងអស់</td>
									<td class="text-right strong">
										<span class="badge badge-inverse" data-bind="text: totalCustomer"></span>
										នាក់
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>

				<div class="widget widget-heading-simple widget-body-white">
					<div class="widget-body padding-none">
						<div class="row-fluid row-merge">
							<div class="span6">
								<div class="innerAll center">
									<h5 class="strong muted text-uppercase"><i class="icon-money text-faded"></i> មិនទាន់បង់ប្រាក់</h5>
									<span class="text-xlarge strong text-primary" data-bind="text: totalUnpaid"></span>
									នាក់
								</div>
							</div>
							<div class="span6">
								<div class="innerAll center muted">
									<h5 class="strong muted text-uppercase"><i class="icon-cut text-faded"></i> ផ្ដាច់ចរន្ត</h5>
									<span class="text-xlarge strong" data-bind="text: totalDisconnect"></span>
									នាក់
								</div>
							</div>
						</div>
					</div>
				</div>								
			</div>			
		</div>	

		<div class="row-fluid">		
	        <div>
	        	<input data-role="dropdownlist"                   
	                   data-value-primitive="true"
	                   data-text-field="text"
	                   data-value-field="value"
	                   data-bind="value: sorter,
	                              source: sortList,                              
	                              events: { change: sorterChanges }" />

	        	<input data-role="datepicker"
	        		   data-format="dd-MM-yyyy"
	                   data-bind="value: sdate,
	                              events: { change: dateChanges }" >

	            <input data-role="datepicker"
	            	   data-format="dd-MM-yyyy"
	                   data-bind="value: edate,
	                              events: { change: dateChanges }" >
	            
	            <button type="button" data-role="button" data-icon="search" data-bind="click: search"></button>
	        </div>
        	
            <div data-role="grid" 
					data-bind="source: saleByLocationDS"
				    data-auto-bind="false"	        
				    data-row-template="esale-by-location-row-template"						                           
				    data-columns='[
				    	{ title: "ល.រ", width: 45 },				       	
				        { title: "តំបន់" },	                     
				        { title: "អតិថិជនកំពុងប្រើប្រាស់" },
				        { title: "អតិថិជនឈប់ប្រើប្រាស់" },
				        { title: "ប្រាក់កក់" },
				        { title: "បរិមាណលក់ភ្លើង" },	            
				        { title: "ទឹកប្រាក់" },
				        { title: "ជំពាក់" },
				        { title: "សមតុល្យ" }				                           	                    
				    ]'></div>

    	</div>
    </div>
</script>
<script id="esale-by-location-row-template" type="text/x-kendo-tmpl">		
	<tr>		
		<td class="sno">1</td>
		<td>#=location_name#</td>		
		<td align="right">#=kendo.toString(active_customer, "n0")# នាក់</td>
		<td align="right">#=kendo.toString(inactive_customer, "n0")#​ នាក់</td>				
		<td align="right">#=kendo.toString(deposit, "c0", banhji.eDashBoard.locale)#</td>
		<td align="right">#=kendo.toString(usage, "n0")# kWh</td>		
		<td align="right">#=kendo.toString(sale, "c0", banhji.eDashBoard.locale)#</td>
		<td align="right">#=kendo.toString(unpaid, "c0", banhji.eDashBoard.locale)#</td>
		<td align="right">#=kendo.toString(sale-unpaid, "c0", banhji.eDashBoard.locale)#</td>				
    </tr>   
</script>

</script>
<script id="eMeter" type="text/x-kendo-template">
	<div class="container-fluid">	
		<div class="row-fluid">		    
			<div class="span12">			
				<div id="exampleMain" class="k-content">
					<span class="pull-right glyphicons no-js remove_2" 
						onclick="javascript:window.history.back()"><i></i></span>

					<h3>កុងទ័រ</h3>

					<input id="meters" style="width: 200px" /> |
					<input id="customers" style="width: 200px" />					
					<br><br>

					<div id="meter-window" data-role="window" data-visible="false" data-modal="true" data-resizable="false" data-iframe="true">				    	
					    <div id="example">
					    	<table cellpadding="5" cellspacing="5">			                
				                <tr>
				                  	<td>ប្រភេទ <span style="color:red">*</span></td>
				                  	<td>
				                  		<input id="item" name="item"
				                  			   data-role="dropdownlist"				                  			   
							                   data-auto-bind="false"
							                   data-value-primitive="true"
							                   data-text-field="name"
							                   data-value-field="id"
							                   data-bind="value: meter.item_id, source: itemDS"
							                   data-option-label="(--- ជ្រើសរើស ---)"
				                  			   required data-required-msg="ត្រូវការ ប្រភេទ" />
				                  	</td>
				                  	<td>តំបន់ <span style="color:red">*</span></td>
				                  	<td>
				                  		<input id="location" name="location"				                  				
							                   	data-bind="value: meter.location_id"
							                   	required data-required-msg="ត្រូវការ តំបន់" />
				                  	</td>			                  		                  	                             
				                </tr>
				                <tr>
				                  	<td>លេខកូដកុងទ័រ <span style="color:red">*</span></td>                    
				                  	<td>
				                  		<input id="meterNo" name="meterNo" class="k-textbox" 
				                  				data-bind="value: meter.number" 
				                  				required data-required-msg="ត្រូវការ លេខកូដកុងទ័រ"
				                  				style="width: 160px;" />
				                  	</td>                             
				                	<td>ប្រអប់</td>
				                  	<td>
				                  		<input id="electricityBox" name="electricityBox" 
				                  				disabled="disabled" 
				                  				data-bind="value: meter.electricity_box_id" />				                  			                  				                  		
				                  	</td>
				                </tr>
				                <tr>             
				                  	<td></td>
				                  	<td>
				                  		<input type="checkbox" data-bind="checked: meter.cover_sealed" /> សំណគំរបខ្សែ
				                  		<input type="checkbox" data-bind="checked: meter.ear_sealed" /> សំណត្រចៀក			                  		
				                  	</td>
				                  	<td>អំពែ</td>
				                	<td>
				                		<input data-role="dropdownlist"
				                				data-option-label="(--- ជ្រើសរើស ---)"
							                   	data-auto-bind="false"
							                   	data-value-primitive="true"
							                   	data-text-field="name"
							                   	data-value-field="id"
							                   	data-bind="value: meter.amperes.id, source: ampereList" />
				                	</td>			                
				                </tr>
				                <tr>
				                	<td>មេគុណ</td>
				                	<td>
				                		<input id="multiplier" name="multiplier"
				                			data-role="numerictextbox" 
				                			data-bind="value: meter.multiplier" 
				                			data-format="#" min="1" step="100" 
				                			placeholder="ឧ.1/10/100/1,000" />
				                	</td>
				                	<td>ចំនួនហ្វា</td>
				                  	<td>
				                  		<input data-role="dropdownlist"
				                  				data-option-label="(--- ជ្រើសរើស ---)"
							                   	data-auto-bind="false"
							                   	data-value-primitive="true"
							                   	data-text-field="name"
							                   	data-value-field="id"
							                   	data-bind="value: meter.phases.id, source: phaseList" />
				                  	</td>
				                </tr>
				                <tr>             
				                  	<td>ចំនួនខ្ទង់នាឡិកា <span style="color:red">*</span></td>
				                  	<td>
				                  		<input id="maxNo" name="maxNo" 
				                  				data-role="numerictextbox" 
				                  				data-bind="value: meter.max_number" 
				                  				data-format="n0" min="0" 
				                  				placeholder="ឧ.10,000/100,000" 
				                  				required data-required-msg="ត្រូវការ ចំនួនខ្ទង់នាឡិកា" />
				                  	</td>	                  	  	
				                  	<td>អាំងតង់សីុតេ</td>
				                  	<td>
				                  		<input data-role="dropdownlist"
				                  				data-option-label="(--- ជ្រើសរើស ---)"
							                   	data-auto-bind="false"
							                   	data-value-primitive="true"
							                   	data-text-field="name"
							                   	data-value-field="id"
							                   	data-bind="value: meter.voltages.id, source: voltageList" />
				                  	</td>                                   
				                </tr>
				                <tr>
				                	<td>ស្ថានភាព <span style="color:red">*</span></td>
				                  	<td>
				                  		<input id="meterStatus" name="meterStatus"
				                  				data-role="dropdownlist"
												data-option-label="(--- ជ្រើសរើស ---)"
												required data-required-msg="ត្រូវការ ស្ថានភាព" 
				                  				data-text-field="name" 
				                  				data-value-field="id" 
				                  				data-value-primitive="true"			                  				
				                  				data-bind="source: statusList, value: meter.status" />
				                  	</td>
				               	  	<td>តំលៃលក់</td>
				                  	<td>
				                  		<input data-role="dropdownlist"
				                  			   data-option-label="(--- ជ្រើសរើស ---)"				                  			   
							                   data-auto-bind="false"
							                   data-value-primitive="true"
							                   data-text-field="name"
							                   data-value-field="id"
							                   data-bind="value: meter.tariffs.id, source: tariffList" />
				                  	</td>			                	
				                </tr>
				                <tr>
				                	<td>REACTIVE OF</td>
				                	<td>
				                		<input id="reactiveOf" name="reactiveOf"
				                			   data-role="dropdownlist"
				                  			   data-option-label="(--- ជ្រើសរើស ---)"			                  			   
							                   data-auto-bind="false"
							                   data-value-primitive="true"
							                   data-text-field="name"
							                   data-value-field="id"
							                   data-bind="value: meter.reactive_of, source: parentMeterList" />
				                	</td>                 	
				                  	<td>លើកលែង</td>
				                  	<td>
				                  		<input data-role="dropdownlist"
				                  			   data-option-label="(--- ជ្រើសរើស ---)"			                  			   
							                   data-auto-bind="false"
							                   data-value-primitive="true"
							                   data-text-field="name"
							                   data-value-field="id"
							                   data-bind="value: meter.exemptions.id, source: exemptionList" />
				                  	</td>	                  	                        
				                </tr>
				                <tr valign="top">
				                	<td>BACKUP OF</td>
				                	<td>
				                		<input id="backupOf" name="backupOf"
				                			   data-role="dropdownlist"
				                  			   data-option-label="(--- ជ្រើសរើស ---)"
							                   data-auto-bind="false"
							                   data-value-primitive="true"
							                   data-text-field="name"
							                   data-value-field="id"
							                   data-bind="value: meter.backup_of, source: parentMeterList" />
				                	</td>
				                	<td>សំគាល់</td>
				                  	<td>
				                  		<textarea name="memo" id="memo" cols="" rows="2" 
				                  				data-bind="value: meter.memo"></textarea>
				                  	</td>
				                </tr>			                		                			                
				          	</table>				          
			          	
			          		<div id="status"></div>
			          		<button id="save" name="save" class="btn btn-primary"><i class="icon-hdd icon-white"></i> កត់ត្រា</button>                                  
			                <button class="btn" data-bind="click: closeMeterWindow"><i class="icon-off"></i> បិទ</button>			                
			          	</div>
				    </div>							
					
		        	<button class="btn btn-inverse" data-bind="click: openMeterWindow"><i class="icon-plus icon-white"></i></button>
					<br>
	            	<div data-role="grid" data-bind="source: dataSource"
				        data-auto-bind="false"								        			        
				        data-row-template="eMeter-row-template"				        			                        
				        data-columns='[
				        	{ title: "#កុងទ័រ" },
				            { title: "ប្រភេទ" },								            
				            { title: "ប្រអប់" },
				            { title: "ពត័មាន" },				            
				            { title: "ថ្លៃលក់" },
				            { title: "តួនាទី" },								            
				            { title: "ស្ថានភាព" }	,
				            { title: "", width: 100 }                    	                    
				        ]'></div>				
											
				</div> <!-- // End div example-->  
			</div> <!-- // End div span12-->
		</div>		
	</div> <!-- // End div row-fluid-->	
</script>
<script id="eMeter-row-template" type="text/x-kendo-template">	
	<tr>		
		<td>#=number#</td>
		<td>#=item_name#</td>
		<td>#=electricity_box_number#</td>		
		<td>
			<div>#=amperes.name#</div>
			<div>#=phases.name#</div>
			<div>#=voltages.name#</div>
		</td>
		<td>			
			<div>#=tariffs.name!==undefined?tariffs.name:""#</div>
			<div>#=exemptions.name!==undefined?exemptions.name:""#</div>
			<div>#=maintenances.name!==undefined?maintenances.name:""#</div>
		</td>
		<td>
			#if(reactive_of>0){#
				REACTIVE
			#}else if(backup_of>0){#
				BACKUP
			#}else{#
				
			#}#
		</td>
		<td>#:status==1 ? "ប្រើប្រាស់" : "ឈប់ប្រើ"#</td>
		<td align="center">            
			<span class="glyphicons no-js delete" data-bind="click: delete"><i></i></span>
			<span class="glyphicons no-js edit" data-bind="click: edit"><i></i></span>						
		</td>		
	</tr>
</script>

<script id="eReading" type="text/x-kendo-template">
	<div class="container-fluid">
		<div class="row-fluid">    
			<div class="span12">
				<div id="example" class="k-content">
					<span class="pull-right glyphicons no-js remove_2" 
						onclick="javascript:window.history.back()"><i></i></span>

					<h3>បញ្ចូលអំនានកុងទ័រ</h3>
					
					<div class="hidden-print">
						<div class="accordion" id="accordion">
						    <!-- //Accordion Item -->
						    <div class="accordion-group">
						        <div class="accordion-heading">
					            	<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse-1">
										បញ្ចូលអំនានដោយផ្ទាល់ដៃ
									</a>
						        </div>
						        <div id="collapse-1" class="accordion-body in collapse" style="height: auto;">
						            <div class="accordion-inner">
						            	<input data-role="datepicker" 
						            			data-bind="value: monthOfSearch" 
						            			data-start="year" data-depth="year" 
						            			data-format="MM-yyyy" placeHolder="ប្រចាំខែ" />						
										
										<input id="company" data-bind="value: company_id, events:{ change: companyChanges" />
						            	<input id="elocation" disabled="disabled" data-bind="value: location_id" />										
						            	|
						            	<input id="meters" data-bind="value: meter_id" />						            							            	
						          					          					          			          		
						          		<button type="button" class="btn btn-default" data-bind="click: search"><i class="icon-search"></i></button>
						          		<button type="button" class="btn btn-default" onclick="javascript:window.print()"><i class="icon-print"></i></button>					          			
						            </div>
						        </div>
						    </div>
						    <!-- // Accordion Item END -->

						    <!-- //Accordion Item -->
						    <div class="accordion-group">
						        <div class="accordion-heading">
					            	<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse-2">
							        	បញ្ចូលអំនានតាម IR Reader
							      	</a>
						        </div>
						        <div id="collapse-2" class="accordion-body collapse" style="height: 0px;">
						            <div class="accordion-inner">
						            	<input id="myFile" type="file" accept="text/csv">
						            	<button type="button" class="k-button btn-info" data-bind="click: readFile">ទាញយកទិន្នន័យ</button>
						            	<button type="button" class="btn btn-default" onclick="javascript:window.print()"><i class="icon-print"></i></button>
						            	<br>
										<span data-bind="text: uploadStatus"></span>
						            </div>
						        </div>
						    </div>
						    <!-- // Accordion Item END -->
						</div>					
					</div>

			        <div align="center">
			        	<h3 data-bind="text: strMonthOf"</h3>
			        	<h4 data-bind="text: strTransformer"></h4>
			        </div>
			        
			        <div class="demo-section">			        
					    <table class="table table-bordered table-striped table-white">
					        <thead>
					            <tr>
					                <th>អតិថិជន</th>
					                <th>ប្រអប់</th>						                
					                <th>កុងទ័រ</th>
					                <th>មេគុណ</th>
					                <th>ជុំថ្មី</th>
					                <th>លេខចាស់</th>
					                <th>លេខថ្មី</th>					                
					                <th class="right">សរុប</th>
					            </tr>
					        </thead>
					        <tbody data-role="listview"
					        		data-auto-bind="false"					        		 
					        		data-template="eReading-row-template" 
					        		data-bind="source: dataSource"></tbody>
					        <tfoot data-template="eReading-footer-template" 
					        		data-bind="source: this"></tfoot>						        
					    </table>
					    <div id="pager" class="k-pager-wrap"></div>
				    </div>				       
			        
					<br>					

			        <div>
			        	ប្រចាំខែ
			        	<input id="monthOf" name="monthOf" data-role="datepicker" 
				            			data-bind="value: month_of" 
				            			data-start="year" data-depth="year" data-format="MM-yyyy"
				            			required data-required-msg="ត្រូវការ ប្រចាំខែ"
				            			placeholder="ខែ-ឆ្នាំ" />				    
				    	
				    	ថ្ងៃអានចាប់ពី
                        <input type="text" data-role='datepicker' 
                        		id="fromDate" name="fromDate"
                        		data-bind="value: from_date"	            				
                        		data-type="date" data-format="dd-MM-yyyy"
                        		placeholder="ថ្ងៃ-ខែ-ឆ្នាំ"
                        		required data-required-msg="ត្រូវការ ថ្ងៃអានចាប់ពី"  />                        	    				        
			            
			            ដល់
                        <input type="text" data-role='datepicker' 
                        		id ="toDate" name="toDate"
                        		data-bind="value: to_date"	            				 
                        		data-type="date" data-format="dd-MM-yyyy"
                        		placeholder="ថ្ងៃ-ខែ-ឆ្នាំ"
                        		required data-required-msg="ដល់ថ្ងៃណា?" 
                        		data-greaterdate-field="fromDate" 
                        		data-greaterdate-msg='ត្រូវថ្មីជាង ថ្ងៃអានចាប់ពី' />                        
			            			        
			        	អ្នកអាន
			          	<input data-role="dropdownlist"
			                   data-option-label="(--- ជ្រើសរើស ---)"
			                   data-value-primitive="true"
			                   data-text-field="name"
			                   data-value-field="id"
			                   data-bind="value: read_by, source: readerDS"
			                   required data-required-msg="ត្រូវការ អ្នកអាន" />            
			        </div>
			        
			        <br>

			        <div id="status"></div>            			        	
          			<button id="save" class="btn btn-primary"><i class="icon-hdd icon-white"></i> កត់ត្រា​</button>

				</div> <!-- //End div example-->            
			</div> <!-- //End div span12-->		
		</div> <!-- //End div row-fluid-->
	</div>
</script>
<script id="eReading-row-template" type="text/x-kendo-tmpl">
	<tr>					
		<td>#=fullname#</td>	
		<td>#=electricity_box_number#</td>
		<td>#=number#</td>
		<td>#=multiplier#</td>
		<td align="center">
			<input type="checkbox" data-bind="checked: new_round, events:{ change: onChange }" />
		</td>		
		<td>
			<input data-role="numerictextbox"
				   data-min="0"
				   data-format="n0"                                      
                   data-bind="value: previous, events:{ change: onChange }"
                   style="width: 100px" #=previous>0?disabled='disabled':''# />
		</td>
		<td>
			<input class="txt#=index#" data-role="numerictextbox"
				   data-min="0"
				   data-format="n0"                                      
                   data-bind="value: current, events:{ change: onChange }"                   
                   style="width: 100px" />            
			<span class="label label-important" data-bind="invisible: isValid"><strong>កំហុស!</strong></span>			
		</td>		
		<td class="right" data-bind="text: usage"></td>	
    </tr>
</script>
<script id="eReading-footer-template" type="text/x-kendo-template">
    <tr>    	
        <td class="right" colspan="8" style="font-size:30px;">
            សរុប: #:total()# kWh
        </td>
    </tr>
</script>

<script id="eInvoice" type="text/x-kendo-template">	
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span12">
				<div id="example" class="k-content">
					<span class="pull-right glyphicons no-js remove_2" 
						onclick="javascript:window.history.back()"><i></i></span>

					<h3>រៀបចំវិក្កយបត្រ</h3>

					<br>
					
					<div class="hidden-print">
						<input data-role="datepicker" 
		            			data-bind="value: monthOfSearch" 
		            			data-start="year" data-depth="year" 
		            			data-format="MM-yyyy" placeHolder="ប្រចាំខែ" />						
										
						<input id="company" data-bind="value: company_id, events:{ change: companyChanges" />
		            	<input id="elocation" disabled="disabled" data-bind="value: location_id" />
		            	|
		            	<input id="meters" data-bind="value: meter_id" />		            	

		            	<button type="button" class="btn btn-default" data-bind="click: search"><i class="icon-search"></i></button>								
					</div>											

					<br>
					
					<table class="table table-bordered table-striped table-white">
				        <thead>
				            <tr>
				                <th><input type="checkbox" data-bind="checked: chkAll, events: {change : checkAll}" /></th>				                				                
				                <th>អតិថិជន</th>	                    
				                <th>ប្រអប់</th>
				                <th>កុងទ័រ</th>
				                <th>មេគុណ</th>				                
				                <th>លេខចាស់</th>
				                <th>លេខថ្មី</th>
				                <th>សរុប</th>	                    
				            </tr>
				        </thead>
				        <tbody data-role="listview" 
				        		data-template="eInvoice-row-template" 
				        		data-auto-bind="false" 
				        		data-bind="source: readingDS"></tbody>
				        <tfoot data-template="eInvoice-footer-template" 
					        		data-bind="source: this"></tfoot>	            
				    </table>
				    <div id="pager" class="k-pager-wrap"></div>

				    <br>
				    
				    <div>
						ប្រចាំខែ
						<input id="monthOf" name="monthOf" data-role="datepicker" 
		            			data-bind="value: month_of"	data-start="year" 
		            			data-depth="year" data-format="MM-yyyy"
		            			required data-required-msg="ត្រូវការ ប្រចាំខែ" />
				        ថ្ងៃចេញវិក្កយបត្រ
				        <input id="issuedDate" name="issuedDate" data-role="datepicker" 
		            			data-bind="value: issued_date" data-format="dd-MM-yyyy"
		            			required data-required-msg="ត្រូវការ ថ្ងៃចេញវិក្កយបត្រ" />
				        ថ្ងៃចាប់ផ្ដើមទទួលប្រាក់
				        <input id="paymentDate" name="paymentDate" data-role="datepicker" 
		            			data-bind="value: payment_date" data-format="dd-MM-yyyy"
		            			required data-required-msg="ត្រូវការ ថ្ងៃបង់ប្រាក់" />
				        ថ្ងៃផុតកំណត់
				        <input id="dueDate" name="dueDate" data-role="datepicker" 
		            			data-bind="value: due_date" data-format="dd-MM-yyyy"
		            			required data-required-msg="ត្រូវការ ថ្ងៃផុតកំណត់" />			           	          	
				    </div>
				         
				    <br />
				    
				    <div>
				      	<div id="status"></div>				      	
				      	<button id="save" class="btn btn-primary"><i class="icon-list-alt icon-white"></i> រៀបចំវិក្កយបត្រ</button>     
				    </div>			   
				</div><!-- //End div example-->
			</div><!-- //End div span12-->
		</div><!-- //End div row-fluid-->
	</div>	
</script>
<script id="eInvoice-row-template" type="text/x-kendo-tmpl">
	<tr>
		<td align="center">
		   <input type="checkbox" data-bind="checked: isCheck" />
		</td>						
		<td>#=customers.fullname#</td>		
		<td>#=meters.electricity_box_number#</td>
		<td>#=meters.number#</td>
		<td>#=meters.multiplier#</td>						
		<td class="right">#=previous#</td>
		<td class="right">#=current#</td>		
		<td class="right">#=usage# kWh</td>		
    </tr>
</script>
<script id="eInvoice-footer-template" type="text/x-kendo-template">
    <tr>    	
        <td class="right" colspan="8" style="font-size:30px;">
            សរុប: #:total()# kWh
        </td>
    </tr>
</script>

<script id="eInvoicePrint" type="text/x-kendo-template">
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span12">
				<div id="example" class="k-content">
					<span class="pull-right glyphicons no-js remove_2" 
						onclick="javascript:window.history.back()"><i></i></span>

					<h3 class="hidden-print">បោះពុម្ពវិក្កយបត្រ</h3>
					<br>					

					<div class="hidden-print">								
						<input data-role="datepicker" 
		            			data-bind="value: monthOfSearch" 
		            			data-start="year" data-depth="year" 
		            			data-format="MM-yyyy" placeHolder="ប្រចាំខែ" />						
										
						<input id="company" data-bind="value: company_id, events:{ change: companyChanges" />
		            	<input id="elocation" disabled="disabled" data-bind="value: location_id" />
		            	|
		            	<input id="invoices" />
						
						<button type="button" class="btn btn-default" data-bind="click: search"><i class="icon-search"></i></button>
						<button type="button" class="btn btn-default" onclick="javascript:window.print()"><i class="icon-print"></i></button>				
						<input id="chkVisible" type="checkbox" data-bind="events: {click: print}" /> ប្រើក្រដាសពុម្ព
						<br>
						<div id="pager" class="k-pager-wrap"></div>																			
					</div>					
					
					<div data-role="listview" data-bind="source: dataSource" 
						data-template="eInvoice-print-row-template" data-auto-bind="false"></div>
		
				</div><!-- //End div example-->
			</div><!-- //End div span12-->
		</div><!-- //End div row-fluid-->
	</div>	
</script>
<script id="eInvoice-print-row-template" type="text/x-kendo-tmpl">	
  	<div class="print">
  		<table width="100%" style="margin-bottom: 8px;">
	    	<tr>
	    		<td align="center" >
	    			<img src="/banhji/#:companies.image_url#" height="90" width="60" style="float: left">
	    			<div>	    			
		    			<h4>#:companies.name#</h4>					
						#:companies.address# <br>
						#:companies.phone# /
						#:companies.mobile#
					</div>					
	    		</td>
	    	</tr>
	    </table>	        

	    <div class="hiddenPrint" style="border-bottom: 1px solid black;"></div>							
		
		<table width="100%" style="margin-bottom: 8px; font-size: xx-small;">
			<tr>
				<td valign="top" rowspan="6" width="50%" align="left">
					<span class="#=number#"></span>
					#:customers.number# #:customers.fullname# <br>
					#:customers.address# <br>
					ថ្ងៃចាប់ផ្ដើមទទួលប្រាក់: #=kendo.toString(new Date(payment_date), "dd-MM-yyyy")#
				</td>
				<td class="hiddenPrint" width="50%">លេខវិក្កយបត្រ INVOICE NO</td>
				<td>#:number#</td>							
			</tr>
			<tr>
				<td class="hiddenPrint">វិក្កយបត្រ INVOICE DATE</td>
				<td>#:kendo.toString(new Date(issued_date), "dd-MM-yyyy")#</td>											
			</tr>
			<tr>
				<td class="hiddenPrint">តំបន់ AREA</td>
				<td>#:location_name#</td>							
			</tr>
			<tr>
				<td class="hiddenPrint">លេខប្រអប់ BOX NO</td>
				<td>#:invoiceLineList[0].meters.electricity_box_number#</td>				
			</tr>
			<tr>
				<td class="hiddenPrint">គិតចាប់ពីថ្ងៃទី FROM</td>
				<td>#:kendo.toString(new Date(invoiceLineList[0].meters.from_date), "dd-MM-yyyy")#</td>							
			</tr>
			<tr>
				<td class="hiddenPrint">ដល់ថ្ងៃទី TO</td>
				<td>#:kendo.toString(new Date(invoiceLineList[0].meters.to_date), "dd-MM-yyyy")#</td>
			</tr>
		</table>		
		
		<table width="100%" style="height: 260px;font-size: xx-small;">
			<thead class="hiddenPrint" style="border:1px solid black">
				<tr>
					<th align="center" width="10%">លេខកុងទ័រ <br> METER</th>
					<th align="center" width="15%">អំនានចាស់ <br> PREVIOUS</th>
					<th align="center" width="15%">អំនានថ្មី <br> CURRENT</th>
					<th align="center" width="10%">មេគុណ <br> <span style="font-size:5pt">MULTIPLICATION</span></th>
					<th align="center" width="15%">ប្រើប្រាស់ <br> <span style="font-size:5pt">CONSUMPTION</span></th>
					<th align="center" width="15%">តំលៃឯកត្តា <br> RATE</th>
					<th align="center" width="20%">តំលៃសរុប <br> AMOUNT</th>	
				</tr>
			</thead>			
			<tbody>
				<tr>					
					<td colspan="6" align="right" valign="top">
						ប្រាក់ជំពាក់ខែមុន						
						<br>
						ប្រាក់សងខែមុន						
						<br>
						ប្រាក់នៅជំពាក់						
					</td>
					<td align="right" valign="top">#:kendo.toString(kendo.parseFloat(balance_forward)/kendo.parseFloat(rate), 'c', locale)#</td>
				</tr>												
				#for(var i=0; i<invoiceLineList.length; i++) {#
					<tr>
						<td width="10%">
							#:invoiceLineList[i].meters.number#												
						</td>
						<td align="right">#:invoiceLineList[i].meters.previous#</td>
						<td align="right">#:invoiceLineList[i].meters.current#</td>
						<td align="center">#:invoiceLineList[i].meters.multiplier#</td>
						<td align="right">#:kendo.toString(kendo.parseInt(invoiceLineList[i].unit), 'n0')#</td>
						<td align="right">#:kendo.toString(kendo.parseFloat(invoiceLineList[i].price)/kendo.parseFloat(rate), 'c', locale)#</td>
						<td align="right">#:kendo.toString(kendo.parseFloat(invoiceLineList[i].amount)/kendo.parseFloat(rate), 'c', locale)#</td>
					</tr>
				#}#											
			</tbody>
			<tfoot>
				<tr>
					<td colspan="7">
						<p>#:memo#</p>
					</td>
				</tr>				
			</tfoot>			
		</table>				

        <table class="hiddenPrint" width="100%" border="1" cellpadding="2" cellspacing="2" style="font-size: xx-small;">
        	<tr>
        		<td rowspan="6" width="50%">
        			#=companies.term_of_condition#
        		</td>
        		<td width="30%">
        			<div style="float:left;text-align:left;">បំណុលខែនេះ</div>
  					<div style="float:right;text-align:right; font-size: 6pt;">TOTAL BALANCE</div>
        		</td>
        		<td width="20%" align="right" style="visibility:visible;">#:kendo.toString(kendo.parseFloat(total)/kendo.parseFloat(rate), 'c', locale)#</td>
        	</tr>
        	<tr>
        		<td>
        			<div style="float:left;text-align:left;">ទឹកប្រាក់ត្រូវបង់</div>
  					<div style="float:right;text-align:right;">TOTAL DUE</div>
        		</td>
        		<td align="right" style="visibility:visible;">#:kendo.toString(kendo.parseFloat(total)/kendo.parseFloat(rate), 'c', locale)#</td>        		
        	</tr>
        	<tr>
        		<td>
        			<div style="float:left;text-align:left;">ថ្ងៃផុតកំណត់</div>
  					<div style="float:right;text-align:right;">DUE DATE</div>
        		</td>
        		<td align="right" style="visibility:visible;">#:kendo.toString(new Date(due_date), 'dd-MM-yyyy')#</td>        		
        	</tr>
        	<tr>
        		<td>
        			<div style="float:left;text-align:left;">ថ្ងៃបង់ប្រាក់</div>
  					<div style="float:right;text-align:right;">PAY DATE</div>
        		</td>
        		<td></td>        		
        	</tr>
        	<tr>
        		<td>
        			<div style="float:left;text-align:left;">ប្រាក់បានបង់</div>
  					<div style="float:right;text-align:right;">PAY AMOUNT</div>
        		</td>
        		<td></td>        		
        	</tr>        	    	
        </table>			

		<div class="hiddenPrint" style="border: 1px dashed black; margin: 6px 6px;"></div>

		<table class="hiddenPrint" width="100%" border="1" cellpadding="2" cellspacing="2" style="font-size: xx-small;">
			<tr>
				<td colspan="2" rowspan="4" width="50%" style="visibility:visible;">
					<span class="#=number#"></span> <br>
					អតិថិជន: #=customers.number# #=customers.fullname# <br>
					ទីតាំងចរន្ត: #=location_name#, ប្រអប់: #=invoiceLineList[0].meters.electricity_box_number#
				</td>										
				<td width="30%">
					<div style="float:left;text-align:left;">ទឹកប្រាក់ត្រូវបង់</div>
  					<div style="float:right;text-align:right;">TOTAL DUE</div>
				</td>
				<td align="right" width="20%" style="visibility:visible;">#:kendo.toString(kendo.parseFloat(total)/kendo.parseFloat(rate), 'c', locale)#</td>
			</tr>
			<tr>							    
				<td>
					<div style="float:left;text-align:left;">ថ្ងៃផុតកំណត់</div>
  					<div style="float:right;text-align:right;">DUE DATE</div>
				</td>
				<td align="right" style="visibility:visible;">#:kendo.toString(new Date(due_date), 'dd-MM-yyyy')#</td>
			</tr>
			<tr>							    
				<td>
					<div style="float:left;text-align:left;">ថ្ងៃបង់ប្រាក់</div>
  					<div style="float:right;text-align:right;">PAY DATE</div>
				</td>
				<td></td>
			</tr>
			<tr>				
				<td>
					<div style="float:left;text-align:left;">អ្នកទទួលប្រាក់</div>
  					<div style="float:right;text-align:right;">CASHIER</div>
				</td>
				<td></td>
			</tr>
		</table>
	</div>
</script>


<!-- ***************************
 *	Water Section      	  *
**************************** -->
<script id="wDashBoard" type="text/x-kendo-template">
	<div class="container-fluid menu-hidden sidebar-hidden-phone fluid menu-left">
		<img src="uploads/pictures/banhji_water.png" width="300" height="100" />	
		
		<div class="row row-merge">
			<div class="span4">
				<div class="innerAll padding-bottom-none-phone">
					<a href="#/wCustomer_balance" class="widget-stats widget-stats-primary widget-stats-4">
						<span class="txt">សមតុល្យ</span>
						<span class="count" style="font-size: 35px;" data-bind="text: balance"></span>
						<span class="glyphicons coins"><i></i></span>
						<div class="clearfix"></div>
						<i class="icon-play-circle"></i>
					</a>
				</div>
			</div>
			<div class="span4">
				<div class="innerAll padding-bottom-none-phone">
					<a href="#/wCustomer_deposit" class="widget-stats widget-stats-inverse widget-stats-4">
						<span class="txt">ប្រាក់កក់</span>
						<span class="count" style="font-size: 35px;" data-bind="text: deposit"></span>
						<span class="glyphicons briefcase"><i></i></span>
						<div class="clearfix"></div>
						<i class="icon-play-circle"></i>
					</a>
				</div>
			</div>			
			<div class="span4">
				<div class="innerAll padding-bottom-none-phone">
					<a href="#/wCustomer_list" class="widget-stats widget-stats-gray widget-stats-4">
						<span class="txt">អតិថិជនសកម្ម</span>
						<span class="count"​><span data-bind="text: activeCustomer"></span> <span>នាក់</span></span> 
						<span class="glyphicons user"><i></i></span>
						<div class="clearfix"></div>
						<i class="icon-play-circle"></i>
					</a>
				</div>
			</div>			
		</div>

		<div class="row">			
			<div class="span8">
				<div class="heading-buttons">
					<h2 class="heading pull-left"><i class="icon-bar-chart icon-fixed-width text-primary"></i> លក់ប្រចាំខែ</h2>
					
					<div class="clearfix"></div>
				</div>

				<div class="innerLR innerT">			
					<div id="wsale-graph" style="height: 200px;"></div>
				</div>
			</div>

			<div class="span4">
				<div class="widget widget-body-white">
					<div class="widget-head"><h4 class="heading strong text-uppercase">ស្ថានភាពអតិថិជន</h4></div>
					<div class="widget-body padding-none">
						<table class="table table-striped table-vertical-center table-condensed margin-none">
							<tbody>
								<tr>									
									<td class="text-primary border-none">ផ្អាកប្រើប្រាស់</td>
									<td class="text-right strong">
										<span class="badge badge-warning" data-bind="text: voidCustomer"></span>
										នាក់
									</td>
								</tr>
								<tr>									
									<td class="text-primary">ឈប់ប្រើប្រាស់</td>
									<td class="text-right strong">
										<span class="badge badge-important" data-bind="text: inactiveCustomer"></span>
										នាក់
									</td>
								</tr>
								<tr>									
									<td class="text-primary">សរុបទាំងអស់</td>
									<td class="text-right strong">
										<span class="badge badge-inverse" data-bind="text: totalCustomer"></span>
										នាក់
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>

				<div class="widget widget-heading-simple widget-body-white">
					<div class="widget-body padding-none">
						<div class="row-fluid row-merge">
							<div class="span6">
								<div class="innerAll center">
									<h5 class="strong muted text-uppercase"><i class="icon-money text-faded"></i> មិនទាន់បង់ប្រាក់</h5>
									<a href="#/wAging_summary" class="text-xlarge strong text-primary" data-bind="text: totalUnpaid"></a>
									នាក់
								</div>
							</div>
							<div class="span6">
								<div class="innerAll center muted">
									<h5 class="strong muted text-uppercase"><i class="icon-dashboard text-faded"></i> មិនទាន់ភ្ជាប់កុងទ័រ</h5>
									<a href="#/wCustomer_no_meter" class="text-xlarge strong" data-bind="text: totalNoMeter"></a>
									នាក់
								</div>
							</div>
						</div>
					</div>
				</div>								
			</div>			
		</div>	

		<div class="row-fluid">
	        <form id="employeeForm" data-role="validator" novalidate="novalidate">
                <div id="fieldlist">
                	<input data-role="dropdownlist"                   
	                   data-value-primitive="true"
	                   data-text-field="text"
	                   data-value-field="value"
	                   data-bind="value: sorter,
	                              source: sortList,                              
	                              events: { change: sorterChanges }" />
	                                           
                    <input type="text" data-role='datepicker' id="sdate" name="sdate" data-type="date" data-bind="value: sdate" />
                    <span data-for='sdate' class='k-invalid-msg'></span>

                    <input type="text" data-role='datepicker' id ="edate" data-type="date" name="edate" data-bind="value: edate" 
                    		data-greaterdate-field="sdate" data-greaterdate-msg='សូមពិនិត្យមើលកាលបរិច្ឆទឡើងវិញ' />
                    <span data-for='edate' class='k-invalid-msg'></span>
               
                    <button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>                           
                </div>
            </form>

            <table class="table table-bordered table-vertical-center table-pricing table-pricing-2">
        		<thead>
        			<tr>
        				<th width="45" class="center">ល.រ</th>
        				<th class="center">អាជ្ញាប័ណ្ណ</th>
        				<th class="center">ចំនួនតំបន់</th>
        				<th class="center">អតិថិជនកំពុងប្រើប្រាស់</th>
        				<th class="center">អតិថិជនឈប់ប្រើប្រាស់</th>	            				
        				<th class="center">ប្រាក់កក់</th>	            				
        				<th class="center">បរិមាណលក់ទឹក</th>
        				<th class="center">ទឹកប្រាក់</th>        				
        				<th class="center">សមតុល្យ</th>	            					            				
        			</tr>
        		</thead>
        		<tbody data-role="listview"
        				data-auto-bind="false"	            					            			
		                data-template="wsale-by-branch-row-template"
		                data-bind="source: saleByBranchDS"></tbody>
        	</table>            

			<p class="separator text-center"><i class="icon-ellipsis-horizontal icon-3x"></i></p>

			<table class="table table-bordered table-striped table-white">
        		<thead>
        			<tr>
        				<th width="45">ល.រ</th>
        				<th>អាជ្ញាប័ណ្ណ</th>
        				<th>តំបន់</th>
        				<th>អតិថិជនកំពុងប្រើប្រាស់</th>
        				<th>អតិថិជនឈប់ប្រើប្រាស់</th>	            				
        				<th>ប្រាក់កក់</th>	            				
        				<th>បរិមាណលក់ទឹក</th>
        				<th>ទឹកប្រាក់</th>        				
        				<th>សមតុល្យ</th>	            					            				
        			</tr>
        		</thead>
        		<tbody data-role="listview"
        				data-auto-bind="false"	            					            			
		                data-template="wsale-by-location-row-template"
		                data-bind="source: saleByLocationDS"></tbody>
        	</table> 

    	</div>
    </div>
</script>
<script id="wsale-by-branch-row-template" type="text/x-kendo-tmpl">		
	<tr>		
		<td class="sno">1</td>
		<td>#=name#</td>
		<td>#=location#</td>		
		<td align="right">#=kendo.toString(active_customer, "n0")# នាក់</td>
		<td align="right">#=kendo.toString(inactive_customer, "n0")#​ នាក់</td>				
		<td align="right">#=kendo.toString(deposit, "c0", banhji.institute.locale)#</td>
		<td align="right">#=kendo.toString(usage, "n0")# m<sup>3</sup></td>		
		<td align="right">#=kendo.toString(sale, "c0", banhji.institute.locale)#</td>
		<td align="right">#=kendo.toString(unpaid, "c0", banhji.institute.locale)#</td>					
    </tr>   
</script>
<script id="wsale-by-location-row-template" type="text/x-kendo-tmpl">		
	<tr>		
		<td class="snoo">1</td>
		<td>#=branch_name#</td>
		<td>#=location_name#</td>		
		<td align="right">#=kendo.toString(active_customer, "n0")# នាក់</td>
		<td align="right">#=kendo.toString(inactive_customer, "n0")#​ នាក់</td>				
		<td align="right">#=kendo.toString(deposit, "c0", banhji.eDashBoard.locale)#</td>
		<td align="right">#=kendo.toString(usage, "n0")# m<sup>3</sup></td>		
		<td align="right">#=kendo.toString(sale, "c0", banhji.eDashBoard.locale)#</td>
		<td align="right">#=kendo.toString(unpaid, "c0", banhji.eDashBoard.locale)#</td>						
    </tr>   
</script>

<script id="wCustomerCenter" type="text/x-kendo-template">	
	<div class="widget widget-heading-simple widget-body-gray widget-employees">		
		<div class="widget-body padding-none">			
			<div class="row-fluid row-merge">
				<div class="span3 listWrapper" style="height: 700px;">
					<div class="innerAll">							
						<form autocomplete="off" class="form-inline">
							<div class="widget-search separator bottom">
								<button type="button" class="btn btn-default pull-right" data-bind="click: search"><i class="icon-search"></i></button>
								<div class="overflow-hidden">
									<input type="search" placeholder="អតិថិជន..." data-bind="value: searchText, events:{change: enterSearch}">
								</div>
							</div>
							<div class="select2-container" style="width: 100%;">								
																
							</div>
						</form>					
					</div>
					
					<span class="results"><span data-bind="text: contactDS.total"></span> នាក់</span>

					<div class="table table-condensed" style="height: 580px;"						 
						 data-role="grid" 
						 data-bind="source: contactDS"
						 data-auto-bind="false" 
						 data-row-template="customer-list-wCustomer-center-tmpl"
						 data-columns="[{title: ''}]"
						 data-selectable=true
						 data-height="600"						 
						 data-scrollable="{virtual: true}"></div>									
				</div>
				<div class="span9 detailsWrapper">
					<div class="row-fluid">					
						<div class="span6">
							<div class="widget widget-4 widget-tabs-icons-only margin-bottom-none">

							    <!-- Widget Heading -->
							    <div class="widget-head">

							        <!-- Tabs -->
							        <ul class="pull-right">
							            <li>Filter by</li>
							            <li class="glyphicons stats active"><span data-toggle="tab" data-target="#tab1-8"><i></i></span>
							            </li>
							            <li class="glyphicons riflescope"><span data-toggle="tab" data-target="#tab2-8"><i></i></span>
							            </li>
							            <li class="glyphicons dashboard"><span data-toggle="tab" data-target="#tab3-8"><i></i></span>
							            </li>
							            <li class="glyphicons circle_info"><span data-toggle="tab" data-target="#tab4-8"><i></i></span>
							            </li>							            
							            <li class="glyphicons pen"><span data-toggle="tab" data-target="#tab5-8"><i></i></span>
							            </li>
							            <li class="glyphicons edit"><span data-bind="click: goEditContact"><i></i></span>
							            </li>
							            <li class="glyphicons user_add"><a href="#/customer"><i></i></a>
							            </li>
							            <li class="glyphicons circle_plus"><span data-toggle="tab" data-target="#tab8-8"><i></i></span>
							            </li>							            
							        </ul>
							        <div class="clearfix"></div>
							        <!-- // Tabs END -->

							    </div>
							    <!-- Widget Heading END -->

							    <div class="widget-body">
							        <div class="tab-content">

							            <!-- GRAPH Tab content -->
							            <div id="tab1-8" class="tab-pane active box-generic">
							            	<div id="wUsage-graph" style="height: 180px;"></div>
							            </div>
							            <!-- // GRAPH Tab content END -->

							            <!-- SEARCH Tab content -->
							            <div id="tab2-8" class="tab-pane box-generic">							            	
							                <input id="ddlBranch" data-bind="value: branch_id, events:{change:branchChanges}" style="width: 100%;" />							                
							                <input id="ddlLocation" data-bind="value: location_id" disabled="disabled" style="width: 100%;" />

							                <input data-role="dropdownlist"
							                	   data-auto-bind="false"
						            			   data-option-label="(--- រើស ប្រភេទអតិថិជន ---)"					            			   		                   
								                   data-value-primitive="true"
								                   data-text-field="name"
								                   data-value-field="id"
								                   data-bind="value: contact_type_id,
								                              source: contactTypeDS"
								                   style="width: 100%"/>

							                <input data-role="dropdownlist"
						            			   data-option-label="(--- រើស រូបិយប័ណ្ណ ---)"					            			   		                   
								                   data-value-primitive="true"
								                   data-text-field="code"
								                   data-value-field="id"
								                   data-bind="value: currency_id,
								                              source: currencyDS"
								                   style="width: 100%"/>

								            <br><br>
								            <span class="btn btn-primary btn-icon glyphicons search pull-right" data-bind="click: search"><i></i>ស្វែងរក</span>
								            <br>
							            </div>
							            <!-- // SEARCH Tab content END -->

							            <!-- METER Tab content -->
							            <div id="tab3-8" class="tab-pane box-generic">
							            	
							            	<span class="btn btn-primary btn-icon glyphicons circle_plus" data-bind="click: goToNewWaterDeposit"><i></i> ភ្ជាប់នាឡិការស្ទង់ថ្មី</span>

							            	<table class="table table-bordered table-striped table-white">
												<thead>
													<tr>
														<th>ប្រាក់កក់</th>
														<th>ថ្លៃសេវា</th>														
														<th>លេខកុងទ័រ</th>																												
														<th></th>														
													</tr>
												</thead>	            		
							            		<tbody data-role="listview"
							            				data-auto-bind="false"	            					            					            					            			
										                data-template="wMeter-wCustomer-center-tmpl"
										                data-bind="source: meterDS">
										        </tbody>
							            	</table>
							            </div>
							            <!-- // METER Tab content END -->

							            <!-- INFO Tab content -->
							            <div id="tab4-8" class="tab-pane box-generic">
							            	<div class="row-fluid">
								            	<div class="span6">
										
													<!-- Bio -->
													<div class="widget widget-heading-simple widget-body-gray margin-none">
														<div class="widget-head">
															<h4 class="heading glyphicons user"><i></i> <span data-bind="text: obj.wnumber"></span> <span data-bind="text: obj.fullname"></span></h4>
														</div>
														<div class="widget-body">
															<ul class="unstyled icons margin-none">
																<li class="glyphicons group"><i></i> ប្រភេទ៖ <span data-bind="text: obj.contact_type[0].name"></span></li>
																<li class="glyphicons phone"><i></i> ទូរស័ព្ទ៖ <span data-bind="text: obj.phone"></span></li>
																<li class="glyphicons envelope"><i></i> អុីម៉ែល៖ <span data-bind="text: obj.email"></li>
																<li class="glyphicons calendar"><i></i> ចុះឈ្មោះ៖ <span data-bind="text: obj.registered_date"></li>
															</ul>
														</div>
													</div>
													<!-- // Bio END -->
													
												</div>
												<div class="span6">
													<!-- Bio -->
													<div class="widget widget-heading-simple widget-body-gray margin-none">
														<div class="widget-head">
															<h4 class="heading glyphicons edit" data-bind="click: goEditContact"><i></i> កែប្រែ</h4>
														</div>
														<div class="widget-body">
															<p><i class="icon-home"></i> អាស័យដ្ឋាន៖ <span data-bind="text: obj.address"></span></p>
														</div>
													</div>
													<!-- // Bio END -->
												</div>
											</div>
							            </div>
							            <!-- // INFO Tab content END -->

							            <!-- NOTE Tab content -->
							            <div id="tab5-8" class="tab-pane box-generic">

										    <div class="chat-controls">															
												<form class="margin-none">
													<div class="row-fluid">
														<div class="span10">
															<input type="text" name="message" class="input-block-level margin-none" data-bind="value: note" placeholder="កំណត់សំគាល់ ...">
														</div>
														<div class="span2">
															<span class="btn btn-block btn-primary" data-bind="click: saveNote">កត់ត្រា</span>
														</div>
													</div>
												</form>															
											</div>

											<br>

									    	<div data-role="grid"
									    	 	 data-height="100"
					 							 data-scrollable="true"									                 
								                 data-row-template="wCustomer-center-note-tmpl"
								                 data-bind="source: noteDS"
								                 data-columns="[{title: ''}]"></div>
											
							            </div>
							            <!-- // NOTE Tab content END -->

							            <!-- INVOICE Tab content -->
							            <div id="tab8-8" class="tab-pane box-generic">
							            	<table class="table table-borderless table-condensed cart_total">
								            	<tr>
								            		<td>
								            			<span class="btn btn-block btn-inverse" data-bind="click: goEstimate">សម្រង់តម្លៃ</span>
								            		</td>
								            		<td>
								            			<span class="btn btn-block btn-inverse" data-bind="click: goInvoice">វិក្កយបត្រ</span>
								            		</td>
								            	</tr>
								            	<tr>
								            		<td>
								            			<span class="btn btn-block btn-inverse" data-bind="click: goSO">បញ្ជាលក់</span>
								            		</td>
								            		<td>
								            			<span class="btn btn-block btn-inverse" data-bind="click: goReceipt">បង្កាន់ដៃលក់</span>								            			
								            		</td>
								            	</tr>
								            	<tr>
								            		<td>
								            			<span class="btn btn-block btn-inverse" data-bind="click: goGDN">លិខិតដឹកទំនិញ</span>
								            		</td>
								            		<td>
								            			<span class="btn btn-block btn-inverse" data-bind="click: goStatement">បញ្ជីសមតុល្យ</span>
								            		</td>
								            	</tr>
							            	</table>
							            </div>
							            <!-- // INVOICE Tab content END -->								            

							        </div>
							    </div>
							</div>
						</div>

						<div class="span6">
							<div class="row-fluid">
								<div class="span6">
									<div class="widget-stats widget-stats-primary widget-stats-5" data-bind="click: loadBalance">
										<span class="glyphicons coins"><i></i></span>
										<span class="txt">សមតុល្យ<span data-bind="text: balance" style="font-size:medium;"></span></span>
										<div class="clearfix"></div>
									</div>
								</div>
								<div class="span6">
									<div class="widget-stats widget-stats-inverse widget-stats-5" data-bind="click: loadDeposit">
										<span class="glyphicons briefcase"><i></i></span>
										<span class="txt">ប្រាក់កក់<span data-bind="text: deposit" style="font-size:medium;"></span></span>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>							
							
							<div class="row-fluid">
								<div class="span6">
									<div class="widget-stats widget-stats-info widget-stats-5" data-bind="click: loadBalance">
										<span class="glyphicons circle_exclamation_mark"><i></i></span>
										<span class="txt"><span data-bind="text: outInvoice"></span> មិនទាន់ទូទាត់</span>
										<div class="clearfix"></div>
									</div>
								</div>
								<div class="span6">
									<div class="widget-stats widget-stats-default widget-stats-5" data-bind="click: loadOverInvoice">
										<span class="glyphicons turtle"><i></i></span>
										<span class="txt"><span data-bind="text: overInvoice"></span> ហួសកំណត់</span>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>														
						</div>											          	
		          	</div>
					
					<div>
						<input data-role="dropdownlist"                   
					           data-value-primitive="true"
					           data-text-field="text"
					           data-value-field="value"
					           data-bind="value: sorter,
					                      source: sortList,                              
					                      events: { change: sorterChanges }" />

						<input data-role="datepicker"
							   data-format="dd-MM-yyyy"
					           data-bind="value: sdate,
					                      events: { change: dateChanges }"
					           placeholder="ចាប់ពី" >

					    <input data-role="datepicker"
					    	   data-format="dd-MM-yyyy"
					           data-bind="value: edate,
					                      events: { change: dateChanges }"
					           placeholder="ដល់" >
					    
					    <button type="button" data-role="button" data-bind="click: searchTransaction"><i class="icon-search"></i></button>
					</div>

					<table class="table table-bordered table-striped table-white">
						<thead>
							<tr>
								<th>កាលបរិច្ឆេទ</th>
								<th>ប្រភេទប្រតិបត្តិការ</th>								
								<th>លេខយោង</th>
								<th>ទឹកប្រាក់</th>
								<th>ស្ថានភាព</th>
								<th>ធ្វើការ</th>
							</tr>
						</thead>	            		
	            		<tbody data-role="listview"
	            				data-auto-bind="false"	            					            					            					            			
				                data-template="transaction-wCustomer-center-tmpl"
				                data-bind="source: transactionDS">
				        </tbody>
	            	</table>

	            	<div id="pager" class="k-pager-wrap"
				    	 data-auto-bind="false"
			             data-role="pager" data-bind="source: transactionDS"></div>	            	
				</div>
			</div>			
		</div>
	</div>		
</script>
<script id="customer-list-wCustomer-center-tmpl" type="text/x-kendo-tmpl">
	<tr data-bind="click: selectedRow">
		<td>
			<div class="media-body">
				<span class="strong">
					#=wnumber# #=fullname#				
				</span>
			</div>
		</td>
	</tr>
</script>
<script id="transaction-wCustomer-center-tmpl" type="text/x-kendo-tmpl">
    <tr>    	  	
    	<td>#=kendo.toString(new Date(issued_date), "dd-MM-yyyy")#</td>
    	<td>
        	#if(type==="eInvoice"){#								
				វិក្កយបត្រអគ្គីសនី
			#}else if(type==="wInvoice"){#
				វិក្កយបត្រទឹក
			#}else if(type==="Receipt"){#
        		បង្កាន់ដៃលក់ជាសាច់ប្រាក់	       	        		
			#}else if(type==="SO"){#
        		បញ្ជាលក់
        	#}else if(type==="Estimate"){#        		
        		សម្រង់តម្លៃ
        	#}else if(type==="GDN"){#        		
        		លិខិតដឹកជញ្ជូន
        	#}else if(type==="Notice"){#
        		លិខិតរំលឹក
        	#}else if(type==="Payment"){#
        		បង់ប្រាក់
        	#}else if(type==="Deposit"){#
        		ប្រាក់កក់
        	#}else if(type==="edeposit"){#
        		ប្រាក់កក់អគ្គីសនី
        	#}else if(type==="wdeposit"){#
        		ប្រាក់កក់ទឹកស្អាត
        	#}else{#
        		វិក្កយបត្រ
        	#}#
        </td>
        <td>
        	#if(type==="Invoice"){#								
				<a href="\#/invoice/#=id#"><i></i> #=number#</a>	
			#}else if(type==="Receipt"){#
        		<a href="\#/receipt/#=id#"><i></i> #=number#</a>        	        		
			#}else if(type==="SO"){#
        		<a href="\#/so/#=id#"><i></i> #=number#</a>
        	#}else if(type==="Estimate"){#        		
        		<a href="\#/estimate/#=id#"><i></i> #=number#</a>
        	#}else if(type==="GDN"){#        		
        		<a href="\#/gdn/#=id#"><i></i> #=number#</a>
        	#}else if(type==="Notice"){#
        		#=number#
        	#}else if(type==="Payment"){#

        	#}else if(type==="wInvoice"){#        		
        		<a href="\#/wInvoice_print/#=id#"><i></i> #=number#</a>
        	#}else if(type==="edeposit"){#        		
        		<a href="\#/eDeposit/#=id#"><i></i> #=number#</a>
        	#}else if(type==="wdeposit"){#        		
        		<a href="\#/wDeposit/#=id#"><i></i> #=number#</a>
        	#}else{#
        		#=number#
        	#}#
        </td>
    	<td class="right">#=kendo.toString(amount*rate, locale=="km-KH"?"c0":"c", "c", locale)#</td>
    	<td>        	
        	#if(type==="Invoice" || type==="eInvoice" || type==="wInvoice"){#
        		#if(status==="0" || status==="2") {#
        			# var date = new Date(), dueDate = new Date(due_date).getTime(), toDay = new Date(date).getTime(); #
					#if(dueDate < toDay) {#
						លើសកំណត់ #:Math.floor((toDay - dueDate)/(1000*60*60*24))# ថ្ងៃ
					#} else {#
						#:Math.floor((dueDate - toDay)/(1000*60*60*24))# ថ្ងៃនឹងត្រូវទូទាត់
					#}#
				#} else {#
					ទូទាត់រួច
				#}#
        	#}else if(type==="SO" || type==="GDN"){#
        		#if(status==="0"){#
        			មិនទាន់រៀបចំ
        		#}else{#
        			រៀបចំរូច        			
        		#}#
        	#}else if(type==="Estimate"){#        		
        		#if(status==="0"){#
        			មិនទាន់យល់ព្រម
        		#}else{#
        			យល់ព្រម        			
        		#}#
        	#}#			
		</td>    	
    	<td align="center">
			#if(type==="Invoice"){#
				#if(status==="0" || status==="2"){#					
					<a href="\#/cashier/#=id#"><i></i> ទទួលប្រាក់</a>					
				#}#
			#}else if(type==="wInvoice"){#
        		#if(status==="0" || status==="2"){#
        			<a href="\#/cashier/#=id#"><i></i> ទទួលប្រាក់</a>
        		#}#
        	#}else if(type==="Notice"){#
        		#if(status==="0" || status==="2"){#
        			<a href="\#/cashier/#=id#"><i></i> ទទួលប្រាក់</a>
        		#}#
			#}else if(type==="SO"){#
        		#if(status==="0"){#
        			
        		#}#
        	#}else if(type==="Estimate"){#        		
        		#if(status==="0"){#
        			
        		#}#
        	#}else if(type==="GDN"){#        		
        		#if(status==="0"){#
        			
        		#}#
        	#}#
		</td>     	
    </tr>
</script>
<script id="wMeter-wCustomer-center-tmpl" type="text/x-kendo-template">		
	<tr>
		<td>
			<a href="\#/wDeposit/#=deposit_id#">#=deposit#</a>
			<br>
			#if(deposit_amount>0){#
				<span class="btn btn-danger btn-icon glyphicons circle_minus" data-bind="click: goToWaterDepositWitdraw"><i></i> #=kendo.toString(deposit_amount, locale=="km-KH"?"c0":"c", locale)#</span>				
			#}else{#
				<span class="btn btn-primary btn-icon glyphicons circle_plus" data-bind="click: goToNewWaterDeposit"><i></i> ថែមប្រាក់កក់</span>
			#}#
		</td>
		<td>			
			#if(invoice_id>0){#
				<a href="\#/receipt/#=invoice_id#">#=invoice#</a>
				<br>
				#=kendo.toString(invoice_amount, locale=="km-KH"?"c0":"c", locale)#				
			#}else{#
				<a href="\#/receipt" class="btn btn-inverse btn-icon glyphicons circle_plus"><i></i> បង់សេវា</a>
			#}#		
		</td>				
		<td>
			#if(number!==""){#
				<a href="\#/wMeter/#=id#">#=number#</a>
			#}else{#
				#if(deposit_id>0){#
					<a href="\#/wMeter/#=id#" class="btn btn-success btn-icon glyphicons circle_plus"><i></i> កុងទ័រថ្មី</a>
				#}#
			#}#						
		</td>
		<td>
			#if(number!==""){#
				<a href="\#/wReading_center/#=id#">អំនាន</a>				
			#}#			
		</td>								
	</tr>	
</script>
<script id="wCustomer-center-note-tmpl" type="text/x-kendo-template">
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

<script id="wCustomerOrder" type="text/x-kendo-template">
	<div class="container-960">
		<div class="row-fluid">
			<div class="span12">
				<div id="example" class="k-content">
					<div class="hidden-print">
						<span class="pull-right glyphicons no-js remove_2" 
							onclick="javascript:window.history.back();"><i></i></span>

						<input id="ddlBranch" data-bind="value: branch_id" />						                
						<input id="ddlLocation" data-bind="value: location_id" disabled="disabled" />
						<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button> |
						<button type="button" data-role="button" onclick="javascript:window.print()"><i class="icon-print"></i></button>
					</div>
					
					<br>

					<h3 align="center">រៀបចំលេខរៀងអតិថិជន</h3>
					<p align="center">សំគាល់៖ ដើម្បើររៀបចំលេខរៀងអតិថិជន សូមទាញលេខកូដអតិថិជនទៅកាន់លេខរៀងដែលអ្នកចង់ប្ដូរ​ រួចកត់ត្រាដើម្បីរក្សាទុក។</p>
										
					<br>
				
					<div id="grid"></div>

					<br>

					<div class="hidden-print" align="center">
						<div data-role="notification" id="ntf1" data-width="300" data-height="50"></div>
						<span id="save" class="btn btn-icon btn-primary glyphicons circle_ok" data-bind="click: save"><i></i>កត់ត្រា</span>
					</div>					

				</div>
			</div>
		</div>
	</div>
</script>

<script id="wInstallment" type="text/x-kendo-template">
	<div class="container-960">	
		<div class="row-fluid">		    
			<div class="span12">			
				<div id="example" class="k-content">					

					<!-- Collapsible Widget -->			
					<div class="widget">
					    <div class="widget-head">
					    	<span class="btn btn-primary pull-right" 
									onclick="javascript:window.history.back()">X</span>
					        
					        <h4 class="heading glyphicons dashboard"><i></i>បង់រំលោះ</h4>							        	
					    </div>
					    <div class="widget-body">
						    
			    			<input id="cbbCustomer" name="cbbCustomer" 
			    				   data-role="combobox"
				                   data-placeholder="អតិថិជន..."
				                   data-auto-bind="false"
				                   data-value-primitive="true"
				                   data-filter="search"							                   
				                   data-min-length="3"							                   
				                   data-text-field="fullname"
				                   data-value-field="id"
				                   data-template="wInstallment-contact-combobox-template"
				                   data-bind="value: obj.contact_id,
				                              source: contactDS"
				                   required data-required-msg="ត្រូវការ អតិថិជន"
				                   style="width: 130px;" />						    			

							<br>

							<table class="table table-bordered table-condensed table-white">
								<thead>
									<tr>
										<th>ប្រចាំខែ</th>
										<th>អំនាន</th>								
										<th>បរិមាណប្រើប្រាស់</th>
										<th>ទឹកប្រាក់</th>
										<th>អ្នកអាន</th>
										<th>សំគាល់</th>
										<th></th>
									</tr>
								</thead>	            		
			            		<tbody data-role="listview"
			            				data-auto-bind="false"	            					            					            					            			
						                data-template="wReading-center-tmpl"
						                data-bind="source: dataSource">
						        </tbody>
			            	</table>						   

							<div class="row-fluid">
					          	<!-- Form actions -->
								<div align="center">
									<span id="notification"></span>

									<span id="save" class="btn btn-icon btn-primary glyphicons circle_ok"><i></i>កត់ត្រា</span>
									<span class="btn btn-danger btn-icon glyphicons delete" data-bind="click: delete, visible: isEdit"><i></i>លុប</span>
									<span class="btn btn-icon btn-default glyphicons ban" data-bind="click: cancel"><i></i>បោះបង់</span>
								</div>
								<!-- // Form actions END -->
							</div>

						</div> <!-- End Widget-Body List -->
					</div>
					<!-- // Collapsible Widget END -->				          					                
			    											
				</div> <!-- // End div example-->  
			</div> <!-- // End div span12-->
		</div> <!-- // End div row-fluid-->	
	</div> 	
</script>
<script id="wInstallment-row-template" type="text/x-kendo-template">	
	<tr>		
		<td>#=kendo.toString("month", "MM-yyyy")#</td>
		<td>#=amount#</td>		
		<td>#=balance#</td>			
	</tr>
</script>
<script id="wInstallment-contact-combobox-template" type="text/x-kendo-template">	
	#=wnumber# #=fullname#
</script>

<script id="wDeposit" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="container-960">					
			<div id="example" class="k-content">

				<!-- Collapsible Widget -->			
				<div class="widget">
				    <div class="widget-head">
				    	<span class="btn btn-primary pull-right" 
								onclick="javascript:window.history.back()">X</span>
				        
				        <h4 class="heading glyphicons notes"><i></i>បង្កាន់ដៃប្រាក់កក់</h4>							        	
				    </div>
				    <div class="widget-body">					
						
						<!-- Upper Part -->
						<div class="row-fluid">
							<div class="span4">				
								<table class="table table-borderless table-condensed cart_total">
									<tr>
										<td>អតិថិជន</td>
										<td>
											<input id="cbbCustomer" name="cbbCustomer" 
							    				   data-role="combobox"
								                   data-placeholder="អតិថិជន..."
								                   data-auto-bind="false"
								                   data-value-primitive="true"
								                   data-filter="search"							                   
								                   data-min-length="3"							                   
								                   data-text-field="fullname"
								                   data-value-field="id"
								                   data-template='receipt-contact-combobox-template'
								                   data-bind="value: obj.contact_id,
								                              source: contactDS,
								                              events:{change:contactChanges}"
								                   required data-required-msg="ត្រូវការ អតិថិជន"
								                   style="width: 100%" />
										</td>
									</tr>					          
									<tr data-bind="visible: isEdit">				
										<td>លេខបង្កាន់ដៃ</td>
										<td><input class="k-textbox" data-bind="value: obj.number" style="width:100%;" readonly /></td>
									</tr>																	           
									<tr>
										<td colspan="2">
											អាសយដ្ឋាន
											<br>
											<textarea id="address" cols="0" rows="2" class="k-textbox" style="width: 100%;" data-bind="value: obj.bill_to"></textarea>
										</td>
									</tr>
								</table>
							</div>

						    <div class="span4">
						    	<div align="center">
						    		<span class="glyphicons standard circle_ok" data-bind="visible: paid"><i></i> ទូទាត់រួច</span>				    	
						    	</div>
						    </div>

							<div class="span4">
								<table class="table table-borderless table-condensed cart_total">
									<tr>
										<td>កាលបរិច្ឆេទ</td>
										<td>
											<input id="issuedDate" name="issuedDate" data-role="datepicker" 
													data-bind="value: obj.issued_date" data-format="dd-MM-yyyy" 
													required data-required-msg="ត្រូវការ កាលបរិច្ឆេទ" />											
										</td>
									</tr>
									<tr>
						                <td>លេខកូដសែក</td>						              	
						              	<td><input class="k-textbox" data-bind="value: obj.check_no" style="width:100%;" /></td>
						            </tr>
									<tr>
										<td>វីធីបង់ប្រាក់</td>
										<td>
											<input id="ddlPaymentMethod" name="ddlPaymentMethod"
													data-bind="value: obj.payment_method_id"
													required data-required-msg="ត្រូវការ វីធីបង់ប្រាក់"  
													style="width: 100%" />											
										</td>
									</tr>									
									<tr>
										<td>គណនីប្រាក់កក់​​​</td>
										<td>
											<input id="ddlDepositAccount" name="ddlDepositAccount"
													data-bind="value: obj.deposit_account_id"
													required data-required-msg="ត្រូវការ គណនីប្រាក់កក់​​​"  
													style="width: 100%" />											
										</td>
									</tr>
									<tr>
										<td>គណនីសាច់ប្រាក់</td>
										<td>
											<input id="ddlCashAccount" name="ddlCashAccount"
													data-bind="value: obj.cash_account_id"
													required data-required-msg="ត្រូវការ គណនីសាច់ប្រាក់"  
													style="width: 100%" />										
										</td>
									</tr>						            								
								</table>           		          	
						    </div>
						</div>

						<br>

						<!-- Item List -->
						<table class="table table-bordered table-vertical-center table-pricing table-pricing-2">
							<thead>
								<tr>									
									<th class="center">ទំនិញ</th>								
									<th class="center">ពណ៌នា</th>									
									<th class="center">ទឹកប្រាក់</th>									
								</tr>
							</thead>	            		
		            		<tbody id="lvInvoice" data-role="listview"
		            				data-auto-bind="false"	            					            					            					            			
					                data-template="wDeposit-row-template"
					                data-bind="source: lineDS">
					        </tbody>
		            	</table>						
						
						<!-- Lower Part -->
						<div class="row-fluid">							
							សំគាល់:
							<br>
							<textarea id="memo" cols="0" rows="2" class="k-textbox" style="width:49%;" data-bind="value: obj.memo" placeholder="សំគាល់ 1 (សំរាប់អតិថិជន)"></textarea>
							<textarea id="memo2" cols="0" rows="2" class="k-textbox" style="width:49%;" data-bind="value: obj.memo2" placeholder="សំគាល់ 2 (សំរាប់ផ្ទៃក្នុង)"></textarea>																									
						</div>

						<br>						

						<!-- Buttons -->
						<div class="row-fluid">
				          	<!-- Form actions -->
							<div align="center">
								<span id="notification"></span>

								<span id="save" class="btn btn-icon btn-primary glyphicons circle_ok"><i></i>កត់ត្រា</span>
								<span class="btn btn-danger btn-icon glyphicons delete" data-bind="click: delete, visible: isEdit"><i></i>លុប</span>
								<span class="btn btn-icon btn-default glyphicons ban" data-bind="click: cancel"><i></i>បោះបង់</span>
								<span class="btn btn-primary btn-icon glyphicons print" data-bind="click: linkPrint, visible: isEdit"><i></i> បោះពុម្ព</span>
							</div>
							<!-- // Form actions END -->
						</div>						

					</div> <!-- End Widget-Body List -->
				</div>
				<!-- // Collapsible Widget END -->

			</div>							
		</div>
	</div>
</script>
<script id="wDeposit-row-template" type="text/x-kendo-tmpl">		
	<tr>				
		<td>
			<input id="ccbItem" name="ccbItem"
				   data-role="combobox"
				   data-auto-bind="false"                   
                   data-value-primitive="true"				   
                   data-text-field="name"
                   data-value-field="id"
                   data-bind="value: item_id, source: itemList, events: {change : itemChanges}"
                   required data-required-msg="ត្រូវការ ទំនិញ" style="width: 100%" />			
		</td>		
		<td>
			<input id="description" name="description" type="text"
					class="k-textbox" 
					data-bind="value: description"					 
					required data-required-msg="ត្រូវការ ពណ៌នា"
					style="width: 100%; margin-bottom: 0;" />
		</td>			
		<td class="right">
			<input id="amount" name="amount" 
					data-role="numerictextbox" 
					data-format="c" data-culture=#:locale#
					data-bind="value: amount, events: {change : changes}" 
					required data-required-msg="ត្រូវការ ទឹកប្រាក់កក់" style="width: 100%;" />						
		</td>				
    </tr>   
</script>
<script id="wDeposit-contact-combobox-template" type="text/x-kendo-template">	
	#=number# #=fullname#
</script>

<script id="wDepositWitdraw" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="container-960">					
			<div id="example" class="k-content">

				<!-- Collapsible Widget -->			
				<div class="widget">
				    <div class="widget-head">
				    	<span class="btn btn-primary pull-right" 
								onclick="javascript:window.history.back()">X</span>
				        
				        <h4 class="heading glyphicons notes"><i></i>បង្កាន់ដៃដកប្រាក់កក់</h4>							        	
				    </div>
				    <div class="widget-body">					
						
						<!-- Upper Part -->
						<div class="row-fluid">
							<div class="span4">				
								<table class="table table-borderless table-condensed cart_total">
									<tr>
										<td>អតិថិជន</td>
										<td>
											<input id="cbbCustomer" name="cbbCustomer" 
							    				   data-role="combobox"
								                   data-placeholder="អតិថិជន..."
								                   data-auto-bind="false"
								                   data-value-primitive="true"
								                   data-filter="search"							                   
								                   data-min-length="3"							                   
								                   data-text-field="fullname"
								                   data-value-field="id"
								                   data-template='receipt-contact-combobox-template'
								                   data-bind="value: obj.contact_id,
								                              source: contactDS,
								                              events:{change:contactChanges}"
								                   required data-required-msg="ត្រូវការ អតិថិជន"
								                   style="width: 100%" />
										</td>
									</tr>					          
									<tr data-bind="visible: isEdit">				
										<td>លេខបង្កាន់ដៃ</td>
										<td><input class="k-textbox" data-bind="value: obj.number" style="width:100%;" readonly /></td>
									</tr>																	           
									<tr>
										<td colspan="2">
											អាសយដ្ឋាន
											<br>
											<textarea id="address" cols="0" rows="2" class="k-textbox" style="width: 100%;" data-bind="value: obj.bill_to"></textarea>
										</td>
									</tr>
								</table>
							</div>

						    <div class="span4">
						    	<div align="center">
						    		<span class="glyphicons standard circle_ok" data-bind="visible: paid"><i></i> ទូទាត់រួច</span>				    	
						    	</div>
						    </div>

							<div class="span4">
								<table class="table table-borderless table-condensed cart_total">
									<tr>
										<td>កាលបរិច្ឆេទ</td>
										<td>
											<input id="issuedDate" name="issuedDate" data-role="datepicker" 
													data-bind="value: obj.issued_date" data-format="dd-MM-yyyy" 
													required data-required-msg="ត្រូវការ កាលបរិច្ឆេទ" />											
										</td>
									</tr>																									
									<tr>
										<td>គណនីប្រាក់កក់​​​</td>
										<td>
											<input id="ddlDepositAccount" name="ddlDepositAccount"
													data-bind="value: obj.deposit_account_id"
													required data-required-msg="ត្រូវការ គណនីប្រាក់កក់​​​"  
													style="width: 100%" />											
										</td>
									</tr>
									<tr>
										<td>គណនីសាច់ប្រាក់</td>
										<td>
											<input id="ddlCashAccount" name="ddlCashAccount"
													data-bind="value: obj.cash_account_id"
													required data-required-msg="ត្រូវការ គណនីសាច់ប្រាក់"  
													style="width: 100%" />										
										</td>
									</tr>						            								
								</table>           		          	
						    </div>
						</div>

						<br>

						<div class="row-fluid">
	
							<!-- Column -->
							<div class="span6">
							
								<!-- Widget -->
								<div class="widget widget-3">
								
									<!-- Widget heading -->
									<div class="widget-head">
										<h4 class="heading"><span class="glyphicons coins"><i></i></span>ចំនួនប្រាក់កក់ត្រូវដក</h4>
									</div>
									<!-- // Widget heading END -->
									
									<div class="widget-body large">
										<span data-bind="text: total"></span>
									</div>
									
									<!-- Widget footer -->
									<div class="widget-footer align-right">
										
									</div>
									<!-- // Widget footer END -->
									
								</div>
								<!-- // Widget END -->
								
							</div>
							<!-- // Column END -->
							
							<!-- Column -->
							<div class="span6">
							
								<!-- Widget -->
								<div class="widget widget-3">
								
									<!-- Widget heading -->
									<div class="widget-head">
										<h4 class="heading"><span class="glyphicons pencil"><i></i></span>សំគាល់</h4>
									</div>
									<!-- // Widget heading END -->
									
									<div class="widget-body">
										<textarea id="memo" cols="0" rows="2" class="k-textbox" style="width:95%;" data-bind="value: obj.memo" placeholder="សំគាល់ 1 (សំរាប់អតិថិជន)"></textarea>
										<textarea id="memo2" cols="0" rows="2" class="k-textbox" style="width:95%;" data-bind="value: obj.memo2" placeholder="សំគាល់ 2 (សំរាប់ផ្ទៃក្នុង)"></textarea>	
									</div>
									
								</div>
								<!-- // Widget END -->
								
							</div>
							<!-- // Column -->							
							
						</div>						

						<br>						

						<!-- Buttons -->
						<div class="row-fluid">
				          	<!-- Form actions -->
							<div align="center">
								<span id="notification"></span>

								<span id="save" class="btn btn-icon btn-primary glyphicons circle_ok"><i></i>កត់ត្រា</span>
								<span class="btn btn-danger btn-icon glyphicons delete" data-bind="click: delete, visible: isEdit"><i></i>លុប</span>
								<span class="btn btn-icon btn-default glyphicons ban" data-bind="click: cancel"><i></i>បោះបង់</span>
								<span class="btn btn-primary btn-icon glyphicons print" data-bind="click: linkPrint, visible: isEdit"><i></i> បោះពុម្ព</span>
							</div>
							<!-- // Form actions END -->
						</div>						

					</div> <!-- End Widget-Body List -->
				</div>
				<!-- // Collapsible Widget END -->

			</div>							
		</div>
	</div>
</script>
<script id="wDepositWitdraw-contact-combobox-template" type="text/x-kendo-template">	
	#=number# #=fullname#
</script>

<script id="wMeter" type="text/x-kendo-template">
	<div class="container-960">	
		<div class="row-fluid">		    
			<div class="span12">			
				<div id="example" class="k-content">					

					<!-- Collapsible Widget -->			
					<div class="widget">
					    <div class="widget-head">
					    	<span class="btn btn-primary pull-right" 
									onclick="javascript:window.history.back()">X</span>
					        
					        <h4 class="heading glyphicons dashboard"><i></i>នាឡិកាស្ទង់</h4>							        	
					    </div>
					    <div class="widget-body">

						    <div class="row-fluid">
						    		<div class="span6">
						    			<h5 class="heading-arrow" style="font-size: small;">នាឡិកាស្ទង់លេខ <span data-bind="text: obj.number"></span> ត្រូវបានភ្ជាប់អោយទៅអតិថិជនខាងក្រោម៖</h5>
						    			
						    			<input id="cbbCustomer" name="cbbCustomer" 
						    				   data-role="combobox"
							                   data-placeholder="អតិថិជន..."
							                   data-auto-bind="false"
							                   data-value-primitive="true"
							                   data-filter="search"							                   
							                   data-min-length="3"							                   
							                   data-text-field="fullname"
							                   data-value-field="id"
							                   data-template="wMeter-contact-combobox-template"
							                   data-bind="value: obj.contact_id,
							                              source: contactDS, events:{change: contactChanges}"
							                   required data-required-msg="ត្រូវការ អតិថិជន"
							                   style="width: 100%" />
						    			
						    			<br><br>

						    			<div class="row-fluid">
						    				<div class="span6">
								    			<label>ប្រាក់កក់ </label>
												<a data-bind="attr:{ href: deposit_link }"><span data-bind="text: obj.deposit[0].number"></span></a>
								    			|
								    			<span data-bind="text: deposit_amount"></span>
											</div>
											<div class="span6">
								    			<label>សេវាភ្ជាប់បណ្ដាញថ្មី </label>
								    			<a data-bind="attr:{ href: invoice_link }"><span data-bind="text: obj.invoice[0].number"></span></a>
								    			|
								    			<span data-bind="text: invoice_amount"></span>
											</div>
										</div>

										<br>

						    			<div class="row-fluid">
						    				<div class="span6">
								    			<label for="latitute">រយះទទឹង </label>
												<div class="input-prepend">
													<span class="add-on glyphicons direction"><i></i></span>
													<input type="text" class="input-large span12" data-bind="value: obj.latitute, events:{change: loadMap}" placeholder="012345.67897">
												</div>
											</div>
											<div class="span6">
								    			<label for="longtitute">រយះបណ្ដោយ </label>
								    			<div class="input-prepend">
													<span class="add-on glyphicons google_maps"><i></i></span>
													<input type="text" class="input-large span12" data-bind="value: obj.longtitute, events:{change: loadMap}" placeholder="012345.67897">
												</div>
											</div>
										</div>

										<!-- Group -->
										<div class="control-group">
											<label class="control-label">សំគាល់</label>
											<div class="controls">
												<input class="k-textbox" 
						                  				data-bind="value: obj.memo"
						                  				style="width: 100%;" />
											</div>
										</div>
										<!-- // Group END -->
										
										<div id="map" style="width: 450px; height: 250px;"></div>
						    		</div>

							    	<!-- Right Span -->
							    	<div class="span6">

							    		<!-- Group -->
										<div class="control-group">
											<label class="control-label">ប្រភេទនាឡិកាស្ទង់ <span style="color:red">*</span></label>
											<div class="controls">
												<input id="meterType" name="meterType"
													   data-role="dropdownlist"
						                  			   data-option-label="(--- ជ្រើសរើស ---)"				                  			   
									                   data-auto-bind="false"
									                   data-value-primitive="true"
									                   data-text-field="name"
									                   data-value-field="id"
									                   data-bind="value: obj.item_id, source: itemDS"
									                   required data-required-msg="ត្រូវការ ប្រភេទនាឡិកាស្ទង់"
									                   style="width: 100%;" />
											</div>
										</div>
										<!-- // Group END -->										

										<!-- Group -->
										<div class="control-group">
											<label class="control-label">លេខកូដកុងទ័រ <span style="color:red">*</span></label>
											<div class="controls">
												<input id="meterNo" name="meterNo" class="k-textbox" 
						                  				data-bind="value: obj.number, events:{change:checkExistingNumber}" 
						                  				required data-required-msg="ត្រូវការ លេខកូដកុងទ័រ"
						                  				style="width: 100%;" />
						                  		<span data-bind="visible: isDuplicateNumber" style="color: red;">លេខកូដនេះបានប្រើប្រាស់រូចហើយ</span>
											</div>
										</div>
										<!-- // Group END -->

										<!-- Group -->
										<div class="control-group">
											<label class="control-label">លេខអំនានចាប់ផ្ដើម <span style="color:red">*</span></label>
											<div class="controls">
												<input id="txtStarupReading" name="txtStarupReading" class="k-textbox" 
						                  				data-bind="value: obj.startup_reading" 
						                  				required data-required-msg="ត្រូវការ លេខអំនានចាប់ផ្ដើម"
						                  				style="width: 100%;" />						                  		
											</div>
										</div>
										<!-- // Group END -->

										<!-- Group -->
										<div class="control-group">
											<label class="control-label">ចំនួនខ្ទង់នាឡិកា <span style="color:red">*</span></label>
											<div class="controls">
												<input id="maxNo" name="maxNo" 
						                  				data-role="numerictextbox" 
						                  				data-bind="value: obj.max_number" 
						                  				data-format="n0" min="0" 
						                  				placeholder="ឧ.10,000/100,000" 
						                  				required data-required-msg="ត្រូវការ ចំនួនខ្ទង់នាឡិកា"
						                  				style="width: 100%;" />
											</div>
										</div>
										<!-- // Group END -->

										<!-- Group -->
										<div class="control-group">
											<label class="control-label">ស្ថានភាព <span style="color:red">*</span></label>
											<div class="controls">
												<input id="meterStatus" name="meterStatus"
						                  				data-role="dropdownlist"
						                  				data-value-primitive="true"													
						                  				data-text-field="name" 
						                  				data-value-field="id"				                  						                  				
						                  				data-bind="source: statusList, value: obj.status"
						                  				data-option-label="(--- ជ្រើសរើស ---)"
														required data-required-msg="ត្រូវការ ស្ថានភាព"
														style="width: 100%;" />
											</div>
										</div>
										<!-- // Group END -->									
										
										<!-- Group -->
										<div class="control-group">
											<label class="control-label">តំលៃលក់ </label>
											<div class="controls">
												<input data-role="dropdownlist"
						                  			   data-option-label="(--- ជ្រើសរើស ---)"				                  			   
									                   data-auto-bind="false"
									                   data-value-primitive="true"
									                   data-text-field="name"
									                   data-value-field="id"
									                   data-bind="value: obj.tariff_id, source: tariffList"
									                   style="width: 100%;" />
											</div>
										</div>
										<!-- // Group END -->

										<!-- Group -->
										<div class="control-group">
											<label class="control-label">លើកលែង </label>
											<div class="controls">
												<input data-role="dropdownlist"
						                  			   data-option-label="(--- ជ្រើសរើស ---)"			                  			   
									                   data-auto-bind="false"
									                   data-value-primitive="true"
									                   data-text-field="name"
									                   data-value-field="id"
									                   data-bind="value: obj.exemption_id, source: exemptionList"
									                   style="width: 100%;" />
											</div>
										</div>
										<!-- // Group END -->

										<!-- Group -->
										<div class="control-group">
											<label class="control-label">ថ្លៃថែទាំ </label>
											<div class="controls">
												<input data-role="dropdownlist"
						                  			   data-option-label="(--- ជ្រើសរើស ---)"			                  			   
									                   data-auto-bind="false"
									                   data-value-primitive="true"
									                   data-text-field="name"
									                   data-value-field="id"
									                   data-bind="value: obj.maintenance_id, source: maintenanceList"
									                   style="width: 100%;" />
											</div>
										</div>
										<!-- // Group END -->

									</div>
									<!-- End Right Span -->

							</div>

							<br>

							<div class="row-fluid">
					          	<!-- Form actions -->
								<div align="center">
									<span id="notification"></span>

									<span id="save" class="btn btn-icon btn-primary glyphicons circle_ok"><i></i>កត់ត្រា</span>
									<span class="btn btn-danger btn-icon glyphicons delete" data-bind="click: delete, visible: isEdit"><i></i>លុប</span>
									<span class="btn btn-icon btn-default glyphicons ban" data-bind="click: cancel"><i></i>បោះបង់</span>
								</div>
								<!-- // Form actions END -->
							</div>

						</div> <!-- End Widget-Body List -->
					</div>
					<!-- // Collapsible Widget END -->				          					                
			    											
				</div> <!-- // End div example-->  
			</div> <!-- // End div span12-->
		</div> <!-- // End div row-fluid-->	
	</div> 	
</script>
<script id="wMeter-row-template" type="text/x-kendo-template">	
	<tr>		
		<td>#=number#</td>
		<td>#=item_name#</td>		
		<td>			
			<div>#=tariffs.name!==undefined?tariffs.name:""#</div>
			<div>#=exemptions.name!==undefined?exemptions.name:""#</div>
			<div>#=maintenances.name!==undefined?maintenances.name:""#</div>
		</td>
		<td>
			#if(reactive_of>0){#
				REACTIVE
			#}else if(backup_of>0){#
				BACKUP
			#}else{#
				
			#}#
		</td>
		<td>#:status==1 ? "ប្រើប្រាស់" : "ឈប់ប្រើ"#</td>
		<td align="center">            
			<span class="glyphicons no-js delete" data-bind="click: delete"><i></i></span>
			<span class="glyphicons no-js edit" data-bind="click: edit"><i></i></span>						
		</td>		
	</tr>
</script>
<script id="wMeter-contact-combobox-template" type="text/x-kendo-template">	
	#=wnumber# #=fullname#
</script>

<script id="wReadingCenter" type="text/x-kendo-template">
	<div class="container-fluid">
		<div class="row-fluid">    
			<div class="span12">				
				
				<!-- Collapsible Widget -->			
				<div class="widget">
				    <div class="widget-head">
				    	<span class="btn btn-primary pull-right" 
								onclick="javascript:window.history.back()">X</span>
				        
				        <h4 class="heading glyphicons dashboard"><i></i>អំនានកុងទ័រ</h4>							        	
				    </div>
				    <div class="widget-body">					
				
			            <div class="hidden-print">	            							            	
			            	<input data-role="combobox"
				                   data-placeholder="លេខកូដនាឡិកាស្ទង់..."
				                   data-auto-bind="false"
				                   data-value-primitive="true"
				                   data-filter="contains"							                   
				                   data-min-length="3"							                   
				                   data-text-field="number"
				                   data-value-field="id"
				                   data-bind="value: meter_id,
				                              source: meterDS"
				                   style="width: 300px;" />

				            <button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button> |
							<button type="button" data-role="button" onclick="javascript:window.print()"><i class="icon-print"></i></button>
			            </div>

			            <br>

			            <table class="table table-bordered table-condensed table-white">
							<thead>
								<tr>
									<th>ប្រចាំខែ</th>
									<th>អំនាន</th>								
									<th>បរិមាណប្រើប្រាស់</th>
									<th>ទឹកប្រាក់</th>
									<th>អ្នកអាន</th>
									<th>សំគាល់</th>
									<th></th>
								</tr>
							</thead>	            		
		            		<tbody data-role="listview"
		            				data-auto-bind="false"	            					            					            					            			
					                data-template="wReading-center-tmpl"
					                data-bind="source: dataSource">
					        </tbody>
		            	</table>			    

					    <div data-role="pager" 
					    	data-auto-bind="false"
				            data-bind="source: dataSource"></div>

				    </div> <!-- End Widget-Body List -->
				</div>
				<!-- // Collapsible Widget END -->			   		        
				          
			</div> <!-- //End div span12-->		
		</div> <!-- //End div row-fluid-->
	</div>
</script>
<script id="wReading-center-tmpl" type="text/x-kendo-tmpl">
	<tr>					
		<td>#=kendo.toString(new Date(month_of), "MM-yyyy")#</td>		
		<td class="right">#=current#</td>
		<td class="right">#=usage#</td>
		<td></td>		
		<td></td>		
		<td>#=memo#</td>
		<td class="center">
			#var i = banhji.wReadingCenter.dataSource.indexOf(data);#			
			#if(i==0){#														
				<a href="\#/wEdit_reading/#=id#" class="btn-action glyphicons pencil btn-success"><i></i></a>
			#}#			
		</td>	
    </tr>
</script>
<script id="wEditReading" type="text/x-kendo-template">
	<div class="container-960">	
		<div class="row-fluid">		    
			<div class="span12">			
				<div id="example" class="k-content">					

					<!-- Collapsible Widget -->			
					<div class="widget">
					    <div class="widget-head">
					    	<span class="btn btn-primary pull-right" 
									onclick="javascript:window.history.back()">X</span>
					        
					        <h4 class="heading glyphicons dashboard"><i></i>កំណែអំនាន</h4>							        	
					    </div>
					    <div class="widget-body">

					    	<div class="box-generic">					    	

						    	<div class="row-fluid">
									<div class="span2">	
										<!-- Group -->
										<div class="control-group">							
											<label for="registered_date">កាលបរិច្ឆេទ <span style="color:red">*</span></label>
					              			<input id="registered_date" name="registered_date" 
								            		data-role="datepicker"			            		
					            					data-bind="value: obj.month_of" 
					            					data-format="dd-MM-yyyy"
					            					data-parse-formats="yyyy-MM-dd" 
					            					placeholder="ថ្ងែ-ខែ-ឆ្នាំ" required data-required-msg="ត្រូវការ កាលបរិច្ឆេទ" style="width: 100%;" />
										</div>
										<!-- // Group END -->											
									</div>

									<div class="span2">	
										<!-- Group -->
										<div class="control-group">							
											<label for="txtFromDate">ចាប់ពី <span style="color:red">*</span></label>
					              			<input id="txtFromDate" name="txtFromDate" 
								            		data-role="datepicker"			            		
					            					data-bind="value: obj.from_date" 
					            					data-format="dd-MM-yyyy"
					            					data-parse-formats="yyyy-MM-dd" 
					            					placeholder="ថ្ងែ-ខែ-ឆ្នាំ" required data-required-msg="ត្រូវការ ចាប់ពី" style="width: 100%;" />
										</div>
										<!-- // Group END -->											
									</div>

									<div class="span2">	
										<!-- Group -->
										<div class="control-group">							
											<label for="txtToDate">ដល់ <span style="color:red">*</span></label>
					              			<input id="txtToDate" name="txtToDate" 
								            		data-role="datepicker"			            		
					            					data-bind="value: obj.to_date" 
					            					data-format="dd-MM-yyyy"
					            					data-parse-formats="yyyy-MM-dd" 
					            					placeholder="ថ្ងែ-ខែ-ឆ្នាំ" required data-required-msg="ត្រូវការ កាលបរិច្ឆេទ" style="width: 100%;" />
										</div>
										<!-- // Group END -->											
									</div>

									<div class="span2">	
										<!-- Group -->
										<div class="control-group">							
											<label for="strPrevious">អំនានចាស់</label>
					              			<span id="strPrevious" name="strPrevious" data-bind="text: obj.previous"></span>
										</div>
										<!-- // Group END -->											
									</div>

									<div class="span2">	
										<!-- Group -->
										<div class="control-group">							
											<label for="txtCurrent">អំនានថ្មី <span style="color:red">*</span></label>
					              			<input id="txtCurrent" name="txtCurrent" 
					              				   data-role="numerictextbox"
								                   data-format="n0"								                   
								                   data-bind="value: obj.current, events:{change: readingChanges}"
								                   required data-required-msg="ត្រូវការ អំនានថ្មី" style="width: 100%;">
										</div>
										<!-- // Group END -->											
									</div>

									<div class="span2">	
										<!-- Group -->
										<div class="control-group">							
											<label for="strUsage">ចំនួនប្រើប្រាស់</label>
					              			<span id="strUsage" name="strUsage" data-bind="text: obj.usage"></span>
										</div>
										<!-- // Group END -->											
									</div>
								</div>

								<div class="row-fluid">
									<div class="span4">	
										<!-- Group -->
										<div class="control-group">							
											<label for="ddlReader">អ្នកអាន <span style="color:red">*</span></label>
					              			<input id="ddlReader" name="ddlReader"
					              				   data-role="dropdownlist"
								                   data-auto-bind="false"
								                   data-value-primitive="true"
								                   data-text-field="name"
								                   data-value-field="id"
								                   data-bind="value: obj.read_by, source: readerDS"
								                   data-option-label="(--- ជ្រើសរើស ---)"								                   						             
					            				   required data-required-msg="ត្រូវការ អ្នកអាន" style="width: 100%;" />
										</div>
										<!-- // Group END -->											
									</div>

									<div class="span8">	
										<!-- Group -->
										<div class="control-group">							
											<label for="txtMemo">សំគាល់ </label>
					              			<input id="txtMemo" class="k-textbox" data-bind="value: obj.memo" style="width: 100%;" />
										</div>
										<!-- // Group END -->											
									</div>
								</div>

					    	</div>

					    	<div class="well" data-bind="visible: hasInvoice">
								<table class="table table-invoice">
									<tbody>
										<tr>
											<td>លេខវិក្កយបត្រ</td>
											<td class="right">
												<input id="txtNumber" name="txtNumber"
												   type="text" class="k-textbox" 					              				  					                   
								                   data-bind="value: invoice.number, enabled: hasInvoice"
								                   required data-required-msg="ត្រូវការ លេខវិក្កយបត្រ" style="width: 170px;" />
											</td>
											<td width="30%"></td>
											<td>ថ្ងៃចេញវិក្កយបត្រ</td>
											<td class="right">												
												<input id="txtIssuedDate" name="txtIssuedDate" 
								            		data-role="datepicker"			            		
					            					data-bind="value: invoice.issued_date, enabled: hasInvoice" 
					            					data-format="dd-MM-yyyy"
					            					data-parse-formats="yyyy-MM-dd" 
					            					placeholder="ថ្ងែ-ខែ-ឆ្នាំ" 
					            					required data-required-msg="ត្រូវការ ថ្ងៃចេញវិក្កយបត្រ" />
											</td>											
										</tr>
										<tr>
											<td>ប្រចាំខែ</td>
											<td class="right">												
												<input id="txtMonthOf" name="txtMonthOf" 
								            		data-role="datepicker"			            		
					            					data-bind="value: invoice.month_of, enabled: hasInvoice" 
					            					data-format="MM-yyyy"
					            					data-parse-formats="yyyy-MM-dd" 
					            					placeholder="ថ្ងែ-ខែ-ឆ្នាំ" 
					            					required data-required-msg="ត្រូវការ ប្រចាំខែ" />
											</td>
											<td width="30%"></td>
											<td>ថ្ងៃបង់ប្រាក់</td>
											<td class="right">												
												<input id="txtPaymentDate" name="txtPaymentDate" 
								            		data-role="datepicker"			            		
					            					data-bind="value: invoice.payment_date, enabled: hasInvoice" 
					            					data-format="dd-MM-yyyy"
					            					data-parse-formats="yyyy-MM-dd" 
					            					placeholder="ថ្ងែ-ខែ-ឆ្នាំ" 
					            					required data-required-msg="ត្រូវការ ថ្ងៃបង់ប្រាក់" />
											</td>											
										</tr>
										<tr>
											<td></td>
											<td></td>
											<td width="30%"></td>
											<td>ថ្ងៃផុតកំណត់</td>
											<td class="right">												
												<input id="txtDueDate" name="txtDueDate" 
								            		data-role="datepicker"			            		
					            					data-bind="value: invoice.due_date, enabled: hasInvoice" 
					            					data-format="dd-MM-yyyy"
					            					data-parse-formats="yyyy-MM-dd" 
					            					placeholder="ថ្ងែ-ខែ-ឆ្នាំ" 
					            					required data-required-msg="ត្រូវការ ថ្ងៃផុតកំណត់" />
											</td>
										</tr>										
									</tbody>
								</table>

								<table class="table table-bordered table-condensed table-white">
									<thead>
										<tr>
											<th>បរិយាយ</th>
											<th>ចំនួន</th>								
											<th>តំលៃ</th>
											<th>ទឹកប្រាក់</th>											
										</tr>
									</thead>	            		
				            		<tbody data-role="listview"
				            				data-auto-bind="false"	            					            					            					            			
							                data-template="wInvoice-line-wEdit-reading-center-tmpl"
							                data-bind="source: invoiceLineDS">
							        </tbody>					        		
				            	</table>

							</div>

							<br>

							<div class="row-fluid">
					          	<!-- Form actions -->
								<div align="center">
									<span id="notification"></span>

									<span id="save" class="btn btn-icon btn-primary glyphicons circle_ok"><i></i>កត់ត្រា</span>
									<span class="btn btn-danger btn-icon glyphicons delete" data-bind="click: delete, visible: isEdit"><i></i>លុប</span>
									<span class="btn btn-icon btn-default glyphicons ban" data-bind="click: cancel"><i></i>បោះបង់</span>
								</div>
								<!-- // Form actions END -->
							</div>

						</div> <!-- End Widget-Body List -->
					</div>
					<!-- // Collapsible Widget END -->				          					                
			    											
				</div> <!-- // End div example-->  
			</div> <!-- // End div span12-->
		</div> <!-- // End div row-fluid-->	
	</div> 	
</script>
<script id="wInvoice-line-wEdit-reading-center-tmpl" type="text/x-kendo-tmpl">
	<tr>					
		<td>#=description#</td>				
		<td class="right">
			#if(type=="tariff"){#
				#=unit#
			#}#
		</td>
		<td class="right">
			#if(type=="tariff"){#
				#=kendo.toString(price, "c0", locale)#
			#}#
		</td>				
		<td class="right">
			#if(type=="tariff"){#
				#=kendo.toString(amount, "c0", locale)#
			#}#
		</td>			
    </tr>
</script>

<script id="wReading" type="text/x-kendo-template">
	<div class="container-fluid">
		<div class="row-fluid">    
			<div class="span12">
				<div id="example" class="k-content">
					<span class="pull-right glyphicons no-js remove_2" 
						onclick="javascript:window.history.back()"><i></i></span>

					<h3>បញ្ចូលអំនានថ្មី</h3>					
					
		            <div class="box-generic">
		            	<input data-role="datepicker" 
		            			data-bind="value: monthOfSearch" 
		            			data-start="year" data-depth="year" 
		            			data-format="MM-yyyy" placeHolder="ប្រចាំខែ" />						
										
						<input id="ddlBranch" data-bind="value: branch_id" />						                
			            <input id="ddlLocation" data-bind="value: location_id" disabled="disabled" />
		            	|						            	
		            	<input data-role="combobox"
			                   data-placeholder="លេខកូដនាឡិកាស្ទង់..."
			                   data-auto-bind="false"
			                   data-value-primitive="true"
			                   data-filter="contains"							                   
			                   data-min-length="3"							                   
			                   data-text-field="number"
			                   data-value-field="id"
			                   data-bind="value: meter_id,
			                              source: meterDS" />
		          		
		          		<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button> 		          								          		
		            </div>						        

			        <div align="center">
			        	<h3 data-bind="text: strMonthOf"</h3>
			        	<h4 data-bind="text: strTransformer"></h4>
			        </div>
			        
			        <div class="demo-section">			        
					    <table class="table table-bordered table-striped table-white">
					        <thead>
					            <tr>
					                <th>អតិថិជន</th>					                						                
					                <th>កុងទ័រ</th>					                
					                <th>ជុំថ្មី</th>
					                <th>លេខចាស់</th>
					                <th>លេខថ្មី</th>					                
					                <th class="right">សរុប</th>
					            </tr>
					        </thead>
					        <tbody data-role="listview"
					        		data-auto-bind="false"					        		 
					        		data-template="wReading-row-template" 
					        		data-bind="source: dataSource"></tbody>
					        <tfoot data-template="wReading-footer-template" 
					        		data-bind="source: this"></tfoot>						        
					    </table>

					    <div id="pager" class="k-pager-wrap"
					    	 data-auto-bind="false"
				             data-role="pager" data-bind="source: dataSource"></div>
					    
				    </div>				       
			        
					<br>					

			        <div>
			        	ប្រចាំខែ
			        	<input id="monthOf" name="monthOf" data-role="datepicker" 
				            			data-bind="value: month_of" 
				            			data-start="year" data-depth="year" data-format="MM-yyyy"
				            			required data-required-msg="ត្រូវការ ប្រចាំខែ"
				            			placeholder="ខែ-ឆ្នាំ" />				    
				    	
				    	ថ្ងៃអានចាប់ពី
                        <input type="text" data-role='datepicker' 
                        		id="fromDate" name="fromDate"
                        		data-bind="value: from_date"	            				
                        		data-type="date" data-format="dd-MM-yyyy"
                        		placeholder="ថ្ងៃ-ខែ-ឆ្នាំ"
                        		required data-required-msg="ត្រូវការ ថ្ងៃអានចាប់ពី"  />                        	    				        
			            
			            ដល់
                        <input type="text" data-role='datepicker' 
                        		id ="toDate" name="toDate"
                        		data-bind="value: to_date"	            				 
                        		data-type="date" data-format="dd-MM-yyyy"
                        		placeholder="ថ្ងៃ-ខែ-ឆ្នាំ"
                        		required data-required-msg="ដល់ថ្ងៃណា?" 
                        		data-greaterdate-field="fromDate" 
                        		data-greaterdate-msg='ត្រូវថ្មីជាង ថ្ងៃអានចាប់ពី' />                        
			            			        
			        	អ្នកអាន
			          	<input data-role="dropdownlist"
			                   data-option-label="(--- ជ្រើសរើស ---)"
			                   data-value-primitive="true"
			                   data-text-field="fullname"
			                   data-value-field="id"
			                   data-bind="value: read_by, source: readerDS"
			                   required data-required-msg="ត្រូវការ អ្នកអាន" />            
			        </div>
			        
			        <br>

			        <!-- Form actions -->
					<div align="center">
						<span id="notification"></span>

						<span id="save" class="btn btn-icon btn-primary glyphicons circle_ok"><i></i>កត់ត្រា</span>						
						<span class="btn btn-icon btn-default glyphicons ban" data-bind="click: cancel"><i></i>បោះបង់</span>
					</div>
					<!-- // Form actions END -->

				</div> <!-- //End div example-->            
			</div> <!-- //End div span12-->		
		</div> <!-- //End div row-fluid-->
	</div>
</script>
<script id="wReading-row-template" type="text/x-kendo-tmpl">
	<tr>					
		<td>#=fullname#</td>		
		<td>#=number#</td>		
		<td align="center">
			<input type="checkbox" data-bind="checked: new_round, events:{ change: onChange }" />
		</td>		
		<td>
			<input data-role="numerictextbox"
				   data-min="0"
				   data-format="n0"                                      
                   data-bind="value: previous, events:{ change: onChange }"
                   style="width: 100px" #=previous>0?disabled='disabled':''# />
		</td>
		<td>
			<input class="txt#=index#" data-role="numerictextbox"
				   data-min="0"
				   data-format="n0"                                      
                   data-bind="value: current, events:{ change: onChange }"                   
                   style="width: 100px" />            
			<span class="label label-important" data-bind="invisible: isValid"><strong>កំហុស!</strong></span>			
		</td>		
		<td class="right" data-bind="text: usage"></td>	
    </tr>
</script>
<script id="wReading-footer-template" type="text/x-kendo-template">
    <tr>    	
        <td class="right" colspan="8" style="font-size:30px;">
            សរុប: #:total()# m<sup>3</sup>
        </td>
    </tr>
</script>

<script id="wIRReader" type="text/x-kendo-template">
	<div class="container-fluid">
		<div class="row-fluid">    
			<div class="span12">
				<div id="example" class="k-content">
					<span class="pull-right glyphicons no-js remove_2" 
						onclick="javascript:window.history.back()"><i></i></span>

					<h3>បញ្ចូលអំនានតាម IR Reader</h3>				    
				   
		            <div class="box-generic">
		            	<input id="myFile" type="file" accept="text/csv">
		            	<button type="button" class="k-button btn-info" data-bind="click: readFile">ទាញយកទិន្នន័យ</button>		            	
		            	<br>
						<span data-bind="text: uploadStatus"></span>
		            </div>			        
			        
			        <div class="demo-section">			        
					    <table class="table table-bordered table-striped table-white">
					        <thead>
					            <tr>
					                <th>អតិថិជន</th>					                						                
					                <th>កុងទ័រ</th>					                
					                <th>ជុំថ្មី</th>
					                <th>លេខចាស់</th>
					                <th>លេខថ្មី</th>					                
					                <th class="right">សរុប</th>
					            </tr>
					        </thead>
					        <tbody data-role="listview"
					        		data-auto-bind="false"					        		 
					        		data-template="wIRReader-row-template" 
					        		data-bind="source: dataSource"></tbody>
					        <tfoot data-template="wIRReader-footer-template" 
					        		data-bind="source: this"></tfoot>						        
					    </table>

					    <div id="pager" class="k-pager-wrap"
					    	 data-auto-bind="false"
				             data-role="pager" data-bind="source: dataSource"></div>
					    
				    </div>				       
			        
					<br>					

			        <div>
			        	ប្រចាំខែ
			        	<input id="monthOf" name="monthOf" data-role="datepicker" 
		            			data-bind="value: month_of" 
		            			data-start="year" data-depth="year" data-format="MM-yyyy"
		            			required data-required-msg="ត្រូវការ ប្រចាំខែ"
		            			placeholder="ខែ-ឆ្នាំ" />				    
				    	
				    	ថ្ងៃអានចាប់ពី
                        <input type="text" data-role='datepicker' 
                        		id="fromDate" name="fromDate"
                        		data-bind="value: from_date"	            				
                        		data-type="date" data-format="dd-MM-yyyy"
                        		placeholder="ថ្ងៃ-ខែ-ឆ្នាំ"
                        		required data-required-msg="ត្រូវការ ថ្ងៃអានចាប់ពី"  />                        	    				        
			            
			            ដល់
                        <input type="text" data-role='datepicker' 
                        		id ="toDate" name="toDate"
                        		data-bind="value: to_date"	            				 
                        		data-type="date" data-format="dd-MM-yyyy"
                        		placeholder="ថ្ងៃ-ខែ-ឆ្នាំ"
                        		required data-required-msg="ដល់ថ្ងៃណា?" 
                        		data-greaterdate-field="fromDate" 
                        		data-greaterdate-msg='ត្រូវថ្មីជាង ថ្ងៃអានចាប់ពី' />                        
			            			        
			        	អ្នកអាន
			          	<input data-role="dropdownlist"
			                   data-option-label="(--- ជ្រើសរើស ---)"
			                   data-value-primitive="true"
			                   data-text-field="fullname"
			                   data-value-field="id"
			                   data-bind="value: read_by, source: readerDS"
			                   required data-required-msg="ត្រូវការ អ្នកអាន" />            
			        </div>
			        
			        <br>

			        <!-- Form actions -->
					<div align="center">
						<span id="notification"></span>

						<span id="save" class="btn btn-icon btn-primary glyphicons circle_ok"><i></i>កត់ត្រា</span>						
						<span class="btn btn-icon btn-default glyphicons ban" data-bind="click: cancel"><i></i>បោះបង់</span>
					</div>
					<!-- // Form actions END -->

				</div> <!-- //End div example-->            
			</div> <!-- //End div span12-->		
		</div> <!-- //End div row-fluid-->
	</div>
</script>
<script id="wIRReader-row-template" type="text/x-kendo-tmpl">
	<tr>					
		<td>#=fullname#</td>		
		<td>#=number#</td>		
		<td align="center">
			<input type="checkbox" data-bind="checked: new_round, events:{ change: onChange }" />
		</td>		
		<td>
			<input data-role="numerictextbox"
				   data-min="0"
				   data-format="n0"                                      
                   data-bind="value: previous, events:{ change: onChange }"
                   style="width: 100px" #=previous>0?disabled='disabled':''# />
		</td>
		<td>
			<input class="txt#=index#" data-role="numerictextbox"
				   data-min="0"
				   data-format="n0"                                      
                   data-bind="value: current, events:{ change: onChange }"                   
                   style="width: 100px" />            
			<span class="label label-important" data-bind="invisible: isValid"><strong>កំហុស!</strong></span>			
		</td>		
		<td class="right" data-bind="text: usage"></td>	
    </tr>
</script>
<script id="wIRReader-footer-template" type="text/x-kendo-template">
    <tr>    	
        <td class="right" colspan="8" style="font-size:30px;">
            សរុប: #:total()# m<sup>3</sup>
        </td>
    </tr>
</script>

<script id="wReadingBook" type="text/x-kendo-template">
	<div class="container-fluid">
		<div class="row-fluid">    
			<div class="span12">
				<div id="example" class="k-content">
					<span class="pull-right glyphicons no-js remove_2" 
						onclick="javascript:window.history.back()"><i></i></span>

					<h3>រៀបចំសៀវភៅអំនាន</h3>					
					
		            <div class="box-generic">										
						<input id="ddlBranch" data-bind="value: branch_id" />						                
			            <input id="ddlLocation" data-bind="value: location_id" disabled="disabled" />		            	
		          		
		          		<button id="search" type="button" data-role="button"><i class="icon-search"></i></button>						          		
		            </div>			        
			        
			        <div id="grid"></div>
			        
				</div> <!-- //End div example-->            
			</div> <!-- //End div span12-->		
		</div> <!-- //End div row-fluid-->
	</div>
</script>

<script id="wInvoice" type="text/x-kendo-template">	
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span12">
				<div id="example" class="k-content">
					<span class="pull-right glyphicons no-js remove_2" 
						onclick="javascript:window.history.back()"><i></i></span>

					<h3>រៀបចំវិក្កយបត្រ</h3>

					<br>
					
					<div class="hidden-print">
						<input data-role="datepicker" 
		            			data-bind="value: monthOfSearch" 
		            			data-start="year" data-depth="year" 
		            			data-format="MM-yyyy" placeHolder="ប្រចាំខែ" />						
										
						<input id="ddlBranch" data-bind="value: branch_id" />						                
			            <input id="ddlLocation" data-bind="value: location_id" disabled="disabled" />
		            	|						            	
		            	<input data-role="combobox"
			                   data-placeholder="លេខកូដនាឡិកាស្ទង់..."
			                   data-auto-bind="false"
			                   data-value-primitive="true"
			                   data-filter="contains"							                   
			                   data-min-length="3"							                   
			                   data-text-field="number"
			                   data-value-field="id"
			                   data-bind="value: meter_id,
			                              source: meterDS" />
		          					          					          			          		
		          		<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button> |
						<button type="button" data-role="button" onclick="javascript:window.print()"><i class="icon-print"></i></button>								
					</div>											

					<br>
					
					<table class="table table-bordered table-striped table-white">
				        <thead>
				            <tr>
				                <th><input type="checkbox" data-bind="checked: chkAll, events: {change : checkAll}" /></th>				                				                
				                <th>អតិថិជន</th>					                
				                <th>កុងទ័រ</th>				                			                
				                <th>លេខចាស់</th>
				                <th>លេខថ្មី</th>
				                <th>សរុប</th>	                    
				            </tr>
				        </thead>
				        <tbody data-role="listview" 
				        		data-template="wInvoice-row-template" 
				        		data-auto-bind="false" 
				        		data-bind="source: readingDS"></tbody>
				        <tfoot data-template="wInvoice-footer-template" 
					        		data-bind="source: this"></tfoot>	            
				    </table>
				    
				    <div id="pager" class="k-pager-wrap"
				    	 data-auto-bind="false"
			             data-role="pager" data-bind="source: dataSource"></div>

				    <br>
				    
				    <div>
						ប្រចាំខែ
						<input id="monthOf" name="monthOf" data-role="datepicker" 
		            			data-bind="value: month_of"	data-start="year" 
		            			data-depth="year" data-format="MM-yyyy"
		            			required data-required-msg="ត្រូវការ ប្រចាំខែ" />
				        ថ្ងៃចេញវិក្កយបត្រ
				        <input id="issuedDate" name="issuedDate" data-role="datepicker" 
		            			data-bind="value: issued_date" data-format="dd-MM-yyyy"
		            			required data-required-msg="ត្រូវការ ថ្ងៃចេញវិក្កយបត្រ" />
				        ថ្ងៃចាប់ផ្ដើមទទួលប្រាក់
				        <input id="paymentDate" name="paymentDate" data-role="datepicker" 
		            			data-bind="value: payment_date" data-format="dd-MM-yyyy"
		            			required data-required-msg="ត្រូវការ ថ្ងៃបង់ប្រាក់" />
				        ថ្ងៃផុតកំណត់
				        <input id="dueDate" name="dueDate" data-role="datepicker" 
		            			data-bind="value: due_date" data-format="dd-MM-yyyy"
		            			required data-required-msg="ត្រូវការ ថ្ងៃផុតកំណត់" />			           	          	
				    </div>
				         
				    <br />				    
				    
		          	<!-- Form actions -->
					<div align="center">
						<span id="notification"></span>

						<span id="save" class="btn btn-icon btn-primary glyphicons circle_ok"><i></i>កត់ត្រា</span>							
						<span class="btn btn-icon btn-default glyphicons ban" data-bind="click: cancel"><i></i>បោះបង់</span>
					</div>
					<!-- // Form actions END -->					

				</div><!-- //End div example-->
			</div><!-- //End div span12-->
		</div><!-- //End div row-fluid-->
	</div>	
</script>
<script id="wInvoice-row-template" type="text/x-kendo-tmpl">
	<tr>
		<td align="center">
		   <input type="checkbox" data-bind="checked: isCheck" />
		</td>						
		<td>#=customer[0].surname# #=customer[0].name#</td>		
		<td><a href="\#/wReading_center/#=meter_id#"><i></i> #=meter[0].number#</a></td>								
		<td class="right">#=previous#</td>
		<td class="right">#=current#</td>		
		<td class="right">#=usage# m<sup>3</sup></td>		
    </tr>
</script>
<script id="wInvoice-footer-template" type="text/x-kendo-template">
    <tr>    	
        <td class="right" colspan="8" style="font-size:30px;">
            សរុប: #:total()# m<sup>3</sup>
        </td>
    </tr>
</script>

<script id="wPrintCenter" type="text/x-kendo-template">
	<div class="container-960">
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span12">
					<div id="example" class="k-content">
						<span class="pull-right glyphicons no-js remove_2 hidden-print" 
							onclick="javascript:window.history.back()"><i></i></span>

						<h3 class="hidden-print">រៀបចំបោះពុម្ពវិក្កយបត្រ</h3>
						
						<br>
						
						<table>
							<tr>
								<td>								
									<input data-role="datepicker" 
				            			data-bind="value: monthOfSearch" 
				            			data-start="year" data-depth="year" 
				            			data-format="MM-yyyy" placeHolder="ប្រចាំខែ" />						
									
									<input data-role="dropdownlist"
									   data-option-label="(--- រើស អាជ្ញាប័ណ្ណ ---)"
					                   data-auto-bind="false"
					                   data-value-primitive="true"
					                   data-text-field="name"
					                   data-value-field="id"
					                   data-bind="value: branch_id,
					                              source: branchDS,			                              
					                              events: {
					                                change: branchChanges
					                              }"/>
					            </td>
					            <td>
					                <select data-role="multiselect"
							           data-placeholder="តំបន់..."
							           data-value-primitive="true"
							           data-text-field="name"
							           data-value-field="id"
							           data-bind="value: selectedLocations,
							                      source: locationDS,
							                      enabled: isBranchSelected"
							           style="width: 200px;" 
							    	></select>
							    </td>
							    <td>							
					            	|						            	
					            	<input data-role="combobox"
						                   data-placeholder="លេខវិក្កយបត្រ..."
						                   data-auto-bind="false"
						                   data-value-primitive="true"
						                   data-filter="startswith"							                   
						                   data-min-length="3"							                   
						                   data-text-field="number"
						                   data-value-field="id"
						                   data-bind="value: invoice_id,
						                              source: invoiceDS" />

						            <button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button> |
									<button type="button" data-role="button" data-bind="click: print"><i class="icon-print"></i></button>
								</td>
							</tr>
						</table>

			            <br>

			            <div class="row-fluid">							
							<div class="span2">
							
								<!-- Stats Widget -->
								<span class="widget-stats widget-stats-gray widget-stats-2">
									<span class="count"><a data-bind="text: obj.totalInvoice"></a></span>
									<span class="txt">ចំនួនវិក្កយបត្រ</span>
								</span>
								<!-- // Stats Widget END -->
								
							</div>
							<div class="span2">
							
								<!-- Stats Widget -->
								<span class="widget-stats widget-stats-2">
									<span class="count"><a data-bind="text: obj.totalUnprint"></a></span>
									<span class="txt">មិនទាន់បោះពុម្ព</span>
								</span>
								<!-- // Stats Widget END -->
								
							</div>
							<div class="span2">
							
								<!-- Stats Widget -->
								<span class="widget-stats widget-stats-gray widget-stats-2">
									<span class="count"><a data-bind="text: obj.totalUsage"></a></span>
									<span class="txt">m<sup>3</sup></span>
								</span>
								<!-- // Stats Widget END -->
								
							</div>
							<div class="span6">
							
								<!-- Stats Widget -->
								<span class="widget-stats widget-stats-2">
									<span class="count"><a data-format="c0" data-bind="text: obj.totalAmount"></a></span>
									<span class="txt">ទឹកប្រាក់សរុប</span>
								</span>
								<!-- // Stats Widget END -->
								
							</div>							
						</div>					

			            <br>

			            <table class="table table-bordered table-striped table-white">
					        <thead>
					            <tr>
					            	<th style="width: 5%;" class="center">
					            		<input type="checkbox" data-bind="checked: chkAll, events: {change : checkAll}" />
					            	</th>
					                <th>លេខកូដ</th>	
					                <th>អតិថិជន</th>					                						                
					                <th>លេខវិក្កយបត្រ</th>					                
					                <th>ទឹកបរ្ាក់</th>
					                <th>ស្ថានភាព</th>
					                <th>ចំនួនបោះពុម្ព</th>					                					                
					            </tr>
					        </thead>
					        <tbody data-role="listview"
				        		data-auto-bind="false"					        		 
				        		data-template="wPrint-center-template" 
				        		data-bind="source: dataSource"></tbody>					        						        
					    </table>

			            <div data-role="pager" 
					    	data-auto-bind="false"
					    	data-page-sizes='[50, 100, 200, "All"]'					    	
				            data-bind="source: dataSource"></div>																	
			
					</div><!-- //End div example-->
				</div><!-- //End div span12-->
			</div><!-- //End div row-fluid-->
		</div>
	</div>	
</script>
<script id="wPrint-center-template" type="text/x-kendo-tmpl">
	<tr>
		<td class="center">
			<input type="checkbox" data-bind="checked: isCheck" />
		</td>
		<td>#=contact[0].wnumber#</td>
		<td>
			#if(contact[0].contact_type_id==6 || contact[0].contact_type_id==7 || contact[0].contact_type_id==8){#
				#=contact[0].company# 
			#}else{#
				#=contact[0].surname# #=contact[0].name#
			#}#
		</td>
		<td>
			<a href="\#/wInvoice_print/#=id#"><i></i> #=number#</a>
		</td>
		<td class="right">#=kendo.toString(amount, "c0", banhji.institute.locale)#</td>
		<td>
			#if(status==0){#
				មិនទាន់ទូទាត់
			#}else{#
				ទូទាត់រួច
			#}#
		</td>
		<td class="center">#=print_count#</td>
	</tr>
</script>
<script id="wInvoicePrint" type="text/x-kendo-template">
	<div class="container-960">
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span12">
					<div id="example" class="k-content">
						<div class="hidden-print">
							<span class="glyphicons no-js remove_2 pull-right" 
								onclick="javascript:window.history.back()"><i></i></span>

							<span class="btn btn-inverse btn-icon glyphicons print" data-bind="click: print"><i></i>បោះពុម្ព</span>											          																
						</div>

						<br>					
						
						<div data-role="listview" 
							data-auto-bind="false"
							data-bind="source: dataSource" 
							data-template="wInvoice-print-row-template"></div>						
			
					</div><!-- //End div example-->
				</div><!-- //End div span12-->
			</div><!-- //End div row-fluid-->
		</div>
	</div>	
</script>
<script id="wInvoice-print-row-template" type="text/x-kendo-tmpl">	
  	<div class="container-960">
		<table width="100%">
			<tr>
				<td valign="top">
					<img src="/banhji/#:company[0].image_url#" height="90" width="60" style="float: left">
				</td>
				<td align="center">
					<h4>#:company[0].name#</h4>					
					<h5>#:company[0].address# 
					<br>
					#:company[0].phone#</h5>					
				</td>
			</tr>
		</table>		

		<table width="100%">
			<tr>
				<td align="center" rowspan="2" width="60%">
					<h4>វិក្កយបត្រទូទាត់ថ្លៃទឹក</h4>
					<h5>ប្រចាំខែ #=kendo.toString(new Date(month_of), "MM-yyyy")#</h5>
				</td>
				<td>ថ្ងៃចេញវិក្កយបត្រ:</td>
				<td align="right">
					#=kendo.toString(new Date(issued_date), "dd-MM-yyyy")#					
				</td>
			</tr>
			<tr>
				<td>លេខវិក្កយបត្រ:</td>
				<td align="right">					
					#=number#
				</td>				
			</tr>			
		</table>

		<table width="100%">
			<tr>
				<td width="60%">
					ឈ្មោះ 
					<span class="strong">
						#if(contact[0].contact_type_id==6 || contact[0].contact_type_id==7 || contact[0].contact_type_id==8){#
							#=contact[0].company#
						#}else{#
							#=contact[0].surname# #=contact[0].name#
						#}#
					</span>
				</td>
				<td>លេខកូដ:</td>
				<td align="right">#=contact[0].number#</td>				
			</tr>
			<tr>
				<td>អាសយដ្ឋាន #=contact[0].address#</td>				
				<td>តំបន់:</td>
				<td align="right">#=location[0].name#</td>				
			</tr>
		</table>

		<table class="table table-bordered table-condensed">
			<thead>
				<tr>
					<th>កុងទ័រ</th>					
					<th>អំណានចាស់</th>
					<th>អំណានថ្មី</th>
					<th>បរិមាណ</th>
					<th>តំលៃឯកត្តា</th>
					<th>ទឹកប្រាក់</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td></td>
					#for(var j=0; j<invoiceLines.length; j++) {#
						#if(invoiceLines[j].type=="tariff"){#
							<td class="center">#=kendo.toString(new Date(invoiceLines[j].record[0].from_date), "dd-MM-yyyy")#</td>
							<td class="center">#=kendo.toString(new Date(invoiceLines[j].record[0].to_date), "dd-MM-yyyy")#</td>						
						#}#
					#}#	
					<td class="right">ម<sup>៣</sup></td>
					<td></td>
					<td></td>
				</tr>
				#for(var i=0; i<invoiceLines.length; i++) {#
					#if(invoiceLines[i].type=="tariff"){#
						<tr>
							<td>#:invoiceLines[i].meter[0].number#</td>
							<td class="right">#:invoiceLines[i].record[0].previous#</td>
							<td class="right">#:invoiceLines[i].record[0].current#</td>						
							<td class="right">#:kendo.toString(kendo.parseInt(invoiceLines[i].unit), 'n0')#</td>
							<td class="right"><span>#:kendo.toString(kendo.parseFloat(invoiceLines[i].price)*kendo.parseFloat(rate), locale=="km-KH"?"c0":"c", locale)#</span></td>
							<td class="right"><span>#:kendo.toString(kendo.parseFloat(invoiceLines[i].amount)*kendo.parseFloat(rate), locale=="km-KH"?"c0":"c", locale)#</span></td>
						</tr>
					#}else{#
						<tr>
							<td colspan="3"></td>							
							<td colspan="2" class="right">#:invoiceLines[i].description#</td>
							#if(invoiceLines[i].type=="exemptionUsage"){#
								<td class="right">#:invoiceLines[i].amount# ម<sup>៣</sup></td>							
							#}else{#
								<td class="right">#:kendo.toString(kendo.parseFloat(invoiceLines[i].amount)*kendo.parseFloat(rate), locale=="km-KH"?"c0":"c", locale)#</td>
							#}#
						</tr>
					#}#
				#}#						
				<tr>
					<td colspan="3" rowspan="2" class="center strong" style="font-size: medium;">
						ថ្ងៃផុតកំណត់បង់ប្រាក់ 
						<br> 
						#=kendo.toString(new Date(due_date), "dd-MM-yyyy")#
					</td>									
					<td class="right" colspan="2">បំណុលខែមុន</td>					
					<td class="right">#:kendo.toString(balance_forward*kendo.parseFloat(rate), locale=="km-KH"?"c0":"c", locale)#</td>
				</tr>
				<tr>										
					<td class="right strong" colspan="2">ទឹកប្រាក់ត្រូវបង់សរុប</td>					
					<td class="right strong">#:kendo.toString(total*kendo.parseFloat(rate), locale=="km-KH"?"c0":"c", locale)#</td>
				</tr>
				<tr>
					<td class="center" colspan="2">ថ្ងៃដែលបានបង់</td>					
					<td></td>					
					<td class="right" colspan="2">ទឹកប្រាក់ដែលបានបង់</td>					
					<td></td>
				</tr>
				<tr>
					<td colspan="6" class="top" style="font-size: x-small;" height="100px">
						#=company[0].term_of_condition#
					</td>
				</tr>
			</tbody>
		</table>

		<hr>

		<table width="100%">
			<tr>
				<td rowspan="2" width="40%">
					<span id="#=contact[0].wnumber#"></span>
				</td>
				<td align="left" class="strong">
					#if(contact[0].contact_type_id==5 || contact[0].contact_type_id==6 || contact[0].contact_type_id==7){#
						#=contact[0].company#
					#}else{#
						#=contact[0].surname# #=contact[0].name#
					#}#
				</td>
				<td>ថ្ងៃចេញវិក្ក.</td>
				<td align="right">#=kendo.toString(new Date(issued_date), "dd-MM-yyyy")#</td>
			</tr>
			<tr>
				<td align="left">#=location[0].name#</td>
				<td>លេខវិក្ក.</td>
				<td align="right">#=number#</td>
			</tr>
		</table>

		<table class="table table-bordered table-condensed" style="page-break-after: always;">
			<thead>
				<tr>
					<td>បេឡាករ</td>
					<td>កាលបរិច្ឆេទ</td>
					<td>ទឹកប្រាក់ទទួលបាន</td>
					<td>ទឹកប្រាក់ត្រូវបង់</td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td class="right">#=kendo.toString(total*kendo.parseFloat(rate), locale=="km-KH"?"c0":"c", locale)#</td>
				</tr>
			</tbody>
		</table>

	</div>
</script>

<script id="wInventoryItem" type="text/x-kendo-template">
	<div class="container-fluid">
		<br>
		<span class="pull-right glyphicons no-js remove_2" 
			onclick="javascript:window.history.back();"><i></i></span>

		<h3>សន្និធិ</h3>

		<div class="box-generic">
		    <!-- //Tabs Heading -->
		    <div class="tabsbar">
		        <ul>
		            <li class="glyphicons star active"><a href="#tab1" data-toggle="tab" data-bind="click: searchFavorite"><i></i> ប្រើញឹកញប់ </a>
		            </li>
		            <li class="glyphicons list"><a href="#tab2" data-toggle="tab"><i></i> ប្រភេទ </a>
		            </li>		            	            		            	            
		        </ul>
		    </div>
		    <!-- // Tabs Heading END -->

		    <div class="tab-content">
		        <!-- // FavoriteTab content -->
		        <div class="tab-pane active" id="tab1">
		        		
		        </div>
		        <!-- // Favorite Tab content END -->

		        <!-- // Category Tab content -->
		        <div class="tab-pane" id="tab2">
		            <input id="categories" data-bind="value: category_id" />	                
	                <input id="itemGroups" data-bind="value: item_group_id" disabled="disabled" />
            	</div>
		        <!-- // Category Tab content END -->		                
		    </div>

		    <br>

		    <div class="input-append">
			    <input class="col-md-2" id="appendedInputButtons" 
			    	type="text" placeholder="មុខទំនិញ ..." 
			    	data-bind="value: searchField, events:{ change: search }">

			    <button class="btn btn-default" data-bind="click: search"><i class="icon-search"></i> ស្វែងរក</button>				    
			</div>
		</div>
		
		<br>

		<table class="table table-bordered">
	        <thead>
	            <tr>
	                <th>លេខកូដ</th>
	                <th>មុខទំនិញ</th>
	                <th>ពណ៌នា</th>
	                <th>ចំនួន</th>	                
	                <th>លក់</th>	                
	                <th></th>
	            </tr>
	        </thead>
	        <tbody data-template="wInventory-item-template"
	        	data-pageable="true" 
	        	data-bind="source: dataSource"></tbody>
	    </table>
	    <div id="pager" class="k-pager-wrap"
	    	 data-auto-bind="false"
             data-role="pager" data-bind="source: dataSource"></div>        

	</div>
</script>
<script id="wInventory-item-template" type="text/x-kendo-template">
    <tr>
    	<td>#=sku#</td>
    	<td>#=name#</td>
    	<td>#=description#</td>
    	<td>
    		#if(on_hand<=order_point){#    		
    			<span class="badge badge-danger">#=kendo.toString(on_hand, "n0")#</span>
    		#}else{#
    			<span class="badge badge-info">#=kendo.toString(on_hand, "n0")#</span>
    		#}#

    		#=measurement==null?"":measurement#
    	</td>    	
    	<td>
    		#for(var i=0; i<price_list.length; i++) {#
    			#if(price_list[i].price>0){#
    				<span class="badge badge-inverse"> #=kendo.toString(price_list[i].price, "c", price_list[i].locale)# </span> / #=price_list[i].measurement# 
    			#}else{#
    				<span class="badge badge-danger"> #=kendo.toString(price_list[i].price, "c", price_list[i].locale)# </span> / #=price_list[i].measurement#
    			#}#
    			<br>    			    						 
			#}#
    	</td>    	
    	<td>
    		<div class="btn-group">
    			<button class="btn btn-default">ធ្វើការ</button>		  	
			  	<button class="btn dropdown-toggle" data-toggle="dropdown">
			    	<span class="caret"></span>
			  	</button>
			  	<ul class="dropdown-menu">			   		
			   		#if(is_assemble=="1"){#
			   			<li><a href="\#/item_assembly/#=id#"><i class="icon-edit"></i> កែប្រជុំមុខទំនិញ</a></li>			   		
			   		#}else if(is_catalog=="1"){#
			   			<li><a href="\#/item_catalog/#=id#"><i class="icon-edit"></i> កែកាតាឡុក</a></li>			   		
			   		#}else{#
			   			<li><a href="\#/price_list/#=id#"><i class="icon-usd"></i> កំណត់តំលៃ</a></li>			   			
			   			<li><a href="\#/item/#=id#"><i class="icon-edit"></i> កែមុខទំនិញ</a></li>
			   		#}#
			  	</ul>
			</div>
    	</td>    		
    </tr>
</script>
<script id="wInventory-item-category-template" type="text/x-kendo-template">
	<span class="btn btn-success" data-bind="click: categoryChanges">#=name#</span>  
</script>
<script id="wInventory-item-vendor-template" type="text/x-kendo-template">
    <div class="product-tmpl" data-bind="click: vendorChanges">
        <img src="#=image_url#" alt="#: company # image" />
        <h3>#:company#</h3>        
    </div>    
</script>

<script id="wBranch" type="text/x-kendo-template">
	<div class="container-960">
		<div class="row">
			<div class="span12">
				<span class="pull-right glyphicons no-js remove_2" 
						onclick="javascript:window.history.back()"><i></i></span>

				<div id="example" class="k-content">
					<h3>អាជ្ញាប័ណ្ណ</h3>
				
					<div class="box-generic">
									
						<!-- Row -->
						<div class="row-fluid">
						
							<!-- Column -->
							<div class="span6">
							
								<!-- Group -->
								<div class="control-group">
									<label class="control-label">លេខអាជ្ញាប័ណ្ណ</label>
									<div class="controls">
										<input id="number" name="number" 
											type="text" class="span10 k-textbox" 
											data-bind="value: obj.operation_license, events:{change:checkExisting}"
											required data-required-msg="ត្រូវការ លេខអាជ្ញាប័ណ្ណ">

										<div class="alert alert-error" data-bind="visible: isExisting" style="width: 260px;">										    
										    <i class="icon-warning-sign"></i> លេខអាជ្ញាប័ណ្ណ នេះត្រូវបានប្រើប្រាស់រួចហើយ !
										</div>
									</div>
								</div>
								<!-- // Group END -->
								
								<!-- Group -->
								<div class="control-group">
									<label class="control-label">ឈ្មោះអាជ្ញាប័ណ្ណ</label>
									<div class="controls">
										<input id="name" name="name" 
												type="text" class="span10 k-textbox" 
												data-bind="value: obj.name" 
												required data-required-msg="ត្រូវការ ឈ្មោះអាជ្ញាប័ណ្ណ">									
									</div>
								</div>
								<!-- // Group END -->
							
								<!-- Group -->
								<div class="control-group">
									<label class="control-label">ពណ៌នា</label>
									<div class="controls">
										<input type="text" class="span10 k-textbox" data-bind="value: obj.description">									
									</div>
								</div>
								<!-- // Group END -->

								<!-- Group -->
								<div class="control-group">
									<label class="control-label">ចំនួនអតិថិជនសរុបជាអតិប្បរមា</label>
									<div class="controls">
										<input type="text" class="input-mini k-textbox" data-bind="value: obj.max_customer">									
									</div>
								</div>
								<!-- // Group END -->						

								<!-- Group -->
								<div class="control-group">
									<label class="control-label">ថ្ងៃផុតកំណត់</label>								
									<div class="controls">
										<input class="span10" data-role="datepicker"			            		
			            					data-bind="value: obj.expire_date" 
			            					data-format="dd-MM-yyyy"
			            					data-parse-formats="yyyy-MM-dd" 
			            					placeholder="ថ្ងែ-ខែ-ឆ្នាំ" />		            				
									</div>								
								</div>
								<!-- // Group END -->

								<br><br>

								<!-- Group -->
								<div class="control-group">
									<label class="control-label">អាស័យដ្ឋាន</label>
									<div class="controls">
										<input type="text" class="span10 k-textbox" data-bind="value: obj.address">									
									</div>
								</div>
								<!-- // Group END -->

								<!-- Group -->
								<div class="control-group">
									<label class="control-label">ស្ថានភាព</label>
									<div class="controls">
										<input id="ddlStatus" name="ddlStatus"
											   data-role="dropdownlist"
					            			   data-option-label="(--- ជ្រើសរើស ---)"					            			   			                   
							                   data-value-primitive="true"
							                   data-text-field="name"
							                   data-value-field="id"
							                   data-bind="value: obj.status,
							                              source: statusList"
							                   required data-required-msg="ត្រូវការ ស្ថានភាព"/>
									</div>
								</div>
								<!-- // Group END -->
								
							</div>
							<!-- // Column END -->
							
							<!-- Column -->
							<div class="span6">
							
								<!-- Group -->
								<div class="control-group">
									<label class="control-label">រូបបិយប័ណ្ណ</label>
									<div class="controls">
										<input id="currency" name="currency"
											   class="span12" data-role="dropdownlist"
					            			   data-option-label="(--- ជ្រើសរើស ---)"					            			   			                   
							                   data-value-primitive="true"
							                   data-text-field="code"
							                   data-value-field="id"
							                   data-bind="value: obj.currency_id,
							                              source: currencyDS"
							                   required data-required-msg="ត្រូវការ រូបបិយប័ណ្ណ"/>
									</div>
								</div>
								<!-- // Group END -->
								
								<br><br>

								<!-- Group -->
								<div class="control-group">
									<label class="control-label">ឈ្មោះទំរង់ខ្លី</label>
									<div class="controls">
										<input id="abbr" name="abbr"
											type="text" class="input-mini k-textbox" 
											data-bind="value: obj.abbr"
											required data-required-msg="ត្រូវការ ឈ្មោះទំរង់ខ្លី">
									</div>
								</div>
								<!-- // Group END -->

								<!-- Group -->
								<div class="control-group">
									<label class="control-label">អ្នកតំណាង</label>
									<div class="controls">
										<input type="text" class="span12 k-textbox" data-bind="value: obj.representative">
									</div>
								</div>
								<!-- // Group END -->

								<!-- Group -->
								<div class="control-group">
									<label class="control-label">លេខទូរស័ព្ទលើតុ</label>
									<div class="input-prepend">
										<span class="add-on glyphicons phone"><i></i></span>
										<input type="text" class="input-large" data-bind="value: obj.phone" placeholder="01234567897">
									</div>								
								</div>
								<!-- // Group END -->

								<!-- Group -->
								<div class="control-group">
									<label class="control-label">លេខទូរស័ព្ទដៃ</label>
									<div class="input-prepend">
										<span class="add-on glyphicons iphone"><i></i></span>
										<input type="text" class="input-large" data-bind="value: obj.mobile" placeholder="01234567897">
									</div>
								</div>
								<!-- // Group END -->

								<!-- Group -->
								<div class="control-group">
									<label class="control-label">អីុមែល</label>
									<div class="input-prepend">
										<span class="add-on glyphicons envelope"><i></i></span>
										<input type="text" class="input-large" data-bind="value: obj.email" placeholder="name@email.com">
									</div>
								</div>
								<!-- // Group END -->
								
							</div>
							<!-- // Column END -->
							
						</div>
						<!-- // Row END -->
						
						<div class="separator line bottom"></div>
						
						<!-- Group -->
						<div class="control-group row-fluid">
							<label class="control-label">បទបញ្ជា(លើវិក្កយបត្រ)៖</label>
							<div class="controls">
								<textarea data-role="editor"
				                      data-tools="['bold',
				                                   'italic',
				                                   'underline',
				                                   'strikethrough',
				                                   'justifyLeft',
				                                   'justifyCenter',
				                                   'justifyRight',
				                                   'justifyFull']"
				                      data-bind="value: obj.term_of_condition"
				                      style="height: 200px;"></textarea>
	                      	</div>
						</div>
						<!-- // Group END -->
						
						<!-- Form actions -->
						<div align="center">
							<span id="notification"></span>

							<span id="save" class="btn btn-icon btn-primary glyphicons circle_ok"><i></i>កត់ត្រា</span>
							<span class="btn btn-danger btn-icon glyphicons delete" data-bind="click: delete, visible: isEdit"><i></i>លុប</span>
							<span class="btn btn-icon btn-default glyphicons ban" data-bind="click: cancel"><i></i>បោះបង់</span>
						</div>
						<!-- // Form actions END -->
						
					</div>
				</div>
			</div>
		</div>
	</div>
</script>

<script id="wSettings" type="text/x-kendo-template">
	<span class="pull-right glyphicons no-js remove_2" 
			onclick="javascript:window.history.back()"><i></i></span>

	<h2>កំណត់ពត៌មានទូទៅ: ទឹកស្អាត</h2>

	<br>

	<div class="widget widget-tabs widget-tabs-double widget-tabs-vertical row-fluid row-merge widget-tabs-gray">

	    <!-- Tabs Heading -->
	    <div class="widget-head span3">
	        <ul>
	            <li class="active"><a href="#tab1-1" class="glyphicons building" data-toggle="tab"><i></i><span class="strong">អាជ្ញាប័ណ្ណ</span></a>
	            </li>
	            <li><a href="#tab2-1" class="glyphicons group" data-toggle="tab"><i></i><span class="strong">ប្រភេទអតិថិជន</span></a>
	            </li>
	            <li><a href="#tab3-1" class="glyphicons google_maps" data-toggle="tab"><i></i><span class="strong">ប្លុក</span></a>
	            </li>
	            <li><a href="#tab4-1" class="glyphicons calculator" data-toggle="tab"><i></i><span class="strong">តំលៃលក់</span></a>
	            </li>
	            <li><a href="#tab5-1" class="glyphicons gift" data-toggle="tab"><i></i><span class="strong">លើកលែង</span></a>
	            </li>
	            <li><a href="#tab6-1" class="glyphicons circle_ok" data-toggle="tab"><i></i><span class="strong">ថែទាំ</span></a>
	            </li>
	        </ul>
	    </div>
	    <!-- // Tabs Heading END -->

	    <div class="widget-body span9">
	        <div class="tab-content">

	            <!-- Tab Branch content -->
	            <div class="tab-pane active" id="tab1-1">
	            	<a href="#/wBranch" class="btn btn-primary btn-icon glyphicons circle_plus"><i></i> បង្កើតអាជ្ញាប័ណ្ណថ្មី</a>

	            	<table class="table table-bordered table-white">
	            		<thead>
	            			<tr>
	            				<th>លេខ</th>
	            				<th>អាជ្ញាប័ណ្ណ</th>	            				
	            				<th>ទំរង់ខ្លី</th>
	            				<th>អ្នកតំណាង</th>	            				
	            				<th width="70px">លេខទូរស័ព្ទ</th>	            				
	            				<th width="100px">អាស័យដ្ឋាន</th>
	            				<th>ថ្ងៃផុតកំណត់</th>
	            				<th>ចំនួនអតិថិជន</th>
	            				<th>ស្ថានភាព</th>	            					            				
	            			</tr>
	            		</thead>
	            		<tbody data-role="listview"	            					            			
				                data-template="branch-wSettings-template"
				                data-bind="source: branchDS"></tbody>
	            	</table>		            
	            </div>
	            <!-- // Tab Branch content END -->

	            <!-- Tab Contact Type content -->
	            <div class="tab-pane" id="tab2-1">
	            	<div class="input-append">
					    <input class="span6" id="appendedInputButtons" type="text" placeholder="ប្រភេទថ្មី .." data-bind="value: contactTypeName">
					    <button class="btn btn-default" type="button" data-bind="click: addContactType"><i class="icon-plus"></i></button>					  
					</div>
	            	<table class="table table-bordered table-white">
	            		<thead>
	            			<tr>
	            				<th>ប្រភេទ</th>
	            				<th></th>
	            			</tr>
	            		</thead>
	            		<tbody data-role="listview"
	            				data-auto-bind="false"
		            			data-edit-template="edit-contact-type-wSetting-template"
				                data-template="contact-type-wSettings-template"
				                data-bind="source: contactTypeDS"></tbody>
	            	</table>		            
	            </div>
	            <!-- // Tab Contact Type content END -->

	            <!-- Tab Block content -->
	            <div class="tab-pane" id="tab3-1">
            		<input data-role="dropdownlist"
            			   data-option-label="(--- ជ្រើសរើស ---)"
            			   data-auto-bind="false"			                   
		                   data-value-primitive="true"
		                   data-text-field="name"
		                   data-value-field="id"
		                   data-bind="value: blockCompanyId,
		                              source: branchDS"/>

                	<div class="input-append">
					    <input class="span6" id="appendedInputButtons" type="text" placeholder="ប្លុកថ្មី .." data-bind="value: blockName">
					    <input class="span6" id="appendedInputButtons" type="text" placeholder="ទំរង់ខ្លី .." data-bind="value: blockAbbr">
					    <button class="btn btn-default" type="button" data-bind="click: addBlock"><i class="icon-plus"></i></button>					  
					</div>
	            	<table class="table table-bordered table-white">
	            		<thead>
	            			<tr>
	            				<th>អាជ្ញាប័ណ្ណ</th>
	            				<th>ប្លុក</td>
	            				<th>ទំរង់ខ្លី</th>
	            				<th></th>
	            			</tr>
	            		</thead>
	            		<tbody data-role="listview"
	            				data-auto-bind="false"
		            			data-edit-template="edit-block-wSetting-template"
				                data-template="block-wSettings-template"
				                data-bind="source: blockDS"></tbody>
	            	</table>
	            </div>
	            <!-- // Tab Block content END -->

	            <!-- Tab Tariff content -->
	            <div class="tab-pane" id="tab4-1">
	                <div class="row-fluid">
		                <div class="span6">
			                <input data-role="dropdownlist"
		            			   data-option-label="(--- ជ្រើសរើស ---)"
		            			   data-auto-bind="false"			                   
				                   data-value-primitive="true"
				                   data-text-field="name"
				                   data-value-field="id"
				                   data-bind="value: tariffCompanyId,
				                              source: branchDS"/>

		                	<div class="input-append">
							    <input class="span6" id="appendedInputButtons" type="text" placeholder="តំលៃលក់ថ្មី .." data-bind="value: tariffName">					    
							    <button class="btn btn-default" type="button" data-bind="click: addTariff"><i class="icon-plus"></i></button>					  
							</div>							
			            	<table class="table table-bordered table-white">
			            		<thead>
			            			<tr>
			            				<th>អាជ្ញាប័ណ្ណ</th>
			            				<th>ឈ្មោះតំលៃលក់</th>	            				
			            				<th></th>
			            			</tr>
			            		</thead>
			            		<tbody data-role="listview"
			            				data-auto-bind="false"
				            			data-edit-template="edit-tariff-wSetting-template"
						                data-template="tariff-wSettings-template"
						                data-bind="source: tariffDS"></tbody>
			            	</table>
		            	</div>
		            	<div class="span6">		                	
						    <input class="span3" type="text" placeholder="ចំនួនប្រើប្រាស់ថ្មី .." data-bind="value: tariffUsage">
						    <input class="span3" type="text" placeholder="តំលៃលក់ថ្មី .." data-bind="value: tariffPrice">							    					    
						    <input class="span2" data-role="dropdownlist"		            			   
	            			   data-auto-bind="false"			                   
			                   data-value-primitive="true"
			                   data-text-field="name"
			                   data-value-field="id"
			                   data-bind="value: tariffFlat,
		                              source: flatList"/>
						    <button class="btn btn-default" type="button" data-bind="click: addTariffItem, enabled: selectedTariff"><i class="icon-plus"></i></button>					  
						
							<span data-bind="text: selectedTariffName"></span>							

			            	<table class="table table-bordered table-white">
			            		<thead>
			            			<tr>
			            				<th>ចំនួនប្រើប្រាស់</th>
			            				<th>តំលៃលក់</th>
			            				<th>ថេរ</th>	            				
			            				<th></th>
			            			</tr>
			            		</thead>
			            		<tbody data-role="listview"
			            				data-auto-bind="false"
				            			data-edit-template="edit-tariff-item-wSetting-template"
						                data-template="tariff-item-wSettings-template"
						                data-bind="source: tariffItemDS"></tbody>
			            	</table>
		            	</div>
	            	</div>
	            </div>
	            <!-- // Tab Tariff content END -->

	            <!-- Tab Exemption content -->
	            <div class="tab-pane" id="tab5-1">
	            	<input data-role="dropdownlist"
            			   data-option-label="(--- ជ្រើសរើស ---)"
            			   data-auto-bind="false"			                   
		                   data-value-primitive="true"
		                   data-text-field="name"
		                   data-value-field="id"
		                   data-bind="value: exemptionCompanyId,
		                              source: branchDS"/>

	                <input data-role="dropdownlist"
            			   data-option-label="(--- រើស​​ ប្រភេទ ---)"
            			   data-auto-bind="false"			                   
		                   data-value-primitive="true"
		                   data-text-field="name"
		                   data-value-field="id"
		                   data-bind="value: exemptionType,
		                              source: exemptionTypeList"/>

                	<div class="input-append">
					    <input class="span6" id="appendedInputButtons" type="text" placeholder="លើកលែងថ្មី .." data-bind="value: exemptionName">
					    <input class="span6" id="appendedInputButtons" type="text" placeholder="តំលៃ .." data-bind="value: exemptionAmount">					    
					    <button class="btn btn-default" type="button" data-bind="click: addExemption"><i class="icon-plus"></i></button>					  
					</div>
	            	<table class="table table-bordered table-white">
	            		<thead>
	            			<tr>
	            				<th>អាជ្ញាប័ណ្ណ</th>	            				
	            				<th>ឈ្មោះលើកលែង</th>
	            				<th>តំលៃ</th>
	            				<th>ប្រភេទ</th>
	            				<th></th>
	            			</tr>
	            		</thead>
	            		<tbody data-role="listview"
	            				data-auto-bind="false"
		            			data-edit-template="edit-exemption-wSetting-template"
				                data-template="exemption-wSettings-template"
				                data-bind="source: exemptionDS"></tbody>
	            	</table>
	            </div>
	            <!-- // Tab Exemption content END -->

	            <!-- Tab content -->
	            <div class="tab-pane" id="tab6-1">
	            	<input data-role="dropdownlist"
            			   data-option-label="(--- ជ្រើសរើស ---)"
            			   data-auto-bind="false"			                   
		                   data-value-primitive="true"
		                   data-text-field="name"
		                   data-value-field="id"
		                   data-bind="value: maintenanceCompanyId,
		                              source: branchDS"/>

	                <div class="input-append">
					    <input class="span6" id="appendedInputButtons" type="text" placeholder="ថែទាំថ្មី .." data-bind="value: maintenanceName">
					    <input class="span6" id="appendedInputButtons" type="text" placeholder="ទឹកប្រាក់ .." data-bind="value: maintenanceAmount">
					    <button class="btn btn-default" type="button" data-bind="click: addMaintenance"><i class="icon-plus"></i></button>					  
					</div>
	            	<table class="table table-bordered table-white">
	            		<thead>
	            			<tr>
	            				<th>អាជ្ញាប័ណ្ណ</th>	            				
	            				<th>ឈ្មោះថែទាំ</th>
	            				<th>ទឹកប្រាក់</th>
	            				<th></th>
	            			</tr>
	            		</thead>
	            		<tbody data-role="listview"
	            				data-auto-bind="false"
		            			data-edit-template="edit-maintenance-wSetting-template"
				                data-template="maintenance-wSettings-template"
				                data-bind="source: maintenanceDS"></tbody>
	            	</table>
	            </div>
	            <!-- // Tab content END -->

	        </div>
	    </div>

	</div>
</script>
<script id="branch-wSettings-template" type="text/x-kendo-tmpl">                    
    <tr>
    	<td>#=operation_license#</td>
   		<td>
   			<a href="\#/wBranch/#=id#"><i></i>#=name#</a>
   		</td>   		
   		<td>#=abbr#</td>
   		<td>#=representative#</td>   		
   		<td>#=phone# #=mobile#</td>   		
   		<td>#=address#</td>
   		<td>#=expire_date#</td>
   		<td>#=max_customer#</td>
   		<td>
   			#if(status==1){#
				<span class="glyphicons no-js ok"><i></i></span>
			#}else{#
				<span class="glyphicons no-js ban"><i></i></span>
			#}#
   		</td>		 		
   	</tr>
</script>
<script id="contact-type-wSettings-template" type="text/x-kendo-tmpl">                    
    <tr>
    	<td>
    		 #:name#
   		</td>
   		<td>
   			#if(is_system=="0"){#
	   			<div class="edit-buttons">       
			        <a class="k-button k-edit-button" href="\\#"><span class="k-icon k-edit"></span></a>
			        <a class="k-button" data-bind="click: deleteContactType"><span class="k-icon k-delete"></span></a>
			   	</div>
		   	#}#
   		</td>
   	</tr>
</script>
<script id="edit-contact-type-wSetting-template" type="text/x-kendo-tmpl">
    <div class="product-view k-widget">
        <dl>                
            <dd>
                <input type="text" class="k-textbox" data-bind="value:name" name="ProductName" required="required" validationMessage="required" />
                <span data-for="ProductName" class="k-invalid-msg"></span>
            </dd>               
        </dl>
        <div class="edit-buttons">
            <a class="k-button k-update-button" href="\\#"><span class="k-icon k-update"></span></a>
            <a class="k-button k-cancel-button" href="\\#"><span class="k-icon k-cancel"></span></a>
        </div>
    </div>
</script>
<script id="block-wSettings-template" type="text/x-kendo-tmpl">                    
    <tr>
    	<td>
    		#if(company[0]) {#
    			#=company[0].name#
    		#}#
    	</td>
    	<td>
    		#:name#
   		</td>
   		<td>
    		#:abbr#
   		</td>
   		<td>
   			<div class="edit-buttons">       
		        <a class="k-button k-edit-button" href="\\#"><span class="k-icon k-edit"></span></a>
		        <a class="k-button k-delete-button" href="\\#"><span class="k-icon k-delete"></span></a>
		   	</div>
   		</td>
   	</tr>
</script>
<script id="edit-block-wSetting-template" type="text/x-kendo-tmpl">
    <div class="product-view k-widget">
        <dl>                
            <dd>
                <input data-role="dropdownlist"
        			   data-option-label="(--- ជ្រើសរើស ---)"        			   		                   
	                   data-value-primitive="true"
	                   data-text-field="name"
	                   data-value-field="id"
	                   data-bind="value: company_id,
	                              source: branchDS"/>
            </dd>
            <dd>
                <input type="text" class="k-textbox" data-bind="value:name" name="ProductName" required="required" validationMessage="required" />
                <span data-for="ProductName" class="k-invalid-msg"></span>
            </dd>
            <dd>
                <input type="text" class="k-textbox" data-bind="value:abbr" />                
            </dd>                
        </dl>
        <div class="edit-buttons">
            <a class="k-button k-update-button" href="\\#"><span class="k-icon k-update"></span></a>
            <a class="k-button k-cancel-button" href="\\#"><span class="k-icon k-cancel"></span></a>
        </div>
    </div>
</script>
<script id="tariff-wSettings-template" type="text/x-kendo-tmpl">                    
    <tr>
    	<td>
    		#if(company[0]) {#
    			#=company[0].name#
    		#}#
    	</td>
    	<td>
    		#:name#
   		</td>   		
		<td>
			<a class="k-button k-edit-button" href="\\#"><span class="k-icon k-edit"></span></a>
            <a class="k-button k-delete-button" href="\\#"><span class="k-icon k-delete"></span></a>
            <span class="k-button" data-bind="click: loadTariffItem"><i class="icon-hand-right"></i></span>             
		</td>
   	</tr>
</script>
<script id="edit-tariff-wSetting-template" type="text/x-kendo-tmpl">
    <div class="product-view k-widget">
        <dl>                
            <dd>
                <input data-role="dropdownlist"
        			   data-option-label="(--- ជ្រើសរើស ---)"        			   		                   
	                   data-value-primitive="true"
	                   data-text-field="name"
	                   data-value-field="id"
	                   data-bind="value: company_id,
	                              source: branchDS"/>
            </dd>
            <dd>
                <input type="text" class="k-textbox" data-bind="value:name" name="ProductName" required="required" validationMessage="required" />
                <span data-for="ProductName" class="k-invalid-msg"></span>
            </dd>                         
        </dl>
        <div class="edit-buttons">
            <a class="k-button k-update-button" href="\\#"><span class="k-icon k-update"></span></a>
            <a class="k-button k-cancel-button" href="\\#"><span class="k-icon k-cancel"></span></a>
        </div>
    </div>
</script>
<script id="tariff-item-wSettings-template" type="text/x-kendo-tmpl">                    
    <tr>
    	<td>#=usage#</td>
    	<td>#=price#</td>
    	<td>
    		#if(is_flat){#
    			ថេរ
    		#}else{#
    			អត់ថេរ
    		#}#
    	</td>   		
   		<td>
   			<div class="edit-buttons">       
		        <a class="k-button k-edit-button" href="\\#"><span class="k-icon k-edit"></span></a>
		        <a class="k-button k-delete-button" href="\\#" onclick="return confirm('Are you sure you want to delete this item?');"><span class="k-icon k-delete"></span></a>
		   	</div>
   		</td>
   	</tr>
</script>
<script id="edit-tariff-item-wSetting-template" type="text/x-kendo-tmpl">
    <div class="product-view k-widget">
        <dl>
        	<dd>
        		<input data-role="dropdownlist"		            			   
        			   data-auto-bind="false"			                   
	                   data-value-primitive="true"
	                   data-text-field="name"
	                   data-value-field="id"
	                   data-bind="value: is_flat,
                              source: flatList"/>
        	</dd>                
            <dd>
                <input type="text" class="k-textbox" data-bind="value:usage" name="usage" required="required" validationMessage="required" />
                <span data-for="usage" class="k-invalid-msg"></span>
            </dd> 
            <dd>
                <input type="text" class="k-textbox" data-bind="value:price" name="price" required="required" validationMessage="required" />
                <span data-for="price" class="k-invalid-msg"></span>
            </dd>                         
        </dl>
        <div class="edit-buttons">
            <a class="k-button k-update-button" href="\\#"><span class="k-icon k-update"></span></a>
            <a class="k-button k-cancel-button" href="\\#"><span class="k-icon k-cancel"></span></a>
        </div>
    </div>
</script>
<script id="exemption-wSettings-template" type="text/x-kendo-tmpl">                    
    <tr>
    	<td>
    		#if(company[0]) {#
    			#=company[0].name#
    		#}#
    	</td>    	
   		<td>
    		#:name#
   		</td>
   		<td>
    		#:amount#
   		</td>
   		<td>
    		#:unit#
   		</td>    		
		<td>
			<a class="k-button k-edit-button" href="\\#"><span class="k-icon k-edit"></span></a>
            <a class="k-button k-delete-button" href="\\#"><span class="k-icon k-delete"></span></a>                        
		</td>
   	</tr>
</script>
<script id="edit-exemption-wSetting-template" type="text/x-kendo-tmpl">
    <div class="product-view k-widget">
        <dl>                
            <dd>
                <input data-role="dropdownlist"
        			   data-option-label="(--- ជ្រើសរើស ---)"        			   		                   
	                   data-value-primitive="true"
	                   data-text-field="name"
	                   data-value-field="id"
	                   data-bind="value: company_id,
	                              source: branchDS"/>
            </dd>
            <dd>
                <input data-role="dropdownlist"
        			   data-option-label="(--- រើស​​ ប្រភេទ ---)"
        			   data-auto-bind="false"			                   
	                   data-value-primitive="true"
	                   data-text-field="name"
	                   data-value-field="id"
	                   data-bind="value: unit,
	                              source: exemptionTypeList"/>
            </dd>
            <dd>
                <input type="text" class="k-textbox" data-bind="value:name" name="ProductName" required="required" validationMessage="required" />
                <span data-for="ProductName" class="k-invalid-msg"></span>
            </dd> 
            <dd>
                <input type="text" class="k-textbox" data-bind="value:amount" name="amount" required="required" validationMessage="required" />
                <span data-for="amount" class="k-invalid-msg"></span>
            </dd>                        
        </dl>
        <div class="edit-buttons">
            <a class="k-button k-update-button" href="\\#"><span class="k-icon k-update"></span></a>
            <a class="k-button k-cancel-button" href="\\#"><span class="k-icon k-cancel"></span></a>
        </div>
    </div>
</script>
<script id="maintenance-wSettings-template" type="text/x-kendo-tmpl">                    
    <tr>
    	<td>
    		#if(company[0]) {#
    			#=company[0].name#
    		#}#
    	</td>    	
   		<td>
    		#:name#
   		</td>
   		<td>
    		#:amount#
   		</td>    		
		<td>
			<a class="k-button k-edit-button" href="\\#"><span class="k-icon k-edit"></span></a>
            <a class="k-button k-delete-button" href="\\#"><span class="k-icon k-delete"></span></a>                        
		</td>
   	</tr>
</script>
<script id="edit-maintenance-wSetting-template" type="text/x-kendo-tmpl">
    <div class="product-view k-widget">
        <dl>                
            <dd>
                <input data-role="dropdownlist"
        			   data-option-label="(--- ជ្រើសរើស ---)"        			   		                   
	                   data-value-primitive="true"
	                   data-text-field="name"
	                   data-value-field="id"
	                   data-bind="value: company_id,
	                              source: branchDS"/>
            </dd>           
            <dd>
                <input type="text" class="k-textbox" data-bind="value:name" name="ProductName" required="required" validationMessage="required" />
                <span data-for="ProductName" class="k-invalid-msg"></span>
            </dd> 
            <dd>
                <input type="text" class="k-textbox" data-bind="value:amount" name="amount" required="required" validationMessage="required" />
                <span data-for="amount" class="k-invalid-msg"></span>
            </dd>                        
        </dl>
        <div class="edit-buttons">
            <a class="k-button k-update-button" href="\\#"><span class="k-icon k-update"></span></a>
            <a class="k-button k-cancel-button" href="\\#"><span class="k-icon k-cancel"></span></a>
        </div>
    </div>
</script>


<!-- Water Reports -->
<!-- Water Customers -->
<script id="wReportCenter" type="text/x-kendo-template">
	<div>
		<span class="pull-right glyphicons no-js remove_2" 
				onclick="javascript:window.history.back()"><i></i></span>

		<table>
			<tr>
				<td>
					<h2>សន្ទស្សន៍លទ្ធផល៖</h2>
				</td>
				<td>
					<input data-role="dropdownlist"
					   data-option-label="(--- រើស អាជ្ញាប័ណ្ណ ---)"
	                   data-auto-bind="false"
	                   data-value-primitive="true"
	                   data-text-field="name"
	                   data-value-field="id"
	                   data-bind="value: branch_id,
	                              source: branchDS,
	                              events: {
	                                change: branchChanges
	                              }"
	                   style="width: 400px;" /> 
				</td>
			</tr>
		</table>
	</div>
	
	<br>	

	<div class="box-generic">
		<div class="row-fluid">							
			<div class="span2">
			
				<!-- Stats Widget -->
				<span class="widget-stats widget-stats-gray widget-stats-2">
					<span class="count"><a data-bind="text: obj.totalCustomer"></a></span>
					<span class="txt" style="font-size: small;">ចំនួនអតិថិជនសរុប</span>
				</span>
				<!-- // Stats Widget END -->
				
			</div>
			<div class="span2">
			
				<!-- Stats Widget -->
				<span class="widget-stats widget-stats-2">
					<span class="count"><a data-format="p" data-bind="text: obj.totalAllowCustomer"></a></span>
					<span class="txt" style="font-size: small;">អនុបាតនៃចំនួនអតិថិជន</span>
				</span>
				<!-- // Stats Widget END -->
				
			</div>
			<div class="span3">
			
				<!-- Stats Widget -->
				<span class="widget-stats widget-stats-gray widget-stats-2">
					<span class="count"><a data-format="p" data-bind="text: obj.totalActiveCustomer"></a></span>
					<span class="txt" style="font-size: small;">អនុបាតនៃភ្ជាប់បណ្ដាញដែលមានសុពុលភាពប្រើប្រាស់</span>
				</span>
				<!-- // Stats Widget END -->
				
			</div>
			<div class="span5">
			
				<!-- Stats Widget -->
				<span class="widget-stats widget-stats-2">
					<span class="count"><a data-format="c0" data-bind="text: obj.totalIncome"></a></span>
					<span class="txt" style="font-size: small;">ចំណូលលក់ទឹកពីអតិថិជនសរុប</span>
				</span>
				<!-- // Stats Widget END -->
				
			</div>							
		</div>

		<div class="row-fluid">		
			<div class="span2">
			
				<!-- Stats Widget -->			
				<span class="widget-stats widget-stats-default widget-stats-2">
					<span class="count"><a data-bind="text: obj.totalUsage"></a></span>
					<span class="txt" style="font-size: small;">បរិមាណទឹកដែលបានចេញវិក្កយបត្រ</span>
				</span>
				<!-- // Stats Widget END -->
				
			</div>
			<div class="span2">
			
				<!-- Stats Widget -->
				<span class="widget-stats widget-stats-2">
					<span class="count"><a data-format="n2" data-bind="text: obj.avgUsage"></a></span>
					<span class="txt" style="font-size: small;">បរិមាណទឹកប្រើប្រាស់ជាមធ្យមក្នុងមួយតំណរ</span>
				</span>
				<!-- // Stats Widget END -->
				
			</div>
			<div class="span3">
			
				<!-- Stats Widget -->
				<span class="widget-stats widget-stats-default widget-stats-2">
					<span class="count"><a data-format="c0" data-bind="text: obj.avgIncome"></a></span>
					<span class="txt" style="font-size: small;">មធ្យមភាពនៃប្រាក់ចំណូលក្នុងមួយតំណរ</span>
				</span>
				<!-- // Stats Widget END -->
				
			</div>
			<div class="span5">
			
				<!-- Stats Widget -->
				<span class="widget-stats widget-stats-2">
					<span class="count"><a data-format="c0" data-bind="text: obj.totalDeposit"></a></span>
					<span class="txt" style="font-size: small;">សមតុល្យប្រាក់កក់សរុប</span>
				</span>
				<!-- // Stats Widget END -->
				
			</div>							
		</div>
	</div>

	<br>

	<h2>របាយការណ៍</h2>
	<br>

	<div class="row-fluid">
		<div class="span3">
			<h4>ពត៌មានគ្របគ្រងអតិថិជន</h4>
			<div class="well margin-none" style="height: 150px;">
				Description here...
				<ul>
					<li><a href='#/wCustomer_list'>បញ្ជីអតិថិជន</a></li>
	  				<li><a href='#/wBrand_new_customer'>អតិថិជនថ្មី</a></li>  				
	  				<li><a href='#/wCustomer_no_meter'>អតិថិជនមិនទាន់ភ្ជាប់កុងទ័រ</a></li>
	  				<br>
	  				<li><a href='#/wLow_consumption'>តារាងប្រើប្រាស់ទឹកជាអប្បបរិមា</a></li>
	  				<li><a href='#/wDisconnect_list'>តារាងផ្ដាច់បណ្ដាញ</a></li>
				</ul>
			</div>
		</div>
		<div class="span3">
			<h4>គណនីអតិថិជន</h4>
			<div class="well margin-none" style="height: 150px;">
				Description here...
				<ul>
					<li><a href='#/wCustomer_balance'>បញ្ជីសមតុល្យអតិថិជន</a></li>
	  				<li><a href='#/wCustomer_deposit'>បញ្ជីប្រាក់កក់អតិថិជន</a></li>  				  				
	  				<br>  
	  				<li><a href='#/wAging_summary'>បញ្ជីបំណុលអតិថិជនសង្ខេប</a></li> 
	  				<li><a href='#/wAging_detail'>បញ្ជីបំណុលអតិថិជនលំអិត</a></li>
				</ul>
			</div>
		</div>
		<div class="span3">
			<h4>របាយការណ៍លក់</h4>
			<div class="well margin-none" style="height: 150px;">
				Description here...
				<ul>
					<li><a href='#/wSale_summary'>របាយការណ៍លក់សង្ខេប</a></li>
	  				<li><a href='#/wSale_detail'>របាយការណ៍លក់លំអិត</a></li>  				  				
	  				<br>  
	  				<li><a >របាយការណ៍ចំណូលពីភ្ជាប់តំណរ</a></li> 
	  				<li><a >របាយការណ៍ចំណូលផ្សេងៗ</a></li>
				</ul>
			</div>
		</div>
		<div class="span3">
			<h4>របាយការណ៍ទទួលប្រាក់</h4>
			<div class="well margin-none" style="height: 150px;">
				Description here...
				<ul>
					<li><a href='#/wPayment_summary'>ទទួលប្រាក់សង្ខេប</a></li> 
  					<li><a href='#/wPayment_detail'>ទទួលប្រាក់លំអិត</a></li>
  					<br>  
	  				<li><a href='#/wPayment_by_source_summary'>របាយការណ៍ទទួលប្រាក់តាមប្រភពសង្ខេប</a></li>
	  				<li><a href='#/wPayment_by_source_detail'>របាយការណ៍ទទួលប្រាក់តាមប្រភពលំអិត</a></li> 
				</ul>
			</div>
		</div>
	</div>

	<p class="separator text-center"><i class="icon-ellipsis-horizontal icon-3x"></i></p>
</script>
<script id="wCustomerList" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span12">
					<div id="example" class="k-content">
						<div class="hidden-print">
							<span class="pull-right glyphicons no-js remove_2" 
								onclick="javascript:window.history.back()"><i></i></span>

							<input id="ddlBranch" />						                
							<input id="ddlLocation" disabled="disabled" />
							<button id="search" type="button" data-role="button"><i class="icon-search"></i></button> |
							<button type="button" data-role="button" onclick="javascript:window.print()"><i class="icon-print"></i></button>						
						</div>

						<h3 align="center">បញ្ជីអតិថិជន</h3>	

						<div id="grid"></div>
					    					
					</div> <!-- //End div example--> 
				</div><!-- //End div span12-->
			</div><!-- //End div row-fluid-->
		</div>
	</div>	
</script>
<script id="wCustomerNoMeter" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span12">
					<div id="example" class="k-content">						
						
		                <div class="hidden-print">
		                	<span class="pull-right glyphicons no-js remove_2" 
								onclick="javascript:window.history.back();"><i></i></span>

		                	<input data-role="dropdownlist"
				                   data-auto-bind="false"
				                   data-text-field="name"
				                   data-value-field="id"
				                   data-bind="value: branch_id,
				                              source: branchDS"
				                   data-option-label="(--- អាជ្ញាប័ណ្ណ ---)" />

				            <button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button> |
							<button type="button" data-role="button" onclick="javascript:window.print()"><i class="icon-print"></i></button>   
		                </div>			           

						<br>
						
						<h4 align="center">របាយការណ៍អតិថិជនមិនទាន់ភ្ជាប់កុងទ័រ</h4>							

						<br>						

						<table class="table table-bordered table-striped table-white">
			        		<thead>
			        			<tr>			        				
			        				<th>លេខកូដ</th>	
			        				<th>ឈ្មោះ</th>			        					            				
			        				<th>ប្រភេទ</th>
			        				<th>តំបន់</th>
			        				<th>អាជ្ញាប័ណ្ណ</th>			        				
			        				<th>ប្រាក់កក់</th>
			        				<th></th>		        				            					            				
			        			</tr>
			        		</thead>
			        		<tbody data-role="listview"
			        				data-auto-bind="false"	            					            			
					                data-template="wCustomer-no-meter-row-template"
					                data-bind="source: dataSource"></tbody>
			        	</table>

			        	<div data-role="pager" 
						    	data-auto-bind="false"
					            data-bind="source: dataSource"></div>						

					</div><!-- //End div example-->
				</div><!-- //End div span12-->
			</div><!-- //End div row-fluid-->
		</div>
	</div>	
</script>
<script id="wCustomer-no-meter-row-template" type="text/x-kendo-tmpl">		
	<tr>		
		<td>#=wnumber#</td>
		<td>
			<a data-bind="click: goToNewMeter">#=fullname#</a>
		</td>
		<td>#=contact_type_name#</td>
		<td>#=wlocation_name#</td>
		<td>#=wbranch_name#</td>							
		<td align="right">#=kendo.toString(wdeposit, "c0", banhji.userManagement.getLogin().institute[0].locale)#</td>
		<td>
			<span class="btn btn-success btn-icon glyphicons circle_plus" data-bind="click: goToNewMeter"><i></i>ភ្ជាប់កុងទ័រថ្មី</span>			
		</td>							
    </tr>   
</script>
<script id="wBrandNewCustomer" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span12">
					<div id="example" class="k-content">						
						
		                <form id="employeeForm" data-role="validator" novalidate="novalidate">
			                <div id="fieldlist" class="hidden-print">
			                	<span class="pull-right glyphicons no-js remove_2" 
									onclick="javascript:window.history.back();"><i></i></span>

			                	<input data-role="dropdownlist"                   
				                   data-value-primitive="true"
				                   data-text-field="text"
				                   data-value-field="value"
				                   data-bind="value: sorter,
				                              source: sortList,                              
				                              events: { change: sorterChanges }" />
				                                           
			                    <input type="text" data-role='datepicker' id="sdate" name="sdate" data-type="date" data-bind="value: sdate" />
			                    <span data-for='sdate' class='k-invalid-msg'></span>

			                    <input type="text" data-role='datepicker' id ="edate" data-type="date" name="edate" data-bind="value: edate" 
			                    		data-greaterdate-field="sdate" data-greaterdate-msg='សូមពិនិត្យមើលកាលបរិច្ឆទឡើងវិញ' />
			                    <span data-for='edate' class='k-invalid-msg'></span>

			                    <input data-role="dropdownlist"
				                   data-auto-bind="false"
				                   data-text-field="name"
				                   data-value-field="id"
				                   data-bind="value: branch_id,
				                              source: branchDS"
				                   data-option-label="(--- អាជ្ញាប័ណ្ណ ---)" />
			               
			                    <button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button> |
								<button type="button" data-role="button" onclick="javascript:window.print()"><i class="icon-print"></i></button>     
			                </div>
			            </form>
					
						<div align="center">
							<h4>របាយការណ៍អតិថិជនថ្មី</h4>
							
							<span data-bind="text: strDate()"></span>														
						</div>											

						<br>						

						<table class="table table-bordered table-striped table-white">
			        		<thead>
			        			<tr>			        				
			        				<th>ថ្ងៃចុះឈ្មោះ</th>
			        				<th>លេខកូដ</th>	
			        				<th>ឈ្មោះ</th>			        					            				
			        				<th>ប្រភេទ</th>			        				
			        				<th>តំបន់</th>
			        				<th>អាជ្ញាប័ណ្ណ</th>
			        				<th>ប្រាក់កក់</th>
			        				<th>កុងទ័រ</th>		        				            					            				
			        			</tr>
			        		</thead>
			        		<tbody data-role="listview"
			        				data-auto-bind="false"	            					            			
					                data-template="wBranch-new-customer-row-template"
					                data-bind="source: dataSource"></tbody>
			        	</table>

			        	<div data-role="pager" 
						    	data-auto-bind="false"
					            data-bind="source: dataSource"></div>						

					</div><!-- //End div example-->
				</div><!-- //End div span12-->
			</div><!-- //End div row-fluid-->
		</div>
	</div>	
</script>
<script id="wBranch-new-customer-row-template" type="text/x-kendo-tmpl">		
	<tr>
		<td>#=kendo.toString(new Date(registered_date), "dd-MM-yyyy")#</td>		
		<td>#=wnumber#</td>
		<td>#=fullname#</td>
		<td>#=contact_type_name#</td>		
		<td>#=wlocation_name#</td>
		<td>#=wbranch_name#</td>						
		<td align="right">#=kendo.toString(wdeposit, "c0", banhji.userManagement.getLogin().institute[0].locale)#</td>
		<td>
			#for(var i=0; i<meters.length; i++) {#
				#:meters[i].number# <br>
			#}#
		</td>							
    </tr>   
</script>
<script id="wLowConsumption" type="text/x-kendo-template">
	<div class="row-fluid">
		<div class="span12">
			<div id="example" class="k-content">
				<div class="hidden-print">
					<a href="javascript:void()" 
						class="pull-right glyphicons no-js remove_2" 
						onclick="javascript: window.history.back()"><i></i></a>

					<input id="ddlBranch" />						                
					<input id="ddlLocation" disabled="disabled" />
					<input id="monthpicker" placeholder="ប្រចាំខែ" />
					<input id="usage" placeHolder="ចំនួនទឹកជាអប្បបរិមា" />	
					<button id="search" type="button" data-role="button"><i class="icon-search"></i></button> |
					<button type="button" data-role="button" onclick="javascript:window.print()"><i class="icon-print"></i></button>
				</div>

				<br>
				
				<div align="center">
					<h3>តារាងប្រើប្រាស់ទឹកជាអប្បបរិមា</h3>					
					<span id="strDate"></span>
				</div>
				
				<div id="grid"></div>					
								
			</div><!-- //End div example-->
		</div><!-- //End div span12-->
	</div><!-- //End div row-fluid-->	
</script>
<script id="wDisconnectList" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span12">
					<div id="example" class="k-content">
						<div class="hidden-print">
							<a href="javascript:void()" 
								class="pull-right glyphicons no-js remove_2" 
								onclick="javascript: window.history.back()"><i></i></a>

							<input id="ddlBranch" />						                
							<input id="ddlLocation" disabled="disabled" />							
							<input id="days" placeHolder="ចំនួនថ្ងៃផុតកំណត់" />	
							<button id="search" type="button" data-role="button"><i class="icon-search"></i></button> |
							<button type="button" data-role="button" onclick="javascript:window.print()"><i class="icon-print"></i></button>											
						</div>

						<br>

						<div align="center">
							<h3>តារាងផ្ដាច់បណ្ដាញ</h3>		
						</div>
						
						<div id="grid"></div>
					</div>
				</div>
			</div>
		</div>
	</div>	
</script>

<!-- Customer Accounting -->
<script id="wCustomerBalance" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span12">
					<div id="example" class="k-content">
						<div class="hidden-print">
							<span class="pull-right glyphicons no-js remove_2" 
								onclick="javascript:window.history.back()"><i></i></span>

							<input id="ddlBranch" />						                
							<input id="ddlLocation" disabled="disabled" />
							<button id="search" type="button" data-role="button"><i class="icon-search"></i></button> |
							<button type="button" data-role="button" onclick="javascript:window.print()"><i class="icon-print"></i></button>						
						</div>

						<h3 align="center">បញ្ជីសមតុល្យអតិថិជន</h3>	

						<div id="grid"></div>					
					    					
					</div> <!-- //End div example--> 
				</div><!-- //End div span12-->
			</div><!-- //End div row-fluid-->
		</div>
	</div>	
</script>
<script id="wCustomerDeposit" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span12">
					<div id="example" class="k-content">
						<div class="hidden-print">
							<span class="pull-right glyphicons no-js remove_2" 
								onclick="javascript:window.history.back()"><i></i></span>

							<input id="ddlBranch" />						                
							<input id="ddlLocation" disabled="disabled" />
							<button id="search" type="button" data-role="button"><i class="icon-search"></i></button> |
							<button type="button" data-role="button" onclick="javascript:window.print()"><i class="icon-print"></i></button>						
						</div>

						<h3 align="center">បញ្ជីប្រាក់កក់អតិថិជន</h3>	

						<div id="grid"></div>					
					    					
					</div> <!-- //End div example--> 
				</div><!-- //End div span12-->
			</div><!-- //End div row-fluid-->
		</div>
	</div>	
</script>
<script id="wAgingSummary" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="row-fluid">
			<div class="span12">
				<div id="example" class="k-content">

					<div class="hidden-print">
						<span class="pull-right glyphicons no-js remove_2" 
							onclick="javascript:window.history.back();"><i></i></span>

						<input id="ddlBranch" data-bind="value: branch_id" />						                
						<input id="ddlLocation" data-bind="value: location_id" disabled="disabled" />
						<input data-role="datepicker" data-bind="value: search_date" data-format="dd-MM-yyyy" placeHolder="កាលបរិច្ឆេទ" />
						<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button> |
						<button type="button" data-role="button" onclick="javascript:window.print()"><i class="icon-print"></i></button>				
					</div>

					<br>
					
					<div align="center">
						<h3>បញ្ជីបំណុលអតិថិជនសង្ខេប</h3>
						គិតត្រឹម
						<span data-bind="text: strDate"></span>
					</div>

					<table class="table table-bordered table-striped table-white">
		        		<thead>
		        			<tr>
		        				<th>ឈ្មោះ</th>
		        				<th>បច្ចុប្បន្ន</th>
		        				<th>១-៣០ថ្ងៃ</th>			        				
		        				<th>៣១-៦០ថ្ងៃ</th>
		        				<th>៦១-៩០ថ្ងៃ</th>        				
		        				<th>លើសពី ៩០ថ្ងៃ</th>
		        				<th>សរុប</th>	            					            				
		        			</tr>
		        		</thead>
		        		<tbody data-role="listview"
		        				data-auto-bind="false"	            					            			
				                data-template="wAging-summary-row-template"
				                data-bind="source: dataSource"></tbody>
		        	</table>

		        	<div data-role="pager"
				    	 data-auto-bind="false"
			             data-bind="source: dataSource"></div>					
										
				</div><!-- //End div example-->
			</div><!-- //End div span12-->
		</div><!-- //End div row-fluid-->	
	</div>	
</script>
<script id="wAging-summary-row-template" type="text/x-kendo-tmpl">		
	<tr>		
		<td>#=fullIdName#</td>		
		<td class="right">#:kendo.toString(current, 'c0', banhji.institute.locale)#</td>		
		<td class="right">#:kendo.toString(oneMonth, 'c0', banhji.institute.locale)#</td>
		<td class="right">#:kendo.toString(twoMonth, 'c0', banhji.institute.locale)#</td>
		<td class="right">#:kendo.toString(threeMonth, 'c0', banhji.institute.locale)#</td>
		<td class="right">#:kendo.toString(overMonth, 'c0', banhji.institute.locale)#</td>
		<td class="right">#:kendo.toString(amount, 'c0', banhji.institute.locale)#</td>					
    </tr>   
</script>
<script id="wAgingDetail" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="row-fluid">
			<div class="span12">
				<div id="example" class="k-content">
					
					<div class="hidden-print">
						<span class="pull-right glyphicons no-js remove_2" 
							onclick="javascript:window.history.back();"><i></i></span>

						<input id="ddlBranch" data-bind="value: branch_id" />						                
						<input id="ddlLocation" data-bind="value: location_id" disabled="disabled" />
						<input data-role="datepicker" data-bind="value: search_date" data-format="dd-MM-yyyy" placeHolder="កាលបរិច្ឆេទ" />
						<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button> |
						<button type="button" data-role="button" onclick="javascript:window.print()"><i class="icon-print"></i></button>				
					</div>

					
					<div align="center">
						<h3>បញ្ជីបំណុលអតិថិជនលំអិត</h3>
						គិតត្រឹម
						<span data-bind="text: strDate"></span>
					</div>

					<div id="grid"></div>		        	

				</div><!-- //End div example-->
			</div><!-- //End div span12-->
		</div><!-- //End div row-fluid-->	
	</div>	
</script>

<!-- Sale -->
<script id="wSaleSummary" type="text/x-kendo-template">
	<div class="container-fluid">
		<div class="row-fluid">    
			<div class="span12">
				<div id="example" class="k-content">
					
		            <div class="box-generic hidden-print">
		            	<span class="pull-right glyphicons no-js remove_2" 
							onclick="javascript:window.history.back()"><i></i></span>

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
		                   placeholder="ចាប់ពីថ្ងៃទី" />
	                    
	                   	<input data-role="datepicker"
	                       data-format="dd-MM-yyyy"
	                       data-parse-formats="yyyy-MM-dd"
		                   data-bind="value: edate"
		                   placeholder="ដល់ថ្ងៃទី" />	                    	            	
		          		
		          		<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
		          		|
						<button type="button" data-role="button" onclick="javascript:window.print()"><i class="icon-print"></i></button>						          		
		            </div>

		            <br><br>

		            <div align="center">
						<h3>របាយការណ៍លក់សង្ខេប</h3>
						
						<span data-bind="text: strDate"></span>														
					</div>

					<br>			        
			        
			        <div id="grid"></div>
			        
				</div> <!-- //End div example-->            
			</div> <!-- //End div span12-->		
		</div> <!-- //End div row-fluid-->
	</div>
</script>
<script id="wSaleDetail" type="text/x-kendo-template">
	<div class="container-fluid">
		<div class="row-fluid">    
			<div class="span12">
				<div id="example" class="k-content">
					
		            <div class="box-generic hidden-print">
		            	<span class="pull-right glyphicons no-js remove_2" 
							onclick="javascript:window.history.back()"><i></i></span>

						<table>
							<tr>
								<td>
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
					                   data-bind="value: sdate" />
				                    
				                   	<input data-role="datepicker"
				                       data-format="dd-MM-yyyy"
				                       data-parse-formats="yyyy-MM-dd"
					                   data-bind="value: edate" />

					                <input data-role="dropdownlist"
									   data-option-label="(--- រើស អាជ្ញាប័ណ្ណ ---)"
					                   data-auto-bind="false"
					                   data-value-primitive="true"
					                   data-text-field="name"
					                   data-value-field="id"
					                   data-bind="value: branch_id,
					                              source: branchDS,			                              
					                              events: {
					                                change: branchChanges
					                              }"/>
					            </td>
					            <td>
					            	<select data-role="multiselect"
							           data-placeholder="តំបន់..."
							           data-value-primitive="true"
							           data-text-field="name"
							           data-value-field="id"
							           data-bind="value: selectedLocations,
							                      source: locationDS,
							                      enabled: isBranchSelected"
							           style="width: 200px;" 
							    	></select>
					            </td>	                    	            	
					          	<td>	
					          		<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
					          		|
									<button type="button" data-role="button" onclick="javascript:window.print()"><i class="icon-print"></i></button>
								</td>
							</tr>
						</table>						          		
		            </div>

		            <br><br>

		            <div align="center">
						<h3>របាយការណ៍លក់លំអិត</h3>
						
						<span data-bind="text: strDate"></span>														
					</div>

					<br>			        
			        
			        <div id="grid"></div>

			        <div data-role="pager" 
					    	data-auto-bind="false"
					    	data-page-sizes='[50, 100, 200, "All"]'					    	
				            data-bind="source: dataSource"></div>
			        
				</div> <!-- //End div example-->            
			</div> <!-- //End div span12-->		
		</div> <!-- //End div row-fluid-->
	</div>
</script>

<!-- Payment -->
<script id="wPaymentSummary" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span12">
					<div id="example" class="k-content">
						
						<form id="employeeForm" data-role="validator" novalidate="novalidate">
			                <div id="fieldlist" class="hidden-print">
			                	<span class="pull-right glyphicons no-js remove_2" 
									onclick="javascript:window.history.back();"><i></i></span>

			                	<input data-role="dropdownlist"                   
				                   data-value-primitive="true"
				                   data-text-field="text"
				                   data-value-field="value"
				                   data-bind="value: sorter,
				                              source: sortList,                              
				                              events: { change: sorterChanges }" />
				                                           
			                    <input type="text" data-role='datepicker' id="sdate" name="sdate" data-type="date" data-bind="value: sdate" />
			                    <span data-for='sdate' class='k-invalid-msg'></span>

			                    <input type="text" data-role='datepicker' id ="edate" data-type="date" name="edate" data-bind="value: edate" 
			                    		data-greaterdate-field="sdate" data-greaterdate-msg='សូមពិនិត្យមើលកាលបរិច្ឆទឡើងវិញ' />
			                    <span data-for='edate' class='k-invalid-msg'></span>
			               
			                    <button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button> 
			                    |
								<button type="button" data-role="button" onclick="javascript:window.print()"><i class="icon-print"></i></button>      
			                </div>
			            </form>

						<br>

						<div align="center">
							<h4>របាយការណ៍ទទួលប្រាក់សង្ខេប</h4>
							
							<span data-bind="text: strDate"></span>														
						</div>

						<br>						

						<table class="table table-bordered table-striped table-white">
			        		<thead>
			        			<tr>
			        				<th width="45">ល.រ</th>
			        				<th>អាជ្ញាប័ណ្ណ</th>
			        				<th>តំបន់</th>			        				
			        				<th>ទឹកប្រាក់លក់</th>
			        				<th>ទទួលប្រាក់</th>        				
			        				<th>សមតុល្យ</th>	            					            				
			        			</tr>
			        		</thead>
			        		<tbody data-role="listview"
			        				data-auto-bind="false"	            					            			
					                data-template="wPayment-summary-row-template"
					                data-bind="source: dataSource"></tbody>
			        	</table>						

					</div><!-- //End div example-->
				</div><!-- //End div span12-->
			</div><!-- //End div row-fluid-->
		</div>
	</div>	
</script>
<script id="wPayment-summary-row-template" type="text/x-kendo-tmpl">		
	<tr>		
		<td>#=banhji.wPaymentSummary.dataSource.indexOf(data)+1#</td>
		<td>#=branch_name#</td>
		<td>#=location_name#</td>		
		<td class="right">#=kendo.toString(sale, "c0", banhji.eDashBoard.locale)#</td>
		<td class="right">#=kendo.toString(paid, "c0", banhji.eDashBoard.locale)#</td>
		<td class="right">#=kendo.toString(paid, "c0", banhji.eDashBoard.locale)#</td>						
    </tr>   
</script>
<script id="wPaymentDetail" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span12">
					<div id="example" class="k-content">

						<form id="employeeForm" data-role="validator" novalidate="novalidate">
			                <div id="fieldlist" class="hidden-print">
			                	<span class="pull-right glyphicons no-js remove_2" 
									onclick="javascript:window.history.back();"><i></i></span>

			                	<input data-role="dropdownlist"                   
				                   data-value-primitive="true"
				                   data-text-field="text"
				                   data-value-field="value"
				                   data-bind="value: sorter,
				                              source: sortList,                              
				                              events: { change: sorterChanges }" />
				                                           
			                    <input type="text" data-role='datepicker' id="sdate" name="sdate" data-type="date" data-bind="value: sdate" />
			                    <span data-for='sdate' class='k-invalid-msg'></span>

			                    <input type="text" data-role='datepicker' id ="edate" data-type="date" name="edate" data-bind="value: edate" 
			                    		data-greaterdate-field="sdate" data-greaterdate-msg='សូមពិនិត្យមើលកាលបរិច្ឆទឡើងវិញ' />
			                    <span data-for='edate' class='k-invalid-msg'></span>
			               
			                    <button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button> |
								<button type="button" data-role="button" onclick="javascript:window.print()"><i class="icon-print"></i></button>      
			                </div>
			            </form>

						<br>

						<div align="center">
							<h4>របាយការណ៍ទទួលប្រាក់លំអិត</h4>
							
							<span data-bind="text: strDate"></span>														
						</div>

						<br>            			

						<table class="table table-bordered table-striped table-white">
			        		<thead>
			        			<tr>			        				
			        				<th>កាលបរិច្ឆេទ</th>
			        				<th>បេឡាករ</th>
			        				<th>លេខកូដ</th>	
			        				<th>ឈ្មោះ</th>			        					            				
			        				<th>វិក្កយបត្រ</th>
			        				<th>បង់ប្រាក់</th>			        							        					        				            					            				
			        			</tr>
			        		</thead>
			        		<tbody data-role="listview"
			        				data-auto-bind="false"	            					            			
					                data-template="wPayment-detail-row-template"
					                data-bind="source: dataSource"></tbody>
			        	</table>

			        	<div data-role="pager" 
						    	data-auto-bind="false"
					            data-bind="source: dataSource"></div>
						
					</div><!-- //End div example-->
				</div><!-- //End div span12-->
			</div><!-- //End div row-fluid-->
		</div>
	</div>	
</script>
<script id="wPayment-detail-row-template" type="text/x-kendo-tmpl">		
	<tr>		
		<td>#=kendo.toString(new Date(payment_date), "dd-MM-yyyy")#</td>
		<td>#=employee#</td>
		<td>#=contact[0].wnumber#</td>
		<td>
			#if(contact[0].contact_type_id==6 || contact[0].contact_type_id==7 || contact[0].contact_type_id==8){#
				#=contact[0].company#
			#}else{#
				#=contact[0].surname# #=contact[0].name# 
			#}#
		</td>		
		<td>#=invoice#</td>		
		<td class="right">#=kendo.toString(amount, "c0", banhji.eDashBoard.locale)#</td>										
    </tr>   
</script>

<script id="wPaymentBySourceSummary" type="text/x-kendo-template">
	<div class="container-fluid">
		<div class="row-fluid">    
			<div class="span12">
				<div id="example" class="k-content">
					
		            <div class="box-generic hidden-print">
		            	<span class="pull-right glyphicons no-js remove_2" 
							onclick="javascript:window.history.back()"><i></i></span>

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
		                   placeholder="ចាប់ពីថ្ងៃទី" />
	                    
	                   	<input data-role="datepicker"
	                       data-format="dd-MM-yyyy"
	                       data-parse-formats="yyyy-MM-dd"
		                   data-bind="value: edate"
		                   placeholder="ដល់ថ្ងៃទី" />	                    	            	
		          		
		          		<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
		          		|
						<button type="button" data-role="button" onclick="javascript:window.print()"><i class="icon-print"></i></button>						          		
		            </div>

		            <br><br>

		            <div align="center">
						<h3>របាយការណ៍ទទួលប្រាក់តាមប្រភពសង្ខេប</h3>
						
						<span data-bind="text: strDate"></span>														
					</div>

					<br>			        
			        
			        <div id="grid"></div>
			        
				</div> <!-- //End div example-->            
			</div> <!-- //End div span12-->		
		</div> <!-- //End div row-fluid-->
	</div>
</script>
<script id="wPaymentBySourceDetail" type="text/x-kendo-template">
	<div class="container-fluid">
		<div class="row-fluid">    
			<div class="span12">
				<div id="example" class="k-content">
					
		            <div class="box-generic hidden-print">
		            	<span class="pull-right glyphicons no-js remove_2" 
							onclick="javascript:window.history.back()"><i></i></span>

						<table>
							<tr>
								<td>
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
					                   placeholder="ចាប់ពីថ្ងៃទី" />
				                    
				                   	<input data-role="datepicker"
				                       data-format="dd-MM-yyyy"
				                       data-parse-formats="yyyy-MM-dd"
					                   data-bind="value: edate"
					                   placeholder="ដល់ថ្ងៃទី" />

					                <input data-role="dropdownlist"
									   data-option-label="(--- រើស អាជ្ញាប័ណ្ណ ---)"
					                   data-auto-bind="false"
					                   data-value-primitive="true"
					                   data-text-field="name"
					                   data-value-field="id"
					                   data-bind="value: branch_id,
					                              source: branchDS,			                              
					                              events: {
					                                change: branchChanges
					                              }"/>
					            </td>
					            <td>
					            	<select data-role="multiselect"
							           data-placeholder="តំបន់..."
							           data-value-primitive="true"
							           data-text-field="name"
							           data-value-field="id"
							           data-bind="value: selectedLocations,
							                      source: locationDS,
							                      enabled: isBranchSelected"
							           style="width: 200px;" 
							    	></select>
					            </td>	                    	            	
					          	<td>	
					          		<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
					          		|
									<button type="button" data-role="button" onclick="javascript:window.print()"><i class="icon-print"></i></button>
								</td>
							</tr>
						</table>						          		
		            </div>

		            <br><br>

		            <div align="center">
						<h3>របាយការណ៍ទទួលប្រាក់តាមប្រភពលំអិត</h3>
						
						<span data-bind="text: strDate"></span>														
					</div>

					<br>			        
			        
			        <div id="grid"></div>

			        <div data-role="pager" 
					    	data-auto-bind="false"
					    	data-page-sizes='[50, 100, 200, "All"]'					    	
				            data-bind="source: dataSource"></div>
			        
				</div> <!-- //End div example-->            
			</div> <!-- //End div span12-->		
		</div> <!-- //End div row-fluid-->
	</div>
</script>


<!-- ***************************
 *	Menu Section         	  *
**************************** -->
<script id="customerMenu" type="text/x-kendo-template">
	<ul class="topnav">
	  	<li><a href='#/customers' class='glyphicons home'><i></i></a></li>
	  	<li role='presentation' class='dropdown'>
	  		<a class='dropdown-toggle' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'>អតិថិជន <span class='caret'></span></a>
  			<ul class='dropdown-menu'>  				
  				<li><a href='#/customers'>ទំព័រអតិថិជន</a></li>
  				<li><a href='#/customer'>អតិថិជនថ្មី</a></li>  				  				
  			</ul>
	  	</li>
	  	<li role='presentation' class='dropdown'>
	  		<a class='dropdown-toggle' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'>ប្រតិបត្តិការ <span class='caret'></span></a>
  			<ul class='dropdown-menu'>  				
  				<li><a href='#/estimate'>សម្រង់តម្លៃ</a></li>
  				<li><a href='#/so'>បញ្ជាលក់</a></li>
  				<li><a href='#/receipt'>បង្កាន់ដៃលក់</a></li>
  				<li><a href='#/invoice'>វិក្កយបត្រ</a></li>
  				<li><a href='#/gdn'>លិខិតដឹកជញ្ជូន</a></li>  				  				 				
  			</ul>
	  	</li>	  	
	  	<li><a href='#/customer_report_center'>របាយការណ៍</a></li>	  	
	  	<li><a href='#/wSettings' class='glyphicons settings'><i></i></a></li>
	</ul>
</script>
<script id="waterMenu" type="text/x-kendo-template">
	<ul class="topnav">
	  	<li><a href='#/water' class='glyphicons home'><i></i></a></li>
	  	<li role='presentation' class='dropdown'>
	  		<a class='dropdown-toggle' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'>អតិថិជន <span class='caret'></span></a>
  			<ul class='dropdown-menu'>  				
  				<li><a href='#/wCustomer_center'>ទំព័រអតិថិជន</a></li>
  				<li><a href='#/customer'>អតិថិជនថ្មី</a></li>
  				<li><a href='#/wCustomer_order'>រៀបចំលេខរៀងអតិថិជន</a></li>  				
  			</ul>
	  	</li>	  	
	  	<li role='presentation' class='dropdown'>
	  		<a class='dropdown-toggle' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'>អំនាន <span class='caret'></span></a>
  			<ul class='dropdown-menu'> 
  				<li><a href='#/wReading'>បញ្ជូលអំនានថ្មី</a></li>
  				<li><a href='#/wIR_reader'>បញ្ជូលអំនានតាម IR Reader</a></li>  				
  				<li><a href='#/wReading_book'>រៀបចំសៀវភៅអំនាន</a></li>
  				<li><a href='#/wReading_center'>កែប្រែលេខអំនាន</a></li>  				 
  			</ul>
	  	</li>
	  	<li><a href='#/wInvoice'>វិក្កយបត្រ</a></li>
	  	<li><a href='#/wPrint_center'>បោះពុម្ព</a></li>
	  	<li><a href='#/cashier'>បេឡាករ</a></li>	  	
	  	<li role='presentation' class='dropdown'>
	  		<a class='dropdown-toggle' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'>សន្និធិ <span class='caret'></span></a>
  			<ul class='dropdown-menu'>  				
  				<li><a href='#/wInventory_item'>ទំព័រសន្និធិ</a></li>
  				<li><a href='#/item'>សន្និធិថ្មី</a></li>
  				<li><a href='#/item_catalog'>កាតាលុកថ្មី</a></li>
  				<li><a href='#/item_assembly'>ប្រជុំមុខទំនិញថ្មី</a></li>  				 				 				
  			</ul>
	  	</li>
	  	<li><a href='#/wReport_center'>របាយការណ៍</a></li>	  	
	  	<li><a href='#/wSettings' class='glyphicons settings'><i></i></a></li>
	</ul>
</script>
<script id="inventoryMenu" type="text/x-kendo-template">
	<ul class="topnav">
	  	<li><a href='#/inventories' class='glyphicons home'><i></i></a></li>
	  	<li><a href='#/item_center'>សន្និធិ</a></li>
	  	<li role='presentation' class='dropdown'>
	  		<a class='dropdown-toggle' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'>ប្រតិបត្តិការ <span class='caret'></span></a>
  			<ul class='dropdown-menu'>  				
  				<li><a href='#/item'>សន្និធិថ្មី</a></li>
  				<li><a href='#/item_catalog'>កាតាលុកថ្មី</a></li>
  				<li><a href='#/item_assembly'>ប្រជុំមុខទំនិញថ្មី</a></li>  								 				
  			</ul>
	  	</li>
	  	<li><a href='#/item_report_center'>របាយការណ៍</a></li>	  	
	  	<li><a href='#/item_setting' class='glyphicons settings'><i></i></a></li>			
	</ul>
</script>
<!-- END OF DAWINE ==================================================================================================== -->


<!--  template section ends  -->
<script src="<?php echo base_url(); ?>resources/js/libs/localforage.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jszip/2.4.0/jszip.js"></script>
<script src="https://maps.googleapis.com/maps/api/js"></script>
<script>
	var banhji = banhji || {};
	var baseUrl = "<?php echo base_url(); ?>"+'api/';	
	banhji.token = null;
	banhji.pageLoaded = {};
	localforage.config({
		driver: localforage.LOCALSTORAGE,
		name: 'userData'
	});
	banhji.userManagement = kendo.observable({
		auth : new kendo.data.DataSource({
			transport: {
				read 	: {
					url: baseUrl + 'authentication',
					type: "GET",
					dataType: 'json'
				},
				create 	: {
					url: baseUrl + 'authentication',
					type: "POST",
					dataType: 'json'
				},
				update 	: {
					url: baseUrl + 'authentication',
					type: "PUT",
					dataType: 'json'
				},
				destroy : {
					url: baseUrl + 'authentication',
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
			pageSize: 100
		}),
		username : null,
		password : null,
		_password: null,
		pwdDS 	 : new kendo.data.DataSource({
			transport: {
				create 	: {
					url: baseUrl + 'banhji/password',
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
					// if(user.institute.length === 0) {
					// 	banhji.router.navigate('/page/' + user.id);
					// } else {
						banhji.router.navigate('/');
						location.reload();						
					// }
				} else {
					console.log('bad');
				}
			});
		},
		registerBtn: function() {
			banhji.view.layout.showIn('#content', banhji.view.signupView);
			
		},
		logout 		: function() {
			localforage.removeItem('user', function(err){
				banhji.router.navigate('/manage');
			});
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
			if(this.getLogin()) {
				return '\#/page';
			} else {
				return '\#/page/';
			}
			
		},
		signup 	   : function() {
			this.auth.add({username: this.get('username'), password: this.get('password')});
			this.sync();
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
					var user = auth.dataStore.data()[0];
					localforage.setItem('user', user);
					if(user.institute.length === 0) {
						banhji.router.navigate('/page', false);
					} else {
						banhji.router.navigate('/app', false);
					}
				}
			});
		}
	});
	banhji.institute = banhji.userManagement.getLogin()!==null?banhji.userManagement.getLogin().institute[0]:"";
	function getDB() {
		var entity = null;
		banhji.userManagement.getLogin() !== null ? entity = banhji.userManagement.getLogin().institute[0].name : entity = false;
		
		return entity;
	}
	banhji.users = kendo.observable({
		dataStore	: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: baseUrl + 'banhji/users',
					type: "GET",
					headers: {
						"Entity": getDB(),
						"User": banhji.userManagement.getLogin() === null ? '': banhji.userManagement.getLogin().id
					},
					dataType: 'json'
				},
				create 	: {
					url: baseUrl + 'banhji/users',
					type: "POST",
					headers: {
						"Entity": getDB(),
						"User": banhji.userManagement.getLogin() === null ? '': banhji.userManagement.getLogin().id
					},
					dataType: 'json'
				},
				update 	: {
					url: baseUrl + 'banhji/users',
					type: "PUT",
					headers: {
						"Entity": getDB(),
						"User": banhji.userManagement.getLogin() === null ? '': banhji.userManagement.getLogin().id
					},
					dataType: 'json'
				},
				destroy : {
					url: baseUrl + 'banhji/users',
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
					url: baseUrl + 'banhji/roles',
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
	var dataStore = function(url) {
		var o = new kendo.data.DataSource({
				transport: {
					read 	: {
						url: url,
						type: "GET",
						headers: {
							"Entity": getDB(),
							"User": banhji.userManagement.getLogin() === null ? '':banhji.userManagement.getLogin().id
						},
						dataType: 'json'
					},
					create 	: {
						url: url,
						type: "POST",
						headers: {
							"Entity": getDB(),
							"User": banhji.userManagement.getLogin() === null ? '':banhji.userManagement.getLogin().id
						},
						dataType: 'json'
					},
					update 	: {
						url: url,
						type: "PUT",
						headers: {
							"Entity": getDB(),
							"User": banhji.userManagement.getLogin() === null ? '':banhji.userManagement.getLogin().id
						},
						dataType: 'json'
					},
					destroy : {
						url: url,
						type: "DELETE",
						headers: {
							"Entity": getDB(),
							"User": banhji.userManagement.getLogin() === null ? '':banhji.userManagement.getLogin().id
						},
						dataType: 'json'
					},
					parameterMap: function(options, operation) {
						if(operation === 'read') {
							return {
								limit: options.take,
								page: options.page,
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
				pageSize: 100
			});
		return o;
	};	
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
	banhji.payment_option = kendo.observable({
		data : [
			{type: "cash", description: "សាច់ប្រាក់សុទ្ធ", selected: false},
			{type: "bank", description: "តាមធនាគារ", selected: false},
			{type: "check", description: "ចេញជាសែក", selected: false}
		]
	});
	banhji.Layout = kendo.observable({
		locale: "km-KH",
		menu 	: []
	});
	banhji.currency = kendo.observable({
		dataSource: dataStore(baseUrl + 'currencies'),
		getEnabled: function() {
			this.dataSource.filter({field: "enabled", operator: '', value: 'true'});
		},
		getCurrencyRate : function(currency_id) {
			var rate = 1;			
			for(var i =0; i < this.dataSource.data().length; i++) {
				if(currency_id === this.dataSource.data()[i].id) {
					rate = kendo.parseFloat(this.dataSource.data()[i].rate);
					break;
				}
			}
			return rate;
		},
		getAmount : function(currency) {
			var amount = 1;
			for(var i =0; i < this.dataSource.data().length; i++) {
				if(currency === this.dataSource.data()[i].locale) {
					amount = kendo.parseFloat(this.dataSource.data()[i].rate);
					break;
				}
			}
			return amount;
		},		
		getRate   : function(from, to) {
			return from/to;
		}
	});
	banhji.company= kendo.observable({
		dataStore: dataStore(baseUrl + 'companies'),
		apDS 	 : [],
		arDS 	 : [],
		cashDS 	 : [],
		currency : banhji.currency.dataSource,
		accountDS: dataStore(baseUrl + 'accounts'),
		closed 	 : function() {
			this.dataStore.cancelChanges();
			window.history.back(-1);
		},
		findById : function(id) {
			if(this.dataStore.data().length > 0) {
				this.setCurrent(this.dataStore.get(id));
			} else {
				this.dataStore.query({
					filter: {field: 'id', operator: '', value: id}
				}).done(function(e){
					var data = banhji.company.dataStore.data()[0];
					banhji.company.setCurrent(data);
				});
			}
		},
		init 	 : function() {
			var that = this;
			if(this.get('apDS').length === 0 || this.get('arDS').length === 0 || this.get('cashDS').length === 0) {
				this.accountDS.fetch(function(e){
					var data = that.accountDS.data();
					$.each(data, function(index, value){
						if(value.type.id === 6) {
							that.cashDS.push(value);
						} else if(value.type.id === 11) {
							that.apDS.push(value);
						} else if(value.type.id === 7) {
							that.arDS.push(value);
						}
					});
				});
			}		
		},
		info 	 : function() {},
		edit 	 : function() {},
		setCurrent:function(current) {
			this.set('current', current);
		},
		add 	 : function() {
			this.dataStore.insert(0,{
				name: null,
				logo: null,
				legal_name: null,
				currency: {id: null, code: null},
				email: null,
				phone: null,
				address: null,
				year_founded: null,
				vat_no: null,
				ap_account: null,
				ar_account: null,
				cash_account: null,
				image: null,
				operation_license: null,
				main: 'false'
			});
			var data = this.dataStore.at(0)
			
			console.log(data);
			banhji.router.navigate('/admin/company/new');
			banhji.company.set('current', data);
		},
		cancel 	 : function() {
			this.dataStore.cancelChanges();
			banhji.router.navigate('/admin/company-settings');
		},
		save 	 : function() {
			this.dataStore.sync();
		}
	});
	
	banhji.bank = kendo.observable({
		ds 			: dataStore(baseUrl + "banks"),
		find 		: function(arg) {
			var c = typeof arg;
			if(c === 'object') {
				this.ds.filter(arg);
			} else if(c === 'string') {
				this.ds.filter(
					{field: 'name', operator: 'like', value: arg}
				);
			} else if(c === 'number') {
				this.ds.filter(
					{field: 'id', operator: '', value: arg}
				);
			} else {
				console.log('no field provided for search!');
			}
		},
		getAll 		: function() {
			this.ds.filter(
				{field: 'deleted', operator: '', value: 'false'}
			);
		},
		getAllDelete: function() {
			this.ds.query([
				{field: 'deleted', operator: '', value: 'false'},
				{field: 'deleted', operator: 'or', value: 'true'}
			]);
		},
		setCurrent 	: function(current) {
			this.set('current', current);
		},
		add 		: function(data) {
			this.ds.add(data);
		},
		insert 		: function(index, data) {
			this.ds.insert(index, data);
		},
		remove 		: function(data) {
			this.ds.remove(data);
		},
		save 		: function() {
			var that = this,
				dfd  = $.Deferred();
			this.ds.sync();
			this.ds.bind('requestEnd', function(e) {
				var type = e.type;
				if(type === 'create') {
					dfd.resolve(e.response.results);
				} else if(type==="update") {
					dfd.resolve(e.response.results);
				} else if(type== 'destroy') {
					dfd.resolve(e.response.results);
				} else {
					dfd.reject({error:'not know issue'});
				}
			});
			return dfd.promise();
		}
	});
	banhji.my = kendo.observable({
		dataStore: dataStore(baseUrl + 'users'),
		findMyInfo: function() {},
		changePWD: function(){},
		addInfo  : function(){},
		addEmail : function(){},
		addPhone : function(){},
		delPhone : function(){},
		delEmail : function(){},
		save 	 : function(){
			this.dataStore.sync();
		}
	});
	var user = kendo.observable({
		data: null,
		password: "",
		confirmedPWD: "",
		pass: false,
		dataStore: new kendo.data.DataSource({
			transport: {
				create: {
					url: baseUrl + "users",
					headers: {
						"Entity": getDB()
					},
					type: "POST",
					dataType: "json"
				},
				read: {
					url: baseUrl + "users",
					headers: {
						"Entity": getDB()
					},
					type: "GET",
					dataType: "json"
				},
				update: {
					url: baseUrl + "users",
					headers: {
						"Entity": getDB()
					},
					type: "PUT",
					dataType: "json"
				},
				destroy: {
					url: baseUrl + "users",
					headers: {
						"Entity": getDB()
					},
					type: "DELETE",
					dataType: "json"
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
			filter: [
				{field: 'status', value: true }
			],
			batch: true
		}),
		userRoleDS: new kendo.data.DataSource({
			transport: {
				create: {
					url: baseUrl + "users/roles",
					headers: {
						"Entity": getDB()
					},
					type: "POST",
					dataType: "json"
				},
				read: {
					url: baseUrl + "users/roles",
					headers: {
						"Entity": getDB()
					},
					type: "GET",
					dataType: "json"
				},
				update: {
					url: baseUrl + "users/roles",
					headers: {
						"Entity": getDB()
					},
					type: "PUT",
					dataType: "json"
				},
				destroy: {
					url: baseUrl + "users/roles",
					headers: {
						"Entity": getDB()
					},
					type: "DELETE",
					dataType: "json"
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
		setCurrent: function(current) {
			this.set('current', current);
		},
		validatePWD	: function() {
			if(this.get('password').length < 7) {
				alert("password must be atleast 7-character long");
				this.set('passed', false);
			} else {
				this.set('passed', true);
			}
		},
		passwordMatch: function() {
			if(this.get('password') !== this.get('confirmedPWD')) {
				console.log("password do not match.");
			} else {
				console.log("Good to go.");
			}
		},
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

		  	if(!reValidEmail.test(this.get('current').email)){
		  		alert("Please enter valid address");
				this.set('passed', false);
		  	}
		  	this.set('passed', false);
		},
		savePassword : function() {
			if(this.get('password') === this.get('confirmedPWD') && this.get('password').length > 6) {
				this.get('current').set('password', this.get('password'));
				this.save();
			} else {
				alert("សូមពិនិត្យឡើងវិញ");
			}
		},
		save: function() {	
			this.dataStore.sync();
			this.dataStore.bind('requestEnd', function(e){
				var type = e.type;
				var res  = e.response.results;
				if(type !== 'read') {
					alert('កត់ត្រាបានសំរេច');
				}	
			});	
		}
	});
	banhji.entity = kendo.observable({
		dataStore 	: '',
		setCurrent 	: function(current) {
			this.set('current', current);
		},
		save 		: function() {
			this.dataStore.sync();
		}
	});
	banhji.segment = kendo.observable({
		dataStore: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: baseUrl + "segments",
					type: "GET",
					headers: {
						"Entity": getDB()
					},
					dataType: 'json'
				},
				create 	: {
					url: baseUrl + "segments",
					type: "POST",
					headers: {
						"Entity": getDB()
					},
					dataType: 'json'
				},
				update 	: {
					url: baseUrl + "segments",
					type: "PUT",
					headers: {
						"Entity": getDB()
					},
					dataType: 'json'
				},
				destroy : {
					url: baseUrl + "segments",
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
		setCurrent	: function(current) {
			this.set('current', current);
		},
		close 		: function() {
			this.dataStore.cancelChanges();
			window.history.back(-1);
		},
		addItems : function() {},
		addNew 	 : function() {},
		find 	 : function() {
			//find segment and its items
		},
		save 	 : function() {
			this.dataStore.sync();
			this.dataStore.bind('requestEnd', function(e){
				var res = e.response;
				if(res.error) {
					alert(res.error);
				} else if(e.type !== 'read'){
					alert("កំពុងប្រត្តិប័ត្រការបានជោគជ័យ៊")
				}
			});
		}
	});
	banhji.segmentItem = kendo.observable({
		ds 			: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: baseUrl + 'segments/items',
					type: "GET",
					headers: {
						"Entity": getDB(),
						"User": banhji.userManagement.getLogin() === null ? '': banhji.userManagement.getLogin().id
					},
					dataType: 'json'
				},
				create 	: {
					url: baseUrl + 'segments/items',
					type: "POST",
					headers: {
						"Entity": getDB(),
						"User": banhji.userManagement.getLogin() === null ? '': banhji.userManagement.getLogin().id
					},
					dataType: 'json'
				},
				update 	: {
					url: baseUrl + 'segments/items',
					type: "PUT",
					headers: {
						"Entity": getDB(),
						"User": banhji.userManagement.getLogin() === null ? '': banhji.userManagement.getLogin().id
					},
					dataType: 'json'
				},
				destroy : {
					url: baseUrl + 'segments/items',
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
			group: { field: "segment.name"},
			batch: true,
			serverFiltering: true,
			serverPaging: true,
			pageSize: 100
		}),
		segmentDS 	: banhji.segment.dataStore,
		editable 	: false,
		closedX 	: function() {
			window.history.back(-1);
		},
		sort 		: function(e) {
			var selected = e.sender.selectedIndex;
			var id = this.segmentDS.at(selected).id;
			this.bySegment(id);
		},
		bySegment 	: function(segment) {
			var type = typeof segment;

			return this.ds.query({
				filter: {field: 'segment_id', value: segment},
				page: this.ds.page(),
				take: this.ds.pageSize()
			});
		},
		edit 		: function(e){
			this.setCurrent(e.data);
			this.set('editable', false);
			banhji.view.mainView.showIn("#segment-list-container", banhji.view.actionView);
		},
		remove 		: function(e){
			this.ds.remove(e.data);
		},
		setCurrent 	: function(current) {
			this.set('current', current);
		},
		add 		: function(){
			this.ds.insert(0, {
				segment: this.get('segment'),
				code: null,
				name: null
			});
			this.setCurrent(this.ds.at(0));
			this.set('editable', true);
			banhji.view.mainView.showIn("#segment-list-container", banhji.view.actionView);
		},
		segment 	: null,
		cancel 		: function() {
			banhji.view.mainView.showIn("#segment-list-container", banhji.view.listView);
			this.ds.cancelChanges();
		},
		save 		: function() {
			if(this.get('current').code.length > this.get('segment').code_length) {
				//
			} else {
				this.ds.sync();
				this.ds.bind('requestEnd', function(e){
					// if(e.response) {
						banhji.view.mainView.showIn("#segment-list-container", banhji.view.listView);
					// }
				});
			}
			
		}
	});
	
	banhji.structure = kendo.observable({
		close 		: function() {
			window.history.back(-1);
			if(this.dataStore.hasChanges()) {
				this.dataStore.cancelChanges();
			}
		},
		dataStore 	: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: baseUrl + "structures",
					type: "GET",
					headers: {
						"Entity": getDB()
					},
					dataType: 'json'
				},
				create 	: {
					url: baseUrl + "structures",
					type: "POST",
					headers: {
						"Entity": getDB()
					},
					dataType: 'json'
				},
				update 	: {
					url: baseUrl + "structures",
					type: "PUT",
					headers: {
						"Entity": getDB()
					},
					dataType: 'json'
				},
				destroy : {
					url: baseUrl + "structures",
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
		segments 	: banhji.segment,
		segSelected : function(e) {
			if($(e.target).text() === "រើសមួយ") {
				$(e.target).text('រើសរួច');
				banhji.structure.get('current').segments.push({id: e.data.id, code_length: e.data.code_length, name: e.data.name});
			} else {
				$(e.target).text('រើសមួយ');
				$.each(this.get('current').segments, function(i, v){
					if(v.id === e.data.id) {
						banhji.structure.get('current').segments.splice(i, 1);
						return false;
					}
				});
			}
			
			console.log(this.get('current').segments.length);
			
		},
		setCurrent	: function(current) {
			this.set('current', current);
		},
		find 	 	: function(arg) {
			this.dataStore.query({
				filter: arg
			}).then(function(e){
				banhji.structure.setCurrent(banhji.structure.dataStore.data()[0]);
			});
		},
		save 		: function() {
			this.dataStore.sync();
			this.dataStore.bind('requestEnd', function(e){
				if(e.type !== 'read') {
					console.log('operation type ' + e.type + ' done successfully.');
					console.log(e.response);
				}
			});
		}
	});
	var role = kendo.observable({
		dataStore 	: new kendo.data.DataSource({
			transport: {
				read: {
					url: baseUrl + 'roles',
					dataType: 'json',
					headers: {
						"Entity": getDB()
					},
					type: 'GET'
				},
				create: {
					url: baseUrl + 'roles',
					dataType: 'json',
					headers: {
						"Entity": getDB()
					},
					type: 'GET'
				},
				update: {
					url: baseUrl + 'roles',
					dataType: 'json',
					headers: {
						"Entity": getDB()
					},
					type: 'GET'
				},
				destroy: {
					url: baseUrl + 'roles',
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
					url: baseUrl + 'roles/user',
					dataType: 'json',
					headers: {
						"Entity": getDB()
					},
					type: 'GET'
				},
				create: {
					url: baseUrl + 'roles/user',
					dataType: 'json',
					headers: {
						"Entity": getDB()
					},
					type: 'POST'
				},
				update: {
					url: baseUrl + 'roles/user',
					dataType: 'json',
					headers: {
						"Entity": getDB()
					},
					type: 'PUT'
				},
				destroy: {
					url: baseUrl + 'roles/user',
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
		company_name : JSON.parse(localStorage.getItem('userData/user'))!==null?JSON.parse(localStorage.getItem('userData/user')).institute[0].name:"",
		curDate   : function() {
			return Date();
		},
		cashBal   : 0,
		asset 	  : 0,
		liability : 0,
		equity 	  : 0,
	});

	banhji.account = kendo.observable({
		dataStore 	: dataStore(baseUrl + "accounts"),
		types 		: dataStore(baseUrl + 'accounts/types'),
		setCurrent 	: function(current) {
			this.set('current', current);
		},
		addNew 		: function() {
			this.dataStore.insert(0, {
				type: null,
				parentAccount: null,
				code: null,
				name: null,
				name_en: null,
				description: null
			});
			this.setCurrent(this.dataStore.at(0));
		},
		save 		: function() {
			this.dataStore.sync();
		}
	});
	banhji.journalEntry = kendo.observable({
		dataStore 	: dataStore(baseUrl + "entries"),
		contactDS 	: dataStore(baseUrl + "entries/contacts"),
		setCurrent 	: function(entryModel) {
			this.set("current", entryModel);
		},
		addContact 	: function(contact) {
			this.contactDS.add(contact);
		},
		addNew 		: function(entry) {
			this.dataStore.add(entry);
		},
		remove 		: function(entry) {
			this.dataStore.remove(entry);
		},
		delContact	: function(contact){
			this.contactDS.remove(contact);
		},
		getById 	: function(id) {
			var that = this;
			this.dataStore.query({
				filter 	: {field: 'id', value: id},
				take 	: 1
			}).then(function(e){
				that.set('current', that.dataStore.at(0));
			});
		},
		getAll 		: function(){
			this.dataStore.filter({
				field: 'deleted', value: false
			});
		},
		getDeleted 	: function() {
			this.dataStore.filter({
				field: 'deleted', value: true
			});
		},
		saveContact : function() {
			this.contactDS.sync();
		},
		save 		: function() {
			var that = this, dfd = $.Deferred();
			this.dataStore.sync();
			this.dataStore.bind('requestEnd', function(e){
				var res = e.response.results;
				if(res) {
					dfd.resolve({type: e.type, error: false, result: res});
				} else {
					dfd.reject({type: e.type, error: true, msg:"problem with api called."});
				}
			});
			return dfd.promise();
		}
	});


	//DAWINE -----------------------------------------------------------------------------------------	
	/*************************
	*   SME Section   *
	**************************/
	banhji.customerCenter = kendo.observable({
		transactionDS  		: dataStore(baseUrl + 'invoices/wtransaction'),
		contactDS 			: dataStore(baseUrl + 'contacts'),
		contactTypeDS		: dataStore(baseUrl + 'contacts/type'),
		noteDS 				: dataStore(baseUrl + 'notes'),		
		currencyDS 			: dataStore(baseUrl + 'currencies'),
		monthlyDS 			: dataStore(baseUrl + 'invoices/wmonthly'),
		outstandingDS 		: dataStore(baseUrl + "invoices/woutstanding"),		

		sortList			: [ 
	 		{ text:"ទាំងអស់", value: "all" }, 
	 		{ text:"ថ្ងៃនេះ", value: "today" }, 
	 		{ text:"សប្ដាស៍នេះ", value: "week" }, 
	 		{ text:"ខែនេះ", value: "month" }, 
	 		{ text:"ឆ្នាំនេះ", value: "year" } 
		],
		sorter 				: "year",
		sdate 				: "",
		edate 				: "",
				
		obj 				: null,
		note 				: "",		
		searchText 			: "",		
		contact_type_id 	: 0,
		currency_id 		: 0,
		user_id 			: banhji.userManagement.getLogin() === null ? '':banhji.userManagement.getLogin().id,

		balance 			: 0,
		deposit 			: 0,
		outInvoice 			: 0,
		overInvoice 		: 0,
		
		pageLoad 			: function(){		
												
		},
		loadOutStandingInvoice: function(id){
			var self = this;

			this.outstandingDS.query({
				filter: { field: "contact_id", value: id },
				page: 1,
				take: 100
			}).then(function(e) {
				var view = self.outstandingDS.view();

				self.set("deposit", kendo.toString(view[0].deposit, "c0", "km-KH"));
				self.set("outInvoice", kendo.toString(view[1].outInvoice, "n0"));
				self.set("overInvoice", kendo.toString(view[2].overInvoice, "n0"));
				self.set("balance", kendo.toString(view[3].balance, "c0", "km-KH"));
			});
		},
		loadTransaction 	: function(id){
			this.transactionDS.query({
			  	filter: { field:"contact_id", value: id },
			  	sort: { field: "issued_date", dir: "desc" },
			  	page: 1,
			  	take: 100
			});
		},
		loadBalance 		: function(){
			var obj = this.get("obj");

			this.transactionDS.query({
			  	filter: [
			  		{ field:"contact_id", operator:"invoice", value: obj.id },
			  		{ field:"type", operator:"where_in", value: ["Invoice", "wInvoice"] },
			  		{ field:"status", operator:"invoice", value: 0 },
			  		{ field:"id", operator:"payment", value: 0 }
			  	],
			  	sort: { field: "issued_date", dir: "desc" },
			  	page: 1,
			  	take: 100
			});
		},
		loadDeposit 		: function(){
			var obj = this.get("obj");

			this.transactionDS.query({
			  	filter: [
			  		{ field:"contact_id", operator:"payment", value: obj.id },
			  		{ field:"type", operator:"payment", value:"deposit" },			  		
			  		{ field:"id", operator:"invoice", value: 0 }
			  	],
			  	sort: { field: "issued_date", dir: "desc" },
			  	page: 1,
			  	take: 100
			});
		},
		loadOverInvoice 	: function(){
			var obj = this.get("obj");

			this.transactionDS.query({
			  	filter: [
			  		{ field:"contact_id", operator:"invoice", value: obj.id },
			  		{ field:"type", operator:"where_in", value: ["Invoice", "wInvoice"] },
			  		{ field:"status", operator:"invoice", value: 0 },
			  		{ field:"due_date <", operator:"invoice", value: kendo.toString(new Date(), "yyyy-MM-dd") },
			  		{ field:"id", operator:"payment", value: 0 }
			  	],
			  	sort: { field: "issued_date", dir: "desc" },
			  	page: 1,
			  	take: 100
			});
		},		
		loadNote 			: function(id){
			this.noteDS.query({
				filter: { field:"contact_id", value: id },
				sort: { field:"noted_date", dir:"desc" },
				page: 1,
				take: 100
			});
		},
		loadGraph 			: function(id){
			var self = this;

			this.monthlyDS.query({
				filter: { field: "contact_id", value: id },
				page: 1,
				take: 100
			}).then(function(e) {
			    var view = self.monthlyDS.view();
			    
				$('#wUsage-graph').kendoChart({
					dataSource: {data: view},												
					series: [
						{field: 'amount', categoryField:'month', type: 'line', axis: 'sale'},
						{field: 'usage', categoryField:'month', type: 'area', axis: 'usage'}
					],
					valueAxes: [
						{
		                    name: "sale",
		                    color: "#007eff",
		                    min: 0,
		                    majorUnit: 10000,
		                    max: 100000
		                }, 
		                {
		                    name: "usage",
		                    min: 0,	
		                    majorUnit: 5,		                   
		                    max: 50
		                }
	                ],
	                categoryAxis: {
	                    //categories: ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12"],		                    
	                    axisCrossingValues: [0, 13],
	                    justified: true
	                },
	                tooltip: {
	                    visible: true,
	                    format: "{0}",
	                    template: "#= series.field #: #= value #"
	                }
				});
			});		
		},		
		selectedRow			: function(e){
			var id = e.data.id,
			data = e.data;			
			
			this.set("obj", data);
			this.loadGraph(id);
			this.loadOutStandingInvoice(id);
			this.loadTransaction(id);			
			this.loadNote(id);
		},
		sorterChanges 		: function(){
			var value = this.get("sorter");

			switch(value){
			case "today":
				var today = new Date();
				
				this.set("sdate", today);
				this.set("edate", today);
			  					
			  	break;
			case "week":
			  	var thisWeek = new Date;
				var first = thisWeek.getDate() - thisWeek.getDay(); 
				var last = first + 6;

				var firstDayOfWeek = new Date(thisWeek.setDate(first));
				var lastDayOfWeek = new Date(thisWeek.setDate(last));				

				this.set("sdate", firstDayOfWeek);
				this.set("edate", lastDayOfWeek);
				
			  	break;
			case "month":
				var thisMonth = new Date;				  	
				var firstDayOfMonth = new Date(thisMonth.getFullYear(), thisMonth.getMonth(), 1);
				var lastDayOfMonth = new Date(thisMonth.getFullYear(), thisMonth.getMonth() + 1, 0);

				this.set("sdate", firstDayOfMonth);
				this.set("edate", lastDayOfMonth);

			  	break;
			case "year":
				var thisYear = new Date();
			  	var firstDayOfYear = new Date(thisYear.getFullYear(), 0, 1);
				var lastDayOfYear = new Date(thisYear.getFullYear(), 11, 31);

				this.set("sdate", firstDayOfYear);
				this.set("edate", lastDayOfYear);

			  	break;
			default:
				this.set("sdate", "");
				this.set("edate", "");					  
			}
		},
		enterSearch 		: function(e){
			e.preventDefault();

			this.search();
		},
		search 				: function(){
			var self = this, 
			para = [],
      		txtSearch = this.get("searchText"),       		
      		contact_type_id = this.get("contact_type_id"),
      		currency_id = this.get("currency_id");      		
      		
      		if(txtSearch){
      			para.push(      				
      				{ field: "number", operator: "like", value: txtSearch },
      				{ field: "surname", operator: "or_like", value: txtSearch },
					{ field: "name", operator: "or_like", value: txtSearch },
					{ field: "company", operator: "or_like", value: txtSearch }
      			);
      		}      		

      		if(contact_type_id){
      			para.push({ field: "contact_type_id", value: contact_type_id });
      		}

      		if(currency_id){
      			para.push({ field: "currency_id", value: currency_id });
      		}      		

      		this.contactDS.filter(para);
      		var loaded = false;
      		this.contactDS.bind("requestEnd", function(){
      			if(loaded==false){
      				loaded = true;

      				//Clear search filters
		      		self.set("searchText", "");		      		
		      		self.set("contact_type_id", 0);
		      		self.set("currency_id", 0);
      			}
      		});      			
		},
		searchTransaction	: function(){
			var self = this,
				start = kendo.toString(this.get("sdate"), "yyyy-MM-dd"),
        		end = kendo.toString(this.get("edate"), "yyyy-MM-dd"),	        		
        		para = [];

        	//Dates
        	if(start && end){
            	para.push({ field:"start_date", value: kendo.toString(start, "yyyy-MM-dd") });
            	para.push({ field:"end_date", value: kendo.toString(end, "yyyy-MM-dd") });            	            	
            }else if(start){
            	para.push({ field:"start_date", value: kendo.toString(start, "yyyy-MM-dd") });
            }else if(end){
            	para.push({ field:"end_date", value: kendo.toString(end, "yyyy-MM-dd") });
            }else{
            	
            }            

            this.transactionDS.query({
            	filter: para,
            	sort: { field: "issued_date", dir: "desc" },
            	page: 1,
            	pageSize: 100
            });            
		},	
		goEditContact 		: function(){
			var obj = this.get("obj");

			banhji.router.navigate('/customer/'+obj.id);
		},
		goEstimate			: function(){
			var obj = this.get("obj");

			banhji.router.navigate('/estimate');
			banhji.estimate.loadContact(obj.id);			
		},
		goSO				: function(){
			var obj = this.get("obj");

			banhji.router.navigate('/so');
			banhji.so.loadContact(obj.id);
		},
		goReceipt			: function(){
			var obj = this.get("obj");

			banhji.router.navigate('/receipt');
			banhji.receipt.loadContact(obj.id);
		},
		goInvoice			: function(){
			var obj = this.get("obj");

			banhji.router.navigate('/invoice');
			banhji.invoice.loadContact(obj.id);					
		},
		goGDN				: function(){
			var obj = this.get("obj");

			banhji.router.navigate('/gdn');
			banhji.gdn.loadContact(obj.id);
		},
		goStatement			: function(){
			var obj = this.get("obj");

			banhji.router.navigate('/statement');
			banhji.statement.loadContact(obj.id);
		},
		saveNote 			: function(){
			var self = this;

			if(this.get("note")!==""){
				this.noteDS.insert(0, {
					contact_id 	: this.get("obj").id,
					note 		: this.get("note"),
					noted_date	: new Date(),
					created_by 	: this.get("user_id"),

					creator 	: ""
				});
				var saved = false;
				this.noteDS.sync();
				this.noteDS.bind("requestEnd", function(){
					if(saved==false){
						saved = true;

						self.set("note", "");
					}
				});
			}else{
				alert("ត្រូវការ កំណត់សំគាល់");
			}
		}		
	});

	banhji.customer = kendo.observable({
		dataSource 				: dataStore(baseUrl + "contacts"),
		deleteDS 				: dataStore(baseUrl + "invoices"),
		delete2DS 				: dataStore(baseUrl + "meters"),
		existEMeterDS 			: dataStore(baseUrl + "meters"),
		existWMeterDS 			: dataStore(baseUrl + "meters"),
		existingDS 				: dataStore(baseUrl + "contacts"),
		EExistingDS 			: dataStore(baseUrl + "contacts"),
		WExistingDS 			: dataStore(baseUrl + "contacts"),
		branchDS  				: dataStore(baseUrl + "contacts/branch"),
		contactPersonDS			: dataStore(baseUrl + "contact_persons"),
		currencyDS 				: dataStore(baseUrl + "currencies"),
		paymentTermDS			: dataStore(baseUrl + "payment_terms"),
		paymentMethodDS			: dataStore(baseUrl + "payment_methods"),

		genders					: ["M", "F"],
		statusList 				: [            
			{ "id": 1, "name": "កំពុងប្រើប្រាស់" },
			{ "id": 2, "name": "ផ្អាក់ប្រើប្រាស់" },
			{ "id": 0, "name": "ឈប់ប្រើប្រាស់" }
        ],

        obj 					: null,       
		originalNo				: null,
		originalENo				: null,
		originalWNo				: null,		
		
		isDuplicateNumber 		: false,
		isDuplicateENumber 		: false,
		isDuplicateWNumber 		: false,

		isCompany 				: false,
		isEdit 					: false,
		hasEMeter 				: false,
		hasWMeter 				: false,		
		
		pageLoad 				: function(id){						
			if(id){
				this.set("isEdit", true);						
				this.loadCustomer(id);
				this.loadContactPerson(id);
				this.checkCustomerEMeter(id);
				this.checkCustomerWMeter(id);
			}else{
				this.set("isEdit", false);
				this.set("hasEMeter", false);
				this.set("hasWMeter", false);				
				this.addEmpty();				
			}			
		},
		checkCustomerEMeter 		: function(id){
			var self = this;

			this.existEMeterDS.query({
			  	filter: [
			  		{ field: "contact_id", value: id },
			  		{ field: "utility_id", value: 1 }
			  	],
			  	page: 1,
			  	take: 1
			}).then(function() {
				var view = self.existEMeterDS.view();

				if(view.length>0){
					self.set("hasEMeter", true);
				}else{
					self.set("hasEMeter", false);
				}
			});

		},
		checkCustomerWMeter 		: function(id){
			var self = this;

			this.existWMeterDS.query({
			  	filter: [
			  		{ field: "contact_id", value: id },
			  		{ field: "utility_id", value: 2 }
			  	],
			  	page: 1,
			  	take: 1
			}).then(function() {
				var view = self.existWMeterDS.view();

				if(view.length>0){
					self.set("hasWMeter", true);
				}else{
					self.set("hasWMeter", false);
				}
			});

		},
		loadCustomer 			: function(id){
			var self = this;

			this.dataSource.query({
				filter: { "field":"id", value: id },
				page: 1,
				pageSize: 100
			}).then(function(e){
				var view = self.dataSource.view();

				if(view[0].contact_type_id=="6" || view[0].contact_type_id=="7" || view[0].contact_type_id=="8"){
					self.set("isCompany", true);
				}else{
					self.set("isCompany", false);
				}

				self.set("obj", view[0]);
				self.loadMap();
				self.set("originalNo", view[0].number);
				self.set("originalENo", view[0].enumber);
				self.set("originalWNo", view[0].wnumber);								
			});
		},
		loadContactPerson		: function(id){
			this.contactPersonDS.query({
				filter: { "field":"contact_id", value: id },
				page: 1,
				pageSize: 100
			});
		},
		loadMap 				: function(){
			var obj = this.get("obj"), lat = kendo.parseFloat(obj.latitute),
			lng = kendo.parseFloat(obj.longtitute);
			
			if(lat && lng){
				var myLatLng = {lat:lat, lng:lng};
				var mapOptions = {
					zoom: 17,					
					center: myLatLng,
					mapTypeControl: false,
					zoomControl: false,
					scaleControl: false,
					streetViewControl: false
				};
				var map = new google.maps.Map(document.getElementById('map'),mapOptions);
				var marker = new google.maps.Marker({
					position: myLatLng,
					map: map,
					title: obj.number
				});
			} 
		},
		copyBillTo 				: function(){
			var obj = this.get("obj");

			obj.set("ship_to", obj.bill_to);
		},      	
		checkExistingNumber 	: function(){
			var self = this;	
			
			var number = this.get("obj").number;
			var originalNo = this.get("originalNo");
			
			if(number.length>0 && number!==originalNo){
				this.existingDS.query({
					filter: { field:"number", value: number },
					page: 1,
					pageSize: 100
				}).then(function(e){
					var view = self.existingDS.view();
					
					if(view.length>0){
				 		self.set("isDuplicateNumber", true);						
					}else{
						self.set("isDuplicateNumber", false);
					}
				});							
			}else{
				this.set("isDuplicateNumber", false);
			}			
		},
		checkExistingENumber 	: function(){
			var self = this;	
			
			var number = this.get("obj").enumber;
			var originalNo = this.get("originalENo");
			
			if(number.length>0 && number!==originalNo){
				this.EExistingDS.query({
					filter: { field:"enumber", value: number },
					page: 1,
					pageSize: 100
				}).then(function(e){
					var view = self.existingDS.view();
					
					if(view.length>0){
				 		self.set("isDuplicateENumber", true);						
					}else{
						self.set("isDuplicateENumber", false);
					}
				});							
			}else{
				this.set("isDuplicateENumber", false);
			}			
		},
		checkExistingWNumber 	: function(){
			var self = this;	
			
			var number = this.get("obj").wnumber;
			var originalNo = this.get("originalWNo");
			
			if(number.length>0 && number!==originalNo){
				this.WExistingDS.query({
					filter: { field:"wnumber", value: number },
					page: 1,
					pageSize: 100
				}).then(function(e){
					var view = self.existingDS.view();
					
					if(view.length>0){
				 		self.set("isDuplicateWNumber", true);						
					}else{
						self.set("isDuplicateWNumber", false);
					}
				});							
			}else{
				this.set("isDuplicateWNumber", false);
			}			
		},
		addEmptyContactPerson 	: function(){
			var contact_id = 0;
			if(this.get("isEdit")){
				contact_id = this.get("obj").id;
			}

			this.contactPersonDS.add({					 			
				contact_id 			: contact_id,
      			prefix 				: "",      			
				name 				: "",
				department			: "",
				phone				: "",
				email				: ""
			});								
		},
		deleteContactPerson 	: function(e){
			if (confirm("តើលោកអ្នកពិតជាចង់លុបមែនឬទេ?")) {
				var d = e.data,
				obj = this.contactPersonDS.getByUid(d.uid);

				this.contactPersonDS.remove(obj);
			}
		},
      	addEmpty 				: function(){
			this.set("isEdit", false);
        	this.dataSource.data([]);

      		if(this.dataSource.total()==0){
				this.dataSource.add({
					"company_id" 			: 0,
					"ebranch_id" 			: 0,
					"elocation_id"			: 0,
					"wbranch_id" 			: 0,
					"wlocation_id" 			: 0,			
					"currency_id" 			: 0,
					"user_id" 				: 0,
					"contact_type_id" 		: 0,							
					"number"				: "",
					"enumber"				: "",
					"wnumber"				: "",
					"surname"				: "",
					"name"					: "",
					"gender"				: "M",
					"dob"					: "",
					"pob"					: "",				
					"family_member"			: "",
					"id_number"				: "",
					"phone" 				: "",
					"email" 				: "",			
					"job"					: "",
					"company"				: "",
					"company_en"			: "",		
					"business_type_id"		: 0,
					"vat_no"				: "",				
					"image_url"				: "",
					"memo"					: "",
					"address" 				: "",
					"bill_to" 				: "",
					"ship_to" 				: "",
					"latitute" 				: "",
					"longtitute" 			: "",														
					"payment_term_id"		: 0,
					"payment_method_id"		: 0,
					"credit_limit"			: 0,				
					"registered_date" 		: new Date(),
					"contact_account_id"	: 0,
					"ra_id"					: 0,
					"tax_account_id"		: 0,
					"deposit_account_id"	: 0,
					"discount_account_id"	: 0,
					"phase_id"				: 0,
					"voltage_id"			: 0,
					"ampere_id"				: 0,			
					"use_electricity"		: false,
					"use_water"				: false,
					"status"				: 1			
				});
			}

			var data = this.dataSource.data();			
			var obj = data[data.length - 1];			
			this.set("obj", obj);	
		},		
		save 					: function(){			
			var self = this, saved = false;

			if(this.get("isEdit")){
				this.contactPersonDS.sync();
			}

			this.dataSource.sync();			
			this.dataSource.bind("requestEnd", function(e){				
				if(e.type=="create" && saved==false){					
					saved = true;

					self.saveContactPerson();					
					self.addEmpty();															
				}

				if(e.type=="update" && saved==false){
					saved = true;
					
				}

				if(e.type=="destroy" && saved==false){
					saved = true;
										
					window.history.back();
				}
			});			
		},
		delete 					: function(){
			var self = this,
			obj = this.get("obj"),
			id = obj.id;

			if (confirm("តើលោកអ្នកពិតជាចង់លុបមែនឬទេ?")) {
				if(obj.use_electricity=="false" && obj.use_water=="false"){
					this.deleteDS.query({
					  	filter: { field: "contact_id", value: id },
					  	page: 1,
					  	take: 1
					}).then(function() {
						var view = self.deleteDS.view();

						if(view.length>0){
							alert("សួមអភ័យទោស! លោកអ្នកពុំអាចលុបទិន្នន័យដែលកំពុងប្រើប្រាស់បានទេ។");
						}else{
							var data = self.dataSource.get(id);
					        self.dataSource.remove(data);
					        self.save();
						}
					});
				}else{
					this.delete2DS.query({
					  	filter: { field: "contact_id", value: id },
					  	page: 1,
					  	take: 1
					}).then(function() {
						var view = self.delete2DS.view();

						if(view.length>0){
							alert("សួមអភ័យទោស! លោកអ្នកពុំអាចលុបទិន្នន័យដែលកំពុងប្រើប្រាស់បានទេ។");
						}else{
							var data = self.dataSource.get(id);
					        self.dataSource.remove(data);
					        self.save();
						}
					});
				}								
	    	}
		},
		cancel 					: function(){
			this.dataSource.cancelChanges();
			this.contactPersonDS.cancelChanges();

			window.history.back();
		},
		saveContactPerson 		: function(id){
			$.each(this.contactPersonDS.data(), function(index, value) {
				value.set("contact_id", id);
			});

			this.contactPersonDS.sync();
		}
	});
	
	banhji.invoice =  kendo.observable({
		dataSource 			: dataStore(baseUrl + "invoices"),
		lineDS  			: dataStore(baseUrl + "invoices/line"),			
		contactDS  			: dataStore(baseUrl + "contacts"),
		referenceDS			: dataStore(baseUrl + "invoices"),
		referenceLineDS		: dataStore(baseUrl + "invoices/line"),					
		itemDS 				: dataStore(baseUrl + "items"),
		catalogDS			: dataStore(baseUrl + "items"),
		assemblyDS			: dataStore(baseUrl + "items/assembly"),
		vatDS 				: dataStore(baseUrl + "items"),		
		paymentMethodDS 	: dataStore(baseUrl + "payment_methods"),			
		segmentItemDS		: banhji.segmentItem.ds,

		itemList 			: [],
		referenceTypes 		: [
			{ id:"Estimate", name:"សម្រង់តម្លៃ" },
			{ id:"SO", name:"បញ្ជាលក់" },
			{ id:"GDN", name:"លិខិតដឹកជញ្ជូន" }
		],
		
		obj 				: null,
		isEdit 				: false,

		biller_id			: banhji.userManagement.getLogin() === null ? 0 : banhji.userManagement.getLogin().id,			
		paid 				: false,		
		bolReference 		: false,

		sub_total 			: 0,
		vat 				: 0,
		total 				: 0,				
								
		pageLoad 			: function(id){			
			if(id){
				this.set("isEdit", true);							
				this.loadInvoice(id);
			}else{				
				this.set("isEdit", false);
				this.set("paid", false);
				this.addEmpty();								
			}  																							
		},	    
	    loadContact 		: function(id){
			var self = this;			

			this.contactDS.query({    			
				filter: { field:"id", value: id },
				page: 1,
				take: 100
			}).then(function(e){
				var view = self.contactDS.view(),
				obj = self.get("obj");
		    	
		    	obj.set("contact_id", view[0].id);
		    	obj.set("payment_term_id", view[0].payment_term_id);
		    	obj.set("vat_id", view[0].tax_item_id);		    			  				  											
				obj.set("locale", view[0].currency[0].locale);
				obj.set("bill_to", view[0].bill_to);				
			});				
		},					
		loadReference 		: function(e){			
			var obj = this.get("obj");

			if(obj.reference_type!==""){
				this.set("bolReference", true);

				this.referenceDS.filter([
					{ field: "contact_id", value: obj.contact_id },
					{ field: "status", value: 0 },
					{ field: "type", value: obj.reference_type }
				]);				
			}else{
				this.set("bolReference", false);
			}							
		},			
		loadInvoice 		: function(id){
			var self = this;			

			this.dataSource.query({    			
				filter: { field:"id", value: id },
				page: 1,
				take: 100
			}).then(function(e){
				var obj = self.dataSource.view()[0];								    	
				
				//Status
				if(obj.status==1){
					self.set("paid", true);
				}else{
					self.set("paid", false);
				}

				self.set("sub_total", kendo.toString(obj.sub_total, "c", obj.locale));
		        self.set("vat", kendo.toString(obj.vat, "c", obj.locale));
		        self.set("total", kendo.toString(obj.amount, "c", obj.locale));	  			
								
				self.contactDS.filter({ field: "id", value: obj.contact_id });				
				self.lineDS.filter({ field: "invoice_id", value: obj.id });
				self.set("obj", obj);
			});				
		},
		getRate 			: function(){
			var rate = 1, obj = this.get("obj"),
			contact = this.contactDS.get(obj.contact_id);

			rate = banhji.currency.getAmount(banhji.institute.locale) / banhji.currency.getAmount(contact.currency[0].locale);			

			return rate;		
		},
		setItem 			: function(){
			var self = this;

			this.itemDS.query({
				filter: [
					{ field:"item_type_id", operator:"where_not_in", value: 6 },
					{ field:"status", value: 1 }
				],
				page: 1,
				take: 100
			}).then(function(){
				var view = self.itemDS.view();

				$.each(view, function(index, value){
					self.itemList.push(value);
				});
			});
		},			
		addEmpty 		 	: function(){
			if(this.dataSource.total()==0){
				var duedate = new Date();
				duedate.setDate(duedate.getDate()+7);
				this.set("obj", null);				

				this.dataSource.add({
					company_id 			: 0,
					location_id 		: 0,
					contact_id 			: "",
					payment_term_id		: 0,
					payment_method_id 	: 0,
					reference_id 		: 0,
					cash_account_id 	: 0,
					vat_id 				: 0,
					biller_id 			: this.get("biller_id"),
	 	    		number 				: "",
				   	type				: "Invoice",
				   	sub_total 			: 0,				   		   					   				   	
				   	amount				: 0,
				   	vat 				: 0,
				   	rate				: 1,			   	
				   	locale 				: "km-KH",			   	
				   	issued_date 		: new Date(),
				   	due_date 			: duedate,
				   	check_no 			: "",
				   	bill_to 			: "",
				   	ship_to 			: "",
				   	memo 				: "",
				   	memo2 				: "",
				   	status 				: 0,

				   	segments 			: []				
		    	});		    		
				
				var data = this.dataSource.data();
				var obj = data[data.length-1];			
				this.set("obj", obj);

				this.addRow();  
			}
		},
		addRow 				: function(){				
			var invoice_id = 0, obj = this.get("obj");
			if(this.get("isEdit")){
				invoice_id = obj.id;
			}
						
			this.lineDS.add({					
				invoice_id 			: invoice_id,
				item_id 			: "",
				measurement_id 		: 0,
				meter_record_id	 	: 0,
				description 		: "",				
				unit 	 			: 1,
				price 				: 0,												
				amount 				: 0,
				rate				: 1,
				locale				: obj.locale,
				has_vat 			: false,
				type 				: "",

				priceList 			: []
			});																	
		},		
		removeRow 			: function(e){						
			var d = e.data;				
			this.lineDS.remove(d);
	        this.changes();		        
		},
		changes				: function(){
			var obj = this.get("obj");

			if(this.lineDS.total()>0){			
				var total = 0, subTotal = 0, vat = 0, vatAmt = 0;
								
				if(kendo.parseInt(obj.vat_id)>0){
					var selectedVat = this.vatDS.get(obj.vat_id);					
					vatAmt = kendo.parseFloat(selectedVat.price_list[0].price);
				}								

				$.each(this.lineDS.data(), function(index, value) {				
					var amt = value.unit * value.price;
					subTotal += amt;

					value.set("amount", amt);

					if(value.has_vat){
						vat += amt * vatAmt;						
					}
		        });

		        total = subTotal + vat;			

		        this.set("sub_total", kendo.toString(subTotal, "c", obj.locale));
		        this.set("vat", kendo.toString(vat, "c", obj.locale));
		        this.set("total", kendo.toString(total, "c", obj.locale));

		        obj.set("sub_total", subTotal);
		        obj.set("vat", vat);			
				obj.set("amount", total);									    	
	    	}else{
	    		this.set("sub_total", kendo.toString(0, "c", obj.locale));
		        this.set("vat", kendo.toString(0, "c", obj.locale));
		        this.set("total", kendo.toString(0, "c", obj.locale));

		        obj.set("sub_total", 0);
		        obj.set("vat", 0);			
				obj.set("amount", 0);				
	    	}   	
		},
		contactChanges 		: function(e){	    	
	    	if(e.sender.selectedIndex>0){
		    	var obj = this.get("obj"), company_id = 0,		    	
		    	contact = this.contactDS.get(obj.contact_id);		    	
		    	
		    	obj.set("payment_term_id", contact.payment_term_id);
		    	obj.set("vat_id", contact.tax_item_id);
		    	obj.set("locale", contact.currency[0].locale);
		    	obj.set("bill_to", contact.bill_to);		    		    			
				
		    	this.lineDS.data([]);
		    	this.addRow();		    	
		    	this.changes();
	    	}
	    },
	    segmentChanges 		 : function(e) {
			var obj = this.get("obj"),
			dataArr = obj.segments,
			lastIndex = dataArr.length - 1,
			last = banhji.segmentItem.ds.at(dataArr[lastIndex]);

			if(dataArr.length > 1) {
				for(var i = 0; i < dataArr.length - 1; i++) {
					var current_index = dataArr[i],
					current = banhji.segmentItem.ds.at(current_index);

					if(current.segment_id === last.segment_id) {
						dataArr.splice(lastIndex, 1);
						break;
					}
				}
			}				
		},
		itemChanges 		: function(e){								
			var self = this, 
			data = e.data,
			invoice_id = 0, 
			obj = this.get("obj"), 
			item = this.itemDS.get(data.item_id),
			contact = this.contactDS.get(obj.contact_id);

			if(data.item_id>0 && obj.contact_id>0){		        
		        if(item.category_id=="8"){
		        	this.catalogDS.query({
		        		filter: { field:"id", operator:"where_in", value:item.catalogs.split(",") }
		        	}).then(function(){
		        		self.lineDS.remove(data);

		        		$.each(self.catalogDS.view(), function(index, value){
		        			var rate = kendo.parseFloat(contact.currency[0].rate)/kendo.parseFloat(value.price_list[0].currency[0].rate);

					        if(self.get("isEdit")){
								invoice_id = obj.id;
							}
										
							self.lineDS.add({					
								invoice_id 			: invoice_id,
								item_id 			: value.id,
								measurement_id 		: value.price_list[0].measurement_id,
								meter_record_id	 	: 0,
								description 		: value.name,				
								unit 	 			: 1,
								price 				: value.price_list[0].price*rate,												
								amount 				: value.price_list[0].price*rate,
								rate				: rate,
								locale				: obj.locale,
								has_vat 			: false,
								type 				: "",

								priceList 			: value.price_list
							});								
		        		});

		        		self.changes();
		        	});
		        }else if(item.category_id=="9"){
		        	var rate = kendo.parseFloat(contact.currency[0].rate)/kendo.parseFloat(item.price_list[0].currency[0].rate);

		    		data.set("description", item.name);	    		
			        data.set("price", item.price*rate);
			        data.set("measurement_id", 0);
			        data.set("rate", rate);		        	        
			        data.set("priceList", []);

			        this.changes();		     
		        }else{
		        	var rate = kendo.parseFloat(contact.currency[0].rate)/kendo.parseFloat(item.price_list[0].currency[0].rate);

		    		data.set("description", item.name);	    		
			        data.set("price", item.price_list[0].price*rate);
			        data.set("measurement_id", item.price_list[0].measurement_id);
			        data.set("rate", rate);		        	        
			        data.set("priceList", item.price_list);

			        this.changes();
		    	}		        
	        }else{
	        	alert("សូមជ្រើសអតិថិជន");
	        }	                	        	
		},
		measurementChanges 	: function(e){								
			var self = this, data = e.data, obj = this.get("obj");

			if(data.measurement_id>0){				
				var contact = this.contactDS.get(obj.contact_id);				

				$.each(data.priceList, function(index, value){
					if(value.measurement_id==data.measurement_id){
						var rate = kendo.parseFloat(contact.currency[0].rate)/kendo.parseFloat(value.currency[0].rate);
				        data.set("price", kendo.parseFloat(value.price)*rate);				       			       
				        data.set("rate", rate);

						return false;
					}
				});	    		
		        	        
		        this.changes();
	        }	                	        	
		},
		referenceChange 	: function(e){
			var self = this, obj = this.get("obj");
			
			if(obj.reference_id>0){
				var ref = this.referenceDS.get(obj.reference_id);
				obj.set("vat_id", ref.vat_id);

			 	this.referenceLineDS.query({
			 		filter: { field:"invoice_id", value: obj.reference_id },
			 		page: 1,
			 		take: 100
			 	}).then(function(){
			 		var view = self.referenceLineDS.view();					

			 		self.lineDS.data([]);
			 		$.each(view, function(index, value){
			 			self.lineDS.add({					
							invoice_id 			: obj.invoice_id,
							item_id 			: value.item_id,
							measurement_id 		: value.measurement_id,
							meter_record_id	 	: value.meter_record_id,
							description 		: value.description,				
							unit 	 			: value.unit,
							price 				: value.price,												
							amount 				: value.amount,
							rate				: value.rate,
							locale				: value.locale,
							has_vat 			: value.has_vat,
							type 				: value.type,

							priceList 			: value.priceList
						});
			 		});

			 		self.changes();
			 	});			 				 				 				 				
			}								
		},
		save 				: function(){				
	    	var self = this, obj = this.get("obj"), rate = this.getRate();

	    	obj.set("sub_total", kendo.parseFloat(obj.sub_total)*rate);
	    	obj.set("vat", kendo.parseFloat(obj.vat)*rate);
	        obj.set("amount", kendo.parseFloat(obj.amount)*rate);
	        obj.set("rate", rate);	        
	       
			//Update references
			if(obj.reference_id>0){
				var ref = this.referenceDS.get(obj.reference_id);
				ref.set("status", 1);
				this.referenceDS.sync();
			}
	    	
	    	if(this.get("isEdit")){
	    		this.dataSource.sync();
	    		this.lineDS.sync();
	    	}else{
	    		//Add brand new invoice
				this.invoiceSync()
				.then(function(invoice){
					$.each(self.lineDS.data(), function(index, value){										
						value.set("invoice_id", invoice[0].id);
						value.set("rate", rate);
					});
					self.lineDS.sync();
					self.addJournal(invoice[0].id);								
				}).then(function(){
					self.dataSource.data([]);
					self.lineDS.data([]);
										
					self.set("sub_total", 0);
					self.set("vat", 0);
					self.set("total", 0);
					self.addEmpty();
				});
			}
		},
		cancel 				: function(){
			this.dataSource.cancelChanges();
			this.lineDS.cancelChanges();
			window.history.back();
		},	    
	    //Create
	    invoiceSync 		: function(){
	    	var dfd = $.Deferred();	        

	    	this.dataSource.sync();
		    this.dataSource.bind("requestEnd", function(e){			    	
				dfd.resolve(e.response.results);    				
		    });

		    return dfd;	    		    	
	    },	    
	    clear 				: function(){	   	    	
	    	this.set("isEdit", false);
	    	this.set("paid", false);
	    	
			this.set("sub_total", 0);
			this.set("vat", 0);	
			this.set("total", 0);				
	    },
	    //Journal
	    getItemAccount 		: function(type, item_id){
	    	var self = this,	    	
	    	id = 0,
	    	item = this.itemDS.get(item_id);	    	
	    	
	    	if(item.accounts){
		    	$.each(item.accounts, function(index, value){
		    		if(value.type==type){
		    			id = value.id;

		    			return false;
		    		}
		    	});
	    	}	    	

	    	return kendo.parseInt(id);	    	
	    },	    
	    addJournal 			: function(invoice_id){
	    	var self = this,
	    	invoice = this.get("obj"),
	    	customer = this.contactDS.get(invoice.contact_id),
			rate = invoice.rate,
	    	entries = [],
	    	saleList = {},
	    	inventoryList = {},
			cogsList = {},
			witdrawList = {},
			depositAmount = 0;
			
			//Arrange sale, cogs, inventory, customer deposit or widraw
			$.each(this.lineDS.data(), function(index, value){										
				var item = self.itemDS.get(value.item_id),
				amt = value.unit*value.price;

				//Add sale list
				var incomeID = self.itemDS.get(value.item_id).income_account_id;																				
				if(incomeID>0){
					if(saleList[incomeID]===undefined){
						saleList[incomeID]={"id": incomeID, "amt": amt};						
					}else{											
						if(saleList[incomeID].id===incomeID){
							saleList[incomeID].amt += amt;
						}else{
							saleList[incomeID]={"id": incomeID, "amt": amt};
						}
					}
				}								

				switch(kendo.parseInt(item.item_type_id)){		        
					case 1: //Inventory
					
						//Add cogs list
						var itemCost = value.unit*item.cost;
						var cogsID = self.itemDS.get(value.item_id).cogs_account_id;
						if(cogsList[cogsID]===undefined){
							cogsList[cogsID]={"id": cogsID, "amt": itemCost};						
						}else{											
							if(cogsList[cogsID].id===cogsID){
								cogsList[cogsID].amt += itemCost;
							}else{
								cogsList[cogsID]={"id": cogsID, "amt": itemCost};
							}
						}						

						//Add inventory list
						var inventoryID = self.itemDS.get(value.item_id).inventory_account_id;
						if(inventoryList[inventoryID]===undefined){
							inventoryList[inventoryID]={"id": inventoryID, "amt": itemCost};						
						}else{											
							if(inventoryList[inventoryID].id===inventoryID){
								inventoryList[inventoryID].amt += itemCost;
							}else{
								inventoryList[inventoryID]={"id": inventoryID, "amt": itemCost};
							}
						}										

					  	break;
					case 5: //Customer Deposit
						depositAmount += amt;
						var depositID = customer.deposit_account_id;

						if(amt>0){ //Deposit														
							if(saleList[depositID]===undefined){
								saleList[depositID]={"id": depositID, "amt": amt};						
							}else{											
								if(saleList[depositID].id===depositID){
									saleList[depositID].amt += amt;
								}else{
									saleList[depositID]={"id": depositID, "amt": amt};
								}
							}																			
						}else{ //Witdraw												
							if(witdrawList[depositID]===undefined){
								witdrawList[depositID]={"id": depositID, "amt": amt*-1};						
							}else{											
								if(witdrawList[depositID].id===depositID){
									witdrawList[depositID].amt += (amt*-1);
								}else{
									witdrawList[depositID]={"id": depositID, "amt": amt*-1};
								}
							}														
						}

					  	break;					
					default:
				  	//default here
				} //End Swtich
			});//End Foreach Loop

			//VAT			
			if(invoice.vat_id>0){				
				var vatOutID = self.vatDS.get(invoice.vat_id).income_account_id;
				
				if(vatOutID>0){
					var vatAmt = kendo.parseFloat(invoice.vat)*rate;
					if(saleList[vatOutID]===undefined){
						saleList[vatOutID]={"id": vatOutID, "amt": vatAmt};						
					}else{											
						if(saleList[vatOutID].id===vatOutID){
							saleList[vatOutID].amt += vatAmt;
						}else{
							saleList[vatOutID]={"id": vatOutID, "amt": vatAmt};
						}
					}
				}
			}			
			
			//Sale list	to journal		
			if(!jQuery.isEmptyObject(saleList)){								
				//Sum cash
				var cash = 0;				
				$.each(saleList, function(index, value){					
					cash += value.amt;					
				});				

				//A/R on Dr
				entries.push({
					amount  : cash*rate,
					memo 	: "វិក្កយបត្រ",
					is_debit: true,
					account : { id: customer.contact_account_id },
					rate 	: rate,
					locale 	: invoice.locale,
					issuedDate: invoice.issued_date,
					segment : invoice.segments,
					contact : customer
				});					

				//Sale accounts on Cr
				$.each(saleList, function(index, value){
					entries.push({
						amount  : value.amt*rate,
						memo 	: "វិក្កយបត្រ",
						is_debit: false,
						account : { id: value.id },
						rate 	: rate,
						locale 	: invoice.locale,
						issuedDate: invoice.issued_date,
						segment : invoice.segments,
						contact : customer
					});							
				});
			}

			//Inventory to journal
			//COGS on Dr 			
			if(!jQuery.isEmptyObject(cogsList)){							
				$.each(cogsList, function(index, value){				
					entries.push({
						amount  :  value.amt*rate,
						memo 	: "វិក្កយបត្រ",
						is_debit: true,
						account : { id: value.id },
						rate 	: rate,
						locale 	: invoice.locale,
						issuedDate: invoice.issued_date,
						segment : invoice.segments,
						contact : customer
					});					
				});							
			}
			//Inventory on Cr
			if(!jQuery.isEmptyObject(inventoryList)){
				$.each(inventoryList, function(index, value){					
					entries.push({
						amount  :  value.amt*rate,
						memo 	: "វិក្កយបត្រ",
						is_debit: false,
						account : { id: value.id },
						rate 	: rate,
						locale 	: invoice.locale,
						issuedDate: invoice.issued_date,
						segment : invoice.segments,
						contact : customer
					});					
				});
			}
			
			//Witdraw to journal
			if(!jQuery.isEmptyObject(witdrawList)){
				//Deposit on Dr
				$.each(witdrawList, function(index, value){
					entries.push({
						amount  :  value.amt*rate,
						memo 	: "វិក្កយបត្រ",
						is_debit: true,
						account : { id: value.id },
						rate 	: rate,
						locale 	: invoice.locale,
						issuedDate: invoice.issued_date,
						segment : invoice.segments,
						contact : customer
					});						
				});

				var wCash = 0;
				$.each(witdrawList, function(index, value){					
					wCash += value.amt;
				});

				//Cash on Cr
				entries.push({
					amount  :  wCash*rate,
					memo 	: "វិក្កយបត្រ",
					is_debit: false,
					account : { id: invoice.cash_account_id },
					rate 	: rate,
					locale 	: invoice.locale,
					issuedDate: invoice.issued_date,
					segment : invoice.segments,
					contact : customer
				});							
			}
			//Customer deposit
			if(depositAmount>0){
				this.paymentDS.add({
					company_id 	: invoice.company_id,
					contact_id 	: customer.id,
					reference_id: invoice_id,
					cashier 	: this.get("biller_id"),
					type 		: "deposit",
					amount 		: depositAmount,
					fine 		: 0,
					discount 	: 0,
					payment_date: invoice.issued_date,
					locale 		: invoice.locale,
					rate 		: invoice.rate,
					deleted 	: false
				});				
			}
			
			//Add journal to datasource
			banhji.journalEntry.addNew({
				reference: { id: invoice_id },
				type: invoice.type,
				memo: invoice.type,
				issuedDate: invoice.issued_date,
				contact: {id: banhji.userManagement.getLogin().id, name: banhji.userManagement.getLogin().username},
				entries: entries
			});			
			banhji.journalEntry.save();			
		}	 		
	});
	banhji.receipt =  kendo.observable({
		dataSource 			: dataStore(baseUrl + "invoices"),
		lineDS  			: dataStore(baseUrl + "invoices/line"),			
		contactDS  			: dataStore(baseUrl + "contacts"),
		referenceDS			: dataStore(baseUrl + "invoices"),
		referenceLineDS		: dataStore(baseUrl + "invoices/line"),					
		itemDS 				: dataStore(baseUrl + "items"),
		catalogDS			: dataStore(baseUrl + "items"),
		assemblyDS			: dataStore(baseUrl + "items/assembly"),
		vatDS 				: dataStore(baseUrl + "items"),		
		paymentMethodDS 	: dataStore(baseUrl + "payment_methods"),
		cashAccountDS		: dataStore(baseUrl + "accounts"),
		paymentDS 			: dataStore(baseUrl + "payments"),		
		segmentItemDS		: banhji.segmentItem.ds,

		itemList 			: [],
		referenceTypes 		: [
			{ id:"Estimate", name:"សម្រង់តម្លៃ" },
			{ id:"SO", name:"បញ្ជាលក់" },
			{ id:"GDN", name:"លិខិតដឹកជញ្ជូន" },
			{ id:"Invoice", name:"វិក្កយបត្រ" }
		],
		
		obj 				: null,
		isEdit 				: false,

		biller_id			: banhji.userManagement.getLogin() === null ? 0 : banhji.userManagement.getLogin().id,			
		paid 				: false,		
		bolReference 		: false,

		sub_total 			: 0,
		vat 				: 0,
		total 				: 0,

		pageLoad 			: function(id){			
			if(id){
				this.set("isEdit", true);							
				this.loadInvoice(id);
			}else{				
				this.set("isEdit", false);
				this.set("paid", false);
				this.addEmpty();								
			}  																							
		},	    
	    loadContact 		: function(id){
			var self = this;			
			console.log(id);
			this.contactDS.query({    			
				filter: { field:"id", value: id },
				page: 1,
				take: 100
			}).then(function(e){
				var view = self.contactDS.view(),
				obj = self.get("obj");
		    	
		    	obj.set("contact_id", view[0].id);
		    	obj.set("payment_method_id", view[0].payment_method_id);
		    	obj.set("vat_id", view[0].tax_item_id);		    			  				  											
				obj.set("locale", view[0].currency[0].locale);
				obj.set("bill_to", view[0].bill_to);				
			});				
		},					
		loadReference 		: function(e){			
			var obj = this.get("obj");

			if(obj.reference_type!==""){
				this.set("bolReference", true);

				this.referenceDS.filter([
					{ field: "contact_id", value: obj.contact_id },
					{ field: "status", value: 0 },
					{ field: "type", value: obj.reference_type }
				]);				
			}else{
				this.set("bolReference", false);
			}							
		},			
		loadInvoice 		: function(id){
			var self = this;			

			this.dataSource.query({    			
				filter: { field:"id", value: id },
				page: 1,
				take: 100
			}).then(function(e){
				var obj = self.dataSource.view()[0];								    	
				
				//Status
				if(obj.status==1){
					self.set("paid", true);
				}else{
					self.set("paid", false);
				}

				self.set("sub_total", kendo.toString(obj.sub_total, "c", obj.locale));
		        self.set("vat", kendo.toString(obj.vat, "c", obj.locale));
		        self.set("total", kendo.toString(obj.amount, "c", obj.locale));	  			
								
				self.contactDS.filter({ field: "id", value: obj.contact_id });				
				self.lineDS.filter({ field: "invoice_id", value: obj.id });
				self.set("obj", obj);
			});				
		},
		getRate 			: function(){
			var rate = 1, obj = this.get("obj"),
			contact = this.contactDS.get(obj.contact_id);

			rate = banhji.currency.getAmount(banhji.institute.locale) / banhji.currency.getAmount(contact.currency[0].locale);			

			return rate;		
		},
		setItem 			: function(){
			var self = this;

			this.itemDS.query({
				filter: [
					{ field:"item_type_id", operator:"where_not_in", value: 6 },
					{ field:"status", value: 1 }
				],
				page: 1,
				take: 100
			}).then(function(){
				var view = self.itemDS.view();

				$.each(view, function(index, value){
					self.itemList.push(value);
				});
			});
		},			
		addEmpty 		 	: function(){
			if(this.dataSource.total()==0){
				var duedate = new Date();
				duedate.setDate(duedate.getDate()+7);
				this.set("obj", null);				

				this.dataSource.add({
					company_id 			: 0,
					location_id 		: 0,
					contact_id 			: "",
					payment_term_id		: 0,
					payment_method_id 	: 0,
					reference_id 		: 0,
					cash_account_id 	: 2,
					vat_id 				: 0,
					biller_id 			: this.get("biller_id"),
	 	    		number 				: "",
				   	type				: "Receipt",
				   	sub_total 			: 0,				   		   					   				   	
				   	amount				: 0,
				   	vat 				: 0,
				   	rate				: 1,			   	
				   	locale 				: "km-KH",			   	
				   	issued_date 		: new Date(),
				   	due_date 			: duedate,
				   	check_no 			: "",
				   	bill_to 			: "",
				   	ship_to 			: "",
				   	memo 				: "",
				   	memo2 				: "",
				   	status 				: 0,

				   	segments 			: []				
		    	});		    		
				
				var data = this.dataSource.data();
				var obj = data[data.length-1];			
				this.set("obj", obj);

				this.addRow();  
			}
		},
		addRow 				: function(){				
			var invoice_id = 0, obj = this.get("obj");
			if(this.get("isEdit")){
				invoice_id = obj.id;
			}
						
			this.lineDS.add({					
				invoice_id 			: invoice_id,
				item_id 			: "",
				measurement_id 		: 0,
				meter_record_id	 	: 0,
				description 		: "",				
				unit 	 			: 1,
				price 				: 0,												
				amount 				: 0,
				rate				: 1,
				locale				: obj.locale,
				has_vat 			: false,
				type 				: "",

				priceList 			: []
			});																	
		},
		removeRow 			: function(e){						
			var d = e.data;				
			this.lineDS.remove(d);
	        this.changes();		        
		},
		changes				: function(){
			var obj = this.get("obj");

			if(this.lineDS.total()>0){			
				var total = 0, subTotal = 0, vat = 0, vatAmt = 0;
								
				if(kendo.parseInt(obj.vat_id)>0){
					var selectedVat = this.vatDS.get(obj.vat_id);					
					vatAmt = kendo.parseFloat(selectedVat.price_list[0].price);
				}								

				$.each(this.lineDS.data(), function(index, value) {				
					var amt = value.unit * value.price;
					subTotal += amt;

					value.set("amount", amt);

					if(value.has_vat){
						vat += amt * vatAmt;						
					}
		        });

		        total = subTotal + vat;			

		        this.set("sub_total", kendo.toString(subTotal, "c", obj.locale));
		        this.set("vat", kendo.toString(vat, "c", obj.locale));
		        this.set("total", kendo.toString(total, "c", obj.locale));

		        obj.set("sub_total", subTotal);
		        obj.set("vat", vat);			
				obj.set("amount", total);									    	
	    	}else{
	    		this.set("sub_total", kendo.toString(0, "c", obj.locale));
		        this.set("vat", kendo.toString(0, "c", obj.locale));
		        this.set("total", kendo.toString(0, "c", obj.locale));

		        obj.set("sub_total", 0);
		        obj.set("vat", 0);			
				obj.set("amount", 0);				
	    	}   	
		},
		contactChanges 		: function(e){	    	
	    	if(e.sender.selectedIndex>0){
		    	var obj = this.get("obj"), company_id = 0,		    	
		    	contact = this.contactDS.get(obj.contact_id);		    	
		    	
		    	obj.set("payment_method_id", contact.payment_method_id);
		    	obj.set("vat_id", contact.tax_item_id);
		    	obj.set("locale", contact.currency[0].locale);
		    	obj.set("bill_to", contact.bill_to);		    		    			
				
		    	this.lineDS.data([]);
		    	this.addRow();		    	
		    	this.changes();
	    	}
	    },
	    segmentChanges 		 : function(e) {
			var obj = this.get("obj"),
			dataArr = obj.segments,
			lastIndex = dataArr.length - 1,
			last = banhji.segmentItem.ds.at(dataArr[lastIndex]);

			if(dataArr.length > 1) {
				for(var i = 0; i < dataArr.length - 1; i++) {
					var current_index = dataArr[i],
					current = banhji.segmentItem.ds.at(current_index);

					if(current.segment_id === last.segment_id) {
						dataArr.splice(lastIndex, 1);
						break;
					}
				}
			}				
		},
		itemChanges 		: function(e){								
			var self = this, 
			data = e.data,
			invoice_id = 0, 
			obj = this.get("obj"), 
			item = this.itemDS.get(data.item_id),
			contact = this.contactDS.get(obj.contact_id);

			if(data.item_id>0 && obj.contact_id>0){		        
		        if(item.category_id=="8"){
		        	this.catalogDS.query({
		        		filter: { field:"id", operator:"where_in", value:item.catalogs.split(",") }
		        	}).then(function(){
		        		self.lineDS.remove(data);

		        		$.each(self.catalogDS.view(), function(index, value){
		        			var rate = kendo.parseFloat(contact.currency[0].rate)/kendo.parseFloat(value.price_list[0].currency[0].rate);

					        if(self.get("isEdit")){
								invoice_id = obj.id;
							}
										
							self.lineDS.add({					
								invoice_id 			: invoice_id,
								item_id 			: value.id,
								measurement_id 		: value.price_list[0].measurement_id,
								meter_record_id	 	: 0,
								description 		: value.name,				
								unit 	 			: 1,
								price 				: value.price_list[0].price*rate,												
								amount 				: value.price_list[0].price*rate,
								rate				: rate,
								locale				: obj.locale,
								has_vat 			: false,
								type 				: "",

								priceList 			: value.price_list
							});								
		        		});

		        		self.changes();
		        	});
		        }else if(item.category_id=="9"){
		        	var rate = kendo.parseFloat(contact.currency[0].rate)/kendo.parseFloat(item.price_list[0].currency[0].rate);

		    		data.set("description", item.name);	    		
			        data.set("price", item.price*rate);
			        data.set("measurement_id", 0);
			        data.set("rate", rate);		        	        
			        data.set("priceList", []);

			        this.changes();
		        }else{
		        	var rate = kendo.parseFloat(contact.currency[0].rate)/kendo.parseFloat(item.price_list[0].currency[0].rate);

		    		data.set("description", item.name);	    		
			        data.set("price", item.price_list[0].price*rate);
			        data.set("measurement_id", item.price_list[0].measurement_id);
			        data.set("rate", rate);		        	        
			        data.set("priceList", item.price_list);

			        this.changes();
		    	}		        
	        }else{
	        	alert("សូមជ្រើសអតិថិជន");
	        }	                	        	
		},
		measurementChanges 	: function(e){								
			var self = this, data = e.data, obj = this.get("obj");

			if(data.measurement_id>0){				
				var contact = this.contactDS.get(obj.contact_id);				

				$.each(data.priceList, function(index, value){
					if(value.measurement_id==data.measurement_id){
						var rate = kendo.parseFloat(contact.currency[0].rate)/kendo.parseFloat(value.currency[0].rate);
				        data.set("price", kendo.parseFloat(value.price)*rate);				       			       
				        data.set("rate", rate);

						return false;
					}
				});	    		
		        	        
		        this.changes();
	        }	                	        	
		},
		referenceChange 	: function(e){
			var self = this, obj = this.get("obj");
			
			if(obj.reference_id>0){
				var ref = this.referenceDS.get(obj.reference_id);
				obj.set("vat_id", ref.vat_id);

			 	this.referenceLineDS.query({
			 		filter: { field:"invoice_id", value: obj.reference_id },
			 		page: 1,
			 		take: 100
			 	}).then(function(){
			 		var view = self.referenceLineDS.view();					

			 		self.lineDS.data([]);
			 		$.each(view, function(index, value){
			 			self.lineDS.add({					
							invoice_id 			: obj.invoice_id,
							item_id 			: value.item_id,
							measurement_id 		: value.measurement_id,
							meter_record_id	 	: value.meter_record_id,
							description 		: value.description,				
							unit 	 			: value.unit,
							price 				: value.price,												
							amount 				: value.amount,
							rate				: value.rate,
							locale				: value.locale,
							has_vat 			: value.has_vat,
							type 				: value.type,

							priceList 			: value.priceList
						});
			 		});

			 		self.changes();
			 	});			 				 				 				 				
			}								
		},
		addPayment 			: function(invoice_id){
			var obj = this.get("obj"), rate = this.getRate();

			this.paymentDS.add({
				company_id 			: obj.company_id,
				contact_id 			: obj.contact_id,
				cashier_id 			: this.get("biller_id"),
				meter_id 			: 0,							
				reference_id		: invoice_id,														
				payment_method_id	: obj.payment_method_id,
				cash_account_id		: obj.cash_account_id,
				check_no			: obj.check_no,							
				type 				: "invoice",
				amount 				: obj.amount,
				fine 				: 0,
				discount 			: 0,
				rate 				: obj.rate,
				locale 				: obj.locale,
				payment_date		: kendo.toString(new Date(obj.issued_date), "yyyy-MM-dd")
			});

			this.paymentDS.sync();					
		},
		save 				: function(){				
	    	var self = this, obj = this.get("obj"), rate = this.getRate();

	    	obj.set("sub_total", kendo.parseFloat(obj.sub_total)*rate);
	    	obj.set("vat", kendo.parseFloat(obj.vat)*rate);
	        obj.set("amount", kendo.parseFloat(obj.amount)*rate);
	        obj.set("rate", rate);				        
	       
			//Update references
			if(obj.reference_id>0){
				var ref = this.referenceDS.get(obj.reference_id);
				ref.set("status", 1);
				this.referenceDS.sync();
			}
	    	
	    	if(this.get("isEdit")){
	    		this.dataSource.sync();
	    		this.lineDS.sync();
	    	}else{
	    		//Add brand new invoice
				this.invoiceSync()
				.then(function(invoice){
					$.each(self.lineDS.data(), function(index, value){										
						value.set("invoice_id", invoice[0].id);
						value.set("rate", rate);
					});

					self.addPayment(invoice[0].id);

					self.lineDS.sync();
					self.addJournal(invoice[0].id);								
				}).then(function(){
					self.dataSource.data([]);
					self.lineDS.data([]);
					self.paymentDS.data([]);

					self.set("sub_total", 0);
					self.set("vat", 0);
					self.set("total", 0);
					
					self.addEmpty();
				});
			}
		},
		cancel 				: function(){
			this.dataSource.cancelChanges();
			this.lineDS.cancelChanges();
			window.history.back();
		},	    
	    //Create
	    invoiceSync 		: function(){
	    	var dfd = $.Deferred();	        

	    	this.dataSource.sync();
		    this.dataSource.bind("requestEnd", function(e){			    	
				dfd.resolve(e.response.results);    				
		    });

		    return dfd;	    		    	
	    },	    
	    clear 				: function(){	   	    	
	    	this.set("isEdit", false);
	    	this.set("paid", false);
	    	
			this.set("sub_total", 0);
			this.set("vat", 0);	
			this.set("total", 0);				
	    },
	    //Journal
	    getItemAccount 		: function(type, item_id){
	    	var self = this,	    	
	    	id = 0,
	    	item = this.itemDS.get(item_id);	    	
	    	
	    	if(item.accounts){
		    	$.each(item.accounts, function(index, value){
		    		if(value.type==type){
		    			id = value.id;

		    			return false;
		    		}
		    	});
	    	}	    	

	    	return kendo.parseInt(id);	    	
	    },	    
	    addJournal 			: function(invoice_id){
	    	var self = this,
	    	invoice = this.get("obj"),
	    	customer = this.contactDS.get(invoice.contact_id),
			rate = invoice.rate,
	    	entries = [],
	    	saleList = {},
	    	inventoryList = {},
			cogsList = {},
			witdrawList = {},
			depositAmount = 0;
			
			//Arrange sale, cogs, inventory, customer deposit or widraw
			$.each(this.lineDS.data(), function(index, value){										
				var item = self.itemDS.get(value.item_id),
				amt = value.unit*value.price;

				//Add sale list
				var incomeID = self.itemDS.get(value.item_id).income_account_id;																				
				if(incomeID>0){
					if(saleList[incomeID]===undefined){
						saleList[incomeID]={"id": incomeID, "amt": amt};						
					}else{											
						if(saleList[incomeID].id===incomeID){
							saleList[incomeID].amt += amt;
						}else{
							saleList[incomeID]={"id": incomeID, "amt": amt};
						}
					}
				}								

				switch(kendo.parseInt(item.item_type_id)){		        
					case 1: //Inventory
					
						//Add cogs list
						var itemCost = value.unit*item.cost;
						var cogsID = self.itemDS.get(value.item_id).cogs_account_id;
						if(cogsList[cogsID]===undefined){
							cogsList[cogsID]={"id": cogsID, "amt": itemCost};						
						}else{											
							if(cogsList[cogsID].id===cogsID){
								cogsList[cogsID].amt += itemCost;
							}else{
								cogsList[cogsID]={"id": cogsID, "amt": itemCost};
							}
						}						

						//Add inventory list
						var inventoryID = self.itemDS.get(value.item_id).inventory_account_id;
						if(inventoryList[inventoryID]===undefined){
							inventoryList[inventoryID]={"id": inventoryID, "amt": itemCost};						
						}else{											
							if(inventoryList[inventoryID].id===inventoryID){
								inventoryList[inventoryID].amt += itemCost;
							}else{
								inventoryList[inventoryID]={"id": inventoryID, "amt": itemCost};
							}
						}										

					  	break;
					case 5: //Customer Deposit
						depositAmount += amt;
						var depositID = customer.deposit_account_id;

						if(amt>0){ //Deposit														
							if(saleList[depositID]===undefined){
								saleList[depositID]={"id": depositID, "amt": amt};						
							}else{											
								if(saleList[depositID].id===depositID){
									saleList[depositID].amt += amt;
								}else{
									saleList[depositID]={"id": depositID, "amt": amt};
								}
							}																			
						}else{ //Witdraw												
							if(witdrawList[depositID]===undefined){
								witdrawList[depositID]={"id": depositID, "amt": amt*-1};						
							}else{											
								if(witdrawList[depositID].id===depositID){
									witdrawList[depositID].amt += (amt*-1);
								}else{
									witdrawList[depositID]={"id": depositID, "amt": amt*-1};
								}
							}														
						}

					  	break;					
					default:
				  	//default here
				} //End Swtich
			});//End Foreach Loop

			//VAT			
			if(invoice.vat_id>0){				
				var vatOutID = self.vatDS.get(invoice.vat_id).income_account_id;
				
				if(vatOutID>0){
					var vatAmt = kendo.parseFloat(invoice.vat)*rate;
					if(saleList[vatOutID]===undefined){
						saleList[vatOutID]={"id": vatOutID, "amt": vatAmt};						
					}else{											
						if(saleList[vatOutID].id===vatOutID){
							saleList[vatOutID].amt += vatAmt;
						}else{
							saleList[vatOutID]={"id": vatOutID, "amt": vatAmt};
						}
					}
				}
			}			
			
			//Sale list	to journal		
			if(!jQuery.isEmptyObject(saleList)){								
				//Sum cash
				var cash = 0;				
				$.each(saleList, function(index, value){					
					cash += value.amt;					
				});				

				//Cash on Dr
				entries.push({
					amount  : cash*rate,
					memo 	: "វិក្កយបត្រ",
					is_debit: true,
					account : { id: invoice.cash_account_id },
					rate 	: rate,
					locale 	: invoice.locale,
					issuedDate: invoice.issued_date,
					segment : invoice.segments,
					contact : customer
				});					

				//Sale accounts on Cr
				$.each(saleList, function(index, value){
					entries.push({
						amount  : value.amt*rate,
						memo 	: "វិក្កយបត្រ",
						is_debit: false,
						account : { id: value.id },
						rate 	: rate,
						locale 	: invoice.locale,
						issuedDate: invoice.issued_date,
						segment : invoice.segments,
						contact : customer
					});							
				});
			}

			//Inventory to journal
			//COGS on Dr 			
			if(!jQuery.isEmptyObject(cogsList)){							
				$.each(cogsList, function(index, value){				
					entries.push({
						amount  :  value.amt*rate,
						memo 	: "វិក្កយបត្រ",
						is_debit: true,
						account : { id: value.id },
						rate 	: rate,
						locale 	: invoice.locale,
						issuedDate: invoice.issued_date,
						segment : invoice.segments,
						contact : customer
					});					
				});							
			}
			//Inventory on Cr
			if(!jQuery.isEmptyObject(inventoryList)){
				$.each(inventoryList, function(index, value){					
					entries.push({
						amount  :  value.amt*rate,
						memo 	: "វិក្កយបត្រ",
						is_debit: false,
						account : { id: value.id },
						rate 	: rate,
						locale 	: invoice.locale,
						issuedDate: invoice.issued_date,
						segment : invoice.segments,
						contact : customer
					});					
				});
			}
			
			//Witdraw to journal
			if(!jQuery.isEmptyObject(witdrawList)){
				//Deposit on Dr
				$.each(witdrawList, function(index, value){
					entries.push({
						amount  :  value.amt*rate,
						memo 	: "វិក្កយបត្រ",
						is_debit: true,
						account : { id: value.id },
						rate 	: rate,
						locale 	: invoice.locale,
						issuedDate: invoice.issued_date,
						segment : invoice.segments,
						contact : customer
					});						
				});

				var wCash = 0;
				$.each(witdrawList, function(index, value){					
					wCash += value.amt;
				});

				//Cash on Cr
				entries.push({
					amount  :  wCash*rate,
					memo 	: "វិក្កយបត្រ",
					is_debit: false,
					account : { id: invoice.cash_account_id },
					rate 	: rate,
					locale 	: invoice.locale,
					issuedDate: invoice.issued_date,
					segment : invoice.segments,
					contact : customer
				});							
			}
			//Customer deposit
			if(depositAmount>0){
				this.paymentDS.add({
					company_id 	: invoice.company_id,
					contact_id 	: customer.id,
					reference_id: invoice_id,
					cashier 	: this.get("biller_id"),
					type 		: "deposit",
					amount 		: depositAmount,
					fine 		: 0,
					discount 	: 0,
					payment_date: invoice.issued_date,
					locale 		: invoice.locale,
					rate 		: invoice.rate,
					deleted 	: false
				});				
			}
			
			//Add journal to datasource
			banhji.journalEntry.addNew({
				reference: { id: invoice_id },
				type: invoice.type,
				memo: invoice.type,
				issuedDate: invoice.issued_date,
				contact: {id: banhji.userManagement.getLogin().id, name: banhji.userManagement.getLogin().username},
				entries: entries
			});			
			banhji.journalEntry.save();			
		}	 		
	});
	banhji.so =  kendo.observable({
		dataSource 			: dataStore(baseUrl + "invoices"),
		lineDS  			: dataStore(baseUrl + "invoices/line"),			
		contactDS  			: dataStore(baseUrl + "contacts"),
		referenceDS			: dataStore(baseUrl + "invoices"),
		referenceLineDS		: dataStore(baseUrl + "invoices/line"),					
		itemDS 				: dataStore(baseUrl + "items"),
		vatDS 				: dataStore(baseUrl + "items"),
		catalogDS			: dataStore(baseUrl + "items"),
		assemblyDS			: dataStore(baseUrl + "items/assembly"),				
		segmentItemDS		: banhji.segmentItem.ds,

		itemList 			: [],
		referenceTypes 		: [
			{ id:"Estimate", name:"សម្រង់តម្លៃ" },			
			{ id:"GDN", name:"លិខិតដឹកជញ្ជូន" }
		],
		
		obj 				: null,
		isEdit 				: false,

		biller_id			: banhji.userManagement.getLogin() === null ? 0 : banhji.userManagement.getLogin().id,			
		paid 				: false,		
		bolReference 		: false,

		sub_total 			: 0,
		vat 				: 0,
		total 				: 0,				
								
		pageLoad 			: function(id){			
			if(id){
				this.set("isEdit", true);							
				this.loadInvoice(id);
			}else{				
				this.set("isEdit", false);
				this.set("paid", false);
				this.addEmpty();								
			}  																							
		},	    
	    loadContact 		: function(id){
			var self = this;			

			this.contactDS.query({    			
				filter: { field:"id", value: id },
				page: 1,
				take: 100
			}).then(function(e){
				var view = self.contactDS.view(),
				obj = self.get("obj");
		    	
		    	obj.set("contact_id", view[0].id);
		    	obj.set("payment_term_id", view[0].payment_term_id);
		    	obj.set("vat_id", view[0].tax_item_id);		    			  				  											
				obj.set("locale", view[0].currency[0].locale);
				obj.set("bill_to", view[0].bill_to);				
			});				
		},					
		loadReference 		: function(e){			
			var obj = this.get("obj");

			if(obj.reference_type!==""){
				this.set("bolReference", true);

				this.referenceDS.filter([
					{ field: "contact_id", value: obj.contact_id },
					{ field: "status", value: 0 },
					{ field: "type", value: obj.reference_type }
				]);				
			}else{
				this.set("bolReference", false);
			}							
		},			
		loadInvoice 		: function(id){
			var self = this;			

			this.dataSource.query({    			
				filter: { field:"id", value: id },
				page: 1,
				take: 100
			}).then(function(e){
				var obj = self.dataSource.view()[0];								    	
				
				//Status
				if(obj.status==1){
					self.set("paid", true);
				}else{
					self.set("paid", false);
				}

				self.set("sub_total", kendo.toString(obj.sub_total, "c", obj.locale));
		        self.set("vat", kendo.toString(obj.vat, "c", obj.locale));
		        self.set("total", kendo.toString(obj.amount, "c", obj.locale));	  			
								
				self.contactDS.filter({ field: "id", value: obj.contact_id });				
				self.lineDS.filter({ field: "invoice_id", value: obj.id });
				self.set("obj", obj);
			});				
		},
		getRate 			: function(){
			var rate = 1, obj = this.get("obj"),
			contact = this.contactDS.get(obj.contact_id);

			rate = banhji.currency.getAmount(banhji.institute.locale) / banhji.currency.getAmount(contact.currency[0].locale);			

			return rate;		
		},
		setItem 			: function(){
			var self = this;

			this.itemDS.query({
				filter: [
					{ field:"item_type_id", operator:"where_not_in", value: 6 },
					{ field:"status", value: 1 }
				],
				page: 1,
				take: 100
			}).then(function(){
				var view = self.itemDS.view();

				$.each(view, function(index, value){
					self.itemList.push(value);
				});
			});
		},			
		addEmpty 		 	: function(){
			if(this.dataSource.total()==0){
				var duedate = new Date();
				duedate.setDate(duedate.getDate()+7);
				this.set("obj", null);				

				this.dataSource.add({
					company_id 			: 0,
					location_id 		: 0,
					contact_id 			: "",
					payment_term_id		: 0,
					payment_method_id 	: 0,
					reference_id 		: 0,
					cash_account_id 	: 0,
					vat_id 				: 0,
					biller_id 			: this.get("biller_id"),
	 	    		number 				: "",
				   	type				: "SO",
				   	sub_total 			: 0,				   		   					   				   	
				   	amount				: 0,
				   	vat 				: 0,
				   	rate				: 1,			   	
				   	locale 				: "km-KH",			   	
				   	issued_date 		: new Date(),
				   	due_date 			: duedate,
				   	check_no 			: "",
				   	bill_to 			: "",
				   	ship_to 			: "",
				   	memo 				: "",
				   	memo2 				: "",
				   	status 				: 0,

				   	segments 			: []				
		    	});		    		
				
				var data = this.dataSource.data();
				var obj = data[data.length-1];			
				this.set("obj", obj);

				this.addRow();  
			}
		},
		addRow 				: function(){				
			var invoice_id = 0, obj = this.get("obj");
			if(this.get("isEdit")){
				invoice_id = obj.id;
			}
						
			this.lineDS.add({					
				invoice_id 			: invoice_id,
				item_id 			: "",
				measurement_id 		: 0,
				meter_record_id	 	: 0,
				description 		: "",				
				unit 	 			: 1,
				price 				: 0,												
				amount 				: 0,
				rate				: 1,
				locale				: obj.locale,
				has_vat 			: false,
				type 				: "",

				priceList 			: []
			});																	
		},
		removeRow 			: function(e){						
			var d = e.data;				
			this.lineDS.remove(d);
	        this.changes();		        
		},
		changes				: function(){
			var obj = this.get("obj");

			if(this.lineDS.total()>0){			
				var total = 0, subTotal = 0, vat = 0, vatAmt = 0;
								
				if(kendo.parseInt(obj.vat_id)>0){
					var selectedVat = this.vatDS.get(obj.vat_id);					
					vatAmt = kendo.parseFloat(selectedVat.price_list[0].price);
				}								

				$.each(this.lineDS.data(), function(index, value) {				
					var amt = value.unit * value.price;
					subTotal += amt;

					value.set("amount", amt);

					if(value.has_vat){
						vat += amt * vatAmt;						
					}
		        });

		        total = subTotal + vat;			

		        this.set("sub_total", kendo.toString(subTotal, "c", obj.locale));
		        this.set("vat", kendo.toString(vat, "c", obj.locale));
		        this.set("total", kendo.toString(total, "c", obj.locale));

		        obj.set("sub_total", subTotal);
		        obj.set("vat", vat);			
				obj.set("amount", total);									    	
	    	}else{
	    		this.set("sub_total", kendo.toString(0, "c", obj.locale));
		        this.set("vat", kendo.toString(0, "c", obj.locale));
		        this.set("total", kendo.toString(0, "c", obj.locale));

		        obj.set("sub_total", 0);
		        obj.set("vat", 0);			
				obj.set("amount", 0);				
	    	}   	
		},
		contactChanges 		: function(e){	    	
	    	if(e.sender.selectedIndex>0){
		    	var obj = this.get("obj"), company_id = 0,		    	
		    	contact = this.contactDS.get(obj.contact_id);		    	
		    	
		    	obj.set("vat_id", contact.tax_item_id);
		    	obj.set("locale", contact.currency[0].locale);
		    	obj.set("bill_to", contact.bill_to);		    		    			
				
		    	this.lineDS.data([]);
		    	this.addRow();		    	
		    	this.changes();
	    	}
	    },
	    segmentChanges 		 : function(e) {
			var obj = this.get("obj"),
			dataArr = obj.segments,
			lastIndex = dataArr.length - 1,
			last = banhji.segmentItem.ds.at(dataArr[lastIndex]);

			if(dataArr.length > 1) {
				for(var i = 0; i < dataArr.length - 1; i++) {
					var current_index = dataArr[i],
					current = banhji.segmentItem.ds.at(current_index);

					if(current.segment_id === last.segment_id) {
						dataArr.splice(lastIndex, 1);
						break;
					}
				}
			}				
		},
		itemChanges 		: function(e){								
			var self = this, 
			data = e.data,
			invoice_id = 0, 
			obj = this.get("obj"), 
			item = this.itemDS.get(data.item_id),
			contact = this.contactDS.get(obj.contact_id);

			if(data.item_id>0 && obj.contact_id>0){		        
		        if(item.category_id=="8"){
		        	this.catalogDS.query({
		        		filter: { field:"id", operator:"where_in", value:item.catalogs.split(",") }
		        	}).then(function(){
		        		self.lineDS.remove(data);

		        		$.each(self.catalogDS.view(), function(index, value){
		        			var rate = kendo.parseFloat(contact.currency[0].rate)/kendo.parseFloat(value.price_list[0].currency[0].rate);

					        if(self.get("isEdit")){
								invoice_id = obj.id;
							}
										
							self.lineDS.add({					
								invoice_id 			: invoice_id,
								item_id 			: value.id,
								measurement_id 		: value.price_list[0].measurement_id,
								meter_record_id	 	: 0,
								description 		: value.name,				
								unit 	 			: 1,
								price 				: value.price_list[0].price*rate,												
								amount 				: value.price_list[0].price*rate,
								rate				: rate,
								locale				: obj.locale,
								has_vat 			: false,
								type 				: "",

								priceList 			: value.price_list
							});								
		        		});

		        		self.changes();
		        	});
		        }else if(item.category_id=="9"){
		        	var rate = kendo.parseFloat(contact.currency[0].rate)/kendo.parseFloat(item.price_list[0].currency[0].rate);

		    		data.set("description", item.name);	    		
			        data.set("price", item.price*rate);
			        data.set("measurement_id", 0);
			        data.set("rate", rate);		        	        
			        data.set("priceList", []);

			        this.changes();
		        }else{
		        	var rate = kendo.parseFloat(contact.currency[0].rate)/kendo.parseFloat(item.price_list[0].currency[0].rate);

		    		data.set("description", item.name);	    		
			        data.set("price", item.price_list[0].price*rate);
			        data.set("measurement_id", item.price_list[0].measurement_id);
			        data.set("rate", rate);		        	        
			        data.set("priceList", item.price_list);

			        this.changes();
		    	}		        
	        }else{
	        	alert("សូមជ្រើសអតិថិជន");
	        }	                	        	
		},
		measurementChanges 	: function(e){								
			var self = this, data = e.data, obj = this.get("obj");

			if(data.measurement_id>0){				
				var contact = this.contactDS.get(obj.contact_id);				

				$.each(data.priceList, function(index, value){
					if(value.measurement_id==data.measurement_id){
						var rate = kendo.parseFloat(contact.currency[0].rate)/kendo.parseFloat(value.currency[0].rate);
				        data.set("price", kendo.parseFloat(value.price)*rate);				       			       
				        data.set("rate", rate);

						return false;
					}
				});	    		
		        	        
		        this.changes();
	        }	                	        	
		},
		referenceChange 	: function(e){
			var self = this, obj = this.get("obj");
			
			if(obj.reference_id>0){
				var ref = this.referenceDS.get(obj.reference_id);
				obj.set("vat_id", ref.vat_id);

			 	this.referenceLineDS.query({
			 		filter: { field:"invoice_id", value: obj.reference_id },
			 		page: 1,
			 		take: 100
			 	}).then(function(){
			 		var view = self.referenceLineDS.view();					

			 		self.lineDS.data([]);
			 		$.each(view, function(index, value){
			 			self.lineDS.add({					
							invoice_id 			: obj.invoice_id,
							item_id 			: value.item_id,
							measurement_id 		: value.measurement_id,
							meter_record_id	 	: value.meter_record_id,
							description 		: value.description,				
							unit 	 			: value.unit,
							price 				: value.price,												
							amount 				: value.amount,
							rate				: value.rate,
							locale				: value.locale,
							has_vat 			: value.has_vat,
							type 				: value.type,

							priceList 			: value.priceList
						});
			 		});

			 		self.changes();
			 	});			 				 				 				 				
			}								
		},
		save 				: function(){				
	    	var self = this, obj = this.get("obj"), rate = this.getRate();

	    	obj.set("sub_total", kendo.parseFloat(obj.sub_total)*rate);
	    	obj.set("vat", kendo.parseFloat(obj.vat)*rate);
	        obj.set("amount", kendo.parseFloat(obj.amount)*rate);
	        obj.set("rate", rate);	        
	       
			//Update references
			if(obj.reference_id>0){
				var ref = this.referenceDS.get(obj.reference_id);
				ref.set("status", 1);
				this.referenceDS.sync();
			}
	    	
	    	if(this.get("isEdit")){
	    		this.dataSource.sync();
	    		this.lineDS.sync();
	    	}else{
	    		//Add brand new invoice
				this.invoiceSync()
				.then(function(invoice){
					$.each(self.lineDS.data(), function(index, value){										
						value.set("invoice_id", invoice[0].id);
						value.set("rate", rate);
					});
					self.lineDS.sync();												
				}).then(function(){
					self.dataSource.data([]);
					self.lineDS.data([]);
					
					self.addEmpty();
				});
			}
		},
		cancel 				: function(){
			this.dataSource.cancelChanges();
			this.lineDS.cancelChanges();
			window.history.back();
		},	    
	    //Create
	    invoiceSync 		: function(){
	    	var dfd = $.Deferred();	        

	    	this.dataSource.sync();
		    this.dataSource.bind("requestEnd", function(e){			    	
				dfd.resolve(e.response.results);    				
		    });

		    return dfd;	    		    	
	    },	    
	    clear 				: function(){	   	    	
	    	this.set("isEdit", false);
	    	this.set("paid", false);
	    	
			this.set("sub_total", 0);
			this.set("vat", 0);	
			this.set("total", 0);				
	    }
	});
	banhji.estimate =  kendo.observable({
		dataSource 			: dataStore(baseUrl + "invoices"),
		lineDS  			: dataStore(baseUrl + "invoices/line"),			
		contactDS  			: dataStore(baseUrl + "contacts"),						
		itemDS 				: dataStore(baseUrl + "items"),
		vatDS 				: dataStore(baseUrl + "items"),
		catalogDS			: dataStore(baseUrl + "items"),
		assemblyDS			: dataStore(baseUrl + "items/assembly"),		

		itemList 			: [],		
		
		obj 				: null,
		isEdit 				: false,

		biller_id			: banhji.userManagement.getLogin() === null ? 0 : banhji.userManagement.getLogin().id,			
		paid 				: false,		

		sub_total 			: 0,
		vat 				: 0,
		total 				: 0,				
								
		pageLoad 			: function(id){			
			if(id){
				this.set("isEdit", true);							
				this.loadInvoice(id);
			}else{				
				this.set("isEdit", false);
				this.set("paid", false);
				this.addEmpty();								
			}  																							
		},	    
	    loadContact 		: function(id){
			var self = this;			

			this.contactDS.query({    			
				filter: { field:"id", value: id },
				page: 1,
				take: 100
			}).then(function(e){
				var view = self.contactDS.view(),
				obj = self.get("obj");
		    	
		    	obj.set("contact_id", view[0].id);		    	
		    	obj.set("vat_id", view[0].tax_item_id);		    			  				  											
				obj.set("locale", view[0].currency[0].locale);
				obj.set("bill_to", view[0].bill_to);				
			});				
		},			
		loadInvoice 		: function(id){
			var self = this;			

			this.dataSource.query({    			
				filter: { field:"id", value: id },
				page: 1,
				take: 100
			}).then(function(e){
				var obj = self.dataSource.view()[0];								    	
				
				//Status
				if(obj.status==1){
					self.set("paid", true);
				}else{
					self.set("paid", false);
				}

				self.set("sub_total", kendo.toString(obj.sub_total, "c", obj.locale));
		        self.set("vat", kendo.toString(obj.vat, "c", obj.locale));
		        self.set("total", kendo.toString(obj.amount, "c", obj.locale));	  			
								
				self.contactDS.filter({ field: "id", value: obj.contact_id });				
				self.lineDS.filter({ field: "invoice_id", value: obj.id });
				self.set("obj", obj);
			});				
		},
		getRate 			: function(){
			var rate = 1, obj = this.get("obj"),
			contact = this.contactDS.get(obj.contact_id);

			rate = banhji.currency.getAmount(banhji.institute.locale) / banhji.currency.getAmount(contact.currency[0].locale);			

			return rate;		
		},
		setItem 			: function(){
			var self = this;

			this.itemDS.query({
				filter: [
					{ field:"item_type_id", operator:"where_not_in", value: 6 },
					{ field:"status", value: 1 }
				],
				page: 1,
				take: 100
			}).then(function(){
				var view = self.itemDS.view();

				$.each(view, function(index, value){
					self.itemList.push(value);
				});
			});
		},			
		addEmpty 		 	: function(){
			if(this.dataSource.total()==0){				
				this.set("obj", null);				

				this.dataSource.add({
					company_id 			: 0,
					location_id 		: 0,
					contact_id 			: "",
					payment_term_id		: 0,
					payment_method_id 	: 0,
					reference_id 		: 0,
					cash_account_id 	: 0,
					vat_id 				: 0,
					biller_id 			: this.get("biller_id"),
	 	    		number 				: "",
				   	type				: "Estimate",
				   	sub_total 			: 0,				   		   					   				   	
				   	amount				: 0,
				   	vat 				: 0,
				   	rate				: 1,			   	
				   	locale 				: "km-KH",			   	
				   	issued_date 		: new Date(),
				   	due_date 			: "",
				   	check_no 			: "",
				   	bill_to 			: "",
				   	ship_to 			: "",
				   	memo 				: "",
				   	memo2 				: "",
				   	status 				: 0,

				   	segments 			: []				
		    	});		    		
				
				var data = this.dataSource.data();
				var obj = data[data.length-1];			
				this.set("obj", obj);

				this.addRow();  
			}
		},
		addRow 				: function(){				
			var invoice_id = 0, obj = this.get("obj");
			if(this.get("isEdit")){
				invoice_id = obj.id;
			}
						
			this.lineDS.add({					
				invoice_id 			: invoice_id,
				item_id 			: "",
				measurement_id 		: 0,
				meter_record_id	 	: 0,
				description 		: "",				
				unit 	 			: 1,
				price 				: 0,												
				amount 				: 0,
				rate				: 1,
				locale				: obj.locale,
				has_vat 			: false,
				type 				: "",

				priceList 			: []
			});																	
		},
		removeRow 			: function(e){						
			var d = e.data;				
			this.lineDS.remove(d);
	        this.changes();		        
		},
		changes				: function(){
			var obj = this.get("obj");

			if(this.lineDS.total()>0){			
				var total = 0, subTotal = 0, vat = 0, vatAmt = 0;
								
				if(kendo.parseInt(obj.vat_id)>0){
					var selectedVat = this.vatDS.get(obj.vat_id);					
					vatAmt = kendo.parseFloat(selectedVat.price_list[0].price);
				}								

				$.each(this.lineDS.data(), function(index, value) {				
					var amt = value.unit * value.price;
					subTotal += amt;

					value.set("amount", amt);

					if(value.has_vat){
						vat += amt * vatAmt;						
					}
		        });

		        total = subTotal + vat;			

		        this.set("sub_total", kendo.toString(subTotal, "c", obj.locale));
		        this.set("vat", kendo.toString(vat, "c", obj.locale));
		        this.set("total", kendo.toString(total, "c", obj.locale));

		        obj.set("sub_total", subTotal);
		        obj.set("vat", vat);			
				obj.set("amount", total);									    	
	    	}else{
	    		this.set("sub_total", kendo.toString(0, "c", obj.locale));
		        this.set("vat", kendo.toString(0, "c", obj.locale));
		        this.set("total", kendo.toString(0, "c", obj.locale));

		        obj.set("sub_total", 0);
		        obj.set("vat", 0);			
				obj.set("amount", 0);				
	    	}   	
		},
		contactChanges 		: function(e){	    	
	    	if(e.sender.selectedIndex>0){
		    	var obj = this.get("obj"), company_id = 0,		    	
		    	contact = this.contactDS.get(obj.contact_id);		    	
		    	
		    	obj.set("payment_term_id", contact.payment_term_id);
		    	obj.set("vat_id", contact.tax_item_id);
		    	obj.set("locale", contact.currency[0].locale);
		    	obj.set("bill_to", contact.bill_to);		    		    			
				
		    	this.lineDS.data([]);
		    	this.addRow();		    	
		    	this.changes();
	    	}
	    },	    
		itemChanges 		: function(e){								
			var self = this, 
			data = e.data,
			invoice_id = 0, 
			obj = this.get("obj"), 
			item = this.itemDS.get(data.item_id),
			contact = this.contactDS.get(obj.contact_id);

			if(data.item_id>0 && obj.contact_id>0){		        
		        if(item.category_id=="8"){
		        	this.catalogDS.query({
		        		filter: { field:"id", operator:"where_in", value:item.catalogs.split(",") }
		        	}).then(function(){
		        		self.lineDS.remove(data);

		        		$.each(self.catalogDS.view(), function(index, value){
		        			var rate = kendo.parseFloat(contact.currency[0].rate)/kendo.parseFloat(value.price_list[0].currency[0].rate);

					        if(self.get("isEdit")){
								invoice_id = obj.id;
							}
										
							self.lineDS.add({					
								invoice_id 			: invoice_id,
								item_id 			: value.id,
								measurement_id 		: value.price_list[0].measurement_id,
								meter_record_id	 	: 0,
								description 		: value.name,				
								unit 	 			: 1,
								price 				: value.price_list[0].price*rate,												
								amount 				: value.price_list[0].price*rate,
								rate				: rate,
								locale				: obj.locale,
								has_vat 			: false,
								type 				: "",

								priceList 			: value.price_list
							});								
		        		});

		        		self.changes();
		        	});
		        }else if(item.category_id=="9"){
		        	var rate = kendo.parseFloat(contact.currency[0].rate)/kendo.parseFloat(item.price_list[0].currency[0].rate);

		    		data.set("description", item.name);	    		
			        data.set("price", item.price*rate);
			        data.set("measurement_id", 0);
			        data.set("rate", rate);		        	        
			        data.set("priceList", []);

			        this.changes();
		        }else{
		        	var rate = kendo.parseFloat(contact.currency[0].rate)/kendo.parseFloat(item.price_list[0].currency[0].rate);

		    		data.set("description", item.name);	    		
			        data.set("price", item.price_list[0].price*rate);
			        data.set("measurement_id", item.price_list[0].measurement_id);
			        data.set("rate", rate);		        	        
			        data.set("priceList", item.price_list);

			        this.changes();
		    	}		        
	        }else{
	        	alert("សូមជ្រើសអតិថិជន");
	        }	                	        	
		},
		measurementChanges 	: function(e){								
			var self = this, data = e.data, obj = this.get("obj");

			if(data.measurement_id>0){				
				var contact = this.contactDS.get(obj.contact_id);				

				$.each(data.priceList, function(index, value){
					if(value.measurement_id==data.measurement_id){
						var rate = kendo.parseFloat(contact.currency[0].rate)/kendo.parseFloat(value.currency[0].rate);
				        data.set("price", kendo.parseFloat(value.price)*rate);				       			       
				        data.set("rate", rate);

						return false;
					}
				});	    		
		        	        
		        this.changes();
	        }	                	        	
		},		
		save 				: function(){				
	    	var self = this, obj = this.get("obj"), rate = this.getRate();

	    	obj.set("sub_total", kendo.parseFloat(obj.sub_total)*rate);
	    	obj.set("vat", kendo.parseFloat(obj.vat)*rate);
	        obj.set("amount", kendo.parseFloat(obj.amount)*rate);
	        obj.set("rate", rate);	        
	       
			//Update references
			if(obj.reference_id>0){
				var ref = this.referenceDS.get(obj.reference_id);
				ref.set("status", 1);
				this.referenceDS.sync();
			}
	    	
	    	if(this.get("isEdit")){
	    		this.dataSource.sync();
	    		this.lineDS.sync();
	    	}else{
	    		//Add brand new invoice
				this.invoiceSync()
				.then(function(invoice){
					$.each(self.lineDS.data(), function(index, value){										
						value.set("invoice_id", invoice[0].id);
						value.set("rate", rate);
					});
					self.lineDS.sync();
					self.addJournal(invoice[0].id);								
				}).then(function(){
					self.dataSource.data([]);
					self.lineDS.data([]);
					
					self.addEmpty();
				});
			}
		},
		cancel 				: function(){
			this.dataSource.cancelChanges();
			this.lineDS.cancelChanges();
			window.history.back();
		},	    
	    //Create
	    invoiceSync 		: function(){
	    	var dfd = $.Deferred();	        

	    	this.dataSource.sync();
		    this.dataSource.bind("requestEnd", function(e){			    	
				dfd.resolve(e.response.results);    				
		    });

		    return dfd;	    		    	
	    },	    
	    clear 				: function(){	   	    	
	    	this.set("isEdit", false);
	    	this.set("paid", false);
	    	
			this.set("sub_total", 0);
			this.set("vat", 0);	
			this.set("total", 0);				
	    }
	});
	banhji.gdn =  kendo.observable({
		dataSource 			: dataStore(baseUrl + "invoices"),
		lineDS  			: dataStore(baseUrl + "invoices/line"),			
		contactDS  			: dataStore(baseUrl + "contacts"),
		referenceDS			: dataStore(baseUrl + "invoices"),
		referenceLineDS		: dataStore(baseUrl + "invoices/line"),					
		itemDS 				: dataStore(baseUrl + "items"),
		catalogDS			: dataStore(baseUrl + "items"),
		assemblyDS			: dataStore(baseUrl + "items/assembly"),
		
		itemList 			: [],
		referenceTypes 		: [			
			{ id:"SO", name:"បញ្ជាលក់" }
		],
		
		obj 				: null,
		isEdit 				: false,

		biller_id			: banhji.userManagement.getLogin() === null ? 0 : banhji.userManagement.getLogin().id,			
		paid 				: false,		
		bolReference 		: false,
		
		total 				: 0,				
								
		pageLoad 			: function(id){			
			if(id){
				this.set("isEdit", true);							
				this.loadInvoice(id);
			}else{				
				this.set("isEdit", false);
				this.set("paid", false);
				this.addEmpty();								
			}  																							
		},	    
	    loadContact 		: function(id){
			var self = this;			

			this.contactDS.query({    			
				filter: { field:"id", value: id },
				page: 1,
				take: 100
			}).then(function(e){
				var view = self.contactDS.view(),
				obj = self.get("obj");
		    	
		    	obj.set("contact_id", view[0].id);		    			    			  				  											
				obj.set("locale", view[0].currency[0].locale);
				obj.set("bill_to", view[0].bill_to);				
			});				
		},					
		loadReference 		: function(e){			
			var obj = this.get("obj");

			if(obj.reference_type!==""){
				this.set("bolReference", true);

				this.referenceDS.filter([
					{ field: "contact_id", value: obj.contact_id },
					{ field: "status", value: 0 },
					{ field: "type", value: obj.reference_type }
				]);				
			}else{
				this.set("bolReference", false);
			}							
		},			
		loadInvoice 		: function(id){
			var self = this;			

			this.dataSource.query({    			
				filter: { field:"id", value: id },
				page: 1,
				take: 100
			}).then(function(e){
				var obj = self.dataSource.view()[0];								    	
				
				//Status
				if(obj.status==1){
					self.set("paid", true);
				}else{
					self.set("paid", false);
				}
				
		        self.set("total", kendo.toString(obj.amount, "n"));	  			
								
				self.contactDS.filter({ field: "id", value: obj.contact_id });				
				self.lineDS.filter({ field: "invoice_id", value: obj.id });
				self.set("obj", obj);
			});				
		},
		getRate 			: function(){
			var rate = 1, obj = this.get("obj"),
			contact = this.contactDS.get(obj.contact_id);

			rate = banhji.currency.getAmount(banhji.institute.locale) / banhji.currency.getAmount(contact.currency[0].locale);			

			return rate;		
		},
		setItem 			: function(){
			var self = this;

			this.itemDS.query({
				filter: [
					{ field:"item_type_id", operator:"where_not_in", value: 6 },
					{ field:"status", value: 1 }
				],
				page: 1,
				take: 100
			}).then(function(){
				var view = self.itemDS.view();

				$.each(view, function(index, value){
					self.itemList.push(value);
				});
			});
		},			
		addEmpty 		 	: function(){
			if(this.dataSource.total()==0){				
				this.set("obj", null);				

				this.dataSource.add({
					company_id 			: 0,
					location_id 		: 0,
					contact_id 			: "",
					payment_term_id		: 0,
					payment_method_id 	: 0,
					reference_id 		: 0,
					cash_account_id 	: 0,
					vat_id 				: 0,
					biller_id 			: this.get("biller_id"),
	 	    		number 				: "",
				   	type				: "GDN",
				   	sub_total 			: 0,				   		   					   				   	
				   	amount				: 0,
				   	vat 				: 0,
				   	rate				: 1,			   	
				   	locale 				: "km-KH",			   	
				   	issued_date 		: new Date(),
				   	due_date 			: "",
				   	check_no 			: "",
				   	bill_to 			: "",
				   	ship_to 			: "",
				   	memo 				: "",
				   	memo2 				: "",
				   	status 				: 0,

				   	segments 			: []				
		    	});		    		
				
				var data = this.dataSource.data();
				var obj = data[data.length-1];			
				this.set("obj", obj);

				this.addRow();  
			}
		},
		addRow 				: function(){				
			var invoice_id = 0, obj = this.get("obj");
			if(this.get("isEdit")){
				invoice_id = obj.id;
			}
						
			this.lineDS.add({					
				invoice_id 			: invoice_id,
				item_id 			: "",
				measurement_id 		: 0,
				meter_record_id	 	: 0,
				description 		: "",				
				unit 	 			: 1,
				price 				: 0,												
				amount 				: 0,
				rate				: 1,
				locale				: obj.locale,
				has_vat 			: false,
				type 				: "",

				priceList 			: []
			});																	
		},
		removeRow 			: function(e){						
			var d = e.data;				
			this.lineDS.remove(d);
	        this.changes();		        
		},
		changes				: function(){
			var obj = this.get("obj");

			if(this.lineDS.total()>0){			
				var total = 0;											

				$.each(this.lineDS.data(), function(index, value) {				
					total += kendo.parseInt(value.unit);					
		        });
		        
		        this.set("total", kendo.toString(total, "n"));
		        		
				obj.set("amount", total);									    	
	    	}else{    		
		        this.set("total", 0);

		        obj.set("sub_total", 0);
		        obj.set("vat", 0);			
				obj.set("amount", 0);				
	    	}   	
		},
		contactChanges 		: function(e){	    	
	    	if(e.sender.selectedIndex>0){
		    	var obj = this.get("obj"), company_id = 0,		    	
		    	contact = this.contactDS.get(obj.contact_id);	    	
		    	
		    	obj.set("locale", contact.currency[0].locale);
		    	obj.set("bill_to", contact.bill_to);		    		    			
				
		    	this.lineDS.data([]);
		    	this.addRow();		    	
		    	this.changes();
	    	}
	    },	    
		itemChanges 		: function(e){								
			var self = this, 
			data = e.data,
			invoice_id = 0, 
			obj = this.get("obj"), 
			item = this.itemDS.get(data.item_id),
			contact = this.contactDS.get(obj.contact_id);

			if(data.item_id>0 && obj.contact_id>0){		        
		        if(item.category_id=="8"){
		        	this.catalogDS.query({
		        		filter: { field:"id", operator:"where_in", value:item.catalogs.split(",") }
		        	}).then(function(){
		        		self.lineDS.remove(data);

		        		$.each(self.catalogDS.view(), function(index, value){
		        			var rate = kendo.parseFloat(contact.currency[0].rate)/kendo.parseFloat(value.price_list[0].currency[0].rate);

					        if(self.get("isEdit")){
								invoice_id = obj.id;
							}
										
							self.lineDS.add({					
								invoice_id 			: invoice_id,
								item_id 			: value.id,
								measurement_id 		: value.price_list[0].measurement_id,
								meter_record_id	 	: 0,
								description 		: value.name,				
								unit 	 			: 1,
								price 				: value.price_list[0].price*rate,												
								amount 				: value.price_list[0].price*rate,
								rate				: rate,
								locale				: obj.locale,
								has_vat 			: false,
								type 				: "",

								priceList 			: value.price_list
							});								
		        		});

		        		self.changes();
		        	});
		        }else if(item.category_id=="9"){
		        	var rate = kendo.parseFloat(contact.currency[0].rate)/kendo.parseFloat(item.price_list[0].currency[0].rate);

		    		data.set("description", item.name);	    		
			        data.set("price", item.price*rate);
			        data.set("measurement_id", 0);
			        data.set("rate", rate);		        	        
			        data.set("priceList", []);

			        this.changes();
		        }else{
		        	var rate = kendo.parseFloat(contact.currency[0].rate)/kendo.parseFloat(item.price_list[0].currency[0].rate);

		    		data.set("description", item.name);	    		
			        data.set("price", item.price_list[0].price*rate);
			        data.set("measurement_id", item.price_list[0].measurement_id);
			        data.set("rate", rate);		        	        
			        data.set("priceList", item.price_list);

			        this.changes();
		    	}		        
	        }else{
	        	alert("សូមជ្រើសអតិថិជន");
	        }	                	        	
		},
		measurementChanges 	: function(e){								
			var self = this, data = e.data, obj = this.get("obj");

			if(data.measurement_id>0){				
				var contact = this.contactDS.get(obj.contact_id);				

				$.each(data.priceList, function(index, value){
					if(value.measurement_id==data.measurement_id){
						var rate = kendo.parseFloat(contact.currency[0].rate)/kendo.parseFloat(value.currency[0].rate);
				        data.set("price", kendo.parseFloat(value.price)*rate);				       			       
				        data.set("rate", rate);

						return false;
					}
				});	    		
		        	        
		        this.changes();
	        }	                	        	
		},
		referenceChange 	: function(e){
			var self = this, obj = this.get("obj");
			
			if(obj.reference_id>0){
				var ref = this.referenceDS.get(obj.reference_id);
				obj.set("vat_id", ref.vat_id);

			 	this.referenceLineDS.query({
			 		filter: { field:"invoice_id", value: obj.reference_id },
			 		page: 1,
			 		take: 100
			 	}).then(function(){
			 		var view = self.referenceLineDS.view();					

			 		self.lineDS.data([]);
			 		$.each(view, function(index, value){
			 			self.lineDS.add({					
							invoice_id 			: obj.invoice_id,
							item_id 			: value.item_id,
							measurement_id 		: value.measurement_id,
							meter_record_id	 	: value.meter_record_id,
							description 		: value.description,				
							unit 	 			: value.unit,
							price 				: value.price,												
							amount 				: value.amount,
							rate				: value.rate,
							locale				: value.locale,
							has_vat 			: value.has_vat,
							type 				: value.type,

							priceList 			: value.priceList
						});
			 		});

			 		self.changes();
			 	});			 				 				 				 				
			}								
		},
		save 				: function(){				
	    	var self = this, obj = this.get("obj"), rate = this.getRate();
	    	
	        obj.set("rate", rate);	        
	       
			//Update references
			if(obj.reference_id>0){
				var ref = this.referenceDS.get(obj.reference_id);
				ref.set("status", 1);
				this.referenceDS.sync();
			}
	    	
	    	if(this.get("isEdit")){
	    		this.dataSource.sync();
	    		this.lineDS.sync();
	    	}else{
	    		//Add brand new invoice
				this.invoiceSync()
				.then(function(invoice){
					$.each(self.lineDS.data(), function(index, value){										
						value.set("invoice_id", invoice[0].id);
						value.set("rate", rate);
					});
					self.lineDS.sync();													
				}).then(function(){
					self.dataSource.data([]);
					self.lineDS.data([]);
					
					self.addEmpty();
				});
			}
		},
		cancel 				: function(){
			this.dataSource.cancelChanges();
			this.lineDS.cancelChanges();
			window.history.back();
		},	    
	    //Create
	    invoiceSync 		: function(){
	    	var dfd = $.Deferred();	        

	    	this.dataSource.sync();
		    this.dataSource.bind("requestEnd", function(e){			    	
				dfd.resolve(e.response.results);    				
		    });

		    return dfd;	    		    	
	    },	    
	    clear 				: function(){	   	    	
	    	this.set("isEdit", false);
	    	this.set("paid", false);	    	
			
			this.set("total", 0);				
	    } 		
	});
	banhji.statement = kendo.observable({		
		dataSource 			: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: baseUrl + "invoices/statement",
					type: "GET",
					headers: {
						"Entity": getDB(),
						"User": banhji.userManagement.getLogin() === null ? '':banhji.userManagement.getLogin().id
					},
					dataType: 'json'
				},				
				parameterMap: function(options, operation) {
					if(operation === 'read') {
						return {
							limit: options.take,
							page: options.page,
							filter: options.filter,
							sort: options.sort
						};
					} else {
						return {models: kendo.stringify(options.models)};
					}
				}
			},
			sort: { field: "issued_date", dir: "asc" },
			schema 	: {
				model: {
					id: 'id'
				},
				data: 'results',
				total: 'count'
			},
			aggregate: [
			    { field: "amount", aggregate: "sum" }
			],			
			batch: true,
			serverFiltering: true,			
			pageSize: 100
		}),
		agingDS  			: dataStore(baseUrl + "invoices/statement_aging"),
		contactDS  			: dataStore(baseUrl + "contacts"),
		companyDS  			: dataStore(baseUrl + "contacts/branch"),

		sortList			: [ 
	 		{ text:"ទាំងអស់", 	value: "all" }, 
	 		{ text:"ថ្ងៃនេះ", 	value: "today" }, 
	 		{ text:"សប្ដាស៍នេះ",value: "week" }, 
	 		{ text:"ខែនេះ", 		value: "month" }, 
	 		{ text:"ឆ្នាំនេះ", 	value: "year" } 
		],
		sorter 				: "all",		
		sdate 				: "",
		edate 				: "",

		obj 				: null,
		company 			: null,
		total 				: 0,

		pageLoad 			: function(id){
			this.loadContact(1);
			this.loadCompany(1);
		},		
		loadContact 		: function(id){
			var self = this;			

			this.contactDS.query({    			
				filter: { field:"id", value: id },
				page: 1,
				take: 100
			}).then(function(e){
				var view = self.contactDS.view();
				self.set("obj", view[0]);		    					
			});				
		},
		loadCompany 		: function(id){
			var self = this;			

			this.companyDS.query({    			
				filter: { field:"id", value: id },
				page: 1,
				take: 100
			}).then(function(e){
				var view = self.companyDS.view();
				self.set("company", view[0]);		    					
			});				
		},
		total 				: function(){
			return this.dataSource.aggregates().amount.sum;
		}
	});

	
	/*************************
	*	Cashier Section   *
	**************************/
	banhji.cashier = kendo.observable({
		dataSource 			: dataStore(baseUrl + "invoices/payment"),
		paymentByCashierDS	: dataStore(baseUrl + "payments/by_cashier"),		
		contactDS 			: dataStore(baseUrl + "contacts"),				
		invoiceDS 			: dataStore(baseUrl + "invoices"),
		updateInvoiceDS 	: dataStore(baseUrl + "invoices"),
		transactionDS 		: dataStore(baseUrl + "invoices"),
		paymentMethodDS 	: dataStore(baseUrl + "payment_methods"),

		invoiceList 		: [],	

		customer 			: null,		
		total_customer 		: 0,
		total_payment 		: kendo.toString(0,"c0", "km-KH"),

		//Payment		
		payment_date		: new Date(),
		payment_method_id	: 1,
		cash_account_id 	: 2,
		check_no			: "",		
		cashier				: banhji.userManagement.getLogin() === null ? 0 : banhji.userManagement.getLogin().id,
		discount 			: 0,
		fine 				: 0,							
		pay_amount  		: kendo.toString(0,"c0", "km-KH"),
		receive_amount  	: kendo.toString(0,"c0", "km-KH"),
		remain				: kendo.toString(0,"c0", "km-KH"),						
		
		pageLoad 			: function(id){
			var self = this;

			if(id){
				this.set("invoiceList", []);

				this.invoiceDS.query({
					filter: { field:"id", value: id },
					page: 1,
					take: 100
				}).then(function(){
					var view = self.invoiceDS.view(),
					fullIdName = view[0].contact[0].number +" "+ view[0].contact[0].surname +" "+ view[0].contact[0].name;

					if(view[0].contact[0].contact_type_id==5 && view[0].contact[0].contact_type_id==6 && view[0].contact[0].contact_type_id==7){
						fullIdName = view[0].contact[0].number +" "+ view[0].contact[0].company;
					}

					self.loadInvoice(view[0].contact_id, fullIdName);
				});
			}else{
				this.loadPaymentByCashier();
			}			
		},
		total 				: function() {      		
	        var sum = 0;

	        $.each(this.invoiceList, function(index, value) {	        		            
	        	sum += kendo.parseInt(value.amount);		        	          
	        });

	        return kendo.toString(sum, "c0", "km-KH");
	    },		
		loadPaymentByCashier: function(){
			var self = this;

			this.paymentByCashierDS.query({
				filter: [
					{ field:"cashier_id", value: this.get("cashier") },
					{ field:"payment_date", value: kendo.toString(new Date(), "yyyy-MM-dd") }
				]
			}).then(function(e){
				var view = self.paymentByCashierDS.view();
						    	
		    	self.set("total_customer", view[0].total_customer);
		    	self.set("total_payment", kendo.toString(view[0].amount, "c0", "km-KH"));
			});
		},		
		loadInvoice 		: function(contact_id, fullIdName){
			var self = this;

			this.invoiceDS.query({
				filter: [
					{ field:"contact_id", value: contact_id },
		    		{ field:"status", operator:"where_in", value: [0,2] },
		    		{ field:"type", operator:"where_in", value:["Invoice", "eInvoice", "wInvoice"] }
				],
				page: 1,
				take: 50	  	
			}).then(function(e) {
			    var view = self.invoiceDS.view();
			    
			    $.each(view, function(index, value){
		    		var result = $.grep(self.get("invoiceList"), function(e){ return e.id == value.id; });

		    		if (result.length == 0) {
					  	// not found
					  	var remainAmount = kendo.parseFloat(value.amount) - kendo.parseFloat(value.amount_paid);
					  	
					  	self.get("invoiceList").push({				
							id 				: value.id,
							isPay 			: true,				
							issued_date 	: value.issued_date,
							fullname 		: fullIdName,							
							number			: value.number,										
							amount 			: remainAmount,
							pay_amount 		: remainAmount,
							rate 			: value.rate,
							locale 			: value.locale,
							contact_id 		: value.contact_id,
							company_id 		: value.company_id
 						});
						self.change();
						self.autoIncreaseNo();
					} else if (result.length == 1) {
					  	// access the foo property using result[0].foo					  
					} else {
					  	// multiple items found					  
					}		    					    		
		    	});		    	
			});			
		},						
		autoIncreaseNo 		: function(){
			$(".sno").each(function(index,element){                 
			   $(element).text(index + 1); 
			});
		},
		change				: function(){		
			var total = 0;		
		    var tpay = 0;
		    $.each(this.get("invoiceList"), function(index, value){
		    	total += kendo.parseFloat(value.amount)*kendo.parseFloat(value.rate);
		    	tpay += kendo.parseFloat(value.pay_amount)*kendo.parseFloat(value.rate);
		    });

		    this.set("pay_amount", kendo.toString(tpay, "c0", "km-KH"));		  	   	    	
	    	
	    	var receive_amount = tpay + kendo.parseFloat(this.get("fine"));
			this.set("receive_amount", kendo.toString(receive_amount, "c0", "km-KH"));
	    	
	    	var remain = (total + kendo.parseFloat(this.get("fine"))) - (tpay + kendo.parseFloat(this.get("discount")));
	    	this.set("remain", kendo.toString(remain, "c0", "km-KH"));	    	   	
		},	
		remove 				: function(e){
			if (confirm("តើលោកអ្នកពិតជាចង់លុបមែនឬទេ?")) {        
		        var item = e.data,
		        index = this.get("invoiceList").indexOf(item);
		        this.get("invoiceList").splice(index, 1);
		        this.change();
		        this.autoIncreaseNo();
	    	}	    	
	    },
	    checkPay 			: function(e){
	    	e.preventDefault();

	    	var d = e.data;
	    	var target = e.currentTarget;

	    	if(target.checked){
	    		d.set("pay_amount", d.amount);
	    	}else{
	    		d.set("pay_amount", 0);
	    	}
	    	this.change();
	    },
		save 		 		: function(){
			var self = this, data = this.get("invoiceList");
			
			if(data.length>0){
				$.each(data, function(index, value){
					if(kendo.parseFloat(value.pay_amount)>0){
						var status = 2; //Partialy Paid
						if(value.pay_amount>=value.amount){							
							 status = 1; //Paid
						}

						self.dataSource.add({
							company_id 			: value.company_id,
							contact_id 			: value.contact_id,
							cashier_id 			: self.get("cashier"),
							meter_id 			: 0,							
							reference_id		: value.id,														
							payment_method_id	: this.get("payment_method_id"),
							cash_account_id		: this.get("cash_account_id"),
							check_no			: this.get("check_no"),							
							type 				: "invoice",
							amount 				: value.pay_amount,
							fine 				: self.get("fine"),
							discount 			: self.get("discount"),
							rate 				: value.rate,
							locale 				: value.locale,
							payment_date		: kendo.toString(self.get("payment_date"), "yyyy-MM-dd"),

							status 				: status
						});
					}
				});

				this.updateInvoiceDS.sync();
				this.dataSource.sync();
				var saved = false;
				this.dataSource.bind("requestEnd", function(e){
					if(saved==false){
						saved = true;

						self.clear();
						self.loadPaymentByCashier();
					}
				});
			}
		},					
		clear 				: function() {
			this.set("check_no", "");			
			this.set("discount", 0);
			this.set("fine", 0);		
			this.set("pay_amount", kendo.toString(0,"c0", "km-KH"));
			this.set("receive_amount", kendo.toString(0,"c0", "km-KH"));
			this.set("remain", kendo.toString(0,"c0", "km-KH"));

			this.set("invoiceList", []);

			this.updateInvoiceDS.data([]);
			this.dataSource.data([]);							
		}
	});
	banhji.reconcile = kendo.observable({
		dataSource 				: dataStore(baseUrl + "reconciles"),
		existingDS 				: dataStore(baseUrl + "reconciles"),
		prevAmountDS			: dataStore(baseUrl + "reconciles"),
		reconcileItemDS			: dataStore(baseUrl + "reconciles/item"),
		paymentDS 				: dataStore(baseUrl + "payments"),
		denominationList 		: [
				{ 'denomination':1, 'khr_qty':'', 'usd_qty':'', 'khr_transfer':'', 'usd_transfer': '' },
				{ 'denomination':2, 'khr_qty':'', 'usd_qty':'', 'khr_transfer':'', 'usd_transfer': '' },
				{ 'denomination':5, 'khr_qty':'', 'usd_qty':'', 'khr_transfer':'', 'usd_transfer': '' },
				{ 'denomination':10, 'khr_qty':'', 'usd_qty':'', 'khr_transfer':'', 'usd_transfer': '' },
				{ 'denomination':20, 'khr_qty':'', 'usd_qty':'', 'khr_transfer':'', 'usd_transfer': '' },
				{ 'denomination':50, 'khr_qty':'', 'usd_qty':'', 'khr_transfer':'', 'usd_transfer': '' },
				{ 'denomination':100, 'khr_qty':'', 'usd_qty':'', 'khr_transfer':'', 'usd_transfer': '' },
				{ 'denomination':200, 'khr_qty':'', 'usd_qty':'', 'khr_transfer':'', 'usd_transfer': '' },
				{ 'denomination':500, 'khr_qty':'', 'usd_qty':'', 'khr_transfer':'', 'usd_transfer': '' },
				{ 'denomination':1000, 'khr_qty':'', 'usd_qty':'', 'khr_transfer':'', 'usd_transfer': '' },
				{ 'denomination':2000, 'khr_qty':'', 'usd_qty':'', 'khr_transfer':'', 'usd_transfer': '' },
				{ 'denomination':5000, 'khr_qty':'', 'usd_qty':'', 'khr_transfer':'', 'usd_transfer': '' },
				{ 'denomination':10000, 'khr_qty':'', 'usd_qty':'', 'khr_transfer':'', 'usd_transfer': '' },
				{ 'denomination':20000, 'khr_qty':'', 'usd_qty':'', 'khr_transfer':'', 'usd_transfer': '' },
				{ 'denomination':50000, 'khr_qty':'', 'usd_qty':'', 'khr_transfer':'', 'usd_transfer': '' },
				{ 'denomination':100000, 'khr_qty':'', 'usd_qty':'', 'khr_transfer':'', 'usd_transfer': '' }
		],		
		reconcileItemList 		: [],	

		obj 					: null,		
		searchDate 				: new Date(),			
		isEdit 					: false,
		isExisting 				: false,

		cashier 				: banhji.userManagement.getLogin() === null ? 0 : banhji.userManagement.getLogin().id,
		cashier_name 			: banhji.userManagement.getLogin() === null ? "" : banhji.userManagement.getLogin().username,
		
		pageLoad 				: function(id){
			if(id){
				this.set("isEdit", true);
				this.loadReconcile(id);
			}else{				
				this.set("isEdit", false);				
				this.addEmpty();
				this.loadPayment();
				this.loadPreviousAmount();

				this.checkExisting();
			}
		},
		str_date 				: function(){
			var strDate = "", obj = this.get("obj");

			if(obj){
				strDate = kendo.toString(new Date(obj.reconciled_date), "dd-MM-yyyy");
			}

			return strDate;
		},		
		loadReconcile 			: function(id){				
			var self = this, obj = this.get("obj");			
						
			this.dataSource.query({
				filter: { field: "id" , value: id },
				page: 1,
				take: 50
			}).then(function(){
				var view = self.dataSource.view();

				self.set("obj", view[0]);
				self.reconcileItemDS.filter({ field:"reconcile_id", value: id });				
			});								
		},
		loadPreviousAmount 			: function(){
			var self = this, obj = this.get("obj");

			this.prevAmountDS.query({
				filter: [
					{ field: "cashier", value: this.get("cashier") },										
					{ field: "reconciled_date <=", value: kendo.toString(new Date(), "yyyy-MM-dd") }
				],				
				page: 1,
				take: 1
			}).then(function(){
				var view = self.prevAmountDS.view();

				obj.set("previous_amount", view[0].balance);
			});			
		},
		loadPayment 			: function(){
			var self = this, obj = this.get("obj");

			this.paymentDS.query({
				filter: [
					{ field: "cashier", value: this.get("cashier") },
					{ field: "type" , value: "invoice" },						
					{ field: "payment_date", value: kendo.toString(new Date(), "yyyy-MM-dd") }
				],
				aggregate: [
					{ field: "amount", aggregate: "sum" }
				],
				page: 1,
				take: 50
			}).then(function(){
				var results = self.paymentDS.aggregates().amount;

				obj.set("received_amount", results.sum);
			});			
		},
		checkExisting 			: function(){				
			var self = this;			
						
			this.existingDS.query({
				filter: [
					{ field: "cashier", value: this.get("cashier") },										
					{ field: "reconciled_date", value: kendo.toString(new Date(), "yyyy-MM-dd") }
				],
				page: 1,
				take: 50
			}).then(function(){
				var view = self.existingDS.view();

				if(view.length>0){
					self.set("isExisting", true);
				}else{
					self.set("isExisting", false);
				}					
			});								
		},		
		change					: function(){
			var totalD = 0;
			var totalR = 0;
			var totalDT = 0;
			var totalRT = 0;

			for(var i=0; i < this.denominationList.length; i++){
				var data = this.denominationList[i];
				var dem = kendo.parseFloat(data.denomination);

		    	totalD += kendo.parseFloat(data.qty_usd) * dem;
		    	totalR += kendo.parseFloat(data.qty_khr) * dem;

		    	totalDT += kendo.parseFloat(data.qty_usd_transfer) * dem;
		    	totalRT += kendo.parseFloat(data.qty_khr_transfer) * dem;	    	
			}

			this.set('totalD', kendo.toString(totalD, 'n0'));
			this.set('totalR', kendo.toString(totalR, 'c0'));

			this.set('totalDT', kendo.toString(totalDT, 'n0'));
			this.set('totalRT', kendo.toString(totalRT, 'c0'));		  	 	
		},	
		transferAll 			: function(){
			$.each(this.reconcileItemDS.data(), function(index, value){
				if(value.khr_qty>0){									
					value.set("khr_transfer", value.khr_qty);
				}

				if(value.usd_qty>0){									
					value.set("usd_transfer", value.usd_qty);
				}
			});
			
			this.change();
		},
		change 					: function(){
			var obj = this.get("obj"),
			khr_sum = 0, usd_sum = 0, khr_transfer_sum = 0, usd_transfer_sum = 0,
			usd2khr_amount = 0, usd2khr_transfer_amount = 0;

			$.each(this.reconcileItemDS.data(), function(index, value){
				if(value.khr_qty>0){
					var khrAmt = kendo.parseFloat(value.denomination) * kendo.parseFloat(value.khr_qty);
					khr_sum += khrAmt;					
					value.set("khr_amount", khrAmt);
				}

				if(value.usd_qty>0){
					var usdAmt = kendo.parseFloat(value.denomination) * kendo.parseFloat(value.usd_qty);
					usd_sum += usdAmt;
					value.set("usd_amount", usdAmt);
				}

				if(value.khr_transfer>0){
					var khr_transfer_amt = kendo.parseFloat(value.denomination) * kendo.parseFloat(value.khr_transfer);
					khr_transfer_sum += khr_transfer_amt;
					value.set("khr_transfer_amount", khr_transfer_amt);
				}

				if(value.usd_transfer>0){
					var usd_transfer_amt = kendo.parseFloat(value.denomination) * kendo.parseFloat(value.usd_transfer);
					usd_transfer_sum += usd_transfer_amt;
					value.set("usd_transfer_amount", usd_transfer_amt);
				}
			});

			//Refresh lisview
			var listView = $("#lvReconcileItem").data("kendoListView");			
			listView.refresh();

			//Total Cash1
			obj.set("total_cash1", kendo.parseFloat(obj.received_amount) + kendo.parseFloat(obj.previous_amount));

			//Actual cash
			obj.set("usd_amount", usd_sum);
			usd2khr_amount = obj.rate * usd_sum;
			obj.set("usd2khr_amount", usd2khr_amount);

			obj.set("khr_amount", khr_sum);

			//Total Cash2
			obj.set("total_cash2", kendo.parseFloat(obj.khr_amount) + kendo.parseFloat(obj.usd2khr_amount));

			//Reconcile
			obj.set("reconciled_amount", kendo.parseFloat(obj.total_cash1) - kendo.parseFloat(obj.total_cash2));

			//Transer
			obj.set("transfer_usd", usd_transfer_sum);
			usd2khr_transfer_amount = kendo.parseFloat(obj.rate) * kendo.parseFloat(usd_transfer_sum);
			obj.set("usd2khr_transfer_amount", usd2khr_transfer_amount);

			obj.set("transfer_khr", khr_transfer_sum);

			//Transfered amount
			obj.set("transfered_amount", kendo.parseFloat(obj.usd2khr_transfer_amount) + kendo.parseFloat(obj.transfer_khr));

			//Balance
			obj.set("balance", kendo.parseFloat(obj.total_cash1) - kendo.parseFloat(obj.transfered_amount));
		},
		addEmpty 				: function(){
			var self = this;
			this.set("isEdit", false);
			this.dataSource.data([]);
			this.reconcileItemDS.data([]);        	
      		
			this.dataSource.add({
				company_id 				: 0,
				transfer_account_id 	: 2,
				cashier 				: this.get('cashier'),															
				rate					: 4000,
				received_amount 		: 0,
				previous_amount 		: 0,
				total_cash1 			: 0,
				usd_amount 				: 0,
				usd2khr_amount			: 0,
				khr_amount 				: 0,
				total_cash2 			: 0,
				reconciled_amount 		: 0,
				transfer_usd			: 0,
				usd2khr_transfer_amount	: 0,
				transfer_khr 			: 0,					
				transfered_amount		: 0,
				balance 				: 0,										
				memo 					: "",
				reconciled_date 		: new Date(),
				status 					: 1		
			});			

			//Reconcile Item							
			$.each(this.get("denominationList"), function(index, value){
				self.reconcileItemDS.add({
					"reconcile_id" 			: 0,
					"denomination" 			: value.denomination,			   			   						   
				   	"khr_qty" 				: value.khr_qty,
				   	"khr_amount"			: 0,		   	
				   	"usd_qty" 				: value.usd_qty,
				   	"usd_amount"			: 0,
				   	"khr_transfer" 			: value.khr_transfer,
				   	"khr_transfer_amount" 	: 0,
				   	"usd_transfer" 			: value.usd_transfer,
				   	"usd_transfer_amount" 	: 0
				});
			});			

			var data = this.dataSource.data();			
			var obj = data[data.length - 1];			
			this.set("obj", obj);	
		},
		save 					: function(){
			var self = this;

			this.dataSource.sync();
			this.reconcileItemDS.sync();
		},			
		addReconcile 			: function(){
			var dfd = $.Deferred();

			var tr = this.get("totalReceive");
			var pr = this.get("prevRemain");				
			var receiveAmount = Number(tr.replace(/[^0-9\.]+/g,""));
			var prevRemain = Number(pr.replace(/[^0-9\.]+/g,""));		

			banhji.ds.reconcileDS.add({
				cashier 			: this.get('cashier'),					 
				reconciled_date 	: kendo.toString(new Date(), 'yyyy-MM-dd'),					
				rate				: this.get('rate'),
				received_amount 	: receiveAmount,
				prev_remain 		: prevRemain,
				reconciled_amount	: kendo.parseFloat(this.totalDR()),
				transfered_amount	: kendo.parseFloat(this.totalTransferCash()),
				transfer_account_id : this.get('transfer_account_id'),
				class_id 			: this.get('class_id'),
				memo 				: this.get('memo')
			});				        

	    	banhji.ds.reconcileDS.sync();
		    banhji.ds.reconcileDS.bind("requestEnd", function(e){			    	
				dfd.resolve(e.response.results);    				
		    });

		    return dfd;		
		},
		addJournal 				: function(){
			var self = this;				
			var totalTransferCash = kendo.parseFloat(this.totalTransferCash());

			//Transfer account on Dr
			banhji.journalEntry.add({
				journal_id 	: 0,
		 		account 	: this.get("transfer_account_id"), 		
		 		dr 			: totalTransferCash, 
		 		cr 			: 0,
		 		class_id  	: self.get("class_id"),
		 		memo 		: self.get("memo"),
		 		exchange_rate: 1,
			 	main 		: 0	 		
			});				
			
			var cashInTillList = {};
			$.each(banhji.ds.invoiceDS.data(), function(index, value){
				var cash_in_till_id = value.cash_account_id;
				var amt = kendo.parseFloat(value.paid)															
				if(cash_in_till_id>0){
					if(cashInTillList[cash_in_till_id]===undefined){
						cashInTillList[cash_in_till_id]={"id": cash_in_till_id, "amt": amt};						
					}else{											
						if(cashInTillList[cash_in_till_id].id===cash_in_till_id){
							cashInTillList[cash_in_till_id].amt += amt;
						}else{
							cashInTillList[cash_in_till_id]={"id": cash_in_till_id, "amt": amt};
						}
					}
				}
			});

			//Cash in till on Cr
			$.each(cashInTillList, function(index, value){					
				banhji.journalEntry.add({
					journal_id 	: 0,
			 		account 	: value.id,	 		
			 		dr 			: 0, 
			 		cr 			: value.amt,
			 		class_id  	: self.get("class_id"),
			 		memo 		: self.get("memo"),
			 		exchange_rate: 1,
				 	main 		: 0	 		
				});
			});

		 	//Add journal to datasource
			banhji.transaction.addNew();
			var journal = banhji.transaction.get("current");
			
			journal.set("company_id", banhji.config.userData.company);
			journal.set("people_id", 0);
			journal.set("employee_id", banhji.config.userData.userId);
			journal.set("payment_id", 0);
			journal.set("payment_term_id", 0);
			journal.set("transaction_type", "Reconcile");
			journal.set("payment_method", "");
			journal.set("check_no", null);
			journal.set("memo", "ផ្ទៀងផ្ទាត់ និង ផ្ទេរសាច់ប្រាក់");
			journal.set("date", kendo.toString(new Date(this.get("searchDate")), "yyyy-MM-dd"));				
			journal.set("amount_billed", totalTransferCash);
			journal.set("amount_due", 0);
			journal.set("amount_paid", 0);
			journal.set("voucher", null);
			journal.set("class_id", this.get("class_id"));
			journal.set("status", 0);
			journal.set("reference", null);
			journal.set("vat_id", {id: null});
			journal.set("inJournal", 1);			 	
		 			 	
		 	banhji.transaction.save()
		 	.then(function(journal){			 		
	 			$.each(banhji.journalEntry.dataSource.data(), function(index, value){
	 				value.set("journal_id", journal.data.id);
	 			});
	 					 			
	 			banhji.journalEntry.save();
		 	});			  
		}
	});


	/*************************
	*	Inventory Section   *
	**************************/
	banhji.itemDashBoard = kendo.observable({
		dataSource 			: dataStore(baseUrl + "items"),
		topWorstItemDS 		: dataStore(baseUrl + "items"),
		topVendorItemDS 	: dataStore(baseUrl + "items"),
		topSaleItemDS 		: dataStore(baseUrl + "items"),
						
		pageLoad 			: function(){
			
		},
		loadTopWorstItemDS : function(){
			this.topWorstItemDS.query({				
				page: 1,
				take: 5
			});
		},
		loadTopVendorItemDS : function(){
			this.topVendorItemDS.query({				
				page: 1,
				take: 5
			});
		},
		loadTopSaleItemDS : function(){
			this.topSaleItemDS.query({				
				page: 1,
				take: 5
			});
		}
	});
	banhji.itemCenter =  kendo.observable({    	
    	dataSource 			: dataStore(baseUrl + "items"),
    	categoryDS 			: dataStore(baseUrl + "categories"),
    	itemGroupDS 		: dataStore(baseUrl + "items/group"),    	
    	contactDS  			: dataStore(baseUrl + "contacts"),
    	vendorDS  			: dataStore(baseUrl + "contacts"),
    	    	
    	searchField			: "",
    	category_id 		: 0,
    	item_group_id 		: 0,     	
    	
    	pageLoad 			: function(){    		
    		
    	},
    	search 				: function(){
    		var para = [],
    		searchField = this.get("searchField"),
    		category_id = this.get("category_id"),
    		item_group_id = this.get("item_group_id");

    		if(searchField!==""){
    			para.push(      				
      				{ field: "sku", operator: "like", value: searchField },
      				{ field: "name", operator: "or_like", value: searchField }
      			);
    		}

    		if(item_group_id>0){
    			para.push({ field:"item_group_id", value:item_group_id });
    		}else if(category_id>0){
    			para.push({ field:"category_id", value:category_id });
    		}

    		this.dataSource.filter(para);    		
    	},
    	searchFavorite 	: function(){
    		this.dataSource.filter({ field:"favorite", value: 1 });
    	},    	
    	vendorChanges 	: function(e){    		
    		var index = e.sender.select().index();
    		var data = this.vendorDS.at(index);    		
    		
    		this.dataSource.filter({ field:"contact_id", operator:"by_vendor", value:data.id });
    	}    		
    });	
	banhji.priceList =  kendo.observable({    	
    	dataSource 	: dataStore(baseUrl + "price_lists"),
    	productDS 	: dataStore(baseUrl + "items"),
    	stockDS 	: dataStore(baseUrl + "items/record"),    	
    	currencyDS 	: dataStore(baseUrl + "currencies"),    	
    	unitDS	   	: dataStore(baseUrl + "measurements"),

    	product 	: null,
    	priceList 	: null,
    	
    	pageLoad 	: function(id){    		
    		this.dataSource.filter({ field:"item_id", value: id });    		
    		this.stockDS.query({
    			filter: [
    				{ field:"item_id", value: id },
    				{ field:"movement", value: "IN" }
    			],
    			sort: { field: "issued_date", dir: "desc" }
    		});    		
    		this.loadProduct(id);
    	},
    	loadProduct : function(id){
    		var self = this;

    		this.productDS.query({    			
				filter: { field:"id", value: id }
			}).then(function(e){
				var view = self.productDS.view();
						    	
		    	self.set("product", view[0]);
			});
    	},
    	openWindow	: function(){
      		this.addEmpty();

         	var window = $("#priceList-window").data("kendoWindow");
          	window.title("តំលៃ");          	
          	window.center().open();         	
      	},
      	closeWindow : function(){	      		
      		this.dataSource.cancelChanges();

      		var window = $("#priceList-window").data("kendoWindow");          	         	
          	window.close();          	
      	},      	
      	addEmpty 	: function () {
      		this.dataSource.add({
      			currency_id 	: 0,      			
      			item_id		: this.get("product").id,
      			measurement_id 		: 0,
      			price 			: 0,
      			unit_value		: 0,

      			currency 		: [{locale:"km-KH"}],      			
      			measurement 	: []
			});

			var data = this.dataSource.data();
			var obj = data[data.length - 1];
      						
			this.set("priceList", obj);	
      	},      	 	
      	save 			: function(){
      		this.dataSource.sync();
      		banhji.itemCenter.dataSource.fetch();

      		var window = $("#priceList-window").data("kendoWindow");          	         	
          	window.close(); 		
      	},
      	edit 			: function(e){
      		var data = e.data;
      		
      		this.set("priceList", data);

      		var window = $("#priceList-window").data("kendoWindow");
          	window.title("តំលៃ");          	
          	window.center().open();       		
      	},      	
      	delete 			: function(e){
			if (confirm("តើលោកអ្នកពិតជាចង់លុបមែនឬទេ?")) {        
		        var data = e.data;
		        this.dataSource.remove(data);
		        this.dataSource.sync();
		        banhji.itemCenter.dataSource.fetch();
	    	}	    	
	    }
    });	
    banhji.item =  kendo.observable({    	
    	dataSource 			: dataStore(baseUrl + "items"),
    	categoryDS 			: dataStore(baseUrl + "categories"),    	   	   	
    	measurementDS		: dataStore(baseUrl + "measurements"),   	
    	
    	statusList 				: [            
			{ "id": 1, "name": "កំពុងប្រើប្រាស់" },
			{ "id": 2, "name": "ផ្អាក់ប្រើប្រាស់" },
			{ "id": 0, "name": "ឈប់ប្រើប្រាស់" }
        ],

    	obj 	 			: null,
    	isEdit 				: false,
    	
    	pageLoad 			: function(id){			
			if(id){
				this.set("isEdit", true);							
				this.loadObj(id);
			}else{				
				if(this.get("isEdit")){
					this.set("isEdit", false);
					
					this.dataSource.data([]);					
					
					this.addEmpty();
				}else if(this.dataSource.total()==0){
					this.addEmpty();					
				}								
			}  																							
		},
    	loadObj 	: function(id){
    		var self = this;

    		this.dataSource.query({    			
				filter: { field:"id", value: id }
			}).then(function(e){
				var view = self.dataSource.view();
						    	
		    	self.set("obj", view[0]);
			});
    	},    	   	
      	addEmpty 		: function(){      		
      		this.dataSource.data([]);
      		this.set("obj", null);

      		this.dataSource.add({
      			company_id 				: 0,
      			contact_id 				: 0,
      			category_id 			: 0,
      			item_type_id 			: 1,      			      			
      			measurement_id			: 0,
      			brand_id 				: 0,
      			main_id 				: 0,
      			sku 					: "",
      			supplier_code 			: "",
      			color_code 				: "",
      			name 					: "",
      			description				: "",
      			cost 					: "",
      			on_hand					: 0,      			     			
      			order_point 			: 0,
      			income_account_id 		: 0,
      			cogs_account_id  		: 0,
      			inventory_account_id 	: 0,
      			deposit_account_id 		: 0,
      			transaction_account_id 	: 0,
      			preferred_vendor_id 	: 0,
      			image_url 				: "",      			
      			favorite 				: false,
      			status 					: 1,
      			deleted 				: 0
			});      		

			var data = this.dataSource.data();
			var obj = data[data.length - 1];
      						
			this.set("obj", obj);			
      	},
      	cancel 			: function(e){
      		e.preventDefault();

      		this.dataSource.cancelChanges();
      		window.history.back();      		
      	},      	
      	save 			: function(){
      		var self = this;

      		this.dataSource.sync();
      		var saved = false;
      		this.dataSource.bind("requestEnd", function(e){
      			if(e.type=="create" && saved==false){
      				saved = true;

	      			self.addEmpty();
      			}      			
      		});      		      		
      	},      	
      	delete 			: function(){
			if (confirm("តើលោកអ្នកពិតជាចង់លុបមែនឬទេ?")) {        
		        var obj = this.dataSource.at(0);
		        this.dataSource.remove(obj);
		        this.dataSource.sync();
		        window.history.back();
	    	}	    	
	    }
    });
    banhji.itemCatalog =  kendo.observable({    	
    	dataSource 			: dataStore(baseUrl + "items"),
    	itemDS 				: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: baseUrl + "items",
					type: "GET",
					headers: {
						"Entity": getDB(),
						"User": banhji.userManagement.getLogin() === null ? '':banhji.userManagement.getLogin().id
					},
					dataType: 'json'
				},				
				parameterMap: function(options, operation) {
					if(operation === 'read') {
						return {
							limit: options.take,
							page: options.page,
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
			serverFiltering: true			
		}),
    	    	    	   	
    	statusList 			: [            
			{ "id": 1, "name": "កំពុងប្រើប្រាស់" },
			{ "id": 2, "name": "ផ្អាក់ប្រើប្រាស់" },
			{ "id": 0, "name": "ឈប់ប្រើប្រាស់" }
        ],

    	obj 	 			: null,    	
    	isEdit 				: false,
    	
    	pageLoad 			: function(id){			
			if(id){
				this.set("isEdit", true);							
				this.loadObj(id);
			}else{				
				if(this.get("isEdit")){
					this.set("isEdit", false);
					
					this.dataSource.data([]);					
					
					this.addEmpty();
				}else if(this.dataSource.total()==0){
					this.addEmpty();					
				}								
			}  																							
		},
    	loadObj 			: function(id){
    		var self = this;

    		this.dataSource.query({    			
				filter: { field:"id", value: id }
			}).then(function(e){
				var view = self.dataSource.view();
						    	
		    	self.set("obj", view[0]);		    	
			});
    	},    	   	
      	addEmpty 			: function(){      		
      		this.dataSource.data([]);      		
      		this.set("obj", null);

      		this.dataSource.add({
      			company_id 				: 0,
      			contact_id 				: 0,      			
      			category_id 			: 8,
      			brand_id 				: 0,
      			item_type_id 			: 1,      			      			
      			measurement_id			: 0,      			
      			main_id 				: 0,
      			sku 					: "",
      			supplier_code 			: "",
      			color_code 				: "",
      			name 					: "",
      			description				: "",
      			catalogs 				: "",
      			cost 					: 0,
      			price 					: 0,
      			on_hand					: 0,      			     			
      			order_point 			: 0,
      			income_account_id 		: 0,
      			cogs_account_id  		: 0,
      			inventory_account_id 	: 0,
      			deposit_account_id 		: 0,
      			transaction_account_id 	: 0,
      			preferred_vendor_id 	: 0,
      			image_url 				: "",      			
      			favorite 				: false,
      			is_catalog 				: 1,
      			status 					: 1,
      			deleted 				: 0
			});      		

			var data = this.dataSource.data();
			var obj = data[data.length - 1];
      						
			this.set("obj", obj);			
      	},      	
      	cancel 				: function(e){
      		e.preventDefault();

      		this.dataSource.cancelChanges();
      		window.history.back();      		
      	},      	
      	save 				: function(){
      		var self = this, obj = this.get("obj");
      		
      		if(this.get("isEdit")){
      			this.dataSource.sync();      			
      		}else{
	      		this.dataSource.sync();
	      		var saved = false;
	      		this.dataSource.bind("requestEnd", function(e){
	      			if(e.type=="create" && saved==false){		      						      			
		      			self.addEmpty();
	      			}
	      		});
      		}      		      		   		      		
      	},      	
      	delete 				: function(){
			if (confirm("តើលោកអ្នកពិតជាចង់លុបមែនឬទេ?")) {        
		        var obj = this.dataSource.at(0);
		        this.dataSource.remove(obj);
		        this.dataSource.sync();
		        window.history.back();
	    	}	    	
	    }
    });
	banhji.itemAssembly =  kendo.observable({    	
    	dataSource 			: dataStore(baseUrl + "items"),
    	itemDS 				: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: baseUrl + "items",
					type: "GET",
					headers: {
						"Entity": getDB(),
						"User": banhji.userManagement.getLogin() === null ? '':banhji.userManagement.getLogin().id
					},
					dataType: 'json'
				},				
				parameterMap: function(options, operation) {
					if(operation === 'read') {
						return {
							limit: options.take,
							page: options.page,
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
			group: { field: "category" },
			batch: true,
			serverFiltering: true			
		}),
    	assemblyDS 			: dataStore(baseUrl + "items/assembly"),
    	    	   	
    	statusList 			: [            
			{ "id": 1, "name": "កំពុងប្រើប្រាស់" },
			{ "id": 2, "name": "ផ្អាក់ប្រើប្រាស់" },
			{ "id": 0, "name": "ឈប់ប្រើប្រាស់" }
        ],

    	obj 	 			: null,
    	assembly_id			: "",
    	isEdit 				: false,
    	total 				: 0,
    	
    	pageLoad 			: function(id){			
			if(id){
				this.set("isEdit", true);							
				this.loadObj(id);
			}else{				
				if(this.get("isEdit")){
					this.set("isEdit", false);
					
					this.dataSource.data([]);					
					
					this.addEmpty();
				}else if(this.dataSource.total()==0){
					this.addEmpty();					
				}								
			}  																							
		},
    	loadObj 			: function(id){
    		var self = this;

    		this.dataSource.query({    			
				filter: { field:"id", value: id }
			}).then(function(e){
				var view = self.dataSource.view();
						    	
		    	self.set("obj", view[0]);
		    	self.assemblyDS.filter({ field:"item_id", value:id });
		    	self.set("total", kendo.toString(view[0].price, "c", banhji.institute.locale));
			});
    	},
    	changes				: function(){
			var obj = this.get("obj");

			if(this.assemblyDS.total()>0){			
				var total = 0, subTotal = 0;										

				$.each(this.assemblyDS.data(), function(index, value) {				
					subTotal = value.quantity * value.price;
					total += subTotal;

					value.set("amount", subTotal);					
		        });
		          
				obj.set("price", total);
				this.set("total", kendo.toString(total, "c", banhji.institute.locale));													    	
	    	}else{	    				
				obj.set("price", 0);
				this.set("total", 0);					
	    	}   	
		},		
		measurementChanges 	: function(e){								
			var self = this, data = e.data;
			
			if(data.measurement_id>0){
				$.each(data.priceList, function(index, value){
					if(value.measurement_id==data.measurement_id){						
				        data.set("price", kendo.parseFloat(value.price));				       			       
				        
						return false;
					}
				});	    		
		        	        
		        this.changes();
	        }	                	        	
		},    	   	
      	addEmpty 			: function(){      		
      		this.dataSource.data([]);
      		this.assemblyDS.data([]);
      		this.set("obj", null);

      		this.dataSource.add({
      			company_id 				: 0,
      			contact_id 				: 0,      			
      			category_id 			: 9,
      			brand_id 				: 0,
      			item_type_id 			: 1,      			      			
      			measurement_id			: 0,      			
      			main_id 				: 0,
      			sku 					: "",
      			supplier_code 			: "",
      			color_code 				: "",
      			name 					: "",
      			description				: "",
      			cost 					: "",
      			on_hand					: 0,      			     			
      			order_point 			: 0,
      			income_account_id 		: 0,
      			cogs_account_id  		: 0,
      			inventory_account_id 	: 0,
      			deposit_account_id 		: 0,
      			transaction_account_id 	: 0,
      			preferred_vendor_id 	: 0,
      			image_url 				: "",      			
      			favorite 				: false,
      			status 					: 1,
      			is_assemble 			: 1,
      			deleted 				: 0
			});      		

			var data = this.dataSource.data();
			var obj = data[data.length - 1];
      						
			this.set("obj", obj);			
      	},
      	addItem 			: function(){      		
      		var assembly_id = this.get("assembly_id"),
      		isExisting = false,
      		item = this.itemDS.get(assembly_id),
      		item_id = 0, obj = this.get("obj");
			
			if(this.get("isEdit")){
				item_id = obj.id;
			}
      		
      		if(item){
	      		if(this.assemblyDS.total()>0){
	      			$.each(this.assemblyDS.data(), function(index, value){
	      				if(value.assembly_id==assembly_id){
	      					isExisting = true;

	      					return false;
	      				}
	      			});
	      		}
	      		
	      		if(isExisting===false){	      			
		      		this.assemblyDS.add({
		      			item_id 		: item_id,
		      			assembly_id 	: assembly_id,
		      			currency_id 	: item.price_list[0].currency_id,
		      			measurement_id 	: item.price_list[0].measurement_id,
		      			quantity 		: 1,
		      			unit_value 		: 0,
		      			price 			: item.price_list[0].price,
		      			amount 			: item.price_list[0].price,
		      			
		      			assembly 		: [{ sku:item.sku, name:item.name, description:item.description }],
		      			currency 		: [item.price_list[0].currency[0]],
		      			price_list 		: item.price_list		      			
					});

					this.changes();	      		
				}
			}			
      	},
      	removeItem 			: function(e){
      		e.preventDefault();

      		if (confirm("តើលោកអ្នកពិតជាចង់លុបមែនឬទេ?")) {        
		        var data = e.data, 
		        obj = this.assemblyDS.get(data.id);

		        this.assemblyDS.remove(obj);		        	        
	    	}
      	},
      	cancel 				: function(e){
      		e.preventDefault();

      		this.dataSource.cancelChanges();
      		window.history.back();      		
      	},      	
      	save 				: function(){
      		var self = this;

      		if(this.get("isEdit")){
      			this.dataSource.sync();
      			this.assemblyDS.sync();
      		}else{
	      		this.itemSync().then(function(item){
	      			$.each(self.assemblyDS.data(), function(index, value){
	      				value.set("item_id", item[0].id);
	      			});

	      			self.assemblyDS.sync();
	      		}).then(function(){
	      			self.dataSource.data([]);
	      			self.assemblyDS.data([]);

	      			self.addEmpty();
	      		});
      		}      		   		      		
      	},      	
      	delete 				: function(){
			if (confirm("តើលោកអ្នកពិតជាចង់លុបមែនឬទេ?")) {        
		        var obj = this.dataSource.at(0);
		        this.dataSource.remove(obj);
		        this.dataSource.sync();
		        window.history.back();
	    	}	    	
	    },
	    itemSync 			: function(){
	    	var dfd = $.Deferred();	        

	    	this.dataSource.sync();
		    this.dataSource.bind("requestEnd", function(e){			    	
				dfd.resolve(e.response.results);    				
		    });

		    return dfd;	    		    	
	    }
    });
	banhji.itemRecord =  kendo.observable({    	
    	dataSource 			: dataStore(baseUrl + "items/record"),
    	itemDS 				: dataStore(baseUrl + "items"),
    	invoiceDS 			: dataStore(baseUrl + "invoices"),    	
    	currencyDS 			: dataStore(baseUrl + "currencies"),
    	contactDS  			: dataStore(baseUrl + "contacts"),
    	measurementDS 	   	: dataStore(baseUrl + "measurements"),
    	
    	obj 				: null,
    	item 				: null,    	
    	isEdit 				: false,

    	pageLoad 			: function(id){			
			if(id){
				this.set("isEdit", true);							
				this.loadObj(id);
			}else{				
				if(this.get("isEdit")){
					this.set("isEdit", false);
					
					this.dataSource.data([]);					
					
					this.addEmpty();
				}else if(this.dataSource.total()==0){
					this.addEmpty();					
				}								
			}  																							
		},
		loadObj 			: function(id){
    		var self = this;

    		this.dataSource.query({    			
				filter: { field:"id", value: id }
			}).then(function(e){
				var view = self.dataSource.view();
						    	
		    	self.set("obj", view[0]);
			});
    	},
    	loadItem     		: function(id){
    		var self = this;

    		this.itemDS.query({
    			filter: { field:"id", value: id }
    		}).then(function(){
    			var view = self.itemDS.view();

    			self.set("item", view[0]);
    		});
    	},
    	itemChanges 		: function(){
    		var obj = this.get("obj");

    		if(obj.item_id>0){
    			var item = this.itemDS.get(obj.item_id);

    			this.set("item", item);
    		}
    	},	
      	addEmpty 			: function(){
      		this.dataSource.data([]);
      		this.set("obj", null);

      		this.dataSource.add({
      			contact_id 		: "",
      			reference_id 	: "",      			
      			currency_id 	: 1,      				      			
      			measurement_id 	: 0,
      			item_id 		: "",
      			unit 			: 0,
      			price 			: 0,
      			amount			: 0,
      			rate 			: 1,
      			movement 		: "IN",
      			issued_date		: new Date(),
      			memo 			: ""
			});

			var data = this.dataSource.data();
			var obj = data[data.length - 1];
      						
			this.set("obj", obj);      					
      	},      	
      	cancel 		 	: function(e){
      		e.preventDefault();

      		this.dataSource.cancelChanges();
      		window.history.back();      		
      	}, 
      	save 			: function(){
      		var self = this, obj = this.get("obj");

      		if(obj.unit<0){
      			obj.set("movement", "OUT");
      		}

      		this.dataSource.sync();
      		var saved = false;
      		this.dataSource.bind("requestEnd", function(e){
      			if(e.type=="create" && saved==false){
      				saved = true;

      				self.addEmpty();
      			}
      		});
      	},      	
      	delete 			: function(e){
			if (confirm("តើលោកអ្នកពិតជាចង់លុបមែនឬទេ?")) {        
		        var data = e.data;
		        this.dataSource.remove(data);
		        this.dataSource.sync();
	    	}	    	
	    }
    });
    banhji.itemAdjustment = kendo.observable({
		dataSource 			: dataStore(baseUrl + "items/record"),
		itemDS 				: dataStore(baseUrl + "items"),
		segmentItemDS		: banhji.segmentItem.ds,
		itemDS 				: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: baseUrl + "items",
					type: "GET",
					headers: {
						"Entity": getDB(),
						"User": banhji.userManagement.getLogin() === null ? '':banhji.userManagement.getLogin().id
					},
					dataType: 'json'
				},
				create 	: {
					url: baseUrl + "items",
					type: "POST",
					headers: {
						"Entity": getDB(),
						"User": banhji.userManagement.getLogin() === null ? '':banhji.userManagement.getLogin().id
					},
					dataType: 'json'
				},
				update 	: {
					url: baseUrl + "items",
					type: "PUT",
					headers: {
						"Entity": getDB(),
						"User": banhji.userManagement.getLogin() === null ? '':banhji.userManagement.getLogin().id
					},
					dataType: 'json'
				},
				destroy : {
					url: baseUrl + "items",
					type: "DELETE",
					headers: {
						"Entity": getDB(),
						"User": banhji.userManagement.getLogin() === null ? '':banhji.userManagement.getLogin().id
					},
					dataType: 'json'
				},
				parameterMap: function(options, operation) {
					if(operation === 'read') {
						return {
							limit: options.take,
							page: options.page,
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
			pageSize: 100
		}),

		obj 				: null,
		segmentList 		: [],	

		pageLoad 			: function(id){			
			if(id){
				this.set("isEdit", true);							
				this.loadObj(id);
			}else{				
				if(this.get("isEdit")){
					this.set("isEdit", false);
					
					this.dataSource.data([]);					
					
					this.addEmpty();
				}else if(this.dataSource.total()==0){
					this.addEmpty();					
				}								
			}  																							
		},
		loadObj 			: function(id){
    		var self = this;

    		this.dataSource.query({    			
				filter: { field:"id", value: id }
			}).then(function(e){
				var view = self.dataSource.view();
						    	
		    	self.set("obj", view[0]);
			});
    	}, 		
		onChange 			: function(e) {
			e.preventDefault();      		
      		
  			var total_current = 0,
  			total_count = 0,
  			total_different = 0,
  			obj = this.get("obj"),
  			index = this.dataSource.indexOf(e.data),
  			dataItem = this.dataSource.at(index+1);

  			$.each(this.itemDS.data(), function(index, value){
  				total_current += value.on_hand;
  				total_count += value.new_quantity;
  				total_different += value.different_quantity;
  			});

  			obj.set("total_current", total_current);
  			obj.set("total_count", total_count);
  			obj.set("total_different", total_different);
			
			if(dataItem){
				$(".txt"+dataItem.uid).focus();
			}else{
				dataItem = this.dataSource.at(0);
				$(".txt"+dataItem.uid).focus();
			}            
        },
        segmentChanges 		 : function(e) {
			var obj = this.get("obj"),
			dataArr = this.get("segmentList"),
			lastIndex = dataArr.length - 1;

			if(dataArr.length > 1) {
				for(var i = 0; i < dataArr.length - 1; i++) {
					var current = dataArr[i];
					if(current.segment_id === dataArr[lastIndex].segment_id) {
						dataArr.splice(lastIndex, 1);
						break;
					}
				}
			}				
		},
        addEmpty 			: function(){
      		this.dataSource.data([]);
      		this.set("obj", null);

      		this.dataSource.add({
      			reader_id 				: 0,
      			adjustment_account_id 	: 0,      			
      			reference_no 			: "",      				      			
      			total_current 			: 0,
      			total_count 			: 0,
      			total_different 		: 0,
      			memo 					: "",
      			segments				: "",
      			issued_date 			: new Date(),
      			deleted 				: 0
			});

			var data = this.dataSource.data();
			var obj = data[data.length - 1];
      						
			this.set("obj", obj);      					
      	},      	
      	cancel 		 	: function(e){
      		e.preventDefault();

      		this.dataSource.cancelChanges();
      		window.history.back();      		
      	}, 
      	save 			: function(){
      		var self = this, obj = this.get("obj");
      		
      		this.dataSource.sync();
      		var saved = false;
      		this.dataSource.bind("requestEnd", function(e){
      			if(e.type=="create" && saved==false){
      				saved = true;

      				self.addEmpty();
      			}
      		});
      	},      	
      	delete 			: function(e){
			if (confirm("តើលោកអ្នកពិតជាចង់លុបមែនឬទេ?")) {        
		        var data = e.data;
		        this.dataSource.remove(data);
		        this.dataSource.sync();
	    	}	    	
	    }
	});
	banhji.itemSetting =  kendo.observable({		        
        categoryDS 			: dataStore(baseUrl + "categories"),
        subCategoryDS 		: dataStore(baseUrl + "categories"),
        itemGroupDS 		: dataStore(baseUrl + "items/group"),
        subItemGroupDS		: dataStore(baseUrl + "items/group"),
        measurementDS		: dataStore(baseUrl + "measurements"),
        brandDS 			: dataStore(baseUrl + "brands"),
        subBrandDS			: dataStore(baseUrl + "brands"),        

        category_sub_of 	: 0,
        category_code 		: "",
        category_name 		: "",
        category_abbr 		: "",

        item_group_category_id 	: 0,
        item_group_sub_of 	: 0,
        item_group_code 	: "",
        item_group_name 	: "",
        item_group_abbr 	: "",

        measurement_name 	: "",

        brand_sub_of 	 	: 0,
        brand_code 			: "",
        brand_name 			: "",
        brand_abbr 			: "",

        pageLoad 			: function() {
        	
        },        
        addCategory 		: function(){
        	var self = this, 
        	name = this.get("category_name"),
        	code = this.get("category_code");

        	if(name!=="" && code!==""){        		
	        	this.categoryDS.add({	        		
	        		sub_of 		 	: this.get("category_sub_of"),
	        		code 			: code,	        		
	        		name 			: name,
	        		abbr 			: this.get("category_abbr"),	        		
	        		is_system 		: 0
	        	});

	        	this.categoryDS.sync();
	        	this.categoryDS.bind("requestEnd", function(e){
	        		if(e.type=="create"){
	        			self.set("category_sub_of", 0);
	        			self.set("category_code", "");
	        			self.set("category_name", "");
	        			self.set("category_abbr", "");
	        		}
	        	});
        	}else{
        		alert("ត្រូវការ លេខកូដ និង ឈ្មោះថ្មី");
        	}
        },
        addItemGroup 		: function(){
        	var self = this, 
        	category_id = this.get("item_group_category_id"),
        	name = this.get("item_group_name"),
        	code = this.get("item_group_code");

        	if(category_id>0 && name!=="" && code!==""){        		
	        	this.itemGroupDS.add({	        		
	        		category_id	 	: category_id,
	        		sub_of 		 	: this.get("item_group_sub_of"),
	        		code 			: code,	        		
	        		name 			: name,
	        		abbr 			: this.get("item_group_abbr"),	        		
	        		is_system 		: 0
	        	});

	        	this.itemGroupDS.sync();
	        	this.itemGroupDS.bind("requestEnd", function(e){
	        		if(e.type=="create"){
	        			self.set("item_group_category_id", 0);
	        			self.set("item_group_sub_of", 0);
	        			self.set("item_group_code", "");
	        			self.set("item_group_name", "");
	        			self.set("item_group_abbr", "");
	        		}
	        	});
        	}else{
        		alert("ត្រូវការ ក្រុម, លេខកូដ និង ឈ្មោះថ្មី");
        	}
        },
        addMeasurement 		: function(){
        	var self = this, 
        	name = this.get("measurement_name");

        	if(name!==""){
	        	this.measurementDS.add({	        		
	        		name 		: name,
	        		description : name
	        	});

	        	this.measurementDS.sync();
	        	this.measurementDS.bind("requestEnd", function(e){
	        		if(e.type=="create"){	        			
	        			self.set("measurement_name", "");	        			
	        		}
	        	});
        	}else{
        		alert("ត្រូវការ ឈ្មោះថ្មី");
        	}
        },
        addBrand 		: function(){
        	var self = this, 
        	code = this.get("brand_code"),
        	name = this.get("brand_name");

        	if(name!=="" && code!==""){
	        	this.brandDS.add({
	        		sub_of 		: this.get("brand_sub_of"),
	        		code 		: code,        		
	        		name 		: name,
	        		abbr 		: this.get("brand_abbr")
	        	});

	        	this.brandDS.sync();
	        	this.brandDS.bind("requestEnd", function(e){
	        		if(e.type=="create"){	        			
	        			self.set("brand_sub_of", 0);
	        			self.set("brand_code", "");
	        			self.set("brand_name", "");
	        			self.set("brand_abbr", "");	        			
	        		}
	        	});
        	}else{
        		alert("ត្រូវការ លេខកូដ និង ឈ្មោះថ្មី");
        	}
        }
    });


	/*************************
	*   Electricity Section   *
	**************************/
	banhji.eDashBoard = kendo.observable({
		dataSource 			: dataStore(baseUrl + "invoices/edashboard"),
		saleByLocationDS 	: dataStore(baseUrl + "invoices/esale_by_location"),

		sortList			: [ 
	 		{ text:"ទាំងអស់", value: "all" }, 
	 		{ text:"ថ្ងៃនេះ", value: "today" }, 
	 		{ text:"សប្ដាស៍នេះ", value: "week" }, 
	 		{ text:"ខែនេះ", value: "month" }, 
	 		{ text:"ឆ្នាំនេះ", value: "year" } 
		],
		sorter 				: "year",
		sdate 				: "",
		edate 				: "",		

		locale 				: "km-KH",
		balance 			: kendo.toString(0, "c0"),
		deposit 			: kendo.toString(0, "c0"),

		activeCustomer 		: kendo.toString(0, "n0"),		
		inactiveCustomer 	: kendo.toString(0, "n0"),
		voidCustomer 		: kendo.toString(0, "n0"),
		totalCustomer 		: kendo.toString(0, "n0"),

		totalUnpaid 		: kendo.toString(0, "n0"),
		totalDisconnect 	: kendo.toString(0, "n0"),
				
		pageLoad 			: function(){
			var self = this;			

			this.dataSource.query({			  
			  	page: 1,
			 	take: 50
			}).then(function(e) {
			    var view = self.dataSource.view();
			    
			    self.set("balance", kendo.toString(view[0], "c0"));
			    self.set("deposit", kendo.toString(view[1], "c0"));
			    
			    self.set("activeCustomer", kendo.toString(view[2], "n0"));
			    self.set("inactiveCustomer", kendo.toString(view[3], "n0"));
			    self.set("voidCustomer", kendo.toString(view[4], "n0"));
			    self.set("totalCustomer", kendo.toString(view[5], "n0"));
			    
			    self.set("totalUnpaid", kendo.toString(view[6], "n0"));
			    self.set("totalDisconnect", kendo.toString(view[7], "n0"));
		  	});
		},

		sorterChanges 		: function(){
			var value = this.get("sorter");

			switch(value){
			case "today":
				var today = new Date();
				
				this.set("sdate", today);
				this.set("edate", "");
			  					
			  	break;
			case "week":
			  	var thisWeek = new Date;
				var first = thisWeek.getDate() - thisWeek.getDay(); 
				var last = first + 6;

				var firstDayOfWeek = new Date(thisWeek.setDate(first));
				var lastDayOfWeek = new Date(thisWeek.setDate(last));				

				this.set("sdate", firstDayOfWeek);
				this.set("edate", lastDayOfWeek);
				
			  	break;
			case "month":
				var thisMonth = new Date;				  	
				var firstDayOfMonth = new Date(thisMonth.getFullYear(), thisMonth.getMonth(), 1);
				var lastDayOfMonth = new Date(thisMonth.getFullYear(), thisMonth.getMonth() + 1, 0);

				this.set("sdate", firstDayOfMonth);
				this.set("edate", lastDayOfMonth);

			  	break;
			case "year":
				var thisYear = new Date();
			  	var firstDayOfYear = new Date(thisYear.getFullYear(), 0, 1);
				var lastDayOfYear = new Date(thisYear.getFullYear(), 11, 31);

				this.set("sdate", firstDayOfYear);
				this.set("edate", lastDayOfYear);

			  	break;
			default:
				this.set("sdate", "");
				this.set("edate", "");					  
			}
		},
		autoIncreaseNo 		: function(){
			$(".sno").each(function(index,element){                 
			   $(element).text(index + 1); 
			});
		},
		search 				: function(){
			var self = this,
				start = kendo.toString(this.get("sdate"), "yyyy-MM-dd"),
        		end = kendo.toString(this.get("edate"), "yyyy-MM-dd"),	        		
        		para = [];

        	//Dates
        	if(start && end){
            	para.push({ field:"issued_date >=", value: kendo.toString(start, "yyyy-MM-dd") });
            	para.push({ field:"issued_date <=", value: kendo.toString(end, "yyyy-MM-dd") });            	            	
            }else if(start){
            	para.push({ field:"issued_date", value: kendo.toString(start, "yyyy-MM-dd") });
            }else if(end){
            	para.push({ field:"issued_date <=", value: kendo.toString(end, "yyyy-MM-dd") });
            }else{
            	
            }

            this.saleByLocationDS.query({
            	filter: para,
            	page: 1,
            	pageSize: 100
            }).then(function(){
            	self.autoIncreaseNo();
            });            
		}		
	});	
	banhji.meter = kendo.observable({		
		customer 		: null,
		meter 			: null,
		current_company_id : null,
		utility_id 		: null,		
		company_id 		: 0,
		contact_id 		: 0,

		tariffList 		: [],
		exemptionList 	: [],
		maintenanceList : [],

		ampereList 		: [],
		phaseList 		: [],
		voltageList 	: [],
		parentMeterList : [],

		dataSource 		: dataStore(baseUrl + "meters/index"),
		meterDS  		: dataStore(baseUrl + "meters/index"),
		contactDS 		: dataStore(baseUrl + "contacts/index"),
		locationDS 		: dataStore(baseUrl + "meters/location"),		
		electricityBoxDS : dataStore(baseUrl + "electricity_boxes/index"),
		electricityUnitDS : dataStore(baseUrl + "electricity_units/index"),		
		itemDS 			: dataStore(baseUrl + "meters/item"),
		feeDS 			: dataStore(baseUrl + "fees/index"),
		statusList 		: [            
			{ "id": 1, "name": "កំពុងប្រើប្រាស់" },
			{ "id": 2, "name": "ផ្អាក់ប្រើប្រាស់" },
			{ "id": 0, "name": "ឈប់ប្រើប្រាស់" }
        ],		

		pageLoad 		: function(utility_id){
			if(this.get("utility_id")!=utility_id){
			 	this.set("utility_id", utility_id);

			 	
			}								
		},
		loadData 		: function(company_id){			
			if(this.get("current_company_id")!=company_id){
			 	this.set("current_company_id", company_id);
				
				this.locationDS.filter([
					{ field:"company_id", value: company_id },
					{ field:"utility_id", value: this.get("utility_id") }
				]);

				var category_id = 1;
				if(this.get("utility_id")=="2"){
					category_id = 3;
				}
				
				this.itemDS.filter([
					{ field:"company_id", value: company_id },
					{ field:"category_id", value: category_id }
				]);

				this.loadFee(company_id);

				if(this.get("utility_id")=="1"){
					this.loadElectricityUnit(company_id);
				}
			}						
		},				
		loadFee		 	: function(company_id){
			var self = this;
			
			this.set("tariffList", []);
			this.set("exemptionList", []);
			this.set("maintenanceList", []);

			this.feeDS.filter([
				{ field:"company_id", value: company_id },
				{ field:"utility_id", value: this.get("utility_id") }
			]);
			this.feeDS.bind("requestEnd", function(e){
				var response = e.response.results;
				
				$.each(response, function(index, value){																						
					if(value.type=="tariff"){							
						self.tariffList.push({
							id 	: value.id,
							name: value.name 
						});
					}
					if(value.type=="exemption"){							
						self.exemptionList.push({
							id 	: value.id,
							name: value.name 
						});
					}
					if(value.type=="maintenance"){
						self.maintenanceList.push({
							id 	: value.id,
							name: value.name 
						});
					}								
				});
			});
		},
		loadElectricityUnit : function(company_id){
			var self = this;

			this.set("ampereList", []);
			this.set("phaseList", []);
			this.set("voltageList", []);
			
			this.electricityUnitDS.filter({ field:"company_id", value: company_id });
			this.electricityUnitDS.bind("requestEnd", function(e){
				var response = e.response.results;

				$.each(response, function(index, value){					
					if(value.type==="ampere"){
						self.ampereList.push({
							id 	: value.id,
							name: value.name 
						});
					}
					if(value.type==="phase"){
						self.phaseList.push({
							id 	: value.id,
							name: value.name 
						});
					}
					if(value.type==="voltage"){
						self.voltageList.push({
							id 	: value.id,
							name: value.name 
						});
					}									
				});
			});								
		},
		loadMeter 		: function(contact_id){
			var self = this;

			this.dataSource.filter([
				{ field:"contact_id", value: contact_id },
				{ field:"utility_id", value: this.get("utility_id") }
			]);
			this.dataSource.bind("requestEnd", function(e){
				var response = e.response.results;
				
				$.each(response, function(index, value){																						
					if(value.reactive_of==0 && value.backup_of==0){							
						self.parentMeterList.push({
							id 	: value.id,
							name: value.number 
						});
					}										
				});
			});			
		},
		addEmpty		: function(){										      		
      		this.dataSource.add({
      			company_id 			: this.get("company_id"),
      			utility_id 			: this.get("utility_id"),
      			location_id 		: 0,
      			electricity_box_id 	: 0,
      			contact_id 			: this.get("contact_id"),
      			item_id 			: 0,
      			reactive_of 		: 0,
				backup_of 			: 0,
				number 				: "",
				multiplier			: 1,
				max_number			: 10000,
				ear_sealed			: true,
				cover_sealed		: true,				
				memo				: "",	
				status				: 1,
				date_used 			: new Date(),

				item_name 			: "",
				electricity_box_number : "",
				
				amperes 			: {id:0},				
				phases 				: {id:0},				
				voltages 			: {id:0},
				
				tariffs 			: {id:0},				
				exemptions 			: {id:0},								
				maintenances 		: {id:0}
			});

			var data = this.dataSource.data();
			var obj = data[data.length - 1];
      						
			this.set("meter", obj);			
      	},
      	openMeterWindow	: function(){
      		this.addEmpty();

         	var window = $("#meter-window").data("kendoWindow");
          	window.title("កុងទ័រ");          	
          	window.center().open();         	
      	},
      	closeMeterWindow: function(){	      		
      		this.dataSource.cancelChanges();
      		var window = $("#meter-window").data("kendoWindow");          	         	
          	window.close();          	
      	},
      	edit 			: function(e){
      		var data = e.data;
      		
      		this.set("meter", data);      		    		

      		var window = $("#meter-window").data("kendoWindow");
          	window.title("កុងទ័រ");          	
          	window.center().open();
      	},
      	save 			: function(){
      		var self = this;

      		this.dataSource.sync();
      		var saved = false;
      		this.dataSource.bind("requestEnd", function(e){
      			if(saved==false){
					saved = true;

	      			self.set("meter", null);

	      			var window = $("#meter-window").data("kendoWindow");          	         	
	          		window.close();
          		}
      		});
      	},      	
      	delete 			: function(e){
			if (confirm("តើលោកអ្នកពិតជាចង់លុបមែនឬទេ?")) {        
		        var data = e.data;
		        this.dataSource.remove(data);
		        this.dataSource.sync();
	    	}	    	
	    }
	});	
	banhji.reading = kendo.observable({		
		monthOfSearch 	: null,
		company 		: null,
		location_id 	: null,
		meter_id 		: null,
		utility_id 		: null,
				
		month_of 		: new Date(),
		from_date		: new Date(),
		to_date			: new Date(),
		read_by 		: null,		
						
		dataSource 		: new kendo.data.DataSource({
			transport: {
				read: {
					url: baseUrl + "meters/reading",
					headers: {
						"Entity": getDB()
					},
					type: "GET",
					dataType: "json"
				}			  	
			},						
			pageSize: 100,							  	
		  	schema: {
				model: {
					id: "id"
				},
				data: "results",
				total: "count"	
			}
		}),
		readerDS 		: dataStore(baseUrl + "contacts/employee"),
		branchDS 		: dataStore(baseUrl + "contacts/branch"),
		elocationDS 	: dataStore(baseUrl + "meters/elocation"),
		wlocationDS 	: dataStore(baseUrl + "meters/wlocation"),
		
		meterDS			: dataStore(baseUrl + "meters/index"),
		meterRecordDS	: dataStore(baseUrl + "meters/reading"),
		
		pageLoad 		: function(utility_id){
			if(this.get("utility_id")!=utility_id){
			 	this.set("utility_id", utility_id);


			}								
		},
		strMonthOf 		: function(){
			return "អំនានប្រចាំខែ " + kendo.toString(this.get("monthOfSearch"), "MM-yyyy");
		},		
		search 			: function(){								
			var monthOfSearch = this.get("monthOfSearch");			
			var location_id = this.get("location_id");
			var meter_id = this.get("meter_id");
			var para = Array();
		
			if(monthOfSearch){				
				if(location_id || meter_id){						
					var monthOf = new Date(monthOfSearch);
					monthOf.setDate(1);
					monthOf = kendo.toString(monthOf, "yyyy-MM-dd");
					para.push({ month_of: monthOf });				
					
					this.dataSource.transport.options.read.data={
						month_of: monthOf,
						location_id: location_id,
						meter_id: meter_id
					};
					this.dataSource.read();	
				}
			}		
		},						
		isSupported 	: function() {
			// check if File API is supported in this browser
			if(window.File && window.FileReader && window.FileList && window.Blob) {
				return true;
			} else {
				return false;
			}
		},			
		readFile 		: function(e){
			e.preventDefault();
			var self = this;

			var reader = new FileReader();					
			if(this.get("isSupported")) {
				var file = document.getElementById('myFile').files[0];
				// var file = $('#myFile').get(0).files[0];

				if(file !== undefined) {
					this.set("uploadStatus", "");
					reader.readAsText(file);
					
					reader.onload = function() {						
 						var result = reader.result.split('\r');	 						
 						
						// for (var i = 1; i < result.length; i ++) {								
						// 	var data = result[i].split(',');
						// 	readingList.push(data);															
						// }

						self.dataSource.transport.options.read.data = result;
						self.dataSource.read();																		
					}

					reader.onerror = function() {							
						this.set("uploadStatus", reader.error);
					}						
				} else {
					this.set("uploadStatus", "សូមជ្រើសរើសឯកសា!");
				}

			} else {
				this.set("uploadStatus", "ឯកសារេនះពុំត្រឹមត្រូវទេ!");					
			}
		},				
      	onChange 		: function(e) {
      		e.preventDefault();

      		var self = this;
      		var selected = e.data;            
            
            if(kendo.parseInt(selected.current)>0){        
		        var add_up = 0;
		        if(selected.new_round){
		        	add_up = kendo.parseInt(selected.max_number);            	
	        	}
	        	var usage = ((kendo.parseInt(selected.current) + add_up) - kendo.parseInt(selected.previous))*selected.multiplier;
	            selected.set("usage", usage);
	            
	            if(usage<0){
					selected.set("isValid", false);
				}else{
					selected.set("isValid", true);
				}
			}else{
				selected.set("usage", "");
				selected.set("isValid", true);
			}

			var nextID = selected.index+1;
			$(".txt"+nextID).focus();            
        },
        companyChanges	: function(e){        	
        	this.set("location_id", null);
        },
        total 			: function() {      		
	        var sum = 0;

	        $.each(this.dataSource.data(), function(index, value) {	        		            
	        	sum += kendo.parseInt(value.usage);		        	          
	        });

	        return kendo.toString(sum, "n0");
	    },
	    checkInput 		: function() {	        
	        var isValid = true;
	        var hasReading = false;

	        $.each(this.dataSource.data(), function(index, value) {
	        	if(value.current>0){
	        		hasReading = true;
	        	}

	        	if(value.isValid==false){
	        		isValid = false;
	        	}		        	          
	        });

	        if(hasReading==false){
	        	isValid = false;
	        }

	        return isValid;
	    },             	
      	save 			: function(){
      		var self = this;	      		     			
  			var monthOf = new Date(this.get("month_of"));
			monthOf.setDate(1);
			monthOf = kendo.toString(monthOf, "yyyy-MM-dd");

			$.each(this.dataSource.data(), function(index, value){
				if(kendo.parseInt(value.current)>0){
					self.meterRecordDS.add({				
						meter_id	: value.id,
						read_by 	: self.get("read_by"),
						input_by 	: 0,						
					   	previous	: value.previous,
					   	current 	: value.current,					   	
					   	new_round	: value.new_round,
					   	usage 		: value.usage,					   	
					   	month_of 	: monthOf,
					   	from_date	: kendo.toString(self.get("from_date"), "yyyy-MM-dd"),						   
					   	to_date 	: kendo.toString(self.get("to_date"), "yyyy-MM-dd")
					});
				}
			});

			this.meterRecordDS.sync();
			var saved = false;				
			this.meterRecordDS.bind("requestEnd", function(e){				
				if(saved==false){
					saved = true;

					self.meterRecordDS.data([]);
					self.dataSource.data([]);
				}
			});      			
      	}      			
	});
	banhji.uInvoice = kendo.observable({		
		dataSource  	: dataStore(baseUrl + "invoices/uInvoice"),
		meterDS  		: dataStore(baseUrl + "meters"),		
		branchDS 		: dataStore(baseUrl + "contacts/branch"),
		elocationDS 	: dataStore(baseUrl + "meters/elocation"),
		wlocationDS 	: dataStore(baseUrl + "meters/wlocation"),		
		tariffItemDS 	: dataStore(baseUrl + "meters/tariff_item"),		
		readingDS 		: new kendo.data.DataSource({
			transport: {
				read: {
					url: baseUrl + "meters/reading_for_invoice",
					headers: {
						"Entity": getDB()
					},
					type: "GET",
					dataType: "json"
				}			  	
			},						
			pageSize: 100,							  	
		  	schema: {
				model: {
					id: "id"
				},
				data: "results",
				total: "count"	
			}		  			
		}),

		chkAll 			: false,		
		monthOfSearch 	: null,
		company_id 		: null,
		location_id 	: null,
		utility_id		: 1,
		biller 			: banhji.userManagement.getLogin() === null ? '':banhji.userManagement.getLogin().id,
				
		issued_date		: new Date(),
		payment_date 	: new Date(),
		due_date 		: new Date(),	
		month_of 		: new Date(),
		
		pageLoad 		: function(utility_id){
			this.set("utility_id", utility_id);

			this.tariffItemDS.read();
		},		
		search 			: function(){
			var monthOfSearch = this.get("monthOfSearch");			
			var location_id = this.get("location_id");
			var meter_id = this.get("meter_id");
			var para = Array();
		
			if(monthOfSearch){
				if(location_id || meter_id){						
					var monthOf = new Date(monthOfSearch);
					monthOf.setDate(1);
					monthOf = kendo.toString(monthOf, "yyyy-MM-dd");
					para.push({ month_of: monthOf });				
					
					this.readingDS.transport.options.read.data={
						month_of: monthOf,
						location_id: location_id,
						meter_id: meter_id
					};
					this.readingDS.read();	
				}
			}
		},	
		checkAll 		: function(e){
			e.preventDefault();

			var bolValue = this.get("chkAll");
			var data = this.readingDS.data();
			
			if(data.length>0){						
		        $.each(data, function(index, value){		        			        	
		        	value.set("isCheck", bolValue);		        	
		        });		        			        
	        }							
		},		
		companyChanges 	: function(e){				
        	e.preventDefault();
        	this.set("location_id", null);
        },
        total 			: function(){      		
	        var sum = 0;

	        $.each(this.readingDS.data(), function(index, value) {	        		            
	        	sum += kendo.parseInt(value.usage);		        	          
	        });

	        return kendo.toString(sum, "n0");
	    },	 
		save 	 		: function(){
			var self = this;
			var monthOf = new Date(this.get("month_of"));
			monthOf.setDate(1);
			monthOf = kendo.toString(monthOf, "yyyy-MM-dd");

			var data = this.readingDS.data();

			var invoiceType = "eInvoice";
			if(this.get("utility_id")==2){
				invoiceType = "wInvoice";
			}			
			//Get unique contact_id
			var uniqueCustomerID = [];
			$.each(data, function(index, value){
				if(value.isCheck){				
			    	if($.inArray(value.customers.id, uniqueCustomerID) === -1) uniqueCustomerID.push(value.customers.id);
			    }				
			});			
			
			for (var i=0;i<uniqueCustomerID.length;i++) {
				var invoiceLineList = [];
				var amount = 0, rate = 1, locale = "km-KH", company_id = 0, location_id = 0;

				//Calculation
				$.each(data, function(indexmr, mr){															
					if(mr.customers.id==uniqueCustomerID[i]){						
						var usage = kendo.parseInt(mr.usage);
						var current_amount = 0;

						var company_rate = self.branchDS.get(mr.customers.company_id).rate;						
						rate = kendo.parseFloat(company_rate)/kendo.parseFloat(mr.customers.rate);
						locale = mr.customers.locale;
						company_id = mr.customers.company_id;
						location_id = mr.meters.location_id;
						
						//Exemption as usage						
						if(mr.exemptions.length>0){							
							if(mr.exemptions[0].unit=="usage"){
								var exemptionUsage = kendo.parseFloat(mr.exemptions[0].amount);
								if(usage>exemptionUsage){
									usage -= exemptionUsage;
								}else{
									usage = 0;
								}

								invoiceLineList.push({				
							   		"invoice_id"		: 0,
									"item_id" 			: 0,															
								   	"meter_record_id"	: 0,
								   	"description" 		: mr.exemptions[0].name,					   	
								   	"unit" 				: mr.exemptions[0].amount,
								   	"price"				: 0,					   	
								   	"amount" 			: 0,
								   	"rate"				: rate,
								   	"locale" 			: locale,
								   	"has_vat" 			: false
								});
							}					
						}
						
						//Tariff						
						if(mr.tariffs.length>0){							
							$.each(self.tariffItemDS.data(), function(indext, tariff){
								var tariffUsage = kendo.parseFloat(tariff.usage);						
								var tamount = 0;
								
								if(kendo.parseInt(tariff.fee_id)==mr.tariffs[0].id){
									if(tariff.is_flat){								
										tamount = kendo.parseFloat(tariff.price);																																																																																
									}else{								
										tamount = usage * kendo.parseFloat(tariff.price);																						
									}

									invoiceLineList.push({				
								   		"invoice_id"		: 0,
										"item_id" 			: 0,																
									   	"meter_record_id"	: mr.id,
									   	"description" 		: mr.tariffs[0].name,					   	
									   	"unit" 				: usage,
									   	"price"				: tariff.price,					   	
									   	"amount" 			: tamount*rate,
									   	"rate"				: rate,
									   	"locale" 			: locale,
									   	"has_vat" 			: false
									});

									current_amount += tamount;				

									return false;						
								}
							});					
						}
						
						//Exemption as money and $
						if(mr.exemptions.length>0){											
							if(mr.exemptions[0].unit=="money"){												
								invoiceLineList.push({				
							   		"invoice_id"		: 0,
									"item_id" 			: 0,															
								   	"meter_record_id"	: 0,
								   	"description" 		: mr.exemptions[0].name,					   	
								   	"unit" 				: 1,
								   	"price"				: mr.exemptions[0].amount,					   	
								   	"amount" 			: mr.exemptions[0].amount*rate,
								   	"rate"				: rate,
								   	"locale" 			: locale,
								   	"has_vat" 			: false
								});

								if(current_amount>kendo.parseFloat(mr.exemptions[0].amount)){
									current_amount -=  kendo.parseFloat(mr.exemptions[0].amount);
								}else{
									current_amount = 0;
								}						
							}

							if(mr.exemptions[0].unit=="%"){
								var exemptionPercent = amount / kendo.parseFloat(mr.exemptions[0].amount);
								invoiceLineList.push({				
							   		"invoice_id"		: 0,
									"item_id" 			: 0,													
								   	"meter_record_id"	: 0,
								   	"description" 		: mr.exemptions[0].name,					   	
								   	"unit" 				: 1,
								   	"price"				: mr.exemptions[0].amount,					   	
								   	"amount" 			: exemptionPercent*rate,
								   	"rate"				: rate,
								   	"locale" 			: locale,
								   	"has_vat" 			: false
								});
							}
						}

						amount += current_amount;
					}					
				});				

				//Add invoice
				this.dataSource.add({				
			   		"company_id"	: company_id,
			   		"contact_id"	: uniqueCustomerID[i],
			   		"payment_term_id": 0,
			   		"payment_method_id":0,
			   		"reference_id" 	: 0,
			   		"cash_account_id": 0,
			   		"vat_id"		: 0,
			   		"biller_id" 	: this.get("biller"),
			   		"location_id" 	: location_id,	
					"number" 		: "",											
				   	"type"			: invoiceType,
				   	"amount" 		: amount*rate,
				   	"vat" 			: 0,					   	
				   	"rate" 			: rate,
				   	"locale" 		: locale,
				   	"month_of" 		: monthOf,
				   	"issued_date"	: kendo.toString(this.get("issued_date"), "yyyy-MM-dd"),					   	
				   	"payment_date" 	: kendo.toString(this.get("payment_date"), "yyyy-MM-dd"),
				   	"due_date" 		: kendo.toString(this.get("due_date"), "yyyy-MM-dd"),
				   	"check_no" 		: "",
				   	"memo" 			: "",
				   	"memo2" 		: "",
				   	"status" 		: 0,

				   	"invoice_lines" : invoiceLineList
				});
			}

			var saved = false;			
			this.dataSource.sync();
			this.dataSource.bind("requestEnd", function(e){
				if(saved==false){
					saved = true;
					
					self.readingDS.read();
				}
			});
		}	
	});	
	banhji.invoicePrint = kendo.observable({
		monthOfSearch 	: new Date("2015-08-01"),
		company_id 		: 4,
		location_id 	: 8,
		utility_id		: 1,
		invoice_id 		: null,	
		isVisible 		: true,		
				
		dataSource 	 	: dataStore(baseUrl + "invoices/print"),
		invoiceDS 	 	: dataStore(baseUrl + "invoices/index"),
		branchDS 		: dataStore(baseUrl + "contacts/branch"),
		elocationDS 	: dataStore(baseUrl + "meters/elocation"),
		wlocationDS 	: dataStore(baseUrl + "meters/wlocation"),
				
		pageLoad 		: function(utility_id, id){
			this.set("utility_id", utility_id);			
			
			if(id){

			}			
		},
		search 			: function(){
			var self = this;

			var monthOfSearch = this.get("monthOfSearch");			
			var location_id = this.get("location_id");
								
			if(monthOfSearch && location_id){								
				var monthOf = new Date(monthOfSearch);
				monthOf.setDate(1);
				monthOf = kendo.toString(monthOf, "yyyy-MM-dd");
												
				this.dataSource.query({
					filter: [
						{ field:"month_of", value: monthOf },
						{ field:"location_id", value: location_id }
					],
					page: 1,
					pageSize: 5
				}).then(function(e){
					self.barcod();
				});				
			}											
		},
		companyChanges 	: function(e){				
        	e.preventDefault();
        	this.set("location_id", null);
        },	
		barcod 			: function(){									
			var view = this.dataSource.view();
			
			for (var i=0;i<view.length;i++) {
				var d = view[i];
				
				if(this.get("utility_id")=="1"){								
					$("."+d.number).kendoBarcode({
						renderAs: "svg",
					  	value: d.customers.number,
					  	type: "code128",
					  	width: 200,
						height: 40,
						text:{
						    visible: false
						}	
					});
				}else{
					$("."+d.number).kendoBarcode({
						renderAs: "svg",
					  	value: d.customers.number,
					  	type: "code128",
					  	width: 200,
						height: 40
					});
				}
			}		
		},		
		print 			: function(e) {
			var printBtn = e.target;
			if(printBtn.checked) {
				$(".hiddenPrint").css("visibility", "hidden");
			} else {
				$(".hiddenPrint").css("visibility", "visible");
			}
		}
	});


	/*************************
	*	Water Section   *
	**************************/
	banhji.wDashBoard = kendo.observable({
		dataSource 			: dataStore(baseUrl + "invoices/wdashboard"),
		saleByBranchDS 		: dataStore(baseUrl + "invoices/wsale_by_branch"),
		saleByLocationDS 	: dataStore(baseUrl + "invoices/wsale_by_location"),

		sortList			: [ 
	 		{ text:"ទាំងអស់", value: "all" }, 
	 		{ text:"ថ្ងៃនេះ", value: "today" }, 
	 		{ text:"សប្ដាស៍នេះ", value: "week" }, 
	 		{ text:"ខែនេះ", value: "month" }, 
	 		{ text:"ឆ្នាំនេះ", value: "year" } 
		],
		sorter 				: "year",
		sdate 				: "",
		edate 				: "",		

		locale 				: "km-KH",
		balance 			: kendo.toString(0, "c0"),
		deposit 			: kendo.toString(0, "c0"),

		activeCustomer 		: kendo.toString(0, "n0"),		
		inactiveCustomer 	: kendo.toString(0, "n0"),
		voidCustomer 		: kendo.toString(0, "n0"),
		totalCustomer 		: kendo.toString(0, "n0"),

		totalUnpaid 		: kendo.toString(0, "n0"),
		totalDisconnect 	: kendo.toString(0, "n0"),
				
		pageLoad 			: function(){
			var self = this;

			this.dataSource.query({			  
			  	page: 1,
			 	take: 50
			}).then(function(e) {
			    var view = self.dataSource.view();
			    
			    self.set("balance", kendo.toString(view[0], "c0", banhji.institute.locale));
			    self.set("deposit", kendo.toString(view[1], "c0", banhji.institute.locale));
			    
			    self.set("activeCustomer", kendo.toString(view[2], "n0"));
			    self.set("inactiveCustomer", kendo.toString(view[3], "n0"));
			    self.set("voidCustomer", kendo.toString(view[4], "n0"));
			    self.set("totalCustomer", kendo.toString(view[5], "n0"));
			    
			    self.set("totalUnpaid", kendo.toString(view[6], "n0"));
			    self.set("totalNoMeter", kendo.toString(view[7], "n0"));
		  	});
		},
		sorterChanges 		: function(){
			var value = this.get("sorter");

			switch(value){
			case "today":
				var today = new Date();
				
				this.set("sdate", today);
				this.set("edate", today);
			  					
			  	break;
			case "week":
			  	var thisWeek = new Date;
				var first = thisWeek.getDate() - thisWeek.getDay(); 
				var last = first + 6;

				var firstDayOfWeek = new Date(thisWeek.setDate(first));
				var lastDayOfWeek = new Date(thisWeek.setDate(last));				

				this.set("sdate", firstDayOfWeek);
				this.set("edate", lastDayOfWeek);
				
			  	break;
			case "month":
				var thisMonth = new Date;				  	
				var firstDayOfMonth = new Date(thisMonth.getFullYear(), thisMonth.getMonth(), 1);
				var lastDayOfMonth = new Date(thisMonth.getFullYear(), thisMonth.getMonth() + 1, 0);

				this.set("sdate", firstDayOfMonth);
				this.set("edate", lastDayOfMonth);

			  	break;
			case "year":
				var thisYear = new Date();
			  	var firstDayOfYear = new Date(thisYear.getFullYear(), 0, 1);
				var lastDayOfYear = new Date(thisYear.getFullYear(), 11, 31);

				this.set("sdate", firstDayOfYear);
				this.set("edate", lastDayOfYear);

			  	break;
			default:
				this.set("sdate", "");
				this.set("edate", "");					  
			}
		},
		autoIncreaseNo 		: function(){
			$(".sno").each(function(index,element){                 
			   $(element).text(index + 1); 
			});

			$(".snoo").each(function(index,element){                 
			   $(element).text(index + 1); 
			});
		},
		search 				: function(){
			var self = this,
				start = kendo.toString(this.get("sdate"), "yyyy-MM-dd"),
        		end = kendo.toString(this.get("edate"), "yyyy-MM-dd"),	        		
        		para = [];

        	//Dates
        	if((start && end) && (new Date(start) < new Date(end))){        		
            	para.push({ field:"start_date", value: kendo.toString(start, "yyyy-MM-dd") });
            	para.push({ field:"end_date", value: kendo.toString(end, "yyyy-MM-dd") });            	            	
            }else if(start){
            	para.push({ field:"start_date", value: kendo.toString(start, "yyyy-MM-dd") });
            }else if(end){
            	para.push({ field:"end_date", value: kendo.toString(end, "yyyy-MM-dd") });
            }else{
            	
            }

            this.saleByBranchDS.query({
            	filter: para,
            	page: 1,
            	pageSize: 100
            });

            this.saleByLocationDS.query({
            	filter: para,
            	page: 1,
            	pageSize: 100
            }).then(function(){
            	self.autoIncreaseNo();
            });             
		}
	});
	banhji.wCustomerCenter = kendo.observable({
		transactionDS  		: dataStore(baseUrl + 'invoices/wtransaction'),
		contactDS 			: dataStore(baseUrl + 'contacts'),
		contactTypeDS		: dataStore(baseUrl + 'contacts/type'),
		noteDS 				: dataStore(baseUrl + 'notes'),		
		branchDS 			: dataStore(baseUrl + 'contacts/branch'),
		locationDS 			: dataStore(baseUrl + 'locations'),
		currencyDS 			: dataStore(baseUrl + 'currencies'),
		monthlyDS 			: dataStore(baseUrl + 'invoices/wmonthly'),
		outstandingDS 		: dataStore(baseUrl + "invoices/woutstanding"),
		meterDS 			: dataStore(baseUrl + 'meters/wdeposit'),

		sortList			: [ 
	 		{ text:"ទាំងអស់", value: "all" }, 
	 		{ text:"ថ្ងៃនេះ", value: "today" }, 
	 		{ text:"សប្ដាស៍នេះ", value: "week" }, 
	 		{ text:"ខែនេះ", value: "month" }, 
	 		{ text:"ឆ្នាំនេះ", value: "year" } 
		],
		sorter 				: "year",
		sdate 				: "",
		edate 				: "",
				
		obj 				: null,
		note 				: "",		
		searchText 			: "",
		branch_id 			: 0,
		location_id 		: 0,
		contact_type_id 	: 0,
		currency_id 		: 0,
		user_id 			: banhji.userManagement.getLogin() === null ? '':banhji.userManagement.getLogin().id,

		balance 			: 0,
		deposit 			: 0,
		outInvoice 			: 0,
		overInvoice 		: 0,
		
		pageLoad 			: function(){		
												
		},
		loadOutStandingInvoice: function(id){
			var self = this;

			this.outstandingDS.query({
				filter: { field: "contact_id", value: id },
				page: 1,
				take: 100
			}).then(function(e) {
				var view = self.outstandingDS.view();

				self.set("deposit", kendo.toString(view[0].deposit, "c0", "km-KH"));
				self.set("outInvoice", kendo.toString(view[1].outInvoice, "n0"));
				self.set("overInvoice", kendo.toString(view[2].overInvoice, "n0"));
				self.set("balance", kendo.toString(view[3].balance, "c0", "km-KH"));
			});
		},
		loadTransaction 	: function(id){
			this.transactionDS.query({
			  	filter: { field:"contact_id", value: id },
			  	sort: { field: "issued_date", dir: "desc" },
			  	page: 1,
			  	take: 100
			});
		},
		loadBalance 		: function(){
			var obj = this.get("obj");

			this.transactionDS.query({
			  	filter: [
			  		{ field:"contact_id", operator:"invoice", value: obj.id },
			  		{ field:"type", operator:"where_in", value: ["Invoice", "wInvoice"] },
			  		{ field:"status", operator:"invoice", value: 0 },
			  		{ field:"id", operator:"payment", value: 0 }
			  	],
			  	sort: { field: "issued_date", dir: "desc" },
			  	page: 1,
			  	take: 100
			});
		},
		loadDeposit 		: function(){
			var obj = this.get("obj");

			this.transactionDS.query({
			  	filter: [
			  		{ field:"contact_id", operator:"payment", value: obj.id },
			  		{ field:"type", operator:"payment", value:"deposit" },			  		
			  		{ field:"id", operator:"invoice", value: 0 }
			  	],
			  	sort: { field: "issued_date", dir: "desc" },
			  	page: 1,
			  	take: 100
			});
		},
		loadOverInvoice 	: function(){
			var obj = this.get("obj");

			this.transactionDS.query({
			  	filter: [
			  		{ field:"contact_id", operator:"invoice", value: obj.id },
			  		{ field:"type", operator:"where_in", value: ["Invoice", "wInvoice"] },
			  		{ field:"status", operator:"invoice", value: 0 },
			  		{ field:"due_date <", operator:"invoice", value: kendo.toString(new Date(), "yyyy-MM-dd") },
			  		{ field:"id", operator:"payment", value: 0 }
			  	],
			  	sort: { field: "issued_date", dir: "desc" },
			  	page: 1,
			  	take: 100
			});
		},
		loadMeter 			: function(id){
			this.meterDS.filter([
				{ field:"contact_id", value: id },
				{ field:"utility_id", value: 2 }
			]);
		},
		loadNote 			: function(id){
			this.noteDS.query({
				filter: { field:"contact_id", value: id },
				sort: { field:"noted_date", dir:"desc" },
				page: 1,
				take: 100
			});
		},
		loadGraph 			: function(id){
			var self = this;

			this.monthlyDS.query({
				filter: { field: "contact_id", value: id },
				page: 1,
				take: 100
			}).then(function(e) {
			    var view = self.monthlyDS.view();
			    
				$('#wUsage-graph').kendoChart({
					dataSource: {data: view},												
					series: [
						{field: 'amount', categoryField:'month', type: 'line', axis: 'sale'},
						{field: 'usage', categoryField:'month', type: 'area', axis: 'usage'}
					],
					valueAxes: [
						{
		                    name: "sale",
		                    color: "#007eff",
		                    min: 0,
		                    majorUnit: 10000,
		                    max: 100000
		                }, 
		                {
		                    name: "usage",
		                    min: 0,	
		                    majorUnit: 5,		                   
		                    max: 50
		                }
	                ],
	                categoryAxis: {
	                    //categories: ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12"],		                    
	                    axisCrossingValues: [0, 13],
	                    justified: true
	                },
	                tooltip: {
	                    visible: true,
	                    format: "{0}",
	                    template: "#= series.field #: #= value #"
	                }
				});
			});		
		},		
		selectedRow			: function(e){
			var id = e.data.id,
			data = e.data;			
			
			this.set("obj", data);
			this.loadGraph(id);
			this.loadOutStandingInvoice(id);
			this.loadTransaction(id);
			this.loadMeter(id);
			this.loadNote(id);
		},
		sorterChanges 		: function(){
			var value = this.get("sorter");

			switch(value){
			case "today":
				var today = new Date();
				
				this.set("sdate", today);
				this.set("edate", today);
			  					
			  	break;
			case "week":
			  	var thisWeek = new Date;
				var first = thisWeek.getDate() - thisWeek.getDay(); 
				var last = first + 6;

				var firstDayOfWeek = new Date(thisWeek.setDate(first));
				var lastDayOfWeek = new Date(thisWeek.setDate(last));				

				this.set("sdate", firstDayOfWeek);
				this.set("edate", lastDayOfWeek);
				
			  	break;
			case "month":
				var thisMonth = new Date;				  	
				var firstDayOfMonth = new Date(thisMonth.getFullYear(), thisMonth.getMonth(), 1);
				var lastDayOfMonth = new Date(thisMonth.getFullYear(), thisMonth.getMonth() + 1, 0);

				this.set("sdate", firstDayOfMonth);
				this.set("edate", lastDayOfMonth);

			  	break;
			case "year":
				var thisYear = new Date();
			  	var firstDayOfYear = new Date(thisYear.getFullYear(), 0, 1);
				var lastDayOfYear = new Date(thisYear.getFullYear(), 11, 31);

				this.set("sdate", firstDayOfYear);
				this.set("edate", lastDayOfYear);

			  	break;
			default:
				this.set("sdate", "");
				this.set("edate", "");					  
			}
		},
		enterSearch 		: function(e){
			e.preventDefault();

			this.search();
		},
		search 				: function(){
			var self = this, 
			para = [],
      		txtSearch = this.get("searchText"), 
      		company_id = this.get("branch_id"),
      		location_id = this.get("location_id"), 
      		contact_type_id = this.get("contact_type_id"),
      		currency_id = this.get("currency_id");

      		para.push({ field: "use_water", value: true });
      		
      		if(txtSearch){
      			para.push(      				
      				{ field: "wnumber", operator: "like", value: txtSearch },
      				{ field: "surname", operator: "or_like", value: txtSearch },
					{ field: "name", operator: "or_like", value: txtSearch },
					{ field: "company", operator: "or_like", value: txtSearch }
      			);
      		}

      		if(location_id){
      			para.push({ field: "wlocation_id", value: location_id });
      		}else{
      			if(company_id){
	      			para.push({ field: "wbranch_id", value: company_id });
	      		}
      		}

      		if(contact_type_id){
      			para.push({ field: "contact_type_id", value: contact_type_id });
      		}

      		if(currency_id){
      			para.push({ field: "currency_id", value: currency_id });
      		}      		

      		this.contactDS.filter(para);
      		var loaded = false;
      		this.contactDS.bind("requestEnd", function(e){
      			if(e.type=="read" && loaded==false){
      				loaded = true;

      				//Clear search filters
		      		self.set("searchText", "");
		      		self.set("branch_id", 0);
		      		self.set("location_id", 0);
		      		self.set("contact_type_id", 0);
		      		self.set("currency_id", 0);
      			}
      		});      			
		},
		searchTransaction	: function(){
			var self = this,
				start = kendo.toString(this.get("sdate"), "yyyy-MM-dd"),
        		end = kendo.toString(this.get("edate"), "yyyy-MM-dd"),	        		
        		para = [];

        	//Dates
        	if(start && end){
            	para.push({ field:"start_date", value: kendo.toString(start, "yyyy-MM-dd") });
            	para.push({ field:"end_date", value: kendo.toString(end, "yyyy-MM-dd") });            	            	
            }else if(start){
            	para.push({ field:"start_date", value: kendo.toString(start, "yyyy-MM-dd") });
            }else if(end){
            	para.push({ field:"end_date", value: kendo.toString(end, "yyyy-MM-dd") });
            }else{
            	
            }            

            this.transactionDS.query({
            	filter: para,
            	sort: { field: "issued_date", dir: "desc" },
            	page: 1,
            	pageSize: 100
            });            
		},
		branchChanges 		: function(e){
			if(e.sender.selectedIndex==0){
				this.set("location_id", 0);
			}
		},		
		goToNewWaterDeposit		: function(){
			var obj = this.get("obj");	
			
			banhji.router.navigate('/wDeposit');
			banhji.wDeposit.loadContact(obj.id);			
		},
		goToWaterDepositWitdraw	: function(e){
			var data = e.data;

			banhji.router.navigate('/wDeposit_witdraw');
			banhji.wDepositWitdraw.loadMeter(data.id);
		},
		goEditContact 		: function(){
			var obj = this.get("obj");

			banhji.router.navigate('/customer/'+obj.id);
		},
		goEstimate			: function(){
			var obj = this.get("obj");

			banhji.router.navigate('/estimate');
			banhji.estimate.loadContact(obj.id);			
		},
		goSO				: function(){
			var obj = this.get("obj");

			banhji.router.navigate('/so');
			banhji.so.loadContact(obj.id);
		},
		goReceipt			: function(){
			var obj = this.get("obj");

			banhji.router.navigate('/receipt');
			banhji.receipt.loadContact(obj.id);
		},
		goInvoice			: function(){
			var obj = this.get("obj");

			banhji.router.navigate('/invoice');
			banhji.invoice.loadContact(obj.id);					
		},
		goGDN				: function(){
			var obj = this.get("obj");

			banhji.router.navigate('/gdn');
			banhji.gdn.loadContact(obj.id);
		},
		goStatement			: function(){
			var obj = this.get("obj");

			banhji.router.navigate('/statement');
			banhji.statement.loadContact(obj.id);
		},
		saveNote 			: function(){
			var self = this;

			if(this.get("note")!==""){
				this.noteDS.insert(0, {
					contact_id 	: this.get("obj").id,
					note 		: this.get("note"),
					noted_date	: new Date(),
					created_by 	: this.get("user_id"),

					creator 	: ""
				});
				var saved = false;
				this.noteDS.sync();
				this.noteDS.bind("requestEnd", function(){
					if(saved==false){
						saved = true;

						self.set("note", "");
					}
				});
			}else{
				alert("ត្រូវការ កំណត់សំគាល់");
			}
		}		
	});
	banhji.wCustomerOrder = kendo.observable({		
		dataSource  		: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: baseUrl + 'contacts/worder',
					type: "GET",
					headers: {
						"Entity": getDB(),
						"User": banhji.userManagement.getLogin() === null ? '':banhji.userManagement.getLogin().id
					},
					dataType: 'json'
				},				
				update 	: {
					url: baseUrl + 'contacts',
					type: "PUT",
					headers: {
						"Entity": getDB(),
						"User": banhji.userManagement.getLogin() === null ? '':banhji.userManagement.getLogin().id
					},
					dataType: 'json'
				},				
				parameterMap: function(options, operation) {
					if(operation === 'read') {
						return {
							limit: options.take,
							page: options.page,
							filter: options.filter,
							sort: options.sort
						};
					} else {
						return {models: kendo.stringify(options.models)};
					}
				}
			},
			sort: { field: "worder", dir: "asc" },
			schema 	: {
				model: {
					id: 'id'
				},
				data: 'results',
				total: 'count'
			},			
			batch: true,
			serverFiltering: true,
			serverSorting: false
		}),
		branchDS 			: dataStore(baseUrl + "contacts/branch"),		
		locationDS 			: dataStore(baseUrl + "locations"),
		
		branch_id 			: 0,
		location_id 		: 0,		
				
		pageLoad 			: function(){
			
		},		
		search 				: function(){
			var self = this, 
			location_id = this.get("location_id");

			if(location_id){
				this.dataSource.query({
					filter: { field:"wlocation_id", value: location_id },
					sort: { field:"worder", dir:"asc" },										
					page: 1,
					take: 100
				});				
			}else{
				alert("ត្រូវការ តំបន់");
			}			 
		},		
		save 				: function(){
			this.dataSource.sync();
			var saved = false;
			this.dataSource.bind("requestEnd", function(e){				
				if(e.type=="update" && saved==false){
					saved = true;
					$("#ntf1").data("kendoNotification").info("កត់ត្រាបានសំរេច");
				}
			});
		}
	});
	banhji.wInstallment = kendo.observable({
		dataSource 			: dataStore(baseUrl + "installments"),		
		deleteDS 			: dataStore(baseUrl + "installments"),		
		contactDS 			: dataStore(baseUrl + "contacts"),
		
		statusList 			: [            
			{ "id": 1, "name": "កំពុងប្រើប្រាស់" },
			{ "id": 2, "name": "ផ្អាក់ប្រើប្រាស់" },
			{ "id": 0, "name": "ឈប់ប្រើប្រាស់" }
        ],

        obj 				: null,             
        isEdit 				: false,       	

		pageLoad 			: function(id){
			if(id){
				this.set("isEdit", true);
				this.loadInstallment(id);				
			}else{
				this.set("isEdit", false);
				
				this.addEmpty();				
			}									
		},
		loadInstallment 	: function(id){
			var self = this;

			this.dataSource.query({
				filter: { field:"id", value: id },
				page: 1,
  				take: 50
			}).then(function(e) {
			    var view = self.dataSource.view();
			    
			    
			});
		},		
		loadMap 			: function(){
			var obj = this.get("obj"), lat = kendo.parseFloat(obj.latitute),
			lng = kendo.parseFloat(obj.longtitute);

			if(lat && lng){
				var myLatLng = {lat:lat, lng:lng};
				var mapOptions = {
					zoom: 17,					
					center: myLatLng,
					mapTypeControl: false,
					zoomControl: false,
					scaleControl: false,
					streetViewControl: false
				};
				var map = new google.maps.Map(document.getElementById('map'),mapOptions);
				var marker = new google.maps.Marker({
					position: myLatLng,
					map: map,
					title: obj.number
				});
			} 
		},
		loadData 			: function(company_id){			
			if(this.get("current_company_id")!=company_id){
			 	this.set("current_company_id", company_id);

			 	var self = this;
				
				//Location
				this.locationDS.filter([
					{ field:"company_id", value: company_id },
					{ field:"utility_id", value: 2 }
				]);				
				
				//Item
				this.itemDS.filter([
					{ field:"company_id", value: company_id },
					{ field:"category_id", value: 3 }
				]);

				//Fee
				this.set("tariffList", []);
				this.set("exemptionList", []);
				this.set("maintenanceList", []);

				this.feeDS.query({
					filter: [
						{ field:"company_id", value: company_id },
						{ field:"utility_id", value: 2 }
					],
					page: 1,
	  				take: 100
				}).then(function(e) {
				    var view = self.feeDS.view();
				    
				    $.each(view, function(index, value){																						
						if(value.type=="tariff"){							
							self.tariffList.push({
								id 	: value.id,
								name: value.name 
							});
						}
						if(value.type=="exemption"){							
							self.exemptionList.push({
								id 	: value.id,
								name: value.name 
							});
						}
						if(value.type=="maintenance"){
							self.maintenanceList.push({
								id 	: value.id,
								name: value.name 
							});
						}								
					});
				    
				    if(self.get("isEdit")){
				    	var obj = self.dataSource.view();
				    	self.set("obj", obj[0]);			    				    	
			    		self.loadMap();
				    }
				});				
			}						
		},
		checkExistingNumber : function(){
			var self = this;	
			
			var number = this.get("obj").number;
			var originalNo = this.get("originalNo");
			
			if(number.length>0 && number!==originalNo){
				this.existingDS.query({
					filter: { field:"number", value: number },
					page: 1,
					pageSize: 100
				}).then(function(e){
					var view = self.existingDS.view();
					
					if(view.length>0){
				 		self.set("isDuplicateNumber", true);						
					}else{
						self.set("isDuplicateNumber", false);
					}
				});							
			}else{
				this.set("isDuplicateNumber", false);
			}			
		},		
		addEmpty 			: function(){			
        	this.set("isEdit", false);
        	this.dataSource.data([]);

      		if(this.dataSource.total()==0){
				this.dataSource.add({					 			
					company_id 			: this.get("company_id"),
	      			utility_id 			: 2,
	      			location_id 		: 0,
	      			electricity_box_id 	: 0,
	      			contact_id 			: this.get("contact_id"),
	      			item_id 			: 0,
	      			reactive_of 		: 0,
					backup_of 			: 0,
					number 				: "",
					multiplier			: 1,
					max_number			: 10000,
					ear_sealed			: true,
					cover_sealed		: true,				
					memo				: "",
					longtitute 			: "",
					latitute 			: "",	
					status				: 1,
					date_used 			: new Date(),

					item_name 			: "",
					electricity_box_number : "",
					
					amperes 			: {id:0},				
					phases 				: {id:0},				
					voltages 			: {id:0},
					
					tariffs 			: {id:0},				
					exemptions 			: {id:0},								
					maintenances 		: {id:0}
				});
				
				var data = this.dataSource.data();			
				var obj = data[data.length - 1];			
				this.set("obj", obj);
			}				
		},		
		save 				: function(){			
			var self = this, saved = false;

			this.dataSource.sync();			
			this.dataSource.bind("requestEnd", function(e){				
				if(e.type=="create" && saved==false){					
					saved = true;
					banhji.wCustomerCenter.meterDS.fetch();
					self.addEmpty();										
				}

				if(e.type=="update" && saved==false){
					saved = true;
					banhji.wCustomerCenter.meterDS.fetch();
				}

				if(e.type=="destroy" && saved==false){
					saved = true;
					banhji.wCustomerCenter.meterDS.fetch();					
					window.history.back();
				}
			});
		},
		delete 				: function(){
			var self = this,
			id = this.get("obj").id;

			if (confirm("តើលោកអ្នកពិតជាចង់លុបមែនឬទេ?")) {
				this.deleteDS.query({
				  	filter: { field: "meter_id", value: id },
				  	page: 1,
				  	take: 1
				}).then(function() {
					var view = self.deleteDS.view();

					if(view.length>0){
						alert("សួមអភ័យទោស! លោកអ្នកពុំអាចលុបទិន្នន័យដែលកំពុងប្រើប្រាស់បានទេ។");
					}else{
						var data = self.dataSource.get(id);
				        self.dataSource.remove(data);
				        self.save();
					}
				});				
	    	}
		},
		cancel 				: function(){
			this.dataSource.cancelChanges();
			window.history.back();
		}		
	});
	banhji.wDeposit =  kendo.observable({
		dataSource 			: dataStore(baseUrl + "invoices"),
		lineDS 				: dataStore(baseUrl + "invoices/line"),					
		contactDS  			: dataStore(baseUrl + "contacts"),
		meterDS  			: dataStore(baseUrl + "meters"),
		itemDS 				: dataStore(baseUrl + "items"),
		paymentDS  			: dataStore(baseUrl + "payments"),					
				
		itemList 			: [],

		obj 				: null,
		isEdit 				: false,
		cashier_id			: banhji.userManagement.getLogin() === null ? 0 : banhji.userManagement.getLogin().id,		

		pageLoad 			: function(id){			
			if(id){
				this.set("isEdit", true);							
				this.loadDeposit(id);
			}else{				
				if(this.get("isEdit")){
					this.set("isEdit", false);
					this.set("obj", null);

					this.dataSource.data([]);
					this.lineDS.data([]);
					this.meterDS.data([]);
					this.paymentDS.data([]);

					this.addEmpty();
				}else if(this.dataSource.total()==0){
					this.addEmpty();					
				}								
			}  																							
		},	    
	    loadContact 		: function(id){
			var self = this;			

			this.contactDS.query({    			
				filter: { field:"id", value: id },
				page: 1,
				take: 100
			}).then(function(e){
				var view = self.contactDS.view(),
				obj = self.get("obj");
		    	
		    	obj.set("contact_id", view[0].id);
		    	obj.set("payment_method_id", view[0].payment_method_id);
		    	obj.set("cash_account_id", view[0].cash_account_id);
		    	obj.set("deposit_account_id", view[0].deposit_account_id);		    		    			  				  											
				obj.set("locale", view[0].currency[0].locale);
				obj.set("bill_to", view[0].bill_to);				
			});				
		},							
		loadDeposit 		: function(id){
			var self = this;			

			this.dataSource.query({    			
				filter: { field:"id", value: id },
				page: 1,
				take: 100
			}).then(function(e){
				var obj = self.dataSource.view()[0];				 			

				self.lineDS.filter({ field: "invoice_id", value: obj.id });
				self.contactDS.filter({ field: "id", value: obj.contact_id });
				self.paymentDS.filter([
					{ field: "reference_id", value: obj.id },
					{ field: "type", value: "wdeposit" }
				]);
				self.set("obj", obj);
			});				
		},
		setItem 			: function(){
			var self = this;

			this.itemDS.query({
				filter: [
					{ field:"item_type_id", value: 1 },
					{ field:"status", value: 1 }
				],
				page: 1,
				take: 100
			}).then(function(){
				var view = self.itemDS.view();

				$.each(view, function(index, value){
					self.itemList.push(value);
				});
			});
		},		
		getRate 			: function(){
			var rate = 1, obj = this.get("obj"),
			contact = this.contactDS.get(obj.contact_id);

			rate = banhji.currency.getAmount(banhji.institute.locale) / banhji.currency.getAmount(contact.currency[0].locale);			

			return rate;		
		},					
		addEmpty 		 	: function(){
			this.dataSource.add({
				company_id 			: 0,
				location_id 		: 0,
				contact_id 			: "",
				payment_term_id		: 0,
				payment_method_id 	: 0,
				reference_id 		: 0,
				deposit_account_id 	: 0,
				cash_account_id 	: 2,					
				vat_id 				: 0,
				biller_id 			: this.get("cashier_id"),
 	    		number 				: "",
			   	type				: "wdeposit",
			   	sub_total 			: 0,				   		   					   				   	
			   	amount				: 0,
			   	vat 				: 0,
			   	rate				: 1,			   	
			   	locale 				: "km-KH",			   	
			   	issued_date 		: new Date(),
			   	due_date 			: "",
			   	check_no 			: "",
			   	bill_to 			: "",
			   	ship_to 			: "",
			   	memo 				: "",
			   	memo2 				: "",
			   	status 				: 0,

			   	segments 			: []
	    	});		    		
			
			var data = this.dataSource.data();
			var obj = data[data.length-1];			
			this.set("obj", obj);

			this.addRow();			
		},		
		contactChanges 		: function(e){	    	
	    	if(e.sender.selectedIndex>0){
		    	var obj = this.get("obj"),		    	
		    	contact = this.contactDS.get(obj.contact_id);		    	
		    	
		    	obj.set("payment_method_id", contact.payment_method_id);
		    	obj.set("cash_account_id", contact.cash_account_id);
		    	obj.set("deposit_account_id", contact.deposit_account_id);
		    	obj.set("locale", contact.currency[0].locale);
		    	obj.set("bill_to", contact.bill_to);		    	
	    	}
	    },
	    changes				: function(){
			var obj = this.get("obj"),
			total = 0;			
			
			$.each(this.lineDS.data(), function(index, value) {				
				total += value.amount;				
	        });
	       		
			obj.set("amount", total);	    	
		},
	    itemChanges 		: function(e){								
			var data = e.data, obj = this.get("obj");

			if(data.item_id>0 && obj.contact_id>0){
				var item = this.itemDS.get(data.item_id),
				contact = this.contactDS.get(obj.contact_id),							
				rate = kendo.parseFloat(contact.currency[0].rate)/kendo.parseFloat(item.price_list[0].currency[0].rate);
		        	        
	    		data.set("description", item.name);
	    		data.set("amount", item.price_list[0].price*rate);		        
		        data.set("rate", rate);		        	        
		        		        	        
		        this.changes();
	        }else{
	        	alert("សូមជ្រើសអតិថិជន");
	        }	                	        	
		},
		addRow 				: function(){				
			var obj = this.get("obj");		
						
			this.lineDS.add({					
				invoice_id 			: 0,
				item_id 			: "",
				measurement_id 		: 0,
				meter_record_id	 	: 0,
				description 		: "",				
				unit 	 			: 1,
				price 				: 0,												
				amount 				: 0,
				rate				: 1,
				locale				: obj.locale,
				has_vat 			: false,
				type 				: "",

				priceList 			: []
			});																	
		},		
		addPayment 			: function(meter_id){
			var obj = this.get("obj"), rate = this.getRate(),
			deposit = this.dataSource.at(0);

			this.paymentDS.add({
				company_id 			: obj.company_id,
				contact_id 			: obj.contact_id,
				cashier_id 			: this.get("cashier_id"),
				meter_id 			: meter_id,							
				reference_id		: deposit.id,														
				payment_method_id	: obj.payment_method_id,
				cash_account_id		: obj.cash_account_id,
				check_no			: obj.check_no,							
				type 				: "wdeposit",
				amount 				: obj.amount,
				fine 				: 0,
				discount 			: 0,
				rate 				: rate,
				locale 				: obj.locale,
				payment_date		: kendo.toString(new Date(obj.issued_date), "yyyy-MM-dd")
			});

			this.paymentDS.sync();					
		},
		meterSync 		: function(deposit_id){
	    	var dfd = $.Deferred(), obj = this.get("obj"),
			contact = this.contactDS.get(obj.contact_id);

			this.meterDS.add({
				company_id 			: contact.wbranch_id,
      			utility_id 			: 2,
      			deposit_id 			: deposit_id,
      			invoice_id 			: 0,
      			location_id 		: contact.wlocation_id,
      			ampere_id 			: 0,
      			phase_id 			: 0,
      			voltage_id 			: 0,
      			electricity_box_id 	: 0,
      			contact_id 			: obj.contact_id,
      			item_id 			: 0,
      			reactive_of 		: 0,
				backup_of 			: 0,
				number 				: "",				
				multiplier			: 1,
				max_number			: 10000,
				startup_reading 	: 0,
				ear_sealed			: true,
				cover_sealed		: true,				
				memo				: "",
				longtitute 			: "",
				latitute 			: "",	
				status				: 0,
				date_used 			: "",

				item_name 			: "",
				electricity_box_number : "",
				
				amperes 			: {id:0},				
				phases 				: {id:0},				
				voltages 			: {id:0},
				
				tariffs 			: {id:0},				
				exemptions 			: {id:0},								
				maintenances 		: {id:0}
			});	        

	    	this.meterDS.sync();
		    this.meterDS.bind("requestEnd", function(e){			    	
				dfd.resolve(e.response.results);    				
		    });

		    return dfd;	    		    	
	    },
	    invoiceSync 		: function(){
	    	var dfd = $.Deferred();	        

	    	this.dataSource.sync();
		    this.dataSource.bind("requestEnd", function(e){			    	
				dfd.resolve(e.response.results);    				
		    });

		    return dfd;	    		    	
	    },
		save 				: function(){							
		    var self = this, obj = this.get("obj"), rate = this.getRate();

		    if(obj.amount>0){	
		        obj.set("amount", kendo.parseFloat(obj.amount)*rate);
		        obj.set("rate", rate);				        
		       		    	
		    	if(this.get("isEdit")){
		    		this.dataSource.sync();
		    		this.lineDS.sync();

		    		if(this.lineDS.hasChanges()){
		    			var pay = this.paymentDS.at(0);
		    			pay.set("amount", obj.amount);
		    			this.paymentDS.sync();
		    		}		    		
		    	}else{
		    		//Add brand new invoice
					this.invoiceSync()
					.then(function(invoice){
						$.each(self.lineDS.data(), function(index, value){										
							value.set("invoice_id", invoice[0].id);
							value.set("rate", rate);
						});

						self.lineDS.sync();						

						return self.meterSync(invoice[0].id);
					}).then(function(meter){
						self.addPayment(meter[0].id);
					}).then(function(){												
						self.dataSource.data([]);
						self.lineDS.data([]);
						self.meterDS.data([]);
						self.paymentDS.data([]);

						banhji.wCustomerCenter.meterDS.fetch();
						window.history.back();
					});
				}
			}else{
				alert("សូមមេត្តា បញ្ចូលចំនួនប្រាក់កក់");
			}
		},
		cancel 				: function(){
			this.dataSource.cancelChanges();
			this.lineDS.cancelChanges();
			window.history.back();
		}	 		
	});
	banhji.wDepositWitdraw =  kendo.observable({
		dataSource 			: dataStore(baseUrl + "invoices"),
		prevDepositDS 		: dataStore(baseUrl + "invoices"),							
		contactDS  			: dataStore(baseUrl + "contacts"),
		meterDS  			: dataStore(baseUrl + "meters"),		
		paymentDS  			: dataStore(baseUrl + "payments"),		

		obj 				: null,
		meter 				: null,
		isEdit 				: false,
		cashier_id			: banhji.userManagement.getLogin() === null ? 0 : banhji.userManagement.getLogin().id,
		total 				: 0,		

		pageLoad 			: function(id){			
			if(id){
				this.set("isEdit", true);							
				this.loadDeposit(id);
			}else{				
				if(this.get("isEdit")){
					this.set("isEdit", false);
					
					this.dataSource.data([]);					
					this.meterDS.data([]);
					this.paymentDS.data([]);

					this.addEmpty();
				}else if(this.dataSource.total()==0){
					this.addEmpty();					
				}								
			}  																							
		},	    
		loadMeter 		: function(id){
			var self = this;			

			this.meterDS.query({    			
				filter: { field:"id", value: id },
				page: 1,
				take: 100
			}).then(function(e){
				var view = self.meterDS.view();

				self.set("meter", view[0]);
				self.loadContact(view[0].contact_id);
				self.loadPrevDeposit(view[0].deposit_id);		    			    	    					
			});				
		},
		loadContact 		: function(id){
			var self = this;			

			this.contactDS.query({    			
				filter: { field:"id", value: id },
				page: 1,
				take: 100
			}).then(function(e){
				var view = self.contactDS.view(),
				obj = self.get("obj");
		    	
		    	obj.set("contact_id", view[0].id);		    	
		    	obj.set("deposit_account_id", view[0].deposit_account_id);		    		    			  				  											
				obj.set("locale", view[0].currency[0].locale);
				obj.set("bill_to", view[0].bill_to);
			});				
		},
		loadPrevDeposit		: function(id){
			var self = this;			

			this.prevDepositDS.query({    			
				filter: { field:"id", value: id },
				page: 1,
				take: 100
			}).then(function(e){
				var view = self.prevDepositDS.view();
				
		    	self.set("total", kendo.toString(view[0].amount*-1, view[0].locale=="km-KH"?"c0":"c", view[0].locale));		    					
			});				
		},							
		loadDeposit 		: function(id){
			var self = this;			

			this.dataSource.query({    			
				filter: { field:"id", value: id },
				page: 1,
				take: 100
			}).then(function(e){
				var obj = self.dataSource.view()[0];				 			

				self.lineDS.filter({ field: "invoice_id", value: id });
				self.contactDS.filter({ field: "id", value: obj.contact_id });
				self.paymentDS.filter([
					{ field: "reference_id", value: id },
					{ field: "type", value: "wdeposit" }
				]);
				self.set("obj", obj);
			});				
		},			
		getRate 			: function(){
			var rate = 1, obj = this.get("obj"),
			contact = this.contactDS.get(obj.contact_id);

			rate = banhji.currency.getAmount(banhji.institute.locale) / banhji.currency.getAmount(contact.currency[0].locale);			

			return rate;		
		},
		contactChanges 		: function(e){	    	
	    	if(e.sender.selectedIndex>0){
		    	var obj = this.get("obj"),		    	
		    	contact = this.contactDS.get(obj.contact_id);		    	
		    	
		    	obj.set("cash_account_id", contact.cash_account_id);
		    	obj.set("deposit_account_id", contact.deposit_account_id);
		    	obj.set("locale", contact.currency[0].locale);
		    	obj.set("bill_to", contact.bill_to);		    	
	    	}
	    },					
		addEmpty 		 	: function(){
			this.set("obj", null);

			this.dataSource.add({
				company_id 			: 0,
				location_id 		: 0,
				contact_id 			: "",
				payment_term_id		: 0,
				payment_method_id 	: 0,
				reference_id 		: 0,
				deposit_account_id 	: 0,
				cash_account_id 	: 2,					
				vat_id 				: 0,
				biller_id 			: this.get("cashier_id"),
 	    		number 				: "",
			   	type				: "wdeposit",
			   	sub_total 			: 0,				   		   					   				   	
			   	amount				: 0,
			   	vat 				: 0,
			   	rate				: 1,			   	
			   	locale 				: "km-KH",			   	
			   	issued_date 		: new Date(),
			   	due_date 			: "",
			   	check_no 			: "",
			   	bill_to 			: "",
			   	ship_to 			: "",
			   	memo 				: "",
			   	memo2 				: "",
			   	status 				: 0,

			   	segments 			: []
	    	});		    		
			
			var data = this.dataSource.data();
			var obj = data[data.length-1];			
			this.set("obj", obj);				
		},				
		addPayment 			: function(invoice_id){
			var obj = this.get("obj"), rate = this.getRate(),
			meter = this.meterDS.at(0);

			this.paymentDS.add({
				company_id 			: obj.company_id,
				contact_id 			: obj.contact_id,
				cashier_id 			: this.get("cashier_id"),
				meter_id 			: meter.id,							
				reference_id		: invoice_id,														
				payment_method_id	: obj.payment_method_id,
				cash_account_id		: obj.cash_account_id,
				check_no			: obj.check_no,							
				type 				: "wdeposit",
				amount 				: obj.amount,
				fine 				: 0,
				discount 			: 0,
				rate 				: rate,
				locale 				: obj.locale,
				payment_date		: kendo.toString(new Date(obj.issued_date), "yyyy-MM-dd")
			});

			this.paymentDS.sync();					
		},
		invoiceSync 		: function(){
	    	var dfd = $.Deferred();	        

	    	this.dataSource.sync();
		    this.dataSource.bind("requestEnd", function(e){			    	
				dfd.resolve(e.response.results);    				
		    });

		    return dfd;	    		    	
	    },
		save 				: function(){
			if(this.dataSource.hasChanges()){							
			    var self = this, obj = this.get("obj"), rate = this.getRate(),
			    payment = this.prevDepositDS.at(0);
		    		    
		        obj.set("amount", kendo.parseFloat(payment.amount)*rate*-1);
		        obj.set("rate", rate);				        
		       		    	
		    	if(this.get("isEdit")){
		    		this.dataSource.sync();	    					    		
		    	}else{
		    		//Add brand new invoice
					this.invoiceSync()
					.then(function(invoice){						
						var meter = self.meterDS.at(0);
						meter.set("status", 2);

						self.meterDS.sync();
						self.addPayment(invoice[0].id);										
					}).then(function(){												
						self.dataSource.data([]);
						self.prevDepositDS.data([]);						
						self.meterDS.data([]);
						self.paymentDS.data([]);

						banhji.wCustomerCenter.meterDS.fetch();
						window.history.back();
					});
				}
			}			
		},
		cancel 				: function(){
			this.dataSource.cancelChanges();
			this.lineDS.cancelChanges();
			window.history.back();
		}	 		
	});	
	banhji.wMeter = kendo.observable({
		dataSource 			: dataStore(baseUrl + "meters"),
		existingDS 			: dataStore(baseUrl + "meters"),
		deleteDS 			: dataStore(baseUrl + "meters/record"),		
		contactDS 			: dataStore(baseUrl + "contacts"),					
		itemDS 				: dataStore(baseUrl + "items"),
		feeDS 				: dataStore(baseUrl + "fees"),
		
		statusList 			: [            
			{ "id": 1, "name": "កំពុងប្រើប្រាស់" },
			{ "id": 2, "name": "ផ្អាក់ប្រើប្រាស់" },
			{ "id": 0, "name": "ឈប់ប្រើប្រាស់" }
        ],

        tariffList 			: [],
        exemptionList 		: [],
        maintenanceList 	: [],

        deposit_link 		: null,
        invoice_link 		: null,
        deposit_amount 		: 0,
        invoice_amount 		: 0,

        obj 				: null,             
        current_company_id 	: 0,
        current_meter_id 	: 0,
        isDuplicateNumber 	: false,
        originalNo 			: null,		

		pageLoad 			: function(id){
			this.loadMeter(id);									
		},		
		loadMeter 			: function(id){
			var self = this;

			if(this.get("current_meter_id")!=id){
			 	this.set("current_meter_id", id);				

				this.dataSource.query({
					filter: { field:"id", value: id },
					page: 1,
	  				take: 50
				}).then(function(e) {
				    var view = self.dataSource.view();

				    self.set("originalNo", view[0].number);				    
				    self.contactDS.filter({ field:"id", value:view[0].contact_id });		    			    	
			    	self.contactDS.filter([]);

			    	return self.feeQuery(view[0].company_id);	    		   	    			    			    				    
				}).then(function(fee){
					var view = self.dataSource.view();					
					
					self.set("obj", view[0]);
					self.set("deposit_link", "#/wDeposit/"+view[0].deposit_id);
					self.set("invoice_link", "#/wMeterInvoice/"+view[0].invoice_id);

					if(view[0].deposit[0]){
						self.set("deposit_amount", kendo.toString(kendo.parseFloat(view[0].deposit[0].amount), "c", view[0].deposit[0].locale));
					}else{
						self.set("deposit_amount", 0);
					}

					if(view[0].invoice[0]){
						self.set("invoice_amount", kendo.toString(kendo.parseFloat(view[0].invoice[0].amount), "c", view[0].invoice[0].locale));
					}else{
						self.set("invoice_amount", 0);
					}					
										
					self.loadMap();
				});
			}
		},		
		loadMap 			: function(){
			var obj = this.get("obj"), lat = kendo.parseFloat(obj.latitute),
			lng = kendo.parseFloat(obj.longtitute);

			if(lat && lng){
				var myLatLng = {lat:lat, lng:lng};
				var mapOptions = {
					zoom: 17,					
					center: myLatLng,
					mapTypeControl: false,
					zoomControl: false,
					scaleControl: false,
					streetViewControl: false
				};
				var map = new google.maps.Map(document.getElementById('map'),mapOptions);
				var marker = new google.maps.Marker({
					position: myLatLng,
					map: map,
					title: obj.number
				});
			} 
		},
		feeQuery 			: function(company_id){
			var self = this, dfd = $.Deferred();

			if(this.get("current_company_id")!=company_id){
			 	this.set("current_company_id", company_id);
				
		    	this.feeDS.query({
					filter: [
						{ field:"company_id", value: company_id },
						{ field:"utility_id", value: 2 }
					]
				}).then(function(e) {
					var view = self.feeDS.view();

					self.set("tariffList", []);
					self.set("exemptionList", []);
					self.set("maintenanceList", []);

					$.each(view, function(index, value){																						
						if(value.type=="tariff"){							
							self.tariffList.push({
								id 	: value.id,
								name: value.name 
							});
						}
						if(value.type=="exemption"){							
							self.exemptionList.push({
								id 	: value.id,
								name: value.name 
							});
						}
						if(value.type=="maintenance"){
							self.maintenanceList.push({
								id 	: value.id,
								name: value.name 
							});
						}								
					});

					dfd.resolve(view);				    			   		    			
				});
			}			

		    return dfd;	    		    	
	    },	    	
		contactChanges 		: function(e){
			if(e.sender.selectedIndex>0){
				var obj = this.get("obj"),
				contact = this.contactDS.get(obj.contact_id);

				obj.set("company_id", contact.wbranch_id);
				obj.set("location_id", contact.wlocation_id);
				
				this.feeQuery(contact.wbranch_id);
			}
		},
		checkExistingNumber : function(){
			var self = this;	
			
			var number = this.get("obj").number;
			var originalNo = this.get("originalNo");
			
			if(number.length>0 && number!==originalNo){
				this.existingDS.query({
					filter: { field:"number", value: number },
					page: 1,
					pageSize: 100
				}).then(function(e){
					var view = self.existingDS.view();
					
					if(view.length>0){
				 		self.set("isDuplicateNumber", true);						
					}else{
						self.set("isDuplicateNumber", false);
					}
				});							
			}else{
				this.set("isDuplicateNumber", false);
			}			
		},				
		save 				: function(){			
			var self = this, saved = false;

			this.dataSource.sync();			
			this.dataSource.bind("requestEnd", function(e){				
				if(e.type=="create" && saved==false){					
					saved = true;
					banhji.wCustomerCenter.meterDS.fetch();
					self.addEmpty();										
				}

				if(e.type=="update" && saved==false){
					saved = true;
					banhji.wCustomerCenter.meterDS.fetch();
					window.history.back();
				}

				if(e.type=="destroy" && saved==false){
					saved = true;
					banhji.wCustomerCenter.meterDS.fetch();					
					window.history.back();
				}
			});
		},
		delete 				: function(){
			var self = this,
			obj = this.get("obj");

			if (confirm("តើលោកអ្នកពិតជាចង់លុបមែនឬទេ?")) {
				this.deleteDS.query({
				  	filter: { field: "meter_id", value: obj.id },
				  	page: 1,
				  	take: 1
				}).then(function() {
					var view = self.deleteDS.view();

					if(view.length>0){
						alert("សួមអភ័យទោស! លោកអ្នកពុំអាចលុបទិន្នន័យដែលកំពុងប្រើប្រាស់បានទេ។");
					}else{
						var data = self.dataSource.get(obj.id);
				        self.dataSource.remove(data);
				        self.save();
					}
				});				
	    	}
		},
		cancel 				: function(){
			this.dataSource.cancelChanges();
			window.history.back();
		}		
	});
	banhji.wReadingCenter = kendo.observable({		
		dataSource 			: dataStore(baseUrl + "meters/record"),
		meterDS 			: dataStore(baseUrl + "meters"),
		
		meter_id 			: null,
		rowIndex 			: 0,			
		
		pageLoad 			: function(id){
			if(id){
				this.dataSource.query({
					filter: { field:"meter_id", value: id },
					sort: { field:"month_of", dir:"desc" },
					page: 1,
					take: 100
				});
			}						
		},			
		search 				: function(){											
			var meter_id = this.get("meter_id");
			this.set("rowIndex", 0);
			
			if(meter_id){
				this.dataSource.query({
					filter: { field:"meter_id", value: meter_id },
					sort: { field:"month_of", dir:"desc" },
					page: 1,
					take: 100
				});
			}					
		}  	  			
	});
	banhji.wEditReading = kendo.observable({		
		dataSource 			: dataStore(baseUrl + "meters/record"),
		meterDS	 			: dataStore(baseUrl + "meters"),
		readerDS 			: dataStore(baseUrl + "employees"),
		invoiceDS 			: dataStore(baseUrl + "invoices"),
		invoiceLineDS 		: dataStore(baseUrl + "invoices/line"),
		feeDS 		 		: dataStore(baseUrl + "fees"),
		tariffItemDS 		: dataStore(baseUrl + "fees/item"),		

		obj 				: null,
		invoice 			: null,
		hasInvoice 			: false,
		originalAmount 		: 0,		

		pageLoad 			: function(id){
			var self = this;

			this.dataSource.query({
				filter: { field:"id", value: id },				
				page: 1,
				take: 100
			}).then(function(e) {
			    var view = self.dataSource.view();

			    self.set("obj", view[0]);
			    self.loadMeter(view[0].meter_id);
			    self.loadInvoiceLine(view[0].id);			    
			});
		},
		loadInvoice 		: function(id){
			var self = this;

			this.invoiceDS.query({
				filter: { field:"id", value: id },				
				page: 1,
				take: 100
			}).then(function(e) {
			    var view = self.invoiceDS.view();

			    self.set("invoice", view[0]);
			    self.set("originalAmount", view[0].amount);			    
			});
		},
		loadInvoiceLine 	: function(id){
			var self = this;

			this.invoiceLineDS.query({
				filter: { field:"meter_record_id", value: id },				
				page: 1,
				take: 100
			}).then(function(e) {
			    var view = self.invoiceLineDS.view();

			    if(view.length>0){
			    	self.set("hasInvoice", true);
			    	self.loadInvoice(view[0].invoice_id);			    	
			    }else{
			    	self.set("hasInvoice", false);
			    }
			});
		},
		loadMeter 			: function(id){
			var self = this;

			this.meterDS.query({
				filter: { field:"id", value: id },				
				page: 1,
				take: 100
			}).then(function(e) {
			    var view = self.meterDS.view();

			    self.feeDS.filter({ field:"company_id", value: view[0].company_id });
			    self.tariffItemDS.query({
					filter: { field:"fee_id", value: view[0].tariff_id },				
					sort: { field: "usage", dir: "desc" },
					page: 1,
					take: 100
				});
			});
		},
		readingChanges 		: function(){
			var obj = this.get("obj"),			
			usage = obj.current - obj.previous;

			obj.set("usage", usage);
		},
		save 			: function(){
			var obj = this.get("obj"),			
			usage = obj.current - obj.previous;			

			if(this.get("hasInvoice")){
				var line = this.invoiceLineDS.at(0),
				meter = this.meterDS.at(0),				
				exemption = this.feeDS.get(meter.exemption_id),
				maintenance = this.feeDS.get(meter.maintenance_id),
				usage = obj.current - obj.previous,
				price = 0,
				amount = 0,
				originalAmount = this.get("originalAmount");
				
				//Apply usage exemption
				if(exemption.unit=="usage"){
					var exemptionUsage = kendo.parseInt(exemption.amount);
					if(usage>exemptionUsage){
						usage -= exemptionUsage;
					}else{
						usage = 0;
					}
				}

				//Apply tariff
				$.each(this.tariffItemDS.data(), function(index, value){
					if(usage>=value.usage){
						if(value.is_flat){								
							amount = kendo.parseFloat(value.price);
						}else{								
							amount = usage * kendo.parseFloat(value.price);
						}

						price = value.price;

						return false;
					}										
				});

				//Apply money exemption
				if(exemption.unit=="money"){
					var exemptionAmount = kendo.parseFloat(exemption.amount);

					if(amount>exemptionAmount){
						amount -=  exemptionAmount;
					}else{
						amount = 0;
					}
				}

				//Apply % exemption
				if(exemption.unit=="%"){
					var exemptionPercentTageAmount = amount * kendo.parseFloat(exemption.amount);

					if(amount>exemptionPercentTageAmount){
						amount -=  exemptionPercentTageAmount;
					}else{
						amount = 0;
					}					
				}							

				//Update line
				$.each(this.invoiceLineDS.data(), function(index, value){
					if(value.type=="tariff"){
						value.set("unit", usage);
						value.set("price", price);
						value.set("amount", amount);
					}										
				});

				var inv = this.get("invoice"),
				diffAmount = originalAmount - amount,
				newBalance = originalAmount - diffAmount;

				inv.set("amount", newBalance);
				
				this.invoiceLineDS.sync();
				this.set("originalAmount", 0);			
			}

			this.dataSource.sync();
		},
		cancel 				: function(){
			this.dataSource.cancelChanges();
			window.history.back();
		}			
	});
	banhji.wReading = kendo.observable({						
		dataSource 			: new kendo.data.DataSource({
			transport: {
				read: {
					url: baseUrl + "meters/wreading",
					headers: {
						"Entity": getDB()
					},
					type: "GET",
					dataType: "json"
				}			  	
			},						
			pageSize: 100,							  	
		  	schema: {
				model: {
					id: "id"
				},
				data: "results",
				total: "count"	
			}
		}),
		readerDS 			: dataStore(baseUrl + "contacts/employee"),
		branchDS 			: dataStore(baseUrl + "contacts/branch"),		
		locationDS 			: dataStore(baseUrl + "locations"),		
		meterDS				: dataStore(baseUrl + "meters"),
		meterRecordDS		: dataStore(baseUrl + "meters/record"),

		monthOfSearch 		: null,		
		brand_id 			: null,
		location_id 		: null,
		meter_id 			: null,
						
		month_of 			: new Date(),
		from_date			: new Date(),
		to_date				: new Date(),
		read_by 			: null,
		
		pageLoad 			: function(){
										
		},
		strMonthOf 			: function(){
			return "អំនានប្រចាំខែ " + kendo.toString(this.get("monthOfSearch"), "MM-yyyy");
		},		
		search 				: function(){											
			var monthOfSearch = this.get("monthOfSearch"),
			location_id = this.get("location_id"),
			meter_id = this.get("meter_id");
					
			if(monthOfSearch){				
				if(location_id || meter_id){						
					var monthOf = new Date(monthOfSearch);
					monthOf.setDate(1);
					monthOf = kendo.toString(monthOf, "yyyy-MM-dd");
										
					this.dataSource.transport.options.read.data={
						month_of 	: monthOf,
						location_id : location_id,
						meter_id 	: meter_id
					};
					this.dataSource.read();	
				}
			}else{
				alert("សូមជ្រើសរើស ខែ");
			}		
		},						
		isSupported 		: function() {
			// check if File API is supported in this browser
			if(window.File && window.FileReader && window.FileList && window.Blob) {
				return true;
			} else {
				return false;
			}
		},			
		readFile 			: function(e){
			e.preventDefault();
			var self = this;

			var reader = new FileReader();					
			if(this.get("isSupported")) {
				var file = document.getElementById('myFile').files[0];
				// var file = $('#myFile').get(0).files[0];

				if(file !== undefined) {
					this.set("uploadStatus", "");
					reader.readAsText(file);
					
					reader.onload = function() {						
 						var result = reader.result.split('\r');	 						
 						
						// for (var i = 1; i < result.length; i ++) {								
						// 	var data = result[i].split(',');
						// 	readingList.push(data);															
						// }

						self.dataSource.transport.options.read.data = result;
						self.dataSource.read();																		
					}

					reader.onerror = function() {							
						this.set("uploadStatus", reader.error);
					}						
				} else {
					this.set("uploadStatus", "សូមជ្រើសរើសឯកសា!");
				}

			} else {
				this.set("uploadStatus", "ឯកសារេនះពុំត្រឹមត្រូវទេ!");					
			}
		},				
      	onChange 			: function(e) {
      		e.preventDefault();

      		var self = this;
      		var selected = e.data;            
            
            if(kendo.parseInt(selected.current)>0){        
		        var add_up = 0;
		        if(selected.new_round){
		        	add_up = kendo.parseInt(selected.max_number);            	
	        	}
	        	var usage = ((kendo.parseInt(selected.current) + add_up) - kendo.parseInt(selected.previous))*selected.multiplier;
	            selected.set("usage", usage);
	            
	            if(usage<0){
					selected.set("isValid", false);
				}else{
					selected.set("isValid", true);
				}
			}else{
				selected.set("usage", "");
				selected.set("isValid", true);
			}

			var nextID = selected.index+1;
			$(".txt"+nextID).focus();            
        },       
        total 				: function() {      		
	        var sum = 0;

	        $.each(this.dataSource.data(), function(index, value) {	        		            
	        	sum += kendo.parseInt(value.usage);		        	          
	        });

	        return kendo.toString(sum, "n0");
	    },
	    checkInput 			: function() {	        
	        var isValid = true;
	        var hasReading = false;

	        $.each(this.dataSource.data(), function(index, value) {
	        	if(value.current>0){
	        		hasReading = true;
	        	}

	        	if(value.isValid==false){
	        		isValid = false;
	        	}		        	          
	        });

	        if(hasReading==false){
	        	isValid = false;
	        }

	        return isValid;
	    },             	
      	save 				: function(){
      		var self = this;	      		     			
  			var monthOf = new Date(this.get("month_of"));
			monthOf.setDate(1);
			monthOf = kendo.toString(monthOf, "yyyy-MM-dd");

			$.each(this.dataSource.data(), function(index, value){
				if(kendo.parseInt(value.current)>0){
					self.meterRecordDS.add({				
						meter_id	: value.id,
						read_by 	: self.get("read_by"),
						input_by 	: 0,						
					   	previous	: value.previous,
					   	current 	: value.current,					   	
					   	new_round	: false,
					   	usage 		: value.usage,					   	
					   	month_of 	: monthOf,
					   	from_date	: kendo.toString(self.get("from_date"), "yyyy-MM-dd"),						   
					   	to_date 	: kendo.toString(self.get("to_date"), "yyyy-MM-dd"),
					   	memo 		: ""
					});
				}
			});

			this.meterRecordDS.sync();
			var saved = false;				
			this.meterRecordDS.bind("requestEnd", function(e){				
				if(saved==false){
					saved = true;

					self.meterRecordDS.data([]);
					self.dataSource.data([]);
				}
			});      			
      	}      			
	});
	banhji.wIRReader = kendo.observable({						
		dataSource 			: new kendo.data.DataSource({
			transport: {
				read: {
					url: baseUrl + "meters/wreading",
					headers: {
						"Entity": getDB()
					},
					type: "GET",
					dataType: "json"
				}			  	
			},						
			pageSize: 100,							  	
		  	schema: {
				model: {
					id: "id"
				},
				data: "results",
				total: "count"	
			}
		}),
		readerDS 			: dataStore(baseUrl + "contacts/employee"),
		branchDS 			: dataStore(baseUrl + "contacts/branch"),		
		locationDS 			: dataStore(baseUrl + "locations"),		
		meterDS				: dataStore(baseUrl + "meters"),
		meterRecordDS		: dataStore(baseUrl + "meters/record"),

		monthOfSearch 		: null,		
		brand_id 			: null,
		location_id 		: null,
		meter_id 			: null,
						
		month_of 			: new Date(),
		from_date			: new Date(),
		to_date				: new Date(),
		read_by 			: null,
		
		pageLoad 			: function(){
										
		},
		strMonthOf 			: function(){
			return "អំនានប្រចាំខែ " + kendo.toString(this.get("monthOfSearch"), "MM-yyyy");
		},		
		search 				: function(){											
			var monthOfSearch = this.get("monthOfSearch"),
			location_id = this.get("location_id"),
			meter_id = this.get("meter_id");
					
			if(monthOfSearch){				
				if(location_id || meter_id){						
					var monthOf = new Date(monthOfSearch);
					monthOf.setDate(1);
					monthOf = kendo.toString(monthOf, "yyyy-MM-dd");
										
					this.dataSource.transport.options.read.data={
						month_of 	: monthOf,
						location_id : location_id,
						meter_id 	: meter_id
					};
					this.dataSource.read();	
				}
			}else{
				alert("សូមជ្រើសរើស ខែ");
			}		
		},						
		isSupported 		: function() {
			// check if File API is supported in this browser
			if(window.File && window.FileReader && window.FileList && window.Blob) {
				return true;
			} else {
				return false;
			}
		},			
		readFile 			: function(e){
			e.preventDefault();
			var self = this;

			var reader = new FileReader();					
			if(this.get("isSupported")) {
				var file = document.getElementById('myFile').files[0];
				// var file = $('#myFile').get(0).files[0];

				if(file !== undefined) {
					this.set("uploadStatus", "");
					reader.readAsText(file);
					
					reader.onload = function() {						
 						var result = reader.result.split('\r');	 						
 						
						// for (var i = 1; i < result.length; i ++) {								
						// 	var data = result[i].split(',');
						// 	readingList.push(data);															
						// }

						self.dataSource.transport.options.read.data = result;
						self.dataSource.read();																		
					}

					reader.onerror = function() {							
						this.set("uploadStatus", reader.error);
					}						
				} else {
					this.set("uploadStatus", "សូមជ្រើសរើសឯកសា!");
				}

			} else {
				this.set("uploadStatus", "ឯកសារេនះពុំត្រឹមត្រូវទេ!");					
			}
		},				
      	onChange 			: function(e) {
      		e.preventDefault();

      		var self = this;
      		var selected = e.data;            
            
            if(kendo.parseInt(selected.current)>0){        
		        var add_up = 0;
		        if(selected.new_round){
		        	add_up = kendo.parseInt(selected.max_number);            	
	        	}
	        	var usage = ((kendo.parseInt(selected.current) + add_up) - kendo.parseInt(selected.previous))*selected.multiplier;
	            selected.set("usage", usage);
	            
	            if(usage<0){
					selected.set("isValid", false);
				}else{
					selected.set("isValid", true);
				}
			}else{
				selected.set("usage", "");
				selected.set("isValid", true);
			}

			var nextID = selected.index+1;
			$(".txt"+nextID).focus();            
        },       
        total 				: function() {      		
	        var sum = 0;

	        $.each(this.dataSource.data(), function(index, value) {	        		            
	        	sum += kendo.parseInt(value.usage);		        	          
	        });

	        return kendo.toString(sum, "n0");
	    },
	    checkInput 			: function() {	        
	        var isValid = true;
	        var hasReading = false;

	        $.each(this.dataSource.data(), function(index, value) {
	        	if(value.current>0){
	        		hasReading = true;
	        	}

	        	if(value.isValid==false){
	        		isValid = false;
	        	}		        	          
	        });

	        if(hasReading==false){
	        	isValid = false;
	        }

	        return isValid;
	    },             	
      	save 				: function(){
      		var self = this;	      		     			
  			var monthOf = new Date(this.get("month_of"));
			monthOf.setDate(1);
			monthOf = kendo.toString(monthOf, "yyyy-MM-dd");

			$.each(this.dataSource.data(), function(index, value){
				if(kendo.parseInt(value.current)>0){
					self.meterRecordDS.add({				
						meter_id	: value.id,
						read_by 	: self.get("read_by"),
						input_by 	: 0,						
					   	previous	: value.previous,
					   	current 	: value.current,					   	
					   	new_round	: false,
					   	usage 		: value.usage,					   	
					   	month_of 	: monthOf,
					   	from_date	: kendo.toString(self.get("from_date"), "yyyy-MM-dd"),						   
					   	to_date 	: kendo.toString(self.get("to_date"), "yyyy-MM-dd"),
					   	memo 		: ""
					});
				}
			});

			this.meterRecordDS.sync();
			var saved = false;				
			this.meterRecordDS.bind("requestEnd", function(e){				
				if(saved==false){
					saved = true;

					self.meterRecordDS.data([]);
					self.dataSource.data([]);
				}
			});      			
      	}      			
	});
	banhji.wInvoice = kendo.observable({		
		dataSource  	: dataStore(baseUrl + "invoices/uInvoice"),
		meterDS  		: dataStore(baseUrl + "meters"),		
		branchDS 		: dataStore(baseUrl + "contacts/branch"),		
		locationDS 		: dataStore(baseUrl + "locations"),				
		feeDS 		 	: dataStore(baseUrl + "fees"),
		tariffItemDS 	: dataStore(baseUrl + "fees/item"),		
		readingDS 		: new kendo.data.DataSource({
			transport: {
				read: {
					url: baseUrl + "meters/reading_for_invoice",
					headers: {
						"Entity": getDB()
					},
					type: "GET",
					dataType: "json"
				}			  	
			},						
			pageSize: 100,							  	
		  	schema: {
				model: {
					id: "id"
				},
				data: "results",
				total: "count"	
			}		  			
		}),

		chkAll 			: false,		
		monthOfSearch 	: null,
		company_id 		: null,
		location_id 	: null,
		meter_id 		: null,		
		biller 			: banhji.userManagement.getLogin() === null ? '':banhji.userManagement.getLogin().id,
				
		issued_date		: new Date(),
		payment_date 	: new Date(),
		due_date 		: new Date(),	
		month_of 		: new Date(),
		
		pageLoad 		: function(){
			this.feeDS.filter({ field:"utility_id", value: 2 });			
			this.tariffItemDS.query({
				filter: [],				
				sort: [					
					{ field: "fee_id", dir: "asc" },
					{ field: "usage", dir: "desc" }
				],
				page: 1,
				take: 100
			});			
		},		
		search 			: function(){
			var monthOfSearch = this.get("monthOfSearch"),
			location_id = this.get("location_id"),
			meter_id = this.get("meter_id");
					
			if(monthOfSearch){				
				if(location_id || meter_id){						
					var monthOf = new Date(monthOfSearch);
					monthOf.setDate(1);
					monthOf = kendo.toString(monthOf, "yyyy-MM-dd");
										
					this.readingDS.transport.options.read.data={
						month_of 	: monthOf,
						location_id : location_id,
						meter_id 	: meter_id
					};
					this.readingDS.read();	
				}
			}else{
				alert("សូមជ្រើសរើស ខែ");
			}
		},	
		checkAll 		: function(e){
			e.preventDefault();

			var bolValue = this.get("chkAll");
			var data = this.readingDS.data();
			
			if(data.length>0){						
		        $.each(data, function(index, value){		        			        	
		        	value.set("isCheck", bolValue);		        	
		        });		        			        
	        }							
		},		
        total 			: function(){      		
	        var sum = 0;

	        $.each(this.readingDS.data(), function(index, value) {	        		            
	        	sum += kendo.parseInt(value.usage);		        	          
	        });

	        return kendo.toString(sum, "n0");
	    },	    	 
		save 	 		: function(){
			var self = this,
			data = this.readingDS.data(),
			companyRate =  banhji.currency.getAmount(banhji.institute.locale),
			monthOf = new Date(this.get("month_of"));

			monthOf.setDate(1);
			monthOf = kendo.toString(monthOf, "yyyy-MM-dd");
					
			//Get unique contact_id
			var uniqueCustomerID = [];
			$.each(data, function(index, value){
				if(value.isCheck){				
			    	if($.inArray(value.customer[0].id, uniqueCustomerID) === -1) uniqueCustomerID.push(value.customer[0].id);
			    }				
			});			
			
			for (var i=0;i<uniqueCustomerID.length;i++) {
				var contactID = uniqueCustomerID[i], invoiceLineList = [], amount = 0, rate = 1, locale = "km-KH", company_id = 0, location_id = 0;

				//Calculation
				$.each(data, function(index, value){															
					if(value.customer[0].id==contactID){						
						var usage = kendo.parseInt(value.usage),
						current_amount = 0,						
						customerCurrency = banhji.currency.dataSource.get(value.customer[0].currency_id),					
						tariff = self.feeDS.get(value.meter[0].tariff_id),
						exemption = self.feeDS.get(value.meter[0].exemption_id),
						maintenance = self.feeDS.get(value.meter[0].maintenance_id);

						company_id = value.customer[0].wbranch_id;
						location_id = value.customer[0].wlocation_id;						
						rate = kendo.parseFloat(customerCurrency.rate)/companyRate;						
						locale = customerCurrency.locale;

						//Apply usage exemption						
						if(value.meter[0].exemption_id>0){							
							if(exemption.unit=="usage"){
								var exemptionUsage = kendo.parseFloat(exemption.amount);
								if(usage>exemptionUsage){
									usage -= exemptionUsage;
								}else{
									usage = 0;
								}

								invoiceLineList.push({				
							   		"invoice_id"		: 0,
									"item_id" 			: 0,															
								   	"meter_record_id"	: value.id,
								   	"description" 		: exemption.name,					   	
								   	"unit" 				: 1,
								   	"price"				: exemption.amount,					   	
								   	"amount" 			: exemption.amount,
								   	"rate"				: rate,
								   	"locale" 			: locale,
								   	"has_vat" 			: false,
								   	"type" 				: "exemptionUsage"
								});
							}					
						}
						
						//Apply tariff						
						if(value.meter[0].tariff_id>0){							
							$.each(self.tariffItemDS.data(), function(indexti, tariffItem){
								var tariffItemUsage = kendo.parseInt(tariffItem.usage);
								
								if((tariffItem.fee_id==tariff.id) && (usage>=tariffItemUsage)){
									if(tariffItem.is_flat){								
										current_amount = kendo.parseFloat(tariffItem.price);																																																																																
									}else{								
										current_amount = usage * kendo.parseFloat(tariffItem.price);																						
									}

									invoiceLineList.push({				
								   		"invoice_id"		: 0,
										"item_id" 			: 0,																
									   	"meter_record_id"	: value.id,
									   	"description" 		: tariff.name,					   	
									   	"unit" 				: usage,
									   	"price"				: tariffItem.price,					   	
									   	"amount" 			: current_amount,
									   	"rate"				: rate,
									   	"locale" 			: locale,
									   	"has_vat" 			: false,
								   		"type" 				: "tariff"
									});

									return false;						
								}
							});					
						}
						
						//Apply exemption
						if(value.meter[0].exemption_id>0){
							//Exemption money											
							if(exemption.unit=="money"){												
								invoiceLineList.push({				
							   		"invoice_id"		: 0,
									"item_id" 			: 0,															
								   	"meter_record_id"	: value.id,
								   	"description" 		: exemption.name,					   	
								   	"unit" 				: 1,
								   	"price"				: exemption.amount,					   	
								   	"amount" 			: exemption.amount,
								   	"rate"				: rate,
								   	"locale" 			: locale,
								   	"has_vat" 			: false,
								   	"type" 				: "exemptionMoney"
								});

								if(current_amount>kendo.parseFloat(exemption.amount)){
									current_amount -= kendo.parseFloat(exemption.amount);
								}else{
									current_amount = 0;
								}						
							}

							//Exemtpion %
							if(exemption.unit=="%"){
								var exemptionPercentTageAmount = current_amount * kendo.parseFloat(exemption.amount);

								invoiceLineList.push({				
							   		"invoice_id"		: 0,
									"item_id" 			: 0,													
								   	"meter_record_id"	: value.id,
								   	"description" 		: exemption.name,					   	
								   	"unit" 				: 1,
								   	"price"				: exemption.amount,					   	
								   	"amount" 			: exemptionPercentTageAmount,
								   	"rate"				: rate,
								   	"locale" 			: locale,
								   	"has_vat" 			: false,
								   	"type" 				: "exemptionP"
								});

								if(current_amount>exemptionPercentTageAmount){
									current_amount -= exemptionPercentTageAmount;
								}else{
									current_amount = 0;
								}
							}
						}

						//Apply maintenance						
						if(value.meter[0].maintenance_id>0){
							invoiceLineList.push({				
						   		"invoice_id"		: 0,
								"item_id" 			: 0,															
							   	"meter_record_id"	: value.id,
							   	"description" 		: maintenance.name,					   	
							   	"unit" 				: 1,
							   	"price"				: maintenance.amount,					   	
							   	"amount" 			: maintenance.amount,
							   	"rate"				: rate,
							   	"locale" 			: locale,
							   	"has_vat" 			: false,
							   	"type" 				: "maintenance"
							});

							current_amount += kendo.parseFloat(maintenance.amount);												
						}

						amount += current_amount;
					}					
				});				
				
				//Add invoice
				this.dataSource.add({				
			   		"company_id"		: company_id,
			   		"location_id" 		: location_id,
			   		"contact_id"		: contactID,
			   		"payment_term_id" 	: 0,
			   		"payment_method_id" : 0,
			   		"reference_id" 		: 0,
			   		"cash_account_id" 	: 0,
			   		"vat_id"			: 0,
			   		"biller_id" 		: this.get("biller"),			   			
					"number" 			: "",											
				   	"type"				: "wInvoice",
				   	"amount" 			: amount,
				   	"amount_paid" 		: 0,
				   	"vat" 				: 0,					   	
				   	"rate" 				: rate,
				   	"locale" 			: locale,
				   	"month_of" 			: monthOf,
				   	"issued_date"		: kendo.toString(this.get("issued_date"), "yyyy-MM-dd"),					   	
				   	"payment_date" 		: kendo.toString(this.get("payment_date"), "yyyy-MM-dd"),
				   	"due_date" 			: kendo.toString(this.get("due_date"), "yyyy-MM-dd"),
				   	"check_no" 			: "",
				   	"memo" 				: "",
				   	"memo2" 			: "",
				   	"status" 			: 0,

				   	"invoice_lines"  	: invoiceLineList
				});
			}

			var saved = false;			
			this.dataSource.sync();
			this.dataSource.bind("requestEnd", function(e){
				if(saved==false){
					saved = true;
					
					self.readingDS.read();
				}
			});
		},
		cancel 				: function(){
			this.dataSource.cancelChanges();
			window.history.back();
		}	
	});
	banhji.wPrintCenter = kendo.observable({				
		dataSource 	 		: dataStore(baseUrl + "invoices/wprint"),
		snapshotDS 	 		: dataStore(baseUrl + "invoices/wprint_snapshot"),
		branchDS 			: dataStore(baseUrl + "contacts/branch"),
		locationDS 			: dataStore(baseUrl + "locations"),
		
		obj 				: null,
		monthOfSearch 		: "",
		branch_id 			: null,
		selectedLocations 	: [],
		isBranchSelected	: false,
		chkAll				: true,	
						
		pageLoad 			: function(id){			
			if(id){
				this.dataSource.filter({ field:"id", value: id });
			}			
		},
		branchChanges 		: function(){
			var branch_id = this.get("branch_id");

			if(branch_id){
				this.set("isBranchSelected", true);
				this.locationDS.filter({ field:"company_id", value: branch_id });
			}else{
				this.set("isBranchSelected", false);
				this.set("selectedLocations", []);
			}        	
        },
        checkAll 			: function(){
			var bolValue = this.get("chkAll");
			var data = this.dataSource.data();
			
			if(data.length>0){						
		        $.each(data, function(index, value){		        			        	
		        	value.set("isCheck", bolValue);		        	
		        });		        			        
	        }							
		},
		search 				: function(){
			var self = this, 
			para = [],
			monthOfSearch = this.get("monthOfSearch"),
			branch_id = this.get("branch_id"),
			selectedLocations = this.get("selectedLocations");
			
			if(selectedLocations.length>0){
				var ids = [];
				$.each(selectedLocations, function(index, value){
					ids.push(value);
				});
				
				para.push({ field:"location_id", operator:"where_in", value:ids });
			}else if(branch_id){
				para.push({ field:"company_id", value:branch_id });
			}					

			if(monthOfSearch){								
				var monthOf = new Date(monthOfSearch);
				monthOf.setDate(1);
				monthOf = kendo.toString(monthOf, "yyyy-MM-dd");
												
				para.push({ field:"month_of", value:monthOf });
			}			
						
			this.dataSource.query({
				filter: para,
				page:1,
				take:100
			}).then(function(){
				self.checkAll();
			});

			this.snapshotDS.query({
				filter: para,
				page:1,
				take:100
			}).then(function(){
				var view = self.snapshotDS.view();
				kendo.culture(banhji.institute.locale);
				self.set("obj", view[0]);
			});							
		},
		print 				: function(){
			if(this.dataSource.total()>0){
				var ids = [];
				$.each(this.dataSource.data(), function(index, value){		        			        	
		        	if(value.isCheck){
		        		ids.push(value.id);
		        	}	        	
		        });

				if(ids.length>0){
			        banhji.router.navigate('/wInvoice_print');

			        banhji.wInvoicePrint.dataSource.query({
			        	filter: { field:"id", operator:"where_in", value:ids },
			        	page:1,
			        	take:100
			        }).then(function(){
			        	banhji.wInvoicePrint.barcod();
			        });
		    	}else{
		    		alert("សូមមេត្តាចុចក្នុងប្រអប់ដើម្បីជ្រើសរើសវិក្កយបត្រ។");
		    	}
			}else{
				alert("សូមអភ័យទោស ពុំមានទិន្ន័យសំរាប់ោបះពុម្ពទេ។");
			}
		}		
	});
	banhji.wInvoicePrint = kendo.observable({				
		dataSource 	 	: dataStore(baseUrl + "invoices/wInvoice_print"),
		invoiceDS 	 	: dataStore(baseUrl + "invoices"),	
		isVisible 		: true,
		user_id 		: banhji.userManagement.getLogin() === null ? '':banhji.userManagement.getLogin().id,	
				
		pageLoad 		: function(id){
			if(id){
				var self = this;
				this.dataSource.query({
					filter: { field:"id", value: id },
					page:1,
					take:100
				}).then(function(){
					self.barcod();
				});
			}			
		},					
		barcod 			: function(){									
			var view = this.dataSource.view();
			
			for (var i=0;i<view.length;i++) {
				var d = view[i];				
												
				$("#"+d.contact[0].wnumber).kendoBarcode({
					renderAs: "svg",
				  	value: d.contact[0].wnumber,
				  	type: "code128",
				  	width: 200,
					height: 40,
					text:{
					    visible: false
					}	
				});				
			}		
		},
		print 						: function(){
			var self = this;
			$.each(this.dataSource.data(), function(index, value){
				value.set("print_count", kendo.parseInt(value.print_count)+1);
				value.set("printed_by", self.get("user_id"));
			});

			window.print();

			this.dataSource.sync();
			// var saved = false;
			// this.dataSource.bind("requestEnd", function(){
			// 	if(e.type=="update"){
			// 		saved = true;

			// 		self.dataSource.data([]);
			// 		window.history.back();
			// 	}
			// });
		},		
		hideFrameInvoice 			: function(e) {
			var printBtn = e.target;
			if(printBtn.checked) {
				$(".hiddenPrint").css("visibility", "hidden");
			} else {
				$(".hiddenPrint").css("visibility", "visible");
			}
		}
	});
	banhji.wInventoryItem =  kendo.observable({    	
    	dataSource 			: dataStore(baseUrl + "items"),
    	categoryDS 			: dataStore(baseUrl + "categories"),
    	itemGroupDS			: dataStore(baseUrl + "items/group"),    	
    	contactDS  			: dataStore(baseUrl + "contacts"),
    	
    	searchField			: "",
    	category_id 		: 0,
    	item_group_id 		: 0,
    	    	
    	pageLoad 			: function(){    		
    		
    	},
    	search 				: function(){
    		var para = [],
    		searchField = this.get("searchField"),
    		category_id = this.get("category_id"),
    		item_group_id = this.get("item_group_id");

    		if(searchField!==""){
    			para.push(      				
      				{ field: "sku", operator: "like", value: searchField },
      				{ field: "name", operator: "or_like", value: searchField }
      			);
    		}

    		if(item_group_id>0){
    			para.push({ field:"item_group_id", value:item_group_id });
    		}else if(category_id>0){
    			para.push({ field:"category_id", value:category_id });
    		}

    		para.push({ field:"item_type_id", value:1 });

    		this.dataSource.filter(para);    		
    	},
    	searchFavorite 		: function(){
    		this.dataSource.filter({ field:"favorite", value: true });
    	},
    	categoryChanges : function(e){
    		e.preventDefault();
    		
    		var data = e.data;    		
    		this.dataSource.filter({ field:"category_id", value:data.id });
    	}		
    });	
	banhji.wSettings =  kendo.observable({		
        contactTypeDS 		: dataStore(baseUrl + "contacts/type"),        
        blockDS 	 		: dataStore(baseUrl + "locations"),
        branchDS 	 		: dataStore(baseUrl + "contacts/branch"),
        tariffDS 	 		: dataStore(baseUrl + "fees"),
        tariffItemDS 		: dataStore(baseUrl + "fees/item"),
        exemptionDS  		: dataStore(baseUrl + "fees"),
        maintenanceDS  		: dataStore(baseUrl + "fees"),

        flatList			: [ 
	 		{ id:"false", name: "អថេរ" }, 
	 		{ id:"true", name: "ថេរ" }
		],

		exemptionTypeList			: [ 
	 		{ id:"usage", name: "m3" }, 
	 		{ id:"money", name: "ទឹកប្រាក់" },
	 		{ id:"%", name: "%" }
		],

        contactTypeName 	: "",

        blockName 			: "",
        blockCompanyId  	: 0,
        blockAbbr 			: "",

        tariffName 			: "",
        tariffCompanyId 	: 0,

        fee_id 				: 0,
        tariffUsage 		: "",
        tariffPrice 		: "",
        tariffFlat 			: false,
        selectedTariffName 	: "",
        selectedTariff 		: false,

        exemptionName 		: "",
        exemptionAmount 	: "",
        exemptionCompanyId 	: 0,
        exemptionType 		: "",

        maintenanceName 	: "",
        maintenanceAmount 	: "",
        maintenanceCompanyId: 0,

        pageLoad 			: function() {
        	this.contactTypeDS.filter({ field:"parent_id", value: 1 });
        	this.blockDS.filter({ field:"utility_id", value: 2 });
        	this.tariffDS.filter([
        		{ field:"utility_id", value: 2 },
        		{ field:"type", value: "tariff" }
        	]);
        	this.exemptionDS.filter([
        		{ field:"utility_id", value: 2 },
        		{ field:"type", value: "exemption" }
        	]);
        	this.maintenanceDS.filter([
        		{ field:"utility_id", value: 2 },
        		{ field:"type", value: "maintenance" }
        	]);
        },	    
        addContactType 		: function(){
        	var name = this.get("contactTypeName");

        	if(name!==""){
	        	this.contactTypeDS.add({
	        		parent_id 	: 1,
	        		name 		: name
	        	});

	        	this.contactTypeDS.sync();
        	}
        },
        addBlock 			: function(){
        	var name = this.get("blockName");
        	
        	if(name!==""){
	        	this.blockDS.add({	        		
	        		company_id 	: this.get("blockCompanyId"),
	        		utility_id 	: 2,
	        		name 		: name,
	        		abbr 		: this.get("blockAbbr"),
	        		company 	: []
	        	});

	        	this.blockDS.sync();
        	}
        },
        addTariff 			: function(){
        	var name = this.get("tariffName");
        	
        	if(name!==""){
	        	this.tariffDS.add({	        		
	        		company_id 	: this.get("tariffCompanyId"),
	        		utility_id 	: 2,
	        		type 		: "tariff",
	        		name 		: name,
	        		amount 		: 0,
	        		unit 		: null,
	        		status 		: 1,

	        		company 	: []
	        	});

	        	this.tariffDS.sync();
        	}
        },
        addTariffItem 		: function(){
        	var usage = this.get("tariffUsage");
        	
        	if(usage!==""){
	        	this.tariffItemDS.add({	        		
	        		fee_id 		: this.get("fee_id"),
	        		usage 	 	: usage,
	        		price 		: this.get("tariffPrice"),
	        		is_flat		: this.get("tariffFlat")	        		
	        	});

	        	this.tariffItemDS.sync();
        	}
        },
        loadTariffItem 		: function(e){
	        var d = e.data;

	        this.set("selectedTariff", true);
	        this.set("fee_id", d.id);
	        this.set("selectedTariffName", d.name);
	        this.tariffItemDS.query({
	        	filter: { field:"fee_id", value: d.id },
	        	sort: { field:"usage", dir:"asc" },
	        	page: 1,
	        	take: 100
	        });  	
        },
        addExemption 		: function(){
        	var name = this.get("exemptionName");
        	
        	if(name!==""){
	        	this.exemptionDS.add({	        		
	        		company_id 	: this.get("exemptionCompanyId"),
	        		utility_id 	: 2,
	        		type 		: "exemption",
	        		name 		: name,
	        		amount 		: this.get("exemptionAmount"),
	        		unit 		: this.get("exemptionType"),
	        		status 		: 1,

	        		company 	: []
	        	});

	        	this.exemptionDS.sync();
        	}
        },
        addMaintenance		: function(){
        	var name = this.get("maintenanceName");
        	
        	if(name!==""){
	        	this.maintenanceDS.add({	        		
	        		company_id 	: this.get("maintenanceCompanyId"),
	        		utility_id 	: 2,
	        		type 		: "maintenance",
	        		name 		: name,
	        		amount 		: this.get("maintenanceAmount"),
	        		unit 		: null,
	        		status 		: 1,

	        		company 	: []
	        	});

	        	this.maintenanceDS.sync();
        	}
        }
    });
	banhji.wBranch =  kendo.observable({		
        dataSource 		: dataStore(baseUrl + "contacts/branch"),
        existingDS		: dataStore(baseUrl + "contacts/branch"),
        deleteDS 		: dataStore(baseUrl + "locations"),
        currencyDS 		: dataStore(baseUrl + 'currencies'),

        statusList 		: [            
			{ "id": 1, "name": "កំពុងប្រើប្រាស់" },
			{ "id": 2, "name": "ផ្អាក់ប្រើប្រាស់" },
			{ "id": 0, "name": "ឈប់ប្រើប្រាស់" }
        ],

        obj 			: null,
        isEdit 			: false,
        isExisting 		: false,         	
                
        pageLoad 		: function(id){
        	var self = this;

        	if(id){        		
        		this.set("isEdit", true);        		
        		
        		this.dataSource.query({
				  	filter: { field: "id", value: id },
				  	page: 1,
				  	take: 50
				}).then(function(e) {
    				var view = self.dataSource.view();

    				if(view.length>0){
    					self.set("obj", view[0]);
    				}else{
    					self.addEmpty();
    				}
				});
        	}else{        		
        		this.set("isEdit", false);
        		this.addEmpty();
        	}
        },        
        checkExisting 	: function(){
        	var self = this, 
        	number = this.get("obj").operation_license;

        	this.existingDS.query({
			  	filter: { field: "operation_license", value: number },
			  	page: 1,
			  	take: 50
			}).then(function(e) {
				var view = self.existingDS.view();

				if(view.length>0){
					self.set("isExisting", true);
				}else{
					self.set("isExisting", false);
				}
			});
        },
        addEmpty 		: function(){
        	this.set("isEdit", false);
        	this.dataSource.data([]);

      		if(this.dataSource.total()==0){
				this.dataSource.add({					 			
					utility_id 			: 2,
					currency_id 		: 0,
					province_id 		: 0,
					country_id 			: 0,
					name 				: "",
					description 		: "",
					abbr 				: "",
					representative 		: "",
					email 				: "",
					mobile 				: "",
					phone 				: "",
					address 			: "",					
					expire_date 		: "",
					max_customer 		: "",
					operation_license 	: "",
					term_of_condition 	: "",
					image_url 			: "",
					status 				: 1
				});
				
				var data = this.dataSource.data();			
				var obj = data[data.length - 1];			
				this.set("obj", obj);
			}	
		},
		save 			: function(){			
			var self = this, saved = false;

			this.dataSource.sync();			
			this.dataSource.bind("requestEnd", function(e){				
				if(e.type=="create" && saved==false){					
					saved = true;
					
					self.addEmpty();
					banhji.wSettings.branchDS.fetch();					
				}

				if(e.type=="update" && saved==false){
					saved = true;
					banhji.wSettings.branchDS.fetch();
				}

				if(e.type=="destroy" && saved==false){
					saved = true;
					banhji.wSettings.branchDS.fetch();
					window.history.back();
				}
			});
		},
		delete 			: function(){
			var self = this,
			id = this.get("obj").id;

			if (confirm("តើលោកអ្នកពិតជាចង់លុបមែនឬទេ?")) {
				this.deleteDS.query({
				  	filter: { field: "company_id", value: id },
				  	page: 1,
				  	take: 1
				}).then(function() {
					var view = self.deleteDS.view();

					if(view.length>0){
						alert("សួមអភ័យទោស! លោកអ្នកពុំអាចលុបទិន្នន័យដែលកំពុងប្រើប្រាស់បានទេ។");
					}else{
						var data = self.dataSource.get(id);
				        self.dataSource.remove(data);
				        self.save();
					}
				});				
	    	}
		},
		cancel 			: function(){
			this.dataSource.cancelChanges();
			window.history.back();
		}
    });

    //Water Reports
	banhji.wReportCenter = kendo.observable({
		dataSource 			: dataStore(baseUrl + "invoices/wkpi"),
		branchDS 			: dataStore(baseUrl + "contacts/branch"),
		
		obj 				: null,
		branch_id 			: null,

		pageLoad 			: function(){
			
		},
		branchChanges		: function(){			
			var branch_id = this.get("branch_id");
			
			this.loadKPI(branch_id);			
		},
		loadKPI 			: function(id){
			var self = this;
			
			if(id){
				this.dataSource.query({
					filter: { field:"company_id", value: id },
					page: 1,
					take: 100
				}).then(function(){
					var view = self.dataSource.view();
					
					if(view.length>0){
						self.set("obj", view[0]);
					}else{
						self.set("obj", null);
					}
				});
			}else{
				this.set("obj", null);
			}			
		}
	});
	banhji.wCustomerNoMeter = kendo.observable({
		dataSource 			: dataStore(baseUrl + "contacts/no_meter"),
		branchDS 			: dataStore(baseUrl + "contacts/branch"),		
		
		branch_id 			: 0,				
				
		pageLoad 			: function(){
			
		},
		goToNewMeter 		: function(e){
			var obj = e.data;	
			
			banhji.router.navigate('/wMeter');
			banhji.wMeter.loadContact(obj.id);			
		},				
		search 				: function(){
			var branch_id = this.get("branch_id"), para = [];

        	if(branch_id){
        		this.dataSource.filter([
	    			{ field:"wbranch_id", value: branch_id },
	    			{ field:"use_water", value: true },
	    			{ field:"status", value: 1 },
	    		]); 
        	}else{
        		alert("សូមមេត្តាជ្រើសរើស អាជ្ញាបណ្ណ");
        	}        	                 
		}
	});
	banhji.wBrandNewCustomer = kendo.observable({
		dataSource 			: dataStore(baseUrl + "contacts/branch_new"),
		branchDS 			: dataStore(baseUrl + "contacts/branch"),
		
		sortList			: [ 
	 		{ text:"ទាំងអស់", value: "all" }, 
	 		{ text:"ថ្ងៃនេះ", value: "today" }, 
	 		{ text:"សប្ដាស៍នេះ", value: "week" }, 
	 		{ text:"ខែនេះ", value: "month" }, 
	 		{ text:"ឆ្នាំនេះ", value: "year" } 
		],
		sorter 				: "month",
		sdate 				: "",
		edate 				: "",
		
		branch_id 			: 0,
						
		pageLoad 			: function(){
			
		},
		strDate 			: function(){
			var strDate = "",
			sdate = this.get("sdate"),
			edate = this.get("edate");

			if(sdate && edate){
				strDate = "ចាប់ពីថ្ងៃទី " + kendo.toString(new Date(sdate), "dd-MM-yyyy") + " ដល់ " + kendo.toString(new Date(edate), "dd-MM-yyyy");
			}else if(sdate){
				strDate = "ថ្ងៃទី " + kendo.toString(new Date(sdate),"dd-MM-yyyy");
			}else if(edate){
				strDate = "នៅត្រឹមថ្ងៃទី " + kendo.toString(new Date(edate),"dd-MM-yyyy");
			}else{
				strDate = "";
			}

			return strDate;
		},
		sorterChanges 		: function(){
			var value = this.get("sorter"),
			today = new Date();

			switch(value){
			case "today":								
				this.set("sdate", today);
				this.set("edate", "");				
			  					
			  	break;
			case "week":
			  	var thisWeek = new Date;
				var first = thisWeek.getDate() - thisWeek.getDay(); 
				var last = first + 6;

				var firstDayOfWeek = new Date(thisWeek.setDate(first));
				var lastDayOfWeek = new Date(thisWeek.setDate(last));				

				this.set("sdate", firstDayOfWeek);
				this.set("edate", lastDayOfWeek);
				
			  	break;
			case "month":
				var thisMonth = new Date;				  	
				var firstDayOfMonth = new Date(thisMonth.getFullYear(), thisMonth.getMonth(), 1);
				var lastDayOfMonth = new Date(thisMonth.getFullYear(), thisMonth.getMonth() + 1, 0);

				this.set("sdate", firstDayOfMonth);
				this.set("edate", lastDayOfMonth);

			  	break;
			case "year":
				var thisYear = new Date();
			  	var firstDayOfYear = new Date(thisYear.getFullYear(), 0, 1);
				var lastDayOfYear = new Date(thisYear.getFullYear(), 11, 31);

				this.set("sdate", firstDayOfYear);
				this.set("edate", lastDayOfYear);

			  	break;
			default:
				this.set("sdate", "");
				this.set("edate", "");					  
			}
		},		
		search 				: function(){
			var self = this,
				branch_id = this.get("branch_id"),
				start = this.get("sdate"),
        		end = this.get("edate"),	        		
        		para = [];

        	//Dates
        	if((start && end) && (new Date(start) < new Date(end))){        		
            	para.push({ field:"registered_date >=", value: kendo.toString(start, "yyyy-MM-dd") });
            	para.push({ field:"registered_date <=", value: kendo.toString(end, "yyyy-MM-dd") });            	            	
            }else if(start){
            	para.push({ field:"registered_date", value: kendo.toString(start, "yyyy-MM-dd") });
            }else if(end){
            	para.push({ field:"registered_date <=", value: kendo.toString(end, "yyyy-MM-dd") });
            }else{
            	
            }

            if(branch_id){
            	para.push({ field:"wbranch_id", value:branch_id });
            }

            para.push({ field:"use_water", value:true });
            para.push({ field:"status", value:1 });    

            this.dataSource.query({
            	filter: para,
            	sort: { field: "registered_date", dir: "desc" },
            	page: 1,
            	take: 100
            });            
		}
	});
    banhji.wAgingSummary = kendo.observable({
		dataSource 			: dataStore(baseUrl + "invoices/waging_summary"),		
		branchDS 			: dataStore(baseUrl + "contacts/branch"),		
		locationDS 			: dataStore(baseUrl + "locations"),
		
		branch_id 			: 0,
		location_id 		: 0,
		search_date 		: new Date(),
		strDate 			: "",		
				
		pageLoad 			: function(){
			
		},			
		strDate 			: function(){
			var search_date = this.get("search_date");
			
			return kendo.toString(new Date(search_date), "dd-MM-yyyy");
		},
		search 				: function(){
			var para = [],
			branch_id = this.get("branch_id"), 
			location_id = this.get("location_id"), 
			search_date = kendo.toString(this.get("search_date"), "yyyy-MM-dd");

        	if(location_id){
        		para.push({ field:"wlocation_id", value: location_id });
        	}else if(branch_id){
        		para.push({ field:"wbranch_id", value: branch_id });
        	}

        	if(search_date){
        		para.push({ field:"search_date", value: search_date });
        	}

        	if(para.length>0){
	            this.dataSource.query({
	            	filter: para,	            	           	
	            	page: 1,
	            	take: 100
	            });
            }             
		}
	});
	banhji.wAgingDetail = kendo.observable({
		dataSource 			: new kendo.data.DataSource({
			transport: {
                read 	: {
					url: baseUrl + "invoices/waging_detail",
					type: "GET",
					headers: {
						"Entity": getDB(),
						"User": banhji.userManagement.getLogin() === null ? '':banhji.userManagement.getLogin().id
					},
					dataType: 'json'
				},
				parameterMap: function(options, operation) {
					if(operation === 'read') {
						return {
							limit: options.pageSize,
							page: options.page,
							filter: options.filter,
							sort: options.sort
						};
					} else {
						return {models: kendo.stringify(options.models)};
					}
				}
            },
            schema:{
                model: {
                    fields: {                                    
                        number: { type: "string" },
                        amount: { type: "number" },
                        issued_date: { type: "date" },
                        due_date: { type: "date" },
                        fullIdName: { type: "string" },
                        age: { type: "number" },
                        ageGroup: { type: "string" }
                    }
                },
				data: 'results',
				total: 'count'
            },
            pageSize: 100,
            serverFiltering: true,
            sort: { field: "issued_date", dir: "asc" },
            group: {
                field: "អាយុកាល", aggregates: [                	
                	{ field: "number", aggregate: "count" },
                    { field: "amount", aggregate: "sum" }
                ]
            },
            aggregate: [            	
            	{ field: "number", aggregate: "count" }, 
            	{ field: "amount", aggregate: "sum" }
            ]
		}),		
		branchDS 			: dataStore(baseUrl + "contacts/branch"),		
		locationDS 			: dataStore(baseUrl + "locations"),
		
		branch_id 			: 0,
		location_id 		: 0,
		search_date 		: new Date(),
		strDate 			: "",		
				
		pageLoad 			: function(){
			
		},			
		strDate 			: function(){
			var search_date = this.get("search_date");
			
			return kendo.toString(new Date(search_date), "dd-MM-yyyy");
		},
		search 				: function(){
			var para = [],
			branch_id = this.get("branch_id"), 
			location_id = this.get("location_id"), 
			search_date = kendo.toString(this.get("search_date"), "yyyy-MM-dd");

        	if(location_id){
        		para.push({ field:"location_id", value: location_id });
        	}else if(branch_id){
        		para.push({ field:"company_id", value: branch_id });
        	}

        	if(search_date){
        		para.push({ field:"issued_date <=", value: search_date });
        	}

        	if(para.length>0){
	            this.dataSource.filter(para);
            }             
		}
	});
	banhji.wSaleSummary = kendo.observable({
		dataSource 			: dataStore(baseUrl + "invoices/wsale_summary"),
		
		sortList			: [ 
	 		{ text:"ទាំងអស់", 	value: "all" }, 
	 		{ text:"ថ្ងៃនេះ", 	value: "today" }, 
	 		{ text:"សប្ដាស៍នេះ",value: "week" }, 
	 		{ text:"ខែនេះ", 		value: "month" }, 
	 		{ text:"ឆ្នាំនេះ", 	value: "year" } 
		],
		sorter 				: "all",
		sdate 				: "",
		edate 				: "",

		pageLoad 			: function(){
			
		},
		sorterChanges 		: function(){
			var value = this.get("sorter"),
			today = new Date();

			switch(value){
			case "today":								
				this.set("sdate", today);
				this.set("edate", "");
							  					
			  	break;
			case "week":			  	
				var first = today.getDate() - today.getDay(),
				last = first + 6;

				var firstDayOfWeek = new Date(today.setDate(first)),
				lastDayOfWeek = new Date(today.setDate(last));				

				this.set("sdate", firstDayOfWeek);
				this.set("edate", lastDayOfWeek);
				
			  	break;
			case "month":							  	
				var firstDayOfMonth = new Date(today.getFullYear(), today.getMonth(), 1),
				lastDayOfMonth = new Date(today.getFullYear(), today.getMonth() + 1, 0);

				this.set("sdate", firstDayOfMonth);
				this.set("edate", lastDayOfMonth);

			  	break;
			case "year":				
			  	var firstDayOfYear = new Date(today.getFullYear(), 0, 1),
			  	lastDayOfYear = new Date(today.getFullYear(), 11, 31);

				this.set("sdate", firstDayOfYear);
				this.set("edate", lastDayOfYear);

			  	break;
			default:
				this.set("sdate", "");
				this.set("edate", "");					  
			}
		},		
		strDate 			: function(){
			var strDate = "",
			sdate = this.get("sdate"),
			edate = this.get("edate");

			if(sdate && edate){
				strDate = "ចាប់ពីថ្ងៃទី " + kendo.toString(new Date(sdate), "dd-MM-yyyy") + " ដល់ " + kendo.toString(new Date(edate), "dd-MM-yyyy");
			}else if(sdate){
				strDate = "ថ្ងៃទី " + kendo.toString(new Date(sdate),"dd-MM-yyyy");
			}else if(edate){
				strDate = "នៅត្រឹមថ្ងៃទី " + kendo.toString(new Date(edate),"dd-MM-yyyy");
			}else{
				strDate = "";
			}

			return strDate;
		},
		search 				: function(){
			var self = this,
			para = [], 
			start = kendo.toString(this.get("sdate"), "yyyy-MM-dd"), 
			end = kendo.toString(this.get("edate"), "yyyy-MM-dd");

        	//Dates
        	if(start && end){        		
            	para.push({ field:"issued_date", operator:"between", value1:"'"+start+"'", value2:"'"+end+"'" });            	          	            	
            }else if(start){
            	para.push({ field:"issued_date", value: start });
            }else if(end){
            	para.push({ field:"issued_date <=", value: end });
            }else{
            	
            }          

            this.dataSource.filter(para);
		}
	});
	banhji.wSaleDetail = kendo.observable({
		dataSource 			: dataStore(baseUrl + "invoices/wsale_detail"),
		branchDS 			: dataStore(baseUrl + "contacts/branch"),
		locationDS 			: dataStore(baseUrl + "locations"),

		sortList			: [ 
	 		{ text:"ទាំងអស់", 	value: "all" }, 
	 		{ text:"ថ្ងៃនេះ", 	value: "today" }, 
	 		{ text:"សប្ដាស៍នេះ",value: "week" }, 
	 		{ text:"ខែនេះ", 		value: "month" }, 
	 		{ text:"ឆ្នាំនេះ", 	value: "year" } 
		],
		sorter 				: "all",
		sdate 				: "",
		edate 				: "",

		branch_id 			: null,
		selectedLocations 	: [],
		isBranchSelected	: false,

		pageLoad 			: function(){
			
		},
		sorterChanges 		: function(){
			var value = this.get("sorter"),
			today = new Date();

			switch(value){
			case "today":								
				this.set("sdate", today);
				this.set("edate", "");
							  					
			  	break;
			case "week":			  	
				var first = today.getDate() - today.getDay(),
				last = first + 6;

				var firstDayOfWeek = new Date(today.setDate(first)),
				lastDayOfWeek = new Date(today.setDate(last));				

				this.set("sdate", firstDayOfWeek);
				this.set("edate", lastDayOfWeek);
				
			  	break;
			case "month":							  	
				var firstDayOfMonth = new Date(today.getFullYear(), today.getMonth(), 1),
				lastDayOfMonth = new Date(today.getFullYear(), today.getMonth() + 1, 0);

				this.set("sdate", firstDayOfMonth);
				this.set("edate", lastDayOfMonth);

			  	break;
			case "year":				
			  	var firstDayOfYear = new Date(today.getFullYear(), 0, 1),
			  	lastDayOfYear = new Date(today.getFullYear(), 11, 31);

				this.set("sdate", firstDayOfYear);
				this.set("edate", lastDayOfYear);

			  	break;
			default:
				this.set("sdate", "");
				this.set("edate", "");					  
			}
		},		
		strDate 			: function(){
			var strDate = "",
			sdate = this.get("sdate"),
			edate = this.get("edate");

			if(sdate && edate){
				strDate = "ចាប់ពីថ្ងៃទី " + kendo.toString(new Date(sdate), "dd-MM-yyyy") + " ដល់ " + kendo.toString(new Date(edate), "dd-MM-yyyy");
			}else if(sdate){
				strDate = "ថ្ងៃទី " + kendo.toString(new Date(sdate),"dd-MM-yyyy");
			}else if(edate){
				strDate = "នៅត្រឹមថ្ងៃទី " + kendo.toString(new Date(edate),"dd-MM-yyyy");
			}else{
				strDate = "";
			}

			return strDate;
		},
		branchChanges 		: function(){
			var branch_id = this.get("branch_id");

			if(branch_id){
				this.set("isBranchSelected", true);
				this.locationDS.filter({ field:"company_id", value: branch_id });
			}else{
				this.set("isBranchSelected", false);
				this.set("selectedLocations", []);
			}        	
        },
		search 				: function(){
			var self = this,
			para = [], 
			start = kendo.toString(this.get("sdate"), "yyyy-MM-dd"), 
			end = kendo.toString(this.get("edate"), "yyyy-MM-dd"),
			branch_id = this.get("branch_id"),
			selectedLocations = this.get("selectedLocations");

        	//Dates
        	if(start && end){        		
            	para.push({ field:"issued_date", operator:"between", value1:"'"+start+"'", value2:"'"+end+"'" });            	          	            	
            }else if(start){
            	para.push({ field:"issued_date", value: start });
            }else if(end){
            	para.push({ field:"issued_date <=", value: end });
            }else{
            	
            }

            if(selectedLocations.length>0){
				var ids = [];
				$.each(selectedLocations, function(index, value){
					ids.push(value);
				});
				
				para.push({ field:"location_id", operator:"where_in", value:ids });
			}else if(branch_id){
				para.push({ field:"company_id", value:branch_id });
			}          

            this.dataSource.filter(para);
		}
	});
	banhji.wPaymentSummary = kendo.observable({
		dataSource 			: dataStore(baseUrl + "payments/wsummary"),

		sortList			: [ 
	 		{ text:"ទាំងអស់", value: "all" }, 
	 		{ text:"ថ្ងៃនេះ", value: "today" }, 
	 		{ text:"សប្ដាស៍នេះ", value: "week" }, 
	 		{ text:"ខែនេះ", value: "month" }, 
	 		{ text:"ឆ្នាំនេះ", value: "year" } 
		],
		sorter 				: "all",
		sdate 				: "",
		edate 				: "",
		strDate 			: "",		
				
		pageLoad 			: function(){
			
		},
		sorterChanges 		: function(){
			var value = this.get("sorter"),
			today = new Date();

			switch(value){
			case "today":								
				this.set("sdate", today);
				this.set("edate", "");
							  					
			  	break;
			case "week":			  	
				var first = today.getDate() - today.getDay(),
				last = first + 6;

				var firstDayOfWeek = new Date(today.setDate(first)),
				lastDayOfWeek = new Date(today.setDate(last));				

				this.set("sdate", firstDayOfWeek);
				this.set("edate", lastDayOfWeek);
				
			  	break;
			case "month":							  	
				var firstDayOfMonth = new Date(today.getFullYear(), today.getMonth(), 1),
				lastDayOfMonth = new Date(today.getFullYear(), today.getMonth() + 1, 0);

				this.set("sdate", firstDayOfMonth);
				this.set("edate", lastDayOfMonth);

			  	break;
			case "year":				
			  	var firstDayOfYear = new Date(today.getFullYear(), 0, 1),
			  	lastDayOfYear = new Date(today.getFullYear(), 11, 31);

				this.set("sdate", firstDayOfYear);
				this.set("edate", lastDayOfYear);

			  	break;
			default:
				this.set("sdate", "");
				this.set("edate", "");					  
			}
		},		
		strDate 			: function(){
			var strDate = "",
			sdate = this.get("sdate"),
			edate = this.get("edate");

			if(sdate && edate){
				strDate = "ចាប់ពីថ្ងៃទី " + kendo.toString(new Date(sdate), "dd-MM-yyyy") + " ដល់ " + kendo.toString(new Date(edate), "dd-MM-yyyy");
			}else if(sdate){
				strDate = "ថ្ងៃទី " + kendo.toString(new Date(sdate),"dd-MM-yyyy");
			}else if(edate){
				strDate = "នៅត្រឹមថ្ងៃទី " + kendo.toString(new Date(edate),"dd-MM-yyyy");
			}else{
				strDate = "";
			}

			return strDate;
		},
		search 				: function(){
			var self = this, start = kendo.toString(this.get("sdate"), "yyyy-MM-dd"), end = kendo.toString(this.get("edate"), "yyyy-MM-dd"), para = [];

        	//Dates
        	if(start && end){        		
            	para.push({ field:"date", operation:">=", value: kendo.toString(start, "yyyy-MM-dd") });
            	para.push({ field:"date", operation:"<=", value: kendo.toString(end, "yyyy-MM-dd") });            	            	
            }else if(start){
            	para.push({ field:"date", operation:"=", value: kendo.toString(start, "yyyy-MM-dd") });
            }else if(end){
            	para.push({ field:"date", operation:"<=", value: kendo.toString(end, "yyyy-MM-dd") });
            }else{
            	
            }          

            this.dataSource.query({
            	filter: para,            	
            	page: 1,
            	take: 100
            });             
		}
	});
	banhji.wPaymentDetail = kendo.observable({
		dataSource 			: dataStore(baseUrl + "payments/wdetail"),

		sortList			: [ 
	 		{ text:"ទាំងអស់", value: "all" }, 
	 		{ text:"ថ្ងៃនេះ", value: "today" }, 
	 		{ text:"សប្ដាស៍នេះ", value: "week" }, 
	 		{ text:"ខែនេះ", value: "month" }, 
	 		{ text:"ឆ្នាំនេះ", value: "year" } 
		],
		sorter 				: "month",
		sdate 				: "",
		edate 				: "",		
				
		pageLoad 			: function(){
			
		},
		sorterChanges 		: function(){
			var value = this.get("sorter"),
			today = new Date();

			switch(value){
			case "today":								
				this.set("sdate", today);
				this.set("edate", "");
							  					
			  	break;
			case "week":			  	
				var first = today.getDate() - today.getDay(),
				last = first + 6;

				var firstDayOfWeek = new Date(today.setDate(first)),
				lastDayOfWeek = new Date(today.setDate(last));				

				this.set("sdate", firstDayOfWeek);
				this.set("edate", lastDayOfWeek);
				
			  	break;
			case "month":							  	
				var firstDayOfMonth = new Date(today.getFullYear(), today.getMonth(), 1),
				lastDayOfMonth = new Date(today.getFullYear(), today.getMonth() + 1, 0);

				this.set("sdate", firstDayOfMonth);
				this.set("edate", lastDayOfMonth);

			  	break;
			case "year":				
			  	var firstDayOfYear = new Date(today.getFullYear(), 0, 1),
			  	lastDayOfYear = new Date(today.getFullYear(), 11, 31);

				this.set("sdate", firstDayOfYear);
				this.set("edate", lastDayOfYear);

			  	break;
			default:
				this.set("sdate", "");
				this.set("edate", "");					  
			}
		},
		strDate 			: function(){
			var strDate = "",
			sdate = this.get("sdate"),
			edate = this.get("edate");

			if(sdate && edate){
				strDate = "ចាប់ពីថ្ងៃទី " + kendo.toString(new Date(sdate), "dd-MM-yyyy") + " ដល់ " + kendo.toString(new Date(edate), "dd-MM-yyyy");
			}else if(sdate){
				strDate = "ថ្ងៃទី " + kendo.toString(new Date(sdate),"dd-MM-yyyy");
			}else if(edate){
				strDate = "នៅត្រឹមថ្ងៃទី " + kendo.toString(new Date(edate),"dd-MM-yyyy");
			}else{
				strDate = "";
			}

			return strDate;
		},		
		search 				: function(){
			var self = this, start = kendo.toString(this.get("sdate"), "yyyy-MM-dd"), end = kendo.toString(this.get("edate"), "yyyy-MM-dd"), para = [];

        	//Dates
        	if(start && end){        		
            	para.push({ field:"payment_date >=", value: kendo.toString(start, "yyyy-MM-dd") });
            	para.push({ field:"payment_date <=", value: kendo.toString(end, "yyyy-MM-dd") });            	            	
            }else if(start){
            	para.push({ field:"payment_date", value: kendo.toString(start, "yyyy-MM-dd") });
            }else if(end){
            	para.push({ field:"payment_date <=", value: kendo.toString(end, "yyyy-MM-dd") });
            }else{
            	
            }

            para.push({ field:"type", operator:"where_in", value:["invoice", "receipt", "wdeposit"] });

            this.dataSource.query({
            	filter: para,
            	sort: { field: "payment_date", dir: "desc" },
            	page: 1,
            	take: 100
            });             
		}
	});
	banhji.wPaymentBySourceSummary = kendo.observable({
		dataSource 			: dataStore(baseUrl + "payments/wsource_summary"),
		
		sortList			: [ 
	 		{ text:"ទាំងអស់", 	value: "all" }, 
	 		{ text:"ថ្ងៃនេះ", 	value: "today" }, 
	 		{ text:"សប្ដាស៍នេះ",value: "week" }, 
	 		{ text:"ខែនេះ", 		value: "month" }, 
	 		{ text:"ឆ្នាំនេះ", 	value: "year" } 
		],
		sorter 				: "all",
		sdate 				: "",
		edate 				: "",

		pageLoad 			: function(){
			
		},
		sorterChanges 		: function(){
			var value = this.get("sorter"),
			today = new Date();

			switch(value){
			case "today":								
				this.set("sdate", today);
				this.set("edate", "");
							  					
			  	break;
			case "week":			  	
				var first = today.getDate() - today.getDay(),
				last = first + 6;

				var firstDayOfWeek = new Date(today.setDate(first)),
				lastDayOfWeek = new Date(today.setDate(last));				

				this.set("sdate", firstDayOfWeek);
				this.set("edate", lastDayOfWeek);
				
			  	break;
			case "month":							  	
				var firstDayOfMonth = new Date(today.getFullYear(), today.getMonth(), 1),
				lastDayOfMonth = new Date(today.getFullYear(), today.getMonth() + 1, 0);

				this.set("sdate", firstDayOfMonth);
				this.set("edate", lastDayOfMonth);

			  	break;
			case "year":				
			  	var firstDayOfYear = new Date(today.getFullYear(), 0, 1),
			  	lastDayOfYear = new Date(today.getFullYear(), 11, 31);

				this.set("sdate", firstDayOfYear);
				this.set("edate", lastDayOfYear);

			  	break;
			default:
				this.set("sdate", "");
				this.set("edate", "");					  
			}
		},		
		strDate 			: function(){
			var strDate = "",
			sdate = this.get("sdate"),
			edate = this.get("edate");

			if(sdate && edate){
				strDate = "ចាប់ពីថ្ងៃទី " + kendo.toString(new Date(sdate), "dd-MM-yyyy") + " ដល់ " + kendo.toString(new Date(edate), "dd-MM-yyyy");
			}else if(sdate){
				strDate = "ថ្ងៃទី " + kendo.toString(new Date(sdate),"dd-MM-yyyy");
			}else if(edate){
				strDate = "នៅត្រឹមថ្ងៃទី " + kendo.toString(new Date(edate),"dd-MM-yyyy");
			}else{
				strDate = "";
			}

			return strDate;
		},
		search 				: function(){
			var self = this,
			para = [], 
			start = kendo.toString(this.get("sdate"), "yyyy-MM-dd"), 
			end = kendo.toString(this.get("edate"), "yyyy-MM-dd");

        	//Dates
        	if(start && end){        		
            	para.push({ field:"payment_date", operator:"between", value1:"'"+start+"'", value2:"'"+end+"'" });            	          	            	
            }else if(start){
            	para.push({ field:"payment_date", value: start });
            }else if(end){
            	para.push({ field:"payment_date <=", value: end });
            }else{
            	
            }          

            this.dataSource.filter(para);
		}
	});
	banhji.wPaymentBySourceDetail = kendo.observable({
		dataSource 			: dataStore(baseUrl + "payments/wsource_detail"),
		branchDS 			: dataStore(baseUrl + "contacts/branch"),
		locationDS 			: dataStore(baseUrl + "locations"),

		sortList			: [ 
	 		{ text:"ទាំងអស់", 	value: "all" }, 
	 		{ text:"ថ្ងៃនេះ", 	value: "today" }, 
	 		{ text:"សប្ដាស៍នេះ",value: "week" }, 
	 		{ text:"ខែនេះ", 		value: "month" }, 
	 		{ text:"ឆ្នាំនេះ", 	value: "year" } 
		],
		sorter 				: "all",
		sdate 				: "",
		edate 				: "",

		branch_id 			: null,
		selectedLocations 	: [],
		isBranchSelected	: false,

		pageLoad 			: function(){
			
		},
		sorterChanges 		: function(){
			var value = this.get("sorter"),
			today = new Date();

			switch(value){
			case "today":								
				this.set("sdate", today);
				this.set("edate", "");
							  					
			  	break;
			case "week":			  	
				var first = today.getDate() - today.getDay(),
				last = first + 6;

				var firstDayOfWeek = new Date(today.setDate(first)),
				lastDayOfWeek = new Date(today.setDate(last));				

				this.set("sdate", firstDayOfWeek);
				this.set("edate", lastDayOfWeek);
				
			  	break;
			case "month":							  	
				var firstDayOfMonth = new Date(today.getFullYear(), today.getMonth(), 1),
				lastDayOfMonth = new Date(today.getFullYear(), today.getMonth() + 1, 0);

				this.set("sdate", firstDayOfMonth);
				this.set("edate", lastDayOfMonth);

			  	break;
			case "year":				
			  	var firstDayOfYear = new Date(today.getFullYear(), 0, 1),
			  	lastDayOfYear = new Date(today.getFullYear(), 11, 31);

				this.set("sdate", firstDayOfYear);
				this.set("edate", lastDayOfYear);

			  	break;
			default:
				this.set("sdate", "");
				this.set("edate", "");					  
			}
		},		
		strDate 			: function(){
			var strDate = "",
			sdate = this.get("sdate"),
			edate = this.get("edate");

			if(sdate && edate){
				strDate = "ចាប់ពីថ្ងៃទី " + kendo.toString(new Date(sdate), "dd-MM-yyyy") + " ដល់ " + kendo.toString(new Date(edate), "dd-MM-yyyy");
			}else if(sdate){
				strDate = "ថ្ងៃទី " + kendo.toString(new Date(sdate),"dd-MM-yyyy");
			}else if(edate){
				strDate = "នៅត្រឹមថ្ងៃទី " + kendo.toString(new Date(edate),"dd-MM-yyyy");
			}else{
				strDate = "";
			}

			return strDate;
		},
		branchChanges 		: function(){
			var branch_id = this.get("branch_id");

			if(branch_id){
				this.set("isBranchSelected", true);
				this.locationDS.filter({ field:"company_id", value: branch_id });
			}else{
				this.set("isBranchSelected", false);
				this.set("selectedLocations", []);
			}        	
        },
		search 				: function(){
			var self = this,
			para = [], 
			start = kendo.toString(this.get("sdate"), "yyyy-MM-dd"), 
			end = kendo.toString(this.get("edate"), "yyyy-MM-dd"),
			branch_id = this.get("branch_id"),
			selectedLocations = this.get("selectedLocations");

        	//Dates
        	if(start && end){        		
            	para.push({ field:"payment_date", operator:"between", value1:"'"+start+"'", value2:"'"+end+"'" });            	          	            	
            }else if(start){
            	para.push({ field:"payment_date", value: start });
            }else if(end){
            	para.push({ field:"payment_date <=", value: end });
            }else{
            	
            }

            if(selectedLocations.length>0){
				var ids = [];
				$.each(selectedLocations, function(index, value){
					ids.push(value);
				});
				
				para.push({ field:"wlocation_id", operator:"where_in", model:"contact", value:ids });
			}else if(branch_id){
				para.push({ field:"company_id", value:branch_id });
			}          

            this.dataSource.filter(para);
		}
	});	    	
	//END OF DAWINE  ---------------------------------------------------------------------------------


	<!-- //views and layout -->
	banhji.view = {
		layout 		: new kendo.Layout('#layout', {model: banhji.Layout}),
		blank		: new kendo.View('<div></div>'),
		menu 		: new kendo.Layout('#menu-tmpl', {model: banhji.Layout}),
		// loginV 		: new kendo.View("#login-tmpl", {model: auth}),
		index  		: new kendo.Layout("#index", {model: banhji.index}),
		myTmpl 		: new kendo.Layout('#my-tmpl'),
		userList 	: new kendo.View('#admin-userList-tmpl', {model: user}),
		newUser 	: new kendo.View('#userList-new-tmpl', {model: user}),
		editUser 	: new kendo.View('#userList-edit-tmpl', {model: user}),
		pwdUser 	: new kendo.View('#userList-password-tmpl', {model: user}),
		adTmpl 		: new kendo.Layout('#admin-tmpl'),
		structure 	: new kendo.View('#admin-structure-tmpl', {model: banhji.segment}),
		structureNew: new kendo.View('#admin-structure-new-tmpl', {model: banhji.segment}),
		structureSingle: new kendo.View('#admin-structure-single-tmpl', {model: banhji.segment}),
		vendors 	: new kendo.Layout("#vendors-tmpl", {model: banhji.vendors}),
		vendorNew 		: new kendo.Layout("#vendor-new-tmpl", {model: banhji.vendors}),
		vendorDash 	: new kendo.Layout("#vendor-dashboard-tmpl", {model: banhji.vendors}),
		vendor 		: new kendo.Layout("#vendor-tmpl", {model: banhji.vendors}),
		vendorBill 	: new kendo.View("#bill-list-container-tmpl", {model: banhji.bill}),
		vendorList 	: new kendo.View("#vendors-list-tmpl", {model: banhji.vendors}),
		vendorDetail: new kendo.View("#vendor-detail-tmpl", {model:banhji.vendors}),
		// vendorList 	: new kendo.View("#accounts-list-tmpl", {model: banhji.account}),
		payment 	: new kendo.View("#payment-tmpl", {model: banhji.payment}),
		poCenter 	: new kendo.View("#po-center-template", {model: banhji.po}),
		// billForm 	: new kendo.Layout("#vendors-bill-form-header-tmpl", {model: banhji.expense}),
		billExp 	: new kendo.View("#vendors-expense-form-header-tmpl", {model: banhji.expense}),
		billPur 	: new kendo.View("#vendors-purchase-form-header-tmpl", {model: banhji.purchase}),
		accountDash : new kendo.Layout("#accounting-dashboard-tmpl", {model: banhji.accounting}),
		mainView : new kendo.Layout("#admin-segment-items-tmpl", {model: banhji.segmentItem}),
		actionView : new kendo.View("#admin-segment-items-list-action-tmpl", {model: banhji.segmentItem}),
		listView : new kendo.View("#admin-segment-items-list-conatiner-tmpl", {model: banhji.segmentItem}),
		settings 	: new kendo.View("#companySettingsView", {model: banhji.company}),
		settingList : new kendo.View("#companySettingsListView", {model: banhji.company}),
		menu 		: new kendo.View('#menu-tmpl', {model: banhji.userManagement}),
		page 		: new kendo.View('#page'),
		pageAdmin	: new kendo.Layout('#page-admin'),
		loginView 	: new kendo.View('#login-template', {model: banhji.userManagement}),
		signupView 	: new kendo.View('#signup-template', {model: banhji.userManagement}),
		userListView: new kendo.View('#page-admin-userlist', {model:banhji.users}),
		addUserView : new kendo.View('#page-admin-userlist-add-template', {model: banhji.users}),
		editRoleView: new kendo.View('#page-admin-userlist-edit-role-template', {model: banhji.users}),
		passwordView: new kendo.View('#page-admin-userlist-password-template', {model: banhji.userManagement}),
				
		
		//DAWINE -----------------------------------------------------------------------------------------
		customerCenter: new kendo.Layout("#customerCenter", {model: banhji.customerCenter}),
		customerDashboard: new kendo.Layout("#customerDashboard", {model: banhji.customerCenter}),
		customer: new kendo.Layout("#customer", {model: banhji.customer}),		
		
		invoice: new kendo.Layout("#invoice", {model: banhji.invoice}),
		receipt: new kendo.Layout("#receipt", {model: banhji.receipt}),
		estimate: new kendo.Layout("#estimate", {model: banhji.estimate}),
		so: new kendo.Layout("#so", {model: banhji.so}),
		gdn: new kendo.Layout("#gdn", {model: banhji.gdn}),
		statement: new kendo.Layout("#statement", {model: banhji.statement}),
		customerReportCenter: new kendo.Layout("#customerReportCenter"),

		//Cashier
		cashier: new kendo.Layout("#cashier", {model: banhji.cashier}),
		reconcile: new kendo.Layout("#reconcile", {model: banhji.reconcile}),

		//Inventory		
		itemDashBoard: new kendo.Layout("#itemDashBoard", {model: banhji.itemDashBoard}),
		itemCenter: new kendo.Layout("#itemCenter", {model: banhji.itemCenter}),		
		item: new kendo.Layout("#item", {model: banhji.item}),
		priceList: new kendo.Layout("#priceList", {model: banhji.priceList}),
		itemCatalog: new kendo.Layout("#itemCatalog", {model: banhji.itemCatalog}),
		itemAssembly: new kendo.Layout("#itemAssembly", {model: banhji.itemAssembly}),
		itemRecord: new kendo.Layout("#itemRecord", {model: banhji.itemRecord}),
		itemAdjustment: new kendo.Layout("#itemAdjustment", {model: banhji.itemAdjustment}),
		itemSetting: new kendo.Layout("#itemSetting", {model: banhji.itemSetting}),
		itemReportCenter: new kendo.Layout("#itemReportCenter"),
		
		//Electricity
		eDashBoard: new kendo.Layout("#eDashBoard", {model: banhji.eDashBoard}),		
		eMeter: new kendo.Layout("#eMeter", {model: banhji.meter}),		
		eReading: new kendo.Layout("#eReading", {model: banhji.reading}),		
		eInvoice: new kendo.Layout("#eInvoice", {model: banhji.uInvoice}),		
		eInvoicePrint: new kendo.Layout("#eInvoicePrint", {model: banhji.invoicePrint}),		
		
		//Water
		wDashBoard: new kendo.Layout("#wDashBoard", {model: banhji.wDashBoard}),
		wCustomerCenter: new kendo.Layout("#wCustomerCenter", {model: banhji.wCustomerCenter}),
		wCustomerOrder: new kendo.Layout("#wCustomerOrder", {model: banhji.wCustomerOrder}),		
		wDeposit: new kendo.Layout("#wDeposit", {model: banhji.wDeposit}),
		wDepositWitdraw: new kendo.Layout("#wDepositWitdraw", {model: banhji.wDepositWitdraw}),
		wMeter: new kendo.Layout("#wMeter", {model: banhji.wMeter}),
		wReadingCenter: new kendo.Layout("#wReadingCenter", {model: banhji.wReadingCenter}),
		wEditReading: new kendo.Layout("#wEditReading", {model: banhji.wEditReading}),
		wReading: new kendo.Layout("#wReading", {model: banhji.wReading}),
		wIRReader: new kendo.Layout("#wIRReader", {model: banhji.wIRReader}),
		wReadingBook: new kendo.Layout("#wReadingBook"),
		wInvoice: new kendo.Layout("#wInvoice", {model: banhji.wInvoice}),
		wPrintCenter: new kendo.Layout("#wPrintCenter", {model: banhji.wPrintCenter}),
		wInvoicePrint: new kendo.Layout("#wInvoicePrint", {model: banhji.wInvoicePrint}),		
		wInstallment: new kendo.Layout("#wInstallment", {model: banhji.wInstallment}),
		wInventoryItem: new kendo.Layout("#wInventoryItem", {model: banhji.wInventoryItem}),
				
		wReportCenter: new kendo.Layout("#wReportCenter", {model: banhji.wReportCenter}),
		wCustomerList: new kendo.Layout("#wCustomerList"),
		wCustomerBalance: new kendo.Layout("#wCustomerBalance"),
		wCustomerDeposit: new kendo.Layout("#wCustomerDeposit"),
		wLowConsumption: new kendo.Layout("#wLowConsumption"),
		wDisconnectList: new kendo.Layout("#wDisconnectList"),
		wAgingSummary: new kendo.Layout("#wAgingSummary", {model: banhji.wAgingSummary}),
		wAgingDetail: new kendo.Layout("#wAgingDetail", {model: banhji.wAgingDetail}),
		wSaleSummary: new kendo.Layout("#wSaleSummary", {model: banhji.wSaleSummary}),
		wSaleDetail: new kendo.Layout("#wSaleDetail", {model: banhji.wSaleDetail}),
		wPaymentSummary: new kendo.Layout("#wPaymentSummary", {model: banhji.wPaymentSummary}),
		wPaymentDetail: new kendo.Layout("#wPaymentDetail", {model: banhji.wPaymentDetail}),
		wPaymentBySourceSummary: new kendo.Layout("#wPaymentBySourceSummary", {model: banhji.wPaymentBySourceSummary}),
		wPaymentBySourceDetail: new kendo.Layout("#wPaymentBySourceDetail", {model: banhji.wPaymentBySourceDetail}),
		wCustomerNoMeter: new kendo.Layout("#wCustomerNoMeter", {model: banhji.wCustomerNoMeter}),
		wBrandNewCustomer: new kendo.Layout("#wBrandNewCustomer", {model: banhji.wBrandNewCustomer}),
		wBranch: new kendo.Layout("#wBranch", {model: banhji.wBranch}),		
		wSettings: new kendo.Layout("#wSettings", {model: banhji.wSettings}),		

		customerMenu: new kendo.View("#customerMenu"),
		waterMenu: new kendo.View("#waterMenu"),
		inventoryMenu: new kendo.View("#inventoryMenu")				
		//END OF DAWINE  ---------------------------------------------------------------------------------		
	};
	<!-- //End of views and layout -->

	banhji.router = new kendo.Router({
		init: function() {
			// banhji.view.layout.render("#wrapperApplication");
			$('#current-section').html('|&nbsp;Company');
			$('#home-menu').addClass('active');
			banhji.view.layout.render("#wrapperApplication");
			if(banhji.userManagement.getLogin() === false) {
				window.location.assign("<?php echo base_url(); ?>home");
			}
		},
		routeMissing: function(e) {
			// banhji.view.layout.showIn("#layout-view", banhji.view.missing);
			console.log("no resource found.")
		}
	});

	banhji.router.route("/", function(){
		banhji.view.layout.showIn('#content', banhji.view.index);
	});	

	banhji.router.route("/login", function(){		
		banhji.view.layout.showIn('#content', banhji.view.loginV);		
	});
	banhji.router.route("logout", function(){		
		banhji.userManagement.logout();
	});

	//DAWINE -----------------------------------------------------------------------------------------	
	/*************************
	*   SME Section   *
	**************************/
	banhji.router.route("/customers", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			$("#menu").text("");
			$("#secondary-menu").text("");

			banhji.view.layout.showIn("#content", banhji.view.customerCenter);
			banhji.view.layout.showIn('#menu', banhji.view.menu);
			banhji.view.layout.showIn('#secondary-menu', banhji.view.customerMenu);
			$("#current-section").text(" | អតិថិជន");

			var vm = banhji.customerCenter;

			if(banhji.pageLoaded["customers"]==undefined){
				banhji.pageLoaded["customers"] = true;
				
				vm.sorterChanges();				
				vm.contactTypeDS.filter({ field:"parent_id", value:1 });
				
				vm.contactDS.query({
				  	filter:{ field:"parent_id", operator:"where_related", model:"contact_type", value:1 },
				  	page: 1,
				  	take: 50
				}).then(function(e) {
				    var view = vm.contactDS.data();
				    
				    if(view.length>0){
				    	vm.set("obj", view[0]);
				    	vm.loadGraph(view[0].id);
				    	vm.loadOutStandingInvoice(view[0].id);
				    	vm.loadTransaction(view[0].id);				    	
				    	vm.loadNote(view[0].id);
				    }
				});				               
			}				
		}
	});

	banhji.router.route("/customer(/:id)", function(id){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{			
			var vm = banhji.customer;
			vm.pageLoad(id);
			
			banhji.view.layout.showIn("#content", banhji.view.customer);			
			kendo.fx($("#slide-form")).slideIn("down").play();

			if(id){
				$("#title").text("ពត៌មានអតិថិជន");
			}else{
				$("#title").text("ចុះឈ្មោះអតិថិជនថ្មី");
			}						

			if(banhji.pageLoaded["customer"]==undefined){
				banhji.pageLoaded["customer"] = true;				

		        $("#ddlCustomerType").kendoDropDownList({
		            optionLabel: "(--- ជ្រើសរើស ---)",
		            valuePrimitive: true,
		            dataTextField: "name",
		            dataValueField: "id",
		            dataSource: {
		                transport: {
							read: {
								url: baseUrl + "contacts/type",
								headers: {
									"Entity": getDB()
								},
								type: "GET",
								dataType: "json"
							}
						},
						schema 	: {
							model: {
								id: 'id'
							},
							data: 'results',
							total: 'count'
						},
						serverFiltering: true,
						filter: { field:"parent_id", value: 1 }
					},
					change: function(e){
		            	var value = this.value(); 

	                	if(value=="6" || value=="7" || value=="8"){
	                		vm.set("isCompany", true);
	                	}else{
	                		vm.set("isCompany", false);
	                	}
		            }                
		        }).data("kendoDropDownList");

		        $("#ddlTaxItem").kendoDropDownList({
		            optionLabel: "(--- ជ្រើសរើស ---)",
		            valuePrimitive: true,
		            dataTextField: "name",
		            dataValueField: "id",
		            dataSource: {
		                transport: {
							read: {
								url: baseUrl + "items/item",
								headers: {
									"Entity": getDB()
								},
								type: "GET",
								dataType: "json"
							}
						},
						schema 	: {
							model: {
								id: 'id'
							},
							data: 'results',
							total: 'count'
						},
						serverFiltering: true,
						filter: { field:"item_type_id", value: 6 }
					},
					template: '#=sku# #=name#'             
		        }).data("kendoDropDownList");

		        $("#ddlAR").kendoDropDownList({
		            optionLabel: "(--- ជ្រើសរើស ---)",
		            valuePrimitive: true,
		            dataTextField: "name",
		            dataValueField: "id",
		            dataSource: {
		                transport: {
							read: {
								url: baseUrl + "accounts",
								headers: {
									"Entity": getDB()
								},
								type: "GET",
								dataType: "json"
							}
						},
						schema 	: {
							model: {
								id: 'id'
							},
							data: 'results',
							total: 'count'
						},
						serverFiltering: true,
						filter: { field:"account_type_id", value: 7 }
					},
					template: '#=code# #=name#'             
		        }).data("kendoDropDownList");

		        $("#ddlRA").kendoDropDownList({
		            optionLabel: "(--- ជ្រើសរើស ---)",
		            valuePrimitive: true,
		            dataTextField: "name",
		            dataValueField: "id",
		            dataSource: {
		                transport: {
							read: {
								url: baseUrl + "accounts",
								headers: {
									"Entity": getDB()
								},
								type: "GET",
								dataType: "json"
							}
						},
						schema 	: {
							model: {
								id: 'id'
							},
							data: 'results',
							total: 'count'
						},
						serverFiltering: true,
						filter: { field:"account_type_id", value: 20 }
					},
					template: '#=code# #=name#'             
		        }).data("kendoDropDownList");

		        $("#ddlDepositAccount").kendoDropDownList({
		            optionLabel: "(--- ជ្រើសរើស ---)",
		            valuePrimitive: true,
		            dataTextField: "name",
		            dataValueField: "id",
		            dataSource: {
		                transport: {
							read: {
								url: baseUrl + "accounts",
								headers: {
									"Entity": getDB()
								},
								type: "GET",
								dataType: "json"
							}
						},
						schema 	: {
							model: {
								id: 'id'
							},
							data: 'results',
							total: 'count'
						},
						serverFiltering: true,
						filter: { field:"account_type_id", value: 16 }
					},
					template: '#=code# #=name#'             
		        }).data("kendoDropDownList");

		        $("#ddlDiscountAccount").kendoDropDownList({
		            optionLabel: "(--- ជ្រើសរើស ---)",
		            valuePrimitive: true,
		            dataTextField: "name",
		            dataValueField: "id",
		            dataSource: {
		                transport: {
							read: {
								url: baseUrl + "accounts",
								headers: {
									"Entity": getDB()
								},
								type: "GET",
								dataType: "json"
							}
						},
						schema 	: {
							model: {
								id: 'id'
							},
							data: 'results',
							total: 'count'
						},
						serverFiltering: true,
						filter: { field:"account_type_id", value:21 }
					},
					template: '#=code# #=name#'             
		        }).data("kendoDropDownList");

		        var ddlEBranch = $("#ddlEBranch").kendoDropDownList({
		            optionLabel: "(--- ជ្រើសរើស ---)",
		            valuePrimitive: true,
		            dataTextField: "name",
		            dataValueField: "id",
		            dataSource: {
		                transport: {
							read: {
								url: baseUrl + "contacts/branch",
								headers: {
									"Entity": getDB()
								},
								type: "GET",
								dataType: "json"
							}
						},
						schema 	: {
							model: {
								id: 'id'
							},
							data: 'results',
							total: 'count'
						},
						serverFiltering: true,
						filter: { field:"utility_id", value: 1 }
					}          
		        }).data("kendoDropDownList");

		        var ddlELocation = $("#ddlELocation").kendoDropDownList({
		        	optionLabel: "(--- ជ្រើសរើស ---)",
                    autoBind: false,
                    valuePrimitive: true,
                    cascadeFrom: "ddlEBranch",                    
                    cascadeFromField: "company_id",
                    dataTextField: "name",
                    dataValueField: "id",
                    dataSource: {
		                transport: {
							read: {
								url: baseUrl + "locations",
								headers: {
									"Entity": getDB()
								},
								type: "GET",
								dataType: "json"
							}
						},
						schema 	: {
							model: {
								id: 'id'
							},
							data: 'results',
							total: 'count'
						},
						serverFiltering: true
					}
                }).data("kendoDropDownList");

		        var ddlWBranch = $("#ddlWBranch").kendoDropDownList({
		            optionLabel: "(--- ជ្រើសរើស ---)",
		            valuePrimitive: true,
		            dataTextField: "name",
		            dataValueField: "id",
		            dataSource: {
		                transport: {
							read: {
								url: baseUrl + "contacts/branch",
								headers: {
									"Entity": getDB()
								},
								type: "GET",
								dataType: "json"
							}
						},
						schema 	: {
							model: {
								id: 'id'
							},
							data: 'results',
							total: 'count'
						},
						serverFiltering: true,
						filter: { field:"utility_id", value: 2 }
					}          
		        }).data("kendoDropDownList");

		        var ddlWLocation = $("#ddlWLocation").kendoDropDownList({
		        	optionLabel: "(--- ជ្រើសរើស ---)",
                    autoBind: false,
                    valuePrimitive: true,
                    cascadeFrom: "ddlWBranch",                    
                    cascadeFromField: "company_id",
                    dataTextField: "name",
                    dataValueField: "id",
                    dataSource: {
		                transport: {
							read: {
								url: baseUrl + "locations",
								headers: {
									"Entity": getDB()
								},
								type: "GET",
								dataType: "json"
							}
						},
						schema 	: {
							model: {
								id: 'id'
							},
							data: 'results',
							total: 'count'
						},
						serverFiltering: true
					}
                }).data("kendoDropDownList");	

		        $("#ddlPhase").kendoDropDownList({
		            optionLabel: "(--- ជ្រើសរើស ---)",
		            valuePrimitive: true,
		            dataTextField: "name",
		            dataValueField: "id",
		            dataSource: {
		                transport: {
							read: {
								url: baseUrl + "electricity_units",
								headers: {
									"Entity": getDB()
								},
								type: "GET",
								dataType: "json"
							}
						},
						schema 	: {
							model: {
								id: 'id'
							},
							data: 'results',
							total: 'count'
						},
						serverFiltering: true,
						filter: { field:"type", value: "phase" }
					}          
		        }).data("kendoDropDownList");

		        $("#ddlVoltage").kendoDropDownList({
		            optionLabel: "(--- ជ្រើសរើស ---)",
		            valuePrimitive: true,
		            dataTextField: "name",
		            dataValueField: "id",
		            dataSource: {
		                transport: {
							read: {
								url: baseUrl + "electricity_units",
								headers: {
									"Entity": getDB()
								},
								type: "GET",
								dataType: "json"
							}
						},
						schema 	: {
							model: {
								id: 'id'
							},
							data: 'results',
							total: 'count'
						},
						serverFiltering: true,
						filter: { field:"type", value: "voltage" }
					}          
		        }).data("kendoDropDownList");

		        $("#ddlAmpere").kendoDropDownList({
		            optionLabel: "(--- ជ្រើសរើស ---)",
		            valuePrimitive: true,
		            dataTextField: "name",
		            dataValueField: "id",
		            dataSource: {
		                transport: {
							read: {
								url: baseUrl + "electricity_units",
								headers: {
									"Entity": getDB()
								},
								type: "GET",
								dataType: "json"
							}
						},
						schema 	: {
							model: {
								id: 'id'
							},
							data: 'results',
							total: 'count'
						},
						serverFiltering: true,
						filter: { field:"type", value: "ampere" }
					}          
		        }).data("kendoDropDownList");

		        var validator = $("#example").kendoValidator().data("kendoValidator");
				var notification = $("#notification").kendoNotification({				    
				    autoHideAfter: 5000,
				    width: 300,				    
				    height: 50
				}).data('kendoNotification');

		        $("#save").click(function(e){				
					e.preventDefault();

					vm.checkExistingNumber();
					vm.checkExistingENumber();
					vm.checkExistingWNumber();

					if(validator.validate() 
						&& (vm.get("isDuplicateNumber")==false) 
						&& (vm.get("isDuplicateENumber")==false) 
						&& (vm.get("isDuplicateWNumber")==false)){
		            	vm.save();

		            	notification.success("កត់ត្រាបានសំរេច");			  
			        }else{
			        	notification.error("សូមត្រួតពិនិត្រអោយបានត្រឹមត្រូវម្ដងទៀត");			           
			        }		            
				});	        	
			}			
		}				
	});
			
	banhji.router.route("/invoice(/:id)", function(id){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{						
			banhji.view.layout.showIn("#content", banhji.view.invoice);			
			kendo.fx($("#slide-form")).slideIn("down").play();

			var vm = banhji.invoice;
			
			if(banhji.pageLoaded["invoice"]==undefined){
				banhji.pageLoaded["invoice"] = true;				
								
				vm.setItem();						
				vm.vatDS.filter({ field:"item_type_id", value: 6 });            

				var validator = $("#example").kendoValidator().data("kendoValidator");
				var notification = $("#notification").kendoNotification({				    
				    autoHideAfter: 5000,
				    width: 300,				    
				    height: 50
				}).data('kendoNotification');
				
		        $("#save").click(function(e){				
					e.preventDefault();

					if(validator.validate()){
		            	vm.save();

		            	notification.success("កត់ត្រាបានសំរេច");			  
			        }else{
			        	notification.error("សូមត្រួតពិនិត្រអោយបានត្រឹមត្រូវម្ដងទៀត");			           
			        }		            
				});
			}

			vm.pageLoad(id);			
		}		
	});
	banhji.router.route("/receipt(/:id)", function(id){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{						
			banhji.view.layout.showIn("#content", banhji.view.receipt);			
			kendo.fx($("#slide-form")).slideIn("down").play();

			var vm = banhji.receipt;
			
			if(banhji.pageLoaded["receipt"]==undefined){
				banhji.pageLoaded["receipt"] = true;				
								
				vm.setItem();						
				vm.vatDS.filter({ field:"item_type_id", value: 6 });
				vm.cashAccountDS.filter({ field:"account_type_id", value: 6 });            

				var validator = $("#example").kendoValidator().data("kendoValidator");
				var notification = $("#notification").kendoNotification({				    
				    autoHideAfter: 5000,
				    width: 300,				    
				    height: 50
				}).data('kendoNotification');
				
		        $("#save").click(function(e){				
					e.preventDefault();

					if(validator.validate()){
		            	vm.save();

		            	notification.success("កត់ត្រាបានសំរេច");			  
			        }else{
			        	notification.error("សូមត្រួតពិនិត្រអោយបានត្រឹមត្រូវម្ដងទៀត");			           
			        }		            
				});
			}

			vm.pageLoad(id);			
		}		
	});
	banhji.router.route("/so(/:id)", function(id){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{						
			banhji.view.layout.showIn("#content", banhji.view.so);			
			kendo.fx($("#slide-form")).slideIn("down").play();

			var vm = banhji.so;
			
			if(banhji.pageLoaded["so"]==undefined){
				banhji.pageLoaded["so"] = true;				
								
				vm.setItem();						
				vm.vatDS.filter({ field:"item_type_id", value: 6 });				         

				var validator = $("#example").kendoValidator().data("kendoValidator");
				var notification = $("#notification").kendoNotification({				    
				    autoHideAfter: 5000,
				    width: 300,				    
				    height: 50
				}).data('kendoNotification');
				
		        $("#save").click(function(e){				
					e.preventDefault();

					if(validator.validate()){
		            	vm.save();

		            	notification.success("កត់ត្រាបានសំរេច");			  
			        }else{
			        	notification.error("សូមត្រួតពិនិត្រអោយបានត្រឹមត្រូវម្ដងទៀត");			           
			        }		            
				});
			}

			vm.pageLoad(id);			
		}	
	});
	banhji.router.route("/estimate(/:id)", function(id){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{						
			banhji.view.layout.showIn("#content", banhji.view.estimate);			
			kendo.fx($("#slide-form")).slideIn("down").play();

			var vm = banhji.estimate;
			
			if(banhji.pageLoaded["estimate"]==undefined){
				banhji.pageLoaded["estimate"] = true;				
								
				vm.setItem();						
				vm.vatDS.filter({ field:"item_type_id", value: 6 });            

				var validator = $("#example").kendoValidator().data("kendoValidator");
				var notification = $("#notification").kendoNotification({				    
				    autoHideAfter: 5000,
				    width: 300,				    
				    height: 50
				}).data('kendoNotification');
				
		        $("#save").click(function(e){				
					e.preventDefault();

					if(validator.validate()){
		            	vm.save();

		            	notification.success("កត់ត្រាបានសំរេច");			  
			        }else{
			        	notification.error("សូមត្រួតពិនិត្រអោយបានត្រឹមត្រូវម្ដងទៀត");			           
			        }		            
				});
			}

			vm.pageLoad(id);			
		}	
	});
	banhji.router.route("/gdn(/:id)", function(id){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{						
			banhji.view.layout.showIn("#content", banhji.view.gdn);			
			kendo.fx($("#slide-form")).slideIn("down").play();

			var vm = banhji.gdn;
			
			if(banhji.pageLoaded["gdn"]==undefined){
				banhji.pageLoaded["gdn"] = true;				
								
				vm.setItem();				         

				var validator = $("#example").kendoValidator().data("kendoValidator");
				var notification = $("#notification").kendoNotification({				    
				    autoHideAfter: 5000,
				    width: 300,				    
				    height: 50
				}).data('kendoNotification');
				
		        $("#save").click(function(e){				
					e.preventDefault();

					if(validator.validate()){
		            	vm.save();

		            	notification.success("កត់ត្រាបានសំរេច");			  
			        }else{
			        	notification.error("សូមត្រួតពិនិត្រអោយបានត្រឹមត្រូវម្ដងទៀត");			           
			        }		            
				});
			}

			vm.pageLoad(id);			
		}	
	});
	banhji.router.route("/statement(/:id)", function(id){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{			

			banhji.view.layout.showIn("#content", banhji.view.statement);					
			
			var vm = banhji.statement;

			if(banhji.pageLoaded["statement"]==undefined){
				banhji.pageLoaded["statement"] = true;

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
						strDate = "ចាប់ពីថ្ងៃទី " + kendo.toString(new Date(start.value()), "dd-MM-yyyy") + " ដល់ " + kendo.toString(new Date(end.value()), "dd-MM-yyyy");
					}else if(start.value()){
						strDate = "ថ្ងៃទី " + kendo.toString(new Date(start.value()),"dd-MM-yyyy");
					}else if(end.value()){
						strDate = "នៅត្រឹមថ្ងៃទី " + kendo.toString(new Date(end.value()),"dd-MM-yyyy");
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
								
				$("#gridAging").kendoGrid({
					autoBind: false,		            		            		           
		            dataSource: vm.agingDS,		           
		            resizable: true,
		            columns: [		                		                	                
		                { field: "amount", title:"បច្ចុប្បន្ន", template:'#=kendo.toString(current, locale=="km-KH"?"c0":"c", locale)#', attributes:{style:"text-align:right;"} },		                
		                { field: "oneMonth", title:"១-៣០ថ្ងៃ", template:'#=kendo.toString(oneMonth, locale=="km-KH"?"c0":"c", locale)#', attributes:{style:"text-align:right;"} },
		                { field: "twoMonth", title:"៣១-៦០ថ្ងៃ", template:'#=kendo.toString(twoMonth, locale=="km-KH"?"c0":"c", locale)#', attributes:{style:"text-align:right;"} },		                
		                { field: "threeMonth", title:"៦១-៩០ថ្ងៃ", template:'#=kendo.toString(threeMonth, locale=="km-KH"?"c0":"c", locale)#', attributes:{style:"text-align:right;"} },
		                { field: "overMonth", title:"លើសពី ៩០ថ្ងៃ", template:'#=kendo.toString(overMonth, locale=="km-KH"?"c0":"c", locale)#', attributes:{style:"text-align:right;"} },		                
		                { field: "amount", title:"សរុប", template:'#=kendo.toString(amount, locale=="km-KH"?"c0":"c", locale)#', attributes:{style:"text-align:right;"} }
		            ]
		        });

		        $("#grid").kendoGrid({
		            toolbar: ["excel"],
		            excel: {
		                fileName: "statement.xlsx"
		            },		            		           
		            dataSource: vm.dataSource,
		            autoBind:false,		            		           		                        
		            reorderable: true,
		            resizable: true,
		            rowTemplate: kendo.template($("#statement-row-template").html())
		            // columns: [		                
		            //     { field: "issued_date", title: "កាលបរិច្ឆេទ" },
		            //     { field: "description", title: "ពណ៌នា" },		                
		            //     { field: "amount", title:"ទឹកប្រាក់", template:'#=kendo.toString(amount, locale=="km-KH"?"c0":"c", locale)#', attributes:{style:"text-align:right;"} },		                
		            //     { field: "balance", title:"សមតុល្យ", attributes:{style:"text-align:right;"}, template:kendo.template($("#statement-balance-template").html()) },
		            // ]
		        });

		        $("#search").click(function(e){
		        	e.preventDefault();

		        	var para = [], 
					sdate = kendo.toString(start.value(), "yyyy-MM-dd"), 
					edate = kendo.toString(end.value(), "yyyy-MM-dd");
					
		        	//Dates
		        	if(start.value() && end.value()){        		
		            	para.push({ field:"issued_date >=", value: sdate });
		            	para.push({ field:"issued_date <=", value: edate });            	          	            	
		            }else if(start.value()){
		            	para.push({ field:"issued_date", value: sdate });
		            }else if(end.value()){
		            	para.push({ field:"issued_date <=", value: edate });
		            }else{
		            	
		            }

		            para.push({ field:"contact_id", value: vm.obj.id });          

		            vm.dataSource.filter(para);
		            vm.agingDS.filter(para);
		            vm.agingDS.bind("requestEnd", function(e){
		            	if(e.type=="read"){
		            		var response = e.response.results;
		            		vm.set("total", kendo.toString(response[0].amount), "c");
		            	}
		            });
		        });		       			
			}

			vm.pageLoad(id);
		}		
	});
	banhji.router.route("/customer_report_center", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			$("#menu").text("");
			$("#secondary-menu").text("");

			banhji.view.layout.showIn("#content", banhji.view.customerReportCenter);
			banhji.view.layout.showIn('#menu', banhji.view.menu);
			banhji.view.layout.showIn('#secondary-menu', banhji.view.customerMenu);

			//var vm = banhji.customerReportCenter;			
			
			if(banhji.pageLoaded["customer_report_center"]==undefined){
				banhji.pageLoaded["customer_report_center"] = true;				
											
			}			
		}		
	});


	/*************************
	*   Cashier Section   *
	**************************/
	banhji.router.route("/cashier(/:id)", function(id){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			banhji.view.layout.showIn("#content", banhji.view.cashier);				
			kendo.fx($("#slide-form")).slideIn("down").play();

			var vm = banhji.cashier;
			vm.pageLoad(id);
			
			if(banhji.pageLoaded["cashier"]==undefined){
				banhji.pageLoaded["cashier"] = true;
				
				$("#ddlContact").kendoComboBox({
					placeholder: "លេខកូដអតិថិជន...",
					valuePrimitive: true,
	                dataTextField: "fullname",
	                dataValueField: "id",
	                filter: "search",
	                autoBind: false,
	                minLength: 3,
	                height: 400,
	                dataSource: vm.contactDS,
	                change: function(e) {
					    var value = this.value(),					    
					    data = this.dataSource.get(value);

					    vm.set("customer", data);
					    vm.transactionDS.filter({ field:"contact_id", value: value });
					    vm.loadInvoice(value, data.fullname);					    				    	
					},
					template:'#=number# #=fullname#'
	            });	           

		        $("#ddlCashAccount").kendoDropDownList({
		            optionLabel: "(--- ជ្រើសរើស ---)",
		            valuePrimitive: true,
		            dataTextField: "name",
		            dataValueField: "id",
		            dataSource: {
		                transport: {
							read: {
								url: baseUrl + "accounts",
								headers: {
									"Entity": getDB()
								},
								type: "GET",
								dataType: "json"
							}
						},
						schema 	: {
							model: {
								id: 'id'
							},
							data: 'results',
							total: 'count'
						},
						serverFiltering: true,
						filter: { field:"account_type_id", value: 6 }
					},
					template: '#=code# #=name#'             
		        }).data("kendoDropDownList");

		        var validator = $("#example").kendoValidator().data("kendoValidator");
				var notification = $("#notification").kendoNotification({				    
				    autoHideAfter: 5000,
				    width: 300,				    
				    height: 50
				}).data('kendoNotification');

		        $("#save").click(function(e){				
					e.preventDefault();

					if(validator.validate()){
		            	vm.save();

		            	notification.success("កត់ត្រាបានសំរេច");			  
			        }else{
			        	notification.error("សូមត្រួតពិនិត្រអោយបានត្រឹមត្រូវម្ដងទៀត");			           
			        }		            
				});        		
			}
		}							
	});
	banhji.router.route("/reconcile(/:id)", function(id){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			banhji.view.layout.showIn("#content", banhji.view.reconcile);				
			kendo.fx($("#slide-form")).slideIn("down").play();

			var vm = banhji.reconcile;
			vm.pageLoad(id);
			
			if(banhji.pageLoaded["reconcile"]==undefined){
				banhji.pageLoaded["reconcile"] = true;

				$("#ddlCashAccount").kendoDropDownList({
		            optionLabel: "(--- ជ្រើសរើស ---)",
		            valuePrimitive: true,
		            dataTextField: "name",
		            dataValueField: "id",
		            dataSource: {
		                transport: {
							read: {
								url: baseUrl + "accounts",
								headers: {
									"Entity": getDB()
								},
								type: "GET",
								dataType: "json"
							}
						},
						schema 	: {
							model: {
								id: 'id'
							},
							data: 'results',
							total: 'count'
						},
						serverFiltering: true,
						filter: { field:"account_type_id", value: 6 }
					},
					template: '#=code# #=name#'             
		        }).data("kendoDropDownList");

				var validator = $("#example").kendoValidator().data("kendoValidator");
				var notification = $("#notification").kendoNotification({				    
				    autoHideAfter: 5000,
				    width: 300,				    
				    height: 50
				}).data('kendoNotification');
				
		        $("#save").click(function(e){				
					e.preventDefault();

					if(validator.validate() && vm.get("isExisting")==false && vm.get("obj").transfered_amount>0){
		            	vm.save();

		            	notification.success("កត់ត្រាបានសំរេច");			  
			        }else{
			        	notification.error("សូមត្រួតពិនិត្រអោយបានត្រឹមត្រូវម្ដងទៀត");			           
			        }		            
				});
			}
		}					
	});	
	
	
	/*************************
	*   Inventory Section   *
	**************************/
	banhji.router.route("/inventories", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			$("#current-section").text("");			
			$("#menu").text("");
			$("#secondary-menu").text("");			

			banhji.view.layout.showIn("#content", banhji.view.itemDashBoard);			
			banhji.view.layout.showIn('#menu', banhji.view.menu);
			banhji.view.layout.showIn('#secondary-menu', banhji.view.inventoryMenu);
			$("#current-section").text(" | សន្និធិ");
			
			var vm = banhji.itemDashBoard;

			if(banhji.pageLoaded["inventories"]==undefined){							
				banhji.pageLoaded["inventories"] = true;
				
				vm.loadTopWorstItemDS();
				vm.loadTopVendorItemDS();
				vm.loadTopSaleItemDS();
			}

			vm.pageLoad();
		}				
	});	
	banhji.router.route("/item_center", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			$("#menu").text("");
			$("#secondary-menu").text("");

			banhji.view.layout.showIn("#content", banhji.view.itemCenter);
			banhji.view.layout.showIn('#menu', banhji.view.menu);
			banhji.view.layout.showIn('#secondary-menu', banhji.view.inventoryMenu);
			$("#current-section").text(" | សន្និធិ");

			var vm = banhji.itemCenter;						
			
			if(banhji.pageLoaded["item_center"]==undefined){
				banhji.pageLoaded["item_center"] = true;

				vm.vendorDS.filter({ field:"parent_id", operator:"where_related", model:"contact_type", value: 2 });

				var categories = $("#categories").kendoDropDownList({
                    optionLabel: "(--- ជ្រើសរើស ---)",
                    dataTextField: "name",
                    dataValueField: "id",
                    dataSource: vm.categoryDS,
                    change: function(e) {
					    //var value = this.value();
					    vm.set("item_group_id", 0);
					}
                }).data("kendoDropDownList");

                var itemGroups = $("#itemGroups").kendoDropDownList({
                    autoBind: false,
                    cascadeFrom: "categories",
                    cascadeFromField: "category_id",
                    optionLabel: "(--- ជ្រើសរើស ---)",
                    dataTextField: "name",
                    dataValueField: "id",
                    dataSource: vm.itemGroupDS
                }).data("kendoDropDownList");
			}

			vm.pageLoad();				
		}
	});
	banhji.router.route("/item(/:id)", function(id){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			var vm = banhji.item;
			
			banhji.view.layout.showIn("#content", banhji.view.item);						
			
			if(banhji.pageLoaded["item"]==undefined){
				banhji.pageLoaded["item"] = true;				

				$("#ddlIncome").kendoDropDownList({
		            optionLabel: "(--- ជ្រើសរើស ---)",
		            valuePrimitive: true,
		            dataTextField: "name",
		            dataValueField: "id",		            
		            template: '#=code# #=name#',
		            dataSource: {
		                transport: {
							read: {
								url: baseUrl + "accounts",
								headers: {
									"Entity": getDB()
								},
								type: "GET",
								dataType: "json"
							}
						},
						schema 	: {
							model: {
								id: 'id'
							},
							data: 'results',
							total: 'count'
						},
						serverFiltering: true,
						filter: { field:"account_type_id", value: 20 }
					}
		        }).data("kendoDropDownList");

		        $("#ddlCogs").kendoDropDownList({
		            optionLabel: "(--- ជ្រើសរើស ---)",
		            valuePrimitive: true,
		            dataTextField: "name",
		            dataValueField: "id",
		            template: '#=code# #=name#',
		            dataSource: {
		                transport: {
							read: {
								url: baseUrl + "accounts",
								headers: {
									"Entity": getDB()
								},
								type: "GET",
								dataType: "json"
							}
						},
						schema 	: {
							model: {
								id: 'id'
							},
							data: 'results',
							total: 'count'
						},
						serverFiltering: true,
						filter: { field:"account_type_id", value: 21 }
					}		            
		        }).data("kendoDropDownList");

		        $("#ddlInventory").kendoDropDownList({
		            optionLabel: "(--- ជ្រើសរើស ---)",
		            valuePrimitive: true,
		            dataTextField: "name",
		            dataValueField: "id",
		            template: '#=code# #=name#',
		            dataSource: {
		                transport: {
							read: {
								url: baseUrl + "accounts",
								headers: {
									"Entity": getDB()
								},
								type: "GET",
								dataType: "json"
							}
						},
						schema 	: {
							model: {
								id: 'id'
							},
							data: 'results',
							total: 'count'
						},
						serverFiltering: true,
						filter: { field:"account_type_id", value: 8 }
					}
		        }).data("kendoDropDownList");

				var validator = $("#example").kendoValidator().data("kendoValidator");
				var notification = $("#notification").kendoNotification({				    
				    autoHideAfter: 5000,
				    width: 300,				    
				    height: 50
				}).data('kendoNotification');

		        $("#save").click(function(e){				
					e.preventDefault();

					if(validator.validate()){
		            	vm.save();

		            	notification.success("កត់ត្រាបានសំរេច");			  
			        }else{
			        	notification.error("សូមត្រួតពិនិត្រអោយបានត្រឹមត្រូវម្ដងទៀត");			           
			        }		            
				});
			}

			vm.pageLoad(id);	
		}
	});
	banhji.router.route("/price_list/:id", function(id){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{			
			var vm = banhji.priceList;
			
			banhji.view.layout.showIn("#content", banhji.view.priceList);

			vm.pageLoad(id);			
			
			if(banhji.pageLoaded["price_list"]==undefined){
				banhji.pageLoaded["price_list"] = true;

				
			}				
		}
	});
	banhji.router.route("/item_catalog(/:id)", function(id){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			var vm = banhji.itemCatalog;
			
			banhji.view.layout.showIn("#content", banhji.view.itemCatalog);						
			
			if(banhji.pageLoaded["item_catalog"]==undefined){
				banhji.pageLoaded["item_catalog"] = true;

				vm.itemDS.filter([
					{ field:"item_type_id", operator:"where_in", value: [1,4] }
				]);

				var validator = $("#example").kendoValidator().data("kendoValidator");
				var notification = $("#notification").kendoNotification({				    
				    autoHideAfter: 5000,
				    width: 300,				    
				    height: 50
				}).data('kendoNotification');

		        $("#save").click(function(e){				
					e.preventDefault();

					if(validator.validate()){
		            	vm.save();

		            	notification.success("កត់ត្រាបានសំរេច");			  
			        }else{
			        	notification.error("សូមត្រួតពិនិត្រអោយបានត្រឹមត្រូវម្ដងទៀត");			           
			        }		            
				});
			}

			vm.pageLoad(id);	
		}
	});
	banhji.router.route("/item_assembly(/:id)", function(id){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			var vm = banhji.itemAssembly;
			
			banhji.view.layout.showIn("#content", banhji.view.itemAssembly);						
			
			if(banhji.pageLoaded["item_assembly"]==undefined){
				banhji.pageLoaded["item_assembly"] = true;

				vm.itemDS.filter([
					{ field:"item_type_id", operator:"where_in", value: [1,4] },
					{ field:"category_id", operator:"where_not_in", value: [8,9] }
				]);

				var validator = $("#example").kendoValidator().data("kendoValidator");
				var notification = $("#notification").kendoNotification({				    
				    autoHideAfter: 5000,
				    width: 300,				    
				    height: 50
				}).data('kendoNotification');

		        $("#save").click(function(e){				
					e.preventDefault();

					if(validator.validate()){
		            	vm.save();

		            	notification.success("កត់ត្រាបានសំរេច");			  
			        }else{
			        	notification.error("សូមត្រួតពិនិត្រអោយបានត្រឹមត្រូវម្ដងទៀត");			           
			        }		            
				});
			}

			vm.pageLoad(id);	
		}
	});
	banhji.router.route("/item_record(/:id)", function(id){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{		
			var vm = banhji.itemRecord;
			banhji.view.layout.showIn("#content", banhji.view.itemRecord);
			
			if(banhji.pageLoaded["item_record"]==undefined){
				banhji.pageLoaded["item_record"] = true;

				vm.contactDS.filter({ field:"parent_id", operator:"where_related", model:"contact_type", value:2 });

				var validator = $("#example").kendoValidator().data("kendoValidator");
				var notification = $("#notification").kendoNotification({				    
				    autoHideAfter: 5000,
				    width: 300,				    
				    height: 50
				}).data('kendoNotification');

		        $("#save").click(function(e){				
					e.preventDefault();

					if(validator.validate()){
		            	vm.save();

		            	notification.success("កត់ត្រាបានសំរេច");			  
			        }else{
			        	notification.error("សូមត្រួតពិនិត្រអោយបានត្រឹមត្រូវម្ដងទៀត");			           
			        }		            
				});	            
			}

			vm.pageLoad(id);				
		}
	});
	banhji.router.route("/item_adjustment", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			$("#menu").text("");
			$("#secondary-menu").text("");

			banhji.view.layout.showIn("#content", banhji.view.itemAdjustment);
			banhji.view.layout.showIn('#menu', banhji.view.menu);
			banhji.view.layout.showIn('#secondary-menu', banhji.view.inventoryMenu);

			var vm = banhji.itemAdjustment;

			if(banhji.pageLoaded["item_adjustment"]==undefined){
				banhji.pageLoaded["item_adjustment"] = true;
								
				vm.itemDS.filter([
					{ field:"item_type_id", value: 1 },
					{ field:"category_id", operator:"where_not_in", value: [8,9] }
				]);       			
			}
		}		
	});
	banhji.router.route("/item_setting", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			$("#menu").text("");
			$("#secondary-menu").text("");

			banhji.view.layout.showIn("#content", banhji.view.itemSetting);
			banhji.view.layout.showIn('#menu', banhji.view.menu);
			banhji.view.layout.showIn('#secondary-menu', banhji.view.inventoryMenu);

			var vm = banhji.itemSetting;
			
			if(banhji.pageLoaded["item_setting"]==undefined){
				banhji.pageLoaded["item_setting"] = true;
				
				vm.subCategoryDS.filter({ field:"sub_of", value: 0 });
				vm.subItemGroupDS.filter({ field:"sub_of", value: 0 });
				vm.subBrandDS.filter({ field:"sub_of", value: 0 });
			}

			vm.pageLoad();			     		
		}
	});
	banhji.router.route("/item_report_center", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			$("#menu").text("");
			$("#secondary-menu").text("");

			banhji.view.layout.showIn("#content", banhji.view.itemReportCenter);
			banhji.view.layout.showIn('#menu', banhji.view.menu);
			banhji.view.layout.showIn('#secondary-menu', banhji.view.inventoryMenu);

			//var vm = banhji.itemReportCenter;			
			
			if(banhji.pageLoaded["item_report_center"]==undefined){
				banhji.pageLoaded["item_report_center"] = true;				
											
			}			
		}		
	});


	/*************************
	*   Electricity Section   *
	**************************/
	banhji.router.route("/electricity", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			var vm = banhji.eDashBoard;
			
			banhji.view.layout.showIn("#content", banhji.view.eDashBoard);
			$("#secondary-menu").html("<li><a href='\#/electricity' class='glyphicons home'><i></i></a></li> <li><a href='\#/customer'>អតិថិជនថ្មី</a></li> <li><a href='\#/meter/1'>កុងទ័រ</a></li> <li><a href='\#/reading/1'>អំនាន</a></li> <li><a href='\#/uInvoice/1'>វិក្កយបត្រ</a></li> <li><a href='\#/uInvoice_print/1'>បោះពុម្ពវិក្កយបត្រ</a></li> <li><a href='\#/cashier'>បេឡាករ</a></li> ");			
					
			vm.pageLoad();		

			if(banhji.pageLoaded["electricity"]==undefined){							
				banhji.pageLoaded["electricity"] = true;

				vm.sorterChanges();
				vm.search();

				var monthlyDS = new kendo.data.DataSource({
					transport: {
						read 	: {
							url: baseUrl + 'invoices/emonthly',
							type: "GET",
							headers: {
								"Entity": getDB(),
								"User": banhji.userManagement.getLogin() === null ? '':banhji.userManagement.getLogin().id
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
							}
						}
					},
					schema 	: {
						data: 'results',
						total: 'count'
					},
					group: {
						field: 'issued_date',
						aggregates: [
							{field: 'amount', aggregate: 'sum'}
						]
					},
					batch: true,
					serverFiltering: true,
					serverPaging: true,
					pageSize: 1000
				});				 
        		
        		monthlyDS.fetch(function(e){				
					$('#esale-graph').kendoChart({
						dataSource: {data: monthlyDS.data()},
						series: [
							{field: 'amount', categoryField: 'issued_date'}
						]
					});
				});				
			}
		}				
	});	
	banhji.router.route("/meter/:utility_id", function(utility_id){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{						
			var vm = banhji.meter;
			
			if(utility_id=="1"){
				banhji.view.layout.showIn("#content", banhji.view.eMeter);
			}else{
				banhji.view.layout.showIn("#content", banhji.view.wMeter);
			}					
			kendo.fx($("#slide-form")).slideIn("down").play();
			
			vm.pageLoad(utility_id);		

			if(banhji.pageLoaded["meter"+utility_id]==undefined){							
				banhji.pageLoaded["meter"+utility_id] = true;

				var location = $("#location").kendoDropDownList({
		            optionLabel: "(--- ជ្រើសរើស ---)",
		            autoBind: false,
		            valuePrimitive: true,
		            dataTextField: "name",
		            dataValueField: "id",			            
		            dataSource: vm.locationDS
		        }).data("kendoDropDownList");

				if(utility_id=="1"){
					$("#electricityBox").kendoDropDownList({
			        	optionLabel: "(--- ជ្រើសរើស ---)",
			        	autoBind: false,
			        	valuePrimitive: true,
			        	cascadeFrom: "location",
			        	cascadeFromField: "location_id",	            	            
			            dataTextField: "number",
			            dataValueField: "id",	            
			            dataSource: vm.electricityBoxDS
			        }).data("kendoDropDownList");
		        }								

				$("#customers").kendoComboBox({
					placeholder: "លេខកូដអតិថិជន...",
	                dataTextField: "fullIdName",
	                dataValueField: "id",
	                filter: "search",
	                autoBind: false,
	                minLength: 3,
	                height: 400,
	                dataSource: vm.contactDS,
	                change: function(e){
	                	var value = this.value();                		
	                	var data = this.dataSource.get(value);				
						
						vm.set("meter", null);
						vm.set("contact_id", data.id);
						vm.set("company_id", data.company_id);
						vm.loadMeter(value);
						vm.loadData(data.company_id);				
	                }
	            });

	            $("#meters").kendoComboBox({
					placeholder: "លេខកូដកុងទ័រ...",
	                dataTextField: "number",
	                dataValueField: "id",
	                filter: "startswith",
	                autoBind: false,
	                minLength: 3,
	                height: 400,
	                dataSource: vm.meterDS,
	                change: function(e){
	                	var value = this.value();                		
	                	var data = this.dataSource.get(value);				
						
						vm.set("meter", null);
						vm.set("contact_id", data.contact_id);
						vm.set("company_id", data.company_id);
						vm.loadMeter(data.contact_id);
						vm.loadData(data.company_id);				
	                }
	            });		        

		        var validator = $("#example").kendoValidator().data("kendoValidator"),
				status = $("#status");

		        $("#save").click(function(e){				
					e.preventDefault();

					if(validator.validate()){
		            	vm.save();     	

			            status.text("កត់ត្រាបានសំរេច")
				        	.removeClass("alert alert-error")
				        	.addClass("alert alert-success");
				        status.show();
				        setTimeout(function(){
							status.hide();
						},4000);
			        }else{		        	
			            status.text("សូមត្រួតពិនិត្រឪ្យបានត្រឹមត្រូវម្ដងទៀត")
			                .removeClass("alert alert-success")
				            .addClass("alert alert-error");
			        }		            
				});	        	
			}			
		}				
	});		
	banhji.router.route("/reading/:utility_id", function(utility_id){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{		
			var vm = banhji.reading;
			vm.pageLoad(utility_id);			

			if(utility_id=="1"){
				banhji.view.layout.showIn("#content", banhji.view.eReading);
			}else{
				banhji.view.layout.showIn("#content", banhji.view.wReading);
			}

			if(banhji.pageLoaded["reading"+utility_id]==undefined){
				banhji.pageLoaded["reading"+utility_id] = true;

				$("#pager").kendoPager({
	                dataSource: vm.dataSource
	            });

	            $("#meters").kendoComboBox({
					placeholder: "លេខកូដកុងទ័រ...",
					valuePrimitive: true,
	                dataTextField: "number",
	                dataValueField: "id",
	                filter: "startswith",
	                autoBind: false,
	                minLength: 3,
	                height: 400,
	                dataSource: vm.meterDS
	            });

	            var company = $("#company").kendoDropDownList({
		            optionLabel: "(--- អាជ្ញាបណ្ណ ---)",
		            valuePrimitive: true,
		            dataTextField: "name",
		            dataValueField: "id",
		            dataSource: vm.branchDS
		        }).data("kendoDropDownList");

	            if(utility_id=="1"){
			        var elocation = $("#elocation").kendoDropDownList({
			        	optionLabel: "(--- តំបន់ ---)",
		                autoBind: false,
		                cascadeFrom: "company",
		                cascadeFromField: "company_id",
		                valuePrimitive: true,                
		                dataTextField: "name",
		                dataValueField: "id",
		                dataSource: vm.elocationDS
		            }).data("kendoDropDownList");
		    	}else{
		            var wlocation = $("#wlocation").kendoDropDownList({
			        	optionLabel: "(--- តំបន់ ---)",
		                autoBind: false,
		                cascadeFrom: "company",
		                cascadeFromField: "company_id",
		                valuePrimitive: true,                
		                dataTextField: "name",
		                dataValueField: "id",
		                dataSource: vm.wlocationDS
		            }).data("kendoDropDownList");						
				}

				var validator = $("#example").kendoValidator({
					rules: {
				        greaterdate: function (input) {
		                    if (input.is("[data-greaterdate-msg]") && input.val() != "") {                                    
		                        var edate = kendo.parseDate(input.val()),
		                            sdate = kendo.parseDate($("[name='" + input.data("greaterdateField") + "']").val());
		                        return sdate == null || sdate.getTime() < edate.getTime();
		                    }
		                    return true;
		                }               
				    }
				}).data("kendoValidator"), status = $("#status");

				$("#save").click(function(e){
					e.preventDefault();
					
		            if(validator.validate() && vm.checkInput()){
		            	vm.save();

			            status.text("កត់ត្រាបានសំរេច")
				        	.removeClass("alert alert-error")
				        	.addClass("alert alert-success");
				        status.show();
				        setTimeout(function(){
							status.hide();
						},4000);
			        }else{
			        	status.show();		        	        	
			            status.text("សូមត្រួតពិនិត្រឪ្យបានត្រឹមត្រូវម្ដងទៀត")
			                .removeClass("alert alert-success")
				            .addClass("alert alert-error");
			        }
				});
			}
		}		
	});
	banhji.router.route("/uInvoice/:utility_id", function(utility_id){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{					
			var vm = banhji.uInvoice;

			if(utility_id=="1"){
				banhji.view.layout.showIn("#content", banhji.view.eInvoice);
			}else{
				banhji.view.layout.showIn("#content", banhji.view.wInvoice);
			}

			vm.pageLoad(utility_id);
			
			if(banhji.pageLoaded["uInvoice"+utility_id]==undefined){
				banhji.pageLoaded["uInvoice"+utility_id] = true;			

				$("#meters").kendoComboBox({
					placeholder: "លេខកូដកុងទ័រ...",
					valuePrimitive: true,
	                dataTextField: "number",
	                dataValueField: "id",
	                filter: "startswith",
	                autoBind: false,
	                minLength: 3,
	                height: 400,
	                dataSource: vm.meterDS
	            });

	            $("#pager").kendoPager({
	                dataSource: vm.readingDS
	            });

				var company = $("#company").kendoDropDownList({
		            optionLabel: "(--- អាជ្ញាបណ្ណ ---)",
		            valuePrimitive: true,
		            dataTextField: "name",
		            dataValueField: "id",
		            dataSource: vm.branchDS
		        }).data("kendoDropDownList");

				if(utility_id=="1"){
			        var elocation = $("#elocation").kendoDropDownList({
			        	optionLabel: "(--- តំបន់ ---)",
		                autoBind: false,
		                cascadeFrom: "company",
		                cascadeFromField: "company_id",
		                valuePrimitive: true,                
		                dataTextField: "name",
		                dataValueField: "id",
		                dataSource: vm.elocationDS
		            }).data("kendoDropDownList");
		    	}else{
		            var wlocation = $("#wlocation").kendoDropDownList({
			        	optionLabel: "(--- តំបន់ ---)",
		                autoBind: false,
		                cascadeFrom: "company",
		                cascadeFromField: "company_id",
		                valuePrimitive: true,                
		                dataTextField: "name",
		                dataValueField: "id",
		                dataSource: vm.wlocationDS
		            }).data("kendoDropDownList");						
				}
		        
				var validator = $("#example").kendoValidator().data("kendoValidator"),
					status = $("#status");						

				$("#save").click(function(e){
					e.preventDefault();			
					
		            if(validator.validate()){	            	            	
		            	vm.save();
						
			            status.text("កត់ត្រាបានសំរេច")
				        	.removeClass("alert alert-error")
				        	.addClass("alert alert-success");
				        status.show();
				        setTimeout(function(){
							status.hide();
						},4000);				        
			        }else{
			        	status.show();		        	
			            status.text("សូមត្រួតពិនិត្រឪ្យបានត្រឹមត្រូវម្ដងទៀត")
			                .removeClass("alert alert-success")
				            .addClass("alert alert-error");
			        }
				});
			}
		}		
	});
	banhji.router.route("/uInvoice_print/:utility_id(/:id)", function(utility_id, id){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{			
			var vm = banhji.invoicePrint;
			vm.pageLoad(utility_id, id);

			if(utility_id=="1"){
				banhji.view.layout.showIn("#content", banhji.view.eInvoicePrint);
			}else{				
				banhji.view.layout.showIn("#content", banhji.view.wInvoicePrint);
			}			
			
			if(banhji.pageLoaded["uInvoice_print"+utility_id]==undefined){
				banhji.pageLoaded["uInvoice_print"+utility_id] = true;

				$("#pager").kendoPager({
	                dataSource: vm.dataSource
	            });
				
				$("#invoices").kendoComboBox({
					placeholder: "លេខវិក្កយបត្រ...",
					valuePrimitive: true,
	                dataTextField: "number",
	                dataValueField: "id",
	                filter: "startswith",
	                autoBind: false,
	                minLength: 3,
	                height: 400,
	                dataSource: vm.invoiceDS,
	                change: function(e) {
					    var value = this.value();
					    vm.dataSource.query({
					    	filter: { field:"id", value: value }
					    }).then(function(e){
					    	vm.barcod();					    				    	
					    });
					}
	            });

				var company = $("#company").kendoDropDownList({
		            optionLabel: "(--- អាជ្ញាបណ្ណ ---)",
		            valuePrimitive: true,
		            dataTextField: "name",
		            dataValueField: "id",
		            dataSource: vm.branchDS
		        }).data("kendoDropDownList");

		        if(utility_id=="1"){
			        var elocation = $("#elocation").kendoDropDownList({
			        	optionLabel: "(--- តំបន់ ---)",
		                autoBind: false,
		                cascadeFrom: "company",
		                cascadeFromField: "company_id",
		                valuePrimitive: true,                
		                dataTextField: "name",
		                dataValueField: "id",
		                dataSource: vm.elocationDS
		            }).data("kendoDropDownList");
		    	}else{
		            var wlocation = $("#wlocation").kendoDropDownList({
			        	optionLabel: "(--- តំបន់ ---)",
		                autoBind: false,
		                cascadeFrom: "company",
		                cascadeFromField: "company_id",
		                valuePrimitive: true,                
		                dataTextField: "name",
		                dataValueField: "id",
		                dataSource: vm.wlocationDS
		            }).data("kendoDropDownList");						
				}			
			}
		}							
	});


	/*************************
	*   Water Section   *
	**************************/
	banhji.router.route("/water", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			$("#current-section").text("");
			$("#menu").text("");
			$("#secondary-menu").text("");

			banhji.view.layout.showIn("#content", banhji.view.wDashBoard);			
			banhji.view.layout.showIn('#menu', banhji.view.menu);
			banhji.view.layout.showIn('#secondary-menu', banhji.view.waterMenu);
			$("#current-section").text(" | ទឹកស្អាត");
			
			var vm = banhji.wDashBoard;

			if(banhji.pageLoaded["water"]==undefined){							
				banhji.pageLoaded["water"] = true;

				vm.sorterChanges();
				vm.search();

				var container = $("#employeeForm");
                kendo.init(container);
                container.kendoValidator({
                    rules: {
                        greaterdate: function (input) {
                            if (input.is("[data-greaterdate-msg]") && input.val() != "") {                                    
                                var date = kendo.parseDate(input.val()),
                                    otherDate = kendo.parseDate($("[name='" + input.data("greaterdateField") + "']").val());
                                return otherDate == null || otherDate.getTime() < date.getTime();
                            }

                            return true;
                        }
                    }
                });

                var validator = $("#employeeForm").data("kendoValidator");
                validator.validate();                       

				var monthlyDS = new kendo.data.DataSource({
					transport: {
						read 	: {
							url: baseUrl + 'invoices/wmonthly',
							type: "GET",
							headers: {
								"Entity": getDB(),
								"User": banhji.userManagement.getLogin() === null ? '':banhji.userManagement.getLogin().id
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
							}
						}
					},
					schema 	: {
						data: 'results',
						total: 'count'
					},
					group: {
						field: 'month',
						aggregates: [
							{field: 'amount', aggregate: 'sum'},
							{field: 'usage', aggregate: 'sum'}
						]
					},
					batch: true,
					serverFiltering: true,
					serverPaging: true,
					pageSize: 1000
				});				 
        		
        		monthlyDS.fetch(function(e){				
					$('#wsale-graph').kendoChart({
						dataSource: {data: monthlyDS.data()},												
						series: [
							{field: 'amount', categoryField:'month', type: 'line', axis: 'sale'},
							{field: 'usage', categoryField:'month', type: 'column', axis: 'usage'}
						],
						valueAxes: [
							{
			                    name: "sale",
			                    color: "#007eff",
			                    min: 0,
			                    majorUnit: 5000000,
			                    max: 50000000
			                }, 
			                {
			                    name: "usage",
			                    color: "#3399ff",
			                    min: 0,	
			                    majorUnit: 5000,		                   
			                    max: 50000
			                }
		                ],
		                categoryAxis: {
		                    //categories: ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12"],		                    
		                    axisCrossingValues: [0, 13],
		                    justified: true
		                },
		                tooltip: {
		                    visible: true,
		                    format: "{0}"
		                }

					});
				});		
			}

			vm.pageLoad();
		}				
	});
	banhji.router.route("/wCustomer_center", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			$("#menu").text("");
			$("#secondary-menu").text("");

			banhji.view.layout.showIn("#content", banhji.view.wCustomerCenter);
			banhji.view.layout.showIn('#menu', banhji.view.menu);
			banhji.view.layout.showIn('#secondary-menu', banhji.view.waterMenu);

			var vm = banhji.wCustomerCenter;

			if(banhji.pageLoaded["wCustomer_center"]==undefined){
				banhji.pageLoaded["wCustomer_center"] = true;
				
				vm.sorterChanges();			
				vm.branchDS.filter({ field:"utility_id", value:2 });
				vm.contactTypeDS.filter({ field:"parent_id", value:1 });
								
				vm.contactDS.query({
				  	filter:[
				  		{ field:"use_water", value:true },
				  		{ field:"parent_id", operator:"where_related", model:"contact_type", value:1 }
				  	],
				  	page: 1,
				  	take: 50
				}).then(function(e) {
				    var view = vm.contactDS.data();
				    
				    if(view.length>0){
				    	vm.set("obj", view[0]);
				    	vm.loadGraph(view[0].id);
				    	vm.loadOutStandingInvoice(view[0].id);
				    	vm.loadTransaction(view[0].id);
				    	vm.loadMeter(view[0].id);
				    	vm.loadNote(view[0].id);
				    }
				});							

				//Search
				var ddlBranch = $("#ddlBranch").kendoDropDownList({
                    optionLabel: "(--- រើស អាជ្ញាបណ្ណ ---)",
                    autoBind: "false",
                    valuePrimitive: "true",
                    dataTextField: "name",
                    dataValueField: "id",
                    dataSource: vm.branchDS,
                    change: function(e) {
					    vm.set("location_id", null);					    
					}
                }).data("kendoDropDownList");

                var ddlLocation = $("#ddlLocation").kendoDropDownList({
                	optionLabel: "(--- រើស តំបន់ ---)",
                    autoBind: false,
                    valuePrimitive: "true",
                    cascadeFrom: "ddlBranch",                    
                    cascadeFromField: "company_id",
                    dataTextField: "name",
                    dataValueField: "id",
                    dataSource: vm.locationDS
                }).data("kendoDropDownList");                
			}				
		}
	});
	banhji.router.route("/wCustomer_order", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			$("#menu").text("");
			$("#secondary-menu").text("");

			banhji.view.layout.showIn("#content", banhji.view.wCustomerOrder);
			banhji.view.layout.showIn('#menu', banhji.view.menu);
			banhji.view.layout.showIn('#secondary-menu', banhji.view.waterMenu);

			var vm = banhji.wCustomerOrder;

			if(banhji.pageLoaded["wCustomer_order"]==undefined){
				banhji.pageLoaded["wCustomer_order"] = true;
				
				var ddlBranch = $("#ddlBranch").kendoDropDownList({
                    optionLabel: "(--- រើស អាជ្ញាបណ្ណ ---)",
                    autoBind: "false",
                    valuePrimitive: "true",
                    dataTextField: "name",
                    dataValueField: "id",
                    dataSource: vm.branchDS,
                    change: function(e) {
					    vm.set("location_id", null);					    
					}
                }).data("kendoDropDownList");

                var ddlLocation = $("#ddlLocation").kendoDropDownList({
                	optionLabel: "(--- រើស តំបន់ ---)",
                    autoBind: false,
                    valuePrimitive: "true",
                    cascadeFrom: "ddlBranch",                    
                    cascadeFromField: "company_id",
                    dataTextField: "name",
                    dataValueField: "id",
                    dataSource: vm.locationDS
                }).data("kendoDropDownList");      
				
				var grid = $("#grid").kendoGrid({
				    dataSource: vm.dataSource,
				    autoBind: false,  
				    scrollable: false,    
				    columns: [				    	
				    	{ field:"wnumber", title:"លេខកូដ" },
				    	{ field:"fullname", title:"អតិថិជន" }
				    ]            
				}).data("kendoGrid");

				grid.table.kendoDraggable({
				    filter: "tbody > tr",
				    group: "gridGroup",
				    threshold: 100,
				    hint: function(e) {
				        return $('<div class="k-grid k-widget"><table><tbody><tr>' + e.html() + '</tr></tbody></table></div>');
				    }
				});

				grid.table.kendoDropTarget({
				    group: "gridGroup",
				    drop: function(e) {        
				        e.draggable.hint.hide();
				        var target = vm.dataSource.getByUid($(e.draggable.currentTarget).data("uid")),
				            dest = $(document.elementFromPoint(e.clientX, e.clientY));
				       
				        if (dest.is("th")) {
				            return;
				        }       
				        dest = vm.dataSource.getByUid(dest.parent().data("uid"));

				        //not on same item
				        if (target.get("id") !== dest.get("id")) {
				            //reorder the items
				            var tmp = target.get("worder");
				            target.set("worder", dest.get("worder"));
				            dest.set("worder", tmp);
				            
				            //vm.dataSource.sort({ field: "worder", dir: "asc" });
				        }                
				    }
				});
			}							
		}
	});
	banhji.router.route("/wInstallment(/:id)", function(id){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			$("#menu").text("");
			$("#secondary-menu").text("");

			banhji.view.layout.showIn("#content", banhji.view.wInstallment);
			banhji.view.layout.showIn('#menu', banhji.view.menu);
			banhji.view.layout.showIn('#secondary-menu', banhji.view.waterMenu);								
			kendo.fx($("#slide-form")).slideIn("down").play();

			var vm = banhji.wInstallment;

			if(banhji.pageLoaded["wInstallment"]==undefined){							
				banhji.pageLoaded["wInstallment"] = true;				

		        var validator = $("#example").kendoValidator().data("kendoValidator");
				var notification = $("#notification").kendoNotification({				    
				    autoHideAfter: 5000,
				    width: 300,				    
				    height: 50
				}).data('kendoNotification');

		        $("#save").click(function(e){				
					e.preventDefault();

					if(validator.validate()){
		            	vm.save();

		            	notification.success("កត់ត្រាបានសំរេច");			  
			        }else{
			        	notification.error("សូមត្រួតពិនិត្រអោយបានត្រឹមត្រូវម្ដងទៀត");			           
			        }		            
				});	        	
			}

			vm.pageLoad(id);
		}				
	});
	banhji.router.route("/wDeposit(/:id)", function(id){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{						
			banhji.view.layout.showIn("#content", banhji.view.wDeposit);			
			kendo.fx($("#slide-form")).slideIn("down").play();

			var vm = banhji.wDeposit;
			
			if(banhji.pageLoaded["wDeposit"]==undefined){
				banhji.pageLoaded["wDeposit"] = true;

				vm.setItem();
				
				$("#ddlPaymentMethod").kendoDropDownList({
		            optionLabel: "(--- ជ្រើសរើស ---)",
		            valuePrimitive: true,
		            dataTextField: "name",
		            dataValueField: "id",
		            dataSource: dataStore(baseUrl + "payment_methods")
		        }).data("kendoDropDownList");

		        $("#ddlCashAccount").kendoDropDownList({
		            optionLabel: "(--- ជ្រើសរើស ---)",
		            valuePrimitive: true,
		            dataTextField: "name",
		            dataValueField: "id",
		            dataSource: {
		                transport: {
							read: {
								url: baseUrl + "accounts",
								headers: {
									"Entity": getDB()
								},
								type: "GET",
								dataType: "json"
							}
						},
						schema 	: {
							model: {
								id: 'id'
							},
							data: 'results',
							total: 'count'
						},
						serverFiltering: true,
						filter: { field:"account_type_id", value: 6 }
					},
					template: '#=code# #=name#'             
		        }).data("kendoDropDownList");

		        $("#ddlDepositAccount").kendoDropDownList({
		            optionLabel: "(--- ជ្រើសរើស ---)",
		            valuePrimitive: true,
		            dataTextField: "name",
		            dataValueField: "id",
		            dataSource: {
		                transport: {
							read: {
								url: baseUrl + "accounts",
								headers: {
									"Entity": getDB()
								},
								type: "GET",
								dataType: "json"
							}
						},
						schema 	: {
							model: {
								id: 'id'
							},
							data: 'results',
							total: 'count'
						},
						serverFiltering: true,
						filter: { field:"account_type_id", operator:"where_in", value: [14,16] }
					},
					template: '#=code# #=name#'             
		        }).data("kendoDropDownList");							
				
				var validator = $("#example").kendoValidator().data("kendoValidator");
				var notification = $("#notification").kendoNotification({				    
				    autoHideAfter: 5000,
				    width: 300,				    
				    height: 50
				}).data('kendoNotification');
				
		        $("#save").click(function(e){				
					e.preventDefault();

					if(validator.validate()){
		            	vm.save();

		            	notification.success("កត់ត្រាបានសំរេច");			  
			        }else{
			        	notification.error("សូមត្រួតពិនិត្រអោយបានត្រឹមត្រូវម្ដងទៀត");			           
			        }		            
				});
			}

			vm.pageLoad(id);			
		}	
	});
	banhji.router.route("/wDeposit_witdraw(/:id)", function(id){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{						
			banhji.view.layout.showIn("#content", banhji.view.wDepositWitdraw);			
			kendo.fx($("#slide-form")).slideIn("down").play();

			var vm = banhji.wDepositWitdraw;
			
			if(banhji.pageLoaded["wDeposit_witdraw"]==undefined){
				banhji.pageLoaded["wDeposit_witdraw"] = true;				

				$("#ddlCashAccount").kendoDropDownList({
		            optionLabel: "(--- ជ្រើសរើស ---)",
		            valuePrimitive: true,
		            dataTextField: "name",
		            dataValueField: "id",
		            dataSource: {
		                transport: {
							read: {
								url: baseUrl + "accounts",
								headers: {
									"Entity": getDB()
								},
								type: "GET",
								dataType: "json"
							}
						},
						schema 	: {
							model: {
								id: 'id'
							},
							data: 'results',
							total: 'count'
						},
						serverFiltering: true,
						filter: { field:"account_type_id", value: 6 }
					},
					template: '#=code# #=name#'             
		        }).data("kendoDropDownList");

		        $("#ddlDepositAccount").kendoDropDownList({
		            optionLabel: "(--- ជ្រើសរើស ---)",
		            valuePrimitive: true,
		            dataTextField: "name",
		            dataValueField: "id",
		            dataSource: {
		                transport: {
							read: {
								url: baseUrl + "accounts",
								headers: {
									"Entity": getDB()
								},
								type: "GET",
								dataType: "json"
							}
						},
						schema 	: {
							model: {
								id: 'id'
							},
							data: 'results',
							total: 'count'
						},
						serverFiltering: true,
						filter: { field:"account_type_id", operator:"where_in", value: [14,16] }
					},
					template: '#=code# #=name#'             
		        }).data("kendoDropDownList");										
				
				var validator = $("#example").kendoValidator().data("kendoValidator");
				var notification = $("#notification").kendoNotification({				    
				    autoHideAfter: 5000,
				    width: 300,				    
				    height: 50
				}).data('kendoNotification');
				
		        $("#save").click(function(e){				
					e.preventDefault();

					if(validator.validate()){
		            	vm.save();

		            	notification.success("កត់ត្រាបានសំរេច");			  
			        }else{
			        	notification.error("សូមត្រួតពិនិត្រអោយបានត្រឹមត្រូវម្ដងទៀត");			           
			        }		            
				});
			}

			vm.pageLoad(id);			
		}	
	});
	banhji.router.route("/wMeter(/:id)", function(id){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			$("#menu").text("");
			$("#secondary-menu").text("");

			banhji.view.layout.showIn("#content", banhji.view.wMeter);
			banhji.view.layout.showIn('#menu', banhji.view.menu);
			banhji.view.layout.showIn('#secondary-menu', banhji.view.waterMenu);								
			kendo.fx($("#slide-form")).slideIn("down").play();

			var vm = banhji.wMeter;

			if(banhji.pageLoaded["wMeter"]==undefined){							
				banhji.pageLoaded["wMeter"] = true;

				vm.itemDS.filter({ field:"item_type_id", value: 1 });

		        var validator = $("#example").kendoValidator().data("kendoValidator");
				var notification = $("#notification").kendoNotification({				    
				    autoHideAfter: 5000,
				    width: 300,				    
				    height: 50
				}).data('kendoNotification');

		        $("#save").click(function(e){				
					e.preventDefault();

					if(validator.validate() && (vm.get("isDuplicateNumber")==false)){
		            	vm.save();

		            	notification.success("កត់ត្រាបានសំរេច");			  
			        }else{
			        	notification.error("សូមត្រួតពិនិត្រអោយបានត្រឹមត្រូវម្ដងទៀត");			           
			        }		            
				});	        	
			}

			vm.pageLoad(id);
		}				
	});
	banhji.router.route("/wReading_center(/:id)", function(id){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			$("#menu").text("");
			$("#secondary-menu").text("");

			banhji.view.layout.showIn("#content", banhji.view.wReadingCenter);
			banhji.view.layout.showIn('#menu', banhji.view.menu);
			banhji.view.layout.showIn('#secondary-menu', banhji.view.waterMenu);

			var vm = banhji.wReadingCenter;
			
			if(banhji.pageLoaded["wReading_center"]==undefined){
				banhji.pageLoaded["wReading_center"] = true;

				vm.meterDS.filter({ field:"utility_id", value: 2 });				
			}

			vm.pageLoad(id);
		}		
	});
	banhji.router.route("/wEdit_reading/:id", function(id){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			$("#menu").text("");
			$("#secondary-menu").text("");

			banhji.view.layout.showIn("#content", banhji.view.wEditReading);
			banhji.view.layout.showIn('#menu', banhji.view.menu);
			banhji.view.layout.showIn('#secondary-menu', banhji.view.waterMenu);

			var vm = banhji.wEditReading;
			
			if(banhji.pageLoaded["wEdit_reading"]==undefined){
				banhji.pageLoaded["wEdit_reading"] = true;	            
				
				var validator = $("#example").kendoValidator().data("kendoValidator");
				var notification = $("#notification").kendoNotification({				    
				    autoHideAfter: 5000,
				    width: 300,				    
				    height: 50
				}).data('kendoNotification');

		        $("#save").click(function(e){				
					e.preventDefault();

					if(validator.validate()){
		            	vm.save();

		            	notification.success("កត់ត្រាបានសំរេច");			  
			        }else{
			        	notification.error("សូមត្រួតពិនិត្រអោយបានត្រឹមត្រូវម្ដងទៀត");			           
			        }		            
				});
			}

			vm.pageLoad(id);
		}		
	});
	banhji.router.route("/wReading", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			$("#menu").text("");
			$("#secondary-menu").text("");

			banhji.view.layout.showIn("#content", banhji.view.wReading);
			banhji.view.layout.showIn('#menu', banhji.view.menu);
			banhji.view.layout.showIn('#secondary-menu', banhji.view.waterMenu);

			var vm = banhji.wReading;
			
			if(banhji.pageLoaded["wReading"]==undefined){
				banhji.pageLoaded["wReading"] = true;

				vm.branchDS.filter({ field:"utility_id", value:2 });
				vm.meterDS.filter({ field:"utility_id", value:2 });
				vm.readerDS.filter({ field:"contact_type_id", value:3 });				

	            var ddlBranch = $("#ddlBranch").kendoDropDownList({
                    optionLabel: "(--- រើស អាជ្ញាបណ្ណ ---)",
                    autoBind: "false",
                    valuePrimitive: "true",
                    dataTextField: "name",
                    dataValueField: "id",
                    dataSource: vm.branchDS,
                    change: function(e) {
					    vm.set("location_id", null);					    
					}
                }).data("kendoDropDownList");

                var ddlLocation = $("#ddlLocation").kendoDropDownList({
                	optionLabel: "(--- រើស តំបន់ ---)",
                    autoBind: false,
                    valuePrimitive: "true",
                    cascadeFrom: "ddlBranch",                    
                    cascadeFromField: "company_id",
                    dataTextField: "name",
                    dataValueField: "id",
                    dataSource: vm.locationDS
                }).data("kendoDropDownList");				

				var validator = $("#example").kendoValidator().data("kendoValidator");
				var notification = $("#notification").kendoNotification({				    
				    autoHideAfter: 5000,
				    width: 300,				    
				    height: 50
				}).data('kendoNotification');

		        $("#save").click(function(e){				
					e.preventDefault();

					if(validator.validate()){
		            	vm.save();

		            	notification.success("កត់ត្រាបានសំរេច");			  
			        }else{
			        	notification.error("សូមត្រួតពិនិត្រអោយបានត្រឹមត្រូវម្ដងទៀត");			           
			        }		            
				});
			}
			vm.pageLoad();
		}		
	});
	banhji.router.route("/wIR_reader", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			$("#menu").text("");
			$("#secondary-menu").text("");

			banhji.view.layout.showIn("#content", banhji.view.wIRReader);
			banhji.view.layout.showIn('#menu', banhji.view.menu);
			banhji.view.layout.showIn('#secondary-menu', banhji.view.waterMenu);

			var vm = banhji.wIRReader;
			
			if(banhji.pageLoaded["wIR_reader"]==undefined){
				banhji.pageLoaded["wIR_reader"] = true;

				vm.readerDS.filter({ field:"contact_type_id", value:3 });

				var validator = $("#example").kendoValidator().data("kendoValidator");
				var notification = $("#notification").kendoNotification({				    
				    autoHideAfter: 5000,
				    width: 300,				    
				    height: 50
				}).data('kendoNotification');

		        $("#save").click(function(e){				
					e.preventDefault();

					if(validator.validate()){
		            	vm.save();

		            	notification.success("កត់ត្រាបានសំរេច");			  
			        }else{
			        	notification.error("សូមត្រួតពិនិត្រអោយបានត្រឹមត្រូវម្ដងទៀត");			           
			        }		            
				});
			}

			vm.pageLoad();
		}		
	});
	banhji.router.route("/wReading_book", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			$("#menu").text("");
			$("#secondary-menu").text("");

			banhji.view.layout.showIn("#content", banhji.view.wReadingBook);
			banhji.view.layout.showIn('#menu', banhji.view.menu);
			banhji.view.layout.showIn('#secondary-menu', banhji.view.waterMenu);			
			
			if(banhji.pageLoaded["wReading_book"]==undefined){
				banhji.pageLoaded["wReading_book"] = true;

				var dataSource = dataStore(baseUrl + "meters/wbook");

				var ddlBranch = $("#ddlBranch").kendoDropDownList({
                    optionLabel: "(--- រើស អាជ្ញាបណ្ណ ---)",
                    autoBind: "false",
                    valuePrimitive: "true",
                    dataTextField: "name",
                    dataValueField: "id",
                    dataSource: dataStore(baseUrl + "contacts/branch")
                }).data("kendoDropDownList");

                var ddlLocation = $("#ddlLocation").kendoDropDownList({
                	optionLabel: "(--- រើស តំបន់ ---)",
                    autoBind: false,
                    valuePrimitive: "true",
                    cascadeFrom: "ddlBranch",                    
                    cascadeFromField: "company_id",
                    dataTextField: "name",
                    dataValueField: "id",
                    dataSource: dataStore(baseUrl + "locations")
                }).data("kendoDropDownList");
				
				$("#grid").kendoGrid({
		            toolbar: ["excel"],
		            excel: {
		                fileName: "readingbook.xlsx"
		            },		            		           
		            dataSource: dataSource,		           		                        
		            reorderable: true,
		            resizable: true,
		            columns: [
		                { field: "contact_number", title: "លេខកូដ" },
		                { field: "fullname", title: "អតិថិជន" },
		                { field: "location_name", title: "តំបន់" },
		                { field: "month_of", title: "ប្រចាំខែ" },
		                { field: "number", title: "កុងទ័រ" },		                
		                { field: "reading", title: "អំនាន" }
		            ]
		        });		       

				$("#search").click(function(){
					var para = [];
				
					if(ddlLocation.value()){
						para.push({ field:"location_id", value:ddlLocation.value() });
					}else if(ddlBranch.value()){
						para.push({ field:"company_id", value:ddlBranch.value() });
					}
					
					dataSource.filter(para);
				});
			}			
		}		
	});
	banhji.router.route("/wInvoice", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			$("#menu").text("");
			$("#secondary-menu").text("");

			banhji.view.layout.showIn("#content", banhji.view.wInvoice);
			banhji.view.layout.showIn('#menu', banhji.view.menu);
			banhji.view.layout.showIn('#secondary-menu', banhji.view.waterMenu);

			var vm = banhji.wInvoice;

			if(banhji.pageLoaded["wInvoice"]==undefined){
				banhji.pageLoaded["wInvoice"] = true;			

				vm.pageLoad();
				vm.branchDS.filter({ field:"utility_id", value:2 });
				vm.meterDS.filter({ field:"utility_id", value:2 });				

	            var ddlBranch = $("#ddlBranch").kendoDropDownList({
                    optionLabel: "(--- រើស អាជ្ញាបណ្ណ ---)",
                    autoBind: "false",
                    valuePrimitive: "true",
                    dataTextField: "name",
                    dataValueField: "id",
                    dataSource: vm.branchDS,
                    change: function(e) {
					    vm.set("location_id", null);					    
					}
                }).data("kendoDropDownList");

                var ddlLocation = $("#ddlLocation").kendoDropDownList({
                	optionLabel: "(--- រើស តំបន់ ---)",
                    autoBind: false,
                    valuePrimitive: "true",
                    cascadeFrom: "ddlBranch",                    
                    cascadeFromField: "company_id",
                    dataTextField: "name",
                    dataValueField: "id",
                    dataSource: vm.locationDS
                }).data("kendoDropDownList");				

				var validator = $("#example").kendoValidator().data("kendoValidator");
				var notification = $("#notification").kendoNotification({				    
				    autoHideAfter: 5000,
				    width: 300,				    
				    height: 50
				}).data('kendoNotification');

		        $("#save").click(function(e){				
					e.preventDefault();

					if(validator.validate()){
		            	vm.save();

		            	notification.success("កត់ត្រាបានសំរេច");			  
			        }else{
			        	notification.error("សូមត្រួតពិនិត្រអោយបានត្រឹមត្រូវម្ដងទៀត");			           
			        }		            
				});
			}
		}		
	});
	banhji.router.route("/wPrint_center(/:id)", function(id){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			$("#menu").text("");
			$("#secondary-menu").text("");

			banhji.view.layout.showIn("#content", banhji.view.wPrintCenter);
			banhji.view.layout.showIn('#menu', banhji.view.menu);
			banhji.view.layout.showIn('#secondary-menu', banhji.view.waterMenu);

			var vm = banhji.wPrintCenter;
			
			if(banhji.pageLoaded["wPrint_center"]==undefined){
				banhji.pageLoaded["wPrint_center"] = true;				
				
				vm.branchDS.filter({ field:"utility_id", value:2 });				
			}

			vm.pageLoad(id);
		}							
	});
	banhji.router.route("/wInvoice_print(/:id)", function(id){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			$("#menu").text("");
			$("#secondary-menu").text("");

			banhji.view.layout.showIn("#content", banhji.view.wInvoicePrint);
			banhji.view.layout.showIn('#menu', banhji.view.menu);
			banhji.view.layout.showIn('#secondary-menu', banhji.view.waterMenu);

			var vm = banhji.wInvoicePrint;
			
			if(banhji.pageLoaded["wInvoice_print"]==undefined){
				banhji.pageLoaded["wInvoice_print"] = true;							

			}

			vm.pageLoad(id);
		}							
	});
	banhji.router.route("/wInventory_item", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			$("#menu").text("");
			$("#secondary-menu").text("");

			banhji.view.layout.showIn("#content", banhji.view.wInventoryItem);
			banhji.view.layout.showIn('#menu', banhji.view.menu);
			banhji.view.layout.showIn('#secondary-menu', banhji.view.waterMenu);
					
			var vm = banhji.wInventoryItem;			
			
			if(banhji.pageLoaded["wInventory_item"]==undefined){
				banhji.pageLoaded["wInventory_item"] = true;
				
				vm.dataSource.filter({ field:"item_type_id", value:1 });

				var categories = $("#categories").kendoDropDownList({
                    optionLabel: "(--- ជ្រើសរើស ---)",
                    dataTextField: "name",
                    dataValueField: "id",
                    dataSource: vm.categoryDS,
                    change: function(e) {
					    //var value = this.value();
					    vm.set("item_group_id", 0);
					}
                }).data("kendoDropDownList");

                var itemGroups = $("#itemGroups").kendoDropDownList({
                    autoBind: false,
                    cascadeFrom: "categories",
                    cascadeFromField: "category_id",
                    optionLabel: "(--- ជ្រើសរើស ---)",
                    dataTextField: "name",
                    dataValueField: "id",
                    dataSource: vm.itemGroupDS
                }).data("kendoDropDownList");											
			}

			vm.pageLoad();				
		}
	});	
	banhji.router.route("/wSettings", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			$("#menu").text("");
			$("#secondary-menu").text("");

			banhji.view.layout.showIn("#content", banhji.view.wSettings);
			banhji.view.layout.showIn('#menu', banhji.view.menu);
			banhji.view.layout.showIn('#secondary-menu', banhji.view.waterMenu);

			var vm = banhji.wSettings;
			
			if(banhji.pageLoaded["wSettings"]==undefined){
				banhji.pageLoaded["wSettings"] = true;

				vm.branchDS.filter({ field:"utility_id", value: 2 });
			}

			vm.pageLoad();			     		
		}
	});
	banhji.router.route("/wBranch(/:id)", function(id){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			$("#menu").text("");
			$("#secondary-menu").text("");

			banhji.view.layout.showIn("#content", banhji.view.wBranch);
			banhji.view.layout.showIn('#menu', banhji.view.menu);
			banhji.view.layout.showIn('#secondary-menu', banhji.view.waterMenu);
			kendo.fx($("#slide-form")).slideIn("down").play();

			var vm = banhji.wBranch;
			
			if(banhji.pageLoaded["wBranch"]==undefined){
				banhji.pageLoaded["wBranch"] = true;

				var validator = $("#example").kendoValidator().data("kendoValidator");
				var notification = $("#notification").kendoNotification({				    
				    autoHideAfter: 5000,
				    width: 300,				    
				    height: 50
				}).data('kendoNotification');

		        $("#save").click(function(e){				
					e.preventDefault();

					if(validator.validate() && vm.get("isExisting")==false){
		            	vm.save();

		            	notification.success("កត់ត្រាបានសំរេច");			  
			        }else{
			        	notification.error("សូមត្រួតពិនិត្រអោយបានត្រឹមត្រូវម្ដងទៀត");			           
			        }		            
				});
			}

			vm.pageLoad(id);			     		
		}
	});


	//Water Reports
	banhji.router.route("/wReport_center", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			$("#menu").text("");
			$("#secondary-menu").text("");

			banhji.view.layout.showIn("#content", banhji.view.wReportCenter);
			banhji.view.layout.showIn('#menu', banhji.view.menu);
			banhji.view.layout.showIn('#secondary-menu', banhji.view.waterMenu);

			var vm = banhji.wReportCenter;			
			
			if(banhji.pageLoaded["wReport_center"]==undefined){
				banhji.pageLoaded["wReport_center"] = true;				

				vm.branchDS.query({
					filter: { field:"utility_id", value: 2 },
					page: 1,
					take: 100
				}).then(function(){
					var view = vm.branchDS.view();

					if(view.length>0){
						vm.set("branch_id", view[0].id);						
						vm.loadKPI(view[0].id);
					}
				});									
			}			
		}		
	});
	banhji.router.route("/wCustomer_list", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			$("#menu").text("");
			$("#secondary-menu").text("");

			banhji.view.layout.showIn("#content", banhji.view.wCustomerList);
			banhji.view.layout.showIn('#menu', banhji.view.menu);
			banhji.view.layout.showIn('#secondary-menu', banhji.view.waterMenu);
			kendo.fx($("#slide-form")).slideIn("down").play();			
			
			if(banhji.pageLoaded["wCustomer_list"]==undefined){
				banhji.pageLoaded["wCustomer_list"] = true;

				var dataSource = dataStore(baseUrl + "contacts/wlist"),
				branchDS =  dataStore(baseUrl + "contacts/branch"),
				locationDS =  dataStore(baseUrl + "locations");

				branchDS.filter({ field:"utility_id", value:2 });

				$("#grid").kendoGrid({
				    dataSource: dataSource,
				    groupable: true,
				    sortable: true,				    				    
				    pageable: true,				    
				    columns:[
				    	{ field: "wnumber", title:"លេខកូដ" },
				    	{ field: "fullname", title:"ឈ្មោះ" },
				    	{ field: "contact_type_name", title:"ប្រភេទ" },
				    	{ field: "wlocation_name", title:"តំបន់" },
				    	{ field: "wbranch_name", title:"អាជ្ញាបណ្ណ" }
				    ]				    
				});

				var ddlBranch = $("#ddlBranch").kendoDropDownList({
                    optionLabel: "(--- រើស អាជ្ញាបណ្ណ ---)",
                    autoBind: "false",
                    valuePrimitive: true,
                    dataTextField: "name",
                    dataValueField: "id",
                    dataSource: branchDS
                }).data("kendoDropDownList");

                var ddlLocation = $("#ddlLocation").kendoDropDownList({
                	optionLabel: "(--- រើស តំបន់ ---)",
                    autoBind: false,
                    valuePrimitive: true,
                    cascadeFrom: "ddlBranch",                    
                    cascadeFromField: "company_id",
                    dataTextField: "name",
                    dataValueField: "id",
                    dataSource: locationDS
                }).data("kendoDropDownList");

				$("#search").click(function(){
					if(ddlLocation.value()){
						dataSource.filter({ field:"wlocation_id", value:ddlLocation.value() });
					}else if(ddlBranch.value()){
						dataSource.filter({ field:"wbranch_id", value:ddlBranch.value() });
					}else{
						dataSource.filter([]);
					}
				});
		    }      
		}	
	});
	banhji.router.route("/wCustomer_no_meter", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			$("#menu").text("");
			$("#secondary-menu").text("");

			banhji.view.layout.showIn("#content", banhji.view.wCustomerNoMeter);
			banhji.view.layout.showIn('#menu', banhji.view.menu);
			banhji.view.layout.showIn('#secondary-menu', banhji.view.waterMenu);
			kendo.fx($("#slide-form")).slideIn("down").play();

			var vm = banhji.wCustomerNoMeter;			
			
			if(banhji.pageLoaded["wCustomer_no_meter"]==undefined){
				banhji.pageLoaded["wCustomer_no_meter"] = true;		
				
				vm.branchDS.filter({ field:"utility_id", value:2 });				 
			}
		}
	});
	banhji.router.route("/wBrand_new_customer", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			$("#menu").text("");
			$("#secondary-menu").text("");

			banhji.view.layout.showIn("#content", banhji.view.wBrandNewCustomer);
			banhji.view.layout.showIn('#menu', banhji.view.menu);
			banhji.view.layout.showIn('#secondary-menu', banhji.view.waterMenu);
			kendo.fx($("#slide-form")).slideIn("down").play();

			var vm = banhji.wBrandNewCustomer;			
			
			if(banhji.pageLoaded["wBrand_new_customer"]==undefined){
				banhji.pageLoaded["wBrand_new_customer"] = true;		
				
				vm.sorterChanges();
				vm.branchDS.filter({ field:"utility_id", value:2 });

				var container = $("#employeeForm");
                kendo.init(container);
                container.kendoValidator({
                    rules: {
                        greaterdate: function (input) {
                            if (input.is("[data-greaterdate-msg]") && input.val() != "") {                                    
                                var date = kendo.parseDate(input.val()),
                                    otherDate = kendo.parseDate($("[name='" + input.data("greaterdateField") + "']").val());
                                return otherDate == null || otherDate.getTime() < date.getTime();
                            }

                            return true;
                        }
                    }
                });

                var validator = $("#employeeForm").data("kendoValidator");
                validator.validate();				
			}
		}
	});
	banhji.router.route("/wCustomer_balance", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			$("#menu").text("");
			$("#secondary-menu").text("");

			banhji.view.layout.showIn("#content", banhji.view.wCustomerBalance);
			banhji.view.layout.showIn('#menu', banhji.view.menu);
			banhji.view.layout.showIn('#secondary-menu', banhji.view.waterMenu);
			kendo.fx($("#slide-form")).slideIn("down").play();			
			
			if(banhji.pageLoaded["wCustomer_balance"]==undefined){
				banhji.pageLoaded["wCustomer_balance"] = true;

				var dataSource =  dataStore(baseUrl + "contacts/wbalance"),
				branchDS =  dataStore(baseUrl + "contacts/branch"),
				locationDS =  dataStore(baseUrl + "locations");

				branchDS.filter({ field:"utility_id", value:2 });

				$("#grid").kendoGrid({
				    dataSource: dataSource,
				    groupable: true,				    
				    pageable: true,        
				    columns: [ 
			    		{ field: "wnumber", title: "លេខកូដ" }, 
			    		{ field: "fullname", title: "ឈ្មោះ" },
			    		{ field: "contact_type_name", title: "ប្រភេទ" },
			    		{ field: "wlocation_name", title: "តំបន់" },
			    		{ field: "wbranch_name", title: "អាជ្ញាបណ្ណ" },
			    		{ field: "balance", title: "សមតុល្យ", template: '#=kendo.toString(balance, "c0", banhji.institute.locale)#', attributes:{style:"text-align:right;"} }
				    ]
				});

				var ddlBranch = $("#ddlBranch").kendoDropDownList({
                    optionLabel: "(--- រើស អាជ្ញាបណ្ណ ---)",
                    autoBind: "false",
                    valuePrimitive: true,
                    dataTextField: "name",
                    dataValueField: "id",
                    dataSource: branchDS
                }).data("kendoDropDownList");

                var ddlLocation = $("#ddlLocation").kendoDropDownList({
                	optionLabel: "(--- រើស តំបន់ ---)",
                    autoBind: false,
                    valuePrimitive: true,
                    cascadeFrom: "ddlBranch",                    
                    cascadeFromField: "company_id",
                    dataTextField: "name",
                    dataValueField: "id",
                    dataSource: locationDS
                }).data("kendoDropDownList");

				$("#search").click(function(){
					if(ddlLocation.value()){
						dataSource.filter({ field:"wlocation_id", value:ddlLocation.value() });
					}else if(ddlBranch.value()){
						dataSource.filter({ field:"wbranch_id", value:ddlBranch.value() });
					}else{
						dataSource.filter([]);
					}
				});
		    }      
		}	
	});
	banhji.router.route("/wCustomer_deposit", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			$("#menu").text("");
			$("#secondary-menu").text("");

			banhji.view.layout.showIn("#content", banhji.view.wCustomerDeposit);
			banhji.view.layout.showIn('#menu', banhji.view.menu);
			banhji.view.layout.showIn('#secondary-menu', banhji.view.waterMenu);
			kendo.fx($("#slide-form")).slideIn("down").play();			
			
			if(banhji.pageLoaded["wCustomer_deposit"]==undefined){
				banhji.pageLoaded["wCustomer_deposit"] = true;

				var dataSource =  dataStore(baseUrl + "contacts/wdeposit"),
				branchDS =  dataStore(baseUrl + "contacts/branch"),
				locationDS =  dataStore(baseUrl + "locations");

				branchDS.filter({ field:"utility_id", value:2 });

				$("#grid").kendoGrid({
				    dataSource: dataSource,
				    groupable: true,				    
				    pageable: true,        
				    columns: [ 
			    		{ field: "wnumber", title: "លេខកូដ" }, 
			    		{ field: "fullname", title: "ឈ្មោះ" },
			    		{ field: "contact_type_name", title: "ប្រភេទ" },
			    		{ field: "wlocation_name", title: "តំបន់" },
			    		{ field: "wbranch_name", title: "អាជ្ញាបណ្ណ" },
			    		{ field: "deposit", title: "ប្រាក់កក់", template: '#=kendo.toString(deposit, "c0", banhji.institute.locale)#', attributes:{style:"text-align:right;"} }
				    ]
				});

				var ddlBranch = $("#ddlBranch").kendoDropDownList({
                    optionLabel: "(--- រើស អាជ្ញាបណ្ណ ---)",
                    autoBind: "false",
                    valuePrimitive: true,
                    dataTextField: "name",
                    dataValueField: "id",
                    dataSource: branchDS
                }).data("kendoDropDownList");

                var ddlLocation = $("#ddlLocation").kendoDropDownList({
                	optionLabel: "(--- រើស តំបន់ ---)",
                    autoBind: false,
                    valuePrimitive: true,
                    cascadeFrom: "ddlBranch",                    
                    cascadeFromField: "company_id",
                    dataTextField: "name",
                    dataValueField: "id",
                    dataSource: locationDS
                }).data("kendoDropDownList");

				$("#search").click(function(){
					if(ddlLocation.value()){
						dataSource.filter({ field:"wlocation_id", value:ddlLocation.value() });
					}else if(ddlBranch.value()){
						dataSource.filter({ field:"wbranch_id", value:ddlBranch.value() });
					}else{
						dataSource.filter([]);
					}
				});
		    }      
		}	
	});
	banhji.router.route("/wAging_summary", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			$("#menu").text("");
			$("#secondary-menu").text("");

			banhji.view.layout.showIn("#content", banhji.view.wAgingSummary);
			banhji.view.layout.showIn('#menu', banhji.view.menu);
			banhji.view.layout.showIn('#secondary-menu', banhji.view.waterMenu);
			kendo.fx($("#slide-form")).slideIn("down").play();			
			
			var vm = banhji.wAgingSummary;

			if(banhji.pageLoaded["wAging_summary"]==undefined){
				banhji.pageLoaded["wAging_summary"] = true;				

				var ddlBranch = $("#ddlBranch").kendoDropDownList({
                    optionLabel: "(--- រើស អាជ្ញាបណ្ណ ---)",
                    autoBind: false,
                    valuePrimitive: true,
                    dataTextField: "name",
                    dataValueField: "id",
                    dataSource: vm.branchDS,
                    change: function(e) {
					    vm.set("location_id", null);					    
					}
                }).data("kendoDropDownList");

                var ddlLocation = $("#ddlLocation").kendoDropDownList({
                	optionLabel: "(--- រើស តំបន់ ---)",
                    autoBind: false,
                    valuePrimitive: true,
                    cascadeFrom: "ddlBranch",                    
                    cascadeFromField: "company_id",
                    dataTextField: "name",
                    dataValueField: "id",
                    dataSource: vm.locationDS
                }).data("kendoDropDownList");                
			}
		}
	});
	banhji.router.route("/wAging_detail", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			$("#menu").text("");
			$("#secondary-menu").text("");

			banhji.view.layout.showIn("#content", banhji.view.wAgingDetail);
			banhji.view.layout.showIn('#menu', banhji.view.menu);
			banhji.view.layout.showIn('#secondary-menu', banhji.view.waterMenu);
			kendo.fx($("#slide-form")).slideIn("down").play();

			var vm = banhji.wAgingDetail;			
			
			if(banhji.pageLoaded["wAging_detail"]==undefined){
				banhji.pageLoaded["wAging_detail"] = true;		
				
				var ddlBranch = $("#ddlBranch").kendoDropDownList({
                    optionLabel: "(--- រើស អាជ្ញាបណ្ណ ---)",
                    autoBind: "false",
                    valuePrimitive: true,
                    dataTextField: "name",
                    dataValueField: "id",
                    dataSource: vm.branchDS,
                    change: function(e) {
					    vm.set("location_id", null);					    
					}
                }).data("kendoDropDownList");

                var ddlLocation = $("#ddlLocation").kendoDropDownList({
                	optionLabel: "(--- រើស តំបន់ ---)",
                    autoBind: false,
                    valuePrimitive: true,
                    cascadeFrom: "ddlBranch",                    
                    cascadeFromField: "company_id",
                    dataTextField: "name",
                    dataValueField: "id",
                    dataSource: vm.locationDS
                }).data("kendoDropDownList");

                $("#grid").kendoGrid({
                    dataSource: vm.dataSource,
                    autoBind: false,
                    sortable: true,
                    scrollable: false,
                    pageable: true,
                    columns: [
                        { field: "number", title: "លេខវិក្កយបត្រ", groupFooterTemplate: "សរុប:" },
                        { field: "issued_date", title: "កាលបរិច្ឆេទ", template:'#=kendo.toString(new Date(issued_date), "dd-MM-yyyy")#' },
                        { field: "fullIdName", title: "អតិថិជន" },                        
                        { field: "due_date", title: "ថ្ងៃផុតកំណត់", template:'#=kendo.toString(new Date(due_date), "dd-MM-yyyy")#' },
                        { field: "age", title: "អាយុកាល" },                       
                        { field: "amount", title: "ទឹកប្រាក់",
                        	attributes: {
						      "class": "table-cell",
						      style: "text-align: right;"
						    },
                        	template: "#=kendo.toString(amount, 'c0', banhji.institute.locale)#", 
                        	aggregates: ["sum"], groupFooterTemplate: "<div align='right'>#=kendo.toString(sum, 'c0', banhji.institute.locale)#</div>", 
                        	groupHeaderTemplate: "#= value #"                        	
                        }
                    ]
                });
			}
		}
	});
	banhji.router.route("/wSale_summary", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			$("#menu").text("");
			$("#secondary-menu").text("");

			banhji.view.layout.showIn("#content", banhji.view.wSaleSummary);
			banhji.view.layout.showIn('#menu', banhji.view.menu);
			banhji.view.layout.showIn('#secondary-menu', banhji.view.waterMenu);			
			
			var vm = banhji.wSaleSummary;

			if(banhji.pageLoaded["wSale_summary"]==undefined){
				banhji.pageLoaded["wSale_summary"] = true;
								
				$("#grid").kendoGrid({
		            toolbar: ["excel"],
		            excel: {
		                fileName: "sale_summary.xlsx"
		            },		            		           
		            dataSource: vm.dataSource,
		            groupable: true,		           		                        
		            reorderable: true,
		            resizable: true,
		            columns: [		                
		                { field: "branch_name", title: "អាជ្ញាបណ្ណ" },
		                { field: "location_name", title: "តំបន់" },		                
		                { field: "usage", title:"បរិមាណទឹក", template:'#=kendo.toString(usage, "n0")#', attributes:{style:"text-align:right;"} },		                
		                { field: "amount", title:"ទឹកប្រាក់", template:'#=kendo.toString(amount, "c0", banhji.institute.locale)#', attributes:{style:"text-align:right;"} },
		            ]
		        });		       			
			}
		}		
	});
	banhji.router.route("/wSale_detail", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			$("#menu").text("");
			$("#secondary-menu").text("");

			banhji.view.layout.showIn("#content", banhji.view.wSaleDetail);
			banhji.view.layout.showIn('#menu', banhji.view.menu);
			banhji.view.layout.showIn('#secondary-menu', banhji.view.waterMenu);			
			
			var vm = banhji.wSaleDetail;

			if(banhji.pageLoaded["wSale_detail"]==undefined){
				banhji.pageLoaded["wSale_detail"] = true;

				vm.branchDS.filter({ field:"utility_id", value:2 });
								
				$("#grid").kendoGrid({
		            toolbar: ["excel"],
		            excel: {
		                fileName: "sale_detail.xlsx"
		            },		            		           
		            dataSource: vm.dataSource,
		            groupable: true,
		            sortable: true,		           		                        
		            reorderable: true,
		            resizable: true,
		            columns: [		                
		                { field: "contact_number", title: "លេខកូដ" },
		                { field: "fullname", title: "អតិថិជន" },
		                { field: "contact_type_name", title: "ប្រភេទ" },
		                { field: "location_name", title: "តំបន់" },		                
		                { field: "usage", title:"បរិមាណទឹក", template:'#=kendo.toString(usage, "n0")#', attributes:{style:"text-align:right;"}, sortable: false },		                
		                { field: "amount", title:"ទឹកប្រាក់", template:'#=kendo.toString(amount, "c0", banhji.institute.locale)#', attributes:{style:"text-align:right;"} },
		            ]
		        });		       			
			}
		}		
	});
	banhji.router.route("/wPayment_summary", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			$("#menu").text("");
			$("#secondary-menu").text("");

			banhji.view.layout.showIn("#content", banhji.view.wPaymentSummary);
			banhji.view.layout.showIn('#menu', banhji.view.menu);
			banhji.view.layout.showIn('#secondary-menu', banhji.view.waterMenu);
			kendo.fx($("#slide-form")).slideIn("down").play();			
			
			var vm = banhji.wPaymentSummary;

			if(banhji.pageLoaded["wPayment_summary"]==undefined){
				banhji.pageLoaded["wPayment_summary"] = true;		
				
				vm.sorterChanges();

				var container = $("#employeeForm");
                kendo.init(container);
                container.kendoValidator({
                    rules: {
                        greaterdate: function (input) {
                            if (input.is("[data-greaterdate-msg]") && input.val() != "") {                                    
                                var date = kendo.parseDate(input.val()),
                                    otherDate = kendo.parseDate($("[name='" + input.data("greaterdateField") + "']").val());
                                return otherDate == null || otherDate.getTime() < date.getTime();
                            }

                            return true;
                        }
                    }
                });

                var validator = $("#employeeForm").data("kendoValidator");
                validator.validate();
			}
		}
	});
	banhji.router.route("/wPayment_detail", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			$("#menu").text("");
			$("#secondary-menu").text("");

			banhji.view.layout.showIn("#content", banhji.view.wPaymentDetail);
			banhji.view.layout.showIn('#menu', banhji.view.menu);
			banhji.view.layout.showIn('#secondary-menu', banhji.view.waterMenu);
			kendo.fx($("#slide-form")).slideIn("down").play();

			var vm = banhji.wPaymentDetail;			
			
			if(banhji.pageLoaded["wPayment_detail"]==undefined){
				banhji.pageLoaded["wPayment_detail"] = true;		
				
				vm.sorterChanges();

				var container = $("#employeeForm");
                kendo.init(container);
                container.kendoValidator({
                    rules: {
                        greaterdate: function (input) {
                            if (input.is("[data-greaterdate-msg]") && input.val() != "") {                                    
                                var date = kendo.parseDate(input.val()),
                                    otherDate = kendo.parseDate($("[name='" + input.data("greaterdateField") + "']").val());
                                return otherDate == null || otherDate.getTime() < date.getTime();
                            }

                            return true;
                        }
                    }
                });

                var validator = $("#employeeForm").data("kendoValidator");
                validator.validate();
			}
		}
	});
	banhji.router.route("/wPayment_by_source_summary", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			$("#menu").text("");
			$("#secondary-menu").text("");

			banhji.view.layout.showIn("#content", banhji.view.wPaymentBySourceSummary);
			banhji.view.layout.showIn('#menu', banhji.view.menu);
			banhji.view.layout.showIn('#secondary-menu', banhji.view.waterMenu);			
			
			var vm = banhji.wPaymentBySourceSummary;

			if(banhji.pageLoaded["wPayment_by_source_summary"]==undefined){
				banhji.pageLoaded["wPayment_by_source_summary"] = true;
								
				$("#grid").kendoGrid({
		            toolbar: ["excel"],
		            excel: {
		                fileName: "payment_by_resource_summary.xlsx"
		            },		            		           
		            dataSource: vm.dataSource,
		            groupable: true,		           		                        
		            reorderable: true,
		            resizable: true,
		            columns: [		                
		                { field: "branch_name", title: "អាជ្ញាបណ្ណ" },
		                { field: "location_name", title: "តំបន់" },		                
		                { field: "cash", title:"បញ្ចរទទួលជាសាច់ប្រាក់", template:'#=kendo.toString(cash, "c0", banhji.institute.locale)#', attributes:{style:"text-align:right;"} },		                
		                { field: "check", title:"បញ្ចរទទួលជាមូលប្បទានប័ត្រ", template:'#=kendo.toString(check, "c0", banhji.institute.locale)#', attributes:{style:"text-align:right;"} },
		                { field: "bank", title:"តាមធនាគារ", template:'#=kendo.toString(bank, "c0", banhji.institute.locale)#', attributes:{style:"text-align:right;"} },		                
		                { field: "direct", title:"តាមផ្ទះអតិថិជន", template:'#=kendo.toString(direct, "c0", banhji.institute.locale)#', attributes:{style:"text-align:right;"} },
		                { field: "internet", title:"តាមអីុនធឺណែត", template:'#=kendo.toString(internet, "c0", banhji.institute.locale)#', attributes:{style:"text-align:right;"} }
		            ]
		        });		       			
			}
		}		
	});
	banhji.router.route("/wPayment_by_source_detail", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			$("#menu").text("");
			$("#secondary-menu").text("");

			banhji.view.layout.showIn("#content", banhji.view.wPaymentBySourceDetail);
			banhji.view.layout.showIn('#menu', banhji.view.menu);
			banhji.view.layout.showIn('#secondary-menu', banhji.view.waterMenu);			
			
			var vm = banhji.wPaymentBySourceDetail;

			if(banhji.pageLoaded["wPayment_by_source_detail"]==undefined){
				banhji.pageLoaded["wPayment_by_source_detail"] = true;

				vm.branchDS.filter({ field:"utility_id", value:2 });
								
				$("#grid").kendoGrid({
		            toolbar: ["excel"],
		            excel: {
		                fileName: "payment_by_resource_detail.xlsx"
		            },		            		           
		            dataSource: vm.dataSource,
		            groupable: true,
		            sortable: true,		           		                        
		            reorderable: true,
		            resizable: true,
		            columns: [		                
		                { field: "contact_id", title: "លេខកូដ", template:'#=contact_number#' },
		                { field: "contact_id", title: "អតិថិជន", template:'#=fullname#' },
		                { field: "contact_type_name", title: "ប្រភេទ" },
		                { field: "cashier_id", title: "បេឡាករ", template:'#=cashier_name#' },
		                { field: "payment_method_id", title: "វិធីបង់ប្រាក់", template:'#=payment_method_name#' },		                		                
		                { field: "amount", title:"ទឹកប្រាក់", template:'#=kendo.toString(amount, "c0", banhji.institute.locale)#', attributes:{style:"text-align:right;"} },
		            ]
		        });		       			
			}
		}		
	});	
	banhji.router.route("/wLow_consumption", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			$("#menu").text("");
			$("#secondary-menu").text("");

			banhji.view.layout.showIn("#content", banhji.view.wLowConsumption);
			banhji.view.layout.showIn('#menu', banhji.view.menu);
			banhji.view.layout.showIn('#secondary-menu', banhji.view.waterMenu);
			kendo.fx($("#slide-form")).slideIn("down").play();			
			
			if(banhji.pageLoaded["wLow_consumption"]==undefined){
				banhji.pageLoaded["wLow_consumption"] = true;

				var dataSource =  dataStore(baseUrl + "meters/wlow_consumption"),
				branchDS =  dataStore(baseUrl + "contacts/branch"),
				locationDS =  dataStore(baseUrl + "locations");

				branchDS.filter({ field:"utility_id", value:2 });

				var ddlBranch = $("#ddlBranch").kendoDropDownList({
                    optionLabel: "(--- រើស អាជ្ញាបណ្ណ ---)",
                    autoBind: false,
                    valuePrimitive: true,
                    dataTextField: "name",
                    dataValueField: "id",
                    dataSource: branchDS
                }).data("kendoDropDownList");

                var ddlLocation = $("#ddlLocation").kendoDropDownList({
                	optionLabel: "(--- រើស តំបន់ ---)",
                    autoBind: false,
                    valuePrimitive: true,
                    cascadeFrom: "ddlBranch",                    
                    cascadeFromField: "company_id",
                    dataTextField: "name",
                    dataValueField: "id",
                    dataSource: locationDS
                }).data("kendoDropDownList");

				var monthpicker = $("#monthpicker").kendoDatePicker({        	     	
		            start: "year",            
		            depth: "year",
		            format: "MM-yyyy",            
		            change: function() {
				        var value = this.value();
				        value.setDate(1);				        		        
				        $("#strDate").text("គិតត្រឹមខែ " + kendo.toString(value, "MM-yyyy")); 
				    }
		        }).data("kendoDatePicker");

				var usage = $("#usage").kendoNumericTextBox({
                    format: "<= # គីប",
                    min: 1,
                    value: 20
                }).data("kendoNumericTextBox");

				$("#grid").kendoGrid({
				    dataSource: dataSource,
				    autoBind: false,
				    groupable: true,
				    sortable: true,				    				    
				    pageable: true,				    
				    columns:[				    	
				    	{ field: "contact_number", title:"លេខកូដ" },
				    	{ field: "fullname", title:"ឈ្មោះ" },				    	
				    	{ field: "location_name", title:"តំបន់" },
				    	{ field: "branch_name", title:"អាជ្ញាបណ្ណ" },
				    	{ field: "meter_number", title:"លេខកុងទ័រ" },
				    	{ field: "usage", title:"ចំនួនប្រើប្រាស់" }
				    ]				    
				});				

				$("#search").click(function(){
					var para = [];
				
					if(ddlLocation.value()){
						para.push({ field:"location_id", operator:"join_meter", value:ddlLocation.value() });
					}else if(ddlBranch.value()){
						para.push({ field:"company_id", operator:"join_meter", value:ddlBranch.value() });
					}

					if(monthpicker.value()){
						para.push({ field:"month_of", value: kendo.toString(monthpicker.value(), "yyyy-MM-dd") });
					}

					if(usage.value()){
						para.push({ field:"usage <=", value: usage.value() });
					}
					
					dataSource.filter(para);
				});
		    }      
		}	
	});
	banhji.router.route("/wDisconnect_list", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			$("#menu").text("");
			$("#secondary-menu").text("");

			banhji.view.layout.showIn("#content", banhji.view.wDisconnectList);
			banhji.view.layout.showIn('#menu', banhji.view.menu);
			banhji.view.layout.showIn('#secondary-menu', banhji.view.waterMenu);
			kendo.fx($("#slide-form")).slideIn("down").play();			
			
			if(banhji.pageLoaded["wDisconnect_list"]==undefined){
				banhji.pageLoaded["wDisconnect_list"] = true;

				var dataSource =  dataStore(baseUrl + "invoices/wdisconnect"),
				branchDS =  dataStore(baseUrl + "contacts/branch"),
				locationDS =  dataStore(baseUrl + "locations");

				branchDS.filter({ field:"utility_id", value:2 });

				var ddlBranch = $("#ddlBranch").kendoDropDownList({
                    optionLabel: "(--- រើស អាជ្ញាបណ្ណ ---)",
                    autoBind: false,
                    valuePrimitive: true,
                    dataTextField: "name",
                    dataValueField: "id",
                    dataSource: branchDS
                }).data("kendoDropDownList");

                var ddlLocation = $("#ddlLocation").kendoDropDownList({
                	optionLabel: "(--- រើស តំបន់ ---)",
                    autoBind: false,
                    valuePrimitive: true,
                    cascadeFrom: "ddlBranch",                    
                    cascadeFromField: "company_id",
                    dataTextField: "name",
                    dataValueField: "id",
                    dataSource: locationDS
                }).data("kendoDropDownList");				

				var days = $("#days").kendoNumericTextBox({
                    format: "<= # ថ្ងៃ",
                    min: 1,
                    value: 10
                }).data("kendoNumericTextBox");

				$("#grid").kendoGrid({
				    dataSource: dataSource,
				    autoBind: false,
				    groupable: true,
				    sortable: true,				    				    
				    pageable: true,				    
				    columns:[				    	
				    	{ field: "contact_number", title:"លេខកូដ" },
				    	{ field: "fullname", title:"ឈ្មោះ" },	
				    	{ field: "location_name", title:"តំបន់" },				    	
				    	{ field: "number", title:"លេខវិក្កយបត្រ" },
				    	{ field: "due_date", title:"ថ្ងៃផុតកំណត់" },
				    	{ field: "amount", title:"ទឹកប្រាក់", template:'#=kendo.toString(amount, "c0", banhji.institute.locale)#', attributes:{style:"text-align:right;"} },				    	
				    	{ field: "days", title:"ចំនួនថ្ងៃផុតកំណត់", attributes:{style:"text-align:right;"} }
				    ]				    
				});				

				$("#search").click(function(){
					var para = [];
				
					if(ddlLocation.value()){
						para.push({ field:"location_id", operator:"join_meter", value:ddlLocation.value() });
					}else if(ddlBranch.value()){
						para.push({ field:"company_id", operator:"join_meter", value:ddlBranch.value() });
					}					

					if(days.value()){
						para.push({ field:"days", operator:"days", value: days.value() });
					}
					
					dataSource.filter(para);
				});
		    }      
		}	
	});	
	//END OF DAWINE  ---------------------------------------------------------------------------------


	banhji.router.route('/manage', function(){
		$("#menu").text("");
		$("#secondary-menu").text("");

		banhji.view.layout.showIn("#content", banhji.view.loginView);		
	});

	banhji.router.route('/page', function(){
		banhji.view.layout.showIn('#menu', banhji.view.menu);
		if(banhji.userManagement.getLogin().perm.length > 0) {
			if(banhji.userManagement.getLogin().perm[0].id === "1") {
				banhji.view.layout.showIn('#content', banhji.view.pageAdmin);
			} else {
				banhji.view.layout.showIn('#content', banhji.view.page);
			}
		}		
	});

	banhji.router.route('/page/userlist', function(){
		banhji.view.layout.showIn('#menu', banhji.view.menu);
		if(banhji.userManagement.getLogin().perm.length > 0) {
			if(banhji.userManagement.getLogin().perm[0].id === "1") {
				banhji.view.layout.showIn('#content', banhji.view.pageAdmin);
				banhji.view.pageAdmin.showIn('#col2', banhji.view.userListView);
			}
		}		
	});

	banhji.router.route('/page/password', function(){
		banhji.view.layout.showIn('#menu', banhji.view.menu);
		banhji.view.layout.showIn('#content', banhji.view.passwordView);
		banhji.userManagement.pwdDS.add({
			username: banhji.userManagement.getLogin().username,
			password: banhji.userManagement.get('password')
		});		
	});

	banhji.router.route('/app/:userid', function(userid){
		banhji.view.layout.showIn('#menu', banhji.view.menu);
		console.log('app ' + userid);
	});

	$(function() {	
		banhji.router.start();
		if(!banhji.userManagement.getLogin()){
			window.location.assign("<?php echo base_url(); ?>home");
		} else {
			if(banhji.currency.dataSource.data().length === 0) {
				banhji.currency.dataSource.read();
			}	
		}
	});
</script>