
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
        allowSize     : 0,
        transactionSize: 0,
        contactSize   : 0,
        totalSize     : 0,
        transactionNu : 0,
        contactNu     : 0,
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
        lang        : null,
        localeCode  : null,
        changeToEn  : function() {
            localforage.setItem("lang", "EN").then(function(value){
                location.reload(false);
            });
        },
        changeToKh  : function() {
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
                read    : {
                    url: url,
                    type: "GET",
                    headers: banhji.header,
                    dataType: 'json'
                },
                create  : {
                    url: url,
                    type: "POST",
                    headers: banhji.header,
                    dataType: 'json'
                },
                update  : {
                    url: url,
                    type: "PUT",
                    headers: banhji.header,
                    dataType: 'json'
                },
                destroy     : {
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
            schema  : {
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
        multiTaskList       : [],
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
        removeLink          : function(e){
            e.preventDefault();

            var data = e.data,
            index = this.multiTaskList.indexOf(data);
            
            if(data.vm!==null){
                data.vm.cancel();
            }
            this.multiTaskList.splice(index, 1);
        },
        removeMultiTask     : function(url){
            var self = this;

            $.each(this.multiTaskList, function(index, value){
                if(value.url==url){
                    self.multiTaskList.splice(index, 1);

                    return false;
                }
            });
        },
        addMultiTask        : function(name, url, vm){
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
                read    : {
                    url: apiUrl + 'authentication',
                    type: "GET",
                    dataType: 'json'
                },
                create  : {
                    url: apiUrl + 'authentication',
                    type: "POST",
                    dataType: 'json'
                },
                update  : {
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
            // pageSize: 100
        }),
        inst     : new kendo.data.DataSource({
            transport: {
                read    : {
                    url: apiUrl + 'banhji/company',
                    type: "GET",
                    dataType: 'json'
                },
                create  : {
                    url: apiUrl + 'banhji/company',
                    type: "POST",
                    dataType: 'json'
                },
                update  : {
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
            // pageSize: 100
        }),
        industry : new kendo.data.DataSource({
            transport: {
                read    : {
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
            // pageSize: 100
        }),
        countries: new kendo.data.DataSource({
            transport: {
                read    : {
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
            // pageSize: 100
        }),
        provinces: new kendo.data.DataSource({
            transport: {
                read    : {
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
            // pageSize: 100
        }),
        types    : new kendo.data.DataSource({
            transport: {
                read    : {
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
            // pageSize: 100
        }),
        instMod     : new kendo.data.DataSource({
            transport: {
                read    : {
                    url: apiUrl + 'admin/modules_institute',
                    type: "GET",
                    dataType: 'json'
                },
                create  : {
                    url: apiUrl + 'admin/modules_institute',
                    type: "POST",
                    dataType: 'json'
                },
                update  : {
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
            filter: {field: 'id', value: 1}
            // pageSize: 100
        }),
        onSuccessUpload: function(e){
            var logo = e.response.results.url;
            this.get('newInst').set('logo', logo);
            this.saveIntitute();
            // console.log(logo);
        },
        close       : function() {
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
        pwdDS    : new kendo.data.DataSource({
            transport: {
                create  : {
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
        login    : function() {
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
        logout      : function(e) {
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
        getLogin    : function() {
            return JSON.parse(localStorage.getItem('userData/user'));
        },
        page     : function() {
            if(banhji.userManagement.getLogin()) {
                if(banhji.userManagement.getLogin().perm === 1) {
                    return 'admin';
                }
            } else {
                return 'home';
            }
            // if(this.getLogin()) {
            //  return '\#/page';
            // } else {
            //  return '\#/page/';
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
        signup     : function() {
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
        dataSource          : dataStore(apiUrl + 'currencies'),
        getCurrencyID       : function(locale){
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
        dataStore   : new kendo.data.DataSource({
            transport: {
                read    : {
                    url: apiUrl + 'banhji/users',
                    type: "GET",
                    headers: {
                        "Entity": getDB(),
                        "User": banhji.userManagement.getLogin() === null ? '': banhji.userManagement.getLogin().id
                    },
                    dataType: 'json'
                },
                create  : {
                    url: apiUrl + 'banhji/users',
                    type: "POST",
                    headers: {
                        "Entity": getDB(),
                        "User": banhji.userManagement.getLogin() === null ? '': banhji.userManagement.getLogin().id
                    },
                    dataType: 'json'
                },
                update  : {
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
            pageSize: 100
        }),
        roleDS      : new kendo.data.DataSource({
            transport: {
                read    : {
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
            pageSize: 100
        }),
        add         : function() {
            banhji.view.pageAdmin.showIn('#col2', banhji.view.addUserView);
            this.dataStore.insert(0, {username: '', password: null, permission: {id: null, name: null}});
            this.setCurrent(this.dataStore.at(0));
        },
        remove      : function(e) {
            var user = confirm('Are you sure you want to remove this user?');
            if(user === true) {
                this.dataStore.remove(e.data);
                this.sync();
            }
        },
        editRight   : function(e) {
            banhji.view.pageAdmin.showIn('#col2', banhji.view.editRoleView);
            this.setCurrent(e.data);
        },
        cancelAdd   : function() {
            banhji.view.pageAdmin.showIn('#col2', banhji.view.userListView);
            this.dataStore.cancelChanges();
        },
        setCurrent  : function(current) {
            this.set('current', current);
        },
        sync        : function() {
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
                read    : {
                    url: apiUrl + "people",
                    type: "GET",
                    headers: {
                        "Entity": banhji.userManagement.getLogin() !== null ? banhji.userManagement.getLogin().institute.name:""
                    },
                    dataType: 'json'
                },
                create  : {
                    url: apiUrl + "people",
                    type: "POST",
                    headers: {
                        "Entity": banhji.userManagement.getLogin() !== null ? banhji.userManagement.getLogin().institute.name:""
                    },
                    dataType: 'json'
                },
                update  : {
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
            schema  : {
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
        save       : function() {}
    });
    // end TEst offline
    var obj = function(url) {
        var o = kendo.observable({
            dataStore: new kendo.data.DataSource({
                transport: {
                    read    : {
                        url: url,
                        type: "GET",
                        headers: {
                            "Entity": getDB()
                        },
                        dataType: 'json'
                    },
                    create  : {
                        url: url,
                        type: "POST",
                        headers: {
                            "Entity": getDB()
                        },
                        dataType: 'json'
                    },
                    update  : {
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
                schema  : {
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
            findBy  : function(arr) {},
            insert  : function(data) {},
            remove  : function(model) {
                this.dataStore.remove(model);
                this.save();
            },
            save    : function() {
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
        menu    : [],
        // isShown : true,
        // isAdmin : auth.isAdmin(),
        // logout   : function(e) {
        //  e.preventDefault();
        //  auth.logout();
        // },
        // isLogin : function(){
        //  if(banhji.userManagement.getLogin()) {
        //      return true;
        //  } else {
        //      return false;
        //  }
        // },
        // init: function() {
        //  // initialize when the whole page load
        // },
        // ui: function() {
        //  // get UI information from source base on locale
        // }
    });
    var role = kendo.observable({
        dataStore   : new kendo.data.DataSource({
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
        roleUserDs  : new kendo.data.DataSource({
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
        find        : function(arg) {},
        setCurrent  : function(currentRole) {},
        save        : function() {}
    });

    // SOURCE #############################################################################################
    banhji.source = kendo.observable({
        lang                        : langVM,
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
            filter:{ field:"assignee_id", operator:"by_user_id", value:banhji.userData.id },
            sort:{ field:"number", dir:"asc" },
            batch: true,
            serverFiltering: true,
            serverSorting: true,
            serverPaging: true,
            page:1,
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
        itemList                    : [],
        itemDS                      : dataStore(apiUrl + "items"),
        itemTypeDS                  : dataStore(apiUrl + "item_types"),
        itemGroupList               : [],
        itemGroupDS                 : dataStore(apiUrl + "items/group"),
        brandDS                     : dataStore(apiUrl + "brands"),
        categoryList                : [],
        categoryDS                  : dataStore(apiUrl + "categories"),     
        itemPriceList               : [],
        itemPriceDS                 : dataStore(apiUrl + "item_prices"),
        measurementList             : [],
        measurementDS               : dataStore(apiUrl + "measurements"),
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
        testDS                      : dataStore(apiUrl + "item_locations/test"),
        employee                    : [],
        pageLoad                    : function(){
            this.setEmployeeByUser();
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
        },
        setEmployeeByUser           : function(){
            var self = this;

            this.employeeUserDS.query({
                filter: { field:"user_id", value:banhji.source.user_id }
            }).then(function(){
                var view = self.employeeUserDS.view();

                if(view.length>0){
                    self.set("employee", view[0]);
                }
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
        loadItems                   : function(){
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
        loadItemPrices              : function(){
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
    *   HOME PAGE MVVM                               *
    *************************************************/
    var sessionID = 0;
    banhji.dashBoard = kendo.observable({
        lang        : langVM,
        currencyDS: dataStore(apiUrl + "utibills/currency"),
        sessionDS: dataStore(apiUrl + "cashier"),
        cashierItemDS: dataStore(apiUrl + "cashier_sessions/item"),
        updateSessionDS: dataStore(apiUrl + "cashier_sessions"),
        noSession: true,
        pageLoad: function(id){
            if(id){
                sessionID = id;
                banhji.router.navigate("/pos");
            }else{
                var self = this;
                this.currencyDS.query({
                    sort: {
                        field: "created_at",
                        dir: "asc"
                    }
                }).then(function(e) {
                    self.setCashierItems();
                });
            }
        },
        setCashierItems: function() {
            var self = this;
            this.cashierItemDS.data([]);
            $.each(this.currencyDS.data(), function(i, v) {
                self.cashierItemDS.add({
                    cashier_session_id: "",
                    currency: v.code,
                    amount: 0,
                });
            });
        },
        addNewSession: function(){
            this.set("noSession", false);
            this.updateSessionDS.data([]);
            this.updateSessionDS.add({
                cashier_id: banhji.userData.id,
                start_date: new Date(),
                end_date: "",
                status: 0,
                items: []
            });
        },
        backSession: function(){
            this.set("noSession", true);
        },
        addSession: function() {
            var self = this;
            this.updateSessionDS.data()[0].set("items", this.cashierItemDS.data());
            this.updateSessionDS.sync();
            this.updateSessionDS.bind("requestEnd", function(e) {
                var ID = e.response.results[0].id;
                self.set("noSession", true);
                self.sessionDS.read();
                self.pageLoad(ID);
            });
        },
        selectSession: function(e){
            this.pageLoad(e.data.id);
        }
    });

    banhji.pos =  kendo.observable({
        lang                : langVM,
        dataSource          : dataStore(apiUrl + "transactions"),
        lineDS              : dataStore(apiUrl + "item_lines"),
        assemblyLineDS      : dataStore(apiUrl + "item_lines"),
        recurringDS         : dataStore(apiUrl + "transactions"),
        recurringLineDS     : dataStore(apiUrl + "item_lines"),
        txnDS               : dataStore(apiUrl + "transactions"),
        balanceDS           : dataStore(apiUrl + "transactions/balance"),
        attachmentDS        : dataStore(apiUrl + "attachments"),
        assemblyDS          : dataStore(apiUrl + "item_prices"),
        wacDS               : dataStore(apiUrl + "items/weighted_average_costing"),
        itemsDS             : new kendo.data.DataSource({
            transport: {
                read: {
                    url: apiUrl + "items",
                    type: "GET",
                    headers: banhji.header,
                    dataType: 'json'
                },
                parameterMap: function(options, operation) {
                    if (operation === 'read') {
                        return {
                            page: options.page,
                            limit: options.pageSize,
                            filter: options.filter,
                            sort: options.sort
                        };
                    } else {
                        return {
                            models: kendo.stringify(options.models)
                        };
                    }
                }
            },
            schema: {
                model: {
                    id: 'id'
                },
                data: 'results',
                total: 'count'
            },
            filter: [
                {
                    field: "is_system",
                    value: 0
                }
            ],
            sort: {
                field: "id",
                dir: "asc"
            },
            batch: true,
            serverFiltering: true,
            serverSorting: true,
            serverPaging: true,
            page: 1,
            pageSize: 4
        }),
        employeeDS          : new kendo.data.DataSource({
            transport: {
                read: {
                    url: apiUrl + "contacts",
                    type: "GET",
                    headers: banhji.header,
                    dataType: 'json'
                },
                parameterMap: function(options, operation) {
                    if (operation === 'read') {
                        return {
                            page: options.page,
                            limit: options.pageSize,
                            filter: options.filter,
                            sort: options.sort
                        };
                    } else {
                        return {
                            models: kendo.stringify(options.models)
                        };
                    }
                }
            },
            schema: {
                model: {
                    id: 'id'
                },
                data: 'results',
                total: 'count'
            },
            filter: [
                {
                    field: "contact_type_id",
                    value: 9
                }
            ],
            sort: {
                field: "id",
                dir: "asc"
            },
            batch: true,
            serverFiltering: true,
            serverSorting: true,
            serverPaging: true,
            page: 1,
            pageSize: 4
        }),
        customerItemsDS     : dataStore(apiUrl + "items/less", 9),
        journalLineDS       : dataStore(apiUrl + "journal_lines"),
        referenceDS         : dataStore(apiUrl + "transactions"),
        referenceLineDS     : dataStore(apiUrl + "item_lines"),
        depositDS           : dataStore(apiUrl + "transactions"),
        attachmentDS        : dataStore(apiUrl + "attachments"),
        assemblyDS          : dataStore(apiUrl + "item_prices"),
        wacDS               : dataStore(apiUrl + "items/weighted_average_costing"),
        segmentDS           : dataStore(apiUrl + "segments"),
        segItemDS           : dataStore(apiUrl + "segments/item"),
        segmentItemDS       : dataStore(apiUrl + "segments/item"),
        segmentItemDS       : new kendo.data.DataSource({
            data: banhji.source.segmentItemList,
            sort: [
                { field: "segment_id", dir: "asc" },
                { field: "code", dir: "asc" }
            ]
        }),
        txnTemplateDS     : new kendo.data.DataSource({
            data: banhji.source.txnTemplateList,
            filter:{ field: "type", value: "Quote" }
        }),
        contactDS          : new kendo.data.DataSource({
            transport: {
                read: {
                    url: apiUrl + "contacts",
                    type: "GET",
                    headers: banhji.header,
                    dataType: 'json'
                },
                parameterMap: function(options, operation) {
                    if (operation === 'read') {
                        return {
                            page: options.page,
                            limit: options.pageSize,
                            filter: options.filter,
                            sort: options.sort
                        };
                    } else {
                        return {
                            models: kendo.stringify(options.models)
                        };
                    }
                }
            },
            schema: {
                model: {
                    id: 'id'
                },
                data: 'results',
                total: 'count'
            },
            filter: [
                {
                    field: "contact_type_id",
                    value: 4
                }
            ],
            sort: {
                field: "id",
                dir: "asc"
            },
            batch: true,
            serverFiltering: true,
            serverSorting: true,
            serverPaging: true,
            page: 1,
            pageSize: 100
        }),
        categoryDS         : new kendo.data.DataSource({
            transport: {
                read: {
                    url: apiUrl + "categories",
                    type: "GET",
                    headers: banhji.header,
                    dataType: 'json'
                },
                parameterMap: function(options, operation) {
                    if (operation === 'read') {
                        return {
                            page: options.page,
                            limit: options.pageSize,
                            filter: options.filter,
                            sort: options.sort
                        };
                    } else {
                        return {
                            models: kendo.stringify(options.models)
                        };
                    }
                }
            },
            schema: {
                model: {
                    id: 'id'
                },
                data: 'results',
                total: 'count'
            },
            filter: [
                {
                    field: "is_system",
                    value: 0
                }
            ],
            sort: {
                field: "id",
                dir: "asc"
            },
            batch: true,
            serverFiltering: true,
            serverSorting: true,
            serverPaging: true,
            page: 1,
            pageSize: 100
        }),
        paymentTermDS      : banhji.source.paymentTermDS,
        statusObj          : banhji.source.statusObj,
        amtDueColor        : banhji.source.amtDueColor,
        confirmMessage     : banhji.source.confirmMessage,
        frequencyList      : banhji.source.frequencyList,
        monthOptionList    : banhji.source.monthOptionList,
        monthList          : banhji.source.monthList,
        weekDayList        : banhji.source.weekDayList,
        dayList            : banhji.source.dayList,
        showMonthOption    : false,
        showMonth          : false,
        showWeek           : false,
        showDay            : false,
        obj                : null,
        category_id        : null,
        isEdit             : false,
        saveDraft          : false,
        saveClose          : false,
        savePrint          : false,
        saveRecurring      : false,
        showConfirm        : false,
        notDuplicateNumber : true,
        recurring          : "",
        recurring_validate : false,
        balance            : 0,
        total              : 0,
        user_id            : banhji.source.user_id,
        isVisible          : true,
        isEnabled          : true,
        pageLoad           : function(id){
            if(sessionID == 0){
                banhji.router.navigate("/");
            }
            if(id){
                this.set("isEdit", true);
                this.loadObj(id);
            }else{
                if(this.get("isEdit") || this.dataSource.total()==0){
                    this.addEmpty();
                }
            }
        },
        millisToMinutesAndSeconds: function(millis) {
            var minutes = Math.floor(millis / 60000);
            var seconds = ((millis % 60000) / 1000).toFixed(0);
            return minutes + ":" + (seconds < 10 ? '0' : '') + seconds;
        },
        getItems        : function(){
            var self = this;
            var t0 = performance.now();
            this.itemsDS.query({
                take: 10,
                skip: 1,
                filter:{ field: "item_type_id <>", value: 3 },
                sort: [
                { field:"item_type_id", dir:"asc" },
                { field:"number", dir:"asc" }
                ],
                group: []
            }).then(function(){
                
                $("#productPager").kendoPager({
                    dataSource: self.itemsDS,
                    buttonCount: 9
                });

                var items = self.itemsDS.view();
                var itemArr = [];

                for (var i = 0; i < 1; i ++){
                    itemArr.push({
                        id: items[i].id,
                        abbr: items[i].abbr,
                        category_id: items[i].category_id,
                        cost: items[i].cost,
                        dirty: items[i].dirty, 
                        expense_account_id: items[i].expense_account_id,
                        image_url: items[i].image_url,
                        income_account_id: items[i].income_account_id,
                        inventory_account_id: items[i].inventory_account_id,
                        item_type_id: items[i].item_type_id,
                        locale: items[i].locale,
                        measurement_id: items[i].measurement_id,
                        name: items[i].name,
                        number: items[i].number,
                        price: items[i].price,
                        uid: items[i].uid
                    });
                }

                var db = new Dexie("PosDB");

                db.version(1).stores({
                    items: "id,abbr,category_id,cost,dirty,expense_account_id,image_url,income_account_id,inventory_account_id,item_type_id,locale,measurement_id,name,number,price,uid"
                });

                db.items.bulkPut(itemArr).then(function(lastKey) {
                    var t1 = performance.now();
                    var timelapse = t1 - t0;
                    console.log("Time Spend " + self.millisToMinutesAndSeconds(timelapse) + " milliseconds.");
                    console.log("SUCCESS, Last item keys id was: " + lastKey); 
                }).catch(Dexie.BulkError, function (e) {
                    console.error ("ERROR, Some items did not succeed. However, " +
                                   100000-e.failures.length + " raindrops was added successfully");
                });
            });
        },
        getCustomerItemsDS: function(){
            var self = this;
            var t0 = performance.now();
            this.customerItemsDS.query({
                take: 5,
                skip: 1,
                filter:{ field: "item_type_id <>", value: 3 },
                sort: [
                { field:"item_type_id", dir:"asc" },
                { field:"number", dir:"asc" }
                ],
                group: []
            }).then(function(){
                
            });
        },
        onSelect      : function(e){
            var self = this, 
            files = e.files,
            obj = this.get("obj");
            $.each(files, function(index, value){
                if (value.extension.toLowerCase() === ".jpg"
                    || value.extension.toLowerCase() === ".jpeg"
                    || value.extension.toLowerCase() === ".tiff"
                    || value.extension.toLowerCase() === ".png" 
                    || value.extension.toLowerCase() === ".gif"
                    || value.extension.toLowerCase() === ".pdf"){

                    var key = 'ATTACH_' + banhji.institute.id + "_" + Math.floor(Math.random() * 100000000000000001) +'_'+ value.name;

                self.attachmentDS.add({
                    user_id        : self.get("user_id"),
                    transaction_id : obj.id,
                    type           : "Transaction",
                    name           : value.name,
                    description    : "",
                    key            : key,
                    url            : banhji.s3 + key,
                    size           : value.size,
                    created_at     : new Date(),
                    file           : value.rawFile
                });
                }else{
                    alert("This type of file is not allowed to attach.");
                }
            });
        },
        removeFile      : function(e){
            var data = e.data;

            if (confirm(banhji.source.confirmMessage)) {
                this.attachmentDS.remove(data);
            }
        },
        uploadFile      : function(){
            $.each(this.attachmentDS.data(), function(index, value){
                if(!value.id){
                    var params = { 
                        Body: value.file, 
                        Key: value.key 
                    };
                    bucket.upload(params, function (err, data) {

                    });
                }
            });

            this.attachmentDS.sync();
            var saved = false;
            this.attachmentDS.bind("requestEnd", function(e){

                if(e.type=="destroy"){
                    if(saved==false && e.response){
                        saved = true;

                        var response = e.response.results;
                        $.each(response, function(index, value){
                            var params = {

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
                            });
                        });
                    }
                }
            });
        },   
        //Contact
        setContact      : function(contact){
            var obj = this.get("obj");

            obj.set("contact", contact);
            this.contactChanges();
        },
        contactChanges    : function(){
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
        //Category
        setCategory      : function(category){
            var obj = this.get("obj");

            obj.set("category", category);
            this.categoryChanges();
        },
        itemGroupDS : dataStore(apiUrl + "items/group"),
        categorySelect    : function(e){
            var data = e.data;
            this.itemGroupDS.query({
                filter: {
                    field: "category_id",
                    value: data.id
                }
            });
        },
        groupSelect    : function(e){
            var data = e.data;
            this.itemsDS.filter({
                field: "item_group_id",
                value: data.id
            });
        },
        //Room
        roomDS       : dataStore(apiUrl + "utibills/room"),
        roomAR          : [],
        emSelect: true,
        supplierDS : new kendo.data.DataSource({
            transport: {
                read: {
                    url: apiUrl + "contacts",
                    type: "GET",
                    headers: banhji.header,
                    dataType: 'json'
                },
                parameterMap: function(options, operation) {
                    if (operation === 'read') {
                        return {
                            page: options.page,
                            limit: options.pageSize,
                            filter: options.filter,
                            sort: options.sort
                        };
                    } else {
                        return {
                            models: kendo.stringify(options.models)
                        };
                    }
                }
            },
            schema: {
                model: {
                    id: 'id'
                },
                data: 'results',
                total: 'count'
            },
            filter: [
                {
                    field: "contact_type_id",
                    value: 6
                }
            ],
            sort: {
                field: "id",
                dir: "asc"
            },
            batch: true,
            serverFiltering: true,
            serverSorting: true,
            serverPaging: true,
            page: 1,
            pageSize: 4
        }),
        employeeAR : [],
        addEmployee: function(e){
            if(this.get("employeeSelected")){
                var name = e.sender.span[0].innerText;
                var id = this.get("employeeSelected");
                var h = 0;
                $.each(this.employeeAR, function(i,v){
                    if(v.id == id){
                        h = 1;
                    }
                });
                if(h != 1){
                    this.employeeAR.push({
                        id: id,
                        name: name
                    });
                    h = 0;
                }
            }
        },
        addRoom : function(e){
            if(this.get("roomSelected")){
                var name = e.sender.span[0].innerText;
                var id = this.get("roomSelected");
                var h = 0;
                $.each(this.roomAR, function(i,v){
                    if(v.id == id){
                        h = 1;
                    }
                });
                if(h != 1){
                    this.roomAR.push({
                        id: id,
                        name: name
                    });
                    h = 0;
                }
            }
        },
        rmRoom : function(e){
            var data = e.data;
            this.roomAR.remove(data);
        },
        rmEmployee : function(e){
            var data = e.data;
            this.employeeAR.remove(data);
        },
        customerAR : [],
        addCustomer : function(e){
            if(this.get("customerSelected")){
                var name = e.sender.span[0].innerText;
                var id = this.get("customerSelected");
                var h = 0;
                $.each(this.customerAR, function(i,v){
                    if(v.id == id){
                        h = 1;
                    }
                });
                if(h != 1){
                    this.customerAR.push({
                        id: id,
                        name: name
                    });
                    h = 0;
                }
            }
        },
        rmCustomer : function(e){
            var data = e.data;
            this.customerAR.remove(data);
        },
        selectEmployee : function(e){
            this.set("employeeSelect", "");
            this.set("supplierSelect", "");
            this.set("emSelect", true);
        },
        selectOutsource : function(e){
            this.set("employeeSelect", "");
            this.set("supplierSelect", "");
            this.set("emSelect", false);
        },
        selectCategory  : function(e){
        },
        toDay : new Date(),
        dateSelected: new Date(),
        setRate       : function(){
            var obj = this.get("obj"), 
            rate = banhji.source.getRate(obj.locale, new Date(obj.issued_date));

            obj.set("rate", rate);

            $.each(this.lineDS.data(), function(index, value){
                var itemRate = rate / banhji.source.getRate(value.locale, new Date(obj.issued_date));
                value.set("rate", itemRate);
            });

            $.each(this.assemblyLineDS.data(), function(index, value){
                var itemRate = rate / banhji.source.getRate(value.locale, new Date(obj.issued_date));
                value.set("rate", itemRate);
            });
        },
        segmentChanges    : function(e) {
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
        addItem       : function(uid){
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
                        measurement_id  : view[0].measurement_id,
                        price       : kendo.parseFloat(view[0].price),
                        conversion_ratio: view[0].conversion_ratio, 
                        measurement   : view[0].measurement 
                    };
                    row.set("measurement", measurement);
                }
            });
        },
        addItemCatalog    : function(uid){
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
                        transaction_id    : obj.id,
                        tax_item_id     : 0,
                        item_id       : catalogItem.id,
                        measurement_id    : 0,
                        description     : catalogItem.sale_description,
                        quantity      : 1,
                        conversion_ratio  : 1,
                        cost        : catalogItem.cost * rate,
                        price         : 0,
                        amount        : 0,
                        discount      : 0,
                        rate        : rate,
                        locale        : catalogItem.locale,
                        movement      : 0,

                        discount_percentage : 0,
                        item        : catalogItem,
                        measurement     : { measurement_id:"", measurement:"" },
                        tax_item      : { id:"", name:"" }
                    });
                }
            });
        },
        addItemAssembly   : function(uid){
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
                            transaction_id    : obj.id,
                            item_id       : value.item_id,
                            assembly_id     : value.assembly_id,
                            measurement_id    : value.measurement_id,
                            description     : itemAssembly.sale_description,
                            quantity      : value.quantity,
                            conversion_ratio  : value.conversion_ratio,
                            cost        : itemAssembly.cost * rate,
                            price         : value.price * itemAssemblyRate,
                            amount        : value.price * itemAssemblyRate,
                            rate        : itemAssemblyRate,
                            locale        : value.locale,
                            movement      : 0,

                            item        : itemAssembly
                        });
                    });
                });
            }else{
                alert("Duplicate Item Assembly!");
                row.set("item_id", 0);
                row.set("item", { id:"", name:"" });
            }
        },
        changes       : function(){
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

            total = (subTotal + tax) - discount;

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

            var raw = this.assemblyLineDS.data();
            var item, i;
            for(i=raw.length-1; i>=0; i--){
                item = raw[i];

                if (jQuery.inArray(kendo.parseInt(item.assembly_id), itemIds)==-1) {
                    this.assemblyLineDS.remove(item);
                }
            }
        },
        lineDSChanges     : function(arg){
            console.log('lineDSChanges', arg.field);
            var self = banhji.pos;
            self.changes();

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
        checkExistingNumber   : function(){
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
        setStatus       : function(){
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
            }
        },
        loadObj       : function(id){
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
                        ],
                    });

                    self.assemblyLineDS.filter([
                                               { field: "transaction_id", value: id },
                                               { field: "assembly_id >", value: 0 }
                                               ]);

                    self.journalLineDS.filter({ field: "transaction_id", value: id });
                    self.attachmentDS.filter({ field: "transaction_id", value: id });

              //Segment
                    var segments = [];
                    $.each(view[0].segments, function(index, value){
                        segments.push(value);
                    });
                    self.segmentItemDS.filter({ field: "id", operator:"where_in", value: segments });

              //References
                    if(view[0].references.length>0){
                        $.each(view[0].references, function(index, value){
                            referenceIds.push(value);
                        });

                        self.referenceDS.query({
                            filter:{ field: "id", operator:"where_in", value: referenceIds }
                        }).then(function(){
                            var reference = self.referenceDS.view();

                            self.set("referenceList", reference);
                        });
                    }else{
                        self.loadReference();
                    }
                });
            }
        },
        addEmpty      : function(){
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
            this.set("referenceList", []);
            this.dataSource.insert(0, {
                transaction_template_id: 10,
                contact_id      : "",//Customer
                payment_method_id : 0,
                reference_id    : "",
                recurring_id    : "",
                account_id      : 1,
                discount_account_id : 0,
                job_id        : 0,
                user_id       : this.get("user_id"),
                employee_id     : "",//Sale Rep
                type        : "Commercial_Cash_Sale",//Required
                number        : "",
                sub_total       : 0,
                discount      : 0,
                tax         : 0,
                amount        : 0,
                deposit       : 0,
                remaining       : 0,
                credit_allowed    : 0,
                credit        : 0,
                check_no      : "",
                rate        : 1,
                locale        : banhji.locale,
                issued_date     : new Date(),
                bill_to       : "",
                ship_to       : "",
                memo        : "",
                memo2         : "",
                status        : 0,
                references      : [],
                segments      : [],
                is_journal      : 1,
                //Recurring
                recurring_name    : "",
                start_date      : new Date(),
                frequency       : "Daily",
                month_option    : "Day",
                interval      : 1,
                day         : 1,
                week        : 0,
                month         : 0,
                is_recurring    : 0,
                contact       : { id:"", name:"" }
            });
            var obj = this.dataSource.at(0);
            this.set("obj", obj);
            this.setRate();
            this.generateNumber();
        },
        addRow        : function(e){
            var obj = this.get("obj");
            var item = e.data;
            this.lineDS.add({
                transaction_id      : obj.id,
                tax_item_id         : "",
                item_id             : "",
                assembly_id         : 0,
                measurement_id      : 0,
                description         : "",
                quantity            : 1,
                conversion_ratio    : 0,
                cost                : 0,
                price               : item.price,
                amount              : item.price,
                discount            : 0,
                rate                : obj.rate,
                locale              : obj.locale,
                movement            : 0,
                discount_percentage : 0,
                item                : { id:item.id, name:item.name },
                measurement         : item.measurement,
                tax_item            : { id:"", name:"" }
            });
            this.changes();
        },
        addExtraRow     : function(uid){
            var row = this.lineDS.getByUid(uid),
            index = this.lineDS.indexOf(row);

            if(index==this.lineDS.total()-1){
                this.addRow();
            }
        },
        removeEmptyRow    : function(){
            var raw = this.lineDS.data();
            var item, i;
            for(i=raw.length-1; i>=0; i--){
                item = raw[i];

                if (item.item_id==0) {
                    this.lineDS.remove(item);
                }
            }
        },
        //Journal
        addJournal      : function(transaction_id){
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
                                transaction_id    : transaction_id,
                                account_id      : cogsID,
                                contact_id      : obj.contact_id,
                                description     : value.description,
                                reference_no    : "",
                                segments      : obj.segments,
                                dr          : cogsAmount * value.rate,
                                cr          : 0,
                                rate        : value.rate,
                                locale        : item.locale
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
                            transaction_id    : transaction_id,
                            account_id      : inventoryID,
                            contact_id      : obj.contact_id,
                            description     : value.description,
                            reference_no    : "",
                            segments      : obj.segments,
                            dr          : 0,
                            cr          : inventoryAmount * value.rate,
                            rate        : value.rate,
                            locale        : item.locale
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
                            transaction_id    : transaction_id,
                            account_id      : incomeID,
                            contact_id      : obj.contact_id,
                            description     : value.description,
                            reference_no    : "",
                            segments      : obj.segments,
                            dr          : 0,
                            cr          : saleAmount,
                            rate        : obj.rate,
                            locale        : obj.locale
                        };
                    }else{
                        entries[raw].cr += value.amount;
                    }
                }

            //Tax on Cr
                if(value.tax_item_id>0){
                    var taxItem = value.tax_item,
                    raw = "cr"+taxItem.account_id;

                    if(entries[raw]===undefined){
                        entries[raw] = {
                            transaction_id    : transaction_id,
                            account_id      : taxItem.account_id,
                            contact_id      : obj.contact_id,
                            description     : value.description,
                            reference_no    : "",
                            segments      : obj.segments,
                            dr          : 0,
                            cr          : value.tax,
                            rate        : obj.rate,
                            locale        : obj.locale
                        };
                    }else{
                        entries[raw].cr += taxAmt;
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
                                transaction_id    : transaction_id,
                                account_id      : cogsID,
                                contact_id      : obj.contact_id,
                                description     : value.description,
                                reference_no    : "",
                                segments      : obj.segments,
                                dr          : cogsAmount * value.rate,
                                cr          : 0,
                                rate        : value.rate,
                                locale        : item.locale
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
                            transaction_id    : transaction_id,
                            account_id      : inventoryID,
                            contact_id      : obj.contact_id,
                            description     : value.description,
                            reference_no    : "",
                            segments      : obj.segments,
                            dr          : 0,
                            cr          : inventoryAmount * value.rate,
                            rate        : value.rate,
                            locale        : item.locale
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
                        transaction_id    : transaction_id,
                        account_id      : objAccountID,
                        contact_id      : obj.contact_id,
                        description     : obj.memo,
                        reference_no    : obj.reference_no,
                        segments      : obj.segments,
                        dr          : objAmount,
                        cr          : 0,
                        rate        : obj.rate,
                        locale        : obj.locale
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
                            transaction_id    : transaction_id,
                            account_id      : discountAccountId,
                            contact_id      : obj.contact_id,
                            description     : obj.memo,
                            reference_no    : obj.reference_no,
                            segments      : obj.segments,
                            dr          : obj.discount,
                            cr          : 0,
                            rate        : obj.rate,
                            locale        : obj.locale
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
                            transaction_id    : transaction_id,
                            account_id      : depositAccountId,
                            contact_id      : obj.contact_id,
                            description     : obj.memo,
                            reference_no    : obj.reference_no,
                            segments      : obj.segments,
                            dr          : obj.deposit,
                            cr          : 0,
                            rate        : obj.rate,
                            locale        : obj.locale
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
        removeRow       : function(e){
            var data = e.data;
            this.lineDS.remove(data);
            this.changes();
        },
        addDeposit      : function(id){
            var obj = this.get("obj");

            this.depositDS.data([]);

            if(obj.deposit>0){
                this.depositDS.add({
                    contact_id      : obj.contact_id,
                    reference_id    : id,
                    user_id       : this.get("user_id"),
                    type        : "Customer_Deposit",
                    amount        : obj.deposit*-1,
                    rate        : obj.rate,
                    locale        : obj.locale,
                    issued_date     : obj.issued_date
                });
            }
        },
        saveDeposit     : function(id){
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
        payCash                 : function(e){
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

            //Reference
            var referenceIds = [];
            $.each(this.get("referenceList"), function(index, value){
                referenceIds.push(value.id);
            });
            obj.set("references", referenceIds);
            this.referenceDS.sync();

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
        payPopup           : function(){
            this.payVisible = this.payVisible == true ? false : true;
            console.log('payVisible', this.payVisible);
            $("#dialog").kendoWindow({
                title: "",
                width: "50%",
                height: "50%",
                actions: [ "close" ],
                draggable: false,
                resizable: false,
                modal: true,
                visible: false,
                modal: true
            });


            var dialog = $("#dialog").getKendoWindow();
            dialog.open();
            dialog.center();
        },
        objSync       : function(){
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
        save        : function(){
            var self = this, obj = this.get("obj");

            obj.set("issued_date", kendo.toString(new Date(obj.issued_date), "s"));
            obj.set("due_date", kendo.toString(new Date(obj.due_date), "yyyy-MM-dd"));


            if(obj.credit_limit>0 && obj.amount>obj.credit_allowed){
                alert("Over credit allowed!");
            }

            this.removeEmptyRow();


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
                    self.set("saveDraft", false);
                    self.set("saveClose", false);
                    self.cancel();
                }else if(self.get("savePrint")){
                    self.set("savePrint", false);
                    self.clear();
                    if(result[0].transaction_template_id>0){
                        banhji.router.navigate("/invoice_form/"+result[0].id);
                    }
                }else{
                    self.addEmpty();
                }
            });
        },
        clear         : function(){
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
        cancel        : function(){
            this.clear();
            window.history.back();
        },
        delete        : function(){
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
        addInvoice : function(e){
            
        }
    });

    banhji.receipt = kendo.observable({
        lang: langVM,
        dataSource: dataStore(apiUrl + "utibills/cashreceipt"),
        txnDS: dataStore(apiUrl + "utibills/search"),
        remainDS: dataStore(apiUrl + "transactions"),
        balanceDS: dataStore(apiUrl + "transactions"),
        journalLineDS: dataStore(apiUrl + "journal_lines"),
        haveSession: false,
        currencyDS: dataStore(apiUrl + "utibills/currency"),
        txnTemplateDS: new kendo.data.DataSource({
            data: banhji.source.txnTemplateList,
            filter: {
                field: "type",
                value: "Cash_Receipt"
            }
        }),
        segmentItemDS: new kendo.data.DataSource({
            data: banhji.source.segmentItemList,
            sort: [{
                    field: "segment_id",
                    dir: "asc"
                },
                {
                    field: "code",
                    dir: "asc"
                }
            ]
        }),
        employeeDS: new kendo.data.DataSource({
            data: banhji.source.employeeList,
            filter: {
                field: "item_type_id",
                value: 10
            }, //Sale Rep.
            sort: {
                field: "number",
                dir: "asc"
            }
        }),
        accountDS: new kendo.data.DataSource({
            data: banhji.source.accountList,
            filter: [{
                    field: "account_type_id",
                    value: 10
                },
                {
                    field: "status",
                    value: 1
                }
            ],
            sort: {
                field: "number",
                dir: "asc"
            }
        }),
        paymentTermDS: banhji.source.paymentTermDS,
        paymentMethodDS: banhji.source.paymentMethodDS,
        amtDueColor: banhji.source.amtDueColor,
        chhDiscount: false,
        chhFine: false,
        obj: null,
        isEdit: false,
        saveClose: false,
        savePrint: false,
        searchText: "",
        contact_id: "",
        invoice_id: 0,
        total: 0,
        total_received: 0,
        user_id: banhji.source.user_id,
        licenseDS: dataStore(apiUrl + "branches"),
        locationDS: dataStore(apiUrl + "locations"),
        slocation: false,
        ssublocation: false,
        sbox: false,
        balanceView: false,
        haveMonth: false,
        licenseChange: function(e) {
            this.locationDS.filter([{
                    field: "branch_id",
                    value: this.get("licenseSelect")
                },
                {
                    field: "main_bloc",
                    value: 0
                },
                {
                    field: "main_pole",
                    value: 0
                }
            ]);
            this.set("slocation", true);
        },
        blocChange: function() {
            this.set("haveMonth", true);
            this.set("balanceView", true);
        },
        monthChange: function() {},
        exArray: [],
        downloadView: false,
        searchINV: function() {
            $("#loadING").css("display", "block");
            var self = this,
                license_id = this.get("licenseSelect"),
                bloc_id = this.get("locationSelect"),
                monthOfSearch = this.get("monthSelect");
            this.set("downloadView", false);
            var para = [];
            this.exArray = [];
            this.exArray.push({
                cells: [{
                        value: "Date",
                        background: "#496cad",
                        color: "#ffffff"
                    },
                    {
                        value: "Name",
                        background: "#496cad",
                        color: "#ffffff"
                    },
                    {
                        value: "Number",
                        background: "#496cad",
                        color: "#ffffff"
                    },
                    {
                        value: "Meter",
                        background: "#496cad",
                        color: "#ffffff"
                    },
                    {
                        value: "Amount",
                        background: "#496cad",
                        color: "#ffffff"
                    },
                    {
                        value: "Discount",
                        background: "#496cad",
                        color: "#ffffff"
                    },
                    {
                        value: "Fine",
                        background: "#496cad",
                        color: "#ffffff"
                    },
                    {
                        value: "Receive",
                        background: "#496cad",
                        color: "#ffffff"
                    },
                ]
            });
            if (license_id) {
                if (bloc_id) {
                    para.push({
                        field: "location_id",
                        value: bloc_id
                    });
                    para.push({
                        field: "meter_id <>",
                        value: 0
                    });
                    para.push({
                        field: "type",
                        value: "Utility_Invoice"
                    });
                    para.push({
                        field: "status",
                        operator: "where_in",
                        value: [0, 2]
                    });
                    if (monthOfSearch) {
                        var monthOf = new Date(monthOfSearch);
                        monthOf.setDate(1);
                        monthOf = kendo.toString(monthOf, "yyyy-MM-dd");
                        var monthL = new Date(monthOfSearch);
                        var lastDayOfMonth = new Date(monthL.getFullYear(), monthL.getMonth() + 1, 0);
                        lastDayOfMonth = lastDayOfMonth.getDate();
                        monthL.setDate(lastDayOfMonth);
                        monthL = kendo.toString(monthL, "yyyy-MM-dd");
                        para.push({
                            field: "month_of >=",
                            value: monthOf
                        }, {
                            field: "month_of <=",
                            value: monthL
                        });
                    }
                    this.txnDS.query({
                        filter: para,
                        page: 1,
                        pageSize: 100
                    }).then(function() {
                        var view = self.txnDS.view();
                        self.dataSource.data([]);
                        if (view.length > 0) {
                            $.each(view, function(index, value) {
                                var amount_due = value.amount - (value.amount_paid + value.deposit);
                                self.dataSource.add({
                                    transaction_template_id: 0,
                                    contact_id: value.contact_id,
                                    account_id: obj.account_id,
                                    payment_term_id: value.payment_term_id,
                                    payment_method_id: obj.payment_method_id,
                                    reference_id: value.id,
                                    due_date_fine: value.due_date,
                                    status_inv_fine: value.status,
                                    user_id: self.get("user_id"),
                                    check_no: value.check_no,
                                    reference_no: value.number,
                                    number: "",
                                    invnumber: value.number,
                                    type: "Cash_Receipt",
                                    sub_total: amount_due,
                                    amount: amount_due,
                                    discount: 0,
                                    fine: 0,
                                    rate: value.rate,
                                    locale: value.locale,
                                    issued_date: obj.issued_date,
                                    invissued_date: value.issued_date,
                                    memo: obj.memo,
                                    memo2: obj.memo2,
                                    status: 0,
                                    segments: obj.segments,
                                    is_journal: 1,
                                    location_id: value.location_id,
                                    //Recurring
                                    recurring_name: "",
                                    start_date: new Date(),
                                    frequency: "Daily",
                                    month_option: "Day",
                                    interval: 1,
                                    day: 1,
                                    week: 0,
                                    month: 0,
                                    is_recurring: 0,
                                    meter_id: value.meter_id,
                                    meter: value.meter,
                                    reference: [value]
                                });
                                self.exArray.push({
                                    cells: [{
                                            value: kendo.toString(new Date(value.issued_date), "dd-MMMM-yyyy", "km-KH")
                                        },
                                        {
                                            value: self.getContactName(value.contact_id)
                                        },
                                        {
                                            value: value.number
                                        },
                                        {
                                            value: value.meter
                                        },
                                        {
                                            value: amount_due
                                        },
                                        {
                                            value: 0
                                        },
                                        {
                                            value: 0
                                        },
                                        {
                                            value: amount_due
                                        },
                                    ]
                                });
                                self.numCustomer += 1;
                            });
                            self.applyTerm();
                            self.setRate();
                            $("#loadING").css("display", "none");
                            self.set("downloadView", true);
                            self.set("btnActive", true);
                        } else {
                            var notifi = $("#ntf1").data("kendoNotification");
                            notifi.hide();
                            notifi.error(self.lang.lang.no_data);
                            $("#loadING").css("display", "none");
                        }
                        self.set("searchText", "");
                        self.set("contact_id", "");
                        self.set("invoice_id", 0);
                    });
                } else {
                    var notifi = $("#ntf1").data("kendoNotification");
                    notifi.hide();
                    notifi.error(this.lang.lang.field_required_message);
                }
            } else {
                var notifi = $("#ntf1").data("kendoNotification");
                notifi.hide();
                notifi.error(this.lang.lang.field_required_message);
            }
        },
        upArray: [],
        onSelected: function(e) {
            var files = e.files,
                self = this;
            var obj = this.get("obj");
            $('li.k-file').remove();
            $("#loadImport").css("display", "block");
            var reader = new FileReader();
            this.dataSource.data([]);
            reader.onload = function() {
                var data = reader.result;
                var result = {};
                var workbook = XLSX.read(data, {
                    type: 'binary'
                });
                workbook.SheetNames.forEach(function(sheetName) {
                    var roa = XLSX.utils.sheet_to_row_object_array(workbook.Sheets[sheetName]);
                    if (roa.length > 0) {
                        result[sheetName] = roa;
                        for (var i = 0; i < roa.length; i++) {
                            self.upArray.push(roa[i].Number);
                        }
                        self.insertDS(self.upArray);
                    }
                });
            }
            reader.readAsBinaryString(files[0].rawFile);
        },
        insertDS: function(NU) {
            $("#loadING").css("display", "block");
            this.dataSource.data([]);
            this.exArray = [];
            var self = this,
                para = [],
                obj = this.get("obj"),
                searchText = this.get("searchText"),
                invoice_id = this.get("invoice_id");
            para.push({
                field: "type",
                value: "Utility_Invoice"
            });
            para.push({
                field: "status",
                operator: "where_in",
                value: [0, 2]
            });
            para.push({
                field: "number",
                operator: "where_in",
                value: NU
            });
            this.txnDS.query({
                filter: para
            }).then(function() {
                var view = self.txnDS.view();
                if (view.length > 0) {
                    self.numCustomer = 0;
                    $.each(view, function(index, value) {
                        var amount_due = value.amount - (value.amount_paid + value.deposit);
                        self.dataSource.add({
                            transaction_template_id: 0,
                            contact_id: value.contact_id,
                            account_id: obj.account_id,
                            payment_term_id: value.payment_term_id,
                            payment_method_id: obj.payment_method_id,
                            reference_id: value.id,
                            user_id: self.get("user_id"),
                            check_no: value.check_no,
                            reference_no: value.number,
                            number: "",
                            invnumber: value.number,
                            type: "Cash_Receipt",
                            sub_total: amount_due,
                            amount: amount_due,
                            discount: 0,
                            fine: 0,
                            rate: value.rate,
                            locale: value.locale,
                            issued_date: obj.issued_date,
                            invissued_date: value.issued_date,
                            memo: obj.memo,
                            memo2: obj.memo2,
                            status: 0,
                            segments: obj.segments,
                            is_journal: 1,
                            location_id: obj.location_id,
                            recurring_name: "",
                            start_date: new Date(),
                            frequency: "Daily",
                            month_option: "Day",
                            interval: 1,
                            day: 1,
                            week: 0,
                            month: 0,
                            is_recurring: 0,
                            meter_id: value.meter_id,
                            meter: value.meter,
                            reference: [value]
                        });
                    });
                    self.applyTerm();
                    self.setRate();
                    $("#loadING").css("display", "none");
                } else {
                    var notifi = $("#ntf1").data("kendoNotification");
                    notifi.hide();
                    notifi.error(self.lang.lang.no_data);
                    $("#loadING").css("display", "none");
                }
                self.set("searchText", "");
                self.set("contact_id", "");
                self.set("invoice_id", 0);
            });
        },
        cashierSessionDS: dataStore(apiUrl + "cashier_sessions"),   
        updateSessionDS: dataStore(apiUrl + "cashier_sessions"),
        cashierItemDS: dataStore(apiUrl + "cashier_sessions/item"),
        sessionReceiveDS: dataStore(apiUrl + "cashier_sessions/receive"),
        CashierID: "",
        pageLoad: function(id) {
            var self = this;
            $("#loadING").css("display", "block");
            this.currencyDS.query({
                sort: {
                    field: "created_at",
                    dir: "asc"
                }
            }).then(function(e) {
                self.setCashierItems();
            });
            this.addEmpty();
            this.cashierSessionDS.query({
                filter: {
                    field: "status",
                    value: 0
                },
                limit: 1,
                sort: {
                    field: "id",
                    dir: "desc"
                }
            }).then(function(e) {
                var view = self.cashierSessionDS.view();
                if (view.length > 0) {
                    self.set("haveSession", true);
                    self.updateSessionDS.add({
                        id: view[0].id,
                        cashier_id: view[0].cashier_id,
                        start_date: view[0].start_date,
                        end_date: new Date(),
                        status: 1
                    });
                    $("#loadING").css("display", "none");
                    self.set("CashierID", view[0].id);
                    self.setReceive();
                } else {
                    self.set("haveSession", false);
                    self.updateSessionDS.data([]);
                    self.updateSessionDS.add({
                        cashier_id: banhji.userData.id,
                        start_date: new Date(),
                        end_date: "",
                        status: 0,
                        items: []
                    });
                    $("#loadING").css("display", "none");
                }
            });
        },
        setCashierItems: function() {
            var self = this;
            $.each(this.currencyDS.data(), function(i, v) {
                self.cashierItemDS.add({
                    cashier_session_id: "",
                    currency: v.code,
                    amount: 0,
                });
            });
        },
        endSession: function() {
            var self = this;
            this.updateSessionDS.data()[0].set("end_date", new Date());
            this.updateSessionDS.data()[0].set("status", 1);
            this.updateSessionDS.sync();
            this.updateSessionDS.bind("requestEnd", function(e) {
                if (e.response) {
                    self.set("haveSession", false);
                    self.pageLoad();
                }
            });
        },
        addSession: function() {
            var self = this;
            this.updateSessionDS.data()[0].set("items", this.cashierItemDS.data());
            this.updateSessionDS.sync();
            this.updateSessionDS.bind("requestEnd", function(e) {
                if (e.response) {
                    self.set("haveSession", true);
                    self.pageLoad();
                }
            });
        },
        loadInvoice: function(id) {
            this.set("invoice_id", id);
            this.search();
        },
        //Contact
        loadContact: function(id) {
            this.set("contact_id", id);
            this.search();
        },
        contactChanges: function() {
            this.search();
        },
        getContactName: function(id) {
            var raw = banhji.source.customerDS.get(id);
            if (raw) {
                return raw.name;
            } else {
                return "";
            }
        },
        //Payment Method
        issuedDateChanges: function() {
            this.applyTerm();
            this.setRate();
        },
        applyTerm: function() {
            var self = this,
                obj = this.get("obj"),
                today = new Date();
            $.each(this.dataSource.data(), function(index, value) {
                if (value.payment_term_id) {
                    value.payment_term_id = value.payment_term_id;
                } else {
                    value.payment_term_id = 5;
                }
                var term = self.paymentTermDS.get(value.payment_term_id),
                    termDate = new Date(value.reference[0].issued_date);
                term.discount_period
                termDate.setDate(termDate.getDate() + term.discount_period);
                if (today <= termDate) {
                    if (value.reference[0].amount_paid == 0) {
                        var amount = value.reference[0].amount * term.discount_percentage;
                        value.set("discount", amount);
                        value.set("amount", value.reference[0].amount - amount);
                    }
                }
            });
        },
        //Currency Rate
        setRate: function() {
            var obj = this.get("obj");
            $.each(this.dataSource.data(), function(index, value) {
                var rate = banhji.source.getRate(value.locale, new Date(obj.issued_date));
                value.set("rate", rate);
            });
            this.changes();
        },
        //Segments
        segmentChanges: function(e) {
            var dataArr = this.get("obj").segments,
                lastIndex = dataArr.length - 1,
                last = this.segmentItemDS.get(dataArr[lastIndex]);
            if (dataArr.length > 1) {
                for (var i = 0; i < dataArr.length - 1; i++) {
                    var current_index = dataArr[i],
                        current = this.segmentItemDS.get(current_index);
                    if (current.segment_id === last.segment_id) {
                        dataArr.splice(lastIndex, 1);
                        break;
                    }
                }
            }
        },
        btnActive: false,
        idList: [],
        haveFine: false,
        amountFine: false,
        searchSelect    : 1,
        searchSelectDS  : [
            {id: 1, name: "Invoice Number" },
            {id: 2, name: "Customer Name" },
            {id: 3, name: "Meter Number" }
        ],
        haveSearchInv       : true,
        haveSearchCus       : false,
        haveSearchMet       : false,
        changeSearchMethod  : function(e){
            if(this.get("searchSelect") == 1){
                this.set("haveSearchInv", true);
                this.set("haveSearchCus", false);
                this.set("haveSearchMet", false);
            }else if(this.get("searchSelect") == 2){
                this.set("haveSearchInv", false);
                this.set("haveSearchCus", true);
                this.set("haveSearchMet", false);
            }else if(this.get("searchSelect") == 3){
                this.set("haveSearchInv", false);
                this.set("haveSearchCus", false);
                this.set("haveSearchMet", true);
            }
        },
        customerDS              : dataStore(apiUrl + "contacts"),
        searchMeterDS           : dataStore(apiUrl + "utibills/meters"),
        onCustomerSearch        : function(e){
            this.search();
        },
        onMeterSearch           : function(e){
            this.search();
        },
        //Search
        search: function() {
            var self = this,
                para = [],
                obj = this.get("obj"),
                searchText = "";
            if(this.get("searchSelect") == 1){
                searchText = this.get("searchText");
                para.push({
                    field: "number",
                    value: searchText
                });
            }else if(this.get("searchSelect") == 2){
                console.log(this.get("selectedCustomer"));
                para.push({
                    field: "contact_id",
                    value: this.get("selectedCustomer")
                });
            }else if(this.get("searchSelect") == 3){
                para.push({
                    field: "meter_id",
                    value: this.get("selectedMeter")
                });
            }
            $("#loadING").css("display", "block");
            this.exArray = [];
            if (jQuery.inArray(searchText, this.idList) != -1) {
                alert("This Invoice already Included!");
                this.set("searchText", "");
                $("#loadING").css("display", "none");
            } else {
                this.txnDS.query({
                    filter: para,
                    page: 1,
                    pageSize: 100
                }).then(function() {
                    var view = self.txnDS.view();
                    if (view.length > 0) {
                        self.set("btnActive", false);
                        $.each(view, function(index, v) {
                            if (v.amount_fine > 0) {
                                self.set("haveFine", true);
                            }
                            if (jQuery.inArray(v.number, self.idList) != -1) {
                            }else{
                                var amount_due = (v.amount - (v.amount_paid + v.deposit)) + v.amount_fine;
                                self.dataSource.add({
                                    transaction_template_id: 0,
                                    contact_id: v.contact_id,
                                    contact_name: v.contact_name,
                                    account_id: obj.account_id,
                                    payment_term_id: v.payment_term_id,
                                    payment_method_id: obj.payment_method_id,
                                    reference_id: v.id,
                                    reference_no: v.number,
                                    due_date_fine: v.due_date,
                                    status_inv_fine: v.status,
                                    number: "",
                                    invnumber: v.number,
                                    type: "Cash_Receipt",
                                    sub_total: amount_due,
                                    amountshow: v.amount,
                                    amount: amount_due,
                                    discount: 0,
                                    fine: 0,
                                    rate: v.rate,
                                    locale: v.locale,
                                    issued_date: obj.issued_date,
                                    invissued_date: v.issued_date,
                                    memo: obj.memo,
                                    memo2: obj.memo2,
                                    status: 0,
                                    segments: obj.segments,
                                    is_journal: 1,
                                    location_id: v.location_id,
                                    pole_id: v.pole_id,
                                    box_id: v.box_id,
                                    meter_id: v.meter_id,
                                    reference_id: v.id,
                                    meter: v.meter,
                                    month_of: v.month_of,
                                    user_id: banhji.userData.id,
                                    amount_fine: v.amount_fine,
                                    session_id: self.get("CashierID")
                                });
                                self.idList.push(v.number);
                            }
                            $("#loadING").css("display", "none");
                        });
                        self.setRate();
                        self.set("btnActive", true);
                    } else {
                        var notifi = $("#ntf1").data("kendoNotification");
                        notifi.hide();
                        notifi.error(self.lang.lang.no_data);
                        $("#loadING").css("display", "none");
                    }
                    self.set("searchText", "");
                    self.set("selectedCustomer", "");
                    self.set("selectedMeter", "");
                });
            }
        },
        remainFind: function(meter_id) {
            var para = [],
                obj = this.get("obj"),
                self = this;
            para.push({
                field: "type",
                value: "Utility_Invoice"
            });
            para.push({
                field: "status",
                operator: "where_in",
                value: [0, 2]
            });
            para.push({
                field: "meter_id",
                value: meter_id
            });
            para.push({
                field: "deleted <>",
                value: 1
            });
            if (this.idList.length > 0) {
                $.each(this.idList, function(i, v) {
                    para.push({
                        field: "id",
                        operator: "where_not_in",
                        value: v
                    });
                });
            }
            this.remainDS.query({
                filter: para,
                page: 1,
                pageSize: 10
            }).then(function() {
                var view = self.remainDS.view();
                if (view.length > 0) {
                    $.each(view, function(index, value) {
                        var amount_due = value.amount - (value.amount_paid + value.deposit);
                        self.dataSource.add({
                            transaction_template_id: 0,
                            contact_id: value.contact_id,
                            account_id: obj.account_id,
                            payment_term_id: value.payment_term_id,
                            payment_method_id: obj.payment_method_id,
                            reference_id: value.id,
                            user_id: self.get("user_id"),
                            check_no: value.check_no,
                            reference_no: value.number,
                            number: "",
                            invnumber: value.number,
                            type: "Cash_Receipt",
                            sub_total: amount_due,
                            amount: amount_due,
                            discount: 0,
                            fine: 0,
                            rate: value.rate,
                            locale: value.locale,
                            issued_date: obj.issued_date,
                            invissued_date: value.issued_date,
                            memo: obj.memo,
                            memo2: obj.memo2,
                            status: 0,
                            segments: obj.segments,
                            is_journal: 1,
                            location_id: obj.location_id,
                            //Recurring
                            recurring_name: "",
                            start_date: new Date(),
                            frequency: "Daily",
                            month_option: "Day",
                            interval: 1,
                            day: 1,
                            week: 0,
                            month: 0,
                            is_recurring: 0,
                            meter_id: value.meter_id,
                            meter: value.meter,
                            reference: [value]
                        });
                    });
                    self.applyTerm();
                    self.setRate();
                    self.set("btnActive", true);
                }
                $("#loadING").css("display", "none");
            });
        },
        serachBalance: function() {
            var para = [],
                obj = this.get("obj"),
                self = this,
                bloc_id = this.get("locationSelect");
            para.push({
                field: "type",
                value: "Utility_Invoice"
            });
            para.push({
                field: "status",
                operator: "where_in",
                value: [0, 2]
            });
            para.push({
                field: "journal_type",
                value: "journal"
            });
            para.push({
                field: "location_id",
                value: bloc_id
            });
            para.push({
                field: "deleted <>",
                value: 1
            });
            this.dataSource.data([]);
            $("#loadING").css("display", "block");
            this.balanceDS.query({
                filter: para
            }).then(function() {
                var view = self.balanceDS.view();
                if (view.length > 0) {
                    $.each(view, function(index, value) {
                        var amount_due = value.amount - (value.amount_paid + value.deposit);
                        self.dataSource.add({
                            transaction_template_id: 0,
                            contact_id: value.contact_id,
                            account_id: obj.account_id,
                            payment_term_id: value.payment_term_id,
                            payment_method_id: obj.payment_method_id,
                            reference_id: value.id,
                            user_id: self.get("user_id"),
                            check_no: value.check_no,
                            reference_no: value.number,
                            number: "",
                            invnumber: value.number,
                            type: "Cash_Receipt",
                            sub_total: amount_due,
                            amount: amount_due,
                            discount: 0,
                            fine: 0,
                            rate: value.rate,
                            locale: value.locale,
                            issued_date: obj.issued_date,
                            invissued_date: value.issued_date,
                            memo: obj.memo,
                            memo2: obj.memo2,
                            status: 0,
                            segments: obj.segments,
                            is_journal: 1,
                            location_id: obj.location_id,
                            //Recurring
                            recurring_name: "",
                            start_date: new Date(),
                            frequency: "Daily",
                            month_option: "Day",
                            interval: 1,
                            day: 1,
                            week: 0,
                            month: 0,
                            is_recurring: 0,
                            meter_id: value.meter_id,
                            meter: value.meter,
                            reference: [value]
                        });
                    });
                    self.applyTerm();
                    self.setRate();
                    $("#loadING").css("display", "none");
                    self.set("btnActive", true);
                } else {
                    $("#loadING").css("display", "none");
                    var notifact = $("#ntf1").data("kendoNotification");
                    notifact.hide();
                    notifact.success(self.lang.lang.no_data);
                }
            });
        },
        ExportExcel: function() {
            if (this.exArray.length > 1) {
                $("#loadImport").css("display", "none");
                var workbook = new kendo.ooxml.Workbook({
                    sheets: [{
                        columns: [{
                                autoWidth: true
                            },
                            {
                                autoWidth: true
                            },
                            {
                                autoWidth: true
                            },
                            {
                                autoWidth: true
                            },
                            {
                                autoWidth: true
                            },
                            {
                                autoWidth: true
                            },
                            {
                                autoWidth: true
                            },
                            {
                                autoWidth: true
                            }
                        ],
                        title: "Receive",
                        rows: this.exArray
                    }]
                });
                //save the file as Excel file with extension xlsx
                kendo.saveAs({
                    dataURI: workbook.toDataURL(),
                    fileName: "Receive.xlsx"
                });
            }
        },
        //Obj
        loadObj: function(id) {
            var self = this;
            this.dataSource.query({
                filter: {
                    field: "id",
                    value: id
                },
                page: 1,
                pageSize: 100
            }).then(function() {
                var view = self.dataSource.view();
                view[0].set("reference", []);
                self.set("obj", view[0]);
                self.set("total", kendo.toString(view[0].amount, view[0].locale == "km-KH" ? "c0" : "c", view[0].locale));
                self.set("total_received", kendo.toString(view[0].amount, view[0].locale == "km-KH" ? "c0" : "c", view[0].locale));
                self.journalLineDS.filter({
                    field: "transaction_id",
                    value: id
                });
                self.txnDS.query({
                    filter: {
                        field: "id",
                        value: view[0].reference_id
                    }
                }).then(function() {
                    var txn = self.txnDS.view(),
                        obj = self.get("obj");
                    obj.set("reference", txn);
                });
            });
        },
        amountReceive: 0,
        oldAmountR: 0,
        changes: function() {
            var self = this,
                obj = this.get("obj"),
                total = 0,
                sub_total = 0,
                discount = 0,
                total_received = 0,
                remaining = 0,
                amountFine = 0;
            $.each(this.dataSource.data(), function(index, value) {
                var amt = kendo.parseFloat(value.sub_total) - kendo.parseFloat(value.discount);
                if (kendo.parseFloat(value.amount) > amt) {
                    value.set("amount", amt);
                }
                sub_total += kendo.parseFloat(value.sub_total) / value.rate;
                discount += kendo.parseFloat(value.discount) / value.rate;
                total_received += kendo.parseFloat(value.amount) / value.rate;
                if(banhji.institute.id != 860){
                    amountFine += kendo.parseFloat(value.amount_fine);
                }else{
                    if(value.status_inv_fine == 0){
                        self.checkFineBKK(value.due_date_fine,value.amountshow);
                    }
                }
                self.set("oldAmountR", value.amount_fine);
            });
            total = sub_total - discount;
            remaining = total - total_received;
            obj.set("sub_total", sub_total);
            obj.set("discount", discount);
            this.set("total", kendo.toString(total, banhji.locale == "km-KH" ? "c0" : "c", banhji.locale));
            if(banhji.institute.id != 860){
                this.set("amountFine", kendo.toString(amountFine, banhji.locale == "km-KH" ? "c0" : "c", banhji.locale));
            }
            this.set("total_received", kendo.toString(total_received, banhji.locale == "km-KH" ? "c0" : "c", banhji.locale));
            obj.set("remaining", remaining);
            this.set("amountReceive", total_received)
            this.setDefaultReceiptCurrency(total_received);
        },
        bkkFineAmount: 0,
        checkFineBKK: function(DUEDATE, AMOUNT){
            var chDATE = this.daysBetween(new Date(DUEDATE), new Date("<?php echo date('Y-m-d'); ?>"));
            if(chDATE > 30){

            }else if(chDATE > 0){
                var tmpABKK = AMOUNT * 0.01;
                var oAfine = this.get("oldAmountR");
                if(tmpABKK > 0){
                    this.set("amountFine", kendo.toString(oAfine + (chDATE * tmpABKK), banhji.locale == "km-KH" ? "c0" : "c", banhji.locale));
                    this.set("haveFine", true);
                }
            }
        },
        treatAsUTC: function(date) {
            var result = new Date(date);
            result.setMinutes(result.getMinutes() - result.getTimezoneOffset());
            return result;
        },
        daysBetween: function(startDate, endDate) {
            var millisecondsPerDay = 24 * 60 * 60 * 1000;
            return (this.treatAsUTC(endDate) - this.treatAsUTC(startDate)) / millisecondsPerDay;
        },
        removeRow: function(e) {
            var self = this;
            this.dataSource.remove(e.data);
            this.changes();
            var i = 0;
            var j = "";
            $.each(this.idList, function(i, v) {
                if (v == e.data.invnumber) {
                    j = i;
                }
                i++;
            });
            this.idList.splice(j, 1);
        },
        addEmpty: function() {
            this.dataSource.data([]);
            this.txnDS.data([]);
            this.journalLineDS.data([]);
            this.set("isEdit", false);
            this.set("obj", null);
            this.set("total", 0);
            this.set("amountFine", 0);
            this.set("haveFine", false);
            this.idList = [];
            this.set("total_received", 0);
            this.set("obj", {
                transaction_template_id: 6,
                account_id: 7,
                payment_method_id: 1,
                rate: 1,
                sub_total: 0,
                discount: 0,
                remaining: 0,
                locale: banhji.locale,
                issued_date: new Date(),
                memo: "",
                memo2: "",
                segments: []
            });
        },
        objSync: function() {
            var dfd = $.Deferred();
            this.dataSource.sync();
            this.dataSource.bind("requestEnd", function(e) {
                if (e.response) {
                    dfd.resolve(e.response.results);
                }
            });
            this.dataSource.bind("error", function(e) {
                dfd.reject(e.errorThrown);
            });
            return dfd;
        },
        save: function() {
            var self = this,
                obj = this.get("obj");
            this.set("btnActive", false);
            $("#loadING").css("display", "block");
            //Add brand new transaction
            $.each(this.dataSource.data(), function(index, value) {
                value.set("transaction_template_id", obj.transaction_template_id);
                value.set("account_id", obj.account_id);
                value.set("payment_method_id", obj.payment_method_id);
                value.set("issued_date", kendo.toString(new Date(obj.issued_date), "s"));
                value.set("memo", obj.memo);
                value.set("memo2", obj.memo2);
                value.set("segments", obj.segments);
            });
            //Obj
            this.objSync()
                .then(function(data) {
                    self.setReceive();
                    return data;
                }, function(reason) { //Error
                    $("#ntf1").data("kendoNotification").error(reason);
                }).then(function(result) {
                    var notifact = $("#ntf1").data("kendoNotification");
                    notifact.hide();
                    notifact.success(banhji.source.successMessage);
                    //Save New
                    self.addEmpty();
                    self.set("btnActive", false);
                    $("#loadING").css("display", "none");
                });
            this.receipCurrencyDS.sync();
            this.receipChangeDS.sync();
        },
        receiveDS: dataStore(apiUrl + "cashier_sessions/total_receive"),
        setReceive: function() {
            var self = this;
            this.receiveDS.query({
                filter: {
                    field: "cashier_session_id",
                    value: this.get("CashierID")
                }
            }).then(function(e) {
                var view = self.receiveDS.view();
                self.set("numCustomer", view[0].total_contact);
                self.set("paymentReceiptToday", view[0].total_amount);
            });
        },
        setDefaultReceiptCurrency: function(firstReceipt) {
            var self = this,
                FR = firstReceipt;
            this.receipCurrencyDS.data([]);
            var j = 1;
            $.each(this.currencyDS.data(), function(i, v) {
                if (j == 1) {
                    self.receipCurrencyDS.add({
                        cashier_session_id: self.get("CashierID"),
                        type: 0,
                        currency: v.code,
                        locale: v.locale,
                        rate: v.rate,
                        amount: FR
                    });
                } else {
                    self.receipCurrencyDS.add({
                        cashier_session_id: self.get("CashierID"),
                        type: 0,
                        currency: v.code,
                        locale: v.locale,
                        rate: v.rate,
                        amount: 0
                    });
                }
                j++;
            });
        },
        haveChangeMoney: false,
        checkChange: function(e) {
            var data = e.data;
            if (data.amount === undefined || data.amount === null) {
                var index = this.receipCurrencyDS.indexOf(data);
                alert(this.lang.lang.error_input);
                this.receipCurrencyDS.data()[index].set("amount", 0);
            } else {
                var self = this;
                var currencyReceipt = 0;
                var moneyReceipt = parseFloat(this.get("amountReceive"));
                $.each(this.receipCurrencyDS.data(), function(i, v) {
                    var amountAfterRate = parseFloat(v.amount) / parseFloat(v.rate);
                    currencyReceipt += amountAfterRate;
                });
                var changeAmount = parseFloat(currencyReceipt) - moneyReceipt;
                if (currencyReceipt > moneyReceipt) {
                    this.setDefaultChangeCurrency(changeAmount);
                    this.set("haveChangeMoney", true);
                } else {
                    this.set("haveChangeMoney", false);
                }
            }
        },
        receipCurrencyDS: dataStore(apiUrl + "cashier_sessions/currency"),
        receipChangeDS: dataStore(apiUrl + "cashier_sessions/currency"),
        changeMoney: 0,
        setDefaultChangeCurrency: function(firstReceipt) {
            var self = this,
                FR = firstReceipt;
            this.set("changeMoney", FR);
            this.receipChangeDS.data([]);
            var j = 1;
            $.each(this.currencyDS.data(), function(i, v) {
                if (j == 1) {
                    self.receipChangeDS.add({
                        cashier_session_id: self.get("CashierID"),
                        type: 1,
                        currency: v.code,
                        locale: v.locale,
                        rate: v.rate,
                        amount: FR
                    });
                } else {
                    self.receipChangeDS.add({
                        cashier_session_id: self.get("CashierID"),
                        type: 1,
                        currency: v.code,
                        locale: v.locale,
                        rate: v.rate,
                        amount: 0
                    });
                }
                j++;
            });
        },
        tmpChangeMoney: 0,
        checkChangeMoney: function(e) {
            var data = e.data;
            var currentAmountChange = data.amount / parseFloat(data.rate);
            var changeMoney = 0;
            var currencyReceipt = 0;
            if (data.amount === undefined || data.amount === null) {
                var index = this.receipChangeDS.indexOf(data);
                alert(this.lang.lang.error_input);
                this.receipChangeDS.data()[index].set("amount", 0);
            } else {
                if (this.get("tmpChangeMoney") == 0) {
                    changeMoney = parseFloat(this.get("changeMoney"));
                } else {
                    changeMoney = this.get("tmpChangeMoney");
                }
                if (currentAmountChange < this.receipChangeDS.data()[0].amount) {
                    var firstAmountChagne = changeMoney - currentAmountChange;
                    this.receipChangeDS.data()[0].set("amount", firstAmountChagne);
                    this.set("tmpChangeMoney", firstAmountChagne);
                } else {
                    var index = this.receipChangeDS.indexOf(data);
                    alert(this.lang.lang.error_input);
                    this.receipChangeDS.data()[index].set("amount", 0);
                }
            }
            this.recheckChangeMoney();
        },
        recheckChangeMoney: function() {
            var allChangeMoney = 0,
                totalChangeMoney = 0;
            $.each(this.receipChangeDS.data(), function(i, v) {
                var amountAfterRate = parseFloat(v.amount) / parseFloat(v.rate);
                allChangeMoney += amountAfterRate;
            });
            if (allChangeMoney > this.get("changeMoney")) {
                totalChangeMoney = allChangeMoney - this.get("changeMoney");
                var AMOUNT = this.receipChangeDS.data()[0].amount;
                this.receipChangeDS.data()[0].set("amount", AMOUNT - totalChangeMoney);
            } else {
                totalChangeMoney = this.get("changeMoney") - allChangeMoney;
                var AMOUNT = this.receipChangeDS.data()[0].amount;
                this.receipChangeDS.data()[0].set("amount", AMOUNT + totalChangeMoney);
            }
        },
        cancel: function() {
            this.dataSource.data([]);
            window.history.back();
        }
    });

    banhji.searchAdvanced = kendo.observable({
        lang                : langVM,
        contactDS           : dataStore(apiUrl+"contacts"),
        contactTypeDS       : dataStore(apiUrl+"contacts/type"),
        transactionDS       : dataStore(apiUrl+"transactions"),
        itemDS              : dataStore(apiUrl+"items"),
        accountDS           : dataStore(apiUrl+"accounts"),
        searchType          : "",
        searchText          : "",
        found               : 0,
        pageLoad            : function(){
        },
        search              : function(){
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
        selectedContact     : function(e){
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
        selectedItem        : function(e){
            e.preventDefault();

            var data = e.data;
            banhji.router.navigate('/item_center/'+e.data.id);
        },
        selectedAccount         : function(e){
            e.preventDefault();

            var data = e.data;
            banhji.router.navigate('/accounting_center/'+e.data.id);
        }
    });

    banhji.saleCenter = kendo.observable({
        lang                : langVM,
        transactionDS       : dataStore(apiUrl + 'transactions'),
        contactDS           : new kendo.data.DataSource({
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
            filter:{ field:"assignee_id", operator:"by_user_id", value:banhji.source.user_id },
            sort:{ field:"number", dir:"asc" },
            batch: true,
            serverFiltering: true,
            serverSorting: true,
            serverPaging: true,
            page:1,
            pageSize: 100
        }),
        contactTypeDS       : new kendo.data.DataSource({
            data: banhji.source.contactTypeList,
            filter: { field:"parent_id", value: 1 }//Customer
        }),
        noteDS              : dataStore(apiUrl + 'notes'),
        attachmentDS        : dataStore(apiUrl + "attachments"),
        summaryDS           : dataStore(apiUrl + "transactions"),
        txnDS               : dataStore(apiUrl + "transactions"),
        sortList            : banhji.source.sortList,
        sorter              : "all",
        sdate               : "",
        edate               : "",
        obj                 : {id:0},
        note                : "",
        searchText          : "",
        contact_type_id     : null,
        currency_id         : 0,
        quote               : 0,
        so                  : 0,
        currencyCode        : "",
        pageLoad            : function(id){
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
        setCurrencyCode     : function(){
            var code = "", obj = this.get("obj");

            $.each(banhji.source.currencyDS.data(), function(index, value){             
                if(value.locale == obj.locale){
                    code = value.code;                  

                    return false;                   
                }
            });

            this.set("currencyCode", code);
        },
        loadObj             : function(id){
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
        loadData            : function(){
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
        onSelect            : function(e){
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
                            user_id         : self.get("user_id"),
                            contact_id      : obj.id,
                            type            : "Contact",
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
            }
        },
        removeFile          : function(e){
            var data = e.data;

            if (confirm(banhji.source.confirmMessage)) {
                this.attachmentDS.remove(data);
                this.attachmentDS.sync();
            }           
        },
        uploadFile          : function(){
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
        loadContact         : function(id){
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
        loadSummary         : function(id){
            var self = this, obj = this.get("obj");

            this.summaryDS.query({
                filter: [
                    { field:"contact_id", value: obj.id },
                    { field:"type", operator:"where_in", value: ["Quote","Sale_Order"] },
                    { field:"status", value: 0 }
                ],
                sort: { field: "issued_date", dir: "desc" },
                page: 1,
                pageSize: 1000
            }).then(function(){
                var view = self.summaryDS.view(),
                quote = 0, so = 0;

                $.each(view, function(index, value){
                    if(value.type=="Quote"){
                        quote++;
                    }else{
                        so++;
                    }                                   
                });
                
                self.set("quote", kendo.toString(quote, "n0"));
                self.set("so", kendo.toString(so, "n0"));
            });
        },
        loadQuote           : function(){
            var obj = this.get("obj");

            this.transactionDS.query({
                filter: [
                    { field:"contact_id", value: obj.id },
                    { field:"type", value:"Quote" },
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
        loadSO              : function(){
            var obj = this.get("obj");

            this.transactionDS.query({
                filter: [
                    { field:"contact_id", value: obj.id },
                    { field:"type", value:"Sale_Order" }
                ],
                sort: [
                    { field: "issued_date", dir: "desc" },
                    { field: "id", dir: "desc" }
                ],
                page: 1,
                pageSize: 10
            });
        },
        selectedRow         : function(e){
            var data = e.data;
            
            this.set("obj", data);
            this.loadData();
        },
        //Search
        search              : function(){
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
        searchTransaction   : function(){
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
                para.push({ field:"type", operator:"where_in", value: ["Quote","Sale_Order","Customer_Deposit"] });

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
        goEdit              : function(){
            var obj = this.get("obj");

            if(obj!==null){
                banhji.router.navigate('/customer/'+obj.id);
            }
        },
        goReference         : function(e){
            var self = this, data = e.data;

            this.txnDS.query({
                filter:{ field:"id", value:data.reference_id}
            }).then(function(){
                var view = self.txnDS.view();

                banhji.router.navigate('/' + view[0].type.toLowerCase() +'/'+ data.reference_id);
            });
        },
        goQuote             : function(){
            var obj = this.get("obj");

            if(obj!==null){
                banhji.router.navigate('/quote');
                banhji.quote.setContact(obj);
            }
        },
        goDeposit           : function(){
            var obj = this.get("obj");

            if(obj!==null){
                banhji.router.navigate('/customer_deposit');
                banhji.customerDeposit.setContact(obj);
            }
        },
        goSaleOrder         : function(){
            var obj = this.get("obj");

            if(obj!==null){
                banhji.router.navigate('/sale_order');
                banhji.saleOrder.setContact(obj);
            }
        },
        //Note
        saveNoteEnter       : function(e){
            e.preventDefault();
            this.saveNote();
        },
        saveNote            : function(){
            var obj = this.get("obj");

            if(obj!==null && this.get("note")!==""){
                this.noteDS.insert(0, {
                    contact_id  : obj.id,
                    note        : this.get("note"),
                    noted_date  : new Date(),
                    created_by  : this.get("user_id"),

                    creator     : ""
                });

                this.noteDS.sync();
                this.set("note", "");                   
            }else{
                alert("Please select a customer and Memo is required");
            }
        }
    });
    banhji.customer = kendo.observable({
        lang                    : langVM,
        dataSource              : dataStore(apiUrl + "contacts"),
        patternDS               : dataStore(apiUrl + "contacts"),
        numberDS                : dataStore(apiUrl + "contacts"),
        deleteDS                : dataStore(apiUrl + "transactions"),
        existingDS              : dataStore(apiUrl + "contacts"),
        contactPersonDS         : dataStore(apiUrl + "contact_persons"),
        contactAssigneeDS       : dataStore(apiUrl + "contact_assignees"),
        paymentTermDS           : banhji.source.paymentTermDS,
        paymentMethodDS         : banhji.source.paymentMethodDS,
        countryDS               : banhji.source.countryDS,
        currencyDS              : new kendo.data.DataSource({
            data: banhji.source.currencyList,
            filter: { field:"status", value: 1 }
        }),
        contactTypeDS           : new kendo.data.DataSource({
            data: banhji.source.contactTypeList,
            filter: { field:"parent_id", value: 1 }//Customer
        }),
        arDS                    : new kendo.data.DataSource({
            data: banhji.source.accountList,
            filter: { field:"account_type_id", value: 12 },
            sort: { field:"number", dir:"asc" }
        }),
        raDS                    : new kendo.data.DataSource({
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
        depositDS               : new kendo.data.DataSource({
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
        tradeDiscountDS         : new kendo.data.DataSource({
            data: banhji.source.accountList,
            filter: { field:"id", value: 72 },
            sort: { field:"number", dir:"asc" }
        }),
        settlementDiscountDS    : new kendo.data.DataSource({
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
        taxItemDS               : new kendo.data.DataSource({
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
        genders                 : banhji.source.genderList,
        statusList              : banhji.source.statusList,
        confirmMessage          : banhji.source.confirmMessage,
        isEdit                  : false,
        isProtected             : false,
        obj                     : null,
        saveClose               : false,
        showConfirm             : false,
        notDuplicateNumber      : true,
        phFullname              : "Customer Name ...",
        contact_type_id         : 0,
        pageLoad                : function(id, contact_type_id){
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
        addEmptyContactPerson   : function(){
            var obj = this.get("obj");
            
            this.contactPersonDS.add({
                contact_id          : obj.id,
                prefix              : "",
                name                : "",
                department          : "",
                phone               : "",
                email               : ""
            });
        },
        deleteContactPerson     : function(e){
            if (confirm("Are you sure, you want to delete it?")) {
                var d = e.data,
                obj = this.contactPersonDS.getByUid(d.uid);

                this.contactPersonDS.remove(obj);
            }
        },
        //Map
        loadMap                 : function(){
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
        copyBillTo              : function(){
            var obj = this.get("obj");

            obj.set("ship_to", obj.bill_to);
        },
        //Number        
        checkExistingNumber     : function(){
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
        generateNumber          : function(){
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
        checkExistingTxn        : function(){
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
        loadObj                 : function(id, contact_type_id){
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
        addEmpty                : function(){
            this.dataSource.data([]);
            this.contactPersonDS.data([]);
            
            this.set("isEdit", false);
            this.set("isProtected", false);
            this.set("notDuplicateNumber", true);
            this.set("obj", null);
            
            this.dataSource.insert(0, {
                "country_id"            : 0,
                "user_id"               : 0,
                "contact_type_id"       : 4, //General Customer
                "abbr"                  : "",
                "number"                : "",
                "surname"               : "",
                "name"                  : "",
                "gender"                : "",
                "phone"                 : "",
                "email"                 : "",
                "company"               : "",
                "vat_no"                : "",
                "memo"                  : "",
                "city"                  : "",
                "post_code"             : "",
                "address"               : "",
                "bill_to"               : "",
                "ship_to"               : "",
                "latitute"              : "",
                "longtitute"            : "",
                "credit_limit"          : 0,
                "locale"                : banhji.locale,
                "invoice_note"          : "",
                "payment_term_id"       : 0,
                "payment_method_id"     : 0,
                "registered_date"       : new Date(),
                "account_id"            : 0,
                "ra_id"                 : 0,
                "tax_item_id"           : 0,
                "deposit_account_id"    : 0,
                "trade_discount_id"     : 0,
                "settlement_discount_id": 0,
                "is_pattern"            : 0,
                "status"                : 1
            });

            var obj = this.dataSource.at(0);
            this.set("obj", obj);
            this.typeChanges();
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
        cancel                  : function(){
            this.dataSource.cancelChanges();
            this.contactPersonDS.cancelChanges();
            this.dataSource.data([]);
            this.contactPersonDS.data([]);
            this.set("contact_type_id", 0);

            banhji.userManagement.removeMultiTask("customer");
        },
        delete                  : function(){
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
        openConfirm             : function(){
            this.set("showConfirm", true);
        },
        closeConfirm            : function(){
            this.set("showConfirm", false);
        },
        //Assignee
        addAssignee             : function(id){
            var self = this, 
                employee = banhji.source.get("employee");

            this.contactAssigneeDS.add({
                "assignee_id"   : employee.id,
                "contact_id"    : id
            });

            this.contactAssigneeDS.sync();
            this.contactAssigneeDS.bind("requestEnd", function(e){
                if(e.type=="create"){
                    self.contactAssigneeDS.data([]);
                }
            });
        },
        //Pattern
        typeChanges             : function(){
            var obj = this.get("obj");

            if(obj.contact_type_id && obj.isNew()){
                this.applyPattern();
                this.generateNumber();
            }
        },
        applyPattern            : function(){
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
        lang                : langVM,
        dataSource          : dataStore(apiUrl + "transactions"),
        lineDS              : dataStore(apiUrl + "item_lines"),
        assemblyLineDS      : dataStore(apiUrl + "item_lines"),
        recurringDS         : dataStore(apiUrl + "transactions"),
        recurringLineDS     : dataStore(apiUrl + "item_lines"),
        txnDS               : dataStore(apiUrl + "transactions"),
        balanceDS           : dataStore(apiUrl + "transactions/balance"),
        attachmentDS        : dataStore(apiUrl + "attachments"),
        assemblyDS          : dataStore(apiUrl + "item_prices"),
        wacDS               : dataStore(apiUrl + "items/weighted_average_costing"),
        jobDS               : new kendo.data.DataSource({
            data: banhji.source.jobList,
            sort: { field: "name", dir: "asc" }
        }),
        segmentItemDS       : new kendo.data.DataSource({
            data: banhji.source.segmentItemList,
            sort: [
                { field: "segment_id", dir: "asc" },
                { field: "code", dir: "asc" }
            ]
        }),
        txnTemplateDS       : new kendo.data.DataSource({
            data: banhji.source.txnTemplateList,
            filter:{ field: "type", value: "Quote" }
        }),
        contactDS           : banhji.source.customerDS,
        paymentTermDS       : banhji.source.paymentTermDS,
        statusObj           : banhji.source.statusObj,      
        amtDueColor         : banhji.source.amtDueColor,
        confirmMessage      : banhji.source.confirmMessage,
        frequencyList       : banhji.source.frequencyList,
        monthOptionList     : banhji.source.monthOptionList,
        monthList           : banhji.source.monthList,
        weekDayList         : banhji.source.weekDayList,
        dayList             : banhji.source.dayList,
        showMonthOption     : false,
        showMonth           : false,
        showWeek            : false,
        showDay             : false,
        obj                 : null,
        isEdit              : false,
        saveDraft           : false,
        saveClose           : false,
        savePrint           : false,
        saveRecurring       : false,
        showConfirm         : false,
        notDuplicateNumber  : true,
        recurring           : "",
        recurring_validate  : false,
        balance             : 0,
        total               : 0,
        user_id             : banhji.source.user_id,
        pageLoad            : function(id){
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
        onSelect            : function(e){
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
        removeFile          : function(e){
            var data = e.data;

            if (confirm(banhji.source.confirmMessage)) {
                this.attachmentDS.remove(data);
            }
        },
        uploadFile          : function(){
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
        setContact          : function(contact){
            var obj = this.get("obj");

            obj.set("contact", contact);
            this.contactChanges();
        },
        contactChanges      : function(){
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
        loadBalance         : function(){
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
        setRate             : function(){
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
        setTerm             : function(){
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
        segmentChanges      : function(e) {
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
        addItem             : function(uid){
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
                        measurement_id  : view[0].measurement_id,
                        price           : kendo.parseFloat(view[0].price),
                        conversion_ratio: view[0].conversion_ratio, 
                        measurement     : view[0].measurement 
                    };
                    row.set("measurement", measurement);
                }
            });
        },
        addItemCatalog      : function(uid){
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
                        cost                : catalogItem.cost * rate,
                        price               : 0,
                        amount              : 0,
                        discount            : 0,
                        rate                : rate,
                        locale              : catalogItem.locale,
                        movement            : 0,

                        discount_percentage : 0,
                        item                : catalogItem,
                        measurement         : { measurement_id:"", measurement:"" },
                        tax_item            : { id:"", name:"" }
                    });
                }
            });
        },
        addItemAssembly     : function(uid){
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
                            transaction_id      : obj.id,
                            item_id             : value.item_id,
                            assembly_id         : value.assembly_id,
                            measurement_id      : value.measurement_id,
                            description         : itemAssembly.sale_description,
                            quantity            : value.quantity,
                            conversion_ratio    : value.conversion_ratio,
                            cost                : itemAssembly.cost * rate,
                            price               : value.price * itemAssemblyRate,
                            amount              : value.price * itemAssemblyRate,
                            rate                : itemAssemblyRate,
                            locale              : value.locale,
                            movement            : 0,

                            item                : itemAssembly
                        });
                    });
                });
            }else{
                alert("Duplicate Item Assembly!");
                row.set("item_id", 0);
                row.set("item", { id:"", name:"" });
            }
        },
        changes             : function(){
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
        lineDSChanges       : function(arg){
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
        generateNumber          : function(){
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
        setStatus           : function(){
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
        loadObj             : function(id){
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
        addEmpty            : function(){
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
                contact_id          : "",
                transaction_template_id : 1,
                payment_term_id     : 0,
                reference_id        : "",
                recurring_id        : "",
                job_id              : 0,
                user_id             : this.get("user_id"),
                employee_id         : banhji.source.get("employee").id,
                type                : "Quote",//Required
                number              : "",
                sub_total           : 0,
                amount              : 0,
                credit_allowed      : 0,
                discount            : 0,
                tax                 : 0,
                rate                : 1,
                locale              : banhji.locale,
                issued_date         : new Date(),
                due_date            : duedate,
                bill_to             : "",
                ship_to             : "",
                memo                : "",
                memo2               : "",
                status              : 0,
                segments            : [],
                //Recurring
                recurring_name      : "",
                start_date          : new Date(),
                frequency           : "Daily",
                month_option        : "Day",
                interval            : 1,
                day                 : 1,
                week                : 0,
                month               : 0,
                is_recurring        : 0,

                contact             : { id:"", name:"" }
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
        addRow              : function(){
            var obj = this.get("obj");

            this.lineDS.add({
                transaction_id      : obj.id,
                tax_item_id         : "",
                item_id             : "",
                assembly_id         : 0,
                measurement_id      : 0,
                description         : "",
                quantity            : 1,
                conversion_ratio    : 0,
                cost                : 0,
                price               : 0,
                amount              : 0,
                discount            : 0,
                rate                : obj.rate,
                locale              : obj.locale,
                movement            : 0,

                discount_percentage : 0,
                item                : { id:"", name:"" },
                measurement         : { measurement_id:"", measurement:"" },
                tax_item            : { id:"", name:"" }
            });
        },
        addExtraRow         : function(uid){
            var row = this.lineDS.getByUid(uid),
                index = this.lineDS.indexOf(row);

            if(index==this.lineDS.total()-1){
                this.addRow();
            }
        },
        removeEmptyRow      : function(){
            var raw = this.lineDS.data();
            var item, i;
            for(i=raw.length-1; i>=0; i--){
                item = raw[i];

                if (item.item_id==0) {
                    this.lineDS.remove(item);
                }
            }
        },
        removeRow           : function(e){
            var data = e.data;
            if(this.lineDS.total()>1){
                this.lineDS.remove(data);
                this.changes();
            }
        },
        objSync             : function(){
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
        save                : function(){
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
        clear               : function(){
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
        cancel              : function(){
            this.clear();
            window.history.back();
        },
        delete              : function(){
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
        openConfirm         : function(){
            this.set("showConfirm", true);
        },
        closeConfirm        : function(){
            this.set("showConfirm", false);
        },
        validating          : function(){
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
        loadRecurring       : function(id){
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
                        transaction_id      : 0,
                        tax_item_id         : value.tax_item_id,
                        item_id             : value.item_id,
                        measurement_id      : value.measurement_id,
                        description         : value.description,
                        quantity            : value.quantity,
                        cost                : value.cost,
                        price               : value.price,
                        amount              : value.amount,
                        discount            : value.discount,
                        rate                : value.rate,
                        locale              : value.locale,
                        movement            : 0,

                        item                : value.item,
                        measurement         : value.measurement,
                        tax_item            : value.tax_item
                    });
                });

                self.changes();
            });
        },
        frequencyChanges    : function(){
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
        monthOptionChanges  : function(){
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
        recurringSync       : function(){
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
        lang                : langVM,
        dataSource          : dataStore(apiUrl + "transactions"),
        poDS                : dataStore(apiUrl + "transactions/with_line"),
        txnDS               : dataStore(apiUrl + "transactions"),
        lineDS              : dataStore(apiUrl + "item_lines"),
        assemblyLineDS      : dataStore(apiUrl + "item_lines"),
        recurringDS         : dataStore(apiUrl + "transactions"),
        recurringLineDS     : dataStore(apiUrl + "item_lines"),
        referenceDS         : dataStore(apiUrl + "transactions"),
        referenceLineDS     : dataStore(apiUrl + "item_lines"),
        balanceDS           : dataStore(apiUrl + "transactions/balance"),
        attachmentDS        : dataStore(apiUrl + "attachments"),
        assemblyDS          : dataStore(apiUrl + "item_prices"),
        txnTemplateDS       : new kendo.data.DataSource({
            data: banhji.source.txnTemplateList,
            filter:{ field: "type", value: "Sale_Order" }
        }),
        jobDS               : new kendo.data.DataSource({
            data: banhji.source.jobList,
            sort: { field: "name", dir: "asc" }
        }),
        segmentItemDS       : new kendo.data.DataSource({
            data: banhji.source.segmentItemList,
            sort: [
                { field: "segment_id", dir: "asc" },
                { field: "code", dir: "asc" }
            ]
        }),
        contactDS           : banhji.source.customerDS,
        statusObj           : banhji.source.statusObj,
        amtDueColor         : banhji.source.amtDueColor,
        confirmMessage      : banhji.source.confirmMessage,
        frequencyList       : banhji.source.frequencyList,
        monthOptionList     : banhji.source.monthOptionList,
        monthList           : banhji.source.monthList,
        weekDayList         : banhji.source.weekDayList,
        dayList             : banhji.source.dayList,
        showMonthOption     : false,
        showMonth           : false,
        showWeek            : false,
        showDay             : false,
        obj                 : null,
        isEdit              : false,
        saveDraft           : false,
        saveClose           : false,
        savePrint           : false,
        saveRecurring       : false,
        showConfirm         : false,
        notDuplicateNumber  : true,
        recurring           : "",
        recurring_validate  : false,
        enableRef           : false,
        balance             : 0,
        total               : 0,
        user_id             : banhji.source.user_id,
        pageLoad            : function(id){
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
        onSelect            : function(e){
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
        removeFile          : function(e){
            var data = e.data;

            if (confirm(banhji.source.confirmMessage)) {
                this.attachmentDS.remove(data);
            }           
        },
        uploadFile          : function(){
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
        setContact          : function(contact){
            var obj = this.get("obj");

            obj.set("contact", contact);
            this.contactChanges();
        },
        contactChanges      : function(){
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
        loadBalance         : function(){
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
        setRate             : function(){
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
        segmentChanges      : function(e) {
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
        addItem             : function(uid){
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
                        measurement_id  : view[0].measurement_id,
                        price           : kendo.parseFloat(view[0].price),
                        conversion_ratio: view[0].conversion_ratio, 
                        measurement     : view[0].measurement 
                    };
                    row.set("measurement", measurement);
                }
            });
        },
        addItemCatalog      : function(uid){
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
                        cost                : catalogItem.cost * rate,
                        price               : 0,
                        amount              : 0,
                        discount            : 0,
                        rate                : rate,
                        locale              : catalogItem.locale,
                        movement            : 0,

                        discount_percentage : 0,
                        item                : catalogItem,
                        measurement         : { measurement_id:"", measurement:"" },
                        tax_item            : { id:"", name:"" }
                    });
                }
            });
        },
        addItemAssembly     : function(uid){
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
                            transaction_id      : obj.id,
                            item_id             : value.item_id,
                            assembly_id         : value.assembly_id,
                            measurement_id      : value.measurement_id,
                            description         : itemAssembly.sale_description,
                            quantity            : value.quantity,
                            conversion_ratio    : value.conversion_ratio,
                            cost                : itemAssembly.cost * rate,
                            price               : value.price * itemAssemblyRate,
                            amount              : value.price * itemAssemblyRate,
                            rate                : itemAssemblyRate,
                            locale              : value.locale,
                            movement            : 0,

                            item                : itemAssembly
                        });
                    });
                });
            }else{
                alert("Duplicate Item Assembly!");
                row.set("item_id", 0);
                row.set("item", { id:"", name:"" });
            }
        },
        changes             : function(){
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
        lineDSChanges       : function(arg){
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
        generateNumber          : function(){
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
        setStatus           : function(){
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
        addPO               : function(id){
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
                            transaction_id      : 0,
                            tax_item_id         : value.tax_item_id,
                            item_id             : value.item_id,
                            assembly_id         : value.assembly_id,
                            measurement_id      : value.measurement_id,
                            description         : value.description,
                            quantity            : value.quantity,
                            conversion_ratio    : value.conversion_ratio,
                            cost                : value.cost,
                            price               : value.price,
                            amount              : value.amount,
                            discount            : value.discount,
                            rate                : value.rate,
                            locale              : value.locale,
                            movement            : 0,
                            required_date       : value.required_date,

                            discount_percentage : value.discount_percentage,
                            item                : value.item,
                            measurement         : value.measurement,
                            tax_item            : value.tax_item,
                            wht_account         : value.wht_account
                        });
                    }
                });

                total = (subTotal + tax) - discount;

                this.poDS.insert(0, {
                    contact_id          : vendorIds[i],
                    transaction_template_id : 11,
                    reference_id        : id,
                    recurring_id        : "",
                    job_id              : 0,
                    user_id             : this.get("user_id"),
                    employee_id         : obj.employee_id,
                    type                : "Purchase_Order",//Required
                    number              : "",
                    sub_total           : subTotal,
                    discount            : discount,
                    amount              : total,
                    tax                 : tax,
                    rate                : obj.rate,
                    locale              : obj.locale,
                    issued_date         : obj.issued_date,
                    due_date            : obj.due_date,
                    bill_to             : obj.bill_to,
                    ship_to             : obj.ship_to,
                    memo                : obj.memo,
                    memo2               : obj.memo2,
                    status              : 0,
                    segments            : [],
                    lines               : lines
                });
            }

            this.poDS.sync();           
        },
        //Obj
        loadObj             : function(id){
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
        addEmpty            : function(){
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
                contact_id          : "",
                transaction_template_id : 2,
                reference_id        : "",
                recurring_id        : "",
                job_id              : 0,
                user_id             : this.get("user_id"),
                employee_id         : banhji.source.get("employee").id,
                type                : "Sale_Order",//Required
                number              : "",
                sub_total           : 0,
                amount              : 0,
                credit_allowed      : 0,
                discount            : 0,
                tax                 : 0,
                rate                : 1,
                locale              : banhji.locale,
                issued_date         : new Date(),
                due_date            : duedate,
                bill_to             : "",
                ship_to             : "",
                memo                : "",
                memo2               : "",
                status              : 0,
                segments            : [],
                //Recurring
                recurring_name      : "",
                start_date          : new Date(),
                frequency           : "Daily",
                month_option        : "Day",
                interval            : 1,
                day                 : 1,
                week                : 0,
                month               : 0,
                is_recurring        : 0,

                contact             : { id:"", name:"" }
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
        addRow              : function(){
            var obj = this.get("obj");

            this.lineDS.add({
                transaction_id      : obj.id,
                contact_id          : 0,
                tax_item_id         : "",
                item_id             : "",
                assembly_id         : 0,
                measurement_id      : 0,
                description         : "",
                quantity            : 1,
                conversion_ratio    : 0,
                cost                : 0,
                price               : 0,
                amount              : 0,
                discount            : 0,
                rate                : obj.rate,
                locale              : obj.locale,
                movement            : 0,
                required_date       : "",

                discount_percentage : 0,
                item                : { id:"", name:"" },
                measurement         : { measurement_id:"", measurement:"" },
                tax_item            : { id:"", name:"" },
                contact             : { id:"", name:"" }
            });
        },
        addExtraRow         : function(uid){
            var row = this.lineDS.getByUid(uid),
                index = this.lineDS.indexOf(row);

            if(index==this.lineDS.total()-1){
                this.addRow();
            }
        },
        removeEmptyRow      : function(){
            var raw = this.lineDS.data();
            var item, i;
            for(i=raw.length-1; i>=0; i--){
                item = raw[i];

                if (item.item_id==0) {
                    this.lineDS.remove(item);
                }
            }
        },
        removeRow           : function(e){
            var data = e.data;
            if(this.lineDS.total()>1){
                this.lineDS.remove(data);
                this.changes();
            }
        },
        objSync             : function(){
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
        save                : function(){
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
        clear               : function(){
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
        cancel              : function(){
            this.clear();
            window.history.back();
        },
        delete              : function(){
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
        openConfirm         : function(){
            this.set("showConfirm", true);
        },
        closeConfirm        : function(){
            this.set("showConfirm", false);
        },
        validating          : function(){
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
        loadReference       : function(){
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
        referenceChanges    : function(){
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
                            transaction_id      : 0,
                            item_id             : value.item_id,
                            tax_item_id         : value.tax_item_id,
                            measurement_id      : value.measurement_id,                         
                            description         : value.description,                
                            quantity            : value.quantity,
                            cost                : value.cost,
                            price               : value.price,                                              
                            amount              : value.amount,
                            discount            : value.discount,
                            conversion_ratio    : value.conversion_ratio,
                            rate                : value.rate,
                            locale              : value.locale,
                            movement            : 0,
                            required_date       : value.required_date,

                            item                : value.item,
                            measurement         : value.measurement,
                            tax_item            : value.tax_item,
                            contact             : value.contact
                        });
                    });

                    self.changes();
                });
            }
        },
        //Recurring     
        loadRecurring       : function(id){
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
                        transaction_id      : 0,
                        tax_item_id         : value.tax_item_id,
                        item_id             : value.item_id,
                        measurement_id      : value.measurement_id,
                        description         : value.description,
                        quantity            : value.quantity,
                        cost                : value.cost,
                        price               : value.price,
                        amount              : value.amount,
                        discount            : value.discount,
                        rate                : value.rate,
                        locale              : value.locale,
                        movement            : 0,
                        required_date       : value.required_date,

                        item                : value.item,
                        measurement         : value.measurement,
                        tax_item            : value.tax_item
                    });
                });

                self.changes();
            });
        },
        frequencyChanges    : function(){
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
        monthOptionChanges  : function(){
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
        recurringSync       : function(){
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
        lang                : langVM,
        dataSource          : dataStore(apiUrl + "transactions"),
        txnDS               : dataStore(apiUrl + "transactions"),
        lineDS              : dataStore(apiUrl + "account_lines"),
        referenceDS         : dataStore(apiUrl + "transactions"),
        referenceLineDS     : dataStore(apiUrl + "account_lines"),
        recurringDS         : dataStore(apiUrl + "transactions"),
        recurringLineDS     : dataStore(apiUrl + "account_lines"),
        journalLineDS       : dataStore(apiUrl + "journal_lines"),
        attachmentDS        : dataStore(apiUrl + "attachments"),
        txnTemplateDS       : new kendo.data.DataSource({
            data: banhji.source.txnTemplateList,
            filter:{ field: "type", value: "Deposit" }
        }),
        accountDS           : new kendo.data.DataSource({
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
        depositAccountDS    : new kendo.data.DataSource({
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
        jobDS               : new kendo.data.DataSource({
            data: banhji.source.jobList,
            sort: { field: "name", dir: "asc" }
        }),
        segmentItemDS       : new kendo.data.DataSource({
            data: banhji.source.segmentItemList,
            sort: [
                { field: "segment_id", dir: "asc" },
                { field: "code", dir: "asc" }
            ]
        }),
        contactDS           : banhji.source.customerDS,
        amtDueColor         : banhji.source.amtDueColor,
        confirmMessage      : banhji.source.confirmMessage,
        frequencyList       : banhji.source.frequencyList,
        monthList           : banhji.source.monthList,  
        monthOptionList     : banhji.source.monthOptionList,
        weekDayList         : banhji.source.weekDayList,
        dayList             : banhji.source.dayList,
        showMonthOption     : false,
        showMonth           : false,
        showWeek            : false,
        showDay             : false,
        obj                 : null,
        isEdit              : false,
        saveClose           : false,
        savePrint           : false,
        saveRecurring       : false,
        showConfirm         : false,
        notDuplicateNumber  : true,
        statusSrc           : "",
        recurring           : "",
        recurring_validate  : false,
        enableRef           : false,
        total               : 0,
        original_total      : 0,
        user_id             : banhji.source.user_id,
        pageLoad            : function(id){
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
        onSelect            : function(e){
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
        removeFile          : function(e){
            var data = e.data;

            if (confirm(banhji.source.confirmMessage)) {
                this.attachmentDS.remove(data);
            }           
        },
        uploadFile          : function(){
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
        setContact          : function(contact){
            var obj = this.get("obj");

            obj.set("contact", contact);
            this.contactChanges();
        },
        contactChanges      : function(){
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
        employeeChanges         : function(){
            var obj = this.get("obj");

            if(obj.employee){
                var employee = obj.employee;
                
                obj.set("employee_id", employee.id);
            }else{
                obj.set("employee_id", 0);
            }
        },
        //Currency Rate
        setRate             : function(){
            var obj = this.get("obj"), 
            rate = banhji.source.getRate(obj.locale, new Date(obj.issued_date));

            obj.set("rate", rate);

            $.each(this.lineDS.data(), function(index, value){
                value.set("rate", rate);
                value.set("locale", obj.locale);
            });
        },
        //Segment
        segmentChanges      : function(e) {
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
        generateNumber          : function(){
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
        loadObj             : function(id){
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
        changes             : function(){
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
        addEmpty            : function(){
            this.dataSource.data([]);
            this.lineDS.data([]);
            this.attachmentDS.data([]);
            this.journalLineDS.data([]);

            this.set("isEdit", false);
            this.set("obj", null);
            this.set("total", 0);

            this.dataSource.insert(0, {
                contact_id              : "",
                transaction_template_id : 7,
                recurring_id            : "",
                reference_id            : "",
                account_id              : "",
                employee_id             : banhji.source.get("employee").id,
                user_id                 : this.get("uer_id"),
                type                    : "Customer_Deposit", //required
                number                  : "",
                amount                  : 0,
                rate                    : 1,
                locale                  : banhji.locale,
                issued_date             : new Date(),
                memo                    : "",
                memo2                   : "",
                segments                : [],
                is_journal              : 1,
                //Recurring
                recurring_name          : "",
                start_date              : new Date(),
                frequency               : "Daily",
                month_option            : "Day",
                interval                : 1,
                day                     : 1,
                week                    : 0,
                month                   : 0,
                is_recurring            : 0,

                contact                 : { id:"", name:"" }
            });

            var obj = this.dataSource.at(0);
            this.set("obj", obj);

            this.setRate();
            this.addRow();
            this.generateNumber();
        },
        addRow              : function(){
            var obj = this.get("obj");
            this.lineDS.add({
                transaction_id      : obj.id,
                account_id          : "",
                description         : "",
                reference_no        : "",
                amount              : 0,
                rate                : obj.rate,
                locale              : obj.locale
            });
        },
        removeRow           : function(e){
            var data = e.data;
            if(this.lineDS.total()>1){
                this.lineDS.remove(data);
                this.changes();
            }
        },
        objSync             : function(){
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
        save                : function(){
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
        cancel              : function(){
            this.dataSource.cancelChanges();
            this.lineDS.cancelChanges();
            this.attachmentDS.cancelChanges();

            this.dataSource.data([]);
            this.lineDS.data([]);
            this.attachmentDS.data([]);

            banhji.userManagement.removeMultiTask("customer_deposit");
        },
        delete              : function(){
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
        openConfirm         : function(){
            this.set("showConfirm", true);
        },
        closeConfirm        : function(){
            this.set("showConfirm", false);
        },
        validating          : function(){
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
        addJournal          : function(transaction_id){
            var self = this,
            sum = 0,
            obj = this.get("obj");

            //Cash account on DR
            $.each(this.lineDS.data(), function(index, value){
                sum += value.amount;

                self.journalLineDS.add({
                    transaction_id      : transaction_id,
                    account_id          : value.account_id,
                    contact_id          : value.contact_id,
                    description         : "",
                    reference_no        : value.reference_no,
                    segments            : obj.segments,
                    dr                  : value.amount,
                    cr                  : 0,
                    rate                : value.rate,
                    locale              : value.locale
                });
            });

            //Deposit on CR
            this.journalLineDS.add({
                transaction_id      : transaction_id,
                account_id          : obj.account_id,
                contact_id          : obj.contact_id,
                description         : "",
                reference_no        : "",
                segments            : obj.segments,
                dr                  : 0,
                cr                  : sum,
                rate                : obj.rate,
                locale              : obj.locale
            });

            this.journalLineDS.sync();
        },
        //Reference
        loadReference       : function(){
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
        referenceChanges    : function(){
            var obj = this.get("obj");

            if(obj.reference_id>0){
                var data = this.referenceDS.get(obj.reference_id);

                obj.set("reference_no", data.number);
                obj.set("segments", data.segments);
                obj.set("amount", data.amount);

                this.lineDS.data([]);
                this.lineDS.add({
                    transaction_id      : obj.id,
                    account_id          : "",
                    description         : "",
                    reference_no        : data.number,
                    amount              : data.amount,
                    conversion_ratio    : data.conversion_ratio,
                    rate                : data.rate,
                    locale              : data.locale
                });
                this.set("total", kendo.toString(data.amount, "c", data.locale));
            }
        },
        //Recurring
        loadRecurring       : function(id){
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
                        transaction_id      : 0,
                        account_id          : value.account_id,
                        description         : value.description,
                        reference_no        : value.reference_no,
                        amount              : value.amount,
                        rate                : value.rate,
                        locale              : value.locale
                    });
                });

                self.changes();
            });
        },
        frequencyChanges    : function(){
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
        monthOptionChanges  : function(){
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
        recurringSync       : function(){
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
        lang                : langVM,
        dataSource          : dataStore(apiUrl + "transactions"),
        contactDS           : banhji.source.customerDS,
        contact_id          : "",
        pageLoad            : function(){
        },
        search              : function(){
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
        edit                : function(e){
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
        use                 : function(e){
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
    banhji.sale = kendo.observable({
        lang                : langVM,
        dataSource          : dataStore(apiUrl + 'items'),
        txnDS               : dataStore(apiUrl + 'item_lines'),
        quoteLineDS         : banhji.quote.lineDS,
        soLineDS            : banhji.saleOrder.lineDS,
        categoryDS          : dataStore(apiUrl + 'categories'),
        obj                 : null,
        searchText          : "",
        isFavorite          : false,
        on_hand             : 0,
        on_so               : 0,
        on_po               : 0,
        user_id             : banhji.source.user_id,
        pageLoad            : function(){
            if(this.categoryDS.total()==0){
                this.categoryDS.filter({ field:"item_type_id", operator:"where_in", value:[1,4] });
                this.search();
            }
        },
        search              : function(){
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
        favorite            : function(){
            this.set("isFavorite", true);
            this.search();
        },
        selectedType        : function(e){
            var data = e.data;

            this.dataSource.query({
                filter: { field:"category_id", value:data.id },
                page:1,
                pageSize:100
            });
        },
        addQuote            : function(e){
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
                    transaction_id      : 0,
                    tax_item_id         : "",
                    item_id             : data.id,              
                    measurement_id      : 0,                
                    description         : data.sale_description,                
                    quantity            : 1,
                    price               : price,                                                
                    amount              : price,
                    rate                : 1,
                    locale              : banhji.locale,
                    movement            : -1,

                    item_prices         : data.item_prices
                });
            }           
        },
        addSO               : function(e){
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
                    transaction_id      : 0,
                    tax_item_id         : "",
                    item_id             : data.id,              
                    measurement_id      : 0,                
                    description         : data.sale_description,                
                    quantity            : 1,
                    price               : price,                                                
                    amount              : price,
                    rate                : 1,
                    locale              : banhji.locale,
                    movement            : -1,

                    item_prices         : data.item_prices
                });
            }           
        },
        loadDetail          : function(e){
            var data = e.data;
            this.set("obj", data);
            this.loadData();
        },
        loadData            : function(){
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
        prevItem            : function(){
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
        nextItem            : function(){
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
        lang                : langVM,
        dataSource          : dataStore(apiUrl + "sales/transaction_list"),
        contactDS           : banhji.source.customerDS,
        sortList            : banhji.source.sortList,
        sorter              : "month",
        sdate               : "",
        edate               : "",
        obj                 : { contactIds: [] },
        company             : banhji.institute,
        displayDate         : "",
        orderCount          : 0,
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
        lang                : langVM,
        dataSource          : dataStore(apiUrl + "sales/transaction_list"),
        contactDS           : banhji.source.customerDS,
        sortList            : banhji.source.sortList,
        sorter              : "month",
        sdate               : "",
        edate               : "",
        obj                 : { contactIds: [] },
        company             : banhji.institute,
        displayDate         : "",
        orderCount          : 0,
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
        lang                : langVM,
        dataSource          : dataStore(apiUrl + "sales/transaction_by_job_engagement"),
        contactDS           : banhji.source.customerDS,
        sortList            : banhji.source.sortList,
        sorter              : "month",
        sdate               : "",
        edate               : "",
        obj                 : { contactIds: [] },
        company             : banhji.institute,
        displayDate         : "",
        orderCount          : 0,
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
    

    /*************************************************
    *   VIEW & LAYOUT                                *
    *************************************************/
    banhji.view = {
        layout      : new kendo.Layout('#layout', {model: banhji.Layout}),
        blank       : new kendo.View('<div></div>'),
        index       : new kendo.Layout("#index", {model: banhji.index}),
        menu        : new kendo.Layout('#menu-tmpl', {model: banhji.userManagement}),
        //Start Content
        dashBoard : new kendo.Layout("#dashBoard", {model: banhji.dashBoard}),
        searchAdvanced: new kendo.Layout("#searchAdvanced", {model: banhji.searchAdvanced}),
        pos: new kendo.Layout("#pos", {model: banhji.pos}),
        receipt: new kendo.Layout("#receipt", {model: banhji.receipt}),
        saleCenter: new kendo.Layout("#saleCenter", {model: banhji.saleCenter}),
        customer: new kendo.Layout("#customer", {model: banhji.customer}),
        quote: new kendo.Layout("#quote", {model: banhji.quote}),
        saleOrder: new kendo.Layout("#saleOrder", {model: banhji.saleOrder}),
        customerDeposit: new kendo.Layout("#customerDeposit", {model: banhji.customerDeposit}),
        sale: new kendo.Layout("#sale", {model: banhji.sale}),
        saleReportCenter: new kendo.Layout("#saleReportCenter", {model: banhji.saleReportCenter}),
        saleRecurring : new kendo.Layout("#saleRecurring", {model: banhji.saleRecurring}),
        saleInventoryPositionSummary: new kendo.Layout("#saleInventoryPositionSummary", {model: banhji.inventoryPositionSummary}),
        quotationList : new kendo.Layout("#quotationList", {model: banhji.quotationList}),
        saleOrderList : new kendo.Layout("#saleOrderList", {model: banhji.saleOrderList}),
        saleOrderByJobEngagment : new kendo.Layout("#saleOrderByJobEngagment", {model: banhji.saleOrderByJobEngagment}),

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
                    // banhji.index.set('companyName', data.institute.name);
                    // banhji.index.set('companyLogo', data.institute.logo);
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
        banhji.view.layout.showIn("#content", banhji.view.dashBoard);
        banhji.view.layout.showIn('#menu', banhji.view.menu);
        banhji.view.menu.showIn('#secondary-menu', banhji.view.saleMenu);
        var vm = banhji.dashBoard;
        vm.pageLoad();
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
    *   SALE ROUTER                                  *
    *************************************************/
    banhji.router.route("/sale_center", function(){
        // banhji.accessMod.query({
        //  filter: {field: 'username', value: JSON.parse(localStorage.getItem('userData/user')).username}
        // }).then(function(e){
        //  var allowed = false;
        //  if(banhji.accessMod.data().length > 0) {
        //      for(var i = 0; i < banhji.accessMod.data().length; i++) {
        //          if("Sales" == banhji.accessMod.data()[i].name.toLowerCase()) {
        //              allowed = true;
        //              break;
        //          }
        //      }
        //  } 
        //  if(allowed) {
                banhji.view.layout.showIn("#content", banhji.view.saleCenter);
                banhji.view.layout.showIn('#menu', banhji.view.menu);
                banhji.view.menu.showIn('#secondary-menu', banhji.view.saleMenu);

                var vm = banhji.saleCenter;
                if(banhji.pageLoaded["sale_center"]==undefined){
                    banhji.pageLoaded["sale_center"] = true;
                }
                vm.pageLoad();
        //  } else {
        //      window.location.replace(baseUrl + "admin");
        //  }
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
        // banhji.accessPage.query({
        //  filter:[
        //      { field:"name", value:"quotation" },
        //      { field:'username', operator:"where_related_user", value: JSON.parse(localStorage.getItem('userData/user')).username }
        //  ]
        // }).then(function(e){
        //  if(banhji.accessPage.data().length > 0) {

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

        //  } else {
        //      window.location.replace(baseUrl + "admin");
        //  }
        // });
    });
    banhji.router.route("/sale_order(/:id)", function(id){
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
    });
    banhji.router.route("/customer_deposit(/:id)", function(id){
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

    banhji.router.route("/pos", function(){
        var vm = banhji.pos;
        banhji.view.layout.showIn("#content", banhji.view.pos);
        banhji.view.layout.showIn('#menu', banhji.view.menu);
        banhji.view.menu.showIn('#secondary-menu', banhji.view.saleMenu);
        vm.pageLoad();
    });

    banhji.router.route("/receipt", function() {
        localforage.getItem('user')
            .then(function(data) {
            for (var i = 0; i < data.roles.length; i++) {
                if ('receipt' == data.roles[i].name) {
                    banhji.view.layout.showIn("#content", banhji.view.receipt);
                    // banhji.view.layout.showIn('#menu', banhji.view.menu);
                    // banhji.view.menu.showIn('#secondary-menu', banhji.view.waterMenu);

                    var vm = banhji.receipt;
                    banhji.userManagement.addMultiTask("Receipt", "receipt", null);
                    if (banhji.pageLoaded["receipt"] == undefined) {
                        banhji.pageLoaded["receipt"] = true;
                        vm.paymentTermDS.read();
                        var validator = $("#example").kendoValidator().data("kendoValidator");
                    }
                    vm.pageLoad();
                    break;
                }
            }
        });
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