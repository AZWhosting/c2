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
				<li><a href="#"><img src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/banhji-logo.png" style="height: 40px;"></a></li>
			</ul>
			<form class="navbar-form pull-left">
				<div class="btn-group">
				  	<a class="btn btn-inverse dropdown-toggle" data-toggle="dropdown" href="#">
				    	<i class="icon-th"></i>
				    	<span class="caret"></span>
				  	</a>
				  	<ul class="dropdown-menu">
				    	<li data-bind="click: searchContact"><a href="#"><i class="icon-user"></i> Contact</a></li>
				    	<li data-bind="click: searchTransaction"><a href="#"><i class="icon-random"></i> Transaction</a></li>
				    	<li data-bind="click: searchItem"><a href="#"><i class="icon-th-list"></i> Item</a></li>
				  	</ul>
				</div>
			  	<input type="text" class="span2 search-query" placeholder="Search Contact" id="search-placeholder" style="background-color: #555555; color: #ffffff; border-color: #333333; height: 22px;">
			  	<button type="submit" class="btn btn-inverse"><i class="icon-search"></i></button>
			</form>
			<ul class="topnav" id="secondary-menu">
			</ul>
			<ul class="topnav pull-right">
				<li>
					<a data-bind="attr: {href: page}">yourusername@company.com</a>
				</li>
				<li><a href="<?php echo base_url(); ?>admin" title="Admin"><i class="icon-sun"></i></a></li>
				<li><a href="#/manage" data-bind="click: logout"><i class="icon-power-off"></i></a></li>
			</ul>
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
							<a href="#/customers" data-bind="click: register">
								<img src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/customers.png" alt="Customer">
							</a>
							<span style="margin-top: 5px; font-size: 14px; font-weight: bold; color: #000000"><span data-bind="text: lang.lang.customer"></span></span>
						</li>
						<li style="text-align:center;">
							<a href="#/employees" data-bind="click: register">
								<img src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/employee.png" alt="Employee">
							</a>
							<span style="margin-top: 5px; font-size: 14px; font-weight: bold; color: #000000"><span data-bind="text: lang.lang.employee"></span></span>
						</li>
						<li style="text-align:center;">
							<a href="#/vendors" data-bind="click: register">
								<img src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/supplier.png" alt="Vendor">
							</a>
							<span style="margin-top: 5px; font-size: 14px; font-weight: bold; color: #000000"><span data-bind="text: lang.lang.vendor"></span></span>
						</li>
						<li style="text-align:center;">
							<a href="#/inventories" data-bind="click: register">
								<img src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/inventory.png" alt="Inventory">
							</a>
							<span style="margin-top: 5px; font-size: 14px; font-weight: bold; color: #000000"><span data-bind="text: lang.lang.inventory"></span></span>
						</li>
					</ul>
					<ul id="module-image">
						<li style="text-align:center;">
							<a href="#/customers" data-bind="click: register">
								<img src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/1.png" alt="Cash Management">
							</a>
							<span style="margin-top: 5px; font-size: 14px; font-weight: bold; color: #000000"><span data-bind="text: lang.lang.cashier"></span></span>
						</li>
						<li style="text-align:center;">
							<a href="#/accounts" data-bind="click: register">
								<img src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/accounting.png" alt="Customer">
							</a>
							<span style="margin-top: 5px; font-size: 14px; font-weight: bold; color: #000000"><span data-bind="text: lang.lang.accounting"></span></span>
						</li>
						<li style="text-align:center;">
							<a href="#/vendors" data-bind="click: register">
								<img src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/report.png" alt="Vendor">
							</a>
							<span style="margin-top: 5px; font-size: 14px; font-weight: bold; color: #000000"><span data-bind="text: lang.lang.report"></span></span>
						</li>
						<li style="text-align:center;">
							<a href="#/inventories" data-bind="click: register">
								<img src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/setting.png" alt="Inventory">
							</a>
							<span style="margin-top: 5px; font-size: 14px; font-weight: bold; color: #000000"><span data-bind="text: lang.lang.settings"></span></span>
						</li>
					</ul>
				</div>
				
			</div>	
		</div>
		<div class="span6">
			<div class="row">
				<div class="span8">
					<h2>Your Company Name</h2>
					<span id="today-date" data-bind="text: curDate"></span><br/>
					លេខពន្ធ: <span></span>
				</div>
				<div class="span3">
					
				</div>
				<div class="span12"><hr/></div>
				
				</div>
				<div class="span11">
					<input data-role="datepicker"
					   data-format="dd-MM-yyyy"
	                   data-bind="value: selectedDate,
	                   events: { change: dateChanges }">

					<div style="height: 300px;" id="index-income-graph"></div>
				</div>
				
				<div class="span12">
					<div class="row">
						<div class="padding-bottom-none-phone span6">
							<div class="widget-stats widget-stats-primary widget-stats-4" data-bind="click: register">
								<span class="txt">សមតុល្យសាច់ប្រាក់</span>
								<span class="count" style="font-size: 25px;" data-bind="text: cashBal"></span>
								<div class="clearfix"></div>
								<i class="icon-play-circle"></i>
							</div>
						</div>
						<div class="padding-bottom-none-phone span6">
							<div class="widget-stats widget-stats-primary widget-stats-4" data-bind="click: register">
								<span class="txt">លក់សរុប</span>
								<span class="count" style="font-size: 25px;" data-bind="text: totalSale"></span>
								<div class="clearfix"></div>
								<i class="icon-play-circle"></i>
							</div>
						</div>
					</div>						
				</div>
				<br>
				<div class="span12">
					<div class="widget widget-heading-simple widget-body-simple">		
		
						<div class="widget-body">

							<!-- Row -->
							<div class="row-fluid">
								<div class="span3">
								
									<!-- Stats Widget -->
									<div class="widget-stats widget-stats-gray widget-stats-1" data-bind="click: register">
										<span class="txt">វិក្កយបត្រមិនទាន់ទូទាត់</span>
										<div class="clearfix"></div>
										<span class="count" data-bind="text: totalOpenInvoice"></span>
									</div>
									<!-- // Stats Widget END -->
									
								</div>
								<div class="span3">
								
									<!-- Stats Widget -->
									<div class="widget-stats widget-stats-1" data-bind="click: register">
										<span class="txt">វិក្កយបត្រមិនទាន់បង់</span>
										<div class="clearfix"></div>
										<span class="count" data-bind="text: totalUnbill"></span>
									</div>
									<!-- // Stats Widget END -->
									
								</div>
								<div class="span3">
								
									<!-- Stats Widget -->
									<div class="widget-stats widget-stats-gray widget-stats-2" data-bind="click: register">
										<span class="count" data-bind="text: totalCustomer"></span>
										<span class="txt">អតិថិជនសរុប</span>
									</div>
									<!-- // Stats Widget END -->
									
								</div>
								<div class="span3">
								
									<!-- Stats Widget -->
									<div class="widget-stats widget-stats-2" data-bind="click: register">
										<span class="count">0</span>
										<span class="txt">បញ្ជាលក់</span>
									</div>
									<!-- // Stats Widget END -->
									
								</div>								
							</div>
							<!-- // Row END -->
							
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

	<div class="row-fluid">
		<div style="margin-top: 10px; margin-left: 0;" align="center">
			<p>© 2016 Banhji Co., Ltd. All rights reserved. Banhji is the registered trademarks of Banhji Co., Ltd. 
			<br>
			Terms and conditions, features, support, pricing, and service options subject to change without notice.</p>
		</div>	
	</div>
	<div id="signupForm" style="width: 300px;" data-bind="visible: showCreate">
		<div style="text-align: center; padding-right: 10px;">
			<input type="text" placeholder="Company Name" data-bind="value: current.company">
			<input type="text" style="width: 220px; margin-bottom: 10px;" placeholder="Country" data-role="combobox" data-bind="source: countries, value: current.country" data-text-field="name" data-value-field="id">
			<input type="text" style="width: 220px;" placeholder="Industry" data-role="combobox" data-bind="source: industries, value: current.industry" data-text-field="name" data-value-field="id"><br>
			<button class="btn btn-primary" style="width: 200px; margin-top: 10px;" data-bind="click: create">Create Company</button>
		</div>
	</div>	
</script>

<script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/js/libs/localforage.min.js"></script>
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
		page 	 : function() {
			return '\#/page';			
		},
		createComp : function() {
			banhji.router.navigate('/create_company');
		}
	});
	// banhji.institute = banhji.userManagement.getLogin()!==null?banhji.userManagement.getLogin().institute[0]:"";
	
	
	banhji.index = kendo.observable({
		
		register  : function(e) {
			e.preventDefault();
			
			// var win =$('#signupForm').kendoWindow({
			// 	title: "Create Company",
			// 	modal: true,
			// 	close: function(e) {
			// 		if(banhji.index.createDB.hasChanges()) {
			// 			banhji.index.createDB.cancelChanges();
			// 		}
			// 	},
			// 	open: function(e) {
			// 		banhji.index.createDB.insert(0, {
			// 			company: null,
			// 			country: null,
			// 			industry: null
			// 		});
			// 		banhji.index.setCurrent(banhji.index.createDB.at(0));
			// 	}
			// }).data('kendoWindow');
			// win.center().open();
			window.location.href = "<?php echo base_url(); ?>create";
		}
	});
		    	
	//END OF DAWINE  ---------------------------------------------------------------------------------


	<!-- views and layout -->
	banhji.view = {
		layout 		: new kendo.Layout('#layout', {model: banhji.Layout}),
		blank		: new kendo.View('<div></div>'),
		vendorMenu 	: new kendo.View("#vendor-menu-tmpl", {wrap: false, tagName: 'ul'}),
		// menu 		: new kendo.Layout('#menu-tmpl', {model: banhji.Layout}),
		// loginV 		: new kendo.View("#login-tmpl", {model: auth}),
		index  		: new kendo.Layout("#index", {model: banhji.index}),
		menu 		: new kendo.Layout('#menu-tmpl', {model: banhji.userManagement}),
		
		//END OF DAWINE  ---------------------------------------------------------------------------------
	};
	<!-- views and layout-->
	banhji.router = new kendo.Router({
		init: function() {
			// banhji.view.layout.render("#wrapperApplication");
			$('#current-section').html('|&nbsp;Company');
			$('#home-menu').addClass('active');
			banhji.view.layout.render("#wrapperApplication");
			// if(banhji.userManagement.getLogin() === false) {
			// 	window.location.assign("<?php echo base_url(); ?>home");
			// }
		},
		routeMissing: function(e) {
			// banhji.view.layout.showIn("#layout-view", banhji.view.missing);
			console.log("no resource found.")
		}
	});

	/* Login page */
	banhji.router.route('/', function(){

		banhji.view.layout.showIn('#menu', banhji.view.menu);

		banhji.view.layout.showIn('#content', banhji.view.index);
		$("#index-income-graph").kendoChart({
	            title: {
	                text: "Gross domestic product growth \n /GDP annual %/"
	            },
	            legend: {
	                position: "bottom"
	            },
	            chartArea: {
	                background: ""
	            },
	            seriesDefaults: {
	                type: "line",
	                style: "smooth"
	            },
	            series: [{
	                name: "India",
	                data: [3.907, 7.943, 7.848, 9.284, 9.263, 9.801, 3.890, 8.238, 9.552, 6.855]
	            },{
	                name: "World",
	                data: [1.988, 2.733, 3.994, 3.464, 4.001, 3.939, 1.333, -2.245, 4.339, 2.727]
	            },{
	                name: "Russian Federation",
	                data: [4.743, 7.295, 7.175, 6.376, 8.153, 8.535, 5.247, -7.832, 4.3, 4.3]
	            },{
	                name: "Haiti",
	                data: [-0.253, 0.362, -3.519, 1.799, 2.252, 3.343, 0.843, 2.877, -5.416, 5.590]
	            }],
	            valueAxis: {
	                labels: {
	                    format: "{0}%"
	                },
	                line: {
	                    visible: false
	                },
	                axisCrossingValue: -10
	            },
	            categoryAxis: {
	                categories: [2002, 2003, 2004, 2005, 2006, 2007, 2008, 2009, 2010, 2011],
	                majorGridLines: {
	                    visible: false
	                },
	                labels: {
	                    rotation: "auto"
	                }
	            },
	            tooltip: {
	                visible: true,
	                format: "{0}%",
	                template: "#= series.name #: #= value #"
	            }		
			});
	});	
	//END OF DAWINE  ---------------------------------------------------------------------------------
	
	$(function() {	
		banhji.router.start();
		// if(!banhji.userManagement.getLogin()){
		// 	window.location.assign("<?php echo base_url(); ?>home");
		// } else {
		// 	if(banhji.currency.dataSource.data().length === 0) {
		// 		banhji.currency.dataSource.read();
		// 	}	
		// }
	});
</script>