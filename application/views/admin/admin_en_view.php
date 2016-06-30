<!DOCTYPE html>
<!--[if lt IE 7]> <html class="front ie lt-ie9 lt-ie8 lt-ie7 fluid top-full menuh-top"> <![endif]-->
<!--[if IE 7]>    <html class="front ie lt-ie9 lt-ie8 fluid top-full menuh-top sticky-top"> <![endif]-->
<!--[if IE 8]>    <html class="front ie lt-ie9 fluid top-full menuh-top sticky-top"> <![endif]-->
<!--[if gt IE 8]> <html class="animations front ie gt-ie8 fluid top-full menuh-top sticky-top"> <![endif]-->
<!--[if !IE]><!--><html class="animations front fluid top-full menuh-top sticky-top"><!-- <![endif]-->
<head>
	<title>Banhji | Admin Page</title>
	
	<!-- Meta -->
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE" />
	
	<!-- Bootstrap -->
	<link href="<?php echo base_url(); ?>resources/common/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>resources/common/bootstrap/css/responsive.css" rel="stylesheet" type="text/css" />
	
	<!-- Glyphicons Font Icons -->
	<link href="<?php echo base_url(); ?>resources/common/theme/fonts/glyphicons/css/glyphicons.css" rel="stylesheet" />
	
	<link rel="stylesheet" href="<?php echo base_url(); ?>resources/common/theme/fonts/font-awesome/css/font-awesome.min.css">
	<!--[if IE 7]><link rel="stylesheet" href="<?php echo base_url(); ?>resources/common/theme/fonts/font-awesome/css/font-awesome-ie7.min.css"><![endif]-->
	
	<!-- Uniform Pretty Checkboxes -->
	<link href="<?php echo base_url(); ?>resources/common/theme/scripts/plugins/forms/pixelmatrix-uniform/css/uniform.default.css" rel="stylesheet" />
	
	<!-- Bootstrap Extended -->
	<link href="<?php echo base_url(); ?>resources/common/bootstrap/extend/bootstrap-select/bootstrap-select.css" rel="stylesheet" />
	
	<!-- JQueryUI -->
	<link href="<?php echo base_url(); ?>resources/common/theme/scripts/plugins/system/jquery-ui/css/smoothness/jquery-ui-1.9.2.custom.min.css" rel="stylesheet" />
	
	<!-- MiniColors ColorPicker Plugin -->
	<link href="<?php echo base_url(); ?>resources/common/theme/scripts/plugins/color/jquery-miniColors/jquery.miniColors.css" rel="stylesheet" />
	
	<!-- Google Code Prettify Plugin -->
	<link href="<?php echo base_url(); ?>resources/common/theme/scripts/plugins/other/google-code-prettify/prettify.css" rel="stylesheet" />

	<!-- Main Theme Stylesheet :: CSS -->
	<link href="<?php echo base_url(); ?>resources/common/theme/css/style-default-menus-dark.css?1374506533" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>resources/common/theme/skins/css/alizarin-crimson.css" rel="stylesheet" />
	
	<link rel="stylesheet" href="<?php echo base_url(JS."kendoui/styles/kendo.common.min.css");?>">
	<link rel="stylesheet" href="<?php echo base_url(JS."kendoui/styles/kendo.material.min.css");?>">
	<link rel="stylesheet" href="<?php echo base_url(JS."kendoui/styles/kendo.dataviz.material.min.css");?>">
	<link rel="stylesheet" href="<?php echo base_url(JS."kendoui/styles/kendo.dataviz.bootstrap.min.css");?>">
	<!-- LESS.js Library -->
	<script src="<?php echo base_url(); ?>resources/common/theme/scripts/plugins/system/less.min.js"></script>
	<link href='https://fonts.googleapis.com/css?family=Battambang:400,700' rel='stylesheet' type='text/css'>
	<style>
		.k-listview{
			padding: 10px 5px;
            margin-bottom: -1px;
            /*min-height: 510px;*/
            border: none;
		}
		.product {
            float: left;
            position: relative;
            width: 226px;
            height: 300px;
            margin: 3px 4px;
            padding: 0;
            text-align: center;
        }
        .product h3 {
            padding: 10px 5px 10px 0;
            overflow: hidden;
            line-height: 1.1em;
            font-size: .9em;
            font-weight: normal;
            text-transform: uppercase;
            color: #999;
        }
        
        .k-listview:after {
            content: ".";
            display: block;
            height: 0;
            clear: both;
            visibility: hidden;
        }
	</style>
</head>
<body>
	<div id="wrapperApplication" class="container-fluid">	
	</div>

	<!-- template -->
	<script type="text/x-kendo-template" id="layout">
		<div class="navbar main hidden-print">
			<div class="container-960">
				<!-- Brand -->
				<a href="#" class="appbrand pull-left"><span class="text-primary">BanhJi</span> | Admin Section</a>
				<ul class="topnav pull-right">
					<li><a href="#company">Company</a></li>
					<li><a href="#user">User Management</a></li>
					<li><a href="#employees">Employee Management</a></li>
					<li><a href="demo">App</a></li>
					<li><a href="admin">KH</a></li>
					<li class="dropdown dd-1 active">
						<a href="" data-toggle="dropdown" id='my-account'></a>
						<ul class="dropdown-menu pull-left">
							<li class=""><a href="#password">Change Password</a></li>
						</ul>
					</li>
					
				</ul>
				<div class="clearfix"></div>
				<!-- // Top Menu Right END -->	
			</div>	
		</div>
		<div id="content"></div>
		<div id="footer" class="hidden-print">	
			<div class="container-960 innerTB">
				<div class="row-fluid">
					Ad for PCG Service
					
					<div class="span3 pull-right">
						<h4>Contact</h4>
						<ul class="icons">
							<li class="glyphicons phone"><i></i>01 230 1958</li>
							<li class="glyphicons envelope"><i></i>support@banhji.com</li>
						</ul>
						
						<h4>Social</h4>
						<a href="https://www.facebook.com/BanhjiApp" class="glyphicons standard primary facebook"><i></i></a>
						<a href="" class="glyphicons standard twitter"><i></i></a>
						<a href="" class="glyphicons standard linked_in"><i></i></a>
						<a href="" class="glyphicons standard google_plus"><i></i></a>
						<a href="" class="glyphicons standard vimeo"><i></i></a>
					</div>
				</div>
				
				<!--  Copyright Line -->
				<div class="copy">
					© 2016 - <a href="http://www.banhji.com">banhji.com</a>
					<span class="appbrand">BanhJi</span>
				</div>
				<!--  End Copyright Line -->	
			</div>
		</div>
	</script>
	<script type="text/x-kendo-template" id="login-template">
		<div class="container-fluid">	
			<div class="container-960 innerT">
				<div class="row-fluid innerTB">
					<div class="span4 innerLR">
						<img data-bind="attr: {src: inst().logo}" alt=""/><a href="#companyLogo">edit</a><br/>
						<table class="table">
							<tbody>
								<tr>
									<td>ឈ្មោះ</td>
									<td><span data-bind="text: inst().legal_name"></span></td>
								</tr>
								<tr>
									<td>VAT</td>
									<td><span data-bind="text: inst().vat_number"></span></td>
								</tr>
								<tr>
									<td>អុីម៉េល</td>
									<td><span data-bind="text: inst().email"></span></td>
								</tr>
								<tr>
									<td>អាស័យដ្ឋាន</td>
									<td><span data-bind="text: inst().address"></span></td>
								</tr>
							</tbody>
						</table>
						<h3 style="color: blue; fonst-size: 4pt; border-bottom: 1px solid #54eeff; padding-bottom: 10px;">
							Apps <button class="btn btn-primary pull-right" data-bind="click: subscribeMod">Subscribe</button>
						</h3>
						<ul data-role="listview" style="list-style: none; padding: 0; margin: 0; border: 0;"
							data-bind="source: moduleVM.instMod"
							data-auto-bind='true' 
							data-template="institute-module-template"></ul>
					</div>
					<div class="span8">
						<div class="row">
							<div class="span4">
								<div class="widget-stats widget-stats-primary widget-stats-5">
									<span class="glyphicons cart_out"><i></i></span>
									<span class="txt">Vendors<span data-bind="text: vendorCount"></span></span>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="span4">
								<div class="widget-stats widget-stats-inverse widget-stats-5">
									<span class="glyphicons cart_in"><i></i></span>
									<span class="txt">Customers<span data-bind="text: custCount"></span></span>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="span4">
								<div class="widget-stats widget-stats-inverse widget-stats-5">
									<span class="glyphicons cardio"><i></i></span>
									<span class="txt">Active Customers<span data-bind="text: actCustCount"></span></span>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
						<div class="separator bottom"></div>
						<div class="row">
							<div class="span6">
								<div class="widget-stats widget-stats-info widget-stats-5">
									<span class="glyphicons circle_minus"><i></i></span>
									<span class="txt">Account Payable<span data-bind="text: apAccount"></span></span>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="span6">
								<div class="widget-stats widget-stats-info widget-stats-5">
									<span class="glyphicons circle_plus"><i></i></span>
									<span class="txt">Account Receivable<span data-bind="text: arAccount"></span></span>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="span12">
								<div style="height: 300px;" id="index-income-graph"></div>
							</div>
						</div>		
					</div>
				</div>						
			</div>
		</div>
	</script>
	<script type="text/x-kendo-template" id="institute-module-template">
		<li style="padding: 5px 10px; margin: 1px 0; background-color: \#eeeeee;">
        	<span class="strong"><i class="icon-check"></i> #=name#</span>
        </li>
	</script>
	<script type="text/x-kendo-template" id="institute-module-page-template">
		<div class="container-fluid">	
			<div class="container-960 innerT">
				<div class="row-fluid innerTB">
					<div class="span12">
						<div class="heading-buttons">
							<h1 class="separator bottom">Home</h1>
							<div class="buttoms pull-right">
								<button class="btn btn-primary" data-bind="click: close"><i class="icon-remove-sign"></i></button>
							</div>
						</div>				
						<div data-role="listview" 
							data-bind="source: moduleVM.modules" 
							data-auto-bind=false 
							data-template="institute-module-page-list-template"
							></div>
						 <div data-role="notification" data-button=true data-position="{pinned: true}" id="ntf1"></div>
					</div>
				</div>
			</div>
		</div>
	</script>
	<script type="text/x-kendo-template" id="institute-module-page-list-template">
		<div class="product">
            <img data-bind="attr: {src: image_url}" />
            <h3>#:name#</h3>
            <p>#=description#</p>
            <button class="btn" data-bind="visible: coreProduct, events: {click: unsubscribe}">Unsubscribe</button>
            <button class="btn" data-bind="invisible: coreProduct, events: {click: subscribe}">Subscribe</button>
        </div>
	</script>
	<script type="text/x-kendo-template" id="page">
		<div id="col1" class="span2">
			<ul class="nav nav-tabs nav-stacked">
				<li><a href="#/page/password">Change Password</a></li>
			</ul>
		</div>
		<div id="col2" class="span10">
			<div class="row">
				<div class="span6">
					<button class="btn btn-primary btn-block" data-bind="click: createComp">Create Company</button>
				</div>
				<div class="span6">
					<button class="btn btn-default btn-block">Request Admin to add you</button>
				</div>
			</div>
		</div>
	</script>
	<script type="text/x-kendo-template" id="create-company-template">
		<div class="container-960">
			<div class="row">
				<div class="span12">
					<div class="widget"​ style="overflow: hidden">
						<div class="widget-head">
							<span class="btn btn-primary pull-right" data-bind="click: close">X</span>
							<h3 class="heading">Company</h3>
						</div>
						<div class="widget-body">
							<table class="table">
								<tbody>
									<tr>
										<td>Name</td>
										<td><input type="text" data-bind="value: newInst.name" /></td>
										<td>Legal Name</td>
										<td><input type="text" data-bind="value: newInst.legal_name" /></td>
									</tr>
									<tr>
										<td>VAT</td>
										<td><input type="text" data-bind="value: newInst.vat_no" /></td>
										<td>Fiscal Year</td>
										<td><input type="text" data-bind="value: newInst.fiscal_date" /></td>
									</tr>
									<tr>
										<td>Tax Regime</td>
										<td><input type="text" data-role="dropdownlist" 
										   data-bind="source: taxRegimes, value: newInst.tax_regime"
										   data-text-field="type"
										   data-value-field="code"
										   data-option-label="---Select One---" /></td>
										<td>Founded Year</td>
										<td><input type="text" data-role="datepicker" data-bind="value: newInst.date_founded" /></td>
									</tr>
									<tr>
										<td>Is local company</td>
										<td><input type="checkbox" data-bind="checked: newInst.is_local"/> Yes</td>
										<td>Email</td>
										<td><input type="text" data-bind="value: newInst.email" /></td>
									</tr>
									<tr>
										<td>Locale</td>
										<td><input type="text" data-role="dropdownlist" 
										   data-bind="source: currency, value: newInst.locale" 
										   data-option-label="---Select One---"
										   data-value-field="locale" 
										   data-text-field="code" /></td>
										<td>Reporting Currency</td>
										<td><input type="text" data-role="dropdownlist" 
										   data-bind="source: currency, value: newInst.report_locale" 
										   data-option-label="---Select One---"
										   data-value-field="locale" 
										   data-text-field="code" /></td>
									</tr>
									<tr>
										<td>Country</td>
										<td><input type="text" data-role="dropdownlist" 
										   data-bind="source: countries, value: newInst.country" 
										   data-text-field="name" 
										   data-value-field="id"
										   data-option-label="---"
										   style="width: 220px;" /></td>
										<td>Province/State</td>
										<td><input type="text" data-role="dropdownlist" 
									       data-bind="source: provinces, value: newInst.province" 
									       data-text-field="local" 
									       data-value-field="id"
									       data-option-label="---"
									       style="width: 220px;" /></td>
									</tr>
									<tr>
										<td>Industry</td>
												<td><input type="text" data-role="dropdownlist" 
										   data-bind="source: industry, value: newInst.industry" 
										   data-text-field="name" 
										   data-value-field="id"
										   data-option-label="---"
										   style="width: 220px;" /></td>
										<td>Type</td>
										<td><input type="text" data-role="dropdownlist" 
										   data-bind="source: types, value: newInst.type" 
										   data-text-field="name" 
										   data-value-field="id"
										   data-option-label="---"
										   style="width: 220px;" /></td>
									</tr>
									<tr>
										<td>Address</td>
										<td><input type="text" data-bind="value: newInst.address" /></td>
										<td>Description</td>
										<td><textarea data-bind="value: newInst.description" cols="30" rows="10"></textarea></td>
									</tr>
								</tbody>
							</table>
							<button class="btn btn-primary pull-right" data-bind="click: saveIntitute">Submit</button>
							<div id="createComMessage"></div>
						</div>
					</div>
				</div>			
			</div>
		</div>
	</script>
	<script type="text/x-kendo-template" id="page-admin">
		<div id="col1" class="span2">
			<ul class="nav nav-tabs nav-stacked">
				<li><a href="#/page/companyInfo">Company</a></li>
				<li><a href="#/page/companyLogo">Logo</a></li>
				<li><a href="#/page/userlist">User Management</a></li>
				<li><a href="#/page/employee">Employee Management</a></li>
				<li><a href="#/page/password">Change Password</a></li>
			</ul>
		</div>
		<div id="col2" class="span10">
		</div>
	</script>
	<script type="text/x-kendo-template" id="page-admin-userlist">
		<span class="btn btn-success pull-right" data-bind="click: add"><i class="icon-plus"></i> Add User</span>
		<table class="table">
			<thead>
				<tr>
					<th>Name</th>
					<th>Role</th>
					<th>...</th>
				</tr>
			</thead>
			<tbody
				data-role="listview" data-bind="source: dataStore" data-template="page-admin-userlist-template"
			></tbody>
		</table>
		<div data-role="pager" data-bind="source: dataStore"></div>
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
				   data-option-label="---"
				   data-bind="source: roleDS, value: current.permission" 
				   data-text-field="name" 
				   data-value-field="id" />
			<button class="btn btn-success" data-bind="click: sync">Save</button>
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
			<button class="btn btn-success" data-bind="click: sync">Save</button>
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
			<button class="btn btn-success" data-bind="click: changePwd">Save</button>
			<button class="btn btn-default" data-bind="click: cancelAdd">Cancel</button>
		</div>
	</script>
	<script type="text/x-kendo-template" id="page-admin-comany-logo-template">
		<div class="container-960">
			<div class="row">
				<div class="span4 offset4">
					<div class="widget"​ style="overflow: hidden">
						<div class="widget-head">
							<span class="btn btn-primary pull-right" data-bind="click: close">X</span>
							<h3 style="text-align: center; font-size: 14px;"​>Company Logo</h3>
						</div>
						<div class="widget-body">
							<input type="file" data-role="upload" name="userFile"
								   data-async="{saveUrl:'http://rith.local/banhji/api/banhji/logo', saveField:'userFile'}"
								   data-bind="events: {success:onSuccessUpload}"
								   data-localization="{select: 'Select', dropFilesHere: 'Drop file here'}" />
							<div id="createComMessage"></div>
						</div>
					</div>
				</div>			
			</div>
		</div>
	</script>
	<script type="text/x-kendo-template" id="module-template">
		<div class="widget">
		    <div class="widget-head">
		        	<h4 class="heading glyphicons history"><i></i>Modules</h4>
		        	<button class="btn details pull-right" data-bind="click: close">X</button>
		    </div>
		    <div class="widget-body list">
		        <ul data-role="listview" data-bind="source: instMod" data-auto-bind=false data-template="module-list-template">
		        </ul>
		        <div data-role="notification" data-button=true data-position="{pinned: true}" id="ntf1"></div>
		        <button class="btn btn-primary pull-right" data-bind="click: save">Save</button>
		    </div>
		</div>
	</script>
	<script type="text/x-kendo-template" id="module-list-template">
		<li>	
        	<span class="strong">#=name#</span>
        	<button class="btn btn-primary pull-right" data-bind="invisible: used, events: {click: assignToMod}">Assign to</button>
        	<button class="btn btn-default pull-right" data-bind="visible: used, events: {click: unAssignTo}">Unassign</button>
        </li>
	</script>
	<script type="text/x-kendo-template" id="user-template">
		<div class="container-960 innerT">
			<div class="innerLR">
				<div class="widget widget-heading-simple widget-body-white widget-employees">
						
					<!-- Widget Heading -->
					<div class="widget-head">
						<h4 class="heading glyphicons user"><i></i>User Management</h4>
					</div>
					<!-- // Widget Heading END -->
					
					<div class="widget-body padding-none">
						
						<div class="row-fluid row-merge">
							<div class="span4 listWrapper" style="height: 600px;">
								<div class="innerAll">
									<form autocomplete="off" class="form-inline">
										<div class="widget-search separator bottom">
											<button type="button" class="btn btn-default pull-right" data-bind="click: addUser"><i class="icon-plus"></i></button>
											<button type="button" class="btn btn-default pull-right" data-bind="click: findById"><i class="icon-search"></i></button>
											<div class="overflow-hidden">
												<input type="text" data-bind="value: searchKey" placeholder="Find someone ..">
											</div>
										</div>
									</form>
								</div>
								<span class="results" data-bind="text: dataStore.total"></span>
								<div class="table table-condensed table-bordered" data-role="grid" 
									 data-bind="source: dataStore" 
									 data-columns="[{title:''}]"
									 data-row-template="user-list-template"
									 data-pageable=true
									 data-selectable=true
									 data-height="530px"></div>
							</div>
							<div class="span8 detailsWrapper" style="height: 410px;">
								<div id="container"></div>
							</div>
						</div>
						
					</div>
				</div>
				<!-- // Widget END -->
				
			</div>
		</div>			
	</script>
	<script type="text/x-kendo-template" id="user-container-template">
		<div class="ajax-loading hide">
			<i class="icon-spinner icon-spin icon-4x"></i>
		</div>
		<div class="innerAll">
			<div class="title">
				<div class="row-fluid">
					<div class="span12 well" style="height: 145px;">
						<h5 class="strong"></h5>
						<h5 class="text-uppercase strong text-primary">
							<i class="icon-group text-regular icon-fixed-width"></i> 
								Subscribed Modules 
								<span class="text-lowercase padding-none"> 
								<button data-bind="click: assignMod" class="pull-right">Assign Module</button></span>
						</h5><br/>
						<ul data-role="listview" class="team"
						data-bind="source: moduleVM.userMod" 
						data-auto-bind=false 
						data-template="user-module-list-template"></ul>
					</div>
				</div>
			</div>
			<div class="body">
				<div class="row-fluid">
					<div class="span12">
						<h5 class="text-uppercase strong text-primary">
							<span class="glyphicons adjust_alt"><i></i> User Audit Trail</span>
						</h5>
						<div data-role="grid" 
						 data-bind="source: logStore"
						 data-auto-bind=false
						 data-height="385px"
						 data-row-template="user-log-list-template"
						 data-columns="[{title: 'Type', width: '100px'}, {title: 'Related'}, {title: 'Action'}]"></div>
					</div>
				</div>
			</div>
		</div>
	</script>
	<script type="text/x-kendo-template" id="user-list-template">
		<tr data-bind="click: onSelected"><td>#=username#</td></tr>
	</script>
	<script type="text/x-kendo-template" id="employee-template">
		<div class="container-960 innerT">
			<div class="innerLR">
				<div class="widget widget-heading-simple widget-body-white widget-employees">
						
					<!-- Widget Heading -->
					<div class="widget-head">
						<h4 class="heading glyphicons user"><i></i>Employee Mangement</h4>
					</div>
					<!-- // Widget Heading END -->
					
					<div class="widget-body padding-none">
						
						<div class="row-fluid row-merge">
							<div class="span4 listWrapper" style="height: 600px;">
								<div class="innerAll">
									<form autocomplete="off" class="form-inline">
										<div class="widget-search separator bottom">
											<button type="button" class="btn btn-default pull-right" data-bind="click: addBtn"><i class="icon-plus"></i></button>
											<button type="button" class="btn btn-default pull-right" data-bind="click: findById"><i class="icon-search"></i></button>
											<div class="overflow-hidden">
												<input type="text" data-bind="value: searchKey" placeholder="Find someone ..">
											</div>
										</div>
									</form>
								</div>
								<span class="results" data-bind="text: dataSource.total"></span>
								<div class="table table-condensed table-bordered" data-role="grid" 
									 data-bind="source: dataSource" 
									 data-columns="[{title:''}]"
									 data-row-template="employee-list-template"
									 data-pageable=true
									 data-selectable=true
									 data-height="530px"></div>
							</div>
							<div class="span8 detailsWrapper" style="height: 410px;">
								<div id="container"></div>
							</div>
						</div>
						
					</div>
				</div>
				<!-- // Widget END -->
				
			</div>
		</div>			
	</script>
	<script type="text/x-kendo-template" id="employee-container-template">
		<div class="ajax-loading hide">
			<i class="icon-spinner icon-spin icon-4x"></i>
		</div>
		<div class="innerAll">
			<div class="title">
				<div class="row-fluid">
					<div class="span12">
						<table class="table table-striped">
							<thead>
								<tr>
									<th colspan="2">
										Employee Detail
										<button class="btn btn-primary pull-right" data-bind="click: edit"><i class="icon-edit-sign"></i></button>
									</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td width="100">Surname</td>
									<td><span data-bind="text: current.surname"></span></td>
								</tr>
								<tr>
									<td>Name</td>
									<td><span data-bind="text: current.name"></span></td>
								</tr>
								<tr>
									<td>Email</td>
									<td><span data-bind="text: current.email"></span></td>
								</tr>
								<tr>
									<td>Phone</td>
									<td><span data-bind="text: current.phone"></span></td>
								</tr>
								<tr>
									<td>DOB</td>
									<td><span data-bind="text: current.dob"></span></td>
								</tr>
								<tr>
									<td>Gender</td>
									<td><span data-bind="text: current.gender"></td>
								</tr>
								<tr>
									<td>Address</td>
									<td><span data-bind="text: current.address"></span></td>
								</tr>
							</tbody>	
						</table>
					</div>
				</div>
			</div>
			<div class="body">
				<div class="row-fluid">
					<div class="span12">
						<hr/>
					</div>
				</div>
			</div>
		</div>
	</script>
	<script type="text/x-kendo-template" id="employee-form-template">
		<div class="widget">
			<div class="widget-head">
				<button class="pull-right" data-bind="click: close">X</button>
			</div>
			<div class="widget-body">
				<div>
					<table class="table">
						<tr>
							<td>Surname</td>
							<td><input type="text" data-bind="value: current.surname" /></td>
						</tr>
						<tr>
							<td>Name</td>
							<td><input type="text" data-bind="value: current.name" /></td>
						</tr>
						<tr>
							<td>Email</td>
							<td><input type="text" data-bind="value: current.email" /></td>
						</tr>
						<tr>
							<td>Phone</td>
							<td><input type="text" data-bind="value: current.phone" /></td>
						</tr>
						<tr>
							<td>DOB</td>
							<td><input type="text"​ data-role="datepicker" data-bind="value: current.dob" /></td>
						</tr>
						<tr>
							<td>Gender</td>
							<td><input type="text" data-bind="value: current.gender" /></td>
						</tr>
						<tr>
							<td>Address</td>
							<td><input type="text" data-bind="value: current.address" /></td>
						</tr>
						<tr>
							<td>Login</td>
							<td><input type="text" data-role="combobox" 
									   data-bind="source: userDataStore, value: current.user_id"
									   data-text-field="username"
									   data-value-field="id"
									   data-value-primitive=true
									   data-filter="contains" /></td>
						</tr>
						<tr>
							<td></td>
							<td><button class="btn btn-primary btn-block" data-bind="click: save">Save</button></td>
						</tr>
					</table>
					<div data-role="notification" data-button=true data-position="{pinned: true}" id="ntf1"></div>
				</div>
			</div>
		</div
	</script>
	<script type="text/x-kendo-template" id="employee-list-template">
		<tr data-bind="click: onChange"><td>#=surname# #=name#</td></tr>
	</script>
	<script type="text/x-kendo-template" id="user-form-template">
		<div class="widget">
			<div class="widget-head">
				<button class="pull-right" data-bind="click: close">X</button>
			</div>
			<div class="widget-body">
				<div>
					<table class="table">
						<tr>
							<td>Email</td>
							<td><input type="text" data-bind="value: username" /></td>
						</tr>
						<tr>
							<td>Password</td>
							<td><input type="password" data-bind="value: password" /></td>
						</tr>
						<tr>
							<td>Confirm Password</td>
							<td><input type="password" data-bind="value: _password" /></td>
						</tr>
						<tr>
							<td></td>
							<td><button class="btn btn-primary btn-block" data-bind="click: signup">Save</button></td>
						</tr>
					</table>
					<div data-role="notification" data-button=true data-position="{pinned: true}" id="ntf1"></div>
				</div>
			</div>
		</div>
	</script>
	<script type="text/x-kendo-template" id="user-module-list-template">
		<li style="width: 61px; margin: 0; border-bottom: 1px solid \#999999">
			<span class="crt"><i class="icon-check"></i></span></span><span class="strong">#=name#</span>
		</li>
	</script>
	<script type="text/x-kendo-template" id="user-log-list-template">
		<tr data-bind="click: onChange">
			<td>#=type#</td>
			<td>#=related.voucher#</td>
			<td>#=action#</td>
		</tr>
	</script>
	<!-- end template -->

	<!-- JQuery -->
	<script>window.jQuery || document.write('<script src="<?php echo base_url(JS."libs/jquery-1.8.2.min.js");?>"><\/script>')</script>
	<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<script src="<?php echo base_url(JS."kendoui/js/kendo.all.min.js");?>"></script>
	<script src="<?php echo base_url(JS."kendoui/js/cultures/kendo.culture.km-KH.min.js");?>"></script>
	<script src="<?php echo base_url(JS."kendoui/js/cultures/kendo.culture.th-TH.min.js");?>"></script>
	<script src="<?php echo base_url(JS."kendoui/js/cultures/kendo.culture.vi-VN.min.js");?>"></script>
	
	<!-- Code Beautify -->
	<script src="<?php echo base_url(); ?>resources/common/theme/scripts/plugins/other/js-beautify/beautify.js"></script>
	<script src="<?php echo base_url(); ?>resources/common/theme/scripts/plugins/other/js-beautify/beautify-html.js"></script>
	
	<!-- Global -->
	<script>
	var basePath = '',
		commonPath = '<?php echo base_url(); ?>resources/common/';
	</script>
	
	<!-- JQueryUI -->
	<script src="<?php echo base_url(); ?>resources/common/theme/scripts/plugins/system/jquery-ui/js/jquery-ui-1.9.2.custom.min.js"></script>
	
	<!-- JQueryUI Touch Punch -->
	<!-- small hack that enables the use of touch events on sites using the jQuery UI user interface library -->
	<script src="<?php echo base_url(); ?>resources/common/theme/scripts/plugins/system/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
	
	
	<!-- Modernizr -->
	<script src="<?php echo base_url(); ?>resources/common/theme/scripts/plugins/system/modernizr.js"></script>
	
	<!-- Bootstrap -->
	<script src="<?php echo base_url(); ?>resources/common/bootstrap/js/bootstrap.min.js"></script>
	
	<!-- SlimScroll Plugin -->
	<script src="<?php echo base_url(); ?>resources/common/theme/scripts/plugins/other/jquery-slimScroll/jquery.slimscroll.js"></script>
	
	<!-- MegaMenu -->
	<script src="<?php echo base_url(); ?>resources/common/theme/scripts/demo/megamenu.js?1374506533"></script>
	
	<!-- jQuery ScrollTo Plugin -->
	<!--[if gt IE 8]><!--><script src="http://balupton.github.io/jquery-scrollto/lib/jquery-scrollto.js"></script><!--<![endif]-->
	
	<!-- History.js -->
	<!--[if gt IE 8]><!--><script src="http://browserstate.github.io/history.js/scripts/bundled/html4+html5/jquery.history.js"></script><!--<![endif]-->
	
	<!-- jQuery Ajaxify -->
	<!--[if gt IE 8]><!--><script src="<?php echo base_url(); ?>resources/common/theme/scripts/plugins/system/jquery-ajaxify/ajaxify-html5.js"></script><!--<![endif]-->
	
	
	<!-- Holder Plugin -->
	<script src="<?php echo base_url(); ?>resources/common/theme/scripts/plugins/other/holder/holder.js?1374506533"></script>
	
	<!-- Uniform Forms Plugin -->
	<script src="<?php echo base_url(); ?>resources/common/theme/scripts/plugins/forms/pixelmatrix-uniform/jquery.uniform.min.js"></script>

	<!-- Bootstrap Extended -->
	<script src="<?php echo base_url(); ?>resources/common/bootstrap/extend/bootstrap-select/bootstrap-select.js"></script>
	<script src="<?php echo base_url(); ?>resources/common/bootstrap/extend/bootbox.js"></script>
	
	<!-- Google Code Prettify -->
	<script src="<?php echo base_url(); ?>resources/common/theme/scripts/plugins/other/google-code-prettify/prettify.js"></script>
	
	<!-- MiniColors Plugin -->
	<script src="<?php echo base_url(); ?>resources/common/theme/scripts/plugins/color/jquery-miniColors/jquery.miniColors.js"></script>
	
	<!-- Cookie Plugin -->
	<script src="<?php echo base_url(); ?>resources/common/theme/scripts/plugins/system/jquery.cookie.js"></script>
	
	<!-- Colors -->
	<script>
	var primaryColor = '#609450',
		dangerColor = '#b55151',
		successColor = '#609450',
		warningColor = '#ab7a4b',
		inverseColor = '#e5412d';
	</script>
	
	<!-- Themer -->
	<script>
	var themerPrimaryColor = primaryColor;
	</script>
	<script src="<?php echo base_url(); ?>resources/common/theme/scripts/demo/themer.js"></script>
	
	<!-- Common Demo Script -->
	<script src=".<?php echo base_url(); ?>resources/common/theme/scripts/demo/common.js?1374506533"></script>
	<script src="<?php echo base_url(); ?>resources/js/libs/localforage.min.js"></script>
	<script>
		var banhji = banhji || {};
		var baseUrl = "<?php echo base_url(); ?>"+'api/';
		
		localforage.config({
			driver: localforage.LOCALSTORAGE,
			name: 'userData'
		});
		function getLocalUser() {
			return JSON.parse(localStorage.getItem('userData/user'));
		}
		banhji.auth = new kendo.data.DataSource({
			transport: {
				read 	: {
					url: baseUrl + 'authentication/users',
					type: "GET",
					headers: {
						"Entity": getLocalUser().institute[0].id
					},
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
				});
			return o;
		};

		banhji.userManagement = kendo.observable({
			auth : banhji.auth,		
			inst 	 : new kendo.data.DataSource({
				transport: {
					read 	: {
						url: baseUrl + 'banhji/company',
						type: "GET",
						dataType: 'json'
					},
					create 	: {
						url: baseUrl + 'banhji/company',
						type: "POST",
						dataType: 'json'
					},
					update 	: {
						url: baseUrl + 'banhji/company',
						type: "PUT",
						dataType: 'json'
					},
					destroy : {
						url: baseUrl + 'banhji/company',
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
						url: baseUrl + 'banhji/industry',
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
						url: baseUrl + 'banhji/countries',
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
						url: baseUrl + 'banhji/provinces',
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
						url: baseUrl + 'banhji/types',
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
			adminDash: banhji.adminDash,
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
			taxRegimes: [
				{ code: 'small', type: 'Small'},
				{ code: 'medium', type: 'Medium'},
				{ code: 'large', type: 'Large'}
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
					is_local: true,
					report_locale: null,
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
				if(!this.validateEmail()) {
					this.sync();
					this.auth.bind('requestEnd', function(e){
						if(e.type === 'create' && e.response.error === false) {
							alert("You are now registered.");
						}
					});
				} else {
					alert("Please check your email");
				}					
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
							alert('Your email is already registered.');
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
		banhji.signup = kendo.observable({
			auth 	: banhji.auth,
			username: null,
			password: null,
			_password: null,
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
			close 	: function() {
				banhji.view.userLayout.showIn("#container", banhji.view.userDash);
				this.auth.cancelChanges();
			},
			signup 	   : function() {
				this.auth.add({
					username: this.get('username'), 
					password: this.get('password'), 
					institute: banhji.userManagement.getLogin().institute[0].id
				});
				this.sync();
			},
			showMessage: function (msg) {
	            $("#ntf1").data("kendoNotification").info(msg);
	        },
			sync: function() {
				this.auth.sync();
				this.auth.bind('requestEnd', function(e){
					var type = e.type;
					var result = e.response.results;
					if(e.response.error) {
						var len = banhji.signup.auth.data().length;
						var data = banhji.signup.auth.at(len - 1);
						banhji.signup.auth.remove(data);
						if(e.response.msg === 'dupliate_user') {
							banhji.signup.showMessage('Email already existed');
						}						
					} else {
						if(type === "read") {
							// get login info
							console.log('true');
						} else if(type === "create") {
							var user = banhji.auth.data()[0];
							banhji.signup.set('username', null);
							banhji.signup.set('passsword', null);
							banhji.signup.set('_password', null);
							banhji.signup.showMessage(user.username + ' has been saved.');
						}
					}
					
				});
			}
		});
		banhji.module = kendo.observable({
			instMod 	: new kendo.data.DataSource({
				transport: {
					read 	: {
						url: baseUrl + 'admin/modules_institute',
						type: "GET",
						dataType: 'json'
					},
					create 	: {
						url: baseUrl + 'admin/modules_institute',
						type: "POST",
						dataType: 'json'
					},
					update 	: {
						url: baseUrl + 'admin/modules_institute',
						type: "PUT",
						dataType: 'json'
					},
					destroy : {
						url: baseUrl + 'admin/modules_institute',
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
				filter: {field: 'id', value: banhji.userManagement.getLogin() ? banhji.userManagement.getLogin().institute[0].id : ''}
				// pageSize: 100
			}),
			modules 	: new kendo.data.DataSource({
				transport: {
					read 	: {
						url: baseUrl + 'admin/modules',
						type: "GET",
						dataType: 'json'
					},
					create 	: {
						url: baseUrl + 'admin/modules',
						type: "POST",
						dataType: 'json'
					},
					update 	: {
						url: baseUrl + 'admin/modules',
						type: "PUT",
						dataType: 'json'
					},
					destroy : {
						url: baseUrl + 'admin/modules',
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
			userMod 	: new kendo.data.DataSource({
				transport: {
					read 	: {
						url: baseUrl + 'admin/modules_users',
						type: "GET",
						dataType: 'json'
					},
					create 	: {
						url: baseUrl + 'admin/modules_users',
						type: "POST",
						dataType: 'json'
					},
					update 	: {
						url: baseUrl + 'admin/modules_institute',
						type: "PUT",
						dataType: 'json'
					},
					destroy : {
						url: baseUrl + 'admin/modules_institute',
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
				filter: {field: 'id', value: banhji.userManagement.getLogin().institute[0].id}
				// pageSize: 100
			}),
			moduleData 	: [],
			userModData : [],
			close 		: function() {
				banhji.view.userLayout.showIn("#container", banhji.view.userDash);
				this.userMod.cancelChanges();
				this.userMod.filter({field: 'id', value: this.get('userId')});
			},
			subscribe 	: function(e) {
				var module = e.data;
				var instId 	 = banhji.userManagement.getLogin().institute[0].id;
				this.instMod.add({moduleId: module.id, instId: instId, save: true});
				this.instMod.sync();
				this.instMod.bind('requestEnd', function(evt){
					e.data.set('coreProduct', true);
					banhji.module.showMessage('Successfully recorded');
				});
			},
			unsubscribe: function(e) {
				var module = e.data;
				var instId 	 = banhji.userManagement.getLogin().institute[0].id;
				this.instMod.add({moduleId: module.id, instId: instId, save: false});
				this.instMod.sync();
				this.instMod.bind('requestEnd', function(evt){
					e.data.set('coreProduct', false);
					banhji.module.showMessage('Successfully recorded');
				});
			},
			userId 		: null,
			assignToMod : function(e) {
				var module = e.data;
				var userId 	 = this.get('userId');
				this.userMod.add({moduleId: module.id, userId: userId, save: true});
				this.userMod.sync();
				this.userMod.bind('requestEnd', function(evt){
					e.data.set('used', true);
					// banhji.module.showMessage('កត់ត្រាបានសំរេច');
				});
			},
			unAssignTo : function(e) {
				var module = e.data;
				var userId 	 = this.get('userId');
				this.userMod.add({moduleId: module.id, userId: userId, save: false});
				this.userMod.sync();
				this.userMod.bind('requestEnd', function(evt){
					e.data.set('used', false);
					// banhji.module.showMessage('កត់ត្រាបានសំរេច');
				});
			},
			showMessage: function (msg) {
	            $("#ntf1").data("kendoNotification").info(msg);
	        },
	        saveRelation: function() {
	        	this.instMod.sync();
				this.instMod.bind('requestEnd', function(evt){
					// if(e.response.error === false) {
					// 	banhji.module.showMessage('កត់ត្រាបានសំរេច');
					// } else {
					// 	banhji.module.showMessage('កត់ត្រាមិនបានសំរេច');
					// }
					console.log(evt.sender._events.requestEnd[0]);
				});
	        },
	        checkModule : function() {
	        	var that = this;
	        	this.instMod.query({
	        		filter: {field: 'id', value: banhji.userManagement.getLogin().institute[0].id},
	        		page: 1,
	        		pageSize: 100
	        	}).then(function(e){
	        		that.modules.fetch(function(){
	        			var data = banhji.module.modules.data();
	        			var ins  = banhji.module.instMod.data();
	        			$.each(data, function(i, v) {
	        				$.each(ins, function(x, y){
	        					if(v.name === y.name) {
	        						data[i].set('coreProduct', true);
	        						return false;
	        					}
	        				});
	        			});
	        		});
	        	});
	        },
	        chckUserMod : function(id) {
	        	var that = this;
	        	this.userMod.query({
	        		filter: {field: 'id', value: id},
	        		page: 1, 
	        		pageSize: 1
	        	}).then(function(){
        			that.instMod.query({
		        		filter: {field: 'id', value: banhji.userManagement.getLogin().id},
		        		page: 1,
		        		pageSize: 100
		        	}).then(function(e){
	        			var data = banhji.module.instMod.data();
	        			var usM  = banhji.module.userMod.data(); 
	        			$.each(data, function(i, v) {
	        				$.each(usM, function(x, y){
	        					if(v.name === y.name) {
	        						data[i].set('used', true);
	        						return false;
	        					}
	        				});
	        			});
		        	});
        		});
	        },
	        save 		: function() {
	        	this.showMessage('updated');
	        }
		});
		
		banhji.modulePage= kendo.observable({
			instMod 	: new kendo.data.DataSource({
				transport: {
					read 	: {
						url: baseUrl + 'admin/modules_institute',
						type: "GET",
						dataType: 'json'
					},
					create 	: {
						url: baseUrl + 'admin/modules_institute',
						type: "POST",
						dataType: 'json'
					},
					update 	: {
						url: baseUrl + 'admin/modules_institute',
						type: "PUT",
						dataType: 'json'
					},
					destroy : {
						url: baseUrl + 'admin/modules_institute',
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
				filter: {field: 'id', value: banhji.userManagement.getLogin().institute[0].id}
				// pageSize: 100
			}),
			close 		: function() {
				banhji.view.layout.showIn('#content', banhji.view.loginView);
				this.userMod.cancelChanges();
			},
			save 		: function() {}
		});

		banhji.adminDash = kendo.observable({
			vendorNum 	: new kendo.data.DataSource({
				transport: {
					read 	: {
						url: baseUrl + 'admin/vendors',
						type: "GET",
						headers: {
							"Entity": banhji.userManagement.getLogin().institute[0].name
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
					data: 'results'
				},
				batch: false,
				serverFiltering: true,
				serverPaging: true,
				// pageSize: 100
			}),
			custNum 	: new kendo.data.DataSource({
				transport: {
					read 	: {
						url: baseUrl + 'admin/customers',
						type: "GET",
						headers: {
							"Entity": banhji.userManagement.getLogin().institute[0].name
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
					data: 'results'
				},
				batch: false,
				serverFiltering: true,
				serverPaging: true,
				// pageSize: 100
			}),
			actCustNum 	: new kendo.data.DataSource({
				transport: {
					read 	: {
						url: baseUrl + 'admin/activeCustomers',
						type: "GET",
						headers: {
							"Entity": banhji.userManagement.getLogin().institute[0].name
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
					data: 'results'
				},
				batch: false,
				serverFiltering: true,
				serverPaging: true,
				// pageSize: 100
			}),
			ap 			: new kendo.data.DataSource({
				transport: {
					read 	: {
						url: baseUrl + 'admin/apaccounts',
						type: "GET",
						headers: {
							"Entity": banhji.userManagement.getLogin().institute[0].name
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
					data: 'results'
				},
				batch: false,
				serverFiltering: true,
				serverPaging: true,
				// pageSize: 100
			}),
			ar 			: new kendo.data.DataSource({
				transport: {
					read 	: {
						url: baseUrl + 'admin/araccounts',
						type: "GET",
						headers: {
							"Entity": banhji.userManagement.getLogin().institute[0].name
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
					data: 'results'
				},
				batch: false,
				serverFiltering: true,
				serverPaging: true,
				// pageSize: 100
			}),
			close 		: function() {
				banhji.router.navigate('');
			},
			inst 		: function() {
				return banhji.userManagement.getLogin().institute[0];
			},
			moduleVM 	: banhji.module,
			subscribeMod: function() {
				banhji.router.navigate('module');
			},
			apAccount 	: 0,
			arAccount 	: 0,
			activeCust 	: '',
			CustomerNum : '',
			vendorCount : 0,
			actCustCount: 0,
			custCount 	: 0,
			onLoad 		: function() {
				this.vendorNum.fetch(function(){
					var data = banhji.adminDash.vendorNum.data();
					kendo.culture(banhji.adminDash.inst().locale);
					var count = kendo.toString(data[0].count, 'n0');
					banhji.adminDash.set('vendorCount', count);
				});
				this.custNum.fetch(function(){
					var data = banhji.adminDash.custNum.data();
					kendo.culture(banhji.adminDash.inst().locale);
					var count = kendo.toString(data[0].count, 'n0');
					banhji.adminDash.set('custCount', count);
				});
				this.actCustNum.fetch(function(){
					var data = banhji.adminDash.actCustNum.data();
					kendo.culture(banhji.adminDash.inst().locale);
					var count = kendo.toString(data[0].count, 'n0');
					banhji.adminDash.set('actCustCount', count);
				});
				this.ap.fetch(function(){
					var data = banhji.adminDash.ap.data();
					kendo.culture(banhji.adminDash.inst().locale);
					var amount = kendo.toString(data[0].amount, 'c2');
					banhji.adminDash.set('apAccount', amount);
				});
				this.ar.fetch(function(){
					var data = banhji.adminDash.ar.data();
					kendo.culture(banhji.adminDash.inst().locale);
					var amount = kendo.toString(data[0].amount, 'c2');
					banhji.adminDash.set('arAccount', amount);
				});
			}
		});

		banhji.users = kendo.observable({
			dataStore	: banhji.auth,
			moduleVM 	: banhji.module,
			logStore 	: new kendo.data.DataSource({
				transport: {
					read 	: {
						url: baseUrl + 'logs',
						type: "GET",
						headers: {
							"Entity": banhji.userManagement.getLogin().institute[0].name
						},
						dataType: 'json'
					},
					create 	: {
						url: baseUrl + 'logs',
						type: "POST",
						headers: {
							"Entity": banhji.userManagement.getLogin().institute[0].name
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
							"Entity": banhji.userManagement.getLogin() === null ? '': banhji.userManagement.getLogin().institute[0].id,
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
			employeeVM 	: banhji.employee,
			searchKey 	: "",
			findById 	: function() {},
			addUser 	: function() {
				banhji.view.userLayout.showIn("#container", banhji.view.userForm);
			},
			assignMod 	: function() {
				banhji.view.userLayout.showIn("#container", banhji.view.module);
				banhji.module.chckUserMod(this.get('current').id);
			},
			onSelected 	: function(e) {
				this.setCurrent(e.data);
				banhji.employee.findByUserID(e.data.id);
				this.logStore.query({
					filter: {field: 'user_id', value: e.data.id},
					pageSize: 100,
					page: 1
				});
				banhji.module.set('userId', e.data.id);
				banhji.module.chckUserMod(e.data.id);
			},
			setCurrent 	: function(current) {
				this.set('current', current);
			},
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
		
		banhji.employee = kendo.observable({
			dataSource 	: new kendo.data.DataSource({
				transport: {
					read 	: {
						url: baseUrl + 'employees',
						type: "GET",
						headers: {
							"Entity": banhji.userManagement.getLogin().institute[0].name
						},
						dataType: 'json'
					},
					create 	: {
						url: baseUrl + 'employees',
						type: "POST",
						headers: {
							"Entity": banhji.userManagement.getLogin().institute[0].name
						},
						dataType: 'json'
					},
					update 	: {
						url: baseUrl + 'employees',
						type: "PUT",
						headers: {
							"Entity": banhji.userManagement.getLogin().institute[0].name
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
			userDataStore: banhji.users.dataStore,
			setCurrent 	: function(current) {
				this.set('current', current);
			},
			findByUserID: function(userId) {
				var that = this;
				this.dataSource.query({
					filter: {field: 'user_id', value: userId},
					page: 1,
					pageSize: 1
				}).then(function(e){
					var data = that.dataSource.data();
					if(data.length > 0) {
						that.setCurrent(data[0]);
					}
				});
			},
			searchKey 	: '',
			findById 	: function() {
				var that = this;
				if(this.get('searchKey') !== "") {
					this.dataSource.query({
						filter: {field: 'id', value: this.get('searchKey')},
						page: 1,
						pageSize: 100
					}).then(function(e){
						var data = that.dataSource.data();
						if(data.length > 0) {
							that.setCurrent(data[0]);
						}
					});
				} else {
					this.dataSource.query({
						filter: {field: 'id <>', value: this.get('searchKey')},
						page: 1,
						pageSize: 100
					});
				}
					
			},
			addBtn		: function() {
				banhji.view.empLayout.showIn("#container", banhji.view.empForm);
				this.dataSource.insert(0, {
					surname: null,
					name: null,
					dob: null,
					user_id: null,
					phone: null,
					gender: null,
					address: null,
					email: null,
				});
				this.setCurrent(this.dataSource.at(0));
			},
			close 		: function() {
				banhji.view.empLayout.showIn("#container", banhji.view.empDash);
				this.set('isEdit', false);
				if(this.dataSource.hasChanges()) {
					this.dataSource.cancelChanges();
				}				
			},
			isEdit 		: false,
			add 		: function() {	
				this.dataSource.insert(0, {
					surname: null,
					name: null,
					department: null,
					position: null,
					role_id: null,
				});
				this.setCurrent(this.dataSource.at(0));
				banhji.view.pageAdmin.showIn('#col2', employeeForm);
			},
			assignToUser: function() {
				if(this.get('current')) {
					console.log('dfkdf');
				} else {
					console.log('n,.');
				}
			},
			edit 		: function(e) {
				banhji.view.empLayout.showIn("#container", banhji.view.empForm);
			},
			cancel 		: function() {
				this.dataSource.cancelChanges();
				banhji.view.pageAdmin.showIn('#col2', employeeView);
			},
			remove 		: function(e) {
				this.dataSource.remove(e.data);
				this.save();
			},
			onChange 	: function(e) {
				this.setCurrent(e.data);
				this.set('isEdit', true);
			},
			save 		: function() {
				this.dataSource.sync();
				// this.dataSource.bind('requestEnd', function(e){
				// 	var type = e.type, res = e.response;
				// 	if(type === 'create' && res.results.length > 0) {
				// 		alert('created');
				// 	} else if(type === 'update') {
				// 		alert('updated');
				// 	} else if(type === 'destroy') {
				// 		alert('deleted');
				// 	}
				// });
			}
		});

		banhji.view = {
			layout 		: new kendo.Layout('#layout', {model: banhji.userManagement}),
			loginView 	: new kendo.View('#login-template', {model: banhji.adminDash}),
			userLayout 	: new kendo.Layout('#user-template', {model: banhji.users}),
			userDash 	: new kendo.View('#user-container-template', {model: banhji.users}),
			userForm 	: new kendo.View('#user-form-template', {model: banhji.signup}),
			empLayout 	: new kendo.Layout('#employee-template', {model: banhji.employee}),
			empDash 	: new kendo.View('#employee-container-template', {model: banhji.employee}),
			empForm 	: new kendo.View('#employee-form-template', {model: banhji.employee}),
			module 		: new kendo.View('#module-template', {model: banhji.module}),
			modulePage 	: new kendo.View('#institute-module-page-template', {model: banhji.adminDash}),
			passwordView: new kendo.View('#page-admin-userlist-password-template', {model: banhji.userManagement})
		};
		<!-- views and layout-->
		banhji.router = new kendo.Router({
			init: function() {
				banhji.view.layout.render("#wrapperApplication");
			},
			routeMissing: function(e) {
				// banhji.view.layout.showIn("#layout-view", banhji.view.missing);
				console.log("no resource found.")
			}
		});

		/* Login page */
		banhji.router.route('/', function(){
			if(banhji.userManagement.getLogin()) {
				banhji.view.layout.showIn('#content', banhji.view.loginView);
				var incomeDS = new kendo.data.DataSource({
					transport: {
						read 	: {
							url: baseUrl + 'sales/income',
							type: "GET",
							headers: {
								"Entity": banhji.userManagement.getLogin().institute[0].name,
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
							}
						}
					},
					schema 	: {
						data: 'results',
						total: 'count'
					},
					group: {
						field: 'month',
						dir: 'desc',
						aggregates: [
							{field: 'amount', aggregate: 'sum'}
						]
					},
					batch: true,
					serverFiltering: true,
					serverPaging: true,
					pageSize: 100
				});
				banhji.adminDash.onLoad();
				incomeDS.fetch(function(e){
					var data = incomeDS.data();
					$('#index-income-graph').kendoChart({
						series: [
							{
								name: 'Income', 
								field: 'income',
								data: data[0].income,
								categoryField: 'month', 
								color: '#004c99', 
								downColor: "red",
								type: 'line'
							},
							{
								name: 'Expense', 
								field: 'expense',
								data: data[0].income, 
								categoryField: 'month', 
								color: '#000000', 
								downColor: "red", 
								type: 'line'
							},
							{
								name: 'Net Income', 
								field: 'amount',
								data: data[0].sale,
								categoryField: 'month', 
								color: '#cccccc', 
								downColor: "red", 
								type: 'column'
							}
						],
						legend: {
							position: "top"
						},
						title: {
							text: "Statement of Profit/Loss"
						},
						tooltip: {
		                    visible: true,
		                    format: "{0:C}",
		                }
					});			
				});
				banhji.adminDash.moduleVM.instMod.query({
					filter:{field: 'id', value: 1},
					page: 1,
					pageSize: 1
				});
			} else {
				console.log('login');
			}			
		});

		banhji.router.route('/page', function(){
			banhji.view.layout.showIn('#menu', banhji.view.menu);	
			banhji.view.layout.showIn('#content', banhji.view.pageAdmin);	
		});

		banhji.router.route('/create_company', function(){
			var view = new kendo.View("#create-company-template", {model: banhji.userManagement});
			$('#createComMessage').text("");
			banhji.view.layout.showIn('#menu', banhji.view.menu);
			banhji.userManagement.addInst();
			banhji.view.layout.showIn('#content', view);
					
		});
		banhji.router.route('company', function(){
			var view = new kendo.View("#create-company-template", {model: banhji.userManagement});
			$('#createComMessage').text("");
			// banhji.view.layout.showIn('#menu', banhji.view.menu);
			banhji.userManagement.inst.query({
				filter: {field: 'id', operator: '', value: banhji.userManagement.getLogin().institute[0].id},
				pageSize: 1,
				page: 1
			}).then(function(e){
				var data = banhji.userManagement.inst.data()[0];
				banhji.userManagement.setInstitute(data);
			});
			banhji.view.layout.showIn('#content', view);
					
		});
		banhji.router.route('companyLogo', function(){
			var view = new kendo.View("#page-admin-comany-logo-template", {model: banhji.userManagement});
			$('#createComMessage').text("");
			// banhji.view.layout.showIn('#menu', banhji.view.menu);
			banhji.userManagement.inst.query({
				filter: {field: 'id', operator: '', value: banhji.userManagement.getLogin().institute[0].id},
				pageSize: 1,
				page: 1
			}).then(function(e){
				var data = banhji.userManagement.inst.data()[0];
				banhji.userManagement.setInstitute(data);
			});
			banhji.view.layout.showIn('#content', view);
					
		});

		banhji.router.route('user', function(){
			banhji.view.layout.showIn('#content', banhji.view.userLayout);
			banhji.view.userLayout.showIn("#container", banhji.view.userDash);
		});

		banhji.router.route('employees', function(){
			banhji.view.layout.showIn('#content', banhji.view.empLayout);
			banhji.view.empLayout.showIn("#container", banhji.view.empDash);
		});

		banhji.router.route('password', function(){
			banhji.view.layout.showIn('#content', banhji.view.passwordView);
			banhji.userManagement.pwdDS.add({
				username: banhji.userManagement.getLogin().username,
				password: banhji.userManagement.get('password')
			});		
		});

		banhji.router.route('module', function(){
			banhji.view.layout.showIn('#content', banhji.view.modulePage);
			// banhji.module.modules.query({
			// 	page: 1,
			// 	pageSize: 1
			// });
			banhji.adminDash.moduleVM.checkModule();
		});

		$(function() {	
			banhji.router.start();
			if(banhji.userManagement.getLogin() !== null){
				$("#my-account").html(banhji.userManagement.getLogin().username+'<span class="caret"></span>');
			} else {
				window.location.assign("<?php echo base_url(); ?>home");
			}
		});
	</script>
</body>
</html>

