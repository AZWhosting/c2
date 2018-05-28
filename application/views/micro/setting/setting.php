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
                        	<h2  data-bind="text: lang.lang.setting"></h2>
                        	<div class="vtabs" style="width: 100%;">
	                        	<div id="indexMenu" style="width: 17%; float: left;"></div>
				                <div class="tab-content" style="float: left; width: 83%; padding: 10px;">
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
    </div>
</script>

<!-- Menu -->
<script id="tapMenu" type="text/x-kendo-template">
	<ul class="nav nav-tabs tabs-vertical" role="tablist" >
		<li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#/" data-bind="click: goCustomerType"><span class="hidden-sm-up"><i class="ti-layout-grid2-thumb"></i></span> <span class="hidden-xs-down" data-bind="text: lang.lang.customer_type"></span></a> </li>
		<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#/" data-bind="click: goCustomerGroup"><span class="hidden-sm-up"><i class="ti-layout-grid2-thumb"></i></span> <span class="hidden-xs-down" data-bind="text: lang.lang.customer_group"></span></a> </li>
	    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#/" data-bind="click: goSupplierType"><span class="hidden-sm-up"><i class="ti-layout-accordion-list"></i></span> <span class="hidden-xs-down" data-bind="text: lang.lang.supplier_type"></span></a> </li>
	    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#/" data-bind="click: goItemType"><span class="hidden-sm-up"><i class="ti-layout-grid2-thumb"></i></span> <span class="hidden-xs-down" data-bind="text: lang.lang.item_type"></span></a> </li>
	    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#/" data-bind="click: goItemGroup"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down" data-bind="text: lang.lang.item_group"></span></a> </li>
	    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#/" data-bind="click: goUomCategory"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down" data-bind="">UOM Category</span></a> </li>
	    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#/" data-bind="click: goUom"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down" data-bind="text: lang.lang.uom"></span></a> </li>
	    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#/" data-bind="click: goBrand"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down" data-bind="text: lang.lang.brand"></span></a> </li>
	    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#/" data-bind="click: goPaymentMethod"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down" data-bind="text: lang.lang.payment_method"></span></a> </li>
	    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#/" data-bind="click: goPaymentTerms"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down" data-bind="text: lang.lang.payment_terms"></span></a> </li>
	    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#/" data-bind="click: goCustomForms"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down" data-bind="text: lang.lang.custom_forms"></span></a> </li>
	    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#/" data-bind="click: goPrefixSetting"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down" data-bind="text: lang.lang.prefix_setting"></span></a> </li>
	    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#/" data-bind="click: goVariants"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down" data-bind="">Variants</span></a> </li>
	    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#/" data-bind="click: goLocation"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down" data-bind="">Location</span></a> </li>
	    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#/" data-bind="click: goEmployeeToItemLocation"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down" data-bind="">Employee To Item Location</span></a> </li>
    </ul>
</script>
<!-- End -->

<!-- Menu -->
<script id="customerType" type="text/x-kendo-template">
	<div class="row">
		<div class="col-md-12">
			<div class="hidden-md-up marginBottom">
				<h3 data-bind="text: lang.lang.customer_type"></h2>
			</div>

			<div class="input-append">
			    <input class="col-md-4" id="appendedInputButtons" type="text" placeholder="input customer type ..." data-bind="value: contactTypeName">
			    <input class="col-md-4" id="appendedInputButtons" type="text" placeholder="input abbr ..." data-bind="value: contactTypeAbbr">
			    <select class="col-md-3" id="appendedInputButtons" data-bind="value: contactTypeCompany" >
	                <option value="0"><span data-bind="text: lang.lang.not_a_company"></span></option>
	                <option value="1"><span data-bind="text: lang.lang.it_is_a_company"></span></option>
	            </select>
			    <button class="btn btn-default" type="button" data-bind="click: addContactType"><i class="icon-plus"></i> <span data-bind="text: lang.lang.add_type"></span></button>
			</div>

			<div class="row">
				<div class="col-md-12">
			    	<table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs">
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
</script>
<script id="customerGroup" type="text/x-kendo-template">
	<div class="row">
		Customer Group
	</div>
</script>
<script id="supplierType" type="text/x-kendo-template">
	<div class="row">
		Supplier Type
	</div>
</script>
<script id="itemType" type="text/x-kendo-template">
	<div class="row">
		Item Type
	</div>
</script>
<script id="itemGroup" type="text/x-kendo-template">
	<div class="row">
		Item Group
	</div>
</script>
<script id="uomCategory" type="text/x-kendo-template">
	<div class="row">
		Uom Category
	</div>
</script>
<script id="uom" type="text/x-kendo-template">
	<div class="row">
		Uom
	</div>
</script>
<script id="brand" type="text/x-kendo-template">
	<div class="row">
		Brand
	</div>
</script>
<script id="paymentMethod" type="text/x-kendo-template">
	<div class="row">
		Payment Method
	</div>
</script>
<script id="paymentTerms" type="text/x-kendo-template">
	<div class="row">
		Payment Terms
	</div>
</script>
<script id="customForms" type="text/x-kendo-template">
	<div class="row">
		Custom Forms
	</div>
</script>
<script id="prefixSetting" type="text/x-kendo-template">
	<div class="row">
		Prefix Setting
	</div>
</script>
<script id="variants" type="text/x-kendo-template">
	<div class="row">
		Variants
	</div>
</script>
<script id="location" type="text/x-kendo-template">
	<div class="row">
		Location
	</div>
</script>
<script id="employeeToItemLocation" type="text/x-kendo-template">
	<div class="row">
		EmployeeToItemLocation
	</div>
</script>
<!-- End -->


<script id="customerSetting-contact-type-template" type="text/x-kendo-tmpl">
    <tr>
    	<td>
    		#:name#
   		</td>
   		<td align="center">
    		#:abbr#
   		</td>
   		<td align="center">
    		#if(is_company=="1"){#
    			Yes
    		#}else{#
    			No
    		#}#
   		</td>
   		<td align="center">
   			<div class="edit-buttons">
		        <a class="k-button k-edit-button" href="\\#"><span class="k-icon k-i-edit"></span></a>
		        #if(is_system=="0"){#
			        <a class="k-button k-delete-button" href="\\#"><span class="k-icon k-i-delete"></span></a>
		        #}#
		        <a class="k-button" href="\#/customer/0/#=id#"><span data-bind="text: lang.lang.pattern"></span></a>
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
            <a class="k-button k-update-button" href="\\#"><span class="k-icon k-i-check"></span></a>
            <a class="k-button k-cancel-button" href="\\#"><span class="k-icon k-i-cancel"></span></a>
        </div>
    </div>
</script>
<script id="customerSetting-payment-method-template" type="text/x-kendo-tmpl">
    <tr>
    	<td>
    		#:name#
   		</td>
   		<td align="center">
   			<div class="edit-buttons">
		        <a class="k-button k-edit-button" href="\\#"><span class="k-icon k-i-edit"></span></a>
		        #if(is_system=="0"){#
			        <a class="k-button k-delete-button" href="\\#"><span class="k-icon k-i-delete"></span></a>
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
            <a class="k-button k-update-button" href="\\#"><span class="k-icon k-i-check"></span></a>
            <a class="k-button k-cancel-button" href="\\#"><span class="k-icon k-i-cancel"></span></a>
        </div>
    </div>
</script>
<script id="customerSetting-payment-term-template" type="text/x-kendo-tmpl">
    <tr>
    	<td>
    		#:name#
   		</td>
   		<td align="center">
    		#:net_due#
   		</td>
   		<td align="center">
    		#:discount_period#
   		</td>
   		<td align="center">
    		#:discount_percentage#
   		</td>
   		<td align="center">
   			<div class="edit-buttons">
		        <a class="k-button k-edit-button" href="\\#"><span class="k-icon k-i-edit"></span></a>
		        #if(is_system=="0"){#
			        <a class="k-button k-delete-button" href="\\#"><span class="k-icon k-i-delete"></span></a>
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
            <a class="k-button k-update-button" href="\\#"><span class="k-icon k-i-check"></span></a>
            <a class="k-button k-cancel-button" href="\\#"><span class="k-icon k-i-cancel"></span></a>
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
		<td class="center">
			#if( status == 0){ #
			<a class="btn-action glyphicons pencil btn-success" href="\\#/invoice_custom/#= id # "><i></i></a>
			<a data-bind="click: deleteForm" class="btn-action glyphicons remove_2 btn-danger"><i></i></a>
			# } #
		</td>
	</tr>
</script>     