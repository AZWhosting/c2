<script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/js/libs/localforage.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jszip/2.4.0/jszip.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyDHdcKFHr8gdDC_eeCHgd8240VErCHuDAE"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.8.0/xlsx.js"></script>
<script>
    $(document).ready(function() {
        $("nav").find("li").on("click", "a", function() {
            $('.navbar-collapse.in').collapse('hide');
        });
    });
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
    banhji.invoice = kendo.observable({
        makes: new kendo.data.DataSource({
            transport: {
                read: {
                    url: baseUrl + 'api/winvoices/make',
                    type: "GET",
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
            pageSize: 100
        }),
        dataSource: new kendo.data.DataSource({
            transport: {
                read: {
                    url: baseUrl + 'api/winvoices',
                    type: "GET",
                    dataType: 'json',
                    headers: {
                        Institute: JSON.parse(localStorage.getItem('userData/user')).institute.id
                    }
                },
                create: {
                    url: baseUrl + 'api/winvoices',
                    type: "POST",
                    dataType: 'json',
                    headers: {
                        Institute: JSON.parse(localStorage.getItem('userData/user')).institute.id
                    }
                },
                update: {
                    url: baseUrl + 'api/winvoices',
                    type: "PUT",
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
            sort: {
                field: "worder",
                operator: "where_related_meter",
                dir: "asc"
            },
            batch: true,
            serverFiltering: true,
            serverPaging: true,
            pageSize: 100
        }),
        remove: function(e) {
            this.dataSource.remove(e.data);
        },
        queryReading: function() {
            var dfd = $.Deferred();
            return this.makes.query({
                filter: {
                    field: '',
                    value: ''
                }
            });
        },
        save: function() {
            var that = this,
                dfd = $.Deferred();
            this.dataSource.sync();
            this.dataSource.bind('requestEnd', function(e) {
                if (e.type != 'read' && e.response.results) {
                    dfd.resolve(e.response.results);
                } else {
                    dfd.reject(e.response);
                }
            });
            this.dataSource.bind('error', function(e) {
                dfd.reject(e.status);
            });
            return dfd.promise();
        }
    });
    banhji.installment = kendo.observable({
        dataSource: dataStore(apiUrl + "installments"),
        startDate: new Date(),
        period: 12,
        percentage: 0,
        setDate: function(date) {
            this.set('startDate', date);
        },
        setPeriod: function(period) {
            this.set('period', period);
        },
        makeSchedule: function(amount, meterId, startDate, period, percentage) {
            var dfd = $.Deferred();
            try {
                if (amount == undefined) throw "TypeError: Amount is not defined";

                banhji.installment.dataSource.insert(0, {
                    biller_id: banhji.userData.id,
                    meter_id: meterId,
                    percentage: percentage,
                    start_month: kendo.toString(startDate, 'yyyy-MM-dd'),
                    amount: amount,
                    payment_number: null,
                    period: period,
                    invoiced: 0
                });
                dfd.resolve(banhji.installment.dataSource.at(0));
                return dfd.promise();
            } catch (err) {
                dfd.reject(err);
            }

        },
        save: function() {
            var dfd = $.Deferred();
            banhji.installment.dataSource.sync();
            banhji.installment.dataSource.bind('requestEnd', function(e) {
                if (e.response) {
                    dfd.resolve(e.response.results);
                } else {
                    dfd.reject(false);
                }
            });
            banhji.installment.dataSource.bind('error', function(e) {
                dfd.reject(e);
            });
            return dfd.promise();
        }
    });
    /*Reading*/
    banhji.reading = kendo.observable({
        lang: langVM,
        meterVM: banhji.meter,
        dataSource: dataStore(apiUrl + "readings"),
        uploadDS: dataStore(apiUrl + "readings/books"),
        licenseDS: dataStore(apiUrl + "branches"),
        blocDS: dataStore(apiUrl + "locations"),
        subLocationDS: dataStore(apiUrl + "locations"),
        boxDS: dataStore(apiUrl + "locations"),
        licenseDSU: dataStore(apiUrl + "branches"),
        blocDSU: dataStore(apiUrl + "locations"),
        subLocationDSU: dataStore(apiUrl + "locations"),
        boxDSU: dataStore(apiUrl + "locations"),
        meterDS: dataStore(apiUrl + "meters/record"),
        existReading: dataStore(apiUrl + "readings"),
        itemDS: null,
        obj: null,
        monthOfSelect: null,
        licenseSelect: null,
        blocSelect: null,
        selectMeter: false,
        haveData: false,
        rows: [],
        miniMonthofS: new Date(),
        haveLicense: false,
        haveLocation: false,
        haveSubLocation: false,
        haveLicenseU: false,
        haveLocationU: false,
        haveSubLocationU: false,
        pageLoad: function(id) {},
        licenseChange: function(e) {
            var self = this;
            this.blocDS.data([]);
            this.set("locationSelect", "");
            this.set("haveLicense", false)
            this.subLocationDS.data([]);
            this.boxDS.data([]);
            this.set("boxSelect", "");
            this.set("haveLocation", false);
            this.set("haveSubLocation", false);

            this.blocDS.filter([{
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
            this.set("haveLicense", true);
        },
        onLocationChange: function(e) {
            var self = this;
            this.subLocationDS.data([]);
            this.boxDS.data([]);
            this.set("boxSelect", "");
            this.set("haveSubLocation", false);
            if (this.get("blocSelect")) {
                this.subLocationDS.query({
                        filter: [{
                                field: "branch_id",
                                value: this.get("licenseSelect")
                            },
                            {
                                field: "main_bloc",
                                value: this.get("blocSelect")
                            },
                            {
                                field: "main_pole",
                                value: 0
                            }
                        ],
                        page: 1
                    })
                    .then(function(e) {
                        if (self.subLocationDS.data().length > 0) {
                            self.set("haveLocation", true);
                        } else {
                            self.set("haveLocation", false);
                            self.set("subLocationSelect", "");
                            self.subLocationDS.data([]);
                        }
                    });
            }
        },
        onSubLocationChange: function(e) {
            var self = this;
            if (this.get("subLocationSelect")) {
                this.boxDS.query({
                        filter: [{
                                field: "branch_id",
                                value: this.get("licenseSelect")
                            },
                            {
                                field: "main_bloc",
                                value: this.get("blocSelect")
                            },
                            {
                                field: "main_pole",
                                value: this.get("subLocationSelect")
                            }
                        ]
                    })
                    .then(function(e) {
                        if (self.boxDS.data().length > 0) {
                            self.set("haveSubLocation", true);
                        } else {
                            self.set("haveSubLocation", false);
                            self.set("boxSelect", "");
                            self.boxDS.data([]);
                        }
                    });
            }
        },
        licenseChangeU: function(e) {
            var self = this;
            this.blocDSU.data([]);
            this.set("locationSelectU", "");
            this.set("haveLicenseU", false)
            this.subLocationDSU.data([]);
            this.boxDSU.data([]);
            this.set("boxSelectU", "");
            this.set("haveLocationU", false);
            this.set("haveSubLocationU", false);

            this.blocDSU.filter([{
                    field: "branch_id",
                    value: this.get("licenseSelectU")
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
            this.set("haveLicenseU", true);
        },
        monthOfUen: false,
        onLocationChangeU: function(e) {
            var self = this;
            this.set("monthOfUen", true);
            this.subLocationDSU.data([]);
            this.boxDSU.data([]);
            this.set("boxSelectU", "");
            this.set("haveSubLocationU", false);
            if (this.get("blocSelectU")) {
                this.subLocationDSU.query({
                        filter: [{
                                field: "branch_id",
                                value: this.get("licenseSelectU")
                            },
                            {
                                field: "main_bloc",
                                value: this.get("blocSelectU")
                            },
                            {
                                field: "main_pole",
                                value: 0
                            }
                        ],
                        page: 1
                    })
                    .then(function(e) {
                        if (self.subLocationDSU.data().length > 0) {
                            self.set("haveLocationU", true);
                        } else {
                            self.set("haveLocationU", false);
                            self.set("subLocationSelectU", "");
                            self.subLocationDSU.data([]);
                        }
                    });
            }
        },
        onSubLocationChangeU: function(e) {
            var self = this;
            if (this.get("subLocationSelectU")) {
                this.boxDSU.query({
                        filter: [{
                                field: "branch_id",
                                value: this.get("licenseSelectU")
                            },
                            {
                                field: "main_bloc",
                                value: this.get("blocSelectU")
                            },
                            {
                                field: "main_pole",
                                value: this.get("subLocationSelectU")
                            }
                        ]
                    })
                    .then(function(e) {
                        if (self.boxDSU.data().length > 0) {
                            self.set("haveSubLocationU", true);
                        } else {
                            self.set("haveSubLocationU", false);
                            self.set("boxSelectU", "");
                            self.boxDSU.data([]);
                        }
                    });
            }
        },
        search: function() {
            this.uploadDS.data([]);
            this.set("haveData", false);
            var monthOfSearch = this.get("monthOfSelect"),
                license_id = this.get("licenseSelect"),
                bloc_id = this.get("blocSelect");
            var para = [];
            if (license_id) {
                if (bloc_id) {
                    this.set("selectMeter", true);
                    if (this.get("boxSelect")) {
                        para.push({
                            field: "box_id",
                            value: this.get("boxSelect")
                        });
                    } else if (this.get("subLocationSelect")) {
                        para.push({
                            field: "pole_id",
                            value: this.get("subLocationSelect")
                        });
                    } else {
                        para.push({
                            field: "location_id",
                            value: bloc_id
                        });
                    }
                    var self = this;
                    this.uploadDS.query({
                        filter: para
                    }).then(function() {
                        var FromDate, ToDate, MonthOf;
                        self.rows = [];
                        if (self.uploadDS.data().length > 0) {
                            self.set("haveData", true);
                            self.rows.push({
                                cells: [{
                                        value: "_contact",
                                        background: "#496cad",
                                        color: "#ffffff"
                                    },
                                    {
                                        value: "meter_number",
                                        background: "#496cad",
                                        color: "#ffffff"
                                    },
                                    {
                                        value: "from_date",
                                        background: "#496cad",
                                        color: "#ffffff"
                                    },
                                    {
                                        value: "to_date",
                                        background: "#496cad",
                                        color: "#ffffff"
                                    },
                                    {
                                        value: "month_of",
                                        background: "#496cad",
                                        color: "#ffffff"
                                    },
                                    {
                                        value: "previous",
                                        background: "#496cad",
                                        color: "#ffffff"
                                    },
                                    {
                                        value: "current",
                                        background: "#496cad",
                                        color: "#ffffff"
                                    }
                                ]
                            });
                            for (var i = 0; i < self.uploadDS.data().length; i++) {
                                FromDate = kendo.toString(new Date(self.uploadDS.data()[i].from_date), "dd-MMM-yyyy");
                                ToDate = kendo.toString(new Date(self.uploadDS.data()[i].to_date), "dd-MMM-yyyy");
                                MonthOf = kendo.toString(new Date(self.uploadDS.data()[i].month_of), "MMM-yyyy");
                                self.rows.push({
                                    cells: [{
                                            value: self.uploadDS.data()[i]._contact
                                        },
                                        {
                                            value: self.uploadDS.data()[i].meter_number
                                        },
                                        {
                                            value: FromDate
                                        },
                                        {
                                            value: ToDate
                                        },
                                        {
                                            value: MonthOf
                                        },
                                        {
                                            value: self.uploadDS.data()[i].previous
                                        },
                                        {
                                            value: self.uploadDS.data()[i].current
                                        }
                                    ]
                                });
                            }
                        }
                    });
                } else {
                    alert("Please Select Location");
                }
            } else {
                alert("Please Select License");
            }
        },
        monthOfSR: null,
        toDateSR: null,
        NumberSR: null,
        previousSR: 0,
        currentSR: 0,
        toDateDisabled: true,
        addSingleReading: function() {
            var self = this;
            if (banhji.reading.get('monthOfSR')) {
                if (kendo.parseInt(banhji.reading.get('previousSR')) > kendo.parseInt(banhji.reading.get('currentSR'))) {
                    alert("Current Reading is smaller than Previous Reading");
                } else {
                    banhji.reading.dataSource.insert(0, {
                        month_of: banhji.reading.get('monthOfSR'),
                        to_date: banhji.reading.get('toDateSR'),
                        meter_number: banhji.reading.get('NumberSR'),
                        previous: banhji.reading.get('previousSR'),
                        current: banhji.reading.get('currentSR'),
                        invoiced: 0,
                        condition: "new",
                        consumption: banhji.reading.get('currentSR') - banhji.reading.get('previousSR')
                    });
                    banhji.reading.dataSource.sync();
                    banhji.reading.dataSource.bind("requestEnd",
                        function(data) {
                            var notificat = $("#ntf1").data("kendoNotification");
                            notificat.hide();
                            notificat.success(self.lang.lang.success_message);
                            banhji.reading.set('monthOfSR', null);
                            banhji.reading.set('toDateSR', null);
                            banhji.reading.set('previousSR', null);
                            banhji.reading.set('currentSR', null);
                            $("#loadImport").css("display", "none");
                        }
                    );
                }
            } else {
                var notificat = $("#ntf1").data("kendoNotification");
                notificat.hide();
                notificat.error(this.lang.lang.field_required_message);
            }
        },
        exportEXCEL: function(e) {
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
                        }
                    ],
                    title: "Reading",
                    rows: this.rows
                }]
            });
            //save the file as Excel file with extension xlsx
            kendo.saveAs({
                dataURI: workbook.toDataURL(),
                fileName: "Reading-" + "<?php echo date('d-M-Y'); ?>" + ".xlsx"
            });
        },
        MonthTo: false,
        errorShow: false,
        existShow: false,
        fullCorrect: false,
        Uploaderror: [],
        ExistRUpload: [],
        monthOfUSelect: function(e) {
            $("#loadImport").css("display", "block");
            var para = [],
                self = this;
            var monthOfSearch = self.get("monthOfUpload");
            var monthOf = new Date(monthOfSearch);
            monthOf.setDate(1);
            monthOf = kendo.toString(monthOf, "yyyy-MM-dd");
            var monthL = new Date(monthOfSearch);
            var lastDayOfMonth = new Date(monthL.getFullYear(), monthL.getMonth() + 1, 0);
            lastDayOfMonth = lastDayOfMonth.getDate();
            monthL.setDate(lastDayOfMonth);
            monthL = kendo.toString(monthL, "yyyy-MM-dd");
            if (this.get("boxSelectU")) {
                para.push({
                    field: "box_id",
                    operator: "where_related_meter",
                    value: this.get("boxSelectU")
                });
            } else if (this.get("subLocationSelectU")) {
                para.push({
                    field: "pole_id",
                    operator: "where_related_meter",
                    value: this.get("subLocationSelectU")
                });
            } else {
                para.push({
                    field: "location_id",
                    operator: "where_related_meter",
                    value: this.get("blocSelectU")
                });
            }
            para.push({
                field: "month_of >",
                value: monthOf
            }, {
                field: "month_of <=",
                value: monthL
            });
            this.existReading.query({
                    filter: para
                })
                .then(function(e) {
                    self.set("toDateDisabled", false);
                    $("#loadImport").css("display", "none");
                });
        },
        selectMonthTo: function(e) {
            if (this.get("monthOfUpload") && this.get("toDateUpload")) {
                this.set("MonthTo", true);
            } else {
                this.set("MonthTo", false);
            }
        },
        onSelected: function(e) {
            var files = e.files,
                self = this;
            $('li.k-file').remove();
            this.Uploaderror.splice(0, this.Uploaderror.length);
            this.ExistRUpload.splice(0, this.ExistRUpload.length);
            $("#loadImport").css("display", "block");
            var reader = new FileReader();
            banhji.reading.dataSource.data([]);
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
                            for (var j = 0; j < self.existReading.data().length; j++) {
                                if (roa[i].meter_number == self.existReading.data()[j].meter_number) {
                                    self.ExistRUpload.push({
                                        line: j + 1,
                                        meter_number: roa[i].meter_number,
                                        previous: roa[i].previous,
                                        current: roa[i].current,
                                        status: 0
                                    });
                                }
                            }
                            roa[i].invoiced = 0;
                            var monthOf = self.get("monthOfUpload");
                            monthOf.setDate(1);
                            roa[i].month_of = monthOf;
                            roa[i].from_date = new Date(roa[i].to_date);
                            roa[i].to_date = self.get("toDateUpload");
                            if (kendo.parseInt(roa[i].current) < kendo.parseInt(roa[i].previous)) {
                                self.Uploaderror.push({
                                    line: i + 2,
                                    meter_number: roa[i].meter_number,
                                    previous: roa[i].previous,
                                    current: roa[i].current,
                                    status: 0
                                });
                            }
                            banhji.reading.dataSource.add(roa[i]);
                            $("#loadImport").css("display", "none");
                        }
                    }
                });
                if (self.Uploaderror.length > 0) {
                    self.set("errorShow", true);
                } else {
                    self.set("errorShow", false);
                }
                if (self.ExistRUpload.length > 0) {
                    self.set("existShow", true);
                } else {
                    self.set("existShow", false);
                }
                if (self.Uploaderror.length > 0 || self.ExistRUpload.length > 0) {
                    self.set("fullCorrect", false);
                } else {
                    self.set("fullCorrect", true);
                }
            }
            reader.readAsBinaryString(files[0].rawFile);
        },
        save: function() {
            var self = this;
            var dfd = $.Deferred();
            if (banhji.reading.dataSource.data().length > 0) {
                $("#loadImport").css("display", "block");
                banhji.reading.dataSource.sync();
                banhji.reading.dataSource.bind("requestEnd", function(e) {
                    if (e.type != 'read') {
                        if (e.type == 'update') {
                            // update current invoice
                            banhji.invoice.dataSource.query({
                                filter: {
                                    field: 'meter_record_id',
                                    operator: 'where_related_winvoice_line',
                                    value: e.response.results[0]._meta.id
                                }
                            }).then(function(e) {});
                            // create new invoice
                        }
                        if (e.response) {
                            dfd.resolve(e.response.results);
                            // self.cancel();
                            $("#loadImport").css("display", "none");
                            $('li.k-file').remove();
                            self.dataSource.data([]);
                            self.set("monthOfUpload", "");
                            self.set("toDateUpload", "");
                            banhji.router.navigate("/run_bill");
                        }
                    }
                });
                banhji.reading.dataSource.bind("error", function(e) {
                    dfd.reject(e);
                });
            }
            return dfd.promise();
        },
        cancel: function() {
            banhji.reading.dataSource.data([]);
            banhji.reading.uploadDS.data([]);
            // banhji.reading.dataSource.data([]);
            // banhji.reading.uploadDS.data([]);
            banhji.router.navigate("/");
        }
    });
    banhji.EditReading = kendo.observable({
        lang: langVM,
        dataSource: dataStore(apiUrl + "readings"),
        licenseDS: dataStore(apiUrl + "branches"),
        blocDS: dataStore(apiUrl + "locations"),
        monthOfSearch: null,
        licenseSelect: null,
        blocSelect: null,
        pageLoad: function(id) {
            this.licenseDS.read();
        },
        onLicenseChange: function(e) {
            var data = e.data;
            var license = this.licenseDS.at(e.sender.selectedIndex - 1);
            this.set("licenseSelect", license);
            this.blocDS.filter({
                field: "branch_id",
                value: license.id
            });
        },
        blocChange: function(e) {
            var data = e.data;
            var bloc = this.blocDS.at(e.sender.selectedIndex - 1);
            this.set("blocSelect", bloc);
        },
        search: function() {
            var monthOfSearch = this.get("monthOfSelect"),
                license_id = this.get("licenseSelect"),
                bloc_id = this.get("blocSelect");
            var para = [];
            if (monthOfSearch) {
                var monthOf = new Date(monthOfSearch);
                monthOf.setDate(1);
                monthOf = kendo.toString(monthOf, "yyyy-MM-dd");
                var monthL = new Date(monthOfSearch);
                monthL.setDate(31);
                monthL = kendo.toString(monthL, "yyyy-MM-dd");

                para.push({
                    field: "month_of >=",
                    value: monthOf
                }, {
                    field: "month_of <=",
                    value: monthL
                });
                //this.dataSource.filter(para);
                if (license_id) {
                    para.push({
                        field: "branch_id",
                        operator: "where_related_meter",
                        value: license_id.id
                    });
                }
                if (bloc_id) {
                    para.push({
                        field: "location_id",
                        operator: "where_related_meter",
                        value: bloc_id.id
                    });
                }
                this.set("selectMeter", true);
                var self = this;
                this.dataSource.query({
                    filter: para
                }).then(function() {
                    for (var i = 0; i < self.dataSource.data().length; i++) {
                        self.rows.push({
                            cells: [{
                                    value: self.dataSource.data()[i].meter_number
                                },
                                {
                                    value: self.dataSource.data()[i].from_date
                                },
                                {
                                    value: self.dataSource.data()[i].to_date
                                },
                                {
                                    value: self.dataSource.data()[i].previous
                                },
                                {
                                    value: self.dataSource.data()[i].current
                                },
                                {
                                    value: self.dataSource.data()[i].consumption
                                },
                                {
                                    value: self.dataSource.data()[i].status
                                }
                            ]
                        });
                    }
                });
            } else {
                alert("សូមSelect ខែ");
            }
        },
        exportEXCEL: function(e) {
            $("#loadImport").css("display", "block");
            var ds = new kendo.data.DataSource({
                type: "json",
                transport: {
                    read: apiUrl + "readings"
                },
                schema: {
                    model: {
                        fields: {
                            meter_number: {
                                type: "meter_number"
                            },
                            date: {
                                type: "date"
                            },
                            previous: {
                                type: "previous"
                            },
                            reading: {
                                type: "reading"
                            },
                            current: {
                                type: "current"
                            }
                        }
                    }
                }
            });

            var rows = [{
                cells: [{
                        value: "meter_number"
                    },
                    {
                        value: "date"
                    },
                    {
                        value: "previous"
                    },
                    {
                        value: "reading"
                    },
                    {
                        value: "current"
                    }
                ]
            }];
            ds.fetch(function() {
                var data = this.data();
                for (var i = 0; i < data[0].count; i++) {
                    rows.push({
                        cells: [{
                                value: data[0].results[i].meter_number
                            },
                            {
                                value: data[0].results[i].date
                            },
                            {
                                value: data[0].results[i].previous
                            },
                            {
                                value: data[0].results[i].reading
                            },
                            {
                                value: data[0].results[i].current
                            }
                        ]
                    })
                }
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
                            }
                        ],
                        // Title of the sheet
                        title: "Reading",
                        // Rows of the sheet
                        rows: rows
                    }]
                });
                //save the file as Excel file with extension xlsx
                kendo.saveAs({
                    dataURI: workbook.toDataURL(),
                    fileName: "Reading.xlsx"
                });
            }).then(function() {
                $("#loadImport").css("display", "none");
            });
        },
        cancel: function() {
            this.dataSource.data([]);
            banhji.router.navigate("/");
        }
    });
    banhji.waterImport = kendo.observable({
        lang: langVM,
        dataSource: dataStore(apiUrl + "districts"),
        pageLoad: function(id) {},
        onSelected: function(e) {
            $('li.k-file').remove();
            var files = e.files,
                self = this;
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
                            self.dataSource.add(roa[i]);
                            $("#loadImport").css("display", "none");
                        }
                    }
                });
            }
            reader.readAsBinaryString(files[0].rawFile);
        },
        exportEXCEL: function(e) {
            $("#loadImport").css("display", "block");
            var ds = new kendo.data.DataSource({
                type: "json",
                transport: {
                    read: apiUrl + "readings"
                },
                schema: {
                    model: {
                        fields: {
                            meter_number: {
                                type: "meter_number"
                            },
                            date: {
                                type: "date"
                            },
                            previous: {
                                type: "previous"
                            },
                            reading: {
                                type: "reading"
                            },
                            current: {
                                type: "current"
                            }
                        }
                    }
                }
            });

            var rows = [{
                cells: [{
                        value: "meter_number"
                    },
                    {
                        value: "date"
                    },
                    {
                        value: "previous"
                    },
                    {
                        value: "reading"
                    },
                    {
                        value: "current"
                    }
                ]
            }];
            ds.fetch(function() {
                var data = this.data();
                for (var i = 0; i < data[0].count; i++) {
                    rows.push({
                        cells: [{
                                value: data[0].results[i].meter_number
                            },
                            {
                                value: data[0].results[i].date
                            },
                            {
                                value: data[0].results[i].previous
                            },
                            {
                                value: data[0].results[i].reading
                            },
                            {
                                value: data[0].results[i].current
                            }
                        ]
                    })
                }
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
                            }
                        ],
                        // Title of the sheet
                        title: "Reading",
                        // Rows of the sheet
                        rows: rows
                    }]
                });
                //save the file as Excel file with extension xlsx
                kendo.saveAs({
                    dataURI: workbook.toDataURL(),
                    fileName: "Reading.xlsx"
                });
            }).then(function() {
                $("#loadImport").css("display", "none");
            });
        },
        save: function() {
            var self = this;
            if (this.dataSource.data().length > 0) {
                $("#loadImport").css("display", "block");
                this.dataSource.sync();
                this.dataSource.bind("requestEnd", function(e) {
                    if (e.type != 'read') {
                        if (e.response) {
                            $("#ntf1").data("kendoNotification").success("Activated user successfully!");
                            self.cancel();
                            $("#loadImport").css("display", "none");
                        }
                    }
                });
                this.dataSource.bind("error", function(e) {
                    $("#ntf1").data("kendoNotification").error("Error activated!");
                    $("#loadImport").css("display", "none");
                });
            }
        },
        cancel: function() {
            this.dataSource.data([]);
            banhji.router.navigate("/");
        }
    });
    //Setting
    banhji.setting = kendo.observable({
        lang: langVM,
        contactTypeName: "",
        contactTypeAbbr: "",
        contactTypeCompany: 0,
        blockCompanyId: 0,
        tabGo: 0,
        depositAccDS: banhji.source.depositAccountDS,
        exAccountDS: banhji.source.tradeDiscountDS,
        tariffAccDS: banhji.source.incomeAccountDS,
        areaDS: dataStore(apiUrl + "choulr/area"),
        areaPOSTDS: dataStore(apiUrl + "choulr/area"),
        brandDS: banhji.source.brandDS,
        planItemDS: dataStore(apiUrl + "plans/items"),
        tariffItemDS: dataStore(apiUrl + "choulr/tariff"),
        txnTemplateDS: dataStore(apiUrl + "transaction_templates"),
        objBloc: null,
        currencyDS: new kendo.data.DataSource({
            data: banhji.source.currencyList,
            filter: {
                field: "status",
                value: 1
            }
        }),
        propertyDS: dataStore(apiUrl + "choulr/property"),
        branchDS: dataStore(apiUrl + "branches"),
        planDS: dataStore(apiUrl + "plans"),
        contactTypeDS: dataStore(apiUrl + "contacts/type"),
        patternDS: dataStore(apiUrl + "contacts"),
        wordUsage: null,
        typeUnit: [{
                id: "usage",
                name: this.wordUsage
            },
            {
                id: "money",
                name: "money"
            },
            {
                id: "%",
                name: "%"
            }
        ],
        tariffItemFlat: 0,
        tariffSelect: false,
        tariffNameShow: null,
        exCurrency: null,
        planSelect: false,
        priceUnit: true,
        percentUnit: false,
        meterUnit: false,
        windowTariffItemVisible: false,
        planNameShow: null,
        prefixDS: new kendo.data.DataSource({
            transport: {
                read: {
                    url: apiUrl + "prefixes",
                    type: "GET",
                    headers: banhji.header,
                    dataType: 'json'
                },
                create: {
                    url: apiUrl + "prefixes",
                    type: "POST",
                    headers: banhji.header,
                    dataType: 'json'
                },
                update: {
                    url: apiUrl + "prefixes",
                    type: "PUT",
                    headers: banhji.header,
                    dataType: 'json'
                },
                destroy: {
                    url: apiUrl + "prefixes",
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
            filter: {
                field: "type",
                operator: "where",
                value: "Utility_Invoice"
            },
            batch: true,
            serverFiltering: true,
            serverSorting: true,
            serverPaging: true,
            page: 1,
            pageSize: 100
        }),
        onLicenseChange: function(e) {
            var index = e.sender.selectedIndex;
            var block = this.licenseDS.at(index - 1);
            this.set('blockCompanyId', {
                id: block.id,
                name: block.name
            });
        },
        addContactType: function() {
            var self = this,
                name = this.get("contactTypeName");
            if (name !== "") {
                this.contactTypeDS.add({
                    parent_id: 1,
                    name: name,
                    abbr: this.get("contactTypeAbbr"),
                    description: "",
                    is_company: this.get("contactTypeCompany"),
                    is_system: 0
                });

                this.contactTypeDS.sync();
                this.contactTypeDS.bind("requestEnd", function(e) {
                    if (e.type === "create") {
                        var response = e.response.results[0];
                        self.addPattern(response.id);
                        banhji.source.loadContactTypes();
                    }
                });

                this.set("contactTypeName", "");
                this.set("contactTypeAbbr", "");
                this.set("contactTypeCompany", 0);
            }
        },
        addPattern: function(id) {
            var self = this;
            this.patternDS.insert(0, {
                "contact_type_id": id,
                "number": "",
                "locale": banhji.locale,
                "is_pattern": 1,
                "status": 1
            });
            this.patternDS.sync();
            this.patternDS.bind("requestEnd", function(e) {
                if (e.type != 'read' && e.response) {
                    var notificat = $("#ntf1").data("kendoNotification");
                    notificat.hide();
                    notificat.success(self.lang.lang.success_message);
                    self.set("contactTypeName", "");
                    self.set("contactTypeAbbr", "");
                    self.set("contactTypeCompany", 0);
                }
            });
            this.patternDS.bind("error", function(e) {
                var notificat = $("#ntf1").data("kendoNotification");
                notificat.hide();
                notificat.error(self.lang.lang.error_message);
            });
        },
        currentProperty: "",
        currentAbbr: "",
        addArea: function(e) {
            var self = this;
            if (this.get("areaProperty") && this.get("areaName") && this.get("areaAbbr")) {
                this.areaPOSTDS.data([]);
                this.areaPOSTDS.add({
                    property_id: this.get("areaProperty"),
                    name: this.get("areaName"),
                    abbr: this.get("areaAbbr"),
                    main_location: 0,
                    sub_location: 0
                });
                this.areaPOSTDS.sync();
                this.areaPOSTDS.bind("requestEnd", function(e) {
                    if (e.type != 'read' && e.response) {
                        var notificat = $("#ntf1").data("kendoNotification");
                        notificat.hide();
                        notificat.success(self.lang.lang.success_message);
                        self.set("currentProperty", self.get("areaProperty"));
                        self.set("currentAbbr", self.get("areaAbbr"));

                        self.set("areaName", "");
                        self.set("areaAbbr", "");
                        self.set("areaProperty", "");
                        self.areaDS.fetch();

                    }
                });
                this.areaPOSTDS.bind("error", function(e) {
                    var notificat = $("#ntf1").data("kendoNotification");
                    notificat.hide();
                    notificat.success(self.lang.lang.error_message);
                });
            } else {
                var notificat = $("#ntf1").data("kendoNotification");
                notificat.hide();
                notificat.success(self.lang.lang.field_required_message);
            }
        },
        poleDS: dataStore(apiUrl + "choulr/area"),
        polePOSTDS: dataStore(apiUrl + "choulr/area"),
        blocSelect: false,
        blocNameShow: null,
        poleVisible: false,
        viewPole: function(e) {
            var data = e.data;
            this.set("blocSelect", true);
            this.set("blocNameShow", data.name);
            this.poleDS.filter([{
                    field: "main_location",
                    value: data.id
                },
                {
                    field: "sub_location",
                    value: 0
                }
            ]);
        },
        showPole: function(e) {
            this.set("poleVisible", true);
            this.setCurrent(e.data);
        },
        closePoleWin: function(e) {
            this.set("poleVisible", false);
        },
        savePole: function(e) {
            var self = this;
            if (this.get("poleName")) {
                var data = e.data;
                this.polePOSTDS.data([]);
                this.polePOSTDS.add({
                    property_id: this.get("current").property_id,
                    name: this.get("poleName"),
                    abbr: this.get("current").abbr,
                    main_location: this.get("current").id,
                    sub_location: 0
                });
                this.polePOSTDS.sync();
                this.closePoleWin();
                this.polePOSTDS.bind("requestEnd", function(e) {
                    if (e.type != 'read' && e.response) {
                        var notificat = $("#ntf1").data("kendoNotification");
                        notificat.hide();
                        notificat.success(self.lang.lang.success_message);
                        self.set("poleName", "");
                    }
                });
                this.poleDS.bind("error", function(e) {
                    var notificat = $("#ntf1").data("kendoNotification");
                    notificat.hide();
                    notificat.success(self.lang.lang.error_message);
                    self.showPole();
                });
            } else {
                var notificat = $("#ntf1").data("kendoNotification");
                notificat.hide();
                notificat.success(self.lang.lang.field_required_message);
            }
        },
        boxDS: dataStore(apiUrl + "choulr/area"),
        poleNameShow: null,
        boxVisible: false,
        poleSelect: false,
        viewBox: function(e) {
            var data = e.data;
            this.set("poleSelect", true);
            this.set("poleNameShow", data.name);
            this.boxDS.filter({
                field: "sub_location",
                value: data.id
            });
        },
        pole: null,
        showBox: function(e) {
            this.set("boxVisible", true);
            this.set("pole", e.data);
        },
        closeBoxWin: function(e) {
            this.set("boxVisible", false);
        },
        saveBox: function(e) {
            var self = this;
            if (this.get("boxName")) {
                var data = e.data;
                this.areaPOSTDS.data([]);
                this.areaPOSTDS.add({
                    property_id: this.get("pole").property_id,
                    name: this.get("boxName"),
                    abbr: this.get("pole").abbr,
                    main_location: this.get("pole").main_location,
                    sub_location: this.get("pole").id
                });
                this.areaPOSTDS.sync();
                this.closeBoxWin();
                this.areaPOSTDS.bind("requestEnd", function(e) {
                    if (e.type != 'read' && e.response) {
                        var notificat = $("#ntf1").data("kendoNotification");
                        notificat.hide();
                        notificat.success(self.lang.lang.success_message);
                        self.set("boxName", "");
                    }
                });
                this.areaPOSTDS.bind("error", function(e) {
                    var notificat = $("#ntf1").data("kendoNotification");
                    notificat.hide();
                    notificat.success(self.lang.lang.error_message);
                    self.showBox();
                });
            } else {
                var notificat = $("#ntf1").data("kendoNotification");
                notificat.hide();
                notificat.success(self.lang.lang.field_required_message);
            }
        },
        goExemption: function() {
            this.planItemDS.data([]);
            this.planItemDS.filter({
                field: "type",
                value: "exemption"
            });
        },
        addEx: function(e) {
            var self = this;
            if (this.get("exName") && this.get("exAccount") && this.get("exUnit") && this.get("exCurrency") && this.get("exPrice")) {
                this.planItemDS.add({
                    name: this.get("exName"),
                    type: "exemption",
                    is_flat: false,
                    usage: 0,
                    account: this.get("exAccount"),
                    unit: this.get("exUnit"),
                    currency: this.get("exCurrency"),
                    amount: this.get("exPrice"),
                    _currency: []
                });
                this.planItemDS.sync();
                this.planItemDS.bind("requestEnd", function(e) {
                    if (e.type != 'read' && e.response) {
                        var notificat = $("#ntf1").data("kendoNotification");
                        notificat.hide();
                        notificat.success(self.lang.lang.success_message);
                        self.set("exName", "");
                        self.set("exAccount", "");
                        self.set("exPrice", "");
                        self.set("exUnit", "");
                        self.set("exCurrency", "");
                    }
                });
                this.planItemDS.bind("error", function(e) {
                    var notificat = $("#ntf1").data("kendoNotification");
                    notificat.hide();
                    notificat.success(self.lang.lang.error_message);
                });
            } else {
                var notificat = $("#ntf1").data("kendoNotification");
                notificat.hide();
                notificat.success(self.lang.lang.field_required_message);
            }
        },
        unitChange: function(e) {
            this.set("exPrice", "");
            if (this.exUnit === "%") {
                this.set("percentUnit", true);
                this.set("priceUnit", false);
                this.set("meterUnit", false);
            } else if (this.exUnit === "usage") {
                this.set("percentUnit", false);
                this.set("priceUnit", false);
                this.set("meterUnit", true);
            } else {
                this.set("percentUnit", false);
                this.set("priceUnit", true);
                this.set("meterUnit", false);
            }
        },
        goTariff: function() {
            this.set("tariffSelect", false)
            this.planItemDS.data([]);
            this.tariffItemDS.data([]);
            this.planItemDS.filter({
                field: "type",
                value: "tariff"
            });
        },
        showTariffItem: function(e) {
            var data = e.data;
            this.set("windowTariffItemVisible", true);
            this.setCurrent(e.data);
        },
        setCurrent: function(current) {
            this.set('current', current);
        },
        choulrTariffItemDS: dataStore(apiUrl + "choulr/tariff_item"),
        saveTariffItem: function(e) {
            var data = e.data.id,
                self = this;
            if (this.get("tariffItemName") && this.get("tariffItemUsage") && this.get("tariffItemAmount")) {
                this.choulrTariffItemDS.data([]);
                this.choulrTariffItemDS.add({
                    name: this.get("tariffItemName"),
                    type: "tariff",
                    tariff_id: this.get('current').id,
                    account: this.get('current').account,
                    is_flat: 0,
                    unit: this.get("tariffItemUnit"),
                    usage: this.get("tariffItemUsage"),
                    amount: this.get("tariffItemAmount"),
                    currency: this.get("current").currency,
                    _currency: []
                });
                this.choulrTariffItemDS.sync();
                this.choulrTariffItemDS.bind("requestEnd", function(e) {
                    console.log(e.type);
                    if (e.type != 'read' && e.response) {
                        var notificat = $("#ntf1").data("kendoNotification");
                        notificat.hide();
                        notificat.success(self.lang.lang.success_message);
                        self.set("tariffItemName", "");
                        self.set("tariffItemFlat", 0);
                        self.set("tariffItemUsage", "");
                        self.set("tariffItemAmount", "");
                        self.set("tariffItemUnit", "");
                        self.set("windowTariffItemVisible", false);
                        self.closeTariffWindowItem();
                    }
                });
                this.choulrTariffItemDS.bind("error", function(e) {
                    var notificat = $("#ntf1").data("kendoNotification");
                    notificat.hide();
                    notificat.success(self.lang.lang.error_message);
                });
            } else {
                var notificat = $("#ntf1").data("kendoNotification");
                notificat.hide();
                notificat.success(self.lang.lang.field_required_message);
            }
        },
        updateTariffItem: function(e) {
            this.tariffItemDS.sync();
            this.tariffItemDS.bind("requestEnd", function(e) {
                if (e.type != 'read' && e.response) {
                    var notificat = $("#ntf1").data("kendoNotification");
                    notificat.hide();
                    notificat.success(self.lang.lang.success_message);
                    self.tariffItemDS.filter({
                        field: "tariff_id",
                        value: self.get('current').id
                    });
                }
            });
            this.tariffItemDS.bind("error", function(e) {
                var notificat = $("#ntf1").data("kendoNotification");
                notificat.hide();
                notificat.success(self.lang.lang.error_message);
            });
        },
        tariffFlatType: [{
                id: 0,
                name: "Not Flat"
            },
            {
                id: 1,
                name: "Flat"
            }
        ],
        utiType: [{
                id: "w",
                name: "Water"
            },
            {
                id: "e",
                name: "Electricity"
            }
        ],
        addTariff: function(e) {
            var self = this;
            if (this.get("tariffName") && this.get("tariffAccount") && this.get("tariffCurrency")) {
                this.tariffItemDS.add({
                    name: this.get("tariffName"),
                    type: "tariff",
                    is_flat: this.get("tariffFlat"),
                    tariff_id: 0,
                    unit: 0,
                    currency: this.get("tariffCurrency"),
                    account: this.get("tariffAccount"),
                    usage: 0,
                    amount: 0,
                    _currency: []
                });
                this.tariffItemDS.sync();
                this.tariffItemDS.bind("requestEnd", function(e) {
                    if (e.type != 'read' && e.response) {
                        var notificat = $("#ntf1").data("kendoNotification");
                        notificat.hide();
                        notificat.success(self.lang.lang.success_message);
                        self.set("tariffName", "");
                        self.set("tariffAccount", "");
                        self.set("tariffCurrency", "");
                        self.set("tariffFlat", "");
                    }
                });
                this.tariffItemDS.bind("error", function(e) {
                    var notificat = $("#ntf1").data("kendoNotification");
                    notificat.hide();
                    notificat.success(self.lang.lang.error_message);
                });
            } else {
                var notificat = $("#ntf1").data("kendoNotification");
                notificat.hide();
                notificat.success(self.lang.lang.field_required_message);
            }
        },
        closeTariffWindowItem: function() {
            this.set("windowTariffItemVisible", false);
        },
        viewTariffItem: function(e) {
            var data = e.data.id;
            this.set("tariffNameShow", e.data.name);
            this.set("tariffSelect", true);
            this.tariffItemDS.data([]);
            this.tariffItemDS.query({
                filter: {
                    field: "tariff_id",
                    value: data
                },
                sort: {
                    field: "unit",
                    dir: "asc"
                }
            });
        },
        goDeposit: function() {
            this.planItemDS.data([]);
            this.planItemDS.filter({
                field: "type",
                value: "deposit"
            });
        },
        addDeposit: function() {
            var self = this;
            if (this.get("depositName") && this.get("depositAccount") && this.get("depositCurrency") && this.get("depositPrice")) {
                this.planItemDS.add({
                    name: this.get("depositName"),
                    type: "deposit",
                    is_flat: false,
                    unit: null,
                    account: this.get("depositAccount"),
                    usage: 0,
                    currency: this.get("depositCurrency"),
                    amount: this.get("depositPrice"),
                    _currency: []
                });
                this.planItemDS.sync();
                this.planItemDS.bind("requestEnd", function(e) {
                    if (e.type != 'read' && e.response) {
                        var notificat = $("#ntf1").data("kendoNotification");
                        notificat.hide();
                        notificat.success(self.lang.lang.success_message);
                        self.set("depositName", "");
                        self.set("depositPrice", "");
                        self.set("depositCurrency", "");
                        self.set("depositAccount", "");
                    }
                });
                this.planItemDS.bind("error", function(e) {
                    var notificat = $("#ntf1").data("kendoNotification");
                    notificat.hide();
                    notificat.success(self.lang.lang.error_message);
                });
            } else {
                var notificat = $("#ntf1").data("kendoNotification");
                notificat.hide();
                notificat.success(self.lang.lang.field_required_message);
            }
        },
        goService: function() {
            this.planItemDS.data([]);
            this.planItemDS.filter({
                field: "type",
                value: "service"
            });
        },
        addService: function() {
            var self = this;
            if (this.get("serviceName") && this.get("serviceAccount") && this.get("serviceCurrency") && this.get("servicePrice")) {
                this.planItemDS.add({
                    name: this.get("serviceName"),
                    type: "service",
                    is_flat: false,
                    unit: null,
                    account: this.get("serviceAccount"),
                    usage: 0,
                    currency: this.get("serviceCurrency"),
                    amount: this.get("servicePrice"),
                    _currency: []
                });
                this.planItemDS.sync();
                this.planItemDS.bind("requestEnd", function(e) {
                    if (e.type != 'read' && e.response) {
                        var notificat = $("#ntf1").data("kendoNotification");
                        notificat.hide();
                        notificat.success(self.lang.lang.success_message);
                        self.set("serviceName", "");
                        self.set("servicePrice", "");
                        self.set("serviceCurrency", "");
                        self.set("serviceAccount", "");
                    }
                });
                this.planItemDS.bind("error", function(e) {
                    var notificat = $("#ntf1").data("kendoNotification");
                    notificat.hide();
                    notificat.success(self.lang.lang.error_message);
                });
            } else {
                var notificat = $("#ntf1").data("kendoNotification");
                notificat.hide();
                notificat.success(self.lang.lang.field_required_message);
            }
        },
        goMaintenance: function() {
            this.planItemDS.data([]);
            this.planItemDS.filter({
                field: "type",
                value: "maintenance"
            });
        },
        addMaintenance: function() {
            var self = this;
            if (this.get("maintenanceName") && this.get("maintenanceAccount") && this.get("maintenanceCurrency") && this.get("maintenancePrice")) {
                this.planItemDS.add({
                    name: this.get("maintenanceName"),
                    type: "maintenance",
                    is_flat: false,
                    unit: null,
                    account: this.get("maintenanceAccount"),
                    usage: 0,
                    currency: this.get("maintenanceCurrency"),
                    amount: this.get("maintenancePrice"),
                    _currency: []
                });
                this.planItemDS.sync();
                this.planItemDS.bind("requestEnd", function(e) {
                    if (e.type != 'read' && e.response) {
                        var notificat = $("#ntf1").data("kendoNotification");
                        notificat.hide();
                        notificat.success(self.lang.lang.success_message);
                        self.set("maintenanceName", "");
                        self.set("maintenancePrice", "");
                        self.set("maintenanceAccount", "");
                        self.set("maintenanceCurrency", "");
                    }
                });
                this.planItemDS.bind("error", function(e) {
                    var notificat = $("#ntf1").data("kendoNotification");
                    notificat.hide();
                    notificat.success(self.lang.lang.error_message);
                });
            } else {
                var notificat = $("#ntf1").data("kendoNotification");
                notificat.hide();
                notificat.success(self.lang.lang.field_required_message);
            }
        },
        goFine: function() {
            this.planItemDS.data([]);
            this.planItemDS.filter({
                field: "type",
                value: "fine"
            });
        },
        addFine: function() {
            var self = this;
            if (this.get("fineName") && this.get("fineAccount") && this.get("fineCurrency") && this.get("finePrice") && this.get("fineDay")) {
                this.planItemDS.add({
                    name: this.get("fineName"),
                    type: "fine",
                    is_flat: 0,
                    unit: null,
                    account: this.get("fineAccount"),
                    usage: this.get("fineDay"),
                    currency: this.get("fineCurrency"),
                    amount: this.get("finePrice"),
                    _currency: []
                });
                this.planItemDS.sync();
                this.planItemDS.bind("requestEnd", function(e) {
                    if (e.type != 'read' && e.response) {
                        var notificat = $("#ntf1").data("kendoNotification");
                        notificat.hide();
                        notificat.success(self.lang.lang.success_message);
                        self.set("fineName", "");
                        self.set("finePrice", "");
                        self.set("fineAccount", "");
                        self.set("fineCurrency", "");
                        self.set("fineDay", "");
                    }
                });
                this.planItemDS.bind("error", function(e) {
                    var notificat = $("#ntf1").data("kendoNotification");
                    notificat.hide();
                    notificat.success(self.lang.lang.error_message);
                });
            } else {
                var notificat = $("#ntf1").data("kendoNotification");
                notificat.hide();
                notificat.success(self.lang.lang.field_required_message);
            }
        },
        goPlan: function() {
            this.planDS.read();
            this.planItemDS.data([]);
            this.set("planSelect", false);
        },
        viewPlanItem: function(e) {
            var data = e.data,
                self = this;
            var idList = [];
            this.set("planNameShow", e.data.name);
            $.each(data.items, function(index, value) {
                idList.push(value.item);
            });
            this.set("planSelect", true);
            this.planItemDS.data([]);
            this.planItemDS.query({
                    filter: {
                        field: "id",
                        operator: "where_in",
                        value: idList
                    }
                })
                .then(function(e) {
                    var view = self.planItemDS.view();
                });
        },
        rentTypeDS: [{
                id: "ls",
                name: "Lump Sum"
            },
            {
                id: "m2",
                name: "m2"
            }
        ],
        rentDS: dataStore(apiUrl + "choulr/tariff"),
        goRent: function() {
            this.rentDS.data([]);
            this.rentDS.filter({
                field: "type",
                value: "rent"
            });
        },
        addRent: function() {
            var self = this;
            if (this.get("rentType") && this.get("rentName") && this.get("rentPrice") && this.get("rentAccount")) {
                this.choulrTariffItemDS.data([]);
                this.choulrTariffItemDS.add({
                    name: this.get("rentName"),
                    type: "rent",
                    tariff_id: 0,
                    account: this.get("rentAccount"),
                    is_flat: 0,
                    unit: this.get("rentType"),
                    usage: 0,
                    amount: this.get("rentPrice"),
                    currency: this.get("rentCurrency")
                });
                this.choulrTariffItemDS.sync();
                this.choulrTariffItemDS.bind("requestEnd", function(e) {
                    console.log(e.type);
                    if (e.type != 'read' && e.response) {
                        var notificat = $("#ntf1").data("kendoNotification");
                        notificat.hide();
                        notificat.success(self.lang.lang.success_message);
                        self.set("rentName", "");
                        self.set("rentPrice", "");
                        self.set("rentAccount", "");
                        self.set("rentCurrency", "");
                        self.set("tariffItemUnit", "");
                        self.set("rentType", "");
                        self.goRent();
                    }
                });
                this.choulrTariffItemDS.bind("error", function(e) {
                    var notificat = $("#ntf1").data("kendoNotification");
                    notificat.hide();
                    notificat.success(self.lang.lang.error_message);
                });
            } else {
                var notificat = $("#ntf1").data("kendoNotification");
                notificat.hide();
                notificat.success(self.lang.lang.field_required_message);
            }
        },
        setWords: function() {
            this.tariffFlatType[0].set("name", this.lang.lang.not_flat);
            this.tariffFlatType[1].set("name", this.lang.lang.flat);
        },
        pageLoad: function() {
            this.txnTemplateDS.filter({
                field: "moduls",
                value: "water_mg"
            });
            $(".widget-head li").eq(this.tabGo).children("a").click();
            var boxwindow = $("#addBox").kendoWindow({
                title: this.lang.lang.add_box
            });
            var polewindow = $("#addPole").kendoWindow({
                title: this.lang.lang.add_sub_location
            });
            var itemwindow = $("#addTariffItem").kendoWindow({
                title: this.lang.lang.add_tariff
            });
            this.areaDS.filter({
                field: "main_location",
                value: 0
            });
            var self = this;
            $.each(this.typeUnit, function(i, v) {
                if (i == 0) {
                    self.typeUnit[i].set("name", self.lang.lang.usage);
                } else if (i == 1) {
                    self.typeUnit[i].set("name", self.lang.lang.money);
                }
            });
            this.setWords();
            this.contactTypeDS.filter({
                field: "parent_id",
                value: 1
            });
        },
        cancel: function() {
            this.licenseDS.cancelChanges();
            banhji.router.navigate("/");
        },
        deleteForm: function(e) {
            var data = e.data;
            if (confirm("Do you want to delete it?") == true) {
                this.txnTemplateDS.remove(data);
                this.txnTemplateDS.sync();
            }
        },
        categoryDS: dataStore(apiUrl + "choulr/category"),
        updateCateDS: dataStore(apiUrl + "choulr/category"),
        addCate: function(){
            var self = this;
            this.updateCateDS.data([]);
            this.updateCateDS.add({
                name: this.get("cateName")
            });
            this.updateCateDS.sync();
            this.updateCateDS.bind("requestEnd", function(e){
                var notificat = $("#ntf1").data("kendoNotification");
                    notificat.hide();
                    notificat.success(self.lang.lang.success_message);
                self.set("cateName", "");
                self.categoryDS.fetch();
            });
        },
        deleteCate: function(e){
            var data = e.data;
            if(confirm("Do you want to delete it?") == true) {
                this.categoryDS.remove(data);
                this.categoryDS.sync();
            }
        }
    });
    //Property
    banhji.Properties = kendo.observable({
        lang: langVM,
        dataSource: dataStore(apiUrl + "choulr/property"),
        provinceDS: dataStore(apiUrl + "provinces"),
        districtDS: dataStore(apiUrl + "districts"),
        toDay: new Date(),
        obj: null,
        provinceSelect: [],
        attachmentDS: dataStore(apiUrl + "attachments"),
        isEdit: false,
        selectType: [{
                id: "1",
                name: "Available"
            },
            {
                id: "2",
                name: "In Contract"
            },
            {
                id: "0",
                name: "Under Constrution"
            }
        ],
        selectCurrency: dataStore(apiUrl + "utibills/currency"),
        selectPropertyType: dataStore(apiUrl + "choulr/property_type"),
        proType: "",
        proCurrency: 1,
        proStatus: 1,
        pageLoad: function(id) {
            if (id) {
                this.loadObj(id);
            }else{
                this.loadMap();
                this.clearForm();
            }
            //Province
            var self = this;
            this.provinceDS.read()
                .then(function(e) {
                    var Lenght = self.provinceDS.data().length;
                    var view = self.provinceDS.view();
                    for (var i = 0; i < self.provinceDS.data().length; i++) {
                        self.provinceSelect.push({
                            'id': view[i].id,
                            'name': view[i].name_local
                        });
                    }
                });
            this.setWords();
        },
        setWords: function() {
            // this.selectType[0].set("name", this.lang.lang.active);
            // this.selectType[1].set("name", this.lang.lang.inactive);
            // this.selectType[2].set("name", this.lang.lang.void);
            // this.selectMeterType[0].set("name", this.lang.lang.for_water);
            // this.selectMeterType[1].set("name", this.lang.lang.for_electricity);
        },
        provinceChange: function(pro) {
            this.districtDS.filter({
                field: "province_id",
                value: this.get("proProvinceId")
            });
        },
        loadObj: function(id) {
            var self = this;
            this.dataSource.query({
                filter: {
                    field: "id",
                    value: id
                },
                page: 1,
                pageSize: 1
            }).then(function(e) {
                var view = self.dataSource.view();
                if(view.length > 0){
                    self.set("proType", view[0].type_id);
                    self.set("proNumber",view[0].number);
                    self.set("proName",view[0].name);
                    self.set("proAbbr",view[0].abbr);
                    self.set("proCode",view[0].code);
                    self.set("proCurrency",view[0].currency);
                    self.set("proLatitute",view[0].latitute);
                    self.set("proLongtitute",view[0].longtitute);
                    self.set("proStatus",view[0].status);
                    self.set("proAddress",view[0].address);
                    self.set("proCountryId",view[0].country_id);
                    self.set("proProvinceId",view[0].province_id);
                    self.set("proDistrictId",view[0].district_id);
                    self.set("proTotalArea",view[0].total_area);
                    self.set("proAreaOfService",view[0].area_of_service);
                    self.set("proBuildingType",view[0].building_type);
                    self.set("proMobile",view[0].mobile);
                    self.set("proTelephone",view[0].telephone);
                    self.set("proEmail",view[0].email);
                    self.set("proAreaForRent",view[0].area_for_rent);
                    self.set("proCommonArea",view[0].common_area);
                    self.set("proNearBy",view[0].near_by);
                    self.set("proTermsCondition",view[0].terms_condition);
                    self.set("proImg1",view[0].img1);
                    self.set("proImg2",view[0].img2);
                    self.set("proImg3",view[0].img3);
                    self.loadMap();
                }else{
                    banhji.router.navigate("/setting");
                }
            });
        },
        onSelect: function(e) {
            // Array with information about the uploaded files
            var self = this,
                ufiles = e.files,
                obj = this.get("obj");
            this.attachmentDS.data([]);
            $.each(e.files, function(i, v) {
                console.log(v);
                var files = v;
                var fileReader = new FileReader();
                fileReader.onload = function(event) {
                    var mapImage = event.target.result;
                    self.obj.set('image_url', mapImage);
                }
                fileReader.readAsDataURL(files.rawFile);
                // Check the extension of each file and abort the upload if it is not .jpg         
                if (files.extension.toLowerCase() === ".jpg" ||
                    files.extension.toLowerCase() === ".jpeg" ||
                    files.extension.toLowerCase() === ".tiff" ||
                    files.extension.toLowerCase() === ".png" ||
                    files.extension.toLowerCase() === ".gif") {
                    var key = 'WLOGO_' + banhji.institute.id + "_" + Math.floor(Math.random() * 100000000000000001) + '_' + files.name;
                    self.attachmentDS.add({
                        user_id: banhji.userData.id,
                        item_id: obj.id,
                        type: "Item",
                        name: files.name,
                        description: "",
                        key: key,
                        url: banhji.s3 + key,
                        size: files.size,
                        created_at: new Date(),
                        file: files.rawFile
                    });
                } else {
                    var notificat = $("#ntf1").data("kendoNotification");
                    notificat.hide();
                    notificat.error(this.lang.lang.file_not_allow);
                }
            });
        },
        removeFile: function(e) {
            var data = e.data;

            if (confirm(banhji.source.confirmMessage)) {
                this.attachmentDS.remove(data);
            }
        },
        save: function() {
            var self = this;
            if (this.get("proNumber")) {
                this.saveDataSource();
            } else {
                var notificat = $("#ntf1").data("kendoNotification");
                notificat.hide();
                notificat.error(this.lang.lang.field_required_message);
            }
        },
        saveDataSource: function() {
            var self = this;
            this.dataSource.data([]);
            this.dataSource.add({
                type_id: this.get("proType"),
                number: this.get("proNumber"),
                name: this.get("proName"),
                abbr: this.get("proAbbr"),
                code: this.get("proCode"),
                currency: this.get("proCurrency"),
                status: this.get("proStatus"),
                latitute: this.get("proLatitute"),
                longtitute: this.get("proLongtitute"),
                address: this.get("proAddress"),
                country_id: this.get("proCountryId"),
                province_id: this.get("proProvinceId"),
                district_id: this.get("proDistrictId"),
                total_area: this.get("proTotalArea"),
                area_of_service: this.get("proAreaOfService"),
                building_type: this.get("proBuildingType"),
                mobile: this.get("proMobile"),
                telephone: this.get("proTelephone"),
                email: this.get("proEmail"),
                area_for_rent: this.get("proAreaForRent"),
                common_area: this.get("proCommonArea"),
                near_by: this.get("proNearBy"),
                terms_condition: this.get("proTermsCondition"),
                img1: this.get("proImg1"),
                img2: this.get("proImg2"),
                img3: this.get("proImg3")
            });
            this.dataSource.sync();
            this.dataSource.bind("requestEnd", function(e) {
                if (e.type != 'read' && e.response) {
                    var notificat = $("#ntf1").data("kendoNotification");
                    notificat.hide();
                    notificat.success(self.lang.lang.success_message);
                    banhji.router.navigate("/setting");
                    self.clearForm();
                }
            });
            this.dataSource.bind("error", function(e) {
                var notificat = $("#ntf1").data("kendoNotification");
                notificat.hide();
                notificat.error(self.lang.lang.error_message);
            });
        },
        clearForm: function(){
            this.set("proType","");
            this.set("proNumber","");
            this.set("proName","");
            this.set("proAbbr","");
            this.set("proCode","");
            this.set("proCurrency",1);
            this.set("proLatitute","");
            this.set("proLongtitute","");
            this.set("proStatus",1);
            this.set("proAddress","");
            this.set("proCountryId","");
            this.set("proProvinceId","");
            this.set("proDistrictId","");
            this.set("proTotalArea","");
            this.set("proAreaOfService","");
            this.set("proBuildingType","");
            this.set("proMobile","");
            this.set("proTelephone","");
            this.set("proEmail","");
            this.set("proAreaForRent","");
            this.set("proCommonArea","");
            this.set("proNearBy","");
            this.set("proTermsCondition","");
            this.set("proImg1","");
            this.set("proImg2","");
            this.set("proImg3","");        
        },
        cancel: function() {
            this.dataSource.cancelChanges();
            this.dataSource.data([]);
            this.attachmentDS.cancelChanges();
            this.attachmentDS.data([]);
            banhji.router.navigate("/setting");
            banhji.setting.propertyDS.fetch();
        },
        loadMap: function() {
            var latitute = this.get("proLatitute");
            var longtitute = this.get("proLongtitute"),
            lat = kendo.parseFloat(latitute),
            lng = kendo.parseFloat(longtitute);
            if (lat && lng) {
                var myLatLng = {
                    lat: lat,
                    lng: lng
                };
                var mapOptions = {
                    zoom: 17,
                    center: myLatLng,
                    mapTypeControl: false,
                    zoomControl: false,
                    scaleControl: false,
                    streetViewControl: false
                };
                var map = new google.maps.Map(document.getElementById('map'), mapOptions);
                var marker = new google.maps.Marker({
                    position: myLatLng,
                    map: map
                });
            }
        },
        countryDS               : banhji.source.countryDS,
        buildingTypeDS: [
            {id: "wood", type: "Wood"},
            {id: "stone", type: "Stone"},
            {id: "wood&stone", type: "Wood & Stone"}
        ]
    });
    banhji.plan = kendo.observable({
        lang: langVM,
        dataSource: new kendo.data.DataSource({
            transport: {
                read: {
                    url: apiUrl + "plans",
                    type: "GET",
                    headers: banhji.header,
                    dataType: 'json'
                },
                create: {
                    url: apiUrl + "plans",
                    type: "POST",
                    headers: banhji.header,
                    dataType: 'json'
                },
                update: {
                    url: apiUrl + "plans",
                    type: "PUT",
                    headers: banhji.header,
                    dataType: 'json'
                },
                destroy: {
                    url: apiUrl + "plans",
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
        }),
        itemDS: dataStore(apiUrl + "plans/items"),
        itemSelect: 0,
        ItemTypeDS: [{
                id: "exemption",
                name: "Exemption"
            },
            {
                id: "tariff",
                name: "Tariff"
            },
            {
                id: "deposit",
                name: "Deposit"
            },
            {
                id: "service",
                name: "Service"
            },
            {
                id: "maintenance",
                name: "Maintenance"
            },
            {
                id: "installment",
                name: "Installment"
            }
        ],
        addNewItemType: null,
        current: null,
        currencyDS: new kendo.data.DataSource({
            data: banhji.source.currencyList,
            filter: {
                field: "status",
                value: 1
            }
        }),
        list: [],
        planItemList: [],
        currencyEnable: true,
        pageLoad: function(id) {
            if (id) {
                this.loadObj(id);
                this.set("currencyEnable", false);
            } else {
                this.addNew();
                this.set("currencyEnable", true);
                this.addItem();
            }
        },
        loadObj: function(id) {
            var self = this;
            this.dataSource.query({
                filter: {
                    field: "id",
                    value: id
                },
                page: 1,
                take: 100
            }).then(function(e) {
                var view = self.dataSource.view();
                self.setCurrent(view[0]);
                // self.itemDS.filter({field: "currency_id", value: view[0]._currency.id});
            });
        },
        onChange: function(e) {
            let self = this;
            let myData = self.dataSource.data()[0];

            var data = e.data,
                selected = e.sender.selectedIndex,
                dataitemDs = this.itemDS.at(selected);
            data.set("type", dataitemDs.type);
            data.set("name", dataitemDs.name);
            data.set("amount", dataitemDs.amount);
            myData.set('dirty', true);
        },
        currencyChange: function(e) {
            var data = e.data;
            this.itemDS.filter({
                field: "currency_id",
                value: this.current.currency
            });
            this.get("current").items.splice(0, this.get("current").items.length);
            this.addItem();
        },
        setCurrent: function(current) {
            this.set('current', current);
        },
        addNew: function() {
            this.dataSource.add({
                name: null,
                code: null,
                items: []
            });
            this.setCurrent(this.dataSource.at(this.dataSource.data().length - 1));
        },
        remove: function(e) {
            this.dataSource.remove(e.data);
        },
        addItem: function() {
            this.get("current").items.push({
                item: "",
                type: "",
                name: "",
                amount: 0
            });
        },
        removeItem: function(e) {
            this.items.remove(e);
        },
        save: function() {
            var self = this;

            this.dataSource.sync();
            this.dataSource.bind('requestEnd', function(e) {
                if (e.type != 'read' && e.response.results) {
                    var notificat = $("#ntf1").data("kendoNotification");
                    notificat.hide();
                    notificat.success(self.lang.lang.success_message);
                    self.cancel();
                }
            });
            this.dataSource.bind('error', function(e) {
                var notificat = $("#ntf1").data("kendoNotification");
                notificat.hide();
                notificat.error(self.lang.lang.error_message);
            });

        },
        cancel: function() {
            this.dataSource.data([]);
            banhji.router.navigate("/setting");
        }
    });
    //end Setting

    banhji.addAccountingprefix = kendo.observable({
        lang: langVM,
        selectTypeList: banhji.source.typeList,
        Type: "Invoice",
        dataSource: new kendo.data.DataSource({
            transport: {
                read: {
                    url: apiUrl + "prefixes",
                    type: "GET",
                    headers: banhji.header,
                    dataType: 'json'
                },
                create: {
                    url: apiUrl + "prefixes",
                    type: "POST",
                    headers: banhji.header,
                    dataType: 'json'
                },
                update: {
                    url: apiUrl + "prefixes",
                    type: "PUT",
                    headers: banhji.header,
                    dataType: 'json'
                },
                destroy: {
                    url: apiUrl + "prefixes",
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
            filter: {
                field: "type",
                operator: "where_not_in",
                value: ["Electricity_Invoice", "Utility_Invoice"]
            },
            batch: true,
            serverFiltering: true,
            serverSorting: true,
            serverPaging: true,
            page: 1,
            pageSize: 100
        }),
        pageLoad: function(id) {
            if (id) {
                this.set("isEdit", true);
                this.loadObj(id);
            } else {
                this.cancel;
            }
        },
        loadObj: function(id) {
            var self = this;
            this.dataSource.query({
                filter: {
                    field: "id",
                    value: id
                },
                page: 1,
                take: 100
            }).then(function(e) {
                var view = self.dataSource.view();
                self.set("obj", view[0]);

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
            //Save Obj
            this.objSync()
                .then(function(data) { //Success 
                    banhji.accountingSetting.prefixDS.fetch();
                    return data;
                }, function(reason) { //Error
                    $("#ntf1").data("kendoNotification").error(reason);
                }).then(function(result) {
                    $("#ntf1").data("kendoNotification").success(banhji.source.successMessage);
                    if (self.get("saveClose")) {
                        //Save Close
                        self.set("saveClose", false);
                        self.cancel();
                        //window.history.back();
                    } else {
                        //Save New
                        self.addEmpty();
                    }
                });
        },
        cancel: function() {
            this.dataSource.cancelChanges();
            window.history.back();
        }
    });
    /* Invoice Section */
    banhji.transactionLine = kendo.observable({
        dataSource: dataStore(apiUrl + "journal_lines"),
        addById: function(transactionId, contactId, accountId, description, dr, cr, issuedDate) {
            // todo: create chart of accounts: water_sale_revenue(42610) & service_charge(42620) & maintenance(42630)
            // get from customer 
            this.dataSource.add({
                transaction_id: transactionId,
                account_id: accountId,
                contact_id: contactId,
                description: description,
                reference_no: "",
                job_id: "",
                segments: [],
                dr: dr,
                cr: cr,
                rate: banhji.source.getRate(banhji.locale, issuedDate),
                locale: banhji.locale
            });
        },
        save: function() {
            // customer account and Cash account
            var that = this,
                dfd = $.Deferred();
            this.dataSource.sync();
            this.dataSource.bind('requestEnd', function(e) {
                if (e.response && e.type != 'read') {
                    dfd.resolve(e.response.results);
                } else {
                    dfd.reject(false);
                }
            });
            this.dataSource.bind('error', function(e) {
                dfd.reject(false);
            });
            return dfd.promise();
        }
    });
    banhji.transaction = kendo.observable({
        dataSource: dataStore(apiUrl + "transactions"),
        makeInvoice: function(contactId, payment, amount, type, location, meterID) {
            var duedate = new Date(),
                dfd = $.Deferred();
            duedate.setDate(duedate.getDate() + 7);

            banhji.transaction.dataSource.insert(0, {
                contact_id: contactId, //Customer
                transaction_template_id: 3,
                payment_term_id: 0,
                reference_id: "",
                recurring_id: "",
                job_id: 0,
                location_id: location,
                user_id: banhji.userData.id,
                employee_id: "", //Sale Rep           
                type: type, //Required
                discount: 0,
                tax: 0,
                deposit: 0,
                amount: amount,
                sub_total: amount,
                payment_term_id: 5,
                meter_id: meterID,
                remaining: 0,
                credit_allowed: 0,
                rate: 1,
                locale: banhji.locale,
                issued_date: new Date(),
                due_date: duedate,
                bill_to: "",
                ship_to: "",
                memo: "",
                memo2: "",
                status: 0,
                segments: [],
                is_journal: 0,
                //Recurring
                recurring_name: "",
                start_date: new Date(),
                frequency: "Daily",
                month_option: "Day",
                interval: 1,
                day: 1,
                week: 0,
                month: 0,
                is_recurring: 0
            });
            if (banhji.transaction.dataSource.at(0)) {
                dfd.resolve(banhji.transaction.dataSource.at(0));
            } else {
                dfd.reject(false);
            }
            return dfd.promise();
        },
        save: function() {
            var that = this,
                dfd = $.Deferred();
            banhji.transaction.dataSource.sync();
            banhji.transaction.dataSource.bind('requestEnd', function(e) {
                if (e.response && e.type != 'read') {
                    dfd.resolve(e.response.results);
                } else {
                    dfd.reject(false);
                }
            });
            banhji.transaction.dataSource.bind('error', function(e) {
                dfd.reject(false);
            });
            return dfd.promise();
        }
    });

    /* End of Invoice Section */
    /*==== Meter=====*/
    banhji.Reorder = kendo.observable({
        lang: langVM,
        dataSource: dataStore(apiUrl + "meters"),
        licenseDS: dataStore(apiUrl + "branches"),
        blocDS: dataStore(apiUrl + "locations"),
        subLocationDS: dataStore(apiUrl + "locations"),
        boxDS: dataStore(apiUrl + "locations"),
        licenseSelect: null,
        blocSelect: null,
        selectMeter: false,
        selectLocation: false,
        haveLicense: false,
        haveLocation: false,
        haveSubLocation: false,
        pageLoad: function(id) {},
        licenseChange: function(e) {
            var self = this;
            this.blocDS.data([]);
            this.set("locationSelect", "");
            this.set("haveLicense", false)
            this.subLocationDS.data([]);
            this.boxDS.data([]);
            this.set("boxSelect", "");
            this.set("haveSubLocation", false);

            this.blocDS.filter([{
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
            this.set("haveLicense", true);
        },
        onLocationChange: function(e) {
            var self = this;
            this.subLocationDS.data([]);
            this.boxDS.data([]);
            this.set("boxSelect", "");
            this.set("haveSubLocation", false);
            if (this.get("blocSelect")) {
                this.subLocationDS.query({
                        filter: [{
                                field: "branch_id",
                                value: this.get("licenseSelect")
                            },
                            {
                                field: "main_bloc",
                                value: this.get("blocSelect")
                            },
                            {
                                field: "main_pole",
                                value: 0
                            }
                        ],
                        page: 1
                    })
                    .then(function(e) {
                        if (self.subLocationDS.data().length > 0) {
                            self.set("haveLocation", true);
                        } else {
                            self.set("haveLocation", false);
                            self.set("subLocationSelect", "");
                            self.subLocationDS.data([]);
                        }
                    });
            }
        },
        onSubLocationChange: function(e) {
            var self = this;
            this.boxDS.data([]);
            if (this.get("subLocationSelect")) {
                this.boxDS.query({
                        filter: [{
                                field: "branch_id",
                                value: this.get("licenseSelect")
                            },
                            {
                                field: "main_bloc",
                                value: this.get("blocSelect")
                            },
                            {
                                field: "main_pole",
                                value: this.get("subLocationSelect")
                            }
                        ],
                        page: 1
                    })
                    .then(function(e) {
                        if (self.boxDS.data().length > 0) {
                            self.set("haveSubLocation", true);
                        } else {
                            self.set("haveSubLocation", false);
                            self.set("boxSelect", "");
                            self.boxDS.data([]);
                        }
                    });
            }
        },
        exArray: [],
        search: function() {
            license_id = this.get("licenseSelect"),
                bloc_id = this.get("blocSelect");
            var para = [{
                field: "activated",
                value: 1
            }];

            if (license_id) {
                para.push({
                    field: "branch_id",
                    value: license_id
                });
                if (bloc_id) {
                    if (this.get("boxSelect")) {
                        para.push({
                            field: "box_id",
                            value: this.get("boxSelect")
                        });
                    } else if (this.get("subLocationSelect")) {
                        para.push({
                            field: "pole_id",
                            value: this.get("subLocationSelect")
                        });
                    } else {
                        para.push({
                            field: "location_id",
                            value: bloc_id
                        });
                    }

                    var self = this;
                    this.dataSource.query({
                        filter: para
                    }).then(function() {
                        if (self.dataSource.data().length > 0) {
                            self.exArray.push({
                                cells: [{
                                        value: "Order",
                                        background: "#496cad",
                                        color: "#ffffff"
                                    },
                                    {
                                        value: "Meter Number",
                                        background: "#496cad",
                                        color: "#ffffff"
                                    },
                                    {
                                        value: "Customer",
                                        background: "#496cad",
                                        color: "#ffffff"
                                    }
                                ]
                            });
                            for (var i = 0; i < self.dataSource.data().length; i++) {
                                self.exArray.push({
                                    cells: [{
                                            value: self.dataSource.data()[i].worder
                                        },
                                        {
                                            value: self.dataSource.data()[i].meter_number
                                        },
                                        {
                                            value: self.dataSource.data()[i].contact_name
                                        }
                                    ]
                                });
                            }
                        }
                    });
                } else {
                    alert("Please Select Location");
                }
            } else {
                alert("Please Select License");
            }
        },
        save: function() {
            var self = this;
            $.each(this.dataSource.data(), function(index, value) {
                value.set("worder", index);
            });
            this.dataSource.sync();
            var saved = false;
            this.dataSource.bind("requestEnd", function(e) {
                if (e.type == "update" && saved == false) {
                    saved = true;
                }
                var notificat = $("#ntf1").data("kendoNotification");
                notificat.hide();
                notificat.success(self.lang.lang.success_message);
            });
        },
        ExportExcel: function() {
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
                        }
                    ],
                    title: "Reorder Meter",
                    rows: this.exArray
                }]
            });
            //save the file as Excel file with extension xlsx
            kendo.saveAs({
                dataURI: workbook.toDataURL(),
                fileName: this.get("licenseSelect").name + "_" + this.get("blocSelect").name + "_" + "<?php echo date('d-M-Y'); ?>.xlsx"
            });
        },
        printGrid: function() {
            var self = this,
                Win, pHeight, pWidth;

            Win = window.open('', '', 'width=800, height=900');
            pHeight = "210mm";
            pWidth = "150mm";

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
                '<style type="text/css" media="print">' +
                '@page { size: portrait; margin:0.5cm;' +
                'size: A5;' +
                '} ' +
                '@media print {' +
                'html, body {' +
                'max-width: ' + pWidth + ';' +
                'max-height: ' + pHeight + ';' +
                'min-width: ' + pWidth + ';' +
                'min-height: ' + pHeight + ';' +
                '}' +
                '}' +
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
                '<body><div class="row-fluid" ><div id="example" class="k-content">';
            var htmlEnd =
                '</div></div></body>' +
                '</html>';
            printableContent = $('#invFormContent').html();
            doc.write(htmlStart + printableContent + htmlEnd);
            doc.close();
            setTimeout(function() {
                win.print();
                //win.close();
            }, 2000)
        },
        cancel: function() {
            this.dataSource.data([]);
            banhji.router.navigate("/");
        }
    });
    /*==== End Meter=====*/

    banhji.cashReceipt = kendo.observable({
        lang: langVM,
        numCustomer: 0,
        paymentReceiptToday: 0,
        currencyDS: banhji.source.currencyDS,
        reconcileVM: banhji.reconcileVM,
        reconReceipt: banhji.reconReceipt,
        cashCurrencyDS: [],
        addRow: function() {
            this.cashCurrencyDS.push({
                id: 1,
                code: "USD",
                cash_receipt: 0
            });
            this.cashCurrencyDS.push({
                id: 3,
                code: "KHR",
                cash_receipt: 0
            });
        },
        removeCurrencyRow: function(e) {
            var that = this;
            $.each(this.cashCurrencyDS, function(i, v) {
                if (v === e.data) {
                    that.cashCurrencyDS.splice(i, 1);
                    return false;
                }
            });
        },
        dataSource: dataStore(apiUrl + "transactions"),
        deleteDS: dataStore(apiUrl + "transactions"),
        invoiceDS: dataStore(apiUrl + "transactions"),
        creditDS: dataStore(apiUrl + "transactions"),
        journalLineDS: dataStore(apiUrl + "journal_lines"),
        currencyRateDS: dataStore(apiUrl + "currencies/rate"),
        contactDS: banhji.source.customerDS,
        employeeDS: banhji.source.saleRepDS,
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
        txnTemplateDS: new kendo.data.DataSource({
            transport: {
                read: {
                    url: apiUrl + "transaction_templates",
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
                field: "type",
                value: "Cash_Receipt"
            },
            batch: true,
            serverFiltering: true,
            serverSorting: true,
            serverPaging: true,
            page: 1,
            pageSize: 100
        }),
        segmentItemDS: banhji.source.segmentItemDS,
        amtDueColor: banhji.source.amtDueColor,
        showCheckNo: false,
        obj: null,
        isEdit: false,
        saveClose: false,
        savePrint: false,
        searchText: "",
        contact_id: "",
        invoice_id: 0,
        sub_total: 0,
        discount: 0,
        total: 0,
        pay: 0,
        remain: 0,
        user_id: banhji.source.user_id,
        pageLoad: function(id) {
            if (id) {
                this.set("isEdit", true);
                this.loadObj(id);
            } else {
                if (this.get("isEdit") || this.dataSource.total() == 0) {
                    this.addEmpty();
                }
            }
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
                var term = value.payment_term_id != "0" ? self.paymentTermDS.get(value.payment_term_id) : 0,
                    percentage = term != 0 ? term.discount_percentage : 0,
                    period = term.discount_period || 0,
                    termDate = new Date(value.reference[0].issued_date);
                termDate.setDate(termDate.getDate() + period);
                if (today <= termDate) {
                    if (value.amount_paid == 0) {
                        var amount = value.reference[0].amount * percentage;
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
        //Search    
        search: function() {
            var self = this,
                para = [],
                obj = this.get("obj"),
                date = kendo.toString(new Date(obj.issued_date), "yyyy-MM-dd"),
                searchText = this.get("searchText"),
                invoice_id = this.get("invoice_id"),
                contact_id = this.get("contact_id");
            if (contact_id > 0) {
                para.push({
                    field: "contact_id",
                    value: contact_id
                });
            }
            if (invoice_id > 0) {
                para.push({
                    field: "id",
                    value: invoice_id
                });
            }
            if (searchText !== "") {
                para.push({
                    field: "number",
                    value: searchText
                });
            }
            para.push({
                field: "type",
                value: "Utility_Invoice"
            });
            para.push({
                field: "status",
                operator: "where_in",
                value: [0, 2]
            });
            if (this.dataSource.total() > 0) {
                var idList = [];
                $.each(this.dataSource.data(), function(index, value) {
                    idList.push(value.reference_id);
                });
            }
            this.invoiceDS.query({
                filter: para,
                page: 1,
                pageSize: 100
            }).then(function() {
                var view = self.invoiceDS.view();
                if (view.length > 0) {
                    $.each(view, function(index, value) {
                        var amount_due = value.amount - (value.amount_paid + value.deposit);
                        var contact = banhji.source.contactDS.get(value.contact_id);
                        self.dataSource.add({
                            transaction_template_id: 0,
                            number: value.number,
                            contact_id: value.contact_id,
                            account_id: obj.account_id,
                            payment_term_id: value.payment_term_id,
                            payment_method_id: obj.payment_method_id,
                            reference_id: value.id,
                            user_id: self.get("user_id"),
                            check_no: value.check_no,
                            type: "Cash_Receipt",
                            amount: amount_due,
                            discount: 0,
                            rate: value.rate,
                            locale: value.locale,
                            issued_date: obj.issued_date,
                            memo: obj.memo,
                            memo2: obj.memo2,
                            due_date: value.due_date,
                            status: 0,
                            segments: obj.segments,
                            is_journal: 1,
                            //Recurring
                            recurring_name: "",
                            discount_period: typeof value.discount_period !== undefined ? value.discount_period : null,
                            start_date: new Date(),
                            frequency: "Daily",
                            month_option: "Day",
                            interval: 1,
                            day: 1,
                            week: 0,
                            month: 0,
                            is_recurring: 0,
                            contact: {
                                id: contact.id,
                                name: contact.name
                            },
                            amount_due: kendo.toString(amount_due, value.locale == "km-KH" ? "c0" : "c", value.locale),
                            amount_paid: value.amount_paid,
                            reference: [{
                                "number": value.number,
                                "amount": value.amount,
                                "deposit": value.deposit,
                                "issued_date": value.issued_date,
                                "account_id": value.account_id
                            }]
                        });
                        self.set('numCustomer', self.get('numCustomer') + 1);
                    });
                    self.applyTerm();
                    self.setRate();
                }
                self.set("searchText", "");
                self.set("contact_id", "");
                self.set("invoice_id", 0);
            });
        },
        //Obj
        loadObj: function(id) {
            var self = this,
                para = [];
            para.push({
                field: "id",
                value: id
            });
            this.dataSource.query({
                filter: para,
                page: 1,
                pageSize: 100
            }).then(function() {
                var view = self.dataSource.view();
                var amount_due = kendo.parseFloat(view[0].reference[0].amount) - (view[0].amount_paid + kendo.parseFloat(view[0].reference[0].deposit)),
                    total = amount_due - view[0].discount,
                    remain = amount_due - (view[0].amount + view[0].discount);
                view[0].set("amount_due", kendo.toString(amount_due, view[0].locale == "km-KH" ? "c0" : "c", view[0].locale));
                self.set("obj", view[0]);
                self.set("sub_total", kendo.toString(amount_due, view[0].locale == "km-KH" ? "c0" : "c", view[0].locale));
                self.set("discount", kendo.toString(view[0].discount, view[0].locale == "km-KH" ? "c0" : "c", view[0].locale));
                self.set("total", kendo.toString(total, view[0].locale == "km-KH" ? "c0" : "c", view[0].locale));
                self.set("pay", kendo.toString(view[0].amount, view[0].locale == "km-KH" ? "c0" : "c", view[0].locale));
                self.set("remain", kendo.toString(remain, view[0].locale == "km-KH" ? "c0" : "c", view[0].locale));
                self.journalLineDS.filter({
                    field: "transaction_id",
                    value: id
                });
                self.creditDS.filter([{
                        field: "reference_id",
                        value: id
                    },
                    {
                        field: "type",
                        value: "Customer_Deposit"
                    }
                ]);
            });
        },
        changes: function() {
            var self = this,
                obj = this.get("obj"),
                total = 0,
                subTotal = 0,
                discount = 0,
                pay = 0,
                remain = 0;
            $.each(this.dataSource.data(), function(index, value) {
                subTotal += kendo.parseFloat(value.amount_due) / value.rate;
                discount += value.discount / value.rate;
                pay += value.amount / value.rate;
            });
            total = subTotal - discount;
            remain = total - pay;
            this.set("sub_total", kendo.toString(subTotal, banhji.locale == "km-KH" ? "c0" : "c", banhji.locale));
            this.set("discount", kendo.toString(discount, banhji.locale == "km-KH" ? "c0" : "c", banhji.locale));
            this.set("total", kendo.toString(total, banhji.locale == "km-KH" ? "c0" : "c", banhji.locale));
            this.set("pay", kendo.toString(pay, banhji.locale == "km-KH" ? "c0" : "c", banhji.locale));
            this.set("remain", kendo.toString(remain, banhji.locale == "km-KH" ? "c0" : "c", banhji.locale));
        },
        removeRow: function(e) {
            this.dataSource.remove(e.data);
            this.changes();
        },
        addEmpty: function() {
            this.dataSource.data([]);
            this.invoiceDS.data([]);
            this.creditDS.data([]);
            this.journalLineDS.data([]);
            this.set("isEdit", false);
            this.set("obj", null);
            this.set("sub_total", 0);
            this.set("discount", 0);
            this.set("total", 0);
            this.set("pay", 0);
            this.set("remain", 0);
            this.set("obj", {
                transaction_template_id: 6,
                account_id: 7,
                payment_method_id: 1,
                rate: 1,
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
            //Edit Mode
            if (this.get("isEdit")) {
                //Update Journal
                $.each(this.journalLineDS.data(), function(index, value) {
                    value.set("deleted", 1);
                });
                this.addJournal(obj.id);
                //Credit
                if (this.creditDS.total() > 0) {
                    var credit = this.creditDS.at(0),
                        overAmount = ((obj.reference[0].amount - obj.amount_paid) - obj.amount) - obj.discount;

                    if (overAmount < 0) {
                        credit.set("amount", overAmount * -1);
                    } else {
                        credit.set("amount", 0);
                    }
                    this.creditDS.sync();
                } else {
                    this.addCredit(obj.id);
                }
            } else {
                //Add brand new transaction
                $.each(this.dataSource.data(), function(index, value) {
                    value.set("transaction_template_id", obj.transaction_template_id);
                    value.set("account_id", obj.account_id);
                    value.set("payment_method_id", obj.payment_method_id);
                    value.set("issued_date", obj.issued_date);
                    value.set("memo", obj.memo);
                    value.set("memo2", obj.memo2);
                    value.set("segments", obj.segments);
                });
            }
            this.objSync()
                .then(function(data) {
                    if (self.get("isEdit") == false) {
                        self.addCredit(data[0].id);
                        self.addJournal(data[0].id);
                    }
                    return data;
                }, function(reason) { //Error
                    $("#ntf1").data("kendoNotification").error(reason);
                }).then(function(result) {
                    $("#ntf1").data("kendoNotification").success(banhji.source.successMessage);
                    self.set('paymentReceiptToday', self.get('paymentReceiptToday') + self.get('total'));
                    self.set('total', 0);
                    if (self.get("saveClose")) {
                        //Save Close          
                        self.set("saveClose", false);
                        self.cancel();
                        window.history.back();
                    } else if (self.get("savePrint")) {
                        //Save Print          
                        self.set("savePrint", false);
                        self.cancel();
                        if (result[0].transaction_template_id > 0) {
                            banhji.router.navigate("/invoice_form/" + result[0].id);
                        }
                    } else {
                        //Save New
                        self.addEmpty();
                    }
                });
        },
        cancel: function() {
            this.dataSource.cancelChanges();
            banhji.userManagement.removeMultiTask("cash_receipt");
            banhji.router.navigate("/");
        },
        //Deposit
        addCredit: function(cash_receipt_id) {
            var self = this,
                obj = this.get("obj");
            //Add over amount to customer credit
            $.each(this.dataSource.data(), function(index, value) {
                var overAmount = ((value.reference[0].amount - value.amount_paid) - value.amount) - value.discount;
                if (overAmount < 0) {
                    self.creditDS.add({
                        contact_id: value.contact_id,
                        account_id: value.contact[0].deposit_account_id,
                        payment_method_id: obj.payment_method_id,
                        reference_id: cash_receipt_id,
                        user_id: self.get("user_id"),
                        check_no: value.check_no,
                        type: "Customer_Deposit",
                        amount: overAmount * -1,
                        discount: 0,
                        rate: value.rate,
                        locale: value.locale,
                        issued_date: obj.issued_date,
                        memo: obj.memo,
                        memo2: obj.memo2,
                        status: 0,
                        segments: obj.segments,
                        is_journal: 0,
                        //Recurring
                        recurring_name: "",
                        start_date: new Date(),
                        frequency: "Daily",
                        month_option: "Day",
                        interval: 1,
                        day: 1,
                        week: 0,
                        month: 0,
                        is_recurring: 0
                    });
                }
            });
            this.creditDS.sync();
        },
        //Journal
        addJournal: function(transaction_id) {
            var self = this,
                obj = this.get("obj");
            $.each(this.dataSource.data(), function(index, value) {
                var overAmount = ((value.reference[0].amount - value.amount_paid) - value.amount) - value.discount;
                //Cash on Dr
                self.journalLineDS.add({
                    transaction_id: transaction_id,
                    account_id: obj.account_id,
                    contact_id: value.contact_id,
                    description: "",
                    reference_no: "",
                    segments: [],
                    dr: value.amount,
                    cr: 0,
                    rate: value.rate,
                    locale: value.locale
                });
                if (value.discount > 0) {
                    //Discount on Dr
                    self.journalLineDS.add({
                        transaction_id: transaction_id,
                        account_id: value.contact[0].settlement_discount_id,
                        contact_id: value.contact_id,
                        description: "",
                        reference_no: "",
                        segments: [],
                        dr: value.discount,
                        cr: 0,
                        rate: value.rate,
                        locale: value.locale
                    });
                }
                //AR on Cr
                self.journalLineDS.add({
                    transaction_id: transaction_id,
                    account_id: value.contact[0].account_id,
                    contact_id: value.contact_id,
                    description: "",
                    reference_no: "",
                    segments: [],
                    dr: 0,
                    cr: kendo.parseFloat(value.amount),
                    rate: value.rate,
                    locale: value.locale
                });
                if (overAmount < 0) {
                    self.journalLineDS.add({
                        transaction_id: transaction_id,
                        account_id: value.contact[0].deposit_account_id,
                        contact_id: value.contact_id,
                        description: "",
                        reference_no: "",
                        segments: [],
                        dr: 0,
                        cr: overAmount * -1,
                        rate: value.rate,
                        locale: value.locale
                    });
                }
            });
            self.journalLineDS.sync();
        }
    });
    //Receipt
    banhji.Receipt = kendo.observable({
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
        //Search
        search: function() {
            var self = this,
                para = [],
                obj = this.get("obj"),
                searchText = this.get("searchText");
            if (searchText !== "") {
                $("#loadING").css("display", "block");
                this.exArray = [];
                para.push({
                    field: "number",
                    value: searchText
                });
                if (jQuery.inArray(searchText, this.idList) != -1) {
                    alert("This Invoice already Included!");
                    this.set("searchText", "");
                    $("#loadING").css("display", "none");
                } else {
                    this.txnDS.query({
                        filter: para,
                        page: 1,
                        pageSize: 1
                    }).then(function() {
                        var view = self.txnDS.view();
                        if (view.length > 0) {
                            self.set("btnActive", false);
                            $.each(view, function(index, v) {
                                if (v.amount_fine > 0) {
                                    self.set("haveFine", true);
                                }
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
                                    number: "",
                                    invnumber: v.number,
                                    type: "Cash_Receipt",
                                    sub_total: amount_due,
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
                    });
                }
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
                amountFine += kendo.parseFloat(value.amount_fine);
            });
            total = sub_total - discount;
            remaining = total - total_received;
            obj.set("sub_total", sub_total);
            obj.set("discount", discount);
            this.set("total", kendo.toString(total, banhji.locale == "km-KH" ? "c0" : "c", banhji.locale));
            this.set("amountFine", kendo.toString(amountFine, banhji.locale == "km-KH" ? "c0" : "c", banhji.locale));
            this.set("total_received", kendo.toString(total_received, banhji.locale == "km-KH" ? "c0" : "c", banhji.locale));
            obj.set("remaining", remaining);
            this.set("amountReceive", total_received)
            this.setDefaultReceiptCurrency(total_received);
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
            banhji.userManagement.removeMultiTask("receipt");
        }
    });
    banhji.customerDeposit = kendo.observable({
        lang: langVM,
        dataSource: dataStore(apiUrl + "transactions"),
        deleteDS: dataStore(apiUrl + "transactions"),
        lineDS: dataStore(apiUrl + "account_lines"),
        referenceDS: dataStore(apiUrl + "transactions"),
        referenceLineDS: dataStore(apiUrl + "account_lines"),
        recurringDS: dataStore(apiUrl + "transactions"),
        recurringLineDS: dataStore(apiUrl + "account_lines"),
        journalLineDS: dataStore(apiUrl + "journal_lines"),
        currencyRateDS: dataStore(apiUrl + "currencies/rate"),
        attachmentDS: dataStore(apiUrl + "attachments"),
        txnTemplateDS: new kendo.data.DataSource({
            transport: {
                read: {
                    url: apiUrl + "transaction_templates",
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
                field: "type",
                value: "Customer_Deposit"
            },
            batch: true,
            serverFiltering: true,
            serverSorting: true,
            serverPaging: true,
            page: 1,
            pageSize: 100
        }),
        contact: null,
        contactDS: banhji.source.customerDS,
        depositAccountDS: banhji.source.depositAccountDS,
        segmentItemDS: banhji.source.segmentItemDS,
        accountDS: banhji.source.cashAccountDS,
        amtDueColor: banhji.source.amtDueColor,
        confirmMessage: banhji.source.confirmMessage,
        frequencyList: banhji.source.frequencyList,
        monthList: banhji.source.monthList,
        monthOptionList: banhji.source.monthOptionList,
        weekDayList: banhji.source.weekDayList,
        dayList: banhji.source.dayList,
        showMonthOption: false,
        showMonth: false,
        showWeek: false,
        showDay: false,
        obj: null,
        isEdit: false,
        saveClose: false,
        savePrint: false,
        saveRecurring: false,
        showConfirm: false,
        statusSrc: "",
        enableRef: false,
        total: 0,
        original_total: 0,
        user_id: banhji.source.user_id,
        pageLoad: function(id, is_recurring) {
            if (id) {
                this.set("isEdit", true);
                this.loadObj(id, is_recurring);
            } else {
                if (this.get("isEdit") || this.dataSource.total() == 0) {
                    this.addEmpty();
                }
            }
        },
        //Upload
        onSelect: function(e) {
            // Array with information about the uploaded files
            var self = this,
                files = e.files,
                obj = this.get("obj");
            // Check the extension of each file and abort the upload if it is not .jpg
            $.each(files, function(index, value) {
                if (value.extension.toLowerCase() === ".jpg" ||
                    value.extension.toLowerCase() === ".jpeg" ||
                    value.extension.toLowerCase() === ".tiff" ||
                    value.extension.toLowerCase() === ".png" ||
                    value.extension.toLowerCase() === ".gif" ||
                    value.extension.toLowerCase() === ".pdf") {
                    var key = 'ATTACH_' + banhji.institute.id + "_" + Math.floor(Math.random() * 100000000000000001) + '_' + value.name;
                    self.attachmentDS.add({
                        user_id: self.get("user_id"),
                        transaction_id: obj.id,
                        type: "Transaction",
                        name: value.name,
                        description: "",
                        key: key,
                        url: banhji.s3 + key,
                        size: value.size,
                        created_at: new Date(),
                        file: value.rawFile
                    });
                } else {
                    alert("This type of file is not allowed to attach.");
                }
            });
        },
        removeFile: function(e) {
            var data = e.data;

            if (confirm(banhji.source.confirmMessage)) {
                this.attachmentDS.remove(data);
            }
        },
        uploadFile: function() {
            $.each(this.attachmentDS.data(), function(index, value) {
                if (!value.id) {
                    var params = {
                        Body: value.file,
                        Key: value.key
                    };
                    bucket.upload(params, function(err, data) {});
                }
            });

            this.attachmentDS.sync();
            var saved = false;
            this.attachmentDS.bind("requestEnd", function(e) {
                //Delete File
                if (e.type == "destroy") {
                    if (saved == false && e.response) {
                        saved = true;

                        var response = e.response.results;
                        $.each(response, function(index, value) {
                            var params = {
                                //Bucket: 'STRING_VALUE', /* required */
                                Delete: { /* required */
                                    Objects: [ /* required */ {
                                            Key: value.data.key /* required */
                                        }
                                        /* more items */
                                    ]
                                }
                            };
                            bucket.deleteObjects(params, function(err, data) {});
                        });
                    }
                }
            });
        },
        //Contact
        loadContact: function(id) {
            var self = this;

            this.contactDS.query({
                filter: {
                    field: "id",
                    value: id
                },
                page: 1,
                pageSize: 100
            }).then(function(e) {
                var view = self.contactDS.view(),
                    obj = self.get("obj");

                obj.set("contact_id", view[0].id);
                obj.set("account_id", view[0].deposit_account_id);
                obj.set("locale", view[0].locale);

                self.setRate();
                self.loadReference();
                self.loadRecurring();
            });
        },
        contactChanges: function() {
            var obj = this.get("obj");

            if (obj.contact_id > 0) {
                var contact = this.contactDS.get(obj.contact_id);

                obj.set("account_id", contact.deposit_account_id);
                obj.set("locale", contact.locale);
                this.setRate();
                this.loadReference();
                this.loadRecurring();
            }

            this.lineDS.data([]);
            this.addRow();
            this.changes();
        },
        //Currency Rate
        setRate: function() {
            var obj = this.get("obj"),
                rate = banhji.source.getRate(obj.locale, new Date(obj.issued_date));

            obj.set("rate", rate);

            $.each(this.lineDS.data(), function(index, value) {
                value.set("rate", rate);
                value.set("locale", obj.locale);
            });
        },
        //Segment
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
        //Obj
        loadObj: function(id, is_recurring) {
            var self = this,
                para = [];

            para.push({
                field: "id",
                value: id
            });

            if (is_recurring) {
                para.push({
                    field: "is_recurring",
                    value: 1
                });
            }

            this.dataSource.query({
                filter: para,
                page: 1,
                pageSize: 1
            }).then(function(e) {
                var view = self.dataSource.view();

                self.set("obj", view[0]);
                self.set("original_total", view[0].amount);
                self.set("total", kendo.toString(view[0].amount, view[0].locale == "km-KH" ? "c0" : "c", view[0].locale));
                self.lineDS.filter({
                    field: "transaction_id",
                    value: id
                });
                self.journalLineDS.filter({
                    field: "transaction_id",
                    value: id
                });
                self.referenceDS.filter({
                    field: "id",
                    value: view[0].reference_id
                });

                self.loadRecurring();
            });
        },
        changes: function() {
            var obj = this.get("obj");

            if (this.lineDS.total() > 0) {
                var sum = 0;

                $.each(this.lineDS.data(), function(index, value) {
                    sum += value.amount;
                });

                this.set("total", kendo.toString(sum, obj.locale == "km-KH" ? "c0" : "c", obj.locale));
                obj.set("amount", sum);
            } else {
                this.set("total", 0);
                obj.set("amount", 0);
            }
        },
        addEmpty: function() {
            this.dataSource.data([]);
            this.lineDS.data([]);
            this.attachmentDS.data([]);
            this.journalLineDS.data([]);

            this.set("isEdit", false);
            this.set("obj", null);
            this.set("total", 0);

            this.dataSource.insert(0, {
                contact_id: "",
                transaction_template_id: "",
                recurring_id: "",
                reference_id: "",
                account_id: "",
                user_id: this.get("uer_id"),
                type: "Customer_Deposit", //required
                amount: 0,
                rate: 1,
                locale: banhji.locale,
                issued_date: new Date(),
                memo: "",
                memo2: "",
                segments: [],
                is_journal: 1,
                //Recurring
                recurring_name: "",
                start_date: new Date(),
                frequency: "Daily",
                month_option: "Day",
                interval: 1,
                day: 1,
                week: 0,
                month: 0,
                is_recurring: 0
            });

            var obj = this.dataSource.at(0);
            this.set("obj", obj);

            this.setRate();
            this.addRow();
        },
        addRow: function() {
            var obj = this.get("obj");

            this.lineDS.add({
                transaction_id: obj.id,
                account_id: "",
                description: "",
                reference_no: "",
                amount: 0,
                rate: obj.rate,
                locale: obj.locale
            });
        },
        removeRow: function(e) {
            var data = e.data;
            if (this.lineDS.total() > 1) {
                this.lineDS.remove(data);
                this.changes();
            }
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
            //Reference
            if (obj.reference_id > 0) {
                var ref = this.referenceDS.get(obj.reference_id);
                ref.set("deposit", obj.amount);
                this.referenceDS.sync();
            } else {
                obj.set("reference_id", 0);
            }
            //Recurring
            if (this.get("saveRecurring")) {
                this.set("saveRecurring", false);
                if (this.get("isEdit")) {
                    if (obj.is_recurring == "0") {
                        //Add brand new recurring from existing transaction
                        this.addNewRecurring();
                        this.recurringSync()
                            .then(function(data) { //Success
                                $.each(self.recurringLineDS.data(), function(index, value) {
                                    value.set("transaction_id", data[0].id);
                                });
                                self.recurringLineDS.sync();
                                return data;
                            }, function(reason) { //Error
                                $("#ntf1").data("kendoNotification").error(reason);
                            }).then(function(result) {
                                $("#ntf1").data("kendoNotification").success(banhji.source.successMessage);
                                self.addEmpty();
                            });
                    }
                } else {
                    obj.set("is_recurring", 1);
                }
            }
            //Edit Mode
            if (this.get("isEdit")) {
                obj.set("dirty", true);
                //Line has changed
                if (obj.amount !== this.get("original_total") && obj.is_recurring == 0) {
                    this.set("original_total", 0);
                    $.each(this.journalLineDS.data(), function(index, value) {
                        value.set("deleted", 1);
                    });
                    this.addJournal(obj.id);
                }
            }
            //Save Obj
            this.objSync()
                .then(function(data) { //Success
                    if (self.get("isEdit") == false) {
                        //Item line
                        $.each(self.lineDS.data(), function(index, value) {
                            value.set("transaction_id", data[0].id);
                        });
                        //Attachment
                        $.each(self.attachmentDS.data(), function(index, value) {
                            value.set("transaction_id", data[0].id);
                        });
                        if (obj.is_recurring == 0) {
                            //Journal
                            self.addJournal(data[0].id);
                        }
                    }
                    self.lineDS.sync();
                    self.uploadFile();
                    return data;
                }, function(reason) { //Error
                    $("#ntf1").data("kendoNotification").error(reason);
                }).then(function(result) {
                    $("#ntf1").data("kendoNotification").success(banhji.source.successMessage);
                    if (self.get("saveClose")) {
                        //Save Close          
                        self.set("saveClose", false);
                        self.cancel();
                        window.history.back();
                    } else if (self.get("savePrint")) {
                        //Save Print          
                        self.set("savePrint", false);
                        self.cancel();
                        banhji.router.navigate("/invoice_form/" + result[0].id);
                    } else {
                        //Save New
                        self.addEmpty();
                    }
                    // Refresh Customer
                    self.contactDS.filter({
                        field: "parent_id",
                        operator: "where_related",
                        model: "contact_type",
                        value: 1
                    });
                });
        },
        cancel: function() {
            this.dataSource.cancelChanges();
            this.lineDS.cancelChanges();
            this.attachmentDS.cancelChanges();

            this.dataSource.data([]);
            this.lineDS.data([]);
            this.attachmentDS.data([]);

            this.contactDS.filter({
                field: "parent_id",
                operator: "where_related",
                model: "contact_type",
                value: 1
            });

            banhji.userManagement.removeMultiTask("customer_deposit");
        },
        delete: function() {
            var self = this,
                obj = this.get("obj");
            this.set("showConfirm", false);

            this.deleteDS.query({
                filter: [{
                    field: "reference_id",
                    value: obj.id
                }],
                page: 1,
                pageSize: 1
            }).then(function() {
                var view = self.deleteDS.view();

                if (view.length > 0) {
                    alert("Sorry, you can not delete it.");
                } else {
                    obj.set("deleted", 1);
                    self.dataSource.sync();

                    window.history.back();
                }
            });
        },
        openConfirm: function() {
            this.set("showConfirm", true);
        },
        closeConfirm: function() {
            this.set("showConfirm", false);
        },
        //Journal
        addJournal: function(transaction_id) {
            var self = this,
                sum = 0,
                obj = this.get("obj");

            //Cash account on DR
            $.each(this.lineDS.data(), function(index, value) {
                sum += value.amount;
                self.journalLineDS.add({
                    transaction_id: transaction_id,
                    account_id: value.account_id,
                    contact_id: value.contact_id,
                    description: "",
                    reference_no: value.reference_no,
                    segments: [],
                    dr: value.amount,
                    cr: 0,
                    rate: value.rate,
                    locale: value.locale
                });
            });

            //Deposit on CR
            this.journalLineDS.add({
                transaction_id: transaction_id,
                account_id: obj.account_id,
                contact_id: obj.contact_id,
                description: "",
                reference_no: "",
                segments: obj.segments,
                dr: 0,
                cr: sum,
                rate: obj.rate,
                locale: obj.locale
            });

            this.journalLineDS.sync();
        },
        //Reference
        loadReference: function() {
            var obj = this.get("obj");

            if (obj.contact_id > 0) {
                this.set("enableRef", true);

                this.referenceDS.filter([{
                        field: "contact_id",
                        value: obj.contact_id
                    },
                    {
                        field: "status",
                        value: 0
                    },
                    {
                        field: "type",
                        value: "Sale_Order"
                    },
                    {
                        field: "due_date >=",
                        value: kendo.toString(obj.issued_date, "yyyy-MM-dd")
                    }
                ]);
            } else {
                this.set("enableRef", false);
                obj.set("reference_id", "");
            }
        },
        referenceChanges: function() {
            var obj = this.get("obj");

            if (obj.reference_id > 0) {
                var data = this.referenceDS.get(obj.reference_id);

                obj.set("segments", data.segments);
                obj.set("amount", data.amount);

                this.lineDS.data([]);
                this.lineDS.add({
                    transaction_id: obj.id,
                    account_id: "",
                    description: "",
                    reference_no: data.number,
                    amount: data.amount,
                    rate: data.rate,
                    locale: data.locale
                });
                this.set("total", kendo.toString(data.amount, data.locale == "km-KH" ? "c0" : "c", data.locale));
            }
        },
        //Recurring
        loadRecurring: function() {
            var obj = this.get("obj");

            this.recurringDS.filter([{
                    field: "type",
                    value: obj.type
                },
                {
                    field: "contact_id",
                    value: obj.contact_id
                },
                {
                    field: "is_recurring",
                    value: 1
                }
            ]);
        },
        applyRecurring: function() {
            var self = this,
                obj = this.get("obj");

            if (obj.recurring_id) {
                var data = this.recurringDS.get(obj.recurring_id);

                obj.set("employee_id", data.employee_id); //Sale Rep
                obj.set("segments", data.segments);
                obj.set("rate", data.rate);
                obj.set("locale", data.locale);
                obj.set("memo", data.memo);
                obj.set("memo2", data.memo2);
                obj.set("bill_to", data.bill_to);
                obj.set("ship_to", data.ship_to);

                this.recurringLineDS.query({
                    filter: {
                        field: "transaction_id",
                        value: data.id
                    },
                    page: 1,
                    pageSize: 100
                }).then(function() {
                    var view = self.recurringLineDS.view();
                    self.lineDS.data([]);

                    $.each(view, function(index, value) {
                        self.lineDS.add({
                            transaction_id: obj.id,
                            tax_item_id: value.tax_item_id,
                            item_id: value.item_id,
                            description: value.description,
                            quantity: value.quantity,
                            price: value.price,
                            amount: value.amount,
                            rate: value.rate,
                            locale: value.locale,

                            item_prices: value.item_prices
                        });
                    });

                    self.changes();
                });
            } else {
                this.addEmpty();
            }
        },
        frequencyChanges: function() {
            var obj = this.get("obj");

            switch (obj.frequency) {
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
        monthOptionChanges: function() {
            var obj = this.get("obj");

            switch (obj.month_option) {
                case "Day":
                    this.set("showWeek", false);
                    this.set("showDay", true);

                    break;
                default:
                    this.set("showWeek", true);
                    this.set("showDay", false);
            }
        },
        validateRecurring: function() {
            var result = true,
                obj = this.get("obj");

            if (obj.recurring_name !== "") {
                //Check existing name
                $.each(this.recurringDS.data(), function(index, value) {
                    if (value.recurring_name == obj.recurring_name) {
                        result = false;
                        alert("This is name is taken.");

                        return false;
                    }
                });
            } else {
                result = false;
                alert("Recurring name is required.");
            }

            return result;
        },
        addNewRecurring: function() {
            var self = this,
                obj = this.get("obj");

            this.recurringDS.add({
                contact_id: obj.contact_id,
                transaction_template_id: obj.transaction_template_id,
                user_id: this.get("user_id"),
                employee_id: obj.employee_id,
                type: obj.type,
                amount: obj.amount,
                discount: obj.discount,
                tax: obj.tax,
                rate: obj.rate,
                locale: obj.locale,
                bill_to: obj.bill_to,
                ship_to: obj.ship_to,
                memo: obj.memo,
                memo2: obj.memo2,
                segments: obj.segments,
                recurring_name: obj.recurring_name,
                start_date: obj.start_date,
                frequency: obj.frequency,
                month_option: obj.month_option,
                interval: obj.interval,
                day: obj.day,
                week: obj.week,
                month: obj.month,
                is_recurring: 1
            });

            $.each(this.lineDS.data(), function(index, value) {
                self.recurringLineDS.add({
                    transaction_id: 0,
                    measurement_id: value.measurement_id,
                    tax_item_id: value.tax_item_id,
                    item_id: value.item_id,
                    description: value.description,
                    quantity: value.quantity,
                    price: value.price,
                    amount: value.amount,
                    discount: value.discount,
                    rate: value.rate,
                    locale: value.locale
                });
            });
        },
        recurringSync: function() {
            var dfd = $.Deferred();

            this.recurringDS.sync();
            this.recurringDS.bind("requestEnd", function(e) {
                if (e.response) {
                    dfd.resolve(e.response.results);
                }
            });
            this.recurringDS.bind("error", function(e) {
                dfd.reject(e.errorThrown);
            });

            return dfd;
        }
    });
    banhji.invoiceCustom = kendo.observable({
        lang: langVM,
        dataSource: dataStore(apiUrl + "transaction_templates"),
        txnFormDS: dataStore(apiUrl + "transaction_forms"),
        obj: null,
        objForm: null,
        formTitle: "Invoice",
        formType: "Invoice",
        company: banhji.institute,
        selectCustom: "water_mg",
        isEdit: false,
        user_id: banhji.source.user_id,
        licenseDS: dataStore(apiUrl + "branches"),
        objLicense: null,
        pageLoad: function(id) {
            if (id) {
                this.set("isEdit", true);
                this.loadObj(id);
            } else {
                var obj = this.get("obj"),
                    self = this;
                banhji.view.invoiceCustom.showIn('#invFormContent', banhji.view.invoiceForm1);
                //banhji.invoiceForm.pageLoad();
                this.addEmpty();
                this.txnFormDS.query({
                    filter: [{
                        field: "moduls",
                        value: "water_mg"
                    }],
                    page: 1,
                    take: 100
                }).then(function(e) {
                    var view = self.txnFormDS.view();
                    var obj = self.get("obj");
                    obj.set("type", view[0].type);
                    obj.set("title", view[0].title);
                    obj.set("note", view[0].note);

                });
            }
            var self = this;
            this.licenseDS.query({
                filter: {
                    field: "id",
                    value: 1
                },
                take: 1
            }).then(function(e) {
                var view = self.licenseDS.view();
                self.set("objLicense", view[0]);
            });
        },
        onChange: function(e) {
            var obj = this.get("obj"),
                self = this;
            this.txnFormDS.query({
                filter: [{
                    field: "type",
                    value: obj.type
                }, {
                    field: "moduls",
                    value: "water_mg"
                }],
                page: 1,
                take: 100
            }).then(function(e) {
                var view = self.txnFormDS.view();
                if (view.length > 0) {
                    banhji.invoiceForm.set("obj", view[0]);
                    var obj = self.get("obj");
                    obj.set("type", view[0].type);
                    obj.set("title", view[0].title);
                    obj.set("note", view[0].note);
                }
            });
            setTimeout(function(e) {
                $('#formStyle a').eq(0).click();
            }, 2000);
        },
        addEmpty: function() {
            this.dataSource.data([]);
            this.set("obj", null);
            this.dataSource.insert(0, {
                user_id: banhji.source.user_id,
                transaction_form_id: 0,
                type: "Invoice",
                name: "",
                title: "Invoice",
                note: "",
                color: null,
                moduls: "water_mg",
                item_id: '',
                status: 0
            });
            var obj = this.dataSource.at(0);
            this.set("obj", obj);
        },
        activeInvoiceTmp: function(e) {
            var Active;
            switch (e) {
                case 43:
                    Active = banhji.view.invoiceForm1;
                    break;
                case 44:
                    Active = banhji.view.invoiceForm2;
                    break;
                case 45:
                    Active = banhji.view.invoiceForm3;
                    break;
            }
            banhji.view.invoiceCustom.showIn('#invFormContent', Active);
        },
        colorCC: function(e) {
            var Color = e.value;
            var tS = '';
            if (Color == '#000000' || Color == '#1f497d') tS = '#fff';
            else tS = '#333';
            $('.main-color').css({
                'background-color': e.value,
                'color': tS
            });
            $('.main-color div').css({
                'color': tS
            });
            $('.main-color p').css({
                'color': tS
            });
            $('.main-color span').css({
                'color': tS
            });
            $('.main-color th').css({
                'color': tS
            });
        },
        selectedForm: function(e) {
            var Index = e.data.id;
            this.activeInvoiceTmp(Index);
            var data = e.data,
                obj = this.get("obj");
            obj.set("transaction_form_id", data.id);
        },
        loadObj: function(id) {
            var self = this;
            this.dataSource.query({
                filter: {
                    field: "id",
                    value: id
                },
                page: 1,
                take: 100
            }).then(function(e) {
                var view = self.dataSource.view();
                self.set("obj", view[0]);

                //banhji.invoiceForm.set("obj", view[0]); 
                var Index = parseInt(view[0].transaction_form_id);
                self.activeInvoiceTmp(Index);
                //self.addRowLineDS();

                self.txnFormDS.filter({
                    field: "moduls",
                    value: "water_mg"
                });
            });
        },
        save: function() {
            var self = this;
            if (this.dataSource.data().length > 0) {
                this.dataSource.sync();
                this.dataSource.bind("requestEnd", function(e) {
                    if (e.type != 'read') {
                        if (e.response) {
                            $("#ntf1").data("kendoNotification").success("Successfully!");
                            //self.dataSource.addNew();
                            banhji.router.navigate("/setting");
                            banhji.setting.txnTemplateDS.fetch();
                        }
                    }
                });
                this.dataSource.bind("error", function(e) {
                    $("#ntf1").data("kendoNotification").error("Error!");
                });
            }
        },
        cancel: function() {
            this.dataSource.cancelChanges();
            banhji.router.navigate("/setting");
        }
    });
    banhji.waterInvoice = kendo.observable({
        lang: langVM,
        dataSource: dataStore(apiUrl + "winvoices"),
        licenseDS: dataStore(apiUrl + "branches"),
        company: banhji.institute,
        obj: null,
        invoiceArray: [],
        pageLoad: function(id) {
            var self = this;
            this.set("obj", null);
            this.dataSource.query({
                    filter: {
                        field: "id",
                        value: id
                    },
                    take: 1
                })
                .then(function(e) {
                    var view = self.dataSource.view();
                    self.invoiceArray = [];
                    if (self.dataSource.data().length > 0) {
                        view[0].set("formcolor", "#355176");
                        self.invoiceArray.push(view[0]);
                        self.getLicense(view[0].meter.location[0].branch_id);
                    }
                });
        },
        getLicense: function(branch_id) {
            var self = this;
            this.licenseDS.query({
                filter: {
                    field: "id",
                    value: branch_id
                }
            }).then(function(e) {
                var view = self.licenseDS.view();
                banhji.InvoicePrint.license = view[0];
                banhji.InvoicePrint.dataSource = [];
                banhji.InvoicePrint.dataSource = self.invoiceArray;

                banhji.router.navigate("/invoice_print");

            });
        },
        printGrid: function() {
            var obj = this.get('obj'),
                colorM, ts;
            if (obj.color == null) {
                colorM = "#10253f";
            } else {
                colorM = obj.color;
            }
            if (obj.color == '#000000' || obj.color == '#1f497d' || obj.color == null) {
                ts = 'color: #fff!important;';
            } else {
                ts = 'color: #333;';
            }
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
                '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />' +
                '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
                '<link href="<?php echo base_url(); ?>assets/invoice/invoice.css" rel="stylesheet" />' +
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
                '</style><style type="text/css" media="print"> @page { size: portrait; margin:0mm;margin-top: 1mm; }' +
                '.inv1 .main-color {' +
                'background-color: ' + colorM + '!important; ' + ts +
                '-webkit-print-color-adjust:exact; ' +
                '} ' +
                '.inv1 .light-blue-td { ' +
                'background-color: #c6d9f1!important;' +
                'text-align: left;' +
                'padding-left: 5px;' +
                '-webkit-print-color-adjust:exact; ' +
                '}' +
                '.inv1 thead tr {' +
                'background-color: rgb(242, 242, 242)!important;' +
                '-webkit-print-color-adjust:exact; ' +
                '}' +
                '.pcg .mid-title div {' + ts + '}' +
                '.pcg .mid-header {' +
                'background-color: #dce6f2!important; ' +
                '-webkit-print-color-adjust:exact; ' +
                '}' +
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
            setTimeout(function() {
                win.print();
                //win.close();
            }, 2000);
        },
        cancel: function() {
            this.dataSource.data([]);
            window.history.back();
        }
    });

    banhji.Reconcile = kendo.observable({
        lang: langVM,
        institute: banhji.institute,
        pageLoad: function() {

        },
        save: function() {

        },
        cancel: function() {
            window.history.back();
        }
    });
    /* Report */
    banhji.Reports = kendo.observable({
        lang: langVM,
        nCustomer: 0,
        tCustomer: 0,
        activeCustomer: 0,
        waterSold: 0,
        avgUsage: 0,
        avgRevenue: 0,
        waterRevenue: 0,
        totalDeposit: 0,
        licenseSelect: 0,
        dataSource: dataStore(apiUrl + "wreports/kpi"),
        licenseDS: dataStore(apiUrl + "branches"),
        onLicenseChange: function() {
            var that = this;
            this.dataSource.query({
                    filter: {
                        field: 'branch_id',
                        value: this.get('licenseSelect')
                    }
                })
                .then(function(e) {
                    let data = that.dataSource.data();
                    that.set('nCustomer', kendo.toString(data[0].totalAllowCustomer, 'n'));
                    that.set('tCustomer', kendo.toString(data[0].totalCustomer, 'n'));
                    that.set('activeCustomer', kendo.toString(data[0].totalActiveCustomer, 'n'));
                    that.set('waterSold', kendo.toString(data[0].totalUsage, 'n'));
                    that.set('avgUsage', kendo.toString(data[0].avgUsage, 'n'));
                    that.set('avgRevenue', kendo.toString(data[0].avgIncome, 'n'));
                    that.set('waterRevenue', kendo.toString(data[0].totalIncome, 'n'));
                    that.set('totalDeposit', kendo.toString(data[0].totalDeposit, 'n'));
                });
        },
        pageLoad: function() {
            var that = this;
        },
        save: function() {
            var self = this;
        },
        cancel: function() {
            this.dataSource.data([]);
            banhji.router.navigate("/");
        }
    });
    banhji.customerList = kendo.observable({
        lang: langVM,
        institute: banhji.institute,
        dataSource: dataStore(apiUrl + "utibillReports/customer_list"),
        licenseDS: dataStore(apiUrl + "branches"),
        blocDS: dataStore(apiUrl + "locations"),
        licenseSelect: null,
        company: banhji.institute,
        blocSelect: null,
        pageLoad: function() {
            this.licenseDS.read();
            this.search();
        },
        printGrid: function() {
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
                '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />' +
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
                '</style><style type="text/css" media="print"> @page { size: landscape; margin:0mm; } .saleSummaryCustomer .total-customer, .saleSummaryCustomer .total-sale { background-color: #DDEBF7!important; -webkit-print-color-adjust:exact; }.saleSummaryCustomer .table.table-borderless.table-condensed  tr th { background-color: #1E4E78!important;-webkit-print-color-adjust:exact;}.saleSummaryCustomer .table.table-borderless.table-condensed  tr th span{ color: #fff!important; }.saleSummaryCustomer .table.table-borderless.table-condensed tr:nth-child(2n+1) td {  background-color: #fff!important; -webkit-print-color-adjust:exact;} .saleSummaryCustomer .table.table-borderless.table-condensed tr td { background-color: #F2F2F2!important;-webkit-print-color-adjust:exact; } </style>' +
                '</head>' +
                '<body><div id="example" class="k-content saleSummaryCustomer" style="padding: 30px;">';
            var htmlEnd =
                '</div></body>' +
                '</html>';

            printableContent = $('#invFormContent').html();
            doc.write(htmlStart + printableContent + htmlEnd);
            doc.close();
            setTimeout(function() {
                win.print();
                win.close();
            }, 2000);
        },
        licenseChange: function(e) {
            var data = e.data;
            var license = this.licenseDS.at(e.sender.selectedIndex - 1);
            this.set("licenseSelect", license);
            this.blocDS.filter({
                field: "branch_id",
                value: license.id
            });
        },
        search: function() {
            var self = this,
                para = [],
                license = this.get("licenseSelect"),
                bloc = this.get("blocSelect");

            this.dataSource.bind("requestEnd", function(e) {
                if (e.type == "read") {
                    var response = e.response;
                    self.exArray = [];

                    self.exArray.push({
                        cells: [{
                            value: self.company.name,
                            textAlign: "center",
                            colSpan: 4
                        }]
                    });
                    self.exArray.push({
                        cells: [{
                            value: "Customer List",
                            bold: true,
                            fontSize: 20,
                            textAlign: "center",
                            colSpan: 4
                        }]
                    });
                    self.exArray.push({
                        cells: [{
                            value: "",
                            colSpan: 4
                        }]
                    });
                    self.exArray.push({
                        cells: [{
                                value: "Property",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Meter",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Block",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "License",
                                background: "#496cad",
                                color: "#ffffff"
                            }
                        ]
                    });
                    for (var i = 0; i < response.results.length; i++) {
                        self.exArray.push({
                            cells: [{
                                    value: response.results[i].name,
                                    bold: true,
                                },
                                {
                                    value: ""
                                },
                                {
                                    value: ""
                                },
                                {
                                    value: ""
                                },
                            ]
                        });
                        for (var j = 0; j < response.results[i].line.length; j++) {
                            self.exArray.push({
                                cells: [{
                                        value: response.results[i].line[j].property
                                    },
                                    {
                                        value: response.results[i].line[j].meter
                                    },
                                    {
                                        value: response.results[i].line[j].location
                                    },
                                    {
                                        value: response.results[i].line[j].branch
                                    },
                                ]
                            });
                        }
                    }
                }
            });
        },
        cancel: function() {
            this.contact.cancelChanges();
            window.history.back();
        },
        ExportExcel: function() {
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
                        }
                    ],
                    title: "Customer List",
                    rows: this.exArray
                }]
            });
            //save the file as Excel file with extension xlsx
            kendo.saveAs({
                dataURI: workbook.toDataURL(),
                fileName: "customerList.xlsx"
            });
        }
    });
    banhji.customerNoConnection = kendo.observable({
        lang: langVM,
        institute: banhji.institute,
        dataSource: dataStore(apiUrl + "wreports/noConnection_list"),
        licenseDS: dataStore(apiUrl + "branches"),
        blocDS: dataStore(apiUrl + "locations"),
        licenseSelect: null,
        blocSelect: null,
        pageLoad: function() {
            this.licenseDS.read();
        },
        printGrid: function() {
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
                '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />' +
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
                '</style><style type="text/css" media="print"> @page { size: landscape; margin:0mm; } .saleSummaryCustomer .total-customer, .saleSummaryCustomer .total-sale { background-color: #DDEBF7!important; -webkit-print-color-adjust:exact; }.saleSummaryCustomer .table.table-borderless.table-condensed  tr th { background-color: #1E4E78!important;-webkit-print-color-adjust:exact;}.saleSummaryCustomer .table.table-borderless.table-condensed  tr th span{ color: #fff!important; }.saleSummaryCustomer .table.table-borderless.table-condensed tr:nth-child(2n+1) td {  background-color: #fff!important; -webkit-print-color-adjust:exact;} .saleSummaryCustomer .table.table-borderless.table-condensed tr td { background-color: #F2F2F2!important;-webkit-print-color-adjust:exact; } </style>' +
                '</head>' +
                '<body><div id="example" class="k-content saleSummaryCustomer" style="padding: 30px;">';
            var htmlEnd =
                '</div></body>' +
                '</html>';

            printableContent = $('#invFormContent').html();
            doc.write(htmlStart + printableContent + htmlEnd);
            doc.close();
            setTimeout(function() {
                win.print();
                win.close();
            }, 2000);
        },
        licenseChange: function(e) {
            var data = e.data;
            var license = this.licenseDS.at(e.sender.selectedIndex - 1);
            this.set("licenseSelect", license);
            this.blocDS.filter({
                field: "branch_id",
                value: license.id
            });
        },
        search: function() {
            var para = [],
                license = this.get("licenseSelect"),
                bloc = this.get("blocSelect");

            if (license) {
                para.push({
                    field: "branch_id",
                    value: license.id
                });
            }

            if (bloc) {
                para.push({
                    field: "location_id",
                    value: bloc.id
                });
            }
            this.dataSource.filter(para);
        },
        cancel: function() {
            this.contact.cancelChanges();
            window.history.back();
        }
    });
    banhji.disconnectList = kendo.observable({
        lang: langVM,
        institute: banhji.institute,
        dataSource: dataStore(apiUrl + "utibillReports/disconnection_list"),
        licenseDS: dataStore(apiUrl + "branches"),
        blocDS: dataStore(apiUrl + "locations"),
        company: banhji.institute,
        licenseSelect: null,
        blocSelect: null,
        pageLoad: function() {
            this.licenseDS.read();
            this.search();
            this.set("haveBloc", false);
        },
        printGrid: function() {
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
                '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />' +
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
                '</style><style type="text/css" media="print"> @page { size: landscape; margin:0mm; } .saleSummaryCustomer .total-customer, .saleSummaryCustomer .total-sale { background-color: #DDEBF7!important; -webkit-print-color-adjust:exact; }.saleSummaryCustomer .table.table-borderless.table-condensed  tr th { background-color: #1E4E78!important;-webkit-print-color-adjust:exact;}.saleSummaryCustomer .table.table-borderless.table-condensed  tr th span{ color: #fff!important; }.saleSummaryCustomer .table.table-borderless.table-condensed tr:nth-child(2n+1) td {  background-color: #fff!important; -webkit-print-color-adjust:exact;} .saleSummaryCustomer .table.table-borderless.table-condensed tr td { background-color: #F2F2F2!important;-webkit-print-color-adjust:exact; } </style>' +
                '</head>' +
                '<body><div id="example" class="k-content saleSummaryCustomer" style="padding: 30px;">';
            var htmlEnd =
                '</div></body>' +
                '</html>';

            printableContent = $('#invFormContent').html();
            doc.write(htmlStart + printableContent + htmlEnd);
            doc.close();
            setTimeout(function() {
                win.print();
                win.close();
            }, 2000);
        },
        licenseChange: function(e) {
            var data = e.data;
            var license = this.licenseDS.at(e.sender.selectedIndex - 1);
            this.set("licenseSelect", license);
            this.blocDS.filter({
                field: "branch_id",
                value: license.id
            });
            this.set("haveBloc", true);
        },
        search: function() {
            var self = this,
                para = [],
                license = this.get("licenseSelect"),
                bloc = this.get("blocSelect");

            if (license) {
                para.push({
                    field: "branch_id",
                    value: license.id
                });
            }

            if (bloc) {
                para.push({
                    field: "location_id",
                    value: bloc.id
                });
            }

            this.dataSource.filter(para);
            this.dataSource.bind("requestEnd", function(e) {
                if (e.type == "read") {
                    var response = e.response;
                    self.exArray = [];

                    self.exArray.push({
                        cells: [{
                            value: self.company.name,
                            textAlign: "center",
                            colSpan: 5
                        }]
                    });
                    self.exArray.push({
                        cells: [{
                            value: "Disconnect Customer List",
                            bold: true,
                            fontSize: 20,
                            textAlign: "center",
                            colSpan: 5
                        }]
                    });
                    self.exArray.push({
                        cells: [{
                            value: "",
                            colSpan: 5
                        }]
                    });
                    self.exArray.push({
                        cells: [{
                                value: "Customer",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "License",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Number",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Phone",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Address",
                                background: "#496cad",
                                color: "#ffffff"
                            }
                        ]
                    });
                    for (var i = 0; i < response.results.length; i++) {
                        self.exArray.push({
                            cells: [{
                                    value: response.results[i].name
                                },
                                {
                                    value: response.results[i].license
                                },
                                {
                                    value: response.results[i].number
                                },
                                {
                                    value: response.results[i].phone
                                },
                                {
                                    value: response.results[i].address
                                },
                            ]
                        });
                    }
                }
            });
        },
        cancel: function() {
            this.contact.cancelChanges();
            window.history.back();
        },
        ExportExcel: function() {
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
                        }
                    ],
                    title: "Disconnect Customer List",
                    rows: this.exArray
                }]
            });
            //save the file as Excel file with extension xlsx
            kendo.saveAs({
                dataURI: workbook.toDataURL(),
                fileName: "disconnectCustomer.xlsx"
            });
        }
    });
    banhji.to_be_disconnectList = kendo.observable({
        lang: langVM,
        institute: banhji.institute,
        dataSource: dataStore(apiUrl + "utibillReports/to_be_disconnection_list"),
        licenseDS: dataStore(apiUrl + "branches"),
        blocDS: dataStore(apiUrl + "locations"),
        licenseSelect: null,
        blocSelect: null,
        company: banhji.institute,
        pageLoad: function() {
            this.licenseDS.read();
            this.search();
            this.set("haveBloc", false);
        },
        printGrid: function() {
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
                '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />' +
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
                '</style><style type="text/css" media="print"> @page { size: landscape; margin:0mm; } .saleSummaryCustomer .total-customer, .saleSummaryCustomer .total-sale { background-color: #DDEBF7!important; -webkit-print-color-adjust:exact; }.saleSummaryCustomer .table.table-borderless.table-condensed  tr th { background-color: #1E4E78!important;-webkit-print-color-adjust:exact;}.saleSummaryCustomer .table.table-borderless.table-condensed  tr th span{ color: #fff!important; }.saleSummaryCustomer .table.table-borderless.table-condensed tr:nth-child(2n+1) td {  background-color: #fff!important; -webkit-print-color-adjust:exact;} .saleSummaryCustomer .table.table-borderless.table-condensed tr td { background-color: #F2F2F2!important;-webkit-print-color-adjust:exact; } </style>' +
                '</head>' +
                '<body><div id="example" class="k-content saleSummaryCustomer" style="padding: 30px;">';
            var htmlEnd =
                '</div></body>' +
                '</html>';

            printableContent = $('#invFormContent').html();
            doc.write(htmlStart + printableContent + htmlEnd);
            doc.close();
            setTimeout(function() {
                win.print();
                win.close();
            }, 2000);
        },
        licenseChange: function(e) {
            var data = e.data;
            var license = this.licenseDS.at(e.sender.selectedIndex - 1);
            this.set("licenseSelect", license);
            this.blocDS.filter({
                field: "branch_id",
                value: license.id
            });
            this.set("haveBloc", true);
        },
        search: function() {
            var self = this,
                para = [],
                license = this.get("licenseSelect"),
                bloc = this.get("blocSelect");

            if (license) {
                para.push({
                    field: "branch_id",
                    value: license.id
                });
            }

            if (bloc) {
                para.push({
                    field: "location_id",
                    value: bloc.id
                });
            }
            this.dataSource.filter(para);
            this.dataSource.bind("requestEnd", function(e) {
                if (e.type == "read") {
                    var response = e.response;
                    self.exArray = [];

                    self.exArray.push({
                        cells: [{
                            value: self.company.name,
                            textAlign: "center",
                            colSpan: 5
                        }]
                    });
                    self.exArray.push({
                        cells: [{
                            value: "To Be Disconnect Customer List",
                            bold: true,
                            fontSize: 20,
                            textAlign: "center",
                            colSpan: 5
                        }]
                    });
                    self.exArray.push({
                        cells: [{
                            value: "",
                            colSpan: 5
                        }]
                    });
                    self.exArray.push({
                        cells: [{
                                value: "Customer",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Date",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Reference",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Status",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Location",
                                background: "#496cad",
                                color: "#ffffff"
                            }
                        ]
                    });
                    for (var i = 0; i < response.results.length; i++) {
                        var date = new Date(),
                            dueDates = new Date(response.results[i].due_date).getTime(),
                            overDue, toDay = new Date(date).getTime();
                        if (dueDates < toDay) {
                            overDue = Math.floor((toDay - dueDates) / (1000 * 60 * 60 * 24)) + "days";
                        } else {
                            overDue = Math.floor((dueDates - toDay) / (1000 * 60 * 60 * 24)) + "days to pay";
                        }
                        self.exArray.push({
                            cells: [{
                                    value: response.results[i].name
                                },
                                {
                                    value: response.results[i].issued_date
                                },
                                {
                                    value: response.results[i].number
                                },
                                {
                                    value: overDue
                                },
                                {
                                    value: response.results[i].location
                                },
                            ]
                        });
                    }
                }
            });
        },
        cancel: function() {
            this.contact.cancelChanges();
            window.history.back();
        },
        ExportExcel: function() {
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
                        }
                    ],
                    title: "To Be Disconnect Customer List",
                    rows: this.exArray
                }]
            });
            //save the file as Excel file with extension xlsx
            kendo.saveAs({
                dataURI: workbook.toDataURL(),
                fileName: "tobeDisconnect.xlsx"
            });
        }
    });
    banhji.newCustomerList = kendo.observable({
        lang: langVM,
        dataSource: dataStore(apiUrl + "utibillReports/newProperty_list"),
        contactDS: new kendo.data.DataSource({
            data: banhji.source.customerList,
            sort: {
                field: "number",
                dir: "asc"
            }
        }),
        licenseDS: dataStore(apiUrl + "branches"),
        blocDS: dataStore(apiUrl + "locations"),
        sortList: banhji.source.sortList,
        sorter: "month",
        sdate: "",
        edate: "",
        obj: {
            contactIds: [],
            licenseID: 0,
            locationID: []
        },
        company: banhji.institute,
        displayDate: "",
        totalAmount: 0,
        exArray: [],
        pageLoad: function() {
            this.search();
        },
        sorterChanges: function() {
            var today = new Date(),
                sdate = "",
                edate = "",
                sorter = this.get("sorter");

            switch (sorter) {
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
        licenseChange: function(e) {
            this.blocDS.filter([{
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
        },
        search: function(e) {
            var self = this,
                para = [],
                obj = this.get("obj"),
                start = this.get("sdate"),
                end = this.get("edate"),
                displayDate = "";
            license = this.get("licenseSelect"),
                bloc = this.get("blocSelect");

            //Account

            if (bloc) {
                para.push({
                    field: "location_id",
                    value: bloc.id
                });
            }

            //Dates
            if (start && end) {
                start = new Date(start);
                end = new Date(end);
                displayDate = "From " + kendo.toString(start, "dd-MM-yyyy") + " To " + kendo.toString(end, "dd-MM-yyyy");
                end.setDate(end.getDate() + 1);
                para.push({
                    field: "date_used >=",
                    value: kendo.toString(start, "yyyy-MM-dd")
                });
                para.push({
                    field: "date_used <",
                    value: kendo.toString(end, "yyyy-MM-dd")
                });
            } else if (start) {
                start = new Date(start);
                displayDate = "On " + kendo.toString(start, "dd-MM-yyyy");
                para.push({
                    field: "date_used",
                    value: kendo.toString(start, "yyyy-MM-dd")
                });
            } else if (end) {
                end = new Date(end);
                displayDate = "As Of " + kendo.toString(end, "dd-MM-yyyy");
                end.setDate(end.getDate() + 1);

                para.push({
                    field: "date_used <",
                    value: kendo.toString(end, "yyyy-MM-dd")
                });
            } else {

            }
            this.set("displayDate", displayDate);

            this.dataSource.query({
                filter: para
            }).then(function(e) {
                var view = self.dataSource.view();
                console.log(view);
                var amount = 0;
                $.each(view, function(index, value) {
                    amount += value.amount;
                });

                self.set("totalAmount", kendo.toString(amount, banhji.locale == "km-KH" ? "c0" : "c", banhji.locale));
            });
        },
        printGrid: function() {
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
                '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />' +
                '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
                '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/responsive.css">' +
                '<link href="<?php echo base_url(); ?>assets/invoice/invoice.css" rel="stylesheet" />' +
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
                '</style><style type="text/css" media="print"> @page { size: portrait; margin:1mm; }' +
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
                '}' +
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
            setTimeout(function() {
                win.print();
                win.close();
            }, 2000);
        },
        ExportExcel: function() {
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
                        }
                    ],
                    title: "General Ledger",
                    rows: this.exArray
                }]
            });
            //save the file as Excel file with extension xlsx
            kendo.saveAs({
                dataURI: workbook.toDataURL(),
                fileName: "GeneralLedger.xlsx"
            });
        }
    });
    banhji.miniUsageList = kendo.observable({
        lang: langVM,
        institute: banhji.institute,
        dataSource: dataStore(apiUrl + "utibillReports/miniusage"),
        licenseDS: dataStore(apiUrl + "branches"),
        blocDS: dataStore(apiUrl + "locations"),
        contactDS: new kendo.data.DataSource({
            data: banhji.source.supplierList,
            filter: {
                field: "status",
                value: 1
            },
            sort: {
                field: "number",
                dir: "asc"
            }
        }),
        displayDate: "",
        sortList: banhji.source.sortList,
        sorter: "month",
        sdate: "",
        edate: "",
        obj: {
            contactIds: [],
            licenseID: 0,
            locationID: []
        },
        licenseSelect: null,
        blocSelect: null,
        pageLoad: function() {
            this.search();
            this.set("haveBloc", false);
        },
        printGrid: function() {
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
                '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />' +
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
                '</style><style type="text/css" media="print"> @page { size: landscape; margin:0mm; } .saleSummaryCustomer .total-customer, .saleSummaryCustomer .total-sale { background-color: #DDEBF7!important; -webkit-print-color-adjust:exact; }.saleSummaryCustomer .table.table-borderless.table-condensed  tr th { background-color: #1E4E78!important;-webkit-print-color-adjust:exact;}.saleSummaryCustomer .table.table-borderless.table-condensed  tr th span{ color: #fff!important; }.saleSummaryCustomer .table.table-borderless.table-condensed tr:nth-child(2n+1) td {  background-color: #fff!important; -webkit-print-color-adjust:exact;} .saleSummaryCustomer .table.table-borderless.table-condensed tr td { background-color: #F2F2F2!important;-webkit-print-color-adjust:exact; } </style>' +
                '</head>' +
                '<body><div id="example" class="k-content saleSummaryCustomer" style="padding: 30px;">';
            var htmlEnd =
                '</div></body>' +
                '</html>';

            printableContent = $('#invFormContent').html();
            doc.write(htmlStart + printableContent + htmlEnd);
            doc.close();
            setTimeout(function() {
                win.print();
                win.close();
            }, 2000);
        },
        sorterChanges: function() {
            var today = new Date(),
                sdate = "",
                edate = "",
                sorter = this.get("sorter");

            switch (sorter) {
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
        licenseChange: function(e) {
            var data = e.data;
            var license = this.licenseDS.at(e.sender.selectedIndex - 1);
            this.set("licenseSelect", license);
            this.blocDS.filter({
                field: "branch_id",
                value: license.id
            });
            this.set("haveBloc", true);
        },
        search: function() {
            var self = this,
                para = [],
                obj = this.get("obj"),
                start = this.get("sdate"),
                end = this.get("edate"),
                displayDate = "";
            license = this.get("licenseSelect"),
                bloc = this.get("blocSelect");

            if (license) {
                para.push({
                    field: "branch_id",
                    value: license.id
                });
            }

            if (bloc) {
                para.push({
                    field: "location_id",
                    value: bloc.id
                });
            }


            //Dates
            if (start && end) {
                start = new Date(start);
                end = new Date(end);
                displayDate = "From " + kendo.toString(start, "dd-MM-yyyy") + " To " + kendo.toString(end, "dd-MM-yyyy");
                end.setDate(end.getDate() + 1);

                para.push({
                    field: "date_used >=",
                    value: kendo.toString(start, "yyyy-MM-dd")
                });
                para.push({
                    field: "date_used <",
                    value: kendo.toString(end, "yyyy-MM-dd")
                });
            } else if (start) {
                start = new Date(start);
                displayDate = "On " + kendo.toString(start, "dd-MM-yyyy");

                para.push({
                    field: "date_used",
                    value: kendo.toString(start, "yyyy-MM-dd")
                });
            } else if (end) {
                end = new Date(end);
                displayDate = "As Of " + kendo.toString(end, "dd-MM-yyyy");
                end.setDate(end.getDate() + 1);

                para.push({
                    field: "date_used <",
                    value: kendo.toString(end, "yyyy-MM-dd")
                });
            } else {

            }
            this.set("displayDate", displayDate);

            this.dataSource.query({
                filter: para
            }).then(function() {
                var view = self.dataSource.view();

                var amount = 0;
                $.each(view, function(index, value) {
                    amount += value.amount;
                });

                self.set("totalAmount", kendo.toString(amount, banhji.locale == "km-KH" ? "c0" : "c", banhji.locale));
            });
            this.dataSource.bind("requestEnd", function(e) {
                if (e.type == "read") {
                    var response = e.response;
                    self.exArray = [];

                    self.exArray.push({
                        cells: [{
                            value: self.institute.name,
                            textAlign: "center",
                            colSpan: 5
                        }]
                    });
                    self.exArray.push({
                        cells: [{
                            value: "Disconnect Customer List",
                            bold: true,
                            fontSize: 20,
                            textAlign: "center",
                            colSpan: 5
                        }]
                    });
                    if (self.displayDate) {
                        self.exArray.push({
                            cells: [{
                                value: self.displayDate,
                                textAlign: "center",
                                colSpan: 5
                            }]
                        });
                    }
                    self.exArray.push({
                        cells: [{
                            value: "",
                            colSpan: 5
                        }]
                    });
                    self.exArray.push({
                        cells: [{
                                value: "Meter Number",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Date",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "License",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Address",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Usage",
                                background: "#496cad",
                                color: "#ffffff"
                            }
                        ]
                    });
                    for (var i = 0; i < response.results.length; i++) {
                        var from_date = response.results[i].from_date,
                            to_date = response.results[i].to_date,
                            date;
                        date = from_date + "-" + to_date;
                        self.exArray.push({
                            cells: [{
                                    value: response.results[i].meter_number
                                },
                                {
                                    value: date
                                },
                                {
                                    value: response.results[i].license
                                },
                                {
                                    value: response.results[i].address
                                },
                                {
                                    value: response.results[i].usage
                                },
                            ]
                        });
                    }
                }
            });
        },
        cancel: function() {
            this.contact.cancelChanges();
            window.history.back();
        },
        ExportExcel: function() {
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
                        }
                    ],
                    title: "Minimum Water Usage List",
                    rows: this.exArray
                }]
            });
            //save the file as Excel file with extension xlsx
            kendo.saveAs({
                dataURI: workbook.toDataURL(),
                fileName: "minimumWaterUsage.xlsx"
            });
        }
    });
    banhji.customerNoMeter = kendo.observable({
        lang: langVM,
        institute: banhji.institute,
        contact: dataStore(apiUrl + "customers"),
        dataSource: dataStore(apiUrl + "contacts/no_meter"),
        licenseDS: dataStore(apiUrl + "branches"),
        blocDS: dataStore(apiUrl + "locations"),
        licenseSelect: null,
        blocSelect: null,
        contactTypeDS: banhji.source.customerTypeDS,
        contactAAA: banhji.source.customerDS,
        statusList: banhji.source.statusList,
        contact_type_id: null,
        status: null,
        pageLoad: function() {
            this.contact.filter({
                field: "use_water",
                value: 1
            });
            this.licenseDS.read();

        },
        printGrid: function() {
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
                '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />' +
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
                '</style><style type="text/css" media="print"> @page { size: landscape; margin:0mm; } .saleSummaryCustomer .total-customer, .saleSummaryCustomer .total-sale { background-color: #DDEBF7!important; -webkit-print-color-adjust:exact; }.saleSummaryCustomer .table.table-borderless.table-condensed  tr th { background-color: #1E4E78!important;-webkit-print-color-adjust:exact;}.saleSummaryCustomer .table.table-borderless.table-condensed  tr th span{ color: #fff!important; }.saleSummaryCustomer .table.table-borderless.table-condensed tr:nth-child(2n+1) td {  background-color: #fff!important; -webkit-print-color-adjust:exact;} .saleSummaryCustomer .table.table-borderless.table-condensed tr td { background-color: #F2F2F2!important;-webkit-print-color-adjust:exact; } </style>' +
                '</head>' +
                '<body><div id="example" class="k-content saleSummaryCustomer" style="padding: 30px;">';
            var htmlEnd =
                '</div></body>' +
                '</html>';

            printableContent = $('#invFormContent').html();
            doc.write(htmlStart + printableContent + htmlEnd);
            doc.close();
            setTimeout(function() {
                win.print();
                win.close();
            }, 2000);
        },
        licenseChange: function(e) {
            var data = e.data;
            var license = this.licenseDS.at(e.sender.selectedIndex - 1);
            this.set("licenseSelect", license);
            this.blocDS.filter({
                field: "branch_id",
                value: license.id
            });
        },
        search: function() {
            var para = [],
                status = this.get("status"),
                contact_type_id = this.get("contact_type_id");

            if (status !== null) {
                para.push({
                    field: "status",
                    value: status
                });
            }

            if (contact_type_id) {
                para.push({
                    field: "contact_type_id",
                    value: contact_type_id
                });
            }

            this.dataSource.filter(para);
            this.set("status", null);
            this.set("contact_type_id", null);
        },
        selectedRow: function(e) {
            var data = e.data;

            this.set("obj", data);
            this.loadData();
        },
    });
    banhji.saleSummary = kendo.observable({
        lang: langVM,
        dataSource: dataStore(apiUrl + "utibillReports/sale_summary"),
        contactDS: new kendo.data.DataSource({
            data: banhji.source.customerList,
            sort: {
                field: "number",
                dir: "asc"
            }
        }),
        licenseDS: dataStore(apiUrl + "branches"),
        blocDS: dataStore(apiUrl + "locations"),
        sortList: banhji.source.sortList,
        sorter: "month",
        sdate: "",
        edate: "",
        obj: {
            contactIds: [],
            licenseID: 0,
            locationID: []
        },
        company: banhji.institute,
        displayDate: "",
        totalAmount: 0,
        exArray: [],
        pageLoad: function() {
            this.search();
            this.set("haveBloc", false);
        },
        sorterChanges: function() {
            var today = new Date(),
                sdate = "",
                edate = "",
                sorter = this.get("sorter");

            switch (sorter) {
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
        licenseChange: function(e) {
            var data = e.data;
            var license = this.licenseDS.at(e.sender.selectedIndex - 1);
            this.set("licenseSelect", license);
            this.blocDS.filter({
                field: "branch_id",
                value: license.id
            });
            this.set("haveBloc", true);
        },
        search: function() {
            var self = this,
                para = [],
                obj = this.get("obj"),
                start = this.get("sdate"),
                end = this.get("edate"),
                displayDate = "";
            license = this.get("licenseSelect"),
                bloc = this.get("blocSelect");

            if (license) {
                para.push({
                    field: "branch_id",
                    value: license.id
                });
            }

            if (bloc) {
                para.push({
                    field: "location_id",
                    value: bloc.id
                });
            }

            //Customer
            if (obj.contactIds.length > 0) {
                var contactIds = [];
                $.each(obj.contactIds, function(index, value) {
                    contactIds.push(value);
                });
                para.push({
                    field: "contact_id",
                    operator: "where_in",
                    value: contactIds
                });
            }

            //Dates
            if (start && end) {
                start = new Date(start);
                end = new Date(end);
                displayDate = "From " + kendo.toString(start, "dd-MM-yyyy") + " To " + kendo.toString(end, "dd-MM-yyyy");
                end.setDate(end.getDate() + 1);

                para.push({
                    field: "issued_date >=",
                    value: kendo.toString(start, "yyyy-MM-dd")
                });
                para.push({
                    field: "issued_date <",
                    value: kendo.toString(end, "yyyy-MM-dd")
                });
            } else if (start) {
                start = new Date(start);
                displayDate = "On " + kendo.toString(start, "dd-MM-yyyy");

                para.push({
                    field: "issued_date",
                    value: kendo.toString(start, "yyyy-MM-dd")
                });
            } else if (end) {
                end = new Date(end);
                displayDate = "As Of " + kendo.toString(end, "dd-MM-yyyy");
                end.setDate(end.getDate() + 1);

                para.push({
                    field: "issued_date <",
                    value: kendo.toString(end, "yyyy-MM-dd")
                });
            } else {

            }
            this.set("displayDate", displayDate);

            this.dataSource.query({
                filter: para
            }).then(function() {
                var view = self.dataSource.view();

                var amount = 0;
                $.each(view, function(index, value) {
                    amount += value.amount;
                });

                self.set("totalAmount", kendo.toString(amount, banhji.locale == "km-KH" ? "c0" : "c", banhji.locale));
            });
            this.dataSource.bind("requestEnd", function(e) {
                if (e.type == "read") {
                    var response = e.response,
                        balanceRec = 0;
                    self.exArray = [];

                    self.exArray.push({
                        cells: [{
                            value: self.company.name,
                            textAlign: "center",
                            colSpan: 5
                        }]
                    });
                    self.exArray.push({
                        cells: [{
                            value: "Sale Summary Report",
                            bold: true,
                            fontSize: 20,
                            textAlign: "center",
                            colSpan: 5
                        }]
                    });
                    if (self.displayDate) {
                        self.exArray.push({
                            cells: [{
                                value: self.displayDate,
                                textAlign: "center",
                                colSpan: 5
                            }]
                        });
                    }
                    self.exArray.push({
                        cells: [{
                            value: "",
                            colSpan: 5
                        }]
                    });
                    self.exArray.push({
                        cells: [{
                                value: "Customer",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Location",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Usage",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Invoice Number",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Total Sale",
                                background: "#496cad",
                                color: "#ffffff"
                            }
                        ]
                    });
                    for (var i = 0; i < response.results.length; i++) {
                        balanceRec += response.results[i].amount;
                        self.exArray.push({
                            cells: [{
                                    value: response.results[i].name
                                },
                                {
                                    value: response.results[i].location
                                },
                                {
                                    value: response.results[i].usage
                                },
                                {
                                    value: response.results[i].invoice
                                },
                                {
                                    value: kendo.parseFloat(response.results[i].amount)
                                },
                            ]
                        });
                        self.exArray.push({
                            cells: [{
                                value: "",
                                colSpan: 5
                            }]
                        });
                    }
                    self.exArray.push({
                        cells: [{
                                value: "TOTAL",
                                bold: true,
                                fontSize: 16
                            },
                            {
                                value: ""
                            },
                            {
                                value: ""
                            },
                            {
                                value: ""
                            },
                            {
                                value: kendo.parseFloat(response.balanceRec),
                                bold: true,
                                fontSize: 16
                            },
                        ]
                    });
                }
            });
        },
        printGrid: function() {
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
                '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />' +
                '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
                '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/responsive.css">' +
                '<link href="<?php echo base_url(); ?>assets/invoice/invoice.css" rel="stylesheet" />' +
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
                '</style><style type="text/css" media="print"> @page { size: portrait; margin:1mm; }' +
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
                '}' +
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
            setTimeout(function() {
                win.print();
                win.close();
            }, 2000);
        },
        ExportExcel: function() {
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
                    ],
                    title: "Sale Summary",
                    rows: this.exArray
                }]
            });
            //save the file as Excel file with extension xlsx
            kendo.saveAs({
                dataURI: workbook.toDataURL(),
                fileName: "saleSummary.xlsx"
            });
        }
    });
    banhji.connectServiceRevenue = kendo.observable({
        lang: langVM,
        dataSource: dataStore(apiUrl + "utibillReports/connect_service_revenue"),
        contactDS: new kendo.data.DataSource({
            data: banhji.source.customerList,
            sort: {
                field: "number",
                dir: "asc"
            }
        }),
        licenseDS: dataStore(apiUrl + "branches"),
        blocDS: dataStore(apiUrl + "locations"),
        sortList: banhji.source.sortList,
        sorter: "month",
        sdate: "",
        edate: "",
        obj: {
            contactIds: [],
            licenseID: 0,
            locationID: []
        },
        company: banhji.institute,
        displayDate: "",
        totalAmount: 0,
        exArray: [],
        pageLoad: function() {
            this.search();
            this.set("haveBloc", false);
        },
        sorterChanges: function() {
            var today = new Date(),
                sdate = "",
                edate = "",
                sorter = this.get("sorter");

            switch (sorter) {
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
        licenseChange: function(e) {
            var data = e.data;
            var license = this.licenseDS.at(e.sender.selectedIndex - 1);
            this.set("licenseSelect", license);
            this.blocDS.filter({
                field: "branch_id",
                value: license.id
            });
            this.set("haveBloc", true);
        },
        search: function() {
            var self = this,
                para = [],
                obj = this.get("obj"),
                start = this.get("sdate"),
                end = this.get("edate"),
                displayDate = "";
            license = this.get("licenseSelect"),
                bloc = this.get("blocSelect");

            if (license) {
                para.push({
                    field: "branch_id",
                    value: license.id
                });
            }

            if (bloc) {
                para.push({
                    field: "location_id",
                    value: bloc.id
                });
            }
            //Customer
            if (obj.contactIds.length > 0) {
                var contactIds = [];
                $.each(obj.contactIds, function(index, value) {
                    contactIds.push(value);
                });
                para.push({
                    field: "contact_id",
                    operator: "where_in",
                    value: contactIds
                });
            }

            //Dates
            if (start && end) {
                start = new Date(start);
                end = new Date(end);
                displayDate = "From " + kendo.toString(start, "dd-MM-yyyy") + " To " + kendo.toString(end, "dd-MM-yyyy");
                end.setDate(end.getDate() + 1);

                para.push({
                    field: "issued_date >=",
                    value: kendo.toString(start, "yyyy-MM-dd")
                });
                para.push({
                    field: "issued_date <",
                    value: kendo.toString(end, "yyyy-MM-dd")
                });
            } else if (start) {
                start = new Date(start);
                displayDate = "On " + kendo.toString(start, "dd-MM-yyyy");

                para.push({
                    field: "issued_date",
                    value: kendo.toString(start, "yyyy-MM-dd")
                });
            } else if (end) {
                end = new Date(end);
                displayDate = "As Of " + kendo.toString(end, "dd-MM-yyyy");
                end.setDate(end.getDate() + 1);

                para.push({
                    field: "issued_date <",
                    value: kendo.toString(end, "yyyy-MM-dd")
                });
            } else {

            }
            this.set("displayDate", displayDate);

            this.dataSource.query({
                filter: para
            }).then(function() {
                var view = self.dataSource.view();

                var amount = 0;
                $.each(view, function(index, value) {
                    amount += value.amount;
                });

                self.set("totalAmount", kendo.toString(amount, banhji.locale == "km-KH" ? "c0" : "c", banhji.locale));
            });
            this.dataSource.bind("requestEnd", function(e) {
                if (e.type == "read") {
                    var response = e.response,
                        balanceCal = 0;
                    self.exArray = [];

                    self.exArray.push({
                        cells: [{
                            value: self.company.name,
                            textAlign: "center",
                            colSpan: 4
                        }]
                    });
                    self.exArray.push({
                        cells: [{
                            value: "Connection Service Revenue Report",
                            bold: true,
                            fontSize: 20,
                            textAlign: "center",
                            colSpan: 4
                        }]
                    });
                    if (self.displayDate) {
                        self.exArray.push({
                            cells: [{
                                value: self.displayDate,
                                textAlign: "center",
                                colSpan: 4
                            }]
                        });
                    }
                    self.exArray.push({
                        cells: [{
                            value: "",
                            colSpan: 4
                        }]
                    });
                    self.exArray.push({
                        cells: [{
                                value: "Type",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Location",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Reference",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Revenue",
                                background: "#496cad",
                                color: "#ffffff"
                            }
                        ]
                    });
                    for (var i = 0; i < response.results.length; i++) {
                        self.exArray.push({
                            cells: [{
                                    value: response.results[i].name,
                                    bold: true,
                                },
                                {
                                    value: ""
                                },
                                {
                                    value: ""
                                },
                                {
                                    value: ""
                                }
                            ]
                        });
                        for (var j = 0; j < response.results[i].line.length; j++) {
                            balanceCal += response.results[i].line[j].amount;
                            self.exArray.push({
                                cells: [{
                                        value: response.results[i].line[j].type
                                    },
                                    {
                                        value: response.results[i].line[j].date
                                    },
                                    {
                                        value: response.results[i].line[j].location
                                    },
                                    {
                                        value: kendo.parseFloat(response.results[i].line[j].amount)
                                    },
                                ]
                            });
                        }
                        self.exArray.push({
                            cells: [{
                                value: "",
                                colSpan: 4
                            }]
                        });
                    }
                    self.exArray.push({
                        cells: [{
                                value: "TOTAL",
                                bold: true,
                                fontSize: 16
                            },
                            {
                                value: ""
                            },
                            {
                                value: ""
                            },
                            {
                                value: ""
                            },
                            {
                                value: ""
                            },
                            {
                                value: kendo.parseFloat(response.balanceCal),
                                bold: true,
                                fontSize: 16
                            },
                        ]
                    });
                }
            });
        },
        printGrid: function() {
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
                '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />' +
                '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
                '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/responsive.css">' +
                '<link href="<?php echo base_url(); ?>assets/invoice/invoice.css" rel="stylesheet" />' +
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
                '</style><style type="text/css" media="print"> @page { size: portrait; margin:1mm; }' +
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
                '}' +
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
            setTimeout(function() {
                win.print();
                win.close();
            }, 2000);
        },
        ExportExcel: function() {
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
                    ],
                    title: "Connection Service Revenue",
                    rows: this.exArray
                }]
            });
            //save the file as Excel file with extension xlsx
            kendo.saveAs({
                dataURI: workbook.toDataURL(),
                fileName: "connectionRevenue.xlsx"
            });
        }
    });
    banhji.saleDetail = kendo.observable({
        lang: langVM,
        dataSource: dataStore(apiUrl + "utibillReports/sale_detail"),
        contactDS: new kendo.data.DataSource({
            data: banhji.source.customerList,
            sort: {
                field: "number",
                dir: "asc"
            }
        }),
        licenseDS: dataStore(apiUrl + "branches"),
        blocDS: dataStore(apiUrl + "locations"),
        sortList: banhji.source.sortList,
        sorter: "month",
        sdate: "",
        edate: "",
        obj: {
            contactIds: [],
            licenseID: 0,
            locationID: []
        },
        company: banhji.institute,
        displayDate: "",
        total: 0,
        exArray: [],
        pageLoad: function() {
            this.search();
            this.set("haveBloc", false);
        },
        sorterChanges: function() {
            var today = new Date(),
                sdate = "",
                edate = "",
                sorter = this.get("sorter");

            switch (sorter) {
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
        licenseChange: function(e) {
            var data = e.data;
            var license = this.licenseDS.at(e.sender.selectedIndex - 1);
            this.set("licenseSelect", license);
            this.blocDS.filter({
                field: "branch_id",
                value: license.id
            });
            this.set("haveBloc", true);
        },
        search: function() {
            var self = this,
                para = [],
                obj = this.get("obj"),
                start = this.get("sdate"),
                end = this.get("edate"),
                displayDate = "";
            license = this.get("licenseSelect"),
                bloc = this.get("blocSelect");

            if (license) {
                para.push({
                    field: "branch_id",
                    value: license.id
                });
            }

            if (bloc) {
                para.push({
                    field: "location_id",
                    value: bloc.id
                });
            }

            //Customer
            if (obj.contactIds.length > 0) {
                var contactIds = [];
                $.each(obj.contactIds, function(index, value) {
                    contactIds.push(value);
                });
                para.push({
                    field: "contact_id",
                    operator: "where_in",
                    value: contactIds
                });
            }

            //Dates
            if (start && end) {
                start = new Date(start);
                end = new Date(end);
                displayDate = "From " + kendo.toString(start, "dd-MM-yyyy") + " To " + kendo.toString(end, "dd-MM-yyyy");
                end.setDate(end.getDate() + 1);

                para.push({
                    field: "issued_date >=",
                    value: kendo.toString(start, "yyyy-MM-dd")
                });
                para.push({
                    field: "issued_date <",
                    value: kendo.toString(end, "yyyy-MM-dd")
                });
            } else if (start) {
                start = new Date(start);
                displayDate = "On " + kendo.toString(start, "dd-MM-yyyy");

                para.push({
                    field: "issued_date",
                    value: kendo.toString(start, "yyyy-MM-dd")
                });
            } else if (end) {
                end = new Date(end);
                displayDate = "As Of " + kendo.toString(end, "dd-MM-yyyy");
                end.setDate(end.getDate() + 1);

                para.push({
                    field: "issued_date <",
                    value: kendo.toString(end, "yyyy-MM-dd")
                });
            } else {

            }
            this.set("displayDate", displayDate);

            this.dataSource.query({
                filter: para
            }).then(function() {
                var view = self.dataSource.view();

                var amount = 0;
                $.each(view, function(index, value) {
                    amount += value.amount;
                });

                self.set("totalAmount", kendo.toString(amount, banhji.locale == "km-KH" ? "c0" : "c", banhji.locale));
            });
            this.dataSource.bind("requestEnd", function(e) {
                if (e.type == "read") {
                    var response = e.response,
                        balanceCal = 0,
                        balanceRec = 0;
                    self.exArray = [];

                    self.exArray.push({
                        cells: [{
                            value: self.company.name,
                            textAlign: "center",
                            colSpan: 6
                        }]
                    });
                    self.exArray.push({
                        cells: [{
                            value: "Sale Detail Report",
                            bold: true,
                            fontSize: 20,
                            textAlign: "center",
                            colSpan: 6
                        }]
                    });
                    if (self.displayDate) {
                        self.exArray.push({
                            cells: [{
                                value: self.displayDate,
                                textAlign: "center",
                                colSpan: 6
                            }]
                        });
                    }
                    self.exArray.push({
                        cells: [{
                            value: "",
                            colSpan: 6
                        }]
                    });
                    self.exArray.push({
                        cells: [{
                                value: "Type",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Date",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Location",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Reference",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Usage",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Amount",
                                background: "#496cad",
                                color: "#ffffff"
                            }
                        ]
                    });
                    for (var i = 0; i < response.results.length; i++) {
                        self.exArray.push({
                            cells: [{
                                    value: response.results[i].name,
                                    bold: true,
                                },
                                {
                                    value: ""
                                },
                                {
                                    value: ""
                                },
                                {
                                    value: ""
                                },
                                {
                                    value: ""
                                },
                                {
                                    value: ""
                                }
                            ]
                        });
                        for (var j = 0; j < response.results[i].line.length; j++) {
                            balanceCal += response.results[i].line[j].amount;
                            self.exArray.push({
                                cells: [{
                                        value: response.results[i].line[j].type
                                    },
                                    {
                                        value: response.results[i].line[j].date
                                    },
                                    {
                                        value: response.results[i].line[j].location
                                    },
                                    {
                                        value: response.results[i].line[j].number
                                    },
                                    {
                                        value: response.results[i].line[j].usage
                                    },
                                    {
                                        value: kendo.parseFloat(response.results[i].line[j].amount)
                                    },
                                ]
                            });
                        }
                        self.exArray.push({
                            cells: [{
                                value: "",
                                colSpan: 6
                            }]
                        });
                    }
                    self.exArray.push({
                        cells: [{
                                value: "TOTAL",
                                bold: true,
                                fontSize: 16
                            },
                            {
                                value: ""
                            },
                            {
                                value: ""
                            },
                            {
                                value: ""
                            },
                            {
                                value: ""
                            },
                            {
                                value: kendo.parseFloat(response.balanceCal),
                                bold: true,
                                fontSize: 16
                            },
                        ]
                    });
                }
            });
        },
        printGrid: function() {
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
                '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />' +
                '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
                '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/responsive.css">' +
                '<link href="<?php echo base_url(); ?>assets/invoice/invoice.css" rel="stylesheet" />' +
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
                '</style><style type="text/css" media="print"> @page { size: portrait; margin:1mm; }' +
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
                '}' +
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
            setTimeout(function() {
                win.print();
                win.close();
            }, 2000);
        },
        ExportExcel: function() {
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
                        }
                    ],
                    title: "Sale Detail",
                    rows: this.exArray
                }]
            });
            //save the file as Excel file with extension xlsx
            kendo.saveAs({
                dataURI: workbook.toDataURL(),
                fileName: "saleDetail.xlsx"
            });
        }
    });
    banhji.fineCollect = kendo.observable({
        lang: langVM,
        dataSource: dataStore(apiUrl + "utibillReports/fine_collect"),
        contactDS: new kendo.data.DataSource({
            data: banhji.source.customerList,
            sort: {
                field: "number",
                dir: "asc"
            }
        }),
        licenseDS: dataStore(apiUrl + "branches"),
        blocDS: dataStore(apiUrl + "locations"),
        sortList: banhji.source.sortList,
        sorter: "month",
        sdate: "",
        edate: "",
        obj: {
            contactIds: [],
            licenseID: 0,
            locationID: []
        },
        company: banhji.institute,
        displayDate: "",
        total: 0,
        exArray: [],
        pageLoad: function() {
            this.search();
            this.set("haveBloc", false);
        },
        sorterChanges: function() {
            var today = new Date(),
                sdate = "",
                edate = "",
                sorter = this.get("sorter");

            switch (sorter) {
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
        licenseChange: function(e) {
            var data = e.data;
            var license = this.licenseDS.at(e.sender.selectedIndex - 1);
            this.set("licenseSelect", license);
            this.blocDS.filter({
                field: "branch_id",
                value: license.id
            });
            this.set("haveBloc", true);
        },
        search: function() {
            var self = this,
                para = [],
                obj = this.get("obj"),
                start = this.get("sdate"),
                end = this.get("edate"),
                displayDate = "";
            license = this.get("licenseSelect"),
                bloc = this.get("blocSelect");

            if (license) {
                para.push({
                    field: "branch_id",
                    value: license.id
                });
            }

            if (bloc) {
                para.push({
                    field: "location_id",
                    value: bloc.id
                });
            }

            //Customer
            if (obj.contactIds.length > 0) {
                var contactIds = [];
                $.each(obj.contactIds, function(index, value) {
                    contactIds.push(value);
                });
                para.push({
                    field: "contact_id",
                    operator: "where_in",
                    value: contactIds
                });
            }

            //Dates
            if (start && end) {
                start = new Date(start);
                end = new Date(end);
                displayDate = "From " + kendo.toString(start, "dd-MM-yyyy") + " To " + kendo.toString(end, "dd-MM-yyyy");
                end.setDate(end.getDate() + 1);

                para.push({
                    field: "issued_date >=",
                    value: kendo.toString(start, "yyyy-MM-dd")
                });
                para.push({
                    field: "issued_date <",
                    value: kendo.toString(end, "yyyy-MM-dd")
                });
            } else if (start) {
                start = new Date(start);
                displayDate = "On " + kendo.toString(start, "dd-MM-yyyy");

                para.push({
                    field: "issued_date",
                    value: kendo.toString(start, "yyyy-MM-dd")
                });
            } else if (end) {
                end = new Date(end);
                displayDate = "As Of " + kendo.toString(end, "dd-MM-yyyy");
                end.setDate(end.getDate() + 1);

                para.push({
                    field: "issued_date <",
                    value: kendo.toString(end, "yyyy-MM-dd")
                });
            } else {

            }
            this.set("displayDate", displayDate);

            this.dataSource.query({
                filter: para
            }).then(function() {
                var view = self.dataSource.view();

                var amount = 0;
                $.each(view, function(index, value) {
                    amount += value.amount;
                });

                self.set("totalAmount", kendo.toString(amount, banhji.locale == "km-KH" ? "c0" : "c", banhji.locale));
            });
            this.dataSource.bind("requestEnd", function(e) {
                if (e.type == "read") {
                    var response = e.response,
                        balanceCal = 0,
                        balanceRec = 0;
                    self.exArray = [];

                    self.exArray.push({
                        cells: [{
                            value: self.company.name,
                            textAlign: "center",
                            colSpan: 5
                        }]
                    });
                    self.exArray.push({
                        cells: [{
                            value: "Fine Collection",
                            bold: true,
                            fontSize: 20,
                            textAlign: "center",
                            colSpan: 5
                        }]
                    });
                    if (self.displayDate) {
                        self.exArray.push({
                            cells: [{
                                value: self.displayDate,
                                textAlign: "center",
                                colSpan: 5
                            }]
                        });
                    }
                    self.exArray.push({
                        cells: [{
                            value: "",
                            colSpan: 5
                        }]
                    });
                    self.exArray.push({
                        cells: [{
                                value: "Type",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Date",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Location",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Reference",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Amount",
                                background: "#496cad",
                                color: "#ffffff"
                            }
                        ]
                    });
                    for (var i = 0; i < response.results.length; i++) {
                        self.exArray.push({
                            cells: [{
                                    value: response.results[i].name,
                                    bold: true,
                                },
                                {
                                    value: ""
                                },
                                {
                                    value: ""
                                },
                                {
                                    value: ""
                                },
                                {
                                    value: ""
                                },
                            ]
                        });
                        for (var j = 0; j < response.results[i].line.length; j++) {
                            balanceCal += response.results[i].line[j].amount;
                            self.exArray.push({
                                cells: [{
                                        value: response.results[i].line[j].type
                                    },
                                    {
                                        value: response.results[i].line[j].date
                                    },
                                    {
                                        value: response.results[i].line[j].location
                                    },
                                    {
                                        value: response.results[i].line[j].number
                                    },
                                    {
                                        value: kendo.parseFloat(response.results[i].line[j].amount)
                                    },
                                ]
                            });
                        }
                        self.exArray.push({
                            cells: [{
                                value: "",
                                colSpan: 5
                            }]
                        });
                    }
                    self.exArray.push({
                        cells: [{
                                value: "TOTAL",
                                bold: true,
                                fontSize: 16
                            },
                            {
                                value: ""
                            },
                            {
                                value: ""
                            },
                            {
                                value: ""
                            },
                            {
                                value: ""
                            },
                            {
                                value: kendo.parseFloat(response.balanceCal),
                                bold: true,
                                fontSize: 16
                            },
                        ]
                    });
                }
            });
        },
        printGrid: function() {
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
                '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />' +
                '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
                '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/responsive.css">' +
                '<link href="<?php echo base_url(); ?>assets/invoice/invoice.css" rel="stylesheet" />' +
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
                '</style><style type="text/css" media="print"> @page { size: portrait; margin:1mm; }' +
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
                '}' +
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
            setTimeout(function() {
                win.print();
                win.close();
            }, 2000);
        },
        ExportExcel: function() {
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
                    ],
                    title: "Fine Collect",
                    rows: this.exArray
                }]
            });
            //save the file as Excel file with extension xlsx
            kendo.saveAs({
                dataURI: workbook.toDataURL(),
                fileName: "fineCollect.xlsx"
            });
        }
    });
    banhji.otherRevenues = kendo.observable({
        lang: langVM,
        institute: banhji.institute,
        dataSource: dataStore(apiUrl + "customers"),
        pageLoad: function() {},
        printGrid: function() {
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
                '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />' +
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
                '</style><style type="text/css" media="print"> @page { size: landscape; margin:0mm; } .saleSummaryCustomer .total-customer, .saleSummaryCustomer .total-sale { background-color: #DDEBF7!important; -webkit-print-color-adjust:exact; }.saleSummaryCustomer .table.table-borderless.table-condensed  tr th { background-color: #1E4E78!important;-webkit-print-color-adjust:exact;}.saleSummaryCustomer .table.table-borderless.table-condensed  tr th span{ color: #fff!important; }.saleSummaryCustomer .table.table-borderless.table-condensed tr:nth-child(2n+1) td {  background-color: #fff!important; -webkit-print-color-adjust:exact;} .saleSummaryCustomer .table.table-borderless.table-condensed tr td { background-color: #F2F2F2!important;-webkit-print-color-adjust:exact; } </style>' +
                '</head>' +
                '<body><div id="example" class="k-content saleSummaryCustomer" style="padding: 30px;">';
            var htmlEnd =
                '</div></body>' +
                '</html>';

            printableContent = $('#invFormContent').html();
            doc.write(htmlStart + printableContent + htmlEnd);
            doc.close();
            setTimeout(function() {
                win.print();
                win.close();
            }, 2000);
        },
        cancel: function(e) {
            this.dataSource.cancelChanges();
            window.history.back();
        },
    });
    banhji.accountReceivableList = kendo.observable({
        lang: langVM,
        dataSource: dataStore(apiUrl + "utibillReports/Reciveble_invoice"),
        contactDS: new kendo.data.DataSource({
            data: banhji.source.customerList,
            sort: {
                field: "number",
                dir: "asc"
            }
        }),
        licenseDS: dataStore(apiUrl + "branches"),
        blocDS: dataStore(apiUrl + "locations"),
        obj: {
            contactIds: [],
            licenseID: 0,
            locationID: []
        },
        company: banhji.institute,
        as_of: new Date(),
        displayDate: "",
        totalAmount: 0,
        exArray: [],
        pageLoad: function() {
            this.search();
            this.set("haveBloc", false);
        },
        licenseChange: function(e) {
            var data = e.data;
            var license = this.licenseDS.at(e.sender.selectedIndex - 1);
            this.set("licenseSelect", license);
            this.blocDS.filter({
                field: "branch_id",
                value: license.id
            });
            this.set("haveBloc", true);
        },
        search: function() {
            var self = this,
                para = [],
                obj = this.get("obj"),
                as_of = this.get("as_of"),
                displayDate = "";
            license = this.get("licenseSelect"),
                bloc = this.get("blocSelect");

            if (license) {
                para.push({
                    field: "branch_id",
                    value: license.id
                });
            }

            if (bloc) {
                para.push({
                    field: "location_id",
                    value: bloc.id
                });
            }

            //Customer
            if (obj.contactIds.length > 0) {
                var contactIds = [];
                $.each(obj.contactIds, function(index, value) {
                    contactIds.push(value);
                });
                para.push({
                    field: "contact_id",
                    operator: "where_in",
                    value: contactIds
                });
            }

            if (as_of) {
                as_of = new Date(as_of);
                var displayDate = "As Of " + kendo.toString(as_of, "dd-MM-yyyy");
                this.set("displayDate", displayDate);
                as_of.setDate(as_of.getDate() + 1);

                para.push({
                    field: "issued_date <",
                    value: kendo.toString(as_of, "yyyy-MM-dd")
                });
            }

            this.dataSource.query({
                filter: para
            }).then(function() {
                var view = self.dataSource.view();

                var amount = 0;
                $.each(view, function(index, value) {
                    amount += value.amount;
                });

                self.set("totalAmount", kendo.toString(amount, banhji.locale == "km-KH" ? "c0" : "c", banhji.locale));
            });
            this.dataSource.bind("requestEnd", function(e) {
                if (e.type == "read") {
                    var response = e.response,
                        balanceRec = 0;
                    self.exArray = [];

                    self.exArray.push({
                        cells: [{
                            value: self.company.name,
                            textAlign: "center",
                            colSpan: 7
                        }]
                    });
                    self.exArray.push({
                        cells: [{
                            value: "Accounts Receivable Listing",
                            bold: true,
                            fontSize: 20,
                            textAlign: "center",
                            colSpan: 7
                        }]
                    });
                    if (self.displayDate) {
                        self.exArray.push({
                            cells: [{
                                value: self.displayDate,
                                textAlign: "center",
                                colSpan: 7
                            }]
                        });
                    }
                    self.exArray.push({
                        cells: [{
                            value: "",
                            colSpan: 7
                        }]
                    });
                    self.exArray.push({
                        cells: [{
                                value: "Type",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
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
                                value: "Reference",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Location",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Status",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Amount",
                                background: "#496cad",
                                color: "#ffffff"
                            }
                        ]
                    });
                    for (var i = 0; i < response.results.length; i++) {
                        balanceRec += response.results[i].amount;
                        var date = new Date(),
                            dueDates = new Date(response.results[i].due_date).getTime(),
                            overDue, toDay = new Date(date).getTime();
                        if (dueDates < toDay) {
                            overDue = Math.floor((toDay - dueDates) / (1000 * 60 * 60 * 24)) + "days";
                        } else {
                            overDue = Math.floor((dueDates - toDay) / (1000 * 60 * 60 * 24)) + "days to pay";
                        }
                        self.exArray.push({
                            cells: [{
                                    value: response.results[i].type
                                },
                                {
                                    value: response.results[i].issued_date
                                },
                                {
                                    value: response.results[i].name
                                },
                                {
                                    value: response.results[i].number
                                },
                                {
                                    value: response.results[i].location
                                },
                                {
                                    value: overDue
                                },
                                {
                                    value: kendo.parseFloat(response.results[i].amount)
                                },
                            ]
                        });
                        self.exArray.push({
                            cells: [{
                                value: "",
                                colSpan: 7
                            }]
                        });
                    }
                    self.exArray.push({
                        cells: [{
                                value: "TOTAL",
                                bold: true,
                                fontSize: 16
                            },
                            {
                                value: ""
                            },
                            {
                                value: ""
                            },
                            {
                                value: ""
                            },
                            {
                                value: ""
                            },
                            {
                                value: ""
                            },
                            {
                                value: kendo.parseFloat(response.balanceRec),
                                bold: true,
                                fontSize: 16
                            },
                        ]
                    });
                }
            });
        },
        printGrid: function() {
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
                '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />' +
                '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
                '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/responsive.css">' +
                '<link href="<?php echo base_url(); ?>assets/invoice/invoice.css" rel="stylesheet" />' +
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
                '</style><style type="text/css" media="print"> @page { size: portrait; margin:1mm; }' +
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
                '}' +
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
            setTimeout(function() {
                win.print();
                win.close();
            }, 2000);
        },
        ExportExcel: function() {
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
                        }
                    ],
                    title: "Accounts Receivable Listing",
                    rows: this.exArray
                }]
            });
            //save the file as Excel file with extension xlsx
            kendo.saveAs({
                dataURI: workbook.toDataURL(),
                fileName: "ARListing.xlsx"
            });
        }
    });
    banhji.agingSummary = kendo.observable({
        lang: langVM,
        dataSource: dataStore(apiUrl + "utibillReports/aging_summary"),
        contactDS: new kendo.data.DataSource({
            data: banhji.source.customerList,
            sort: {
                field: "number",
                dir: "asc"
            }
        }),
        licenseDS: dataStore(apiUrl + "branches"),
        blocDS: dataStore(apiUrl + "locations"),
        obj: {
            contactIds: [],
            licenseID: 0,
            locationID: []
        },
        company: banhji.institute,
        as_of: new Date(),
        displayDate: "",
        totalBalance: 0,
        exArray: [],
        pageLoad: function() {
            this.search();
            this.set("haveBloc", false);
        },
        licenseChange: function(e) {
            var data = e.data;
            var license = this.licenseDS.at(e.sender.selectedIndex - 1);
            this.set("licenseSelect", license);
            this.blocDS.filter({
                field: "branch_id",
                value: license.id
            });
            this.set("haveBloc", true);
        },
        search: function() {
            var self = this,
                para = [],
                obj = this.get("obj"),
                as_of = this.get("as_of"),
                displayDate = "";
            license = this.get("licenseSelect"),
                bloc = this.get("blocSelect");

            if (license) {
                para.push({
                    field: "branch_id",
                    value: license.id
                });
            }

            if (bloc) {
                para.push({
                    field: "location_id",
                    value: bloc.id
                });
            }

            //Customer
            if (obj.contactIds.length > 0) {
                var contactIds = [];
                $.each(obj.contactIds, function(index, value) {
                    contactIds.push(value);
                });
                para.push({
                    field: "contact_id",
                    operator: "where_in",
                    value: contactIds
                });
            }

            if (as_of) {
                as_of = new Date(as_of);
                var displayDate = "As Of " + kendo.toString(as_of, "dd-MM-yyyy");
                this.set("displayDate", displayDate);
                as_of.setDate(as_of.getDate() + 1);

                para.push({
                    field: "issued_date <",
                    value: kendo.toString(as_of, "yyyy-MM-dd")
                });
            }

            this.dataSource.query({
                filter: para
            }).then(function() {
                var view = self.dataSource.view();

                var balance = 0;
                $.each(view, function(index, value) {
                    balance += value.total;
                });

                self.set("totalBalance", kendo.toString(balance, banhji.locale == "km-KH" ? "c0" : "c", banhji.locale));
            });
            this.dataSource.bind("requestEnd", function(e) {
                if (e.type == "read") {
                    var response = e.response,
                        balanceRec = 0;
                    self.exArray = [];

                    self.exArray.push({
                        cells: [{
                            value: self.company.name,
                            textAlign: "center",
                            colSpan: 7
                        }]
                    });
                    self.exArray.push({
                        cells: [{
                            value: "Receivable Aging Summary",
                            bold: true,
                            fontSize: 20,
                            textAlign: "center",
                            colSpan: 7
                        }]
                    });
                    if (self.displayDate) {
                        self.exArray.push({
                            cells: [{
                                value: self.displayDate,
                                textAlign: "center",
                                colSpan: 7
                            }]
                        });
                    }
                    self.exArray.push({
                        cells: [{
                            value: "",
                            colSpan: 7
                        }]
                    });
                    self.exArray.push({
                        cells: [{
                                value: "Customer",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Current",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "1-30",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "31-60",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "61-90",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Over90",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Total",
                                background: "#496cad",
                                color: "#ffffff"
                            }
                        ]
                    });
                    for (var i = 0; i < response.results.length; i++) {
                        balanceRec += response.results[i].total;
                        self.exArray.push({
                            cells: [{
                                    value: response.results[i].name
                                },
                                {
                                    value: kendo.parseFloat(response.results[i].current)
                                },
                                {
                                    value: kendo.parseFloat(response.results[i].in30)
                                },
                                {
                                    value: kendo.parseFloat(response.results[i].in60)
                                },
                                {
                                    value: kendo.parseFloat(response.results[i].in90)
                                },
                                {
                                    value: kendo.parseFloat(response.results[i].over90)
                                },
                                {
                                    value: kendo.parseFloat(response.results[i].total)
                                },
                            ]
                        });
                        self.exArray.push({
                            cells: [{
                                value: "",
                                colSpan: 7
                            }]
                        });
                    }
                    self.exArray.push({
                        cells: [{
                                value: "TOTAL",
                                bold: true,
                                fontSize: 16
                            },
                            {
                                value: ""
                            },
                            {
                                value: ""
                            },
                            {
                                value: ""
                            },
                            {
                                value: ""
                            },
                            {
                                value: ""
                            },
                            {
                                value: kendo.parseFloat(response.balanceRec),
                                bold: true,
                                fontSize: 16
                            },
                        ]
                    });
                }
            });
        },
        printGrid: function() {
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
                '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />' +
                '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
                '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/responsive.css">' +
                '<link href="<?php echo base_url(); ?>assets/invoice/invoice.css" rel="stylesheet" />' +
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
                '</style><style type="text/css" media="print"> @page { size: portrait; margin:1mm; }' +
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
                '}' +
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
            setTimeout(function() {
                win.print();
                win.close();
            }, 2000);
        },
        ExportExcel: function() {
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
                        }
                    ],
                    title: "Receivable Agin Summary",
                    rows: this.exArray
                }]
            });
            //save the file as Excel file with extension xlsx
            kendo.saveAs({
                dataURI: workbook.toDataURL(),
                fileName: "receivableAginSummary.xlsx"
            });
        }
    });
    banhji.customerDepositReport = kendo.observable({
        lang: langVM,
        dataSource: dataStore(apiUrl + "utibillReports/deposit"),
        contactDS: new kendo.data.DataSource({
            data: banhji.source.customerList,
            sort: {
                field: "number",
                dir: "asc"
            }
        }),
        licenseDS: dataStore(apiUrl + "branches"),
        blocDS: dataStore(apiUrl + "locations"),
        sortList: banhji.source.sortList,
        sorter: "month",
        sdate: "",
        edate: "",
        obj: {
            contactIds: [],
            licenseID: 0,
            locationID: []
        },
        company: banhji.institute,
        displayDate: "",
        totalAmount: 0,
        exArray: [],
        pageLoad: function() {
            this.search();
            this.set("haveBloc", false);
        },
        sorterChanges: function() {
            var today = new Date(),
                sdate = "",
                edate = "",
                sorter = this.get("sorter");

            switch (sorter) {
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
        licenseChange: function(e) {
            var data = e.data;
            var license = this.licenseDS.at(e.sender.selectedIndex - 1);
            this.set("licenseSelect", license);
            this.blocDS.filter({
                field: "branch_id",
                value: license.id
            });
            this.set("haveBloc", true);
        },
        search: function() {
            var self = this,
                para = [],
                obj = this.get("obj"),
                start = this.get("sdate"),
                end = this.get("edate"),
                displayDate = "";
            license = this.get("licenseSelect"),
                bloc = this.get("blocSelect");


            if (license) {
                para.push({
                    field: "branch_id",
                    value: license.id
                });
            }

            if (bloc) {
                para.push({
                    field: "location_id",
                    value: bloc.id
                });
            }

            //Customer
            if (obj.contactIds.length > 0) {
                var contactIds = [];
                $.each(obj.contactIds, function(index, value) {
                    contactIds.push(value);
                });
                para.push({
                    field: "contact_id",
                    operator: "where_in",
                    value: contactIds
                });
            }

            //Dates
            if (start && end) {
                start = new Date(start);
                end = new Date(end);
                displayDate = "From " + kendo.toString(start, "dd-MM-yyyy") + " To " + kendo.toString(end, "dd-MM-yyyy");
                end.setDate(end.getDate() + 1);

                para.push({
                    field: "issued_date >=",
                    value: kendo.toString(start, "yyyy-MM-dd")
                });
                para.push({
                    field: "issued_date <",
                    value: kendo.toString(end, "yyyy-MM-dd")
                });
            } else if (start) {
                start = new Date(start);
                displayDate = "On " + kendo.toString(start, "dd-MM-yyyy");

                para.push({
                    field: "issued_date",
                    value: kendo.toString(start, "yyyy-MM-dd")
                });
            } else if (end) {
                end = new Date(end);
                displayDate = "As Of " + kendo.toString(end, "dd-MM-yyyy");
                end.setDate(end.getDate() + 1);

                para.push({
                    field: "issued_date <",
                    value: kendo.toString(end, "yyyy-MM-dd")
                });
            } else {

            }
            this.set("displayDate", displayDate);

            this.dataSource.query({
                filter: para
            }).then(function() {
                var view = self.dataSource.view();

                var amount = 0;
                $.each(view, function(index, value) {
                    $.each(value.line, function(ind, val) {
                        amount += val.amount;
                    });
                });

                self.set("totalAmount", kendo.toString(amount, banhji.locale == "km-KH" ? "c0" : "c", banhji.locale));
            });
            this.dataSource.bind("requestEnd", function(e) {
                if (e.type == "read") {
                    var response = e.response,
                        balanceCal = 0,
                        balanceRec = 0;
                    self.exArray = [];

                    self.exArray.push({
                        cells: [{
                            value: self.company.name,
                            textAlign: "center",
                            colSpan: 7
                        }]
                    });
                    self.exArray.push({
                        cells: [{
                            value: "Customer Deposit Report",
                            bold: true,
                            fontSize: 20,
                            textAlign: "center",
                            colSpan: 7
                        }]
                    });
                    if (self.displayDate) {
                        self.exArray.push({
                            cells: [{
                                value: self.displayDate,
                                textAlign: "center",
                                colSpan: 7
                            }]
                        });
                    }
                    self.exArray.push({
                        cells: [{
                            value: "",
                            colSpan: 7
                        }]
                    });
                    self.exArray.push({
                        cells: [{
                                value: "Type",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Date",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Number",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Reference",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Location",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Amount",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Balance",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                        ]
                    });
                    for (var i = 0; i < response.results.length; i++) {
                        self.exArray.push({
                            cells: [{
                                    value: response.results[i].name,
                                    bold: true,
                                },
                                {
                                    value: ""
                                },
                                {
                                    value: ""
                                },
                                {
                                    value: ""
                                },
                                {
                                    value: ""
                                },
                                {
                                    value: ""
                                },
                                {
                                    value: ""
                                }
                            ]
                        });
                        for (var j = 0; j < response.results[i].line.length; j++) {
                            balanceCal += response.results[i].line[j].amount;
                            self.exArray.push({
                                cells: [{
                                        value: response.results[i].line[j].type
                                    },
                                    {
                                        value: response.results[i].line[j].issued_date
                                    },
                                    {
                                        value: response.results[i].line[j].number
                                    },
                                    {
                                        value: response.results[i].line[j].reference
                                    },
                                    {
                                        value: response.results[i].line[j].location
                                    },
                                    {
                                        value: kendo.parseFloat(response.results[i].line[j].amount)
                                    },
                                    {
                                        value: balanceCal
                                    },
                                ]
                            });
                        }
                        self.exArray.push({
                            cells: [{
                                value: "",
                                colSpan: 7
                            }]
                        });
                    }
                    self.exArray.push({
                        cells: [{
                                value: "TOTAL",
                                bold: true,
                                fontSize: 16
                            },
                            {
                                value: ""
                            },
                            {
                                value: ""
                            },
                            {
                                value: ""
                            },
                            {
                                value: ""
                            },
                            {
                                value: ""
                            },
                            {
                                value: kendo.parseFloat(response.balanceCal),
                                bold: true,
                                fontSize: 16
                            },
                        ]
                    });
                }
            });
        },
        printGrid: function() {
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
                '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />' +
                '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
                '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/responsive.css">' +
                '<link href="<?php echo base_url(); ?>assets/invoice/invoice.css" rel="stylesheet" />' +
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
                '</style><style type="text/css" media="print"> @page { size: portrait; margin:1mm; }' +
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
                '}' +
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
            setTimeout(function() {
                win.print();
                win.close();
            }, 2000);
        },
        ExportExcel: function() {
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
                        }
                    ],
                    title: "Customer Deposit",
                    rows: this.exArray
                }]
            });
            //save the file as Excel file with extension xlsx
            kendo.saveAs({
                dataURI: workbook.toDataURL(),
                fileName: "customerDeposit.xlsx"
            });
        }
    });
    banhji.customerBalanceSummary = kendo.observable({
        lang: langVM,
        dataSource: dataStore(apiUrl + "utibillReports/balance_summary"),
        obj: null,
        company: banhji.institute,
        as_of: new Date(),
        displayDate: "",
        totalTxn: 0,
        totalBalance: 0,
        exArray: [],
        pageLoad: function() {
            this.search();
        },
        search: function() {
            var self = this,
                para = [],
                as_of = this.get("as_of"),
                displayDate = "";

            if (as_of) {
                as_of = new Date(as_of);
                var displayDate = "As Of " + kendo.toString(as_of, "dd-MM-yyyy");
                this.set("displayDate", displayDate);
                as_of.setDate(as_of.getDate() + 1);

                para.push({
                    field: "issued_date <",
                    value: kendo.toString(as_of, "yyyy-MM-dd")
                });
            }

            this.dataSource.query({
                filter: para,
                page: 1
            }).then(function() {
                var view = self.dataSource.view();

                var balance = 0,
                    txnCount = 0;
                $.each(view, function(index, value) {
                    txnCount += value.txn_count;
                    balance += value.amount;
                });

                self.set("total_txn", kendo.toString(txnCount, "n0"));
                self.set("total_balance", kendo.toString(balance, "c2", banhji.locale));
            });
            this.dataSource.bind("requestEnd", function(e) {
                if (e.type == "read") {
                    var response = e.response,
                        balanceRec = 0;
                    self.exArray = [];

                    self.exArray.push({
                        cells: [{
                            value: self.company.name,
                            textAlign: "center",
                            colSpan: 3
                        }]
                    });
                    self.exArray.push({
                        cells: [{
                            value: "Customer Balance Summary",
                            bold: true,
                            fontSize: 20,
                            textAlign: "center",
                            colSpan: 3
                        }]
                    });
                    if (self.displayDate) {
                        self.exArray.push({
                            cells: [{
                                value: self.displayDate,
                                textAlign: "center",
                                colSpan: 3
                            }]
                        });
                    }
                    self.exArray.push({
                        cells: [{
                            value: "",
                            colSpan: 3
                        }]
                    });
                    self.exArray.push({
                        cells: [{
                                value: "Customer Name",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "No. OF Invoice",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Balance",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                        ]
                    });
                    for (var i = 0; i < response.results.length; i++) {
                        balanceRec += response.results[i].amount;
                        self.exArray.push({
                            cells: [{
                                    value: response.results[i].name
                                },
                                {
                                    value: response.results[i].number
                                },
                                {
                                    value: kendo.parseFloat(response.results[i].amount)
                                },
                            ]
                        });
                        self.exArray.push({
                            cells: [{
                                value: "",
                                colSpan: 3
                            }]
                        });
                    }
                    self.exArray.push({
                        cells: [{
                                value: "TOTAL",
                                bold: true,
                                fontSize: 16
                            },
                            {
                                value: ""
                            },
                            {
                                value: kendo.parseFloat(response.balanceRec),
                                bold: true,
                                fontSize: 16
                            },
                        ]
                    });
                }
            });
        },
        printGrid: function() {
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
                '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />' +
                '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
                '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/responsive.css">' +
                '<link href="<?php echo base_url(); ?>assets/invoice/invoice.css" rel="stylesheet" />' +
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
                '</style><style type="text/css" media="print"> @page { size: portrait; margin:1mm; }' +
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
                '}' +
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
            setTimeout(function() {
                win.print();
                win.close();
            }, 2000);
        },
        ExportExcel: function() {
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
                        }
                    ],
                    title: "Customer Balance Summary",
                    rows: this.exArray
                }]
            });
            //save the file as Excel file with extension xlsx
            kendo.saveAs({
                dataURI: workbook.toDataURL(),
                fileName: "customerBalanceSummary.xlsx"
            });
        }
    });
    banhji.customerBalanceDetail = kendo.observable({
        lang: langVM,
        dataSource: dataStore(apiUrl + "utibillReports/balance_detail"),
        obj: null,
        company: banhji.institute,
        as_of: new Date(),
        displayDate: "",
        totalTxn: 0,
        totalBalance: 0,
        exArray: [],
        pageLoad: function() {
            this.search();
        },
        search: function() {
            var self = this,
                para = [],
                obj = this.get("obj"),
                as_of = this.get("as_of"),
                displayDate = "";

            if (as_of) {
                as_of = new Date(as_of);
                var displayDate = "As Of " + kendo.toString(as_of, "dd-MM-yyyy");
                this.set("displayDate", displayDate);
                as_of.setDate(as_of.getDate() + 1);

                para.push({
                    field: "issued_date <",
                    value: kendo.toString(as_of, "yyyy-MM-dd")
                });
            }

            this.dataSource.query({
                filter: para,
                sort: [{
                        field: "issued_date",
                        dir: "asc"
                    },
                    {
                        field: "number",
                        operator: "order_by_related_contact",
                        dir: "asc"
                    }
                ]
            }).then(function() {
                var view = self.dataSource.view();

                var balance = 0,
                    txnCount = 0;
                $.each(view, function(index, value) {
                    txnCount += value.line.length;
                    $.each(value.line, function(ind, val) {
                        balance += val.amount;
                    });
                });

                self.set("total_txn", kendo.toString(txnCount, "n0"));
                self.set("total_balance", kendo.toString(balance, "c2", banhji.locale));
            });
        },
        printGrid: function() {
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
                '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />' +
                '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
                '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/responsive.css">' +
                '<link href="<?php echo base_url(); ?>assets/invoice/invoice.css" rel="stylesheet" />' +
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
                '</style><style type="text/css" media="print"> @page { size: portrait; margin:1mm; }' +
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
                '}' +
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
            setTimeout(function() {
                win.print();
                win.close();
            }, 2000);
        },
        ExportExcel: function() {
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
                        }
                    ],
                    title: "General Ledger",
                    rows: this.exArray
                }]
            });
            //save the file as Excel file with extension xlsx
            kendo.saveAs({
                dataURI: workbook.toDataURL(),
                fileName: "GeneralLedger.xlsx"
            });
        }
    });
    banhji.agingDetail = kendo.observable({
        lang: langVM,
        dataSource: dataStore(apiUrl + "utibillReports/aging_detail"),
        contactDS: new kendo.data.DataSource({
            data: banhji.source.customerList,
            sort: {
                field: "number",
                dir: "asc"
            }
        }),
        licenseDS: dataStore(apiUrl + "branches"),
        blocDS: dataStore(apiUrl + "locations"),
        obj: {
            contactIds: [],
            licenseID: 0,
            locationID: []
        },
        company: banhji.institute,
        as_of: new Date(),
        displayDate: "",
        totalBalance: 0,
        exArray: [],
        pageLoad: function() {
            this.search();
            this.set("haveBloc", false);
        },
        licenseChange: function(e) {
            var data = e.data;
            var license = this.licenseDS.at(e.sender.selectedIndex - 1);
            this.set("licenseSelect", license);
            this.blocDS.filter({
                field: "branch_id",
                value: license.id
            });
            this.set("haveBloc", true);
        },
        search: function() {
            var self = this,
                para = [],
                obj = this.get("obj"),
                as_of = this.get("as_of"),
                displayDate = "";
            license = this.get("licenseSelect"),
                bloc = this.get("blocSelect");


            if (license) {
                para.push({
                    field: "branch_id",
                    value: license.id
                });
            }

            if (bloc) {
                para.push({
                    field: "location_id",
                    value: bloc.id
                });
            }

            //Customer
            if (obj.contactIds.length > 0) {
                var contactIds = [];
                $.each(obj.contactIds, function(index, value) {
                    contactIds.push(value);
                });
                para.push({
                    field: "contact_id",
                    operator: "where_in",
                    value: contactIds
                });
            }

            if (as_of) {
                as_of = new Date(as_of);
                var displayDate = "As Of " + kendo.toString(as_of, "dd-MM-yyyy");
                this.set("displayDate", displayDate);
                as_of.setDate(as_of.getDate() + 1);

                para.push({
                    field: "issued_date <",
                    value: kendo.toString(as_of, "yyyy-MM-dd")
                });
            }

            this.dataSource.query({
                filter: para,
                sort: [{
                        field: "issued_date",
                        dir: "asc"
                    },
                    {
                        field: "number",
                        operator: "order_by_related_contact",
                        dir: "asc"
                    }
                ]
            }).then(function() {
                var view = self.dataSource.view();

                var balance = 0;
                $.each(view, function(index, value) {
                    $.each(value.line, function(ind, val) {
                        balance += val.amount;
                    });
                });

                self.set("totalBalance", kendo.toString(balance, banhji.locale == "km-KH" ? "c0" : "c", banhji.locale));
            });
            this.dataSource.bind("requestEnd", function(e) {
                if (e.type == "read") {
                    var response = e.response,
                        balanceCal = 0;
                    self.exArray = [];

                    self.exArray.push({
                        cells: [{
                            value: self.company.name,
                            textAlign: "center",
                            colSpan: 8
                        }]
                    });
                    self.exArray.push({
                        cells: [{
                            value: "Customer Aging Detail List",
                            bold: true,
                            fontSize: 20,
                            textAlign: "center",
                            colSpan: 8
                        }]
                    });
                    if (self.displayDate) {
                        self.exArray.push({
                            cells: [{
                                value: self.displayDate,
                                textAlign: "center",
                                colSpan: 8
                            }]
                        });
                    }
                    self.exArray.push({
                        cells: [{
                            value: "",
                            colSpan: 8
                        }]
                    });
                    self.exArray.push({
                        cells: [{
                                value: "Type",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Invoice data",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Due Date",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Reference",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Location",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Status",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Amount",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Balance",
                                background: "#496cad",
                                color: "#ffffff"
                            }
                        ]
                    });
                    for (var i = 0; i < response.results.length; i++) {
                        self.exArray.push({
                            cells: [{
                                    value: response.results[i].name,
                                    bold: true,
                                },
                                {
                                    value: ""
                                },
                                {
                                    value: ""
                                },
                                {
                                    value: ""
                                },
                                {
                                    value: ""
                                },
                                {
                                    value: ""
                                },
                                {
                                    value: ""
                                },
                                {
                                    value: ""
                                }
                            ]
                        });
                        for (var j = 0; j < response.results[i].line.length; j++) {
                            balanceCal += response.results[i].line[j].amount;
                            self.exArray.push({
                                cells: [{
                                        value: response.results[i].line[j].type
                                    },
                                    {
                                        value: response.results[i].line[j].issued_date
                                    },
                                    {
                                        value: response.results[i].line[j].due_date
                                    },
                                    {
                                        value: response.results[i].line[j].number
                                    },
                                    {
                                        value: response.results[i].line[j].location
                                    },
                                    {
                                        value: kendo.parseFloat(response.results[i].line[j].amount)
                                    },
                                ]
                            });
                        }
                        self.exArray.push({
                            cells: [{
                                value: "",
                                colSpan: 8
                            }]
                        });
                    }
                    self.exArray.push({
                        cells: [{
                                value: "TOTAL",
                                bold: true,
                                fontSize: 16
                            },
                            {
                                value: ""
                            },
                            {
                                value: ""
                            },
                            {
                                value: ""
                            },
                            {
                                value: ""
                            },
                            {
                                value: ""
                            },
                            {
                                value: ""
                            },
                            {
                                value: kendo.parseFloat(response.balanceCal),
                                bold: true,
                                fontSize: 16
                            },
                        ]
                    });
                }
            });
        },
        printGrid: function() {
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
                '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />' +
                '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
                '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/responsive.css">' +
                '<link href="<?php echo base_url(); ?>assets/invoice/invoice.css" rel="stylesheet" />' +
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
                '</style><style type="text/css" media="print"> @page { size: portrait; margin:1mm; }' +
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
                '}' +
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
            setTimeout(function() {
                win.print();
                win.close();
            }, 2000);
        },
        ExportExcel: function() {
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
                    title: "Customer Aging Detail",
                    rows: this.exArray
                }]
            });
            //save the file as Excel file with extension xlsx
            kendo.saveAs({
                dataURI: workbook.toDataURL(),
                fileName: "customerAgingDetail.xlsx"
            });
        }
    });
    banhji.cashReceiptSummary = kendo.observable({
        lang: langVM,
        institute: banhji.institute,
        dataSource: dataStore(apiUrl + "wreports/cr_summary"),
        pageLoad: function() {},
        printGrid: function() {
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
                '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />' +
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
                '</style><style type="text/css" media="print"> @page { size: landscape; margin:0mm; } .saleSummaryCustomer .total-customer, .saleSummaryCustomer .total-sale { background-color: #DDEBF7!important; -webkit-print-color-adjust:exact; }.saleSummaryCustomer .table.table-borderless.table-condensed  tr th { background-color: #1E4E78!important;-webkit-print-color-adjust:exact;}.saleSummaryCustomer .table.table-borderless.table-condensed  tr th span{ color: #fff!important; }.saleSummaryCustomer .table.table-borderless.table-condensed tr:nth-child(2n+1) td {  background-color: #fff!important; -webkit-print-color-adjust:exact;} .saleSummaryCustomer .table.table-borderless.table-condensed tr td { background-color: #F2F2F2!important;-webkit-print-color-adjust:exact; } </style>' +
                '</head>' +
                '<body><div id="example" class="k-content saleSummaryCustomer" style="padding: 30px;">';
            var htmlEnd =
                '</div></body>' +
                '</html>';

            printableContent = $('#invFormContent').html();
            doc.write(htmlStart + printableContent + htmlEnd);
            doc.close();
            setTimeout(function() {
                win.print();
                win.close();
            }, 2000);
        },
        cancel: function(e) {
            this.dataSource.cancelChanges();
            window.history.back();
        },
    });
    banhji.cashReceiptSourceSummary = kendo.observable({
        lang: langVM,
        institute: banhji.institute,
        dataSource: dataStore(apiUrl + "utibillReports/wsource_summary"),
        pageLoad: function() {},
        printGrid: function() {
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
                '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />' +
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
                '</style><style type="text/css" media="print"> @page { size: landscape; margin:0mm; } .saleSummaryCustomer .total-customer, .saleSummaryCustomer .total-sale { background-color: #DDEBF7!important; -webkit-print-color-adjust:exact; }.saleSummaryCustomer .table.table-borderless.table-condensed  tr th { background-color: #1E4E78!important;-webkit-print-color-adjust:exact;}.saleSummaryCustomer .table.table-borderless.table-condensed  tr th span{ color: #fff!important; }.saleSummaryCustomer .table.table-borderless.table-condensed tr:nth-child(2n+1) td {  background-color: #fff!important; -webkit-print-color-adjust:exact;} .saleSummaryCustomer .table.table-borderless.table-condensed tr td { background-color: #F2F2F2!important;-webkit-print-color-adjust:exact; } </style>' +
                '</head>' +
                '<body><div id="example" class="k-content saleSummaryCustomer" style="padding: 30px;">';
            var htmlEnd =
                '</div></body>' +
                '</html>';

            printableContent = $('#invFormContent').html();
            doc.write(htmlStart + printableContent + htmlEnd);
            doc.close();
            setTimeout(function() {
                win.print();
                win.close();
            }, 2000);
        },
        cancel: function(e) {
            this.dataSource.cancelChanges();
            window.history.back();
        },
    });
    banhji.cashReceiptDetail = kendo.observable({
        lang: langVM,
        dataSource: dataStore(apiUrl + "utibillReports/cash_receipt"),
        contactDS: new kendo.data.DataSource({
            data: banhji.source.customerList,
            sort: {
                field: "number",
                dir: "asc"
            }
        }),
        licenseDS: dataStore(apiUrl + "branches"),
        blocDS: dataStore(apiUrl + "locations"),
        sortList: banhji.source.sortList,
        sorter: "month",
        sdate: "",
        edate: "",
        as_of: new Date(),
        obj: {
            contactIds: [],
            licenseID: 0,
            locationID: []
        },
        company: banhji.institute,
        displayDate: "",
        total_txn: 0,
        totalAmount: 0,
        exArray: [],
        pageLoad: function() {
            this.search();
            this.set("haveBloc", false);
        },
        sorterChanges: function() {
            var today = new Date(),
                sdate = "",
                edate = "",
                sorter = this.get("sorter");

            switch (sorter) {
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
        licenseChange: function(e) {
            var data = e.data;
            var license = this.licenseDS.at(e.sender.selectedIndex - 1);
            this.set("licenseSelect", license);
            this.blocDS.filter({
                field: "branch_id",
                value: license.id
            });
            this.set("haveBloc", true);
        },
        search: function() {
            var self = this,
                para = [],
                obj = this.get("obj"),
                start = this.get("sdate"),
                end = this.get("edate"),
                displayDate = "";
            license = this.get("licenseSelect"),
                bloc = this.get("blocSelect");


            if (license) {
                para.push({
                    field: "branch_id",
                    value: license.id
                });
            }

            if (bloc) {
                para.push({
                    field: "location_id",
                    value: bloc.id
                });
            }


            //Dates
            if (start && end) {
                start = new Date(start);
                end = new Date(end);
                displayDate = "From " + kendo.toString(start, "dd-MM-yyyy") + " To " + kendo.toString(end, "dd-MM-yyyy");
                end.setDate(end.getDate() + 1);

                para.push({
                    field: "issued_date >=",
                    value: kendo.toString(start, "yyyy-MM-dd")
                });
                para.push({
                    field: "issued_date <",
                    value: kendo.toString(end, "yyyy-MM-dd")
                });
            } else if (start) {
                start = new Date(start);
                displayDate = "On " + kendo.toString(start, "dd-MM-yyyy");

                para.push({
                    field: "issued_date",
                    value: kendo.toString(start, "yyyy-MM-dd")
                });
            } else if (end) {
                end = new Date(end);
                displayDate = "As Of " + kendo.toString(end, "dd-MM-yyyy");
                end.setDate(end.getDate() + 1);

                para.push({
                    field: "issued_date <",
                    value: kendo.toString(end, "yyyy-MM-dd")
                });
            } else {

            }
            this.set("displayDate", displayDate);
            this.dataSource.query({
                filter: para
            }).then(function() {
                var view = self.dataSource.view();

                var amount = 0,
                    txn_count = 0;
                $.each(view, function(index, value) {
                    $.each(value.line, function(indexx, x) {
                        txn_count++;
                        $.each(x.payments, function(indexy, y) {
                            amount += y.amount;
                        });
                    });
                });

                self.set("total_txn", kendo.toString(txn_count, "n0"));
                self.set("totalAmount", kendo.toString(amount, banhji.locale == "km-KH" ? "c0" : "c", banhji.locale));
            });
            this.dataSource.bind("requestEnd", function(e) {
                if (e.type == "read") {
                    var response = e.response,
                        balanceCal = 0,
                        balanceRec = 0;
                    self.exArray = [];

                    self.exArray.push({
                        cells: [{
                            value: self.company.name,
                            textAlign: "center",
                            colSpan: 6
                        }]
                    });
                    self.exArray.push({
                        cells: [{
                            value: "Cash Receipt Detail",
                            bold: true,
                            fontSize: 20,
                            textAlign: "center",
                            colSpan: 6
                        }]
                    });
                    if (self.displayDate) {
                        self.exArray.push({
                            cells: [{
                                value: self.displayDate,
                                textAlign: "center",
                                colSpan: 6
                            }]
                        });
                    }
                    self.exArray.push({
                        cells: [{
                            value: "",
                            colSpan: 6
                        }]
                    });
                    self.exArray.push({
                        cells: [{
                                value: "Receipt Date",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Receipt Number",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Receipt Amount",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Invoice Date",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Invoice Number",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Invoice Amount",
                                background: "#496cad",
                                color: "#ffffff"
                            }
                        ]
                    });
                    for (var i = 0; i < response.results.length; i++) {
                        self.exArray.push({
                            cells: [{
                                    value: response.results[i].name,
                                    bold: true,
                                },
                                {
                                    value: ""
                                },
                                {
                                    value: ""
                                },
                                {
                                    value: ""
                                },
                                {
                                    value: ""
                                },
                                {
                                    value: ""
                                }
                            ]
                        });
                        for (var j = 0; j < response.results[i].line.length; j++) {
                            balanceCal += response.results[i].line[j].reference_amount;
                            balanceRec += response.results[i].line[j].amount;
                            self.exArray.push({
                                cells: [{
                                        value: response.results[i].line[j].issued_date
                                    },
                                    {
                                        value: response.results[i].line[j].number
                                    },
                                    {
                                        value: kendo.parseFloat(response.results[i].line[j].amount)
                                    },
                                    {
                                        value: response.results[i].line[j].reference_issued_date
                                    },
                                    {
                                        value: response.results[i].line[j].reference_number
                                    },
                                    {
                                        value: kendo.parseFloat(response.results[i].line[j].reference_amount)
                                    },
                                ]
                            });
                        }
                        self.exArray.push({
                            cells: [{
                                value: "",
                                colSpan: 6
                            }]
                        });
                    }
                    self.exArray.push({
                        cells: [{
                                value: "TOTAL",
                                bold: true,
                                fontSize: 16
                            },
                            {
                                value: ""
                            },
                            {
                                value: kendo.parseFloat(response.balanceRec),
                                bold: true,
                                fontSize: 16
                            },
                            {
                                value: ""
                            },
                            {
                                value: ""
                            },
                            {
                                value: kendo.parseFloat(response.balanceCal),
                                bold: true,
                                fontSize: 16
                            },
                        ]
                    });
                }
            });
        },
        printGrid: function() {
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
                '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />' +
                '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
                '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/responsive.css">' +
                '<link href="<?php echo base_url(); ?>assets/invoice/invoice.css" rel="stylesheet" />' +
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
                '</style><style type="text/css" media="print"> @page { size: portrait; margin:1mm; }' +
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
                '}' +
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
            setTimeout(function() {
                win.print();
                win.close();
            }, 2000);
        },
        ExportExcel: function() {
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
                        }
                    ],
                    title: "Cash Receipt Detail",
                    rows: this.exArray
                }]
            });
            //save the file as Excel file with extension xlsx
            kendo.saveAs({
                dataURI: workbook.toDataURL(),
                fileName: "cashReceiptDetail.xlsx"
            });
        }
    });
    banhji.cashReceiptSourceDetail = kendo.observable({
        lang: langVM,
        dataSource: dataStore(apiUrl + "utibillReports/cash_receipt_source"),
        contactDS: new kendo.data.DataSource({
            data: banhji.source.customerList,
            sort: {
                field: "number",
                dir: "asc"
            }
        }),
        licenseDS: dataStore(apiUrl + "branches"),
        blocDS: dataStore(apiUrl + "locations"),
        sortList: banhji.source.sortList,
        obj: {
            contactIds: [],
            licenseID: 0,
            locationID: []
        },
        company: banhji.institute,
        displayDate: "",
        sorter: "month",
        as_of: new Date(),
        totalAmount: 0,
        exArray: [],
        pageLoad: function() {
            this.search();
            this.set("haveBloc", false);
        },
        sorterChanges: function() {
            var today = new Date(),
                sdate = "",
                edate = "",
                sorter = this.get("sorter");

            switch (sorter) {
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
        licenseChange: function(e) {
            var data = e.data;
            var license = this.licenseDS.at(e.sender.selectedIndex - 1);
            this.set("licenseSelect", license);
            this.blocDS.filter({
                field: "branch_id",
                value: license.id
            });
            this.set("haveBloc", true);
        },
        search: function() {
            var self = this,
                para = [],
                obj = this.get("obj"),
                start = this.get("sdate"),
                end = this.get("edate"),
                displayDate = "";
            license = this.get("licenseSelect"),
                bloc = this.get("blocSelect");

            if (license) {
                para.push({
                    field: "branch_id",
                    value: license.id
                });
            }

            if (bloc) {
                para.push({
                    field: "location_id",
                    value: bloc.id
                });
            }

            //Customer
            if (obj.contactIds.length > 0) {
                var contactIds = [];
                $.each(obj.contactIds, function(index, value) {
                    contactIds.push(value);
                });
                para.push({
                    field: "contact_id",
                    operator: "where_in",
                    value: contactIds
                });
            }

            //Dates
            if (start && end) {
                start = new Date(start);
                end = new Date(end);
                displayDate = "From " + kendo.toString(start, "dd-MM-yyyy") + " To " + kendo.toString(end, "dd-MM-yyyy");
                end.setDate(end.getDate() + 1);

                para.push({
                    field: "issued_date >=",
                    value: kendo.toString(start, "yyyy-MM-dd")
                });
                para.push({
                    field: "issued_date <",
                    value: kendo.toString(end, "yyyy-MM-dd")
                });
            } else if (start) {
                start = new Date(start);
                displayDate = "On " + kendo.toString(start, "dd-MM-yyyy");

                para.push({
                    field: "issued_date",
                    value: kendo.toString(start, "yyyy-MM-dd")
                });
            } else if (end) {
                end = new Date(end);
                displayDate = "As Of " + kendo.toString(end, "dd-MM-yyyy");
                end.setDate(end.getDate() + 1);

                para.push({
                    field: "issued_date <",
                    value: kendo.toString(end, "yyyy-MM-dd")
                });
            } else {

            }
            this.set("displayDate", displayDate);
            this.dataSource.query({
                filter: para
            }).then(function() {
                var view = self.dataSource.view();

                var amount = 0;
                $.each(view, function(index, value) {
                    amount += value.amount;
                });

                self.set("totalAmount", kendo.toString(amount, banhji.locale == "km-KH" ? "c0" : "c", banhji.locale));
            });
            this.dataSource.bind("requestEnd", function(e) {
                if (e.type == "read") {
                    var response = e.response,
                        balanceRec = 0;
                    self.exArray = [];

                    self.exArray.push({
                        cells: [{
                            value: self.company.name,
                            textAlign: "center",
                            colSpan: 4
                        }]
                    });
                    self.exArray.push({
                        cells: [{
                            value: "Cash Receipt by Sources Detail",
                            bold: true,
                            fontSize: 20,
                            textAlign: "center",
                            colSpan: 4
                        }]
                    });
                    if (self.displayDate) {
                        self.exArray.push({
                            cells: [{
                                value: self.displayDate,
                                textAlign: "center",
                                colSpan: 4
                            }]
                        });
                    }
                    self.exArray.push({
                        cells: [{
                            value: "",
                            colSpan: 4
                        }]
                    });
                    self.exArray.push({
                        cells: [{
                                value: "Customer Name",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Date",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Reference",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Amount",
                                background: "#496cad",
                                color: "#ffffff"
                            }
                        ]
                    });
                    for (var i = 0; i < response.results.length; i++) {
                        self.exArray.push({
                            cells: [{
                                    value: response.results[i].payment,
                                    bold: true,
                                },
                                {
                                    value: ""
                                },
                                {
                                    value: ""
                                },
                                {
                                    value: ""
                                }
                            ]
                        });
                        for (var j = 0; j < response.results[i].line.length; j++) {
                            balanceRec += response.results[i].line[j].amount;
                            self.exArray.push({
                                cells: [{
                                        value: response.results[i].line[j].name
                                    },
                                    {
                                        value: response.results[i].line[j].date
                                    },
                                    {
                                        value: response.results[i].line[j].number
                                    },
                                    {
                                        value: kendo.parseFloat(response.results[i].line[j].amount)
                                    }
                                ]
                            });
                        }
                        self.exArray.push({
                            cells: [{
                                value: "",
                                colSpan: 4
                            }]
                        });
                    }
                }
            });
        },
        printGrid: function() {
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
                '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />' +
                '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
                '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/responsive.css">' +
                '<link href="<?php echo base_url(); ?>assets/invoice/invoice.css" rel="stylesheet" />' +
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
                '</style><style type="text/css" media="print"> @page { size: portrait; margin:1mm; }' +
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
                '}' +
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
            setTimeout(function() {
                win.print();
                win.close();
            }, 2000);
        },
        ExportExcel: function() {
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
                        }
                    ],
                    title: "Cash Receipt by Sources",
                    rows: this.exArray
                }]
            });
            //save the file as Excel file with extension xlsx
            kendo.saveAs({
                dataURI: workbook.toDataURL(),
                fileName: "CashReceiptSources.xlsx"
            });
        }
    });
    banhji.importContact = kendo.observable({
        lang: langVM,
        dataSource: dataStore(apiUrl + "imports/wcontact"),
        onSelected: function(e) {
            $('li.k-file').remove();
            var files = e.files;
            var reader = new FileReader();
            banhji.importContact.dataSource.data([]);
            reader.onload = function() {
                var data = reader.result;
                var result = {};
                var workbook = XLSX.read(data, {
                    type: 'binary'
                });
                workbook.SheetNames.forEach(function(sheetName) {
                    if (sheetName == 'contact') {
                        var roa = XLSX.utils.sheet_to_row_object_array(workbook.Sheets[sheetName]);
                        if (roa.length > 0) {
                            result[sheetName] = roa;
                            for (var i = 0; i < roa.length; i++) {
                                banhji.importContact.dataSource.add(roa[i]);
                            }
                        }
                    }
                });
            }
            reader.readAsBinaryString(files[0].rawFile);
        },
        save: function() {
            var self = this;
            if (banhji.importContact.dataSource.data().length === 0) {
                var notifi = $("#ntf1").data("kendoNotification");
                notifi.hide();
                notifi.error(this.lang.lang.error_message);
            } else {
                $("#loadImport").css("display", "block");
                banhji.importContact.dataSource.sync();
                banhji.importContact.dataSource.bind("requestEnd", function(e) {
                    if (e.response) {
                        var notifi = $("#ntf1").data("kendoNotification");
                        notifi.hide();
                        notifi.success(self.lang.lang.success_message);
                        $("#loadImport").css("display", "none");
                        $('li.k-file').remove();
                        banhji.importContact.dataSource.data([]);
                    }
                });
                banhji.importContact.dataSource.bind("error", function(e) {
                    var notifi = $("#ntf1").data("kendoNotification");
                    notifi.hide();
                    notifi.error(this.lang.lang.error_message);
                    $("#loadImport").css("display", "none");
                    $('li.k-file').remove();
                    banhji.importContact.dataSource.data([]);
                });
            }
        }
    });
    banhji.importItem = kendo.observable({
        lang: langVM,
        dataSource: dataStore(apiUrl + "imports/meter"),
        onSelected: function(e) {
            $('li.k-file').remove();
            var files = e.files;
            var reader = new FileReader();
            banhji.importItem.dataSource.data([]);
            reader.onload = function() {
                var data = reader.result;
                var result = {};
                var workbook = XLSX.read(data, {
                    type: 'binary'
                });
                workbook.SheetNames.forEach(function(sheetName) {
                    if (sheetName == 'meter') {
                        var roa = XLSX.utils.sheet_to_row_object_array(workbook.Sheets[sheetName]);
                        if (roa.length > 0) {
                            result[sheetName] = roa;
                            for (var i = 0; i < roa.length; i++) {
                                banhji.importItem.dataSource.add(roa[i]);
                            }
                        }
                    }
                });
            }
            reader.readAsBinaryString(files[0].rawFile);
        },
        save: function() {
            var self = this;
            if (banhji.importItem.dataSource.data().length === 0) {
                var notifi = $("#ntf1").data("kendoNotification");
                notifi.hide();
                notifi.error(this.lang.lang.error_message);
            } else {
                $("#loadImport").css("display", "block");
                banhji.importItem.dataSource.sync();
                banhji.importItem.dataSource.bind("requestEnd", function(e) {
                    if (e.response) {
                        var notifi = $("#ntf1").data("kendoNotification");
                        notifi.hide();
                        notifi.success(self.lang.lang.success_message);
                        $("#loadImport").css("display", "none");
                        $('li.k-file').remove();
                        banhji.importItem.dataSource.data([]);
                    }
                });
                banhji.importItem.dataSource.bind("error", function(e) {
                    var notifi = $("#ntf1").data("kendoNotification");
                    notifi.hide();
                    notifi.error(self.lang.lang.error_message);
                    $("#loadImport").css("display", "none");
                    $('li.k-file').remove();
                    banhji.importItem.dataSource.data([]);
                });
            }
        }
    });
    banhji.importProptery = kendo.observable({
        lang: langVM,
        dataSource: dataStore(apiUrl + "imports/property"),
        onSelected: function(e) {
            $('li.k-file').remove();
            var files = e.files;
            var reader = new FileReader();
            banhji.importProptery.dataSource.data([]);
            reader.onload = function() {
                var data = reader.result;
                var result = {};
                var workbook = XLSX.read(data, {
                    type: 'binary'
                });
                workbook.SheetNames.forEach(function(sheetName) {
                    if (sheetName == 'property') {
                        var roa = XLSX.utils.sheet_to_row_object_array(workbook.Sheets[sheetName]);
                        if (roa.length > 0) {
                            result[sheetName] = roa;
                            for (var i = 0; i < roa.length; i++) {
                                banhji.importProptery.dataSource.add(roa[i]);
                            }
                        }
                    }
                });
            }
            reader.readAsBinaryString(files[0].rawFile);
        },
        save: function() {
            var self = this;
            if (banhji.importProptery.dataSource.data().length === 0) {
                var notifi = $("#ntf1").data("kendoNotification");
                notifi.hide();
                notifi.error(this.lang.lang.error_message);
            } else {
                $("#loadImport").css("display", "block");
                banhji.importProptery.dataSource.sync();
                banhji.importProptery.dataSource.bind("requestEnd", function(e) {
                    if (e.response) {
                        var notifi = $("#ntf1").data("kendoNotification");
                        notifi.hide();
                        notifi.success(self.lang.lang.success_message);
                        $("#loadImport").css("display", "none");
                        $('li.k-file').remove();
                        self.dataSource.data([]);

                    }
                });
                banhji.importProptery.dataSource.bind("error", function(e) {
                    var notifi = $("#ntf1").data("kendoNotification");
                    notifi.hide();
                    notifi.error(self.lang.lang.error_message);
                    $("#loadImport").css("display", "none");
                    $('li.k-file').remove();
                    banhji.importProptery.dataSource.data([]);
                });
            }
        }
    });
    banhji.importView = kendo.observable({
        lang: langVM,
        contact: banhji.importContact,
        item: banhji.importItem,
        property: banhji.importProptery,
        locationDS: dataStore(apiUrl + "imports/location"),
        onLocationSelected: function(e) {
            $('li.k-file').remove();
            var self = this;
            var files = e.files;
            var reader = new FileReader();
            this.locationDS.data([]);
            reader.onload = function() {
                var data = reader.result;
                var result = {};
                var workbook = XLSX.read(data, {
                    type: 'binary'
                });
                workbook.SheetNames.forEach(function(sheetName) {
                    if (sheetName == 'location') {
                        var roa = XLSX.utils.sheet_to_row_object_array(workbook.Sheets[sheetName]);
                        if (roa.length > 0) {
                            result[sheetName] = roa;
                            for (var i = 0; i < roa.length; i++) {
                                self.locationDS.add(roa[i]);
                            }
                        }
                    }
                });
            }
            reader.readAsBinaryString(files[0].rawFile);
        },
        locationSave: function() {
            var self = this;
            if (this.locationDS.data().length === 0) {
                var notifi = $("#ntf1").data("kendoNotification");
                notifi.hide();
                notifi.error(this.lang.lang.error_message);
            } else {
                $("#loadImport").css("display", "block");
                this.locationDS.sync();
                this.locationDS.bind("requestEnd", function(e) {
                    if (e.response) {
                        var notifi = $("#ntf1").data("kendoNotification");
                        notifi.hide();
                        notifi.success(self.lang.lang.success_message);
                        $("#loadImport").css("display", "none");
                        $('li.k-file').remove();
                        self.locationDS.data([]);
                    }
                });
                this.locationDS.bind("error", function(e) {
                    var notifi = $("#ntf1").data("kendoNotification");
                    notifi.hide();
                    notifi.error(self.lang.lang.error_message);
                    $("#loadImport").css("display", "none");
                    $('li.k-file').remove();
                    self.locationDS.data([]);
                });
            }
        },
        subLocationDS: dataStore(apiUrl + "imports/sublocation"),
        onSubLocationSelected: function(e) {
            $('li.k-file').remove();
            var self = this;
            var files = e.files;
            var reader = new FileReader();
            this.subLocationDS.data([]);
            reader.onload = function() {
                var data = reader.result;
                var result = {};
                var workbook = XLSX.read(data, {
                    type: 'binary'
                });
                workbook.SheetNames.forEach(function(sheetName) {
                    if (sheetName == 'sublocation') {
                        var roa = XLSX.utils.sheet_to_row_object_array(workbook.Sheets[sheetName]);
                        if (roa.length > 0) {
                            result[sheetName] = roa;
                            for (var i = 0; i < roa.length; i++) {
                                self.subLocationDS.add(roa[i]);
                            }
                        }
                    }
                });
            }
            reader.readAsBinaryString(files[0].rawFile);
        },
        subLocationSave: function() {
            var self = this;
            if (this.subLocationDS.data().length === 0) {
                var notifi = $("#ntf1").data("kendoNotification");
                notifi.hide();
                notifi.error(this.lang.lang.error_message);
            } else {
                $("#loadImport").css("display", "block");
                this.subLocationDS.sync();
                this.subLocationDS.bind("requestEnd", function(e) {
                    if (e.response) {
                        var notifi = $("#ntf1").data("kendoNotification");
                        notifi.hide();
                        notifi.success(self.lang.lang.success_message);
                        $("#loadImport").css("display", "none");
                        $('li.k-file').remove();
                        self.subLocationDS.data([]);
                    }
                });
                this.subLocationDS.bind("error", function(e) {
                    var notifi = $("#ntf1").data("kendoNotification");
                    notifi.hide();
                    notifi.error(self.lang.lang.error_message);
                    $("#loadImport").css("display", "none");
                    $('li.k-file').remove();
                    self.subLocationDS.data([]);
                });
            }
        },
        boxDS: dataStore(apiUrl + "imports/box"),
        onBoxSelected: function(e) {
            $('li.k-file').remove();
            var self = this;
            var files = e.files;
            var reader = new FileReader();
            this.boxDS.data([]);
            reader.onload = function() {
                var data = reader.result;
                var result = {};
                var workbook = XLSX.read(data, {
                    type: 'binary'
                });
                workbook.SheetNames.forEach(function(sheetName) {
                    if (sheetName == 'box') {
                        var roa = XLSX.utils.sheet_to_row_object_array(workbook.Sheets[sheetName]);
                        if (roa.length > 0) {
                            result[sheetName] = roa;
                            for (var i = 0; i < roa.length; i++) {
                                self.boxDS.add(roa[i]);
                            }
                        }
                    }
                });
            }
            reader.readAsBinaryString(files[0].rawFile);
        },
        boxSave: function() {
            var self = this;
            if (this.boxDS.data().length === 0) {
                var notifi = $("#ntf1").data("kendoNotification");
                notifi.hide();
                notifi.error(this.lang.lang.error_message);
            } else {
                $("#loadImport").css("display", "block");
                this.boxDS.sync();
                this.boxDS.bind("requestEnd", function(e) {
                    if (e.response) {
                        var notifi = $("#ntf1").data("kendoNotification");
                        notifi.hide();
                        notifi.success(self.lang.lang.success_message);
                        $("#loadImport").css("display", "none");
                        $('li.k-file').remove();
                        self.boxDS.data([]);
                    }
                });
                this.boxDS.bind("error", function(e) {
                    var notifi = $("#ntf1").data("kendoNotification");
                    notifi.hide();
                    notifi.error(self.lang.lang.error_message);
                    $("#loadImport").css("display", "none");
                    $('li.k-file').remove();
                    self.boxDS.data([]);
                });
            }
        },
        cancel: function(e) {
            this.contact.dataSource.data([]);
            this.item.dataSource.data([]);
            this.property.dataSource.cancelChanges();
            banhji.router.navigate("/");
        }
    });
    //Backup Block//
    banhji.Backup = kendo.observable({
        lang: langVM,
        institute_id: banhji.institute.id,
        user_id: banhji.userData.id,
        pageLoad: function() {}
    });
    /*************************
     * Water Section     * 
     **************************/
    banhji.DashBoard = kendo.observable({
        lang: langVM,
        dataSource: new kendo.data.DataSource({
            transport: {
                read: {
                    url: baseUrl + 'api/waterdash/license',
                    type: "GET",
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
            change: function(e) {
                var vm = banhji.wDashboard;
                var sale = 0,
                    usage = 0,
                    user = 0,
                    deposit = 0;
                $.each(this.data(), function(index, value) {
                    sale += value.sale;
                    usage += value.usage;
                    user += value.activeCustomer;
                    deposit += value.deposit;
                });
                banhji.wDashBoard.set('totalSale', kendo.toString(sale, banhji.locale == "km-KH" ? "c0" : "c", banhji.locale));
                banhji.wDashBoard.set('totalUsage', usage);
                banhji.wDashBoard.set('totalUser', user);
                banhji.wDashBoard.set('totalDeposit', kendo.toString(deposit, banhji.locale == "km-KH" ? "c0" : "c", banhji.locale));
                banhji.wDashBoard.set('avgUsage', usage / user);
            },
            batch: true,
            serverFiltering: true,
            serverPaging: true,
            pageSize: 100
        }),
        graphDS: new kendo.data.DataSource({
            transport: {
                read: {
                    url: apiUrl + 'waterdash/graph',
                    type: "GET",
                    headers: banhji.header,
                    dataType: 'json'
                },
                parameterMap: function(options, operation) {
                    if (operation === 'read') {
                        return {
                            page: options.page,
                            filter: options.filter
                        };
                    }
                }
            },
            schema: {
                data: 'results',
                total: 'count'
            },
            // group: {
            //  field: 'month',
            //  aggregates: [
            //    {field: 'amount', aggregate: 'sum'}
            //  ]
            // },
            batch: true,
            serverFiltering: true,
            serverPaging: true,
            pageSize: 1000
        }),
        backupdbDS: dataStore(apiUrl + "localsync"),
        invoice: 0,
        activeCust: 0,
        invCust: 0,
        overDue: 0,
        totalCust: 0,
        voidCust: 0,
        totalAmount: 0,
        dashSource: new kendo.data.DataSource({
            transport: {
                read: {
                    url: baseUrl + 'api/waterdash/board',
                    type: "GET",
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
            change: function(e) {
                var vm = banhji.wDashboard;
                var totalCust = 0,
                    invCust = 0,
                    overDue = 0,
                    voided = 0,
                    invoice = 0,
                    amount = 0,
                    activeCust = 0,
                    inActiveCust = 0;
                $.each(this.data(), function(index, value) {
                    activeCust += value.activeCustomer;
                    totalCust += value.totalCustomer;
                    invCust += value.invoiceCust;
                    overDue += value.overDue;
                    invoice += value.totalInvoice;
                    inActiveCust += value.inActiveCustomer;
                    voided += value.void;
                    amount += value.total;
                });
                banhji.wDashBoard.set('activeCust', activeCust);
                banhji.wDashBoard.set('inActiveCust', inActiveCust);
                banhji.wDashBoard.set('invoice', invoice);
                banhji.wDashBoard.set('invCust', invCust);
                banhji.wDashBoard.set('overDue', overDue);
                banhji.wDashBoard.set('totalCust', totalCust);
                banhji.wDashBoard.set('voidCust', voided);
                banhji.wDashBoard.set('totalAmount', kendo.toString(amount, banhji.locale == "km-KH" ? "c0" : "c", banhji.locale));
            },
            batch: true,
            serverFiltering: true,
            serverPaging: true,
            pageSize: 100
        }),
        totalSale: 0,
        totalUsage: 0,
        totalUser: 0,
        totalDeposit: 0,
        avgUsage: 0
    });
    banhji.waterCenter = kendo.observable({
        lang: langVM,
        summaryDS: dataStore(apiUrl + "transactions"),
        noteDS: dataStore(apiUrl + 'notes'),
        attachmentDS: dataStore(apiUrl + "attachments"),
        meterDS: dataStore(apiUrl + "meters"),
        contactTypeDS: banhji.source.customerTypeDS,
        graphDS: new kendo.data.DataSource({
            transport: {
                read: {
                    url: apiUrl + 'waterdash/usage',
                    type: "GET",
                    headers: banhji.header,
                    dataType: 'json'
                },
                parameterMap: function(options, operation) {
                    if (operation === 'read') {
                        return {
                            limit: options.take,
                            page: options.page,
                            filter: options.filter
                        };
                    }
                }
            },
            schema: {
                data: 'results',
                total: 'count'
            },
            // group: {
            //  field: 'month',
            //  aggregates: [
            //    {field: 'amount', aggregate: 'sum'}
            //  ]
            // },
            batch: true,
            serverFiltering: true,
            serverPaging: true,
            pageSize: 1000
        }),
        contactDS: new kendo.data.DataSource({
            transport: {
                read: {
                    url: apiUrl + "choulr/contact",
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
            sort: {
                field: "id",
                dir: "desc"
            },
            batch: true,
            serverFiltering: true,
            serverSorting: true,
            serverPaging: true,
            page: 1,
            pageSize: 100
        }),
        ownerDS: new kendo.data.DataSource({
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
            filter: [{
                    field: "use_water",
                    value: 1
                },
                {
                    field: "parent_id",
                    operation: "where_related",
                    model: "contact_type",
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
        meter_visible: false,
        readingVM: banhji.reading,
        installmentVM: banhji.installment,
        invoiceVM: banhji.invoice,
        currencyDS: banhji.source.currencyDS,
        sortList: banhji.source.sortList,
        sorter: "all",
        sdate: "",
        edate: "",
        obj: {
            id: 0
        },
        objMeter: null,
        note: "",
        searchText: "",
        contact_type_id: null,
        currency_id: 0,
        balance: 0,
        deposit: 0,
        outInvoice: 0,
        overInvoice: 0,
        currencyCode: "",
        user_id: banhji.source.user_id,
        exportEXCEL: function() {},
        pageLoad: function(id) {
            this.contactDS.fetch();
            this.loadSummary();
        },
        sorterChanges: function() {
            var today = new Date(),
                sdate = "",
                edate = "",
                sorter = this.get("sorter");

            switch (sorter) {
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
        setCurrencyCode: function() {
            var code = "",
                obj = this.get("obj");
            $.each(banhji.source.currencyRateDS.data(), function(index, value) {
                if (value.locale == obj.locale) {
                    code = value.currency[0].code;
                    return false;
                }
            });

            this.set("currencyCode", code);
        },
        loadObj: function(id) {
            var self = this;

            this.ownerDS.query({
                filter: {
                    field: "id",
                    value: id
                },
                page: 1,
                pageSize: 100
            }).then(function() {
                var view = self.ownerDS.view();

                if (view.length > 0) {
                    self.set("obj", view[0]);
                    self.loadData();
                }
            });
        },
        loadData: function() {
            var obj = this.get("obj");
            this.loadSummary(obj.id);
            this.setCurrencyCode();
            this.attachmentDS.filter({
                field: "contact_id",
                value: obj.id
            });
            this.noteDS.query({
                filter: {
                    field: "contact_id",
                    value: obj.id
                },
                sort: {
                    field: "noted_date",
                    dir: "desc"
                },
                page: 1,
                pageSize: 10
            });
        },
        //Upload
        onSelect: function(e) {
            // Array with information about the uploaded files
            var self = this,
                files = e.files,
                obj = this.get("obj");

            if (obj.id > 0) {
                // Check the extension of each file and abort the upload if it is not .jpg
                $.each(files, function(index, value) {
                    if (value.extension.toLowerCase() === ".jpg" ||
                        value.extension.toLowerCase() === ".jpeg" ||
                        value.extension.toLowerCase() === ".tiff" ||
                        value.extension.toLowerCase() === ".png" ||
                        value.extension.toLowerCase() === ".gif" ||
                        value.extension.toLowerCase() === ".pdf") {

                        var key = 'ATTACH_' + banhji.institute.id + "_" + Math.floor(Math.random() * 100000000000000001) + '_' + value.name;
                        self.attachmentDS.add({
                            user_id: self.get("user_id"),
                            contact_id: obj.id,
                            type: "Contact",
                            name: value.name,
                            description: "",
                            key: key,
                            url: banhji.s3 + key,
                            size: value.size,
                            created_at: new Date(),
                            file: value.rawFile
                        });
                    } else {
                        alert("This type of file is not allowed to attach.");
                    }
                });
            } else {
                alert("Please select a customer!");
            }
        },
        removeFile: function(e) {
            var data = e.data;
            if (confirm(banhji.source.confirmMessage)) {
                this.attachmentDS.remove(data);
                this.attachmentDS.sync();
            }
        },
        uploadFile: function() {
            $.each(this.attachmentDS.data(), function(index, value) {
                if (!value.id) {
                    var params = {
                        Body: value.file,
                        Key: value.key
                    };
                    bucket.upload(params, function(err, data) {});
                }
            });
            this.attachmentDS.sync();
            var saved = false;
            this.attachmentDS.bind("requestEnd", function(e) {
                //Delete File
                if (e.type == "destroy") {
                    if (saved == false && e.response) {
                        saved = true;
                        var response = e.response.results;
                        $.each(response, function(index, value) {
                            var params = {
                                //Bucket: 'STRING_VALUE', /* required */
                                Delete: { /* required */
                                    Objects: [ /* required */ {
                                            Key: value.data.key /* required */
                                        }
                                        /* more items */
                                    ]
                                }
                            };
                            bucket.deleteObjects(params, function(err, data) {});
                        });
                    }
                }
            });
        },
        //Summary
        loadContact: function(id) {
            var self = this;

            this.contactDS.query({
                filter: [{
                    field: "id",
                    value: id
                }],
                page: 1,
                pageSize: 50
            }).then(function(e) {
                var view = self.contactDS.data();

                if (view.length > 0) {
                    self.set("obj", view[0]);
                    self.loadData();
                }
            });
        },
        loadSummary: function(id) {
            var self = this,
                obj = this.get("obj");
            this.summaryDS.query({
                filter: [{
                        field: "contact_id",
                        value: obj.id
                    },
                    {
                        field: "type",
                        operator: "where_in",
                        value: ["Utility_Deposit", "Utility_Invoice"]
                    },
                    {
                        field: "status",
                        operator: "where_in",
                        value: [0, 2]
                    }
                ],
                sort: {
                    field: "issued_date",
                    dir: "desc"
                }
            }).then(function() {
                var view = self.summaryDS.view(),
                    deposit = 0,
                    open = 0,
                    over = 0,
                    balance = 0,
                    today = new Date();

                $.each(view, function(index, value) {
                    if (value.type == "Utility_Deposit") {
                        deposit += kendo.parseFloat(value.amount);
                    } else {
                        balance += (kendo.parseFloat(value.amount) - kendo.parseFloat(value.deposit)) - kendo.parseFloat(value.amount_paid);
                        open++;
                        if (new Date(value.due_date) < today) {
                            over++;
                        }
                    }
                });
                self.set("deposit", kendo.toString(deposit, obj.locale == "km-KH" ? "c0" : "c", obj.locale));
                self.set("outInvoice", kendo.toString(open, "n0"));
                self.set("overInvoice", kendo.toString(over, "n0"));
                self.set("balance", kendo.toString(balance, obj.locale == "km-KH" ? "c0" : "c", obj.locale));
            });
        },
        loadBalance: function() {
            $("#tabTxn").click();

            var obj = this.get("obj");
            this.invoiceVM.dataSource.query({
                filter: [{
                        field: "contact_id",
                        value: obj.id
                    },
                    {
                        field: "type",
                        value: "Utility_Invoice"
                    },
                    {
                        field: "status",
                        operator: "where_in",
                        value: [0, 2]
                    }
                ],
                sort: [{
                        field: "issued_date",
                        dir: "desc"
                    },
                    {
                        field: "id",
                        dir: "desc"
                    }
                ],
                page: 1,
                pageSize: 10
            });
        },
        loadOverInvoice: function() {
            $("#tabTxn").click();

            var obj = this.get("obj");
            this.invoiceVM.dataSource.query({
                filter: [{
                        field: "contact_id",
                        value: obj.id
                    },
                    {
                        field: "type",
                        value: "Utility_Invoice"
                    },
                    {
                        field: "status",
                        operator: "where_in",
                        value: [0, 2]
                    },
                    {
                        field: "due_date <",
                        value: kendo.toString(new Date(), "yyyy-MM-dd")
                    }
                ],
                sort: [{
                        field: "issued_date",
                        dir: "desc"
                    },
                    {
                        field: "id",
                        dir: "desc"
                    }
                ],
                page: 1,
                pageSize: 10
            });
        },
        loadTransaction: function() {
            if (this.invoiceVM.dataSource.total() == 0) {
                this.searchTransaction();
            }
        },
        loadReading: function() {
            var that = this,
                objMeter = this.get("objMeter");
            if (this.readingVM.dataSource.total() == 0) {
                if (objMeter) {
                    this.readingVM.set('NumberSR', objMeter.meter_number);
                    this.readingVM.dataSource.query({
                        filter: {
                            field: 'meter_id',
                            value: objMeter.id
                        }
                    }).then(function(e) {
                        var last = that.readingVM.dataSource.data()[0];
                        that.readingVM.set('previousSR', last.current);
                        that.set("miniMonthofS", last.month_of);
                    });
                } else {
                    if (objMeter.id) {
                        var meterIds = [];
                        $.each(this.meterDS.data(), function(index, value) {
                            meterIds.push(value.id);
                        });
                        this.readingVM.dataSource.filter({
                            field: 'meter_id',
                            operator: 'where_in',
                            value: meterIds
                        });
                    }
                }
            }
        },
        loadInstallment: function() {
            var objMeter = this.get("objMeter");

            if (objMeter && this.installmentVM.dataSource.total() == 0) {
                this.installmentVM.dataSource.filter({
                    field: 'meter_id',
                    value: objMeter.id
                });
            }
        },
        propertyID: 0,
        selectedRow: function(e) {
            $("#tabMS").click();
            var data = e.data,
                self = this;
            this.set('meter_visible', true);
            this.set('propertyID', data.id);
            this.meterDS.query({
                    filter: [{
                        field: "property_id",
                        value: data.id
                    }, {
                        field: "reactive_status",
                        value: 0
                    }]
                })
                .then(function(e) {
                    var meters = self.meterDS.data();
                    if (meters.length > 0) {
                        // if(meters.length > 1) {
                        //  var meterIds = [];
                        //  $.each(meters, function(index, value) {
                        //    meterIds.push(value.id);
                        //  });
                        //  self.readingVM.dataSource.filter({field: 'meter_id', operator: 'where_in', value: meterIds});
                        // } else {
                        //  self.readingVM.dataSource.filter({field: 'meter_id', value: meters[0].id});
                        // }
                        self.graphDS.filter({
                            field: 'meter_id',
                            value: meters[0].id
                        });
                        // self.invoiceVM.dataSource.filter({field: 'contact_id', value: data.contact.id});
                    }
                });
            let currency = banhji.source.currencyList.filter(function(elem, i, array) {
                return elem.locale === data.contact.locale;
            });
            data.contact.currency = currency[0];

            this.set("obj", data.contact);
            banhji.meter.contact = data.contact;
            this.loadData();
        },
        miniMonthofS: "<?php echo date('Y-m-d'); ?>",
        onSelectedMeter: function(e) {
            $("#tabMS").click();
            var data = e.data;

            this.set("objMeter", data);
            this.graphDS.filter({
                field: 'meter_id',
                value: e.data.id
            });
            this.invoiceVM.dataSource.data([]);
            this.readingVM.dataSource.data([]);
            this.installmentVM.dataSource.data([]);
        },
        goMeter: function() {
            banhji.meter.set("contact", this.get("obj"));
            banhji.meter.set("propertyID", this.get("propertyID"));
            banhji.router.navigate("/meter");
        },
        goDeposit: function() {
            banhji.customerDeposit.set("contact", this.get("obj"));
            banhji.router.navigate("/customer_deposit");
        },
        search: function() {
            var self = this,
                para = [],
                searchText = this.get("searchText"),
                contact_type_id = this.get("contact_type_id");

            if (searchText) {
                var textParts = searchText.replace(/([a-z]+)/i, "$1 ").split(/[^0-9a-z]+/ig);

                para.push({
                    field: "name",
                    operator: "like",
                    value: searchText
                }, {
                    field: "code",
                    operator: "or_where",
                    value: textParts[1]
                }, {
                    field: "abbr",
                    operator: "or_where",
                    value: searchText
                });
            }
            this.contactDS.filter(para);

            //Clear search filters
            //self.set("searchText", "");
            self.set("contact_type_id", 0);
        },
        searchTransaction: function() {
            var self = this,
                start = kendo.toString(this.get("sdate"), "yyyy-MM-dd"),
                end = kendo.toString(this.get("edate"), "yyyy-MM-dd"),
                para = [],
                obj = this.get("obj"),
                objMeter = this.get("objMeter");

            if (obj.id > 0) {
                para.push({
                    field: "contact_id",
                    value: obj.id
                });

                //Dates
                if (start && end) {
                    para.push({
                        field: "issued_date >=",
                        value: start
                    });
                    para.push({
                        field: "issued_date <=",
                        value: end
                    });
                } else if (start) {
                    para.push({
                        field: "issued_date",
                        value: start
                    });
                } else if (end) {
                    para.push({
                        field: "issued_date <=",
                        value: end
                    });
                } else {

                }

                this.invoiceVM.dataSource.query({
                    filter: para,
                    sort: [{
                            field: "issued_date",
                            dir: "desc"
                        },
                        {
                            field: "id",
                            dir: "desc"
                        }
                    ],
                    page: 1,
                    pageSize: 10
                });
            }
        },
        //Note
        saveNoteEnter: function(e) {
            e.preventDefault();
            this.saveNote();
        },
        saveNote: function() {
            var obj = this.get("obj");
            if (obj.id > 0 && this.get("note") !== "") {
                this.noteDS.insert(0, {
                    contact_id: obj.id,
                    note: this.get("note"),
                    noted_date: new Date(),
                    created_by: this.get("user_id"),
                    creator: ""
                });
                this.noteDS.sync();
                this.set("note", "");
            } else {
                alert("Please select a customer and Memo is required");
            }
        },
        goEdit: function() {
            var obj = this.get("obj");
            if (obj !== null && obj.id !== 0) {
                //window.open('<?php echo base_url(); ?>rrd#/customer/'+obj.id,'_self');
                banhji.router.navigate('/customer/' + obj.id);
            } else {
                alert("Please select a customer.");
            }
        },
        payInvoice: function(e) {
            var data = e.data;

            if (obj !== null) {
                banhji.router.navigate('/receipt');
                banhji.Receipt.loadInvoice(data.id);
            } else {
                alert(banhji.source.selectCustomerMessage);
            }
        },
    });
    //Customer
    banhji.customer = kendo.observable({
        lang: langVM,
        dataSource: dataStore(apiUrl + "contacts"),
        propertyDS: dataStore(apiUrl + "properties"),
        proDS: dataStore(apiUrl + "properties"),
        patternDS: dataStore(apiUrl + "contacts"),
        numberDS: dataStore(apiUrl + "contacts"),
        deleteDS: dataStore(apiUrl + "transactions"),
        existingDS: dataStore(apiUrl + "contacts"),
        contactPersonDS: dataStore(apiUrl + "contact_persons"),
        paymentTermDS: banhji.source.paymentTermDS,
        paymentMethodDS: banhji.source.paymentMethodDS,
        countryDS: banhji.source.countryDS,
        currencyDS: new kendo.data.DataSource({
            data: banhji.source.currencyList,
            filter: {
                field: "status",
                value: 1
            }
        }),
        contactTypeDS: new kendo.data.DataSource({
            data: banhji.source.contactTypeList,
            filter: {
                field: "parent_id",
                value: 1
            } //Customer
        }),
        arDS: new kendo.data.DataSource({
            data: banhji.source.accountList,
            filter: [{
                    field: "account_type_id",
                    value: 12
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
        raDS: new kendo.data.DataSource({
            data: banhji.source.accountList,
            filter: {
                logic: "and",
                filters: [{
                        field: "status",
                        value: 1
                    },
                    {
                        logic: "or",
                        filters: [{
                                field: "account_type_id",
                                value: 35
                            },
                            {
                                field: "account_type_id",
                                value: 39
                            }
                        ]
                    }
                ]
            },
            sort: {
                field: "number",
                dir: "asc"
            }
        }),
        depositDS: new kendo.data.DataSource({
            data: banhji.source.accountList,
            filter: {
                logic: "and",
                filters: [{
                        field: "status",
                        value: 1
                    },
                    {
                        logic: "or",
                        filters: [{
                                field: "account_type_id",
                                value: 25
                            },
                            {
                                field: "account_type_id",
                                value: 30
                            }
                        ]
                    }
                ]
            },
            sort: {
                field: "number",
                dir: "asc"
            }
        }),
        tradeDiscountDS: new kendo.data.DataSource({
            data: banhji.source.accountList,
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
            }
        }),
        settlementDiscountDS: new kendo.data.DataSource({
            data: banhji.source.accountList,
            filter: [{
                    field: "id",
                    value: 99
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
        taxItemDS: new kendo.data.DataSource({
            data: banhji.source.taxList,
            filter: {
                logic: "or",
                filters: [{
                        field: "tax_type_id",
                        value: 3
                    }, //Customer Tax
                    {
                        field: "tax_type_id",
                        value: 9
                    }
                ]
            },
            sort: [{
                    field: "tax_type_id",
                    dir: "asc"
                },
                {
                    field: "name",
                    dir: "asc"
                }
            ]
        }),
        genders: banhji.source.genderList,
        statusList: banhji.source.statusList,
        confirmMessage: banhji.source.confirmMessage,
        isEdit: false,
        isProtected: false,
        obj: null,
        saveClose: false,
        showConfirm: false,
        notDuplicateNumber: true,
        phFullname: "Customer Name ...",
        contact_type_id: 0,
        utility: null,
        waterUse: false,
        waterCode: false,
        licenseDS: dataStore(apiUrl + "branches"),
        licenseDSA: dataStore(apiUrl + "branches"),
        numberDSA: dataStore(apiUrl + "activate_water"),
        contactID: 0,
        propertyVisible: false,
        pageLoad: function(id, contact_type_id) {
            if (id) {
                this.set("isEdit", true);
                this.loadObj(id, contact_type_id);
                var self = this;

                this.set("propertyVisible", true);
                this.propertyDS.filter({
                    field: "contact_id",
                    value: id
                });
                this.set("contactID", id);
            } else {
                if (this.get("isEdit") || this.dataSource.total() == 0) {
                    this.addEmpty();
                }
                this.set("propertyVisible", true);
            }
        },
        addProperty: function(e) {
            var self = this;
            if (this.get("pName") && this.get("pCode") && this.get("pAbbr")) {
                if (this.get("contactID") != 0) {
                    this.savePro(this.get("contactID"));
                } else {
                    this.proDS.insert(0, {
                        contact_id: "",
                        code: this.get("pCode"),
                        abbr: this.get("pAbbr"),
                        name: this.get("pName"),
                        address: this.get("pAddress")
                    });
                    this.propertyDS.insert(0, {
                        contact_id: "",
                        code: this.get("pCode"),
                        abbr: this.get("pAbbr"),
                        name: this.get("pName"),
                        address: this.get("pAddress")
                    });
                    this.set("pCode", "");
                    this.set("pAbbr", "");
                    this.set("pName", "");
                    this.set("pAddress", "");
                }
            } else {
                var notificat = $("#ntf1").data("kendoNotification");
                notificat.hide();
                notificat.error(this.lang.lang.field_required_message);
            }
        },
        savePro: function(contact_id) {
            this.proDS.data([]);
            this.proDS.insert(0, {
                contact_id: contact_id,
                code: this.get("pCode"),
                abbr: this.get("pAbbr"),
                name: this.get("pName"),
                address: this.get("pAddress")
            });
            this.proDS.sync();
            this.proDS.bind("requestEnd", function(e) {
                if (e.type != 'read' && e.response) {
                    var notificat = $("#ntf1").data("kendoNotification");
                    notificat.hide();
                    notificat.success(self.lang.lang.success_message);
                    self.set("pCode", "");
                    self.set("pAbbr", "");
                    self.set("pName", "");
                    self.set("pAddress", "");
                    self.propertyDS.filter({
                        field: "contact_id",
                        value: self.get("contactID")
                    });
                }
            });
            this.proDS.bind("error", function(e) {
                var notificat = $("#ntf1").data("kendoNotification");
                notificat.hide();
                notificat.error(self.lang.lang.error_message);
            });
        },
        setProperty: function(contact_id) {
            var self = this;
            $.each(this.proDS.data(), function(index, value) {
                value.set("contact_id", contact_id);
            });
            this.proDS.sync();
            this.proDS.bind("requestEnd", function(e) {
                if (e.type != 'read' && e.response) {
                    self.set("pCode", "");
                    self.set("pAbbr", "");
                    self.set("pName", "");
                    self.set("pAddress", "");
                    self.proDS.data([]);
                }
            });
        },
        licenseChange: function(e) {
            var obj = this.get("utility"),
                self = this;
            if (obj.branch_id) {
                this.licenseDSA.query({
                    filter: {
                        field: "id",
                        value: obj.branch_id.id
                    },
                    page: 1,
                    take: 1
                }).then(function(e) {
                    var view = self.licenseDSA.view();
                    console.log(view[0].abbr);
                    self.goNumber(view[0].abbr, view[0].id);
                });
            }
        },
        goNumber: function(abbr, branchID) {
            var self = this,
                obj = this.get("utility"),
                FirstABBR = abbr;
            this.numberDSA.query({
                filter: {
                    field: "abbr",
                    value: abbr
                },
                sort: {
                    field: "code",
                    dir: "desc"
                },
                page: 1,
                take: 1
            }).then(function(e) {
                var view = self.numberDSA.view();
                var lastNo;

                if (view.length > 0) {
                    obj.set("abbr", view[0].abbr);
                    if (self.numberDSA._total > 0) {
                        lastNo = kendo.parseInt(view[0].code) + 1;
                    } else {
                        lastNo = 1;
                    }
                    obj.set("code", lastNo);
                    if (lastNo) {
                        lastNo = view[0].abbr + "-" + lastNo
                        obj.set("codeabbr", lastNo);
                    }
                } else {
                    obj.set("abbr", FirstABBR);
                    obj.set("code", 1);
                    obj.set("codeabbr", FirstABBR + "-" + 1);
                }
                obj.set("branch_id", branchID);
            });
        },
        //Contact Person
        addEmptyContactPerson: function() {
            var obj = this.get("obj");

            this.contactPersonDS.add({
                contact_id: obj.id,
                prefix: "",
                name: "",
                department: "",
                phone: "",
                email: ""
            });
        },
        deleteContactPerson: function(e) {
            if (confirm("Are you sure, you want to delete it?")) {
                var d = e.data,
                    obj = this.contactPersonDS.getByUid(d.uid);
                this.contactPersonDS.remove(obj);
            }
        },
        //Map
        loadMap: function() {
            var obj = this.get("obj"),
                lat = kendo.parseFloat(obj.latitute),
                lng = kendo.parseFloat(obj.longtitute);
            if (lat && lng) {
                var myLatLng = {
                    lat: lat,
                    lng: lng
                };
                var mapOptions = {
                    zoom: 17,
                    center: myLatLng,
                    mapTypeControl: false,
                    zoomControl: false,
                    scaleControl: false,
                    streetViewControl: false
                };
                var map = new google.maps.Map(document.getElementById('map'), mapOptions);
                var marker = new google.maps.Marker({
                    position: myLatLng,
                    map: map,
                    title: obj.number
                });
            }
        },
        copyBillTo: function() {
            var obj = this.get("obj");
            obj.set("ship_to", obj.bill_to);
        },
        //Number        
        checkExistingNumber: function() {
            var self = this,
                para = [],
                obj = this.get("obj");
            if (obj.number !== "") {
                if (obj.isNew() == false) {
                    para.push({
                        field: "id",
                        operator: "where_not_in",
                        value: [obj.id]
                    });
                }
                para.push({
                    field: "abbr",
                    value: obj.abbr
                });
                para.push({
                    field: "number",
                    value: obj.number
                });
                para.push({
                    field: "contact_type_id",
                    value: obj.contact_type_id
                });
                this.existingDS.query({
                    filter: para,
                    page: 1,
                    pageSize: 1
                }).then(function(e) {
                    var view = self.existingDS.view();

                    if (view.length > 0) {
                        self.set("notDuplicateNumber", false);
                    } else {
                        self.set("notDuplicateNumber", true);
                    }
                });
            }
        },
        generateNumber: function() {
            var self = this,
                obj = this.get("obj");
            this.numberDS.query({
                filter: [{
                    field: "contact_type_id",
                    value: obj.contact_type_id
                }],
                sort: {
                    field: "number",
                    dir: "desc"
                },
                page: 1,
                pageSize: 1
            }).then(function() {
                var view = self.numberDS.view();
                var lastNo = 0;
                if (view.length > 0) {
                    lastNo = kendo.parseInt(view[0].number);
                }
                lastNo++;
                obj.set("number", kendo.toString(lastNo, "00000"));
            });
        },
        checkExistingTxn: function() {
            var self = this,
                obj = this.get("obj");
            this.deleteDS.query({
                filter: {
                    field: "contact_id",
                    value: obj.id
                },
                page: 1,
                pageSize: 1
            }).then(function(e) {
                var view = self.deleteDS.view();
                if (view.length > 0) {
                    self.set("isProtected", true);
                } else {
                    self.set("isProtected", false);
                }
            });
        },
        //Obj
        loadObj: function(id, contact_type_id) {
            var self = this,
                para = [];
            if (id > 0) {
                para.push({
                    field: "id",
                    value: id
                });
            }
            if (contact_type_id) {
                para.push({
                    field: "contact_type_id",
                    value: contact_type_id
                });
                para.push({
                    field: "is_pattern",
                    value: 1
                });
            }
            this.dataSource.query({
                filter: para,
                page: 1,
                pageSize: 100
            }).then(function(e) {
                var view = self.dataSource.view();
                self.set("obj", view[0]);
                self.loadMap();
                self.checkExistingTxn();
            });
            this.contactPersonDS.filter({
                field: "contact_id",
                value: id
            });
        },
        addEmpty: function() {
            this.dataSource.data([]);
            this.contactPersonDS.data([]);
            this.set("isEdit", false);
            this.set("isProtected", false);
            this.set("notDuplicateNumber", true);
            this.set("obj", null);
            this.dataSource.insert(0, {
                "country_id": 0,
                "user_id": 0,
                "contact_type_id": 4,
                "abbr": "",
                "number": "",
                "surname": "",
                "name": "",
                "gender": "",
                "phone": "",
                "email": "",
                "company": "",
                "vat_no": "",
                "memo": "",
                "city": "",
                "post_code": "",
                "address": "",
                "bill_to": "",
                "ship_to": "",
                "latitute": "",
                "longtitute": "",
                "credit_limit": 0,
                "locale": banhji.locale,
                "payment_term_id": 0,
                "payment_method_id": 0,
                "registered_date": new Date(),
                "account_id": 0,
                "ra_id": 0,
                "tax_item_id": 0,
                "deposit_account_id": 0,
                "trade_discount_id": 0,
                "settlement_discount_id": 0,
                "is_pattern": 0,
                "status": 1,
                "use_water": 1
            });
            var obj = this.dataSource.at(0);
            this.set("obj", obj);
            this.typeChanges();
        },
        objSync: function() {
            var self = this,
                UTL = this.get("utility");
            var dfd = $.Deferred();
            this.dataSource.sync();
            this.dataSource.bind("requestEnd", function(e) {
                if (e.response) {
                    //UTL.set("contact_id", e.response.results[0].id);
                    var notificat = $("#ntf1").data("kendoNotification");
                    notificat.hide();
                    notificat.success(self.lang.lang.success_message);
                    dfd.resolve(e.response.results);
                }
            });
            this.dataSource.bind("error", function(e) {
                var notificat = $("#ntf1").data("kendoNotification");
                notificat.hide();
                notificat.error(self.lang.lang.error_message);
                dfd.reject(e.errorThrown);
            });
            return dfd;
        },
        save: function() {
            var self = this,
                obj = this.get("obj");
            //Edit Mode
            if (this.get("isEdit")) {
                //Contact Person has changes
                if (this.contactPersonDS.hasChanges()) {
                    obj.set("dirty", true);
                }
            }
            //Save Obj
            this.objSync()
                .then(function(data) { //Success
                    if (self.contactPersonDS.data().length > 0) {
                        //Contact Person
                        $.each(self.contactPersonDS.data(), function(index, value) {
                            value.set("contact_id", data[0].id);
                        });
                        self.contactPersonDS.sync();
                    }
                    self.setProperty(data[0].id);
                    return data;
                }, function(reason) { //Error
                    var notificat = $("#ntf1").data("kendoNotification");
                    notificat.hide();
                    notificat.error(self.lang.lang.error_message);
                }).then(function(result) {
                    var notificat = $("#ntf1").data("kendoNotification");
                    notificat.hide();
                    notificat.success(self.lang.lang.success_message);
                    //Save Close
                    self.cancel();
                });
        },
        cancel: function() {
            this.dataSource.data([]);
            this.contactPersonDS.data([]);
            this.proDS.data([]);
            this.set("contact_type_id", 0);
            window.history.back();
            banhji.userManagement.removeMultiTask("customer");
        },
        delete: function() {
            var obj = this.get("obj");
            this.set("showConfirm", false);
            if (!obj.is_system == 1) {
                if (this.get("isProtected")) {
                    alert("Sorry, this data is protected!");
                } else {
                    obj.set("deleted", 1);
                    this.dataSource.sync();
                    banhji.source.customerDS.fetch();
                    window.history.back();
                }
            }
        },
        openConfirm: function() {
            this.set("showConfirm", true);
        },
        closeConfirm: function() {
            this.set("showConfirm", false);
        },
        //Pattern
        typeChanges: function(e) {
            var obj = this.get("obj");
            if (obj.contact_type_id && obj.isNew()) {
                this.applyPattern();
                this.generateNumber();
            }
        },
        applyPattern: function() {
            var self = this,
                obj = self.get("obj");

            this.patternDS.query({
                filter: [{
                        field: "contact_type_id",
                        value: obj.contact_type_id
                    },
                    {
                        field: "is_pattern",
                        value: 1
                    }
                ],
                page: 1,
                pageSize: 1
            }).then(function(data) {
                var view = self.patternDS.view(),
                    type = self.contactTypeDS.get(view[0].contact_type_id);
                if (view.length > 0) {
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
    banhji.LeaseUnitCenter = kendo.observable({
        lang                : langVM,
        leaseUnitDS         : dataStore(apiUrl + "choulr/lease_unit"),
        pageLoad            : function(id) {
        },
        singleLeaseUnitDS   : dataStore(apiUrl + "choulr/lease_unit"),
        singlePropertyDS    : dataStore(apiUrl + "choulr/property"),
        leaseUnitID         : "",
        selectedRow         : function(e){
            var data = e.data,
                self = this;
            this.set("leaseUnitID", data.id);
            this.singleLeaseUnitDS.query({
                filter: {field: "id", value: data.id},
                pageSize: 1
            }).then(function(e){
                var single = self.singleLeaseUnitDS.view();
                if(single.length > 0){
                    self.set("luName", single[0].name);
                    self.set("luStatus", single[0].status);
                }
            });
            this.singlePropertyDS.query({
                filter: {field: "id", value: data.property_id},
                pageSize : 1
            }).then(function(e){
                var property = self.singlePropertyDS.view();
                if(property.length > 0){
                    self.set("luType", property[0].type);
                    // self.set("luRentTye", property[0].);
                }
            });
            // this.meterDS.query({
            //         filter: [{
            //             field: "property_id",
            //             value: data.id
            //         }, {
            //             field: "reactive_status",
            //             value: 0
            //         }]
            //     })
            //     .then(function(e) {
            //         var meters = self.meterDS.data();
            //         if (meters.length > 0) {
            //             self.graphDS.filter({
            //                 field: 'meter_id',
            //                 value: meters[0].id
            //             });
            //         }
            //     });
            // let currency = banhji.source.currencyList.filter(function(elem, i, array) {
            //     return elem.locale === data.contact.locale;
            // });
            // data.contact.currency = currency[0];

            // this.set("obj", data.contact);
            // banhji.meter.contact = data.contact;
        }
    });
    banhji.LeaseUnit = kendo.observable({
        lang: langVM,
        luPropertyDS: dataStore(apiUrl + "choulr/property"),
        luStatusList: [{
                id: 1,
                name: "Rented"
            },
            {
                id: 0,
                name: "Vacant"
            },
            {
                id: 2,
                name: "Maintenance"
            }
        ],
        luAbbr: null,
        pageLoad: function(id) {
            if (id) {
                this.loadObj(id);
            } else {
                this.addEmpty();
            }
        },
        loadObj: function(id) {
            
        },
        addEmpty: function() {
        },
        leaseUnitDS: dataStore(apiUrl + "choulr/lease_unit"),
        areaDS        : dataStore(apiUrl + "choulr/area"),
        zoneDS        : dataStore(apiUrl + "choulr/area"),
        subZoneDS        : dataStore(apiUrl + "choulr/area"),
        haveProperty            : false,
        haveArea                : false,
        haveZone                : false,
        luProperyChanges: function(e) {
            this.set("luAbbr", this.luPropertyDS.data()[e.sender.selectedIndex - 1].abbr);
            var self = this;
            this.leaseUnitDS.query({
                filter: [{
                    field: "property_id",
                    value: this.get("luProperty")
                }],
                sort: {
                    field: "id",
                    dir: "desc"
                },
                page: 1,
                pageSize: 1
            }).then(function(e) {
                var view = self.leaseUnitDS.view();
                if (view.length > 0) {
                    var NUM = parseInt(view[0].number) + 1;
                    self.set("luNumber", NUM);
                } else {
                    self.set("luNumber", 1);
                }
            });
            this.areaDS.query({
                filter: [
                    {field: "property_id", value: this.get("luProperty")},
                    {field: "main_location", value: 0},
                    {field: "sub_location", value: 0}
                ]
            });
            this.set("haveProperty", true);
        },
        areaChange                 : function(e){
            var self = this;
            this.zoneDS.query({
                filter: [
                    {field: "main_location", value: this.get("luArea")},
                    {field: "sub_location", value: 0}
                ]
            }).then(function(e){
                if(self.zoneDS.data().length > 0){
                    self.set("haveArea", true);
                }else{
                    self.set("haveArea", false);
                }
            });
        },
        zoneChange                 : function(e){
            var self = this;
            this.subZoneDS.query({
                filter: [
                    {field: "sub_location", value: this.get("luZone")}
                ]
            }).then(function(e){
                if(self.subZoneDS.data().length > 0){
                    self.set("haveZone", true);
                }else{
                    self.set("haveZone", false);
                }
            });
        },
        checkLeaseUnitDS: dataStore(apiUrl + "choulr/lease_unit"),
        checkExistingNumber: function() {
            var self = this;
            var lastNum = this.get("luNumber");
            if (this.get("luNumber") !== "") {
                this.checkLeaseUnitDS.query({
                    filter: [{
                            field: "property_id",
                            value: this.get("luProperty")
                        },
                        {
                            field: "number",
                            value: this.get("luNumber")
                        }
                    ],
                    sort: {
                        field: "id",
                        dir: "desc"
                    },
                    page: 1,
                    pageSize: 1
                }).then(function(e) {
                    var view = self.checkLeaseUnitDS.view();

                    if (view.length > 0) {
                        var notificat = $("#ntf1").data("kendoNotification");
                        notificat.hide();
                        notificat.error("Number Duplicate");
                        self.set("luNumber", lastNum);
                    }
                });
            }
        },
        categoryDS                  : dataStore(apiUrl + "choulr/category"),
        amenityitems                : [],
        amenityDS                   : dataStore(apiUrl + "choulr/amenity"),
        spaceitems                : [],
        spaceDS                   : dataStore(apiUrl + "choulr/space"),
        saveUnitDS: dataStore(apiUrl + "choulr/lease_unit"),
        save                   : function(){
            var self = this;
            this.saveUnitDS.data([]);
            this.saveUnitDS.add({
                property_id : this.get("luProperty"),
                name        : this.get("luName"),
                code        : this.get("luNumber"),
                abbr        : this.get("luAbbr"),
                status      : this.get("luStatus"),
                register_date : this.get("luRegisterDate"),
                area_id     : this.get("luArea"),
                zone_id     : this.get("luZone"),
                sub_zone_id : this.get("luSubZone"),
                category_id : this.get("luCategory"),
                total_area  : this.get("luTotalArea"),
                water_meter_id: 0,
                electricity_id : 0,
                img1        : this.get("img1"),
                img2        : this.get("img2"),
                img3        : this.get("img3"),
                img4        : this.get("img4"),
                img5        : this.get("img5"),
                img6        : this.get("img6")
            });
            this.saveUnitDS.sync();
            this.saveUnitDS.bind("requestEnd", function(e){
                var notificat = $("#ntf1").data("kendoNotification");
                    notificat.hide();
                    notificat.success(self.lang.lang.success_message);
                self.set("luProperty", "");
                self.set("luName", "");
                self.set("luNumber", "");
                self.set("luAbbr", "");
                self.set("luStatus", "");
                self.set("luRegisterDate", "");
                self.set("luArea", "");
                self.set("luZone", "");
                self.set("luSubZone", "");
                self.set("luCategory", "");
                self.set("luTotalArea", "");
                self.set("img1", "");
                self.set("img2", "");
                self.set("img3", "");
                self.set("img4", "");
                self.set("img5", "");
                self.set("img6", "");
            });
        }
    });
    banhji.UtilityCenter = kendo.observable({
        lang: langVM,
        meterDS: dataStore(apiUrl + "choulr/meter"),
        pageLoad: function(id) {

        },
        search: function() {
            var self = this,
                para = [],
                searchText = this.get("searchText"),
                contact_type_id = this.get("contact_type_id");
            if (searchText) {
                var textParts = searchText.replace(/([a-z]+)/i, "$1 ").split(/[^0-9a-z]+/ig);

                para.push({
                    field: "name",
                    operator: "like",
                    value: searchText
                }, {
                    field: "code",
                    operator: "or_where",
                    value: textParts[1]
                }, {
                    field: "abbr",
                    operator: "or_where",
                    value: searchText
                });
            }
            this.meterDS.filter(para);
        },
        cencel      : function(){
            window.history.back();
        }
    });
    //End Customer
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
        //Water
        setting: new kendo.Layout("#setting", {
            model: banhji.setting
        }),
        waterCenter: new kendo.Layout("#waterCenter", {
            model: banhji.waterCenter
        }),
        property: new kendo.Layout("#property", {
            model: banhji.property
        }),
        meter: new kendo.Layout("#waterAddMeter", {
            model: banhji.meter
        }),
        ActivateMeter: new kendo.Layout("#ActivateMeter", {
            model: banhji.ActivateMeter
        }),
        plan: new kendo.Layout("#plan", {
            model: banhji.plan
        }),
        reading: new kendo.Layout("#Reading", {
            model: banhji.reading
        }),
        EditReading: new kendo.Layout("#EditReading", {
            model: banhji.EditReading
        }),
        customerDeposit: new kendo.Layout("#customerDeposit", {
            model: banhji.customerDeposit
        }),

        addAccountingprefix: new kendo.Layout("#addAccountingprefix", {
            model: banhji.addAccountingprefix
        }),
        waterImport: new kendo.Layout("#waterImport", {
            model: banhji.waterImport
        }),
        runBill: new kendo.Layout("#runBill", {
            model: banhji.runBill
        }),
        printBill: new kendo.Layout("#printBill", {
            model: banhji.printBill
        }),
        InvoicePrint: new kendo.Layout("#InvoicePrint", {
            model: banhji.InvoicePrint
        }),
        Receipt: new kendo.Layout("#Receipt", {
            model: banhji.Receipt
        }),
        Reports: new kendo.Layout("#Reports", {
            model: banhji.Reports
        }),
        Reconcile: new kendo.Layout("#Reconcile", {
            model: banhji.reconcileVM
        }),
        Reorder: new kendo.Layout("#Reorder", {
            model: banhji.Reorder
        }),
        //custom form
        invoiceCustom: new kendo.Layout("#invoiceCustom", {
            model: banhji.invoiceCustom
        }),
        invoiceForm: new kendo.Layout("#invoiceForm", {
            model: banhji.invoiceCustom
        }),
        invoiceForm1: new kendo.Layout("#invoiceForm1", {
            model: banhji.invoiceCustom
        }),
        invoiceForm2: new kendo.Layout("#invoiceForm2", {
            model: banhji.invoiceCustom
        }),
        invoiceForm3: new kendo.Layout("#invoiceForm3", {
            model: banhji.invoiceCustom
        }),
        //Choulr
        Properties: new kendo.Layout("#Properties", {
            model: banhji.Properties
        }),
        LeaseUnitCenter: new kendo.Layout("#LeaseUnitCenter", {
            model: banhji.LeaseUnitCenter
        }),
        LeaseUnit: new kendo.Layout("#LeaseUnit", {
            model: banhji.LeaseUnit
        }),
        UtilityCenter: new kendo.Layout("#UtilityCenter", {
            model: banhji.UtilityCenter
        }),
        //Menu
        accountingMenu: new kendo.View("#accountingMenu", {
            model: langVM
        }),
        employeeMenu: new kendo.View("#employeeMenu", {
            model: langVM
        }),
        vendorMenu: new kendo.View("#vendorMenu", {
            model: langVM
        }),
        customerMenu: new kendo.View("#customerMenu", {
            model: langVM
        }),
        cashMenu: new kendo.View("#cashMenu", {
            model: langVM
        }),
        choulrMenu: new kendo.View("#choulrMenu", {
            model: langVM
        }),
        inventoryMenu: new kendo.View("#inventoryMenu", {
            model: langVM
        }),
        saleTaxMenu: new kendo.View("#saleTaxMenu", {
            model: langVM
        }),
        saleMenu: new kendo.View("#saleMenu", {
            model: langVM
        }),
        DashBoard: new kendo.View("#DashBoard", {
            model: banhji.DashBoard
        }),
        customer: new kendo.Layout("#customer", {
            model: banhji.customer
        }),
        Backup: new kendo.Layout("#Backup", {
            model: banhji.Backup
        }),
        //Report
        customerList: new kendo.Layout("#customerList", {
            model: banhji.customerList
        }),
        customerNoConnection: new kendo.Layout("#customerNoConnection", {
            model: banhji.customerNoConnection
        }),
        disconnectList: new kendo.Layout("#disconnectList", {
            model: banhji.disconnectList
        }),
        to_be_disconnectList: new kendo.Layout("#to_be_disconnectList", {
            model: banhji.to_be_disconnectList
        }),
        newCustomerList: new kendo.Layout("#newCustomerList", {
            model: banhji.newCustomerList
        }),
        miniUsageList: new kendo.Layout("#miniUsageList", {
            model: banhji.miniUsageList
        }),
        saleSummary: new kendo.Layout("#saleSummary", {
            model: banhji.saleSummary
        }),
        connectServiceRevenue: new kendo.Layout("#connectServiceRevenue", {
            model: banhji.connectServiceRevenue
        }),
        saleDetail: new kendo.Layout("#saleDetail", {
            model: banhji.saleDetail
        }),
        fineCollect: new kendo.Layout("#fineCollect", {
            model: banhji.fineCollect
        }),
        otherRevenues: new kendo.Layout("#otherRevenues", {
            model: banhji.otherRevenues
        }),
        accountReceivableList: new kendo.Layout("#accountReceivableList", {
            model: banhji.accountReceivableList
        }),
        agingSummary: new kendo.Layout("#agingSummary", {
            model: banhji.agingSummary
        }),
        customerDepositReport: new kendo.Layout("#customerDepositReport", {
            model: banhji.customerDepositReport
        }),
        agingDetail: new kendo.Layout("#agingDetail", {
            model: banhji.agingDetail
        }),
        customerBalanceSummary: new kendo.Layout("#customerBalanceSummary", {
            model: banhji.customerBalanceSummary
        }),
        customerBalanceDetail: new kendo.Layout("#customerBalanceDetail", {
            model: banhji.customerBalanceDetail
        }),
        cashReceiptSummary: new kendo.Layout("#cashReceiptSummary", {
            model: banhji.cashReceiptSummary
        }),
        cashReceiptSourceSummary: new kendo.Layout("#cashReceiptSourceSummary", {
            model: banhji.cashReceiptSourceSummary
        }),
        cashReceiptDetail: new kendo.Layout("#cashReceiptDetail", {
            model: banhji.cashReceiptDetail
        }),
        cashReceiptSourceDetail: new kendo.Layout("#cashReceiptSourceDetail", {
            model: banhji.cashReceiptSourceDetail
        }),
        imports: new kendo.Layout("#importView", {
            model: banhji.importView
        }),
        waterInvoice: new kendo.Layout("#waterInvoice", {
            model: banhji.waterInvoice
        })
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
                if (err) {} else {
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
        banhji.view.layout.showIn('#content', banhji.view.DashBoard);
        banhji.view.menu.showIn('#secondary-menu', banhji.view.choulrMenu);
        banhji.index.getLogo();
        banhji.index.pageLoad();
    });
    //Choulr
    banhji.router.route('/setting', function() {
        banhji.view.layout.showIn('#content', banhji.view.setting);
        banhji.view.layout.showIn('#menu', banhji.view.menu);
        banhji.view.menu.showIn('#secondary-menu', banhji.view.choulrMenu);
        var vm = banhji.setting;
        banhji.userManagement.addMultiTask("Setting", "setting", null);
        if (banhji.pageLoaded["setting"] == undefined) {
            banhji.pageLoaded["setting"] = true;
        }
        vm.pageLoad();
    });
    banhji.router.route('/lease_unit_center', function() {
        banhji.view.layout.showIn('#content', banhji.view.LeaseUnitCenter);
        banhji.view.layout.showIn('#menu', banhji.view.menu);
        banhji.view.menu.showIn('#secondary-menu', banhji.view.choulrMenu);
        var vm = banhji.LeaseUnitCenter;
        banhji.userManagement.addMultiTask("Lease Unit", "lease_unit_center", null);
        if (banhji.pageLoaded["lease_unit_center"] == undefined) {
            banhji.pageLoaded["lease_unit_center"] = true;
        }
        vm.pageLoad();
    });
    banhji.router.route('/utility_center', function() {
        banhji.view.layout.showIn('#content', banhji.view.UtilityCenter);
        banhji.view.layout.showIn('#menu', banhji.view.menu);
        banhji.view.menu.showIn('#secondary-menu', banhji.view.choulrMenu);
        var vm = banhji.UtilityCenter;
        banhji.userManagement.addMultiTask("Uitlity Center", "utility_center", null);
        if (banhji.pageLoaded["utility_center"] == undefined) {
            banhji.pageLoaded["utility_center"] = true;
        }
        vm.pageLoad();
    });
    banhji.router.route('/lease_unit(:/id)', function() {
        banhji.view.layout.showIn('#content', banhji.view.LeaseUnit);
        banhji.view.layout.showIn('#menu', banhji.view.menu);
        banhji.view.menu.showIn('#secondary-menu', banhji.view.choulrMenu);
        var vm = banhji.LeaseUnit;
        banhji.userManagement.addMultiTask("Lease Unit", "lease_unit_center", null);
        if (banhji.pageLoaded["lease_unit_center"] == undefined) {
            banhji.pageLoaded["lease_unit_center"] = true;
        }
        vm.pageLoad();
    });
    banhji.router.route("/customer(/:id)(/:is_pattern)", function(id, is_pattern) {
        banhji.accessMod.query({
            filter: {
                field: 'username',
                value: JSON.parse(localStorage.getItem('userData/user')).username
            }
        }).then(function(e) {
            var allowed = false;
            if (banhji.accessMod.data().length > 0) {
                for (var i = 0; i < banhji.accessMod.data().length; i++) {
                    if ("customer" == banhji.accessMod.data()[i].name.toLowerCase()) {
                        allowed = true;
                        break;
                    }
                }
            }
            if (allowed) {
                banhji.view.layout.showIn("#content", banhji.view.customer);
                kendo.fx($("#slide-form")).slideIn("down").play();
                var vm = banhji.customer;
                banhji.userManagement.addMultiTask("Customer", "customer", vm);
                if (banhji.pageLoaded["customer"] == undefined) {
                    banhji.pageLoaded["customer"] = true;
                    var validator = $("#example").kendoValidator({
                        rules: {
                            customRule1: function(input) {
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
                    $("#saveNew").click(function(e) {
                        e.preventDefault();
                        if (validator.validate()) {
                            vm.save();
                        } else {
                            $("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
                        }
                    });
                    $("#saveClose").click(function(e) {
                        e.preventDefault();
                        if (validator.validate()) {
                            vm.set("saveClose", true);
                            vm.save();
                        } else {
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
    //End Choulr
    banhji.router.route("/search_advanced", function() {
        if (!banhji.userManagement.getLogin()) {
            banhji.router.navigate('/manage');
        } else {
            var vm = banhji.searchAdvanced;
            banhji.view.layout.showIn("#content", banhji.view.searchAdvanced);
            if (banhji.pageLoaded["search_advanced"] == undefined) {
                banhji.pageLoaded["search_advanced"] = true;
                vm.contactTypeDS.read();
            }
            vm.pageLoad();
        }
    });
    /*************************
     *   Water Section   *
     **************************/
    banhji.router.route("/center(/:id)", function(id) {
        banhji.view.layout.showIn("#content", banhji.view.waterCenter);
        banhji.view.layout.showIn('#menu', banhji.view.menu);
        banhji.view.menu.showIn('#secondary-menu', banhji.view.choulrMenu);
        var vm = banhji.waterCenter;
        banhji.userManagement.addMultiTask("Water Center", "center", null);
        if (banhji.pageLoaded["water_center"] == undefined) {
            banhji.pageLoaded["water_center"] = true;
        }
        vm.pageLoad(id);
    });
    banhji.router.route("/meter(/:id)", function(id) {
        banhji.view.layout.showIn("#content", banhji.view.meter);
        banhji.view.layout.showIn('#menu', banhji.view.menu);
        banhji.view.menu.showIn('#secondary-menu', banhji.view.choulrMenu);
        var vm = banhji.meter;
        banhji.userManagement.addMultiTask("Add Meter", "meter", null);
        if (banhji.pageLoaded["meter"] == undefined) {
            banhji.pageLoaded["meter"] = true;
        }
        vm.pageLoad(id);
    });
    banhji.router.route("/activate_meter/:id", function(id) {
        banhji.view.layout.showIn("#content", banhji.view.ActivateMeter);
        banhji.view.layout.showIn('#menu', banhji.view.menu);
        banhji.view.menu.showIn('#secondary-menu', banhji.view.choulrMenu);
        var vm = banhji.ActivateMeter;
        banhji.userManagement.addMultiTask("Activate Meter", "activate_meter", null);
        if (banhji.pageLoaded["activate_meter"] == undefined) {
            banhji.pageLoaded["activate_meter"] = true;
        }
        vm.pageLoad(id);
    });
    banhji.router.route("/plan(/:id)", function(id) {
        banhji.view.layout.showIn("#content", banhji.view.plan);
        banhji.view.layout.showIn('#menu', banhji.view.menu);
        banhji.view.menu.showIn('#secondary-menu', banhji.view.choulrMenu);
        var vm = banhji.plan;
        banhji.userManagement.addMultiTask("Add Plan", "plan", null);
        if (banhji.pageLoaded["plan"] == undefined) {
            banhji.pageLoaded["plan"] = true;
        }
        vm.pageLoad(id);
    });
    banhji.router.route("/property(/:id)", function(id) {
        banhji.view.layout.showIn('#menu', banhji.view.menu);
        banhji.view.menu.showIn('#secondary-menu', banhji.view.choulrMenu);
        banhji.view.layout.showIn("#content", banhji.view.Properties);
        banhji.userManagement.addMultiTask("Properties", "property", null);
        if (banhji.pageLoaded["property"] == undefined) {
            banhji.pageLoaded["property"] = true;
        }
        var vm = banhji.Properties;
        vm.pageLoad(id);
    });
    banhji.router.route("/reading", function() {
        localforage.getItem('user')
            .then(function(data) {
                for (var i = 0; i < data.roles.length; i++) {
                    if ('reading' == data.roles[i].name) {
                        banhji.view.layout.showIn("#content", banhji.view.reading);
                        banhji.view.layout.showIn('#menu', banhji.view.menu);
                        banhji.view.menu.showIn('#secondary-menu', banhji.view.choulrMenu);
                        var vm = banhji.reading;
                        banhji.userManagement.addMultiTask("Reading", "reading", null);
                        if (banhji.pageLoaded["reading"] == undefined) {
                            banhji.pageLoaded["reading"] = true;
                        }
                        vm.pageLoad();
                        break;
                    }
                }
            });
    });
    banhji.router.route("/edit_reading", function() {
        banhji.view.layout.showIn("#content", banhji.view.EditReading);
        banhji.view.layout.showIn('#menu', banhji.view.menu);
        banhji.view.menu.showIn('#secondary-menu', banhji.view.choulrMenu);
        var vm = banhji.EditReading;
        banhji.userManagement.addMultiTask("Edit Reading", "Edit Reading", null);
        if (banhji.pageLoaded["edit_reading"] == undefined) {
            banhji.pageLoaded["edit_reading"] = true;
        }
        vm.pageLoad();
    });
    banhji.router.route("/import", function() {
        banhji.view.layout.showIn("#content", banhji.view.waterImport);
        banhji.view.layout.showIn('#menu', banhji.view.menu);
        banhji.view.menu.showIn('#secondary-menu', banhji.view.choulrMenu);
        var vm = banhji.waterImport;
        banhji.userManagement.addMultiTask("Import", "import", null);
        if (banhji.pageLoaded["import"] == undefined) {
            banhji.pageLoaded["import"] = true;
        }
        vm.pageLoad();
    });
    banhji.router.route("/run_bill", function() {
        localforage.getItem('user')
            .then(function(data) {
                for (var i = 0; i < data.roles.length; i++) {
                    if ('run_bill' == data.roles[i].name) {
                        banhji.view.layout.showIn("#content", banhji.view.runBill);
                        banhji.view.layout.showIn('#menu', banhji.view.menu);
                        banhji.view.menu.showIn('#secondary-menu', banhji.view.choulrMenu);
                        var vm = banhji.runBill;
                        banhji.userManagement.addMultiTask("Run Bill", "run_bill", null);
                        if (banhji.pageLoaded["run_bill"] == undefined) {
                            banhji.pageLoaded["run_bill"] = true;
                        }
                        break;
                    }
                }
            });
    });
    banhji.router.route("/print_bill", function() {
        localforage.getItem('user')
            .then(function(data) {
                for (var i = 0; i < data.roles.length; i++) {
                    if ('print_bill' == data.roles[i].name) {
                        banhji.view.layout.showIn("#content", banhji.view.printBill);
                        banhji.view.layout.showIn('#menu', banhji.view.menu);
                        banhji.view.menu.showIn('#secondary-menu', banhji.view.choulrMenu);
                        var vm = banhji.printBill;
                        banhji.userManagement.addMultiTask("Print Bill", "print_bill", null);
                        if (banhji.pageLoaded["print_bill"] == undefined) {
                            banhji.pageLoaded["print_bill"] = true;
                        }
                        vm.pageLoad();
                        break;
                    }
                }
            });
    });
    banhji.router.route("/invoice_print", function() {
        if (!banhji.userManagement.getLogin()) {
            banhji.router.navigate('/manage');
        } else {
            banhji.view.layout.showIn("#content", banhji.view.InvoicePrint);
            banhji.view.layout.showIn('#menu', banhji.view.menu);
            banhji.view.menu.showIn('#secondary-menu', banhji.view.choulrMenu);
            var vm = banhji.InvoicePrint;
            if (banhji.pageLoaded["invoice_print"] == undefined) {
                banhji.pageLoaded["invoice_print"] = true;
            }
            vm.pageLoad();
        }
    });
    banhji.router.route("/receipt", function() {
        localforage.getItem('user')
            .then(function(data) {
                for (var i = 0; i < data.roles.length; i++) {
                    if ('receipt' == data.roles[i].name) {
                        banhji.view.layout.showIn("#content", banhji.view.Receipt);
                        banhji.view.layout.showIn('#menu', banhji.view.menu);
                        banhji.view.menu.showIn('#secondary-menu', banhji.view.choulrMenu);
                        var vm = banhji.Receipt;
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
    banhji.router.route("/reconcile", function() {
        banhji.view.layout.showIn('#menu', banhji.view.menu);
        banhji.view.menu.showIn('#secondary-menu', banhji.view.choulrMenu);
        var vm = banhji.Reconcile;
        banhji.userManagement.addMultiTask("Reconcile", "reconcile", null);
        if (banhji.pageLoaded["reconcile"] == undefined) {
            banhji.pageLoaded["reconcile"] = true;
        }
        vm.pageLoad();
        if (banhji.Receipt.currencyDS.data().length == 0) {
            banhji.Receipt.currencyDS.read()
                .then(function(e) {
                    $.each(banhji.Receipt.currencyDS.data(), function(i, v) {
                        banhji.reconcileVM.currencyDS.push(v);
                    });
                    banhji.view.layout.showIn("#content", banhji.view.Reconcile);
                });
        } else {
            $.each(banhji.Receipt.currencyDS.data(), function(i, v) {
                banhji.reconcileVM.currencyDS.push(v);
            });
            banhji.view.layout.showIn("#content", banhji.view.Reconcile);
        }
    });
    banhji.router.route("/reports", function() {
        banhji.view.layout.showIn("#content", banhji.view.Reports);
        banhji.view.layout.showIn('#menu', banhji.view.menu);
        banhji.view.menu.showIn('#secondary-menu', banhji.view.choulrMenu);
        var vm = banhji.Reports;
        banhji.userManagement.addMultiTask("Reports", "reports", null);
        if (banhji.pageLoaded["reports"] == undefined) {
            banhji.pageLoaded["reports"] = true;
        }
        vm.pageLoad();
    });
    banhji.router.route("/customer_deposit(/:id)(/:is_recurring)", function(id, is_recurring) {
        banhji.view.layout.showIn("#content", banhji.view.customerDeposit);
        kendo.fx($("#slide-form")).slideIn("down").play();
        var vm = banhji.customerDeposit;
        banhji.userManagement.addMultiTask("Customer Deposit", "customer_deposit", vm);
        if (banhji.pageLoaded["customer_deposit"] == undefined) {
            banhji.pageLoaded["customer_deposit"] = true;
            var validator = $("#example").kendoValidator().data("kendoValidator");
            $("#saveNew").click(function(e) {
                e.preventDefault();
                if (validator.validate()) {
                    vm.save();
                } else {
                    $("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
                }
            });
            $("#saveClose").click(function(e) {
                e.preventDefault();
                if (validator.validate()) {
                    vm.set("saveClose", true);
                    vm.save();
                } else {
                    $("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
                }
            });
            $("#savePrint").click(function(e) {
                e.preventDefault();

                if (validator.validate()) {
                    vm.set("savePrint", true);
                    vm.save();
                } else {
                    $("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
                }
            });
            $("#saveRecurring").click(function(e) {
                e.preventDefault();
                if (validator.validate() && vm.validateRecurring()) {
                    vm.set("saveRecurring", true);
                    vm.save();
                } else {
                    $("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
                }
            });
        }
        vm.pageLoad(id, is_recurring);
    });
    banhji.router.route("/invoice_custom(/:id)", function(id) {
        if (!banhji.userManagement.getLogin()) {
            banhji.router.navigate('/manage');
        } else {
            banhji.view.layout.showIn("#content", banhji.view.invoiceCustom);
            kendo.fx($("#slide-form")).slideIn("down").play();
            var vm = banhji.invoiceCustom;
            if (banhji.pageLoaded["invoice_custom"] == undefined) {
                banhji.pageLoaded["invoice_custom"] = true;
                //Function write css to header
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
                var Href1 = '<?php echo base_url(); ?>assets/invoice/invoice.css';
                loadStyle(Href1);
            };
            vm.pageLoad(id);
        };
    });
    banhji.router.route("/utility_invoice/:id", function(id) {
        banhji.view.layout.showIn("#content", banhji.view.waterInvoice);
        banhji.view.layout.showIn('#menu', banhji.view.menu);
        banhji.view.menu.showIn('#secondary-menu', banhji.view.choulrMenu);
        var vm = banhji.waterInvoice;
        banhji.userManagement.addMultiTask("Water Invoice", "water_invoice", null);
        if (banhji.pageLoaded["water_invoice"] == undefined) {
            banhji.pageLoaded["water_invoice"] = true;
        }
        vm.pageLoad(id);
    });
    banhji.router.route("/add_accountingprefix(/:id)", function(id) {
        if (!banhji.userManagement.getLogin()) {
            banhji.router.navigate('/manage');
        } else {
            banhji.view.layout.showIn("#content", banhji.view.addAccountingprefix);
            kendo.fx($("#slide-form")).slideIn("down").play();
            var vm = banhji.addAccountingprefix;
            banhji.userManagement.addMultiTask("Add Accounting Prefix", "add_accountingprefix", null);
            if (banhji.pageLoaded["add_accountingprefix"] == undefined) {
                banhji.pageLoaded["add_accountingprefix"] = true;
                setTimeout(function() {
                    var validator = $("#example").kendoValidator().data("kendoValidator");
                    var notification = $("#notification").kendoNotification({
                        autoHideAfter: 5000,
                        width: 300,
                        height: 50
                    }).data('kendoNotification');
                    $("#saveNew").click(function(e) {
                        e.preventDefault();
                        if (validator.validate()) {
                            vm.save();
                            notification.success("Save Successful");
                        } else {
                            notification.error("Warning, please review it again!");
                        }
                    });
                    $("#saveClose").click(function(e) {
                        e.preventDefault();
                        if (validator.validate()) {
                            vm.save();
                            window.history.back();
                            notification.success("Save Successful");
                        } else {
                            notification.error("Warning, please review it again!");
                        }
                    });
                }, 2000);
            };
            vm.pageLoad(id);
        };
    });
    banhji.router.route("/reorder", function(id) {
        banhji.view.layout.showIn("#content", banhji.view.Reorder);
        banhji.view.layout.showIn('#menu', banhji.view.menu);
        banhji.view.menu.showIn('#secondary-menu', banhji.view.choulrMenu);
        var vm = banhji.Reorder;
        banhji.userManagement.addMultiTask("Route Management", "reorder", null);
        if (banhji.pageLoaded["reorder"] == undefined) {
            banhji.pageLoaded["reorder"] = true;
            var grid = $("#grid").kendoGrid({
                dataSource: vm.dataSource,
                autoBind: false,
                scrollable: false,
                columns: [{
                        field: "worder",
                        title: "Route ID"
                    },
                    {
                        field: "meter_number",
                        title: vm.lang.lang.number
                    },
                    {
                        field: "property_name",
                        title: vm.lang.lang.property_name
                    }
                ]
            }).data("kendoGrid");
            grid.table.kendoSortable({
                filter: ">tbody >tr",
                hint: $.noop,
                cursor: "move",
                placeholder: function(element) {
                    return element.clone().addClass("k-state-hover").css("opacity", 0.65);
                },
                container: "#grid tbody",
                change: function(e) {
                    var skip = grid.dataSource.skip(),
                        oldIndex = e.oldIndex + skip,
                        newIndex = e.newIndex,
                        data = grid.dataSource.data(),
                        dataItem = grid.dataSource.getByUid(e.item.data("uid"));
                    grid.dataSource.remove(dataItem);
                    grid.dataSource.insert(newIndex, dataItem);
                }
            });
        }
        vm.pageLoad();
    });
    banhji.router.route("/backup", function(id) {
        banhji.view.layout.showIn("#content", banhji.view.Backup);
        banhji.view.layout.showIn('#menu', banhji.view.menu);
        banhji.view.menu.showIn('#secondary-menu', banhji.view.choulrMenu);
        var vm = banhji.Backup;
        banhji.userManagement.addMultiTask("Backup", "backup", null);
        if (banhji.pageLoaded["backup"] == undefined) {
            banhji.pageLoaded["backup"] = true;
        }
        vm.pageLoad();
    });
    //////Report Router/////
    banhji.router.route("/customer_list", function() {
        if (!banhji.userManagement.getLogin()) {
            banhji.router.navigate('/manage');
        } else {
            banhji.view.layout.showIn("#content", banhji.view.customerList);
            banhji.view.layout.showIn('#menu', banhji.view.menu);
            banhji.view.menu.showIn('#secondary-menu', banhji.view.choulrMenu);

            var vm = banhji.customerList;
            banhji.userManagement.addMultiTask("Customer List", "customer_list", null);
            if (banhji.pageLoaded["customer_list"] == undefined) {
                banhji.pageLoaded["customer_list"] = true;
            }
            vm.pageLoad();
        }
    });
    banhji.router.route("/customer_no_connection", function() {
        if (!banhji.userManagement.getLogin()) {
            banhji.router.navigate('/manage');
        } else {
            banhji.view.layout.showIn("#content", banhji.view.customerNoConnection);
            banhji.view.layout.showIn('#menu', banhji.view.menu);
            banhji.view.menu.showIn('#secondary-menu', banhji.view.choulrMenu);

            var vm = banhji.customerNoConnection;
            banhji.userManagement.addMultiTask("Customer No Connection", "customer_no_connection", null);
            if (banhji.pageLoaded["customer_no_connection"] == undefined) {
                banhji.pageLoaded["customer_no_connection"] = true;

            }
            vm.pageLoad();
        }
    });
    banhji.router.route("/disconnect_list", function() {
        if (!banhji.userManagement.getLogin()) {
            banhji.router.navigate('/manage');
        } else {
            banhji.view.layout.showIn("#content", banhji.view.disconnectList);
            banhji.view.layout.showIn('#menu', banhji.view.menu);
            banhji.view.menu.showIn('#secondary-menu', banhji.view.choulrMenu);

            var vm = banhji.disconnectList;
            banhji.userManagement.addMultiTask("Disconnect List", "disconnect_list", null);
            if (banhji.pageLoaded["disconnect_list"] == undefined) {
                banhji.pageLoaded["disconnect_list"] = true;
            }
            vm.pageLoad();
        }
    });
    banhji.router.route("/to_be_disconnect_list", function() {
        if (!banhji.userManagement.getLogin()) {
            banhji.router.navigate('/manage');
        } else {
            to_be_disconnectList
            banhji.view.layout.showIn("#content", banhji.view.to_be_disconnectList);
            banhji.view.layout.showIn('#menu', banhji.view.menu);
            banhji.view.menu.showIn('#secondary-menu', banhji.view.choulrMenu);
            var vm = banhji.to_be_disconnectList;
            banhji.userManagement.addMultiTask("To Be Disconnect List", "to_be_disconnectList", null);
            if (banhji.pageLoaded["to_be_disconnectList"] == undefined) {
                banhji.pageLoaded["to_be_disconnectList"] = true;
            }
            vm.pageLoad();
        }
    });
    banhji.router.route("/new_customer_list", function() {
        if (!banhji.userManagement.getLogin()) {
            banhji.router.navigate('/manage');
        } else {
            banhji.view.layout.showIn("#content", banhji.view.newCustomerList);
            banhji.view.layout.showIn('#menu', banhji.view.menu);
            banhji.view.menu.showIn('#secondary-menu', banhji.view.choulrMenu);

            var vm = banhji.newCustomerList;
            banhji.userManagement.addMultiTask("New Customer List", "new_customer_list", null);
            if (banhji.pageLoaded["new_customer_list"] == undefined) {
                banhji.pageLoaded["new_customer_list"] = true;
            }
            vm.pageLoad();
        }
    });
    banhji.router.route("/mini_usage_list", function() {
        if (!banhji.userManagement.getLogin()) {
            banhji.router.navigate('/manage');
        } else {
            banhji.view.layout.showIn("#content", banhji.view.miniUsageList);
            banhji.view.layout.showIn('#menu', banhji.view.menu);
            banhji.view.menu.showIn('#secondary-menu', banhji.view.choulrMenu);
            var vm = banhji.miniUsageList;
            banhji.userManagement.addMultiTask("Minimum Water Usage List", "mini_usage_list", null);
            if (banhji.pageLoaded["mini_usage_list"] == undefined) {
                banhji.pageLoaded["mini_usage_list"] = true;
            }
            vm.pageLoad();
        }
    });
    banhji.router.route("/sale_summary", function() {
        if (!banhji.userManagement.getLogin()) {
            banhji.router.navigate('/manage');
        } else {
            banhji.view.layout.showIn("#content", banhji.view.saleSummary);
            var vm = banhji.saleSummary;
            banhji.userManagement.addMultiTask(" Water Sale Summary", "sale_summary", null);
            if (banhji.pageLoaded["sale_summary"] == undefined) {
                banhji.pageLoaded["sale_summary"] == true;
                vm.sorterChanges();
            }
            vm.pageLoad();
        }
    });
    banhji.router.route("/connect_service_revenue", function() {
        if (!banhji.userManagement.getLogin()) {
            banhji.router.navigate('/manage');
        } else {
            banhji.view.layout.showIn("#content", banhji.view.connectServiceRevenue);
            var vm = banhji.connectServiceRevenue;
            banhji.userManagement.addMultiTask("Connect Service Revenue", "connect_service_revenue", null);
            if (banhji.pageLoaded["connect_service_revenue"] == undefined) {
                banhji.pageLoaded["connect_service_revenue"] == true;
                vm.sorterChanges();
            }
            banhji.connectServiceRevenue.dataSource.bind('requestEnd', function(e) {
                if (e.response) {
                    banhji.connectServiceRevenue.set('count', e.response.count);
                    kendo.culture(banhji.locale);
                    banhji.connectServiceRevenue.set('total', kendo.toString(e.response.total, 'c2'));
                }
            });
            vm.pageLoad();
        }
    });
    banhji.router.route("/sale_detail", function() {
        if (!banhji.userManagement.getLogin()) {
            banhji.router.navigate('/manage');
        } else {
            banhji.view.layout.showIn("#content", banhji.view.saleDetail);
            var vm = banhji.saleDetail;
            banhji.userManagement.addMultiTask(" Water Sale Detail", "sale_detail", null);
            if (banhji.pageLoaded["sale_detail"] == undefined) {
                banhji.pageLoaded["sale_detail"] == true;
                vm.sorterChanges();
            }
            banhji.saleDetail.dataSource.bind('requestEnd', function(e) {
                if (e.response) {
                    banhji.saleDetail.set('count', e.response.count);
                    kendo.culture(banhji.locale);
                    banhji.saleDetail.set('total', kendo.toString(e.response.total, 'c2'));
                }
            });
            vm.pageLoad();
        }
    });
    banhji.router.route("/fine_collect", function() {
        if (!banhji.userManagement.getLogin()) {
            banhji.router.navigate('/manage');
        } else {
            banhji.view.layout.showIn("#content", banhji.view.fineCollect);
            var vm = banhji.fineCollect;
            banhji.userManagement.addMultiTask("Utibill Fine Collect", "fine_collect", null);
            if (banhji.pageLoaded["fine_collect"] == undefined) {
                banhji.pageLoaded["fine_collect"] == true;
                vm.sorterChanges();
            }
            banhji.fineCollect.dataSource.bind('requestEnd', function(e) {
                if (e.response) {
                    banhji.fineCollect.set('count', e.response.count);
                    kendo.culture(banhji.locale);
                    banhji.fineCollect.set('total', kendo.toString(e.response.total, 'c2'));
                }
            });
            vm.pageLoad();
        }
    });
    banhji.router.route("/other_revenues", function() {
        if (!banhji.userManagement.getLogin()) {
            banhji.router.navigate('/manage');
        } else {
            banhji.view.layout.showIn("#content", banhji.view.otherRevenues);
            banhji.view.layout.showIn('#menu', banhji.view.menu);
            banhji.view.menu.showIn('#secondary-menu', banhji.view.choulrMenu);
            var vm = banhji.otherRevenues;
            banhji.userManagement.addMultiTask("Other Revenues", "other_revenues", null);
            if (banhji.pageLoaded["other_revenues"] == undefined) {
                banhji.pageLoaded["other_revenues"] = true;
            }
            vm.pageLoad();
        }
    });
    banhji.router.route("/account_receivable_list", function() {
        if (!banhji.userManagement.getLogin()) {
            banhji.router.navigate('/manage');
        } else {
            banhji.view.layout.showIn("#content", banhji.view.accountReceivableList);
            var vm = banhji.accountReceivableList;
            banhji.userManagement.addMultiTask("Account Receivable Listing", "account_receivable_list", null);
            if (banhji.pageLoaded["account_receivable_list"] == undefined) {
                banhji.pageLoaded["account_receivable_list"] = true;
            }
            vm.pageLoad();
        }
    });
    banhji.router.route("/customer_aging_sum_list", function() {
        if (!banhji.userManagement.getLogin()) {
            banhji.router.navigate('/manage');
        } else {
            banhji.view.layout.showIn("#content", banhji.view.agingSummary);
            var vm = banhji.agingSummary;
            banhji.userManagement.addMultiTask("Receivable Aging Summary", "customer_aging_sum_list", null);
            if (banhji.pageLoaded["customer_aging_sum_list"] == undefined) {
                banhji.pageLoaded["customer_aging_sum_list"] = true;
            }
            vm.pageLoad();
        }
    });
    banhji.router.route("/customer_deposit_report", function() {
        if (!banhji.userManagement.getLogin()) {
            banhji.router.navigate('/manage');
        } else {
            banhji.view.layout.showIn("#content", banhji.view.customerDepositReport);
            var vm = banhji.customerDepositReport;
            banhji.userManagement.addMultiTask("Customer Deposit Report", "customer_deposit_report", null);
            if (banhji.pageLoaded["customer_deposit_report"] == undefined) {
                banhji.pageLoaded["customer_deposit_report"] = true;
                vm.sorterChanges();
            }
            vm.pageLoad();
        }
    });
    banhji.router.route("/customer_aging_detail", function() {
        if (!banhji.userManagement.getLogin()) {
            banhji.router.navigate('/manage');
        } else {
            banhji.view.layout.showIn("#content", banhji.view.agingDetail);
            var vm = banhji.agingDetail;
            banhji.userManagement.addMultiTask("Customer Aging Detail", "customer_aging_detail", null);
            if (banhji.pageLoaded["receivable_aging_detail"] == undefined) {
                banhji.pageLoaded["receivable_aging_detail"] = true;
            }
            vm.pageLoad();
        }
    });
    banhji.router.route("/customer_balance_summary", function() {
        if (!banhji.userManagement.getLogin()) {
            banhji.router.navigate('/manage');
        } else {
            banhji.view.layout.showIn("#content", banhji.view.customerBalanceSummary);
            var vm = banhji.customerBalanceSummary;
            banhji.userManagement.addMultiTask("Customer Balance Summary", "customer_balance_summary", null);
            if (banhji.pageLoaded["customer_balance_summary"] == undefined) {
                banhji.pageLoaded["customer_balance_summary"] = true;
            }
            vm.pageLoad();
        }
    });
    banhji.router.route("/customer_balance_detail", function() {
        if (!banhji.userManagement.getLogin()) {
            banhji.router.navigate('/manage');
        } else {
            var vm = banhji.customerBalanceDetail;
            banhji.userManagement.addMultiTask("Customer Balance Detail", "customer_balance_detail", null);
            banhji.view.layout.showIn("#content", banhji.view.customerBalanceDetail);
            if (banhji.pageLoaded["customer_balance_detail"] == undefined) {
                banhji.pageLoaded["customer_balance_detail"] = true;
            }
            vm.pageLoad();
        }
    });
    banhji.router.route("/cash_receipt_summary", function() {
        if (!banhji.userManagement.getLogin()) {
            banhji.router.navigate('/manage');
        } else {
            banhji.view.layout.showIn("#content", banhji.view.cashReceiptSummary);
            banhji.view.layout.showIn('#menu', banhji.view.menu);
            banhji.view.menu.showIn('#secondary-menu', banhji.view.choulrMenu);
            var vm = banhji.cashReceiptSummary;
            banhji.userManagement.addMultiTask("Cash Receipt Summary", "cash_receipt_summary", null);
            if (banhji.pageLoaded["cash_receipt_summary"] == undefined) {
                banhji.pageLoaded["cash_receipt_summary"] = true;
            }
            vm.pageLoad();
        }
    });
    banhji.router.route("/cash_receipt_source_summary", function() {
        if (!banhji.userManagement.getLogin()) {
            banhji.router.navigate('/manage');
        } else {
            banhji.view.layout.showIn("#content", banhji.view.cashReceiptSourceSummary);
            banhji.view.layout.showIn('#menu', banhji.view.menu);
            banhji.view.menu.showIn('#secondary-menu', banhji.view.choulrMenu);
            var vm = banhji.cashReceiptSourceSummary;
            banhji.userManagement.addMultiTask("Cash Receipt Source Summary", "cash_receipt_source_summary", null);
            if (banhji.pageLoaded["cash_receipt_source_summary"] == undefined) {
                banhji.pageLoaded["cash_receipt_source_summary"] = true;
            }
            vm.pageLoad();
        }
    });
    banhji.router.route("/cash_receipt_detail", function() {
        if (!banhji.userManagement.getLogin()) {
            banhji.router.navigate('/manage');
        } else {
            var vm = banhji.cashReceiptDetail;
            banhji.userManagement.addMultiTask("Cash Receipt Detail", "cash_receipt_detail", null);
            banhji.view.layout.showIn("#content", banhji.view.cashReceiptDetail);

            if (banhji.pageLoaded["cash_receipt_detail"] == undefined) {
                banhji.pageLoaded["cash_receipt_detail"] = true;
                vm.sorterChanges();
            }
            banhji.cashReceiptDetail.dataSource.bind('requestEnd', function(e) {
                if (e.response) {
                    banhji.cashReceiptDetail.set('count', e.response.count);
                    kendo.culture(banhji.locale);
                    banhji.cashReceiptDetail.set('total', kendo.toString(e.response.total, 'c2'));
                    banhji.cashReceiptDetail.set('cashReceipt', kendo.toString(e.response.cashReceipt));
                }
            });
            vm.pageLoad();
        }
    });
    banhji.router.route("/cash_receipt_source_detail", function() {
        if (!banhji.userManagement.getLogin()) {
            banhji.router.navigate('/manage');
        } else {
            banhji.view.layout.showIn("#content", banhji.view.cashReceiptSourceDetail);
            var vm = banhji.cashReceiptSourceDetail;
            banhji.userManagement.addMultiTask("Cash Receipt Source Detail", "cash_receipt_source_detail", null);
            if (banhji.pageLoaded["cash_receipt_source_detail"] == undefined) {
                banhji.pageLoaded["cash_receipt_source_detail"] == true;

                vm.sorterChanges();
            }
            banhji.cashReceiptSourceDetail.dataSource.bind('requestEnd', function(e) {
                if (e.response) {
                    banhji.cashReceiptSourceDetail.set('count', e.response.count);
                    kendo.culture(banhji.locale);
                    banhji.cashReceiptSourceDetail.set('total', kendo.toString(e.response.total, 'c2'));
                }
            });
            vm.pageLoad();
        }
    });
    /*************************
     *   Import Section   *
     **************************/
    banhji.router.route("/imports", function() {
        banhji.view.layout.showIn("#content", banhji.view.imports);
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
                    if ("utibill" == banhji.accessMod.data()[i].name.toLowerCase()) {
                        allowed = true;
                        break;
                    }
                }
            }
            if (!allowed) {
                window.location.replace(baseUrl + "admin");
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