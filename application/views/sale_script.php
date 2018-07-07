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
    banhji.accessPage = new kendo.data.DataSource({
	    transport: {
	        read  : {
	          	url: baseUrl + 'api/users/access_role',
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
	    page:1,
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
	kendo.culture(banhji.locale);
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

	// DO NOT REPLACE THIS CODE IS MODIFIED
	// SOURCE #############################################################################################
	banhji.source = kendo.observable({
        lang                        : langVM,
        testDS                      : dataStore(apiUrl + "transactions/number"),
        countryDS                   : dataStore(apiUrl + "countries"),
        //Contact
        customerDS                  : new kendo.data.DataSource({
            transport: {
                read    : {
                    url: apiUrl + "contacts",
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
            schema  : {
                model: {
                    id: 'id'
                },
                data: 'results',
                total: 'count'
            },
            filter:[
                { field:"parent_id", operator:"where_related_contact_type", value:1 },//Customer
                { field:"assignee_id", operator:"by_user_id", value:banhji.userData.id },
                { field:"status", value:1 }
            ],
            sort:[
                { field:"contact_type_id", dir:"asc" },
                { field:"number", dir:"asc" }
            ],
            serverFiltering: true,
            serverSorting: true,
            serverPaging: true,
            page: 1,
            pageSize: 100
        }),
        supplierDS                  : new kendo.data.DataSource({
            transport: {
                read    : {
                    url: apiUrl + "contacts",
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
            schema  : {
                model: {
                    id: 'id'
                },
                data: 'results',
                total: 'count'
            },
            filter:[
                { field:"parent_id", operator:"where_related_contact_type", value:2 },//Supplier
                { field:"status", value:1 }
            ],
            sort:[
                { field:"contact_type_id", dir:"asc" },
                { field:"number", dir:"asc" }
            ],
            serverFiltering: true,
            serverSorting: true,
            serverPaging: true,
            page: 1,
            pageSize: 100
        }),
        employeeDS                  : new kendo.data.DataSource({
            transport: {
                read    : {
                    url: apiUrl + "contacts",
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
            schema  : {
                model: {
                    id: 'id'
                },
                data: 'results',
                total: 'count'
            },
            filter:[
                { field:"parent_id", operator:"where_related_contact_type", value:3 },//Employee
                { field:"status", value:1 }
            ],
            sort:[
                { field:"contact_type_id", dir:"asc" },
                { field:"number", dir:"asc" }
            ],
            serverFiltering: true,
            serverSorting: true,
            serverPaging: true,
            page: 1,
            pageSize: 100
        }),
        employeeUserDS              : dataStore(apiUrl + "contacts"),
        //Contact Type
        contactTypeList             : [],
        contactTypeDS               : dataStore(apiUrl + "contacts/type"),
        //Job
        jobList                     : [],
        jobDS                       : dataStore(apiUrl + "jobs"),
        //Currency
        currencyList                : [],
        currencyDS                  : dataStore(apiUrl + "currencies"),
        currencyRateDS              : dataStore(apiUrl + "currencies/rate"),
        //Item
        itemDS                      : dataStore(apiUrl + "items"),
        itemTypeDS                  : dataStore(apiUrl + "item_types"),
        itemGroupList               : [],
        itemGroupDS                 : dataStore(apiUrl + "items/group"),
        brandDS                     : dataStore(apiUrl + "brands"),
        categoryList                : [],
        categoryDS                  : dataStore(apiUrl + "categories"),
        itemPriceDS                 : dataStore(apiUrl + "item_prices"),
        measurementList             : [],
        measurementDS               : dataStore(apiUrl + "measurements"),
        locationDS                  : new kendo.data.DataSource({
            transport: {
                read    : {
                    url: apiUrl + "locations",
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
            schema  : {
                model: {
                    id: 'id'
                },
                data: 'results',
                total: 'count'
            },
            filter:{ field:"contact_id", operator:"by_user_id", value:banhji.userData.id },
            serverFiltering: true,
            serverSorting: true,
            serverPaging: true,
            page:1,
            pageSize: 100
        }),
        //Tax
        taxTypeDS                   : dataStore(apiUrl + "tax_types"),
        taxList                     : [],
        taxItemDS                   : dataStore(apiUrl + "tax_items"),
        //Accounting
        accountList                 : [],
        accountDS                   : dataStore(apiUrl + "accounts"),
        accountTypeDS               : new kendo.data.DataSource({
            transport: {
                read    : {
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
            schema  : {
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
        paymentTermDS               : dataStore(apiUrl + "payment_terms"),
        paymentMethodDS             : dataStore(apiUrl + "payment_methods"),
        //Segment
        segmentDS                   : dataStore(apiUrl + "segments"),
        segmentItemList             : [],
        segmentItemDS               : dataStore(apiUrl + "segments/item"),
        //Txn Template
        txnTemplateList             : [],
        txnTemplateDS               : dataStore(apiUrl + "transaction_templates"),
        //Prefixes
        prefixList                  : [],
        prefixDS                    : dataStore(apiUrl + "prefixes"),
        frequencyList               : [
            { id: 'Daily', name: 'Day' },
            { id: 'Weekly', name: 'Week' },
            { id: 'Monthly', name: 'Month' },
            { id: 'Annually', name: 'Annual' }
        ],
        monthOptionList             : [
            { id: 'Day', name: 'Day' },
            { id: '1st', name: '1st' },
            { id: '2nd', name: '2nd' },
            { id: '3rd', name: '3rd' },
            { id: '4th', name: '4th' }
        ],
        monthList                   : [
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
        weekDayList                 : [
            { id: 0, name: 'Sunday' },
            { id: 1, name: 'Monday' },
            { id: 2, name: 'Tuesday' },
            { id: 3, name: 'Wednesday' },
            { id: 4, name: 'Thurday' },
            { id: 5, name: 'Friday' },
            { id: 6, name: 'Saturday' }
        ],
        dayList                     : [
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
        sortList                    : [
            { text:"All", value: "all" },
            { text:"Today", value: "today" },
            { text:"This Week", value: "week" },
            { text:"This Month", value: "month" },
            { text:"This Year", value: "year" }
        ],
        statusList                  : [
            { "id": 1, "name": "Active" },
            { "id": 0, "name": "Inactive" },
            { "id": 2, "name": "Void" }
        ],
        applicationStatusList       : [
            { "id": 1, "name": "Approve" },
            { "id": 0, "name": "Pending" },
            { "id": 2, "name": "Review" },
            { "id": 3, "name": "Submit" }
        ],
        customerFormList            : [
            { id: "Quote", name: "Quotation" },
            { id: "Sale_Order", name: "Sale Order" },
            { id: "Deposit", name: "Deposit" },
            { id: "Cash_Sale", name: "Cash Sale" },
            { id: "Invoice", name: "Invoice" },
            { id: "Cash_Receipt", name: "Cash Receipt" },
            //{ id: "Sale_Return", name: "Sale Return" },
            { id: "GDN", name: "Delivered Note" }
        ],
        vendorFormList              : [
            { id: "Purchase_Order", name: "Purchase Order" },
            { id: "GRN", name: "GRN" },
            // { id: "Deposit", name: "Deposit" },
            // { id: "Purchase", name: "Purchase" },
            // { id: "Pur_Return", name: "Pur.Return" },
            { id: "Cash_Payment", name: "Cash Payment" }
        ],
        cashFormList                : [
            { id: "Cash_Transfer", name: "Cash Transaction" },
            { id: "Cash_Receipt", name: "Cash Receipt" },
            { id: "Cash_Payment", name: "Cash Payment" },
            { id: "Cash_Advance", name: "Cash Advance" },
            { id: "Reimbursement", name: "Reimbursement" },
            { id: "Advance_Settlement", name: "Advance Settlement" }
        ],
        cashMGTFormList             : [
            { id: "Cash_Transfer", name: "Transfer" },
            { id: "Deposit", name: "Deposit" },
            { id: "Withdraw", name: "Withdraw" },
            { id: "Cash_Advance", name: "Advance" },
            { id: "Cash_Payment", name: "Payment" },
            { id: "Reimbursement", name: "Reimbursement" },
            { id: "Journal", name: "Journal" }
        ],
        statusObj                   : { text:"", date:"", number:"", url:"" },
        defaultLines                : 2,
        genderList                  : ["M", "F"],
        typeList                    : ['Invoice','Commercial_Invoice','Vat_Invoice','Electricity_Invoice','Water_Invoice','Cash_Sale','Commercial_Cash_Sale','Vat_Cash_Sale','Receipt_Allocation','Sale_Order','Quote','GDN','Sale_Return','Purchase_Order','GRN','Cash_Purchase','Credit_Purchase','Purchase_Return','Payment_Allocation','Deposit','Electricty_Deposit','Water_Deposit','Customer_Deposit','Vendor_Deposit','Withdraw','Transfer','Journal','Item_Adjustment','Cash_Advance','Reimbursement','Direct_Expense','Advance_Settlement','Additional_Cost','Cash_Payment','Cash_Receipt','Credit_Note','Debit_Note','Offset_Bill','Offset_Invoice','Cash_Transfer','Internal_Usage'],
        user_id                     : banhji.userData.id,
        active                      : "Active",
        inactive                    : "Inactive",
        amtDueColor                 : "#eee",
        acceptedSrc                 : "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/accepted.ico",
        approvedSrc                 : "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/approved.ico",
        cancelSrc                   : "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/cancel.ico",
        openSrc                     : "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/open.ico",
        paidSrc                     : "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/paid.ico",
        partialyPaidSrc             : "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/partialy_paid.ico",
        usedSrc                     : "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/used.ico",
        receivedSrc                 : "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/received.ico",
        deliveredSrc                : "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/delivered.ico",
        successMessage              : "Saved Successful!",
        errorMessage                : "Warning, please review it again!",
        confirmMessage              : "Are you sure, you want to delete it?",
        requiredMessage             : "Required",
        duplicateNumber             : "Duplicate Number!",
        duplicateInvoice            : "Duplicate Invoice!",
        selectCustomerMessage       : "Please select a customer.",
        selectSupplierMessage       : "Please select a supplier.",
        selectItemMessage           : "Please select an item.",
        duplicateMeasurementMessage : "Sorry, you can not use the same measurement.",
        duplicateSelectedItemMessage: "You already selected this item.",
        noChangeInvoicePaidMessage  : "Sorry, you can not change the amount of paid invoice.",
        employee 					: [],
        test : function () {
            var a = "foo 12.34 bar 56 baz 78.90";
            var numbers = a.match(/\d+/g).map(Number);
            console.log(numbers);
        },
        pageLoad                    : function(){
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
            this.itemTypeDS.read();
            this.loadMeasurements();

            this.loadContactTypes();
            this.loadEmployeeByUser();
        },
        loadEmployeeByUser 			: function(){
        	var self = this;

        	this.employeeUserDS.query({
        		filter:{ field:"user_id", value: banhji.userData.id }
        	}).then(function(){
        		var view = self.employeeUserDS.view();

        		self.set("employee", view[0]);
        	});
        },
        checkAccessModule           : function(moduleName){
            banhji.accessMod.query({
                filter: {field: 'username', value: JSON.parse(localStorage.getItem('userData/user')).username}
            }).then(function(e){
                var allowed = false;
                if(banhji.accessMod.data().length > 0) {
                    for(var i = 0; i < banhji.accessMod.data().length; i++) {
                        if(moduleName.toLowerCase() == banhji.accessMod.data()[i].name.toLowerCase()) {
                            allowed = true;
                            break;
                        }
                    }
                }
                return allowed;
            });
        },
        getFiscalDate               : function(){
            var today = new Date(),
            fDate = new Date(today.getFullYear() +"-"+ banhji.institute.fiscal_date);

            if(today < fDate){
                fDate.setFullYear(today.getFullYear()-1);
            }

            return fDate;
        },
        loadPrefixes                : function(){
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
        loadTxnTemplates            : function(){
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
        loadCurrencies              : function(){
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
        loadRates                   : function(){
            this.currencyRateDS.query({
                filter:[],
                sort:{ field:"date", dir:"desc"}
            });
        },
        getRate                     : function(locale, date){
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
        loadTaxes                   : function(){
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
        checkWHT                    : function(tax_type_id){
            var result = false,
                types = this.taxTypeDS.get(tax_type_id);

            if(types.sub_of_id==12){
                result = true;
            }

            return result;
        },
        loadJobs                    : function(){
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
        loadSegmentItems            : function(){
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
        loadAccounts                : function(){
            var self = this, raw = this.get("accountList");

            //Clear array
            if(raw.length>0){
                raw.splice(0,raw.length);
            }

            this.accountDS.query({
                filter: { field:"status", value:1 },
                sort: [
                    { field: "account_type_id", dir: "asc" },
                    { field: "number", dir: "asc" }
                ]
            }).then(function(){
                var view = self.accountDS.view();

                $.each(view, function(index, value){
                    raw.push(value);
                });
            });
        },
        loadCategories              : function(){
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
        loadItemGroups              : function(){
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
        loadMeasurements            : function(){
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
        loadContactTypes            : function(){
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
        getPaymentTerm              : function(id){
            var data = this.paymentTermDS.get(id);
            return data.name;
        },
        getPrefixAbbr               : function(type){
            var abbr = "";
            $.each(this.prefixList, function(index, value){
                if(value.type==type){
                    abbr = value.abbr;

                    return false;
                }
            });

            return abbr;
        },
        getCurrencyCode             : function(locale){
            var code = "";

            $.each(this.currencyDS.data(), function(index, value){
                if(value.locale==locale){
                    code = value.code;

                    return false;
                }
            });

            return code;
        },
        getPriceList                : function(id){
            var priceList = [],
                item = this.itemDS.get(id),
                measurement = this.measurementDS.get(item.measurement_id);

            $.each(this.itemPriceList, function(index, value){
                if(value.item_id==id){
                    priceList.push(value);
                }
            });

            return priceList;
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
	banhji.searchAdvanced = kendo.observable({
    	lang 				: langVM,
    	contactDS 			: dataStore(apiUrl+"contacts"),
    	contactTypeDS 		: dataStore(apiUrl+"contacts/type"),
    	transactionDS 		: dataStore(apiUrl+"transactions"),
    	itemDS 				: dataStore(apiUrl+"items"),
    	accountDS 			: dataStore(apiUrl+"accounts"),
    	searchType 			: "",
    	searchText 			: "",
    	found 				: 0,
    	pageLoad 			: function(){
		},
		search 				: function(){
			var self = this, 
			searchText = this.get("searchText");
			this.set("found", 0);

			if(searchText){
				this.contactDS.query({
					filter:[
						{ field:"number", operator:"like", value: searchText },
						{ field:"surname", operator:"or_like", value: searchText },
						{ field:"name", operator:"or_like", value: searchText },
						{ field:"company", operator:"or_like", value: searchText }
					],
					page:1,
					pageSize: 10
				}).then(function(){
					var found = self.get("found") + self.contactDS.total();
					self.set("found", found);
				});

				this.transactionDS.query({
					filter:[
						{ field:"number", operator:"like", value: searchText }
					],
					page:1,
					pageSize: 10
				}).then(function(){
					var found = self.get("found") + self.transactionDS.total();
					self.set("found", found);
				});

				this.itemDS.query({
					filter:[
						{ field:"number", operator:"like", value: searchText },
						{ field:"name", operator:"or_like", value: searchText }
					],
					page:1,
					pageSize: 10
				}).then(function(){
					var found = self.get("found") + self.itemDS.total();
					self.set("found", found);
				});

				this.accountDS.query({
					filter:[
						{ field:"number", operator:"like", value: searchText },
						{ field:"name", operator:"or_like", value: searchText }
					],
					page:1,
					pageSize: 10
				}).then(function(){
					var found = self.get("found") + self.accountDS.total();
					self.set("found", found);
				});
			}
		},
		selectedContact 	: function(e){
			e.preventDefault();

			var data = e.data, 
			type = this.contactTypeDS.get(data.contact_type_id);
			
			if(type.parent_id==1){
				banhji.customerCenter.loadContact(data.id);
				banhji.router.navigate('/customer_center', false);
			}else{
				banhji.vendorCenter.loadContact(data.id);
				banhji.router.navigate('/vendor_center', false);
			}
		},
		selectedTransaction : function(e){
			e.preventDefault();

			var data = e.data;
			banhji.router.navigate('/'+data.type.toLowerCase()+'/'+data.id);
		},
		selectedItem 		: function(e){
			e.preventDefault();

			var data = e.data;
			banhji.router.navigate('/item_center/'+e.data.id);
		},
		selectedAccount 		: function(e){
			e.preventDefault();

			var data = e.data;
			banhji.router.navigate('/accounting_center/'+e.data.id);
		}
    });


	banhji.saleCenter = kendo.observable({
		lang 				: langVM,
		transactionDS  		: dataStore(apiUrl + 'transactions'),
		summaryDS  			: dataStore(apiUrl + 'sales/center_snapshot'),		
		noteDS 				: dataStore(apiUrl + 'notes'),
		attachmentDS	 	: dataStore(apiUrl + "attachments"),
		txnDS 				: dataStore(apiUrl + "transactions"),
		contactDS			: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + "contacts",
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
			filter:{ field:"assignee_id", operator:"by_user_id", value:banhji.source.user_id },
			sort:{ field:"number", dir:"asc" },
			batch: true,
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page:1,
			pageSize: 100
		}),
		contactTypeDS 		: new kendo.data.DataSource({
		  	data: banhji.source.contactTypeList,
		  	filter: { field:"parent_id", value: 1 }//Customer
		}),
		sortList			: banhji.source.sortList,
		sorter 				: "all",
		sdate 				: "",
		edate 				: "",
		obj 				: null,
		objSmr				: null,
		note 				: "",
		searchText 			: "",
		contact_type_id 	: null,
		currency_id 		: 0,
		quote 				: 0,
		so 					: 0,
		currencyCode 		: "",
		pageLoad 			: function(id){
			if(id){
				this.loadObj(id);
			}

			//Refresh
			if(this.contactDS.total()>0){
				this.contactDS.fetch();
				this.searchTransaction();
				this.loadSummary();
			}
		},
		sorterChanges 		: function(){
	        var today = new Date(),
        	sdate = "",
        	edate = "",
        	sorter = this.get("sorter");
        	
			switch(sorter){
				case "today":								
					this.set("sdate", today);
					this.set("edate", "");
													  					
				  	break;
				case "week":			  	
					var first = today.getDate() - today.getDay(),
					last = first + 6;

					this.set("sdate", new Date(today.setDate(first)));
					this.set("edate", new Date(today.setDate(last)));						
					
				  	break;
				case "month":							  	
					this.set("sdate", new Date(today.getFullYear(), today.getMonth(), 1));
					this.set("edate", new Date(today.getFullYear(), today.getMonth() + 1, 0));

				  	break;
				case "year":				
				  	this.set("sdate", new Date(today.getFullYear(), 0, 1));
				  	this.set("edate", new Date(today.getFullYear(), 11, 31));

				  	break;
				default:
					this.set("sdate", "");
				  	this.set("edate", "");									  
			}
		},
		setCurrencyCode 	: function(){
			var code = "", obj = this.get("obj");

			$.each(banhji.source.currencyDS.data(), function(index, value){				
				if(value.locale == obj.locale){
					code = value.code;					

					return false;					
				}
			});

			this.set("currencyCode", code);
		},
		loadObj 			: function(id){
			var self = this;

			this.contactDS.query({
				filter: { field:"id", value:id},
				page:1,
				pageSize:100
			}).then(function(){
				var view = self.contactDS.view();

				if(view.length>0){
					self.set("obj", view[0]);
					self.loadData();
				}
			});
		},
		loadData 			: function(){
			var obj = this.get("obj");

			this.searchTransaction();
			this.loadSummary(obj.id);
			this.setCurrencyCode();

			this.attachmentDS.filter({ field:"contact_id", value: obj.id });
			this.noteDS.query({
				filter: { field:"contact_id", value: obj.id },
				sort: { field:"noted_date", dir:"desc" },
				page: 1,
				pageSize: 10
			});
		},
		//Upload
		onSelect 			: function(e){
	        // Array with information about the uploaded files
	        var self = this, 
	        files = e.files,
	        obj = this.get("obj");
			
			if(obj!==null){
		        // Check the extension of each file and abort the upload if it is not .jpg
		        $.each(files, function(index, value){
		            if (value.extension.toLowerCase() === ".jpg"
		            	|| value.extension.toLowerCase() === ".jpeg"
		            	|| value.extension.toLowerCase() === ".tiff"
		            	|| value.extension.toLowerCase() === ".png" 
		            	|| value.extension.toLowerCase() === ".gif"
		            	|| value.extension.toLowerCase() === ".pdf"){

		            	var key = 'ATTACH_' + banhji.institute.id + "_" + Math.floor(Math.random() * 100000000000000001) +'_'+ value.name;

		            	self.attachmentDS.add({
		            		user_id 		: self.get("user_id"),
		            		contact_id 		: obj.id,
		            		type 			: "Contact",
		            		name 			: value.name,
		            		description 	: "",
		            		key 			: key,
		            		url 			: banhji.s3 + key,
		            		size 			: value.size,
		            		created_at 		: new Date(),
		            		file 			: value.rawFile
		            	});
		            }else{
		            	alert("This type of file is not allowed to attach.");
		            }
		        });
	    	}
	    },
	    removeFile 			: function(e){
	    	var data = e.data;

	    	if (confirm(banhji.source.confirmMessage)) {
	    		this.attachmentDS.remove(data);
	    		this.attachmentDS.sync();
	    	}	    	
	    },
	    uploadFile 			: function(){
	    	$.each(this.attachmentDS.data(), function(index, value){	    		
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

            this.attachmentDS.sync();
            var saved = false;
            this.attachmentDS.bind("requestEnd", function(e){
            	//Delete File
            	if(e.type=="destroy"){
	            	if(saved==false && e.response){
	            		saved = true;
	            	
	            		var response = e.response.results;
	            		$.each(response, function(index, value){            			
		            		var params = {
							  	//Bucket: 'STRING_VALUE', /* required */
							 	Delete: { /* required */
								    Objects: [ /* required */
								      	{
									        Key: value.data.key /* required */
								      	}
								      /* more items */
								    ]
							  	}
							};
							bucket.deleteObjects(params, function(err, data) {
							  	//console.log(err, data);
							});
						});
	            	}
            	}
            });
	    },
	    //Summary
		loadContact 		: function(id){
			var self = this;
			
			this.contactDS.query({
			  	filter:[
			  		{ field:"id", value:id }
			  	],
			  	page: 1,
			  	pageSize: 50
			}).then(function(e) {
			    var view = self.contactDS.data();
			    
			    if(view.length>0){
			    	self.set("obj", view[0]);
			    	self.loadData();
			    }
			});
		},
		loadSummary 		: function(id){
			var self = this, obj = this.get("obj");

			this.summaryDS.query({
			  	filter: [
			  		{ field:"contact_id", value: obj.id },
			  		{ field:"employee_id", value: banhji.source.get("employee").id }
			  	],
			  	page: 1,
			  	pageSize: 100
			}).then(function(){
				var view = self.summaryDS.view();
				
				self.set("objSmr", view[0]);				
			});
		},
		loadSaleOrder 		: function(){
			var obj = this.get("obj");

			this.transactionDS.query({
			  	filter: [
			  		{ field:"contact_id", value: obj.id },
			  		{ field:"employee_id", value: banhji.source.get("employee").id },
			  		{ field:"type", value:"Sale_Order" },
			  		{ field:"status", value: 0 }
			  	],
			  	sort: [
			  		{ field: "issued_date", dir: "desc" },
			  		{ field: "id", dir: "desc" }
			  	],
			  	page: 1,
			  	pageSize: 10
			});
		},
		loadSale 			: function(){
			var obj = this.get("obj");

			this.transactionDS.query({
			  	filter: [
			  		{ field:"contact_id", value: obj.id },
			  		{ field:"employee_id", value: banhji.source.get("employee").id },
			  		{ field:"nature_type", value:"Cash_Sale" }
			  	],
			  	sort: [
			  		{ field: "issued_date", dir: "desc" },
			  		{ field: "id", dir: "desc" }
			  	],
			  	page: 1,
			  	pageSize: 10
			});
		},
		selectedRow			: function(e){
			var data = e.data;
			
			this.set("obj", data);
			this.loadData();
		},
		//Search
		search 				: function(){
			var self = this, 
			para = [],
      		searchText = this.get("searchText"),
      		contact_type_id = this.get("contact_type_id");
      		
      		if(searchText){
      			var textParts = searchText.replace(/([a-z]+)/i, "$1 ").split(/[^0-9a-z]+/ig);

      			para.push(
      				{ field: "abbr", value: textParts[0] },
      				{ field: "number", value: textParts[1] },
					{ field: "name", operator: "or_like", value: searchText }
      			);
      		}

      		if(contact_type_id){
      			para.push({ field: "contact_type_id", value: contact_type_id });
      		}else{
      			para.push({ field: "parent_id", operator:"where_related_contact_type", value: 1 });
      		}

      		para.push({ field:"assignee_id", operator:"by_user_id", value:banhji.source.user_id });

      		this.contactDS.filter(para);
			
			//Clear search filters
      		self.set("searchText", "");
      		self.set("contact_type_id", 0);
		},
		searchTransaction	: function(){
			var self = this,
				start = kendo.toString(this.get("sdate"), "yyyy-MM-dd"),
        		end = kendo.toString(this.get("edate"), "yyyy-MM-dd"),
        		para = [], obj = this.get("obj");

        	if(obj!==null){
        		para.push({ field:"contact_id", value: obj.id });
        	
	        	//Dates
	        	if(start && end){
	            	para.push({ field:"issued_date >=", value: start });
	            	para.push({ field:"issued_date <=", value: end });
	            }else if(start){
	            	para.push({ field:"issued_date", value: start });
	            }else if(end){
	            	para.push({ field:"issued_date <=", value: end });
	            }else{
	            	
	            }

	            para.push({ field:"employee_id", value: banhji.source.get("employee").id });
	            para.push({ field:"type", operator:"where_in", value: ["Quote","Sale_Order","Customer_Deposit","Commercial_Cash_Sale","Vat_Cash_Sale","Cash_Sale"] });

	            this.transactionDS.query({
	            	filter: para,
	            	sort: [
				  		{ field: "issued_date", dir: "desc" },
				  		{ field: "id", dir: "desc" }
				  	],
	            	page: 1,
	            	pageSize: 10
	            });
	        }            
		},
		//Links	
		goEdit 		 		: function(){
			var obj = this.get("obj");

			if(obj!==null){
				banhji.router.navigate('/customer/'+obj.id);
			}
		},
		goReference 		: function(e){
			var self = this, data = e.data;

			this.txnDS.query({
				filter:{ field:"id", value:data.reference_id}
			}).then(function(){
				var view = self.txnDS.view();

				banhji.router.navigate('/' + view[0].type.toLowerCase() +'/'+ data.reference_id);
			});
		},
		goQuote				: function(){
			var obj = this.get("obj");

			if(obj!==null){
				banhji.router.navigate('/quote');
				banhji.quote.setContact(obj);
			}
		},
		goDeposit			: function(){
			var obj = this.get("obj");

			if(obj!==null){
				banhji.router.navigate('/customer_deposit');
				banhji.customerDeposit.setContact(obj);
			}
		},
		goSaleOrder			: function(){
			var obj = this.get("obj");

			if(obj!==null){
				banhji.router.navigate('/sale_order');
				banhji.saleOrder.setContact(obj);
			}
		},
		goCashSale			: function(){
			var obj = this.get("obj");

			if(obj!==null){
				banhji.router.navigate('/cash_sale');
				banhji.cashSale.setContact(obj);
			}
		},
		//Note
		saveNoteEnter 		: function(e){
			e.preventDefault();
			this.saveNote();
		},
		saveNote 			: function(){
			var obj = this.get("obj");

			if(obj!==null && this.get("note")!==""){
				this.noteDS.insert(0, {
					contact_id 	: obj.id,
					note 		: this.get("note"),
					noted_date	: new Date(),
					created_by 	: this.get("user_id"),

					creator 	: ""
				});

				this.noteDS.sync();
				this.set("note", "");					
			}else{
				alert("Please select a customer and Memo is required");
			}
		}
	});
	banhji.customer = kendo.observable({
		lang 					: langVM,
		dataSource 				: dataStore(apiUrl + "contacts"),
		patternDS 				: dataStore(apiUrl + "contacts"),
		numberDS 				: dataStore(apiUrl + "contacts"),
		deleteDS 				: dataStore(apiUrl + "transactions"),
		existingDS 				: dataStore(apiUrl + "contacts"),
		contactPersonDS			: dataStore(apiUrl + "contact_persons"),
		contactAssigneeDS		: dataStore(apiUrl + "contact_assignees"),
		paymentTermDS			: banhji.source.paymentTermDS,
		paymentMethodDS			: banhji.source.paymentMethodDS,
		countryDS 				: banhji.source.countryDS,
		currencyDS  			: new kendo.data.DataSource({
		  	data: banhji.source.currencyList,
		  	filter: { field:"status", value: 1 }
		}),
		contactTypeDS 			: new kendo.data.DataSource({
		  	data: banhji.source.contactTypeList,
		  	filter: { field:"parent_id", value: 1 }//Customer
		}),
		arDS 		  			: new kendo.data.DataSource({
		  	data: banhji.source.accountList,
		  	filter: { field:"account_type_id", value: 12 },
		  	sort: { field:"number", dir:"asc" }
		}),
		raDS 		  			: new kendo.data.DataSource({
		  	data: banhji.source.accountList,
		  	filter:{
	      		logic: "or",
			    filters: [
			      	{ field: "account_type_id", value: 35 },
		      		{ field: "account_type_id", value: 39 }
			    ]
			},
			sort: { field:"number", dir:"asc" }
		}),
		depositDS 		  		: new kendo.data.DataSource({
		  	data: banhji.source.accountList,
		  	filter: {
	      		logic: "or",
			    filters: [
			      	{ field: "account_type_id", value: 25 },
	      			{ field: "account_type_id", value: 30 }
			    ]
			},
			sort: { field:"number", dir:"asc" }
		}),
		tradeDiscountDS 		: new kendo.data.DataSource({
		  	data: banhji.source.accountList,
		  	filter: { field:"id", value: 72 },
		  	sort: { field:"number", dir:"asc" }
		}),
		settlementDiscountDS 	: new kendo.data.DataSource({
		  	data: banhji.source.accountList,
		  	// filter: { field:"id", value: 99 },
		  	filter: {
	      		logic: "or",
			    filters: [
			      	{ field: "account_type_id", value: 36 },
	      			{ field: "account_type_id", value: 37 },
	      			{ field: "account_type_id", value: 38 },
	      			{ field: "account_type_id", value: 40 },
	      			{ field: "account_type_id", value: 41 },
	      			{ field: "account_type_id", value: 42 },
	      			{ field: "account_type_id", value: 43 }
			    ]
			},
		  	sort: { field:"number", dir:"asc" }
		}),
		taxItemDS 				: new kendo.data.DataSource({
		  	data: banhji.source.taxList,
		  	filter:{
			    logic: "or",
			    filters: [
			      	{ field: "tax_type_id", value: 3 },//Customer Tax
			      	{ field: "tax_type_id", value: 9 }
			    ]
			},
		  	sort: [
			  	{ field: "tax_type_id", dir: "asc" },
			  	{ field: "name", dir: "asc" }
			]
		}),
		genders					: banhji.source.genderList,
		statusList 				: banhji.source.statusList,
		confirmMessage 			: banhji.source.confirmMessage,
		isEdit 					: false,
		isProtected 			: false,
        obj 					: null,
        saveClose 				: false,
		showConfirm 			: false,
		notDuplicateNumber 		: true,
		phFullname 				: "Customer Name ...",
		contact_type_id 		: 0,
		pageLoad 				: function(id, contact_type_id){
			if(id){
				this.set("isEdit", true);
				this.loadObj(id, contact_type_id);
			}else{
				if(this.get("isEdit") || this.dataSource.total()==0){
					this.addEmpty();
				}
			}	
		},
		//Contact Person
		addEmptyContactPerson 	: function(){
			var obj = this.get("obj");
			
			this.contactPersonDS.add({
				contact_id 			: obj.id,
      			prefix 				: "",
				name 				: "",
				department			: "",
				phone				: "",
				email				: ""
			});
		},
		deleteContactPerson 	: function(e){
			if (confirm("Are you sure, you want to delete it?")) {
				var d = e.data,
				obj = this.contactPersonDS.getByUid(d.uid);

				this.contactPersonDS.remove(obj);
			}
		},
		//Map
		loadMap 				: function(){
			var obj = this.get("obj"), lat = kendo.parseFloat(obj.latitute),
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
					map: map,
					title: obj.number
				});
			} 
		},
		copyBillTo 				: function(){
			var obj = this.get("obj");

			obj.set("ship_to", obj.bill_to);
		},
		//Number      	
		checkExistingNumber 	: function(){
			var self = this, para = [], 
			obj = this.get("obj");
			
			if(obj.number!==""){

				if(obj.isNew()==false){
					para.push({ field:"id", operator:"where_not_in", value: [obj.id] });
				}

				para.push({ field:"abbr", value: obj.abbr });
				para.push({ field:"number", value: obj.number });
				para.push({ field:"contact_type_id", value: obj.contact_type_id });
				
				this.existingDS.query({
					filter: para,
					page: 1,
					pageSize: 1
				}).then(function(e){
					var view = self.existingDS.view();
					
					if(view.length>0){
				 		self.set("notDuplicateNumber", false);
					}else{
						self.set("notDuplicateNumber", true);
					}
				});
			}
		},
		generateNumber 			: function(){
			var self = this, obj = this.get("obj");

			this.numberDS.query({
				filter:[
					{ field:"contact_type_id", value:obj.contact_type_id }
				],
				sort: { field:"number", dir:"desc" },
				page:1,
				pageSize:1
			}).then(function(){
				var view = self.numberDS.view();

				var lastNo = 0;
				if(view.length>0){
					lastNo = kendo.parseInt(view[0].number);
				}
				lastNo++;
				obj.set("number",kendo.toString(lastNo, "00000"));
			});
		},
		checkExistingTxn		: function(){
			var self = this, obj = this.get("obj");
			
			this.deleteDS.query({
				filter: { field:"contact_id", value: obj.id },
				page: 1,
				pageSize: 1
			}).then(function(e){
				var view = self.deleteDS.view();
				
				if(view.length>0){
					self.set("isProtected", true);
				}else{
					self.set("isProtected", false);
				}
			});
		},
		//Obj
		loadObj 				: function(id, contact_type_id){
			var self = this, para = [];

			if(id>0){
				para.push({ field:"id", value: id });
			}

			if(contact_type_id){
				para.push({ field:"contact_type_id", value: contact_type_id });
				para.push({ field:"is_pattern", value: 1 });
			}

			this.dataSource.query({
				filter: para,
				page: 1,
				pageSize: 100
			}).then(function(e){
				var view = self.dataSource.view();
				
				self.set("obj", view[0]);
				self.loadMap();
				self.checkExistingTxn();
			});

			this.contactPersonDS.filter({ field:"contact_id", value: id });
		},
      	addEmpty 				: function(){
      		this.dataSource.data([]);
      		this.contactPersonDS.data([]);
      		
      		this.set("isEdit", false);
      		this.set("isProtected", false);
      		this.set("notDuplicateNumber", true);
      		this.set("obj", null);
      		
  			this.dataSource.insert(0, {
				"country_id" 			: 0,
				"user_id" 				: 0,
				"contact_type_id" 		: 4, //General Customer
				"abbr"					: "",
				"number"				: "",
				"surname"				: "",
				"name"					: "",
				"gender"				: "",
				"phone" 				: "",
				"email" 				: "",
				"company"				: "",
				"vat_no"				: "",
				"memo"					: "",
				"city"					: "",
				"post_code"				: "",
				"address" 				: "",
				"bill_to" 				: "",
				"ship_to" 				: "",
				"latitute" 				: "",
				"longtitute" 			: "",
				"credit_limit"			: 0,
				"locale" 				: banhji.locale,
				"invoice_note" 			: "",
				"payment_term_id"		: 0,
				"payment_method_id"		: 0,
				"registered_date" 		: new Date(),
				"account_id"			: 0,
				"ra_id"					: 0,
				"tax_item_id"			: 0,
				"deposit_account_id"	: 0,
				"trade_discount_id"		: 0,
				"settlement_discount_id": 0,
				"is_pattern" 			: 0,
				"status"				: 1
			});

			var obj = this.dataSource.at(0);
			this.set("obj", obj);
			this.typeChanges();
		},
	    objSync 				: function(){
	    	var dfd = $.Deferred();

	    	this.dataSource.sync();
		    this.dataSource.bind("requestEnd", function(e){
		    	if(e.response){
					dfd.resolve(e.response.results);
				}
		    });
		    this.dataSource.bind("error", function(e){
				dfd.reject(e.errorThrown);
		    });

		    return dfd;
	    },
		save 					: function(){
			var self = this, obj = this.get("obj");

			//Edit Mode
	    	if(this.get("isEdit")){
	    		//Contact Person has changes
		    	if(this.contactPersonDS.hasChanges()){
		    		obj.set("dirty", true);
		    	}
	    	}

			//Save Obj
			this.objSync()
			.then(function(data){ //Success
				if(self.get("isEdit")==false){
					//Contact Person
					$.each(self.contactPersonDS.data(), function(index, value) {
						value.set("contact_id", data[0].id);
					});

					self.addAssignee(data[0].id);
				}
				self.contactPersonDS.sync();
				
				return data;
			}, function(reason) { //Error
				$("#ntf1").data("kendoNotification").error(reason);
			}).then(function(result){
				$("#ntf1").data("kendoNotification").success(banhji.source.successMessage);

				if(self.get("saveClose")){
					//Save Close
					self.set("saveClose", false);
					self.cancel();
					window.history.back();
				}else{
					//Save New
					self.addEmpty();
				}
			});
		},
		cancel 					: function(){
			this.dataSource.cancelChanges();
			this.contactPersonDS.cancelChanges();
			this.dataSource.data([]);
			this.contactPersonDS.data([]);
			this.set("contact_type_id", 0);

			banhji.userManagement.removeMultiTask("customer");
		},
		delete 					: function(){
			var obj = this.get("obj");
			this.set("showConfirm",false);

			if(!obj.is_system==1){
				if(this.get("isProtected")){
					alert("Sorry, this data is protected!");
				}else{
					obj.set("deleted", 1);
			        this.dataSource.sync();
			        banhji.source.customerDS.fetch();

			        window.history.back();
				}
			}	
		},
		openConfirm 			: function(){
			this.set("showConfirm", true);
		},
		closeConfirm 			: function(){
			this.set("showConfirm", false);
		},
		//Assignee
		addAssignee 			: function(id){
			var self = this, 
				employee = banhji.source.get("employee");

			this.contactAssigneeDS.add({
				"assignee_id" 	: employee.id,
				"contact_id" 	: id
			});

			this.contactAssigneeDS.sync();
			this.contactAssigneeDS.bind("requestEnd", function(e){
				if(e.type=="create"){
					self.contactAssigneeDS.data([]);
				}
			});
		},
		//Pattern
		typeChanges 			: function(){
			var obj = this.get("obj");

			if(obj.contact_type_id && obj.isNew()){
				this.applyPattern();
				this.generateNumber();
			}
		},
		applyPattern 			: function(){
			var self = this, obj = self.get("obj");

			this.patternDS.query({
				filter: [
					{ field:"contact_type_id", value: obj.contact_type_id },
					{ field:"is_pattern", value: 1 }
				],
				page: 1,
				pageSize: 1
			}).then(function(data){
				var view = self.patternDS.view(),
				type = self.contactTypeDS.get(view[0].contact_type_id);
				if(view.length>0){
					obj.set("country_id", view[0].country_id);
					obj.set("abbr", type.abbr);
					obj.set("gender", view[0].gender);
					obj.set("company", view[0].company);
					obj.set("vat_no", view[0].vat_no);
					obj.set("memo", view[0].memo);
					obj.set("city", view[0].city);
					obj.set("post_code", view[0].post_code);
					obj.set("address", view[0].address);
					obj.set("bill_to", view[0].bill_to);
					obj.set("ship_to", view[0].ship_to);
					obj.set("invoice_note", view[0].invoice_note);
					obj.set("payment_term_id", view[0].payment_term_id);
					obj.set("payment_method_id", view[0].payment_method_id);
					obj.set("credit_limit", view[0].credit_limit);
					obj.set("locale", view[0].locale);
					obj.set("account_id", view[0].account_id);
					obj.set("ra_id", view[0].ra_id);
					obj.set("tax_item_id", view[0].tax_item_id);
					obj.set("deposit_account_id", view[0].deposit_account_id);
					obj.set("trade_discount_id", view[0].trade_discount_id);
					obj.set("settlement_discount_id", view[0].settlement_discount_id);
				}
			});
		}
	});
	// SALE FUNCTIONS
	banhji.quote =  kendo.observable({
		lang 				: langVM,
		dataSource 			: dataStore(apiUrl + "transactions"),
		lineDS  			: dataStore(apiUrl + "item_lines"),
		assemblyLineDS  	: dataStore(apiUrl + "item_lines"),
		recurringDS 		: dataStore(apiUrl + "transactions"),
		recurringLineDS 	: dataStore(apiUrl + "item_lines"),
		txnDS 				: dataStore(apiUrl + "transactions"),
		balanceDS 			: dataStore(apiUrl + "transactions/balance"),
		attachmentDS	 	: dataStore(apiUrl + "attachments"),
		assemblyDS			: dataStore(apiUrl + "item_prices"),
		wacDS				: dataStore(apiUrl + "items/weighted_average_costing"),
		jobDS 				: new kendo.data.DataSource({
		  	data: banhji.source.jobList,
		  	sort: { field: "name", dir: "asc" }
		}),
		segmentItemDS 		: new kendo.data.DataSource({
		  	data: banhji.source.segmentItemList,
		  	sort: [
			  	{ field: "segment_id", dir: "asc" },
			  	{ field: "code", dir: "asc" }
			]
		}),
		txnTemplateDS 		: new kendo.data.DataSource({
		  	data: banhji.source.txnTemplateList,
		  	filter:{ field: "type", value: "Quote" }
		}),
		contactDS			: banhji.source.customerDS,
		paymentTermDS 		: banhji.source.paymentTermDS,
		statusObj 			: banhji.source.statusObj,		
		amtDueColor 		: banhji.source.amtDueColor,
	    confirmMessage 		: banhji.source.confirmMessage,
		frequencyList 		: banhji.source.frequencyList,
		monthOptionList 	: banhji.source.monthOptionList,
		monthList 			: banhji.source.monthList,
		weekDayList 		: banhji.source.weekDayList,
		dayList 			: banhji.source.dayList,
		showMonthOption 	: false,
		showMonth 			: false,
		showWeek 			: false,
		showDay 			: false,
		obj 				: null,
		isEdit 				: false,
		saveDraft 			: false,
		saveClose 			: false,
		savePrint 			: false,
		saveRecurring 		: false,
		showConfirm 		: false,
		notDuplicateNumber 	: true,
		recurring 			: "",
		recurring_validate 	: false,
		balance 			: 0,
		total 				: 0,
		user_id				: banhji.source.user_id,
		pageLoad 			: function(id){
			if(id){
				this.set("isEdit", true);
				this.loadObj(id);
			}else{
				if(this.get("isEdit") || this.dataSource.total()==0){
					this.addEmpty();
				}
			}
		},
		//Upload
		onSelect 			: function(e){
	        // Array with information about the uploaded files
	        var self = this, 
	        files = e.files,
	        obj = this.get("obj");
			
	        // Check the extension of each file and abort the upload if it is not .jpg
	        $.each(files, function(index, value){
	            if (value.extension.toLowerCase() === ".jpg"
	            	|| value.extension.toLowerCase() === ".jpeg"
	            	|| value.extension.toLowerCase() === ".tiff"
	            	|| value.extension.toLowerCase() === ".png" 
	            	|| value.extension.toLowerCase() === ".gif"
	            	|| value.extension.toLowerCase() === ".pdf"){

	            	var key = 'ATTACH_' + banhji.institute.id + "_" + Math.floor(Math.random() * 100000000000000001) +'_'+ value.name;

	            	self.attachmentDS.add({
	            		user_id 		: self.get("user_id"),
	            		transaction_id 	: obj.id,
	            		type 			: "Transaction",
	            		name 			: value.name,
	            		description 	: "",
	            		key 			: key,
	            		url 			: banhji.s3 + key,
	            		size 			: value.size,
	            		created_at 		: new Date(),

	            		file 			: value.rawFile
	            	});
	            }else{
	            	alert("This type of file is not allowed to attach.");
	            }
	        });
	    },
	    removeFile 			: function(e){
	    	var data = e.data;

	    	if (confirm(banhji.source.confirmMessage)) {
	    		this.attachmentDS.remove(data);
	    	}
	    },
	    uploadFile 			: function(){
	    	$.each(this.attachmentDS.data(), function(index, value){
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

            this.attachmentDS.sync();
            var saved = false;
            this.attachmentDS.bind("requestEnd", function(e){
            	//Delete File
            	if(e.type=="destroy"){
	            	if(saved==false && e.response){
	            		saved = true;
	            	
	            		var response = e.response.results;
	            		$.each(response, function(index, value){
		            		var params = {
							  	//Bucket: 'STRING_VALUE', /* required */
							 	Delete: { /* required */
								    Objects: [ /* required */
								      	{
									        Key: value.data.key /* required */
								      	}
								      /* more items */
								    ]
							  	}
							};
							bucket.deleteObjects(params, function(err, data) {
							  	//console.log(err, data);
							});
						});
	            	}
            	}
            });
	    },   
		//Contact
		setContact      	: function(contact){
			var obj = this.get("obj");
			
			obj.set("contact", contact);
			this.contactChanges();
		},
		contactChanges 		: function(){
			var self = this, obj = this.get("obj");

	    	if(obj.contact){
		    	var contact = obj.contact;

		    	obj.set("contact_id", contact.id);
		    	obj.set("payment_term_id", contact.payment_term_id);
		    	obj.set("locale", contact.locale);
		    	obj.set("bill_to", contact.bill_to);
		    	obj.set("ship_to", contact.ship_to);

		    	this.setRate();
		    	this.setTerm();
		    	this.loadBalance();
		    	this.jobDS.filter({ field:"contact_id", value: contact.id });
	    	}
	    	
		    this.changes();
	    },
	    loadBalance 		: function(){
			var self = this, obj = this.get("obj");

			this.balanceDS.query({
				filter:[
					{ field:"contact_id", value:obj.contact_id },
					{ field:"type", operator:"where_in", value:["Commercial_Invoice", "Vat_Invoice", "Invoice"] }
				]
		    }).then(function(){
		    	var view = self.balanceDS.view(),
		  			contact = obj.contact, 
					balance = view[0].amount,
					creditAllowed = 0;

		    	if(contact.credit_limit > balance){
					creditAllowed = contact.credit_limit - balance;
				}

		    	self.set("balance", kendo.toString(balance, "c", obj.locale));
		    	obj.set("credit_allowed", creditAllowed);
			});
		},
	    //Currency Rate
		setRate 			: function(){
			var obj = this.get("obj"), 
			rate = banhji.source.getRate(obj.locale, new Date(obj.issued_date));
			
			obj.set("rate", rate);

			//Item Lines
			$.each(this.lineDS.data(), function(index, value){
				var itemRate = rate / banhji.source.getRate(value.locale, new Date(obj.issued_date));
				value.set("rate", itemRate);
			});

			//Assembly Lines
			$.each(this.assemblyLineDS.data(), function(index, value){
				var itemRate = rate / banhji.source.getRate(value.locale, new Date(obj.issued_date));
				value.set("rate", itemRate);
			});
		},
		//Payment Term
		setTerm 			: function(){
			var duedate = new Date(), obj = this.get("obj");

			if(obj.payment_term_id>0){
				var term = this.paymentTermDS.get(obj.payment_term_id);

				duedate.setDate(duedate.getDate() + term.net_due);

				obj.set("due_date", duedate);
			}else{
				obj.set("due_date", new Date());
			}
		},
		//Segment
	    segmentChanges 		: function(e) {
			var dataArr = this.get("obj").segments,
			lastIndex = dataArr.length - 1,
			last = this.segmentItemDS.get(dataArr[lastIndex]);
			
			if(dataArr.length > 1) {
				for(var i = 0; i < dataArr.length - 1; i++) {
					var current_index = dataArr[i],
					current = this.segmentItemDS.get(current_index);

					if(current.segment_id === last.segment_id) {
						dataArr.splice(lastIndex, 1);
						break;
					}
				}
			}
		},
		//Item
		addItem 			: function(uid){
			var self = this,
				row = this.lineDS.getByUid(uid),
				obj = this.get("obj"),
				item = row.item,
				rate = obj.rate / banhji.source.getRate(item.locale, new Date(obj.issued_date));

			row.set("item_id", item.id);
			row.set("description", item.sale_description);
			// row.set("cost", item.cost * rate);
			row.set("rate", rate);
			row.set("locale", item.locale);

			//Get cost
			this.wacDS.query({
				filter:[
					{ field:"item_id", value: item.id },
					{ field:"issued_date <=", operator:"where_related_transaction", value: kendo.toString(new Date(obj.issued_date),"yyyy-MM-dd HH:mm:ss") }
				]
			}).then(function(){
	        	var wac = self.wacDS.view();
	        	row.set("cost", wac[0].cost * rate);
			});

			//Get first price
			this.assemblyDS.query({
	        	filter:[
	        		{ field:"item_id", value:item.id },
	        		{ field:"assembly_id", value:0 }
	        	],
	        	page: 1,
	        	pageSize: 1
	        }).then(function(){
	        	var view = self.assemblyDS.view();

	        	if(view.length>0){
	        		var measurement = { 
	        			measurement_id 	: view[0].measurement_id,
	        			price 			: kendo.parseFloat(view[0].price),
	        			conversion_ratio: view[0].conversion_ratio, 
	        			measurement 	: view[0].measurement 
	        		};
	        		row.set("measurement", measurement);
	        	}
	        });
		},
		addItemCatalog 		: function(uid){
			var self = this,
				row = this.lineDS.getByUid(uid),
				obj = this.get("obj"),
				item = row.item;

			this.lineDS.remove(row);

        	$.each(item.catalogs, function(index, value){
				var catalogItem = banhji.source.itemDS.get(value);

				if(catalogItem){
					var rate = obj.rate / banhji.source.getRate(catalogItem.locale, new Date(obj.issued_date));

					self.lineDS.add({
						transaction_id 		: obj.id,
						tax_item_id 		: 0,
						item_id 			: catalogItem.id,
						measurement_id 		: 0,
						description 		: catalogItem.sale_description,
						quantity 	 		: 1,
						conversion_ratio 	: 1,
						cost 				: catalogItem.cost * rate,
						price 				: 0,
						amount 				: 0,
						discount 			: 0,
						rate				: rate,
						locale				: catalogItem.locale,
						movement 			: 0,

						discount_percentage : 0,
						item 				: catalogItem,
						measurement 		: { measurement_id:"", measurement:"" },
						tax_item 			: { id:"", name:"" }
					});
				}
			});
		},
		addItemAssembly 	: function(uid){
			var self = this,
				row = this.lineDS.getByUid(uid),
				obj = this.get("obj"),
				item = row.item,
				rate = obj.rate / banhji.source.getRate(item.locale, new Date(obj.issued_date));

			var notExist = true;
			$.each(this.assemblyLineDS.data(), function(index, value){
				if(value.assembly_id==item.id){
					notExist = false;

					return false;
				}
			});

			if(notExist){
				row.set("item_id", item.id);
	        	row.set("measurement_id", item.measurement_id);
	    		row.set("description", item.sale_description);
	    		row.set("conversion_ratio", 1);
		        row.set("cost", item.cost * rate);
		        row.set("price", item.price * rate);
		        row.set("rate", rate);
		        row.set("locale", item.locale);

		        this.assemblyDS.query({
		        	filter:{ field:"assembly_id", value:row.item_id }
		        }).then(function(){
		        	var view = self.assemblyDS.view();

		        	$.each(view, function(index, value){
		        		var itemAssembly = banhji.source.itemDS.get(value.item_id),
		        			itemAssemblyRate = obj.rate / banhji.source.getRate(itemAssembly.locale, new Date(obj.issued_date));

						self.assemblyLineDS.add({
							transaction_id 		: obj.id,
							item_id 			: value.item_id,
							assembly_id 		: value.assembly_id,
							measurement_id 		: value.measurement_id,
							description 		: itemAssembly.sale_description,
							quantity 	 		: value.quantity,
							conversion_ratio 	: value.conversion_ratio,
							cost 				: itemAssembly.cost * rate,
							price 				: value.price * itemAssemblyRate,
							amount 				: value.price * itemAssemblyRate,
							rate				: itemAssemblyRate,
							locale				: value.locale,
							movement 			: 0,

							item 				: itemAssembly
						});
			        });
		        });
	    	}else{
	    		alert("Duplicate Item Assembly!");
	    		row.set("item_id", 0);
	    		row.set("item", { id:"", name:"" });
	    	}
		},
		changes				: function(){
			var self = this, obj = this.get("obj"),
				total = 0, subTotal = 0, discount =0, tax = 0, remaining = 0, amount_due = 0, itemIds = [];

			$.each(this.lineDS.data(), function(index, value) {
				var amt = value.quantity * value.price;
				subTotal += amt;

				//Discount by line
				if(value.discount>0){
					amt -= value.discount;
					discount += value.discount;
				}

				//Tax by line
				if(value.tax_item_id>0){
					var taxAmount = amt * value.tax_item.rate;
					tax += taxAmount;
					value.set("tax", taxAmount);
				}else{
					value.set("tax", 0);
				}

				value.set("amount", amt);

				if(value.item_id>0){
					itemIds.push(value.item_id);
				}
	        });

	    	//Total
	        total = (subTotal + tax) - discount;

	        //Warning over credit allowed
	        if(obj.credit_allowed>0 && total>obj.credit_allowed){
	        	this.set("amtDueColor", "Gold");
	        }else{
	        	this.set("amtDueColor", banhji.source.amtDueColor);
	        }

	        obj.set("sub_total", subTotal);
	        obj.set("discount", discount);
	        obj.set("tax", tax);
			obj.set("amount", total);

			this.set("total", kendo.toString(total, "c", obj.locale));
	    	
	    	//Remove Assembly Item List
			var raw = this.assemblyLineDS.data();
		    var item, i;
		    for(i=raw.length-1; i>=0; i--){
		    	item = raw[i];

		    	if (jQuery.inArray(kendo.parseInt(item.assembly_id), itemIds)==-1) {
			       	this.assemblyLineDS.remove(item);
			    }
		    }
		},
		lineDSChanges 		: function(arg){
			var self = banhji.quote;

			if(arg.field){
				if(arg.field=="item"){
					var dataRow = arg.items[0],
						item = dataRow.item;

					if(item.is_catalog=="1"){
						self.addItemCatalog(dataRow.uid);
					}else if(item.is_assembly=="1"){
						self.addItemAssembly(dataRow.uid);
					}else{
						self.addItem(dataRow.uid);
					}

					self.addExtraRow(dataRow.uid);
				}else if(arg.field=="quantity" || arg.field=="price" || arg.field=="discount"){
					self.changes();
				}else if(arg.field=="measurement"){
					var dataRow = arg.items[0];
					
					dataRow.set("measurement_id", dataRow.measurement.measurement_id);
			        dataRow.set("price", dataRow.measurement.price * dataRow.rate);
			        dataRow.set("conversion_ratio", dataRow.measurement.conversion_ratio);
			    }else if(arg.field=="discount_percentage"){
			    	var dataRow = arg.items[0],
			    		percentageAmount = dataRow.quantity * dataRow.price * dataRow.discount_percentage;

			    	dataRow.set("discount", percentageAmount);
				}else if(arg.field=="tax_item"){
					var dataRow = arg.items[0];
					
					dataRow.set("tax_item_id", dataRow.tax_item.id);
					dataRow.set("tax", 0);

					self.changes();
				}
			}
		},
		//Number      	
		checkExistingNumber 	: function(){
			var self = this, para = [], 
			obj = this.get("obj");
			
			if(obj.number!==""){

				if(obj.isNew()==false){
					para.push({ field:"id", operator:"where_not_in", value: [obj.id] });
				}
				
				para.push({ field:"number", value: obj.number });
				para.push({ field:"type", value: obj.type });

				this.txnDS.query({
					filter: para,
					page: 1,
					pageSize: 1
				}).then(function(e){
					var view = self.txnDS.view();
					
					if(view.length>0){
				 		self.set("notDuplicateNumber", false);
					}else{
						self.set("notDuplicateNumber", true);
					}
				});
			}
		},
		generateNumber 			: function(){
			var self = this, obj = this.get("obj"),
			issueDate = new Date(obj.issued_date),
			startDate = new Date(obj.issued_date),
			endDate = new Date(obj.issued_date);

			this.set("notDuplicateNumber", true);

			startDate.setDate(1);
			startDate.setMonth(0);//Set to January
			endDate.setDate(31);
			endDate.setMonth(11);//Set to November

			this.txnDS.query({
				filter:[
					{ field:"type", value:obj.type },
					{ field:"issued_date >=", value:kendo.toString(startDate, "yyyy-MM-dd") },
					{ field:"issued_date <=", value:kendo.toString(endDate, "yyyy-MM-dd") }
				],
				sort: { field:"number", dir:"desc" },
				page:1,
				pageSize:1
			}).then(function(){
				var view = self.txnDS.view(),
				number = 0, str = "";

				if(view.length>0){
					str = view[0].number;
					str = str.substring(str.length-4, str.length);
					number = kendo.parseInt(str);
				}
				
				number++;
				str = banhji.source.getPrefixAbbr(obj.type) + kendo.toString(issueDate, "yy") + kendo.toString(issueDate, "MM") + kendo.toString(number, "00000");
				
				obj.set("number", str);
			});
		},
		setStatus 			: function(){
			var self = this,
				obj = this.get("obj"), 
				statusObj = this.get("statusObj");

			statusObj.set("text", "");
	        statusObj.set("date", "");
	        statusObj.set("number", "");
	        statusObj.set("url", "");

			switch(obj.status) {
				case 1:
			    	statusObj.set("text", "used");

			    	this.txnDS.query({
			    		filter:{ field:"reference_id", value: obj.id },
			    		sort: { field:"issued_date", dir:"desc" },
			    		page:1,
			    		pageSize:1
			    	}).then(function(){
			    		var view = self.txnDS.view();

			    		if(view.length>0){
			    			statusObj.set("date", kendo.toString(new Date(view[0].issued_date), "dd-MM-yyyy h:mm:ss tt"));
			    			statusObj.set("number", view[0].number);

			    			var url = "#/" + view[0].type.toLowerCase() + "/" + view[0].id;
			    			statusObj.set("url", url);
			    		}
			    	});
			        break;
			    case 3:
			        statusObj.set("text", "return");
			        break;
			    case 4:
			        statusObj.set("text", "draft");
			        break;
			    default:
			        //Default here
			}
		},
		//Obj
		loadObj 			: function(id){
			var self = this, para = [];

			para.push({ field:"id", value: id });

			if(this.get("recurring")=="use"){
				this.set("recurring","");
				this.addEmpty();
				this.loadRecurring(id);
			}else{
				if(this.get("recurring")=="edit"){
					this.set("recurring","");
					para.push({ field:"is_recurring", value: 1 });
				}

				this.dataSource.query({
					filter: para,
					page: 1,
					pageSize: 1
				}).then(function(e){
					var view = self.dataSource.view();

					self.set("obj", view[0]);
					self.set("total", kendo.toString(view[0].amount, "c2", view[0].locale));
					self.setStatus();

					self.lineDS.query({
						filter: [
							{ field: "transaction_id", value: id },
							{ field: "assembly_id", value: 0 }
						],
					});

					self.assemblyLineDS.filter([
						{ field: "transaction_id", value: id },
						{ field: "assembly_id >", value: 0 }
					]);

					self.attachmentDS.filter({ field: "transaction_id", value: id });
				});
			}
		},
		addEmpty 		 	: function(){
			this.dataSource.data([]);
			this.lineDS.data([]);
			this.assemblyLineDS.data([]);
			this.attachmentDS.data([]);
			
			this.set("isEdit", false);
			this.set("obj", null);
			this.set("total", 0);
			this.set("amtDueColor", banhji.source.amtDueColor);

			//Set Date
			var duedate = new Date();
			duedate.setDate(duedate.getDate() + 30);

			this.dataSource.insert(0, {
				contact_id 			: "",
				transaction_template_id : 1,
				payment_term_id 	: 0,
				reference_id 		: "",
				recurring_id 		: "",
				job_id 				: 0,
				user_id 			: this.get("user_id"),
				employee_id			: banhji.source.get("employee").id,
			   	type				: "Quote",//Required
			   	number 				: "",
			   	sub_total 			: 0,
			   	amount				: 0,
			   	credit_allowed 		: 0,
			   	discount 			: 0,
			   	tax 				: 0,
			   	rate				: 1,
			   	locale 				: banhji.locale,
			   	issued_date 		: new Date(),
			   	due_date 			: duedate,
			   	bill_to 			: "",
			   	ship_to 			: "",
			   	memo 				: "",
			   	memo2 				: "",
			   	status 				: 0,
			   	segments 			: [],
			   	//Recurring
			   	recurring_name 		: "",
			   	start_date 			: new Date(),
			   	frequency 			: "Daily",
			   	month_option 		: "Day",
			   	interval 			: 1,
			   	day 				: 1,
			   	week 				: 0,
			   	month 				: 0,
			   	is_recurring 		: 0,

			   	contact 			: { id:"", name:"" }
	    	});
			
			var obj = this.dataSource.at(0);
			this.set("obj", obj);
			this.setRate();
			this.generateNumber();

			//Default rows
			for (var i = 0; i < banhji.source.defaultLines; i++) {
				this.addRow();
			}
		},
		addRow 				: function(){
			var obj = this.get("obj");

			this.lineDS.add({
				transaction_id 		: obj.id,
				tax_item_id 		: "",
				item_id 			: "",
				assembly_id 		: 0,
				measurement_id 		: 0,
				description 		: "",
				quantity 	 		: 1,
				conversion_ratio 	: 0,
				cost 				: 0,
				price 				: 0,
				amount 				: 0,
				discount 			: 0,
				rate				: obj.rate,
				locale				: obj.locale,
				movement 			: 0,

				discount_percentage : 0,
				item 				: { id:"", name:"" },
				measurement 		: { measurement_id:"", measurement:"" },
				tax_item 			: { id:"", name:"" }
			});
		},
		addExtraRow 		: function(uid){
			var row = this.lineDS.getByUid(uid),
				index = this.lineDS.indexOf(row);

			if(index==this.lineDS.total()-1){
				this.addRow();
			}
		},
		removeEmptyRow 		: function(){
			var raw = this.lineDS.data();
		    var item, i;
		    for(i=raw.length-1; i>=0; i--){
		    	item = raw[i];

		    	if (item.item_id==0) {
			       	this.lineDS.remove(item);
			    }
		    }
	    },
		removeRow 			: function(e){
			var data = e.data;
			if(this.lineDS.total()>1){
				this.lineDS.remove(data);
		        this.changes();
	        }
		},
	    objSync 			: function(){
	    	var dfd = $.Deferred();

	    	this.dataSource.sync();
		    this.dataSource.bind("requestEnd", function(e){
		    	if(e.response){
					dfd.resolve(e.response.results);
				}
		    });
		    this.dataSource.bind("error", function(e){
				dfd.reject(e.errorThrown);
		    });

		    return dfd;
	    },
		save 				: function(){
	    	var self = this, obj = this.get("obj");

	    	obj.set("issued_date", kendo.toString(new Date(obj.issued_date), "s"));
	    	obj.set("due_date", kendo.toString(new Date(obj.due_date), "yyyy-MM-dd"));

	    	//Warning over credit allowed
	        if(obj.credit_limit>0 && obj.amount>obj.credit_allowed){
	        	alert("Over credit allowed!");
	        }

	        this.removeEmptyRow();

	        //Save Draft
	        if(this.get("saveDraft")){
	        	obj.set("status", 4); //In progress
	        	obj.set("progress", "Draft");
	        	obj.set("is_journal", 0);//No Journal
	        }

	        //Recurring
	    	if(this.get("saveRecurring")){
	    		this.set("saveRecurring", false);
	    		
	    		obj.set("number", "");
	    		obj.set("is_recurring", 1);
	    	}

	        //Edit Mode
	    	if(obj.isNew()==false){
	    		//Use draft
	    		if(obj.status==4){
	    			obj.set("status", 0);//Open
	    			obj.set("progress", "");
	    			obj.set("is_journal", 1);//Add Journal
	    		}
	    	}	
	    	
			//Save Obj
			this.objSync()
			.then(function(data){ //Success
				if(self.get("isEdit")==false){
					//Item line
					$.each(self.lineDS.data(), function(index, value){
						value.set("transaction_id", data[0].id);
					});

					//Assembly Item line
					$.each(self.assemblyLineDS.data(), function(index, value){
						value.set("transaction_id", data[0].id);
					});

					//Attachment
					$.each(self.attachmentDS.data(), function(index, value){
			    		value.set("transaction_id", data[0].id);
		            });
				}	

				self.lineDS.sync();
				self.assemblyLineDS.sync();
				self.uploadFile();

				return data;
			}, function(reason) { //Error
				$("#ntf1").data("kendoNotification").error(reason);
			}).then(function(result){
				$("#ntf1").data("kendoNotification").success(banhji.source.successMessage);

				if(self.get("saveDraft") || self.get("saveClose")){
					//Save Draft or Save Close
					self.set("saveDraft", false);
					self.set("saveClose", false);
					self.cancel();
				}else if(self.get("savePrint")){
					//Save Print
					self.set("savePrint", false);
					self.clear();
					if(result[0].transaction_template_id>0){
						banhji.router.navigate("/invoice_form/"+result[0].id);
					}
				}else{
					//Save New
					self.addEmpty();
				}
			});
		},
		clear 				: function(){
			this.dataSource.cancelChanges();
			this.lineDS.cancelChanges();
			this.assemblyLineDS.cancelChanges();
			this.attachmentDS.cancelChanges();
			
			this.dataSource.data([]);
			this.lineDS.data([]);
			this.assemblyLineDS.data([]);
			this.attachmentDS.data([]);

			banhji.userManagement.removeMultiTask("quote");
		},
		cancel 				: function(){
			this.clear();
			window.history.back();
		},
		delete 				: function(){
			var self = this, obj = this.get("obj");
			this.set("showConfirm",false);

			this.txnDS.query({
	        	filter:[
	        		{ field:"reference_id", value:obj.id },
	        	],
	        	page:1,
	        	pageSize:1
	        }).then(function(){
	        	var view = self.txnDS.view();

	        	if(view.length>0){
	        		alert("Sorry, you can not delete it.");
	        	}else{
	        		obj.set("deleted", 1);

			        self.dataSource.sync();
			        self.dataSource.bind("requestEnd", function(e){
			        	if(e.type==="update"){
			        		window.history.back();
			        	}
			        });
	        	}
	        });
		},
		openConfirm 		: function(){
			this.set("showConfirm", true);
		},
		closeConfirm 		: function(){
			this.set("showConfirm", false);
		},
		validating 			: function(){
			var result = true, nonItem = true;

			//Check select non item
			$.each(this.lineDS.data(), function(index, value){
				if(value.item_id>0){
					nonItem = false;
				}
			});

			if(nonItem){
				$("#ntf1").data("kendoNotification").error("Please select at least one item!");

				result = false;
			}

			return result;
		},
		//Recurring
		loadRecurring 		: function(id){
			var self = this;

			this.recurringDS.query({
				filter:[
					{ field:"id", value:id },
					{ field:"is_recurring", value:1 }
				],
				page: 1,
				pageSize: 100
			}).then(function(){
				var view = self.recurringDS.view(),
				obj = self.get("obj");
				
				obj.set("contact", view[0].contact);
				obj.set("contact_id", view[0].contact.id);
				obj.set("recurring_id", id);
				obj.set("payment_term_id", view[0].payment_term_id);
				obj.set("employee_id", view[0].employee_id);//Sale Rep
				obj.set("job_id", view[0].job_id);
				obj.set("segments", view[0].segments);
				obj.set("locale", view[0].locale);
				obj.set("memo", view[0].memo);
				obj.set("memo2", view[0].memo2);
				obj.set("bill_to", view[0].bill_to);
				obj.set("ship_to", view[0].ship_to);

				// self.setContact(view[0].contact);
			});

			this.recurringLineDS.query({
				filter:[
					{ field: "transaction_id", value: id },
					{ field: "assembly_id", value: 0 }
				]
			}).then(function(){
				var view = self.recurringLineDS.view();
				self.lineDS.data([]);

				$.each(view, function(index, value){
					self.lineDS.add({
						transaction_id 		: 0,
						tax_item_id 		: value.tax_item_id,
						item_id 			: value.item_id,
						measurement_id 		: value.measurement_id,
						description 		: value.description,
						quantity 	 		: value.quantity,
						cost 				: value.cost,
						price 				: value.price,
						amount 				: value.amount,
						discount 			: value.discount,
						rate				: value.rate,
						locale				: value.locale,
						movement 			: 0,

						item 				: value.item,
						measurement 		: value.measurement,
						tax_item 			: value.tax_item
					});
				});

				self.changes();
			});
		},
		frequencyChanges 	: function(){
			var obj = this.get("obj");

			switch(obj.frequency) {
			    case "Daily":
			        this.set("showMonthOption", false);
			        this.set("showMonth", false);
			        this.set("showWeek", false);
			        this.set("showDay", false);
			       
			        break;
			    case "Weekly":
			        this.set("showMonthOption", false);
			        this.set("showMonth", false);
			        this.set("showWeek", true);
			        this.set("showDay", false);

			        break;
			    case "Monthly":
			        this.set("showMonthOption", true);
			        this.set("showMonth", false);
			        this.set("showWeek", false);
			        this.set("showDay", true);

			        break;
			    case "Annually":
			        this.set("showMonthOption", false);
			        this.set("showMonth", true);
			        this.set("showWeek", false);
			        this.set("showDay", true);

			        break;
			    default:
			        //Default here..
			}
		},
		monthOptionChanges 	: function(){
			var obj = this.get("obj");

			switch(obj.month_option) {
			    case "Day":
			        this.set("showWeek", false);
			        this.set("showDay", true);
			       
			        break;
			    default:
			        this.set("showWeek", true);
			        this.set("showDay", false);
			}
		},
		recurringSync 		: function(){
	    	var dfd = $.Deferred();

	    	this.recurringDS.sync();
		    this.recurringDS.bind("requestEnd", function(e){
		    	if(e.response){
					dfd.resolve(e.response.results);
				}
		    });
		    this.recurringDS.bind("error", function(e){
				dfd.reject(e.errorThrown);
		    });

		    return dfd;
	    }
	});
	banhji.saleOrder =  kendo.observable({
		lang 				: langVM,
		dataSource 			: dataStore(apiUrl + "transactions"),
		poDS 				: dataStore(apiUrl + "transactions/with_line"),
		txnDS 				: dataStore(apiUrl + "transactions"),
		lineDS  			: dataStore(apiUrl + "item_lines"),
		assemblyLineDS  	: dataStore(apiUrl + "item_lines"),
		recurringDS 		: dataStore(apiUrl + "transactions"),
		recurringLineDS 	: dataStore(apiUrl + "item_lines"),
		referenceDS			: dataStore(apiUrl + "transactions"),
		referenceLineDS		: dataStore(apiUrl + "item_lines"),
		balanceDS 			: dataStore(apiUrl + "transactions/balance"),
		attachmentDS	 	: dataStore(apiUrl + "attachments"),
		assemblyDS			: dataStore(apiUrl + "item_prices"),
		txnTemplateDS 		: new kendo.data.DataSource({
		  	data: banhji.source.txnTemplateList,
		  	filter:{ field: "type", value: "Sale_Order" }
		}),
		jobDS 				: new kendo.data.DataSource({
		  	data: banhji.source.jobList,
		  	sort: { field: "name", dir: "asc" }
		}),
		segmentItemDS 		: new kendo.data.DataSource({
		  	data: banhji.source.segmentItemList,
		  	sort: [
			  	{ field: "segment_id", dir: "asc" },
			  	{ field: "code", dir: "asc" }
			]
		}),
		contactDS			: banhji.source.customerDS,
		statusObj 			: banhji.source.statusObj,
		amtDueColor 		: banhji.source.amtDueColor,
		confirmMessage 		: banhji.source.confirmMessage,
		frequencyList 		: banhji.source.frequencyList,
		monthOptionList 	: banhji.source.monthOptionList,
		monthList 			: banhji.source.monthList,
		weekDayList 		: banhji.source.weekDayList,
		dayList 			: banhji.source.dayList,
		showMonthOption 	: false,
		showMonth 			: false,
		showWeek 			: false,
		showDay 			: false,
		obj 				: null,
		isEdit 				: false,
		saveDraft 			: false,
		saveClose 			: false,
		savePrint 			: false,
		saveRecurring 		: false,
		showConfirm 		: false,
		notDuplicateNumber  : true,
		recurring 			: "",
		recurring_validate 	: false,
		enableRef 	 		: false,
		balance 			: 0,
		total 				: 0,
		user_id				: banhji.source.user_id,
		pageLoad 			: function(id){
			if(id){
				this.set("isEdit", true);
				this.loadObj(id);
			}else{				
				if(this.get("isEdit") || this.dataSource.total()==0){
					this.addEmpty();
				}								
			}
		},
		//Upload
		onSelect 			: function(e){
	        // Array with information about the uploaded files
	        var self = this, 
	        files = e.files,
	        obj = this.get("obj");
			
	        // Check the extension of each file and abort the upload if it is not .jpg
	        $.each(files, function(index, value){
	            if (value.extension.toLowerCase() === ".jpg"
	            	|| value.extension.toLowerCase() === ".jpeg"
	            	|| value.extension.toLowerCase() === ".tiff"
	            	|| value.extension.toLowerCase() === ".png" 
	            	|| value.extension.toLowerCase() === ".gif"
	            	|| value.extension.toLowerCase() === ".pdf"){

	            	var key = 'ATTACH_' + banhji.institute.id + "_" + Math.floor(Math.random() * 100000000000000001) +'_'+ value.name;

	            	self.attachmentDS.add({
	            		user_id 		: self.get("user_id"),
	            		transaction_id 	: obj.id,
	            		type 			: "Transaction",
	            		name 			: value.name,
	            		description 	: "",
	            		key 			: key,
	            		url 			: banhji.s3 + key,
	            		size 			: value.size,
	            		created_at 		: new Date(),

	            		file 			: value.rawFile
	            	});
	            }else{
	            	alert("This type of file is not allowed to attach.");
	            }
	        });
	    },
	    removeFile 			: function(e){
	    	var data = e.data;

	    	if (confirm(banhji.source.confirmMessage)) {
	    		this.attachmentDS.remove(data);
	    	}	    	
	    },
	    uploadFile 			: function(){
	    	$.each(this.attachmentDS.data(), function(index, value){	    		
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

	        this.attachmentDS.sync();
	        var saved = false;
	        this.attachmentDS.bind("requestEnd", function(e){
	        	//Delete File
	        	if(e.type=="destroy"){
	            	if(saved==false && e.response){
	            		saved = true;
	            	
	            		var response = e.response.results;
	            		$.each(response, function(index, value){            			
		            		var params = {
							  	//Bucket: 'STRING_VALUE', /* required */
							 	Delete: { /* required */
								    Objects: [ /* required */
								      	{
									        Key: value.data.key /* required */
								      	}
								      /* more items */
								    ]
							  	}
							};
							bucket.deleteObjects(params, function(err, data) {
							  	//console.log(err, data);
							});
						});
	            	}
	        	}
	        });
	    },
		//Contact
		setContact 			: function(contact){
			var obj = this.get("obj");

		    obj.set("contact", contact);
		    this.contactChanges();
	    },
		contactChanges 		: function(){
			var self = this, obj = this.get("obj");

	    	if(obj.contact){	    				    			    	
		    	var contact = obj.contact;
		    	
		    	obj.set("contact_id", contact.id);
		    	obj.set("locale", contact.locale);
		    	obj.set("bill_to", contact.bill_to);
		    	obj.set("ship_to", contact.ship_to);

		    	this.setRate();
		    	this.loadBalance();
		    	this.loadReference();
		    	this.jobDS.filter({ field:"contact_id", value: contact.id });
	    	}
	    	
		    this.changes();
	    },
	    loadBalance 		: function(){
			var self = this, obj = this.get("obj");

			this.balanceDS.query({
				filter:[
					{ field:"contact_id", value:obj.contact_id },
					{ field:"type", operator:"where_in", value:["Commercial_Invoice", "Vat_Invoice", "Invoice"] }
				]
		    }).then(function(){
		    	var view = self.balanceDS.view(),
		  			contact = obj.contact, 
					balance = view[0].amount,
					creditAllowed = 0;

		    	if(contact.credit_limit > balance){
					creditAllowed = contact.credit_limit - balance;
				}

		    	self.set("balance", kendo.toString(balance, "c", obj.locale));
		    	obj.set("credit_allowed", creditAllowed);
			});				
		},
	    //Currency Rate
		setRate 			: function(){
			var obj = this.get("obj"), 
			rate = banhji.source.getRate(obj.locale, new Date(obj.issued_date));
			
			obj.set("rate", rate);

			//Item Lines
			$.each(this.lineDS.data(), function(index, value){
				var itemRate = rate / banhji.source.getRate(value.locale, new Date(obj.issued_date));
				value.set("rate", itemRate);
			});

			//Assembly Lines
			$.each(this.assemblyLineDS.data(), function(index, value){
				var itemRate = rate / banhji.source.getRate(value.locale, new Date(obj.issued_date));
				value.set("rate", itemRate);
			});
		},
		//Segment
	    segmentChanges 		: function(e) {
			var dataArr = this.get("obj").segments,
			lastIndex = dataArr.length - 1,
			last = this.segmentItemDS.get(dataArr[lastIndex]);
			
			if(dataArr.length > 1) {
				for(var i = 0; i < dataArr.length - 1; i++) {
					var current_index = dataArr[i],
					current = this.segmentItemDS.get(current_index);

					if(current.segment_id === last.segment_id) {
						dataArr.splice(lastIndex, 1);
						break;
					}
				}
			}				
		},
		//Item
		addItem 			: function(uid){
			var self = this,
				row = this.lineDS.getByUid(uid),
				obj = this.get("obj"),
				item = row.item,
				rate = obj.rate / banhji.source.getRate(item.locale, new Date(obj.issued_date));

			row.set("item_id", item.id);			
			row.set("description", item.sale_description);
			row.set("cost", item.cost * rate);
			row.set("rate", rate);
			row.set("locale", item.locale);

			//Get first price
			this.assemblyDS.query({
	        	filter:[
	        		{ field:"item_id", value:item.id },
	        		{ field:"assembly_id", value:0 }
	        	],
	        	page: 1,
	        	pageSize: 1
	        }).then(function(){
	        	var view = self.assemblyDS.view();

	        	if(view.length>0){
	        		var measurement = { 
	        			measurement_id 	: view[0].measurement_id,
	        			price 			: kendo.parseFloat(view[0].price),
	        			conversion_ratio: view[0].conversion_ratio, 
	        			measurement 	: view[0].measurement 
	        		};
	        		row.set("measurement", measurement);
	        	}
	        });
		},
		addItemCatalog 		: function(uid){
			var self = this,
				row = this.lineDS.getByUid(uid),
				obj = this.get("obj"),
				item = row.item;

			this.lineDS.remove(row);

        	$.each(item.catalogs, function(index, value){
				var catalogItem = banhji.source.itemDS.get(value);

				if(catalogItem){
					var rate = obj.rate / banhji.source.getRate(catalogItem.locale, new Date(obj.issued_date));

					self.lineDS.add({
						transaction_id 		: obj.id,
						tax_item_id 		: 0,
						item_id 			: catalogItem.id,
						measurement_id 		: 0,
						description 		: catalogItem.sale_description,
						quantity 	 		: 1,
						conversion_ratio 	: 1,
						cost 				: catalogItem.cost * rate,
						price 				: 0,
						amount 				: 0,
						discount 			: 0,
						rate				: rate,
						locale				: catalogItem.locale,
						movement 			: 0,

						discount_percentage : 0,
						item 				: catalogItem,
						measurement 		: { measurement_id:"", measurement:"" },
						tax_item 			: { id:"", name:"" }
					});
				}
			});
		},
		addItemAssembly 	: function(uid){
			var self = this,
				row = this.lineDS.getByUid(uid),
				obj = this.get("obj"),
				item = row.item,
				rate = obj.rate / banhji.source.getRate(item.locale, new Date(obj.issued_date));

			var notExist = true;
			$.each(this.assemblyLineDS.data(), function(index, value){
				if(value.assembly_id==item.id){
					notExist = false;

					return false;
				}
			});

			if(notExist){
				row.set("item_id", item.id);
	        	row.set("measurement_id", item.measurement_id);
	    		row.set("description", item.sale_description);
	    		row.set("conversion_ratio", 1);
		        row.set("cost", item.cost * rate);
		        row.set("price", item.price * rate);
		        row.set("rate", rate);
		        row.set("locale", item.locale);

		        this.assemblyDS.query({
		        	filter:{ field:"assembly_id", value:row.item_id }
		        }).then(function(){
		        	var view = self.assemblyDS.view();

		        	$.each(view, function(index, value){
		        		var itemAssembly = banhji.source.itemDS.get(value.item_id),
		        			itemAssemblyRate = obj.rate / banhji.source.getRate(itemAssembly.locale, new Date(obj.issued_date));

						self.assemblyLineDS.add({
							transaction_id 		: obj.id,
							item_id 			: value.item_id,
							assembly_id 		: value.assembly_id,
							measurement_id 		: value.measurement_id,
							description 		: itemAssembly.sale_description,
							quantity 	 		: value.quantity,
							conversion_ratio 	: value.conversion_ratio,
							cost 				: itemAssembly.cost * rate,
							price 				: value.price * itemAssemblyRate,
							amount 				: value.price * itemAssemblyRate,
							rate				: itemAssemblyRate,
							locale				: value.locale,
							movement 			: 0,

							item 				: itemAssembly
						});
			        });
		        });
	    	}else{
	    		alert("Duplicate Item Assembly!");
	    		row.set("item_id", 0);
	    		row.set("item", { id:"", name:"" });
	    	}
		},
		changes				: function(){
			var self = this, obj = this.get("obj"),
				total = 0, subTotal = 0, discount =0, tax = 0, remaining = 0, amount_due = 0, itemIds = [];

			$.each(this.lineDS.data(), function(index, value) {
				var amt = value.quantity * value.price;
				subTotal += amt;
				
				//Discount by line
				if(value.discount>0){
					amt -= value.discount;
					discount += value.discount;
				}

				//Tax by line
				if(value.tax_item_id>0){
					var taxAmount = amt * value.tax_item.rate;
					tax += taxAmount;
					value.set("tax", taxAmount);
				}else{
					value.set("tax", 0);
				}

				value.set("amount", amt);

				if(value.item_id>0){
					itemIds.push(value.item_id);
				}
	        });

	    	//Total
	        total = (subTotal + tax) - discount;

	        //Warning over credit allowed
	        if(obj.credit_allowed>0 && total>obj.credit_allowed){
	        	this.set("amtDueColor", "Gold");		        	
	        }else{
	        	this.set("amtDueColor", banhji.source.amtDueColor);
	        }

	        obj.set("sub_total", subTotal);
	        obj.set("discount", discount);
	        obj.set("tax", tax);			
			obj.set("amount", total);

			this.set("total", kendo.toString(total, "c", obj.locale));
	    	
	    	//Remove Assembly Item List
			var raw = this.assemblyLineDS.data();
		    var item, i;
		    for(i=raw.length-1; i>=0; i--){
		    	item = raw[i];

		    	if (jQuery.inArray(kendo.parseInt(item.assembly_id), itemIds)==-1) {
			       	this.assemblyLineDS.remove(item);
			    }
		    }
		},
		lineDSChanges 		: function(arg){
			var self = banhji.saleOrder;

			if(arg.field){
				if(arg.field=="item"){
					var dataRow = arg.items[0],
						item = dataRow.item;

					if(item.is_catalog=="1"){
						self.addItemCatalog(dataRow.uid);
					}else if(item.is_assembly=="1"){
						self.addItemAssembly(dataRow.uid);
					}else{
						self.addItem(dataRow.uid);
					}

					self.addExtraRow(dataRow.uid);
				}else if(arg.field=="quantity" || arg.field=="price" || arg.field=="discount"){
					self.changes();					
				}else if(arg.field=="measurement"){
					var dataRow = arg.items[0];
					
					dataRow.set("measurement_id", dataRow.measurement.measurement_id);
			        dataRow.set("price", dataRow.measurement.price * dataRow.rate);
			        dataRow.set("conversion_ratio", dataRow.measurement.conversion_ratio);
			    }else if(arg.field=="discount_percentage"){
			    	var dataRow = arg.items[0],
			    		percentageAmount = dataRow.quantity * dataRow.price * dataRow.discount_percentage;

			    	dataRow.set("discount", percentageAmount);
				}else if(arg.field=="tax_item"){
					var dataRow = arg.items[0];
					
					dataRow.set("tax_item_id", dataRow.tax_item.id);
					dataRow.set("tax", 0);

					self.changes();
				}
			}
		},
		//Number
		checkExistingNumber 	: function(){
			var self = this, para = [], 
			obj = this.get("obj");
			
			if(obj.number!==""){

				if(obj.isNew()==false){
					para.push({ field:"id", operator:"where_not_in", value: [obj.id] });
				}
				
				para.push({ field:"number", value: obj.number });
				para.push({ field:"type", value: obj.type });

				this.txnDS.query({
					filter: para,
					page: 1,
					pageSize: 1
				}).then(function(e){
					var view = self.txnDS.view();
					
					if(view.length>0){
				 		self.set("notDuplicateNumber", false);
					}else{
						self.set("notDuplicateNumber", true);
					}
				});
			}
		},
		generateNumber 			: function(){
			var self = this, obj = this.get("obj"),
			issueDate = new Date(obj.issued_date),
			startDate = new Date(obj.issued_date),
			endDate = new Date(obj.issued_date);

			this.set("notDuplicateNumber", true);

			startDate.setDate(1);
			startDate.setMonth(0);//Set to January
			endDate.setDate(31);
			endDate.setMonth(11);//Set to November

			this.txnDS.query({
				filter:[
					{ field:"type", value:obj.type },
					{ field:"issued_date >=", value:kendo.toString(startDate, "yyyy-MM-dd") },
					{ field:"issued_date <=", value:kendo.toString(endDate, "yyyy-MM-dd") }
				],
				sort: { field:"number", dir:"desc" },
				page:1,
				pageSize:1
			}).then(function(){
				var view = self.txnDS.view(),				
				number = 0, str = "";

				if(view.length>0){
					str = view[0].number;
					str = str.substring(str.length-4, str.length);
					number = kendo.parseInt(str);
				}
				
				number++;
				str = banhji.source.getPrefixAbbr(obj.type) + kendo.toString(issueDate, "yy") + kendo.toString(issueDate, "MM") + kendo.toString(number, "00000");
				
				obj.set("number", str);
			});
		},
		setStatus 			: function(){
			var self = this,
				obj = this.get("obj"), 
				statusObj = this.get("statusObj");

			statusObj.set("text", "");
	        statusObj.set("date", "");
	        statusObj.set("number", "");
	        statusObj.set("url", "");

			switch(obj.status) {
				case 0:
			        statusObj.set("text", "open");
			        break;
				case 1:
			    	statusObj.set("text", "used");

			    	this.txnDS.query({
			    		filter:{ field:"reference_id", value: obj.id },
			    		sort: { field:"issued_date", dir:"desc" },
			    		page:1,
			    		pageSize:1
			    	}).then(function(){
			    		var view = self.txnDS.view();

			    		if(view.length>0){
			    			statusObj.set("date", kendo.toString(new Date(view[0].issued_date), "dd-MM-yyyy h:mm:ss tt"));
			    			statusObj.set("number", view[0].number);
		    				
		    				var url = "#/" + view[0].type.toLowerCase() + "/" + view[0].id;
		    				statusObj.set("url", url);
			    		}
			    	});
			        break;
			    case 2:
			        statusObj.set("text", "partialy used");
			        break;
			    case 4:
			        statusObj.set("text", "draft");
			        break;
			    default:
			        //Default here
			}
		},
		//Create PO
		addPO 				: function(id){
			var obj = this.get("obj"), vendorIds = [];

			$.each(this.lineDS.data(), function(index, value){
				if(value.contact.id>0){
					vendorIds.push(value.contact.id);
				}
			});

			vendorIds = jQuery.unique( vendorIds );

			for(var i = 0; i < vendorIds.length; i++){
				var lines = [], subTotal = 0, discount = 0, tax = 0, total = 0;

				$.each(this.lineDS.data(), function(index, value){
					if(value.contact.id==vendorIds[i]){
						var amt = value.quantity * value.cost;
						subTotal += amt;

						//Discount by line
						if(value.discount>0){
							amt -= value.discount;
							discount += value.discount;
						}

						//Tax by line
						if(value.tax_item_id>0){
							var taxAmount = amt * value.tax_item.rate;

							if(banhji.source.checkWHT(value.tax_item.tax_type_id) && value.wht_account_id==0){
								tax -= taxAmount;
							}else{
								tax += taxAmount;
							}
						}

						lines.push({
							transaction_id 		: 0,
							tax_item_id 		: value.tax_item_id,
							item_id 			: value.item_id,
							assembly_id 		: value.assembly_id,
							measurement_id 		: value.measurement_id,
							description 		: value.description,
							quantity 	 		: value.quantity,
							conversion_ratio 	: value.conversion_ratio,
							cost 				: value.cost,
							price 				: value.price,
							amount 				: value.amount,
							discount 			: value.discount,
							rate				: value.rate,
							locale				: value.locale,
							movement 			: 0,
							required_date 		: value.required_date,

							discount_percentage : value.discount_percentage,
							item 				: value.item,
							measurement 		: value.measurement,
							tax_item 			: value.tax_item,
							wht_account 		: value.wht_account
						});
					}
				});

				total = (subTotal + tax) - discount;

				this.poDS.insert(0, {
					contact_id 			: vendorIds[i],
					transaction_template_id : 11,
					reference_id 		: id,
					recurring_id 		: "",
					job_id 				: 0,
					user_id 			: this.get("user_id"),
					employee_id			: obj.employee_id,
				   	type				: "Purchase_Order",//Required
				   	number 				: "",
				   	sub_total 			: subTotal,
				   	discount 			: discount,
				   	amount				: total,
				   	tax 				: tax,
				   	rate				: obj.rate,
				   	locale 				: obj.locale,
				   	issued_date 		: obj.issued_date,
				   	due_date 			: obj.due_date,
				   	bill_to 			: obj.bill_to,
				   	ship_to 			: obj.ship_to,
				   	memo 				: obj.memo,
				   	memo2 				: obj.memo2,
				   	status 				: 0,
				   	segments 			: [],
				   	lines 				: lines
	  		  	});
			}

			this.poDS.sync();			
		},
		//Obj
		loadObj 			: function(id){
			var self = this, para = [], referenceIds = [];

			para.push({ field:"id", value: id });

			if(this.get("recurring")=="use"){
				this.set("recurring","");
				this.addEmpty();
				this.loadRecurring(id);
			}else{
				if(this.get("recurring")=="edit"){
					this.set("recurring","");
					para.push({ field:"is_recurring", value: 1 });
				}

				this.dataSource.query({
					filter: para,
					page: 1,
					pageSize: 100
				}).then(function(e){
					var view = self.dataSource.view();

					self.set("obj", view[0]);
					self.set("total", kendo.toString(view[0].amount, "c2", view[0].locale));					
					self.setStatus();
					
					self.lineDS.query({
						filter: [
							{ field: "transaction_id", value: id },
							{ field: "assembly_id", value: 0 }
						],
					});

					self.assemblyLineDS.filter([
						{ field: "transaction_id", value: id },
						{ field: "assembly_id >", value: 0 }
					]);
					
					self.attachmentDS.filter({ field: "transaction_id", value: id });
					self.referenceDS.filter({ field: "id", value: view[0].reference_id });					
				});
			}				
		},
		addEmpty 		 	: function(){
			this.dataSource.data([]);
			this.lineDS.data([]);
			this.assemblyLineDS.data([]);
			this.attachmentDS.data([]);
			
			this.set("isEdit", false);
			this.set("obj", null);
			this.set("total", 0);
			this.set("amtDueColor", banhji.source.amtDueColor);

			//Set Date
			var duedate = new Date();
			duedate.setDate(duedate.getDate() + 30);

			this.dataSource.insert(0, {
				contact_id 			: "",
				transaction_template_id : 2,
				reference_id 		: "",
				recurring_id 		: "",
				job_id 				: 0,
				user_id 			: this.get("user_id"),
				employee_id			: banhji.source.get("employee").id,
			   	type				: "Sale_Order",//Required
			   	number 				: "",
			   	sub_total 			: 0,
			   	amount				: 0,
			   	credit_allowed 		: 0,
			   	discount 			: 0,
			   	tax 				: 0,
			   	rate				: 1,
			   	locale 				: banhji.locale,
			   	issued_date 		: new Date(),
			   	due_date 			: duedate,
			   	bill_to 			: "",
			   	ship_to 			: "",
			   	memo 				: "",
			   	memo2 				: "",
			   	status 				: 0,
			   	segments 			: [],
			   	//Recurring
			   	recurring_name 		: "",
			   	start_date 			: new Date(),
			   	frequency 			: "Daily",
			   	month_option 		: "Day",
			   	interval 			: 1,
			   	day 				: 1,
			   	week 				: 0,
			   	month 				: 0,
			   	is_recurring 		: 0,

			   	contact 			: { id:"", name:"" }
	    	});
			
			var obj = this.dataSource.at(0);
			this.set("obj", obj);
			this.setRate();
			this.generateNumber();

			//Default rows
			for (var i = 0; i < banhji.source.defaultLines; i++) {
				this.addRow();
			}
		},
		addRow 				: function(){
			var obj = this.get("obj");

			this.lineDS.add({
				transaction_id 		: obj.id,
				contact_id 			: 0,
				tax_item_id 		: "",
				item_id 			: "",
				assembly_id 		: 0,
				measurement_id 		: 0,
				description 		: "",
				quantity 	 		: 1,
				conversion_ratio 	: 0,
				cost 				: 0,
				price 				: 0,
				amount 				: 0,
				discount 			: 0,
				rate				: obj.rate,
				locale				: obj.locale,
				movement 			: 0,
				required_date 		: "",

				discount_percentage : 0,
				item 				: { id:"", name:"" },
				measurement 		: { measurement_id:"", measurement:"" },
				tax_item 			: { id:"", name:"" },
				contact 			: { id:"", name:"" }
			});
		},
		addExtraRow 		: function(uid){
			var row = this.lineDS.getByUid(uid),
				index = this.lineDS.indexOf(row);

			if(index==this.lineDS.total()-1){
				this.addRow();
			}
		},
		removeEmptyRow 		: function(){
			var raw = this.lineDS.data();
		    var item, i;
		    for(i=raw.length-1; i>=0; i--){
		    	item = raw[i];

		    	if (item.item_id==0) {
			       	this.lineDS.remove(item);
			    }
		    }
	    },
		removeRow 			: function(e){
			var data = e.data;
			if(this.lineDS.total()>1){
				this.lineDS.remove(data);
		        this.changes();
	        }
		},
	    objSync 			: function(){
	    	var dfd = $.Deferred();	        

	    	this.dataSource.sync();
		    this.dataSource.bind("requestEnd", function(e){
		    	if(e.response){				
					dfd.resolve(e.response.results);
				}				  				
		    });
		    this.dataSource.bind("error", function(e){		    		    	
				dfd.reject(e.errorThrown);    				
		    });

		    return dfd;	    		    	
	    },
		save 				: function(){
	    	var self = this, obj = this.get("obj");

	    	obj.set("issued_date", kendo.toString(new Date(obj.issued_date), "s"));
	    	obj.set("due_date", kendo.toString(new Date(obj.due_date), "yyyy-MM-dd"));

	    	//Warning over credit allowed
	        if(obj.credit_limit>0 && obj.amount>obj.credit_allowed){
	        	alert("Over credit allowed!");
	        }

	        this.removeEmptyRow();

	        //Save Draft
	        if(this.get("saveDraft")){
	        	obj.set("status", 4); //In progress
	        	obj.set("progress", "Draft");
	        	obj.set("is_journal", 0);//No Journal
	        }

	        //Recurring
	    	if(this.get("saveRecurring")){
	    		this.set("saveRecurring", false);
	    		
	    		obj.set("number", "");
	    		obj.set("is_recurring", 1);
	    	}

	        //Edit Mode
	    	if(obj.isNew()==false){
	    		//Use draft
	    		if(obj.status==4){
	    			obj.set("status", 0);//Open
	    			obj.set("progress", "");
	    			obj.set("is_journal", 1);//Add Journal
	    		}
	    	}

	    	//Reference
	    	if(obj.reference_id>0){
	    		var ref = this.referenceDS.get(obj.reference_id);
	    		ref.set("status", 1);
	    		this.referenceDS.sync();
	    	}else{
	    		obj.set("reference_id", 0);
	    	}
	    	
			//Save Obj
			this.objSync()
			.then(function(data){ //Success
				if(self.get("isEdit")==false){
					//Item line
					$.each(self.lineDS.data(), function(index, value){
						value.set("transaction_id", data[0].id);
					});

					//Assembly Item line
					$.each(self.assemblyLineDS.data(), function(index, value){
						value.set("transaction_id", data[0].id);
					});

					//Attachment
					$.each(self.attachmentDS.data(), function(index, value){
			    		value.set("transaction_id", data[0].id);
		            });
				}

				self.addPO(data[0].id);
				self.lineDS.sync();
				self.assemblyLineDS.sync();				
				self.uploadFile();
				
				return data;
			}, function(reason) { //Error
				$("#ntf1").data("kendoNotification").error(reason);
			}).then(function(result){
				$("#ntf1").data("kendoNotification").success(banhji.source.successMessage);

				if(self.get("saveDraft") || self.get("saveClose")){
					//Save Draft or Save Close
					self.set("saveDraft", false);
					self.set("saveClose", false);
					self.cancel();
				}else if(self.get("savePrint")){
					//Save Print
					self.set("savePrint", false);
					self.clear();
					if(result[0].transaction_template_id>0){
						banhji.router.navigate("/invoice_form/"+result[0].id);
					}
				}else{
					//Save New
					self.addEmpty();
				}
			});
		},
		clear 				: function(){
			this.dataSource.cancelChanges();
			this.lineDS.cancelChanges();
			this.assemblyLineDS.cancelChanges();
			this.attachmentDS.cancelChanges();
			this.referenceDS.cancelChanges();
			this.poDS.cancelChanges();
			
			this.dataSource.data([]);
			this.lineDS.data([]);
			this.assemblyLineDS.data([]);
			this.attachmentDS.data([]);
			this.referenceDS.data([]);
			this.poDS.data([]);

			banhji.userManagement.removeMultiTask("sale_order");
		},
		cancel 				: function(){
			this.clear();
			window.history.back();
		},
		delete 				: function(){
			var self = this, obj = this.get("obj");
			this.set("showConfirm",false);			
			
	        this.txnDS.query({
	        	filter:[
	        		{ field:"reference_id", value:obj.id },
	        	],
	        	page:1,
	        	pageSize:1
	        }).then(function(){
	        	var view = self.txnDS.view();

	        	if(view.length>0){
	        		alert("Sorry, you can not delete it.");
	        	}else{
	        		obj.set("deleted", 1);

			        self.dataSource.sync();
			        self.dataSource.bind("requestEnd", function(e){
			        	if(e.type==="update"){
			        		window.history.back();
			        	}
			        });
	        	}
	        });		    	    	
		},
		openConfirm 		: function(){
			this.set("showConfirm", true);
		},
		closeConfirm 		: function(){
			this.set("showConfirm", false);
		},
		validating 			: function(){
			var result = true, nonItem = true;

			//Check select non item
			$.each(this.lineDS.data(), function(index, value){
				if(value.item_id>0){
					nonItem = false;
				}
			});
			
			if(nonItem){
				$("#ntf1").data("kendoNotification").error("Please select at least one item!");

				result = false;
			}

			return result;
		},
		//Reference					
		loadReference 		: function(){
			var obj = this.get("obj");

			if(obj.contact_id>0){
				this.set("enableRef", true);

				this.referenceDS.filter([
					{ field: "contact_id", value: obj.contact_id },
					{ field: "status", value: 0 },
					{ field: "type", value: "Quote" },
					{ field: "due_date >=", value: kendo.toString(obj.issued_date, "yyyy-MM-dd") }
				]);
			}else{
				this.set("enableRef", false);
				obj.set("reference_id", "");
			}
		},
		referenceChanges 	: function(){
			var self = this, obj = this.get("obj");

			if(obj.reference_id>0){
				var data = this.referenceDS.get(obj.reference_id);

				obj.set("employee_id", data.employee_id);
				obj.set("reference_no", data.number);
				obj.set("segments", data.segments);
								
			 	this.referenceLineDS.query({
			 		filter:[
			 			{ field: "transaction_id", value: obj.reference_id },
			 			{ field: "assembly_id", value: 0 }
			 		],
			 		page: 1,
			 		pageSize: 100
			 	}).then(function(){
			 		var view = self.referenceLineDS.view();

			 		self.lineDS.data([]);
			 		$.each(view, function(index, value){
			 			self.lineDS.add({					
							transaction_id 		: 0,
							item_id 			: value.item_id,
							tax_item_id 		: value.tax_item_id,
							measurement_id 		: value.measurement_id,							
							description 		: value.description,				
							quantity 	 		: value.quantity,
							cost 				: value.cost,
							price 				: value.price,												
							amount 				: value.amount,
							discount 			: value.discount,
							conversion_ratio 	: value.conversion_ratio,
							rate				: value.rate,
							locale				: value.locale,
							movement 			: 0,
							required_date 		: value.required_date,

							item 				: value.item,
							measurement 		: value.measurement,
							tax_item 			: value.tax_item,
							contact 			: value.contact
						});
			 		});

			 		self.changes();
			 	});
		 	}
		},
		//Recurring		
		loadRecurring 		: function(id){
			var self = this;

			this.recurringDS.query({
				filter:[
					{ field:"id", value:id },
					{ field:"is_recurring", value:1 }
				],
				page: 1,
				pageSize: 100
			}).then(function(){
				var view = self.recurringDS.view(),
				obj = self.get("obj");
				
				obj.set("contact", view[0].contact);
				obj.set("recurring_id", id);
				obj.set("employee_id", view[0].employee_id);//Sale Rep
				obj.set("job_id", view[0].job_id);
				obj.set("segments", view[0].segments);
				obj.set("locale", view[0].locale);
				obj.set("memo", view[0].memo);
				obj.set("memo2", view[0].memo2);
				obj.set("bill_to", view[0].bill_to);
				obj.set("ship_to", view[0].ship_to);

				self.setContact(view[0].contact);
			});

			this.recurringLineDS.query({
				filter:[
					{ field: "transaction_id", value: id },
					{ field: "assembly_id", value: 0 }
				]
			}).then(function(){
				var view = self.recurringLineDS.view();
				self.lineDS.data([]);

				$.each(view, function(index, value){
					self.lineDS.add({
						transaction_id 		: 0,
						tax_item_id 		: value.tax_item_id,
						item_id 			: value.item_id,
						measurement_id 		: value.measurement_id,
						description 		: value.description,
						quantity 	 		: value.quantity,
						cost 				: value.cost,
						price 				: value.price,
						amount 				: value.amount,
						discount 			: value.discount,
						rate				: value.rate,
						locale				: value.locale,
						movement 			: 0,
						required_date 		: value.required_date,

						item 				: value.item,
						measurement 		: value.measurement,
						tax_item 			: value.tax_item
					});
				});

				self.changes();
			});
		},
		frequencyChanges 	: function(){
			var obj = this.get("obj");

			switch(obj.frequency) {
			    case "Daily":
			        this.set("showMonthOption", false);
			        this.set("showMonth", false);
			        this.set("showWeek", false);
			        this.set("showDay", false);
			       
			        break;
			    case "Weekly":
			        this.set("showMonthOption", false);
			        this.set("showMonth", false);
			        this.set("showWeek", true);
			        this.set("showDay", false);

			        break;
			    case "Monthly":
			        this.set("showMonthOption", true);
			        this.set("showMonth", false);
			        this.set("showWeek", false);
			        this.set("showDay", true);

			        break;
			    case "Annually":
			        this.set("showMonthOption", false);
			        this.set("showMonth", true);
			        this.set("showWeek", false);
			        this.set("showDay", true);

			        break;
			    default:
			        //Default here..
			}
		},
		monthOptionChanges 	: function(){
			var obj = this.get("obj");

			switch(obj.month_option) {
			    case "Day":			       
			        this.set("showWeek", false);
			        this.set("showDay", true);
			       
			        break;			    
			    default:			        
			        this.set("showWeek", true);
			        this.set("showDay", false);
			}
		},
		recurringSync 		: function(){
	    	var dfd = $.Deferred();	        

	    	this.recurringDS.sync();
		    this.recurringDS.bind("requestEnd", function(e){
		    	if(e.response){				
					dfd.resolve(e.response.results);
				}				  				
		    });
		    this.recurringDS.bind("error", function(e){		    		    	
				dfd.reject(e.errorThrown);    				
		    });

		    return dfd;	    		    	
	    }
	});
	banhji.customerDeposit =  kendo.observable({
		lang 				: langVM,
		dataSource 			: dataStore(apiUrl + "transactions"),
		txnDS 				: dataStore(apiUrl + "transactions"),
		lineDS  			: dataStore(apiUrl + "account_lines"),
		referenceDS			: dataStore(apiUrl + "transactions"),
		referenceLineDS		: dataStore(apiUrl + "account_lines"),
		recurringDS 		: dataStore(apiUrl + "transactions"),
		recurringLineDS 	: dataStore(apiUrl + "account_lines"),
		journalLineDS		: dataStore(apiUrl + "journal_lines"),
		attachmentDS	 	: dataStore(apiUrl + "attachments"),
		txnTemplateDS 		: new kendo.data.DataSource({
		  	data: banhji.source.txnTemplateList,
		  	filter:{ field: "type", value: "Deposit" }
		}),
		accountDS 			: new kendo.data.DataSource({
		  	data: banhji.source.accountList,
		  	filter: {
	      		logic: "or",
			    filters: [
			      	{ field: "account_type_id", value: 10 },//Cash
			      	{ field: "account_type_id", value: 34 },//Retained Earning
			      	{ field: "account_type_id", value: 36 },//Expense
			      	{ field: "account_type_id", value: 37 },
			      	{ field: "account_type_id", value: 38 },
			      	{ field: "account_type_id", value: 40 },
			      	{ field: "account_type_id", value: 41 },
			      	{ field: "account_type_id", value: 42 },
			      	{ field: "account_type_id", value: 43 }
			    ]
			},
			sort: { field:"number", dir:"asc" }
		}),
		depositAccountDS 	: new kendo.data.DataSource({
		  	data: banhji.source.accountList,
		  	filter: {
	      		logic: "or",
			    filters: [
			      	{ field: "account_type_id", value: 25 },
	      			{ field: "account_type_id", value: 30 }
			    ]
			},
			sort: { field:"number", dir:"asc" }
		}),
		jobDS 				: new kendo.data.DataSource({
		  	data: banhji.source.jobList,
		  	sort: { field: "name", dir: "asc" }
		}),
		segmentItemDS 		: new kendo.data.DataSource({
		  	data: banhji.source.segmentItemList,
		  	sort: [
			  	{ field: "segment_id", dir: "asc" },
			  	{ field: "code", dir: "asc" }
			]
		}),
		contactDS			: banhji.source.customerDS,
		amtDueColor 		: banhji.source.amtDueColor,
	    confirmMessage 		: banhji.source.confirmMessage,
		frequencyList 		: banhji.source.frequencyList,
		monthList 			: banhji.source.monthList,	
		monthOptionList 	: banhji.source.monthOptionList,
		weekDayList 		: banhji.source.weekDayList,
		dayList 			: banhji.source.dayList,
		showMonthOption 	: false,
		showMonth 			: false,
		showWeek 			: false,
		showDay 			: false,
		obj 				: null,
		isEdit 				: false,
		saveClose 			: false,
		savePrint 			: false,
		saveRecurring 		: false,
		showConfirm 		: false,
		notDuplicateNumber  : true,
		statusSrc 			: "",
		recurring 			: "",
		recurring_validate 	: false,
		enableRef 	 		: false,
		total				: 0,
		original_total 		: 0,
		user_id				: banhji.source.user_id,
		pageLoad 			: function(id){
			if(id){
				this.set("isEdit", true);
				this.loadObj(id);
			}else{				
				if(this.get("isEdit") || this.dataSource.total()==0){
					this.addEmpty();
				}
			}
		},
		//Upload
		onSelect 			: function(e){
	        // Array with information about the uploaded files
	        var self = this, 
	        files = e.files,
	        obj = this.get("obj");
			
	        // Check the extension of each file and abort the upload if it is not .jpg
	        $.each(files, function(index, value){
	            if (value.extension.toLowerCase() === ".jpg"
	            	|| value.extension.toLowerCase() === ".jpeg"
	            	|| value.extension.toLowerCase() === ".tiff"
	            	|| value.extension.toLowerCase() === ".png" 
	            	|| value.extension.toLowerCase() === ".gif"
	            	|| value.extension.toLowerCase() === ".pdf"){

	            	var key = 'ATTACH_' + banhji.institute.id + "_" + Math.floor(Math.random() * 100000000000000001) +'_'+ value.name;

	            	self.attachmentDS.add({
	            		user_id 		: self.get("user_id"),
	            		transaction_id 	: obj.id,
	            		type 			: "Transaction",
	            		name 			: value.name,
	            		description 	: "",
	            		key 			: key,
	            		url 			: banhji.s3 + key,
	            		size 			: value.size,
	            		created_at 		: new Date(),

	            		file 			: value.rawFile
	            	});
	            }else{
	            	alert("This type of file is not allowed to attach.");
	            }
	        });
	    },
	    removeFile 			: function(e){
	    	var data = e.data;

	    	if (confirm(banhji.source.confirmMessage)) {
	    		this.attachmentDS.remove(data);
	    	}	    	
	    },
	    uploadFile 			: function(){
	    	$.each(this.attachmentDS.data(), function(index, value){
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

	        this.attachmentDS.sync();
	        var saved = false;
	        this.attachmentDS.bind("requestEnd", function(e){
	        	//Delete File
	        	if(e.type=="destroy"){
	            	if(saved==false && e.response){
	            		saved = true;
	            	
	            		var response = e.response.results;
	            		$.each(response, function(index, value){
		            		var params = {
							  	//Bucket: 'STRING_VALUE', /* required */
							 	Delete: { /* required */
								    Objects: [ /* required */
								      	{
									        Key: value.data.key /* required */
								      	}
								      /* more items */
								    ]
							  	}
							};
							bucket.deleteObjects(params, function(err, data) {
							  	//console.log(err, data);
							});
						});
	            	}
	        	}
	        });
	    },
		//Contact
		setContact 			: function(contact){
			var obj = this.get("obj");

		    obj.set("contact", contact);
		    this.contactChanges();
	    },
		contactChanges 		: function(){
			var self = this, obj = this.get("obj");

	    	if(obj.contact){
		    	var contact = obj.contact;

		    	obj.set("contact_id", contact.id);
		    	obj.set("account_id", contact.deposit_account_id);
		    	obj.set("locale", contact.locale);

		    	this.setRate();
		    	this.loadReference();
		    	this.jobDS.filter({ field:"contact_id", value: contact.id });
	    	}

		    this.changes();
	    },
	    employeeChanges 		: function(){
			var obj = this.get("obj");

	    	if(obj.employee){
		    	var employee = obj.employee;
		    	
		    	obj.set("employee_id", employee.id);
	    	}else{
	    		obj.set("employee_id", 0);
	    	}
	    },
		//Currency Rate
		setRate 			: function(){
			var obj = this.get("obj"), 
			rate = banhji.source.getRate(obj.locale, new Date(obj.issued_date));

			obj.set("rate", rate);

			$.each(this.lineDS.data(), function(index, value){
				value.set("rate", rate);
				value.set("locale", obj.locale);
			});
		},
		//Segment
		segmentChanges 		: function(e) {
			var dataArr = this.get("obj").segments,
			lastIndex = dataArr.length - 1,
			last = this.segmentItemDS.get(dataArr[lastIndex]);
			
			if(dataArr.length > 1) {
				for(var i = 0; i < dataArr.length - 1; i++) {
					var current_index = dataArr[i],
					current = this.segmentItemDS.get(current_index);

					if(current.segment_id === last.segment_id) {
						dataArr.splice(lastIndex, 1);
						break;
					}
				}
			}
		},
		//Number      	
		checkExistingNumber 	: function(){
			var self = this, para = [], 
			obj = this.get("obj");
			
			if(obj.number!==""){

				if(obj.isNew()==false){
					para.push({ field:"id", operator:"where_not_in", value: [obj.id] });
				}
				
				para.push({ field:"number", value: obj.number });
				para.push({ field:"type", value: obj.type });

				this.txnDS.query({
					filter: para,
					page: 1,
					pageSize: 1
				}).then(function(e){
					var view = self.txnDS.view();
					
					if(view.length>0){
				 		self.set("notDuplicateNumber", false);
					}else{
						self.set("notDuplicateNumber", true);
					}
				});
			}
		},
		generateNumber 			: function(){
			var self = this, obj = this.get("obj"),
			issueDate = new Date(obj.issued_date),
			startDate = new Date(obj.issued_date),
			endDate = new Date(obj.issued_date);

			this.set("notDuplicateNumber", true);

			startDate.setDate(1);
			startDate.setMonth(0);//Set to January
			endDate.setDate(31);
			endDate.setMonth(11);//Set to November

			this.txnDS.query({
				filter:[
					{ field:"type", value:obj.type },
					{ field:"issued_date >=", value:kendo.toString(startDate, "yyyy-MM-dd") },
					{ field:"issued_date <=", value:kendo.toString(endDate, "yyyy-MM-dd") }
				],
				sort: { field:"number", dir:"desc" },
				page:1,
				pageSize:1
			}).then(function(){
				var view = self.txnDS.view(),
				number = 0, str = "";

				if(view.length>0){
					str = view[0].number;
					str = str.substring(str.length-4, str.length);
					number = kendo.parseInt(str);
				}
				
				number++;
				str = banhji.source.getPrefixAbbr(obj.type) + kendo.toString(issueDate, "yy") + kendo.toString(issueDate, "MM") + kendo.toString(number, "00000");
				
				obj.set("number", str);
			});
		},
		//Obj
		loadObj 			: function(id){
			var self = this, para = [];

			para.push({ field:"id", value: id });

			if(this.get("recurring")=="use"){
				this.set("recurring","");
				this.addEmpty();
				this.loadRecurring(id);
			}else{
				if(this.get("recurring")=="edit"){
					this.set("recurring","");
					para.push({ field:"is_recurring", value: 1 });
				}

				this.dataSource.query({
					filter: para,
					page: 1,
					pageSize: 1
				}).then(function(e){
					var view = self.dataSource.view();

					self.set("obj", view[0]);
					self.set("original_total", view[0].amount);
					self.set("total", kendo.toString(view[0].amount, "c", view[0].locale));
					
					self.lineDS.filter({ field: "transaction_id", value: id });				
					self.journalLineDS.filter({ field: "transaction_id", value: id });
					self.referenceDS.filter({ field: "id", value: view[0].reference_id });
				});
			}
		},
		changes				: function(){
			var obj = this.get("obj");
			
			if(this.lineDS.total()>0){
				var sum = 0;
				
				$.each(this.lineDS.data(), function(index, value) {
					sum += value.amount;
		        });

		        this.set("total", kendo.toString(sum, "c", obj.locale));
		        obj.set("amount", sum);
	    	}else{
	    		this.set("total", 0);
		        obj.set("amount", 0);
	    	}
		},
		addEmpty 		 	: function(){
			this.dataSource.data([]);
			this.lineDS.data([]);
			this.attachmentDS.data([]);
			this.journalLineDS.data([]);

			this.set("isEdit", false);
			this.set("obj", null);
			this.set("total", 0);

			this.dataSource.insert(0, {
				contact_id 				: "",
				transaction_template_id : 7,
				recurring_id 			: "",
				reference_id	 		: "",
				account_id 				: "",
				employee_id 			: banhji.source.get("employee").id,
				user_id 				: this.get("user_id"),
			   	type					: "Customer_Deposit", //required
			   	number 					: "",
			   	amount					: 0,
			   	rate					: 1,
			   	locale 					: banhji.locale,
			   	issued_date 			: new Date(),
			   	memo 					: "",
			   	memo2 					: "",
			   	segments 				: [],
			   	is_journal 				: 1,
			   	//Recurring
			   	recurring_name 			: "",
			   	start_date 				: new Date(),
			   	frequency 				: "Daily",
			   	month_option 			: "Day",
			   	interval 				: 1,
			   	day 					: 1,
			   	week 					: 0,
			   	month 					: 0,
			   	is_recurring 			: 0,

			   	contact					: { id:"", name:"" }
	    	});

			var obj = this.dataSource.at(0);
			this.set("obj", obj);

			this.setRate();
			this.addRow();
			this.generateNumber();
		},
		addRow 				: function(){
			var obj = this.get("obj");
			this.lineDS.add({
				transaction_id 		: obj.id,
				account_id 			: "",
				description 		: "",
				reference_no 		: "",
				amount 	 			: 0,
				rate				: obj.rate,
				locale				: obj.locale
			});
		},
		removeRow  			: function(e){
			var data = e.data;
			if(this.lineDS.total()>1){
				this.lineDS.remove(data);
		        this.changes();
	        }
		},
		objSync 			: function(){
	    	var dfd = $.Deferred();	        

	    	this.dataSource.sync();
		    this.dataSource.bind("requestEnd", function(e){
		    	if(e.response){
					dfd.resolve(e.response.results);
				}
		    });
		    this.dataSource.bind("error", function(e){
				dfd.reject(e.errorThrown);
		    });

		    return dfd;
	    },
		save 				: function(){
	    	var self = this, obj = this.get("obj");
	    	obj.set("issued_date", kendo.toString(new Date(obj.issued_date), "s"));

	    	//Recurring
	    	if(this.get("saveRecurring")){
	    		this.set("saveRecurring", false);

	    		obj.set("number", "");
	    		obj.set("is_recurring", 1);
	    	}

	    	//Mode
	    	if(obj.isNew()==false){
	    		//Line has changed
		    	if(this.lineDS.hasChanges() && obj.is_recurring==0){
			    	$.each(this.journalLineDS.data(), function(index, value){
						value.set("deleted", 1);
					});

					this.addJournal(obj.id);
		    	}
	    	}

	    	//Reference
	    	if(obj.reference_id>0){
				var ref = this.referenceDS.get(obj.reference_id);
				ref.set("deposit", obj.amount);
				this.referenceDS.sync();
			}else{
				obj.set("reference_id", 0);
			}

			//Save Obj
			this.objSync()
			.then(function(data){ //Success
				if(self.get("isEdit")==false){
					//Item line
					$.each(self.lineDS.data(), function(index, value){
						value.set("transaction_id", data[0].id);
					});

					//Attachment
					$.each(self.attachmentDS.data(), function(index, value){
			    		value.set("transaction_id", data[0].id);
		            });

					//Journal
					if(data[0].is_recurring==0){
			            self.addJournal(data[0].id);
			        }
				}

				self.lineDS.sync();
				self.uploadFile();
				
				return data;
			}, function(reason) { //Error
				$("#ntf1").data("kendoNotification").error(reason);
			}).then(function(result){
				$("#ntf1").data("kendoNotification").success(banhji.source.successMessage);

				if(self.get("saveClose")){
					//Save Close
					self.set("saveClose", false);
					self.cancel();
					window.history.back();
				}else if(self.get("savePrint")){
					//Save Print
					self.set("savePrint", false);
					self.cancel();
					if(result[0].transaction_template_id>0){
						banhji.router.navigate("/invoice_form/"+result[0].id);
					}
				}else{
					//Save New
					self.addEmpty();
				}
			});
		},
		cancel 				: function(){
			this.dataSource.cancelChanges();
			this.lineDS.cancelChanges();
			this.attachmentDS.cancelChanges();

			this.dataSource.data([]);
			this.lineDS.data([]);
			this.attachmentDS.data([]);

			banhji.userManagement.removeMultiTask("customer_deposit");
		},
		delete 				: function(){
			var self = this, obj = this.get("obj");
			this.set("showConfirm",false);

	        this.txnDS.query({
	        	filter:[
	        		{ field:"reference_id", value:obj.id }
	        	],
	        	page:1,
	        	pageSize:1
	        }).then(function(){
	        	var view = self.txnDS.view();

	        	if(view.length>0){
	        		alert("Sorry, you can not delete it.");
	        	}else{
	        		obj.set("deleted", 1);
			        
			        self.dataSource.sync();
			        self.dataSource.bind("requestEnd", function(e){
			        	if(e.type==="update"){
			        		window.history.back();
			        	}
			        });
	        	}
	        });
		},
		openConfirm 		: function(){
			this.set("showConfirm", true);
		},
		closeConfirm 		: function(){
			this.set("showConfirm", false);
		},
		validating 			: function(){
			var result = true, nonItem = true;

			//Check select non item
			$.each(this.lineDS.data(), function(index, value){
				if(value.account_id>0){
					nonItem = false;
				}
			});

			if(nonItem){
				$("#ntf1").data("kendoNotification").error("Please select at least one account!");

				result = false;
			}

			return result;
		},
		//Journal
		addJournal 			: function(transaction_id){
	    	var self = this,
	    	sum = 0,
	    	obj = this.get("obj");

			//Cash account on DR
			$.each(this.lineDS.data(), function(index, value){
				sum += value.amount;

				self.journalLineDS.add({
					transaction_id 		: transaction_id,
					account_id 			: value.account_id,
					contact_id 			: value.contact_id,
					description 		: "",
					reference_no 		: value.reference_no,
					segments 	 		: obj.segments,
					dr 	 				: value.amount,
					cr 					: 0,
					rate				: value.rate,
					locale				: value.locale
				});
			});

			//Deposit on CR
			this.journalLineDS.add({
				transaction_id 		: transaction_id,
				account_id 			: obj.account_id,
				contact_id 			: obj.contact_id,
				description 		: "",
				reference_no 		: "",
				segments 	 		: obj.segments,
				dr 	 				: 0,
				cr 					: sum,
				rate				: obj.rate,
				locale				: obj.locale
			});

			this.journalLineDS.sync();
		},
		//Reference
		loadReference 		: function(){
			var obj = this.get("obj");

			if(obj.contact_id>0){
				this.set("enableRef", true);

				this.referenceDS.filter([
					{ field: "contact_id", value: obj.contact_id },
					{ field: "status", value: 0 },
					{ field: "deposit", value: 0 },
					{ field: "type", value: "Sale_Order" },
					{ field: "due_date >=", value: kendo.toString(obj.issued_date, "yyyy-MM-dd") }
				]);
			}else{
				this.set("enableRef", false);
				obj.set("reference_id", "");
			}
		},
		referenceChanges 	: function(){
			var obj = this.get("obj");

			if(obj.reference_id>0){
				var data = this.referenceDS.get(obj.reference_id);

				obj.set("reference_no", data.number);
				obj.set("segments", data.segments);
				obj.set("amount", data.amount);

				this.lineDS.data([]);
				this.lineDS.add({
					transaction_id 		: obj.id,
					account_id 			: "",
					description 		: "",
					reference_no 		: data.number,
					amount 	 			: data.amount,
					conversion_ratio 	: data.conversion_ratio,
					rate				: data.rate,
					locale				: data.locale
				});
			 	this.set("total", kendo.toString(data.amount, "c", data.locale));
		 	}
		},
		//Recurring
		loadRecurring 		: function(id){
			var self = this;

			this.recurringDS.query({
				filter:[
					{ field:"id", value:id },
					{ field:"is_recurring", value:1 }
				],
				page: 1,
				pageSize: 100
			}).then(function(){
				var view = self.recurringDS.view(),
				obj = self.get("obj");

				obj.set("contact", view[0].contact);
				obj.set("contact_id", view[0].contact.id);
				obj.set("recurring_id", id);
				obj.set("employee_id", view[0].employee_id);//Sale Rep
				obj.set("job_id", view[0].job_id);
				obj.set("segments", view[0].segments);
				obj.set("locale", view[0].locale);
				obj.set("memo", view[0].memo);
				obj.set("memo2", view[0].memo2);
				obj.set("bill_to", view[0].bill_to);
				obj.set("ship_to", view[0].ship_to);

				// self.setContact(view[0].contact);
			});

			this.recurringLineDS.query({
				filter: { field:"transaction_id", value:id },
				page: 1,
				pageSize: 100
			}).then(function(){
				var view = self.recurringLineDS.view();
				self.lineDS.data([]);

				$.each(view, function(index, value){
					self.lineDS.add({
						transaction_id 		: 0,
						account_id 			: value.account_id,
						description 		: value.description,
						reference_no 		: value.reference_no,
						amount 	 			: value.amount,
						rate				: value.rate,
						locale				: value.locale
					});
				});

				self.changes();
			});
		},
		frequencyChanges 	: function(){
			var obj = this.get("obj");

			switch(obj.frequency) {
			    case "Daily":
			        this.set("showMonthOption", false);
			        this.set("showMonth", false);
			        this.set("showWeek", false);
			        this.set("showDay", false);

			        break;
			    case "Weekly":
			        this.set("showMonthOption", false);
			        this.set("showMonth", false);
			        this.set("showWeek", true);
			        this.set("showDay", false);

			        break;
			    case "Monthly":
			        this.set("showMonthOption", true);
			        this.set("showMonth", false);
			        this.set("showWeek", false);
			        this.set("showDay", true);

			        break;
			    case "Annually":
			        this.set("showMonthOption", false);
			        this.set("showMonth", true);
			        this.set("showWeek", false);
			        this.set("showDay", true);

			        break;
			    default:
			        //Default here..
			}
		},
		monthOptionChanges 	: function(){
			var obj = this.get("obj");

			switch(obj.month_option) {
			    case "Day":
			        this.set("showWeek", false);
			        this.set("showDay", true);
			       
			        break;
			    default:
			        this.set("showWeek", true);
			        this.set("showDay", false);
			}
		},
		recurringSync 		: function(){
	    	var dfd = $.Deferred();	        

	    	this.recurringDS.sync();
		    this.recurringDS.bind("requestEnd", function(e){
		    	if(e.response){
					dfd.resolve(e.response.results);
				}
		    });
		    this.recurringDS.bind("error", function(e){
				dfd.reject(e.errorThrown);
		    });

		    return dfd;
	    }
	});
	banhji.cashSale =  kendo.observable({
		lang 				: langVM,
		dataSource 			: dataStore(apiUrl + "transactions"),
		lineDS  			: dataStore(apiUrl + "item_lines"),
		assemblyLineDS  	: dataStore(apiUrl + "item_lines"),
		txnDS 				: dataStore(apiUrl + "transactions"),
		numberDS 			: dataStore(apiUrl + "transactions/number"),
		balanceDS 			: dataStore(apiUrl + "transactions/balance"),
		journalLineDS		: dataStore(apiUrl + "journal_lines"),
		recurringDS 		: dataStore(apiUrl + "transactions"),
		recurringLineDS 	: dataStore(apiUrl + "item_lines"),
		referenceDS			: dataStore(apiUrl + "transactions"),
		referenceLineDS		: dataStore(apiUrl + "item_lines"),
		depositDS  			: dataStore(apiUrl + "transactions"),
		attachmentDS	 	: dataStore(apiUrl + "attachments"),
		itemDS 				: dataStore(apiUrl + "items"),
		itemPriceDS			: dataStore(apiUrl + "item_prices"),
		assemblyDS			: dataStore(apiUrl + "item_assemblies"),
		wacDS				: dataStore(apiUrl + "items/weighted_average_costing"),
		segmentDS 			: dataStore(apiUrl + "segments"),
		segItemDS 			: dataStore(apiUrl + "segments/item"),
		segmentItemDS 		: dataStore(apiUrl + "segments/item"),
		typeList  			: new kendo.data.DataSource({
		  	data: banhji.source.prefixList,
		  	filter:{
			    logic: "or",
			    filters: [
			      	{ field: "type", value: "Commercial_Cash_Sale" },
			      	{ field: "type", value: "Vat_Cash_Sale" },
			      	{ field: "type", value: "Cash_Sale" }
			    ]
			}
		}),
		txnTemplateDS 		: new kendo.data.DataSource({
		  	data: banhji.source.txnTemplateList,
		  	filter:{
			    logic: "or",
			    filters: [
			      	{ field: "type", value: "Commercial_Cash_Sale" },
			      	{ field: "type", value: "Vat_Cash_Sale" },
			      	{ field: "type", value: "Cash_Sale" }
			    ]
			}
		}),
		cashAccountDS  		: new kendo.data.DataSource({
		  	data: banhji.source.accountList,
		  	filter:{ field:"account_type_id", value: 10 },
		  	sort: { field:"number", dir:"asc" }
		}),
		discountAccountDS 	: new kendo.data.DataSource({
		  	data: banhji.source.accountList,
		  	filter: { field:"id", value: 72 },
		  	sort: { field:"number", dir:"asc" }
		}),
		jobDS 				: new kendo.data.DataSource({
		  	data: banhji.source.jobList,
		  	sort: { field: "name", dir: "asc" }
		}),
		categoryDS 			: new kendo.data.DataSource({
		  	data: banhji.source.categoryList,
		  	filter: [
		  		{ field:"item_type_id", value: 1 },
		  		{ field:"id", operator:"neq", value: 5 },
		  		{ field:"id", operator:"neq", value: 6 }
		  	]
		}),
		itemGroupDS 		: banhji.source.itemGroupDS,
		employeeDS  		: banhji.source.employeeDS,
		contactDS  			: banhji.source.customerDS,
		statusObj 			: banhji.source.statusObj,		
		paymentMethodDS 	: banhji.source.paymentMethodDS,
		amtDueColor 		: banhji.source.amtDueColor,
	    confirmMessage 		: banhji.source.confirmMessage,
		frequencyList 		: banhji.source.frequencyList,
		monthOptionList 	: banhji.source.monthOptionList,
		monthList 			: banhji.source.monthList,
		weekDayList 		: banhji.source.weekDayList,
		dayList 			: banhji.source.dayList,
		showMonthOption 	: false,
		showMonth 			: false,
		showWeek 			: false,
		showDay 			: false,
		obj 				: null,
		isEdit 				: false,
		saveDraft 			: false,
		saveClose 			: false,
		savePrint 			: false,
		saveRecurring 		: false,
		showConfirm 		: false,
		notDuplicateNumber  : true,
		recurring 			: "",
		recurring_validate 	: false,
		reference_id 		: 0,
		balance 			: 0,
		total_deposit		: 0,
		total 				: 0,
		amount_due 			: 0,
		barcode 			: "",
		barcodeVisible 		: false,
		category_id 		: 0,
		item_group_id 		: 0,
		segment_id 			: "",
		segmentitem_id 		: "",
		user_id				: banhji.source.user_id,
		pageLoad 			: function(id){
			if(id){
				this.set("isEdit", true);
				this.loadObj(id);
			}else{				
				if(this.get("isEdit") || this.dataSource.total()==0){
					this.addEmpty();
				}
			}
		},
		loadData 			: function(){
			var obj = this.get("obj");

			this.setRate();
	    	this.loadDeposit();
	    	this.loadBalance();
	    	this.loadReference();
		},
		//Barcode
		search 				: function(){
			var self = this, para = [],
				obj = this.get("obj"),
				category_id = this.get("category_id"),
				item_group_id = this.get("item_group_id");

			if(item_group_id>0){
				para.push({ field:"number", value:item_group_id });
			}else{
				if(category_id>0){
					para.push({ field:"category_id", value:category_id });
				}
			}

			this.itemDS.query({
				filter: para,
				page:1,
				pageSize: 10
			});
			
			this.set("category_id", 0);
			this.set("item_group_id", 0);
		},
		searchByBarcode		: function(){
			var self = this, para = [],
				obj = this.get("obj"),
				barcode = this.get("barcode");

			if(barcode!==""){
				this.itemDS.query({
					filter: { field: "barcode", value: barcode },
					page:1,
					pageSize: 1
				}).then(function(){
					var view = self.itemDS.view();

					if(view.length>0){
						self.insertItem(view[0]);
					}
				});

				this.set("barcode", "");
			}
		},
		addSearchItem		: function(e){
			var data = e.data;

			this.insertItem(data);
		},
		openBarcodeWindow 	: function(){
			this.set("barcodeVisible", true);
		},
		closeBarcodeWindow 	: function(){
			this.set("barcodeVisible", false);
		},
		insertItem 		: function(data){
			var self = this, 
				obj = this.get("obj"),
				rate = obj.rate / banhji.source.getRate(data.locale, new Date(obj.issued_date));

			//Get cost
			this.wacDS.query({
				filter:[
					{ field:"item_id", value: data.id },
					{ field:"issued_date <=", operator:"where_related_transaction", value: kendo.toString(new Date(obj.issued_date),"yyyy-MM-dd  HH:mm:ss") }
				]
			}).then(function(){
	        	var wac = self.wacDS.view();
	        	
	        	var item_price = { 
        			measurement_id 	: data.measurement_id,
        			price 			: kendo.parseFloat(data.price),
        			conversion_ratio: 1, 
        			measurement 	: data.measurement.name 
        		};

	        	self.lineDS.insert(0, {
					transaction_id 		: obj.id,
					tax_item_id 		: 0,
					item_id 			: data.id,
					assembly_id 		: 0,
					measurement_id 		: data.measurement_id,
					description 		: data.sale_description,
					quantity 	 		: 1,
					conversion_ratio 	: 1,
					cost 				: wac[0].cost * rate,
					price 				: data.price,
					amount 				: data.price,
					discount 			: 0,
					discount_percentage : 0,
					tax 				: 0,
					rate				: rate,
					locale				: data.locale,
					movement 			: -1,
					reference_no  		: "",

					item 				: data,
					item_price 			: item_price,
					tax_item 			: { id:"", name:"" }
				});
			});
		},
		//Upload
		onSelect 			: function(e){
	        // Array with information about the uploaded files
	        var self = this, 
	        files = e.files,
	        obj = this.get("obj");

	        // Check the extension of each file and abort the upload if it is not .jpg
	        $.each(files, function(index, value){
	            if (value.extension.toLowerCase() === ".jpg"
	            	|| value.extension.toLowerCase() === ".jpeg"
	            	|| value.extension.toLowerCase() === ".tiff"
	            	|| value.extension.toLowerCase() === ".png" 
	            	|| value.extension.toLowerCase() === ".gif"
	            	|| value.extension.toLowerCase() === ".pdf"){

	            	var key = 'ATTACH_' + banhji.institute.id + "_" + Math.floor(Math.random() * 100000000000000001) +'_'+ value.name;

	            	self.attachmentDS.add({
	            		user_id 		: self.get("user_id"),
	            		transaction_id 	: obj.id,
	            		type 			: "Transaction",
	            		name 			: value.name,
	            		description 	: "",
	            		key 			: key,
	            		url 			: banhji.s3 + key,
	            		size 			: value.size,
	            		created_at 		: new Date(),

	            		file 			: value.rawFile
	            	});
	            }else{
	            	alert("This type of file is not allowed to attach.");
	            }
	        });
	    },
	    removeFile 			: function(e){
	    	var data = e.data;

	    	if (confirm(banhji.source.confirmMessage)) {
	    		this.attachmentDS.remove(data);
	    	}	    	
	    },
	    uploadFile 			: function(){
	    	$.each(this.attachmentDS.data(), function(index, value){
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

	        this.attachmentDS.sync();
	        var saved = false;
	        this.attachmentDS.bind("requestEnd", function(e){
	        	//Delete File
	        	if(e.type=="destroy"){
	            	if(saved==false && e.response){
	            		saved = true;

	            		var response = e.response.results;
	            		$.each(response, function(index, value){
		            		var params = {
							  	//Bucket: 'STRING_VALUE', /* required */
							 	Delete: { /* required */
								    Objects: [ /* required */
								      	{
									        Key: value.data.key /* required */
								      	}
								      /* more items */
								    ]
							  	}
							};
							bucket.deleteObjects(params, function(err, data) {
							  	//console.log(err, data);
							});
						});
	            	}
	        	}
	        });
	    },
		//Deposit
		loadDeposit 		: function(){
			var self = this, obj = this.get("obj");

			//Deposits on Edit Mode
			if(this.get("isEdit")){
				this.depositDS.filter([
					{ field:"type", value:"Customer_Deposit" },
					{ field:"reference_id", value:obj.id }
				]);
			}

			if(obj.contact_id>0){
		    	this.txnDS.query({
		    		filter:[
		    			{ field:"amount", operator:"select_sum", value:"amount" },
		    			{ field:"contact_id", value: obj.contact_id },
		    			{ field:"type", value: "Customer_Deposit" }
		    		]
		    	}).then(function(){
		    		var view = self.txnDS.view();

		    		self.set("total_deposit", view[0].amount + obj.deposit);
		    	});
	    	}
		},
		addDeposit 			: function(id){
			var obj = this.get("obj");
			
			this.depositDS.data([]);

			if(obj.deposit>0){
				this.depositDS.add({
					contact_id 			: obj.contact_id,
					reference_id 		: id,
					user_id 			: this.get("user_id"),
				   	type				: "Customer_Deposit",
				   	amount				: obj.deposit*-1,
				   	rate				: obj.rate,
				   	locale 				: obj.locale,
				   	issued_date 		: obj.issued_date
		    	});
			}
		},
		saveDeposit 		: function(id){
			var obj = this.get("obj");
			
    		if(this.get("isEdit")){
    			if(this.depositDS.total()>0){
					var deposit = this.depositDS.at(0);
					deposit.set("amount", obj.deposit*-1);
				}else{
					this.addDeposit(id);
				}
    		}else{
				this.addDeposit(id);
    		}

			this.depositDS.sync();
		},
		//Contact
		setContact 		: function(contact){
			var obj = this.get("obj");

		    obj.set("contact", contact);
		    this.contactChanges();
	    },
		contactChanges 		: function(){
			var self = this, obj = this.get("obj");

	    	if(obj.contact){
		    	var contact = obj.contact;
		    	
		    	obj.set("contact_id", contact.id);
		    	obj.set("discount_account_id", contact.trade_discount_id);
		    	obj.set("payment_method_id", contact.payment_method_id);
		    	obj.set("locale", contact.locale);
		    	obj.set("bill_to", contact.bill_to);
		    	obj.set("ship_to", contact.ship_to);

		    	this.loadData();
		    	this.jobDS.filter({ field:"contact_id", value: contact.id });
	    	}
	    	
		    this.changes();
	    },
	    employeeChanges 		: function(){
			var obj = this.get("obj");

	    	if(obj.employee){
		    	var employee = obj.employee;
		    	
		    	obj.set("employee_id", employee.id);
	    	}else{
	    		obj.set("employee_id", 0);
	    	}
	    },
	    loadBalance 		: function(){
			var self = this, obj = this.get("obj");

			this.balanceDS.query({
				filter:[
					{ field:"contact_id", value:obj.contact_id },
					{ field:"type", operator:"where_in", value:["Commercial_Invoice", "Vat_Invoice", "Invoice"] }
				]
		    }).then(function(){
		    	var view = self.balanceDS.view(),
		  			contact = obj.contact, 
					balance = view[0].amount,
					creditAllowed = 0;

		    	if(contact.credit_limit > balance){
					creditAllowed = contact.credit_limit - balance;
				}

		    	self.set("balance", kendo.toString(balance, "c", obj.locale));
		    	obj.set("credit_allowed", creditAllowed);
			});
		},
	    //Currency Rate
		setRate 			: function(){
			var obj = this.get("obj"), 
			rate = banhji.source.getRate(obj.locale, new Date(obj.issued_date));
			
			obj.set("rate", rate);

			//Item Lines
			$.each(this.lineDS.data(), function(index, value){
				var itemRate = rate / banhji.source.getRate(value.locale, new Date(obj.issued_date));
				value.set("rate", itemRate);
			});

			//Assembly Lines
			$.each(this.assemblyLineDS.data(), function(index, value){
				var itemRate = rate / banhji.source.getRate(value.locale, new Date(obj.issued_date));
				value.set("rate", itemRate);
			});

			//Deposit
			$.each(this.depositDS.data(), function(index, value){
				var itemRate = rate / banhji.source.getRate(value.locale, new Date(obj.issued_date));
				value.set("rate", itemRate);
			});
		},
		//Segment	
	    addSegmentItem 		: function(){
			var obj = this.get("obj"),
				notExisting = true,
				segment_id = this.get("segment_id"),
				segmentitem_id = this.get("segmentitem_id");

			if(segment_id && segmentitem_id){
				$.each(this.segmentItemDS.data(), function(index, value){
					if(value.segment_id==segment_id){
						notExisting = false;

						return false;
					}
				});

				if(notExisting){
					var segments = this.segmentDS.get(segment_id),
						segmentitems = this.segItemDS.get(segmentitem_id);

					this.segmentItemDS.add({
						id : segmentitems.id,
						segment_id: segment_id,
						code: segmentitems.code,
						name: segmentitems.name,
						segment: { id : segment_id, name : segments.name}
					});
				}else{
					$("#ntf1").data("kendoNotification").warning("This segment is already selected!");
				}
			}

			this.set("segment_id", ""),
			this.set("segmentitem_id", "");
		},
		//Item
		addItem 			: function(uid){
			var self = this,
				row = this.lineDS.getByUid(uid),
				obj = this.get("obj"),
				item = row.item,
				rate = obj.rate / banhji.source.getRate(item.locale, new Date(obj.issued_date));

			row.set("item_id", item.id);
			row.set("description", item.sale_description);
			row.set("rate", rate);
			row.set("locale", item.locale);

			//Item base price
			var item_price = { 
    			measurement_id 	: item.measurement_id,
    			price 			: kendo.parseFloat(item.price),
    			conversion_ratio: 1, 
    			measurement 	: item.measurement.name
    		};
    		row.set("item_price", item_price);

			//Get cost
			this.wacDS.query({
				filter:[
					{ field:"item_id", value: item.id },
					{ field:"issued_date <=", operator:"where_related_transaction", value: kendo.toString(new Date(obj.issued_date),"yyyy-MM-dd  HH:mm:ss") }
				]
			}).then(function(){
	        	var wac = self.wacDS.view();
	        	row.set("cost", wac[0].cost * rate);
			});
		},
		addItemCatalog 		: function(uid){
			var self = this,
				row = this.lineDS.getByUid(uid),
				obj = this.get("obj"),
				item = row.item;

			this.lineDS.remove(row);

        	$.each(item.catalogs, function(index, value){
				var catalogItem = banhji.source.itemDS.get(value);

				if(catalogItem){
					var rate = obj.rate / banhji.source.getRate(catalogItem.locale, new Date(obj.issued_date));

					self.lineDS.add({
						transaction_id 		: obj.id,
						tax_item_id 		: 0,
						item_id 			: catalogItem.id,
						measurement_id 		: 0,
						description 		: catalogItem.sale_description,
						quantity 	 		: 1,
						conversion_ratio 	: 1,
						cost 				: catalogItem.cost * rate,
						price 				: 0,
						amount 				: 0,
						discount 			: 0,
						rate				: rate,
						locale				: catalogItem.locale,
						movement 			: -1,

						discount_percentage : 0,
						item 				: catalogItem,
						measurement 		: { measurement_id:"", measurement:"" },
						tax_item 			: { id:"", name:"" }
					});
				}
			});
		},
		addItemAssembly 	: function(uid){
			var self = this,
				row = this.lineDS.getByUid(uid),
				obj = this.get("obj"),
				item = row.item,
				rate = obj.rate / banhji.source.getRate(item.locale, new Date(obj.issued_date));

			var notExist = true;
			$.each(this.assemblyLineDS.data(), function(index, value){
				if(value.assembly_id==item.id){
					notExist = false;

					return false;
				}
			});

			if(notExist){
				row.set("item_id", item.id);
	    		row.set("description", item.sale_description);
		        row.set("rate", rate);
		        row.set("locale", item.locale);

		        var measurement = { 
        			measurement_id 	: item.measurement_id,
        			price 			: kendo.parseFloat(item.price * rate),
        			conversion_ratio: 1, 
        			measurement 	: item.measurement.name 
        		};
        		row.set("measurement", measurement);

		        this.assemblyDS.query({
		        	filter:{ field:"assembly_id", value:row.item_id }
		        }).then(function(){
		        	var view = self.assemblyDS.view();

		        	$.each(view, function(index, value){
		        		var itemAssembly = value.item, 
		        			itemAssemblyRate = obj.rate / banhji.source.getRate(itemAssembly.locale, new Date(obj.issued_date));

						self.assemblyLineDS.add({
							transaction_id 		: obj.id,
							item_id 			: value.item_id,
							assembly_id 		: value.assembly_id,
							measurement_id 		: value.measurement_id,
							description 		: itemAssembly.sale_description,
							quantity 	 		: value.quantity,
							conversion_ratio 	: value.conversion_ratio,
							cost 				: value.cost,
							rate				: itemAssemblyRate,
							locale				: itemAssembly.locale,
							movement 			: -1,

							item 				: itemAssembly
						});
			        });
		        });
	    	}else{
	    		alert("Duplicate Item Assembly!");
	    		row.set("item_id", 0);
	    		row.set("item", { id:"", name:"" });
	    	}
		},
		changes				: function(){
			var self = this, obj = this.get("obj"),
				total = 0, subTotal = 0, discount =0, tax = 0, remaining = 0, amount_due = 0, itemIds = [];

			$.each(this.lineDS.data(), function(index, value) {
				var amt = value.quantity * value.price;
				subTotal += amt;

				//Discount by line
				if(value.discount>0){
					amt -= value.discount;
					discount += value.discount;
				}

				//Tax by line
				if(value.tax_item_id>0){
					var taxAmount = amt * value.tax_item.rate;
					tax += taxAmount;
					value.set("tax", taxAmount);
				}else{
					value.set("tax", 0);
				}

				value.set("amount", amt);

				if(value.item_id>0){
					itemIds.push(value.item_id);
				}
	        });

	    	//Total
	        total = (subTotal + tax) - discount;

	        //Apply Deposit
	        if(obj.deposit>0){
	        	if(obj.deposit <= this.get("total_deposit")){
		        	if(obj.deposit <= total){
		        		remaining = total - obj.deposit;
		        	}else{
		        		obj.set("deposit", total);
		        	}
		        }else{
		        	obj.set("deposit", 0);
	        		alert("Over deposit to apply!");
	        	}

	        	//Status
		        if(remaining==0){
		    		obj.set("status", 1);
		    	}else if(remaining==total){
		    		obj.set("status", 0);
		    	}else{
		    		obj.set("status", 2);
		    	}
	        }

	        //Warning over credit allowed
	        if(obj.credit_allowed>0 && total>obj.credit_allowed){
	        	this.set("amtDueColor", "Gold");
	        }else{
	        	this.set("amtDueColor", banhji.source.amtDueColor);
	        }

	        amount_due = total - obj.deposit;

	        obj.set("sub_total", subTotal);
	        obj.set("discount", discount);
	        obj.set("tax", tax);
			obj.set("amount", total);
			obj.set("remaining", remaining);

			this.set("total", kendo.toString(total, "c", obj.locale));
	        this.set("amount_due", kendo.toString(amount_due, "c", obj.locale));
	    	
	    	//Remove Assembly Item List
			var raw = this.assemblyLineDS.data();
		    var item, i;
		    for(i=raw.length-1; i>=0; i--){
		    	item = raw[i];

		    	if (jQuery.inArray(kendo.parseInt(item.assembly_id), itemIds)==-1) {
			       	this.assemblyLineDS.remove(item);
			    }
		    }
		},
		lineDSChanges 		: function(arg){
			var self = banhji.cashSale;

			if(arg.field){
				if(arg.field=="item"){
					var dataRow = arg.items[0],
						item = dataRow.item;

					if(item.is_catalog=="1"){
						self.addItemCatalog(dataRow.uid);
					}else if(item.is_assembly=="1"){
						self.addItemAssembly(dataRow.uid);
					}else{
						self.addItem(dataRow.uid);
					}

					self.addExtraRow(dataRow.uid);
				}else if(arg.field=="quantity" || arg.field=="price" || arg.field=="discount"){
					self.changes();
				}else if(arg.field=="item_price"){
					var dataRow = arg.items[0];
					
					dataRow.set("measurement_id", dataRow.item_price.measurement_id);
			        dataRow.set("price", dataRow.item_price.price * dataRow.rate);
			        dataRow.set("conversion_ratio", dataRow.item_price.conversion_ratio);
			    }else if(arg.field=="discount_percentage"){
			    	var dataRow = arg.items[0],
			    		percentageAmount = dataRow.quantity * dataRow.price * dataRow.discount_percentage;

			    	dataRow.set("discount", percentageAmount);
				}else if(arg.field=="tax_item"){
					var dataRow = arg.items[0];
					
					dataRow.set("tax_item_id", dataRow.tax_item.id);
					dataRow.set("tax", 0);

					self.changes();
				}
			}
		},
		typeChanges 		: function(){
			var obj = this.get("obj");

			$.each(this.txnTemplateDS.data(), function(index, value){
				if(value.type==obj.type){
					obj.set("transaction_template_id", value.id);

					return false;
				}
			});
		},
		//Number
		checkExistingNumber 	: function(){
			var self = this, para = [], 
			obj = this.get("obj");
			
			if(obj.number!==""){

				if(obj.isNew()==false){
					para.push({ field:"id", operator:"where_not_in", value: [obj.id] });
				}
				
				para.push({ field:"number", value: obj.number });
				para.push({ field:"type", value: obj.type });

				this.txnDS.query({
					filter: para,
					page: 1,
					pageSize: 1
				}).then(function(e){
					var view = self.txnDS.view();
					
					if(view.length>0){
				 		self.set("notDuplicateNumber", false);
					}else{
						self.set("notDuplicateNumber", true);
					}
				});
			}
		},
		generateNumber 		: function(){
			var self = this, obj = this.get("obj"),
				issueDate = new Date(obj.issued_date),
				startDate = new Date(obj.issued_date),
				endDate = new Date(obj.issued_date);

			this.set("notDuplicateNumber", true);

			startDate.setDate(1);
			startDate.setMonth(0);//Set to January
			endDate.setDate(31);
			endDate.setMonth(11);//Set to November

			this.numberDS.query({
				filter:[
					{ field:"type", value:obj.type },
					{ field:"issued_date >=", value:kendo.toString(startDate, "yyyy-MM-dd") },
					{ field:"issued_date <=", value:kendo.toString(endDate, "yyyy-MM-dd") }
				]
			}).then(function(){
				var view = self.numberDS.view(),
				number = 0, str = "";

				if(view.length>0){
					number = view[0].number.match(/\d+/g).map(Number);
				}

				number++;
				str = banhji.source.getPrefixAbbr(obj.type) + kendo.toString(issueDate, "yy") + kendo.toString(issueDate, "MM") + kendo.toString(number, "00000");
				
				obj.set("number", str);
			});
		},
		setStatus 			: function(){
			var self = this,
				obj = this.get("obj"), 
				statusObj = this.get("statusObj");

			statusObj.set("text", "");
	        statusObj.set("date", "");
	        statusObj.set("number", "");
	        statusObj.set("url", "");

			switch(obj.status) {
			    case 3:
			        statusObj.set("text", "return");
			        break;
			    case 4:
			        statusObj.set("text", "draft");
			        break;
			    default:
			        statusObj.set("text", "paid");
			}
		},
		//Obj
		loadObj 			: function(id){
			var self = this, para = [], referenceIds = [];

			para.push({ field:"id", value: id });

			if(this.get("recurring")=="use"){
				this.set("recurring","");
				this.addEmpty();
				this.loadRecurring(id);
			}else{
				if(this.get("recurring")=="edit"){
					this.set("recurring","");
					para.push({ field:"is_recurring", value: 1 });
				}

				this.dataSource.query({
					filter: para,
					page: 1,
					pageSize: 100
				}).then(function(e){
					var view = self.dataSource.view();

					self.set("obj", view[0]);
					self.set("total", kendo.toString(view[0].amount, "c2", view[0].locale));
			        self.set("amount_due", kendo.toString(view[0].amount - view[0].deposit, "c2", view[0].locale));					
					self.setStatus();
					self.loadDeposit();

					self.lineDS.query({
						filter: [
							{ field: "transaction_id", value: id },
							{ field: "assembly_id", value: 0 }
						]
					});

					self.assemblyLineDS.query({
						filter:[
							{ field: "transaction_id", value: id },
							{ field: "assembly_id >", value: 0 }
						]
					});

					self.journalLineDS.query({
						filter: { field: "transaction_id", value: id }
					});

					self.attachmentDS.filter({ field: "transaction_id", value: id });

					//Segment
					var segments = [];
					$.each(view[0].segments, function(index, value){
						segments.push(value);
					});
					self.segmentItemDS.filter({ field: "id", operator:"where_in", value: segments });

					self.loadReference();
				});
			}
		},
		addEmpty 		 	: function(){
			this.dataSource.data([]);
			this.lineDS.data([]);
			this.assemblyLineDS.data([]);
			this.depositDS.data([]);
			this.journalLineDS.data([]);
			this.attachmentDS.data([]);
			this.referenceDS.data([]);

			this.set("isEdit", false);
			this.set("obj", null);
			this.set("total", 0);
			this.set("total_deposit", 0);
			this.set("amount_due", 0);
			this.set("amtDueColor", banhji.source.amtDueColor);

			this.dataSource.insert(0, {
				transaction_template_id: 10,
				contact_id 			: "",//Customer
				payment_method_id	: 0,
				reference_id 		: "",
				recurring_id 		: "",
				account_id 			: 1,
				discount_account_id : 0,
				job_id 				: 0,
				user_id 			: this.get("user_id"),
				employee_id			: banhji.source.get("employee").id,//Sale Rep
			   	type				: "Commercial_Cash_Sale",//Required
			   	nature_type 		: "Cash_Sale",
			   	number 				: "",
			   	sub_total 			: 0,
			   	discount 			: 0,
			   	tax 				: 0,
			   	amount				: 0,
			   	deposit 			: 0,
			   	remaining 			: 0,
			   	credit_allowed 		: 0,
			   	credit 				: 0,
			   	check_no 			: "",
			   	rate				: 1,
			   	movement 			: 1,
			   	locale 				: banhji.locale,
			   	issued_date 		: new Date(),
			   	bill_to 			: "",
			   	ship_to 			: "",
			   	memo 				: "",
			   	memo2 				: "",
			   	status 				: 0,
			   	segments 			: [],
			   	is_journal 			: 1,
			   	//Recurring
			   	recurring_name 		: "",
			   	start_date 			: new Date(),
			   	frequency 			: "Daily",
			   	month_option 		: "Day",
			   	interval 			: 1,
			   	day 				: 1,
			   	week 				: 0,
			   	month 				: 0,
			   	is_recurring 		: 0,

			   	contact 			: { id:"", name:"" },
			   	references 			: []
	    	});
			
			var obj = this.dataSource.at(0);
			this.set("obj", obj);
			this.setRate();
			this.generateNumber();

			//Default rows
			for (var i = 0; i < banhji.source.defaultLines; i++) {
				this.addRow();
			}
		},
		addRow 				: function(){
			var obj = this.get("obj");

			this.lineDS.add({
				transaction_id 		: obj.id,
				tax_item_id 		: "",
				item_id 			: "",
				assembly_id 		: 0,
				measurement_id 		: 0,
				description 		: "",
				quantity 	 		: 1,
				conversion_ratio 	: 0,
				price 				: 0,
				amount 				: 0,
				discount 			: 0,
				rate				: obj.rate,
				locale				: obj.locale,
				movement 			: -1,
				reference_no  		: "",

				discount_percentage : 0,
				item 				: { id:"", name:"" },
				item_price 			: { measurement_id:"", measurement:"" },
				tax_item 			: { id:"", name:"" }
			});
		},
		addExtraRow 		: function(uid){
			var row = this.lineDS.getByUid(uid),
				index = this.lineDS.indexOf(row);

			if(index==this.lineDS.total()-1){
				this.addRow();
			}
		},
		removeRow 			: function(e){
			var data = e.data;
			if(this.lineDS.total()>1){
				this.lineDS.remove(data);
		        this.changes();
	        }
		},
		removeEmptyRow 		: function(){
			var raw = this.lineDS.data();
		    var item, i;
		    for(i=raw.length-1; i>=0; i--){
		    	item = raw[i];

		    	if (item.item_id==0) {
			       	this.lineDS.remove(item);
			    }
		    }
	    },
	    objSync 			: function(){
	    	var dfd = $.Deferred();	        

	    	this.dataSource.sync();
		    this.dataSource.bind("requestEnd", function(e){
		    	if(e.response){				
					dfd.resolve(e.response.results);
				}
		    });
		    this.dataSource.bind("error", function(e){
				dfd.reject(e.errorThrown);
		    });

		    return dfd;
	    },
		save 				: function(){
	    	var self = this, obj = this.get("obj"), segments = [];

	    	obj.set("issued_date", kendo.toString(new Date(obj.issued_date), "s"));
	    	obj.set("due_date", kendo.toString(new Date(obj.due_date), "yyyy-MM-dd"));

	    	//Warning over credit allowed
	        if(obj.credit_limit>0 && obj.amount>obj.credit_allowed){
	        	alert("Over credit allowed!");
	        }

	        this.removeEmptyRow();

	        //Segment
	        $.each(this.segmentItemDS.data(), function(index, value){
	        	segments.push(value.id);
	        });
	        obj.set("segments", segments);

	        //Save Draft
	        if(this.get("saveDraft")){
	        	obj.set("status", 4); //In progress
	        	obj.set("progress", "Draft");
	        	obj.set("is_journal", 0);//No Journal
	        }

	        //Recurring
	    	if(this.get("saveRecurring")){
	    		this.set("saveRecurring", false);
	    		
	    		obj.set("number", "");
	    		obj.set("is_recurring", 1);
	    	}

	        //Edit Mode
	    	if(obj.isNew()==false){
	    		//Use draft
	    		if(obj.status==4){
	    			obj.set("status", 0);//Open
	    			obj.set("progress", "");
	    			obj.set("is_journal", 1);//Add Journal
	    		}
	    	}
	    	
			//Save Obj
			this.objSync()
			.then(function(data){ //Success
				if(self.get("isEdit")==false){
					//Item line
					$.each(self.lineDS.data(), function(index, value){
						value.set("transaction_id", data[0].id);
					});

					//Assembly Item line
					$.each(self.assemblyLineDS.data(), function(index, value){
						value.set("transaction_id", data[0].id);
					});

					//Attachment
					$.each(self.attachmentDS.data(), function(index, value){
			    		value.set("transaction_id", data[0].id);
		            });
				}

				//Journal
				if(data[0].is_recurring==0 && data[0].is_journal==1){
		            self.addJournal(data[0].id);
		            self.saveDeposit(data[0].id);
	        	}

				self.lineDS.sync();
				self.assemblyLineDS.sync();
				self.uploadFile();
				
				return data;
			}, function(reason) { //Error
				$("#ntf1").data("kendoNotification").error(reason);
			}).then(function(result){
				$("#ntf1").data("kendoNotification").success(banhji.source.successMessage);

				if(self.get("saveDraft") || self.get("saveClose")){
					//Save Draft or Save Close
					self.set("saveDraft", false);
					self.set("saveClose", false);
					self.cancel();
				}else if(self.get("savePrint")){
					//Save Print
					self.set("savePrint", false);
					self.clear();
					if(result[0].transaction_template_id>0){
						banhji.router.navigate("/invoice_form/"+result[0].id);
					}
				}else{
					//Save New
					self.addEmpty();
				}
			});
		},
		clear 				: function(){
			this.dataSource.cancelChanges();
			this.lineDS.cancelChanges();
			this.assemblyLineDS.cancelChanges();
			this.segmentItemDS.cancelChanges();
			this.attachmentDS.cancelChanges();
			this.referenceDS.cancelChanges();
			
			this.dataSource.data([]);
			this.lineDS.data([]);
			this.assemblyLineDS.data([]);
			this.segmentItemDS.data([]);
			this.attachmentDS.data([]);
			this.referenceDS.data([]);

			banhji.userManagement.removeMultiTask("cash_sale");
		},
		cancel 				: function(){
			this.clear();
			window.history.back();
		},
		delete 				: function(){
			var self = this, obj = this.get("obj");
			this.set("showConfirm",false);

	        this.txnDS.query({
	        	filter:[
	        		{ field:"reference_id", value:obj.id }
	        	],
	        	page:1,
	        	pageSize:1
	        }).then(function(){
	        	var view = self.txnDS.view();

	        	if(view.length>0){
	        		alert("Sorry, you can not delete it.");
	        	}else{
	        		obj.set("deleted", 1);

			        self.dataSource.sync();
			        self.dataSource.bind("requestEnd", function(e){
			        	if(e.type==="update"){
			        		window.history.back();
			        	}
			        });
	        	}
	        });
		},
		openConfirm 		: function(){
			this.set("showConfirm", true);
		},
		closeConfirm 		: function(){
			this.set("showConfirm", false);
		},
		validating 			: function(){
			var result = true, nonItem = true;

			//Check select non item
			$.each(this.lineDS.data(), function(index, value){
				if(value.item_id>0){
					nonItem = false;
				}
			});
			
			if(nonItem){
				$("#ntf1").data("kendoNotification").error("Please select at least one item!");

				result = false;
			}

			return result;
		},
	    //Journal
	    addJournal 			: function(transaction_id){
	    	var self = this,
		    	obj = this.get("obj"),
		    	contact = obj.contact,
		    	raw = "", entries = {};

		    //Edit Mode
		    if(obj.isNew()==false){
		    	//Delete previous journal
			    $.each(this.journalLineDS.data(), function(index, value){
					value.set("deleted", 1);
				});
			}

			//Item lines
			$.each(this.lineDS.data(), function(index, value){
				var item = value.item;

				//COGS on Dr
				if(item.item_type_id==1){
					var cogsID = kendo.parseInt(item.expense_account_id);
					if(cogsID>0){
						raw = "dr"+cogsID;

						var cogsAmount = value.amount;
						if(item.item_type_id==1 || item.item_type_id==4){
							cogsAmount = (value.quantity*value.conversion_ratio)*value.cost;
						}

						if(entries[raw]===undefined){
							entries[raw] = {
								transaction_id 		: transaction_id,
								account_id 			: cogsID,
								contact_id 			: obj.contact_id,
								description 		: value.description,
								reference_no 		: "",
								segments 	 		: obj.segments,
								dr 	 				: cogsAmount * value.rate,
								cr 					: 0,
								rate				: value.rate,
								locale				: item.locale
							};
						}else{
							entries[raw].dr += cogsAmount;
						}
					}
				}

				//Inventory on Cr
				var inventoryID = kendo.parseInt(item.inventory_account_id);
				if(inventoryID>0){
					raw = "cr"+inventoryID;

					var inventoryAmount = value.amount;
					if(item.item_type_id==1 || item.item_type_id==4){
						inventoryAmount = (value.quantity*value.conversion_ratio)*value.cost;
					}
					
					if(entries[raw]===undefined){
						entries[raw] = {
							transaction_id 		: transaction_id,
							account_id 			: inventoryID,
							contact_id 			: obj.contact_id,
							description 		: value.description,
							reference_no 		: "",
							segments 	 		: obj.segments,
							dr 	 				: 0,
							cr 					: inventoryAmount * value.rate,
							rate				: value.rate,
							locale				: item.locale
						};
					}else{
						entries[raw].cr += inventoryAmount;
					}
				}

				//Sale on Cr
				var incomeID = kendo.parseInt(item.income_account_id);
				if(incomeID>0){
					raw = "cr"+incomeID;
					
					var saleAmount = value.quantity * value.price;
					if(entries[raw]===undefined){
						entries[raw] = {
							transaction_id 		: transaction_id,
							account_id 			: incomeID,
							contact_id 			: obj.contact_id,
							description 		: value.description,
							reference_no 		: "",
							segments 	 		: obj.segments,
							dr 	 				: 0,
							cr 					: saleAmount,
							rate				: obj.rate,
							locale				: obj.locale
						};
					}else{
						entries[raw].cr += saleAmount;
					}
				}

				//Tax on Cr
				if(value.tax_item_id>0){
					var taxItem = value.tax_item,
						raw = "cr"+taxItem.account_id;

					if(entries[raw]===undefined){
						entries[raw] = {
							transaction_id 		: transaction_id,
							account_id 			: taxItem.account_id,
							contact_id 			: obj.contact_id,
							description 		: value.description,
							reference_no 		: "",
							segments 	 		: obj.segments,
							dr 	 				: 0,
							cr 					: value.tax,
							rate				: obj.rate,
							locale				: obj.locale
						};
					}else{
						entries[raw].cr += value.tax;
					}
				}
			});

			//Assembly Item
			$.each(this.assemblyLineDS.data(), function(index, value){
				var item = value.item;

				//COGS on Dr
				if(item.item_type_id==1){
					var cogsID = kendo.parseInt(item.expense_account_id);
					if(cogsID>0){
						raw = "dr"+cogsID;
						
						var cogsAmount = value.amount;
						if(item.item_type_id==1 || item.item_type_id==4){
							cogsAmount = (value.quantity*value.conversion_ratio)*value.cost;
						}

						if(entries[raw]===undefined){
							entries[raw] = {
								transaction_id 		: transaction_id,
								account_id 			: cogsID,
								contact_id 			: obj.contact_id,
								description 		: value.description,
								reference_no 		: "",
								segments 	 		: obj.segments,
								dr 	 				: cogsAmount * value.rate,
								cr 					: 0,
								rate				: value.rate,
								locale				: item.locale
							};
						}else{
							entries[raw].dr += cogsAmount;
						}
					}
				}

				//Inventory on Cr
				var inventoryID = kendo.parseInt(item.inventory_account_id);
				if(inventoryID>0){
					raw = "cr"+inventoryID;

					var inventoryAmount = value.amount;
					if(item.item_type_id==1 || item.item_type_id==4){
						inventoryAmount = (value.quantity*value.conversion_ratio)*value.cost;
					}
					
					if(entries[raw]===undefined){
						entries[raw] = {
							transaction_id 		: transaction_id,
							account_id 			: inventoryID,
							contact_id 			: obj.contact_id,
							description 		: value.description,
							reference_no 		: "",
							segments 	 		: obj.segments,
							dr 	 				: 0,
							cr 					: inventoryAmount * value.rate,
							rate				: value.rate,
							locale				: item.locale
						};
					}else{
						entries[raw].cr += inventoryAmount;
					}
				}
			});

			//Obj Account, Cash on Dr
			var objAccountID = kendo.parseInt(obj.account_id);
			if(objAccountID>0){
				raw = "dr"+objAccountID;

				var objAmount = obj.amount - obj.deposit;
				if(entries[raw]===undefined){
					entries[raw] = {
						transaction_id 		: transaction_id,
						account_id 			: objAccountID,
						contact_id 			: obj.contact_id,
						description 		: obj.memo,
						reference_no 		: obj.reference_no,
						segments 	 		: obj.segments,
						dr 	 				: objAmount,
						cr 					: 0,
						rate				: obj.rate,
						locale				: obj.locale
					};
				}else{
					entries[raw].dr += objAmount;
				}
			}

			//Discount on Dr			
			if(obj.discount > 0){
				var discountAccountId = kendo.parseInt(obj.discount_account_id);
				if(discountAccountId>0){
					raw = "dr"+discountAccountId;

					if(entries[raw]===undefined){
						entries[raw] = {
							transaction_id 		: transaction_id,
							account_id 			: discountAccountId,
							contact_id 			: obj.contact_id,
							description 		: obj.memo,
							reference_no 		: obj.reference_no,
							segments 	 		: obj.segments,
							dr 	 				: obj.discount,
							cr 					: 0,
							rate				: obj.rate,
							locale				: obj.locale
						};
					}else{
						entries[raw].dr += obj.discount;
					}
				}
			}

			//Deposit on Dr
			if(obj.deposit > 0){
				var depositAccountId = kendo.parseInt(contact.deposit_account_id);
				if(depositAccountId>0){
					raw = "dr"+depositAccountId;

					if(entries[raw]===undefined){
						entries[raw] = {
							transaction_id 		: transaction_id,
							account_id 			: depositAccountId,
							contact_id 			: obj.contact_id,
							description 		: obj.memo,
							reference_no 		: obj.reference_no,
							segments 	 		: obj.segments,
							dr 	 				: obj.deposit,
							cr 					: 0,
							rate				: obj.rate,
							locale				: obj.locale
						};
					}else{
						entries[raw].dr += obj.deposit;
					}
				}
			}

			//Add to journal entry
			if(!jQuery.isEmptyObject(entries)){
				$.each(entries, function(index, value){
					self.journalLineDS.add(value);
				});
			}

			this.journalLineDS.sync();
		},
		//Reference
		loadReference 		: function(){
			var self = this, obj = this.get("obj");

			if(obj.contact_id>0){
				this.referenceDS.filter([
					{ field: "contact_id", value: obj.contact_id },
					{ field: "type", operator:"where_in", value:["Sale_Order", "Quote", "GDN"] },
					{ field: "status", value:0 },
					{ field: "reuse", operator:"or_where", value:1 },
					{ field: "due_date >=", value: kendo.toString(obj.issued_date, "yyyy-MM-dd") }
				]);
			}
		},
		referenceChanges 	: function(e){
			var self = this,
				isExisting = false,
				obj = this.get("obj"), 
				reference_id = this.get("reference_id");

			$.each(obj.references, function(index, value){
				if(value.id==reference_id){
					isExisting = true;

					return false;
				}
			});

			if(reference_id>0 && isExisting==false){
				var reference = this.referenceDS.get(reference_id),
					deposit = kendo.parseFloat(reference.deposit) + kendo.parseFloat(obj.deposit);

				obj.set("deposit", deposit);
				obj.references.push(reference);

			 	this.referenceLineDS.query({
			 		filter:[
			 			{ field:"transaction_id", value: reference_id },
						{ field: "assembly_id", value: 0 }
					]
			 	}).then(function(){
			 		var view = self.referenceLineDS.view();

			 		$.each(view, function(index, value){
			 			self.lineDS.insert(index, {
							transaction_id 		: obj.id,
							reference_id 		: reference.id,
							tax_item_id 		: value.tax_item_id,
							item_id 			: value.item_id,
							measurement_id 		: value.measurement_id,
							description 		: value.description,
							quantity 	 		: value.quantity,
							conversion_ratio 	: value.conversion_ratio,
							price 				: value.price,
							amount 				: value.amount,
							discount 			: value.discount,
							rate				: value.rate,
							locale				: value.locale,
							movement 			: -1,
							reference_no 		: reference.number,

							item 				: value.item,
							item_price 			: value.item_price,
							tax_item 			: value.tax_item
						});
			 		});

			 		self.changes();
			 	});
		 	}

		 	this.set("reference_id", 0);
		},
		referenceRemoveRow 	: function(e){
			var data = e.data,
				obj = this.get("obj"),
				index = obj.references.indexOf(data), 
				deposit = kendo.parseFloat(obj.deposit) - kendo.parseFloat(data.deposit);
			
			obj.set("deposit", deposit);

			obj.references.splice(index, 1);
		},
		//Recurring
		loadRecurring 		: function(id){
			var self = this;

			this.recurringDS.query({
				filter:[
					{ field:"id", value:id },
					{ field:"is_recurring", value:1 }
				],
				page: 1,
				pageSize: 100
			}).then(function(){
				var view = self.recurringDS.view(),
				obj = self.get("obj");
				
				obj.set("contact", view[0].contact);
				obj.set("contact_id", view[0].contact.id);
				obj.set("recurring_id", id);
				obj.set("payment_method_id", view[0].payment_method_id);
				obj.set("account_id", view[0].account_id);
				obj.set("employee_id", view[0].employee_id);//Sale Rep
				obj.set("job_id", view[0].job_id);
				obj.set("segments", view[0].segments);
				obj.set("locale", view[0].locale);
				obj.set("memo", view[0].memo);
				obj.set("memo2", view[0].memo2);
				obj.set("bill_to", view[0].bill_to);
				obj.set("ship_to", view[0].ship_to);

				// self.setContact(view[0].contact);
			});

			this.recurringLineDS.query({
				filter:[
					{ field: "transaction_id", value: id },
					{ field: "assembly_id", value: 0 }
				]
			}).then(function(){
				var view = self.recurringLineDS.view();
				self.lineDS.data([]);

				$.each(view, function(index, value){
					self.lineDS.add({
						transaction_id 		: 0,
						tax_item_id 		: value.tax_item_id,
						item_id 			: value.item_id,
						measurement_id 		: value.measurement_id,
						description 		: value.description,
						quantity 	 		: value.quantity,
						price 				: value.price,
						amount 				: value.amount,
						discount 			: value.discount,
						rate				: value.rate,
						locale				: value.locale,
						movement 			: -1,

						item 				: value.item,
						item_price 			: value.item_price,
						tax_item 			: value.tax_item
					});
				});

				self.changes();
			});
		},
		frequencyChanges 	: function(){
			var obj = this.get("obj");

			switch(obj.frequency) {
			    case "Daily":
			        this.set("showMonthOption", false);
			        this.set("showMonth", false);
			        this.set("showWeek", false);
			        this.set("showDay", false);
			       
			        break;
			    case "Weekly":
			        this.set("showMonthOption", false);
			        this.set("showMonth", false);
			        this.set("showWeek", true);
			        this.set("showDay", false);

			        break;
			    case "Monthly":
			        this.set("showMonthOption", true);
			        this.set("showMonth", false);
			        this.set("showWeek", false);
			        this.set("showDay", true);

			        break;
			    case "Annually":
			        this.set("showMonthOption", false);
			        this.set("showMonth", true);
			        this.set("showWeek", false);
			        this.set("showDay", true);

			        break;
			    default:
			        //Default here..
			}
		},
		monthOptionChanges 	: function(){
			var obj = this.get("obj");

			switch(obj.month_option) {
			    case "Day":
			        this.set("showWeek", false);
			        this.set("showDay", true);
			       
			        break;
			    default:
			        this.set("showWeek", true);
			        this.set("showDay", false);
			}
		},
		recurringSync 		: function(){
	    	var dfd = $.Deferred();

	    	this.recurringDS.sync();
		    this.recurringDS.bind("requestEnd", function(e){
		    	if(e.response){
					dfd.resolve(e.response.results);
				}
		    });
		    this.recurringDS.bind("error", function(e){
				dfd.reject(e.errorThrown);
		    });

		    return dfd;
	    }
	});
	banhji.saleRecurring = kendo.observable({
		lang 				: langVM,
		dataSource 			: dataStore(apiUrl + "transactions"),
		contactDS			: banhji.source.customerDS,
		contact_id 			: "",
		pageLoad 			: function(){
		},
		search 				: function(){
			var contact_id = this.get("contact_id");

			if(contact_id){
				this.dataSource.filter([
					{ field:"type", operator:"where_in", value:["Quote","Sale_Order"] },
					{ field:"contact_id", value: contact_id },
					{ field:"is_recurring", value: 1 }
				]);
			}

			this.set("contact_id", "");
		},
		edit 				: function(e){
			var data = e.data;
			
			switch(data.type) {
			    case "Quote":
			        banhji.quote.set("recurring", "edit");
			        banhji.router.navigate('/quote/' + data.id);
			        break;
			    case "Sale_Order":
			        banhji.saleOrder.set("recurring", "edit");
			        banhji.router.navigate('/sale_order/' + data.id);

			        break;
			    case "Customer_Deposit":
			        banhji.customerDeposit.set("recurring", "edit");
			        banhji.router.navigate('/customer_deposit/' + data.id);

			        break;
			    default:
			        // default code block
			}
		},
		use 				: function(e){
			var data = e.data;
			
			switch(data.type) {
			    case "Quote":
			        banhji.quote.set("recurring", "use");
			        banhji.router.navigate('/quote/' + data.id);
			        break;
			    case "Sale_Order":
			        banhji.saleOrder.set("recurring", "use");
			        banhji.router.navigate('/sale_order/' + data.id);
			        break;
			    case "Customer_Deposit":
			        banhji.customerDeposit.set("recurring", "use");
			        banhji.router.navigate('/customer_deposit/' + data.id);

			        break;
			    default:
			        // default code block
			}
		}
	});
	banhji.internalUsage = kendo.observable({
		lang                    : langVM,
		dataSource              : dataStore(apiUrl + "transactions"),
		lineDS                  : dataStore(apiUrl + "item_lines"),
		txnDS                   : dataStore(apiUrl + "transactions"),
		numberDS                : dataStore(apiUrl + "transactions/number"),
		accountLineDS           : dataStore(apiUrl + "account_lines"),
		toItemLineDS            : dataStore(apiUrl + "item_lines"),
		toAccountLineDS         : dataStore(apiUrl + "account_lines"),
		recurringDS             : dataStore(apiUrl + "transactions"),
		recurringLineDS         : dataStore(apiUrl + "item_lines"),
		recurringAccountLineDS  : dataStore(apiUrl + "account_lines"),
		journalLineDS           : dataStore(apiUrl + "journal_lines"),
		attachmentDS            : dataStore(apiUrl + "attachments"),
		itemPriceDS             : dataStore(apiUrl + "item_prices"),
		wacDS                   : dataStore(apiUrl + "items/weighted_average_costing"),
		txnTemplateDS           : new kendo.data.DataSource({
			data: banhji.source.txnTemplateList,
			filter:{
				logic: "or",
				filters: [
					{ field: "type", value: "Internal_Usage" },
					{ field: "type", value: "Transfer_In" },
					{ field: "type", value: "Transfer_Out" },
					{ field: "type", value: "Usage_Disposal" }
				]
			}
		}),
		jobDS                   : new kendo.data.DataSource({
			data: banhji.source.jobList,
			sort: { field: "name", dir: "asc" }
		}),
		segmentItemDS           : new kendo.data.DataSource({
			data: banhji.source.segmentItemList,
			sort: [
				{ field: "segment_id", dir: "asc" },
				{ field: "code", dir: "asc" }
			]
		}),
		amtDueColor             : banhji.source.amtDueColor,
		confirmMessage          : banhji.source.confirmMessage,
		frequencyList           : banhji.source.frequencyList,
		monthOptionList         : banhji.source.monthOptionList,
		monthList               : banhji.source.monthList,
		weekDayList             : banhji.source.weekDayList,
		dayList                 : banhji.source.dayList,
		showMonthOption         : false,
		showMonth               : false,
		showWeek                : false,
		showDay                 : false,
		obj                     : null,
		isEdit                  : false,
		saveDraft               : false,
		saveClose               : false,
		savePrint               : false,
		saveRecurring           : false,
		showConfirm             : false,
		notDuplicateNumber      : true,
		total                   : 0,
		totalFrom               : 0,
		totalTo                 : 0,
		different               : 0,
		user_id                 : banhji.source.user_id,
		pageLoad                : function(id){
			if(id){
				this.set("isEdit", true);
				this.loadObj(id);
			}else{
				if(this.get("isEdit") || this.dataSource.total()==0){
					this.addEmpty();
				}
			}
		},
		//Upload
		onSelect                : function(e){
			// Array with information about the uploaded files
			var self = this,
			files = e.files,
			obj = this.get("obj");

			// Check the extension of each file and abort the upload if it is not .jpg
			$.each(files, function(index, value){
				if (value.extension.toLowerCase() === ".jpg"
					|| value.extension.toLowerCase() === ".jpeg"
					|| value.extension.toLowerCase() === ".tiff"
					|| value.extension.toLowerCase() === ".png"
					|| value.extension.toLowerCase() === ".gif"
					|| value.extension.toLowerCase() === ".pdf"){

					var key = 'ATTACH_' + banhji.institute.id + "_" + Math.floor(Math.random() * 100000000000000001) +'_'+ value.name;

					self.attachmentDS.add({
						user_id         : self.get("user_id"),
						transaction_id  : obj.id,
						type            : "Transaction",
						name            : value.name,
						description     : "",
						key             : key,
						url             : banhji.s3 + key,
						size            : value.size,
						created_at      : new Date(),

						file            : value.rawFile
					});
				}else{
					alert("This type of file is not allowed to attach.");
				}
			});
		},
		removeFile              : function(e){
			var data = e.data;

			if (confirm(banhji.source.confirmMessage)) {
				this.attachmentDS.remove(data);
			}
		},
		uploadFile              : function(){
			$.each(this.attachmentDS.data(), function(index, value){
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

			this.attachmentDS.sync();
			var saved = false;
			this.attachmentDS.bind("requestEnd", function(e){
				//Delete File
				if(e.type=="destroy"){
					if(saved==false && e.response){
						saved = true;

						var response = e.response.results;
						$.each(response, function(index, value){
							var params = {
								//Bucket: 'STRING_VALUE', /* required */
								Delete: { /* required */
									Objects: [ /* required */
										{
											Key: value.data.key /* required */
										}
									  /* more items */
									]
								}
							};
							bucket.deleteObjects(params, function(err, data) {
								//console.log(err, data);
							});
						});
					}
				}
			});
		},
		//Currency Rate
		setRate                 : function(){
			var obj = this.get("obj"),
			rate = banhji.source.getRate(obj.locale, new Date(obj.issued_date));

			obj.set("rate", rate);

			//Item Lines
			$.each(this.lineDS.data(), function(index, value){
				var itemRate = rate / banhji.source.getRate(value.locale, new Date(obj.issued_date));
				value.set("rate", itemRate);
			});

			//Account Line
			$.each(this.accountLineDS.data(), function(index, value){
				value.set("rate", rate);
				value.set("locale", obj.locale);
			});

			//Item Lines To
			$.each(this.toItemLineDS.data(), function(index, value){
				var itemRate = rate / banhji.source.getRate(value.locale, new Date(obj.issued_date));
				value.set("rate", itemRate);
			});

			//Account Line To
			$.each(this.toAccountLineDS.data(), function(index, value){
				value.set("rate", rate);
				value.set("locale", obj.locale);
			});
		},
		//Segment
		segmentChanges          : function(e) {
			var dataArr = this.get("obj").segments,
			lastIndex = dataArr.length - 1,
			last = this.segmentItemDS.get(dataArr[lastIndex]);

			if(dataArr.length > 1) {
				for(var i = 0; i < dataArr.length - 1; i++) {
					var current_index = dataArr[i],
					current = this.segmentItemDS.get(current_index);

					if(current.segment_id === last.segment_id) {
						dataArr.splice(lastIndex, 1);
						break;
					}
				}
			}
		},
		//From Item
		addItem                 : function(uid){
			var self = this,
				row = this.lineDS.getByUid(uid),
				obj = this.get("obj"),
				item = row.item,
				rate = obj.rate / banhji.source.getRate(item.locale, new Date(obj.issued_date));

			row.set("item_id", item.id);
			row.set("description", item.sale_description);
			// row.set("cost", item.cost * rate);
			row.set("rate", rate);
			row.set("locale", item.locale);
			// row.set("measurement", item.measurement);

			//Get cost
			this.wacDS.query({
				filter:[
					{ field:"item_id", value: item.id },
					{ field:"issued_date <=", operator:"where_related_transaction", value: kendo.toString(new Date(obj.issued_date),"yyyy-MM-dd  HH:mm:ss") }
				]
			}).then(function(){
				var wac = self.wacDS.view();
				row.set("cost", wac[0].cost * rate);
			});

			//Get first price
			this.itemPriceDS.query({
				filter:[
					{ field:"item_id", value:item.id },
					{ field:"assembly_id", value:0 }
				],
				page: 1,
				pageSize: 1
			}).then(function(){
				var view = self.itemPriceDS.view();

				if(view.length>0){
					var measurement = {
						measurement_id  : view[0].measurement_id,
						price           : kendo.parseFloat(view[0].price),
						conversion_ratio: view[0].conversion_ratio,
						measurement     : view[0].measurement
					};
					row.set("measurement", measurement);
				}
			});

			self.changes();
		},
		addItemCatalog          : function(uid){
			var self = this,
				row = this.lineDS.getByUid(uid),
				obj = this.get("obj"),
				item = row.item;

			this.lineDS.remove(row);

			$.each(item.catalogs, function(index, value){
				var catalogItem = banhji.source.itemDS.get(value);

				if(catalogItem){
					var rate = obj.rate / banhji.source.getRate(catalogItem.locale, new Date(obj.issued_date));

					self.lineDS.add({
						transaction_id      : obj.id,
						tax_item_id         : 0,
						item_id             : catalogItem.id,
						measurement_id      : 0,
						description         : catalogItem.sale_description,
						quantity            : 1,
						conversion_ratio    : 1,
						cost                : 0,
						price               : 0,
						amount              : 0,
						discount            : 0,
						rate                : rate,
						locale              : catalogItem.locale,
						movement            : -1,

						item                : catalogItem,
						measurement         : { measurement_id:"", measurement:"" }
					});
				}
			});
		},
		addRow                  : function(){
			var obj = this.get("obj");

			this.lineDS.add({
				transaction_id      : obj.id,
				item_id             : "",
				measurement_id      : 0,
				description         : "",
				quantity            : 1,
				conversion_ratio    : 1,
				cost                : 0,
				price               : 0,
				amount              : 0,
				rate                : obj.rate,
				locale              : obj.locale,
				movement            : -1,
				reference_no        : "",

				item                : { id:"", name:"" },
				measurement         : { measurement_id:"", measurement:"" }
			});
		},
		addExtraRow             : function(uid){
			var row = this.lineDS.getByUid(uid),
				index = this.lineDS.indexOf(row);

			if(index==this.lineDS.total()-1){
				this.addRow();
			}
		},
		removeRow               : function(e){
			var data = e.data;
			if(this.lineDS.total()>1){
				this.lineDS.remove(data);
				this.changes();
			}
		},
		removeEmptyRow          : function(){
			var row, i;

			//Item
			var item = this.lineDS.data();
			for(i=item.length-1; i>=0; i--){
				row = item[i];

				if (row.item_id==0) {
					this.lineDS.remove(row);
				}
			}

			//Account
			var account = this.accountLineDS.data();
			for(i=account.length-1; i>=0; i--){
				row = account[i];

				if (row.account_id==0) {
					this.accountLineDS.remove(row);
				}
			}

			//Item To
			var itemTo = this.toItemLineDS.data();
			for(i=itemTo.length-1; i>=0; i--){
				row = itemTo[i];

				if (row.item_id==0) {
					this.toItemLineDS.remove(row);
				}
			}

			//Account To
			var accountTo = this.toAccountLineDS.data();
			for(i=accountTo.length-1; i>=0; i--){
				row = accountTo[i];

				if (row.account_id==0) {
					this.toAccountLineDS.remove(row);
				}
			}
		},
		itemLineDSChanges       : function(arg){
			var self = banhji.internalUsage;

			if(arg.field){
				if(arg.field=="item"){
					var dataRow = arg.items[0],
						item = dataRow.item;

					if(item.is_catalog=="1"){
						self.addItemCatalog(dataRow.uid);
					}else{
						self.addItem(dataRow.uid);
					}

					self.addExtraRow(dataRow.uid);
				}else if(arg.field=="quantity"){
					self.changes();
				}else if(arg.field=="measurement"){
					var dataRow = arg.items[0];

					dataRow.set("measurement_id", dataRow.measurement.measurement_id);
					dataRow.set("conversion_ratio", dataRow.measurement.conversion_ratio);
				}
			}
		},
		//From Account
		addRowAccount           : function(){
			var obj = this.get("obj");

			this.accountLineDS.add({
				transaction_id      : obj.id,
				account_id          : "",
				description         : "",
				amount              : 0,
				rate                : obj.rate,
				locale              : obj.locale,
				movement            : -1, //From Account

				account             : { id:"", name:"" }
			});
		},
		addExtraRowAccount      : function(uid){
			var row = this.accountLineDS.getByUid(uid),
				index = this.accountLineDS.indexOf(row);

			if(index==this.accountLineDS.total()-1){
				this.addRowAccount();
			}
		},
		removeRowAccount        : function(e){
			var d = e.data;

			this.accountLineDS.remove(d);
			this.changes();
		},
		accountLineDSChanges    : function(arg){
			var self = banhji.internalUsage;

			if(arg.field){
				if(arg.field=="account"){
					var dataRow = arg.items[0],
						account = dataRow.account;

					dataRow.set("account_id", account.id);

					self.addExtraRowAccount(dataRow.uid);
				}else if(arg.field=="amount"){
					self.changes();
				}
			}
		},
		//To Item
		addRowTo                : function(){
			var obj = this.get("obj");

			this.toItemLineDS.add({
				transaction_id      : obj.id,
				item_id             : "",
				measurement_id      : 0,
				description         : "",
				quantity            : 1,
				conversion_ratio    : 1,
				cost                : 0,
				price               : 0,
				amount              : 0,
				rate                : obj.rate,
				locale              : obj.locale,
				movement            : 1,
				reference_no        : "",

				item                : { id:"", name:"" },
				measurement         : { measurement_id:"", measurement:"" }
			});

			this.changes();
		},
		addExtraRowTo           : function(uid){
			var row = this.toItemLineDS.getByUid(uid),
				index = this.toItemLineDS.indexOf(row);

			if(index==this.toItemLineDS.total()-1){
				this.addRowTo();
			}
		},
		removeRowTo             : function(e){
			var data = e.data;

			this.toItemLineDS.remove(data);
			this.changes();
		},
		addItemTo               : function(uid){
			var self = this,
				row = this.toItemLineDS.getByUid(uid),
				obj = this.get("obj"),
				item = row.item,
				rate = obj.rate / banhji.source.getRate(item.locale, new Date(obj.issued_date));

			row.set("item_id", item.id);
			row.set("description", item.sale_description);
			// row.set("cost", item.cost * rate);
			row.set("rate", rate);
			row.set("locale", item.locale);
			// row.set("measurement", item.measurement);

			//Get cost
			this.wacDS.query({
				filter:[
					{ field:"item_id", value: item.id },
					{ field:"issued_date <=", operator:"where_related_transaction", value: kendo.toString(new Date(obj.issued_date),"yyyy-MM-dd  HH:mm:ss") }
				]
			}).then(function(){
				var wac = self.wacDS.view();
				row.set("cost", wac[0].cost * rate);
			});

			//Get first price
			this.itemPriceDS.query({
				filter:[
					{ field:"item_id", value:item.id },
					{ field:"assembly_id", value:0 }
				],
				page: 1,
				pageSize: 1
			}).then(function(){
				var view = self.itemPriceDS.view();

				if(view.length>0){
					var measurement = {
						measurement_id  : view[0].measurement_id,
						price           : view[0].price * rate,
						conversion_ratio: view[0].conversion_ratio,
						measurement     : view[0].measurement
					};
					row.set("measurement", measurement);
				}
			});

			self.changes();
		},
		addItemCatalogTo        : function(uid){
			var self = this,
				row = this.toItemLineDS.getByUid(uid),
				obj = this.get("obj"),
				item = row.item;

			this.toItemLineDS.remove(row);

			$.each(item.catalogs, function(index, value){
				var catalogItem = banhji.source.itemDS.get(value);

				if(catalogItem){
					var rate = obj.rate / banhji.source.getRate(catalogItem.locale, new Date(obj.issued_date));

					self.lineDS.add({
						transaction_id      : obj.id,
						tax_item_id         : 0,
						item_id             : catalogItem.id,
						measurement_id      : 0,
						description         : catalogItem.sale_description,
						quantity            : 1,
						conversion_ratio    : 1,
						cost                : 0,
						price               : 0,
						amount              : 0,
						discount            : 0,
						rate                : rate,
						locale              : catalogItem.locale,
						movement            : 1,

						item                : catalogItem,
						measurement         : catalogItem.measurement
					});
				}
			});
		},
		toItemLineDSChanges     : function(arg){
			var self = banhji.internalUsage;

			if(arg.field){
				if(arg.field=="item"){
					var dataRow = arg.items[0],
						item = dataRow.item;

					if(item.is_catalog=="1"){
						self.addItemCatalogTo(dataRow.uid);
					}else{
						self.addItemTo(dataRow.uid);
					}

					self.addExtraRowTo(dataRow.uid);
				}else if(arg.field=="quantity" || arg.field=="cost"){
					self.changes();
				}else if(arg.field=="measurement"){
					var dataRow = arg.items[0];

					dataRow.set("measurement_id", dataRow.measurement.measurement_id);
					dataRow.set("conversion_ratio", dataRow.measurement.conversion_ratio);
				}
			}
		},
		//To Account
		addRowAccountTo             : function(){
			var obj = this.get("obj");
			this.toAccountLineDS.add({
				transaction_id      : obj.id,
				account_id          : "",
				description         : "",
				amount              : 0,
				rate                : obj.rate,
				locale              : obj.locale,
				movement            : 1, //To Account

				account             : { id:"", name:"" }
			});

			this.changes();
		},
		addExtraRowAccountTo        : function(uid){
			var row = this.toAccountLineDS.getByUid(uid),
				index = this.toAccountLineDS.indexOf(row);

			if(index==this.toAccountLineDS.total()-1){
				this.addRowAccountTo();
			}
		},
		removeRowAccountTo      : function(e){
			var data = e.data;

			this.toAccountLineDS.remove(data);
			this.changes();
		},
		toAccountLineDSChanges  : function(arg){
			var self = banhji.internalUsage;

			if(arg.field){
				if(arg.field=="account"){
					var dataRow = arg.items[0],
						account = dataRow.account;

					dataRow.set("account_id", account.id);

					self.addExtraRowAccountTo(dataRow.uid);
				}else if(arg.field=="amount"){
					self.changes();
				}
			}
		},
		//Number
		checkExistingNumber     : function(){
			var self = this, para = [],
			obj = this.get("obj");

			if(obj.number!==""){

				if(obj.isNew()==false){
					para.push({ field:"id", operator:"where_not_in", value: [obj.id] });
				}

				para.push({ field:"number", value: obj.number });
				para.push({ field:"type", value: obj.type });

				this.txnDS.query({
					filter: para,
					page: 1,
					pageSize: 1
				}).then(function(e){
					var view = self.txnDS.view();

					if(view.length>0){
						self.set("notDuplicateNumber", false);
					}else{
						self.set("notDuplicateNumber", true);
					}
				});
			}
		},
		generateNumber      : function(){
			var self = this, obj = this.get("obj"),
				issueDate = new Date(obj.issued_date),
				startDate = new Date(obj.issued_date),
				endDate = new Date(obj.issued_date);

			this.set("notDuplicateNumber", true);

			startDate.setDate(1);
			startDate.setMonth(0);//Set to January
			endDate.setDate(31);
			endDate.setMonth(11);//Set to November

			this.numberDS.query({
				filter:[
					{ field:"type", value:obj.type },
					{ field:"issued_date >=", value:kendo.toString(startDate, "yyyy-MM-dd") },
					{ field:"issued_date <=", value:kendo.toString(endDate, "yyyy-MM-dd") }
				]
			}).then(function(){
				var view = self.numberDS.view(),
				number = 0, str = "";

				if(view.length>0){
					number = view[0].number.match(/\d+/g).map(Number);
				}

				number++;
				str = banhji.source.getPrefixAbbr(obj.type) + kendo.toString(issueDate, "yy") + kendo.toString(issueDate, "MM") + kendo.toString(number, "00000");

				obj.set("number", str);
			});
		},
		//Obj
		loadObj                 : function(id){
			var self = this, para = [];

			para.push({ field:"id", value: id });

			if(this.get("recurring")=="use"){
				this.set("recurring","");
				this.addEmpty();
				this.loadRecurring(id);
			}else{
				if(this.get("recurring")=="edit"){
					this.set("recurring","");
					para.push({ field:"is_recurring", value: 1 });
				}

				this.dataSource.query({
					filter: para,
					page:1,
					pageSize:100
				}).then(function(e){
					var view = self.dataSource.view();

					self.set("obj", view[0]);
					self.set("totalFrom", kendo.toString(view[0].amount, "c2", view[0].locale));
					self.set("totalTo", kendo.toString(view[0].amount, "c2", view[0].locale));
					self.set("different", 0);

					self.journalLineDS.query({
						filter:{ field:"transaction_id", value: id }
					});

					//From
					self.lineDS.query({
						filter: [
							{ field: "transaction_id", value: id },
							{ field: "movement", value: -1 }
						]
					});
					self.accountLineDS.query({
						filter:[
							{ field:"transaction_id", value: id },
							{ field:"movement", value: -1 }
						]
					});

					//To
					self.toItemLineDS.query({
						filter:[
							{ field:"transaction_id", value: id },
							{ field:"movement", value: 1 }
						]
					});
					self.toAccountLineDS.query({
						filter:[
							{ field:"transaction_id", value: id },
							{ field:"movement", value: 1 }
						]
					});
				});
			}
		},
		changes                 : function() {
			var obj = this.get("obj"), sumFrom = 0, sumTo = 0;

			//From
			$.each(this.lineDS.data(), function(index, value){
				var fromItemAmount = value.quantity * value.cost;
				value.set("amount", fromItemAmount);
				sumFrom += fromItemAmount;
			});
			$.each(this.accountLineDS.data(), function(index, value){
				sumFrom += value.amount;
			});

			//To
			$.each(this.toItemLineDS.data(), function(index, value){
				var toItemAmount = value.quantity * value.cost;
				value.set("amount", toItemAmount);
				sumTo += toItemAmount;
			});
			$.each(this.toAccountLineDS.data(), function(index, value){
				sumTo += value.amount;
			});

			obj.set("amount", sumFrom);

			this.set("total", kendo.toString(sumFrom, "c2", obj.locale));
			this.set("totalFrom", sumFrom);
			this.set("totalTo", sumTo);
			this.set("different", Math.abs(sumFrom - sumTo));
		},
		addEmpty                : function(){
			this.dataSource.data([]);
			this.lineDS.data([]);
			this.accountLineDS.data([]);
			this.toItemLineDS.data([]);
			this.toAccountLineDS.data([]);
			this.journalLineDS.data([]);
			this.attachmentDS.data([]);

			this.set("isEdit", false);
			this.set("obj", null);
			this.set("total", 0);
			this.set("totalFrom", 0);
			this.set("totalTo", 0);
			this.set("different", 0);

			this.dataSource.insert(0, {
				transaction_template_id : 0,
				recurring_id        : "",
				item_id             : "",
				job_id              : 0,
				user_id             : this.get("user_id"),
				type                : "Internal_Usage",//Required
				number              : "",
				amount              : 0,
				rate                : 1,
				locale              : banhji.locale,
				issued_date         : new Date(),
				bill_to             : "",
				ship_to             : "",
				memo                : "",
				memo2               : "",
				status              : 0,
				segments            : [],
				is_journal          : 1,
				//Recurring
				recurring_name      : "",
				start_date          : new Date(),
				frequency           : "Daily",
				month_option        : "Day",
				interval            : 1,
				day                 : 1,
				week                : 0,
				month               : 0,
				is_recurring        : 0
			});

			var obj = this.dataSource.at(0);
			this.set("obj", obj);
			this.setRate();
			this.generateNumber();

			//Default rows
			for (var i = 0; i < banhji.source.defaultLines; i++) {
				this.addRow();
				this.addRowAccount();
				this.addRowTo();
				this.addRowAccountTo();
			}
		},
		objSync                 : function(){
			var dfd = $.Deferred();

			this.dataSource.sync();
			this.dataSource.bind("requestEnd", function(e){
				if(e.response){
					dfd.resolve(e.response.results);
				}
			});
			this.dataSource.bind("error", function(e){
				dfd.reject(e.errorThrown);
			});

			return dfd;
		},
		save                    : function(){
			var self = this, obj = this.get("obj");
			obj.set("issued_date", kendo.toString(new Date(obj.issued_date), "s"));

			this.removeEmptyRow();

			//Save Draft
			if(this.get("saveDraft")){
				obj.set("status", 4); //In progress
				obj.set("progress", "Draft");
				obj.set("is_journal", 0);//No Journal
			}

			//Recurring
			if(this.get("saveRecurring")){
				this.set("saveRecurring", false);

				obj.set("number", "");
				obj.set("is_recurring", 1);
			}

			//Edit Mode
			if(obj.isNew()==false){
				//Use draft
				if(obj.status==4){
					obj.set("status", 0);//Open
					obj.set("progress", "");
					obj.set("is_journal", 1);//Add Journal
				}
			}

			//Save Obj
			this.objSync()
			.then(function(data){ //Success
				if(self.get("isEdit")==false){
					//Item Line
					$.each(self.lineDS.data(), function(index, value){
						value.set("transaction_id", data[0].id);
					});

					//Account Line
					$.each(self.accountLineDS.data(), function(index, value){
						value.set("transaction_id", data[0].id);
					});

					//To Item Line
					$.each(self.toItemLineDS.data(), function(index, value){
						value.set("transaction_id", data[0].id);
					});

					//To Account Line
					$.each(self.toAccountLineDS.data(), function(index, value){
						value.set("transaction_id", data[0].id);
					});

					//Attachment
					$.each(self.attachmentDS.data(), function(index, value){
						value.set("transaction_id", data[0].id);
					});
				}

				//Journal
				if(data[0].is_recurring==0 && data[0].is_journal==1){
					self.addJournal(data[0].id);
				}

				self.lineDS.sync();
				self.accountLineDS.sync();
				self.toItemLineDS.sync();
				self.toAccountLineDS.sync();

				self.uploadFile();

				return data;
			}, function(reason) { //Error
				$("#ntf1").data("kendoNotification").error(reason);
			}).then(function(result){
				$("#ntf1").data("kendoNotification").success(banhji.source.successMessage);

				if(self.get("saveDraft") || self.get("saveClose")){
					//Save Draft or Save Close
					self.set("saveDraft", false);
					self.set("saveClose", false);
					self.cancel();
				}else if(self.get("savePrint")){
					//Save Print
					self.set("savePrint", false);
					self.cancel();

					if(result[0].transaction_template_id>0){
						banhji.router.navigate("/invoice_form/"+result[0].id);
					}
				}else{
					//Save New
					self.addEmpty();
				}
			});
		},
		clear                   : function(){
			this.dataSource.cancelChanges();
			this.lineDS.cancelChanges();
			this.accountLineDS.cancelChanges();
			this.toItemLineDS.cancelChanges();
			this.toAccountLineDS.cancelChanges();
			this.journalLineDS.cancelChanges();
			this.attachmentDS.cancelChanges();

			this.dataSource.data([]);
			this.lineDS.data([]);
			this.accountLineDS.data([]);
			this.toItemLineDS.data([]);
			this.toAccountLineDS.data([]);
			this.journalLineDS.data([]);
			this.attachmentDS.data([]);

			banhji.userManagement.removeMultiTask("internal_usage");
		},
		cancel                  : function(){
			this.clear();
			window.history.back();
		},
		validating              : function(){
			var result = true, obj = this.get("obj");

			if(this.get("totalFrom")!==this.get("totalTo")){
				$("#ntf1").data("kendoNotification").error("Total From must equal to Total To");

				result = false;
			}

			return result;
		},
		//Journal
		addJournal              : function(transaction_id){
			var self = this,
				obj = this.get("obj"),
				raw = "",
				entries = {};

			//Edit Mode
			if(obj.isNew()==false){
				//Delete previous journal
				$.each(this.journalLineDS.data(), function(index, value){
					value.set("deleted", 1);
				});
			}

			//To on Dr
			$.each(this.toItemLineDS.data(), function(index, value){
				var item = value.item,
					itemRate = banhji.source.getRate(item.locale, new Date(obj.issued_date));

				//Inventory on Dr
				var inventoryID = kendo.parseInt(item.inventory_account_id);
				if(inventoryID>0){
					raw = "dr"+inventoryID;

					if(entries[raw]===undefined){
						entries[raw] = {
							transaction_id      : transaction_id,
							account_id          : inventoryID,
							contact_id          : 0,
							description         : value.description,
							reference_no        : "",
							segments            : obj.segments,
							dr                  : value.amount,
							cr                  : 0,
							rate                : itemRate,
							locale              : item.locale
						};
					}else{
						entries[raw].dr += value.amount;
					}
				}
			});
			$.each(this.toAccountLineDS.data(), function(index, value){
				raw = "dr"+value.account_id;

				//Account on Dr
				if(entries[raw]===undefined){
					entries[raw] = {
						transaction_id      : transaction_id,
						account_id          : value.account_id,
						contact_id          : 0,
						description         : value.description,
						reference_no        : "",
						segments            : value.segments,
						dr                  : value.amount,
						cr                  : 0,
						rate                : obj.rate,
						locale              : obj.locale
					};
				}else{
					entries[raw].dr += value.amount;
				}
			});


			//From on Cr
			$.each(this.lineDS.data(), function(index, value){
				var item = value.item,
					itemRate = banhji.source.getRate(item.locale, new Date(obj.issued_date));

				//Inventory on Cr
				var inventoryID = kendo.parseInt(item.inventory_account_id);
				if(inventoryID>0){
					raw = "cr"+inventoryID;

					if(entries[raw]===undefined){
						entries[raw] = {
							transaction_id      : transaction_id,
							account_id          : inventoryID,
							contact_id          : 0,
							description         : value.description,
							reference_no        : "",
							segments            : obj.segments,
							dr                  : 0,
							cr                  : value.amount,
							rate                : itemRate,
							locale              : item.locale
						};
					}else{
						entries[raw].cr += value.amount;
					}
				}
			});
			$.each(this.accountLineDS.data(), function(index, value){
				raw = "cr"+value.account_id;

				//Account on Cr
				if(entries[raw]===undefined){
					entries[raw] = {
						transaction_id      : transaction_id,
						account_id          : value.account_id,
						contact_id          : 0,
						description         : value.description,
						reference_no        : "",
						segments            : value.segments,
						dr                  : 0,
						cr                  : value.amount,
						rate                : obj.rate,
						locale              : obj.locale
					};
				}else{
					entries[raw].cr += value.amount;
				}
			});

			//Add to journal entry
			if(!jQuery.isEmptyObject(entries)){
				$.each(entries, function(index, value){
					self.journalLineDS.add(value);
				});
			}

			this.journalLineDS.sync();
		},
		//Recurring
		loadRecurring           : function(id){
			var self = this;

			this.recurringDS.query({
				filter:[
					{ field:"id", value:id },
					{ field:"is_recurring", value:1 }
				],
				page: 1,
				pageSize: 100
			}).then(function(){
				var view = self.recurringDS.view(),
				obj = self.get("obj");

				obj.set("recurring_id", id);
				obj.set("employee_id", view[0].employee_id);//Employee
				obj.set("job_id", view[0].job_id);
				obj.set("segments", view[0].segments);
				obj.set("memo", view[0].memo);
				obj.set("memo2", view[0].memo2);
			});

			//Item Line
			this.recurringLineDS.query({
				filter: { field:"transaction_id", value:id }
			}).then(function(){
				var view = self.recurringLineDS.view();
				self.lineDS.data([]);
				self.toItemLineDS.data([]);

				$.each(view, function(index, value){
					if(value.movement==-1){//FROM
						self.lineDS.add({
							transaction_id      : 0,
							tax_item_id         : value.tax_item_id,
							item_id             : value.item_id,
							measurement_id      : value.measurement_id,
							description         : value.description,
							quantity            : value.quantity,
							cost                : value.cost,
							price               : value.price,
							amount              : value.amount,
							rate                : value.rate,
							locale              : value.locale,
							movement            : value.movement,

							item                : value.item,
							measurement         : value.measurement
						});
					}else{//TO
						self.toItemLineDS.add({
							transaction_id      : 0,
							tax_item_id         : value.tax_item_id,
							item_id             : value.item_id,
							measurement_id      : value.measurement_id,
							description         : value.description,
							quantity            : value.quantity,
							cost                : value.cost,
							price               : value.price,
							amount              : value.amount,
							rate                : value.rate,
							locale              : value.locale,
							movement            : value.movement,

							item                : value.item,
							measurement         : value.measurement
						});
					}
				});

				self.changes();
			});

			//Account Line
			this.recurringAccountLineDS.query({
				filter: { field:"transaction_id", value:id }
			}).then(function(){
				var view = self.recurringAccountLineDS.view();
				self.accountLineDS.data([]);
				self.toAccountLineDS.data([]);

				$.each(view, function(index, value){
					if(value.movement==-1){//FROM
						self.accountLineDS.add({
							transaction_id      : 0,
							account_id          : value.account_id,
							description         : value.description,
							amount              : value.amount,
							rate                : value.rate,
							locale              : value.locale,
							movement            : value.movement,

							account             : value.account
						});
					}else{//TO
						self.toAccountLineDS.add({
							transaction_id      : 0,
							account_id          : value.account_id,
							description         : value.description,
							amount              : value.amount,
							rate                : value.rate,
							locale              : value.locale,
							movement            : value.movement,

							account             : value.account
						});
					}
				});

				self.changes();
			});
		},
		frequencyChanges        : function(){
			var obj = this.get("obj");

			switch(obj.frequency) {
				case "Daily":
					this.set("showMonthOption", false);
					this.set("showMonth", false);
					this.set("showWeek", false);
					this.set("showDay", false);

					break;
				case "Weekly":
					this.set("showMonthOption", false);
					this.set("showMonth", false);
					this.set("showWeek", true);
					this.set("showDay", false);

					break;
				case "Monthly":
					this.set("showMonthOption", true);
					this.set("showMonth", false);
					this.set("showWeek", false);
					this.set("showDay", true);

					break;
				case "Annually":
					this.set("showMonthOption", false);
					this.set("showMonth", true);
					this.set("showWeek", false);
					this.set("showDay", true);

					break;
				default:
					//Default here..
			}
		},
		monthOptionChanges      : function(){
			var obj = this.get("obj");

			switch(obj.month_option) {
				case "Day":
					this.set("showWeek", false);
					this.set("showDay", true);

					break;
				default:
					this.set("showWeek", true);
					this.set("showDay", false);
			}
		},
		validateRecurring       : function(){
			var result = true, obj = this.get("obj");

			if(obj.recurring_name!==""){
				//Check existing name
				$.each(this.recurringDS.data(), function(index, value){
					if(value.recurring_name==obj.recurring_name){
						result = false;
						alert("This is name is taken.");

						return false;
					}
				});
			}
			else{
				result = false;
				alert("Recurring name is required.");
			}

			return result;
		}
	});
	banhji.sale = kendo.observable({
		lang 				: langVM,
		dataSource  		: dataStore(apiUrl + 'items'),
		txnDS  				: dataStore(apiUrl + 'item_lines'),
		quoteLineDS  		: banhji.quote.lineDS,
		soLineDS  			: banhji.saleOrder.lineDS,
		categoryDS 			: dataStore(apiUrl + 'categories'),
		obj 				: null,
		searchText 			: "",
		isFavorite 			: false,
		on_hand 			: 0,
		on_so 				: 0,
		on_po 				: 0,
		user_id 			: banhji.source.user_id,
		pageLoad 			: function(){
			if(this.categoryDS.total()==0){
				this.categoryDS.filter({ field:"item_type_id", operator:"where_in", value:[1,4] });
				this.search();
			}
		},
		search 				: function(){
			var para = [], searchText = this.get("searchText");

			if(searchText){
      			var textParts = searchText.replace(/([a-z]+)/i, "$1 ").split(/[^0-9a-z]+/ig);

      			para.push(
      				{ field: "abbr", value: textParts[0] },
      				{ field: "number", value: textParts[1] },
					{ field: "name", operator: "or_like", value: searchText }
      			);
      		}

      		if(this.get("isFavorite")){
      			para.push({ field:"favorite", value:true });
      			this.set("isFavorite", false);
      		}

			para.push({ field:"item_type_id", operator:"where_in", value:[1,4] });

			this.dataSource.query({
				filter: para,
				page:1,
				pageSize:100
			});
		},
		favorite 			: function(){
			this.set("isFavorite", true);
			this.search();
		},
		selectedType 		: function(e){
			var data = e.data;

			this.dataSource.query({
				filter: { field:"category_id", value:data.id },
				page:1,
				pageSize:100
			});
		},
		addQuote 			: function(e){
			var data = e.data, price = 0;

			if(data.item_prices.length>0){
				price = data.item_prices[0].price;
			}

			var isExisting = false;
			$.each(banhji.quote.lineDS.data(), function(index, value){
				if(value.item_id==data.id){
					isExisting = true;
					value.set("quantity", value.quantity+1);

					return false;
				}
			});

			if(isExisting==false){
				banhji.quote.lineDS.add({
					transaction_id 		: 0,
					tax_item_id 		: "",
					item_id 			: data.id,				
					measurement_id 		: 0,				
					description 		: data.sale_description,				
					quantity 	 		: 1,
					price 				: price,												
					amount 				: price,
					rate				: 1,
					locale				: banhji.locale,
					movement 			: -1,

					item_prices 		: data.item_prices
				});
			}			
		},
		addSO 				: function(e){
			var data = e.data, price = 0;

			if(data.item_prices.length>0){
				price = data.item_prices[0].price;
			}

			var isExisting = false;
			$.each(banhji.quote.lineDS.data(), function(index, value){
				if(value.item_id==data.id){
					isExisting = true;
					value.set("quantity", value.quantity+1);

					return false;
				}
			});

			if(isExisting==false){
				banhji.saleOrder.lineDS.add({
					transaction_id 		: 0,
					tax_item_id 		: "",
					item_id 			: data.id,				
					measurement_id 		: 0,				
					description 		: data.sale_description,				
					quantity 	 		: 1,
					price 				: price,												
					amount 				: price,
					rate				: 1,
					locale				: banhji.locale,
					movement 			: -1,

					item_prices 		: data.item_prices
				});
			}			
		},
		loadDetail			: function(e){
			var data = e.data;
			this.set("obj", data);
			this.loadData();
		},
		loadData 			: function(){
			var self = this, obj = this.get("obj"), on_so = 0, on_po = 0;

			this.txnDS.query({
				filter:[
					{ field:"item_id", value:obj.id },
					{ field:"type", operator:"where_related_transaction", value:"Purchase_Order" },
					{ field:"status", operator:"where_related_transaction", value:0 },
					{ field:"is_recurring", operator:"where_related_transaction", value:0 },
					{ field:"deleted", operator:"where_related_transaction", value:0 }
				],
				page:1,
				pageSize:1000
			}).then(function(){
				var view = self.txnDS.view();

				$.each(view, function(index, value){
					on_po += value.quantity;
				});

				self.set("on_po", on_po);
			});

			this.txnDS.query({
				filter:[
					{ field:"item_id", value:obj.id },
					{ field:"type", operator:"where_related_transaction", value:"Sale_Order" },
					{ field:"status", operator:"where_related_transaction", value:0 },
					{ field:"is_recurring", operator:"where_related_transaction", value:0 },
					{ field:"deleted", operator:"where_related_transaction", value:0 }
				],
				page:1,
				pageSize:1000
			}).then(function(){
				var view = self.txnDS.view();

				$.each(view, function(index, value){
					on_so += value.quantity;
				});
				
				self.set("on_so", on_so);
			});
		},
		prevItem 			: function(){
			var obj = this.get("obj"), 
			index = this.dataSource.indexOf(obj);

			index--;

	        if (index === -1) {
	        	
	           	index = this.dataSource.data().length - 1;
	        }

	        var data = this.dataSource.at(index);
			this.set("obj", data);
			this.loadData();
		},
		nextItem 			: function(){
			var obj = this.get("obj"), 
			index = this.dataSource.indexOf(obj);

			index++;

			if (index === this.dataSource.data().length) {
	           	index = 0;
	        }

	        var data = this.dataSource.at(index);
			this.set("obj", data);
			this.loadData();
		}
	});
	// SALE REPORTS
	banhji.quotationList =  kendo.observable({
		lang 				: langVM,
		dataSource 			: dataStore(apiUrl + "sales/transaction_list"),
		contactDS  			: banhji.source.customerDS,
		sortList			: banhji.source.sortList,
		sorter 				: "month",
		sdate 				: "",
		edate 				: "",
		obj 				: { contactIds: [] },
		company 			: banhji.institute,
		displayDate 		: "",
		orderCount 			: 0,
		totalAmount 		: 0,
		exArray 			: [],
		pageLoad 			: function(){
			this.search();
		},
		sorterChanges 		: function(){
	        var today = new Date(),
        	sdate = "",
        	edate = "",
        	sorter = this.get("sorter");
        	
			switch(sorter){
				case "today":								
					this.set("sdate", today);
					this.set("edate", "");
													  					
				  	break;
				case "week":			  	
					var first = today.getDate() - today.getDay(),
					last = first + 6;

					this.set("sdate", new Date(today.setDate(first)));
					this.set("edate", new Date(today.setDate(last)));						
					
				  	break;
				case "month":							  	
					this.set("sdate", new Date(today.getFullYear(), today.getMonth(), 1));
					this.set("edate", new Date(today.getFullYear(), today.getMonth() + 1, 0));

				  	break;
				case "year":				
				  	this.set("sdate", new Date(today.getFullYear(), 0, 1));
				  	this.set("edate", new Date(today.getFullYear(), 11, 31));

				  	break;
				default:
					this.set("sdate", "");
				  	this.set("edate", "");									  
			}
		},
		search				: function(){
			var self = this, para = [],
				obj = this.get("obj"),
				start = this.get("sdate"),
        		end = this.get("edate"),
        		displayDate = "";

        	para.push({ field:"type", value:"Quote" });

        	//Customer
            if(obj.contactIds.length>0){
            	var contactIds = [];
            	$.each(obj.contactIds, function(index, value){
            		contactIds.push(value);
            	});          	
	            para.push({ field:"contact_id", operator:"where_in", value:contactIds });
	        }
    	
        	//Dates
        	if(start && end){
        		start = new Date(start);
        		end = new Date(end);
        		displayDate = "From " + kendo.toString(start, "dd-MM-yyyy") + " To " + kendo.toString(end, "dd-MM-yyyy");
        		end.setDate(end.getDate()+1);

            	para.push({ field:"issued_date >=", value: kendo.toString(start, "yyyy-MM-dd") });
            	para.push({ field:"issued_date <", value: kendo.toString(end, "yyyy-MM-dd") });
            }else if(start){
            	start = new Date(start);
            	displayDate = "On " + kendo.toString(start, "dd-MM-yyyy");

            	para.push({ field:"issued_date", value: kendo.toString(start, "yyyy-MM-dd") });
            }else if(end){
            	end = new Date(end);
            	displayDate = "As Of " + kendo.toString(end, "dd-MM-yyyy");
        		end.setDate(end.getDate()+1);
        		
            	para.push({ field:"issued_date <", value: kendo.toString(end, "yyyy-MM-dd") });
            }else{
            	
            }
            this.set("displayDate", displayDate);

            this.dataSource.query({
            	filter:para
            }).then(function(){
            	var view = self.dataSource.view();

            	var amount = 0, orderCount = 0;
            	$.each(view, function(index, value){ 
            		$.each(value.line, function(ind, val){
            			orderCount++; 
	            		amount += val.amount;
	            	});
            	});
            	
            	self.set("orderCount", kendo.toString(orderCount, "n0"));
            	self.set("totalAmount", kendo.toString(amount, "c2", banhji.locale));
            });
            this.dataSource.bind("requestEnd", function(e){				
				if(e.type=="read"){
					var response = e.response, balanceCal = 0, balance= 0;
					self.exArray = [];

					self.exArray.push({
	            		cells: [
	            			{ value: self.company.name, textAlign: "center", colSpan: 5}
	            		]
	            	});
	            	self.exArray.push({
	            		cells: [
	            			{ value: "Sale Order List",bold: true, fontSize: 20, textAlign: "center", colSpan: 5 }
	            		]
	            	});
	            	if(self.displayDate){
		            	self.exArray.push({
		            		cells: [
		            			{ value: self.displayDate, textAlign: "center", colSpan: 5 }
		            		]
		            	});
		            }
	            	self.exArray.push({
	            		cells: [
	            			{ value: "", colSpan: 4 }
	            		]
	            	});
	            	self.exArray.push({ 
	            		cells: [
							{ value: "Number", background: "#496cad", color: "#ffffff" },
							{ value: "Reference", background: "#496cad", color: "#ffffff" },
							{ value: "Date", background: "#496cad", color: "#ffffff" },
							{ value: "Status", background: "#496cad", color: "#ffffff" },
							{ value: "Amount", background: "#496cad", color: "#ffffff" },
						]
					});
					for (var i = 0; i < response.results.length; i++){
						self.exArray.push({
					        cells: [
					          	{ value: response.results[i].name, bold: true, },
					            { value: "" },
					            { value: "" },
					            { value: "" },
					            { value: "" },
					        ]
					        
					    });
					    for(var j = 0; j < response.results[i].line.length; j++){
					    	var status = response.results[i].line[j].status
					    	if (status==0){
					    		status = "Open"
					    	}else{
					    		status = "Used"
					    	}
				          	self.exArray.push({
				          		cells: [
				          	  		{ value: response.results[i].line[j].number },
				              		{ value: response.results[i].line[j].number },
				              		{ value: response.results[i].line[j].issued_date},
				              		{ value: status },
				              		{ value: response.results[i].line[j].amount},
				            	]
				          	});
				        }
				    	self.exArray.push({
					        cells: [
					          	{ value: "", colSpan: 4 }
					        ]
					    });
					}
				}
			});
		},
		printGrid			: function() {
			var gridElement = $('#grid'),
		        printableContent = '',
		        win = window.open('', '', 'width=990, height=900'),
		        doc = win.document.open();
		    var htmlStart =
		            '<!DOCTYPE html>' +
		            '<html>' +
		            '<head>' +
		            '<meta charset="utf-8" />' +
		            '<title></title>' +
		            '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />'+
		            '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
		            '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/responsive.css">' +
		            '<link href="<?php echo base_url(); ?>assets/invoice/invoice.css" rel="stylesheet" />'+
		            '<link href="https://fonts.googleapis.com/css?family=Content:400,700" rel="stylesheet" type="text/css">' +
		            '<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">' +
		            '<style>' +
		            'html { font: 11pt sans-serif; }' +
		            '.k-grid { border-top-width: 0; }' +
		            '.k-grid, .k-grid-content { height: auto !important; }' +
		            '.k-grid-content { overflow: visible !important; }' +
		            'div.k-grid table { table-layout: auto; width: 100% !important; }' +
		            '.k-grid .k-grid-header th { border-top: 1px solid; }' +
		            '.k-grid-toolbar, .k-grid-pager > .k-link { display: none; }' +
		            '</style><style type="text/css" media="print"> @page { size: portrait; margin:1mm; }'+
		            	'.inv1 .main-color {' +
		            		
		            		'-webkit-print-color-adjust:exact; ' +
		            	'} ' +
		            	'.table.table-borderless.table-condensed  tr th { background-color: #1E4E78!important;' +
		            	'-webkit-print-color-adjust:exact; color:#fff!important;}' +
		            	'.table.table-borderless.table-condensed  tr th * { color: #fff!important; -webkit-print-color-adjust:exact;}' +
		            	'.inv1 .light-blue-td { ' +
		            		'background-color: #c6d9f1!important;' +
		            		'text-align: left;' +
		            		'padding-left: 5px;' +
		            		'-webkit-print-color-adjust:exact; ' +
		            	'}' +
		            	'.saleSummaryCustomer .table.table-borderless.table-condensed tr td { ' +
    						'background-color: #F2F2F2!important; -webkit-print-color-adjust:exact;' +
						'}'+
						'.saleSummaryCustomer .table.table-borderless.table-condensed tr:nth-child(2n+1) td { ' +
    						' background-color: #fff!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.journal_block1>.span2 *, .journal_block1>.span5 * {color: #fff!important;}' +
		            	'.journal_block1>.span2:first-child { ' +
    						'background-color: #bbbbbb!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.journal_block1>.span5:last-child {' +
							'background-color: #496cad!important; color: #fff!important; -webkit-print-color-adjust:exact; ' +
						'}' +
						'.journal_block1>.span5 {' +
							'background-color: #5cc7dd!important; color: #fff!important; -webkit-print-color-adjust:exact;' +
						'}' +
		            	'.saleSummaryCustomer .table.table-borderless.table-condensed tfoot .bg-total td {' +
		            		'background-color: #1C2633!important;' +
		            		'color: #fff!important; ' + 
		            		'-webkit-print-color-adjust:exact;' +
		            	'}' +
		            	'</style>' +
		            '</head>' +
		            '<body><div class="saleSummaryCustomer" style="padding: 0 10px;">';
		    var htmlEnd =
		            '</div></body>' +
		            '</html>';
		    
		    printableContent = $('#invFormContent').html();
		    doc.write(htmlStart + printableContent + htmlEnd);
		    doc.close();
		    setTimeout(function(){
		    	win.print();
		    	win.close();
		    },2000);
		},
		ExportExcel 		: function(){
	        var workbook = new kendo.ooxml.Workbook({
	          sheets: [
	            {
	              columns: [
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	              ],
	              title: "Sale Order List",
	              rows: this.exArray
	            }
	          ]
	        });
	        //save the file as Excel file with extension xlsx
	        kendo.saveAs({dataURI: workbook.toDataURL(), fileName: "saleOrderList.xlsx"});
		}
	});
	banhji.saleOrderList =  kendo.observable({
		lang 				: langVM,
		dataSource 			: dataStore(apiUrl + "sales/transaction_list"),
		contactDS  			: banhji.source.customerDS,
		sortList			: banhji.source.sortList,
		sorter 				: "month",
		sdate 				: "",
		edate 				: "",
		obj 				: { contactIds: [] },
		company 			: banhji.institute,
		displayDate 		: "",
		orderCount 			: 0,
		totalAmount 		: 0,
		exArray 			: [],
		pageLoad 			: function(){
			this.search();
		},
		sorterChanges 		: function(){
	        var today = new Date(),
        	sdate = "",
        	edate = "",
        	sorter = this.get("sorter");
        	
			switch(sorter){
				case "today":								
					this.set("sdate", today);
					this.set("edate", "");
													  					
				  	break;
				case "week":			  	
					var first = today.getDate() - today.getDay(),
					last = first + 6;

					this.set("sdate", new Date(today.setDate(first)));
					this.set("edate", new Date(today.setDate(last)));						
					
				  	break;
				case "month":							  	
					this.set("sdate", new Date(today.getFullYear(), today.getMonth(), 1));
					this.set("edate", new Date(today.getFullYear(), today.getMonth() + 1, 0));

				  	break;
				case "year":				
				  	this.set("sdate", new Date(today.getFullYear(), 0, 1));
				  	this.set("edate", new Date(today.getFullYear(), 11, 31));

				  	break;
				default:
					this.set("sdate", "");
				  	this.set("edate", "");									  
			}
		},
		search				: function(){
			var self = this, para = [],
				obj = this.get("obj"),
				start = this.get("sdate"),
        		end = this.get("edate"),
        		displayDate = "";

        	para.push({ field:"type", value:"Sale_Order" });

        	//Customer
            if(obj.contactIds.length>0){
            	var contactIds = [];
            	$.each(obj.contactIds, function(index, value){
            		contactIds.push(value);
            	});          	
	            para.push({ field:"contact_id", operator:"where_in", value:contactIds });
	        }
    	
        	//Dates
        	if(start && end){
        		start = new Date(start);
        		end = new Date(end);
        		displayDate = "From " + kendo.toString(start, "dd-MM-yyyy") + " To " + kendo.toString(end, "dd-MM-yyyy");
        		end.setDate(end.getDate()+1);

            	para.push({ field:"issued_date >=", value: kendo.toString(start, "yyyy-MM-dd") });
            	para.push({ field:"issued_date <", value: kendo.toString(end, "yyyy-MM-dd") });
            }else if(start){
            	start = new Date(start);
            	displayDate = "On " + kendo.toString(start, "dd-MM-yyyy");

            	para.push({ field:"issued_date", value: kendo.toString(start, "yyyy-MM-dd") });
            }else if(end){
            	end = new Date(end);
            	displayDate = "As Of " + kendo.toString(end, "dd-MM-yyyy");
        		end.setDate(end.getDate()+1);
        		
            	para.push({ field:"issued_date <", value: kendo.toString(end, "yyyy-MM-dd") });
            }else{
            	
            }
            this.set("displayDate", displayDate);

            this.dataSource.query({
            	filter:para
            }).then(function(){
            	var view = self.dataSource.view();

            	var amount = 0, orderCount = 0;
            	$.each(view, function(index, value){ 
            		$.each(value.line, function(ind, val){
            			orderCount++; 
	            		amount += val.amount;
	            	});
            	});
            	
            	self.set("orderCount", kendo.toString(orderCount, "n0"));
            	self.set("totalAmount", kendo.toString(amount, "c2", banhji.locale));
            });
            this.dataSource.bind("requestEnd", function(e){				
				if(e.type=="read"){
					var response = e.response, balanceCal = 0, balance= 0;
					self.exArray = [];

					self.exArray.push({
	            		cells: [
	            			{ value: self.company.name, textAlign: "center", colSpan: 5}
	            		]
	            	});
	            	self.exArray.push({
	            		cells: [
	            			{ value: "Sale Order List",bold: true, fontSize: 20, textAlign: "center", colSpan: 5 }
	            		]
	            	});
	            	if(self.displayDate){
		            	self.exArray.push({
		            		cells: [
		            			{ value: self.displayDate, textAlign: "center", colSpan: 5 }
		            		]
		            	});
		            }
	            	self.exArray.push({
	            		cells: [
	            			{ value: "", colSpan: 4 }
	            		]
	            	});
	            	self.exArray.push({ 
	            		cells: [
							{ value: "Number", background: "#496cad", color: "#ffffff" },
							{ value: "Reference", background: "#496cad", color: "#ffffff" },
							{ value: "Date", background: "#496cad", color: "#ffffff" },
							{ value: "Status", background: "#496cad", color: "#ffffff" },
							{ value: "Amount", background: "#496cad", color: "#ffffff" },
						]
					});
					for (var i = 0; i < response.results.length; i++){
						self.exArray.push({
					        cells: [
					          	{ value: response.results[i].name, bold: true, },
					            { value: "" },
					            { value: "" },
					            { value: "" },
					            { value: "" },
					        ]
					        
					    });
					    for(var j = 0; j < response.results[i].line.length; j++){
					    	var status = response.results[i].line[j].status
					    	if (status==0){
					    		status = "Open"
					    	}else{
					    		status = "Used"
					    	}
				          	self.exArray.push({
				          		cells: [
				          	  		{ value: response.results[i].line[j].number },
				              		{ value: response.results[i].line[j].number },
				              		{ value: response.results[i].line[j].issued_date},
				              		{ value: status },
				              		{ value: response.results[i].line[j].amount},
				            	]
				          	});
				        }
				    	self.exArray.push({
					        cells: [
					          	{ value: "", colSpan: 4 }
					        ]
					    });
					}
				}
			});
		},
		printGrid			: function() {
			var gridElement = $('#grid'),
		        printableContent = '',
		        win = window.open('', '', 'width=990, height=900'),
		        doc = win.document.open();
		    var htmlStart =
		            '<!DOCTYPE html>' +
		            '<html>' +
		            '<head>' +
		            '<meta charset="utf-8" />' +
		            '<title></title>' +
		            '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />'+
		            '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
		            '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/responsive.css">' +
		            '<link href="<?php echo base_url(); ?>assets/invoice/invoice.css" rel="stylesheet" />'+
		            '<link href="https://fonts.googleapis.com/css?family=Content:400,700" rel="stylesheet" type="text/css">' +
		            '<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">' +
		            '<style>' +
		            'html { font: 11pt sans-serif; }' +
		            '.k-grid { border-top-width: 0; }' +
		            '.k-grid, .k-grid-content { height: auto !important; }' +
		            '.k-grid-content { overflow: visible !important; }' +
		            'div.k-grid table { table-layout: auto; width: 100% !important; }' +
		            '.k-grid .k-grid-header th { border-top: 1px solid; }' +
		            '.k-grid-toolbar, .k-grid-pager > .k-link { display: none; }' +
		            '</style><style type="text/css" media="print"> @page { size: portrait; margin:1mm; }'+
		            	'.inv1 .main-color {' +
		            		
		            		'-webkit-print-color-adjust:exact; ' +
		            	'} ' +
		            	'.table.table-borderless.table-condensed  tr th { background-color: #1E4E78!important;' +
		            	'-webkit-print-color-adjust:exact; color:#fff!important;}' +
		            	'.table.table-borderless.table-condensed  tr th * { color: #fff!important; -webkit-print-color-adjust:exact;}' +
		            	'.inv1 .light-blue-td { ' +
		            		'background-color: #c6d9f1!important;' +
		            		'text-align: left;' +
		            		'padding-left: 5px;' +
		            		'-webkit-print-color-adjust:exact; ' +
		            	'}' +
		            	'.saleSummaryCustomer .table.table-borderless.table-condensed tr td { ' +
    						'background-color: #F2F2F2!important; -webkit-print-color-adjust:exact;' +
						'}'+
						'.saleSummaryCustomer .table.table-borderless.table-condensed tr:nth-child(2n+1) td { ' +
    						' background-color: #fff!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.journal_block1>.span2 *, .journal_block1>.span5 * {color: #fff!important;}' +
		            	'.journal_block1>.span2:first-child { ' +
    						'background-color: #bbbbbb!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.journal_block1>.span5:last-child {' +
							'background-color: #496cad!important; color: #fff!important; -webkit-print-color-adjust:exact; ' +
						'}' +
						'.journal_block1>.span5 {' +
							'background-color: #5cc7dd!important; color: #fff!important; -webkit-print-color-adjust:exact;' +
						'}' +
		            	'.saleSummaryCustomer .table.table-borderless.table-condensed tfoot .bg-total td {' +
		            		'background-color: #1C2633!important;' +
		            		'color: #fff!important; ' + 
		            		'-webkit-print-color-adjust:exact;' +
		            	'}' +
		            	'</style>' +
		            '</head>' +
		            '<body><div class="saleSummaryCustomer" style="padding: 0 10px;">';
		    var htmlEnd =
		            '</div></body>' +
		            '</html>';
		    
		    printableContent = $('#invFormContent').html();
		    doc.write(htmlStart + printableContent + htmlEnd);
		    doc.close();
		    setTimeout(function(){
		    	win.print();
		    	win.close();
		    },2000);
		},
		ExportExcel 		: function(){
	        var workbook = new kendo.ooxml.Workbook({
	          sheets: [
	            {
	              columns: [
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	              ],
	              title: "Sale Order List",
	              rows: this.exArray
	            }
	          ]
	        });
	        //save the file as Excel file with extension xlsx
	        kendo.saveAs({dataURI: workbook.toDataURL(), fileName: "saleOrderList.xlsx"});
		}
	});
	banhji.saleOrderByJobEngagment =  kendo.observable({
		lang 				: langVM,
		dataSource 			: dataStore(apiUrl + "sales/transaction_by_job_engagement"),
		contactDS  			: banhji.source.customerDS,
		sortList			: banhji.source.sortList,
		sorter 				: "month",
		sdate 				: "",
		edate 				: "",
		obj 				: { contactIds: [] },
		company 			: banhji.institute,
		displayDate 		: "",
		orderCount 			: 0,
		totalAmount 		: 0,
		exArray 			: [],
		pageLoad 			: function(){
			this.search();
		},
		sorterChanges 		: function(){
	        var today = new Date(),
        	sdate = "",
        	edate = "",
        	sorter = this.get("sorter");
        	
			switch(sorter){
				case "today":								
					this.set("sdate", today);
					this.set("edate", "");
													  					
				  	break;
				case "week":			  	
					var first = today.getDate() - today.getDay(),
					last = first + 6;

					this.set("sdate", new Date(today.setDate(first)));
					this.set("edate", new Date(today.setDate(last)));						
					
				  	break;
				case "month":							  	
					this.set("sdate", new Date(today.getFullYear(), today.getMonth(), 1));
					this.set("edate", new Date(today.getFullYear(), today.getMonth() + 1, 0));

				  	break;
				case "year":				
				  	this.set("sdate", new Date(today.getFullYear(), 0, 1));
				  	this.set("edate", new Date(today.getFullYear(), 11, 31));

				  	break;
				default:
					this.set("sdate", "");
				  	this.set("edate", "");									  
			}
		},
		search				: function(){
			var self = this, para = [],
				obj = this.get("obj"),
				start = this.get("sdate"),
        		end = this.get("edate"),
        		displayDate = "";

        	//Customer
            if(obj.contactIds.length>0){
            	var contactIds = [];
            	$.each(obj.contactIds, function(index, value){
            		contactIds.push(value);
            	});          	
	            para.push({ field:"contact_id", operator:"where_in", value:contactIds });
	        }
    	
        	//Dates
        	if(start && end){
        		start = new Date(start);
        		end = new Date(end);
        		displayDate = "From " + kendo.toString(start, "dd-MM-yyyy") + " To " + kendo.toString(end, "dd-MM-yyyy");
        		end.setDate(end.getDate()+1);

            	para.push({ field:"issued_date >=", value: kendo.toString(start, "yyyy-MM-dd") });
            	para.push({ field:"issued_date <", value: kendo.toString(end, "yyyy-MM-dd") });
            }else if(start){
            	start = new Date(start);
            	displayDate = "On " + kendo.toString(start, "dd-MM-yyyy");

            	para.push({ field:"issued_date", value: kendo.toString(start, "yyyy-MM-dd") });
            }else if(end){
            	end = new Date(end);
            	displayDate = "As Of " + kendo.toString(end, "dd-MM-yyyy");
        		end.setDate(end.getDate()+1);
        		
            	para.push({ field:"issued_date <", value: kendo.toString(end, "yyyy-MM-dd") });
            }else{
            	
            }
            this.set("displayDate", displayDate);

            para.push({ field:"type", value:"Sale_Order" });
            para.push({ field:"employee_id", value: banhji.source.get("employee").id });

            this.dataSource.query({
            	filter:para
            }).then(function(){
            	var view = self.dataSource.view();

            	var amount = 0;
            	$.each(view, function(index, value){ 
            		$.each(value.line, function(ind, val){
	            		amount += val.amount;
	            	});
            	});

            	self.set("total", kendo.toString(amount, "c2", banhji.locale));
            });
            this.dataSource.bind("requestEnd", function(e){				
				if(e.type=="read"){
					var response = e.response, balanceCal = 0, balance= 0;
					self.exArray = [];

					self.exArray.push({
	            		cells: [
	            			{ value: self.company.name, textAlign: "center", colSpan: 5}
	            		]
	            	});
	            	self.exArray.push({
	            		cells: [
	            			{ value: "Sale Order List",bold: true, fontSize: 20, textAlign: "center", colSpan: 5 }
	            		]
	            	});
	            	if(self.displayDate){
		            	self.exArray.push({
		            		cells: [
		            			{ value: self.displayDate, textAlign: "center", colSpan: 5 }
		            		]
		            	});
		            }
	            	self.exArray.push({
	            		cells: [
	            			{ value: "", colSpan: 4 }
	            		]
	            	});
	            	self.exArray.push({ 
	            		cells: [
							{ value: "Number", background: "#496cad", color: "#ffffff" },
							{ value: "Reference", background: "#496cad", color: "#ffffff" },
							{ value: "Date", background: "#496cad", color: "#ffffff" },
							{ value: "Status", background: "#496cad", color: "#ffffff" },
							{ value: "Amount", background: "#496cad", color: "#ffffff" },
						]
					});
					for (var i = 0; i < response.results.length; i++){
						self.exArray.push({
					        cells: [
					          	{ value: response.results[i].name, bold: true, },
					            { value: "" },
					            { value: "" },
					            { value: "" },
					            { value: "" },
					        ]
					        
					    });
					    for(var j = 0; j < response.results[i].line.length; j++){
					    	var status = response.results[i].line[j].status
					    	if (status==0){
					    		status = "Open"
					    	}else{
					    		status = "Used"
					    	}
				          	self.exArray.push({
				          		cells: [
				          	  		{ value: response.results[i].line[j].number },
				              		{ value: response.results[i].line[j].number },
				              		{ value: response.results[i].line[j].issued_date},
				              		{ value: status },
				              		{ value: response.results[i].line[j].amount},
				            	]
				          	});
				        }
				    	self.exArray.push({
					        cells: [
					          	{ value: "", colSpan: 4 }
					        ]
					    });
					}
				}
			});
		},
		printGrid			: function() {
			var gridElement = $('#grid'),
		        printableContent = '',
		        win = window.open('', '', 'width=990, height=900'),
		        doc = win.document.open();
		    var htmlStart =
		            '<!DOCTYPE html>' +
		            '<html>' +
		            '<head>' +
		            '<meta charset="utf-8" />' +
		            '<title></title>' +
		            '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />'+
		            '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
		            '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/responsive.css">' +
		            '<link href="<?php echo base_url(); ?>assets/invoice/invoice.css" rel="stylesheet" />'+
		            '<link href="https://fonts.googleapis.com/css?family=Content:400,700" rel="stylesheet" type="text/css">' +
		            '<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">' +
		            '<style>' +
		            'html { font: 11pt sans-serif; }' +
		            '.k-grid { border-top-width: 0; }' +
		            '.k-grid, .k-grid-content { height: auto !important; }' +
		            '.k-grid-content { overflow: visible !important; }' +
		            'div.k-grid table { table-layout: auto; width: 100% !important; }' +
		            '.k-grid .k-grid-header th { border-top: 1px solid; }' +
		            '.k-grid-toolbar, .k-grid-pager > .k-link { display: none; }' +
		            '</style><style type="text/css" media="print"> @page { size: portrait; margin:1mm; }'+
		            	'.inv1 .main-color {' +
		            		
		            		'-webkit-print-color-adjust:exact; ' +
		            	'} ' +
		            	'.table.table-borderless.table-condensed  tr th { background-color: #1E4E78!important;' +
		            	'-webkit-print-color-adjust:exact; color:#fff!important;}' +
		            	'.table.table-borderless.table-condensed  tr th * { color: #fff!important; -webkit-print-color-adjust:exact;}' +
		            	'.inv1 .light-blue-td { ' +
		            		'background-color: #c6d9f1!important;' +
		            		'text-align: left;' +
		            		'padding-left: 5px;' +
		            		'-webkit-print-color-adjust:exact; ' +
		            	'}' +
		            	'.saleSummaryCustomer .table.table-borderless.table-condensed tr td { ' +
    						'background-color: #F2F2F2!important; -webkit-print-color-adjust:exact;' +
						'}'+
						'.saleSummaryCustomer .table.table-borderless.table-condensed tr:nth-child(2n+1) td { ' +
    						' background-color: #fff!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.journal_block1>.span2 *, .journal_block1>.span5 * {color: #fff!important;}' +
		            	'.journal_block1>.span2:first-child { ' +
    						'background-color: #bbbbbb!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.journal_block1>.span5:last-child {' +
							'background-color: #496cad!important; color: #fff!important; -webkit-print-color-adjust:exact; ' +
						'}' +
						'.journal_block1>.span5 {' +
							'background-color: #5cc7dd!important; color: #fff!important; -webkit-print-color-adjust:exact;' +
						'}' +
		            	'.saleSummaryCustomer .table.table-borderless.table-condensed tfoot .bg-total td {' +
		            		'background-color: #1C2633!important;' +
		            		'color: #fff!important; ' + 
		            		'-webkit-print-color-adjust:exact;' +
		            	'}' +
		            	'</style>' +
		            '</head>' +
		            '<body><div class="saleSummaryCustomer" style="padding: 0 10px;">';
		    var htmlEnd =
		            '</div></body>' +
		            '</html>';
		    
		    printableContent = $('#invFormContent').html();
		    doc.write(htmlStart + printableContent + htmlEnd);
		    doc.close();
		    setTimeout(function(){
		    	win.print();
		    	win.close();
		    },2000);
		},
		ExportExcel 		: function(){
	        var workbook = new kendo.ooxml.Workbook({
	          sheets: [
	            {
	              columns: [
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	              ],
	              title: "Sale Order List",
	              rows: this.exArray
	            }
	          ]
	        });
	        //save the file as Excel file with extension xlsx
	        kendo.saveAs({dataURI: workbook.toDataURL(), fileName: "saleOrderList.xlsx"});
		}
	});
	
	// CUSTOMER REPORTS
	banhji.customerReportCenter = kendo.observable({
		lang 				: langVM,
		dataSource 			: dataStore(apiUrl + "customer_modules/dashboard"),
		graphDS 			: dataStore(apiUrl + "customer_modules/monthly_sale"),
		obj 				: {},
		pageLoad 			: function(){
			this.loadData();
		},
		setObj 				: function(){
			this.set("obj", {
				//Sale
				sale 			: 0,
				sale_customer 	: 0,
				sale_product 	: 0,
				sale_ordered 	: 0,
				//AR
				ar 				: 0,
				ar_open 		: 0,
				ar_customer 	: 0,
				ar_overdue 		: 0,
				collection_day 	: 0
			});
		},
		pageLoad 			: function(){
			var self = this, obj = this.get("obj");

			this.graphDS.read();

			this.dataSource.query({
				filter: []
			}).then(function(){
				var view = self.dataSource.view();

				obj.set("sale", kendo.toString(view[0].sale, banhji.locale=="km-KH"?"c0":"c2", banhji.locale));
				obj.set("sale_customer", kendo.toString(view[0].sale_customer, "n0"));
				obj.set("sale_product", kendo.toString(view[0].sale_product, "n0"));
				obj.set("sale_ordered", kendo.toString(view[0].sale_ordered, "n0"));

				obj.set("ar", kendo.toString(view[0].ar, banhji.locale=="km-KH"?"c0":"c2", banhji.locale));
				obj.set("ar_open", kendo.toString(view[0].ar_open, "n0"));
				obj.set("ar_customer", kendo.toString(view[0].ar_customer, "n0"));
				obj.set("ar_overdue", kendo.toString(view[0].ar_overdue, "n0"));

				obj.set("collection_day", kendo.toString(view[0].collection_day, "n0"));
			});
		}
	});
	banhji.customerBalance = kendo.observable({
		lang 					: langVM,
		dataSource 				: dataStore(apiUrl+"contact_reports/balance"),
		totalDS 				: dataStore(apiUrl+"contact_reports/balance_total"),
		contactTypeDS 			: new kendo.data.DataSource({
		  	data: banhji.source.contactTypeList,
		  	filter: { field:"parent_id", value: 1 }//Customer
		}),
		statusList 				: banhji.source.statusList,
		contact_type_id 		: null,
		status 					: null,
		date 					: new Date(),
		total 					: 0,
		pageLoad 				: function(){
		},
		search 					: function(){
			var self = this, para = [],
			status = this.get("status"),
			date = this.get("date"),
			contact_type_id = this.get("contact_type_id");

			if(status!==null){
				para.push({ field:"status", value: status });
			}

			if(date){
				para.push({ field:"issued_date", operator:"transaction_date", value: kendo.toString(date, "yyyy-MM-dd") });
			}

			if(contact_type_id){
				para.push({ field:"contact_type_id", value: contact_type_id });
			}

			this.dataSource.filter(para);
			this.totalDS.query({
				filter: para,
				page:1,
				pageSize:100
			}).then(function(){
				var view = self.totalDS.view();
				self.set("total", kendo.toString(view[0].total, "c0", banhji.locale));
			});
			this.set("status", null);
			this.set("contact_type_id", null);
		}
	});
	banhji.statement = kendo.observable({
		lang 				: langVM,
		dataSource 			: dataStore(apiUrl + "transactions/statement"),
		agingDS 			: dataStore(apiUrl + "transactions/statement_aging"),
		contactDS  			: banhji.source.customerDS,
		sortList			: banhji.source.sortList,
		sorter 				: "month",
		sdate 				: "",
		edate 				: "",
		company 			: banhji.institute,
		companyName 		: null,
		companyLogo 		: banhji.institute.logo.url,
		obj 				: null,
		displayDate 		: "",
		statusList 			: [
			{ "text": "All Transactions", "value": "all" },
			{ "text": "Open Invoices", "value": "open" }
        ],
        status 				: "open",
		exArray 			: [],
		exArrayA 			: [],
		pageLoad 			: function(){
		},
		getLogo   			: function() {
			banhji.companyDS.fetch(function(){
				if(banhji.companyDS.data().length > 0) {
					banhji.statement.set('companyLogo', banhji.companyDS.data()[0].logo);
				}
			});
		},
		sorterChanges 		: function(){
	        var today = new Date(),
        	sdate = "",
        	edate = "",
        	sorter = this.get("sorter");
        	
			switch(sorter){
				case "today":
					this.set("sdate", today);
					this.set("edate", "");

				  	break;
				case "week":
					var first = today.getDate() - today.getDay(),
					last = first + 6;

					this.set("sdate", new Date(today.setDate(first)));
					this.set("edate", new Date(today.setDate(last)));
					
				  	break;
				case "month":
					this.set("sdate", new Date(today.getFullYear(), today.getMonth(), 1));
					this.set("edate", new Date(today.getFullYear(), today.getMonth() + 1, 0));

				  	break;
				case "year":
				  	this.set("sdate", new Date(today.getFullYear(), 0, 1));
				  	this.set("edate", new Date(today.getFullYear(), 11, 31));

				  	break;
				default:
					this.set("sdate", "");
				  	this.set("edate", "");
			}
		},
		search				: function(){
			var self = this, para = [],
				obj = this.get("obj"),
				status = this.get("status"),
				start = this.get("sdate"),
        		end = this.get("edate"),
        		displayDate = "",
        		typeList = ["Commercial_Invoice", "Vat_Invoice", "Invoice", "Commercial_Cash_Sale", "Vat_Cash_Sale", "Cash_Sale", "Deposit", "Cash_Receipt", "Sale_Return", "Cash_Refund"];

        	this.set("haveEX", false);

        	if(obj){
        		para.push({ field:"contact_id", value: obj.id });

        		if(status=="open"){
        			para.push({ field:"status", operator:"where_in", value: [0,2] });
        			para.push({ field:"type",  operator:"where_in", value: ["Commercial_Invoice", "Vat_Invoice", "Invoice"] });
        		}else{
        			para.push({ field:"type",  operator:"where_in", value: typeList });
        		}
        	}
	        	//Dates
	        	if(start && end){
	        		start = new Date(start);
	        		end = new Date(end);
	        		displayDate = "From " + kendo.toString(start, "dd-MM-yyyy") + " To " + kendo.toString(end, "dd-MM-yyyy");
	        		end.setDate(end.getDate()+1);

	            	para.push({ field:"issued_date >=", value: kendo.toString(start, "yyyy-MM-dd") });
	            	para.push({ field:"issued_date <", value: kendo.toString(end, "yyyy-MM-dd") });
	            }else if(start){
	            	start = new Date(start);
	            	displayDate = "On " + kendo.toString(start, "dd-MM-yyyy");

	            	para.push({ field:"issued_date", value: kendo.toString(start, "yyyy-MM-dd") });
	            }else if(end){
	            	end = new Date(end);
	            	displayDate = "As Of " + kendo.toString(end, "dd-MM-yyyy");
	        		end.setDate(end.getDate()+1);

	            	para.push({ field:"issued_date <", value: kendo.toString(end, "yyyy-MM-dd") });
	            }else{}
	            this.set("displayDate", displayDate);

	            this.dataSource.query({
	            	filter:para,
	            	page: 1,
	            	pageSize : 50,
	            }).then(function(){
	            	var view = self.dataSource.view();

	            	var amount = 0, total = 0;
	            	$.each(view, function(index, value){ 
	            		amount += value.amount;
	            		total += value.total;
	            	});

	            	self.set("totalAmount", kendo.toString(amount, "c2", banhji.locale));
	            	self.set("totalDue", kendo.toString(total, "c2", banhji.locale));
	            });
	            this.dataSource.bind("requestEnd", function(e){				
				if(e.type=="read"){
					var response = e.response;
					var amount = 0, total = 0;
					self.exArray = [];

					self.exArray.push({
	            		cells: [
	            			{ value: self.company.name, textAlign: "center", colSpan: 7 }
	            		]
	            	});
	            	self.exArray.push({
	            		cells: [
	            			{ value: "Statement",bold: true, fontSize: 20, textAlign: "center", colSpan: 7 }
	            		]
	            	});
	            	if(self.displayDate){
		            	self.exArray.push({
		            		cells: [
		            			{ value: self.displayDate, textAlign: "center", colSpan: 7}
		            		]
		            	});
		            };
	            	self.exArray.push({
	            		cells: [
	            			{ value: "", colSpan: 7}
	            		]
	            	});
	            	self.exArray.push({
	            		cells: [
	            			{ value: "Number",bold: true, textAlign: "left", colSpan: 2 },
	            			{ value: self.obj.abbr + self.obj.number,bold: true,  colSpan: 5},
	            		]
	            	});
	            	self.exArray.push({
	            		cells: [
	            			{ value: "Name",bold: true, textAlign: "left", colSpan: 2 },
	            			{ value: self.obj.name,bold: true,  colSpan: 5},
	            		]
	            	});
	            	self.exArray.push({
	            		cells: [
	            			{ value: "Billed Address",bold: true, textAlign: "left", colSpan: 2 },
	            			{ value: self.obj.address,bold: true,  colSpan: 5},
	            		]
	            	});
	            	self.exArray.push({
	            		cells: [
	            			{ value: "Phone",bold: true, textAlign: "left", colSpan: 2 },
	            			{ value: self.obj.phone,bold: true,  colSpan: 5},
	            		]
	            	});
	            	self.exArray.push({
	            		cells: [
	            			{ value: "", colSpan: 7}
	            		]
	            	});
	            	self.exArray.push({ 
	            		cells: [
							{ value: "Date", background: "#496cad", color: "#ffffff" },
							{ value: "Type", background: "#496cad", color: "#ffffff" },
							{ value: "Reference", background: "#496cad", color: "#ffffff" },
							{ value: "Transaction", background: "#496cad", color: "#ffffff" },
							{ value: "Status", background: "#496cad", color: "#ffffff" },
							{ value: "Amount", background: "#496cad", color: "#ffffff" },
							{ value: "Balance", background: "#496cad", color: "#ffffff" },
						]
					});
	            	for (var i = 0; i < response.results.length; i++){
	            			var reference = "", ref = response.results[i];
							if (ref.type == "Commercial_Invoice" || ref.type == "Vat_Invoice" || ref.type == "Invoice"){
								if(ref.status== 0 || ref.status== 2){
									var date = new Date(), dueDates = new Date(ref.due_date).getTime(),overDue, toDay = new Date(date).getTime();
									if(dueDates < toDay) {
										status = "Over Due "+Math.floor((toDay - dueDates)/(1000*60*60*24))+"days";
									} else {
										status = Math.floor((dueDates - toDay)/(1000*60*60*24))+"days to pay";
									}
								} else if(ref.status== 1){
									status = "Paid";
								} else if (ref.status== 3){
									status = "Returned";
								}
							}
							for (var e=0; e<ref.reference_no.length; e++){
								reference += kendo.toString(ref.reference_no[e].number) + ', ';
							}
							amount += ref.amount;
							total += ref.total;
				          	self.exArray.push({
				          		cells: [
				          	  		{ value: kendo.toString(new Date(ref.issued_date), "d/M/yyyy" )},
				          	  		{ value: ref.type },
				          	  		{ value: reference},
				          	  		{ value: ref.number },
				          	  		{ value: status },
				          	  		{ value: ref.amount },
				          	  		{ value: ref.balance },
				            	]
				          	});
					}
					self.exArray.push({
	            		cells: [
	            			{ value: "Total",bold: true, textAlign: "left", colSpan: 5 },
	            			{ value: total,bold: true,  colSpan: 1 },
	            			{ value: amount,bold: true,  colSpan: 1 },
	            		]
	            	});		
				}
			}); 

	        
		},
		setContact 		: function(contact){
		    this.set("obj", contact);
		    this.search();
	    },
	    printGrid			: function() {
			var gridElement = $('#grid'),
		        printableContent = '',
		        win = window.open('', '', 'width=990, height=900'),
		        doc = win.document.open();
		    var htmlStart =
		            '<!DOCTYPE html>' +
		            '<html>' +
		            '<head>' +
		            '<meta charset="utf-8" />' +
		            '<title></title>' +
		            '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />'+
		            '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
		            '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/responsive.css">' +
		            '<link href="<?php echo base_url(); ?>assets/invoice/invoice.css" rel="stylesheet" />'+
		            '<link href="https://fonts.googleapis.com/css?family=Content:400,700" rel="stylesheet" type="text/css">' +
		            '<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">' +
		            '<style>' +
		            'html { font: 11pt sans-serif; }' +
		            '.k-grid { border-top-width: 0; }' +
		            '.k-grid, .k-grid-content { height: auto !important; }' +
		            '.k-grid-content { overflow: visible !important; }' +
		            'div.k-grid table { table-layout: auto; width: 100% !important; }' +
		            '.k-grid .k-grid-header th { border-top: 1px solid; }' +
		            '.k-grid-toolbar, .k-grid-pager > .k-link { display: none; }' +
		            '</style><style type="text/css" media="print"> @page { size: portrait; margin:1mm; }'+
		            	'.inv1 .main-color {' +
		            		'-webkit-print-color-adjust:exact; ' +
		            	'} ' +
		            	'.table.table-borderless.table-condensed  tr th { background-color: #1E4E78!important;' +
		            	'-webkit-print-color-adjust:exact; color:#fff!important;}' +
		            	'.inv1 .light-blue-td { ' +
		            		'background-color: #c6d9f1!important;' +
		            		'text-align: left;' +
		            		'padding-left: 5px;' +
		            		'-webkit-print-color-adjust:exact; ' +
		            	'}' +
		            	'.saleSummaryCustomer .table.table-borderless.table-condensed tr td { ' +
    						'background-color: #F2F2F2!important; -webkit-print-color-adjust:exact;' +
						'}'+
						'.saleSummaryCustomer .table.table-borderless.table-condensed tr:nth-child(2n+1) td { ' +
    						' background-color: #fff!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.journal_block>.span4 * {color: #fff!important;}' +
		            	'.journal_block>.span4:first-child { ' +
    						'background-color: #bbbbbb!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.journal_block>.span4:last-child {' +
							'background-color: #496cad!important; color: #fff!important; -webkit-print-color-adjust:exact; ' +
						'}' +
						'.journal_block>.span4 {' +
							'background-color: #5cc7dd!important; color: #fff!important; -webkit-print-color-adjust:exact;' +
						'}' +
		            	'.pcg .mid-header {' +
		            		'background-color: #dce6f2!important; ' +
		            		'-webkit-print-color-adjust:exact; ' +
		            	'}'+
		            	'.inv1 span.total-amount { ' +
		            		'color:#fff!important;' +
		            	'}</style>' +
		            '</head>' +
		            '<body><div class="saleSummaryCustomer" style="padding: 0 10px;">';
		    var htmlEnd =
		            '</div></body>' +
		            '</html>';

		    printableContent = $('#invFormContent1').html();
		    doc.write(htmlStart + printableContent + htmlEnd);
		    doc.close();
		    setTimeout(function(){
		    	win.print();
		    	win.close();
		    },2000);
		},
		haveEX 				: false,
		agingQuery 			: function(para){
			var self = this;
			this.agingDS.data([]);
			this.agingDS.filter(para);
            this.agingDS.bind("requestEnd", function(e){
				if(e.type=="read"){
					var responses = e.response.results[0];

					self.set("total", kendo.toString(responses.amount, "c", responses.locale));
					var response = e.response, totalAD = responses.amount;
					
					self.set("haveEX", true);
				}
			}); 
		},
		ExportExcel 		: function(){
	        var workbook = new kendo.ooxml.Workbook({
	          sheets: [
	            {
	              columns: [
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true }
	              ],
	              title: "Statement",
	              rows: this.exArray
	            }
	          ]
	        });
	        //save the file as Excel file with extension xlsx
	        kendo.saveAs({dataURI: workbook.toDataURL(), fileName: "statement.xlsx"});
		},
		savePDF: function() {
            var self = this,
                Win, pHeight, pWidth, ts;
            if (this.txnFormID == "45") {
                Win = window.open('', '', 'width=1050, height=900');
                pHeight = "215mm";
                pWidth = "297mm";
                var colorM = this.formColor;
                if (colorM == '#000000' || colorM == '#1f497d' || colorM == null) {
                    ts = 'color: #fff!important;';
                } else {
                    ts = 'color: #333;';
                }
                console.log(colorM);
                banhji.invoice.dataSource.sync();
                var gridElement = $('#grid'),
                    printableContent = '',
                    win = Win,
                    doc = win.document.open();
                var htmlStart =
                    '<!DOCTYPE html>' +
                    '<html>' +
                    '<head>' +
                    '<meta charset="utf-8" />' +
                    '<title></title>' +
                    '<link rel="stylesheet" href="<?php echo base_url(); ?>resources/js/kendoui/styles/kendo.bootstrap.min.css">' +
                    '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
                    '<link href="<?php echo base_url(); ?>assets/water/water.css" rel="stylesheet" />' +
                    '<link href="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/js/kendoui/styles/kendo.common.min.css" rel="stylesheet" />' +
                    '<link href="<?php echo base_url(); ?>assets/water/winvoice-print.css" rel="stylesheet" />' +
                    '<link href="<?php echo base_url(); ?>assets/invoice/invoice.css" rel="stylesheet" />' +
                    '<link href="<?php echo base_url(); ?>assets/responsive.css" rel="stylesheet" />' +
                    '<link href="https://fonts.googleapis.com/css?family=Preahvihear" rel="stylesheet" />' +
                    '<link href="https://fonts.googleapis.com/css?family=Content:400,700" rel="stylesheet" type="text/css">' +
                    '<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">' +
                    '<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Battambang&amp;subset=khmer" media="all">' +
                    '<style type="text/css" media="print">' +
                    '@page { size: portrait; margin:0.1cm;' +
                    'size: A4;' +
                    '} ' +
                    '* {font-weight: lighter!important;}' +
                    '@media print {' +
                    'html, body {' +
                    'max-width: ' + pWidth + ';' +
                    'max-height: ' + pHeight + ';' +
                    'min-width: ' + pWidth + ';' +
                    'min-height: ' + pHeight + ';' +
                    '}' +
                    '.main-color {' +
                    'background-color: ' + colorM + '!important; ' + ts +
                    '-webkit-print-color-adjust:exact; ' +
                    '} ' +
                    '}' +
                    '.main-color {' +
                    'background-color: ' + colorM + '!important; ' + ts +
                    '-webkit-print-color-adjust:exact; ' +
                    '} ' +
                    '.inv1 .light-blue-td { ' +
                    'background-color: #c6d9f1!important;' +
                    'text-align: left;' +
                    'padding-left: 5px;' +
                    '-webkit-print-color-adjust:exact; ' +
                    '}' +
                    '.logoP{ max-height 50px;max-width100px}' +
                    '.inv1 thead tr {' +
                    'background-color: rgb(242, 242, 242)!important;' +
                    '-webkit-print-color-adjust:exact; ' +
                    '}' +
                    '.pcg .mid-title div {}' +
                    '.pcg .mid-header {' +
                    'background-color: #dce6f2!important; ' +
                    '-webkit-print-color-adjust:exact; ' +
                    '}' +
                    '.winvoice-print table thead .darkbblue, .winvoice-print table tbody td.darkbblue { ' +
                    'background-color: #355176!important;' +
                    'color: #fff!important;' +
                    '-webkit-print-color-adjust:exact; ' +
                    '}' +
                    '.winvoice-print table td.greyy {' +
                    'background-color: #ccc!important;-webkit-print-color-adjust:exact;' +
                    '}' +
                    '.inv1 span.total-amount { ' +
                    'color:#fff!important;' +
                    '}</style>' +
                    '</head>' +
                    '<body style="background: #fff;"><div class="row-fluid" style="overflow: hidden"><div id="example" class="k-content" style="width: 1000px;overflow: hidden">';
                var htmlEnd =
                    '</div></div></body>' +
                    '</html>';
                printableContent = $('#invFormContent').html();
                endSide = $('#endSide').html();
                doc.write(htmlStart + printableContent + htmlEnd + endSide);
                doc.close();
                setTimeout(function() {
                    win.print();
                    //win.close();
                }, 2000);
            } else {
                Win = window.open('', '', 'width=1000, height=900');
                pHeight = "210mm";
                pWidth = "150mm";
                var colorM = this.formColor;
                if (colorM == '#000000' || colorM == '#1f497d' || colorM == null) {
                    ts = 'color: #fff!important;';
                } else {
                    ts = 'color: #333;';
                }
                console.log(colorM);
                banhji.invoice.dataSource.sync();
                var gridElement = $('#grid'),
                    printableContent = '',
                    win = Win,
                    doc = win.document.open();
                var htmlStart =
                    '<!DOCTYPE html>' +
                    '<html>' +
                    '<head>' +
                    '<meta charset="utf-8" />' +
                    '<title></title>' +
                    '<link rel="stylesheet" href="<?php echo base_url(); ?>resources/js/kendoui/styles/kendo.bootstrap.min.css">' +
                    '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
                    '<link href="<?php echo base_url(); ?>assets/water/water.css" rel="stylesheet" />' +
                    '<link href="<?php echo base_url(); ?>assets/water/winvoice-print.css" rel="stylesheet" />' +
                    '<link href="<?php echo base_url(); ?>resources/common/theme/css/style-default-menus-dark.css" rel="stylesheet" />' +
                    '<link href="https://fonts.googleapis.com/css?family=Content:400,700" rel="stylesheet" type="text/css">' +
                    '<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">' +
                    '<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Battambang&amp;subset=khmer" media="all">' +
                    '<style type="text/css" media="print">' +
                    '@page { size: portrait; margin:0.2cm;' +
                    'size: A5;' +
                    '} ' +
                    '@media print {' +
                    'html, body {' +
                    '}' +
                    '.main-color {' +
                    'background-color: ' + colorM + '!important; ' + ts +
                    '-webkit-print-color-adjust:exact; ' +
                    '} ' +
                    '}' +
                    '.main-color {' +
                    'background-color: ' + colorM + '!important; ' + ts +
                    '-webkit-print-color-adjust:exact; ' +
                    '} ' +
                    '.inv1 .light-blue-td { ' +
                    'background-color: #c6d9f1!important;' +
                    'text-align: left;' +
                    'padding-left: 5px;' +
                    '-webkit-print-color-adjust:exact; ' +
                    '}' +
                    '.logoP{ max-height 50px;max-width100px}' +
                    '.inv1 thead tr {' +
                    'background-color: rgb(242, 242, 242)!important;' +
                    '-webkit-print-color-adjust:exact; ' +
                    '}' +
                    '.pcg .mid-title div {}' +
                    '.pcg .mid-header {' +
                    'background-color: #dce6f2!important; ' +
                    '-webkit-print-color-adjust:exact; ' +
                    '}' +
                    '.winvoice-print table thead .darkbblue, .winvoice-print table tbody td.darkbblue { ' +
                    'background-color: #355176!important;' +
                    'color: #fff!important;' +
                    '-webkit-print-color-adjust:exact; ' +
                    '}' +
                    '.winvoice-print table td.greyy {' +
                    'background-color: #ccc!important;-webkit-print-color-adjust:exact;' +
                    '}' +
                    '.inv1 span.total-amount { ' +
                    'color:#fff!important;' +
                    '}</style>' +
                    '</head>' +
                    '<body style="background: #fff;"><div class="row-fluid" style="overflow: hidden; padding: 40px; width: 1000px"><div id="example" class="k-content">';
                var htmlEnd =               	 		
                    '</div></div></body>' +
                    '</html>';
                printableContent = $('#invFormContent').html();
                endSide = $('#endSide').html();
                doc.write(htmlStart + printableContent  + htmlEnd + endSide);
                doc.close();
                setTimeout(function() {
                    win.print();
                    //win.close();
                }, 2000);
            }
        },
	});	
	banhji.statementDetail =  kendo.observable({
		lang 				: langVM,
		dataSource 			: dataStore(apiUrl + "sales/statement"),
		contactDS  			: banhji.source.customerDS,
		sortList			: banhji.source.sortList,
		sorter 				: "month",
		sdate 				: "",
		edate 				: "",
		contact_id 			: "",
		obj 				: { contactIds: [] },
		company 			: banhji.institute,
		displayDate 		: "",
		totalAmount 		: 0,
		exArray 			: [],
		pageLoad 			: function(){

		},
		sorterChanges 		: function(){
	        var today = new Date(),
        	sdate = "",
        	edate = "",
        	sorter = this.get("sorter");

			switch(sorter){
				case "today":
					this.set("sdate", today);
					this.set("edate", "");

				  	break;
				case "week":
					var first = today.getDate() - today.getDay(),
					last = first + 6;

					this.set("sdate", new Date(today.setDate(first)));
					this.set("edate", new Date(today.setDate(last)));

				  	break;
				case "month":
					this.set("sdate", new Date(today.getFullYear(), today.getMonth(), 1));
					this.set("edate", new Date(today.getFullYear(), today.getMonth() + 1, 0));

				  	break;
				case "year":
				  	this.set("sdate", new Date(today.getFullYear(), 0, 1));
				  	this.set("edate", new Date(today.getFullYear(), 11, 31));

				  	break;
				default:
					this.set("sdate", "");
				  	this.set("edate", "");
			}
		},
		search				: function(){
			var self = this, para = [],
				contact_id = this.get("contact_id"),
				obj = this.get("obj"),
				start = this.get("sdate"),
        		end = this.get("edate"),
        		displayDate = "";

    		if(contact_id>0){
        		var contact = this.contactDS.get(contact_id);
        		this.set("obj", contact);

        		para.push({ field:"contact_id", value: contact_id });
	        	//Dates
	        	if(start && end){
	        		start = new Date(start);
	        		end = new Date(end);
	        		displayDate = "From " + kendo.toString(start, "dd-MM-yyyy") + " To " + kendo.toString(end, "dd-MM-yyyy");
	        		end.setDate(end.getDate()+1);

	            	para.push({ field:"issued_date >=", value: kendo.toString(start, "yyyy-MM-dd") });
	            	para.push({ field:"issued_date <", value: kendo.toString(end, "yyyy-MM-dd") });
	            }else if(start){
	            	start = new Date(start);
	            	displayDate = "On " + kendo.toString(start, "dd-MM-yyyy");

	            	para.push({ field:"issued_date", value: kendo.toString(start, "yyyy-MM-dd") });
	            }else if(end){
	            	end = new Date(end);
	            	displayDate = "As Of " + kendo.toString(end, "dd-MM-yyyy");
	        		end.setDate(end.getDate()+1);

	            	para.push({ field:"issued_date <", value: kendo.toString(end, "yyyy-MM-dd") });
	            }else{

	            }
	            this.set("displayDate", displayDate);

	            this.dataSource.query({
	            	filter:para,
	            	page: 1,
	            	pageSize : 50,
	            }).then(function(){
	            	var view = self.dataSource.view();

	            	var amount = 0;
	            	$.each(view, function(index, value){
	            		$.each(value.line, function(ind, val){
		            		amount += val.amount;
		            	});
	            	});

	            	self.set("totalAmount1", kendo.toString(amount, "c2", banhji.locale));
	            });
	            this.dataSource.bind("requestEnd", function(e){
					if(e.type=="read"){
						var response = e.response, balanceCal = 0, balance= 0;
						self.exArray = [];

						self.exArray.push({
		            		cells: [
		            			{ value: self.company.name, textAlign: "center", colSpan: 7}
		            		]
		            	});
		            	self.exArray.push({
		            		cells: [
		            			{ value: "STATEMENT",bold: true, fontSize: 20, textAlign: "center", colSpan: 7 }
		            		]
		            	});
		            	if(self.displayDate){
			            	self.exArray.push({
			            		cells: [
			            			{ value: self.displayDate, textAlign: "center", colSpan: 7 }
			            		]
			            	});
			            }
		            	self.exArray.push({
		            		cells: [
		            			{ value: "", colSpan: 4 }
		            		]
		            	});
		            	self.exArray.push({
		            		cells: [
								{ value: "Date", background: "#496cad", color: "#ffffff" },
								{ value: "Type", background: "#496cad", color: "#ffffff" },
								{ value: "Job", background: "#496cad", color: "#ffffff" },
								{ value: "Number", background: "#496cad", color: "#ffffff" },
								{ value: "Status", background: "#496cad", color: "#ffffff" },
								{ value: "Amount", background: "#496cad", color: "#ffffff" },
								{ value: "Balance", background: "#496cad", color: "#ffffff" },
							]
						});
						for (var i = 0; i < response.results.length; i++){
							self.exArray.push({
						        cells: [
						          	{ value: response.results[i].name, bold: true, },
						          	{ value: response.results[i].address, bold: true, colSpan: 3},
						          	{ value: response.results[i].phone, bold: true, colSpan: 2},
						          	{ value: response.results[i].balance_forward, bold: true, },

						        ]

						    });
						    balanceCal = response.results[i].balance_forward;
						    for(var j = 0; j < response.results[i].line.length; j++){
						    	var status = response.results[i].line[j].status, statusShow;
									if(status == 1) {
										statusShow = "Paid";
									} else if (status == 2){
										statusShow = "Partialy Paid";
									} else{
										statusShow = "Open";
									}
								var type = response.results[i].line[j].type;
								if (type == "Cash_Sale"){
									balanceCal += 0;
								}else{
									balanceCal += response.results[i].line[j].amount;
								}
					          	self.exArray.push({
					          		cells: [
					          	  		{ value: response.results[i].line[j].date },
					              		{ value: response.results[i].line[j].type },
					              		{ value: response.results[i].line[j].job},
					              		{ value: response.results[i].line[j].number},
					              		{ value: statusShow},
					              		{ value: response.results[i].line[j].amount},
					              		{ value: balanceCal },
					            	]
					          	});
					        }
					    	self.exArray.push({
						        cells: [
						          	{ value: "", colSpan: 4 }
						        ]
						    });
						}
					}
				});
			}
		},
		printGrid			: function() {
			var gridElement = $('#grid'),
		        printableContent = '',
		        win = window.open('', '', 'width=990, height=900'),
		        doc = win.document.open();
		    var htmlStart =
		            '<!DOCTYPE html>' +
		            '<html>' +
		            '<head>' +
		            '<meta charset="utf-8" />' +
		            '<title></title>' +
		            '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />'+
		            '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
		            '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/responsive.css">' +
		            '<link href="<?php echo base_url(); ?>assets/invoice/invoice.css" rel="stylesheet" />'+
		            '<link href="https://fonts.googleapis.com/css?family=Content:400,700" rel="stylesheet" type="text/css">' +
		            '<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">' +
		            '<style>' +
		            'html { font: 11pt sans-serif; }' +
		            '.k-grid { border-top-width: 0; }' +
		            '.k-grid, .k-grid-content { height: auto !important; }' +
		            '.k-grid-content { overflow: visible !important; }' +
		            'div.k-grid table { table-layout: auto; width: 100% !important; }' +
		            '.k-grid .k-grid-header th { border-top: 1px solid; }' +
		            '.k-grid-toolbar, .k-grid-pager > .k-link { display: none; }' +
		            '</style><style type="text/css" media="print"> @page { size: portrait; margin:1mm; }'+
		            	'.inv1 .main-color {' +

		            		'-webkit-print-color-adjust:exact; ' +
		            	'} ' +
		            	'.table.table-borderless.table-condensed  tr th { background-color: #1E4E78!important;' +
		            	'-webkit-print-color-adjust:exact; color:#fff!important;}' +
		            	'.table.table-borderless.table-condensed  tr th * { color: #fff!important; -webkit-print-color-adjust:exact;}' +
		            	'.inv1 .light-blue-td { ' +
		            		'background-color: #c6d9f1!important;' +
		            		'text-align: left;' +
		            		'padding-left: 5px;' +
		            		'-webkit-print-color-adjust:exact; ' +
		            	'}' +
		            	'.saleSummaryCustomer .table.table-borderless.table-condensed tr td { ' +
    						'background-color: #F2F2F2!important; -webkit-print-color-adjust:exact;' +
						'}'+
						'.saleSummaryCustomer .table.table-borderless.table-condensed tr:nth-child(2n+1) td { ' +
    						' background-color: #fff!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.journal_block1>.span2 *, .journal_block1>.span5 * {color: #fff!important;}' +
		            	'.journal_block1>.span2:first-child { ' +
    						'background-color: #bbbbbb!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.journal_block1>.span5:last-child {' +
							'background-color: #496cad!important; color: #fff!important; -webkit-print-color-adjust:exact; ' +
						'}' +
						'.journal_block1>.span5 {' +
							'background-color: #5cc7dd!important; color: #fff!important; -webkit-print-color-adjust:exact;' +
						'}' +
		            	'.saleSummaryCustomer .table.table-borderless.table-condensed tfoot .bg-total td {' +
		            		'background-color: #1C2633!important;' +
		            		'color: #fff!important; ' +
		            		'-webkit-print-color-adjust:exact;' +
		            	'}' +
		            	'</style>' +
		            '</head>' +
		            '<body><div class="saleSummaryCustomer" style="padding: 0 10px;">';
		    var htmlEnd =
		            '</div></body>' +
		            '</html>';

		    printableContent = $('#invFormContent').html();
		    doc.write(htmlStart + printableContent + htmlEnd);
		    doc.close();
		    setTimeout(function(){
		    	win.print();
		    	win.close();
		    },2000);
		},
		ExportExcel 		: function(){
	        var workbook = new kendo.ooxml.Workbook({
	          sheets: [
	            {
	              columns: [
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	              ],
	              title: "statement detail",
	              rows: this.exArray
	            }
	          ]
	        });
	        //save the file as Excel file with extension xlsx
	        kendo.saveAs({dataURI: workbook.toDataURL(), fileName: "statementDetail.xlsx"});
		}
	});
	banhji.stamentSummary = kendo.observable({
		lang 				: langVM,
		dataSource 		: dataStore(apiUrl + "sales/statement"),
		filterDB	 		: [
			{id: 'customer', name: 'Customer'},
			{id: 'segment', name: 'Segment'}
		],
		filteredBy          : "customer",
		sortDB 				: [
			{id: 'date', name: 'Date'}
		],
		search 	: function() {

			banhji.stamentSummary.dataSource.filter({
				logic: banhji.stamentSummary.get('filteredBy'),
				filters: [
					{field: "issued_date >=", value: kendo.toString(this.startDate, "yyyy-MM-dd")},
					{field: "issued_date <=", value: kendo.toString(this.endDate, "yyyy-MM-dd")}
				]
			});
		},
		filterChange  : function(e){
			banhji.stamentSummary.set("filteredBy", e.sender.dataSource.at(e.sender.selectedIndex-1).id);
		}
	});
	banhji.saleSummaryByCustomer =  kendo.observable({
		lang 				: langVM,
		dataSource 			: dataStore(apiUrl + "sales/sale_summary_by_customer"),
		contactDS  			: banhji.source.customerDS,
		sortList			: banhji.source.sortList,
		sorter 				: "month",
		sdate 				: "",
		edate 				: "",
		obj 				: { contactIds: [] },
		company 			: banhji.institute,
		displayDate 		: "",
		totalAmount 		: 0,
		exArray 			: [],
		pageLoad 			: function(){
			this.search();
		},
		sorterChanges 		: function(){
	        var today = new Date(),
        	sdate = "",
        	edate = "",
        	sorter = this.get("sorter");

			switch(sorter){
				case "today":
					this.set("sdate", today);
					this.set("edate", "");

				  	break;
				case "week":
					var first = today.getDate() - today.getDay(),
					last = first + 6;

					this.set("sdate", new Date(today.setDate(first)));
					this.set("edate", new Date(today.setDate(last)));

				  	break;
				case "month":
					this.set("sdate", new Date(today.getFullYear(), today.getMonth(), 1));
					this.set("edate", new Date(today.getFullYear(), today.getMonth() + 1, 0));

				  	break;
				case "year":
				  	this.set("sdate", new Date(today.getFullYear(), 0, 1));
				  	this.set("edate", new Date(today.getFullYear(), 11, 31));

				  	break;
				default:
					this.set("sdate", "");
				  	this.set("edate", "");
			}
		},
		search				: function(){
			var self = this, para = [],
				obj = this.get("obj"),
				start = this.get("sdate"),
        		end = this.get("edate"),
        		displayDate = "";

        	//Customer
            if(obj.contactIds.length>0){
            	var contactIds = [];
            	$.each(obj.contactIds, function(index, value){
            		contactIds.push(value);
            	});
	            para.push({ field:"contact_id", operator:"where_in", value:contactIds });
	        }

        	//Dates
        	if(start && end){
        		start = new Date(start);
        		end = new Date(end);
        		displayDate = "From " + kendo.toString(start, "dd-MM-yyyy") + " To " + kendo.toString(end, "dd-MM-yyyy");
        		end.setDate(end.getDate()+1);

            	para.push({ field:"issued_date >=", value: kendo.toString(start, "yyyy-MM-dd") });
            	para.push({ field:"issued_date <", value: kendo.toString(end, "yyyy-MM-dd") });
            }else if(start){
            	start = new Date(start);
            	displayDate = "On " + kendo.toString(start, "dd-MM-yyyy");

            	para.push({ field:"issued_date", value: kendo.toString(start, "yyyy-MM-dd") });
            }else if(end){
            	end = new Date(end);
            	displayDate = "As Of " + kendo.toString(end, "dd-MM-yyyy");
        		end.setDate(end.getDate()+1);

            	para.push({ field:"issued_date <", value: kendo.toString(end, "yyyy-MM-dd") });
            }else{

            }
            this.set("displayDate", displayDate);

            this.dataSource.query({
            	filter:para,
            	page: 1,
	           	pageSize: 100,
            }).then(function(){
            	var view = self.dataSource.view();

            	var amount = 0;
            	$.each(view, function(index, value){
            		amount += value.amount;
            	});

            	self.set("totalAmount", kendo.toString(amount, "c2", banhji.locale));
            });
            this.dataSource.bind("requestEnd", function(e){
				if(e.type=="read"){
					var response = e.response;
					self.exArray = [];

					self.exArray.push({
	            		cells: [
	            			{ value: self.company.name, textAlign: "center", colSpan: 4 }
	            		]
	            	});
	            	self.exArray.push({
	            		cells: [
	            			{ value: "Sale Summary by Customer",bold: true, fontSize: 20, textAlign: "center", colSpan: 4 }
	            		]
	            	});
	            	if(self.displayDate){
		            	self.exArray.push({
		            		cells: [
		            			{ value: self.displayDate, textAlign: "center", colSpan: 4 }
		            		]
		            	});
		            };
	            	self.exArray.push({
	            		cells: [
	            			{ value: "", colSpan: 4 }
	            		]
	            	});
	            	self.exArray.push({
	            		cells: [
							{ value: "Customer", background: "#496cad", color: "#ffffff" },
							{ value: "Number of Invoice", background: "#496cad", color: "#ffffff" },
							{ value: "Number of Cash Sale", background: "#496cad", color: "#ffffff" },
							{ value: "Total Sale", background: "#496cad", color: "#ffffff" },
						]
					});
	            	for (var i = 0; i < response.results.length; i++){
				          	self.exArray.push({
				          		cells: [
				          	  		{ value: response.results[i].name },
				          	  		{ value: response.results[i].invoice_count },
				          	  		{ value: response.results[i].cash_sale_count },
				              		{ value: kendo.parseFloat(response.results[i].amount)},
				            	]
				          	});
					    self.exArray.push({
					        cells: [
					          	{ value: "", colSpan: 7 }
					        ]
					    });
					}
				}
			});
		},
		printGrid			: function() {
			var gridElement = $('#grid'),
		        printableContent = '',
		        win = window.open('', '', 'width=990, height=900'),
		        doc = win.document.open();
		    var htmlStart =
		            '<!DOCTYPE html>' +
		            '<html>' +
		            '<head>' +
		            '<meta charset="utf-8" />' +
		            '<title></title>' +
		            '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />'+
		            '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
		            '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/responsive.css">' +
		            '<link href="<?php echo base_url(); ?>assets/invoice/invoice.css" rel="stylesheet" />'+
		            '<link href="https://fonts.googleapis.com/css?family=Content:400,700" rel="stylesheet" type="text/css">' +
		            '<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">' +
		            '<style>' +
		            'html { font: 11pt sans-serif; }' +
		            '.k-grid { border-top-width: 0; }' +
		            '.k-grid, .k-grid-content { height: auto !important; }' +
		            '.k-grid-content { overflow: visible !important; }' +
		            'div.k-grid table { table-layout: auto; width: 100% !important; }' +
		            '.k-grid .k-grid-header th { border-top: 1px solid; }' +
		            '.k-grid-toolbar, .k-grid-pager > .k-link { display: none; }' +
		            '</style><style type="text/css" media="print"> @page { size: portrait; margin:1mm; }'+
		            	'.inv1 .main-color {' +

		            		'-webkit-print-color-adjust:exact; ' +
		            	'} ' +
		            	'.table.table-borderless.table-condensed  tr th { background-color: #1E4E78!important;' +
		            	'-webkit-print-color-adjust:exact; color:#fff!important;}' +
		            	'.table.table-borderless.table-condensed  tr th * { color: #fff!important; -webkit-print-color-adjust:exact;}' +
		            	'.inv1 .light-blue-td { ' +
		            		'background-color: #c6d9f1!important;' +
		            		'text-align: left;' +
		            		'padding-left: 5px;' +
		            		'-webkit-print-color-adjust:exact; ' +
		            	'}' +
		            	'.saleSummaryCustomer .table.table-borderless.table-condensed tr td { ' +
    						'background-color: #F2F2F2!important; -webkit-print-color-adjust:exact;' +
						'}'+
						'.saleSummaryCustomer .table.table-borderless.table-condensed tr:nth-child(2n+1) td { ' +
    						' background-color: #fff!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.journal_block1>.span2 *, .journal_block1>.span5 * {color: #fff!important;}' +
		            	'.journal_block1>.span2:first-child { ' +
    						'background-color: #bbbbbb!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.journal_block1>.span5:last-child {' +
							'background-color: #496cad!important; color: #fff!important; -webkit-print-color-adjust:exact; ' +
						'}' +
						'.journal_block1>.span5 {' +
							'background-color: #5cc7dd!important; color: #fff!important; -webkit-print-color-adjust:exact;' +
						'}' +
		            	'.saleSummaryCustomer .table.table-borderless.table-condensed tfoot .bg-total td {' +
		            		'background-color: #1C2633!important;' +
		            		'color: #fff!important; ' +
		            		'-webkit-print-color-adjust:exact;' +
		            	'}' +
		            	'</style>' +
		            '</head>' +
		            '<body><div class="saleSummaryCustomer" style="padding: 0 10px;">';
		    var htmlEnd =
		            '</div></body>' +
		            '</html>';

		    printableContent = $('#invFormContent').html();
		    doc.write(htmlStart + printableContent + htmlEnd);
		    doc.close();
		    setTimeout(function(){
		    	win.print();
		    	win.close();
		    },2000);
		},
		ExportExcel 		: function(){
	        var workbook = new kendo.ooxml.Workbook({
	          sheets: [
	            {
	              columns: [
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true }
	              ],
	              title: "Sale Summary Customer",
	              rows: this.exArray
	            }
	          ]
	        });
	        //save the file as Excel file with extension xlsx
	        kendo.saveAs({dataURI: workbook.toDataURL(), fileName: "saleSummaryCustomer.xlsx"});
		}
	});
	banhji.saleDetailByCustomer =  kendo.observable({
		lang 				: langVM,
		dataSource 			: dataStore(apiUrl + "sales/sale_detail_by_customer"),
		contactDS  			: banhji.source.customerDS,
		sortList			: banhji.source.sortList,
		sorter 				: "month",
		sdate 				: "",
		edate 				: "",
		obj 				: { contactIds: [] },
		company 			: banhji.institute,
		displayDate 		: "",
		totalAmount 		: 0,
		exArray 			: [],
		pageLoad 			: function(){
			this.search();
		},
		sorterChanges 		: function(){
	        var today = new Date(),
        	sdate = "",
        	edate = "",
        	sorter = this.get("sorter");

			switch(sorter){
				case "today":
					this.set("sdate", today);
					this.set("edate", "");

				  	break;
				case "week":
					var first = today.getDate() - today.getDay(),
					last = first + 6;

					this.set("sdate", new Date(today.setDate(first)));
					this.set("edate", new Date(today.setDate(last)));

				  	break;
				case "month":
					this.set("sdate", new Date(today.getFullYear(), today.getMonth(), 1));
					this.set("edate", new Date(today.getFullYear(), today.getMonth() + 1, 0));

				  	break;
				case "year":
				  	this.set("sdate", new Date(today.getFullYear(), 0, 1));
				  	this.set("edate", new Date(today.getFullYear(), 11, 31));

				  	break;
				default:
					this.set("sdate", "");
				  	this.set("edate", "");
			}
		},
		search				: function(){
			var self = this, para = [],
				obj = this.get("obj"),
				start = this.get("sdate"),
        		end = this.get("edate"),
        		displayDate = "";

        	//Customer
            if(obj.contactIds.length>0){
            	var contactIds = [];
            	$.each(obj.contactIds, function(index, value){
            		contactIds.push(value);
            	});
	            para.push({ field:"contact_id", operator:"where_in", value:contactIds });
	        }

        	//Dates
        	if(start && end){
        		start = new Date(start);
        		end = new Date(end);
        		displayDate = "From " + kendo.toString(start, "dd-MM-yyyy") + " To " + kendo.toString(end, "dd-MM-yyyy");
        		end.setDate(end.getDate()+1);

            	para.push({ field:"issued_date >=", value: kendo.toString(start, "yyyy-MM-dd") });
            	para.push({ field:"issued_date <", value: kendo.toString(end, "yyyy-MM-dd") });
            }else if(start){
            	start = new Date(start);
            	displayDate = "On " + kendo.toString(start, "dd-MM-yyyy");

            	para.push({ field:"issued_date", value: kendo.toString(start, "yyyy-MM-dd") });
            }else if(end){
            	end = new Date(end);
            	displayDate = "As Of " + kendo.toString(end, "dd-MM-yyyy");
        		end.setDate(end.getDate()+1);

            	para.push({ field:"issued_date <", value: kendo.toString(end, "yyyy-MM-dd") });
            }else{

            }
            this.set("displayDate", displayDate);

            this.dataSource.query({
            	filter:para,
            	page: 1,
	           	pageSize: 100
            }).then(function(){
            	var view = self.dataSource.view();

            	var amount = 0;
            	$.each(view, function(index, value){
            		$.each(value.line, function(ind, val){
	            		amount += val.amount;
	            	});
            	});

            	self.set("totalAmount", kendo.toString(amount, "c2", banhji.locale));
            });
            this.dataSource.bind("requestEnd", function(e){
				if(e.type=="read"){
					var response = e.response, balanceCal = 0, balance= 0;
					self.exArray = [];

					self.exArray.push({
	            		cells: [
	            			{ value: self.company.name, textAlign: "center", colSpan: 4}
	            		]
	            	});
	            	self.exArray.push({
	            		cells: [
	            			{ value: "Sale Detail by Customer",bold: true, fontSize: 20, textAlign: "center", colSpan: 4 }
	            		]
	            	});
	            	if(self.displayDate){
		            	self.exArray.push({
		            		cells: [
		            			{ value: self.displayDate, textAlign: "center", colSpan: 4 }
		            		]
		            	});
		            }
	            	self.exArray.push({
	            		cells: [
	            			{ value: "", colSpan: 4 }
	            		]
	            	});
	            	self.exArray.push({
	            		cells: [
							{ value: "Type", background: "#496cad", color: "#ffffff" },
							{ value: "Date", background: "#496cad", color: "#ffffff" },
							{ value: "Reference", background: "#496cad", color: "#ffffff" },
							{ value: "Amount", background: "#496cad", color: "#ffffff" },
						]
					});
					for (var i = 0; i < response.results.length; i++){
						self.exArray.push({
					        cells: [
					          	{ value: response.results[i].name, bold: true, },
					            { value: "" },
					            { value: "" },
					            { value: "" },
					        ]

					    });
					    for(var j = 0; j < response.results[i].line.length; j++){
					    	balance += response.results[i].line[j].amount;
				          	self.exArray.push({
				          		cells: [
				          	  		{ value: response.results[i].line[j].type },
				              		{ value: response.results[i].line[j].issued_date },
				              		{ value: response.results[i].line[j].number},
				              		{ value: response.results[i].line[j].amount },
				            	]
				          	});
				        }
				    	self.exArray.push({
					        cells: [
					          	{ value: "", colSpan: 4 }
					        ]
					    });
					}
				}
			});
		},
		printGrid			: function() {
			var gridElement = $('#grid'),
		        printableContent = '',
		        win = window.open('', '', 'width=990, height=900'),
		        doc = win.document.open();
		    var htmlStart =
		            '<!DOCTYPE html>' +
		            '<html>' +
		            '<head>' +
		            '<meta charset="utf-8" />' +
		            '<title></title>' +
		            '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />'+
		            '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
		            '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/responsive.css">' +
		            '<link href="<?php echo base_url(); ?>assets/invoice/invoice.css" rel="stylesheet" />'+
		            '<link href="https://fonts.googleapis.com/css?family=Content:400,700" rel="stylesheet" type="text/css">' +
		            '<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">' +
		            '<style>' +
		            'html { font: 11pt sans-serif; }' +
		            '.k-grid { border-top-width: 0; }' +
		            '.k-grid, .k-grid-content { height: auto !important; }' +
		            '.k-grid-content { overflow: visible !important; }' +
		            'div.k-grid table { table-layout: auto; width: 100% !important; }' +
		            '.k-grid .k-grid-header th { border-top: 1px solid; }' +
		            '.k-grid-toolbar, .k-grid-pager > .k-link { display: none; }' +
		            '</style><style type="text/css" media="print"> @page { size: portrait; margin:1mm; }'+
		            	'.inv1 .main-color {' +

		            		'-webkit-print-color-adjust:exact; ' +
		            	'} ' +
		            	'.table.table-borderless.table-condensed  tr th { background-color: #1E4E78!important;' +
		            	'-webkit-print-color-adjust:exact; color:#fff!important;}' +
		            	'.table.table-borderless.table-condensed  tr th * { color: #fff!important; -webkit-print-color-adjust:exact;}' +
		            	'.inv1 .light-blue-td { ' +
		            		'background-color: #c6d9f1!important;' +
		            		'text-align: left;' +
		            		'padding-left: 5px;' +
		            		'-webkit-print-color-adjust:exact; ' +
		            	'}' +
		            	'.saleSummaryCustomer .table.table-borderless.table-condensed tr td { ' +
    						'background-color: #F2F2F2!important; -webkit-print-color-adjust:exact;' +
						'}'+
						'.saleSummaryCustomer .table.table-borderless.table-condensed tr:nth-child(2n+1) td { ' +
    						' background-color: #fff!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.journal_block1>.span2 *, .journal_block1>.span5 * {color: #fff!important;}' +
		            	'.journal_block1>.span2:first-child { ' +
    						'background-color: #bbbbbb!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.journal_block1>.span5:last-child {' +
							'background-color: #496cad!important; color: #fff!important; -webkit-print-color-adjust:exact; ' +
						'}' +
						'.journal_block1>.span5 {' +
							'background-color: #5cc7dd!important; color: #fff!important; -webkit-print-color-adjust:exact;' +
						'}' +
		            	'.saleSummaryCustomer .table.table-borderless.table-condensed tfoot .bg-total td {' +
		            		'background-color: #1C2633!important;' +
		            		'color: #fff!important; ' +
		            		'-webkit-print-color-adjust:exact;' +
		            	'}' +
		            	'</style>' +
		            '</head>' +
		            '<body><div class="saleSummaryCustomer" style="padding: 0 10px;">';
		    var htmlEnd =
		            '</div></body>' +
		            '</html>';

		    printableContent = $('#invFormContent').html();
		    doc.write(htmlStart + printableContent + htmlEnd);
		    doc.close();
		    setTimeout(function(){
		    	win.print();
		    	win.close();
		    },2000);
		},
		ExportExcel 		: function(){
	        var workbook = new kendo.ooxml.Workbook({
	          sheets: [
	            {
	              columns: [
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	              ],
	              title: "Sale Detail by Customer",
	              rows: this.exArray
	            }
	          ]
	        });
	        //save the file as Excel file with extension xlsx
	        kendo.saveAs({dataURI: workbook.toDataURL(), fileName: "saleDetailCustomer.xlsx"});
		}
	});
	banhji.customerTransactionList =  kendo.observable({
		lang 				: langVM,
		dataSource 			: dataStore(apiUrl + "sales/customer_transaction_list"),
		contactDS  			: banhji.source.customerDS,
		sortList			: banhji.source.sortList,
		sorter 				: "month",
		sdate 				: "",
		edate 				: "",
		obj 				: { contactIds: [] },
		company 			: banhji.institute,
		displayDate 		: "",
		totalCustomer		: 0,
		totalSale 			: 0,
		totalBalance 		: 0,
		exArray 			: [],
		pageLoad 			: function(){
			this.search();
		},
		sorterChanges 		: function(){
	        var today = new Date(),
        	sdate = "",
        	edate = "",
        	sorter = this.get("sorter");

			switch(sorter){
				case "today":
					this.set("sdate", today);
					this.set("edate", "");

				  	break;
				case "week":
					var first = today.getDate() - today.getDay(),
					last = first + 6;

					this.set("sdate", new Date(today.setDate(first)));
					this.set("edate", new Date(today.setDate(last)));

				  	break;
				case "month":
					this.set("sdate", new Date(today.getFullYear(), today.getMonth(), 1));
					this.set("edate", new Date(today.getFullYear(), today.getMonth() + 1, 0));

				  	break;
				case "year":
				  	this.set("sdate", new Date(today.getFullYear(), 0, 1));
				  	this.set("edate", new Date(today.getFullYear(), 11, 31));

				  	break;
				default:
					this.set("sdate", "");
				  	this.set("edate", "");
			}
		},
		search				: function(){
			var self = this, para = [],
				obj = this.get("obj"),
				start = this.get("sdate"),
        		end = this.get("edate"),
        		displayDate = "";

        	//Customer
            if(obj.contactIds.length>0){
            	var contactIds = [];
            	$.each(obj.contactIds, function(index, value){
            		contactIds.push(value);
            	});
	            para.push({ field:"contact_id", operator:"where_in", value:contactIds });
	        }

        	//Dates
        	if(start && end){
        		start = new Date(start);
        		end = new Date(end);
        		displayDate = "From " + kendo.toString(start, "dd-MM-yyyy") + " To " + kendo.toString(end, "dd-MM-yyyy");
        		end.setDate(end.getDate()+1);

            	para.push({ field:"issued_date >=", value: kendo.toString(start, "yyyy-MM-dd") });
            	para.push({ field:"issued_date <", value: kendo.toString(end, "yyyy-MM-dd") });
            }else if(start){
            	start = new Date(start);
            	displayDate = "On " + kendo.toString(start, "dd-MM-yyyy");

            	para.push({ field:"issued_date", value: kendo.toString(start, "yyyy-MM-dd") });
            }else if(end){
            	end = new Date(end);
            	displayDate = "As Of " + kendo.toString(end, "dd-MM-yyyy");
        		end.setDate(end.getDate()+1);

            	para.push({ field:"issued_date <", value: kendo.toString(end, "yyyy-MM-dd") });
            }else{

            }
            this.set("displayDate", displayDate);

            this.dataSource.filter(para);
            this.dataSource.bind("requestEnd", function(e){
				if(e.type=="read"){
					var response = e.response, balanceCal = 0, balance= 0;
					self.exArray = [];

					self.exArray.push({
	            		cells: [
	            			{ value: self.company.name, textAlign: "center", colSpan: 4}
	            		]
	            	});
	            	self.exArray.push({
	            		cells: [
	            			{ value: "Customer Transaction List",bold: true, fontSize: 20, textAlign: "center", colSpan: 4 }
	            		]
	            	});
	            	if(self.displayDate){
		            	self.exArray.push({
		            		cells: [
		            			{ value: self.displayDate, textAlign: "center", colSpan: 4}
		            		]
		            	});
		            }
	            	self.exArray.push({
	            		cells: [
	            			{ value: "", colSpan: 4}
	            		]
	            	});
	            	self.exArray.push({
	            		cells: [
							{ value: "Type", background: "#496cad", color: "#ffffff" },
							{ value: "Date", background: "#496cad", color: "#ffffff" },
							{ value: "Reference", background: "#496cad", color: "#ffffff" },
							{ value: "Amount", background: "#496cad", color: "#ffffff" },
						]
					});
					for (var i = 0; i < response.results.length; i++){
						self.exArray.push({
					        cells: [
					          	{ value: response.results[i].name, bold: true, },
					            { value: "" },
					            { value: "" },
					            { value: "" },
					        ]

					    });
					    for(var j = 0; j < response.results[i].line.length; j++){
					    	var aaa = response.results[i].line[j].quantity + response.results[i].line[j].measurement;
				          	self.exArray.push({
				          		cells: [
				          	  		{ value: response.results[i].line[j].type },
				              		{ value: response.results[i].line[j].issued_date },
				              		{ value: response.results[i].line[j].number},
				              		{ value: response.results[i].line[j].amount},
				            	]
				          	});
				        }
				    	self.exArray.push({
					        cells: [
					          	{ value: "", colSpan: 4}
					        ]
					    });
					}
				}
			});
		},
		printGrid			: function() {
			var gridElement = $('#grid'),
		        printableContent = '',
		        win = window.open('', '', 'width=990, height=900'),
		        doc = win.document.open();
		    var htmlStart =
		            '<!DOCTYPE html>' +
		            '<html>' +
		            '<head>' +
		            '<meta charset="utf-8" />' +
		            '<title></title>' +
		            '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />'+
		            '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
		            '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/responsive.css">' +
		            '<link href="<?php echo base_url(); ?>assets/invoice/invoice.css" rel="stylesheet" />'+
		            '<link href="https://fonts.googleapis.com/css?family=Content:400,700" rel="stylesheet" type="text/css">' +
		            '<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">' +
		            '<style>' +
		            'html { font: 11pt sans-serif; }' +
		            '.k-grid { border-top-width: 0; }' +
		            '.k-grid, .k-grid-content { height: auto !important; }' +
		            '.k-grid-content { overflow: visible !important; }' +
		            'div.k-grid table { table-layout: auto; width: 100% !important; }' +
		            '.k-grid .k-grid-header th { border-top: 1px solid; }' +
		            '.k-grid-toolbar, .k-grid-pager > .k-link { display: none; }' +
		            '</style><style type="text/css" media="print"> @page { size: portrait; margin:1mm; }'+
		            	'.inv1 .main-color {' +

		            		'-webkit-print-color-adjust:exact; ' +
		            	'} ' +
		            	'.table.table-borderless.table-condensed  tr th { background-color: #1E4E78!important;' +
		            	'-webkit-print-color-adjust:exact; color:#fff!important;}' +
		            	'.table.table-borderless.table-condensed  tr th * { color: #fff!important; -webkit-print-color-adjust:exact;}' +
		            	'.inv1 .light-blue-td { ' +
		            		'background-color: #c6d9f1!important;' +
		            		'text-align: left;' +
		            		'padding-left: 5px;' +
		            		'-webkit-print-color-adjust:exact; ' +
		            	'}' +
		            	'.saleSummaryCustomer .table.table-borderless.table-condensed tr td { ' +
    						'background-color: #F2F2F2!important; -webkit-print-color-adjust:exact;' +
						'}'+
						'.saleSummaryCustomer .table.table-borderless.table-condensed tr:nth-child(2n+1) td { ' +
    						' background-color: #fff!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.journal_block1>.span2 *, .journal_block1>.span5 * {color: #fff!important;}' +
		            	'.journal_block1>.span2:first-child { ' +
    						'background-color: #bbbbbb!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.journal_block1>.span5:last-child {' +
							'background-color: #496cad!important; color: #fff!important; -webkit-print-color-adjust:exact; ' +
						'}' +
						'.journal_block1>.span5 {' +
							'background-color: #5cc7dd!important; color: #fff!important; -webkit-print-color-adjust:exact;' +
						'}' +
		            	'.saleSummaryCustomer .table.table-borderless.table-condensed tfoot .bg-total td {' +
		            		'background-color: #1C2633!important;' +
		            		'color: #fff!important; ' +
		            		'-webkit-print-color-adjust:exact;' +
		            	'}' +
		            	'</style>' +
		            '</head>' +
		            '<body><div class="saleSummaryCustomer" style="padding: 0 10px;">';
		    var htmlEnd =
		            '</div></body>' +
		            '</html>';

		    printableContent = $('#invFormContent').html();
		    doc.write(htmlStart + printableContent + htmlEnd);
		    doc.close();
		    setTimeout(function(){
		    	win.print();
		    	win.close();
		    },2000);
		},
		ExportExcel 		: function(){
	        var workbook = new kendo.ooxml.Workbook({
	          sheets: [
	            {
	              columns: [
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	              ],
	              title: "Customer Transaction List",
	              rows: this.exArray
	            }
	          ]
	        });
	        //save the file as Excel file with extension xlsx
	        kendo.saveAs({dataURI: workbook.toDataURL(), fileName: "customerTransaction.xlsx"});
		}
	});
	banhji.depositDetailByCustomer =  kendo.observable({
		lang 				: langVM,
		dataSource 			: dataStore(apiUrl + "sales/deposit_detail_by_customer"),
		contactDS  			: banhji.source.customerDS,
		sortList			: banhji.source.sortList,
		sorter 				: "month",
		sdate 				: "",
		edate 				: "",
		obj 				: { contactIds: [] },
		company 			: banhji.institute,
		displayDate 		: "",
		totalAmount 		: 0,
		exArray 			: [],
		pageLoad 			: function(){
			this.search();
		},
		sorterChanges 		: function(){
	        var today = new Date(),
        	sdate = "",
        	edate = "",
        	sorter = this.get("sorter");

			switch(sorter){
				case "today":
					this.set("sdate", today);
					this.set("edate", "");

				  	break;
				case "week":
					var first = today.getDate() - today.getDay(),
					last = first + 6;

					this.set("sdate", new Date(today.setDate(first)));
					this.set("edate", new Date(today.setDate(last)));

				  	break;
				case "month":
					this.set("sdate", new Date(today.getFullYear(), today.getMonth(), 1));
					this.set("edate", new Date(today.getFullYear(), today.getMonth() + 1, 0));

				  	break;
				case "year":
				  	this.set("sdate", new Date(today.getFullYear(), 0, 1));
				  	this.set("edate", new Date(today.getFullYear(), 11, 31));

				  	break;
				default:
					this.set("sdate", "");
				  	this.set("edate", "");
			}
		},
		search				: function(){
			var self = this, para = [],
				obj = this.get("obj"),
				start = this.get("sdate"),
        		end = this.get("edate"),
        		displayDate = "";

        	//Contact
            if(obj.contactIds.length>0){
            	var contactIds = [];
            	$.each(obj.contactIds, function(index, value){
            		contactIds.push(value);
            	});
	            para.push({ field:"contact_id", operator:"where_in", value:contactIds });
	        }

        	//Dates
        	if(start && end){
        		start = new Date(start);
        		end = new Date(end);
        		displayDate = "From " + kendo.toString(start, "dd-MM-yyyy") + " To " + kendo.toString(end, "dd-MM-yyyy");
        		end.setDate(end.getDate()+1);

            	para.push({ field:"issued_date >=", value: kendo.toString(start, "yyyy-MM-dd") });
            	para.push({ field:"issued_date <", value: kendo.toString(end, "yyyy-MM-dd") });
            }else if(start){
            	start = new Date(start);
            	displayDate = "On " + kendo.toString(start, "dd-MM-yyyy");

            	para.push({ field:"issued_date", value: kendo.toString(start, "yyyy-MM-dd") });
            }else if(end){
            	end = new Date(end);
            	displayDate = "As Of " + kendo.toString(end, "dd-MM-yyyy");
        		end.setDate(end.getDate()+1);

            	para.push({ field:"issued_date <", value: kendo.toString(end, "yyyy-MM-dd") });
            }else{

            }
            this.set("displayDate", displayDate);

            this.dataSource.query({
            	filter:para
            }).then(function(){
            	var view = self.dataSource.view();

            	var amount = 0;
            	$.each(view, function(index, value){
            		$.each(value.line, function(ind, val){
	            		amount += val.amount;
	            	});
            	});

            	self.set("totalAmount", kendo.toString(amount, "c2", banhji.locale));
            });
            this.dataSource.bind("requestEnd", function(e){
				if(e.type=="read"){
					var response = e.response, balanceCal = 0, balance= 0;
					self.exArray = [];

					self.exArray.push({
	            		cells: [
	            			{ value: self.company.name, textAlign: "center", colSpan: 6}
	            		]
	            	});
	            	self.exArray.push({
	            		cells: [
	            			{ value: "Deposit Detail by Customer",bold: true, fontSize: 20, textAlign: "center", colSpan: 6}
	            		]
	            	});
	            	if(self.displayDate){
		            	self.exArray.push({
		            		cells: [
		            			{ value: self.displayDate, textAlign: "center", colSpan: 6}
		            		]
		            	});
		            }
	            	self.exArray.push({
	            		cells: [
	            			{ value: "", colSpan: 6}
	            		]
	            	});
	            	self.exArray.push({
	            		cells: [
							{ value: "Type", background: "#496cad", color: "#ffffff" },
							{ value: "Date", background: "#496cad", color: "#ffffff" },
							{ value: "Number", background: "#496cad", color: "#ffffff" },
							{ value: "Reference", background: "#496cad", color: "#ffffff" },
							{ value: "Amount", background: "#496cad", color: "#ffffff" },
							{ value: "Balance", background: "#496cad", color: "#ffffff" },
						]
					});
					for (var i = 0; i < response.results.length; i++){
						var balance = response.results[i].balance_forward;
						self.exArray.push({
					        cells: [
					          	{ value: response.results[i].name, bold: true, },
					            { value: "" },
					            { value: "" },
					            { value: "" },
					            { value: "" },
					            { value: balance, bold: true, },
					        ]

					    });
					    for(var j = 0; j < response.results[i].line.length; j++){
					    	balance += response.results[i].line[j].amount;
				          	self.exArray.push({
				          		cells: [
				          	  		{ value: response.results[i].line[j].type },
				              		{ value: response.results[i].line[j].issued_date },
				              		{ value: response.results[i].line[j].number},
				              		{ value: response.results[i].line[j].reference},
				              		{ value: response.results[i].line[j].amount},
				              		{ value: balance},
				            	]
				          	});
				        }
				    	self.exArray.push({
					        cells: [
					          	{ value: "", colSpan: 4}
					        ]
					    });
					}
				}
			});
		},
		printGrid			: function() {
			var gridElement = $('#grid'),
		        printableContent = '',
		        win = window.open('', '', 'width=990, height=900'),
		        doc = win.document.open();
		    var htmlStart =
		            '<!DOCTYPE html>' +
		            '<html>' +
		            '<head>' +
		            '<meta charset="utf-8" />' +
		            '<title></title>' +
		            '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />'+
		            '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
		            '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/responsive.css">' +
		            '<link href="<?php echo base_url(); ?>assets/invoice/invoice.css" rel="stylesheet" />'+
		            '<link href="https://fonts.googleapis.com/css?family=Content:400,700" rel="stylesheet" type="text/css">' +
		            '<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">' +
		            '<style>' +
		            'html { font: 11pt sans-serif; }' +
		            '.k-grid { border-top-width: 0; }' +
		            '.k-grid, .k-grid-content { height: auto !important; }' +
		            '.k-grid-content { overflow: visible !important; }' +
		            'div.k-grid table { table-layout: auto; width: 100% !important; }' +
		            '.k-grid .k-grid-header th { border-top: 1px solid; }' +
		            '.k-grid-toolbar, .k-grid-pager > .k-link { display: none; }' +
		            '</style><style type="text/css" media="print"> @page { size: portrait; margin:1mm; }'+
		            	'.inv1 .main-color {' +

		            		'-webkit-print-color-adjust:exact; ' +
		            	'} ' +
		            	'.table.table-borderless.table-condensed  tr th { background-color: #1E4E78!important;' +
		            	'-webkit-print-color-adjust:exact; color:#fff!important;}' +
		            	'.table.table-borderless.table-condensed  tr th * { color: #fff!important; -webkit-print-color-adjust:exact;}' +
		            	'.inv1 .light-blue-td { ' +
		            		'background-color: #c6d9f1!important;' +
		            		'text-align: left;' +
		            		'padding-left: 5px;' +
		            		'-webkit-print-color-adjust:exact; ' +
		            	'}' +
		            	'.saleSummaryCustomer .table.table-borderless.table-condensed tr td { ' +
    						'background-color: #F2F2F2!important; -webkit-print-color-adjust:exact;' +
						'}'+
						'.saleSummaryCustomer .table.table-borderless.table-condensed tr:nth-child(2n+1) td { ' +
    						' background-color: #fff!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.journal_block1>.span2 *, .journal_block1>.span5 * {color: #fff!important;}' +
		            	'.journal_block1>.span2:first-child { ' +
    						'background-color: #bbbbbb!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.journal_block1>.span5:last-child {' +
							'background-color: #496cad!important; color: #fff!important; -webkit-print-color-adjust:exact; ' +
						'}' +
						'.journal_block1>.span5 {' +
							'background-color: #5cc7dd!important; color: #fff!important; -webkit-print-color-adjust:exact;' +
						'}' +
		            	'.saleSummaryCustomer .table.table-borderless.table-condensed tfoot .bg-total td {' +
		            		'background-color: #1C2633!important;' +
		            		'color: #fff!important; ' +
		            		'-webkit-print-color-adjust:exact;' +
		            	'}' +
		            	'</style>' +
		            '</head>' +
		            '<body><div class="saleSummaryCustomer" style="padding: 0 10px;">';
		    var htmlEnd =
		            '</div></body>' +
		            '</html>';

		    printableContent = $('#invFormContent').html();
		    doc.write(htmlStart + printableContent + htmlEnd);
		    doc.close();
		    setTimeout(function(){
		    	win.print();
		    	win.close();
		    },2000);
		},
		ExportExcel 		: function(){
	        var workbook = new kendo.ooxml.Workbook({
	          sheets: [
	            {
	              columns: [
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true }
	              ],
	              title: "Deposit Detail Customer",
	              rows: this.exArray
	            }
	          ]
	        });
	        //save the file as Excel file with extension xlsx
	        kendo.saveAs({dataURI: workbook.toDataURL(), fileName: "depositDetailCustomer.xlsx"});
		}
	});
	banhji.saleSummaryByProduct =  kendo.observable({
		lang 				: langVM,
		dataSource 			: dataStore(apiUrl + "sales/sale_summary_by_product"),
		itemDS				: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + "items",
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
			filter:[
		    	{ field: "is_catalog <>", value: 1 },
		        { field: "is_assembly <>", value: 1 },
		      	{ field: "item_type_id", operator:"where_in", value: [1,4] }
		    ],
			sort:[
				{ field:"item_type_id", dir:"asc" },
				{ field:"number", dir:"asc" }
			],
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page:1,
			pageSize: 100
		}),
		sortList			: banhji.source.sortList,
		sorter 				: "month",
		sdate 				: "",
		edate 				: "",
		obj 				: { itemIds: [] },
		company 			: banhji.institute,
		displayDate 		: "",
		avg_sale 			: 0,
		total_sale 			: 0,
		exArray 			: [],
		pageLoad 			: function(){
			this.search();
		},
		sorterChanges 		: function(){
	        var today = new Date(),
        	sdate = "",
        	edate = "",
        	sorter = this.get("sorter");

			switch(sorter){
				case "today":
					this.set("sdate", today);
					this.set("edate", "");

				  	break;
				case "week":
					var first = today.getDate() - today.getDay(),
					last = first + 6;

					this.set("sdate", new Date(today.setDate(first)));
					this.set("edate", new Date(today.setDate(last)));

				  	break;
				case "month":
					this.set("sdate", new Date(today.getFullYear(), today.getMonth(), 1));
					this.set("edate", new Date(today.getFullYear(), today.getMonth() + 1, 0));

				  	break;
				case "year":
				  	this.set("sdate", new Date(today.getFullYear(), 0, 1));
				  	this.set("edate", new Date(today.getFullYear(), 11, 31));

				  	break;
				default:
					this.set("sdate", "");
				  	this.set("edate", "");
			}
		},
		search				: function(){
			var self = this, para = [],
				obj = this.get("obj"),
				start = this.get("sdate"),
        		end = this.get("edate"),
        		displayDate = "";

        	//Customer
            if(obj.itemIds.length>0){
            	var itemIds = [];
            	$.each(obj.itemIds, function(index, value){
            		itemIds.push(value);
            	});
	            para.push({ field:"item_id", operator:"where_in", value:itemIds });
	        }

        	//Dates
        	if(start && end){
        		start = new Date(start);
        		end = new Date(end);
        		displayDate = "From " + kendo.toString(start, "dd-MM-yyyy") + " To " + kendo.toString(end, "dd-MM-yyyy");
        		end.setDate(end.getDate()+1);

            	para.push({ field:"issued_date >=", operator:"where_related_transaction", value: kendo.toString(start, "yyyy-MM-dd") });
            	para.push({ field:"issued_date <", operator:"where_related_transaction", value: kendo.toString(end, "yyyy-MM-dd") });
            }else if(start){
            	start = new Date(start);
            	displayDate = "On " + kendo.toString(start, "dd-MM-yyyy");

            	para.push({ field:"issued_date", operator:"where_related_transaction", value: kendo.toString(start, "yyyy-MM-dd") });
            }else if(end){
            	end = new Date(end);
            	displayDate = "As Of " + kendo.toString(end, "dd-MM-yyyy");
        		end.setDate(end.getDate()+1);

            	para.push({ field:"issued_date <", operator:"where_related_transaction", value: kendo.toString(end, "yyyy-MM-dd") });
            }else{

            }
            this.set("displayDate", displayDate);

            this.dataSource.query({
            	filter:para,
            	page: 1,
	            pageSize : 20,
            }).then(function(){
            	var view = self.dataSource.view();

            	var txnCount = 0, amount = 0;
            	$.each(view, function(index, value){
            		txnCount += value.txn_count;
            		amount += value.amount;
            	});

            	var avgSale = 0;
            	if(txnCount>0){
            		avgSale = amount/txnCount;
            	}

            	self.set("avg_sale", kendo.toString(avgSale, "c2", banhji.locale));
            	self.set("total_sale", kendo.toString(amount, "c2", banhji.locale));
            });
            this.dataSource.bind("requestEnd", function(e){
				if(e.type=="read"){
					var response = e.response;
					self.exArray = [];

					self.exArray.push({
	            		cells: [
	            			{ value: self.company.name, textAlign: "center", colSpan: 6 }
	            		]
	            	});
	            	self.exArray.push({
	            		cells: [
	            			{ value: "Sale Summary by Product/Service",bold: true, fontSize: 20, textAlign: "center", colSpan: 6 }
	            		]
	            	});
	            	if(self.displayDate){
		            	self.exArray.push({
		            		cells: [
		            			{ value: self.displayDate, textAlign: "center", colSpan: 6 }
		            		]
		            	});
		            };
	            	self.exArray.push({
	            		cells: [
	            			{ value: "", colSpan: 6 }
	            		]
	            	});
	            	self.exArray.push({
	            		cells: [
							{ value: "Item", background: "#496cad", color: "#ffffff" },
							{ value: "QTY", background: "#496cad", color: "#ffffff" },
							{ value: "Amount", background: "#496cad", color: "#ffffff" },
							{ value: "AVG Price", background: "#496cad", color: "#ffffff" },
							{ value: "AVG Cost", background: "#496cad", color: "#ffffff" },
							{ value: "Gross Profit Margin", background: "#496cad", color: "#ffffff" },
						]
					});
	            	for (var i = 0; i < response.results.length; i++){
				          	self.exArray.push({
				          		cells: [
				          	  		{ value: response.results[i].name },
				          	  		{ value: kendo.parseFloat(response.results[i].quantity)},
				          	  		{ value: kendo.parseFloat(response.results[i].amount)},
				          	  		{ value: kendo.parseFloat(response.results[i].avg_price)},
				          	  		{ value: kendo.parseFloat(response.results[i].avg_cost)},
				              		{ value: kendo.parseFloat(response.results[i].gpm)},
				            	]
				          	});
					    self.exArray.push({
					        cells: [
					          	{ value: "", colSpan: 6 }
					        ]
					    });
					}
				}
			});
		},
		printGrid			: function() {
			var gridElement = $('#grid'),
		        printableContent = '',
		        win = window.open('', '', 'width=990, height=900'),
		        doc = win.document.open();
		    var htmlStart =
		            '<!DOCTYPE html>' +
		            '<html>' +
		            '<head>' +
		            '<meta charset="utf-8" />' +
		            '<title></title>' +
		            '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />'+
		            '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
		            '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/responsive.css">' +
		            '<link href="<?php echo base_url(); ?>assets/invoice/invoice.css" rel="stylesheet" />'+
		            '<link href="https://fonts.googleapis.com/css?family=Content:400,700" rel="stylesheet" type="text/css">' +
		            '<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">' +
		            '<style>' +
		            'html { font: 11pt sans-serif; }' +
		            '.k-grid { border-top-width: 0; }' +
		            '.k-grid, .k-grid-content { height: auto !important; }' +
		            '.k-grid-content { overflow: visible !important; }' +
		            'div.k-grid table { table-layout: auto; width: 100% !important; }' +
		            '.k-grid .k-grid-header th { border-top: 1px solid; }' +
		            '.k-grid-toolbar, .k-grid-pager > .k-link { display: none; }' +
		            '</style><style type="text/css" media="print"> @page { size: portrait; margin:1mm; }'+
		            	'.inv1 .main-color {' +

		            		'-webkit-print-color-adjust:exact; ' +
		            	'} ' +
		            	'.table.table-borderless.table-condensed  tr th { background-color: #1E4E78!important;' +
		            	'-webkit-print-color-adjust:exact; color:#fff!important;}' +
		            	'.table.table-borderless.table-condensed  tr th * { color: #fff!important; -webkit-print-color-adjust:exact;}' +
		            	'.inv1 .light-blue-td { ' +
		            		'background-color: #c6d9f1!important;' +
		            		'text-align: left;' +
		            		'padding-left: 5px;' +
		            		'-webkit-print-color-adjust:exact; ' +
		            	'}' +
		            	'.saleSummaryCustomer .table.table-borderless.table-condensed tr td { ' +
    						'background-color: #F2F2F2!important; -webkit-print-color-adjust:exact;' +
						'}'+
						'.saleSummaryCustomer .table.table-borderless.table-condensed tr:nth-child(2n+1) td { ' +
    						' background-color: #fff!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.journal_block1>.span2 *, .journal_block1>.span5 * {color: #fff!important;}' +
		            	'.journal_block1>.span2:first-child { ' +
    						'background-color: #bbbbbb!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.journal_block1>.span5:last-child {' +
							'background-color: #496cad!important; color: #fff!important; -webkit-print-color-adjust:exact; ' +
						'}' +
						'.journal_block1>.span5 {' +
							'background-color: #5cc7dd!important; color: #fff!important; -webkit-print-color-adjust:exact;' +
						'}' +
		            	'.saleSummaryCustomer .table.table-borderless.table-condensed tfoot .bg-total td {' +
		            		'background-color: #1C2633!important;' +
		            		'color: #fff!important; ' +
		            		'-webkit-print-color-adjust:exact;' +
		            	'}' +
		            	'</style>' +
		            '</head>' +
		            '<body><div class="saleSummaryCustomer" style="padding: 0 10px;">';
		    var htmlEnd =
		            '</div></body>' +
		            '</html>';

		    printableContent = $('#invFormContent').html();
		    doc.write(htmlStart + printableContent + htmlEnd);
		    doc.close();
		    setTimeout(function(){
		    	win.print();
		    	win.close();
		    },2000);
		},
		ExportExcel 		: function(){
	        var workbook = new kendo.ooxml.Workbook({
	          sheets: [
	            {
	              columns: [
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true }
	              ],
	              title: "Sale Summary Product",
	              rows: this.exArray
	            }
	          ]
	        });
	        //save the file as Excel file with extension xlsx
	        kendo.saveAs({dataURI: workbook.toDataURL(), fileName: "saleSummaryProduct.xlsx"});
		}
	});
	banhji.saleDetailByProduct =  kendo.observable({
		lang 				: langVM,
		dataSource 			: dataStore(apiUrl + "sales/sale_detail_by_product"),
		itemDS				: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + "items",
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
			filter:[
		    	{ field: "is_catalog <>", value: 1 },
		        { field: "is_assembly <>", value: 1 },
		      	{ field: "item_type_id", operator:"where_in", value: [1,4] }
		    ],
			sort:[
				{ field:"item_type_id", dir:"asc" },
				{ field:"number", dir:"asc" }
			],
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page:1,
			pageSize: 100
		}),
		sortList			: banhji.source.sortList,
		sorter 				: "month",
		sdate 				: "",
		edate 				: "",
		obj 				: { itemIds: [] },
		company 			: banhji.institute,
		displayDate 		: "",
		product_sale 		: 0,
		total_sale 			: 0,
		exArray 			: [],
		pageLoad 			: function(){
			this.search();
		},
		sorterChanges 		: function(){
	        var today = new Date(),
        	sdate = "",
        	edate = "",
        	sorter = this.get("sorter");

			switch(sorter){
				case "today":
					this.set("sdate", today);
					this.set("edate", "");

				  	break;
				case "week":
					var first = today.getDate() - today.getDay(),
					last = first + 6;

					this.set("sdate", new Date(today.setDate(first)));
					this.set("edate", new Date(today.setDate(last)));

				  	break;
				case "month":
					this.set("sdate", new Date(today.getFullYear(), today.getMonth(), 1));
					this.set("edate", new Date(today.getFullYear(), today.getMonth() + 1, 0));

				  	break;
				case "year":
				  	this.set("sdate", new Date(today.getFullYear(), 0, 1));
				  	this.set("edate", new Date(today.getFullYear(), 11, 31));

				  	break;
				default:
					this.set("sdate", "");
				  	this.set("edate", "");
			}
		},
		search				: function(){
			var self = this, para = [],
				obj = this.get("obj"),
				start = this.get("sdate"),
        		end = this.get("edate"),
        		displayDate = "";

        	//Items
            if(obj.itemIds.length>0){
            	var itemIds = [];
            	$.each(obj.itemIds, function(index, value){
            		itemIds.push(value);
            	});
	            para.push({ field:"item_id", operator:"where_in", value:itemIds });
	        }

        	//Dates
        	if(start && end){
        		start = new Date(start);
        		end = new Date(end);
        		displayDate = "From " + kendo.toString(start, "dd-MM-yyyy") + " To " + kendo.toString(end, "dd-MM-yyyy");
        		end.setDate(end.getDate()+1);

            	para.push({ field:"issued_date >=", operator:"where_related_transaction", value: kendo.toString(start, "yyyy-MM-dd") });
            	para.push({ field:"issued_date <", operator:"where_related_transaction", value: kendo.toString(end, "yyyy-MM-dd") });
            }else if(start){
            	start = new Date(start);
            	displayDate = "On " + kendo.toString(start, "dd-MM-yyyy");

            	para.push({ field:"issued_date", operator:"where_related_transaction", value: kendo.toString(start, "yyyy-MM-dd") });
            }else if(end){
            	end = new Date(end);
            	displayDate = "As Of " + kendo.toString(end, "dd-MM-yyyy");
        		end.setDate(end.getDate()+1);

            	para.push({ field:"issued_date <", operator:"where_related_transaction", value: kendo.toString(end, "yyyy-MM-dd") });
            }else{

            }
            this.set("displayDate", displayDate);

            this.dataSource.query({
            	filter:para,
            	page: 1,
	            pageSize : 50,
            }).then(function(){
            	var view = self.dataSource.view();

            	var txnCount = 0, amount = 0;
            	$.each(view, function(index, value){
            		$.each(value.line, function(ind, val){
	            		txnCount++;
	            		amount += val.amount;
            		});
            	});

            	var avgSale = 0;
            	if(txnCount>0){
            		avgSale = amount/txnCount;
            	}

            	self.set("product_sale", kendo.toString(avgSale, "c2", banhji.locale));
            	self.set("total_sale", kendo.toString(amount, "c2", banhji.locale));
            });
            this.dataSource.bind("requestEnd", function(e){
				if(e.type=="read"){
					var response = e.response, balanceCal = 0, balance= 0;
					self.exArray = [];

					self.exArray.push({
	            		cells: [
	            			{ value: self.company.name, textAlign: "center", colSpan: 7}
	            		]
	            	});
	            	self.exArray.push({
	            		cells: [
	            			{ value: "Sale Detail by Product/Service",bold: true, fontSize: 20, textAlign: "center", colSpan: 7 }
	            		]
	            	});
	            	if(self.displayDate){
		            	self.exArray.push({
		            		cells: [
		            			{ value: self.displayDate, textAlign: "center", colSpan: 7 }
		            		]
		            	});
		            }
	            	self.exArray.push({
	            		cells: [
	            			{ value: "", colSpan: 7 }
	            		]
	            	});
	            	self.exArray.push({
	            		cells: [
							{ value: "Type", background: "#496cad", color: "#ffffff" },
							{ value: "Customer", background: "#496cad", color: "#ffffff" },
							{ value: "Invoice Date", background: "#496cad", color: "#ffffff" },
							{ value: "Reference", background: "#496cad", color: "#ffffff" },
							{ value: "QTY", background: "#496cad", color: "#ffffff" },
							{ value: "Price", background: "#496cad", color: "#ffffff" },
							{ value: "Amount", background: "#496cad", color: "#ffffff" },
						]
					});
					for (var i = 0; i < response.results.length; i++){
						self.exArray.push({
					        cells: [
					          	{ value: response.results[i].name, bold: true, },
					            { value: "" },
					            { value: "" },
					            { value: "" },
					            { value: "" },
					            { value: "" },
					            { value: "" },
					        ]

					    });
					    for(var j = 0; j < response.results[i].line.length; j++){
					    	var aaa = response.results[i].line[j].quantity + response.results[i].line[j].measurement;
				          	self.exArray.push({
				          		cells: [
				          	  		{ value: response.results[i].line[j].type },
				              		{ value: response.results[i].line[j].customer },
				              		{ value: response.results[i].line[j].issued_date},
				              		{ value: response.results[i].line[j].number },
				              		{ value: aaa},
				              		{ value: response.results[i].line[j].price },
				              		{ value: response.results[i].line[j].amount },
				            	]
				          	});
				        }
				    	self.exArray.push({
					        cells: [
					          	{ value: "", colSpan: 7}
					        ]
					    });
					}
				}
			});
		},
		printGrid			: function() {
			var gridElement = $('#grid'),
		        printableContent = '',
		        win = window.open('', '', 'width=990, height=900'),
		        doc = win.document.open();
		    var htmlStart =
		            '<!DOCTYPE html>' +
		            '<html>' +
		            '<head>' +
		            '<meta charset="utf-8" />' +
		            '<title></title>' +
		            '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />'+
		            '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
		            '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/responsive.css">' +
		            '<link href="<?php echo base_url(); ?>assets/invoice/invoice.css" rel="stylesheet" />'+
		            '<link href="https://fonts.googleapis.com/css?family=Content:400,700" rel="stylesheet" type="text/css">' +
		            '<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">' +
		            '<style>' +
		            'html { font: 11pt sans-serif; }' +
		            '.k-grid { border-top-width: 0; }' +
		            '.k-grid, .k-grid-content { height: auto !important; }' +
		            '.k-grid-content { overflow: visible !important; }' +
		            'div.k-grid table { table-layout: auto; width: 100% !important; }' +
		            '.k-grid .k-grid-header th { border-top: 1px solid; }' +
		            '.k-grid-toolbar, .k-grid-pager > .k-link { display: none; }' +
		            '</style><style type="text/css" media="print"> @page { size: portrait; margin:1mm; }'+
		            	'.inv1 .main-color {' +

		            		'-webkit-print-color-adjust:exact; ' +
		            	'} ' +
		            	'.table.table-borderless.table-condensed  tr th { background-color: #1E4E78!important;' +
		            	'-webkit-print-color-adjust:exact; color:#fff!important;}' +
		            	'.table.table-borderless.table-condensed  tr th * { color: #fff!important; -webkit-print-color-adjust:exact;}' +
		            	'.inv1 .light-blue-td { ' +
		            		'background-color: #c6d9f1!important;' +
		            		'text-align: left;' +
		            		'padding-left: 5px;' +
		            		'-webkit-print-color-adjust:exact; ' +
		            	'}' +
		            	'.saleSummaryCustomer .table.table-borderless.table-condensed tr td { ' +
    						'background-color: #F2F2F2!important; -webkit-print-color-adjust:exact;' +
						'}'+
						'.saleSummaryCustomer .table.table-borderless.table-condensed tr:nth-child(2n+1) td { ' +
    						' background-color: #fff!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.journal_block1>.span2 *, .journal_block1>.span5 * {color: #fff!important;}' +
		            	'.journal_block1>.span2:first-child { ' +
    						'background-color: #bbbbbb!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.journal_block1>.span5:last-child {' +
							'background-color: #496cad!important; color: #fff!important; -webkit-print-color-adjust:exact; ' +
						'}' +
						'.journal_block1>.span5 {' +
							'background-color: #5cc7dd!important; color: #fff!important; -webkit-print-color-adjust:exact;' +
						'}' +
		            	'.saleSummaryCustomer .table.table-borderless.table-condensed tfoot .bg-total td {' +
		            		'background-color: #1C2633!important;' +
		            		'color: #fff!important; ' +
		            		'-webkit-print-color-adjust:exact;' +
		            	'}' +
		            	'</style>' +
		            '</head>' +
		            '<body><div class="saleSummaryCustomer" style="padding: 0 10px;">';
		    var htmlEnd =
		            '</div></body>' +
		            '</html>';

		    printableContent = $('#invFormContent').html();
		    doc.write(htmlStart + printableContent + htmlEnd);
		    doc.close();
		    setTimeout(function(){
		    	win.print();
		    	win.close();
		    },2000);
		},
		ExportExcel 		: function(){
	        var workbook = new kendo.ooxml.Workbook({
	          sheets: [
	            {
	              columns: [
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true }
	              ],
	              title: "Sale Detail by Product/Service",
	              rows: this.exArray
	            }
	          ]
	        });
	        //save the file as Excel file with extension xlsx
	        kendo.saveAs({dataURI: workbook.toDataURL(), fileName: "saleDetailProduct.xlsx"});
		}
	});
	banhji.saleSummaryByBrand =  kendo.observable({
		lang 				: langVM,
		dataSource 			: dataStore(apiUrl + "sales/sale_summary_by_brand"),
		itemDS				: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + "items",
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
			filter:[
		    	{ field: "is_catalog <>", value: 1 },
		        { field: "is_assembly <>", value: 1 },
		      	{ field: "item_type_id", operator:"where_in", value: [1,4] }
		    ],
			sort:[
				{ field:"item_type_id", dir:"asc" },
				{ field:"number", dir:"asc" }
			],
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page:1,
			pageSize: 100
		}),
		sortList			: banhji.source.sortList,
		sorter 				: "month",
		sdate 				: "",
		edate 				: "",
		obj 				: { itemIds: [] },
		company 			: banhji.institute,
		displayDate 		: "",
		avg_sale 			: 0,
		total_sale 			: 0,
		exArray 			: [],
		pageLoad 			: function(){
			this.search();
		},
		sorterChanges 		: function(){
	        var today = new Date(),
        	sdate = "",
        	edate = "",
        	sorter = this.get("sorter");

			switch(sorter){
				case "today":
					this.set("sdate", today);
					this.set("edate", "");

				  	break;
				case "week":
					var first = today.getDate() - today.getDay(),
					last = first + 6;

					this.set("sdate", new Date(today.setDate(first)));
					this.set("edate", new Date(today.setDate(last)));

				  	break;
				case "month":
					this.set("sdate", new Date(today.getFullYear(), today.getMonth(), 1));
					this.set("edate", new Date(today.getFullYear(), today.getMonth() + 1, 0));

				  	break;
				case "year":
				  	this.set("sdate", new Date(today.getFullYear(), 0, 1));
				  	this.set("edate", new Date(today.getFullYear(), 11, 31));

				  	break;
				default:
					this.set("sdate", "");
				  	this.set("edate", "");
			}
		},
		search				: function(){
			var self = this, para = [],
				obj = this.get("obj"),
				start = this.get("sdate"),
        		end = this.get("edate"),
        		displayDate = "";

        	//Customer
            if(obj.itemIds.length>0){
            	var itemIds = [];
            	$.each(obj.itemIds, function(index, value){
            		itemIds.push(value);
            	});
	            para.push({ field:"item_id", operator:"where_in", value:itemIds });
	        }

        	//Dates
        	if(start && end){
        		start = new Date(start);
        		end = new Date(end);
        		displayDate = "From " + kendo.toString(start, "dd-MM-yyyy") + " To " + kendo.toString(end, "dd-MM-yyyy");
        		end.setDate(end.getDate()+1);

            	para.push({ field:"issued_date >=", operator:"where_related_transaction", value: kendo.toString(start, "yyyy-MM-dd") });
            	para.push({ field:"issued_date <", operator:"where_related_transaction", value: kendo.toString(end, "yyyy-MM-dd") });
            }else if(start){
            	start = new Date(start);
            	displayDate = "On " + kendo.toString(start, "dd-MM-yyyy");

            	para.push({ field:"issued_date", operator:"where_related_transaction", value: kendo.toString(start, "yyyy-MM-dd") });
            }else if(end){
            	end = new Date(end);
            	displayDate = "As Of " + kendo.toString(end, "dd-MM-yyyy");
        		end.setDate(end.getDate()+1);

            	para.push({ field:"issued_date <", operator:"where_related_transaction", value: kendo.toString(end, "yyyy-MM-dd") });
            }else{

            }
            this.set("displayDate", displayDate);

            this.dataSource.query({
            	filter:para
            }).then(function(){
            	var view = self.dataSource.view();

            	var txnCount = 0, amount = 0;
            	$.each(view, function(index, value){
            		txnCount += value.txn_count;
            		amount += value.amount;
            	});

            	var avgSale = 0;
            	if(txnCount>0){
            		avgSale = amount/txnCount;
            	}

            	self.set("avg_sale", kendo.toString(avgSale, "c2", banhji.locale));
            	self.set("total_sale", kendo.toString(amount, "c2", banhji.locale));
            });
            this.dataSource.bind("requestEnd", function(e){
				if(e.type=="read"){
					var response = e.response;
					self.exArray = [];

					self.exArray.push({
	            		cells: [
	            			{ value: self.company.name, textAlign: "center", colSpan: 6 }
	            		]
	            	});
	            	self.exArray.push({
	            		cells: [
	            			{ value: "Sale Summary by Product/Service",bold: true, fontSize: 20, textAlign: "center", colSpan: 6 }
	            		]
	            	});
	            	if(self.displayDate){
		            	self.exArray.push({
		            		cells: [
		            			{ value: self.displayDate, textAlign: "center", colSpan: 6 }
		            		]
		            	});
		            };
	            	self.exArray.push({
	            		cells: [
	            			{ value: "", colSpan: 6 }
	            		]
	            	});
	            	self.exArray.push({
	            		cells: [
							{ value: "Item", background: "#496cad", color: "#ffffff" },
							{ value: "QTY", background: "#496cad", color: "#ffffff" },
							{ value: "Amount", background: "#496cad", color: "#ffffff" },
							{ value: "AVG Price", background: "#496cad", color: "#ffffff" },
							{ value: "AVG Cost", background: "#496cad", color: "#ffffff" },
							{ value: "Gross Profit Margin", background: "#496cad", color: "#ffffff" },
						]
					});
	            	for (var i = 0; i < response.results.length; i++){
				          	self.exArray.push({
				          		cells: [
				          	  		{ value: response.results[i].name },
				          	  		{ value: kendo.parseFloat(response.results[i].quantity)},
				          	  		{ value: kendo.parseFloat(response.results[i].amount)},
				          	  		{ value: kendo.parseFloat(response.results[i].avg_price)},
				          	  		{ value: kendo.parseFloat(response.results[i].avg_cost)},
				              		{ value: kendo.parseFloat(response.results[i].gpm)},
				            	]
				          	});
					    self.exArray.push({
					        cells: [
					          	{ value: "", colSpan: 6 }
					        ]
					    });
					}
				}
			});
		},
		printGrid			: function() {
			var gridElement = $('#grid'),
		        printableContent = '',
		        win = window.open('', '', 'width=990, height=900'),
		        doc = win.document.open();
		    var htmlStart =
		            '<!DOCTYPE html>' +
		            '<html>' +
		            '<head>' +
		            '<meta charset="utf-8" />' +
		            '<title></title>' +
		            '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />'+
		            '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
		            '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/responsive.css">' +
		            '<link href="<?php echo base_url(); ?>assets/invoice/invoice.css" rel="stylesheet" />'+
		            '<link href="https://fonts.googleapis.com/css?family=Content:400,700" rel="stylesheet" type="text/css">' +
		            '<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">' +
		            '<style>' +
		            'html { font: 11pt sans-serif; }' +
		            '.k-grid { border-top-width: 0; }' +
		            '.k-grid, .k-grid-content { height: auto !important; }' +
		            '.k-grid-content { overflow: visible !important; }' +
		            'div.k-grid table { table-layout: auto; width: 100% !important; }' +
		            '.k-grid .k-grid-header th { border-top: 1px solid; }' +
		            '.k-grid-toolbar, .k-grid-pager > .k-link { display: none; }' +
		            '</style><style type="text/css" media="print"> @page { size: portrait; margin:1mm; }'+
		            	'.inv1 .main-color {' +

		            		'-webkit-print-color-adjust:exact; ' +
		            	'} ' +
		            	'.table.table-borderless.table-condensed  tr th { background-color: #1E4E78!important;' +
		            	'-webkit-print-color-adjust:exact; color:#fff!important;}' +
		            	'.table.table-borderless.table-condensed  tr th * { color: #fff!important; -webkit-print-color-adjust:exact;}' +
		            	'.inv1 .light-blue-td { ' +
		            		'background-color: #c6d9f1!important;' +
		            		'text-align: left;' +
		            		'padding-left: 5px;' +
		            		'-webkit-print-color-adjust:exact; ' +
		            	'}' +
		            	'.saleSummaryCustomer .table.table-borderless.table-condensed tr td { ' +
    						'background-color: #F2F2F2!important; -webkit-print-color-adjust:exact;' +
						'}'+
						'.saleSummaryCustomer .table.table-borderless.table-condensed tr:nth-child(2n+1) td { ' +
    						' background-color: #fff!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.journal_block1>.span2 *, .journal_block1>.span5 * {color: #fff!important;}' +
		            	'.journal_block1>.span2:first-child { ' +
    						'background-color: #bbbbbb!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.journal_block1>.span5:last-child {' +
							'background-color: #496cad!important; color: #fff!important; -webkit-print-color-adjust:exact; ' +
						'}' +
						'.journal_block1>.span5 {' +
							'background-color: #5cc7dd!important; color: #fff!important; -webkit-print-color-adjust:exact;' +
						'}' +
		            	'.saleSummaryCustomer .table.table-borderless.table-condensed tfoot .bg-total td {' +
		            		'background-color: #1C2633!important;' +
		            		'color: #fff!important; ' +
		            		'-webkit-print-color-adjust:exact;' +
		            	'}' +
		            	'</style>' +
		            '</head>' +
		            '<body><div class="saleSummaryCustomer" style="padding: 0 10px;">';
		    var htmlEnd =
		            '</div></body>' +
		            '</html>';

		    printableContent = $('#invFormContent').html();
		    doc.write(htmlStart + printableContent + htmlEnd);
		    doc.close();
		    setTimeout(function(){
		    	win.print();
		    	win.close();
		    },2000);
		},
		ExportExcel 		: function(){
	        var workbook = new kendo.ooxml.Workbook({
	          sheets: [
	            {
	              columns: [
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true }
	              ],
	              title: "Sale Summary Product",
	              rows: this.exArray
	            }
	          ]
	        });
	        //save the file as Excel file with extension xlsx
	        kendo.saveAs({dataURI: workbook.toDataURL(), fileName: "saleSummaryProduct.xlsx"});
		}
	});
	banhji.saleDetailByBrand =  kendo.observable({
		lang 				: langVM,
		dataSource 			: dataStore(apiUrl + "sales/sale_detail_by_brand"),
		itemDS				: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + "items",
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
			filter:[
		    	{ field: "is_catalog <>", value: 1 },
		        { field: "is_assembly <>", value: 1 },
		      	{ field: "item_type_id", operator:"where_in", value: [1,4] }
		    ],
			sort:[
				{ field:"item_type_id", dir:"asc" },
				{ field:"number", dir:"asc" }
			],
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page:1,
			pageSize: 100
		}),
		sortList			: banhji.source.sortList,
		sorter 				: "month",
		sdate 				: "",
		edate 				: "",
		obj 				: { itemIds: [] },
		company 			: banhji.institute,
		displayDate 		: "",
		product_sale 		: 0,
		total_sale 			: 0,
		exArray 			: [],
		pageLoad 			: function(){
			this.search();
		},
		sorterChanges 		: function(){
	        var today = new Date(),
        	sdate = "",
        	edate = "",
        	sorter = this.get("sorter");

			switch(sorter){
				case "today":
					this.set("sdate", today);
					this.set("edate", "");

				  	break;
				case "week":
					var first = today.getDate() - today.getDay(),
					last = first + 6;

					this.set("sdate", new Date(today.setDate(first)));
					this.set("edate", new Date(today.setDate(last)));

				  	break;
				case "month":
					this.set("sdate", new Date(today.getFullYear(), today.getMonth(), 1));
					this.set("edate", new Date(today.getFullYear(), today.getMonth() + 1, 0));

				  	break;
				case "year":
				  	this.set("sdate", new Date(today.getFullYear(), 0, 1));
				  	this.set("edate", new Date(today.getFullYear(), 11, 31));

				  	break;
				default:
					this.set("sdate", "");
				  	this.set("edate", "");
			}
		},
		search				: function(){
			var self = this, para = [],
				obj = this.get("obj"),
				start = this.get("sdate"),
        		end = this.get("edate"),
        		displayDate = "";

        	//Items
            if(obj.itemIds.length>0){
            	var itemIds = [];
            	$.each(obj.itemIds, function(index, value){
            		itemIds.push(value);
            	});
	            para.push({ field:"item_id", operator:"where_in", value:itemIds });
	        }

        	//Dates
        	if(start && end){
        		start = new Date(start);
        		end = new Date(end);
        		displayDate = "From " + kendo.toString(start, "dd-MM-yyyy") + " To " + kendo.toString(end, "dd-MM-yyyy");
        		end.setDate(end.getDate()+1);

            	para.push({ field:"issued_date >=", operator:"where_related_transaction", value: kendo.toString(start, "yyyy-MM-dd") });
            	para.push({ field:"issued_date <", operator:"where_related_transaction", value: kendo.toString(end, "yyyy-MM-dd") });
            }else if(start){
            	start = new Date(start);
            	displayDate = "On " + kendo.toString(start, "dd-MM-yyyy");

            	para.push({ field:"issued_date", operator:"where_related_transaction", value: kendo.toString(start, "yyyy-MM-dd") });
            }else if(end){
            	end = new Date(end);
            	displayDate = "As Of " + kendo.toString(end, "dd-MM-yyyy");
        		end.setDate(end.getDate()+1);

            	para.push({ field:"issued_date <", operator:"where_related_transaction", value: kendo.toString(end, "yyyy-MM-dd") });
            }else{

            }
            this.set("displayDate", displayDate);

            this.dataSource.query({
            	filter:para
            }).then(function(){
            	var view = self.dataSource.view();

            	var txnCount = 0, amount = 0;
            	$.each(view, function(index, value){
            		$.each(value.line, function(ind, val){
	            		txnCount++;
	            		amount += val.amount;
            		});
            	});

            	var avgSale = 0;
            	if(txnCount>0){
            		avgSale = amount/txnCount;
            	}

            	self.set("product_sale", kendo.toString(avgSale, "c2", banhji.locale));
            	self.set("total_sale", kendo.toString(amount, "c2", banhji.locale));
            });
            this.dataSource.bind("requestEnd", function(e){
				if(e.type=="read"){
					var response = e.response, balanceCal = 0, balance= 0;
					self.exArray = [];

					self.exArray.push({
	            		cells: [
	            			{ value: self.company.name, textAlign: "center", colSpan: 7}
	            		]
	            	});
	            	self.exArray.push({
	            		cells: [
	            			{ value: "Sale Detail by Product/Service",bold: true, fontSize: 20, textAlign: "center", colSpan: 7 }
	            		]
	            	});
	            	if(self.displayDate){
		            	self.exArray.push({
		            		cells: [
		            			{ value: self.displayDate, textAlign: "center", colSpan: 7 }
		            		]
		            	});
		            }
	            	self.exArray.push({
	            		cells: [
	            			{ value: "", colSpan: 7 }
	            		]
	            	});
	            	self.exArray.push({
	            		cells: [
							{ value: "Type", background: "#496cad", color: "#ffffff" },
							{ value: "Customer", background: "#496cad", color: "#ffffff" },
							{ value: "Invoice Date", background: "#496cad", color: "#ffffff" },
							{ value: "Reference", background: "#496cad", color: "#ffffff" },
							{ value: "QTY", background: "#496cad", color: "#ffffff" },
							{ value: "Price", background: "#496cad", color: "#ffffff" },
							{ value: "Amount", background: "#496cad", color: "#ffffff" },
						]
					});
					for (var i = 0; i < response.results.length; i++){
						self.exArray.push({
					        cells: [
					          	{ value: response.results[i].name, bold: true, },
					            { value: "" },
					            { value: "" },
					            { value: "" },
					            { value: "" },
					            { value: "" },
					            { value: "" },
					        ]

					    });
					    for(var j = 0; j < response.results[i].line.length; j++){
					    	var aaa = response.results[i].line[j].quantity + response.results[i].line[j].measurement;
				          	self.exArray.push({
				          		cells: [
				          	  		{ value: response.results[i].line[j].type },
				              		{ value: response.results[i].line[j].customer },
				              		{ value: response.results[i].line[j].issued_date},
				              		{ value: response.results[i].line[j].number },
				              		{ value: aaa},
				              		{ value: response.results[i].line[j].price },
				              		{ value: response.results[i].line[j].amount },
				            	]
				          	});
				        }
				    	self.exArray.push({
					        cells: [
					          	{ value: "", colSpan: 7}
					        ]
					    });
					}
				}
			});
		},
		printGrid			: function() {
			var gridElement = $('#grid'),
		        printableContent = '',
		        win = window.open('', '', 'width=990, height=900'),
		        doc = win.document.open();
		    var htmlStart =
		            '<!DOCTYPE html>' +
		            '<html>' +
		            '<head>' +
		            '<meta charset="utf-8" />' +
		            '<title></title>' +
		            '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />'+
		            '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
		            '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/responsive.css">' +
		            '<link href="<?php echo base_url(); ?>assets/invoice/invoice.css" rel="stylesheet" />'+
		            '<link href="https://fonts.googleapis.com/css?family=Content:400,700" rel="stylesheet" type="text/css">' +
		            '<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">' +
		            '<style>' +
		            'html { font: 11pt sans-serif; }' +
		            '.k-grid { border-top-width: 0; }' +
		            '.k-grid, .k-grid-content { height: auto !important; }' +
		            '.k-grid-content { overflow: visible !important; }' +
		            'div.k-grid table { table-layout: auto; width: 100% !important; }' +
		            '.k-grid .k-grid-header th { border-top: 1px solid; }' +
		            '.k-grid-toolbar, .k-grid-pager > .k-link { display: none; }' +
		            '</style><style type="text/css" media="print"> @page { size: portrait; margin:1mm; }'+
		            	'.inv1 .main-color {' +

		            		'-webkit-print-color-adjust:exact; ' +
		            	'} ' +
		            	'.table.table-borderless.table-condensed  tr th { background-color: #1E4E78!important;' +
		            	'-webkit-print-color-adjust:exact; color:#fff!important;}' +
		            	'.table.table-borderless.table-condensed  tr th * { color: #fff!important; -webkit-print-color-adjust:exact;}' +
		            	'.inv1 .light-blue-td { ' +
		            		'background-color: #c6d9f1!important;' +
		            		'text-align: left;' +
		            		'padding-left: 5px;' +
		            		'-webkit-print-color-adjust:exact; ' +
		            	'}' +
		            	'.saleSummaryCustomer .table.table-borderless.table-condensed tr td { ' +
    						'background-color: #F2F2F2!important; -webkit-print-color-adjust:exact;' +
						'}'+
						'.saleSummaryCustomer .table.table-borderless.table-condensed tr:nth-child(2n+1) td { ' +
    						' background-color: #fff!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.journal_block1>.span2 *, .journal_block1>.span5 * {color: #fff!important;}' +
		            	'.journal_block1>.span2:first-child { ' +
    						'background-color: #bbbbbb!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.journal_block1>.span5:last-child {' +
							'background-color: #496cad!important; color: #fff!important; -webkit-print-color-adjust:exact; ' +
						'}' +
						'.journal_block1>.span5 {' +
							'background-color: #5cc7dd!important; color: #fff!important; -webkit-print-color-adjust:exact;' +
						'}' +
		            	'.saleSummaryCustomer .table.table-borderless.table-condensed tfoot .bg-total td {' +
		            		'background-color: #1C2633!important;' +
		            		'color: #fff!important; ' +
		            		'-webkit-print-color-adjust:exact;' +
		            	'}' +
		            	'</style>' +
		            '</head>' +
		            '<body><div class="saleSummaryCustomer" style="padding: 0 10px;">';
		    var htmlEnd =
		            '</div></body>' +
		            '</html>';

		    printableContent = $('#invFormContent').html();
		    doc.write(htmlStart + printableContent + htmlEnd);
		    doc.close();
		    setTimeout(function(){
		    	win.print();
		    	win.close();
		    },2000);
		},
		ExportExcel 		: function(){
	        var workbook = new kendo.ooxml.Workbook({
	          sheets: [
	            {
	              columns: [
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true }
	              ],
	              title: "Sale Detail by Product/Service",
	              rows: this.exArray
	            }
	          ]
	        });
	        //save the file as Excel file with extension xlsx
	        kendo.saveAs({dataURI: workbook.toDataURL(), fileName: "saleDetailProduct.xlsx"});
		}
	});
	banhji.cashSaleSummaryByCustomer =  kendo.observable({
		lang 				: langVM,
		dataSource 			: dataStore(apiUrl + "sales/cashSale_summary_by_customer"),
		contactDS  			: banhji.source.customerDS,
		sortList			: banhji.source.sortList,
		sorter 				: "month",
		sdate 				: "",
		edate 				: "",
		obj 				: { contactIds: [] },
		company 			: banhji.institute,
		displayDate 		: "",
		totalAmount 		: 0,
		exArray 			: [],
		pageLoad 			: function(){
			this.search();
		},
		sorterChanges 		: function(){
	        var today = new Date(),
        	sdate = "",
        	edate = "",
        	sorter = this.get("sorter");

			switch(sorter){
				case "today":
					this.set("sdate", today);
					this.set("edate", "");

				  	break;
				case "week":
					var first = today.getDate() - today.getDay(),
					last = first + 6;

					this.set("sdate", new Date(today.setDate(first)));
					this.set("edate", new Date(today.setDate(last)));

				  	break;
				case "month":
					this.set("sdate", new Date(today.getFullYear(), today.getMonth(), 1));
					this.set("edate", new Date(today.getFullYear(), today.getMonth() + 1, 0));

				  	break;
				case "year":
				  	this.set("sdate", new Date(today.getFullYear(), 0, 1));
				  	this.set("edate", new Date(today.getFullYear(), 11, 31));

				  	break;
				default:
					this.set("sdate", "");
				  	this.set("edate", "");
			}
		},
		search				: function(){
			var self = this, para = [],
				obj = this.get("obj"),
				start = this.get("sdate"),
        		end = this.get("edate"),
        		displayDate = "";

        	//Customer
            if(obj.contactIds.length>0){
            	var contactIds = [];
            	$.each(obj.contactIds, function(index, value){
            		contactIds.push(value);
            	});
	            para.push({ field:"contact_id", operator:"where_in", value:contactIds });
	        }

        	//Dates
        	if(start && end){
        		start = new Date(start);
        		end = new Date(end);
        		displayDate = "From " + kendo.toString(start, "dd-MM-yyyy") + " To " + kendo.toString(end, "dd-MM-yyyy");
        		end.setDate(end.getDate()+1);

            	para.push({ field:"issued_date >=", value: kendo.toString(start, "yyyy-MM-dd") });
            	para.push({ field:"issued_date <", value: kendo.toString(end, "yyyy-MM-dd") });
            }else if(start){
            	start = new Date(start);
            	displayDate = "On " + kendo.toString(start, "dd-MM-yyyy");

            	para.push({ field:"issued_date", value: kendo.toString(start, "yyyy-MM-dd") });
            }else if(end){
            	end = new Date(end);
            	displayDate = "As Of " + kendo.toString(end, "dd-MM-yyyy");
        		end.setDate(end.getDate()+1);

            	para.push({ field:"issued_date <", value: kendo.toString(end, "yyyy-MM-dd") });
            }else{

            }
            this.set("displayDate", displayDate);

            this.dataSource.query({
            	filter:para
            }).then(function(){
            	var view = self.dataSource.view();

            	var amount = 0;
            	$.each(view, function(index, value){
            		amount += value.amount;
            	});

            	self.set("totalAmount", kendo.toString(amount, "c2", banhji.locale));
            });
            this.dataSource.bind("requestEnd", function(e){
				if(e.type=="read"){
					var response = e.response;
					self.exArray = [];

					self.exArray.push({
	            		cells: [
	            			{ value: self.company.name, textAlign: "center", colSpan: 3}
	            		]
	            	});
	            	self.exArray.push({
	            		cells: [
	            			{ value: "Cash Sale Summary by Customer",bold: true, fontSize: 20, textAlign: "center", colSpan: 3}
	            		]
	            	});
	            	if(self.displayDate){
		            	self.exArray.push({
		            		cells: [
		            			{ value: self.displayDate, textAlign: "center", colSpan: 3}
		            		]
		            	});
		            };
	            	self.exArray.push({
	            		cells: [
	            			{ value: "", colSpan: 3}
	            		]
	            	});
	            	self.exArray.push({
	            		cells: [
							{ value: "Customer", background: "#496cad", color: "#ffffff" },
							{ value: "Number of Cash Sale", background: "#496cad", color: "#ffffff" },
							{ value: "Total", background: "#496cad", color: "#ffffff" },
						]
					});
	            	for (var i = 0; i < response.results.length; i++){
				          	self.exArray.push({
				          		cells: [
				          	  		{ value: response.results[i].name },
				          	  		{ value: response.results[i].cash_sale_count },
				              		{ value: kendo.parseFloat(response.results[i].amount)},
				            	]
				          	});
					    self.exArray.push({
					        cells: [
					          	{ value: "", colSpan: 3 }
					        ]
					    });
					}
				}
			});
		},
		printGrid			: function() {
			var gridElement = $('#grid'),
		        printableContent = '',
		        win = window.open('', '', 'width=990, height=900'),
		        doc = win.document.open();
		    var htmlStart =
		            '<!DOCTYPE html>' +
		            '<html>' +
		            '<head>' +
		            '<meta charset="utf-8" />' +
		            '<title></title>' +
		            '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />'+
		            '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
		            '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/responsive.css">' +
		            '<link href="<?php echo base_url(); ?>assets/invoice/invoice.css" rel="stylesheet" />'+
		            '<link href="https://fonts.googleapis.com/css?family=Content:400,700" rel="stylesheet" type="text/css">' +
		            '<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">' +
		            '<style>' +
		            'html { font: 11pt sans-serif; }' +
		            '.k-grid { border-top-width: 0; }' +
		            '.k-grid, .k-grid-content { height: auto !important; }' +
		            '.k-grid-content { overflow: visible !important; }' +
		            'div.k-grid table { table-layout: auto; width: 100% !important; }' +
		            '.k-grid .k-grid-header th { border-top: 1px solid; }' +
		            '.k-grid-toolbar, .k-grid-pager > .k-link { display: none; }' +
		            '</style><style type="text/css" media="print"> @page { size: portrait; margin:1mm; }'+
		            	'.inv1 .main-color {' +

		            		'-webkit-print-color-adjust:exact; ' +
		            	'} ' +
		            	'.table.table-borderless.table-condensed  tr th { background-color: #1E4E78!important;' +
		            	'-webkit-print-color-adjust:exact; color:#fff!important;}' +
		            	'.table.table-borderless.table-condensed  tr th * { color: #fff!important; -webkit-print-color-adjust:exact;}' +
		            	'.inv1 .light-blue-td { ' +
		            		'background-color: #c6d9f1!important;' +
		            		'text-align: left;' +
		            		'padding-left: 5px;' +
		            		'-webkit-print-color-adjust:exact; ' +
		            	'}' +
		            	'.saleSummaryCustomer .table.table-borderless.table-condensed tr td { ' +
    						'background-color: #F2F2F2!important; -webkit-print-color-adjust:exact;' +
						'}'+
						'.saleSummaryCustomer .table.table-borderless.table-condensed tr:nth-child(2n+1) td { ' +
    						' background-color: #fff!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.journal_block1>.span2 *, .journal_block1>.span5 * {color: #fff!important;}' +
		            	'.journal_block1>.span2:first-child { ' +
    						'background-color: #bbbbbb!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.journal_block1>.span5:last-child {' +
							'background-color: #496cad!important; color: #fff!important; -webkit-print-color-adjust:exact; ' +
						'}' +
						'.journal_block1>.span5 {' +
							'background-color: #5cc7dd!important; color: #fff!important; -webkit-print-color-adjust:exact;' +
						'}' +
		            	'.saleSummaryCustomer .table.table-borderless.table-condensed tfoot .bg-total td {' +
		            		'background-color: #1C2633!important;' +
		            		'color: #fff!important; ' +
		            		'-webkit-print-color-adjust:exact;' +
		            	'}' +
		            	'</style>' +
		            '</head>' +
		            '<body><div class="saleSummaryCustomer" style="padding: 0 10px;">';
		    var htmlEnd =
		            '</div></body>' +
		            '</html>';

		    printableContent = $('#invFormContent').html();
		    doc.write(htmlStart + printableContent + htmlEnd);
		    doc.close();
		    setTimeout(function(){
		    	win.print();
		    	win.close();
		    },2000);
		},
		ExportExcel 		: function(){
	        var workbook = new kendo.ooxml.Workbook({
	          sheets: [
	            {
	              columns: [
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	              ],
	              title: "Cash Sale Summary by Customer",
	              rows: this.exArray
	            }
	          ]
	        });
	        //save the file as Excel file with extension xlsx
	        kendo.saveAs({dataURI: workbook.toDataURL(), fileName: "cashSaleSummaryCustomer.xlsx"});
		}
	});
	banhji.cashSaleDetailByCustomer =  kendo.observable({
		lang 				: langVM,
		dataSource 			: dataStore(apiUrl + "sales/cashSale_detail_by_customer"),
		contactDS  			: banhji.source.customerDS,
		sortList			: banhji.source.sortList,
		sorter 				: "month",
		sdate 				: "",
		edate 				: "",
		obj 				: { contactIds: [] },
		company 			: banhji.institute,
		displayDate 		: "",
		totalAmount 		: 0,
		exArray 			: [],
		pageLoad 			: function(){
			this.search();
		},
		sorterChanges 		: function(){
	        var today = new Date(),
        	sdate = "",
        	edate = "",
        	sorter = this.get("sorter");

			switch(sorter){
				case "today":
					this.set("sdate", today);
					this.set("edate", "");

				  	break;
				case "week":
					var first = today.getDate() - today.getDay(),
					last = first + 6;

					this.set("sdate", new Date(today.setDate(first)));
					this.set("edate", new Date(today.setDate(last)));

				  	break;
				case "month":
					this.set("sdate", new Date(today.getFullYear(), today.getMonth(), 1));
					this.set("edate", new Date(today.getFullYear(), today.getMonth() + 1, 0));

				  	break;
				case "year":
				  	this.set("sdate", new Date(today.getFullYear(), 0, 1));
				  	this.set("edate", new Date(today.getFullYear(), 11, 31));

				  	break;
				default:
					this.set("sdate", "");
				  	this.set("edate", "");
			}
		},
		search				: function(){
			var self = this, para = [],
				obj = this.get("obj"),
				start = this.get("sdate"),
        		end = this.get("edate"),
        		displayDate = "";

        	//Customer
            if(obj.contactIds.length>0){
            	var contactIds = [];
            	$.each(obj.contactIds, function(index, value){
            		contactIds.push(value);
            	});
	            para.push({ field:"contact_id", operator:"where_in", value:contactIds });
	        }

        	//Dates
        	if(start && end){
        		start = new Date(start);
        		end = new Date(end);
        		displayDate = "From " + kendo.toString(start, "dd-MM-yyyy") + " To " + kendo.toString(end, "dd-MM-yyyy");
        		end.setDate(end.getDate()+1);

            	para.push({ field:"issued_date >=", value: kendo.toString(start, "yyyy-MM-dd") });
            	para.push({ field:"issued_date <", value: kendo.toString(end, "yyyy-MM-dd") });
            }else if(start){
            	start = new Date(start);
            	displayDate = "On " + kendo.toString(start, "dd-MM-yyyy");

            	para.push({ field:"issued_date", value: kendo.toString(start, "yyyy-MM-dd") });
            }else if(end){
            	end = new Date(end);
            	displayDate = "As Of " + kendo.toString(end, "dd-MM-yyyy");
        		end.setDate(end.getDate()+1);

            	para.push({ field:"issued_date <", value: kendo.toString(end, "yyyy-MM-dd") });
            }else{

            }
            this.set("displayDate", displayDate);

            this.dataSource.query({
            	filter:para
            }).then(function(){
            	var view = self.dataSource.view();

            	var amount = 0;
            	$.each(view, function(index, value){
            		$.each(value.line, function(ind, val){
	            		amount += val.amount;
	            	});
            	});

            	self.set("totalAmount", kendo.toString(amount, "c2", banhji.locale));
            });
            this.dataSource.bind("requestEnd", function(e){
				if(e.type=="read"){
					var response = e.response, balanceCal = 0, balance= 0;
					self.exArray = [];

					self.exArray.push({
	            		cells: [
	            			{ value: self.company.name, textAlign: "center", colSpan: 4}
	            		]
	            	});
	            	self.exArray.push({
	            		cells: [
	            			{ value: "Cash Sale Detail by Customer",bold: true, fontSize: 20, textAlign: "center", colSpan: 4 }
	            		]
	            	});
	            	if(self.displayDate){
		            	self.exArray.push({
		            		cells: [
		            			{ value: self.displayDate, textAlign: "center", colSpan: 4 }
		            		]
		            	});
		            }
	            	self.exArray.push({
	            		cells: [
	            			{ value: "", colSpan: 4 }
	            		]
	            	});
	            	self.exArray.push({
	            		cells: [
							{ value: "Type", background: "#496cad", color: "#ffffff" },
							{ value: "Date", background: "#496cad", color: "#ffffff" },
							{ value: "Reference", background: "#496cad", color: "#ffffff" },
							{ value: "Amount", background: "#496cad", color: "#ffffff" },
						]
					});
					for (var i = 0; i < response.results.length; i++){
						self.exArray.push({
					        cells: [
					          	{ value: response.results[i].name, bold: true, },
					            { value: "" },
					            { value: "" },
					            { value: "" },
					        ]

					    });
					    for(var j = 0; j < response.results[i].line.length; j++){
					    	balance += response.results[i].line[j].amount;
				          	self.exArray.push({
				          		cells: [
				          	  		{ value: response.results[i].line[j].type },
				              		{ value: response.results[i].line[j].issued_date },
				              		{ value: response.results[i].line[j].number},
				              		{ value: response.results[i].line[j].amount },
				            	]
				          	});
				        }
				    	self.exArray.push({
					        cells: [
					          	{ value: "", colSpan: 4 }
					        ]
					    });
					}
				}
			});
		},
		printGrid			: function() {
			var gridElement = $('#grid'),
		        printableContent = '',
		        win = window.open('', '', 'width=990, height=900'),
		        doc = win.document.open();
		    var htmlStart =
		            '<!DOCTYPE html>' +
		            '<html>' +
		            '<head>' +
		            '<meta charset="utf-8" />' +
		            '<title></title>' +
		            '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />'+
		            '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
		            '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/responsive.css">' +
		            '<link href="<?php echo base_url(); ?>assets/invoice/invoice.css" rel="stylesheet" />'+
		            '<link href="https://fonts.googleapis.com/css?family=Content:400,700" rel="stylesheet" type="text/css">' +
		            '<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">' +
		            '<style>' +
		            'html { font: 11pt sans-serif; }' +
		            '.k-grid { border-top-width: 0; }' +
		            '.k-grid, .k-grid-content { height: auto !important; }' +
		            '.k-grid-content { overflow: visible !important; }' +
		            'div.k-grid table { table-layout: auto; width: 100% !important; }' +
		            '.k-grid .k-grid-header th { border-top: 1px solid; }' +
		            '.k-grid-toolbar, .k-grid-pager > .k-link { display: none; }' +
		            '</style><style type="text/css" media="print"> @page { size: portrait; margin:1mm; }'+
		            	'.inv1 .main-color {' +

		            		'-webkit-print-color-adjust:exact; ' +
		            	'} ' +
		            	'.table.table-borderless.table-condensed  tr th { background-color: #1E4E78!important;' +
		            	'-webkit-print-color-adjust:exact; color:#fff!important;}' +
		            	'.table.table-borderless.table-condensed  tr th * { color: #fff!important; -webkit-print-color-adjust:exact;}' +
		            	'.inv1 .light-blue-td { ' +
		            		'background-color: #c6d9f1!important;' +
		            		'text-align: left;' +
		            		'padding-left: 5px;' +
		            		'-webkit-print-color-adjust:exact; ' +
		            	'}' +
		            	'.saleSummaryCustomer .table.table-borderless.table-condensed tr td { ' +
    						'background-color: #F2F2F2!important; -webkit-print-color-adjust:exact;' +
						'}'+
						'.saleSummaryCustomer .table.table-borderless.table-condensed tr:nth-child(2n+1) td { ' +
    						' background-color: #fff!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.journal_block1>.span2 *, .journal_block1>.span5 * {color: #fff!important;}' +
		            	'.journal_block1>.span2:first-child { ' +
    						'background-color: #bbbbbb!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.journal_block1>.span5:last-child {' +
							'background-color: #496cad!important; color: #fff!important; -webkit-print-color-adjust:exact; ' +
						'}' +
						'.journal_block1>.span5 {' +
							'background-color: #5cc7dd!important; color: #fff!important; -webkit-print-color-adjust:exact;' +
						'}' +
		            	'.saleSummaryCustomer .table.table-borderless.table-condensed tfoot .bg-total td {' +
		            		'background-color: #1C2633!important;' +
		            		'color: #fff!important; ' +
		            		'-webkit-print-color-adjust:exact;' +
		            	'}' +
		            	'</style>' +
		            '</head>' +
		            '<body><div class="saleSummaryCustomer" style="padding: 0 10px;">';
		    var htmlEnd =
		            '</div></body>' +
		            '</html>';

		    printableContent = $('#invFormContent').html();
		    doc.write(htmlStart + printableContent + htmlEnd);
		    doc.close();
		    setTimeout(function(){
		    	win.print();
		    	win.close();
		    },2000);
		},
		ExportExcel 		: function(){
	        var workbook = new kendo.ooxml.Workbook({
	          sheets: [
	            {
	              columns: [
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	              ],
	              title: "Cash Sale Detail by Customer",
	              rows: this.exArray
	            }
	          ]
	        });
	        //save the file as Excel file with extension xlsx
	        kendo.saveAs({dataURI: workbook.toDataURL(), fileName: "cashSaleDetailCustomer.xlsx"});
		}
	});
	banhji.cashSaleSummaryByProduct =  kendo.observable({
		lang 				: langVM,
		dataSource 			: dataStore(apiUrl + "sales/cashSale_summary_by_product"),
		itemDS				: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + "items",
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
			filter:[
		    	{ field: "is_catalog <>", value: 1 },
		        { field: "is_assembly <>", value: 1 },
		      	{ field: "item_type_id", operator:"where_in", value: [1,4] }
		    ],
			sort:[
				{ field:"item_type_id", dir:"asc" },
				{ field:"number", dir:"asc" }
			],
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page:1,
			pageSize: 100
		}),
		sortList			: banhji.source.sortList,
		sorter 				: "month",
		sdate 				: "",
		edate 				: "",
		obj 				: { itemIds: [] },
		company 			: banhji.institute,
		displayDate 		: "",
		avg_sale 			: 0,
		total_sale 			: 0,
		exArray 			: [],
		pageLoad 			: function(){
			this.search();
		},
		sorterChanges 		: function(){
	        var today = new Date(),
        	sdate = "",
        	edate = "",
        	sorter = this.get("sorter");

			switch(sorter){
				case "today":
					this.set("sdate", today);
					this.set("edate", "");

				  	break;
				case "week":
					var first = today.getDate() - today.getDay(),
					last = first + 6;

					this.set("sdate", new Date(today.setDate(first)));
					this.set("edate", new Date(today.setDate(last)));

				  	break;
				case "month":
					this.set("sdate", new Date(today.getFullYear(), today.getMonth(), 1));
					this.set("edate", new Date(today.getFullYear(), today.getMonth() + 1, 0));

				  	break;
				case "year":
				  	this.set("sdate", new Date(today.getFullYear(), 0, 1));
				  	this.set("edate", new Date(today.getFullYear(), 11, 31));

				  	break;
				default:
					this.set("sdate", "");
				  	this.set("edate", "");
			}
		},
		search				: function(){
			var self = this, para = [],
				obj = this.get("obj"),
				start = this.get("sdate"),
        		end = this.get("edate"),
        		displayDate = "";

        	//Customer
            if(obj.itemIds.length>0){
            	var itemIds = [];
            	$.each(obj.itemIds, function(index, value){
            		itemIds.push(value);
            	});
	            para.push({ field:"item_id", operator:"where_in", value:itemIds });
	        }

        	//Dates
        	if(start && end){
        		start = new Date(start);
        		end = new Date(end);
        		displayDate = "From " + kendo.toString(start, "dd-MM-yyyy") + " To " + kendo.toString(end, "dd-MM-yyyy");
        		end.setDate(end.getDate()+1);

            	para.push({ field:"issued_date >=", operator:"where_related_transaction", value: kendo.toString(start, "yyyy-MM-dd") });
            	para.push({ field:"issued_date <", operator:"where_related_transaction", value: kendo.toString(end, "yyyy-MM-dd") });
            }else if(start){
            	start = new Date(start);
            	displayDate = "On " + kendo.toString(start, "dd-MM-yyyy");

            	para.push({ field:"issued_date", operator:"where_related_transaction", value: kendo.toString(start, "yyyy-MM-dd") });
            }else if(end){
            	end = new Date(end);
            	displayDate = "As Of " + kendo.toString(end, "dd-MM-yyyy");
        		end.setDate(end.getDate()+1);

            	para.push({ field:"issued_date <", operator:"where_related_transaction", value: kendo.toString(end, "yyyy-MM-dd") });
            }else{

            }
            this.set("displayDate", displayDate);

            this.dataSource.query({
            	filter:para
            }).then(function(){
            	var view = self.dataSource.view();

            	var txnCount = 0, amount = 0;
            	$.each(view, function(index, value){
            		txnCount += value.txn_count;
            		amount += value.amount;
            	});

            	var avgSale = 0;
            	if(txnCount>0){
            		avgSale = amount/txnCount;
            	}

            	self.set("avg_sale", kendo.toString(avgSale, "c2", banhji.locale));
            	self.set("total_sale", kendo.toString(amount, "c2", banhji.locale));
            });
            this.dataSource.bind("requestEnd", function(e){
				if(e.type=="read"){
					var response = e.response;
					self.exArray = [];

					self.exArray.push({
	            		cells: [
	            			{ value: self.company.name, textAlign: "center", colSpan: 6}
	            		]
	            	});
	            	self.exArray.push({
	            		cells: [
	            			{ value: "Cash Sale Summary by Product/Service",bold: true, fontSize: 20, textAlign: "center", colSpan: 6}
	            		]
	            	});
	            	if(self.displayDate){
		            	self.exArray.push({
		            		cells: [
		            			{ value: self.displayDate, textAlign: "center", colSpan: 6}
		            		]
		            	});
		            };
	            	self.exArray.push({
	            		cells: [
	            			{ value: "", colSpan: 6}
	            		]
	            	});
	            	self.exArray.push({
	            		cells: [
							{ value: "Item", background: "#496cad", color: "#ffffff" },
							{ value: "QTY", background: "#496cad", color: "#ffffff" },
							{ value: "Amount", background: "#496cad", color: "#ffffff" },
							{ value: "AVG Price", background: "#496cad", color: "#ffffff" },
							{ value: "AVG Cost", background: "#496cad", color: "#ffffff" },
							{ value: "Gross Profit Margin", background: "#496cad", color: "#ffffff" },
						]
					});
	            	for (var i = 0; i < response.results.length; i++){
				          	self.exArray.push({
				          		cells: [
				          	  		{ value: response.results[i].name },
				          	  		{ value: response.results[i].quantity },
				          	  		{ value: kendo.parseFloat(response.results[i].amount)},
				          	  		{ value: response.results[i].avg_price },
				          	  		{ value: response.results[i].avg_cost },
				          	  		{ value: response.results[i].gpm },

				            	]
				          	});
					    self.exArray.push({
					        cells: [
					          	{ value: "", colSpan: 6}
					        ]
					    });
					}
				}
			});
		},
		printGrid			: function() {
			var gridElement = $('#grid'),
		        printableContent = '',
		        win = window.open('', '', 'width=990, height=900'),
		        doc = win.document.open();
		    var htmlStart =
		            '<!DOCTYPE html>' +
		            '<html>' +
		            '<head>' +
		            '<meta charset="utf-8" />' +
		            '<title></title>' +
		            '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />'+
		            '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
		            '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/responsive.css">' +
		            '<link href="<?php echo base_url(); ?>assets/invoice/invoice.css" rel="stylesheet" />'+
		            '<link href="https://fonts.googleapis.com/css?family=Content:400,700" rel="stylesheet" type="text/css">' +
		            '<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">' +
		            '<style>' +
		            'html { font: 11pt sans-serif; }' +
		            '.k-grid { border-top-width: 0; }' +
		            '.k-grid, .k-grid-content { height: auto !important; }' +
		            '.k-grid-content { overflow: visible !important; }' +
		            'div.k-grid table { table-layout: auto; width: 100% !important; }' +
		            '.k-grid .k-grid-header th { border-top: 1px solid; }' +
		            '.k-grid-toolbar, .k-grid-pager > .k-link { display: none; }' +
		            '</style><style type="text/css" media="print"> @page { size: portrait; margin:1mm; }'+
		            	'.inv1 .main-color {' +

		            		'-webkit-print-color-adjust:exact; ' +
		            	'} ' +
		            	'.table.table-borderless.table-condensed  tr th { background-color: #1E4E78!important;' +
		            	'-webkit-print-color-adjust:exact; color:#fff!important;}' +
		            	'.table.table-borderless.table-condensed  tr th * { color: #fff!important; -webkit-print-color-adjust:exact;}' +
		            	'.inv1 .light-blue-td { ' +
		            		'background-color: #c6d9f1!important;' +
		            		'text-align: left;' +
		            		'padding-left: 5px;' +
		            		'-webkit-print-color-adjust:exact; ' +
		            	'}' +
		            	'.saleSummaryCustomer .table.table-borderless.table-condensed tr td { ' +
    						'background-color: #F2F2F2!important; -webkit-print-color-adjust:exact;' +
						'}'+
						'.saleSummaryCustomer .table.table-borderless.table-condensed tr:nth-child(2n+1) td { ' +
    						' background-color: #fff!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.journal_block1>.span2 *, .journal_block1>.span5 * {color: #fff!important;}' +
		            	'.journal_block1>.span2:first-child { ' +
    						'background-color: #bbbbbb!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.journal_block1>.span5:last-child {' +
							'background-color: #496cad!important; color: #fff!important; -webkit-print-color-adjust:exact; ' +
						'}' +
						'.journal_block1>.span5 {' +
							'background-color: #5cc7dd!important; color: #fff!important; -webkit-print-color-adjust:exact;' +
						'}' +
		            	'.saleSummaryCustomer .table.table-borderless.table-condensed tfoot .bg-total td {' +
		            		'background-color: #1C2633!important;' +
		            		'color: #fff!important; ' +
		            		'-webkit-print-color-adjust:exact;' +
		            	'}' +
		            	'</style>' +
		            '</head>' +
		            '<body><div class="saleSummaryCustomer" style="padding: 0 10px;">';
		    var htmlEnd =
		            '</div></body>' +
		            '</html>';

		    printableContent = $('#invFormContent').html();
		    doc.write(htmlStart + printableContent + htmlEnd);
		    doc.close();
		    setTimeout(function(){
		    	win.print();
		    	win.close();
		    },2000);
		},
		ExportExcel 		: function(){
	        var workbook = new kendo.ooxml.Workbook({
	          sheets: [
	            {
	              columns: [
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true }
	              ],
	              title: "Cash Sale Summary Product",
	              rows: this.exArray
	            }
	          ]
	        });
	        //save the file as Excel file with extension xlsx
	        kendo.saveAs({dataURI: workbook.toDataURL(), fileName: "cashSaleSummaryProduct.xlsx"});
		}
	});
	banhji.cashSaleDetailByProduct =  kendo.observable({
		lang 				: langVM,
		dataSource 			: dataStore(apiUrl + "sales/cashSale_detail_by_product"),
		itemDS				: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + "items",
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
			filter:[
		    	{ field: "is_catalog <>", value: 1 },
		        { field: "is_assembly <>", value: 1 },
		      	{ field: "item_type_id", operator:"where_in", value: [1,4] }
		    ],
			sort:[
				{ field:"item_type_id", dir:"asc" },
				{ field:"number", dir:"asc" }
			],
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page:1,
			pageSize: 100
		}),
		sortList			: banhji.source.sortList,
		sorter 				: "month",
		sdate 				: "",
		edate 				: "",
		obj 				: { itemIds: [] },
		company 			: banhji.institute,
		displayDate 		: "",
		product_sale 		: 0,
		total_sale 			: 0,
		exArray 			: [],
		pageLoad 			: function(){
			this.search();
		},
		sorterChanges 		: function(){
	        var today = new Date(),
        	sdate = "",
        	edate = "",
        	sorter = this.get("sorter");

			switch(sorter){
				case "today":
					this.set("sdate", today);
					this.set("edate", "");

				  	break;
				case "week":
					var first = today.getDate() - today.getDay(),
					last = first + 6;

					this.set("sdate", new Date(today.setDate(first)));
					this.set("edate", new Date(today.setDate(last)));

				  	break;
				case "month":
					this.set("sdate", new Date(today.getFullYear(), today.getMonth(), 1));
					this.set("edate", new Date(today.getFullYear(), today.getMonth() + 1, 0));

				  	break;
				case "year":
				  	this.set("sdate", new Date(today.getFullYear(), 0, 1));
				  	this.set("edate", new Date(today.getFullYear(), 11, 31));

				  	break;
				default:
					this.set("sdate", "");
				  	this.set("edate", "");
			}
		},
		search				: function(){
			var self = this, para = [],
				obj = this.get("obj"),
				start = this.get("sdate"),
        		end = this.get("edate"),
        		displayDate = "";

        	//Items
            if(obj.itemIds.length>0){
            	var itemIds = [];
            	$.each(obj.itemIds, function(index, value){
            		itemIds.push(value);
            	});
	            para.push({ field:"item_id", operator:"where_in", value:itemIds });
	        }

        	//Dates
        	if(start && end){
        		start = new Date(start);
        		end = new Date(end);
        		displayDate = "From " + kendo.toString(start, "dd-MM-yyyy") + " To " + kendo.toString(end, "dd-MM-yyyy");
        		end.setDate(end.getDate()+1);

            	para.push({ field:"issued_date >=", operator:"where_related_transaction", value: kendo.toString(start, "yyyy-MM-dd") });
            	para.push({ field:"issued_date <", operator:"where_related_transaction", value: kendo.toString(end, "yyyy-MM-dd") });
            }else if(start){
            	start = new Date(start);
            	displayDate = "On " + kendo.toString(start, "dd-MM-yyyy");

            	para.push({ field:"issued_date", operator:"where_related_transaction", value: kendo.toString(start, "yyyy-MM-dd") });
            }else if(end){
            	end = new Date(end);
            	displayDate = "As Of " + kendo.toString(end, "dd-MM-yyyy");
        		end.setDate(end.getDate()+1);

            	para.push({ field:"issued_date <", operator:"where_related_transaction", value: kendo.toString(end, "yyyy-MM-dd") });
            }else{

            }
            this.set("displayDate", displayDate);

            this.dataSource.query({
            	filter:para
            }).then(function(){
            	var view = self.dataSource.view();

            	var txnCount = 0, amount = 0;
            	$.each(view, function(index, value){
            		$.each(value.line, function(ind, val){
	            		txnCount++;
	            		amount += val.amount;
            		});
            	});

            	var avgSale = 0;
            	if(txnCount>0){
            		avgSale = amount/txnCount;
            	}

            	self.set("product_sale", kendo.toString(avgSale, "c2", banhji.locale));
            	self.set("total_sale", kendo.toString(amount, "c2", banhji.locale));
            });
            this.dataSource.bind("requestEnd", function(e){
				if(e.type=="read"){
					var response = e.response, balanceCal = 0, balance= 0;
					self.exArray = [];

					self.exArray.push({
	            		cells: [
	            			{ value: self.company.name, textAlign: "center", colSpan: 4}
	            		]
	            	});
	            	self.exArray.push({
	            		cells: [
	            			{ value: "Sale Detail by Employee",bold: true, fontSize: 20, textAlign: "center", colSpan: 4}
	            		]
	            	});
	            	if(self.displayDate){
		            	self.exArray.push({
		            		cells: [
		            			{ value: self.displayDate, textAlign: "center", colSpan: 4}
		            		]
		            	});
		            }
	            	self.exArray.push({
	            		cells: [
	            			{ value: "", colSpan: 4}
	            		]
	            	});
	            	self.exArray.push({
	            		cells: [
							{ value: "Type", background: "#496cad", color: "#ffffff" },
							{ value: "Date", background: "#496cad", color: "#ffffff" },
							{ value: "Reference", background: "#496cad", color: "#ffffff" },
							{ value: "Amount", background: "#496cad", color: "#ffffff" },
						]
					});
					for (var i = 0; i < response.results.length; i++){
						self.exArray.push({
					        cells: [
					          	{ value: response.results[i].name, bold: true, },
					            { value: "" },
					            { value: "" },
					            { value: "" },
					        ]

					    });
					    for(var j = 0; j < response.results[i].line.length; j++){
					    	balance += response.results[i].line[j].amount;
				          	self.exArray.push({
				          		cells: [
				          	  		{ value: response.results[i].line[j].type },
				              		{ value: response.results[i].line[j].issued_date },
				              		{ value: response.results[i].line[j].number},
				              		{ value: response.results[i].line[j].amount},
				            	]
				          	});
				        }
				    	self.exArray.push({
					        cells: [
					          	{ value: "", colSpan: 7}
					        ]
					    });
					}
				}
			});
		},
		printGrid			: function() {
			var gridElement = $('#grid'),
		        printableContent = '',
		        win = window.open('', '', 'width=990, height=900'),
		        doc = win.document.open();
		    var htmlStart =
		            '<!DOCTYPE html>' +
		            '<html>' +
		            '<head>' +
		            '<meta charset="utf-8" />' +
		            '<title></title>' +
		            '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />'+
		            '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
		            '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/responsive.css">' +
		            '<link href="<?php echo base_url(); ?>assets/invoice/invoice.css" rel="stylesheet" />'+
		            '<link href="https://fonts.googleapis.com/css?family=Content:400,700" rel="stylesheet" type="text/css">' +
		            '<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">' +
		            '<style>' +
		            'html { font: 11pt sans-serif; }' +
		            '.k-grid { border-top-width: 0; }' +
		            '.k-grid, .k-grid-content { height: auto !important; }' +
		            '.k-grid-content { overflow: visible !important; }' +
		            'div.k-grid table { table-layout: auto; width: 100% !important; }' +
		            '.k-grid .k-grid-header th { border-top: 1px solid; }' +
		            '.k-grid-toolbar, .k-grid-pager > .k-link { display: none; }' +
		            '</style><style type="text/css" media="print"> @page { size: portrait; margin:1mm; }'+
		            	'.inv1 .main-color {' +

		            		'-webkit-print-color-adjust:exact; ' +
		            	'} ' +
		            	'.table.table-borderless.table-condensed  tr th { background-color: #1E4E78!important;' +
		            	'-webkit-print-color-adjust:exact; color:#fff!important;}' +
		            	'.table.table-borderless.table-condensed  tr th * { color: #fff!important; -webkit-print-color-adjust:exact;}' +
		            	'.inv1 .light-blue-td { ' +
		            		'background-color: #c6d9f1!important;' +
		            		'text-align: left;' +
		            		'padding-left: 5px;' +
		            		'-webkit-print-color-adjust:exact; ' +
		            	'}' +
		            	'.saleSummaryCustomer .table.table-borderless.table-condensed tr td { ' +
    						'background-color: #F2F2F2!important; -webkit-print-color-adjust:exact;' +
						'}'+
						'.saleSummaryCustomer .table.table-borderless.table-condensed tr:nth-child(2n+1) td { ' +
    						' background-color: #fff!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.journal_block1>.span2 *, .journal_block1>.span5 * {color: #fff!important;}' +
		            	'.journal_block1>.span2:first-child { ' +
    						'background-color: #bbbbbb!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.journal_block1>.span5:last-child {' +
							'background-color: #496cad!important; color: #fff!important; -webkit-print-color-adjust:exact; ' +
						'}' +
						'.journal_block1>.span5 {' +
							'background-color: #5cc7dd!important; color: #fff!important; -webkit-print-color-adjust:exact;' +
						'}' +
		            	'.saleSummaryCustomer .table.table-borderless.table-condensed tfoot .bg-total td {' +
		            		'background-color: #1C2633!important;' +
		            		'color: #fff!important; ' +
		            		'-webkit-print-color-adjust:exact;' +
		            	'}' +
		            	'</style>' +
		            '</head>' +
		            '<body><div class="saleSummaryCustomer" style="padding: 0 10px;">';
		    var htmlEnd =
		            '</div></body>' +
		            '</html>';

		    printableContent = $('#invFormContent').html();
		    doc.write(htmlStart + printableContent + htmlEnd);
		    doc.close();
		    setTimeout(function(){
		    	win.print();
		    	win.close();
		    },2000);
		},
		ExportExcel 		: function(){
	        var workbook = new kendo.ooxml.Workbook({
	          sheets: [
	            {
	              columns: [
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	              ],
	              title: "Sale Detail by Employee",
	              rows: this.exArray
	            }
	          ]
	        });
	        //save the file as Excel file with extension xlsx
	        kendo.saveAs({dataURI: workbook.toDataURL(), fileName: "saleDetailEmployee.xlsx"});
		}
	});
	banhji.saleSummaryByEmployee =  kendo.observable({
		lang 				: langVM,
		dataSource 			: dataStore(apiUrl + "sales/sale_summary_by_employee"),
		contactDS  			: banhji.source.employeeDS,
		sortList			: banhji.source.sortList,
		sorter 				: "month",
		sdate 				: "",
		edate 				: "",
		obj 				: { contactIds: [] },
		company 			: banhji.institute,
		displayDate 		: "",
		totalAmount 		: 0,
		exArray 			: [],
		pageLoad 			: function(){
			this.search();
		},
		sorterChanges 		: function(){
	        var today = new Date(),
        	sdate = "",
        	edate = "",
        	sorter = this.get("sorter");

			switch(sorter){
				case "today":
					this.set("sdate", today);
					this.set("edate", "");

				  	break;
				case "week":
					var first = today.getDate() - today.getDay(),
					last = first + 6;

					this.set("sdate", new Date(today.setDate(first)));
					this.set("edate", new Date(today.setDate(last)));

				  	break;
				case "month":
					this.set("sdate", new Date(today.getFullYear(), today.getMonth(), 1));
					this.set("edate", new Date(today.getFullYear(), today.getMonth() + 1, 0));

				  	break;
				case "year":
				  	this.set("sdate", new Date(today.getFullYear(), 0, 1));
				  	this.set("edate", new Date(today.getFullYear(), 11, 31));

				  	break;
				default:
					this.set("sdate", "");
				  	this.set("edate", "");
			}
		},
		search				: function(){
			var self = this, para = [],
				obj = this.get("obj"),
				start = this.get("sdate"),
        		end = this.get("edate"),
        		displayDate = "";

        	//Customer
            if(obj.contactIds.length>0){
            	var contactIds = [];
            	$.each(obj.contactIds, function(index, value){
            		contactIds.push(value);
            	});
	            para.push({ field:"contact_id", operator:"where_in", value:contactIds });
	        }

        	//Dates
        	if(start && end){
        		start = new Date(start);
        		end = new Date(end);
        		displayDate = "From " + kendo.toString(start, "dd-MM-yyyy") + " To " + kendo.toString(end, "dd-MM-yyyy");
        		end.setDate(end.getDate()+1);

            	para.push({ field:"issued_date >=", value: kendo.toString(start, "yyyy-MM-dd") });
            	para.push({ field:"issued_date <", value: kendo.toString(end, "yyyy-MM-dd") });
            }else if(start){
            	start = new Date(start);
            	displayDate = "On " + kendo.toString(start, "dd-MM-yyyy");

            	para.push({ field:"issued_date", value: kendo.toString(start, "yyyy-MM-dd") });
            }else if(end){
            	end = new Date(end);
            	displayDate = "As Of " + kendo.toString(end, "dd-MM-yyyy");
        		end.setDate(end.getDate()+1);

            	para.push({ field:"issued_date <", value: kendo.toString(end, "yyyy-MM-dd") });
            }else{

            }
            this.set("displayDate", displayDate);

            this.dataSource.query({
            	filter:para
            }).then(function(){
            	var view = self.dataSource.view();

            	var amount = 0;
            	$.each(view, function(index, value){
            		amount += value.amount;
            	});

            	self.set("totalAmount", kendo.toString(amount, "c2", banhji.locale));
            });
            this.dataSource.bind("requestEnd", function(e){
				if(e.type=="read"){
					var response = e.response;
					self.exArray = [];

					self.exArray.push({
	            		cells: [
	            			{ value: self.company.name, textAlign: "center", colSpan: 4 }
	            		]
	            	});
	            	self.exArray.push({
	            		cells: [
	            			{ value: "Sale Summary by Employee",bold: true, fontSize: 20, textAlign: "center", colSpan: 4 }
	            		]
	            	});
	            	if(self.displayDate){
		            	self.exArray.push({
		            		cells: [
		            			{ value: self.displayDate, textAlign: "center", colSpan: 4 }
		            		]
		            	});
		            };
	            	self.exArray.push({
	            		cells: [
	            			{ value: "", colSpan: 4 }
	            		]
	            	});
	            	self.exArray.push({
	            		cells: [
							{ value: "Employee", background: "#496cad", color: "#ffffff" },
							{ value: "Number of Invoice", background: "#496cad", color: "#ffffff" },
							{ value: "Number of Cash Sale", background: "#496cad", color: "#ffffff" },
							{ value: "Total Sale", background: "#496cad", color: "#ffffff" },
						]
					});
	            	for (var i = 0; i < response.results.length; i++){
				          	self.exArray.push({
				          		cells: [
				          	  		{ value: response.results[i].name },
				          	  		{ value: response.results[i].invoice_count },
				          	  		{ value: response.results[i].cash_sale_count },
				              		{ value: kendo.parseFloat(response.results[i].amount)},
				            	]
				          	});
					    self.exArray.push({
					        cells: [
					          	{ value: "", colSpan: 4}
					        ]
					    });
					}
				}
			});
		},
		printGrid			: function() {
			var gridElement = $('#grid'),
		        printableContent = '',
		        win = window.open('', '', 'width=990, height=900'),
		        doc = win.document.open();
		    var htmlStart =
		            '<!DOCTYPE html>' +
		            '<html>' +
		            '<head>' +
		            '<meta charset="utf-8" />' +
		            '<title></title>' +
		            '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />'+
		            '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
		            '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/responsive.css">' +
		            '<link href="<?php echo base_url(); ?>assets/invoice/invoice.css" rel="stylesheet" />'+
		            '<link href="https://fonts.googleapis.com/css?family=Content:400,700" rel="stylesheet" type="text/css">' +
		            '<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">' +
		            '<style>' +
		            'html { font: 11pt sans-serif; }' +
		            '.k-grid { border-top-width: 0; }' +
		            '.k-grid, .k-grid-content { height: auto !important; }' +
		            '.k-grid-content { overflow: visible !important; }' +
		            'div.k-grid table { table-layout: auto; width: 100% !important; }' +
		            '.k-grid .k-grid-header th { border-top: 1px solid; }' +
		            '.k-grid-toolbar, .k-grid-pager > .k-link { display: none; }' +
		            '</style><style type="text/css" media="print"> @page { size: portrait; margin:1mm; }'+
		            	'.inv1 .main-color {' +

		            		'-webkit-print-color-adjust:exact; ' +
		            	'} ' +
		            	'.table.table-borderless.table-condensed  tr th { background-color: #1E4E78!important;' +
		            	'-webkit-print-color-adjust:exact; color:#fff!important;}' +
		            	'.table.table-borderless.table-condensed  tr th * { color: #fff!important; -webkit-print-color-adjust:exact;}' +
		            	'.inv1 .light-blue-td { ' +
		            		'background-color: #c6d9f1!important;' +
		            		'text-align: left;' +
		            		'padding-left: 5px;' +
		            		'-webkit-print-color-adjust:exact; ' +
		            	'}' +
		            	'.saleSummaryCustomer .table.table-borderless.table-condensed tr td { ' +
    						'background-color: #F2F2F2!important; -webkit-print-color-adjust:exact;' +
						'}'+
						'.saleSummaryCustomer .table.table-borderless.table-condensed tr:nth-child(2n+1) td { ' +
    						' background-color: #fff!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.journal_block1>.span2 *, .journal_block1>.span5 * {color: #fff!important;}' +
		            	'.journal_block1>.span2:first-child { ' +
    						'background-color: #bbbbbb!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.journal_block1>.span5:last-child {' +
							'background-color: #496cad!important; color: #fff!important; -webkit-print-color-adjust:exact; ' +
						'}' +
						'.journal_block1>.span5 {' +
							'background-color: #5cc7dd!important; color: #fff!important; -webkit-print-color-adjust:exact;' +
						'}' +
		            	'.saleSummaryCustomer .table.table-borderless.table-condensed tfoot .bg-total td {' +
		            		'background-color: #1C2633!important;' +
		            		'color: #fff!important; ' +
		            		'-webkit-print-color-adjust:exact;' +
		            	'}' +
		            	'</style>' +
		            '</head>' +
		            '<body><div class="saleSummaryCustomer" style="padding: 0 10px;">';
		    var htmlEnd =
		            '</div></body>' +
		            '</html>';

		    printableContent = $('#invFormContent').html();
		    doc.write(htmlStart + printableContent + htmlEnd);
		    doc.close();
		    setTimeout(function(){
		    	win.print();
		    	win.close();
		    },2000);
		},
		ExportExcel 		: function(){
	        var workbook = new kendo.ooxml.Workbook({
	          sheets: [
	            {
	              columns: [
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true }
	              ],
	              title: "Sale Summary Employee",
	              rows: this.exArray
	            }
	          ]
	        });
	        //save the file as Excel file with extension xlsx
	        kendo.saveAs({dataURI: workbook.toDataURL(), fileName: "saleSummaryEmployee.xlsx"});
		}
	});
	banhji.saleDetailByEmployee =  kendo.observable({
		lang 				: langVM,
		dataSource 			: dataStore(apiUrl + "sales/sale_detail_by_employee"),
		contactDS  			: banhji.source.customerDS,
		sortList			: banhji.source.sortList,
		sorter 				: "month",
		sdate 				: "",
		edate 				: "",
		obj 				: { contactIds: [] },
		company 			: banhji.institute,
		displayDate 		: "",
		totalAmount 		: 0,
		exArray 			: [],
		pageLoad 			: function(){
			this.search();
		},
		sorterChanges 		: function(){
	        var today = new Date(),
        	sdate = "",
        	edate = "",
        	sorter = this.get("sorter");

			switch(sorter){
				case "today":
					this.set("sdate", today);
					this.set("edate", "");

				  	break;
				case "week":
					var first = today.getDate() - today.getDay(),
					last = first + 6;

					this.set("sdate", new Date(today.setDate(first)));
					this.set("edate", new Date(today.setDate(last)));

				  	break;
				case "month":
					this.set("sdate", new Date(today.getFullYear(), today.getMonth(), 1));
					this.set("edate", new Date(today.getFullYear(), today.getMonth() + 1, 0));

				  	break;
				case "year":
				  	this.set("sdate", new Date(today.getFullYear(), 0, 1));
				  	this.set("edate", new Date(today.getFullYear(), 11, 31));

				  	break;
				default:
					this.set("sdate", "");
				  	this.set("edate", "");
			}
		},
		search				: function(){
			var self = this, para = [],
				obj = this.get("obj"),
				start = this.get("sdate"),
        		end = this.get("edate"),
        		displayDate = "";

        	//Customer
            if(obj.contactIds.length>0){
            	var contactIds = [];
            	$.each(obj.contactIds, function(index, value){
            		contactIds.push(value);
            	});
	            para.push({ field:"contact_id", operator:"where_in", value:contactIds });
	        }

        	//Dates
        	if(start && end){
        		start = new Date(start);
        		end = new Date(end);
        		displayDate = "From " + kendo.toString(start, "dd-MM-yyyy") + " To " + kendo.toString(end, "dd-MM-yyyy");
        		end.setDate(end.getDate()+1);

            	para.push({ field:"issued_date >=", value: kendo.toString(start, "yyyy-MM-dd") });
            	para.push({ field:"issued_date <", value: kendo.toString(end, "yyyy-MM-dd") });
            }else if(start){
            	start = new Date(start);
            	displayDate = "On " + kendo.toString(start, "dd-MM-yyyy");

            	para.push({ field:"issued_date", value: kendo.toString(start, "yyyy-MM-dd") });
            }else if(end){
            	end = new Date(end);
            	displayDate = "As Of " + kendo.toString(end, "dd-MM-yyyy");
        		end.setDate(end.getDate()+1);

            	para.push({ field:"issued_date <", value: kendo.toString(end, "yyyy-MM-dd") });
            }else{

            }
            this.set("displayDate", displayDate);

            this.dataSource.query({
            	filter:para
            }).then(function(){
            	var view = self.dataSource.view();

            	var amount = 0;
            	$.each(view, function(index, value){
            		$.each(value.line, function(ind, val){
	            		amount += val.amount;
	            	});
            	});

            	self.set("totalAmount", kendo.toString(amount, "c2", banhji.locale));
            });
            this.dataSource.bind("requestEnd", function(e){
				if(e.type=="read"){
					var response = e.response, balanceCal = 0, balance= 0;
					self.exArray = [];

					self.exArray.push({
	            		cells: [
	            			{ value: self.company.name, textAlign: "center", colSpan: 4}
	            		]
	            	});
	            	self.exArray.push({
	            		cells: [
	            			{ value: "Sale Detail by Employee",bold: true, fontSize: 20, textAlign: "center", colSpan: 4 }
	            		]
	            	});
	            	if(self.displayDate){
		            	self.exArray.push({
		            		cells: [
		            			{ value: self.displayDate, textAlign: "center", colSpan: 4 }
		            		]
		            	});
		            }
	            	self.exArray.push({
	            		cells: [
	            			{ value: "", colSpan: 4 }
	            		]
	            	});
	            	self.exArray.push({
	            		cells: [
							{ value: "Type", background: "#496cad", color: "#ffffff" },
							{ value: "Date", background: "#496cad", color: "#ffffff" },
							{ value: "Reference", background: "#496cad", color: "#ffffff" },
							{ value: "Amount", background: "#496cad", color: "#ffffff" },
						]
					});
					for (var i = 0; i < response.results.length; i++){
						self.exArray.push({
					        cells: [
					          	{ value: response.results[i].name, bold: true, },
					            { value: "" },
					            { value: "" },
					            { value: "" },
					        ]

					    });
					    for(var j = 0; j < response.results[i].line.length; j++){
					    	balance += response.results[i].line[j].amount;
				          	self.exArray.push({
				          		cells: [
				          	  		{ value: response.results[i].line[j].type },
				              		{ value: response.results[i].line[j].issued_date },
				              		{ value: response.results[i].line[j].number},
				              		{ value: response.results[i].line[j].amount },
				            	]
				          	});
				        }
				    	self.exArray.push({
					        cells: [
					          	{ value: "", colSpan: 4 }
					        ]
					    });
					}
				}
			});
		},
		printGrid			: function() {
			var gridElement = $('#grid'),
		        printableContent = '',
		        win = window.open('', '', 'width=990, height=900'),
		        doc = win.document.open();
		    var htmlStart =
		            '<!DOCTYPE html>' +
		            '<html>' +
		            '<head>' +
		            '<meta charset="utf-8" />' +
		            '<title></title>' +
		            '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />'+
		            '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
		            '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/responsive.css">' +
		            '<link href="<?php echo base_url(); ?>assets/invoice/invoice.css" rel="stylesheet" />'+
		            '<link href="https://fonts.googleapis.com/css?family=Content:400,700" rel="stylesheet" type="text/css">' +
		            '<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">' +
		            '<style>' +
		            'html { font: 11pt sans-serif; }' +
		            '.k-grid { border-top-width: 0; }' +
		            '.k-grid, .k-grid-content { height: auto !important; }' +
		            '.k-grid-content { overflow: visible !important; }' +
		            'div.k-grid table { table-layout: auto; width: 100% !important; }' +
		            '.k-grid .k-grid-header th { border-top: 1px solid; }' +
		            '.k-grid-toolbar, .k-grid-pager > .k-link { display: none; }' +
		            '</style><style type="text/css" media="print"> @page { size: portrait; margin:1mm; }'+
		            	'.inv1 .main-color {' +

		            		'-webkit-print-color-adjust:exact; ' +
		            	'} ' +
		            	'.table.table-borderless.table-condensed  tr th { background-color: #1E4E78!important;' +
		            	'-webkit-print-color-adjust:exact; color:#fff!important;}' +
		            	'.table.table-borderless.table-condensed  tr th * { color: #fff!important; -webkit-print-color-adjust:exact;}' +
		            	'.inv1 .light-blue-td { ' +
		            		'background-color: #c6d9f1!important;' +
		            		'text-align: left;' +
		            		'padding-left: 5px;' +
		            		'-webkit-print-color-adjust:exact; ' +
		            	'}' +
		            	'.saleSummaryCustomer .table.table-borderless.table-condensed tr td { ' +
    						'background-color: #F2F2F2!important; -webkit-print-color-adjust:exact;' +
						'}'+
						'.saleSummaryCustomer .table.table-borderless.table-condensed tr:nth-child(2n+1) td { ' +
    						' background-color: #fff!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.journal_block1>.span2 *, .journal_block1>.span5 * {color: #fff!important;}' +
		            	'.journal_block1>.span2:first-child { ' +
    						'background-color: #bbbbbb!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.journal_block1>.span5:last-child {' +
							'background-color: #496cad!important; color: #fff!important; -webkit-print-color-adjust:exact; ' +
						'}' +
						'.journal_block1>.span5 {' +
							'background-color: #5cc7dd!important; color: #fff!important; -webkit-print-color-adjust:exact;' +
						'}' +
		            	'.saleSummaryCustomer .table.table-borderless.table-condensed tfoot .bg-total td {' +
		            		'background-color: #1C2633!important;' +
		            		'color: #fff!important; ' +
		            		'-webkit-print-color-adjust:exact;' +
		            	'}' +
		            	'</style>' +
		            '</head>' +
		            '<body><div class="saleSummaryCustomer" style="padding: 0 10px;">';
		    var htmlEnd =
		            '</div></body>' +
		            '</html>';

		    printableContent = $('#invFormContent').html();
		    doc.write(htmlStart + printableContent + htmlEnd);
		    doc.close();
		    setTimeout(function(){
		    	win.print();
		    	win.close();
		    },2000);
		},
		ExportExcel 		: function(){
	        var workbook = new kendo.ooxml.Workbook({
	          sheets: [
	            {
	              columns: [
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	              ],
	              title: "Sale Detail by Customer",
	              rows: this.exArray
	            }
	          ]
	        });
	        //save the file as Excel file with extension xlsx
	        kendo.saveAs({dataURI: workbook.toDataURL(), fileName: "saleDetailCustomer.xlsx"});
		}
	});
	banhji.saleProductDetailByEmployee =  kendo.observable({
		lang 				: langVM,
		dataSource 			: dataStore(apiUrl + "sales/salesProduct_detail_by_employee"),
		contactDS  			: banhji.source.customerDS,
		sortList			: banhji.source.sortList,
		sorter 				: "month",
		sdate 				: "",
		edate 				: "",
		obj 				: { contactIds: [] },
		company 			: banhji.institute,
		displayDate 		: "",
		totalAmount 		: 0,
		exArray 			: [],
		pageLoad 			: function(){
			this.search();
		},
		sorterChanges 		: function(){
	        var today = new Date(),
        	sdate = "",
        	edate = "",
        	sorter = this.get("sorter");

			switch(sorter){
				case "today":
					this.set("sdate", today);
					this.set("edate", "");

				  	break;
				case "week":
					var first = today.getDate() - today.getDay(),
					last = first + 6;

					this.set("sdate", new Date(today.setDate(first)));
					this.set("edate", new Date(today.setDate(last)));

				  	break;
				case "month":
					this.set("sdate", new Date(today.getFullYear(), today.getMonth(), 1));
					this.set("edate", new Date(today.getFullYear(), today.getMonth() + 1, 0));

				  	break;
				case "year":
				  	this.set("sdate", new Date(today.getFullYear(), 0, 1));
				  	this.set("edate", new Date(today.getFullYear(), 11, 31));

				  	break;
				default:
					this.set("sdate", "");
				  	this.set("edate", "");
			}
		},
		search				: function(){
			var self = this, para = [],
				obj = this.get("obj"),
				start = this.get("sdate"),
        		end = this.get("edate"),
        		displayDate = "";

        	//Customer
            if(obj.contactIds.length>0){
            	var contactIds = [];
            	$.each(obj.contactIds, function(index, value){
            		contactIds.push(value);
            	});
	            para.push({ field:"contact_id", operator:"where_in", value:contactIds });
	        }

        	//Dates
        	if(start && end){
        		start = new Date(start);
        		end = new Date(end);
        		displayDate = "From " + kendo.toString(start, "dd-MM-yyyy") + " To " + kendo.toString(end, "dd-MM-yyyy");
        		end.setDate(end.getDate()+1);

            	para.push({ field:"issued_date >=", value: kendo.toString(start, "yyyy-MM-dd") });
            	para.push({ field:"issued_date <", value: kendo.toString(end, "yyyy-MM-dd") });
            }else if(start){
            	start = new Date(start);
            	displayDate = "On " + kendo.toString(start, "dd-MM-yyyy");

            	para.push({ field:"issued_date", value: kendo.toString(start, "yyyy-MM-dd") });
            }else if(end){
            	end = new Date(end);
            	displayDate = "As Of " + kendo.toString(end, "dd-MM-yyyy");
        		end.setDate(end.getDate()+1);

            	para.push({ field:"issued_date <", value: kendo.toString(end, "yyyy-MM-dd") });
            }else{

            }
            this.set("displayDate", displayDate);

            this.dataSource.query({
            	filter:para
            }).then(function(){
            	var view = self.dataSource.view();

            	var amount = 0;
            	$.each(view, function(index, value){
            		$.each(value.line, function(ind, val){
	            		amount += val.amount;
	            	});
            	});

            	self.set("totalAmount", kendo.toString(amount, "c2", banhji.locale));
            });
            this.dataSource.bind("requestEnd", function(e){
				if(e.type=="read"){
					var response = e.response, balanceCal = 0, balance= 0;
					self.exArray = [];

					self.exArray.push({
	            		cells: [
	            			{ value: self.company.name, textAlign: "center", colSpan: 4}
	            		]
	            	});
	            	self.exArray.push({
	            		cells: [
	            			{ value: "Sale Detail by Employee",bold: true, fontSize: 20, textAlign: "center", colSpan: 4 }
	            		]
	            	});
	            	if(self.displayDate){
		            	self.exArray.push({
		            		cells: [
		            			{ value: self.displayDate, textAlign: "center", colSpan: 4 }
		            		]
		            	});
		            }
	            	self.exArray.push({
	            		cells: [
	            			{ value: "", colSpan: 4 }
	            		]
	            	});
	            	self.exArray.push({
	            		cells: [
							{ value: "Type", background: "#496cad", color: "#ffffff" },
							{ value: "Date", background: "#496cad", color: "#ffffff" },
							{ value: "Reference", background: "#496cad", color: "#ffffff" },
							{ value: "Amount", background: "#496cad", color: "#ffffff" },
						]
					});
					for (var i = 0; i < response.results.length; i++){
						self.exArray.push({
					        cells: [
					          	{ value: response.results[i].name, bold: true, },
					            { value: "" },
					            { value: "" },
					            { value: "" },
					        ]

					    });
					    for(var j = 0; j < response.results[i].line.length; j++){
					    	balance += response.results[i].line[j].amount;
				          	self.exArray.push({
				          		cells: [
				          	  		{ value: response.results[i].line[j].type },
				              		{ value: response.results[i].line[j].issued_date },
				              		{ value: response.results[i].line[j].number},
				              		{ value: response.results[i].line[j].amount },
				            	]
				          	});
				        }
				    	self.exArray.push({
					        cells: [
					          	{ value: "", colSpan: 4 }
					        ]
					    });
					}
				}
			});
		},
		printGrid			: function() {
			var gridElement = $('#grid'),
		        printableContent = '',
		        win = window.open('', '', 'width=990, height=900'),
		        doc = win.document.open();
		    var htmlStart =
		            '<!DOCTYPE html>' +
		            '<html>' +
		            '<head>' +
		            '<meta charset="utf-8" />' +
		            '<title></title>' +
		            '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />'+
		            '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
		            '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/responsive.css">' +
		            '<link href="<?php echo base_url(); ?>assets/invoice/invoice.css" rel="stylesheet" />'+
		            '<link href="https://fonts.googleapis.com/css?family=Content:400,700" rel="stylesheet" type="text/css">' +
		            '<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">' +
		            '<style>' +
		            'html { font: 11pt sans-serif; }' +
		            '.k-grid { border-top-width: 0; }' +
		            '.k-grid, .k-grid-content { height: auto !important; }' +
		            '.k-grid-content { overflow: visible !important; }' +
		            'div.k-grid table { table-layout: auto; width: 100% !important; }' +
		            '.k-grid .k-grid-header th { border-top: 1px solid; }' +
		            '.k-grid-toolbar, .k-grid-pager > .k-link { display: none; }' +
		            '</style><style type="text/css" media="print"> @page { size: portrait; margin:1mm; }'+
		            	'.inv1 .main-color {' +

		            		'-webkit-print-color-adjust:exact; ' +
		            	'} ' +
		            	'.table.table-borderless.table-condensed  tr th { background-color: #1E4E78!important;' +
		            	'-webkit-print-color-adjust:exact; color:#fff!important;}' +
		            	'.table.table-borderless.table-condensed  tr th * { color: #fff!important; -webkit-print-color-adjust:exact;}' +
		            	'.inv1 .light-blue-td { ' +
		            		'background-color: #c6d9f1!important;' +
		            		'text-align: left;' +
		            		'padding-left: 5px;' +
		            		'-webkit-print-color-adjust:exact; ' +
		            	'}' +
		            	'.saleSummaryCustomer .table.table-borderless.table-condensed tr td { ' +
    						'background-color: #F2F2F2!important; -webkit-print-color-adjust:exact;' +
						'}'+
						'.saleSummaryCustomer .table.table-borderless.table-condensed tr:nth-child(2n+1) td { ' +
    						' background-color: #fff!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.journal_block1>.span2 *, .journal_block1>.span5 * {color: #fff!important;}' +
		            	'.journal_block1>.span2:first-child { ' +
    						'background-color: #bbbbbb!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.journal_block1>.span5:last-child {' +
							'background-color: #496cad!important; color: #fff!important; -webkit-print-color-adjust:exact; ' +
						'}' +
						'.journal_block1>.span5 {' +
							'background-color: #5cc7dd!important; color: #fff!important; -webkit-print-color-adjust:exact;' +
						'}' +
		            	'.saleSummaryCustomer .table.table-borderless.table-condensed tfoot .bg-total td {' +
		            		'background-color: #1C2633!important;' +
		            		'color: #fff!important; ' +
		            		'-webkit-print-color-adjust:exact;' +
		            	'}' +
		            	'</style>' +
		            '</head>' +
		            '<body><div class="saleSummaryCustomer" style="padding: 0 10px;">';
		    var htmlEnd =
		            '</div></body>' +
		            '</html>';

		    printableContent = $('#invFormContent').html();
		    doc.write(htmlStart + printableContent + htmlEnd);
		    doc.close();
		    setTimeout(function(){
		    	win.print();
		    	win.close();
		    },2000);
		},
		ExportExcel 		: function(){
	        var workbook = new kendo.ooxml.Workbook({
	          sheets: [
	            {
	              columns: [
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	              ],
	              title: "Sale Detail by Customer",
	              rows: this.exArray
	            }
	          ]
	        });
	        //save the file as Excel file with extension xlsx
	        kendo.saveAs({dataURI: workbook.toDataURL(), fileName: "saleDetailCustomer.xlsx"});
		}
	});
	banhji.customerBalanceSummary =  kendo.observable({
		lang 				: langVM,
		dataSource 			: dataStore(apiUrl + "sales/balance_summary"),
		obj 				: null,
		company 			: banhji.institute,
		as_of 				: new Date(),
		displayDate 		: "",
		totalTxn 			: 0,
		totalBalance 		: 0,
		exArray 			: [],
		pageLoad 			: function(){
			this.search();
		},
		search				: function(){
			var self = this, para = [],
				as_of = this.get("as_of"),
        		displayDate = "";

        	if(as_of){
				as_of = new Date(as_of);
				var displayDate = "As Of " + kendo.toString(as_of, "dd-MM-yyyy");
				this.set("displayDate", displayDate);
				as_of.setDate(as_of.getDate()+1);

				para.push({ field:"issued_date <", value:kendo.toString(as_of, "yyyy-MM-dd") });
			}

            this.dataSource.query({
            	filter:para
            }).then(function(){
            	var view = self.dataSource.view();

            	var balance = 0, txnCount = 0;
            	$.each(view, function(index, value){
            		txnCount += value.txn_count;
            		balance += value.amount;
            	});

            	self.set("total_txn", kendo.toString(txnCount, "n0"));
            	self.set("total_balance", kendo.toString(balance, "c2", banhji.locale));
            });
                        this.dataSource.bind("requestEnd", function(e){
				if(e.type=="read"){
					var response = e.response;
					self.exArray = [];

					self.exArray.push({
	            		cells: [
	            			{ value: self.company.name, textAlign: "center", colSpan: 3}
	            		]
	            	});
	            	self.exArray.push({
	            		cells: [
	            			{ value: "Cash Sale Summary by Customer",bold: true, fontSize: 20, textAlign: "center", colSpan: 3}
	            		]
	            	});
	            	if(self.displayDate){
		            	self.exArray.push({
		            		cells: [
		            			{ value: self.displayDate, textAlign: "center", colSpan: 3}
		            		]
		            	});
		            };
	            	self.exArray.push({
	            		cells: [
	            			{ value: "", colSpan: 3}
	            		]
	            	});
	            	self.exArray.push({
	            		cells: [
							{ value: "Customer", background: "#496cad", color: "#ffffff" },
							{ value: "No. OF Transaction", background: "#496cad", color: "#ffffff" },
							{ value: "Balance", background: "#496cad", color: "#ffffff" },
						]
					});
	            	for (var i = 0; i < response.results.length; i++){
				          	self.exArray.push({
				          		cells: [
				          	  		{ value: response.results[i].name },
				          	  		{ value: response.results[i].txn_count },
				              		{ value: kendo.parseFloat(response.results[i].amount)},
				            	]
				          	});
					    self.exArray.push({
					        cells: [
					          	{ value: "", colSpan: 3 }
					        ]
					    });
					}
				}
			});
		},
		printGrid			: function() {
			var gridElement = $('#grid'),
		        printableContent = '',
		        win = window.open('', '', 'width=990, height=900'),
		        doc = win.document.open();
		    var htmlStart =
		            '<!DOCTYPE html>' +
		            '<html>' +
		            '<head>' +
		            '<meta charset="utf-8" />' +
		            '<title></title>' +
		            '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />'+
		            '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
		            '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/responsive.css">' +
		            '<link href="<?php echo base_url(); ?>assets/invoice/invoice.css" rel="stylesheet" />'+
		            '<link href="https://fonts.googleapis.com/css?family=Content:400,700" rel="stylesheet" type="text/css">' +
		            '<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">' +
		            '<style>' +
		            'html { font: 11pt sans-serif; }' +
		            '.k-grid { border-top-width: 0; }' +
		            '.k-grid, .k-grid-content { height: auto !important; }' +
		            '.k-grid-content { overflow: visible !important; }' +
		            'div.k-grid table { table-layout: auto; width: 100% !important; }' +
		            '.k-grid .k-grid-header th { border-top: 1px solid; }' +
		            '.k-grid-toolbar, .k-grid-pager > .k-link { display: none; }' +
		            '</style><style type="text/css" media="print"> @page { size: portrait; margin:1mm; }'+
		            	'.inv1 .main-color {' +

		            		'-webkit-print-color-adjust:exact; ' +
		            	'} ' +
		            	'.table.table-borderless.table-condensed  tr th { background-color: #1E4E78!important;' +
		            	'-webkit-print-color-adjust:exact; color:#fff!important;}' +
		            	'.table.table-borderless.table-condensed  tr th * { color: #fff!important; -webkit-print-color-adjust:exact;}' +
		            	'.inv1 .light-blue-td { ' +
		            		'background-color: #c6d9f1!important;' +
		            		'text-align: left;' +
		            		'padding-left: 5px;' +
		            		'-webkit-print-color-adjust:exact; ' +
		            	'}' +
		            	'.saleSummaryCustomer .table.table-borderless.table-condensed tr td { ' +
    						'background-color: #F2F2F2!important; -webkit-print-color-adjust:exact;' +
						'}'+
						'.saleSummaryCustomer .table.table-borderless.table-condensed tr:nth-child(2n+1) td { ' +
    						' background-color: #fff!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.journal_block1>.span2 *, .journal_block1>.span5 * {color: #fff!important;}' +
		            	'.journal_block1>.span2:first-child { ' +
    						'background-color: #bbbbbb!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.journal_block1>.span5:last-child {' +
							'background-color: #496cad!important; color: #fff!important; -webkit-print-color-adjust:exact; ' +
						'}' +
						'.journal_block1>.span5 {' +
							'background-color: #5cc7dd!important; color: #fff!important; -webkit-print-color-adjust:exact;' +
						'}' +
		            	'.saleSummaryCustomer .table.table-borderless.table-condensed tfoot .bg-total td {' +
		            		'background-color: #1C2633!important;' +
		            		'color: #fff!important; ' +
		            		'-webkit-print-color-adjust:exact;' +
		            	'}' +
		            	'</style>' +
		            '</head>' +
		            '<body><div class="saleSummaryCustomer" style="padding: 0 10px;">';
		    var htmlEnd =
		            '</div></body>' +
		            '</html>';

		    printableContent = $('#invFormContent').html();
		    doc.write(htmlStart + printableContent + htmlEnd);
		    doc.close();
		    setTimeout(function(){
		    	win.print();
		    	win.close();
		    },2000);
		},
		ExportExcel 		: function(){
	        var workbook = new kendo.ooxml.Workbook({
	          sheets: [
	            {
	              columns: [
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	              ],
	              title: "Customer Balance Summary",
	              rows: this.exArray
	            }
	          ]
	        });
	        //save the file as Excel file with extension xlsx
	        kendo.saveAs({dataURI: workbook.toDataURL(), fileName: "customerBalanceSummary.xlsx"});
		}
	});
	banhji.customerBalanceDetail =  kendo.observable({
		lang 				: langVM,
		dataSource 			: dataStore(apiUrl + "sales/balance_detail"),
		obj 				: null,
		company 			: banhji.institute,
		contactDS  			: banhji.source.customerDS,
		as_of 				: new Date(),
		displayDate 		: "",
		obj 				: { contactIds: [] },
		totalTxn 			: 0,
		totalBalance 		: 0,
		exArray 			: [],
		pageLoad 			: function(){
			this.search();
		},
		search				: function(){
			var self = this, para = [], 
				obj = this.get("obj"),
				as_of = this.get("as_of"),
        		displayDate = "";

        	//Customer
            if(obj.contactIds.length>0){
            	var contactIds = [];
            	$.each(obj.contactIds, function(index, value){
            		contactIds.push(value);
            	});
	            para.push({ field:"contact_id", operator:"where_in", value:contactIds });
	        }
    	
        	if(as_of){
				as_of = new Date(as_of);
				var displayDate = "As Of " + kendo.toString(as_of, "dd-MM-yyyy");
				this.set("displayDate", displayDate);
				as_of.setDate(as_of.getDate()+1);
				
				para.push({ field:"issued_date <", value:kendo.toString(as_of, "yyyy-MM-dd") });
			}

            this.dataSource.query({
            	filter:para,
            	sort:[
            		{ field:"issued_date", dir:"asc" },
            		{ field:"number", operator:"order_by_related_contact", dir:"asc" }
            	]
            }).then(function(){
            	var view = self.dataSource.view();

            	var balance = 0, txnCount = 0;
            	$.each(view, function(index, value){
            		txnCount += value.line.length;
            		$.each(value.line, function(ind, val){
            			balance += val.amount;
            		});
            	});

            	self.set("total_txn", kendo.toString(txnCount, "n0"));
            	self.set("total_balance", kendo.toString(balance, "c2", banhji.locale));
            });
            this.dataSource.bind("requestEnd", function(e){				
				if(e.type=="read"){
					var response = e.response, balanceCal = 0, balance= 0;
					self.exArray = [];

					self.exArray.push({
	            		cells: [
	            			{ value: self.company.name, textAlign: "center", colSpan: 4}
	            		]
	            	});
	            	self.exArray.push({
	            		cells: [
	            			{ value: "Customer Balance Summary",bold: true, fontSize: 20, textAlign: "center", colSpan: 4 }
	            		]
	            	});
	            	if(self.displayDate){
		            	self.exArray.push({
		            		cells: [
		            			{ value: self.displayDate, textAlign: "center", colSpan: 4 }
		            		]
		            	});
		            }
	            	self.exArray.push({
	            		cells: [
	            			{ value: "", colSpan: 4 }
	            		]
	            	});
	            	self.exArray.push({ 
	            		cells: [
							{ value: "Type", background: "#496cad", color: "#ffffff" },
							{ value: "Invoice Date", background: "#496cad", color: "#ffffff" },
							{ value: "Reference", background: "#496cad", color: "#ffffff" },
							{ value: "Balance", background: "#496cad", color: "#ffffff" },
						]
					});
					for (var i = 0; i < response.results.length; i++){
						self.exArray.push({
					        cells: [
					          	{ value: response.results[i].name, bold: true, },
					            { value: "" },
					            { value: "" },
					            { value: "" },
					        ]
					        
					    });
					    for(var j = 0; j < response.results[i].line.length; j++){
				          	self.exArray.push({
				          		cells: [
				          	  		{ value: response.results[i].line[j].type },
				              		{ value: response.results[i].line[j].issued_date },
				              		{ value: response.results[i].line[j].number},
				              		{ value: response.results[i].line[j].amount },
				            	]
				          	});
				        }
				    	self.exArray.push({
					        cells: [
					          	{ value: "", colSpan: 4 }
					        ]
					    });
					}
				}
			});
		},
		printGrid			: function() {
			var gridElement = $('#grid'),
		        printableContent = '',
		        win = window.open('', '', 'width=990, height=900'),
		        doc = win.document.open();
		    var htmlStart =
		            '<!DOCTYPE html>' +
		            '<html>' +
		            '<head>' +
		            '<meta charset="utf-8" />' +
		            '<title></title>' +
		            '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />'+
		            '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
		            '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/responsive.css">' +
		            '<link href="<?php echo base_url(); ?>assets/invoice/invoice.css" rel="stylesheet" />'+
		            '<link href="https://fonts.googleapis.com/css?family=Content:400,700" rel="stylesheet" type="text/css">' +
		            '<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">' +
		            '<style>' +
		            'html { font: 11pt sans-serif; }' +
		            '.k-grid { border-top-width: 0; }' +
		            '.k-grid, .k-grid-content { height: auto !important; }' +
		            '.k-grid-content { overflow: visible !important; }' +
		            'div.k-grid table { table-layout: auto; width: 100% !important; }' +
		            '.k-grid .k-grid-header th { border-top: 1px solid; }' +
		            '.k-grid-toolbar, .k-grid-pager > .k-link { display: none; }' +
		            '</style><style type="text/css" media="print"> @page { size: portrait; margin:1mm; }'+
		            	'.inv1 .main-color {' +
		            		
		            		'-webkit-print-color-adjust:exact; ' +
		            	'} ' +
		            	'.table.table-borderless.table-condensed  tr th { background-color: #1E4E78!important;' +
		            	'-webkit-print-color-adjust:exact; color:#fff!important;}' +
		            	'.table.table-borderless.table-condensed  tr th * { color: #fff!important; -webkit-print-color-adjust:exact;}' +
		            	'.inv1 .light-blue-td { ' +
		            		'background-color: #c6d9f1!important;' +
		            		'text-align: left;' +
		            		'padding-left: 5px;' +
		            		'-webkit-print-color-adjust:exact; ' +
		            	'}' +
		            	'.saleSummaryCustomer .table.table-borderless.table-condensed tr td { ' +
    						'background-color: #F2F2F2!important; -webkit-print-color-adjust:exact;' +
						'}'+
						'.saleSummaryCustomer .table.table-borderless.table-condensed tr:nth-child(2n+1) td { ' +
    						' background-color: #fff!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.journal_block1>.span2 *, .journal_block1>.span5 * {color: #fff!important;}' +
		            	'.journal_block1>.span2:first-child { ' +
    						'background-color: #bbbbbb!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.journal_block1>.span5:last-child {' +
							'background-color: #496cad!important; color: #fff!important; -webkit-print-color-adjust:exact; ' +
						'}' +
						'.journal_block1>.span5 {' +
							'background-color: #5cc7dd!important; color: #fff!important; -webkit-print-color-adjust:exact;' +
						'}' +
		            	'.saleSummaryCustomer .table.table-borderless.table-condensed tfoot .bg-total td {' +
		            		'background-color: #1C2633!important;' +
		            		'color: #fff!important; ' + 
		            		'-webkit-print-color-adjust:exact;' +
		            	'}' +
		            	'</style>' +
		            '</head>' +
		            '<body><div class="saleSummaryCustomer" style="padding: 0 10px;">';
		    var htmlEnd =
		            '</div></body>' +
		            '</html>';
		    
		    printableContent = $('#invFormContent').html();
		    doc.write(htmlStart + printableContent + htmlEnd);
		    doc.close();
		    setTimeout(function(){
		    	win.print();
		    	win.close();
		    },2000);
		},
		ExportExcel 		: function(){
	        var workbook = new kendo.ooxml.Workbook({
	          sheets: [
	            {
	              columns: [
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	              ],
	              title: "Customer Balance Detail",
	              rows: this.exArray
	            }
	          ]
	        });
	        //save the file as Excel file with extension xlsx
	        kendo.saveAs({dataURI: workbook.toDataURL(), fileName: "customerBalanceDetail.xlsx"});
		}
	});
	banhji.receivableAgingSummary =  kendo.observable({
		lang 				: langVM,
		dataSource 			: dataStore(apiUrl + "sales/aging_summary"),
		contactDS  			: banhji.source.customerDS,
		obj 				: null,
		company 			: banhji.institute,
		as_of 				: new Date(),
		displayDate 		: "",
		totalBalance 		: 0,
		exArray 			: [],
		pageLoad 			: function(){
			this.search();
		},
		search				: function(){
			var self = this, para = [],
				as_of = this.get("as_of"),
        		displayDate = "";

        	if(as_of){
				as_of = new Date(as_of);
				var displayDate = "As Of " + kendo.toString(as_of, "dd-MM-yyyy");
				this.set("displayDate", displayDate);
				as_of.setDate(as_of.getDate()+1);

				para.push({ field:"issued_date <", value:kendo.toString(as_of, "yyyy-MM-dd") });
			}

            this.dataSource.query({
            	filter:para
            }).then(function(){
            	var view = self.dataSource.view();

            	var balance = 0;
            	$.each(view, function(index, value){
            		balance += value.total;
            	});

            	self.set("totalBalance", kendo.toString(balance, "c2", banhji.locale));
            });
                        this.dataSource.bind("requestEnd", function(e){
				if(e.type=="read"){
					var response = e.response;
					self.exArray = [];

					self.exArray.push({
	            		cells: [
	            			{ value: self.company.name, textAlign: "center", colSpan: 7}
	            		]
	            	});
	            	self.exArray.push({
	            		cells: [
	            			{ value: "Receivable Aging Summary",bold: true, fontSize: 20, textAlign: "center", colSpan: 7}
	            		]
	            	});
	            	if(self.displayDate){
		            	self.exArray.push({
		            		cells: [
		            			{ value: self.displayDate, textAlign: "center", colSpan: 7}
		            		]
		            	});
		            };
	            	self.exArray.push({
	            		cells: [
	            			{ value: "", colSpan: 7}
	            		]
	            	});
	            	self.exArray.push({
	            		cells: [
							{ value: "Name", background: "#496cad", color: "#ffffff" },
							{ value: "Current", background: "#496cad", color: "#ffffff" },
							{ value: "1-30", background: "#496cad", color: "#ffffff" },
							{ value: "31-60", background: "#496cad", color: "#ffffff" },
							{ value: "61-90", background: "#496cad", color: "#ffffff" },
							{ value: "Over 90", background: "#496cad", color: "#ffffff" },
							{ value: "Total", background: "#496cad", color: "#ffffff" },
						]
					});
	            	for (var i = 0; i < response.results.length; i++){
				          	self.exArray.push({
				          		cells: [
				          	  		{ value: response.results[i].name },
				          	  		{ value: response.results[i].current },
				          	  		{ value: response.results[i].in30 },
				          	  		{ value: response.results[i].in60 },
				          	  		{ value: response.results[i].in90 },
				          	  		{ value: response.results[i].over90 },
				              		{ value: kendo.parseFloat(response.results[i].total)},
				            	]
				          	});
					    self.exArray.push({
					        cells: [
					          	{ value: "", colSpan: 7 }
					        ]
					    });
					}
				}
			});
		},
		printGrid			: function() {
			var gridElement = $('#grid'),
		        printableContent = '',
		        win = window.open('', '', 'width=990, height=900'),
		        doc = win.document.open();
		    var htmlStart =
		            '<!DOCTYPE html>' +
		            '<html>' +
		            '<head>' +
		            '<meta charset="utf-8" />' +
		            '<title></title>' +
		            '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />'+
		            '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
		            '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/responsive.css">' +
		            '<link href="<?php echo base_url(); ?>assets/invoice/invoice.css" rel="stylesheet" />'+
		            '<link href="https://fonts.googleapis.com/css?family=Content:400,700" rel="stylesheet" type="text/css">' +
		            '<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">' +
		            '<style>' +
		            'html { font: 11pt sans-serif; }' +
		            '.k-grid { border-top-width: 0; }' +
		            '.k-grid, .k-grid-content { height: auto !important; }' +
		            '.k-grid-content { overflow: visible !important; }' +
		            'div.k-grid table { table-layout: auto; width: 100% !important; }' +
		            '.k-grid .k-grid-header th { border-top: 1px solid; }' +
		            '.k-grid-toolbar, .k-grid-pager > .k-link { display: none; }' +
		            '</style><style type="text/css" media="print"> @page { size: portrait; margin:1mm; }'+
		            	'.inv1 .main-color {' +

		            		'-webkit-print-color-adjust:exact; ' +
		            	'} ' +
		            	'.table.table-borderless.table-condensed  tr th { background-color: #1E4E78!important;' +
		            	'-webkit-print-color-adjust:exact; color:#fff!important;}' +
		            	'.table.table-borderless.table-condensed  tr th * { color: #fff!important; -webkit-print-color-adjust:exact;}' +
		            	'.inv1 .light-blue-td { ' +
		            		'background-color: #c6d9f1!important;' +
		            		'text-align: left;' +
		            		'padding-left: 5px;' +
		            		'-webkit-print-color-adjust:exact; ' +
		            	'}' +
		            	'.saleSummaryCustomer .table.table-borderless.table-condensed tr td { ' +
    						'background-color: #F2F2F2!important; -webkit-print-color-adjust:exact;' +
						'}'+
						'.saleSummaryCustomer .table.table-borderless.table-condensed tr:nth-child(2n+1) td { ' +
    						' background-color: #fff!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.journal_block1>.span2 *, .journal_block1>.span5 * {color: #fff!important;}' +
		            	'.journal_block1>.span2:first-child { ' +
    						'background-color: #bbbbbb!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.journal_block1>.span5:last-child {' +
							'background-color: #496cad!important; color: #fff!important; -webkit-print-color-adjust:exact; ' +
						'}' +
						'.journal_block1>.span5 {' +
							'background-color: #5cc7dd!important; color: #fff!important; -webkit-print-color-adjust:exact;' +
						'}' +
		            	'.saleSummaryCustomer .table.table-borderless.table-condensed tfoot .bg-total td {' +
		            		'background-color: #1C2633!important;' +
		            		'color: #fff!important; ' +
		            		'-webkit-print-color-adjust:exact;' +
		            	'}' +
		            	'</style>' +
		            '</head>' +
		            '<body><div class="saleSummaryCustomer" style="padding: 0 10px;">';
		    var htmlEnd =
		            '</div></body>' +
		            '</html>';

		    printableContent = $('#invFormContent').html();
		    doc.write(htmlStart + printableContent + htmlEnd);
		    doc.close();
		    setTimeout(function(){
		    	win.print();
		    	win.close();
		    },2000);
		},
		ExportExcel 		: function(){
	        var workbook = new kendo.ooxml.Workbook({
	          sheets: [
	            {
	              columns: [
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true }
	              ],
	              title: "Receivable Aging Summary",
	              rows: this.exArray
	            }
	          ]
	        });
	        //save the file as Excel file with extension xlsx
	        kendo.saveAs({dataURI: workbook.toDataURL(), fileName: "receivableAgingSummary.xlsx"});
		}
	});
	banhji.receivableAgingDetail =  kendo.observable({
		lang 				: langVM,
		dataSource 			: dataStore(apiUrl + "sales/aging_detail"),
		contactDS  			: banhji.source.customerDS,
		obj 				: { customers: [] },
		company 			: banhji.institute,
		as_of 				: new Date(),
		displayDate 		: "",
		totalBalance 		: 0,
		exArray 			: [],
		pageLoad 			: function(){
			this.search();
		},
		search				: function(){
			var self = this, para = [],
				obj = this.get("obj"),
				as_of = this.get("as_of"),
        		displayDate = "";

	        //Customer
            if(obj.customers.length>0){
            	var customers = [];
            	$.each(obj.customers, function(index, value){
            		customers.push(value);
            	});
	            para.push({ field:"contact_id", operator:"where_in", value:customers });
	        }

        	if(as_of){
				as_of = new Date(as_of);
				var displayDate = "As Of " + kendo.toString(as_of, "dd-MM-yyyy");
				this.set("displayDate", displayDate);
				as_of.setDate(as_of.getDate()+1);

				para.push({ field:"issued_date <", value:kendo.toString(as_of, "yyyy-MM-dd") });
			}

            this.dataSource.query({
            	filter:para,
            	sort:[
            		{ field:"issued_date", dir:"asc" },
            		{ field:"number", operator:"order_by_related_contact", dir:"asc" }
            	]
            }).then(function(){
            	var view = self.dataSource.view();

            	var balance = 0;
            	$.each(view, function(index, value){
            		$.each(value.line, function(ind, val){
            			balance += val.amount;
            		});
            	});

            	self.set("totalBalance", kendo.toString(balance, "c2", banhji.locale));
            });
            this.dataSource.bind("requestEnd", function(e){
				if(e.type=="read"){
					var response = e.response, balanceCal = 0, balance= 0;
					self.exArray = [];

					self.exArray.push({
	            		cells: [
	            			{ value: self.company.name, textAlign: "center", colSpan: 7}
	            		]
	            	});
	            	self.exArray.push({
	            		cells: [
	            			{ value: "Receivable Aging Detail",bold: true, fontSize: 20, textAlign: "center", colSpan: 7 }
	            		]
	            	});
	            	if(self.displayDate){
		            	self.exArray.push({
		            		cells: [
		            			{ value: self.displayDate, textAlign: "center", colSpan: 7 }
		            		]
		            	});
		            }
	            	self.exArray.push({
	            		cells: [
	            			{ value: "", colSpan: 7 }
	            		]
	            	});
	            	self.exArray.push({
	            		cells: [
							{ value: "Type", background: "#496cad", color: "#ffffff" },
							{ value: "Invoice Date", background: "#496cad", color: "#ffffff" },
							{ value: "Due Date", background: "#496cad", color: "#ffffff" },
							{ value: "Reference", background: "#496cad", color: "#ffffff" },
							{ value: "Status", background: "#496cad", color: "#ffffff" },
							{ value: "Amount", background: "#496cad", color: "#ffffff" },
							{ value: "Balance", background: "#496cad", color: "#ffffff" },
						]
					});
					for (var i = 0; i < response.results.length; i++){
						self.exArray.push({
					        cells: [
					          	{ value: response.results[i].name, bold: true, },
					            { value: "" },
					            { value: "" },
					            { value: "" },
					            { value: "" },
					            { value: "" },
					            { value: "" },
					        ]

					    });
					    for(var j = 0; j < response.results[i].line.length; j++){
					    	var date = new Date(), dueDates = new Date(response.results[i].line[j].due_date).getTime(),overDue, toDay = new Date(date).getTime();
							if(dueDates < toDay) {
								overDue = "Over Due "+Math.floor((toDay - dueDates)/(1000*60*60*24))+"days";
							} else {
								overDue = Math.floor((dueDates - toDay)/(1000*60*60*24))+"days to pay";
							}
							balance =+ response.results[i].line[j].amount ;
				          	self.exArray.push({
				          		cells: [
				          	  		{ value: response.results[i].line[j].type },
				              		{ value: response.results[i].line[j].issued_date },
				              		{ value: response.results[i].line[j].due_date},
				              		{ value: response.results[i].line[j].number },
				              		{ value: overDue},
				              		{ value: response.results[i].line[j].amount },
				              		{ value: balance},
				            	]
				          	});
				        }
				    	self.exArray.push({
					        cells: [
					          	{ value: "", colSpan: 7}
					        ]
					    });
					}
				}
			});
		},
		printGrid			: function() {
			var gridElement = $('#grid'),
		        printableContent = '',
		        win = window.open('', '', 'width=990, height=900'),
		        doc = win.document.open();
		    var htmlStart =
		            '<!DOCTYPE html>' +
		            '<html>' +
		            '<head>' +
		            '<meta charset="utf-8" />' +
		            '<title></title>' +
		            '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />'+
		            '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
		            '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/responsive.css">' +
		            '<link href="<?php echo base_url(); ?>assets/invoice/invoice.css" rel="stylesheet" />'+
		            '<link href="https://fonts.googleapis.com/css?family=Content:400,700" rel="stylesheet" type="text/css">' +
		            '<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">' +
		            '<style>' +
		            'html { font: 11pt sans-serif; }' +
		            '.k-grid { border-top-width: 0; }' +
		            '.k-grid, .k-grid-content { height: auto !important; }' +
		            '.k-grid-content { overflow: visible !important; }' +
		            'div.k-grid table { table-layout: auto; width: 100% !important; }' +
		            '.k-grid .k-grid-header th { border-top: 1px solid; }' +
		            '.k-grid-toolbar, .k-grid-pager > .k-link { display: none; }' +
		            '</style><style type="text/css" media="print"> @page { size: portrait; margin:1mm; }'+
		            	'.inv1 .main-color {' +

		            		'-webkit-print-color-adjust:exact; ' +
		            	'} ' +
		            	'.table.table-borderless.table-condensed  tr th { background-color: #1E4E78!important;' +
		            	'-webkit-print-color-adjust:exact; color:#fff!important;}' +
		            	'.table.table-borderless.table-condensed  tr th * { color: #fff!important; -webkit-print-color-adjust:exact;}' +
		            	'.inv1 .light-blue-td { ' +
		            		'background-color: #c6d9f1!important;' +
		            		'text-align: left;' +
		            		'padding-left: 5px;' +
		            		'-webkit-print-color-adjust:exact; ' +
		            	'}' +
		            	'.saleSummaryCustomer .table.table-borderless.table-condensed tr td { ' +
    						'background-color: #F2F2F2!important; -webkit-print-color-adjust:exact;' +
						'}'+
						'.saleSummaryCustomer .table.table-borderless.table-condensed tr:nth-child(2n+1) td { ' +
    						' background-color: #fff!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.journal_block1>.span2 *, .journal_block1>.span5 * {color: #fff!important;}' +
		            	'.journal_block1>.span2:first-child { ' +
    						'background-color: #bbbbbb!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.journal_block1>.span5:last-child {' +
							'background-color: #496cad!important; color: #fff!important; -webkit-print-color-adjust:exact; ' +
						'}' +
						'.journal_block1>.span5 {' +
							'background-color: #5cc7dd!important; color: #fff!important; -webkit-print-color-adjust:exact;' +
						'}' +
		            	'.saleSummaryCustomer .table.table-borderless.table-condensed tfoot .bg-total td {' +
		            		'background-color: #1C2633!important;' +
		            		'color: #fff!important; ' +
		            		'-webkit-print-color-adjust:exact;' +
		            	'}' +
		            	'</style>' +
		            '</head>' +
		            '<body><div class="saleSummaryCustomer" style="padding: 0 10px;">';
		    var htmlEnd =
		            '</div></body>' +
		            '</html>';

		    printableContent = $('#invFormContent').html();
		    doc.write(htmlStart + printableContent + htmlEnd);
		    doc.close();
		    setTimeout(function(){
		    	win.print();
		    	win.close();
		    },2000);
		},
		ExportExcel 		: function(){
	        var workbook = new kendo.ooxml.Workbook({
	          sheets: [
	            {
	              columns: [
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true }
	              ],
	              title: "Receivable Aging Detail",
	              rows: this.exArray
	            }
	          ]
	        });
	        //save the file as Excel file with extension xlsx
	        kendo.saveAs({dataURI: workbook.toDataURL(), fileName: "receivableAgingDetail.xlsx"});
		}
	});
	banhji.collectInvoice =  kendo.observable({
		lang 				: langVM,
		dataSource 			: dataStore(apiUrl + "sales/collect_invoice"),
		contactDS  			: banhji.source.customerDS,
		obj 				: { customers: [] },
		company 			: banhji.institute,
		as_of 				: new Date(),
		displayDate 		: "",
		total_txn 			: 0,
		totalAmount 		: 0,
		exArray 			: [],
		pageLoad 			: function(){
			this.search();
		},
		search				: function(){
			var self = this, para = [],
				obj = this.get("obj"),
				as_of = this.get("as_of"),
        		displayDate = "";

        	//Customer
            if(obj.customers.length>0){
            	var customers = [];
            	$.each(obj.customers, function(index, value){
            		customers.push(value);
            	});
	            para.push({ field:"contact_id", operator:"where_in", value:customers });
	        }

        	if(as_of){
				as_of = new Date(as_of);
				var displayDate = "As Of " + kendo.toString(as_of, "dd-MM-yyyy");
				this.set("displayDate", displayDate);
				as_of.setDate(as_of.getDate()+1);

				para.push({ field:"issued_date <", value:kendo.toString(as_of, "yyyy-MM-dd") });
			}

            this.dataSource.query({
            	filter:para
            }).then(function(){
            	var view = self.dataSource.view();

            	var amount = 0, txn_count = 0;
            	$.each(view, function(index, value){
            		$.each(value.line, function(ind, val){
	            		txn_count++;
	            		amount += val.amount;
            		});
            	});

            	self.set("total_txn", kendo.toString(txn_count, "n0"));
            	self.set("totalAmount", kendo.toString(amount, "c2", banhji.locale));
            });
		},
		printGrid			: function() {
			var gridElement = $('#grid'),
		        printableContent = '',
		        win = window.open('', '', 'width=990, height=900'),
		        doc = win.document.open();
		    var htmlStart =
		            '<!DOCTYPE html>' +
		            '<html>' +
		            '<head>' +
		            '<meta charset="utf-8" />' +
		            '<title></title>' +
		            '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />'+
		            '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
		            '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/responsive.css">' +
		            '<link href="<?php echo base_url(); ?>assets/invoice/invoice.css" rel="stylesheet" />'+
		            '<link href="https://fonts.googleapis.com/css?family=Content:400,700" rel="stylesheet" type="text/css">' +
		            '<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">' +
		            '<style>' +
		            'html { font: 11pt sans-serif; }' +
		            '.k-grid { border-top-width: 0; }' +
		            '.k-grid, .k-grid-content { height: auto !important; }' +
		            '.k-grid-content { overflow: visible !important; }' +
		            'div.k-grid table { table-layout: auto; width: 100% !important; }' +
		            '.k-grid .k-grid-header th { border-top: 1px solid; }' +
		            '.k-grid-toolbar, .k-grid-pager > .k-link { display: none; }' +
		            '</style><style type="text/css" media="print"> @page { size: portrait; margin:1mm; }'+
		            	'.inv1 .main-color {' +

		            		'-webkit-print-color-adjust:exact; ' +
		            	'} ' +
		            	'.table.table-borderless.table-condensed  tr th { background-color: #1E4E78!important;' +
		            	'-webkit-print-color-adjust:exact; color:#fff!important;}' +
		            	'.table.table-borderless.table-condensed  tr th * { color: #fff!important; -webkit-print-color-adjust:exact;}' +
		            	'.inv1 .light-blue-td { ' +
		            		'background-color: #c6d9f1!important;' +
		            		'text-align: left;' +
		            		'padding-left: 5px;' +
		            		'-webkit-print-color-adjust:exact; ' +
		            	'}' +
		            	'.saleSummaryCustomer .table.table-borderless.table-condensed tr td { ' +
    						'background-color: #F2F2F2!important; -webkit-print-color-adjust:exact;' +
						'}'+
						'.saleSummaryCustomer .table.table-borderless.table-condensed tr:nth-child(2n+1) td { ' +
    						' background-color: #fff!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.journal_block1>.span2 *, .journal_block1>.span5 * {color: #fff!important;}' +
		            	'.journal_block1>.span2:first-child { ' +
    						'background-color: #bbbbbb!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.journal_block1>.span5:last-child {' +
							'background-color: #496cad!important; color: #fff!important; -webkit-print-color-adjust:exact; ' +
						'}' +
						'.journal_block1>.span5 {' +
							'background-color: #5cc7dd!important; color: #fff!important; -webkit-print-color-adjust:exact;' +
						'}' +
		            	'.saleSummaryCustomer .table.table-borderless.table-condensed tfoot .bg-total td {' +
		            		'background-color: #1C2633!important;' +
		            		'color: #fff!important; ' +
		            		'-webkit-print-color-adjust:exact;' +
		            	'}' +
		            	'</style>' +
		            '</head>' +
		            '<body><div class="saleSummaryCustomer" style="padding: 0 10px;">';
		    var htmlEnd =
		            '</div></body>' +
		            '</html>';

		    printableContent = $('#invFormContent').html();
		    doc.write(htmlStart + printableContent + htmlEnd);
		    doc.close();
		    setTimeout(function(){
		    	win.print();
		    	win.close();
		    },2000);
		},
		ExportExcel 		: function(){
	        var workbook = new kendo.ooxml.Workbook({
	          sheets: [
	            {
	              columns: [
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true }
	              ],
	              title: "General Ledger",
	              rows: this.exArray
	            }
	          ]
	        });
	        //save the file as Excel file with extension xlsx
	        kendo.saveAs({dataURI: workbook.toDataURL(), fileName: "GeneralLedger.xlsx"});
		}
	});
	banhji.collectionReport =  kendo.observable({
		lang 				: langVM,
		dataSource 			: dataStore(apiUrl + "sales/collection_report"),
		contactDS  			: banhji.source.customerDS,
		sortList			: banhji.source.sortList,
		sorter 				: "month",
		sdate 				: "",
		edate 				: "",
		obj 				: { customers: [] },
		company 			: banhji.institute,
		displayDate 		: "",
		total_txn 			: 0,
		totalAmount 		: 0,
		exArray 			: [],
		pageLoad 			: function(){
			this.search();
		},
		sorterChanges 		: function(){
	        var today = new Date(),
        	sdate = "",
        	edate = "",
        	sorter = this.get("sorter");

			switch(sorter){
				case "today":
					this.set("sdate", today);
					this.set("edate", "");

				  	break;
				case "week":
					var first = today.getDate() - today.getDay(),
					last = first + 6;

					this.set("sdate", new Date(today.setDate(first)));
					this.set("edate", new Date(today.setDate(last)));

				  	break;
				case "month":
					this.set("sdate", new Date(today.getFullYear(), today.getMonth(), 1));
					this.set("edate", new Date(today.getFullYear(), today.getMonth() + 1, 0));

				  	break;
				case "year":
				  	this.set("sdate", new Date(today.getFullYear(), 0, 1));
				  	this.set("edate", new Date(today.getFullYear(), 11, 31));

				  	break;
				default:
					this.set("sdate", "");
				  	this.set("edate", "");
			}
		},
		search				: function(){
			var self = this, para = [],
				obj = this.get("obj"),
				start = this.get("sdate"),
        		end = this.get("edate"),
        		displayDate = "";

        	//Customer
            if(obj.customers.length>0){
            	var customers = [];
            	$.each(obj.customers, function(index, value){
            		customers.push(value);
            	});
	            para.push({ field:"contact_id", operator:"where_in", value:customers });
	        }

        	//Dates
        	if(start && end){
        		start = new Date(start);
        		end = new Date(end);
        		displayDate = "From " + kendo.toString(start, "dd-MM-yyyy") + " To " + kendo.toString(end, "dd-MM-yyyy");
        		end.setDate(end.getDate()+1);

            	para.push({ field:"issued_date >=", value: kendo.toString(start, "yyyy-MM-dd") });
            	para.push({ field:"issued_date <", value: kendo.toString(end, "yyyy-MM-dd") });
            }else if(start){
            	start = new Date(start);
            	displayDate = "On " + kendo.toString(start, "dd-MM-yyyy");

            	para.push({ field:"issued_date", value: kendo.toString(start, "yyyy-MM-dd") });
            }else if(end){
            	end = new Date(end);
            	displayDate = "As Of " + kendo.toString(end, "dd-MM-yyyy");
        		end.setDate(end.getDate()+1);

            	para.push({ field:"issued_date <", value: kendo.toString(end, "yyyy-MM-dd") });
            }else{

            }
            this.set("displayDate", displayDate);

            this.dataSource.query({
            	filter:para
            }).then(function(){
            	var view = self.dataSource.view();

            	var amount = 0, txn_count = 0;
            	$.each(view, function(index, value){
            		$.each(value.line, function(ind, val){
	            		txn_count++;
	            		amount += val.amount;
            		});
            	});

            	self.set("total_txn", kendo.toString(txn_count, "n0"));
            	self.set("totalAmount", kendo.toString(amount, "c2", banhji.locale));
            });
		},
		printGrid			: function() {
			var gridElement = $('#grid'),
		        printableContent = '',
		        win = window.open('', '', 'width=990, height=900'),
		        doc = win.document.open();
		    var htmlStart =
		            '<!DOCTYPE html>' +
		            '<html>' +
		            '<head>' +
		            '<meta charset="utf-8" />' +
		            '<title></title>' +
		            '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />'+
		            '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
		            '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/responsive.css">' +
		            '<link href="<?php echo base_url(); ?>assets/invoice/invoice.css" rel="stylesheet" />'+
		            '<link href="https://fonts.googleapis.com/css?family=Content:400,700" rel="stylesheet" type="text/css">' +
		            '<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">' +
		            '<style>' +
		            'html { font: 11pt sans-serif; }' +
		            '.k-grid { border-top-width: 0; }' +
		            '.k-grid, .k-grid-content { height: auto !important; }' +
		            '.k-grid-content { overflow: visible !important; }' +
		            'div.k-grid table { table-layout: auto; width: 100% !important; }' +
		            '.k-grid .k-grid-header th { border-top: 1px solid; }' +
		            '.k-grid-toolbar, .k-grid-pager > .k-link { display: none; }' +
		            '</style><style type="text/css" media="print"> @page { size: portrait; margin:1mm; }'+
		            	'.inv1 .main-color {' +

		            		'-webkit-print-color-adjust:exact; ' +
		            	'} ' +
		            	'.table.table-borderless.table-condensed  tr th { background-color: #1E4E78!important;' +
		            	'-webkit-print-color-adjust:exact; color:#fff!important;}' +
		            	'.table.table-borderless.table-condensed  tr th * { color: #fff!important; -webkit-print-color-adjust:exact;}' +
		            	'.inv1 .light-blue-td { ' +
		            		'background-color: #c6d9f1!important;' +
		            		'text-align: left;' +
		            		'padding-left: 5px;' +
		            		'-webkit-print-color-adjust:exact; ' +
		            	'}' +
		            	'.saleSummaryCustomer .table.table-borderless.table-condensed tr td { ' +
    						'background-color: #F2F2F2!important; -webkit-print-color-adjust:exact;' +
						'}'+
						'.saleSummaryCustomer .table.table-borderless.table-condensed tr:nth-child(2n+1) td { ' +
    						' background-color: #fff!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.journal_block1>.span2 *, .journal_block1>.span5 * {color: #fff!important;}' +
		            	'.journal_block1>.span2:first-child { ' +
    						'background-color: #bbbbbb!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.journal_block1>.span5:last-child {' +
							'background-color: #496cad!important; color: #fff!important; -webkit-print-color-adjust:exact; ' +
						'}' +
						'.journal_block1>.span5 {' +
							'background-color: #5cc7dd!important; color: #fff!important; -webkit-print-color-adjust:exact;' +
						'}' +
		            	'.saleSummaryCustomer .table.table-borderless.table-condensed tfoot .bg-total td {' +
		            		'background-color: #1C2633!important;' +
		            		'color: #fff!important; ' +
		            		'-webkit-print-color-adjust:exact;' +
		            	'}' +
		            	'</style>' +
		            '</head>' +
		            '<body><div class="saleSummaryCustomer" style="padding: 0 10px;">';
		    var htmlEnd =
		            '</div></body>' +
		            '</html>';

		    printableContent = $('#invFormContent').html();
		    doc.write(htmlStart + printableContent + htmlEnd);
		    doc.close();
		    setTimeout(function(){
		    	win.print();
		    	win.close();
		    },2000);
		},
		ExportExcel 		: function(){
	        var workbook = new kendo.ooxml.Workbook({
	          sheets: [
	            {
	              columns: [
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true }
	              ],
	              title: "General Ledger",
	              rows: this.exArray
	            }
	          ]
	        });
	        //save the file as Excel file with extension xlsx
	        kendo.saveAs({dataURI: workbook.toDataURL(), fileName: "GeneralLedger.xlsx"});
		}
	});
	banhji.saleOrderList =  kendo.observable({
		lang 				: langVM,
		dataSource 			: dataStore(apiUrl + "sales/transaction_list"),
		contactDS  			: banhji.source.customerDS,
		sortList			: banhji.source.sortList,
		sorter 				: "month",
		sdate 				: "",
		edate 				: "",
		obj 				: { contactIds: [] },
		company 			: banhji.institute,
		displayDate 		: "",
		orderCount 			: 0,
		totalAmount 		: 0,
		exArray 			: [],
		pageLoad 			: function(){
			this.search();
		},
		sorterChanges 		: function(){
	        var today = new Date(),
        	sdate = "",
        	edate = "",
        	sorter = this.get("sorter");

			switch(sorter){
				case "today":
					this.set("sdate", today);
					this.set("edate", "");

				  	break;
				case "week":
					var first = today.getDate() - today.getDay(),
					last = first + 6;

					this.set("sdate", new Date(today.setDate(first)));
					this.set("edate", new Date(today.setDate(last)));

				  	break;
				case "month":
					this.set("sdate", new Date(today.getFullYear(), today.getMonth(), 1));
					this.set("edate", new Date(today.getFullYear(), today.getMonth() + 1, 0));

				  	break;
				case "year":
				  	this.set("sdate", new Date(today.getFullYear(), 0, 1));
				  	this.set("edate", new Date(today.getFullYear(), 11, 31));

				  	break;
				default:
					this.set("sdate", "");
				  	this.set("edate", "");
			}
		},
		search				: function(){
			var self = this, para = [],
				obj = this.get("obj"),
				start = this.get("sdate"),
        		end = this.get("edate"),
        		displayDate = "";

        	para.push({ field:"type", value:"Sale_Order" });

        	//Customer
            if(obj.contactIds.length>0){
            	var contactIds = [];
            	$.each(obj.contactIds, function(index, value){
            		contactIds.push(value);
            	});
	            para.push({ field:"contact_id", operator:"where_in", value:contactIds });
	        }

        	//Dates
        	if(start && end){
        		start = new Date(start);
        		end = new Date(end);
        		displayDate = "From " + kendo.toString(start, "dd-MM-yyyy") + " To " + kendo.toString(end, "dd-MM-yyyy");
        		end.setDate(end.getDate()+1);

            	para.push({ field:"issued_date >=", value: kendo.toString(start, "yyyy-MM-dd") });
            	para.push({ field:"issued_date <", value: kendo.toString(end, "yyyy-MM-dd") });
            }else if(start){
            	start = new Date(start);
            	displayDate = "On " + kendo.toString(start, "dd-MM-yyyy");

            	para.push({ field:"issued_date", value: kendo.toString(start, "yyyy-MM-dd") });
            }else if(end){
            	end = new Date(end);
            	displayDate = "As Of " + kendo.toString(end, "dd-MM-yyyy");
        		end.setDate(end.getDate()+1);

            	para.push({ field:"issued_date <", value: kendo.toString(end, "yyyy-MM-dd") });
            }else{

            }
            this.set("displayDate", displayDate);

            this.dataSource.query({
            	filter:para
            }).then(function(){
            	var view = self.dataSource.view();

            	var amount = 0, orderCount = 0;
            	$.each(view, function(index, value){
            		$.each(value.line, function(ind, val){
            			orderCount++;
	            		amount += val.amount;
	            	});
            	});

            	self.set("orderCount", kendo.toString(orderCount, "n0"));
            	self.set("totalAmount", kendo.toString(amount, "c2", banhji.locale));
            });
            this.dataSource.bind("requestEnd", function(e){
				if(e.type=="read"){
					var response = e.response, balanceCal = 0, balance= 0;
					self.exArray = [];

					self.exArray.push({
	            		cells: [
	            			{ value: self.company.name, textAlign: "center", colSpan: 5}
	            		]
	            	});
	            	self.exArray.push({
	            		cells: [
	            			{ value: "Sale Order List",bold: true, fontSize: 20, textAlign: "center", colSpan: 5 }
	            		]
	            	});
	            	if(self.displayDate){
		            	self.exArray.push({
		            		cells: [
		            			{ value: self.displayDate, textAlign: "center", colSpan: 5 }
		            		]
		            	});
		            }
	            	self.exArray.push({
	            		cells: [
	            			{ value: "", colSpan: 4 }
	            		]
	            	});
	            	self.exArray.push({
	            		cells: [
							{ value: "Number", background: "#496cad", color: "#ffffff" },
							{ value: "Reference", background: "#496cad", color: "#ffffff" },
							{ value: "Date", background: "#496cad", color: "#ffffff" },
							{ value: "Status", background: "#496cad", color: "#ffffff" },
							{ value: "Amount", background: "#496cad", color: "#ffffff" },
						]
					});
					for (var i = 0; i < response.results.length; i++){
						self.exArray.push({
					        cells: [
					          	{ value: response.results[i].name, bold: true, },
					            { value: "" },
					            { value: "" },
					            { value: "" },
					            { value: "" },
					        ]

					    });
					    for(var j = 0; j < response.results[i].line.length; j++){
					    	var status = response.results[i].line[j].status
					    	if (status==0){
					    		status = "Open"
					    	}else{
					    		status = "Used"
					    	}
				          	self.exArray.push({
				          		cells: [
				          	  		{ value: response.results[i].line[j].number },
				              		{ value: response.results[i].line[j].number },
				              		{ value: response.results[i].line[j].issued_date},
				              		{ value: status },
				              		{ value: response.results[i].line[j].amount},
				            	]
				          	});
				        }
				    	self.exArray.push({
					        cells: [
					          	{ value: "", colSpan: 4 }
					        ]
					    });
					}
				}
			});
		},
		printGrid			: function() {
			var gridElement = $('#grid'),
		        printableContent = '',
		        win = window.open('', '', 'width=990, height=900'),
		        doc = win.document.open();
		    var htmlStart =
		            '<!DOCTYPE html>' +
		            '<html>' +
		            '<head>' +
		            '<meta charset="utf-8" />' +
		            '<title></title>' +
		            '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />'+
		            '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
		            '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/responsive.css">' +
		            '<link href="<?php echo base_url(); ?>assets/invoice/invoice.css" rel="stylesheet" />'+
		            '<link href="https://fonts.googleapis.com/css?family=Content:400,700" rel="stylesheet" type="text/css">' +
		            '<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">' +
		            '<style>' +
		            'html { font: 11pt sans-serif; }' +
		            '.k-grid { border-top-width: 0; }' +
		            '.k-grid, .k-grid-content { height: auto !important; }' +
		            '.k-grid-content { overflow: visible !important; }' +
		            'div.k-grid table { table-layout: auto; width: 100% !important; }' +
		            '.k-grid .k-grid-header th { border-top: 1px solid; }' +
		            '.k-grid-toolbar, .k-grid-pager > .k-link { display: none; }' +
		            '</style><style type="text/css" media="print"> @page { size: portrait; margin:1mm; }'+
		            	'.inv1 .main-color {' +

		            		'-webkit-print-color-adjust:exact; ' +
		            	'} ' +
		            	'.table.table-borderless.table-condensed  tr th { background-color: #1E4E78!important;' +
		            	'-webkit-print-color-adjust:exact; color:#fff!important;}' +
		            	'.table.table-borderless.table-condensed  tr th * { color: #fff!important; -webkit-print-color-adjust:exact;}' +
		            	'.inv1 .light-blue-td { ' +
		            		'background-color: #c6d9f1!important;' +
		            		'text-align: left;' +
		            		'padding-left: 5px;' +
		            		'-webkit-print-color-adjust:exact; ' +
		            	'}' +
		            	'.saleSummaryCustomer .table.table-borderless.table-condensed tr td { ' +
    						'background-color: #F2F2F2!important; -webkit-print-color-adjust:exact;' +
						'}'+
						'.saleSummaryCustomer .table.table-borderless.table-condensed tr:nth-child(2n+1) td { ' +
    						' background-color: #fff!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.journal_block1>.span2 *, .journal_block1>.span5 * {color: #fff!important;}' +
		            	'.journal_block1>.span2:first-child { ' +
    						'background-color: #bbbbbb!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.journal_block1>.span5:last-child {' +
							'background-color: #496cad!important; color: #fff!important; -webkit-print-color-adjust:exact; ' +
						'}' +
						'.journal_block1>.span5 {' +
							'background-color: #5cc7dd!important; color: #fff!important; -webkit-print-color-adjust:exact;' +
						'}' +
		            	'.saleSummaryCustomer .table.table-borderless.table-condensed tfoot .bg-total td {' +
		            		'background-color: #1C2633!important;' +
		            		'color: #fff!important; ' +
		            		'-webkit-print-color-adjust:exact;' +
		            	'}' +
		            	'</style>' +
		            '</head>' +
		            '<body><div class="saleSummaryCustomer" style="padding: 0 10px;">';
		    var htmlEnd =
		            '</div></body>' +
		            '</html>';

		    printableContent = $('#invFormContent').html();
		    doc.write(htmlStart + printableContent + htmlEnd);
		    doc.close();
		    setTimeout(function(){
		    	win.print();
		    	win.close();
		    },2000);
		},
		ExportExcel 		: function(){
	        var workbook = new kendo.ooxml.Workbook({
	          sheets: [
	            {
	              columns: [
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	              ],
	              title: "Sale Order List",
	              rows: this.exArray
	            }
	          ]
	        });
	        //save the file as Excel file with extension xlsx
	        kendo.saveAs({dataURI: workbook.toDataURL(), fileName: "saleOrderList.xlsx"});
		}
	});
	banhji.saleOrderDetailByProduct =  kendo.observable({
		lang 				: langVM,
		dataSource 			: dataStore(apiUrl + "sales/saleOrder_detail_by_product"),
		itemDS				: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + "items",
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
			filter:[
		    	{ field: "is_catalog <>", value: 1 },
		        { field: "is_assembly <>", value: 1 },
		      	{ field: "item_type_id", operator:"where_in", value: [1,4] }
		    ],
			sort:[
				{ field:"item_type_id", dir:"asc" },
				{ field:"number", dir:"asc" }
			],
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page:1,
			pageSize: 100
		}),
		sortList			: banhji.source.sortList,
		sorter 				: "month",
		sdate 				: "",
		edate 				: "",
		obj 				: { itemIds: [] },
		company 			: banhji.institute,
		displayDate 		: "",
		product_sale 		: 0,
		total_sale 			: 0,
		exArray 			: [],
		pageLoad 			: function(){
			this.search();
		},
		sorterChanges 		: function(){
	        var today = new Date(),
        	sdate = "",
        	edate = "",
        	sorter = this.get("sorter");

			switch(sorter){
				case "today":
					this.set("sdate", today);
					this.set("edate", "");

				  	break;
				case "week":
					var first = today.getDate() - today.getDay(),
					last = first + 6;

					this.set("sdate", new Date(today.setDate(first)));
					this.set("edate", new Date(today.setDate(last)));

				  	break;
				case "month":
					this.set("sdate", new Date(today.getFullYear(), today.getMonth(), 1));
					this.set("edate", new Date(today.getFullYear(), today.getMonth() + 1, 0));

				  	break;
				case "year":
				  	this.set("sdate", new Date(today.getFullYear(), 0, 1));
				  	this.set("edate", new Date(today.getFullYear(), 11, 31));

				  	break;
				default:
					this.set("sdate", "");
				  	this.set("edate", "");
			}
		},
		search				: function(){
			var self = this, para = [],
				obj = this.get("obj"),
				start = this.get("sdate"),
        		end = this.get("edate"),
        		displayDate = "";

        	//Items
            if(obj.itemIds.length>0){
            	var itemIds = [];
            	$.each(obj.itemIds, function(index, value){
            		itemIds.push(value);
            	});
	            para.push({ field:"item_id", operator:"where_in", value:itemIds });
	        }

        	//Dates
        	if(start && end){
        		start = new Date(start);
        		end = new Date(end);
        		displayDate = "From " + kendo.toString(start, "dd-MM-yyyy") + " To " + kendo.toString(end, "dd-MM-yyyy");
        		end.setDate(end.getDate()+1);

            	para.push({ field:"issued_date >=", operator:"where_related_transaction", value: kendo.toString(start, "yyyy-MM-dd") });
            	para.push({ field:"issued_date <", operator:"where_related_transaction", value: kendo.toString(end, "yyyy-MM-dd") });
            }else if(start){
            	start = new Date(start);
            	displayDate = "On " + kendo.toString(start, "dd-MM-yyyy");

            	para.push({ field:"issued_date", operator:"where_related_transaction", value: kendo.toString(start, "yyyy-MM-dd") });
            }else if(end){
            	end = new Date(end);
            	displayDate = "As Of " + kendo.toString(end, "dd-MM-yyyy");
        		end.setDate(end.getDate()+1);

            	para.push({ field:"issued_date <", operator:"where_related_transaction", value: kendo.toString(end, "yyyy-MM-dd") });
            }else{

            }
            this.set("displayDate", displayDate);

            this.dataSource.query({
            	filter:para
            }).then(function(){
            	var view = self.dataSource.view();

            	var txnCount = 0, amount = 0;
            	$.each(view, function(index, value){
            		$.each(value.line, function(ind, val){
	            		txnCount++;
	            		amount += val.amount;
            		});
            	});

            	var avgSale = 0;
            	if(txnCount>0){
            		avgSale = amount/txnCount;
            	}

            	self.set("product_sale", kendo.toString(avgSale, "c2", banhji.locale));
            	self.set("total_sale", kendo.toString(amount, "c2", banhji.locale));
            });
            this.dataSource.bind("requestEnd", function(e){
				if(e.type=="read"){
					var response = e.response, balanceCal = 0, balance= 0;
					self.exArray = [];

					self.exArray.push({
	            		cells: [
	            			{ value: self.company.name, textAlign: "center", colSpan: 7}
	            		]
	            	});
	            	self.exArray.push({
	            		cells: [
	            			{ value: "Sale Detail by Product/Service",bold: true, fontSize: 20, textAlign: "center", colSpan: 7 }
	            		]
	            	});
	            	if(self.displayDate){
		            	self.exArray.push({
		            		cells: [
		            			{ value: self.displayDate, textAlign: "center", colSpan: 7 }
		            		]
		            	});
		            }
	            	self.exArray.push({
	            		cells: [
	            			{ value: "", colSpan: 7 }
	            		]
	            	});
	            	self.exArray.push({
	            		cells: [
							{ value: "Type", background: "#496cad", color: "#ffffff" },
							{ value: "Customer", background: "#496cad", color: "#ffffff" },
							{ value: "Invoice Date", background: "#496cad", color: "#ffffff" },
							{ value: "Reference", background: "#496cad", color: "#ffffff" },
							{ value: "QTY", background: "#496cad", color: "#ffffff" },
							{ value: "Price", background: "#496cad", color: "#ffffff" },
							{ value: "Amount", background: "#496cad", color: "#ffffff" },
						]
					});
					for (var i = 0; i < response.results.length; i++){
						self.exArray.push({
					        cells: [
					          	{ value: response.results[i].name, bold: true, },
					            { value: "" },
					            { value: "" },
					            { value: "" },
					            { value: "" },
					            { value: "" },
					            { value: "" },
					        ]

					    });
					    for(var j = 0; j < response.results[i].line.length; j++){
					    	var aaa = response.results[i].line[j].quantity + response.results[i].line[j].measurement;
				          	self.exArray.push({
				          		cells: [
				          	  		{ value: response.results[i].line[j].type },
				              		{ value: response.results[i].line[j].customer },
				              		{ value: response.results[i].line[j].issued_date},
				              		{ value: response.results[i].line[j].number },
				              		{ value: aaa},
				              		{ value: response.results[i].line[j].price },
				              		{ value: response.results[i].line[j].amount },
				            	]
				          	});
				        }
				    	self.exArray.push({
					        cells: [
					          	{ value: "", colSpan: 7}
					        ]
					    });
					}
				}
			});
		},
		printGrid			: function() {
			var gridElement = $('#grid'),
		        printableContent = '',
		        win = window.open('', '', 'width=990, height=900'),
		        doc = win.document.open();
		    var htmlStart =
		            '<!DOCTYPE html>' +
		            '<html>' +
		            '<head>' +
		            '<meta charset="utf-8" />' +
		            '<title></title>' +
		            '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />'+
		            '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
		            '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/responsive.css">' +
		            '<link href="<?php echo base_url(); ?>assets/invoice/invoice.css" rel="stylesheet" />'+
		            '<link href="https://fonts.googleapis.com/css?family=Content:400,700" rel="stylesheet" type="text/css">' +
		            '<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">' +
		            '<style>' +
		            'html { font: 11pt sans-serif; }' +
		            '.k-grid { border-top-width: 0; }' +
		            '.k-grid, .k-grid-content { height: auto !important; }' +
		            '.k-grid-content { overflow: visible !important; }' +
		            'div.k-grid table { table-layout: auto; width: 100% !important; }' +
		            '.k-grid .k-grid-header th { border-top: 1px solid; }' +
		            '.k-grid-toolbar, .k-grid-pager > .k-link { display: none; }' +
		            '</style><style type="text/css" media="print"> @page { size: portrait; margin:1mm; }'+
		            	'.inv1 .main-color {' +

		            		'-webkit-print-color-adjust:exact; ' +
		            	'} ' +
		            	'.table.table-borderless.table-condensed  tr th { background-color: #1E4E78!important;' +
		            	'-webkit-print-color-adjust:exact; color:#fff!important;}' +
		            	'.table.table-borderless.table-condensed  tr th * { color: #fff!important; -webkit-print-color-adjust:exact;}' +
		            	'.inv1 .light-blue-td { ' +
		            		'background-color: #c6d9f1!important;' +
		            		'text-align: left;' +
		            		'padding-left: 5px;' +
		            		'-webkit-print-color-adjust:exact; ' +
		            	'}' +
		            	'.saleSummaryCustomer .table.table-borderless.table-condensed tr td { ' +
    						'background-color: #F2F2F2!important; -webkit-print-color-adjust:exact;' +
						'}'+
						'.saleSummaryCustomer .table.table-borderless.table-condensed tr:nth-child(2n+1) td { ' +
    						' background-color: #fff!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.journal_block1>.span2 *, .journal_block1>.span5 * {color: #fff!important;}' +
		            	'.journal_block1>.span2:first-child { ' +
    						'background-color: #bbbbbb!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.journal_block1>.span5:last-child {' +
							'background-color: #496cad!important; color: #fff!important; -webkit-print-color-adjust:exact; ' +
						'}' +
						'.journal_block1>.span5 {' +
							'background-color: #5cc7dd!important; color: #fff!important; -webkit-print-color-adjust:exact;' +
						'}' +
		            	'.saleSummaryCustomer .table.table-borderless.table-condensed tfoot .bg-total td {' +
		            		'background-color: #1C2633!important;' +
		            		'color: #fff!important; ' +
		            		'-webkit-print-color-adjust:exact;' +
		            	'}' +
		            	'</style>' +
		            '</head>' +
		            '<body><div class="saleSummaryCustomer" style="padding: 0 10px;">';
		    var htmlEnd =
		            '</div></body>' +
		            '</html>';

		    printableContent = $('#invFormContent').html();
		    doc.write(htmlStart + printableContent + htmlEnd);
		    doc.close();
		    setTimeout(function(){
		    	win.print();
		    	win.close();
		    },2000);
		},
		ExportExcel 		: function(){
	        var workbook = new kendo.ooxml.Workbook({
	          sheets: [
	            {
	              columns: [
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true }
	              ],
	              title: "Sale Detail by Product/Service",
	              rows: this.exArray
	            }
	          ]
	        });
	        //save the file as Excel file with extension xlsx
	        kendo.saveAs({dataURI: workbook.toDataURL(), fileName: "saleDetailProduct.xlsx"});
		}
	});
	banhji.invoiceList =  kendo.observable({
		lang 				: langVM,
		dataSource 			: dataStore(apiUrl + "sales/invoice_list"),
		contactDS  			: banhji.source.customerDS,
		sortList			: banhji.source.sortList,
		sorter 				: "month",
		sdate 				: "",
		edate 				: "",
		obj 				: { contactIds: [] },
		typeList 			: [
			{ "text": "--- All ---", "value": "all" },
			{ "text": "GDN", "value": "GDN" },
			{ "text": "Quote", "value": "Quote" },
			{ "text": "Sale Order", "value": "Sale_Order" }
        ],
        type 				: "all",
		company 			: banhji.institute,
		displayDate 		: "",
		invoiceCount 		: 0,
		totalAmount 		: 0,
		exArray 			: [],
		pageLoad 			: function(){
			this.search();
		},
		sorterChanges 		: function(){
	        var today = new Date(),
        	sdate = "",
        	edate = "",
        	sorter = this.get("sorter");

			switch(sorter){
				case "today":
					this.set("sdate", today);
					this.set("edate", "");

				  	break;
				case "week":
					var first = today.getDate() - today.getDay(),
					last = first + 6;

					this.set("sdate", new Date(today.setDate(first)));
					this.set("edate", new Date(today.setDate(last)));

				  	break;
				case "month":
					this.set("sdate", new Date(today.getFullYear(), today.getMonth(), 1));
					this.set("edate", new Date(today.getFullYear(), today.getMonth() + 1, 0));

				  	break;
				case "year":
				  	this.set("sdate", new Date(today.getFullYear(), 0, 1));
				  	this.set("edate", new Date(today.getFullYear(), 11, 31));

				  	break;
				default:
					this.set("sdate", "");
				  	this.set("edate", "");
			}
		},
		search				: function(){
			var self = this, para = [],
				obj = this.get("obj"),
				type = this.get("type"),
				start = this.get("sdate"),
        		end = this.get("edate"),
        		displayDate = "";

        	//Reference Type
        	if(type=="all"){}else{
        		para.push({ field:"type", operator:"type", value:type });
        	}

        	//Customer
            if(obj.contactIds.length>0){
            	var contactIds = [];
            	$.each(obj.contactIds, function(index, value){
            		contactIds.push(value);
            	});
	            para.push({ field:"contact_id", operator:"where_in", value:contactIds });
	        }

        	//Dates
        	if(start && end){
        		start = new Date(start);
        		end = new Date(end);
        		displayDate = "From " + kendo.toString(start, "dd-MM-yyyy") + " To " + kendo.toString(end, "dd-MM-yyyy");
        		end.setDate(end.getDate()+1);

            	para.push({ field:"issued_date >=", value: kendo.toString(start, "yyyy-MM-dd") });
            	para.push({ field:"issued_date <", value: kendo.toString(end, "yyyy-MM-dd") });
            }else if(start){
            	start = new Date(start);
            	displayDate = "On " + kendo.toString(start, "dd-MM-yyyy");

            	para.push({ field:"issued_date", value: kendo.toString(start, "yyyy-MM-dd") });
            }else if(end){
            	end = new Date(end);
            	displayDate = "As Of " + kendo.toString(end, "dd-MM-yyyy");
        		end.setDate(end.getDate()+1);

            	para.push({ field:"issued_date <", value: kendo.toString(end, "yyyy-MM-dd") });
            }else{

            }
            this.set("displayDate", displayDate);

            this.dataSource.query({
            	filter:para
            }).then(function(){
            	var view = self.dataSource.view();

            	var amount = 0, invoiceCount = 0;
            	$.each(view, function(index, value){
            		$.each(value.line, function(ind, val){
            			invoiceCount++;
	            		amount += val.amount;
	            	});
            	});

            	self.set("invoiceCount", kendo.toString(invoiceCount, "n0"));
            	self.set("totalAmount", kendo.toString(amount, "c2", banhji.locale));
            });
		},
		printGrid			: function() {
			var gridElement = $('#grid'),
		        printableContent = '',
		        win = window.open('', '', 'width=990, height=900'),
		        doc = win.document.open();
		    var htmlStart =
		            '<!DOCTYPE html>' +
		            '<html>' +
		            '<head>' +
		            '<meta charset="utf-8" />' +
		            '<title></title>' +
		            '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />'+
		            '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
		            '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/responsive.css">' +
		            '<link href="<?php echo base_url(); ?>assets/invoice/invoice.css" rel="stylesheet" />'+
		            '<link href="https://fonts.googleapis.com/css?family=Content:400,700" rel="stylesheet" type="text/css">' +
		            '<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">' +
		            '<style>' +
		            'html { font: 11pt sans-serif; }' +
		            '.k-grid { border-top-width: 0; }' +
		            '.k-grid, .k-grid-content { height: auto !important; }' +
		            '.k-grid-content { overflow: visible !important; }' +
		            'div.k-grid table { table-layout: auto; width: 100% !important; }' +
		            '.k-grid .k-grid-header th { border-top: 1px solid; }' +
		            '.k-grid-toolbar, .k-grid-pager > .k-link { display: none; }' +
		            '</style><style type="text/css" media="print"> @page { size: portrait; margin:1mm; }'+
		            	'.inv1 .main-color {' +

		            		'-webkit-print-color-adjust:exact; ' +
		            	'} ' +
		            	'.table.table-borderless.table-condensed  tr th { background-color: #1E4E78!important;' +
		            	'-webkit-print-color-adjust:exact; color:#fff!important;}' +
		            	'.table.table-borderless.table-condensed  tr th * { color: #fff!important; -webkit-print-color-adjust:exact;}' +
		            	'.inv1 .light-blue-td { ' +
		            		'background-color: #c6d9f1!important;' +
		            		'text-align: left;' +
		            		'padding-left: 5px;' +
		            		'-webkit-print-color-adjust:exact; ' +
		            	'}' +
		            	'.saleSummaryCustomer .table.table-borderless.table-condensed tr td { ' +
    						'background-color: #F2F2F2!important; -webkit-print-color-adjust:exact;' +
						'}'+
						'.saleSummaryCustomer .table.table-borderless.table-condensed tr:nth-child(2n+1) td { ' +
    						' background-color: #fff!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.journal_block1>.span2 *, .journal_block1>.span5 * {color: #fff!important;}' +
		            	'.journal_block1>.span2:first-child { ' +
    						'background-color: #bbbbbb!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.journal_block1>.span5:last-child {' +
							'background-color: #496cad!important; color: #fff!important; -webkit-print-color-adjust:exact; ' +
						'}' +
						'.journal_block1>.span5 {' +
							'background-color: #5cc7dd!important; color: #fff!important; -webkit-print-color-adjust:exact;' +
						'}' +
		            	'.saleSummaryCustomer .table.table-borderless.table-condensed tfoot .bg-total td {' +
		            		'background-color: #1C2633!important;' +
		            		'color: #fff!important; ' +
		            		'-webkit-print-color-adjust:exact;' +
		            	'}' +
		            	'</style>' +
		            '</head>' +
		            '<body><div class="saleSummaryCustomer" style="padding: 0 10px;">';
		    var htmlEnd =
		            '</div></body>' +
		            '</html>';

		    printableContent = $('#invFormContent').html();
		    doc.write(htmlStart + printableContent + htmlEnd);
		    doc.close();
		    setTimeout(function(){
		    	win.print();
		    	win.close();
		    },2000);
		},
		ExportExcel 		: function(){
	        var workbook = new kendo.ooxml.Workbook({
	          sheets: [
	            {
	              columns: [
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true }
	              ],
	              title: "General Ledger",
	              rows: this.exArray
	            }
	          ]
	        });
	        //save the file as Excel file with extension xlsx
	        kendo.saveAs({dataURI: workbook.toDataURL(), fileName: "GeneralLedger.xlsx"});
		}
	});
	banhji.customerSale = kendo.observable({
		institute 			: banhji.institute,
		lang 				: langVM,
		locale 				: banhji.locale,
		statementDB 		: dataStore(apiUrl + "sales/statement"),
		count 				: 0,
		total_avg 			: 0,
		saleNumber 			: 0,
		gpm 				: 0,
		total_sale 			: 0,
		companyName 		: null,
		startDate 			: "<?php echo date("d-m-y"); ?>",
		endDate				: new Date(),
		sorter				: '',
		openInvoice 		: 0,
		company 			: banhji.institute,
		sortList			: banhji.source.sortList,
		//line to sale summary
		saleSummary         : banhji.saleSummaryCustomer,
		detailSummary       : banhji.saleDetailCustomer,
		customerTransaction : banhji.customerTransactionList,
		depositDetail 		: banhji.depositDetailCustomer,
		summaryProductSale 	: banhji.saleSummaryProduct,
		detailCustomerSale 	: banhji.saleDetailProduct,
		saleJob  			: banhji.saleJob,
		saleOrderDB 		: banhji.saleOrderReport,
		saleDetail 			: banhji.saleDetail,
		receivableAging 	: banhji.receivableAging,
		receivableDetail 	: banhji.receivableDetail,
		listInvoicesCollect : banhji.listInvoicesCollect,
		collectReportDB 	: banhji.collectReport,
		invoiceListDB 		: banhji.invoiceList,
		stamentSummary 		: banhji.stamentSummary,
		// search button
		saleDetailSearch 	: function() {
			this.detailSale.filter({
				logic: 'segment',
				filters: [
					{field: "id", "operator": "segment", value: 9},
					{field: "issued_date >=", value: kendo.toString(this.startDate, "yyyy-MM-dd")},
					{field: "issued_date <=", value: kendo.toString(this.endDate, "yyyy-MM-dd")}
				]
			});
		},
		displayDateStart    : function() {
			return kendo.toString(new Date(this.get('startDate')), 'dd-MM-yyyy');
		},
		displayDateEnd    : function() {
			return kendo.toString(new Date(this.get('endDate')), 'dd-MM-yyyy');
		},
		trnxSearch 			: function() {},
		depositDetailSearch : function() {},
		summaryProductSearch: function() {},
		detailProductSearch : function() {},
		saleJobSearch 		: function() {},
		saleOrderSearch 	: function() {},
		balanaceSearch 		: function() {},
		balanceDetailSearch : function() {},
		agingSummarySearch  : function() {},
		agingDetailSearch   : function() {},
		collectingInvSearch : function() {},
		collectedInvSearch  : function() {},
		invoiceListSearch 	: function() {},
		customerListSearch 	: function() {},
		dateMax 			: function(e) {
			$('#edate').css('width', '160px');
			var edate = $('#edate').kendoDatePicker().data("kendoDatePicker");
			edate.min(e.sender.value());
		},
		dateMin 			: function(e) {
			$('#sdate').css('width', '160px');
			var sdate = $('#sdate').kendoDatePicker().data("kendoDatePicker");
			sdate.max(e.sender.value());
		},
		printGrid			: function() {
			var gridElement = $('#grid'),
		        printableContent = '',
		        win = window.open('', '', 'width=900, height=700'),
		        doc = win.document.open();
		    var htmlStart =
		            '<!DOCTYPE html>' +
		            '<html>' +
		            '<head>' +
		            '<meta charset="utf-8" />' +
		            '<title></title>' +
		            '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />'+
		            '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
		            '<link href="https://fonts.googleapis.com/css?family=Content:400,700" rel="stylesheet" type="text/css">' +
		            '<link href="<?php echo base_url(); ?>assets/responsive.css" rel="stylesheet" >' +
		            '<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">' +
		            '<style>' +
		            '*{  } html { font: 11pt sans-serif; }' +
		            '.k-grid { border-top-width: 0; }' +
		            '.k-grid, .k-grid-content { height: auto !important; }' +
		            '.k-grid-content { overflow: visible !important; }' +
		            'div.k-grid table { table-layout: auto; width: 100% !important; }' +
		            '.k-grid .k-grid-header th { border-top: 1px solid; }' +
		            '.k-grid-toolbar, .k-grid-pager > .k-link { display: none; }' +
		            '</style><style type="text/css" media="print"> '+
		            '@page { size: landscape; margin:0mm; }'+
		            '.saleSummaryCustomer .total-customer, .saleSummaryCustomer .total-sale { '+
		            	'background-color: #DDEBF7!important; -webkit-print-color-adjust:exact; }'+
		            '.saleSummaryCustomer .table.table-borderless.table-condensed  tr th { '+
		            	'background-color: #1E4E78!important;-webkit-print-color-adjust:exact;}'+
		            '.saleSummaryCustomer .table.table-borderless.table-condensed  tr th span{ '+
		            	'color: #fff!important; }'+
		            '.saleSummaryCustomer .table.table-borderless.table-condensed tr:nth-child(2n+1) td {'+
		              	'background-color: #fff!important; -webkit-print-color-adjust:exact;} '+
		            '.saleSummaryCustomer .table.table-borderless.table-condensed tr td { '+
		            	'background-color: #F2F2F2!important;-webkit-print-color-adjust:exact; }'+
		            '.saleSummaryCustomer .table.table-borderless.table-condensed  tr th span{ '+
		            	'color: #fff!important; }'+
		            '.saleSummaryCustomer .table.table-borderless.table-condensed tr:nth-child(2n+1) td {'+
		              	'background-color: #fff!important; -webkit-print-color-adjust:exact;} '+
		            '.saleSummaryCustomer .table.table-borderless.table-condensed tr td { '+
		            	'background-color: #F2F2F2!important;-webkit-print-color-adjust:exact; }'+
		            	'.saleSummaryCustomer .table.table-borderless.table-condensed  tr th span{ '+
		            	'color: #fff!important; }'+
		            '</style>' +
		            '</head>' +
		            '<body><div id="example" class="k-content saleSummaryCustomer" style="padding: 30px;">';
		    var htmlEnd =
		            '</div></body>' +
		            '</html>';
		    printableContent = $('#invFormContent').html();
		    doc.write(htmlStart + printableContent + htmlEnd);
		    doc.close();
		    setTimeout(function(){
		    	win.print();
		    	win.close();
		    },2000);
		},
		ExportExcelSSC 		: function(){
			console.log(banhji.saleSummaryCustomer.exArray);
	        var workbook = new kendo.ooxml.Workbook({
	          sheets: [
	            {
	              columns: [
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true }
	              ],
	              title: "Sale Summary by Customer",
	              rows: banhji.saleSummaryCustomer.exArray
	            }
	          ]
	        });
	        //save the file as Excel file with extension xlsx
	        kendo.saveAs({dataURI: workbook.toDataURL(), fileName: "SaleSummaryCustomer.xlsx"});
		},
		ExportExcelSDC 		: function(){
			console.log(banhji.saleDetailCustomer.exArray);
	        var workbook = new kendo.ooxml.Workbook({
	          sheets: [
	            {
	              columns: [
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true }
	              ],
	              title: "Sale Detail by Customer",
	              rows: banhji.saleDetailCustomer.exArray
	            }
	          ]
	        });
	        //save the file as Excel file with extension xlsx
	        kendo.saveAs({dataURI: workbook.toDataURL(), fileName: "SaleDetailCustomer.xlsx"});
		},
		ExportExcelLIC 		: function(){
			console.log(banhji.saleDetailCustomer.exArray);
	        var workbook = new kendo.ooxml.Workbook({
	          sheets: [
	            {
	              columns: [
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true }
	              ],
	              title: "List of Invoices to be Collected",
	              rows: banhji.listInvoicesCollect.exArray
	            }
	          ]
	        });
	        //save the file as Excel file with extension xlsx
	        kendo.saveAs({dataURI: workbook.toDataURL(), fileName: "ListInvoicesCollect.xlsx"});
		},
		ExportExcelSSP 		: function(){
	        var workbook = new kendo.ooxml.Workbook({
	          sheets: [
	            {
	              columns: [
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true }
	              ],
	              title: "Sale Summary by Products/Services",
	              rows: banhji.saleSummaryProduct.exArray
	            }
	          ]
	        });
	        //save the file as Excel file with extension xlsx
	        kendo.saveAs({dataURI: workbook.toDataURL(), fileName: "saleSummaryProduct.xlsx"});
		},
		dateChange 			: function(){
			// var strDate = "";

			// 	if(this.startDate && this.endDate){
			// 		strDate = "From " + kendo.toString(this.startDate, "dd-MM-yyyy") + " To " + kendo.toString(this.endDate, "dd-MM-yyyy");
			// 	}else if(this.startDate){
			// 		strDate = "On " + kendo.toString(this.startDate,"dd-MM-yyyy");
			// 	}else if(this.endDate){
			// 		strDate = "As Of " + kendo.toString(this.endDate,"dd-MM-yyyy");
			// 	}else{
			// 		strDate = "";
			// 	}

			var today = new Date(),
			day = today.getDate();
        	sdate = "",
        	edate = "",
        	value = this.get('sorter');

			switch(value){
			case "today":
				sdate = today;

			  	break;
			case "week":
				var first = new Date(today.getTime() - 60*60*24* day*1000),
				last = new Date(today.getTime() + 60*60*24* day*1000);

				sdate = first;
				edate = last;

			  	break;
			case "month":
				var sdate = new Date(today.getFullYear(), today.getMonth(), 1),
				edate = new Date(today.getFullYear(), today.getMonth() + 1, 0);

			  	break;
			case "year":
			  	var sdate = new Date(today.getFullYear(), 0, 1),
			  	edate = new Date(today.getFullYear(), 11, 31);

			  	break;
			default:

			}

			this.set("startDate", sdate);
			this.set("endDate", edate);
			// start.value(sdate);
			// end.value(edate);

			// start.max(end.value());
		   //      	end.min(start.value());

		   //      	dateChanges();
		   //          });

		   //          start.max(end.value());
		   //          end.min(start.value());
		}
	});
	banhji.draftTransaction =  kendo.observable({
		lang 				: langVM,
		dataSource 			: dataStore(apiUrl + "sales/draft_list"),
		contactDS  			: banhji.source.customerDS,
		sortList			: banhji.source.sortList,
		sorter 				: "month",
		sdate 				: "",
		edate 				: "",
		obj 				: { contactIds: [] },
		company 			: banhji.institute,
		displayDate 		: "",
		totalAmount 		: 0,
		exArray 			: [],
		pageLoad 			: function(){
			this.search();
		},
		sorterChanges 		: function(){
	        var today = new Date(),
        	sdate = "",
        	edate = "",
        	sorter = this.get("sorter");

			switch(sorter){
				case "today":
					this.set("sdate", today);
					this.set("edate", "");

				  	break;
				case "week":
					var first = today.getDate() - today.getDay(),
					last = first + 6;

					this.set("sdate", new Date(today.setDate(first)));
					this.set("edate", new Date(today.setDate(last)));

				  	break;
				case "month":
					this.set("sdate", new Date(today.getFullYear(), today.getMonth(), 1));
					this.set("edate", new Date(today.getFullYear(), today.getMonth() + 1, 0));

				  	break;
				case "year":
				  	this.set("sdate", new Date(today.getFullYear(), 0, 1));
				  	this.set("edate", new Date(today.getFullYear(), 11, 31));

				  	break;
				default:
					this.set("sdate", "");
				  	this.set("edate", "");
			}
		},
		search				: function(){
			var self = this, para = [],
				obj = this.get("obj"),
				start = this.get("sdate"),
        		end = this.get("edate"),
        		displayDate = "";

        	//Customer
            if(obj.contactIds.length>0){
            	var contactIds = [];
            	$.each(obj.contactIds, function(index, value){
            		contactIds.push(value);
            	});
	            para.push({ field:"contact_id", operator:"where_in", value:contactIds });
	        }

        	//Dates
        	if(start && end){
        		start = new Date(start);
        		end = new Date(end);
        		displayDate = "From " + kendo.toString(start, "dd-MM-yyyy") + " To " + kendo.toString(end, "dd-MM-yyyy");
        		end.setDate(end.getDate()+1);

            	para.push({ field:"issued_date >=", value: kendo.toString(start, "yyyy-MM-dd") });
            	para.push({ field:"issued_date <", value: kendo.toString(end, "yyyy-MM-dd") });
            }else if(start){
            	start = new Date(start);
            	displayDate = "On " + kendo.toString(start, "dd-MM-yyyy");

            	para.push({ field:"issued_date", value: kendo.toString(start, "yyyy-MM-dd") });
            }else if(end){
            	end = new Date(end);
            	displayDate = "As Of " + kendo.toString(end, "dd-MM-yyyy");
        		end.setDate(end.getDate()+1);

            	para.push({ field:"issued_date <", value: kendo.toString(end, "yyyy-MM-dd") });
            }else{

            }
            this.set("displayDate", displayDate);

            this.dataSource.query({
            	filter:para
            }).then(function(){
            	var view = self.dataSource.view();

            	var amount = 0;
            	$.each(view, function(index, value){
            		$.each(value.line, function(ind, val){
	            		amount += val.amount;
	            	});
            	});

            	self.set("totalAmount", kendo.toString(amount, "c2", banhji.locale));
            });
            this.dataSource.bind("requestEnd", function(e){
				if(e.type=="read"){
					var response = e.response, balanceCal = 0, balance= 0;
					self.exArray = [];

					self.exArray.push({
	            		cells: [
	            			{ value: self.company.name, textAlign: "center", colSpan: 5}
	            		]
	            	});
	            	self.exArray.push({
	            		cells: [
	            			{ value: "Draft List",bold: true, fontSize: 20, textAlign: "center", colSpan: 5}
	            		]
	            	});
	            	if(self.displayDate){
		            	self.exArray.push({
		            		cells: [
		            			{ value: self.displayDate, textAlign: "center", colSpan: 5}
		            		]
		            	});
		            }
	            	self.exArray.push({
	            		cells: [
	            			{ value: "", colSpan: 5}
	            		]
	            	});
	            	self.exArray.push({
	            		cells: [
							{ value: "Type", background: "#496cad", color: "#ffffff" },
							{ value: "Date", background: "#496cad", color: "#ffffff" },
							{ value: "Reference", background: "#496cad", color: "#ffffff" },
							{ value: "Action", background: "#496cad", color: "#ffffff" },
							{ value: "Amount", background: "#496cad", color: "#ffffff" },
						]
					});
					for (var i = 0; i < response.results.length; i++){
						self.exArray.push({
					        cells: [
					          	{ value: response.results[i].name, bold: true, },
					            { value: "" },
					            { value: "" },
					            { value: "" },
					            { value: "" },
					        ]

					    });
					    for(var j = 0; j < response.results[i].line.length; j++){
					    	balance += response.results[i].line[j].amount;
					    	var action = "Use";
				          	self.exArray.push({
				          		cells: [
				          	  		{ value: response.results[i].line[j].type },
				              		{ value: response.results[i].line[j].issued_date },
				              		{ value: response.results[i].line[j].number},
				              		{ value: action},
				              		{ value: response.results[i].line[j].amount },
				            	]
				          	});
				        }
				    	self.exArray.push({
					        cells: [
					          	{ value: "", colSpan: 4 }
					        ]
					    });
					}
				}
			});
		},
		printGrid			: function() {
			var gridElement = $('#grid'),
		        printableContent = '',
		        win = window.open('', '', 'width=990, height=900'),
		        doc = win.document.open();
		    var htmlStart =
		            '<!DOCTYPE html>' +
		            '<html>' +
		            '<head>' +
		            '<meta charset="utf-8" />' +
		            '<title></title>' +
		            '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />'+
		            '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
		            '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/responsive.css">' +
		            '<link href="<?php echo base_url(); ?>assets/invoice/invoice.css" rel="stylesheet" />'+
		            '<link href="https://fonts.googleapis.com/css?family=Content:400,700" rel="stylesheet" type="text/css">' +
		            '<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">' +
		            '<style>' +
		            'html { font: 11pt sans-serif; }' +
		            '.k-grid { border-top-width: 0; }' +
		            '.k-grid, .k-grid-content { height: auto !important; }' +
		            '.k-grid-content { overflow: visible !important; }' +
		            'div.k-grid table { table-layout: auto; width: 100% !important; }' +
		            '.k-grid .k-grid-header th { border-top: 1px solid; }' +
		            '.k-grid-toolbar, .k-grid-pager > .k-link { display: none; }' +
		            '</style><style type="text/css" media="print"> @page { size: portrait; margin:1mm; }'+
		            	'.inv1 .main-color {' +

		            		'-webkit-print-color-adjust:exact; ' +
		            	'} ' +
		            	'.table.table-borderless.table-condensed  tr th { background-color: #1E4E78!important;' +
		            	'-webkit-print-color-adjust:exact; color:#fff!important;}' +
		            	'.table.table-borderless.table-condensed  tr th * { color: #fff!important; -webkit-print-color-adjust:exact;}' +
		            	'.inv1 .light-blue-td { ' +
		            		'background-color: #c6d9f1!important;' +
		            		'text-align: left;' +
		            		'padding-left: 5px;' +
		            		'-webkit-print-color-adjust:exact; ' +
		            	'}' +
		            	'.saleSummaryCustomer .table.table-borderless.table-condensed tr td { ' +
    						'background-color: #F2F2F2!important; -webkit-print-color-adjust:exact;' +
						'}'+
						'.saleSummaryCustomer .table.table-borderless.table-condensed tr:nth-child(2n+1) td { ' +
    						' background-color: #fff!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.journal_block1>.span2 *, .journal_block1>.span5 * {color: #fff!important;}' +
		            	'.journal_block1>.span2:first-child { ' +
    						'background-color: #bbbbbb!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.journal_block1>.span5:last-child {' +
							'background-color: #496cad!important; color: #fff!important; -webkit-print-color-adjust:exact; ' +
						'}' +
						'.journal_block1>.span5 {' +
							'background-color: #5cc7dd!important; color: #fff!important; -webkit-print-color-adjust:exact;' +
						'}' +
		            	'.saleSummaryCustomer .table.table-borderless.table-condensed tfoot .bg-total td {' +
		            		'background-color: #1C2633!important;' +
		            		'color: #fff!important; ' +
		            		'-webkit-print-color-adjust:exact;' +
		            	'}' +
		            	'</style>' +
		            '</head>' +
		            '<body><div class="saleSummaryCustomer" style="padding: 0 10px;">';
		    var htmlEnd =
		            '</div></body>' +
		            '</html>';

		    printableContent = $('#invFormContent').html();
		    doc.write(htmlStart + printableContent + htmlEnd);
		    doc.close();
		    setTimeout(function(){
		    	win.print();
		    	win.close();
		    },2000);
		},
		ExportExcel 		: function(){
	        var workbook = new kendo.ooxml.Workbook({
	          sheets: [
	            {
	              columns: [
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	              ],
	              title: "Draft List",
	              rows: this.exArray
	            }
	          ]
	        });
	        //save the file as Excel file with extension xlsx
	        kendo.saveAs({dataURI: workbook.toDataURL(), fileName: "draftList.xlsx"});
		}
	});
	banhji.customerList = kendo.observable({
		lang 					: langVM,
		institute 				: banhji.institute,
		dataSource 				: dataStore(apiUrl + "sales/customer"),
		statusList 				: banhji.source.statusList,
		contact_type_id 		: null,
		status 					: null,
		exArray 			: [],
		pageLoad 				: function(){
			this.search();
		},
		search 					: function(){
			// var para = [],
			// status = this.get("status"),
			// contact_type_id = this.get("contact_type_id");

			// if(status!==null){
			// 	para.push({ field:"status", value: status });
			// }

			// if(contact_type_id){
			// 	para.push({ field:"contact_type_id", value: contact_type_id });
			// }

			// this.dataSource.filter(para);
			// this.dataSource.query({
		//          	filter:para
		//          });

			// this.set("status", null);
			// this.set("contact_type_id", null);
			this.dataSource.bind("requestEnd", function(e){
				if(e.type=="read"){
					var response = e.response;
					self.exArray = [];

	            	self.exArray.push({
	            		cells: [
	            			{ value: "Customer List",bold: true, fontSize: 20, textAlign: "center", colSpan: 6 }
	            		]
	            	});
	            	self.exArray.push({
	            		cells: [
	            			{ value: "", colSpan: 6 }
	            		]
	            	});
	            	self.exArray.push({
	            		cells: [
							{ value: "CusttomerID", background: "#496cad", color: "#ffffff" },
							{ value: "Customer Name", background: "#496cad", color: "#ffffff" },
							{ value: "Type", background: "#496cad", color: "#ffffff" },
							{ value: "Address", background: "#496cad", color: "#ffffff" },
							{ value: "Phone", background: "#496cad", color: "#ffffff" },
							{ value: "Email", background: "#496cad", color: "#ffffff" },
						]
					});
	            	for (var i = 0; i < response.results.length; i++){
				          	self.exArray.push({
				          		cells: [
				          	  		{ value: response.results[i].number},
				          	  		{ value: response.results[i].name },
				          	  		{ value: response.results[i].contact_type },
				          	  		{ value: response.results[i].address },
				          	  		{ value: response.results[i].phone },
				          	  		{ value: response.results[i].email },

				            	]
				          	});
					    self.exArray.push({
					        cells: [
					          	{ value: "", colSpan: 6 }
					        ]
					    });
					}
				}
			});
		},
		printGrid			: function() {
			var gridElement = $('#grid'),
		        printableContent = '',
		        win = window.open('', '', 'width=990, height=900'),
		        doc = win.document.open();
		    var htmlStart =
		            '<!DOCTYPE html>' +
		            '<html>' +
		            '<head>' +
		            '<meta charset="utf-8" />' +
		            '<title></title>' +
		            '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />'+
		            '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
		            '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/responsive.css">' +
		            '<link href="<?php echo base_url(); ?>assets/invoice/invoice.css" rel="stylesheet" />'+
		            '<link href="https://fonts.googleapis.com/css?family=Content:400,700" rel="stylesheet" type="text/css">' +
		            '<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">' +
		            '<style>' +
		            'html { font: 11pt sans-serif; }' +
		            '.k-grid { border-top-width: 0; }' +
		            '.k-grid, .k-grid-content { height: auto !important; }' +
		            '.k-grid-content { overflow: visible !important; }' +
		            'div.k-grid table { table-layout: auto; width: 100% !important; }' +
		            '.k-grid .k-grid-header th { border-top: 1px solid; }' +
		            '.k-grid-toolbar, .k-grid-pager > .k-link { display: none; }' +
		            '</style><style type="text/css" media="print"> @page { size: portrait; margin:1mm; }'+
		            	'.inv1 .main-color {' +

		            		'-webkit-print-color-adjust:exact; ' +
		            	'} ' +
		            	'.table.table-borderless.table-condensed  tr th { background-color: #1E4E78!important;' +
		            	'-webkit-print-color-adjust:exact; color:#fff!important;}' +
		            	'.table.table-borderless.table-condensed  tr th * { color: #fff!important; -webkit-print-color-adjust:exact;}' +
		            	'.inv1 .light-blue-td { ' +
		            		'background-color: #c6d9f1!important;' +
		            		'text-align: left;' +
		            		'padding-left: 5px;' +
		            		'-webkit-print-color-adjust:exact; ' +
		            	'}' +
		            	'.saleSummaryCustomer .table.table-borderless.table-condensed tr td { ' +
    						'background-color: #F2F2F2!important; -webkit-print-color-adjust:exact;' +
						'}'+
						'.saleSummaryCustomer .table.table-borderless.table-condensed tr:nth-child(2n+1) td { ' +
    						' background-color: #fff!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.journal_block1>.span2 *, .journal_block1>.span5 * {color: #fff!important;}' +
		            	'.journal_block1>.span2:first-child { ' +
    						'background-color: #bbbbbb!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.journal_block1>.span5:last-child {' +
							'background-color: #496cad!important; color: #fff!important; -webkit-print-color-adjust:exact; ' +
						'}' +
						'.journal_block1>.span5 {' +
							'background-color: #5cc7dd!important; color: #fff!important; -webkit-print-color-adjust:exact;' +
						'}' +
		            	'.saleSummaryCustomer .table.table-borderless.table-condensed tfoot .bg-total td {' +
		            		'background-color: #1C2633!important;' +
		            		'color: #fff!important; ' +
		            		'-webkit-print-color-adjust:exact;' +
		            	'}' +
		            	'</style>' +
		            '</head>' +
		            '<body><div class="saleSummaryCustomer" style="padding: 0 10px;">';
		    var htmlEnd =
		            '</div></body>' +
		            '</html>';

		    printableContent = $('#invFormContent').html();
		    doc.write(htmlStart + printableContent + htmlEnd);
		    doc.close();
		    setTimeout(function(){
		    	win.print();
		    	win.close();
		    },2000);
		},
		ExportExcel 		: function(){
	        var workbook = new kendo.ooxml.Workbook({
	          sheets: [
	            {
	              columns: [
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true }
	              ],
	              title: "Cusotmer List",
	              rows: this.exArray
	            }
	          ]
	        });
	        //save the file as Excel file with extension xlsx
	        kendo.saveAs({dataURI: workbook.toDataURL(), fileName: "customerList.xlsx"});
		}
	});
	banhji.saleOrderDetailbyCustomer =  kendo.observable({
        lang                : langVM,
        dataSource          : dataStore(apiUrl + "sales/saleOrder_summary"),
        itemDS              : new kendo.data.DataSource({
            transport: {
                read    : {
                    url: apiUrl + "items",
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
            schema  : {
                model: {
                    id: 'id'
                },
                data: 'results',
                total: 'count'
            },
            filter:[
                { field: "is_catalog <>", value: 1 },
                { field: "is_assembly <>", value: 1 },
                { field: "item_type_id", operator:"where_in", value: [1,4] }
            ],
            sort:[
                { field:"item_type_id", dir:"asc" },
                { field:"number", dir:"asc" }
            ],
            serverFiltering: true,
            serverSorting: true,
            serverPaging: true,
            page:1,
            pageSize: 100
        }),
        sortList            : banhji.source.sortList,
        sorter              : "month",
        sdate               : "",
        edate               : "",
        obj                 : { itemIds: [] },
        company             : banhji.institute,
        displayDate         : "",
        avg_sale            : 0,
        total_sale          : 0,
        exArray             : [],
        pageLoad            : function(){
            this.search();
        },
        sorterChanges       : function(){
            var today = new Date(),
            sdate = "",
            edate = "",
            sorter = this.get("sorter");

            switch(sorter){
                case "today":
                    this.set("sdate", today);
                    this.set("edate", "");

                    break;
                case "week":
                    var first = today.getDate() - today.getDay(),
                    last = first + 6;

                    this.set("sdate", new Date(today.setDate(first)));
                    this.set("edate", new Date(today.setDate(last)));

                    break;
                case "month":
                    this.set("sdate", new Date(today.getFullYear(), today.getMonth(), 1));
                    this.set("edate", new Date(today.getFullYear(), today.getMonth() + 1, 0));

                    break;
                case "year":
                    this.set("sdate", new Date(today.getFullYear(), 0, 1));
                    this.set("edate", new Date(today.getFullYear(), 11, 31));

                    break;
                default:
                    this.set("sdate", "");
                    this.set("edate", "");
            }
        },
        search              : function(){
            var self = this, para = [],
                obj = this.get("obj"),
                start = this.get("sdate"),
                end = this.get("edate"),
                displayDate = "";

            //Customer
            if(obj.itemIds.length>0){
                var itemIds = [];
                $.each(obj.itemIds, function(index, value){
                    itemIds.push(value);
                });
                para.push({ field:"item_id", operator:"where_in", value:itemIds });
            }

            //Dates
            if(start && end){
                start = new Date(start);
                end = new Date(end);
                displayDate = "From " + kendo.toString(start, "dd-MM-yyyy") + " To " + kendo.toString(end, "dd-MM-yyyy");
                end.setDate(end.getDate()+1);

                para.push({ field:"issued_date >=", operator:"where_related_transaction", value: kendo.toString(start, "yyyy-MM-dd") });
                para.push({ field:"issued_date <", operator:"where_related_transaction", value: kendo.toString(end, "yyyy-MM-dd") });
            }else if(start){
                start = new Date(start);
                displayDate = "On " + kendo.toString(start, "dd-MM-yyyy");

                para.push({ field:"issued_date", operator:"where_related_transaction", value: kendo.toString(start, "yyyy-MM-dd") });
            }else if(end){
                end = new Date(end);
                displayDate = "As Of " + kendo.toString(end, "dd-MM-yyyy");
                end.setDate(end.getDate()+1);

                para.push({ field:"issued_date <", operator:"where_related_transaction", value: kendo.toString(end, "yyyy-MM-dd") });
            }else{

            }
            this.set("displayDate", displayDate);

            this.dataSource.query({
                filter:para,
                page: 1,
                pageSize : 20,
            }).then(function(){
                var view = self.dataSource.view();

                var txnCount = 0, amount = 0;
                $.each(view, function(index, value){
                    txnCount += value.txn_count;
                    amount += value.amount;
                });

                var avgSale = 0;
                if(txnCount>0){
                    avgSale = amount/txnCount;
                }

                self.set("avg_sale", kendo.toString(avgSale, "c2", banhji.locale));
                self.set("total_sale", kendo.toString(amount, "c2", banhji.locale));
            });
            this.dataSource.bind("requestEnd", function(e){
                if(e.type=="read"){
                    var response = e.response;
                    self.exArray = [];

                    self.exArray.push({
                        cells: [
                            { value: self.company.name, textAlign: "center", colSpan: 6 }
                        ]
                    });
                    self.exArray.push({
                        cells: [
                            { value: "Sale Summary by Product/Service",bold: true, fontSize: 20, textAlign: "center", colSpan: 6 }
                        ]
                    });
                    if(self.displayDate){
                        self.exArray.push({
                            cells: [
                                { value: self.displayDate, textAlign: "center", colSpan: 6 }
                            ]
                        });
                    };
                    self.exArray.push({
                        cells: [
                            { value: "", colSpan: 6 }
                        ]
                    });
                    self.exArray.push({
                        cells: [
                            { value: "Item", background: "#496cad", color: "#ffffff" },
                            { value: "QTY", background: "#496cad", color: "#ffffff" },
                            { value: "Amount", background: "#496cad", color: "#ffffff" },
                            { value: "AVG Price", background: "#496cad", color: "#ffffff" },
                            { value: "AVG Cost", background: "#496cad", color: "#ffffff" },
                            { value: "Gross Profit Margin", background: "#496cad", color: "#ffffff" },
                        ]
                    });
                    for (var i = 0; i < response.results.length; i++){
                            self.exArray.push({
                                cells: [
                                    { value: response.results[i].name },
                                    { value: kendo.parseFloat(response.results[i].quantity)},
                                    { value: kendo.parseFloat(response.results[i].amount)},
                                    { value: kendo.parseFloat(response.results[i].avg_price)},
                                    { value: kendo.parseFloat(response.results[i].avg_cost)},
                                    { value: kendo.parseFloat(response.results[i].gpm)},
                                ]
                            });
                        self.exArray.push({
                            cells: [
                                { value: "", colSpan: 6 }
                            ]
                        });
                    }
                }
            });
        },
        printGrid           : function() {
            var gridElement = $('#grid'),
                printableContent = '',
                win = window.open('', '', 'width=990, height=900'),
                doc = win.document.open();
            var htmlStart =
                    '<!DOCTYPE html>' +
                    '<html>' +
                    '<head>' +
                    '<meta charset="utf-8" />' +
                    '<title></title>' +
                    '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />'+
                    '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
                    '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/responsive.css">' +
                    '<link href="<?php echo base_url(); ?>assets/invoice/invoice.css" rel="stylesheet" />'+
                    '<link href="https://fonts.googleapis.com/css?family=Content:400,700" rel="stylesheet" type="text/css">' +
                    '<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">' +
                    '<style>' +
                    'html { font: 11pt sans-serif; }' +
                    '.k-grid { border-top-width: 0; }' +
                    '.k-grid, .k-grid-content { height: auto !important; }' +
                    '.k-grid-content { overflow: visible !important; }' +
                    'div.k-grid table { table-layout: auto; width: 100% !important; }' +
                    '.k-grid .k-grid-header th { border-top: 1px solid; }' +
                    '.k-grid-toolbar, .k-grid-pager > .k-link { display: none; }' +
                    '</style><style type="text/css" media="print"> @page { size: portrait; margin:1mm; }'+
                        '.inv1 .main-color {' +

                            '-webkit-print-color-adjust:exact; ' +
                        '} ' +
                        '.table.table-borderless.table-condensed  tr th { background-color: #1E4E78!important;' +
                        '-webkit-print-color-adjust:exact; color:#fff!important;}' +
                        '.table.table-borderless.table-condensed  tr th * { color: #fff!important; -webkit-print-color-adjust:exact;}' +
                        '.inv1 .light-blue-td { ' +
                            'background-color: #c6d9f1!important;' +
                            'text-align: left;' +
                            'padding-left: 5px;' +
                            '-webkit-print-color-adjust:exact; ' +
                        '}' +
                        '.saleSummaryCustomer .table.table-borderless.table-condensed tr td { ' +
                            'background-color: #F2F2F2!important; -webkit-print-color-adjust:exact;' +
                        '}'+
                        '.saleSummaryCustomer .table.table-borderless.table-condensed tr:nth-child(2n+1) td { ' +
                            ' background-color: #fff!important; -webkit-print-color-adjust:exact;' +
                        '}' +
                        '.journal_block1>.span2 *, .journal_block1>.span5 * {color: #fff!important;}' +
                        '.journal_block1>.span2:first-child { ' +
                            'background-color: #bbbbbb!important; -webkit-print-color-adjust:exact;' +
                        '}' +
                        '.journal_block1>.span5:last-child {' +
                            'background-color: #496cad!important; color: #fff!important; -webkit-print-color-adjust:exact; ' +
                        '}' +
                        '.journal_block1>.span5 {' +
                            'background-color: #5cc7dd!important; color: #fff!important; -webkit-print-color-adjust:exact;' +
                        '}' +
                        '.saleSummaryCustomer .table.table-borderless.table-condensed tfoot .bg-total td {' +
                            'background-color: #1C2633!important;' +
                            'color: #fff!important; ' +
                            '-webkit-print-color-adjust:exact;' +
                        '}' +
                        '</style>' +
                    '</head>' +
                    '<body><div class="saleSummaryCustomer" style="padding: 0 10px;">';
            var htmlEnd =
                    '</div></body>' +
                    '</html>';

            printableContent = $('#invFormContent').html();
            doc.write(htmlStart + printableContent + htmlEnd);
            doc.close();
            setTimeout(function(){
                win.print();
                win.close();
            },2000);
        },
        ExportExcel         : function(){
            var workbook = new kendo.ooxml.Workbook({
              sheets: [
                {
                  columns: [
                    { autoWidth: true },
                    { autoWidth: true },
                    { autoWidth: true },
                    { autoWidth: true },
                    { autoWidth: true },
                    { autoWidth: true }
                  ],
                  title: "Sale Summary Product",
                  rows: this.exArray
                }
              ]
            });
            //save the file as Excel file with extension xlsx
            kendo.saveAs({dataURI: workbook.toDataURL(), fileName: "saleSummaryProduct.xlsx"});
        }
    });
    banhji.saleOrderDetailbyItem =  kendo.observable({
        lang                : langVM,
        dataSource          : dataStore(apiUrl + "sales/saleOrder_detail_item"),
        contactDS           : banhji.source.customerDS,
        sortList            : banhji.source.sortList,
        itemDS              : new kendo.data.DataSource({
            transport: {
                read    : {
                    url: apiUrl + "items",
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
            schema  : {
                model: {
                    id: 'id'
                },
                data: 'results',
                total: 'count'
            },
            filter:[
                { field: "is_catalog <>", value: 1 },
                { field: "is_assembly <>", value: 1 },
                { field: "item_type_id", operator:"where_in", value: [1,4] }
            ],
            sort:[
                { field:"item_type_id", dir:"asc" },
                { field:"number", dir:"asc" }
            ],
            serverFiltering: true,
            serverSorting: true,
            serverPaging: true,
            page:1,
            pageSize: 100
        }),
        sorter              : "month",
        sdate               : "",
        edate               : "",
        obj                 : { itemIds: [] },
        company             : banhji.institute,
        displayDate         : "",
        totalAmount         : 0,
        exArray             : [],
        pageLoad            : function(){
            this.search();
        },
        sorterChanges       : function(){
            var today = new Date(),
            sdate = "",
            edate = "",
            sorter = this.get("sorter");

            switch(sorter){
                case "today":
                    this.set("sdate", today);
                    this.set("edate", "");

                    break;
                case "week":
                    var first = today.getDate() - today.getDay(),
                    last = first + 6;

                    this.set("sdate", new Date(today.setDate(first)));
                    this.set("edate", new Date(today.setDate(last)));

                    break;
                case "month":
                    this.set("sdate", new Date(today.getFullYear(), today.getMonth(), 1));
                    this.set("edate", new Date(today.getFullYear(), today.getMonth() + 1, 0));

                    break;
                case "year":
                    this.set("sdate", new Date(today.getFullYear(), 0, 1));
                    this.set("edate", new Date(today.getFullYear(), 11, 31));

                    break;
                default:
                    this.set("sdate", "");
                    this.set("edate", "");
            }
        },
        search              : function(){
            var self = this, para = [],
                obj = this.get("obj"),
                start = this.get("sdate"),
                end = this.get("edate"),
                displayDate = "";

           //Customer
            if(obj.itemIds.length>0){
                var itemIds = [];
                $.each(obj.itemIds, function(index, value){
                    itemIds.push(value);
                });
                para.push({ field:"item_id", operator:"where_in", value:itemIds });
            }

            //Dates
            if(start && end){
                start = new Date(start);
                end = new Date(end);
                displayDate = "From " + kendo.toString(start, "dd-MM-yyyy") + " To " + kendo.toString(end, "dd-MM-yyyy");
                end.setDate(end.getDate()+1);

                para.push({ field:"issued_date >=", value: kendo.toString(start, "yyyy-MM-dd") });
                para.push({ field:"issued_date <", value: kendo.toString(end, "yyyy-MM-dd") });
            }else if(start){
                start = new Date(start);
                displayDate = "On " + kendo.toString(start, "dd-MM-yyyy");

                para.push({ field:"issued_date", value: kendo.toString(start, "yyyy-MM-dd") });
            }else if(end){
                end = new Date(end);
                displayDate = "As Of " + kendo.toString(end, "dd-MM-yyyy");
                end.setDate(end.getDate()+1);

                para.push({ field:"issued_date <", value: kendo.toString(end, "yyyy-MM-dd") });
            }else{

            }
            this.set("displayDate", displayDate);

            this.dataSource.query({
                filter:para,
                page: 1,
                pageSize: 100
            }).then(function(){
                var view = self.dataSource.view();

                var amount = 0;
                $.each(view, function(index, value){
                    $.each(value.line, function(ind, val){
                        amount += val.amount;
                    });
                });

                self.set("totalAmount", kendo.toString(amount, "c2", banhji.locale));
            });
            this.dataSource.bind("requestEnd", function(e){
                if(e.type=="read"){
                    var response = e.response, balanceCal = 0, balance= 0;
                    self.exArray = [];

                    self.exArray.push({
                        cells: [
                            { value: self.company.name, textAlign: "center", colSpan: 4}
                        ]
                    });
                    self.exArray.push({
                        cells: [
                            { value: "Sale Detail by Customer",bold: true, fontSize: 20, textAlign: "center", colSpan: 4 }
                        ]
                    });
                    if(self.displayDate){
                        self.exArray.push({
                            cells: [
                                { value: self.displayDate, textAlign: "center", colSpan: 4 }
                            ]
                        });
                    }
                    self.exArray.push({
                        cells: [
                            { value: "", colSpan: 4 }
                        ]
                    });
                    self.exArray.push({
                        cells: [
                            { value: "Type", background: "#496cad", color: "#ffffff" },
                            { value: "Date", background: "#496cad", color: "#ffffff" },
                            { value: "Reference", background: "#496cad", color: "#ffffff" },
                            { value: "Amount", background: "#496cad", color: "#ffffff" },
                        ]
                    });
                    for (var i = 0; i < response.results.length; i++){
                        self.exArray.push({
                            cells: [
                                { value: response.results[i].name, bold: true, },
                                { value: "" },
                                { value: "" },
                                { value: "" },
                            ]

                        });
                        for(var j = 0; j < response.results[i].line.length; j++){
                            balance += response.results[i].line[j].amount;
                            self.exArray.push({
                                cells: [
                                    { value: response.results[i].line[j].type },
                                    { value: response.results[i].line[j].issued_date },
                                    { value: response.results[i].line[j].number},
                                    { value: response.results[i].line[j].amount },
                                ]
                            });
                        }
                        self.exArray.push({
                            cells: [
                                { value: "", colSpan: 4 }
                            ]
                        });
                    }
                }
            });
        },
        printGrid           : function() {
            var gridElement = $('#grid'),
                printableContent = '',
                win = window.open('', '', 'width=990, height=900'),
                doc = win.document.open();
            var htmlStart =
                    '<!DOCTYPE html>' +
                    '<html>' +
                    '<head>' +
                    '<meta charset="utf-8" />' +
                    '<title></title>' +
                    '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />'+
                    '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
                    '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/responsive.css">' +
                    '<link href="<?php echo base_url(); ?>assets/invoice/invoice.css" rel="stylesheet" />'+
                    '<link href="https://fonts.googleapis.com/css?family=Content:400,700" rel="stylesheet" type="text/css">' +
                    '<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">' +
                    '<style>' +
                    'html { font: 11pt sans-serif; }' +
                    '.k-grid { border-top-width: 0; }' +
                    '.k-grid, .k-grid-content { height: auto !important; }' +
                    '.k-grid-content { overflow: visible !important; }' +
                    'div.k-grid table { table-layout: auto; width: 100% !important; }' +
                    '.k-grid .k-grid-header th { border-top: 1px solid; }' +
                    '.k-grid-toolbar, .k-grid-pager > .k-link { display: none; }' +
                    '</style><style type="text/css" media="print"> @page { size: portrait; margin:1mm; }'+
                        '.inv1 .main-color {' +

                            '-webkit-print-color-adjust:exact; ' +
                        '} ' +
                        '.table.table-borderless.table-condensed  tr th { background-color: #1E4E78!important;' +
                        '-webkit-print-color-adjust:exact; color:#fff!important;}' +
                        '.table.table-borderless.table-condensed  tr th * { color: #fff!important; -webkit-print-color-adjust:exact;}' +
                        '.inv1 .light-blue-td { ' +
                            'background-color: #c6d9f1!important;' +
                            'text-align: left;' +
                            'padding-left: 5px;' +
                            '-webkit-print-color-adjust:exact; ' +
                        '}' +
                        '.saleSummaryCustomer .table.table-borderless.table-condensed tr td { ' +
                            'background-color: #F2F2F2!important; -webkit-print-color-adjust:exact;' +
                        '}'+
                        '.saleSummaryCustomer .table.table-borderless.table-condensed tr:nth-child(2n+1) td { ' +
                            ' background-color: #fff!important; -webkit-print-color-adjust:exact;' +
                        '}' +
                        '.journal_block1>.span2 *, .journal_block1>.span5 * {color: #fff!important;}' +
                        '.journal_block1>.span2:first-child { ' +
                            'background-color: #bbbbbb!important; -webkit-print-color-adjust:exact;' +
                        '}' +
                        '.journal_block1>.span5:last-child {' +
                            'background-color: #496cad!important; color: #fff!important; -webkit-print-color-adjust:exact; ' +
                        '}' +
                        '.journal_block1>.span5 {' +
                            'background-color: #5cc7dd!important; color: #fff!important; -webkit-print-color-adjust:exact;' +
                        '}' +
                        '.saleSummaryCustomer .table.table-borderless.table-condensed tfoot .bg-total td {' +
                            'background-color: #1C2633!important;' +
                            'color: #fff!important; ' +
                            '-webkit-print-color-adjust:exact;' +
                        '}' +
                        '</style>' +
                    '</head>' +
                    '<body><div class="saleSummaryCustomer" style="padding: 0 10px;">';
            var htmlEnd =
                    '</div></body>' +
                    '</html>';

            printableContent = $('#invFormContent').html();
            doc.write(htmlStart + printableContent + htmlEnd);
            doc.close();
            setTimeout(function(){
                win.print();
                win.close();
            },2000);
        },
        ExportExcel         : function(){
            var workbook = new kendo.ooxml.Workbook({
              sheets: [
                {
                  columns: [
                    { autoWidth: true },
                    { autoWidth: true },
                    { autoWidth: true },
                    { autoWidth: true },
                  ],
                  title: "Sale Detail by Customer",
                  rows: this.exArray
                }
              ]
            });
            //save the file as Excel file with extension xlsx
            kendo.saveAs({dataURI: workbook.toDataURL(), fileName: "saleDetailCustomer.xlsx"});
        }
    });
    banhji.saleOrderDetailbyEmployee =  kendo.observable({
        lang                : langVM,
        dataSource          : dataStore(apiUrl + "sales/saleOrder_detail_employee"),
        contactDS           : banhji.source.customerDS,
        sortList            : banhji.source.sortList,
        itemDS              : new kendo.data.DataSource({
            transport: {
                read    : {
                    url: apiUrl + "items",
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
            schema  : {
                model: {
                    id: 'id'
                },
                data: 'results',
                total: 'count'
            },
            filter:[
                { field: "is_catalog <>", value: 1 },
                { field: "is_assembly <>", value: 1 },
                { field: "item_type_id", operator:"where_in", value: [1,4] }
            ],
            sort:[
                { field:"item_type_id", dir:"asc" },
                { field:"number", dir:"asc" }
            ],
            serverFiltering: true,
            serverSorting: true,
            serverPaging: true,
            page:1,
            pageSize: 100
        }),
        sorter              : "month",
        sdate               : "",
        edate               : "",
        obj                 : { itemIds: [] },
        company             : banhji.institute,
        displayDate         : "",
        totalAmount         : 0,
        exArray             : [],
        pageLoad            : function(){
            this.search();
        },
        sorterChanges       : function(){
            var today = new Date(),
            sdate = "",
            edate = "",
            sorter = this.get("sorter");

            switch(sorter){
                case "today":
                    this.set("sdate", today);
                    this.set("edate", "");

                    break;
                case "week":
                    var first = today.getDate() - today.getDay(),
                    last = first + 6;

                    this.set("sdate", new Date(today.setDate(first)));
                    this.set("edate", new Date(today.setDate(last)));

                    break;
                case "month":
                    this.set("sdate", new Date(today.getFullYear(), today.getMonth(), 1));
                    this.set("edate", new Date(today.getFullYear(), today.getMonth() + 1, 0));

                    break;
                case "year":
                    this.set("sdate", new Date(today.getFullYear(), 0, 1));
                    this.set("edate", new Date(today.getFullYear(), 11, 31));

                    break;
                default:
                    this.set("sdate", "");
                    this.set("edate", "");
            }
        },
        search              : function(){
            var self = this, para = [],
                obj = this.get("obj"),
                start = this.get("sdate"),
                end = this.get("edate"),
                displayDate = "";

           //Customer
            if(obj.itemIds.length>0){
                var itemIds = [];
                $.each(obj.itemIds, function(index, value){
                    itemIds.push(value);
                });
                para.push({ field:"item_id", operator:"where_in", value:itemIds });
            }

            //Dates
            if(start && end){
                start = new Date(start);
                end = new Date(end);
                displayDate = "From " + kendo.toString(start, "dd-MM-yyyy") + " To " + kendo.toString(end, "dd-MM-yyyy");
                end.setDate(end.getDate()+1);

                para.push({ field:"issued_date >=", value: kendo.toString(start, "yyyy-MM-dd") });
                para.push({ field:"issued_date <", value: kendo.toString(end, "yyyy-MM-dd") });
            }else if(start){
                start = new Date(start);
                displayDate = "On " + kendo.toString(start, "dd-MM-yyyy");

                para.push({ field:"issued_date", value: kendo.toString(start, "yyyy-MM-dd") });
            }else if(end){
                end = new Date(end);
                displayDate = "As Of " + kendo.toString(end, "dd-MM-yyyy");
                end.setDate(end.getDate()+1);

                para.push({ field:"issued_date <", value: kendo.toString(end, "yyyy-MM-dd") });
            }else{

            }
            this.set("displayDate", displayDate);

            this.dataSource.query({
                filter:para,
                page: 1,
                pageSize: 100
            }).then(function(){
                var view = self.dataSource.view();

                var amount = 0;
                $.each(view, function(index, value){
                    $.each(value.line, function(ind, val){
                        amount += val.amount;
                    });
                });

                self.set("totalAmount", kendo.toString(amount, "c2", banhji.locale));
            });
            this.dataSource.bind("requestEnd", function(e){
                if(e.type=="read"){
                    var response = e.response, balanceCal = 0, balance= 0;
                    self.exArray = [];

                    self.exArray.push({
                        cells: [
                            { value: self.company.name, textAlign: "center", colSpan: 4}
                        ]
                    });
                    self.exArray.push({
                        cells: [
                            { value: "Sale Detail by Customer",bold: true, fontSize: 20, textAlign: "center", colSpan: 4 }
                        ]
                    });
                    if(self.displayDate){
                        self.exArray.push({
                            cells: [
                                { value: self.displayDate, textAlign: "center", colSpan: 4 }
                            ]
                        });
                    }
                    self.exArray.push({
                        cells: [
                            { value: "", colSpan: 4 }
                        ]
                    });
                    self.exArray.push({
                        cells: [
                            { value: "Type", background: "#496cad", color: "#ffffff" },
                            { value: "Date", background: "#496cad", color: "#ffffff" },
                            { value: "Reference", background: "#496cad", color: "#ffffff" },
                            { value: "Amount", background: "#496cad", color: "#ffffff" },
                        ]
                    });
                    for (var i = 0; i < response.results.length; i++){
                        self.exArray.push({
                            cells: [
                                { value: response.results[i].name, bold: true, },
                                { value: "" },
                                { value: "" },
                                { value: "" },
                            ]

                        });
                        for(var j = 0; j < response.results[i].line.length; j++){
                            balance += response.results[i].line[j].amount;
                            self.exArray.push({
                                cells: [
                                    { value: response.results[i].line[j].type },
                                    { value: response.results[i].line[j].issued_date },
                                    { value: response.results[i].line[j].number},
                                    { value: response.results[i].line[j].amount },
                                ]
                            });
                        }
                        self.exArray.push({
                            cells: [
                                { value: "", colSpan: 4 }
                            ]
                        });
                    }
                }
            });
        },
        printGrid           : function() {
            var gridElement = $('#grid'),
                printableContent = '',
                win = window.open('', '', 'width=990, height=900'),
                doc = win.document.open();
            var htmlStart =
                    '<!DOCTYPE html>' +
                    '<html>' +
                    '<head>' +
                    '<meta charset="utf-8" />' +
                    '<title></title>' +
                    '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />'+
                    '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
                    '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/responsive.css">' +
                    '<link href="<?php echo base_url(); ?>assets/invoice/invoice.css" rel="stylesheet" />'+
                    '<link href="https://fonts.googleapis.com/css?family=Content:400,700" rel="stylesheet" type="text/css">' +
                    '<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">' +
                    '<style>' +
                    'html { font: 11pt sans-serif; }' +
                    '.k-grid { border-top-width: 0; }' +
                    '.k-grid, .k-grid-content { height: auto !important; }' +
                    '.k-grid-content { overflow: visible !important; }' +
                    'div.k-grid table { table-layout: auto; width: 100% !important; }' +
                    '.k-grid .k-grid-header th { border-top: 1px solid; }' +
                    '.k-grid-toolbar, .k-grid-pager > .k-link { display: none; }' +
                    '</style><style type="text/css" media="print"> @page { size: portrait; margin:1mm; }'+
                        '.inv1 .main-color {' +

                            '-webkit-print-color-adjust:exact; ' +
                        '} ' +
                        '.table.table-borderless.table-condensed  tr th { background-color: #1E4E78!important;' +
                        '-webkit-print-color-adjust:exact; color:#fff!important;}' +
                        '.table.table-borderless.table-condensed  tr th * { color: #fff!important; -webkit-print-color-adjust:exact;}' +
                        '.inv1 .light-blue-td { ' +
                            'background-color: #c6d9f1!important;' +
                            'text-align: left;' +
                            'padding-left: 5px;' +
                            '-webkit-print-color-adjust:exact; ' +
                        '}' +
                        '.saleSummaryCustomer .table.table-borderless.table-condensed tr td { ' +
                            'background-color: #F2F2F2!important; -webkit-print-color-adjust:exact;' +
                        '}'+
                        '.saleSummaryCustomer .table.table-borderless.table-condensed tr:nth-child(2n+1) td { ' +
                            ' background-color: #fff!important; -webkit-print-color-adjust:exact;' +
                        '}' +
                        '.journal_block1>.span2 *, .journal_block1>.span5 * {color: #fff!important;}' +
                        '.journal_block1>.span2:first-child { ' +
                            'background-color: #bbbbbb!important; -webkit-print-color-adjust:exact;' +
                        '}' +
                        '.journal_block1>.span5:last-child {' +
                            'background-color: #496cad!important; color: #fff!important; -webkit-print-color-adjust:exact; ' +
                        '}' +
                        '.journal_block1>.span5 {' +
                            'background-color: #5cc7dd!important; color: #fff!important; -webkit-print-color-adjust:exact;' +
                        '}' +
                        '.saleSummaryCustomer .table.table-borderless.table-condensed tfoot .bg-total td {' +
                            'background-color: #1C2633!important;' +
                            'color: #fff!important; ' +
                            '-webkit-print-color-adjust:exact;' +
                        '}' +
                        '</style>' +
                    '</head>' +
                    '<body><div class="saleSummaryCustomer" style="padding: 0 10px;">';
            var htmlEnd =
                    '</div></body>' +
                    '</html>';

            printableContent = $('#invFormContent').html();
            doc.write(htmlStart + printableContent + htmlEnd);
            doc.close();
            setTimeout(function(){
                win.print();
                win.close();
            },2000);
        },
        ExportExcel         : function(){
            var workbook = new kendo.ooxml.Workbook({
              sheets: [
                {
                  columns: [
                    { autoWidth: true },
                    { autoWidth: true },
                    { autoWidth: true },
                    { autoWidth: true },
                  ],
                  title: "Sale Detail by Customer",
                  rows: this.exArray
                }
              ]
            });
            //save the file as Excel file with extension xlsx
            kendo.saveAs({dataURI: workbook.toDataURL(), fileName: "saleDetailCustomer.xlsx"});
        }
    });
	//
	banhji.invoiceForm =  kendo.observable({
        lang                : langVM,
        dataSource          : dataStore(apiUrl + "transactions"),
        referenceDS         : dataStore(apiUrl + "transactions"),
        txnTemplateDS       : dataStore(apiUrl + "transaction_templates"),
        obj                 : {title: "Quotation", issued_date : "<?php echo date('d/M/Y'); ?>", number : "QO123456", type : "Quote", amount: "$500,000.00", contact: []},
        company             : banhji.institute,
        paymentMethodDS     : banhji.source.paymentMethodDS,
        lineDS              : dataStore(apiUrl + "item_lines"),
        accountLineDS       : dataStore(apiUrl + "account_lines"),
        proaccountLineDS    : null,
        accountLine         : null,
        user_id             : banhji.source.user_id,
        selectForm          : null,
        contactDS           : dataStore(apiUrl + "contacts"),
        contactT            : null,
        paymentS            : null,
        accountDS           : null,
        journalLineDS       : dataStore(apiUrl + "journal_lines"),
        segmentItemDS       : banhji.source.segmentItemDS,
        totalCR             : 0,
        totalDR             : 0,
        netAmountDUE        : 0,
        isFalse             : false,
        numberToString      : '',
        numToWords          : function(number) {

            //Validates the number input and makes it a string
            if (typeof number === 'string') {
                number = parseInt(number, 10);
            }
            if (typeof number === 'number' && isFinite(number)) {
                number = number.toString(10);
            } else {
                return 'This is not a valid number';
            }

            //Creates an array with the number's digits and
            //adds the necessary amount of 0 to make it fully
            //divisible by 3
            var digits = number.split('');
            while (digits.length % 3 !== 0) {
                digits.unshift('0');
            }

            //Groups the digits in groups of three
            var digitsGroup = [];
            var numberOfGroups = digits.length / 3;
            for (var i = 0; i < numberOfGroups; i++) {
                digitsGroup[i] = digits.splice(0, 3);
            }
            //console.log(digitsGroup); //debug

            //Change the group's numerical values to text
            var digitsGroupLen = digitsGroup.length;
            var numTxt = [
                [null, 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine'], //hundreds
                [null, 'ten', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety'], //tens
                [null, 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine'] //ones
                ];
            var tenthsDifferent = ['ten', 'eleven', 'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen'];

            // j maps the groups in the digitsGroup
            // k maps the element's position in the group to the numTxt equivalent
            // k values: 0 = hundreds, 1 = tens, 2 = ones
            for (var j = 0; j < digitsGroupLen; j++) {
                for (var k = 0; k < 3; k++) {
                    var currentValue = digitsGroup[j][k];
                    digitsGroup[j][k] = numTxt[k][currentValue];
                    if (k === 0 && currentValue !== '0') { // !==0 avoids creating a string "null hundred"
                        digitsGroup[j][k] += ' hundred ';
                    } else if (k === 1 && currentValue === '1') { //Changes the value in the tens place and erases the value in the ones place
                        digitsGroup[j][k] = tenthsDifferent[digitsGroup[j][2]];
                        digitsGroup[j][2] = 0; //Sets to null. Because it sets the next k to be evaluated, setting this to null doesn't work.
                    }
                }
            }

            //Adds '-' for gramar, cleans all null values, joins the group's elements into a string
            for (var l = 0; l < digitsGroupLen; l++) {
                if (digitsGroup[l][1] && digitsGroup[l][2]) {
                    digitsGroup[l][1] += '-';
                }
                digitsGroup[l].filter(function (e) {return e !== null});
                digitsGroup[l] = digitsGroup[l].join('');
            }

            //Adds thousand, millions, billion and etc to the respective string.
            var posfix = [null, 'thousand', 'million', 'billion', 'trillion', 'quadrillion', 'quintillion', 'sextillion'];
            if (digitsGroupLen > 1) {
                var posfixRange = posfix.splice(0, digitsGroupLen).reverse();
                for (var m = 0; m < digitsGroupLen - 1; m++) { //'-1' prevents adding a null posfix to the last group
                    if (digitsGroup[m]) {
                        digitsGroup[m] += ' ' + posfixRange[m];
                    }
                }
            }
            var word = digitsGroup.join(' ');
            if(this.get("obj").locale == 'en-US'){
                word = word + " USD only.";
            }else if(this.get("obj").locale == 'km-KH'){
                word = word + " Riel only.";
            }
            //Joins all the string into one and returns it
            this.set("numberToString", word.toUpperCase());
        },
        amountTotal         : "",
        offsetnumber        : "",
        offsetamount        : 0,
        balanceDS           : dataStore(apiUrl + "transactions"),
        pageLoad            : function(id, is_recurring){
            var self = this;
            this.dataSource.query({
                filter: { field:"id", value: id },
                page: 1,
                take: 1
            }).then(function(e){
                var view = self.dataSource.view();
                view[0].set("sub_total", kendo.toString(view[0].sub_total, "c", view[0].locale));
                view[0].set("tax", kendo.toString(view[0].tax, "c", view[0].locale));
                view[0].set("discount", kendo.toString(view[0].discount, "c", view[0].locale));
                self.set("amountTotal", view[0].amount);
                view[0].set("cash_receipt", kendo.toString(view[0].amount - view[0].deposit, "c", view[0].locale));
                //Get Customer ballance
                self.balanceDS.query({
                    filter: [
                        {field: "id <>", value: view[0].id},
                        {field: "contact_id", value: view[0].contact_id},
                        {field: "status <>", value: 1}
                    ]
                }).then(function(e){
                    var b = self.balanceDS.view();
                    if(b.length > 0){
                        self.calContactBalance(b);
                    }else{
                        $("#loading-inv").remove();
                    }
                });
                view[0].set("deposit", kendo.toString(view[0].deposit, "c", view[0].locale));
                view[0].set("issued_date", kendo.toString(new Date(view[0].issued_date), 'D'));
                view[0].set("due_date", kendo.toString(new Date(view[0].due_date), "dd MMM yyyy"));
                view[0].set("amount", kendo.toString(view[0].amount, "c", view[0].locale));
                if(view[0].description == "null"){
                    view[0].set("description", "No Description");
                }
                if(view[0].payment_method_id){
                    self.paymentMethodDS.filter({field: "id", value: view[0].payment_method_id});
                }else{
                    self.paymentMethodDS.add({
                        name: 'Cash'
                    });
                }
                if(view[0].offset_invoice.length > 0){
                  var offamount = 0;
                  $.each(view[0].offset_invoice, function(i,v){
                    self.set("offsetnumber", self.get("offsetnumber") + " " + v.number);
                    offamount += kendo.parseFloat(v.amount);
                  });
                  self.set("offsetamount", kendo.toString(offamount, "c", view[0].locale));
                }
                self.set("obj", view[0]);
                var amountDue = kendo.parseFloat(view[0].amount) - kendo.parseFloat(view[0].deposit);
                self.get("obj").set("amount_due", kendo.toString(amountDue, "c", view[0].locale))
                self.loadObjTemplate(view[0].transaction_template_id, id);
                self.contactDS.filter({field: "id", value: view[0].contact_id});
                //give id
                var d = view[0];
                self.get("obj").set("qrcodevalue", "inv_num:"+d.number+"\ninv_amount:"+d.amount+"\ninv_date:"+d.issued_date+"\ncus_id:"+d.contact.id+"\ncus_name:"+d.contact.name+"\nstatus:"+d.status);
                if(self.get("obj").type == 'Direct_Expense'){
                    self.get("obj").set("title", "PAYMENT VOUCHER");
                }else if(self.get("obj").type == 'Reimbursement'){
                    self.get("obj").set("title", "REIMBURSEMENT VOUCHER");
                }else if(self.get("obj").type == 'Advance_Settlement'){
                    self.get("obj").set("title", "ADVANCE SETTLEMENT VOUCHER");
                }
                //get job
                if(view[0].job_id){
                    self.jobDS.filter({field: "id", value: view[0].job_id});
                }
            });
        },
        old_remain          : 0,
        amount_owed         : 0,
        calContactBalance   : function(data){
            var oldremain = 0;
            var obj = this.get("obj");
            $.each(data, function(i,v){
                var ba = v.amount - v.amount_paid;
                oldremain += ba;
            });
            this.set("old_remain", kendo.toString(oldremain, "c", obj.locale));
            this.set("amount_owed", kendo.toString(this.get("amountTotal") + oldremain, "c", obj.locale));
            $("#loading-inv").remove();
        },
        printGrid           : function() {
            var obj = this.get('obj'), colorM, ts;
            if(obj.color == null){
                colorM = "#10253f";
            }else{
                colorM = obj.color;
            }
            if(obj.color == '#000000' || obj.color =='#1f497d' || obj.color == null){
                ts = 'color: #fff!important;';
            } else { ts = 'color: #333;'; }
            var gridElement = $('#grid'),
                printableContent = '',
                win = window.open('', '', 'width=800, height=900'),
                doc = win.document.open();
            var htmlStart =
                    '<!DOCTYPE html>' +
                    '<html>' +
                    '<head>' +
                    '<meta charset="utf-8" />' +
                    '<title></title>' +
                    '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />'+
                    '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
                    '<link href="<?php echo base_url(); ?>assets/invoice/invoice.css" rel="stylesheet" />'+
                    '<link href="https://fonts.googleapis.com/css?family=Preahvihear" rel="stylesheet">' +
                    '<link href="https://fonts.googleapis.com/css?family=Content:400,700" rel="stylesheet" type="text/css">' +
                    '<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">' +
                    '<link href="https://fonts.googleapis.com/css?family=Preahvihear" rel="stylesheet" />' +
                    '<style>' +
                    'html { font: 11pt sans-serif; }' +
                    '.k-grid { border-top-width: 0; }' +
                    '.k-grid, .k-grid-content { height: auto !important; }' +
                    '.k-grid-content { overflow: visible !important; }' +
                    'div.k-grid table { table-layout: auto; width: 100% !important; }' +
                    '.k-grid .k-grid-header th { border-top: 1px solid; }' +
                    '.k-grid-toolbar, .k-grid-pager > .k-link { display: none; }' +
                    '</style><style type="text/css" media="print"> @page { size: portrait; margin:0mm;margin-top: 1mm; }'+
                        '.inv1 .main-color {' +
                            'background-color: '+colorM+'!important; ' + ts +
                            '-webkit-print-color-adjust:exact; ' +
                        '} ' +
                        '.inv1 .main-color th{' +
                            'background-color: '+colorM+'!important; ' + ts +
                            '-webkit-print-color-adjust:exact; ' +
                        '} ' +
                        '.inv1 .light-blue-td { ' +
                            'background-color: #c6d9f1!important;' +
                            'text-align: left;' +
                            'padding-left: 5px;' +
                            '-webkit-print-color-adjust:exact; ' +
                        '}' +
                        '.inv1 thead tr {'+
                            'background-color: rgb(242, 242, 242)!important;'+
                            '-webkit-print-color-adjust:exact; ' +
                        '}'+
                        '.pcg .mid-title div {' + ts + '}' +
                        '.pcg .mid-header {' +
                            'background-color: #dce6f2!important; ' +
                            '-webkit-print-color-adjust:exact; ' +
                        '}'+
                        '.inv1 span.total-amount { ' +
                            'color:#fff!important;' +
                        '}</style>' +
                    '</head>' +
                    '<body>';
            var htmlEnd =
                    '</body>' +
                    '</html>';

            printableContent = $('#invFormContent').html();
            doc.write(htmlStart + printableContent + htmlEnd);
            doc.close();
            setTimeout(function(){
                win.print();
                //win.close();
            },2000);
        },
        activeInvoiceTmp        : function(e){
            console.log(e);
            var Active;
            switch(e) {
                case 1: Active = banhji.view.invoiceForm1; break;
                case 2: Active = banhji.view.invoiceForm2; break;
                //case 3: Active = banhji.view.invoiceForm3; break;
                //case 4: Active = banhji.view.invoiceForm4; break;
                //case 5: Active = banhji.view.invoiceForm5; break;
                case 6: Active = banhji.view.invoiceForm6; break;
                case 7: Active = banhji.view.invoiceForm7; break;
                case 8: Active = banhji.view.invoiceForm8; break;
                case 9: Active = banhji.view.invoiceForm9; break;
                case 10: Active = banhji.view.invoiceForm10; break;
                case 11: Active = banhji.view.invoiceForm11; break;
                case 12: Active = banhji.view.invoiceForm12; break;
                case 13: Active = banhji.view.invoiceForm13; break;
                case 14: Active = banhji.view.invoiceForm31; break;
                case 15: Active = banhji.view.invoiceForm15; break;
                case 16: Active = banhji.view.invoiceForm25; break;
                case 17: Active = banhji.view.invoiceForm17; break;
                case 18: Active = banhji.view.invoiceForm18; break;
                case 19: Active = banhji.view.invoiceForm19; break;
                case 20: Active = banhji.view.invoiceForm20; break;
                case 21: Active = banhji.view.invoiceForm21; break;
                case 22: Active = banhji.view.invoiceForm22; break;
                case 23: Active = banhji.view.invoiceForm28; break;
                case 24: Active = banhji.view.invoiceForm29; break;
                case 25: Active = banhji.view.invoiceForm35; break;
                case 26: Active = banhji.view.invoiceForm39; break;
                case 27: Active = banhji.view.invoiceForm19; break;
                case 28: Active = banhji.view.invoiceForm25; break;
                case 29: Active = banhji.view.invoiceForm26; break;
                case 30: Active = banhji.view.invoiceForm25; break;
                case 31: Active = banhji.view.invoiceForm25; break;
                case 32: Active = banhji.view.invoiceForm27; break;
                case 33: Active = banhji.view.invoiceForm30; break;
                case 34: Active = banhji.view.invoiceForm32; break;
                case 35: Active = banhji.view.invoiceForm33; break;
                case 36: Active = banhji.view.invoiceForm34; break;
                case 37: Active = banhji.view.invoiceForm36; break;
                case 38: Active = banhji.view.invoiceForm37; break;
                case 39: Active = banhji.view.invoiceForm38; break;
                case 40: Active = banhji.view.invoiceForm40; break;
                case 41: Active = banhji.view.invoiceForm41; break;
                case 42: Active = banhji.view.invoiceForm42; break;
                case 43: Active = banhji.view.formCaritasExpense; break;
                case 44: Active = banhji.view.formCaritasJournal; break;
                case 50: Active = banhji.view.invoicePCGPADEE; break;
                case 51: Active = banhji.view.invoiceHDCom; break;
                case 52: Active = banhji.view.invoiceMAXConcrete; break;
                case 53: Active = banhji.view.invoiceVATMAXConcrete; break;
                case 54: Active = banhji.view.invoiceHeritageWalk; break;
                case 55: Active = banhji.view.invoiceVATHeritageWalk; break;
                case 56: Active = banhji.view.invoiceREACHS; break;
                case 57: Active = banhji.view.invoiceVATREACHS; break;
                case 58: Active = banhji.view.invoicePCG; break;
                case 59: Active = banhji.view.invoiceVATPCG; break;
                case 60: Active = banhji.view.normalInvoicePCG; break;
                case 61: Active = banhji.view.normalInvoiceREACHS; break;
                case 62: Active = banhji.view.recieptNoteRicemill; break;
                case 63: Active = banhji.view.depositHeritageWalk; break;
                case 64: Active = banhji.view.receiptHeritageWalk; break;
                case 65: Active = banhji.view.advanceVoucherPCG; break;
                case 68: Active = banhji.view.normalInvoiceKSLM; break;
                case 69: Active = banhji.view.commercialInvoiceKSLM; break;
                case 70: Active = banhji.view.vatInvoiceKSLM; break;
                case 71: Active = banhji.view.defaultCashAdvance; break;
                case 72: Active = banhji.view.defaultPurchase; break;
                case 73: Active = banhji.view.defaultSaleReturn; break;
                case 74: Active = banhji.view.defaultCashRefund; break;
                case 75: Active = banhji.view.invoiceHaveBalance; break;
                case 76: Active = banhji.view.normalInvoiceHeritageWalk; break;
                case 77: Active = banhji.view.posInvoiceKSLM; break;
                case 78: Active = banhji.view.posCashSaleKSLM; break;
                case 79: Active = banhji.view.advanceVoucherHurbanHub; break;
                case 82: Active = banhji.view.MAXConcreteCashAdvance; break;
            }
            banhji.view.invoiceForm.showIn('#invFormContent', Active);
        },
        segmentItemDS       : dataStore(apiUrl + "segments/item"),
        jobDS               : dataStore(apiUrl + "jobs"),
        haveAccount         : false,
        amountOfAccLine     : 0,
        loadObjTemplate     : function(id, transaction_id){
        	console.log('B');
            var self = this, obj = this.get('obj');
            this.txnTemplateDS.query({
                filter: { field:"id", value: id },
                page: 1,
                take: 100
            }).then(function(e){
                var view = self.txnTemplateDS.view(), Index = parseInt(view[0].transaction_form_id), Active;
                obj.set("color", view[0].color);
                if(obj.type == "Advance_Settlement"){
                    obj.set("title", "Advance Settlement");
                }else{
                    obj.set("title", view[0].title);
                }
                self.activeInvoiceTmp(Index);
                self.lineDS.query({
                    filter: { field:"transaction_id", value: transaction_id }
                })
                .then(function(e){
                    $("#loading-inv").remove();
                    var CountItemsRow = parseInt(self.lineDS.data().length);
                    var TotalRow = 10 - CountItemsRow;
                    if(banhji.institute.id != 1021){
                        if(TotalRow > 0){
                            if(view[0].transaction_form_id != '73' && view[0].transaction_form_id != '74'){
                                for (var i = 1; i < TotalRow; i++) {
                                    self.lineDS.add({
                                        id          : i,
                                        transaction_id      : i,
                                        tax_item_id         : 0,
                                        item_id             : 0,
                                        assembly_id         : 0,
                                        measurement_id      : 0,
                                        description         : "",
                                        quantity            : "",
                                        conversion_ratio    : 1,
                                        cost                : 0,
                                        price               : 0,
                                        amount              : "",
                                        discount            : 0,
                                        discount_percentage : 0,
                                        tax                 : 0,
                                        rate                : 1,
                                        locale              : "",
                                        movement            : -1,
                                        reference_no        : "",
                                        item                : { id:"", name:"" },
                                        measurement         : { measurement_id:"", measurement:"" },
                                        tax_item            : { id:"", name:"" },
                                        variant             : [],
                                        item_prices             : { measurement_id:"", measurement:"" },
                                    });
                                }
                            }
                        }
                    }
                    
                });
                self.accountLineDS.query({
                    filter: { field:"transaction_id", value: transaction_id }
                }).then(function(e){
                    if(banhji.invoiceForm.accountLineDS.data().length > 0){
                        $.each(banhji.source.accountList, function(i,v){
                            if(v.id == banhji.invoiceForm.accountLineDS.data()[0].account_id){
                                self.set("proaccountLineDS", v);
                                return false;
                            }
                        });
                        self.set("haveAccount", true);
                        self.set("amountOfAccLine", 0);
                        var amountOfAcc = 0;
                        $.each(self.accountLineDS.data(), function(i,v){
                            amountOfAcc += v.amount;
                        });
                        self.set("amountOfAccLine", kendo.toString(amountOfAcc, self.accountLineDS.data()[0].locale == 'km-KH'?'c':'c2', self.accountLineDS.data()[0].locale));
                    }else{
                        self.set("haveAccount", false);
                    }
                });
                if(self.get("obj").account_id){
                    $.each(banhji.source.accountList, function(i,v){
                        if(v.id == self.get("obj").account_id){
                            self.set("accountDS", v);
                            return false;
                        }
                    });
                }
                var SegMentID = '';
                self.journalLineDS.query({
                    filter:{field: "transaction_id", value: transaction_id}
                }).then(function(e){
                    if(self.journalLineDS.data().length > 0){
                        var DR = 0, CR = 0;
                        var that = self;
                        $.each(self.journalLineDS.data(),function(i,v){
                            //Calculate DR/CR
                            DR += v.dr;
                            CR += v.cr;
                        });
                        var journalLocale = banhji.invoiceForm.journalLineDS.data()[0].locale;
                        banhji.invoiceForm.set("totalCR", kendo.toString(CR, journalLocale == 'km-KH'?'c':'c2', journalLocale));
                        banhji.invoiceForm.set("totalDR", kendo.toString(DR, journalLocale == 'km-KH'?'c':'c2', journalLocale));
                        var D = kendo.parseFloat(banhji.invoiceForm.get("obj").deposit);
                        var NumToStr = banhji.invoiceForm.numToWords(DR - D);
                        // banhji.invoiceForm.set("numberToString", NumToStr.toUpperCase());
                        banhji.invoiceForm.set("netAmountDUE", kendo.toString(DR - D, journalLocale == 'km-KH'?'c':'c2', journalLocale));
                        var CountLineRow = parseInt(self.journalLineDS.data().length);
                        var TotalRow = 12 - CountLineRow;
                        if(TotalRow > 0){
                            self.setQR();
                        }
                    }
                });
                self.currencyDS.filter({field: "locale", value: obj.locale});
            });
        },
        setQR           :function(){
            var obj = this.get("obj");
            // var qrCode = $("#invQR").data("kendoQRCode");
            //  qrCode.destroy();
            $("#invQR").kendoQRCode({
                value: "inv_num:"+obj.number+"\ninv_amount:"+obj.amount+"\ninv_date:"+obj.issued_date+"\ncus_id:"+obj.contact.id+"\ncus_name:"+obj.contact.name+"\nstatus:"+obj.status,
                size: 120,
                color: "#10253f",
                encoding: "UTF_8",
                background: "transparent"
            });
        },
        refreshJournalDatasource : function(){
            var ListVW = $("#formListView").data("kendoListView");
            ListVW.refresh();
        },
        cancel              : function(){
            this.dataSource.cancelChanges();
            window.history.back();
        },
        totalDr: function() {
            var sum = 0;

            $.each(this.journalLineDS.data(), function(index, value) {
                sum += value.dr;
            });

            return sum;
        },
        totalCr: function() {
            var sum = 0;

            $.each(this.journalLineDS.data(), function(index, value) {
                sum += value.cr;
            });

            return sum;
        },
        currencyDS          : banhji.source.currencyDS,
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

		saleCenter: new kendo.Layout("#saleCenter", {model: banhji.saleCenter}),
		customer: new kendo.Layout("#customer", {model: banhji.customer}),
		quote: new kendo.Layout("#quote", {model: banhji.quote}),
		saleOrder: new kendo.Layout("#saleOrder", {model: banhji.saleOrder}),
		customerDeposit: new kendo.Layout("#customerDeposit", {model: banhji.customerDeposit}),
		cashSale: new kendo.Layout("#cashSale", {model: banhji.cashSale}),
		sale: new kendo.Layout("#sale", {model: banhji.sale}),
		internalUsage: new kendo.Layout("#internalUsage", {model: banhji.internalUsage}),
		saleReportCenter: new kendo.Layout("#saleReportCenter", {model: banhji.saleReportCenter}),
		saleRecurring : new kendo.Layout("#saleRecurring", {model: banhji.saleRecurring}),
		saleInventoryPositionSummary: new kendo.Layout("#saleInventoryPositionSummary", {model: banhji.inventoryPositionSummary}),
		quotationList : new kendo.Layout("#quotationList", {model: banhji.quotationList}),
		saleOrderList : new kendo.Layout("#saleOrderList", {model: banhji.saleOrderList}),
		saleOrderByJobEngagment : new kendo.Layout("#saleOrderByJobEngagment", {model: banhji.saleOrderByJobEngagment}),
		saleOrderDetailbyCustomer: new kendo.Layout("#saleOrderDetailbyCustomer", {model: banhji.saleOrderDetailbyCustomer}),
        saleOrderDetailbyItem: new kendo.Layout("#saleOrderDetailbyItem", {model: banhji.saleOrderDetailbyItem}),
        saleOrderDetailbyEmployee: new kendo.Layout("#saleOrderDetailbyEmployee", {model: banhji.saleOrderDetailbyEmployee}),

		customerReportCenter: new kendo.Layout("#customerReportCenter", {model: banhji.customerReportCenter}),
		recieptNoteRicemill: new kendo.Layout("#recieptNoteRicemill", {model: banhji.invoiceForm}),
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
        defaultSaleReturn: new kendo.Layout("#defaultSaleReturn", {model: banhji.invoiceForm}),
        defaultCashAdvance: new kendo.Layout("#defaultCashAdvance", {model: banhji.invoiceForm}),
        defaultCashRefund: new kendo.Layout("#defaultCashRefund", {model: banhji.invoiceForm}),
        defaultPurchase: new kendo.Layout("#defaultPurchase", {model: banhji.invoiceForm}),
        invoiceHaveBalance: new kendo.Layout("#invoiceHaveBalance", {model: banhji.invoiceForm}),
        //Max Concrete
        invoiceMAXConcrete: new kendo.Layout("#invoiceMAXConcrete", {model: banhji.invoiceForm}),
        invoiceVATMAXConcrete: new kendo.Layout("#invoiceVATMAXConcrete", {model: banhji.invoiceForm}),
        MAXConcreteCashAdvance: new kendo.Layout("#MAXConcreteCashAdvance", {model: banhji.invoiceForm}),
        //Form Heritage Walk
        invoiceHeritageWalk: new kendo.Layout("#invoiceHeritageWalk", {model: banhji.invoiceForm}),
        invoiceVATHeritageWalk: new kendo.Layout("#invoiceVATHeritageWalk", {model: banhji.invoiceForm}),
        depositHeritageWalk: new kendo.Layout("#depositHeritageWalk", {model: banhji.invoiceForm}),
        receiptHeritageWalk: new kendo.Layout("#receiptHeritageWalk", {model: banhji.invoiceForm}),
        normalInvoiceHeritageWalk: new kendo.Layout("#normalInvoiceHeritageWalk", {model: banhji.invoiceForm}),

        purchaseSampleService: new kendo.Layout("#purchaseSampleService", {model: banhji.invoiceForm}),
        invoiceTaxMekong: new kendo.Layout("#invoiceTaxMekong", {model: banhji.invoiceForm}),
        invoiceMsp: new kendo.Layout("#invoiceMsp", {model: banhji.invoiceForm}),
        invoicePcg: new kendo.Layout("#invoicePcg", {model: banhji.invoiceForm}),
        invoiceHDCom: new kendo.Layout("#invoiceHDCom", {model: banhji.invoiceHDCom}),
        //Form REACHS
        invoiceREACHS: new kendo.Layout("#invoiceREACHS", {model: banhji.invoiceForm}),
        invoiceVATREACHS: new kendo.Layout("#invoiceVATREACHS", {model: banhji.invoiceForm}),
        normalInvoiceREACHS: new kendo.Layout("#normalInvoiceREACHS", {model: banhji.invoiceForm}),
        //Form PCG
        invoicePCG: new kendo.Layout("#invoicePCG", {model: banhji.invoiceForm}),
        invoiceVATPCG: new kendo.Layout("#invoiceVATPCG", {model: banhji.invoiceForm}),
        normalInvoicePCG: new kendo.Layout("#normalInvoicePCG", {model: banhji.invoiceForm}),
        advanceVoucherPCG: new kendo.Layout("#advanceVoucherPCG", {model: banhji.invoiceForm}),
        //Form PCG Padee
        invoicePCGPADEE: new kendo.Layout("#invoicePCGPADEE", {model: banhji.invoiceForm}),
        //Caritas Company
        formCaritasExpense: new kendo.Layout("#formCaritasExpense", {model: banhji.invoiceForm}),
        formCaritasJournal: new kendo.Layout("#formCaritasJournal", {model: banhji.invoiceForm}),
        //Form KSLM
        normalInvoiceKSLM: new kendo.Layout("#normalInvoiceKSLM", {model: banhji.invoiceForm}),
        commercialInvoiceKSLM: new kendo.Layout("#commercialInvoiceKSLM", {model: banhji.invoiceForm}),
        vatInvoiceKSLM: new kendo.Layout("#vatInvoiceKSLM", {model: banhji.invoiceForm}),
        posInvoiceKSLM: new kendo.Layout("#posInvoiceKSLM", {model: banhji.invoiceForm}),
        posCashSaleKSLM: new kendo.Layout("#posCashSaleKSLM", {model: banhji.invoiceForm}),
        //Hurban Hub
        advanceVoucherHurbanHub: new kendo.Layout("#advanceVoucherHurbanHub", {model: banhji.invoiceForm}),
		statementDetail: new kendo.Layout("#statementDetail", {model: banhji.statementDetail}),
		saleSummaryByCustomer: new kendo.Layout("#saleSummaryByCustomer", {model: banhji.saleSummaryByCustomer}),
		saleDetailByCustomer: new kendo.Layout("#saleDetailByCustomer", {model: banhji.saleDetailByCustomer}),
		saleSummaryByProduct: new kendo.Layout("#saleSummaryByProduct", {model: banhji.saleSummaryByProduct}),
		saleDetailByProduct : new kendo.Layout("#saleDetailByProduct", {model: banhji.saleDetailByProduct}),
		saleSummaryByBrand: new kendo.Layout("#saleSummaryByBrand", {model: banhji.saleSummaryByBrand}),
		saleDetailByBrand : new kendo.Layout("#saleDetailByBrand", {model: banhji.saleDetailByBrand}),
		customerTransactionList: new kendo.Layout("#customerTransactionList", {model: banhji.customerTransactionList}),
		depositDetailByCustomer: new kendo.Layout("#depositDetailByCustomer", {model: banhji.depositDetailByCustomer}),
		cashSaleSummaryByCustomer: new kendo.Layout("#cashSaleSummaryByCustomer", {model: banhji.cashSaleSummaryByCustomer}),
		cashSaleDetailByCustomer: new kendo.Layout("#cashSaleDetailByCustomer", {model: banhji.cashSaleDetailByCustomer}),
		cashSaleSummaryByProduct: new kendo.Layout("#cashSaleSummaryByProduct", {model: banhji.cashSaleSummaryByProduct}),
		cashSaleDetailByProduct: new kendo.Layout("#cashSaleDetailByProduct", {model: banhji.cashSaleDetailByProduct}),
		saleSummaryByEmployee: new kendo.Layout("#saleSummaryByEmployee", {model: banhji.saleSummaryByEmployee}),
		saleDetailByEmployee: new kendo.Layout("#saleDetailByEmployee", {model: banhji.saleDetailByEmployee}),
		saleProductDetailByEmployee: new kendo.Layout("#saleProductDetailByEmployee", {model: banhji.saleProductDetailByEmployee}),
		customerBalanceSummary : new kendo.Layout("#customerBalanceSummary", {model: banhji.customerBalanceSummary}),
		customerBalanceDetail : new kendo.Layout("#customerBalanceDetail", {model: banhji.customerBalanceDetail}),
		receivableAgingSummary : new kendo.Layout("#receivableAgingSummary", {model: banhji.receivableAgingSummary}),
		receivableAgingDetail : new kendo.Layout("#receivableAgingDetail", {model: banhji.receivableAgingDetail}),
		collectInvoice : new kendo.Layout("#collectInvoice", {model: banhji.collectInvoice}),
		collectionReport : new kendo.Layout("#collectionReport", {model: banhji.collectionReport}),
		invoiceList : new kendo.Layout("#invoiceList", {model: banhji.invoiceList}),
		saleJobEngagement: new kendo.Layout("#saleJobEngagement", {model: banhji.saleJob}),
		saleOrderList: new kendo.Layout("#saleOrderList", {model: banhji.saleOrderList}),
		saleOrderDetailByProduct : new kendo.Layout("#saleOrderDetailByProduct", {model: banhji.saleOrderDetailByProduct}),
		customerList: new kendo.Layout("#customerList", {model: banhji.customerList}),
		draftTransaction: new kendo.Layout("#draftTransaction", {model: banhji.draftTransaction}),
		//Menu
		saleMenu: new kendo.View("#saleMenu", {model: langVM})
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

	/* Index Page */
	banhji.router.route('/', function(){
		var blank = new kendo.View('#blank-tmpl');
		var admin = JSON.parse(localStorage.getItem('userData/user')) != null ? JSON.parse(localStorage.getItem('userData/user')).role : 0;
        // if(admin != 1) {
        // 	window.location.replace("<?php echo base_url(); ?>admin");
        // } else {
        	banhji.view.layout.showIn('#content', banhji.view.index);
			banhji.view.layout.showIn('#menu', banhji.view.menu);
			$('#main-top-navigation').append('<li><a href="\#">Home</a></li>');
			$('#current-section').text("");
			$("#secondary-menu").html("");
			banhji.index.getLogo();
			banhji.index.pageLoad();
			banhji.pageLoaded["index"] = true;
        // }
	});
	banhji.router.route("/search_advanced", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			var vm = banhji.searchAdvanced;
			banhji.view.layout.showIn("#content", banhji.view.searchAdvanced);
			
			if(banhji.pageLoaded["search_advanced"]==undefined){
				banhji.pageLoaded["search_advanced"] = true;
			}

			vm.pageLoad();
		}
	});

	
	/*************************************************
	*   SALE ROUTER  						 		 *
	*************************************************/
	banhji.router.route("/sale_center", function(){
		// banhji.accessMod.query({
		// 	filter: {field: 'username', value: JSON.parse(localStorage.getItem('userData/user')).username}
		// }).then(function(e){
		// 	var allowed = false;
		// 	if(banhji.accessMod.data().length > 0) {
		// 		for(var i = 0; i < banhji.accessMod.data().length; i++) {
		// 			if("Sales" == banhji.accessMod.data()[i].name.toLowerCase()) {
		// 				allowed = true;
		// 				break;
		// 			}
		// 		}
		// 	} 
		// 	if(allowed) {
				banhji.view.layout.showIn("#content", banhji.view.saleCenter);
				banhji.view.layout.showIn('#menu', banhji.view.menu);
				//banhji.view.menu.showIn('#secondary-menu', banhji.view.saleMenu);

				var vm = banhji.saleCenter;
				if(banhji.pageLoaded["sale_center"]==undefined){
					banhji.pageLoaded["sale_center"] = true;
				}
				vm.pageLoad();
		// 	} else {
		// 		window.location.replace(baseUrl + "admin");
		// 	}
		// });
	});
	banhji.router.route("/customer(/:id)(/:is_pattern)", function(id,is_pattern){
		banhji.accessMod.query({
			filter: {field: 'username', value: JSON.parse(localStorage.getItem('userData/user')).username}
		}).then(function(e){
			var allowed = false;
			if(banhji.accessMod.data().length > 0) {
				for(var i = 0; i < banhji.accessMod.data().length; i++) {
					if("customer" == banhji.accessMod.data()[i].name.toLowerCase()) {
						allowed = true;
						break;
					}
				}
			} 
			if(allowed) {
				banhji.view.layout.showIn("#content", banhji.view.customer);
				kendo.fx($("#slide-form")).slideIn("down").play();

				var vm = banhji.customer;
				banhji.userManagement.addMultiTask("Customer","customer",vm);
				if(banhji.pageLoaded["customer"]==undefined){
					banhji.pageLoaded["customer"] = true;

			        var validator = $("#example").kendoValidator({
			        	rules: {
					        customRule1: function(input){
					          	if (input.is("[name=txtNumber]")) {	
						            return vm.get("notDuplicateNumber");
						        }
						        return true;
					        }
					    },
					    messages: {
					        customRule1: banhji.source.duplicateNumber
					    }
			        }).data("kendoValidator");

			        $("#saveNew").click(function(e){
						e.preventDefault();

						if(validator.validate()){
			            	vm.save();
				        }else{
				        	$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
				        }
					});

					$("#saveClose").click(function(e){
						e.preventDefault();

						if(validator.validate()){
							vm.set("saveClose", true);
			            	vm.save();
				        }else{
				        	$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
				        }
					});
				}

				vm.pageLoad(id, is_pattern);
			} else {
				window.location.replace(baseUrl + "admin");
			}
		});
	});
	banhji.router.route("/quote(/:id)", function(id){
		banhji.accessPage.query({
			filter:[
				{ field:"name", value:"quotation" },
				{ field:'username', operator:"where_related_user", value: JSON.parse(localStorage.getItem('userData/user')).username }
			]
		}).then(function(e){
			if(banhji.accessPage.data().length > 0) {

				banhji.view.layout.showIn("#content", banhji.view.quote);
				kendo.fx($("#slide-form")).slideIn("down").play();

				var vm = banhji.quote;
				banhji.userManagement.addMultiTask("Quotation","quote",vm);

				if(banhji.pageLoaded["quote"]==undefined){
					banhji.pageLoaded["quote"] = true;

					vm.lineDS.bind("change", vm.lineDSChanges);

					var validator = $("#example").kendoValidator({
			        	rules: {
					        customRule1: function(input) {
					          	if (input.is("[name=txtRecurringName]") && vm.recurring_validate) {
					          		vm.set("recurring_validate", false);
					            	return $.trim(input.val()) !== "";
					          	}
					          	return true;
					        },
					        customRule2: function(input){
					          	if (input.is("[name=txtNumber]")) {	
						            return vm.get("notDuplicateNumber");
						        }
						        return true;
					        }
					    },
					    messages: {
					        customRule1: banhji.source.requiredMessage,
					        customRule2: banhji.source.duplicateNumber
					    }
			        }).data("kendoValidator");

			        $("#saveDraft1").click(function(e){
						e.preventDefault();

						if(validator.validate() && vm.validating()){
							vm.set("saveDraft", true);
			            	vm.save();
				        }else{
				        	$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
				        }
					});
			        
			        $("#saveNew").click(function(e){
						e.preventDefault();

						if(validator.validate() && vm.validating()){
			            	vm.save();
				        }else{
				        	$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
				        }
					});

					$("#saveClose").click(function(e){
						e.preventDefault();

						if(validator.validate() && vm.validating()){
							vm.set("saveClose", true);
			            	vm.save();
				        }else{
				        	$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
				        }
					});

					$("#savePrint").click(function(e){
						e.preventDefault();
						
						if(validator.validate() && vm.validating()){
							vm.set("savePrint", true);
			            	vm.save();
				        }else{
				        	$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
				        }
					});

					$("#saveRecurring").click(function(e){
						e.preventDefault();

						vm.set("recurring_validate", true);

						if(validator.validate() && vm.validating()){
							vm.set("saveRecurring", true);			            	
			            	vm.save();
				        }else{
				        	$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
				        }
					});
				}

				vm.pageLoad(id);

			} else {
				window.location.replace(baseUrl + "admin");
			}
		});
	});
	banhji.router.route("/sale_order(/:id)", function(id){
		banhji.accessPage.query({
			filter:[
				{ field:"name", value:"sale_order" },
				{ field:'username', operator:"where_related_user", value: JSON.parse(localStorage.getItem('userData/user')).username }
			]
		}).then(function(e){
			if(banhji.accessPage.data().length > 0) {
				banhji.view.layout.showIn("#content", banhji.view.saleOrder);
				kendo.fx($("#slide-form")).slideIn("down").play();

				var vm = banhji.saleOrder;
				banhji.userManagement.addMultiTask("Sale Order","sale_order",vm);

				if(banhji.pageLoaded["sale_order"]==undefined){
					banhji.pageLoaded["sale_order"] = true;

					vm.lineDS.bind("change", vm.lineDSChanges);

					var validator = $("#example").kendoValidator({
			        	rules: {
					        customRule1: function(input) {
					          	if (input.is("[name=txtRecurringName]") && vm.recurring_validate) {
					          		vm.set("recurring_validate", false);
					            	return $.trim(input.val()) !== "";
					          	}
					          	return true;
					        },
					        customRule2: function(input){
					          	if (input.is("[name=txtNumber]")) {	
						            return vm.get("notDuplicateNumber");
						        }
						        return true;
					        }
					    },
					    messages: {
					        customRule1: banhji.source.requiredMessage,
					        customRule2: banhji.source.duplicateNumber
					    }
			        }).data("kendoValidator");

			        $("#saveDraft1").click(function(e){
						e.preventDefault();

						if(validator.validate() && vm.validating()){
							vm.set("saveDraft", true);
			            	vm.save();
				        }else{
				        	$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
				        }
					});

			        $("#saveNew").click(function(e){
						e.preventDefault();

						if(validator.validate() && vm.validating()){
			            	vm.save();
				        }else{
				        	$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
				        }
					});

					$("#saveClose").click(function(e){
						e.preventDefault();

						if(validator.validate() && vm.validating()){
							vm.set("saveClose", true);
			            	vm.save();
				        }else{
				        	$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
				        }
					});

					$("#savePrint").click(function(e){
						e.preventDefault();
						
						if(validator.validate() && vm.validating()){
							vm.set("savePrint", true);
			            	vm.save();
				        }else{
				        	$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
				        }
					});

					$("#saveRecurring").click(function(e){
						e.preventDefault();

						vm.set("recurring_validate", true);

						if(validator.validate() && vm.validating()){
			            	vm.set("saveRecurring", true);
			            	vm.save();
				        }else{
				        	$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
				        }
					});
				}

				vm.pageLoad(id);
			} else {
				window.location.replace(baseUrl + "admin");
			}
		});
	});
	banhji.router.route("/customer_deposit(/:id)", function(id){
		banhji.accessPage.query({
			filter:[
				{ field:"name", value:"deposit" },
				{ field:'username', operator:"where_related_user", value: JSON.parse(localStorage.getItem('userData/user')).username }
			]
		}).then(function(e){
			if(banhji.accessPage.data().length > 0) {
				banhji.view.layout.showIn("#content", banhji.view.customerDeposit);
				kendo.fx($("#slide-form")).slideIn("down").play();

				var vm = banhji.customerDeposit;
				banhji.userManagement.addMultiTask("Customer Deposit","customer_deposit",vm);

				if(banhji.pageLoaded["customer_deposit"]==undefined){
					banhji.pageLoaded["customer_deposit"] = true;

			        var validator = $("#example").kendoValidator({
			        	rules: {
					        customRule1: function(input) {
					          	if (input.is("[name=txtRecurringName]") && vm.recurring_validate) {
					          		vm.set("recurring_validate", false);
					            	return $.trim(input.val()) !== "";
					          	}
					          	return true;
					        },
					        customRule2: function(input){
					          	if (input.is("[name=txtNumber]")) {	
						            return vm.get("notDuplicateNumber");
						        }
						        return true;
					        }
					    },
					    messages: {
					        customRule1: banhji.source.requiredMessage,
					        customRule2: banhji.source.duplicateNumber
					    }
			        }).data("kendoValidator");

			        $("#saveNew").click(function(e){
						e.preventDefault();

						if(validator.validate() && vm.validating()){
			            	vm.save();
				        }else{
				        	$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
				        }
					});

					$("#saveClose").click(function(e){
						e.preventDefault();

						if(validator.validate() && vm.validating()){
							vm.set("saveClose", true);
			            	vm.save();
				        }else{
				        	$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
				        }
					});

					$("#savePrint").click(function(e){
						e.preventDefault();
						
						if(validator.validate() && vm.validating()){
							vm.set("savePrint", true);
			            	vm.save();
				        }else{
				        	$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
				        }
					});

					$("#saveRecurring").click(function(e){
						e.preventDefault();

						vm.set("recurring_validate", true);

						if(validator.validate() && vm.validating()){
			            	vm.set("saveRecurring", true);
			            	vm.save();
				        }else{
				        	$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
				        }
					});
				}

				vm.pageLoad(id);
			} else {
					window.location.replace(baseUrl + "admin");
			}
		});
	});
	banhji.router.route("/cash_sale(/:id)", function(id){
		banhji.accessPage.query({
			filter:[
				{ field:"name", value:"cash_sale" },
				{ field:'username', operator:"where_related_user", value: JSON.parse(localStorage.getItem('userData/user')).username }
			]
		}).then(function(e){
			if(banhji.accessPage.data().length > 0) {
				banhji.view.layout.showIn("#content", banhji.view.cashSale);
				kendo.fx($("#slide-form")).slideIn("down").play();

				var vm = banhji.cashSale;
				banhji.userManagement.addMultiTask("Cash Sale","cash_sale",vm);

				if(banhji.pageLoaded["cash_sale"]==undefined){
					banhji.pageLoaded["cash_sale"] = true;

					vm.lineDS.bind("change", vm.lineDSChanges);

					var validator = $("#example").kendoValidator({
			        	rules: {
					        customRule1: function(input) {
					          	if (input.is("[name=txtRecurringName]") && vm.recurring_validate) {
					          		vm.set("recurring_validate", false);
					            	return $.trim(input.val()) !== "";
					          	}
					          	return true;
					        },
					        customRule2: function(input){
					          	if (input.is("[name=txtNumber]")) {	
						            return vm.get("notDuplicateNumber");
						        }
						        return true;
					        }
					    },
					    messages: {
					        customRule1: banhji.source.requiredMessage,
					        customRule2: banhji.source.duplicateNumber
					    }
			        }).data("kendoValidator");

			        $("#saveDraft1").click(function(e){
						e.preventDefault();

						if(validator.validate() && vm.validating()){
							vm.set("saveDraft", true);
			            	vm.save();
				        }else{
				        	$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
				        }
					});

			        $("#saveNew").click(function(e){
						e.preventDefault();

						if(validator.validate() && vm.validating()){
			            	vm.save();
				        }else{
				        	$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
				        }
					});

					$("#saveClose").click(function(e){
						e.preventDefault();

						if(validator.validate() && vm.validating()){
							vm.set("saveClose", true);
			            	vm.save();
				        }else{
				        	$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
				        }
					});

					$("#savePrint").click(function(e){
						e.preventDefault();
						
						if(validator.validate() && vm.validating()){
							vm.set("savePrint", true);
			            	vm.save();
				        }else{
				        	$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
				        }
					});

					$("#saveRecurring").click(function(e){
						e.preventDefault();

						vm.set("recurring_validate", true);

						if(validator.validate() && vm.validating()){
			            	vm.set("saveRecurring", true);
			            	vm.save();
				        }else{
				        	$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
				        }
					});
				}

				vm.pageLoad(id);
			} else {
				window.location.replace(baseUrl + "admin");
			}
		});
	});
	banhji.router.route("/commercial_cash_sale(/:id)", function(id){
        // banhji.accessMod.query({
        //  filter: {field: 'username', value: JSON.parse(localStorage.getItem('userData/user')).username}
        // }).then(function(e){
        //  var allowed = false;
        //  if(banhji.accessMod.data().length > 0) {
        //      for(var i = 0; i < banhji.accessMod.data().length; i++) {
        //          if("customer" == banhji.accessMod.data()[i].name.toLowerCase()) {
        //              allowed = true;
        //              break;
        //          }
        //      }
        //  }
        //  if(allowed) {
                banhji.view.layout.showIn("#content", banhji.view.cashSale);
                kendo.fx($("#slide-form")).slideIn("down").play();

                var vm = banhji.cashSale;
                banhji.userManagement.addMultiTask("Cash Sale","cash_sale",vm);

                if(banhji.pageLoaded["cash_sale"]==undefined){
                    banhji.pageLoaded["cash_sale"] = true;

                    vm.lineDS.bind("change", vm.lineDSChanges);

                    var validator = $("#example").kendoValidator({
                        rules: {
                            customRule1: function(input) {
                                if (input.is("[name=txtRecurringName]") && vm.recurring_validate) {
                                    vm.set("recurring_validate", false);
                                    return $.trim(input.val()) !== "";
                                }
                                return true;
                            },
                            customRule2: function(input){
                                if (input.is("[name=txtNumber]")) {
                                    return vm.get("notDuplicateNumber");
                                }
                                return true;
                            }
                        },
                        messages: {
                            customRule1: banhji.source.requiredMessage,
                            customRule2: banhji.source.duplicateNumber
                        }
                    }).data("kendoValidator");

                    $("#saveDraft1").click(function(e){
                        e.preventDefault();

                        if(validator.validate() && vm.validating()){
                            vm.set("saveDraft", true);
                            vm.save();
                        }else{
                            $("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
                        }
                    });

                    $("#saveNew").click(function(e){
                        e.preventDefault();

                        if(validator.validate() && vm.validating()){
                            vm.save();
                        }else{
                            $("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
                        }
                    });

                    $("#saveClose").click(function(e){
                        e.preventDefault();

                        if(validator.validate() && vm.validating()){
                            vm.set("saveClose", true);
                            vm.save();
                        }else{
                            $("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
                        }
                    });

                    $("#savePrint").click(function(e){
                        e.preventDefault();

                        if(validator.validate() && vm.validating()){
                            vm.set("savePrint", true);
                            vm.save();
                        }else{
                            $("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
                        }
                    });

                    $("#saveRecurring").click(function(e){
                        e.preventDefault();

                        vm.set("recurring_validate", true);

                        if(validator.validate() && vm.validating()){
                            vm.set("saveRecurring", true);
                            vm.save();
                        }else{
                            $("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
                        }
                    });
                }

                vm.pageLoad(id);

        //  } else {
        //      window.location.replace(baseUrl + "admin");
        //  }
        // });
    });
    banhji.router.route("/vat_cash_sale(/:id)", function(id){
        // banhji.accessMod.query({
        //  filter: {field: 'username', value: JSON.parse(localStorage.getItem('userData/user')).username}
        // }).then(function(e){
        //  var allowed = false;
        //  if(banhji.accessMod.data().length > 0) {
        //      for(var i = 0; i < banhji.accessMod.data().length; i++) {
        //          if("customer" == banhji.accessMod.data()[i].name.toLowerCase()) {
        //              allowed = true;
        //              break;
        //          }
        //      }
        //  }
        //  if(allowed) {
                banhji.view.layout.showIn("#content", banhji.view.cashSale);
                kendo.fx($("#slide-form")).slideIn("down").play();

                var vm = banhji.cashSale;
                banhji.userManagement.addMultiTask("Cash Sale","cash_sale",vm);

                if(banhji.pageLoaded["cash_sale"]==undefined){
                    banhji.pageLoaded["cash_sale"] = true;

                    vm.lineDS.bind("change", vm.lineDSChanges);

                    var validator = $("#example").kendoValidator({
                        rules: {
                            customRule1: function(input) {
                                if (input.is("[name=txtRecurringName]") && vm.recurring_validate) {
                                    vm.set("recurring_validate", false);
                                    return $.trim(input.val()) !== "";
                                }
                                return true;
                            },
                            customRule2: function(input){
                                if (input.is("[name=txtNumber]")) {
                                    return vm.get("notDuplicateNumber");
                                }
                                return true;
                            }
                        },
                        messages: {
                            customRule1: banhji.source.requiredMessage,
                            customRule2: banhji.source.duplicateNumber
                        }
                    }).data("kendoValidator");

                    $("#saveDraft1").click(function(e){
                        e.preventDefault();

                        if(validator.validate() && vm.validating()){
                            vm.set("saveDraft", true);
                            vm.save();
                        }else{
                            $("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
                        }
                    });

                    $("#saveNew").click(function(e){
                        e.preventDefault();

                        if(validator.validate() && vm.validating()){
                            vm.save();
                        }else{
                            $("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
                        }
                    });

                    $("#saveClose").click(function(e){
                        e.preventDefault();

                        if(validator.validate() && vm.validating()){
                            vm.set("saveClose", true);
                            vm.save();
                        }else{
                            $("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
                        }
                    });

                    $("#savePrint").click(function(e){
                        e.preventDefault();

                        if(validator.validate() && vm.validating()){
                            vm.set("savePrint", true);
                            vm.save();
                        }else{
                            $("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
                        }
                    });

                    $("#saveRecurring").click(function(e){
                        e.preventDefault();

                        vm.set("recurring_validate", true);

                        if(validator.validate() && vm.validating()){
                            vm.set("saveRecurring", true);
                            vm.save();
                        }else{
                            $("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
                        }
                    });
                }

                vm.pageLoad(id);

        //  } else {
        //      window.location.replace(baseUrl + "admin");
        //  }
        // });
    });
	banhji.router.route("/sale", function(){
		banhji.view.layout.showIn("#content", banhji.view.sale);
		banhji.view.layout.showIn('#menu', banhji.view.menu);
		banhji.view.menu.showIn('#secondary-menu', banhji.view.saleMenu);
		
		var vm = banhji.sale;
		banhji.userManagement.addMultiTask("Sale","sale",null);
		if(banhji.pageLoaded["sale"]==undefined){
			banhji.pageLoaded["sale"] = true;
		}
		vm.pageLoad();
	});
	banhji.router.route("/sale_recurring", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			banhji.view.layout.showIn("#content", banhji.view.saleRecurring);
			banhji.view.layout.showIn('#menu', banhji.view.menu);
			banhji.view.menu.showIn('#secondary-menu', banhji.view.saleMenu);

			var vm = banhji.saleRecurring;
			banhji.userManagement.addMultiTask("Sale Recurring","sale_recurring",null);
			if(banhji.pageLoaded["sale_recurring"]==undefined){
				banhji.pageLoaded["sale_recurring"] = true;

			}

			vm.pageLoad();
		}
	});
	banhji.router.route("/internal_usage(/:id)", function(id){
		banhji.accessMod.query({
			filter: {field: 'username', value: JSON.parse(localStorage.getItem('userData/user')).username}
		}).then(function(e){
			var allowed = false;
			if(banhji.accessMod.data().length > 0) {
				for(var i = 0; i < banhji.accessMod.data().length; i++) {
					if("products/services" == banhji.accessMod.data()[i].name.toLowerCase()) {
						allowed = true;
						break;
					}
				}
			}
			if(allowed) {
				banhji.view.layout.showIn("#content", banhji.view.internalUsage);
				// banhji.view.layout.showIn('#menu', banhji.view.menu);
				// banhji.view.menu.showIn('#secondary-menu', banhji.view.inventoryMenu);

				var vm = banhji.internalUsage;

				banhji.userManagement.addMultiTask("Internal Usage","internal_usage",null);

				if(banhji.pageLoaded["internal_usage"]==undefined){
					banhji.pageLoaded["internal_usage"] = true;

					vm.lineDS.bind("change", vm.itemLineDSChanges);
					vm.accountLineDS.bind("change", vm.accountLineDSChanges);
					vm.toItemLineDS.bind("change", vm.toItemLineDSChanges);
					vm.toAccountLineDS.bind("change", vm.toAccountLineDSChanges);

					var validator = $("#example").kendoValidator({
						rules: {
							customRule1: function(input){
								if (input.is("[name=txtNumber]")) {
									return vm.get("notDuplicateNumber");
								}
								return true;
							}
						},
						messages: {
							customRule1: banhji.source.duplicateNumber
						}
					}).data("kendoValidator");

					$("#saveDraft1").click(function(e){
						e.preventDefault();

						if(validator.validate() && vm.validating()){
							vm.set("saveDraft", true);
							vm.save();
						}else{
							$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
						}
					});

					$("#saveNew").click(function(e){
						e.preventDefault();

						if(validator.validate() && vm.validating()){
							vm.save();
						}else{
							$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
						}
					});

					$("#saveClose").click(function(e){
						e.preventDefault();

						if(validator.validate() && vm.validating()){
							vm.set("saveClose", true);
							vm.save();
						}else{
							$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
						}
					});

					$("#savePrint").click(function(e){
						e.preventDefault();

						if(validator.validate() && vm.validating()){
							vm.set("savePrint", true);
							vm.save();
						}else{
							$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
						}
					});

					$("#saveRecurring").click(function(e){
						e.preventDefault();

						vm.set("recurring_validate", true);

						if(validator.validate() && vm.validating()){
							vm.set("saveRecurring", true);
							vm.save();
						}else{
							$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
						}
					});
				}

				vm.pageLoad(id);
			} else {
				window.location.replace(baseUrl + "admin");
			}
		});
	});
	// SALE REPORTS
	banhji.router.route("/sale_report_center", function(){
		banhji.accessMod.query({
			filter: {field: 'username', value: JSON.parse(localStorage.getItem('userData/user')).username}
		}).then(function(e){
			var allowed = false;
			if(banhji.accessMod.data().length > 0) {
				for(var i = 0; i < banhji.accessMod.data().length; i++) {
					if("customer" == banhji.accessMod.data()[i].name.toLowerCase()) {
						allowed = true;
						break;
					}
				}
			} 
			if(allowed) {
				banhji.view.layout.showIn("#content", banhji.view.saleReportCenter);
				banhji.view.layout.showIn('#menu', banhji.view.menu);
				banhji.view.menu.showIn('#secondary-menu', banhji.view.saleMenu);
				
				var vm = banhji.saleReportCenter;
				banhji.userManagement.addMultiTask("Sale Report Center","sale_report_center",null);
				if(banhji.pageLoaded["sale_report_center"]==undefined){
					banhji.pageLoaded["sale_report_center"] = true;
				}
			} else {
				window.location.replace(baseUrl + "admin");
			}
		});
	});
	banhji.router.route("/quotation_list", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			banhji.view.layout.showIn("#content", banhji.view.quotationList);

			var vm = banhji.quotationList;
			banhji.userManagement.addMultiTask("List of Quotation","quotation_list",null);
			
			if(banhji.pageLoaded["quotation_list"]==undefined){
				banhji.pageLoaded["quotation_list"] = true;
				vm.sorterChanges();
			}
			vm.pageLoad();
		}
	});
	banhji.router.route("/sale_order_list", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			banhji.view.layout.showIn("#content", banhji.view.saleOrderList);

			var vm = banhji.saleOrderList;
			banhji.userManagement.addMultiTask("List of Sale Order","sale_order_list",null);
			
			if(banhji.pageLoaded["sale_order_list"]==undefined){
				banhji.pageLoaded["sale_order_list"] = true;
				vm.sorterChanges();
			}
			vm.pageLoad();
		}
	});
	banhji.router.route("/sale_order_by_job_engagement", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			banhji.view.layout.showIn("#content", banhji.view.saleOrderByJobEngagment);

			var vm = banhji.saleOrderByJobEngagment;
			banhji.userManagement.addMultiTask("Sale Order By Job Engagement","sale_order_by_job_engagement",null);

			if(banhji.pageLoaded["sale_order_by_job_engagement"]==undefined){
				banhji.pageLoaded["sale_order_by_job_engagement"] = true;
				vm.sorterChanges();
			}
			vm.pageLoad();			
		}
	});
	// CUSTOMER REPORTS
	banhji.router.route("/customer_report_center", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			banhji.view.layout.showIn("#content", banhji.view.customerReportCenter);
			banhji.view.layout.showIn('#menu', banhji.view.menu);
			banhji.view.menu.showIn('#secondary-menu', banhji.view.customerMenu);

			var vm = banhji.customerReportCenter;
			banhji.userManagement.addMultiTask("Customer Reports Center","customer_report_center",null);
			if(banhji.pageLoaded["customer_report_center"]==undefined){
				banhji.pageLoaded["customer_report_center"] = true;

				vm.setObj();
			}

			vm.pageLoad();
		}
	});
	banhji.router.route("/statement(/:id)", function(){
		// banhji.accessMod.query({
		// 	filter: {field: 'username', value: JSON.parse(localStorage.getItem('userData/user')).username}
		// }).then(function(e){
		// 	var allowed = false;
		// 	if(banhji.accessMod.data().length > 0) {
		// 		for(var i = 0; i < banhji.accessMod.data().length; i++) {
		// 			if("customer" == banhji.accessMod.data()[i].name.toLowerCase()) {
		// 				allowed = true;
		// 				break;
		// 			}
		// 		}
		// 	}
		// 	if(allowed) {
				banhji.view.layout.showIn("#content", banhji.view.statement);

				var vm = banhji.statement;
				banhji.userManagement.addMultiTask("Statement","statement",null);

				if(banhji.pageLoaded["statement"]==undefined){
					banhji.pageLoaded["statement"] = true;

					vm.sorterChanges();
				}
				banhji.statement.getLogo();
				vm.pageLoad();
		// 	} else {
		// 		window.location.replace(baseUrl + "admin");
		// 	}
		// });
	});
	banhji.router.route("/statement_detail", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			banhji.view.layout.showIn("#content", banhji.view.statementDetail);

			var vm = banhji.statementDetail;
			banhji.userManagement.addMultiTask("Sale Detail By Customer","statement_detail",null);

			if(banhji.pageLoaded["statement_detail"]==undefined){
				banhji.pageLoaded["statement_detail"] = true;

				vm.sorterChanges();
			}
			vm.pageLoad();
			banhji.statementDetail.dataSource.bind('requestEnd', function(e){
				if(e.response) {
					banhji.statementDetail.set('totalAmount', kendo.toString(e.response.totalAmount, 'c2'));
				}
			});
		}
	});
	banhji.router.route("/customer_balance", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			banhji.view.layout.showIn("#content", banhji.view.customerBalance);
			banhji.view.layout.showIn('#menu', banhji.view.menu);
			banhji.view.menu.showIn('#secondary-menu', banhji.view.customerMenu);

			var vm = banhji.customerBalance;
			banhji.userManagement.addMultiTask("Customer Balance","customer_balance",null);
			if(banhji.pageLoaded["customer_balance"]==undefined){
				banhji.pageLoaded["customer_balance"] = true;

				vm.search();
			}
		}
	});
	banhji.router.route("/invoice_custom(/:id)", function(id){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			banhji.view.layout.showIn("#content", banhji.view.invoiceCustom);
			kendo.fx($("#slide-form")).slideIn("down").play();

			var vm = banhji.invoiceCustom;

			if(banhji.pageLoaded["invoice_custom"]==undefined){
				banhji.pageLoaded["invoice_custom"] = true;

				//Function write css to header
				function loadStyle(href){
				    // avoid duplicates
				    for(var i = 0; i < document.styleSheets.length; i++){
				        if(document.styleSheets[i].href == href){
				            return;
				        }
				    }
				    var head  = document.getElementsByTagName('head')[0];
				    var link  = document.createElement('link');
				    link.rel  = 'stylesheet';
				    link.type = 'text/css';
				    link.href = href;
				    head.appendChild(link);
				}
				var Href1 = '<?php echo base_url(); ?>assets/invoice/invoice.css';
				loadStyle(Href1);
				setTimeout(function(){
					var validator = $("#example").kendoValidator().data("kendoValidator");
					var notification = $("#notification").kendoNotification({
					    autoHideAfter: 5000,
					    width: 300,
					    height: 50
					}).data('kendoNotification');
					// $("#saveNew").click(function(e){
					// 	e.preventDefault();
					// 	if(validator.validate()){
			  //           	vm.save();

			  //           	notification.success("Save Successful");
				 //        }else{
				 //        	notification.error("Warning, please review it again!");
				 //        }
					// });
					// $("#saveClose").click(function(e){
					// 	e.preventDefault();

					// 	if(validator.validate()){
			  //           	vm.save();
			  //           	window.history.back();

			  //           	notification.success("Save Successful");
				 //        }else{
				 //        	notification.error("Warning, please review it again!");
				 //        }
					// });
				},2000);
			};

			vm.pageLoad(id);
		};
	});
	banhji.router.route("/invoice_form(/:id)", function(id){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			banhji.view.layout.showIn("#content", banhji.view.invoiceForm);
			kendo.fx($("#slide-form")).slideIn("down").play();

			var vm = banhji.invoiceForm;
			banhji.userManagement.addMultiTask("Customer Form","invoice_form",null);
			if(banhji.pageLoaded["invoice_form"]==undefined){
				banhji.pageLoaded["invoice_form"] = true;

				//Function write css to header
				function loadStyle(href){
				    // avoid duplicates
				    for(var i = 0; i < document.styleSheets.length; i++){
				        if(document.styleSheets[i].href == href){
				            return;
				        }
				    }
				    var head  = document.getElementsByTagName('head')[0];
				    var link  = document.createElement('link');
				    link.rel  = 'stylesheet';
				    link.type = 'text/css';
				    link.href = href;
				    head.appendChild(link);
				}
				var Href1 = '<?php echo base_url(); ?>assets/invoice/invoice.css';
				loadStyle(Href1);
			};

			vm.pageLoad(id);
		};
	});
	banhji.router.route("/batch_invoice_preview", function(id){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			banhji.view.layout.showIn("#content", banhji.view.batchInvoicePreview);
			kendo.fx($("#slide-form")).slideIn("down").play();
			banhji.batchInvoicePreview.pageLoad();
			//Function write css to header
			function loadStyle(href){
			    // avoid duplicates
			    for(var i = 0; i < document.styleSheets.length; i++){
			        if(document.styleSheets[i].href == href){
			            return;
			        }
			    }
			    var head  = document.getElementsByTagName('head')[0];
			    var link  = document.createElement('link');
			    link.rel  = 'stylesheet';
			    link.type = 'text/css';
			    link.href = href;
			    head.appendChild(link);
			}
			var Href1 = '<?php echo base_url(); ?>assets/invoice/invoice.css';
			loadStyle(Href1);
		};
	});
	banhji.router.route("/sale_summary_by_customer", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			banhji.view.layout.showIn("#content", banhji.view.saleSummaryByCustomer);

			var vm = banhji.saleSummaryByCustomer;
			banhji.userManagement.addMultiTask("Sale Summary By Customer","sale_summary_by_customer",null);

			if(banhji.pageLoaded["sale_summary_by_customer"]==undefined){
				banhji.pageLoaded["sale_summary_by_customer"] = true;

				vm.sorterChanges();
			}
			vm.pageLoad();
		}
	});
	banhji.router.route("/sale_detail_by_customer", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			banhji.view.layout.showIn("#content", banhji.view.saleDetailByCustomer);

			var vm = banhji.saleDetailByCustomer;
			banhji.userManagement.addMultiTask("Sale Detail By Customer","sale_detail_by_customer",null);

			if(banhji.pageLoaded["sale_detail_by_customer"]==undefined){
				banhji.pageLoaded["sale_detail_by_customer"] = true;

				vm.sorterChanges();
			}
			vm.pageLoad();
		}
	});
	banhji.router.route("/customer_transaction_list", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			banhji.view.layout.showIn("#content", banhji.view.customerTransactionList);

			var vm = banhji.customerTransactionList;
			banhji.userManagement.addMultiTask("Customer Transaction List","customer_transaction_list",null);

			if(banhji.pageLoaded["customer_transaction_list"]==undefined){
				banhji.pageLoaded["customer_transaction_list"] = true;

				vm.sorterChanges();
			}
			vm.pageLoad();
		}
	});
	banhji.router.route("/deposit_detail_by_customer", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			banhji.view.layout.showIn("#content", banhji.view.depositDetailByCustomer);

			var vm = banhji.depositDetailByCustomer;
			banhji.userManagement.addMultiTask("Deposit Detail By Customer","deposit_detail_by_customer",null);

			if(banhji.pageLoaded["deposit_detail_by_customer"]==undefined){
				banhji.pageLoaded["deposit_detail_by_customer"] = true;

				vm.sorterChanges();
			}
			vm.pageLoad();
		}
	});
	banhji.router.route("/cashSale_summary_by_customer", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			banhji.view.layout.showIn("#content", banhji.view.cashSaleSummaryByCustomer);

			var vm = banhji.cashSaleSummaryByCustomer;
			banhji.userManagement.addMultiTask("Cash Sale Summary By Customer","cashSale_summary_by_customer",null);

			if(banhji.pageLoaded["cashSale_summary_by_customer"]==undefined){
				banhji.pageLoaded["cashSale_summary_by_customer"] = true;

				vm.sorterChanges();
			}
			vm.pageLoad();
		}
	});
	banhji.router.route("/cashSale_detail_by_customer", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			banhji.view.layout.showIn("#content", banhji.view.cashSaleDetailByCustomer);

			var vm = banhji.cashSaleDetailByCustomer;
			banhji.userManagement.addMultiTask("Cash Sale Summary By Customer","cashSale_detail_by_customer",null);

			if(banhji.pageLoaded["cashSale_detail_by_customer"]==undefined){
				banhji.pageLoaded["cashSale_detail_by_customer"] = true;

				vm.sorterChanges();
			}
			vm.pageLoad();
		}
	});
	banhji.router.route("/cashSale_summary_by_product", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			banhji.view.layout.showIn("#content", banhji.view.cashSaleSummaryByProduct);

			var vm = banhji.cashSaleSummaryByProduct;
			banhji.userManagement.addMultiTask("Cash Sale Summary By Product","cashSale_summary_by_product",null);

			if(banhji.pageLoaded["cashSale_summary_by_product"]==undefined){
				banhji.pageLoaded["cashSale_summary_by_product"] = true;

				vm.sorterChanges();
			}
			vm.pageLoad();
		}
	});
	banhji.router.route("/cashSale_detail_by_product", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			banhji.view.layout.showIn("#content", banhji.view.cashSaleDetailByProduct);

			var vm = banhji.cashSaleDetailByProduct;
			banhji.userManagement.addMultiTask("Cash Sale Summary By Product","cashSale_detail_by_product",null);

			if(banhji.pageLoaded["cashSale_detail_by_product"]==undefined){
				banhji.pageLoaded["cashSale_detail_by_product"] = true;

				vm.sorterChanges();
			}
			vm.pageLoad();
		}
	});
	banhji.router.route("/sale_summary_by_product", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			banhji.view.layout.showIn("#content", banhji.view.saleSummaryByProduct);

			var vm = banhji.saleSummaryByProduct;
			banhji.userManagement.addMultiTask("Sale Summary By Product","sale_summary_by_product",null);

			if(banhji.pageLoaded["sale_summary_by_product"]==undefined){
				banhji.pageLoaded["sale_summary_by_product"] = true;

				vm.sorterChanges();
			}
			vm.pageLoad();
		}
	});
	banhji.router.route("/sale_detail_by_product", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			banhji.view.layout.showIn("#content", banhji.view.saleDetailByProduct);

			var vm = banhji.saleDetailByProduct;
			banhji.userManagement.addMultiTask("Sale Detail By Product","sale_detail_by_product",null);

			if(banhji.pageLoaded["sale_detail_by_product"]==undefined){
				banhji.pageLoaded["sale_detail_by_product"] = true;

				vm.sorterChanges();
			}
			vm.pageLoad();
		}
	});
	banhji.router.route("/sale_summary_by_brand", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			banhji.view.layout.showIn("#content", banhji.view.saleSummaryByBrand);

			var vm = banhji.saleSummaryByBrand;
			banhji.userManagement.addMultiTask("Sale Summary By Product","sale_summary_by_brand",null);

			if(banhji.pageLoaded["sale_summary_by_brand"]==undefined){
				banhji.pageLoaded["sale_summary_by_brand"] = true;

				vm.sorterChanges();
			}
			vm.pageLoad();
		}
	});
	banhji.router.route("/sale_detail_by_brand", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			banhji.view.layout.showIn("#content", banhji.view.saleDetailByBrand);

			var vm = banhji.saleDetailByBrand;
			banhji.userManagement.addMultiTask("Sale Detail By Product","sale_detail_by_brand",null);

			if(banhji.pageLoaded["sale_detail_by_brand"]==undefined){
				banhji.pageLoaded["sale_detail_by_brand"] = true;

				vm.sorterChanges();
			}
			vm.pageLoad();
		}
	});
	banhji.router.route("/sale_summary_by_employee", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			banhji.view.layout.showIn("#content", banhji.view.saleSummaryByEmployee);

			var vm = banhji.saleSummaryByEmployee;
			banhji.userManagement.addMultiTask("Sale Summary By Employee","sale_summary_by_employee",null);

			if(banhji.pageLoaded["sale_summary_by_employee"]==undefined){
				banhji.pageLoaded["sale_summary_by_employee"] = true;

				vm.sorterChanges();
			}
			vm.pageLoad();
		}
	});
	banhji.router.route("/sale_detail_by_employee", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			banhji.view.layout.showIn("#content", banhji.view.saleDetailByEmployee);

			var vm = banhji.saleDetailByEmployee;
			banhji.userManagement.addMultiTask("Sale Detail By Employee","sale_detail_by_employee",null);

			if(banhji.pageLoaded["sale_detail_by_employee"]==undefined){
				banhji.pageLoaded["sale_detail_by_employee"] = true;

				vm.sorterChanges();
			}
			vm.pageLoad();
		}
	});
	banhji.router.route("/saleProduct_detail_by_employee", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			banhji.view.layout.showIn("#content", banhji.view.saleProductDetailByEmployee);

			var vm = banhji.saleProductDetailByEmployee;
			banhji.userManagement.addMultiTask("Sale Product Detail By Employee","saleProduct_detail_by_employee",null);

			if(banhji.pageLoaded["saleProduct_detail_by_employee"]==undefined){
				banhji.pageLoaded["saleProduct_detail_by_employee"] = true;

				vm.sorterChanges();
			}
			banhji.saleProductDetailByEmployee.dataSource.bind('requestEnd', function(e){
				if(e.response) {
					banhji.saleProductDetailByEmployee.set('total', kendo.toString(e.response.total, 'c2'));
				}
			});
			vm.pageLoad();
		}
	});
	banhji.router.route("/customer_balance_summary", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			banhji.view.layout.showIn("#content", banhji.view.customerBalanceSummary);

			var vm = banhji.customerBalanceSummary;
			banhji.userManagement.addMultiTask("Customer Balance Summary","customer_balance_summary",null);

			if(banhji.pageLoaded["customer_balance_summary"]==undefined){
				banhji.pageLoaded["customer_balance_summary"] = true;
			}
			vm.pageLoad();
		}
	});
	banhji.router.route("/customer_balance_detail", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			var vm = banhji.customerBalanceDetail;
			banhji.userManagement.addMultiTask("Customer Balance Detail","customer_balance_detail",null);
			banhji.view.layout.showIn("#content", banhji.view.customerBalanceDetail);
			if(banhji.pageLoaded["customer_balance_detail"]==undefined){
				banhji.pageLoaded["customer_balance_detail"] = true;
			}
			vm.pageLoad();
		}
	});
	banhji.router.route("/receivable_aging_summary", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			banhji.view.layout.showIn("#content", banhji.view.receivableAgingSummary);

			var vm = banhji.receivableAgingSummary;
			banhji.userManagement.addMultiTask("Receivable Aging Summary","receivable_aging_summary",null);

			if(banhji.pageLoaded["receivable_aging_summary"]==undefined){
				banhji.pageLoaded["receivable_aging_summary"] = true;
			}
			vm.pageLoad();
		}
	});
	banhji.router.route("/receivable_aging_detail", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			banhji.view.layout.showIn("#content", banhji.view.receivableAgingDetail);

			var vm = banhji.receivableAgingDetail;
			banhji.userManagement.addMultiTask("Receivable Aging Detail","receivable_aging_detail",null);

			if(banhji.pageLoaded["receivable_aging_detail"]==undefined){
				banhji.pageLoaded["receivable_aging_detail"] = true;
			}
			vm.pageLoad();
		}
	});
	banhji.router.route("/collect_invoice", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			banhji.view.layout.showIn("#content", banhji.view.collectInvoice);

			var vm = banhji.collectInvoice;
			banhji.userManagement.addMultiTask("List Invoice Collect","collect_invoice",null);

			if(banhji.pageLoaded["collect_invoice"]==undefined){
				banhji.pageLoaded["collect_invoice"] = true;
			}
			vm.pageLoad();
		}
	});
	banhji.router.route("/collection_report", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			var vm = banhji.collectionReport;
			banhji.userManagement.addMultiTask("Collection Report","collection_report",null);
			banhji.view.layout.showIn("#content", banhji.view.collectionReport);

			if(banhji.pageLoaded["collection_report"]==undefined){
				banhji.pageLoaded["collection_report"] = true;

				vm.sorterChanges();
			}
			vm.pageLoad();
		}
	});
	banhji.router.route("/invoice_list", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			banhji.view.layout.showIn("#content", banhji.view.invoiceList);

			var vm = banhji.invoiceList;
			banhji.userManagement.addMultiTask("Invoice List","invoice_list",null);

			if(banhji.pageLoaded["collect_invoice"]==undefined){
				banhji.pageLoaded["collect_invoice"] = true;
				vm.sorterChanges();
			}
			vm.pageLoad();
		}
	});
	banhji.router.route("/sale_job_engagement", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			var vm = banhji.saleJobEngagement;
			banhji.userManagement.addMultiTask("Sale Job Engagement","sale_job_engagement",null);

			banhji.view.layout.showIn("#content", banhji.view.saleJobEngagement);
			banhji.saleJob.set('startDate', new Date().getFullYear() + "-01-01");
			banhji.saleJob.dataSource.filter({
				logic: banhji.saleSummaryCustomer.get('filteredBy'),
				filters: [
					{field: "issued_date >=", value: kendo.toString(new Date().getFullYear() + "-01-01", "yyyy-MM-dd")},
					{field: "issued_date <=", value: kendo.toString(new Date(), "yyyy-MM-dd")}
				]
			});
			banhji.saleJob.dataSource.bind('requestEnd', function(e){
				if(e.response) {
					banhji.saleJob.set('count', e.response.count);
					kendo.culture(banhji.locale);
					banhji.saleJob.set('total', kendo.toString(e.response.total, 'c2'));
					banhji.saleJob.set('saleNumber', kendo.toString(e.response.saleNumber, 'c2'));
				}
			});
		}
	});
	banhji.router.route("/sale_order_list", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			banhji.view.layout.showIn("#content", banhji.view.saleOrderList);

			var vm = banhji.saleOrderList;
			banhji.userManagement.addMultiTask("List of Sale Order","sale_order_list",null);

			if(banhji.pageLoaded["sale_order_list"]==undefined){
				banhji.pageLoaded["sale_order_list"] = true;
				vm.sorterChanges();
			}
			vm.pageLoad();
		}
	});
	banhji.router.route("/saleOrder_detail_by_product", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			banhji.view.layout.showIn("#content", banhji.view.saleOrderDetailByProduct);

			var vm = banhji.saleOrderDetailByProduct;
			banhji.userManagement.addMultiTask("Sale Order Detail By Product","saleOrder_detail_by_product",null);

			if(banhji.pageLoaded["saleOrder_detail_by_product"]==undefined){
				banhji.pageLoaded["saleOrder_detail_by_product"] = true;

				vm.sorterChanges();
			}
			vm.pageLoad();
		}
	});
	banhji.router.route("/customer_list", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			banhji.view.layout.showIn("#content", banhji.view.customerList);
			banhji.view.layout.showIn('#menu', banhji.view.menu);
			banhji.view.menu.showIn('#secondary-menu', banhji.view.customerMenu);

			var vm = banhji.customerList;

			if(banhji.pageLoaded["customer_list"]==undefined){
				banhji.pageLoaded["customer_list"] = true;

			}
		}
	});
	banhji.router.route("/draft_list", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			banhji.view.layout.showIn("#content", banhji.view.draftTransaction);

			var vm = banhji.draftTransaction;
			banhji.userManagement.addMultiTask("Draft Transaction List","draft_list",null);

			if(banhji.pageLoaded["draft_list"]==undefined){
				banhji.pageLoaded["draft_list"] = true;

				vm.sorterChanges();
			}
			vm.pageLoad();
		}
	});
	banhji.router.route("/saleOrder_deatil_customer", function(){
        if(!banhji.userManagement.getLogin()){
            banhji.router.navigate('/manage');
        }else{
            banhji.view.layout.showIn("#content", banhji.view.saleOrderDetailbyCustomer);

            var vm = banhji.saleOrderDetailbyCustomer;
            banhji.userManagement.addMultiTask("Sale Detail By Product","saleOrder_deatil_customer",null);

            if(banhji.pageLoaded["saleOrder_deatil_customer"]==undefined){
                banhji.pageLoaded["saleOrder_deatil_customer"] = true;

                vm.sorterChanges();
            }
            vm.pageLoad();
        }
    });
    banhji.router.route("/sale_order_by_item", function(){
        if(!banhji.userManagement.getLogin()){
            banhji.router.navigate('/manage');
        }else{
            banhji.view.layout.showIn("#content", banhji.view.saleOrderDetailbyItem);

            var vm = banhji.saleOrderDetailbyItem;
            banhji.userManagement.addMultiTask("Sale Detail By Customer","sale_order_by_item",null);

            if(banhji.pageLoaded["sale_order_by_item"]==undefined){
                banhji.pageLoaded["sale_order_by_item"] = true;

                vm.sorterChanges();
            }
            vm.pageLoad();
        }
    });
    banhji.router.route("/sale_order_by_employee", function(){
        if(!banhji.userManagement.getLogin()){
            banhji.router.navigate('/manage');
        }else{
            banhji.view.layout.showIn("#content", banhji.view.saleOrderDetailbyEmployee);

            var vm = banhji.saleOrderDetailbyEmployee;
            banhji.userManagement.addMultiTask("Sale Detail By Customer","sale_order_by_employee",null);

            if(banhji.pageLoaded["sale_order_by_employee"]==undefined){
                banhji.pageLoaded["sale_order_by_employee"] = true;

                vm.sorterChanges();
            }
            vm.pageLoad();
        }
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