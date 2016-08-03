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
    <style>
      .products {
          position: relative;
          width: 200px;
          margin-bottom: 20px;
          padding-bottom: 62px;
          background: #fff url('images/item-separator.png') repeat-y right top;
          text-align: center;
      }
      ul.k-listview {
        list-style: none;
        padding: 0;
        margin: 0;
        border: 0;
      }

      ul.k-listview li {
        float: left;
        padding: 2px;
      }
       ul.k-listview li > img {
        width: 98%;
      }
    </style>
  </head>

  <body class="nav-md">
    <div id="main" class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?php echo base_url(); ?>rrd" class="site_title"><img src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/banhji-logo.png" alt="" width="40">&nbsp;BanhJi<br></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->

            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a href="#">Dashboard</a>
                  </li>
                  <li><a href="#company">Company Profile</a>
                  </li>
                  <li><a href="#userlist">Users</a>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-large">
              <a data-toggle="tooltip" data-placement="top" title="Logout" data-bind="click: signOut" style="width: 100%">
                <strong>Sign Out</strong>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">

          <div class="nav_menu">
            <nav class="" role="navigation">
              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="#profile" class="user-profile dropdown-toggle" aria-expanded="false">
                    <img data-bind="attr: {src: image}"><span data-bind="text: getCurrentUser().username"></span>
                  </a>
                </li>
              </ul>
            </nav>
          </div>

        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">

            <div class="page-title">
              <div class="title_left">
                <h3>
                </h3>
              </div>


            </div>

            <div class="clearfix"></div>

            <div class="row" id='main-display'>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">

          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
    <script type="text/x-kendo-template" id="template-layout-page">
      <div id="main-display-container"></div>
    </script>
    <script type="text/x-kendo-template" id="template-admin-page">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="row">
          <div class="col-md-3">
            <img data-bind="attr: {src: data.logo}" style="width: 100%">
            <a href="#" style="position: absolute; right: 30px; bottom: 0; z-index: 999" data-bind="click: edit">Edit Company</a>
          </div>
          <div class="col-md-9">
            <h2 style="font-size: 3.5em; margin-top: -8px; padding: 0;" data-bind="text: data.name"></h2>
            <h4 style="font-size: 1.5em; padding: 0; margin-top: -2px;">Company Registration No.</h4>
            <h4 style="font-size: 1.5em; padding: 0; margin-top: -2px;">VAT Tin: <span data-bind="text: data.vat_number"></span></h4>
          </div>
        </div>
      <div class="clearfix"></div>
      <div class="divider"></div>
      <div id="app-placeholder"></div>
    </script>
    <script type="text/x-kendo-template" id="template-dashboard">
      <div class="animated flipInY col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <div class="tile-stats">
          <div class="icon"><i class="fa fa-caret-square-o-right"></i></div>
          <div class="count"><span data-bind="text: dataStore.data()[0].users"></span></div>
          <h3>Active Users</h3>
          <p><a href="#userlist/new">Add User</a></p>
        </div>
      </div>
      <div class="animated flipInY col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <div class="tile-stats">
          <div class="icon"><i class="fa fa-caret-square-o-right"></i></div>
          <div class="count"><span data-bind="text: modules.total"></span></div>
          <h3>Subscribed</h3>
          <p><a href='#' data-bind="click: getModule">Modules/Apps</a></p>
        </div>
      </div>
      <div class="animated flipInY col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <div class="tile-stats">
          <div class="icon"><i class="fa fa-caret-square-o-right"></i></div>
          <div class="count"><span data-bind="text: dataStore.data()[0].users"></span></div>
          <h3>User join in</h3>
          <p>the last 30 days</p>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="divider"></div>
      <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
          <div>
            <p>Usage</p>
          </div>
        </div>
        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
          <div class="pull-right">Show <input type="text" data-role="dropdownlist"> for the last <input type="text" data-role="dropdownlist"></div>
        </div>
      </div>
    </script>
    <script type="text/x-kendo-template" id="template-userlist-page">
      <div class="col-md-12">
        <div class="col-md-12">
          <div class="x_panel">
            <div class="x_content">

              <p><button data-bind="click: addUser" data-role="button">Create user</button></p>

              <!-- start project list -->
              <table class="table table-striped projects">
                <thead>
                  <tr>
                    <th>Photo</th>
                    <th>ABBR</th>
                    <th style="width: 10%">Full Name</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Last Login</th>
                    <th>Modules</th>
                    <th style="width: 30%">Action <i id="user-spinwhile" class="fa fa-refresh pull-right" data-bind="click: refresh"></i></th>
                  </tr>
                </thead>
                <tbody data-role="listview" data-bind="source: users" data-template="template-userlist-item-page">

                </tbody>
              </table>
              <!-- end project list -->
            </div>
          </div>
      </div>
      <div id="userForm" style="visibility: hidden">
        <div class="row">
          <divclass="col-md-12 col-sm-12 col-xs-12"></div>
            <div class="x_panel" style="width: 94%">
              <div class="x_title">
                <h2>Create User</h2>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <br>
                <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="image">Profile Picture <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="file" id="image" class="form-control col-md-7 col-xs-12"><button id="upload-profile" data-bind="click: upload">Upload</button>
                      <div id="results"></div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Username <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="email" id="username" required="required" data-bind="value: current.username" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Password <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="password" id="password" required="required" data-bind="value: current.password" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">First Name <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="first-name" data-bind="value: current.first_name" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Last Name <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="last-name" data-bind="value: current.last_name" name="last-name" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="email" data-bind="value: current.email" class="form-control col-md-7 col-xs-12" type="email" name="middle-name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Phone</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="phone" data-bind="value: current.mobile" class="form-control col-md-7 col-xs-12" type="text" name="middle-name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="type" class="control-label col-md-3 col-sm-3 col-xs-12">Type</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="type"
                             data-role="dropdownlist"
                             data-bind="source: userTypes, value: current.usertype"
                             data-text-field="name"
                             data-value-field="id"
                             class="form-control col-md-7 col-xs-12"
                             type="text"
                             name="middle-name">
                    </div>
                  </div>
                  <div class="ln_solid"></div>
                  <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                      <button type="submit" class="btn btn-primary">Cancel</button>
                      <button type="submit" id="userCreate" class="btn btn-success">Submit</button>
                    </div>
                  </div>

                </form>
              </div>
            </div>
        </div>
      </div>
      <div id="userFormEdit" style="visibility: hidden">
        <div class="row">
          <divclass="col-md-12 col-sm-12 col-xs-12"></div>
            <div class="x_panel" style="width: 94%">
              <div class="x_title">
                <h2>Edit User</h2>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <br>
                <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="image">Profile Picture <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="file" id="image" class="form-control col-md-7 col-xs-12"><button id="upload-profile" data-bind="click: upload">Upload</button>
                      <div id="results"></div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Username <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="email" id="username" data-bind="value: current.username" disabled="true" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">First Name <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="first-name" data-bind="value: current.first_name" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Last Name <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="last-name" data-bind="value: current.last_name" name="last-name" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="email" data-bind="value: current.email" class="form-control col-md-7 col-xs-12" type="email" name="middle-name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Phone</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="phone" data-bind="value: current.mobile" class="form-control col-md-7 col-xs-12" type="text" name="middle-name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="type" class="control-label col-md-3 col-sm-3 col-xs-12">Type</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="type"
                             data-role="dropdownlist"
                             data-bind="source: userTypes"
                             data-text-field="name"
                             data-value-field="id"
                             class="form-control col-md-7 col-xs-12"
                             type="text"
                             name="middle-name">
                    </div>
                  </div>
                  <div class="ln_solid"></div>
                  <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                      <button data-bind="" class="btn btn-primary">Cancel</button>
                      <button type="submit" class="btn btn-success" id="userEdit">Submit</button>
                    </div>
                  </div>

                </form>
              </div>
            </div>
        </div>
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
                      <input type="text" id="code" data-bind="value: code" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div class="ln_solid"></div>
                  <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                      <button class="btn btn-primary">Cancel</button>
                      <button id="userConfirm" class="btn btn-success">Confirm</button>
                    </div>
                  </div>

                </div>
              </div>
            </div>
        </div>
      </div>
    </script>
    <script type="text/x-kendo-template" id="template-userlist-item-page">
      <tr data-bind="events: {dblclick: getProfile}">
        <td><img src="#=profile_photo#" alt="" class='avatar'></td>
        <td style="line-height: 40px;">
           # var x = username.substring(0,2); #
           #=x.toUpperCase()#
        </td>
        <td style="line-height: 40px;">
          #=last_name#&nbsp;#=first_name#
        </td>
        <td style="line-height: 40px;">
          #=email#
        </td>
        <td style="line-height: 40px;">
          # if(role == 1) {#
            Admin
          #} else {#
            User
          #}#
        </td>
        <td style="line-height: 40px;">

        </td>
        <td style="line-height: 40px;">
        </td>
        <td style="line-height: 40px;">
          <button class="btn btn-default btn-xs" data-bind="visible: is_confirmed, events: {click: edit}"><i class="fa fa-pencil"></i> Edit </button>
          <button class="btn btn-default btn-xs" data-bind="visible: is_confirmed, events: {click: showModule}"><i class="fa fa-pencil"></i> Password </button>
          <button class="btn btn-primary btn-xs" data-bind="invisible: is_confirmed, events: {click: showConfirm}"><i class="fa fa-folder"></i> Confirm </button>
        </td>
      </tr>
    </script>
    <script type="text/x-kendo-template" id="template-userlist-form-page">
      <div class="col-md-12 col-sm-12 col-xs-12"></div>
      <div class="x_panel" style="width: 94%">
        <div class="x_content">
          <div class="row">
            <div class="col-lg-4">
              <img data-bind="attr: {src: current.profile_photo}" style="width: 100%;">
               <h3>Profile Picture</h3>
                <input type="file" id="user-image" data-bind="events: {change: upload}" class="form-control col-md-7 col-xs-12">
            </div>
            <div class="col-lg-2"></div>
            <div class="col-lg-6">
              <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Username <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="email" id="username" required="required" data-bind="value: current.username" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Password <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="password" id="password" required="required" data-bind="value: current.password" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">First Name <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="first-name" data-bind="value: current.first_name" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Last Name <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="last-name" data-bind="value: current.last_name" name="last-name" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="form-group">
                  <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="email" data-bind="value: current.email" class="form-control col-md-7 col-xs-12" type="email" name="middle-name">
                  </div>
                </div>
                <div class="form-group">
                  <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Phone</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="phone" data-bind="value: current.mobile" class="form-control col-md-7 col-xs-12" type="text" name="middle-name">
                  </div>
                </div>
                <div class="form-group">
                  <label for="type" class="control-label col-md-3 col-sm-3 col-xs-12">Type</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="type"
                           data-role="dropdownlist"
                           data-bind="source: userTypes, value: current.usertype"
                           data-text-field="name"
                           data-value-field="id"
                           class="form-control col-md-7 col-xs-12"
                           type="text"
                           name="middle-name">
                  </div>
                </div>
                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <button data-bind="click: cancel" class="btn btn-primary">Cancel</button>
                    <button data-bind="click: save" id="userCreate" class="btn btn-success">Submit</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </script>
    <script type="text/x-kendo-template" id="template-userlist-form-new-page">
      <div class="col-md-12 col-sm-12 col-xs-12"></div>
      <div class="x_panel" style="width: 94%">
        <div class="x_content">
          <div class="row">
            <div class="col-lg-4">
              <img data-bind="attr: {src: current.profile_photo}" style="width: 100%;">
               <h3>Profile Picture</h3>
                <input type="file" id="user-image" data-bind="events: {change: upload}" class="form-control col-md-7 col-xs-12">
            </div>
            <div class="col-lg-2"></div>
            <div class="col-lg-6">
              <div id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Username <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="email" id="username" required="required" data-bind="value: current.username" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Password <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="password" id="password" required="required" data-bind="value: current.password" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">First Name <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="first-name" data-bind="value: current.first_name" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Last Name <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="last-name" data-bind="value: current.last_name" name="last-name" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="form-group">
                  <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="email" data-bind="value: current.email" class="form-control col-md-7 col-xs-12" type="email" name="middle-name">
                  </div>
                </div>
                <div class="form-group">
                  <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Phone</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="phone" data-bind="value: current.mobile" class="form-control col-md-7 col-xs-12" type="text" name="middle-name">
                  </div>
                </div>
                <div class="form-group">
                  <label for="type" class="control-label col-md-3 col-sm-3 col-xs-12">Type</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="type"
                           data-role="dropdownlist"
                           data-bind="source: userTypes, value: current.usertype"
                           data-text-field="name"
                           data-value-field="id"
                           class="form-control col-md-7 col-xs-12"
                           type="text"
                           name="middle-name">
                  </div>
                </div>
                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <button data-bind="click: cancel" class="btn btn-primary">Cancel</button>
                    <button data-bind="click: save" class="btn btn-success">Submit</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </script>

    <script type="text/x-kendo-template" id="template-profile-page">
      <div class="col-lg-12">
        <div class="row">
          <div class="col-lg-4">
            <img data-bind="attr: {src: current.profile_photo}" class="img-circle profile_img" width="100" height="170" style="margin-top: 0">
            <br><a data-bind="click: editProfile">Edit</a>
          </div>
          <div class="col-lg-8" style="padding-top: 30px;">
            <h2 style="font-size: 3.5em; margin-top: -8px; padding: 0;"><span data-bind="text: current.last_name"></span>&nbsp;<span data-bind="text: current.first_name"></span></h2>
            <h4 style="font-size: 1.5em; padding: 0; margin-top: -2px;">Registered Email: <span data-bind="text: current.email"></span></h4>
            <h4 style="font-size: 1.5em; padding: 0; margin-top: -2px;">Confirm: <span data-bind="text: current.is_confirmed"></span></h4>
          </div>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="divider"></div>
      <div class="col-lg-12"><button data-bind='click: assign'>Assign</button><br>
        <ul data-role="listview" data-bind="source: modules" data-template="template-profile-module-list-page" class="row"></ul>
      </div>
    </script>
    <script type="text/x-kendo-template" id="template-profile-module-list-page">
      <li class="products">
        <img src="#=img_url#" alt="#=name#">
      </li>
    </script>

    <script type="text/x-kendo-template" id="template-createcompany-page">
      <div class="col-md-12">
        <div class="x_panel">
          <div class="x_content">
            <div class="row">
              <div class="col-sm-2">
                <img data-bind="attr: {src: dataStore.data()[0].logo}" width="100">
              </div>
              <div class="col-sm-10">
                <h2 data-bind="text: dataStore.data()[0].name"></h2>
                <span data-bind="text: dataStore.data()[0].industry.type"></span><br>
                <span data-bind="text: dataStore.data()[0].users"></span> (employees)
                <div>
                  <a href="#" data-bind="click: edit">Edit</a>
                </div>
              </div>
              <!-- /CONTENT MAIL -->
            </div>
          </div>
        </div>

        <!-- info -->
        <div class="x_panel">
          <div class="x_content">
            <div class="row" id="companyInfoPlaceholder">
              <!-- CONTENT MAIL -->

              <!-- /CONTENT MAIL -->
            </div>
          </div>
        </div>
      </div>
    </script>
    <script type="text/x-kendo-template" id="template-createcompany-info-page">
      <div class="col-lg-12">
        <table class="table">
            <thead>
              <tr>
                <th colspan="2">General Information</th>
              </tr>
            </thead>
            <tbody>
              <tr style=="border: 0">
                <th scope="row" width="150">Company Name</th>
                <td><span data-bind="text: dataStore.data()[0].name"></span></td>
              </tr>
              <tr>
                <th scope="row" width="150">Email</th>
                <td><span data-bind="text: dataStore.data()[0].email"></span></td>
              </tr>
              <tr>
                <th scope="row">address</th>
                <td><span data-bind="text: dataStore.data()[0].address"></span></td>
              </tr>
              <tr>
                <th scope="row">ZIP Code</th>
                <td><span data-bind="text: dataStore.data()[0].zip"></span></td>
              </tr>
              <tr>
                <th scope="row">Year Founded</th>
                <td><span data-bind="text: dataStore.data()[0].year_founded"></span></td>
              </tr>
              <tr>
                <th scope="row">Country</th>
                <td><span data-bind="text: dataStore.data()[0].country.name"></span></td>
              </tr>
              <tr>
                <th scope="row">Industry</th>
                <td><span data-bind="text: dataStore.data()[0].industry.type"></span></td>
              </tr>
              <tr><td colspan="2"></td></tr>
            </tbody>
        </table>
        <table class="table">
            <thead>
              <tr>
                <th colspan="2">Financial Information</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">Fiscal Date</th>
                <td><span data-bind="text: dataStore.data()[0].fiscal_date"></span></td>
              </tr>
              <tr>
                <th scope="row">Currency</th>
                <td><span data-bind="text: dataStore.data()[0].currency.code"></span></td>
              </tr>
              <tr>
                <th scope="row">Reporting Currency</th>
                <td><span data-bind="text: dataStore.data()[0].reportCurrency.code"></span></td>
              </tr>
              <tr>
                <th scope="row">Fiscal Report Date</th>
                <td><span data-bind="text: dataStore.data()[0].financial_report_date"></span></td>
              </tr>
              <tr>
                <th scope="row" width="150">Tax Regime</th>
                <td><span data-bind="text: dataStore.data()[0].tax_regime"></span></td>
              </tr>
              <tr><td colspan="2"></td></tr>
            </tbody>
        </table>
        <button data-bind="click: edit">Edit</button>
      </div>
    </script>
    <script type="text/x-kendo-template" id="template-modules-page">
      <div class="row">
        <div class="col-md-12 col-sm-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Subscribed Modules</h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="close-link" data-bind="click: close"><i class="fa fa-close"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <ul data-role="listview" data-bind="source: modules" data-template="template-company-module-list-page" class="row"></ul>
            </div>
          </div>
        </div>
      </div>
    </script>
    <script type="text/x-kendo-template" id="template-company-module-list-page">
      <li class="products">
        <img src="#=image_url#" alt="#=name#">
      </li>
    </script>
    <script type="text/x-kendo-template" id="template-createcompany-info-edit-page">
      <div class="col-sm-12">
        <table class="table">
          <thead>
            <tr>
              <th colspan="2">
                General Information
              </th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row" width="150">
                <img data-bind="attr: {src: dataStore.data()[0].logo}" width="100">
              </th>
              <td>
                <input type="file" id="companyLogo" class="form-control col-md-7 col-xs-12">
                <button id="logoUpload" data-bind="click: upload">Upload</button>
              </td>
            </tr>
            <tr>
            <tr>
              <th scope="row" width="150">Company Name</th>
              <td><input type="text" data-bind="value: dataStore.data()[0].name" class="form-control col-md-7 col-xs-12 k-input k-textbox"></td>
            </tr>
            <tr>
              <th scope="row" width="150">Email</th>
              <td><input type="text" data-bind="value: dataStore.data()[0].email" class="form-control col-md-7 col-xs-12 k-input k-textbox"></td>
            </tr>
            <tr>
              <th scope="row">address</th>
              <td><input type="text" data-bind="value: dataStore.data()[0].address" class="k-input k-textbox form-control col-md-7 col-xs-12" style="width: 100%;"></td>
            </tr>
            <tr>
              <th scope="row">Year Founded</th>
              <td><input type="text"
                         data-role="datepicker"
                         data-depth="year"
                         data-bind="value: dataStore.data()[0].year_founded"
                         data-format="yyyy"
                         class="form-control col-md-7 col-xs-12"></td>
            </tr>
            <tr>
              <td scope="row">Country</td>
              <td><input type="text" data-role="dropdownlist"
                         data-bind="source: countries, value: dataStore.data()[0].country.id"
                         data-text-field="name"
                         data-value-field="id"
                         class="form-control col-md-7 col-xs-12"></td>
            </tr>
            <tr>
              <th scope="row">Industry</th>
              <td><input type="text" data-role="dropdownlist"
                        data-bind="source: industries, value: dataStore.data()[0].industry.id"
                        data-text-field="name"
                        data-value-field="id"
                        class="form-control col-md-7 col-xs-12"></td>
            </tr>
            <tr>
              <td scope="row">Zip Code</td>
              <td><input type="text" data-bind="value: dataStore.data()[0].zip"></td>
            </tr>
            <tr><td colspan="2"></td></tr>
          </tbody>
        </table>
        <table class="table">
          <thead>
            <tr>
              <th colspan="2">
                Financial Information
              </th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">Fiscal Year</th>
              <td><input type="text"
                         data-role="datepicker"
                         data-bind="value: dataStore.data()[0].fiscal_date"
                         data-format="dd-MM"
                         class="form-control col-md-7 col-xs-12"></td>
            </tr>
            <tr>
              <th scope="row">Fiscal Report Date</th>
              <td><input type="text"
                         data-role="datepicker"
                         data-format="dd-MM"
                         data-bind="value: dataStore.data()[0].financial_report_date"
                         class="form-control col-md-7 col-xs-12"></td>
            </tr>
            <tr>
              <th scope="row">Currency</th>
              <td><input type="text" data-role="dropdownlist"
                        data-bind="source: currencies, value: dataStore.data()[0].currency"
                        data-text-field="code"
                        data-value-field="id"
                        class="form-control col-md-7 col-xs-12"></td>
            </tr>
            <tr>
              <th scope="row">Reporting Currency</th>
              <td><input type="text" data-role="dropdownlist"
                        data-bind="source: currencies, value: dataStore.data()[0].reportCurrency"
                        data-text-field="code"
                        data-value-field="id"
                        class="form-control col-md-7 col-xs-12"></td>
            </tr>
            <tr>
              <th scope="row" width="150">Tax Regime</th>
              <td><input type="text" data-role="dropdownlist"
                         data-bind="source: taxRegimes, value: dataStore.data()[0].tax_regime"
                         data-text-field="value"
                         data-value-field="id"
                         class="form-control col-md-7 col-xs-12"></td>
            </tr>
            <tr><td colspan="2"></td></tr>
          </tbody>
        </table>
        <button data-bind="click: save">Save</button>
        <button data-bind="click: cancel">Cancel</button>
      </div>
    </script>
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
    <script type="text/x-kendo-template" id="template-modules-list-page">
      <div class="col-md-55" style="height: 250px;">
        <div class="thumbnail">
          <div class="image view view-first">
            <img style="width: 100%; display: block;" src="#=image_url#" alt="image">
            <div class="mask">
              <p>#=name#</p>
              <div class="tools tools-bottom">
                <a href="\#/#=href#"><i class="fa fa-link"></i></a>
              </div>
            </div>
          </div>
          <div class="caption">
            <div>#=description#</div>
          </div>
        </div>
      </div>
    </script>
    <script type="text/x-kendo-template" id="template-modules-users-page">
      <div class="row">
        <divclass="col-md-12 col-sm-12="" col-xs-12"=""></div class="col-md-12"></div>
          <div class="x_panel" style="width: 94%">
            <div class="x_title">
              <h2>Modules</h2>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <div data-role="listview" data-bind="source: modules" data-template="template-modules-users-list-page" style="border: 0"></div>
            </div>
          </div>
        </div>
      </div>
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
                  <td style="width: 90%">User Access Modules</td>
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
    <script type="text/x-kendo-template" id="template-modules-users-list-page">
      <div class="col-md-55" style="height: 250px;">
        <div class="thumbnail">
          <div class="image view view-first">
            <img style="width: 100%; display: block;" src="#=img_url#" alt="image">
            <div class="mask">
              <p>#=name#</p>
              <div class="tools tools-bottom">
                <i class="fa fa-link"></i>
              </div>
            </div>
          </div>
          <div class="caption">
            <div><p data-bind="text: description"></p></div>
          </div>
        </div>
      </div>
    </script>
    <script type="text/x-kendo-template" id="template-unauth-page">
      <div class="col-md-55" style="height: 250px;">
        <h1>Unauthorized Page</h1>
        <a href="<?php echo base_url(); ?>rrd/">Banhji Application</a>
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
    </script>
    <!-- /bootstrap-wysiwyg -->
  </body>
</html>
