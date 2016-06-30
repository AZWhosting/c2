<div id="wrapperApplication" class="container-fluid"></div>
<!-- template section starts -->
<script type="text/x-kendo-template" id="layout">
	<div id="menu"></div>			
	<div id="content" class="row-fluid"></div>
</script>
<script type="text/x-kendo-template" id="menu-tmpl">
	<div class="menu-hidden sidebar-hidden-phone fluid menu-left hidden-print">
		<div class="navbar main" id="main-menu">
			<ul class="topnav">
				<li class="dropdown dd-1 span3">
					<a href="\#" class="dropdown-toggle brand" data-toggle="dropdown" id="brand-menu">BanhJi <span id="current-section"></span></a>
					<ul class="dropdown-menu" id="dropdownMenu">
						<li id="home-menu"><a href="#">គេហទំព័រ</a></li>
						<li id="customer-menu"><a href="#/customers">អតិថិជន</a></li>
						<li id="vendor-menu"><a href="#/vendors">អក្នផ្គត់ផ្គង់</a></li>
						<li id="account-menu"><a href="#/accounts">គណនេយ្យ</a></li>
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
			
	<!-- Brand -->
	<a href="index_slider_fullwidth.html?lang=en" class="appbrand pull-left"><span class="text-primary">FLAT</span> KIT</a>
	
	<ul class="topnav pull-right">
		
		<li class="dropdown dd-1 active">
			<a href="" data-toggle="dropdown">Home pages <span class="caret"></span></a>
			<ul class="dropdown-menu pull-left">
				<li class=""><a href="index.html?lang=en">Home page #1</a></li>
				<li class=""><a href="index_2.html?lang=en">Home page #2</a></li>
				<li class=""><a href="index_slider.html?lang=en">Revolution Slider Fixed</a></li>
				<li class=" active"><a href="index_slider_fullwidth.html?lang=en">Revolution Slider Wide</a></li>
			</ul>
		</li>
		<li><a href="about.html?lang=en">About</a></li>
		<li><a href="pricing.html?lang=en">Pricing</a></li>
		<li class="dropdown dd-1">
			<a href="" data-toggle="dropdown">Shop <span class="caret"></span></a>
			<ul class="dropdown-menu pull-left">
				<li class=""><a href="shop.html?lang=en">Catalog</a></li>
				<li class=""><a href="shop_product.html?lang=en">Product page</a></li>
				<li class=""><a href="shop_cart.html?lang=en">Shopping Cart</a></li>
			</ul>
		</li>
		<li class="dropdown dd-1">
			<a href="" data-toggle="dropdown">Blog <span class="caret"></span></a>
			<ul class="dropdown-menu pull-right">
				<li class=""><a href="blog.html?lang=en">Blog Posts</a></li>
				<li class=""><a href="blog_timeline.html?lang=en">Blog Timeline</a></li>
			</ul>
		</li>
		<li><a href="contact.html?lang=en">Contact</a></li>
		
	</ul>
	<div class="clearfix"></div>
	<!-- // Top Menu Right END -->
	
	</div>
	
 	<div class="container-960">
 		<div class="row">
 			<div class="span12">
 				<h1>BanhJi</h1>
 			</div>
 		</div> 		
		<div class="row">
			<div class="span4">
				<div class="widget widget-heading-simple widget-body-gray">
					<div class="widget-head">
						<h2 class="heading"><i class="icon-unlock"></i></h2>
					</div>
					<div class="widget-body">
						<label for="email">អីម៉ែល</label>
						<input class="input-block-level" type="email" placeholder="email" data-bind="value: username, events: {onmouseout: validateEmail}">
						<label for="password">លេខសំងាត់</label>
						<input class="input-block-level" type="password" placeholder="password" data-bind="value: password">
						<div class="separator bottom"></div>
						<div class="separator bottom"></div>
						<button class="btn btn-primary btn-block" data-bind="click: login">ចូល</button>
					</div>
				</div>			
			</div>
			<div class="span1"></div>
			<div class="span7">
				<div class="widget widget-heading-simple">
					<div class="widget-head">
						<h2 class="heading"><i class="icon-edit"></i> ចុះឈ្មោះ</h2>
					</div>
					<div class="widget-body">
						<div class="row-fluid">
							<div class="span6">
								<label for="email">អីម៉ែល</label>
								<input class="input-block-level" type="email" placeholder="email" data-bind="value: username">
								<label for="password">លេខសំងាត់</label>
								<input class="input-block-level" type="password" placeholder="password" data-bind="value: password">
								<label for="password">វាយលេខសំងាត់ម្ដងទៀត</label>
								<input type="password" placeholder="password" data-bind="value: _password">
								<div class="separator bottom"></div>
								<button class="btn btn-success btn-block" data-bind="click: signup">ចុះឈ្មោះ</button>
							</div>
							<div class="span6">
								
							</div>
						</div>
					</div>
				</div>						
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
	page
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
<!-- Accounting Section Ends -->
<!--  template section ends  -->
<script src="<?php echo base_url(); ?>resources/js/libs/localforage.min.js"></script>
<script>
	var banhji = banhji || {};
	var baseUrl = "<?php echo base_url(); ?>"+'api/';
	
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
					if(user.institute.length === 0) {
						banhji.router.navigate('/page/' + user.id);
					} else {
						banhji.router.navigate('/app/' + user.id);
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

	banhji.users = kendo.observable({
		dataStore	: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: baseUrl + 'banhji/users',
					type: "GET",
					headers: {
						"Entity": banhji.userManagement.getLogin() === null ? '': banhji.userManagement.getLogin().institute[0].id,
						"User": banhji.userManagement.getLogin() === null ? '': banhji.userManagement.getLogin().id
					},
					dataType: 'json'
				},
				create 	: {
					url: baseUrl + 'banhji/users',
					type: "POST",
					headers: {
						"Entity": banhji.userManagement.getLogin() === null ? '': banhji.userManagement.getLogin().institute[0].id,
						"User": banhji.userManagement.getLogin() === null ? '': banhji.userManagement.getLogin().id
					},
					dataType: 'json'
				},
				update 	: {
					url: baseUrl + 'banhji/users',
					type: "PUT",
					headers: {
						"Entity": banhji.userManagement.getLogin() === null ? '': banhji.userManagement.getLogin().institute[0].id,
						"User": banhji.userManagement.getLogin() === null ? '': banhji.userManagement.getLogin().id
					},
					dataType: 'json'
				},
				destroy : {
					url: baseUrl + 'banhji/users',
					type: "DELETE",
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
	banhji.view = {
		layout 		: new kendo.Layout('#layout', {model: banhji.Layout}),
		loginView 	: new kendo.View('#login-template', {model: banhji.userManagement}),
		menu 		: new kendo.View('#menu-tmpl')
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
		banhji.view.layout.showIn('#content', banhji.view.loginView);
	});

	banhji.router.route('/manage', function(){
		banhji.view.layout.showIn('#content', banhji.view.loginView);
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

	// inventory section

	// electricity vendor

	$(function() {	
		banhji.router.start();
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/');
		}
	});
</script>
