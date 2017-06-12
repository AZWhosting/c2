<link rel="stylesheet" href="<?php echo base_url()?>assets/offline/offline.css"> 
<div id="wrapperApplication" class="container-fluid"></div>
<!-- template section starts -->
<script type="text/x-kendo-template" id="layout">
	<div id="menu"></div>			
	<div id="content" class="row-fluid container" style="padding-top: 0 !important; "></div>
</script>
<script type="text/x-kendo-template" id="blank-tmpl">
</script>

<script type="text/x-kendo-template" id="index">
	<div class="row-fluid">
		<div class="offline-header">
			<div class="col-xs-12 col-sm-12">
				<img class="home-utibill" src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/Utibill.png">
				<img class="utibill" src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/water_logo/utibill_logo.png">
			</div>
		</div>
		<div class="offline-content">
			<div class="row-fluid">
				<div class="col-xs-12 col-sm-4">
					<div class="offline-read">
						<p class="pull-left" style="font-size: 18px;">បានអាន</p>
						<p class="pull-right">100.00</p>
					</div>

					<div class="offline-search">
						<div class="row-fluid">
							<div class="col-sm-12" style="padding: 0px;">
								<input id=""
									name="" 
									type="text" 
									class="k-textbox input-offline-search"
									data-bind="" />
								<button data-bind="click: openWindow" class="btn-offline-search" type="button" data-role="button" ><i class="icon-search"></i></button>
							</div>
						</div>
					</div>

					<!--First Window -->
				    <div data-role="window"
				    	data-title="false"
			            data-width="610"
			            data-height="540"
			            data-actions="{}"
			            data-modal="{mask: 'true'}"
			            data-position="{top: '50%', left: '50%'}"
			            data-bind="visible: windowVisible">

			    		<div class="win-wrapper">
			    			<div class="window-header">			    				
			    				<span style="float: right; margin-top: -5px; cursor: pointer; color: #999; font-weight: 600; font-size: 15px; margin-right: -15px;" data-bind="click: closeWindow" >x</span>
			    			</div>
			    			<div class="window-content">
			    				<div class="row">
				    				<div class="col-sm-12" style="width: 96%;">
										<div class="col-sm-6">
										</div>
										<div class="col-sm-6">
										</div>
									</div>
								</div>
			    			</div>
			    		</div>
					</div>

					<div class="offline-before-read">
						<table>
							<tr>
								<td>ឈ្មោះអតិថិជន:</td>
								<td></td>
							</tr>
							<tr>
								<td>លេខនាឡិកា:</td>
								<td></td>
							</tr>
							<tr>
								<td>អំណានមុន:</td>
								<td></td>
							</tr>
						</table>
						<!-- <p>CHH-03001</p>
						<p>អំណានមុន. 195</p> -->
					</div>

				</div>
				<div class="col-xs-12 col-sm-4">
					<div class="offline-watch">
						<p class="pull-left">នាឡិកា</p>
						<p class="pull-right">100.00</p>
					</div>

					<div class="offline-input">
						<div class="row-fluid">
							<div class="col-sm-12" style="padding: 0;">
								<input id="" 
									name="" 
									type="text" 
									class="k-textbox"
									data-bind="" />
							</div>
						</div>
					</div>

					<div class="offline-btntwo">
						<div class="row">
							<div class="col-sm-6">
								<a class="offline-btn-add">កត់ត្រា</a>
							</div>
							<div class="col-sm-6">
								<a class="offline-btn-next">បន្ទាប់</a>
							</div>
						</div>
					</div>

				</div>
				<div class="col-xs-12 col-sm-4">
					<div class="offline-caltulator">
						<div class="row">
							<div class="col-sm-12">
								<div class="col-xs-4 col-sm-4 ">
									<div class="offline-number">
										1
									</div>
								</div>
								<div class="col-xs-4 col-sm-4 ">
									<div class="offline-number">
										2
									</div>
								</div>
								<div class="col-xs-4 col-sm-4 ">
									<div class="offline-number">
										3
									</div>
								</div>
								
							</div>

							<div class="col-sm-12">
								<div class="col-xs-4 col-sm-4 ">
									<div class="offline-number">
										4
									</div>
								</div>
								<div class="col-xs-4 col-sm-4 ">
									<div class="offline-number">
										5
									</div>
								</div>
								<div class="col-xs-4 col-sm-4 ">
									<div class="offline-number">
										6
									</div>
								</div>
								
							</div>

							<div class="col-sm-12">
								<div class="col-xs-4 col-sm-4 ">
									<div class="offline-number">
										7
									</div>
								</div>
								<div class="col-xs-4 col-sm-4 ">
									<div class="offline-number">
										8
									</div>
								</div>
								<div class="col-xs-4 col-sm-4 ">
									<div class="offline-number">
										9
									</div>
								</div>
							</div>

							<div class="col-sm-12">
								<div class="col-xs-4 col-sm-4 ">
									<div class="offline-number" style="margin-bottom: 0;">
										0
									</div>
								</div>
								<div class="col-xs-8 col-sm-8 ">
									<div class="offline-number " style="margin-bottom: 0;">
										<span class="glyphicons chevron-left"><i></i></span>
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








<script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/js/libs/localforage.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jszip/2.4.0/jszip.js"></script>
<script src="https://maps.googleapis.com/maps/api/js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.8.0/xlsx.js"></script>
<script>
	localforage.config({
		driver: localforage.LOCALSTORAGE,
		name: 'userData'
	});	
	var banhji = banhji || {};
	var baseUrl = "<?php echo base_url(); ?>";
	var apiUrl = baseUrl + 'api/';
	banhji.s3 = "https://banhji.s3.amazonaws.com/";	
	banhji.token = null;
	banhji.no_image = "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/no_image.jpg";

	// custom widget for min and max
	kendo.data.binders.widget.max = kendo.data.Binder.extend({
		init: function(widget, bindings, options) {//call the base constructor
            kendo.data.Binder.fn.init.call(this, widget.element[0], bindings, options);
        },
        refresh: function() {
            var that = this,
            value = that.bindings["max"].get(); //get the value from the View-Model
            $(that.element).data("kendoDatePicker").max(value); //update the widget
        }
    });
    kendo.data.binders.widget.min = kendo.data.Binder.extend({
        init: function(widget, bindings, options) {
            //call the base constructor
            kendo.data.Binder.fn.init.call(this, widget.element[0], bindings, options);
        },
        refresh: function() {
            var that = this,
            value = that.bindings["min"].get(); //get the value from the View-Model
            $(that.element).data("kendoDatePicker").min(value); //update the widget
        }
    });
	// end of custom widget

	banhji.fileManagement = kendo.observable({
        dataSource: new kendo.data.DataSource({
          transport: {
            read  : {
              url: baseUrl + 'api/attachments',
              type: "GET",
              dataType: 'json',
              headers: { Institute: JSON.parse(localStorage.getItem('userData/user')).institute.id }
            },
            create  : {
              url: baseUrl + 'api/attachments',
              type: "POST",
              dataType: 'json',
              headers: { Institute: JSON.parse(localStorage.getItem('userData/user')).institute.id }
            },
            update  : {
              url: baseUrl + 'api/attachments',
              type: "PUT",
              dataType: 'json',
              headers: { Institute: JSON.parse(localStorage.getItem('userData/user')).institute.id }
            },
            destroy  : {
              url: baseUrl + 'api/attachments',
              type: "DELETE",
              dataType: 'json',
              headers: { Institute: JSON.parse(localStorage.getItem('userData/user')).institute.id }
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
          schema  : {
            model: {
              id: 'id'
            },
            data: 'results',
            total: 'count'
          },
          batch: true,
          serverFiltering: true,
          serverPaging: true,
          pageSize: 50
        }),
        fileArray     : [],
        onRemove      : function(e) {
          banhji.fileManagement.dataSource.remove(e.data);
        },
        onSelected    : function(e) {
          var files = e.files;
          var key = 'ATTACH_' + JSON.parse(localStorage.getItem('userData/user')).institute.id + "_" + Math.floor(Math.random() * 100000000000000001) +'_'+ files[0].name;
          banhji.fileManagement.dataSource.add({
            transaction_id  : 0,
            type            : "Transaction",
            name            : files[0].name,
            contact_id      : null,
            description     : "",
            key             : key,
            url             : "https://s3-ap-southeast-1.amazonaws.com/banhji/"+key,
            created_at      : new Date(),
            file            : files[0].rawFile
          });
        },
        allowSize	  : 0,
        transactionSize: 0,
        contactSize   : 0,
        totalSize 	  : 0,
        transactionNu : 0,
        contactNu 	  : 0,
        save                : function(contact_id){
          $.each(banhji.fileManagement.dataSource.data(), function(index, value){ 
            banhji.fileManagement.dataSource.at(index).set("transaction_id", contact_id);
            if(!value.id){
              var params = { 
                Body: value.file, 
                Key: value.key
              };
              bucket.upload(params, function (err, data) {
                  // console.log(err, data);
                  // var url = data.Location;
              });
            }
          });

          banhji.fileManagement.dataSource.sync();
          var saved = false;
          banhji.fileManagement.dataSource.bind("requestEnd", function(e){
            //Delete File
            if(e.type=="destroy"){
              if(saved==false && e.response){
                saved = true;
                var response = e.response.results;
                $.each(response, function(index, value){
                  var params = {
                    Delete: { /* required */
                      Objects: [ /* required */
                        {
                          Key: value.data.key
                        }
                      ]
                    }
                  };
                  bucket.deleteObjects(params, function(err, data) {
                    //console.log(err, data);
                  });
                });
              }
            }
            banhji.fileManagement.dataSource.data([]);
          });
        }
    });
	banhji.pageLoaded = {};
	// Initializing AWS Cognito service
	var userPool = new AWSCognito.CognitoIdentityServiceProvider.CognitoUserPool(poolData);
	// Initializing AWS S3 Service
	var bucket = new AWS.S3({params: {Bucket: 'banhji'}});
	banhji.accessMod = new kendo.data.DataSource({
      transport: {
        read  : {
          url: baseUrl + 'api/users/access',
          type: "GET",
          dataType: 'json'
        },
        parameterMap: function(options, operation) {
          if(operation === 'read') {
            return {
              limit: options.pageSize,
              page: options.page,
              filter: options.filter
            };
          } else {
            return {models: kendo.stringify(options.models)};
          }
        }
      },
      schema  : {
        model: {
          id: 'id'
        },
        data: 'results',
        total: 'count'
      },
      batch: true,
      serverFiltering: true,
      serverPaging: true,
      filter: {field: 'username', value: userPool.getCurrentUser() == null ? '': userPool.getCurrentUser().username},
      pageSize: 1
    });
    banhji.allowed;
	function checkRole(arg) {
		var dfd = $.Deferred();
		// var roleName = $(location).attr('hash').substr(2);
		// loop through roles if this has in the role list
		banhji.accessMod.query({
			filter: {field: 'username', value: JSON.parse(localStorage.getItem('userData/user')).username}
		}).then(function(e){
				if(banhji.accessMod.data().length > 0) {
					for(var i = 0; i < banhji.accessMod.data().length; i++) {
						if(arg == banhji.accessMod.data()[i].name.toLowerCase()) {
							dfd.resolve(true);
							break;
						}
					}
				}
			}
		);
	}
	banhji.companyDS = new kendo.data.DataSource({
      transport: {
        read  : {
          url: baseUrl + 'api/profiles/company',
          type: "GET",
          dataType: 'json'
        },
        update  : {
          url: baseUrl + 'api/profiles/company',
          type: "PUT",
          dataType: 'json'
        },
        parameterMap: function(options, operation) {
          if(operation === 'read') {
            return {
              limit: options.pageSize,
              page: options.page,
              filter: options.filter
            };
          } else {
            return {models: kendo.stringify(options.models)};
          }
        }
      },
      schema  : {
        model: {
          id: 'id'
        },
        data: 'results',
        total: 'count'
      },
      batch: true,
      serverFiltering: true,
      serverPaging: true,
      filter: {field: 'username', value: userPool.getCurrentUser() == null ? '': userPool.getCurrentUser().username},
      pageSize: 1
    });
	banhji.profileDS = new kendo.data.DataSource({
      transport: {
        read  : {
          url: baseUrl + 'api/profiles',
          type: "GET",
          dataType: 'json',
          headers: banhji.header,
        },
        parameterMap: function(options, operation) {
          if(operation === 'read') {
            return {
              limit: options.pageSize,
              page: options.page,
              filter: options.filter
            };
          } else {
            return {models: kendo.stringify(options.models)};
          }
        }
      },
      schema  : {
        model: {
          id: 'id'
        },
        data: 'results',
        total: 'count'
      },
      batch: true,
      serverFiltering: true,
      serverPaging: true,
      filter: {field: 'username', value: userPool.getCurrentUser() == null ? '':userPool.getCurrentUser().username},
      pageSize: 100
    });
	banhji.aws = kendo.observable({
        password: null,
        confirm: null,
        email: null,
        verificationCode: null,
        cognitoUser: null,
        newPass: null,
        oldPass: null,
        image: "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/blank.png",
        getImage: function() {
          banhji.profileDS.fetch(function(e){
            banhji.aws.set('image', banhji.profileDS.data()[0].profile_photo);
          });
        },
        signUp: function() {
          // e.preventDefault();
          if(this.get('password') != this.get('confirm')) {
            alert('Passwords do not match');
          } else {
            // using cognito to sign up
            var attributeList = [];

            var dataEmail = {
                Name : 'email',
                Value : this.get('email')
            };

            var attributeEmail = new AWSCognito.CognitoIdentityServiceProvider.CognitoUserAttribute(dataEmail);

            attributeList.push(attributeEmail);

            userPool.signUp(this.get('email'), this.get('password'), attributeList, null, function(err, result){
                if (err) {
                    alert(err);
                    return;
                }
                // update attribute
                // 2. move to admin page
                // banhji.awsCognito.set('cognitoUser', result.user);
                banhji.router.navigate('confirm');
            });
          }
        },
        comfirmCode: function(e) {
           e.preventDefault();
            // confirm user verification code after signed up
            var userData = {
                Username : userPool.getCurrentUser().username,
                Pool : userPool
            };
            var cognitoUser = new AWSCognito.CognitoIdentityServiceProvider.CognitoUser(userData);
            cognitoUser.confirmRegistration(this.get('verificationCode'), true, function(err, result) {
                if (err) {
                    alert(err);
                    return;
                }
                banhji.router.navigate('index');
            });
        },
        resendCode: function(e) {
          e.preventDefault();
          alert('code resent');
        },
        signIn: function() {
            var authenticationData = {
                Username : this.get('email'),
                Password : this.get('password'),
            };
            var authenticationDetails = new AWSCognito.CognitoIdentityServiceProvider.AuthenticationDetails(authenticationData);
            
            var userData = {
                Username : this.get('email'),
                Pool : userPool
            };
            var cognitoUser = new AWSCognito.CognitoIdentityServiceProvider.CognitoUser(userData);
            cognitoUser.authenticateUser(authenticationDetails, {
                onSuccess: function (result) {
                    banhji.awsCognito.set('cognitoUser', cognitoUser);
                },

                onFailure: function(err) {
                    alert(err);
                },

            });
        },
        signOut: function(e){
          e.preventDefault();
          var userData = {
              Username : userPool.getCurrentUser().username,
              Pool : userPool
          };
          var cognitoUser = new AWSCognito.CognitoIdentityServiceProvider.CognitoUser(userData);
          if(cognitoUser != null) {
              cognitoUser.signOut();
              localforage.clear().then(function(){
              	window.location.replace("<?php base_url(); ?>login");
              });              
          } else {
              console.log('No user');
          }
        },
        changePassword: function() {
            var userData = {
                Username : this.get('email'),
                Pool : userPool
            };
            var cognitoUser = new AWSCognito.CognitoIdentityServiceProvider.CognitoUser(userData);
            cognitoUser.changePassword('oldPassword', 'newPassword', function(err, result) {
                if (err) {
                    alert(err);
                    return;
                }
                console.log('call result: ' + result);
            });
        },
        forgotPassword: function(e) {
            e.preventDefault();
            var userData = {
                Username : this.get('email'),
                Pool : userPool
            };
            var cognitoUser = new AWSCognito.CognitoIdentityServiceProvider.CognitoUser(userData);
            cognitoUser.forgotPassword({
                onSuccess: function (result) {
                    console.log('call result: ' + result);
                },
                onFailure: function(err) {
                    alert(err);
                },
                inputVerificationCode() {
                    var verificationCode = prompt('Please input verification code ' ,'');
                    var newPassword = prompt('Enter new password ' ,'');
                    cognitoUser.confirmPassword(verificationCode, newPassword, this);
                }
            });
        },
        getCurrentUser: function() {
            var cognitoUser = null;
            if (userPool.getCurrentUser() != null) {
                cognitoUser = userPool.getCurrentUser();
            }
            return cognitoUser;
        }
    });
	// Check if user is logged and authenticated via cognito service
	if(userPool.getCurrentUser() == null) {
		// if not login return to login page		
	  	//window.location.replace('http://localhost/aws/login.html');
	} else {
	  	var cognitoUser = userPool.getCurrentUser();
	  	if(cognitoUser !== null) {
	    	// banhji.aws.getImage();
	    	cognitoUser.getSession(function(err, result) {
	      		if(result) {
	        		AWS.config.credentials = new AWS.CognitoIdentityCredentials({
	          			IdentityPoolId: 'us-east-1:35445541-da4c-4dbb-b83f-d1d0301a26a9',
	          			Logins: {
	            			'cognito-idp.us-east-1.amazonaws.com/us-east-1_56S0nUDS4' : result.getIdToken().getJwtToken()
	          			}
	        		});
	     		}
	    	});
	  	}
	}	
	var langVM = kendo.observable({
		lang 		: null,		
		localeCode 	: null,		
		changeToEn 	: function() {
			localforage.setItem("lang", "EN").then(function(value){
				location.reload(false);
			});
		},
		changeToKh 	: function() {
			localforage.setItem("lang", "KH").then(function(value){
				location.reload(false);
			});
		}
	});
	banhji.userData = JSON.parse(localStorage.getItem('userData/user')) ? JSON.parse(localStorage.getItem('userData/user')) : "";
	if(banhji.userData == "") {
		banhji.companyDS.fetch(function() {
			banhji.profileDS.fetch(function(){
				var data = banhji.companyDS.data();
				var id = 0;
				id = banhji.profileDS.data()[0].id;
				if(data.length > 0) {
					var user = {
						id: id,
						username: userPool.getCurrentUser().username,
						institute: data
					};
					localforage.setItem('user', user);
				}
				banhji.userData = JSON.parse(localStorage.getItem('userData/user'));
			});
		});
	}
	banhji.institute = banhji.userData ? banhji.userData.institute : "";
	banhji.locale = banhji.institute.currency.locale;
	banhji.localeReport = banhji.institute.reportCurrency.locale;
	banhji.header = { Institute: banhji.institute.id };	
	var dataStore = function(url) {
		var o = new kendo.data.DataSource({
			transport: {
				read 	: {
					url: url,
					type: "GET",
					headers: banhji.header,
					dataType: 'json'
				},
				create 	: {
					url: url,
					type: "POST",
					headers: banhji.header,
					dataType: 'json'
				},
				update 	: {
					url: url,
					type: "PUT",
					headers: banhji.header,
					dataType: 'json'
				},
				destroy 	: {
					url: url,
					type: "DELETE",
					headers: banhji.header,
					dataType: 'json'
				},
				parameterMap: function(options, operation) {
					if(operation === 'read') {
						return {
							page: options.page,
							limit: options.pageSize,
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
			page: 1,
			pageSize: 100
		});
		return o;
	};
	banhji.userManagement = kendo.observable({
		lang : langVM,
		multiTaskList 		: [],
		searchText : "",
		searchType : "contacts",
		checkRole  : function(e) {
			e.preventDefault();
		if(JSON.parse(localStorage.getItem('userData/user')).role == 1) {
            banhji.router.navigate("");
          } else {
           	window.location.replace("<?php echo base_url(); ?>admin");
          }
		},
		searchContact: function() {
			this.set("searchType", "contacts");

			$("#search-placeholder").attr('placeholder', "Search Contact");
		},
		searchTransaction: function() {
			this.set("searchType", "transactions");

			$("#search-placeholder").attr('placeholder', "Search Transaction");
		},
		searchItem: function() {
			this.set("searchType", "items");

			$("#search-placeholder").attr('placeholder', "Search Item");
		},
		search: function(e) {
			e.preventDefault();
			
			banhji.searchAdvanced.set("searchText", this.get("searchText"));
			banhji.searchAdvanced.set("searchType", this.get("searchType"));
			banhji.searchAdvanced.search();
			banhji.router.navigate('/search_advanced');
		},
		removeLink 			: function(e){
			e.preventDefault();

			var data = e.data,
			index = this.multiTaskList.indexOf(data);
			
			if(data.vm!==null){				
				data.vm.cancel();
			}			

			this.multiTaskList.splice(index, 1);
		},
		removeMultiTask		: function(url){
			var self = this;

			$.each(this.multiTaskList, function(index, value){
				if(value.url==url){
					self.multiTaskList.splice(index, 1);

					return false;
				}
			});
		},
		addMultiTask 		: function(name, url, vm){
			var isExisting = false;
			$.each(this.multiTaskList, function(index, value){
				if(value.url==url){
					isExisting = true;

					return false;
				}
			});

			if(isExisting==false){
				this.multiTaskList.push({ name:name, url:url, vm:vm });
			}
		},				
		auth : new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + 'authentication',
					type: "GET",
					dataType: 'json'
				},
				create 	: {
					url: apiUrl + 'authentication',
					type: "POST",
					dataType: 'json'
				},
				update 	: {
					url: apiUrl + 'authentication',
					type: "PUT",
					dataType: 'json'
				},
				destroy : {
					url: apiUrl + 'authentication',
					type: "DELETE",
					dataType: 'json'
				},
				parameterMap: function(options, operation) {
					if(operation === 'read') {
						return {
							limit: options.pageSize,
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
					url: apiUrl + 'banhji/company',
					type: "GET",
					dataType: 'json'
				},
				create 	: {
					url: apiUrl + 'banhji/company',
					type: "POST",
					dataType: 'json'
				},
				update 	: {
					url: apiUrl + 'banhji/company',
					type: "PUT",
					dataType: 'json'
				},
				destroy : {
					url: apiUrl + 'banhji/company',
					type: "DELETE",
					dataType: 'json'
				},
				parameterMap: function(options, operation) {
					if(operation === 'read') {
						return {
							limit: options.pageSize,
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
					url: apiUrl + 'banhji/industry',
					type: "GET",
					dataType: 'json'
				},
				parameterMap: function(options, operation) {
					if(operation === 'read') {
						return {
							limit: options.pageSize,
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
					url: apiUrl + 'banhji/countries',
					type: "GET",
					dataType: 'json'
				},
				parameterMap: function(options, operation) {
					if(operation === 'read') {
						return {
							limit: options.pageSize,
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
					url: apiUrl + 'banhji/provinces',
					type: "GET",
					dataType: 'json'
				},
				parameterMap: function(options, operation) {
					if(operation === 'read') {
						return {
							limit: options.pageSize,
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
					url: apiUrl + 'banhji/types',
					type: "GET",
					dataType: 'json'
				},
				parameterMap: function(options, operation) {
					if(operation === 'read') {
						return {
							limit: options.pageSize,
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
		instMod 	: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + 'admin/modules_institute',
					type: "GET",
					dataType: 'json'
				},
				create 	: {
					url: apiUrl + 'admin/modules_institute',
					type: "POST",
					dataType: 'json'
				},
				update 	: {
					url: apiUrl + 'admin/modules_institute',
					type: "PUT",
					dataType: 'json'
				},
				destroy : {
					url: apiUrl + 'admin/modules_institute',
					type: "DELETE",
					dataType: 'json'
				},
				parameterMap: function(options, operation) {
					if(operation === 'read') {
						return {
							limit: options.pageSize,
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
			filter: {field: 'id', value: 1}
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
		getUsername : function() {
			var x = banhji.userData.username.substring(0,2);
			return x.toUpperCase();
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
					url: apiUrl + 'banhji/password',
					type: "POST",
					dataType: 'json'
				},
				parameterMap: function(options, operation) {
					if(operation === 'read') {
						return {
							limit: options.pageSize,
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
		logout 		: function(e) {
			e.preventDefault();
			var userData = {
              	Username : userPool.getCurrentUser().username,
              	Pool : userPool
	        };
          	var cognitoUser = new AWSCognito.CognitoIdentityServiceProvider.CognitoUser(userData);
          	if(cognitoUser != null) {
              	cognitoUser.signOut();
              	localforage.removeItem('user').then(function() {
				    // Run this code once the key has been removed.
				    console.log('Key is cleared!');
				}).catch(function(err) {
				    // This code runs if there were any errors
				    console.log(err);
				});
              	window.location.replace("<?php echo base_url(); ?>login");
          	} else {
              	console.log('No user');
          	}
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
			if(banhji.userManagement.getLogin()) {
				if(banhji.userManagement.getLogin().perm === 1) {
					return 'admin';
				}
			} else {
				return 'home';
			}
			// if(this.getLogin()) {
			// 	return '\#/page';
			// } else {
			// 	return '\#/page/';
			// }
			
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
					entity = banhji.userManagement.getLogin().institute.name
				}
				
			} else {
				entity = false
			}
		}
		return entity;
	}
	banhji.currency = kendo.observable({
		dataSource 			: dataStore(apiUrl + 'currencies'),
		getCurrencyID 		: function(locale){
			var currency_id = 0;

			$.each(this.dataSource.data(), function(index, value){
				if(value.locale===locale){
					currency_id = value.id;
					return false;
				}
			});

			return currency_id;
		}
	});
	banhji.users = kendo.observable({
		dataStore	: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + 'banhji/users',
					type: "GET",
					headers: {
						"Entity": getDB(),
						"User": banhji.userManagement.getLogin() === null ? '': banhji.userManagement.getLogin().id
					},
					dataType: 'json'
				},
				create 	: {
					url: apiUrl + 'banhji/users',
					type: "POST",
					headers: {
						"Entity": getDB(),
						"User": banhji.userManagement.getLogin() === null ? '': banhji.userManagement.getLogin().id
					},
					dataType: 'json'
				},
				update 	: {
					url: apiUrl + 'banhji/users',
					type: "PUT",
					headers: {
						"Entity": getDB(),
						"User": banhji.userManagement.getLogin() === null ? '': banhji.userManagement.getLogin().id
					},
					dataType: 'json'
				},
				destroy : {
					url: apiUrl + 'banhji/users',
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
							limit: options.pageSize,
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
					url: apiUrl + 'banhji/roles',
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
							limit: options.pageSize,
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
					url: apiUrl + "people",
					type: "GET",
					headers: {
						"Entity": banhji.userManagement.getLogin() !== null ? banhji.userManagement.getLogin().institute.name:""
					},
					dataType: 'json'
				},
				create 	: {
					url: apiUrl + "people",
					type: "POST",
					headers: {
						"Entity": banhji.userManagement.getLogin() !== null ? banhji.userManagement.getLogin().institute.name:""
					},
					dataType: 'json'
				},
				update 	: {
					url: apiUrl + "people",
					type: "PUT",
					headers: {
						"Entity": banhji.userManagement.getLogin() !== null ? banhji.userManagement.getLogin().institutename:""
					},
					dataType: 'json'
				},
				destroy : {
					url: apiUrl + "people",
					type: "DELETE",
					headers: {
						"Entity": banhji.userManagement.getLogin() !== null ? banhji.userManagement.getLogin().institute.name:""
					},
					dataType: 'json'
				},
				parameterMap: function(options, operation) {
					if(operation === 'read') {
						return {
							limit: options.pageSize,
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
								limit: options.pageSize,
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
	var role = kendo.observable({
		dataStore 	: new kendo.data.DataSource({
			transport: {
				read: {
					url: apiUrl + 'roles',
					dataType: 'json',
					headers: {
						"Entity": getDB()
					},
					type: 'GET'
				},
				create: {
					url: apiUrl + 'roles',
					dataType: 'json',
					headers: {
						"Entity": getDB()
					},
					type: 'GET'
				},
				update: {
					url: apiUrl + 'roles',
					dataType: 'json',
					headers: {
						"Entity": getDB()
					},
					type: 'GET'
				},
				destroy: {
					url: apiUrl + 'roles',
					dataType: 'json',
					headers: {
						"Entity": getDB()
					},
					type: 'GET'
				},
				parameterMap: function(data, operation) {
					if(operation === 'read') {
						return {
							limit: data.pageSize,
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
					url: apiUrl + 'roles/user',
					dataType: 'json',
					headers: {
						"Entity": getDB()
					},
					type: 'GET'
				},
				create: {
					url: apiUrl + 'roles/user',
					dataType: 'json',
					headers: {
						"Entity": getDB()
					},
					type: 'POST'
				},
				update: {
					url: apiUrl + 'roles/user',
					dataType: 'json',
					headers: {
						"Entity": getDB()
					},
					type: 'PUT'
				},
				destroy: {
					url: apiUrl + 'roles/user',
					dataType: 'json',
					headers: {
						"Entity": getDB()
					},
					type: 'DELETE'
				},
				parameterMap: function(data, operation) {
					if(operation === 'read') {
						return {
							limit: data.pageSize,
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

	// DBS
	banhji.store = banhji.store || {};
	banhji.dbsUrl = "https://developers.dbs.com:10443/api/sg/v1/accounts/1018260032/accountHolders?productType=CA";
	banhji.dbsApiKey = "9c976436-9f86-42b1-965c-3a6d15c73d66";
	banhji.dbsToken = "bPIIqpDNbR14tBI0X+DbkVWa0Ao=";
	banhji.dbsHeaders = {
		'apiKey' 		: banhji.dbsApiKey,
		'uuid' 	 		: banhji.dbsApiKey,
		'Authorization' : banhji.dbsToken == "" ? banhji.authorization : banhji.dbsToken
	};
	banhji.store.dbsDataSource = new kendo.data.DataSource({
		transport: {
		    read: {
		    	url: banhji.dbsUrl,
		    	headers: banhji.dbsHeaders,
				type: "GET",
		        dataType: "json",
		        contentType: 'application/json'
		    }
		},
		batch: false,
		schema: {
			data: function(response) {
				var data = [];
				data.push(response);
				return data;
			}
		}
	});

	// SOURCE #############################################################################################
	banhji.source = kendo.observable({
		lang 						: langVM,
		countryDS					: dataStore(apiUrl + "countries"),
		//Contact
		customerList 				: [],
		supplierList 				: [],
		employeeList 				: [],
		contactDS					: dataStore(apiUrl + "contacts"),
		customerDS					: dataStore(apiUrl + "contacts"),
		supplierDS					: dataStore(apiUrl + "contacts"),
		employeeDS					: dataStore(apiUrl + "contacts"),
		//Contact Type
		contactTypeList 			: [],
		contactTypeDS				: dataStore(apiUrl + "contacts/type"),
		//Job
		jobList 					: [],
		jobDS						: dataStore(apiUrl + "jobs"),
		//Currency
		currencyList 				: [],
		currencyDS					: dataStore(apiUrl + "currencies"),
		currencyRateDS				: dataStore(apiUrl + "currencies/rate"),
		//Item
		itemList 					: [],
		itemDS						: dataStore(apiUrl + "items"),
		itemTypeDS					: dataStore(apiUrl + "item_types"),
		itemGroupList 				: [],
		itemGroupDS					: dataStore(apiUrl + "items/group"),
		brandDS						: dataStore(apiUrl + "brands"),
		categoryList 				: [],
		categoryDS					: dataStore(apiUrl + "categories"),		
		itemPriceList 				: [],
		itemPriceDS					: dataStore(apiUrl + "item_prices"),
		measurementList 			: [],
		measurementDS				: dataStore(apiUrl + "measurements"),
		//Tax
		taxTypeDS					: dataStore(apiUrl + "tax_types"),
		taxList 					: [],
		taxItemDS					: dataStore(apiUrl + "tax_items"),
		//Accounting
		accountList 				: [],
		accountDS					: dataStore(apiUrl + "accounts"),
		accountTypeDS				: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + "accounts/type",
					type: "GET",
					headers: banhji.header,
					dataType: 'json'
				},
				parameterMap: function(options, operation) {
					if(operation === 'read') {
						return {
							page: options.page,
							limit: options.pageSize,	
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
			filter:{ field:"id >", value:9 },
			batch: true,
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page:1,
			pageSize: 100
		}),
		//Payment Term, Method, Segment
		paymentTermDS				: dataStore(apiUrl + "payment_terms"),
		paymentMethodDS				: dataStore(apiUrl + "payment_methods"),
		//Segment
		segmentDS					: dataStore(apiUrl + "segments"),
		segmentItemList 			: [],
		segmentItemDS				: dataStore(apiUrl + "segments/item"),
		//Txn Template
		txnTemplateList 			: [],
		txnTemplateDS				: dataStore(apiUrl + "transaction_templates"),
		//Prefixes
		prefixList 					: [],
		prefixDS					: dataStore(apiUrl + "prefixes"),
		frequencyList 				: [
			{ id: 'Daily', name: 'Day' },
			{ id: 'Weekly', name: 'Week' },
			{ id: 'Monthly', name: 'Month' },
			{ id: 'Annually', name: 'Annual' }
		],
		monthOptionList 			: [
			{ id: 'Day', name: 'Day' },
			{ id: '1st', name: '1st' },
			{ id: '2nd', name: '2nd' },
			{ id: '3rd', name: '3rd' },
			{ id: '4th', name: '4th' }
		],
		monthList 					: [
			{ id: 0, name: 'January' },
			{ id: 1, name: 'February' },
			{ id: 2, name: 'March' },
			{ id: 3, name: 'April' },
			{ id: 4, name: 'May' },
			{ id: 5, name: 'June' },
			{ id: 6, name: 'July' },
			{ id: 7, name: 'August' },
			{ id: 8, name: 'September' },
			{ id: 9, name: 'October' },
			{ id: 10, name: 'November' },
			{ id: 11, name: 'December' }
		],
		weekDayList 				: [
			{ id: 0, name: 'Sunday' },
			{ id: 1, name: 'Monday' },
			{ id: 2, name: 'Tuesday' },
			{ id: 3, name: 'Wednesday' },
			{ id: 4, name: 'Thurday' },
			{ id: 5, name: 'Friday' },
			{ id: 6, name: 'Saturday' }
		],
		dayList 					: [
			{ id: 1, name: '1st' },
			{ id: 2, name: '2nd' },
			{ id: 3, name: '3rd' },
			{ id: 4, name: '4th' },
			{ id: 5, name: '5th' },
			{ id: 6, name: '6th' },
			{ id: 7, name: '7th' },
			{ id: 8, name: '8th' },
			{ id: 9, name: '9th' },
			{ id: 10, name: '10th' },
			{ id: 11, name: '11st' },
			{ id: 12, name: '12nd' },
			{ id: 13, name: '13rd' },
			{ id: 14, name: '14th' },
			{ id: 15, name: '15th' },
			{ id: 16, name: '16th' },
			{ id: 17, name: '17th' },
			{ id: 18, name: '18th' },
			{ id: 19, name: '19th' },
			{ id: 20, name: '20th' },
			{ id: 21, name: '21st' },
			{ id: 22, name: '22nd' },
			{ id: 23, name: '23rd' },
			{ id: 24, name: '24th' },
			{ id: 25, name: '25th' },
			{ id: 26, name: '26th' },
			{ id: 27, name: '27th' },
			{ id: 28, name: '28th' },
			{ id: 0, name: 'Last' }
		],
		sortList					: [
	 		{ text:"All", value: "all" },
	 		{ text:"Today", value: "today" },
	 		{ text:"This Week", value: "week" },
	 		{ text:"This Month", value: "month" },
	 		{ text:"This Year", value: "year" }
		],
		statusList 					: [
			{ "id": 1, "name": "Active" },
			{ "id": 0, "name": "Inactive" },
			{ "id": 2, "name": "Void" }
        ],
        customerFormList 			: [
	    	{ id: "Quote", name: "Quotation" },
			{ id: "Sale_Order", name: "Sale Order" },
			{ id: "Deposit", name: "Deposit" },
			{ id: "Cash_Sale", name: "Cash Sale" },
			{ id: "Invoice", name: "Invoice" },
			{ id: "Cash_Receipt", name: "Cash Receipt" },
			//{ id: "Sale_Return", name: "Sale Return" },
			{ id: "GDN", name: "Delivered Note" }
	    ],
	    vendorFormList 				: [
	    	{ id: "Purchase_Order", name: "Purchase Order" },
	    	{ id: "GRN", name: "GRN" },
			// { id: "Deposit", name: "Deposit" },
			// { id: "Purchase", name: "Purchase" },
			// { id: "Pur_Return", name: "Pur.Return" },
			{ id: "Cash_Payment", name: "Cash Payment" }
	    ],
	    cashFormList 				: [
	    	{ id: "Cash_Transfer", name: "Cash Transaction" },
	    	{ id: "Cash_Receipt", name: "Cash Receipt" },
			{ id: "Cash_Payment", name: "Cash Payment" },
			{ id: "Cash_Advance", name: "Cash Advance" },
			{ id: "Reimbursement", name: "Reimbursement" },
			{ id: "Advance_Settlement", name: "Advance Settlement" }
	    ],
	    cashMGTFormList				: [
	    	{ id: "Cash_Transfer", name: "Transfer" },
	    	{ id: "Deposit", name: "Deposit" },
			{ id: "Withdraw", name: "Withdraw" },
			{ id: "Cash_Advance", name: "Advance" },
			{ id: "Cash_Payment", name: "Payment" },
			{ id: "Reimbursement", name: "Reimbursement" },
			{ id: "Journal", name: "Journal" }
	    ],
		genderList					: ["M", "F"],
		typeList 					: ['Invoice','Commercial_Invoice','Vat_Invoice','Electricity_Invoice','Water_Invoice','Cash_Sale','Commercial_Cash_Sale','Vat_Cash_Sale','Receipt_Allocation','Sale_Order','Quote','GDN','Sale_Return','Purchase_Order','GRN','Cash_Purchase','Credit_Purchase','Purchase_Return','Payment_Allocation','Deposit','Electricty_Deposit','Water_Deposit','Customer_Deposit','Vendor_Deposit','Withdraw','Transfer','Journal','Item_Adjustment','Cash_Advance','Reimbursement','Direct_Expense','Advance_Settlement','Additional_Cost','Cash_Payment','Cash_Receipt','Credit_Note','Debit_Note','Offset_Bill','Offset_Invoice','Cash_Transfer','Internal_Usage'],
		user_id						: banhji.userData.id,
		amtDueColor 				: "#D5DBDB",
		acceptedSrc					: "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/accepted.ico",
		approvedSrc					: "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/approved.ico",
		cancelSrc					: "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/cancel.ico",
		openSrc 					: "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/open.ico",
		paidSrc 					: "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/paid.ico",
		partialyPaidSrc 			: "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/partialy_paid.ico",
		usedSrc 					: "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/used.ico",
		receivedSrc 				: "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/received.ico",
		deliveredSrc 				: "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/delivered.ico",
		successMessage 				: "Saved Successful!",
		errorMessage 				: "Warning, please review it again!",
		confirmMessage 				: "Are you sure, you want to delete it?",
		requiredMessage 			: "Required",
		duplicateNumber 			: "Duplicate Number!",
		duplicateInvoice 			: "Duplicate Invoice!",
		selectCustomerMessage 		: "Please select a customer.",
		selectSupplierMessage 		: "Please select a supplier.",
		selectItemMessage 			: "Please select an item.",
		duplicateSelectedItemMessage: "You already selected this item.",
		pageLoad 					: function(){
			this.loadAccounts();
			this.accountTypeDS.read();
			this.taxTypeDS.read();
			this.loadTaxes();
			this.loadJobs();
			this.loadSegmentItems();
			this.loadCurrencies();
			this.loadRates();
			this.loadPrefixes();
			this.loadTxnTemplates();

			this.loadCategories();
			this.loadItemGroups();
			this.loadItems();
			this.itemTypeDS.read();
			this.loadItemPrices();
			this.loadMeasurements();

			this.loadContactTypes();
			this.loadCustomers();
			this.loadSuppliers();
			this.loadEmployees();
		},
		getFiscalDate 				: function(){
			var today = new Date(),	
			fDate = new Date(today.getFullYear() +"-"+ banhji.institute.fiscal_date);

			if(today < fDate){
				fDate.setFullYear(today.getFullYear()-1);
			}		

			return fDate;
		},
		loadPrefixes 				: function(){
			var self = this, raw = this.get("prefixList");

			//Clear array
			if(raw.length>0){
				raw.splice(0,raw.length);
			}

			this.prefixDS.query({
				filter: [],
			}).then(function(){
				var view = self.prefixDS.view();

				$.each(view, function(index, value){
					raw.push(value);
				});
			});
		},
		loadTxnTemplates 			: function(){
			var self = this, raw = this.get("txnTemplateList");

			//Clear array
			if(raw.length>0){
				raw.splice(0,raw.length);
			}

			this.txnTemplateDS.query({
				filter:[]
			}).then(function(){
				var view = self.txnTemplateDS.view();

				$.each(view, function(index, value){
					raw.push(value);
				});
			});
		},
		loadCurrencies 				: function(){
			var self = this, raw = this.get("currencyList");

			//Clear array
			if(raw.length>0){
				raw.splice(0,raw.length);
			}

			this.currencyDS.query({
				filter:[]
			}).then(function(){
				var view = self.currencyDS.view();

				$.each(view, function(index, value){
					raw.push(value);
				});
			});
		},
		loadRates 					: function(){
			this.currencyRateDS.query({
				filter:[],
				sort:{ field:"date", dir:"desc"}
			});
		},
		getRate						: function(locale, date){
			var rate = 0, lastRate = 1;
			$.each(this.currencyRateDS.data(), function(index, value){
				if(value.locale == locale){
					lastRate = kendo.parseFloat(value.rate);

					if(date >= new Date(value.date)){
						rate = kendo.parseFloat(value.rate);

						return false;
					}
				}
			});

			//If no rate, use the last rate
			if(rate==0){
				rate = lastRate;
			}

			return rate;
		},
		loadTaxes 					: function(){
			var self = this, raw = this.get("taxList");

			//Clear array
			if(raw.length>0){
				raw.splice(0,raw.length);
			}

			this.taxItemDS.query({
				filter:[]
			}).then(function(){
				var view = self.taxItemDS.view();

				$.each(view, function(index, value){
					raw.push(value);
				});
			});
		},
		checkWHT 					: function(tax_type_id){
			var result = false,
				types = this.taxTypeDS.get(tax_type_id);

			if(types.sub_of_id==12){
				result = true;
			}

			return result;
		},
		loadJobs 					: function(){
			var self = this, raw = this.get("jobList");

			//Clear array
			if(raw.length>0){
				raw.splice(0,raw.length);
			}

			this.jobDS.query({
				filter:[]
			}).then(function(){
				var view = self.jobDS.view();

				$.each(view, function(index, value){
					raw.push(value);
				});
			});
		},
		loadSegmentItems 			: function(){
			var self = this, raw = this.get("segmentItemList");

			//Clear array
			if(raw.length>0){
				raw.splice(0,raw.length);
			}

			this.segmentItemDS.query({
				filter:{ field:"segment_id >", value: 0 }
			}).then(function(){
				var view = self.segmentItemDS.view();

				$.each(view, function(index, value){
					raw.push(value);
				});
			});
		},
		loadAccounts 				: function(){
			var self = this, raw = this.get("accountList");

			//Clear array
			if(raw.length>0){
				raw.splice(0,raw.length);
			}

			this.accountDS.query({
				filter: []
			}).then(function(){
				var view = self.accountDS.view();

				$.each(view, function(index, value){
					raw.push(value);
				});
			});
		},
		loadCategories 				: function(){
			var self = this, raw = this.get("categoryList");

			//Clear array
			if(raw.length>0){
				raw.splice(0,raw.length);
			}

			this.categoryDS.query({
				filter:[]
			}).then(function(){
				var view = self.categoryDS.view();

				$.each(view, function(index, value){
					raw.push(value);
				});
			});
		},
		loadItemGroups 				: function(){
			var self = this, raw = this.get("itemGroupList");

			//Clear array
			if(raw.length>0){
				raw.splice(0,raw.length);
			}

			this.itemGroupDS.query({
				filter:[]
			}).then(function(){
				var view = self.itemGroupDS.view();

				$.each(view, function(index, value){
					raw.push(value);
				});
			});
		},
		loadItems 					: function(){
			var self = this, raw = this.get("itemList");

			//Clear array
			if(raw.length>0){
				raw.splice(0,raw.length);
			}

			this.itemDS.query({
				filter:{ field:"status", value:1 }
			}).then(function(){
				var view = self.itemDS.view();

				$.each(view, function(index, value){
					raw.push(value);
				});
			});
		},
		loadItemPrices 				: function(){
			var self = this, raw = this.get("itemPriceList");

			//Clear array
			if(raw.length>0){
				raw.splice(0,raw.length);
			}

			this.itemPriceDS.query({
				filter:[
					{ field:"assembly_id", value:0 },
					{ field:"status", operator:"where_related_item", value:1 }
				]
			}).then(function(){
				var view = self.itemPriceDS.view();

				$.each(view, function(index, value){
					raw.push(value);
				});
			});
		},
		loadMeasurements 			: function(){
			var self = this, raw = this.get("measurementList");

			//Clear array
			if(raw.length>0){
				raw.splice(0,raw.length);
			}

			this.measurementDS.query({
				filter:[],
			}).then(function(){
				var view = self.measurementDS.view();

				$.each(view, function(index, value){
					raw.push(value);
				});
			});
		},
		loadContactTypes			: function(){
			var self = this, raw = this.get("contactTypeList");

			//Clear array
			if(raw.length>0){
				raw.splice(0,raw.length);
			}

			this.contactTypeDS.query({
				filter:[]
			}).then(function(){
				var view = self.contactTypeDS.view();

				$.each(view, function(index, value){
					raw.push(value);
				});
			});
		},
		loadCustomers 				: function(){
			var self = this, raw = this.get("customerList");

			//Clear array
			if(raw.length>0){
				raw.splice(0,raw.length);
			}

			this.customerDS.query({
				filter:[
					{ field:"parent_id", operator:"where_related_contact_type", value:1 }
				]
			}).then(function(){
				var view = self.customerDS.view();

				$.each(view, function(index, value){
					raw.push(value);
				});
			});
		},
		loadSuppliers 				: function(){
			var self = this, raw = this.get("supplierList");

			//Clear array
			if(raw.length>0){
				raw.splice(0,raw.length);
			}

			this.supplierDS.query({
				filter:[
					{ field:"parent_id", operator:"where_related_contact_type", value:2 }
				]
			}).then(function(){
				var view = self.supplierDS.view();

				$.each(view, function(index, value){
					raw.push(value);
				});
			});
		},
		loadEmployees 				: function(){
			var self = this, raw = this.get("employeeList");

			//Clear array
			if(raw.length>0){
				raw.splice(0,raw.length);
			}

			this.employeeDS.query({
				filter:[
					{ field:"parent_id", operator:"where_related_contact_type", value:3 },
					{ field:"status", value:1 }
				]
			}).then(function(){
				var view = self.employeeDS.view();

				$.each(view, function(index, value){
					raw.push(value);
				});
			});
		},
		getPaymentTerm 				: function(id){
			var data = this.paymentTermDS.get(id);
			return data.name;
		},
		getPrefixAbbr 				: function(type){
			var abbr = "";
			$.each(this.prefixList, function(index, value){
				if(value.type==type){
					abbr = value.abbr;

					return false;
				}
			});

			return abbr;
		},
		getCurrencyCode 			: function(locale){
			var code = "";

			$.each(this.currencyDS.data(), function(index, value){
				if(value.locale==locale){
					code = value.code;

					return false;
				}
			});

			return code;
		}
	});
	
	/*************************************************
	*   HOME PAGE MVVM		  						 *
	*************************************************/
	banhji.index = kendo.observable({
		lang 				: langVM,
		dataSource			: dataStore(apiUrl+"accounting_modules/apar"),
		summaryDS			: dataStore(apiUrl+"accounting_modules/financial_snapshot"),
		graphDS 			: dataStore(apiUrl+"cash_modules/cash_in_out"),
		windowVisible 		: false,
		modules 			: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + 'admin/modules',
					type: "GET",
					dataType: 'json'
				},
				create 	: {
					url: apiUrl + 'admin/modules',
					type: "POST",
					dataType: 'json'
				},
				update 	: {
					url: apiUrl + 'admin/modules',
					type: "PUT",
					dataType: 'json'
				},
				destroy : {
					url: apiUrl + 'admin/modules',
					type: "DELETE",
					dataType: 'json'
				},
				parameterMap: function(options, operation) {
					if(operation === 'read') {
						return {
							limit: options.pageSize,
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
		companyInf 			: function() {
			var company = JSON.parse(localStorage.getItem('userData/user'));
			return company;
		},
		getLogo   			: function() {
			banhji.companyDS.fetch(function(){
				if(banhji.companyDS.data().length > 0) {
					banhji.index.set('companyLogo', banhji.companyDS.data()[0].logo);
				}
			});
		},
		obj 				: {},
		today 				: new Date(),
		companyName 		: null,
		companyLogo 		: "",
		pageLoad 			: function(){
			this.setObj();
			this.loadData();


		},
		openWindow			: function(){
      		//this.addType();

         	this.set("windowVisible", true);
      	},
      	closeWindow 		: function(){
      		//this.dataSource.cancelChanges();

      		this.set("windowVisible", false);
      	},
		setObj 		: function(){
			this.set("obj", {
				//AR
				ar 					: 0,
				ar_open 			: 0,
				ar_customer 		: 0,
				ar_overdue 			: 0,
				//AP
				ap 					: 0,
				ap_open 			: 0,
				ap_vendor 			: 0,
				ap_overdue 			: 0,
				//Performance
				income 				: 0,
				expense 			: 0,
				net_income 			: 0,
				//Position
				asset 				: 0,
				liability 	 		: 0,
				equity 	 			: 0
			});
		},
		loadData 			: function(){
			var self = this, obj = this.get("obj");

			this.graphDS.read();

			this.dataSource.query({
				filter: [],
				page: 1,
				pageSize: 5
			}).then(function(){
				var view = self.dataSource.view();
				
				obj.set("ar", kendo.toString(view[0].ar, banhji.locale=="km-KH"?"c0":"c2", banhji.locale));
				obj.set("ar_open", kendo.toString(view[0].ar_open, "n0"));
				obj.set("ar_customer", kendo.toString(view[0].ar_customer, "n0"));
				obj.set("ar_overdue", kendo.toString(view[0].ar_overdue, "n0"));

				obj.set("ap", kendo.toString(view[0].ap, banhji.locale=="km-KH"?"c0":"c2", banhji.locale));
				obj.set("ap_open", kendo.toString(view[0].ap_open, "n0"));
				obj.set("ap_vendor", kendo.toString(view[0].ap_vendor, "n0"));
				obj.set("ap_overdue", kendo.toString(view[0].ap_overdue, "n0"));
			});

			this.summaryDS.query({
				filter: [],
				page: 1,
				pageSize: 5
			}).then(function(){
				var view = self.summaryDS.view();
				
				obj.set("income", kendo.toString(view[0].income, banhji.locale=="km-KH"?"c0":"c2", banhji.locale));
				obj.set("expense", kendo.toString(view[0].expense, banhji.locale=="km-KH"?"c0":"c2", banhji.locale));
				obj.set("net_income", kendo.toString(view[0].net_income, banhji.locale=="km-KH"?"c0":"c2", banhji.locale));
				
				obj.set("asset", kendo.toString(view[0].asset, banhji.locale=="km-KH"?"c0":"c2", banhji.locale));
				obj.set("liability", kendo.toString(view[0].liability, banhji.locale=="km-KH"?"c0":"c2", banhji.locale));
				obj.set("equity", kendo.toString(view[0].equity, banhji.locale=="km-KH"?"c0":"c2", banhji.locale));
			});
		}
		
	});
	



    /*************************************************
	*   VIEW & LAYOUT	  				 		 	 *
	*************************************************/
	banhji.view = {
		layout 		: new kendo.Layout('#layout', {model: banhji.Layout}),
		blank		: new kendo.View('<div></div>'),
		index  		: new kendo.Layout("#index", {model: banhji.index}),
		menu 		: new kendo.Layout('#menu-tmpl', {model: banhji.userManagement}),
		searchAdvanced: new kendo.Layout("#searchAdvanced", {model: banhji.searchAdvanced}),
		customTable: new kendo.Layout("#customTable", {model: banhji.customTable}),

		//Accounting
		accountingDashboard: new kendo.Layout("#accountingDashboard", {model: banhji.accountingDashboard}),
		accountingCenter: new kendo.Layout("#accountingCenter", {model: banhji.accountingCenter}),
		account: new kendo.Layout("#account", {model: banhji.account}),
		txnItemList: new kendo.Layout("#txnItemList", {model: banhji.txnItemList}),
		fixedAssetItemList: new kendo.Layout("#fixedAssetItemList", {model: banhji.fixedAssetItemList}),
		txnItem: new kendo.Layout("#txnItem", {model: banhji.txnItem}),
		journal: new kendo.Layout("#journal", {model: banhji.journal}),
		cashTransaction: new kendo.Layout("#cashTransaction", {model: banhji.cashTransaction}),
		cashAdvance: new kendo.Layout("#cashAdvance", {model: banhji.cashAdvance}),
		expense: new kendo.Layout("#expense", {model: banhji.expense}),
		currencyRate: new kendo.Layout("#currencyRate", {model: banhji.currencyRate}),
		journalReport: new kendo.Layout("#journalReport", {model: banhji.journalReport}),
		journalReportBySegment: new kendo.Layout("#journalReportBySegment", {model: banhji.journalReportBySegment}),
		generalLedger: new kendo.Layout("#generalLedger", {model: banhji.generalLedger}),
		trialBalance: new kendo.Layout("#trialBalance", {model: banhji.trialBalance}),
		chartOfAccount: new kendo.Layout("#chartOfAccount", {model: banhji.chartOfAccount}),
		accountingReportCenter: new kendo.Layout("#accountingReportCenter", {model: banhji.accountingReportCenter}),
		accountingSetting: new kendo.Layout("#accountingSetting", {model: banhji.accountingSetting}),
		accountingRecurring: new kendo.Layout("#accountingRecurring", {model: banhji.accountingRecurring}),
		addAccountingprefix: new kendo.Layout("#addAccountingprefix", {model: banhji.addAccountingprefix}),

		segment: new kendo.Layout("#segment", {model: banhji.segment}),
		transactionListDate: new kendo.Layout("#transactionListDate", {model: banhji.transactionListDate}),
		recentTransactionsList: new kendo.Layout("#recentTransactionsList", {model: banhji.recentTransactionsList}),
		recurringJournalList: new kendo.Layout("#recurringJournalList", {model: banhji.recurringJournalList}),
		statementProfitLoss: new kendo.Layout("#statementProfitLoss", {model: banhji.statementProfitLoss}),
		statementProfitLossBySegment: new kendo.Layout("#statementProfitLossBySegment", {model: banhji.statementProfitLossBySegment}),
		statementFinancialPosition: new kendo.Layout("#statementFinancialPosition", {model: banhji.statementFinancialPosition}),
		statementProfitLossComparison: new kendo.Layout("#statementProfitLossComparison", {model: banhji.statementProfitLossComparison}),
		statementFinancialPositionComparison: new kendo.Layout("#statementFinancialPositionComparison", {model: banhji.statementFinancialPositionComparison}),
		statementChangesEquity: new kendo.Layout("#statementChangesEquity", {model: banhji.statementChangesEquity}),
		statementCashFlow: new kendo.Layout("#statementCashFlow", {model: banhji.statementCashFlow}),
		auditTrialReport: new kendo.Layout("#auditTrialReport", {model: banhji.auditTrialReport}),

		//Tax
		tax: new kendo.Layout("#tax", {model: banhji.tax}),
		taxReportCenter: new kendo.Layout("#taxReportCenter", {model: banhji.taxReportCenter}),
		saleJournal: new kendo.Layout("#saleJournal", {model: banhji.saleJournal}),
		purchaseJournal: new kendo.Layout("#purchaseJournal", {model: banhji.purchaseJournal}),


		//Employee
		employeeDashboard: new kendo.Layout("#employeeDashboard", {model: banhji.employeeDashboard}),
		employeeCenter: new kendo.Layout("#employeeCenter", {model: banhji.employeeCenter}),
		employee: new kendo.Layout("#employee", {model: banhji.employee}),
		employeeReportCenter: new kendo.Layout("#employeeReportCenter"),

		//Vendor
		vendorDashboard: new kendo.Layout("#vendorDashboard", {model: banhji.vendorDashboard}),
		vendorCenter: new kendo.Layout("#vendorCenter", {model: banhji.vendorCenter}),
		vendor: new kendo.Layout("#vendor", {model: banhji.vendor}),
		purchaseOrder: new kendo.Layout("#purchaseOrder", {model: banhji.purchaseOrder}),
		grn: new kendo.Layout("#grn", {model: banhji.grn}),
		purchase: new kendo.Layout("#purchase", {model: banhji.purchase}),
		purchaseReturn: new kendo.Layout("#purchaseReturn", {model: banhji.purchaseReturn}),
		paymentRefund: new kendo.Layout("#paymentRefund", {model: banhji.paymentRefund}),
		vendorDeposit: new kendo.Layout("#vendorDeposit", {model: banhji.vendorDeposit}),
		vendorSetting: new kendo.Layout("#vendorSetting", {model: banhji.vendorSetting}),
		vendorReportCenter: new kendo.Layout("#vendorReportCenter", {model: banhji.vendorReportCenter}),
		purchaseSummaryProductServices: new kendo.Layout("#purchaseSummaryProductServices", {model: banhji.purchaseSummaryProductServices}),
		expensesSummarySupplier: new kendo.Layout("#expensesSummarySupplier", {model: banhji.expensesSummarySupplier}),
		expensesDetailSupplier: new kendo.Layout("#expensesDetailSupplier", {model: banhji.expensesDetailSupplier}),
		purchaseOrderList: new kendo.Layout("#purchaseOrderList", {model: banhji.purchaseOrderList}),
		purchaseDetailProductServices: new kendo.Layout("#purchaseDetailProductServices", {model: banhji.purchaseDetailProductServices}),
		supplierTransaction: new kendo.Layout("#supplierTransaction", {model: banhji.supplierTransaction}),
		depositDetailSupplier: new kendo.Layout("#depositDetailSupplier", {model: banhji.depositDetailSupplier}),
		suppliersBalanceSummary: new kendo.Layout("#suppliersBalanceSummary", {model: banhji.suppliersBalanceSummary}),
		suppliersBalanceDetail: new kendo.Layout("#suppliersBalanceDetail", {model: banhji.suppliersBalanceDetail}),
		payablesAgingSummary: new kendo.Layout("#payablesAgingSummary", {model: banhji.payablesAgingSummary}),
		payablesAgingDetail: new kendo.Layout("#payablesAgingDetail", {model: banhji.payablesAgingDetail}),
		listBillsPaid: new kendo.Layout("#listBillsPaid", {model: banhji.listBillsPaid}),
		billPaymentList: new kendo.Layout("#billPaymentList", {model: banhji.billPaymentList}),
		productServiceList: new kendo.Layout("#productServiceList", {model: banhji.vendorSale}),
		supplierList: new kendo.Layout("#supplierList", {model: banhji.supplierList}),
		vendorRecurring: new kendo.Layout("#vendorRecurring", {model: banhji.vendorRecurring}),

		//Customer
		customerDashboard: new kendo.Layout("#customerDashboard", {model: banhji.customerDashboard}),
		customerCenter: new kendo.Layout("#customerCenter", {model: banhji.customerCenter}),
		customer: new kendo.Layout("#customer", {model: banhji.customer}),
		invoice: new kendo.Layout("#invoice", {model: banhji.invoice}),
		cashSale: new kendo.Layout("#cashSale", {model: banhji.cashSale}),
		saleOrder: new kendo.Layout("#saleOrder", {model: banhji.saleOrder}),
		quote: new kendo.Layout("#quote", {model: banhji.quote}),
		gdn: new kendo.Layout("#gdn", {model: banhji.gdn}),
		saleReturn: new kendo.Layout("#saleReturn", {model: banhji.saleReturn}),
		cashRefund: new kendo.Layout("#cashRefund", {model: banhji.cashRefund}),
		statement: new kendo.Layout("#statement", {model: banhji.statement}),
		customerDeposit: new kendo.Layout("#customerDeposit", {model: banhji.customerDeposit}),
		customerReportCenter: new kendo.Layout("#customerReportCenter", {model: banhji.customerReportCenter}),
		customerList : new kendo.Layout("#customerList"),
		customerBalance : new kendo.Layout("#customerBalance", {model: banhji.customerBalance}),
		customerSetting: new kendo.Layout("#customerSetting", {model: banhji.customerSetting}),
		customerRecurring : new kendo.Layout("#customerRecurring", {model: banhji.customerRecurring}),
		job: new kendo.Layout("#job", {model: banhji.job}),
		invoiceCustom: new kendo.Layout("#invoiceCustom", {model: banhji.invoiceCustom}),
		invoiceForm: new kendo.Layout("#invoiceForm", {model: banhji.invoiceForm}),
		invoiceForm1: new kendo.Layout("#invoiceForm1", {model: banhji.invoiceForm}),
		invoiceForm2: new kendo.Layout("#invoiceForm2", {model: banhji.invoiceForm}),
		//invoiceForm3: new kendo.Layout("#invoiceForm3", {model: banhji.invoiceForm}),
		//invoiceForm4: new kendo.Layout("#invoiceForm4", {model: banhji.invoiceForm}),
		//invoiceForm5: new kendo.Layout("#invoiceForm5", {model: banhji.invoiceForm}),
		invoiceForm6: new kendo.Layout("#invoiceForm6", {model: banhji.invoiceForm}),
		invoiceForm7: new kendo.Layout("#invoiceForm7", {model: banhji.invoiceForm}),
		invoiceForm8: new kendo.Layout("#invoiceForm8", {model: banhji.invoiceForm}),
		invoiceForm9: new kendo.Layout("#invoiceForm9", {model: banhji.invoiceForm}),
		invoiceForm10: new kendo.Layout("#invoiceForm10", {model: banhji.invoiceForm}),
		invoiceForm11: new kendo.Layout("#invoiceForm11", {model: banhji.invoiceForm}),
		invoiceForm12: new kendo.Layout("#invoiceForm12", {model: banhji.invoiceForm}),
		invoiceForm13: new kendo.Layout("#invoiceForm13", {model: banhji.invoiceForm}),
		invoiceForm14: new kendo.Layout("#invoiceForm14", {model: banhji.invoiceForm}),
		invoiceForm15: new kendo.Layout("#invoiceForm15", {model: banhji.invoiceForm}),
		invoiceForm16: new kendo.Layout("#invoiceForm16", {model: banhji.invoiceForm}),
		invoiceForm17: new kendo.Layout("#invoiceForm17", {model: banhji.invoiceForm}),
		invoiceForm18: new kendo.Layout("#invoiceForm18", {model: banhji.invoiceForm}),
		invoiceForm19: new kendo.Layout("#invoiceForm19", {model: banhji.invoiceForm}),
		invoiceForm20: new kendo.Layout("#invoiceForm20", {model: banhji.invoiceForm}),
		invoiceForm21: new kendo.Layout("#invoiceForm21", {model: banhji.invoiceForm}),
		invoiceForm22: new kendo.Layout("#invoiceForm22", {model: banhji.invoiceForm}),
		invoiceForm23: new kendo.Layout("#invoiceForm23", {model: banhji.invoiceForm}),
		invoiceForm24: new kendo.Layout("#invoiceForm24", {model: banhji.invoiceForm}),
		invoiceForm25: new kendo.Layout("#invoiceForm25", {model: banhji.invoiceForm}),
		invoiceForm26: new kendo.Layout("#invoiceForm26", {model: banhji.invoiceForm}),
		invoiceForm27: new kendo.Layout("#invoiceForm27", {model: banhji.invoiceForm}),
		invoiceForm28: new kendo.Layout("#invoiceForm28", {model: banhji.invoiceForm}),
		invoiceForm29: new kendo.Layout("#invoiceForm29", {model: banhji.invoiceForm}),
		invoiceForm30: new kendo.Layout("#invoiceForm30", {model: banhji.invoiceForm}),
		invoiceForm31: new kendo.Layout("#invoiceForm31", {model: banhji.invoiceForm}),
		invoiceForm32: new kendo.Layout("#invoiceForm32", {model: banhji.invoiceForm}),
		invoiceForm33: new kendo.Layout("#invoiceForm33", {model: banhji.invoiceForm}),
		invoiceForm34: new kendo.Layout("#invoiceForm34", {model: banhji.invoiceForm}),
		invoiceForm35: new kendo.Layout("#invoiceForm35", {model: banhji.invoiceForm}),
		invoiceForm36: new kendo.Layout("#invoiceForm36", {model: banhji.invoiceForm}),
		invoiceForm37: new kendo.Layout("#invoiceForm37", {model: banhji.invoiceForm}),
		invoiceForm38: new kendo.Layout("#invoiceForm38", {model: banhji.invoiceForm}),
		invoiceForm39: new kendo.Layout("#invoiceForm39", {model: banhji.invoiceForm}),
		invoiceForm40: new kendo.Layout("#invoiceForm40", {model: banhji.invoiceForm}),
		invoiceForm41: new kendo.Layout("#invoiceForm41", {model: banhji.invoiceForm}),
		invoiceForm42: new kendo.Layout("#invoiceForm42", {model: banhji.invoiceForm}),
		//Caritas Company
		formCaritasExpense: new kendo.Layout("#formCaritasExpense", {model: banhji.invoiceForm}),
		formCaritasJournal: new kendo.Layout("#formCaritasJournal", {model: banhji.invoiceForm}),

		saleSummaryByCustomer: new kendo.Layout("#saleSummaryByCustomer", {model: banhji.saleSummaryByCustomer}),
		saleDetailByCustomer: new kendo.Layout("#saleDetailByCustomer", {model: banhji.saleDetailByCustomer}),
		saleSummaryByProduct: new kendo.Layout("#saleSummaryByProduct", {model: banhji.saleSummaryByProduct}),
		saleDetailByProduct : new kendo.Layout("#saleDetailByProduct", {model: banhji.saleDetailByProduct}),
		customerTransactionList: new kendo.Layout("#customerTransactionList", {model: banhji.customerTransactionList}),
		depositDetailByCustomer: new kendo.Layout("#depositDetailByCustomer", {model: banhji.depositDetailByCustomer}),		
		customerBalanceSummary : new kendo.Layout("#customerBalanceSummary", {model: banhji.customerBalanceSummary}),
		customerBalanceDetail : new kendo.Layout("#customerBalanceDetail", {model: banhji.customerBalanceDetail}),
		receivableAgingSummary : new kendo.Layout("#receivableAgingSummary", {model: banhji.receivableAgingSummary}),
		receivableAgingDetail : new kendo.Layout("#receivableAgingDetail", {model: banhji.receivableAgingDetail}),
		collectInvoice : new kendo.Layout("#collectInvoice", {model: banhji.collectInvoice}),
		collectionReport : new kendo.Layout("#collectionReport", {model: banhji.collectionReport}),
		invoiceList : new kendo.Layout("#invoiceList", {model: banhji.invoiceList}),
		saleJobEngagement: new kendo.Layout("#saleJobEngagement", {model: banhji.saleJob}),
		saleOrderList: new kendo.Layout("#saleOrderList", {model: banhji.saleOrderList}),

		//Sale
		saleDashboard: new kendo.Layout("#saleDashboard", {model: banhji.saleDashboard}),
		saleCenter: new kendo.Layout("#saleCenter", {model: banhji.saleCenter}),
		sale: new kendo.Layout("#sale", {model: banhji.sale}),
		saleDetail: new kendo.Layout("#saleDetail", {model: banhji.saleDetail}),
		saleReportCenter: new kendo.Layout("#saleReportCenter", {model: banhji.saleReportCenter}),
		saleRecurring : new kendo.Layout("#saleRecurring", {model: banhji.saleRecurring}),
		saleInventoryPositionSummary: new kendo.Layout("#saleInventoryPositionSummary", {model: banhji.inventoryPositionSummary}),

		//Inventory		
		itemDashBoard: new kendo.Layout("#itemDashBoard", {model: banhji.itemDashBoard}),
		itemCenter: new kendo.Layout("#itemCenter", {model: banhji.itemCenter}),
		item: new kendo.Layout("#item", {model: banhji.item}),
		itemService: new kendo.Layout("#itemService", {model: banhji.itemService}),
		nonInventoryPart: new kendo.Layout("#nonInventoryPart", {model: banhji.nonInventoryPart}),
		itemPrice: new kendo.Layout("#itemPrice", {model: banhji.itemPrice}),
		itemCatalog: new kendo.Layout("#itemCatalog", {model: banhji.itemCatalog}),
		itemAssembly: new kendo.Layout("#itemAssembly", {model: banhji.itemAssembly}),
		itemAdjustment: new kendo.Layout("#itemAdjustment", {model: banhji.itemAdjustment}),
		itemSetting: new kendo.Layout("#itemSetting", {model: banhji.itemSetting}),
		internalUsage: new kendo.Layout("#internalUsage", {model: banhji.internalUsage}),
		serviceSetting: new kendo.Layout("#serviceSetting", {model: banhji.serviceSetting}),
		itemReportCenter: new kendo.Layout("#itemReportCenter", {model: banhji.itemReportCenter}),
		inventoryPositionSummary: new kendo.Layout("#inventoryPositionSummary", {model: banhji.inventoryPositionSummary}),
		inventoryPositionDetail: new kendo.Layout("#inventoryPositionDetail", {model: banhji.inventoryPositionDetail}),
		inventoryTurnoverList: new kendo.Layout("#inventoryTurnoverList", {model: banhji.inventorySale}),
		inventorySaleItemAnalysis: new kendo.Layout("#inventorySaleItemAnalysis", {model: banhji.inventorySale}),
		inventoryMovementSummary: new kendo.Layout("#inventoryMovementSummary", {model: banhji.inventorySale}),
		inventoryMovementDetail: new kendo.Layout("#inventoryMovementDetail", {model: banhji.inventorySale}),
		inventorySaleByItem: new kendo.Layout("#inventorySaleByItem", {model: banhji.inventorySaleByItem}),
		inventoryList: new kendo.Layout("#inventoryList", {model: banhji.inventoryList}),		
		inventoryPurchaseByVendorSummary: new kendo.Layout("#inventoryPurchaseByVendorSummary", {model: banhji.inventoryPurchaseByVendorSummary}),
		inventoryPurchaseByVendorDetail: new kendo.Layout("#inventoryPurchaseByVendorDetail", {model: banhji.inventoryPurchaseByVendorDetail}),
		fixedAssets: new kendo.Layout("#fixedAssets", {model: banhji.fixedAssets}),
		itemRecurring: new kendo.Layout("#itemRecurring", {model: banhji.itemRecurring}),
		cashMovement: new kendo.Layout("#cashMovement", {model: banhji.cashMovement}),
		cashPositionReport: new kendo.Layout("#cashPositionReport", {model: banhji.cashPositionReport}),
		cashCollectionReport: new kendo.Layout("#cashCollectionReport", {model: banhji.cashSales}),
		cashPaymentReport: new kendo.Layout("#cashPaymentReport", {model: banhji.cashPaymentReport}),
		cashAdvanceReport: new kendo.Layout("#cashAdvanceReport", {model: banhji.cashAdvanceReport}),

		//Cash Managment
		cashDashboard: new kendo.Layout("#cashDashboard", {model: banhji.cashDashboard}),
		cashCenter: new kendo.Layout("#cashCenter", {model: banhji.cashCenter}),
		cash: new kendo.Layout("#cash", {model: banhji.cash}),
		cashList : new kendo.Layout("#cashList", {model: banhji.cashList}),		
		cashDeposit: new kendo.Layout("#cashDeposit", {model: banhji.cashDeposit}),
		cashReportCenter: new kendo.Layout("#cashReportCenter"),
		cashier: new kendo.Layout("#cashier", {model: banhji.cashier}),
		reconcile: new kendo.Layout("#reconcile", {model: banhji.reconcile}),
		cashReceipt: new kendo.Layout("#cashReceipt", {model: banhji.cashReceipt}),
		cashPayment: new kendo.Layout("#cashPayment", {model: banhji.cashPayment}),
		cashFlowForecast: new kendo.Layout("#cashFlowForecast", {model: banhji.cashFlowForecast}),
		cashSetting: new kendo.Layout("#cashSetting", {model: banhji.cashSetting}),

		//Cash Management Dashbaord
		cashManagementDashboard: new kendo.Layout("#cashManagementDashboard", {model: banhji.cashManagementDashboard}),
		
		//Document
		documents: new kendo.Layout("#documents", {model: banhji.fileManagement}),

		//Report
		reportDashboard: new kendo.Layout("#reportDashboard", {model: banhji.reportDashboard}),
		profitabilitySummaryJob: new kendo.Layout("#profitabilitySummaryJob", {model: banhji.profitabilitySummaryJob}),
		profitabilityDetailJob: new kendo.Layout("#profitabilityDetailJob", {model: banhji.profitabilityDetailJob}),

		//Imports
		imports: new kendo.Layout("#importView", {model: banhji.importView}),

		//App Center
		appCenter: new kendo.Layout("#appCenter", {model: banhji.appCenter}),
		riceMill: new kendo.Layout("#riceMill", {model: banhji.riceMill}),


		//Menu
		accountingMenu: new kendo.View("#accountingMenu", {model: langVM}),
		employeeMenu: new kendo.View("#employeeMenu", {model: langVM}),
		vendorMenu: new kendo.View("#vendorMenu", {model: langVM}),
		customerMenu: new kendo.View("#customerMenu", {model: langVM}),
		cashMenu: new kendo.View("#cashMenu", {model: langVM}),
		inventoryMenu: new kendo.View("#inventoryMenu", {model: langVM}),
		taxMenu: new kendo.View("#taxMenu", {model: langVM}),
		saleMenu: new kendo.View("#saleMenu", {model: langVM}),
		riceMillMenu: new kendo.View("#riceMillMenu", {model: langVM})	
	};
	banhji.router = new kendo.Router({
		init: function() {	
			var language = JSON.parse(localStorage.getItem('userData/lang'));	
			switch(language) {
				case "KH": 
					langVM.set('lang', km_KH);
					localforage.setItem("lang", language);
					langVM.set('localeCode', language);
					break;
				case "EN":
					langVM.set('lang', en_US);
					localforage.setItem("lang", language);
					langVM.set('localeCode', language);
					break;
				default: 
					langVM.set('lang', en_US);
					localforage.setItem("lang", language);
					langVM.set('localeCode', language);
			}
			localforage.getItem('user', function(err, data){
				if (err) {
					
				} else {
					$('#current-section').html('|&nbsp;Company');
					$('#home-menu').addClass('active');
					banhji.view.layout.render("#wrapperApplication");
					banhji.index.set('companyName', data.institute.name);
					banhji.index.set('companyLogo', data.institute.logo);
					var blank = new kendo.View('#blank-tmpl');
					banhji.view.layout.showIn('#menu', banhji.view.menu);
					if(userPool.getCurrentUser() == null) {
						window.location.replace(baseUrl + "login");
					}
					banhji.aws.getImage();
				}
			});
		},
		routeMissing: function(e) {
			// banhji.view.layout.showIn("#layout-view", banhji.view.missing);
			console.log("no resource found.")
		}
	});
	/* Login page */
	banhji.router.route('/', function(){
		var blank = new kendo.View('#blank-tmpl');
		var admin = JSON.parse(localStorage.getItem('userData/user')) != null ? JSON.parse(localStorage.getItem('userData/user')).role : 0;
        if(admin != 1) {
        	window.location.replace("<?php echo base_url(); ?>admin");
        } else {
        	banhji.view.layout.showIn('#content', banhji.view.index);
			banhji.view.layout.showIn('#menu', banhji.view.menu);
			$('#main-top-navigation').append('<li><a href="\#">Home</a></li>');
			$('#current-section').text("");
			$("#secondary-menu").html("");
			banhji.index.getLogo();
			banhji.index.pageLoad();
			banhji.pageLoaded["index"] = true;
        }

        window.fbAsyncInit = function() {
	    FB.init({
	      appId      : '387834344756149',
	      xfbml      : true,
	      version    : 'v2.7'
	    });
	    FB.AppEvents.logPageView();
	  };

	  (function(d, s, id){
	     var js, fjs = d.getElementsByTagName(s)[0];
	     if (d.getElementById(id)) {return;}
	     js = d.createElement(s); js.id = id;
	     js.src = "//connect.facebook.net/en_US/sdk.js";
	     fjs.parentNode.insertBefore(js, fjs);
	   }(document, 'script', 'facebook-jssdk'));

	});
	
	$(function() {
		banhji.router.start();
		banhji.source.pageLoad();
		console.log($(location).attr('hash').substr(1));

		var cognitoUser = userPool.getCurrentUser();
		cognitoUser.getSession(function(err, session) {
          	if(session) {
            	// window.location.replace(baseUrl + "rrd/");
          	} else {
            	window.location.replace(baseUrl + "login/");
          	}
        });

		function createCookie(name,value,days) {
		    if (days) {
		        var date = new Date();
		        date.setTime(date.getTime()+(days*24*60*60*1000000000000000));
		        var expires = "; expires="+date.toGMTString();
		    }
		    else var expires = "";
		    document.cookie = name+"="+value+expires+"; path=/";
		}
		function readCookie(name) {
		    var nameEQ = name + "=";
		    var ca = document.cookie.split(';');
		    for(var i=0;i < ca.length;i++) {
		        var c = ca[i];
		        while (c.charAt(0)==' ') c = c.substring(1,c.length);
		        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
		    }
		    return null;
		}
		function eraseCookie(name) {
		    createCookie(name,"");
		}
	});
</script>