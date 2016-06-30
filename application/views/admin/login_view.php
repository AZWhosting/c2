<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Banhji | </title>
    
    <!-- Bootstrap -->
    <link href="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/gentelella/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/gentelella/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/gentelella/google-code-prettify/bin/prettify.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/gentelella/css/custom.css" rel="stylesheet">
    <link rel="stylesheet" href="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/kendoui/styles/kendo.common.min.css">
    <link rel="stylesheet" href="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/kendoui/styles/kendo.material.min.css">
  </head>

  <body>
    <div id="layout">
      <div id="main-container"></div>
    </div>
    <script type="text/x-kendo-template" id="template-waiting-page">
      <div class="nav-md">
        <a class="hiddenanchor" id="toregister"></a>
        <a class="hiddenanchor" id="tologin"></a>

        <div id="wrapper">
          <div id="waiting" class=" form">
            <section class="login_content">
              <img src="<?php echo base_url(); ?>assets/loading.gif" alt="" width="150"><br>
              <span>Please wait...</span>
            </section>
          </div>
        </div>
      </div>
    </script>
    <script type="text/x-kendo-template" id="template-login-page">
      <div class="nav-md">
        <div id="wrapper">
          <div id="login" class=" form">
            <section class="login_content">
              <form>
                <h1>Login Form</h1>
                <div>
                  <input type="text" data-bind="value: email" class="form-control" placeholder="Username" required="" />
                </div>
                <div>
                  <input type="password" data-bind="value: password" class="form-control" placeholder="Password" required="" />
                </div>
                <div>
                  <a class="btn btn-default submit" href="#" data-bind="click: signIn">Log in</a>
                  <a class="reset_pass" href="#forgotten">Lost your password?</a>
                </div>
                <div class="clearfix"></div>
                <div class="separator">

                  <p class="change_link">New to site?
                    <a href="#register" class="to_register"> Create Account </a>
                  </p>
                  <div class="clearfix"></div>
                  <br />
                  <div>
                    <h1>Banhji Web Application</h1>
                  </div>
                </div>
              </form>
            </section>
          </div>
        </div>
      </div>
    </script>
    <script type="text/x-kendo-template" id="template-register-page">
      <div class="nav-md">
        <div id="wrapper">
          <div id="toregister" class=" form">
            <section class="login_content">
              <form>
                <h1>Create Account</h1>
                <div>
                  <input type="email"  data-bind="value: email"class="form-control" placeholder="Email" required="" />
                </div>
                <div>
                  <input type="password" data-bind="value: password" class="form-control" placeholder="Password" required="" />
                </div>
                <div>
                  <input type="password" data-bind="value: confirm" class="form-control" placeholder="Confirm" required="" />
                </div>
                <div>
                  <a class="btn btn-default submit" data-bind="click: signUp" href="#">Submit</a>
                </div>
                <div class="clearfix"></div>
                <div class="separator">

                  <p class="change_link">Already a member ?
                    <a href="#login" class="to_register"> Log in </a>
                  </p>
                  <div class="clearfix"></div>
                  <div id="regInformation">dsfdsfds</div>
                  <br />
                  <div>
                    <h1>Banhji Web Application</h1>
                  </div>
                </div>
              </form>
            </section>
          </div>
        </div>
      </div>
    </script>
    <script type="text/x-kendo-template" id="template-confirm-page">
      <div class="nav-md">
        <a class="hiddenanchor" id="toregister"></a>
        <a class="hiddenanchor" id="tologin"></a>

        <div id="wrapper">
          <div id="login" class=" form">
            <section class="login_content">
              <form>
                <h1>Confirm Code</h1>
                <div>
                  <p>Please check your email for the verification code with this email: <span data-bind="text: email"></span></p>
                </div>
                <div>
                  <input type="type" data-bind="value: verificationCode" class="form-control" placeholder="Code" required="" />
                </div>
                <div>
                  <a class="btn btn-default submit" href="#" data-bind="click: comfirmCode">Confirm Now</a>
                  <a class="btn btn-invert submit" href="#" data-bind="click: resendCode">Resend Code</a>
                </div>
                </div>
              </form>
            </section>
          </div>
        </div>
      </div>
    </script>
    <script type="text/x-kendo-template" id="template-forget-password-page">
      <div class="nav-md">
        <a class="hiddenanchor" id="toregister"></a>
        <a class="hiddenanchor" id="tologin"></a>

        <div id="wrapper">
          <div id="login" class=" form">
            <section class="login_content">
              <form>
                <h1>Forget Password</h1>
                <div>
                  <input type="email" data-bind="value: email" class="form-control" placeholder="username/email" required="" />
                </div>
                <div>
                  <a class="btn btn-default submit" href="#" data-bind="click: forgotPassword">Reset Password</a>
                </div>
                </div>
              </form>
            </section>
          </div>
        </div>
      </div>
    </script>

    <!-- jQuery -->
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
    <!-- Bootstrap -->
    <script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/gentelella/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/gentelella/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/gentelella/nprogress/nprogress.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/gentelella/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/gentelella/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/gentelella/google-code-prettify/src/prettify.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/gentelella/js/custom.js"></script> 
    <!-- bootstrap-wysiwyg -->
    <!-- kendoui-->
    <script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/kendoui/js/kendo.all.min.js"></script>
    <!-- kendoui-->
    <!-- cognito -->
    <script>
        var banhji = banhji || {};
        var baseUrl = "<?php echo base_url();  ?>index.php/"
        // Initialize aws userpool
        var userPool = new AWSCognito.CognitoIdentityServiceProvider.CognitoUserPool(poolData);

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

        banhji.userDS = new kendo.data.DataSource({
          transport: {
            read  : {
              url: baseUrl + 'users',
              type: "GET",
              dataType: 'json'
            },
            update  : {
              url: baseUrl + 'users',
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

        banhji.aws = kendo.observable({
            password: null,
            confirm: null,
            email: null,
            verificationCode: null,
            cognitoUser: null,
            newPass: null,
            oldPass: null,
            signUp: function(e) {
              e.preventDefault();

              if(this.get('password') != this.get('confirm')) {
                alert('Passwords do not match');
              } else {
                layout.showIn("#main-container", watingView);
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
                        $('#regInformation').text(err);
                        alert(err)
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
                layout.showIn("#main-container", watingView);
                var userData = {
                    Username : this.get('email'),
                    Pool : userPool
                };
                var cognitoUser = new AWSCognito.CognitoIdentityServiceProvider.CognitoUser(userData);
                cognitoUser.confirmRegistration(this.get('verificationCode'), true, function(err, result) {
                    if (err) {
                        layout.showIn("#main-container", confirmView);
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
                var decimal=  /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;  
                if(this.get('password').match(decimal) != null)  {   
                  layout.showIn("#main-container", watingView);
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
                            //
                          } else {
                            banhji.aws.redirect(res.results);
                          }
                        });                    
                      },

                      onFailure: function(err) {
                        layout.showIn("#main-container", loginView);
                      },

                  });  
                  return true;  
                } else {   
                  alert('Password must be at lease 8 characters and contains lower, upper case, number and special character');
                  return false;
                }    
            },
            redirect: function(data) {
              // console.log(data[0]);
              if(data[0]) {
                window.location.replace(baseUrl + "work");
              } else {
                window.location.replace(baseUrl + "work/mockup/");
              }  
            },
            signOut: function(){
                var userData = {
                    Username : userPool.getCurrentUser().username,
                    Pool : userPool
                };
                var cognitoUser = new AWSCognito.CognitoIdentityServiceProvider.CognitoUser(userData);
                if(cognitoUser != null) {
                    cognitoUser.signOut();
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


        // index view 
        var layout = new kendo.Layout('#layout');
        var loginView = new kendo.View('#template-login-page', {model: banhji.aws});
        var confirmView = new kendo.View('#template-confirm-page', {model: banhji.aws});
        var forgotView = new kendo.View('#template-forget-password-page', {model: banhji.aws});
        var registerView=new kendo.View('#template-register-page', {model: banhji.aws});
        var watingView = new kendo.View('#template-waiting-page');
        // router initization
        banhji.router = new kendo.Router({
            init: function() {
                layout.render("body");
            },
            routeMissing: function(e) {
                // banhji.view.layout.showIn("#layout-view", banhji.view.missing);
                console.log("no resource found.")
            }
        });

        // start here
        banhji.router.route('/', function(){
          $('body').css("background-color","white");
          layout.showIn("#main-container", watingView);
          
        });
        banhji.router.route('login', function() {
          $('body').css("background-color","white");
          layout.showIn("#main-container", loginView);
        });
        banhji.router.route('register', function(){
          $('body').css("background-color","white");
          layout.showIn("#main-container", registerView);
        });
        banhji.router.route('confirm', function(){
          $('body').css("background-color","white");
          layout.showIn("#main-container", confirmView);
        });
        banhji.router.route('forgotten', function(){
          $('body').css("background-color","white");
          layout.showIn("#main-container", forgotView);
        });

        $(document).ready(function() {
            banhji.router.start();
            if(userPool.getCurrentUser() != null) {
              // redirect to app
              banhji.companyDS.fetch();
              window.setTimeout(function () {
                // if(banhji.companyDS.data()[0]) {
                //   window.location.replace(baseUrl + "work/");
                // } else {
                //   window.location.replace(baseUrl +"work/mockup/");
                // }                
              }, 1000);
            
              // redirect to admin
              // window.location.replace('index.html');
            } else {
              banhji.router.navigate('login');
            }

            // prettyPrint();
        });
    </script>
    <!-- /bootstrap-wysiwyg -->
  </body>
</html>