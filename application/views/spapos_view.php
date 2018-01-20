<div id="wrapperApplication" class="container-fluid"></div>
<!-- template section starts -->
<script type="text/x-kendo-template" id="layout">
	<div id="menu"></div>			
	<div id="content" class="row-fluid container pos-container"></div>
</script>
<script type="text/x-kendo-template" id="blank-tmpl">
</script>
<script type="text/x-kendo-template" id="menu-tmpl">   
	<div class="menu-hidden sidebar-hidden-phone menu-left hidden-print">
		<div class="navbar main navbar-fixed-top" id="main-menu">
			<ul class="topnav">
				<li><a href="#" data-bind="click: checkRole"><img src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/banhji-logo.png" style="height: 40px;"></a></li>
			</ul>
			<form class="navbar-form pull-left">				
			  	<input type="text" class="span2 search-query" placeholder="Search" id="search-placeholder" 
			  			data-bind="value: searchText" 
			  			style="background-color: #555555; color: #ffffff; border-color: #333333; height: 22px;">
			  	<button type="submit" class="btn btn-inverse" data-bind="click: search"><i class="icon-search"></i></button>
			</form>
			<ul class="topnav" id="secondary-menu">
			</ul> 
			<ul class="topnav pull-right">
				<li role="presentation" class="dropdown">
			  		<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"> <i class="icon-th-list"></i></a>
		  			<ul class="dropdown-menu ul-multiTaskList" data-template="multiTaskList-row-template" data-bind="source: multiTaskList">  				  				
		  			</ul>
			  	</li>
				<li role="presentation" class="dropdown">
			  		<a style="color: #fff;" class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">[<span data-bind="text: getUsername"></span>]</a>
		  			<ul class="dropdown-menu">  				  				
		  				<li><a href="#" data-bind="click: lang.changeToKh">ភាសាខ្មែរ</a></li>
    					<li><a href="#" data-bind="click: lang.changeToEn">English</a></li>
						<li class="divider"></li>
					<!-- 	<li><a href="<?php echo base_url(); ?>admin">Setting</a></li> -->
						<li><a href="#/manage" data-bind="click: logout"><i class="icon-power-off"></i> Logout</a></li> 				
		  			</ul>
			  	</li>				
			</ul>
		</div>
	</div>
</script>
<script id="multiTaskList-row-template" type="text/x-kendo-template">
    <li>
    	<a href="\#/#=url#">
    		#=name#
    		<span title="Remove" class="multiTaskList glyphicons remove_2 pull-right" data-bind="click: removeLink">
    			<i></i>
    		</span>
    	</a>

    </li>	
</script>

<script src="https://unpkg.com/dexie@latest/dist/dexie.js"></script>

<style>
	#wrapper {
		position: relative;
		overflow: hidden;
		padding-top: 30px;
	}
	.pos-container{
		width: 91%;
	}
	.width-100{
		width: 100%;
	}
	#menu {
		height: 50px;
		overflow: hidden;
	}
	#listView {
		padding       : 10px 5px;
		margin-bottom : -1px;
		min-height    : 510px;
		/* Avoid cutout if font or line is bigger */
		font: inherit;
	}
	html.no-touch.sticky-top:not(.animations-gpu) #content {
		margin-top: 0!important;
    	background: #fff;
    	padding-top: 0!important;
	}
	.customer-background {
		width: 100%;
		padding: 15px;
	}
	.product {
		float    : left;
		position : relative;
	    width 	 : 101px;
		height   : 170px;
		margin   : 0 5px;
		padding  : 0;
		cursor   : pointer;
	}
	.product img {
		width: 110px;
		height: 110px;
	}
	.product h3 {
		margin         : 0;
		padding        : 3px 5px 0 0;
		max-width      : 104px;
		overflow       : hidden;
		line-height    : 1.5em;
		font-size      : .9em;
		font-weight    : normal;
		text-transform : uppercase;
		color          : #999;
	}
	.product p {
		visibility: hidden;
	}
	.product:hover p {
		visibility: visible;
		position: absolute;
	    width: 101px;
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
	.box-shadow {
		box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1;
	}
	#posProductList{
		min-height: 330px !important; 
		height: 234px; 
		overflow: scroll
	}
	.action-container{
		width: 103%;
		height: 54px; 
		float: right; 
		box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1;
		display: flex;
		justify-content: flex-end;
		align-items: flex-start;
	}
	.btn-width-100{
		width: 100% !important;
		height: 50px;
	}
	.btn-center-text{
		background: #213863;
		display: flex;
		align-items: center;
		justify-content: space-around;
		border-radius: 5px !important;
	}
	.btn-lg{
		font-size: 25px;
	}
	.btn-md{
		font-size: 16px;
	}
	.btn-action{
		width: 48%;
	}
	.pay-container{
		/*display: flex;*/
		justify-content: space-between;
		margin-top: 10px;
	}
	.pay-container input{
		width: 113%;
		height: 51px;
		font-size: 26px;
		text-align: right;
	}
	.item-row{
		display: flex;
		justify-content: space-between;
	}
	.padding{
		padding: 10px;
	}
	.favorite-category{
		overflow: scroll;
		overflow-x: scroll;
		overflow-y: hidden;
		height: 65px;
		white-space: nowrap;
		padding-top: 10px;
	}
	.width-50{
		width: 47%;
	}
	.margin{
		margin:6px 0px;
	}
	.btn-btn{
		color: white; 
		font-weight: bold;
	}
	.btn-btn:hover{
		background: #0077c5;
	}
	.btn-round{
		border-radius: 5px;
	}
	html body > .container-fluid,html.no-touch.sticky-top:not(.animations-gpu) #content {
		background: #e9ebee;
	}
</style>
<!-- Dash Board -->
<script id="dashBoard" type="text/x-kendo-template">
	<div id="ntf1" data-role="notification"></div>
	<div id="wrapper">
		<div class="row-fluid">
			<div class="customer-background" style="overflow: hidden;">
				<div >
					<div class="example">
						<h2>Session</h2>
						<div data-bind="visible: noSession">
							<table class="table table-bordered table-primary table-striped table-vertical-center" style="margin-top: 15px;">
						        <thead>
						            <tr>
						            	<th style="vertical-align: top;" data-bind="text: lang.lang.no_"></th>
						            	<th style="vertical-align: top;" data-bind="text: lang.lang.employee"></th>
						            	<th style="vertical-align: top;" data-bind="text: lang.lang.start"></th>
						            	<th style="vertical-align: top;" data-bind="text: lang.lang.end"></th>
						            	<th style="vertical-align: top;" data-bind="text: lang.lang.status"></th>
						            	<th style="vertical-align: top;" data-bind="text: lang.lang.action"></th>
						            </tr>
						        </thead>
						        <tbody data-role="listview" 
					        		data-template="session-list-template" 
					        		data-auto-bind="true"
					        		data-bind="source: sessionDS"></tbody>
						    </table>
						    <ul class="topnav addNew">
								<li role="presentation" class="dropdown ">
							  		<a class="dropdown-toggle" data-bind="click: addNewSession" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
							  			<span data-bind="text: lang.lang.add_new"></span>
							  		</a>
							  	</li>
							</ul>
						</div>
						<div data-bind="invisible: noSession">
							<table class="table table-bordered table-primary table-striped table-vertical-center">
						        <thead>
						            <tr>
						                <th class="center" style="width: 50px;"><span data-bind="text: lang.lang.no_">No.</span></th>
						                <th><span data-bind="text: lang.lang.currency">Currency</span></th>
						                <th><span data-bind="text: lang.lang.amount">Amount</span></th>
						            </tr> 
						        </thead>
						        <tbody data-role="listview" 
					        		data-template="cashier-session-template" 
					        		data-auto-bind="false"
					        		data-bind="source: cashierItemDS"></tbody>
						    </table>
						    <span class="btn btn-icon btn-primary glyphicons ok_2" style="width: 135px;float: left; margin-bottom: 0px;" data-bind="click: addSession"><i></i><span data-bind="text: lang.lang.add">Save</span></span>
						    <span  class="btn btn-icon btn-primary glyphicons remove_2" style="background: red;width: 135px;float: left; margin-bottom: 0px;"><i></i><span data-bind="text: lang.lang.cancel, click: backSession">Cancel</span></span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="cashier-session-template" type="text/x-kendo-template">
	<tr>
		<td>
			#:banhji.dashBoard.cashierItemDS.indexOf(data)+1#	
		</td>
		<td>
			<p> #: currency# </p>
		</td>
		<td>
			<input style="text-align: right;" id="numeric" class="k-formatted-value k-input" type="number" value="17" min="0" data-bind="value: amount" step="1" />
		</td>
	</tr>
</script>
<script id="session-list-template" type="text/x-kendo-template">
    <tr>
		<td style="border-left: 0; border-bottom: 0;">
			#:banhji.dashBoard.sessionDS.indexOf(data)+1#
		</td>
		<td style="border-left: 0; border-bottom: 0;">
			<a href="\\#/reconcile/#= id#">#: employee#</a>
		</td>
		<td style="border-left: 0; border-bottom: 0;">
			#: kendo.toString(new Date(start_date), "dd-MMMM-yyyy", "km-KH")#
		</td>
		<td style="border-left: 0; border-bottom: 0;">
			#if(end_date != "0000-00-00 00:00:00"){#
				#: kendo.toString(new Date(end_date), "dd-MMMM-yyyy", "km-KH")#
			#}#
		</td>
		<td style="border-left: 0; border-bottom: 0; text-align: center;">
			#if(status == 1){#
				 Done
			#}else if(status == 2){#
				Already Save in Draft
			#}else{#
				Not yet Reconcile
			#}#
		</td>
		<td style="border-left: 0; border-bottom: 0; text-align: center;">
			#if(status == 2){#
				<a style="cursor: pointer;" href="\\#/reconcile/#= id # ">Edit</a>
			#}else if(status == 0){#
				<a style="cursor: pointer;padding: 5px;background: red; color: \\#fff;" href="\\#/reconcile/#= id # ">Reconcile</a> | 
				<a style="cursor: pointer;padding: 5px;background: green; color: \\#fff;" data-bind="click: selectSession">Continue</a>
			#}#
		</td>
	</tr>
</script>

<!-- POS -->
<script id="pos" type="text/x-kendo-template">
	<div id="ntf1" data-role="notification"></div>
	<div id="wrapper" style="background: #fff;margin-top: 0;padding: 15px;border: 1px solid #ccc;">
		<div class="row-fluid">
			<div style="overflow: hidden;">
				<div class="">
					<div style="position: relative;overflow: hidden;">
						<div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
							<i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
						</div>
						<div class="row-fluid" style="padding: 0;">
							<div class="span12">
								<div class="row">
									<div class="listWrapper span6" >
										<div class="innerAll" style="height: 65px;">
											<div class="widget-search separator bottom" style="padding: 0;">
												<a class="btn btn-default pull-right" data-bind="click: search"><i class="icon-search"></i></a>
												<div class="overflow-hidden">
													<input style="line-height: 16px;border:1px solid #ccc;" type="search" placeholder="Number or Name..." data-bind="value: searchText, events:{change: search}">
												</div>
											</div>
										</div>
									</div>
									<div class="span3" style="padding-top: 15px;">
										<input 
											data-role="dropdownlist"
											data-auto-bind="false" 
											data-value-primitive="true" 
											data-filter="startswith" 
											data-text-field="name" 
											data-value-field="id"
											data-bind="
												value: catSelected,
				                              	source: categoryDS,
				                              	events: {change: catChange}" 
				                            data-option-label="Category ..."
				                            required="" 
				                            data-required-msg="required" 
				                            style="width: 100%;" 
				                            aria-invalid="true" 
				                            class="k-invalid"
				                        />
									</div>
									<div class="span3" style="padding-top: 15px;">
										<input 
											data-role="dropdownlist"
											data-auto-bind="false" 
											data-value-primitive="true" 
											data-filter="startswith" 
											data-text-field="name" 
											data-value-field="id"
											data-bind="
												value: groupSelected,
				                              	source: itemGroupDS,
				                              	events: {change: groupChange}" 
				                            data-option-label="Group ..."
				                            required="" 
				                            data-required-msg="required" 
				                            style="width: 100%;" 
				                            aria-invalid="true" 
				                            class="k-invalid"
				                        />
									</div>
								</div>
								<div class="demo-section k-content wide span12" style="padding: 0;">
									<div class="demo-section k-content wide">
										<div 
											id="productListView"
											data-role="listview"
											data-template="item-list-view-template"
											data-auto-bind="true"
											data-bind="source: itemsDS">
										</div>
										<div id="pager" class="k-pager-wrap"
									    	 data-role="pager"
									    	 data-auto-bind="true"
								             data-bind="source: itemsDS">
								        </div>
									</div>
								</div>
							</div>
							<div class="span12" style="padding: 0;">
								<div class="span4">
									<div class="box-generic">
										<div data-bind="visible: emSelect">
											<input 
												data-role="dropdownlist"
												data-template="contact-list-tmpl" 
												data-auto-bind="false" 
												data-value-primitive="true" 
												data-filter="startswith" 
												data-text-field="name" 
												data-value-field="id"
												data-bind="
													value: employeeSelected,
					                              	source: employeeDS,
					                              	events: {change: addEmployee}" 
					                            data-option-label="Select Employee..."
					                            required="" 
					                            data-required-msg="required" 
					                            style="width: 69%; float: left;" 
					                            aria-invalid="true" 
					                            class="k-invalid"
					                        />
					                        <ul class="topnav addNew" style="float: right;" >
												<li role="presentation" class="dropdown ">
											  		<a class="dropdown-toggle" data-bind="click: selectOutsource" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
											  			<span>Outsource</span>
											  		</a>
											  	</li>
											</ul>
					                    </div>
					                   	<div data-bind="invisible: emSelect">
											<input 
												data-role="dropdownlist"
												data-template="contact-list-tmpl" 
												data-auto-bind="false" 
												data-value-primitive="true" 
												data-filter="startswith" 
												data-text-field="name" 
												data-value-field="id"
												data-bind="
													value: employeeSelected,
					                              	source: supplierDS,
					                              	events: {change: addEmployee}" 
					                            data-option-label="Select Supplier..." 
					                            required="" 
					                            data-required-msg="required" 
					                            style="width: 69%; float: left;" 
					                            aria-invalid="true" 
					                            class="k-invalid"
					                        />
					                        <ul class="topnav addNew">
												<li role="presentation" class="dropdown" style="float: right;">
											  		<a class="dropdown-toggle" data-bind="click: selectEmployee" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
											  			<span>Employee</span>
											  		</a>
											  	</li>
											</ul>
					                    </div>
					                    <table class="table table-bordered table-primary table-striped table-vertical-center" style="margin-top: 15px;">
									        <thead>
									            <tr>
									            	<th style="vertical-align: top;" data-bind="text: lang.lang.no_"></th>
									            	<th style="vertical-align: top;" data-bind="text: lang.lang.name"></th>
									            </tr>
									        </thead>
									        <tbody data-role="listview" 
								        		data-template="employee-list-tmpl" 
								        		data-auto-bind="false"
								        		data-bind="source: employeeAR"></tbody>
									    </table>
				                    </div>
				                </div>
				                <div class="span4">
				                    <div class="box-generic span4">
				                    	<input 
											data-role="dropdownlist"
											data-template="room-list-tmpl" 
											data-auto-bind="false" 
											data-value-primitive="true" 
											data-filter="startswith" 
											data-text-field="name" 
											data-value-field="id"
											data-bind="
												value: roomSelected,
				                              	source: roomDS,
				                              	events: {change: addRoom}" 
				                            data-option-label="Select Room..." 
				                            required="" 
				                            data-required-msg="required" 
				                            style="width: 100%;" 
				                            aria-invalid="true" 
				                            class="k-invalid"
				                        />
				                        <table class="table table-bordered table-primary table-striped table-vertical-center" style="margin-top: 15px;">
									        <thead>
									            <tr>
									            	<th style="vertical-align: top;" data-bind="text: lang.lang.no_"></th>
									            	<th style="vertical-align: top;" data-bind="text: lang.lang.name"></th>
									            </tr>
									        </thead>
									        <tbody data-role="listview" 
								        		data-template="room-select-list-tmpl" 
								        		data-auto-bind="false"
								        		data-bind="source: roomAR"></tbody>
									    </table>
				                    </div>
				                </div>
				                <div class="span4">
									<div class="box-generic span4">
										<input 
											data-role="dropdownlist"
											data-template="contact-list-tmpl" 
											data-auto-bind="false" 
											data-value-primitive="true" 
											data-filter="startswith" 
											data-text-field="name" 
											data-value-field="id"
											data-option-label="Select Customer..."
											data-bind="
												value: customerSelected,
				                              	source: contactDS,
				                              	events: {change: addCustomer}"
				                            style="width: 49%; float: left;margin-right: 2%;" 
				                            aria-invalid="true" 
				                            class="k-invalid"
				                        />
				                        <input type="text" 
						                	style="width: 49%;" 
						                	data-role="datetimepicker"
								           	data-bind="
								           		value: dateSelected,
								           		events: {change: dateChange}
								           	" />
										<table class="table table-bordered table-primary table-striped table-vertical-center" style="margin-top: 15px;">
									        <thead>
									            <tr>
									            	<th style="vertical-align: top;" data-bind="text: lang.lang.no_"></th>
									            	<th style="vertical-align: top;" data-bind="text: lang.lang.name"></th>
									            </tr>
									        </thead>
									        <tbody data-role="listview" 
								        		data-template="customer-select-list-tmpl" 
								        		data-auto-bind="false"
								        		data-bind="source: customerAR">
								        	</tbody>
									    </table>
									</div>
								</div>
							</div>
						</div> 
						<div class="row-fluid posProductItems" style="padding: 0;padding-left: 10px;">
							<div class="span9" style="padding-left: 0;">
								<div id="posProductList" class="box-generic-noborder" style="min-height: 150px!important; height: 150px;">
									<div data-role="grid" class="costom-grid"
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
										        	var rowIndex = banhji.pos.lineDS.indexOf(dataItem)+1;
										        	return '<i class=icon-trash data-bind=click:removeRow></i>' + ' ' + rowIndex;
										      	}
										    },
						                 	{ 
						                 		field: 'item', 
						                 		title: 'PRODUCTS/SERVICES', 
						                 		editor: itemEditor, 
						                 		editable: 'false', 
						                 		template: '#=item.name#', 
						                 		width: '170px' },
				                            { 
				                            	field: 'description', title:'DESCRIPTION', 
				                            	width: '250px' 
				                            },                            
				                            {
											    field: 'quantity',
											    title: 'QTY',
											    format: '{0:n}',
											    editor: numberTextboxEditor,
											    width: '120px',
											    attributes: { style: 'text-align: right;' },
											    template: function(dataItem){
											    	banhji.pos.changes();
											    	dataItem.set('amount', dataItem.price * dataItem.quantity);
													return dataItem.quantity;
												}
											},
				                            { 
				                            	field: 'measurement', 
				                            	title: 'UOM', 
				                            	editable: 'false', 
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
											    attributes: { style: 'text-align: right;' },
											    template: function(dataItem){
											    	banhji.pos.changes();
											    	dataItem.set('amount', dataItem.price * dataItem.quantity);
													return dataItem.price;
												}
											},
											{
											    field: 'discount',
											    title: 'DISCOUNT VALUE',
											    hidden: true,
											    format: '{0:n}',
											    editor: numberTextboxEditor,
											    width: '120px',
											    attributes: { style: 'text-align: right;' },
											    template: function(dataItem){
											    	banhji.pos.changes();
											    	return dataItem.discount;
												}
											},
				                            { 
				                            	field: 'amount', 
				                            	title:'AMOUNT', 
				                            	format: '{0:n}', 
				                            	editable: 'false', 
				                            	attributes: { style: 'text-align: right;' }, 
				                            	width: '120px' 
				                            },                            
				                            { 
				                            	field: 'tax_item', 
				                            	title:'TAX', 
				                            	editor: taxForSaleEditor, 
				                            	template: function(dataItem){
				                            		banhji.pos.changes();
				                            		return dataItem.tax_item.name;
				                            	}, 
				                            	width: '90px' 
				                            }
				                         ]"
				                         data-auto-bind="false"
						                 data-bind="source: lineDS" >
						            </div>
								</div>
							</div>
							<div class="span3" style="padding: 1px;">
								<div class="posSaleSummary cover-block" style="width: 100%; float:right;box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1;">
									<table class="table table-condensed table-striped table-white">
										<tbody>
											<tr>
												<td class="right" style="width: 60%;"><span data-bind="text: lang.lang.subtotal" style="font-size: 15px; font-weight: 700;"></span></td>
												<td class="right strong" width="40%"><span data-format="n" data-bind="text: obj.sub_total" style="font-size: 15px; font-weight: 700;"></span></td>
											</tr>               
											<tr>
												<td class="right"><span data-bind="text: lang.lang.total_discount"></span></td>
												<td class="right ">
													<span data-format="n" data-bind="text: obj.discount"></span>
												</td>
											</tr>               
											<tr>
												<td class="right"><span data-bind="text: lang.lang.total_tax"></span></td>
												<td class="right "><span data-format="n" data-bind="text: obj.tax"></span></td>
											</tr>                             
											<tr>
												<td class="right"><h4 span data-bind="text: lang.lang.total" style="font-weight: 700;"></h4></td>
												<td class="right strong"><h4 data-bind="text: total" style="font-weight: 700;"></h4></td>
											</tr>               
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<div class="row-fluid">
							<div class="span4 width-50 box-shadow box-generic">
								<button class="btn-btn btn-width-100 btn-center-text btn-md margin" data-bind="click: addInvoice, text: lang.lang.save">
								</button>
								<button class="btn-btn btn-width-100 btn-center-text btn-md margin" data-bind="click: addBook">
									Book
								</button>
								<div class="span12 box-shadow box-generic">
									<div class="bg-action-button">
										<span class="btn-btn btn-width-100 btn-center-text btn-lg" data-bind="click: payPopup">
											<span>Print</span>
										</span>
									</div>
								</div>
							</div>
							<div class="span8">
								
							</div>
							<div id="dialog" style="display:none">
								<div class="span6">
									<div class="cover-block box-shadow">
										<h1>Sale Summary</h1>
										<div class="posSaleSummary cover-block "
										data-template="sale-summary-template"
										data-auto-bind="false"
										data-bind="source: lineDS">
									</div> 
									<div class="posSaleSummary cover-block">
										<table class="table table-white">
											<tbody>
												<tr>
													<td class="right" style="width: 60%;"><span data-bind="text: lang.lang.subtotal" style="font-size: 15px; font-weight: 700;"></span></td>
													<td class="right strong" width="40%"><span data-format="n" data-bind="text: obj.sub_total" style="font-size: 15px; font-weight: 700;"></span></td>
												</tr>               
												<tr>
													<td class="right"><span data-bind="text: lang.lang.total_discount"></span></td>
													<td class="right ">
														<span data-format="n" data-bind="text: obj.discount"></span>
													</td>
												</tr>               
												<tr>
													<td class="right"><span data-bind="text: lang.lang.total_tax"></span></td>
													<td class="right "><span data-format="n" data-bind="text: obj.tax"></span></td>
												</tr>                             
												<tr>
													<td class="right"><h4 span data-bind="text: lang.lang.total" style="font-weight: 700;"></h4></td>
													<td class="right strong"><h4 data-bind="text: total" style="font-weight: 700;"></h4></td>
												</tr>               
											</tbody>
										</table>
									</div>
								</div>
								<div class="span4">
								<div class="cover-block box-shadow">
									<h1>Pay</h1>
									<input class="k-textbox" id="pay_amount" name="pay_amount" />
									<br>
									<button class="btn margin btn-inverse btn-center-text btn-lg width-100" data-bind="click: payCash">
										Cash
									</button> 
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="item-list-view-template" type="text/x-kendo-template">
	<div class="product" data-bind="click:addRow">
		<img src="#= image_url #" />
		<h3>#:name#</h3>
		<p>#=kendo.toString(price, locale=="km-KH"?"c0":"c", locale)#</p>
	</div>
</script>
<script id="sale-summary-template" type="text/x-kendo-template">
	<div class="item-row">
		<div class="item-name">
			#= item.name #
		</div>
		<div class="item-price">
			<span data-format="c2" data-bind="text: amount"></span>
		</div>
	</div>
</script>
<script id="favorite-category-list-template" type="text/x-kendo-template">
	<button class="btn btn-inverse btn-round" data-value="1" data-bind="click: categorySelect">
		#=name#
	</button>
</script>
<script id="item-group-list-template" type="text/x-kendo-template">
	<button class="btn btn-inverse btn-round" data-value="1" data-bind="click: groupSelect">
		#=name# [#=abbr#]
	</button>
</script>
<script id="contact-list-tmpl" type="text/x-kendo-tmpl">
	<span>#=abbr##=number#</span>	
	<span>#=name#</span>	
</script>
<script id="employee-list-tmpl" type="text/x-kendo-tmpl">
	<tr data-uid="#: uid #">
		<td>
			<i class="icon-trash" data-bind="events: { click: rmEmployee }"></i>
			#:banhji.pos.employeeAR.indexOf(data)+1#      
		</td>
		<td>#= name#</td>
	</tr>
</script>
<script id="room-select-list-tmpl" type="text/x-kendo-tmpl">
	<tr data-uid="#: uid #">
		<td>
			<i class="icon-trash" data-bind="events: { click: rmRoom }"></i>
			#:banhji.pos.roomAR.indexOf(data)+1#      
		</td>
		<td>#= name#</td>
	</tr>
</script>
<script id="customer-select-list-tmpl" type="text/x-kendo-tmpl">
	<tr data-uid="#: uid #">
		<td>
			<i class="icon-trash" data-bind="events: { click: rmCustomer }"></i>
			#:banhji.pos.customerAR.indexOf(data)+1#      
		</td>
		<td>#= name#</td>
	</tr>
</script>
<script id="room-list-tmpl" type="text/x-kendo-tmpl">
	<span>#=number#</span>	
	<span>#=name#</span>	
</script>

<!-- Receipt -->
<script id="receipt" type="text/x-kendo-template">
	<div class="container">
		<div class="row-fluid">
			<div class="background">
				<div class="row-fluid">
					<div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
						<i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
					</div>
					<div id="example" class="k-content">
						<div class="hidden-print hidden-lg hidden-md pull-right">
							<span class="glyphicons no-js remove_2" 
								data-bind="click: cancel"><i></i></span>
						</div>
						<div class="row">
							<div class="col-xs-12 col-sm-4">
								<table width="100%" cellpadding="10">
									<tr>
										<td>
											<h2 style="width: 100%" data-bind="text: lang.lang.wreceipt">Receipt</h2>
											<p>
												<span data-bind="text: lang.lang.in_here"></span>
											</p>
											<p style="width: 100%; float: left; margin-top: 8px;">
												<span style="position: relative; height: 35px; line-height: 35px;  float: left; display: block; ">
													<a data-bind="text: lang.lang.reconcile_transfer" style="color: #203864; line-height: 17px; background: #fff; width: 100%; padding: 10px 13px; font-size: 18px; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1; float: left;" href="#/reconcile">
														Reconcile & Transfer
													</a>
												</span>
											</p>
										</td>
									</tr>
								</table>
								<div class="row">
									<div class="col-xs-12 col-sm-12">
										<div class="innerAll padding-bottom-none-phone" style="padding: 0 !important; margin: 8px 0 15px 0;">
											<a href="javascript:void(0)" class="widget-stats widget-stats-gray widget-stats-4" style="background: #fff; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1; "> 
												<span class="txt" style="color: #203864;"><span data-bind="text: lang.lang.customer">Customer</span></span>
												<span class="count" style="color: #203864;" data-bind="text: numCustomer">0</span>
												<span class="glyphicons user userss"><i></i></span>
											</a>
										</div>
									</div>
									<div class="col-xs-12 col-sm-12">
										<div class="innerAll padding-bottom-none-phone" style="background: #fff; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1; margin: 0 0 15px 0">
											<a href="#/wPayment_summary" class="widget-stats widget-stats-primary widget-stats-4" style="background: #fff; padding-left: 15px !important;">
												<span class="txt" style="color: #203864;"><span data-bind="text: lang.lang.today_payment">Today Payment</span></span>
												<span class="count"><span style="font-size: 35px; color: #203864;" data-bind="text: paymentReceiptToday">0៛</span></span>
												<span class="glyphicons coins addcolors"><i></i></span>
											</a>
										</div>
									</div>
								</div>
								<div class="cover-block" style="padding-left: 15px; padding-right: 15px;">
									<h2 data-bind="text: lang.lang.reports" style="width: 100%;">Report</h2>
									<p data-bind="text: lang.lang.summary_and_detail_cash">
										Summary and detail cash receipt reports grouped by sources/ methods of receipts
									</p>
									<ul >
										<li><a href="#/cash_receipt_detail"><span data-bind="text: lang.lang.cash_receipt_by_detail">Cash Receipt By Detail</span></a></li>  
										<li><a href="#/cash_receipt_source_summary"><span data-bind="text: lang.lang.cash_receipt_by_sources_summary">Cash Receipt By Sources Summary</span></a></li>
										<li><a href="#/cash_receipt_source_detail"><span data-bind="text: lang.lang.cash_receipt_by_sources_detail">Cash Receipt By Sources Detail</span></a></li> 
									</ul>
								</div>
								<!-- <span class="btn btn-icon btn-warning glyphicons remove" data-bind="visible: haveSession ,click: endSession" style="width: 100%;background: #a22314; border-radius: 0;"><i></i> <span data-bind="text: lang.lang.end_session">End Session</span></span> -->
							</div>
							<div class="col-xs-12 col-sm-8" style="padding-right: 0">
								<div class="hidden-print hidden-xs hidden-sm pull-right">
									<span class="glyphicons no-js remove_2" 
										data-bind="click: cancel"><i></i></span>
								</div>
								<!--Session-->
								<div class="row-fluid" data-bind="invisible: haveSession" style="width:100%;background: #fff; float: left; padding: 15px; margin-left: -15px;">
									<h2 style="padding:0 15px 0 0;" data-bind="text: lang.lang.start_session">Start Session</h2><br><br>
									<table class="table table-bordered table-primary table-striped table-vertical-center">
										<thead>
											<tr>
												<th class="center" style="width: 50px;"><span data-bind="text: lang.lang.no_">No.</span></th> 
												<th><span data-bind="text: lang.lang.amount">Amount</span></th>
												<th><span data-bind="text: lang.lang.currency">Currency</span></th>
											</tr> 
										</thead>
										<tbody data-role="listview" 
											data-template="cashier-session-template" 
											data-auto-bind="false"
											data-bind="source: cashierItemDS"></tbody>
									</table>
									<span class="btn btn-icon btn-primary glyphicons ok_2" style="width: 135px;float: left; margin-bottom: 0px;"><i></i><span data-bind="text: lang.lang.add_session, click: addSession">Save</span></span>
								</div>
								<!--End Session-->
								<div id="loadING" style="display:none;text-align: center;position: absolute;top: 0; left: 0;width: 100%; height: 100%;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
									<i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 45%;left: 45%"></i>
								</div>
								<div class="row" data-bind="visible: haveSession" style="background: #fff; float: left; width: 100%; padding: 15px 0 0;">
									<div class="col-sm-12" style="padding-right: 0;/">
										<!-- Upper Part -->
										<div class="row" >
											<div class="col-sm-12" style="display: none;">
												<div class="box-generic-noborder" >
													<div class="tab-content" style="padding-top: 12px;">
														<div class="col-sm-3" style="padding-left: 0;">
															<div class="control-group">
																<label ><span data-bind="text: lang.lang.license">License</span></label>
																<input 
																	data-role="dropdownlist" 
																	style="width: 100%;" 
																	data-option-label="License ..." 
																	data-auto-bind="false" 
																	data-value-primitive="true" 
																	data-text-field="name" 
																	data-value-field="id" 
																	data-bind="
																		value: licenseSelect,
																		source: licenseDS,
																		events: {change: licenseChange}">
															</div>
														</div>
														<div class="col-sm-3" style="padding-left: 0;">
															<div class="control-group">                             
																<label ><span data-bind="text: lang.lang.location">Bloc</span></label>
																<input 
																	data-role="dropdownlist" 
																	style="width: 100%;" 
																	data-option-label="Location ..." 
																	data-auto-bind="false" 
																	data-value-primitive="true" 
																	data-text-field="name" 
																	data-value-field="id" 
																	data-bind="
																		value: locationSelect,
																		source: locationDS,
																		events: {change: blocChange},
																		enabled: slocation">
															</div>
														</div>
														<div class="col-sm-3" style="padding-left: 0;">
															<div class="control-group">                             
																<label ><span data-bind="text: lang.lang.month_of">Month Of</span></label>
																<input type="text" 
																	style="width: 100%;" 
																	data-role="datepicker"
																	data-format="MM-yyyy"
																	data-start="year" 
																	data-depth="year" 
																	placeholder="Moth of ..." 
																	data-bind="value: monthSelect,
																				enabled: haveMonth,
																				events: {change: monthChange}" />
															</div>
														</div>
														<div class="col-sm-1" style="padding-left: 0;">
															<div class="control-group">
																<label ><span data-bind="text: lang.lang.action">Action</span></label>  
																<div class="row" style="margin: 0;">
																	<button type="button" data-role="button" data-bind="click: searchINV" class="k-button" role="button" aria-disabled="false" tabindex="0"><i class="icon-search"></i></button>
																</div>
															</div>
														</div>
														<div class="col-sm-2" data-bind="visible: downloadView" style="padding-left: 0;">
															<div class="control-group">
																<label ><span data-bind="text: lang.lang.download">Download</span></label>  
																<div class="row" style="margin: 0;">
																	<button type="button" data-role="button" data-bind="click: ExportExcel" class="k-button" role="button" aria-disabled="false" tabindex="0"><i class="download_alt"></i> <span data-bind="text: lang.lang.download"></span></button>
																</div>
															</div>
														</div>
														<div class="col-sm-2" data-bind="visible: balanceView" style="padding-left: 0;">
															<div class="control-group">
																<label ><span data-bind="text: lang.lang.balance">Download</span></label>   
																<div class="row" style="margin: 0;">
																	<button type="button" data-role="button" data-bind="click: serachBalance" class="k-button" role="button" aria-disabled="false" tabindex="0"><i class="download_alt"></i> <span data-bind="text: lang.lang.balance"></span></button>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row" >
											<div class="col-xs-12 col-sm-6">
												<div class="widget widget-heading-simple widget-body-primary widget-employees">
													<div class="widget-body padding-none" style="background: none; width: 100%; float: left; border: none; padding: 0;">
														<div class="row-fluid row-merge">
															<div class="listWrapper" style="min-height: 0; margin-bottom: 15px; padding: 0;">
																<div style="margin-bottom: 10px;">
																	<input id="ddlPaymentMethod" name="ddlPaymentMethod"
																			data-role="dropdownlist"
																			data-value-primitive="true"
																			data-text-field="name" 
																			data-value-field="id"
																			data-bind="
																				value: searchSelect,
																				source: searchSelectDS,
																				events: { change: changeSearchMethod}"
																			required data-required-msg="required" 
																			style="width: 100%" />
																</div>
																<div class="innerAll" style="padding: 15px 15px 0;overflow: hidden;">
																	<div class="widget-search separator bottom" data-bind="visible: haveSearchInv">
																		<button class="btn btn-default pull-right" data-bind="click: search"><i class="icon-search"></i></button>
																		<div class="overflow-hidden">
																			<input style="line-height: 26px;" type="text" placeholder="Invoice Number..." data-bind="
																				value: searchText,
																				events: {change: search}
																			">
																		</div>
																	</div>
																	<div style="margin-bottom: 15px;" data-bind="visible: haveSearchCus">
																		<input data-role="combobox"
																				data-placeholder="Customer Name"
																				data-value-primitive="true"
																				data-text-field="name"
																				data-value-field="id"
																				data-filter="contains"
																				data-min-length="3"
																				data-bind="
																					value: selectedCustomer,
																					source: customerDS,
																					events: {
																						change: search
																					}"
																			   style="width: 100%;"
																		/>
																	</div>
																	<div style="margin-bottom: 15px;" data-bind="visible: haveSearchMet">
																		<input data-role="combobox"
																				data-placeholder="Meter Number"
																				data-value-primitive="true"
																				data-text-field="number"
																				data-value-field="id"
																				data-filter="contains"
																				data-min-length="3"
																				data-bind="
																					value: selectedMeter,
																					source: searchMeterDS,
																					events: {
																						change: search
																					}"
																			   style="width: 100%;"
																		/>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="strong" style="margin-bottom: 15px; width: 100%; padding: 10px; float: left;" align="center"
													data-bind="style: { backgroundColor: amtDueColor}">
													<div align="left"><span data-bind="text: lang.lang.amount_received"></span></div>
													<h2 data-bind="text: total_received" align="right"></h2>
												</div>
											</div>
											<div class="col-xs-12 col-sm-6">
												<div class="box-generic-noborder" >
													<div class="tab-content">
														<!-- Options Tab content -->
														<div class="tab-pane active" id="tab1-1">
															<table style="margin-bottom: 0;" class="table table-borderless table-condensed cart_total">
																<tr>
																	<td><span data-bind="text: lang.lang.date"></span></td>
																	<td class="right">
																		<input id="issuedDate" name="issuedDate" 
																			data-role="datepicker"
																			data-format="dd-MM-yyyy"
																			data-parse-formats="yyyy-MM-dd HH:mm:ss"
																			data-bind="value: obj.issued_date, 
																						events:{ change : issuedDateChanges }" 
																			required data-required-msg="required"
																			style="width:100%;" />
																	</td>
																</tr>
																<tr>
																	<td>
																		<span data-bind="text: lang.lang.payment_term"></span>
																	</td>
																	<td>
																		<input id="ddlPaymentMethod" name="ddlPaymentMethod"
																			data-role="dropdownlist"
																			data-header-template="customer-payment-method-header-tmpl"
																			data-value-primitive="true"
																			data-text-field="name" 
																			data-value-field="id"
																			data-bind="value: obj.payment_method_id,
																						source: paymentMethodDS"
																			data-option-label="Select Method..."
																			required data-required-msg="required" 
																			style="width: 100%" />
																	</td>
																</tr>
																<tr>
																	<td><span data-bind="text: lang.lang.cash_account"></span></td>
																	<td>
																		<input id="ddlCashAccount" name="ddlCashAccount" 
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
																	</td>
																</tr>
																<tr>
																	<td><span data-bind="text: lang.lang.segment"></span></td>
																	<td>
																		<select data-role="multiselect"
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
																	</td>
																</tr>
															</table>
														</div>
													</div>
												</div>
											</div>
										</div>
										<table class="table table-bordered table-primary table-striped table-vertical-center" style="margin-top: 15px;">
											<thead>
												<tr>
													<th style="vertical-align: top;" data-bind="text: lang.lang.no_"></th>
													<th style="vertical-align: top;" data-bind="text: lang.lang.date"></th>
													<th style="vertical-align: top;" data-bind="text: lang.lang.name"></th>
													<th style="vertical-align: top;" data-bind="text: lang.lang.number"></th>
													<th style="vertical-align: top;" data-bind="text: lang.lang.meter"></th>
													<th style="vertical-align: top;" data-bind="text: lang.lang.amount"></th>
													<th style="vertical-align: top;" data-bind="visible: chhDiscount, text: lang.lang.discount"></th>
													<th style="vertical-align: top;" data-bind="text: lang.lang.receive"></th>
												</tr>
											</thead>
											<tbody data-role="listview" 
												data-template="cashReceipt-list-template" 
												data-auto-bind="false"
												data-bind="source: dataSource"></tbody>
										</table>
										<div class="row">
											<div class="col-xs-12 col-sm-5"> 
												<div class="btn-group">
													<div class="leadcontainer">
													</div>
													<a style="margin-bottom: 15px" class="btn btn-default dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-list"></i> </a>
													<ul class="dropdown-menu" style="padding: 5px; border-radius:0;">
														<li>
															<input type="checkbox" id="chhDiscount" class="k-checkbox" data-bind="checked: chhDiscount">
															<label class="k-checkbox-label" for="chhDiscount"><span data-bind="text: lang.lang.discount"></span></label>
														</li>
													</ul>
												</div>
												<br>
											</div>
											<div class="col-xs-12 col-sm-7">
												<table class="table table-condensed table-striped table-white">
													<tbody>
														<tr>
															<td class="right"><span data-bind="text: lang.lang.total_received"></span>:</td>
															<td class="right strong"><span data-bind="text: total_received"></span></td>
															<td class="right"><span data-bind="text: lang.lang.subtotal"></span>:</td>
															<td class="right strong" width="40%"><span data-format="n2" data-bind="text: obj.sub_total"></span></td>
														</tr>
														<tr>
															<td class="right"><span data-bind="text: lang.lang.remaining"></span>:</td>
															<td class="right strong"><span data-format="n2" data-bind="text: obj.remaining"></span></td>
															<td class="right"><span data-bind="text: lang.lang.total_discount"></span>:</td>
															<td class="right strong">
																<span data-format="n2" data-bind="text: obj.discount"></span>
															</td>
														</tr>
														<tr data-bind="visible: haveFine">
															<td></td>
															<td></td>
															<td class="right">
																<span data-bind="text: lang.lang.fine"></span>
															</td>
															<td class="right strong">
																<span data-format="n2" data-bind="text: amountFine"></span>
															</td>
														</tr>
														<tr>
															<td></td>
															<td></td>
															<td class="right"><h4 data-bind="text: lang.lang.total"></h4></td>
															<td class="right strong"><h4 data-bind="text: total"></h4></td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
										<div class="row">
											<div class="col-xs-12 col-sm-12 col-md-5" >
												<div class="well" style="overflow: hidden;">
													<textarea cols="0" rows="2" class="k-textbox" style="width:100% !important;" data-bind="value: obj.memo" placeholder="memo for external ..."></textarea>
													<textarea cols="0" rows="2" class="k-textbox" style="width:100% !important;" data-bind="value: obj.memo2" placeholder="memo for internal ..."></textarea>
												</div>
											</div>
											<div class="col-xs-12 col-sm-12 col-md-7" data-bind="visible: btnActive">
												<table class="table table-bordered table-primary table-striped table-vertical-center">
													<thead>
														<tr>
															<th style="vertical-align: top;"><span data-bind="text: lang.lang.no_">No.</span></th>
															<th style="vertical-align: top;"><span data-bind="text: lang.lang.currency">Currency</span></th>
															<th style="vertical-align: top;"><span data-bind="text: lang.lang.cash_receipt">Cash Receipt</span></th>
														</tr> 
													</thead>
													<tbody data-role="listview" 
														data-template="cash-currency-template" 
														data-auto-bind="false"
														data-bind="source: receipCurrencyDS"></tbody>
												</table>
												<div class="row-fluid" data-bind="visible: haveChangeMoney">
													<h5 data-bind="text: lang.lang.change_currency"></h5><br>
													<table class="table table-bordered table-primary table-striped table-vertical-center">
														<thead>
															<tr>
																<th class="center" style="width: 50px;"><span data-bind="text: lang.lang.no_">No.</span></th>
																<th><span data-bind="text: lang.lang.currency">Currency</span></th>
																<th><span data-bind="text: lang.lang.cash_receipt">Cash Receipt</span></th>
															</tr> 
														</thead>
														<tbody data-role="listview" 
															data-template="change-currency-receipt-template" 
															data-auto-bind="false"
															data-bind="source: receipChangeDS"></tbody>
													</table>
												</div>
											</div>
										</div>
										<div class="box-generic bg-action-button">
											<div id="ntf1" data-role="notification"></div>
											<div class="row">
												<div class="col-sm-12" align="right">
													<span class="btn-btn" data-bind="click: cancel" ><span data-bind="text: lang.lang.cancel"></span></span>
													<span id="saveNew" class="btn-btn" data-bind="visible: btnActive, click: save" ><span data-bind="text: lang.lang.save"></span></span>       
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
<script id="cashReceipt" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">         
				<div id="example" class="k-content">          

					<span class="glyphicons no-js remove_2 pull-right" 
					onclick="javascript:window.history.back()"
					data-bind="click: cancel"><i></i></span>

					<h2 data-bind="text: lang.lang.cash_receipt"></h2>                 

					<br>                  

					<!-- Upper Part -->
					<div class="row-fluid">
						<div class="span4">
							<div class="widget widget-heading-simple widget-body-primary widget-employees">   
								<div class="widget-body padding-none">      
									<div class="row-fluid row-merge">
										<div class="listWrapper">
											<div class="innerAll" style="padding: 15px 15px 19px;">             
												<form autocomplete="off" class="form-inline">
													<div class="widget-search separator bottom" style="padding-bottom: 0;">
														<button type="button" class="btn btn-default pull-right" data-bind="click: search"><i class="icon-search"></i></button>
														<div class="overflow-hidden">
															<input type="search" placeholder="Invoice Number..." data-bind="value: searchText, events:{change: search}">
														</div>
													</div>
												</form>         
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="strong" style="margin-bottom:0; width: 100%; padding: 10px; background: #D5DBDB;" align="center">
								<div align="left"><span >AMOUNT RECEIVED</span></div>
								<h2 align="right">0</h2>
							</div>                        
						</div>             

						<div class="span8" style="padding-right: 0; padding-left: 0;">

							<div class="box-generic-noborder" style="padding: 10px 10px 10px 10px">

								<table style="margin-bottom: 0;" class="table table-borderless table-condensed cart_total">
									<tr>
										<td><span >Date</span></td>
										<td class="right">
											<input id="issuedDate" name="issuedDate" 
											data-role="datepicker"
											data-format="dd-MM-yyyy"
											data-parse-formats="yyyy-MM-dd" 
											data-bind="value: obj.issued_date, 
											events:{ change : issuedDateChanges }" 
											required data-required-msg="required"
											style="width:100%;" />
										</td>
									</tr>                         
									<tr>
										<td>
											<span >Payment Term</span>
										</td>       
										<td>
											<input id="ddlPaymentMethod" name="ddlPaymentMethod"
											data-role="dropdownlist"                
											data-header-template="customer-payment-method-header-tmpl"
											data-value-primitive="true"
											data-text-field="name" 
											data-value-field="id"
											data-bind="value: obj.payment_method_id,
											source: paymentMethodDS"
											data-option-label="Select Method..."
											required data-required-msg="required" 
											style="width: 100%" />
										</td>
									</tr>
									<tr>
										<td><span >Cash Account</span></td>                           
										<td>
											<input id="ddlCashAccount" name="ddlCashAccount" 
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
										</td>                           
									</tr>                         
									<tr>
										<td><span >Segment</span></td>
										<td>
											<select data-role="multiselect"
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
										</td>
									</tr>                     
								</table>                        

							</div>         
						</div>
					</div>

					<!-- Item List -->
					<table class="table table-bordered table-primary table-striped table-vertical-center">
						<thead>
							<tr>
								<th class="center" style="width: 50px;" data-bind="text: lang.lang.no_"></th>                     
								<th data-bind="text: lang.lang.date"></th>
								<th data-bind="text: lang.lang.name"></th>
								<th data-bind="text: lang.lang.invoice"></th>
								<th style="width: 15%" data-bind="text: lang.lang.amount"></th>
								<th style="width: 15%" data-bind="text: lang.lang.discount"></th>
								<th style="width: 15%">RECEIVE</th>
							</tr> 
						</thead>
						<tbody data-role="listview" 
						data-template="cashReceipt-template" 
						data-auto-bind="false"
						data-bind="source: dataSource"></tbody>             
					</table>          

					<!-- Bottom part -->
					<div class="row-fluid">

						<!-- Column -->
						<div class="span5" style="padding-left: 0;">

							<div class="btn-group">
								<div class="leadcontainer">

								</div>
								<a class="btn btn-default dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-list"></i> </a>
								<ul class="dropdown-menu" style="padding: 5px; border-radius:0;">
									<li>
										<input type="checkbox" id="chbCheckNo" class="k-checkbox" data-bind="checked: showCheckNo">
										<label class="k-checkbox-label" for="chbCheckNo"><span data-bind="text: lang.lang.check_number"></span></label>
									</li>                             
								</ul>
							</div>

							<br>
							<div class="well" style="overflow: hidden;">
								<textarea cols="0" rows="2" class="k-textbox" style="width:100% !important;" data-bind="value: obj.memo" placeholder="memo for external ..."></textarea>                        
								<textarea cols="0" rows="2" class="k-textbox" style="width:100% !important;" data-bind="value: obj.memo2" placeholder="memo for internal ..."></textarea>
							</div>
						</div>
						<!-- Column END -->

						<!-- Column -->
						<div class="span7" style="padding-left: 0;">
							<table class="table table-condensed table-striped table-white">
								<tbody>
									<tr>
										<td class="right"data-bind="text: lang.lang.total_received"></td>
										<td class="right strong" data-bind="text: pay"></td>
										<td class="right" data-bind="text: lang.lang.subtotal"></td>
										<td class="right strong" width="40%" data-bind="text: sub_total"></td>
									</tr>               
									<tr>
										<td class="right" data-bind="text: lang.lang.remaining"></td>
										<td class="right strong"><span data-bind="text: remain"></span></td>
										<td class="right" data-bind="text: lang.lang.total_discount"></td>
										<td class="right strong">
											<span data-bind="text: discount"></span>
										</td>
									</tr>
									<tr>
										<td class="right"><span >Fine</span>:</td>
										<td class="right strong"><span data-bind="text: fine"></span></td>
										<td></td>
										<td></td>   
									</tr>          
								</tbody>
							</table>

							<table class="table table-bordered table-primary table-striped table-vertical-center">
								<thead>
									<tr>
										<th class="center" style="width: 50px;"><span >No.</span></th>             
										<th><span >Currency</span></th>
										<th><span >Cash Receipt</span></th>                                                                                       
									</tr> 
								</thead>
								<tbody data-role="listview" 
								data-template="cash-currency-template" 
								data-auto-bind="false"
								data-bind="source: reconReceipt.dataSource"></tbody>              
							</table>

							<button style="margin-bottom: 15px;" class="btn btn-inverse" data-bind="click: reconReceipt.addRow"><i class="icon-plus icon-white"></i></button>

							<table class="table table-condensed table-striped table-white">
								<tbody>                               
									<tr>
										<td></td>
										<td></td>
										<td class="right"><h4><span >Total Due</span>:</h4></td>
										<td class="right strong"><h4 data-bind="text: total"></h4></td>
									</tr>               
								</tbody>
							</table>

						</div>
						<!-- // Column END -->

					</div>             

					<!-- Form actions -->
					<div class="box-generic bg-action-button">
						<div id="ntf1" data-role="notification"></div>

						<div class="row">
							<div class="span3">
								<input data-role="dropdownlist"
								data-value-primitive="true"
								data-text-field="name"
								data-value-field="id"
								data-bind="value: obj.transaction_template_id,
								source: txnTemplateDS"
								data-option-label="Select Template..." />
							</div>
							<div class="span9" align="right">
								<span class="btn btn-icon btn-default glyphicons print" style="width: 120px;color:#444;margin-bottom: 0;"><i></i><span data-bind="click:printReciept, text: lang.lang.save_print">Save Print</span></span>
								<span class="btn btn-icon btn-primary glyphicons ok_2" data-bind="invisible: isEdit, click: save" style="width: 100px;"><i></i><span >Save</span></span>      
							</div>
						</div>
					</div>
					<!-- // Form actions END -->
					<!-- Upper Part -->               

				</div>              
			</div>
		</div>
	</div>
</script>
<script id="cashReceipt-list-template" type="text/x-kendo-tmpl">
	<tr data-uid="#: uid #">
		<td>
			<i class="icon-trash" data-bind="events: { click: removeRow }"></i>
			#:banhji.Receipt.dataSource.indexOf(data)+1#      
		</td>
		<td>#=kendo.toString(new Date(invissued_date), "dd-MMMM-yyyy", "km-KH")#</td>
		<td>#=contact_name#</td>
		<td>#=invnumber#</td>
		<td>#=meter#</td>
		<td class="center">
			#=kendo.toString(amountshow, locale=="km-KH"?"c0":"c", locale)#   
		</td>
		<td class="center" data-bind="visible: chhDiscount">
			<input data-role="numerictextbox"
			data-spinners="false"
			data-format="c0"
			data-culture="#:locale#"
			data-min="0"                   
			data-bind="value: discount,
			events: { change: changes }"
			style="width: 100%; text-align: right;">     
		</td>

		<td class="center">
			<input data-role="numerictextbox"
			data-spinners="false"
			data-format="c"
			data-culture="#:locale#"
			data-min="0"
			data-decimals="3"               
			data-bind="value: amount,
			events: { change: changes }"
			style="width: 100%; text-align: right;">     
		</td>
	</tr>   
</script>
<!-- ADVANCE SEARCH -->
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
							<span>#=number#</span>
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


<script id="saleCenter" type="text/x-kendo-template">	
	<div class="widget widget-heading-simple widget-body-gray widget-employees">
		<div class="widget-body padding-none">			
			<div class="row-fluid row-merge">
				<div class="span3 listWrapper" >
					<div class="innerAll">							
						<form autocomplete="off" class="form-inline">
							
							<div class="widget-search separator bottom">
								<button type="button" class="btn btn-default pull-right" data-bind="click: search"><i class="icon-search"></i></button>
								<div class="overflow-hidden">
									<input type="search" placeholder="Number or Name..." data-bind="value: searchText">
								</div>
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
						 data-auto-bind="true"
						 data-bind="source: contactDS"
						 data-row-template="saleCenter-customer-list-tmpl"
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
							        	<li style="font-size: large; color: black; font-weight: bold;">							            	
							            	<span data-bind="text: obj.name"></span>
							            </li>
							            <li class="glyphicons text_bigger active"><span data-toggle="tab" data-target="#tab1-4"><i></i></span>
							            </li>							            							            
							            <li class="glyphicons circle_info"><span data-toggle="tab" data-target="#tab2-4"><i></i></span>
							            </li>							            
							            <li class="glyphicons pen"><span data-toggle="tab" data-target="#tab3-4"><i></i></span>
							            </li>
							            <li class="glyphicons paperclip"><span data-toggle="tab" data-target="#tab4-4"><i></i></span>
							            </li>							            							            
							        </ul>
							        <div class="clearfix"></div>
							        <!-- // Tabs END -->

							    </div>
							    <!-- Widget Heading END -->

							    <div class="widget-body">
							        <div class="tab-content">

							            <!-- Transactions Tab content -->
							            <div id="tab1-4" class="tab-pane active box-generic">
							            	<table class="table table-borderless table-condensed cart_total cash-table">
								            	<tr>
								            		<td width="50%">
								            			<span class="btn btn-block btn-inverse" data-bind="click: goQuote"><span><span data-bind="text: lang.lang.quote"></span></span>
								            		</td>
								            		<td width="50%">
								            			<span class="btn btn-block btn-inverse" data-bind="click: goSaleOrder"><span><span data-bind="text: lang.lang.sale_order"></span></span>								            			
								            		</td>
								            	</tr>
								            	<tr>
								            		<td width="50%">
								            			<span class="btn btn-block btn-inverse" data-bind="click: goDeposit"><span><span data-bind="text: lang.lang.c_deposit"></span></span>
								            		</td>
								            		<td width="50%">								            											            			
								            		</td>
								            	</tr>
							            	</table>
							            </div>
							            <!-- // Transactions Tab content END -->							           					            

							            <!-- INFO Tab content -->
							            <div id="tab2-4" class="tab-pane box-generic">
							            	<div class="row-fluid">
							            		<div class="accounCetner-textedit">
									            	<table width="100%">
														<tr>
															<td width="40%"><span data-bind="text: lang.lang.customer_type"></span></td>
															<td width="60%">
																<span class="strong" data-bind="text: obj.contact_type"></span>
															</td>
														</tr>
														<tr>
															<td><span data-bind="text: lang.lang.number"></span></td>
															<td>
																<span class="strong" data-bind="text: obj.abbr"></span>
																<span class="strong" data-bind="text: obj.number"></span>
															</td>
														</tr>
														<tr>
															<td><span data-bind="text: lang.lang.name"></span></td>
															<td>
																<span data-bind="text: obj.name"></span>
															</td>
														</tr>
														<tr>
															<td><span data-bind="text: lang.lang.billed_address"></span></td>
															<td>
																<span data-bind="text: obj.address"></span>
															</td>
														</tr>								
														<tr>
															<td><span data-bind="text: lang.lang.phone"></span></td>
															<td>
																<span data-bind="text: obj.phone"></span>
															</td>
														</tr>
														<tr>
															<td><span data-bind="text: lang.lang.currency"></span></td>
															<td>										
																<span data-bind="text: currencyCode"></span>
															</td>
														</tr>
													</table>

													<span class="btn btn-primary btn-icon glyphicons edit pull-right" data-bind="click: goEdit"><i></i><span data-bind="text: lang.lang.view_edit_profile"></span></span>
												</div>
											</div>
							            </div>
							            <!-- // INFO Tab content END -->

							            <!-- NOTE Tab content -->
							            <div id="tab3-4" class="tab-pane">

										    <div>
												<input type="text" class="k-textbox" 
														data-bind="value: note" 
														placeholder="Add memo ..." 
														style="width: 366px;" />
												<span class="btn btn-primary" data-bind="click: saveNote"><span data-bind="text: lang.lang.add"></span></span>
											</div>

											<br>

											<div class="table table-condensed" style="height: 100;"						 
												 data-role="grid"
												 data-auto-bind="false"						 
												 data-bind="source: noteDS"
												 data-row-template="saleCenter-note-tmpl"
												 data-columns="[{title: ''}]"
												 data-height="100"						 
												 data-scrollable="{virtual: true}"></div>
											
							            </div>
							            <!-- // NOTE Tab content END -->

							            <!-- Attach Tab content -->
								        <div id="tab4-4" class="tab-pane">							            	
								            <p><span data-bind="text: lang.lang.file_type"></span> [PDF, JPG, JPEG, TIFF, PNG, GIF]</p>
								            <input id="files" name="files"
							                   type="file"
							                   data-role="upload"
							                   data-show-file-list="false"
							                   data-bind="events: { 
					                   				select: onSelect
							                   }">

								            <table class="table table-bordered">
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

										    <span class="btn btn-icon btn-success glyphicons ok_2" data-bind="click: uploadFile" style="color: #fff; padding: 5px 38px; text-align: left; width: 98px !important; display: inline-block; margin-top: 10px;"><i></i> <span data-bind="text: lang.lang.save"></span></span>

								        </div>
								        <!-- // Attach Tab content END -->							            								            

							        </div>
							    </div>
							</div>
						</div>

						<div class="span6" style="margin-bottom: 10px;">
							<div class="row-fluid">
								<div class="span6">
									<div class="widget-stats widget-stats-primary widget-stats-5" data-bind="click: loadQuote">
										<span class="glyphicons shopping_cart"><i></i></span>
										<span class="txt"><span data-bind="text: lang.lang.quote"></span><span data-bind="text: quote" style="font-size:medium;"></span></span>
										<div class="clearfix"></div>
									</div>
								</div>
								<div class="span6">
									<div class="widget-stats widget-stats-inverse widget-stats-5" data-bind="click: loadSO">
										<span class="glyphicons cart_in"><i></i></span>
										<span class="txt"><span data-bind="text: lang.lang.sale_order"></span><span data-bind="text: so" style="font-size:medium;"></span></span>
										<div class="clearfix"></div>
									</div>
								</div>
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
								<th><span data-bind="text: lang.lang.date"></span></th>
								<th><span data-bind="text: lang.lang.type"></span></th>								
								<th><span data-bind="text: lang.lang.reference_no"></span></th>
								<th><span data-bind="text: lang.lang.amount"></span></th>
								<th><span data-bind="text: lang.lang.status"></span></th>
								<th><span data-bind="text: lang.lang.action"></span></th>
							</tr>
						</thead>
	            		<tbody data-role="listview"
	            				data-auto-bind="false"
				                data-template="saleCenter-transaction-tmpl"
				                data-bind="source: transactionDS" >
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
</script>
<script id="saleCenter-transaction-tmpl" type="text/x-kendo-tmpl">
    <tr>    	  	
    	<td>#=kendo.toString(new Date(issued_date), "dd-MM-yyyy")#</td>
    	<td>#=type#</td>
        <!-- Reference -->
        <td>
        	#if(type=="Customer_Deposit" && amount<0){#			
				<a data-bind="click: goReference">#=number#</a>			
			#}else{#
				<a href="\#/#=type.toLowerCase()#/#=id#"><i></i> #=number#</a>
			#}#        	
        </td>
        <!-- Amount -->
    	<td class="right">
    		#if(type=="GDN"){#
    			#=kendo.toString(amount, "n0")#
    		#}else if(type=="Commercial_Invoice" || type=="Vat_Invoice" || type=="Invoice" || type=="Commercial_Cash_Sale" || type=="Vat_Cash_Sale" || type=="Cash_Sale"){#
    			#=kendo.toString(amount-deposit, locale=="km-KH"?"c0":"c", locale)#
    		#}else{#
    			#=kendo.toString(amount, locale=="km-KH"?"c0":"c", locale)#
    		#}#
    	</td>
    	<!-- Status -->
    	<td align="center">
    		#if(status=="4") {#
    			#=progress#
    		#}#

    		#if(type=="Quote"){#       		
				#if(status=="0"){#
        			Open      			
        		#}#
        	#}else if(type=="Sale_Order"){#
        		#if(status=="0"){#
        			Open
        		#}else{#
        			Done        			
        		#}#
        	#}else if(type=="GDN"){#
        		Delivered
        	#}else if(type=="Commercial_Invoice" || type=="Vat_Invoice" || type=="Invoice"){#
        		#if(status=="0" || status=="2") {#
        			# var date = new Date(), dueDate = new Date(due_date).getTime(), toDay = new Date(date).getTime(); #
					#if(dueDate < toDay) {#
						Over Due #:Math.floor((toDay - dueDate)/(1000*60*60*24))# days
					#} else {#
						#:Math.floor((dueDate - toDay)/(1000*60*60*24))# days to pay
					#}#
				#} else if(status=="1") {#
					Paid
				#} else if(status=="3") {#
					Returned
				#}#        	
        	#}#        				
		</td>
		<!-- Actions -->
    	<td align="center">
			#if(type=="Commercial_Invoice" || type=="Vat_Invoice" || type=="Invoice"){#
				#if(status=="0" || status=="2") {#
        			<a data-bind="click: payInvoice"><i></i> <span data-bind="text: lang.lang.receive_payment"></span></a>
        		#}#
        	#}#

        	#if(status=="4") {#
				<a href="\#/#=type.toLowerCase()#/#=id#"><i></i> Use</a>
    		#}#
		</td>     	
    </tr>
</script>
<script id="saleCenter-customer-list-tmpl" type="text/x-kendo-tmpl">
	<tr data-bind="click: selectedRow">
		<td>
			<div class="media-body strong">				
				<span>#=abbr##=number#</span>
				<span>#=name#</span>
			</div>
		</td>
	</tr>
</script>
<script id="saleCenter-note-tmpl" type="text/x-kendo-template">
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
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">					
				<div id="example" class="k-content">					
			    
			    	<span class="glyphicons no-js remove_2 pull-right" 
	    				onclick="javascript:window.history.back()"
						data-bind="click: cancel"><i></i></span>						
					
			        <h2 span data-bind="text: lang.lang.customers"></h2>			    		   

				    <br>

				    <!-- Top Part -->
			    	<div class="row-fluid">
			    		<div class="span6 well">									
							<div class="row">
								<div class="span6">														
									<!-- Group -->
									<div class="control-group">										
										<label for="ddlContactType"><span data-bind="text: lang.lang.customer_type"></span> <span style="color:red">*</span></label>
										<input id="ddlContactType" name="ddlContactType"
												   data-role="dropdownlist"
												   data-header-template="customer-type-header-tmpl"       
								                   data-value-primitive="true"
								                   data-text-field="name"
								                   data-value-field="id"
								                   data-bind="value: obj.contact_type_id,
								                   			  disabled: obj.is_pattern,
								                              source: contactTypeDS,
								                              events:{change: typeChanges}"
								                   data-option-label="(--- Select ---)"
								                   required data-required-msg="required" style="width: 100%;" />																				            
									</div>
									<!-- // Group END -->
								</div>

								<div class="span6" style="padding-right: 0;">	
									<!-- Group -->
									<div class="control-group">							
										<label for="txtAbbr"><span data-bind="text: lang.lang.number"></span> <span style="color:red">*</span></label>										
				              			<br>
				              			<input id="txtAbbr" name="txtAbbr" class="k-textbox"
					              				data-bind="value: obj.abbr, 
					              						   disabled: obj.is_pattern" 
					              				placeholder="eg. AB" required data-required-msg="required"
					              				style="width: 55px;" />
					              		-					              		
					              		<input id="txtNumber" name="txtNumber"
					              			   class="k-textbox"					              			   					                   
							                   data-bind="value: obj.number, 
							                   			  disabled: obj.is_pattern,
							                   			  events:{change:checkExistingNumber}"
							                   placeholder="eg. 001" required data-required-msg="required"
							                   style="width: 143px;" />
									</div>
									<!-- // Group END -->											
								</div>
							</div>
							
							<div class="row">
								<div class="span12">	
									<!-- Group -->
									<div class="control-group">								
										<label for="fullname"><span data-bind="text: lang.lang.full_name"></span> <span style="color:red">*</span></label>
							            <input id="fullname" name="fullname" class="k-textbox" 
							            		data-bind="value: obj.name, 
							            					disabled: obj.is_pattern,
							            					attr: { placeholder: phFullname }" 
							              		required data-required-msg="required"
							              		style="width: 100%;" />
									</div>																		
									<!-- // Group END -->
								</div>
							</div>

							<div class="row">
								<div class="span6">	
									<!-- Group -->
									<div class="control-group">								
										<label for="customerStatus"><span data-bind="text: lang.lang.status"></span> <span style="color:red">*</span></label>
							            <input id="customerStatus" name="customerStatus" 
							              				data-role="dropdownlist"
									            		data-text-field="name"
						           						data-value-field="id"
						           						data-value-primitive="true" 
									            		data-bind="source: statusList, value: obj.status"
									            		data-option-label="(--- Select ---)"
									            		required data-required-msg="required" style="width: 100%;" />
									</div>																		
									<!-- // Group END -->
								</div>

								<div class="span6">	
									<!-- Group -->
									<div class="control-group">								
										<label for="registeredDate"><span data-bind="text: lang.lang.register_date"></span> <span style="color:red">*</span></label>
							            <input id="registeredDate" name="registeredDate" 
								            		data-role="datepicker"			            		
					            					data-bind="value: obj.registered_date, disabled: obj.is_pattern" 
					            					data-format="dd-MM-yyyy"
					            					data-parse-formats="yyyy-MM-dd" 
					            					placeholder="dd-MM-yyyy" required data-required-msg="required" style="width: 100%;" />
									</div>																		
									<!-- // Group END -->
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
						    			<label for="latitute"><span data-bind="text: lang.lang.latitute"></span> </label>
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
						    			<label for="longtitute"><span data-bind="text: lang.lang.longtitute"></span> </label>
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
							
					<!-- // Bottom Tabs -->
					<div class="row-fluid">								
						<div class="box-generic">
						    <!-- //Tabs Heading -->
						    <div class="tabsbar tabsbar-1">
						        <ul class="row-fluid row-merge">						            
						            <li class="span2 glyphicons nameplate_alt active">
						            	<a href="#tab1" data-toggle="tab"><i></i> <span><span data-bind="text: lang.lang.info"></span></span></a>
						            </li>								            
						            <li class="span2 glyphicons usd">
						            	<a href="#tab2" data-toggle="tab"><i></i> <span><span data-bind="text: lang.lang.account"></span></span></a>
						            </li>
						            <li class="span2 glyphicons parents">
						            	<a href="#tab3" data-toggle="tab"><i></i> <span><span ></span>Contact</span></a>
						            </li>
						            <li class="span2 glyphicons notes">
						            	<a href="#tab4" data-toggle="tab"><i></i> <span>Invoice Note</span></a>
						            </li>						            					            
						        </ul>
						    </div>
						    <!-- // Tabs Heading END -->

						    <div class="tab-content">

						    	<!-- //GENERAL INFO -->
						        <div class="tab-pane active" id="tab1">
					            	<table class="table table-borderless table-condensed cart_total">					            		
							            <tr>
							                <td><span data-bind="text: lang.lang.vat_no"></span></td>
							              	<td>
					            				<input class="k-textbox" data-bind="value: obj.vat_no" 
													placeholder="e.g. 01234567897" style="width: 100%;" />									
							              	</td>							              	
							            	<td><span data-bind="text: lang.lang.phone"></span></td>
							              	<td><input class="k-textbox" data-bind="value: obj.phone" placeholder="e.g. 012 333 444" style="width: 100%;" /></td>
							            </tr>
							            <tr>
							            	<td><span data-bind="text: lang.lang.country"></span></td>
							              	<td>
							              		<input data-role="dropdownlist"
							              			   data-option-label="(--- Select ---)"
									                   data-value-primitive="true"
									                   data-text-field="name"
									                   data-value-field="id"
									                   data-bind="value: obj.country_id,
									                              source: countryDS" style="width: 100%;" />
							              	</td>							            								              	
							            	<td><span data-bind="text: lang.lang.email"></span></td>
							              	<td><input class="k-textbox" data-bind="value: obj.email" placeholder="e.g. me@email.com" style="width: 100%;" />							            	
							            </tr>
							            <tr>
							            	<td><span data-bind="text: lang.lang.city"></span></td>
							              	<td><input class="k-textbox" data-bind="value: obj.city" placeholder="city name ..." style="width: 100%;" /></td>							              	
							            	<td><span data-bind="text: lang.lang.post_code"></span></td>
							              	<td><input class="k-textbox" data-bind="value: obj.post_code" placeholder="e.g. 12345" style="width: 100%;" /></td>
							            </tr>							            
							            <tr style="vertical-align: top;">
							            	<td><span data-bind="text: lang.lang.address"></span></td>
							              	<td><textarea class="k-textbox" data-bind="value: obj.address" placeholder="where you live ..." style="width: 100%;" /></textarea></td>									            								              	
							            	<td><span data-bind="text: lang.lang.memo"></span></td>
							              	<td><textarea rows="2" class="k-textbox" data-bind="value: obj.memo" placeholder="memo ..." style="width: 100%;" ></textarea></td>							              	
							            </tr>									            
							            <tr  style="vertical-align: top;">
							            	<td>
							            		<span for="txtBillTo" data-bind="click: copyBillTo"><span data-bind="text: lang.lang.bill_to"></span> </span>											            
							            	</td>
							            	<td>
							            		<textarea rows="2" class="k-textbox" style="width:100%" data-bind="value: obj.bill_to" placeholder="billed to ..."></textarea>
							            	</td>
							            	<td><span data-bind="text: lang.lang.delivered_to"></span></td>
							            	<td>
							            		<textarea rows="2" class="k-textbox" style="width:100%" data-bind="value: obj.ship_to" placeholder="delivered to ..."></textarea>
							            	</td>
							            </tr>							            							            							            								            								            			            
							        </table>
					        	</div>
						        <!-- //GENERAL INFO END -->

						        <!-- //ACCOUNTING -->
						        <div class="tab-pane" id="tab2">
						        	
						        	<div class="row-fluid">								        		
						            	<div class="span3">
											<label for="ddlAR"><span data-bind="text: lang.lang.account_receiveable"></span> <span style="color:red">*</span></label>
											<input id="ddlAR" name="ddlAR"
												   data-role="dropdownlist"
												   data-header-template="account-header-tmpl"
												   data-template="account-list-tmpl"      
								                   data-value-primitive="true"
								                   data-text-field="name"
								                   data-value-field="id"
								                   data-bind="value: obj.account_id,
								                              source: arDS"
								                   data-option-label="(--- Select ---)"
								                   required data-required-msg="required" style="width: 100%;" />													
										</div>
										<div class="span3">
											<label for="ddlRA"><span data-bind="text: lang.lang.revenue_account"></span> <span style="color:red">*</span></label>
											<input id="ddlRA" name="ddlRA"
												   data-role="dropdownlist"
												   data-header-template="account-header-tmpl"
												   data-template="account-list-tmpl" 
								                   data-value-primitive="true"
								                   data-text-field="name"
								                   data-value-field="id"
								                   data-bind="value: obj.ra_id,
								                              source: raDS"
								                   data-option-label="(--- Select ---)"
								                   required data-required-msg="required" style="width: 100%;" />													
										</div>
										<div class="span3">
											<label for="ddlDepositAccount"><span data-bind="text: lang.lang.deposit_account"></span> <span style="color:red">*</span></label>
											<input id="ddlDepositAccount" name="ddlDepositAccount"
												   data-role="dropdownlist"
												   data-header-template="account-header-tmpl"
												   data-template="account-list-tmpl"      
								                   data-value-primitive="true"
								                   data-text-field="name"
								                   data-value-field="id"
								                   data-bind="value: obj.deposit_account_id,
								                              source: depositDS"
								                   data-option-label="(--- Select ---)"
								                   required data-required-msg="required" style="width: 100%;" />													
										</div>
										<div class="span3">
											<label for="ddlTradeDiscount"><span data-bind="text: lang.lang.trade_discount"></span> <span style="color:red">*</span></label>
											<input id="ddlTradeDiscount" name="ddlTradeDiscount"
												   data-role="dropdownlist"
												   data-header-template="account-header-tmpl"
												   data-template="account-list-tmpl"      
								                   data-value-primitive="true"
								                   data-text-field="name"
								                   data-value-field="id"
								                   data-bind="value: obj.trade_discount_id,
								                              source: tradeDiscountDS"
								                   data-option-label="(--- Select ---)"
								                   required data-required-msg="required" style="width: 100%;" />														
										</div>												
							        </div>

							        <div class="separator line bottom"></div>

							        <div class="row-fluid">
						        		<div class="span3">						
								            <label for="currency"><span data-bind="text: lang.lang.currency"></span> <span style="color:red">*</span></label>
								            <input id="currency" name="currency" 
								            	data-role="dropdownlist"
								            	data-template="currency-list-tmpl"
								            	data-value-primitive="true"
								                data-text-field="code"
								                data-value-field="locale"
												data-bind="value: obj.locale,
															disabled: isProtected, 
															source: currencyDS"
												data-option-label="(--- Select ---)" 
												required data-required-msg="required" style="width: 100%;" />
								        </div>
						            	<div class="span3">
											<label for="ddlPaymentTerm"><span data-bind="text: lang.lang.payment_term"></span></label>
											<input id="ddlPaymentTerm" name="ddlPaymentTerm"
												data-header-template="customer-term-header-tmpl"
												data-role="dropdownlist"
								            	data-value-primitive="true"
								                data-text-field="name"
								                data-value-field="id"
												data-bind="value: obj.payment_term_id, source: paymentTermDS" 
												data-option-label="(--- Select ---)"
												style="width: 100%;" />
										</div>
										<div class="span3">
											<label for="ddlPaymentMethod"><span data-bind="text: lang.lang.payment_method"></span></label>
											<input id="ddlPaymentMethod" name="ddlPaymentMethod"
												data-header-template="customer-payment-method-header-tmpl"
												data-role="dropdownlist"
								            	data-value-primitive="true"
								                data-text-field="name"
								                data-value-field="id"
												data-bind="value: obj.payment_method_id, source: paymentMethodDS"
												data-option-label="(--- Select ---)" 
												style="width: 100%;" />
										</div>
										<div class="span3">
											<label for="ddlSettlementDiscount"><span data-bind="text: lang.lang.settlement_discount"></span> <span style="color:red">*</span></label>
											<input id="ddlSettlementDiscount" name="ddlSettlementDiscount"
												   data-role="dropdownlist"
												   data-header-template="account-header-tmpl"
												   data-template="account-list-tmpl"      
								                   data-value-primitive="true"
								                   data-text-field="name"
								                   data-value-field="id"
								                   data-bind="value: obj.settlement_discount_id,
								                              source: settlementDiscountDS"
								                   data-option-label="(--- Select ---)"
								                   required data-required-msg="required" style="width: 100%;" />														
										</div>												
							        </div>

							        <div class="separator line bottom"></div>

							        <div class="row-fluid">
							        	<div class="span3">
											<label for="ddlTaxItem"><span data-bind="text: lang.lang.tax"></span></label>
											<input id="ddlTaxItem" name="ddlTaxItem"
												   data-role="dropdownlist"								
												   data-header-template="tax-header-tmpl"
								                   data-value-primitive="true"
								                   data-text-field="name"
								                   data-value-field="id"
								                   data-bind="value: obj.tax_item_id,
								                              source: taxItemDS"
								                   data-option-label="(--- Select ---)"
								                   style="width: 100%;" />
										</div>	
								        <div class="span3">
											<label for="txtCreditLimit"><span data-bind="text: lang.lang.credit_limit"></span> </label>								              		
								            <input data-role="numerictextbox"
								                   data-format="n"
								                   data-min="0"										                   
								                   data-bind="value: obj.credit_limit"										                  
								                   style="width: 100%;">
										</div>																							
									</div>
					        	</div>
						        <!-- //ACCOUNTING END -->						       

						        <!-- //CONTACT PERSON -->
						        <div class="tab-pane" id="tab3">
						        	<span style="margin-bottom: 15px;" class="btn btn-primary btn-icon glyphicons circle_plus" data-bind="click: addEmptyContactPerson"><i></i><span data-bind="text: lang.lang.new_contact_person"></span></span>

						        	<table class="table table-bordered table-white">
								        <thead>
								            <tr>
								                <th><span data-bind="text: lang.lang.name"></span></th>
								                <th><span data-bind="text: lang.lang.department"></span></th>						                
								                <th><span data-bind="text: lang.lang.phone"></span></th>
								                <th><span data-bind="text: lang.lang.email"></span></th>
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

						        <!-- //INVOICE NOTE -->
						        <div class="tab-pane" id="tab4">
						        	<textarea data-role="editor"
					                      data-tools="['bold',
					                                   'italic',
					                                   'underline',
					                                   'strikethrough',
					                                   'justifyLeft',
					                                   'justifyCenter',
					                                   'justifyRight',
					                                   'justifyFull']"
					                      data-bind="value: obj.invoice_note"
					                      style="height: 200px;"></textarea>
					        	</div>
						        <!-- //INVOICE NOTE END -->

						    </div>
						</div>
					</div>

					<br>											
					
					<!-- Form actions -->
					<div class="box-generic bg-action-button">
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
							<div class="span4" style="padding-left: 15px;"><a style="color: #fff; float: left;">Print Preview</a></div>
							<div class="span8" align="right">
								<span class="btn-btn" onclick="javascript:window.history.back()" data-bind="click: cancel"><i></i> <span data-bind="text: lang.lang.cancel"></span></span>
								<span class="btn-btn" data-bind="click: openConfirm, visible: isEdit"><span data-bind="text: lang.lang.delete"></span></span>
								<span role='presentation' class='dropdown btn-btn' style="padding: 0 0 0 15px; float: right; height: 32px; line-height: 30px;">
							  		<a style="color: #fff; padding: 0;" class='dropdown-toggle glyphicons' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'>
							  			<span data-bind="text: lang.lang.save_option"></span>
							  			<span class="small-btn"><i class='caret '></i></span>
							  		</a>
							  		<ul class='dropdown-menu'>
						  				<li id="saveNew" data-bind="invisible: isEdit"><span data-bind="text: lang.lang.save_new"></span></li>
						  				<!-- <li id="savePrint"><span data-bind="text: lang.lang.save_print"></span></li> -->
						  			</ul>
							  	</span>
							  	<span class="btn-btn" id="saveClose"><span data-bind="text: lang.lang.save_close"></span></span>
							  	<span class="btn-btn" id="saveDraft"><span data-bind="text: lang.lang.save_draft"></span></span>
								<!-- <span class="btn-btn" data-bind="invisible: isEdit"><span data-bind="text: lang.lang.save_new"></span></span>
								<span class="btn-btn"><span data-bind="text: lang.lang.save_close"></span></span>
								<span class="btn-btn"><span data-bind="text: lang.lang.save_print"></span></span> -->
							</div>
						</div>
					</div>
					<!-- // Form actions END -->

				</div>
			</div>
		</div>
	</div>
</script>
<script id="contact-person-row-tmpl" type="text/x-kendo-tmpl">
	<tr>		
		<td>
			<input id="name" name="name" 
					type="text" class="k-textbox" 
					data-bind="value: name"
					placeholder="eg: Mr. John" 
					required="required" validationMessage="required" style="width: 190px;" />
            <span data-for="name" class="k-invalid-msg"></span>
		</td>
		<td>
			<input type="text" class="k-textbox" data-bind="value: department" placeholder="eg: Accounting" style="width: 190px;" />
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
<!-- FUNCTIONS -->
<script id="sale" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">					
				<div id="example" class="k-content">
					<span class="pull-right glyphicons no-js remove_2" 
						onclick="javascript:window.history.back()"><i></i></span>

					<br>
					<br>

					<div class="row-fluid">
					    <!-- Tabs -->
						<div class="relativeWrap" data-toggle="source-code">
							<div class="widget widget-tabs widget-tabs-gray report-tab">
							
								<!-- Tabs Heading -->
								<div class="widget-head widget-custome" style="background: #203864 !important;">
									<ul>
										<li class="active"><a  class="glyphicons search" href="#tab-1" data-toggle="tab"><i></i>Search</a></li>
										<li><a  class="glyphicons cargo" href="#tab-2" data-toggle="tab"><i></i>Category</a></li>
										<li><a  class="glyphicons heart" data-toggle="tab" data-bind="click: favorite"><i></i>Favorite</a></li>
									</ul>
									<div style="float: right;">
										<span style="position: relative; height: 35px; line-height: 35px; padding-right: 15px; float: left; display: block; ">
											<a style="color: #fff; margin-top: 4px; line-height: 17px;" class="glyphicons shopping_cart" href="#/quote" >
												<i></i><span class="badge fix badge-primary" style="color: #fff; position: absolute; left: -8px; top: -9px; background: red;" data-bind="text: quoteLineDS.total()"></span>
												Quote												
											</a>
										</span>
										<sapn style="position: relative; height: 35px; line-height: 35px; padding-left: 15px; float: left; display: block; border-left: 1px solid #efefef;">
											<a style="color: #fff; margin-top: 4px; line-height: 17px;" class="glyphicons cart_in" href="#/sale_order" >
												<i></i><span class="badge fix badge-primary" style="color: #fff; position: absolute; left: -12px; top: -9px; background: red;" data-bind="text: soLineDS.total()"></span>
												Sale Order
											</a>
										</span>
									</div>

									
								</div>
								<!-- // Tabs Heading END -->								
								<div class="widget-body">
									<div class="tab-content">
								        <div class="tab-pane active" id="tab-1">
											<input type="text" class="span2 search-query" placeholder="Search" id="search-placeholder" data-bind="value: searchText" style="background-color: #fff; color: #333; border-color: #ddd; height: 33px; width: 192px;">
											<button type="submit" class="btn btn-inverse" data-bind="click: search"><i class="icon-search"></i></button>					
									    </div>
									    <div class="tab-pane" id="tab-2">

									    	<ul data-role="listview"
									    		 data-auto-bind="false"
									    		 data-selectable="true"
								                 data-template="sale-category-template"
								                 data-bind="source: categoryDS,"
								                 style="overflow: auto; padding-top: 15px; padding-left: 15px; padding-bottom: 15px;"></ul>
									    	
									    </div>
									   								        							       
								    </div>
								</div>
							</div>
						</div>
						<!-- // Tabs END -->						
					</div>

					<div class="row-fluid" id="main-section" style="overflow: hidden;margin-top: 15px;">
						<ul data-role="listview"
							 data-auto-bind="false"
			                 data-template="sale-template"
			                 data-bind="source: dataSource"
			                 style="height: 300px; "></ul>
			        </div>

			        <div id="pager" class="k-pager-wrap"
				    	 data-auto-bind="false"
			             data-role="pager" data-bind="source: dataSource"></div>


			        <!--  Top Up Sale Detail -->
			        <div class="modal fade popRightBlog-saleDetail" id="saleDetail">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="margin-right: 15px; font-size: 35px; color: #000;">×</button>
						<div class="row-fluid sale-detail">
							<div id="details">
				                <a id="navigate-prev" data-bind="click: prevItem"></a>
			                	
			                	<div id="detail-info" style="background: none;">
			                		<img class="main-image" width="200px" data-bind="attr: { src: obj.image_url, alt: obj.name, title: obj.name }" style="border: 1px solid #ddd;">
			                		<div id="description">
										<h1 data-bind="text:obj.name"></h1>
										<p data-bind="text:obj.sale_description"></p>
										<div id="details-total">
											<p id="price-quantity" data-bind="text:obj.item_prices[0].price" style="font-weight: 600;color: #333;background: none; font-size: 30px;padding-left: 0;"></p>												
										</div>
									</div>
								</div>
								<div id="nutrition-info" style="border: 1px solid #ddd;">
									<h2 style="padding-top: 15PX;padding-bottom: 5px;padding-left: 10px;font-size: 20px;font-weight: 600;">Information</h2>
									<dl>
										<dt style="padding-left: 10px;">Categories:</dt>
										<dd data-bind="text:obj.category"></dd>
										<dt style="padding-left: 10px;">UOM</dt>
										<dd data-bind="text:obj.measurement_id"></dd>
										<dt style="padding-left: 10px;">On Hand</dt>
										<dd data-bind="text:on_hand"></dd>
										<dt style="padding-left: 10px;">On SO</dt>
										<dd data-bind="text:on_so"></dd>
										<dt style="padding-left: 10px;">On PO</dt>
										<dd data-bind="text:on_po"></dd>
									</dl>
								</div>

								<a data-bind="click: nextItem" id="navigate-next"></a>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</script>
<script id="sale-category-template" type="text/x-kendo-tmpl">
    <li class="btn btn-primary" 
    	data-bind="text: name, click: selectedType"
    	style="width: auto !important; text-align: center; padding:5px 10px !important; margin-bottom: 10px;">
    </li>
</script>
<script id="sale-template" type="text/x-kendo-tmpl">	
	<li class="products span2" aria-selected="false" >
	    <a class="view-details" href="\#saleDetail" data-toggle="modal" data-bind="click:loadDetail">
	        <img class="main-image" src="#= image_url!==null ? image_url : banhji.no_image #" alt="#=name#" title="#=name#">
	    </a>
	    <div style=" padding-bottom: 49px;">
	        <strong style="color: \#2B569A;">#=name#</strong>
	        <span style="color: \#2B569A;" class="price"><span>$</span><span data-bind="text: price"></span></span>

		    <div class="add-to-cart row-fluid""> 
		    	<span class="span5" data-bind="click: addQuote" style="background: \#203864; padding: 5px; cursor: pointer; width: 60px; margin-left: 7px; color: \#fff;"> Quote </span>
		    	<span class="span6" data-bind="click: addSO" style="background: \#1b8330; padding: 5px; margin-left: 5px; cursor: pointer; width: 58px; color: \#fff;"> Order </span>
		    </div>
		</div>
	</li>
</script>
<script id="quote" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">					
				<div id="example" class="k-content">					
				    
			    	<span class="glyphicons no-js remove_2 pull-right" 
		    				onclick="javascript:window.history.back()"
							data-bind="click: cancel"><i></i></span>

			        <h2 data-bind="text: lang.lang.quote"></h2>

				    <br>

					<!-- Upper Part -->
					<div class="row-fluid">
						<div class="span4">
							<div class="box-generic well" style="height: 190px;">				
								<table class="table table-borderless table-condensed cart_total">									
									<tr>
										<td style="width: 50px;"><span data-bind="text: lang.lang.no_"></span></td>
										<td>
											<input id="txtNumber" name="txtNumber" class="k-textbox" 
													data-bind="value: obj.number,
																disabled: obj.is_recurring,
																events:{change:checkExistingNumber}" 
													required data-required-msg="required" 
													placeholder="eg. ABC00001" style="width: 83%; float: left; margin-right: 5px;" />
											<div style="padding-left: 0; width: 25px; float: left;">
												<a class="glyphicons no-js qrcode" data-bind="click: generateNumber" title="Generate Number" style="float: left; margin: 2px 0 0 0 ;"><i></i></a>
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
													required data-required-msg="required"
													style="width: 210px;" />
										</td>
									</tr>								
									<tr>
										<td><span data-bind="text: lang.lang.customers"></span></td>
										<td>
											<input id="cbbContact" name="cbbContact"
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
								                   required data-required-msg="required" style="width: 210px;" />
										</td>
									</tr>																															
								</table>

								<div class="strong" style="background: #eee;  border: 1px solid #ddd; width: 100%; padding: 10px;" align="center"
									data-bind="style: { backgroundColor: amtDueColor}">
									<div align="left"><span data-bind="text: lang.lang.amount_quoted"></span></div>
									<h2 data-bind="text: total" align="right"></h2>
								</div>

							</div>						
						</div>					   

						<div class="span8">

							<div class="box-generic-noborder" style="min-height: 234px !important">

							    <!-- Tabs Heading -->
							    <div class="tabsbar tabsbar-2">
							        <ul class="row-fluid row-merge">
							        	<li class="span1 glyphicons cogwheels active"><a href="#tab1-5" data-toggle="tab"><i></i> </a>
							            </li>
							            <li class="span1 glyphicons adress_book"><a href="#tab2-5" data-toggle="tab"><i></i> </a>
							            </li>
							            <li class="span1 glyphicons circle_info"><a href="#tab3-5" data-toggle="tab"><i></i> </a>
							            </li>
							            <li class="span1 glyphicons paperclip"><a href="#tab4-5" data-toggle="tab"><i></i></a>
							            </li>						            
							            <li class="span1 glyphicons history"><a href="#tab5-5" data-toggle="tab"><i></i> <span data-bind="text: lang.lang.recuring"></span></a>
							            </li>						            								            
							        </ul>
							    </div>
							    <!-- // Tabs Heading END -->

							    <div class="tab-content">

							    	<!-- Options Tab content -->
							        <div class="tab-pane active" id="tab1-5">						            
							            <table style="margin-bottom: 0;" class="table table-borderless table-condensed cart_total">							            
											<tr>
												<td>
													<span data-bind="text: lang.lang.balance"></span> <span data-bind="text: balance"></span>
												</td>										
												<td>
													<span data-bind="text: lang.lang.credit_allowed"></span> <span data-format="n" data-bind="text: obj.credit_allowed"></span>
												</td>
											</tr>
								            <tr>
								            	<td><span data-bind="text: lang.lang.validity_date"></span></td>
								            	<td>
								            		<input id="txtDueDate" name="txtDueDate" 
															data-role="datepicker"
															data-format="dd-MM-yyyy"
															data-parse-formats="yyyy-MM-dd" 
															data-bind="value: obj.due_date" 
															required data-required-msg="required"
															style="width:100%;" />
								            	</td>
								            </tr>							           
											<tr>							            				
												<td>
								            		<span data-bind="text: lang.lang.refrence"></span>	            						            		
								            	</td>
								            </tr>
								            <tr>
								            	<td>
								            		<span data-bind="text: lang.lang.term"></span>     		
								            	</td>				
												<td>
													<input data-role="dropdownlist"														
								              				data-value-primitive="true"
															data-text-field="name" 
								              				data-value-field="id"	
								              				data-header-template='customer-term-header-tmpl'					              				 
								              				data-bind="value: obj.payment_term_id,
								              							source: paymentTermDS,
								              							events:{ change: setTerm }"
								              				data-option-label="Select Term..." 
								              				style="width: 100%" />
												</td>
											</tr>
							            </table>						            
							        </div>
							        <!-- // Options Tab content END -->

							        <!-- Address Tab content -->
							        <div class="tab-pane" id="tab2-5">
							        	<span data-bind="text: lang.lang.billing_address"></span>
										<textarea cols="0" rows="2" class="k-textbox" style="width:100%" data-bind="value: obj.bill_to" placeholder="Billing to ..."></textarea>								
										
										<span data-bind="text: lang.lang.delivery_address"></span>
										<textarea cols="0" rows="2" class="k-textbox" style="width:100%" data-bind="value: obj.ship_to" placeholder="Shipping to ..."></textarea>	
												
							        </div>
							        <!-- // Address Tab content END -->

							        <!-- Info Tab content -->
							        <div class="tab-pane" id="tab3-5">
							        	
										<table class="table table-borderless table-condensed cart_total">
											<tr>
												<td><span data-bind="text: lang.lang.segments"></span></td>
												<td>
													<select data-role="multiselect"
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
												</td>
											</tr>
											<tr>
												<td><span data-bind="text: lang.lang.job"></span></td>
												<td>
													<input id="ddlJob" name="ddlJob"
														   data-role="dropdownlist"
														   data-header-template="job-header-tmpl"
														   data-template="job-list-tmpl"
														   data-auto-bind="false"				                
										                   data-value-primitive="true"		   
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.job_id, 
										                   			source: jobDS"
										                   data-option-label="Select job..." 
										                   style="width: 100%" />										
												</td>
											</tr>											
							            </table>
												
							        </div>
							        <!-- // Info Tab content END -->

							        <!-- Attach Tab content -->
							        <div class="tab-pane" id="tab4-5">
							         	<p><span data-bind="text: lang.lang.file_type"></span>: [PDF, JPG, JPEG, TIFF, PNG, GIF]</p>							            	
							            
							            <input id="files" name="files"
						                   type="file"
						                   data-role="upload"
						                   data-show-file-list="false"
						                   data-bind="events: { 
				                   				select: onSelect
						                   }">

							            <table class="table table-bordered">
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
							        <!-- // Attach Tab content END -->						        

							        <!-- Recurring Tab content -->
							        <div class="tab-pane" id="tab5-5">
							            <table style="width: 100%" class="table borderless">
							            	<tr align="right">
							            		<td style="border-top: 0;">
							            			<span data-bind="text: lang.lang.name"></span>
							            		</td>
							            		<td style="border-top: 0;">
							            			<input id="txtRecurringName" name="txtRecurringName"
							            					class="k-textbox" 
							            					data-bind="value: obj.recurring_name" 
							            					placeholder="Recurring name.." 
							            					style="width: 43%; " />

							            			<span data-bind="text: lang.lang.start"></span>

									                <input data-role="datepicker"
															data-format="dd-MM-yyyy"
															data-parse-formats="yyyy-MM-dd"
															data-bind="value: obj.start_date"
															style="width: 40%; " />
							            		</td>
							            	</tr>
							            	<tr align="right">
							            		<td style="border-top: 0;">
								            		<span data-bind="text: lang.lang.every"></span>
								            	</td>
							            		<td style="border-top: 0;">
								            		<input data-role="numerictextbox"
									                   data-format="n0"
									                   data-min="0"								                   
									                   data-bind="value: obj.interval"
									                   style="width: 45%; " />

								            		<input data-role="dropdownlist"									                   
										                   data-value-primitive="true"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.frequency,
										                              source: frequencyList,
										                              events: { change: frequencyChanges }"
										                   style="width: 45%;" />
								            	</td>
							            	</tr>
								            <tr align="right">
								            	<td style="border-top: 0;">
								            		<span data-bind="text: lang.lang.on"></span>
								            	</td>							            	
								            	<td style="border-top: 0;">

								            		<input data-role="dropdownlist"									                   
										                   data-value-primitive="true"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.month,
										                   			  visible: showMonth,
										                              source: monthList"										                   
										                   style="width: 45%;" />

								            		<input data-role="dropdownlist"									                   
										                   data-value-primitive="true"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.month_option,
										                   			  visible: showMonthOption,
										                              source: monthOptionList,
										                              events: { change: monthOptionChanges }"										                   
										                   style="width: 45%;" />

								            		<input data-role="dropdownlist"									                   
										                   data-value-primitive="true"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.week,
										                   			  visible: showWeek,
										                              source: weekDayList"										                  
										                   style="width: 45%;" />										            
										        
								            		<input data-role="dropdownlist"									                   
										                   data-value-primitive="true"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.day,
										                   			  visible: showDay,
										                              source: dayList"										                   
										                   style="width: 45%;" />

								            	</td>
								            </tr>
							            </table>

							            <span id="saveRecurring" class="btn btn-icon btn-default glyphicons history" data-bind="visible: obj.isNew" style="float: right; margin-top: -12px;"><i></i> <span data-bind="text: lang.lang.save_recurring"></span></span>
							        </div>
							        <!-- // Recuring Tab content END -->						        								        

							    </div>
							</div>

					    </div>
					</div>

					<!-- Item List -->
					<div data-role="grid" class="costom-grid"
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
						        	var rowIndex = banhji.quote.lineDS.indexOf(dataItem)+1;
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
                            { field: 'measurement', title: 'UOM', editor: measurementEditor, template: '#=measurement.measurement#', width: '80px' },
                            {
							    field: 'price',
							    title: 'PRICE',
							    format: '{0:n}',
							    editor: numberTextboxEditor,
							    width: '120px',
							    attributes: { style: 'text-align: right;' }
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
                            { field: 'amount', title:'AMOUNT', format: '{0:n}', editable: 'false', attributes: { style: 'text-align: right;' }, width: '120px' },
                            { field: 'tax_item', title:'TAX', editor: taxForSaleEditor, template: '#=tax_item.name#', width: '90px' }
                         ]"
                         data-auto-bind="false"
		                 data-bind="source: lineDS" ></div>	
									
		            <!-- Bottom part -->
		            <div class="row-fluid">
			
						<!-- Column -->
						<div class="span4">
							<button class="btn btn-inverse" data-bind="click: addRow"><i class="icon-plus icon-white"></i></button>												

							<!-- Add New Item -->
							<ul class="topnav addNew">
								<li role="presentation" class="dropdown ">
							  		<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
							  			<span data-bind="text: lang.lang.add_new_item"></span>
				    					<span class="caret"></span>
							  		</a>
						  			<ul class="dropdown-menu addNewItem">  				  				
						  				<li><a href='#/item'><span data-bind="text: lang.lang.add_inventory_for_sale"></span></a></li>
						  				<li><a href='#/non_inventory_part'><span data-bind="text: lang.lang.add_noninventory_for_sale"></span></a></li>						  				
						  				<li><a href='#/item_service'><span data-bind="text: lang.lang.add_services"></span></a></li>
						  				<li><a href='#/txn_item'><span data-bind="text: lang.lang.add_transaction_item"></span></a></li>  				
						  				 				
						  			</ul>
							  	</li>				
							</ul>
							<!--End Add New Item -->

							<br><br>
							<div class="well">
								<textarea cols="0" rows="2" class="k-textbox" style="width:100%" data-bind="value: obj.memo2" placeholder="memo for internal ..."></textarea>
								<br>
								<textarea cols="0" rows="2" class="k-textbox" style="width:100%" data-bind="value: obj.memo" placeholder="memo for external ..."></textarea>
							</div>
						</div>
						<!-- Column END -->

						<!-- Column -->
						<div class="span4" align="center">
							<div data-bind="visible: isEdit" style="margin-top: 10%;">
								<h2 data-bind="text: statusObj.text" style="text-transform: uppercase;"></h2>
								<p data-bind="text: statusObj.date"></p>
								<a data-bind="text: statusObj.number,
											attr: { href: statusObj.url }"></a>
							</div>
						</div>
						<!-- Column END -->
						
						<!-- Column -->
						<div class="span4">
							<table class="table table-condensed table-striped table-white">
								<tbody>
									<tr>
										<td class="right" style="width: 60%;"><span data-bind="text: lang.lang.subtotal" style="font-size: 15px; font-weight: 700;"></span></td>
										<td class="right strong" width="40%"><span data-format="n" data-bind="text: obj.sub_total" style="font-size: 15px; font-weight: 700;"></span></td>
									</tr>								
									<tr>
										<td class="right"><span data-bind="text: lang.lang.total_discount"></span></td>
										<td class="right ">
											<span data-format="n" data-bind="text: obj.discount"></span>
	                   					</td>
									</tr>								
									<tr>
										<td class="right"><span data-bind="text: lang.lang.total_tax"></span></td>
										<td class="right "><span data-format="n" data-bind="text: obj.tax"></span></td>
									</tr>															
									<tr>
										<td class="right"><h4 span data-bind="text: lang.lang.total" style="font-weight: 700;"></h4></td>
										<td class="right strong"><h4 data-bind="text: total" style="font-weight: 700;"></h4></td>
									</tr>								
								</tbody>
							</table>
						</div>
						<!-- // Column END -->
						
					</div>	           
					
					<!-- Form actions -->
					<div class="box-generic bg-action-button">
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
							<div class="span4" style="padding-left: 15px;">
								<input data-role="dropdownlist"
					                   data-value-primitive="true"
					                   data-text-field="name"
					                   data-value-field="id"
					                   data-bind="value: obj.transaction_template_id,
					                              source: txnTemplateDS"
					                   data-option-label="Select Template..." />
					         	
							</div>
							<div class="span8" align="right">
								<span class="btn-btn" onclick="javascript:window.history.back()" data-bind="click: cancel"><i></i> <span data-bind="text: lang.lang.cancel"></span></span>
								<span class="btn-btn" data-bind="click: openConfirm, visible: isEdit"><span data-bind="text: lang.lang.delete"></span></span>
								<span role='presentation' class='dropdown btn-btn' style="padding: 0 0 0 15px; float: right; height: 32px; line-height: 30px;">
							  		<a style="color: #fff; padding: 0;" class='dropdown-toggle glyphicons' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'>
							  			<span data-bind="text: lang.lang.save_option"></span>
							  			<span class="small-btn"><i class='caret '></i></span>
							  		</a>
							  		<ul class='dropdown-menu'>
						  				<li id="saveNew" data-bind="invisible: isEdit"><span data-bind="text: lang.lang.save_new"></span></li>
						  				<li id="savePrint"><span data-bind="text: lang.lang.save_print"></span></li>
						  			</ul>
							  	</span>
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
</script>
<script id="quote-template" type="text/x-kendo-tmpl">
	<tr data-uid="#: uid #">
		<td>
			<i class="icon-trash" data-bind="events: { click: removeRow }"></i>
			#:banhji.quote.lineDS.indexOf(data)+1#
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

			<input id="ddlMesurement"
					data-role="dropdownlist"
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
			<input id="txtPrice-#:uid#" name="txtPrice-#:uid#"
            	   type="number" class="k-textbox"
            	   min="0"
                   data-bind="value: price, events: {change : changes}"
                   required data-required-msg="required"
                   placeholder="Price..." 
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
                   style="width: 100%;">			
		</td>				
		<td class="right">
			<span data-format="n" data-bind="text: amount"></span> 						
		</td>
		<td>
			<input 	id="ccbTaxItem" 
					name="ccbTaxItem-#:uid#"
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
<script id="saleOrder" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">
				<div id="example" class="k-content">

		    		<span class="glyphicons no-js remove_2 pull-right" 
		    				onclick="javascript:window.history.back()"
							data-bind="click: cancel"><i></i></span>

			        <h2>Sale Order</h2>

				    <br>

					<!-- Upper Part -->
					<div class="row-fluid">
						<div class="span4">
							<div class="box-generic well" style="height: 190px;">				
								<table class="table table-borderless table-condensed cart_total">									
									<tr>
										<td style="width: 50px;"><span data-bind="text: lang.lang.no_"></span></td>
										<td>
											<input id="txtNumber" name="txtNumber" class="k-textbox" 
													data-bind="value: obj.number,
																disabled: obj.is_recurring,
																events:{change:checkExistingNumber}" 
													required data-required-msg="required" 
													placeholder="eg. ABC00001" style="width: 83%; float: left; margin-right: 5px;"" />
											<div style="padding-left: 0; width: 25px; float: left;">
												<a class="glyphicons no-js qrcode" data-bind="click: generateNumber" title="Generate Number" style="float: left; margin: 2px 0 0 0 ;"><i></i></a>
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
													required data-required-msg="required"
													style="width:100%;" />
										</td>
									</tr>								
									<tr>
										<td><span data-bind="text: lang.lang.customers"></span></td>
										<td>
											<input id="cbbContact" name="cbbContact"
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
								                   required data-required-msg="required" style="width: 100%;" />
										</td>
									</tr>																															
								</table>

								<div class="strong" style="background: #eee;  border: 1px solid #ddd; width: 100%; padding: 10px;" align="center"
									data-bind="style: {backgroundColor: amtDueColor}">
									<div align="left"><span data-bind="text: lang.lang.amount_ordered"></span></div>
									<h2 data-bind="text: total" align="right"></h2>
								</div>

							</div>						
						</div>					   

						<div class="span8">

							<div class="box-generic-noborder" style="min-height: 234px !important">

							    <!-- Tabs Heading -->
							    <div class="tabsbar tabsbar-2">
							        <ul class="row-fluid row-merge">
							        	<li class="span1 glyphicons cogwheels active"><a href="#tab1-5" data-toggle="tab"><i></i> </a>
							            </li>
							            <li class="span1 glyphicons adress_book"><a href="#tab2-5" data-toggle="tab"><i></i> </a>
							            </li>
							            <li class="span1 glyphicons circle_info"><a href="#tab3-5" data-toggle="tab"><i></i> </a>
							            </li>
							            <li class="span1 glyphicons paperclip"><a href="#tab4-5" data-toggle="tab"><i></i></a>
							            </li>						            
							            <li class="span1 glyphicons history"><a href="#tab5-5" data-toggle="tab"><i></i> Recuring</a>
							            </li>						            								            
							        </ul>
							    </div>
							    <!-- // Tabs Heading END -->

							    <div class="tab-content">

							    	<!-- Options Tab content -->
							        <div class="tab-pane active" id="tab1-5">						            
							            <table class="table table-borderless table-condensed cart_total">							            
											<tr>
												<td>
													<span data-bind="text: lang.lang.balance"></span> <span data-bind="text: balance"></span>
												</td>										
												<td>
													<span data-bind="text: lang.lang.credit_allowed"></span> <span data-format="n" data-bind="text: obj.credit_allowed"></span>
												</td>
											</tr>
								            <tr>
								            	<td><span data-bind="text: lang.lang.expected_date"></span></td>
								            	<td>
								            		<input id="txtDueDate" name="txtDueDate" 
															data-role="datepicker"
															data-format="dd-MM-yyyy"
															data-parse-formats="yyyy-MM-dd" 
															data-bind="value: obj.due_date" 
															required data-required-msg="required"
															style="width:100%;" />
								            	</td>
								            </tr>							           
											<tr>							            				
												<td>
								            		<span data-bind="text: lang.lang.reference"></span>	                    		
								            	</td>
								            	<td>
													<input data-role="combobox"
															data-template="reference-list-tmpl"
								              				data-value-primitive="true"
								              				data-auto-bind="false"
															data-text-field="number" 
								              				data-value-field="id"						              				 
								              				data-bind="value: obj.reference_id,
								              							enabled: enableRef,
								              							source: referenceDS,						              							
								              							events:{change: referenceChanges}" 
								              				style="width: 100%" />
												</td>
											</tr>	
							            </table>						            
							        </div>
							        <!-- // Options Tab content END -->

							        <!-- Address Tab content -->
							        <div class="tab-pane" id="tab2-5">
							        	<span data-bind="text: lang.lang.billing_address"></span>
										<textarea cols="0" rows="2" class="k-textbox" style="width:100%" data-bind="value: obj.bill_to" placeholder="Billing to ..."></textarea>								
										
										<span data-bind="text: lang.lang.delivery_address"></span>
										<textarea cols="0" rows="2" class="k-textbox" style="width:100%" data-bind="value: obj.ship_to" placeholder="Shipping to ..."></textarea>	
												
							        </div>
							        <!-- // Address Tab content END -->

							        <!-- Info Tab content -->
							        <div class="tab-pane" id="tab3-5">
							        	
										<table class="table table-borderless table-condensed cart_total">
											<tr>
												<td><span data-bind="text: lang.lang.segments"></span></td>
												<td>
													<select data-role="multiselect"
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
												</td>
											</tr>
											<tr>
												<td><span data-bind="text: lang.lang.job"></span></td>
												<td>
													<input id="ddlJob" name="ddlJob"
														   data-role="dropdownlist"
														   data-header-template="job-header-tmpl"
														   data-template="job-list-tmpl"
														   data-auto-bind="false"				                
										                   data-value-primitive="true"		   
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.job_id, 
										                   			source: jobDS"
										                   data-option-label="Select job..." 
										                   style="width: 100%" />										
												</td>
											</tr>											
							            </table>
												
							        </div>
							        <!-- // Info Tab content END -->

							        <!-- Attach Tab content -->
							        <div class="tab-pane" id="tab4-5">
							         	<p><span data-bind="text: lang.lang.file_type"></span>: [PDF, JPG, JPEG, TIFF, PNG, GIF]</p>		
							            <input id="files" name="files"
						                   type="file"
						                   data-role="upload"
						                   data-show-file-list="false"
						                   data-bind="events: { 
				                   				select: onSelect
						                   }">

							            <table class="table table-bordered">
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
							        <!-- // Attach Tab content END -->						        

							        <!-- Recuring Tab content -->
							        <div class="tab-pane" id="tab5-5">							            	
							            
							             <table style="width: 100%" class="table borderless">
							            	<tr align="right">
							            		<td style="border-top: 0;">
							            			<span data-bind="text: lang.lang.name"></span>
							            		</td>
							            		<td style="border-top: 0;">
							            			<input id="txtRecurringName" name="txtRecurringName"
							            					class="k-textbox" 
							            					data-bind="value: obj.recurring_name" 
							            					placeholder="Recurring name.." 
							            					style="width: 43%; " />

							            			<span data-bind="text: lang.lang.start"></span>

									                <input data-role="datepicker"
															data-format="dd-MM-yyyy"
															data-parse-formats="yyyy-MM-dd"
															data-bind="value: obj.start_date"
															style="width: 40%; " />
							            		</td>
							            	</tr>
							            	<tr align="right">
							            		<td style="border-top: 0;">
								            		<span data-bind="text: lang.lang.every"></span>
								            	</td>
							            		<td style="border-top: 0;">
								            		<input data-role="numerictextbox"
									                   data-format="n0"
									                   data-min="0"								                   
									                   data-bind="value: obj.interval"
									                   style="width: 45%; " />

								            		<input data-role="dropdownlist"									                   
										                   data-value-primitive="true"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.frequency,
										                              source: frequencyList,
										                              events: { change: frequencyChanges }"
										                   style="width: 45%;" />
								            	</td>
							            	</tr>
								            <tr align="right">
								            	<td style="border-top: 0;">
								            		<span data-bind="text: lang.lang.on"></span>
								            	</td>							            	
								            	<td style="border-top: 0;">

								            		<input data-role="dropdownlist"									                   
										                   data-value-primitive="true"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.month,
										                   			  visible: showMonth,
										                              source: monthList"										                   
										                   style="width: 45%;" />

								            		<input data-role="dropdownlist"									                   
										                   data-value-primitive="true"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.month_option,
										                   			  visible: showMonthOption,
										                              source: monthOptionList,
										                              events: { change: monthOptionChanges }"										                   
										                   style="width: 45%;" />

								            		<input data-role="dropdownlist"									                   
										                   data-value-primitive="true"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.week,
										                   			  visible: showWeek,
										                              source: weekDayList"										                  
										                   style="width: 45%;" />										            
										        
								            		<input data-role="dropdownlist"									                   
										                   data-value-primitive="true"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.day,
										                   			  visible: showDay,
										                              source: dayList"										                   
										                   style="width: 45%;" />

								            	</td>
								            </tr>
							            </table>

							            <span id="saveRecurring" class="btn btn-icon btn-default glyphicons history" data-bind="visible: obj.isNew" style="float: right; margin-top: -12px;"><i></i> <span data-bind="text: lang.lang.save_recurring"></span></span>									     
							            
							        </div>
							        <!-- // Recuring Tab content END -->						        								        

							    </div>
							</div>

					    </div>
					</div>

					<!-- Item List -->
				    <div data-role="grid" class="costom-grid"
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
						        	var rowIndex = banhji.saleOrder.lineDS.indexOf(dataItem)+1;
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
                            { field: 'measurement', title: 'UOM', editor: measurementEditor, template: '#=measurement.measurement#', width: '80px' },
                            {
							    field: 'price',
							    title: 'PRICE',
							    format: '{0:n}',
							    editor: numberTextboxEditor,
							    width: '120px',
							    attributes: { style: 'text-align: right;' }
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
                            { field: 'amount', title:'AMOUNT', format: '{0:n}', editable: 'false', attributes: { style: 'text-align: right;' }, width: '120px' },
                            { field: 'tax_item', title:'TAX', editor: taxForSaleEditor, template: '#=tax_item.name#', width: '90px' },
                         	{ field: 'required_date', title:'DELIVERY DATE', format: '{0: dd-MM-yyyy}', hidden: true, editor: dateEditor, width: '120px' },
                         	{ field: 'contact', title:'SUPPLIER', hidden: true, editor: supplierEditor, template: '#=contact.name#', width: '150px' },
                         	{
							    field: 'cost',
							    title: 'COST',
							    format: '{0:n}',
							    hidden: true,
							    editor: numberTextboxEditor,
							    width: '120px',
							    attributes: { style: 'text-align: right;' }
							}
                         ]"
                         data-auto-bind="false"
		                 data-bind="source: lineDS" ></div>			    

		            <!-- Bottom part -->
		            <div class="row-fluid">
			
						<!-- Column -->
						<div class="span4">
							<button class="btn btn-inverse" data-bind="click: addRow"><i class="icon-plus icon-white"></i></button>												

							<!-- Add New Item -->
							<ul class="topnav addNew">
								<li role="presentation" class="dropdown ">
							  		<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
							  			<span data-bind="text: lang.lang.add_new_item"></span>
				    					<span class="caret"></span>
							  		</a>
						  			<ul class="dropdown-menu addNewItem">  				  				
						  				<li><a href='#/item'><span data-bind="text: lang.lang.add_inventory_for_sale"></span></a></li>
						  				<li><a href='#/non_inventory_part'><span data-bind="text: lang.lang.add_noninventory_for_sale"></span></a></li>						  				
						  				<li><a href='#/item_service'><span data-bind="text: lang.lang.add_services"></span></a></li>
						  				<li><a href='#/txn_item'><span data-bind="text: lang.lang.add_transaction_item"></span></a></li>	
						  			</ul>
							  	</li>				
							</ul>
							<!--End Add New Item -->
							
							<br><br>
							<div class="well">
								<textarea cols="0" rows="2" class="k-textbox" style="width:100%" data-bind="value: obj.memo2" placeholder="memo for internal ..."></textarea>
								<br>						
								<textarea cols="0" rows="2" class="k-textbox" style="width:100%" data-bind="value: obj.memo" placeholder="memo for external ..."></textarea>
							</div>
						</div>
						<!-- Column END -->

						<!-- Column -->
						<div class="span4" align="center">
							<div data-bind="visible: isEdit" style="margin-top: 10%;">
								<h2 data-bind="text: statusObj.text" style="text-transform: uppercase;"></h2>
								<p data-bind="text: statusObj.date"></p>
								<a data-bind="text: statusObj.number,
											attr: { href: statusObj.url }"></a>
							</div>
						</div>
						<!-- Column END -->
						
						<!-- Column -->
						<div class="span4">
							<table class="table table-condensed table-striped table-white">
								<tbody>
									<tr>
										<td class="right" style="width: 60%"><span data-bind="text: lang.lang.subtotal" style="font-size: 15px; font-weight: 700;"></span></td>
										<td class="right "><span data-format="n" data-bind="text: obj.sub_total" style="font-size: 15px; font-weight: 700;"></span></td>
									</tr>								
									<tr>
										<td class="right"><span data-bind="text: lang.lang.total_discount"></span></td>
										<td class="right ">
											<span data-format="n" data-bind="text: obj.discount"></span>
	                   					</td>
									</tr>								
									<tr>
										<td class="right"><span data-bind="text: lang.lang.total_tax"></span></td>
										<td class="right "><span data-format="n" data-bind="text: obj.tax"></span></td>
									</tr>
									<tr>
										<td class="right"><h4 data-bind="text: lang.lang.total" style="font-weight: 700;"></h4></td>
										<td class="right "><h4 data-bind="text: total" style="font-weight: 700;"></h4></td>
									</tr>								
								</tbody>
							</table>
						</div>
						<!-- // Column END -->

					</div>
					
					<!-- Form actions -->
					<div class="box-generic bg-action-button">
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
							<div class="span4" style="padding-left: 15px;">
								<input data-role="dropdownlist"
					                   data-value-primitive="true"
					                   data-text-field="name"
					                   data-value-field="id"
					                   data-bind="value: obj.transaction_template_id,
					                              source: txnTemplateDS"
					                   data-option-label="Select Template..." />
								
							</div>
							<div class="span8" align="right">
								<span class="btn-btn" onclick="javascript:window.history.back()" data-bind="click: cancel"><i></i> <span data-bind="text: lang.lang.cancel"></span></span>
								<span class="btn-btn" data-bind="click: openConfirm, visible: isEdit"><span data-bind="text: lang.lang.delete"></span></span>
								<span role='presentation' class='dropdown btn-btn' style="padding: 0 0 0 15px; float: right; height: 32px; line-height: 30px;">
							  		<a style="color: #fff; padding: 0;" class='dropdown-toggle glyphicons' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'>
							  			<span data-bind="text: lang.lang.save_option"></span>
							  			<span class="small-btn"><i class='caret '></i></span>
							  		</a>
							  		<ul class='dropdown-menu'>
						  				<li id="saveNew" data-bind="invisible: isEdit"><span data-bind="text: lang.lang.save_new"></span></li>
						  				<li id="savePrint"><span data-bind="text: lang.lang.save_print"></span></li>
						  			</ul>
							  	</span>
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
</script>
<script id="customerDeposit" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">					
				<div id="example" class="k-content">					
				    
			    	<span class="glyphicons no-js remove_2 pull-right" 
		    				onclick="javascript:window.history.back()"
							data-bind="click: cancel"><i></i></span>

			        <h2 data-bind="text: lang.lang.customer_deposit"></h2>			    		   

				    <br>				   				
						
					<!-- Upper Part -->
					<div class="row-fluid">
						<div class="span4">
							<div class="box-generic well" style="height: 150px;">				
								<table class="table table-borderless table-condensed cart_total">									
									<tr>
										<td style="width: 50px;"><span data-bind="text: lang.lang.no_"></span></td>
										<td>
											<input id="txtNumber" name="txtNumber" class="k-textbox" 
													data-bind="value: obj.number,
																disabled: obj.is_recurring,
																events:{change:checkExistingNumber}" 
													required data-required-msg="required" 
													placeholder="eg. ABC00001" style="width: 83%; float: left; margin-right: 5px;"" />
											<div style="padding-left: 0; width: 25px; float: left;">
												<a class="glyphicons no-js qrcode" data-bind="click: generateNumber" title="Generate Number" style="float: left; margin: 2px 0 0 0 ;"><i></i></a>
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
													required data-required-msg="required"
													style="width: 210px;" />
										</td>
									</tr>
									<tr>
										<td><span data-bind="text: lang.lang.customers"></span></td>
										<td>
											<input id="cbbContact" name="cbbContact"
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
								                   required data-required-msg="required" style="width: 210px;" />
										</td>
									</tr>
								</table>

								<div class="strong" style="background: #eee;  border: 1px solid #ddd; width: 100%; padding: 10px;" align="center"
									data-bind="style: {backgroundColor: amtDueColor}">
									<div align="left"><span data-bind="text: lang.lang.amount_deposited"></span></div>
									<h2 data-bind="text: total" align="right"></h2>
								</div>

							</div>
						</div>					   

						<div class="span8">

							<div class="box-generic-noborder" style="min-height: 234px !important">

							    <!-- Tabs Heading -->
							    <div class="tabsbar tabsbar-2">
							        <ul class="row-fluid row-merge">
							        	<li class="span1 glyphicons cogwheels active"><a href="#tab1-5" data-toggle="tab"><i></i> </a>
							            </li>
							            <li class="span1 glyphicons adress_book"><a href="#tab2-5" data-toggle="tab"><i></i> </a>
							            </li>
							            <li class="span1 glyphicons circle_info"><a href="#tab3-5" data-toggle="tab"><i></i> </a>
							            </li>
							            <li class="span1 glyphicons paperclip"><a href="#tab4-5" data-toggle="tab"><i></i></a>
							            </li>						            
							            <li class="span1 glyphicons history"><a href="#tab5-5" data-toggle="tab"><i></i> <span data-bind="text: lang.lang.recurring"></span></a>
							            </li>
							            <!-- <li class="span1 glyphicons show_liness"><a href="#tab5-6" data-toggle="tab"><i></i></a>
							            </li> -->						            								            
							        </ul>
							    </div>
							    <!-- // Tabs Heading END -->

							    <div class="tab-content">

							    	<!-- Options Tab content -->
							        <div class="tab-pane active" id="tab1-5">						            
							            <table class="table table-borderless table-condensed cart_total">							            
											<tr>
												<td>
													<span data-bind="text: lang.lang.balance"></span> <span data-bind="text: balance"></span>
												</td>										
												<td>
													<span data-bind="text: lang.lang.credit_allowed"></span> <span data-format="n" data-bind="text: obj.credit_allowed"></span>
												</td>
											</tr> 
											<tr>
												<td style="width: 15%"><span data-bind="text: lang.lang.deposit_to"></span></td>
												<td style="width: 40%">
													<input id="cbbAccount" name="cbbAccount"
														   data-role="combobox"
										                   data-value-primitive="true"
										                   data-header-template="account-header-tmpl"
										                   data-template="account-list-tmpl"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.account_id,
										                   			  source: depositAccountDS"
										                   data-placeholder="Add Account.."
										                   required data-required-msg="required" style="width: 100%" />
												</td>
											</tr>  
											<tr>							            				
												<td>
								            		<span data-bind="text: lang.lang.reference"></span>   						     		
								            	</td>
								            	<td>
													<input data-role="combobox"
															data-template="reference-list-tmpl"
								              				data-value-primitive="true"
												            data-auto-bind="false"
															data-text-field="number" 
								              				data-value-field="id"						              				 
								              				data-bind="value: obj.reference_id,
								              							enabled: enableRef,
								              							source: referenceDS,						              							
								              							events:{change: referenceChanges}" 
								              				style="width: 100%" />
												</td>
											</tr>	
							            </table>						            
							        </div>
							        <!-- // Options Tab content END -->

							        <!-- Address Tab content -->
							        <div class="tab-pane" id="tab2-5">
							        	<span data-bind="text: lang.lang.billing_address"></span>
										<textarea cols="0" rows="2" class="k-textbox" style="width:100%" data-bind="value: obj.bill_to" placeholder="Billing to ..."></textarea>								
										
										<span data-bind="text: lang.lang.delivery_address"></span>
										<textarea cols="0" rows="2" class="k-textbox" style="width:100%" data-bind="value: obj.ship_to" placeholder="Shipping to ..."></textarea>	
												
							        </div>
							        <!-- // Address Tab content END -->

							        <!-- Info Tab content -->
							        <div class="tab-pane" id="tab3-5">
							        	
										<table class="table table-borderless table-condensed cart_total">							                        	
											<tr>
												<td><span data-bind="text: lang.lang.segments"></span></td>
												<td>
													<select data-role="multiselect"
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
												</td>
											</tr>
											<tr>
												<td><span data-bind="text: lang.lang.job"></span></td>
												<td>
													<input id="ddlJob" name="ddlJob"
														   data-role="dropdownlist"
														   data-header-template="job-header-tmpl"
														   data-template="job-list-tmpl"
														   data-auto-bind="false"				                
										                   data-value-primitive="true"		   
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.job_id, 
										                   			source: jobDS"
										                   data-option-label="Select job..." 
										                   style="width: 100%" />										
												</td>
											</tr>											
							            </table>
												
							        </div>
							        <!-- // Info Tab content END -->

							        <!-- Attach Tab content -->
							        <div class="tab-pane" id="tab4-5">
							         	<p><span data-bind="text: lang.lang.file_type"></span>: [PDF, JPG, JPEG, TIFF, PNG, GIF]</p> 
							            <input id="files" name="files"
						                   type="file"
						                   data-role="upload"
						                   data-show-file-list="false"
						                   data-bind="events: { 
				                   				select: onSelect
						                   }">

							            <table class="table table-bordered">
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
							        <!-- // Attach Tab content END -->						        

							        <!-- Recuring Tab content -->
							        <div class="tab-pane" id="tab5-5">							            	
							            
							            <table style="width: 100%" class="table borderless">
							            	<tr align="right">
							            		<td style="border-top: 0;">
							            			<span data-bind="text: lang.lang.name"></span>
							            		</td>
							            		<td style="border-top: 0;">
							            			<input id="txtRecurringName" name="txtRecurringName"
							            					class="k-textbox" 
							            					data-bind="value: obj.recurring_name" 
							            					placeholder="Recurring name.." 
							            					style="width: 43%; " />

							            			<span data-bind="text: lang.lang.start"></span>

									                <input data-role="datepicker"
															data-format="dd-MM-yyyy"
															data-parse-formats="yyyy-MM-dd"
															data-bind="value: obj.start_date"
															style="width: 40%; " />
							            		</td>
							            	</tr>
							            	<tr align="right">
							            		<td style="border-top: 0;">
								            		<span data-bind="text: lang.lang.every"></span>
								            	</td>
							            		<td style="border-top: 0;">
								            		<input data-role="numerictextbox"
									                   data-format="n0"
									                   data-min="0"								                   
									                   data-bind="value: obj.interval"
									                   style="width: 45%; " />

								            		<input data-role="dropdownlist"									                   
										                   data-value-primitive="true"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.frequency,
										                              source: frequencyList,
										                              events: { change: frequencyChanges }"
										                   style="width: 45%;" />
								            	</td>
							            	</tr>
								            <tr align="right">
								            	<td style="border-top: 0;">
								            		<span data-bind="text: lang.lang.on"></span>
								            	</td>							            	
								            	<td style="border-top: 0;">

								            		<input data-role="dropdownlist"									                   
										                   data-value-primitive="true"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.month,
										                   			  visible: showMonth,
										                              source: monthList"										                   
										                   style="width: 45%;" />

								            		<input data-role="dropdownlist"									                   
										                   data-value-primitive="true"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.month_option,
										                   			  visible: showMonthOption,
										                              source: monthOptionList,
										                              events: { change: monthOptionChanges }"										                   
										                   style="width: 45%;" />

								            		<input data-role="dropdownlist"									                   
										                   data-value-primitive="true"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.week,
										                   			  visible: showWeek,
										                              source: weekDayList"										                  
										                   style="width: 45%;" />										            
										        
								            		<input data-role="dropdownlist"									                   
										                   data-value-primitive="true"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.day,
										                   			  visible: showDay,
										                              source: dayList"										                   
										                   style="width: 45%;" />

								            	</td>
								            </tr>
							            </table>

							            <span id="saveRecurring" class="btn btn-icon btn-default glyphicons history" data-bind="visible: obj.isNew" style="float: right; margin-top: -12px;"><i></i> <span data-bind="text: lang.lang.save_recurring"></span></span>								     
							            
							        </div>
							        <!-- // Recuring Tab content END -->						        								        

							        <div class="tab-pane saleSummaryCustomer" id="tab5-6">
										<table class="table table-borderless table-condensed">
									        <thead>
									            <tr>
									                <th>NUMBER</th>
									                <th>ACCOUNT</th>                		                
									                <th class="right">DEBITS (Dr)</th>
									                <th class="right">CREDITS (Cr)</th>		                
									            </tr>
									        </thead> 
									        <tbody>
									        	<tr>
									        		<td>1</td>
									        		<td>2</td>
									        		<td class="right">3</td>
									        		<td class="right">4</td>
									        	</tr>
									        	<tr>
									        		<td>1</td>
									        		<td>2</td>
									        		<td class="right">3</td>
									        		<td class="right">4</td>
									        	</tr>
									        </tbody>			        
									    </table>
									</div>

							    </div>
							</div>

					    </div>
					</div>

					<!-- Item List -->
					<table class="table table-bordered table-primary table-striped table-vertical-center">
				        <thead>
				            <tr>
				                <th style="width: 50px;"><span data-bind="text: lang.lang.no_"></span></th>			               
				                <th style="width: 30%;"><span data-bind="text: lang.lang.account"></span></th>
				                <th><span data-bind="text: lang.lang.description"></span></th>
				                <th style="width: 15%;"><span data-bind="text: lang.lang.reference"></span></th>			                
				                <th style="width: 15%;"><span data-bind="text: lang.lang.amount"></span></th>			                
				            </tr> 
				        </thead>
				        <tbody data-role="listview" 
				        		data-template="customerDeposit-template" 
				        		data-auto-bind="false"
				        		data-bind="source: lineDS"></tbody>			        
				    </table>			    
									
		            <!-- Bottom part -->
		            <div class="row">
			
						<!-- Column -->
						<div class="span6">
							<button class="btn btn-inverse" data-bind="click: addRow"><i class="icon-plus icon-white"></i></button>
							
							<!-- Add New Item -->
							<!-- <ul class="topnav addNew">
								<li role="presentation" class="dropdown ">
							  		<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
							  			<span data-bind="text: lang.lang.add_new_item"></span>
				    					<span class="caret"></span>
							  		</a>
						  			<ul class="dropdown-menu addNewItem">  				  				
						  				<li><a href='#/item'><span data-bind="text: lang.lang.add_inventory_for_sale"></span></a></li>
						  				<li><a href='#/non_inventory_part'><span data-bind="text: lang.lang.add_noninventory_for_sale"></span></a></li>
						  				<li><a href='#/fixed_assets'><span data-bind="text: lang.lang.add_fixed_assets"></span></a></li>
						  				<li><a href='#/item_service'><span data-bind="text: lang.lang.add_services"></span></a></li>
						  				<li><a href='#/txn_item'><span data-bind="text: lang.lang.add_transaction_item"></span></a></li> 
						  			</ul>
							  	</li>				
							</ul> -->
							<!--End Add New Item -->

							<!--Add Account -->
							<a href="#/account" class="btn btn-default" style="background: #203864; color: #fff;"><span data-bind="text: lang.lang.add_account"></span></a>

						</div>
						<!-- Column END -->


						
						<!-- Column -->
						<div class="span6">
							<table class="table table-borderless table-condensed cart_total">
								<tbody>								
									<tr>
										<td class="right" style="width: 60%"><span data-bind="text: lang.lang.total" style="font-size: 15px; font-weight: 700;"></span>:</td>
										<td class="right "><span data-bind="text: total" style="font-size: 15px; font-weight: 700;"></span></td>
									</tr>								
								</tbody>
							</table>
						</div>
						<!-- // Column END -->
						
					</div>
		           
		            <br>

					<!-- Form actions -->
					<div class="box-generic bg-action-button">
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
							<div class="span4" style="padding-left: 15px;">
								<input data-role="dropdownlist"
					                   data-value-primitive="true"
					                   data-text-field="name"
					                   data-value-field="id"
					                   data-bind="value: obj.transaction_template_id,
					                              source: txnTemplateDS"
					                   data-option-label="Select Template..." />
								
							</div>
							<div class="span8" align="right">
								<span class="btn-btn" onclick="javascript:window.history.back()" data-bind="click: cancel"><i></i> <span data-bind="text: lang.lang.cancel"></span></span>
								<span class="btn-btn" data-bind="click: openConfirm, visible: isEdit"><span data-bind="text: lang.lang.delete"></span></span>
								<span role='presentation' class='dropdown btn-btn' style="padding: 0 0 0 15px; float: right; height: 32px; line-height: 30px;">
							  		<a style="color: #fff; padding: 0;" class='dropdown-toggle glyphicons' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'>
							  			<span data-bind="text: lang.lang.save_option"></span>
							  			<span class="small-btn"><i class='caret '></i></span>
							  		</a>
							  		<ul class='dropdown-menu'>
						  				<li id="saveNew" data-bind="invisible: isEdit"><span data-bind="text: lang.lang.save_new"></span></li>
						  				<li id="savePrint"><span data-bind="text: lang.lang.save_print"></span></li>
						  			</ul>
							  	</span>
							  	<span class="btn-btn" id="saveClose"><span data-bind="text: lang.lang.save_close"></span></span>
							  	<span class="btn-btn" id="saveDraft"><span data-bind="text: lang.lang.save_draft"></span></span>
								<!-- <span class="btn-btn" data-bind="invisible: isEdit"><span data-bind="text: lang.lang.save_new"></span></span>
								<span class="btn-btn"><span data-bind="text: lang.lang.save_close"></span></span>
								<span class="btn-btn"><span data-bind="text: lang.lang.save_print"></span></span> -->
							</div>
						</div>
					</div>
					<!-- // Form actions END -->

				</div>							
			</div>
		</div>
	</div>
</script>
<script id="customerDeposit-template" type="text/x-kendo-tmpl">
	<tr data-uid="#: uid #">		
		<td class="center">
			<i class="icon-trash" data-bind="events: { click: removeRow }"></i>
			#:banhji.customerDeposit.lineDS.indexOf(data)+1#			
		</td>				
		<td>
			<input id="cbbAccounts" name="cbbAccounts"
				   data-role="combobox"
                   data-header-template="account-header-tmpl"                   
                   data-template="account-list-tmpl"
                   data-value-primitive="true"
                   data-text-field="name"
                   data-value-field="id"
                   data-bind="value: account_id,
                              source: accountDS"
                   data-placeholder="Add Account.."
                   required data-required-msg="required" style="width: 100%" />	
		</td>		
		<td>
			<input name="description" 
					type="text" class="k-textbox" 
					data-bind="value: description"					
					style="width: 100%; margin-bottom: 0;" />
		</td>
		<td>
			<input type="text" class="k-textbox" 
					data-bind="value: reference_no"				
					style="width: 100%; margin-bottom: 0;" />		
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
<script id="saleRecurring" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">					
				<div id="example" class="k-content">

		    		<span class="glyphicons no-js remove_2 pull-right" 
		    				onclick="javascript:window.history.back()"
							data-bind="click: cancel"><i></i></span>

				    <h2>Sale Recurring</h2>

				    <br>

				    <div class="row-fluid">
						<!-- Tabs -->
						<div class="relativeWrap" data-toggle="source-code">
							<div class="widget widget-tabs widget-tabs-gray report-tab">	
							    <!-- Tabs Heading -->
								<div class="widget-head">
									<ul>
										<li class="active"><a class="glyphicons user" href="#tab-1" data-toggle="tab"><i></i>Select Customer</a></li>
									</ul>
								</div>
							    <!-- // Tabs Heading END -->
								<div class="widget-body">
								    <div class="tab-content">

								    	<!-- //GENERAL INFO -->
								        <div class="tab-pane active" id="tab-1">									
									       <input id="ccbItem" name="cbbContact"
												   data-role="combobox"
								                   data-header-template="contact-header-tmpl"
								                   data-template="contact-list-tmpl"
								                   data-value-primitive="true"
								                   data-text-field="name"
								                   data-value-field="id"
								                   data-bind="value: contact_id,
								                              source: contactDS,
								                              events:{change: search}"
								                   data-placeholder="Customer..." style="width: 200px;" />
							        	</div>
								        <!-- //GENERAL INFO END -->

								    </div>
								</div>
							</div>
						</div>
					</div>
					                           					
	            	<table class="table table-bordered table-primary table-striped table-vertical-center">
	            		<thead style="background-color: blue; color: #fff; font-weight: bold">
			                <th>TYPE</th>
			                <th>RECURRING NAME</th>
			                <th>CUSTOMER</th>
			                <th>START DATE</th>
			                <th class="center">FREQUENCY</th>
			                <th></th>
	            		</thead>
	            		<tbody data-role="listview" 
				        		data-template="saleRecurring-template" 
				        		data-auto-bind="false"
				        		data-bind="source: dataSource"></tbody>
	            	</table>

	            	<div id="pager" class="k-pager-wrap"
			             data-role="pager" 
			             data-auto-bind="false"
			             data-bind="source: dataSource"></div>

	            </div>	            						
			</div>
		</div>
	</div>
</script>
<script id="saleRecurring-template" type="text/x-kendo-tmpl">
	<tr data-uid="#: uid #">
		<td>#=type#</td>
		<td>#=recurring_name#</td>
		<td>#=contact.abbr##=contact.number# #=contact.name#</td>
		<td>#=kendo.toString(new Date(start_date), "dd-MM-yyyy")#</td>
		<td class="center">#=frequency#</td>
		<td class="center">
			<a class="btn btn-warning" data-bind="click: edit,text: lang.lang.edit"><i></i></a>
			<a class="btn btn-success" data-bind="click: use, text: lang.lang.use"><i></i></a>
		</td>		
    </tr>   
</script>
<!-- SALES REPORT -->
<script id="saleReportCenter" type="text/x-kendo-template">
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
								<h3><a href="#/quotation_list">Quotation List</a></h3>
							</td>
							<td width="50%">
								<h3><a href="#/sale_order_list">Sale Order List</a></h3>
							</td>
						</tr>
						<tr>
							<td >
								<h3><a href="#/sale_order_by_job_engagement">Sale Order By Job/Engagement</a></h3>
							</td>
							<!-- <td >
								<h3><a href="#/customer_list">Customer List</a></h3>
							</td> -->
						</tr>
						<!-- <tr>
							<td >
							</td>
							<td >
								<p>
									List of all active customers
								</p>
							</td>
						</tr> -->
						<!-- <tr>
							<td>
								<h3><a href="#/sale_inventory_position_summary">Inventory Position Summary</a></h3>
							</td>
							<td>
								
							</td>

						</tr> -->
						<tr>
							<td>
								<p>
									Summarizes each inventory balance by quantity on hand, on purchase order and sale order. In addition, it also includes average cost and price.
								</p>
							</td>
							<td>
								
							</td>

						</tr>
					</table>
				</div>
			</div>

			
			<!-- <div class="row-fluid recevable-report">
				<h2>OTHER REPORTS/ LISTS</h2>
				<div class="row-fluid">
					<table class="table table-borderless table-condensed">
						<tr>
							<td style="width: 48%; padding-right: 8px !important;">
								<h3><a href="#/customer_recurring">Recurring Customer Template List</a></h3>
							</td>
							<td >
								<h3><a href="#/customer_setting">Payment Method & Term List</a></h3>								
							</td>						
						</tr>
						<tr>
							<td style="width: 48%; padding-right: 8px !important;">
								<p></p>								
							</td>
							<td>
								<p>
									List the types of payments and the term that determine due date for payment from customers.
								</p>
							</td>
							
						</tr>
						<tr >
							<td></td>														
						</tr>

					</table>
				</div>
			</div> -->
		</div>
		<div class="span5">
			<span class="pull-right glyphicons no-js remove_2" 
						onclick="javascript:window.history.back()"><i></i></span>
			<br>
			<br>
			<div class="report-chart">
				<div class="widget-body alert alert-primary sale-overview">
					<h2>SALE ORDER</h2>
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
			
			</div>
		</div>
	</div>
</script>
<script id="quotationList" type="text/x-kendo-template">
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
							        	<!-- PRINT/EXPORT  -->
								        <div class="tab-pane" id="tab-3">								        	
								        	<span id="savePrint" class="btn btn-icon btn-default glyphicons print print1" data-bind="click: printGrid" style="width: 80px;"><i></i><span data-bind="text: lang.lang.print"></span></span>
								        	<!-- <span id="" class="btn btn-icon btn-default pdf" data-bind="click: cancel" style="width: 80px;">
								        		<i class="fa fa-file-pdf-o"></i>
								        		Print as PDF
								        	</span> -->
								        	<span id="" class="btn btn-icon btn-default execl" data-bind="click: ExportExcel" style="width: 80px;">
								        		<i class="fa fa-file-excel-o"></i>
								        		<span data-bind="text: lang.lang.export_to_excel"></span>
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
							<h3 data-bind="text: company.name"></h3>
							<h2>Quotation List</h2>
							<p data-bind="text: displayDate"></p>
						</div>

						<div class="row-fluid">
							<div class="span5">
								<div class="total-customer">
									<div class="span6">
										<p data-bind="text: lang.lang.number_of_customer"></p>
										<span data-bind="text: dataSource.total"></span>
									</div>
									<div class="span6">
										<p data-bind="text: lang.lang.order"></p>
										<span data-bind="text: orderCount"></span>
									</div>
								</div>
							</div>
							<div class="span7">
								<div class="total-customer">									
									<p data-bind="text: lang.lang.amount"></p>
									<span data-bind="text: totalAmount"></span>
								</div>
							</div>
						</div>

						<table class="table table-borderless table-condensed">
							<thead>
								<tr>
									<th data-bind="text: lang.lang.number"></th>
									<th data-bind="text: lang.lang.reference"></th>
									<th data-bind="text: lang.lang.date"></th>
									<th style="text-align: center;" data-bind="text: lang.lang.status"></th>
									<th style="text-align: right;" data-bind="text: lang.lang.amount"></th>
								</tr>
							</thead>
							<tbody data-role="listview"
									data-template="quotationList-template"
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
<script id="quotationList-template" type="text/x-kendo-template">
	<tr style="font-weight: bold; color: black;">
		<td colspan="5">#=name#</td>
	</tr>	
	# var amount = 0;#
	#for(var i= 0; i <line.length; i++) {#
		# amount += line[i].amount;#
		<tr>
			<td style="padding-left: 20px !important;">
				<a href="\#/#=line[i].type.toLowerCase()#/#=line[i].id#">#=line[i].number#</a>
			</td>
			<td>
				#if(line[i].reference.length>0){#
					<a href="\#/#=line[i].reference[0].type.toLowerCase()#/#=line[i].reference[0].id#"><i></i> #=line[i].reference[0].number#</a>
				#}#
			</td>
			<td>#=kendo.toString(new Date(line[i].issued_date), "dd-MM-yyyy")#</td>
			<td style="text-align: center;">
        		#if(line[i].status==="0"){#
        			Open
        		#}else{#
        			Used
        		#}#
			</td>
			<td style="text-align: right;">#=kendo.toString(line[i].amount, "c2", banhji.locale)#</td>
		</tr>
	#}#
	<tr>
    	<td colspan="4" style="font-weight: bold; color: black;"><span data-bind="text: lang.lang.total"></span> #=name#</td>    	
    	<td style="text-align: right; font-weight: bold; border-top: 1px solid black !important; color: black;">
    		#=kendo.toString(amount, "c2", banhji.locale)#
    	</td>
    </tr>
    <tr>
    	<td colspan="5">&nbsp;</td>
    </tr>
</script>
<script id="saleOrderList" type="text/x-kendo-template">
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
							        	<!-- PRINT/EXPORT  -->
								        <div class="tab-pane" id="tab-3">								        	
								        	<span id="savePrint" class="btn btn-icon btn-default glyphicons print print1" data-bind="click: printGrid" style="width: 80px;"><i></i><span data-bind="text: lang.lang.print"></span></span>
								        	<!-- <span id="" class="btn btn-icon btn-default pdf" data-bind="click: cancel" style="width: 80px;">
								        		<i class="fa fa-file-pdf-o"></i>
								        		Print as PDF
								        	</span> -->
								        	<span id="" class="btn btn-icon btn-default execl" data-bind="click: ExportExcel" style="width: 80px;">
								        		<i class="fa fa-file-excel-o"></i>
								        		<span data-bind="text: lang.lang.export_to_excel"></span>
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
							<h3 data-bind="text: company.name"></h3>
							<h2 data-bind="text: lang.lang.sale_order_list"></h2>
							<p data-bind="text: displayDate"></p>
						</div>

						<div class="row-fluid">
							<div class="span5">
								<div class="total-customer">
									<div class="span6">
										<p data-bind="text: lang.lang.number_of_customer"></p>
										<span data-bind="text: dataSource.total"></span>
									</div>
									<div class="span6">
										<p data-bind="text: lang.lang.order"></p>
										<span data-bind="text: orderCount"></span>
									</div>
								</div>
							</div>
							<div class="span7">
								<div class="total-customer">									
									<p data-bind="text: lang.lang.amount"></p>
									<span data-bind="text: totalAmount"></span>
								</div>
							</div>
						</div>

						<table class="table table-borderless table-condensed">
							<thead>
								<tr>
									<th data-bind="text: lang.lang.number"></th>
									<th data-bind="text: lang.lang.reference"></th>
									<th data-bind="text: lang.lang.date"></th>
									<th style="text-align: center;" data-bind="text: lang.lang.status"></th>
									<th style="text-align: right;" data-bind="text: lang.lang.amount"></th>
								</tr>
							</thead>
							<tbody data-role="listview"
									data-template="saleOrderList-template"
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
<script id="saleOrderList-template" type="text/x-kendo-template">
	<tr style="font-weight: bold; color: black;">
		<td colspan="5">#=name#</td>
	</tr>	
	# var amount = 0;#
	#for(var i= 0; i <line.length; i++) {#
		# amount += line[i].amount;#
		<tr>
			<td style="padding-left: 20px !important;">
				<a href="\#/#=line[i].type.toLowerCase()#/#=line[i].id#">#=line[i].number#</a>
			</td>
			<td>
				#if(line[i].reference.length>0){#
					<a href="\#/#=line[i].reference[0].type.toLowerCase()#/#=line[i].reference[0].id#"><i></i> #=line[i].reference[0].number#</a>
				#}#
			</td>
			<td>#=kendo.toString(new Date(line[i].issued_date), "dd-MM-yyyy")#</td>
			<td style="text-align: center;">
        		#if(line[i].status==="0"){#
        			Open
        		#}else{#
        			Used
        		#}#
			</td>
			<td style="text-align: right;">#=kendo.toString(line[i].amount, "c2", banhji.locale)#</td>
		</tr>
	#}#
	<tr>
    	<td colspan="4" style="font-weight: bold; color: black;"><span data-bind="text: lang.lang.total"></span> #=name#</td>    	
    	<td style="text-align: right; font-weight: bold; border-top: 1px solid black !important; color: black;">
    		#=kendo.toString(amount, "c2", banhji.locale)#
    	</td>
    </tr>
    <tr>
    	<td colspan="5">&nbsp;</td>
    </tr>
</script>
<script id="saleOrderByJobEngagment" type="text/x-kendo-template">
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
							        	<!-- PRINT/EXPORT  -->
								        <div class="tab-pane" id="tab-3">								        	
								        	<span id="savePrint" class="btn btn-icon btn-default glyphicons print print1" data-bind="click: printGrid" style="width: 80px;"><i></i><span data-bind="text: lang.lang.print"></span></span>
								        	<!-- <span id="" class="btn btn-icon btn-default pdf" data-bind="click: cancel" style="width: 80px;">
								        		<i class="fa fa-file-pdf-o"></i>
								        		Print as PDF
								        	</span> -->
								        	<span id="" class="btn btn-icon btn-default execl" data-bind="click: ExportExcel" style="width: 80px;">
								        		<i class="fa fa-file-excel-o"></i>
								        		<span data-bind="text: lang.lang.export_to_excel"></span>
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
							<h3 data-bind="text: company.name"></h3>
							<h2>Sale Order by Job/Engagement</h2>
							<p data-bind="text: displayDate"></p>
						</div>

						<div class="row-fluid">
							<div class="span5">
								<div class="total-customer">
									<p>Number of Job Ordered</p>
									<span data-format="n0" data-bind="text: dataSource.total()"></span>
								</div>
							</div>
							<div class="span7">
								<div class="total-customer">
										<p>Amount</p>
										<span data-bind="text: total"></span>							
								</div>
							</div>
						</div>

						<table class="table table-borderless table-condensed ">
							<thead>
								<tr>
									<th><span>Name</span></th>
									<th><span>Date</span></th>
									<th><span>Reference</span></th>
									<th><span>Status</span></th>
									<th style="text-align: right;"><span>Amount</span></th>
								</tr>
							</thead>
							<tbody data-role="listview"
									 data-auto-bind="false"
									 data-bind="source: dataSource"
									 data-template="saleOrderByJobEngagment-template"
							></tbody>
						</table>					
					</div>	
				</div>		
			</div>
		</div>
	</div>
</script>
<script id="saleOrderByJobEngagment-template" type="text/x-kendo-template">
	<tr style="font-weight: bold; color: black;">
		<td colspan="5">#=job#</td>
	</tr>	
	# var amount = 0;#
	#for(var i= 0; i < line.length; i++) {#
		#amount += line[i].amount;#
		<tr>
			<td>#=line[i].name#</td>
			<td>#=kendo.toString(new Date(line[i].issued_date), "dd-MM-yyyy")#</td>
			<td style="padding-left: 20px !important;">
				<a href="\#/#=line[i].type.toLowerCase()#/#=line[i].id#">#=line[i].number#</a>
			</td>
			<td style="text-align: center;">
        		#if(line[i].status==="0"){#
        			Open
        		#}else{#
        			Used
        		#}#
			</td>
			<td style="text-align: right;">#=kendo.toString(line[i].amount, "c2", banhji.locale)#</td>
		</tr>
	#}#
	<tr>
    	<td colspan="4" style="font-weight: bold; color: black;"><span data-bind="text: lang.lang.total"></span>Total #=job#</td>    	
    	<td style="text-align: right; font-weight: bold; border-top: 1px solid black !important; color: black;">
    		#=kendo.toString(amount, "c2", banhji.locale)#
    	</td>
    </tr>
    <tr>
    	<td colspan="5">&nbsp;</td>
    </tr>
</script>


<!-- #############################################
##################################################
#	TEMPLATE LIST VIEW 					 		 #
##################################################
############################################## -->
<script id="contact-list-tmpl" type="text/x-kendo-tmpl">
	<span>#=abbr##=number#</span>	
	<span>#=name#</span>	
</script>
<script id="contact-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="\#/customer">+ Add New Customer</a></li>
    </strong>
</script>
<script id="category-list-tmpl" type="text/x-kendo-tmpl">
	<span>#=name#</span>  
</script>
<script id="category-header-tmpl" type="text/x-kendo-tmpl">
	<strong>
	  <a href="\#/category">+ Add New Category</a></li>
	</strong>
</script>
<script id="supplier-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="\#/vendor">+ Add New Supplier</a></li>
    </strong>
</script>
<script id="currency-list-tmpl" type="text/x-kendo-tmpl">
	<span>
		#=code# - #=country#
	</span>
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
<script id="customer-payment-method-header-tmpl" type="text/x-kendo-tmpl">
	<strong>
    	<a href="\#/customer_setting">+ Add New Payment Method</a>
    </strong>	
</script>
<script id="customer-term-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="\#/customer_setting">+ Add New Term</a>
    </strong>
</script>

<script id="employee-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="<?php echo base_url(); ?>admin\#employeelist">+ Add New Employee</a>
    </strong>
</script>

<script id="item-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="\#/item">+ Add New Item</a> &nbsp;&nbsp;
    	<a href="\#/item_service">+ Add New Service</a>
    </strong>
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

<script id="vendor-type-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="\#/vendor_setting">+ Add New Supplier Type</a>
    </strong>
</script>
<script id="vendor-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="\#/vendor">+ Add New Supplier</a>
    </strong>
</script>
<script id="vendor-payment-method-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="\#/vendor_setting">+ Add New Payment Method</a>
    </strong>
</script>
<script id="vendor-payment-term-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="\#/vendor_setting">+ Add New Payment Term</a>
    </strong>
</script>

<script id="cash-payment-method-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="\#/cash_seting">+ Add New Payment Method</a>
    </strong>
</script>
<script id="cash-payment-term-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="\#/cash_seting">+ Add New Payment Term</a>
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
<script id="account-type-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="\#/customer_setting">+ Add New Customer Type</a>
    </strong>
</script>
<script id="account-type-list-tmpl" type="text/x-kendo-tmpl">	
	<span>
		#=number#				
	</span>
	-
	<span>#=name#</span>
</script>

<script id="tax-header-tmpl" type="text/x-kendo-tmpl">
	<strong>
    	<a href="\#/tax">+ Add New Tax</a>
    </strong>	
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
<script id="attachment-rith-list-tmpl" type="text/x-kendo-tmpl">
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
		<td>
			#if(id){#
				<a href="#=url#" target="_blank" class="btn-action glyphicons download btn-default"><i></i></a>
			#}#
			<span class="btn-action glyphicons remove_2 btn-danger" data-bind="click: onRemove"><i></i></span>			
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
		<td>
			#if(id){#
				<a href="#=url#" target="_blank" class="btn-action glyphicons download btn-default"><i></i></a>
			#}#
			<span class="btn-action glyphicons remove_2 btn-danger" data-bind="click: removeFile"><i></i></span>			
		</td>
	</tr>
</script>
<script id="errorTemplate" type="text/x-kendo-template">
    <div class="wrong-pass">
        <img style="float: left; cursor: pointer;" src="http://demos.telerik.com/kendo-ui/content/web/notification/error-icon.png" />        
        <h3>#= message #</h3>
    </div>
</script>
<script id="successTemplate" type="text/x-kendo-template">
    <div class="upload-success">
        <img src="http://demos.telerik.com/kendo-ui/content/web/notification/success-icon.png" />
        <h3>#= message #</h3>
    </div>
</script>

<!--  List Templates -->
<!-- #############################################
##################################################
#	MENU VIEW 					 			 	#
##################################################
############################################## -->
<script id="saleMenu" type="text/x-kendo-template">
	
</script>
