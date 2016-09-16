<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
    <!-- Boostrap-->
    <link rel="shortcut icon" href="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/banhji-logo.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> 
    <style>
        html, body {
            background-color: #203864;
            font-size: 16px;
            font-family: 'Open Sans', sans-serif !important;
        }
        *{
            margin: 0;
            padding: 0;
        }
        .login{
            width: 100%;
            margin: 0 auto;
            background: #203864;
            height: auto;
        }
        .login-content{
            margin: 238px 0 50px;
            display: inline-block;
            width: 100%;
        }
        .login-image{
            text-align: center;
            margin-top: -50px; 
        }
        .login-image p{
          color: #8DB3DA;
          margin-top: 20px;
          font-size: 13px;
        }
        .login-form{
            background: #2F5597;
            margin-right: 5%;
            padding: 30px 50px;
            color: #000000;            
        }
        .login-form input{
          font-size: 20px;
          font-family: 'Open Sans', sans-serif !important;
        }
       
        .login-form .login-email{
          width: 100%;
          margin-top: 10px;
          padding: 8px;
        }
        
        .btn-login{
          width: 100%;
          background: #222A35;
          color: #68788E;
          border: none;
          margin: 15px 0 0 0;
          height: 55px;
          cursor: pointer;
          font-size: 30px !important;
        }
        
    </style>
</head>

<body>
    <div class="login">
        <dis class="login-content">
            <div class="col-sm-6">
              <div class="login-image">
                  <img src="<?php echo base_url(); ?>assets/login.png" />
                  <p>© 2016 BanhJi PTE Ltd.  All rights reserved. </p>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="login-form">
                  <form action="" method="">

                      <input type="text" data-bind="value: email" placeholder="Your email" class="login-email"><br>

                      <input type="password" data-bind="value: password, events:{keypress:signIn}" placeholder="Password " class="login-email"><br>                    

                      <input id="loginBtn" type="button" data-bind="click: btnSignIn" class="btn-login" value="Login"><br><br>
                      <div id="loginInformation"></div>
                  </form> 
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
        var baseUrl = "<?php echo base_url(); ?>"
        var apiUrl = baseUrl + "api/";
        banhji.companyDS = new kendo.data.DataSource({
          transport: {
            read  : {
              url: apiUrl + "profiles/company",
              type: "GET",
              dataType: 'json'
            },
            update  : {
              url: apiUrl + "profiles/company",
              type: "PUT",
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
          pageSize: 1
        });

        banhji.profileDS = new kendo.data.DataSource({
          transport: {
            read  : {
              url: baseUrl + 'api/profiles/login',
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
        });

        // banhji.userDS = new kendo.data.DataSource({
        //   transport: {
        //     read  : {
        //       url: baseUrl + 'api/users',
        //       type: "GET",
        //       dataType: 'json'
        //     },
        //     create  : {
        //       url: baseUrl + 'api/users/create',
        //       type: "POST",
        //       dataType: 'json'
        //     },
        //     update  : {
        //       url: baseUrl + 'api/users',
        //       type: "PUT",
        //       dataType: 'json'
        //     },
        //     parameterMap: function(options, operation) {
        //       if(operation === 'read') {
        //         return {
        //           limit: options.take,
        //           page: options.page,
        //           filter: options.filter
        //         };
        //       } else {
        //         return {models: kendo.stringify(options.models)};
        //       }
        //     }
        //   },
        //   schema  : {
        //     model: {
        //       id: 'id'
        //     },
        //     data: 'results',
        //     total: 'count'
        //   },
        //   batch: true,
        //   serverFiltering: true,
        //   serverPaging: true,
        //   pageSize: 50
        // });

        banhji.aws = kendo.observable({
          email: null,
          password: null,
          signIn: function(e) {
            // var decimal=  /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;  
            // if(this.get('password').match(decimal) != null)  {   
            // layout.showIn("#main-container", watingView);
            if(e.keyCode == 13) {
              $("#loginBtn").val("Loging in...");
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
                  AWS.config.credentials = new AWS.CognitoIdentityCredentials({
                    IdentityPoolId : 'us-east-1_56S0nUDS4', // your identity pool id here
                    Logins : {
                        // Change the key below according to the specific region your user pool is in.
                        'arn:aws:cognito-idp:us-east-1:260206821052:userpool/us-east-1_56S0nUDS4' : result.getIdToken().getJwtToken()
                    }
                  });
                  banhji.companyDS.filter({field: 'username', value: userPool.getCurrentUser() == null ? '': userPool.getCurrentUser().username});
                      banhji.companyDS.bind('requestEnd', function(e) {
                        var res = e.response;
                        if(res.error) {
                            // console.log()
                        } else {
                          var data = res.results[0];
                          banhji.profileDS.filter({
                            field: 'username', value: userPool.getCurrentUser().username
                          });
                          banhji.profileDS.bind('requestEnd', function(e){
                            var id = e.response.results[0].id;
                            if(e.response.results[0].id) {
                              var user = {
                                  id: id,
                                  role: e.response.results[0].role, 
                                  username: userPool.getCurrentUser().username,
                                  institute: data
                              };
                              console.log(e.response.results[0].role);
                              localforage.setItem('user', user);
                              $("#loginBtn").val("Redirecting...");
                              window.location.replace(baseUrl + "rrd/");
                            } else {
                              console.log('bad');
                            }
                          });                          
                        }
                    });                    
                },
                onFailure: function(err) {
                  // layout.showIn("#main-container", loginView);
                  $("#loginBtn").val("Login");
                  $('#loginInformation').text('Please check username/password.');
                }
              }); 
            } 
          },
          btnSignIn: function() {
            $("#loginBtn").val("Loging in...");
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
                  banhji.companyDS.filter({field: 'username', value: userPool.getCurrentUser() == null ? '': userPool.getCurrentUser().username});
                      banhji.companyDS.bind('requestEnd', function(e) {
                        var res = e.response;
                        if(res.error) {
                            // console.log()
                        } else {
                          var data = res.results[0];
                          banhji.profileDS.filter({
                            field: 'username', value: userPool.getCurrentUser().username
                          });
                          banhji.profileDS.bind('requestEnd', function(e){
                            var id = e.response.results[0].id;
                            if(e.response.results[0].id) {
                              var user = {
                                id: id,
                                username: userPool.getCurrentUser().username,
                                role: e.response.results[0].role,
                                institute: data
                              };
                              localforage.setItem('user', user);
                              $("#loginBtn").val("Redirecting...");
                              window.location.replace(baseUrl + "rrd/");
                            } else {
                              console.log('bad');
                            }
                          });                          
                        }
                    });                    
                },
                onFailure: function(err) {
                  // layout.showIn("#main-container", loginView);
                  $("#loginBtn").val("Login");
                  $('#loginInformation').text('Please check username/password.');
                }
              }); 
          },
          redirect: function(data) {
              // console.log(data.length > 0);
              if(data.length > 0) {
                window.location.replace(baseUrl + "rrd/");
              } else {
                window.location.replace(baseUrl + "app/");
              } 
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
      $(function(){
        kendo.bind($('.login'), banhji.aws);
      });
    </script>
</body>
</html>
