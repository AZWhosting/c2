<script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/js/libs/localforage.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jszip/2.4.0/jszip.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.8.0/xlsx.js"></script>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script>
    localforage.config({
        driver: localforage.LOCALSTORAGE,
        name: 'userData'
    });
    var langVM = kendo.observable({
        lang: null,
        localeCode: null,
        changeToEn: function() {
            localforage.setItem("lang", "EN").then(function(value) {
                location.reload(false);
            });
        },
        changeToKh: function() {
            localforage.setItem("lang", "KH").then(function(value) {
                location.reload(false);
            });
        }
    });
    var banhji = banhji || {};
    var baseUrl = "<?php echo base_url(); ?>";
    var apiUrl = baseUrl + 'api/';
    banhji.s3 = "https://banhji.s3.amazonaws.com/";
    banhji.token = null;
    banhji.no_image = "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/no_image.jpg";
    // custom widget for min and max
    kendo.data.binders.widget.max = kendo.data.Binder.extend({
        init: function(widget, bindings, options) { //call the base constructor
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
                read: {
                    url: baseUrl + 'api/attachments',
                    type: "GET",
                    dataType: 'json',
                    headers: {
                        Institute: JSON.parse(localStorage.getItem('userData/user')).institute.id
                    }
                },
                create: {
                    url: baseUrl + 'api/attachments',
                    type: "POST",
                    dataType: 'json',
                    headers: {
                        Institute: JSON.parse(localStorage.getItem('userData/user')).institute.id
                    }
                },
                update: {
                    url: baseUrl + 'api/attachments',
                    type: "PUT",
                    dataType: 'json',
                    headers: {
                        Institute: JSON.parse(localStorage.getItem('userData/user')).institute.id
                    }
                },
                destroy: {
                    url: baseUrl + 'api/attachments',
                    type: "DELETE",
                    dataType: 'json',
                    headers: {
                        Institute: JSON.parse(localStorage.getItem('userData/user')).institute.id
                    }
                },
                parameterMap: function(options, operation) {
                    if (operation === 'read') {
                        return {
                            limit: options.take,
                            page: options.page,
                            filter: options.filter
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
            batch: true,
            serverFiltering: true,
            serverPaging: true,
            pageSize: 50
        }),
        fileArray: [],
        onRemove: function(e) {
            banhji.fileManagement.dataSource.remove(e.data);
        },
        onSelected: function(e) {
            var files = e.files;
            var key = 'ATTACH_' + JSON.parse(localStorage.getItem('userData/user')).institute.id + "_" + Math.floor(Math.random() * 100000000000000001) + '_' + files[0].name;
            banhji.fileManagement.dataSource.add({
                transaction_id: 0,
                type: "Transaction",
                name: files[0].name,
                contact_id: null,
                description: "",
                key: key,
                url: "https://s3-ap-southeast-1.amazonaws.com/banhji/" + key,
                created_at: new Date(),
                file: files[0].rawFile
            });
        },
        transactionSize: 0,
        contactSize: 0,
        totalSize: 0,
        transactionNu: 0,
        contactNu: 0,
        save: function(contact_id) {
            $.each(banhji.fileManagement.dataSource.data(), function(index, value) {
                banhji.fileManagement.dataSource.at(index).set("transaction_id", contact_id);
                if (!value.id) {
                    var params = {
                        Body: value.file,
                        Key: value.key
                    };
                    bucket.upload(params, function(err, data) {
                        // console.log(err, data);
                        // var url = data.Location;               
                    });
                }
            });

            banhji.fileManagement.dataSource.sync();
            var saved = false;
            banhji.fileManagement.dataSource.bind("requestEnd", function(e) {
                //Delete File
                if (e.type == "destroy") {
                    if (saved == false && e.response) {
                        saved = true;
                        var response = e.response.results;
                        $.each(response, function(index, value) {
                            var params = {
                                Delete: { /* required */
                                    Objects: [ /* required */ {
                                        Key: value.data.key
                                    }]
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
    var bucket = new AWS.S3({
        params: {
            Bucket: 'banhji'
        }
    });
    banhji.accessMod = new kendo.data.DataSource({
        transport: {
            read: {
                url: baseUrl + 'api/users/access',
                type: "GET",
                dataType: 'json'
            },
            parameterMap: function(options, operation) {
                if (operation === 'read') {
                    return {
                        limit: options.pageSize,
                        page: options.page,
                        filter: options.filter
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
        batch: true,
        serverFiltering: true,
        serverPaging: true,
        filter: {
            field: 'username',
            value: userPool.getCurrentUser() == null ? '' : userPool.getCurrentUser().username
        },
        pageSize: 1
    });
    banhji.allowed;
    function checkRole(arg) {
        var dfd = $.Deferred();
        // var roleName = $(location).attr('hash').substr(2);
        // loop through roles if this has in the role list
        banhji.accessMod.query({
            filter: {
                field: 'username',
                value: JSON.parse(localStorage.getItem('userData/user')).username
            }
        }).then(function(e) {
            if (banhji.accessMod.data().length > 0) {
                for (var i = 0; i < banhji.accessMod.data().length; i++) {
                    if (arg == banhji.accessMod.data()[i].name.toLowerCase()) {
                        dfd.resolve(true);
                        break;
                    }
                }
            }
        });
    }
    banhji.companyDS = new kendo.data.DataSource({
        transport: {
            read: {
                url: baseUrl + 'api/profiles/company',
                type: "GET",
                dataType: 'json'
            },
            update: {
                url: baseUrl + 'api/profiles/company',
                type: "PUT",
                dataType: 'json'
            },
            parameterMap: function(options, operation) {
                if (operation === 'read') {
                    return {
                        limit: options.pageSize,
                        page: options.page,
                        filter: options.filter
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
        batch: true,
        serverFiltering: true,
        serverPaging: true,
        filter: {
            field: 'username',
            value: userPool.getCurrentUser() == null ? '' : userPool.getCurrentUser().username
        },
        pageSize: 1
    });
    banhji.profileDS = new kendo.data.DataSource({
        transport: {
            read: {
                url: baseUrl + 'api/profiles',
                type: "GET",
                dataType: 'json',
                headers: banhji.header,
            },
            parameterMap: function(options, operation) {
                if (operation === 'read') {
                    return {
                        limit: options.pageSize,
                        page: options.page,
                        filter: options.filter
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
        batch: true,
        serverFiltering: true,
        serverPaging: true,
        filter: {
            field: 'username',
            value: userPool.getCurrentUser() == null ? '' : userPool.getCurrentUser().username
        },
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
            banhji.profileDS.fetch(function(e) {
                banhji.aws.set('image', banhji.profileDS.data()[0].profile_photo);
            });
        },
        signUp: function() {
            // e.preventDefault();
            if (this.get('password') != this.get('confirm')) {
                alert('Passwords do not match');
            } else {
                // using cognito to sign up
                var attributeList = [];

                var dataEmail = {
                    Name: 'email',
                    Value: this.get('email')
                };

                var attributeEmail = new AWSCognito.CognitoIdentityServiceProvider.CognitoUserAttribute(dataEmail);

                attributeList.push(attributeEmail);

                userPool.signUp(this.get('email'), this.get('password'), attributeList, null, function(err, result) {
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
                Username: userPool.getCurrentUser().username,
                Pool: userPool
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
                Username: this.get('email'),
                Password: this.get('password'),
            };
            var authenticationDetails = new AWSCognito.CognitoIdentityServiceProvider.AuthenticationDetails(authenticationData);

            var userData = {
                Username: this.get('email'),
                Pool: userPool
            };
            var cognitoUser = new AWSCognito.CognitoIdentityServiceProvider.CognitoUser(userData);
            cognitoUser.authenticateUser(authenticationDetails, {
                onSuccess: function(result) {
                    banhji.awsCognito.set('cognitoUser', cognitoUser);
                },

                onFailure: function(err) {
                    alert(err);
                },

            });
        },
        signOut: function(e) {
            e.preventDefault();
            var userData = {
                Username: userPool.getCurrentUser().username,
                Pool: userPool
            };
            var cognitoUser = new AWSCognito.CognitoIdentityServiceProvider.CognitoUser(userData);
            if (cognitoUser != null) {
                cognitoUser.signOut();
                localforage.clear().then(function() {
                    window.location.replace("<?php base_url(); ?>login");
                });
            } else {
                console.log('No user');
            }
        },
        changePassword: function() {
            var userData = {
                Username: this.get('email'),
                Pool: userPool
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
                Username: this.get('email'),
                Pool: userPool
            };
            var cognitoUser = new AWSCognito.CognitoIdentityServiceProvider.CognitoUser(userData);
            cognitoUser.forgotPassword({
                onSuccess: function(result) {
                    console.log('call result: ' + result);
                },
                onFailure: function(err) {
                    alert(err);
                },
                inputVerificationCode() {
                    var verificationCode = prompt('Please input verification code ', '');
                    var newPassword = prompt('Enter new password ', '');
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
    if (userPool.getCurrentUser() == null) {
        // if not login return to login page    
        //window.location.replace('http://localhost/aws/login.html');
    } else {
        var cognitoUser = userPool.getCurrentUser();
        if (cognitoUser !== null) {
            // banhji.aws.getImage();
            cognitoUser.getSession(function(err, result) {
                if (result) {
                    AWS.config.credentials = new AWS.CognitoIdentityCredentials({
                        IdentityPoolId: 'us-east-1:35445541-da4c-4dbb-b83f-d1d0301a26a9',
                        Logins: {
                            'cognito-idp.us-east-1.amazonaws.com/us-east-1_56S0nUDS4': result.getIdToken().getJwtToken()
                        }
                    });
                }
            });
        }
    }
    banhji.userData = JSON.parse(localStorage.getItem('userData/user')) ? JSON.parse(localStorage.getItem('userData/user')) : "";
    if (banhji.userData == "") {
        banhji.companyDS.fetch(function() {
            banhji.profileDS.fetch(function() {
                var data = banhji.companyDS.data();
                var id = 0;
                id = banhji.profileDS.data()[0].id;
                if (data.length > 0) {
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
    banhji.header = {
        Institute: banhji.institute.id
    };
    var dataStore = function(url) {
        var o = new kendo.data.DataSource({
            transport: {
                read: {
                    url: url,
                    type: "GET",
                    headers: banhji.header,
                    dataType: 'json'
                },
                create: {
                    url: url,
                    type: "POST",
                    headers: banhji.header,
                    dataType: 'json'
                },
                update: {
                    url: url,
                    type: "PUT",
                    headers: banhji.header,
                    dataType: 'json'
                },
                destroy: {
                    url: url,
                    type: "DELETE",
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
        lang: langVM,
        multiTaskList: [],
        searchText: "",
        searchType: "contacts",
        checkRole: function(e) {
            e.preventDefault();
            if (JSON.parse(localStorage.getItem('userData/user')).role == 1) {
                window.location.replace("<?php echo base_url(); ?>rrd");
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
        removeLink: function(e) {
            e.preventDefault();

            var data = e.data,
                index = this.multiTaskList.indexOf(data);

            if (data.vm !== null) {
                data.vm.cancel();
            }

            this.multiTaskList.splice(index, 1);
        },
        removeMultiTask: function(url) {
            var self = this;

            $.each(this.multiTaskList, function(index, value) {
                if (value.url == url) {
                    self.multiTaskList.splice(index, 1);

                    return false;
                }
            });
        },
        addMultiTask: function(name, url, vm) {
            var isExisting = false;
            $.each(this.multiTaskList, function(index, value) {
                if (value.url == url) {
                    isExisting = true;

                    return false;
                }
            });

            if (isExisting == false) {
                this.multiTaskList.push({
                    name: name,
                    url: url,
                    vm: vm
                });
            }
        },
        auth: new kendo.data.DataSource({
            transport: {
                read: {
                    url: apiUrl + 'authentication',
                    type: "GET",
                    dataType: 'json'
                },
                create: {
                    url: apiUrl + 'authentication',
                    type: "POST",
                    dataType: 'json'
                },
                update: {
                    url: apiUrl + 'authentication',
                    type: "PUT",
                    dataType: 'json'
                },
                destroy: {
                    url: apiUrl + 'authentication',
                    type: "DELETE",
                    dataType: 'json'
                },
                parameterMap: function(options, operation) {
                    if (operation === 'read') {
                        return {
                            limit: options.pageSize,
                            page: options.page,
                            filter: options.filter
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
            batch: true,
            serverFiltering: true,
            serverPaging: true,
            // pageSize: 100
        }),
        inst: new kendo.data.DataSource({
            transport: {
                read: {
                    url: apiUrl + 'banhji/company',
                    type: "GET",
                    dataType: 'json'
                },
                create: {
                    url: apiUrl + 'banhji/company',
                    type: "POST",
                    dataType: 'json'
                },
                update: {
                    url: apiUrl + 'banhji/company',
                    type: "PUT",
                    dataType: 'json'
                },
                destroy: {
                    url: apiUrl + 'banhji/company',
                    type: "DELETE",
                    dataType: 'json'
                },
                parameterMap: function(options, operation) {
                    if (operation === 'read') {
                        return {
                            limit: options.pageSize,
                            page: options.page,
                            filter: options.filter
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
            batch: true,
            serverFiltering: true,
            serverPaging: true,
            // pageSize: 100
        }),
        industry: new kendo.data.DataSource({
            transport: {
                read: {
                    url: apiUrl + 'banhji/industry',
                    type: "GET",
                    dataType: 'json'
                },
                parameterMap: function(options, operation) {
                    if (operation === 'read') {
                        return {
                            limit: options.pageSize,
                            page: options.page,
                            filter: options.filter
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
            batch: true,
            serverFiltering: true,
            serverPaging: true,
            // pageSize: 100
        }),
        countries: new kendo.data.DataSource({
            transport: {
                read: {
                    url: apiUrl + 'banhji/countries',
                    type: "GET",
                    dataType: 'json'
                },
                parameterMap: function(options, operation) {
                    if (operation === 'read') {
                        return {
                            limit: options.pageSize,
                            page: options.page,
                            filter: options.filter
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
            batch: true,
            serverFiltering: true,
            serverPaging: true,
            // pageSize: 100
        }),
        provinces: new kendo.data.DataSource({
            transport: {
                read: {
                    url: apiUrl + 'banhji/provinces',
                    type: "GET",
                    dataType: 'json'
                },
                parameterMap: function(options, operation) {
                    if (operation === 'read') {
                        return {
                            limit: options.pageSize,
                            page: options.page,
                            filter: options.filter
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
            batch: true,
            serverFiltering: true,
            serverPaging: true,
            // pageSize: 100
        }),
        types: new kendo.data.DataSource({
            transport: {
                read: {
                    url: apiUrl + 'banhji/types',
                    type: "GET",
                    dataType: 'json'
                },
                parameterMap: function(options, operation) {
                    if (operation === 'read') {
                        return {
                            limit: options.pageSize,
                            page: options.page,
                            filter: options.filter
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
            batch: true,
            serverFiltering: true,
            serverPaging: true,
            // pageSize: 100
        }),
        instMod: new kendo.data.DataSource({
            transport: {
                read: {
                    url: apiUrl + 'admin/modules_institute',
                    type: "GET",
                    dataType: 'json'
                },
                create: {
                    url: apiUrl + 'admin/modules_institute',
                    type: "POST",
                    dataType: 'json'
                },
                update: {
                    url: apiUrl + 'admin/modules_institute',
                    type: "PUT",
                    dataType: 'json'
                },
                destroy: {
                    url: apiUrl + 'admin/modules_institute',
                    type: "DELETE",
                    dataType: 'json'
                },
                parameterMap: function(options, operation) {
                    if (operation === 'read') {
                        return {
                            limit: options.pageSize,
                            page: options.page,
                            filter: options.filter
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
            batch: true,
            serverFiltering: true,
            serverPaging: true,
            filter: {
                field: 'id',
                value: 1
            }
            // pageSize: 100
        }),
        onSuccessUpload: function(e) {
            var logo = e.response.results.url;
            this.get('newInst').set('logo', logo);
            this.saveIntitute();
            // console.log(logo);
        },
        close: function() {
            window.history.back(-1);
            if (this.inst.hasChanges()) {
                this.inst.cancelChanges();
            }
            if (this.auth.hasChanges()) {
                this.auth.cancelChanges();
            }
        },
        getUsername: function() {
            var x = banhji.userData.username.substring(0, 2);
            return x.toUpperCase();
        },
        taxRegimes: [{
                code: 'small',
                type: 'ខ្នាតតូច'
            },
            {
                code: 'medium',
                type: 'ខ្នាតមធ្យម'
            },
            {
                code: 'large',
                type: 'ខ្នាតធំ'
            }
        ],
        currency: [{
                code: 'KHR',
                locale: 'km-KH'
            },
            {
                code: 'USD',
                locale: 'us-US'
            },
            {
                code: 'VND',
                locale: 'vn-VN'
            }
        ],
        username: null,
        password: null,
        _password: null,
        pwdDS: new kendo.data.DataSource({
            transport: {
                create: {
                    url: apiUrl + 'banhji/password',
                    type: "POST",
                    dataType: 'json'
                },
                parameterMap: function(options, operation) {
                    if (operation === 'read') {
                        return {
                            limit: options.pageSize,
                            page: options.page,
                            filter: options.filter
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

            if (!reValidEmail.test(this.get('username'))) {
                alert("Please enter valid address");
                this.set('passed', false);
            }
            this.set('passed', false);
        },
        loginBtn: function() {
            banhji.view.layout.showIn('#content', banhji.view.loginView);
        },
        login: function() {
            this.auth.query({
                filter: [{
                        field: 'username',
                        value: banhji.userManagement.get('username')
                    },
                    {
                        field: 'password',
                        value: banhji.userManagement.get('password')
                    }
                ]
            }).done(function(e) {
                var data = banhji.userManagement.auth.data();
                if (data.length > 0) {
                    var user = banhji.userManagement.auth.data()[0];
                    localforage.setItem('user', user);
                    if (user.institute.length === 0) {
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
        logout: function(e) {
            e.preventDefault();
            var userData = {
                Username: userPool.getCurrentUser().username,
                Pool: userPool
            };
            var cognitoUser = new AWSCognito.CognitoIdentityServiceProvider.CognitoUser(userData);
            if (cognitoUser != null) {
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
        setCurrent: function(current) {
            this.set('current', current);
        },
        changePwd: function() {
            if (this.get('password') !== this.get('_password')) {
                alert("Password does not match");
            } else {
                this.pwdDS.sync();
            }
        },
        getLogin: function() {
            return JSON.parse(localStorage.getItem('userData/user'));
        },
        page: function() {
            if (banhji.userManagement.getLogin()) {
                if (banhji.userManagement.getLogin().perm === 1) {
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
        createComp: function() {
            banhji.router.navigate('/create_company');
        },
        setInstitute: function(newIns) {
            this.set('newInst', newIns);
        },
        addInst: function() {
            this.inst.insert(0, {
                name: "",
                email: "",
                address: "",
                description: "",
                industry: {
                    id: null,
                    name: null
                },
                type: {
                    id: null,
                    name: null
                },
                country: {
                    id: null,
                    code: null,
                    name: null
                },
                province: {
                    id: null,
                    local: null,
                    english: null
                },
                vat_no: null,
                fiscal_date: null,
                tax_regime: null,
                locale: null,
                legal_name: null,
                date_founded: null,
                logo: ""
            });
            this.setInstitute(this.inst.at(0));
        },
        cancelInst: function() {
            this.inst.cancelChanges();
        },
        saveIntitute: function() {
            if (this.get('newInst').industry.id !== null || this.get('newInst').province.id || this.get('newInst').country.id) {
                this.inst.sync();
                this.inst.bind('requestEnd', function(e) {
                    var type = e.type,
                        res = e.response.results;
                    if (e.response.error === false) {
                        if (e.type === 'create') {
                            $('#createComMessage').text("created. Please wait till site admin created database for you.");
                        } else {
                            localforage.removeItem('company', function(err) {
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
        signup: function() {
            this.auth.add({
                username: this.get('username'),
                password: this.get('password')
            });
            this.sync();
            this.auth.bind('requestEnd', function(e) {
                if (e.type === 'create' && e.response.error === false) {
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
            this.auth.bind('requestEnd', function(e) {
                var type = e.type;
                var result = e.response.results;
                if (type === "read" && e.error !== true) {
                    // get login info
                    console.log('true');
                } else if (type === "create") {
                    if (e.response.error === true) {
                        banhji.userManagement.auth.cancelChanges();
                        alert('មានរួចហើយ');
                    } else {
                        var user = banhji.userManagement.auth.data()[0];
                        localforage.setItem('user', user);
                        if (!user.institute) {
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
        if (banhji.userManagement.getLogin()) {
            if (banhji.userManagement.getLogin().institute) {
                if (banhji.userManagement.getLogin().institute.length > 0) {
                    entity = banhji.userManagement.getLogin().institute.name
                }

            } else {
                entity = false
            }
        }
        return entity;
    }
    banhji.currency = kendo.observable({
        dataSource: dataStore(apiUrl + 'currencies'),
        getCurrencyID: function(locale) {
            var currency_id = 0;

            $.each(this.dataSource.data(), function(index, value) {
                if (value.locale === locale) {
                    currency_id = value.id;
                    return false;
                }
            });

            return currency_id;
        }
    });
    banhji.users = kendo.observable({
        dataStore: new kendo.data.DataSource({
            transport: {
                read: {
                    url: apiUrl + 'banhji/users',
                    type: "GET",
                    headers: {
                        "Entity": getDB(),
                        "User": banhji.userManagement.getLogin() === null ? '' : banhji.userManagement.getLogin().id
                    },
                    dataType: 'json'
                },
                create: {
                    url: apiUrl + 'banhji/users',
                    type: "POST",
                    headers: {
                        "Entity": getDB(),
                        "User": banhji.userManagement.getLogin() === null ? '' : banhji.userManagement.getLogin().id
                    },
                    dataType: 'json'
                },
                update: {
                    url: apiUrl + 'banhji/users',
                    type: "PUT",
                    headers: {
                        "Entity": getDB(),
                        "User": banhji.userManagement.getLogin() === null ? '' : banhji.userManagement.getLogin().id
                    },
                    dataType: 'json'
                },
                destroy: {
                    url: apiUrl + 'banhji/users',
                    type: "DELETE",
                    headers: {
                        "Entity": getDB(),
                        "User": banhji.userManagement.getLogin() === null ? '' : banhji.userManagement.getLogin().id
                    },
                    dataType: 'json'
                },
                parameterMap: function(options, operation) {
                    if (operation === 'read') {
                        return {
                            limit: options.pageSize,
                            page: options.page,
                            filter: options.filter
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
            batch: true,
            serverFiltering: true,
            serverPaging: true,
            pageSize: 100
        }),
        roleDS: new kendo.data.DataSource({
            transport: {
                read: {
                    url: apiUrl + 'banhji/roles',
                    type: "GET",
                    headers: {
                        "Entity": getDB(),
                        "User": banhji.userManagement.getLogin() === null ? '' : banhji.userManagement.getLogin().id
                    },
                    dataType: 'json'
                },
                parameterMap: function(options, operation) {
                    if (operation === 'read') {
                        return {
                            limit: options.pageSize,
                            page: options.page,
                            filter: options.filter
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
            batch: true,
            serverFiltering: true,
            serverPaging: true,
            pageSize: 100
        }),
        add: function() {
            banhji.view.pageAdmin.showIn('#col2', banhji.view.addUserView);
            this.dataStore.insert(0, {
                username: '',
                password: null,
                permission: {
                    id: null,
                    name: null
                }
            });
            this.setCurrent(this.dataStore.at(0));
        },
        remove: function(e) {
            var user = confirm('Are you sure you want to remove this user?');
            if (user === true) {
                this.dataStore.remove(e.data);
                this.sync();
            }
        },
        editRight: function(e) {
            banhji.view.pageAdmin.showIn('#col2', banhji.view.editRoleView);
            this.setCurrent(e.data);
        },
        cancelAdd: function() {
            banhji.view.pageAdmin.showIn('#col2', banhji.view.userListView);
            this.dataStore.cancelChanges();
        },
        setCurrent: function(current) {
            this.set('current', current);
        },
        sync: function() {
            this.dataStore.sync();
            this.dataStore.bind('requestEnd', function(e) {
                var type = e.type;
                var data = e.response.results;
                if (type !== 'read') {
                    console.log('data recorded');
                }
            });
        }
    });
    banhji.people = kendo.observable({
        dataSource: new kendo.data.DataSource({
            transport: {
                read: {
                    url: apiUrl + "people",
                    type: "GET",
                    headers: {
                        "Entity": banhji.userManagement.getLogin() !== null ? banhji.userManagement.getLogin().institute.name : ""
                    },
                    dataType: 'json'
                },
                create: {
                    url: apiUrl + "people",
                    type: "POST",
                    headers: {
                        "Entity": banhji.userManagement.getLogin() !== null ? banhji.userManagement.getLogin().institute.name : ""
                    },
                    dataType: 'json'
                },
                update: {
                    url: apiUrl + "people",
                    type: "PUT",
                    headers: {
                        "Entity": banhji.userManagement.getLogin() !== null ? banhji.userManagement.getLogin().institutename : ""
                    },
                    dataType: 'json'
                },
                destroy: {
                    url: apiUrl + "people",
                    type: "DELETE",
                    headers: {
                        "Entity": banhji.userManagement.getLogin() !== null ? banhji.userManagement.getLogin().institute.name : ""
                    },
                    dataType: 'json'
                },
                parameterMap: function(options, operation) {
                    if (operation === 'read') {
                        return {
                            limit: options.pageSize,
                            offset: options.skip,
                            filter: options.filter
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
                total: 'count',
                errors: 'error'
            },
            batch: true,
            serverFiltering: true,
            serverPaging: true,
            pageSize: 20
        }),
        filterBy: function() {},
        save: function() {}
    });
    // end TEst offline
    var obj = function(url) {
        var o = kendo.observable({
            dataStore: new kendo.data.DataSource({
                transport: {
                    read: {
                        url: url,
                        type: "GET",
                        headers: {
                            "Entity": getDB()
                        },
                        dataType: 'json'
                    },
                    create: {
                        url: url,
                        type: "POST",
                        headers: {
                            "Entity": getDB()
                        },
                        dataType: 'json'
                    },
                    update: {
                        url: url,
                        type: "PUT",
                        headers: {
                            "Entity": getDB()
                        },
                        dataType: 'json'
                    },
                    destroy: {
                        url: url,
                        type: "DELETE",
                        headers: {
                            "Entity": getDB()
                        },
                        dataType: 'json'
                    },
                    parameterMap: function(options, operation) {
                        if (operation === 'read') {
                            return {
                                limit: options.pageSize,
                                offset: options.skip,
                                filter: options.filter
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
                    total: 'count',
                    errors: 'error'
                },
                batch: true,
                serverFiltering: true,
                serverPaging: true,
                pageSize: 20
            }),
            findById: function(id) {},
            findBy: function(arr) {},
            insert: function(data) {},
            remove: function(model) {
                this.dataStore.remove(model);
                this.save();
            },
            save: function() {
                this.dataStore.sync();
                this.dataStore.bind('requestEnd', function(e) {
                    var type = e.type,
                        res = e.response.results;
                });
            }
        });
        return o;
    }
    banhji.Layout = kendo.observable({
        locale: "km-KH",
        menu: [],
        // isShown : true,
        // isAdmin : auth.isAdmin(),
        // logout   : function(e) {
        //  e.preventDefault();
        //  auth.logout();
        // },
        // isLogin : function(){
        //  if(banhji.userManagement.getLogin()) {
        //    return true;
        //  } else {
        //    return false;
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
        dataStore: new kendo.data.DataSource({
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
                    if (operation === 'read') {
                        return {
                            limit: data.pageSize,
                            offset: data.skip,
                            filter: data.filter
                        };
                    }
                    return {
                        models: kendo.stringify(data.models)
                    };
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
        roleUserDs: new kendo.data.DataSource({
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
                    if (operation === 'read') {
                        return {
                            limit: data.pageSize,
                            offset: data.skip,
                            filter: data.filter
                        };
                    }
                    return {
                        models: kendo.stringify(data.models)
                    };
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
        find: function(arg) {},
        setCurrent: function(currentRole) {},
        save: function() {}
    });
    banhji.index = kendo.observable({
        lang: langVM,
        dataSource: dataStore(apiUrl + "dashboards/home"),
        summaryDS: dataStore(apiUrl + "accounting_reports/financial_snapshot"),
        companyLogo: '',
        modules: new kendo.data.DataSource({
            transport: {
                read: {
                    url: apiUrl + 'admin/modules',
                    type: "GET",
                    dataType: 'json'
                },
                create: {
                    url: apiUrl + 'admin/modules',
                    type: "POST",
                    dataType: 'json'
                },
                update: {
                    url: apiUrl + 'admin/modules',
                    type: "PUT",
                    dataType: 'json'
                },
                destroy: {
                    url: apiUrl + 'admin/modules',
                    type: "DELETE",
                    dataType: 'json'
                },
                parameterMap: function(options, operation) {
                    if (operation === 'read') {
                        return {
                            limit: options.pageSize,
                            page: options.page,
                            filter: options.filter
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
            batch: true,
            serverFiltering: true,
            serverPaging: true,
            // pageSize: 100
        }),
        companyName: null,
        companyInf: function() {
            var company = JSON.parse(localStorage.getItem('userData/user'));
            return company;
        },
        getLogo: function() {
            banhji.companyDS.fetch(function() {
                if (banhji.companyDS.data().length > 0) {
                    banhji.index.set('companyLogo', banhji.companyDS.data()[0].logo);
                }
            });
        },
        today: new Date(),
        ar: 0,
        ar_open: 0,
        ar_customer: 0,
        ar_overdue: 0,
        ap: 0,
        ap_open: 0,
        ap_vendor: 0,
        ap_overdue: 0,
        income: 0,
        expense: 0,
        net_income: 0,
        asset: 0,
        liability: 0,
        equity: 0,
        pageLoad: function() {
            var self = this;
            banhji.wDashBoard.dashSource.read();
        }
    });
    banhji.searchAdvanced = kendo.observable({
        lang: langVM,
        contactDS: dataStore(apiUrl + "contacts"),
        contactTypeDS: dataStore(apiUrl + "contacts/type"),
        transactionDS: dataStore(apiUrl + "transactions"),
        itemDS: dataStore(apiUrl + "items"),
        accountDS: dataStore(apiUrl + "accounts"),
        searchType: "",
        searchText: "",
        found: 0,
        pageLoad: function() {},
        search: function() {
            var self = this,
                searchText = this.get("searchText");
            this.set("found", 0);

            if (searchText) {
                this.contactDS.query({
                    filter: [{
                            field: "number",
                            operator: "like",
                            value: searchText
                        },
                        {
                            field: "surname",
                            operator: "or_like",
                            value: searchText
                        },
                        {
                            field: "name",
                            operator: "or_like",
                            value: searchText
                        },
                        {
                            field: "company",
                            operator: "or_like",
                            value: searchText
                        }
                    ],
                    page: 1,
                    pageSize: 10
                }).then(function() {
                    var found = self.get("found") + self.contactDS.total();
                    self.set("found", found);
                });

                this.transactionDS.query({
                    filter: [{
                        field: "number",
                        operator: "like",
                        value: searchText
                    }],
                    page: 1,
                    pageSize: 10
                }).then(function() {
                    var found = self.get("found") + self.transactionDS.total();
                    self.set("found", found);
                });

                this.itemDS.query({
                    filter: [{
                            field: "number",
                            operator: "like",
                            value: searchText
                        },
                        {
                            field: "name",
                            operator: "or_like",
                            value: searchText
                        }
                    ],
                    page: 1,
                    pageSize: 10
                }).then(function() {
                    var found = self.get("found") + self.itemDS.total();
                    self.set("found", found);
                });

                this.accountDS.query({
                    filter: [{
                            field: "number",
                            operator: "like",
                            value: searchText
                        },
                        {
                            field: "name",
                            operator: "or_like",
                            value: searchText
                        }
                    ],
                    page: 1,
                    pageSize: 10
                }).then(function() {
                    var found = self.get("found") + self.accountDS.total();
                    self.set("found", found);
                });
            }
        },
        selectedContact: function(e) {
            e.preventDefault();

            var data = e.data,
                type = this.contactTypeDS.get(data.contact_type_id);

            if (type.parent_id == 1) {
                banhji.customerCenter.loadContact(data.id);
                banhji.router.navigate('/customer_center', false);
            } else {
                banhji.vendorCenter.loadContact(data.id);
                banhji.router.navigate('/vendor_center', false);
            }
        },
        selectedTransaction: function(e) {
            e.preventDefault();

            var data = e.data;
            banhji.router.navigate('/' + data.type.toLowerCase() + '/' + data.id);
        },
        selectedItem: function(e) {
            e.preventDefault();

            var data = e.data;
            banhji.router.navigate('/item_center/' + e.data.id);
        },
        selectedAccount: function(e) {
            e.preventDefault();

            var data = e.data;
            banhji.router.navigate('/accounting_center/' + e.data.id);
        }
    });
    //DAWINE -----------------------------------------------------------------------------------------
    banhji.source = kendo.observable({
        lang: langVM,
        countryDS: dataStore(apiUrl + "countries"),
        //Contact
        customerList: [],
        supplierList: [],
        employeeList: [],
        contactDS: dataStore(apiUrl + "contacts"),
        customerDS: dataStore(apiUrl + "contacts"),
        supplierDS: dataStore(apiUrl + "contacts"),
        employeeDS: dataStore(apiUrl + "contacts"),
        //Contact Type
        contactTypeList: [],
        contactTypeDS: dataStore(apiUrl + "contacts/type"),
        //Job
        jobList: [],
        jobDS: dataStore(apiUrl + "jobs"),
        //Currency
        currencyList: [],
        currencyDS: dataStore(apiUrl + "currencies"),
        currencyRateDS: dataStore(apiUrl + "currencies/rate"),
        //Item
        itemList: [],
        itemDS: dataStore(apiUrl + "items"),
        itemTypeDS: dataStore(apiUrl + "item_types"),
        itemGroupList: [],
        itemGroupDS: dataStore(apiUrl + "items/group"),
        brandDS: dataStore(apiUrl + "brands"),
        categoryList: [],
        categoryDS: dataStore(apiUrl + "categories"),
        itemPriceList: [],
        itemPriceDS: dataStore(apiUrl + "item_prices"),
        measurementList: [],
        measurementDS: dataStore(apiUrl + "measurements"),
        //Tax
        taxList: [],
        taxItemDS: dataStore(apiUrl + "tax_items"),
        //Accounting
        accountList: [],
        accountDS: dataStore(apiUrl + "accounts"),
        accountTypeDS: new kendo.data.DataSource({
            transport: {
                read: {
                    url: apiUrl + "accounts/type",
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
            filter: {
                field: "id >",
                value: 9
            },
            batch: true,
            serverFiltering: true,
            serverSorting: true,
            serverPaging: true,
            page: 1,
            pageSize: 100
        }),
        //Payment Term, Method, Segment
        paymentTermDS: dataStore(apiUrl + "payment_terms"),
        paymentMethodDS: dataStore(apiUrl + "payment_methods"),
        //Segment
        segmentItemList: [],
        segmentItemDS: dataStore(apiUrl + "segments/item"),
        //Txn Template
        txnTemplateList: [],
        txnTemplateDS: dataStore(apiUrl + "transaction_templates"),
        //Prefixes
        prefixList: [],
        prefixDS: dataStore(apiUrl + "prefixes"),
        frequencyList: [{
                id: 'Daily',
                name: 'Day'
            },
            {
                id: 'Weekly',
                name: 'Week'
            },
            {
                id: 'Monthly',
                name: 'Month'
            },
            {
                id: 'Annually',
                name: 'Annual'
            }
        ],
        monthOptionList: [{
                id: 'Day',
                name: 'Day'
            },
            {
                id: '1st',
                name: '1st'
            },
            {
                id: '2nd',
                name: '2nd'
            },
            {
                id: '3rd',
                name: '3rd'
            },
            {
                id: '4th',
                name: '4th'
            }
        ],
        monthList: [{
                id: 0,
                name: 'January'
            },
            {
                id: 1,
                name: 'February'
            },
            {
                id: 2,
                name: 'March'
            },
            {
                id: 3,
                name: 'April'
            },
            {
                id: 4,
                name: 'May'
            },
            {
                id: 5,
                name: 'June'
            },
            {
                id: 6,
                name: 'July'
            },
            {
                id: 7,
                name: 'August'
            },
            {
                id: 8,
                name: 'September'
            },
            {
                id: 9,
                name: 'October'
            },
            {
                id: 10,
                name: 'November'
            },
            {
                id: 11,
                name: 'December'
            }
        ],
        weekDayList: [{
                id: 0,
                name: 'Sunday'
            },
            {
                id: 1,
                name: 'Monday'
            },
            {
                id: 2,
                name: 'Tuesday'
            },
            {
                id: 3,
                name: 'Wednesday'
            },
            {
                id: 4,
                name: 'Thurday'
            },
            {
                id: 5,
                name: 'Friday'
            },
            {
                id: 6,
                name: 'Saturday'
            }
        ],
        dayList: [{
                id: 1,
                name: '1st'
            },
            {
                id: 2,
                name: '2nd'
            },
            {
                id: 3,
                name: '3rd'
            },
            {
                id: 4,
                name: '4th'
            },
            {
                id: 5,
                name: '5th'
            },
            {
                id: 6,
                name: '6th'
            },
            {
                id: 7,
                name: '7th'
            },
            {
                id: 8,
                name: '8th'
            },
            {
                id: 9,
                name: '9th'
            },
            {
                id: 10,
                name: '10th'
            },
            {
                id: 11,
                name: '11st'
            },
            {
                id: 12,
                name: '12nd'
            },
            {
                id: 13,
                name: '13rd'
            },
            {
                id: 14,
                name: '14th'
            },
            {
                id: 15,
                name: '15th'
            },
            {
                id: 16,
                name: '16th'
            },
            {
                id: 17,
                name: '17th'
            },
            {
                id: 18,
                name: '18th'
            },
            {
                id: 19,
                name: '19th'
            },
            {
                id: 20,
                name: '20th'
            },
            {
                id: 21,
                name: '21st'
            },
            {
                id: 22,
                name: '22nd'
            },
            {
                id: 23,
                name: '23rd'
            },
            {
                id: 24,
                name: '24th'
            },
            {
                id: 25,
                name: '25th'
            },
            {
                id: 26,
                name: '26th'
            },
            {
                id: 27,
                name: '27th'
            },
            {
                id: 28,
                name: '28th'
            },
            {
                id: 0,
                name: 'Last'
            }
        ],
        sortList: [{
                text: "All",
                value: "all"
            },
            {
                text: "Today",
                value: "today"
            },
            {
                text: "This Week",
                value: "week"
            },
            {
                text: "This Month",
                value: "month"
            },
            {
                text: "This Year",
                value: "year"
            }
        ],
        statusList: [{
                "id": 1,
                "name": "Active"
            },
            {
                "id": 0,
                "name": "Inactive"
            },
            {
                "id": 2,
                "name": "Void"
            }
        ],
        customerFormList: [{
                id: "Quote",
                name: "Quotation"
            },
            {
                id: "Sale_Order",
                name: "Sale Order"
            },
            {
                id: "Deposit",
                name: "Deposit"
            },
            {
                id: "Cash_Sale",
                name: "Cash Sale"
            },
            {
                id: "Invoice",
                name: "Invoice"
            },
            {
                id: "Cash_Receipt",
                name: "Cash Receipt"
            },
            //{ id: "Sale_Return", name: "Sale Return" },
            {
                id: "GDN",
                name: "Delivered Note"
            }
        ],
        vendorFormList: [{
                id: "Purchase_Order",
                name: "Purchase Order"
            },
            {
                id: "GRN",
                name: "GRN"
            },
            // { id: "Deposit", name: "Deposit" },
            // { id: "Purchase", name: "Purchase" },
            // { id: "Pur_Return", name: "Pur.Return" },
            {
                id: "Cash_Payment",
                name: "Cash Payment"
            }
        ],
        cashFormList: [{
                id: "Cash_Transfer",
                name: "Cash Transaction"
            },
            {
                id: "Cash_Receipt",
                name: "Cash Receipt"
            },
            {
                id: "Cash_Payment",
                name: "Cash Payment"
            },
            {
                id: "Cash_Advance",
                name: "Cash Advance"
            },
            {
                id: "Reimbursement",
                name: "Reimbursement"
            },
            {
                id: "Advance_Settlement",
                name: "Advance Settlement"
            }
        ],
        cashMGTFormList: [{
                id: "Cash_Transfer",
                name: "Transfer"
            },
            {
                id: "Deposit",
                name: "Deposit"
            },
            {
                id: "Withdraw",
                name: "Withdraw"
            },
            {
                id: "Cash_Advance",
                name: "Advance"
            },
            {
                id: "Cash_Payment",
                name: "Payment"
            },
            {
                id: "Reimbursement",
                name: "Reimbursement"
            },
            {
                id: "Journal",
                name: "Journal"
            }
        ],
        genderList: ["M", "F"],
        typeList: ['Invoice', 'Commercial_Invoice', 'Vat_Invoice', 'Electricity_Invoice', 'Utility_Invoice', 'Cash_Sale', 'Commercial_Cash_Sale', 'Vat_Cash_Sale', 'Receipt_Allocation', 'Sale_Order', 'Quote', 'GDN', 'Sale_Return', 'Purchase_Order', 'GRN', 'Cash_Purchase', 'Credit_Purchase', 'Purchase_Return', 'Payment_Allocation', 'Deposit', 'Electricty_Deposit', 'Utility_Deposit', 'Customer_Deposit', 'Vendor_Deposit', 'Withdraw', 'Transfer', 'Journal', 'Item_Adjustment', 'Cash_Advance', 'Reimbursement', 'Direct_Expense', 'Advance_Settlement', 'Additional_Cost', 'Cash_Payment', 'Cash_Receipt', 'Credit_Note', 'Debit_Note', 'Offset_Bill', 'Offset_Invoice', 'Cash_Transfer', 'Internal_Usage'],
        user_id: banhji.userData.id,
        amtDueColor: "#D5DBDB",
        acceptedSrc: "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/accepted.ico",
        approvedSrc: "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/approved.ico",
        cancelSrc: "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/cancel.ico",
        openSrc: "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/open.ico",
        paidSrc: "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/paid.ico",
        partialyPaidSrc: "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/partialy_paid.ico",
        usedSrc: "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/used.ico",
        receivedSrc: "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/received.ico",
        deliveredSrc: "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/delivered.ico",
        successMessage: "Saved Successful!",
        errorMessage: "Warning, please review it again!",
        confirmMessage: "Are you sure, you want to delete it?",
        requiredMessage: "Required",
        duplicateNumber: "Duplicate Number!",
        duplicateInvoice: "Duplicate Invoice!",
        selectCustomerMessage: "Please select a customer.",
        selectSupplierMessage: "Please select a supplier.",
        selectItemMessage: "Please select an item.",
        duplicateSelectedItemMessage: "You already selected this item.",
        meterDS: dataStore(apiUrl + "meters"),
        meterlist: [],
        pageLoad: function() {
            this.loadAccounts();
            // this.accountTypeDS.read();
            // this.loadTaxes();
            // this.loadJobs();
            this.loadSegmentItems();
            this.loadCurrencies();
            this.loadRates();
            this.loadPrefixes();
            this.loadTxnTemplates();

            // this.loadCategories();
            // this.loadItemGroups();
            // this.loadItems();
            // this.itemTypeDS.read();
            // this.loadItemPrices();
            // this.loadMeasurements();

            this.loadContactTypes();
            // this.loadCustomers();
            // this.loadSuppliers();
            // this.loadEmployees();
            // this.loadMeters();
        },
        getFiscalDate: function() {
            var today = new Date(),
                fDate = new Date(today.getFullYear() + "-" + banhji.institute.fiscal_date);

            if (today < fDate) {
                fDate.setFullYear(today.getFullYear() - 1);
            }

            return fDate;
        },
        loadMeters: function() {
            var self = this,
                raw = this.get("meterlist");

            //Clear array
            if (raw.length > 0) {
                raw.splice(0, raw.length);
            }

            this.meterDS.query({
                filter: {
                    field: "type",
                    value: "e"
                },
            }).then(function() {
                var view = self.meterDS.view();

                $.each(view, function(index, value) {
                    raw.push({
                        id: view[index].id,
                        number: view[index].meter_number
                    });
                });
            });
        },
        loadPrefixes: function() {
            var self = this,
                raw = this.get("prefixList");

            //Clear array
            if (raw.length > 0) {
                raw.splice(0, raw.length);
            }

            this.prefixDS.query({
                filter: [],
            }).then(function() {
                var view = self.prefixDS.view();

                $.each(view, function(index, value) {
                    raw.push(value);
                });
            });
        },
        loadTxnTemplates: function() {
            var self = this,
                raw = this.get("txnTemplateList");

            //Clear array
            if (raw.length > 0) {
                raw.splice(0, raw.length);
            }

            this.txnTemplateDS.query({
                filter: []
            }).then(function() {
                var view = self.txnTemplateDS.view();

                $.each(view, function(index, value) {
                    raw.push(value);
                });
            });
        },
        loadCurrencies: function() {
            var self = this,
                raw = this.get("currencyList");

            //Clear array
            if (raw.length > 0) {
                raw.splice(0, raw.length);
            }

            this.currencyDS.query({
                filter: []
            }).then(function() {
                var view = self.currencyDS.view();

                $.each(view, function(index, value) {
                    raw.push(value);
                });
            });
        },
        loadRates: function() {
            this.currencyRateDS.query({
                filter: [],
                sort: {
                    field: "date",
                    dir: "desc"
                }
            });
        },
        getRate: function(locale, date) {
            var rate = 0,
                lastRate = 1;
            $.each(this.currencyRateDS.data(), function(index, value) {
                if (value.locale == locale) {
                    lastRate = kendo.parseFloat(value.rate);

                    if (date >= new Date(value.date)) {
                        rate = kendo.parseFloat(value.rate);

                        return false;
                    }
                }
            });

            //If no rate, use the last rate
            if (rate == 0) {
                rate = lastRate;
            }

            return rate;
        },
        loadTaxes: function() {
            var self = this,
                raw = this.get("taxList");

            //Clear array
            if (raw.length > 0) {
                raw.splice(0, raw.length);
            }

            this.taxItemDS.query({
                filter: []
            }).then(function() {
                var view = self.taxItemDS.view();

                $.each(view, function(index, value) {
                    raw.push(value);
                });
            });
        },
        loadJobs: function() {
            var self = this,
                raw = this.get("jobList");

            //Clear array
            if (raw.length > 0) {
                raw.splice(0, raw.length);
            }

            this.jobDS.query({
                filter: []
            }).then(function() {
                var view = self.jobDS.view();

                $.each(view, function(index, value) {
                    raw.push(value);
                });
            });
        },
        loadSegmentItems: function() {
            var self = this,
                raw = this.get("segmentItemList");

            //Clear array
            if (raw.length > 0) {
                raw.splice(0, raw.length);
            }

            this.segmentItemDS.query({
                filter: {
                    field: "segment_id >",
                    value: 0
                }
            }).then(function() {
                var view = self.segmentItemDS.view();

                $.each(view, function(index, value) {
                    raw.push(value);
                });
            });
        },
        loadAccounts: function() {
            var self = this,
                raw = this.get("accountList");

            //Clear array
            if (raw.length > 0) {
                raw.splice(0, raw.length);
            }

            this.accountDS.query({
                filter: []
            }).then(function() {
                var view = self.accountDS.view();

                $.each(view, function(index, value) {
                    raw.push(value);
                });
            });
        },
        loadCategories: function() {
            var self = this,
                raw = this.get("categoryList");

            //Clear array
            if (raw.length > 0) {
                raw.splice(0, raw.length);
            }

            this.categoryDS.query({
                filter: []
            }).then(function() {
                var view = self.categoryDS.view();

                $.each(view, function(index, value) {
                    raw.push(value);
                });
            });
        },
        loadItemGroups: function() {
            var self = this,
                raw = this.get("itemGroupList");

            //Clear array
            if (raw.length > 0) {
                raw.splice(0, raw.length);
            }

            this.itemGroupDS.query({
                filter: []
            }).then(function() {
                var view = self.itemGroupDS.view();

                $.each(view, function(index, value) {
                    raw.push(value);
                });
            });
        },
        loadItems: function() {
            var self = this,
                raw = this.get("itemList");

            //Clear array
            if (raw.length > 0) {
                raw.splice(0, raw.length);
            }

            this.itemDS.query({
                filter: {
                    field: "status",
                    value: 1
                }
            }).then(function() {
                var view = self.itemDS.view();

                $.each(view, function(index, value) {
                    raw.push(value);
                });
            });
        },
        loadItemPrices: function() {
            var self = this,
                raw = this.get("itemPriceList");

            //Clear array
            if (raw.length > 0) {
                raw.splice(0, raw.length);
            }

            this.itemPriceDS.query({
                filter: [{
                        field: "assembly_id",
                        value: 0
                    },
                    {
                        field: "status",
                        operator: "where_related_item",
                        value: 1
                    }
                ]
            }).then(function() {
                var view = self.itemPriceDS.view();

                $.each(view, function(index, value) {
                    raw.push(value);
                });
            });
        },
        loadMeasurements: function() {
            var self = this,
                raw = this.get("measurementList");

            //Clear array
            if (raw.length > 0) {
                raw.splice(0, raw.length);
            }

            this.measurementDS.query({
                filter: [],
            }).then(function() {
                var view = self.measurementDS.view();

                $.each(view, function(index, value) {
                    raw.push(value);
                });
            });
        },
        loadContactTypes: function() {
            var self = this,
                raw = this.get("contactTypeList");

            //Clear array
            if (raw.length > 0) {
                raw.splice(0, raw.length);
            }

            this.contactTypeDS.query({
                filter: []
            }).then(function() {
                var view = self.contactTypeDS.view();

                $.each(view, function(index, value) {
                    raw.push(value);
                });
            });
        },
        loadCustomers: function() {
            var self = this,
                raw = this.get("customerList");

            //Clear array
            if (raw.length > 0) {
                raw.splice(0, raw.length);
            }

            this.customerDS.query({
                filter: [{
                    field: "parent_id",
                    operator: "where_related_contact_type",
                    value: 1
                }],
                page: 1,
                sort: {
                    field: "id",
                    dir: "desc"
                }
            }).then(function() {
                var view = self.customerDS.view();

                $.each(view, function(index, value) {
                    raw.push(value);
                });
            });

        },
        loadSuppliers: function() {
            var self = this,
                raw = this.get("supplierList");

            //Clear array
            if (raw.length > 0) {
                raw.splice(0, raw.length);
            }

            this.supplierDS.query({
                filter: [{
                    field: "parent_id",
                    operator: "where_related_contact_type",
                    value: 2
                }]
            }).then(function() {
                var view = self.supplierDS.view();

                $.each(view, function(index, value) {
                    raw.push(value);
                });
            });
        },
        loadEmployees: function() {
            var self = this,
                raw = this.get("employeeList");

            //Clear array
            if (raw.length > 0) {
                raw.splice(0, raw.length);
            }

            this.employeeDS.query({
                filter: [{
                        field: "parent_id",
                        operator: "where_related_contact_type",
                        value: 3
                    },
                    {
                        field: "status",
                        value: 1
                    }
                ]
            }).then(function() {
                var view = self.employeeDS.view();

                $.each(view, function(index, value) {
                    raw.push(value);
                });
            });
        },
        getPaymentTerm: function(id) {
            var data = this.paymentTermDS.get(id);
            return data.name;
        },
        getPrefixAbbr: function(type) {
            var abbr = "";
            $.each(this.prefixList, function(index, value) {
                if (value.type == type) {
                    abbr = value.abbr;

                    return false;
                }
            });

            return abbr;
        },
        //Water
        tradeDiscountDS: new kendo.data.DataSource({
            transport: {
                read: {
                    url: apiUrl + "accounts",
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
            filter: [{
                    field: "id",
                    value: 72
                },
                {
                    field: "status",
                    value: 1
                }
            ],
            sort: {
                field: "number",
                dir: "asc"
            },
            batch: true,
            serverFiltering: true,
            serverSorting: true,
            serverPaging: true,
            page: 1,
            pageSize: 100
        }),
        depositAccountDS: new kendo.data.DataSource({
            transport: {
                read: {
                    url: apiUrl + "accounts",
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
            filter: [{
                    field: "account_type_id",
                    operator: "where_in",
                    value: [25, 30]
                },
                {
                    field: "status",
                    value: 1
                }
            ],
            sort: {
                field: "number",
                dir: "asc"
            },
            batch: true,
            serverFiltering: true,
            serverSorting: true,
            serverPaging: true,
            page: 1,
            pageSize: 100
        }),
        incomeAccountDS: new kendo.data.DataSource({
            transport: {
                read: {
                    url: apiUrl + "accounts",
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
            filter: [{
                    field: "account_type_id",
                    operator: "where_in",
                    value: [35, 39]
                },
                {
                    field: "status",
                    value: 1
                }
            ],
            sort: {
                field: "number",
                dir: "asc"
            },
            batch: true,
            serverFiltering: true,
            serverSorting: true,
            serverPaging: true,
            page: 1,
            pageSize: 100
        })
    });
    //-----------------------------------------
    banhji.Index = kendo.observable({
        lang: langVM,
        dataSource: dataStore(apiUrl + "spa/cashreceipt"),
        txnDS: dataStore(apiUrl + "spa/search_invoice"),
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
        accountDS:  new kendo.data.DataSource({
            transport: {
                read: {
                    url: apiUrl + "accounts",
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
                    field: "account_type_id",
                    value: 10
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
            pageSize: 8
        }),
        paymentTermDS: banhji.source.paymentTermDS,
        paymentMethodDS: banhji.source.paymentMethodDS,
        amtDueColor: banhji.source.amtDueColor,
        chhDiscount: false,
        chhFine: false,
        obj: {account_id: 7, issued_date: new Date()},
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
        sessionDS: dataStore(apiUrl + "cashier"),
        pageLoad: function() {
            var self = this;
            // this.get("obj").set("account_id", 7);
            // $("#loadING").css("display", "block");
            this.currencyDS.query({
                sort: {
                    field: "created_at",
                    dir: "asc"
                }
            });
            // .then(function(e) {
            //     self.setCashierItems();
            // });
            // this.addEmpty();
            // this.cashierSessionDS.query({
            //     filter: {
            //         field: "status",
            //         value: 0
            //     },
            //     limit: 1,
            //     sort: {
            //         field: "id",
            //         dir: "desc"
            //     }
            // }).then(function(e) {
            //     var view = self.cashierSessionDS.view();
            //     if (view.length > 0) {
            //         self.set("haveSession", true);
            //         self.updateSessionDS.add({
            //             id: view[0].id,
            //             cashier_id: view[0].cashier_id,
            //             start_date: view[0].start_date,
            //             end_date: new Date(),
            //             status: 1
            //         });
            //         $("#loadING").css("display", "none");
                    this.set("CashierID", JSON.parse(localStorage.getItem('userData/cashier_id')));
            //         self.setReceive();
            //     } else {
            //         self.set("haveSession", false);
            //         self.updateSessionDS.data([]);
            //         self.updateSessionDS.add({
            //             cashier_id: banhji.userData.id,
            //             start_date: new Date(),
            //             end_date: "",
            //             status: 0,
            //             items: []
            //         });
            //         $("#loadING").css("display", "none");
            //     }
            // });
            var self = this;
            this.sessionDS.query({
                filter: [
                    {field: "cashier_id", value: banhji.userData.id},
                    {field: "active", value: 1}
                ],
                pageSize: 1
            }).then(function(e){
                if(self.sessionDS.data().length <= 0){
                    alert("You didn't have session yet.");
                    window.location.href = "<?php echo base_url(); ?>wellnez/session";
                }
            })
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
                searchText =  this.get("searchText");
                para.push({
                    field: "number",
                    value: searchText
                });
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
                                var amount_due = v.amount;
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
            // this.receipCurrencyDS.sync();
            // this.receipChangeDS.sync();
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
                self.set("paymentReceiptToday", kendo.toString(view[0].total_amount,banhji.locale == "km-KH" ? "c0" : "c", banhji.locale));
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
                var moneyReceipt = this.invobj.amount;
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
        },
        invoiceDS : dataStore(apiUrl + "spa/allinvoice"),
        actionAR : [
            {id: 1, name: 'Pay'},
            {id: 1, name: 'Loyalty'},
            {id: 1, name: 'Split'},
            {id: 1, name: 'Print'},
        ],
        account_id : 7,
        actionChange : function(e){
            var idx = e.sender.selectedIndex;
            var id = e.data.id;
            var data = this.invoiceDS.data()[id];
            var obj = this.get("obj");
            console.log(data);
            if(idx == 1){
                
            }else if(idx == 2){
                this.addLoyalty(id);
            }else if(idx == 3){
                this.splitBill(id);
            }else if(idx == 4){
                this.printBill(id);
            }
        },
        billTxnDS   : dataStore(apiUrl + "spa/paybill"),
        payBill     : function(id){
            $("#loadImport").css("display", "none");
            var self = this;
            var obj = this.get("invobj");
            this.billTxnDS.data([]);
            this.billTxnDS.add({
                transaction_id: obj.id,
                type: "Cash_Receipt",
                user_id: banhji.userData.id,
                sub_total: obj.sub_total,
                amount: obj.amount,
                issued_date: obj.issued_date,
                account_id: this.get("account_id"),
                receipt_note: this.receipCurrencyDS.data(),
                change_note: this.receipChangeDS.data()
            });
            this.billTxnDS.sync();
            this.billTxnDS.bind("requestEnd", function(e){
                var type = e.type;
                if (type !== 'read') {
                    var noti = $("#ntf1").data("kendoNotification");
                    noti.hide();
                    noti.success(self.lang.lang.success_message);
                    $("#loadImport").css("display", "none");
                    self.invoiceDS.query({});
                    self.set("total", 0);
                    self.set("amountReciept", 0);
                    self.set("btnActive", false);
                    self.set("invobj", []);
                    self.receipChangeDS.data([]);
                    self.receipCurrencyDS.data([]);
                }
            });
        },
        addLoyalty  : function(id){
        },
        splitBill   : function(){
            banhji.router.navigate("/split_bill/"+this.get("invobj").id);
        },
        printBill   : function(id){
        },
        discount    : 0,
        invobj      : null,
        invClick    : function(e){
            var data = e.data;
            this.set("total", data.amount);
            this.set("amountReciept", data.amount);
            this.set("btnActive", true);
            this.set("invobj", data);
            this.receipChangeDS.data([]);
            this.setDefaultReceiptCurrency(data.amount);
        },
    });
    banhji.splitBill = kendo.observable({
        roomDS      : dataStore(apiUrl + "spa/room"),
        itemDS      : dataStore(apiUrl + "item_lines"),
        item1       : [],
        item2       : [],
        item3       : [],
        item4       : [],
        txnID       : "",
        stopItemM   : false,
        numSplit    : [],
        pageLoad    : function(id){
            if(id){
                var self = this;
                this.item1.slice(0, this.item1.length);
                this.item2.slice(0, this.item2.length);
                this.item3.slice(0, this.item3.length);
                this.item4.slice(0, this.item4.length);
                this.itemDS.query({
                    filter: {field: "transaction_id", value: id}
                }).then(function(e){
                    if(self.itemDS.data().length == 1){
                        self.set("stopItemM", true);
                    }else{
                        self.set("stopItemM", false);
                    }
                });
                this.set("txnID", id);
            }else{
                banhji.router.navigate("/");
            }
        },
        splitDS     : dataStore(apiUrl + "spa/splitbill"),
        saveItem    : function(){
            if(this.item1.length > 0){
                if(this.itemDS.data().length > 0){
                    this.splitDS.data([]);
                    this.splitDS.add({
                        transaction_id: this.get("txnID"),
                        userid: banhji.userData.id,
                        item: this.itemDS.data(),
                        item_one: this.item1,
                        item_two: this.item2,
                        item_three: this.item3,
                        item_four: this.item4,
                    });
                    this.splitDS.sync();
                    this.splitDS.bind("requestEnd", function(e){
                        if(e.type != 'read' && e.response.results) {
                            banhji.printBill.dataSource = [];
                            banhji.printBill.dataSource = e.response.results;
                            banhji.router.navigate("/print_bill");
                        }
                    });
                }else{
                    alert("Incorrect Input!");
                }
            }else{
                alert("Incorrect Input!");
            }
        }
    });
    banhji.printBill = kendo.observable({
        lang: langVM,
        dataSource: [],
        company: banhji.institute,
        pageLoad: function() {
            if (this.dataSource.length <= 0) {
                banhji.router.navigate('/');
            }
            var self = this;
            var TempForm = $("#invoiceForm").html();
            $("#invoiceContent").kendoListView({
                dataSource: this.dataSource,
                template: kendo.template(TempForm)
            });
            this.barcod("do");
        },
        barcod: function(re) {
            var view = this.dataSource;
            for (var i = 0; i < view.length; i++) {
                var d = view[i];
                if (re == "reset") {
                    $("#secondwnumber" + d.id).css("height", "0px").data("kendoBarcode").resize();
                    $("#footwnumber" + d.id).css("height", "0px").data("kendoBarcode").resize();
                } else {
                    $("#secondwnumber" + d.id).kendoBarcode({
                        renderAs: "svg",
                        value: d.number,
                        type: "code128",
                        width: 250,
                        height: 25,
                        text: {
                            visible: false
                        }
                    });
                    $("#footwnumber" + d.id).kendoBarcode({
                        renderAs: "svg",
                        value: d.number,
                        type: "code128",
                        width: 250,
                        height: 25,
                        text: {
                            visible: false
                        }
                    });
                }
                var DataM = [],
                    MonthM = [];
                $.each(d.minusMonth, function(i, v) {
                    DataM.push(v.usage);
                    MonthM.push(v.month);
                });
                $("#monthchart" + d.id).kendoChart({
                    title: {
                        text: ""
                    },
                    series: [{
                        name: "",
                        data: DataM,
                        color: '#236DA4',
                        overlay: {
                            gradient: 'none'
                        }
                    }],
                    categoryAxis: {
                        categories: MonthM
                    }
                });
            }
        },
        printGrid: function() {
            var self = this,
                Win, pHeight, pWidth, ts;
            Win = window.open('', '', 'width=1000, height=900');
            pHeight = "210mm";
            pWidth = "150mm";
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
                '-webkit-print-color-adjust:exact; ' +
                '} ' +
                '}' +
                '.main-color {' +
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
                '<body style="background: #fff;"><div class="row-fluid" ><div id="example" class="k-content">';
            var htmlEnd =
                '</div></div></body>' +
                '</html>';
            printableContent = $('#wInvoiceContent').html();
            doc.write(htmlStart + printableContent + htmlEnd);
            doc.close();
            setTimeout(function() {
                win.print();
                //win.close();
            }, 2000);
        },
        hideFrameInvoice: function(e) {
            var printBtn = e.target;
            if (printBtn.checked) {
                $(".hiddenPrint").css("visibility", "hidden");
            } else {
                $(".hiddenPrint").css("visibility", "visible");
            }
        },
        cancel: function() {
            this.dataSource = [];
            this.barcod("reset");
            var listview = $("#invoiceContent").data("kendoListView");
            listview.refresh();
            window.history.back();
        }
    });
    /* views and layout */
    banhji.view = {
        layout: new kendo.Layout('#layout', {
            model: banhji.Layout
        }),
        blank: new kendo.View('<div></div>'),
        index: new kendo.Layout("#index", {
            model: banhji.index
        }),
        menu: new kendo.Layout('#menu-tmpl', {
            model: banhji.userManagement
        }),
        searchAdvanced: new kendo.Layout("#searchAdvanced", {
            model: banhji.searchAdvanced
        }),
        //------------------------------------
        Index: new kendo.Layout("#Index", {
            model: banhji.Index
        }),
        splitBill: new kendo.Layout("#splitBill", {
            model: banhji.splitBill
        }),
        printBill: new kendo.Layout("#printBill", {
            model: banhji.printBill
        }),
    };
    /* views and layout */
    banhji.router = new kendo.Router({
        init: function() {
            var language = JSON.parse(localStorage.getItem('userData/lang'));
            switch (language) {
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
            localforage.getItem('user', function(err, data) {
                if (err) {

                } else {
                    $('#current-section').html('|&nbsp;Company');
                    $('#home-menu').addClass('active');
                    banhji.view.layout.render("#wrapperApplication");
                    banhji.index.set('companyName', data.institute.name);
                    banhji.index.set('companyLogo', data.institute.logo);
                    var blank = new kendo.View('#blank-tmpl');
                    banhji.view.layout.showIn('#menu', banhji.view.menu);
                    if (userPool.getCurrentUser() == null) {
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
    banhji.router.route('/', function() {
        var blank = new kendo.View('#blank-tmpl');
        banhji.view.layout.showIn('#content', banhji.view.Index);
        banhji.Index.pageLoad();
    });
    banhji.router.route('/split_bill(/:id)', function(id) {
        var blank = new kendo.View('#blank-tmpl');
        banhji.view.layout.showIn('#content', banhji.view.splitBill);
        banhji.splitBill.pageLoad(id);
    });
    banhji.router.route('/print_bill', function() {
        var blank = new kendo.View('#blank-tmpl');
        banhji.view.layout.showIn('#content', banhji.view.printBill);
        banhji.printBill.pageLoad();
    });
    
    $(function() {
        banhji.accessMod.query({
            filter: {
                field: 'username',
                value: JSON.parse(localStorage.getItem('userData/user')).username
            }
        }).then(function(e) {
            var allowed = false;
            if (banhji.accessMod.data().length > 0) {
                for (var i = 0; i < banhji.accessMod.data().length; i++) {
                    if ("wellnez" == banhji.accessMod.data()[i].name.toLowerCase()) {
                        if(banhji.userData.role == 1){
                            allowed = true;
                        }else{
                            $.each(banhji.userData.roles, function(i,v){
                                if(v.name == 'wnz_receipt'){
                                    allowed = true;
                                }
                            });
                        }
                        break;
                    }
                }
            }
            if (!allowed) {
                alert("You don't have permission to access this page!");
                window.location.replace(baseUrl + "wellnez/home");
                // banhji.view.layout.showIn("#content", banhji.view.wDashBoard);
            }
            $("#holdpageloadhide").css("display", "none");
        });
        banhji.source.contactDS.read().then(function() {
            banhji.router.start();
            // banhji.source.loadData();
            banhji.source.pageLoad();
        });

        function loadStyle(href) {
            // avoid duplicates
            for (var i = 0; i < document.styleSheets.length; i++) {
                if (document.styleSheets[i].href == href) {
                    return;
                }
            }
            var head = document.getElementsByTagName('head')[0];
            var link = document.createElement('link');
            link.rel = 'stylesheet';
            link.type = 'text/css';
            link.href = href;
            head.appendChild(link);
        }
        var Href1 = '<?php echo base_url(); ?>assets/water/winvoice-res.css';
        var Href2 = '<?php echo base_url(); ?>assets/water/winvoice-print.css';
    });
</script>