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
<script id="Index" type="text/x-kendo-template"></script>

<!-- Customer Setting -->
<script id="customerSetting" type="text/x-kendo-template">
	<div class="page-wrapper ">
        <div class="container-fluid">
        	<div class="row marginTop15 sale">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body" >
                        	<h2 data-bind="text: lang.lang.general_customer_setting"></h2>
                        	<div class="vtabs" style="width: 100%;">
	                        	<ul class="nav nav-tabs tabs-vertical" role="tablist" style="width: 17%; float: left;">
									<li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#customerType" id=""><span class="hidden-sm-up"><i class="ti-layout-grid2-thumb"></i></span> <span class="hidden-xs-down" data-bind="text: lang.lang.customer_type"></span></a> </li>
									<li class="nav-item"> <a class="nav-link" href="#/customer_group"><span class="hidden-sm-up"><i class="ti-layout-grid2-thumb"></i></span> <span class="hidden-xs-down" data-bind="text: lang.lang.customer_group"></span></a> </li>
								    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#paymentMethod"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down" data-bind="text: lang.lang.payment_method"></span></a> </li>
								    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#paymentTerms"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down" data-bind="text: lang.lang.payment_terms"></span></a> </li>
								    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#customForms"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down" data-bind="text: lang.lang.custom_forms"></span></a> </li>
								    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#prefixSetting"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down" data-bind="text: lang.lang.prefix_setting"></span></a> </li>
							    </ul>
				                <div class="tab-content" style="float: left; width: 83%; padding: 10px;">
					                <div class="tab-pane active" id="customerType" role="tabpanel">
					                	<div class="row">
											<div class="col-md-12">
												<div class="hidden-md-up marginBottom">
													<h3 data-bind="text: lang.lang.customer_type"></h2>
												</div>

												<div class="row">
													<div class="col-md-12">
													    <input style="height: 35px;" class="col-md-3 marginRight marginBottom" id="appendedInputButtons" type="text" placeholder="input customer type ..." data-bind="value: contactTypeName">
													    <input style="height: 35px;" class="col-md-3 marginRight marginBottom" id="appendedInputButtons" type="text" placeholder="input abbr ..." data-bind="value: contactTypeAbbr">
													    <select style="height: 35px;" class="col-md-3 marginRight marginBottom" id="appendedInputButtons" data-bind="value: contactTypeCompany" >
											                <option value="0"><span data-bind="text: lang.lang.not_a_company"></span></option>
											                <option value="1"><span data-bind="text: lang.lang.it_is_a_company"></span></option>
											            </select>
													    <button class="col-md-2 btn waves-effect waves-light btn-block btn-info  marginBottom" type="button" data-bind="click: addContactType"><i class="icon-plus marginRight"></i> <span data-bind="text: lang.lang.add_type"></span></button>
													</div>
												</div>

												<div class="row">
													<div class="col-md-12  table-responsive">
												    	<table class="table color-table dark-table">
												    		<thead>
												    			<tr>
												    				<th class="center"><span data-bind="text: lang.lang.type"></span></th>
												    				<th class="center"><span data-bind="text: lang.lang.abbr"></span></th>
												    				<th class="center"><span data-bind="text: lang.lang.is_company"></span></th>
												    				<th class="center"></th>
												    			</tr>
												    		</thead>
												    		<tbody data-role="listview"
												    				data-auto-bind="false"
												        			data-edit-template="customerSetting-edit-contact-type-template"
													                data-template="customerSetting-contact-type-template"
													                data-bind="source: contactTypeDS"></tbody>
												    	</table>
													</div>
											   	</div>
											</div>
										</div>	
					                </div>
					                <div class="tab-pane" id="paymentMethod" role="tabpanel">
					                	<div class="row">
											<div class="col-md-12">
												<div class="hidden-md-up marginBottom">
													<h3 data-bind="text: lang.lang.payment_method"></h2>
												</div>

												<div class="row">
													<div class="col-md-12">
													    <input style="height: 35px;" class="col-md-3 marginRight marginBottom" id="appendedInputButtons" type="text" placeholder="name ..." data-bind="value: paymentMethodName">													    
													    <button class="col-md-2 btn waves-effect waves-light btn-block btn-info  marginBottom" type="button" data-bind="click: addPaymentMethod"><i class="icon-plus marginRight"></i> <span data-bind="text: lang.lang.add_method"></span></button>
													</div>
												</div>

												<div class="row">
													<div class="col-md-12  table-responsive">
												    	<table class="table color-table dark-table">
												    		<thead>
												    			<tr>
												    				<th class="center"><span data-bind="text: lang.lang.name"></span></th>
	            													<th class="center"></th>
												    			</tr>
												    		</thead>
												    		<tbody data-role="listview"
										            			data-edit-template="customerSetting-edit-payment-method-template"
												                data-template="customerSetting-payment-method-template"
												                data-bind="source: paymentMethodDS"></tbody>
												    	</table>
													</div>
											   	</div>
											</div>
										</div>
					                </div>
					                <div class="tab-pane" id="paymentTerms" role="tabpanel">
					                	<div class="row">
											<div class="col-md-12">
												<div class="hidden-md-up marginBottom">
													<h3 data-bind="text: lang.lang.payment_terms"></h2>
												</div>

												<div class="row">
													<div class="col-md-12">
														<input style="height: 35px;" class="col-md-2 marginRight marginBottom" id="appendedInputButtons" type="text" placeholder="name ..." data-bind="value: paymentTermName">
													    <input style="height: 35px;" class="col-md-2 marginRight marginBottom" id="appendedInputButtons" type="text" placeholder="net due ..." data-bind="value: paymentTermNetDue">
													    <input style="height: 35px;" class="col-md-2 marginRight marginBottom" id="appendedInputButtons" type="text" placeholder="period ..." data-bind="value: paymentTermPeriod">
													    <input style="height: 35px;" class="col-md-2 marginRight marginBottom" id="appendedInputButtons" type="text" placeholder="% ..." data-bind="value: paymentTermPercentage">													    
													    <button class="col-md-3 btn waves-effect waves-light btn-block btn-info  marginBottom" type="button" data-bind="click: addPaymentTerm"><i class="icon-plus marginRight"></i> <span data-bind="text: lang.lang.add_term"></span></button>
													</div>
												</div>

												<div class="row">
													<div class="col-md-12  table-responsive">
												    	<table class="table color-table dark-table">
												    		<thead>
												    			<tr>
										            				<th class="center"><span data-bind="text: lang.lang.name"></span></th>
										            				<th class="center"><span data-bind="text: lang.lang.net_due"></span></th>
										            				<th class="center"><span data-bind="text: lang.lang.discount_period"></span></th>
										            				<th class="center"><span data-bind="text: lang.lang.discount_percentage"></span></th>
										            				<th class="center"></th>
										            			</tr>
										            		</thead>
										            		<tbody data-role="listview"
											            			data-edit-template="customerSetting-edit-payment-term-template"
													                data-template="customerSetting-payment-term-template"
													                data-bind="source: paymentTermDS"></tbody>
												    	</table>
													</div>
											   	</div>
											</div>
										</div>
					                </div>
					                <div class="tab-pane" id="customForms" role="tabpanel">
					                	<div class="row">
					                		<div class="col-md-12">
					                			<div class="hidden-md-up marginBottom">
													<h3 data-bind="text: lang.lang.custom_forms"></h2>
												</div>

												<div class="row">
													<div class="col-md-12  table-responsive">

							                			<table class="table color-table dark-table">
										            		<thead>
										            			<tr class="widget-head">
										            				<th class="center"><span data-bind="text: lang.lang.name"></span></th>
										            				<th class="center"><span data-bind="text: lang.lang.form_type"></span></th>
										            				<th class="center"><span data-bind="text: lang.lang.last_edited"></span></th>
										            				<th class="center"><span data-bind="text: lang.lang.action"></span></th>
										            			</tr>
										            		</thead>
										            		<tbody data-role="listview"
																	 data-selectable="false"
													                 data-template="customerSetting-form-template"
													                 data-bind="source: txnTemplateDS">
										            		</tbody>
										            	</table>

										            	<a id="addNew" class="col-md-3 btn waves-effect waves-light btn-block btn-info  marginBottom" data-bind="click: goInvoiceCustom" style="width: 110px; color: #fff"><i></i>Add New</a>
					                		
										           	</div>
										        </div>
					                		</div>
					                	</div>
					                </div>
					                <div class="tab-pane" id="prefixSetting" role="tabpanel">
					                	<div class="row">
											<div class="col-md-12">
												<div class="hidden-md-up marginBottom">
													<h3 data-bind="text: lang.lang.prefix_setting"></h2>
												</div>

												<div class="row">
													<div class="col-md-12  table-responsive">
												    	<table class="table color-table dark-table">
												    		<thead>
										            			<tr >
										            				<th class="center" data-bind="text: lang.lang.type"></th>
										            				<th class="center" data-bind="text: lang.lang.abbr"></th>
										            				<th style="text-align: left;padding-left: 5px;" data-bind="text: lang.lang.name"></th>
										            				<th class="center"><span data-bind="text: lang.lang.action"></span></th>
										            			</tr>
										            		</thead>
										            		<tbody data-role="listview"
																	 data-selectable="false"
													                 data-template="accountSetting-prefix-template"
													                 data-bind="source: prefixDS"></tbody>
												    	</table>
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
</script>
<script id="customerSetting-contact-type-template" type="text/x-kendo-tmpl">
    <tr>
    	<td>
    		#:name#
   		</td>
   		<td style="text-align: center;">
    		#:abbr#
   		</td>
   		<td style="text-align: center;">
    		#if(is_company=="1"){#
    			Yes
    		#}else{#
    			No
    		#}#
   		</td>
   		<td style="text-align: center;">
   			<div class="edit-buttons">
		        <a class="k-button btn-info k-edit-button" href="\\#"><span class="k-icon k-i-edit"></span></a>
		        #if(is_system=="0"){#
			        <a class="k-button btn-info k-delete-button" href="\\#"><span class="k-icon k-i-delete"></span></a>
		        #}#
		        <a class="k-button btn-info" href="\#/customer/0/#=id#"><span data-bind="text: lang.lang.pattern"></span></a>
		   	</div>
   		</td>
   	</tr>
</script>
<script id="customerSetting-edit-contact-type-template" type="text/x-kendo-tmpl">
    <div class="product-view k-widget">
        <dl>
            <dd>
                <input type="text" class="k-textbox" data-bind="value:name" name="ProductName" required="required" validationMessage="required" />
                <span data-for="ProductName" class="k-invalid-msg"></span>
            </dd>
        </dl>
        <dl>
            <dd>
                <input type="text" class="k-textbox" data-bind="value:abbr" name="abbr" required="required" validationMessage="required" />
                <span data-for="abbr" class="k-invalid-msg"></span>
            </dd>
        </dl>
        <dl>
            <dd>
                <select data-bind="value: is_company" >
	                <option value="0"><span data-bind="text: lang.lang.not_a_company"></span></option>
	                <option value="1"><span data-bind="text: lang.lang.it_is_a_company"></span></option>
	            </select>
            </dd>
        </dl>
        <div class="edit-buttons">
            <a class="k-button btn-info k-update-button" href="\\#"><span class="k-icon k-i-check"></span></a>
            <a class="k-button btn-info k-cancel-button" href="\\#"><span class="k-icon k-i-cancel"></span></a>
        </div>
    </div>
</script>
<script id="customerSetting-payment-method-template" type="text/x-kendo-tmpl">
    <tr>
    	<td>
    		#:name#
   		</td>
   		<td style="text-align: center;">
   			<div class="edit-buttons">
		        <a class="k-button btn-info k-edit-button" href="\\#"><span class="k-icon k-i-edit"></span></a>
		        #if(is_system=="0"){#
			        <a class="k-button btn-info k-delete-button" href="\\#"><span class="k-icon k-i-delete"></span></a>
		        #}#
		   	</div>
   		</td>
   	</tr>
</script>
<script id="customerSetting-edit-payment-method-template" type="text/x-kendo-tmpl">
    <div class="product-view k-widget">
        <dl>
            <dd>
                <input type="text" class="k-textbox" data-bind="value:name" name="ProductName" required="required" validationMessage="required" />
                <span data-for="ProductName" class="k-invalid-msg"></span>
            </dd>
        </dl>
        <div class="edit-buttons">
            <a class="k-button btn-info k-update-button" href="\\#"><span class="k-icon k-i-check"></span></a>
            <a class="k-button btn-info k-cancel-button" href="\\#"><span class="k-icon k-i-cancel"></span></a>
        </div>
    </div>
</script>
<script id="customerSetting-payment-term-template" type="text/x-kendo-tmpl">
    <tr>
    	<td>
    		#:name#
   		</td>
   		<td style="text-align: center;">
    		#:net_due#
   		</td>
   		<td style="text-align: center;">
    		#:discount_period#
   		</td>
   		<td style="text-align: center;">
    		#:discount_percentage#
   		</td>
   		<td style="text-align: center;">
   			<div class="edit-buttons">
		        <a class="k-button btn-info k-edit-button" href="\\#"><span class="k-icon k-i-edit"></span></a>
		        #if(is_system=="0"){#
			        <a class="k-button btn-info k-delete-button" href="\\#"><span class="k-icon k-i-delete"></span></a>
		        #}#
		   	</div>
   		</td>
   	</tr>
</script>
<script id="customerSetting-edit-payment-term-template" type="text/x-kendo-tmpl">
    <div class="product-view k-widget">
        <dl>
            <dd>
                <input type="text" class="k-textbox" data-bind="value:name" name="ProductName" required="required" validationMessage="required" />
                <span data-for="ProductName" class="k-invalid-msg"></span>
            </dd>
            <dd>
                <input type="text" class="k-textbox" data-bind="value:net_due" name="netDue" required="required" validationMessage="required" />
                <span data-for="netDue" class="k-invalid-msg"></span>
            </dd>
            <dd>
                <input type="text" class="k-textbox" data-bind="value:discount_period" name="period" required="required" validationMessage="required" />
                <span data-for="period" class="k-invalid-msg"></span>
            </dd>
            <dd>
                <input type="text" class="k-textbox" data-bind="value:discount_percentage" name="percentage" required="required" validationMessage="required" />
                <span data-for="percentage" class="k-invalid-msg"></span>
            </dd>
        </dl>
        <div class="edit-buttons">
            <a class="k-button btn-info k-update-button" href="\\#"><span class="k-icon k-i-check"></span></a>
            <a class="k-button btn-info k-cancel-button" href="\\#"><span class="k-icon k-i-cancel"></span></a>
        </div>
    </div>
</script>
<script id="customerSetting-form-template" type="text/x-kendo-template">
	<tr>
		<td >
			#if( status == 2){#
				#=name#
			#}else{#
				<a style="text-align: left;" href="\\#/invoice_custom/#= id # "> #=name#  </a>
			#}#
		</td>
		<td style="text-align: left; padding-left: 10px!important;">
			#= type.replace("_"," ")#
		</td>
		<td style="text-align: left; padding-left: 10px!important;"> #if( updated_at ){ #
				#=kendo.toString(new Date(updated_at),"D")#
			 #}else{ #
			 	#=kendo.toString(new Date(created_at),"D")#
			 #}#
		</td>
		<td style="text-align: center;">
			#if( status == 0){ #
			<a class="k-button btn-info glyphicons pencil" href="/c2/rrd\#/invoice_custom/#=id#"><span class="k-icon k-i-edit"></span></a>
			<a data-bind="click: deleteForm" class="k-button btn-info k-delete-button"><span class="k-icon k-i-delete"></span></a>			
			# } #
		</td>
	</tr>
</script>
<!-- Customer Group -->
<script id="customerGroup" type="text/x-kendo-template">
	<div class="page-wrapper ">
        <div class="container-fluid">
        	<div class="row marginTop15 sale">
                <div class="col-md-12">
                    <div class="card">
                    	<div class="btn-close" onclick="javascript:window.history.back()"><i class="ti-close"></i></div>
                        <div class="card-body" >
                        	<h2>CUSTOMER GROUP</h2>
                        	<div class="row">
                        		<div class="col-md-6">
                        			<div class="row">
                        				<div class="col-md-6">
                        					<input type="text" class="k-textbox"
												data-bind="value: textSearch"
												placeholder="Number / Name... " style="height: 35px; width: 89%; margin-bottom: 8px;"/>

											<input data-role="dropdownlist" class="marginBottom"
								                   data-value-primitive="true"
								                   data-text-field="name"
								                   data-value-field="id"
								                   data-auto-bind="false"
								                   data-bind="value: contact_type_id,
								                              source: contactTypeDS"
								                   data-option-label="Select Type..."
								                   style="width: 75%;" />

								            <button class="k-button btn-info" type="button" data-role="button" data-bind="click: search"><i class="ti-search"></i></button>
                        				</div>
                        				<div class="col-md-6">
                        					<input type="text" class="k-textbox"
												data-bind="value: obj.name"
												placeholder="Group Name... " style="height: 35px; width: 100%; margin-bottom: 8px;"/>

											<div style="margin-bottom: 15px; float: right;">
												<span class="k-button btn-info" data-bind="click: save">Save</span>
												<span class="k-button btn-info" data-bind="click: cancel">Cancel</span>
											</div>
                        				</div>
                        			</div>

                        			<div class="row">
                        				<div class="col-md-6">
                        					<select id="listbox1" data-role="listbox" class="marginBottom"
								                data-text-field="name"
								                data-value-field="id"
								                data-toolbar='{
								                	tools: ["moveUp", "moveDown", "transferTo", "transferFrom", "transferAllTo", "transferAllFrom", "remove"]
								            	}'
								                data-connect-with="listbox2"
								                data-auto-bind="false"
								                data-bind="source: contactDS" style="width: 100%; min-height: 550px;">
								            </select>
                        				</div>
                        				<div class="col-md-6">
                        					<select id="listbox2" data-role="listbox"
								                data-connect-with="listbox1"
								                data-text-field="name"
								                data-value-field="id"
								                data-auto-bind="false"
								                data-bind="source: obj.contacts"
								                style="width: 100%; min-height: 550px;">
								            </select>
                        				</div>
                        			</div>

                        			<div id="pager" class="k-pager-wrap" 
				            		 data-role="pager"
							    	 data-auto-bind="false"
						             data-bind="source: contactDS"></div>
                        		</div>
                        		<div class="col-md-6 table-responsive">
                        			<table class="table color-table dark-table">
								        <thead>
								            <tr>
								                <th><span data-bind="text: lang.lang.name"></span></th>
								                <th><span>Number of Customer</span></th>
								                <th></th>
								            </tr>
								        </thead>
								        <tbody data-role="listview"
								        		data-template="customerGroup-template"
								        		data-auto-bind="false"
								        		data-bind="source: dataSource"></tbody>
								    </table>

						            <div id="ntf1" data-role="notification"></div>
                        		</div>
                        	</div>
                       	</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</script>
<script id="customerGroup-template" type="text/x-kendo-tmpl">
	<tr data-uid="#: uid #">
		<td>#=name#</td>
		<td class="right">#=contacts.length#</td>
		<td>
			<span class="k-button btn-info" data-bind="click: edit">View/Edit</span>
		</td>
    </tr>
</script>
<!-- End -->


<!-- VENDOR SETTINGS -->
<script id="vendorSetting" type="text/x-kendo-template">
	<div class="page-wrapper ">
        <div class="container-fluid">
        	<div class="row marginTop15 sale">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body" >
                        	<h2 data-bind="text: lang.lang.general_supplier_setting"></h2>
                        	<div class="vtabs" style="width: 100%;">
	                        	<ul class="nav nav-tabs tabs-vertical" role="tablist" style="width: 17%; float: left;">
									<li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#supplierType" id=""><span class="hidden-sm-up"><i class="ti-layout-grid2-thumb"></i></span> <span class="hidden-xs-down" data-bind="text: lang.lang.supplier_type"></span></a> </li>									
								    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#supplierPaymentMethod"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down" data-bind="text: lang.lang.payment_method"></span></a> </li>
								    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#supplierPaymentTerms"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down" data-bind="text: lang.lang.payment_terms"></span></a> </li>
								    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#supplierCustomForms"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down" data-bind="text: lang.lang.custom_forms"></span></a> </li>
								    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#supplierPrefixSetting"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down" data-bind="text: lang.lang.prefix_setting"></span></a> </li>
							    </ul>
				                <div class="tab-content" style="float: left; width: 83%; padding: 10px;">
					                <div class="tab-pane active" id="supplierType" role="tabpanel">
					                	<div class="row">
											<div class="col-md-12">
												<div class="hidden-md-up marginBottom">
													<h3 data-bind="text: lang.lang.supplier_type"></h2>
												</div>

												<div class="row">
													<div class="col-md-12">
													    <input style="height: 35px;" class="col-md-3 marginRight marginBottom" id="appendedInputButtons" type="text" placeholder="input customer type ..." data-bind="value: contactTypeName">
													    <input style="height: 35px;" class="col-md-3 marginRight marginBottom" id="appendedInputButtons" type="text" placeholder="input abbr ..." data-bind="value: contactTypeAbbr">
													    <select style="height: 35px;" class="col-md-3 marginRight marginBottom" id="appendedInputButtons" data-bind="value: contactTypeCompany" >
											                <option value="0"><span data-bind="text: lang.lang.not_a_company"></span></option>
											                <option value="1"><span data-bind="text: lang.lang.it_is_a_company"></span></option>
											            </select>
													    <button class="col-md-2 btn waves-effect waves-light btn-block btn-info  marginBottom" type="button" data-bind="click: addContactType"><i class="icon-plus marginRight"></i> <span data-bind="text: lang.lang.add_type"></span></button>
													</div>
												</div>

												<div class="row">
													<div class="col-md-12  table-responsive">
												    	<table class="table color-table dark-table">
												    		<thead>
												    			<tr>
												    				<th class="center"><span data-bind="text: lang.lang.type"></span></th>
												    				<th class="center"><span data-bind="text: lang.lang.abbr"></span></th>
												    				<th class="center"><span data-bind="text: lang.lang.is_company"></span></th>
												    				<th class="center"></th>
												    			</tr>
												    		</thead>
												    		<tbody data-role="listview"
												    				data-auto-bind="false"
												        			data-edit-template="customerSetting-edit-contact-type-template"
													                data-template="customerSetting-contact-type-template"
													                data-bind="source: contactTypeDS"></tbody>
												    	</table>
													</div>
											   	</div>
											</div>
										</div>	
					                </div>
					                <div class="tab-pane" id="supplierPaymentMethod" role="tabpanel">
					                	<div class="row">
											<div class="col-md-12">
												<div class="hidden-md-up marginBottom">
													<h3 data-bind="text: lang.lang.payment_method"></h2>
												</div>

												<div class="row">
													<div class="col-md-12">
													    <input style="height: 35px;" class="col-md-3 marginRight marginBottom" id="appendedInputButtons" type="text" placeholder="name ..." data-bind="value: paymentMethodName">													    
													    <button class="col-md-2 btn waves-effect waves-light btn-block btn-info  marginBottom" type="button" data-bind="click: addPaymentMethod"><i class="icon-plus marginRight"></i> <span data-bind="text: lang.lang.add_method"></span></button>
													</div>
												</div>

												<div class="row">
													<div class="col-md-12  table-responsive">
												    	<table class="table color-table dark-table">
												    		<thead>
												    			<tr>
												    				<th class="center"><span data-bind="text: lang.lang.name"></span></th>
	            													<th class="center"></th>
												    			</tr>
												    		</thead>
												    		<tbody data-role="listview"
										            			data-edit-template="customerSetting-edit-payment-method-template"
												                data-template="customerSetting-payment-method-template"
												                data-bind="source: paymentMethodDS"></tbody>
												    	</table>
													</div>
											   	</div>
											</div>
										</div>
					                </div>
					                <div class="tab-pane" id="supplierPaymentTerms" role="tabpanel">
					                	<div class="row">
											<div class="col-md-12">
												<div class="hidden-md-up marginBottom">
													<h3 data-bind="text: lang.lang.payment_terms"></h2>
												</div>

												<div class="row">
													<div class="col-md-12">
														<input style="height: 35px;" class="col-md-2 marginRight marginBottom" id="appendedInputButtons" type="text" placeholder="name ..." data-bind="value: paymentTermName">
													    <input style="height: 35px;" class="col-md-2 marginRight marginBottom" id="appendedInputButtons" type="text" placeholder="net due ..." data-bind="value: paymentTermNetDue">
													    <input style="height: 35px;" class="col-md-2 marginRight marginBottom" id="appendedInputButtons" type="text" placeholder="period ..." data-bind="value: paymentTermPeriod">
													    <input style="height: 35px;" class="col-md-2 marginRight marginBottom" id="appendedInputButtons" type="text" placeholder="% ..." data-bind="value: paymentTermPercentage">													    
													    <button class="col-md-3 btn waves-effect waves-light btn-block btn-info  marginBottom" type="button" data-bind="click: addPaymentTerm"><i class="icon-plus marginRight"></i> <span data-bind="text: lang.lang.add_term"></span></button>
													</div>
												</div>

												<div class="row">
													<div class="col-md-12  table-responsive">
												    	<table class="table color-table dark-table">
												    		<thead>
												    			<tr>
										            				<th class="center"><span data-bind="text: lang.lang.name"></span></th>
										            				<th class="center"><span data-bind="text: lang.lang.net_due"></span></th>
										            				<th class="center"><span data-bind="text: lang.lang.discount_period"></span></th>
										            				<th class="center"><span data-bind="text: lang.lang.discount_percentage"></span></th>
										            				<th class="center"></th>
										            			</tr>
										            		</thead>
										            		<tbody data-role="listview"
											            			data-edit-template="customerSetting-edit-payment-term-template"
													                data-template="customerSetting-payment-term-template"
													                data-bind="source: paymentTermDS"></tbody>
												    	</table>
													</div>
											   	</div>
											</div>
										</div>
					                </div>
					                <div class="tab-pane" id="supplierCustomForms" role="tabpanel">
					                	<div class="row">
					                		<div class="col-md-12">
					                			<div class="hidden-md-up marginBottom">
													<h3 data-bind="text: lang.lang.custom_forms"></h2>
												</div>

												<div class="row">
													<div class="col-md-12  table-responsive">

							                			<table class="table color-table dark-table">
										            		<thead>
										            			<tr class="widget-head">
										            				<th class="center"><span data-bind="text: lang.lang.name"></span></th>
										            				<th class="center"><span data-bind="text: lang.lang.form_type"></span></th>
										            				<th class="center"><span data-bind="text: lang.lang.last_edited"></span></th>
										            				<th class="center"><span data-bind="text: lang.lang.action"></span></th>
										            			</tr>
										            		</thead>
										            		<tbody data-role="listview"
																	 data-selectable="false"
													                 data-template="customerSetting-form-template"
													                 data-bind="source: txnTemplateDS">
										            		</tbody>
										            	</table>

										            	<a id="addNew" class="col-md-3 btn waves-effect waves-light btn-block k-button btn-info  marginBottom" data-bind="click: goInvoiceCustom" style="width: 110px; color: #fff"><i></i>Add New</a>
					                		
										           	</div>
										        </div>
					                		</div>
					                	</div>
					                </div>
					                <div class="tab-pane" id="supplierPrefixSetting" role="tabpanel">
					                	<div class="row">
											<div class="col-md-12">
												<div class="hidden-md-up marginBottom">
													<h3 data-bind="text: lang.lang.prefix_setting"></h2>
												</div>

												<div class="row">
													<div class="col-md-12  table-responsive">
												    	<table class="table color-table dark-table">
												    		<thead>
										            			<tr >
										            				<th class="center" data-bind="text: lang.lang.type"></th>
										            				<th class="center" data-bind="text: lang.lang.abbr"></th>
										            				<th style="text-align: left;padding-left: 5px;" data-bind="text: lang.lang.name"></th>
										            				<th class="center"><span data-bind="text: lang.lang.action"></span></th>
										            			</tr>
										            		</thead>
										            		<tbody data-role="listview"
																	 data-selectable="false"
													                 data-template="accountSetting-prefix-template"
													                 data-bind="source: prefixDS"></tbody>
												    	</table>
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
</script>
<script id="vendorSetting-contact-type-template" type="text/x-kendo-tmpl">
    <tr>
    	<td>#:name#</td>
    	<td>#:abbr#</td>
   		<td style="text-align: center;">
   			<div class="edit-buttons">
		        <a class="k-button btn-info k-edit-button" href="\\#"><span class="k-icon k-i-edit"></span></a>
		        #if(is_system=="0"){#
			        <a class="k-button k-delete-button" href="\\#"><span class="k-icon k-i-delete"></span></a>
		        #}#
		        <a class="k-button btn-info" href="\#/vendor/0/#=id#"><span data-bind="text: lang.lang.pattern"></span></a>
		   	</div>
   		</td>
   	</tr>
</script>
<script id="vendorSetting-edit-contact-type-template" type="text/x-kendo-tmpl">
    <div class="product-view k-widget">
        <dl>
            <dd>
                <input type="text" class="k-textbox" data-bind="value:name" name="ProductName" required="required" validationMessage="required" />
                <span data-for="ProductName" class="k-invalid-msg"></span>
            </dd>
        </dl>
        <dl>
            <dd>
                <input type="text" class="k-textbox" data-bind="value:abbr" name="ProductAbbr" required="required" validationMessage="required" />
                <span data-for="ProductAbbr" class="k-invalid-msg"></span>
            </dd>
        </dl>
        <div class="edit-buttons">
            <a class="k-button btn-info k-update-button" href="\\#"><span class="k-icon k-i-check"></span></a>
            <a class="k-button btn-info k-cancel-button" href="\\#"><span class="k-icon k-i-cancel"></span></a>
        </div>
    </div>
</script>
<script id="vendorSetting-payment-method-template" type="text/x-kendo-tmpl">
    <tr>
    	<td>
    		#:name#
   		</td>
   		<td style="text-align: center;">
   			<div class="edit-buttons">
		        <a class="k-button btn-info k-edit-button" href="\\#"><span class="k-icon k-i-edit"></span></a>
		        #if(is_system=="0"){#
			        <a class="k-button btn-info k-delete-button" href="\\#"><span class="k-icon k-i-delete"></span></a>
		        #}#
		   	</div>
   		</td>
   	</tr>
</script>
<script id="vendorSetting-edit-payment-method-template" type="text/x-kendo-tmpl">
    <div class="product-view k-widget">
        <dl>
            <dd>
                <input type="text" class="k-textbox" data-bind="value:name" name="ProductName" required="required" validationMessage="required" />
                <span data-for="ProductName" class="k-invalid-msg"></span>
            </dd>
        </dl>
        <div class="edit-buttons">
            <a class="k-button btn-info k-update-button" href="\\#"><span class="k-icon k-i-check"></span></a>
            <a class="k-button btn-info k-cancel-button" href="\\#"><span class="k-icon k-i-cancel"></span></a>
        </div>
    </div>
</script>
<script id="vendorSetting-payment-term-template" type="text/x-kendo-tmpl">
    <tr>
    	<td>
    		#:name#
   		</td>
   		<td style="text-align: center;">
    		#:net_due#
   		</td>
   		<td style="text-align: center;">
    		#:discount_period#
   		</td>
   		<td style="text-align: center;">
    		#:discount_percentage#
   		</td>
   		<td>
   			<div class="edit-buttons">
		        <a class="k-button btn-info k-edit-button" href="\\#"><span class="k-icon k-i-edit"></span></a>
		        #if(is_system=="0"){#
			        <a class="k-button btn-info k-delete-button" href="\\#"><span class="k-icon k-i-delete"></span></a>
		        #}#
		   	</div>
   		</td>
   	</tr>
</script>
<script id="vendorSetting-edit-payment-term-template" type="text/x-kendo-tmpl">
    <div class="product-view k-widget">
        <dl>
            <dd>
                <input type="text" class="k-textbox" data-bind="value:name" name="ProductName" required="required" validationMessage="required" />
                <span data-for="ProductName" class="k-invalid-msg"></span>
            </dd>
            <dd>
                <input type="text" class="k-textbox" data-bind="value:net_due" name="netDue" required="required" validationMessage="required" />
                <span data-for="netDue" class="k-invalid-msg"></span>
            </dd>
            <dd>
                <input type="text" class="k-textbox" data-bind="value:discount_period" name="period" required="required" validationMessage="required" />
                <span data-for="period" class="k-invalid-msg"></span>
            </dd>
            <dd>
                <input type="text" class="k-textbox" data-bind="value:discount_percentage" name="percentage" required="required" validationMessage="required" />
                <span data-for="percentage" class="k-invalid-msg"></span>
            </dd>
        </dl>
        <div class="edit-buttons">
            <a class="k-button btn-info k-update-button" href="\\#"><span class="k-icon k-i-check"></span></a>
            <a class="k-button btn-info k-cancel-button" href="\\#"><span class="k-icon k-i-cancel"></span></a>
        </div>
    </div>
</script>


<!-- INVENTORY SETTINGS -->
<script id="itemSetting" type="text/x-kendo-template">
	<div class="page-wrapper ">
        <div class="container-fluid">
        	<div class="row marginTop15 sale">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body" >
                        	<h2 data-bind="text: lang.lang.products_services_setting"></h2>
                        	<div class="vtabs" style="width: 100%;">
	                        	<ul class="nav nav-tabs tabs-vertical" role="tablist" style="width: 17%; float: left;">
									<li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#itemCategory"><span class="hidden-sm-up"><i class="ti-layout-grid2-thumb"></i></span> <span class="hidden-xs-down" data-bind="text: lang.lang.category"></span></a> </li>
								    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#itemGroup"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down" data-bind="text: lang.lang.group"></span></a> </li>
								    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#itemUomCategory"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down" data-bind="">UOM Category</span></a> </li>
								    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#itemUom"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down" data-bind="text: lang.lang.uom"></span></a> </li>								    
								    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#itemBrand"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down" data-bind="text: lang.lang.brand"></span></a> </li>
								    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#itemPrefixSetting"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down" data-bind="text: lang.lang.prefix_setting"></span></a> </li>
								    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#/variants"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down" data-bind="">Variants</span></a> </li>
								    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#/warehouses"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down" data-bind="">Location</span></a> </li>
								    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#/employee_item_location"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down" data-bind="">Employee To Item Location</span></a> </li>
							    </ul>
				                <div class="tab-content" style="float: left; width: 83%; padding: 10px;">
					                <div class="tab-pane active" id="itemCategory" role="tabpanel">
					                	<div class="row">
											<div class="col-md-12">
												<div class="hidden-md-up marginBottom">
													<h3 data-bind="text: lang.lang.category"></h2>
												</div>

												<div class="row">
													<div class="col-md-12">
													    <input style="height: 35px;" class="col-md-3 marginRight marginBottom" id="appendedInputButtons" type="text" placeholder="Category Name..." data-bind="value: category_name">
													    <input style="height: 35px;" class="col-md-3 marginRight marginBottom" id="appendedInputButtons" type="text" placeholder="Category Abbr..." data-bind="value: category_abbr">
													    <input class="col-md-3 marginRight marginBottom" id="appendedInputButtons"
												    	   data-role="dropdownlist"
										                   data-value-primitive="true"
										                   data-auto-bind="false"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: category_item_type_id,
										                              source: itemTypeDS" />
													    <button style="width: 173px;" class="btn waves-effect waves-light btn-block btn-info  marginBottom" type="button" data-bind="click: addCategory"><i class="icon-plus marginRight"></i> <span data-bind="text: lang.lang.add_new_category"></span></button>
													</div>
												</div>

												<div class="row">
													<div class="col-md-12  table-responsive">
												    	<table class="table color-table dark-table">
												    		<thead>
	            												<tr>
										            				<th data-bind="text: lang.lang.name"></th>
										            				<th data-bind="text: lang.lang.abbr"></th>
										            				<th data-bind="text: lang.lang.type"></th>
										            				<th></th>
										            			</tr>
										            		</thead>
										            		<tbody data-role="listview"
											            			data-edit-template="itemSetting-edit-category-template"
													                data-template="itemSetting-category-template"
													                data-auto-bind="false"
													                data-bind="source: categoryDS"></tbody>
												    	</table>
													</div>
											   	</div>
											</div>
										</div>	
					                </div>
					                <div class="tab-pane" id="itemGroup" role="tabpanel">
					                	<div class="row">
											<div class="col-md-12">
												<div class="hidden-md-up marginBottom">
													<h3 data-bind="text: lang.lang.group"></h2>
												</div>

												<div class="row">
													<div class="col-md-12">
													    <input style="height: 35px;" class="col-md-3 marginRight marginBottom" id="appendedInputButtons" type="text" placeholder="New Group Name..." data-bind="value: item_group_name">
													    <input style="height: 35px;" class="col-md-3 marginRight marginBottom" id="appendedInputButtons" type="text" placeholder="Group Abbr..." data-bind="value: item_group_abbr">
													    <input class="col-md-3 marginRight marginBottom" id="appendedInputButtons"
											            	   data-role="dropdownlist"
									            			   data-option-label="(--- Select Category ---)"
											                   data-value-primitive="true"
											                   data-auto-bind="false"
											                   data-text-field="name"
											                   data-value-field="id"
											                   data-bind="value: item_group_category_id,
											                              source: categoryDS"/>
													    <button style="width: 153px;" class="btn waves-effect waves-light btn-block btn-info  marginBottom" type="button" data-bind="click: addItemGroup"><i class="icon-plus marginRight"></i> <span data-bind="text: lang.lang.add_new_group"></span></button>
													</div>
												</div>

												<div class="row">
													<div class="col-md-12  table-responsive">
												    	<table class="table color-table dark-table">
												    		<thead>
										            			<tr>
										            				<th data-bind="text: lang.lang.name"></th>
										            				<th data-bind="text: lang.lang.abbr"></th>
										            				<th data-bind="text: lang.lang.category"></th>
										            				<th></th>
										            			</tr>
										            		</thead>
										            		<tbody data-role="listview"
											            			data-edit-template="itemSetting-edit-item-group-template"
													                data-template="itemSetting-item-group-template"
													                data-bind="source: itemGroupDS"></tbody>
												    	</table>
													</div>
											   	</div>
											</div>
										</div>
					                </div>
					                <div class="tab-pane" id="itemUomCategory" role="tabpanel">
					                	<div class="row">
											<div class="col-md-12">
												Uom Category
											</div>
										</div>
					                </div>
					                <div class="tab-pane" id="itemUom" role="tabpanel">
					                	<div class="row">
											<div class="col-md-12">
												Uom
											</div>
										</div>
					                </div>
					                <div class="tab-pane" id="itemBrand" role="tabpanel">
					                	<div class="row">
											<div class="col-md-12">
												Brand
											</div>
										</div>
					                </div>
					                <div class="tab-pane" id="itemPrefixSetting" role="tabpanel">
					                	<div class="row">
											<div class="col-md-12">
												<div class="hidden-md-up marginBottom">
													<h3 data-bind="text: lang.lang.prefix_setting"></h2>
												</div>

												<div class="row">
													<div class="col-md-12  table-responsive">
												    	<table class="table color-table dark-table">
												    		<thead>
										            			<tr >
										            				<th class="center" data-bind="text: lang.lang.type"></th>
										            				<th class="center" data-bind="text: lang.lang.abbr"></th>
										            				<th style="text-align: left;padding-left: 5px;" data-bind="text: lang.lang.name"></th>
										            				<th class="center"><span data-bind="text: lang.lang.action"></span></th>
										            			</tr>
										            		</thead>
										            		<tbody data-role="listview"
																	 data-selectable="false"
													                 data-template="accountSetting-prefix-template"
													                 data-bind="source: prefixDS"></tbody>
												    	</table>
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
</script>
<script id="itemSetting-category-template" type="text/x-kendo-tmpl">
    <tr>
   		<td>
    		#:name#
   		</td>
   		<td style="text-align:center; ">
    		#:abbr#
   		</td>
   		<td style="text-align:center; ">
    		#:item_type.length>0 ? item_type[0].name : ""#
   		</td>
   		<td style="text-align:center; ">
   			<div class="edit-buttons">
		        <a class="k-button btn-info k-edit-button" href="\\#"><span class="k-icon k-i-edit"></span></a>
		        #if(is_system=="0"){#
			        <a class="k-button btn-info k-delete-button" href="\\#"><span class="k-icon k-i-delete"></span></a>
		        #}#

		        #if(id=="4" || id=="5" || id=="6"){#

		        #}else{#
		        	<span class="k-button btn-info" data-bind="click: goPattern"><span data-bind="text: lang.lang.pattern"></span></span>
		   		#}#
		   	</div>
   		</td>
   	</tr>
</script>
<script id="itemSetting-edit-category-template" type="text/x-kendo-tmpl">
    <div class="product-view k-widget">
        <dl>
            <dd>
                <input type="text" class="k-textbox" data-bind="value:name" name="ProductName" required="required" validationMessage="required" />
                <span data-for="ProductName" class="k-invalid-msg"></span>
            </dd>
            <dd>
                <input type="text" class="k-textbox" data-bind="value:abbr" name="abbr" required="required" validationMessage="required" />
                <span data-for="abbr" class="k-invalid-msg"></span>
            </dd>
            <dd>
            <input data-role="dropdownlist"
                   data-value-primitive="true"
                   data-text-field="name"
                   data-value-field="id"
                   data-bind="value: item_type_id,
                              source: itemTypeDS" />
            </dd>
        </dl>
        <div class="edit-buttons">
            <a class="k-button btn-info k-update-button" href="\\#"><span class="k-icon k-i-check"></span></a>
            <a class="k-button btn-info k-cancel-button" href="\\#"><span class="k-icon k-i-cancel"></span></a>
        </div>
    </div>
</script>
<script id="itemSetting-item-group-template" type="text/x-kendo-tmpl">
    <tr>
   		<td>
    		#:name#
   		</td>
   		<td style="text-align: center; ">
    		#:abbr#
   		</td>
   		<td style="text-align: center; ">
    		#:category.length>0 ? category[0].name : ""#
   		</td>
   		<td style="text-align: center; ">
        	<div class="edit-buttons">
	        	<a class="k-button btn-info k-edit-button" href="\\#"><span class="k-icon k-i-edit"></span></a>
	        	<a class="k-button btn-info k-delete-button" href="\\#"><span class="k-icon k-i-delete"></span></a>
        	</div>
   		</td>
   	</tr>
</script>
<script id="itemSetting-edit-item-group-template" type="text/x-kendo-tmpl">
    <div class="product-view k-widget">
        <dl>
        	<dd>
                <input data-role="dropdownlist"
        			   data-option-label="(--- Select ---)"
	                   data-value-primitive="true"
	                   data-auto-bind="false"
	                   data-text-field="name"
	                   data-value-field="id"
	                   data-bind="value: category_id,
	                              source: categoryDS"/>
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
            <a class="k-button btn-info k-update-button" href="\\#"><span class="k-icon k-i-check"></span></a>
            <a class="k-button btn-info k-cancel-button" href="\\#"><span class="k-icon k-i-cancel"></span></a>
        </div>
    </div>
</script>
<script id="itemSetting-measurement-category-template" type="text/x-kendo-tmpl">
    <tr>
    	<td>
    		#:name#
   		</td>
   		<td style="text-align: center;">
   			<div class="edit-buttons">
		        <a class="k-button k-edit-button" href="\\#"><span class="k-icon k-i-edit"></span></a>
		        #if(is_system=="0"){#
			        <a class="k-button btn-info k-delete-button" href="\\#"><span class="k-icon k-i-delete"></span></a>
		        #}#
		   	</div>
   		</td>
   	</tr>
</script>
<script id="itemSetting-edit-measurement-category-template" type="text/x-kendo-tmpl">
    <div class="product-view k-widget">
        <dl>
            <dd>
                <input type="text" class="k-textbox" data-bind="value:name" name="name" required="required" validationMessage="required" />
                <span data-for="name" class="k-invalid-msg"></span>
            </dd>
        </dl>
        <div class="edit-buttons">
            <a class="k-button btn-info k-update-button" href="\\#"><span class="k-icon k-i-check"></span></a>
            <a class="k-button btn-info k-cancel-button" href="\\#"><span class="k-icon k-i-cancel"></span></a>
        </div>
    </div>
</script>
<script id="itemSetting-measurement-template" type="text/x-kendo-tmpl">
    <tr>
    	<td>
    		#:name#
   		</td>
   		<td>
    		#:category#
   		</td>
   		<td style="text-align: center;">
   			<div class="edit-buttons">
		        <a class="k-button k-edit-button" href="\\#"><span class="k-icon k-i-edit"></span></a>
		        #if(is_system=="0"){#
			        <a class="k-button btn-info k-delete-button" href="\\#"><span class="k-icon k-i-delete"></span></a>
		        #}#
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
            <dd>
                <input name="category"
                   data-role="dropdownlist"
                   data-value-primitive="true"
                   data-text-field="name"
                   data-value-field="id"
                   data-bind="value: measurement_category_id,
                              source: measurementCategoryDS"
                   required="required" validationMessage="required" />
                <span data-for="category" class="k-invalid-msg"></span>
            </dd>
        </dl>
        <div class="edit-buttons">
            <a class="k-button btn-info k-update-button" href="\\#"><span class="k-icon k-i-check"></span></a>
            <a class="k-button btn-info k-cancel-button" href="\\#"><span class="k-icon k-i-cancel"></span></a>
        </div>
    </div>
</script>
<script id="itemSetting-brand-template" type="text/x-kendo-tmpl">
    <tr>
    	<td>
    		 #:code#
   		</td>
   		<td style="text-align: center; ">
    		 #:name#
   		</td>
   		<td style="text-align: center; ">
    		 #:abbr#
   		</td>
   		<td style="text-align: center; ">
   			<div class="edit-buttons">
	        	<a class="k-button btn-info k-edit-button" href="\\#"><span class="k-icon k-i-edit"></span></a>
	        	<a class="k-button btn-info k-delete-button" href="\\#"><span class="k-icon k-i-delete"></span></a>
		   	</div>
   		</td>
   	</tr>
</script>
<script id="itemSetting-edit-brand-template" type="text/x-kendo-tmpl">
    <div class="product-view k-widget">
        <dl>
        	<dd>
                <input data-role="dropdownlist"
        			   data-option-label="(--- Select ---)"
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
            <a class="k-button btn-info k-update-button" href="\\#"><span class="k-icon k-i-check"></span></a>
            <a class="k-button btn-info k-cancel-button" href="\\#"><span class="k-icon k-i-cancel"></span></a>
        </div>
    </div>
</script>
<script id="serviceSetting" type="text/x-kendo-template">
	<span class="pull-right glyphicons no-js remove_2"
			onclick="javascript:window.history.back()"><i></i></span>

	<h2 data-bind="text: lang.lang.general_service_setting"></h2>

	<br>

	<div class="widget widget-tabs widget-tabs-double widget-tabs-vertical row-fluid row-merge widget-tabs-gray">

	    <!-- Tabs Heading -->
	    <div class="widget-head span3">
	        <ul>
	            <li class="active"><a href="#tab1-1" class="glyphicons bookmark" data-toggle="tab"><i></i><span class="strong"><span data-bind="text: lang.lang.category"></span></span></a>
	            </li>
	            <li><a href="#tab2-1" class="glyphicons tag" data-toggle="tab"><i></i><span class="strong"><span data-bind="text: lang.lang.group"></span></span></a>
	            </li>
	            <li><a href="#tab3-1" class="glyphicons ruller" data-toggle="tab"><i></i><span class="strong"><span data-bind="text: lang.lang.measurement"></span></span></a>
	            </li>
	        </ul>
	    </div>
	    <!-- // Tabs Heading END -->

	    <div class="widget-body span9">
	        <div class="tab-content">

	            <!-- Tab Category content -->
	            <div class="tab-pane active" id="tab1-1">
		            <div class="input-append">
					    <input class="span3" id="appendedInputButtons" type="text" placeholder="Code..." data-bind="value: category_code">
					    <input class="span3" id="appendedInputButtons" type="text" placeholder="New..." data-bind="value: category_name">
					    <input class="span3" id="appendedInputButtons" type="text" placeholder="abbr..." data-bind="value: category_abbr">
					    <input class="span2" id="appendedInputButtons"
					    	   data-role="dropdownlist"
			                   data-value-primitive="true"
			                   data-auto-bind="false"
			                   data-text-field="name"
			                   data-value-field="id"
			                   data-bind="value: category_item_type_id,
			                              source: itemTypeDS" />
					    <button class="btn btn-default" type="button" data-bind="click: addCategory"><i class="icon-plus"></i> <span data-bind="text: lang.lang.add_new_category"></span></button>
					</div>

	            	<table class="table table-bordered table-white">
	            		<thead>
	            			<tr>
	            				<th data-bind="text: lang.lang.code"></th>
	            				<th data-bind="text: lang.lang.name"></th>
	            				<th data-bind="text: lang.lang.abbr"></th>
	            				<th data-bind="text: lang.lang.type"></th>
	            				<th></th>
	            			</tr>
	            		</thead>
	            		<tbody data-role="listview"
	            				data-auto-bind="false"
		            			data-edit-template="itemSetting-edit-category-template"
				                data-template="itemSetting-category-template"
				                data-bind="source: categoryDS"></tbody>
	            	</table>
	            </div>
	            <!-- // Tab Category Type content END -->

	            <!-- Tab Item Group content -->
	            <div class="tab-pane" id="tab2-1">
		            <div class="input-append">
		            	<input id="appendedInputButtons" class="span2"
		            	   data-role="dropdownlist"
            			   data-option-label="(--- Select Category ---)"
            			   data-auto-bind="false"
		                   data-value-primitive="true"
		                   data-text-field="name"
		                   data-value-field="id"
		                   data-bind="value: item_group_category_id,
		                              source: categoryDS"/>
					    <input class="span3" id="appendedInputButtons" type="text" placeholder="Code..." data-bind="value: item_group_code">
					    <input class="span3" id="appendedInputButtons" type="text" placeholder="New Name..." data-bind="value: item_group_name">
					    <input class="span3" id="appendedInputButtons" type="text" placeholder="abbr..." data-bind="value: item_group_abbr">
					    <button class="btn btn-default" type="button" data-bind="click: addItemGroup"><i class="icon-plus"></i> <span data-bind="text: lang.lang.add_new_group"></span></button>
					</div>

	            	<table class="table table-bordered table-white">
	            		<thead>
	            			<tr>
	            				<th data-bind="text: lang.lang.code"></th>
	            				<th data-bind="text: lang.lang.name"></th>
	            				<th data-bind="text: lang.lang.abbr"></th>
	            				<th data-bind="text: lang.lang.type"></th>
	            				<th></th>
	            			</tr>
	            		</thead>
	            		<tbody data-role="listview"
	            				data-auto-bind="false"
		            			data-edit-template="itemSetting-edit-item-group-template"
				                data-template="itemSetting-item-group-template"
				                data-bind="source: itemGroupDS"></tbody>
	            	</table>
	            </div>
	            <!-- // Tab Item Group Type content END -->

	            <!-- Tab Measurement content -->
	            <div class="tab-pane" id="tab3-1">
                	<div class="input-append">
					    <input class="span12" id="appendedInputButtons" type="text" placeholder="Measurement..." data-bind="value: measurement_name">
					    <button class="btn btn-default" type="button" data-bind="click: addMeasurement"><i class="icon-plus"></i> <span data-bind="text: lang.lang.add_measurement"></span></button>
					</div>
	            	<table class="table table-bordered table-white">
	            		<thead>
	            			<tr>
	            				<th data-bind="text: lang.lang.measurement"></th>
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

	        </div>
	    </div>

	</div>
</script>
<script id="variants" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960" style="overflow: hidden;">
				<div id="example" class="k-content">

					<span class="glyphicons no-js remove_2 pull-right"
	    				onclick="javascript:window.history.back()"><i></i></span>

			        <h2>Variants</h2>

			        <br>

			        <a style="margin-bottom: 15px;" class="k-button k-button-icontext k-add-button" data-bind="click: addNew"><span class="k-icon k-i-add"></span>Add New Variant</a>
			        <div class="row-fluid">
			        	<div class="span5" style="padding-right: 15px;">
			        		<div id ="listView"
					        	 data-role="listview"
				                 data-edit-template="variants-edit-template"
				                 data-template="variants-template"
				                 data-bind="source: dataSource"
				                 style="height: 300px; overflow: auto;width: 100%; padding: 0;"></div>
				        </div>
				        <div class="span7">
				            <div data-role="grid"
				                 data-editable="true"
				                 data-toolbar="['save','cancel']"
				                 data-columns="[
				                                { 'field': 'name', 'title':'Value' },
				                                { 'field': 'color_code', 'title':'Color Code' },
				                                { command: 'destroy', title: '&nbsp;', width: 100 }
				                            ]"
				                 data-auto-bind="false"
				                 data-bind="source: attributeValueDS"
				                 style="height: 200px; width: 99.5%"></div>
				        </div>
			        </div>

				</div>
			</div>
		</div>
	</div>
</script>
<script id="variants-template" type="text/x-kendo-tmpl">
	<table style="width: 100%;">
		<tr >
			<td style="width: 36%">#:name#</td>
			<td>
				<div class="edit-buttons">
				    <a class="k-button btn-info k-edit-button" href="\\#"><span class="k-icon k-i-edit"></span></a>
				    <a class="k-button btn-info k-delete-button" href="\\#"><span class="k-icon k-i-delete"></span></a>
				    <span class="k-button btn-info" data-bind="click: addNewAttributeValue"><span class="k-icon k-i-add"></span>Add Value</span>
				    <span class="k-button btn-info" data-bind="click: viewAttributeValue"><span>View Value</span></span>
				</div>
			</td>
		</tr>
	</table>
</script>
<script id="variants-edit-template" type="text/x-kendo-tmpl">
    <div class="product-view k-widget" style="float: left; width: 94%;">
        <!-- <dl>
            <dd>
                <input type="text" class="k-textbox" data-bind="value:name" name="ProductName" required="required" validationMessage="required" />
                <span data-for="ProductName" class="k-invalid-msg"></span>
            </dd>
        </dl>
        <div class="edit-buttons">
            <a class="k-button k-update-button" href="\\#"><span class="k-icon k-i-check"></span></a>
            <a class="k-button k-cancel-button" href="\\#"><span class="k-icon k-i-cancel"></span></a>
        </div> -->
        <div class="row">
        	<div class="col-md-9" style="width: 60%;">
        		<input type="text" class="k-textbox" data-bind="value:name" name="ProductName" required="required" validationMessage="required" style="width: 100%;" />
                <span data-for="ProductName" class="k-invalid-msg"></span>
        	</div>
        	<div class="col-md-3" style="padding: 0 15px;">
        		<div class="edit-buttons">
		            <a class="k-button btn-info k-update-button" href="\\#"><span class="k-icon k-i-check"></span></a>
		            <a class="k-button btn-info k-cancel-button" href="\\#"><span class="k-icon k-i-cancel"></span></a>
		        </div>
        	</div>
        </div>
    </div>
</script>
<script id="warehouses" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960" style="overflow: hidden;">
				<div id="example" class="k-content">

					<span class="glyphicons no-js remove_2 pull-right"
	    				onclick="javascript:window.history.back()"><i></i></span>

			        <h2>Warehouse</h2>

			        <br>

			        <div class="widget widget-tabs widget-tabs-double widget-tabs-vertical row-fluid row-merge widget-tabs-gray">
				        <!-- Tabs Heading -->
					    <div class="widget-head span3">
					        <ul>
					            <li class="active"><a href="#tab1-7" class="glyphicons cargo" data-toggle="tab"><i></i><span class="strong">Warehouse / Location</span></a>
					            </li>
					            <li><a href="#tab2-7" class="glyphicons google_maps" data-toggle="tab"><i></i><span class="strong">Zone</span></a>
					            </li>
					            <li><a href="#tab3-7" class="glyphicons google_maps" data-toggle="tab"><i></i><span class="strong">Section</span></a>
					            </li>
					            <li><a href="#tab4-7" class="glyphicons google_maps" data-toggle="tab"><i></i><span class="strong">Rack</span></a>
					            </li>
					            <li><a href="#tab5-7" class="glyphicons google_maps" data-toggle="tab"><i></i><span class="strong">Level</span></a>
					            </li>
					            <li><a href="#tab6-7" class="glyphicons google_maps" data-toggle="tab"><i></i><span class="strong">Position</span></a>
					            </li>
					            <li><a href="#tab7-7" class="glyphicons qrcode" data-toggle="tab"><i></i><span class="strong">Bin Location</span></a>
					            </li>
					        </ul>
					    </div>
					    <!-- // Tabs Heading END -->

					    <div class="widget-body span9">
					        <div class="tab-content">

					            <!-- WAREHOUSE -->
					            <div class="tab-pane active" id="tab1-7">

					            	<a style="margin-bottom: 15px;" class="k-button k-button-icontext k-add-button" data-bind="click: addNew"><span class="k-icon k-i-add"></span>Add New Warehouse</a>

							        <div class="row-fluid">
						        		<div id="listView"
								        	 data-role="listview"
							                 data-edit-template="warehouses-edit-template"
							                 data-template="warehouses-template"
							                 data-bind="source: dataSource"
							                 style="min-height: auto; overflow: auto;width: 100%; padding: 0;"></div>

								    	<br>

							            <div data-role="grid"
							                 data-editable="true"
							                 data-toolbar="['save','cancel']"
							                 data-columns="[
							                 				{ 'field': 'number', 'title':'Number' },
							                                { 'field': 'name', 'title':'Name' },
							                                { 'field': 'location_type', title: 'Location Type', editor: locationTypeEditor, template: '#=location_type.name#' },
							                                { command: 'destroy', title: '&nbsp;', width: 100 }
							                            ]"
							                 data-auto-bind="false"
							                 data-bind="source: locationDS"
							                 style="height: 200px; width: 100%"></div>

							        </div>
						        </div>
		            			<!-- // WAREHOUSE END -->

		            			<!-- ZONE -->
					            <div class="tab-pane" id="tab2-7">
					            	<div data-role="grid"
						                 data-editable="true"
						                 data-toolbar="['create','save','cancel']"
						                 data-columns="[
						                                {
						                                	'field': 'number',
						                                	'title':'Number',
						                 					'editor': twoDigitMaskedTextboxEditor
						                 				},
						                                { 'field': 'name', 'title':'Name' },
						                                { command: 'destroy', title: '&nbsp;', width: 100 }
						                            ]"
						                 data-bind="source: zoneDS"
						                 style="height: 200px; width: 100%"></div>
						        </div>
		            			<!-- // ZONE END -->

		            			<!-- SECTION -->
					            <div class="tab-pane" id="tab3-7">
					            	<div data-role="grid"
						                 data-editable="true"
						                 data-toolbar="['create','save','cancel']"
						                 data-columns="[
						                 				{
						                                	'field': 'number',
						                                	'title':'Number',
						                 					'editor': twoDigitMaskedTextboxEditor
						                 				},
						                                { 'field': 'name', 'title':'Name' },
						                                { command: 'destroy', title: '&nbsp;', width: 100 }
						                            ]"
						                 data-bind="source: sectionDS"
						                 style="height: 200px; width: 100%"></div>
						        </div>
		            			<!-- // SECTION END -->

		            			<!-- RACK -->
					            <div class="tab-pane" id="tab4-7">
					            	<div data-role="grid"
						                 data-editable="true"
						                 data-toolbar="['create','save','cancel']"
						                 data-columns="[
						                                {
						                                	'field': 'number',
						                                	'title':'Number',
						                 					'editor': twoDigitMaskedTextboxEditor
						                 				},
						                                { 'field': 'name', 'title':'Name' },
						                                { command: 'destroy', title: '&nbsp;', width: 100 }
						                            ]"
						                 data-bind="source: rackDS"
						                 style="height: 200px; width: 100%"></div>
						        </div>
		            			<!-- // RACK END -->

		            			<!-- LEVEL -->
					            <div class="tab-pane" id="tab5-7">
					            	<div data-role="grid"
						                 data-editable="true"
						                 data-toolbar="['create','save','cancel']"
						                 data-columns="[
						                 				{
						                 					'field': 'number',
						                 					'title': 'Number',
						                 					'editor': oneDigitMaskedTextboxEditor
						                 				},
						                                { 'field': 'name', 'title': 'Name' },
						                                { command: 'destroy', title: '&nbsp;', width: 100 }
						                            ]"
						                 data-bind="source: levelDS"
						                 style="height: 200px; width: 100%"></div>
						        </div>
		            			<!-- // LEVEL END -->

		            			<!-- POSITION -->
					            <div class="tab-pane" id="tab6-7">
					            	<div data-role="grid"
						                 data-editable="true"
						                 data-toolbar="['create','save','cancel']"
						                 data-columns="[
						                                {
						                 					'field': 'number',
						                 					'title': 'Number',
						                 					'editor': oneDigitMaskedTextboxEditor
						                 				},
						                                { 'field': 'name', 'title': 'Name' },
						                                { command: 'destroy', title: '&nbsp;', width: 100 }
						                            ]"
						                 data-bind="source: positionDS"
						                 style="height: 200px; width: 100%"></div>
						        </div>
		            			<!-- // POSITION END -->

		            			<!-- BIN LOCATION -->
					            <div class="tab-pane" id="tab7-7">

					            	<a style="margin-bottom: 15px;" class="k-button k-button-icontext k-add-button" data-bind="click: addNewBinLocation"><span class="k-icon k-i-add"></span>Add New Bin Location</a>

					            	<div id="lvBinLocation"
							        	 data-role="listview"
						                 data-edit-template="warehouses-binLocation-edit-template"
						                 data-template="warehouses-binLocation-template"
						                 data-bind="source: binLocationDS"
						                 style="min-height: auto; overflow: auto;width: 100%; padding: 0;"></div>

						        </div>
		            			<!-- // BIN LOCATION END -->

		            		</div>
		    			</div>
	    			</div>

				</div>
			</div>
		</div>
	</div>
</script>
<script id="warehouses-template" type="text/x-kendo-tmpl">
	<table style="width: 100%;">
		<tr>
			<td style="width: 36%">#:name#</td>
			<td>
				<div class="edit-buttons">
				    <a class="k-button btn-info k-edit-button" href="\\#"><span class="k-icon k-i-edit"></span></a>
				    <a class="k-button btn-info k-delete-button" href="\\#"><span class="k-icon k-i-delete"></span></a>
				    <span class="k-button btn-info" data-bind="click: addNewLocation"><span class="k-icon k-i-add"></span>Add Location</span>
				    <span class="k-button btn-info" data-bind="click: viewLocation"><span>View Location</span></span>
				</div>
			</td>
		</tr>
	</table>
</script>
<script id="warehouses-edit-template" type="text/x-kendo-tmpl">
    <div class="product-view k-widget" style="float: left; width: 94%;">
        <div class="row">
        	<div class="col-md-9" style="width: 60%;">
        		Name
        		<input type="text" class="k-textbox" data-bind="value:name" name="ProductName" required="required" validationMessage="required" style="width: 100%;" />
        		<span data-for="ProductName" class="k-invalid-msg"></span>
        		Address
        		<input type="text" class="k-textbox" data-bind="value:address" name="txtAddress" style="width: 100%;" />
        	</div>
        	<div class="col-md-3" style="padding: 0 15px;">
        		<div class="edit-buttons">
		            <a class="k-button btn-info k-update-button" href="\\#"><span class="k-icon k-i-check"></span></a>
		            <a class="k-button btn-info k-cancel-button" href="\\#"><span class="k-icon k-i-cancel"></span></a>
		        </div>
        	</div>
        </div>
    </div>
</script>
<script id="warehouses-binLocation-template" type="text/x-kendo-tmpl">
	<table style="width: 100%;">
		<tr>
			<td style="width: 36%">#:name#</td>
			<td>
				<div class="edit-buttons">
				    <a class="k-button btn-info k-edit-button" href="\\#"><span class="k-icon k-i-edit"></span></a>
				    <a class="k-button btn-info k-delete-button" href="\\#"><span class="k-icon k-i-delete"></span></a>
				</div>
			</td>
		</tr>
	</table>
</script>
<script id="warehouses-binLocation-edit-template" type="text/x-kendo-tmpl">
    <div class="product-view k-widget" style="float: left; width: 94%;">
        <div class="row">
        	<div class="col-md-9" style="width: 60%;">
        		Warehouse
        		<input id="ddlWarehouse" name="ddlWarehouse"
        		   data-role="dropdownlist"
        		   data-value-primitive="true"
                   data-text-field="name"
                   data-value-field="id"
                   data-bind="value: warehouse_id,
                              source: dataSource"
                   style="width: 100%;"/>

                <br><br>

                Location
                <input data-role="dropdownlist"
                   data-cascade-from="ddlWarehouse"
                   data-cascade-from-field="warehouse_id"
                   data-value-primitive="true"
                   data-text-field="name"
                   data-value-field="id"
                   data-auto-bind="false"
                   data-bind="value: location_id,
                              source: locationDS"
                   style="width: 100%;"/>

                <br><br>

                Zone
                <input data-role="dropdownlist"
                   data-value-primitive="true"
                   data-text-field="name"
                   data-value-field="id"
                   data-bind="value: zone_id,
                              source: zoneDS"
                   style="width: 100%;"/>

                <br><br>

                Section
                <input data-role="dropdownlist"
                   data-value-primitive="true"
                   data-text-field="name"
                   data-value-field="id"
                   data-bind="value: section_id,
                              source: sectionDS"
                   style="width: 100%;"/>

                <br><br>

                Rack
                <input data-role="dropdownlist"
                   data-value-primitive="true"
                   data-text-field="name"
                   data-value-field="id"
                   data-bind="value: rack_id,
                              source: rackDS"
                   style="width: 100%;"/>

                <br><br>

                Level
                <input data-role="dropdownlist"
                   data-value-primitive="true"
                   data-text-field="name"
                   data-value-field="id"
                   data-bind="value: level_id,
                              source: levelDS"
                   style="width: 100%;"/>

                <br><br>

                Position
                <input data-role="dropdownlist"
                   data-value-primitive="true"
                   data-text-field="name"
                   data-value-field="id"
                   data-bind="value: position_id,
                              source: positionDS"
                   style="width: 100%;"/>

                <br><br>

        		<input type="checkbox" data-bind="checked: autoNumber" /> Auto Number
        		<input type="text" class="k-textbox" data-bind="value:number" name="txtNumber" required="required" validationMessage="required" style="width: 100%;" />
        		<span data-for="txtNumber" class="k-invalid-msg"></span>
        	</div>
        	<div class="col-md-3" style="padding: 0 15px;">
        		<div class="edit-buttons">
		            <a class="k-button btn-info k-update-button" href="\\#"><span class="k-icon k-i-check"></span></a>
		            <a class="k-button btn-info k-cancel-button" href="\\#"><span class="k-icon k-i-cancel"></span></a>
		        </div>
        	</div>
        </div>
    </div>
</script>
<script id="binLocations" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960" style="overflow: hidden;">
				<div id="example" class="k-content">

					<span class="glyphicons no-js remove_2 pull-right"
	    				onclick="javascript:window.history.back()"><i></i></span>

			        <h2>Variants</h2>

			        <br>

			        <a style="margin-bottom: 15px;" class="k-button k-button-icontext k-add-button" data-bind="click: addNew"><span class="k-icon k-i-add"></span>Add New Variant</a>
			        <div class="row-fluid">
			        	<div class="col-md-5" style="padding-right: 15px;">
			        		<div id ="listView"
							        	 data-role="listview"
						                 data-edit-template="variants-edit-template"
						                 data-template="variants-template"
						                 data-bind="source: dataSource"
						                 style="height: 300px; overflow: auto;width: 100%; padding: 0;"></div>

				            </div>
				        <div class="col-md-7">
				            <div data-role="grid"
				                 data-editable="true"
				                 data-toolbar="['save','cancel']"
				                 data-columns="[
				                                { 'field': 'name', 'title':'Value' },
				                                { 'field': 'color_code', 'title':'Color Code' },
				                                { command: 'destroy', title: '&nbsp;', width: 100 }
				                            ]"
				                 data-auto-bind="false"
				                 data-bind="source: attributeValueDS"
				                 style="height: 200px; width: 99.5%"></div>
				        </div>
			        </div>

				</div>
			</div>
		</div>
	</div>
</script>
<script id="employeeItemLocation" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background" style="padding-bottom: 15px;">
			<div class="container-960">
				<div id="example" class="k-content">

					<span class="pull-right glyphicons no-js remove_2"
						onclick="javascript:window.history.back()"><i></i></span>

					<div class="row">
						<div class="col-md-6">
							<h2 style="margin-bottom: 15px;">EMPLOYEE TO ITEM LOCATION</h2>
							<div style="overflow: hidden">
								<div class="span6" style="padding-left: 0;">

									<input data-role="dropdownlist"
						                   data-value-primitive="true"
						                   data-text-field="name"
						                   data-value-field="id"
						                   data-bind="value: warehouse_id,
						                              source: warehouseDS"
						                   data-option-label="Select Warehouse..."
						                   style="width: 78%;" />

						            <button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>

								</div>
								<div class="span6">
									<input data-role="dropdownlist"
										   data-value-primitive="false"
						                   data-auto-bind="false"
						                   data-text-field="name"
						                   data-value-field="id"
						                   data-bind="value: obj.contact,
						                              source: employeeDS"
						                   data-option-label="Select Employee..."
						                   required data-required-msg="required" style="width: 100%;" />

									<div style="margin-bottom: 15px; float: right;">
										<span class="k-button" data-bind="click: save">Save</span>
										<span class="k-button" data-bind="click: cancel">Cancel</span>
									</div>

								</div>
							</div>

					    	<select id="listbox1" data-role="listbox"
				                data-text-field="name"
				                data-value-field="id"
				                data-toolbar='{
				                	tools: ["moveUp", "moveDown", "transferTo", "transferFrom", "transferAllTo", "transferAllFrom", "remove"]
				            	}'
				                data-connect-with="listbox2"
				                data-auto-bind="false"
				                data-bind="source: locationDS" style="width: 50%; min-height: 550px;">
				            </select>

				            <select id="listbox2" data-role="listbox"
				                data-connect-with="listbox1"
				                data-text-field="name"
				                data-value-field="id"
				                data-auto-bind="false"
				                data-bind="source: obj.locations"
				                style="width: 49%; min-height: 550px;">
				            </select>

				            <br>

				            <div id="pager" class="k-pager-wrap"
			            		 data-role="pager"
						    	 data-auto-bind="false"
					             data-bind="source: obj.contacts"></div>
						</div>
						<div class="col-md-6" style="padding-left:0; margin-top: 35px;">

							<div data-role="grid"
				                 data-columns="[
	                                 { 'field': 'contact', 'title': 'EMPLOYEE', template:'#=contact.abbr# #=contact.number# #=contact.name#' },
	                                 { 'field': 'locations', 'title': 'TOTAL LOCATION', template:'#=locations.length#' },
	                                 { 'title': '', template:'<button data-bind=click:edit>VIEW / EDIT</button>' }
	                              ]"
				                 data-bind="source: dataSource"></div>

				            <div id="ntf1" data-role="notification"></div>

						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</script>


<!-- ACCOUNTING SETTINGS -->
<script id="accountingSetting" type="text/x-kendo-template">
	<span class="pull-right glyphicons no-js remove_2"
			onclick="javascript:window.history.back()"><i></i></span>

	<h2 data-bind="text: lang.lang.general_accounting_setting"></h2>

	<br>

	<div class="widget widget-tabs widget-tabs-double widget-tabs-vertical row-fluid row-merge widget-tabs-gray">

	    <!-- Tabs Heading -->
	    <div class="widget-head span3">
	        <ul>
	            <!-- <li class="active"><a href="#tab1-1" class="glyphicons group" data-toggle="tab"><i></i><span class="strong"><span data-bind="text: lang.lang.financial_report"></span></span></a>
	            </li> -->
	           <!--  <li><a href="#tab2-1" class="glyphicons credit_card" data-toggle="tab"><i></i><span class="strong">Chart of Accounts Condition</span></a>
	            </li>
	            <li><a href="#tab2-1" class="glyphicons clock" data-toggle="tab"><i></i><span class="strong">Segments Setting</span></a>
	            </li>
	            <li><a href="#tab3-1" class="glyphicons clock" data-toggle="tab"><i></i><span class="strong">Transaction Item </span></a>
	            </li>
	            <li><a href="#tab5-1" class="glyphicons clock" data-toggle="tab"><i></i><span class="strong">Tax Setting </span></a>
	            </li>	 -->
	            <li class="active"><a href="#tab1-1" class="glyphicons clock" data-toggle="tab"><i></i><span class="strong"><span data-bind="text: lang.lang.prefix_setting"></span> </span></a>
	            </li>
	        </ul>
	    </div>
	    <!-- // Tabs Heading END -->

	    <div class="widget-body span9">
	        <div class="tab-content">

	            <!-- Tab Branch content -->
	            <!-- <div class="tab-pane active" id="tab1-1">
	            	<p>The selected Financial Reporting Standard</p>
	            	<div class="tab1-aacountsetting">
	            		<p>
	            			BanhJi does not guarantee the full compliance with above selected financial reporting
	            			standards. We only provide the recommended format of the financial statements of selected standard.
	            		</p>
	            		<a href="" class="btn-change">Change</a>
	            	</div>
	            	<p class="noted">
	            		<b>Noted:</b>
	            		BanhJi does not guarantee the full compliance with above selected financial reporting
	            		standards. We only provide the recommended format of the financial statements of selected standard.
	            	</p>
	            </div> -->
	            <!-- // Tab Branch content END -->

	            <!-- Tab Contact Type content -->
	            <!-- <div class="tab-pane" id="tab2-1">
	            	<div class="input-append">
					    <input class="span12" id="appendedInputButtons" type="text" placeholder="name ..." data-bind="value: paymentMethodName">
					    <button class="btn btn-default" type="button" data-bind="click: addPaymentMethod"><i class="icon-plus"></i></button>
					</div>
	            	<table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs">
	            		<thead>
	            			<tr>
	            				<th>Name</th>
	            				<th></th>
	            			</tr>
	            		</thead>
	            		<tbody data-role="listview"
		            			data-edit-template="customerSetting-edit-payment-method-template"
				                data-template="customerSetting-payment-method-template"
				                data-bind="source: paymentMethodDS"></tbody>
	            	</table>
	            </div> -->
	            <!-- // Tab Contact Type content END -->

	            <!-- Tab Block content -->
	           <!--  <div class="tab-pane" id="tab2-1">
            		<div class="input-append">
					    <input class="span4" id="appendedInputButtons" type="text" placeholder="name ..." data-bind="value: paymentTermName">
					    <input class="span4" id="appendedInputButtons" type="text" placeholder="term ..." data-bind="value: paymentTerm">
					    <input class="span4" id="appendedInputButtons" type="text" placeholder="% ..." data-bind="value: paymentTermPercentage">
					    <button class="btn btn-default" type="button" data-bind="click: addPaymentTerm"><i class="icon-plus"></i></button>
					</div>
	            	<table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs">
	            		<thead>
	            			<tr>
	            				<th>Name</th>
	            				<th>Term</th>
	            				<th>%</th>
	            				<th></th>
	            			</tr>
	            		</thead>
	            		<tbody data-role="listview"
		            			data-edit-template="customerSetting-edit-payment-term-template"
				                data-template="customerSetting-payment-term-template"
				                data-bind="source: paymentTermDS"></tbody>
	            	</table>
	            </div> -->
	            <!-- // Tab Block content END -->

	            <!-- Tab Block content -->
	            <div class="tab-pane active" id="tab1-1">
	            	<table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs">
	            		<thead>
	            			<tr class="widget-head">
	            				<th class="center" data-bind="text: lang.lang.type"></th>
	            				<th class="center" data-bind="text: lang.lang.abbr"></th>
	            				<th style="text-align: left;padding-left: 5px;" data-bind="text: lang.lang.name"></th>
	            				<th class="center"><span data-bind="text: lang.lang.action"></span></th>
	            			</tr>
	            		</thead>
	            		<tbody data-role="listview"
								 data-selectable="false"
				                 data-template="accountSetting-prefix-template"
				                 data-bind="source: prefixDS">
	            		</tbody>
	            	</table>

	            </div>
	            <!-- // Tab Block content END -->

	        </div>
	    </div>

	</div>
</script>
<script id="accountSetting-prefix-template" type="text/x-kendo-template">
	<tr>
		<td > #=type#  </a></td>
		<td style="text-align: center; padding-left: 10px!important;">
			#= abbr#
		</td>
		<td class="center" style="text-align: left;">
			<a style="text-align: left;padding-left: 5px;" href="\\#/add_accountingprefix/#= id # ">#= name# </a>
		</td>
		<td style="text-align: center;">
			<!-- <a class="btn-action glyphicons pencil btn-success" href="\\#/add_accountingprefix/#= id # "><i class=""></i></a> -->
			<a class="k-button btn-info glyphicons pencil" href="\\#/add_accountingprefix/#=id#"><span class="k-icon k-i-edit"></span></a>
		</td>
	</tr>
</script>
<script id="addAccountingprefix" type="text/x-kendo-template">
	<div class="page-wrapper ">
        <div class="container-fluid">
        	<div class="row marginTop15 sale">
                <div class="col-md-12">
                    <div class="card">
                    	<div class="btn-close" onclick="javascript:window.history.back()"><i class="ti-close"></i></div>
                        <div class="card-body" >
                        	<h2>Transaction Prefix</h2>
                        	<div class="row">
                        		<div class="col-md-6">
                        			<p>
                        				At the begining of every fiscal year, all the reference numbers will start at 1. If you donot start using BanhJi at the beginning of your fiscal year, please use Starting Number to determine you next number for each transaction reference. This is important for your transaction reference number.
                        			</p>
                        		</div>
                        		<div class="col-md-6 table-responsive">
                        			<table class="table color-table dark-table">
								    	<thead>
									    	<tr>
									    		<th width="40%">Name</th>
									    		<th>Abbr</th>
									    	</tr>
								    	</thead>
								    	<tbody>
									    	<tr>
									    		<td><span data-bind="text: obj.type"></span></td>
									    		<td>
									    			<input type="text" placeholder="Abbr" class="k-textbox k-invalid span4" data-bind="value: obj.abbr" style="width: 100px;" >
									    		</td>
									    	</tr>
								    	</tbody>
									</table>
                        		</div>
                        	</div>

                        	<!-- Form actions -->
							<div class="backgroundButtonFooter">
								<div id="ntf1" data-role="notification"></div>							

								<div class="row">
									<div class="col-md-4" ></div>
									<div class="col-md-8" align="right">
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
</script>
<script id="accountingSetting-contact-type-template" type="text/x-kendo-tmpl">
    <tr>
    	<td>
    		 #:name#
   		</td>
   		<td>
   			#if(is_system=="0"){#
	   			<div class="edit-buttons">
			        <a class="k-button btn-info k-edit-button" href="\\#"><span class="k-icon k-i-edit"></span></a>
			        <a class="k-button btn-info k-delete-button" href="\\#"><span class="k-icon k-i-delete"></span></a>
			   	</div>
		   	#}#
   		</td>
   	</tr>
</script>
<script id="accountingSetting-edit-contact-type-template" type="text/x-kendo-tmpl">
    <div class="product-view k-widget">
        <dl>
            <dd>
                <input type="text" class="k-textbox" data-bind="value:name" name="ProductName" required="required" validationMessage="required" />
                <span data-for="ProductName" class="k-invalid-msg"></span>
            </dd>
        </dl>
        <div class="edit-buttons">
            <a class="k-button btn-info k-update-button" href="\\#"><span class="k-icon k-i-check"></span></a>
            <a class="k-button btn-info k-cancel-button" href="\\#"><span class="k-icon k-i-cancel"></span></a>
        </div>
    </div>
</script>
<script id="accountingSetting-payment-method-template" type="text/x-kendo-tmpl">
    <tr>
    	<td>
    		 #:name#
   		</td>
   		<td>
   			<div class="edit-buttons">
		        <a class="k-button btn-info k-edit-button" href="\\#"><span class="k-icon k-i-edit"></span></a>
		        <a class="k-button btn-info k-delete-button" href="\\#"><span class="k-icon k-i-delete"></span></a>
		   	</div>
		</td>
   	</tr>
</script>
<script id="accountingSetting-edit-payment-method-template" type="text/x-kendo-tmpl">
    <div class="product-view k-widget">
        <dl>
            <dd>
                <input type="text" class="k-textbox" data-bind="value:name" name="ProductName" required="required" validationMessage="required" />
                <span data-for="ProductName" class="k-invalid-msg"></span>
            </dd>
        </dl>
        <div class="edit-buttons">
            <a class="k-button btn-info k-update-button" href="\\#"><span class="k-icon k-i-check"></span></a>
            <a class="k-button btn-info k-cancel-button" href="\\#"><span class="k-icon k-i-cancel"></span></a>
        </div>
    </div>
</script>
<script id="accountingSetting-payment-term-template" type="text/x-kendo-tmpl">
    <tr>
    	<td>
    		 #:name#
   		</td>
   		<td>
    		 #:term#
   		</td>
   		<td>
    		 #:discount_percentage#
   		</td>
   		<td>
   			<div class="edit-buttons">
		        <a class="k-button btn-info k-edit-button" href="\\#"><span class="k-icon k-i-edit"></span></a>
		        <a class="k-button btn-info k-delete-button" href="\\#"><span class="k-icon k-i-delete"></span></a>
		   	</div>
		</td>
   	</tr>
</script>
<script id="accountingSetting-edit-payment-term-template" type="text/x-kendo-tmpl">
    <div class="product-view k-widget">
        <dl>
            <dd>
                <input type="text" class="k-textbox" data-bind="value:name" name="ProductName" required="required" validationMessage="required" />
                <span data-for="ProductName" class="k-invalid-msg"></span>
            </dd>
            <dd>
                <input type="text" class="k-textbox" data-bind="value:net_due" name="term" required="required" validationMessage="required" />
                <span data-for="term" class="k-invalid-msg"></span>
            </dd>
            <dd>
                <input type="text" class="k-textbox" data-bind="value:discount_percentage" name="percentage" required="required" validationMessage="required" />
                <span data-for="percentage" class="k-invalid-msg"></span>
            </dd>
        </dl>
        <div class="edit-buttons">
            <a class="k-button btn-info k-update-button" href="\\#"><span class="k-icon k-i-check"></span></a>
            <a class="k-button btn-info k-cancel-button" href="\\#"><span class="k-icon k-i-cancel"></span></a>
        </div>
    </div>
</script>
<script id="accountingList" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="col-md-12">
					<div id="example" class="k-content">
						<div class="hidden-print">
							<span class="pull-right glyphicons no-js remove_2"
								onclick="javascript:window.history.back()"><i></i></span>

							<input data-role="dropdownlist"
							   data-option-label="(--- TYPE ---)"
			                   data-auto-bind="false"
			                   data-value-primitive="true"
			                   data-text-field="name"
			                   data-value-field="id"
			                   data-bind="value: contact_type_id,
			                              source: contactTypeDS" />

							<button id="search" type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button> |
							<button type="button" data-role="button" onclick="javascript:window.print()"><i class="icon-print"></i></button>
						</div>

						<h3 align="center"><span data-bind="text: lang.lang.customer_list"></span></h3>

						<div id="grid"></div>

					</div> <!-- //End div example-->
				</div><!-- //End div span12-->
			</div><!-- //End div row-fluid-->
		</div>
	</div>
</script>
<script id="segment" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960" style="overflow: hidden;">
				<div id="example" class="k-content">

					<span class="glyphicons no-js remove_2 pull-right"
	    				onclick="javascript:window.history.back()"
						data-bind="click: cancel"><i></i></span>

			        <h2 data-bind="text: lang.lang.segment"></h2>

			        <div class="row">
				        <div class="col-md-6">
				        	<p>
					        	<span data-bind="text: lang.lang.segment_is_important"></span>
					        </p>
				        </div>
				         <div class="col-md-6">
				         	<button class="btn btn-inverse" data-bind="click: openWindow"><i class="icon-plus icon-white"></i>&nbsp&nbsp<span data-bind="text: lang.lang.add_new_segment"></span></button>

				        </div>
			        </div>

				    <br>

				    <!-- Window -->
				    <div data-role="window"
			                 data-title="Segment"
			                 data-width="280"
			                 data-height="165"
			                 data-actions="{}"
			                 data-position="{top: '30%', left: '37%'}"
			                 data-bind="visible: windowVisible">

				    	<table>
							<tr style="border-bottom: 8px solid #fff;">
								<td width="40%"><span data-bind="text: lang.lang.name"></span></td>
								<td>
									<input class="k-textbox" placeholder="name..." data-bind="value: obj.name" style="width: 100%;">
								</td>
							</tr>
						</table>

						<br>

						<div style="text-align: center;">
							<span class="btn btn-success btn-icon glyphicons ok_2" data-bind="click: save"><i></i><span data-bind="text: lang.lang.save"></span></span>
							<span class="btn btn-danger btn-icon glyphicons remove_2" data-bind="click: closeWindow"><i></i><span data-bind="text: lang.lang.close"></span></span>
						</div>
					</div>

	                <div class="row-fluid">
		                <div class="col-md-12 table-segment" style="padding: 0;">
			            	<table class="table table-condensed">
			            		<thead style="background-color: #1E4E78; color: #fff; font-weight: bold">
			            			<tr>
			            				<th data-bind="text: lang.lang.name"></th>
			            				<th></th>
			            			</tr>
			            		</thead>
			            		<tbody data-role="listview"
						                data-template="segment-template"
						                data-bind="source: dataSource"></tbody>
			            	</table>
		            	</div>

		            <!-- Item Window -->
		            <div data-role="window"
			                 data-title="Segment Item"
			                 data-width="250"
			                 data-height="201"
			                 data-actions="{}"
			                 data-position="{top: '30%', left: '37%'}"
			                 data-bind="visible: windowItemVisible">
	            		<table>
							<tr style="border-bottom: 8px solid #fff;">
								<td width="35%"><span data-bind="text: lang.lang.code"></span></td>
								<td>
									<input class="k-textbox" placeholder="type code ..." data-bind="value: item.code" style="width: 100%;">
								</td>
							</tr>
							<tr style="border-bottom: 8px solid #fff;">
								<td><span data-bind="text: lang.lang.name"></span></td>
								<td>
									<input class="k-textbox" placeholder="type name ..." data-bind="value: item.name" style="width: 100%;">
								</td>
							</tr>
						</table>

						<br>
						<div style="text-align: center;">
							<span class="btn btn-success btn-icon glyphicons ok_2" data-bind="click: saveItem"><i></i><span data-bind="text: lang.lang.save"></span></span>
							<span class="btn btn-danger btn-icon glyphicons remove_2" data-bind="click: closeWindowItem"><i></i><span data-bind="text: lang.lang.close"></span></span>
						</div>
					</div>

					<h3 data-bind="text: objName"></h3>

					<div class="row">
		            	<div class="span12">
						    <table class="table table-bordered table-white">
			            		<thead>
			            			<tr>
			            				<th style="background: #0077c5; color: #fff;" data-bind="text: lang.lang.code"></th>
			            				<th style="background: #0077c5; color: #fff;" data-bind="text: lang.lang.name"></th>
			            				<th style="background: #0077c5; color: #fff;" data-bind="text: lang.lang.segment"></th>
			            				<th style="background: #0077c5; color: #fff;"></th>
			            			</tr>
			            		</thead>
			            		<tbody data-role="listview"
						                data-template="segment-item-template"
						                data-auto-bind="false"
						                data-bind="source: itemDS"></tbody>
			            	</table>
			            	<div id="pager" class="k-pager-wrap"
						    	 data-auto-bind="false"
					             data-role="pager" data-bind="source: itemDS"></div>
		            	</div>
	            	</div>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="segmentCenter" type="text/x-kendo-template">
	<div class="widget widget-heading-simple widget-body-gray widget-employees">
		<div class="widget-body padding-none">
			<div class="row-fluid row-merge">
				<div class="span3 listWrapper" >
					<div class="innerAll" style="height: 98px;">
						<form autocomplete="off" class="form-inline">

							<div class="widget-search separator bottom row" style="padding-bottom: 0; ">
								<div class="span10" style="padding-right: 0;">
									<button type="button" class="btn btn-default pull-right" data-bind="click: search"><i class="icon-search"></i></button>
									<div class="overflow-hidden">
										<input type="search" placeholder="Account ..." data-bind="value: searchText, events:{change: enterSearch}">
									</div>
								</div>
								<div class="span2" style="padding: 0; width: 12%">
									<ul class="topnav" style="padding: 0 !important; background: #e8e8e8; height: 34px;">
									  	<li role='presentation' class='dropdown' style="list-style: none; padding: 0 0 0 3px;">
									  		<a class='dropdown-toggle glyphicons cogwheel' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'><i></i> </a>
								  			<ul class='dropdown-menu' style="width: 190px !important; border-radius: 0; left: -159px !important; top: 34px !important; margin-left: 4px;">
								  				<li><a><span data-bind="click: showActive">Show Active Account</span></a></li>
								  				<li><a><span data-bind="click: showInactive">Show Inactive Account</span></a></li>

								  			</ul>
									  	</li>

									</ul>
								</div>
							</div>

							<div class="select2-container" style="width: 100%; margin-bottom: 10px;">
								<input data-role="dropdownlist"
					                   data-option-label="Account Type..."
					                   data-template="account-type-list-tmpl"
					                   data-value-primitive="true"
					                   data-text-field="name"
					                   data-value-field="id"
					                   data-bind="value: account_type_id,
					                              source: accountTypeDS"
					                   style="width: 100%" />
							</div>

						</form>
					</div>

					<span class="results"><span data-bind="text: dataSource.total"></span> <span data-bind="text: lang.lang.found_search"></span></span>

					<div class="table table-condensed" style="height: 580px;"
						 data-role="grid"
						 data-auto-bind="false"
						 data-bind="source: dataSource"
						 data-row-template="accountingCenter-list-tmpl"
						 data-columns="[{title: ''}]"
						 data-selectable=true
						 data-height="600"
						 data-scrollable="{virtual: true}"></div>
				</div>
				<div class="span9 detailsWrapper">
					<div class="row">
						<div class="span6">
							<div class="widget-stats widget-stats-info widget-stats-5" style="background: #0077c5">
								<span class="glyphicons adjust_alt"><i></i></span>
								<span class="txt">
									<span data-bind="text: nature"></span>
									<span data-bind="text: lang.lang.nature_balance"></span>
								</span>
								<div class="clearfix"></div>
							</div>
						</div>
						<div class="span6" style="padding-right: 15px;">
							<div class="widget-stats widget-stats-default widget-stats-5" style="background: #21abf6" data-bind="click: loadTransaction">
								<span class="glyphicons random"><i></i></span>
								<span class="txt">
									<span data-bind="text: totalTxn"></span>
									<span data-bind="text: lang.lang.transaction"></span>
								</span>
								<div class="clearfix"></div>
							</div>
						</div>
		          	</div>

					<div>
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

					  	<button type="button" data-role="button" data-bind="click: searchTransaction"><i class="icon-search"></i></button>
					</div>

					<table class="table table-bordered table-striped table-white">
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
				    	 data-auto-bind="false"
			             data-role="pager" data-bind="source: transactionDS"></div>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="segment-template" type="text/x-kendo-tmpl">
    <tr>
    	<td>#=name#</td>
    	<td >
    		<span data-bind="click: edit" style="cursor: pointer;"><i class="icon-edit"></i> Edit</span>
    		#if(!is_system=="1"){#
	    		|
	    		<span data-bind="click: delete" style="cursor: pointer;"><i class="icon-remove"></i> Delete</span>
    		#}#
    		|
    		<span data-bind="click: view" style="cursor: pointer;"><i class="icon-view"></i> View Item</span>
    		|
    		<span data-bind="click: addItem" style="cursor: pointer;"><i class="icon-plus icon-white"></i> Add Item</span>
    	</td>
   	</tr>
</script>
<script id="segment-item-template" type="text/x-kendo-tmpl">
    <tr>
    	<td>#=code#</td>
    	<td>#=name#</td>
    	<td>
    		#if(segment.length>0){#
    			#=segment[0].name#
    		#}#
    	</td>
   		<td>
    		<span data-bind="click: editItem" style="cursor: pointer;"><i class="icon-edit"></i> Edit</span>
    		#if(!is_system=="1"){#
	    		|
	    		<span data-bind="click: deleteItem" style="cursor: pointer;"><i class="icon-remove"></i> Delete</span>
    		#}#
    	</td>
   	</tr>
</script>
<script id="currencyRate" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">
				<div id="example" class="k-content">
					<span class="glyphicons no-js remove_2 pull-right"
		    				onclick="javascript:window.history.back()"
							data-bind="click: cancel"><i></i></span>

					<h2 span data-bind="text: lang.lang.exchange_rate" style="margin-bottom: 15px;"></h2>
					<!-- Collapsible Widget -->
					<div class="widget" style="border: 0; margin-bottom: 0;">
					    <div class="widget-body">

					    	<div class="row-fluid">
						    	<div class="span6 alert alert-primary"><span data-bind="text: lang.lang.company_currency"></span> <span data-bind="text: baseCode"></span> </div>
						    	<div class="span6 alert alert-primary"><span data-bind="text: lang.lang.reporting_currency"></span> <span data-bind="text: reportCode"></span> </div>
					    	</div>

							<br>

							<button class="btn btn-inverse hidden-print" data-bind="click: openWindow"><i class="icon-plus icon-white"></i> <span data-bind="text: lang.lang.add_new_rate"></span></button>

							<!-- Item List -->
							<table style="margin-top: 15px;" class="table table-bordered table-primary table-striped table-vertical-center">
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
			<span data-bind="click: edit" style="cursor: pointer;"><i class="icon-edit"></i> <span data-bind="text: lang.lang.edit"></span></span>
		</td>
    </tr>
</script>
<script id="tax" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960" style="overflow: hidden;">
			<div id="example" class="k-content">

		    	<span class="glyphicons no-js remove_2 pull-right"
						onclick="javascript: window.history.back()"><i></i></span>

		        <h2 span data-bind="text: lang.lang.tax"></h2>

			    <div class="row">
			        <div class="span6">
			        	<p>
				        	<span data-bind="text: lang.lang.these_are_the_tax_items_required_by_your_countries"></span>
				        </p>
			        </div>
			        <div class="span6">
			         	<button class="btn btn-inverse" data-bind="click: openWindow"><i class="icon-plus icon-white"></i>&nbsp&nbsp <span data-bind="text: lang.lang.add_tax_type"></span></button>

			        </div>
			    </div>

			    <br>

			    <!-- Tax Type Window -->
			    <div data-role="window"
		                 data-title="Tax Type"
		                 data-width="350"
		                 data-height="290"
		                 data-actions="{}"
		                 data-position="{top: '30%', left: '35%'}"
		                 data-bind="visible: windowVisible">
		    		<table>
						<tr style="border-bottom: 8px #fff solid;">
							<td width="50%"><span data-bind="text: lang.lang.tax_system"></span></td>
							<td width="50%">
								<input data-role="dropdownlist"
				                   data-value-primitive="true"
				                   data-text-field="name"
				                   data-value-field="id"
				                   data-bind="value: obj.tax_system,
				                              source: typeList"
				                   style="width: 100%;" />
							</td>
						</tr>
						<tr style="border-bottom: 8px #fff solid;">
							<td><span data-bind="text: lang.lang.tax_registration_no"></span></td>
							<td>
								<input class="k-textbox" placeholder="type number ..." data-bind="value: obj.number" style="width: 100%;">
							</td>
						</tr>
						<tr style="border-bottom: 8px #fff solid;">
							<td><span data-bind="text: lang.lang.agency"></span></td>
							<td>
								<input class="k-textbox" placeholder="type agency ..." data-bind="value: obj.agency" style="width: 100%;">
							</td>
						</tr>
						<tr style="border-bottom: 8px #fff solid;">
							<td><span data-bind="text: lang.lang.name"></span></td>
							<td>
								<input class="k-textbox" placeholder="type name ..." data-bind="value: obj.name" style="width: 100%;">
							</td>
						</tr >
						<tr style="border-bottom: 8px #fff solid;">
							<td><span data-bind="text: lang.lang.last_end_date"></span></td>
							<td>
								<input data-role="datepicker"
									data-format="dd-MM-yyyy"
									data-parse-formats="yyyy-MM-dd"
									data-bind="value: obj.end_date"
									style="width: 100%;" />
							</td>
						</tr>
						<tr>
							<td><span data-bind="text: lang.lang.last_submission_date"></span></td>
							<td>
								<input data-role="datepicker"
									data-format="dd-MM-yyyy"
									data-parse-formats="yyyy-MM-dd"
									data-bind="value: obj.submission_date"
									style="width: 100%;" />
						</td>
						</tr>
					</table>

					<br>
					<div style="text-align: center;">
						<span class="btn btn-success btn-icon glyphicons ok_2" data-bind="click: save"><i></i>Save</span>
						<span class="btn btn-danger btn-icon glyphicons remove_2" data-bind="click: closeWindow"><i></i><span data-bind="text: lang.lang.close"></span></span>
					</div>
				</div>

                <div class="row">
	                <div class="span12 table-tax">
		            	<table class="table table-condensed">
		            		<thead style="background-color: #1E4E78; color: #fff; font-weight: bold">
		            			<tr>
		            				<th style="padding-left: 8px !important; width: 50px;"><span data-bind="text: lang.lang.no_"></span></th>
		            				<th data-bind="text: lang.lang.name"></th>
		            				<th data-bind="text: lang.lang.system"></th>
		            				<th data-bind="text: lang.lang.agency"></th>
		            				<th style="text-align: center;"><span data-bind="text: lang.lang.end_date"></span></th>
		            				<th style="text-align: center;"><span data-bind="text: lang.lang.submission_date"></span></th>
		            				<th></th>
		            			</tr>
		            		</thead>
		            		<tbody data-role="listview"
					                data-template="tax-type-template"
					                data-bind="source: dataSource"></tbody>
		            	</table>
	            	</div>

	            <!-- Item Window -->
	            <div data-role="window"
		                 data-title="Tax Item"
		                 data-width="285"
		                 data-height="220"
		                 data-actions="{}"
		                 data-position="{top: '30%', left: '37%'}"
		                 data-bind="visible: windowItemVisible">

            		<table>
						<tr style="border-bottom: 8px solid #fff;">
							<td width="34%"><span data-bind="text: lang.lang.item_name"></span></td>
							<td>
								<input class="k-textbox" placeholder="type name ..." data-bind="value: item.name" style="width: 100%;">
							</td>
						</tr>
						<tr style="border-bottom: 8px solid #fff;">
							<td width="34%"><span data-bind="text: lang.lang.description"></span></td>
							<td>
								<input class="k-textbox" placeholder="type description ..." data-bind="value: item.description" style="width: 100%;">
							</td>
						</tr>
						<tr style="border-bottom: 8px solid #fff;">
							<td><span data-bind="text: lang.lang.item_rate"></span></td>
							<td>
								<input data-role="numerictextbox"
				                   data-format="p"
				                   data-min="0"
				                   data-max="0.99"
				                   data-step="0.1"
				                   data-bind="value: item.rate"
				                   style="width: 100%;">
							</td>
						</tr>
						<tr>
							<td><span data-bind="text: lang.lang.account"></span></td>
							<td>
								<input data-role="dropdownlist" id="ddlAccount"
					                   data-option-label="Select Account..."
					                   data-header-template="account-header-tmpl"
					                   data-template="account-list-tmpl"
					                   data-value-primitive="true"
					                   data-text-field="name"
					                   data-value-field="id"
					                   data-bind="value: item.account_id,
					                              source: accountDS"
					                   style="width: 100%" />
							</td>
						</tr>

					</table>

					<br>
					<div style="text-align: center;">
						<span class="btn btn-success btn-icon glyphicons ok_2" data-bind="click: saveItem"><i></i><span data-bind="text: lang.lang.save"></span></span>
						<span class="btn btn-danger btn-icon glyphicons remove_2" data-bind="click: closeWindowItem"><i></i><span data-bind="text: lang.lang.close"></span></span>
					</div>
				</div>

				<h3 data-bind="text: taxName" style="margin-left: 20px;"></h3>

				<div class="row">
	            	<div class="span12" style="padding-left: 30px;">
					    <table class="table table-bordered table-white" style="width: 98%;">
		            		<thead>
		            			<tr>
		            				<th style="width:15%"><span data-bind="text: lang.lang.name"></span></th>
		            				<th style="width: 45%;"><span data-bind="text: lang.lang.description"></span></th>
		            				<th data-bind="text: lang.lang.rate"></th>
		            				<th data-bind="text: lang.lang.account"></th>
		            				<th></th>
		            			</tr>
		            		</thead>
		            		<tbody data-role="listview"
					                data-template="tax-item-template"
					                data-auto-bind="false"
					                data-bind="source: itemDS"></tbody>
		            	</table>
	            	</div>
            	</div>
			</div>
			</div>
		</div>
	</div>
</script>
<script id="tax-type-template" type="text/x-kendo-tmpl">
    <tr>
    	<td>#=number#</td>
    	<td>#=name#</td>
    	<td>#=tax_system#</td>
    	<td>#=agency#</td>
    	<td>#=kendo.toString(new Date(end_date), "dd-MM-yyyy")#</td>
    	<td align="center">#=kendo.toString(new Date(submission_date), "dd-MM-yyyy")#</td>
    	<td align="center">
    		<span data-bind="click: edit"><i class="icon-edit"></i> <span data-bind="text: lang.lang.edit"></span></span>
    		|
    		<span data-bind="click: view"><i class="icon-view"></i> <span data-bind="text: lang.lang.view_item"></span></span>
    		|
    		<span data-bind="click: addItem"><i class="icon-plus icon-white"></i> <span data-bind="text: lang.lang.add_tax_item"></span>
    	</td>
   	</tr>
</script>
<script id="tax-item-template" type="text/x-kendo-tmpl">
    <tr>
    	<td>#=name#</td>
    	<td>#=description#</td>
    	<td>#=rate#</td>
    	<td>#=account[0].name#</td>
   		<td>
    		<span data-bind="click: editItem"><i class="icon-edit"></i> <span data-bind="text: lang.lang.edit"></span></span>
    	</td>
   	</tr>
</script>
<script id="taxReportCenter" type="text/x-kendo-template">
	<div class="row-fluid customer-report-center">
		<div class="span7">
			<div class="row-fluid sale-report">
				<h2>SALE TAX REPORTS</h2>
				<div class="row-fluid">
					<table class="table table-borderless table-condensed">
						<tr>
							<td width="50%">
								<h3><a href="#/sale_journal">Sale Journal</a></h3>
							</td>
							<td width="50%">
								<h3><a href="#/purchase_journal">Purchase Journal</a></h3>
							</td>
						</tr>
						<tr>
							<td width="50%">
								<p>

								</p>

							</td>
							<td width="50%">
								<p>

								</p>
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

		</div>
	</div>
</script>                                                                