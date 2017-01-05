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
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/libraries/kendoui/styles/kendo.common.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/libraries/kendoui/styles/kendo.material.min.css">

     <!-- Custom style -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/admin-style.css">
    <script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/resources/jsbn.js"></script>
  </head>

  <body class="nav-md">
    <div id="main" class="body">
      <div class="main_container" id="placeholder">
        <div id="menu"></div>
        <div id="container"></div>
      </div>
    </div>
    <script type="text/x-kendo-template" id="header-menu">
      <header class="site-header">
          <div class="container-fluid">
              <a href="#" data-bind="click: checkRole" class="site-logo">
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
                                  <span style="color:#fff;" data-bind="text: currentID.username"></span>
                              </button>
                              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd-user-menu">
                                  <a class="dropdown-item" href="#" data-bind="click: logOut"><span class="font-icon glyphicon glyphicon-log-out"></span>Logout</a>
                              </div>
                          </div>
                      </div><!--.site-header-shown-->
                  </div><!--site-header-content-in-->
              </div><!--.site-header-content-->
          </div><!--.container-fluid-->
      </header>
    </script>
    <script type="text/x-kendo-template" id="companyDash">
      <!--Dashbaord Admin-->
      <div class="page-content">
          <div class="container" >
              <div class="row">
                  <div class="col-xs-12 col-md-4 col-lg-3">
                      <section class="box-typical">
                          <div class="profile-card">
                              <div class="profile-card-photo">
                                  <img data-bind="attr: {src: userProfile.currentID.profile_photo.url}">
                              </div>
                              <div class="profile-card-name">
                                  <span data-bind="text: userProfile.currentID.last_name"></span>&nbsp;
                                  <span data-bind="text: userProfile.currentID.first_name"></span>
                              </div>
                              <div class="profile-card-status">
                                  Registered Email: <span><a href="mailto:somsreypoch@gmail.com">
                                    <span data-bind="text: userProfile.currentID.username"></span>
                                  </a></span>
                              </div>
                               <div class="profile-card-status">
                              <strong>Joined In</strong>: <span data-bind="text: userProfile.currentID.joined"></span>
                          </div>
                          <div class="profile-card-status">
                              <strong>Logged In</strong>: <span data-bind="text: userProfile.currentID.logged_in"></span>
                          </div>
                          <div class="profile-card-status">
                              <strong>Assigned Role</strong>: <span data-bind="text: userProfile.getRole"></span>
                          </div>
                          </div>
                          <div class="profile-statistic tbl" style="margin-top: 15px;">
                            <a href="<?php echo base_url(); ?>rrd" type="button" class="btn btn-block goto-banhji" style="background-color: #001933;">Go to BanhJi App</a>
                            <button type="button" class="btn btn-block goto-banhji" data-bind="click: goModule">Assigned Modules</button>
                            <button type="button" class="btn btn-block goto-banhji" data-bind="click: goProfile">View/ Edit Profile</button>
                            <button type="button" class="btn btn-block goto-banhji" data-bind="click: userProfile.goPassword">Change Password</button>

                            <button style="background-color: #B2C1D1;" type="button" class="btn btn-block goto-banhji" data-bind="visible:users.showAdmin, click: goCompany">Company Info</button>
                            <button style="background-color: #B2C1D1;" type="button" class="btn btn-block goto-banhji" data-bind="visible:users.showAdmin, click: goUser">Users List</button>
                            <button style="background-color: #B2C1D1;" type="button" class="btn btn-block goto-banhji" data-bind="visible:users.showAdmin, click: goEmployee">Employees List</button>
                            
                          </div>
                          
                      </section>
                  </div>

                  <div class="col-xs-12 col-md-8 col-lg-9">
                      <section class="row" data-bind="visible:users.showAdmin" style="text-align:center;">
                          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                              <div class="widget widget-3">
                                  <div class="widget-head">
                                      <h4 class="heading">
                                          Total Users</h4>
                                  </div>
                                  <div class="widget-body alert alert-primary" style="background: #496cad;">
                                      <div align="center" class="text-large strong"><span data-bind="text: data"></span></div>
                                      <a style="color: #fff;">Users</a>
                                  </div>
                              </div>
                          </div>

                          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                             <div class="widget widget-3">
                                  <div class="widget-head">
                                      <h4 class="heading">
                                          Core/ Subscribed Modules
                                      </h4>
                                  </div>
                                  <div class="widget-body alert" style="color: #333; background: #d9edf7;">
                                      <div align="center"  class="text-large strong"><span data-bind="text: appSub"></span></div>
                                      <a>Assigned Modules</a>
                                  </div>
                              </div>
                          </div>

                          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                              <div class="widget widget-3">
                                  <div class="widget-head">
                                      <h4 class="heading">
                                          User Join in
                                      </h4>
                                  </div>
                                  <div class="widget-body alert" style="color: #333; background: LightGray">
                                      <div align="center" class="text-large strong" data-bind="text: lastLogin"></div>
                                      <a style="color: #000;" href="#" data-bind="click: getModule">the last 30 days</a>
                                  </div>
                              </div>
                          </div>
                      </section>

                      <section class="box-typical user-module" id="placeholder">
                          
                      </section>
                  </div>
                  <div id="userFormConfirm" style="visibility: hidden">
                    <div class="row">
                      <divclass="col-md-12 col-sm-12 col-xs-12"></div>
                        <div class="x_panel" style="width: 94%">
                            <div class="x_title">
                                <h2>Edit User</h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <br>
                                <div id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Code <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="code" data-bind="value: users.code" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4" style="margin-top:10px;">
                                            <button id="userConfirm" class="btn btn-success" data-bind="click: users.confirm">Confirm</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
              </div>
          </div>
      </div>
    </script>
    
    <script type="text/x-kendo-template" id="employee-list">
      <tr>
          <td>
              #=name#
          </td>
          <td>#=gender#</td>
          <td>#=role.name#</td>
          <td>
            #=status == 1 ? "Active" : "Inactive"#
          </td>
          <td align="center">
            <button class="btn" data-bind="click: edit" style="padding: 0px 15px;     border-radius: 0;">Edit</button>
            <button class="btn" data-bind="click: remove" style="padding: 0px 15px;     border-radius: 0;">Remove</button>
          </td>
      </tr>
    </script>
    <script type="text/x-kendo-template" id="employee-action">
      <!--Add User-->
      <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-12 col-lg-12">
                    <section class="box-typical edit-company">
                        <div class="hidden-print pull-right">
                            <span class="glyphicon glyphicon-remove glyphicon-size" data-bind="click: cancel"><i></i></span>
                        </div>
                        <h2>Employee Form</h2>
                        <div class="divider"></div>
                        <article class="col-md-12 col-lg-12 profile-info-item edit-table">
                          <div style="background: #eee;">
                            <table >
                              <tr>
                                <td>Employee Type</td>
                                <td>:</td>
                                <td>
                                  <input type="checkbox" data-bind="checked: current.is_fulltime">&nbsp;
                                  Full-Time
                                </td>
                                <td>Role:</td>
                                <td>
                                  <input id="type"
                                    data-role="dropdownlist"
                                    data-bind="source: roles, value: current.role, events: {change: typeChange}"
                                    data-text-field="name"
                                    data-value-field="id"
                                    class="form-control col-md-7 col-xs-12"
                                    type="text"
                                    data-option-label="--Select--"
                                  >
                                </td>
                              </tr>
                                <tr>
                                  <td>Name</td>
                                  <td>:</td>
                                  <td>
                                      <input type="text" data-bind="value: current.name" class="form-control"  id="" placeholder="">
                                  </td>
                                  <td>Link User</td>
                                  <td>
                                    <input id="type"
                                      data-role="dropdownlist"
                                      data-bind="source: users, value: current.userid"
                                      data-text-field="username"
                                      data-value-field="id"
                                      data-primitive-value="true"
                                      class="form-control col-md-7 col-xs-12"
                                      type="text"
                                      data-option-label="--Select--"
                                    >
                                  </td>
                                </tr>
                                <tr>
                                    <td>Employment Number</td>
                                    <td>:</td>
                                    <td>
                                      <input id="type"
                                        data-bind="value: current.abbr"
                                        class="form-control col-md-7 col-xs-12"
                                        type="text"
                                        style="width: 50px;"
                                      > 
                                      <input id="type"
                                        data-bind="value: current.number"
                                        class="form-control col-md-7 col-xs-12"
                                        type="text"
                                        style="width: 150px;"
                                      >
                                    </td>
                                    <td>Status</td>
                                    <td>
                                      <input id="type"
                                        data-role="dropdownlist"
                                        data-bind="source: statusDS, value: current.status"
                                        data-text-field="value"
                                        data-value-field="id"
                                        data-value-primitive="true"
                                        class="form-control col-md-7 col-xs-12"
                                        type="text"
                                      >
                                    </td>
                                </tr>                                
                            </table>
                          </div>
                        </article>
                        <section class="tabs-section">
                          <div class="tabs-section-nav tabs-section-nav-inline">
                            <ul class="nav" role="tablist">
                              <li class="nav-item">
                                <a class="nav-link active" href="#tabs-4-tab-1" role="tab" data-toggle="tab" aria-expanded="false">
                                  Information
                                </a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#tabs-4-tab-2" role="tab" data-toggle="tab" aria-expanded="false">
                                  Accounts
                                </a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#tabs-4-tab-3" role="tab" data-toggle="tab" aria-expanded="false">
                                  Payroll Information
                                </a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#tabs-4-tab-4" role="tab" data-toggle="tab" aria-expanded="false">
                                  Document
                                </a>
                              </li>
                            </ul>
                          </div><!--.tabs-section-nav-->

                          <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="tabs-4-tab-1" aria-expanded="false">
                              <table class="table">
                                <tr>
                                  <td>email</td>
                                  <td><input type="email" class="k-textbox" data-bind="value: current.email"></td>
                                  <td></td>
                                  <td>phone</td>
                                  <td><input type="phone" class="k-textbox" data-bind="value: current.phone"></td>
                                </tr>
                                <tr>
                                  <td>address</td>
                                  <td><input type="text" class="k-textbox" data-bind="value: current.address"></td>
                                  <td></td>
                                  <td>memo</td>
                                  <td><input type="text" class="k-textbox" data-bind="value: current.memo"></td>
                                </tr>
                              </table>
                            </div><!--.tab-pane-->
                            <div role="tabpanel" class="tab-pane fade" id="tabs-4-tab-2" aria-expanded="false">
                              <table class="table">
                                <tr>
                                  <td>
                                    Advance Account<br>
                                    <input id="type"
                                      data-role="dropdownlist"
                                      data-bind="source: advanceAC, value: current.account"
                                      data-text-field="name"
                                      data-value-field="id"
                                      data-value-primitive="false"
                                      data-template="employee-account-list"
                                      data-option-label="--Select One--"
                                      class="form-control col-md-7 col-xs-12"
                                      type="text"
                                    >
                                  </td>
                                  <td>
                                    Salary Account<br>
                                    <input id="type"
                                      data-role="dropdownlist"
                                      data-bind="source: salaryAC, value: current.salary"
                                      data-text-field="name"
                                      data-value-field="id"
                                      data-value-primitive="false"
                                      data-template="employee-account-list"
                                      data-option-label="--Select One--"
                                      class="form-control col-md-7 col-xs-12"
                                      type="text"
                                    >
                                  </td>
                                  <td>
                                    Currency<br>
                                    <input id="type"
                                      data-role="dropdownlist"
                                      data-bind="source: currencies, value: current.currency"
                                      data-text-field="country"
                                      data-value-field="locale"
                                      data-value-primitive="true"
                                      data-option-label="--Select Currency"
                                      class="form-control col-md-7 col-xs-12"
                                      type="text"
                                    >
                                  </td>
                                </tr>
                              </table>
                            </div><!--.tab-pane-->
                            <div role="tabpanel" class="tab-pane fade" id="tabs-4-tab-3" aria-expanded="false">
                              <table class="table">
                                <tr>
                                  <td>Nationality</td>
                                  <td>
                                    <input id="type"                                     
                                     data-bind="value: payroll.nationality"
                                     class="k-textbox"
                                     type="text"
                                     >
                                    </td>
                                  <td></td>
                                  <td>Employment Date</td>
                                  <td>
                                    <input type="text" 
                                      data-role="datepicker" 
                                      data-bind="value: payroll.employeement_date"
                                      data-format="dd-MM-yyyy"
                                      data-parse-formats="yyyy-MM-dd"
                                      >
                                  </td>
                                </tr>
                                <tr>
                                  <td>Married Status</td>
                                  <td>
                                    <input id="type"                                     
                                     data-bind="source: marriedStatus ,value: payroll.married_status"
                                     data-role="dropdownlist"
                                     data-text-field="name"
                                     data-value-field="id"
                                     data-value-primitive="true"
                                     class="k-textbox"
                                     type="text"
                                     >
                                    </td>
                                  <td></td>
                                  <td>Children</td>
                                  <td>
                                    <input type="text" 
                                      data-role="numerictextbox" 
                                      data-bind="value: payroll.children"
                                      >
                                  </td>
                                </tr>
                                <tr>
                                  <td>City/Province</td>
                                  <td>
                                    <input id="type"                                     
                                     data-bind="value: payroll.city"
                                     class="k-textbox"
                                     type="text"
                                     >
                                    </td>
                                  <td></td>
                                  <td>Country</td>
                                  <td>
                                    <input type="text" 
                                      data-bind="value: payroll.country"
                                      class="k-textbox"
                                      >
                                  </td>
                                </tr>
                                <tr>
                                  <td>Emmergency Number</td>
                                  <td>
                                    <input id="type"                                     
                                     data-bind="value: payroll.emergency_number"
                                     class="k-textbox"
                                     type="text"
                                     >
                                    </td>
                                  <td></td>
                                  <td>Emmergency Name</td>
                                  <td>
                                    <input type="text" 
                                      data-bind="value: payroll.emergency_name"
                                      class="k-textbox"
                                      >
                                  </td>
                                </tr>
                              </table>
                            </div><!--.tab-pane-->
                            <div role="tabpanel" class="tab-pane fade" id="tabs-4-tab-4" aria-expanded="false">
                              <input data-role="upload" type="file" data-bind="events: {select: fileMan.onSelected}" data-show-file-list="false">
                              <table class="table">
                                <tbody 
                                  data-role="listview"
                                  data-auto-bind="false"
                                  data-bind="source: fileMan.dataSource" 
                                  data-template="attachment-list"></tbody>
                              </table>
                            </div><!--.tab-pane-->
                          </div><!--.tab-content-->
                        </section>
                        <div class="box-generic">
                          <button data-role="button" class="k-button btn-save" role="button" aria-disabled="false" tabindex="0" data-bind="click: save">
                              <span class="glyphicon glyphicon-ok"><i></i></span>
                              &nbsp; Save
                          </button>
                          &nbsp;
                          <button data-role="button" class="k-button btn-cancel" role="button " aria-disabled="false" tabindex="0" data-bind="click: cancel">
                              <span class="glyphicon glyphicon-remove"><i></i></span>
                              &nbsp; Cancel
                            </button>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <div id="ntf1" data-role="notification"></div>
      </div>
    </script>
    <script type="text/x-kendo-template" id="employee-account-list">
      <div>
        <span>#=number#</span>-<span>#=name#</span>
      </div>
    </script>
    <script type="text/x-kendo-template" id="attachment-list">
      <tr>
        <td>#=name# </td><td><button data-bind="click: onRemove">X</button></td>
      </tr>
    </script>
    <script type="text/x-kendo-template" id="company-edit">
      <!--Edit Company-->
      <div class="page-content">
        <div class="container" >
            <div class="row">
                <div class="col-xs-12 col-md-12 col-lg-12">
                    <section class="box-typical edit-company">
                        <div class="hidden-print pull-right">
                            <span class="glyphicon glyphicon-remove glyphicon-size" data-bind="click: close"><i></i></span>
                        </div>
                        <h2>Edit Company Info</h2>
                        <img width="240px" data-bind="attr: {src: current.logo.url}" />
                        <input data-role="upload" id="companyLogo" class="form-control col-md-7 col-xs-12" type="file" data-bind="events: {select: upload}" data-show-file-list="false">
                        <br>
                        
                        <div class="divider"></div>
                        <header class="box-typical-header-sm">
                          General Info
                        </header>
                        <article class="profile-info-item edit-table">
                          <table>
                            <tr>
                              <td>Company Name</td>
                              <td>:</td>
                              <td>
                                <input type="text" class="form-control" id="" placeholder="" data-bind="value: current.name">
                              </td>
                            </tr>
                            <tr>
                              <td>Email</td>
                              <td>:</td>
                              <td>
                                <input type="email" class="form-control" id="" value="" data-bind="value: current.email">
                              </td>
                            </tr>
                            <tr>
                              <td>Address</td>
                              <td>:</td>
                              <td>
                                <input type="text" class="form-control" id="" placeholder="" data-bind="value: current.address">
                              </td>
                            </tr>
                            <tr>
                              <td>ZIP Code</td>
                              <td>:</td>
                              <td>
                                <input type="text" class="form-control" id="" placeholder="" data-bind="value: current.zip">
                              </td>
                            </tr>
                            <tr>
                              <td>Company Registraion Number</td>
                              <td>:</td>
                              <td>
                                <input type="text" class="form-control" id="" placeholder="" data-bind="value: current.year_founded">
                              </td>
                            </tr>
                            <tr>
                              <td>City/Province</td>
                              <td>:</td>
                              <td>
                                <input type="text" class="form-control" id="" placeholder="" data-bind="value: current.city">
                              </td>
                            </tr>
                            <tr>
                              <td>Country</td>
                              <td>:</td>
                              <td>
                                <input type="text" 
                                  class="form-control" 
                                  data-role="dropdownlist"
                                  data-bind="source: countries, value: current.country"
                                  data-text-field="name"
                                  data-value-field="id">
                              </td>
                            </tr>
                            <tr>
                              <td>Industry</td>
                              <td>:</td>
                              <td>
                                <input type="text" 
                                  class="form-control"
                                  data-role="dropdownlist" 
                                  data-bind="source: industries, value: current.industry.id"
                                  data-text-field="name"
                                  data-value-field="id">
                              </td>
                            </tr>
                          </table>
                        </article>
                        <header class="box-typical-header-sm">Financial Info</header>
                        <article class="profile-info-item edit-table">
                            <table >
                              <tr>
                                  <td>Accounting Standard</td>
                                  <td>:</td>
                                  <td>
                                    <input type="text" 
                                      class="form-control" 
                                      data-bind="value: current.accounting_standard">
                                  </td>
                                </tr>
                                <tr>
                                  <td>Fiscal Date(Ending Date) </td>
                                  <td>:</td>
                                  <td>
                                    <input 
                                      data-role="datepicker" 
                                      class="form-control"
                                      data-format="dd-MM"
                                      data-parse-formats="yyyy-MM-dd" 
                                      data-bind="value: current.fiscal_date">
                                  </td>
                                </tr>
                                <tr>
                                  <td>Base Currency</td>
                                  <td>:</td>
                                  <td>
                                    <input type="text" 
                                      data-role="dropdownlist" 
                                      class="form-control" 
                                      data-bind="source: currencies, value: current.currency.id"
                                      data-value-field="id"
                                      data-text-field="code"
                                      disabled>
                                  </td>
                                </tr>
                                <tr>
                                  <td>Reporting Currency</td>
                                  <td>:</td>
                                  <td>
                                    <input type="text" 
                                      data-role="dropdownlist" 
                                      class="form-control" 
                                      data-bind="source: currencies, value: current.reportCurrency.id"
                                      data-value-field="id"
                                      data-text-field="code">
                                  </td>
                                </tr> 
                                <tr>
                                  <td>Tax Regime</td>
                                  <td>:</td>
                                  <td>
                                    <input type="text" 
                                      data-role="dropdownlist" 
                                      class="form-control"
                                      data-bind="source: taxRegimes, value: current.tax_regime"
                                      data-text-field="value"
                                      data-value-field="id">
                                  </td>
                                </tr>
                                <tr>
                                  <td>VAT</td>
                                  <td>:</td>
                                  <td>
                                    <input type="text"
                                      class="form-control"
                                      data-bind="value: current.vat_number">
                                  </td>
                                </tr>
                            </table>
                        </article>
                        <div class="box-generic">
                          <button data-role="button" class="k-button btn-save" role="button" aria-disabled="false" tabindex="0" data-bind="click: save">
                              <span class="glyphicon glyphicon-ok"><i></i></span>
                              &nbsp; Save
                          </button>
                          &nbsp;
                          <button data-role="button" class="k-button btn-cancel" role="button " aria-disabled="false" tabindex="0" data-bind="click: cancel">
                              <span class="glyphicon glyphicon-remove"><i></i></span>
                              &nbsp; Cancel
                          </button>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <div id="ntf1" data-role="notification"></div>
      </div>
    </script>
    <!-- user placeholder -->
    <script type="text/x-kendo-template" id="template-placeholder-module">
      <div style="border:none;" data-role="listview" data-bind="source: users.modules" data-template="company-modules"></div>
    </script>
    <script type="text/x-kendo-template" id="company-modules">
      <div class="col-xs-3 col-md-2 col-lg-2">
          <div>
              <a href="<?php echo base_url(); ?>rrd\#/#=href#">
                  <img data-bind="attr: {src: image_url}">
              </a>
              <span><span data-bind="text: name"></span></span>
          </div>
      </div>
    </script>
    <script type="text/x-kendo-template" id="template-placeholder-company">
      <article class="profile-info-item">
        <img width="120px" data-bind="attr: {src: current.logo.url}">   
      </article>
        <header class="box-typical-header-sm">
            General Info
        </header>
        <article class="profile-info-item">
            <table >
                <tr>
                    <td>Company Name</td>
                    <td>:</td>
                    <td><span data-bind="text:current.name"></span></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td><span data-bind="text:current.email"></span></td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td>:</td>
                    <td><span data-bind="text:current.address"></span></td>
                </tr>
                <tr>
                    <td>ZIP Code</td>
                    <td>:</td>
                    <td><span data-bind="text:current.zip"></span></td>
                </tr>
                <tr>
                    <td>Company Registration Number</td>
                    <td>:</td>
                    <td><span data-bind="text:current.year_founded"></span></td>
                </tr>
                <tr>
                    <td>City/Province</td>
                    <td>:</td>
                    <td><span data-bind="text:current.city"></span></td>
                </tr>
                <tr>
                    <td>Country</td>
                    <td>:</td>
                    <td><span data-bind="text:current.country.name"></span></td>
                </tr>
                 <tr>
                    <td>Industry</td>
                    <td>:</td>
                    <td><span data-bind="text:current.industry.type"></span></td>
                </tr>
            </table>
        </article>
        <header class="box-typical-header-sm">Financial Info</header>
        <article class="profile-info-item">
            <table >
              <tr>
                    <td>Accounting Standard</td>
                    <td>:</td>
                    <td><span data-bind="text:current.accounting_standard"></span></td>
                </tr>
                <tr>
                    <td>Fiscal Date (Ending Date)</td>
                    <td>:</td>
                    <td><span data-bind="text:current.fiscal_date"></span></td>
                </tr>
                <tr>
                    <td>Base Currency</td>
                    <td>:</td>
                    <td><span data-bind="text:current.currency.code"></span></td>
                </tr>
                <tr>
                    <td>Reporting Currency</td>
                    <td>:</td>
                    <td><span data-bind="text:current.reportCurrency.code"></span></td>
                </tr>
                <tr>
                    <td>Tax Regime</td>
                    <td>:</td>
                    <td><span data-bind="text:current.tax_regime"></span></td>
                </tr>
                <tr>
                    <td>VAT</td>
                    <td>:</td>
                    <td><span data-bind="text:current.vat_number"></span></td>
                </tr>
            </table>
        </article>
        <button data-bind="click: edit" data-role="button" class="btn" role="button" aria-disabled="false" tabindex="0">
            Edit
        </button>
        <div id="ntf1" data-role="notification"></div>
    </script>
    <script type="text/x-kendo-template" id="template-placeholder-user">
      <article class="profile-info-item user" style="margin:0;">
          <div class="" style="margin-bottom: 10px;">
              <button data-bind="click: addUser" data-role="button" class="k-button" role="button" aria-disabled="false" tabindex="0">
                  Create user
              </button>
              &nbsp;&nbsp;
              <i id="user-spinwhile" class="fa fa-refresh pull-right" data-bind="click: refresh"></i>
          </div>
          
          <div data-role="listview" data-template="user-profile-list" data-bind="source:users.users" data-bind="false" class="row" style="border: 0;">
          </div>
          <div id="ntf1" data-role="notification"></div>
      </article>
    </script>
    <script type="text/x-kendo-template" id="template-placeholder-employee">
      <button class="btn" data-bind="click: addNew" style="margin-bottom: 10px;     border-radius: 0;">Create</button>
      <button class="btn" data-bind="click: goRole" style="margin-bottom: 10px;     border-radius: 0;">Role</button>
      <i id="user-spinwhile" class="fa fa-refresh pull-right" data-bind="click: refresh"></i>
      <table class="tbl-typical">
          <thead>
            <tr>
              <th><div>Name</div></th>
              <th><div>Gender</div></th>
              <th align="center"><div>Role#</div></th>
              <th align="center"><div>Status</div></th>
              <th align="center"><div>Action</div></th>
            </tr>
          </thead>
          <tbody data-role="listview" data-bind="source: employees.dataSource" data-template="employee-list">
      </tbody></table>
      <div id="ntf1" data-role="notification"></div>
    </script>
    <!-- user placeholder -->
    <script type="text/x-kendo-template" id="user-profile">
      <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-12 col-lg-12">
                    <section class="box-typical edit-company">
                        <div class="hidden-print pull-right">
                            <span class="glyphicon glyphicon-remove glyphicon-size" data-bind="click: cancel"><i></i></span>
                        </div>
                        <h2>Profile Detail</h2>
                        <div class="divider"></div>
                        <div class="col-md-3 col-lg-3">
                            <img width="240px" data-bind="attr: {src: currentID.profile_photo.url}" />
                            <h3>Profile Picture</h3>
                            <input data-role="upload" id="user-image" class="form-control col-md-7 col-xs-12" type="file" data-bind="events: {select: upload}" data-show-file-list="false">
                        </div>
                        <article class="col-md-9 col-lg-9 profile-info-item edit-table">
                            <table >
                                <tr>
                                    <td>Username *</td>
                                    <td>:</td>
                                    <td>
                                        <input type="text" data-bind="value: currentID.username" class="form-control" id="" placeholder="">
                                    </td>
                                </tr>
                                <tr>
                                    <td>First Name *</td>
                                    <td>:</td>
                                    <td>
                                        <input type="text" data-bind="value: currentID.first_name" class="form-control" id="" placeholder="">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Last Name *</td>
                                    <td>:</td>
                                    <td>
                                        <input type="text" data-bind="value: currentID.last_name" class="form-control" id="" placeholder="">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Phone</td>
                                    <td>:</td>
                                    <td>
                                        <input type="text" data-bind="value: currentID.mobile" class="form-control" id="" placeholder="">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>:</td>
                                    <td>
                                        <input type="Email" data-bind="value: currentID.email" class="form-control" id="" placeholder="">
                                    </td>
                                </tr>
                            </table>
                        </article>
                        <div class="box-generic" style="margin-top: 15px;">
                          <button data-role="button" class="k-button btn-save" role="button" aria-disabled="false" tabindex="0" data-bind="click: save">
                              <span class="glyphicon glyphicon-ok"><i></i></span>
                              &nbsp; Save
                          </button>
                          &nbsp;
                          <button data-role="button" class="k-button btn-cancel" role="button " aria-disabled="false" tabindex="0" data-bind="click: cancel">
                              <span class="glyphicon glyphicon-remove"><i></i></span>
                              &nbsp; Cancel
                            </button>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <div id="ntf1" data-role="notification"></div>
      </div>
    </script>
    <script type="text/x-kendo-template" id="user-profile-modules">
      <div style="border: none;" 
           data-role="listview" 
           data-bind="source: modules"
           data-auto-bind="false" 
           data-template="user-profile-modules-list"></div>
    </script>
    <script type="text/x-kendo-template" id="user-profile-modules-list">
      <div class="col-xs-3 col-md-2 col-lg-2">
        <div>
          <a href="<?php echo base_url(); ?>rrd\#/#=href#">
            <img data-bind="attr: {src: img_url}">
          </a>
          <span><span data-bind="text: name"></span></span>
        </div>
      </div>
    </script>
    <script type="text/x-kendo-template" id="user-profile-list">
      <section class="box-typical col-md-3" style="margin: 0 0 17px 17px;">
        <div class="profile-card">
          <div class="profile-card-photo">
              <img data-bind="attr: {src: profile_photo.url}">
          </div>
          <div class="profile-card-name">
              <span data-bind="text: last_name"></span>&nbsp;
              <span data-bind="text: first_name"></span>
          </div>
          <div class="profile-card-status">
            Joined In: <span data-bind="text: joined"></span>
          </div>
          <div class="profile-card-status">
            Logged In: <span data-bind="text: logged_in"></span>
          </div>
          <div class="profile-card-status" style="font-weight: bold">
            # if(role == 1) {#
              Admin
            #} else {#
              User
            #}#
          </div>
          <div class="profile-card-status" style="font-weight: bold">
            Confirm: <input type="checkbox" data-bind="checked: is_confirmed" disabled="true">
          </div>
          <div class="profile-card-location">
            <a href="\#assignto/#=id#"><button class="btn btn-alert btn-block" style="margin-bottom: 5px;">Assign/Reassign</button></a>
            <button class="btn btn-alert btn-block" style="margin-bottom: 5px;" data-bind="click: showFormEdit">Edit</button>
            # if(username == userPool.getCurrentUser().username) {#
              <a href="\#password/#=id#"><button class="btn btn-warning btn-block" style="margin-bottom: 5px;">Change Password</button></a>
            #} else {#
              <button class="btn btn-info btn-block" data-bind="click: forgotPassword" style="margin-bottom: 5px; background: \#001933; border-color: \#001933;">Forget Password</button>
            #}#
          </div>
        </div>
      </section>   
    </script>
    <script type="text/x-kendo-template" id="template-assign-module-to-page">
      <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-12">
                <i class="fa fa-close pull-right" data-bind="click: backToProfile"></i>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <table class="table">
                    <thead>
                        <tr>
                          <td>Company Subscribed Modules</td>
                          <td></td>
                        </tr>
                    </thead>
                    <tbody data-role="listview" data-bind="source: cModules" data-template="template-modules-users-company-list-page">
                    </tbody>
                </table>
            </div>
            <div class="col-lg-6">
                <table style="width: 100%" class="table">
                    <thead>
                        <tr>
                          <td style="width: 80%">User Access Modules</td>
                          <td>
                          </td>
                        </tr>
                    </thead>
                    <tbody data-role="listview" data-bind="source: modules" data-template="template-modules-users-module-list-page">
                    </tbody>
                </table><br>
                <div style="float: right;">
                  <button class="btn" data-bind="click: saveAssign" style="cursor: pointer; border-radius: 0;">Save</button>
                  <button class="btn" data-bind="click: cancelAssign" style="cursor: pointer;border-radius: 0;">Cancel</button>
                </div>
            </div>
        </div>
        <div id="ntf1" data-role="notification"></div>
      </div>
    </script>
    <script type="text/x-kendo-template" id="template-user-password">
      <div class="col-md-12">
        Old Password: <input class="form-control" type="password" data-bind="value: oldPass"><br>
        New Password: <input class="form-control" type="password" data-bind="value: newPass"><br>
        <button class="btn btn-primary btn-block" data-bind="click: changePassword">Confirm</button>
        <div id="ntf1" data-role="notification"></div>
      </div>
    </script>
    <script type="text/x-kendo-template" id="template-modules-users-company-list-page">
      <tr>
          <td>
            <img src="#=image_url#" width="100"> #=name#
          </td>
          <td>
            <button data-bind="click: assignTo" style="cursor: pointer;padding: 5px 20px;background: \#00a8ff;border:none;color:\#fff;">Assign</button>
          </td>
      </tr>
    </script>
    <script type="text/x-kendo-template" id="template-modules-users-module-list-page">
      <tr>
          <td>
            <img src="#=img_url#" width="100"> #=name#
          </td>
          <td>
              <button style="cursor: pointer;padding: 5px 20px;background: \#00a8ff;border:none;color:\#fff;" data-bind="click: removeFrom">Remove</button>
          </td>
      </tr>
    </script>
    <script type="text/x-kendo-template" id="user-profile-action">
      <!--Add User-->
      <div class="page-content">
        <div class="container">
          <div class="row">
              <div class="col-xs-12 col-md-12 col-lg-12">
                  <section class="box-typical edit-company">
                      <div class="hidden-print pull-right">
                          <span class="glyphicon glyphicon-remove glyphicon-size" data-bind="click: cancel"><i></i></span>
                      </div>
                      <h2>User Detail</h2>
                      <div class="divider"></div>
                      
                        <div class="col-md-3 col-lg-3" >
                            <img width="120px" data-bind="attr: {src: current.profile_photo.url}" />
                            <h3>Profile Picture</h3>
                            <input data-role="upload" id="user-image" class="form-control col-md-7 col-xs-12" type="file" data-bind="events: {select: upload}" data-show-file-list="false">
                        </div>
                        <article class="col-md-9 col-lg-9 profile-info-item edit-table">
                            <table >
                                <tr>
                                    <td>Email *</td>
                                    <td>:</td>
                                    <td>
                                        <input type="email" data-bind="disabled: editable, value: current.username" class="form-control"  id="" placeholder="">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Password *</td>
                                    <td>:</td>
                                    <td>
                                        <input type="password" data-bind="value: current.password" class="form-control" id="" placeholder="">
                                    </td>
                                </tr>
                                <tr>
                                    <td>First Name *</td>
                                    <td>:</td>
                                    <td>
                                        <input type="text" data-bind="value: current.first_name" class="form-control" id="" placeholder="">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Last Name *</td>
                                    <td>:</td>
                                    <td>
                                        <input type="text" data-bind="value: current.last_name" class="form-control" id="" placeholder="">
                                    </td>
                                </tr>                              
                                <tr>
                                    <td>Phone</td>
                                    <td>:</td>
                                    <td>
                                        <input type="text" data-bind="value: current.mobile" class="form-control" id="" placeholder="">
                                    </td>
                                </tr>
                                <tr data-bind="visible:showAdmin">
                                    <td>Role</td>
                                    <td>:</td>
                                    <td>
                                        <input id="type"
                                               data-role="dropdownlist"
                                               data-bind="source: userRoles, value: current.role"
                                               data-text-field="name"
                                               data-value-field="id"
                                               data-value-primitive="true"
                                               class="form-control col-md-7 col-xs-12"
                                               type="text"
                                               >
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>
                                    </td>
                                </tr>
                            </table>
                        </article>
                   
                      <div class="box-generic" style="margin-top: 15px;">
                        <button data-role="button" class="k-button btn-save" role="button" aria-disabled="false" tabindex="0" data-bind="click: save">
                            <span class="glyphicon glyphicon-ok"><i></i></span>
                            &nbsp; Save
                        </button>
                        &nbsp;
                        <button data-role="button" class="k-button btn-cancel" role="button " aria-disabled="false" tabindex="0" data-bind="click: cancel">
                            <span class="glyphicon glyphicon-remove"><i></i></span>
                            &nbsp; Cancel
                          </button>
                      </div>
                  </section>
              </div>
          </div>
        </div>
        <div id="ntf1" data-role="notification"></div>
      </div>
    </script>
    <script type="text/x-kendo-template" id="user-profile-action-edit">
      <!--Add User-->
      <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-12 col-lg-12">
                    <section class="box-typical edit-company">
                        <div class="hidden-print pull-right">
                            <span class="glyphicon glyphicon-remove glyphicon-size" data-bind="click: cancel"><i></i></span>
                        </div>
                        <h2>User Detail</h2>
                        <div class="divider"></div>
                        <div class="col-md-3 col-lg-3">
                            <img width="240px" data-bind="attr: {src: current.profile_photo.url}" />
                            <h3>Profile Picture</h3>
                            <input data-role="upload" id="user-image" class="form-control col-md-7 col-xs-12" type="file" data-bind="events: {select: upload}" data-show-file-list="false">
                        </div>
                        <article class="col-md-9 col-lg-9 profile-info-item edit-table">
                            <table >
                                <tr>
                                    <td>Email *</td>
                                    <td>:</td>
                                    <td>
                                        <input type="email" data-bind="disabled: editable, value: current.username" class="form-control" id="" placeholder="">
                                    </td>
                                </tr>
                                <tr>
                                    <td>First Name *</td>
                                    <td>:</td>
                                    <td>
                                        <input type="text" data-bind="value: current.first_name" class="form-control" id="" placeholder="">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Last Name *</td>
                                    <td>:</td>
                                    <td>
                                        <input type="text" data-bind="value: current.last_name" class="form-control" id="" placeholder="">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Phone</td>
                                    <td>:</td>
                                    <td>
                                        <input type="text" data-bind="value: current.mobile" class="form-control" id="" placeholder="">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Role</td>
                                    <td>:</td>
                                    <td>
                                        <input id="type"
                                               data-role="dropdownlist"
                                               data-bind="source: userRoles, value: current.role"
                                               data-text-field="name"
                                               data-value-field="id"
                                               data-value-primitive="true"
                                               class="form-control col-md-7 col-xs-12"
                                               type="text"
                                               >
                                    </td>
                                </tr>
                            </table>
                        </article>
                        <div class="box-generic" style="margin-top: 15px;">
                          <button data-role="button" class="k-button btn-save" role="button" aria-disabled="false" tabindex="0" data-bind="click: save">
                              <span class="glyphicon glyphicon-ok"><i></i></span>
                              &nbsp; Save
                          </button>
                          &nbsp;
                          <button data-role="button" class="k-button btn-cancel" role="button " aria-disabled="false" tabindex="0" data-bind="click: cancel">
                              <span class="glyphicon glyphicon-remove"><i></i></span>
                              &nbsp; Cancel
                            </button>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <div id="ntf1" data-role="notification"></div>
      </div>
    </script>

    <script type="text/x-kendo-template" id="employee-role-form">
      <div>
        <span class="btn" data-bind="click: backToList">X</span>
        <span class="k-button k-button-icontext k-add-button" data-bind="click: addRole"><span class="k-icon k-add"></span>Add new record</span>
        <table class="table">
          <thead>
            <tr>
              <td>ABBR</td>
              <td>Name</td>
              <td>
                <div>
                  <a class="k-button k-edit-button" href="\\#"><span class="k-icon k-edit"></span></a>
                  <a class="k-button k-delete-button" href="\\#"><span class="k-icon k-delete"></span></a>
                </div>
              </td>
            </tr>
          </thead>
          <tbody data-role="listview" data-bind="source: roles" data-template="employee-role-list" data-edit-template="employee-role-list-edit">
          </tbody>
        </table>
      </div>
    </script>
    <script type="text/x-kendo-template" id="employee-role-list">
      <tr>
        <td>#=abbr#</td>
        <td>#=name#</td>
        <td>
          <div>
            <a class="k-button k-edit-button" href="\\#"><span class="k-icon k-edit"></span></a>
            <a class="k-button k-delete-button" href="\\#"><span class="k-icon k-delete"></span></a>
          </div>
        </td>
      </tr>
    </script>
    <script type="text/x-kendo-template" id="employee-role-list-edit">
      <tr>
        <td><input data-bind="value:abbr"></td>
        <td><input data-bind="value:name"></td>
        <td>
          <div>
            <a class="k-button k-update-button" href="\\#"><span class="k-icon k-update"></span></a>
            <a class="k-button k-cancel-button" href="\\#"><span class="k-icon k-cancel"></span></a>
          </div>
        </td>
      </tr>
    </script>
    <!-- cognito -->
    
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
    <script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/js/libs/localforage.min.js"></script>
    <script>
      var banhji = banhji || {};
      var baseUrl = "<?php echo base_url(); ?>";
      var institute = null;
      // Initialize aws userpool
      var userPool = new AWSCognito.CognitoIdentityServiceProvider.CognitoUserPool(poolData);
      var bucket = new AWS.S3({params: {Bucket: 'banhji'}});

      localforage.config({
        driver: localforage.LOCALSTORAGE,
        name: 'userData'
      });


      var image = kendo.Class.extend({
        dataSource: new kendo.data.DataSource({
          transport: {
            read  : {
              url: baseUrl + 'api/images',
              type: "GET",
              dataType: 'json',
              headers: { Institute: JSON.parse(localStorage.getItem('userData/user')) != null ? JSON.parse(localStorage.getItem('userData/user')).institute.id : 0 }
            },
            create  : {
              url: baseUrl + 'api/images',
              type: "POST",
              dataType: 'json',
              headers: { Institute: JSON.parse(localStorage.getItem('userData/user')) != null ? JSON.parse(localStorage.getItem('userData/user')).institute.id : 0 }
            },
            update  : {
              url: baseUrl + 'api/images',
              type: "PUT",
              dataType: 'json',
              headers: { Institute: JSON.parse(localStorage.getItem('userData/user')) != null ? JSON.parse(localStorage.getItem('userData/user')).institute.id : 0 }
            },
            destroy  : {
              url: baseUrl + 'api/images',
              type: "DELETE",
              dataType: 'json',
              headers: { Institute: JSON.parse(localStorage.getItem('userData/user')) != null ? JSON.parse(localStorage.getItem('userData/user')).institute.id : 0 }
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
        current   : null,
        upload    : function(id, myFile) {
          var that = this;
          var dfd = $.Deferred();
          this.query({filter:{field: 'id', value: 2}}).then(function(e){
            that.dataSource.remove(that.dataSource.at(0));
            var files = myFile;
            var key = 'ATTACH_' + JSON.parse(localStorage.getItem('userData/user')).institute.id + "_" + Math.floor(Math.random() * 100000000000000001) +'_'+ files[0].name;
            that.dataSource.add({
              type            : files[0].extension,
              name            : files[0].name,
              key             : key,
              url             : "https://s3-ap-southeast-1.amazonaws.com/banhji/"+key,
              created_at      : new Date(),
              size            : files[0].size,
              file            : files[0].rawFile
            });
            dfd.resolve(that.dataSource.at(0));
          });
          return dfd.promise();
        },
        query     : function(arg) {
          return this.dataSource.query(arg);
        },
        insert    : function(id, data) {
          if(id == null) {
            this.dataSource.add(data);
          } else {
            this.dataSource.insert(id, data);
          }
        },
        save      : function() {
          var that = this;
          var dfd  = $.Deferred();
          this.dataSource.sync();
          this.dataSource.bind("requestEnd", function(e){
            var response = e.response.results;
            //Delete File
            if(e.type=="create"){
              for(var i = 0; i < response.length; i++) {
                var params = { 
                  Body: that.dataSource.data()[0].file, 
                  Key:  that.dataSource.data()[0].key
                };
                bucket.upload(params, function (err, data) {                    
                    // console.log(err, data);
                    // var url = data.Location;
                    if(!err) {
                      dfd.resolve({id: response[0].id, url:response[0].url});
                      // console.log(response[0]);
                      that.dataSource.data([]);
                    }               
                });
              } 
            } else if(e.type == "destroy") {
              $.each(response, function(index, value){                  
                var params = {
                  Delete: { /* required */
                    Objects: [ /* required */
                      {
                        Key: value.key
                      }
                    ]
                  }
                };
                bucket.deleteObjects(params, function(err, data) {
                  //console.log(err, data);
                });
              });
            }
          });
          return dfd.promise();
        } 
      });
      
      banhji.fileManagement = kendo.observable({
        dataSource: new kendo.data.DataSource({
          transport: {
            read  : {
              url: baseUrl + 'api/attachments',
              type: "GET",
              dataType: 'json',
              headers: { Institute: JSON.parse(localStorage.getItem('userData/user')) != null ? JSON.parse(localStorage.getItem('userData/user')).institute.id : 0 }
            },
            create  : {
              url: baseUrl + 'api/attachments',
              type: "POST",
              dataType: 'json',
              headers: { Institute: JSON.parse(localStorage.getItem('userData/user')) != null ? JSON.parse(localStorage.getItem('userData/user')).institute.id : 0 }
            },
            update  : {
              url: baseUrl + 'api/attachments',
              type: "PUT",
              dataType: 'json',
              headers: { Institute: JSON.parse(localStorage.getItem('userData/user')) != null ? JSON.parse(localStorage.getItem('userData/user')).institute.id : 0 }
            },
            destroy  : {
              url: baseUrl + 'api/attachments',
              type: "DELETE",
              dataType: 'json',
              headers: { Institute: JSON.parse(localStorage.getItem('userData/user')) != null ? JSON.parse(localStorage.getItem('userData/user')).institute.id : 0 }
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
        save                : function(contact_id){
          $.each(banhji.fileManagement.dataSource.data(), function(index, value){  
            if(!value.id){
              banhji.fileManagement.dataSource.at(index).set("contact_id", contact_id);
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

      banhji.profileDS = new kendo.data.DataSource({
        transport: {
          read  : {
            url: baseUrl + 'api/profiles',
            type: "GET",
            dataType: 'json'
          },
          update  : {
            url: baseUrl + 'api/profiles',
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

      /* view model*/
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

      banhji.profile = kendo.observable({
        dataSource: banhji.profileDS,
        checkRole  : function(e) {
          e.preventDefault();
        if(JSON.parse(localStorage.getItem('userData/user')).role == 1) {
                banhji.router.navigate("");
              } else {
                window.location.replace("<?php echo base_url(); ?>admin");
              }
        },
        showAdmin: function() {
          if(JSON.parse(localStorage.getItem('userData/user')).role == 1) {
            return true;
          } else {
            return false;
          }
        },
        media: new image(),
        userTypes : [
          {id: 1, name: 'normal'},
          {id: 2, name: 'developer'}
        ],
        userRoles: [
          {id: 1, name: 'Admin'},
          {id: 2, name: 'User'}
        ],
        upload: function(e) {
          var id = this.currentID.profile_photo.id;
          var that = this;
          var fileReader = new FileReader();
          fileReader.onload = function (event) {
            var mapImage = event.target.result;
            // $("#MyImage").attr('src', mapImage);
            banhji.profile.get('currentID').set('profile_photo', {id: "", url: mapImage});
          }
          fileReader.readAsDataURL(e.files[0].rawFile);
          this.media.upload(id, e.files).done(function(data){});
        },
        oldPass: null,
        newPass: null,
        changePassword: function() {
          var userData = {
              Username : userPool.getCurrentUser().username,
              Pool : userPool
          };
          var cognitoUser = new AWSCognito.CognitoIdentityServiceProvider.CognitoUser(userData); 
          if(cognitoUser != null) {
            cognitoUser.getSession(function(err, session) {
              if (err) {
                 alert(err);
                  return;
              }
              console.log('session validity: ' + session.isValid());

              AWS.config.credentials = new AWS.CognitoIdentityCredentials({
                IdentityPoolId : 'us-east-1_56S0nUDS4', // your identity pool id here
                Logins : {
                    // Change the key below according to the specific region your user pool is in.
                    'arn:aws:cognito-idp:us-east-1:260206821052:userpool/us-east-1_56S0nUDS4' : session.getIdToken().getJwtToken()
                }
              });
            });
          }
          cognitoUser.changePassword(this.get('oldPass'), this.get('newPass'), function(err, result) {
              if (err) {
                  $("#ntf1").data("kendoNotification").error("Operation failed.");
                  return;
              } else {
                $("#ntf1").data("kendoNotification").success("Data saved.");
                banhji.users.set('oldPass', null);
                banhji.users.set('newPass', null);
                banhji.router.navigate("");
              }
          });
        },
        getRole   : "User",
        goPassword: function() {
          banhji.router.navigate('passwordChange');
          // mainDash.showIn("#placeholder", password);
        },
        logOut    : function() {
          var userData = {
              Username : userPool.getCurrentUser().username,
              Pool : userPool
          };
          var cognitoUser = new AWSCognito.CognitoIdentityServiceProvider.CognitoUser(userData);
          if(cognitoUser != null) {
              cognitoUser.signOut();
              window.location.replace("<?php echo base_url(); ?>login");
          }
        },
        currentID : null,
        profileUrl : function() {
          return "#profile/" + this.get('currentID').id;
        },
        cancel    : function() {
          if(banhji.profile.dataSource.hasChanges()) {
            banhji.profileDS.cancelChanges();
            banhji.profile.media.dataSource.cancelChanges();
            this.set('currentID', banhji.profileDS.data()[0]);         
          }
          banhji.router.navigate("");
        },
        save      : function() {
          var that = this;
          if(that.media.dataSource.hasChanges()) {
            that.media.save().then(
              function(data) {
                banhji.profile.get('currentID').set('profile_photo', {id: data.id, url: data.url});
                banhji.profile.dataSource.sync();
                // console.log(data);
              }
            );
          } else {
            banhji.profile.dataSource.sync();
          }
          
          banhji.profile.dataSource.bind('requestEnd', function(e){
            var res = e.response;
            if(res.results.length > 0) {
              $("#ntf1").data("kendoNotification").success("Data saved.");
              banhji.router.navigate("");
            } else {
              $("#ntf1").data("kendoNotification").error("Operation failed.");
            }
          });
        }
      });

      banhji.employees = kendo.observable({
        dataSource: new kendo.data.DataSource({
          transport: {
            read  : {
              url: baseUrl + 'api/employees',
              type: "GET",
              dataType: 'json',
              headers: { Institute: JSON.parse(localStorage.getItem('userData/user')) != null ? JSON.parse(localStorage.getItem('userData/user')).institute.id : 0 }
            },
            create  : {
              url: baseUrl + 'api/employees',
              type: "POST",
              dataType: 'json',
              headers: { Institute: JSON.parse(localStorage.getItem('userData/user')) != null ? JSON.parse(localStorage.getItem('userData/user')).institute.id : 0 }
            },
            update  : {
              url: baseUrl + 'api/employees',
              type: "PUT",
              dataType: 'json',
              headers: { Institute: JSON.parse(localStorage.getItem('userData/user')) != null ? JSON.parse(localStorage.getItem('userData/user')).institute.id : 0 }
            },
            destroy  : {
              url: baseUrl + 'api/employees',
              type: "DELETE",
              dataType: 'json',
              headers: { Institute: JSON.parse(localStorage.getItem('userData/user')) != null ? JSON.parse(localStorage.getItem('userData/user')).institute.id : 0 }
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
        users : banhji.userDS,
        currencies : new kendo.data.DataSource({
          transport: {
            read  : {
              url: baseUrl + "api/currencies",
              type: "GET",
              headers: { Institute: JSON.parse(localStorage.getItem('userData/user')) != null ? JSON.parse(localStorage.getItem('userData/user')).institute.id : 0 },
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
          page:1,
          pageSize: 100
        }),
        advanceAC : new kendo.data.DataSource({
          transport: {
            read  : {
              url: baseUrl + "api/accounts",
              type: "GET",
              headers: { Institute: JSON.parse(localStorage.getItem('userData/user')) != null ? JSON.parse(localStorage.getItem('userData/user')).institute.id : 0 },
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
          filter: [
            { field:"account_type_id", value: 11 },
            { field:"status", value: 1 }
          ],
          sort: { field:"number", dir:"asc" },
          batch: true,
          serverFiltering: true,
          serverSorting: true,
          serverPaging: true,
          page:1,
          pageSize: 100
        }),
        salaryAC  : new kendo.data.DataSource({
          transport: {
            read  : {
              url: baseUrl + "api/accounts",
              type: "GET",
              headers: { Institute: JSON.parse(localStorage.getItem('userData/user')) != null ? JSON.parse(localStorage.getItem('userData/user')).institute.id : 0 },
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
          filter: [
            { field:"account_type_id", value: 37 },
            { field:"status", value: 1 }
          ],
          sort: { field:"number", dir:"asc" },
          batch: true,
          serverFiltering: true,
          serverSorting: true,
          serverPaging: true,
          page:1,
          pageSize: 100
        }),
        fileMan   : banhji.fileManagement,
        goRole   : function() {
          layout.showIn("#container", mainDash);
          mainDash.showIn("#placeholder", role);
        },
        setCurrent: function(current) {
          var that = this;
          this.set('current', current);
          this.payrollDS.query({filter: {'field' : 'contact_id', 'value': current.id}}).
          then(function(e){
            if(that.payrollDS.data().length > 0) {
              that.set('payroll', that.payrollDS.data()[0]);
            } else {
              banhji.employees.payrollDS.insert(0,{
                children: 0,
                city: null,
                contact_id: that.get('current').id,
                country: null,
                emergency_name: null,
                emergency_name: null,
                employeement_date: null,
                married_status: 0,
                nationality: null
              });
              banhji.employees.set('payroll', banhji.employees.payrollDS.at(0));
            }
            
          });
        },
        marriedStatus: [
          { id: 0, name: 'Single'},
          { id: 1, name: 'Married'}
        ],
        refresh: function() {
          $('#user-spinwhile').addClass('fa-spin');
          banhji.employees.dataSource.read().then(function() {
            $('#user-spinwhile').removeClass('fa-spin');
          });
        },
        roles     : new kendo.data.DataSource({
          transport: {
            read  : {
              url: baseUrl + 'api/employees/roles',
              type: "GET",
              dataType: 'json',
              headers: { Institute: JSON.parse(localStorage.getItem('userData/user')) != null ? JSON.parse(localStorage.getItem('userData/user')).institute.id : 0 }
            },
            create  : {
              url: baseUrl + 'api/employees/roles',
              type: "POST",
              dataType: 'json',
              headers: { Institute: JSON.parse(localStorage.getItem('userData/user')) != null ? JSON.parse(localStorage.getItem('userData/user')).institute.id : 0 }
            },
            update  : {
              url: baseUrl + 'api/employees/roles',
              type: "PUT",
              dataType: 'json',
              headers: { Institute: JSON.parse(localStorage.getItem('userData/user')) != null ? JSON.parse(localStorage.getItem('userData/user')).institute.id : 0 }
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
        payrollDS : new kendo.data.DataSource({
          transport: {
            read  : {
              url: baseUrl + 'api/payrolls',
              type: "GET",
              dataType: 'json',
              headers: { Institute: JSON.parse(localStorage.getItem('userData/user')) != null ? JSON.parse(localStorage.getItem('userData/user')).institute.id : 0 }
            },
            create  : {
              url: baseUrl + 'api/payrolls',
              type: "POST",
              dataType: 'json',
              headers: { Institute: JSON.parse(localStorage.getItem('userData/user')) != null ? JSON.parse(localStorage.getItem('userData/user')).institute.id : 0 }
            },
            update  : {
              url: baseUrl + 'api/payrolls',
              type: "PUT",
              dataType: 'json',
              headers: { Institute: JSON.parse(localStorage.getItem('userData/user')) != null ? JSON.parse(localStorage.getItem('userData/user')).institute.id : 0 }
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
        statusDS  : [
          {id: 0, value: "inactive"},
          {id: 1, value: "active"}
        ],
        genderDS  : [
          {id: "M", value: "Male"},
          {id: "F", value: "Female"}
        ],
        typeChange: function(e) {
          var type = e.sender.dataSource.at(e.sender.selectedIndex - 1);
          banhji.employees.get('current').set('abbr', type.abbr);
          console.log();
        },
        addNew    : function() {
          banhji.employees.dataSource.insert(0, {
            name: "",
            gender: "",
            number: "",
            is_fulltime: false,
            role: {id: 0, name: ""},
            status: 1,
            phone: "",
            email: "",
            address: "",
            memo: "",
            bill_to: "",
            ship_to: "",
            abbr: "",
            currency: {id: 2},
            userid: 0,
            account: {id: 0, name: null},
            salary: {id: 0, name: null},
            registered_date: new Date()
          });
          banhji.employees.payrollDS.insert(0,{
            children: 0,
            city: null,
            country: null,
            emergency_name: null,
            emergency_name: null,
            employeement_date: null,
            married_status: 0,
            nationality: null
          });
          banhji.employees.setCurrent(banhji.employees.dataSource.at(0));
          banhji.employees.set('payroll', banhji.employees.payrollDS.at(0));
          banhji.router.navigate('employee/new');
        },
        edit      : function(e) {
          banhji.employees.setCurrent(e.data);
          banhji.router.navigate('employee/edit');
        },
        remove    : function(e) {
          banhji.employees.dataSource.remove(e.data);
          var agree = confirm("Are you sure you want to delete?");
          if(agree) {
            this.save();
          } else {
            this.cancel();
          }
        },
        cancel    : function() {
          if(banhji.employees.dataSource.hasChanges()) {
            banhji.employees.dataSource.cancelChanges();
            banhji.employees.payrollDS.cancelChanges();
          }
          banhji.router.navigate("employeelist");
        },
        addRole   : function() {
          this.roles.insert(0, {abbr: null, name: null});
        },
        backToList: function() {
          mainDash.showIn("#placeholder", employee);
        },
        save      : function() {
          if( banhji.employees.dataSource.hasChanges()) {
            banhji.employees.dataSource.sync();
            banhji.employees.dataSource.bind('requestEnd', function(e){
              if(e.type != "read") {
                if(e.response) {
                  if(e.type == 'create') {
                    banhji.employees.fileMan.save(e.response.results[0].id);
                    banhji.employees.get('payroll').set('contact_id', e.response.results[0].id);
                    if(banhji.employees.payrollDS.data()[0].dirty) {
                      banhji.employees.payrollDS.sync();
                    }
                    // banhji.employees.addNew();
                  } else if(e.type == 'update') {
                    if(banhji.employees.payrollDS.data()[0].dirty) {
                      banhji.employees.payrollDS.sync();
                    }
                  }                
                  $("#ntf1").data("kendoNotification").success("Data saved.");
                  banhji.router.navigate('employeelist');
                } else {
                  $("#ntf1").data("kendoNotification").error("Operation failed");
                }
              }
            });
          } else {
            banhji.employees.fileMan.save(this.get('current').id);
            banhji.employees.payrollDS.sync();
            banhji.employees.payrollDS.bind('requestEnd', function(e) {
              if(e.response && e.type != 'read') {
                $("#ntf1").data("kendoNotification").success("Data saved.");
              } else {
                $("#ntf1").data("kendoNotification").error("Operation failed");
              }
            });
          }
        },
        saveClose: function() {
          banhji.employees.dataSource.sync();
          banhji.employees.dataSource.bind('requestEnd', function(e){
            if(e.response) {
              $("#ntf1").data("kendoNotification").success("Data saved.");
              banhji.employees.fileMan.save(e.response.results[0].id);
              banhji.router.navigate("");
            } else {
              //
            }
          });
        }
      });

      banhji.users = kendo.observable({
        users : banhji.userDS,
        cModules: banhji.moduleDS,
        media    : new image(),
        showAdmin: function() {
          var admin = JSON.parse(localStorage.getItem('userData/user')) != null ? JSON.parse(localStorage.getItem('userData/user')).role : 0;
          if(admin == 1) {
            return true;
          } else {
            return false;
          }
        },
        editable: function() {
          if(banhji.users.get('current').isNew()) {
            return false;
          } else {
            return true;
          }
          // return true;
        },

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
          serverPaging: true,
          pageSize: 50
        }),
        getProfile: function(e) {
          e.preventDefault()
          banhji.users.setCurrent(e.data);
          banhji.router.navigate('profile/' + e.data.id);
        },
        code  : '',
        backToProfile: function() {
          banhji.router.navigate('userlist');
        },
        saveAssign: function() {
          this.modules.sync();
          this.modules.bind('requestEnd', function(e){
            var res = e.response;
            if(res.results.length > 0 && e.type != 'read') {
              $("#ntf1").data("kendoNotification").success("Data saved.");
              banhji.router.navigate('userlist');
            } else if(res.results.length < 0 ) {
              $("#ntf1").data("kendoNotification").error("Operation failed.");
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
              href: e.data.href,
              img_url: e.data.image_url
            });
          }
        },
        removeFrom: function(e) {
          // this.users.remove(e.data);
          // var that = this;
          // var userData = {
          //     Username : e.data.username,
          //     Pool : userPool
          // };
          // var cognitoUser = new AWSCognito.CognitoIdentityServiceProvider.CognitoUser(userData);
          // cognitoUser.deleteUser(function(err, result) {
          //   if (err) {
          //       alert(err);
          //       return;
          //   }
            
          // });
          // that.users.remove(e.data);
          // that.users.sync();
          // that.users.bind('requestEnd', function(e){
          //   if(e.type == 'delete') {
          //     console.log('deleted');
          //   }
          // });
          this.modules.remove(e.data);
        },
        upload: function(e) {
          var id = this.get('current').profile_photo.id;
          var that = this;
          var fileReader = new FileReader();
          fileReader.onload = function (event) {
            var mapImage = event.target.result;
            // $("#MyImage").attr('src', mapImage);
            banhji.users.get('current').set('profile_photo', {id: "", url: mapImage});
          }
          fileReader.readAsDataURL(e.files[0].rawFile);
          this.media.upload(id, e.files).done(function(data){});
        },
        assign : function() {
          // index.showIn('#app-placeholder', userlist);
          layout.showIn("#main-display-container", assign);
        },
        oldPass: null,
        newPass: null,
        changePassword: function() {
          var userData = {
              Username : userPool.getCurrentUser().username,
              Pool : userPool
          };
          var cognitoUser = new AWSCognito.CognitoIdentityServiceProvider.CognitoUser(userData); 
          if(cognitoUser != null) {
            cognitoUser.getSession(function(err, session) {
              if (err) {
                 alert(err);
                  return;
              }
              console.log('session validity: ' + session.isValid());

              AWS.config.credentials = new AWS.CognitoIdentityCredentials({
                IdentityPoolId : 'us-east-1_56S0nUDS4', // your identity pool id here
                Logins : {
                    // Change the key below according to the specific region your user pool is in.
                    'arn:aws:cognito-idp:us-east-1:260206821052:userpool/us-east-1_56S0nUDS4' : session.getIdToken().getJwtToken()
                }
              });
            });
          }
          cognitoUser.changePassword(this.get('oldPass'), this.get('newPass'), function(err, result) {
              if (err) {
                  alert(err);
                  return;
              } else {
                banhji.users.set('oldPass', null);
                banhji.users.set('newPass', null);
              }
              console.log('call result: ' + result);
          });
        },
        forgotPassword: function(e) {
            e.preventDefault();
            var userData = {
                Username : userPool.getCurrentUser().username,
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
        refresh: function() {
          $('#user-spinwhile').addClass('fa-spin');
          banhji.users.users.read().then(function() {
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
        userRoles: [
          {id: 1, name: 'Admin'},
          {id: 2, name: 'User'}
        ],
        showModule: function() {
          layout.showIn("#main-display-container", userlMod);
        },
        showForm: function() {
          JSON.parse(localStorage.getItem('userData/user')) ? JSON.parse(localStorage.getItem('userData/user')) : "";
          this.users.insert(0, {
            username: null,
            first_name: null,
            last_name: null,
            email: null,
            mobile: null,
            profile_photo: "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/blank.png",
            company: {id: JSON.parse(localStorage.getItem('userData/user')).institute.id, name:''},
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
            banhji.users.media.dataSource.cancelChanges();
            // this.set('current', this.get('current'));
          }
          banhji.router.navigate('userlist');
        },
        cancelAssign: function() {
          if(this.modules.hasChanges()) {
            this.modules.cancelChanges();
          }
          banhji.router.navigate('userlist');
        },
        showFormEdit: function(e) {
          banhji.users.setCurrent(e.data);
          banhji.router.navigate('userlist/edit');
        },
        editProfile: function() {
          banhji.router.navigate('userlist/edit');
        },
        resendConfirm: function() {
          cognitoUser.resendConfirmationCode(function(err, result) {
            if (err) {
              alert(err);
              return;
            }
            console.log('call result: ' + result);
          });
        },
        showConfirm: function(e){
          this.setCurrent(e.data);
          var win = $('#userFormConfirm').kendoWindow({
            width: "600px",
            title: e.data.username,
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
          banhji.users.users.insert(0, {
            username: '',
            first_name: '',
            last_name: '',
            email: '',
            mobile: '',
            profile_photo: {id: 2, url:"https://s3-ap-southeast-1.amazonaws.com/banhji/52751311555449544_blank.png"},
            company: {id: JSON.parse(localStorage.getItem('userData/user')).institute.id, name:''},
            role: 2,
            facebook: '',
            linkedin: '',
            twitter: '',
            usertype: 2
          });
          banhji.users.setCurrent(banhji.users.users.at(0));
          banhji.router.navigate('userlist/new');
        },
        edit: function(e) {
          banhji.router.navigate('userlist/' + e.data.id);
        },
        confirm: function(e) {
          e.preventDefault();
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
          });
        },
        save: function() {
          var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
          var errors = [];
          if(re.test(this.get('current').username) == false){
            errors.push({msg:"Invalid email address"});
          }
          if(this.get('current').password.length < 8) {
            errors.push({msg:"Password must be at 8 characters with letters and numbers"});
          } 
          if(this.get('current').first_name == "") {
            errors.push({msg:"Name is required."});
          }
          if(this.get('current').last_name == "") {
            errors.push({msg:"Last name is required"});
          }
          if(errors.length > 0) {
            var msg = "";
            for(var i = 0; i < errors.length; i++) {
              msg += errors[i].msg + "\n";
            }
            alert(msg);
          } else {
            if(banhji.users.get('current').isNew()) {
              var attributeList = [];

              var dataEmail = {
                  Name : 'email',
                  Value : banhji.users.get('current').username
              };

              var attributeEmail = new AWSCognito.CognitoIdentityServiceProvider.CognitoUserAttribute(dataEmail);

              attributeList.push(attributeEmail);

              userPool.signUp(banhji.users.get('current').username, banhji.users.get('current').password, attributeList, null, function(err, result){
                  if (err) {
                    alert(err);
                    return;
                  }
                  if(banhji.users.media.dataSource.hasChanges()) {
                    banhji.users.media.save().then(function(data){
                      banhji.users.get('current').set('profile_photo', {id: data.id, url: data.url});
                      banhji.users.users.sync();
                    });
                  } else {
                    banhji.users.users.sync();
                  }
              });
            } else {
              if(banhji.users.media.dataSource.hasChanges()) {
                banhji.users.media.save().then(function(data){
                  banhji.users.get('current').set('profile_photo', {id: data.id, url: data.url});
                  banhji.users.users.sync();
                });
              } else {
                banhji.users.users.sync();
              }
            }
          }
          
          banhji.userDS.bind('requestEnd', function(e){
            var res = e.response, type = e.type;
            if(res.results.length > 0) {
              if(type != 'read'){
                $("#ntf1").data("kendoNotification").success("Data saved.");
              }              
              banhji.router.route('userlist');
            } else {
              $("#ntf1").data("kendoNotification").error("Operation failed.");
            }
          });
        }
      });

      banhji.company = kendo.observable({
        dataStore: banhji.companyDS,
        data: '',
        media: new image(),
        modules: banhji.moduleDS,
        countries: banhji.countries,
        industries: banhji.industry,
        currencies: banhji.currencies,
        appSub: 0,
        lastLogin: 0,
        employees: banhji.employees,
        users   : banhji.users,
        userProfile: banhji.profile,
        showLogoEdit: true,
        retrieve: function() {
          var dfd = $.Deferred();

          localforage.getItem('user', function (err, value) {
            if(!err) {
              dfd.resolve(value.institute);
            } else {
              dfd.reject(err);
            }
          });
          return dfd.promise();
        },
        goUser: function() {
          banhji.router.navigate('userlist');
          // mainDash.showIn("#placeholder", user);
        },
        goEmployee: function() {
          banhji.router.navigate('employeelist');
          // mainDash.showIn("#placeholder", employee);
        },
        goCompany: function() {
          banhji.router.navigate('company');
          // mainDash.showIn("#placeholder", company);
        },
        showLogo: function(e) {
          e.preventDefault();
          this.get('showLogoEdit') == true ? this.set('showLogoEdit', false) : this.set('showLogoEdit', true);
        },
        goModule    : function() {
          // banhji.moduleDS.filter({field: 'id', value: JSON.parse(localStorage.getItem('userData/user')).institute.id});
          // mainDash.showIn("#placeholder", instituteModule);
          banhji.router.navigate("");
        },
        goProfile   : function() {
          banhji.router.navigate("profile");
        },
        onLogoChange: function() {
          var fileChooser = document.getElementById('companyLogo');
          var file = fileChooser.files[0];
          var fileReader = new FileReader();
          fileReader.onload = function(e){
           banhji.company.get('current').set('logo', e.target.result);
          }
          fileReader.readAsDataURL(file);
          banhji.company.set('logoChange', true);
        },
        setCurrent: function(current) {
          this.set('current', current);
        },
        getModule: function() {
          index.showIn('#app-placeholder', modeleView);
        },
        close: function() {
          banhji.company.dataStore.cancelChanges();
          banhji.router.navigate('');
        },
        taxRegimes: [
          {id:'small', value: 'Small'},
          {id:'medium', value: 'Medium'},
          {id:'large', value: 'Large'}
        ],
        upload: function(e) {
          // var fileChooser = document.getElementById('companyLogo');
          // var file = fileChooser.files[0];
          // if (file) {
          //   var params = {Key: Math.floor(Math.random() * 100000000000000001)+ '_' +file.name , ContentType: file.type, Body: file};
          //   bucket.upload(params, function (err, data) {
          //     banhji.company.dataStore.data()[0].set('logo', data.Location);
          //   });
          // }
          var id = this.get('current').logo.id;
          var that = this;
          var fileReader = new FileReader();
          fileReader.onload = function (event) {
            var mapImage = event.target.result;
            // $("#MyImage").attr('src', mapImage);
            banhji.company.get('current').set('logo', {id: "", url: mapImage});
          }
          fileReader.readAsDataURL(e.files[0].rawFile);
          this.media.upload(id, e.files).done(function(data){});
        },
        edit: function() {
          banhji.router.navigate('company/edit');
        },
        logoChange: false,
        cancel: function() {
          if(this.dataStore.hasChanges()) {
            this.dataStore.cancelChanges();
          }
          banhji.router.navigate('');
        },
        save: function() {
          if(banhji.company.media.dataSource.hasChanges()) {
            banhji.company.media.save().then(function(data){
              banhji.company.get('current').set('logo', {id: data.id, url: data.url});
              banhji.company.dataStore.sync();
            });
          } else {
            banhji.company.dataStore.sync();
          } 
          
          banhji.company.dataStore.bind('requestEnd', function(e){
            var res = e.response;
            if(res.results.length > 0) {
              $("#ntf1").data("kendoNotification").success("Data saved.");
              // institute.showIn('#companyInfoPlaceholder', instInfo);
              // console.log("kdsslfds");
              //
              banhji.company.setCurrent(res.results[0]);
              var appData = JSON.parse(localStorage.getItem('userData/user'));
              localforage.removeItem('user').then(function() {
                var data = {id: appData.id, username: appData.username, role: appData.role, institute: res.results[0]};
                localforage.setItem('user', data).then(function (value) {
                    console.log(value);
                }).catch(function(err) {
                    console.log(err);
                });
              }).catch(function(err) {
                  // This code runs if there were any errors
                  console.log(err);
              });

              banhji.router.navigate('company');
            } else {
              $("#ntf1").data("kendoNotification").error("Operation failed.");
            }
          });         
        }
      });

      // index view
      var layout = new kendo.Layout('#placeholder');
      var menu = new kendo.View('#header-menu', {model: banhji.profile});
      var mainDash = new kendo.Layout('#companyDash', {model: banhji.company});
      var company = new kendo.Layout('#template-placeholder-company', {model: banhji.company});
      var dash = new kendo.View('#template-dashboard', {model: banhji.company});
      var user = new kendo.View('#template-placeholder-user', {model: banhji.users});
      var userForm= new kendo.View('#user-profile-action', {model: banhji.users});
      var userEdit= new kendo.View('#user-profile-action-edit', {model: banhji.users});
      var userNew= new kendo.View('#template-userlist-form-new-page', {model: banhji.users});
      var empEdit= new kendo.View('#employee-action', {model: banhji.employees});
      var instituteModule = new kendo.View('#template-placeholder-module', {model: banhji.company});
      var instInfo = new kendo.View('#template-createcompany-info-page', {model: banhji.company});
      var instEdit = new kendo.View('#company-edit', {model: banhji.company});
      var loading = new kendo.View('#template-waiting-page');
      var employee = new kendo.View('#template-placeholder-employee', { model: banhji.employees});
      var modeleView = new kendo.View('#template-modules-page', { model: banhji.company});
      var profile = new kendo.Layout('#user-profile', {model: banhji.profile});
      var profileMod = new kendo.View('#user-profile-modules', {model: banhji.users});
      var assign = new kendo.View('#template-assign-module-to-page', {model: banhji.users});
      var password = new kendo.View('#template-user-password', {model: banhji.profile});
      var role = new kendo.View('#employee-role-form', {model: banhji.employees});
      // router initization
      banhji.router = new kendo.Router({
        init: function() {
            if(userPool.getCurrentUser()) {
              layout.render("#main");
              
              institute = JSON.parse(localStorage.getItem('userData/user')) != null ? JSON.parse(localStorage.getItem('userData/user')).institute.id : 0;
              
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
        var admin = JSON.parse(localStorage.getItem('userData/user')) != null ? JSON.parse(localStorage.getItem('userData/user')).role : 0;
          if(admin != 1) {
          banhji.users.users.filter([
            {field: 'id', value: JSON.parse(localStorage.getItem('userData/user')) != null ? JSON.parse(localStorage.getItem('userData/user')).institute.id : 0},
            {field: 'id', operator: 'user', value:JSON.parse(localStorage.getItem('userData/user')) != null ? JSON.parse(localStorage.getItem('userData/user')).id : 0}
          ]);
          banhji.users.users.bind('requestEnd', function(e){
            if(e.response) {
              banhji.users.setCurrent(e.response.results[0]);
              banhji.users.modules.filter({field: 'id', value: JSON.parse(localStorage.getItem('userData/user')) != null ? JSON.parse(localStorage.getItem('userData/user')).id : 0});
              layout.showIn("#container", mainDash);
              mainDash.showIn("#placeholder", profileMod);
            }
          });
        } else {
          banhji.companyDS.fetch(function() {
            banhji.company.set('data', banhji.companyDS.data()[0]);
            banhji.moduleDS.filter({field: 'id', value: JSON.parse(localStorage.getItem('userData/user')) != null ? JSON.parse(localStorage.getItem('userData/user')).institute.id : 0});
            banhji.moduleDS.bind('requestEnd', function(e){
              if(e.response) {
                banhji.company.setCurrent(banhji.companyDS.data()[0]);
                banhji.company.set('appSub', e.response.results.length || 0);
                banhji.company.set('data', banhji.companyDS.data()[0].users);
                banhji.company.set('lastLogin', banhji.companyDS.data()[0].lastLogin);
                // console.log(e.response.results[0]);
                banhji.userDS.filter([
                  {field: 'id', value: institute.id},
                  {field: 'id <>', operator: "user", value: JSON.parse(localStorage.getItem('userData/user')) != null ? JSON.parse(localStorage.getItem('userData/user')).id : 0}
                ]);
              }            
            });
            banhji.users.modules.filter({field: 'id', value: JSON.parse(localStorage.getItem('userData/user')) != null ? JSON.parse(localStorage.getItem('userData/user')).id : 0});
          });
          layout.showIn("#container", mainDash);
          // mainDash.showIn("#placeholder", instituteModule);
          mainDash.showIn("#placeholder", profileMod);
        }
      });

      banhji.router.route('userlist/new', function() {
        if(banhji.profileDS.data()[0] && banhji.profileDS.data()[0].role != 1) {
          banhji.router.navigate("profile/"+banhji.profileDS.data()[0].id);
        }
        layout.showIn("#container", userForm);
      });

      banhji.router.route('userlist/edit', function() {
        if(banhji.profileDS.data()[0] && banhji.profileDS.data()[0].role != 1) {
          banhji.router.navigate("profile/"+banhji.profileDS.data()[0].id);
        }
        layout.showIn("#container", userEdit);
      });

      banhji.router.route('userlist', function(id) {
        layout.showIn("#container", mainDash);
        banhji.userDS.filter([
          {field:"id", value: JSON.parse(localStorage.getItem('userData/user')).institute.id},
          {field:"id <> ", operator: 'user', value: JSON.parse(localStorage.getItem('userData/user')).id},
        ]);
        mainDash.showIn("#placeholder", user);
      });

      banhji.router.route('employeelist', function(){
        layout.showIn("#container", mainDash);
        mainDash.showIn("#placeholder", employee);
      });

      banhji.router.route('company', function(){
        layout.showIn("#container", mainDash);
        mainDash.showIn("#placeholder", company);
      });

      banhji.router.route('passwordChange', function(){
        layout.showIn("#container", mainDash);
        mainDash.showIn("#placeholder", password);
      });

      banhji.router.route('company/edit', function() {
        if(banhji.profileDS.data()[0] && banhji.profileDS.data()[0].role != 1) {
          banhji.router.navigate("profile/"+banhji.profileDS.data()[0].id);
        }
        layout.showIn("#container", instEdit);
      });

      banhji.router.route('profile', function() {
        layout.showIn("#container", profile);
        // if(banhji.users.get('current')){
        //   profile.showIn("#profile-placeholder", profileMod);
        //   banhji.users.modules.filter({field: 'id', value: id});
        // } else {
        //   banhji.users.users.filter([
        //     {field: 'id', value: JSON.parse(localStorage.getItem('userData/user')).institute.id},
        //     {field: 'id', operator: 'user', value: id}
        //     ]);
        //   banhji.users.users.bind('requestEnd', function(e){
        //     if(e.response) {
        //       banhji.users.setCurrent(e.response.results[0]);
        //       banhji.users.modules.filter({field: 'id', value: id});
        //       profile.showIn("#profile-placeholder", profileMod);
        //     }
        //   });
        // }
        
        // banhji.users.setCurrent(banhji.users.users.get(id));
      });

      banhji.router.route('assignto/:id', function(id) {
        if(banhji.profileDS.data()[0] && banhji.profileDS.data()[0].role != 1) {
          banhji.router.navigate("profile/"+banhji.profileDS.data()[0].id);
        }
        // layout.showIn("#container", profile);
        // profile.showIn("#profile-placeholder", profileMod);
        banhji.users.setCurrent(banhji.users.users.get(id));
        banhji.users.modules.filter({field: 'id', value: id});
        // banhji.users.modules.filter({field: 'username', value: banhji.users.users.get(id).username});
        // layout.showIn("#container", mainDash);
        mainDash.showIn("#placeholder", assign);
        // profile.showIn("#profile-placeholder", assign);
      });

      banhji.router.route('password', function() {
        mainDash.showIn("#placeholder", password);
        // profile.showIn("#profile-placeholder", password);
      });

      banhji.router.route('employee/new', function(){
        if(banhji.profileDS.data()[0] && banhji.profileDS.data()[0].role != 1) {
          banhji.router.navigate("profile/"+banhji.profileDS.data()[0].id);
        }
        layout.showIn("#container", empEdit);
      });

      banhji.router.route('employee/edit', function(){
        if(banhji.profileDS.data()[0] && banhji.profileDS.data()[0].role != 1) {
          banhji.router.navigate("profile/"+banhji.profileDS.data()[0].id);
        }
        banhji.fileManagement.dataSource.filter({field: 'contact_id', value: banhji.employees.get('current').id});
        layout.showIn("#container", empEdit);
      });


      $(document).ready(function() {
        banhji.profileDS.read().then(function(e){

          banhji.profile.set('currentID', banhji.profileDS.data()[0]);
          layout.showIn('#menu', menu);
          if(banhji.profileDS.data()[0].role == 1) {
            banhji.profile.set('getRole', "Admin");
          }

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
          console.log('init');
        });
        banhji.router.start();
        localforage.getItem('user').then(function(value) {
          if(value == null) {
            window.location.replace(baseUrl + "login");
          }
        }).catch(function(err) {
          console.log(err);
        });
        // localforage.getItem('user', function(err, value) {
        //     if(err) {
        //        window.location.replace(baseUrl + "login");
        //        console.log(err);
        //     } else {
        //       console.log(value);
        //     }
        //     console.log('getlocal');
        // });
      });
    </script>
  </body>
</html>
