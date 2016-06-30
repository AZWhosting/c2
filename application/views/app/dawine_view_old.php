<div class="container-fluid menu-hidden sidebar-hidden-phone fluid menu-left hidden-print">
	<div class="navbar main" id="main-menu">
		<ul class="topnav">
			<li class="dropdown dd-1 span3">
				<a href="\#" class="dropdown-toggle" data-toggle="dropdown" id="home-menu">Banhji</a>
				<ul class="dropdown-menu" id="dropdownMenu">
	        	</ul>
	        </li>
		</ul>
		<ul class="topnav pull-right">
			<li><a href="<?php echo base_url(); ?>app#myacct"><?php echo $this->session->userdata('username'); ?></a></li>
			<li><a href="<?php echo base_url(); ?>auth/logout" class="glyphicons power"><i></i>ចាក់ចេញ</a></li>
		</ul>
		<ul class="topnav" id="secondary-menu">
		</ul>
	</div>
</div>
<div id="wrapperApplication"></div>
<script src="<?php echo base_url();?>resources/js/locale.js"></script>

<script type="text/x-kendo-template" id="login-tmpl">
	<div class="container-960">
		<div class="row">
			<div class="span3 offset4">
				<label for="email">អីម៉ែល</label>
				<input type="email" placeholder="email" data-bind="value:email, events: {change: validateEmail}">
				<label for="password">លេខសំងាត់</label>
				<input type="password" placeholder="password" data-bind="value:password, events: {change: validatePWD}">
				<button class="btn btn-primary" data-bind="click:login">ចាក់ចូល</button>
				<button class="btn" data-bind="click:register">ចុះឈ្មោះ</button>
			</div>
		</div>
	</div>
	<div id="dialog" style="visibility: hidden">សូមពិនិត្យអីម៉េល​ រឺ លេខសំងាត់។</div>
</script>

<!--views-->
<!-- By Dararith -->
<script type="text/x-kendo-template" id="layout">
	<div id="layout-view">
	</div>
</script>
<script type="text/x-kendo-template" id="404">
	<div  class="container-fluid menu-hidden sidebar-hidden-phone fluid menu-left">
		<div class="row">
			<div class="span12">
				<div>
					<h3>Oops! We are running into a wall</h3>
					<p>Try going <a href="\\#" data-bind="click: back">back</a></p>
				</div>
			</div>
		</div>
	</div>
</script>
<script type="text/x-kendo-template" id="index">	
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="innerLR">
				<div id="content"></div>
			</div>
		</div>
	</div>
</script>
<script type="text/x-kendo-template" id="welcome">
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span6">
				<ul id="module-image">
					<li>
						<a href="<?php echo base_url(); ?>app#customers">
							<img src="<?php echo base_url(); ?>resources/img/Customer.png" alt="Customer">
						</a>
					</li>
					<li>
						<a href="<?php echo base_url(); ?>app#vendors">
							<img src="<?php echo base_url(); ?>resources/img/Vendor.png" alt="Vendor">
						</a>
					</li>
					<li>
						<a href="<?php echo base_url(); ?>app#accounting">
							<img src="<?php echo base_url(); ?>resources/img/Accounting.png" alt="Accounting">
						</a>
					</li>
					<li>
						<a href="<?php echo base_url(); ?>app#inventories">
							<img src="<?php echo base_url(); ?>resources/img/Inventory.png" alt="Inventory">
						</a>
					</li>
					<li>
						<a href="<?php echo base_url(); ?>app#transformers">
							<img src="<?php echo base_url(); ?>resources/img/Electricity.png" alt="Electricity">
						</a>
					</li>
					<li>
						<a href="<?php echo base_url(); ?>app#water">
							<img src="<?php echo base_url(); ?>resources/img/Water.png" alt="Water">
						</a>
					</li>
					<li></li>
					<li>
						<a href="<?php echo base_url(); ?>app#reports">
							<img src="<?php echo base_url(); ?>resources/img/Report.png" alt="Report">
						</a>
					</li>
					<li></li>
				</ul>
			</div>
		</div>
	</div>
</script>
<script type="text/x-kendo-template" id="menu">
	#for(var i=0;i<data.length;i++) {#
        <li><a href="\\##=data[i].menu#" class="glyphicons #=data[i].icon#"><i></i>#=data[i].locale#</a></li>
    #}#
</script>

<!-- BY DAWINE ************************************************************************************************************ -->
<!-- Customer -->
<script id="customerCenter" type="text/x-kendo-template">
	<div class="container-fluid">		
		<div class="span12" id="header"></div>

		<div id="content" class="row">
			<div class="widget widget-heading-simple widget-body-gray widget-employees">		
				<div class="widget-body padding-none">	
					<div class="row-fluid row-merge">
						<div class="span3 listWrapper" style="height: 500px;">
							<div class="innerAll">
								<form autocomplete="off" class="form-inline">
									<div class="widget-search separator bottom">
										<button type="button" class="btn btn-default pull-right" id="search"><i class="icon-search"></i></button>
										<div class="overflow-hidden">
											<input id="searchField" name="searchField" type="search" value="" placeholder="ស្វែងរក អតិថិជន">
										</div>
									</div>
									<div class="select2-container" style="width: 100%;">
										<div class="overflow-hidden">
											<input id="searchCompany" placeholder="អាជ្ញាបណ្ណ" style="width: 100%" tabindex="-1" />																				
										</div>
									</div>									
								</form>
							</div>						
							<div class="table table-condensed" id="sidebar" style="height: 605px;"></div>
						</div>
						<div class="span9 detailsWrapper">
							<div class="innerLR">
								<div class="navbar" data-bind="visible: showMenu">
									<div class="navbar-inner">					
										<ul class="nav">
											<li><a href="#" data-bind="click: goDashBoard">ប្រតិបត្តិការ</a></li>
											<li><a href="#" data-bind="click: goDetail">ព័តមានលំអិតអថិជន</a></li>
											<li><a href="#" data-bind="click: goStatement">បញ្ជីបំណុល</a></li>
											<li><a href="#invoice">វិក្កយប័ត្រ</a></li>
											<li><a href="#receipt">បង្កាន់ដៃលក់</a></li>																						
											<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">ផ្សេងៗ <i class="caret"></i></a>
												<ul class="dropdown-menu">													
													<li><a href="#estimate">សម្រង់តម្លៃ</a></li>
													<li><a href="#so">បញ្ជាលក់</a></li>												    
												    <li><a href="#gdn">លិខិតដឹកជញ្ជូន</a></li>
													<li><a href="#" data-bind="click: goMeter">កុងទ័រ</a></li>													
												</ul>
											</li>
										</ul>
									</div>
								</div>

								<div id="detail"></div>							
							</div>					
						</div>
					</div>	
				</div>
			</div>
		</div>
	</div>
</script>
<script id="customerListTmpl" type="text/x-kendo-template">
	<tr>
		<td>
			<div class="media-body">
				<span class="strong">
					#if(people_type_id==5 || people_type_id==6 || people_type_id==7){#
						#=number# #=company#
					#}else{#
						#=number# #=surname# #=name#
					#}#					
				</span>
			</div>
		</td>
	</tr>
</script>
<script id="customerDashboard" type="text/x-kendo-template">
	<div class="row-fluid">
		<div class="span12">
			<div id="example" class="k-content">

				<div class="row-fluid">
					<div class="span3" data-bind="click: loadOpenEstimate" style="color: white; font-size: 20px; background-color:Purple; border:0px solid black; padding: 10px;">
						សម្រង់តម្លៃ
						<br><br>
						<span data-bind="text: totalEstimate" ></span>
						<span style="font-size: 14px">មិនទាន់យល់ព្រម</span>
					</div>
					
					<div class="span3" data-bind="click: loadOpenSO" style="color: white; font-size: 20px; background-color:MediumSeaGreen; border:0px solid black; padding: 10px;">
						បញ្ជាលក់
						<br><br>
						<span data-bind="text: totalSO" ></span>
						<span style="font-size: 14px">មិនទាន់រៀបចំ</span>
					</div>

					<div class="span3" data-bind="click: loadOpenInvoice" style="color: white; font-size: 20px; background-color:Orange; border:0px solid black; padding: 10px;">
						វិក្កយបត្រ
						<br><br>
						<span data-bind="text: totalOpenInvoice" ></span>
						<span style="font-size: 14px">មិនទាន់ទូទាត់</span>
					</div>

					<div class="span3" data-bind="click: loadOverDueInvoice" style="color: white; font-size: 20px; background-color:Crimson; border:0px solid black; padding: 10px;">
						វិក្កយបត្រ
						<br><br>
						<span data-bind="text: totalOverDue" ></span>
						<span style="font-size: 14px">ហួសកំណត់</span>
					</div>		          	
	          	</div>

	          	<div class="row">
					<div class="span6">
						<div class="innerAll padding-bottom-none-phone">
							<a href="" class="widget-stats widget-stats-primary widget-stats-4">
								<span class="txt">សមតុល្យសរុប</span>
								<span class="count" style="font-size: 35px;" data-bind="text: balance"></span>
								<span class="glyphicons coins"><i></i></span>
								<div class="clearfix"></div>
								<i class="icon-play-circle"></i>
							</a>
						</div>
					</div>					
					<div class="span6">
						<div class="chart" data-role="chart" data-bind="source: monthlySaleList"
							data-auto-bind="false"
						  	data-legend="{position: 'bottom'}"
						  	data-series="[			  				
							  				{ type: 'line', field: 'amt' },
							  				{ type: 'column', field: 'amt' }
						  			   	]"			  	
						  	data-category-Axis="{ field: 'month',			  						   
						  						  labels: { rotation: 0
						  								  } 
												}"
						  	data-value-Axis="{ labels: {format: '0'}, 
							  					min:0, max: 100000, 
							  					majorUnit: 10000,
							  					majorGridLines: { width: 1 }
						  					}"
						  	data-chart-area="{ height: 180 }"
						  	data-tooltip="{ visible: true, format: 'NO' }">
						</div>	
					</div>					
				</div>

				<div>
					<select id="dateSorter" data-role="dropdownlist" data-bind="value: date_sorter, events:{change:dateSorterChange}">
					   	<option value="today">ថ្ងៃនេះ</option>
					  	<option value="week">សប្ដាស៍នេះ</option>
					  	<option value="month">ខែនេះ</option>
					  	<option value="year">ឆ្នាំនេះ</option>
					</select>					
					<input data-role="datepicker" data-bind="value: start_date" data-format="dd-MM-yyyy" placeHolder="ចាប់ពីថ្ងៃទី" />
					<input data-role="datepicker" data-bind="value: end_date" data-format="dd-MM-yyyy" placeHolder="ដល់" />
					<button type="button" class="btn btn-default" data-bind="click: btnLoadStatementCollection"><i class="icon-search"></i></button>				
				</div>

				<div data-role="grid" data-bind="source: statementCollectionList"
			        data-row-template="statementCollectionRowTemplate" 
			        data-pageable="true" 
			        data-auto-bind="false"
			        data-sortable="true"              
			        data-columns="[{ title: 'កាលបរិច្ឆេទ' }, 
			            { title: 'ប្រភេទ' },	                     
			            { title: 'លេខកូដ' },	                                      
			            { title: 'ទឹកប្រាក់' },
			            { title: 'ស្ថានភាព' },
			            { title: 'ធ្វើការ'}                    
			            ]">
				</div>

			</div><!-- //End div example-->
		</div><!-- //End div span12-->
	</div><!-- //End div row-fluid-->
</script>
<script id="statementCollectionRowTemplate" type="text/x-kendo-tmpl">
    <tr>        
        <td>#:kendo.toString(new Date(issued_date), "dd-MM-yyyy")#</td>
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
        	#}else{#
        		វិក្កយបត្រ
        	#}#
        </td>
        <td>
        	#if(type==="Invoice"){#								
				<a href="\#invoice/#=id#"><i></i> #=number#</a>	
			#}else if(type==="Receipt"){#
        		<a href="\#receipt/#=id#"><i></i> #=number#</a>        	        		
			#}else if(type==="SO"){#
        		<a href="\#so/#=id#"><i></i> #=number#</a>
        	#}else if(type==="Estimate"){#        		
        		<a href="\#estimate/#=id#"><i></i> #=number#</a>
        	#}else if(type==="GDN"){#        		
        		<a href="\#gdn/#=id#"><i></i> #=number#</a>
        	#}else if(type==="Notice"){#
        		#=number#
        	#}else if(type==="Payment"){#

        	#}else{#
        		#=number#
        	#}#
        </td>
        <td align="right">#:kendo.toString(kendo.parseFloat(amount)/kendo.parseFloat(rate), "c", sub_code)#</td>
        <td>        	
        	#if(type==="Invoice" || type==="eInvoice" || type==="Notice"){#
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
					<a href="\#cashier/#=id#"><i></i> ទទួលប្រាក់</a>
				#}#
			#}else if(type==="eInvoice"){#
        		#if(status==="0" || status==="2"){#
        			<a href="\#cashier/#=id#"><i></i> ទទួលប្រាក់</a>
        		#}#
        	#}else if(type==="Notice"){#
        		#if(status==="0" || status==="2"){#
        			<a href="\#cashier/#=id#"><i></i> ទទួលប្រាក់</a>
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
<script id="customer" type="text/x-kendo-template">	
	<div class="row-fluid">]
		<div class="container-960">     
			<div class="span12">			
				<div id="example" class="k-content">						
					<div align="right">			        				        	
				    	<button id="closeX" type="button" aria-hidden="true">X</button>			        	
					</div>
					<h3 id="title" align="center"></h3>	
					<br>
					<div class="row-fluid">
						<div class="span3">										
							<label for="company">អាជ្ញាបណ្ណ <span style="color:red">*</span></label>						
							<select id="company" name="company" data-role="dropdownlist" 
		              				data-text-field="abbr" data-value-field="id" 
		              				data-value-primitive="true" 
		              				data-bind="source: companyList, value: customer.company_id, events:{ change: companyChanges }"
		              				data-option-label="(--- ជ្រើសរើស ---)"
		              				required data-required-msg="ត្រូវការ អាជ្ញាបណ្ណ"></select>						
						</div>							
						<div class="span3">											
							<label for="customerType">ប្រភេទអតិថិជន <span style="color:red">*</span></label>
							<select id="customerType" name="customerType" data-role="dropdownlist" 
		              				data-text-field="name" data-value-field="id" 
		              				data-value-primitive="true" 
		              				data-bind="source: peopleTypeList, value: customer.people_type_id, events:{ change: peopleTypeChange }"
		              				data-option-label="(--- ជ្រើសរើស ---)"
		              				required data-required-msg="ត្រូវការ ប្រភេទអតិថិជន"></select>			            
						</div>
						<div class="span3">
							<label for="classes">Class <span style="color:red">*</span></label>
				            <select id="classes" name="classes" data-role="dropdownlist" 
		              				data-text-field="name" data-value-field="id" data-value-primitive="true" 
		              				data-bind="source: classList, value: customer.class_id"
		              				data-option-label="(--- ជ្រើសរើស ---)"
		              				required data-required-msg="ត្រូវការ Class"></select>
						</div>					
						<div class="span3">
							<label for="registered_date">ថ្ងៃចុះឈ្មោះ <span style="color:red">*</span></label>
				            <input id="registered_date" name="registered_date" 
				            		data-role="datepicker"			            		
	            					data-bind="value: customer.registered_date" 
	            					data-format="dd-MM-yyyy"
	            					data-parse-formats="yyyy-MM-dd" 
	            					placeholder="ថ្ងែ-ខែ-ឆ្នាំ" required data-required-msg="ត្រូវការ ថ្ងៃចុះឈ្មោះ" />
						</div>																
					</div>						

					<br>
					<div class="separator line bottom"></div>

					<div class="row-fluid">									
						<div class="span3">						
							<label for="number">លេខកូដ <span style="color:red">*</span></label>
	              			<input id="number" name="number" class="k-textbox"
		              				data-bind="value: customer.number, events: { change: checkExistingNumber }" 
		              				placeholder="e.g. AB0001" required data-required-msg="ត្រូវការ លេខកូដ" />
		              		<span data-bind="visible: isDuplicateNumber" style="color: red;">លេខកូដនេះបានប្រើប្រាស់រូចហើយ</span>
						</div>
						<div class="span3">
							<label for="surname">គោត្តនាម <span style="color:red">*</span></label>
		              		<input id="surname" name="surname" class="k-textbox" data-bind="value: customer.surname" 
				              		placeholder="ត្រកូល" required data-required-msg="ត្រូវការ គោត្តនាម" />
						</div>
						<div class="span3">							
							<label for="name">នាម <span style="color:red">*</span></label>
				            <input id="name" name="name" class="k-textbox" data-bind="value: customer.name" 
				              		placeholder="ឈ្មោះ" required data-required-msg="ត្រូវការ នាម" />
						</div>
						<div class="span3" data-bind="visible: isCompany">
							<label for="companyName">ក្រុមហ៊ុន <span style="color:red">*</span></label>
							<input id="companyName" name="companyName" class="k-textbox" data-bind="enabled: isCompany, value: customer.company" 
									required data-required-msg="ត្រូវការ ក្រុមហ៊ុន"
									placeholder="e.g. PCG & Partner" />	
						</div>										
					</div>

					<br>
					<div class="separator line bottom"></div>

					<div class="row-fluid">					
						<div class="span3">						
				            <label for="currencyCBB">រូបិយ​ប័ណ្ណ <span style="color:red">*</span></label>			            
				            <select id="classes" name="classes" data-role="dropdownlist" 
		              				data-text-field="name" data-value-field="code" 
		              				data-value-primitive="true" 
		              				data-bind="source: currencyList, value: customer.currency_code, events:{change: currencyChange}"
		              				data-option-label="(--- ជ្រើសរើស ---)"
		              				required data-required-msg="ត្រូវការ រូបិយ​ប័ណ្ណ"></select>
				        </div>
						<div class="span3">
							<label for="ar">គណនីអតិថិជន <span style="color:red">*</span></label>
				            <select id="ar" name="ar" data-role="dropdownlist" 
				            		data-text-field="name" data-value-field="id" data-value-primitive="true" 
		            				data-bind="source: accountReceiveableList, value: customer.account_receiveable_id" 
		            				data-option-label="(--- ជ្រើសរើស ---)"	            				
		            				required data-required-msg="ត្រូវការ គណនីចំណូល"></select>
						</div>
						<div class="span3">
							<label for="revenueAccount">គណនីចំណូល <span style="color:red">*</span></label>
				            <select id="revenueAccount" name="revenueAccount" data-role="dropdownlist" 
				            		data-text-field="name" data-value-field="id" data-value-primitive="true"
		            				data-bind="source: revenueAccountList, value: customer.revenue_account_id"	            				
		            				data-option-label="(--- ជ្រើសរើស ---)"	            				 
		            				required data-required-msg="ត្រូវការ គណនីចំណូល"></select>
						</div>
						<div class="span3" data-bind="visible: isCompany">
							<label for="vatNo">លេខ VAT</label>								
		            		<input id="vatNo" name="vatNo" class="k-textbox" data-bind="value: customer.vat_no" 
									placeholder="e.g. 01234567897">												
						</div>					
					</div>	

					<br>
					<div class="separator line bottom"></div>

					<!-- // Inner Tabs -->
					<div class="row-fluid">								
						<div class="box-generic">
						    <!-- //Tabs Heading -->
						    <div class="tabsbar tabsbar-2">
						        <ul class="row-fluid row-merge">					            					            
						            <li class="span2 glyphicons circle_info active">
						            	<a href="#tab1" data-toggle="tab"><i></i> <span>ពត័មានផ្សេងៗ</span></a>
						            </li>					            					            
						            <li class="span2 glyphicons phone">
						            	<a href="#tab4" data-toggle="tab"><i></i> <span>ទំនាក់ទំនង</span></a>
						            </li>
						            <li class="span2 glyphicons home">
						            	<a href="#tab5" data-toggle="tab"><i></i> <span>អាសយដ្ឋាន</span></a>
						            </li>								            
						        </ul>
						    </div>
						    <!-- // Tabs Heading END -->

						    <div class="tab-content">					        

						        <!-- //OTHER INFO -->
						        <div class="tab-pane active" id="tab1">
					            	<table width="100%" cellpadding="5" cellspacing="5">						            	
					            		<tr>
							                <td>ស្ថានភាព <span style="color:red">*</span></td>
							              	<td>
							              		<input id="peopleStatus" name="peopleStatus" data-role="dropdownlist"
								            		data-text-field="name"
					           						data-value-field="id"
					           						data-value-primitive="true" 
								            		data-bind="source: statusList, value: customer.status"					            							            		
								            		data-option-label="(--- ជ្រើសរើស ---)"
								            		required data-required-msg="ត្រូវការ ស្ថានភាព" />
							              	</td>
							              	<td>លេខអត្តសញ្ញាណប័ណ្ណ</td>
							              	<td><input id="card_number" class="k-textbox" data-bind="value: customer.card_number" placeholder="e.g. 123456789" /></td>								            	
							            </tr>
							            <tr>
							              	<td>ភេទ</td>
							              	<td><select data-role="dropdownlist" data-bind="source: genders, value: customer.gender"></select></td>
							              	<td>សមាជិកគ្រួសារ</td>
							              	<td><input id="family_member" class="k-textbox" data-bind="value: customer.family_member" placeholder="e.g. 3" /></td>
							            </tr>
							            <tr>
							            	<td>ថ្ងៃកំណើត</td>
							              	<td><input id="dob" data-role="datepicker" data-bind="value: customer.dob" data-format="dd-MM-yyyy" placeholder="ថ្ងែ-ខែ-ឆ្នាំ" /></td>									              	
							              	<td>មុខរបរ</td>
							              	<td><input id="job" class="k-textbox" data-bind="value: customer.job" placeholder="e.g. គ្រូបង្រៀន" /></td>
							            </tr>
							            <tr valign="top">
							              	<td>ទីកន្លែងកំណើត</td>
							              	<td><input id="pob" class="k-textbox" data-bind="value: customer.pob" placeholder="e.g. ផ្ទះ ផ្លូវ ភូមិ សង្កាត់ ខណ្ឌ" />						            
							            	<td>សំគាល់</td>
							              	<td><input class="k-textbox" data-bind="value: customer.memo" placeholder="..." /></td>									              							              									              	
							            </tr>								            								            								            			            
							        </table>
					        	</div>
						        <!-- // OTHER INFO END -->       				       

						        <!-- //CONTACT -->
						        <div class="tab-pane" id="tab4">
					            	<table width="100%" cellpadding="5" cellspacing="5">
										<tr valign="top">													
											<td>
												<div class="input-prepend">
													<span class="add-on glyphicons phone"><i></i></span>
													<input type="tel" id="inputPhone" class="input-large" placeholder="លេខទូរស័ព្ទ" data-bind="value: customer.phone">
												</div>
											</td>													
											<td>
												<div class="input-prepend">
													<span class="add-on glyphicons google_maps"><i></i></span>
													<input type="tel" id="inputPhone" class="input-large" placeholder="latitute" data-bind="value: customer.latitute">
												</div>
											</td>										
										</tr>
										<tr valign="top">													
											<td>
												<div class="input-prepend">
													<span class="add-on glyphicons envelope"><i></i></span>
													<input type="email" id="inputEmail" class="input-large" placeholder="អីុម៉ែល" data-bind="value: customer.email">
												</div>
											</td>
											<td>
												<div class="input-prepend">
													<span class="add-on glyphicons pinboard"><i></i></span>
													<input type="tel" id="inputPhone" class="input-large" placeholder="longtitute" data-bind="value: customer.longtitute">
												</div>
											</td>																				
										</tr>
										<tr>
											<td>
												<div class="input-prepend">
													<span class="add-on glyphicons globe_af"><i></i></span>
													<input type="text" id="inputZipCode" class="input-large" placeholder="zip code" data-bind="value: customer.zip_code">
												</div>
											</td>
											<td></td>
										</tr>																																									
									</table>
						        </div>
						        <!-- // CONTACT END -->

						        <!-- //ADDRESS -->
						        <div class="tab-pane" id="tab5">
					            	<table width="100%" cellpadding="5" cellspacing="5">
										<tr valign="top">													
											<td>
												<div class="input-prepend">
													<span class="add-on glyphicons home"><i></i></span>
													<input type="text" id="inputAddress1" class="input-large" placeholder="អាសយដ្ឋាន ១" data-bind="value: customer.address">
												</div>														
											</td>										
											<td>ខេត្ត/រាជធានី</td>
											<td>
												<select id="province" data-bind="value: customer.province_id"></select>
											</td>
										</tr>
										<tr valign="top">													
											<td>
												<div class="input-prepend">
													<span class="add-on glyphicons home"><i></i></span>
													<input type="text" id="inputAddress2" class="input-large" placeholder="អាសយដ្ឋាន ២" data-bind="value: customer.address2">
												</div>														
											</td>										
											<td>ស្រុក/ខណ្ឌ</td>
											<td>
												<select id="district" data-bind="value: customer.district_id"></select>
											</td>
										</tr>
										<tr valign="top">													
											<td>
												<div class="input-prepend">
													<span class="add-on glyphicons home"><i></i></span>
													<input type="text" id="inputAddress3" class="input-large" placeholder="អាសយដ្ឋាន ៣" data-bind="value: customer.address3">
												</div>														
											</td>										
											<td>ឃុំ/សង្កាត់</td>
											<td>
												<select id="commune" data-bind="value: customer.commune_id"></select>
											</td>											
										</tr>
										<tr valign="top">													
											<td>
												<div class="input-prepend">
													<span class="add-on glyphicons home"><i></i></span>
													<input type="text" id="inputAddress4" class="input-large" placeholder="អាសយដ្ឋាន ៤" data-bind="value: customer.address4">
												</div>														
											</td>										
											<td>ភូមិ/ក្រុម</td>
											<td>
												<select id="village" data-bind="value: customer.village_id"></select>
											</td>
										</tr>																							
									</table>
						        </div>
						        <!-- // ADDRESS END -->					        								        

						    </div>
						</div>
					</div>											
					
					<!-- //Form actions -->
					<div align="center">
						<div id="status"></div>								
						<button id="save" type="submit" class="btn btn-icon btn-primary glyphicons circle_ok"><i></i> កត់ត្រា</button>
					</div>
					<!-- // Form actions END -->							
				</div> <!-- // End div example-->  
			</div> <!-- // End div span12-->	
		</div>	
	</div> <!-- // End div row-fluid-->	
</script>
<script id="eCustomer" type="text/x-kendo-template">	
	<div class="row-fluid">
		<div class="container-960">    
			<div class="span12">			
				<div id="example" class="k-content">
					<div align="right">			        				        	
				    	<button id="closeX" type="button" aria-hidden="true">X</button>			        	
					</div>
					<h3 id="title" align="center"></h3>	
					<br>			
					<div class="row-fluid">
						<div class="span3">										
							<label for="company">អាជ្ញាបណ្ណ <span style="color:red">*</span></label>						
							<select id="company" name="company" data-role="dropdownlist" 
		              				data-text-field="abbr" data-value-field="id" 
		              				data-value-primitive="true" 
		              				data-bind="source: companyList, value: customer.company_id, events:{ change: companyChanges }"
		              				data-option-label="(--- ជ្រើសរើស ---)"
		              				required data-required-msg="ត្រូវការ អាជ្ញាបណ្ណ"></select>						
						</div>							
						<div class="span3">											
							<label for="customerType">ប្រភេទអតិថិជន <span style="color:red">*</span></label>
							<select id="customerType" name="customerType" data-role="dropdownlist" 
		              				data-text-field="name" data-value-field="id" 
		              				data-value-primitive="true" 
		              				data-bind="source: peopleTypeList, value: customer.people_type_id, events:{ change: peopleTypeChange }"
		              				data-option-label="(--- ជ្រើសរើស ---)"
		              				required data-required-msg="ត្រូវការ ប្រភេទអតិថិជន"></select>			            
						</div>
						<div class="span3">
							<label for="classes">Class <span style="color:red">*</span></label>
				            <select id="classes" name="classes" data-role="dropdownlist" 
		              				data-text-field="name" data-value-field="id" data-value-primitive="true" 
		              				data-bind="source: classList, value: customer.class_id"
		              				data-option-label="(--- ជ្រើសរើស ---)"
		              				required data-required-msg="ត្រូវការ Class"></select>
						</div>					
						<div class="span3">
							<label for="registered_date">ថ្ងៃចុះឈ្មោះ <span style="color:red">*</span></label>
				            <input id="registered_date" name="registered_date" 
				            		data-role="datepicker"			            		
	            					data-bind="value: customer.registered_date" 
	            					data-format="dd-MM-yyyy"
	            					data-parse-formats="yyyy-MM-dd" 
	            					placeholder="ថ្ងែ-ខែ-ឆ្នាំ" required data-required-msg="ត្រូវការ ថ្ងៃចុះឈ្មោះ" />
						</div>																
					</div>						

					<br>
					<div class="separator line bottom"></div>

					<div class="row-fluid">									
						<div class="span3">						
							<label for="number">លេខកូដ <span style="color:red">*</span></label>
	              			<input id="number" name="number" class="k-textbox"
		              				data-bind="value: customer.number, events: { change: checkExistingNumber }" 
		              				placeholder="e.g. AB0001" required data-required-msg="ត្រូវការ លេខកូដ" />
		              		<span data-bind="visible: isDuplicateNumber" style="color: red;">លេខកូដនេះបានប្រើប្រាស់រូចហើយ</span>
						</div>
						<div class="span3">
							<label for="surname">គោត្តនាម <span style="color:red">*</span></label>
		              		<input id="surname" name="surname" class="k-textbox" data-bind="value: customer.surname" 
				              		placeholder="ត្រកូល" required data-required-msg="ត្រូវការ គោត្តនាម" />
						</div>
						<div class="span3">							
							<label for="name">នាម <span style="color:red">*</span></label>
				            <input id="name" name="name" class="k-textbox" data-bind="value: customer.name" 
				              		placeholder="ឈ្មោះ" required data-required-msg="ត្រូវការ នាម" />
						</div>
						<div class="span3" data-bind="visible: isCompany">
							<label for="companyName">ក្រុមហ៊ុន <span style="color:red">*</span></label>
							<input id="companyName" name="companyName" class="k-textbox" data-bind="enabled: isCompany, value: customer.company" 
									required data-required-msg="ត្រូវការ ក្រុមហ៊ុន"
									placeholder="e.g. PCG & Partner" />	
						</div>										
					</div>

					<br>
					<div class="separator line bottom"></div>

					<div class="row-fluid">					
						<div class="span3">						
				            <label for="currencyCBB">រូបិយ​ប័ណ្ណ <span style="color:red">*</span></label>			            
				            <select id="classes" name="classes" data-role="dropdownlist" 
		              				data-text-field="name" data-value-field="code" 
		              				data-value-primitive="true" 
		              				data-bind="source: currencyList, value: customer.currency_code, events:{change: currencyChange}"
		              				data-option-label="(--- ជ្រើសរើស ---)"
		              				required data-required-msg="ត្រូវការ រូបិយ​ប័ណ្ណ"></select>
				        </div>
						<div class="span3">
							<label for="ar">គណនីអតិថិជន <span style="color:red">*</span></label>
				            <select id="ar" name="ar" data-role="dropdownlist" 
				            		data-text-field="name" data-value-field="id" data-value-primitive="true" 
		            				data-bind="source: accountReceiveableList, value: customer.account_receiveable_id" 
		            				data-option-label="(--- ជ្រើសរើស ---)"	            				
		            				required data-required-msg="ត្រូវការ គណនីចំណូល"></select>
						</div>
						<div class="span3">
							<label for="revenueAccount">គណនីចំណូល <span style="color:red">*</span></label>
				            <select id="revenueAccount" name="revenueAccount" data-role="dropdownlist" 
				            		data-text-field="name" data-value-field="id" data-value-primitive="true"
		            				data-bind="source: revenueAccountList, value: customer.revenue_account_id"	            				
		            				data-option-label="(--- ជ្រើសរើស ---)"	            				 
		            				required data-required-msg="ត្រូវការ គណនីចំណូល"></select>
						</div>
						<div class="span3" data-bind="visible: isCompany">
							<label for="vatNo">លេខ VAT</label>								
		            		<input id="vatNo" name="vatNo" class="k-textbox" data-bind="value: customer.vat_no" 
									placeholder="e.g. 01234567897">												
						</div>					
					</div>			

					<br>
					<div class="separator line bottom"></div>
					<h4>ពត័មានភ្ជាប់ចរន្តអគ្គីសនី</h4>	
					<br>
					<div class="row-fluid">									
						<div class="span3">						
				            <label width="150px">តំបន់ <span style="color:red">*</span></label>			            
				            <select id="transformer" name="transformer" data-role="dropdownlist" 
	              				data-text-field="transformer_number" data-value-field="id" 
	              				data-value-primitive="true" 
	              				data-bind="source: transformerList, value: customer.transformer_id"
	              				data-option-label="(--- ជ្រើសរើស ---)"
	              				required data-required-msg="ត្រូវការ តំបន់"></select>	
				        </div>
						<div class="span3">
							<label>តំលៃលក់ <span style="color:red">*</span></label>
				            <select id="tariff_plan" name="tariff_plan" data-role="dropdownlist" 
	                			data-text-field="name" data-value-field="id" data-value-primitive="true"
	                			data-bind="enabled: customer.use_electricity, source: tariffPlanList, value: customer.tariff_plan_id" data-option-label="(--- ជ្រើសរើស ---)"
	                			required data-required-msg="ត្រូវការ ផែនការតំលៃលក់"></select>
						</div>						
						<div class="span3">
							<label for="vatNo">បញ្ចុះតំលៃ</label>								
		            		<select id="exemption" name="exemption" data-role="dropdownlist" 
	                			data-text-field="name" data-value-field="id" data-value-primitive="true"
	                			data-bind="enabled: customer.use_electricity, source: exemptionList, value: customer.exemption_id" 
	                			data-option-label="(--- ជ្រើសរើស ---)"></select>												
						</div>
						<div class="span3">
							
						</div>					
					</div>

					<br>
					<div class="separator line bottom"></div>

					<div class="row-fluid">	
						<div class="span3">
							<label>អាំងតង់សុីតេ <span style="color:red">*</span></label>
				            <select id="ampere" name="ampere" data-role="dropdownlist" 
	                			data-text-field="name" data-value-field="id" data-value-primitive="true"
	                			data-bind="enabled: customer.use_electricity, source: ampereList, value: customer.ampere_id" data-option-label="(--- ជ្រើសរើស ---)"
	                			required data-required-msg="ត្រូវការ អាំងតង់សុីតេ"></select>
						</div>								
						<div class="span3">						
				            <label width="150px">ចំនួនហ្វា <span style="color:red">*</span></label>			            
				            <select id="phase" name="phase" data-role="dropdownlist" 
	                			data-text-field="name" data-value-field="id" data-value-primitive="true"
	                			data-bind="enabled: customer.use_electricity, source: phaseList, value: customer.phase_id" data-option-label="(--- ជ្រើសរើស ---)"
	                			required data-required-msg="ត្រូវការ ចំនួនហ្វា"></select>	
				        </div>						
						<div class="span3">
							<label>តុងស្យុង <span style="color:red">*</span></label>
				            <select id="voltage" name="voltage" data-role="dropdownlist" 
	                			data-text-field="name" data-value-field="id" data-value-primitive="true"
	                			data-bind="enabled: customer.use_electricity, source: voltageList, value: customer.voltage_id" data-option-label="(--- ជ្រើសរើស ---)"
	                			required data-required-msg="ត្រូវការ តុងស្យុង"></select>
						</div>											
					</div>
					<br>			
					<!-- // Inner Tabs -->
					<div class="row-fluid">								
						<div class="box-generic">
						    <!-- //Tabs Heading -->
						    <div class="tabsbar tabsbar-2">
						        <ul class="row-fluid row-merge">					            					            
						            <li class="span2 glyphicons circle_info active">
						            	<a href="#tab1" data-toggle="tab"><i></i> <span>ពត័មានផ្សេងៗ</span></a>
						            </li>						           					            					            
						            <li class="span2 glyphicons phone">
						            	<a href="#tab4" data-toggle="tab"><i></i> <span>ទំនាក់ទំនង</span></a>
						            </li>
						            <li class="span2 glyphicons home">
						            	<a href="#tab5" data-toggle="tab"><i></i> <span>អាសយដ្ឋាន</span></a>
						            </li>								            
						        </ul>
						    </div>
						    <!-- // Tabs Heading END -->

						    <div class="tab-content">					        

						        <!-- //OTHER INFO -->
						        <div class="tab-pane active" id="tab1">
					            	<table width="100%" cellpadding="5" cellspacing="5">						            	
					            		<tr>
							                <td>ស្ថានភាព <span style="color:red">*</span></td>
							              	<td>
							              		<input id="peopleStatus" name="peopleStatus" data-role="dropdownlist"
								            		data-text-field="name"
					           						data-value-field="id"
					           						data-value-primitive="true" 
								            		data-bind="source: statusList, value: customer.status"					            							            		
								            		data-option-label="(--- ជ្រើសរើស ---)"
								            		required data-required-msg="ត្រូវការ ស្ថានភាព" />
							              	</td>
							              	<td>លេខអត្តសញ្ញាណប័ណ្ណ</td>
							              	<td><input id="card_number" class="k-textbox" data-bind="value: customer.card_number" placeholder="e.g. 123456789" /></td>								            	
							            </tr>
							            <tr>
							              	<td>ភេទ</td>
							              	<td><select data-role="dropdownlist" data-bind="source: genders, value: customer.gender"></select></td>
							              	<td>សមាជិកគ្រួសារ</td>
							              	<td><input id="family_member" class="k-textbox" data-bind="value: customer.family_member" placeholder="e.g. 3" /></td>
							            </tr>
							            <tr>
							            	<td>ថ្ងៃកំណើត</td>
							              	<td><input id="dob" data-role="datepicker" data-bind="value: customer.dob" data-format="dd-MM-yyyy" placeholder="ថ្ងែ-ខែ-ឆ្នាំ" /></td>									              	
							              	<td>មុខរបរ</td>
							              	<td><input id="job" class="k-textbox" data-bind="value: customer.job" placeholder="e.g. គ្រូបង្រៀន" /></td>
							            </tr>
							            <tr valign="top">
							              	<td>ទីកន្លែងកំណើត</td>
							              	<td><input id="pob" class="k-textbox" data-bind="value: customer.pob" placeholder="e.g. ផ្ទះ ផ្លូវ ភូមិ សង្កាត់ ខណ្ឌ" />						            
							            	<td>សំគាល់</td>
							              	<td><input class="k-textbox" data-bind="value: customer.memo" placeholder="..." /></td>									              							              									              	
							            </tr>								            								            								            			            
							        </table>
					        	</div>
						        <!-- // OTHER INFO END -->					      				       

						        <!-- //CONTACT -->
						        <div class="tab-pane" id="tab4">
					            	<table width="100%" cellpadding="5" cellspacing="5">
										<tr valign="top">													
											<td>
												<div class="input-prepend">
													<span class="add-on glyphicons phone"><i></i></span>
													<input type="tel" id="inputPhone" class="input-large" placeholder="លេខទូរស័ព្ទ" data-bind="value: customer.phone">
												</div>
											</td>													
											<td>
												<div class="input-prepend">
													<span class="add-on glyphicons google_maps"><i></i></span>
													<input type="tel" id="inputPhone" class="input-large" placeholder="latitute" data-bind="value: customer.latitute">
												</div>
											</td>										
										</tr>
										<tr valign="top">													
											<td>
												<div class="input-prepend">
													<span class="add-on glyphicons envelope"><i></i></span>
													<input type="email" id="inputEmail" class="input-large" placeholder="អីុម៉ែល" data-bind="value: customer.email">
												</div>
											</td>
											<td>
												<div class="input-prepend">
													<span class="add-on glyphicons pinboard"><i></i></span>
													<input type="tel" id="inputPhone" class="input-large" placeholder="longtitute" data-bind="value: customer.longtitute">
												</div>
											</td>																				
										</tr>
										<tr>
											<td>
												<div class="input-prepend">
													<span class="add-on glyphicons globe_af"><i></i></span>
													<input type="text" id="inputZipCode" class="input-large" placeholder="zip code" data-bind="value: customer.zip_code">
												</div>
											</td>
											<td></td>
										</tr>																																									
									</table>
						        </div>
						        <!-- // CONTACT END -->

						        <!-- //ADDRESS -->
						        <div class="tab-pane" id="tab5">
					            	<table width="100%" cellpadding="5" cellspacing="5">
										<tr valign="top">													
											<td>
												<div class="input-prepend">
													<span class="add-on glyphicons home"><i></i></span>
													<input type="text" id="inputAddress1" class="input-large" placeholder="អាសយដ្ឋាន ១" data-bind="value: customer.address">
												</div>														
											</td>										
											<td>ខេត្ត/រាជធានី</td>
											<td>
												<select id="province" data-bind="value: customer.province_id"></select>
											</td>
										</tr>
										<tr valign="top">													
											<td>
												<div class="input-prepend">
													<span class="add-on glyphicons home"><i></i></span>
													<input type="text" id="inputAddress2" class="input-large" placeholder="អាសយដ្ឋាន ២" data-bind="value: customer.address2">
												</div>														
											</td>										
											<td>ស្រុក/ខណ្ឌ</td>
											<td>
												<select id="district" data-bind="value: customer.district_id"></select>
											</td>
										</tr>
										<tr valign="top">													
											<td>
												<div class="input-prepend">
													<span class="add-on glyphicons home"><i></i></span>
													<input type="text" id="inputAddress3" class="input-large" placeholder="អាសយដ្ឋាន ៣" data-bind="value: customer.address3">
												</div>														
											</td>										
											<td>ឃុំ/សង្កាត់</td>
											<td>
												<select id="commune" data-bind="value: customer.commune_id"></select>
											</td>											
										</tr>
										<tr valign="top">													
											<td>
												<div class="input-prepend">
													<span class="add-on glyphicons home"><i></i></span>
													<input type="text" id="inputAddress4" class="input-large" placeholder="អាសយដ្ឋាន ៤" data-bind="value: customer.address4">
												</div>														
											</td>										
											<td>ភូមិ/ក្រុម</td>
											<td>
												<select id="village" data-bind="value: customer.village_id"></select>
											</td>
										</tr>																							
									</table>
						        </div>
						        <!-- // ADDRESS END -->					        								        

						    </div>
						</div>
					</div>											
					
					<!-- //Form actions -->
					<div align="center">
						<div id="status"></div>								
						<button id="save" type="submit" class="btn btn-icon btn-primary glyphicons circle_ok"><i></i> កត់ត្រា</button>
					</div>
					<!-- // Form actions END -->							
				</div> <!-- // End div example-->  
			</div> <!-- // End div span12-->
		</div>		
	</div> <!-- // End div row-fluid-->	
</script>
<script id="wCustomer" type="text/x-kendo-template">	
	<div class="row-fluid">
	    <div class="container-960"> 
			<div class="span12">			
				<div id="example" class="k-content">						
					<div align="right">			        				        	
				    	<button id="closeX" type="button" aria-hidden="true">X</button>			        	
					</div>
					<h3 id="title" align="center"></h3>	
					<br>
					<div class="row-fluid">
						<div class="span3">										
							<label for="company">អាជ្ញាបណ្ណ <span style="color:red">*</span></label>						
							<select id="company" name="company" data-role="dropdownlist" 
		              				data-text-field="abbr" data-value-field="id" 
		              				data-value-primitive="true" 
		              				data-bind="source: companyList, value: customer.company_id, events:{ change: companyChanges }"
		              				data-option-label="(--- ជ្រើសរើស ---)"
		              				required data-required-msg="ត្រូវការ អាជ្ញាបណ្ណ"></select>						
						</div>							
						<div class="span3">											
							<label for="customerType">ប្រភេទអតិថិជន <span style="color:red">*</span></label>
							<select id="customerType" name="customerType" data-role="dropdownlist" 
		              				data-text-field="name" data-value-field="id" 
		              				data-value-primitive="true" 
		              				data-bind="source: peopleTypeList, value: customer.people_type_id, events:{ change: peopleTypeChange }"
		              				data-option-label="(--- ជ្រើសរើស ---)"
		              				required data-required-msg="ត្រូវការ ប្រភេទអតិថិជន"></select>			            
						</div>
						<div class="span3">
							<label for="classes">Class <span style="color:red">*</span></label>
				            <select id="classes" name="classes" data-role="dropdownlist" 
		              				data-text-field="name" data-value-field="id" data-value-primitive="true" 
		              				data-bind="source: classList, value: customer.class_id"
		              				data-option-label="(--- ជ្រើសរើស ---)"
		              				required data-required-msg="ត្រូវការ Class"></select>
						</div>					
						<div class="span3">
							<label for="registered_date">ថ្ងៃចុះឈ្មោះ <span style="color:red">*</span></label>
				            <input id="registered_date" name="registered_date" 
				            		data-role="datepicker"			            		
	            					data-bind="value: customer.registered_date" 
	            					data-format="dd-MM-yyyy"
	            					data-parse-formats="yyyy-MM-dd" 
	            					placeholder="ថ្ងែ-ខែ-ឆ្នាំ" required data-required-msg="ត្រូវការ ថ្ងៃចុះឈ្មោះ" />
						</div>																
					</div>						

					<br>
					<div class="separator line bottom"></div>

					<div class="row-fluid">									
						<div class="span3">						
							<label for="number">លេខកូដ <span style="color:red">*</span></label>
	              			<input id="number" name="number" class="k-textbox"
		              				data-bind="value: customer.number, events: { change: checkExistingNumber }" 
		              				placeholder="e.g. AB0001" required data-required-msg="ត្រូវការ លេខកូដ" />
		              		<span data-bind="visible: isDuplicateNumber" style="color: red;">លេខកូដនេះបានប្រើប្រាស់រូចហើយ</span>
						</div>
						<div class="span3">
							<label for="surname">គោត្តនាម <span style="color:red">*</span></label>
		              		<input id="surname" name="surname" class="k-textbox" data-bind="value: customer.surname" 
				              		placeholder="ត្រកូល" required data-required-msg="ត្រូវការ គោត្តនាម" />
						</div>
						<div class="span3">							
							<label for="name">នាម <span style="color:red">*</span></label>
				            <input id="name" name="name" class="k-textbox" data-bind="value: customer.name" 
				              		placeholder="ឈ្មោះ" required data-required-msg="ត្រូវការ នាម" />
						</div>
						<div class="span3" data-bind="visible: isCompany">
							<label for="companyName">ក្រុមហ៊ុន <span style="color:red">*</span></label>
							<input id="companyName" name="companyName" class="k-textbox" data-bind="enabled: isCompany, value: customer.company" 
									required data-required-msg="ត្រូវការ ក្រុមហ៊ុន"
									placeholder="e.g. PCG & Partner" />	
						</div>										
					</div>

					<br>
					<div class="separator line bottom"></div>

					<div class="row-fluid">					
						<div class="span3">						
				            <label for="currencyCBB">រូបិយ​ប័ណ្ណ <span style="color:red">*</span></label>			            
				            <select id="classes" name="classes" data-role="dropdownlist" 
		              				data-text-field="name" data-value-field="code" 
		              				data-value-primitive="true" 
		              				data-bind="source: currencyList, value: customer.currency_code, events:{change: currencyChange}"
		              				data-option-label="(--- ជ្រើសរើស ---)"
		              				required data-required-msg="ត្រូវការ រូបិយ​ប័ណ្ណ"></select>
				        </div>
						<div class="span3">
							<label for="ar">គណនីអតិថិជន <span style="color:red">*</span></label>
				            <select id="ar" name="ar" data-role="dropdownlist" 
				            		data-text-field="name" data-value-field="id" data-value-primitive="true" 
		            				data-bind="source: accountReceiveableList, value: customer.account_receiveable_id" 
		            				data-option-label="(--- ជ្រើសរើស ---)"	            				
		            				required data-required-msg="ត្រូវការ គណនីចំណូល"></select>
						</div>
						<div class="span3">
							<label for="revenueAccount">គណនីចំណូល <span style="color:red">*</span></label>
				            <select id="revenueAccount" name="revenueAccount" data-role="dropdownlist" 
				            		data-text-field="name" data-value-field="id" data-value-primitive="true"
		            				data-bind="source: revenueAccountList, value: customer.revenue_account_id"	            				
		            				data-option-label="(--- ជ្រើសរើស ---)"	            				 
		            				required data-required-msg="ត្រូវការ គណនីចំណូល"></select>
						</div>
						<div class="span3" data-bind="visible: isCompany">
							<label for="vatNo">លេខ VAT</label>								
		            		<input id="vatNo" name="vatNo" class="k-textbox" data-bind="value: customer.vat_no" 
									placeholder="e.g. 01234567897">												
						</div>					
					</div>

					<br>
					<div class="separator line bottom"></div>
					<h4>ពត័មានភ្ជាប់បណ្ដាញទឹកស្អាត</h4>	
					<br>
					<div class="row-fluid">					
						<div class="span3">						
				            <label>តំបន់ <span style="color:red">*</span></label>			            
				            <select id="area" name="area" data-role="dropdownlist" 
	              				data-text-field="transformer_number" data-value-field="id" 
	              				data-value-primitive="true" 
	              				data-bind="source: areaList, value: customer.wtransformer_id"
	              				data-option-label="(--- ជ្រើសរើស ---)"
	              				required data-required-msg="ត្រូវការ តំបន់"></select>
				        </div>
						<div class="span3">
							<label>តំលៃលក់ <span style="color:red">*</span></label>
				            <select id="tariff_plan" name="tariff_plan" data-role="dropdownlist" 
	                			data-text-field="name" data-value-field="id" data-value-primitive="true"
	                			data-bind="source: tariffPlanList, value: customer.wtariff_plan_id" data-option-label="(--- ជ្រើសរើស ---)"
	                			required data-required-msg="ត្រូវការ ផែនការតំលៃលក់"></select>
						</div>
						<div class="span3">
							<label>បញ្ចុះតំលៃ <span style="color:red">*</span></label>
				            <select id="exemption" name="exemption" data-role="dropdownlist" 
	                			data-text-field="name" data-value-field="id" data-value-primitive="true"
	                			data-bind="source: exemptionList, value: customer.wexemption_id" 
	                			data-option-label="(--- ជ្រើសរើស ---)"></select>
						</div>
						<div class="span3">
							<label>ថែទាំ</label>								
		            		<select id="maintenance" name="maintenance" data-role="dropdownlist" 
	                			data-text-field="name" data-value-field="id" data-value-primitive="true"
	                			data-bind="source: maintenanceList, value: customer.wmaintenance_id" 
	                			data-option-label="(--- ជ្រើសរើស ---)"></select>											
						</div>					
					</div>				
					<br>
					<!-- // Inner Tabs -->
					<div class="row-fluid">								
						<div class="box-generic">
						    <!-- //Tabs Heading -->
						    <div class="tabsbar tabsbar-2">
						        <ul class="row-fluid row-merge">					            					            
						            <li class="span2 glyphicons circle_info active">
						            	<a href="#tab1" data-toggle="tab"><i></i> <span>ពត័មានផ្សេងៗ</span></a>
						            </li>					           					            
						            <li class="span2 glyphicons phone">
						            	<a href="#tab4" data-toggle="tab"><i></i> <span>ទំនាក់ទំនង</span></a>
						            </li>
						            <li class="span2 glyphicons home">
						            	<a href="#tab5" data-toggle="tab"><i></i> <span>អាសយដ្ឋាន</span></a>
						            </li>								            
						        </ul>
						    </div>
						    <!-- // Tabs Heading END -->

						    <div class="tab-content">					        

						        <!-- //OTHER INFO -->
						        <div class="tab-pane active" id="tab1">
					            	<table width="100%" cellpadding="5" cellspacing="5">						            	
					            		<tr>
							                <td>ស្ថានភាព <span style="color:red">*</span></td>
							              	<td>
							              		<input id="peopleStatus" name="peopleStatus" data-role="dropdownlist"
								            		data-text-field="name"
					           						data-value-field="id"
					           						data-value-primitive="true" 
								            		data-bind="source: statusList, value: customer.status"					            							            		
								            		data-option-label="(--- ជ្រើសរើស ---)"
								            		required data-required-msg="ត្រូវការ ស្ថានភាព" />
							              	</td>
							              	<td>លេខអត្តសញ្ញាណប័ណ្ណ</td>
							              	<td><input id="card_number" class="k-textbox" data-bind="value: customer.card_number" placeholder="e.g. 123456789" /></td>								            	
							            </tr>
							            <tr>
							              	<td>ភេទ</td>
							              	<td><select data-role="dropdownlist" data-bind="source: genders, value: customer.gender"></select></td>
							              	<td>សមាជិកគ្រួសារ</td>
							              	<td><input id="family_member" class="k-textbox" data-bind="value: customer.family_member" placeholder="e.g. 3" /></td>
							            </tr>
							            <tr>
							            	<td>ថ្ងៃកំណើត</td>
							              	<td><input id="dob" data-role="datepicker" data-bind="value: customer.dob" data-format="dd-MM-yyyy" placeholder="ថ្ងែ-ខែ-ឆ្នាំ" /></td>									              	
							              	<td>មុខរបរ</td>
							              	<td><input id="job" class="k-textbox" data-bind="value: customer.job" placeholder="e.g. គ្រូបង្រៀន" /></td>
							            </tr>
							            <tr valign="top">
							              	<td>ទីកន្លែងកំណើត</td>
							              	<td><input id="pob" class="k-textbox" data-bind="value: customer.pob" placeholder="e.g. ផ្ទះ ផ្លូវ ភូមិ សង្កាត់ ខណ្ឌ" />						            
							            	<td>សំគាល់</td>
							              	<td><input class="k-textbox" data-bind="value: customer.memo" placeholder="..." /></td>									              							              									              	
							            </tr>								            								            								            			            
							        </table>
					        	</div>
						        <!-- // OTHER INFO END -->	

						        <!-- //CONTACT -->
						        <div class="tab-pane" id="tab4">
					            	<table width="100%" cellpadding="5" cellspacing="5">
										<tr valign="top">													
											<td>
												<div class="input-prepend">
													<span class="add-on glyphicons phone"><i></i></span>
													<input type="tel" id="inputPhone" class="input-large" placeholder="លេខទូរស័ព្ទ" data-bind="value: customer.phone">
												</div>
											</td>													
											<td>
												<div class="input-prepend">
													<span class="add-on glyphicons google_maps"><i></i></span>
													<input type="tel" id="inputPhone" class="input-large" placeholder="latitute" data-bind="value: customer.latitute">
												</div>
											</td>										
										</tr>
										<tr valign="top">													
											<td>
												<div class="input-prepend">
													<span class="add-on glyphicons envelope"><i></i></span>
													<input type="email" id="inputEmail" class="input-large" placeholder="អីុម៉ែល" data-bind="value: customer.email">
												</div>
											</td>
											<td>
												<div class="input-prepend">
													<span class="add-on glyphicons pinboard"><i></i></span>
													<input type="tel" id="inputPhone" class="input-large" placeholder="longtitute" data-bind="value: customer.longtitute">
												</div>
											</td>																				
										</tr>
										<tr>
											<td>
												<div class="input-prepend">
													<span class="add-on glyphicons globe_af"><i></i></span>
													<input type="text" id="inputZipCode" class="input-large" placeholder="zip code" data-bind="value: customer.zip_code">
												</div>
											</td>
											<td></td>
										</tr>																																									
									</table>
						        </div>
						        <!-- // CONTACT END -->

						        <!-- //ADDRESS -->
						        <div class="tab-pane" id="tab5">
					            	<table width="100%" cellpadding="5" cellspacing="5">
										<tr valign="top">													
											<td>
												<div class="input-prepend">
													<span class="add-on glyphicons home"><i></i></span>
													<input type="text" id="inputAddress1" class="input-large" placeholder="អាសយដ្ឋាន ១" data-bind="value: customer.address">
												</div>														
											</td>										
											<td>ខេត្ត/រាជធានី</td>
											<td>
												<select id="province" data-bind="value: customer.province_id"></select>
											</td>
										</tr>
										<tr valign="top">													
											<td>
												<div class="input-prepend">
													<span class="add-on glyphicons home"><i></i></span>
													<input type="text" id="inputAddress2" class="input-large" placeholder="អាសយដ្ឋាន ២" data-bind="value: customer.address2">
												</div>														
											</td>										
											<td>ស្រុក/ខណ្ឌ</td>
											<td>
												<select id="district" data-bind="value: customer.district_id"></select>
											</td>
										</tr>
										<tr valign="top">													
											<td>
												<div class="input-prepend">
													<span class="add-on glyphicons home"><i></i></span>
													<input type="text" id="inputAddress3" class="input-large" placeholder="អាសយដ្ឋាន ៣" data-bind="value: customer.address3">
												</div>														
											</td>										
											<td>ឃុំ/សង្កាត់</td>
											<td>
												<select id="commune" data-bind="value: customer.commune_id"></select>
											</td>											
										</tr>
										<tr valign="top">													
											<td>
												<div class="input-prepend">
													<span class="add-on glyphicons home"><i></i></span>
													<input type="text" id="inputAddress4" class="input-large" placeholder="អាសយដ្ឋាន ៤" data-bind="value: customer.address4">
												</div>														
											</td>										
											<td>ភូមិ/ក្រុម</td>
											<td>
												<select id="village" data-bind="value: customer.village_id"></select>
											</td>
										</tr>																							
									</table>
						        </div>
						        <!-- // ADDRESS END -->					        								        

						    </div>
						</div>
					</div>											
					
					<!-- //Form actions -->
					<div align="center">
						<div id="status"></div>								
						<button id="save" type="submit" class="btn btn-icon btn-primary glyphicons circle_ok"><i></i> កត់ត្រា</button>
					</div>
					<!-- // Form actions END -->							
				</div> <!-- // End div example-->  
			</div> <!-- // End div span12-->
		</div>		
	</div> <!-- // End div row-fluid-->	
</script>

<!-- Invoice -->
<script id="invoice" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="container-960">
			<div class="row-fluid">
			<div class="span12">
				<div id="example" class="k-content">									
					<div align="right">			        				        	
			        	<button type="button" aria-hidden="true" data-bind="click:closeX">X</button>			        	
					</div>
					<h3 align="center">វិក្កយបត្រ</h3>		        						
					
					<div class="row-fluid">
						<div class="span4">				
							<table cellpadding="2" cellspacing="2">					          
								<tr data-bind="visible: isEdit">				
									<td>លេខវិក្ក​យបត្រ</td>
									<td><input class="k-textbox" data-bind="value: invoice.number" style="width:140px;" readonly /></td>
								</tr>								           
								<tr>
									<td colspan="2">
										អាសយដ្ឋាន
										<br>
										<textarea id="address" cols="0" rows="2" class="k-textbox" style="width:250px" data-bind="value: invoice.address"></textarea>
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
							<table cellpadding="2" cellspacing="2" align="right">
								<tr>
									<td>ថ្ងៃចេញវិក្កយបត្រ</td>
									<td>
										<input id="issuedDate" name="issuedDate" data-role="datepicker" 
												data-bind="value: invoice.issued_date" data-format="dd-MM-yyyy" 
												required data-required-msg="ត្រូវការ ថ្ងៃចេញវិក្កយបត្រ" />
									</td>
								</tr>	
								<tr>
					                <td>កាលកំណត់</td>
					              	<td>
					              		<select data-role="dropdownlist" 
					              				data-text-field="term" data-value-field="id"
					              				data-auto-bind="false"
					              				data-value-primitive="true",					              								              				
					              				data-bind="source: paymentTermList, value: invoice.payment_term_id" 
					              				data-option-label="(--- ជ្រើសរើស ---)"></select>
					              	</td>
					            </tr>				
								<tr>
									<td>ថ្ងៃបង់ប្រាក់</td>
									<td>
										<input id="dueDate" name="dueDate" data-role="datepicker" 
												data-bind="value: invoice.due_date" data-format="dd-MM-yyyy"
												required data-required-msg="ត្រូវការ ថ្ងៃបង់ប្រាក់" />
									</td>
								</tr>													
					            <tr>
					            	<td>
					            		<select data-role="dropdownlist"
					            			data-value-primitive="true"					            			 
					            			data-bind="value: invoice.reference_type, events:{change: loadReference}"
					            			data-option-label="(-- ទាញពី ---)" 
					            			style="width: 120px">
										 	<option value="Estimate">សម្រង់តម្លៃ</option>
										  	<option value="SO">បញ្ជាលក់</option>
										  	<option value="GDN">លិខិតដឹកជញ្ជូន</option>										  	
										</select>					            		
					            	</td>				
									<td>
										<select data-role="dropdownlist"
												data-text-field="number" 
					              				data-value-field="id"
					              				data-auto-bind="false"
					              				data-value-primitive="true" 
					              				data-bind="source: referenceList, value: invoice.reference_id,
					              							enabled: bolReference,
					              							events:{change: referenceChange}" 
					              				data-option-label="(--- ជ្រើសរើស ---)"></select>
									</td>
								</tr>								
							</table>           		          	
					    </div>
					</div>								
					
					<div id="grid" data-role="grid" 
							data-bind="source: invoiceItemList"
						    data-auto-bind="false"	        
						    data-row-template="invoice-row-template"						                           
						    data-columns='[{ title: "", width: 20 },
						       	{ title: "ល.រ", width: 35 },
						           { title: "ទំនិញ", width: 200 },	                     
						           { title: "ពណ៌នា", width: 200 },
						           { title: "ចំនួន", width: 85 },
						           { title: "តំលៃ", width: 115 },	            
						           { title: "ទឹកប្រាក់", width: 80 },
						           { title: "vat", width: 30 }	                    	                    
						           ]'>
					</div>
					<button class="btn btn-inverse" data-bind="click: addNewRow"><i class="icon-plus icon-white"></i></button>
					
					<br>
					
					<div class="row-fluid">				
						<div class="span8">
							សំគាល់:
							<br>
							<textarea id="memo" cols="0" rows="2" class="k-textbox" style="width:250px" data-bind="value: invoice.memo" placeholder="សំគាល់ 1 (សំរាប់អតិថិជន)"></textarea>
							<textarea id="memo2" cols="0" rows="2" class="k-textbox" style="width:250px" data-bind="value: invoice.memo2" placeholder="សំគាល់ 2 (សំរាប់ផ្ទៃក្នុង)"></textarea>
						</div>

						<div class="span4">
							<table width="100%">								
								<tr align="right">
									<td>សរុបរង:</td>
									<td width="50%"><span data-bind="text: sub_total"></span></td>
								</tr>								
								<tr align="right">
									<td align="top">
										<select data-role="dropdownlist" 
												data-text-field="name" data-value-field="id"
												data-value-primitive="true"
												data-auto-bind="false" 
												data-bind="source: vatList, value: invoice.vat_id, events: {change: change}" 
												data-option-label="រើស VAT" style="width:90px"></select>								
									</td>
									<td><span data-bind="text: invoice.vat"></span></td>
								</tr>
								<tr align="right">
									<td>សរុប:</td>
									<td bgcolor="#00BFFF"><span data-bind="text: invoice.amount"></span></td>
								</tr>						
							</table>
						</div>													
					</div>

					<br>

					<div class="row-fluid">				
						<div class="span12" align="right">
							<div id="status"></div>
							<span class="btn btn-primary btn-icon glyphicons print" data-bind="click: linkPrint, visible: isEdit"><i></i> បោះពុម្ព</span>						
							<button id="save" type="submit" class="btn btn-icon btn-primary glyphicons cart_in"><i></i> រៀបចំវិក្កយបត្រ</button>							
						</div>
					</div>
				</div>
			</div>
			</div>
		</div>
	</div>
</script>
<script id="receipt" type="text/x-kendo-template">
	<div class="container-960">
		<div class="row-fluid">
			<div class="span12">
				<div id="example" class="k-content">
					<div align="right">			        				        	
			        	<button type="button" aria-hidden="true" data-bind="click:closeX">X</button>		        	
					</div>
					<h3 align="center">បង្កាន់ដៃលក់</h3>			
					
					<div class="row-fluid">				
						<div class="span8">
							<table cellpadding="2" cellspacing="2">
								<tr data-bind="visible: isEdit">				
									<td>លេខបង្កាន់ដៃលក់</td>
									<td><input class="k-textbox" data-bind="value: invoice.number" style="width:138px;" readonly /></td>
								</tr>
								<tr>
									<td>កាលបរិច្ឆេទ</td>
									<td>
										<input id="issuedDate" name="issuedDate" data-role="datepicker" 
												data-bind="value: invoice.issued_date" data-format="dd-MM-yyyy" 
												required data-required-msg="ត្រូវការ កាលបរិច្ឆេទ" />
									</td>
								</tr>								    
								<tr>
									<td colspan="2">
										អាសយដ្ឋាន
										<br>
										<textarea id="address" cols="0" rows="2" class="k-textbox" style="width:250px" data-bind="value: invoice.address"></textarea>
									</td>
								</tr>
							</table>
						</div>

						<div class="span4">			
							<table cellpadding="2" cellspacing="2" align="right">					
								<tr>
					                <td>វីធីបង់ប្រាក់</td>
					              	<td>
					              		<select id="paymentMethod" name="paymentMethod" data-role="dropdownlist" 
					              				data-text-field="name" data-value-field="id"
					              				data-auto-bind="false"
					              				data-value-primitive="true" 
					              				data-bind="source: paymentMethodList, value: invoice.payment_method_id" 
					              				data-option-label="(--- ជ្រើសរើស ---)"
					              				required data-required-msg="ត្រូវការ វីធីបង់ប្រាក់"></select>
					              	</td>
					            <tr>
								<tr>
					                <td>លេខកូដសែក</td>
					                <td><input id="check_no" class="k-textbox" data-bind="value: invoice.check_no" /></td>
					            <tr>
					            <tr>
									<td>គណនីសាច់ប្រាក់</td>
									<td>
										<select id="cashAccount" name="cashAccount" data-role="combobox" 
												data-text-field="name" data-value-field="id"
												data-value-primitive="true" 
												data-bind="source: cashAccountList, value: invoice.cash_account_id"
												required data-required-msg="ត្រូវការ គណនីសាច់ប្រាក់"></select>
									</td>
								</tr>								
								<tr>
					            	<td>
					            		<select data-role="dropdownlist"
					            			data-value-primitive="true"					            			 
					            			data-bind="value: invoice.reference_type, events:{change: loadReference}"
					            			data-option-label="(-- ទាញពី ---)"
					            			style="width: 120px">
										 	<option value="Estimate">សម្រង់តម្លៃ</option>
										  	<option value="SO">បញ្ជាលក់</option>
										  	<option value="GDN">លិខិតដឹកជញ្ជូន</option>									  	
										</select>					            		
					            	</td>				
									<td>
										<select data-role="dropdownlist"
												data-text-field="number" 
					              				data-value-field="id"
					              				data-auto-bind="false"
					              				data-value-primitive="true" 
					              				data-bind="source: referenceList, value: invoice.reference_id, 
					              							enabled: bolReference,
					              							events:{change: referenceChange}" 
					              				data-option-label="(--- ជ្រើសរើស ---)"></select>
									</td>
								</tr>
							</table>           		          	
					    </div>			    			
					</div>			

					<div id="grid" data-role="grid" 
						data-bind="source: invoiceItemList"
				        data-auto-bind="false" 
				        data-row-template="invoice-row-template"                  
				        data-columns='[{ title: "", width: 20 },
				        	{ title: "ល.រ", width: 35 },
				            { title: "ទំនិញ", width: 200 },	                     
				            { title: "ពណ៌នា", width: 200 },
				            { title: "ចំនួន", width: 85 },
				            { title: "តំលៃ", width: 115 },		            
				            { title: "ទឹកប្រាក់", width: 80 },
				            { title: "vat", width: 30 }	                    	                    
				            ]'>
					</div>
					<button class="btn btn-inverse" data-bind="click: addNewRow"><i class="icon-plus icon-white"></i></button>
					
					<div class="row-fluid">				
						<div class="span8">
							សំគាល់:
							<br>
							<textarea id="memo" cols="0" rows="2" class="k-textbox" style="width:250px" data-bind="value: invoice.memo" placeholder="សំគាល់ 1 (សំរាប់អតិថិជន)"></textarea>
							<textarea id="memo2" cols="0" rows="2" class="k-textbox" style="width:250px" data-bind="value: invoice.memo2" placeholder="សំគាល់ 2 (សំរាប់ផ្ទៃក្នុង)"></textarea>
						</div>

						<div class="span4">
							<table width="100%">								
								<tr align="right">
									<td>សរុបរង:</td>
									<td width="50%"><span data-bind="text: sub_total"></span></td>
								</tr>								
								<tr align="right">
									<td align="top">
										<select data-role="dropdownlist" 
												data-text-field="name" data-value-field="id"
												data-value-primitive="true"
												data-auto-bind="false" 
												data-bind="source: vatList, value: invoice.vat_id, events: {change: change}" 
												data-option-label="រើស VAT" style="width:90px"></select>								
									</td>
									<td><span data-bind="text: invoice.vat"></span></td>
								</tr>
								<tr align="right">
									<td>សរុប:</td>
									<td bgcolor="#00BFFF"><span data-bind="text: invoice.amount"></span></td>
								</tr>						
							</table>
						</div>													
					</div>

					<br>

					<div class="row-fluid">				
						<div class="span12" align="right">
							<div id="status"></div>
							<span class="btn btn-primary btn-icon glyphicons print" data-bind="click: linkPrint, visible: isEdit"><i></i> បោះពុម្ព</span>						
							<button id="save" type="submit" class="btn btn-icon btn-primary glyphicons cart_in"><i></i> រៀបចំបង្កាន់ដៃ</button>
						</div>
					</div>		
				</div><!-- //End div example-->
			</div><!-- //End div span12-->
		</div><!-- //End div row-fluid-->
	</div>
</script>
<script id="estimate" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="container-960">
			<div class="row-fluid">
			<div class="span12">
				<div id="example" class="k-content">
					<div align="right">			        				        	
			        	<button type="button" aria-hidden="true" data-bind="click:closeX">X</button>			        	
					</div>
					<h3 align="center">សម្រង់តម្លៃ</h3>
									
					<div class="row-fluid">
						<div class="span4">				
							<table cellpadding="2" cellspacing="2">					          
								<tr data-bind="visible: isEdit">				
									<td>លេខសម្រង់តម្លៃ</td>
									<td><input class="k-textbox" data-bind="value: invoice.number" style="width:140px;" readonly /></td>
								</tr>								      
								<tr>
									<td colspan="2">
										អាសយដ្ឋាន
										<br>
										<textarea id="address" cols="0" rows="2" class="k-textbox" style="width:250px" data-bind="value: invoice.address"></textarea>
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
							<table cellpadding="2" cellspacing="2" align="right">
								<tr>
									<td>កាលបរិច្ឆេទ</td>
									<td>
										<input id="issuedDate" name="issuedDate" data-role="datepicker" 
												data-bind="value: invoice.issued_date" data-format="dd-MM-yyyy" 
												required data-required-msg="ត្រូវការ កាលបរិច្ឆេទ" />
									</td>
								</tr>
							</table>	         		          	
					    </div>
					</div>
								
					<div id="grid" data-role="grid" 
						data-bind="source: invoiceItemList"
				        data-auto-bind="false"				        
				        data-row-template="invoice-row-template"				                        
				        data-columns='[{ title: "", width: 20 },
				        	{ title: "ល.រ", width: 35 },
				            { title: "ទំនិញ", width: 200 },	                     
				            { title: "ពណ៌នា", width: 200 },
				            { title: "ចំនួន", width: 85 },
				            { title: "តំលៃ", width: 115 },		            
				            { title: "ទឹកប្រាក់", width: 80 },
				            { title: "vat", width: 30 }	                    	                    
				            ]'>
					</div>
					<button class="btn btn-inverse" data-bind="click: addNewRow"><i class="icon-plus icon-white"></i></button>
					
					<br>
					
					<div class="row-fluid">				
						<div class="span8">
							សំគាល់:
							<br>
							<textarea id="memo" cols="0" rows="2" class="k-textbox" style="width:250px" data-bind="value: invoice.memo" placeholder="សំគាល់ 1 (សំរាប់អតិថិជន)"></textarea>
							<textarea id="memo2" cols="0" rows="2" class="k-textbox" style="width:250px" data-bind="value: invoice.memo2" placeholder="សំគាល់ 2 (សំរាប់ផ្ទៃក្នុង)"></textarea>
						</div>

						<div class="span4">
							<table width="100%">								
								<tr align="right">
									<td>សរុបរង:</td>
									<td width="50%"><span data-bind="text: sub_total"></span></td>
								</tr>								
								<tr align="right">
									<td align="top">
										<select data-role="dropdownlist" 
												data-text-field="name" data-value-field="id"
												data-value-primitive="true"
												data-auto-bind="false" 
												data-bind="source: vatList, value: invoice.vat_id, events: {change: change}" 
												data-option-label="រើស VAT" style="width:90px"></select>								
									</td>
									<td><span data-bind="text: invoice.vat"></span></td>
								</tr>
								<tr align="right">
									<td>សរុប:</td>
									<td bgcolor="#00BFFF"><span data-bind="text: invoice.amount"></span></td>
								</tr>						
							</table>
						</div>													
					</div>

					<br>

					<div class="row-fluid">				
						<div class="span12" align="right">
							<div id="status"></div>
							<span class="btn btn-primary btn-icon glyphicons print" data-bind="click: linkPrint, visible: isEdit"><i></i> បោះពុម្ព</span>						
							<button id="save" type="submit" class="btn btn-icon btn-primary glyphicons cart_in"><i></i> រៀបចំសម្រង់តម្លៃ</button>
						</div>
					</div>
				</div>
			</div>
			</div>
		</div>
	</div>
</script>
<script id="so" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="container-960">
			<div class="row-fluid">
			<div class="span12">
				<div id="example" class="k-content">
					<div align="right">			        				        	
			        	<button type="button" aria-hidden="true" data-bind="click:closeX">X</button>			        	
					</div>
					<h3 align="center">បញ្ជាលក់</h3>
									
					<div class="row-fluid">
						<div class="span4">				
							<table cellpadding="2" cellspacing="2">					          
								<tr data-bind="visible: isEdit">				
									<td>លេខបញ្ជាលក់</td>
									<td><input class="k-textbox" data-bind="value: invoice.number" style="width:140px;" readonly /></td>
								</tr>								   
								<tr>
									<td colspan="2">
										អាសយដ្ឋាន
										<br>
										<textarea id="address" cols="0" rows="2" class="k-textbox" style="width:250px" data-bind="value: invoice.address"></textarea>
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
							<table cellpadding="2" cellspacing="2" align="right">
								<tr>
									<td>កាលបរិច្ឆេទ</td>
									<td>
										<input id="issuedDate" name="issuedDate" data-role="datepicker" 
												data-bind="value: invoice.issued_date" data-format="dd-MM-yyyy" 
												required data-required-msg="ត្រូវការ កាលបរិច្ឆេទ" />
									</td>
								</tr>
								<tr>
									<td>ថ្ងៃរំពឹងទុក</td>
									<td>
										<input id="expectedDate" name="expectedDate" data-role="datepicker" 
												data-bind="value: invoice.expected_date" data-format="dd-MM-yyyy" 
												required data-required-msg="ត្រូវការ ថ្ងៃរំពឹងទុក" />
									</td>
								</tr>								
								<tr>
					            	<td>
					            		<select data-role="dropdownlist"					            			 
					            			data-bind="value: invoice.reference_type, events:{change: loadReference}"
					            			data-option-label="(-- ទាញពី ---)"
					            			data-value-primitive="true"
					            			style="width: 120px">
										 	<option value="Estimate">សម្រង់តម្លៃ</option>										  	
										  	<option value="GDN">លិខិតដឹកជញ្ជូន</option>										  	
										</select>					            		
					            	</td>				
									<td>
										<select data-role="dropdownlist"
												data-text-field="number" 
					              				data-value-field="id"
					              				data-value-primitive="true"
					              				data-auto-bind="false" 
					              				data-bind="source: referenceList, value: invoice.reference_id, 
					              							enabled: bolReference,
					              							events:{change: referenceChange}" 
					              				data-option-label="(--- ជ្រើសរើស ---)"></select>
									</td>
								</tr>
							</table>           		          	
					    </div>
					</div>
								
					<div id="grid" data-role="grid" 
						data-bind="source: invoiceItemList"
				        data-auto-bind="false"				        
				        data-row-template="invoice-row-template"				                        
				        data-columns='[{ title: "", width: 20 },
				        	{ title: "ល.រ", width: 35 },
				            { title: "ទំនិញ", width: 200 },	                     
				            { title: "ពណ៌នា", width: 200 },
				            { title: "ចំនួន", width: 85 },
				            { title: "តំលៃ", width: 115 },		            
				            { title: "ទឹកប្រាក់", width: 80 },
				            { title: "vat", width: 30 }	                    	                    
				            ]'>
					</div>
					<button class="btn btn-inverse" data-bind="click: addNewRow"><i class="icon-plus icon-white"></i></button>
					
					<br>
					
					<div class="row-fluid">				
						<div class="span8">
							សំគាល់:
							<br>
							<textarea id="memo" cols="0" rows="2" class="k-textbox" style="width:250px" data-bind="value: invoice.memo" placeholder="សំគាល់ 1 (សំរាប់អតិថិជន)"></textarea>
							<textarea id="memo2" cols="0" rows="2" class="k-textbox" style="width:250px" data-bind="value: invoice.memo2" placeholder="សំគាល់ 2 (សំរាប់ផ្ទៃក្នុង)"></textarea>
						</div>

						<div class="span4">
							<table width="100%">								
								<tr align="right">
									<td>សរុបរង:</td>
									<td width="50%"><span data-bind="text: sub_total"></span></td>
								</tr>								
								<tr align="right">
									<td align="top">
										<select data-role="dropdownlist" 
												data-text-field="name" data-value-field="id"
												data-value-primitive="true"
												data-auto-bind="false" 
												data-bind="source: vatList, value: invoice.vat_id, events: {change: change}" 
												data-option-label="រើស VAT" style="width:90px"></select>								
									</td>
									<td><span data-bind="text: invoice.vat"></span></td>
								</tr>
								<tr align="right">
									<td>សរុប:</td>
									<td bgcolor="#00BFFF"><span data-bind="text: invoice.amount"></span></td>
								</tr>						
							</table>
						</div>													
					</div>

					<br>

					<div class="row-fluid">				
						<div class="span12" align="right">
							<div id="status"></div>
							<span class="btn btn-primary btn-icon glyphicons print" data-bind="click: linkPrint, visible: isEdit"><i></i> បោះពុម្ព</span>						
							<button id="save" type="submit" class="btn btn-icon btn-primary glyphicons cart_in"><i></i> រៀបចំបញ្ជាលក់</button>
						</div>
					</div>
				</div>
			</div>
			</div>
		</div>
	</div>
</script>
<script id="gdn" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="container-960">
			<div class="row-fluid">
			<div class="span12">
				<div id="example" class="k-content">
					<div align="right">			        				        	
			        	<button type="button" aria-hidden="true" data-bind="click:closeX">X</button>			        	
					</div>
					<h3 align="center">លិខិតដឹកជញ្ជូន</h3>
									
					<div class="row-fluid">
						<div class="span4">				
							<table cellpadding="2" cellspacing="2">					          
								<tr data-bind="visible: isEdit">				
									<td>លេខលិខិតដឹកជញ្ជូន</td>
									<td><input class="k-textbox" data-bind="value: invoice.number" style="width:140px;" readonly /></td>
								</tr>								      
								<tr>
									<td colspan="2">
										អាសយដ្ឋាន
										<br>
										<textarea id="memo" cols="0" rows="2" class="k-textbox" style="width:250px" data-bind="value: invoice.address"></textarea>
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
							<table cellpadding="2" cellspacing="2" align="right">
								<tr>
									<td>កាលបរិច្ឆេទ</td>
									<td>
										<input id="issuedDate" name="issuedDate" data-role="datepicker" 
												data-bind="value: invoice.issued_date" data-format="dd-MM-yyyy" 
												required data-required-msg="ត្រូវការ កាលបរិច្ឆេទ" />
									</td>
								</tr>
								<tr>
					            	<td>
					            		<select data-role="dropdownlist"					            			 
					            			data-bind="value: invoice.reference_type, events:{change: loadReference}"
					            			data-option-label="(-- ទាញពី ---)"
					            			data-value-primitive="true" 
					            			style="width: 120px">										 	
										  	<option value="SO">បញ្ជាលក់</option>										  											  	
										</select>					            		
					            	</td>				
									<td>
										<select data-role="dropdownlist"
												data-text-field="number" 
					              				data-value-field="id"
					              				data-auto-bind="false"
					              				data-value-primitive="true" 
					              				data-bind="source: referenceList, value: invoice.reference_id, 
					              							enabled: bolReference,
					              							events:{change: referenceChange}" 
					              				data-option-label="(--- ជ្រើសរើស ---)"></select>
									</td>
								</tr>
							</table>          		          	
					    </div>
					</div>
								
					<div id="grid" data-role="grid" 
						data-bind="source: invoiceItemList"
				        data-auto-bind="false"				        
				        data-row-template="gdn-row-template"				                        
				        data-columns='[{ title: "", width: 20 },
				        	{ title: "ល.រ", width: 35 },
				            { title: "ទំនិញ", width: 200 },	                     
				            { title: "ពណ៌នា", width: 200 },
				            { title: "ចំនួន", width: 85 }				            	                    	                    
				            ]'>
					</div>
					<button class="btn btn-inverse" data-bind="click: addNewRow"><i class="icon-plus icon-white"></i></button>
					
					<br>
					
					<div class="row-fluid">				
						<div class="span8">
							សំគាល់:
							<br>
							<textarea id="memo" cols="0" rows="2" class="k-textbox" style="width:250px" data-bind="value: invoice.memo" placeholder="សំគាល់ 1 (សំរាប់អតិថិជន)"></textarea>
							<textarea id="memo2" cols="0" rows="2" class="k-textbox" style="width:250px" data-bind="value: invoice.memo2" placeholder="សំគាល់ 2 (សំរាប់ផ្ទៃក្នុង)"></textarea>
						</div>

						<div class="span4">
							<table width="100%">								
								<tr align="right">
									<td>សរុប:</td>
									<td><span data-bind="text: totalQuantity"></span></td>
								</tr>														
							</table>
						</div>													
					</div>

					<br>

					<div class="row-fluid">				
						<div class="span12" align="right">
							<div id="status"></div>
							<span class="btn btn-primary btn-icon glyphicons print" data-bind="click: linkPrint, visible: isEdit"><i></i> បោះពុម្ព</span>						
							<button id="save" type="submit" class="btn btn-icon btn-primary glyphicons cart_in"><i></i> រៀបចំវិក្កយបត្រ</button>							
						</div>
					</div>					
				</div>
			</div>
			</div>
		</div>
	</div>
</script>
<script id="invoice-row-template" type="text/x-kendo-tmpl">		
	<tr>		
		<td>
			<i class="icon-trash" data-bind="events: { click: removeRow }"></i>			
		</td>
		<td class="sno">1</td>
		<td>
			<select id="item" name="item" data-role="combobox" 
					data-text-field="name" data-value-field="id" 
					data-bind="source: itemList, value: item_id, events: {change : itemChange}"
					required data-required-msg="ត្រូវការ ទំនិញ" style="width:200px">
			</select>
		</td>		
		<td>
			<input id="description" name="description" type="text" 
					data-bind="value: description" style="margin-bottom: 0;" 
					required data-required-msg="ត្រូវការ ពណ៌នា" />
		</td>
		<td>
			<input id="quantity" name="quantity" data-role="numerictextbox" 
					data-format="n0" data-min="1"
					data-bind="value: quantity, events: {change : change}"
					required data-required-msg="ត្រូវការ ចំនួន" style="width: 80px;" />
		</td>				
		<td>
			<input id="price" name="price" data-role="numerictextbox" 
					data-format="c" data-culture=#:sub_code#
					data-bind="value: unit_price, events: {change : change}" 
					required data-required-msg="ត្រូវការ តំលៃ" style="width: 110px;" />
		</td>		
		<td align="right">			
			#amount = kendo.parseFloat(quantity)*kendo.parseFloat(unit_price)#
			#=kendo.toString(amount, "c", sub_code)#			
		</td>
		<td>
			<input type="checkbox" data-bind="checked: vat, events: {change : change}" />			
		</td>		
    </tr>   
</script>
<script id="gdn-row-template" type="text/x-kendo-tmpl">		
	<tr>		
		<td>
			<i class="icon-trash" data-bind="events: { click: removeRow }"></i>			
		</td>
		<td class="sno">1</td>
		<td>
			<select id="item" name="item" data-role="combobox" 
					data-text-field="name" data-value-field="id" 
					data-bind="source: itemList, value: item_id, events: {change : itemChange}"
					required data-required-msg="ត្រូវការ ទំនិញ" style="width:200px">
			</select>
		</td>		
		<td>
			<input id="description" name="description" type="text" 
					data-bind="value: description" style="margin-bottom: 0;" 
					required data-required-msg="ត្រូវការ ពណ៌នា" />
		</td>
		<td>
			<input id="quantity" name="quantity" data-role="numerictextbox" 
					data-format="n0" data-min="1"
					data-bind="value: quantity, events: {change : change}"
					required data-required-msg="ត្រូវការ ចំនួន" style="width: 80px;" />
		</td>				
    </tr>   
</script>

<!-- Meter -->
<script id="meter" type="text/x-kendo-template">	
	<div id="slide-form">		
		<div class="row-fluid">
			<div class="span12">
				<h4 align="center">កុងទ័រ</h4>

				<div id="meter-window" data-role="window" data-visible="false" data-modal="true" data-resizable="false" data-iframe="true" data-min-width="600px" data-height="400px">				    	
			    	<table cellpadding="5" cellspacing="5">
		                <tr>
		                  	<td>អតិថិជន</td>
		                  	<td><span data-bind="text: fullIdName"></span></td>                 
		                  	<td>ថ្ងៃប្រើប្រាស់</td>	                  	
		                  	<td><input data-role="datepicker" 
		                  				data-bind="value: meter.date_used" 
		                  				data-format="dd-MM-yyyy" data-parse-formats="yyyy-MM-dd" /></td> 
		                </tr>
		                <tr>
		                  	<td>ប្រភេទ</td>
		                  	<td><select data-role="combobox" 
		                  				data-text-field="name" data-value-field="id" 
		                  				data-value-primitive="true" 
		                  				data-bind="source: meterItemList, value: meter.item_id"></select>
		                  	</td> 
		                  	<td>កុងទ័របំរុងនៃ</td>
		                  	<td><select data-role="dropdownlist" 
		                  				data-text-field="name" data-value-field="id"
		                  				data-value-primitive="true" 
		                  				data-auto-bind="true",
		                  				data-option-label="(--- រើសកុងទ័រ ---)"
		                  				data-bind="source: parentMeterList, value: meter.parent_id"></select></td>	                  	                             
		                </tr>
		                <tr>
		                  	<td>លេខកូដកុងទ័រ</span></td>                    
		                  	<td><input class="k-textbox" data-bind="value: meter.meter_no" /></td>                             
		                  	<td>មេគុណ</td>
		                  	<td><input data-role="numerictextbox" data-bind="value: meter.multiplier" data-format="#" min="1" step="100" /></td>                                   
		                </tr>
		                <tr>             
		                  	<td></td>
		                  	<td><input type="checkbox" data-bind="checked: meter.cover_sealed" /> សំណគំរបខ្សែ</td>	                  	  	             
		                  	<td>ស្ថានភាព</td>
		                  	<td><select data-role="dropdownlist" data-text-field="name" data-value-field="value" data-value-primitive="true" data-bind="source: statuses, value: meter.status"></select></td>                                    
		                </tr>
		                <tr>             
		                  	<td></td>
		                  	<td><input type="checkbox" data-bind="checked: meter.ear_sealed" /> សំណត្រចៀក</td>	                  	  	
		                  	<td></td>
		                  	<td><input type="checkbox" data-bind="checked: hasTariff, click: clearTariff" /> មានអំនាន Reactive</td>                                   
		                </tr>
		                <tr>
		                	<td>ចំនួនខ្ទង់នាឡិកា</td>
		                	<td><input data-role="numerictextbox" data-bind="value: meter.max_digit" data-format="n0" min="0" placeholder="ឧ.10000" /></td>                  	
		                  	<td>តំលៃ</td>
		                  	<td><select data-role="dropdownlist" 
		                  				data-text-field="name" data-value-field="id" 
		                  				data-value-primitive="true" 
		                  				data-bind="source: tariffList, enabled: hasTariff, value: meter.tariff_id"
		                  				data-option-label="(--- ជ្រើសរើស ---)"></select>
		                  	</td>	                  	                        
		                </tr>
		                <tr>
		                  	<td>ត្រង់ស្វូ</td>
		                  	<td>
		                  		<input id="tran" name="tran" data-bind="value: meter.transformer_id" />
		                  	</td>	                  	
		                  	<td rowspan="2" valign="top">កំណត់សំគាល់</td>
		                  	<td rowspan="2" valign="top"><textarea name="memo" id="address" cols="" rows="2" data-bind="value: meter.memo"></textarea></td>
		                </tr>
		                <tr>
		               	  	<td>ប្រអប់</td>
		                  	<td>
		                  		<input id="electricityBox" name="electricityBox" disabled="disabled" data-bind="value: meter.electricity_box_id" />
		                  	</td>
		                  	<td></td>
		                  	<td></td>
		                </tr>
		          	</table>
		          	
		          	<br>

		          	<div align="center">
		          		<button class="btn btn-primary" data-bind="click: meterSave"><i class="icon-hdd icon-white"></i> កត់ត្រា</button>                                  
		                <button class="btn" data-bind="click: closeMeterWindow"><i class="icon-off"></i> បិទ</button>
		                <button class="btn btn-danger" data-bind="visible: isEditMode, click: deleteMeter"><i class="icon-trash icon-white"></i> លុប</button>
		          	</div>
			    </div>

				<button class="btn btn-inverse" data-bind="click: btnAddNewMeterClick"><i class="icon-plus icon-white"></i></button>
				<br>
				<div data-role="grid" data-bind="source: meterList, events: { change: meterGridChange }"
			        data-auto-bind="false"
			        data-selectable="true"				        
			        data-row-template="meterRowTemplate"				                        
			        data-columns='[{ title: "កាលបរិច្ឆេទ", width: 90 },
			        	{ title: "#កុងទ័រ", width: 90 },
			            { title: "ប្រភេទ" },	                     
			            { title: "បំរុងនៃ" },
			            { title: "ប្រអប់" },
			            { title: "ត្រ.", width: 35 },		            
			            { title: "គំរ.", width: 35 },
			            { title: "ស្ថានភាព", width: 90 }	                    	                    
			            ]'>
				</div>

				<br><br>

				<h4 align="center">ឌីស្យុងទ័រ</h4>			
			
				<div id="breaker-window" data-role="window" data-visible="false" data-modal="true" data-resizable="false" data-iframe="true" data-min-width="300px" data-height="250px">
			    	<table cellpadding="5" cellspacing="5">
		                <tr>
		                  	<td>អតិថិជន</td>
		                  	<td><span data-bind="text: fullIdName"></span></td>
		                </tr>
		                <tr>                 
		                  	<td>ថ្ងៃប្រើប្រាស់</td>	                  	
		                  	<td><input data-role="datepicker" 
		                  				data-bind="value: breaker.date_used" 
		                  				data-format="dd-MM-yyyy" data-parse-formats="yyyy-MM-dd" /></td> 
		                </tr>
		                <tr>
		                  	<td>ប្រភេទ</td>
		                  	<td><select data-role="combobox" 
		                  				data-text-field="name" data-value-field="id"
		                  				data-value-primitive="true" 
		                  				data-bind="source: breakerItemList, value: breaker.item_id"></select></td> 
		                </tr>
		                <tr>
		                  	<td>ឈ្មោះឌីស្យុងទ័រ</span></td>                    
		                  	<td><input class="k-textbox" data-bind="value: breaker.name" /></td>	                  	
		                </tr>
		                <tr>	                  
		                  	<td>ស្ថានភាព</td>
		                  	<td><select data-role="dropdownlist" 
		                  				data-text-field="name" data-value-field="value" 
		                  				data-value-primitive="true"
		                  				data-bind="source: statuses, value: breaker.status"></select>
		                  	</td>                                    
		                </tr>	                
		          	</table>
		          	
		          	<br>

		          	<div align="center">
		          		<button class="btn btn-primary" data-bind="click: breakerSave"><i class="icon-hdd icon-white"></i> កត់ត្រា</button>                                  
		                <button class="btn" data-bind="click: closeBreakerWindow"><i class="icon-off"></i> បិទ</button>
		                <button class="btn btn-danger" data-bind="visible: isEditModeBrker, click: deleteBreaker"><i class="icon-trash icon-white"></i> លុប</button>
		          	</div>
			    </div>
			    		
				<button class="btn btn-inverse" data-bind="click: btnAddNewBreakerClick"><i class="icon-plus icon-white"></i></button>
				<br>
				<div id="brkerGrid" data-role="grid" data-bind="source: breakerList, events: { change: breakerGridChange }"
		            data-selectable="true"
		            data-auto-bind="false" 
		            data-row-template="breakerRowTemplate"                  
		            data-columns='[{ title: "កាលបរិច្ឆេទ" }, 
		                    { title: "ឈ្មោះឌីស្យុងទ័រ"}, 
		                    { title: "ប្រភេទ" },                        
		                    { title: "ស្ថានភាព" }]'>
				</div>

			</div>
		</div>		
	</div>		
</script>
<script id="meterRowTemplate" type="text/x-kendo-template">	
	<tr>
		<td>#:kendo.toString(new Date(date_used), "dd-MM-yyyy")#</td>			
		</td>
		<td>#:meter_no#</td>
		<td>
			<input data-role="dropdownlist"                   
                   data-text-field="name"
                   data-value-field="id"
                   data-value-primitive="true"
                   data-auto-bind="false"
                   data-bind="value: item_id,
                              source: meterItemList"                              
                   data-option-label="---"
                   style="width: 170px;" disabled />
		</td>
		<td>
			<input data-role="dropdownlist"                   
                   data-text-field="name"
                   data-value-field="id"
                   data-value-primitive="true"
                   data-auto-bind="false"
                   data-bind="value: parent_id,
                              source: parentMeterList"
                   data-option-label="---"                   
                   style="width: 170px;" disabled />
        </td>
		<td>#=electricity_boxes.box_no#</td>
		<td><input type="checkbox" #: ear_sealed ? checked="checked" : "" # disabled="disabled" /></td>
		<td><input type="checkbox" #: cover_sealed ? checked="checked" : "" # disabled="disabled" /></td>
		<td>#:status==1 ? "ប្រើប្រាស់" : "ឈប់ប្រើ"#</td>		
	</tr>
</script>
<script id="breakerRowTemplate" type="text/x-kendo-template">	
	<tr>
		<td>#:kendo.toString(new Date(date_used), "dd-MM-yyyy")#</td>
		<td>#:name#</td>
		<td>
			<input data-role="dropdownlist"                   
                   data-text-field="name"
                   data-value-field="id"
                   data-bind="value: item_id,
                              source: breakerItemList"
                   data-option-label="---"
                   disabled />
		</td>		
		<td>#:status==1 ? "ប្រើប្រាស់" : "ឈប់ប្រើ"#</td>		
	</tr>
</script>

<!-- eReading -->
<script id="eReadingEdit" type="text/x-kendo-template">
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span12">
				<div id="example" class="k-content">	
					<h4>កំណែអំនានកុងទ័រ</h4>

					<input type="text" data-bind="value: meter_no" style="width:100px" placeholder="លេខកូដកុងទ័រ">
					<button type="button" class="btn btn-default" data-bind="click: search"><i class="icon-search"></i></button>

					<br><br>

					<div>
						<table>
							<tr>
								<th>អំនានចាស់R</th>
								<th>អំនានថ្មីR</th>
								<th>ជំុថ្មីR</th>
								<th>សរុបR</th>
								<th>អំនានចាស់</th>
								<th>អំនានថ្មី</th>
								<th>ជំុថ្មី</th>
								<th>សរុប</th>
							</tr>
							<tr>
								<td>
									<input data-role="numerictextbox"
						                   data-format="n0"
						                   data-min="0"                   
						                   data-bind="value: reading.reactive_prev_reading, events:{ change: onChange }"					                   
						                   style="width: 100px">
								</td>
								<td>
									<input data-role="numerictextbox"
						                   data-format="n0"
						                   data-min="0"                   
						                   data-bind="value: reading.reactive_new_reading, events:{ change: onChange }"					                   
						                   style="width: 100px">
								</td>
								<td><input type="checkbox" data-bind="checked: reading.reactive_new_round, events:{ change: onChange }" /></td>		
								<td>
									<span data-bind="text: total_reactive"></span>
								</td>
								<td>
									<input data-role="numerictextbox"
						                   data-format="n0"
						                   data-min="0"                   
						                   data-bind="value: reading.prev_reading, events:{ change: onChange }"
						                   style="width: 100px">
								</td>
								<td>
									<input data-role="numerictextbox"
						                   data-format="n0"
						                   data-min="0"                   
						                   data-bind="value: reading.new_reading, events:{ change: onChange }"
						                   style="width: 100px">
								</td>
								<td><input type="checkbox" data-bind="checked: reading.new_round, events:{ change: onChange }" /></td>
								<td>
									<span data-bind="text: total_active"></span>
								</td>
							</tr>
						</table>
					</div>

					<br><br>

					<table>
			          	<tr>			          							          		
			          		<td>ប្រចាំខែ</td>
				            <td>
				            	<input id="monthOf" name="monthOf" 
				            			data-role="datepicker" 
				            			data-bind="value: reading.month_of" 
				            			data-start="year" data-depth="year" 
				            			data-format="MM-yyyy"
				            			data-parse-formats="yyyy-MM-dd"
				            			placeholder="ខែ-ឆ្នាំ" />
				            </td>
				            <td></td>
			          		<td></td>		          		
			          	</tr>
			          	<tr>			          		
			          		<td>ថ្ងៃអានចាប់ពី</td>
			            	<td>
			            		<input data-role="datepicker" 
		                  				data-bind="value: reading.date_read_from" 
		                  				data-format="dd-MM-yyyy" 
		                  				data-parse-formats="yyyy-MM-dd"
		                  				placeholder="ថ្ងៃ-ខែ-ឆ្នាំ" />			            		
			            	</td>		            
			          		<td>ដល់</td>
			            	<td>
			            		<input data-role="datepicker" 
		                  				data-bind="value: reading.date_read_to" 
		                  				data-format="dd-MM-yyyy" 
		                  				data-parse-formats="yyyy-MM-dd"
		                  				placeholder="ថ្ងៃ-ខែ-ឆ្នាំ" />			            		
			            	</td>		            	
			          	</tr>
			          	<tr>			          					          		
			          		<td>អ្នកអាន</td>
			          		<td><select id="reader" name="reader" 
			          					data-role="combobox" 
			          					data-text-field="fullname" 
			          					data-value-field="id"
			          					data-value-primitive="true" 
			            				data-bind="source: readerList, value: reading.reader"
			            				required data-required-msg="ត្រូវការ អ្នកអាន"></select></td>					            			            
			          		<td></td>
			            	<td></td>		            	
			          	</tr>		          	
			        </table>

			        <br><br>

			        <div>
	            		<div id="status"></div>			        	
	          			<button id="save" class="btn btn-primary"><i class="icon-hdd icon-white"></i> កត់ត្រា​</button>
	            	</div>
            	</div>
			</div>
		</div>	
	</div>	
</script>

<script id="reading" type="text/x-kendo-template">
	<div class="container-fluid">
		<div class="row-fluid">    
			<div class="span12">
				<div id="example" class="k-content">
					<div class="hidden-print">
						<div class="accordion" id="accordion">
						    <!-- //Accordion Item -->
						    <div class="accordion-group">
						        <div class="accordion-heading">
					            	<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse-1">
										វ៉ាយបញ្ចូលអំនានដោយផ្ទាល់ដៃ
									</a>
						        </div>
						        <div id="collapse-1" class="accordion-body in collapse" style="height: auto;">
						            <div class="accordion-inner">
						            	   	
						            	<input data-role="dropdownlist"
						            		data-option-label="(--- រើស អាជ្ញាបណ្ណ ---)"						            							                   
						                   	data-value-primitive="true"
						                   	data-text-field="abbr"
						                   	data-value-field="id"
						                   	data-bind="value: company_id,
						                              source: companyList, 
						                              events: { change: companyChanges }"/>

						                <input data-role="dropdownlist"
						            		data-option-label="(--- រើស តំបន់ ---)"						            		
						            		data-auto-bind="false"						                   
						                   	data-value-primitive="true"
						                   	data-text-field="transformer_number"
						                   	data-value-field="id"						                   	
						                   	data-bind="value: transformer_id,
						                              source: transformerList"/>						            	
						            	
						            	<input data-role="datepicker" 
						            			data-bind="value: monthOfSearch" 
						            			data-start="year" data-depth="year" 
						            			data-format="MM-yyyy" placeHolder="ប្រចាំខែ"
						            			style="width: 100px;" />

						          		<input type="text" style="width:100px" data-bind="value: meterNoSearch" placeholder="លេខកូដកុងទ័រ">					          					          			          		
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
	        
		        	<div data-role="grid" data-bind="source: readingList"
				        data-auto-bind="false"
				        data-pageable="true"				        				        				        
				        data-row-template="readingRowTemplate"				        		                        
				        data-columns='[
				        	{ title: "អតិថិជន" },
				        	{ title: "ប្រអប់" },
				        	{ title: "កុងទ័រ" },				        					            
				            { title: "អំនានចាស់" },	                     
				            { title: "អំនានថ្មី" },
				            { title: "ជុំថ្មី", width: 40 },
				            { title: "សរុប" }            	                    
				            ]'>
					</div>

					<div class="box-col" style="width: 340px">			            
			            <div id="reactive-window"
			            	 data-role="window"
			                 data-title="អំនាន Reactive"			                 
			                 data-visible="false"
			                 data-modal="true">

			                <table>
			                	<tr>
			                		<th>
			                			អំនានចាស់
			                		</th>
			                		<th>
			                			អំនានថ្មី
			                		</th>
			                		<th>
			                			ជុំថ្មី
			                		</th>
			                		<th>
			                			សរុប
			                		</th>
			                	</tr>	
			                	<tr>			                		
			                		<td>
										<input data-role="numerictextbox"
							                   data-format="n0"
							                   data-min="0"                   
							                   data-bind="value: reactive.reactive_prev_reading, events:{ change: reactiveChange }"
							                   style="width: 100px">
									</td>
									<td>
										<input data-role="numerictextbox"
							                   data-format="n0"
							                   data-min="0"                   
							                   data-bind="value: reactive.reactive_new_reading, events:{ change: reactiveChange }"
							                   style="width: 100px">
									</td>
									<td><input type="checkbox" data-bind="checked: reactive.reactive_new_round, events:{ change: reactiveChange }" /></td>
									<td>
										<span data-bind="text: reactive_qty"></span>										
									</td>									
			                	</tr>
			                </table>
			            </div>
			        </div>

			        <br>

			        <table width="100%">
			          	<tr>			          							          		
			          		<td>ប្រចាំខែ</td>
				            <td>
				            	<input id="monthOf" name="monthOf" data-role="datepicker" 
				            			data-bind="value: month_of" 
				            			data-start="year" data-depth="year" data-format="MM-yyyy"
				            			required data-required-msg="ត្រូវការ ប្រចាំខែ"
				            			placeholder="ខែ-ឆ្នាំ" />
				            </td>
				            <td></td>
			          		<td></td>
			          		<td>អំនានសរុបR</td>
			          		<td align="right"><span data-bind="text: total_reactive"></span> kWh</td>
			          	</tr>
			          	<tr>			          		
			          		<td>ថ្ងៃអានចាប់ពី</td>
			            	<td>
			            		<input id="dateFrom" name="dateFrom" 
			            				data-role="datepicker" 
			            				data-bind="value: date_read_from" 
			            				data-format="dd-MM-yyyy" 
			            				required data-required-msg="ត្រូវការ ថ្ងៃអានចាប់ពី"
			            				placeholder="ថ្ងៃ-ខែ-ឆ្នាំ" />
			            	</td>		            
			          		<td>ដល់</td>
			            	<td>
			            		<input id="dateTo" name="dateTo" data-role="datepicker" 
			            				data-bind="value: date_read_to" 
			            				data-format="dd-MM-yyyy"
			            				required data-required-msg="ត្រូវការ ដល់ថ្ងៃ"
			            				placeholder="ថ្ងៃ-ខែ-ឆ្នាំ" />
			            	</td>
			            	<td>អំនានសរុប</td>
			          		<td align="right"><span data-bind="text: total_active"></span> kWh</td>
			          	</tr>
			          	<tr>			          					          		
			          		<td>អ្នកអាន</td>
			          		<td><select id="reader" name="reader" data-role="combobox" 
			          					data-text-field="fullname" data-value-field="id" 
			            				data-bind="source: readerList, value: reader"
			            				required data-required-msg="ត្រូវការ អ្នកអាន"></select></td>					            			            
			          		<td></td>
			            	<td></td>
			            	<td></td>
			            	<td align="right">
			            		<div id="status"></div>			        	
			          			<button id="save" class="btn btn-primary"><i class="icon-hdd icon-white"></i> កត់ត្រា​</button>
			            	</td>
			          	</tr>		          	
			        </table>	        						
				</div> <!-- //End div example-->            
			</div> <!-- //End div span12-->		
		</div> <!-- //End div row-fluid-->
	</div>
</script>
<script id="readingRowTemplate" type="text/x-kendo-tmpl">
	<tr id="row#=meter_id#">					
		<td>#=fullname#</td>	
		<td>#=box_no#</td>
		<td>
			<div style="float:left;text-align:left;">#=meter_no#</div>
  			<div style="float:right;text-align:right;">
  				#if(tariff_id>0){#
  					<button class="k-button" data-bind="click: openWindow">Reactive</button>
  				#}# 				  				
  			</div>			
		</td>		
		<td>
			<input data-role="numerictextbox"
                   data-format="n0"
                   data-min="0"                   
                   data-bind="value: prev_reading, events:{ change: onChange }"
                   style="width: 100px">
		</td>
		<td>
			<input class="txt#=meter_id#"
				   data-role="numerictextbox"
                   data-format="n0"
                   data-min="0"                   
                   data-bind="value: new_reading, events:{ change: onChange }"
                   style="width: 100px">
		</td>
		<td align="center"><input type="checkbox" data-bind="checked: new_round, events:{ change: onChange }" /></td>
		<td>
			#if(new_reading>0){#
				#add_up = 0;#
				#if(new_round){#
					#add_up = kendo.parseInt(max_digit);#					
				#}#

				#=active_qty=((new_reading + add_up) - prev_reading)*multiplier#				
			#}#
		</td>		
    </tr>
</script>

<!-- Utility Invoice -->
<script id="uInvoice" type="text/x-kendo-template">	
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span12">
				<div id="example" class="k-content">
					<h3>រៀបចំវិក្កយបត្រ</h3>

					<br>
					
					<div>				
						<input data-role="dropdownlist"
		            		data-option-label="(--- រើស អាជ្ញាបណ្ណ ---)"						            							                   
		                   	data-value-primitive="true"
		                   	data-text-field="abbr"
		                   	data-value-field="id"
		                   	data-bind="value: company_id,
		                              source: companyList, 
		                              events: { change: companyChanges }"/>

		                <input data-role="dropdownlist"
		            		data-option-label="(--- រើស តំបន់ ---)"						            		
		            		data-auto-bind="false"						                   
		                   	data-value-primitive="true"
		                   	data-text-field="transformer_number"
		                   	data-value-field="id"						                   	
		                   	data-bind="value: transformer_id,
		                              source: transformerList"/>

						<input data-role="datepicker" data-bind="value: monthOfSearch" data-start="year" data-depth="year" data-format="MM-yyyy" placeHolder="អំនានប្រចាំខែ" />
						<button type="button" class="btn btn-default" data-bind="click: search"><i class="icon-search"></i></button>
						<button type="button" class="btn btn-default" data-bind="click: linkPrint"><i class="icon-print"></i></button>				
					</div>											

					<br>
					
					<table class="table table-bordered table-striped table-white">
				        <thead>
				            <tr>
				                <th><input type="checkbox" data-bind="checked: checkAll, events: {change : changeAll}" /></th>
				                <th>អំនានប្រចាំខែ</th>				                
				                <th>អតិថិជន</th>	                    
				                <th>លេខប្រអប់</th>
				                <th>លេខកុងទ៍រ</th>
				                <th>មេគុណ</th>
				                <th>អំនានចាស់R</th>
				                <th>អំនានថ្មីR</th>
				                <th>សរុប Reactive</th>
				                <th>អំនានចាស់</th>
				                <th>អំនានថ្មី</th>
				                <th>សរុប Active</th>	                    
				            </tr>
				        </thead>
				        <tbody data-role="listview" data-template="uInvoiceRowTemplate" data-auto-bind="false" data-bind="source: meterRecordList">
				        </tbody>	            
				    </table>

				    <br>
				    
				    <table width="100%">
						<tr>
				            <td>ប្រចាំខែ</td>            
				            <td><input id="monthOf" name="monthOf" data-role="datepicker" 
				            			data-bind="value: month_of"	data-start="year" 
				            			data-depth="year" data-format="MM-yyyy"
				            			required data-required-msg="ត្រូវការ ប្រចាំខែ" /></td>		            
				            <td></td>
				            <td></td>	
				            <td align="right">ចំនួនអំនានសរុប:</td>            
				            <td align="right" width="90px">
				            	<span data-bind="text: totalSelected"></span> /			            	
				            	<span data-bind="text: total_reading"></span>
				            </td>		            		            
				      	</tr>		          	
				      	<tr>				            
				            <td>ថ្ងៃចេញវិក្កយបត្រ</td>
				            <td>
				            	<input id="issuedDate" name="issuedDate" data-role="datepicker" 
				            			data-bind="value: issued_date" data-format="dd-MM-yyyy"
				            			required data-required-msg="ត្រូវការ ថ្ងៃចេញវិក្កយបត្រ" />
				            </td>
				            <td></td>            
				            <td></td>			            
				            <td align="right">ចំនួនប្រើប្រាស់ Active សរុប:</td>            
				            <td align="right" width="90px"><span data-bind="text: total_active"></span> kWh</td>
				      	</tr>
				      	<tr>		            
				            <td>ថ្ងៃបង់ប្រាក់</td>
				            <td><input id="paymentDate" name="paymentDate" data-role="datepicker" 
				            			data-bind="value: payment_date" data-format="dd-MM-yyyy"
				            			required data-required-msg="ត្រូវការ ថ្ងៃបង់ប្រាក់" /></td>
				            <td>ថ្ងៃផុតកំណត់</td>
				            <td><input id="dueDate" name="dueDate" data-role="datepicker" 
				            			data-bind="value: due_date" data-format="dd-MM-yyyy"
				            			required data-required-msg="ត្រូវការ ថ្ងៃផុតកំណត់" /></td>
				            <td align="right">ចំនួនប្រើប្រាស់ Reactive សរុប:</td>            
				            <td align="right" width="90px"><span data-bind="text: total_reactive"></span> kWh</td>		            
				      	</tr>		          	
				    </table>
				         
				    <br />
				    
				    <div align="right">
				      	<div id="status"></div> 
				      	<button id="save" class="btn btn-primary"><i class="icon-list-alt icon-white"></i> រៀបចំវិក្កយបត្រ</button>     
				    </div>			   
				</div><!-- //End div example-->
			</div><!-- //End div span12-->
		</div><!-- //End div row-fluid-->
	</div>	
</script>
<script id="uInvoiceRowTemplate" type="text/x-kendo-tmpl">
	<tr>
		<td align="center">
		   <input type="checkbox" data-bind="checked: isCheck, events: {change : change}" #: invoice_id>0 ? disabled="disabled" : "" # />
		</td>
		<td>#:kendo.toString(new Date(month_of), "MM-yyyy") #</td>				
		<td>#:fullname#</td>		
		<td>#:box_no#</td>
		<td>#:meter_no#</td>
		<td>#:multiplier#</td>				
		<td align="right">#:reactive_prev_reading #</td>
		<td align="right">#:reactive_new_reading #</td>
		<td align="right">#:reactive_quantity#</td>
		<td align="right">#:prev_reading #</td>
		<td align="right">#:new_reading #</td>		
		<td align="right">#:quantity#</td>		
    </tr>
</script>

<script id="uInvoicePreview" type="text/x-kendo-template">
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span12">
				<div id="example" class="k-content">
					<a href="javascript:void()" 
							class="hidden-print pull-right glyphicons no-js remove_2" 
							onclick="javascript: window.history.back()"><i></i></a>

					<div class="hidden-print">								
						<input data-role="dropdownlist"
		            		data-option-label="(--- រើស អាជ្ញាបណ្ណ ---)"						            							                   
		                   	data-value-primitive="true"
		                   	data-text-field="abbr"
		                   	data-value-field="id"
		                   	data-bind="value: company_id,
		                              source: companyList, 
		                              events: { change: companyChanges }"/>

		                <input data-role="dropdownlist"
		            		data-option-label="(--- រើស តំបន់ ---)"						            		
		            		data-auto-bind="false"						                   
		                   	data-value-primitive="true"
		                   	data-text-field="transformer_number"
		                   	data-value-field="id"						                   	
		                   	data-bind="value: transformer_id,
		                              source: transformerList"/>

						<input id="mof" name="mof" data-role="datepicker" 
								data-bind="value: month_of" data-start="year" data-depth="year" 
								data-format="MM-yyyy" placeHolder="ប្រចាំខែ" />
						<input type="text" data-bind="value: invoice_no" style="width:100px" placeholder="លេខវិក្កយបត្រ">
						<button type="button" class="btn btn-default" data-bind="click: search"><i class="icon-search"></i></button>
						<button type="button" class="btn btn-default" onclick="javascript:window.print()"><i class="icon-print"></i></button>				
						<input id="chkVisible" type="checkbox" data-bind="events: {click: print}" /> ប្រើក្រដាសពុម្ព																			
					</div>
					
					<div data-role="listview" data-bind="source: invoiceList" 
						data-template="uInvoicePreviewTemplate" data-auto-bind="false"></div>
		
				</div><!-- //End div example-->
			</div><!-- //End div span12-->
		</div><!-- //End div row-fluid-->
	</div>	
</script>
<script id="uInvoicePreviewTemplate" type="text/x-kendo-tmpl">	
  	<div class="print">
  		<table width="100%" style="margin-bottom: 8px;">
	    	<tr>
	    		<td align="center" >
	    			<img src="/banhji/#:companys.image_url#" height="90" width="60" style="float: left">
	    			<div>	    			
		    			<h4>#:companys.name#</h4>					
						#:companys.address# <br>
						#:companys.phone# /
						#:companys.mobile#
					</div>					
	    		</td>
	    	</tr>
	    </table>

	    <div class="hiddenPrint" style="border-bottom: 1px solid black;"></div>							
		
		<table width="100%" style="margin-bottom: 8px;">
			<tr>
				<td valign="top" rowspan="6" width="50%" align="left">
					<span class="#:number#"></span>
					#:customers.number# #:customers.surname# #:customers.name# <br>
					#:address# <br>
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
				<td>#:transformers.transformer_number#</td>							
			</tr>
			<tr>
				<td class="hiddenPrint">លេខប្រអប់ BOX NO</td>
				<td>#:box_no#</td>				
			</tr>
			<tr>
				<td class="hiddenPrint">គិតចាប់ពីថ្ងៃទី FROM</td>
				<td>#:kendo.toString(new Date(date_read_from), "dd-MM-yyyy")#</td>							
			</tr>
			<tr>
				<td class="hiddenPrint">ដល់ថ្ងៃទី TO</td>
				<td>#:kendo.toString(new Date(date_read_to), "dd-MM-yyyy")#</td>
			</tr>
		</table>
		
		<div class="print-content">
			<table width="100%">
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
					<tr></tr>					
					<tr>
						<td colspan="6" align="right">ប្រាក់ជំពាក់ខែមុន</td>
						<td align="right">#:kendo.toString(kendo.parseFloat(tdebt)/kendo.parseFloat(rate), 'c', sub_code)#</td>
					</tr>
					<tr>
						<td colspan="6" align="right">ប្រាក់សងខែមុន</td>
						<td align="right">#:kendo.toString(kendo.parseFloat(tpayment)/kendo.parseFloat(rate), 'c', sub_code)#</td>
					</tr>
					<tr>
						<td colspan="6" align="right">ប្រាក់នៅជំពាក់</td>
						<td align="right">#:kendo.toString(kendo.parseFloat(tremain)/kendo.parseFloat(rate), 'c', sub_code)#</td>
					</tr>									
					#for(var i=0; i < invoice_items.length; i++) {#
						<tr>
							<td width="10%">
								#if(invoice_items[i].meter_no===null){#
									REACTIVE
								#}else{#
									#:invoice_items[i].meter_no#
								#}#							
							</td>
							<td align="right">#:invoice_items[i].prev_reading#</td>
							<td align="right">#:invoice_items[i].new_reading#</td>
							<td align="center">#:invoice_items[i].multiplier#</td>
							<td align="right">#:kendo.toString(kendo.parseInt(invoice_items[i].quantity), 'n0')#</td>
							<td align="right">#:kendo.toString(kendo.parseFloat(invoice_items[i].unit_price)/kendo.parseFloat(rate), 'c', sub_code)#</td>
							<td align="right">#:kendo.toString(kendo.parseFloat(invoice_items[i].amount)/kendo.parseFloat(rate), 'c', sub_code)#</td>
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
		</div>		

        <table class="hiddenPrint" width="100%" border="1" cellpadding="2" cellspacing="2">
        	<tr>
        		<td rowspan="6" width="50%">
        			#=companys.term_of_condition#
        		</td>
        		<td width="30%">
        			<div style="float:left;text-align:left;">បំណុលខែនេះ</div>
  					<div style="float:right;text-align:right; font-size: 6pt;">TOTAL BALANCE</div>
        		</td>
        		<td width="20%" align="right" style="visibility:visible;">#:kendo.toString(kendo.parseFloat(total)/kendo.parseFloat(rate), 'c', sub_code)#</td>
        	</tr>
        	<tr>
        		<td>
        			<div style="float:left;text-align:left;">ទឹកប្រាក់ត្រូវបង់</div>
  					<div style="float:right;text-align:right;">TOTAL DUE</div>
        		</td>
        		<td align="right" style="visibility:visible;">#:kendo.toString(kendo.parseFloat(tdue)/kendo.parseFloat(rate), 'c', sub_code)#</td>        		
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

		<table class="hiddenPrint" width="100%" border="1" cellpadding="2" cellspacing="2">
			<tr>
				<td colspan="2" rowspan="4" width="50%" style="visibility:visible;">
					<span class="#:number#"></span> <br>
					អតិថិជន: #=customers.number# #=customers.surname# #=customers.name# <br>
					ទីតាំងចរន្ត: #=transformers.transformer_number#, ប្រអប់: #=box_no#
				</td>										
				<td width="30%">
					<div style="float:left;text-align:left;">ទឹកប្រាក់ត្រូវបង់</div>
  					<div style="float:right;text-align:right;">TOTAL DUE</div>
				</td>
				<td align="right" width="20%" style="visibility:visible;">#:kendo.toString(kendo.parseFloat(tdue)/kendo.parseFloat(rate), 'c', sub_code)#</td>
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

<!-- Notice -->
<script id="notice" type="text/x-kendo-template">
	<div class="row-fluid">
		<div class="span12">			
			<div class="widget widget-tabs widget-tabs-double widget-tabs-gray">			
				
				<div class="widget-head">
					<ul>
						<li class="active"><a href="#tab1-2" class="glyphicons calculator" data-toggle="tab"><i></i><span class="strong">ជំហានទី ១</span><span>រកថាមពលមធ្យម</span></a></li>
						<li><a href="#tab2-2" class="glyphicons notes" data-toggle="tab"><i></i><span class="strong">ជំហានទី ២</span><span>បង្កើតលិខិតរំលឹក</span></a></li>						
					</ul>
				</div>				
				
				<div class="widget-body">
					<div class="tab-content">					
						 
						<div class="tab-pane active" id="tab1-2">
							<div>											
								<select data-role="dropdownlist" data-text-field="meter_no" data-value-field="id"
									data-auto-bind="false" 
									data-bind="source: meterList, value: meter, events: {change : meterChange}" 
									data-option-label="(--- ជ្រើសរើស ---)" ></select>				
							</div>
							
							<div class="row-fluid">
								<div class="span6">
									<div data-role="grid" data-bind="source: readingList"
							            data-auto-bind="false" data-row-template="noticeReadingRowTemplate"                  
							            data-columns='[	                 	
							                { title: "", width: 30 },
							                { title: "ថ្ងៃអាន" },
							                { title: "ដល់" },	                     
							                { title: "អំនានសរុប" }							                                    	                    
							                ]'>
									</div>									
								</div>

								<div class="span6">
									<table width="100%">
										<tr>
											<td>ថាមពលមធ្យម</td>
											<td>
												<span data-bind="text: totalReading"></span> Kw
												/
												<span data-bind="text: selectedReading"></span>
												=
												<span data-bind="text: avg"></span> Kw
											</td>											
										</tr>
										<tr>
											<td>ថាមពលប្រើប្រាស់ក្នុងមួយថ្ងៃ</td>
											<td>
												<span data-bind="text: avg"></span> Kw
												/ 30 ថ្ងៃ =												
												<span data-bind="text: usage_per_day"></span> Kw
											</td>											
										</tr>
									</table>

									<span class="btn btn-primary btn-icon glyphicons refresh" data-bind="click: reset"><i></i>លុបចោល</span>
									
								</div>
							</div>
						</div>
						
						<div class="tab-pane" id="tab2-2">
							<h4 align="center">លិខិតរំលឹក</h4>

							<div class="row-fluid">
								<div class="span8">
									<table cellpadding="2" cellspacing="2">										        
										<tr>
							                <td>Class</td>
							              	<td><select data-role="combobox" data-text-field="name" data-value-field="id" data-bind="source: classList, value: class_id"></select></td>
							            <tr>            
										<tr>
											<td colspan="2">
												ទីតាំង
												<br>
												<textarea id="address" cols="0" rows="2" class="k-textbox" style="width:250px" data-bind="value: address"></textarea>
											</td>
										</tr>
									</table>
								</div>	

								<div class="span4">							
									<table cellpadding="2" cellspacing="2">
										<tr>				
											<td>លេខវិក្ក​យបត្រ	</td>
											<td><input class="k-textbox" data-bind="value: number" style="width:140px;" readonly /></td>
										</tr>			
										<tr>
											<td>ថ្ងៃចេញលិខិតរំលឹក</td>
											<td><input data-role="datepicker" data-bind="value: issued_date" data-format="dd-MM-yyyy" /></td>
										</tr>
										<tr>
							                <td>កាលកំណត់</td>
							              	<td><select data-role="combobox" data-text-field="term" data-value-field="id" data-bind="source: paymentTermList, value: payment_term_id"></select></td>
							            <tr>
										<tr>
											<td>ថ្ងៃបង់ប្រាក់</td>
											<td><input data-role="datepicker" data-bind="value: due_date" data-format="dd-MM-yyyy" /></td>
										</tr>																            
									</table>
								</div>           		          	
						    </div>													

							<div data-role="grid" data-bind="source: noticeItemList"
						        data-auto-bind="false" data-row-template="noticeRowTemplate"                  
						        data-columns='[						        	
						            { title: "អំនានប្រចាំខែ", width: 135 },	                     
						            { title: "ចំនួនថ្ងៃ", width: 85 },
						            { title: "Kw/ថ្ងៃ", width: 55 },
						            { title: "ថាមពល", width: 60 },						            
						            { title: "តំលៃរាយ" },
						            { title: "ទឹកប្រាក់" },
						            { title: "ប្រាក់បង់រូច" },
						            { title: "ទឹកប្រាក់សរុប" }	                    	                    
						        ]'>
							</div>							
							<button class="btn btn-inverse" data-bind="click: addNewRow"><i class="icon-plus icon-white"></i></button>
							
							<div class="row-fluid">
								<div class="span8">
									អាសយដ្ឋាន
									<br>
									<textarea id="memo" cols="0" rows="4" class="k-textbox" style="width:300px" data-bind="value: memo"></textarea>								
								</div>

								<div class="span4">			
									<div class="innerAll padding-bottom-none-phone">
										<a data-bind="click: createNotice" class="widget-stats widget-stats-primary widget-stats-4">
											<span class="txt">សរុប</span>
											<span class="count" style="font-size: 35px;" data-bind="text: total"></span>
											<span class="glyphicons cart_in"><i></i></span>
											<div class="clearfix"></div>
											<i class="icon-play-circle"></i>
										</a>
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
<script id="noticeReadingRowTemplate" type="text/x-kendo-tmpl">		
	<tr>
		<td><input type="checkbox" data-bind="checked: isCheck, events: {change : checkboxChange}"></td>				
		<td>#:kendo.toString(date_read_from, 'dd-MM-yyyy')#</td>		
		<td>#:kendo.toString(date_read_to, 'dd-MM-yyyy')#</td>		
		<td>#:active_usage#</td>				
    </tr>   
</script>
<script id="noticeRowTemplate" type="text/x-kendo-tmpl">		
	<tr>				
		<td>
			<input data-role="datepicker" data-bind="value: month_of, events: {change : monthOfChange}" 
				data-start="year" data-depth="year"	data-format="MM-yyyy" style="width:120px;" />
		</td>		
		<td>
			<input data-role="numerictextbox" data-format="n0" data-min="0" data-max="30" 
				data-bind="value: days" style="width: 70px;">
		</td>
		<td align="right">#:usage_per_day#</td>
		<td align="right">#:days*kendo.parseInt(usage_per_day)#</td>
		<td align="right">#:kendo.toString(unit_price, 'c0')#</td>
		<td align="right">#:kendo.toString((days*kendo.parseInt(usage_per_day))*unit_price, 'c0')#</td>
		<td align="right">#:kendo.toString(amount_paid, 'c0')#</td>		
		<td align="right">
			#:kendo.toString(((kendo.parseInt(days*usage_per_day))*unit_price)-amount_paid, 'c0')#
			<i class="icon-trash" data-bind="events: { click: removeRow "></i>
		</td>					
    </tr>   
</script>

<!-- Statement -->
<script id="statement" type="text/x-kendo-template">
	<div class="row-fluid">    
		<div class="span12">
			<div id="example" class="k-content">
				<div>
					<input data-role="datepicker" data-format="dd-MM-yyyy" data-bind="value: statement_date" placeholder="កាលបរិច្ឆេទ" />
					<br>
					<input data-role="datepicker" data-format="dd-MM-yyyy" data-bind="value: start_date" placeholder="ចាប់ពី" />
					<input data-role="datepicker" data-format="dd-MM-yyyy" data-bind="value: end_date" placeholder="ដល់" />
					<button type="button" class="btn btn-default" data-bind="click: loadStatement"><i class="icon-search"></i></button>
					<button type="button" class="btn btn-default" data-bind="click: printStatement"><i class="icon-print"></i></button>					
				</div>				

				<div id="divStatement">
					<h3 align="center">បញ្ជីបំណុល</h3>

					<div class="row-fluid">
						<div class="span4">				
							ឈ្មោះ : 
				        	<span data-bind="text: customer.surname"></span>
				        	<span data-bind="text: customer.name"></span>
				        	<br>
				          	អាសយដ្ឋាន
				          	<br>
				          	<textarea id="address" cols="0" rows="2" class="k-textbox" style="width:250px" data-bind="text: customer.address"></textarea>
				          		
						</div>

					    <div class="span4">
					    	
					    </div>

						<div class="span4">
							<p align="right">
				              	កាលបរិច្ឆេទ
				              	<span data-bind="text: statement_date_text"></span>
				              	<br>
					          	ប្រាក់ត្រូវបង់
				          	</p>

				          	<br>

				          	<div align="right">		          		
				          		<span data-bind="text: amount_due"
				          			style="color: white; font-size: 30px; background-color:maroon; border:0px solid black; padding: 5px;"></span>		          			          		
				          	</div>   		          	
					    </div>
					</div>

					<br>
			        		        	
			        <div data-role="grid" data-bind="source: statementList"
				        data-auto-bind="false" 
				        data-row-template="statementRowTemplate"                  
				        data-columns='[						        	
				            { title: "កាលបរិច្ឆេទ" },	                     
				            { title: "បរិយាយ" },
				            { title: "ទឹកប្រាក់" },
				            { title: "សមតុល្យ" }                    	                    
				        ]'>
					</div>

					<br>

					<div data-role="grid" data-bind="source: agingList"
				        data-auto-bind="false" 
				        data-row-template="agingRowTemplate"                  
				        data-columns='[						        	
				            { title: "បច្ចុប្បន្ន" },	                     
				            { title: "១-៣០ថ្ងៃ" },
				            { title: "៣១-៦០ថ្ងៃ" },
				            { title: "៦១-៩០ថ្ងៃ" },
				            { title: "លើសពី ៩០ថ្ងៃ" },
				            { title: "ទឹកប្រាក់ត្រូវបង់" }                    	                    
				        ]'>
					</div>			        

				</div>

			</div>           
		</div> 		
	</div> 		
</script>
<script id="statementRowTemplate" type="text/x-kendo-tmpl">		
	<tr>		
		<td>#:kendo.toString(new Date(issued_date), 'dd-MM-yyyy')#</td>
		<td>
			#if(kendo.parseFloat(amount)>0){#
				<a href="\#invoice/#=id#">#:description#</a>
			#}else{#
				#:description#
			#}#
		</td>
		<td align="right">#:kendo.toString(kendo.parseFloat(amount), 'c0')#</td>		
		<td align="right">
			#:kendo.toString(kendo.parseFloat(balance), 'c0')#			
		</td>					
    </tr>   
</script>
<script id="agingRowTemplate" type="text/x-kendo-tmpl">		
	<tr>		
		<td align="right">#:kendo.toString(kendo.parseFloat(current), 'c')#</td>		
		<td align="right">#:kendo.toString(kendo.parseFloat(within30), 'c')#</td>
		<td align="right">#:kendo.toString(kendo.parseFloat(within60), 'c')#</td>
		<td align="right">#:kendo.toString(kendo.parseFloat(within90), 'c')#</td>
		<td align="right">#:kendo.toString(kendo.parseFloat(over90), 'c')#</td>
		<td align="right">
			#:kendo.toString(kendo.parseFloat(current) +
							kendo.parseFloat(within30) +
							kendo.parseFloat(within60) +
							kendo.parseFloat(within90) +
							kendo.parseFloat(over90), 'c')#
		</td>					
    </tr>   
</script>

<!-- Cashier -->
<script id="cashier" type="text/x-kendo-template">
	<div class="container-fluid">
		<div class="row-fluid">				
			<div class="span12">
				<div id="example">
					<div align="right" data-bind="click: closeX, visible: isSingle">
						<button id="closeX" type="button" aria-hidden="true">X</button>
					</div>

					<div class="row-fluid">
						<div class="span3">
							<br>

							<input id="txtSearch" style="width: 265px"  />

							<br><br>							
					      					
							<h5><i class="icon-info-sign"></i> ពត៌មានសង្ខេបអតិថិជន</h5>				
							<table width="100%" style="background-color:Silver; color:black;">
								<tr>
									<td colspan="2">
										<i class="icon-user icon-li icon-fixed-width"></i> 
										<span data-bind="text: customer.number"></span>
										<span data-bind="text: customer.surname"></span>
										<span data-bind="text: customer.name"></span>
									</td>																			
								</tr>
								<tr>
									<td colspan="2">								
										សមតុល្យ: <span data-bind="text: balance"></span>
									</td>
								</tr>
								<tr>
									<td colspan="2">
										ប្រាក់កក់: <span data-bind="text: deposit_amount"></span>
									</td>							
								</tr>
								<tr>
									<td>
										<i class="icon-money icon-li icon-fixed-width"></i> <span data-bind="text: customer.currency_code"></span>
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
							
							<div id="transactionGrid" data-role="grid" data-bind="source: statementCollectionList"
					            data-row-template="cashier-Transaction-Row-Template" data-auto-bind="false"                  
					            data-columns='[{ title: "ថ្ងៃ-ខែ-ឆ្នាំ", width: 70 }, 
					                { title: "ប្រភេទ", width: 85 },	                     
					                { title: "ទឹកប្រាក់" }	                    
					                ]'>
							</div>
						
						</div> <!-- //End span3 -->

						<div class="span9">
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
										<a href="#payment_detail" class="widget-stats widget-stats-primary widget-stats-4">
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
										<a href="#reconcile" class="widget-stats widget-stats-inverse widget-stats-5">
											<span class="glyphicons refresh"><i></i></span>
											<span class="txt">ផ្ទៀងផ្ទាត់ &<br><br> ផ្ទេរសាច់ប្រាក់</span>
											<div class="clearfix"></div>
										</a>
									</div>
								</div>				

							</div> <!-- //End row-fluid -->
							
							<br>

							<div class="row-fluid">
								<div class="span4">						
									<table>								
										<tr>
							                <td>Class</td>
							              	<td><select id="classes" name="classes" data-role="combobox" 
							              				data-text-field="name" data-value-field="id" 
							              				data-bind="source: classList, value: class_id"
							              				required data-required-msg="ត្រូវការ Class"></select>
							              	</td>
							            </tr>
										<tr>
						                    <td>វីធីបង់ប្រាក់</td>
						                  	<td>
						                  		<select id="paymentMethod" name="paymentMethod" data-role="combobox"
						                  				data-text-field="name" data-value-field="id" 
						                  				data-bind="source: paymentMethodList, value: payment_method_id"
						                  				required data-required-msg="ត្រូវការ វីធីបង់ប្រាក់"></select>
						                  	</td>
						                <tr>
										<tr>
							                <td>លេខកូដសែក</td>
							                <td><input id="check_no" class="k-textbox" data-bind="value: check_no" /></td>
							            <tr>
							            <tr>
											<td>គណនីសាច់ប្រាក់</td>
											<td>
												<select id="cashAccount" name="cashAccount" data-role="combobox" 
														data-text-field="name" data-value-field="id" 
														data-bind="source: cashAccountList, value: cash_account_id"
														required data-required-msg="ត្រូវការ គណនីសាច់ប្រាក់"></select>
											</td>
										</tr>
									</table>							
								</div>
								<div class="span4">

								</div>
								<div class="span4">
									<p>
						              	ថ្ងៃទទួលប្រាក់
						              	<input id="paymentDate" name="paymentDate" data-role="datepicker" 
						              			data-bind="value: payment_date" data-format="dd-MM-yyyy"
						              			required data-required-msg="ត្រូវការ ថ្ងៃទទួលប្រាក់" />
						              	<br>
							          	ប្រាក់ត្រូវបង់
						          	</p>
						          	
						          	<br>

						          	<div align="right">		          		
						          		<span data-bind="text: total"
						          			style="color: white; font-size: 30px; background-color:maroon; border:0px solid black; padding: 5px;"></span>		          			          		
						          	</div>					          	
								</div>
							</div>
							
							<br>

							<div data-role="grid" data-bind="source: invoiceList"
					            data-auto-bind="false" data-row-template="invoiceCashierRowTemplate"                  
					            data-columns='[{ title: "", width: 25 },	                 	
					                { title: "ល.រ", width: 40 },
					                { title: "កាលបរិច្ឆេទ", width: 90 },	                     
					                { title: "ឈ្មោះ" },
					                { title: "# វិក្កយបត្រ" },
					                { title: "ទឹកប្រាក់" },	                    	                     
					                { title: "ទទួលប្រាក់" }	                    	                    
					                ]'>
							</div>
							
							<br>

							<div id="status"></div>

							<div class="row-fluid">
								<div class="span6">
									<div class="innerAll padding-bottom-none-phone">
										<a id="save" name="save" class="widget-stats widget-stats-info widget-stats-4">
											<span class="txt">ទឹកប្រាក់ទទួលបាន</span>
											<span class="count" style="font-size: 35px;" data-bind="text: pay_amount"></span>
											<span class="glyphicons cart_in"><i></i></span>
											<div class="clearfix"></div>
											<i class="icon-play-circle"></i>
										</a>
									</div>
								</div>
								<div class="span2">

								</div>
								<div class="span4">
									<table>
										<tr>
											<td>ទឹកប្រាក់ត្រូវបង់:</td>
											<td align="right"><span data-bind="text: total"></span></td>
										</tr>
										<tr>
											<td>បញ្ចុះតំលៃ:</td>
											<td><input data-role="numerictextbox" data-format="c0" data-bind="value: discount, events: {change : change}" /></td>
										</tr>
										<tr>
											<td>ទឹកប្រាក់ពិន័យ:</td>							
											<td><input data-role="numerictextbox" data-format="c0" data-bind="value: fine, events: {change : change}" /></td>
										</tr>
										<tr>
											<td>ទឹកប្រាក់ទទួលបាន:</td>
											<td align="right"><span data-bind="text: pay_amount"></span></td>
										</tr>
										<tr>
											<td>នៅសល់:</td>
											<td align="right"><span data-bind="text: remain"></span></td>
										</tr>
									</table>
								</div>
							</div>
						</div> <!-- //End span9 -->
					</div>
				</div> <!-- //End example -->
			</div>
		</div>
	</div>
</script>
<script id="cashier-Transaction-Row-Template" type="text/x-kendo-tmpl">
    <tr>        
        <td>#:kendo.toString(new Date(issued_date), "dd-MM-yy")#</td>
        <td>#:type# </td>
        <td align="right">#:kendo.toString(kendo.parseFloat(amount), "c", sub_code)#</td>        
   	</tr>
</script>
<script id="invoiceCashierRowTemplate" type="text/x-kendo-tmpl">		
	<tr id="rowGrid-#:id#">
		<td>
			<input type="checkbox" data-bind="checked: isPay, events:{change: checkPay}">			
		</td>
		<td class="sno">1</td>			
		<td>#:kendo.toString(new Date(issued_date), "dd-MM-yyyy")#</td>		
		<td>#=fullname#</td>
		<td>#:number#</td>				
		<td align="right">#:kendo.toString(total, "c", sub_code)#</td>
		<td>
			<input id="payment" name="payment" data-role="numerictextbox" 
					data-format="c" data-culture=#:sub_code#
					data-bind="value: pay_amount, events: {change : change}" 
					style="width: 120px;">
			<i class="icon-trash" data-bind="events: { click: remove "></i>						
		</td>				
    </tr>   
</script>

<!-- Reports By Dawine -->
<script id="customerList" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="row-fluid">
			<div class="span12">
				<div id="example" class="k-content">
					<div class="hidden-print">
						<a href="javascript:void()" 
							class="pull-right glyphicons no-js remove_2" 
							onclick="javascript: window.history.back()"><i></i></a>

						<input id="company" />		                

						<button id="search" type="button" class="btn btn-default"><i class="icon-search"></i></button>
						<button type="button" class="btn btn-default" onclick="javascript:window.print()"><i class="icon-print"></i></button>						
					</div>

					<h3 align="center">បញ្ជីអតិថិជន</h3>	

					<div id="grid"></div>

					<br>
				    					
				</div> <!-- //End div example--> 
			</div><!-- //End div span12-->
		</div><!-- //End div row-fluid-->
	</div>	
</script>
<script id="paymentSummary" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span12">
					<div id="example" class="k-content">
						
						<div class="hidden-print">
							<a href="javascript:void()" 
								class="pull-right glyphicons no-js remove_2" 
								onclick="javascript: window.history.back()"><i></i></a>

							<select id="dateSorter" 
								data-role="dropdownlist" 
								data-bind="value: date_sorter, events:{change:dateSorterChange}">
								   	<option value="all">ទាំងអស់</option>
								   	<option value="today">ថ្ងៃនេះ</option>
								  	<option value="week">សប្ដាស៍នេះ</option>
								  	<option value="month">ខែនេះ</option>
								  	<option value="year">ឆ្នាំនេះ</option>
							</select>

							<input data-role="datepicker" 
								data-bind="value: start_date" 
								data-format="dd-MM-yyyy"
								placeHolder="ចាប់ពី" />

							<input data-role="datepicker" 
								data-bind="value: end_date" 
								data-format="dd-MM-yyyy" 
								placeHolder="ដល់" />

							<select data-role="dropdownlist"
	            				data-bind="value: group_by"> 
	          					<option value="people.people_type_id">ប្រភេទអតិថិជន</option>
								<option value="transformers.id">តំបន់</option>
	            			</select>

							<select id="cashier" data-role="dropdownlist" 
	          					data-text-field="fullname" 
	          					data-value-field="login_credential_id"
	          					data-value-primitive="true" 
	            				data-bind="source: cashierList, value: cashier, events:{change: cashierChanges}"
	            				data-option-label="(--- ទាំងអស់ ---)">
	            			</select>	            				            			

							<button id="search" type="button" class="btn btn-default"><i class="icon-search"></i></button>
							<button type="button" class="btn btn-default" onclick="javascript:window.print()"><i class="icon-print"></i></button>							
						</div>

						<br>

						<div align="center">
							<h4>របាយការណ៍ទទួលប្រាក់សង្ខេប</h4>
							
							<span data-bind="text: start_date_str"></span>																	
							<span data-bind="text: end_date_str"></span>
							<br>							
							<span data-bind="text: cashier_name"></span>									
						</div>

						<br>						

						<div id="grid"></div>

					</div><!-- //End div example-->
				</div><!-- //End div span12-->
			</div><!-- //End div row-fluid-->
		</div>
	</div>	
</script>
<script id="paymentDetail" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span12">
					<div id="example" class="k-content">

						<div class="hidden-print">
							<a href="javascript:void()" 
								class="pull-right glyphicons no-js remove_2" 
								onclick="javascript: window.history.back()"><i></i></a>

							<select id="dateSorter" 
								data-role="dropdownlist" 
								data-bind="value: date_sorter, events:{change:dateSorterChange}">
								   	<option value="all">ទាំងអស់</option>
								   	<option value="today">ថ្ងៃនេះ</option>
								  	<option value="week">សប្ដាស៍នេះ</option>
								  	<option value="month">ខែនេះ</option>
								  	<option value="year">ឆ្នាំនេះ</option>
							</select>

							<input data-role="datepicker" 
								data-bind="value: start_date" 
								data-format="dd-MM-yyyy"
								placeHolder="ចាប់ពី" />

							<input data-role="datepicker" 
								data-bind="value: end_date" 
								data-format="dd-MM-yyyy" 
								placeHolder="ដល់" />

							<select id="cashier" data-role="dropdownlist" 
	          					data-text-field="fullname" 
	          					data-value-field="login_credential_id"
	          					data-value-primitive="true" 
	            				data-bind="source: cashierList, value: cashier, events:{change: cashierChanges}"
	            				data-option-label="(--- ទាំងអស់ ---)">
	            			</select>	            				            			

							<button id="search" type="button" class="btn btn-default"><i class="icon-search"></i></button>
							<button type="button" class="btn btn-default" onclick="javascript:window.print()"><i class="icon-print"></i></button>							
						</div>

						<br>

						<div align="center">
							<h4>របាយការណ៍ទទួលប្រាក់លំអិត</h4>
							
							<span data-bind="text: start_date_str"></span>																	
							<span data-bind="text: end_date_str"></span>
							<br>							
							<span data-bind="text: cashier_name"></span>									
						</div>

						<br>

            			<select id="groupBy" class="hidden-print" data-role="dropdownlist"
            				data-bind="enabled: hasData"> 
          					<option value="people_type">ប្រភេទអតិថិជន</option>
							<option value="transformer_number">តំបន់</option>
            			</select>

						<div id="grid"></div>
						
					</div><!-- //End div example-->
				</div><!-- //End div span12-->
			</div><!-- //End div row-fluid-->
		</div>
	</div>	
</script>
<script id="reconcile" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span12">
					<div id="example" class="k-content">
						
						<div class="hidden-print">
							<a href="javascript:void()" 
								class="hidden-print pull-right glyphicons no-js remove_2" 
								onclick="javascript: window.history.back()"><i></i></a>

							<input data-role="datepicker" 
									data-bind="value: searchDate" 
									data-format="dd-MM-yyyy" />							          				            			

							<button id="search" type="button" class="btn btn-default"><i class="icon-search"></i></button>
							<button type="button" class="btn btn-default" onclick="javascript:window.print()"><i class="icon-print"></i></button>
							<br>
							<span class="label label-warning" data-bind="visible: isExisting">បានផ្ទៀងផ្ទាត់រួចហើយ</span>
						</div>

						<div align="center">
							<h4>របាយការណ៍ផ្ទៀងផ្ទាត់ និង ផ្ទេរសាច់ប្រាក់</h4>
							ថ្ងៃទី
							<span data-bind="text: str_date"></span>
							<br>
							ដោយ
							<span data-bind="text: cashier_name"></span>
						</div>

						<div data-role="grid" data-bind="source: denominationList" 
							data-editable="true"						
				            data-row-template="denominationRowTemplate"                  
				            data-columns='[	                
				                { title: "ប្រាក់", width: 65 },	                
				                { title: "ចំនួនប្រាក់ដុល្លា" },
				                { title: "ចំនួនប្រាក់រៀល" },	                    	                     
				                { title: "ទឹកប្រាក់ជាដុល្លា" },
				                { title: "ទឹកប្រាក់ជារៀល" },
				                { title: "ចំ.ប្រាក់ដុល្លាផ្ទេរ" },
				                { title: "ចំ.ប្រាក់រៀលផ្ទេរ" },	                    	                     
				                { title: "ប្រាក់ជាដុល្លាផ្ទេរ" },
				                { title: "ប្រាក់ជារៀលផ្ទេរ" }	                    	                    
				                ]'>
						</div>

						<br>

						<div class="row-fluid">
							<!-- //Reconcile -->
							<div class="span6">
								<h4 class="heading">ផ្ទៀងផ្ទាត់</h4>

								<table class="table table-condensed">
									<tr>
										<td>ប្រាក់ទទួលបាន</td>
										<td></td>											
										<td align="right"><span class="count" data-bind="text: totalReceive"></span></td>												
									</tr>
									<tr>
										<td>ប្រាក់នៅសល់ពីមុន</td>
										<td></td>											
										<td align="right" style="border-bottom: 1px solid black;"><span class="count" data-bind="text: prevRemain"></span></td>												
									</tr>
									<tr>
										<td>សមតុល្យសាច់ប្រាក់ (ក)</td>
										<td></td>												
										<td align="right"><span class="count" data-bind="text: totalCash"></span></td>
									</tr>

									<!-- Reconcile -->
									<tr>
										<td>ប្រាក់ជាដុល្លា</td>
										<td>
											$ <span class="count" data-bind="text: totalD"></span> x
											<input data-role="numerictextbox" data-format="c0" data-min="0" data-bind="value: rate"  style="width:70px;">
										</td>
										<td align="right"><span class="count" data-bind="text: totalDtoR"></span></td>												
									</tr>
									<tr>
										<td>ប្រាក់ជារៀល</td>
										<td></td>
										<td align="right" style="border-bottom: 1px solid black;"><span class="count" data-bind="text: totalR"></span></td>												
									</tr>
									<tr>
										<td>សាច់ប្រាក់ទទួលជាក់ស្ដែងសរុប (ខ)</td>
										<td></td>												
										<td align="right"><span class="count" data-bind="text: totalDR"></span></td>
									</tr>
									<tr id="reconcileBalance">
										<td>ផ្ទៀងផ្ទាត់(ក-ខ)</td>
										<td></td>												
										<td align="right"><span class="count" data-bind="text: reconcileBalance"></span></td>
									</tr>																				
								</table>
							</div>

							<!-- //Transfer -->
							<div class="span6">
								<div class="heading">
									<h4>
										ផ្ទេរសាច់ប្រាក់
										<span class="btn btn-mini btn-primary btn-icon glyphicons share" data-bind="click: transferAll"><i></i> ផ្ទេរទាំងអស់</span>
									</h4>											
								</div>
								
								<table class="table table-condensed">
									<tr>
										<td>ប្រាក់ផ្ទេរជាដុល្លា</td>
										<td>
											$ <span class="count" data-bind="text: totalDT"></span> x
											<input data-role="numerictextbox" data-format="c0" data-min="0" data-bind="value: rate"  style="width:70px;">												
										</td>
										<td align="right"><span class="count" data-bind="text: totalDTtoRT"></span></td>												
									</tr>
									<tr>
										<td>ប្រាក់ផ្ទេរជារៀល</td>
										<td></td>
										<td align="right" style="border-bottom: 1px solid black;"><span class="count" data-bind="text: totalRT"></span></td>												
									</tr>
									<tr>
										<td>ប្រាក់ផ្ទេរសរុប</td>
										<td></td>												
										<td align="right"><span class="count" data-bind="text: totalTransferCash"></span></td>
									</tr>
									<tr>
										<td>សាច់ប្រាក់ចុងគ្រា</td>
										<td></td>												
										<td align="right"><span class="count" data-bind="text: transferBalance"></span></td>
									</tr>
									<tr>
										<td>ផ្ទេរទៅគណនីណាមួយ</td>
										<td>
											<select id="transferAccountId" name="transferAccountId" data-role="combobox" 
												data-text-field="name" data-value-field="id"
												data-value-primitive="true" 
												data-bind="source: cashAccountList, value: transfer_account_id"
												required data-required-msg="ត្រូវការ ផ្ទេរទៅគណនីណាមួយ"></select>
										</td>
										<td>
											<select id="classes" name="classes" data-role="combobox" 
					              				data-text-field="name" data-value-field="id"
					              				data-value-primitive="true" 
					              				data-bind="source: classList, value: class_id"
					              				placeholder="Class"
					              				required data-required-msg="ត្រូវការ Class"></select>
						              	</td>
									</tr>
									<tr align="top">
										<td>សំគាល់:</td>
										<td colspan="2">
											<textarea cols="0" rows="2" class="k-textbox" style="width:100%" data-bind="value: memo"></textarea>
										</td>
									</tr>								
								</table>
								
								<div align="right">
									<div id="status"></div>
									<span id="save" class="btn btn-success btn-icon glyphicons hdd" data-bind="disabled: isExisting"><i></i>កត់ត្រាផ្ទៀងផ្ទាត់ និង ផ្ទេរសាច់ប្រាក់</span>											
								</div>																			
							</div>									
						</div>				
					</div><!-- //End div example-->
				</div><!-- //End div span12-->
			</div><!-- //End div row-fluid-->
		</div>
	</div>	
</script>
<script id="denominationRowTemplate" type="text/x-kendo-tmpl">		
	<tr align="right">				
		<td>#:kendo.toString(kendo.parseFloat(denomination), "n0")#</td>
		<td>
			<input data-role="numerictextbox" data-format="n0" data-min="0" style="width:90px;"
				data-bind="value: qty_usd, events: {change : change}" #: denomination>100 ? disabled="disabled" : "" # >
		</td>
		<td>
			<input data-role="numerictextbox" data-format="n0" data-min="0" style="width:90px;"
				data-bind="value: qty_khr, events: {change : change}" #: denomination<100 ? disabled="disabled" : "" # >
		</td>
		<td>$#:kendo.toString(denomination * qty_usd,'n0')#</td>
		<td>#:kendo.toString(denomination * qty_khr,'c0')#</td>

		<td bgcolor="silver">
			<input data-role="numerictextbox" data-format="n0" data-min="0" style="width:90px;"
				data-bind="value: qty_usd_transfer, events: {change : change}" #: denomination>100 ? disabled="disabled" : "" # >
		</td>
		<td bgcolor="silver">
			<input data-role="numerictextbox" data-format="n0" data-min="0" style="width:90px;"
				data-bind="value: qty_khr_transfer, events: {change : change}" #: denomination<100 ? disabled="disabled" : "" # >
		</td>
		<td bgcolor="silver">$#:kendo.toString(denomination * qty_usd_transfer,'n0')#</td>
		<td bgcolor="silver">#:kendo.toString(denomination * qty_khr_transfer,'c0')#</td>					
    </tr>   
</script>
<script id="agingSummary" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="row-fluid">
			<div class="span12">
				<div id="example" class="k-content">
					<div class="hidden-print">
						<a href="javascript:void()" 
							class="pull-right glyphicons no-js remove_2" 
							onclick="javascript: window.history.back()"><i></i></a>

						<input data-role="dropdownlist"
		            		data-option-label="(--- រើស អាជ្ញាបណ្ណ ---)"						            							                   
		                   	data-value-primitive="true"
		                   	data-text-field="abbr"
		                   	data-value-field="id"
		                   	data-bind="value: company_id,
		                              source: companyList, 
		                              events: { change: companyChanges }"/>

		                <input data-role="dropdownlist"
		            		data-option-label="(--- រើស តំបន់ ---)"						            		
		            		data-auto-bind="false"						                   
		                   	data-value-primitive="true"
		                   	data-text-field="transformer_number"
		                   	data-value-field="id"						                   	
		                   	data-bind="value: transformer_id,
		                              source: transformerList"/>
						<input data-role="datepicker" data-bind="value: issued_date" data-format="dd-MM-yyyy" placeHolder="កាលបរិច្ឆេទ" />
						<button id="search" type="button" class="btn btn-default"><i class="icon-eye-open"></i></button>				
					</div>

					<div id="divAging">
						<div align="center">
							<h3>បំណុលអតិថិជនសង្ខេប</h3>
							គិតត្រឹម
							<span data-bind="text: issued_date_text"></span>
						</div>
						
						<div data-role="grid" data-bind="source: agingList"
					        data-auto-bind="false" data-row-template="agingSummaryRowTemplate"
					        data-pageable="true"                  
					        data-columns='[					            
					            { title: "ឈ្មោះ" },
					            { title: "បច្ចុប្បន្ន" },	                     
					            { title: "១-៣០ថ្ងៃ" },
					            { title: "៣១-៦០ថ្ងៃ" },
					            { title: "៦១-៩០ថ្ងៃ" },
					            { title: "លើសពី ៩០ថ្ងៃ" },
					            { title: "សរុប" }                    	                    
					        ]'>
						</div>
					</div>					
				</div><!-- //End div example-->
			</div><!-- //End div span12-->
		</div><!-- //End div row-fluid-->	
	</div>	
</script>
<script id="agingSummaryRowTemplate" type="text/x-kendo-tmpl">		
	<tr>		
		<td>#=fullname#</td>		
		<td align="right">#:kendo.toString(kendo.parseFloat(current), 'c0')#</td>		
		<td align="right">#:kendo.toString(kendo.parseFloat(within30), 'c0')#</td>
		<td align="right">#:kendo.toString(kendo.parseFloat(within60), 'c0')#</td>
		<td align="right">#:kendo.toString(kendo.parseFloat(within90), 'c0')#</td>
		<td align="right">#:kendo.toString(kendo.parseFloat(over90), 'c0')#</td>
		<td align="right">
			#:kendo.toString(kendo.parseFloat(current) +
							kendo.parseFloat(within30) +
							kendo.parseFloat(within60) +
							kendo.parseFloat(within90) +
							kendo.parseFloat(over90), 'c0')#
		</td>					
    </tr>   
</script>
<script id="agingDetail" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="row-fluid">
			<div class="span12">
				<div id="example" class="k-content">
					<div class="hidden-print">
						<a href="javascript:void()" 
							class="pull-right glyphicons no-js remove_2" 
							onclick="javascript: window.history.back()"><i></i></a>

						<input data-role="dropdownlist"
		            		data-option-label="(--- រើស អាជ្ញាបណ្ណ ---)"						            							                   
		                   	data-value-primitive="true"
		                   	data-text-field="abbr"
		                   	data-value-field="id"
		                   	data-bind="value: company_id,
		                              source: companyList, 
		                              events: { change: companyChanges }"/>

		                <input data-role="dropdownlist"
		            		data-option-label="(--- រើស តំបន់ ---)"						            		
		            		data-auto-bind="false"						                   
		                   	data-value-primitive="true"
		                   	data-text-field="transformer_number"
		                   	data-value-field="id"						                   	
		                   	data-bind="value: transformer_id,
		                              source: transformerList"/>

						<input data-role="datepicker" data-bind="value: issued_date" data-format="dd-MM-yyyy" placeHolder="កាលបរិច្ឆេទ" />
						<button id="search" type="button" class="btn btn-default"><i class="icon-eye-open"></i></button>				
					</div>
					
					<div align="center">
						<h3>បំណុលអតិថិជនលំអិត</h3>
						គិតត្រឹម
						<span data-bind="text: issued_date_text"></span>
					</div>
					
					<div data-role="grid" data-bind="source: agingList"
				        data-auto-bind="false" data-row-template="agingDetailRowTemplate"
				        data-pageable="true"                 
				        data-columns='[				            
				            { title: "ឈ្មោះ" },				            
				            { title: "លេខវិក្កយបត្រ" },
				            { title: "ថ្ងៃចេញវិក្កយបត្រ" },	                     
				            { title: "ថ្ងៃផុតកំណត់" },
				            { title: "អាយុកាល" },				            
				            { title: "ទឹកប្រាក់" }               	                    
				        ]'>
					</div>									
				</div><!-- //End div example-->
			</div><!-- //End div span12-->
		</div><!-- //End div row-fluid-->	
	</div>	
</script>
<script id="agingDetailRowTemplate" type="text/x-kendo-tmpl">		
	<tr>		
		<td>#:number# #:surname# #:name#</td>		
		<td></td>		
		<td></td>
		<td></td>
		<td></td>
		<td></td>
    </tr>
    #var total = 0;#
    #if(invoices.length>0){#    	
    	#for (var i=0;i<invoices.length;i++) {#
    		#total += kendo.parseFloat(invoices[i].amount)/kendo.parseFloat(invoices[i].rate)#    	
	    	<tr>	    		
	    		<td align="right">
	    			#if(invoices[i].type==="eInvoice"){#								
						វិក្កយបត្រអគ្គីសនី
					#}else if(invoices[i].type==="Notice"){#
						លិខិតរំលឹក
		        	#}else{#
		        		វិក្កយបត្រ
		        	#}#	    			
	    		</td>
				<td>
					#if(invoices[i].type==="Invoice"){#								
						<a href="\#invoice/#=invoices[i].id#"><i></i> #=invoices[i].number#</a>					
		        	#}else{#
		        		#=invoices[i].number#
		        	#}#					
				</td>		
				<td>#:kendo.toString(new Date(invoices[i].issued_date), "dd-MM-yyyy")#</td>
				<td>#:kendo.toString(new Date(invoices[i].due_date), "dd-MM-yyyy")#</td>
				<td>
					# var date = new Date(), dueDate = new Date(invoices[i].due_date).getTime(), toDay = new Date(date).getTime();#
					#if(dueDate < toDay) {#
						លើសកំណត់ #:Math.floor((toDay - dueDate)/(1000*60*60*24))# ថ្ងៃ
					#} else {#
						#:Math.floor((dueDate - toDay)/(1000*60*60*24))# ថ្ងៃនឹងត្រូវទូទាត់
					#}#
				</td>
				<td align="right">
					#:kendo.toString(kendo.parseFloat(invoices[i].amount)/kendo.parseFloat(invoices[i].rate), "c", invoices[i].sub_code)#
				</td>
	    	</tr>
    	#}#
    #}#
    #if(invoices.length>0){#
    	<tr>		
			<td>សរុប:</td>			
			<td></td>		
			<td></td>
			<td></td>
			<td></td>
			<td align="right" style="border:solid;border-bottom:thick;border-left:thick;border-right:thick;">
				#=kendo.toString(total, "c", invoices[0].sub_code)#
			</td>
	    </tr>
    #}#   
</script>
<script id="eSaleSummary" type="text/x-kendo-template">	
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span12">
				<div id="example" class="k-content">

					<div class="hidden-print">
						<a href="javascript:void()" 
							class="pull-right glyphicons no-js remove_2" 
							onclick="javascript: window.history.back()"><i></i></a>
						
						<input id="monthpicker" placeholder="ប្រចាំខែ" />																				
						<button id="search" type="button" class="btn btn-default"><i class="icon-search"></i></button>
						<button type="button" class="btn btn-default" onclick="javascript:window.print()"><i class="icon-print"></i></button>
					</div>

					<br>

					<div align="center">
						<h4>របាយការណ៍លក់ថាមពលអគ្គីសនីសង្ខេប</h4>
						
						<span id="monthOf"></span>															
					</div>

					<br>            			

					<div id="grid"></div>
					
				</div><!-- //End div example-->
			</div><!-- //End div span12-->
		</div><!-- //End div row-fluid-->
	</div>	
</script>
<script id="wSaleSummary" type="text/x-kendo-template">	
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span12">
				<div id="example" class="k-content">

					<div class="hidden-print">
						<a href="javascript:void()" 
							class="pull-right glyphicons no-js remove_2" 
							onclick="javascript: window.history.back()"><i></i></a>
						
						<input id="monthpicker" placeholder="ប្រចាំខែ" />																				
						<button id="search" type="button" class="btn btn-default"><i class="icon-search"></i></button>
						<button type="button" class="btn btn-default" onclick="javascript:window.print()"><i class="icon-print"></i></button>
					</div>

					<br>

					<div align="center">
						<h4>របាយការណ៍លក់ទឹកស្អាតសង្ខេប</h4>
						
						<span id="monthOf"></span>															
					</div>

					<br>            			

					<div id="grid"></div>
					
				</div><!-- //End div example-->
			</div><!-- //End div span12-->
		</div><!-- //End div row-fluid-->
	</div>	
</script>
<script id="eSaleDetail" type="text/x-kendo-template">	
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span12">
				<div id="example" class="k-content">

					<div class="hidden-print">
						<a href="javascript:void()" 
							class="pull-right glyphicons no-js remove_2" 
							onclick="javascript: window.history.back()"><i></i></a>

						<input id="company" />
						<input id="monthpicker" placeholder="ប្រចាំខែ" />																				
						<button id="search" type="button" class="btn btn-default"><i class="icon-search"></i></button>
						<button type="button" class="btn btn-default" onclick="javascript:window.print()"><i class="icon-print"></i></button>
					</div>

					<br>

					<div align="center">
						<h4>របាយការណ៍លក់ថាមពលអគ្គីសនីលំអិត</h4>
						
						<span id="monthOf"></span>															
					</div>

					<br>            			

					<div id="grid"></div>
					
				</div><!-- //End div example-->
			</div><!-- //End div span12-->
		</div><!-- //End div row-fluid-->
	</div>	
</script>
<script id="wSaleDetail" type="text/x-kendo-template">	
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span12">
				<div id="example" class="k-content">

					<div class="hidden-print">
						<a href="javascript:void()" 
							class="pull-right glyphicons no-js remove_2" 
							onclick="javascript: window.history.back()"><i></i></a>

						<input id="company" />
						<input id="monthpicker" placeholder="ប្រចាំខែ" />														
						<button id="search" type="button" class="btn btn-default"><i class="icon-search"></i></button>
						<button type="button" class="btn btn-default" onclick="javascript:window.print()"><i class="icon-print"></i></button>
					</div>

					<br>

					<div align="center">
						<h4>របាយការណ៍លក់ទឹកស្អាតលំអិត</h4>
						
						<span id="monthOf"></span>															
					</div>

					<br>            			

					<div id="grid"></div>
					
				</div><!-- //End div example-->
			</div><!-- //End div span12-->
		</div><!-- //End div row-fluid-->
	</div>		
</script>
<script id="eLowConsumption" type="text/x-kendo-template">
	<div class="row-fluid">
		<div class="span12">
			<div id="example" class="k-content">
				<div class="hidden-print">
					<a href="javascript:void()" 
						class="pull-right glyphicons no-js remove_2" 
						onclick="javascript: window.history.back()"><i></i></a>

					<input id="company" />
					<input id="monthpicker" placeholder="ប្រចាំខែ" />
					<input id="usage" placeHolder="ថាមពលជាអប្បបរិមា" />		
					<button id="search" type="button" class="btn btn-default"><i class="icon-search"></i></button>
					<button type="button" class="btn btn-default" onclick="javascript:window.print()"><i class="icon-print"></i></button>				
				</div>

				<br>

				<div id="divConsumption">
					<div align="center">
						<h3>អតិថិជនប្រើប្រាស់ថាមពលជាអប្បបរិមា</h3>						
						<span id="strDate"></span>
					</div>
					
					<div id="grid"></div>					
				</div>					
			</div><!-- //End div example-->
		</div><!-- //End div span12-->
	</div><!-- //End div row-fluid-->	
</script>
<script id="wLowConsumption" type="text/x-kendo-template">
	<div class="row-fluid">
		<div class="span12">
			<div id="example" class="k-content">
				<div class="hidden-print">
					<a href="javascript:void()" 
						class="pull-right glyphicons no-js remove_2" 
						onclick="javascript: window.history.back()"><i></i></a>

					<input id="company" />
					<input id="monthpicker" placeholder="ប្រចាំខែ" />
					<input id="usage" placeHolder="ទឹកជាអប្បបរិមា" />		
					<button id="search" type="button" class="btn btn-default"><i class="icon-search"></i></button>
					<button type="button" class="btn btn-default" onclick="javascript:window.print()"><i class="icon-print"></i></button>				
				</div>

				<br>

				<div id="divConsumption">
					<div align="center">
						<h3>អតិថិជនប្រើប្រាស់ទឹកជាអប្បបរិមា</h3>
						គិតត្រឹម
						<span id="strDate"></span>
					</div>
					
					<div id="grid"></div>					
				</div>					
			</div><!-- //End div example-->
		</div><!-- //End div span12-->
	</div><!-- //End div row-fluid-->	
</script>
<script id="eDisconnectList" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span12">
					<div id="example" class="k-content">
						<div class="hidden-print">
							<a href="javascript:void()" 
								class="pull-right glyphicons no-js remove_2" 
								onclick="javascript: window.history.back()"><i></i></a>

							<input id="company" />
							<input id="overDueDay" placeHolder="ចំនួនថ្ងៃផុតកំណត់" />		
							<button id="search" type="button" class="btn btn-default"><i class="icon-search"></i></button>
							<button type="button" class="btn btn-default" onclick="javascript:window.print()"><i class="icon-print"></i></button>				
						</div>

						<div align="center">
							<h3>តារាងផ្ដាច់ចរន្ត</h3>		
						</div>
						
						<div id="grid"></div>
					</div>
				</div>
			</div>
		</div>
	</div>	
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

							<input id="company" />
							<input id="overDueDay" placeHolder="ចំនួនថ្ងៃផុតកំណត់" />		
							<button id="search" type="button" class="btn btn-default"><i class="icon-search"></i></button>
							<button type="button" class="btn btn-default" onclick="javascript:window.print()"><i class="icon-print"></i></button>				
						</div>

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
<!-- END OF DAWINE ******************************************************************************************************** -->

<script src="https://localhost/banhji/resources/js/libs/localforage.min.js"></script>

<!-- Application -->
<script>
	banhji.config = {
		title: "Banhji Online Application",
		userData: {
			userId : <?php echo $this->session->userdata('user_id'); ?>,
			username: "<?php echo $this->session->userdata('username'); ?>",
			firstName: "<?php echo $this->session->userdata('userData')->first_name; ?>",
			lastName: "<?php echo $this->session->userdata('userData')->last_name; ?>",
			fullName: "<?php echo $this->session->userdata('userData')->last_name; ?>"+" <?php echo $this->session->userdata('userData')->first_name; ?>",
			allowedModules: [<?php echo $this->session->userdata('userData')->allowedModules; ?>],
			type: "paid",
			company: "<?php echo $this->session->userdata('userData')->company_id; ?>",
			parent: "<?php echo $this->session->userdata('company')->parent_id; ?>",
			language: "km-KH"
		}
	};

	kendo.culture(banhji.config.userData.language);	
</script>

<script>
	var banhji = banhji || {};
	var baseUrl = 'https://localhost/banhji/api/';
	localforage.config({
		driver: localforage.LOCALSTORAGE,
		name: 'userData'
	});

	var auth 	= kendo.observable({
		baseUrl 	: baseUrl + 'auth',
		data 		: null,
		current 	: null,
		passed 		: false,
		rememberMe 	: false,
		email 		: null,
		password 	: null,
		url 		: function(seg) {
			if(seg !== null) {
				return this.baseUrl + seg;
			}
			return this.baseUrl;
		},
		init 		: function() {
			localforage.getItem('user')
			.then(function(value){
				if(value) {
					auth.set('current', value);
					if(user.get('showEmail')) {
						$("#myacc").text(value.username);
					} else {
						$("#myacc").text(value.firstName+" "+value.lastName);
					}
					banhji.router.navigate('#');
				} else {
					banhji.router.navigate('login');
				}
			});
		},
		dataStore 	: new kendo.data.DataSource({
			transport: {
				create: {
					url: function() {
						return auth.url('/register');
					},
					headers: {
						"access-token": "dfkdjsfldsjfl"
					},
					type: "POST",
					dataType: "json"
				},
				read: {
					url: function() {
						return auth.url(null);
					},
					headers: {
						"access-token": "dfkdjsfldsjfl"
					},
					type: "POST",
					dataType: "json"
				},
				update: {
					url: function() {
						return auth.url(null);
					},
					type: "PUT",
					dataType: "json"
				},
				destroy: {
					url: function() {
						return auth.url(null);
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
		register 	: function() {
			if(this.get('passed')) {
				this.dataStore.add({email: this.get('email'), password: this.get('password')});
				this.dataStore.sync();
				this.dataStore.bind('requestEnd', function(e){
					//
				});
			} else {
				alert('please check you email or password again.'+this.get('passed'));
			}	
		},
		login 		: function() {
			if(this.get('passed')) {
				this.dataStore.query({
					pageSize: 1,
					filter:[
						{field: 'email', value: this.get('email')},
						{field: 'password', value: this.get('password')}
					]
				})
				.then(function(e){
					var user = auth.dataStore.data()[0];
					localforage.setItem('user', user);
					if(user.companies.length < 1) {
						banhji.router.navigate('company');
					} else {
						banhji.router.navigate('/');
					}
					auth.init();
				});
			} else {
				$("#dialog").kendoWindow({
					modal: true,
				}).data('kendoWindow').center();
			}		
		},
		logout 		: function() {
			localforage.removeItem('user', function(err){
				banhji.router.navigate('login');
				$("#myacc").text("");
			});
		},
		getLogin 	: function() {
			this.get('current');
		},
		validatePWD	: function() {
			if(this.get('password').length < 7) {
				alert("password must be atleast 7-character long");
				this.set('passed', false);
			}
			this.set('passed', true);
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

		  	if(!reValidEmail.test(this.get('email'))){
		  		alert("Please enter valid address");
				this.set('passed', false);
		  	}
		  	this.set('passed', false);
		}
	});

	//BY DAWINE ***************************************************************************************************
	banhji.ds = (function(){
		var vendors = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/vendors/",
					type: "GET",
					dataType: "json"
				},
				update: {
					url: banhji.baseUrl + "api/vendors/",
					type: "PUT",
					dataType: "json"
				},
				create: {
					url: banhji.baseUrl + "api/vendors/",
					type: "POST",
					dataType: "json"
				},
				destroy: {
					url: banhji.baseUrl + "api/vendors/",
					type: "DELETE",
					dataType: "json"
				},
				parameterMap : function(options, operation) {
					if( operation !== "read" && options.models ) {
						return { models: kendo.stringigy(options.models) };
					}
					return options;
				}
			},
			serverFiltering: true,
			filter: {field: "company_id", value: banhji.config.userData['company']},
			schema: {
				model: {
					id: "id",
					fields: {
						"id": {editable: false, type: "string", nullable: true}
					}
				},
				data: "results",
				total: "count"
			}
		});		
	    var transformerDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/transformers/transformer",
					type: "GET",
					dataType: "json"
				},
				create: {
					url: banhji.baseUrl + "api/electricities/transformers",
					type: "POST",
					dataType: "json"
				},
				update: {
					url: banhji.baseUrl + "api/electricities/transformers",
					type: "PUT",
					dataType: "json"
				},
				destroy: {
					url: banhji.baseUrl + "api/electricities/transformers",
					type: "DELETE",
					dataType: "json"
				},
				parameterMap : function(options, operation) {
					if( operation !== "read" && options.models ) {
						return { models: kendo.stringigy(options.models) };
					}
					return options;
				}
			},
			serverFiltering: true,
			schema: {
				model: {
					id: "id"
				},
				data: "results",
				total: "total"	
			}
		});
		var transformerRecordDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/electricities/transformerRecords/",
					type: "GET",
					dataType: "json"
				},
				create: {
					url: banhji.baseUrl + "api/electricities/transformerRecords/",
					type: "POST",
					dataType: "json"
				},
				update: {
					url: banhji.baseUrl + "api/electricities/transformerRecords/",
					type: "PUT",
					dataType: "json"
				},
				destroy: {
					url: banhji.baseUrl + "api/electricities/transformerRecords/",
					type: "DELETE",
					dataType: "json"
				},
				parameterMap : function(options, operation) {
					if( operation !== "read" && options.models ) {
						return { models: kendo.stringigy(options.models) };
					}
					return options;
				}
			},
			serverFiltering: true,
			schema: {
				model: {
					id: "id"
				}
			}
		});		
		var cashAccountDS = new kendo.data.DataSource({
		    transport: {
			    read: banhji.baseUrl + "api/accounting_api/cash_account",
			    type: "GET",
			    dataType: "json"
		    }
	    });
	    var creditAccountDS = new kendo.data.DataSource({
			transport: {
				read: banhji.baseUrl + "api/accounting_api/liability_account",
				type: "GET",
				dataType: "json"
			}
	    });
		var bills = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/electricities/bills/",
					type: "GET",
					dataType: "json"
				},
				create: {
					url: banhji.baseUrl + "api/electricities/bills/",
					type: "POST",
					dataType: "json"
				},
				update: {
					url: banhji.baseUrl + "api/electricities/bills/",
					type: "PUT",
					dataType: "json"
				},
				destroy: {
					url: banhji.baseUrl + "api/electricities/bills/",
					type: "DELETE",
					dataType: "json"
				},
				parameterMap : function(options, operation) {
					if( operation !== "read" && options.models ) {
						return { models: kendo.stringigy(options.models) };
					}
					return options;
				}
			},
			serverFiltering: true,
			filter: [
				{field: 'status', value: 0},
				{field: 'created_at', value: '2014-01-01'}
			],
			schema: {
				model: {
					id: "id",
					fields: {
						id: { editable: false }
					}
				},
				data: "bills"
			},
			error	: function(e) {
				console.log(e.status);
			}
		});
		var poDS = new kendo.data.DataSource({
		  	transport: {
			  	read: {
				  	url : banhji.baseUrl + "api/invoices/invoice",		  
				  	type: "GET",
				  	dataType: "json"
			  	},
			  	update: {
				  	url : banhji.baseUrl + "api/invoices/invoice",		  
				  	type: "PUT",
				  	dataType: "json"
			  	}
		  	},
		  	schema: {
			  	model: {
				  	id : "id"
			  	}		
		  	},	  		  		  	
		  	serverFiltering : true,
		  	filter:[
		  		{ field: "type", value: "PO" },
		  		{ field: "status", value: 0}
		  	]  	
		});

		var journal = new kendo.data.DataSource({
			transport: {
				create: {
					url: banhji.baseUrl + "api/accounting_api/journals/",
					type: "POST",
					dataType: "json"
				},
				parameterMap : function(options, operation) {
					if( operation !== "read" && options.models ) {
						return { models: kendo.stringigy(options.models) };
					}
					return options;
				}
			},
			schema: {
				model: {
					id: "id"
				}
			}
		});

		//BY DAWINE 
		var peopleDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/people_api/people",
					type: "GET",
					dataType: "json"
				},
				create: {
					url: banhji.baseUrl + "api/people_api/people",
					type: "POST",
					dataType: "json"
				},
				update: {
					url: banhji.baseUrl + "api/people_api/people",
					type: "PUT",
					dataType: "json"
				},
				parameterMap : function(options, operation) {
					if( operation !== "read" && options.models ) {
						return { models: kendo.stringigy(options.models) };
					}
					return options;
				}
			},
			serverFiltering: true,
			serverPaging: true,
			pageSize: 50,								
			schema: {
				model: {
					id: "id"
				},
				data: "results",
				total: "total"	
			}
		});					
		var peopleTypeDS = [
            { "id": 3, "name": "ធម្មតា" },
            { "id": 4, "name": "បរទេស" },
            { "id": 5, "name": "អាជីវកម្ម-សិប្បកម្" },
            { "id": 6, "name": "ស្ថាប័នរដ្ឋ" },
            { "id": 7, "name": "ផ្ទះសំណាក់និងសណ្ឋាគារ" }
        ];
        var statusDS = [
            { "id": 0, "name": "ឈប់ប្រើប្រាស់" },
			{ "id": 1, "name": "កំពុងប្រើប្រាស់" },
			{ "id": 2, "name": "ផ្អាក់ប្រើប្រាស់" }
        ];       
		
		var tariffPlanDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/tariff_plans/tariff_plan",
					type: "GET",
					dataType: "json"
				},
				create: {
					url: banhji.baseUrl + "api/tariff_plans/tariff_plan",
					type: "POST",
					dataType: "json"
				},
				update: {
					url: banhji.baseUrl + "api/tariff_plans/tariff_plan",
					type: "PUT",
					dataType: "json"
				},
				destroy: {
					url: banhji.baseUrl + "api/tariff_plans/tariff_plan",
					type: "DELETE",
					dataType: "json"
				},
				parameterMap : function(options, operation) {
					if( operation !== "read" && options.models ) {
						return { models: kendo.stringigy(options.models) };
					}
					return options;
				}
			},
			serverFiltering: true,						
			schema: {
				model: {
					id: "id"
				},
				data: "results",
				total: "total"	
			}
		});
		var planItemDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/plan_items/plan_item",
					type: "GET",
					dataType: "json"
				},
				create: {
					url: banhji.baseUrl + "api/plan_items/plan_item",
					type: "POST",
					dataType: "json"
				},
				update: {
					url: banhji.baseUrl + "api/plan_items/plan_item",
					type: "PUT",
					dataType: "json"
				},
				destroy: {
					url: banhji.baseUrl + "api/plan_items/plan_item",
					type: "DELETE",
					dataType: "json"
				},
				parameterMap : function(options, operation) {
					if( operation !== "read" && options.models ) {
						return { models: kendo.stringigy(options.models) };
					}
					return options;
				}
			},			
			serverSorting: true,			
			sort: { field: "start_date", dir: "desc" },						
			schema: {
				model: {
					id: "id"
				},
				data: "results",
				total: "total"	
			}
		});
		var tariffDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/tariffs/tariff",
					type: "GET",
					dataType: "json"
				},
				create: {
					url: banhji.baseUrl + "api/tariffs/tariff",
					type: "POST",
					dataType: "json"
				},
				update: {
					url: banhji.baseUrl + "api/tariffs/tariff",
					type: "PUT",
					dataType: "json"
				},
				destroy: {
					url: banhji.baseUrl + "api/tariffs/tariff",
					type: "DELETE",
					dataType: "json"
				},
				parameterMap : function(options, operation) {
					if( operation !== "read" && options.models ) {
						return { models: kendo.stringigy(options.models) };
					}
					return options;
				}
			},
			serverFiltering: true,						
			schema: {
				model: {
					id: "id"
				},
				data: "results",
				total: "total"	
			}
		});	
		var tariffItemDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/tariff_items/tariff_item",
					type: "GET",
					dataType: "json"
				},
				create: {
					url: banhji.baseUrl + "api/tariff_items/tariff_item",
					type: "POST",
					dataType: "json"
				},
				update: {
					url: banhji.baseUrl + "api/tariff_items/tariff_item",
					type: "PUT",
					dataType: "json"
				},
				destroy: {
					url: banhji.baseUrl + "api/tariff_items/tariff_item",
					type: "DELETE",
					dataType: "json"
				},
				parameterMap : function(options, operation) {
					if( operation !== "read" && options.models ) {
						return { models: kendo.stringigy(options.models) };
					}
					return options;
				}
			},			
			serverSorting: true,			
			sort: { field: "usage", dir: "DESC" },						
			schema: {
				model: {
					id: "id"
				},
				data: "results",
				total: "total"	
			}
		});
		var feeDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/fees/fee",
					type: "GET",
					dataType: "json"
				},
				create: {
					url: banhji.baseUrl + "api/fees/fee",
					type: "POST",
					dataType: "json"
				},
				update: {
					url: banhji.baseUrl + "api/fees/fee",
					type: "PUT",
					dataType: "json"
				},
				destroy: {
					url: banhji.baseUrl + "api/fees/fee",
					type: "DELETE",
					dataType: "json"
				},
				parameterMap : function(options, operation) {
					if( operation !== "read" && options.models ) {
						return { models: kendo.stringigy(options.models) };
					}
					return options;
				}
			},
			serverFiltering: true,									
			schema: {
				model: {
					id: "id"
				},
				data: "results",
				total: "total"	
			}
		});
		var electricityUnitDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/electricity_units/electricity_unit",
					type: "GET",
					dataType: "json"
				},
				create: {
					url: banhji.baseUrl + "api/electricity_units/electricity_unit",
					type: "POST",
					dataType: "json"
				},
				update: {
					url: banhji.baseUrl + "api/electricity_units/electricity_unit",
					type: "PUT",
					dataType: "json"
				},
				destroy: {
					url: banhji.baseUrl + "api/electricity_units/electricity_unit",
					type: "DELETE",
					dataType: "json"
				},
				parameterMap : function(options, operation) {
					if( operation !== "read" && options.models ) {
						return { models: kendo.stringigy(options.models) };
					}
					return options;
				}
			},							
			schema: {
				model: {
					id: "id"
				},
				data: "results",
				total: "total"	
			}
		});		
		
		var companyDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/companies/company",
					type: "GET",
					dataType: "json"
				},
				create: {
					url: banhji.baseUrl + "api/companies/company",
					type: "POST",
					dataType: "json"
				},
				update: {
					url: banhji.baseUrl + "api/companies/company",
					type: "PUT",
					dataType: "json"
				},
				destroy: {
					url: banhji.baseUrl + "api/companies/company",
					type: "DELETE",
					dataType: "json"
				},
				parameterMap : function(options, operation) {
					if( operation !== "read" && options.models ) {
						return { models: kendo.stringigy(options.models) };
					}
					return options;
				}
			},
			serverFiltering: true,						
			schema: {
				model: {
					id: "id"
				},
				data: "results",
				total: "total"	
			}		
		});		
		var classDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/classes/index",
					type: "GET",
					dataType: "json"
				},
				parameterMap : function(options, operation) {
					if( operation !== "read" && options.models ) {
						return { models: kendo.stringigy(options.models) };
					}
					return options;
				}
			},
			serverFiltering: true,										
			schema: {
				model: {
					id: "id"
				},
				data: "results",
				total: "total"
			}		
		});		

		var accountDS = new kendo.data.DataSource({
		    transport: {
			    read: {
					url: banhji.baseUrl + "api/accounts/accountz",
					type: "GET",
					dataType: "json"
				},				
				parameterMap : function(options, operation) {
					if( operation !== "read" && options.models ) {
						return { models: kendo.stringigy(options.models) };
					}
					return options;
				}
		    },
		    serverFiltering: true,		        
	        schema: {
	        	model: {
	        		id: "id"
	        	},
	        	data: "results",
	        	total: "total"
	        }
	    });
		var currencyDS = [
            { "code": "KHR", "sub_code": "km-KH", "name": "KHR - ខ្មែររៀល" }, 
			{ "code": "USD", "sub_code": "en-US", "name": "USD - ដុល្លាអាមេរិក" }, 
			{ "code": "THB", "sub_code": "th-TH", "name": "THB - ថៃបាត" }
        ];
		var currencyRateDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/currency_rates/currency_rate",
					type: "GET",
					dataType: "json"
				},
				create: {
					url: banhji.baseUrl + "api/currency_rates/currency_rate",
					type: "POST",
					dataType: "json"
				},
				update: {
					url: banhji.baseUrl + "api/currency_rates/currency_rate",
					type: "PUT",
					dataType: "json"
				},
				destroy: {
					url: banhji.baseUrl + "api/currency_rates/currency_rate",
					type: "DELETE",
					dataType: "json"
				},
				parameterMap : function(options, operation) {
					if( operation !== "read" && options.models ) {
						return { models: kendo.stringigy(options.models) };
					}
					return options;
				}
			},
			serverFiltering: true,						
			schema: {
				model: {
					id: "id"
				},
				data: "results",
				total: "total"	
			}		
		});
		
		var paymentTermDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/payment_terms/payment_term",
					type: "GET",
					dataType: "json"
				}
			},
			serverFiltering: true,					
	        schema: {
				model: {
					id: "id"
				},
	        	data: "results",
	        	total: "total"	
			}		
		});
		var paymentMethodDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/payment_methods/payment_method",
					type: "GET",
					dataType: "json"
				}
			},
			serverFiltering: true,						
	        schema: {
				model: {
					id: "id"
				},
	        	data: "results",
	        	total: "total"	
			}
		});
		var reconcileDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/reconciles/reconcile",
					type: "GET",
					dataType: "json"
				},
				create: {
					url: banhji.baseUrl + "api/reconciles/reconcile",
					type: "POST",
					dataType: "json"
				},
				update: {
					url: banhji.baseUrl + "api/reconciles/reconcile",
					type: "PUT",
					dataType: "json"
				},
				destroy: {
					url: banhji.baseUrl + "api/reconciles/reconcile",
					type: "DELETE",
					dataType: "json"
				},
				parameterMap : function(options, operation) {
					if( operation !== "read" && options.models ) {
						return { models: kendo.stringigy(options.models) };
					}
					return options;
				}
			},
			serverFiltering: true,
			serverPaging: true,				
			schema: {
				model: {
					id: "id"
				},
				data: "results",
				total: "total"	
			}
		});
		var reconcileItemDS = new kendo.data.DataSource({
		  	transport: {		  	
			  	read: {
				  	url : banhji.baseUrl + "api/reconcile_items/reconcile_item",		  
				  	type: "GET",
				  	dataType: "json"
			  	},
			  	update: {
				  	url : banhji.baseUrl + "api/reconcile_items/reconcile_item",		  
				  	type: "PUT",
				  	dataType: "json"
			  	},
			  	create: {
				  	url : banhji.baseUrl + "api/reconcile_items/reconcile_item",		  
				  	type: "POST",
				  	dataType: "json"
			  	},
			  	destroy: {
				  	url : banhji.baseUrl + "api/reconcile_items/reconcile_item",		  
				  	type: "DELETE",
				  	dataType: "json"
			  	},		  	
		        parameterMap: function(options, operation) {
		            if (operation !== "read" && options.models) {
		                return {models: kendo.stringify(options.models)};
		            }
		            return options;
		        }
		  	},
		  	batch: true,
		  	serverFiltering: true,		  	
		  	schema: {
				model: {
					id: "id"
				},
				data: "results",
				total: "total"	
			}			  		  		  	
		});		
		var denominationDS = [
				{ 'denomination':1, 'qty_khr':'', 'qty_usd':'', 'qty_khr_transfer':'', 'qty_usd_transfer': '' },
				{ 'denomination':2, 'qty_khr':'', 'qty_usd':'', 'qty_khr_transfer':'', 'qty_usd_transfer': '' },
				{ 'denomination':5, 'qty_khr':'', 'qty_usd':'', 'qty_khr_transfer':'', 'qty_usd_transfer': '' },
				{ 'denomination':10, 'qty_khr':'', 'qty_usd':'', 'qty_khr_transfer':'', 'qty_usd_transfer': '' },
				{ 'denomination':20, 'qty_khr':'', 'qty_usd':'', 'qty_khr_transfer':'', 'qty_usd_transfer': '' },
				{ 'denomination':50, 'qty_khr':'', 'qty_usd':'', 'qty_khr_transfer':'', 'qty_usd_transfer': '' },
				{ 'denomination':100, 'qty_khr':'', 'qty_usd':'', 'qty_khr_transfer':'', 'qty_usd_transfer': '' },
				{ 'denomination':500, 'qty_khr':'', 'qty_usd':'', 'qty_khr_transfer':'', 'qty_usd_transfer': '' },
				{ 'denomination':1000, 'qty_khr':'', 'qty_usd':'', 'qty_khr_transfer':'', 'qty_usd_transfer': '' },
				{ 'denomination':2000, 'qty_khr':'', 'qty_usd':'', 'qty_khr_transfer':'', 'qty_usd_transfer': '' },
				{ 'denomination':5000, 'qty_khr':'', 'qty_usd':'', 'qty_khr_transfer':'', 'qty_usd_transfer': '' },
				{ 'denomination':10000, 'qty_khr':'', 'qty_usd':'', 'qty_khr_transfer':'', 'qty_usd_transfer': '' },
				{ 'denomination':20000, 'qty_khr':'', 'qty_usd':'', 'qty_khr_transfer':'', 'qty_usd_transfer': '' },
				{ 'denomination':50000, 'qty_khr':'', 'qty_usd':'', 'qty_khr_transfer':'', 'qty_usd_transfer': '' },
				{ 'denomination':100000, 'qty_khr':'', 'qty_usd':'', 'qty_khr_transfer':'', 'qty_usd_transfer': '' }
		];

		var meterDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/meters/meter",
					type: "GET",
					dataType: "json"
				},
				create: {
					url: banhji.baseUrl + "api/meters/meter",
					type: "POST",
					dataType: "json"
				},
				update: {
					url: banhji.baseUrl + "api/meters/meter",
					type: "PUT",
					dataType: "json"
				},
				destroy: {
					url: banhji.baseUrl + "api/meters/meter",
					type: "DELETE",
					dataType: "json"
				},
				parameterMap : function(options, operation) {
					if( operation !== "read" && options.models ) {
						return { models: kendo.stringigy(options.models) };
					}
					return options;
				}
			},
			serverFiltering: true,				
			schema: {
				model: {
					id: "id"
				},
				data: "results",
				total: "total"	
			}
		});
		var meterRecordDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/meter_records/meter_record",
					type: "GET",
					dataType: "json"
				},
				update: {
				  	url: banhji.baseUrl + "api/meter_records/meter_record",
				  	type: "PUT",
				  	dataType: "json"
			  	},
			  	create: {
				  	url: banhji.baseUrl + "api/meter_records/meter_record",
				  	type: "POST",
				  	dataType: "json"
			  	},
			  	parameterMap: function(options, operation) {
					if (operation !== "read" && options.models) {
						return {models: kendo.stringify(options.models)};
				  	}		  
				  	return options;  
			   	}
			},		  	
			serverFiltering: true,		  	
		  	schema: {
				model: {
					id: "id"
				},
				data: "results",
				total: "total"	
			}		  			
		});
		var breakerDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/breakers/breaker",
					type: "GET",
					dataType: "json"
				},
				create: {
					url: banhji.baseUrl + "api/breakers/breaker",
					type: "POST",
					dataType: "json"
				},
				update: {
					url: banhji.baseUrl + "api/breakers/breaker",
					type: "PUT",
					dataType: "json"
				},
				destroy: {
					url: banhji.baseUrl + "api/breakers/breaker",
					type: "DELETE",
					dataType: "json"
				},
				parameterMap : function(options, operation) {
					if( operation !== "read" && options.models ) {
						return { models: kendo.stringigy(options.models) };
					}
					return options;
				}
			},
			serverFiltering: true,				
			schema: {
				model: {
					id: "id"
				},
				data: "results",
				total: "total"	
			}
		});

		var itemDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/inventory_api/items",
					type: "GET",
					dataType: "json"
				},
				parameterMap : function(options, operation) {
					if( operation !== "read" && options.models ) {
						return { models: kendo.stringigy(options.models) };
					}
					return options;
				}
			},			
			schema: {
				model: {
					id: "id"
				},
				data: "results",
				total: "total"	
			}
		});

		var invoiceDS = new kendo.data.DataSource({
		  	transport: {
			  	read: {
				  	url : banhji.baseUrl + "api/invoices/invoice",		  
				  	type: "GET",
				  	dataType: "json"
			  	},
			  	create: {
				  	url : banhji.baseUrl + "api/invoices/invoice",		  
				  	type: "POST",
				  	dataType: "json"
			  	},
			  	update: {
				  	url : banhji.baseUrl + "api/invoices/invoice",		  
				  	type: "PUT",
				  	dataType: "json"
			  	},
		        parameterMap: function(options, operation) {
		            if (operation !== "read" && options.models) {
		                return {models: kendo.stringify(options.models)};
		            }
		            return options;
		        }
		  	},
		  	serverFiltering : true,
		  	serverPaging: true,
		  	pageSize: 50,	  	    
		  	schema: {
				model: {
					id: "id"
				},
				data: "results",
				total: "total"	
			}		  		
		});
		var invoiceItemDS = new kendo.data.DataSource({
		  	transport: {		  	
			  	read: {
				  	url : banhji.baseUrl + "api/invoice_items/invoice_item",		  
				  	type: "GET",
				  	dataType: "json"
			  	},
			  	update: {
				  	url : banhji.baseUrl + "api/invoice_items/invoice_item",		  
				  	type: "PUT",
				  	dataType: "json"
			  	},
			  	create: {
				  	url : banhji.baseUrl + "api/invoice_items/invoice_item",		  
				  	type: "POST",
				  	dataType: "json"
			  	},
			  	destroy: {
				  	url : banhji.baseUrl + "api/invoice_items/invoice_item",		  
				  	type: "DELETE",
				  	dataType: "json"
			  	},		  	
		        parameterMap: function(options, operation) {
		            if (operation !== "read" && options.models) {
		                return {models: kendo.stringify(options.models)};
		            }
		            return options;
		        }
		  	},
		  	batch: true,
		  	serverFiltering: true,		  	
		  	schema: {
				model: {
					id: "id"
				},
				data: "results",
				total: "total"	
			}			  		  		  	
		});

		var statementDS = new kendo.data.DataSource({
		  	transport: {	  
			  	read: {
				  	url : banhji.baseUrl + "api/invoices/statement",
				  	type: "GET",
				  	dataType: "json"		  
			  	}
		  	},
		  	aggregate: [
			    { field: "amount", aggregate: "sum" }
			],
		  	serverFiltering: true	
		});
		var agingDS = new kendo.data.DataSource({
		  	transport: {	  
			  	read: {
				  	url : banhji.baseUrl + "api/invoices/aging",
				  	type: "GET",
				  	dataType: "json"		  
			  	}			  	
		  	},
		  	serverFiltering: true
		});
		
		var electricityBoxDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/electricity_boxes/electricity_box",
					type: "GET",
					dataType: "json"
				},
				create: {
					url: banhji.baseUrl + "api/electricity_boxes/electricity_box",
					type: "POST",
					dataType: "json"
				},
				update: {
					url: banhji.baseUrl + "api/electricity_boxes/electricity_box",
					type: "PUT",
					dataType: "json"
				},
				destroy: {
					url: banhji.baseUrl + "api/electricity_boxes/electricity_box",
					type: "DELETE",
					dataType: "json"
				},
				parameterMap : function(options, operation) {
					if( operation !== "read" && options.models ) {
						return { models: kendo.stringigy(options.models) };
					}
					return options;
				}
			},			
			schema: {
				model: {
					id: "id"
				},
				data: "results",
				total: "total"	
			}
		});
		var readerDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/employees/index",
					type: "GET",
					dataType: "json"
				}
			},
			schema: {
				data: "employees",
				total: "total"
			}		
		});

		//Pre-load data by user's company_id
		var company_id = banhji.config.userData.parent;
		
		companyDS.filter({ field: "parent_id", value: company_id });		
		classDS.filter({ field: "company_id", value: company_id });

		paymentTermDS.filter({ field: "company_id", value: company_id });
		paymentMethodDS.filter({ field: "company_id", value: company_id });

		accountDS.filter({ field: "company_id", value: company_id });					
		currencyRateDS.filter({ field: "company_id", value: company_id });

		electricityUnitDS.filter({ field: "company_id", value: company_id });
		feeDS.filter({ field: "company_id", value: company_id });
		itemDS.filter({ field: "company_id", value: company_id });

		var viewModel = kendo.observable({
			pageLoad 			: function(){
				//Code...
			},
			getSubCode 			: function(code){
				var subCode = "km-KH";
				$.each(currencyDS, function(index, value){
					if(value.code===code){
						subCode = value.sub_code;
						return false;
					}
				});

				return subCode;
			},						
			getCurrencyRateByCode: function(code){
				var rate = 0;			
				$.each(currencyRateDS.data(), function(index, value){	        	
		        	if(code===value.code && value.status==="1"){	        		
		        		rate = value.rate;
		        		return false;
		        	}	        	
		        });
				
		        return kendo.parseFloat(rate);
			},
			getTariffId  		: function(tariff_plan_id, month_of){
				var tariff_id = 0;						
				var data = planItemDS.data();
		        for (var i = 0; i < data.length; i++) {
		            var d = data[i];
		            if((d.tariff_plan_id==tariff_plan_id) && (month_of>=d.start_date)){
		            	tariff_id = d.tariff_id;
		            	break;
		            }
		        }
		        return tariff_id;		
			},			
			getRate 			: function(company_code, customer_code){
				var rate = 1;

				if(company_code!==customer_code){
		        	var companyCodeRate = this.getCurrencyRateByCode(company_code);
		        	var customerCodeRate = this.getCurrencyRateByCode(customer_code);

		        	if(customerCodeRate>0 && companyCodeRate>0){
		        		rate = companyCodeRate/customerCodeRate;
		        	}	
		        }

		        return rate;
			}	
		});

		return {
			vendors: vendors,
			classes: classDS,
			bills: bills,
			cashAccounts: cashAccountDS,
			creditAccounts: creditAccountDS,			
			trasformers: transformerDS,			
			po: poDS,
			transformRecords: transformerRecordDS,
			journalDS: journal,

			//BY DAWINE
			peopleDS: peopleDS,
			peopleTypeDS: peopleTypeDS,
			statusDS: statusDS,
						
			tariffPlanDS: tariffPlanDS,
			planItemDS: planItemDS,
			tariffDS: tariffDS,
			tariffItemDS: tariffItemDS,			
			feeDS: feeDS,		

			electricityUnitDS: electricityUnitDS,
								
			companyDS: companyDS,			
			transformerDS: transformerDS,
			classDS: classDS,
			
			accountDS: accountDS,			

			currencyDS: currencyDS,			
			currencyRateDS: currencyRateDS,

			paymentTermDS: paymentTermDS,
			paymentMethodDS: paymentMethodDS,
			reconcileDS: reconcileDS,
			reconcileItemDS: reconcileItemDS,
			denominationDS: denominationDS,

			itemDS: itemDS,
			invoiceDS: invoiceDS,
			invoiceItemDS: invoiceItemDS,

			statementDS: statementDS,
			agingDS: agingDS,

			meterDS: meterDS,
			meterRecordDS: meterRecordDS,
			breakerDS: breakerDS,
			electricityBoxDS: electricityBoxDS,
			readerDS: readerDS,

			viewModel: viewModel
		};
	}());
	//End BY DAWINE
	
	//BY DAWINE ************************************************************************************************************
	banhji.customerCenter = (function(){
		var outStandingInvoiceDS = new kendo.data.DataSource({
		  	transport: {
			  	read: {
				  	url : banhji.baseUrl + "api/invoices/invoice",		  
				  	type: "GET",
				  	dataType: "json"
			  	},
		        parameterMap: function(options, operation) {
		            if (operation !== "read" && options.models) {
		                return {models: kendo.stringify(options.models)};
		            }
		            return options;
		        }
		  	},
		  	serverFiltering : true,
		  	serverPaging: true,
		  	pageSize: 50,	  	    
		  	schema: {
				model: {
					id: "id"
				},
				data: "results",
				total: "total"	
			}		  		
		});

		var monthlySaleDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/invoices/monthly_sale",
					type: "GET",
					dataType: "json"
				}
			},					  	
			serverFiltering: true		
		});		

		var viewModel = kendo.observable({
			isLoaded 		: false,
			customer 		: null,
			showMenu 		: false,
			company_id 		: banhji.config.userData.company,
			
			date_sorter 	: "month",
			start_date 		: new Date(),
			end_date 		: new Date(),
			totalSO 		: 0,
			totalEstimate 	: 0,
			totalOpenInvoice: 0,
			totalOverDue 	: 0,
			balance 		: kendo.toString(0, "c"),

			currentPage 	: "dashBoard",			
			monthlySaleList : [],
			
			statementCollectionList : banhji.ds.invoiceDS,
			
			pageLoad 		: function(customer_id){				
				if(customer_id!==undefined){
					this.loadOutStandingInvoice(customer_id);
					this.loadStatementCollection(customer_id);
					this.loadMonthlySale(customer_id);	
				}else{
					banhji.ds.peopleDS.filter({ field: "company_id", value: this.get("company_id") });

					this.setDateSorter("month");
					this.loadOutStandingInvoice();
					this.loadStatementCollection();	
				}														
			},
			goDashBoard		: function(e){
				e.preventDefault();
				this.set("currentPage", "dashBoard");								
				
				banhji.router.navigate("#customers");														
			},
			goDetail		: function(e){
				e.preventDefault();				
				this.set("currentPage", "customerDetail");

				var customer = this.get("customer");
				banhji.router.navigate("#single_customer/" + customer.id);								
			},
			goMeter		: function(e){
				e.preventDefault();
				this.set("currentPage", "meter");
				
				var customer = this.get("customer");
				banhji.router.navigate("#meter/" + customer.id);							
			},			
			goStatement		: function(e){
				e.preventDefault();
				this.set("currentPage", "statement");

				var customer = this.get("customer");
				banhji.router.navigate("#statement/" + customer.id);				
			},
						
			dateSorterChange: function(){
				var value = this.get("date_sorter");
				this.setDateSorter(value);				
			},
			setDateSorter 	: function(value){
				switch(value){
				case "today":
					var today = new Date();
				  	this.set("start_date", today);
					this.set("end_date", today);

					this.set("date_sorter", "today");
				  	break;
				case "week":
				  	var thisWeek = new Date;
					var first = thisWeek.getDate() - thisWeek.getDay(); 
					var last = first + 6;

					var firstDayOfWeek = new Date(thisWeek.setDate(first));
					var lastDayOfWeek = new Date(thisWeek.setDate(last));

					this.set("start_date", firstDayOfWeek);
					this.set("end_date", lastDayOfWeek);

					this.set("date_sorter", "week");
				  	break;
				case "month":
					var thisMonth = new Date;				  	
					var firstDayOfMonth = new Date(thisMonth.getFullYear(), thisMonth.getMonth(), 1);
					var lastDayOfMonth = new Date(thisMonth.getFullYear(), thisMonth.getMonth() + 1, 0);

					this.set("start_date", firstDayOfMonth);
					this.set("end_date", lastDayOfMonth);

					this.set("date_sorter", "month");
				  	break;
				case "year":
					var thisYear = new Date();
				  	var firstDayOfYear = new Date(thisYear.getFullYear(), 0, 1);
					var lastDayOfYear = new Date(thisYear.getFullYear(), 11, 31);

					this.set("start_date", firstDayOfYear);
					this.set("end_date", lastDayOfYear);

					this.set("date_sorter", "year");
				  	break;
				default:
					//Default here					  
				}
			},

			btnLoadStatementCollection : function(){
				var customer = this.get("customer");

				if(customer!==null){
					this.loadStatementCollection(this.get("customer").id);
				}else{
					this.loadStatementCollection();
				}				
			},
			loadStatementCollection : function(customer_id){
				var para = Array();				
				
				if(customer_id!==undefined){
					para.push({field: "customer_id", value: kendo.parseInt(customer_id)});					
				}else{					
					para.push({field: "company_id", value: this.get("company_id")});			
				}

				var sDate = this.get("start_date");
				if(sDate!==""){
					para.push({field: "issued_date >=", value: kendo.toString(new Date(sDate), "yyyy-MM-dd")});
				}

				var eDate = this.get("end_date")
				if(eDate!==""){
					para.push({field: "issued_date <=", value: kendo.toString(new Date(eDate), "yyyy-MM-dd")});
				}

				if(para.length>0){
					banhji.ds.invoiceDS.filter(para);
				}							
			},
			loadMonthlySale : function(customer_id){
				var self = this;
				var today = new Date();
				var lastDay = new Date();				
				lastDay.setMonth(lastDay.getMonth() - 6);				

				monthlySaleDS.filter({
					filters: [
						{ field: "customer_id", value: customer_id },						
						{ field: "issued_date <=", value: kendo.toString(today, "yyyy-MM-dd") },
						{ field: "issued_date >=", value: kendo.toString(lastDay, "yyyy-MM-dd") }
					]
				});
				monthlySaleDS.bind("requestEnd", function(e){
		    		var response = e.response;
    				var type = e.type;    				

					if(type==="read"){
						var myList = {};
						$.each(response, function(index, data){
							var issuedDate = new Date(data.issued_date);
							var month = (issuedDate.getMonth()+1).toString() +'-'+ issuedDate.getFullYear().toString();

							if(myList[month]===undefined){
								myList[month]={"month": month, "amt": kendo.parseFloat(data.amount)};						
							}else{											
								if(myList[month].month===month){
									myList[month].amt += kendo.parseFloat(data.amount);
								}else{
									myList[month]={"month": month, "amt": kendo.parseFloat(data.amount)};
								}
							}
						});

						self.set("monthlySaleList", []);
						$.each(myList, function(index, data){							
							self.get("monthlySaleList").push(data);
						});											  																
				  	}
				});					
			},
			loadOutStandingInvoice : function(customer_id){
				var self = this;

				if(customer_id!==undefined){
					outStandingInvoiceDS.filter({ field: "customer_id", value: customer_id });				
				}else{					
					outStandingInvoiceDS.filter({ field: "company_id", value: this.get("company_id") });			
				}
				
				outStandingInvoiceDS.bind("requestEnd", function(e){
					var est=0, so=0, openInv=0, overDue=0, today = new Date();

					$.each(e.response.results, function(index, value){
						if(value.type==="Estimate" && value.status==="0"){
				  			est++;
				  		}else if(value.type==="SO" && value.status==="0"){
				  			so++;
				  		}else if(value.type==="Invoice" || value.type==="eInvoice" || value.type==="Notice"){
				  			if(value.status==="0" || value.status==="2"){					  			
				  				var dueDate = new Date(value.due_date);
				  				if(dueDate<today){
				  					overDue++;
				  				}else{
				  					openInv++;
				  				}
			  				}					  							  			
				  		}
					});

					self.set("totalEstimate", est);
				  	self.set("totalSO", so);
				  	self.set("totalOpenInvoice", openInv);
				  	self.set("totalOverDue", overDue);	
				});							
			},

			loadOpenEstimate: function(){
				banhji.ds.invoiceDS.data([]);

				var filters = Array();
				filters.push(
					{ field: "type", value: "Estimate" },
		        	{ field: "status", value: 0 }
				);

				var customer = this.get("customer");
				if(customer!==null){
					filters.push({ field: "customer_id", value: customer.id });
				}else{
					filters.push({ field: "company_id", value: this.get("company_id") });
				}

				banhji.ds.invoiceDS.filter(filters);
			},
			loadOpenSO 		: function(){
				banhji.ds.invoiceDS.data([]);

				var filters = Array();
				filters.push(
					{ field: "type", value: "SO" },
		        	{ field: "status", value: 0 }
				);

				var customer = this.get("customer");
				if(customer!==null){
					filters.push({ field: "customer_id", value: customer.id });
				}else{
					filters.push({ field: "company_id", value: this.get("company_id") });
				}

				banhji.ds.invoiceDS.filter(filters);						
			},
			loadOpenInvoice : function(){
				banhji.ds.invoiceDS.data([]);

				var filters = Array();
				filters.push(
					{ field: "type", operator: "wherein", value: ["eInvoice", "wInvoice", "Invoice", "Notice"] },
		        	{ field: "status", operator: "wherein", value: [0,2] },
		        	{ field: "due_date >=", value: kendo.toString(new Date(), "yyyy-MM-dd") }
				);

				var customer = this.get("customer");
				if(customer!==null){
					filters.push({ field: "customer_id", value: customer.id });
				}else{
					filters.push({ field: "company_id", value: this.get("company_id") });
				}

				banhji.ds.invoiceDS.filter(filters);							
			},
			loadOverDueInvoice: function(){
				var filters = Array();
				filters.push(
					{ field: "type", operator: "wherein", value: ["eInvoice", "wInvoice", "Invoice", "Notice"] },
		        	{ field: "status", operator: "wherein", value: [0,2] },
		        	{ field: "due_date <", value: kendo.toString(new Date(), "yyyy-MM-dd") }
				);

				var customer = this.get("customer");
				if(customer!==null){
					filters.push({ field: "customer_id", value: customer.id });
				}else{
					filters.push({ field: "company_id", value: this.get("company_id") });
				}

				banhji.ds.invoiceDS.filter(filters);		
			}			
		});		

		return viewModel;
	}());

	banhji.customer = (function(){
		var peopleDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/people_api/people",
					type: "GET",
					dataType: "json"
				},
				parameterMap : function(options, operation) {
					if( operation !== "read" && options.models ) {
						return { models: kendo.stringigy(options.models) };
					}
					return options;
				}
			},
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			pageSize: 1,
			sort: { field: "number", dir: "desc" },									
			schema: {
				model: {
					id: "id"
				},
				data: "results",
				total: "total"	
			}
		});

		var areaDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/transformers/transformer",
					type: "GET",
					dataType: "json"
				},
				parameterMap : function(options, operation) {
					if( operation !== "read" && options.models ) {
						return { models: kendo.stringigy(options.models) };
					}
					return options;
				}
			},
			serverFiltering: true,												
			schema: {
				model: {
					id: "id"
				},
				data: "results",
				total: "total"	
			}
		});

		var viewModel = kendo.observable({
			isLoaded 		: false,			
			customer 		: null,		
			company_id 		: banhji.config.userData.company,						  	  

			customerNumberOrigin : "",
			isDuplicateNumber : false,
			type 			: 2,			
			isCompany 		: false,
			isElectricities : false,
			isWater 		: false,
			
			genders			: ["ប", "ស"],

			statusList 		: banhji.ds.statusDS,
			currencyList 	: banhji.ds.currencyDS,
			peopleTypeList 	: banhji.ds.peopleTypeDS,
			transformerList : banhji.ds.transformerDS,


			companyList 	: banhji.ds.companyDS,
			classList 		: banhji.ds.classDS,
			transformerList : banhji.ds.transformerDS,
			areaList 		: areaDS,

			accountReceiveableList: [],
			revenueAccountList: [],

			ampereList		: [],
			phaseList		: [],
			voltageList 	: [],			

			exemptionList 	: [],
			maintenanceList : [],							
					
			tariffPlanList 	: banhji.ds.tariffPlanDS,			

			pageLoad 		: function(type, customer_id ){
				this.loadData();

				if(customer_id!==undefined){
					var cus = banhji.ds.peopleDS.get(customer_id);				
										
					this.set("customerNumberOrigin", cus.number);
					this.set("customer", cus);
				}else{					
					this.addEmpty();					
				}				
			},
			loadData 			: function(){				
				this.setClass();
				this.setAccount();
				this.setFee();
				this.setElectricityUnit();								
			},				
		
			setClass 			: function(){
		    	var self = this;
		    	this.set("classList", []);
		    			    				    	
				$.each(banhji.ds.classDS.data(), function(index, value) {
					if(value.type==="Class"){							    					    				
		    			self.get("classList").push({
			    			id 		: value.id,
			    			name 	: value.name	    			
			    		});					    	
			    	}				    						    							    		
		    	});			    						
		    },
			setAccount 			: function(){
				var self = this;
				
				this.set("accountReceiveableList", []);
				this.set("revenueAccountList", []);
				$.each(banhji.ds.accountDS.data(), function(index, value){														
					if(value.account_type_id==="7"){							
						self.accountReceiveableList.push({
							id 	: value.id,
							name: value.code +' '+ value.name 
						});
					}
					if(value.account_type_id==="15"){
						self.revenueAccountList.push({
							id 	: value.id,
							name: value.code +' '+ value.name 
						});
					}										
				});						
			},
			setFee 				: function(){
				var self = this;
				
				this.set("exemptionList", []);
				this.set("maintenanceList", []);
				$.each(banhji.ds.feeDS.data(), function(index, value){														
					if(value.type==="exemption"){							
						self.exemptionList.push({
							id 	: value.id,
							name: value.name 
						});
					}
					if(value.type==="maintenance"){
						self.maintenanceList.push({
							id 	: value.id,
							name: value.name 
						});
					}								
				});						
			},
			setElectricityUnit 	: function(){
				var self = this;

				this.set("ampereList", []);
				this.set("phaseList", []);
				this.set("voltageList", []);
				this.set("fuseList", []);
				$.each(banhji.ds.electricityUnitDS.data(), function(index, value){					
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
					if(value.type==="fuse"){
						self.fuseList.push({
							id 	: value.id,
							name: value.name 
						});
					}					
				});				
			},

			checkExistingNumber : function(){
				var self = this;				
				
				var customer = this.get("customer");
				var customerNo = customer.number;
				var origNo = this.get("customerNumberOrigin");
				
				if(customerNo.length>4 && customerNo!==origNo){
					peopleDS.filter({ field:"number", value: customer.number });
					peopleDS.bind("requestEnd", function(e){
						var response = e.response.results;

						if(response.length>0){
							self.set("isDuplicateNumber", true);
						}else{
							self.set("isDuplicateNumber", false);
						}
					});
				}			
			},
			peopleTypeChange 	: function(e){
				var id = e.sender._selectedValue;

				if(id==5 || id==6 || id==7){
					this.set("isCompany", true);
				}else{					
					var cus = this.get("customer");
					cus.set("company", "");
					cus.set("vat_no", "");

					this.set("isCompany", false);									
				}
			},				
			companyChanges 		: function(e){												
				var self = this;				
				var id = e.sender._selectedValue;
				var heading = e.sender._current.context.innerText;

				if(id>0){
					peopleDS.filter([
						{ field:"company_id", value: id },
						{ field:"parent_type_id", value: 1 }
					]);
					peopleDS.bind("requestEnd", function(e){
						var response = e.response.results;
						
						if(response.length>0){
							var d = response[0];
							var lastNo = d.number;
									            	
			            	var no = 0;
			            	if(lastNo!==undefined){			            		
			            		if(lastNo.length>heading.length){
									no = parseInt(lastNo.substr(heading.length));
								}					
							}
							no++;														
							var cusNo = heading + kendo.toString(no, "0000");
							var cus = self.get("customer");
			            	cus.set("number", cusNo);
						}
					});
				}
				if(id){
            		banhji.ds.transformerDS.filter([
            			{ field: "company_id", value: id },
            			{ field: "type", value:2 }
            		]);

            		areaDS.filter([
            			{ field: "company_id", value: id },
            			{ field: "type", value:3 }
            		]);
            	}				
			},
			currencyChange 		: function(e){
				var self = this;
				var code = e.sender._selectedValue;

				$.each(banhji.ds.currencyDS, function(index, value){
					if(value.code===code){
						var customer = self.get("customer");
						customer.set("sub_code", value.sub_code);

						return false;
					}
				});
			},				
			addEmpty 			: function(){
				banhji.ds.peopleDS.add({										
					number			: "",			
					surname			: "",	
					name			: "",				  	  
					gender			: "ប",	
					dob				: "",
					pob				: "",	
					phone			: "",	
					email			: "",					
					family_member	: "",	
					memo			: "",	
					image_url		: "",			
					card_number		: "",			
					job				: "",			
					company			: "",
					vat_no 			: "",					
					zip_code 		: "",			
					address			: "",
					address2		: "",
					address3		: "",
					address4		: "",

					latitute 		: "",	
					longtitute 		: "",						
					province_id		: 0,	
					district_id		: 0,	
					commune_id		: 0,	
					village_id		: 0,					

					ampere_id		: 0,	
					phase_id		: 0,	
					voltage_id		: 0,

					use_electricity : false,
					transformer_id	: 0,
					tariff_plan_id	: 0,
					exemption_id	: 0,	
					maintenance_id  : 0,
					installment_id 	: 0,											
					
					use_water 		: false,
					wtransformer_id	: 0,
					wtariff_plan_id	: 0,
					wexemption_id	: 0,	
					wmaintenance_id : 0,
					winstallment_id : 0,

					credit_limit 	: 0,
					deposit_amount 	: 0,
					balance			: 0,	
					currency_code 	: "",
					sub_code 		: "km-KH",					
					class_id 		: 0,
					account_receiveable_id: 0,
					revenue_account_id: 0,

					status			: 1,							
					registered_date	: new Date(),
					people_type_id	: 0,
					parent_type_id 	: 1,					
					company_id 		: 0							
				});
				
				var data = banhji.ds.peopleDS.data();
				var cus = data[data.length - 1];
				this.set("customer", cus);	
			},
			sync 				: function(){
				banhji.ds.peopleDS.sync();
			}
		});		

		return viewModel;
	}());	
	
	banhji.invoice = (function(){
		var referenceDS = new kendo.data.DataSource({
		  	transport: {
			  	read: {
				  	url : banhji.baseUrl + "api/invoices/invoice",		  
				  	type: "GET",
				  	dataType: "json"
			  	},
			  	update: {
				  	url : banhji.baseUrl + "api/invoices/invoice",		  
				  	type: "PUT",
				  	dataType: "json"
			  	}
		  	},	  		  	
		  	serverFiltering : true,
		  	serverPaging: true,
		  	pageSize: 10,
		  	schema: {
				model: {
					id: "id"
				},
				data: "results",
				total: "total"	
			}	  	
		});

		var referenceItemDS = new kendo.data.DataSource({
		  	transport: {		  	
			  	read: {
				  	url : banhji.baseUrl + "api/invoice_items/invoice_item",		  
				  	type: "GET",
				  	dataType: "json"
			  	},			  	  	
		        parameterMap: function(options, operation) {
		            if (operation !== "read" && options.models) {
		                return {models: kendo.stringify(options.models)};
		            }
		            return options;
		        }
		  	},		  	
		  	serverFiltering: true,		  	
		  	schema: {
				model: {
					id: "id"
				},
				data: "results",
				total: "total"
			}			  		  		  	
		});
				
		var viewModel = kendo.observable({
			isLoaded 			: false,
			receiptLoaded 		: false,
			soLoaded 			: false,
			estimateLoaded 		: false,
			gdnLoaded 			: false,
			company_id 			: banhji.config.userData.company,			

			biller				: banhji.config.userData.userId,
			sub_code 			: "km-KH",
			rate 				: 1,
			type 				: "Invoice",			
			current_company_id 	: 0,
			
			invoice 			: null,
			invoice_id 			: 0,
			old_balance 		: 0,					
			customer 			: null,			
			bolReference 		: false,
			isEdit 				: false,
			totalQuantity		: 0,

			itemList 			: [],			
			vatList 			: [],			
			cashAccountList 	: [],			
			
			paymentTermList		: banhji.ds.paymentTermDS,
			paymentMethodList	: banhji.ds.paymentMethodDS,
			invoiceItemList		: banhji.ds.invoiceItemDS,
			referenceList 		: referenceDS,
							
			pageLoad 			: function(type, customer_id){
				//Clear existing invoice				
				this.set("isEdit", false);				
				this.set("bolReference", false);				
				this.set("sub_total", "");
				this.set("invoice_id", 0);

				this.loadData();			
					
				var cus = banhji.ds.peopleDS.get(customer_id);
				var com = banhji.ds.companyDS.get(cus.company_id);

			  	this.set("customer", cus);						  						  						  	
			  	this.set("sub_code", cus.sub_code);
			  	this.set("type", type);						  					  	
			  							  	
			  	this.setItemSource(type, cus.company_id);

			  	var rate = banhji.ds.viewModel.getRate(com.based_currency, cus.currency_code);
			  	this.set("rate", rate);			  	

			  	if(this.get("isLoaded")===false || this.get("receiptLoaded")===false || this.get("soLoaded")===false || this.get("estimateLoaded")===false || this.get("gdnLoaded")===false){
			  		this.addEmptyInvoice();	
			  	}																							
			},
			loadData 			: function(){					
				this.setCashAccount();
				this.setItemSource();					
			},			
			closeX 				: function(){
				this.clear();
				
				kendo.fx($("#slide-form")).slideIn("up").play();							
				window.history.go(-1);
			},		    		    		    	    			
			
			//Setup			
		    setCashAccount		: function(){
		    	var self = this;
		    	this.set("cashAccountList", []);		    			    	
				$.each(banhji.ds.accountDS.data(), function(index, value) {					
					if(value.account_type_id==="6"){							    					    				
		    			self.get("cashAccountList").push({
			    			id 		: value.id,
			    			name 	: value.code +' '+ value.name	    			
			    		});					    	
			    	}				    						    							    		
		    	});			    						
		    },			
		    setItemSource 		: function(type){
		    	var self = this;

		    	this.set("itemList", []);
		    	this.set("vatList", []);
		    				    	
				$.each(banhji.ds.itemDS.data(), function(index, value) {																																
					if(value.item_type_id==="6"){																			    				    		
			    		self.get("vatList").push({
			    			id 		: value.id,
			    			name 	: value.name	    			
			    		});						    		
			    	}else{					    		
			    		if(value.item_type_id==="5"){
			    			if(type==="Receipt"){					    			
				    			self.get("itemList").push({
					    			id 		: value.id,
					    			name 	: value.item_sku +' '+ value.name	    			
					    		});
				    		}					    		
		    			}else{
		    				if(value.parent_id>0){				    					    				
				    			self.get("itemList").push({
					    			id 		: value.id,
					    			name 	: value.item_sku +' '+ value.name	    			
					    		});
			    			}
				    	}							    	
			    	}			    					    						    							    		
		    	});			    						
		    },		    	    
						
			//References			
			loadReference 		: function(e){				
				var type = e.sender._selectedValue;

				if(type!==""){
					this.set("bolReference", true);

					var customer_id = this.get("customer").id;
				
					referenceDS.filter([
							{ field: "customer_id", value: customer_id },
							{ field: "status", value: 0 },
							{ field: "type", value: type }
					]);
				}else{
					this.clear();
					this.addEmptyInvoice();
				}								
			},			
			loadEdit 			: function(invoice_id){				
				this.set("isEdit", true);
				this.set("invoice_id", invoice_id);
							
				var invoice = banhji.ds.invoiceDS.get(invoice_id);

				this.loadData(invoice.company_id);
			  	this.setItemSource(invoice.type, invoice.company_id);

		  		var t = kendo.parseFloat(invoice.amount)/invoice.rate;
		  		var v = kendo.parseFloat(invoice.vat)/invoice.rate;
				var sub = t - v;
				this.set("sub_total", kendo.toString(sub, "c", invoice.sub_code));													  	

				//Status
				if(invoice.status==1){
					this.set("paid", true);
				}else{
					this.set("paid", false);
				}				
	  			
	  			var customer = banhji.ds.peopleDS.get(invoice.customer_id);
				this.set("customer", customer);

				this.set("type", invoice.type);	
			  	this.set("old_balance", t);
			  	this.set("rate", invoice.rate);											
				this.set("sub_code", invoice.sub_code);				
		  		
		  		invoice.set("amount", kendo.toString(t, "c", invoice.sub_code));
				invoice.set("vat", kendo.toString(v, "c", invoice.sub_code));
				invoice.set("issued_date", new Date(invoice.issued_date));
				invoice.set("due_date", new Date(invoice.due_date));
				invoice.set("expected_date", new Date(invoice.expected_date));					

				this.set("invoice", invoice);
				banhji.ds.invoiceItemDS.filter({ field: "invoice_id", value: invoice.id });			
			},
		    			
			autoIncreaseNo 		: function(){
				$(".sno").each(function(index,element){                 
				   $(element).text(index + 1); 
				});
			},
			addEmptyInvoice 	: function(){
				var cus = this.get("customer");

				var duedate = new Date();
				duedate.setDate(duedate.getDate()+7);				

				banhji.ds.invoiceDS.add({
		    		number 			: "",
				   	type			: this.get("type"),				   		   					   				   	
				   	amount			: 0,
				   	rate			: 0,
				   	vat				: 0,
				   	vat_id			: "",
				   	status 			: 0,
				   	sub_code		: this.get("sub_code"),
				   	issued_date 	: new Date(),
				   	due_date 		: duedate,
				   	expected_date 	: new Date(),
				   	month_of		: new Date(),			   	
				   	address 		: cus.address,
				   	biller 			: this.get("biller"),
				   	cashier 		: this.get("biller"),
				   	customer_id 	: cus.id,
				   	reference_type	: "",
				   	reference_id  	: 0,
				   	check_no 		: "",
				   	payment_method_id : 0,				   	
					payment_term_id	: 0,
					cash_account_id : 0,			   	
				   	class_id 		: cus.class_id,
				   	transformer_id 	: cus.transformer_id,
				   	memo 			: "",
				   	memo2			: "",
				   	company_id		: cus.company_id				
		    	});

		    	this.addNewRow();  	
				
				var data = banhji.ds.invoiceDS.data();
				var invoice = data[data.length-1];				
				invoice.set("dirty", true);
				this.set("invoice", invoice);
			},
			addNewRow 			: function(){				
				var invoice_id = 0;
				if(this.get("isEdit")){
					invoice_id = this.get("invoice_id");
				}
				
				banhji.ds.invoiceItemDS.add({					
					invoice_id 	: invoice_id,
					item_id 	: "",
					description : "",				
					quantity 	: 1,
					unit_price 	: 0,												
					amount 		: 0,
					rate		: this.get("rate"),
					sub_code	: this.get("sub_code"),
					vat 		: false,
					so_id		: 0		
				});
				this.autoIncreaseNo();															
			},
			removeRow 			: function(e){						
				var d = e.data;				
				banhji.ds.invoiceItemDS.remove(d);
		        this.change();		        
			},		
			change				: function(){
				var invoice = this.get("invoice");

				if(banhji.ds.invoiceItemDS.total()>0){			
					var subTotal = 0;
					var vat = 0;
					var vatAmount = 0;
					var totalQty = 0;

					var vat_id = invoice.vat_id;													
					if(vat_id>0 && vat_id!=null){				
						var vatItem = banhji.ds.itemDS.get(vat_id);						
						vatAmount = vatItem.price;
					}

					$.each(banhji.ds.invoiceItemDS.data(), function(index, data) {				
						var amt = data.quantity * data.unit_price;
						subTotal += amt;

						if(data.vat && vatAmount>0){
							vat += amt * vatAmount;						
						}

						totalQty += data.quantity;
			        });

			        var total = subTotal + vat;			

			        this.set("sub_total", kendo.toString(subTotal, "c", invoice.sub_code));
			        invoice.set("vat", kendo.toString(vat, "c", invoice.sub_code));			
					invoice.set("amount", kendo.toString(total, "c", invoice.sub_code));
					this.set("totalQuantity", totalQty);

					this.autoIncreaseNo();			    	
		    	}else{
		    		this.set("sub_total", kendo.toString(0, "c", invoice.sub_code));
			        invoice.set("vat", kendo.toString(0, "c", invoice.sub_code));			
					invoice.set("amount", kendo.toString(0, "c", invoice.sub_code));
					this.set("totalQuantity", 0);
		    	}    	
			},
			itemChange 			: function(e){								
				var data = e.data;				
		        var rate = this.get("rate");		        
		        var item = banhji.ds.itemDS.get(data.item_id);		 
		        		        
	    		data.set("description", item.name);
		        data.set("unit_price", item.price/rate);
		        	        
		        this.change();	                	        	
			},
			referenceChange 	: function(e){
				var self = this;

				var id = e.sender._selectedValue;
				var invoice = this.get("invoice");
				
				if(id>0 || id!==""){					
				 	var d = referenceDS.get(id);			

				 	if(d.vat_id>0){
			  			invoice.set("vat_id", d.vat_id);
			  		}

			  		var t = kendo.parseFloat(d.amount)/d.rate;
			  		var v = kendo.parseFloat(d.vat)/d.rate;

				 	invoice.set("amount", kendo.toString(t, "c", d.sub_code));
				  	invoice.set("rate", d.rate);						
					invoice.set("vat", kendo.toString(v, "c", d.sub_code));
					invoice.set("sub_code", d.sub_code);
					invoice.set("address", d.address);					
					invoice.set("memo", d.memo);
					invoice.set("memo2", d.memo2);

				 	invoice.set("reference_id", id);

				 	referenceItemDS.filter({ field:"invoice_id", value: id });
				 	referenceItemDS.bind("requestEnd", function(e){
				 		var subTotal = 0;
						var vat = 0;
						var vatAmount = 0;

						var vat_id = invoice.vat_id;													
						if(vat_id>0 && vat_id!=null){				
							var vatItem = banhji.ds.itemDS.get(vat_id);						
							vatAmount = vatItem.price;
						}

						banhji.ds.invoiceItemDS.data([]);
						$.each(e.response.results, function(index, value) {
							value.id = 0;				
							var amt = value.quantity * value.unit_price;
							subTotal += amt;

							if(value.vat && vatAmount>0){
								vat += amt * vatAmount;						
							}

							//Add new item
							banhji.ds.invoiceItemDS.add({					
								invoice_id 	: 0,
								item_id 	: value.item_id,
								description : value.description,				
								quantity 	: value.quantity,
								unit_price 	: value.unit_price,												
								amount 		: value.amount,
								rate		: value.rate,
								sub_code	: value.sub_code,
								vat 		: value.vat,
								so_id		: value.so_id		
							});
				        });

				        var total = subTotal + vat;

				        self.set("sub_total", kendo.toString(subTotal, "c", invoice.sub_code));
				        invoice.set("vat", kendo.toString(vat, "c", invoice.sub_code));			
						invoice.set("amount", kendo.toString(total, "c", invoice.sub_code));

						self.autoIncreaseNo();			    		
				 	});				 				 				 				 				
				}else{					
					this.clear();
					this.addEmptyInvoice();
				}								
			},
			clear 				: function(){
				this.set("sub_total", 0);
				this.set("invoice", null);

				banhji.ds.invoiceDS.cancelChanges();
				banhji.ds.invoiceItemDS.cancelChanges();

				//banhji.ds.invoiceDS.data([]);
				banhji.ds.invoiceItemDS.data([]);												
			},
			
			//Actions
			save 				: function(){				
		    	var self = this;
		    	
				this.invoiceSync()
				.then(function(invoice){					
					if(invoice.type==="Invoice" || invoice.type==="Receipt"){
						self.addJournal();						
					}
					
					self.invoiceItemSync(invoice.id);	    			
				});
			},
			update 				: function(){
				var self = this;

				this.invoiceSync()
				.then(function(invoice){					
					banhji.ds.invoiceItemDS.sync();					
				}).then(function(){
					self.closeX();
				});
			},		    		    
		    
		    //Create
		    invoiceSync 				: function(){
		    	var dfd = $.Deferred();

				var rate = this.get("rate");
				var invoice = this.get("invoice");
				var t = invoice.amount;		       
		        var v = invoice.vat;
		        
				var amt = Number(t.replace(/[^0-9\.]+/g,""));
				var vat = Number(v.replace(/[^0-9\.]+/g,""));
		        
		        invoice.set("amount", amt*rate);
		        invoice.set("vat", vat*rate);
		        invoice.set("rate", rate);

		        //Receipt
		        if(invoice.type==="Receipt"){
		        	invoice.set("paid", amt*rate);
		        }
		        				
				//Update customer balance	    
				if(invoice.type==="Invoice"){
					var cus = this.get("customer");
					var cusBalance = kendo.parseFloat(cus.balance);
					var balance = 0;

					if(this.get("isEdit")){
						var oldBalance = this.get("old_balance");
						if(oldBalance!==amt){										    	
				    		balance = (cusBalance - oldBalance) + amt;
				    	}
					}else{
						balance = cusBalance + amt;
					}

					cus.set("balance", balance);
					banhji.ds.peopleDS.sync();						
				}

				//Update references
				if(invoice.reference_id>0){
					var ref = referenceDS.get(invoice.reference_id);
					ref.set("status", 1);
					referenceDS.sync();
				}
	
		    	banhji.ds.invoiceDS.sync();
			    banhji.ds.invoiceDS.bind("requestEnd", function(e){			    	
    				dfd.resolve(e.response.results);    				
			    });

			    return dfd;	    		    	
		    },
		    invoiceItemSync 	: function(invoice_id){
		    	var dfd = $.Deferred();
		    	var self = this;
		    	$.each(banhji.ds.invoiceItemDS.data(), function(index, value){										
					value.set("invoice_id", invoice_id);
				});

		    	banhji.ds.invoiceItemDS.sync();
			    banhji.ds.invoiceItemDS.bind("requestEnd", function(e){		    	
    				dfd.resolve(e.response.results);
    				self.clear();
    				self.addEmptyInvoice();   				
			    });

			    return dfd;
		    },		    	    	  
		    addJournal 			: function(){
		    	var self = this;
		    	var invoice = this.get("invoice");
		    	var customer = this.get("customer");

				var journalEntries = [];				
				var saleList = {};			
				var inventoryList = {};
				var cogsList = {};
				var witdrawList = {};
				var depositAmount = 0;
				var rate = this.get("rate");
				
				//Arrange sale, cogs, inventory, customer deposit or widraw
				$.each(banhji.ds.invoiceItemDS.data(), function(index, data){								
					var item = banhji.ds.itemDS.get(data.item_id);
					var amt = data.quantity*data.unit_price;						

					//Add sale list
					var incomeID = kendo.parseInt(item.income_account_id);											
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
							var itemCost = data.quantity*item.cost;
							var cogsID = kendo.parseInt(item.cogs_account_id);
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
							var inventoryID = kendo.parseInt(item.general_account_id);
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
							var depositID = kendo.parseInt(item.general_account_id);

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
				var vatID = invoice.vat_id;			
				if(vatID>0 || vatID!==""){
					var vats = banhji.ds.itemDS.get(vatID);
					var vatOutID = vats.income_account_id;
					
					if(vatOutID>0){
						var vatAmt = kendo.parseFloat(this.get("vat"))*rate;
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
					banhji.journalEntry.add({
						journal_id	: 0,
				 		account 	: customer.account_receiveable_id, 
				 		dr 			: cash*rate, 
				 		cr 			: 0,
				 		class_id 	: invoice.class_id, 
				 		memo 		: invoice.memo, 
				 		exchange_rate: rate,
					 	main 		: 0				 		
					});

					//Sale accounts on Cr
					$.each(saleList, function(index, value){
						banhji.journalEntry.add({
							journal_id	: 0,
					 		account 	: value.id,	 		
					 		dr 			: 0, 
					 		cr 			: value.amt*rate,
					 		class_id  	: invoice.class_id,
					 		memo 		: invoice.memo,
					 		exchange_rate: rate,
						 	main 		: 0	 		
						});
					});
				}

				//Inventory to journal
				//COGS on Dr 			
				if(!jQuery.isEmptyObject(cogsList)){							
					$.each(cogsList, function(index, value){				
						banhji.journalEntry.add({
							journal_id 	: 0,
					 		account 	: value.id,	 		
					 		dr 			: value.amt*rate, 
					 		cr 			: 0,
					 		class_id  	: invoice.class_id,
					 		memo 		: invoice.memo,
					 		exchange_rate: rate,
						 	main 		: 0	 		
						});	
					});							
				}
				//Inventory on Cr
				if(!jQuery.isEmptyObject(inventoryList)){
					$.each(inventoryList, function(index, value){					
						banhji.journalEntry.add({
							journal_id 	: 0,
					 		account 	: value.id,	 		
					 		dr 			: 0, 
					 		cr 			: value.amt*rate,
					 		class_id  	: invoice.class_id,
					 		memo 		: invoice.memo,
					 		exchange_rate: rate,
						 	main 		: 0	 		
						});
					});
				}
				
				//Witdraw to journal
				if(!jQuery.isEmptyObject(witdrawList)){
					//Deposit on Dr
					$.each(witdrawList, function(index, value){
						banhji.journalEntry.add({
							journal_id 	: 0,
					 		account 	: value.id,	 		
					 		dr 			: value.amt*rate, 
					 		cr 			: 0,
					 		class_id  	: invoice.class_id,
					 		memo 		: invoice.memo,
					 		exchange_rate: rate,
						 	main 		: 0	 		
						});
					});

					var wCash = 0;
					$.each(witdrawList, function(index, value){					
						wCash += value.amt;
					});

					//Cash on Cr							
					banhji.journalEntry.add({
						journal_id 	: 0,
				 		account 	: invoice.cash_account_id,	 		
				 		dr 			: 0, 
				 		cr 			: wCash*rate,
				 		class_id  	: invoice.class_id,
				 		memo 		: invoice.memo,
				 		exchange_rate: rate,
					 	main 		: 0	 		
					});				
				}
				//Calcualte customer deposit
				if(depositAmount>0){
					var deposit = kendo.parseFloat(customer.deposit_amount) + kendo.parseFloat(depositAmount);					
					customer.set("deposit_amount", deposit);
					banhji.ds.peopleDS.sync();
				}
				
				//Add journal to datasource
				banhji.transaction.addNew();
				var journal = banhji.transaction.get("current");
				
				journal.set("company_id", this.get("company_id"));
				journal.set("people_id", customer.id);
				journal.set("employee_id", banhji.config.userData.userId);				
				journal.set("transaction_type", "Invoice");				
				journal.set("memo", "វិក្កយបត្រ");
				journal.set("date", kendo.toString(new Date(invoice.issued_date), "yyyy-MM-dd"));				
				journal.set("voucher", null);
				journal.set("class_id", invoice.class_id);
				journal.set("status", 0);
				journal.set("reference", null); //invoice_id
				journal.set("vat_id", {id: null});
							 			 	
			 	banhji.transaction.save()
			 	.then(function(journal){			 		
		 			$.each(banhji.journalEntry.dataSource.data(), function(index, value){
		 				value.set("journal_id", journal.data.id);
		 			});
		 					 			
		 			banhji.journalEntry.save();
			 	});
			}			
		});
		
		return viewModel;	
	}());

	banhji.statement = (function(){
		var statementDS = new kendo.data.DataSource({
		  	transport: {	  
			  	read: {
				  	url : banhji.baseUrl + "api/invoices/statement",
				  	type: "GET",
				  	dataType: "json"		  
			  	}
		  	},
		  	aggregate: [
			    { field: "amount", aggregate: "sum" }
			],
		  	serverFiltering: true	
		});

		var agingDS = new kendo.data.DataSource({
		  	transport: {	  
			  	read: {
				  	url : banhji.baseUrl + "api/invoices/aging",
				  	type: "GET",
				  	dataType: "json"		  
			  	}			  	
		  	},
		  	serverFiltering: true
		});
		
		var viewModel = kendo.observable({
			isLoaded 		: false,
			customer 		: null,

			start_date 		: new Date(),
			end_date 		: new Date(),											
			amount_due 		: 0,

			statementList 	: statementDS,
			agingList 		: agingDS,
			
			pageLoad 		: function(customer_id){
				var cus = banhji.ds.peopleDS.get(customer_id);
				this.set("customer", cus);											
			},
			statement_date_text : function(){
				return kendo.toString(this.get("statement_date"), "dd-MM-yyyy");
			},
			loadStatement 	: function(){
				var self = this;
				var cus = this.get("customer");


				banhji.ds.invoiceDS.filter(
					{ field: "customer_id", value: cus.id },
					{ field: "issued_date >=", value: kendo.toString(this.get("start_date"), "yyyy-MM-dd") },
					{ field: "issued_date <=", value: kendo.toString(this.get("end_date"), "yyyy-MM-dd") }
				);

				statementDS.filter({
					filters: [
						{ field: "customer_id", value: cus.id },
						{ field: "start_date", value: kendo.toString(this.get("start_date"), "yyyy-MM-dd") },
						{ field: "end_date", value: kendo.toString(this.get("end_date"), "yyyy-MM-dd") }
					]
				});
				statementDS.bind("requestEnd", function(e){
		    		var response = e.response;
    				var type = e.type;

					if(type==="read"){
						var total = 0;						
						if(response.length>0){
							var last = response[response.length-1];
							total = kendo.parseFloat(last.balance);
						}					  					  	
					  	self.set("amount_due", kendo.toString(total, "c", cus.sub_code));					  
				  	}			  	  			  	
				});	
								
				agingDS.filter({
					filters: [
						{ field: "customer_id", value: cus.id },
						{ field: "start_date", value: kendo.toString(this.get("start_date"), "yyyy-MM-dd") },
						{ field: "end_date", value: kendo.toString(this.get("end_date"), "yyyy-MM-dd") }
					]
				});
			},			
			printStatement 		: function(){
				$("#divStatement").print();
			},
			clear 	 			: function(){
				this.set("amount_due", kendo.toString(0, "c", banhji.customer.viewModel.get("sub_code")));

				statementDS.data([]);
				agingDS.data([]);				
			}
		});
		
		return viewModel;	
	}());
	
	banhji.meter = (function(){
		var viewModel = kendo.observable({
			hasTariff			: false,
			isEditMode 			: false,
			isEditModeBrker		: false,
			isLoaded 			: false,

			meter 				: null,
			breaker 			: null,

			statuses			: [
		        { name: "ប្រើប្រាស់", value: "1" },
		        { name: "ឈប់ប្រើ", value: "0" }	        
		    ],			

		    parentMeterList		: [],
		    meterItemList 		: [],
		    breakerItemList 	: [],
		    tariffList 			: banhji.ds.tariffDS,

		    electricityBoxList 	: banhji.ds.electricityBoxDS,
		    meterList			: banhji.ds.meterDS,						
			breakerList 		: banhji.ds.breakerDS,			
			transformerList 	: banhji.ds.transformerDS,					
			
			pageLoad 			: function(customer_id){				
				var self = this;
				var company_id = banhji.config.userData.company;

				this.set("parentMeterList", []);

				this.set("customer_id", customer_id);
				var cus = banhji.customerCenter.get("customer");
				var fullIdName = cus.number +" "+ cus.surname +" "+ cus.name;
				this.set("fullIdName", fullIdName);
					
				this.setItemList();
				banhji.ds.tariffDS.filter({ field: "company_id", value: company_id });	
				banhji.ds.transformerDS.filter({ field: "company_id", value: cus.company_id });						

				banhji.ds.breakerDS.filter({ field: "customer_id", value: customer_id });				
				banhji.ds.meterDS.filter({ field: "customer_id", value: customer_id });
				banhji.ds.meterDS.bind("requestEnd", function(e){
	      			var response = e.response.results;
    				var type = e.type;
    				
    				if(type==="read"){
    					for (var i=0;i<response.length;i++) {
    						var d = response[i];
    						d.parent_id = kendo.parseInt(d.parent_id);
    						
    						if((d.parent_id===0) && (d.status="1")){    							    							
    							self.get("parentMeterList").push({
    								id : d.id,
    								name: d.meter_no
    							});
    						}	
    					}    					
    				}
	      		});																	
			},			
			setItemList 		: function(){
				var self = this;

				this.set("meterItemList", []);
				this.set("breakerItemList", []);				
				$.each(banhji.ds.itemDS.data(), function(index, value){																
					if(value.parent_id==="1"){							
						self.meterItemList.push({
							id 	: value.id,
							name: value.item_sku +' '+ value.name 
						});
					}
					if(value.parent_id==="2"){
						self.breakerItemList.push({
							id 	: value.id,
							name: value.item_sku +' '+ value.name 
						});
					}										
				});
			},			

	      	//Meter
	      	openMeterWindow		: function(){
	         	var window = $("#meter-window").data("kendoWindow");
	          	window.title("កុងទ័រ");          	
	          	window.center().open();
	      	},
	      	closeMeterWindow 	: function(){	      		
	      		banhji.ds.meterDS.cancelChanges();
	      		var window = $("#meter-window").data("kendoWindow");          	         	
	          	window.close();
	      	},
	      	meterGridChange		: function(e) {	        	
	        	var selected = e.sender.dataItem(e.sender.select());
	        	this.set("meter", selected);
	        	
	         	this.set("isEditMode", true);	         	
	  
				if(selected.tariff_id>0){
					this.set("hasTariff", true);
				}else{
					this.set("hasTariff", false);
				}			

				this.openMeterWindow();
	    	},
	      	btnAddNewMeterClick : function(){
	      		this.addEmptyMeter();
	      		this.set("isEditMode", false)	      		
	      		this.openMeterWindow();
	      	},
	      	addEmptyMeter		: function(){	      		
	      		banhji.ds.meterDS.add({				
					type				: "electricity",
					meter_no			: "",
					multiplier			: 1,
					max_digit			: 10000,		
					status				: 1,	
					ear_sealed			: true,
					cover_sealed		: true,	
					tariff_id			: 0,
					memo				: "",	
					customer_id			: this.get("customer_id"),
					item_id				: "",
					transformer_id		: "",
					electricity_box_id	: "",
					date_used			: new Date(),	
					parent_id 			: "",

					electricity_boxes   : []

				});

				var data = banhji.ds.meterDS.data();
				var meter = data[data.length - 1];
	      						
				this.set("meter", meter);
	      	},
	      	meterSave 		: function(){
	      		var self = this;

	      		banhji.ds.meterDS.sync();
	      		banhji.ds.meterDS.bind("requestEnd", function(e){
	      			if(e.type==="create"){	      			
		      			var response = e.response.results;
		      			
		      			banhji.ds.meterRecordDS.add({
			      			meter_id : response.id,
			      			customer_id: response.customer_id,
			      			transformer_id: response.transformer_id,
			      			invoice_id: -1
			      		});
			      		banhji.ds.meterRecordDS.sync();
	      			}
	      		});
	      			      		
	      		//Close window
	      		var window = $("#meter-window").data("kendoWindow");          	         	
	          	window.close();	      		
	      	},	     
	      	deleteMeter 		: function(){
	      		if (confirm("តើលោកអ្នកពិតជាចង់លុបទិន្នន័យនេះមែនឬទេ?")) {
	      			var meter_id = this.get("meter").id;
	      			var meter = banhji.ds.meterDS.get(meter_id);
	  				banhji.ds.meterDS.remove(meter);
		            banhji.ds.meterDS.sync();
		            
		            //Close window
		      		var window = $("#meter-window").data("kendoWindow");          	         	
		          	window.center().close();	            
		        }
	      	},

	      	//Breaker
	      	openBreakerWindow	: function(e){
	         	var window = $("#breaker-window").data("kendoWindow");
	          	window.title("ឌីស្យុងទ័រ");          	
	          	window.center().open();
	      	},
	      	closeBreakerWindow 	: function(){
	      		banhji.ds.breakerDS.cancelChanges();

	      		var window = $("#breaker-window").data("kendoWindow");          	         	
	          	window.center().close();
	      	},   
	      	breakerGridChange		: function(e) {
	      		var selected = e.sender.dataItem(e.sender.select());	     
	        	
	         	this.set("breaker", selected);
	         	this.set("isEditModeBrker", true);	     			        	
	  
	  			this.openBreakerWindow();
	    	},
	      	btnAddNewBreakerClick : function(){
	      		this.addEmptyBreaker();
	      		this.set("isEditModeBrker", false)	      		
	      		this.openBreakerWindow();
	      	},
	      	addEmptyBreaker		: function(){	      		
	      		banhji.ds.breakerDS.add({				
					name		: "",							
					status		: 1,					
					customer_id : this.get("customer_id"),
					item_id 	: "",				
					date_used	: new Date()
				});

				var data = banhji.ds.breakerDS.data();
				var breaker = data[data.length - 1];
	      						
				this.set("breaker", breaker);
	      	},
	      	breakerSave 		: function(){	      		
	      		banhji.ds.breakerDS.sync();
	      		
	      		//Close window
	      		var window = $("#breaker-window").data("kendoWindow");          	         	
	          	window.close();	      		
	      	},
	      	deleteBreaker 		: function(){
	      		if (confirm("តើលោកអ្នកពិតជាចង់លុបទិន្នន័យនេះមែនឬទេ?")) {
	      			var breaker_id = this.get("breaker").id;
	      			var breaker = banhji.ds.breakerDS.get(breaker_id);
	  				banhji.ds.breakerDS.remove(breaker);
		            banhji.ds.breakerDS.sync();
		            
		            //Close window
		      		var window = $("#breaker-window").data("kendoWindow");          	         	
		          	window.close();            
		        }
	      	},
	      	clearTariff 		: function(){
	      		var meter = this.get("meter");
	      		meter.set("tariff_id", 0);
	      	}
		});		

	    return viewModel;
	}());

	banhji.notice = (function(){		
		
		var viewModel = kendo.observable({
			customer_id 		: 0,
			customer 			: null,
			rate 				: 1,					
			number 				: "",
			
			status				: 0,
			biller				: banhji.config.userData.userId,			
			address				: "",		  	  
			issued_date			: new Date(),
			due_date			: "",		
			payment_term_id		: "",		
			memo				: "",
			class_id			: "",		
									
			avg 				: 0,
			usage_per_day		: 0,		
			totalReading 		: 0,
			selectedReading		: 0,

			meter 				: null,
			
			noticeItemList 		: [],
			selectedReadingList	: [],
			invoiceList 		: [],
			averageRecordList 	: [],
			invoiceIdList		: [],

			paymentTermList		: [],
			currencyList		: [],
			classList 			: [],
			meterList 			: [],
			readingList 		: [],				
			
			pageLoad 			: function(customer_id){
				var self = this;

				this.setDueDate();
				this.setNumber();
				planItemDS.read();			
				tariffItemDS.read();
				currencyRateDS.read();

				this.set("noticeItemList", []);

				meterDS.filter({
					filters: [
						{ field: "customer_id", value: customer_id },
						{ field: "parent_id", value: 0 },
						{ field: "status", value: 1 }					
					]
				});

				//Promise ^_^
				this.loadCustomer(customer_id).then(
					function(data){
						var d = data[0];									  	
					  	self.set("customer", d);		  	
					  	self.set("address", d.address);					  						  	
					  	self.set("sub_code", d.currencies.sub_code);						  					  	

					  	var company_id = d.companies.id;
					  	if(d.companies.parent_id>0){
					  		compnay_id = d.companies.parent_id;					  		
					  	}

					  	self.loadClass(company_id);					  						  	
					  	self.setRate(d.companies.based_currency, d.currency_code, d.company_id);
					  	
					  	self.set("class_id", d.class_id);
					}							
				);						
			},			
			loadCustomer 		: function(id){
		    	var self = this, dfd = $.Deferred();

		    	customerDS.filter({ field: "id", value: id });
		    	customerDS.bind("requestEnd", function(e){
		    		var response = e.response;
    				var type = e.type;

					if(type==="read"){
						dfd.resolve(response);											  												  
				  	}			  	  			  	
				});

				return dfd;															    			  	    	
		    },
		    setNumber 			: function(){
		    	var self = this;
		    	var type = "Notice"
		    	var header = "ES";
		    	
				var dataSource = new kendo.data.DataSource({
					transport: {
						read: {
							url: banhji.baseUrl + "api/invoices/invoice",
							type: "GET",
							dataType: "json"
						}
					},
					serverSorting: true,
					serverPaging: true,
					serverFiltering: true
				});

				dataSource.query({
					filter: { field: "type", value: type },
					sort: { field: "id", dir: "desc" },										
					pageSize: 1
				});

				dataSource.bind("requestEnd", function(e){
					var response = e.response;
					
					var d = new Date();
					var YY = kendo.toString(d, "yy");
					var MM = kendo.toString(d, "MM");
					var headerWithDate = header + YY + MM;

					var last_no = "";
					if(response.length>0){					
						last_no = e.response[0].number;
					}
					var no = 0;
					var curr_YY = 0;
					if(last_no.length>10){
						no = parseInt(last_no.substr(last_no.length - 5));
						curr_YY = parseInt(last_no.substr(last_no.length - 9, 2));			
					}				 
					
					//Reset invoice number back to 1 for the new year starts
					if(parseInt(YY)>curr_YY){
						no = 1;
					}else{
						no++;
					}
											
					var number = headerWithDate + kendo.toString(no, "00000");					
					self.set("number", number);
				});											   	
		    },
		    setRate 			: function(company_code, customer_code, company_id){
				var rate = 1;								
		        if(company_code!==customer_code){
		        	var companyCodeRate = this.getCurrencyRateByCode(company_code, company_id);
		        	var customerCodeRate = this.getCurrencyRateByCode(customer_code, company_id);

		        	if(companyCodeRate>0 && customerCodeRate>0){
		        		rate = companyCodeRate/customerCodeRate;
		        	}	
		        }
		        this.set("rate", rate);		        	        
			},
			getCurrencyRateByCode 	: function(code){
				var rate = 0;			
				$.each(currencyRateDS.data(), function(index, value){	        	
		        	if(code===value.code){	        		
		        		rate = kendo.parseFloat(value.rate);
		        		return false;
		        	}	        	
		        });
				
		        return rate;
			},
		    loadClass 			: function(company_id){				
				classDS.filter([
						{ field: "type", value: "Class" },						
						{ field: "company_id", value: company_id }
				]);				
			},					
		    total 				: function(){
				var total = 0;	
				$.each(this.get("noticeItemList"), function(index, data) {
					var amt = ((kendo.parseInt(data.days*data.usage_per_day))*data.unit_price)-data.amount_paid;				
		            total+=amt;	            
		        });
		        return kendo.toString(total, 'c0');	
			},
		    setDueDate 			: function(){
		    	var duedate = new Date();
				duedate.setDate(duedate.getDate()+7);
				this.set("due_date", duedate);			
		    },
		    reset 				: function(){
				this.set("totalReading", 0);
				this.set("avg", 0);
				this.set("selectedReading", 0);
				this.set("usage_per_day", 0);

				var d = meterRecordDS.data();
				if(d.length>0){
					$.each(d, function(index, data) {						           
			            data.set("isCheck", false);	            
			        });	
				}

				this.avgChange();
			},		
		    getTariffId  		: function(tariff_plan_id, month_of){	    	
				var tariff_id = 0;						
				var data = planItemDS.data();						
		        for (var i = 0; i < data.length; i++) {
		            var d = data[i];	            
		            if((d.tariff_plan_id==tariff_plan_id) && (month_of>=d.start_date)){
		            	tariff_id = d.tariff_id;
		            	break;
		            }
		        }
		        return tariff_id;		
			},	      
			addNewRow 			: function(){
				var meter = this.get("meter");
				this.noticeItemList.push({				
					'invoice_id' 	: 0,
					'meter_id'		: meter.id,
					'month_of'		: "",
					'description'	: "",
					'days' 			: 0,				
					'usage_per_day' : this.get("usage_per_day"),				
					'unit_price'	: 0,				
					'amount_paid' 	: 0,
					'amount'		: 0						
				});						
			},
			removeRow 			: function(e){
				var item = e.data;
		        var index = this.get("noticeItemList").indexOf(item);        
		        this.get("noticeItemList").splice(index, 1);	        
			},		
			meterChange 		: function(){				
				var meter = this.get("meter");

				var address = meter.electricity_boxes.box_no + ' ' + meter.meter_no;
				this.set("address", address); 
				
				meterRecordDS.filter({ field: "meter_id", value: meter.id });
			},
			gridChange 			: function(eventArgs) {
		        var data = eventArgs.sender.dataItem(eventArgs.sender.select());
		        this.selectedReadingList.push(data.active_usage);
		    },	    
			avgChange			: function(){			
				var usage_per_day = this.get("usage_per_day");
				var arr = this.get("noticeItemList");
				if(arr.length>0){
					$.each(arr, function(index, data) {				
			            data.set("usage_per_day", usage_per_day);	            
			        });	
				}			    	
			},
			monthOfChange 		: function(e){		
				var d = e.data;
				var meter = this.get("meter");
				var cus = this.get("customer");

				var fullMonthOf = new Date(d.month_of);
				fullMonthOf.setDate(1);
				fullMonthOf = kendo.toString(fullMonthOf, "yyyy-MM-dd");

				d.set("description", "ថាមពលត្រូវរំលឹកសំរាប់ខែ " + kendo.toString(new Date(d.month_of), "MM-yyyy"));

				var tariff_id = this.getTariffId(cus.tariff_plan_id, fullMonthOf);			
				var active_usage = kendo.parseInt(d.days*d.usage_per_day);
				
				//Apply tariff item
				var price = 0;
				var dataj = tariffItemDS.data();
				for (var j=0;j<dataj.length;j++){				 
					var dj = dataj[j];								
					if((dj.tariff_id==tariff_id) && (active_usage>=dj.usage)){
						if(dj.is_flat==0){
							price = dj.price;																									
						}else{												
							price = dj.amount;										
						}
					}
				}

				d.set("unit_price", price);
			
				$.ajax({
					type: "GET",
					url: banhji.baseUrl + "api/invoice_items/by_meter_id_month_of",
					data: {
						meter_id 	: meter.id,
						month_of 	: fullMonthOf
					},
					dataType: "json",
					success: function (response) {
						//var data = response.d;
						d.set("amount_paid", response);											  
					}
				});        	        	        	
			},
			checkboxChange 		: function(){			
				var total = 0;
				var counter = 0;
				for (var i=0;i< meterRecordDS.total(); i++) {
					var d = meterRecordDS.at(i);
					
					if(d.isCheck){
						total += d.active_usage;
						counter++;
					}
				}

				var avgNum = total/counter;
				var avg = Math.ceil(avgNum * 100) / 100;

				var num = avg/30;
				var usage_per_day = Math.ceil(num * 100) / 100;
				
				this.set("totalReading", total);
				this.set("avg", avg);
				this.set("selectedReading", counter);
				this.set("usage_per_day", usage_per_day);

				this.avgChange();
			},		
		    createNotice 		: function(){	    	
		    	var arr = this.get("noticeItemList");
				if(arr.length>0){
					//Change date format
					$.each(arr, function(index, data) {
						//Month Of
						var fullMonthOf = new Date(data.month_of);
						fullMonthOf.setDate(1);
						fullMonthOf = kendo.toString(fullMonthOf, "yyyy-MM-dd");				
			            data.set("month_of", fullMonthOf);

			            //Amount
			            var amt = ((kendo.parseInt(data.days*data.usage_per_day))*data.unit_price)-data.amount_paid;
			            data.set("amount", amt);
			        });

			        //Add average record to []
			        for (var i=0; i< meterRecordDS.total(); i++) {
			    		var d = meterRecordDS.at(i);					
			            this.get("averageRecordList").push({
				    		notice_id		: 0,
				    		meter_record_id : d.id
				    	});

				    	if(d.invoice_id>0){
				    		this.get("invoiceIdList").push(d.invoice_id);
				    	}           
			        }

			        var rate = this.get("rate");

			        var monthOf = new Date(this.get("month_of"));
					monthOf.setDate(1);
					monthOf = kendo.toString(monthOf, "yyyy-MM-dd");

			        //Add invoice to datasource	
			    	invoiceDS.add({
			    		'number' 			: this.get("number"),
					   	'type'				: "Notice",				   		   					   				   	
					   	'amount'			: kendo.parseFloat(this.get("total")),
					   	'rate'				: rate,
					   	'vat'				: 0,
					   	'vat_id'			: 0,
					   	'status' 			: 0,
					   	'sub_code'			: this.get("sub_code"),
					   	'issued_date' 		: kendo.toString(this.get("issued_date"),"yyyy-MM-dd"),
					   	'due_date' 			: kendo.toString(this.get("due_date"),"yyyy-MM-dd"),					   	
					   	'month_of'			: monthOf,			   	
					   	'address' 			: this.get("address"),
					   	'biller' 			: this.get("biller"),
					   	'customer_id' 		: this.get("customer").id,					   			   	
					   	'class_id' 			: this.get("class_id"),
					   	'memo' 				: this.get("memo"),					   	
					   	'company_id'		: this.get("customer").company_id,
				   
					   	'invoice_items'		: this.get("noticeItemList"),
					   	'average_records'	: this.get("averageRecordList")
			    	});
			    	invoiceDS.sync();
			    	this.clearDatasource();
			    	this.updateInvoiceStatus5();	
				}	        	    	
		    },
		    updateInvoiceStatus5 : function(){
				var ids = this.get("invoiceIdList");
				if(ids.length>0){
					$.ajax({
						type: "PUT",
						url: banhji.baseUrl + "api/invoices/status5",			
						data: {ids: kendo.stringify(ids)},
						dataType: "json",
						success: function (response) {
							//var data = response.d;			  
						}
					});
				}							
			},	    	    
		    clearDatasource 	: function(){	    	
				this.set("noticeItemList", []);
				this.set("averageRecordList", []);
				this.set("invoiceIdList", [])

				//Remove invoice
				invoiceDS.data([]);						
		    }
		});

		return {			
			viewModel 	: viewModel			
		};	
	}());

	banhji.eReadingEdit = (function(){
		var meterDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/meters/meter",
					type: "GET",
					dataType: "json"
				},				
				parameterMap : function(options, operation) {
					if( operation !== "read" && options.models ) {
						return { models: kendo.stringigy(options.models) };
					}
					return options;
				}
			},
			serverFiltering: true,				
			schema: {
				model: {
					id: "id"
				},
				data: "results",
				total: "total"	
			}
		});
		
		var meterRecordDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/meter_records/meter_record",
					type: "GET",
					dataType: "json"
				},
				update: {
				  	url: banhji.baseUrl + "api/meter_records/meter_record",
				  	type: "PUT",
				  	dataType: "json"
			  	},			  	
			  	parameterMap: function(options, operation) {
					if (operation !== "read" && options.models) {
						return {models: kendo.stringify(options.models)};
				  	}		  
				  	return options;  
			   	}
			},					  	
			serverFiltering: true,
			serverSorting: true,
		  	schema: {
				model: {
					id: "id"
				},
				data: "results",
				total: "total"	
			}		  			
		});

		var readerDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/employees/index",
					type: "GET",
					dataType: "json"
				}
			},
			schema: {
				data: "employees",
				total: "total"
			}		
		});		

		var viewModel = kendo.observable({
			meter_no 			: "",	    	
			total_active		: 0,
			total_reactive		: 0,

			reading 			: null,						
			readerList 			: readerDS,		

			pageLoad 			: function(){				
											
			},
			search 				: function(){
				var self = this;

				this.loadMeter(this.get("meter_no"))
				.then(function(meter){					
					return self.loadMeterRecord(meter[0].id);
				}).then(function(reading){
					var d = reading[0];
					
					self.onChange();

					self.set("reading", d);
				});				
			},
			loadMeter 			: function(meterNo){
				var dfd = $.Deferred();

				meterDS.filter({ field: "meter_no", value: meterNo });
				meterDS.bind("requestEnd", function(e){
					dfd.resolve(e.response.results);
				});

				return dfd;
			},
			loadMeterRecord		: function(meterID){
				var dfd = $.Deferred();

				meterRecordDS.query({
					filter: { field: "meter_id", value: meterID },
				  	sort: { field: "month_of", dir: "desc" },
				  	page: 1,
				  	pageSize: 1				  	
				});
				meterRecordDS.bind("change", function(e){					
					dfd.resolve(this.data());
				});			

				return dfd;
			},			      	
	      	onChange 			: function(){	      		      		
	  			var totalActive = 0;
	  			var totalReactive = 0; 

	  			var data = meterRecordDS.at(0);
	  			var meter = meterDS.at(0);	  				  			
								
				if(data.new_reading!==""){				
					if(data.new_round){
						data.set("add_up", meter.max_digit);												
					}else{
						data.set("add_up", 0);
					}

					totalActive = ((kendo.parseInt(data.new_reading) + kendo.parseInt(data.add_up)) - kendo.parseInt(data.prev_reading))*meter.multiplier;										
				}

				if(data.reactive_new_reading!==""){						
					if(data.reactive_new_round){
						data.set("reactive_add_up", meter.max_digit);						
					}else{
						data.set("reactive_add_up", 0);
					}										
					totalReactive = ((kendo.parseInt(data.reactive_new_reading) + kendo.parseInt(data.reactive_add_up)) - kendo.parseInt(data.reactive_prev_reading))*meter.multiplier;					
				}						

				this.set("total_active", totalActive);
				this.set("total_reactive", totalReactive);									
	      	},	      	
	      	save 		: function(){
	      		var r = this.get("reading");
	      		var monthOf = new Date(r.month_of);
				monthOf.setDate(1);				
				r.set("month_of", kendo.toString(monthOf, "yyyy-MM-dd"));
				r.set("date_read_from", kendo.toString(new Date(r.date_read_from), "yyyy-MM-dd"));
				r.set("date_read_to", kendo.toString(new Date(r.date_read_to), "yyyy-MM-dd"));

	      		meterRecordDS.sync();
	      	}	      	
		});

		return {			
			viewModel 	: viewModel			
		};
	}());

	banhji.reading = (function(){
		var meterRecordDS = new kendo.data.DataSource({
			transport: {				
				create: {
					url: banhji.baseUrl + "api/meter_records/meter_record_batch",
					type: "POST",
					dataType: "json"
				},				
			  	parameterMap: function(options, operation) {
					if (operation !== "read" && options.models) {
						return {models: kendo.stringify(options.models)};
				  	}		  
				  	return options;  
			   	}
			},
			batch: true,					  	
		  	schema: {
				model: {
					id: "id"
				},
				data: "results",
				total: "total"	
			}		  			
		});
		
		var readingDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/meter_records/reading",
					type: "GET",
					dataType: "json"
				},							
			  	parameterMap: function(options, operation) {
					if (operation !== "read" && options.models) {
						return {models: kendo.stringify(options.models)};
				  	}		  
				  	return options;  
			   	}
			},
			pageSize: 100,							  	
		  	schema: {
				model: {
					id: "id"
				},
				data: "results",
				total: "total"	
			}		  			
		});

		var readerDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/employees/index",
					type: "GET",
					dataType: "json"
				}
			},
			schema: {
				data: "employees",
				total: "total"
			},
			serverFiltering: true		
		});
				
		var viewModel = kendo.observable({
			isLoaded 		: false,							
			isValidInput 	: true,
			reactive 		: null,
			uploadStatus 	: "",
			type 			: 2, //2=Electricity; 3=Water

			company_id 		: null,
			transformer_id 	: null,
			monthOfSearch 	: null,
			meterNoSearch	: "",

			reader 			: "",
			month_of 		: new Date(),
			date_read_from	: new Date(),
			date_read_to	: new Date(),
			
			reactive_qty 	: 0,
			total_active	: 0,
			total_reactive	: 0,
			
			companyList 	: banhji.ds.companyDS,
			transformerList : banhji.ds.transformerDS,
			readingList 	: readingDS,
			readerList 		: readerDS,
			
			pageLoad 		: function(type, meter_id){				
				this.set("type", type);				

				if(meter_id){
					this.loadReading(meter_id);
				}				
			},
			strMonthOf 		: function(){
				return "អំនានប្រចាំខែ " + kendo.toString(this.get("monthOfSearch"), "MM-yyyy");
			},

			loadReading 	: function(meter_id){
				readingDS.transport.options.read.data={ 
					meter_id: meter_id
				};
				readingDS.read();
			},

			search 			: function(){
				var companyID = this.get("company_id");
				var transformerID = this.get("transformer_id");
				var monthOfSearch = this.get("monthOfSearch");
				var meterNoSearch = this.get("meterNoSearch");

				var para = Array();
				if(companyID){
					para.push(companyID);
				}
				if(transformerID){
					para.push(transformerID);
				}
				if(monthOfSearch){
					para.push(monthOfSearch);
				}

				if(meterNoSearch){
					readingDS.transport.options.read.data={ 
						meter_no: meterNoSearch
					};
					readingDS.read();
				}else{					
					if(para.length>2){
						var monthOf = new Date(monthOfSearch);
						monthOf.setDate(1);
						monthOf = kendo.toString(monthOf, "yyyy-MM-dd");

						readingDS.transport.options.read.data={ 
							transformer_id: transformerID, 
							month_of: monthOf 
						};
						
						readingDS.read();
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
								
				var reader = new FileReader();					
				if(this.get("isSupported")) {
					var file = document.getElementById('myFile').files[0];
					// var file = $('#myFile').get(0).files[0];

					if(file !== undefined) {
						this.set("uploadStatus", "");
						reader.readAsText(file);
						
						reader.onload = function() {						
	 						var result = reader.result.split('\r');	 						
	 						var readingList = [];	 						
	 						
							// for (var i = 1; i < result.length; i ++) {								
							// 	var data = result[i].split(',');
							// 	readingList.push(data);															
							// }

							readingDS.transport.options.read.data = result;

							readingDS.read();																		
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
			openWindow 		: function(e){
				var data = e.data;				
            	this.set("reactive", data);

				var window = $("#reactive-window").data("kendoWindow");		         
		        window.center().open();
			},			
	      	onChange 		: function(e) {
	      		var self = this;
	      		var selected = e.data;
                var totalActive = 0;
                var totalReactive = 0;
                var isNextID = false;
                this.set("isValidInput", true);

                $.each(readingDS.data(), function(index, value){
                	if(isNextID){
						$(".txt"+value.meter_id).focus();
						isNextID=false;					
					}
					if(value.meter_id==selected.meter_id){
						isNextID = true;
					}
                	
                	totalActive += value.active_qty;
                	totalReactive += value.reactive_qty;

                	//Highlight invalid input each rows
					if(value.active_qty<0 || value.reactive_qty<0){
						self.set("isValidInput", false);

						$("#row"+value.meter_id).addClass("alert alert-error");
					}else{
						$("#row"+value.meter_id).removeClass("alert alert-error");
					}					
                });
                
                this.set("total_active", totalActive);
                this.set("total_reactive", totalReactive);                
            },
            companyChanges 	: function(e){
            	var d = e.sender._selectedValue;
            	if(d){
            		banhji.ds.transformerDS.filter([
            			{ field: "company_id", value: d },
            			{ field: "type", value: this.get("type") }
            		]);
            	}
            },
            reactiveChange  : function(){
            	var reactive = this.get("reactive");            	
                var totalReactive = 0;

                reactive.reactive_add_up = 0;
            	if(reactive.reactive_new_round){
            		reactive.reactive_add_up = kendo.parseInt(reactive.max_digit);
            	}
            	reactive.reactive_qty = ((reactive.reactive_new_reading + reactive.reactive_add_up) - reactive.reactive_prev_reading)*reactive.multiplier;

            	$.each(readingDS.data(), function(index, value){                	
                	totalReactive += value.reactive_qty;                			
                });
                this.set("reactive_qty", reactive.reactive_qty);                
                this.set("total_reactive", totalReactive);            	        	          	
            },	      	
	      	add 			: function(){
	      		var self = this;	      		     			
      			var monthOf = new Date(this.get("month_of"));
				monthOf.setDate(1);
				monthOf = kendo.toString(monthOf, "yyyy-MM-dd");

				$.each(readingDS.data(), function(index, value){
					if(kendo.parseInt(value.new_reading)>0){
						meterRecordDS.add({				
							meter_id				: value.meter_id,
							customer_id 			: value.customer_id,
							transformer_id 			: value.transformer_id,
							multiplier 				: value.multiplier,
						   	prev_reading			: value.prev_reading,
						   	new_reading 			: value.new_reading,
						   	quantity 				: value.active_qty,
						   	add_up	 				: value.add_up,
						   	new_round				: value.new_round?"true":"false",
						   	reactive_prev_reading	: value.reactive_prev_reading,								   
						   	reactive_new_reading	: value.reactive_new_reading,
						   	reactive_quantity 		: value.reactive_qty,
						   	reactive_add_up 		: value.reactive_add_up,
						   	reactive_new_round		: value.reactive_new_round?"true":"false",		   
						   	is_backup_reading 		: value.parent_id>0 ? 1 : 0,
						   	month_of 				: monthOf,
						   	date_read_from			: kendo.toString(this.get("date_read_from"), "yyyy-MM-dd"),						   
						   	date_read_to			: kendo.toString(this.get("date_read_to"), "yyyy-MM-dd"),
						   	reader 					: this.get("reader_id"),
						   	invoice_id				: 0 //No invoice yet					   	
						});
					}
				});

				meterRecordDS.sync();				
				meterRecordDS.bind("requestEnd", function(e){
					var type = e.type;
					if(type==="create"){
						readingDS.data([]);
						meterRecordDS.data([]);
						self.set("total_reactive", 0);
						self.set("total_active", 0);
					}
				});      			
	      	}	      		      		
		});

		return viewModel;	
	}());

	banhji.uInvoice = (function(){
		var meterRecordDS = new kendo.data.DataSource({
		  	transport: {	
		  	  	read:  {
					url: banhji.baseUrl + "api/meter_records/meter_record_for_invoice",		  
				  	type: "GET",
				  	dataType: "json"
				}
		  	},		  	
			serverFiltering: true,
			schema: {
				model: {
					id: "id"
				},
				data: "results",
				total: "total"	
			}
		});

		var invoiceDS = new kendo.data.DataSource({
		  	transport: {	  
			  	create: {
				  	url : banhji.baseUrl + "api/invoices/invoice_batch",
				  	type: "POST",
				  	dataType: "json"		  
			  	},	    
			  	parameterMap: function(options, operation) {
				  	if (operation !== "read" && options.models) {			  
					  	return {models: kendo.stringify(options.models)};
				  	}		  
				  	return options;  
			  	}
		  	},
		  	batch: true,  	  
		  	schema: {
				model: {
					id: "id"
				},
				data: "results",
				total: "total"	
			}
		});

		var invoiceItemDS = new kendo.data.DataSource({
		  	transport: {	  
			  	create: {
				 	url : banhji.baseUrl + "api/invoice_items/invoice_item",
				  	type: "POST",
				  	dataType: "json"
			  	},
			  	parameterMap: function(options, operation) {
				  	if (operation !== "read" && options.models) {
					  	return {models: kendo.stringify(options.models)};
				  	}		  
				  	return options;  
			  	}
		  	},
		  	batch: true,  	 
		  	schema: {
				model: {
					id: "id"
				},
				data: "results",
				total: "total"	
			}
		});		
				
		var viewModel = kendo.observable({			
			//Invoice
			checkAll 		: false,
			totalSelected 	: 0,										
			status			: 0,
			biller			: banhji.config.userData.userId,
			type 			: 2, //2=Electicity; 3=Water;					  	  
			
			issued_date		: new Date(),
			payment_date 	: new Date(),
			due_date 		: new Date(),	
			month_of 		: new Date(),
			monthOfSearch 	: new Date(),

			payment_term_id	: 1,	
			currency_id		: 1,
			memo			: "",
			class_id		: "",
			company_id 		: 0,
			current_company_id: 0,
			transformer_id 	: "",

			total_reading	: 0,
			total_active 	: 0,
			total_reactive	: 0,
			total_amount	: 0,

			account_receiveable	: 0,
			resident_revenue 	: 0,
			comercial_revenue 	: 0,
			institute_revenue 	: 0,
			
			companyList 	: banhji.ds.companyDS,
			transformerList : banhji.ds.transformerDS,					 
			meterRecordList : meterRecordDS,

			classList 		: [],			
			meterRecordIDList 	: [],
			customerBalanceList : [],

			receiveableList	: [],
			revenueList 	: [],
			customerIDList  : [],
			
			pageLoad 		: function(type){
				this.set("type", type);
				
				this.setDueDate();
				banhji.ds.tariffItemDS.read();																		
			},
			loadData 		: function(company_id){
				if(this.get("current_company_id")!==company_id){
					banhji.ds.tariffDS.filter({ field: "company_id", value: company_id });					
					banhji.ds.feeDS.filter({ field: "company_id", value: company_id });								
				}

				this.set("current_company_id", company_id);
			},
		    setDueDate 		: function(){
				var duedate = new Date();
				duedate.setDate(duedate.getDate()+7);
				this.set("due_date", duedate);
			},			
			linkPrint 		: function(){
				window.location.href = banhji.baseUrl + "app#uInvoice_preview/" + this.get("type");
			},
			search 			: function(){
				var self = this;
				
				var monthOf = new Date(this.get("monthOfSearch"));		
				monthOf.setDate(1);
				monthOf = kendo.toString(monthOf, "yyyy-MM-dd");

				var transformerID = this.get("transformer_id");
				if(transformerID!="" && monthOf!=""){
					var company_id = this.get("company_id");
					this.loadData(company_id);

					meterRecordDS.filter({
						filters: [							
							{ field: "transformer_id", value: transformerID },							
							{ field: "month_of", value: monthOf }					
						]
					});
					meterRecordDS.bind("requestEnd", function(e){
						var response = e.response.results;
						var total_active = 0;
						var total_reactive = 0;
									
						for (var i=0;i<response.length;i++)	{			 
							total_active += kendo.parseInt(response[i].quantity);	
							total_reactive += kendo.parseInt(response[i].reactive_quantity);							
						}

						self.set("total_active", kendo.toString(total_active, 'n0'));
						self.set("total_reactive", kendo.toString(total_reactive, 'n0'));
						self.set("total_reading", response.length);
					});
				}

				this.set("checkAll", false);
				this.set("totalSelected", 0);									
			},	
			changeAll 		: function(){		
				var bolValue = this.get("checkAll");
				var data = meterRecordDS.data();

				if(bolValue){
					this.set("totalSelected", data.length);
				}else{
					this.set("totalSelected", 0);
				}
				
				if(data.length>0){						
			        for (var i = 0; i < data.length; i++) {
			            var d = data[i];
			            if(d.invoice_id==0){					
							d.set("isCheck", bolValue);
						}
			        }			        
		        }							
			},
			change 			: function(){		
				var data = meterRecordDS.data();
				var ts = 0;
				if(data.length>0){
			        for (var i = 0; i < data.length; i++) {
			            var d = data[i];
			            if(d.isCheck){					
							ts++;
						}
			        }			        
		        }
		        this.set("totalSelected", ts);
			},
			companyChanges 	: function(e){				
            	var d = e.sender._selectedValue;
            	if(d){
            		banhji.ds.transformerDS.filter([
            			{ field: "company_id", value: d },
            			{ field: "type", value: this.get("type") }
            		]);
            	}else{
            		banhji.ds.transformerDS.data([]);
            	}
            },			
			distrinctCustomer	: function(){
				//Get all avialiable id
				var ids = new Array();
				var receiveableIDs = new Array();
				var revenueIDs = new Array();

				for (var i=0;i<meterRecordDS.total();i++) {
					var d = meterRecordDS.at(i);
					ids.push(d.customer_id);
					receiveableIDs.push(d.account_receiveable_id);
					revenueIDs.push(d.revenue_account_id);
				}
				
				//Remove duplicate id
				var uniqueID = [];
				$.each(ids, function(j, el){
				    if($.inArray(el, uniqueID) === -1) uniqueID.push(el);
				});

				var ARuniqueID = [];
				$.each(receiveableIDs, function(k, elk){
				    if($.inArray(elk, ARuniqueID) === -1) ARuniqueID.push(elk);
				});

				var REVuniqueID = [];
				$.each(revenueIDs, function(l, ell){
				    if($.inArray(ell, REVuniqueID) === -1) REVuniqueID.push(ell);
				});

				//Add to list
				var arList = [];
				for (var j=0;j<ARuniqueID.length;j++) {
					var dj = ARuniqueID[j];
					arList.push({ id:dj, amt:0, rate:0 });
				}

				var revList = [];
				for (var k=0;k<REVuniqueID.length;k++) {
					var dk = REVuniqueID[k];
					revList.push({ id:dk, amt:0, rate:0 });
				}

				this.set("customerIDList", uniqueID);
				this.set("receiveableList", arList);
				this.set("revenueList", revList);
			},
			addInvoice 		: function(){
				var self = this;				
				var monthOf = new Date(this.get("month_of"));
				monthOf.setDate(1);
				monthOf = kendo.toString(monthOf, "yyyy-MM-dd");
				
				this.distrinctCustomer();
				var disCustomer = this.get("customerIDList");
				var counter = 0;				
				for (var x=0;x<disCustomer.length;x++) {
					var dx = disCustomer[x];
					var total_amount = 0;
					var hasItem = false;
					var dataIndex = 0;
					
					var data = meterRecordDS.data();
					$.each(data, function(index, value){
			           	//Apply exemption
		            	var isFree = false;            	
						var exemp_amt = 0;
						
						var exemption_id = 0;
						if(self.get("type")==3){
							exemption_id = value.wexemption_id;
						}else{
							exemption_id = value.exemption_id;
						}

						var exemp = banhji.ds.feeDS.get(exemption_id);

						//Exemption free 100%
						if((exemption_id>0) && (exemp.exemption_type=="%") && (exemp.amount==1)){
							isFree = true;	
						}

						if(isFree==false){ //Free
				        	if(value.customer_id==dx){
				        		if(value.isCheck){  //Check									            	
				        			hasItem = true;
				        			dataIndex = index;

									//Apply maintenance
									var maintenance_id = 0;
									if(self.get("type")==3){
										maintenance_id = value.wmaintenance_id;
									}else{
										maintenance_id = value.maintenance_id;
									}
									var maintenances = banhji.ds.feeDS.get(maintenance_id);

									//Apply tariff
									var price = 0;
									var tariff_amt = 0;
									var active_usage = kendo.parseInt(value.quantity);

									var tariff_id = 0;
									if(self.get("type")==3){
										tariff_id = value.wtariff_id;
									}else{
										tariff_id = value.tariff_id;
									}

									var tariffs = banhji.ds.tariffDS.get(tariff_id);

									//Apply tariff to active usage							
									//Exemption for kWh
									if((exemption_id>0) && (exemp.exemption_type=="kWh")){
										if(active_usage>exemp.amount){
											active_usage -= exemp.amount;
										}			
									}				
									
									//Apply tariff item				
									var dataj = banhji.ds.tariffItemDS.data();																								
									$.each(dataj, function(indexj, valuej){
										var usagej = kendo.parseInt(valuej.usage);

										if(valuej.tariff_id===tariff_id && active_usage>=usagej){
											if(kendo.parseInt(valuej.is_flat)===0){																										
												price = kendo.parseFloat(valuej.price);
												tariff_amt = active_usage * price;																																																																										
											}else{																					
												price = valuej.price;
												tariff_amt = valuej.price;																						
											}
											return false;						
										}									
									});									
																																																	
									//Add active item
									invoiceItemDS.add({
										invoice_id	: counter,
										item_id		: 0,	
										description	: tariffs.name,
										multiplier	: value.multiplier,
										quantity	: active_usage,	  
										unit_price	: price,
										vat			: 0,		  	  
										amount		: tariff_amt,
										meter_record_id : value.id,
										meter_id 	: value.meter_id,
										prev_reading: value.prev_reading,
										new_reading : value.new_reading	
									});		
									total_amount += kendo.parseFloat(tariff_amt);
									
									//Add exemption for kWh
									if((exemption_id>0) && (exemp.exemption_type=="kWh") && (exemp.amount >0)){
										if(active_usage>exemp.amount){		
											//Add exemption for kWh
											invoiceItemDS.add({
												invoice_id	: counter,
												item_id		: 0,									
												description	: exemp.name,
												multiplier	: 0,
												quantity	: 1,	  
												unit_price	: 0,
												vat			: 0,		  	  
												amount		: 0,
												meter_id 	: 0,
												prev_reading: 0,
												new_reading : 0,
												exemption_id: exemption_id
											});							
										}	
									}				

									//Apply tariff item for reactive usage			
									var reactive_tariff_amt = 0;
									var reactive_price = 0;
									var reactive_usage = kendo.parseInt(value.reactive_quantity);
														
									var datak = banhji.ds.tariffItemDS.data();
									$.each(datak, function(indexk, valuek){
										var usagek = kendo.parseInt(valuek.usage);

										if(valuek.tariff_id==value.tariff_id && reactive_usage>=usagek){
											if(valuek.is_flat==0){
												reactive_price = kendo.parseFloat(valuek.price);
												reactive_tariff_amt = reactive_usage * reactive_price;																				
											}else{
												reactive_price = valuek.price;
												reactive_tariff_amt = valuek.price;				
											}
											return false;																			
										}
									});				
									
									//Add reactive item
									if(reactive_tariff_amt>0){
										invoiceItemDS.add({
											invoice_id	: counter,
											item_id		: 0,	
											description	: 'អំនាន Reactive',
											multiplier	: value.multiplier,
											quantity	: reactive_usage,	  
											unit_price	: reactive_price,
											vat			: 0,		  	  
											amount		: reactive_tariff_amt,
											meter_record_id : value.id,
											meter_id 	: 0,
											prev_reading: value.reactive_prev_reading,
											new_reading : value.reactive_new_reading	
										});		
										total_amount += kendo.parseFloat(reactive_tariff_amt);
									}

									//Exemption for %
									if((exemption_id>0) && (exemp.exemption_type=="%") && (exemp.amount >0)){
										exemp_amt = total_amount * kendo.parseFloat(exemp.amount);					
												
										//Add exemption for %					
										invoiceItemDS.add({
											invoice_id	: counter,
											item_id		: 0,	
											description	: exemp.name,
											multiplier	: 0,
											quantity	: 1,	  
											unit_price	: 0,
											vat			: 0,		  	  
											amount		: (exemp_amt*-1),
											meter_id 	: 0,
											prev_reading: 0,
											new_reading : 0,
											exemption_id: exemption_id
										});
										total_amount -= kendo.parseFloat(exemp_amt);								
									}
									
									//Exemption for Money
									if((exemption_id>0) && (exemp.exemption_type=="៛") && (exemp.amount >0)){
										if(total_amount>exemp.amount){
											exemp_amt = exemp.amount;	
										}else{
											exemp_amt = total_amount;	
										}
										
										//Add exemption for Money
										invoiceItemDS.add({
											invoice_id	: counter,
											item_id		: 0,	
											description	: exemp.name,
											multiplier	: 0,
											quantity	: 1,	  
											unit_price	: 0,
											vat			: 0,		  	  
											amount		: (exemp_amt*-1),
											meter_id 	: 0,
											prev_reading: 0,
											new_reading : 0,
											exemption_id: exemption_id
										});
										total_amount -= kendo.parseFloat(exemp_amt);				
									}
																
									//Add maintenance
									if((maintenance_id>0) && (maintenances.amount>0)){	
										invoiceItemDS.add({
											invoice_id	: counter,
											item_id		: 0,	
											description	: maintenances.name,
											multiplier	: 0,
											quantity	: 1,	  
											unit_price	: parseFloat(maintenances.amount),
											vat			: 0,		  	  
											amount		: parseFloat(maintenances.amount),
											meter_id 	: 0,
											prev_reading: 0,
											new_reading : 0,
											maintenance_id: maintenance_id
										});
										total_amount += parseFloat(maintenances.amount);
									}

									//Add meter record id and invoice id to []
									self.meterRecordIDList.push({
										id			: kendo.parseInt(value.id),
										invoice_id 	: counter
									});							
								}//if(d.isCheck){
				        	}//if(d.customer_id==dx){
			        	}//if(isFree==false){

					});	//loop meterRecordDS
					
					if(hasItem){
						var mr = meterRecordDS.at(dataIndex);
						
						//Exchange rate						
						var company = banhji.ds.companyDS.get(mr.company_id);
						var rate = banhji.ds.viewModel.getRate(company.based_currency, mr.currency_code);
				        
						//Add invoice into []													
						invoiceDS.add({
							number			: "",
							type 			: "eInvoice",
							amount 			: total_amount,
							rate 			: rate,	  
							status			: 0,
							sub_code 		: mr.sub_code,
							biller			: this.get("biller"),	  
							customer_id		: dx,
							address			: mr.address,
							issued_date		: kendo.toString(new Date(this.get("issued_date")), "yyyy-MM-dd"),
							payment_date	: kendo.toString(new Date(this.get("payment_date")), "yyyy-MM-dd"),				
							due_date		: kendo.toString(new Date(this.get("due_date")), "yyyy-MM-dd"),
							month_of 		: monthOf,
							date_read_from	: kendo.toString(new Date(mr.date_read_from), "yyyy-MM-dd"),
							date_read_to	: kendo.toString(new Date(mr.date_read_to), "yyyy-MM-dd"),
							payment_term_id	: this.get("payment_term_id"),	  	  								
							class_id 		: this.get("class_id"),
							transformer_id  : mr.transformer_id,
							box_no 			: mr.box_no,
							memo			: this.get("memo"),
							company_id 		: mr.company_id				
						});

						//Add new customer balances to []
						var balance = kendo.parseFloat(mr.balance) + (kendo.parseFloat(total_amount)/rate);
						this.customerBalanceList.push({
							id			: kendo.parseInt(mr.customer_id),
							balance 	: balance
						});													
						
						//Accounting				
						//AR
						var arList = this.get("receiveableList");
						for (var l=0;l<arList.length;l++) {
							var dl = arList[l];

							if(mr.account_receiveable_id==dl.id){
								dl.amt += total_amount;
								dl.rate += rate;
							}
						}

						//Revenue
						var revList = this.get("revenueList");
						for (var m=0;m<revList.length;m++) {
							var dm = revList[m];

							if(mr.revenue_account_id==dm.id){
								dm.amt += total_amount;
								dm.rate += rate;
							}
						}

						counter++;	
					}//if(hasItem){
				}//for loop disCustomer	  	
								
				invoiceDS.sync();
				invoiceDS.bind("requestEnd", function(e){
					var response = e.response.results;

					for (var x=0;x<response.length;x++) {
						//Replace invoice_id from server to invoice item
						$.each(invoiceItemDS.data(), function(index, value){							
							if(value.invoice_id===x){
								value.invoice_id = response[x].id;								
							}
						});						

						//Replace invoice_id from server to meter records
						$.each(self.meterRecordIDList, function(index, value){
							if(value.invoice_id===x){
								value.invoice_id = response[x].id;								
							}
						});						
					}

					invoiceItemDS.sync();					
					self.updateMeterRecordInvoiceId();
					//self.addJournal();				
					self.updateCustomerBalance();
					self.clear();				
				});											  	
			},	
			addJournal 		: function(){
				var self = this;		
				var d = new Date(this.get("month_of"));	
				var lastD = new Date(d.getFullYear(), d.getMonth() + 1, 0);
				var total = 0;
								
				//A/R
				var arList = this.get("receiveableList");
				$.each(arList, function(index, value){
					total += value.amt;

					banhji.journalEntry.add({
						journal_id	: 0,
				 		account 	: value.id, 
				 		dr 			: value.amt, 
				 		cr 			: 0,
				 		class_id 	: self.get("class_id"), 
				 		memo 		: self.get("memo"), 
				 		exchange_rate: value.rate,
					 	main 		: 1				 		
					});
				});			
			
				//Revenue
				var revList = this.get("revenueList");
				$.each(revList, function(index, value){
					banhji.journalEntry.add({
						journal_id	: 0,
				 		account 	: value.id, 
				 		dr 			: 0, 
				 		cr 			: value.amt,
				 		class_id 	: self.get("class_id"), 
				 		memo 		: self.get("memo"), 
				 		exchange_rate: value.rate,
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
				journal.set("transaction_type", "eInvoice");
				journal.set("payment_method", "");
				journal.set("check_no", null);
				journal.set("memo", "វិក្កយបត្រអគ្គីសនី");
				journal.set("date", kendo.toString(lastD, "yyyy-MM-dd"));
				journal.set("due_date", null);
				journal.set("amount_billed", total);
				journal.set("amount_due", 0);
				journal.set("amount_paid", 0);
				journal.set("voucher", null);
				journal.set("class_id", self.get("class_id"));
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
			},			
			updateMeterRecordInvoiceId : function(){
				var data = this.get("meterRecordIDList");
				if(data.length>0){
					$.ajax({
						type: "PUT",
						url: banhji.baseUrl + "api/meter_records/meter_record_batch",			
						data: {data: kendo.stringify(data)},
						dataType: "json",
						success: function (response) {
							//var data = response.d;
							//console.log(response);			  
						},
						error: function(error) {
							//console.log(error);
						}
					});
				}				
			},
			updateCustomerBalance : function(){
				var data = this.get("customerBalanceList");
				if(data.length>0){
					$.ajax({
						type: "PUT",
						url: banhji.baseUrl + "api/people_api/balance_batch",			
						data: { data: kendo.stringify(data)},
						dataType: "json",
						success: function (response) {
							//var data = response.d;
							//console.log(response);			  
						},
						error: function(error) {
							//console.log(error);
						}
					});
				}				
			},										
			clear 			: function() {							
				this.set("transformer_id", "");
				this.set("monthOfSearch", "");	

				this.set("totalSelected",0);
				this.set("total_reading",0);
				this.set("total_active",0);
				this.set("total_reactive",0);				
				
				this.set("meterRecordIDList", []);
				this.set("customerBalanceList", []);
						
				//Remove datasource				
		  		invoiceDS.data([]);				
		  		invoiceItemDS.data([]);					
				meterRecordDS.data([]);
			}
		});

		return viewModel;
	}());
	
	banhji.uInvoicePreview = (function(){
		var invoiceDS = new kendo.data.DataSource({
		  	transport: {	  
			  	read: {
				  	url : banhji.baseUrl + "api/invoices/print_batch",
				  	type: "GET",
				  	dataType: "json"		  
			  	}
		  	},	 	
		  	serverFiltering: true,
		  	requestEnd: function(e) {
		  		if(e.type === "read") {  			
		  			viewModel.set("invoiceList", e.response);
		  			viewModel.barcod();
		  		}
		  		
		  	}
		});
		
		var viewModel = kendo.observable({
			invoice_no 			: "",	
			company_id 			: 0,
			month_of 			: new Date(),	
			isVisible 			: true,
			type 				: 2,//2=Electricity; 3=Water;
			
			invoiceList 		: [],

			companyList 	: banhji.ds.companyDS,
			transformerList : banhji.ds.transformerDS,
			
			pageLoad 			: function(type, number){
				this.set("type", type);				
				
				if(number){
					invoiceDS.filter({ field:"number", value: number });
				}						
			},
			search 				: function(){
				var para = new Array();
				var transformer_id = this.get("transformer_id");
				var monthOf = new Date(this.get("month_of"));		
				monthOf.setDate(1);
				monthOf = kendo.toString(monthOf, "yyyy-MM-dd");

				var invoice_no = this.get("invoice_no");		
				if(invoice_no!=""){
					para.push({field: "number", value: invoice_no});
				}
				
				if(transformer_id!=null && monthOf!=""){
					para.push({ field: "transformer_id", value: transformer_id },
							{ field: "month_of", value: monthOf }
					);
				}
				if(para.length>0){
					invoiceDS.filter(para);
				}			
			},
			companyChanges 	: function(e){
            	var d = e.sender._selectedValue;
            	if(d){
            		banhji.ds.transformerDS.filter([
            			{ field: "company_id", value: d },
            			{ field: "type", value: this.get("type") }
            		]);
            	}
            },	
			barcod 				: function(){			
				var data = this.invoiceList;
				for (var i=0;i<data.length;i++) {
					var d = data[i];
					var id = d.customers.number;

					$("."+d.number).kendoBarcode({
					  	value: id,
					  	width: 200,
						height: 30,
						text:{
						    visible: false
						}				
					});
				}		
			},
			companyChanges 	: function(e){				
            	var d = e.sender._selectedValue;
            	if(d){
            		banhji.ds.transformerDS.filter([
            			{ field: "company_id", value: d },
            			{ field: "type", value: this.get("type") }
            		]);
            	}else{
            		banhji.ds.transformerDS.data([]);
            	}
            },
			print 				: function(e) {
				var printBtn = e.target;
				if(printBtn.checked) {
					$(".hiddenPrint").css("visibility", "hidden");
				} else {
					$(".hiddenPrint").css("visibility", "visible");
				}
			}
		});
		return viewModel;
	}());

	banhji.cashier = (function(){
		var peopleDS = new kendo.data.DataSource({
		  	transport: {			  	
			  	update: {
				  	url : banhji.baseUrl + "api/people_api/people",		  
				  	type: "PUT",
				  	dataType: "json"
			  	},			  	
		        parameterMap: function(options, operation) {
			  		if (operation !== "read" && options.models) {			  
						return {models: kendo.stringify(options.models)};
			  		}	   
			  		return options;  
			  	}
		  	},
		  	batch: true,		  	  	    
		  	schema: {
				model: {
					id: "id"
				},
				data: "results",
				total: "total"	
			}		  		
		});

		var invoiceDS = new kendo.data.DataSource({
		  	transport: {			  	
			  	update: {
				  	url : banhji.baseUrl + "api/invoices/invoice",		  
				  	type: "PUT",
				  	dataType: "json"
			  	},
			  	create: {
				  	url : banhji.baseUrl + "api/invoices/invoice",		  
				  	type: "POST",
				  	dataType: "json"
			  	},
		        parameterMap: function(options, operation) {
			  		if (operation !== "read" && options.models) {			  
						return {models: kendo.stringify(options.models)};
			  		}	   
			  		return options;  
			  	}
		  	},
		  	batch: true,		  	  	    
		  	schema: {
				model: {
					id: "id"
				},
				data: "results",
				total: "total"	
			}		  		
		});
		
		var viewModel = kendo.observable({
			peopleDS : peopleDS,					
			isLoaded 			: false,
			isSingle 			: true,			
			current_company_id 	: 0,
			total_customer 		: 0,
			total_payment 		: kendo.toString(0,"c"),
			searchField 		: "",

			balance 			: 0,
			deposit_amount 		: 0,	

			//Payment
			class_id 			: "",
			discount 			: 0,
			fine 				: 0,
			payment_date		: new Date(),
			payment_method_id	: "",
			cash_account_id 	: "",
			check_no			: "",			
			payment_note		: "",
			cashier				: banhji.config.userData.userId,	
			
			//Others
			customer 			: null,
			invoices 			: null,		
			pay_amount  		: kendo.toString(0,"c"),
			remain				: kendo.toString(0,"c"),
				
			total 				: kendo.toString(0,"c"),
			
			classList 			: [],
			cashAccountList 	: [],  
			paymentMethodList 	: [],
			statementCollectionList: banhji.ds.invoiceDS,

			invoiceList 		: [],
			paymentList 		: [],
			customerBalanceList	: [],			
			
			pageLoad 			: function(invoice_id){				
				this.clear();						
				this.loadPaymentForCashier();				
				this.setClass();
				this.setCashAccount();					
				this.setPaymentMethod();				

				if(invoice_id!==undefined){
					this.set("isSingle", true);
					
					this.loadSingleInvoice(invoice_id);
				}else{
					this.set("isSingle", false);
				}
			},
			
			closeX 				: function(){				
				kendo.fx($("#slide-form")).slideIn("up").play();							
				window.history.go(-1);
			},			

			//Setup
			setClass 			: function(){
		    	var self = this;
		    	this.set("classList", []);
		    			    				    	
				$.each(banhji.ds.classDS.data(), function(index, value) {
					if(value.type==="Class"){							    					    				
		    			self.get("classList").push({
			    			id 		: value.id,
			    			name 	: value.name	    			
			    		});					    	
			    	}				    						    							    		
		    	});			    						
		    },
		    setCashAccount		: function(){
		    	var self = this;
		    	this.set("cashAccountList", []);
		    			    				    	
				$.each(banhji.ds.accountDS.data(), function(index, value) {					
					if(value.account_type_id==="6"){							    					    				
		    			self.get("cashAccountList").push({
			    			id 		: value.id,
			    			name 	: value.code +' '+ value.name	    			
			    		});					    	
			    	}				    						    							    		
		    	});			    						
		    },			
		    setPaymentMethod 	: function(){
		    	var self = this;
		    	this.set("paymentMethodList", []);
		    			    				    	
				$.each(banhji.ds.paymentMethodDS.data(), function(index, value) {											    					    				
	    			self.get("paymentMethodList").push({
		    			id 		: value.id,
		    			name 	: value.name	    			
		    		});			    					    						    							    		
		    	});			    						
		    },
		    
		    loadInvoice 		: function(filters) {
		    	var dfd = $.Deferred();

		    	banhji.ds.invoiceDS.filter(filters);
		    	banhji.ds.invoiceDS.bind('requestEnd', function(e){
		    		dfd.resolve(e.response.results);
		    	});

		    	return dfd.promise();
		    },
		    loadPaymentForCashier: function(){
				var self = this;				
				$.ajax({
					type: "GET",
					url: banhji.baseUrl + "api/invoices/payment_for_cashier",				
					data: {cashier: self.get("cashier")},
					dataType: "json",
					success: function (response) {
						self.set("total_customer", kendo.toString(kendo.parseInt(response.total_customer), '##,#'));
						self.set("total_payment", kendo.toString(kendo.parseFloat(response.total_payment), 'c0'));
					}
				});
			},
			loadSingleInvoice 	: function(id){
				var self = this;				
				var total = 0;
		    	var tpay = 0;		    	
		    	var invoice = banhji.ds.invoiceDS.get(id);
		    	invoiceDS.add(invoice);

		    	this.loadCustomer({ field: "id", value: invoice.customer_id })
		    	.then(function(data){
		    		var customer = data[0];

		    		peopleDS.add(customer);
		    		self.set("customer", customer);					
				
					self.set("deposit_amount", kendo.toString(kendo.parseFloat(customer.deposit_amount), "c", customer.sub_code));
					self.set("balance", kendo.toString(kendo.parseFloat(customer.balance), "c", customer.sub_code));
		    
		    		var t = kendo.parseFloat(invoice.amount)/kendo.parseFloat(invoice.rate);				    		
	    			total += kendo.parseFloat(invoice.amount);
	    			tpay += kendo.parseFloat(invoice.amount);

	    			var fullname = customer.number +' '+ customer.surname +' '+customer.name;
	    			if(customer.people_type_id==5 || customer.people_type_id==6 || customer.people_type_id==7){
	    				fullname = customer.number +' '+ customer.company;
	    			}
	    			
					self.get("invoiceList").push({				
						id 				: invoice.id,
						isPay 			: true,				
						issued_date 	: invoice.issued_date,
						fullname 		: fullname,							
						number			: invoice.number,				
						total 			: t,
						pay_amount 		: t,
						rate 			: invoice.rate,
						sub_code 		: invoice.sub_code,
						customer_id 	: invoice.customer_id,
						account_receiveable_id: customer.account_receiveable_id,
						class_id 		: customer.class_id,
						balance 		: customer.balance 
					});
									
					//Highlight first row				
					$("#rowGrid-"+invoice.id).addClass("alert alert-success");												    	

					var remain = total - tpay;
					    	
			    	self.set("pay_amount", kendo.toString(tpay, "c"));    	
			    	self.set("total", kendo.toString(total, "c"));
			    	self.set("remain", kendo.toString(remain,"c"));
		    	});			    		
			},

			search 		: function(){
				var self = this;
				var customer = this.get("customer");
				peopleDS.add(customer);

				this.set("deposit_amount", kendo.toString(kendo.parseFloat(customer.deposit_amount), "c", customer.sub_code));
				this.set("balance", kendo.toString(kendo.parseFloat(customer.balance), "c", customer.sub_code));
					
				this.loadInvoice({ field: "customer_id", value: customer.id })
				.then(function(invoices){
					var total = kendo.parseFloat(self.get("total"));
			    	var tpay = kendo.parseFloat(self.get("pay_amount"));
			    	var highlightIndex = 0;
			    			    		
			    	$.each(invoices, function(index, value){
			    		if(value.type=="Invoice" || value.type=="eInvoice" || value.type=="wInvoice" || value.type=="Notice"){
			    			if(value.status==0 || value.status==2){
					    		invoiceDS.add(value);
					    		var isExisting = false;

						    	$.each(self.get("invoiceList"), function(indexx, valuex){			    			
					    			if(value.id==valuex.id){
					    				isExisting = true;
					    				return false;
					    			}
					    		});

						    	if(isExisting==false){
						    		var amt = kendo.parseFloat(value.amount)/kendo.parseFloat(value.rate)
						    		var paid = kendo.parseFloat(value.paid)/kendo.parseFloat(value.rate);
						    		var t = amt - paid;				    		
					    			total += t;
					    			tpay += t;

					    			var fullname = customer.number +' '+ customer.surname +' '+customer.name;
					    			if(customer.people_type_id==5 || customer.people_type_id==6 || customer.people_type_id==7){
					    				fullname = customer.number +' '+ customer.company;
					    			}
					    			
									self.get("invoiceList").push({				
										id 				: value.id,
										isPay 			: true,				
										issued_date 	: value.issued_date,
										fullname 		: fullname,							
										number			: value.number,				
										total 			: t,
										pay_amount 		: t,
										rate 			: value.rate,
										sub_code 		: value.sub_code,
										customer_id 	: value.customer_id,
										account_receiveable_id: customer.account_receiveable_id,
										class_id 		: customer.class_id,
										transformer_id 	: customer.transformer_id
									});
									
									if(index===0){									
										highlightIndex = value.id;
									}
								}
							}
						}																					
					});
					
					//Highlight first row
					if(highlightIndex>0){
						$("#rowGrid-"+highlightIndex).addClass("alert alert-success");	
					}									    	

					var remain = total - tpay;
					    	
			    	self.set("pay_amount", kendo.toString(tpay, "c"));    	
			    	self.set("total", kendo.toString(total, "c"));
			    	self.set("remain", kendo.toString(remain,"c"));
			    	
			    	self.autoIncreaseNo();
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
			    	total += kendo.parseFloat(value.total)*kendo.parseFloat(value.rate);
			    	tpay += kendo.parseFloat(value.pay_amount)*kendo.parseFloat(value.rate);
			    });	    
				
				this.set("total", kendo.toString(total, "c"));    	   	    	
		    	this.set("pay_amount", kendo.toString(tpay, "c"));
		    	var remain = (total + kendo.parseFloat(this.get("fine"))) - (tpay + kendo.parseFloat(this.get("discount")));
		    	this.set("remain", kendo.toString(remain, "c"));

		    	this.autoIncreaseNo();    	
			},	
			remove 				: function(e){
				if (confirm("តើលោកអ្នកពិតជាចង់លុបមែនឬទេ?")) {        
			        var item = e.data;
			        var index = this.get("invoiceList").indexOf(item);        
			        this.get("invoiceList").splice(index, 1);
			        this.change();
		    	}
		    },
		    checkPay 			: function(e){
		    	e.preventDefault();
		    	var d = e.data;
		    	var target = e.currentTarget;

		    	if(target.checked){
		    		d.set("pay_amount", d.total);
		    	}else{
		    		d.set("pay_amount", 0);
		    	}
		    	this.change();
		    },
			add 		 		: function(){
				var self = this;

				if(kendo.parseFloat(this.get("pay_amount"))>0){
					$.each(this.get("invoiceList"), function(index, value){						
						if(value.pay_amount > 0){
							var customer = peopleDS.get(value.customer_id);						
							var invoice = invoiceDS.get(value.id);

							var paid = kendo.parseFloat(value.pay_amount)*kendo.parseFloat(value.rate);
							var fine = kendo.parseFloat(self.get("fine"))*kendo.parseFloat(value.rate);
							var discount = kendo.parseFloat(self.get("discount"))*kendo.parseFloat(value.rate);

							//Add new payment
							invoiceDS.add({
								number 				: value.number,
								type 				: "Payment",
								amount 				: invoice.amount,
								rate 				: value.rate,
								sub_code 			: value.sub_code,
								issued_date		 	: kendo.toString(self.get("payment_date"), "yyyy-MM-dd"),		
								customer_id 		: value.customer_id,
								cashier				: self.get("cashier"),
								payment_method_id	: self.get("payment_method_id"),
								cash_account_id 	: self.get("cash_account_id"),
								check_no 			: self.get("check_no"),
								paid 				: paid,								
								fine 				: fine,
								discount 			: discount,														
								class_id 			: value.class_id,
								transformer_id 		: value.transformer_id,
								company_id 			: value.company_id													
							});
							
							//Update invoices
							var status = 0; //Unpaid
							if(kendo.parseFloat(value.pay_amount) >= kendo.parseFloat(value.total)){
								status = 1; //Paid
							}else{
								status = 2; //Partially Paid
							}

							var tPaid = (kendo.parseFloat(invoice.paid)/kendo.parseFloat(invoice.rate)) + paid;
							var tFine = (kendo.parseFloat(invoice.fine)/kendo.parseFloat(invoice.rate)) + fine;
							var tDiscount = (kendo.parseFloat(invoice.discount)/kendo.parseFloat(invoice.rate)) + discount;
							
							invoice.set("status", status);
							invoice.set("cashier", self.get("cashier"));
							invoice.set("payment_method_id", self.get("payment_method_id"));
							invoice.set("cash_account_id", self.get("cash_account_id"));
							invoice.set("check_no", self.get("check_no"));
							invoice.set("paid", tPaid);
							invoice.set("fine", tFine);
							invoice.set("discount", tDiscount);
							invoice.set("issued_date", kendo.toString(self.get("payment_date"), "yyyy-MM-dd"));

							//Update Customer							
							var balance = kendo.parseFloat(customer.balance) - kendo.parseFloat(value.pay_amount);
							customer.set("balance", balance);
						}		
					});					
					
					//this.addJournal();

					peopleDS.sync();		 				 			
		 			invoiceDS.sync();
		 			invoiceDS.bind("requestEnd", function(e){		 				
		 				self.clear();
			 			self.loadPaymentForCashier();
		 			});		 												
				}else{
					alert("ពុំមានការបង់ប្រាក់ទេ");
				}		
			},
			addJournal 			: function(){
				var self = this;			
				var arList = {};
				var invList = this.get("invoiceList");
				var payAmount = kendo.parseFloat(this.get("pay_amount"));

				$.each(invList, function(index, data){
					var amt = kendo.parseFloat(data.pay_amount)*kendo.parseFloat(data.rate);
					var arID = kendo.parseInt(data.account_receiveable_id);																
					if(arID>0){
						if(arList[arID]===undefined){
							arList[arID]={"id": arID, "amt": amt, "rate": data.rate, "class_id": data.class_id};						
						}else{											
							if(arList[arID].id===arID){
								arList[arID].amt += amt;
							}else{
								arList[arID]={"id": arID, "amt": amt, "rate": data.rate, "class_id": data.class_id};
							}
						}
					}
				});

				if(!jQuery.isEmptyObject(arList)){
					//Cash on Dr
					banhji.journalEntry.add({
						journal_id	: 0,
				 		account 	: this.get("cash_account_id"),
				 		dr 			: payAmount, 
				 		cr 			: 0,
				 		class_id 	: this.get("class_id"),
				 		memo 		: "", 
				 		exchange_rate: 1,
					 	main 		: 1				 		
					});					

					// A/R on Cr
					$.each(arList, function(index, data){
						banhji.journalEntry.add({
							journal_id	: 0,
					 		account 	: data.id,
					 		dr 			: 0, 
					 		cr 			: data.amt,
					 		class_id 	: self.get("class_id"),
					 		memo 		: "", 
					 		exchange_rate: data.rate,
						 	main 		: 0				 		
						});						
					});
				}

				//Add journal to datasource
				banhji.transaction.addNew();
				var journal = banhji.transaction.get("current");
				
				journal.set("company_id", banhji.config.userData.company);
				journal.set("people_id", 0);
				journal.set("employee_id", banhji.config.userData.userId);
				journal.set("payment_id", 0);
				journal.set("payment_term_id", 0);
				journal.set("transaction_type", "Payment");
				journal.set("payment_method", "cash");
				journal.set("check_no", this.get("check_no"));
				journal.set("memo", "ទទួលប្រាក់");
				journal.set("date", kendo.toString(new Date(this.get("payment_date")), "yyyy-MM-dd"));
				//journal.set("due_date", kendo.toString(new Date(invoice.due_date), "yyyy-MM-dd"));
				journal.set("amount_billed", payAmount);
				journal.set("amount_due", payAmount);
				journal.set("amount_paid", payAmount);
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
		 			peopleDS.sync();		 			
		 			banhji.journalEntry.save();		 			
		 			invoiceDS.sync();		 			
			 	}).then(function(){			 					 				 		
			 		self.clear();
			 		self.loadPaymentForCashier();
			 	});			 			 		 	
			},
					
			clear 	: function() {
				this.set("check_no", "");				
				this.set("total", kendo.toString(0,"c0"));
				this.set("discount", 0);
				this.set("fine", 0);		
				this.set("pay_amount", kendo.toString(0,"c0"));
				this.set("remain", kendo.toString(0,"c0"));

				this.set("invoiceList", []);
				
				//Clear datasources				
				peopleDS.data([]);
				invoiceDS.data([]);							
			}
		});		

		return viewModel;	
	}());	

	banhji.paymentSummary = (function(){
		var cashierDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/employees/index",
					type: "GET",
					dataType: "json"
				}
			},
			schema: {
				data: "employees",
				total: "total"
			}	
		});
		
		var viewModel = kendo.observable({			
			date_sorter 	: "all",
			start_date		: null,
			end_date  		: null,
			group_by 		: "people.people_type_id",			
			
			cashier 		: null,
			cashier_name 	: "",
			
			cashierList 	: cashierDS,
									
			start_date_str	: function(){
				var strDate = "";
				var d = this.get("start_date");				
				if(d!==null){		
					strDate = "ថ្ងៃទី " + kendo.toString(new Date(d), "dd-MM-yyyy");
				}	
				return strDate;	
			},
			end_date_str  	: function(){
				var strDate = "";
				var sdate = this.get("start_date");
				var edate = this.get("end_date");		
				if(sdate!==null){		
					strDate = " ដល់ " + kendo.toString(new Date(edate), "dd-MM-yyyy");
				}else{
					if(edate!==null){		
						strDate = " គិតត្រឹម " + kendo.toString(new Date(edate), "dd-MM-yyyy");
					}					
				}

				return strDate;	
			},			
			dateSorterChange: function(){
				var value = this.get("date_sorter");
				this.setDateSorter(value);				
			},
			setDateSorter 	: function(value){
				switch(value){
				case "today":
					var today = new Date();
				  	this.set("start_date", today);
					this.set("end_date", today);

					this.set("date_sorter", "today");
				  	break;
				case "week":
				  	var thisWeek = new Date;
					var first = thisWeek.getDate() - thisWeek.getDay(); 
					var last = first + 6;

					var firstDayOfWeek = new Date(thisWeek.setDate(first));
					var lastDayOfWeek = new Date(thisWeek.setDate(last));

					this.set("start_date", firstDayOfWeek);
					this.set("end_date", lastDayOfWeek);

					this.set("date_sorter", "week");
				  	break;
				case "month":
					var thisMonth = new Date;				  	
					var firstDayOfMonth = new Date(thisMonth.getFullYear(), thisMonth.getMonth(), 1);
					var lastDayOfMonth = new Date(thisMonth.getFullYear(), thisMonth.getMonth() + 1, 0);

					this.set("start_date", firstDayOfMonth);
					this.set("end_date", lastDayOfMonth);

					this.set("date_sorter", "month");
				  	break;
				case "year":
					var thisYear = new Date();
				  	var firstDayOfYear = new Date(thisYear.getFullYear(), 0, 1);
					var lastDayOfYear = new Date(thisYear.getFullYear(), 11, 31);

					this.set("start_date", firstDayOfYear);
					this.set("end_date", lastDayOfYear);

					this.set("date_sorter", "year");
				  	break;
				default:
					this.set("start_date", "");
					this.set("end_date", "");					  
				}
			},
			cashierChanges 	: function(e){
				var id = e.sender._selectedValue;
				if(id!==""){
					var cashier = cashierDS.get(id);
					this.set("cashier_name", "ទទួលប្រាក់ដោយ៖ " + cashier.fullname);
				}else{
					this.set("cashier_name", "");
				}
			}
		});

		return viewModel;
	}());

	banhji.paymentDetail = (function(){
		var cashierDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/employees/index",
					type: "GET",
					dataType: "json"
				}
			},
			schema: {
				data: "employees",
				total: "total"
			}	
		});
		
		var viewModel = kendo.observable({			
			date_sorter 	: "all",
			start_date		: null,
			end_date  		: null,
			hasData 		: false,			
			
			cashier 		: null,
			cashier_name 	: "",
			
			cashierList 	: cashierDS,
									
			start_date_str	: function(){
				var strDate = "";
				var d = this.get("start_date");				
				if(d!==null){		
					strDate = "ថ្ងៃទី " + kendo.toString(new Date(d), "dd-MM-yyyy");
				}	
				return strDate;	
			},
			end_date_str  	: function(){
				var strDate = "";
				var sdate = this.get("start_date");
				var edate = this.get("end_date");		
				if(sdate!==null){		
					strDate = " ដល់ " + kendo.toString(new Date(edate), "dd-MM-yyyy");
				}else{
					if(edate!==null){		
						strDate = " គិតត្រឹម " + kendo.toString(new Date(edate), "dd-MM-yyyy");
					}					
				}

				return strDate;	
			},			
			dateSorterChange: function(){
				var value = this.get("date_sorter");
				this.setDateSorter(value);				
			},
			setDateSorter 	: function(value){
				switch(value){
				case "today":
					var today = new Date();
				  	this.set("start_date", today);
					this.set("end_date", today);

					this.set("date_sorter", "today");
				  	break;
				case "week":
				  	var thisWeek = new Date;
					var first = thisWeek.getDate() - thisWeek.getDay(); 
					var last = first + 6;

					var firstDayOfWeek = new Date(thisWeek.setDate(first));
					var lastDayOfWeek = new Date(thisWeek.setDate(last));

					this.set("start_date", firstDayOfWeek);
					this.set("end_date", lastDayOfWeek);

					this.set("date_sorter", "week");
				  	break;
				case "month":
					var thisMonth = new Date;				  	
					var firstDayOfMonth = new Date(thisMonth.getFullYear(), thisMonth.getMonth(), 1);
					var lastDayOfMonth = new Date(thisMonth.getFullYear(), thisMonth.getMonth() + 1, 0);

					this.set("start_date", firstDayOfMonth);
					this.set("end_date", lastDayOfMonth);

					this.set("date_sorter", "month");
				  	break;
				case "year":
					var thisYear = new Date();
				  	var firstDayOfYear = new Date(thisYear.getFullYear(), 0, 1);
					var lastDayOfYear = new Date(thisYear.getFullYear(), 11, 31);

					this.set("start_date", firstDayOfYear);
					this.set("end_date", lastDayOfYear);

					this.set("date_sorter", "year");
				  	break;
				default:
					this.set("start_date", "");
					this.set("end_date", "");					  
				}
			},
			cashierChanges 	: function(e){
				var id = e.sender._selectedValue;
				if(id!==""){
					var cashier = cashierDS.get(id);
					this.set("cashier_name", "ទទួលប្រាក់ដោយ៖ " + cashier.fullname);
				}else{
					this.set("cashier_name", "");
				}
			}
		});

		return viewModel;
	}());

	banhji.reconcile = (function(){
		
		var viewModel = kendo.observable({			
			current_company_id 	: 0,
			searchDate 			: new Date("2014-11-03"),
			memo 				: "",
			class_id 			: "",
			transfer_account_id : "",
			isExisting 			: false,

			cashier 			: banhji.config.userData.userId,
			cashier_name 		: banhji.config.userData.username,
			
			totalReceive 		: kendo.toString(0, 'c'),
			prevRemain 			: kendo.toString(0, 'c'),
			
			totalCash 			: function(){
				var tc = kendo.parseFloat(this.get('totalReceive')) + kendo.parseFloat(this.get('prevRemain'));
				return kendo.toString(tc, 'c0');
			},
			reconcileBalance 	: function(){		
				var reBal = kendo.parseFloat(this.totalCash()) - kendo.parseFloat(this.totalDR());				
				if(reBal==0){			
					$("#reconcileBalance").removeClass("alert alert-error");
					$("#reconcileBalance").addClass("alert alert-success");
				}else{
					$("#reconcileBalance").removeClass("alert alert-success");
					$("#reconcileBalance").addClass("alert alert-error");			
				}
				return kendo.toString(reBal,'c0');
			},
			transferBalance 	: function(){
				var tranBal = kendo.parseFloat(this.totalDR()) - kendo.parseFloat(this.totalTransferCash());
				return kendo.toString(tranBal, 'c0');
			},

			rate 				: 4000,

			totalD				: "0.00",	
			totalR				: kendo.toString(0, 'c'),	
			totalDtoR 			: function(){
				var rate = kendo.parseFloat(this.get("rate"));
				var td = kendo.parseFloat(this.get("totalD"));
				var tdtor = td * rate;
				return kendo.toString(tdtor, 'c0');
			},
			totalDR 	 		: function(){		
				var tdr = kendo.parseFloat(this.totalDtoR()) + kendo.parseFloat(this.get("totalR"));
				return kendo.toString(tdr, 'c0');
			},

			totalDT 			: "0.00",
			totalRT 			: kendo.toString(0, 'c'),
			totalDTtoRT			: function(){
				var rate = kendo.parseFloat(this.get("rate"));
				var tdt = kendo.parseFloat(this.get("totalDT"));
				var tdttort = tdt * rate;
				return kendo.toString(tdttort, 'c0');
			},
			totalTransferCash 	: function(){		
				var tc = kendo.parseFloat(this.totalDTtoRT()) + kendo.parseFloat(this.get("totalRT"));
				return kendo.toString(tc, 'c0');
			},

			str_date  			: function(){
				return kendo.toString(this.get("searchDate"), "dd-MM-yyyy"); 
			},
			
			classList 			: [],
			cashAccountList 	: [],
			reconcileItemList 	: [],

			denominationList 	: banhji.ds.denominationDS,

			pageLoad 			: function(){				
				var company_id = banhji.config.userData.company;				
				
				this.loadData(company_id);				
			},
			loadData 			: function(company_id){
				if(this.get("current_company_id")!==company_id){
					this.set("current_company_id", company_id);
				
					this.setClass(company_id);
					this.setCashAccount(company_id);					
				}
			},
			setClass 			: function(company_id){
		    	var self = this;
		    	this.set("classList", []);
		    			    				    	
				$.each(banhji.ds.classDS.data(), function(index, value) {
					if(value.company_id==company_id && value.type==="Class"){							    					    				
		    			self.get("classList").push({
			    			id 		: value.id,
			    			name 	: value.name	    			
			    		});					    	
			    	}				    						    							    		
		    	});			    						
		    },
		    setCashAccount		: function(company_id){
		    	var self = this;
		    	this.set("cashAccountList", []);
		    			    				    	
				$.each(banhji.ds.accountDS.data(), function(index, value) {					
					if(value.company_id===company_id && value.account_type_id==="6"){							    					    				
		    			self.get("cashAccountList").push({
			    			id 		: value.id,
			    			name 	: value.code +' '+ value.name	    			
			    		});					    	
			    	}				    						    							    		
		    	});			    						
		    },
			search 				: function(){				
				var self = this, para = Array();
			
				var date = this.get("searchDate");				
				if(date!==null){
					//Reconcile
					banhji.ds.reconcileDS.query({
						filter: [
							{ field: "cashier" , value: this.get("cashier") },						
							{ field: "reconciled_date <=", value: kendo.toString(new Date(date), "yyyy-MM-dd") }
						],
						page: 1,
						pageSize: 2
					});
					banhji.ds.reconcileDS.bind("requestEnd", function(e){
						var response = e.response.results;						
						self.set("prevRemain", kendo.toString(0, "c", "km-KH"));

						$.each(response, function(index, value){
							if(index==0){
								var d = new Date(date).setHours(0,0,0,0);
								var rd = new Date(value.reconciled_date).setHours(0,0,0,0);
								if(d!==rd){
									self.set("isExisting", false);
									var pr = value.reconciled_amount - value.transfered_amount;
									self.set("prevRemain", kendo.toString(pr, "c", "km-KH"));
								}else{
									self.set("isExisting", true);																											
								}
							}
							
							if(index==1){
								var prevRemain = value.reconciled_amount - value.transfered_amount;
								self.set("prevRemain", kendo.toString(prevRemain, "c", "km-KH"));
							}
						});												
					});

					//Receive Payment
					banhji.ds.invoiceDS.filter([
						{ field: "cashier" , value: this.get("cashier") },
						{ field: "type" , operator: "wherein", value: ["Payment", "Receipt"] },						
						{ field: "issued_date", value: kendo.toString(new Date(date), "yyyy-MM-dd") }
					]);					
					banhji.ds.invoiceDS.bind("requestEnd", function(e){
						var response = e.response.results;
						var total = 0;
						$.each(response, function(index, value){
							total += kendo.parseFloat(value.paid);
						});

						var recievedAmount = kendo.toString(total, "c", "km-KH");
						self.set("totalReceive", recievedAmount);
					});
				}						
			},
			change				: function(){
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
			transferAll 		: function(){
				for(var i=0; i < this.denominationList.length; i++){
					var data = this.denominationList[i];			
					if(data.qty_usd>0){
						data.set('qty_usd_transfer', data.qty_usd);
					}

					if(data.qty_khr>0){
						data.set('qty_khr_transfer', data.qty_khr);
					}	    	   	
				}
				this.change();
			},
			save 				: function(){
				var self = this;

				this.addReconcile()
				.then(function(reconcile){					
					$.each(self.get("denominationList"), function(index, value){
						if(value.qty_usd>0 || value.qty_khr>0 || value.qty_usd_transfer>0 || value.qty_khr_transfer>0){
							banhji.ds.reconcileItemDS.add({
								denomination 		: value.denomination,					
								qty_usd 			: value.qty_usd,
								qty_khr 			: value.qty_khr,
								qty_usd_transfer 	: value.qty_usd_transfer,
								qty_khr_transfer 	: value.qty_khr_transfer,
								reconcile_id		: reconcile.id
							});
						}	
					});
					
					banhji.ds.reconcileItemDS.sync();
					self.addJournal();
					self.clear();
				});				
			},			
			addReconcile 		: function(){
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
			addJournal 			: function(){
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
			},
			clear 				: function(){    	
				this.set("reconcileItemList", []);

				totalD			: "0.00";	
				totalR			: kendo.toString(0, 'c0');	
				totalDtoR 		: kendo.toString(0, 'c0');
				totalDR 	 	: kendo.toString(0, 'c0');

				totalDT 		: "0.00";
				totalRT 		: kendo.toString(0, 'c0');
				totalDTtoRT		: kendo.toString(0, 'c0');
				totalTransferCash : kendo.toString(0, 'c0');				
		    }	
		});

		return viewModel;
	}());

	banhji.agingSummary = (function(){
		var agingDS = new kendo.data.DataSource({
		  	transport: {	  
			  	read: {
				  	url : banhji.baseUrl + "api/invoices/aging_batch",
				  	type: "GET",
				  	dataType: "json"		  
			  	}
		  	},
		  	schema: {		
				data: "people",
				total: "total"
			},
		  	serverPaging: true,  		
		  	pageSize: 50,
		  	serverFiltering: true  		
		});
				
		var viewModel = kendo.observable({
			company_id 		: 0,
			transformer_id 	: 0,
			issued_date 	: new Date(),
			isLoaded 		: false,
			
			companyList 	: banhji.ds.companyDS,
			transformerList : banhji.ds.transformerDS,
			agingList 		: agingDS,

			issued_date_text : function(){
				return kendo.toString(this.get("issued_date"), "dd-MM-yyyy");
			},
			autoIncreaseNo 		: function(){
				$(".sno").each(function(index,element){                 
				   $(element).text(index + 1); 
				});
			},
			search 	: function(){
				var para = [];

				var company_id = this.get("company_id");
				if(company_id>0){
					para.push({
						field: "company_id", value: company_id
					});
				}

				var transformer_id = this.get("transformer_id");
				if(transformer_id>0){
					para.push({
						field: "transformer_id", value: transformer_id
					});
				}		
				
				if(this.get("issued_date")==null){
					this.set("issued_date", new Date());
				}
				para.push({
					field: "issued_date", value: kendo.toString(this.get("issued_date"), "yyyy-MM-dd")
				});
				
				if(para.length>0){
					agingDS.filter(para);
				}					
			},
			companyChanges 	: function(e){
            	var d = e.sender._selectedValue;
            	if(d){
            		banhji.ds.transformerDS.filter([
            			{ field: "company_id", value: d },
            			{ field: "type", value: 2 }
            		]);
            	}
            }	
		});
		return viewModel;
	}());

	banhji.agingDetail = (function(){				
		var agingDS = new kendo.data.DataSource({
		  	transport: {	  
			  	read: {
				  	url : banhji.baseUrl + "api/invoices/aging_detail",
				  	type: "GET",
				  	dataType: "json"		  
			  	}
		  	},
		  	schema: {		
				data: "people",
				total: "total"
			},
		  	serverPaging: true,  		
		  	pageSize: 50,
		  	serverFiltering: true  		
		});
				
		var viewModel = kendo.observable({
			company_id 		: 0,
			transformer_id 	: 0,
			issued_date 	: new Date(),
			isLoaded 		: false,
			
			companyList 	: banhji.ds.companyDS,
			transformerList : banhji.ds.transformerDS,
			agingList 		: agingDS,

			issued_date_text : function(){
				return kendo.toString(this.get("issued_date"), "dd-MM-yyyy");
			},
			autoIncreaseNo 		: function(){
				$(".sno").each(function(index,element){                 
				   $(element).text(index + 1); 
				});
			},
			search 	: function(){
				var para = [];

				var company_id = this.get("company_id");
				if(company_id>0){
					para.push({
						field: "company_id", value: company_id
					});
				}

				var transformer_id = this.get("transformer_id");
				if(transformer_id>0){
					para.push({
						field: "transformer_id", value: transformer_id
					});
				}		
				
				if(this.get("issued_date")==null){
					this.set("issued_date", new Date());
				}
				para.push({
					field: "issued_date", value: kendo.toString(this.get("issued_date"), "yyyy-MM-dd")
				});
				
				if(para.length>0){
					agingDS.filter(para);
				}					
			},
			companyChanges 	: function(e){
            	var d = e.sender._selectedValue;
            	if(d){
            		banhji.ds.transformerDS.filter([
            			{ field: "company_id", value: d },
            			{ field: "type", value: 2 }
            		]);
            	}
            }	
		});
		return viewModel;
	}());		
	//END OF DAWINE ********************************************************************************************************
		
	/* Banhji Application Views */
	banhji.view = (function(){
		var missingModel = kendo.observable({
			back: function(e) {
				e.preventDefault();
				window.history.go(-1);
			}
		});
		//Layouts and views
		var layout = new kendo.Layout("#layout");
		var index = new kendo.Layout("#index");
		var missing = new kendo.View("#404", {model: missingModel});
		var welcome = new kendo.View("#welcome");
		
		//BY DAWINE ********************************************************************************************************
		var customerCenter = new kendo.Layout("#customerCenter", {model: banhji.customerCenter}); 
		var customer = new kendo.Layout("#customer", {model: banhji.customer});
		var customerDB = new kendo.View("#customerDashboard", {model: banhji.customerCenter});		
		
		var invoice = new kendo.View("#invoice", {model: banhji.invoice});
		var receipt = new kendo.View("#receipt", {model: banhji.invoice});		
		var estimate = new kendo.View("#estimate", {model: banhji.invoice});
		var so = new kendo.View("#so", {model: banhji.invoice});
		var gdn = new kendo.View("#gdn", {model: banhji.invoice});
		var statement = new kendo.View("#statement", {model: banhji.statement});
		
		var meter = new kendo.View("#meter", {model: banhji.meter});
		var eReadingEdit = new kendo.View("#eReadingEdit", {model: banhji.eReadingEdit.viewModel});
		var reading = new kendo.View("#reading", {model: banhji.reading});
		var uInvoice = new kendo.View("#uInvoice", {model: banhji.uInvoice});
		var notice = new kendo.View("#notice", {model: banhji.notice.viewModel});
		var uInvoicePreview = new kendo.View("#uInvoicePreview", {model: banhji.uInvoicePreview});

		var cashier = new kendo.View("#cashier", {model: banhji.cashier});		
		var paymentSummary = new kendo.View("#paymentSummary", {model: banhji.paymentSummary});
		var paymentDetail = new kendo.View("#paymentDetail", {model: banhji.paymentDetail});
		var reconcile = new kendo.View("#reconcile", {model: banhji.reconcile});

		var customerList = new kendo.View("#customerList");		
		var agingSummary = new kendo.View("#agingSummary", {model: banhji.agingSummary});		
		var agingDetail = new kendo.View("#agingDetail", {model: banhji.agingDetail});		
				
		var eSaleSummary = new kendo.View("#eSaleSummary");
		var wSaleSummary = new kendo.View("#wSaleSummary");
		var eSaleDetail = new kendo.View("#eSaleDetail");
		var wSaleDetail = new kendo.View("#wSaleDetail");
		var eLowConsumption = new kendo.View("#eLowConsumption");
		var wLowConsumption = new kendo.View("#wLowConsumption");
		var eDisconnectList = new kendo.View("#eDisconnectList");
		var wDisconnectList = new kendo.View("#wDisconnectList");		
		//END OF DAWINE ****************************************************************************************************
		
		return {
			layout: layout,
			index: index,			
			missing: missing,
			welcome: welcome,
			
			//BY DAWINE
			customerCenter  : customerCenter,
			customer 		: customer,			
			customerDashboard: customerDB,			
			
			invoice 		: invoice,
			receipt 		: receipt,
			so 				: so,
			estimate 		: estimate,
			gdn 			: gdn,
			statement 		: statement,

			eCustomer 		: eCustomer,
			meter 			: meter,
			eReadingEdit 	: eReadingEdit,
			reading 		: reading,
			uInvoice 		: uInvoice,
			notice 			: notice,
			uInvoicePreview : uInvoicePreview,

			cashier 		: cashier,
			paymentSummary 	: paymentSummary,			
			paymentDetail 	: paymentDetail,
			reconcile 		: reconcile,

			customerList 	: customerList,
			agingSummary 	: agingSummary,
			agingDetail 	: agingDetail,	
						
			eSaleSummary 	: eSaleSummary,
			wSaleSummary 	: wSaleSummary,
			eSaleDetail 	: eSaleDetail,
			wSaleDetail 	: wSaleDetail,
			eLowConsumption : eLowConsumption,
			wLowConsumption : wLowConsumption,
			eDisconnectList : eDisconnectList,
			wDisconnectList : wDisconnectList					
			//END OF DAWINE			
		};
	}());	

	/* Router section */
	banhji.router = new kendo.Router({
		init: function() {
			banhji.view.layout.render("#wrapperApplication");
		},
		routeMissing: function(e) {
			banhji.view.layout.showIn("#layout-view", banhji.view.missing);
		}
	});

	banhji.router.route("/", function(){
		banhji.view.layout.showIn("#layout-view", banhji.view.welcome);
		$("#home-menu").text("Banhji | Home");
		$("#secondary-menu").html("");
	});

	banhji.router.route("login", function(){
		banhji.view.layout.showIn('#content', banhji.view.loginV);
		console.log("login page");
	});
	banhji.router.route("logout", function(){
		auth.logout();
	});

	//BY DAWINE ************************************************************************************************************	
	banhji.pageLoaded = {};

	banhji.router.route("customers", function(){
		var vm = banhji.customerCenter;
		banhji.view.layout.showIn("#layout-view", banhji.view.customerCenter);
		banhji.view.customerCenter.showIn("#detail", banhji.view.customerDashboard);

		$("#home-menu").text("Banhji | អតិថិជន");
		$("#secondary-menu").html("<li><a href='\#customers' class='glyphicons home'><i></i></a></li><li><a href='\#customer/1'>អតិថិជនថ្មី</a></li>");			

		if(vm.get("isLoaded")===false){				
			vm.set("isLoaded", true);
			
			vm.pageLoad();
			banhji.customerCenter.set("showMenu", false);
			
			var grid = $("#sidebar").kendoGrid({
				dataSource: banhji.ds.peopleDS,										
				selectable: true,
				columns: [
					{ title: ""}
				],
				height: "400px",
				rowTemplate: kendo.template($("#customerListTmpl").html()),
				change: function(){
					var selected = this.select();					
					var data = this.dataItem(selected);

					vm.set("showMenu", true);
					vm.set("customer", data);

					var balance = kendo.toString(kendo.parseFloat(data.balance), "c", data.sub_code);
					vm.set("balance", balance);
										
					//banhji.router.navigate("#customers/"+ data.id, false);

					var currentPage = vm.get("currentPage");
					switch(currentPage){
					case "dashBoard":
						vm.pageLoad(data.id);
						break;
					case "customerDetail":
						banhji.customer.pageLoad(1, data.id);																
						break;					
					case "meter":
					    banhji.meter.pageLoad(data.id);
					    break;					
					case "statement":
					    banhji.statement.pageLoad(data.id);					    
					    break;
					default:
					 	//Default here;
					}											
				}
			}).data("kendoGrid");			     
			
			var company = $("#searchCompany").kendoDropDownList({                
                dataTextField: "abbr",
                dataValueField: "id",
                dataSource: banhji.ds.companyDS    
            }).data("kendoDropDownList");

            $("#search").on('click', function(e) {
            	e.preventDefault();
				customerSearch();				
			});

			$("#searchField").keyup(function(e) {
				var keycode = e.keyCode ? e.keyCode : e.which;
				//Press Enter
			   	if(keycode === 13) {    
			    	customerSearch();
			    }          
			});

			function customerSearch(){
	        	var txtSearch = $("#searchField").val();
	        	var company_id = company.value();

				
					banhji.ds.peopleDS.filter([
						{ field: "company_id", operator: "having", value: company_id },																		
						{ field: "number", operator: "like", value: txtSearch },
						{ field: "surname", operator: "like", value: txtSearch },
						{ field: "name", operator: "like", value: txtSearch },
						{ field: "company", operator: "like", value: txtSearch }
					]);
								
				
				//Clear search
				$("#searchField").val("");				
		    }
		}
	});
	
	banhji.router.route("customer/:type(/:id)", function(type, id){		
		if(banhji.ds.companyDS.data().length>0){
			var vm = banhji.customer;
			var company_id = banhji.config.userData.parent;			

			vm.pageLoad(type, id);			

			if(type==2){
				banhji.view.layout.showIn("#layout-view", banhji.view.eCustomer);			
			}else if(type==3){
				banhji.view.layout.showIn("#layout-view", banhji.view.wCustomer);			
			}else{
				banhji.view.layout.showIn("#layout-view", banhji.view.customer);				
			}						
		
			$("#title").text("ចុះឈ្មោះអតិថិជនថ្មី");
			kendo.fx($("#slide-form")).slideIn("down").play();

			$("#closeX").click(function(e){
				e.preventDefault();

				banhji.ds.peopleDS.cancelChanges();
				kendo.fx($("#slide-form")).slideIn("up").play();				
				window.history.go(-1);
			});

			if(banhji.pageLoaded["customer"]==undefined){
				banhji.pageLoaded["customer"] = true;								

				var province = $("#province").kendoDropDownList({
		            optionLabel: "(--- ជ្រើសរើស ---)",
		            dataTextField: "name",
		            dataValueField: "id",
		            dataSource: {
		                transport: {
							read: {
								url: banhji.baseUrl + "api/provinces/province",
								type: "GET",
								dataType: "json"
							},
							parameterMap : function(options, operation) {
								if( operation !== "read" && options.models ) {
									return { models: kendo.stringigy(options.models) };
								}
								return options;
							}
						},									
						schema: {
							model: {
								id: "id"
							},
							data: "results",
							total: "total"	
						}
					}                
		        }).data("kendoDropDownList");

		        var district = $("#district").kendoDropDownList({
		            autoBind: false,
		            cascadeFrom: "province",
		            optionLabel: "(--- ជ្រើសរើស ---)",
		            dataTextField: "name",
		            dataValueField: "id",
		            dataSource: {
		                transport: {
							read: {
								url: banhji.baseUrl + "api/districts/district_cascading",
								type: "GET",
								dataType: "json"
							}
						},
						serverFiltering: true
		            }
		        }).data("kendoDropDownList");

		        var commune = $("#commune").kendoDropDownList({
		            autoBind: false,
		            cascadeFrom: "district",
		            optionLabel: "(--- ជ្រើសរើស ---)",
		            dataTextField: "name",
		            dataValueField: "id",
		            dataSource: {
		                transport: {
							read: {
								url: banhji.baseUrl + "api/communes/commune_cascading",
								type: "GET",
								dataType: "json"
							}
						},
						serverFiltering: true
		            }
		        }).data("kendoDropDownList");

		        var village = $("#village").kendoDropDownList({
		            autoBind: false,
		            cascadeFrom: "commune",
		            optionLabel: "(--- ជ្រើសរើស ---)",
		            dataTextField: "name",
		            dataValueField: "id",
		            dataSource: {
		                transport: {
							read: {
								url: banhji.baseUrl + "api/villages/village_cascading",
								type: "GET",
								dataType: "json"
							}
						},
						serverFiltering: true
		            }
		        }).data("kendoDropDownList");
				
				var validator = $("#example").kendoValidator().data("kendoValidator"),
					status = $("#status");

				$("#save").click(function(e){				
					e.preventDefault();
					vm.checkExistingNumber();					

					if(validator.validate() && vm.get("isDuplicateNumber")===false){
		            	vm.sync();

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
		}else{
			banhji.router.navigate("#customers", false);
		}		
	});

	banhji.router.route("invoice(/:id)", function(id){
		if(banhji.ds.companyDS.data().length>0){
			var vm = banhji.invoice;

			banhji.view.layout.showIn("#layout-view", banhji.view.invoice);				
			kendo.fx($("#slide-form")).slideIn("down").play();

			if(id!==undefined){
				vm.loadEdit(id);
			}else{
				var customer_id = banhji.customerCenter.get("customer").id;					
				vm.pageLoad("Invoice", customer_id);			
			}

			if(vm.get("isLoaded")===false){
				vm.set("isLoaded", true);

				var validator = $("#example").kendoValidator().data("kendoValidator"),
					status = $("#status");

				$("#save").click(function(e){
					e.preventDefault();
								
		            if(validator.validate()){
		            	if(id!==undefined){            		
		            		vm.update();            		
		            	}else{
		            		vm.save();
		            	}            	
		            	           	
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
		}else{
			banhji.router.navigate("#customers", false);
		}			
	});

	banhji.router.route("receipt(/:id)", function(id){
		if(banhji.ds.companyDS.data().length>0){
			var vm = banhji.invoice;

			banhji.view.layout.showIn("#layout-view", banhji.view.receipt);				
			kendo.fx($("#slide-form")).slideIn("down").play();

			if(id!==undefined){
				vm.loadEdit(id);
			}else{
				var customer_id = banhji.customerCenter.get("customer").id;					
				vm.pageLoad("Receipt", customer_id);			
			}

			if(vm.get("receiptLoaded")===false){
				vm.set("receiptLoaded", true);

				var validator = $("#example").kendoValidator().data("kendoValidator"),
					status = $("#status");

				$("#save").click(function(e){
					e.preventDefault();
								
		            if(validator.validate()){
		            	if(id!==undefined){            		
		            		vm.update();            		
		            	}else{
		            		vm.save();
		            	}            	
		            	           	
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
		}else{
			banhji.router.navigate("#customers", false);
		}		
	});	

	banhji.router.route("so(/:id)", function(id){
		if(banhji.ds.companyDS.data().length>0){
			var vm = banhji.invoice;

			banhji.view.layout.showIn("#layout-view", banhji.view.so);				
			kendo.fx($("#slide-form")).slideIn("down").play();

			if(id!==undefined){
				vm.loadEdit(id);
			}else{
				var customer_id = banhji.customerCenter.get("customer").id;					
				vm.pageLoad("SO", customer_id);			
			}

			if(vm.get("soLoaded")===false){
				vm.set("soLoaded", true);

				var validator = $("#example").kendoValidator().data("kendoValidator"),
					status = $("#status");

				$("#save").click(function(e){
					e.preventDefault();
								
		            if(validator.validate()){
		            	if(id!==undefined){            		
		            		vm.update();            		
		            	}else{
		            		vm.save();
		            	}            	
		            	           	
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
		}else{
			banhji.router.navigate("#customers", false);
		}	
	});

	banhji.router.route("estimate(/:id)", function(id){
		if(banhji.ds.companyDS.data().length>0){
			var vm = banhji.invoice;

			banhji.view.layout.showIn("#layout-view", banhji.view.estimate);				
			kendo.fx($("#slide-form")).slideIn("down").play();

			if(id!==undefined){
				vm.loadEdit(id);
			}else{
				var customer_id = banhji.customerCenter.get("customer").id;					
				vm.pageLoad("Estimate", customer_id);			
			}

			if(vm.get("estimateLoaded")===false){
				vm.set("estimateLoaded", true);

				var validator = $("#example").kendoValidator().data("kendoValidator"),
					status = $("#status");

				$("#save").click(function(e){
					e.preventDefault();
								
		            if(validator.validate()){
		            	if(id!==undefined){            		
		            		vm.update();            		
		            	}else{
		            		vm.save();
		            	}            	
		            	           	
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
		}else{
			banhji.router.navigate("#customers", false);
		}	
	});

	banhji.router.route("gdn(/:id)", function(id){
		if(banhji.ds.companyDS.data().length>0){
			var vm = banhji.invoice;
		
			banhji.view.layout.showIn("#layout-view", banhji.view.gdn);				
			kendo.fx($("#slide-form")).slideIn("down").play();

			if(id!==undefined){
				vm.loadEdit(id);
			}else{
				var customer_id = banhji.customerCenter.get("customer").id;					
				vm.pageLoad("GDN", customer_id);			
			}

			if(vm.get("gdnLoaded")===false){
				vm.set("gdnLoaded", true);

				var validator = $("#example").kendoValidator().data("kendoValidator"),
					status = $("#status");

				$("#save").click(function(e){
					e.preventDefault();
								
		            if(validator.validate()){
		            	if(id!==undefined){            		
		            		vm.update();            		
		            	}else{
		            		vm.save();
		            	}            	
		            	           	
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
		}else{
			banhji.router.navigate("#customers", false);
		}	
	});

	banhji.router.route("statement/:id", function(id){		
		if(banhji.ds.companyDS.data().length>0){
			var vm = banhji.statement;
			
			banhji.view.layout.showIn("#layout-view", banhji.view.customerCenter);
			banhji.view.customerCenter.showIn("#detail", banhji.view.statement);

			if(id!==undefined){				
				vm.pageLoad(id);
			}else{
				banhji.router.navigate("#customers", false);			
			}			
		}else{
			banhji.router.navigate("#customers", false);
		}	
	});	

	banhji.router.route("meter(/:id)", function(id){
		if(banhji.ds.companyDS.data().length>0){			
			banhji.view.customerCenter.showIn("#detail", banhji.view.meter);
			var vm = banhji.meter;
			vm.pageLoad(id);

			if(vm.get("isLoaded")===false){
				vm.set("isLoaded", true);		

				var tran = $("#tran").kendoDropDownList({
		            optionLabel: "(--- រើស ត្រង់ស្វូ ---)",
		            valuePrimitive: true,
		            dataTextField: "transformer_number",
		            dataValueField: "id",
		            dataSource: banhji.ds.transformerDS    
		        }).data("kendoDropDownList");

		        var box = $("#electricityBox").kendoDropDownList({
		            autoBind: false,
		            cascadeFrom: "tran",
		            optionLabel: "(--- រើស ប្រអប់ ---)",
		            valuePrimitive: true,
		            dataTextField: "box_no",
		            dataValueField: "id",
		            dataSource: {
		                transport: {
							read: {
								url: banhji.baseUrl + "api/electricity_boxes/electricity_box_cascading",
								type: "GET",
								dataType: "json"
							}
						},	
						serverFiltering: true
		            }
		        }).data("kendoDropDownList");
	    	}
	    }else{
			banhji.router.navigate("#customers", false);
		}
	});

	banhji.router.route("reading/:type(/:meter_id)", function(type, meter_id){
		if(banhji.ds.companyDS.data().length>0){
			var vm = banhji.reading;	

			vm.pageLoad(type, meter_id);

			banhji.view.layout.showIn("#layout-view", banhji.view.reading);

			if(vm.get("isLoaded")===false){				
				vm.set("isLoaded", true);				
				
				var validator = $("#example").kendoValidator().data("kendoValidator"),
					status = $("#status");

				$("#save").click(function(e){
					e.preventDefault();
					var isValidInput = vm.get("isValidInput");
		            var totalActive = vm.get("total_active");					
					
		            if(validator.validate() && isValidInput && totalActive>0){
		            	vm.add();

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
		}else{
			banhji.router.navigate("#", false);
		}
	});	

	banhji.router.route("eReading_edit", function(){
		banhji.view.layout.showIn("#layout-view", banhji.view.eReadingEdit);		

		var validator = $("#example").kendoValidator().data("kendoValidator"),
			status = $("#status");

		$("#save").click(function(e){
			e.preventDefault();
			
			banhji.eReadingEdit.viewModel.save();
				
            if(validator.validate()){
            	banhji.eReadingEdit.viewModel.save();

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
	});

	banhji.router.route("uInvoice/:type", function(type){
		if(banhji.ds.companyDS.data().length>0){
			banhji.view.layout.showIn("#layout-view", banhji.view.uInvoice);
			var vm = banhji.uInvoice;
			vm.pageLoad(type);
					
			var validator = $("#example").kendoValidator().data("kendoValidator"),
				status = $("#status");						

			$("#save").click(function(e){
				e.preventDefault();			
				var total = parseInt(vm.get("totalSelected"));	
	            if(validator.validate() && total>0){	            	            	
	            	vm.addInvoice();
					
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
		}else{
			banhji.router.navigate("#", false);
		}
	});

	banhji.router.route("uInvoice_preview/:type(/:number)", function(type, number){
		banhji.view.layout.showIn("#layout-view", banhji.view.uInvoicePreview);				
		kendo.fx($("#slide-form")).slideIn("down").play();
		
		banhji.uInvoicePreview.pageLoad(type, number);							
	});	

	banhji.router.route("cashier(/:id)", function(id){
		if(banhji.ds.companyDS.data().length>0){
			banhji.view.layout.showIn("#layout-view", banhji.view.cashier);
			$("#home-menu").text("Banhji | បេឡាករ");
			
			var vm = banhji.cashier;		
			vm.pageLoad(id);

			if(banhji.pageLoaded["cashier"]==undefined){
				banhji.pageLoaded["cashier"] = true;

				$("#txtSearch").kendoComboBox({
                    placeholder: "លេខកូដអតិថិជន",
                    dataTextField: "number",
                    dataValueField: "id",
                    filter: "startswith",
                    autoBind: false,
                    minLength: 3,
                    dataSource: banhji.ds.peopleDS,
                    change: function(e){
						var selected = this.select();					
						var data = this.dataItem(selected);						
						
						vm.set("customer", data);
						vm.search();																		
					}                
                });				

				var validator = $("#example").kendoValidator().data("kendoValidator"),
					status = $("#status");						

				$("#save").click(function(e){
					e.preventDefault();			
					var payAmount = kendo.parseFloat(vm.get("pay_amount"));

		            if(validator.validate() && payAmount>0){
		            	vm.add();           	
		            	
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
			$('#txtSearch').focus();
		}else{
			banhji.router.navigate("#", false);
		}
	});	

	banhji.router.route("reconcile", function(){
		if(banhji.ds.companyDS.data().length>0){
			banhji.view.layout.showIn("#layout-view", banhji.view.reconcile);
			kendo.fx($("#slide-form")).slideIn("down").play();
			var vm = banhji.reconcile;
			vm.pageLoad();

			var validator = $("#example").kendoValidator().data("kendoValidator"),
				status = $("#status");

			$("#search").click(function(e){
				e.preventDefault();

				vm.search();
			});

			$("#save").click(function(e){
				e.preventDefault();			
				var totalTransferCash = kendo.parseFloat(vm.totalTransferCash());
				
	            if(validator.validate() && totalTransferCash>0){
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
		}else{
			banhji.router.navigate("#", false);
		}			
	});

	//Dawine Reports
	banhji.router.route("customer_list", function(){
		banhji.view.layout.showIn("#layout-view", banhji.view.customerList);
		kendo.fx($("#slide-form")).slideIn("down").play();

		var customerDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/people_api/people_list",
					type: "GET",
					dataType: "json"
				}
			},
			schema: {
		        data: "results", 
		        total: "total" 
		    },
			serverPaging: true,
			pageSize: 200,			
			serverFiltering: true
		});
		
		$("#grid").kendoGrid({
		    dataSource: customerDS,
		    groupable: true,
		    autoBind: false,
		    pageable: true,        
		    columns: [ 
		    		{ field: "number", title: "លេខកូដ" }, 
		    		{ field: "name", title: "ឈ្មោះ", template: "#=surname# #=name#" }, 
		    		{ field: "currencies.code", title: "រូបិយ​ប័ណ្ណ" },    		
		    		{ field: "people_types.name", title: "ប្រភេទ" },
		    		{ field: "classes.name", title: "Class" },
		    		{ field: "deposit_amount", title: "ប្រាក់កក់" },
		    		{ field: "balance", title: "សមតុល្យចុងគ្រា", template: "#=kendo.toString(kendo.parseFloat(balance), 'c', currencies.sub_code)#", 
		    			attributes: { style: "text-align: right;"} 
		    		}        
		    ]
		});

		var company = $("#company").kendoDropDownList({
            optionLabel: "(--- រើស អាជ្ញាបណ្ណ ---)",
            dataTextField: "abbr",
            dataValueField: "id",
            dataSource: banhji.ds.companyDS    
        }).data("kendoDropDownList");
        
		$("#search").click(function(e){
			e.preventDefault();            
            
            var company_id = company.value();
			if(company_id){
				customerDS.filter({
					filters: [
						{ field: "company_id", value: company_id },
						{ field: "parent_type_id", value: 1 }
					]
				});
			}	        
		});			
	});

	banhji.router.route("aging_summary", function(){		
		banhji.view.layout.showIn("#layout-view", banhji.view.agingSummary);
		kendo.fx($("#slide-form")).slideIn("down").play();
		var vm = banhji.agingSummary ;

		if(vm.get("isLoaded")===false){
			vm.set("isLoaded", true);

			var validator = $("#example").kendoValidator().data("kendoValidator");

			$("#search").click(function(e){
				e.preventDefault();			
							
	            if(validator.validate()){
	            	vm.search();	            
		        }
			});
		}			
	});

	banhji.router.route("aging_detail", function(){
		banhji.view.layout.showIn("#layout-view", banhji.view.agingDetail);
		kendo.fx($("#slide-form")).slideIn("down").play();
		var vm = banhji.agingDetail ;

		if(vm.get("isLoaded")===false){
			vm.set("isLoaded", true);
				
			var validator = $("#example").kendoValidator().data("kendoValidator");

			$("#search").click(function(e){
				e.preventDefault();			
							
	            if(validator.validate()){
	            	vm.search();	            
		        }
			});
		}			
	});

	banhji.router.route("payment_summary", function(){
		banhji.view.layout.showIn("#layout-view", banhji.view.paymentSummary);
		kendo.fx($("#slide-form")).slideIn("down").play();
		var vm = banhji.paymentSummary;

		var paymentDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/invoices/payment_summary",
					type: "GET",
					dataType: "json"
				}
			},
			group: {
	            field: "company", aggregates: [	                
	                { field: "paid", aggregate: "sum" }
	            ]
	        },
            aggregate: [                
                { field: "paid", aggregate: "sum" }
            ],
			pageSize: 200,					
			serverFiltering: true,
			schema: {
				model: {
					fields: {						
						company		: { type: "string" }, 						
                        description : { type: "string" },                                                                        
                        counter		: { type: "number" },
                        paid 		: { type: "number" }
                    }
				},
				data: "results",
				total: "total"	
			}
		});

		$("#grid").kendoGrid({
		    dataSource: paymentDS,		    	    
		    autoBind: false,
		    pageable: true,
		    sortable: true,		                           
		    columns: [	    		
	    		{ field: "company", title: "ក្រុមហ៊ុន" },
	    		{ field: "description", title: "ពណ៌នា" },
	    		{ field: "counter", title: "ចំនួន" },
	    		{ field: "paid", title: "ទឹកប្រាក់", 
	    			template: "#=kendo.toString(paid, 'c')#",
	    			groupFooterTemplate: "សរុប: #=kendo.toString(sum, 'c')#",
	    			footerTemplate: "សរុបទាំងអស់: #=kendo.toString(sum, 'c')#",	    				    			
		    		attributes: { style: "text-align: right;" }
		    	} 		    		
		    ]
		});

        $("#search").click(function(){
        	var para = Array();
			
			var sdate = vm.get("start_date");			
			if(sdate!==null){		
				para.push({ field: "start_date", value: kendo.toString(new Date(sdate), "yyyy-MM-dd") });
			}					
			
			var edate = vm.get("end_date");			
			if(edate!==null){		
				para.push({ field: "end_date", value: kendo.toString(new Date(edate), "yyyy-MM-dd") });
			}

			var cashier = vm.get("cashier");				
			if(cashier!==null){
				para.push({ field: "cashier", value: cashier });
			}			
			
			para.push({ field: "group_by", value: vm.get("group_by") });			
			
			paymentDS.filter(para);
			paymentDS.bind("requestEnd", function(e){
				var response = e.response.results;
				if(response.length>0){
					vm.set("hasData", true);
				}else{
					vm.set("hasData", false);
				}
			});									
		});
	});

	banhji.router.route("payment_detail", function(){
		banhji.view.layout.showIn("#layout-view", banhji.view.paymentDetail);
		kendo.fx($("#slide-form")).slideIn("down").play();
		var vm = banhji.paymentDetail;

		var paymentDS = new kendo.data.DataSource({
			transport: {
				read: {
					url: banhji.baseUrl + "api/invoices/payment_detail",
					type: "GET",
					dataType: "json"
				}
			},
			group: {
	            field: "people_type", aggregates: [	                	                
	                { field: "number", aggregate: "count" },
	                { field: "paid", aggregate: "sum" }
	            ]
	        },
            aggregate: [             	                        
                { field: "number", aggregate: "count" },
                { field: "paid", aggregate: "sum" }
            ],
			pageSize: 200,					
			serverFiltering: true,
			schema: {
				model: {
					id: "id",
					fields: {
						id 			: { type: "number" },
                        issued_date	: { type: "date" },
                        fullname 	: { type: "string" },
                        people_type : { type: "string" },
                        number 		: { type: "string" },
                        payment_method: { type: "string" },
                        paid 		: { type: "number" },
                        rate 		: { type: "number" },
                        sub_code 	: { type: "string" },
                        transformer_number : { type: "string" }
                    }
				},
				data: "results",
				total: "total"	
			}
		});

		$("#grid").kendoGrid({
		    dataSource: paymentDS,		    	    
		    autoBind: false,
		    pageable: true,
		    sortable: true,		                           
		    columns: [
		    	{ field: "issued_date", title: "ថ្ងៃបង់ប្រាក់", 
		    		template: "#=kendo.toString(issued_date, 'dd-MM-yyyy')#" 
		    	},	    		
	    		{ field: "fullname", title: "ឈ្មោះ" },
	    		{ field: "people_type", title: "ប្រភេទអតិថិជន" },
	    		{ field: "transformer_number", title: "តំបន់" },
	    		{ field: "payment_method", title: "វិធីបង់ប្រាក់" },	    		
	    		{ field: "number", title: "លេខកូដ",
	    			footerTemplate: "ចំនួនសរុប: #=count#", 
	    			groupFooterTemplate: "ចំនួន: #=count#"
	    		},
	    		{ field: "paid", title: "ទឹកប្រាក់", 
	    			template: "#=kendo.toString(paid/rate, 'c', sub_code)#",
	    			groupFooterTemplate: "សរុប: #=kendo.toString(sum, 'c')#",
	    			footerTemplate: "សរុបទាំងអស់: #=kendo.toString(sum, 'c')#",	    				    			
		    		attributes: { style: "text-align: right;" }
		    	} 		    		
		    ]
		});

		$("#groupBy").change(function(){
			var groupBy = $(this).val();
			if(paymentDS.total()>0){
				paymentDS.group({ field: groupBy, aggregates: [	                	                
		                { field: "number", aggregate: "count" },
		                { field: "paid", aggregate: "sum" }
		            ] 
		        });
			}
		});		

        $("#search").click(function(){
        	var para = Array();
			
			var sdate = vm.get("start_date");			
			if(sdate!==null){		
				para.push({ field: "start_date", value: kendo.toString(new Date(sdate), "yyyy-MM-dd") });
			}					
			
			var edate = vm.get("end_date");			
			if(edate!==null){		
				para.push({ field: "end_date", value: kendo.toString(new Date(edate), "yyyy-MM-dd") });
			}
			
			var cashier = vm.get("cashier");				
			if(cashier!==null){
				para.push({ field: "cashier", value: cashier });
			}
			
			paymentDS.filter(para);
			paymentDS.bind("requestEnd", function(e){
				var response = e.response.results;
				if(response.length>0){
					vm.set("hasData", true);
				}else{
					vm.set("hasData", false);
				}
			});							
		});
	});

	banhji.router.route("eSale_summary", function(){
		banhji.view.layout.showIn("#layout-view", banhji.view.eSaleSummary);
				
		if(banhji.pageLoaded["eSaleSummary"]==undefined){
			banhji.pageLoaded["eSaleSummary"] = true;
			
			var invoiceDS = new kendo.data.DataSource({
				transport: {
					read: {
						url: banhji.baseUrl + "api/invoices/utility_sale_summary",
						type: "GET",
						dataType: "json"
					}
				},
				group: {
		            field: "company", aggregates: [	            		                	                
		                { field: "quantity", aggregate: "sum" },	                
		                { field: "amount", aggregate: "sum" }
		            ]
		        },
	            aggregate: [             	                        
	                { field: "quantity", aggregate: "sum" },                           
	                { field: "amount", aggregate: "sum" }
	            ],								
				serverFiltering: true,			
				schema: {
					model: {
						id: "id",
						fields: {
							id 			: { type: "number" },						
							area 		: { type: "string" },                        
	                        company 	: { type: "string" },	                        
	                        quantity 	: { type: "number" },                        
	                        amount 		: { type: "number" },	                        
	                        sub_code 	: { type: "string" }                        
	                    }
					},
					data: "results",
					total: "total"	
				}
			});

			$("#grid").kendoGrid({
			    dataSource: invoiceDS,		    		    	    
			    autoBind: false,
			    pageable: true,
			    sortable: true,		    	                           
			    columns: [		    		    		
		    		{ field: "area", title: "តំបន់", footerTemplate: "សរុប:",
		    			footerAttributes: { style: "text-align: right;" }
		    		},		    		
		    		{ field: "quantity", title: "ថាមពល", 
		    			template:"#=kendo.toString(quantity, 'n0')# kWh",
		    			groupFooterTemplate: "#=kendo.toString(sum, 'n0')# kWh",
		    			footerTemplate: "#=kendo.toString(sum, 'n0')# kWh",
		    			attributes: { style: "text-align: right;" },
			    		footerAttributes: { style: "text-align: right;" } 
		    		},	    		
		    		{ field: "amount", title: "ទឹកប្រាក់", 
		    			template: "#=kendo.toString(amount, 'c', sub_code)#",
		    			groupFooterTemplate: "#=kendo.toString(sum, 'c')#",
		    			footerTemplate: "#=kendo.toString(sum, 'c')#",	    				    			
			    		attributes: { style: "text-align: right;" },
			    		footerAttributes: { style: "text-align: right;" }
			    	}	    			    		
			    ]
			});				

			var d = new Date();
	        var monthpicker = $("#monthpicker").kendoDatePicker({        	     	
	            start: "year",            
	            depth: "year",
	            format: "MM-yyyy",            
	            change: function() {
			        var value = this.value();
			        value.setDate(1);
			        d = value;		        
			        $("#monthOf").text("ប្រចាំខែ: " + kendo.toString(value, "MM-yyyy")); 
			    }
	        });

			$("#search").click(function(e){
				e.preventDefault();
	        	
	        	if(monthpicker.val()){      		
					invoiceDS.filter([						
						{ field: "type", value: 2 },
						{ field: "company_id", value: banhji.config.userData.parent },					
						{ field: "month_of", value: kendo.toString(d, "yyyy-MM-dd") }					
					]);							
				}								
			});
		}		
	});

	banhji.router.route("wSale_summary", function(){
		banhji.view.layout.showIn("#layout-view", banhji.view.wSaleSummary);
				
		if(banhji.pageLoaded["wSaleSummary"]==undefined){
			banhji.pageLoaded["wSaleSummary"] = true;
			
			var invoiceDS = new kendo.data.DataSource({
				transport: {
					read: {
						url: banhji.baseUrl + "api/invoices/utility_sale_summary",
						type: "GET",
						dataType: "json"
					}
				},
				group: {
		            field: "company", aggregates: [	            		                	                
		                { field: "quantity", aggregate: "sum" },	                
		                { field: "amount", aggregate: "sum" }
		            ]
		        },
	            aggregate: [             	                        
	                { field: "quantity", aggregate: "sum" },                           
	                { field: "amount", aggregate: "sum" }
	            ],								
				serverFiltering: true,			
				schema: {
					model: {
						id: "id",
						fields: {
							id 			: { type: "number" },						
							area 		: { type: "string" },                        
	                        company 	: { type: "string" },	                        
	                        quantity 	: { type: "number" },                        
	                        amount 		: { type: "number" },	                        
	                        sub_code 	: { type: "string" }                        
	                    }
					},
					data: "results",
					total: "total"	
				}
			});

			$("#grid").kendoGrid({
			    dataSource: invoiceDS,		    		    	    
			    autoBind: false,
			    pageable: true,
			    sortable: true,		    	                           
			    columns: [		    		    		
		    		{ field: "area", title: "តំបន់", footerTemplate: "សរុប:",
		    			footerAttributes: { style: "text-align: right;" }
		    		},		    		
		    		{ field: "quantity", title: "ថាមពល", 
		    			template:"#=kendo.toString(quantity, 'n0')# m<sup>3</sup>",
		    			groupFooterTemplate: "#=kendo.toString(sum, 'n0')# m<sup>3</sup>",
		    			footerTemplate: "#=kendo.toString(sum, 'n0')# m<sup>3</sup>",
		    			attributes: { style: "text-align: right;" },
			    		footerAttributes: { style: "text-align: right;" } 
		    		},	    		
		    		{ field: "amount", title: "ទឹកប្រាក់", 
		    			template: "#=kendo.toString(amount, 'c', sub_code)#",
		    			groupFooterTemplate: "#=kendo.toString(sum, 'c')#",
		    			footerTemplate: "#=kendo.toString(sum, 'c')#",	    				    			
			    		attributes: { style: "text-align: right;" },
			    		footerAttributes: { style: "text-align: right;" }
			    	}	    			    		
			    ]
			});				

			var d = new Date();
	        var monthpicker = $("#monthpicker").kendoDatePicker({        	     	
	            start: "year",            
	            depth: "year",
	            format: "MM-yyyy",            
	            change: function() {
			        var value = this.value();
			        value.setDate(1);
			        d = value;		        
			        $("#monthOf").text("ប្រចាំខែ: " + kendo.toString(value, "MM-yyyy")); 
			    }
	        });

			$("#search").click(function(e){
				e.preventDefault();
	        	
	        	if(monthpicker.val()){      		
					invoiceDS.filter([						
						{ field: "type", value: 3 },
						{ field: "company_id", value: banhji.config.userData.parent },					
						{ field: "month_of", value: kendo.toString(d, "yyyy-MM-dd") }					
					]);							
				}								
			});
		}		
	});

	banhji.router.route("eSale_detail", function(){
		banhji.view.layout.showIn("#layout-view", banhji.view.eSaleDetail);
				
		if(banhji.pageLoaded["eSaleDetail"]==undefined){
			banhji.pageLoaded["eSaleDetail"] = true;
			
			var invoiceDS = new kendo.data.DataSource({
				transport: {
					read: {
						url: banhji.baseUrl + "api/invoices/utility_sale_detail",
						type: "GET",
						dataType: "json"
					}
				},
				group: {
		            field: "area", aggregates: [	            		                	                
		                { field: "quantity", aggregate: "sum" },	                
		                { field: "amount", aggregate: "sum" }
		            ]
		        },
	            aggregate: [             	                        
	                { field: "quantity", aggregate: "sum" },                           
	                { field: "amount", aggregate: "sum" }
	            ],								
				serverFiltering: true,			
				schema: {
					model: {
						id: "id",
						fields: {
							id 			: { type: "number" },						
							area 		: { type: "string" },                        
	                        fullname 	: { type: "string" },
	                        ampere  	: { type: "string" },
	                        box_no 		: { type: "string" },
	                        meter_no	: { type: "string" },
	                        prev_reading: { type: "number" },
	                        new_reading	: { type: "number" },
	                        quantity 	: { type: "number" },                        
	                        amount 		: { type: "number" },                        
	                        rate 		: { type: "number" },
	                        sub_code 	: { type: "string" }                        
	                    }
					},
					data: "results",
					total: "total"	
				}
			});

			$("#grid").kendoGrid({
			    dataSource: invoiceDS,		    		    	    
			    autoBind: false,
			    pageable: true,
			    sortable: true,		    	                           
			    columns: [		    		    		
		    		{ field: "fullname", title: "ឈ្មោះ" },
		    		{ field: "ampere", title: "អំពែ" },
		    		{ field: "box_no", title: "ប្រអប់" },
		    		{ field: "meter_no", title: "កុងទ័រ" },
		    		{ field: "prev_reading", title: "អំនានចាស់",
		    			template:"#=kendo.toString(prev_reading, 'n0')#", 
		    			attributes: { style: "text-align: right;" },
			    		footerAttributes: { style: "text-align: right;" }
		    		},
		    		{ field: "new_reading", title: "អំនានថ្មី", 
		    			template:"#=kendo.toString(new_reading, 'n0')#",
		    			footerTemplate: "សរុប:",
		    			attributes: { style: "text-align: right;" },
			    		footerAttributes: { style: "text-align: right;" }
		    		},
		    		{ field: "quantity", title: "ថាមពល", 
		    			template:"#=kendo.toString(quantity, 'n0')#",
		    			groupFooterTemplate: "#=kendo.toString(sum, 'n0')# kWh",
		    			footerTemplate: "#=kendo.toString(sum, 'n0')# kWh",
		    			attributes: { style: "text-align: right;" },
			    		footerAttributes: { style: "text-align: right;" } 
		    		},	    		
		    		{ field: "amount", title: "ទឹកប្រាក់", 
		    			template: "#=kendo.toString(amount/rate, 'c', sub_code)#",
		    			groupFooterTemplate: "#=kendo.toString(sum, 'c')#",
		    			footerTemplate: "#=kendo.toString(sum, 'c')#",	    				    			
			    		attributes: { style: "text-align: right;" },
			    		footerAttributes: { style: "text-align: right;" }
			    	}	    			    		
			    ]
			});			

			var company = $("#company").kendoDropDownList({
	                        dataTextField: "abbr",
	                        dataValueField: "id",
	                        dataSource: banhji.ds.companyDS
	                    });		

			var d = new Date();
	        var monthpicker = $("#monthpicker").kendoDatePicker({        	     	
	            start: "year",            
	            depth: "year",
	            format: "MM-yyyy",            
	            change: function() {
			        var value = this.value();
			        value.setDate(1);
			        d = value;		        
			        $("#monthOf").text("ប្រចាំខែ: " + kendo.toString(value, "MM-yyyy")); 
			    }
	        });

			$("#search").click(function(e){
				e.preventDefault();
	        	
	        	if(monthpicker.val()){      		
					invoiceDS.filter([
						{ field: "company_id", value: company.val() },
						{ field: "type", value: "eInvoice" },					
						{ field: "month_of", value: kendo.toString(d, "yyyy-MM-dd") }					
					]);							
				}								
			});
		}		
	});

	banhji.router.route("wSale_detail", function(){
		banhji.view.layout.showIn("#layout-view", banhji.view.wSaleDetail);
		
		if(banhji.pageLoaded["wSaleDetail"]==undefined){
			banhji.pageLoaded["wSaleDetail"] = true;

			var invoiceDS = new kendo.data.DataSource({
				transport: {
					read: {
						url: banhji.baseUrl + "api/invoices/utility_sale_detail",
						type: "GET",
						dataType: "json"
					}
				},
				group: {
		            field: "area", aggregates: [	            		                	                
		                { field: "quantity", aggregate: "sum" },	                
		                { field: "amount", aggregate: "sum" }
		            ]
		        },
	            aggregate: [             	                        
	                { field: "quantity", aggregate: "sum" },                            
	                { field: "amount", aggregate: "sum" }
	            ],								
				serverFiltering: true,			
				schema: {
					model: {
						id: "id",
						fields: {
							id 			: { type: "number" },						
							area 		: { type: "string" },                        
	                        fullname 	: { type: "string" },                        
	                        meter_no	: { type: "string" },
	                        prev_reading: { type: "number" },
	                        new_reading	: { type: "number" },
	                        quantity 	: { type: "number" },                      
	                        amount 		: { type: "number" },                        
	                        rate 		: { type: "number" },
	                        sub_code 	: { type: "string" }                        
	                    }
					},
					data: "results",
					total: "total"	
				}
			});

			$("#grid").kendoGrid({
			    dataSource: invoiceDS,		    		    	    
			    autoBind: false,
			    pageable: true,
			    sortable: true,		    	                           
			    columns: [		    		    		
		    		{ field: "fullname", title: "ឈ្មោះ" },	    		
		    		{ field: "meter_no", title: "កុងទ័រ" },
		    		{ field: "prev_reading", title: "អំនានចាស់",
		    			template:"#=kendo.toString(prev_reading, 'n0')#", 
		    			attributes: { style: "text-align: right;" },
			    		footerAttributes: { style: "text-align: right;" }
		    		},
		    		{ field: "new_reading", title: "អំនានថ្មី", 
		    			template:"#=kendo.toString(new_reading, 'n0')#",
		    			footerTemplate: "សរុប:",
		    			attributes: { style: "text-align: right;" },
			    		footerAttributes: { style: "text-align: right;" }
		    		},
		    		{ field: "quantity", title: "បរិមាណទឹក", 
		    			template:"#=kendo.toString(quantity, 'n0')#",
		    			groupFooterTemplate: "#=kendo.toString(sum, 'n0')# m<sup>3</sup>",
		    			footerTemplate: "#=kendo.toString(sum, 'n0')# m<sup>3</sup>",
		    			attributes: { style: "text-align: right;" },
			    		footerAttributes: { style: "text-align: right;" } 
		    		},	    		
		    		{ field: "amount", title: "ទឹកប្រាក់", 
		    			template: "#=kendo.toString(amount/rate, 'c', sub_code)#",
		    			groupFooterTemplate: "#=kendo.toString(sum, 'c')#",
		    			footerTemplate: "#=kendo.toString(sum, 'c')#",	    				    			
			    		attributes: { style: "text-align: right;" },
			    		footerAttributes: { style: "text-align: right;" }
			    	}	    			    		
			    ]
			});

			var company = $("#company").kendoDropDownList({
	                        dataTextField: "abbr",
	                        dataValueField: "id",
	                        dataSource: banhji.ds.companyDS
	                    });

			var d = new Date();
	        var monthpicker = $("#monthpicker").kendoDatePicker({        	     	
	            start: "year",            
	            depth: "year",
	            format: "MM-yyyy",            
	            change: function() {
			        var value = this.value();
			        value.setDate(1);
			        d = value;		        
			        $("#monthOf").text("ប្រចាំខែ: " + kendo.toString(value, "MM-yyyy")); 
			    }
	        });

			$("#search").click(function(e){
				e.preventDefault();
	        	
	        	if(monthpicker.val()){      		
					invoiceDS.filter([
						{ field: "company_id", value: company.val() },
						{ field: "type", value: "wInvoice" },					
						{ field: "month_of", value: kendo.toString(d, "yyyy-MM-dd") }					
					]);							
				}								
			});
		}		
	});

	banhji.router.route("eLow_consumption", function(){
		banhji.view.layout.showIn("#layout-view", banhji.view.eLowConsumption);				
		kendo.fx($("#slide-form")).slideIn("down").play();

		if(banhji.pageLoaded["eLow_consumption"]==undefined){
			banhji.pageLoaded["eLow_consumption"] = true;

			var consumptionDS = new kendo.data.DataSource({
			  	transport: {	  
				  	read: {
					  	url : banhji.baseUrl + "api/meter_records/low_consumption",
					  	type: "GET",
					  	dataType: "json"		  
				  	}
			  	},			  	
			  	group: {
		            field: "area", aggregates: [		                	                
		                { field: "month1", aggregate: "count" },
		                { field: "current", aggregate: "min" },
		                { field: "current", aggregate: "average" },
		                { field: "current", aggregate: "max" }
		            ]
		        },
	            aggregate: [
	            	{ field: "month1", aggregate: "count" },	            	
	                { field: "current", aggregate: "min" },
	                { field: "current", aggregate: "average" },
	                { field: "current", aggregate: "max" }
	            ],
	            serverFiltering: true,
	            schema: {
					model: {
						id: "id"
					},
					data: "results",
					total: "total"	
				}  		
			});			

			$("#grid").kendoGrid({
			    dataSource: consumptionDS,		    		    	    
			    autoBind: false,
			    pageable: true,
			    sortable: true,			    	    	                           
			    columns: [		            	    		    		
		    		{ field: "fullname", title: "ឈ្មោះ" },		    		   		
		    		{ field: "ampere", title: "អំពែ" },
		    		{ field: "box_no", title: "ប្រអប់" },
		    		{ field: "meter_no", title: "កុងទ័រ" },		    		
		    		{ field: "month3", title: "៣ ខែមុន" },
		    		{ field: "month2", title: "២ ខែមុន" },
		    		{ field: "month1", title: "១ ខែមុន",
		    			groupFooterTemplate: "ចំនួន: #=count# នាក់",
		    			footerTemplate: "ចំនួនសរុប: #=count#​ នាក់",	    				    			
			    		attributes: { style: "text-align: left;" },
			    		footerAttributes: { style: "text-align: left;" }
			    	},
		    		{ field: "current", title: "បច្ចុប្បន្ន",		    			
		    			groupFooterTemplate: "<div>Min: #=min# kWh</div><div> Avg: #=kendo.toString(average, 'n')# kWh</div><div> Max: #=max# kWh</div>",
		    			footerTemplate: "<div>Min: #=min# kWh</div><div> Avg: #=kendo.toString(average, 'n')# kWh</div><div> Max: #=max# kWh</div>",	    				    			
			    		attributes: { style: "text-align: left;" },
			    		footerAttributes: { style: "text-align: left;" }
			    	}		    			    		
			    ]
			});
			
			var company = $("#company").kendoDropDownList({
	                        dataTextField: "abbr",
	                        dataValueField: "id",
	                        dataSource: banhji.ds.companyDS
	                    });

	        var usage = $("#usage").kendoNumericTextBox({
                        format: "<= # kWh",                        
                        min: 0                        
                    });

            var d = new Date();
	        var monthpicker = $("#monthpicker").kendoDatePicker({        	     	
	            start: "year",            
	            depth: "year",
	            format: "MM-yyyy",            
	            change: function() {
			        var value = this.value();
			        value.setDate(1);
			        d = value;		        
			        $("#strDate").text("គិតត្រឹមខែ " + kendo.toString(value, "MM-yyyy")); 
			    }
	        });				
			
			$("#search").click(function(e){
				e.preventDefault();
	        	
	        	if(company.val()){      		
					consumptionDS.filter([
						{ field: "company_id", value: company.val() },
						{ field: "type", value: 2 },
						{ field: "usage", value: usage.val() },	
						{ field: "month_of", value: kendo.toString(d, "yyyy-MM-dd") }									
					]);							
				}								
			});
		}				
	});
	
	banhji.router.route("wLow_consumption", function(){
		banhji.view.layout.showIn("#layout-view", banhji.view.wLowConsumption);				
		kendo.fx($("#slide-form")).slideIn("down").play();

		if(banhji.pageLoaded["wLow_consumption"]==undefined){
			banhji.pageLoaded["wLow_consumption"] = true;

			var consumptionDS = new kendo.data.DataSource({
			  	transport: {	  
				  	read: {
					  	url : banhji.baseUrl + "api/meter_records/low_consumption",
					  	type: "GET",
					  	dataType: "json"		  
				  	}
			  	},			  	
			  	group: {
		            field: "area", aggregates: [		                	                
		                { field: "month1", aggregate: "count" },
		                { field: "current", aggregate: "min" },
		                { field: "current", aggregate: "average" },
		                { field: "current", aggregate: "max" }
		            ]
		        },
	            aggregate: [
	            	{ field: "month1", aggregate: "count" },	            	
	                { field: "current", aggregate: "min" },
	                { field: "current", aggregate: "average" },
	                { field: "current", aggregate: "max" }
	            ],
	            serverFiltering: true,
	            schema: {
					model: {
						id: "id"
					},
					data: "results",
					total: "total"	
				}  		
			});			

			$("#grid").kendoGrid({
			    dataSource: consumptionDS,		    		    	    
			    autoBind: false,
			    pageable: true,
			    sortable: true,			    	    	                           
			    columns: [		            	    		    		
		    		{ field: "fullname", title: "ឈ្មោះ" },		    		
		    		{ field: "meter_no", title: "កុងទ័រ" },		    		
		    		{ field: "month3", title: "៣ ខែមុន" },
		    		{ field: "month2", title: "២ ខែមុន" },
		    		{ field: "month1", title: "១ ខែមុន",
		    			groupFooterTemplate: "ចំនួន: #=count#​ នាក់",
		    			footerTemplate: "ចំនួនសរុប: #=count# នាក់",	    				    			
			    		attributes: { style: "text-align: left;" },
			    		footerAttributes: { style: "text-align: left;" }
			    	},
		    		{ field: "current", title: "បច្ចុប្បន្ន",		    			
		    			groupFooterTemplate: "<div>Min: #=min# m<sup>3</sup></div><div> Avg: #=kendo.toString(average, 'n')# m<sup>3</sup></div><div> Max: #=max# m<sup>3</sup></div>",
		    			footerTemplate: "<div>Min: #=min# m<sup>3</sup></div><div> Avg: #=kendo.toString(average, 'n')# m<sup>3</sup></div><div> Max: #=max# m<sup>3</sup></div>",	    				    			
			    		attributes: { style: "text-align: left;" },
			    		footerAttributes: { style: "text-align: left;" }
			    	}		    			    		
			    ]
			});
			
			var company = $("#company").kendoDropDownList({
	                        dataTextField: "abbr",
	                        dataValueField: "id",
	                        dataSource: banhji.ds.companyDS
	                    });

	        var usage = $("#usage").kendoNumericTextBox({
                        format: "<= # kWh",                        
                        min: 0                        
                    });

            var d = new Date();
	        var monthpicker = $("#monthpicker").kendoDatePicker({        	     	
	            start: "year",            
	            depth: "year",
	            format: "MM-yyyy",            
	            change: function() {
			        var value = this.value();
			        value.setDate(1);
			        d = value;		        
			        $("#strDate").text("គិតត្រឹមខែ " + kendo.toString(value, "MM-yyyy")); 
			    }
	        });				
			
			$("#search").click(function(e){
				e.preventDefault();
	        	
	        	if(company.val()){      		
					consumptionDS.filter([
						{ field: "company_id", value: company.val() },
						{ field: "type", value: 3 },
						{ field: "usage", value: usage.val() },	
						{ field: "month_of", value: kendo.toString(d, "yyyy-MM-dd") }									
					]);							
				}								
			});
		}				
	});

	banhji.router.route("eDisconnect_list", function(){
		banhji.view.layout.showIn("#layout-view", banhji.view.eDisconnectList);				
		kendo.fx($("#slide-form")).slideIn("down").play();

		if(banhji.pageLoaded["eDisconnect_list"]==undefined){
			banhji.pageLoaded["eDisconnect_list"] = true;

			var disconnectDS = new kendo.data.DataSource({
			  	transport: {	  
				  	read: {
					  	url : banhji.baseUrl + "api/invoices/disconnect_list",
					  	type: "GET",
					  	dataType: "json"		  
				  	}
			  	},			  	
			  	group: {
		            field: "area", aggregates: [		                	                
		                { field: "amount", aggregate: "sum" }
		            ]
		        },
	            aggregate: [             	                        	                                      
	                { field: "amount", aggregate: "sum" }
	            ],
	            serverFiltering: true,
	            schema: {
					model: {
						id: "id"
					},
					data: "results",
					total: "total"	
				}  		
			});

			$("#grid").kendoGrid({
			    dataSource: disconnectDS,		    		    	    
			    autoBind: false,
			    pageable: true,
			    sortable: true,			    	    	                           
			    columns: [		            	    		    		
		    		{ field: "fullname", title: "ឈ្មោះ" },
		    		{ field: "ampere", title: "អំពែ" },
		    		{ field: "box_no", title: "ប្រអប់" },	    		
		    		{ field: "meter_no", title: "កុងទ័រ" },
		    		{ field: "number", title: "វិក្កយបត្រ" },
		    		{ field: "due_date", title: "ថ្ងៃផុតកំណត់",
		    			format: "{0: dd-MM-yyyy }" 
		    		},
		    		{ field: "over_due_day", title: "ចំនួនថ្ងៃ", 
		    			attributes: { style: "text-align: center;" },
		    			footerTemplate: "សរុប:",
		    			footerAttributes: { style: "text-align: right;" } 
		    		},		    		
		    		{ field: "amount", title: "ទឹកប្រាក់ជំពាក់", 
		    			template: "#=kendo.toString(amount/rate, 'c', sub_code)#",
		    			groupFooterTemplate: "#=kendo.toString(sum, 'c')#",
		    			footerTemplate: "#=kendo.toString(sum, 'c')#",	    				    			
			    		attributes: { style: "text-align: right;" },
			    		footerAttributes: { style: "text-align: right;" }
			    	}	    			    		
			    ]
			});
			
			var company = $("#company").kendoDropDownList({
	                        dataTextField: "abbr",
	                        dataValueField: "id",
	                        dataSource: banhji.ds.companyDS
	                    });
	        var overDueDay = $("#overDueDay").kendoNumericTextBox({
                        format: ">= # ថ្ងៃ",                        
                        min: 0                        
                    });				
			
			$("#search").click(function(e){
				e.preventDefault();
	        	
	        	if(company.val()){      		
					disconnectDS.filter([
						{ field: "company_id", value: company.val() },
						{ field: "type", value: "eInvoice" },
						{ field: "over_due_day", value: overDueDay.val()==''?0:overDueDay.val() }				
					]);							
				}								
			});
		}				
	});

	banhji.router.route("wDisconnect_list", function(){
		banhji.view.layout.showIn("#layout-view", banhji.view.wDisconnectList);				
		kendo.fx($("#slide-form")).slideIn("down").play();

		if(banhji.pageLoaded["wDisconnect_list"]==undefined){
			banhji.pageLoaded["wDisconnect_list"] = true;

			var disconnectDS = new kendo.data.DataSource({
			  	transport: {	  
				  	read: {
					  	url : banhji.baseUrl + "api/invoices/disconnect_list",
					  	type: "GET",
					  	dataType: "json"		  
				  	}
			  	},			  	
			  	group: {
		            field: "area", aggregates: [		                	                
		                { field: "amount", aggregate: "sum" }
		            ]
		        },
	            aggregate: [             	                        	                                      
	                { field: "amount", aggregate: "sum" }
	            ],
	            serverFiltering: true,
	            schema: {
					model: {
						id: "id"
					},
					data: "results",
					total: "total"	
				}  		
			});

			$("#grid").kendoGrid({
			    dataSource: disconnectDS,		    		    	    
			    autoBind: false,
			    pageable: true,
			    sortable: true,			    	    	                           
			    columns: [		            	    		    		
		    		{ field: "fullname", title: "ឈ្មោះ" },		    		   		
		    		{ field: "meter_no", title: "កុងទ័រ" },
		    		{ field: "number", title: "វិក្កយបត្រ" },
		    		{ field: "due_date", title: "ថ្ងៃផុតកំណត់",
		    			format: "{0: dd-MM-yyyy }" 
		    		},
		    		{ field: "over_due_day", title: "ចំនួនថ្ងៃ", 
		    			attributes: { style: "text-align: center;" },
		    			footerTemplate: "សរុប:",
		    			footerAttributes: { style: "text-align: right;" } 
		    		},		    		
		    		{ field: "amount", title: "ទឹកប្រាក់ជំពាក់", 
		    			template: "#=kendo.toString(amount/rate, 'c', sub_code)#",
		    			groupFooterTemplate: "#=kendo.toString(sum, 'c')#",
		    			footerTemplate: "#=kendo.toString(sum, 'c')#",	    				    			
			    		attributes: { style: "text-align: right;" },
			    		footerAttributes: { style: "text-align: right;" }
			    	}	    			    		
			    ]
			});
			
			var company = $("#company").kendoDropDownList({
	                        dataTextField: "abbr",
	                        dataValueField: "id",
	                        dataSource: banhji.ds.companyDS
	                    });
	        var overDueDay = $("#overDueDay").kendoNumericTextBox({
                        format: ">= # ថ្ងៃ",                        
                        min: 0                        
                    });				
			
			$("#search").click(function(e){
				e.preventDefault();
	        	
	        	if(company.val()){      		
					disconnectDS.filter([
						{ field: "company_id", value: company.val() },
						{ field: "type", value: "wInvoice" },
						{ field: "over_due_day", value: overDueDay.val()==''?0:overDueDay.val() }				
					]);							
				}								
			});
		}				
	});	
	//END OF DAWINE ********************************************************************************************************
	
	
	$(function(){
		$("title").text(banhji.config.title);
		var template = kendo.template($("#menu").html());
		var menu = [];
		for(var i=0;i<banhji.km.length; i++) {
			var current = banhji.km[i];
			if(banhji.config.userData.allowedModules[i]) {
				menu.push(current);
			}
		}
		$("#dropdownMenu").html(template(menu));		
		banhji.router.start();
		if(banhji.config.userData['company']==="") {
			window.location.href="<?php echo base_url();?>app#new_company";
		}

		// here is to save the user log into the log table for audit trail
		window.onbeforeunload = function() {
			// console.log(event);
			// return "Are you sure to close?";
		}
		banhji.viewModel = kendo.observable({
			baseUrl 	: "https://localhost/api/v1/vendors/",
			pageSize 	: 100,
			urlSegment 	: null,
			url 		: function() {
				if(this.get('urlSegment') && typeof this.get('urlSegment') === string) {
					return this.get('baseUrl') + this.get('urlSegment');
				}
				return this.get('baseUrl');
			},
			dataSource 	: new kendo.data.DataSource({
				offlineStorage: "vendors",
				transport: {
					read: {
						url: function() {
							return viewModel.url();
						},
						datatype: 'json',
						type: "GET"
					},
					create: {
						url: function() {
							return viewModel.url();
						},
						datatype: 'json',
						type: "POST"
					},
					update: {
						url: function() {
							return viewModel.url();
						},
						datatype: 'json',
						type: "PUT"
					},
					destroy: {
						url: function() {
							return viewModel.url();
						},
						datatype: 'json',
						type: "DELETE"
					},
					parameterMap: function(data, type) {
						if(type !== "read" && data.models) {
							return {models: kendo.stringify(data.models)};
						}
						return data;
					}
				},
				schema: {
					model: {
						id: "id",
						fields: {
							id: { type: 'number',editable: false, nullable: true},
							firstName: { type: "string", editable: true, nullable: false},
							lastName: { type: "string", editable: true, nullable: false},
							username: { editable: true, nullable: false, validation: { required: true}},
							password: { editable: true, nullable: false, validataion: { required: true, min: 7}},
							type: { defaultValue: {id: 1, name: "vendor"}},
							createdDate: { type: 'date', defaultValue: new Date()},
							updatedDate: { type: 'date', defaultValue: new Date()}
						}
					}
				},
				serverPaging: true,
				serverFiltering: true,
				pageSize: 100
			}),
			setOffline 	: function() {
				banhji.viewModel.dataSource.online(false);
			},
			setOnline 	: function() {
				banhji.viewModel.dataSource.online(true);
			},
			onlineStatus: function() {
				return viewModel.dataSource.online();
			},
			toPDF 		: function() {
				var drawing = kendo.drawing;
				var geom = kendo.geometry;

				// master group
				var group = new drawing.Group();

				// make rect shape
				// var rect = new geom.Rect(
				// 	[10, 10], // position of the top left corner
				// 	[249, 240] // Size of the rectangle
				// );

				// drawing logo for pdf
				// var logo = new drawing.Image("http://images.customplanet.com/UserCreatedImages/MainDisplayImages/Front/c06bd590-bfa5-49a8-bd19-6e48ab376859.png", rect);

				// use group.append function to add to master group for multipage true
				// group.append(logo);

				group.append(new drawing.Text("Company Name", new geom.Point(200, 1)));
				group.append(new drawing.Text("Company Name II", new geom.Point(200, 10)))

				// set option for pdf
				group.options.set("pdf", {
					paperSize: "A4",
					margin: {
						left 	: "20mm",
						top 	: "40mm",
						right 	: "20mm",
						bottom	: "40mm"
					},
					multiPage: true // default false
				});

				// save
				drawing.pdf.saveAs(group, "vendorList.pdf");
			},
			// toExcel 	: function() {
			// 	var workbook = new kendo.ooxml.Workbook({
			// 		sheets: [
			// 			{ 
			// 				columns: [
			// 					{ autoWidth: true },
			// 					{ autoWidth: true}
			// 				],
			// 				title: "Vendor List",
			// 				rows: [ // first row
			// 					cells: [
			// 						{},
			// 						{}
			// 					],
			// 					// second row
			// 					cells: [
			// 						{},
			// 						{}
			// 					]
			// 				]
			// 			}
			// 		]
			// 	});
			// 	kendo.saveAs({
			// 		dataURI: workbook.toDataURL(),
			// 		fileName: "vendorList.xlsx"
			// 	});
			// },
			save 		: function() {
				if(this.dataSource.hasChanges()) { // true
					this.dataSource.sync();
				}
			}
		});
	});
</script>
