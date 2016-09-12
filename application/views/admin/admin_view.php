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
      <div class="main_container" id="placeholder">
        <div id="menu"></div>
        <div id="container"></div>
      </div>
    </div>
    <script type="text/x-kendo-template" id="header-menu">
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
                                  <span style="color:#fff;" data-bind="text: currentID.username"></span>
                              </button>
                              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd-user-menu">
                                  <a class="dropdown-item" data-bind="attr: {href: profileUrl}"><span class="font-icon glyphicon glyphicon-user"></span>Profile</a>
                                  <div class="dropdown-divider"></div>
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
                                  <img data-bind="attr: {src: userProfile.currentID.profile_photo}">
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
                              <div class="profile-card-location">
                                  Confirm: <span>True</span>
                              </div>
                          </div>
                          <div class="profile-statistic tbl">
                            <button type="button" class="btn btn-block goto-banhji">BanhJi App</button>
                            <button type="button" class="btn btn-block goto-banhji" data-bind="click: goCompany">Company Info</button>
                            <button type="button" class="btn btn-block goto-banhji" data-bind="click: goUser">Users</button>
                            <button type="button" class="btn btn-block goto-banhji" data-bind="click: goEmployee">Employees</button>
                          </div>

                          <div class="profile-statistic tbl">
                              <div class="tbl-row">
                                  <div class="tbl-cell">
                                      <b><span data-bind="text: modules.total"></span></b>
                                      Assign Module
                                  </div>
                              </div>
                          </div>
                          <ul class="profile-links-list">
                              <li class="nowrap">
                                  <i class="font-icon font-icon-fb-fill"></i>
                                  <a data-bind="attr: {href: userProfile.currentID.facebook}"><span data-bind="text: userProfile.currentID.facebook"></span></a>
                              </li>
                              <li class="nowrap">
                                  <i class="font-icon font-icon-in-fill"></i>
                                  <a data-bind="attr: {href: userProfile.currentID.linkedin}><span data-bind="text: userProfile.currentID.linkedin"></span></a>
                              </li>
                              <li class="nowrap">
                                  <i class="font-icon font-icon-tw-fill"></i>
                                  <a data-bind="attr: {href: userProfile.currentID.twitter}><span data-bind="text: userProfile.currentID.twitter"></span></a>
                              </li>
                          </ul>
                      </section>
                  </div>

                  <div class="col-xs-12 col-md-8 col-lg-9">
                      <section class="row">
                          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                              <div class="widget widget-3">
                                  <div class="widget-head">
                                      <h4 class="heading">
                                          User</h4>
                                  </div>
                                  <div class="widget-body alert alert-primary" style="background: #496cad;">
                                      <div align="center" class="text-large strong"><span data-bind="text: data"></span></div>
                                      <a  style="color: #fff;" data-bind="click: users.addUser">Add User</a>
                                  </div>
                              </div>
                          </div>

                          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                             <div class="widget widget-3">
                                  <div class="widget-head">
                                      <h4 class="heading">
                                          Assigned Module
                                      </h4>
                                  </div>
                                  <div class="widget-body alert" style="color: #333; background: #d9edf7;">
                                      <div align="center"  class="text-large strong"><span data-bind="text: appSub"></span></div>
                                      <a  href="#" data-bind="click: getModule">Modules/Apps</a>
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
                                      <a style="color: #fff;" href="#" data-bind="click: getModule">the last 30 days</a>
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
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                            <button class="btn btn-primary">Cancel</button>
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
          <td>
            <button data-bind="click: edit">Edit</button>
            <button data-bind="click: remove">Remove</button>
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
                                </tr>
                                <tr>
                                    <td>Number</td>
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
                                </tr>                                
                            </table>
                          </div>
                        </article>
                        <section class="tabs-section">
                          <div class="tabs-section-nav tabs-section-nav-inline">
                            <ul class="nav" role="tablist">
                              <li class="nav-item">
                                <a class="nav-link active" href="#tabs-4-tab-1" role="tab" data-toggle="tab" aria-expanded="false">
                                  Contact
                                </a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#tabs-4-tab-2" role="tab" data-toggle="tab" aria-expanded="false">
                                  Accounts
                                </a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#tabs-4-tab-3" role="tab" data-toggle="tab" aria-expanded="false">
                                  Document
                                </a>
                              </li>
                            </ul>
                          </div><!--.tabs-section-nav-->

                          <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="tabs-4-tab-1" aria-expanded="false">
                              <table class="table">
                                <tr>
                                  <td>status</td>
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
                                  <td></td>
                                  <td>registered date</td>
                                  <td><input type="text" data-role="datepicker" data-bind="value: current.registered_date"></td>
                                </tr>
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
                                <tr>
                                  <td>ship to</td>
                                  <td><input type="text" class="k-textbox" data-bind="value: current.ship_to"></td>
                                  <td></td>
                                  <td>bill to</td>
                                  <td><input type="text" class="k-textbox" data-bind="value:current.bill_to"></td>
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
                                      data-bind="source: statusDS, value: current.status"
                                      data-text-field="value"
                                      data-value-field="id"
                                      data-value-primitive="true"
                                      class="form-control col-md-7 col-xs-12"
                                      type="text"
                                    >
                                  </td>
                                  <td>
                                    Salary Account<br>
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
                                  <td>
                                    Currency<br>
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
                            </div><!--.tab-pane-->
                            <div role="tabpanel" class="tab-pane fade" id="tabs-4-tab-3" aria-expanded="false">Tab 3</div><!--.tab-pane-->
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
      </div>
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
                              <td>Year Founded</td>
                              <td>:</td>
                              <td>
                                <input type="text" class="form-control" id="" placeholder="" data-bind="value: current.year_founded">
                              </td>
                            </tr>
                            <tr>
                              <td>Country</td>
                              <td>:</td>
                              <td>
                                <input type="text" class="form-control" id="" placeholder="" data-bind="value: current.country.name">
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
                                  <td>Fiscal Date</td>
                                  <td>:</td>
                                  <td>
                                    <input type="text" 
                                      data-role="datepicker" 
                                      class="form-control"
                                      data-format="dd-mm" 
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
                                      data-text-field="code">
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
                                  <td>Fiscal Report Date</td>
                                  <td>:</td>
                                  <td>
                                    <input type="text" 
                                      data-role="datepicker"
                                      data-format="dd-mm"
                                      class="form-control" 
                                      data-bind="value: current.financial_report_date">
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
                            </table>
                        </article>
                        <div class="box-generic">
                          <button data-role="button" class="k-button btn-save" role="button" aria-disabled="false" tabindex="0" data-bind="click: save">
                              <span class="glyphicon glyphicon-ok" data-bind="click: cancel"><i></i></span>
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
      </div>
    </script>
    <!-- user placeholder -->
    <script type="text/x-kendo-template" id="template-placeholder-module">
      <div data-role="listview" data-bind="source: modules" data-template="company-modules"></div>
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
        <img data-bind="attr: {src: current.logo}"><br><br>
        <a href="\#" data-bind="visible: showLogoEdit, events: {click: showLogo}">Edit Logo</a>
        <input type="file" id="companyLogo" data-bind="invisible: showLogoEdit, events: {change: onLogoChange}"><br>
        <button class="btn" data-bind="invisible: showLogoEdit, events: {click: upload}">Save</button>
        <button class="btn" data-bind="invisible: showLogoEdit, events: {click: showLogo}">Cancel</button>   
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
                    <td>Year Founded</td>
                    <td>:</td>
                    <td><span data-bind="text:current.year_founded"></span></td>
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
                    <td>Fiscal Date</td>
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
                    <td>Fiscal Report Date</td>
                    <td>:</td>
                    <td><span data-bind="text:current.financial_report_date"></span></td>
                </tr>
                <tr>
                    <td>Tax Regime</td>
                    <td>:</td>
                    <td><span data-bind="text:current.tax_regime"></span></td>
                </tr>
            </table>
        </article>
        <button data-bind="click: edit" data-role="button" class="k-button" role="button" aria-disabled="false" tabindex="0">
            Edit
        </button>
    </script>
    <script type="text/x-kendo-template" id="template-placeholder-user">
      <article class="profile-info-item user">
          <div class="" style="margin-bottom: 10px;">
              <button data-bind="click: addUser" data-role="button" class="k-button" role="button" aria-disabled="false" tabindex="0">
                  Create user
              </button>
              &nbsp;&nbsp;
              <i id="user-spinwhile" class="fa fa-refresh pull-right" data-bind="click: users.refresh"></i>
          </div>
          
          <div data-role="listview" data-template="user-profile-list" data-bind="source:users.users" data-bind="false" class="row" style="border: 0;">
          </div>
          
      </article>
    </script>
    <script type="text/x-kendo-template" id="template-placeholder-employee">
      <button class="btn" data-bind="click: addNew">Create</button>
      <i id="user-spinwhile" class="fa fa-refresh pull-right" data-bind="click: employees.refresh"></i>
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
    </script>
    <!-- user placeholder -->
    <script type="text/x-kendo-template" id="user-profile">
      <!--Dashbaord User-->
      <div class="page-content">
        <div class="container" >
          <div class="row">
            <div class="col-xs-12 col-md-4 col-lg-3">
                      <section class="box-typical">
                          <div class="profile-card">
                              <div class="profile-card-photo">
                                  <img data-bind="attr: {src: current.profile_photo}">
                              </div>
                              <div class="profile-card-name">
                                  <span data-bind="text: current.last_name"></span>&nbsp;
                                  <span data-bind="text: current.first_name"></span>
                              </div>
                              <div class="profile-card-status">
                                  Registered Email: <span><a href="mailto:somsreypoch@gmail.com">
                                    <span data-bind="text: current.username"></span>
                                  </a></span>
                              </div>
                              <div class="profile-card-location">
                                  Confirm: <span>True</span>
                              </div>
                              <button type="button" class="btn goto-banhji">BanhJi App</button>
                          </div>

                          <ul class="profile-links-list">
                            <li class="nowrap">
                                <i class="font-icon font-icon-phone"></i>
                                <span data-bind="text: current.mobile"></span>
                            </li>
                            <li class="nowrap">
                                <i class="font-icon font-icon-mail"></i>
                                <span data-bind="text: current.email"></span>
                            </li>
                            <li class="nowrap">
                                <i class="font-icon font-icon-fb-fill"></i>
                                <a data-bind="attr: {href: current.facebook}"><span data-bind="text: current.facebook"></span></a>
                            </li>
                            <li class="nowrap">
                                <i class="font-icon font-icon-in-fill"></i>
                                <a data-bind="attr: {href: current.linkedin}""><span data-bind="text: current.linkedin"></span></a>
                            </li>
                            <li class="nowrap">
                                <i class="font-icon font-icon-tw-fill"></i>
                                <a data-bind="attr: {href: current.twitter}""><span data-bind="text: current.twitter"></span></a>
                            </li>
                          </ul>
                          <button data-bind="click: editProfile">Edit</button>
                      </section>
                  </div>

            <div class="col-xs-12 col-md-8 col-lg-9">
              <section class="box-typical user-module" id="profile-placeholder">
              </section>
            </div>
          </div>
        </div>
      </div>
    </script>
    <script type="text/x-kendo-template" id="user-profile-modules">
      <div data-role="listview" data-bind="source: modules" data-template="user-profile-modules-list"></div>
    </script>
    <script type="text/x-kendo-template" id="user-profile-modules-list">
      <div class="col-xs-3 col-md-2 col-lg-2">
        <div>
            <a href="\#/customers">
                <img data-bind="attr: {src: img_url}">
            </a>
            <span><span data-bind="text: name"></span></span>
        </div>
      </div>
    </script>
    <script type="text/x-kendo-template" id="user-profile-list">
      <section class="box-typical col-md-3" style="margin: 17px;">
        <div class="profile-card">
          <div class="profile-card-photo">
              <img data-bind="attr: {src: profile_photo}">
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
          <div class="profile-card-location">
            <button class="btn btn-primary btn-xs btn-block" data-bind="disabled: is_confirmed, events: {click: showConfirm}" style="margin-bottom: 5px;"><i class="fa fa-folder"></i> Confirm </button>
            <a href="\#assignto/#=id#"><button class="btn btn-alert btn-block" style="margin-bottom: 5px;">Assign/Reassign</button></a>
            <button class="btn btn-alert btn-block" style="margin-bottom: 5px;" data-bind="click: showFormEdit">Edit</button>
            # if(username == userPool.getCurrentUser().username) {#
              <a href="\#password/#=id#"><button class="btn btn-warning btn-block" style="margin-bottom: 5px;">Change Password</button></a>
            #} else {#
              <button class="btn btn-info btn-block" data-bind="click: forgotPassword" style="margin-bottom: 5px;">Forget Password</button>
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
                          <td><i class="fa fa-save" data-bind="click: saveAssign" style="cursor: pointer;"></i>&nbsp;
                          <i class="fa fa-eraser" data-bind="click: cancelAssign" style="cursor: pointer;"></i></td>
                        </tr>
                    </thead>
                    <tbody data-role="listview" data-bind="source: modules" data-template="template-modules-users-module-list-page">
                    </tbody>
                </table>
            </div>
        </div>
      </div>
    </script>
    <script type="text/x-kendo-template" id="template-user-password">
      <div class="col-md-12">
        Old Password: <input class="form-control" type="password" data-bind="value: oldPass"><br>
        New Password: <input class="form-control" type="password" data-bind="value: newPass"><br>
        <button class="btn btn-primary btn-block" data-bind="click: changePassword">Confirm</button>
      </div>
    </script>
    <script type="text/x-kendo-template" id="template-modules-users-company-list-page">
      <tr>
          <td>
              #=name#
          </td>
          <td>
              <i class="fa fa-hand-o-right" data-bind="click: assignTo"></i>
          </td>
      </tr>
    </script>
    <script type="text/x-kendo-template" id="template-modules-users-module-list-page">
      <tr>
          <td>
              #=name#
          </td>
          <td>
              <i class="fa fa-trash" data-bind="click: removeFrom"></i>
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
                        <div class="col-md-3 col-lg-3">
                            <img width="240px" data-bind="attr: {src: current.profile_photo}" />
                            <h3>Profile Picture</h3>
                            <input id="user-image" class="form-control col-md-7 col-xs-12" type="file" data-bind="events: {change: upload}">
                        </div>
                        <article class="col-md-9 col-lg-9 profile-info-item edit-table">
                            <table >
                                <tr>
                                    <td>Username *</td>
                                    <td>:</td>
                                    <td>
                                        <input type="text" data-bind="value: current.username" class="form-control"  id="" placeholder="">
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
                                    <td>Password *</td>
                                    <td>:</td>
                                    <td>
                                        <input type="password" data-bind="value: current.password" class="form-control" id="" placeholder="">
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
                                    <td>Email</td>
                                    <td>:</td>
                                    <td>
                                        <input type="Email" data-bind="value: current.email" class="form-control" id="" placeholder="">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Facebook</td>
                                    <td>:</td>
                                    <td>
                                        <input type="Email" data-bind="value: current.facebook" class="form-control" id="" placeholder="">
                                    </td>
                                </tr>
                                <tr>
                                    <td>LinkedIn</td>
                                    <td>:</td>
                                    <td>
                                        <input type="Email" data-bind="value: current.linkedin" class="form-control" id="" placeholder="">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Twitter</td>
                                    <td>:</td>
                                    <td>
                                        <input type="Email" data-bind="value: current.twitter" class="form-control" id="" placeholder="">
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
                                <tr>
                                    <td>Type</td>
                                    <td>:</td>
                                    <td>
                                        <input id="type"
                                               data-role="dropdownlist"
                                               data-bind="source: userTypes, value: current.usertype"
                                               data-text-field="name"
                                               data-value-field="id"
                                               data-value-primitive="true"
                                               class="form-control col-md-7 col-xs-12"
                                               type="text">
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
                            <img width="240px" data-bind="attr: {src: current.profile_photo}" />
                            <h3>Profile Picture</h3>
                            <input id="user-image" class="form-control col-md-7 col-xs-12" type="file" data-bind="events: {change: upload}">
                        </div>
                        <article class="col-md-9 col-lg-9 profile-info-item edit-table">
                            <table >
                                <tr>
                                    <td>Username *</td>
                                    <td>:</td>
                                    <td>
                                        <input type="text" data-bind="value: current.username" class="form-control" id="" placeholder="">
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
                                    <td>Email</td>
                                    <td>:</td>
                                    <td>
                                        <input type="Email" data-bind="value: current.email" class="form-control" id="" placeholder="">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Facebook</td>
                                    <td>:</td>
                                    <td>
                                        <input type="Email" data-bind="value: current.facebook" class="form-control" id="" placeholder="">
                                    </td>
                                </tr>
                                <tr>
                                    <td>LinkedIn</td>
                                    <td>:</td>
                                    <td>
                                        <input type="Email" data-bind="value: current.linkedin" class="form-control" id="" placeholder="">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Twitter</td>
                                    <td>:</td>
                                    <td>
                                        <input type="Email" data-bind="value: current.twitter" class="form-control" id="" placeholder="">
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
                                <tr>
                                    <td>Type</td>
                                    <td>:</td>
                                    <td>
                                        <input id="type"
                                               data-role="dropdownlist"
                                               data-bind="source: userTypes, value: current.usertype"
                                               data-text-field="name"
                                               data-value-field="id"
                                               data-value-primitive="true"
                                               class="form-control col-md-7 col-xs-12"
                                               type="text">
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
      </div>
    </script>
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
    <script>
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
        currentID : banhji.profileDS.data()[0] || [],
        profileUrl : function() {
          return "#profile/" + this.get('currentID').id;
        }

      });

      banhji.employees = kendo.observable({
        dataSource: new kendo.data.DataSource({
          transport: {
            read  : {
              url: baseUrl + 'api/employees',
              type: "GET",
              dataType: 'json',
              headers: { Institute: JSON.parse(localStorage.getItem('userData/user')).institute.id }
            },
            create  : {
              url: baseUrl + 'api/employees',
              type: "POST",
              dataType: 'json',
              headers: { Institute: JSON.parse(localStorage.getItem('userData/user')).institute.id }
            },
            update  : {
              url: baseUrl + 'api/employees',
              type: "PUT",
              dataType: 'json',
              headers: { Institute: JSON.parse(localStorage.getItem('userData/user')).institute.id }
            },
            destroy  : {
              url: baseUrl + 'api/employees',
              type: "DELETE",
              dataType: 'json',
              headers: { Institute: JSON.parse(localStorage.getItem('userData/user')).institute.id }
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
        setCurrent: function(current) {
          this.set('current', current);
        },
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
              headers: { Institute: JSON.parse(localStorage.getItem('userData/user')).institute.id }
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
            name: null,
            gender: null,
            role: {id: null, name: null},
            status: 1,
            phone: null,
            email: null,
            address: null,
            bill_to: null,
            ship_to: null,
            abbr: null,
            registered_date: new Date()
          });
          banhji.employees.setCurrent(banhji.employees.dataSource.at(0));
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
          }
          banhji.router.navigate("");
        },
        save      : function() {
          banhji.employees.dataSource.sync();
          banhji.employees.dataSource.bind('requestEnd', function(e){
            if(e.response) {
              //
            } else {
              //
            }
          });
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
          banhji.router.navigate('');
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
          banhji.router.navigate('');
        },
        cancelAssign: function() {
          if(this.modules.hasChanges()) {
            this.modules.cancelChanges();
          }
        },
        showFormEdit: function(e) {
          banhji.users.setCurrent(e.data);
          banhji.router.navigate('userlist/edit');
        },
        editProfile: function() {
          banhji.router.navigate('userlist/edit');
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
          banhji.users.users.insert(0, {
            username: '',
            first_name: '',
            last_name: '',
            email: '',
            mobile: '',
            profile_photo: "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/blank.png",
            company: {id: banhji.companyDS.data()[0].id, name:''},
            role: 2,
            facebook: '',
            linkedin: '',
            twitter: '',
            usertype: 2
          });
          banhji.users.setCurrent(banhji.users.users.at(0));
          banhji.router.navigate('userlist/new');
        },
        // editProfile: function(e) {
        //   e.preventDefault();
        //   banhji.router.navigate('userlist/' + this.get('current').id);
        // },
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
            if(banhji.users.get('current').profile_photo !== "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/blank.png") {
                  var fileChooser = document.getElementById('user-image');
                  var results = document.getElementById('results');
                  var file = fileChooser.files[0];
                  if (file) {
                    // results.innerHTML = '';
                    var params = {Key: Math.floor(Math.random() * 100000000000000001)+ '_' +file.name , ContentType: file.type, Body: file};
                    bucket.upload(params, function (err, data) {
                      // results.innerHTML = err ? 'ERROR!' : 'UPLOADED.';
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
        lastLogin: 0,
        employees: banhji.employees,
        users   : banhji.users,
        userProfile: banhji.profile,
        showLogoEdit: true,
        goUser: function() {
          mainDash.showIn("#placeholder", user);
        },
        goEmployee: function() {
          mainDash.showIn("#placeholder", employee);
        },
        goCompany: function() {
          mainDash.showIn("#placeholder", company);
        },
        showLogo: function(e) {
          e.preventDefault();
          this.get('showLogoEdit') == true ? this.set('showLogoEdit', false) : this.set('showLogoEdit', true);
        },
        onLogoChange: function() {
          var fileChooser = document.getElementById('companyLogo');
          var file = fileChooser.files[0];
          var fileReader = new FileReader();
          fileReader.onload = function(e){
           banhji.company.get('current').set('logo', e.target.result);
          }
          fileReader.readAsDataURL(file);
        },
        setCurrent: function(current) {
          this.set('current', current);
        },
        getModule: function() {
          index.showIn('#app-placeholder', modeleView);
        },
        close: function() {
          banhji.router.navigate('');
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
            });
          }
        },
        edit: function() {
          banhji.router.navigate('company/edit');
        },
        cancel: function() {
          if(this.dataStore.hasChanges()) {
            this.dataStore.cancelChanges();
          }
          banhji.router.navigate('');
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
      var profile = new kendo.Layout('#user-profile', {model: banhji.users});
      var profileMod = new kendo.View('#user-profile-modules', {model: banhji.users});
      var assign = new kendo.View('#template-assign-module-to-page', {model: banhji.users});
      var password = new kendo.View('#template-user-password', {model: banhji.users});
      // router initization
      banhji.router = new kendo.Router({
        init: function() {
            if(userPool.getCurrentUser()) {
              layout.render("#main");
              
              institute = JSON.parse(localStorage.getItem('userData/user')).institute;
              banhji.profileDS.fetch(function(e){
                banhji.profile.set('currentID', banhji.profileDS.data()[0]);
                layout.showIn('#menu', menu);
                
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
        console.log('main');
        if(JSON.parse(localStorage.getItem('userData/user')).role != 1) {
          banhji.users.users.filter([
            {field: 'id', value: JSON.parse(localStorage.getItem('userData/user')).institute.id},
            {field: 'id', operator: 'user', value:JSON.parse(localStorage.getItem('userData/user')).id}
          ]);
          banhji.users.users.bind('requestEnd', function(e){
            if(e.response) {
              banhji.users.setCurrent(e.response.results[0]);
              banhji.users.modules.filter({field: 'id', value: JSON.parse(localStorage.getItem('userData/user')).id});
              layout.showIn("#container", mainDash);
              mainDash.showIn("#placeholder", profileMod);
            }
          });
        } else {
          banhji.companyDS.fetch(function() {
            banhji.company.set('data', banhji.companyDS.data()[0]);
            banhji.moduleDS.filter({field: 'id', value: banhji.companyDS.data()[0].id});
            banhji.moduleDS.bind('requestEnd', function(e){
              if(e.response) {
                banhji.company.setCurrent(banhji.companyDS.data()[0]);
                banhji.company.set('appSub', e.response.results.length || 0);
                banhji.company.set('data', banhji.companyDS.data()[0].users);
                banhji.company.set('lastLogin', banhji.companyDS.data()[0].lastLogin);
                // console.log(e.response.results[0]);
                banhji.userDS.filter({field: 'id', value: institute.id});
              }            
            });
          });
          layout.showIn("#container", mainDash);
          mainDash.showIn("#placeholder", instituteModule);
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

      banhji.router.route('userlist(/:id)', function(id) {
        if(id) {
          banhji.users.setCurrent(banhji.users.users.get(id));
        } else {
          banhji.users.users.insert(0, {
            username: null,
            first_name: null,
            last_name: null,
            email: null,
            mobile: null,
            password: null,
            profile_photo: "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/blank.png",
            company: {id: banhji.companyDS.data()[0].id, name:''},
            usertype: null
          });

          banhji.users.setCurrent(banhji.users.users.at(0));
        }
        layout.showIn("#container", userForm);
      });

      banhji.router.route('apps', function() {
        layout.showIn("#main-display-container", modeleView);
      });

      banhji.router.route('apps/:id', function(id) {
        console.log(id);
      });

      banhji.router.route('company/edit', function() {
        if(banhji.profileDS.data()[0] && banhji.profileDS.data()[0].role != 1) {
          banhji.router.navigate("profile/"+banhji.profileDS.data()[0].id);
        }
        layout.showIn("#container", instEdit);
      });

      banhji.router.route('profile/:id', function(id) {
        layout.showIn("#container", profile);
        if(banhji.users.get('current')){
          profile.showIn("#profile-placeholder", profileMod);
          banhji.users.modules.filter({field: 'id', value: id});
        } else {
          banhji.users.users.filter([
            {field: 'id', value: JSON.parse(localStorage.getItem('userData/user')).institute.id},
            {field: 'id', operator: 'user', value: id}
            ]);
          banhji.users.users.bind('requestEnd', function(e){
            if(e.response) {
              banhji.users.setCurrent(e.response.results[0]);
              banhji.users.modules.filter({field: 'id', value: id});
              profile.showIn("#profile-placeholder", profileMod);
            }
          });
        }
        
        // banhji.users.setCurrent(banhji.users.users.get(id));
      });

      banhji.router.route('assignto/:id', function(id) {
        if(banhji.profileDS.data()[0] && banhji.profileDS.data()[0].role != 1) {
          banhji.router.navigate("profile/"+banhji.profileDS.data()[0].id);
        }
        layout.showIn("#container", profile);
        // profile.showIn("#profile-placeholder", profileMod);
        banhji.users.setCurrent(banhji.users.users.get(id));
        banhji.users.modules.filter({field: 'username', value: banhji.users.users.get(id).username});
        profile.showIn("#profile-placeholder", assign);
        
      });

      banhji.router.route('password/:id', function(id) {
        layout.showIn("#container", profile);
        // profile.showIn("#profile-placeholder", profileMod);
        profile.showIn("#profile-placeholder", password);
        banhji.users.setCurrent(banhji.users.users.get(id));
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
        layout.showIn("#container", empEdit);
      });


      $(document).ready(function() {
        banhji.router.start();
        console.log('1');
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
    </script>
  </body>
</html>
