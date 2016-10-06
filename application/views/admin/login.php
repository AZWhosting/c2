<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
  <!-- Boostrap-->
  <link rel="shortcut icon" href="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/banhji-logo.png">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> 
  <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
  <style>

      html, body {
          background-color: #203864;
          font-size: 16px;
          font-family: 'Roboto Slab', serif !important;
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
          background: #BDD7EE;
          margin-right: 5%;
          padding: 30px 50px;
          color: #000000;            
      }
      .login-form input{
        font-size: 20px;
        font-family: 'Roboto Slab', serif !important;
      }
     
      .login-form .login-email{
        width: 100%;
        margin-top: 10px;
        padding: 8px;
      }
      
      .btn-login{
        width: 100%;
        background: #222A35;
        color: #fff;
        border: none;
        margin: 15px 0 0 0;
        height: 55px;
        cursor: pointer;
        font-size: 30px !important;
      }

      
  </style>
  <style>
  /* FeedBack */
a.rightfixed {
        position: relative;
    background: #1F4774;
    padding: 15px 25px;
    z-index: 99;
    color: #fff;
    border-radius: 3px;
    font-size: 12px;
    padding-left: 50px;
    cursor: pointer;
    -webkit-transition: all .5s;
    transition: all .5s;
    text-decoration: none;
    opacity: 1;
    margin-bottom: 1px;
    clear: both;
    float: none;
    left: 0;
}
a.rightfixed:hover {
  opacity: 1;
}
a.rightfixed i::before {
    color: #fff;
    top: 10px;
    left: 7px;
    font-size: 20px;
}
a.feedback {
    background: #a22314;
}
a.referral {
  background: #1b8330;
}
.popRightBlog {
    width: 350px;
    height: 260px;
    left: 35%;
    top: 10%;
}
.popRightBlog textarea{
    height: 150px;
    min-height: 150px;
    max-height: 150px;
    width: 100%;
    min-width: 100%;
    max-width: 100%;
}
.popRightBlog input[type=email], .popRightBlog input[type=text]{
    width: 65%;
    margin-bottom: 2px;
    padding: 5px;
    border: 1px solid #ccc;
}
.popRightBlog input[type=text] {
  width: 34%;
  margin-right: 2px;
}
a.feedback:hover {
    margin-left: -66px;
}
a.enquiries {
  background: url(//storage.googleapis.com/instapage-user-media/e315080c/8593373-0-s-bg.jpg) no-repeat 15px center #1F4774;
    background-size: 23px;
}
a.enquiries:hover {
    left: -95px;
}
a.referral:hover {
    margin-left: -56px;
}
.cover-rightfixed {
    position: fixed;
    top: 40%;
    right: -95px;
    z-index: 99999;
    text-align: left;
}
.enquiry-content {
    background: #fff;
    border: 1px solid #D7D7D7;
    padding: 10px 10px 0;
    position: absolute;
    width: 142px;
    right: -120px;
    font-size: 12px;
    text-align: center;
    bottom: -134px;
    -webkit-transition: all .5s;
    transition: all .5s;
    padding-bottom: 10px;
    color: #444;
    z-index: -1;
}
a.enquiries:hover .enquiry-content, .enquiry-content:hover {
       right: 0;
}
</style>
<script>
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
</script>
</head>

<body>
    <div class="cover-rightfixed">
  <a class="rightfixed enquiries btn-rounded glyphicons no-js conversation" style="width: 144px;float:left;">
    Support
    <div class="enquiry-content">
      <p style="font-size: 14px;">Call us at<br><span style="font-weight: bold;font-size: 16px">+855 10 413 777</span><br>Mon-Fri<br>09:00 - 18:00</p>
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
        <dis class="login-content">
            <div class="col-sm-6">
              <div class="login-image">
                  <img style="width: 70%;" src="<?php echo base_url(); ?>assets/signup-new.png" />
                  <p>© 2016 BanhJi PTE Ltd.  All rights reserved. </p>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="login-form">
                  <form action="" method="">

                      <input type="text" data-bind="value: email" placeholder="Your email" class="login-email"><br>

                      <input type="password" data-bind="value: password" placeholder="Password " class="login-email"><br>                    

                      <input id="loginBtn" type="button" data-bind="click: btnSignIn" class="btn-login" value="Login"><br><br>
                      <div id="loginInformation"></div>
                  </form> 
                  <a href="">Forget Password</a> | <a href="<?php echo base_url(); ?>signup"> Sign Up</a>
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
            $("#loginBtn").val("Loging in...");
            var authenticationData = {
                Username : this.get('email'),
                Password : this.get('password')
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
