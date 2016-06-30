<div id="wrapperApplication" class="container-fluid"></div>
<!-- template section starts -->
<script type="text/x-kendo-template" id="layout">
	<div id="menu"></div>			
	<div id="content" class="row-fluid"></div>
</script>
<script type="text/x-kendo-template" id="blank-tmpl">
</script>
<script type="text/x-kendo-template" id="menu-tmpl">
	<div class="menu-hidden sidebar-hidden-phone menu-left hidden-print">
		<div class="navbar main" id="main-menu">
			<ul class="topnav">
				<li class="dropdown dd-1 span3">
					<a href="\#" class="dropdown-toggle brand" data-toggle="dropdown" id="brand-menu">BanhJi <span id="current-section"></span></a>
					<ul class="dropdown-menu" id="dropdownMenu">
						<li id="home-menu"><a href="#">គេហទំព័រ</a></li>
						<li id="customer-menu"><a href="#/customers">អតិថិជន</a></li>
						<li id="vendor-menu"><a href="#/vendors">អ្នកផ្គត់ផ្គង់</a></li>
						<li id="account-menu"><a href="#/accounting_dashboard">គណនេយ្យ</a></li>
						<li id="water-menu"><a href="#/cashier/dashboard">បេឡាករ</a></li>
						<li id="electricity-menu"><a href="#/electricity">អគ្គីសនី</a></li>
						<li id="water-menu"><a href="#/water">ទឹកស្អាត</a></li>
		        	</ul>
		        </li>
			</ul>
			<ul class="topnav" id="secondary-menu">
			</ul>
			<ul class="topnav pull-right">
				<li>
					<a data-bind="attr: {href: page}"><span data-bind="text: getLogin().username"></span></a>
				</li>
				<li><a href="#/manage" data-bind="click: logout"><i class="icon-power-off"></i></a></li>
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
			<div class="span4 offset4">
				<div class="widget"​ style="overflow: hidden">
					<div class="widget-head">
						<span class="btn btn-primary pull-right" data-bind="click: close">X</span>
						<h3 style="text-align: center">ពតមានក្រុមហ៊ុន</h3>
					</div>
					<div class="widget-body">
						<label for="name">Name</label>
						<input type="text" data-bind="value: newInst.name" />
						<label for="name">Email</label>
						<input type="text" data-bind="value: newInst.email" />
						<label for="name">VAT Number</label>
						<input type="text" data-bind="value: newInst.vat_no" />
						<label for="name">Fiscal Date</label>
						<input type="text" data-bind="value: newInst.fiscal_date" />
						<label for="name">Tax Regime</label>
						<input type="text" data-role="dropdownlist" 
							   data-bind="source: taxRegimes, value: newInst.tax_regime"
							   data-text-field="type"
							   data-value-field="code"
							   data-option-label="---រើសមួយ---" />
						<label for="name">Legal Name</label>
						<input type="text" data-bind="value: newInst.legal_name" />
						<label for="name">Date Founded</label>
						<input type="text" data-role="datepicker" data-bind="value: newInst.date_founded" />
						<label for="name">address</label>
						<input type="text" data-bind="value: newInst.address" />
						<label for="name">រូបិយប័ណ្ដ</label>
						<input type="text" data-role="dropdownlist" 
							   data-bind="source: currency, value: newInst.locale" 
							   data-option-label="---រើសមួយ---"
							   data-value-field="locale" 
							   data-text-field="code" />
						<label for="name">description</label>
						<textarea data-bind="value: newInst.description" cols="30" rows="10"></textarea>
						<label for="name">Country</label>
						<input type="text" data-role="dropdownlist" 
							   data-bind="source: countries, value: newInst.country" 
							   data-text-field="name" 
							   data-value-field="id"
							   data-option-label="---"
							   style="width: 220px;" />
						<label for="name">Province</label>
						<input type="text" data-role="dropdownlist" 
						       data-bind="source: provinces, value: newInst.province" 
						       data-text-field="local" 
						       data-value-field="id"
						       data-option-label="---"
						       style="width: 220px;" />
						<label for="name">Industry</label>
						<input type="text" data-role="dropdownlist" 
							   data-bind="source: industry, value: newInst.industry" 
							   data-text-field="name" 
							   data-value-field="id"
							   data-option-label="---"
							   style="width: 220px;" />
						<label for="name">Type</label>
						<input type="text" data-role="dropdownlist" 
							   data-bind="source: types, value: newInst.type" 
							   data-text-field="name" 
							   data-value-field="id"
							   data-option-label="---"
							   style="width: 220px;" /><br/>
						<button class="btn btn-primary" data-bind="click: saveIntitute">Submit</button>
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
			<li><a href="#/page/companyInfo">ពតមានក្រុមហ៊ុន</a></li>
			<li><a href="#/page/companyLogo">ប្តូរូបសញ្ញាក្រុមហ៊ុន</a></li>
			<li><a href="#/page/userlist">បញ្ជីអ្នកប្រើ</a></li>
			<li><a href="#/page/employee">បុគ្កលិក</a></li>
			<li><a href="#/page/password">ប្តូលេខសំងាត់</a></li>
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
<script type="text/x-kendo-template" id="page-admin-comany-logo-template">
	<div class="container-960">
		<div class="row">
			<div class="span4 offset4">
				<div class="widget"​ style="overflow: hidden">
					<div class="widget-head">
						<span class="btn btn-primary pull-right" data-bind="click: close">X</span>
						<h3 style="text-align: center; font-size: 14px;"​>ស្លាកក្រុមហ៊ុន</h3>
					</div>
					<div class="widget-body">
						<input type="file" data-role="upload" name="userFile"
							   data-async="{saveUrl:'http://rith.local/banhji/api/banhji/logo', saveField:'userFile'}"
							   data-bind="events: {success:onSuccessUpload}"
							   data-localization="{select: 'រើសរូប', dropFilesHere: 'ទំលាក់រូបត្រង់នេះ'}" />
						<div id="createComMessage"></div>
					</div>
				</div>
			</div>			
		</div>
	</div>
</script>
<script type="text/x-kendo-template" id="index">
	<div class="row">
		<div class="span6">
			<div class="row">
				<div class="span12" style="padding-left: 0; margin-left: 0; margin-top: 0;">
					<ul id="module-image">
						<li style="text-align:center;">
							<a href="#/customers">
								<img src="<?php echo base_url(); ?>resources/img/Customer.png" alt="Customer">
							</a>
							<span style="margin-top: 5px; font-size: 14px; font-weight: bold; color: #000000">Customer</span>
						</li>
						<li style="text-align:center;">
							<a href="#/vendors">
								<img src="<?php echo base_url(); ?>resources/img/supplier.png" alt="Vendor">
							</a>
							<span style="margin-top: 5px; font-size: 14px; font-weight: bold; color: #000000">Supplier</span>
						</li>
						<li style="text-align:center;">
							<a href="#/accounting_dashboard">
								<img src="<?php echo base_url(); ?>resources/img/Accounting.png" alt="Accounting">
							</a>
							<span style="margin-top: 5px; font-size: 14px; font-weight: bold; color: #000000">Accounting</span>
						</li>
						<li style="text-align:center;">
							<a href="#/item_center">
								<img src="<?php echo base_url(); ?>resources/img/Inventory.png" alt="Inventory">
							</a>
							<span style="margin-top: 5px; font-size: 14px; font-weight: bold; color: #000000">Inventory</span>
						</li>
						<li style="text-align:center;">
							<a href="<?php echo base_url(); ?>app#reports">
								<img src="<?php echo base_url(); ?>resources/img/reports.png" alt="Report">
							</a>
							<span style="margin-top: 5px; font-size: 14px; font-weight: bold; color: #000000">Report</span>
						</li>
						<li style="text-align:center;">
							<a href="#/water">
								<img src="<?php echo base_url(); ?>resources/img/tax.png" alt="Water">
							</a>
							<span style="margin-top: 5px; font-size: 14px; font-weight: bold; color: #000000">TAX</span>
						</li>
						<li style="text-align:center;">
							<a href="<?php echo base_url(); ?>app#setting">
								<img src="<?php echo base_url(); ?>resources/img/setting.png" alt="Settings">
							</a>
							<span style="margin-top: 5px; font-size: 14px; font-weight: bold; color: #000000">Settings</span>
						</li>
						<li style="text-align:center;">
							<a href="#/cashier/dashboard">
								<img src="<?php echo base_url(); ?>resources/img/cashier.png" alt="Cashier">
							</a>
							<span style="margin-top: 5px; font-size: 14px; font-weight: bold; color: #000000">Cashier</span>
						</li>
					</ul>
				</div>
				<div class="span12" style="padding-left: 0; margin-left: 0; margin-top: 30px;">
					<h4 style="margin-left: 35px; width: 450px;">Industry Modules</h4>
					<ul id="module-image">
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
							<a href="#/water">
								<img src="<?php echo base_url(); ?>resources/img/pos.png" alt="Smart POS">
							</a>
							<span style="margin-top: 5px; font-size: 14px; font-weight: bold; color: #000000">Smart POS</span>
						</li>
						<li style="text-align:center;">
							<a href="#/water">
								<img src="<?php echo base_url(); ?>resources/img/ngo.png" alt="Water">
							</a>
							<span style="margin-top: 5px; font-size: 14px; font-weight: bold; color: #000000">NGO</span>
						</li>
					</ul>
				</div>
			</div>	
		</div>
		<div class="span6">
			<div class="row">
				<div class="span8">
					<h2 data-bind="text: companyInf().institute[0].legal_name"></h2>
					<span id="today-date" data-bind="text: curDate"></span><br/>
					VAT: <span data-bind="text: companyInf().institute[0].vat_number"></span>
				</div>
				<div class="span3">
					<img data-bind="attr: {src: companyInf().institute[0].logo}" alt="" />
				</div>
				<div class="span12"><hr/></div>
				
				</div>
				<div class="span11">
					<div style="height: 300px;" id="index-income-graph"></div>
				</div>
				
				<div class="span12">
					<div class="row">
						<div class="padding-bottom-none-phone span6">
							<a href="" class="widget-stats widget-stats-primary widget-stats-4">
								<span class="txt">Cash Balance</span>
								<span class="count" style="font-size: 25px;" data-bind="text: cashBal"></span>
								<div class="clearfix"></div>
								<i class="icon-play-circle"></i>
							</a>
						</div>
						<div class="padding-bottom-none-phone span6">
							<a href="" class="widget-stats widget-stats-primary widget-stats-4">
								<span class="txt">Total Expenses</span>
								<span class="count" style="font-size: 40px;" data-bind="text: expense"></span>
								<div class="clearfix"></div>
								<i class="icon-play-circle"></i>
							</a>
						</div>
					</div>						
				</div>
				<div class="span12" style="margin-left: 0; padding-left: 0">
					<div style="margin-top: 10px; margin-left: 0;">
						<img src="<?php echo base_url(); ?>/uploads/logo/PCG-logo.png" alt="" align="left" style="margin-right: 10px;" />
						<p> To ensure its agility and usefulness of SMEs, the design and process flow of this applicaiton is advised by the financial consulting firm, PCG & Partners Co., Ltd </p>
						<p></p><br/>
						<p>© 2016 BanhJi Co., Ltd. All rights reserved. BanhJi is the registered trademarks of BanhJi Co., Ltd. Terms and conditions, features, support, pricing, and service options subject to change without notice.</p>
					</div>	
				</div>
			</div>
		</div>
	</div>		
</script>
<script type="text/x-kendo-template" id="top-customer-template">
	<tr>
		<td>#=surname# #=name#</td>
	</tr>
</script>
<script type="text/x-kendo-template" id="login-tmpl">
	<div class="container-960">
		<div class="row">
			<div class="span3 offset4">
				<label for="email">អីម៉ែល</label>
				<input type="email" placeholder="email" data-bind="value:email, events: {change: validateEmail}">
				<label for="password">លេខសំងាត់</label>
				<input type="password" placeholder="password" data-bind="value:password, events: {change: validatePWD}">
				<button class="btn btn-primary" data-bind="click:login">ចាក់ចូល</button>
				<button class="btn" data-bind="click:register">ចុះឈ្មោះ</button><br/>
				<div id="dialog" style="invisibility: hidden; padding-top: 20px; color: red">សូមពិនិត្យអីម៉េល​ រឺ លេខសំងាត់។</div>
			</div>
		</div>
	</div>
</script>
<script type="text/x-kendo-template" id="my-tmpl">
	<div class="container">
		<div class="row">
			<div class="span2">
				<ul class="nav nav-tabs nav-stacked">
				  	<li><a href="#/my">My Detail</a></li>
				  	<li><a href="#/my/changePWD">Change Password</a></li>
				  	<li><a href="#/my/addEmail">Add Email</a></li>
				  	<li><a href="#/my/addPhone">Add Phone</a></li>
				</ul>
			</div>
			<div class="span10" id="myContainer">kfjsdklfjsdklf</div>
		</div>
	</div>
</script>
<script type="text/x-kendo-template" id="my-detail-tmpl"></script>
<script type="text/x-kendo-template" id="my-password-tmpl"></script>
<script type="text/x-kendo-template" id="my-email-tmpl"></script>
<script type="text/x-kendo-template" id="my-phone-tmpl"></script>
<script type="text/x-kendo-template" id="my-edit-picture-tmpl"></script>
<script type="text/x-kendo-template" id="admin-tmpl">
	<div class="container">
		<div class="row">
			<div class="span12" id="myContainer"></div>
		</div>
	</div>
</script>
<script type="text/x-kendo-template" id="admin-userList-tmpl">
	<table class="table">
		<thead>
			<tr>
				<td>
					ឈ្មោះប្រើ
				</td>
				<td>នៅប្រើ</td>
				<td>ថ្ងៃបង្ើត</td>
				<td>ថ្ងៃកែ</td>
				<td><button>ថ្មី</button></td>
			</tr>
		</thead>
		<tbody data-role="listview" data-bind="source: dataStore" data-template="userList-tmpl"></tbody>
	</table>
	<div data-role="pager" data-bind="source: dataStore"></div>
</script>
<script type="text/x-kendo-template" id="admin-structure-tmpl">
	<div class="widget">
		<div class="widget-head">
			<span class="btn btn-primary pull-right" data-bind="click: close">X</span>
			<h4 class="heading glyphicons circle_info"><i></i> <a id="title">បញ្ជីចំណាត់ថ្នាក់</a> </h4>
		</div>
		<div class="widget-body">
			<div class="well">
				<a href="#/structure/new" class="btn btn-primary"> <i class="icon-plus"></i> បង្កើតថ្មី</a>
				<table class="table table-white">
					<thead>
						<tr style="background-color: #14385C; color: #ffffff">
							<td>ព៌ណនា</td>
							<td>ថ្ងៃបង្ើត</td>
							<td>ថ្ងៃកែ</td>
							<td>កំពុងប្រើ</td>
							<td></td>
						</tr>
					</thead>
					<tbody data-role="listview" 
						   data-bind="source: dataStore" 
						   data-template="admin-structure-list-tmpl" 
						   data-selectable='true'></tbody>
				</table>
			</div>				
			<div data-role="pager" data-bind="source: dataStore" data-page-size='true' data-refresh='true'></div>
		</div>			
	</div>
</script>
<script type="text/x-kendo-template" id="admin-structure-list-tmpl">
	<tr>
		<td>#=name#</td>
		<td>#=created_at#</td>
		<td>#=updated_at#</td>
		<td><input type="checkbox"  data-bind="checked: active" /></td>
		<td>
			<a href="\#/structure/#=id#">កែ</a>&nbsp;|&nbsp;
			<a href="\#/structure/#=id#/segments">ថ្នាក់រង</a>&nbsp;|&nbsp;
			<a href="\#/structure/new">ថ្មី</a>
		</td>
	</tr>
</script>
<script type="text/x-kendo-template" id="admin-structure-new-tmpl">
	<div class="container-960">
		<div class="row">
			<div class="span4 offset4">
				<div class="widget">
					<div class="widget-head">
						<button class="btn btn-primary pull-right" data-bind="click: close">X</button>
						<span style="padding-left: 15px; font-size: bold;">ចំណាត់ថ្នាក់ថ្មី</span>
					</div>
					<div class="widget-body">
					 	<label for="description">ពតមានលំអិត</label>
					 	<input type="text" data-bind="value: current.name" /><br/>
					 	<input type="checkbox" data-bind="checked: current.active" /> កំពុងប្រើ
					 	<button data-bind="click: save" class="btn btn-warning pull-right">រក្សាទុក</button><br>
					</div>
				</div>
			</div>
		</div>
	</div>			
</script>
<script type="text/x-kendo-template" id="admin-structure-segment-list-tmpl">
	<tr>
		<td><button class="btn" data-bind="click: segSelected">រើសមួយ</button></td>
		<td>#=code_length#</td>
		<td>#=name#</td>
	</tr>
</script>
<script type="text/x-kendo-template" id="admin-structure-single-tmpl">
	<div class="container-960">
		<div class="row">
			<div class="span4 offset4">
				<div class="widget">
					<div class="widget-head">
						<button class="btn btn-primary pull-right" data-bind="click: close">X</button>
						<span style="padding-left: 15px; font-size: bold;">ចំណាត់ថ្នាក់ថ្មី</span>
					</div>
					<div class="widget-body">
					 	<label for="description">ពតមានលំអិត</label>
					 	<input type="text" data-bind="value: current.name" /><br/>
					 	<input type="checkbox" data-bind="checked: current.active" /> កំពុងប្រើ
					 	<button data-bind="click: save" class="btn btn-warning pull-right">រក្សាទុក</button><br>
					</div>
				</div>
			</div>
		</div>
	</div>	
</script>
<script type="text/x-kendo-template" id="admin-segment-items-tmpl">
	<div class="container-960">
		<div class="row">
			<div class="span6 offset3">
				<div class="widget">
					<div class="widget-head">
						<button class="btn btn-primary pull-right" data-bind="click: closedX">X</button>
						<span style="padding-left: 15px; font-size: bold;">ចំណាត់ថ្នាក់ថ្មី</span>
					</div>
					<div class="widget-body">
						<div id="segment-list-container"></div>
					</div>
				</div>
			</div>
		</div>
	</div>	
</script>
<script type="text/x-kendo-template" id="admin-segment-items-list-conatiner-tmpl">
	<input style="margin-left: 255px;" type="text" data-role="dropdownlist" 
	 				   data-bind="source: segmentDS, value: segment.id, events: {change: sort}" 
	 				   data-value-field="id" 
	 				   data-text-field="name" />
	 				   <button data-bind="click: add"><i class="icon-plus-sign"></i></button>
	<div data-role="grid" 
		 data-bind="source: ds"
		 data-columns="[{title: 'កូដ'}, {title: 'ឈ្មោះ'}, {title: '&nbsp;' }]"
	 	 data-row-template="admin-segment-items-list-tmpl">
	</div>
</script>
<script type="text/x-kendo-template" id="admin-segment-items-list-action-tmpl">
	<table class="table">
		<tr>
			<td>ចំណាត់ថ្នាក់</td>
			<td><input type="text" data-role="dropdownlist" 
	 				   data-bind="source: segmentDS, value: segment.id, events: {change: sort}, enabled: editable" 
	 				   data-value-field="id" 
	 				   data-text-field="name" /></td>
		</tr>
		<tr>
			<td>កូដ</td>
			<td><input type="text" data-bind="value: current.code" /></td>
		</tr>
		<tr>
			<td>ឈ្មោះ</td>
			<td><input type="text" data-bind="value: current.name" /></td>
		</tr>
		<tr>
			<td></td>
			<td><button class="btn" data-bind="click: save"><i class="icon-plus-sign"></i> រក្សាទុក</button>
			<button class="btn" data-bind="click: cancel"><i class="icon-remove-sign"></i> បោះបង់</button></td>
		</tr>
	</table>	
</script>
<script type="text/x-kendo-template" id="admin-segment-items-list-tmpl">
	<tr>
		<td>#=code#</td>
		<td>#=name#</td>
		<td>
			<button class="btn" data-bind="click: edit"><i class="icon-edit"></i></button>
			<button class="btn" data-bind="click: remove"><i class="icon-trash"></i></button>
		</td>
	</tr>
</script>
<script type="text/x-kendo-template" id="userList-tmpl">
	<tr>
		<td>#=username#</td>
		<td>#=status#</td>
		<td>#=created_at#</td>
		<td>#=updated_at#</td>
		<td>
			<a href="\#/userList/#=id#/edit">កែ</a>&nbsp;|&nbsp;
			<a href="\#/userList/#=id#/changePassword">កែលេខសំងាត់</a>&nbsp;|&nbsp;
			<a href="\#/userList/new">ថ្មី</a>
		</td>
	</tr>
</script>
<script type="text/x-kendo-template" id="userList-new-tmpl">
	<div>
		<label for="username">ឈ្មោះប្រើ</label>
	 	<input type="text" data-bind="value: current.username" /><br/>
	 	<label for="password">លេខសំងាត់</label>
	 	<input type="password" data-bind="value: current.password" /><br/>
	 	<input type="checkbox" data-bind="checked: current.status" />&nbsp;នៅប្រើ<br/>
	 	<button data-bind="click: save">រក្សាទុក</button><br>
	 </div>
</script>
<script type="text/x-kendo-template" id="userList-edit-tmpl">
	<div>
	 	<label for="username">ឈ្មោះប្រើ</label>
	 	<input type="text" data-bind="value: current.username" disabled/><br/>
	 	<input type="checkbox" data-bind="checked: current.status" />&nbsp;នៅប្រើ<br/>
	 	<button data-bind="click: save">រក្សាទុក</button><br>
	</div>
</script>
<script type="text/x-kendo-template" id="userList-password-tmpl">
	<div>
	 	<label for="password">លេខសំងាត់</label>
	 	<input type="password" data-bind="value: password" /><br/>
	 	<label for="confirmedPWD">បញ្ជាក់លេខសំងាត់</label>
	 	<input type="password" data-bind="value: confirmedPWD" /><br/>
	 	<button data-bind="click: savePassword">រក្សាទុក</button><br>
	 </div>
</script>
<script type="text/x-kendo-template" id="admin-companyList-tmpl">	
</script>
<script type="text/x-kendo-template" id="company">
	<div class="container-fluid mainContainer">
		<div class="row full-height">
			<div id="mySidebar" class="span2 main full-height">
				<ul class="nav nav-list">
					<li><a href="#company">ក្រុមហ៊ុន</a></li>
					<li><a href="#company/new">បង្កើតថ្មី</a></li>
					<li><a href="#company/assign">បញ្ចូលអ្នកប្រើ</a></li>
				</ul>
			</div>
			<div id="companyContent" class="span10"></div>
		</div>
	</div>
</script>
<script type="text/x-kendo-template" id="companyList">
	<table class="table table-striped">
		<tbody data-role="listview" data-bind="source: company.dataSource"
								  data-template="companyListItem">
		</tbody>
	</table>
</script>
<script type="text/x-kendo-template" id="companyListItem">
	<tr>
		<td>#=name#</td>
		<td>#=legalName#</td>
		<td>#=phone#</td>
		<td>#=mobile#</td>
		<td>#=email#</td>
		<td>#=address#</td>
		<td><a href="\#company/assign">បញ្ចូលអ្នកប្រើ</a></td>
	</tr>
</script>
<!-- new vendor section -->
<script type="text/x-kendo-template" id="vendor-menu-tmpl">
	<li>
		<a href='#/pocenter'>បញ្ជាទិញ</a>
	</li>
	<li>
		<a href='#/vendors/u/new'>បង្កើតអ្នកផ្គត់ផ្គង</a>
	</li>
	<li>
		<a href='#/payment/vendor'>បេឡាករទូទាត់</a>
	</li>
	<li>
		<a href='#/vendor_payment_report'>របាយការណ៍បេឡាទូទាត់</a>
	</li>
</script>
<script type="text/x-kendo-template" id="vendors-section-tmpl">
	<div class="widget widget-heading-simple widget-body-white widget-employees">				
		<div class="widget-body padding-none">	
			<div class="row-fluid row-merge">
				<div class="span3 listWrapper" style="height: 755px;">
					<div class="innerAll">
						<form autocomplete="off" class="form-inline">
							<div class="widget-search separator bottom">
								<button type="button" class="btn btn-default pull-right" id="search" data-bind="click: findVendor"><i class="icon-search"></i></button>
								<div class="overflow-hidden">
									<input type="search" data-bind="value: key" placeholder="ស្វែងរក" id="searchField">
								</div>
							</div>
						</form>
					</div>
					<span class="results" data-bind="text: dataSource.total"></span>
					<div class="table table-condensed" id="sidebar" style="width: 292px"
						 data-role="grid" data-bind="source: dataSource" 
						 data-row-template="vendor-list-tmpl"
						 data-columns="[{title: 'ឈ្មោះ'}]"
						 data-selectable=true
						 data-height="655"
						 data-pageable="true"
						 data-scrollable="{virtual: true}"></div>
				</div>
				<div class="span9 innerAll">
					<div id="vendorDashboard" class="row" style="margin-left: 5px;"></div>					
				</div>
			</div>	
		</div>
	</div>
</script>
<script type="text/x-kendo-template" id="vendors-section-dashboard-tmpl">
	<div class="row">
		<div class="span6">
			<div class="widget widget-4 widget-tabs-icons-only margin-bottom-none">

			    <!-- Widget Heading -->
			    <div class="widget-head">

			        <!-- Tabs -->
			        <ul class="pull-right">
			            <li>Filter by</li>
			            
			            <li class="glyphicons circle_info active"><span data-toggle="tab" data-target="#tab4-8"><i></i></span>
			            </li>	
			            <li class="glyphicons google_maps"><span data-toggle="tab" data-target="#tab5-8"><i></i></span>
			            </li>							            
			            <li class="glyphicons phone"><span data-toggle="tab" data-target="#tab6-8"><i></i></span>
			            </li>
			            <li class="glyphicons edit"><span data-bind="click: edit"><i></i></span>
			            </li>
			            <li class="glyphicons user_add"><a href="#/vendors/u/new"><i></i></a>
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
			            <!-- INFO Tab content -->
			            <div id="tab4-8" class="tab-pane box-generic active">
			            	<div class="row-fluid">
				            	<div class="span6">
									<div class="widget widget-heading-simple widget-body-gray margin-none">
										<div class="widget-head">
											<h4 class="heading glyphicons user"><i></i> <span data-bind="text: current.company"></span></h4>
										</div>
										<div class="widget-body">
											<ul class="unstyled icons margin-none">
												<li class="glyphicons group"><i></i> ប្រភេទ៖ <span data-bind="text: current.type.name"></span></li>
												<li class="glyphicons phone"><i></i> ទូរស័ព្ទ៖ <span data-bind="text: current.phone"></span></li>
												<li class="glyphicons envelope"><i></i> អុីម៉ែល៖ <span data-bind="text: current.email"></span></li>
												<li class="glyphicons calendar"><i></i> ចុះឈ្មោះ៖ <span data-bind="text: current.created_at">2012-04-13</span></li>
											</ul>
										</div>
									</div>
								</div>
								<div class="span6">
									<div class="widget widget-heading-simple widget-body-gray margin-none">
										<div class="widget-head">
											
										</div>
										<div class="widget-body">
											<p><i class="icon-home"></i> លេខពន្ធអាករ៖ <span data-bind="text: current.vat_no"></span></p>
											<p><i class="icon-dollar"></i> រូបិយប័ណ្ដ៖ <span data-bind="text: current.currency.code"></span></p>
											<p><i class="icon-money"></i> អាស័យដ្ឋាន៖ <span data-bind="text: current.address"></span></p>
										</div>
									</div>
								</div>
							</div>
			            </div>
			            <!-- // INFO Tab content END -->
			            <div id="tab5-8" class="tab-pane box-generic">							            	
						    <div id="map" style="height: 180px"></div>
			            </div>
			            <!-- NOTE Tab content -->
			            <div id="tab6-8" class="tab-pane box-generic">							            	
						    <div class="control-group">
						    	<div data-role="grid" data-bind="source: vendorPhones" data-auto-bind='false' data-columns="[{field: 'phone', title:'ទូរស័ព្ទ'}, {field: 'name', title:'ទូរស័ព្ទ'},{field: 'department', title:'ទូរស័ព្ទ'},{field: 'type', title:'ទូរស័ព្ទ'}]"></div>
							</div>
			            </div>
			            <!-- // NOTE Tab content END -->

			            <!-- INVOICE Tab content -->
			            <div id="tab8-8" class="tab-pane box-generic">
			            	<table class="table table-borderless table-condensed cart_total">
				            	<tbody>
				            	<tr>
				            		<td>
				            			<a href="#/vendors/u/po" class="btn btn-block btn-inverse">បញ្ជាទិញ</a>
				            		</td>
				            		<td>
				            			<a href="#/vendors/u/grn" class="btn btn-block btn-inverse">ទទួលទំនិញ</a>
				            		</td>
				            	</tr>
				            	<tr>
				            		<td>
				            			<a href="#/bills/purchase/new" class="btn btn-block btn-inverse">ទិញ</a>
				            		</td>
				            		<td>
				            			<a href="#/bills/expense/new" class="btn btn-block btn-inverse">ចំណាយ</a>
				            		</td>
				            	</tr>
			            	</tbody></table>
			            </div>
			            <!-- // INVOICE Tab content END -->								            

			        </div>
			    </div>
			</div>
		</div>
		<div class="span6 innerL">
			<div class="row">
				<div class="span6">
					<div class="widget-stats widget-stats-inverse widget-stats-5">
						<span class="glyphicons briefcase"><i></i></span>
						<span class="txt" style="font-size: 10pt">បញ្ជាទិញ<span data-bind="text: poNum" ></span></span>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="span6">
					<div class="widget-stats widget-stats-primary widget-stats-5" data-bind="click: doNothing">
						<span class="glyphicons coins"><i></i></span>
						<span class="txt" style="font-size: 10pt">ចំណាយប្រចាំខែ<span style="font-size: 17px;" data-bind="text: monthlyExpense"></span></span>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="span6">
					<div class="widget-stats widget-stats-info widget-stats-5">
						<span class="glyphicons notes"><i></i></span>
						<span class="txt" style="font-size: 10pt"><span data-bind="text: invNum" ></span>មិនទាន់ទូទាត់</span>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="span6">
					<div class="widget-stats widget-stats-default widget-stats-5">
						<span class="glyphicons circle_exclamation_mark"><i></i></span>
						<span class="txt" style="font-size: 10pt"><span data-bind="text: invONum" ></span>រហួសកំណត់</span>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>			
		</div>
	</div><br/>
	<div class="row">
		<div class="span12">
			<div style="text-align: center;">
				<input type="text" data-role="dropdownlist" data-bind="source: dateType, events: {change: dateTypeSelect}" data-index="1" class="dateSelect" />
				<input type="text" data-role="datepicker" data-bind="value: startDate, events: {change: dateChange}"/>
				<input type="text" data-role="datepicker" data-bind="value: endDate" />
				<span data-bind="click: filterBill" class="k-button" data-role="button"><i class="icon-search"></i></span>
			</div>
		</div><br/>
		<div class="well span12">
			<div data-role="grid" class='table table-white table-condensed' 
	    		     data-bind="source: billDS"
	    		     data-columns="[
	    		     	{title: '<i class=icon-th-list></i>', width: '30px'},
	    		     	{field: 'type', title: 'ប្រភេទ', width: '90px'},
	    		     	{field: 'invoice_number', title: 'យោង', width: '120px'},
	    		     	{field: 'amount', title: 'ចំនួន'},
	    		     	{field: 'paid', title: 'បានបង់'},
	    		     	{title: 'ផុតកំណត់', width: '100px'},
	    		     	{field: 'status', title: 'ស្ថានភាព', width: '100px'},
	    		     	{field: 'due_date', title: 'ថ្ងៃបង់', width: '90px'},
	    		     	{field: '&nbsp;', title: 'ធ្វើការ'}
	    		     ]"
	    		     data-height="370"
	    		     data-pageable="{
	    		     	numeric: false,
	    		     	messages: {
	    		     		display: 'បង្ហាញ {0}-{1} នៃ {2}',
	    		     		empty: 'មិនមានទិន្នន័យ'
	    		     	}
	    		     }"
	    		     data-selectable=true
	    		     data-no-records="true"
	    		     data-messages="{noRecords: 'មិនមានទិន្នន័យ'}"
	    		     data-row-template="vendor-single-bill-list-tmpl"
	    		     >
	    		</div>
		</div>
	</div>			
</script>
<script type="text/x-kendo-template" id="vendor-single-bill-list-tmpl">
	<tr>
		<td>
			# if(type === 'po') {#
				<a href="\#/vendors/u/po/#=id#"><i class="icon-th-list"></i></a>
			# } else {#
				<a href="\#/bills/#=type#/#=id#"><i class="icon-th-list"></i></a>
			# } #
		</td>
		<td>
			# if(type=== "po") {#
				បញ្ជាទិញ
			#} else if(type=== "purchase") {#
				<a href="\#/bills/#=type#/#=id#">ទិញ</a>
			# } else if(type=== "expense") {#
				<a href="\#/bills/#=type#/#=id#">ចំណាយ</a>
			# } else if(type=== "grn") {#
				<a href="\#/vendors/u/grn/#=id#">ទទួលទំនេញ</a>
			# } #
		</td>
		<td>
			#=invoice_number#
		</td>
		<td>#=kendo.toString(amount, 'c2')#</td>
		<td>#=kendo.toString(paid, 'c2')#</td>
		<td>
			# if(type=== "po") {#
				---
			#} else {#
				# var today = new Date(); #
				# var due = new Date(due_date); #

				#if(due.getTime() < today.getTime()) { #
					# var milliSecondPerDay = 86400 * 1000; #
					# due.setHours(0,0,0,1); #
					# today.setHours(23,59,59,999); #
					# var diff = today - due; #
					# var days= Math.ceil(diff/milliSecondPerDay); #
					# var week= Math.floor(days/7); #
					# days = days - (week * 2); #
					# startDay = due.getDay(); #
					# endDay = today.getDay(); #
					# if(startDay - endDay > 0) { #
						# days = days - 1; #
					#}#
					#if(startDay == 0 && endDay !=6){#
						# days = days - 1; #
					#}#
					#if(startDay == 6 && endDay !=0){#
						# days = days - 1; #
					#}#
					#if(days  === 1) {#
						0 ថ្ងៃ
					#} else {#
						#= days # ថ្ងៃ
					#}#
					
				#} else {#
					---
				# } #
			# } #
		</td>
		<td>
			# if(status === 'open') {#
				មិនទាន់ទទួល
			# } else if (status === 'partial'){#
				ទូទាត់បានខ្លះ
			# }else {#
				ទូទាត់រួច
			# } #
		</td>
		<td>#:kendo.toString(new Date(due_date), 'dd-MM-yyyy')#</td>
		<td></td>
	</tr>
</script>
<script type="text/x-kendo-template" id="vendor-list-tmpl">
	<tr><td>
		<div data-bind="click: selected">
			#if(company) {#
				<span>#=company#</span>
			#}#
		</div>
	</td></tr>
</script>
<script type="text/x-kendo-template" id="vendor-new-tmpl">
	<div class="container-960">
		<div class="row">
			<div class="span12">
				<div class="widget vendor-form">
				    <div class="widget-head">
				    	<span class="btn btn-primary pull-right" data-bind='click: close'>X</span>
				        <h4 class="heading">អ្នកផ្គត់ផ្គង</h4>
				    </div>
				    <div class="widget-body">
				        <table class="table">
				        	<tr>
				        		<td>ក្រុមហ៊ុន</td>
				        		<td>
				        			<input type="text" id="company" name="company" class="k-textbox" data-bind="value: current.company" required
				        				   validationMessage="ត្រូវការ" />
				        		</td>
				        		<td>ប្រភេទអ្នកផ្គត់ផ្គង</td>
				        		<td><input type="text" name="vendorType" style="width: 220px;" data-role="dropdownlist"
				        				   data-bind="source: contactTypes, value: current.type"
				        				   data-text-field="name"
				        				   data-value-field="id"
				        				   data-auto-bind=false
				        				   data-option-label="&nbsp;" required validationMessage="ត្រូវការ" /></td>
				        	</tr>
				        	<tr>
				        		<td>ជាភាសាឡាតាំង</td>
				        		<td><input type="text" class="k-textbox" data-bind="value: current.company_en" /></td>
				        		<td>គេហទំព័រ</td>
				        		<td><input type="text" class="k-textbox" data-bind="value: current.website" /></td>
				        	</tr>
				        	<tr>
				        		<td>លេខពន្ធ</td>
				        		<td><input type="text" class="k-textbox" data-bind="value: current.vat_no" /></td>
				        		<td>ទូរស័ព្ទ</td>
				        		<td><input type="tel"
				        				   data-role="maskedtextbox"
				        				   data-mask="(855) 000-000-0009"
				        				   data-bind="value: current.phone"
				        				   placeholder="(855) 000-000X" /></td>
				        	</tr>
				        	<tr>
				        		<td>អាស័យដ្ថាន</td>
				        		<td><input type="text" class="k-textbox" data-bind="value: current.address" /></td>
				        		<td>អ៉ីម៉ែល</td>
				        		<td><input type="email" class="k-textbox" data-bind="value: current.email" /></td>
				        	</tr>
				        	<tr>
				        		<td>ប្រភេទអាជិវកម្ម</td>
				        		<td><input type="text" style="width: 220px;" data-role="dropdownlist" 
				        				   data-bind="source: businessType, value: current.business_type"
				        				   data-text-field="type"
				        				   data-value-field="id"
				        				   data-option-label="&nbsp;" required validationMessage="ត្រូវការ" /></td>
				        		<td>អាជិវកម្មក្នុងស្រុក</td>
				        		<td><input type="checkbox" data-bind="checked: current.is_local" /> ម៉ែន</td>			        		
				        	</tr>
				        	<tr>
				        		<td>ជំើរសបង់ប្រាក់ទីមួយ</td>
				        		<td><input type="text" style="width: 220px;" data-role="dropdownlist"
				        				   data-bind="source: paymentOptions, value: current.payment_main, events: { change: selectPaymentOption }"
				        				   data-text-field="name"
				        				   data-value-field="id"
				        				   data-option-label="&nbsp;" /></td>
				        		<td>រូបិយប័ណ្ដ</td>
				        		<td><input type="text" style="width: 220px;" class="input"
				        				   data-bind="source: currencyDS.dataSource, value: current.currency"
				        				   data-role="dropdownlist"
				        				   data-text-field="code"
				        				   data-value-field="id" /></td>
				        	</tr>
				        	<tr>
				        		<td>ជំើរសបង់ប្រាក់ទីពីរ</td>
				        		<td><input type="text" style="width: 220px;" data-role="dropdownlist"
				        				   data-bind="source: paymentOptions, value: current.payment_second, events: { change: selectPaymentOption }"
				        				   data-text-field="name"
				        				   data-value-field="id"
				        				   data-option-label="&nbsp;" /></td>
				        		<td>លក្ខខណ្ឌទូទាត់</td>
				        		<td><input type="text" style="width: 220px;" data-role="dropdownlist" 
				        				   data-bind="source: paymentTerm, value: current.payment_term" 
				        				   data-text-field="name"
				        				   data-value-field="id"
				        				   data-option-label="&nbsp;" /></td>
				        	</tr>
				        	<tr>
				        		<td>គណនីអ្នកផ្គត់ផ្គង់</td>
				        		<td><input type="text" style="width: 220px;" data-role="dropdownlist" name="apaccount"
				        				   data-bind="source: apAccount, value: current.ap"
				        				   data-text-field="name"
				        				   data-value-field="id"
				        				   data-template="accountDropDownList"
				        				   data-option-label="&nbsp;" required validationMessage="ត្រូវការ" /></td>
				        		<td>គណនីចុះតំលៃ</td>
				        		<td><input type="text" style="width: 220px;" data-role="dropdownlist" name="discountaccount"
				        			 	   data-bind="source: discountAC, value: current.purchaseDiscount"
				        			 	   data-text-field="name"
				        				   data-value-field="id"
				        				   data-template="accountDropDownList"
				        				   data-option-label="&nbsp;" required validationMessage="ត្រូវការ" /></td>
				        	</tr>
				        	<tr>
				        		<td>គណនីបង់ប្រាក់មុន</td>
				        		<td><input type="text" style="width: 220px;" data-role="dropdownlist"  name="prepaidaccount"
				        				   data-bind="source: prepaidAC, value: current.prepaid"
				        				   data-text-field="name"
				        				   data-value-field="id"
				        				   data-template="accountDropDownList"
				        				   data-option-label="&nbsp;" required validationMessage="ត្រូវការ" /></td>
				        		<td>ឥណទានអនុញ្ញាត្ត</td>
				        		<td><input type="number" style="width: 220px;" data-role="numerictextbox" 
				        				   data-bind="value: current.credit_limit"
				        				   data-decimals="2"
				        				   data-min="0" /></td>
				        	</tr>
				        	<tr data-bind="visible: paidByBank">
				        		<td>ធនាគារ</td>
				        		<td>
			        				<input type="text" style="width: 220px;" class="input" 
			        					   data-role="dropdownlist" 
			        					   data-bind="source: bankModel.ds, value: current.bank"
			        					   data-value-field="id"
			        					   data-text-field="name" />
				        				
				        		</td>
				        		<td>លេខកុងធនាគារ</td>
				        		<td>
				        			<input type="text" data-bind="value: current.bank_account_number" />
				        		</td>
				        	</tr>
				        	<tr data-bind="visible: paidByBank">
				        		<td>ឈ្មោះកុងធនាគារ</td>
				        		<td><input type="text" class="k-textbox" data-bind="value: current.bank_account_name" /></td>
				        		<td>អាស័យដ្ថានធនាគារ</td>
				        		<td><input type="text" class="k-textbox" data-bind="value: current.bank_address" /></td>
				        	</tr>
				        	<tr data-bind="visible: paidByCheck">
				        		<td>ឈ្មោះលើសែក</td>
				        		<td><input type="text" class="k-textbox" data-bind="value: current.name_on_cheque" /></td>
				        		<td></td>
				        		<td></td>
				        	</tr>
				        	<tr>
				        		<td colspan="4">
				        			<table class="table table-condensed">
										<thead>
											<tr>
												<th width="30" class="center"><span data-bind="click: addPhone"><i class="icon-plus"></i></span></th>
												<th>ឈ្មោះ</th>
												<th>ផ្នែក</th>
												<th>លេខទូស័ព្ទ</th>
												<th>ប្រភេទ</th>
												<th></th>
											</tr>
										</thead>
										<tbody data-role="listview" 
													data-bind="source: vendorPhones" 
													data-template="vendor-phone-list-add-tmpl"
										></tbody>
									</table>
				        		</td>
				        	</tr>
				        </table>
				    </div>
				</div>
				<div style="text-align: right">
					<button class="btn btn-primary span3 pull-right" data-bind="click: saveClose">
						កត់ត្រាហើយបិទ
					</button>
					<button class="btn btn-default span3 pull-right" data-bind="click: save">
						កត់ត្រាហើយកត់ថែម</button>
					</button>					
					<button class="btn btn-warning span3 pull-right" data-bind="visible: isEdit, events: {click: remove}">
						លុប
					</button>
				</div>
				<div data-role="notification" id="notification" 
					 data-width="250px" 
					 data-position="{top: 25, right: 10}"></div>
			</div>
		</div>
	</div>
</script>
<script type="text/x-kendo-template" id="vendor-phone-list-add-tmpl">
	<tr>
		<td></td>
		<td><input type="text" data-bind="value: name"/></td>
		<td><input type="text" data-role="dropdownlist" 
							   data-bind="source: departments, value: department" 
							   data-text-field="description" 
							   data-value-field="department" /></td>
		<td><input type="text" data-role="maskedtextbox" data-mask="(000) 000-000-0009" data-bind="value: phone"/></td>
		<td><input type="text" data-role="dropdownlist" 
							   data-bind="source: phoneTypes, value: type" 
							   data-text-field="description" 
							   data-value-field="type" /></td>
		<td><span class="glyphicons no-js delete" data-bind="click: removePhone"><i></i></span></td>
	</tr>
</script>
<script type="text/x-kendo-template" id="accountDropDownList">
	<span>#=code#&nbsp;#=name#</span>
</script>
<!-- end new vendor section -->
<script type="text/x-kendo-template" id="vendors-purchase-form-header-tmpl">
	<div id="bill-header" class="container-960">
		<div class="widget" style="overflow: hidden">
			<button class="btn btn-primary pull-right" style="margin-right: 60px;" data-bind="click: close">X</button>
			<div class="widget-head">	
				<h4 class="heading glyphicons notes"><i></i> ទទួលវិក្កយប័ត្រទិញ</h4>
			</div>
			<div class="widget-body">
				<table class="table bill-form">
					<tbody>
						<tr>
								<td width="200">ចាយជាសាច់ប្រាក់</td>
								<td><input type="checkbox" data-bind="checked: form.current.paidCash, events: {change: form.getAccount}" /></td>
								<td width="200">គណនី</td>
								<td><input type="text" style="width: 220px;"
									data-role="combobox"
									data-bind="source: form.account, value: form.current.account"
									data-text-field="name"
									data-value-field="id"
									data-option-label="រើសយកមួយ" /></td>
						</tr>
						<tr>
							<td>អ្នកផ្គត់ផ្គង</td>
							<td>
								<div class="input-append">
								<input class="span11" type="text" data-bind="value: form.current.vendor.company" required/>
								<button class="btn" data-bind="click: form.getVendor"><i class="icon-search"></i></button>
							</td>
							<td>លេខលិខិតបញ្ជាទិញ</td>
							<td><input id="purchase_po" type="text" style="width: 220px;" /></td>
						</tr>
						<tr>
							<td>លេខសក្ខីបត្រ័</td>
							<td><input type="text" data-bind="value: form.current.voucher" /></td>
							<td>វិក្កយប័ត្រ</td>
							<td><input type="text" data-bind="value: form.current.invoice_number" /></td>
						</tr>
						<tr>
							<td>ពិពណ៏នា</td>
							<td><input type="text" data-bind="value: form.current.comment" /></td>
							<td>វិធីទូទាត់</td>
							<td><input type="text" style="width: 220px;" data-role="dropdownlist"
									   data-bind="source: pmtMethod, value: form.current.payment_term"
									   data-text-field="name"
									   data-value-field="id" /></td>
						</tr>
						<tr>
							<td>ថ្នាក់</td>
							<td><select data-role="multiselect" 
												   data-bind="source: form.classDS, value: form.current.segment, events: {change: changeValue}" 
												   data-value-field="id" 
												   data-text-field="name"
												   data-placeholder="select"
												   style="width: 220px" /></select></td>
							<td>កាលបរិច្ឆេទ</td>
							<td><input type="text" data-role="datepicker" data-bind="value: form.current.due_date" style="width: 220px;" /></td>
						</tr>
					</tbody>
				</table>
				<table class="table table-condensed">
					<thead style="background-color: darkblue; color: #fff; font-weight: bold">
						<tr>
							<td><i class="icon-plus" data-bind="click: addItem"></i></td>
							<td>ល.រ</td>
							<td>ទំនិញ</td>
							<td>ពិពណ៏នា</td>
							<td>ចំនួន</td>
							<td>តំលៃ</td>
							<td>ទឹកប្រាក់</td>
							<td>ពន្ធអាករ</td>
						</tr>
					</thead>
					<tbody data-role="listview" data-bind="source: itemDS" data-template="vendors-bill-form-purchase-list-tmpl" data-auto-bind=false></tbody>
				</table>
				<button class="btn btn-inverse" data-bind="click: addItem"><i class="icon-plus icon-white"></i></button><br/>
				<div class="pull-left span3">
					<textarea name="" id="notice" data-bind="value: form.current.notice" cols="60" rows="5"></textarea>
				</div>
				<div class="pull-left span3">
					<textarea name="" id="internal-notice" data-bind="value: form.current.internal_notice" cols="60" rows="5"></textarea>
				</div>
				<div class="pull-right span4">
					<table style="width: 100%;">
						<tr style="background-color: #000">
							<td colspan="2"></td>
						</tr>
						<tr>
							<td style="text-align: right; width: 100px;">សរុបរង</td>
							<td><input  style="text-align: right;" type='text' data-role="numerictextbox" data-bind="value: form.current.amount" data-format="c2" disabled></td>
						</tr>
						<tr>
							<td style="text-align: right; width: 100px;">ពន្ធ</td>
							<td style="text-align: right;"><span data-bind="text: form.current.taxAmount"></span></td>
						</tr>
						<tr>
							<td style="text-align: right; width: 100px;">សរុបរួម</td>
							<td style="text-align: right;"><span data-bind="text: form.grandTotal"></span></td>
						</tr>
						<tr>
							<td colspan="2"></td>
						</tr>
					</table>
				</div>
				<div class="notification" data-role="notification" 
							 data-width="250px" 
							 data-position="{top: 25, right: 10}"></div>
				<div class="span12" style="text-align: center; padding-bottom: 10px;">
					<span class="btn btn-icon btn-primary glyphicons circle_ok"  data-bind="click: save"><i></i>កត់ត្រា</span>
					<span class="btn btn-icon btn-default glyphicons ban" data-bind="click: close">បោះបង់</span>
				</div>
			</div>
		</div>
	</div>
</script>
<script type="text/x-kendo-template" id="vendors-bill-form-purchase-list-tmpl">
	<tr>
		<td><i class="icon-trash" data-bind="click: removeItem"></i></td>
		<td><span data-bind="text: number"></span></td>
		<td><input style="width: 150px" type="text" 
				   data-role="dropdownlist" 
				   data-bind="source: itemArrayList, value: item" 
				   data-text-field="name" 
				   data-value-field="id"
				   data-option-label="រើសមួយ" /></td>
		<td><input style="width: 100%" type="text" data-bind="value: item.description" /></td>
		<td><input data-role="numerictextbox" style="width: 140px;" type="text" data-bind="value: unit, events: {change: computeAmount}" /></td>
		<td><input data-role="numerictextbox" style="width: 140px;" type="text" data-bind="value: rate, events: {change: computeAmount}" /></td>
		<td><span data-bind="text: amount"></span></td>
		<td><input type="checkbox" data-bind="checked: isTaxed, events: {change: getTax}" /></td>
	</tr>
</script>
<script type="text/x-kendo-template" id="vendors-expense-form-header-tmpl">
	<div id="bill-header" class="container-960">
		<div class="widget" style="overflow: hidden">	
			<div class="widget-head">	
				<button class="btn btn-primary pull-right" data-bind="click: close">X</button>
				<h4 class="heading glyphicons notes"><i></i> ទទួលវិក្កយប័ត្រចំណាយ</h4>
			</div>
			<div class="widget-body">
				<table class="table bill-form">
					<tbody>
						<tr>
								<td width="200">ចាយជាសាច់ប្រាក់</td>
								<td><input type="checkbox" data-bind="checked: form.current.paidCash, events: {change: form.getAccount}" /></td>
								<td width="200">គណនី</td>
								<td><input type="text" style="width: 220px;"
									data-role="combobox"
									data-bind="source: form.account, value: form.current.account"
									data-text-field="name"
									data-value-field="id"
									data-option-label="រើសយកមួយ" />	
								</td>
						</tr>
						<tr>
							<td>អ្នកផ្គត់ផ្គង</td>
							<td>
								<div class="input-append">
								<input class="span11" type="text" data-bind="value: form.current.vendor.company" required/>
								<button class="btn" data-bind="click: form.getVendor"><i class="icon-search"></i></button>
							</td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>លេខសក្ខីបត្រ័</td>
							<td><input type="text" data-bind="value: form.current.voucher" /></td>
							<td>វិក្កយប័ត្រ</td>
							<td><input type="text" data-bind="value: form.current.invoice_number" /></td>
						</tr>
						<tr>
							<td>ពិពណ៏នា</td>
							<td><input type="text" data-bind="value: form.current.comment" /></td>
							<td>វិធីទូទាត់</td>
							<td><input type="text" style="width: 220px;" data-role="dropdownlist"
									   data-bind="source: pmtMethod, value: form.current.payment_term"
									   data-text-field="name"
									   data-value-field="id" /></td>
						</tr>
						<tr>
							<td>ថ្នាក់</td>
							<td><select data-role="multiselect" 
												   data-bind="source: form.classDS, value: form.current.segment, events: {change: changeValue}" 
												   data-value-field="id" 
												   data-text-field="name"
												   data-placeholder="select"
												   style="width: 220px" /></select></td>
							<td>កាលបរិច្ឆេទ</td>
							<td><input type="text" data-role="datepicker" data-bind="value: form.current.expected_date, events: {change: form.getDue}" style="width: 220px;" /></td>
						</tr>
					</tbody>
				</table>

				<table class="table table-condensed">
					<thead style="background-color: darkblue; color: #fff; font-weight: bold">
						<tr>
							<td><i class="icon-plus" data-bind="click: addItem"></i></td>
							<td>ល.រ</td>
							<td>គណនី</td>
							<td>ពិពណ៏នា</td>
							<td>ចំនួន</td>
							<td>តំលៃ</td>
							<td>ទឹកប្រាក់</td>
							<td>ពន្ធអាករ</td>
						</tr>
					</thead>
					<tbody data-role="listview" data-bind="source: itemDS" data-template="vendors-bill-form-expense-list-tmpl" data-auto-bind=false></tbody>
				</table>

				<button class="btn btn-inverse" data-bind="click: addItem"><i class="icon-plus icon-white"></i></button><br/>
				<div class="pull-left span3">
					<textarea name="" id="notice" data-bind="value: form.current.notice" cols="60" rows="5"></textarea>
				</div>
				<div class="pull-left span3">
					<textarea name="" id="internal-notice" data-bind="value: form.current.internal_notice" cols="60" rows="5"></textarea>
				</div>
				<div class="pull-right span4">
					<table style="width: 100%;">
						<tr style="background-color: #000">
							<td colspan="2"></td>
						</tr>
						<tr>
							<td style="text-align: right; width: 100px;">សរុបរង</td>
							<td><input style="text-align: right;" type='text' data-role="numerictextbox" data-bind="value: form.current.amount" data-format="c2" disabled></td>
						</tr>
						<tr>
							<td style="text-align: right; width: 100px;">ពន្ធ</td>
							<td style="text-align: right;"><span data-bind="text: form.current.taxAmount"></span></td>
						</tr>
						<tr>
							<td style="text-align: right; width: 100px;">សរុបរួម</td>
							<td style="text-align: right;"><span data-bind="text: form.grandTotal"></span></td>
						</tr>
					</table>
				</div>
				<div class="notification" data-role="notification" 
							 data-width="250px" 
							 data-position="{top: 25, right: 10}"></div>
				<div class="span12" style="text-align: center; padding-bottom: 10px;">
					<span class="btn btn-icon btn-primary glyphicons circle_ok"  data-bind="click: save"><i></i>កត់ត្រា</span>
					<span class="btn btn-icon btn-default glyphicons ban" data-bind="click: close">បោះបង់</span>
				</div>
			</div>
		</div>
	</div>
</script>
<script type="text/x-kendo-template" id="vendors-bill-form-expense-list-tmpl">
	<tr>
		<td><i class="icon-trash" data-bind="click: removeItem"></i></td>
		<td><span data-bind="text: number"></span></td>
		<td><input style="width: 100%" type="text" 
				   data-role="dropdownlist" 
				   data-bind="source: accountList, value: account" 
				   data-text-field="name" 
				   data-value-field="id"
				   data-option-label="រើសមួយ" /></td>
		<td><input style="width: 100%" type="text" data-bind="value: item.description" /></td>
		<td><input data-role="numerictextbox" style="width: 140px;" type="text" data-bind="value: unit, events: {change: computeAmount}" /></td>
		<td><input data-role="numerictextbox" style="width: 140px;" type="text" data-bind="value: rate, events: {change: computeAmount}" /></td>
		<td><span data-bind="text: amount"></span></td>
		<td><input type="checkbox" data-bind="checked: isTaxed, events: {change: form.getTax}" /></td>
	</tr>
</script>
<script type="text/x-kendo-template" id="accounts-list-tmpl">
	<div class="container-960">
		<div class="row">
			<div class="span3 offset4">
				<div class="widget">
					<div class="widget-head">
						<h4 class="heading">បញ្ជីអ្នកផ្គត់ផ្គង់</h4>
						<span class="pull-right" data-bind="click: billVM.close">X</span>
					</div>
					<div class="widget-body">
						<div class="input-append">
							<input type="text" class="input span10" data-bind="value: key" />
							<button class="btn" data-bind="click: search"><i class="icon-search"></i></button>
						</div>
						<div id="vendorListView"></div>
					</div>
				</div>				
			</div>
		</div>
	</div>
</script>
<script  type="text/x-kendo-template" id="bill-list-container-tmpl">
	<div>
		<div>
			<input type="text" data-role="dropdownlist" 
				   data-bind="source: dateList, events:{change: dateSort}" 
				   data-value-field="id" 
				   data-text-field="name"
				   data-option-label="រើសមួយ" />
			<input type="text" name="from" data-role="datepicker" data-bind="value: from" />
			<input type="text" name="to" data-role="datepicker" data-bind="value: to" />
			<button class="btn btn-primary" type="button" data-bind="click: searchBill"><i class="icon-search"></i></button>
		</div>
	</div>
	<div class="well">
		<table class="table table-condensed">
			<tbody>
				<tr>
					<td>គណនីសាច់ប្រាក់</td>
					<td><input type="text" data-role="dropdownlist" 
				       data-bind="source: accountVM.dataStore, value: cashAccount, events: {open: getCashAccount}" 
				       data-text-field="name" 
				       data-value-field="id" 
				       data-auto-bind=false /></td>
					<td>ពិពណ៏នា</td>
					<td><input type="text" data-bind="value: payment.memo"/></td>
				</tr>
			</tbody>
		</table>
	</div>
	
	<table class="table">
		<thead>
			<tr>
				<th></th>
				<th>វិក្កយប័ត្រ</th>
				<th>សាច់ប្រាក់ដើម</th>
				<th>ស្ថានភាព</th>
				<th>ថ្ងៃបង់</th>
				<th>ហួស</th>
				<th>ទឹកប្រាក់សល់</th>
				<th>បញ្ចុះដំលៃ</th>
				<th></th>
			</tr>
		</thead>
		<tbody data-role="listview" 
			   data-bind="source: paymentArr" 
			   data-auto-bind=false 
			   data-template="bill-list-item-tmpl"></tbody>
	</table>
	<button class="btn" id="payBillBtn" data-bind="click: payThoseBills">បង់ប្រាក់វិក្កយបត្រទាំងនេះ</button>
	<div data-role="notification" class="notification" 
					 data-width="330px" 
					 data-position="{bottom: 10, right: 10}"></div>
</script>
<script  type="text/x-kendo-template" id="bill-list-item-tmpl">
	<tr>
		<td><input type="checkbox" data-bind="checked: makePayment, events: {click: singleBillSelect}" /></td>
		<td><a href="\#/bills/#=reference.id#">#=reference.invoice_number#</a></td>
		<td>#=kendo.toString(reference.amount, 'c2')#</td>
		<td>
			# if(reference.status==='open') {#
				មិនទាន់ទូទាត់
			#} else if(reference.status === 'partial') {#
				ទូទាត់បានខ្លះ
			#} else {#
				ទូទាត់រួច
			#}#
		</td>
		<td>#=reference.due_date#</td>
		<td>
			# var today = new Date(); #
			# var due = new Date(reference.due_date); #

			#if(due.getTime() < today.getTime()) { #
				# var milliSecondPerDay = 86400 * 1000; #
				# due.setHours(0,0,0,1); #
				# today.setHours(23,59,59,999); #
				# var diff = today - due; #
				# var days= Math.ceil(diff/milliSecondPerDay); #
				# var week= Math.floor(days/7); #
				# days = days - (week * 2); #
				# startDay = due.getDay(); #
				# endDay = today.getDay(); #
				# if(startDay - endDay > 0) { #
					# days = days - 1; #
				#}#
				#if(startDay == 0 && endDay !=6){#
					# days = days - 1; #
				#}#
				#if(startDay == 6 && endDay !=0){#
					# days = days - 1; #
				#}#
				#if(days  === 1) {#
					0 ថ្ងៃ
				#} else {#
					#= days # ថ្ងៃ
				#}#
				
			#} else {#
				---
			# } #
		</td>
		<td><input type="text" data-role="numerictextbox" data-bind="value: amount, events: {change: payCommute}" style="width:1500xp;" /></td>
		<td><input type="text" data-role="numerictextbox" data-bind="value: discount" style="width:1500xp;" /></td>
		<td>
			<i class="icon-tasks" data-bind="click: getDetail"></i>
		</td>
	</tr>
</script>
<script type="text/x-kendo-template" id="payment-tmpl">
	<button data-bind="click: close" class="pull-right">X</button>
	<h2>ទូទាត់វិក្កយប័ត្រ</h2>
	<table class="table">
		<tbody>
			<tr>
				<th>គណនីសាច់ប្រាក់:</th>
				<th></th>
				<th>លេខសែក:</th>
				<th></th>
			</tr>
			<tr>
				<th>កាលបរិច្ឆេទទូទាត់:</th>
				<th></th>
				<th>លេខសក្ខីបត្រ័:</th>
				<th></th>
			</tr>
			<tr>
				<th>ថ្នាក់:</th>
				<th></th>
				<th>ពិពណ៍នារួម:</th>
				<th></th>
			</tr>
		</tbody>
	</table>
	<table class="table">
		<thead>
			<tr>
				<th>លេខវិក្កយប័ត្រ</th>
				<th>ទឹកប្រាក់</th>
				<th>បញ្ចុះដំលៃ</th>
				<th>ពិន័យ</th>
				<th>អាត្រាប្រាក់</th>
			</tr>
		</thead>
		<tbody data-role="listview" data-bind="source: DS" data-template="payment-list-tmpl" data-auto-bind=false></tbody>
	</table>
	<button class="btn btn-primary pull-right" data-bind="click: save">រក្សាទុក</button>
</script>
<script type="text/x-kendo-template" id="payment-list-tmpl">
	#if(!id) {#
	<tr>
		<td>#=reference.id#</td>
		<td><input type="text" data-bind="value: amount" /></td>
		<td><input type="text" data-bind="value: discount" /></td>
		<td><input type="text" data-bind="value: fine" /></td>
		<td>#=rate#</td>
	</tr>
	#}#
</script>
<!-- Purchase Order Starts-->
<script type="text/x-kendo-template" id="purchase-order-tmpl">
	<div class="container-960">
		<div class="widget" style="overflow: hidden">
			<div class="widget-head">
				<button class="btn btn-primary pull-right" style="margin-right: 10px;" data-bind="click: close">X</button>
				<h4 class="heading glyphicons notes"><i></i> បញ្ជាទិញ</h4>
			</div>
			<div class="widget-body">
				<table class="table table-condensed bill-form">
					<tbody>
						<tr>
							<td>លេខលិខិតបញ្ជាទិញ (*)</td>
							<td><input type="text" data-bind="value: current.invoice_number" required /></td>
							<td>កាលបរិច្ឆេទ</td>
							<td><input type="text" data-role="datepicker" data-bind="value: current.due_date" /></td>
						</tr>
						<tr>
							<td>អ្នកផ្គត់ផ្គង (*)</td>
							<td>
								<div class="input-append">
								<input class="span11" type="text" data-bind="value: current.vendor.company" required/>
								<button class="btn" data-bind="click: getVendor"><i class="icon-search"></i></button>
							</td>
							<td>ថ្ងៃរំពឹងទុក</td>
							<td><input type="text" data-role="datepicker" data-bind="value: current.expected_date" /></td>
						</tr>
						<tr>
							<td>ថ្នាក់</td>
							<td><select data-role="multiselect" 
												   data-bind="source: classDS, value: current.segment, events: {change: changeValue}"
												   data-value-field="id" 
												   data-text-field="name"
												   data-placeholder="select"
												   style="width: 220px" /></select></td>
							<td>បញ្ជាលក់</td>
							<td><input type="text" disabled/></td>
						</tr>
						<tr>
							<td>អាស័យដ្ថាន</td>
							<td><textarea name="address" id="address" data-bind="value: current.address" cols="30" rows="2"></textarea></td>
							<td>អាស័យដ្ថានដឹកជញ្ជូន</td>
							<td><textarea data-bind="value: current.delivery_address" name="delivery_address" id="delivery_address" cols="30" rows="2"></textarea></td>
						</tr>
					</tbody>
				</table>
				<table class="table table-condensed">
					<thead style="background-color: darkblue; color: #fff; font-weight: bold">
						<tr>
							<td><i class="icon-plus" data-bind="click: addItem"></i></td>
							<td>ល.រ</td>
							<td>ទំនិញ</td>
							<td>ពិពណ៏នា</td>
							<td>ចំនួន</td>
							<td>តំលៃ</td>
							<td>ទឹកប្រាក់</td>
							<td>ពន្ធអាករ</td>
						</tr>
					</thead>
					<tbody data-role="listview" data-bind="source: itemDS.ds" data-template="po-list-template" data-auto-bind=false></tbody>
				</table>
				<div class="pull-left span3">
					<textarea name="" id="notice" data-bind="value: current.notice" cols="60" rows="5"></textarea>
				</div>
				<div class="pull-left span3">
					<textarea name="" id="internal-notice" data-bind="value: current.internal_notice" cols="60" rows="5"></textarea>
				</div>
				<div class="pull-right span4">
					<table style="width: 100%;">
						<tr style="background-color: #000">
							<td colspan="2"></td>
						</tr>
						<tr>
							<td style="text-align: right; width: 100px;">សរុបរង</td>
							<td><input type='text' data-role="numerictextbox" data-bind="value: current.amount" data-format="c2" disabled></td>
						</tr>
						<tr>
							<td style="text-align: right; width: 100px;">ពន្ធ</td>
							<td><span data-bind="text: current.taxAmount"></span></td>
						</tr>
						<tr>
							<td style="text-align: right; width: 100px;">សរុបរួម</td>
							<td><span data-bind="text: grandTotal"></span></td>
						</tr>
					</table>
				</div>
				<div class="notification" data-role="notification" 
							 data-width="250px" 
							 data-position="{top: 25, right: 10}"></div>
				<div class="span12" style="text-align: center; padding-bottom: 10px;">
					<span class="btn btn-icon btn-primary glyphicons circle_ok"  data-bind="click: save"><i></i>កត់ត្រាហើយកត់ថែម</span>
					<span class="btn btn-icon btn-primary glyphicons circle_ok"  data-bind="click: saveClose"><i></i>កត់ត្រាហើយបិទ</span>
					<span class="btn btn-icon btn-default glyphicons ban" data-bind="click: close">បោះបង់</span>
				</div>
			</div>
		</div>
	</div>
</script>
<script type="text/x-kendo-template" id="po-list-template">
	<tr>
		<td><i class="icon-plus" data-bind="click: addItem"></i> <i class="icon-minus" data-bind="click: removeItem"></i></td>
		<td><span data-bind="text: number"></span></td>
		<td><input style="width: 100%" type="text" 
				   data-role="dropdownlist" 
				   data-bind="source: itemArrayList, value: item" 
				   data-text-field="name" 
				   data-value-field="id"
				   data-option-label="រើសមួយ" /></td>
		<td><input style="width: 100%" type="text" data-bind="value: item.description" /></td>
		<td><input data-role="numerictextbox" style="width: 140px;" type="text" data-bind="value: unit, events: {change: computeAmount}" /></td>
		<td><input data-role="numerictextbox" style="width: 140px;" type="text" data-bind="value: rate, events: {change: computeAmount}" /></td>
		<td><span data-bind="text: amount"></span></td>
		<td><input type="checkbox" data-bind="checked: isTaxed, events: {change: getTax}" /></td>
	</tr>
</script>
<script type="text/x-kendo-template" id="po-center-template">
	<div class="widget widget-heading-simple widget-body-white widget-employees">				
		<div class="widget-body padding-none">	
			<div class="row-fluid row-merge">
				<div class="span3 listWrapper" style="height: 730px;">
					<div class="innerAll">
						<form autocomplete="off" class="form-inline">
							<div class="widget-search separator bottom">
								<button type="button" class="btn btn-default pull-right" id="search"><i class="icon-search"></i></button>
								<div class="overflow-hidden">
									<input type="search" value="" placeholder="ស្វែងរកត្រងស្វូ" id="searchField">
								</div>
							</div>
							<div class="select2-container" style="width: 100%;">
								<div class="overflow-hidden">
									<select name="" id="searchOptions" style="width: 100%;" tabindex="-1">
										<option value="class_id">Class</option>
						                <option value="name">ឈ្មោះ</option>
									</select>
								</div>
							</div>
						</form>
					</div>
					<span class="results" data-bind="text: billVM.ds.total"></span>
					<div class="table table-condensed" id="sidebar" style="height: 605px;"
						 data-role="grid" data-bind="source: billVM.ds" 
						 data-row-template="po-center-list-template"
						 data-columns="[{title: 'បញ្ជីលិខិតបញ្ជាទិញ'}]"
						 data-selectable=true
						 data-height="600"
						 data-scrollable="{virtual: true}"
						 data-auto-bind=false></div>
				</div>
				<div class="span9">
					<div class="row" style="margin-left: 5px;">
						<div class="well">
							<fieldset>
								<legend>អ្នកផ្គត់ផ្គង</legend>
									<table class="table">
										<tbody>
											<tr>
												<td>អត្តលេខ</td>
												<td><span data-bind="text: current.vendor[0].id"></span></td>
												<td>ទូរស័ព្ទ</td>
												<td><span data-bind="text: current.vendor[0].phone"></span></td>
											</tr>
											<tr>
												<td>ឈ្មោះ</td>
												<td><span data-bind="text: current.vendor[0].company"></span></td>
												<td>គណនីជាភាសាអង្គេស</td>
												<td><span data-bind="text: current.vendor[0].company_en"></span></td>
											</tr>
											<tr>
												<td>អ៉ីម៉ែល</td>
												<td><span data-bind="text: current.vendor[0].email"></span></td>
												<td>ជាក្រុមហ៊ុនក្នុងស្រុក</td>
												<td><input type="checkbox" name="localCo" data-bind="checked: current.vendor[0].is_local" /> ម៉ែន</td>
											</tr>
										</tbody>
									</table>
							</legend>
						</div>
						<table class="table table-striped table-bordered">
							<thead>
								<tr>
									<th>ទំនិញ</th>
									<th>ពិពណ៏នា</th>
									<th>ចំនួន</th>
									<th>តំលៃ</th>
									<th>ទឹកប្រាក់</th>
								</tr>
							</thead>
							<tbody data-role="listview" 
								   data-bind="source: billVM.itemDS.ds" 
								   data-template="po-center-item-list-template"
								   data-auto-bind=false></tbody>
						</table>
						<a href="#/vendors/u/grn" class="btn btn-primary" data-bind="disabled: is_grn">ទទួលទំនេញ</a> 
						<a href="#/bills/purchase/new" class="btn btn-warning" data-bind="disabled: is_bill">ទទួលវិក្កយប័ត្រ</a>
					</div>					
				</div>
			</div>	
		</div>
	</div>
</script>
<script type="text/x-kendo-template" id="po-center-list-template">
	<tr data-bind="click: selected">
		<td>#:invoice_number#</td>
	</tr>
</script>
<script type="text/x-kendo-template" id="po-center-item-list-template">
	<tr>
		<td>#=item.name#</td>
		<td>#=item.description#</td>
		<td>#=unit#</td>
		<td>#=amount#</td>
		<td>#:kendo.toString(unit * amount, 'c2')#</td>
	</tr>
</script>
<!-- Purchase Order ends -->
<!-- vendor end -->
<!-- vendor payment -->
<script type="text/x-kendo-template" id="vendors-payment-template">
	<div class="container-fluid">
		<div class="row">
			<div class="span12">
				<div class="widget">
					<div class="widget-head">
						<span class="btn btn-primary pull-right" data-bind="click: close">X</span>
						<h3 style="padding-left: 10px; font-size: 18px;">បេឡាករទូទាត់</h3>
					</div>
					<div class="widget-body">
						<div class="row">
							<div class="span3 innerL">
								<div class="well">
									<div class="input-append">
										<input style="width: 190px;" type="text" placeholder="លេខកូដអ្នកផ្គត់ផ្គង់"​ data-bind="value: vendorID" />
										<button data-bind="click: findVendor" class="btn btn-primary"><i class="icon-search"></i></button>
									</div>
	    		     				<table class="table table-stripe" data-bind="visible: show">
	    		     					<tr>
	    		     						<td>ឈ្មោះ</td>
	    		     						<td><span data-bind="text: currentV.company"></span></td>
	    		     					</tr>
	    		     					<tr>
	    		     						<td>លេខពន្ធអាករ</td>
	    		     						<td><span data-bind="text: currentV.vat_no"></span></td>
	    		     					</tr>
	    		     					<tr>
	    		     						<td>រូបិយប័ណ្</td>
	    		     						<td><span data-bind="text: currentV.currency.code"></span></td>
	    		     					</tr>
	    		     					<tr>
	    		     						<td>ឥណទានអនុញ្ញាត្ត</td>
	    		     						<td><span data-bind="text: currentV.credit_limit"></span></td>
	    		     					</tr>
	    		     				</table>
								</div>
							</div>
							<div class="span9">
								<div class="row">
									<div style="margin-left: 10px;" class="span12 well">
										<div class="row-fluid">
											<div class="span4">
												<div class="innerAll padding-bottom-none-phone">
													<div class="widget-stats widget-stats-gray widget-stats-4"> 
														<span class="txt">វិក្កយបត្របង់រួច</span>
														<span class="count" data-bind="text: tInvToday"></span>
														<span class="glyphicons user"><i></i></span>
														<div class="clearfix"></div>
														<i class="icon-play-circle"></i> 
													</div>
												</div>
											</div>

											<div class="span4">
												<div class="innerAll padding-bottom-none-phone">
													<div class="widget-stats widget-stats-primary widget-stats-4">
														<span class="txt">បង់ប្រាក់ប្រចាំថ្ងៃ</span>
														<span class="count"><span data-bind="text: tAmtToday" style="font-size: 35px;">0៛</span></span>
														<span class="glyphicons coins"><i></i></span>
														<div class="clearfix"></div>
														<i class="icon-play-circle"></i>
													</div>
												</div>
											</div>

											<div class="span4">
												<div class="innerAll padding-bottom-none-phone">
													<a href="#/vendor_payment_report" class="widget-stats widget-stats-inverse widget-stats-4">
														<span class="txt">របាយការណ៍បង់ប្រាក់</span>
														<span class="glyphicons refresh"><i></i></span>
														<div class="clearfix"></div>
													</a>
												</div>
											</div>				
										</div>
									</div>
									<div class="span12">
										<div id="exampleValidate" data-role="validator">
										 <!-- //End row-fluid -->						
										<br>

										<table class="table table-bordered table-striped" data-bind="visible: show">
									        <thead>
									            <tr>
									                <th>បង់</th>
									                <th>កាលបរិច្ឆេទ</th>						                
									                <th>ឈ្មោះ</th>
									                <th>វិក្កយបត្រ</th>
									                <th>ទឹកប្រាក់</th>
									                <th class="right">បង់បាន</th>
									                <th class="right" width="110bb">ទទួលប្រាក់</th>							                
									            </tr>
									        </thead>
									        <tbody data-role="listview" data-auto-bind="false" 
									        	   data-template="payment-vednor-row-template" 
									        	   data-bind="source: tmp" 
									        	   class="k-widget k-listview"></tbody>						        
									    </table>						    

										<br>
										<div id="status"></div>
										<br>
										<div class="row-fluid" data-bind="visible: show">
											<div class="span8">						
												<table>
													<tbody>
														<tr>
															<td style="width: 100px;">ថ្ងៃទទួល</td>
										              		<td>
										              			<input id="paymentDate" name="paymentDate" data-role="datepicker" data-bind="value: paymentDate" data-format="dd-MM-yyyy" required="" data-required-msg="ត្រូវការ ថ្ងៃទទួលប្រាក់" type="text" class="k-input">
															</td>
															<td>ទទួលប្រាក់សរុប:</td>
															<td align="right"><input type="text" data-bind="value: total" class="k-input k-textbox" style="width: 160px;" /></td>
														</tr>
											            </tr><tr>
															<td>គណនីសាច់ប្រាក់</td>
															<td>
																<input id="cashAccount" 
																	data-bind="source: cashAccount,value: account"  
																	data-required-msg="ត្រូវការ គណនីសាច់ប្រាក់" 
																	data-role="dropdownlist"
																	data-text-field="name",
																	data-value-field="id"
																	data-option-label="---រើសមួយ---"
																	style="display: none;">											
															</td>
															<td>សក្ខីប័ត្រចំណាយ:</td>
															<td align="right"><input type="text" data-bind="value: voucher" class="k-input k-textbox" style="width: 160px;" /></td>
														</tr>
														<tr>
															<td valign="top">ចំណាត់ថ្នាក់</td>
															<td valign="top"><select data-role="multiselect" 
														   		data-bind="source: classDS, value: segment, events: {change: changeValue}" 
														   		data-value-field="id" 
														   		data-text-field="name"
														   		data-placeholder="---រើសមួយ---"
														   		style="width: 160px" /></select>
														    </td>
															<td valign="top">ចំណាំ</td>
															<td colspan='3'>
																<textarea style="width: 150px;" name="" id="" cols="30" rows="5" data-bind="value: memo"></textarea>
															</td>
														</tr>										
													</tbody>
												</table>							
											</div>																			
											<div class="span4">
												<div class="innerAll padding-bottom-none-phone" data-bind="click: makePayment">
													<a id="save" name="save" class="widget-stats widget-stats-info widget-stats-4">
														<span class="txt">ទឹកប្រាក់ទទួលបាន</span>
														<span class="count" style="font-size: 35px;" data-bind="text: total">៛</span>
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
				</div>
			</div>
		</div>
	</div>
</script>
<script type="text/x-kendo-template" id="payment-vednor-row-template">
	<tr>
		<td><input type="checkbox" data-bind="checked: isPaid, events: { change: tick }" /></td>
		<td>#=due#</td>
		<td>#=vendor.company#</td>
		<td>#=invoice#</td>
		<td>#=amountBilled#</td>
		<td>#=paid#</td>
		<td><input type="text" data-bind="value: amount, events: { change: tick }" style="width: 100px" /></td>
	</tr>
</script>
<script type="text/x-kendo-template" id="vendors-payment-report-template">
	<div class="container-fluid">
		<div class="row">
			<div class="span12">
				<div class="widget">
					<div class="widget-head">
						<span class="btn btn-primary pull-right" data-bind="click: close">X</span>
						<h3 style="padding-left: 10px; font-size: 18px;">របាយការណ៍បេឡាទូទាត់</h3>
					</div>
					<div class="widget-body">
						<div class="row innerAll">
							<div class="span12">
								<div style="text-align: center;">
									<input type="text" data-role="dropdownlist" data-bind="source: dateType, events: {change: dateTypeSelect}" data-index="1" class="dateSelect" />
									<input type="text" data-role="datepicker" data-bind="value: startDate, events: {change: dateChange}"/>
									<input type="text" data-role="datepicker" data-bind="value: endDate" />
									<span data-bind="click: findPmt" class="k-button" data-role="button"><i class="icon-filter"></i></span>
								</div><br >
								<div class="well">
									<table class="table table-white">
										<thead>
											<tr style="background-color: #12385C; color: #ffffff">
												<th>ថ្ងៃបង់ប្រាក់</th>
												<th>ឈ្មោះ</th>
												<th>ប្រភេទ</th>
												<th>លេខវិក្កយប័ត្រ</th>
												<th>ទឹកប្រាក់</th>
											</tr>
										</thead>
										<tbody data-role="listview" 
											   data-bind="source: pmtDS" 
											   data-template="vendor-payment-report-list-tmpl"
											   data-auto-bind=false></tbody>
										<tfoot>
											<tr>
												<td colspan='5'>
												
												</td>
											</tr>
										</tfoot>
									</table>
									<div data-role="pager" data-bind="source: pmtDS"></div>
								</div>
							</div>
						</div>
					</div>	
				</div>
			</div>
		</div>
	</div>
</script>
<script type="text/x-kendo-template" id="vendor-payment-report-list-tmpl">
	<tr>
		<td>#: kendo.toString(payment_date, 'dd-MM-yyyy')#</td>
		<td><a href="\#/vendors">#=contact[0].company#</a></td>
		<td>#=type#</td>
		<td><a href="\#/bills/#=type#/#=reference_id#">#=reference_id#</a></td>
		<td style="text-align: right">#= kendo.toString(amount, 'c2')#</td>
	</tr>
</script>
<!-- end vendor payment -->
<!-- Accounting Section Starts -->
<script type="text/x-kendo-template" id="accounting-menu-tmpl">
	<li>
		<a href='#/accounting_dashboard' class="glyphicons home"><i></i></a>
	</li>
	<li><a href="#/accounts">តារាងគណនី</a></li>
	<li class="dropdown">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown">កត់ត្រាប្រតិបត្តិការ <i class="caret"></i></a>
		<ul class="dropdown-menu" id="dropdownMenu">
			<li id="home-menu"><a href="#/accounts/u/gl">កត់ត្រាទិន្នានុប្បវត្តិ</a></li>
			<li id="customer-menu"><a href="#/customers">ទាញទិន្នានុប្បវត្តិ</a></li>
			<li id="vendor-menu"><a href="#/bills/expense/new">ចំណាយ</a></li>
			<li id="account-menu"><a href="#/bills/purchase/new">ទិញទំនេញ</a></li>
			<li id="water-menu"><a href="#/cashier/receipt">បង្កាន់ដៃលក់</a></li>
			<li id="electricity-menu"><a href="#/invoice">ចេញវិក្កយបត្រ</a></li>
			<li id="water-menu"><a href="#/payment/vendor">ទទួលប្រាក់</a></li>
			<li id="water-menu"><a href="#/cashiers">បង់ប្រាក់</a></li>
    	</ul>
	</li>
	<li><a href="#/currencies">តារាងអត្រាប្ដូរប្រាក់</a></li>
	<li>
		<a href="#" class="dropdown-toggle" data-toggle="dropdown">របាយកាណ៍គណនេយ្យករ​ <i class="caret"></i></a>
		<ul class="dropdown-menu" id="dropdownMenu">
			<li id="home-menu"><a href="#/trial_balance">តារាងតុល្យការ (TB)</a></li>
			<li id="customer-menu"><a href="#/journalReport">ទិន្នានុប្បវត្តិ</a></li>
			<li id="vendor-menu"><a href="#/glReport">របាយកាណ៍សៀវភៅធំ</a></li>
			<li id="account-menu"><a href="#/bills/purchase/new">ទិញទំនេញ</a></li>
			<li id="water-menu"><a href="#/cashier/receipt">បង្កាន់ដៃលក់</a></li>
			<li id="electricity-menu"><a href="#/invoice">ចេញវិក្កយបត្រ</a></li>
			<li id="water-menu"><a href="#/payment/vendor">ទទួលប្រាក់</a></li>
			<li id="water-menu"><a href="#/cashiers">បង់ប្រាក់</a></li>
    	</ul>
	</li>
	<li>
		<a href='#/accounting_setting' class='glyphicons settings'><i></i></a>
	</li>
</script>
<script type="text/x-kendo-template" id="accounting-dashboard-tmpl">
	<div class="widget widget-heading-simple widget-body-white widget-employees">				
		<div class="widget-body padding-none">	
			<div class="row-fluid row-merge">
				<div class="span3 listWrapper" style="height: 700px;">
					<div class="innerAll">
						<form autocomplete="off" class="form-inline">
							<div class="widget-search separator bottom">
								<button type="button" class="btn btn-default pull-right" id="search" data-bind="click: find"><i class="icon-search"></i></button>
								<div class="overflow-hidden">
									<input type="search" data-bind="value: accountKeyId" placeholder="ស្វែងរក" id="searchField">
								</div>
							</div>
						</form>
					</div>
					<span class="results" data-bind="text: accounts.dataStore.total"></span>
					<div class="table table-condensed" id="sidebar" style="height: 580px;"
						 data-role="grid" data-bind="source: accounts.dataStore" 
						 data-row-template="accountChartTmpl"
						 data-columns="[{title: 'គណនី'}]"
						 data-selectable=true
						 data-height="600"
						 data-pageable="true"
						 data-scrollable="{virtual: true}"></div>
				</div>
				<div class="span9 innerAll">
					<div id="vendorDashboard" class="row" style="margin-left: 5px;">
						<div class="row-fluid">
							<div class="span5">
								<div class="widget widget-4 widget-tabs-icons-only margin-bottom-none">
							    	<!-- Widget Heading -->
							    	<div class="widget-head">				
								        <!-- Tabs -->
								        <ul class="pull-right">
								            <li class="glyphicons circle_info active"><span data-toggle="tab" data-target="#tab1-5"><i></i></span>
								            </li>
								            <li class="glyphicons circle_plus"><a href="#/accounts/u/new"><i></i></a>
			            					</li>
								        </ul>
								        <div class="clearfix"></div>
								        <!-- // Tabs END -->
									</div>
		    						<!-- Widget Heading END -->

								    <div class="widget-body">
								        <div class="tab-content">
								            <!-- Tab content -->
								            <div id="tab1-5" class="tab-pane active box-generic">
								            	<div class="row-fluid">
								            		<div class="span10">
								            			លេខកូដគណនី៖ <span class="strong" data-bind="text: current.code"></span><br/>
										            	ឈ្មោះគណនី៖ <span class="strong" data-bind="text: current.name"></span><br/>
										            	គណនីមេ៖ <span class="strong" data-bind="text: current.parentAccount.name"></span><br/>
										            	ប្រភេទគណនី៖ <span class="strong" data-bind="text: current.type.name"></span><br/>
										            	រូបបិយវត្ថុគណនី៖ <span class="strong" data-bind="text: current.type.name"></span><br/>
										            	ពីពណ៍នា៖ <span class="strong" data-bind="text: current.description"></span>
								            		</div>
								            		<div class="span2" style="margin-bottom: -30px;">
									            		<span class="btn btn-default btn-block" data-bind="click: edit"><i class="icon-pencil"></i></span><br/>
									            		<span class="btn btn-primary btn-block" data-bind="text: current.type.nature"></span>
									            	</div>
								            	</div>
								            </div>
								            <!-- // Tab content END -->

								            <!-- Tab content -->
								            <div id="tab2-5" class="tab-pane box-generic">
								                	<h4>Tab #2 content heading</h4>
								                <p>Donec at nunc dui. Integer eget sem sit amet arcu bibendum elementum vel sit amet risus. Fusce libero lorem, fermentum vitae lacinia dapibus, vestibulum ac enim. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos
								                    himenaeos. Vestibulum accumsan risus sed lorem tincidunt eget faucibus sapien tempor. Proin ac feugiat dolor. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum ante ipsum primis
								                    in faucibus orci luctus et ultrices posuere cubilia Curae.</p>
								            </div>
								            <!-- // Tab content END -->
								        </div>
								    </div>
								</div>

							</div>
							<div class="span7">
								<div class='row-fluid' style='margin-bottom: 8px;'>
									<div class="span12">
										<div class="widget-stats widget-stats-gray widget-stats-2">
											<span class="count" data-bind="text: todayBalance"></span>
											<span class="txt">សមតុល្យត្រឹមថ្ងៃនេះ</span>
										</div>
									</div>
								</div>
								<div class='row-fluid'>
									<div class="span6">
										<div class="widget-stats widget-stats-gray widget-stats-2">
											<span class="count" data-bind="text: recurring.count"></span>
											<span class="txt">ប្រតិបត្តិការណ៍ដែលអាចកើតឡើង</span>
										</div>
									</div>
									<div class="span6">
										<div class="widget-stats widget-stats-gray widget-stats-2">
											<span class="count" data-bind="text: transactionOccurred"></span>
											<span class="txt">ប្រតិបត្តិការណ៍</span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="separator bottom"></div>
						<div style="text-align: center;">
							<input type="text" data-role="dropdownlist" data-bind="source: dateType, events: {change: dateTypeSelect}" data-index="1" class="dateSelect" />
							<input type="text" data-role="datepicker" data-bind="value: startDate, events: {change: dateChange}"/>
							<input type="text" data-role="datepicker" data-bind="value: endDate" />
							<span data-bind="click: filter" class="k-button" data-role="button"><i class="icon-search"></i></span>
						</div><br/>
						<div class="well">
							<div data-role="grid"
								 data-bind="source: journal.entries"
								 data-columns="[
								 	{title: '&nbsp', width: '25px'},
								 	{title: 'ប្រភេទ'},
									{title: 'ពិពណ៏នា'},
									{title: 'ថ្នាក់'},
									{title: 'Dr.'},
									{title: 'Cr.'},
									{title: '', width: '30px'}								 
								 ]"
								 data-height="400px"
								 data-row-template="accounting-dashboard-grid-list-tmpl"></div>
							<div data-role='pager' data-bind="source: journal.entries"></div>
						</div>							
					</div>					
				</div>
			</div>	
		</div>
	</div>
</script>
<script type="text/x-kendo-template" id="accounting-dashboard">
		<div class="innerAll">
			<div class="span4">
				<div class="well">
					<span style="text-align: right">ស្តងដារគណនេយ្យ៖ ស្តងដាររាបាយកាណ៍ហិរញ្ញវត្ថុទាក់ទង​នឹងហិរញ្ញវិត្ថុអន្តរជាតិនៃកម្ពុជាសម្រាប់សហគ្រាសធុនតូច</span>
					<div class="separator bottom"></div>
					<button class="btn btn-primary">ស្តងដារនេះជាភាសាខ្មែរ</button>
					<button class="btn btn-primary" style="font-size: 9.95pt;">Download this Standard</button>
					<div class="separator bottom"></div>
					កាលបរិច្ឆេទរបាយការណ៍៖ ១ មករា ដល់ ៣១ ឆ្នូ<br/>
					ឯកតារូបិយវត្ថុសម្រាប់របាយការណ៍៖ ប្រាក់រៀល (KHR)
				</div>				
				<div class="separator buttom"></div>
				<div>
					<div id="account-dash-graph"></div>
				</div>
			</div>
			<div class="span4">
				<div style="text-align: center;">
					រយៈពេលពី&nbsp;
						<input type="text" data-role="datepicker" data-bind="value: dateFrom" style="width: 130px;" />
						<input type="text" data-role="datepicker" data-bind="value: dateTo, events: {change: onDateChange}" style="width: 130px;" />
						<button data-role="button" data-bind="click: searchByDate"><i class="icon-search"></i></button>
				</div>
				<div class="separator buttom"></div>
				<h2 style="text-align: center;">របាយការណ៍ស្ថានភាពហិរញ្ញវត្ថុ</h2>
				<div style="text-align: center;">នៅត្រឹមរយៈពេលពី&nbsp;<span data-bind="text: dateTo" data-format="dd-MM-yyyy"></span></div>
				<div class="separator buttom"></div>
				<div class="widget widget-body-white">
					<div class="widge-body">
						<table class="table table-borderless table-condensed table-striped">
							<thead>
								<tr>
									<th>ទ្រព្យសកម្ម</th>
									<th></th>
								</tr>
							</thead>
							<tbody data-role="listview" data-bind="source: balanceSheet.assetDS" data-auto-bind=false data-template="accounting-balance-sheet-list-tmpl"></tbody>
							<tfoot>
								<tr>
									<td>ទ្រព្យសកម្មសរុប</td>
									<td style="text-align: right"><span data-bind="text: balanceSheet.totalAsset"></span></td>
								</tr>
							</tfoot>
						</table>
						<hr/>
						<table class="table table-borderless table-condensed table-striped">
							<thead>
								<tr>
									<th>បំណុលនិង​ដើមទុន</th>
									<th></th>
								</tr>
							</thead>
							<tbody data-role="listview" data-bind="source: balanceSheet.liabilityDS" data-auto-bind=false data-template="accounting-balance-sheet-list-tmpl"></tbody>
							<tfoot>
								<tr>
									<td>បំណុលនិង​ដើមទុនសរុប</td>
									<td style="text-align: right"><span data-bind="text: balanceSheet.totalLiabEq"></span></td>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
			</div>
			<div class="span4">
				<div class="row-fluid">
					<div class="span6">
						<a href="" class="widget-stats widget-stats-gray widget-stats-2">
							<span class="count" data-bind="text: transactionOccurred"></span>
							<span class="txt">ប្រតិបត្តិការណ៍ដែលអាចកើតឡើង</span>
						</a>
					</div>
					<div class="span6">
						<a href="" class="widget-stats widget-stats-gray widget-stats-2">
							<span class="count" data-bind="text: recurring.count"></span>
							<span class="txt">ប្រតិបត្តិការណ៍គួរកើតឡើង</span>
						</a>
					</div>
				</div>
				<br/>
				<div class="row-fluid">
					<div class="span6">
						<a href="" class="widget-stats widget-stats-gray widget-stats-2">
							<span class="count" data-bind="text: balanceSheet.getXRatio"></span>
							<span class="txt">អនុបាទចរន្ត Current Ratio</span>
						</a>
					</div>
					<div class="span6">
						<a href="" class="widget-stats widget-stats-gray widget-stats-2">
							<span class="count" data-bind="text: balanceSheet.getQRatio"></span>
							<span class="txt">អនុបាទចរន្តពេលខ្លី Quick Ratio</span>
						</a>
					</div>
				</div>
				<table class="table">
					<tbody>
						<tr>
							<td width="280">ផលនៃការវិនិយោគ <br/>Return on Capital Employed</td>
							<td style='text-align: right;'><span data-bind="text: getROCE"></span> %</td>
						</tr>
						<tr>
							<td>អនុបាតនៃប្រាក់ចំណេញដុល <br/>Gross Profit Margin</td>
							<td style='text-align: right;'><span data-bind="text: getGPM"></span> %</td>
						</tr>
						<tr>
							<td>អនុបាតនៃប្រាក់ចណេញសុទ្ធ <br/>Net Profit Margin</td>
							<td style='text-align: right;'><span data-bind="text: getNPM"></span> %</td>
						</tr>
						<tr>
							<td>ផលទទួលបានពីទ្រព្យសកម្ម <br/>Asset Turnover</td>
							<td style='text-align: right;'><span data-bind="text: getAssetTurnOver"></span> %</td>
						</tr>
						<tr>
							<td>រយៈពេលនៃការប្រមូលគណនីអតិថិជនជំពាក់<br>
								Account Receivable Collection Period
							</td>
							<td style='text-align: right;'><span data-bind="text: getARCP"></span> ថ្ងៃ</td>
						</tr>
						<tr>
							<td>រយៈពេលបង្វិលសន្និធិ <br/>Inventory Turnover</td>
							<td style='text-align: right;'><span data-bind="text: getInventoryTurnOver"></span> ថ្ងៃ</td>
						</tr>
						<tr>
							<td></td>
							<td style='text-align: right;'><span data-bind="text: getNumberSeven"></span> ថ្ងៃ</td>
						</tr>
					</tbody>
				</table>				
			</div>
		</div>
</script>
<script type="text/x-kendo-template" id="accounting-balance-sheet-list-tmpl">
	<tr>
		<td>#=type#</td>
		# var amount = 0.00 #
		# if(accounts.length > 0) {#
			# for(var i = 0; i < accounts.length; i++) {#
				# amount += kendo.parseFloat(accounts[i].amount); #
			#}#			
		#}#
		<td style="text-align: right">#=amount#</td>
	</tr>
</script>
<script type="text/x-kendo-template" id="accounting-trialBalance-tmpl">
	<div class="container-960">
		<div class="span12">
			<button class="btn btn-primary pull-right" data-bind="click: back">X</button>
			នៅត្រឹមរយៈពេលពី&nbsp;
				<input type="text" data-role="datepicker" data-bind="value: dateTo" style="width: 200px;" />
				<button data-role="button" data-bind="click: searchDate"><i class="icon-search"></i></button>
			<div class="separator buttom"></div>
			<h3 style="text-align: center">តារាងតុល្យការ | Trial Balance</h3>
			<table class="table table-primary table-borderless table-striped table-condensed table-pricing-2">
				<thead>
					<tr>
						<th style="text-align: center">លេខគណនី</th>
						<th style="text-align: center">គណនី</th>
						<th style="text-align: center">Dr</th>
						<th style="text-align: center">Cr</th>
					</tr>
				</thead>
				<tbody data-role="listview" data-bind="source: trialBalance.dataSource" data-template="accounting-trialBalance-list-tmpl"></tbody>
				<tfoot style="background-color: #eeeeee; color: #000000; font-weight: bold">
					<tr>
						<td></td>
						<td></td>
						<td><span data-bind="text: trialBalance.tbDebit"></span></td>
						<td><span data-bind="text: trialBalance.tbCredit"></span></td>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>
</script>
<script type="text/x-kendo-template" id="accounting-trialBalance-list-tmpl">
	<tr>
		<td>#=code#</td>
		<td>#=account#</td>
		<td style="text-align: right">#=dr#</td>
		<td style="text-align: right">#=cr#</td>
	</tr>
</script>
<script type="text/x-kendo-template" id="accounting-dashboard-grid-list-tmpl">
 <tr>
 	<td>
 		#if(journal.type==='po') {#
 			<a href="\#/vendors/u/po/#=journal.reference#"><i class="icon-th-list"></i></a>
 		#} else if (journal.type === 'gl') {#
 			<a href="\#/accounts/u/gl/#=journal.id#"><i class="icon-th-list"></i></a>
 		#} else {#
 			<a href="\#/bills/#=journal.type#/#=journal.reference#"><i class="icon-th-list"></i></a>
 		#}#	
 	</td>
 	<td>#=journal.type#</td>
 	<td>#=memo#</td>
 	<td>
 		#for(var i = 0; i < segment.length; i++) {#
 			#=segment[i].code#
 		#}#
 	</td>
 	<td>
 		# if (is_debit === 'true') {# 
 			#=amount#
 		#}#
 	</td>
 	<td># if (is_debit === 'false') {# 
 			#=amount#
 		#}#
 	</td>
 	<td></td>
 </tr>
</script>
<script type="text/x-kendo-template" id="accountChartTmpl">
	<tr data-bind="click: selected">
		<td>
			#if(parentAccount.id !== 0) {#
				&nbsp;&nbsp;&nbsp;&nbsp;
			#} else#
			#=code# - #=name#
		</td>
	</tr>
</script>
<script type="text/x-kendo-template" id="account-new-tmpl">
	<div class="span10 offset1">
		<table class="table">
			<tr>
				<td>ប្រភេទ:</td>
				<td><input type="text" data-role="dropdownlist" data-bind="source: types, value: current.type" data-text-field="name" data-value-field="id" /></td>
			</tr>
			<tr>
				<td>គណនីមេ:</td>
				<td><input type="text" data-role="combobox" data-bind="source: ds, value: current.parentAccount"
							           data-text-field="name"
							           data-value-field="id" />
				</td>
			</tr>
			<tr>
				<td>កូដ:</td>
				<td><input type="text" data-bind="value: current.code" /></td>
			</tr>
			<tr>
				<td>គណនី:</td>
				<td><input type="text" data-bind="value: current.name" /></td>
			</tr>
			<tr>
				<td>គណនីជាភាសាអង្គេស:</td>
				<td><input type="text" data-bind="value: current.name_en" /></td>
			</tr>
			<tr>
				<td>ពិពណ៏នា:</td>
				<td><input type="text" data-bind="value: current.description" /></td>
			</tr>
		</table>
		<div data-role="notification" id="notification" 
			 data-width="250px" 
			 data-position="{top: 25, right: 10}"></div>
		<button class="btn" data-bind="click: save">រក្សាទុក</button>
	</div>
</script>
<script type="text/x-kendo-template" id="parent-account-tmpl">
	<tr>
		<td>#=code# - #=name#</td>
	</tr>
</script>
<script type="text/x-kendo-template" id="journal-account-tmpl">
	<div class="container">
		<div class="row">
			<div class="span12">
				<div class="widget">
					<div class="widget-head">	
						<h4 class="heading glyphicons notes"><i></i> កត់ត្រាទិន្នានុប្បវត្តិ</h4>
						<span class="btn btn-primary pull-right" data-bind='click: close'>X</span>
					</div>
					<div class="widget-body">
						<div class="well">
							<span>លេខសក្ខីប័ត្រ JV No.</span>
							<input type="text" data-bind="value: current.voucher"
								   data-role="maskedtextbox"
								   data-mask="&&-0000000" />
							<span>កាលបរិច្ឆេទ</span>
							<input type="text" data-role="datepicker" 
								   data-bind="value: current.issuedDate"
								   data-format="dd-MM-yyyy"
								   data-parse-formats="yyyy-MM-dd" />
							ប្រភេទប្រតិបត្តិការ Type of Transaction: 
							<input type="text" 
								data-role="dropdownlist" 
								data-bind="source: types, value:current.type"
								data-text-field="name"
								data-value-field="id" />
						</div>
						<div>
							នឹងកើតឡើង <input type="checkbox" data-bind="checked: isRecurred, events: {change: createRecurring}" /> &nbsp;
							<span style="width: 400px;">How often does it recurr?</span> 
							<input type="text" data-role="dropdownlist" 
								   data-bind='source: recurringVM.recurringDS, value: recurringVM.current.recurring_number'
								   data-value-field="id"
								   data-text-field="name"
								   style="width: 90px;" />
							When is the next date for recurring? 
							<input type="text" 
								   data-role="datepicker"
								   data-bind="value: recurringVM.current.date"
								   data-format="dd-MM" style="width: 90px;" />
						</div>
						<div class="separator buttom"></div>
						<div class="widget">
							<div class="widget-head">
								<h2 class="heading">ពន្យល់ Description</h2>
							</div>
							<div class="widget-body">
								<textarea data-bind="value: current.memo" style='width: 100%; height: 50px;'></textarea>
							</div>
						</div>
						<table class="table">
							<thead>
								<tr>
									<th><button class="btn" data-bind="click: addEntry">+</button></th>
									<th>គណនី</th>
									<th>ពិពណ៍នា</th>
									<th>ឈ្មោះ</th>
									<th>ចំណាត់ថ្នាក់</th>	
									<th>ឥណពន្ធ (Dr.)</th>
									<th>ឥណទាន (Cr.)</th>								
								</tr>
							</thead>
							<tbody data-role="listview" data-bind="source: entries" data-template="journal-entry-account-tmpl">
							</tbody>
							<tfoot>
								<tr>
									<td></td>
									<td><span data-bind="text: debit"></span></td>
									<td><span data-bind="text: credit"></span></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td colspan="6">
										
									</td>
								</tr>
							</tfoot>
						</table>
						<div style="text-align: right">
							<button class="btn btn-primary" style="width: 220px;" data-bind="click: save">កត់ត្រាហើយកត់ថែម</button>
							<button class="btn btn-success" style="width: 220px;" data-bind="click: saveNClose">កត់ត្រាហើយបិទ</button>
							<button class="btn btn-danger" style="width: 220px;" data-bind="click: close">បោះបង់</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<script type="text/x-kendo-template" id="journal-entry-account-tmpl">
	<tr>
		<td><span class="btn"><i class="icon-remove" data-bind="click: removeEntry"></i></span></td>
		<td>
			<input type="text" data-role="dropdownlist" data-bind="source: accountList, value: account" data-auto-bind=false data-text-field="name" data-value-field="id" />
		</td>
		<td><input style="width: 140px;" type="text" data-bind="value: memo" /></td>
		<td><input style="width: 100px;" 
										  type="text" 
										  data-role="combobox" 
										  data-virtual=true 
										  data-bind="source: people.dataSource, value: contact" 
										  data-value-field="id" 
										  data-text-field="name"
										  data-filter="contains"
										  data-min-length=5
										   /></td>
		<td><select style="width: 100px;" data-role="multiselect" style="width: 150px" 
										   data-bind="source: classDS, value: segment, events: {change: changeValue}" 
										   data-value-field="id" 
										   data-text-field="name"
										   data-placeholder="select"
										   data-item-template="class-list-tmpl"
										   data-auto-bind=false
										   style="width: 220px" /></select></td>
		<td><input type="text" style="width: 150px" data-bind="value: debit, events:{change: totalDebit, blur: check}" /></td>
		<td><input type="text" style="width: 150px" data-bind="value: credit, events:{change: totalCredit, blur: check}" /></td>		
	</tr>
</script>
<script type="text/x-kendo-template" id="journal-report-tmpl">
	<h3 data-bind="text: companyInf()[0].legal_name" style="text-align:center"></h3>
	<h4 style="text-align:center">របាយការណ៍ទិន្នានុប្បវត្តិ</h4><br/>
	<div style="text-align: center;">
		<input type="text" data-role="dropdownlist" data-bind="source: dateType, events: {change: dateTypeSelect}" data-index="1" class="dateSelect" />
		<input type="text" data-role="datepicker" data-bind="value: startDate, events: {change: dateChange}"/>
		<input type="text" data-role="datepicker" data-bind="value: endDate" />
		<span data-bind="click: filter" class="k-button" data-role="button"><i class="icon-search"></i></span>
	</div><br/>
	<table class='table table-striped table-white'>
		<thead style="background-color: #00bbff; color: #ffffff">
			<tr>
				<th>#</th>
				<th>Type</th>
				<th>Date</th>
				<th>Num</th>
				<th>Name</th>
				<th>Memo</th>
				<th>Segment</th>
				<th>Account</th>
				<th>Dr</th>
				<th>Cr</th>
			</tr>
		</thead>
		<tbody
			data-role="listview" 
			data-bind="source: journal" 
			data-template="journal-report-list-tmpl"
			data-auto-bind="false"
		></tbody>
		<tfoot>
			<tr>
				<td colspan="8"></td>
				<td style="text-align: right; font-weight: bold; border-bottom: 5px double #000000; width; 190px; padding: 5px;">
					<span data-bind="text: jDebit" style="font-size: 14px; color: #dd1919"></span>
				</td>
				<td style="text-align: right; font-weight: bold; border-bottom: 5px double #000000; width; 190px; padding: 5px;">
					<span data-bind="text: jCredit" style="font-size: 14px; color: #dd1919"></span>
				</td>
			</tr>
		</tfoot>
	</table>
</script>
<script type="text/x-kendo-template" id="journal-report-list-tmpl">
	<tr>
		<td>#=id#</td>
		<td>
			#if(type === 'pmt') {#
				បង់ប្រាក់
			#} else if(type === 'purchase') {#
				វិក្កយបត្រទំនេញ
			#} else if(type === 'expense') {#
				វិក្កយបត្រចំណាយ
			#} else if(type === 'adj') {#
				កំណែរ
			#} else if(type === 'invoice') {#
				វិក្កយបត្រអតិថិជន
			#} else if(type === 'eInvoice') {#
				វិក្កយបត្រអគ្គីសនី
			#} else if(type === 'wInvoice') {#
				វិក្កយបត្រទឹក
			#} else if(type === 'deposit') {#
				កក់ប្រាក់
			#} else if(type === 'Receipt') {#
				ទទួលប្រាក់
			#}#				
		</td>
		<td>#=kendo.toString(date, 'dd-MM-yyyy')#</td>
		<td>#=voucher#</td>
		<td>#=contact.surname# #=contact.name#</td>
		<td>#=memo#</td>
		<td>

		</td>
		<td>
			#for (var i = 0; i < entries.length; i++) {#
				#= entries[i].account.code # #=entries[i].account.name# <br/>
			# } #
		</td>
		<td style="text-align: right">
			# var amount = 0; #
			#for (var i = 0; i < entries.length; i++) {#
				#if(entries[i].is_debit === 'true') {#
					# amount += kendo.parseFloat(entries[i].amount) #
					#= entries[i].amount #  <br/>
				# } else {#
					<br/>
				# } #
			# } #
			<hr/>
			<strong>#= kendo.toString(amount, 'c') #</strong>
		</td>
		<td style="text-align: right">
			# var amount = 0; #
			#for (var i = 0; i < entries.length; i++) {#
				#if(entries[i].is_debit === 'false') {#
					# amount += kendo.parseFloat(entries[i].amount) #
					#= entries[i].amount #  <br/>
				# } else {#
					<br/>
				# } #
			# } #
			<hr/>
			<strong>#= kendo.toString(amount, 'c') #</strong>
		</td>
	</tr>
</script>
<script type="text/x-kendo-template" id="journal-ledger-report-tmpl">
	<h3 data-bind="text: companyInf()[0].legal_name" style="text-align:center"></h3>
	<h4 style="text-align:center">របាយការណ៍ទិន្នានុប្បវត្តិទូទៅ</h4><br/>
	<div style="text-align: center;">
		<input type="text" data-role="dropdownlist" data-bind="source: dateType, events: {change: dateTypeSelect}" data-index="1" class="dateSelect" />
		<input type="text" data-role="datepicker" data-bind="value: startDate, events: {change: dateChange}"/>
		<input type="text" data-role="datepicker" data-bind="value: endDate" />
		<span data-bind="click: filterGL" class="k-button" data-role="button"><i class="icon-search"></i></span>
	</div><br/>
	<table class='table table-white'>
		<thead style="background-color: #00bbff; color: #ffffff">
			<tr>
				<th>ប្រភេទ</th>
				<th>កាលបរិច្ឆេទ</th>
				<th>លេខ</th>
				<th>ឈ្មោះ</th>
				<th>ពិពណ៏នា</th>
				<th>ថ្នាក់</th>
				<th>គណនី</th>
				<th>ចំនួន</th>
				<th>ឥន្នពន្ធ</th>
				<th>ឥន្នទាន</th>
				<th>សមតុល</th>
			</tr>
		</thead>
		<tbody
			data-role="listview" 
			data-bind="source: gl" 
			data-template="journal-ledger-report-list-tmpl"
			data-auto-bind="false"
		></tbody>
	</table>
</script>
<script type="text/x-kendo-template" id="journal-ledger-report-list-tmpl">
	<tr>
		<td><strong>#=code#-#=name#</strong></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
		<td style="text-align: right">#=balance#</td>
	</tr>
	# var tmpbalance = 0, tmpamount = 0; #
	# tmpbalance = balance; #
	# for(var i = 0; i < entries.length; i++) {#
		# tmpbalance += kendo.parseFloat(entries[i].amount); #
		# tmpamount += kendo.parseFloat(entries[i].amount); #
		<tr style="font-size: 10px; font-weight: italic;">
			<td> 
				#if(entries[i].type === 'pmt') {#
					&nbsp;បង់ប្រាក់
				#} else if(entries[i].type === 'purchase') {#
					&nbsp;វិក្កយបត្រទំនេញ
				#} else if(entries[i].type === 'expense') {#
					&nbsp;វិក្កយបត្រចំណាយ
				#} else if(entries[i].type === 'adj') {#
					&nbsp;កំណែរ
				#} else if(entries[i].type === 'invoice') {#
					&nbsp;វិក្កយបត្រអតិថិជន
				#} else if(entries[i].type === 'eInvoice') {#
					&nbsp;វិក្កយបត្រអគ្គីសនី
				#} else if(entries[i].type === 'wInvoice') {#
					&nbsp;វិក្កយបត្រទឹក
				#} else if(entries[i].type === 'deposit') {#
					&nbsp;កក់ប្រាក់
				#} else if(entries[i].type === 'Receipt') {#
					&nbsp;ទទួលប្រាក់
				#}#		
			</td>
			<td>#=entries[i].dateTime#</td>
			<td>#=entries[i].voucher#</td>
			<td>#=entries[i].contact.surname# #=entries[i].contact.name#</td>
			<td>#=entries[i].memo#</td>
			<td></td>
			<td>
			</td>
			<td>	
			</td>
			<td style="text-align: right">
				#=entries[i].dr#
			</td>
			<td>
				#=entries[i].cr#
			</td>
			
			<td style="text-align: right">#= tmpbalance #</td>
		</tr>
	#}#
	<tr>
		<td>សរុប #=code#-#=name#</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
		<td><div style="border-top: 3px double black; text-align: right">#=tmpamount#</div></td>
		<td><div style="border-top: 3px double black; text-align: right">#=tmpbalance#</div></td>
	</tr>
</script>
<script type="text/x-kendo-template" id="class-list-tmpl">
	<span>
		#=name# (#=segment.name#)
	</span>
</script>
<script type="text/x-kendo-template" id="cashier-tmpl">
	<h1><img src="./uploads/pictures/banhji_cashier.png" alt="" width="300" height="100" /></h1>
	<div class="widget widget-heading-simple widget-body-white widget-employees">				
		<div class="widget-body padding-none">	
			<div class="row-fluid row-merge" style="margin-right: 0">
				<div class="span2 listWrapper" style="height: 755px;">
					<div class="innerAll">
						<form autocomplete="off" class="form-inline">
							<div class="widget-search separator bottom">
								<button type="button" class="btn btn-default pull-right" id="search" data-bind="click: findVendor"><i class="icon-search"></i></button>
								<div class="overflow-hidden">
									<input type="search" data-bind="value: key" placeholder="ស្វែងរក" id="searchField">
								</div>
							</div>
						</form>
					</div>
					<span class="results" data-bind="text: people.dataSource.total()">
					</span>
					<div class="table table-condensed" id="sidebar"
						 data-role="grid" data-bind="source: people.dataSource" 
						 data-row-template="cashier-people-list-tmpl"
						 data-columns="[{title: 'ឈ្មោះ'}]"
						 data-selectable=true
						 data-height="655"
						 data-pageable="false"
						 data-scrollable="{virtual: true}"></div>
				</div>
				<div class="span10">
					<div class="widget widget-tabs widget-tabs-double widget-tabs-white">
					    <!-- Tabs Heading -->
					    <div class="widget-head">
					        <ul>
					            <li class="active" id="cashier-payment-id"><a href="#tab1-2" class="glyphicons user" data-toggle="tab"><i></i><span class="strong">ទូទាត់ប្រាក់</span></a>
					            </li>
					            <li class="" id="cashier-receipt-id"><a href="#tab2-2" class="glyphicons calculator" data-toggle="tab"><i></i><span class="strong">ទទួលប្រាក់</span><span>ទទួលប្រាក់</span></a>
					            </li>
					            <li class="" id="cashier-deposit-id"><a href="#tab3-2" class="glyphicons credit_card" data-toggle="tab"><i></i><span class="strong">ដាក់ប្រាក់</span><span>ដាក់ប្រាក់</span></a>
					            </li>
					            <li class="" id="cashier-transfer-id"><a href="#tab4-2" class="glyphicons circle_ok" data-toggle="tab"><i></i><span class="strong">ផ្ទេរប្រាក់</span><span>ផ្ទេរប្រាក់</span></a>
					            </li>
					        </ul>
					    </div>
					    <!-- // Tabs Heading END -->

					    <div class="widget-body">
					        <div class="tab-content">
					            <!-- Tab content -->
					            <div class="tab-pane active" id="tab1-2">
					                <div class="row">
										<div class="span12">
											<div class="row-fluid">
												<div class="span4">
													<div class="innerAll padding-bottom-none-phone">
														<div class="widget-stats widget-stats-gray widget-stats-4"> 
															<span class="txt">វិក្កយបត្របង់រួច</span>
															<span class="count" data-bind="text: vendors.tInvToday"></span>
															<span class="glyphicons user"><i></i></span>
															<div class="clearfix"></div>
															<i class="icon-play-circle"></i> 
														</div>
													</div>
												</div>

												<div class="span4">
													<div class="innerAll padding-bottom-none-phone">
														<div class="widget-stats widget-stats-primary widget-stats-4">
															<span class="txt">បង់ប្រាក់ប្រចាំថ្ងៃ</span>
															<span class="count"><span data-bind="text: vendors.tAmtToday" style="font-size: 35px;">0៛</span></span>
															<span class="glyphicons coins"><i></i></span>
															<div class="clearfix"></div>
															<i class="icon-play-circle"></i>
														</div>
													</div>
												</div>

												<div class="span4">
													<div class="innerAll padding-bottom-none-phone">
														<a href="#/vendor_payment_report" class="widget-stats widget-stats-inverse widget-stats-4">
															<span class="txt">របាយការណ៍បង់ប្រាក់</span>
															<span class="glyphicons refresh"><i></i></span>
															<div class="clearfix"></div>
														</a>
													</div>
												</div>				
											</div>
										</div>
									</div>
									<div class="row">
										<div class="span12">
											<div id="exampleValidate" data-role="validator">
											 <!-- //End row-fluid -->
											<table class="table table-bordered table-striped innerL" data-bind="visible: show">
										        <thead>
										            <tr>
										                <th>បង់</th>
										                <th>កាលបរិច្ឆេទ</th>						                
										                <th>ឈ្មោះ</th>
										                <th>វិក្កយបត្រ</th>
										                <th>ទឹកប្រាក់</th>
										                <th class="right">បង់បាន</th>
										                <th class="right" width="110bb">ទទួលប្រាក់</th>							                
										            </tr>
										        </thead>
										        <tbody data-role="listview" data-auto-bind="false" 
										        	   data-template="payment-vednor-row-template" 
										        	   data-bind="source: vendors.tmp" 
										        	   class="k-widget k-listview"></tbody>						        
										    </table>
										</div>
										<div id="status"></div>
										<div class="innerL" data-bind="visible: show">
											<div class="span7">						
												<table>
													<tbody>
														<tr>
															<td style="width: 100px;">ថ្ងៃទទួល</td>
										              		<td>
										              			<input id="paymentDate" name="paymentDate" data-role="datepicker" data-bind="value: vendors.paymentDate" data-format="dd-MM-yyyy" required="" data-required-msg="ត្រូវការ ថ្ងៃទទួលប្រាក់" type="text" class="k-input">
															</td>
															<td>ទទួលប្រាក់សរុប:</td>
															<td align="right"><input type="text" data-bind="value: vendors.total" class="k-input k-textbox" style="width: 160px;" /></td>
														</tr>
											            </tr><tr>
															<td>គណនីសាច់ប្រាក់</td>
															<td>
																<input id="cashAccount" 
																	data-bind="source: vendors.cashAccount, value: vendors.account"  
																	data-required-msg="ត្រូវការ គណនីសាច់ប្រាក់" 
																	data-role="dropdownlist"
																	data-text-field="name",
																	data-value-field="id"
																	data-option-label="---រើសមួយ---"
																	style="display: none;">											
															</td>
															<td>សក្ខីប័ត្រចំណាយ:</td>
															<td align="right"><input type="text" data-bind="value: vendors.voucher" class="k-input k-textbox" style="width: 160px;" /></td>
														</tr>
														<tr>
															<td valign="top">ចំណាត់ថ្នាក់</td>
															<td valign="top"><select data-role="multiselect" 
														   		data-bind="source: vendors.classDS, value: segment, events: {change: vendors.changeValue}" 
														   		data-value-field="id" 
														   		data-text-field="name"
														   		data-placeholder="---រើសមួយ---"
														   		style="width: 160px" /></select>
														    </td>
															<td valign="top">ចំណាំ</td>
															<td colspan='3'>
																<textarea style="width: 150px;" name="" id="" cols="30" rows="5" data-bind="value: vendors.memo"></textarea>
															</td>
														</tr>										
													</tbody>
												</table>							
											</div>																			
											<div class="span4 pull-right">
												<div class="innerAll padding-bottom-none-phone" data-bind="click: vendors.makePayment">
													<a id="save" name="save" class="widget-stats widget-stats-info widget-stats-4">
														<span class="txt">ទឹកប្រាក់ទទួលបាន</span>
														<span class="count" style="font-size: 35px;" data-bind="text: vendors.total">៛</span>
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
					            <!-- // Tab content END -->

					            <!-- Tab content -->
					            <div class="tab-pane" id="tab2-2">
					                <div class="row-fluid">
										<div id="saveCashierCustomerValidate" class="span12">
											<div class="row-fluid">
												<div class="span4">
													<div class="innerAll padding-bottom-none-phone">
														<a href="javascript:void(0)" class="widget-stats widget-stats-gray widget-stats-4"> 
															<span class="txt">អតិថិជន</span>
															<span class="count" data-bind="text: vendors.total_customer"></span>
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
															<span class="count"><span data-bind="text: vendors.total_payment" style="font-size: 35px;"></span></span>
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
										        		data-template="cashier-row-dawine-template" 
										        		data-bind="source: customers.invoiceList"></tbody>
										        <tfoot data-template="cashier-footer-dawine-template" 
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
											              			data-bind="value: customers.payment_date" 
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
													                   data-bind="value: customers.payment_method_id,
													                              source: customers.paymentMethodDS"									                   
													                   required data-required-msg="ត្រូវការ វីធីបង់ប្រាក់" />						                  					                  		
										                  	</td>
										                <tr>
														<tr>
											                <td>លេខកូដសែក</td>
											                <td><input id="check_no" class="k-textbox" data-bind="value: customers.check_no" style="width: 161px;" /></td>
											            <tr>
											            <tr>
															<td>គណនីសាច់ប្រាក់</td>
															<td>
																<input id="ddlCashAccount" name="ddlCashAccount" 
																		data-bind="value: customers.cash_account_id" 
																		required data-required-msg="ត្រូវការ គណនីសាច់ប្រាក់" />												
															</td>
														</tr>										
													</table>							
												</div>																
												<div class="span4">
													<table>	
														<tr>
															<td>ទទួលប្រាក់សរុប:</td>
															<td align="right"><span data-bind="text: customers.pay_amount"></span></td>
														</tr>									
														<tr>
															<td>បញ្ចុះតំលៃ:</td>
															<td>
																<input data-role="numerictextbox" 
																		data-format="c0" data-culture="km-KH" 
																		data-bind="value: customers.discount, events: {change : customers.change}" />
															</td>
														</tr>
														<tr>
															<td>ទឹកប្រាក់ពិន័យ:</td>							
															<td>
																<input data-role="numerictextbox" 
																		data-format="c0" data-culture="km-KH" 
																		data-bind="value: customers.fine, events: {change : customers.change}" />
															</td>
														</tr>										
														<tr>
															<td>នៅខ្វះ</td>
															<td align="right"><span data-bind="text: customers.remain"></span></td>
														</tr>
													</table>		          	
												</div>

												<div class="span4">
													<div class="innerAll padding-bottom-none-phone">
														<a id="saveCashierCustomer" name="save" class="widget-stats widget-stats-info widget-stats-4">
															<span class="txt">ទឹកប្រាក់ទទួលបាន</span>
															<span class="count" style="font-size: 35px;" data-bind="text: customers.receive_amount"></span>
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
					            <!-- // Tab content END -->

					            <!-- Tab content -->
					            <div class="tab-pane" id="tab3-2">
					            	<div class="row-fluid">
					            		<div class="span6">
					            			<label for="voucher">លេខសក្ខីបត្រ័</label>
											<input type="text" style="width: 95%" data-bind="value: deposit.current.voucher" />
											<label for="from">ដាក់ទៅ</label>
											<input type="text" style="width: 98%" data-role="dropdownlist" data-bind="source: deposit.accounts, value: deposit.from.account" data-value-field="id" data-text-field="name" />
											<label for="description"​ style="margin-top: 10px">ពិពណ៏នា</label>
											<textarea style="width: 95%" name="" id="" cols="30" rows="3" data-bind="value: deposit.current.memo"></textarea>
											<button data-bind="click: deposit.save" class="btn btn-default btn-block">រក្សាទុក</button>
					            		</div>
					            		<div class="span6">
										<i class="icon-plus" data-bind="click: deposit.addEntry"></i>
										<ul style="list-style: none; padding: 5px; margin: 3px 0; width: 95%" class="striped" data-role="listview" data-bind="source: deposit.entries" data-template="entry-list"></ul>
					            		</div>
					            	</div>
					            </div>
					            <!-- // Tab content END -->

					            <!-- Tab content -->
					            <div class="tab-pane" id="tab4-2">
					            	<div class="row-fluid">
					            		<div class="span6">
					            			<label for="voucher">លេខសក្ខីបត្រ័</label>
											<input type="text" style="width: 95%" data-bind="value: transfer.current.voucher" />
											<label for="from">ពីគណនី</label>
											<input type="text" style="width: 98%" data-role="dropdownlist" data-bind="source:  transfer.accounts, value:  transfer.from.account" data-value-field="id" data-text-field="name" />
											<label for="description"​ style="margin-top: 10px">ពិពណ៏នា</label>
											<textarea style="width: 95%" name="" id="" cols="30" rows="3" data-bind="value:  transfer.current.memo"></textarea>
											<button data-bind="click: transfer.save" class="btn btn-default btn-block">រក្សាទុក</button>
					            		</div>
					            		<div class="span6">
											<i class="icon-plus" data-bind="click: transfer.addEntry"></i>
											<ul style="list-style: none; padding: 5px; margin: 0; width: 96%" class="stripe"data-role="listview" data-bind="source:  transfer.entries" data-template="entry-transfer-list"></ul>
					            		</div>
					            	</div>
					            </div>
						        <!-- // Tab content END -->
						    </div>
					    </div>
					</div>
				</div>					
			</div>	
		</div>
	</div>
</script>
<script id="cashier-transaction-row-dash-template" type="text/x-kendo-tmpl">
    <tr>        
        <td>#:kendo.toString(new Date(issued_date), "dd-MM-yy")#</td>
        <td>#:type# </td>
        <td align="right">#:kendo.toString(kendo.parseFloat(amount), "c", locale)#</td>        
   	</tr>
</script>
<script id="cashier-row-dawine-template" type="text/x-kendo-tmpl">		
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
<script id="cashier-footer-dawine-template" type="text/x-kendo-template">
    <tr>    	
        <td class="right" colspan="7" style="font-size:30px;">
            ប្រាក់ត្រូវបង់សរុប: #:customers.receive_amount#
        </td>
    </tr>
</script>
<script type="text/x-kendo-template" id="cashier-people-list-tmpl">
	<tr data-bind="click: onSelected">
	#if(company !== "") {#
		<td>#=company#</td>
	#} else {#
		<td>#=name#</td>
	#}#
	</tr>
</script>
<script type="text/x-kendo-template" id="cashier-deposit-tmpl">
	<div class="container-960">
		<div class="row">
			<div class="span4 offset4">
				<div class="widget">
					<div class="widget-head">
						<span class="btn btn-primary pull-right" data-bind='click: close'>X</span>
						<h4 class="heading glyphicons circle_info"><i></i> <a id="title">ដាក់ប្រាក់</a></h4>
					</div>
					<div class="widget-body">
						<label for="voucher">លេខសក្ខីបត្រ័</label>
						<input type="text" style="width: 95%" data-bind="value: current.voucher" />
						<i class="icon-plus" data-bind="click: addEntry"></i>
						<ul style="list-style: none; padding: 5px; margin: 0; width: 95%" class="stripe"data-role="listview" data-bind="source: entries" data-template="entry-list"></ul>
						<label for="from">ដាក់ទៅ</label>
						<input type="text" style="width: 98%" data-role="dropdownlist" data-bind="source: accounts, value: from.account" data-value-field="id" data-text-field="name" />
						<label for="description"​ style="margin-top: 10px">ពិពណ៏នា</label>
						<textarea style="width: 95%" name="" id="" cols="30" rows="3" data-bind="value: current.memo"></textarea>
						<button data-bind="click: save" class="btn-default btn-block">រក្សាទុក</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<script type="text/x-kendo-template" id="entry-list">
	<li>
	<div class="pull-right">
		<i class="icon-plus" data-bind="click: deposit.addEntry"></i><br/>
		<i class="icon-minus" data-bind="click: deposit.removeEntry"></i>
	</div>
	<label for="account">ពីគណនី</label>
	<input type="text" style="width: 98%" data-role="dropdownlist" data-bind="source: accounts, value: account" data-text-field="name" data-value-field="id" />
	<label for="amount">ចំនួន</label>
	<input type="text" data-bind="value: amount" />
	<label for="check">សែក</label>
	<input type="text" data-bind="value: check" />
	<label for="description">ពិពណ៏នា</label>
	<input type="text" data-bind="value: memo" />
	<label for="segment">ចំណាត់ថ្នាក់</label>
	<select data-role="multiselect" style="width: 220px" 
		   data-bind="source: deposit.segments, value: segment, events: {change: deposit.changeValue}" 
		   data-value-field="id" 
		   data-text-field="name"
		   data-placeholder="select"
		   data-item-template="class-list-tmpl"
		   data-auto-bind=false
		   style="width: 220px" /></select>
	</li>
</script>
<script type="text/x-kendo-template" id="cashier-transfer-tmpl">
	<div class="container-960">
		<div class="row">
			<div class="span4 offset4">
				<div class="widget">
					<div class="widget-head">
						<span class="btn btn-primary pull-right" data-bind='click: close'>X</span>
						<h4 class="heading glyphicons circle_info"><i></i> <a id="title">ផ្ទេរប្រាក់</a></h4>
					</div>
					<div class="widget-body">
						<label for="voucher">លេខសក្ខីបត្រ័</label>
						<input type="text" style="width: 95%" data-bind="value: current.voucher" />
						<label for="from">ពីគណនី</label>
						<input type="text" style="width: 98%" data-role="dropdownlist" data-bind="source: accounts, value: from.account" data-value-field="id" data-text-field="name" />
						<label for="description"​ style="margin-top: 10px">ពិពណ៏នា</label>
						<textarea style="width: 95%" name="" id="" cols="30" rows="3" data-bind="value: current.memo"></textarea>
						<i class="icon-plus" data-bind="click: addEntry"></i>
						<ul style="list-style: none; padding: 5px; margin: 0; width: 96%" class="stripe"data-role="listview" data-bind="source: entries" data-template="entry-transfer-list"></ul>
						<button data-bind="click: save" class="btn-default btn-block">រក្សាទុក</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<script type="text/x-kendo-template" id="entry-transfer-list">
	<li>
	<div class="pull-right">
		<i class="icon-plus" data-bind="click:  transfer.addEntry"></i><br/>
		<i class="icon-minus" data-bind="click:  transfer.removeEntry"></i>
	</div>
	<label for="account">ទៅគណនី</label>
	<input type="text" style="width: 220px" data-role="dropdownlist" data-bind="source:  transfer.accounts, value: account" data-text-field="name" data-value-field="id" />
	<label for="amount">ចំនួន</label>
	<input type="text" data-bind="value: amount" />
	<label for="check">សែក</label>
	<input type="text" data-bind="value: check" />
	<label for="description">ពិពណ៏នា</label>
	<input type="text" data-bind="value: memo" />
	<label for="segment">ចំណាត់ថ្នាក់</label>
	<select data-role="multiselect" style="width: 220px" 
		   data-bind="source:  transfer.segments, value: segment, events: {change:  transfer.changeValue}" 
		   data-value-field="id" 
		   data-text-field="name"
		   data-placeholder="select"
		   data-item-template="class-list-tmpl"
		   data-auto-bind=false
		   style="width: 220px" /></select>
	</li>
</script>
<script type="text/x-kendo-template" id="accounting-page-template">
	<div class="container-960">
		<div class="row">
			<div class="span10 offset1">
				<div class="widget">
					<div class="widget-head">
						<span class="btn btn-primary pull-right" data-bind='click: close'>X</span>
						<h3 class="heading">គណនី</h3>
					</div>
					<div class="widget-body" id="account-new-form">
						<table class="table">
							<tbody>
								<tr>
									<td>ប្រភេទ</td>
									<td><input type="text" data-role="combobox" class="span4"
										   data-bind="source: types, value: accounting.current.type, events: {change: onTypeChange}" 
										   data-text-field="name"
										   data-placeholder="ជ្រើសរើសមួយ"
										   name="cbAccountType" 
										   data-value-field="id" style="width: 220px;"
										   required data-required-msg="ត្រូវការ" /><br/>
										   <span class="k-invalid-msg" data-for="cbAccountType"></span>
										   </td>
									<td width="130">គណនីមេ</td>
									<td><input type="text" data-role="combobox" class="span4"
									       data-bind="source: coa, value: accounting.current.parentAccount" 
									       data-template="accounting-coa-template"
									       data-text-field="name" 
									       data-value-field="id" style="width: 220px;" /></td>
								</tr>
								<tr>
									<td>ឈ្មោះគណនី</td>
									<td><input type="text" data-bind="value: accounting.current.name" placeholder="ឈ្មោះគណនី" style="width: 220px;" /></td>
									<td>លេខកូដគណនី</td>
									<td><input type="text" data-bind="value: accounting.current.code" placeholder="លេខកូដគណនី" style="width: 207px;" /></td>
								</tr>
								<tr>
									<td>Account Name</td>
									<td><input type="text" data-bind="value: accounting.current.name_en" placeholder="Account Name" style="width: 220px;" /></td>
									<td>ពិពណ៏នា</td>
									<td><input type="text" data-bind="value: accounting.current.description" placeholder="ពិពណ៏នា" /></td>
								</tr>
								<tr>
									<td colspan="4">
										ប្រើសម្រាប់ប្រកាស់ពន្ធ <input type="checkbox" name="" id=""/>
									</td>
								</tr>
							</tbody>
						</table>
						<table class='table well' data-bind="visible: showCash">
							<tbody>
								<tr>
									<td width="130">ធនាគារ</td>
									<td><input style="width: 220px;" type="text" data-role="combobox" /></td>
									<td>លេខគណនីធនាគារ</td>
									<td><input type="text"/></td>
								</tr>
								<tr>
									<td>រូបិយប័ណ្ណ</td>
									<td><input style="width: 220px;" type="text" data-role="combobox" /></td>
									<td></td>
									<td></td>
								</tr>
							</tbody>
						</table>
						<div style="text-align: right">
							<button class="btn btn-primary" style="width: 220px;" data-bind="click: save">កត់ត្រាហើយកត់ថែម</button>
							<button class="btn btn-success" style="width: 220px;" data-bind="click: saveClose">កត់ត្រាហើយបិទ</button>
							<button class="btn btn-danger" style="width: 220px;" data-bind="click: close">បោះបង់</button>
						</div>							
					</div>
				</div>	
			</div>
		</div>
	</div>			
</script>
<script type="text/x-kendo-template" id="accounting-coa-template">
	#=code# - #=name#
</script>
<script type="text/x-kendo-template" id="grn-form-template">
	<div class="container-960">
		<div class="row">
			<div class="span12">
				<div class="widget">
					<div class="ribbon-wrapper" style="z-index: 999999;"><div class="ribbon default"><span data-bind="text: ribbon"></span></div></div>
					<div class="widget-head">	
						<h4 class="heading glyphicons notes"><i></i> លិខិតទទួលទំនេញ</h4>
					</div>
					<div class="widget-body">
						<div class="row">
							<div class="well span12" style="margin-left: 7px;">
								<table>
									<tr>
										<td width="150">រើសបញ្ជាទិញ</td>
										<td><input type="text" style="width: 220px;"
															   data-role="combobox" 
															   data-bind="source: poDS, 
															   			  value: current.invoice_number, 
															   			  events:{change: selectedPO},
															   			  disabled: disablePO" 
															   data-text-field="invoice_number" 
															   data-value-field="id"
															   data-min-length="4"
															   data-filter="startswith" /></td>
										<td width="200"></td>
										<td width="150">ចំណាត់ថ្នាក់</td>
										<td><select data-role="multiselect" 
										   data-bind="source: classDS, value: current.segment, events: {change: changeValue}" 
										   data-value-field="id" 
										   data-text-field="name"
										   data-placeholder="select"
										   style="width: 220px" /></select></td>
									</tr>
									<tr>
										<td width="150">អ្នកផ្គត់ផ្គង</td>
										<td><input type="text" data-bind="value: current.vendor.company" /></td>
										<td width="200"></td>
										<td width="150">កាលបរិច្ឆេទ</td>
										<td><input type="text" style="width: 220px;"
															   data-role="datepicker" 
															   data-bind="value: current.due_date" /></td>
									</tr>
									<tr>
										<td width="150">លេខសក្ខីបត្រ័</td>
										<td><input type="text" data-bind="value: current.voucher" /></td>
										<td width="200"></td>
										<td width="150"></td>
										<td></td>
									</tr>
								</table>
								<table class="table">
									<thead>
										<tr style="background-color: #000; color: #fff">
											<th width="25" style="text-align:center;"><i data-bind="click: addItem" class="icon-plus"></i></th>
											<th>រាយនាម</th>
											<th>ពិពណ៏នា</th>
											<th width="150">ចំនួនបញ្ជាទិញ</th>
											<th width="150">ចំនួនទទួល</th>
											<th>នៅសល់</th>
										</tr>
									</thead>
									<tbody data-role="listview" data-bind="source: itemDS" 
										   data-template="grn-item-list-template"
										   data-auto-bind=false></tbody>
									<tfoot>
										<tr>
											<td colspan="3" style="text-align:right;">ចំនួនសរុបៈ</td>
											<td><span data-bind="text: totalQty"></span></td>
										</tr>
									</tfoot>
								</table>
								<div class="span12" style="text-align: center; padding-bottom: 10px;">
									<span class="btn btn-icon btn-primary glyphicons circle_ok"  data-bind="click: save"><i></i>កត់ត្រា</span>
									<span class="btn btn-icon btn-default glyphicons ban" data-bind="click: close">បោះបង់</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<script type="text/x-kendo-template" id="grn-item-list-template">
	<tr>
		<td>
			<i data-bind="click: addItem" class="icon-plus"></i>
			<i data-bind="click: removeItem" class="icon-minus"></i>
		</td>
		<td width="250"><input type="text" style="width: 250px;" data-role="dropdownlist" data-bind="source: items, value: item" data-text-field="name" data-value-field="id" /></td>
		<td><input type="text" data-bind="value: item.description" /></td>
		<td><span data-bind="text: unit"></span></td>
		<td><input type="text" style="width: 100px;" data-bind="value: unitReceipt, events: {change: total, blur: lineTotal}" /></td>
		<td><span data-bind="text: balance"></span></td>
	</tr>
</script>
<script type="text/x-kendo-template" id="test-template">
	<div class="widget">
		<div class="widget-head">
			<span class="btn btn-primary pull-right" data-bind="click: close">X</span>
			<h4 style="text-align: center">បញ្ជាទិញ</h4>
		</div>
		<div class="widget-body">
			<div
				data-role="grid"
				data-bind="source: billVM.ds"
				data-columns="['id', 'vendor', '&nbsp;', '&nbsp;']"
				data-row-template="po-list-center-template"
				data-auto-bind=false
				data-height="400px"
			></div>
		</div>
	</div>
</script>
<script type="text/x-kendo-template" id="po-list-center-template">
	<tr>
		<td>#=id#</td>
		<td>#=vendor.company#</td>
		<td>
			#if(status !== 'partial' || status == 'open') {#
				<a href="\#/grn/#:id#/po"><button class="btn btn-primary"><i class="icon-check-empty"></i> GRN</button></a>
			#} else {#
				<button class="btn btn-default"><i class="icon-check"></i> GRN</button>
			#}#
		</td>
		<td>
			#if(status === 'partial' || status == 'open') {#
				<a href="\#/purchase/#:id#/po"><button class="btn btn-primary"><i class="icon-check-empty"></i> Bill</button></a>
			#} else {#
				<button class="btn btn-default"><i class="icon-check"></i> Bill</button>
			#}#
		</td>
	</tr>
</script>
<script type="text/x-kendo-template" id="purchase-return-template">
	<div class="container-960">
		<div class="row">
			<div class="span12">
				<div class="widget">
					<div class="widget-head">
						<button class="pull-right btn btn-primary">X</button>
						<h3 style="margin-left: 15px; font-size: 14pt">លិខិតសងទំនេញ</h3>
					</div>
					<div class="widget-body">
						<div class="row">
							<div class="span6 offset4">
								លេខវិក្កយប័ត្រ <div class="input-append">
								  <input class="span12" data-bind="value: keyword" type="text">
								  <button class="btn" type="button" data-bind="click: search"><i class="icon-search"></i></button>
								</div>
							</div>
						</div>
						<div class="row" style="padding: 5px;" data-bind="visible: hasData">
							<div class="span12">
								<div class="well">
									<table class="table table-white">
										<tbody>
											<tr>
												<td width="150">អ្នកផ្គត់ផ្គង</td>
												<td wdith="230"><span data-bind="text: current.vendor.company"></span></td>
												<td width="150">លេខវិក្កយប័ត្រ</td>
												<td wdith="230"><span data-bind="text: current.invoice_number"></span></td>
											</tr>
											<tr>
												<td>លេខវិក្កយប័ត្រ</td>
												<td><span data-bind="text: current.voucher"></span></td>
												<td>ចំនួន</td>
												<td><select data-role="multiselect" 
												   data-bind="source: classDS, value: current.segment" 
												   data-value-field="id" 
												   data-text-field="name"
												   data-placeholder="select" /></select>
											   </td>
											</tr>
											<tr>
												<td colspan="4" style="text-align: center"><span data-bind="text: status"></span></td>
											</tr>
											
										</tbody>
									</table>
								</div>
								<div style="width: 100%; text-align:center;">
									<input type="text" data-role="dropdownlist" data-bind="source: accounts, value: cashAC, visible: useCash" data-text-field="name" data-value-field="id" />
								</div><br/>
								<table class="table table-striped table-bordered">
									<thead>
										<tr>
											<th>ទំនិញ</th>
											<th>ពិពណ៏នា</th>
											<th>ចំនួន</th>
											<th>តំលៃ</th>
											<th>ទឹកប្រាក់</th>
											<th>សង់</th>
											<th>ពន្ធអាករ</th>
										</tr>
									</thead>
									<tbody data-role="listview" 
										   data-bind="source: prData" 
										   data-template="purchase-return-list-template"
										   data-auto-bind=false></tbody>
									<tfoot>
										<tr>
											<td colspan="7" style="text-align:center">
												<button class="btn" style="width: 100px;" data-bind="invisible: isOpen, click: refund">Refund</button>
												<button class="btn" style="width: 100px;" data-bind="invisible: isOpen, click: offset">Offset</button>
												<button class="btn" style="width: 100px;" data-bind="visible: isOpen, click: save">ប្រគល់ទំនេញ</button>
											</td>
										</tr>
									</tfoot>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<script type="text/x-kendo-template" id="purchase-return-list-template">
	<tr>
		<td>#=item.name#</td>
		<td>#=item.description#</td>
		<td>#=unit#</td>
		<td>#=cost#</td>
		<td>#=total#</td>
		<td><input type="text" data-bind="value: back, events: {change: check}" /></td>
		<td>
			#if(isTaxed === true) {#
				<i class="icon-check"></i>
			#} else {#
				<i class="icon-check-empty"></i>
			# } #
		</td>
	</tr>
</script>
<!-- Accounting Section Ends -->
<script type="text/x-kendo-template" id="companySettingsListView">
	<div class="container-960">
		<div class="row">
			<div class="span3 pull-right">
				<button class="btn btn-block" style="margin-bottom: 5px;" data-bind="click: add">បង្កើត</button>
			</div>	
		</div>
		<div class="row">
			<div class="span12">
				<div class="table table-stripe" data-role="grid"
					 data-bind="source: dataStore"
					 data-columns="[
					    {title: 'Logo'},
					 	{title: 'ឈ្មោះ'},
					 	{title: 'ឈ្មោះផ្លូវច្បាប់'},
					 	{title: 'លេខទូស័ព្ទ'},
					 	{title: 'អ៉ីម៉ែល'},
					 	{title: 'អាស័យដ្ថាន'},
					 	{title: 'ក្រុមហ៊ុនមេ'},
					 	{title: 'ក្រុមហ៊ុនមេ'},
					 	{title: 'លំអិត', width: '50px'}
					 ]"
					 data-row-template="companySettingsListRowView"></div>
			</div>
		</div>
	</div>
</script>
<script type="text/x-kendo-template" id="companySettingsListRowView">
	<tr>
		<td><img src=".#=logo#" alt=""/></td>
		<td>#=name#</td>
		<td>#=legal_name#</td>
		<td>#=phone#</td>
		<td>#=email#</td>
		<td>#=address#</td>
		<td>
			#if(main === "true") {# 
				<i class="icon-check-sign"></i>
			#} else {# 
				<i class="icon-check-empty"></i>
			#}#  
		</td>
		<td>#=currency.code#</td>
		<td>
			<a href="\#/admin/company/#=id#"><i class="icon-tasks"></i></a></td>
	</tr>
</script>
<script type="text/x-kendo-template" id="companySettingsView">
	<div class="container-960">
		<div class="row">
			<div class="span5 widget offset4">
				<div class="widget-head">
					<button class="btn btn-primary pull-right" data-bind="click: closed">X</button>
					<h3 style="font-size: 10pt; padding-left: 10px">ពតមានក្រុមហ៊ុន</h3>
				</div>
				<div class="widget-body">
					<table class="table">
						<tbody>
							<tr>
								<td>ឈ្មោះ</td>
								<td><input type="text" data-bind="value: current.name" /></td>
							</tr>
							<tr>
								<td>ឈ្មោះផ្លូវច្បាប់</td>
								<td><input type="text" data-bind="value: current.legal_name" /></td>
							</tr>
							<tr>
								<td>អ៉ីម៉ែល</td>
								<td><input type="text" data-bind="value: current.email" /></td>
							</tr>
							<tr>
								<td>ទូរស័ព្ទ</td>
								<td><input type="text" data-bind="value: current.phone" /></td>
							</tr>
							<tr>
								<td>អាស័យដ្ថាន</td>
								<td><input type="text" data-bind="value: current.address" /></td>
							</tr>
							<tr>
								<td>ឆ្នាំប្ងកើត</td>
								<td><input type="text" data-bind="value: current.year_founded" /></td>
							</tr>
							<tr>
								<td>អាញ្ញាប័ន្ត</td>
								<td><input type="text" data-bind="value: current.operation_license" /></td>
							</tr>
							<tr>
								<td>លេខពន្ធអាករ</td>
								<td><input type="text" data-bind="value: current.vat_no" /></td>
							</tr>
							<tr>
								<td>រូបិយប័ណ្</td>
								<td><input type="text" style="width: 220px;" data-role="dropdownlist"
										   data-bind="source: currency, value: current.currency" 
										   data-text-field="code"
										   data-value-field="id"
										   data-option-label="..." /></td>
							</tr>
							<tr>
								<td>គណនីអ្នកផ្គត់ផ្គង</td>
								<td><input type="text" style="width: 220px;" data-role="dropdownlist"
										   data-bind="source: apDS, value: current.ap_account" 
										   data-text-field="name"
										   data-value-field="id"
										   data-option-label="..." /></td>
							</tr>
							<tr>
								<td>គណនីអតិថិជន</td>
								<td><input type="text" style="width: 220px;" data-role="dropdownlist"
										   data-bind="source: arDS, value: current.ar_account" 
										   data-text-field="name"
										   data-value-field="id"
										   data-option-label="..." /></td>
							</tr>
							<tr>
								<td>គណនីសាច់ប្រាក់</td>
								<td><input type="text" style="width: 220px;" data-role="dropdownlist"
										   data-bind="source: cashDS, value: current.cash_account" 
										   data-text-field="name"
										   data-value-field="id"
										   data-option-label="..." /></td>
							</tr>
							<tr>
								<td>លក្ខ័ណ</td>
								<td><textarea data-bind="value: current.tos" name="" id="" cols="30" rows="10"></textarea></td>
							</tr>
							<tr>
								<td colspan="2">
									<button class="btn btn-primary" data-bind="click: save">រក្សាទុក</button>
									<button class="btn btn-primary" data-bind="click: cancel">បោះបង់</button>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</script>
<script type="text/x-kendo-template" id="accountingItem-template">
	<div class="container-960">
		<div class="row">
			<div class="widget">
				<div class="widget-head">
					<span class="btn btn-primary pull-right" data-bind="click: close">X</span>
					<h4 class="heading glyphicons circle_info"><i></i> <a id="title">បង្កើតបញ្ជីថ្មី</a> </h4>
				</div>
				<div class="widget-body">
					<div class="well">
						<div class="btn btn-primary" data-bind="click: add"><i class="icon-plus-sign"></i> បង្កើតបញ្ជីថ្មី</div>
						<div data-role='grid' 
							data-bind="source: dataSource" 
							data-columns="[{title: 'ឈ្មោះ'},{title: 'ពិពណ៏នា'},{title: 'ស្ថានភាព'}, {title: '&nbsp;'}]"
							data-row-template="accountingItem-list-template"
							data-auto-bind="false"></div>
					</div>				
					<div data-role="pager" data-bind="source: dataSource" data-page-size='true' data-refresh='true'></div>
				</div>			
			</div>
		</div>		
	</div>		
</script>

<script type="text/x-kendo-template" id="accountingItem-new-template">
	<div class="row">
		<div class="span4 offset4">
			<div class="widget">
			<div class="widget-head">
				<button class="pull-right btn btn-primary" data-bind="click: back">X</button>
				<span>បញ្ជីច្មី</span>
			</div>
			<div class="widget-body">
				<table class="table">
					<tbody>
						<tr>
							<td width="100">ឈ្មោះ</td>
							<td><input type="text" data-bind="value: current.name" /></td>
						</tr>
						<tr>
							<td>គណនី</td>
							<td><input type="text" data-role="combobox" 
								data-bind="source: accounts, value: current.inventory_account_id"
								data-text-field="name"
								data-value-primitive="true"
								data-value-field="id" /></td>
						</tr>
						<tr>
							<td>ពិពណ៏នា</td>
							<td><input type="text" data-bind="value: current.description" /></td>
						</tr>
						<tr>
							<td>ស្ថានភាព</td>
							<td><input type="checkbox"  data-bind="checked: current.status"/> សកម្ម</td>
						</tr>
					</tbody>
				</table>
				<button class="btn btn-primary" data-bind="click: save">រក្សាទុក</button>
				<button class="btn btn-warning" data-bind="click: cancel">បោះបង់</button>
			</div>
		</div>
		</div>
	</div>		
</script>
<script type="text/x-kendo-template" id="employee-template">
	<div data-bind="click: add" class="btn btn-primary"><i class="icon-plus"></i> បង្កើតបុគ្គលិកថ្មី</div>
	<table class="table">
		<thead>
			<tr>
				<th>នាមត្រកូល</th>
				<th>ឈ្មោះ</th>
				<th>តំណែង</th>
				<th></th>
			</tr>
		</thead>
		<tbody data-role="listview" data-bind="source: dataSource" data-template="employee-list-template" data-auto-bind=false></tbody>
	</table>
	<div data-role="pager" data-bind="source: dataSource"></div>
</script>
<script type="text/x-kendo-template" id="employee-list-template">
<tr>
	<td>#=surname#</td>
	<td>#=name#</td>
	<td>#=position#</td>
	<td>
		<span data-bind="click: edit" class="btn"><i class="icon-edit-sign"></i></span>
		<span data-bind="click: remove" class="btn"><i class="icon-remove-sign"></i></span>
	</td>
</tr>
</script>
<script type="text/x-kendo-template" id="employee-form-template">
	<div class="span4 offset3">
		<label for="user">User</label>
		<input type="text" placeholder="នាមត្រកូល" data-bind="value: current.surname"/>
		<label for="password">Password</label>
		<input type="text" placeholder="ឈ្មោះ" data-bind="value: current.name"/>
		<label for="password">Password</label>
		<input type="text" placeholder="តំណែង" data-bind="value: current.position"/><br />
		<button class="btn btn-success" data-bind="click: save">កត់ត្រា</button>
		<button class="btn btn-default" data-bind="click: cancel">Cancel</button>
	</div>
</script>

<!-- currency section -->
<script type="text/x-kendo-template" id="accounting-setting-template">
	<div class="widget widget-heading-simple widget-body-white">
		<div class="widget-head">
			<h2 class="heading">កំណត់ពត៌មានទូទៅ៖ គណនេយ្យ</h2>
		</div>
		<div class="widget-body">
			<div class="widget widget-tabs widget-tabs-double widget-tabs-vertical row-fluid row-merge widget-tabs-gray">

			    <!-- Tabs Heading -->
			    <div class="widget-head span3">
			        <ul>
			            <li class="active"><a href="#tab1-1" data-toggle="tab"><span>&nbsp;ស្តងដាររបាយការណ៍ហិរញ្ញវត្ថុ</span></a>
			            </li>
			            <li><a href="#tab2-1" data-toggle="tab"><i></i><span>&nbsp;កាលបរិច្ឆេទរាយការណ៍</span></a>
			            </li>
			            <li><a href="#tab3-1" data-toggle="tab"><i></i><span class="strong">&nbsp;ឯកតារូបិយវត្ថុសម្រាប់របាយការណ៍</span></a>
			            </li>
			            <li><a href="#tab4-1" data-toggle="tab"><i></i><span class="strong">&nbsp;លក្ខ៍ខ៍ណ្ឌរបស់តារាងគណនី</span></a>
			            </li>
			            <li><a href="#tab5-1" data-toggle="tab"><i></i><span class="strong">&nbsp;ចំណាត់ថ្នាក់ប្រតិបត្តិការ</span></a>
			            </li>
			            <li><a href="#tab6-1" data-toggle="tab"><i></i><span class="strong">&nbsp;តារាងធាតុតំនាងគណនី</span></a>
			            </li>
			        </ul>
			    </div>
			    <!-- // Tabs Heading END -->

			    <div class="widget-body span9">
			        <div class="tab-content">

			            <!-- Tab content -->
			            <div class="tab-pane active" id="tab1-1">
			                ស្តងដាររបាយការណ៍ហិរញ្ញវត្ថុដែលបានជ្រើសរើស
			                <div class="well">
			                	ស្តងដាររបាយការណ៍ហិរញ្ញវត្ថុទាក់ទងនឹងហិរញ្ញវត្ថុនៃកម្ពុជាសម្រាប់សគ្រាសធុនតូចនិងមថ្យម<br/>
			                	(Cambodian International Financial Reporting Standards for SMEs)
			                </div>
			                <p>
			                	សំគាល់៖ Banhji​ មិនធានាថាអ្នក​អាចបំពេញគ្រប់លក្ខ័ខណ្ឌដែលមាន​ចែងក្នុងស្តង់ដារខាងលើនេះ Banhji គ្រាន់តែផ្ដល់អោយទម្រង់របាយការណ័​ហិរញ្ញវត្ថុគំរូ
			                	ដែលផ្អែកតាមរបាយការណ៍ហិរញ្ញវត្ថុគំរូ​សំរាប់សហគ្រាសធុនតូចនិង​មធ្យម​របស់​ស្តងដាររបាយការណ៍​ហិរញ្ញវ្តុ​ទាក់ទង​នឹង​ហិរញ្ញវត្ថុ​អន្តរជាតិ​នៃកម្ពុជា​សមហរាប់​សហគ្រាសធុនតុច​និង​មធ្យម​
			                	ដែលបាន​បោះផ្សាយជាសាធារណៈដោយ​ក្រុមប្រឹក្សាជាតិគណនេយ្យ​នៅ​ឆ្នាំ​២០១៣។
			                </p>
			            </div>
			            <!-- // Tab content END -->

			            <!-- Tab content -->
			            <div class="tab-pane" id="tab2-1">
			            	<div class="well">
			            		កាលបរិច្ឆេទចាប់ផ្ដើម៖ <input type="text" data-role="datepicker" data-bind="enabled: editable,value: currentInstitute.financial_year" /> ពេលកំណត់រួចមិនអាចប្ដូរបានទេ។
			            	</div>
			            	<div class="well">
			            		កាលបរិច្ឆេទរាយការណ៍៖ <input type="text" data-role="datepicker" data-bind="value: currentInstitute.financial_report_date" /> សូមជ្រើសយកកាលបរិច្ឆេទចុងក្រោយនៃរបាយការណ៍។
			            	</div>
			            	<button class="btn btn-primary pull-right" data-bind="click: saveFinacialDate">កត់ត្រា</button>
			            </div>
			            <!-- // Tab content END -->

			            <!-- Tab content -->
			            <div class="tab-pane" id="tab3-1">
			                <div class="widget widget-heading-simple widget-body-gray">
			                	<div class="widget-head">
			                		<h2 class="heading">ឯកតារូបិយវត្ថុរបាយការណ៍៖&nbsp;<h3 class="heading" data-bind="text: currentInstitute.report_locale"></h3></h2>
			                	</div>
			                	<div class="widget-body">
			                		<div class="well" style="background-color: #999999; color: #ffffff">
			                			ឯកតារូបិយវត្ថុរប្រតិបត្តិការគោល៖ <span data-bind="text: currentInstitute.locale"></span> ពេលកំណត់រួចមិនអាចប្ដូរបានទេ
			                		</div>
			                		<button data-bind="click: currencies.addNew" class="btn btn-primary pull-right"><i class="icon-plus-sign"></i></button>
			                		<h3>តារាងអត្រាប្ដូរប្រាក់</h3>
			                		<table class="table table-borderless table-striped table-pricing-2">
			                			<thead>
			                				<tr>
			                					<th>កាលបរិច្ឆេទ</th>
			                					<th>រូបិយប័ណ្ណ</th>
			                					<th width="100">អត្រាប្ដូរប្រាក់</th>
			                					<th>ប្រភព</th>
			                					<th>របៀបបញ្ចូល</th>
			                					<th></th>
			                				</tr>
			                			</thead>
			                			<tbody data-role="listView" 
			                				   data-bind="source: currencies.dataSource"
			                				   data-edit-template="currency-list-edit-template"
			                				   data-template="currency-list-template"></tbody>
			                		</table>
			                		<div class="span5"
			                			 data-role="window"
			                			 data-actions="{}"
			                			 data-position="{top: '50%', left: '35%'}"
			                			 data-title="ទំរងរូបបិយវត្ថុ"
			                			 data-bind="visible: currencies.formVisible">
			                			 <table class="table">
			                			 	<tr>
			                			 		<td>កូដ៖</td>
			                			 		<td><input type="text" data-bind="value: currencies.current.code"></td>
			                			 	</tr>
			                			 	<tr>
			                			 		<td>ប្រទេស៖</td>
			                			 		<td><input type="text" data-bind="value: currencies.current.country"></td>
			                			 	</tr>
			                			 	<tr>
			                			 		<td>អត្រាប្រាក់</td>
			                			 		<td><input type="text" data-bind="value: currencies.current.rate"></td>
			                			 	</tr>
			                			 	<tr>
			                			 		<td>កូដតំណាង៖</td>
			                			 		<td><input type="text" data-bind="value: currencies.current.locale"></td>
			                			 	</tr>
			                			 	<tr>
			                			 		<td></td>
			                			 		<td><input type="checkbox" data-bind="checked: currencies.current.enabled" /> កំពុងប្រើប្រាស់</td>
			                			 	</tr>
			                			 </table>								
										<div class="edit-buttons pull-right">
									        <button class="k-button k-update-button" data-bind="click: currencies.saveClose"><span class="k-icon k-update"></span></button>
									        <button class="k-button k-cancel-button" data-bind="click: currencies.cancel"><span class="k-icon k-cancel"></span></button>
									    </div>
									</div>
			                	</div>
			                </div>
			            </div>
			            <!-- // Tab content END -->

			            <!-- Tab content -->
			            <div class="tab-pane" id="tab4-1">
			                សដសដស
			            </div>
			            <!-- // Tab content END -->
			            <!-- Tab content -->
			            <div class="tab-pane" id="tab5-1">
			                <div class="well">
								<a href="#/structure/new" class="btn btn-primary"> <i class="icon-plus"></i> បង្កើតថ្មី</a>
								<table class="table table-white">
									<thead>
										<tr style="background-color: #14385C; color: #ffffff">
											<td>ព៌ណនា</td>
											<td>ថ្ងៃបង្ើត</td>
											<td>ថ្ងៃកែ</td>
											<td>កំពុងប្រើ</td>
											<td></td>
										</tr>
									</thead>
									<tbody data-role="listview" 
										   data-bind="source: segments.dataStore" 
										   data-template="admin-structure-list-tmpl" 
										   data-selectable='true'></tbody>
								</table>
							</div>				
							<div data-role="pager" data-bind="source: dataStore" data-page-size='true' data-refresh='true'></div>
			            </div>
			            <!-- // Tab content END -->
			            <!-- Tab content -->
			            <div class="tab-pane" id="tab6-1">
			                <div class="well">
								<div class="btn btn-primary" data-bind="click: transactionItem.add"><i class="icon-plus-sign"></i> បង្កើតបញ្ជីថ្មី</div>
								<div data-role='grid' 
									data-bind="source: transactionItem.dataSource" 
									data-columns="[{title: 'ឈ្មោះ'},{title: 'ពិពណ៏នា'},{title: 'ស្ថានភាព'}, {title: '&nbsp;'}]"
									data-row-template="accountingItem-list-template"
									data-auto-bind=true></div>
							</div>				
							<div data-role="pager" data-bind="source: transactionItem.dataSource" data-page-size='true' data-refresh='true'></div>
			            </div>
			            <!-- // Tab content END -->

			        </div>

			    </div>
			</div>
		</div>
	</div>
</script>
<script type="text/x-kendo-template" id="accountingItem-list-template">
	<tr>
		<td>#=name#</td>
		<td>#=description#</td>
		<td>
		 #if(status === '1') {#
		 	សកម្ម
		 #} else {#
		 	អសកម្ម
		 #}#
		 </td>
		 <td>
		 	<div class="btn btn-primary" data-bind="click: getItem"><i class="icon-edit-sign"></i> កែ</div>​
		 	<div id="models-bootbox-confirm" class="btn btn-warning" data-bind="click: remove"><i class="icon-remove-sign"></i>​ លុប</div>​
		 </td>
	</tr>
</script>
<script type="text/x-kendo-template" id="currency-list-template">
	<tr>
		<td>#=updated_at#</td>
		<td>#=code#</td>
		<td>#:kendo.toString(rate, 'n')#</td>
		<td>df</td>
		<td>
			# if(update_method === 'automatic') {#
				ស្វាយប្រវត្តិ
			#} else {#
				វាយបញ្ចូល
			# } #
		</td>
		<td width="80">
			<div class="edit-buttons">
                <button class="k-button k-edit-button" data-bind='click:currencies.edit'><span class="k-icon k-edit"></span></button>
                <button class="k-button k-delete-button"><span class="k-icon k-delete"></span></button>
            </div>				
		</td>
	</tr>
</script>
<script type="text/x-kendo-template" id="currency-page-template">
	<h3>តារាងអត្រាប្ដូរប្រាក់</h3>
	<table class="table table-borderless table-striped table-pricing-2">
		<thead>
			<tr>
				<th>កាលបរិច្ឆេទ</th>
				<th>រូបិយប័ណ្ណ</th>
				<th width="100">អត្រាប្ដូរប្រាក់</th>
				<th>ប្រភព</th>
				<th>របៀបបញ្ចូល</th>
				<th></th>
			</tr>
		</thead>
		<tbody data-role="listView" 
			   data-bind="source: dataSource"
			   data-template="currency-page-list-template"></tbody>
	</table>
</script>
<script type="text/x-kendo-template" id="currency-page-list-template">
	<tr>
		<td>#=updated_at#</td>
		<td>#=code#</td>
		<td>#:kendo.toString(rate, 'n')#</td>
		<td>df</td>
		<td>
			# if(update_method === 'automatic') {#
				ស្វាយប្រវត្តិ
			#} else {#
				វាយបញ្ចូល
			# } #
		</td>
		<td width="80">
							
		</td>
	</tr>
</script>
<script type="text/x-kendo-template" id="currency-list-edit-template">
	<div class="product-view k-widget">
		<dl>
			<dd>fdsfsd</dd>
			<dd>dfdsf</dd>
			<dd><input type="text" datas-bind="value: rate" /></dd>
			<dd>df</dd>
			<dd>dsfdsf</dd>
		</dl>
		<div class="edit-buttons">
	        <a class="k-button k-update-button" href="\\#"><span class="k-icon k-update"></span></a>
	        <a class="k-button k-cancel-button" href="\\#"><span class="k-icon k-cancel"></span></a>
	    </div>
	</div>
</script>
<!-- end currency section -->
<script src="<?php echo base_url(); ?>resources/js/libs/localforage.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js"></script>
<script>
	var banhji = banhji || {};
	var baseUrl = "<?php echo base_url(); ?>"+'api/';
	banhji.token = null;
	localforage.config({
		driver: localforage.LOCALSTORAGE,
		name: 'userData'
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
			// pageSize: 100
		}),		
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
				window.location.assign("<?php echo base_url(); ?>home");
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
					entity = banhji.userManagement.getLogin().institute[0].name
				}
				
			} else {
				entity = false
			}
		}		
		return entity;
	}
	banhji.currency = kendo.observable({
		dataSource: dataStore(baseUrl + 'currencies'),
		getEnabled: function() {
			this.dataSource.filter({field: "enabled", operator: '', value: 'true'});
		},
		getAmount : function(currency) {
			var amount = 0;
			for(var i =0; i < this.dataSource.data().length; i++) {
				if(currency === this.dataSource.data()[i].locale) {
					amount = kendo.parseFloat(this.dataSource.data()[i].rate);
					break;
				}
			}
			return amount;
		},
		addNew 	  : function() {
			banhji.currency.dataSource.add({code: '', rate: 0.0, country: '', locale: '', update_method: 'manual', updated_at: null});
			var len = banhji.currency.dataSource.data().length;
			banhji.currency.setCurrent(banhji.currency.dataSource.at(len-1));
			banhji.currency.set('formVisible', true);
		},
		edit 	  : function(e) {
			e.data.set("update_method", 'manual');
			banhji.currency.setCurrent(e.data);
			banhji.currency.set('formVisible', true);	
		},
		del 	  : function(e) {},
		update 	  : function(e) {},
		cancel 	  : function() {
			banhji.currency.set('formVisible', false);
			if(banhji.currency.dataSource.hasChanges()) {
				banhji.currency.dataSource.cancelChanges();
			}
		},
		getRate   : function(from, to) {
			return from/to;
		},
		setCurrent : function(current) {
			this.set('current', current);
		},
		formVisible: false,
		saveClose	: function() {
			banhji.currency.dataSource.sync();
			banhji.currency.dataSource.bind('requestEnd', function(e){
				banhji.currency.set('formVisible', false);
			});
		},
		save: function() {}
	});
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
	banhji.people = kendo.observable({
		dataSource : new kendo.data.DataSource({
			transport: {
				read 	: {
					url: baseUrl + "people",
					type: "GET",
					headers: {
						"Entity": banhji.userManagement.getLogin() !== null ? banhji.userManagement.getLogin().institute[0].name:""
					},
					dataType: 'json'
				},
				create 	: {
					url: baseUrl + "people",
					type: "POST",
					headers: {
						"Entity": banhji.userManagement.getLogin() !== null ? banhji.userManagement.getLogin().institute[0].name:""
					},
					dataType: 'json'
				},
				update 	: {
					url: baseUrl + "people",
					type: "PUT",
					headers: {
						"Entity": banhji.userManagement.getLogin() !== null ? banhji.userManagement.getLogin().institute[0].name:""
					},
					dataType: 'json'
				},
				destroy : {
					url: baseUrl + "people",
					type: "DELETE",
					headers: {
						"Entity": banhji.userManagement.getLogin() !== null ? banhji.userManagement.getLogin().institute[0].name:""
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
	banhji.payment_option = kendo.observable({
		data : [
			{type: "cash", description: "សាច់ប្រាក់សុទ្ធ", selected: false},
			{type: "bank", description: "តាមធនាគារ", selected: false},
			{type: "check", description: "ចេញជាសែក", selected: false}
		]
	});
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
		salesData : new kendo.data.DataSource({
			transport: {
				read 	: {
					url: baseUrl + 'sales',
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
		// customers : banhji.customer.dataSource,
		expenseDS : new kendo.data.DataSource({
			transport: {
				read 	: {
					url: baseUrl + 'sales/expense',
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
		expense   : 0,
		customer  : new kendo.data.DataSource({
			transport: {
				read 	: {
					url: baseUrl + 'sales/top',
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
		equation  : new kendo.data.DataSource({
			transport: {
				read 	: {
					url: baseUrl + 'sales/equation',
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
					}
				}
			},
			schema 	: {
				data: 'results'
			}
		}),
		cash 	  : new kendo.data.DataSource({
			transport: {
				read 	: {
					url: baseUrl + 'sales/cash',
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
					}
				}
			},
			schema 	: {
				data: 'results'
			}
		}),
		companyInf: function() {
			var company = JSON.parse(localStorage.getItem('userData/user'));
			return company;
		},
		curDate   : function() {
			return Date();
		},
		cashBal   : 0,
		asset 	  : 0,
		liability : 0,
		equity 	  : 0,
	});
	/*********************
	* Accounting Section *
	**********************/
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
	banhji.trialBalance = kendo.observable({
		dataSource 			: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: baseUrl + 'accounts/tb',
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
			change: function(e) {
				var data = this.data();
				var dr = 0.00;
				var cr = 0.00;
				for(var i = 0; i < data.length; i++) {
					if(data[i].dr !== '') {
						dr += kendo.parseFloat(data[i].dr);
					}
					if(data[i].cr !== '') {
						cr += kendo.parseFloat(data[i].cr);
					}
				}

				banhji.trialBalance.set('tbDebit', dr);
				banhji.trialBalance.set('tbCredit', cr);
			}
			// pageSize: 100
		}),
		tbDebit 			: 0.00,
		tbCredit 			: 0.00,
		dateFrom 			: new Date(),
		dateTo 				: new Date(),
		back 				: function() {
			window.history.back(-1);
		},
		searchDate 			: function() {
			banhji.trialBalance.dataSource.filter({
				field: 'created_at',
				value: kendo.toString(banhji.trialBalance.dateTo, 'yyyy-MM-dd')
			});
		}
	});
	banhji.recurring = kendo.observable({
		dataSource 	: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: baseUrl + 'recurrings',
					type: "GET",
					dataType: 'json'
				},
				create 	: {
					url: baseUrl + 'recurrings',
					type: "POST",
					dataType: 'json'
				},
				update 	: {
					url: baseUrl + 'recurrings',
					type: "PUT",
					dataType: 'json'
				},
				destroy : {
					url: baseUrl + 'recurrings',
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
			serverPaging: true
			// pageSize: 100
		}),
		recurringDS : [
			{id: 'daily', name: 'Daily'},
			{id: 'weekly', name: 'Weekly'},
			{id: 'monthly', name: 'Monthly'},
		],
		count 		: 0,
		getCount 	: function() {
			banhji.recurring.dataSource.fetch(function(){
				var data = banhji.recurring.dataSource.data();
				banhji.recurring.set('count', data.length);
			});
		},
		addNew 		: function() {
			banhji.recurring.dataSource.insert(0, {
				name 	: null,
				type 	: null,
				recurring_number: null,
				date 	: null,
				items 	: null
			});
			banhji.recurring.set("current", banhji.recurring.dataSource.at(0));
		},
		remove 		: function(e) {
			banhji.recurring.dataSource.remove(e.data);
		},
		cancel 		: function() {
			if(banhji.recurring.dataSource.hasChanges()) {
				banhji.recurring.set('current', null);
				banhji.recurring.dataSource.cancelChanges();
			}			
		},
		save 		: function() {
			var dfd = $.Deferred();
			banhji.recurring.dataSource.sync();
			banhji.recurring.dataSource.bind('requestEnd', function(e){
				if(e.response.error === false) {
					dfd.resolve({type: e.type, results: e.response.results, success: 'done'});
				} else {
					dfd.reject({type: e.type, results: e.response.results, error: 'operation failed'});
				}
			});
			return dfd.promise();
		}
	});
	banhji.balanceSheet = kendo.observable({
		assetDS 	: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: baseUrl + 'accounts/asset',
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
			change: function(e) {
				var data = this.data();
				var amount = 0.00;
				var currentAsset = 0.00;
				var inventory = 0.00;
				var receivable = 0.00;
				for(var i = 0; i < data.length; i++) {
					for(var x = 0; x < data[i].accounts.length; x++) {
						amount += kendo.parseFloat(data[i].accounts[x].amount);
					}
					if(data[i].id !==10) {
						for(var x = 0; x < data[i].accounts.length; x++) {
							currentAsset += kendo.parseFloat(data[i].accounts[x].amount);
						}
					}
					if(data[i].id ===8) {
						for(var x = 0; x < data[i].accounts.length; x++) {
							inventory += kendo.parseFloat(data[i].accounts[x].amount);
						}
					}
					if(data[i].id === 7) {
						if(data[i].accounts.length > 0) {
							for(var x = 0; x < data[i].accounts.length; x++) {
								receivable += kendo.parseFloat(data[i].accounts[x].amount);
							}
						} else {
							receivable = 0.00;
						}
							
					}

				}

				banhji.balanceSheet.set('totalAsset', amount);
				banhji.balanceSheet.set('xAssetAmt', currentAsset);
				banhji.balanceSheet.set('inventoryAmt', inventory);
				banhji.balanceSheet.set('receivableAmt', receivable);
			}
			// pageSize: 100
		}),
		liabilityDS : new kendo.data.DataSource({
			transport: {
				read 	: {
					url: baseUrl + 'accounts/liability',
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
			change: function(e) {
				var data = this.data();
				var amount = 0.00;
				var currentLiability = 0.00;
				var payable = 0.00;
				for(var i = 0; i < data.length; i++) {
					for(var x = 0; x < data[i].accounts.length; x++) {
						amount += kendo.parseFloat(data[i].accounts[x].amount);
					}
					if(data[i].id !==16 && data[i].parent_id === 2) {
						for(var x = 0; x < data[i].accounts.length; x++) {
							currentLiablity += kendo.parseFloat(data[i].accounts[x].amount);
						}
					}
					if(data[i].id === 13) {
						for(var x = 0; x < data[i].accounts.length; x++) {
							payable += kendo.parseFloat(data[i].accounts[x].amount);
						}
					}
				}

				banhji.balanceSheet.set('totalLiabEq', amount);
				banhji.balanceSheet.set('xLiabilityAmt', currentLiability);
				banhji.balanceSheet.set('payableAmt', payable);
			}
			// pageSize: 100
		}),
		equityDS 	: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: baseUrl + 'accounts/equity',
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
			change: function(e) {
				var data = this.data();
				var dr = 0.00;
				var cr = 0.00;
				for(var i = 0; i < data.length; i++) {
					if(data[i].dr !== '') {
						dr += kendo.parseFloat(data[i].dr);
					}
					if(data[i].cr !== '') {
						cr += kendo.parseFloat(data[i].cr);
					}
				}

				banhji.trialBalance.set('tbDebit', dr);
				banhji.trialBalance.set('tbCredit', cr);
			}
			// pageSize: 100
		}),
		toDate 		: new Date(),
		back 				: function() {
			window.history.back(-1);
		},
		totalAsset 	: 0.00,
		totalLiabEq : 0.00,
		inventoryAmt: 0.00,
		payableAmt 	: 0.00,
		expenseAmt 	: 0.00,
		cosAmt 		: 0.00,
		saleAmt 	: 0.00,
		xLiabilityAmt: 0.00,
		xAssetAmt 	: 0.00,
		receivableAmt: 0.00,
		getXRatio 	: function() {
			if(banhji.balanceSheet.get('xLiabilityAmt') > 0) {
				return banhji.balanceSheet.get('xAssetAmt')/banhji.balanceSheet.get('xLiabilityAmt');
			} else {
				return 	0;
			}		
		},
		getQRatio 	: function() {
			if(banhji.balanceSheet.get('xLiabilityAmt') > 0) {
				return (banhji.balanceSheet.get('xAssetAmt') - banhji.balanceSheet.get('inventoryAmt'))/banhji.balanceSheet.get('xLiabilityAmt');
			} else {
				return 	0;
			}		
		},
		searchByDate: function() {
			banhji.balanceSheet.assetDS.filter({
				field: 'created_at',
				value: kendo.toString(banhji.balanceSheet.toDate, 'yyyy-MM-dd')
			});
			banhji.balanceSheet.liabilityDS.filter({
				field: 'created_at',
				value: kendo.toString(banhji.balanceSheet.toDate, 'yyyy-MM-dd')
			});
		}
	});
	banhji.incomeVM 	= kendo.observable({
		dataSource 	: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: baseUrl + 'accounts/income',
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
			change: function(e) {
				var data = this.data();
				var amount = 0.00;
				var currentAsset = 0.00;
				var inventory = 0.00;
				for(var i = 0; i < data.length; i++) {
					for(var x = 0; x < data[i].accounts.length; x++) {
						amount += kendo.parseFloat(data[i].accounts[x].amount);
					}
					// if(data[i].id !==10) {
					// 	for(var x = 0; x < data[i].accounts.length; x++) {
					// 		currentAsset += kendo.parseFloat(data[i].accounts[x].amount);
					// 	}
					// }
					// if(data[i].id ===8) {
					// 	for(var x = 0; x < data[i].accounts.length; x++) {
					// 		inventory += kendo.parseFloat(data[i].accounts[x].amount);
					// 	}
					// }

				}

				banhji.balanceSheet.set('amount', amount);
				// banhji.balanceSheet.set('xAssetAmt', currentAsset);
				// banhji.balanceSheet.set('inventoryAmt', inventory);
			}
		}),
		amount 		: 0.00
	});
	banhji.expenseVM	= kendo.observable({
		dataSource 	: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: baseUrl + 'accounts/expense',
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
			change: function(e) {
				var data = this.data();
				var amount = 0.00;
				var cogs = 0.00;
				var operatingExp = 0.00;
				for(var i = 0; i < data.length; i++) {
					for(var x = 0; x < data[i].accounts.length; x++) {
						amount += kendo.parseFloat(data[i].accounts[x].amount);
					}
					if(data[i].id ===21) {
						if(data[i].accounts.length >0) {
							for(var x = 0; x < data[i].accounts.length; x++) {
								cogs += kendo.parseFloat(data[i].accounts[x].amount);
							}
						} else {
							cogs = 0.00;
						}
							
					}
					if(data[i].id ===22) {
						for(var x = 0; x < data[i].accounts.length; x++) {
							operatingExp += kendo.parseFloat(data[i].accounts[x].amount);
						}
					}
				}

				banhji.balanceSheet.set('cogsAmt', cogs);
				banhji.balanceSheet.set('amount', amount);
				banhji.balanceSheet.set('operatingExp', operatingExp);
			}
		}),
		amount  	: 0.00,
		operatingExp: 0.00,
		cogsAmt 	: 0.00
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
	banhji.journal = kendo.observable({
		dataStore 	: dataStore(baseUrl + "journals"),
		entries 	: dataStore(baseUrl + "journals/entries"),
		contactStore: dataStore(baseUrl + "journals/contacts"),
		setCurrent 	: function(journal) {
			this.set('current', journal);
		},
		insert 		: function() {
			this.dataStore.insert(0,{
				reference: null,
				type: 'GL',
				memo: null
			});
			this.setCurrent(this.dataStore.data()[0]);
		},
		addEntry 	: function(entry) {
			this.entries.addNew(entry);
		},
		removeEntry : function(e) {
			this.entries.remove(e.data);
		},
		find 		: function(id) {
			this.dataStore.query({
				filter: { field: 'id', value: id },
				page: 1,
				pageSize: 100
			}).then(function(e){
				var data = banhji.journal.dataStore.data()[0];
				var id = 0;
				if(typeof data === 'undefined') {
					banhji.journal.entries.query({
						filter: {field: 'id', operator: '', value: 0},
						page: 1,
						pageSize: 100
					}).then(function(e){
						//
					});
				} else {
					banhji.journal.entries.query({
						filter: {field: 'id', operator: '', value: data.id},
						page: 1,
						pageSize: 100
					}).then(function(e){
						//
					});
				}	
			});
		},
		findAll 	: function() {
			this.dataStore.filter({field: 'deleted', value: 'false'});
		},
		findBy 		: function(arr) {
			this.dataStore.filter(arr);
		},
		getData 	: function() {
			return this.dataStore.data();
		},
		remove 		: function(model) {
			this.dataStore.remove(model);
			this.dataStore.sync();
			this.dataStore.bind('requestEnd', function(e){
				console.log(e.type);
			});
		},
		getAccount 	: function(id) {
			this.dataStore.query({
				filter: {field: 'id', value: id}
			}).then(function(e){
				banhji.acccount.set('current', banhji.dataStore.at(0));
			});
		},
		save 		: function() {
			var self = this, dfd = $.Deferred();
			this.dataStore.sync();
			this.dataStore.bind('requestEnd', function(e){
				var type = e.type;
				var results  = e.response.results;
				if(results) {
					dfd.resolve(results);
					if(type === 'create') {
						$.each(results, function(i, v){
							self.contactStore.add(
								{
									journal: v.id,
									contacts: [{ 
										id: banhji.userManagement.getLogin().id,
										action: 'creator'
									}]
								}
							);
						});						
						self.contactStore.sync();
					}
					if(type === 'update') {
						$.each(results, function(i, v){
							self.contactStore.add(
								{
									journal: v.id,
									contacts: [{ 
										id: banhji.userManagement.getLogin().id,
										action: 'updator'
									}]
								}
							);
						});		
						self.contactStore.sync();
					}
				} else {
					dfd.reject({error: true, msg:"problem with api call."});
				}
			});
			return dfd.promise();
		}
	});
	banhji.accounting = kendo.observable({
		accounts 	: banhji.account,
		types 		: dataStore(baseUrl + 'accounts/types'),
		entries 	: banhji.journalEntry,
		journal 	: banhji.journal,
		accountKeyId: null,
		balanceSheet: banhji.balanceSheet,
		recurring 	: banhji.recurring,
		transactionOccurred : 0,
		todayBalance: 0.00,
		totalAsset 	: 0.00,
		totalAntiAsset: 0.00,
		dateType: [
			'---',
			'ថ្អៃនេះ',
			'សប្ដាស៍នេះ',
			'ខែនេះ',
			'ឆ្នាំនេះ',
		],
		startDate: new Date(),
		endDate : new Date(),
		getTransaction: function() {
			var todayDate = new Date();
			var month = kendo.toString(todayDate, 'MM');
			var year = kendo.toString(todayDate, 'yyyy');
			banhji.journalEntry.dataStore.query({
				filter: [
					{field: 'created_at >=', operator: '', value: year + '-' + month + '-01'},
					{field: 'created_at <=', operator: '', value: kendo.toString(todayDate, 'yyyy-MM-dd')}
				],
				page: 1,
				pageSize: 100
			}).done(function(e) {
				banhji.accounting.set('transactionOccurred', banhji.journalEntry.dataStore.total());
			});
		},
		dateTypeSelect: function(e){
			var index = e.sender._oldIndex;
			var today = new Date();
			switch(index){
			case 0:
				break;
			case 1:
				this.set('startDate', today);
				this.set('endDate', today);				
			  	break;
			case 2:
				var first = today.getDate() - today.getDay(); 
				var last = first + 6;
				var firstDayOfWeek = new Date(today.setDate(first));
				var lastDayOfWeek = new Date(today.setDate(last));
				this.set('startDate', firstDayOfWeek);
				this.set('endDate', lastDayOfWeek);
			  	break;
			case 3:			  	
				var firstDayOfMonth = new Date(today.getFullYear(), today.getMonth(), 1);
				var lastDayOfMonth = new Date(today.getFullYear(), today.getMonth() + 1, 0);
				this.set('startDate', firstDayOfMonth);
				this.set('endDate', lastDayOfMonth);
			  	break;
			case 4:
			  	var firstDayOfYear = new Date(today.getFullYear(), 0, 1);
				var lastDayOfYear = new Date(today.getFullYear(), 11, 31);
				this.set('startDate', firstDayOfYear);
				this.set('endDate', lastDayOfYear);
			  	break;
			default:
				this.set('startDate',today);
				this.set('endDate', today);					  
			}
		},
		init 	 	: function() {
			var amount = 0.00;
			if(this.get('startDate') >= this.get('endDate')) {
				banhji.balanceSheet.assetDS.query({
					filter: {
						field: 'created_at',
						value: kendo.toString(banhji.accounting.get('endDate'), 'yyyy-MM-dd')
					},
					page: 1,
					pageSize:200
				}).then(function(){
					var data = banhji.balanceSheet.assetDS.data();
					var amount = 0.00;
					$.each(data, function(index, value) {
						$.each(value.accounts, function(i, v){
							amount += kendo.parseFloat(v.amount);
						});						
					});
					banhji.accounting.set('totalAsset', amount);
					banhji.balanceSheet.liabilityDS.query({
						filter:{
							field: 'created_at',
							value: kendo.toString(banhji.accounting.get('endDate'), 'yyyy-MM-dd')
						},
						page: 1,
						pageSize: 200
					}).then(function(){
						var data = banhji.balanceSheet.liabilityDS.data();
						var amount = 0.00;
						$.each(data, function(index, value) {
							$.each(value.accounts, function(i, v){
								amount += kendo.parseFloat(v.amount);
							});						
						});
						var asset = banhji.accounting.get('totalAsset');
						banhji.accounting.set('todayBalance', kendo.toString((asset - amount), 'c2'));
					});
				});
				this.recurring.getCount();
				this.getTransaction();
			} else {
				this.set('startDate', this.get('endDate'));
			}	
		},
		getBalance 	: function() {
			var asset = banhji.accounting.get('totalAsset');
			var liability = banhji.accounting.get('totalAntiAsset');
			console.log(kendo.parseFloat(asset));
		},
		dateChange: function(e) {
			// var dateSel = $('.dateSelect').kendoDropDownList().data('kendoDropDownList');
			// dateSel.select(0);	
			if(this.get('startDate') > this.get('endDate')) {
				this.set('startDate', new Date);
			}
		},
		find 		: function(){
			if(this.get('accountKeyId')) {
				this.accounts.dataStore.filter([
		 			{field: 'code', operator: '', value: this.get('accountKeyId')},
		 			{field: 'active', operator: '', value: 'true'}
		 		]);
			} else {
				this.accounts.dataStore.query({
					filter: [
			 			{field: 'id', operator: 'like', value: this.get('accountKeyId')},
			 			{field: 'active', operator: '', value: 'true'}
			 		],
			 		page: 1,
			 		pageSize: 100
		 		});
			}	
		},
		filter 		: function() {
			if(this.get('current')) {
				this.journal.entries.query({
					filter: [
						{field: 'account_id', operator: '', value: this.get('current').id},
						{field: 'created_at >=', operator: '', value: kendo.toString(this.get('startDate'), 'yyyy-MM-dd')},
						{field: 'created_at <=', operator: '', value: kendo.toString(this.get('endDate'), 'yyyy-MM-dd')}
					],
					page: 1,
					pageSize: 100
				});
			} else {
				this.journal.entries.query({
					filter: [
						{field: 'created_at >=', operator: '', value: kendo.toString(this.get('startDate'), 'yyyy-MM-dd')},
						{field: 'created_at <=', operator: '', value: kendo.toString(this.get('endDate'), 'yyyy-MM-dd')}
					],
					page: 1,
					pageSize: 100
				});
			}		
		},
		setCurrent 	: function(current) {
			this.set('current', current);
		},
		edit 		: function() {
			banhji.router.navigate('/accounts/u/edit');
		},
		newAccount 	: function() {
			this.accounts.add();
		},
		createAcct 	: function() {
			// this.accounts.save();
			banhji.account.dataStore.sync();
		},
		selected 	: function(e) {
			var selected = e.data;
			this.setCurrent(selected);
			this.journal.entries.query({
				filter: [
					{field: 'account_id', operator: '', value: selected.id},
					{field: 'created_at >=', operator: '', value: kendo.toString(this.get('startDate'), 'yyyy-MM-dd')},
					{field: 'created_at <=', operator: '', value: kendo.toString(this.get('endDate'), 'yyyy-MM-dd')}
				],
				page: 1,
				pageSize: 100
			}).done(function(e) {
				var data = banhji.accounting.journal.entries.data();
				banhji.accounting.set('transactionOccurred', banhji.accounting.journal.entries.total());
				var amount = data.length > 0 ? data[data.length - 1].balance : 0;
				banhji.accounting.set('todayBalance', kendo.toString(amount, 'c2'));
			});
		},
		findTxByAcct: function(keyword) {
		 	var keyType = typeof keyword;
		 	if(keyType === 'number') {
		 		banhji.journalEntry.dataStore.query({
		 			filter: {
		 				logic: 'account',
		 				filters: [{field: 'id', operator: '', value: keyword}]
		 			},
		 			page: 1,
		 			pageSize: 20
		 		});
		 	} else if(keyType === 'string') {
		 		// banhji.journalEntry.dataStore.filter([
		 		// 	{field: 'code', operator: '', value: keyword},
		 		// 	{field: 'name', operator: 'or', value: keyword},
		 		// 	{field: 'active', operator: '', value: 'true'}
		 		// ]);
		 	} else {
		 		throw "keyword must be either number or string";
		 	}
		}
	});
	banhji.accountingItem = kendo.observable({
		dataSource 		: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: baseUrl + "items/item",
					type: "GET",
					headers: {
						"Entity": getDB()
					},
					dataType: 'json'
				},
				create 	: {
					url: baseUrl + "items/item",
					type: "POST",
					headers: {
						"Entity": getDB()
					},
					dataType: 'json'
				},
				update 	: {
					url: baseUrl + "items/item",
					type: "PUT",
					headers: {
						"Entity": getDB()
					},
					dataType: 'json'
				},
				destroy : {
					url: baseUrl + "items/item",
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
			filter: {field: 'item_type_id', operator: '', value: 8},
			serverPaging: true,
			pageSize: 20
		}),
    	itemTypeDS 		: dataStore(baseUrl + "item_types"),
    	accounts 		: dataStore(baseUrl + "accounts"),
    	close 		: function() {
			window.history.back(-1);
			if(banhji.accountingItem.dataSource.hasChanges()) {
				banhji.accountingItem.dataSource.cancelChanges();
			}
		},
    	setCurrent 		: function(current) {
    		banhji.accountingItem.set('current', current);
    	},
    	back 			: function() {
    		var view = new kendo.View('#accountingItem-template', {model: banhji.accountingItem});
    		banhji.view.layout.showIn('#content', view);
    		banhji.accountingItem.dataSource.query({
				filter: {field: 'item_type_id', operator: '', value: 5},
				page: 1,
				pageSize: 100
			});
    	},
    	add 			: function() {
    		banhji.accountingItem.dataSource.insert(0, {
    			name: null,
    			company_id: null,
    			category_id: null,
    			measurement_id: null,
    			brand_id: null,
    			main_id: null,
    			supplier_code: null,
    			color_code: null,
    			cost: null,
    			on_hand: null,
    			order_point: null,
    			income_account_id: 0,
    			cogs_account_id: 0,
    			preferred_vendor_id: 0,
    			image_url: null,
    			favorite: null,
    			deleted: 'false',	
    			description: null,
    			item_type_id: 8,
    			inventory_account_id: null,
    			status: 1
    		});
    		banhji.accountingItem.setCurrent(banhji.accountingItem.dataSource.at(0));
    		var newView = new kendo.View('#accountingItem-new-template', {model: banhji.accountingItem});
			banhji.view.layout.showIn('#content', newView);
    	},
    	getItem 	: function(e) {
			this.setCurrent(e.data);
			if(e.data.status === '1') {
				e.data.set('status', true);
			} else {
				e.data.set('status', false);
			}
			var newView = new kendo.View('#accountingItem-new-template', {model: banhji.accountingItem});
			banhji.view.layout.showIn('#content', newView);
		},
		remove 		: function (e){
			bootbox.confirm("តើអ្នកពិតជាចង់លុបបញ្ជីន \'"+e.data.name+"\' មែនទេ?", function(result) 
			{
				if(result === true) {
					banhji.accountingItem.dataSource.remove(e.data);
					banhji.accountingItem.save();
				}
			});
		},
		cancel 		: function() {
			banhji.accountingItem.dataSource.cancelChanges();
			banhji.accountingItem.dataSource.query({
				filter: {field: 'item_type_id', operator: '', value: 5},
				page: 1,
				pageSize: 100
			});
			var view = new kendo.View('#accountingItem-template', {model: banhji.accountingItem});
    		banhji.view.layout.showIn('#content', view);
		},
    	save 		: function() {  		
    		banhji.accountingItem.dataSource.sync();
    		banhji.accountingItem.dataSource.bind('requestEnd', function(e){
    			if(e.type === 'destroy') {
    				bootbox.alert("កត់ត្រាបានសំរេច", function(result){});
    			} else if(e.type === 'create') {
    				bootbox.alert("បង្កើតបានសំរេច", function(result){});
    			}
    		});
    	}
	});
	banhji.gl 	= kendo.observable({
		entry 		: banhji.journalEntry,
		segments  	: banhji.segmentItem.ds,
		journalDS 	: dataStore(baseUrl + 'journals'),
		entries 	: [],
		classDS		: [],
		accountList : [],
		debit 		: 0.00,
		credit 		: 0.00,
		recurringVM : banhji.recurring,
		people 		: banhji.people,
		isRecurred 	: false,
		createRecurring: function() {
			if(this.get('isRecurred')) {
				this.recurringVM.addNew();
			} else {
				this.recurringVM.cancel();
			}			
		},
		types 		: [
			{id: 'adj', name: 'កែតតម្រូវ'},
			{id: 'opening_balance', name: 'សមតុល្យដើមគ្រា'},
			{id: 'closing_entry', name: 'សមតុល្យចុងគ្រា'},
			{id: 'reclassification', name: 'ប្ដូរចំណាត់ចថ្នាក់'},
			{id: 'accrual', name: 'ប្រតិបត្តិការបង្គរ'},
			{id: 'depreciation_amortization', name: 'កាត់រំលោះ'},
			{id: 'others', name: 'ផ្សេងៗ'}
		],
		close 		: function() {
			window.history.back(-1);
			this.entry.dataStore.cancelChanges();
			this.get('entries').splice(0, this.get('entries').length);
		},
		init 		: function() {
			if(banhji.gl.get('accountList').length === 0) {
				banhji.account.dataStore.query({
					filter: {field: 'active', operator: '', value: true},
					page: 1,
					pageSize: 500
				}).done(function(e){
					banhji.gl.set('accountList', banhji.account.dataStore.data());
				});
				console.log("check 2");
			}
			if(banhji.gl.get('classDS').length === 0) {
				this.segments.query({
					page 	: 1,
					pageSize: 500
				}).done(function(e){
					// $.each(banhji.gl.segments.data(), function(i, v) {
						banhji.gl.set('classDS', banhji.gl.segments.data());
					// });
				}).fail(function(e){
					console.log(e);
				});
			}
		},
		setCurrent 	: function(current) {
			this.set('current', current);
		},
		check 		: function(e) {
			if(e.data.debit > 0 && e.data.credit > 0) {
				alert("ឥណពន្ធ និង ឥណទាន មិនអាច មានតំលៃក្នុងជូរតែមួយទេ។");
			}
		},
		findGL 		: function(id) {
			this.entry.dataSource.query({
				filter: {}
			})
		},
		add 		: function() {
			this.entry.dataStore.insert(0,{
				reference: null,
				type: 'GL',
				voucher: '',
				issuedDate: kendo.toString(new Date(), 'yyyy-MM-dd'),
				memo: null,
				contact: {id: banhji.userManagement.getLogin().id, name: banhji.userManagement.getLogin().username},
				entries: null
			});
			this.setCurrent(this.entry.dataStore.at(0));
		},
		addEntry 	: function() {
			this.entries.push({
				memo 	: null,
				debit 	: 0.00,
				credit 	: 0.00,
				account : null,
				rate 	: 1,
				locale 	: 'km-KH',
				segment : null,
				contact : banhji.vendors.get('current')
			});
		},
		totalDebit 	: function() {
			var amount = 0;
			$.each(this.entries, function(i, v){
				if(v.debit > 0.00) {
					amount += kendo.parseFloat(v.debit);
				}
			});
			this.set('debit', amount);
			
			return amount;
		},
		totalCredit : function() {
			var amount = 0;
			$.each(this.entries, function(i, v){
				if(v.credit > 0.00) {
					amount += kendo.parseFloat(v.credit);
				}
			});
			this.set('credit', amount);
			
			return amount;
		},
		removeEntry : function(e){
			$.each(this.entries, function(i, v){
				if(v === e.data) {
					banhji.gl.entries.splice(i, 1);
					return false;
				}
			});
		},
		changeValue : function(e) {			
			var dataArr = e.data.segment;
			var lastIndex = dataArr.length - 1;
			if(dataArr.length > 1) {
				for(var i = 0; i < dataArr.length - 1; i++) {
					var current = dataArr[i];
					if(current.segment.id === dataArr[lastIndex].segment.id) {
						dataArr.splice(lastIndex, 1);
						break;
					}
				}
			}				
		},
		save 		: function() {
			if(this.entries.length === 0 || this.entries.length ===1) {
				alert("សូមពិនិត្យឡើងវិញ។");
			} else if(this.debit !== this.credit){
				alert("សូមពិនិត្យឡើងវិញលើផ្នែកឥណពន្ធនិងឥណទាន។");
			} else {
				var entries = [];
				$.each(this.entries, function(i, v){
					if(v.debit > 0) {
						entries.push({
							memo 	: v.memo,
							account : v.account,
							amount 	: v.debit,
							is_debit: true,
							rate 	: banhji.currency.getRate(banhji.index.companyInf().institute[0].locale),
							locale 	: banhji.index.companyInf().institute[0].locale,
							segment : v.segment,
							contact : v.contact,
							issuedDate: kendo.toString(banhji.gl.get('current').issuedDate, 'yyyy-MM-dd')
						});
					} else {
						entries.push({
							memo 	: v.memo,
							account : v.account,
							amount 	: v.credit,
							is_debit: false,
							rate 	: banhji.currency.getRate(banhji.index.companyInf().institute[0].locale),
							locale 	: banhji.index.companyInf().institute[0].locale,
							segment : v.segment,
							contact : v.contact,
							issuedDate: kendo.toString(banhji.gl.get('current').issuedDate, 'yyyy-MM-dd')
						});
					}
						
				});
				this.get('current').set('entries', entries);
				this.get('current').set('issuedDate', kendo.toString(banhji.gl.get('current').issuedDate, 'yyyy-MM-dd'));
				this.entry.save()
				.then(function(data){
					if(data.error === false) {
						if(data.type === 'create') {
							banhji.gl.get('entries').splice(0, banhji.gl.get('entries').length);
							banhji.gl.add();
							banhji.gl.addEntry();
							banhji.gl.addEntry();
							alert("កត់ត្រាបានសំរេច");
						} else if(data.type === 'update'  || res.results[0]) {
							alert("កត់ត្រាបានសំរេច");
						} else {
							alert("កត់ត្រាមិនបានសំរេច");
						}

						// if recurring
						if(banhji.gl.get('isRecurred')) {
							banhji.gl.recurringVM.get('current').set('name', 'gl');
							banhji.gl.recurringVM.get('current').set('type', data.result[0].type);
							var items = [];
							var res = data.result[0].entries;
							$.each(res, function(i, v){
								items.push({
									recurring_id: null,
									item: v.account,
									contact: v.contact,
									dr: v.is_debit === true ? v.amount : 0.00,
									cr: v.is_debit === false ? v.amount : 0.00
								});
							});
							banhji.gl.recurringVM.get('current').set('items', items);
							banhji.gl.recurringVM.save()
							.then(
								function(success){
									banhji.gl.recurringVM.set('current', null);
								},
								function(failure){});
						}
						banhji.gl.set('credit', 0);
						banhji.gl.set('debit', 0);
					} else {
						alert("កត់ត្រាមិនបានសំរេច");
					}
				});
			}
		},
		saveNClosed : function() {
			if(this.entries.length === 0 || this.entries.length ===1) {
				alert("សូមពិនិត្យឡើងវិញ។");
			} else if(this.debit !== this.credit){
				alert("សូមពិនិត្យឡើងវិញលើផ្នែកឥណពន្ធនិងឥណទាន។");
			} else {
				var entries = [];
				$.each(this.entries, function(i, v){
					if(v.debit > 0) {
						entries.push({
							memo 	: v.memo,
							account : v.account,
							amount 	: v.debit,
							is_debit: true,
							rate 	: banhji.currency.getRate(banhji.index.companyInf().institute[0].locale),
							locale 	: banhji.index.companyInf().institute[0].locale,
							segment : v.segment,
							contact : v.contact,
							issuedDate: kendo.toString(banhji.gl.get('current').issuedDate, 'yyyy-MM-dd')
						});
					} else {
						entries.push({
							memo 	: v.memo,
							account : v.account,
							amount 	: v.credit,
							is_debit: false,
							rate 	: banhji.currency.getRate(banhji.index.companyInf().institute[0].locale),
							locale 	: banhji.index.companyInf().institute[0].locale,
							segment : v.segment,
							contact : v.contact,
							issuedDate: kendo.toString(banhji.gl.get('current').issuedDate, 'yyyy-MM-dd')
						});
					}
						
				});
				this.get('current').set('entries', entries);
				this.get('current').set('issuedDate', kendo.toString(banhji.gl.get('current').issuedDate, 'yyyy-MM-dd'));
				this.entry.save()
				.then(function(data){
					if(data.error === false) {
						if(data.type === 'create') {
							banhji.gl.get('entries').splice(0, banhji.gl.get('entries').length);
							banhji.gl.add();
							banhji.gl.addEntry();
							banhji.gl.addEntry();
							alert("កត់ត្រាបានសំរេច");
						} else if(data.type === 'update'  || res.results[0]) {
							alert("កត់ត្រាបានសំរេច");
						} else {
							alert("កត់ត្រាមិនបានសំរេច");
						}

						// if recurring
						if(banhji.gl.get('isRecurred')) {
							banhji.gl.recurringVM.get('current').set('name', 'gl');
							banhji.gl.recurringVM.get('current').set('type', data.result[0].type);
							var items = [];
							var res = data.result[0].entries;
							$.each(res, function(i, v){
								items.push({
									recurring_id: null,
									item: v.account,
									contact: v.contact,
									dr: v.is_debit === true ? v.amount : 0.00,
									cr: v.is_debit === false ? v.amount : 0.00
								});
							});
							banhji.gl.recurringVM.get('current').set('items', items);
							banhji.gl.recurringVM.save()
							.then(
								function(success){
									banhji.gl.recurringVM.set('current', null);
								},
								function(failure){});
						}
						banhji.gl.close();
						banhji.gl.set('credit', 0);
						banhji.gl.set('debit', 0);
					} else {
						alert("កត់ត្រាមិនបានសំរេច");
					}
				});
			}
		}
	});
	banhji.billDS = new kendo.data.DataSource({
		transport: {
			read: {
				url: baseUrl + 'bills',
				type: "GET",
				dataType: "json"
			},
			create: {
				url: baseUrl + 'bills',
				type: "POST",
				dataType: "json"
			},
			update: {
				url: baseUrl + 'bills',
				type: "PUT",
				dataType: "json"
			},
			destroy: {
				url: baseUrl + 'bills',
				type: "DELETE",
				dataType: "json"
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
	banhji.vendorPmt = kendo.observable({
		close 	: function() {
			window.history.back(-1);
		},
		classDS : banhji.segmentItem.ds,
		pmtDS 	: dataStore(baseUrl+'payments'),
		ptmData : [],
		payments: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: baseUrl + 'payments/payment',
					type: "GET",
					headers: {
						"Entity": getDB(),
						"User": banhji.userManagement.getLogin() === null ? '':banhji.userManagement.getLogin().id
					},
					dataType: 'json'
				},
				create 	: {
					url: baseUrl + 'payments/payment',
					type: "POST",
					headers: {
						"Entity": getDB(),
						"User": banhji.userManagement.getLogin() === null ? '':banhji.userManagement.getLogin().id
					},
					dataType: 'json'
				},
				update 	: {
					url: baseUrl + 'payments/payment',
					type: "PUT",
					headers: {
						"Entity": getDB(),
						"User": banhji.userManagement.getLogin() === null ? '':banhji.userManagement.getLogin().id
					},
					dataType: 'json'
				},
				destroy : {
					url: baseUrl + 'payments/payment',
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
				data: function(response) {
					return [{meta: response.meta, results: response.results}];
				},
				total: 'count'
			},
			batch: true,
			serverFiltering: true,
			serverPaging: true,
			pageSize: 100
		}),
		changeValue : function(e) {			
			var dataArr = e.data.segment;
			var lastIndex = dataArr.length - 1;
			if(dataArr.length > 1) {
				for(var i = 0; i < dataArr.length - 1; i++) {
					var current = dataArr[i];
					if(current.segment.id === dataArr[lastIndex].segment.id) {
						dataArr.splice(lastIndex, 1);
						$('#status').addClass('alert');
						$('#status').html("<strong>អ្នកមិនអាចរើយយកចំណាត់ថាក់ក្នុងក្រុមតែមួយបានទេ។</strong");
						break;
					} else {
						$('#status').removeClass('alert');
						$('#status').html("");
					}
				}
			}
		},
		dateType: [
			'---',
			'ថ្អៃនេះ',
			'សប្ដាស៍នេះ',
			'ខែនេះ',
			'ឆ្នាំនេះ',
		],
		startDate: new Date(),
		endDate : new Date(),
		dateChange: function(e) {
			// var dateSel = $('.dateSelect').kendoDropDownList().data('kendoDropDownList');
			// dateSel.select(0);	
			// if(this.get('startDate') > this.get('endDate')) {
			// 	this.set('startDate', new Date);
			// }
			console.log(e);
		},
		dateTypeSelect: function(e){
			var index = e.sender._oldIndex;
			var today = new Date();
			switch(index){
			case 0:
				break;
			case 1:
				banhji.vendorPmt.set('startDate', today);
				banhji.vendorPmt.set('endDate', today);				
			  	break;
			case 2:
				var first = today.getDate() - today.getDay(); 
				var last = first + 6;
				var firstDayOfWeek = new Date(today.setDate(first));
				var lastDayOfWeek = new Date(today.setDate(last));
				banhji.vendorPmt.set('startDate', firstDayOfWeek);
				banhji.vendorPmt.set('endDate', lastDayOfWeek);
			  	break;
			case 3:			  	
				var firstDayOfMonth = new Date(today.getFullYear(), today.getMonth(), 1);
				var lastDayOfMonth = new Date(today.getFullYear(), today.getMonth() + 1, 0);
				banhji.vendorPmt.set('startDate', firstDayOfMonth);
				banhji.vendorPmt.set('endDate', lastDayOfMonth);
			  	break;
			case 4:
			  	var firstDayOfYear = new Date(today.getFullYear(), 0, 1);
				var lastDayOfYear = new Date(today.getFullYear(), 11, 31);
				banhji.vendorPmt.set('startDate', firstDayOfYear);
				banhji.vendorPmt.set('endDate', lastDayOfYear);
			  	break;
			default:
				banhji.vendorPmt.set('startDate',today);
				banhji.vendorPmt.set('endDate', today);					  
			}
		},
		findPmt : function() {
			banhji.vendorPmt.pmtDS.query({
				filter: [
					{field: 'created_at >=', operator: '', value: kendo.toString(banhji.vendorPmt.get('startDate'), 'yyyy-MM-dd')},
					{field: 'created_at <=', operator: '', value: kendo.toString(banhji.vendorPmt.get('endDate'), 'yyyy-MM-dd')},
					{field: 'type', operator: '', value: 'purchase'},
					{field: 'type', operator: 'or', value: 'expense'}
				],
				page: 1,
				pageSize: 200
			});
		},
		show 	: false,
		vendor 	: dataStore(baseUrl + "vendors"),
		cashAccount: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: baseUrl + "accounts",
					type: "GET",
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
			filter: {
				field: 'account_type_id', operator: 'where_in', value: [6]
			},
			serverPaging: true,
			pageSize: 20
		}),
		account : '',
		segment : null,
		currentV: '',
		voucher : '',
		tmp 	: [],
		billDS 	: banhji.billDS,
		vendorID: null,
		total 	: 0.00,
		findVendor : function() {
			banhji.vendorPmt.vendor.query({
				filter: {field: 'id', operator: '', value: banhji.vendorPmt.get('vendorID')},
				page: 1, 
				pageSize: 1
			}).then(function(e){
				if(banhji.vendorPmt.vendor.data().length > 0) {
					banhji.vendorPmt.set('show', true);
					banhji.vendorPmt.set('currentV', banhji.vendorPmt.vendor.data()[0]);
					banhji.vendorPmt.billDS.query({
						filter: [
							{field: 'type <>', operator: '', value: 'po'},
							{field: 'type <>', operator: '', value: 'grn'},
							{field: 'vendor_id', operator: '', value: banhji.vendorPmt.vendor.data()[0].id},
							{field: 'status <>', operator: '', value: 'closed'}
						],
						page: 1,
						pageSize: 100
					}).then(function(e){
						banhji.vendorPmt.set('tmp', []);
						var data = banhji.vendorPmt.billDS.data();
						$.each(data, function(i, v){
							banhji.vendorPmt.get('tmp').push({
								isPaid: false,
								due : v.due_date,
								vendor: {id: v.vendor.id, company: v.vendor.company},
								invoice: v.invoice_number,
								amountBilled: v.amount,
								paid: v.paid,
								amount: v.amount - v.paid,
								bill: {id: v.id},
								type: v.type
							});
						});
						banhji.vendorPmt.calcTotal();
						var today = new Date();
						banhji.vendorPmt.payments.query({
							filter: [
								{field: 'type', value: 'bill'},
								{field: 'contact_id', value: banhji.vendorPmt.vendor.data()[0].id}
							],
							page: 1,
							pageSize: 100
						}).then(function(e){
							// console.log(banhji.vendorPmt.payments.data());
							var data = banhji.vendorPmt.payments.data();
							var invNumber = 0, invAmount = 0;
							banhji.vendorPmt.set('tInvToday', data[0].meta.num);
							banhji.vendorPmt.set('tAmtToday', data[0].meta.todayAmount);
						});				
					});
				} else {
					banhji.vendorPmt.set('show', false);
				}				
			});	
		},
		tInvToday: 0,
		tAmtToday: 0,
		memo 	 : '',
		paymentDate : new Date(),
		todayPmt: function() {},
		calcTotal: function() {
			var amount = 0;
			$.each(banhji.vendorPmt.get('tmp'), function(i, v){
				if(v.isPaid === true) {
					amount += kendo.parseFloat(v.amount);
				}					
			});
			banhji.vendorPmt.set('total', amount);
		},
		refesh 	: function() {

		},
		tick 	: function(e) {
			banhji.vendorPmt.calcTotal();
		},
		makePayment: function() {
			$.each(banhji.vendorPmt.get('tmp'), function(i, v){
				if(v.isPaid === true) {
					banhji.vendorPmt.pmtDS.add({
						contact: v.vendor,
						cashier: {id: banhji.userManagement.getLogin().id, username: banhji.userManagement.getLogin().username},
						reference: {id: v.bill.id},
						type: v.type,
						amount: v.amount,
						discount: 0,
						fine: 0,
						rate 	: banhji.currency.getRate(banhji.index.companyInf().institute.locale),
						locale 	: banhji.index.companyInf().institute.locale,
						payment_date: banhji.vendorPmt.get('paymentDate')
					});
				}
			});
			banhji.vendorPmt.pmtDS.sync();
			banhji.vendorPmt.pmtDS.bind('requestEnd', function(e){
				// save to journal
				var today = new Date();
				var data  = banhji.vendorPmt.pmtDS.data();
				var entries = [];
				var amount = 0;

				for(var x = 0; x < data.length; x++) {
					amount += kendo.parseFloat(data[x].amount);
					entries.push({
						amount  : data[x].amount,
						memo 	: 'pmt-bill '+data[x].reference.id,
						is_debit: true,
						account : banhji.vendorPmt.get('currentV').ap,
						rate 	: banhji.currency.getRate(banhji.index.companyInf().institute.locale),
						locale 	: banhji.index.companyInf().institute.locale,
						contact : {
							id: banhji.vendorPmt.get('currentV').id,
							company: banhji.vendorPmt.get('currentV').company
						},
						segment : banhji.vendorPmt.get('segment'),
						issued_Date: banhji.vendorPmt.get('paymentDate')
					});
				}
					
				entries.push({
					amount  :  amount,
					memo 	: 'pmt',
					is_debit: false,
					account : {id: banhji.vendorPmt.get('account')},
					rate 	: banhji.currency.getRate(banhji.index.companyInf().institute.locale),
					locale 	: banhji.index.companyInf().institute.locale,
					contact : {
						id: banhji.vendorPmt.get('currentV').id,
						company: banhji.vendorPmt.get('currentV').company
					},
					segment : banhji.vendorPmt.get('segment'),
					issued_Date: banhji.vendorPmt.get('paymentDate')
				});
				banhji.journalEntry.addNew({
					reference: '',
					voucher: banhji.vendorPmt.get('voucher'),
					type: 'pmt',
					memo: banhji.vendorPmt.get('memo'),
					contact: {id: banhji.userManagement.getLogin().id, name: banhji.userManagement.getLogin().username},
					entries: entries,
					issued_Date: banhji.vendorPmt.get('paymentDate')
				});
				banhji.journalEntry.save().then(function(entry){
					banhji.vendorPmt.payments.query({
						filter: [
							{field: 'type', value: 'bill'},
							{field: 'contact_id', value: banhji.vendorPmt.vendor.data()[0].id}
						],
						page: 1,
						pageSize: 100
					}).then(function(e){
						// console.log(banhji.vendorPmt.payments.data());
						var data = banhji.vendorPmt.payments.data();
						var invNumber = 0, invAmount = 0;
						banhji.vendorPmt.set('tInvToday', data[0].meta.num);
						banhji.vendorPmt.set('tAmtToday', data[0].meta.todayAmount);
						$('#status').addClass('alert');
						$('#status').html("<strong>កត់ត្រាបានសំរេច។</strong>");
						setTimeout(function(){
							$('#status').removeClass('alert');
							$('#status').html("");
						}, 5000);
						banhji.vendorPmt.get('tmp').splice(0, banhji.vendorPmt.get('tmp').length);
					});	
				});
			});
		}
	});
	banhji.cashiers = {};
	// dawine section
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
	// dawine section end
	banhji.cashiers.deposit = kendo.observable({
		accounts 	: [],
		entry 		: banhji.journalEntry,
		segments  	: banhji.segmentItem.ds,
		entries 	: [],
		from 		: {
				memo 	: null,
				amount 	: 0.00,
				is_debit: true,
				account : null,
				rate 	: 1,
				locale 	: 'km-KH',
				segment : null,
				contact : null
		},
		changeValue : function(e) {			
			var dataArr = e.data.segment;
			var lastIndex = dataArr.length - 1;
			if(dataArr.length > 1) {
				for(var i = 0; i < dataArr.length - 1; i++) {
					var current = dataArr[i];
					if(current.segment.id === dataArr[lastIndex].segment.id) {
						dataArr.splice(lastIndex, 1);
						break;
					}
				}
			}		
		},
		init 		: function() {
			if(banhji.account.dataStore.data().length > 0) {
				// for(var i=0; i > banhji.account.dataStore.data().length; i++) {
				// 	if(banhji.account.dataStore.data()[i].type.id === 6) {
						banhji.cashiers.deposit.set('accounts', banhji.account.dataStore.data());
				// 	}
				// }
			} else {
				banhji.account.dataStore.query({
					filter: {field: 'active', operator: '', value: true},
					page: 1,
					pageSize: 500
				}).then(function(e){
					// for(var i=0; i < banhji.account.dataStore.data().length; i++) {
					// 	if(banhji.account.dataStore.data()[i].type.id === 6) {
							banhji.cashiers.deposit.set('accounts', banhji.account.dataStore.data());
					// 	}
					// }
				});
			}
		},
		close     : function() {
			window.history.back(-1);
			banhji.cashiers.deposit.entry.dataStore.cancelChanges();
			banhji.cashiers.deposit.set('entries', []);
		},
		setCurrent 	: function(current) {
			banhji.cashiers.deposit.set('current', current);
		},
		addJournal 	: function() {
			banhji.cashiers.deposit.entry.dataStore.insert(0,{
				reference: null,
				type: 'deposit',
				voucher: null,
				memo: null,
				contact: {id: banhji.userManagement.getLogin().id, name: banhji.userManagement.getLogin().username},
				entries: null
			});
			banhji.cashiers.deposit.setCurrent(this.entry.dataStore.at(0));
		},
		addEntry 	: function() {
			banhji.cashiers.deposit.entries.push({
				memo 	: null,
				amount 	: 0.00,
				is_debit: false,
				account : null,
				rate 	: banhji.currency.getRate(banhji.index.companyInf().institute.locale),
				locale 	: banhji.index.companyInf().institute.locale,
				segment : null,
				contact : banhji.vendors.get('current') !== null ? banhji.vendors.get('current'): null
			});
		},
		removeEntry : function(e) {
			for(var i = 0; i < banhji.cashiers.deposit.entries.length; i++) {
				if(banhji.cashiers.deposit.entries[i] === e.data) {
					banhji.cashiers.deposit.entries.splice(i,1);
					break;
				}
			}
		},
		save 		: function() {
			// var entries = [];
			// var amount = 0;
			// for(var i = 0; i<this.entries.length; i++) {
			// 	amount += kendo.parseFloat(this.entries[i].amount);
			// }
			// banhji.cashiers.deposit.get('from').set('memo', banhji.cashiers.deposit.get('current').memo);
			// banhji.cashiers.deposit.get('from').set('amount', amount);
			// entries.push(this.get('from'));
			// entries.push(this.entries);
			// banhji.cashiers.deposit.get('current').set('entries', entries);
			// if(entries.length > 1) {
			// 	banhji.cashiers.deposit.entry.save()
			// 	.then(function(data){
			// 		banhji.cashier.deposit.addJournal();
			// 		banhji.cashier.deposit.set('entries', []);
			// 	});
			// }
			console.log('kdslfs');
		}
	});
	banhji.cashiers.transfer= kendo.observable({
		accounts 	: [],
		entry 		: banhji.journalEntry,
		segments  	: banhji.segmentItem.ds,
		entries 	: [],
		from 		: {
				memo 	: null,
				amount 	: 0.00,
				is_debit: false,
				account : null,
				rate 	: 1,
				locale 	: 'km-KH',
				segment : null,
				contact : null
		},
		changeValue : function(e) {			
			var dataArr = e.data.segment;
			var lastIndex = dataArr.length - 1;
			if(dataArr.length > 1) {
				for(var i = 0; i < dataArr.length - 1; i++) {
					var current = dataArr[i];
					if(current.segment.id === dataArr[lastIndex].segment.id) {
						dataArr.splice(lastIndex, 1);
						break;
					}
				}
			}		
		},
		init 		: function() {
			if(banhji.account.dataStore.data().length > 0) {
				// for(var i=0; i > banhji.account.dataStore.data().length; i++) {
				// 	if(banhji.account.dataStore.data()[i].type.id === 6) {
						banhji.cashiers.transfer.set('accounts',banhji.account.dataStore.data());
				// 	}
				// }
			} else {
				banhji.account.dataStore.query({
					filter: {field: 'active', operator: '', value: true},
					page: 1,
					pageSize: 500
				}).then(function(e){
					// for(var i=0; i < banhji.account.dataStore.data().length; i++) {
					// 	if(banhji.account.dataStore.data()[i].type.id === 6) {
							banhji.cashiers.transfer.set('accounts',banhji.account.dataStore.data());
					// 	}
					// }
				});
			}
		},
		close     : function() {
			window.history.back(-1);
			banhji.cashiers.transfer.entry.dataStore.cancelChanges();
			banhji.cashiers.transfer.set('entries', []);
		},
		setCurrent 	: function(current) {
			banhji.cashiers.transfer.set('current', current);
		},
		addJournal 	: function() {
			banhji.cashiers.transfer.entry.dataStore.insert(0,{
				reference: null,
				type: 'transfer',
				voucher: null,
				memo: null,
				contact: {id: banhji.userManagement.getLogin().id, name: banhji.userManagement.getLogin().username},
				entries: null
			});
			banhji.cashiers.transfer.setCurrent(this.entry.dataStore.at(0));
		},
		addEntry 	: function() {
			banhji.cashiers.transfer.entries.push({
				memo 	: null,
				amount 	: 0.00,
				is_debit: true,
				account : null,
				rate 	: banhji.currency.getRate(banhji.index.companyInf().institute.locale),
				locale 	: banhji.index.companyInf().institute.locale,
				segment : null,
				contact : banhji.vendors.get('current') !== null ? banhji.vendors.get('current'): null
			});
		},
		removeEntry : function(e) {
			for(var i = 0; i < banhji.cashiers.transfer.entries.length; i++) {
				if(banhji.cashiers.transfer.entries[i] === e.data) {
					banhji.cashiers.transfer.entries.splice(i,1);
					break;
				}
			}
		},
		save 		: function() {
			var entries = [];
			var amount = 0;
			for(var i = 0; i<banhji.cashiers.transfer.entries.length; i++) {
				amount += kendo.parseFloat(banhji.cashiers.transfer.entries[i].amount);
			}
			banhji.cashiers.transfer.get('from').set('memo', banhji.cashiers.transfer.get('current').memo);
			banhji.cashiers.transfer.get('from').set('amount', amount);
			entries.push(banhji.cashiers.transfer.get('from'));
			entries.push(banhji.cashiers.transfer.entries);
			banhji.cashiers.transfer.get('current').set('entries', entries);
			if(entries.length > 1) {
				banhji.cashiers.transfer.entry.save()
				.then(function(data){
					banhji.cashier.transfer.addJournal();
					banhji.cashier.transfer.set('entries', []);
				});
			}
		}
	});
	banhji.cashiers.page = kendo.observable({
		people 		: banhji.people,
		key 		: "",
		deposit 	: banhji.cashiers.deposit,
		transfer 	: banhji.cashiers.transfer,
		vendors 	: banhji.vendorPmt,
		customers 	: banhji.cashier,
		show 		: function() {
			if(this.get('current')) {
				return true;
			} else {
				return false;
			}
		},
		// deposit 	: function() {
		// 	banhji.router.navigate('/cashier/u/deposit');
		// },
		// transfer 	: function() {
		// 	banhji.router.navigate('/cashier/u/transfer');
		// },
		vendor  	: function() {
			banhji.router.navigate('/payment/vendor');
		},
		customer 	: function() {
			banhji.router.navigate('/cashiers');
			//location.href = 'https://rith.local/banhji/app/?entity=db_banhji#/cashiers';
		},
		onSelected 	: function(e) {
			this.set('current', e.data);
			// console.log(e.data.type.parent_type);
			if(this.get('current').type.parent_type === "2") {
				$("#cashier-payment-id").siblings().removeClass('active');
				$("#cashier-payment-id").addClass('active');
				$("#tab1-2").siblings().removeClass('active');
				$("#tab1-2").addClass('active');
				this.vendors.vendor.query({
					filter: {field: 'id', operator: '', value: e.data.id},
					page: 1, 
					pageSize: 1
				}).then(function(e){
					if(banhji.vendorPmt.vendor.data().length > 0) {
						banhji.cashiers.page.set('show', true);
						// banhji.vendorPmt.set('currentV', banhji.vendorPmt.vendor.data()[0]);
						banhji.vendorPmt.billDS.query({
							filter: [
								{field: 'type', operator: 'where_not_in', value: 'po, grn'},
								{field: 'vendor_id', operator: '', value: banhji.cashiers.page.get('current').id},
								{field: 'status <>', operator: '', value: 'closed'}
							],
							page: 1,
							pageSize: 100
						}).then(function(e){
							banhji.vendorPmt.set('tmp', []);
							var data = banhji.vendorPmt.billDS.data();
							$.each(data, function(i, v){
								banhji.vendorPmt.get('tmp').push({
									isPaid: false,
									due : v.due_date,
									vendor: {id: v.vendor.id, company: v.vendor.company},
									invoice: v.invoice_number,
									amountBilled: v.amount,
									paid: v.paid,
									amount: v.amount - v.paid,
									bill: {id: v.id},
									type: v.type
								});
							});
							banhji.vendorPmt.calcTotal();
							var today = new Date();
							banhji.vendorPmt.payments.query({
								filter: 
									{field: 'contact_id', value: banhji.vendorPmt.vendor.data()[0].id}
								,
								page: 1,
								pageSize: 100
							}).then(function(e){
								// console.log(banhji.vendorPmt.payments.data());
								var data = banhji.vendorPmt.payments.data();
								var invNumber = 0, invAmount = 0;
								banhji.vendorPmt.set('tInvToday', data[0].meta.num);
								banhji.vendorPmt.set('tAmtToday', data[0].meta.todayAmount);
							});				
						});
					} else {
						banhji.cashiers.page.set('show', false);
					}				
				});
			} else {
				$("#cashier-receipt-id").siblings().removeClass('active');
				$("#cashier-receipt-id").addClass('active');
				$("#tab2-2").siblings().removeClass('active');
				$("#tab2-2").addClass('active');
				var vm = banhji.cashier;
				//vm.pageLoad(this.get('current').id);
				vm.loadInvoice(this.get('current').id, this.get('current').name);
				
				if(banhji.pageLoaded["cashier_rith"]==undefined){
					banhji.pageLoaded["cashier_rith"] = true;					          

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

			        var validator = $("#saveCashierCustomerValidate").kendoValidator().data("kendoValidator");
					var notification = $("#notification").kendoNotification({				    
					    autoHideAfter: 5000,
					    width: 300,				    
					    height: 50
					}).data('kendoNotification');

			        $("#saveCashierCustomer").click(function(e){				
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
		},
		findVendor  : function() {
			if(this.get('key') !== "") {
				this.people.dataSource.filter({field: 'id', operator: '', value: this.get('key')});	
			} else {
				this.people.dataSource.filter({field: 'id <>', operator: '', value: ''});
			}
		}
	});
	banhji.accountingSetting = kendo.observable({
		transactionItem 	: banhji.accountingItem,
		segments 			: banhji.segment,
		currencies 			: banhji.currency,
		entries 			: banhji.journalEntry,
		incomeGraphDS 		: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: baseUrl + 'accounts/netIncome',
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
				total: 'count',
				parse: function(response) {
					for(var i =0; i < response.results.length; i++) {
						switch(response.results[i].month) {
							case "January":
								response.results[i].month = 'មករា';
							break;
							case "February":
								response.results[i].month = 'កុម្ភៈ';
							break;
							case "March":
								response.results[i].month = 'មិនា';
							break;
							case "April":
								response.results[i].month = 'មេសា';
							break;
							case "May":
								response.results[i].month = 'ឧសភា';
							break;
							case "June":
								response.results[i].month = 'មិថុនា';
							break;
							case "July":
								response.results[i].month = 'កក្កដា';
							break;
							case "August":
								response.results[i].month = 'សីហា';
							break;
							case "September":
								response.results[i].month = 'កញ្ញា';
							break;
							case "October":
								response.results[i].month = 'តុលា';
							break;
							case "November":
								response.results[i].month = 'វិច្ឆការ';
							break;
							default:
								response.results[i].month = 'ធ្នូ';
						}
					}
					return response;
				}
			},
			batch: true,
			serverFiltering: true,
			serverPaging: true
		}),
		creditSaleDS 		: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: baseUrl + 'accounts/creditSale',
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
			change: function(e) {
				var data = this.data();
				var amount = 0.00;
				if(data.length > 0) {
					amount = data[0].amount;
				}
				banhji.accountingSetting.set('creditSaleAmount', amount);
			}
		}),
		inst 	 			: new kendo.data.DataSource({
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
			filter: {field: 'id', operator: '', value: banhji.userManagement.getLogin() !== null ? banhji.userManagement.getLogin().institute[0].id:""}
			// pageSize: 100
		}),
		dateFrom 			: new Date(),
		dateTo 				: new Date(),
		onDateChange 		: function() {
			if(this.get('dateTo') < this.get('dateFrom')) {
				this.set('dateTo', this.get('dateFrom'));
			}
		},
		recurring 			: banhji.recurring,
		back 				: function() {
			window.history.back(-1);
		},
		trialBalance 		: banhji.trialBalance,
		balanceSheet 		: banhji.balanceSheet,
		income 				: banhji.incomeVM,
		expense 			: banhji.expenseVM,
		currentInstitute 	: null,
		creditSaleAmount 	: 0.00,
		getGraph 			: function() {
			var data = {income: this.income.get('amount'), expense: this.expense.get('amount'), net: this.income.get('amount') - this.expense.get('amount')};
			$("#account-dash-graph").kendoChart({
                autoBind: false,
                dataSource: this.incomeGraphDS,
                title: {
                    text: "របាយការណ៍លទ្ធផល"
                },
                legend: {
                    position: "top"
                },
                series: [{
                    type: "column",
                    field: "income",
                    name: "ចំណូល",
                    color: "#00008e"
                }, {
                    type: "column",
                    field: "expense",
                    name: "ចំណាយ",
                    color: "#c00000"
                }, {
                    type: "line",
                    field: "net",
                    name: "ចំណេញ",
                    color: "#ff7f00"
                }],
                valueAxis: {
                    label: {
                    	format: "N0"
                    },
                    majorUnit: 100
                },
                categoryAxis: {
                    field: "month",
                    crosshair: {
                    	visible: true
                    }
                },
                tooltip: {
                	visible: true,
                	shared: false,
                	format: "N0"
                }
            });
		},
		searchByDate: function() {
			if(this.get('dateTo') >= this.get('dateFrom')) {
				banhji.balanceSheet.assetDS.filter({
					field: 'created_at',
					value: kendo.toString(banhji.accountingSetting.dateTo, 'yyyy-MM-dd')
				});
				banhji.balanceSheet.liabilityDS.filter({
					field: 'created_at',
					value: kendo.toString(banhji.accountingSetting.dateTo, 'yyyy-MM-dd')
				});
				banhji.incomeVM.dataSource.filter([
					{field: 'created_at >=',
					value: kendo.toString(banhji.accountingSetting.dateFrom, 'yyyy-MM-dd')},
					{field: 'created_at <=',
					value: kendo.toString(banhji.accountingSetting.dateTo, 'yyyy-MM-dd')}
				]);
				banhji.expenseVM.dataSource.filter([
					{field: 'created_at >=',
					value: kendo.toString(banhji.accountingSetting.dateFrom, 'yyyy-MM-dd')},
					{field: 'created_at <=',
					value: kendo.toString(banhji.accountingSetting.dateTo, 'yyyy-MM-dd')}
				]);
				banhji.accountingSetting.creditSaleDS.filter([
					{field: 'created_at >=',
					value: kendo.toString(banhji.accountingSetting.dateFrom, 'yyyy-MM-dd')},
					{field: 'created_at <=',
					value: kendo.toString(banhji.accountingSetting.dateTo, 'yyyy-MM-dd')}
				]);
				this.incomeGraphDS.filter([
					{field: 'created_at >=',
					value: kendo.toString(banhji.accountingSetting.dateFrom, 'yyyy-MM-dd')},
					{field: 'created_at <=',
					value: kendo.toString(banhji.accountingSetting.dateTo, 'yyyy-MM-dd')}
				]);
				this.getGraph();
				this.getROCE();
				this.getGPM();
				this.getNPM();
				this.getAssetTurnOver();
				this.getARCP();
				this.getInventoryTurnOver();
				this.getNumberSeven();
			} else {
				this.set('dateTo', this.get('dateFrom'));
			}				
		},
		getROCE 			: function() {
			var amount = 0.00;
			var PBIT = this.balanceSheet.get('receivableAmt') - this.expense.get('operatingExp');
			var x = this.balanceSheet.get('totalAsset') - this.balanceSheet.get('xLiabilityAmt');
			if(x > 0) {
				amount = PBIT/x;
			}
			return amount;
		},
		getARCP 			: function() {
			var amount = 0;
			var numberOfDays = (this.get('dateTo')-this.get('dateFrom'))/1000/60/60/24;
			if(this.get('creditSaleAmount') > 0) {
				amount = Math.floor((this.balanceSheet.get('receivableAmt')/this.get('creditSaleAmount'))*(numberOfDays+1));
			}
			return amount;
		},
		getInventoryTurnOver: function() {
			var amount = 0;
			var numberOfDays = (this.get('dateTo')-this.get('dateFrom'))/1000/60/60/24;
			if(this.expense.get('cogsAmt') > 0) {
				amount = math.floor((this.balanceSheet.get('inventoryAmt')/this.expense.get('cogsAmt'))*(numberOfDays+1));
			}
			return amount;
		},
		getNumberSeven 		: function() {
			var amount = 0;
			var numberOfDays = (this.get('dateTo')-this.get('dateFrom'))/1000/60/60/24;
			if(this.expense.get('cogsAmt') > 0) {
				amount = math.floor((this.balanceSheet.get('payableAmt')/this.expense.get('amount'))*(numberOfDays+1));
			}
			return amount;
		},
		getGPM 				: function() {
			var amount = 0;
			var grossProfit = this.expense.get('receivableAmt')-this.expense.get('cogsAmt');

			if(this.balanceSheet.get('receivableAmt') > 0) {
				amount = grossProfit/this.expense.get('receivableAmt');
			}
			return amount;
		},
		getAssetTurnOver 	: function() {
			var amount = 0.00;
			var x = this.balanceSheet.get('totalAsset') - this.balanceSheet.get('xLiabilityAmt');
			if(x > 0) {
				amount = this.balanceSheet.get('receivableAmt')/x;
			}
			return amount;
		},
		getNPM 				: function() {
			var amount = 0;
			var netProfit = this.income.get('amount') - this.expense.get('amount');

			if(this.expense.get('receivableAmt') > 0) {
				amount = netProfit/this.expense.get('receivableAmt');
			}
			return amount;
		},
		editable 			: function() {
			var status = false;
			if(this.get('currentInstitute').financial_year === null) {
				status = true;
			}
			return status;
		},
		transactionOccurred : 0.00,
		getJournalCount 	: function() {
			var todayDate = new Date();
			var month = kendo.toString(todayDate, 'MM');
			var year = kendo.toString(todayDate, 'yyyy');
			banhji.journalEntry.dataStore.query({
				filter: [
					{field: 'created_at >=', operator: '', value: year+'-' + month + '-01'},
					{field: 'created_at <=', operator: '', value: kendo.toString(todayDate, 'yyyy-MM-dd')}
				],
				page: 1,
				pageSize: 100
			}).done(function(e){
				banhji.accountingSetting.set('transactionOccurred', banhji.journalEntry.dataStore.total());
			});
		},
		saveFinacialDate 	: function() {
			this.inst.sync();
		}
	});
	/*********************
	*   Vendor Section   *
	**********************/
	// dataSource
	banhji.item = {};
	banhji.itemDS = new kendo.data.DataSource({
		transport: {
			read: {
				url: baseUrl + 'items/item',
				type: "GET",
				dataType: "json"
			},
			create: {
				url: baseUrl + 'items/item',
				type: "POST",
				dataType: "json"
			},
			update: {
				url: baseUrl + 'items/item',
				type: "PUT",
				dataType: "json"
			},
			destroy: {
				url: baseUrl + 'items/item',
				type: "DELETE",
				dataType: "json"
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
	// ------ end of dataSource
	banhji.item.record = kendo.observable({
		ds 		: dataStore(baseUrl + "records"),
		takeIn 	: function(data) {
			banhji.item.record.ds.add(data);
		},
		takeOut : function() {
			banhji.item.record.ds.add(data);
		},
		save 	: function() {
			var dfd = $.Deferred();
			banhji.item.record.ds.sync();
			banhji.item.record.ds.bind('requestEnd', function(e) {
				var res = e.response.results;
				if( res ) {
					dfd.resolve({error: false, data: res});
				} else {
					dfd.reject({error: true, data: [], msg: 'error: could not record item to stock.'});
				}
			});
			dfd.promise();
		}
	});
	banhji.payment 	= kendo.observable({
		DS 	: dataStore(baseUrl+'payments/payment'),
		findByBill 	: function(billId) {
			this.DS.filter([
				{field: 'reference_id', operator: '', value: billId },
				{field: 'type', operator: '', value: 'bill' }
			]);
		},
		remove 		: function(data) {
			this.DS.remove(data);
		},
		addNew 		: function(data) {
			this.DS.add({
					amount: data.amount, 
					discount: data.discount, 
					cashier: data.cashier,
					contact: data.contact,
					fine: 0.00, 
					payment_date: new Date(), 
					reference: data.reference, 
					type:'bill', 
					locale: 'km-KH',
					rate: 1,
				});	
		},
		memo 		: "",
		cashAccount : 1,
		close 		: function() {
			this.DS.cancelChanges();
			this.DS.data([]);
			banhji.bill.get('bllToPayList').splice(0, banhji.bill.get('bllToPayList').length);
			var billPlaceholder = new kendo.View("#bill-list-container-tmpl", {model:banhji.bill});
			banhji.view.vendorDash.showIn("#dashboard-container", billPlaceholder);
		},
		save 		: function() {
			var that = this, dfd = $.Deferred();
			this.DS.sync();
			this.DS.bind("requestEnd", function(e){
				var type = e.type;
				var res  = e.response.results;
				if(res) {
					dfd.resolve({type: type, data: res});
				} else {
					dfd.reject({error: true, msg: "problem with api call"});
				}
				return dfd.promise();
			});
		}
	});
	banhji.bill = kendo.observable({
		dataSource 	: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: baseUrl + "bills",
					type: "GET",
					headers: {
						"Entity": getDB(),
						"User": banhji.userManagement.getLogin() === null ? '':banhji.userManagement.getLogin().id
					},
					dataType: 'json'
				},
				create 	: {
					url: baseUrl + "bills",
					type: "POST",
					headers: {
						"Entity": getDB(),
						"User": banhji.userManagement.getLogin() === null ? '':banhji.userManagement.getLogin().id
					},
					dataType: 'json'
				},
				update 	: {
					url: baseUrl + "bills",
					type: "PUT",
					headers: {
						"Entity": getDB(),
						"User": banhji.userManagement.getLogin() === null ? '':banhji.userManagement.getLogin().id
					},
					dataType: 'json'
				},
				destroy : {
					url: baseUrl + "bills",
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
			page: 1,
			serverFiltering: true,
			serverPaging: true,
			pageSize: 100
		}),
		payment 	: banhji.payment,
		vendor 		: function() {
			var vendor = null;
			if(banhji.vendors.get('current')){
				vendor = banhji.vendors.get('current');
			} else {
				//
			}
			return vendor;
		},
		addNew 		: function() {

		},
		paymentArr 	: [],
		cashAccount : 1,
		accountVM 	: banhji.account,
		from 		: new Date(),
		to 			: new Date(),
		paidByCash 	: true,
		dateSort 	: function(e) {
			var selected = e.sender.selectedIndex;
			if(selected === 1) {
				this.set('from', new Date());
				this.set('to', new Date());
			} else if(selected === 2) {
				var date = new Date();
				var first= date.getDate() - date.getDay();
				var last = first + 6;
				var firstDayOfTheWeek = new Date(date.setDate(first));
				var lastDayOfTheWeek = new Date(date.setDate(last));
				this.set('from', firstDayOfTheWeek);
				this.set('to', lastDayOfTheWeek);
			} else if(selected === 3) {
				var date = new Date();
				var firstDayOfMonth = new Date(date.getFullYear(), date.getMonth(), 1);
				var lastDayOfMonth = new Date(date.getFullYear(), date.getMonth() + 1, 0);
				this.set('from', firstDayOfMonth);
				this.set('to', lastDayOfMonth);
			} else if(selected === 4) {
				var date = new Date();
			  	var firstDayOfYear = new Date(date.getFullYear(), 0, 1);
				var lastDayOfYear = new Date(date.getFullYear(), 11, 31);
				this.set('from', firstDayOfYear);
				this.set('to', lastDayOfYear);
			}
		},
		dateList 	: [
			{id: 1, name: 'ថ្ងៃនេះ'},
			{id: 2, name: 'សប្ដាហ៍នេះ'},
			{id: 3, name: 'ខែនេះ'},
			{id: 4, name: 'ឆ្នាំនេះ'}
		],
		all 		: function() {
			this.dataSource.filter(
				{field: "deleted", operator: "", value: 'false'}
			);
		},
		closed 		: function() {
			this.dataSource.filter([
				{field: "deleted", operator: "", value: 'false'},
				{field: "status =", operator: "and", value: 'closed'}
			]);
		},
		open 		: function() {
			this.dataSource.filter([
				{field: "deleted", operator: "", value: 'false'},
				{field: "status !=", operator: "and", value: 'closed'}
			]);
		},
		getCashAccount: function() {
			this.accountVM.dataStore.filter({field: 'account_type_id', operator:'', value: '6'});
		},
		close 		: function() {
			window.history.back(-1);
		},
		setCurrent 	: function(currentBill) {
			this.set('current', currentBill);
		},
		getDetail: function(e) {
			this.setCurrent(e.data);
			banhji.payment.DS.filter([
				{field: 'reference_id', value: e.data.id},
				{field: 'type', value: 'bill'}
			]);
			
		},
		removePmt 	: function(e) {
			this.payment.remove(e.data);
			// console.log("remove payment");
		},
		selectBill	: function(e) {
			var checked = $(e.target).is(':checked');
			if(checked === true) {
				$('.billCheckbox').prop('checked', true);
				for(var i = 0; i < $('.billCheckbox').length; i++) {
					banhji.payment.addNew(e.data.dataSource.data()[i]);						
				}
			} else {
				$('.billCheckbox').prop('checked', false);
				for(var i = 0; i < $('.billCheckbox').length; i++) {
					// banhji.payment.DS.remove(e.data.dataSource.data()[i]);
					var model = banhji.payment.DS.at(i);
					banhji.payment.DS.remove(model);
					console.log(model);
				}	
			}
		},
		singleBillSelect: function(e) {
			if(e.data.makePayment === true) {
				e.data.set('amount', e.data.reference.amount - e.data.reference.paid);
			}
			
		},
		payCommute 	: function(e) {
			// $(e.target).prop('checked', false);
			if(e.data.amount === 0) {
				e.data.set("makePayment", false);
			} else {
				e.data.set("makePayment", true);
			}
		},
		payThoseBills:function() {
			var that = this;
			if(this.get('paymentArr').length > 0) {
				$.each(this.get('paymentArr'), function(i, v){
					if(v.makePayment === true) {
						that.payment.addNew(v);
					}					
				});
				$("#payBillBtn").html("កំពុងប្រត្តិប័ត្រការ");
			} else {
				$("#payBillBtn").html("បង់ប្រាក់");
			}
			that.payment.DS.sync();
			that.payment.DS.bind('requestEnd', function(e){
				var res = e.response.results;
				if(res) {
					
					$.each(res, function(i, v){
						var ap = null, discount = null;
						var entries= [];
						var contact = banhji.vendors.dataSource.get(v.contact.id);
						if(!banhji.vendors.dataSource.get(v.contact.id)) {
							banhji.vendors.dataSource.filter({field: 'id', value: v.contact.id});
						}
						var contact = banhji.vendors.dataSource.get(v.contact.id);
						entries.push(
							{
								account : contact.ap.id,
								contact : v.contact,
								amount 	: v.amount,
								memo   	: that.payment.get('memo'),
								rate 	: banhji.currency.getRate(banhji.index.companyInf().institute.locale),
								locale 	: banhji.index.companyInf().institute.locale,
								is_debit: true
							},
							{
								account : that.get('cashAccount'),
								contact : v.contact,
								amount 	: v.amount - v.discount,
								memo   	: that.payment.get('memo'),
								rate 	: banhji.currency.getRate(banhji.index.companyInf().institute.locale),
								locale 	: banhji.index.companyInf().institute.locale,
								is_debit: false
							}
						);
						if(v.discount > 0) {
							entries.push({
								account : contact.purchaseDiscount.id,
								contact : v.contact,
								amount 	: v.discount,
								memo   	: that.payment.get('memo'),
								rate 	: 1.0000000,
								locale 	: 'km-KH',
								is_debit: false
							});
						}
						banhji.journalEntry.dataStore.add({
							reference 	: v.reference,
							memo 		: that.payment.get('memo'),
							type 		: "pmt",
							deleted 	: false,
							entries 	: entries
						});
					});
					banhji.journalEntry.save().then(
						function(res){
							banhji.vendors.getBills();
							$("#payBillBtn").html("កត់ត្រាបានសំរេច។");
						},
						function(error) {
							$("#payBillBtn").html("បង់ប្រាក់");
						}
					);	
				} else {
					$("#payBillBtn").html("បង់ប្រាក់");
				}
			});	
		}, 
		billItemDS 	: dataStore(baseUrl + 'bills/items'),
		NumOfPO 	: 0,
		NumOfBill	: 0,
		NumOfBillO	: 0,
		amount 		: 0,
		amountOwed 	: 0,
		addItemToBill: function() {
			this.billItemDS.add({item:{id:null, name:null}, bill:{id: null, amount: null}});
		},
		getOpenBills: function(){
			var that = this;
			this.dataSource.filter([
					{field: 'status !=', operator:'', value: 'closed'},
					{field: 'type !=', operator:'', value: 'grn'},
					{field: 'deleted', operator: '', value: 'false'}
			]);
			this.dataSource.bind('requestEnd', function(e){
				if(e.response.meta) {
					that.set('NumOfPO', e.response.meta.po);
					that.set('NumOfBillO', e.response.meta.invO);
					that.set('NumOfBill', e.response.meta.inv);
					that.set('amountOwed', e.response.meta.balance);
				}
			});
		},
		getOpenPO 	: function(e){
			// console.log(e.data.current.id);
			if(banhji.vendors.get('current')) {
				e.data.billVM.dataSource.filter([
					{field: 'type', operator: '', value: 'po'},
					{field: 'status !=', operator: '', value: 'closed'},
					{field: 'deleted', operator: '', value: 'false'},
					{field: 'vendor', operator: '', value: banhji.vendors.get('current').id}
				]);
			} else {
				e.data.billVM.dataSource.filter([
					{field: 'type', operator: '', value: 'po'},
					{field: 'status !=', operator: '', value: 'closed'},
					{field: 'deleted', operator: '', value: 'false'}
				]);
			}
		},
		getOpenInv	: function(e) {
			if(e.data.current.id) {
				e.data.billVM.dataSource.filter([
					{field: 'type', value: 'purchase'},
					{field: 'type', operator: '', value: 'expense'},
					{field: 'status !=', value: 'closed'},
					{field: 'deleted', value: 'false'},
					{field: 'vendor', value: e.data.current.id}
				]);
			} else {
				e.data.billVM.dataSource.filter([
					{field: 'type', value: 'purchase'},
					{field: 'type', operator: '', value: 'expense'},
					{field: 'status !=', value: 'closed'},
					{field: 'deleted', value: 'false'}
				]);
			}
		},
		getOpenInvO	: function(e) {
			var today = new Date();
			var month = today.getMonth() + 1;
			var day = today.getDate() + 1;
			var d = today.getFullYear()+'-'+month+'-'+day;
			if(banhji.vendors.get('current')) {
				e.data.billVM.dataSource.filter([
					{field: 'type !=', operator: '', value: 'po'},
					{field: 'type !=', operator: '', value: 'grn'},
					{field: 'status !=', operator: '', value: 'closed'},
					{field: 'deleted', operator: '', value: 'false'},
					{field: 'due_date <=', operator: '', value: d},
					{field: 'vendor', operator: '', value: banhji.vendors.get('current').id}
				]);
			} else {
				e.data.billVM.dataSource.filter([
					{field: 'type !=', operator: '', value: 'po'},
					{field: 'type !=', operator: '', value: 'grn'},
					{field: 'status !=', operator: '', value: 'closed'},
					{field: 'deleted', operator: '', value: 'false'},
					{field: 'due_date <=', operator: '', value: d},
				]);
			}
		},
		unPaidByVendorId: function(id) {
			var that = this;
			this.dataSource.filter([
					{field: 'status !=', operator: '', value: 'closed'},
					{field: 'type !=', operator: '', value: 'grn'},
					{field: 'deleted', operator: '', value: 'false'},
					{field: 'vendor_id', operator: '', value: id}
			]);
			this.dataSource.bind('requestEnd', function(e){
				var data = e.response.results;
				var po = 0;
				var inv= 0;
				var invO=0;
				var amount = 0;
				var today = new Date();
				// if(data){
				// 	$.each(data, function(i, v){
				// 		if(v.type === 'po') {
				// 			po++;
				// 		} else if(v.type === 'expense' || v.type === 'purchase') {
				// 			var due = new Date(v.due_date);
				// 			if(today.getTime() >= due.getTime()) {
				// 				invO++;
				// 			} 
				// 			inv++;							
				// 		}
				// 		amount = amount + v.balance;
				// 	});
				// } else {
				// 	that.dataSource.data([]);
				// }
				if(e.response.meta) {
					po = e.response.meta.po;
					invO = e.response.meta.invO;
					inv = e.response.meta.inv;
					amount = e.response.meta.balance;
				}
				that.set('NumOfPO', po);
				that.set('NumOfBillO', invO);
				that.set('NumOfBill', inv);
				that.set('amountOwed', amount);
			});
		},
		searchBill 	: function() {
			this.dataSource.filter([
				{field: 'created_at >=', value: kendo.toString(this.get('from'), 'dd-MM-yyyy')},
				{field: 'created_at <=', value: kendo.toString(this.get('to'), 'dd-MM-yyyy')}
			]);
			banhji.bill.get('paymentArr').splice(0,banhji.bill.get('paymentArr').length);
			banhji.bill.dataSource.query({
				filter:[
					{field: 'created_at >=', value: kendo.toString(this.get('from'), 'dd-MM-yyyy')},
					{field: 'created_at <=', value: kendo.toString(this.get('to'), 'dd-MM-yyyy')}
				],
				page: 1,
				skip: 0
			}).then(function(e){
				var data = banhji.vendors.billVM.dataSource.data();
				var date = new Date();
				var today = new Date(date.getFullYear()+"-"+date.getMonth()+"-"+date.getDate());
				$.each(data, function(i, v){
					var discount = 0;
					var due = new Date(v.due_date);
					var overdue = new Date(due.getFullYear()+"-"+due.getMonth()+"-"+due.getDate());
					if(overdue.getTime() >= today.getTime()) {
						discount = (v.amount - v.paid)*(v.payment_term.discount_percentage/100);
					}
					banhji.bill.get('paymentArr').push({
						makePayment: false,
						amount: v.amount - v.paid, 
						discount: discount, 
						cashier: {id: banhji.userManagement.getLogin().id, name: banhji.userManagement.getLogin().username},
						vendor: v.vendor,
						fine: 0.00, 
						payment_date: new Date(), 
						reference: v, 
						type:'bill', 
						locale: 'km-KH',
						rate: 1,
					});
				});

			});
		},
		save 		: function() {
			var dfd = $.Deferred();
			this.dataSource.sync();
			this.dataSource.bind('requestEnd', function(e){
				var results = e.response.results;
				if(results) {
					dfd.resolve(results);
				} else {
					dfd.reject({error: "កត់ត្មិនរាបានសំរេច", msg: "សូមពិនិត្យឡើងវិញ"});
				}
			});
			return dfd.promise();
		}
	});
	banhji.vendors = kendo.observable({
		dataSource 	: dataStore(baseUrl + "vendors"),
		billVM 		: banhji.bill,
		billDS 		: dataStore(baseUrl + 'bills'),
		vendorBills : dataStore(baseUrl + "vendors/bills"),
		vendorPhones: dataStore(baseUrl + "vendors/phones"),
		accountDS 	: banhji.account,
		currencyDS 	: banhji.currency,
		bankModel 	: banhji.bank,
		apAccount 	: [],
		discountAC 	: [],
		prepaidAC 	: [],
		contactTypes: dataStore(baseUrl + "vendors/types"),
		businessType: dataStore(baseUrl + "businesstypes"),
		paymentTerm : dataStore(baseUrl + "paymentterm"),
		key 		: '',
		phoneTypes	: [
			{type: 'phone', description: 'លេខទូស័ព្ទ'},
			{type: 'mobile', description: 'លេខទូស័ព្ទចល័ត'}
		],
		poNum 		: 0,
		invNum 		: 0,
		invONum 	: 0,
		dateType: [
			'---',
			'ថ្អៃនេះ',
			'សប្ដាស៍នេះ',
			'ខែនេះ',
			'ឆ្នាំនេះ',
		],
		startDate: new Date(),
		endDate : new Date(),
		loadMap : function(){
			var obj = this.get("current");
			// console.log(obj);
			lat = kendo.parseFloat(obj.latitute),
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
					map: map
					// title: obj.company
				});
			} 
		},
		dateChange: function(e) {
			// var dateSel = $('.dateSelect').kendoDropDownList().data('kendoDropDownList');
			// dateSel.select(0);	
			if(this.get('startDate') > this.get('endDate')) {
				this.set('startDate', new Date);
			}
		},
		dateTypeSelect: function(e){
			var index = e.sender._oldIndex;
			var today = new Date();
			switch(index){
			case 0:
				break;
			case 1:
				this.set('startDate', today);
				this.set('endDate', today);				
			  	break;
			case 2:
				var first = today.getDate() - today.getDay(); 
				var last = first + 6;
				var firstDayOfWeek = new Date(today.setDate(first));
				var lastDayOfWeek = new Date(today.setDate(last));
				this.set('startDate', firstDayOfWeek);
				this.set('endDate', lastDayOfWeek);
			  	break;
			case 3:			  	
				var firstDayOfMonth = new Date(today.getFullYear(), today.getMonth(), 1);
				var lastDayOfMonth = new Date(today.getFullYear(), today.getMonth() + 1, 0);
				this.set('startDate', firstDayOfMonth);
				this.set('endDate', lastDayOfMonth);
			  	break;
			case 4:
			  	var firstDayOfYear = new Date(today.getFullYear(), 0, 1);
				var lastDayOfYear = new Date(today.getFullYear(), 11, 31);
				this.set('startDate', firstDayOfYear);
				this.set('endDate', lastDayOfYear);
			  	break;
			default:
				this.set('startDate',today);
				this.set('endDate', today);					  
			}
		},
		filterBill 	: function() {
			if(this.get('current')) {
				this.billDS.filter([
					{field: 'vendor_id', operator: '', value: this.get('current').id},
					{field: 'created_at >=', operator: '', value: kendo.toString(this.get('startDate'), 'yyyy-MM-dd')},
					{field: 'created_at <=', operator: '', value: kendo.toString(this.get('endDate'), 'yyyy-MM-dd')}
				]);
			} else {
				this.billDS.filter([
					{field: 'created_at >=', operator: '', value: kendo.toString(this.get('startDate'), 'yyyy-MM-dd')},
					{field: 'created_at <=', operator: '', value: kendo.toString(this.get('endDate'), 'yyyy-MM-dd')}
				]);
			}
			
			banhji.vendors.billDS.bind('requestEnd', function(e){
				banhji.vendors.set('poNum', e.response.meta.po);
				banhji.vendors.set('invNum', e.response.meta.inv);
				banhji.vendors.set('invONum', e.response.meta.invO);
				// console.log(e.response.meta);
			});
		},
		findVendor 	: function() {
			if(this.get('key') !== '') {
				this.dataSource.query({
					filter: { field: 'id', operator: 'like', value: this.get('key')},
					page: 1,
					pageSize: 1
				}).done(function(e){
					var vendor = banhji.vendors.dataSource.data()[0];
					if(vendor) {
						banhji.vendors.setCurrent(vendor);
					}
				});
			} else {
				this.dataSource.query({
					filter: { field: 'id', operator: 'like', value: this.get('key')},
					page: 1,
					pageSize: 100
				}).done(function(e){
				});
			}
			// console.log(typeof this.get('key'));
		},
		monthlyExpense: 0,
		doNothing 	: function() {
			return false;
		},
		getMonthlyExp: function(contact) {
			if(contact !== undefined) {
				banhji.payment.DS.query({
					filter: [
						{field: 'contact_id', operator: '', value: contact},
						{field: 'created_at >= ', operator: '', value: kendo.toString(this.get('startDate'),'yyyy-MM-dd')},
						{field: 'created_at <= ', operator: '', value: kendo.toString(this.get('endDate'),'yyyy-MM-dd')},
					],
					page: 1,
					pageSize: 600
				}).done(function(e){
					var amount = 0.00;
					var data = banhji.payment.DS.data();
					$.each(data, function(i, v){
						amount += kendo.parseFloat(v.amount);
					});
					banhji.vendors.set('monthlyExpense', kendo.toString(amount, 'c2'));
				});
			} else {
				banhji.payment.DS.query({
					filter: [
						{field: 'created_at >= ', operator: '', value: kendo.toString(this.get('startDate'),'yyyy-MM-dd')},
						{field: 'created_at <= ', operator: '', value: kendo.toString(this.get('endDate'),'yyyy-MM-dd')},
					],
					page: 1,
					pageSize: 600
				}).done(function(e){
					var amount = 0.00;
					var data = banhji.payment.DS.data();
					$.each(data, function(i, v){
						amount += kendo.parseFloat(v.amount);
					});
					banhji.vendors.set('monthlyExpense', kendo.toString(amount, 'c2'));
				});
			}
			// banhji.index.expenseDS.fetch(function(e){
			// 	var data = banhji.index.expenseDS.data();
			// 	var amount = 0;
			// 	banhji.index.set('expense', 0);
			// 	$.each(data, function(index, value) {
			// 		amount += kendo.parseFloat(value.amount);
			// 	});	
			// 	banhji.vendors.set('monthlyExpense', kendo.toString(amount, 'c2'));
			// });
		},
		show 		: false,
		selectModal : function() {
			var dfd = $.Deferred();
			$('body').append("<div id='vendorModal'><div id='vendorModalInner'></div></div>");
			var modal = $("#vendorModal").kendoWindow({
				title: "បញ្ជីអ្នកផ្គត់ផ្គង់",
				modal: true,
				width: 300,
				height: 400,
				// visible: false,
				open: function(e) {
					var grid = $("#vendorModalInner").kendoGrid({
						dataSource: banhji.vendors.dataSource,
						columns: [{field: 'company', title: 'ក្រុមហ៊ុន'}],
						selectable: true,
						scrollable: true,
						height: "380px"
					}).data("kendoGrid");
					grid.bind('change', function(e){
						var selected = this.select();
						var model = this.dataItem(selected);
						banhji.vendors.setCurrent(model);
						banhji.vm.get('current').set('vendor', model);
						dfd.resolve(true);
					});
				}
			}).data('kendoWindow');
			modal.center();
			modal.bind('close', function(e){
				modal.destroy();
			});
			return dfd.promise();
		},
		isEdit 		: false,
		close 		: function() {
			this.dataSource.cancelChanges();
			this.vendorPhones.cancelChanges();
			window.history.back(-1);
		},
		paymentOptions: dataStore(baseUrl + "vendors/paymentMethods"),
		paidByBank 	: false,
		paidByCheck : false,
		getBills 	: function() {
			banhji.bill.get('paymentArr').splice(0,banhji.bill.get('paymentArr').length);
			var filter;
			if(this.get('current')) {
				filter = [
					{field: 'type !=', operator: '', value: 'po'},
					{field: 'type !=', operator: '', value: 'grn'},
					{field: 'deleted', operator: 'and', value: 'false'},
					{field: 'status !=', operator: '', value: 'closed'},
					{field: 'vendor', operator: '', value: this.get('current').id}
				];
			} else {
				filter = [
					{field: 'type !=', operator: '', value: 'po'},
					{field: 'type !=', operator: '', value: 'grn'},
					{field: 'deleted', operator: 'and', value: 'false'},
					{field: 'status !=', operator: '', value: 'closed'}
				];
			}
			this.billVM.dataSource.query({
				filter:filter,
				page: 1,
				skip: 0
			}).then(function(e){
				var data = banhji.vendors.billVM.dataSource.data();
				var date = new Date();
				var today = new Date(date.getFullYear()+"-"+date.getMonth()+"-"+date.getDate());
				$.each(data, function(i, v){
					var discount = 0;
					var due = new Date(v.due_date);
					var overdue = new Date(due.getFullYear()+"-"+due.getMonth()+"-"+due.getDate());
					if(overdue.getTime() >= today.getTime()) {
						discount = (v.amount - v.paid)*(v.payment_term.discount_percentage/100);
					}
					banhji.bill.get('paymentArr').push({
						makePayment: false,
						amount: v.amount - v.paid, 
						discount: discount, 
						cashier: {id: banhji.userManagement.getLogin().id, name: banhji.userManagement.getLogin().username},
						vendor: v.vendor,
						fine: 0.00, 
						payment_date: new Date(), 
						reference: v, 
						type:'bill', 
						locale: 'km-KH',
						rate: 1,
					});
				});
			});
			// var billPlaceholder = new kendo.View("#bill-list-container-tmpl", {model:banhji.bill});

			// if(banhji.vendors.get('current')){
				// banhji.view.vendor.showIn("#vendor-container-tmpl", billPlaceholder);
			// } //else {	
			// 	banhji.view.vendorDash.showIn("#dashboard-container", billPlaceholder);
			// }
		},
		selectBill	: function() {
			alert("select All");
		},
		pays 		: function(e) {
			// var bal = e.data.balance;
			// e.data.set('balance', bal - );
			console.log(e.data);
		},
		departments  : [{department: "sales", description: "ផ្នែកលក់"},{department: "finance", description: "ផ្នែកហិរញ្ញវត្ថុ"}],
		selectPaymentOption: function(e) {
			if(this.get('current').payment_main === null && this.get('current').payment_second === null) {
				this.set('paidByBank', false);
				this.set('paidByCheck', false);
			} else if(this.get('current').payment_main !== null && this.get('current').payment_second === null) {
				if(this.get('current').payment_main.id ===3) {
					this.set('paidByBank', true);
					this.set('paidByCheck', false);
				} else if(this.get('current').payment_main.id ===2) {
					this.set('paidByBank', false);
					this.set('paidByCheck', true);
				} else {
					this.set('paidByBank', false);
					this.set('paidByCheck', false);
				}
			} else if(this.get('current').payment_main === null && this.get('current').payment_second !== null) {
				if(this.get('current').payment_second.id ===3) {
					this.set('paidByBank', true);
					this.set('paidByCheck', false);
				} else if(this.get('current').payment_second.id ===2) {
					this.set('paidByBank', false);
					this.set('paidByCheck', true);
				} else {
					this.set('paidByBank', false);
					this.set('paidByCheck', false);
				}
			} else if(this.get('current').payment_main !== null && this.get('current').payment_second !== null) {
				if(this.get('current').payment_main.id ===3 && this.get('current').payment_second.id ===1) {
					this.set('paidByBank', true);
					this.set('paidByCheck', false);
				} else if(this.get('current').payment_main.id ===3 && this.get('current').payment_second.id ===2) {
					this.set('paidByBank', true);
					this.set('paidByCheck', true);
				} else if(this.get('current').payment_main.id ===2 && this.get('current').payment_second.id ===3) {
					this.set('paidByBank', true);
					this.set('paidByCheck', true);
				} else if(this.get('current').payment_main.id ===1 && this.get('current').payment_second.id ===2) {
					this.set('paidByBank', false);
					this.set('paidByCheck', true);
				}  else if(this.get('current').payment_main.id ===1 && this.get('current').payment_second.id ===3) {
					this.set('paidByBank', true);
					this.set('paidByCheck', false);
				} else if(this.get('current').payment_main.id ===2 && this.get('current').payment_second.id ===1) {
					this.set('paidByBank', false);
					this.set('paidByCheck', true);
				} else if(this.get('current').payment_main.id ===2 && this.get('current').payment_second.id ===3) {
					this.set('paidByBank', true);
					this.set('paidByCheck', true);
				}
				console.log('all is not null');
			}
			// console.log(this.get('current').payment_main);
		},
		addPhone 	: function() {
			if(this.get('current').id) {
				this.get('vendorPhones').add({
					contact_id: this.get('current').id, phone: null, type: "phone", department: 'sales'
				});
			} else {
				this.get('vendorPhones').add({contact_id: null, phone: null, type: "phone", department: 'sales'});
			}	
		},
		addNew 		: function() {
			this.get('dataSource').insert(0,{ 
				currency: {id: 1, code: 'USD'},
				company: null,
				company_en: null,
				type: null,
				bank: null,
				bank_account_number: null,
				bank_account_name: null,
				phone: null,
				email: null,
				website: null,
				is_local: true,
				name_on_cheque: null,
				address: null,
				business_type: null,
				vat_no: null,
				bank_address: null,
				ap: null,
				prepaid: null,
				purchaseDiscount: null,
				latitute: 0.00000,
				longtitute: 0.0000000,
				credit_limit: null,
				payment_term: null,
				payment_main: null,
				payment_second: null
			});
		},
		remove 		: function() {
			if(this.get('current')) {
				this.dataSource.remove(this.get('current'));
				this.save();
			}
		},
		removePmt 	: function() {
			console.log('sdkjflds');
		},
		removePhone : function(e) {
			var data = e.data;
			this.get('vendorPhones').remove(data);
		},
		search 		: function() {
			if(this.get('key')) {
				this.get('dataSource').filter([
					{field: 'id', operator: '', value: this.get('key')},
					{field: 'company', operator: 'or', value: this.get('key')}
				]);
			} else {
				this.get('dataSource').read();
			}
		},
		onVendorFocus: function() {
			banhji.router.navigate('/vendors/u/list');
		},
		onAccountFocus: function () {
			banhji.router.navigate('/accounts/u/list');
		},
		onCurrencyFocus: function() {
			banhji.router.navigate('/currencies/u/list');
		},
		
		backToVendor: function() {
			if(this.get('current')) {
				return '#/vendors/' + this.get('current').id;
			} else {
				return false;
			}
		},
		getPhone	: function() {
			// get phones for current vendor
			this.vendorPhones.filter({
				field: 'contact_id', value: this.get('current').id
			});
		},
		toDashboard : function() {
			banhji.router.navigate('/vendors', false);
			this.set('show', false);
		},
		findBillByVendor: function(vendorId) {
			this.billDS.filter([
				{field: 'vendor_id', operator: '', value: vendorId},
				{field: 'created_at >=', operator: '', value: this.get('startDate')},
				{field: 'created_at <=', operator: '', value: this.get('startDate')}
			]);
		},
		current 	: null,
		setCurrent 	: function(data) {
			this.set('current', data);
		},
		selected 	: function(e) {
			// banhji.router.navigate('/vendors/' + e.data.id);
			banhji.vendors.setCurrent(e.data);
			banhji.vendors.loadMap();
			banhji.vendors.vendorPhones.query({
				filter: {field: 'contact_id', operator: '', value: e.data.id},
				page: 1,
				pageSize: 10
			});
			this.filterBill();
			// this.billVM.unPaidByVendorId(e.data.id);
			this.getMonthlyExp(e.data.id);	
			// console.log(e.data);
			// this.set('show', true);
		},
		edit 		: function()  {
			banhji.router.navigate('/vendors/'+this.current.id+'/edit', false);
		},
		saveClose 		: function() {
			var validated = $(".vendor-form").kendoValidator().data("kendoValidator");
			var that = this;
			if(validated.validate()) {
				if(this.dataSource.hasChanges()){
					this.dataSource.sync();
					this.dataSource.bind('requestEnd', function(e){
						var type = e.type;
						if(e.response.error === false) {
							if(type === 'create') {
								var id = e.response.results[0].id;
								$.each(that.vendorPhones.data(), function(index, value) {
									value.set('contact_id', id);
								});
								that.vendorPhones.sync();
								that.vendorPhones.bind('requestEnd', function(e) {
									if(e.type==='create') {
										that.vendorPhones.filter({field: 'contact_id', value: 0});
									}								
								});
								that.close();
							} else if(type==='update') {
								that.vendorPhones.sync();
							}
						}
					});
				} else {
					that.vendorPhones.sync();
					that.close();
				}
				$("#notification").data('kendoNotification').info("កត់ត្រាបានសំរេច");
			} else {
				$("#notification").data('kendoNotification').info("កត់ត្មិនរាបានសំរេច សូមពិនិត្យឡើងវិញ");
			}		
		},
		save 		: function() {
			var validated = $(".vendor-form").kendoValidator().data("kendoValidator");
			var that = this;
			if(validated.validate()) {
				if(this.dataSource.hasChanges()){
					this.dataSource.sync();
					this.dataSource.bind('requestEnd', function(e){
						var type = e.type;
						if(e.response.error === false) {
							if(type === 'create') {
								var id = e.response.results[0].id;
								$.each(that.vendorPhones.data(), function(index, value) {
									value.set('contact_id', id);
								});
								that.vendorPhones.sync();
								that.vendorPhones.bind('requestEnd', function(e) {
									if(e.type==='create') {
										that.vendorPhones.filter({field: 'contact_id', value: 0});
									}								
								});
								that.addNew();
								banhji.vendors.setCurrent(banhji.vendors.get('dataSource').at(0));
							} else if(type==='update') {
								that.vendorPhones.sync();
							}
						}
					});
				} else {
					that.vendorPhones.sync();
				}
				$("#notification").data('kendoNotification').info("កត់ត្រាបានសំរេច");
			} else {
				$("#notification").data('kendoNotification').info("កត់ត្មិនរាបានសំរេច សូមពិនិត្យឡើងវិញ");
			}		
		}
	});
	banhji.itemVM = kendo.observable({
		ds   		: dataStore(baseUrl + "billitems"),
		itemRecord 	: dataStore(baseUrl + "items/records"),
		save 		: function() {
			var dfd = $.Deferred();
			this.ds.sync();
			this.ds.bind("requestEnd", function(e){
				if(e.response.results) {
					dfd.resolve({type: e.type, data: e.response.results});
				} else {
					dfd.reject({error: e.type + " can not be processed."});
				}
			});
			return dfd.promise();
		}
	});
	banhji.vm = kendo.observable({
		ds        : banhji.billDS,
		tax 	  : 0.1,
		classDS   : banhji.segmentItem.ds,
		itemArrayList  : [],
		close     : function() {
			window.history.back(-1);
			this.ds.cancelChanges();
			this.itemDS.ds.cancelChanges();
			console.log('vm');
		},
		changeValue : function(e) {			
			var dataArr = e.data.current.segment;
			var lastIndex = dataArr.length - 1;
			if(dataArr.length > 1) {
				for(var i = 0; i < dataArr.length - 1; i++) {
					var current = dataArr[i];
					if(current.segment.id === dataArr[lastIndex].segment.id) {
						dataArr.splice(lastIndex, 1);
						break;
					}
				}
			}	
		},
		init 	  : function() {
			if(this.get('itemArrayList').length === 0) {
				if(banhji.itemDS.data().length === 0) {
					banhji.itemDS.query({
						filter: {field: 'category_id', operator: '', value: 1},
						page: 1,
						pageSize: 150
					}).then(function(e){
						$.each(banhji.itemDS.data(), function(i, v){
							banhji.vm.get('itemArrayList').push(v);
						});
						
					});	
				} else {
					$.each(banhji.itemDS.data(), function(i, v){
						banhji.vm.get('itemArrayList').push(v);
					});
				}
			}
		},
		subTotal  : 0,
		taxAmount : 0,
		grandTotal: 0,
		getVendor : function() {
			banhji.vendors.selectModal().done(function(value){
				// if(value) {
					console.log(banhji.vendors.get('current'));
				// }
			});
		},
		computeAmount: function(e) {
			e.data.set('amount', e.data.unit * e.data.rate);
			this.getSubTotal();
			this.total();
		},
		itemDS 	  : banhji.itemVM,
		setCurrent: function(currentModel) {
			this.set("current", currentModel);
		},
		addNew 	  : function() {
			this.ds.insert(0,{
				type 			: "po",
				invoice_number 	: null,
				amount 			: 0.00,
				taxAmount		: 0.00,
				paid 			: 0.00,
				status 			: 'open',
				notice 			: null,
				comment 		: null,
				internal_notice	: null,
				due_date 		: new Date(),
				expected_date 	: new Date(),
				payment_term 	: 0,
				segment 		: null,
				delivery_address: null,
				vendor 			: banhji.vendors.get('current') ? banhji.vendors.get('current') : null
			});
			this.setCurrent(this.ds.at(0));
		},
		ribbon 	  : function() {
			var status = "";
			if(this.get('current').status === 'partial') {
				status = "បង់បានខ្លះ";
			} else if(this.get('current').status === 'closed') {
				status = "បង់ប្រាក់រួច";
			} else {
				status = "ទទួល";
			}
			return status;
		},
		addItem   : function() {
			var number = this.itemDS.ds.data().length + 1;
			this.itemDS.ds.add({
				number: number,
				amount: 0.00,
				rate: 0.00,
				unit: 0.00,
				item: null,
				isTaxed: false,
				bill: null
			});
		},
		removeItem: function(e) {
			this.itemDS.ds.remove(e);
		},
		sync 	  : function() {
			var dfd = $.Deferred();
			this.ds.sync();
			this.ds.bind("requestEnd", function(e){
				if(e.response.results) {
					dfd.resolve({type: e.type, data: e.response.results});
				} else {
					dfd.reject({error: e.type + ' can not process.'});
				}
			});
			return dfd.promise();
		},
		getSubTotal: function() {
			var data = this.itemDS.ds.data();
			var amount = 0;
			$.each(data, function(index, value){
				amount += kendo.parseFloat(value.amount);
			});
			this.get('current').set('amount', amount);
		},
		getTax 	  : function() {
			var amount = 0;
			$.each(this.itemDS.ds.data(), function(i, v){
				if(v.isTaxed === true) {
					amount += kendo.parseFloat(v.amount);
				}
			});
			this.get("current").set("taxAmount", amount * this.get('tax'));
			this.set('grandTotal', amount * this.get('tax') + kendo.parseFloat(this.get('current').amount));
		},
		total 	  : function() {
			var price = 0;
			$.each(this.itemDS.ds.data(), function(i, v){
				price = price + v.amount;
			});
			this.set('grandTotal', price + this.get('taxAmount'));
			this.get('current').set('amount', price);
		},
		save 	  : function() {
			var that = this;
			var validator = $(".bill-form").kendoValidator().data('kendoValidator');
			if(validator.validate()) {
				this.get('current').set('amount', kendo.parseFloat(this.get('subTotal')));
				this.sync()
				.then(function(res){
					if(res.type === 'create') {
						$.each(that.itemDS.ds.data(), function(i, v) {
							v.set('bill', res.data[0]);
						});
					} else if(res.type === 'update') {
						$.each(that.itemDS.ds.data(), function(i, v) {
							v.set('bill', res.data[0]);
						});
					}
					that.itemDS.save();
					that.itemDS.bind("requestEnd", function(e){
						if(e.response.code === 201) {
							// banhji.vm.addNew();
						}						
					});
					banhji.vm.addNew();
					banhji.vm.itemDS.ds.filter({field: 'id', operator: '', value: 0});
					banhji.vm.total();
					// banhji.vm.setCurrent(res.data[0]);
				});
				$(".notification").data('kendoNotification').info("កត់ត្រាបានសំរេច");
			} else {
				$(".notification").data('kendoNotification').info("សូមបំពេញផ្នែកដែលមានសញ្ញា *");
			}	
		},
		saveClose : function() {
			var that = this;
			var validator = $(".bill-form").kendoValidator().data('kendoValidator');
			if(validator.validate()) {
				this.get('current').set('amount', kendo.parseFloat(this.get('subTotal')));
				this.sync()
				.then(function(res){
					if(res.type === 'create') {
						$.each(that.itemDS.ds.data(), function(i, v) {
							v.set('bill', res.data[0]);
						});
					} else if(res.type === 'update') {
						$.each(that.itemDS.ds.data(), function(i, v) {
							v.set('bill', res.data[0]);
						});
					}
					that.itemDS.save();
					that.itemDS.bind("requestEnd", function(e){
						if(e.response.code === 201) {
							// banhji.vm.addNew();
						}						
					});
					banhji.vm.close();
					// banhji.vm.setCurrent(res.data[0]);
				});
				$(".notification").data('kendoNotification').info("កត់ត្រាបានសំរេច");
			} else {
				$(".notification").data('kendoNotification').info("សូមបំពេញផ្នែកដែលមានសញ្ញា *");
			}
		}
	});
	banhji.billItem = kendo.observable({
		ds   	: dataStore(baseUrl + "billitems"),
		add 		: function() {
			var number = this.ds.data().length + 1;
			this.ds.add({
				number: number,
				amount: 0.00,
				rate: 0.00,
				unit: 0.00,
				item: null,
				isTaxed: false,
				bill: banhji.vm.get('current') ? banhji.vm.get('current') : null
			});
		},
		remove 		: function(e) {
			this.ds.remove(e.data);
		},
		computeAmount: function(e) {
			e.data.set('amount', kendo.parseFloat(e.data.unit) * kendo.parseFloat(e.data.rate));
			banhji.vm.total();
		},
		save 		: function() {
			var dfd = $.Deferred();
			this.ds.sync();
			this.ds.bind("requestEnd", function(e){
				if(e.response.results) {
					dfd.resolve({type: e.type, data: e.response.results});
				} else {
					dfd.reject({error: e.type + " can not be processed."});
				}
			});
			return dfd.promise();
		}
	});
	banhji.billForm = kendo.observable({
		ds        : banhji.billDS,
		itemDS 	  : banhji.itemVM,
		tax 	  : 0.1,
		classDS   : banhji.segmentItem.ds,
		subTotal  : 0,
		taxAmount : 0,
		grandTotal: 0,
		account   : [],
		disable   : false,
		getDue 	  : function() {
			var vendor = banhji.billForm.get('current');
			if(vendor) {
				var numberOfDays = parseInt(banhji.billForm.get('current').vendor.payment_term.term);
				var date = new Date(banhji.billForm.get('current').expected_date);
				date.setDate(date.getDate() + numberOfDays);
				banhji.billForm.get('current').set('due_date', date);
			}			
		},
		getAllBill: function(){
			this.ds.query({
				filter: [
					{field: 'deleted', operator: '', value: 'false'},
					{field: 'vendor', operator: '', value: banhji.vendors.get('current').id}
				],
				pageSize: 100,
				page: 1
			});
		},
		getById   : function(id) {
			var dfd = $.Deferred();
			banhji.billForm.ds.query({
				filter 	: [
					{ field: 'id', operator: '', value: id },
					{ field: 'deleted', operator: '', value: false }
				],
				pageSize: 1,
				page 	: 1
			}).then(function(e){
				var model = banhji.billForm.ds.data()[0];
				if(model) {
					banhji.itemVM.ds.query({
						filter: {field:'bill_id', operator: '', value: model.id}
					}).then(function(e){
						banhji.billForm.total();
					});
					// banhji.billForm.setCurrent(model);

					if(model.status === 'partial') {
						banhji.billForm.set('ribbon', "បង់បានខ្លះ");
					} else if(model.status === 'closed') {
						banhji.billForm.set('ribbon', "បង់ប្រាក់រួច");
						$('#expense-ribbon').removeClass('default');
						$('#expense-ribbon').addClass('primary');
					} else if (model.status){
						banhji.billForm.set('ribbon', "មិនទានបង់");
						$('#expense-ribbon').removeClass('default');
						$('#expense-ribbon').removeClass('primary');
						$('#expense-ribbon').addClass('warning');
					} else {
						banhji.billForm.set('ribbon', "ទទួល");
						$('#expense-ribbon').removeClass('default');
						$('#expense-ribbon').removeClass('primary');
						$('#expense-ribbon').addClass('warning');
					}
					dfd.resolve(model);
				}
			});
			return dfd.promise();
		},
		getAccount: function() {
			var dfd = $.Deferred();
			banhji.billForm.account.splice(0,banhji.billForm.account.length);
			if(banhji.account.dataStore.data().length > 0) {
				if(banhji.billForm.get('current').paidCash) {
					$.each(banhji.account.dataStore.data(), function(i, v){
						if(v.type.id === 6) {
							banhji.billForm.account.push({
								id: v.id,
								code: v.code,
								name: v.name
							});
						}
					});
				} else {
					$.each(banhji.account.dataStore.data(), function(i, v){
						if(v.type.id === 13) {
							banhji.billForm.get('account').push({
								id: v.id,
								code: v.code,
								name: v.name
							});
						}
					});
				}
				dfd.resolve(true);
			} else {
				banhji.account.dataStore.query({
					filter: {field: 'active', operator: '', value: 'true'},
					page: 1,
					pageSize: 100
				}).then(function(e){
					if(banhji.billForm.get('current').paidCash) {
						$.each(banhji.account.dataStore.data(), function(i, v){
							if(v.type.id === 6) {
								banhji.billForm.account.push({
								id: v.id,
								code: v.code,
								name: v.name
							});
							}
						});
					} else {
						$.each(banhji.account.dataStore.data(), function(i, v){
							if(v.type.id === 11) {
								banhji.billForm.account.push({
								id: v.id,
								code: v.code,
								name: v.name
							});
							}
						});
					}
				});
				dfd.resolve(true);
			}
			return dfd.promise();
		},
		fromPO 	  : function() {
			// cancel current data
			// add new based on SO data to current
		},
		getVendor : function() {
			var that = this;
			$('body').append("<div id='vendorModal'><div id='vendorModalInner'></div></div>");
			var modal = $("#vendorModal").kendoWindow({
				title: "បញ្ជីអ្នកផ្គត់ផ្គង់",
				modal: true,
				width: 300,
				height: 400,
				// visible: false,
				open: function(e) {
					var grid = $("#vendorModalInner").kendoGrid({
						dataSource: banhji.vendors.dataSource,
						columns: [{field: 'company', title: 'ក្រុមហ៊ុន'}],
						selectable: true,
						scrollable: true,
						height: "380px"
					}).data("kendoGrid");
					grid.bind('change', function(e){
						var selected = this.select();
						var model = this.dataItem(selected);
						banhji.vendors.setCurrent(model);
						banhji.billForm.get('current').set('vendor', model);
						// dfd.resolve(true);
					});
				}
			}).data('kendoWindow');
			modal.center();
			modal.bind('close', function(e){
				banhji.billForm.get('current').set('vendor', banhji.vendors.get('current'));
				banhji.billForm.getDue();
				modal.destroy();
			});
		},
		setCurrent: function(currentModel) {
			banhji.billForm.set("current", currentModel);
		},
		ribbon 	  : '',
		addNew 	  : function() {
			banhji.billForm.ds.insert(0,{
				type 			: "po",
				invoice_number 	: null,
				account 		: null,
				amount 			: 0.00,
				taxAmount		: 0.00,
				paid 			: 0.00,
				status 			: 'open',
				notice 			: null,
				comment 		: null,
				internal_notice	: null,
				due_date 		: new Date(),
				expected_date 	: new Date(),
				payment_term 	: 0,
				segment 		: null,
				address 		: null,
				delivery_address: null,
				voucher  		: null,
				paidCash 		: true,
				vendor 			: banhji.vendors.get('current') ? banhji.vendors.get('current') : null
			});
			banhji.billForm.setCurrent(this.ds.at(0));
		},
		getTax 	  : function() {
			var amount = 0;
			$.each(banhji.billForm.itemDS.ds.data(), function(i, v){
				if(v.isTaxed === true) {
					amount += kendo.parseFloat(v.amount) * banhji.billForm.get('tax');
				}
			});
			banhji.billForm.get("current").set("taxAmount", kendo.toString(amount, 'c2'));
			banhji.billForm.set('grandTotal', kendo.toString(amount + kendo.parseFloat(banhji.billForm.get('current').amount), 'c2'));
		},
		total 	  : function() {
			var price = 0, grandTotal = 0;
			$.each(banhji.itemVM.ds.data(), function(i, v){
				price = price + v.amount;
			});
			kendo.culture(banhji.billForm.get('current').vendor.locale);
			grandTotal += price + banhji.billForm.get('taxAmount');
			banhji.billForm.set('grandTotal', kendo.toString(grandTotal, 'c2'));
			banhji.billForm.get('current').set('amount', kendo.toString(price, 'c2'));
		},
		save 	  : function() {
			var dfd = $.Deferred();
			banhji.billForm.ds.sync();
			banhji.billForm.ds.bind("requestEnd", function(e){
				if(e.response.results) {
					dfd.resolve({type: e.type, data: e.response.results});
				} else {
					dfd.reject({error: e.type + ' can not process.'});
				}
			});
			return dfd.promise();
		}
	});
	banhji.expense = kendo.observable({
		form 	  : banhji.billForm,
		isCash 	  : true,
		itemDS 	  : banhji.itemVM.ds,
		pmtMethod : dataStore(baseUrl + 'payment_methods'),
		changeValue : function(e) {			
			var dataArr = e.data.form.current.segment;
			var lastIndex = dataArr.length - 1;
			if(dataArr.length > 1) {
				for(var i = 0; i < dataArr.length - 1; i++) {
					var current = dataArr[i];
					if(current.segment.id === dataArr[lastIndex].segment.id) {
						dataArr.splice(lastIndex, 1);
						break;
					}
				}
			}
		},
		total 	  : function() {
			var price = 0;
			$.each(banhji.expense.itemDS.ds.data(), function(i, v){
				price = price + v.amount;
			});
			console.log(price);
			// kendo.culture(banhji.billForm.get('current').vendor.locale);
			banhji.billForm.set('grandTotal', kendo.toString(price + banhji.billForm.get('taxAmount'), 'c2'));
			banhji.billForm.get('current').set('amount', kendo.toString(price, 'c2'));
		},
		getTax 	  : function(e) {
			var amount = 0;
			$.each(this.itemDS.data(), function(i, v){
				if(v.isTaxed === true) {
					amount += kendo.parseFloat(v.amount);
				}
			});
			this.form.get("current").set("taxAmount", amount * this.form.get('tax'));
			this.set('grandTotal', amount * this.form.get('tax') + kendo.parseFloat(this.get('current').amount));
		},
		close     : function() {
			window.history.back(-1);
			this.form.ds.cancelChanges();
			this.itemDS.cancelChanges();
		},
		accountList  : [],
		getAccount: function() {
			this.get('accountList').splice(0, this.get('accountList').length);
			if(banhji.account.dataStore.data().length > 0) {
				this.set('accountList', banhji.account.dataStore.data());
			} else {
				banhji.account.dataStore.query({
					filter: {field: 'active', operator: '', value: 'true'},
					pageSize: 1000,
					page: 1
				}).then(function(e){
					banhji.expense.set('accountList', banhji.account.dataStore.data());
				});
			}
			console.log('expense');
		},
		addItem   : function() {
			var number = this.itemDS.data().length + 1;
			this.itemDS.add({
				number: number,
				amount: 0.00,
				unit_received: 0,
				rate: 0.00,
				unit: 0.00,
				item: null,
				account: null,
				isTaxed: false,
				bill: banhji.vm.get('current') ? banhji.vm.get('current') : null
			});
		},
		removeItem: function(e) {
			this.itemDS.remove(e.data);
		},
		computeAmount: function(e) {
			e.data.set('amount', kendo.parseFloat(e.data.unit) * kendo.parseFloat(e.data.rate));
			this.form.getTax();
			this.form.total();
		},
		save 	  : function() {
			var that = this;
			var validator = $(".bill-form").kendoValidator().data('kendoValidator');
			if(validator.validate()) {
				kendo.culture(banhji.billForm.get('current').vendor.locale);
				// save to bills
				if(this.form.get('current').account === null) {
					this.form.get('current').set('account', banhji.vendors.get('current').ap);
				}
				var amount = kendo.parseFloat(this.form.get('current').amount);
				var tax = kendo.parseFloat(this.form.get('current').taxAmount);
				this.form.get('current').set('amount', amount);
				this.form.get('current').set('taxAmount', tax);
				this.form.save()
				.then(function(res){	
					return res;
				}).then(function(res){
					if(res.type === 'create') {
						$.each(that.itemDS.data(), function(i, v) {
							v.set('bill', res.data[0]);
						});
					} else if(res.type === 'update') {
						$.each(that.itemDS.data(), function(i, v) {
							v.set('bill', res.data[0]);
						});
					}
					return banhji.itemVM.save()
					.then(function(billItems){
						var entries = [];
						companyRate = banhji.currency.getAmount(banhji.index.companyInf().institute[0].locale),
						vendorRate  = banhji.currency.getAmount(banhji.vendors.get('current').currency.locale);
						for(var x = 0; x < billItems.data.length; x++) {
							entries.push({
								amount  : billItems.data[x].amount,
								memo 	: 'expense-'+res.data[0].id,
								is_debit: true,
								account : {
									id 		: billItems.data[x].account.id,
									code 	: billItems.data[x].account.code,
									name 	: billItems.data[x].account.name
								},
								rate 	: banhji.currency.getRate(vendorRate, companyRate),
								locale 	: banhji.index.companyInf().institute[0].locale,
								issuedDate: banhji.billForm.get('current').expected_date,
								segment : banhji.billForm.get('current').segment,
								contact : {
									id: banhji.vendors.get('current').id,
									company: banhji.vendors.get('current').company
								}
							});
						}
						if(banhji.billForm.get('current').account === null) {
							entries.push({
								amount  : banhji.billForm.get('current').amount,
								memo 	: 'expense-'+ banhji.billForm.get('current').id,
								is_debit: false,
								account : {id: banhji.billForm.get('current').ap.id, name: banhji.billForm.get('current').ap.name},
								rate 	: banhji.currency.getRate(vendorRate, companyRate),
								locale 	: banhji.index.companyInf().institute[0].locale,
								issuedDate: banhji.billForm.get('current').expected_date,
								segment : banhji.billForm.get('current').segment,
								contact : {
									id: banhji.vendors.get('current').id,
									company: banhji.vendors.get('current').company
								}
							});
						} else {
							entries.push({
								amount  : banhji.billForm.get('current').amount,
								memo 	: 'bill-'+ banhji.billForm.get('current').id,
								is_debit: false,
								account : {id: banhji.billForm.get('current').account.id, name: banhji.billForm.get('current').name},
								rate 	: banhji.currency.getRate(vendorRate, companyRate),
								locale 	: banhji.index.companyInf().institute[0].locale,
								issuedDate: banhji.billForm.get('current').expected_date,
								segment : banhji.billForm.get('current').segment,
								contact : {
									id: banhji.vendors.get('current').id,
									company: banhji.vendors.get('current').company
								}
							});
						}
						
						banhji.journalEntry.addNew({
							reference: {id:res.data[0].id},
							type: 'expense',
							memo: 'bill id-' + banhji.billForm.get('current').id,
							voucher: banhji.billForm.get('current').voucher,
							issuedDate: banhji.billForm.get('current').expected_date,
							contact: {id: banhji.userManagement.getLogin().id, name: banhji.userManagement.getLogin().username},
							entries: entries
						});
						return banhji.journalEntry.save();
					})
					.then(function(data){
						$(".notification").data('kendoNotification').info("កត់ត្រាបានសំរេច");
						banhji.purchase.itemDS.data([]);
						banhji.purchase.form.addNew();
						banhji.purchase.form.set('grandTotal', 0);
					}, function(error){
						$(".notification").data('kendoNotification').info("សូមបំពេញផ្នែកដែលមានសញ្ញា *");
					});
				});
				$(".notification").data('kendoNotification').info("កត់ត្រាបានសំរេច");
			} else {
				$(".notification").data('kendoNotification').info("សូមបំពេញផ្នែកដែលមានសញ្ញា *");
			}		
		}
	});
	banhji.purchase = kendo.observable({
		form 	  : banhji.billForm,
		isCash 	  : true,
		itemDS 	  : banhji.itemVM.ds,
		pmtMethod : dataStore(baseUrl + 'payment_methods'),
		purchaseItem: dataStore(baseUrl + "billitems"),
		po 		  : null,
		itemArrayList: [],
		changeValue : function(e) {			
			var dataArr = e.data.form.current.segment;
			var lastIndex = dataArr.length - 1;
			if(dataArr.length > 1) {
				for(var i = 0; i < dataArr.length - 1; i++) {
					var current = dataArr[i];
					if(current.segment.id === dataArr[lastIndex].segment.id) {
						dataArr.splice(lastIndex, 1);
						break;
					}
				}
			}
		},
		poDS 	  : new kendo.data.DataSource({
				transport: {
					read 	: {
						url: baseUrl + 'bills',
						type: "GET",
						headers: {
							"Entity": getDB(),
							"User": banhji.userManagement.getLogin() === null ? '': banhji.userManagement.getLogin().id
						},
						dataType: 'json'
					},
					create 	: {
						url: baseUrl + 'bills',
						type: "POST",
						headers: {
							"Entity": getDB(),
							"User": banhji.userManagement.getLogin() === null ? '': banhji.userManagement.getLogin().id
						},
						dataType: 'json'
					},
					update 	: {
						url: baseUrl + 'bills',
						type: "PUT",
						headers: {
							"Entity": getDB(),
							"User": banhji.userManagement.getLogin() === null ? '': banhji.userManagement.getLogin().id
						},
						dataType: 'json'
					},
					destroy : {
						url: baseUrl + 'bills',
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
				filter: [
					{field: 'type', operator: '', value: "po"},
					{field: 'status !=', operator: '', value: "closed"}
				],
				serverPaging: true,
				pageSize: 100
			}),
		total 	  : function() {
			var price = 0;
			$.each(banhji.purchase.itemDS.ds.data(), function(i, v){
				price = price + v.amount;
			});
			console.log(price);
			banhji.billForm.set('grandTotal', price + banhji.billForm.get('taxAmount'));
			banhji.billForm.get('current').set('amount', kendo.toString(price, 'c2'));
		},
		close     : function() {
			window.history.back(-1);
			this.form.ds.cancelChanges();
			this.itemDS.cancelChanges();
		},
		getTax 	  : function(e) {
			var amount = 0;
			for(var i = 0; i < this.itemDS.total(); i++) {
				if(this.itemDS.data()[i].isTaxed=== true) {
					amount += kendo.parseFloat(this.itemDS.data()[i].amount)*0.1;
				}
			}
			this.form.total();
			this.form.get("current").set("taxAmount", amount);
			this.form.set('grandTotal', amount + kendo.parseFloat(this.form.get('current').amount));
		},
		init 	  : function() {
			if(this.get('itemArrayList').length === 0) {
				if(banhji.itemDS.data().length === 0) {
					banhji.itemDS.query({
						filter: {field: 'item_type_id', operator: '', value: 1},
						page: 1,
						pageSize: 150
					}).then(function(e){
						$.each(banhji.itemDS.data(), function(i, v){
							banhji.purchase.get('itemArrayList').push(v);
						});
						
					});	
				} else {
					$.each(banhji.itemDS.data(), function(i, v){
						banhji.purchase.get('itemArrayList').push(v);
					});
				}
			}
		},
		addItem   : function() {
			var number = this.itemDS.data().length + 1;
			banhji.purchase.itemDS.add({
				number: number,
				amount: 0.00,
				rate: 0.00,
				unit: 0.00,
				unit_received: 0,
				item: null,
				isTaxed: false,
				bill: null
			});
		},
		removeItem: function(e) {
			this.itemDS.remove(e.data);
		},
		computeAmount: function(e) {
			e.data.set('amount', kendo.parseFloat(e.data.unit) * kendo.parseFloat(e.data.rate));
			this.form.getTax();
			this.form.total();
		},
		save 	  : function() {
			// add to items too
			var that = this;
			var validator = $(".bill-form").kendoValidator().data('kendoValidator');
			if(validator.validate()) {
				kendo.culture(banhji.billForm.get('current').vendor.locale);
				// save to bills
				var tax = kendo.parseFloat(this.form.get('current').taxAmount);
				this.form.get('current').set('amount', kendo.parseFloat(this.form.get('current').amount));
				this.form.get('current').set('taxAmount', tax);
				if(this.form.get('current').account === null) {
					this.form.get('current').set('account', banhji.vendors.get('current').ap);
				}
				this.form.save()
				.then(function(res){
					if(banhji.purchase.get('po') !== null) {
						banhji.purchase.get('po').set('status', 'closed');
						banhji.purchase.poDS.sync();
					} // issue here fix this afternoon
					return res;
				}).then(function(res){
					if(res.type === 'create') {
						$.each(that.itemDS.data(), function(i, v) {
							v.set('bill', res.data[0]);
						});
					} else if(res.type === 'update') {
						$.each(that.itemDS.data(), function(i, v) {
							v.set('bill', res.data[0]);
						});
					}
					banhji.itemVM.save()
					.then(function(billItems){
						var dfd = $.Deferred();
						for(var i = 0; i < billItems.data.length; i++) {
							// models = {id: null, amount: 0.00, unit: 1, is_in: true, item:{id: 1, sku: 'ewew', name: 'dfsfds'}}
							banhji.itemVM.itemRecord.add({
								amount 	: billItems.data[i].amount,
								unit 	: billItems.data[i].unit,
								is_in 	: true,
								item 	: {
									id 	: billItems.data[i].item.id,
									sku : billItems.data[i].item.sku,
									name: billItems.data[i].item.name
								}
							});
						}
						banhji.itemVM.itemRecord.sync();
						banhji.itemVM.itemRecord.bind('requestEnd', function(e){
							var r = e.response.results;
							if(r) {
								dfd.resolve(r);
							} else {
								reject('error');
							}
						});
						return dfd.promise();
					})
					.then(function(records){
						var entries = [];
						companyRate = banhji.currency.getAmount(banhji.index.companyInf().institute[0].locale),
						vendorRate  = banhji.currency.getAmount(banhji.vendors.get('current').currency.locale);
						for(var x = 0; x < records.length; x++) {
							var itemAccounts= banhji.itemDS.get(records[x].item.id);
							var inventoryAC = null;
							for(var y = 0; y < itemAccounts.accounts.length; y++) {
								if(itemAccounts.accounts[y].type === 'inventory') {
									inventoryAC = itemAccounts.accounts[y];
									break;
								}
							}
							entries.push({
								amount  : res.data[0].amount,
								memo 	: 'purchase-'+res.data[0].id,
								is_debit: true,
								account : inventoryAC,
								rate 	: banhji.currency.getRate(vendorRate, companyRate),
								locale 	: banhji.index.companyInf().institute[0].locale,
								issuedDate: banhji.billForm.get('current').expected_date,
								segment : banhji.billForm.get('current').segment,
								contact : banhji.vendors.get('current')
							});
						}
						entries.push({
							amount  : res.data[0].amount,
							memo 	: 'purchase-'+res.data[0].id,
							is_debit: false,
							account : banhji.billForm.get('current').account !== null ? banhji.billForm.get('current').account : banhji.vendors.get('current').ap,
							rate 	: banhji.currency.getRate(vendorRate, companyRate),
							locale 	: banhji.index.companyInf().institute[0].locale,
							issuedDate: banhji.billForm.get('current').expected_date,
							segment : banhji.billForm.get('current').segment,
							contact : banhji.vendors.get('current')
						});
						banhji.journalEntry.addNew({
							reference: res.data[0],
							type: 'purchase',
							memo: 'purchase id-' + res.data[0].id,
							conatact: {id: banhji.userManagement.getLogin().id, name: banhji.userManagement.getLogin().username},
							issuedDate: banhji.billForm.get('current').expected_date,
							entries: entries
						});
						return banhji.journalEntry.save();
					})
					.then(function(data){
						$(".notification").data('kendoNotification').info("កត់ត្រាបានសំរេច");
						banhji.billForm.set('grandTotal', 0.00);
						banhji.purchase.form.addNew();
						banhji.purchase.itemDS.data([]);
					}, function(error){
						$(".notification").data('kendoNotification').info("សូមបំពេញផ្នែកដែលមានសញ្ញា *");
					});
				});
				$(".notification").data('kendoNotification').info("កត់ត្រាបានសំរេច");
			} else {
				$(".notification").data('kendoNotification').info("សូមបំពេញផ្នែកដែលមានសញ្ញា *");
			}	
		}
	});
 	banhji.po  = kendo.observable({
 		billVM 	: banhji.billForm,
 		itemDS 	: dataStore(baseUrl + "billitems"),
 		close 		: function() {
			window.history.back(-1);
			// this.ds.cancelChanges();
			// this.itemDS.cancelChanges();
		},
 		setCurrent: function(current) {
 			this.set('current', current);
 		},
 		getBillItems: function() {
			if(this.get('current')) {
				this.billVM.itemDS.ds.filter({field: "bill_id", operator: "", value: this.get('current').id});
			}
		},
		ribbon 	  : function() {
			var status = "";
			if(this.get('current').status === 'partial') {
				status = "បង់បានខ្លះ";
			} else if(this.get('current').status === 'closed') {
				status = "បង់ប្រាក់រួច";
			} else {
				status = "ទទួល";
			}
			return status;
		},
		classCheck : function(e) {			
			// var dataArr = e.data.current.segment;
			// var lastIndex = dataArr.length - 1;
			// if(dataArr.length > 1) {
			// 	for(var i = 0; i < dataArr.length - 1; i++) {
			// 		var current = dataArr[i];
			// 		if(current.segment.id === dataArr[lastIndex].segment.id) {
			// 			dataArr.splice(lastIndex, 1);
			// 			break;
			// 		}
			// 	}
			// }
			console.log(e.data)	;
		},
 		is_grn	  : false,
		is_bill   : false,
		disableGRN: function() {
			if(this.get('current').status === 'partial' || this.get('current').status === 'closed') {
				this.set('is_grn', true);
			} else {
				this.set('is_grn', false);
			}	
		},
		disableBill: function() {
			if(this.get('current').status === 'closed') {
				this.set('is_bill', true);
			} else {
				this.set('is_bill', false);
			}
		},
		changeValue : function(e) {			
			var dataArr = e.data.current.segment;
			var lastIndex = dataArr.length - 1;
			if(dataArr.length > 1) {
				for(var i = 0; i < dataArr.length - 1; i++) {
					var current = dataArr[i];
					if(current.segment.id === dataArr[lastIndex].segment.id) {
						dataArr.splice(lastIndex, 1);
						break;
					}
				}
			}	
		},
		selected  : function(e) {
			this.setCurrent(e.data);
			this.disableGRN();
			this.disableBill();
			this.getBillItems();
		},
		enterBill : function() {
			banhji.router.navigate('/bills/purchase/new');
		},
		makeGRN   : function() {
			banhji.router.navigate('/vendors/u/grn');
		},
		saveBill  : function() {}
 	});
	banhji.grn = kendo.observable({
		ds 			: dataStore(baseUrl + 'bills'),
		poDS 		: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: baseUrl + 'bills',
					type: "GET",
					headers: {
						"Entity": getDB(),
						"User": banhji.userManagement.getLogin() === null ? '': banhji.userManagement.getLogin().id
					},
					dataType: 'json'
				},
				update 	: {
					url: baseUrl + 'bills',
					type: "PUT",
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
			filter: [
				{field: 'type', operator: '', value: 'po'},
				{field: 'status', operator: '', value: 'open'}
			],
			serverPaging: true,
			pageSize: 100
		}),
		itemDS 	  	: banhji.itemVM.ds,
		classDS 	: banhji.segmentItem.ds,
		items 		: [],
		itemList 	: [],
		totalQty 	: 0,
		disablePO   : false,
		changeValue : function(e) {			
			var dataArr = e.data.current.segment;
			var lastIndex = dataArr.length - 1;
			if(dataArr.length > 1) {
				for(var i = 0; i < dataArr.length - 1; i++) {
					var current = dataArr[i];
					if(current.segment.id === dataArr[lastIndex].segment.id) {
						dataArr.splice(lastIndex, 1);
						break;
					}
				}
			}	
		},
		init 		: function() {
			var data = banhji.itemDS.data();
			if(data.length > 0) {
				$.each(data, function(i,v){
					banhji.grn.items.push(v);
				});
			} else {
				banhji.itemDS.fetch(function(e){
					var data = banhji.itemDS.data();
					$.each(data, function(i,v){
						banhji.grn.items.push(v);
					});
				});
			}
		},
		selectedPO 	: function(e) {
			var selected = e.sender.dataSource.at(e.sender.selectedIndex);
			this.get('current').set('vendor', selected.vendor);
			this.get('current').set('segment', selected.segment);
			selected.set('status', 'partial');
			this.itemDS.query({
				filter: {field: 'bill_id', operator:'', value: selected.id}
			}).done(function(e){
				var data = banhji.grn.itemDS.data();
				banhji.grn.itemDS.data([]);
				$.each(data, function(index, value){
					banhji.grn.itemDS.add({
						number: value.number,
						amount: value.amount,
						rate: value.rate,
						unit: value.unit,
						unitReceipt: value.unit,
						item: value.item,
						isTaxed: value.isTaxed,
						balance: 0,
						bill: value.bill
					})
				});
				banhji.grn.total();
			});
		},
		ribbon 	  : function() {
			var status = "";
			if(this.get('current').status === 'partial') {
				status = "បង់បានខ្លះ";
			} else if(this.get('current').status === 'closed') {
				status = "ទទួលរួច";
			} else {
				status = "ទទួល";
			}
			return status;
		},
		close 		: function() {
			window.history.back(-1);
			this.ds.cancelChanges();
			this.itemDS.cancelChanges();
		},
		getPOById 	: function(poId) {
			// banhji.billForm.getById(poId);
		},
		setCurrent 	: function(current) {
			this.set('current', current);
		},
		qtyChange 	: function(e) {
			this.set('totalQty', this.getTotal());
			console.log('lkdfs');
		},
		addItem 	: function() {
			var number = this.itemDS.length + 1;
			this.itemDS.add({
				number: number,
				amount: 0.00,
				rate: 1,
				unit: 0,
				unitReceipt: 0,
				item: null,
				isTaxed: false,
				balance: 0,
				bill: null
			});
		},
		removeItem 	: function(e) {
			this.itemDS.remove(e.data);
			
		},
		lineTotal 	: function(e) {
			if(e.data.unit > 0) {
				e.data.set('balance', e.data.unit - e.data.unitReceipt);
			}
		},
		total 		: function(e) {
			var total = 0;
			$.each(this.itemDS.data(), function(i, v){
				total += kendo.parseInt(v.unitReceipt);
			});
			this.set('totalQty', total);
		},
		addNew 		: function() {
			this.ds.insert(0,{
				type 			: "grn",
				invoice_number 	: null,
				account 		: {id: null},
				reference 		: null,
				amount 			: 0.00,
				taxAmount		: 0.00,
				paid 			: 0.00,
				status 			: 'open',
				notice 			: null,
				comment 		: null,
				internal_notice	: null,
				due_date 		: new Date(),
				expected_date 	: new Date(),
				payment_term 	: 0,
				segment 		: null,
				address 		: null,
				delivery_address: null,
				voucher  		: null,
				paidCash 		: true,
				vendor 			: null
			});
			this.setCurrent(this.ds.at(0));
		},
		save 		: function() {
			this.ds.sync();
			this.ds.bind('requestEnd', function(e){
				var res = e.response.results;
				var type = e.type;
				if(type === 'create') {
					$.each(banhji.grn.itemDS.data(), function(i,v) {
						var data = banhji.grn.itemDS.at(i);
						data.set('unit', v.unitReceipt);
						data.set('bill', res[0]);
					});
				}
				banhji.grn.poDS.sync();
				banhji.grn.itemDS.sync();
			});
		}
	});
	banhji.report = kendo.observable({
		journal :  new kendo.data.DataSource({
			transport: {
				read 	: {
					url: baseUrl + 'accounting_reports/journal',
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
		gl 		: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: baseUrl + 'accounting_reports/generalledger',
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
		companyInf: function() {
			return JSON.parse(localStorage.getItem('userData/company'));
		},
		dateType: [
			'---',
			'ថ្អៃនេះ',
			'សប្ដាស៍នេះ',
			'ខែនេះ',
			'ឆ្នាំនេះ',
		],
		startDate: new Date(),
		endDate : new Date(),
		dateTypeSelect: function(e){
			var index = e.sender._oldIndex;
			var today = new Date();
			switch(index){
			case 0:
				break;
			case 1:
				this.set('startDate', today);
				this.set('endDate', today);				
			  	break;
			case 2:
				var first = today.getDate() - today.getDay(); 
				var last = first + 6;
				var firstDayOfWeek = new Date(today.setDate(first));
				var lastDayOfWeek = new Date(today.setDate(last));
				this.set('startDate', firstDayOfWeek);
				this.set('endDate', lastDayOfWeek);
			  	break;
			case 3:			  	
				var firstDayOfMonth = new Date(today.getFullYear(), today.getMonth(), 1);
				var lastDayOfMonth = new Date(today.getFullYear(), today.getMonth() + 1, 0);
				this.set('startDate', firstDayOfMonth);
				this.set('endDate', lastDayOfMonth);
			  	break;
			case 4:
			  	var firstDayOfYear = new Date(today.getFullYear(), 0, 1);
				var lastDayOfYear = new Date(today.getFullYear(), 11, 31);
				this.set('startDate', firstDayOfYear);
				this.set('endDate', lastDayOfYear);
			  	break;
			default:
				this.set('startDate',today);
				this.set('endDate', today);					  
			}
		},
		dateChange: function(e) {
			// var dateSel = $('.dateSelect').kendoDropDownList().data('kendoDropDownList');
			// dateSel.select(0);	
			if(this.get('startDate') > this.get('endDate')) {
				this.set('startDate', new Date);
			}
		},
		filter: function() {
			this.journal.query({
				filter: [
					{field: 'created_at >=', operator: '', value: kendo.toString(this.get('startDate'), 'yyyy-MM-dd')},
					{field: 'created_at <=', operator: '', value: kendo.toString(this.get('endDate'), 'yyyy-MM-dd')}
				],
				page: 1,
				pageSize: 200
			}).done(function(e){
				var damount = 0, camount = 0;
				if(banhji.report.journal.data().length > 0) {
					for( var i = 0; i < banhji.report.journal.data().length; i++) {
						if(banhji.report.journal.data()[i].entries.length> 0) {
							for( var x = 0; x < banhji.report.journal.data()[i].entries.length; x++) {
								// console.log(banhji.report.journal.data()[i].entries[x].amount);
								if(banhji.report.journal.data()[i].entries[x].is_debit === 'false') {
									camount += kendo.parseFloat(banhji.report.journal.data()[i].entries[x].amount);
								} else {
									damount += kendo.parseFloat(banhji.report.journal.data()[i].entries[x].amount);
								}
							}
						}
					}
				}
				banhji.report.set('jDebit', kendo.toString(damount, 'c3'));
				banhji.report.set('jCredit', kendo.toString(camount, 'c3'));
			});
		},
		filterGL : function() {
			this.gl.query({
				filter: [
					{field: 'created_at >=', operator: '', value: kendo.toString(this.get('startDate'), 'yyyy-MM-dd')},
					{field: 'created_at <=', operator: '', value: kendo.toString(this.get('endDate'), 'yyyy-MM-dd')}
				],
				page: 1,
				pageSize: 200
			}).done(function(e){
				var damount = 0, camount = 0;
				if(banhji.report.gl.data().length > 0) {
					for( var i = 0; i < banhji.report.gl.data().length; i++) {
						if(banhji.report.gl.data()[i].entries.length> 0) {
							for( var x = 0; x < banhji.report.gl.data()[i].entries.length; x++) {
								// console.log(banhji.report.journal.data()[i].entries[x].amount);
								if(banhji.report.gl.data()[i].entries[x].is_debit === 'false') {
									camount += kendo.parseFloat(banhji.report.gl.data()[i].entries[x].amount);
								} else {
									damount += kendo.parseFloat(banhji.report.gl.data()[i].entries[x].amount);
								}
							}
						}
					}
				}
				banhji.report.set('jDebit', kendo.toString(damount, 'c3'));
				banhji.report.set('jCredit', kendo.toString(camount, 'c3'));
			});
		},
		jDebit 	: 0,
		jCredit : 0
	});
	/*************************
	*   Vendor Section End   *
	**************************/

	
	<!-- views and layout -->
	banhji.view = {
		layout 		: new kendo.Layout('#layout', {model: banhji.Layout}),
		blank		: new kendo.View('<div></div>'),
		vendorMenu 	: new kendo.View("#vendor-menu-tmpl", {wrap: false, tagName: 'ul'}),
		// menu 		: new kendo.Layout('#menu-tmpl', {model: banhji.Layout}),
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
		accountingDash: new kendo.View("#accounting-dashboard", {model: banhji.accountingSetting}),
		accountDash : new kendo.Layout("#accounting-dashboard-tmpl", {model: banhji.accounting}),
		accounting_menu: new kendo.View('#accounting-menu-tmpl', {wrap: false, tagName: 'ul'}),
		accounting_setting: new kendo.View('#accounting-setting-template', { model: banhji.accountingSetting }),
		currencyPage: new kendo.View('#currency-page-template', { model: banhji.currency }),
		trialBalanceView: new kendo.View('#accounting-trialBalance-tmpl', { model: banhji.accountingSetting }),
		currencyForm: new kendo.View("#currency-list-edit-template", {model: banhji.currencies}),
		mainView : new kendo.Layout("#admin-segment-items-tmpl", {model: banhji.segmentItem}),
		actionView : new kendo.View("#admin-segment-items-list-action-tmpl", {model: banhji.segmentItem}),
		listView : new kendo.View("#admin-segment-items-list-conatiner-tmpl", {model: banhji.segmentItem}),
		settings 	: new kendo.View("#companySettingsView", {model: banhji.company}),
		settingList : new kendo.View("#companySettingsListView", {model: banhji.company}),
		menu 		: new kendo.Layout('#menu-tmpl', {model: banhji.userManagement}),
		page 		: new kendo.View('#page', {model: banhji.userManagement}),
		pageAdmin	: new kendo.Layout('#page-admin'),
		loginView 	: new kendo.View('#login-template', {model: banhji.userManagement}),
		signupView 	: new kendo.View('#signup-template', {model: banhji.userManagement}),
		userListView: new kendo.View('#page-admin-userlist', {model:banhji.users}),
		addUserView : new kendo.View('#page-admin-userlist-add-template', {model: banhji.users}),
		editRoleView: new kendo.View('#page-admin-userlist-edit-role-template', {model: banhji.users}),
		passwordView: new kendo.View('#page-admin-userlist-password-template', {model: banhji.userManagement}),
		journalReView:new kendo.View('#journal-report-tmpl', {model: banhji.report}),
		glReView:new kendo.View('#journal-ledger-report-tmpl', {model: banhji.report}),
		// companyL:new kendo.Layout("#company", {model: admin}),
		// companyList: new kendo.View("#companyList"),
		// comNew: new kendo.View("#companyNew", {model: company}),
		// myPage: new kendo.Layout("#myId", {model: admin})

		//DAWINE -----------------------------------------------------------------------------------------
		customerCenter: new kendo.Layout("#customerCenter", {model: banhji.customerCenter}),
		customerDashboard: new kendo.Layout("#customerDashboard", {model: banhji.customerCenter}),
		customer: new kendo.Layout("#customer", {model: banhji.customer}),
		
		invoice: new kendo.Layout("#invoice", {model: banhji.invoice}),
		receipt: new kendo.Layout("#receipt", {model: banhji.invoice}),
		estimate: new kendo.Layout("#estimate", {model: banhji.invoice}),
		so: new kendo.Layout("#so", {model: banhji.invoice}),
		gdn: new kendo.Layout("#gdn", {model: banhji.invoice}),
		
		eMeter: new kendo.Layout("#eMeter", {model: banhji.meter}),
		wMeter: new kendo.Layout("#wMeter", {model: banhji.meter}),
		eReading: new kendo.Layout("#eReading", {model: banhji.reading}),
		wReading: new kendo.Layout("#wReading", {model: banhji.reading}),
		eInvoice: new kendo.Layout("#eInvoice", {model: banhji.uInvoice}),
		wInvoice: new kendo.Layout("#wInvoice", {model: banhji.uInvoice}),
		eInvoicePrint: new kendo.Layout("#eInvoicePrint", {model: banhji.invoicePrint}),
		wInvoicePrint: new kendo.Layout("#wInvoicePrint", {model: banhji.invoicePrint}),
		cashier: new kendo.Layout("#cashier", {model: banhji.cashier}),

		customerList: new kendo.Layout("#customerList"),
		paymentSummary: new kendo.Layout("#paymentSummary"),
		paymentDetail: new kendo.Layout("#paymentDetail"),

		newItem: new kendo.Layout("#newItem", {model: banhji.newItem}),
		priceList: new kendo.Layout("#priceList", {model: banhji.priceList}),
		itemCenter: new kendo.Layout("#itemCenter", {model: banhji.itemCenter}),

		printDefaultTemplate: new kendo.Layout("#printDefaultTemplate")
		//END OF DAWINE  ---------------------------------------------------------------------------------
	};
	<!-- views and layout-->
	banhji.router = new kendo.Router({
		init: function() {
			// banhji.view.layout.render("#wrapperApplication");
			$('#current-section').html('|&nbsp;Company');
			$('#home-menu').addClass('active');
			banhji.view.layout.render("#wrapperApplication");
			if(banhji.userManagement.getLogin() === false) {
				banhji.router.navigate('/manage');
			}
		},
		routeMissing: function(e) {
			// banhji.view.layout.showIn("#layout-view", banhji.view.missing);
			console.log("no resource found.")
		}
	});

	/* Login page */
	banhji.router.route('/', function(){
		var blank = new kendo.View('#blank-tmpl');
		banhji.view.layout.showIn('#menu', banhji.view.menu);
		$('#current-section').text("");
		$("#secondary-menu").html("");
		if(getDB() !== null) {
			banhji.view.layout.showIn('#content', banhji.view.index);
			var dataSource = new kendo.data.DataSource({
				transport: {
					read 	: {
						url: baseUrl + 'sales',
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
						{field: 'amount', aggregate: 'sum'}
					]
				},
				batch: true,
				serverFiltering: true,
				serverPaging: true,
				pageSize: 100
			});
			var incomeDS = new kendo.data.DataSource({
				transport: {
					read 	: {
						url: baseUrl + 'sales/income',
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
			dataSource.fetch(function(e){
				$('#index-sales-graph').kendoChart({
					dataSource: {data: dataSource.data()},
					series: [
						{field: 'amount', categoryField: 'month', color: '#004c99', type: 'line'}
					],
					title: {
						text: "ចំណូលលក់ប្រចាំខែ"
					},
					tooltip: {
	                    visible: true,
	                    format: "{0:C}",
	                }
				});
			});
			banhji.index.customer.fetch();
			banhji.index.expenseDS.fetch(function(e){
				var data = banhji.index.expenseDS.data();
				var amount = 0;
				banhji.index.set('expense', 0);
				$.each(data, function(index, value) {
					amount += kendo.parseFloat(value.amount);
				});	
				banhji.index.set('expense', kendo.toString(amount, 'c2'));
			});
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
							name: 'Revenue', 
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
						text: "របាយការណ៍លទ្ធផល"
					},
					tooltip: {
	                    visible: true,
	                    format: "{0:C}",
	                }
				});			
			});
			// banhji.index.equation.fetch(function(e){
			// 	var data = banhji.index.equation.data();
			// 	$.each(data, function(i, v){
			// 		if(v.type === 1) {
			// 			banhji.index.set('asset', v.amount);
			// 		} else if(v.type === 2) {
			// 			banhji.index.set('liability', v.amount);
			// 		} else {
			// 			banhji.index.set('equity', v.amount);
			// 		}
			// 	});
			// });
			banhji.index.cash.fetch(function(e){
				var data = banhji.index.cash.data();
				$.each(data, function(i, v){
					banhji.index.set('cashBal', v.amount);
				});
			});
		} else {
			banhji.router.navigate('/no-page');
		}
	});
	banhji.router.route('/login', function() {
		banhji.view.layout.showIn('#content', banhji.view.loginV);
	});
	banhji.router.route('/admin', function(){
		if(!banhji.userManagement.getLogin()) {
			banhji.router.navigate('/login');
		} else {
			banhji.view.layout.showIn('#menu', banhji.view.menu);
			if(auth.isAdmin() === true) {
				banhji.view.layout.showIn('#content', banhji.view.adTmpl);
			} else {
				console.log("not admin");
			}

		}
	});
	banhji.router.route('/userList', function(){
		if(!banhji.userManagement.getLogin()) {
			banhji.router.navigate('/login');
		} else {
			banhji.view.layout.showIn('#menu', banhji.view.menu);
			if(auth.isAdmin()) {
				user.dataStore.cancelChanges();
				banhji.view.layout.showIn('#content', banhji.view.adTmpl);
				banhji.view.adTmpl.showIn('#myContainer', banhji.view.userList);
			} else {
				console.log("not admin");
			}
		}
	});
	banhji.router.route('/userList/new', function(){
		if(!banhji.userManagement.getLogin()) {
			banhji.router.navigate('/login');
		} else {
			banhji.view.layout.showIn('#menu', banhji.view.menu);
			if(auth.isAdmin()) {
				user.dataStore.insert(0,{
					username: "",
					password: "",
					status: true,
					created_at: new Date(),
					updated_at: new Date()
				});
				user.set('current', user.dataStore.at(0));
				if(user.get('current').isNew()) {
					console.log('New');
				}
				banhji.view.layout.showIn('#content', banhji.view.adTmpl);
				banhji.view.adTmpl.showIn('#myContainer', banhji.view.newUser);
			} else {
				console.log("not admin");
			}
		}
	});
	banhji.router.route('/userList/:id/edit', function(id){
		user.dataStore.cancelChanges();
		if(!banhji.userManagement.getLogin()) {
			banhji.router.navigate('/login');
		} else {
			if(auth.isAdmin()) {
				var model = user.dataStore.get(id);
				if (model === undefined) {
					user.dataStore.query({
						filter: {field: 'id', value: id}
					}).then(function(e){
						user.set('current', user.dataStore.get(id));
					});
				} else {
					user.set('current', model);
				}
				banhji.view.layout.showIn('#content', banhji.view.adTmpl);
				banhji.view.adTmpl.showIn('#myContainer', banhji.view.editUser);
			} else {
				console.log("not admin");
			}
		}
	});
	banhji.router.route('/userList/:id/changePassword', function(id){
		user.dataStore.cancelChanges();
		if(!banhji.userManagement.getLogin()) {
			banhji.router.navigate('/login');
		} else {
			if(auth.isAdmin()) {
				var model = user.dataStore.get(id);
				if (model === undefined) {
					user.dataStore.query({
						filter: {field: 'id', value: id}
					}).then(function(e){
						user.set('current', user.dataStore.get(id));
					});
				} else {
					user.set('current', model);
				}
				banhji.view.layout.showIn('#content', banhji.view.adTmpl);
				banhji.view.adTmpl.showIn('#myContainer', banhji.view.pwdUser);
			} else {
				console.log("not admin");
			}
		}
	});
	banhji.router.route('/admin/company-settings', function(){
		if(!banhji.userManagement.getLogin()) {
			banhji.router.navigate('/login');
		} else {
			if(auth.isAdmin()) {
				banhji.company.init();
				user.dataStore.cancelChanges();
				banhji.view.layout.showIn('#menu', banhji.view.menu);
				banhji.view.layout.showIn('#content', banhji.view.adTmpl);
				banhji.view.adTmpl.showIn('#myContainer', banhji.view.settingList);
			} else {
				console.log("not admin");
			}
		}
	});
	banhji.router.route('/admin/company/:id', function(id){
		if(!banhji.userManagement.getLogin()) {
			banhji.router.navigate('/login');
		} else {
			if(auth.isAdmin()) {
				banhji.company.init();
				banhji.company.findById(id);
				user.dataStore.cancelChanges();
				banhji.view.layout.showIn('#menu', banhji.view.menu);
				banhji.view.layout.showIn('#content', banhji.view.adTmpl);
				banhji.view.adTmpl.showIn('#myContainer', banhji.view.settings);
			} else {
				console.log("not admin");
			}
		}
	});
	banhji.router.route('/admin/company/new', function(){
		if(!banhji.userManagement.getLogin()) {
			banhji.router.navigate('/login');
		} else {
			if(auth.isAdmin()) {
				banhji.company.init();
				user.dataStore.cancelChanges();
				banhji.view.layout.showIn('#menu', banhji.view.menu);
				banhji.view.layout.showIn('#content', banhji.view.adTmpl);
				banhji.view.adTmpl.showIn('#myContainer', banhji.view.settings);
			} else {
				console.log("not admin");
			}
		}
	});
	banhji.router.route('/admin/companyList/new', function(){
		if(!banhji.userManagement.getLogin()) {
			banhji.router.navigate('/login');
		} else {
			if(auth.isAdmin()) {
				user.dataStore.insert(0,{
					username: "",
					password: "",
					status: true
				});
				user.set('current', user.dataStore.at(0));
				if(user.get('current').isNew()) {
					console.log('New');
				}
				banhji.view.layout.showIn('#content', banhji.view.adTmpl);
				banhji.view.adTmpl.showIn('#myContainer', banhji.view.newUser);
			} else {
				console.log("not admin");
			}
		}
	});
	banhji.router.route('/admin/companyList/:id/edit', function(id){
		user.dataStore.cancelChanges();
		if(!banhji.userManagement.getLogin()) {
			banhji.router.navigate('/login');
		} else {
			var model = user.dataStore.get(id);
			if (model === undefined) {
				user.dataStore.query({
					filter: {field: 'id', value: id}
				}).then(function(e){
					user.set('current', user.dataStore.get(id));
				});
			} else {
				user.set('current', model);
			}
			banhji.view.layout.showIn('#content', banhji.view.adTmpl);
			banhji.view.adTmpl.showIn('#myContainer', banhji.view.editUser);
		}
	});
	banhji.router.route('/structure', function() {
		// show structure list
		if(!banhji.userManagement.getLogin()) {
			banhji.router.navigate('/login');
		} else {
			banhji.view.layout.showIn('#menu', banhji.view.menu);
			banhji.view.layout.showIn('#content', banhji.view.adTmpl);
			banhji.view.adTmpl.showIn('#myContainer', banhji.view.structure);
		}
	});
	banhji.router.route('/structure/new', function() {
		// create new structure
		if(!banhji.userManagement.getLogin()) {
			banhji.router.navigate('/login');
		} else {
			banhji.segment.dataStore.insert(0, {
				code_length: 1,
				name: null,
				created_at: '',
				updated_at: ''
			});
			banhji.segment.setCurrent(banhji.segment.dataStore.at(0));
			banhji.view.layout.showIn('#menu', banhji.view.menu);
			banhji.view.layout.showIn('#content', banhji.view.adTmpl);
			banhji.view.adTmpl.showIn('#myContainer', banhji.view.structureNew);
		}
	});
	banhji.router.route('/structure/:id', function(id) {
		// view edit, or delete given structure with id
		if(!banhji.userManagement.getLogin()) {
			banhji.router.navigate('/login');
		} else {
			if(banhji.segment.dataStore.get(id)) {
				banhji.segment.setCurrent(banhji.segment.dataStore.get(id));
			} else {
				banhji.segment.find({field: 'id', value: id});
			}
			banhji.view.layout.showIn('#menu', banhji.view.menu);
			banhji.view.layout.showIn('#content', banhji.view.adTmpl);
			banhji.view.adTmpl.showIn('#myContainer', banhji.view.structureSingle);
		}
	});
	banhji.router.route('/structure/:id/segments', function(id){		
		if(banhji.segment.dataStore.get(id)) {
			banhji.segmentItem.set('segment', banhji.segment.dataStore.get(id));
		} else {
			banhji.segment.dataStore.fetch(function(e){
				banhji.segmentItem.set('segment', banhji.segment.dataStore.get(id));
			});
		}
		banhji.segmentItem.bySegment(id);
		banhji.view.layout.showIn('#menu', banhji.view.menu);
		banhji.view.layout.showIn('#content', banhji.view.adTmpl);
		banhji.view.adTmpl.showIn('#myContainer', banhji.view.mainView);
		banhji.view.mainView.showIn("#segment-list-container", banhji.view.listView);
	});
	banhji.router.route('/my', function(){
		// for managing current logged in user
		if(!banhji.userManagement.getLogin()) {
			banhji.router.navigate('/login');
		} else {
			banhji.view.layout.showIn('#content', banhji.view.myTmpl);
			console.log("dfd");
		}		
	});
	// user management
	banhji.router.route('/my/manage', function(){});
	banhji.router.route('/my/manage/:id/update', function(id){});
	banhji.router.route('/my/manage/:id/chagne_password', function(){});
	banhji.router.route('/my/manage/new', function(){});
	banhji.router.route('/role', function(){});
	banhji.router.route('/role/:id/update', function(){});
	banhji.router.route('/role/new', function(){});
	banhji.router.route('/currencies/u/list', function(){
		console.log('currency list');
	});
	banhji.router.route('/vendors/u/new', function() {
		if(!banhji.userManagement.getLogin()) {
			banhji.router.navigate('/login');
		} else {
			banhji.vendors.accountDS.get("dataStore").query({
				filter: {field: 'account_type_id', operator: 'where_in', value: [13, 14, 21]},
				page: 1,
				pageSize: 200
			}).done(function(e){
				var data = banhji.vendors.accountDS.dataStore.data();
				$.each(data, function(i, v){
					if(v.type.id === 13) {
						banhji.vendors.get('apAccount').push(v);
					} else if(v.type.id === 14) {
						banhji.vendors.get('discountAC').push(v);
					} else {
						banhji.vendors.get('prepaidAC').push(v);
					}
				});
			});
			banhji.currency.getEnabled();
			banhji.vendors.set('isEdit', false);
			banhji.vendors.addNew();
			banhji.vendors.setCurrent(banhji.vendors.get('dataSource').at(0));
			banhji.view.layout.showIn('#menu', banhji.view.blank);
			banhji.view.layout.showIn('#content', banhji.view.vendorNew);
		}
	});
	banhji.router.route('/vendors/:id/edit', function(id) {
		if(!banhji.userManagement.getLogin()) {
			banhji.router.navigate('/login');
		} else {
			banhji.vendors.accountDS.get("dataStore").query({
				filter: {field: 'account_type_id', operator: 'where_in', value: [13, 14, 21]},
				page: 1,
				pageSize: 200
			}).done(function(e){
				var data = banhji.vendors.accountDS.dataStore.data();
				$.each(data, function(i, v){
					if(v.type.id === 13) {
						banhji.vendors.get('apAccount').push(v);
					} else if(v.type.id === 14) {
						banhji.vendors.get('discountAC').push(v);
					} else {
						banhji.vendors.get('prepaidAC').push(v);
					}
				});
			});
			banhji.currency.getEnabled();
			banhji.vendors.selectPaymentOption();
			banhji.vendors.set('isEdit', true);
			banhji.view.layout.showIn('#menu', banhji.view.blank);
			banhji.view.layout.showIn('#content', banhji.view.vendorNew);
			banhji.vendors.loadMap();
		}
	});
	//-----------------------
	banhji.vendorLayout = new kendo.Layout("#vendors-section-tmpl", {model: banhji.vendors});
	banhji.vendorDash 	= new kendo.Layout("#vendors-section-dashboard-tmpl", {model: banhji.vendors});
	// new vendor section
	banhji.router.route('/vendors', function(){
		if(!banhji.userManagement.getLogin()) {
			banhji.router.navigate('/login');
		} else {
			banhji.vendors.set('current', null);
			// banhji.vendors.billVM.getOpenBills();
			banhji.view.layout.showIn('#menu', banhji.view.menu);
			banhji.view.menu.showIn('#secondary-menu', banhji.view.vendorMenu);
			$('#current-section').text(" | អ្នកផ្គត់ផ្គង");
			banhji.view.layout.showIn('#content', banhji.vendorLayout);
			banhji.vendorLayout.showIn('#vendorDashboard', banhji.vendorDash);
			// var date = new Date();
			// banhji.vendors.set('startDate', kendo.toString(date, 'yyyy-MM') + '-01');
			banhji.vendors.getMonthlyExp();
			var grid = $('#sidebar').data('kendoGrid');
			// if(id) {
			// 	banhji.vendors.setCurrent(banhji.vendors.dataSource.get(id));
			// 	// if(banhji.vendors.get('current') === 'null') {
			// 	// 	banhji.vendors.dataSource.query({
			// 	// 		filter: { field: 'id', operator: 'like', value: id},
			// 	// 		page: 1,
			// 	// 		pageSize: 1
			// 	// 	}).done(function(e){
			// 	// 		var vendor = banhji.vendors.dataSource.data()[0];
			// 	// 		if(vendor) {
			// 	// 			banhji.vendors.setCurrent(vendor);
			// 	// 			banhji.vendors.findBillByVendor(vendor.id);
			// 	// 		}
			// 	// 	});
			// 	// } else {
			// 	// }
			// }
		}
	});
	// end new vendor section

	banhji.router.route('/vendors/u/list',  function(){
		banhji.view.layout.showIn('#menu', banhji.view.blank);
			banhji.view.layout.showIn('#content', banhji.view.vendorList);
			$("#vendorListView").kendoListView({
				dataSource: banhji.vendors.dataSource,
				template: "<div>#:company#</div>",
				selectable: true,
				change: function() {
					var selected = this.select();
					var model = this.dataItem(selected);
					banhji.vendors.setCurrent(model);
				}
			});
	});
	banhji.router.route('/bills/purchase/new', function(){	
		if(!banhji.userManagement.getLogin()) {
			banhji.router.navigate('/login');
		} else {
			banhji.purchase.init();
			banhji.billForm.addNew();
			banhji.billForm.get('current').set('type', 'purchase');
			banhji.billForm.getAccount();
			banhji.view.layout.showIn('#content', banhji.view.billPur);
   			banhji.purchase.itemDS.data([]);
			var po = $("#purchase_po").kendoDropDownList({
				dataSource: banhji.purchase.poDS,
				template: '<span>បញ្ជាទិញលេខ #:id#</span>',
				valueTemplate: '<span>បញ្ជាទិញលេខ #:id#</span>',
				dataTextField: "invoice_number",
				dataValueField: "id",
				height: 400,
				change: function(e) {
					var value = this.value();
					banhji.purchase.set('po', e.sender.dataSource.get(value));
					if(banhji.vendors.dataSource.get(banhji.purchase.get('po').vendor.id) === undefined ) {
						banhji.vendors.dataSource.query({
							filter: {field: 'id', operator: '', value: banhji.purchase.get('po').vendor.id},
							page: 1,
							pageSize: 1
						}).then(function(e){
							var model = banhji.vendors.dataSource.at(0);
							banhji.vendors.setCurrent(model);
						});
					} else {
						var model = banhji.vendors.dataSource.get(banhji.purchase.get('po').vendor.id);
						banhji.vendors.setCurrent(model);
					}
					banhji.purchase.itemDS.data([]);
					banhji.purchase.purchaseItem.query({
						filter: {field: 'bill_id', operator: '', value: banhji.purchase.get('po').id},
						page: 1,
						pageSize: 100
					}).then(function(e){
						var data = banhji.purchase.purchaseItem.data();
						for(var i=0; i < data.length; i++) {
							var number = banhji.purchase.itemDS.data().length + 1;
							banhji.purchase.itemDS.add({
								number: data[i].number,
								amount: data[i].amount,
								rate: data[i].rate,
								unit: data[i].unit,
								item: data[i].item,
								isTaxed: data[i].isTaxed,
								bill: null
							});
						}
						banhji.purchase.form.total();	
					});
					banhji.billForm.get('current').set("amount", banhji.purchase.get('po').amount);
					banhji.billForm.get('current').set("segment", banhji.purchase.get('po').segment);
					banhji.billForm.get('current').set("vendor", banhji.purchase.get('po').vendor);
				}
			}).data('kendoDropDownList');
			banhji.purchase.addItem();
			banhji.purchase.addItem();
		}
	});
	banhji.router.route('/bills/purchase/:id', function(id){
		if(!banhji.userManagement.getLogin()) {
			banhji.router.navigate('/login');
		} else {
			banhji.purchase.init();
			// banhji.purchase.itemDS.data([]);
			banhji.billForm.getById(id).done(function(arg){
				banhji.billForm.setCurrent(arg);
				banhji.expense.getAccount();
				banhji.billForm.getAccount(arg);
				banhji.billForm.total();
			});	

			banhji.view.layout.showIn('#content', banhji.view.billPur);
			// banhji.view.billForm.showIn("#bill-form-list-container", banhji.view.billExp);
		}
	});
	banhji.router.route('/bills/expense/new', function(){
		if(!banhji.userManagement.getLogin()) {
			banhji.router.navigate('/login');
		} else {
			banhji.billForm.addNew();
			if(banhji.billForm.get('current').status === 'partial') {
				banhji.billForm.set('ribbon', "បង់បានខ្លះ");
				$('#expense-ribbon').addClass('primary');
			} else if(banhji.billForm.get('current').status === 'closed') {
				banhji.billForm.set('ribbon', "បង់ប្រាក់រួច");
				$('#expense-ribbon').removeClass('default');
				$('#expense-ribbon').addClass('primary');
			} else {
				banhji.billForm.set('ribbon', "ទទួល");
				$('#expense-ribbon').removeClass('default');
				$('#expense-ribbon').removeClass('primary');
				$('#expense-ribbon').addClass('warning');
			}
			banhji.billForm.get('current').set('type', 'expense');
			banhji.billForm.getAccount();
			banhji.expense.getAccount();
			banhji.billForm.getAccount().done(function(status){
				banhji.view.layout.showIn('#content', banhji.view.billExp);
				banhji.expense.addItem();
				banhji.expense.addItem();
				console.log(status);
			});				
		}
	});
	banhji.router.route('/bills/expense/:id', function(id){
		if(!banhji.userManagement.getLogin()) {
			banhji.router.navigate('/login');
		} else {	
			banhji.billForm.getById(id).done(function(arg){
				banhji.billForm.setCurrent(arg);
			});	
			banhji.expense.getAccount();
			banhji.billForm.getAccount();		
			banhji.view.layout.showIn('#content', banhji.view.billExp);			
		}
	});
	banhji.router.route('/vendors/u/po', function(){
		var po = new kendo.View("#purchase-order-tmpl", {model: banhji.vm});
		
		if(!banhji.userManagement.getLogin()) {
			banhji.router.navigate('/login');
		} else {
			banhji.vm.init();
			banhji.vm.addNew();
			banhji.view.layout.showIn('#content', po);
			banhji.vm.addItem();
			banhji.vm.addItem();

		}
	});
	banhji.router.route('/vendors/u/po/:id', function(id){
		// instantiate layout and view
		var po = new kendo.View("#purchase-order-tmpl", {model: banhji.vm});
		if(!banhji.userManagement.getLogin()) {
			banhji.router.navigate('/login');
		} else {
			var vendor, bill, that = this;
			banhji.vm.init();
			bill = banhji.vm.ds.get(id);
			if(bill === undefined) {
				banhji.vm.ds.query({
					filter:{ field: 'id', operator: '', value: id},
					page: 1,
					limit: 1
				}).done(function(e){
					banhji.vm.setCurrent(banhji.vm.ds.data()[0]);
					banhji.vm.itemDS.ds.query({
						filter:{field: 'bill_id', operator: '', value:banhji.vm.ds.data()[0].id},
						limit: 100,
						page: 1
					}).then(function(e){
						banhji.vm.total();
					});
				});
			} else {
				this.setCurrent(bill);
				this.itemDS.read();
			}
			banhji.view.layout.showIn('#content', po);
		}
	});
	banhji.router.route('/pocenter/:id/purchase', function(id){
		if(!banhji.userManagement.getLogin()) {
			banhji.router.navigate('/login');
		} else {
			banhji.purchase.init();
			// banhji.billForm.addNew();
			// banhji.billForm.get('current').set('type', 'purchase');
			banhji.billForm.getAccount();
			banhji.view.layout.showIn('#content', banhji.view.billPur);
			banhji.purchase.addItem();
		}
	});
	banhji.router.route('/payment/vendor(/:id)', function(id){	
		var vendorPmtView = new kendo.View("#vendors-payment-template", {model: banhji.vendorPmt});
		if(!banhji.userManagement.getLogin()) {
			banhji.router.navigate('/manage');
		} else {
			banhji.view.layout.showIn('#menu', banhji.view.blank);
			$('#current-section').text(" | អ្នកផ្គត់ផ្គង");
			$("#secondary-menu").html("");
			banhji.view.layout.showIn('#content', vendorPmtView);
			if(id) {
				banhji.vendorPmt.set('vendorID', id);
			}
			// banhji.vendorPmt.billDS.query({
			// 	filter: [
			// 		{field: 'type <>', operator: '', value: 'po'},
			// 		{field: 'type <>', operator: '', value: 'grn'},
			// 		{field: 'status <>', operator: '', value: 'closed'}
			// 	],
			// 	page: 1,
			// 	pageSize: 100
			// }).then(function(e){
			// 	banhji.vendorPmt.set('tmp', []);
			// 	var data = banhji.vendorPmt.billDS.data();
			// 	$.each(data, function(i, v){
			// 		banhji.vendorPmt.get('tmp').push({
			// 			isPaid: false,
			// 			due : v.due_date,
			// 			vendor: {id: v.vendor.id, company: v.vendor.company},
			// 			invoice: v.invoice_number,
			// 			amountBilled: v.amount,
			// 			paid: v.paid,
			// 			amount: v.amount - v.paid,
			// 			bill: {id: v.id}
			// 		});
			// 	});
			// 	banhji.vendorPmt.calcTotal();
			// 	var today = new Date();
			// 	banhji.vendorPmt.payments.query({
			// 		filter: [
			// 			{field: 'type', value: 'bill'}
			// 		],
			// 		page: 1,
			// 		pageSize: 100
			// 	}).then(function(e){
			// 		// var data = banhji.vendorPmt.payments.data();
			// 		var invNumber = 0, invAmount = 0;
			// 		banhji.vendorPmt.set('pmtData', banhji.vendorPmt.payments.data()[0].results);
			// 		banhji.vendorPmt.set('tInvToday', banhji.vendorPmt.payments.data()[0].meta.num);
			// 		banhji.vendorPmt.set('tAmtToday', banhji.vendorPmt.payments.data()[0].meta.todayAmount);
			// 	});
			// });
		}
	});
	banhji.router.route('/vendor_payment_report', function(){
		var vendorPmtView = new kendo.View("#vendors-payment-report-template", {model: banhji.vendorPmt});
		if(!banhji.userManagement.getLogin()) {
			banhji.router.navigate('/manage');
		} else {
			banhji.view.layout.showIn('#menu', banhji.view.blank);
			$('#current-section').text(" | អ្នកផ្គត់ផ្គង");
			$("#secondary-menu").html("");
			banhji.vendorPmt.pmtDS.query({
				filter: [
					{field: 'type', value: 'purchase'},
					{field: 'type', operator: 'or', value: 'expense'}
				],
				page: 1,
				pageSize: 1
			});
			banhji.view.layout.showIn('#content', vendorPmtView);
		}
	});
	// account section
	banhji.router.route('/accounting_setting', function() {
		if(!banhji.userManagement.getLogin()) {
			banhji.router.navigate('/manage');
		} else {			
			banhji.accountingSetting.inst.fetch(function(){
				banhji.accountingSetting.set('currentInstitute', banhji.accountingSetting.inst.data()[0]);
					if(banhji.accountingSetting.get('currentInstitute')) {
						banhji.view.layout.showIn('#menu', banhji.view.menu);
						banhji.view.menu.showIn('#secondary-menu', banhji.view.accounting_menu);
						$('#current-section').text(" | គណនេយ្យ");
						banhji.view.layout.showIn('#content', banhji.view.accounting_setting);
					} else {

					}
				});
		}
	});
	banhji.router.route('/currencies', function() {
		if(!banhji.userManagement.getLogin()) {
			banhji.router.navigate('/manage');
		} else {			
			banhji.accountingSetting.inst.fetch(function(){
				banhji.view.layout.showIn('#menu', banhji.view.menu);
				banhji.view.menu.showIn('#secondary-menu', banhji.view.accounting_menu);
				$('#current-section').text(" | គណនេយ្យ");
				banhji.view.layout.showIn('#content', banhji.view.currencyPage);
			});
		}
	});
	banhji.router.route('/accounting_dashboard', function() {
		if(!banhji.userManagement.getLogin()) {
			banhji.router.navigate('/manage');
		} else {
			banhji.view.layout.showIn('#menu', banhji.view.menu);
			banhji.view.menu.showIn('#secondary-menu', banhji.view.accounting_menu);
			$('#current-section').text(" | គណនេយ្យ");
			banhji.accountingSetting.searchByDate();
			banhji.recurring.getCount();
			banhji.view.layout.showIn('#content', banhji.view.accountingDash);
			banhji.accountingSetting.getJournalCount();
			banhji.accountingSetting.getGraph();
		}	
	});
	banhji.router.route('/accounts(/:id)', function(id){
		// list all accounts
		if(!banhji.userManagement.getLogin()) {
			banhji.router.navigate('/manage');
		} else {
			banhji.view.layout.showIn('#menu', banhji.view.menu);
			banhji.view.menu.showIn('#secondary-menu', banhji.view.accounting_menu);
			$('#current-section').text(" | គណនេយ្យ");
			banhji.accounting.init();
			banhji.view.layout.showIn('#content', banhji.view.accountDash);
		}
	});
	banhji.router.route('/accounts/u/new', function() {
		var accounting = kendo.observable({
			ds 			: dataStore(baseUrl + 'accounts'),
			coa 	 	: dataStore(baseUrl + 'accounts/coa'),
			types 		: dataStore(baseUrl + 'accounts/types'),
			accounting 	: banhji.accounting,
			edited 		: false,
			close 		: function() {
				window.history.back(-1);
				this.ds.cancelChanges();
			},
			onTypeChange: function(e) {
				var selected = e.sender._old;
				this.coa.filter({field: 'account_type_id', operator: '', value: selected});
				if(selected === "6") {
					this.set('showCash', true);
				} else {
					this.set('showCash', false);
				}
			},
			setCurrent 	: function(current) {
				accounting.set('current', current);
			},
			del 		: function() {},
			showCash 	: false,
			checkExist 	: function() {
				var existed = false;
				if(banhji.account.dataStore.data().length > 0) {
					$.each(banhji.account.dataStore.data(), function(i, v) {
						if(accounting.accounting.get('current').code === v.code) {
							existed = true;
							return false;
						} else if(accounting.accounting.get('current').name === v.name){
							existed = true;
							return false;
						} else if(accounting.accounting.get('current').name_en === v.name_en){
							existed = true;
							return false;
						}
					});
				}
				return existed;
			},
			saveClose 	: function() {
				var validator = $("#account-new-form").kendoValidator().data('kendoValidator');
				if(validator.validate()) {
					var self = this;
					// if(this.checkExist()) {
						alert("សូមពិនិត្យឡើងវិញ ទិន្ន័យមានរួចហើយ");
					// } else {
						this.accounting.accounts.dataStore.sync();
						this.accounting.accounts.dataStore.bind('requestEnd', function(e){
							if(e.response.error === false) {
								self.close();
							} else {
								alert("សូមពិនិត្យឡើងវិញ");
							}	
						});
					// }		
				} else {
					console.log('saveClose');
				}	
			},
			save 		: function() {
				var validator = $("#account-new-form").kendoValidator().data('kendoValidator');
				if(validator.validate()) {
					// if(this.checkExist()) {
					// 	alert("សូមពិនិត្យឡើងវិញ ទិន្ន័យមានរួចហើយ");
					// } else {
						this.accounting.accounts.dataStore.sync();
						this.accounting.accounts.dataStore.bind("requestEnd", function(e){
							var res = e.response;
							if(res.results.length > 0) {
								// $("#notification").data('kendoNotification').info("កត់ត្រាបានសំរេច");
								accounting.accountings.account.dataStore.insert(0,{
									type: null,
									parentAccount: null,
									code: null,
									name: null,
									name_en: null,
									description: null
								});
								alert("កត់ត្រាបានសំរេច");
								accounting.accounting.setCurrent(accounting.accounting.accounts.dataStore.at(0));
							}
						});
					// }
				} else {
					console.log('dlkfjdslf');
				}
			}
		});
		var accountPage = new kendo.View("#accounting-page-template", {model: accounting});
		if(!banhji.userManagement.getLogin()) {
			banhji.router.navigate('/login');
		} else {
			banhji.view.layout.showIn('#menu', banhji.view.menu);
			banhji.view.layout.showIn('#content', accountPage);	
			banhji.account.dataStore.add({				
				type: null,
				parentAccount: null,
				code: null,
				name: null,
				name_en: null,
				description: null
			});

			accounting.accounting.setCurrent(banhji.account.dataStore.at(banhji.account.dataStore.data().length - 1));
		}	
	});
	banhji.router.route('/accounts/u/edit', function() {
		var accounting = kendo.observable({
			ds 			: dataStore(baseUrl + 'accounts'),
			coa 	 	: dataStore(baseUrl + 'accounts/coa'),
			types 		: dataStore(baseUrl + 'accounts/types'),
			accounting 	: banhji.accounting,
			close 		: function() {
				window.history.back(-1);
				if(banhji.account.dataStore.hasChanges()) {
					banhji.account.dataStore.cancelChanges();
				}
				this.ds.cancelChanges();
			},
			edited 		: true,
			onTypeChange: function(e) {
				var selected = e.sender._old;
				this.coa.filter({field: 'account_type_id', operator: '', value: selected});
				if(selected === "6") {
					this.set('showCash', true);
				} else {
					this.set('showCash', false);
				}
			},
			setCurrent 	: function(current) {
				accounting.set('current', current);
			},
			showCash 	: false,
			del 		: function() {
				var del = confirm("តើអ្នកពិតជាចង់លុបគណនីនេះមែនទេ?");
				if(del) {
					this.accounting.accounts.dataStore.remove(this.accounting.get('current'));
					this.saveClose();
				}				
			},
			checkExist 	: function() {
				var existed = false;
				if(this.accounting.accounts.dataStore.data().length > 0) {
					$.each(this.accounting.accounts.dataStore.data(), function(i, v) {
						if(banhji.accounting.get('current').code === v.code) {
							existed = true;
							return false;
						} else if(banhji.accounting.get('current').name === v.name){
							existed = true;
							return false;
						} else if(banhji.accounting.get('current').name_en === v.name_en){
							existed = true;
							return false;
						}
					});
				}
				return existed;
			},
			saveClose 	: function() {
				var validator = $("#account-new-form").kendoValidator().data('kendoValidator');
				if(validator.validate()) {
					var self = this;
					if(this.checkExist()) {
						banhji.accounting.accounts.dataStore.cancelChanges();
						var d = banhji.account.dataStore.get(banhji.accounting.get('current').id);
						banhji.accounting.get('current').set('code', d.code);
						banhji.accounting.get('current').set('name', d.name);
						banhji.accounting.get('current').set('name_e', d.name_e);
						alert("សូមពិនិត្យឡើងវិញ ទិន្ន័យមានរួចហើយ");
					} else {
						this.accounting.accounts.dataStore.sync();
						this.accounting.accounts.dataStore.bind('requestEnd', function(e){
							if(e.response.error === false) {
								self.close();
							} else {
								alert("សូមពិនិត្យឡើងវិញ");
							}	
						});
					}		
				} else {
					console.log('saveClose');
				}	
			},
			save 		: function() {
				var validator = $("#account-new-form").kendoValidator().data('kendoValidator');
				if(validator.validate()) {
					if(this.checkExist()) {
						alert("សូមពិនិត្យឡើងវិញ ទិន្ន័យមានរួចហើយ");
					} else {
						this.accounting.accounts.dataStore.sync();
						this.accounting.accounts.dataStore.bind("requestEnd", function(e){
							var res = e.response;
							if(res.results.length > 0) {
								// $("#notification").data('kendoNotification').info("កត់ត្រាបានសំរេច");
								accounting.accountings.account.dataStore.insert(0,{
									type: null,
									parentAccount: null,
									code: null,
									name: null,
									name_en: null,
									description: null
								});
								alert("កត់ត្រាបានសំរេច");
								accounting.accounting.setCurrent(accounting.accounting.accounts.dataStore.at(0));
							}
						});
					}
				} else {
					console.log('dlkfjdslf');
				}
			}
		});
		var accountPage = new kendo.View("#accounting-page-template", {model: accounting});
		if(!banhji.userManagement.getLogin()) {
			banhji.router.navigate('/login');
		} else {
			// accounting.init();
			banhji.view.layout.showIn('#menu', banhji.view.menu);
			banhji.view.layout.showIn('#content', accountPage);
			if(accounting.accounting.get('current')) {
				// accounting.accounting.setCurrent('current', {
				// 	type: banhji.accounting.get('current').type,
				// 	parentAccount: banhji.accounting.get('current').parentAccount,
				// 	code: banhji.accounting.get('current').code,
				// 	name: banhji.accounting.get('current').name,
				// 	name_en: banhji.accounting.get('current').name_en,
				// 	description: banhji.accounting.get('current').description
				// });
			}
		}	
	});
	banhji.router.route('/accounts/u/listItem', function(){
		var view = new kendo.View('#accountingItem-template', {model: banhji.accountingItem});
		if(!banhji.userManagement.getLogin()) {
			banhji.router.navigate('/manage');
		} else {
			banhji.view.layout.showIn('#menu', banhji.view.menu);

			$('#current-section').text(" | គណនេយ្យ");
			$("#secondary-menu").html("");
			banhji.view.layout.showIn('#content', view);
			banhji.accountingItem.dataSource.query({
				filter: {field: 'item_type_id', operator: '', value: 5},
				page: 1,
				pageSize: 100
			});
			
		}	
	});
	banhji.router.route('/accounts/u/gl', function() {
		var gl = new kendo.View("#journal-account-tmpl", {model: banhji.gl});
		if(!banhji.userManagement.getLogin()) {
			banhji.router.navigate('/login');
		} else {
			// banhji.gl.init();
			if(banhji.gl.get('accountList').length === 0) {
				banhji.account.dataStore.query({
					filter: {field: 'active', operator: '', value: true},
					page: 1,
					pageSize: 500
				}).done(function(e){
					banhji.gl.set('accountList', banhji.account.dataStore.data());
				});
				console.log("check 2");
			}
			if(banhji.gl.get('classDS').length === 0) {
				banhji.gl.segments.query({
					page 	: 1,
					pageSize: 500
				}).done(function(e){
					// $.each(banhji.gl.segments.data(), function(i, v) {
						banhji.gl.set('classDS', banhji.gl.segments.data());
					// });
				}).fail(function(e){
					console.log(e);
				});
			}
			banhji.gl.add();
			banhji.view.layout.showIn('#menu', banhji.view.menu);
			banhji.view.layout.showIn('#content', gl);
			banhji.gl.addEntry();
			banhji.gl.addEntry();
		}	
	});
	banhji.router.route('/accounts/u/gl(/:id)', function(id){
		var gl = new kendo.View("#journal-account-tmpl", {model: banhji.gl});
		if(!banhji.userManagement.getLogin()) {
			banhji.router.navigate('/login');
		} else {
			// banhji.gl.init();
			if(banhji.gl.get('accountList').length === 0) {
				banhji.account.dataStore.query({
					filter: {field: 'active', operator: '', value: true},
					page: 1,
					pageSize: 500
				}).done(function(e){
					banhji.gl.set('accountList', banhji.account.dataStore.data());
				});
			}
			if(banhji.gl.get('classDS').length === 0) {
				banhji.gl.segments.query({
					page 	: 1,
					pageSize: 500
				}).done(function(e){
					// $.each(banhji.gl.segments.data(), function(i, v) {
						banhji.gl.set('classDS', banhji.gl.segments.data());
					// });
				}).fail(function(e){
					console.log(e);
				});
			}
			banhji.view.layout.showIn('#menu', banhji.view.menu);
			banhji.view.layout.showIn('#content', gl);
			banhji.gl.entry.dataStore.query({
				filter: {field: 'id', operator: '', value: id},
				page: 1,
				pageSize: 1
			}).done(function(e){
				banhji.gl.setCurrent(banhji.gl.entry.dataStore.data()[0]);
				for(var i = 0; i < banhji.gl.entry.dataStore.data()[0].entries.length; i++) {
					banhji.gl.entries.push(banhji.gl.entry.dataStore.data()[0].entries[i]);
				}
			});
		}	
	});
	banhji.router.route('/trial_balance', function(){
		if(!banhji.userManagement.getLogin()) {
			banhji.router.navigate('/manage');
		} else {
			banhji.view.layout.showIn('#menu', banhji.view.menu);
			banhji.view.menu.showIn('#secondary-menu', banhji.view.accounting_menu);
			$('#current-section').text(" | គណនេយ្យ");
			
			banhji.view.layout.showIn('#content', banhji.view.trialBalanceView);
		}	
	});	
	banhji.router.route('/cashier/dashboard', function(){
		var cashier = new kendo.View("#cashier-tmpl", { model: banhji.cashiers.page });
		if(!banhji.userManagement.getLogin()) {
			banhji.router.navigate('/login');
		} else {
			banhji.view.layout.showIn('#menu', banhji.view.menu);
			$('#current-section').text(" | បេឡាករ");
			banhji.view.menu.showIn('#secondary-menu', banhji.view.blank);
			banhji.view.layout.showIn('#content', cashier);
			banhji.cashiers.deposit.init();
			banhji.cashiers.transfer.init();
			banhji.cashiers.deposit.addJournal();
			banhji.cashiers.deposit.addEntry();
		}
	});
	banhji.router.route('/cashier/u/deposit', function(){
		var deposit = new kendo.View("#cashier-deposit-tmpl", {model: banhji.cashiers.deposit});
		if(!banhji.userManagement.getLogin()) {
			banhji.router.navigate('/login');
		} else {
			banhji.cashiers.deposit.init();
			banhji.cashiers.deposit.addJournal();
			banhji.view.layout.showIn('#menu', banhji.view.menu);
			banhji.view.layout.showIn('#content', deposit);
			banhji.cashiers.deposit.addEntry();
		}	
	});
	banhji.router.route('/cashier/u/transfer', function(){
		var transfer = new kendo.View("#cashier-transfer-tmpl", {model: banhji.cashiers.transfer});
		if(!banhji.userManagement.getLogin()) {
			banhji.router.navigate('/login');
		} else {
			banhji.cashiers.transfer.init();
			banhji.cashiers.transfer.addJournal();
			banhji.view.layout.showIn('#menu', banhji.view.menu);
			banhji.view.layout.showIn('#content', transfer);
			banhji.cashiers.transfer.addEntry();
		}	
	});
	banhji.router.route('/vendors/u/grn', function(){
		banhji.grn.init();
		var form = new kendo.View("#grn-form-template", {model:banhji.grn});
		banhji.grn.addNew();
		banhji.view.layout.showIn('#content', form);
		banhji.grn.itemDS.data([]);
		banhji.grn.addItem();
		banhji.grn.addItem();
	});
	banhji.router.route('/vendors/u/grn/:id', function(id){
		banhji.grn.init();
		var form = new kendo.View("#grn-form-template", {model:banhji.grn});
		banhji.billDS.query({
			filter: {field: "id", operator: '', value: id}
		}).done(function(e){
			var po = banhji.billDS.data();
			banhji.grn.setCurrent(po[0]);
			banhji.grn.itemDS.query({
				filter: {field: 'bill_id', operator:'', value: id}
			}).done(function(e){
				var data = banhji.grn.itemDS.data();
				banhji.grn.itemDS.data([]);
				$.each(data, function(index, value){
					banhji.grn.itemDS.add({
						number: value.number,
						amount: value.amount,
						rate: value.rate,
						unit: value.unit,
						unitReceipt: value.unitReceipt,
						item: value.item,
						isTaxed: value.isTaxed,
						balance: value.unit - value.unitReceipt,
						bill: value.bill
					})
				});
				banhji.grn.total();
			});
		});
		// banhji.grn.addNew();
		banhji.view.layout.showIn('#content', form);
		banhji.grn.itemDS.data([]);
	});
	banhji.router.route('/pocenter', function(){
		var view = new kendo.View("#test-template", {model: banhji.po});
		if(!banhji.userManagement.getLogin()) {
			banhji.router.navigate('/login');
		} else {
			banhji.view.layout.showIn('#menu', banhji.view.menu);
			banhji.view.layout.showIn('#content', view);
			banhji.billForm.ds.filter([
				{field: 'type', operator: '', value: 'po'},
				{field: 'status !=', operator: '', value: 'closed'},
				{field: 'deleted', operator: '', value: 'false'}
			]);
		}
	});
	banhji.router.route('/grn/:id/po', function(id){
		banhji.grn.init();
		var form = new kendo.View("#grn-form-template", {model:banhji.grn});
		var data = banhji.po.billVM.ds.get(id);
		banhji.po.setCurrent(data);
		// banhji.purchase.set('po', data);
		if(banhji.vendors.dataSource.data().length === 0) {
			banhji.vendors.dataSource.query({
				filter: {field: 'id', operator: '', value: data.vendor.id}
			}).done(function(e){
				var data = banhji.vendors.dataSource.at(0);
				banhji.grn.get('current').set('vendor', data);
			});
		}
		banhji.grn.ds.insert(0,{
			type 			: "grn",
			invoice_number 	: data.invoice_number,
			account 		: null,
			amount 			: data.amount,
			taxAmount		: data.taxAmount,
			paid 			: data.paid,
			status 			: 'open',
			notice 			: data.notice,
			comment 		: data.comment,
			internal_notice	: data.internal_notice,
			due_date 		: new Date(),
			expected_date 	: new Date(),
			payment_term 	: 0,
			segment 		: data.segment,
			address 		: data.address,
			delivery_address: data.delivery_address,
			voucher  		: data.voucher,
			paidCash 		: true,
			vendor 			: data.vendor
		});
		banhji.grn.setCurrent(banhji.grn.ds.at(0));
		banhji.view.layout.showIn('#content', form);
		banhji.grn.itemDS.query({
			filter: {field: 'bill_id', operator:'', value: id}
		}).done(function(e){
			var data = banhji.grn.itemDS.data();
			banhji.grn.itemDS.data([]);
			$.each(data, function(index, value){
				banhji.grn.itemDS.add({
					number: value.number,
					amount: value.amount,
					rate: value.rate,
					unit: value.unit,
					unitReceipt: value.unit,
					item: value.item,
					isTaxed: value.isTaxed,
					balance: 0,
					bill: value.bill
				})
			});
			banhji.grn.total();
		});
		banhji.grn.set('disablePO', true);
		// banhji.grn.itemDS.data([]);
	});
	banhji.router.route('/purchase/:id/po', function(id){
		if(!banhji.userManagement.getLogin()) {
			banhji.router.navigate('/login');
		} else {
			banhji.purchase.init();
			var data = banhji.po.billVM.ds.get(id);
			banhji.po.setCurrent(data);
			banhji.purchase.set('po', data);
			if(banhji.vendors.dataSource.data().length === 0) {
				banhji.vendors.dataSource.query({
					filter: {field: 'id', operator: '', value: data.vendor.id}
				}).done(function(e){
					var data = banhji.vendors.dataSource.at(0);
					banhji.billForm.get('current').set('vendor', data);
				});
			}
			banhji.billForm.ds.insert(0,{
				type 			: "purchase",
				invoice_number 	: data.invoice_number,
				account 		: null,
				amount 			: data.amount,
				taxAmount		: data.taxAmount,
				paid 			: data.paid,
				status 			: 'open',
				notice 			: data.notice,
				comment 		: data.comment,
				internal_notice	: data.internal_notice,
				due_date 		: new Date(),
				expected_date 	: new Date(),
				payment_term 	: 0,
				segment 		: data.segment,
				address 		: data.address,
				delivery_address: data.delivery_address,
				voucher  		: data.voucher,
				paidCash 		: true,
				vendor 			: data.vendor
			});
			banhji.billForm.setCurrent(banhji.billForm.ds.at(0));
			banhji.billForm.getAccount();
			banhji.view.layout.showIn('#content', banhji.view.billPur);
   			banhji.purchase.itemDS.data([]);
			var po = $("#purchase_po").kendoDropDownList({
				dataSource: banhji.purchase.poDS,
				template: '<span>បញ្ជាទិញលេខ #:id#</span>',
				valueTemplate: '<span>បញ្ជាទិញលេខ #:id#</span>',
				dataTextField: "invoice_number",
				dataValueField: "id",
				height: 400,
				change: function(e) {
					var value = this.value();
					banhji.purchase.set('po', e.sender.dataSource.get(value));
					if(banhji.vendors.dataSource.get(banhji.purchase.get('po').vendor.id) === undefined ) {
						banhji.vendors.dataSource.query({
							filter: {field: 'id', operator: '', value: banhji.purchase.get('po').vendor.id},
							page: 1,
							pageSize: 1
						}).then(function(e){
							var model = banhji.vendors.dataSource.at(0);
							banhji.vendors.setCurrent(model);
						});
					} else {
						var model = banhji.vendors.dataSource.get(banhji.purchase.get('po').vendor.id);
						banhji.vendors.setCurrent(model);
					}
					banhji.purchase.itemDS.data([]);
					banhji.purchase.purchaseItem.query({
						filter: {field: 'bill_id', operator: '', value: banhji.purchase.get('po').id},
						page: 1,
						pageSize: 100
					}).then(function(e){
						var data = banhji.purchase.purchaseItem.data();
						for(var i=0; i < data.length; i++) {
							var number = banhji.purchase.itemDS.data().length + 1;
							banhji.purchase.itemDS.add({
								number: data[i].number,
								amount: data[i].amount,
								rate: data[i].rate,
								unit: data[i].unit,
								item: data[i].item,
								isTaxed: data[i].isTaxed,
								bill: null
							});
						}
						banhji.purchase.form.total();	
					});
					banhji.billForm.get('current').set("amount", banhji.purchase.get('po').amount);
					banhji.billForm.get('current').set("segment", banhji.purchase.get('po').segment);
					banhji.billForm.get('current').set("vendor", banhji.purchase.get('po').vendor);
				}
			}).data('kendoDropDownList');
			po.value(banhji.po.get('current').id);
			banhji.po.itemDS.query({
				filter: {field: 'bill_id', operator: '', value: data.id}
			}).done(function(e){
				var data = banhji.po.itemDS.data();
				$.each(data, function(index, value){
					banhji.purchase.itemDS.add({
						number: value.number,
						amount: value.amount,
						rate: value.rate,
						unit: value.unit,
						item: value.item,
						isTaxed: value.isTaxed,
						bill: null
					});
				});
			});
		}
	});
	banhji.router.route('/purchase_return', function(){
		banhji.purchaseReturn = kendo.observable({
			ds 		: dataStore(baseUrl + 'bills'),
			accounts: dataStore(baseUrl + "accounts"),
			journal : dataStore(baseUrl + 'journals'),
			jEntry 	: dataStore(baseUrl + 'journals/entries'),
			classDS : banhji.segmentItem.ds,
			items 	: dataStore(baseUrl + 'items'),
			itemDS 	: banhji.itemVM.ds,
			itemRec : dataStore(baseUrl + 'items/records'),
			keyword : '',
			status 	: null,
			isOpen 	: true,
			hasData : false,
			prData 	: [],
			useCash : true,
			cashAC 	: null,
			apAcct 	: null,
			setCurrent: function(current) {
				this.set('current', current);
			},
			check 	: function(e) {
				if(e.data.back > e.data.unit) {
					e.data.set('back', e.data.unit);
				}
			},
			search 	: function() {
				if(this.get('keyword') !== "") {
					this.ds.query({
						filter: {field: 'invoice_number', operator: '', value: this.get('keyword')}
					}).done(function(e){
						var data = banhji.purchaseReturn.ds.data()[0];
						if(data) {
							banhji.purchaseReturn.setCurrent(data);
							if(data.status === 'open') {
								banhji.purchaseReturn.set('isOpen', true);
								banhji.purchaseReturn.set('status', 'មិនទានបង់រួច');
							} else {
								banhji.purchaseReturn.set('isOpen', false);
								banhji.purchaseReturn.set('status', 'បង់រួច');
							}
							banhji.purchaseReturn.itemDS.query({
								filter: {field: 'bill_id', operator: '', value: data.id}
							}).done(function(e){
								banhji.purchaseReturn.prData.splice(0,banhji.purchaseReturn.prData.length);
								$.each(banhji.purchaseReturn.itemDS.data(), function(index, value){
									banhji.purchaseReturn.prData.push({
										item: value.item,
										unit: value.unit,
										cost: value.amount/value.unit,
										total: value.amount,
										back: value.unit,
										isTaxed: value.isTaxed
									});
								});
							});
							banhji.purchaseReturn.set('hasData', true);
							if(banhji.vendors.dataSource.get(banhji.purchaseReturn.get('current').vendor.id)) {
								this.set('apAcct', banhji.vendors.dataSource.get(banhji.purchaseReturn.get('current').vendor.id).ap);
							} else {
								banhji.vendors.dataSource.query({
									filter: {field: 'id', operator: '', value: banhji.purchaseReturn.get('current').vendor.id}
								}).done(function(e){
									var data = banhji.vendors.dataSource.data()[0];
									banhji.purchaseReturn.set('apAcct', data.ap);
								});
							}
						} else {
							banhji.purchaseReturn.set('hasData', false);
						}
					});
				} else {
					console.log('not good');
				}	
			},
			refund 	: function() {
				this.set('useCash', true);
				if(this.get('prData').length > 0) {
					$.each(this.get('prData'), function(index, value){
						banhji.itemRec.add({
							amount: value.cost, 
							unit: value.unit,
							is_in: false,
							item: value.item
						});
					});
				}
				this.itemRec.sync();
				this.itemRec.bind("requestEnd", function(e){
					var res = e.response;
					var amount = 0;
					if(res.results.length() > 0) {
						var entries = [];
						for(var x = 0; x < res.results.length(); x++) {
							var itemAccounts= banhji.itemDS.get(res.results[x].item.id);
							var inventoryAC = null;
							for(var y = 0; y < itemAccounts.accounts.length; y++) {
								if(itemAccounts.accounts[y].type === 'inventory') {
									inventoryAC = itemAccounts.accounts[y];
									break;
								}
							}
							if(entries.length > 0) {
								$.each(entries, function(index, value){
									if(value.account === inventoryAC) {
										entries[index].amount += res.results[x].amount;
									} else {
										entries.push({
											amount  : res.results[x].amount,
											memo 	: 'return items for bill id '+ banhji.purchaseReturn.get('current').id,
											is_debit: false,
											account : inventoryAC,
											rate 	: 1,
											locale 	: 'km-KH',
											contact : banhji.purchaseReturn.get('current').vendor
										});
									}
								});
							} else {
								entries.push({
									amount  : res.results[x].amount,
									memo 	: 'return items for bill id '+ banhji.purchaseReturn.get('current').id,
									is_debit: false,
									account : inventoryAC,
									rate 	: 1,
									locale 	: 'km-KH',
									contact : banhji.purchaseReturn.get('current').vendor
								});
							}
							amount += res.results[x].amount;
								
						}
						entries.push({
							amount  : amount,
							memo 	: 'return items for bill id '+ banhji.purchaseReturn.get('current').id,
							is_debit: true,
							account : banhji.purchaseReturn.get('cashAC'),
							rate 	: 1,
							locale 	: 'km-KH',
							contact : banhji.purchaseReturn.get('current').vendor
						});
						banhji.journalEntry.addNew({
							reference: res.data[0],
							type: 'purchase return',
							memo: 'purchase return for bill id ' + res.data[0].id,
							conatact: {id: banhji.userManagement.getLogin().id, name: banhji.userManagement.getLogin().username},
							entries: entries
						});
						banhji.journalEntry.save();
					}
				});
			},
			offset 	: function() {
				this.set('useCash', false);
				if(this.get('prData').length > 0) {
					$.each(this.get('prData'), function(index, value){
						banhji.itemRec.add({
							amount: value.cost, 
							unit: value.unit,
							is_in: false,
							item: value.item
						});
					});
				}
				this.itemRec.sync();
				this.itemRec.bind("requestEnd", function(e){
					var res = e.response;
					if(res.results.length() > 0) {
						var entries = [];
						var ap = null;
						for(var x = 0; x < res.results.length(); x++) {
							var itemAccounts= banhji.itemDS.get(res.results[x].item.id);
							var inventoryAC = null;
							for(var x = 0; x < res.results.length(); x++) {
								var itemAccounts= banhji.itemDS.get(res.results[x].item.id);
								var inventoryAC = null;
								for(var y = 0; y < itemAccounts.accounts.length; y++) {
									if(itemAccounts.accounts[y].type === 'inventory') {
										inventoryAC = itemAccounts.accounts[y];
										break;
									}
								}
								if(entries.length > 0) {
									$.each(entries, function(index, value){
										if(value.account === inventoryAC) {
											entries[index].amount += res.results[x].amount;
										} else {
											entries.push({
												amount  : res.results[x].amount,
												memo 	: 'return items for bill id '+ banhji.purchaseReturn.get('current').id,
												is_debit: false,
												account : inventoryAC,
												rate 	: 1,
												locale 	: 'km-KH',
												contact : banhji.purchaseReturn.get('current').vendor
											});
										}
									});
								} else {
									entries.push({
										amount  : res.results[x].amount,
										memo 	: 'return items for bill id '+ banhji.purchaseReturn.get('current').id,
										is_debit: false,
										account : inventoryAC,
										rate 	: 1,
										locale 	: 'km-KH',
										contact : banhji.purchaseReturn.get('current').vendor
									});
								}
								amount += res.results[x].amount;		
							}
							entries.push({
								amount  : banhji.purchaseReturn.get('current').amount,
								memo 	: 'purchase-'+res.data[0].id,
								is_debit: true,
								account : banhji.purchaseReturn.get('apAcct'),
								rate 	: 1,
								locale 	: 'km-KH',
								contact : banhji.purchaseReturn.get('current').vendor
							});
						}
						
						banhji.journalEntry.addNew({
							reference: res.data[0],
							type: 'purchase return',
							memo: 'purchase return for bill id ' + res.data[0].id,
							conatact: {id: banhji.userManagement.getLogin().id, name: banhji.userManagement.getLogin().username},
							entries: entries
						});
						banhji.journalEntry.save();
					}
				});
			},
			test 	: function() {
				return this.get('apAcct');
			},
			save 	: function() {
				if(this.get('current').status === 'open') {
					// got the journal
					this.journal.query({
						filter: [
							{field: 'reference', operator: '', value: this.get('current').id},
							{field: 'type', opertor: '', value: 'purchase'}
						],
						page: 1,
						pageSize: 1
					}).done(function(e){
						var journal = banhji.purchaseReturn.journal.data();
						// check if this is partial return or full item return
						// got the journal entry
						banhji.purchaseReturn.jEntry.query({
							filter: {field: 'id', operator: '', value: journal[0].id},
							page: 1,
							pageSize: 10
						}).done(function(e){
							var data = banhji.purchaseReturn.jEntry.data();
							// real computing here
							var entries = [];
							var amount = 0;
							
							$.each(banhji.get('prData'), function(i, v){
								var item = banhji.purchaseReturn.items.get(v.item.it);
								amount += v.back * v.cost;
								if(entries.length > 0) {
									$.each(entries, function(index, value){
										var account = null;
										$.each(item.accounts, function(x, va){
											if(va.type === "inventory") {
												account = va;
											}
										});
										if(value.account === account) {
											value.amount += v.back * v.cost;
										} else {
											entries.push({
												amount  : v.back * v.cost,
												memo 	: 'purchase return for purchase id '+ banhji.purchaseReturn.get('current').id,
												is_debit: false,
												account : account,
												rate 	: 1,
												locale 	: 'km-KH',
												contact : banhji.vendors.get('current')
											});
										}
									});
								} else {
									var account = null;
									$.each(item.accounts, function(x, va){
										if(va.type === "inventory") {
											account = va;
										}
									});
									entries.push({
										amount  : v.back * v.cost,
										memo 	: 'purchase return for purchase id '+ banhji.purchaseReturn.get('current').id,
										is_debit: false,
										account : account,
										rate 	: 1,
										locale 	: 'km-KH',
										contact : banhji.vendors.get('current')
									});
								}
							});
							$.each(data, function(index, value){
								if(value.is_debit === 'false') {
									entries.push({
										amount  : amount,
										memo 	: 'purchase return for purchase id '+ banhji.purchaseReturn.get('current').id,
										is_debit: true,
										account : inventoryAC,
										rate 	: 1,
										locale 	: 'km-KH',
										contact : banhji.vendors.get('current')
									});
									return false;
								}
							});
							banhji.journalEntry.addNew({
								reference: banhji.purchaseReturn.get('current').id,
								type: 'purchase return',
								memo: 'purchase return id-' + banhji.purchaseReturn.get('current').id,
								conatact: {id: banhji.userManagement.getLogin().id, name: banhji.userManagement.getLogin().username},
								entries: entries
							});
							return banhji.journalEntry.save();
						}).done(function(data){
							if(this.get('prData').length > 0) {
								$.each(this.get('prData'), function(index, value){
									banhji.purchaseReturn.itemRec.add({
										amount: value.cost, 
										unit: value.unit,
										is_in: false,
										item: value.item
									});
								});
								banhji.purchaseReturn.itemRec.sync();
								banhji.purchaseReturn.itemRec.bind('requestEnd', function(e){
									banhji.purchaseReturn.set('hasData', false);
								});
							}
						});
					});
				} else {
					console.log('closed');
				}
				
			}
		});
		var pr = new kendo.View("#purchase-return-template", {model: banhji.purchaseReturn});
		if(!banhji.userManagement.getLogin()) {
			banhji.router.navigate('/login');
		} else {
			banhji.purchaseReturn.accounts.filter({field: 'account_type_id', operator: '', value: 6});
			banhji.purchaseReturn.items.filter({field: 'category_id', operator: '', value: 1});
			banhji.view.layout.showIn('#content', pr);
		}
	});
	banhji.router.route('/journalReport', function(){
		// list all accounts
		if(!banhji.userManagement.getLogin()) {
			banhji.router.navigate('/login');
		} else {
			banhji.view.layout.showIn('#menu', banhji.view.menu);
			$('#current-section').text(" | របាយការណ៍");
			$("#secondary-menu").html("");
			banhji.view.layout.showIn('#content', banhji.view.journalReView);
			banhji.report.journal.query({
				filter: [
					{field: 'created_at >=', operator: '', value: kendo.toString(banhji.report.get('startDate'), 'yyyy-MM-dd')},
					{field: 'created_at <=', operator: '', value: kendo.toString(banhji.report.get('endDate'), 'yyyy-MM-dd')}
				],
				page: 1,
				pageSize: 200
			}).done(function(e){
				var damount = 0, camount = 0;
				if(banhji.report.journal.data().length > 0) {
					for( var i = 0; i < banhji.report.journal.data().length; i++) {
						if(banhji.report.journal.data()[i].entries.length> 0) {
							for( var x = 0; x < banhji.report.journal.data()[i].entries.length; x++) {
								// console.log(banhji.report.journal.data()[i].entries[x].amount);
								if(banhji.report.journal.data()[i].entries[x].is_debit === 'false') {
									camount += kendo.parseFloat(banhji.report.journal.data()[i].entries[x].amount);
								} else {
									damount += kendo.parseFloat(banhji.report.journal.data()[i].entries[x].amount);
								}
							}
						}
					}
				}
				banhji.report.set('jDebit', kendo.toString(damount, 'c3'));
				banhji.report.set('jCredit', kendo.toString(camount, 'c3'));
			});				
		}	
	});
	banhji.router.route('/glReport', function(){
		// list all accounts
		if(!banhji.userManagement.getLogin()) {
			banhji.router.navigate('/login');
		} else {
			banhji.view.layout.showIn('#menu', banhji.view.menu);
			$('#current-section').text(" | របាយការណ៍");
			$("#secondary-menu").html("");
			banhji.view.layout.showIn('#content', banhji.view.glReView);
			banhji.report.gl.query({
				filter: [
					{field: 'created_at >=', operator: '', value: kendo.toString(banhji.report.get('startDate'), 'yyyy-MM-dd')},
					{field: 'created_at <=', operator: '', value: kendo.toString(banhji.report.get('endDate'), 'yyyy-MM-dd')}
				],
				page: 1,
				pageSize: 200
			}).done(function(e){
				var damount = 0, camount = 0;
				if(banhji.report.gl.data().length > 0) {
					for( var i = 0; i < banhji.report.gl.data().length; i++) {
						if(banhji.report.gl.data()[i].entries.length> 0) {
							for( var x = 0; x < banhji.report.journal.data()[i].entries.length; x++) {
								// console.log(banhji.report.journal.data()[i].entries[x].amount);
								if(banhji.report.gl.data()[i].entries[x].is_debit === 'false') {
									camount += kendo.parseFloat(banhji.report.gl.data()[i].entries[x].amount);
								} else {
									damount += kendo.parseFloat(banhji.report.gl.data()[i].entries[x].amount);
								}
							}
						}
					}
				}
				banhji.report.set('jDebit', kendo.toString(damount, 'c3'));
				banhji.report.set('jCredit', kendo.toString(camount, 'c3'));
			});				
		}	
	});
	banhji.router.route('/manage', function(){
		banhji.view.layout.showIn('#menu', banhji.view.blank);
		$('#current-section').text("");
		$("#secondary-menu").html("");
		banhji.view.layout.showIn('#content', banhji.view.loginView);
	});
	banhji.router.route('/no-page', function(){
		if(getDB() === null) {
			banhji.view.layout.showIn('#menu', banhji.view.menu);
			banhji.view.layout.showIn('#content', banhji.view.page);	
		} else {
			banhji.router.navigate('/')
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
	banhji.router.route('/page/companyInfo', function(){
		var view = new kendo.View("#create-company-template", {model: banhji.userManagement});
		$('#createComMessage').text("");
		banhji.view.layout.showIn('#menu', banhji.view.menu);
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
	banhji.router.route('/page/companyLogo', function(){
		var view = new kendo.View("#page-admin-comany-logo-template", {model: banhji.userManagement});
		$('#createComMessage').text("");
		banhji.view.layout.showIn('#menu', banhji.view.menu);
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
	banhji.router.route('/page/userlist', function(){
		banhji.view.layout.showIn('#menu', banhji.view.menu);
		// if(banhji.userManagement.getLogin().perm.length > 0) {
		// 	if(banhji.userManagement.getLogin().perm[0].id === "1") {
				banhji.view.layout.showIn('#content', banhji.view.pageAdmin);
				banhji.view.pageAdmin.showIn('#col2', banhji.view.userListView);
		// 	}
		// }		
	});
	banhji.router.route('/page/password', function(){
		banhji.view.layout.showIn('#menu', banhji.view.menu);
		banhji.view.layout.showIn('#content', banhji.view.passwordView);
		banhji.userManagement.pwdDS.add({
			username: banhji.userManagement.getLogin().username,
			password: banhji.userManagement.get('password')
		});		
	});

	banhji.employee = kendo.observable({
		dataSource 	: dataStore(baseUrl + 'employees'),
		setCurrent 	: function(current) {
			this.set('current', current);
		},
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
		edit 		: function(e) {
			banhji.view.pageAdmin.showIn('#col2', employeeForm);
			this.setCurrent(e.data);
			// console.log(e.data);
		},
		cancel 		: function() {
			this.dataSource.cancelChanges();
			banhji.view.pageAdmin.showIn('#col2', employeeView);
		},
		remove 		: function(e) {
			this.dataSource.remove(e.data);
			this.save();
		},
		save 		: function() {
			this.dataSource.sync();
			this.dataSource.bind('requestEnd', function(e){
				var type = e.type, res = e.response;
				if(type === 'create' && res.results.length > 0) {
					alert('created');
				} else if(type === 'update') {
					alert('updated');
				} else if(type === 'destroy') {
					alert('deleted');
				}
				banhji.view.pageAdmin.showIn('#col2', employeeView);
			});
		}
	});
	var employeeView = new kendo.View('#employee-template', {model: banhji.employee});
	var employeeForm = new kendo.View("#employee-form-template", {model: banhji.employee});
	banhji.router.route('/page/employee', function(){
		banhji.view.layout.showIn('#content', banhji.view.pageAdmin);
		banhji.view.pageAdmin.showIn('#col2', employeeView);
		banhji.employee.dataSource.query({
			filter: {field: 'deleted', operator: '', value: 'false'},
			page: 1,
			pageSize: 100
		});
	});

	banhji.router.route('/app/:userid', function(userid){
		banhji.view.layout.showIn('#menu', banhji.view.menu);
		console.log('app ' + userid);
	});
	$(function() {	
		banhji.router.start();
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		} else {
			if(banhji.currency.dataSource.data().length === 0) {
				banhji.currency.dataSource.read();
			}	
		}
	});
</script>