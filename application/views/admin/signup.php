<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sign Up</title>
    <link rel="stylesheet" href="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/js/kendoui/styles/kendo.common.min.css">
    <link rel="stylesheet" href="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/js/kendoui/styles/kendo.material.min.css">
    <!-- Boostrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">  
    <style>
        html, body {
            background-color: #203864;
        }
        *{
            margin: 0;
            padding: 0;
        }
        .sign-up{
            width: 100%;
            margin: 0 auto;
            background: #203864;
            height: auto;
        }
        .signup-content{
            margin: 50px 0;
            display: inline-block;
            width: 100%;
        }
        .singup-image{
            text-align: center;
            margin-top: 100px; 
        }
        .singup-image p{
            color: #8DB3DA;
            margin-top: 20px;
            font-size: 13px;
        }
        .signup-form{
            background: #2F5597;
            padding: 30px 50px;
            color: #fff;
            text-align:  center;
            font-family: 'Open Sans', sans-serif !important;
        }
        .signup-form input{
          font-size: 18px;          
        }
        .signup-form label{
            font-size:  18px;
            font-weight: 600;
            float: left;
        }
        .signup-form .signup-email{
            width: 100%;
            margin-top: 10px;
            padding: 8px;
        }
        .signup-noted{
            color: #ddd;
            margin: 5px auto 0;
            font-size: 11px;
            text-align: center;
            width: 80%;
        }
        .signup-country{
            height: 37px;
            width: 100%;
            margin-top: 10px;
        }
        .btn-signup{
            width: 100%;
            background: #222A35;
            color: #68788E;
            border: none;
            margin: 15px 0 0 0;
            height: 55px;
            cursor: pointer;
            font-size: 30px !important;
        }
        .signup-text-bottom{
            color: #fff;
            text-align:  center;
            margin: 13px auto 0;
            width: 60%;
        }
        .signup-text-bottom a{
            color: #8DB3DA;
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="sign-up">
        <dis class="signup-content">
            <div class="col-sm-6">
                <div class="singup-image">
                    <img src="<?php echo base_url(); ?>assets/signup.png" />
                    <p>© 2016 BanhJi PTE Ltd.  All rights reserved. </p>
                </div>
            </div>
             <div class="col-sm-5">
                <div class="signup-form">
                    <form action="" method="">
                        <label>Personal Information</label><br>

                        <input type="email" data-bind="value: email" placeholder="Your email" class="signup-email"><br>

                        <input type="password" data-bind="value: password" placeholder="Password " class="signup-email"><br>

                        <p class="signup-noted">The minimum requirements for password are:  at least 8 characters, letter, and numbers.</p>
                        
                        <input type="password" data-bind="value: cPassword" placeholder="Confirm password " class="signup-email"><br>
                        <br>

                        <label>Company Information</label><br>
                        <input type="text" data-bind="value: name" placeholder="Company Name " class="signup-email"><br>

                        <select class="signup-country" 
                                data-role="dropdownlist" 
                                data-bind="source: countries, value: country"
                                data-text-field="name"
                                data-value-field="id"
                                data-option-label="select country">
                        </select><br>

                        <select class="signup-country"
                                data-role="dropdownlist" 
                                data-bind="source: types, value: type"
                                data-text-field="name"
                                data-value-field="id"
                                data-option-label="select type">
                        </select><br>

                         <select class="signup-country"
                                data-role="dropdownlist" 
                                data-bind="source: industries, value: industry"
                                data-text-field="name"
                                data-value-field="id"
                                data-option-label="select industry"
                                data-place-holder="select one">
                        </select><br>

                        <input type="button" data-bind="click: create" class="btn-signup" value="Signup"><br>
                        <p class="signup-text-bottom">
                            By clicking on “signup”, you agree to the <a href="">Terms of Service</a> and <a href="">Privacy Policy</a>.
                        </p>

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
        var baseUrl = "<?php echo base_url(); ?>";
        var userPool = new AWSCognito.CognitoIdentityServiceProvider.CognitoUserPool(poolData);
        localforage.config({
            driver: localforage.LOCALSTORAGE,
            name: 'userData'
        });

        banhji.countries = new kendo.data.DataSource({
            transport: {
                read    : {
                    url: baseUrl + 'api/banhji/countries',
                    type: "GET",
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

        banhji.industry = new kendo.data.DataSource({
            transport: {
                read    : {
                    url: baseUrl + 'api/banhji/industry',
                    type: "GET",
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
            create: {
              url: baseUrl + 'api/profiles/company',
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
          filter: {field: 'username', value: userPool.getCurrentUser() == null ? '': userPool.getCurrentUser().username},
          pageSize: 1
        });

        banhji.typeDS = new kendo.data.DataSource({
          transport: {
            read  : {
              url: baseUrl + 'api/institutes/types',
              type: "GET",
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
            create  : {
              url: baseUrl + 'api/users/create',
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
          pageSize: 1
        });

        banhji.index = kendo.observable({
            email     : null,
            password  : null,
            cPassword : null,
            name      : '',
            country   : null,
            industry  : null,
            type      : null,
            countries : banhji.countries,
            industries: banhji.industry,
            types     : banhji.typeDS,
            userDS    : banhji.userDS,
            createDB  : new kendo.data.DataSource({
                transport: {
                    create  : {
                        url: baseUrl + 'api/banhji/createDB',
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
            }),
            create: function() {
                var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                if(re.test(this.get('email'))) {
                    if(this.get('password') == this.get('cPassword')) {
                        if(this.get('name') != '') {
                            // create user
                            var attributeList = [];

                            var dataEmail = {
                                Name : 'email',
                                Value : this.get('email')
                            };

                            var attributeEmail = new AWSCognito.CognitoIdentityServiceProvider.CognitoUserAttribute(dataEmail);

                            attributeList.push(attributeEmail);

                            userPool.signUp(this.get('email'), this.get('password'), attributeList, null, function(err, result){
                                if (err) {
                                    layout.showIn("#main-container", registerView);
                                    $('#regInformation').text(err);
                                    // alert(err)
                                    return;
                                } else {
                                    console.log(result.user.username);
                                    banhji.index.userDS.add({
                                        username: result.user.username,
                                        first_name: null,
                                        last_name: null,
                                        email: null,
                                        mobile: null,
                                        profile_photo: "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/blank.png",
                                        company: {id: 0, name:''},
                                        usertype: 1
                                    });
                                    banhji.index.userDS.sync();
                                    banhji.userDS.bind('requestEnd', function(e){
                                        var res = e.response, type = e.type;
                                        if(res.results.length > 0) {
                                            // create company
                                            banhji.companyDS.insert(0, {
                                                name:  banhji.index.get('name'),
                                                country:  banhji.index.get('country'),
                                                industry:  banhji.index.get('industry'),
                                                type: banhji.index.get('type'),
                                                username:result.user.username
                                            });
                                            banhji.companyDS.sync();
                                            banhji.companyDS.bind('requestEnd', function(e){
                                                banhji.index.set('email', null);
                                                banhji.index.set('password', null);
                                                banhji.index.set('cPassword', null);
                                                banhji.index.set('name', '');
                                                banhji.index.set('country', null);
                                                banhji.index.set('industry', null);
                                                banhji.index.set('type', null);
                                                // go to confirm
                                                window.location.replace(baseUrl + "confirm/");
                                            });
                                        }
                                    });
                                  }                    
                            });
                        } else {
                            console.log('no name');
                        }
                    } else {
                        console.log('passwords do not match.');
                    }
                } else {
                    console.log('bad email');
                }
                // console.log('kdslfds');
            }
        });  
        $(function(){
            kendo.bind($('.sign-up'), banhji.index);
        });
    </script>
</body>
</html>
