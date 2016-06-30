<!DOCTYPE html>
<!--[if lt IE 7]> <html class="front ie lt-ie9 lt-ie8 lt-ie7 fluid top-full menuh-top"> <![endif]-->
<!--[if IE 7]>    <html class="front ie lt-ie9 lt-ie8 fluid top-full menuh-top sticky-top"> <![endif]-->
<!--[if IE 8]>    <html class="front ie lt-ie9 fluid top-full menuh-top sticky-top"> <![endif]-->
<!--[if gt IE 8]> <html class="animations front ie gt-ie8 fluid top-full menuh-top sticky-top"> <![endif]-->
<!--[if !IE]><!--><html class="animations front fluid top-full menuh-top sticky-top"><!-- <![endif]-->
<head>
	<title>Banhji</title>
	
	<!-- Meta -->
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE" />
	
	<!-- Bootstrap -->
	<link href="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/common/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
	<link href="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/common/bootstrap/css/responsive.css" rel="stylesheet" type="text/css" />
	
	<!-- Glyphicons Font Icons -->
	<link href="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/common/theme/fonts/glyphicons/css/glyphicons.css" rel="stylesheet" />
	
	<link rel="stylesheet" href="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/common/theme/fonts/font-awesome/css/font-awesome.min.css">
	<!--[if IE 7]><link rel="stylesheet" href="<?php echo base_url(); ?>resources/common/theme/fonts/font-awesome/css/font-awesome-ie7.min.css"><![endif]-->
	
	<!-- Uniform Pretty Checkboxes -->
	<link href="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/common/theme/scripts/plugins/forms/pixelmatrix-uniform/css/uniform.default.css" rel="stylesheet" />
	
	<!-- Bootstrap Extended -->
	<link href="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/common/bootstrap/extend/bootstrap-select/bootstrap-select.css" rel="stylesheet" />
	
	<!-- JQueryUI -->
	<link href="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/common/theme/scripts/plugins/system/jquery-ui/css/smoothness/jquery-ui-1.9.2.custom.min.css" rel="stylesheet" />
	
	<!-- MiniColors ColorPicker Plugin -->
	<link href="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/common/theme/scripts/plugins/color/jquery-miniColors/jquery.miniColors.css" rel="stylesheet" />
	
	<!-- Google Code Prettify Plugin -->
	<link href="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/common/theme/scripts/plugins/other/google-code-prettify/prettify.css" rel="stylesheet" />

	<!-- Main Theme Stylesheet :: CSS -->
	<link href="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/common/theme/css/style-default-menus-light.css?1374506533" rel="stylesheet" />
	<link href="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/common/theme/skins/css/amazon.css" rel="stylesheet" />
	
	<link rel="stylesheet" href="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/js/kendoui/styles/kendo.common.min.css">
	<link rel="stylesheet" href="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/js/kendoui/styles/kendo.bootstrap.min.css">
	<link rel="stylesheet" href="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/js/kendoui/styles/kendo.dataviz.material.min.css">
	<link rel="stylesheet" href="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/js/kendoui/styles/kendo.dataviz.bootstrap.min.css">
	<link href='https://fonts.googleapis.com/css?family=Battambang:400,700' rel='stylesheet' type='text/css'>
	<style>
		html {
			font-family: 'Battambang', cursive;
		}
		body {
			font-family: 'Battambang', cursive;
		}
	</style>
	<!-- LESS.js Library -->
	<script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/common/theme/scripts/plugins/system/less.min.js"></script>
</head>
<body>
	<div id="wrapperApplication" class="container-fluid">	
	</div>

	<!-- template -->
	<script type="text/x-kendo-template" id="layout">
		<div class="navbar main hidden-print">
			<div class="container-960">
				<!-- Brand -->
				<a href="index_slider_fullwidth.html?lang=en&amp;style=style-default-menus-light" class="appbrand pull-left"><span class="text-primary"><img src="<?php echo base_url();?>uploads/logo/logo.png"></span></a>
				
				<div class="clearfix"></div>
				<!-- // Top Menu Right END -->	
			</div>	
		</div>
		<div id="content"></div>
	</script>
	<script type="text/x-kendo-template" id="login-template">
		<div class="container-fluid menu-hidden">	
			<div class="container-960 innerT">
				<div class="row-fluid innerTB">
					<div class="span4">
						<div class="widget widget-heaing-simple widget-body-white">
							<div class='widget-body'>
								<label>អុីម៉េល</label>
								<input class="input-block-level" type="email" data-bind="value: username, events: {onmouseout: validateEmail}">
								<label>លេខសំងាត់</label>
								<input class="input-block-level" type="password" data-bind="value: password">
								<div class="separator buttom"></div>
								<button class="btn​ btn-default btn-block" data-bind="click: login">ចាក់ចូល</button>
							</div>
						</div>
					</div>
					<div class="span2"></div>
					<div class="span5">
						<div class="row">
							<div class="span6">
								<label for="">អុីម៉េល</label>
								<input class="input-block-level" type="email" data-bind="value: username">
								<label for="password">លេខសំងាត់</label>
								<input class="input-block-level" type="password" data-bind="value: password">
								<label for="password">បញ្ចូលលេខសំងាត់ម្ដងទៀត</label>
								<input class="input-block-level" type="password" data-bind="value: _password">
								<div class="separator buttom"></div>
								<button class="btn​ btn-primary btn-block" data-bind="click: signup">ចុះឈ្មោះ</button>
							</div>
							<div class="span6">
								<div class="separator buttom"></div>
								<div class="separator buttom"></div>
								<div class="tablet-column-reset hidden-tablet pull-right">
									<div class="social-large pull-right">
										<a href="https://www.facebook.com/BanhjiApp" class="glyphicons facebook"><i></i>facebook</a>
										<a href="" class="glyphicons skype"><i></i>skype</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
					
				<!--  Copyright Line -->
				<div class="copy">
					&copy; 2013 - <a href="http://www.banhji.com">BanhJi</a>
				</div>
				<!--  End Copyright Line -->	
			</div>
		</div>
	</script>
	<!-- end template -->

	<!-- JQuery -->
	<script>window.jQuery || document.write('<script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/js/libs/jquery-1.8.2.min.js"><\/script>')</script>
	<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/js/kendoui/js/kendo.all.min.js"></script>
	<script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/js/kendoui/js/cultures/kendo.culture.km-KH.min.js"></script>
	<script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/js/kendoui/js/cultures/kendo.culture.th-TH.min.js"></script>
	<script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/js/kendoui/js/cultures/kendo.culture.vi-VN.min.js"></script>
	
	<!-- Code Beautify -->
	<script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/common/theme/scripts/plugins/other/js-beautify/beautify.js"></script>
	<script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/common/theme/scripts/plugins/other/js-beautify/beautify-html.js"></script>
	
	<!-- Global -->
	<script>
	var basePath = '',
		commonPath = 'https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/common/';
	</script>
	
	<!-- JQueryUI -->
	<script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/common/theme/scripts/plugins/system/jquery-ui/js/jquery-ui-1.9.2.custom.min.js"></script>
	
	<!-- JQueryUI Touch Punch -->
	<!-- small hack that enables the use of touch events on sites using the jQuery UI user interface library -->
	<script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/common/theme/scripts/plugins/system/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
	
	
	<!-- Modernizr -->
	<script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/common/theme/scripts/plugins/system/modernizr.js"></script>
	
	<!-- Bootstrap -->
	<script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/common/bootstrap/js/bootstrap.min.js"></script>
	
	<!-- SlimScroll Plugin -->
	<script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/common/theme/scripts/plugins/other/jquery-slimScroll/jquery.slimscroll.js"></script>
	
	<!-- MegaMenu -->
	<script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/common/theme/scripts/demo/megamenu.js?1374506533"></script>
	
	<!-- jQuery ScrollTo Plugin -->
	<!--[if gt IE 8]><!--><script src="http://balupton.github.io/jquery-scrollto/lib/jquery-scrollto.js"></script><!--<![endif]-->
	
	<!-- History.js -->
	<!--[if gt IE 8]><!--><script src="http://browserstate.github.io/history.js/scripts/bundled/html4+html5/jquery.history.js"></script><!--<![endif]-->
	
	<!-- jQuery Ajaxify -->
	<!--[if gt IE 8]><!--><script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/common/theme/scripts/plugins/system/jquery-ajaxify/ajaxify-html5.js"></script><!--<![endif]-->
	
	
	<!-- Holder Plugin -->
	<script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/common/theme/scripts/plugins/other/holder/holder.js?1374506533"></script>
	
	<!-- Uniform Forms Plugin -->
	<script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/common/theme/scripts/plugins/forms/pixelmatrix-uniform/jquery.uniform.min.js"></script>

	<!-- Bootstrap Extended -->
	<script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/common/bootstrap/extend/bootstrap-select/bootstrap-select.js"></script>
	<script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/common/bootstrap/extend/bootbox.js"></script>
	
	<!-- Google Code Prettify -->
	<script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/common/theme/scripts/plugins/other/google-code-prettify/prettify.js"></script>
	
	<!-- MiniColors Plugin -->
	<script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/common/theme/scripts/plugins/color/jquery-miniColors/jquery.miniColors.js"></script>
	
	<!-- Cookie Plugin -->
	<script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/common/theme/scripts/plugins/system/jquery.cookie.js"></script>
	
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
	<script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/common/theme/scripts/demo/themer.js"></script>
	
	<!-- Common Demo Script -->
	<script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/common/theme/scripts/demo/common.js?1374506533"></script>
	<script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/js/libs/localforage.min.js"></script>
	<script>
		var banhji = banhji || {};
		var baseUrl = "<?php echo base_url(); ?>"+'api/';
		
		localforage.config({
			driver: localforage.LOCALSTORAGE,
			name: 'userData'
		});

		banhji.auth = new kendo.data.DataSource({
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
						var user = banhji.auth.data()[0];
						localforage.setItem('user', user);
						if(user.institute.length === 0) {
							banhji.router.navigate('/page', false);
						} else {
							window.location.assign("<?php echo base_url(); ?>/admin");
						}
					}
				});
			}
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
						if(user.perm === 1) {
							window.location.assign("<?php echo base_url(); ?>admin");
						} else {
							window.location.assign("<?php echo base_url(); ?>/app/rith");
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

		
		banhji.view = {
			layout 		: new kendo.Layout('#layout'),
			loginView 	: new kendo.View('#login-template', {model: banhji.userManagement})
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

		$(function() {	
			banhji.router.start();
			if(banhji.userManagement.getLogin() !== null){
				if(banhji.userManagement.getLogin().perm === 1) {
					window.location.assign("<?php echo base_url(); ?>admin");
				} else {
					window.location.assign("<?php echo base_url(); ?>app/rith");
				}
			}
		});
	</script>
</body>
</html>

