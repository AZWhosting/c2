<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/banhji-logo.png">

        <title>Banhji | Admin Center</title>

        <!--Css default template -->
        <link rel="stylesheet" href="<?php echo base_url()?>assets/css/lib/lobipanel/lobipanel.min.css">
        <link rel="stylesheet" href="<?php echo base_url()?>assets/css/lib/jqueryui/jquery-ui.min.css">
        <link rel="stylesheet" href="<?php echo base_url()?>assets/css/lib/font-awesome/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo base_url()?>assets/css/main.css">

        <!-- Custom styling plus plugins -->
        <link rel="stylesheet" href="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/kendoui/styles/kendo.common.min.css">
        <link rel="stylesheet" href="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/kendoui/styles/kendo.material.min.css">

         <!-- Custom style -->
        <link rel="stylesheet" href="<?php echo base_url()?>assets/admin-style.css">
    </head>

    <body class="nav-md">
        <div id="main" class="body">
            <div class="main_container">
                <header class="site-header">
                    <div class="container-fluid">
                        <a href="<?php echo base_url(); ?>rrd" class="site-logo">
                            <div class="hidden-xs">
                                <img src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/banhji-logo.png" alt="" width="40">
                            </div>                        
                            <img class="hidden-sm hidden-md hidden-lg" src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/banhji-logo.png" alt="">
                        </a>
                        
                        <div class="site-header-content">
                            <div class="site-header-content-in">
                                <div class="site-header-shown">
                
                                    <div class="dropdown user-menu">
                                        <button class="dropdown-toggle" id="dd-user-menu" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <img src="<?php echo base_url() ;?>assets/img/avatar-2-64.png" alt="">
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd-user-menu">
                                            <a class="dropdown-item" href="#"><span class="font-icon glyphicon glyphicon-user"></span>Profile</a>
                                            <a class="dropdown-item" href="#"><span class="font-icon glyphicon glyphicon-cog"></span>Settings</a>
                                            <a class="dropdown-item" href="#"><span class="font-icon glyphicon glyphicon-question-sign"></span>Help</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#"><span class="font-icon glyphicon glyphicon-log-out"></span>Logout</a>
                                        </div>
                                    </div>
                                </div><!--.site-header-shown-->
                
                               
                            </div><!--site-header-content-in-->
                        </div><!--.site-header-content-->

                    </div><!--.container-fluid-->
                </header><!--.site-header-->


                <div class="page-content">
                    <div class="container" >
                        <div class="row">
                            <div class="col-xs-12 col-md-4 col-lg-3">
                                <section class="box-typical">
                                    <div class="profile-card">
                                        <div class="profile-card-photo">
                                            <img src="<?php echo base_url()?>assets/img/photo-220-1.jpg">
                                        </div>
                                        <div class="profile-card-name">
                                            <span>Sreypoch</span>&nbsp;<span>Som</span>
                                        </div>
                                        <div class="profile-card-status">
                                            Registered Email: <span><a href="mailto:somsreypoch@gmail.com">somsreypoch@gmail.com</a></span>
                                        </div>
                                        <div class="profile-card-location">
                                            Confirm: <span>True</span>
                                        </div>
                                        <button type="button" class="btn goto-banhji">BanhJi App</button>                                    
                                    </div><!--.profile-card-->

                                    <div class="profile-statistic tbl">
                                        <div class="tbl-row">
                                            <div class="tbl-cell">
                                                <b>200</b>
                                                Assign Module
                                            </div>
                                            <div class="tbl-cell">
                                                <b>1.9M</b>
                                                Followers
                                            </div>
                                        </div>
                                    </div>

                                    <ul class="profile-links-list">
                                        <li class="nowrap">
                                            <i class="font-icon font-icon-fb-fill"></i>
                                            <a href="#">facebook.com/example</a>
                                        </li>
                                        <li class="nowrap">
                                            <i class="font-icon font-icon-in-fill"></i>
                                            <a href="#">linked.in/example</a>
                                        </li>
                                        <li class="nowrap">
                                            <i class="font-icon font-icon-tw-fill"></i>
                                            <a href="#">twitter.com/example</a>
                                        </li>                                       
                                    </ul>
                                </section><!--.box-typical-->                    
                            </div><!--.col- -->

                            <div class="col-xs-12 col-md-8 col-lg-9">

                                <section class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <div class="widget widget-3">                    
                                            <!-- Widget heading -->
                                            <div class="widget-head">
                                                <h4 class="heading">
                                                    <span class="glyphicon glyphicon-user"><i></i></span>
                                                    User</h4>
                                            </div>
                                            <!-- // Widget heading END -->                                            
                                            <div class="widget-body alert alert-primary" style="background: #496cad;">                                                
                                                <div align="center" class="text-large strong" data-bind="text: sale">10</div>
                                                <a  style="color: #fff;" href="#userlist/new">Add User</a>                                               
                                            </div>
                                            <!-- // Widget footer END -->                                            
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                       <div class="widget widget-3">                    
                                            <!-- Widget heading -->
                                            <div class="widget-head">
                                                <h4 class="heading">
                                                    <span class="glyphicon glyphicon-user"><i></i></span>
                                                    Module
                                                </h4>
                                            </div>
                                            <!-- // Widget heading END -->                                            
                                            <div class="widget-body alert" style="color: #333; background: #d9edf7;">                                                
                                                <div align="center"  class="text-large strong" data-bind="text: sale">10</div>
                                                <a  href="#" data-bind="click: getModule">Modules/Apps</a>
                                            </div>
                                            <!-- // Widget footer END -->                                            
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <div class="widget widget-3">                    
                                            <!-- Widget heading -->
                                            <div class="widget-head">
                                                <h4 class="heading">
                                                    <span class="glyphicon glyphicon-user"><i></i></span>
                                                    User Join in
                                                </h4>
                                            </div>
                                            <!-- // Widget heading END -->                                            
                                            <div class="widget-body alert"style="color: #333; background: LightGray">                                                
                                                <div align="center" class="text-large strong" data-bind="text: sale">10</div>
                                                <a style="color: #fff;" href="#" data-bind="click: getModule">the last 30 days</a>
                                            </div>
                                            <!-- // Widget footer END -->                                            
                                        </div>
                                    </div>
                                </section>

                                <section class="box-typical user-module">
                                    <div class="col-xs-3 col-md-2 col-lg-2">
                                        <div>
                                            <a href="#/customers">
                                                <img title="Customers" src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/customers.png" alt="Customer">
                                            </a>
                                            <span><span>Customer</span></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-3 col-md-2 col-lg-2">
                                        <div>
                                            <a href="#/employees">
                                                <img title="Employees" src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/employee.png" alt="Employee">
                                            </a>
                                            <span><span>Employee</span></span>
                                        </div>
                                    </div>
                                     <div class="col-xs-3 col-md-2 col-lg-2">
                                        <div>
                                            <a href="#/vendors">
                                                <img title="Supplier" src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/supplier.png" alt="Vendor">
                                            </a>
                                             <span><span>Supplier</span></span>
                                        </div>
                                    </div>
                                     <div class="col-xs-3 col-md-2 col-lg-2">
                                        <div>
                                            <a href="#/inventories">
                                                <img title="Inventories" src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/inventory.png" alt="Inventory">
                                            </a>
                                             <span><span>Inventory</span></span>
                                        </div>
                                    </div>

                                    <div class="col-xs-3 col-md-2 col-lg-2">
                                        <div>
                                            <a href="#/customers">
                                                <img title="Customers" src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/1.png" alt="Customer">
                                            </a>
                                            <span><span>Cash MGT.</span></span>
                                        </div>
                                    </div>
                                     <div class="col-xs-3 col-md-2 col-lg-2">
                                        <div>
                                            <a href="#/employees">
                                                <img title="Employees" src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/accounting.png" alt="Employee">
                                            </a>
                                            <span><span>Accounting</span></span>
                                        </div>
                                    </div>
                                     <div class="col-xs-3 col-md-2 col-lg-2">
                                        <div>
                                            <a href="#/vendors">
                                                <img title="Supplier" src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/report.png" alt="Vendor">
                                            </a>
                                             <span><span>Report</span></span>
                                        </div>
                                    </div>
                                </section> 

                                <section class="tabs-section">
                                    <div class="tabs-section-nav tabs-section-nav-inline">
                                        <ul class="nav" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" href="#tabs-4-tab-1" role="tab" data-toggle="tab">
                                                    Company Info
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#tabs-4-tab-2" role="tab" data-toggle="tab">                                                    
                                                    Users
                                                </a>
                                            </li>
                                        </ul>
                                    </div><!--.tabs-section-nav-->

                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane fade in active" id="tabs-4-tab-1">
                                            <header class="box-typical-header-sm">General Info</header>
                                            <article class="profile-info-item">
                                                <table >
                                                    <tr>
                                                        <td>Company Name</td>
                                                        <td>:</td>
                                                        <td>PCG & Partners</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Email</td>
                                                        <td>:</td>
                                                        <td>info@banhji.com</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Address</td>
                                                        <td>:</td>
                                                        <td>Parkway Square 1st Floor Room 1.1</td>
                                                    </tr>
                                                    <tr>
                                                        <td>ZIP Code</td>
                                                        <td>:</td>
                                                        <td>54879</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Year Founded</td>
                                                        <td>:</td>
                                                        <td>2015</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Country</td>
                                                        <td>:</td>
                                                        <td>Cambodia</td>
                                                    </tr>
                                                     <tr>
                                                        <td>Industry</td>
                                                        <td>:</td>
                                                        <td>Manufacture of textiles</td>
                                                    </tr>
                                                </table>
                                            </article>
                                            <div class="divider"></div>
                                            <header class="box-typical-header-sm">Financial Info</header>
                                            <article class="profile-info-item">
                                                <table >
                                                    <tr>
                                                        <td>Fiscal Date</td>
                                                        <td>:</td>
                                                        <td>12-31</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Base Currency</td>
                                                        <td>:</td>
                                                        <td>KHR</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Reporting Currency</td>
                                                        <td>:</td>
                                                        <td>USD</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Fiscal Report Date</td>
                                                        <td>:</td>
                                                        <td>01-01</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tax Regime</td>
                                                        <td>:</td>
                                                        <td>Small</td>
                                                    </tr>
                                                </table>
                                            </article>
                                        </div><!--.tab-pane-->

                                        <div style="overflow-y: hidden;" role="tabpanel" class="tab-pane fade" id="tabs-4-tab-2">
                                            <article class="profile-info-item user">
                                                <div class="" style="margin-bottom: 10px;">
                                                    <button data-bind="click: addUser" data-role="button" class="k-button" role="button" aria-disabled="false" tabindex="0">
                                                        Create user
                                                    </button>
                                                    &nbsp;&nbsp;
                                                    <i id="user-spinwhile" class="fa fa-refresh pull-right" data-bind="click: refresh"></i>
                                                </div>
                                                <table class="clo-xs-12">
                                                    <tr>
                                                        <th>Photo</th>
                                                        <th>Full Name</th>
                                                        <th>Email</th>
                                                        <th>Role</th>
                                                        <th>Last Login</th>
                                                        <th></th>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <a href="#">
                                                                <img src="<?php echo base_url()?>assets/img/photo-64-2.jpg" alt="">
                                                            </a>
                                                        </td>
                                                        <td>Sokdararith Prak</td>
                                                        <td>rith@banhji.com</td>
                                                        <td>Admin</td>
                                                        <td>-</td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    Action
                                                                </button>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item" href="#"><span class="font-icon font-icon-edit"></span>Edit</a>
                                                                    <a class="dropdown-item" href="#"><span class="font-icon font-icon-cart"></span>Password</a>
                                                                    <a class="dropdown-item" href="#"><span class="font-icon font-icon-speed"></span>View More</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <a href="#">
                                                                <img src="<?php echo base_url()?>assets/img/photo-64-2.jpg" alt="">
                                                            </a>
                                                        </td>
                                                        <td>Sokdararith Prak</td>
                                                        <td>rith@banhji.com</td>
                                                        <td>Admin</td>
                                                        <td>-</td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    Action
                                                                </button>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item" href="#"><span class="font-icon font-icon-edit"></span>Edit</a>
                                                                    <a class="dropdown-item" href="#"><span class="font-icon font-icon-cart"></span>Password</a>
                                                                    <a class="dropdown-item" href="#"><span class="font-icon font-icon-speed"></span>View More</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <a href="#">
                                                                <img src="<?php echo base_url()?>assets/img/photo-64-2.jpg" alt="">
                                                            </a>
                                                        </td>
                                                        <td>Sokdararith Prak</td>
                                                        <td>rith@banhji.com</td>
                                                        <td>Admin</td>
                                                        <td>-</td>
                                                        <td>
                                                           <div class="btn-group">
                                                                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    Action
                                                                </button>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item" href="#"><span class="font-icon font-icon-edit"></span>Edit</a>
                                                                    <a class="dropdown-item" href="#"><span class="font-icon font-icon-cart"></span>Password</a>
                                                                    <a class="dropdown-item" href="#"><span class="font-icon font-icon-speed"></span>View More</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>                                                                                                    
                                                </table>
                                            </article>
                                        </div><!--.tab-pane-->
                                    </div><!--.tab-content-->
                                </section><!--.tabs-section-->
                               
                            </div><!--.col- -->

                        </div><!--.row-->                    
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

        <!--Script default template -->
        <script type="text/javascript" src="<?php echo base_url()?>assets/js/lib/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>assets/js/lib/tether/tether.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>assets/js/lib/bootstrap/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>assets/js/plugins.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>assets/js/lib/jqueryui/jquery-ui.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>assets/js/lib/lobipanel/lobipanel.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>assets/js/lib/match-height/jquery.matchHeight.min.js"></script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>assets/js/app.js"></script>


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

        <!-- kendoui-->
        <script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/kendoui/js/kendo.all.min.js"></script>

        <!-- kendoui-->
        <!--<script>
            var banhji = banhji || {};
            var baseUrl = "<?php echo base_url(); ?>";
            var institute = null;
            // Initialize aws userpool
            var userPool = new AWSCognito.CognitoIdentityServiceProvider.CognitoUserPool(poolData);
            var bucket = new AWS.S3({params: {Bucket: 'banhji'}});

            banhji.profileDS = new kendo.data.DataSource({
              transport: {
                read  : {
                  url: baseUrl + 'api/profiles',
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
              filter: {field: 'username', value: userPool.getCurrentUser() == null ? '':userPool.getCurrentUser().username},
              pageSize: 100
            });

            banhji.countries = new kendo.data.DataSource({
              transport: {
                read  : {
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
                read  : {
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
            banhji.currencies = new kendo.data.DataSource({
              transport: {
                read  : {
                  url: baseUrl + 'api/monetaries',
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

            banhji.userDS = new kendo.data.DataSource({
              transport: {
                read  : {
                  url: baseUrl + 'api/users',
                  type: "GET",
                  dataType: 'json'
                },
                create  : {
                  url: baseUrl + 'api/users',
                  type: "POST",
                  dataType: 'json'
                },
                update  : {
                  url: baseUrl + 'api/users',
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
              pageSize: 50
            });

            banhji.moduleDS = new kendo.data.DataSource({
              transport: {
                read  : {
                  url: baseUrl + 'api/profiles/module',
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
              pageSize: 50
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
                getImage: function(image) {

                    banhji.aws.set('image', image);

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
                      window.location.replace("<?php echo base_url(); ?>login");
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

            banhji.users = kendo.observable({
              users : banhji.userDS,
              cModules: banhji.moduleDS,
              modules: new kendo.data.DataSource({
                transport: {
                  read  : {
                    url: baseUrl + 'api/users/modules',
                    type: "GET",
                    dataType: 'json'
                  },
                  create  : {
                    url: baseUrl + 'api/users/modules',
                    type: "POST",
                    dataType: 'json'
                  },
                  destroy  : {
                    url: baseUrl + 'api/users/modules',
                    type: "DELETE",
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
                filter: {
                  field: 'username',
                  value: userPool.getCurrentUser() == null ? "" : userPool.getCurrentUser().username
                },
                serverPaging: true,
                pageSize: 50
              }),
              getProfile: function(e) {
                banhji.router.navigate('profile/' + e.data.id);
              },
              code  : '',
              backToProfile: function() {
                layout.showIn("#main-display-container", index);
                layout.showIn("#main-display-container", profile);
              },
              saveAssign: function() {
                this.modules.sync();
                this.modules.bind('requestEnd', function(e){
                  if(e.response.results) {
                    layout.showIn("#main-display-container", index);
                    layout.showIn("#main-display-container", profile);
                  }
                });
              },
              assignTo: function(e) {
                var existed = false;
                for(var i = 0; i < this.modules.data().length; i++) {
                  if(e.data.id == this.modules.data()[i].module) {
                    existed = true;
                    alert('User already is assigned to this module');
                    break;
                  }
                }
                if(existed === false) {
                  this.modules.add({
                    user: this.get('current').id,
                    module: e.data.id,
                    name: e.data.name,
                    img_url: e.data.image_url
                  });
                }
              },
              removeFrom: function(e) {
                this.modules.remove(e.data);
              },
              upload: function() {
                var fileChooser = document.getElementById('user-image');
                var file = fileChooser.files[0];
                var fileReader = new FileReader();
                fileReader.onload = function(e){
                 banhji.users.get('current').set('profile_photo', e.target.result);
                }
                fileReader.readAsDataURL(file);
              },
              assign : function() {
                // index.showIn('#app-placeholder', userlist);
                layout.showIn("#main-display-container", assign);
              },
              refresh: function() {
                $('#user-spinwhile').addClass('fa-spin');
                this.users.read().then(function() {
                  $('#user-spinwhile').removeClass('fa-spin');
                });
              },
              setCurrent: function(current) {
                this.set('current', current);
              },
              userTypes : [
                {id: 1, name: 'normal'},
                {id: 2, name: 'developer'}
              ],
              showModule: function() {
                layout.showIn("#main-display-container", userlMod);
              },
              showForm: function() {
                this.users.insert(0, {
                  username: null,
                  first_name: null,
                  last_name: null,
                  email: null,
                  mobile: null,
                  profile_photo: "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/blank.png",
                  company: {id: banhji.companyDS.data()[0].id, name:''},
                  usertype: null
                });
                this.setCurrent(this.users.at(0));
                var win = $('#userForm').kendoWindow({
                  width: "600px",
                  // title: "User Form",
                  visible: false,
                  modal: true,
                  actions: [
                      "Close"
                  ],
                  close: function(e) {
                    if(banhji.userDS.hasChanges()) {
                      banhji.userDS.cancelChanges();
                    }
                  }
                }).data('kendoWindow');
                win.center().open();
                $("#userCreate").click(function() {
                  if(banhji.userDS.at(0).isNew()) {
                    // signup with Cognito
                    // using cognito to sign up
                    var attributeList = [];

                    var dataEmail = {
                        Name : 'email',
                        Value : userPool.getCurrentUser().username
                    };

                    var attributeEmail = new AWSCognito.CognitoIdentityServiceProvider.CognitoUserAttribute(dataEmail);

                    attributeList.push(attributeEmail);

                    userPool.signUp(banhji.users.get('current').username, banhji.users.get('current').password, attributeList, null, function(err, result){
                        if (err) {
                            alert(err);
                            return;
                        }

                        banhji.userDS.sync();
                        banhji.userDS.bind('requestEnd', function(e){
                          var res = e.response, type = e.type;
                          if(res.results.length > 0) {
                            console.log('user created.');
                            win.close();
                          }
                        });
                        alert('Your action was successful.');
                    });
                    // save to database
                  }
                });
              },
              cancel: function() {
                if(this.users.hasChanges()) {
                  this.users.cancelChanges();
                }
                banhji.router.navigate('userlist');
              },
              cancelAssign: function() {
                if(this.modules.hasChanges()) {
                  this.modules.cancelChanges();
                }
              },
              showFormEdit: function(e) {
                this.setCurrent(e.data);
                var win = $('#userFormEdit').kendoWindow({
                  width: "600px",
                  // title: "User Form",
                  visible: false,
                  modal: true,
                  actions: [
                      "Close"
                  ]
                }).data('kendoWindow');
                win.center().open();
                $("#userEdit").click(function() {
                  if(banhji.userDS.at(0).isNew()) {
                    // signup with Cognito
                    // using cognito to sign up
                    var attributeList = [];

                    var dataEmail = {
                        Name : 'email',
                        Value : userPool.getCurrentUser().username
                    };

                    var attributeEmail = new AWSCognito.CognitoIdentityServiceProvider.CognitoUserAttribute(dataEmail);

                    attributeList.push(attributeEmail);

                    userPool.signUp(banhji.users.get('current').username, banhji.users.get('current').password, attributeList, null, function(err, result){
                        if (err) {
                            alert(err);
                            return;
                        }
                        alert('Your action was successful.');
                    });
                    // save to database
                  }

                  banhji.userDS.sync();
                  banhji.userDS.bind('requestEnd', function(e){
                    var res = e.response, type = e.type;
                    if(res.results.length > 0) {
                      console.log('user created.');
                      win.close();
                    }
                  });
                });
              },
              showConfirm: function(e){
                this.setCurrent(e.data);
                var win = $('#userFormConfirm').kendoWindow({
                  width: "600px",
                  title: e.data,
                  visible: false,
                  modal: true,
                  actions: [
                      "Close"
                  ]
                }).data('kendoWindow');
                win.center().open();
                $('#userConfirm').click(function() {
                  var userData = {
                      Username : banhji.users.get('current').username,
                      Pool : userPool
                  };
                  var cognitoUser = new AWSCognito.CognitoIdentityServiceProvider.CognitoUser(userData);
                  cognitoUser.confirmRegistration(banhji.users.get('code'), true, function(err, result) {
                      if (err) {
                          alert(err);
                          return;
                      }
                      banhji.users.set('code', '');
                      banhji.users.get('current').set('is_confirmed', true);
                      banhji.users.save();
                      win.close();
                  });
                });
              },
              addUser: function() {
               this.users.insert(0, {
                  username: '',
                  first_name: '',
                  last_name: '',
                  email: '',
                  mobile: '',
                  profile_photo: "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/blank.png",
                  company: {id: banhji.companyDS.data()[0].id, name:''},
                  role: 2,
                  usertype: 2
                });
                this.setCurrent(this.users.at(0));
                banhji.router.navigate('userlist/new');
              },
              editProfile: function(e) {
                e.preventDefault();
                banhji.router.navigate('userlist/' + this.get('current').id);
              },
              edit: function(e) {
                banhji.router.navigate('userlist/' + e.data.id);
              },
              addUser: function() {
               this.users.insert(0, {
                  username: '',
                  first_name: '',
                  last_name: '',
                  email: '',
                  mobile: '',
                  profile_photo: "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/blank.png",
                  company: {id: banhji.companyDS.data()[0].id, name:''},
                  role: 2,
                  usertype: 2
                });
                this.setCurrent(this.users.at(0));
                banhji.router.navigate('userlist/new');
              },
              editProfile: function(e) {
                e.preventDefault();
                banhji.router.navigate('userlist/' + this.get('current').id);
              },
              edit: function(e) {
                banhji.router.navigate('userlist/' + e.data.id);
              },
              confirm: function(e) {
                e.preventDefault();

                // var userData = {
                //     Username : this.get('current').username,
                //     Pool : userPool
                // };
                // var cognitoUser = new AWSCognito.CognitoIdentityServiceProvider.CognitoUser(userData);
                // cognitoUser.confirmRegistration(this.get('code'), true, function(err, result) {
                //     if (err) {
                //         alert(err);
                //         return;
                //     }
                //     banhji.users.set('code', '');
                //     banhji.users.get('current').set('is_confirmed', true);
                //     banhji.users.save();
                // });
              },
              save: function() {
                if(banhji.userDS.at(0).isNew()) {
                  // signup with Cognito
                  // using cognito to sign up
                  var attributeList = [];

                  var dataEmail = {
                      Name : 'email',
                      Value : userPool.getCurrentUser().username
                  };

                  var attributeEmail = new AWSCognito.CognitoIdentityServiceProvider.CognitoUserAttribute(dataEmail);

                  attributeList.push(attributeEmail);

                  userPool.signUp(banhji.users.get('current').username, banhji.users.get('current').password, attributeList, null, function(err, result){
                      if (err) {
                          alert(err);
                          return;
                      }
                      if(banhji.users.get('current').profile_photo !== "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/blank.png") {
                        var fileChooser = document.getElementById('user-image');
                        var results = document.getElementById('results');
                        var file = fileChooser.files[0];
                        if (file) {
                          // results.innerHTML = '';
                          var params = {Key: Math.floor(Math.random() * 100000000000000001)+ '_' +file.name , ContentType: file.type, Body: file};
                          bucket.upload(params, function (err, data) {
                            results.innerHTML = err ? 'ERROR!' : 'UPLOADED.';
                            var loc = data.Location;
                            banhji.users.get('current').set('profile_photo', loc);
                            banhji.userDS.sync();
                            banhji.userDS.bind('requestEnd', function(e){
                              var res = e.response, type = e.type;
                              if(res.results.length > 0) {
                                console.log('user created.');
                              }
                            });
                          });
                        } else {
                          results.innerHTML = 'Nothing to upload.';
                        }
                      } else {
                        banhji.userDS.sync();
                        banhji.userDS.bind('requestEnd', function(e){
                          var res = e.response, type = e.type;
                          if(res.results.length > 0) {
                            console.log('user created.');
                          }
                        });
                      }
                      alert('Your action was successful.');
                  });
                } else {
                  banhji.userDS.sync();
                  banhji.userDS.bind('requestEnd', function(e){
                    var res = e.response, type = e.type;
                    if(res.results.length > 0) {
                      console.log('user created.');
                    }
                  });
                }
              }
            });

            banhji.company = kendo.observable({
              dataStore: banhji.companyDS,
              data: '',
              modules: banhji.moduleDS,
              countries: banhji.countries,
              industries: banhji.industry,
              currencies: banhji.currencies,
              appSub: 0,
              getModule: function() {
                index.showIn('#app-placeholder', modeleView);
              },
              close: function() {
                index.showIn('#app-placeholder', dash);
              },
              taxRegimes: [
                {id:'small', value: 'Small'},
                {id:'medium', value: 'Medium'},
                {id:'large', value: 'Large'}
              ],
              upload: function() {
                var fileChooser = document.getElementById('companyLogo');
                var file = fileChooser.files[0];
                if (file) {
                  var params = {Key: Math.floor(Math.random() * 100000000000000001)+ '_' +file.name , ContentType: file.type, Body: file};
                  bucket.upload(params, function (err, data) {
                    banhji.company.dataStore.data()[0].set('logo', data.Location);
                    // banhji.company.get('data').set('logo', data.Location);
                  });
                }
              },
              edit: function() {
                // e.preventDefault();
                index.showIn('#app-placeholder', instEdit);
                // institute.showIn('#companyInfoPlaceholder', instEdit);
              },
              cancel: function() {
                if(this.dataStore.hasChanges()) {
                  this.dataStore.cancelChanges();
                }
                index.showIn('#app-placeholder', instInfo);
              },
              save: function() {
                this.dataStore.sync();
                this.dataStore.bind('rquestEnd', function(e){
                  if(e.response.results.length > 0) {
                    institute.showIn('#companyInfoPlaceholder', instInfo);
                  }
                });
              }
            });

            banhji.module = kendo.observable({
              dataStore: banhji.moduleDS,
              fkds: ''
            });

            // index view
            var layout = new kendo.Layout('#template-layout-page');
            var index = new kendo.Layout('#template-admin-page', {model: banhji.company});
            var dash = new kendo.View('#template-dashboard', {model: banhji.company});
            var userlist= new kendo.View('#template-userlist-page', {model: banhji.users});
            var userForm= new kendo.View('#template-userlist-form-page', {model: banhji.users});
            var userNew= new kendo.View('#template-userlist-form-new-page', {model: banhji.users});
            var userlMod= new kendo.View('#template-modules-users-page', {model: banhji.users});
            var institute = new kendo.Layout('#template-createcompany-page', {model: banhji.company});
            var instInfo = new kendo.View('#template-createcompany-info-page', {model: banhji.company});
            var instEdit = new kendo.View('#template-createcompany-info-edit-page', {model: banhji.company});
            var loading = new kendo.View('#template-waiting-page');
            var unthau = new kendo.View('#template-unauth-page');
            var modeleView = new kendo.View('#template-modules-page', { model: banhji.company});
            var profile = new kendo.View('#template-profile-page', {model: banhji.users});
            var assign = new kendo.View('#template-assign-module-to-page', {model: banhji.users});
            // router initization
            banhji.router = new kendo.Router({
                init: function() {
                    if(userPool.getCurrentUser()) {
                      institute = JSON.parse(localStorage.getItem('userData/user')).institute;
                      if(!banhji.companyDS.data()[0]) {
                        banhji.companyDS.fetch(function() {
                          banhji.company.set('data', banhji.companyDS.data()[0]);
                          banhji.moduleDS.filter({field: 'id', value: banhji.companyDS.data()[0].id});
                          banhji.moduleDS.bind('requestEnd', function(e){
                            layout.render("#main-display");
                           });
                        });
                      }
                      banhji.profileDS.fetch(function(e){
                        // if(banhji.profileDS.data()[0].role == 1) {
                          kendo.bind('#main', banhji.aws);
                          if(userPool.getCurrentUser() == null) {
                            window.location.replace(baseUrl + "login");
                          } else {
                            var cognitoUser = userPool.getCurrentUser();
                            if(cognitoUser !== null) {
                              banhji.aws.getImage(banhji.profileDS.data()[0].profile_photo);
                              cognitoUser.getSession(function(err, result){
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
                          banhji.users.modules.filter({
                              field: 'username',
                              value: userPool.getCurrentUser().username
                          });
                        // } else {
                          // redirect
                        //   layout.showIn("#main-display-container", unthau);
                        //   window.location.replace(baseUrl + "demo/");
                        // }
                      });
                    } else {
                      window.location.replace("<?php echo base_url(); ?>login");
                    }
                },
                routeMissing: function(e) {
                    // banhji.view.layout.showIn("#layout-view", banhji.view.missing);
                    console.log("no resource found.")
                }
            });

            // start here
            banhji.router.route('/', function() {
              layout.showIn("#main-display-container", index);
              index.showIn('#app-placeholder', dash);
              $("#userChart").kendoChart({
                title: {
                    text: "Gross domestic product growth \n /GDP annual %/"
                },
                legend: {
                    position: "bottom"
                },
                chartArea: {
                    background: ""
                },
                seriesDefaults: {
                    type: "line",
                    style: "smooth"
                },
                series: [{
                    name: "India",
                    data: [3.907, 7.943, 7.848, 9.284, 9.263, 9.801, 3.890, 8.238, 9.552, 6.855]
                },{
                    name: "World",
                    data: [1.988, 2.733, 3.994, 3.464, 4.001, 3.939, 1.333, -2.245, 4.339, 2.727]
                },{
                    name: "Russian Federation",
                    data: [4.743, 7.295, 7.175, 6.376, 8.153, 8.535, 5.247, -7.832, 4.3, 4.3]
                },{
                    name: "Haiti",
                    data: [-0.253, 0.362, -3.519, 1.799, 2.252, 3.343, 0.843, 2.877, -5.416, 5.590]
                }],
                valueAxis: {
                    labels: {
                        format: "{0}%"
                    },
                    line: {
                        visible: false
                    },
                    axisCrossingValue: -10
                },
                categoryAxis: {
                    categories: [2002, 2003, 2004, 2005, 2006, 2007, 2008, 2009, 2010, 2011],
                    majorGridLines: {
                        visible: false
                    },
                    labels: {
                        rotation: "auto"
                    }
                },
                tooltip: {
                    visible: true,
                    format: "{0}%",
                    template: "#= series.name #: #= value #"
                }
              });
              $("#empChart").kendoChart({
                title: {
                    text: "Gross domestic product growth \n /GDP annual %/"
                },
                legend: {
                    position: "bottom"
                },
                chartArea: {
                    background: ""
                },
                seriesDefaults: {
                    type: "line",
                    style: "smooth"
                },
                series: [{
                    name: "India",
                    data: [3.907, 7.943, 7.848, 9.284, 9.263, 9.801, 3.890, 8.238, 9.552, 6.855]
                },{
                    name: "World",
                    data: [1.988, 2.733, 3.994, 3.464, 4.001, 3.939, 1.333, -2.245, 4.339, 2.727]
                },{
                    name: "Russian Federation",
                    data: [4.743, 7.295, 7.175, 6.376, 8.153, 8.535, 5.247, -7.832, 4.3, 4.3]
                },{
                    name: "Haiti",
                    data: [-0.253, 0.362, -3.519, 1.799, 2.252, 3.343, 0.843, 2.877, -5.416, 5.590]
                }],
                valueAxis: {
                    labels: {
                        format: "{0}%"
                    },
                    line: {
                        visible: false
                    },
                    axisCrossingValue: -10
                },
                categoryAxis: {
                    categories: [2002, 2003, 2004, 2005, 2006, 2007, 2008, 2009, 2010, 2011],
                    majorGridLines: {
                        visible: false
                    },
                    labels: {
                        rotation: "auto"
                    }
                },
                tooltip: {
                    visible: true,
                    format: "{0}%",
                    template: "#= series.name #: #= value #"
                }
              });
            });

            banhji.router.route('userlist', function() {
              layout.showIn("#main-display-container", index);
              if(banhji.userDS.data().length > 0) {
                index.showIn('#app-placeholder', userlist);
              } else {
                banhji.userDS.filter({field: 'id', value: institute.id});
                // layout.showIn("#main-display-container", index);
                index.showIn('#app-placeholder', userlist);
              }
            });

            banhji.router.route('userlist/new', function() {
              layout.showIn("#main-display-container", index);
              index.showIn('#app-placeholder', userNew);
              console.log('new');
            });

            banhji.router.route('userlist/:id', function(id) {
              layout.showIn("#main-display-container", index);
              banhji.users.setCurrent(banhji.users.users.get(id));
              if(banhji.users.get('current')) {
                 index.showIn('#app-placeholder', userForm);
              }
              console.log(id);
            });

            banhji.router.route('apps', function() {
              layout.showIn("#main-display-container", modeleView);
            });

            banhji.router.route('apps/:id', function(id) {
              console.log(id);
            });

            banhji.router.route('company', function() {
              layout.showIn("#main-display-container", index);
              index.showIn('#app-placeholder', instInfo);
              // institute.showIn('#companyInfoPlaceholder', instInfo);
            });

            banhji.router.route('profile/:id', function(id) {
              layout.showIn("#main-display-container", index);
              layout.showIn("#main-display-container", profile);
              banhji.users.setCurrent(banhji.users.users.get(id));
            });


            $(document).ready(function() {
                banhji.router.start();
                // signout when browser closed
                // window.addEventListener("beforeunload", function (e) {
                //   // var confirmationMessage = "\o/";

                //   // (e || window.event).returnValue = confirmationMessage; //Gecko + IE
                //   // return confirmationMessage;                            //Webkit, Safari, Chrome
                //   var userData = {
                //       Username : userPool.getCurrentUser().username,
                //       Pool : userPool
                //   };
                //   var cognitoUser = new AWSCognito.CognitoIdentityServiceProvider.CognitoUser(userData);
                //   if(cognitoUser != null) {
                //       cognitoUser.signOut();
                //       // window.location.replace("<?php echo base_url(); ?>login");
                //   } else {
                //       console.log('No user');
                //   }
                // });
            });
        </script>-->

        
    </body>
</html>