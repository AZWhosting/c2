<div class="container-fluid menu-hidden sidebar-hidden-phone fluid menu-left hidden-print">
	<div class="navbar main" id="main-menu">
		<ul class="topnav">
			<li class="dropdown dd-1 span3">
				<a href="\#" class="dropdown-toggle" data-toggle="dropdown" id="brand-menu">Banhji <span id="current-section"></span></a>
				<ul class="dropdown-menu" id="dropdownMenu">
					<li id="home-menu"><a href="#">គេហទំព័រ</a></li>
					<li id="customer-menu"><a href="#customer">អតិថិជន</a></li>
					<li id="vendor-menu"><a href="#vendor">អក្នផ្គត់ផ្គង់</a></li>
					<li id="account-menu"><a href="#accounting">គណនេយ្យ</a></li>
					<li id="electricity-menu"><a href="#electricity">អគ្គីសនី</a></li>
					<li id="water-menu"><a href="#water">ទឹកស្អាត</a></li>
					<li class="divider"></li>
					<li id="myac-menu"><a href="#account">គណនីខ្ញុំ</a></li>
	        	</ul>
	        </li>
		</ul>
		<ul class="topnav pull-right">
			<li><a href="#account"><span id="myacc"></span></a></li>
			<li><a href="#logout" class="glyphicons power"><i></i>ចាក់ចេញ</a></li>
		</ul>
		<ul class="topnav" id="secondary-menu">
		</ul>
	</div>
</div>
<div id="wrapperApplication"></div>

<!-- template section starts -->
<script type="text/x-kendo-template" id="layout">
	<div id="content"></div>
	<div class="push"></div>
</script>
<script type="text/x-kendo-template" id="myId">
</script>
<script type="text/x-kendo-template" id="welcome">
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span6">
				<ul id="module-image">
					<li>
						<a href="<?php echo base_url(); ?>heang#exemption/1">
							<img src="<?php echo base_url(); ?>resources/img/Customer.png" alt="Customer">
						</a>
					</li>
					<li>
						<a href="<?php echo base_url(); ?>heang#maintenance/1">
							<img src="<?php echo base_url(); ?>resources/img/Vendor.png" alt="Vendor">
						</a>
					</li>
					<li>
						<a href="<?php echo base_url(); ?>heang#tariff/1">
							<img src="<?php echo base_url(); ?>resources/img/Accounting.png" alt="Accounting">
						</a>
					</li>
					<li>
						<a href="<?php echo base_url(); ?>dawine#uInvoice/electricity">
							<img src="<?php echo base_url(); ?>resources/img/Inventory.png" alt="Inventory">
						</a>
					</li>
					<li>
						<a href="<?php echo base_url(); ?>heang#exemption">
							<img src="<?php echo base_url(); ?>resources/img/Electricity.png" alt="Electricity">
						</a>
					</li>
					<li>
						<a href="<?php echo base_url(); ?>dawine#reading/electricity">
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
<div class="container-fluid mainContainer">
	<div class="row full-height">
		<div id="mySidebar" class="span2 main full-height">
			<ul class="nav nav-list">
				<li><a href="#company">My Information</a></li>
				<li><a href="#company">Change Password</a></li>
				<li><a href="#company">Change Language</a></li>
				<li class="divider"></li>
				<li><a href="#company">Company</a></li>
			</ul>
		</div>
		<div id="myContent" class="span10">Content</div>
	</div>
</div>
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
				<button class="btn" data-bind="click:register">ចុះឈ្មោះ</button>
			</div>
		</div>
	</div>
	<div id="dialog" style="visibility: hidden">សូមពិនិត្យអីម៉េល​ រឺ លេខសំងាត់។</div>
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
<script id="exemption" type="text/x-kendo-template">
	<div class="container-fluid">
		<div class="span12">
			<div id="example">
			    <div class="demo-section k-header">
			        <div class="box-col">
			        	<table>
			        		<tr>
			        			<td>
						        	<h4>តារាងឈ្មោះ</h4>		        	   
						        	<br>
							       	<div data-role="grid"
							                 date-scrollable="true"
							                 data-row-template="exemption-row-template"
							                 data-editable="true"
							                 data-columns="[
							                 				 { 'field': '', width: 20 },
							                                 { 'field': 'ឈ្មោះ ', 'width': 200 },
							                                 { 'field': 'ចំនួន' },
							                                 { 'field': '' }				                                 
							                              ]"
							                 data-bind="source: exemptionList"
							                 style="width: 500px; height: 200px">
							        </div>

							        <br>	

						    		<div>
						    			<button class="btn btn-inverse" data-bind="click: addExemptionRow"><i class="icon-plus icon-white"></i></button>
					    				<button data-bind="click: saveChangeExemption">កត់ត្រា</button>
					    				<button data-bind="click: cancelChangeExemption">មិនយក</button>
					    			</div>
					    		</td>
					    		<td>
		    						<div style="width: 100px"/>						
		    					</td>		    					
			    			<tr>
			    		</table>					     		           
           	       </div>		       
			    </div> 
    		</div>
		</div>
	</div>	
</script>
<script id="exemption-row-template" type="text/x-kendo-tmpl">
	<tr>
		<td>
			<i class="icon-trash" data-bind="click: removeRowExemption"></i>			
		</td>
		<td>
			<input id="name" name="name" type="text" 
					data-bind="value: name" style="margin-bottom: 0;" />
		</td>
		<td>
			<input id="amount" name="amount" data-role="customtextbox" 
					data-format="n0" data-min="1"
					data-bind="value: amount"
					style="width: 60px;" />
		</td>	
		<td>
			<select id="type" name="type" data-role="dropdownlist" 
					data-text-field="name" data-value-field="id" 
					data-bind="source: typeList"
					style="width:80px">
			</select>
		</td>		
		
	</tr>
</script>
<script id="maintenance" type="text/x-kendo-template">
	<div class="container-fluid">
		<div class="span12">
			<div id="example">
			    <div class="demo-section k-header">
			        <div class="box-col">
			        	<table>
			        		<tr>			        			
		    					<td>					    			
									<h4>តារាងឈ្មោះ</h4>	     				     			
									<br>  	
							        <div data-role="grid"
							                 date-scrollable="true"
							                 data-row-template="maintenance-row-template"
							                 data-editable="true"			                 
							                 data-columns="[
							                 				 { 'field': '', width: 20 },
							                                 { 'field': 'ឈ្មោះ ', 'width': 200 },
							                                 { 'field': 'ចំនួន', width: 150},
							                                 { 'field': '' }
							                              ]"
							                 data-bind="source: maintenanceList"
							                 style="width: 500px	; height: 200px">						                
							        </div>

								    <br>
									
					    			<div>
					    				<button class="btn btn-inverse" data-bind="click: addMaintenanceRow"><i class="icon-plus icon-white"></i></button>
					    				<button data-bind="click: saveChangeMaintenance">កត់ត្រា</button>
					    				<button data-bind="click: cancelChangeMaintenance">មិនយក</button>
					    			</div>
					    		</td>
			    			<tr>
			    		</table>					     		           
           	       </div>		       
			    </div> 
    		</div>
		</div>
	</div>	
</script>
<script id="maintenance-row-template" type="text/x-kendo-tmpl">
	<tr>
		<td>
			<i class="icon-trash" data-bind="click: removeRowMaintenance"></i>			
		</td>
		<td>
			<input id="name" name="name" type="text" 
					data-bind="value: name" style="margin-bottom: 0;" />
		</td>
		<td>
			<input id="amount" name="amount" data-role="customtextbox" 
					data-format="n0" data-min="1"
					data-bind="value: amount" style="width: 150px;" />
		</td>	
		<td>
			<select id="type" name="type" data-role="dropdownlist" 
					data-text-field="name" data-value-field="id" 
					data-bind="source: typeList"
					style="width:80px">
			</select>
		</td>	
			
	</tr>
</script>
<script id="tariff" type="text/x-kendo-template">
	<div class="container-fluid">
		<div class="span12">
			<div id="example">
			    <div class="demo-section k-header">
			        <div class="box-col">
			        	<table>
			        		<tr>			        			
		    					<td>					    			
									<h4>តារាងឈ្មោះ</h4>	     				     			
									<br>  	
							        <div data-role="grid"
							                 date-scrollable="true"
							                 data-row-template="tariff-row-template"
							                 data-editable="true"			                 
							                 data-columns="[
							                 				 { 'field': '', width: 20 },
							                                 { 'field': 'ឈ្មោះ ', 'width': 170 },
							                                 { 'field': 'ចំនួន', width: 150},
							                                 { 'field': '' },
							                                 { 'field': '', width: 40}
							                              ]"
							                 data-bind="source: tariffList"
							                 style="width: 500px	; height: 200px">						                
							        </div>

								    <br>
									
					    			<div>
					    				<button class="btn btn-inverse" data-bind="click: addTariffRow"><i class="icon-plus icon-white"></i></button>
					    				<button data-bind="click: saveChangeTariff, disabled: disabled">កត់ត្រា</button>
					    				<button data-bind="click: cancelChangeTariff">មិនយក</button>
					    			</div>
					    		</td>
					    		<td>
					    		</td>
					    		<td>
					    		</td>
					    		<td>					    			
									<h4>តារាងតំលែ</h4>	     				     			
									<br>  	
							        <div data-role="grid"
							                 date-scrollable="true"
							                 data-row-template="tariffItem-row-template"
							                 data-editable="true"			                 
							                 data-columns="[
							                 				 { 'field': '', width: 20 },
							                                 { 'field': 'ឈ្មោះ ', 'width': 100 },
							                                 { 'field': 'ចំនួន', width: 100},
							                                 { 'field': '', width: 20 }							                               
							                              ]"
							                 data-bind="source: tariffItemList"
							                 style="width: 300px	; height: 200px">						                
							        </div>

								    <br>
									
					    			<div>
					    				<button class="btn btn-inverse" data-bind="click: addTariffItemRow"><i class="icon-plus icon-white"></i></button>
					    				<button data-bind="click: saveChangeTariffItem">កត់ត្រា</button>
					    				<button data-bind="click: cancelChangeTariffItem">មិនយក</button>
					    			</div>
					    		</td>
			    			<tr>
			    		</table>					     		           
           	       </div>		       
			    </div> 
    		</div>
		</div>
	</div>	
</script>
<script id="tariff-row-template" type="text/x-kendo-tmpl">
	<tr>
		<td>
			<i class="icon-trash" data-bind="click: removeRowTariff"></i>			
		</td>
		<td>
			<input id="name" name="name" type="text" 
					data-bind="value: name" style="margin-bottom: 0;" />
		</td>
		<td>
			<input id="amount" name="amount" data-role="customtextbox" 
					data-format="n0" data-min="1"
					data-bind="value: amount" style="width: 150px;" />
		</td>	
		<td>
			<select id="type" name="type" data-role="dropdownlist" 
					data-text-field="name" data-value-field="id" 
					data-bind="source: typeList"
					style="width:80px">
			</select>
		</td>
		<td>
			 <button data-role="button" id="summaryTariff"
                    data-sprite-css-class="k-icon k-i-note"
                    data-bind="click: summaryTariff"                    
            ></button>
		</td>	
			
	</tr>
</script>
<script id="tariffItem-row-template" type="text/x-kendo-tmpl">
	<tr>
		<td>
			<i class="icon-trash" data-bind="click: removeRowTariffItem"></i>			
		</td>	
		<td>
			<input id="usage" name="usage" 
				data-role="numerictextbox" 
				data-format="n" data-min="1"
				data-bind="value: usage"
				style="width: 80px;" />
		</td>
		<td>
			<input id="price" name="price" 
				data-role="numerictextbox"				
				data-bind="value: price" style="width: 80px;" />
		</td>
		<td>			
			<input type="checkbox" data-bind="checked: isChecked" />						
		</td>		
	</tr>
</script>



<!--  template section ends  -->
<script src="https://localhost/banhji/resources/js/libs/localforage.min.js"></script>
<script>
	var banhji = banhji || {};
	var baseUrl = 'https://localhost/banhji/api/';
	banhji.token = null;
	localforage.config({
		driver: localforage.LOCALSTORAGE,
		name: 'userData'
	});
	
	banhji.Layout = kendo.observable({
		locale: "km-KH",
		init: function() {
			// initialize when the whole page load
		},
		ui: function() {
			// get UI information from source base on locale
		}
	});
	var auth   = kendo.observable({
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
					banhji.router.navigate('/');
					user.set('current', value);
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
			return JSON.parse(localStorage.getItem('userData/user'));
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
	var user = kendo.observable({
		data: null,
		auth: auth,
		showEmail: true,
		login: function() {
			var key = localStorage.key(0);
			return JSON.parse(localStorage.getItem(key));
		}
	});
	var admin = kendo.observable({
		hasCompany : function() {
			var company = auth.get('current').companies ? auth.get('current').companies : null;
			if(company !== null) {
				return true;
			}
			return false;
		},
		getCompanies: function() {
			if(this.hasCompany) {
				return auth.get('current').companies;
			}
			return null;
		},
		editInfo: function() {},
		save: function(){}
	});
	//Heang -----------------------------------------------------------------------------------------
	banhji.ds = {		
		feeDS : new kendo.data.DataSource({
			transport: {
				read: {
					url: baseUrl + "fees/index",
					type: "GET",
					dataType: "json"
				},
				create: {
					url: baseUrl + "fees/index",
					type: "POST",
					dataType: "json"
				},
				update: {
					url: baseUrl + "fees/index",
					type: "PUT",
					dataType: "json"
				},
				destroy: {
					url: baseUrl + "fees/index",
					type: "DELETE",
					dataType: "json"
				},
				parameterMap : function(options, operation) {
					if( operation !== "read" && options.models ) {
						return { models: kendo.stringify(options.models) };
					}
					return options;
				}
			},
			serverFiltering: true,	
			batch: true,			
			schema: {
				model: {
					id: "id"
				},
				data: "results",
				total: "total"	
			}
		}),
		tariffItemDS : new kendo.data.DataSource({
			transport: {
				read: {
					url: baseUrl + "tariff_items/index",
					type: "GET",
					dataType: "json"
				},
				create: {
					url: baseUrl + "tariff_items/index",
					type: "POST",
					dataType: "json"
				},
				update: {
					url: baseUrl + "tariff_items/tariff_item",
					type: "PUT",
					dataType: "json"
				},
				destroy: {
					url: baseUrl + "tariff_items/tariff_item",
					type: "DELETE",
					dataType: "json"
				},
				parameterMap : function(options, operation) {
					if( operation !== "read" && options.models ) {
						return { models: kendo.stringify(options.models) };
					}
					return options;
				}
			},
			serverFiltering: true,	
			batch: true,			
			schema: {
				model: {
					id: "id"
				},
				data: "results",
				total: "total"	
			}
		}),
		
	};	
	banhji.exemption = kendo.observable({	
		
		name 			: null,
		amount 			: null,
		unit 			: "",

		typeList : [
            { "id": "1", "name": "%" },
            { "id": "2", "name": "usage" },
            { "id": "3", "name": "money" }	           
        ], 

		exemptionList : banhji.ds.feeDS,		
		pageLoad: function(utility){

			banhji.ds.feeDS.filter([
				{ field: "company_id", value: 1},
				{ field: "utility_id", value: utility},
				{ field: "type", value: "exemption"}		
			]);
		},
		addExemptionRow: function(){	        							
			banhji.ds.feeDS.insert(0,{
				
				"type" 			: "exemption",
				"utility_id" 	: 1,							
				"name" 			: "",
				"amount"  		: "",
				"unit"			: "",
				"company_id" 	: 1,
				"status"		: 1

			});													
		},	
		saveChangeExemption: function(){
			banhji.ds.feeDS.sync();
		},
		cancelChangeExemption: function(){
			banhji.ds.feeDS.cancelChanges();
		},
		removeRowExemption 		: function(e){
      		if (confirm("តើលោកអ្នកពិតជាចង់លុបទិន្នន័យនេះមែនឬទេ?")) {
      			var d = e.data;				
				banhji.ds.feeDS.remove(d);
	            banhji.ds.feeDS.sync();   		                    
	        }
      	}      			
	});
	banhji.maintenance = kendo.observable({	
		
		name 			: null,
		amount 			: null,
		

		typeList : [
            { "id": "%", "name": "%" },
            { "id": "usage", "name": "usage" },
            { "id": "money", "name": "money" }	           
        ], 			
		maintenanceList: banhji.ds.feeDS,

		pageLoad: function(utility){

			banhji.ds.feeDS.filter([
				{ field: "company_id", value: 1},
				{ field: "utility_id", value: utility},
				{ field: "type", value: "maintenance"}
			]);
		},
      	addMaintenanceRow: function(){	        							
			banhji.ds.feeDS.insert(0,{
				
				"type" 			: "maintenance",
				"utility_id" 	: 1,							
				"name" 			: "",
				"amount"  		: "",
				"unit"			: "",
				"company_id" 	: 1,
				"status"		: 1

			});													
		},				
		saveChangeMaintenance: function(){
			banhji.ds.feeDS.sync();
		},
		cancelChangeMaintenance: function(){
			banhji.ds.feeDS.cancelChanges();
		},
		removeRowMaintenance	: function(e){
      		if (confirm("តើលោកអ្នកពិតជាចង់លុបទិន្នន័យនេះមែនឬទេ?")) {
      			var d = e.data;				
				banhji.ds.feeDS.remove(d);
	            banhji.ds.feeDS.sync();   		                    
	        }
      	}		
	});
	banhji.tariff = kendo.observable({	
		
			tariff 		: null,
			isChecked	: null,
			tariffName 	: "",
			currencyTariff: 0,
			
		    typeList : [
	            { "id": "%", "name": "%" },
	            { "id": "usage", "name": "usage" },
	            { "id": "money", "name": "money" }	           
	        ], 		
			tariffList : banhji.ds.feeDS,
			tariffItemList : banhji.ds.tariffItemDS,			
			
			pageLoad: function(utility){

				banhji.ds.feeDS.filter([
					{ field: "company_id", value: 1},
					{ field: "utility_id", value: utility},
					{ field: "type", value:"tariff" }
				]);
			},	        
	        summaryTariff : function(e){	        	 
				e.preventDefault();
				var data = e.data;
				console.log(data);
				this.set("tariff", data);

				banhji.ds.tariffItemDS.filter({ field: "fee_id", value: data.id });
				$("#button").kendoButton({
   				 disabled: false
				});				
	        },	        
	        addTariffRow: function(){	        							
				banhji.ds.feeDS.insert(0,{

					"type" 			: "tariff",
					"utility_id" 	: 1,							
					"name" 			: "",
					"amount"  		: "",
					"unit"			: "",
					"company_id" 	: 1,
					"status"		: 1

				});													
			},				
			saveChangeTariff: function(){
				banhji.ds.feeDS.sync();				
			},
			cancelChangeTariff: function(){
				banhji.ds.feeDS.cancelChanges();
			},
			
			removeRowTariff 		: function(e){
	      		if (confirm("តើលោកអ្នកពិតជាចង់លុបទិន្នន័យនេះមែនឬទេ?")) {
      				var d = e.data;				
					banhji.ds.feeDS.remove(d);
		            banhji.ds.feeDS.sync();   		                    
		        }
	      	},
	      	// flatChange 	: function(e){				
			
	       //  	var check = this.get("chkAll");
	       //  	if (check){
	        	
	       //  	}else{
	        		
	       //  	}
	       //  },	
	      	addTariffItemRow : function(){      		
	      		
				banhji.ds.tariffItemDS.insert(0,{	
					fee_id: banhji.ds.tariffItemDS.id,				
					usage : "",
					price :"",
					is_flat: true,
					company_id: 1										
				});													
			},
			saveChangeTariffItem : function(){
				banhji.ds.tariffItemDS.sync();
			},
			cancelChangeTariffItem: function(){
				banhji.ds.tariffItemDS.cancelChanges();
			},
			removeRowTariffItem		: function(e){
	      		if (confirm("តើលោកអ្នកពិតជាចង់លុបទិន្នន័យនេះមែនឬទេ?")) {
	      			var d = e.data;				
					banhji.ds.tariffItemDS.remove(d);
		            banhji.ds.tariffItemDS.sync();   		                    
		        }
	      	},						
	});
	
	<!-- //views and layout -->
	banhji.view = {
		layout: new kendo.Layout('#layout'),
		loginV: new kendo.View("#login-tmpl", {model: auth}),
		companyL: new kendo.Layout("#company", {model: admin}),
		welcome: new kendo.View("#welcome"),				
		exemption: new kendo.View("#exemption", {model: banhji.exemption}),
		maintenance: new kendo.View("#maintenance", {model: banhji.maintenance}),
		tariff: new kendo.View("#tariff", {model: banhji.tariff}),
		

		myPage: new kendo.Layout("#myId", {model: admin})
	};
	<!-- //End of views and layout -->

	banhji.router = new kendo.Router({
		init: function() {			
			$('#current-section').html('|&nbsp;Company');
			$('#home-menu').addClass('active');
			auth.init();
			banhji.view.layout.render("#wrapperApplication");
		},
		routeMissing: function(e) {
			// banhji.view.layout.showIn("#layout-view", banhji.view.missing);
			console.log("no resource found.")
		}
	});

	banhji.router.route("/", function(){
		auth.init();
		$('#current-section').html('|&nbsp;គេហទំព័រ');
		$('#home-menu').siblings().removeClass('active');
		$('#home-menu').addClass('active');

		banhji.view.layout.showIn("#content", banhji.view.welcome);
	});	

	banhji.router.route("login", function(){
		banhji.view.layout.showIn('#content', banhji.view.loginV);		
	});
	banhji.router.route("logout", function(){
		auth.logout();
	});
	banhji.router.route("exemption/:utility", function(utility){
		banhji.view.layout.showIn("#content", banhji.view.exemption);

		var vm = banhji.exemption;
		vm.pageLoad(utility);
			
	});	
	banhji.router.route("maintenance/:utility", function(utility){	
		banhji.view.layout.showIn("#content", banhji.view.maintenance);	
		var vm = banhji.maintenance;
		vm.pageLoad(utility);
	});	

	banhji.router.route("tariff/:utility", function(utility){	
		banhji.view.layout.showIn("#content", banhji.view.tariff);	
		var vm = banhji.tariff;
		vm.pageLoad(utility);
	});
	
	
	$(function() {	
		banhji.router.start();
	});
</script>