<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Login | Free Online Accounting</title>
    <!-- Boostrap-->
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/update/banhji.jpg">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/micro/login.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/micro/resposive.css">

    <script>
        window.fbAsyncInit = function() {
            FB.init({
                appId: '387834344756149',
                xfbml: true,
                version: 'v2.7'
            });
            FB.AppEvents.logPageView();
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {
                return;
            }
            js = d.createElement(s);
            js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-109087721-1', 'auto');
        ga('send', 'pageview');
    </script>
    <!-- End Google Analytics -->
</head>

<body>
    <!-- <form action="" method="" class="login" style="background: none;">
        <input type="text" data-bind="value: email" placeholder="Your email"  /><br/>
        <input type="password" data-bind="value: password" placeholder="Password "  /><br/>
        <a style="z-index: 99999;" id="loginBtn" type="submit" data-bind="click: btnSignIn"  value="Login">Login</a><br/>
        <div id="loginInformation" style="text-align: center;margin-bottom: 15px;color: #a22314"></div>
    </form> -->

    <div class="body-wrapper">
        <div class="container">
            <div class="cover-rightfixed">
                <a class="rightfixed enquiries btn-rounded glyphicons no-js conversation" style="width: 144px;float:left;">
                  Support
                  <div class="enquiry-content">
                    <p style="font-size: 14px;">Call us by<br><span style="font-weight: bold;font-size: 16px">+855 10 413 777</span><br>Mon-Fri<br>09:00 - 18:00</p>
                    <div class="fb-messengermessageus"
                      messenger_app_id="1301847836514973"
                      page_id="862386433857166"
                      color="blue"
                      width="180"
                      size="standard" ></div>
                  </div>
                </a>
            </div>
            <div class="login">
                <div class="login-content">

                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <div class="login-image">
                                <img style="width: 90%;" src="<?php echo base_url(); ?>assets/banhji-login.png" />
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <div class="login-form">
                                <form action="" method="">
                                    <input type="text" data-bind="value: email" placeholder="Your email" class="login-email" /><br>
                                    <input type="password" data-bind="value: password" placeholder="Password " class="login-email" /><br>
                                    <input style="z-index: 99999;" id="loginBtn" type="button" data-bind="click: btnSignIn" class="btn-login" value="Login" /><br><br>
                                    <div id="loginInformation" style="text-align: center;margin-bottom: 15px;color: #a22314"></div>
                                </form>
                                <p>By clicking Login, you agree to our <a href="https://www.banhji.com/terms" target="_blank">Term of Service.</a></p>
                                <a href="<?php echo base_url(); ?>micro/forgetpassword">Forget Password</a> | <a href="<?php echo base_url(); ?>micro/signup"> Sign Up</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-wrapper" style="position: fixed; width: 100%; bottom:0; left: 0;">
        <div class="footer" style="width: 100%; background: #111F3F; padding: 10px 0; color: #839ABA;">
            <div class="container">
                <div class="sign-up" style="padding-bottom: 0; background: none;">
                    <div class="row">
                        <div class="col-sm-6">
                            <div style="padding-right: 20px; border-right: 1px solid #fff; width: 7%; float: left; margin-right: 13px; ">
                                <img style="width: 30px; height: 30px; " src="<?php echo base_url();?>assets/update/banhji.jpg" />
                            </div>
                            <p style="text-align: left; margin-bottom: 0; margin-top: 7px; font-size: 13px;">Taking Fear out of Accounting</p>
                            <p style="width: 85%; margin-left: 5px; font-size: 12px; margin-top: 10px; float: left; clear: both;">&copy;
                                <?php echo date('Y'); ?> BanhJi Pte. Ltd. All rights reserved. Terms, conditions, features, support, pricing and service options subject to change without notice.</p>
                        </div>
                        <div class="col-sm-6 footer-list">
                            <ul>
                                <li>
                                    <a href="https://banhji.com/privacy" target="_blank">Privacy Policy</a>
                                </li>
                                <li>
                                    <a href="https://www.banhji.com/terms" target="_blank">Terms of Service</a>
                                </li>
                            </ul>
                            <div class="supporter">
                                <span id="siteseal" style="float: right; width: 24%; text-align: right; margin-left: 15px;">
                                    <script async type="text/javascript" src="https://seal.godaddy.com/getSeal?sealID=lNpq2OuFwU0nDcZ5f7uSQ9D1rwgIIgTNOoYBNRt4BqE4CMLt8GMhEDKt66EL"></script>
                                </span>
                                <span id="cdSiteSeal1" style="float: right; width: 28%; text-align: right;">
                                    <script type="text/javascript" src="//tracedseals.starfieldtech.com/siteseal/get?scriptId=cdSiteSeal1&amp;cdSealType=Seal1&amp;sealId=55e4ye7y7mb733e8444d2ecffd8819eq59my7mb7355e4ye7baf4c5b6a4491396"></script></span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- cognito -->
    <script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/resources/jsbn.js"></script>
    <script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/resources/jsbn2.js"></script>
    <script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/resources/sjcl.js"></script>
    <script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/resources/moment.js"></script>
    <!-- For Cognito -->
    <!--Core Cognito -->
    <script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/resources/aws-cognito-sdk.min.js"></script>
    <script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/resources/amazon-cognito-identity.min.js"></script>
    <script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/resources/aws-sdk.min.js"></script>
    <script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/resources/cred.js"></script>
    <!--Core Cognito -->

    <!-- jQuery -->
    <script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/resources/jquery.min.js"></script>
    <!-- kendoui-->
    <script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/kendoui/js/kendo.all.min.js"></script>
    <script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/js/libs/localforage.min.js"></script>
    <!-- Boostrap-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script>

        var banhji = banhji || {};
        localforage.config({
            driver: localforage.LOCALSTORAGE,
            name: 'userData'
        });
        // Initialize aws userpool
        var userPool = new AWSCognito.CognitoIdentityServiceProvider.CognitoUserPool(poolData);
        let banhjiAuth = kendo.Class.extend({
            userPool: null,
            cognitoUser: null,
            companyDatastore: new kendo.data.DataSource({
                transport: {
                    read: {
                        url: apiUrl + "profiles/company",
                        type: "GET",
                        dataType: 'json'
                    },
                    update: {
                        url: apiUrl + "profiles/company",
                        type: "PUT",
                        dataType: 'json'
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
                pageSize: 1
            }),
            profileDatastore: new kendo.data.DataSource({
                transport: {
                    read: {
                        url: baseUrl + 'api/profiles/login',
                        type: "POST",
                        dataType: 'json'
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
            getSession: function() {
                // this.cognitoUser.getSession(function(err, session) {
                //   if(session) {
                //     window.location.replace(baseUrl + "rrd/");
                //   } else {
                //     console.log(err);
                //   }
                // });
            },
            init: function(jsonArr) {
                if (jsonArr === null) {
                    this.userPool = new AWSCognito.CognitoIdentityServiceProvider.CognitoUserPool(poolData);
                }
                this.cognitoUser = userPool.getCurrentUser();
            }
        });
        var auth = new banhjiAuth();
        var baseUrl = "<?php echo base_url(); ?>"
        var url = window.location.href;
        var pro = url.split("/");
        var apiUrl = pro[0] === "https:" ? "https://app.banhji.com/c2/" + "api/" : baseUrl + "api/";
        banhji.companyDS = new kendo.data.DataSource({
            transport: {
                read: {
                    url: apiUrl + "profiles/company",
                    type: "GET",
                    dataType: 'json'
                },
                update: {
                    url: apiUrl + "profiles/company",
                    type: "PUT",
                    dataType: 'json'
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
            pageSize: 1
        });

        banhji.profileDS = new kendo.data.DataSource({
            transport: {
                read: {
                    url: pro[0] === "https:" ? "https://app.banhji.com/c2/" + "api/profiles/login" : baseUrl + 'api/profiles/login',
                    type: "POST",
                    dataType: 'json'
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
        });
        banhji.userFXDS = new kendo.data.DataSource({
            transport: {
                read: {
                    url: baseUrl + 'api/users/roles',
                    type: "GET",
                    dataType: 'json'
                },
                create: {
                    url: baseUrl + 'api/users/roles',
                    type: "POST",
                    dataType: 'json'
                },
                destroy: {
                    url: baseUrl + 'api/users/roles',
                    type: "DELETE",
                    dataType: 'json'
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
        });
        banhji.aws = kendo.observable({
            email: null,
            password: null,
            signIn: function(e) {
                // var decimal=  /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;
                // if(this.get('password').match(decimal) != null)  {
                // layout.showIn("#main-container", watingView);
                // if(e.keyCode == 13) {
                //   console.log(this.get('password'));
                // banhji.aws.btnSignIn();
                // }
                console.log(this.get('password'));
            },
            btnSignIn: function() {
                ga('send', 'event', 'login', 'click', 'User Login');
                if (this.get('email') || this.get('password')) {
                    $("#loginBtn").val("Logging in...");
                    var authenticationData = {
                        Username: this.get('email'),
                        Password: this.get('password')
                    };
                    var authenticationDetails = new AWSCognito.CognitoIdentityServiceProvider.AuthenticationDetails(authenticationData);
                    var userData = {
                        Username: this.get('email'),
                        Pool: userPool
                    };
                    var cognitoUser = new AWSCognito.CognitoIdentityServiceProvider.CognitoUser(userData);
                    cognitoUser.authenticateUser(authenticationDetails, {
                        onSuccess: function(result) {
                            // success
                            AWS.config.credentials = new AWS.CognitoIdentityCredentials({
                                IdentityPoolId: 'us-east-1:35445541-da4c-4dbb-b83f-d1d0301a26a9',
                                Logins: {
                                    'cognito-idp.us-east-1.amazonaws.com/us-east-1_56S0nUDS4': result.getIdToken().getJwtToken()
                                }
                            });
                            if (cognitoUser != null) {
                                cognitoUser.getSession(function(err, session) {
                                    if (err) {
                                        alert(err);
                                        return;
                                    }
                                });
                            }

                            banhji.companyDS.filter({
                                field: 'username',
                                value: userPool.getCurrentUser() == null ? '' : userPool.getCurrentUser().username
                            });
                            banhji.companyDS.bind('requestEnd', function(e) {
                                var res = e.response;
                                var data = res.results[0];
                                banhji.profileDS.filter({
                                    field: 'username',
                                    value: userPool.getCurrentUser().username
                                });
                                banhji.profileDS.bind('requestEnd', function(e) {
                                    var id = e.response.results[0].id;
                                    var cognitoUser = userPool.getCurrentUser();
                                    cognitoUser.getSession((err, session) => {
                                        cognitoUser.getUserAttributes((err, attributes) => {
                                            if (e.response.results[0].id) {
                                                var user = {
                                                    id: id,
                                                    sub: attributes,
                                                    username: userPool.getCurrentUser().username,
                                                    role: e.response.results[0].role,
                                                    roles: e.response.results[0].roles,
                                                    institute: data
                                                };
                                                localforage.setItem('user', user);
                                                $("#loginBtn").val("Redirecting...");
                                                window.location.replace(baseUrl + "micro/home");
                                            } else {
                                                console.log('bad');
                                            }
                                        })
                                    })
                                    // if(e.response.results[0].id) {
                                    //   var user = {
                                    //     id: id,
                                    //     sub:
                                    //     username: userPool.getCurrentUser().username,
                                    //     role: e.response.results[0].role,
                                    //     roles: e.response.results[0].roles,
                                    //     institute: data
                                    //   };
                                    //   localforage.setItem('user', user);
                                    //   $("#loginBtn").val("Redirecting...");
                                    //   window.location.replace(baseUrl + "rrd/");
                                    // } else {
                                    //   console.log('bad');
                                    // }
                                });
                            });
                        },
                        onFailure: function(err) {
                            // layout.showIn("#main-container", loginView);
                            $("#loginBtn").val("Login");
                            $('#loginInformation').text('Please check username/password.');
                        }
                    });
                } else {
                    alert('Please Fill Username and Password!');
                }
            },
            redirect: function(data) {
                // console.log(data.length > 0);
                if (data.length > 0) {
                    window.location.replace(baseUrl + "micro/");
                } else {
                    window.location.replace(baseUrl + "app/");
                }
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

        $(function() {

            auth.getSession();

            kendo.bind($('.login'), banhji.aws);

        });
    </script>

</body>

</html> 