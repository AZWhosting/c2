<script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/js/libs/localforage.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.4.0/jszip.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.8.0/xlsx.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
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
    //-----------------------------------------
    banhji.Index = kendo.observable({
        lang                : langVM,
        cancel              : function(){
            window.history.back();
        }
    });
    //card
    banhji.cardCenter = kendo.observable({
        lang                : langVM,
        transactionDS       : dataStore(apiUrl + 'transactions'),
        noteDS              : dataStore(apiUrl + 'notes'),
        attachmentDS        : dataStore(apiUrl + "attachments"),
        contactDS           : dataStore(apiUrl + "contacts"),
        txnDS               : dataStore(apiUrl + "transactions"),
        cardDS              : dataStore(apiUrl + 'spa/card'),
        haveRight           : false,
        pageLoad            : function(){
            if(banhji.userData.role == "1"){
                this.set("haveRight", true);
            }else{
                this.set("haveRight", false);
                $.each(banhji.userData.roles, function(i,v){
                    if(v.name == 'wnz_loyalty'){
                        this.set("haveRight", true);
                    }
                });
            }
            this.activateDS.data([]);
            this.set("acobj", null);
            this.activateDS.insert(0, {
                "card_id"           : 0,
                "gender"             : "M",
                "activated_by"       : banhji.userData.id,
                "serial"             : "",
                "number"             : "",
                "name"               : "",
                "dob"                : "",
                "locale"            : banhji.locale,
                "phone"             : "",
                "nationality"       : "",
                "registered_date"   : new Date(),
            });
            var obj = this.activateDS.at(0);
            this.set("acobj", obj);
        },
        cardNotActivate     : false,
        remove              : function (e) {
            console.log("a");
        },
        obj                 : null,
        acobj               : null,
        genderAR            : [
            {id: "M", name: "Male"},
            {id: "F", name: "Female"}
        ],
        selectedRow         : function(e){
            var data = e.data;
            this.set("obj", data);
            if(data.status == "Not Activated"){
                this.set("cardNotActivate", true);
            }else{
                this.set("cardNotActivate", false);
            }
            this.cardLoyaltyDS.query({
                filter : {field: "card_id", value: data.id}
            });
            this.get("acobj").set("number", data.number); 
        },
        haveCard            : false,
        cardSeachDS         : dataStore(apiUrl + "spa/card"),
        searchCard           : function(){
            var self = this;
            this.set("haveCard", false);
            this.cardSeachDS.query({
                filter: [
                    {field: "number", value: this.acobj.number},
                    {field: "serial", value: this.acobj.serial}
                ],
                pageSize: 1,
            }).then(function(e){
                var v = self.cardSeachDS.view();
                if(v.length > 0){
                    self.set("haveCard", true);
                    self.acobj.set("card_id", v[0].id);
                }else{
                    alert("No Data!");
                    self.get("acobj").set("serial", "");
                    self.set("haveCard", false);
                    self.cancelActivate();
                }
            });
        },
        activateShow        : false,
        activateCard     : function(){
            this.set("activateShow", true);
            $("#loadImport").css("display", "block");
        },
        cancelActivate      : function(){
            this.set("activateShow", false);
            $("#loadImport").css("display", "none");
            this.cardDS.query({});
        },
        activateDS          : dataStore(apiUrl + "spa/activate_card"),
        activateNow         : function(){
            var obj = this.get("acobj");
            var self = this;
            if(obj.number && obj.serial && obj.name){
                this.activateDS.sync();
                this.activateDS.bind("requestEnd", function(e){ 
                    if(e.response.type != 'read'){
                        self.cancelActivate();
                        alert("Successful!");
                    }
                });
            }else{
                alert("Feild Required!");
            }
        },
        registered_date   : new Date(),
        cardLoyaltyDS       : dataStore(apiUrl + "spa/card_loyalty"),
        loyaltyDS           : dataStore(apiUrl + "spa/loyalty"),
        loyaltyShow         : false,
        addLoyalty          : function(){
            this.set("loyaltyShow", true);
            $("#loadImport").css("display", "block");
        },
        cancelAddLoyalty      : function(){
            this.set("loyaltyShow", false);
            $("#loadImport").css("display", "none");
        },
        addLoyaltyDS        : dataStore(apiUrl + "spa/card_loyalty"),
        addLoyaltyNow       : function(){
            var obj = this.get("obj");
            if(obj.id && this.get("loyalty_selected")){
                var self = this;
                this.addLoyaltyDS.data([]);
                this.addLoyaltyDS.add({
                    loyalty_id      : this.get("loyalty_selected"),
                    card_id         : obj.id,
                });
                this.addLoyaltyDS.sync();
                this.addLoyaltyDS.bind("requestEnd", function(e){ 
                    if(e.response.type != 'read'){
                        self.cancelAddLoyalty();
                        var noti = $("#ntf1").data("kendoNotification");
                            noti.hide();
                            noti.success(self.lang.lang.success_message);
                    }
                });
            }else{
                alert("Feild Required!");
            }
        },
        search              : function(){
            var self = this,
            para = [],
            searchText = this.get("searchText");

            if(searchText){
                para.push({ field: "number", operator: "contains", value: searchText });
            }

            this.cardDS.filter(para);

            //Clear search filters
            this.set("searchText", "");
        },
        cancel              : function(){
            banhji.router.navigate("/");
        }
    });
    banhji.Card = kendo.observable({
        lang        : langVM,
        dataSource  : dataStore(apiUrl + "spa/card"),
        isEdit      : false,
        pageLoad    : function(id){
            if(id){
                this.loadObj(id);
            }else{
                this.addEmpty();
            }
            $("#loadImport").css("display", "none");
        },
        obj         : null,
        addEmpty                : function(){
            this.dataSource.data([]);
            this.set("obj", null);
            this.dataSource.insert(0, {
                "name"               : "",
                "number"             : "",
                "serial"             : ""
            });
            var obj = this.dataSource.at(0);
            this.set("obj", obj);
        },
        loadObj                 : function(id){
            var self = this;
            this.dataSource.query({
                filter: {field: "id", value: id},
                page: 1,
                pageSize: 1
            }).then(function(e){
                var view = self.dataSource.view();
                self.set("obj", view[0]);
            });
        },
        save        : function(e){
            var self = this;
            $("#loadImport").css("display", "block");
            this.dataSource.sync();
            this.dataSource.bind("requestEnd", function(e){
                if(e.type != 'read' && e.response.results) {
                    self.cancel();
                    $("#loadImport").css("display", "none");
                    banhji.cardCenter.cardDS.query({});
                    var noti = $("#ntf1").data("kendoNotification");
                        noti.success(self.lang.lang.success_message);
                }
            });
        },
        exsistNumDS  : dataStore(apiUrl + "spa/card"),
        numberChange : function(){
            var obj = this.get("obj");
            var self = this;
            this.exsistNumDS.query({
                filter : { field: "number", value: obj.number}
            }).then(function(e){
                var v = self.exsistNumDS.view();
                if(v.length > 0){
                    alert("Card Number is already exsist!");
                    obj.set("number", "");
                }
            })
        },
        cancel      : function(e){
            this.dataSource.data([]);
            this.addEmpty();
            banhji.router.navigate("/");
            $("#loadImport").css("display", "none");
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
        cardCenter: new kendo.Layout("#cardCenter", {
            model: banhji.cardCenter
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
    });
    banhji.router.route('/card_center', function() {
        banhji.view.layout.showIn("#content", banhji.view.cardCenter);
        banhji.cardCenter.pageLoad();
    });
    banhji.router.route("/card(/:id)", function(id){
        banhji.view.layout.showIn("#content", banhji.view.Card);
        kendo.fx($("#slide-form")).slideIn("down").play();
        banhji.Card.pageLoad(id);
    });
    banhji.router.route('/loyalty_center', function() {
        banhji.view.layout.showIn("#content", banhji.view.loyaltyCenter);
        var vm = banhji.loyaltyCenter;
        vm.pageLoad();
    });
    banhji.router.route("/loyalty(/:id)", function(id){
        banhji.view.layout.showIn("#content", banhji.view.Loyalty);
        kendo.fx($("#slide-form")).slideIn("down").play();
        banhji.Loyalty.pageLoad(id);
    });
    $(function() {
        $("#holdpageloadhide").css("display", "none");
        banhji.router.start();
        var x = banhji.userData.username;
        $("#userCut").text(x);
    });
</script>