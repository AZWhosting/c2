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
  </head>

  <body class="nav-md">
    <div id="main" class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?php echo base_url(); ?>demo" class="site_title"><img src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/banhji-logo.png" alt="" width="40">&nbsp;BanhJi<br></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a href="<?php echo base_url(); ?>admin">Dashboard</a>
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

    <div class="compose col-md-6 col-xs-12">
      <div class="compose-header">
        New Message
        <button type="button" class="close compose-close">
          <span>×</span>
        </button>
      </div>

      <div class="compose-body">
        <div id="alerts"></div>

        <div class="btn-toolbar editor" data-role="editor-toolbar" data-target="#editor">
          <div class="btn-group">
            <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font"><i class="fa fa-font"></i><b class="caret"></b></a>
            <ul class="dropdown-menu">
            </ul>
          </div>

          <div class="btn-group">
            <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font Size"><i class="fa fa-text-height"></i>&nbsp;<b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li>
                <a data-edit="fontSize 5">
                  <p style="font-size:17px">Huge</p>
                </a>
              </li>
              <li>
                <a data-edit="fontSize 3">
                  <p style="font-size:14px">Normal</p>
                </a>
              </li>
              <li>
                <a data-edit="fontSize 1">
                  <p style="font-size:11px">Small</p>
                </a>
              </li>
            </ul>
          </div>

          <div class="btn-group">
            <a class="btn" data-edit="bold" title="Bold (Ctrl/Cmd+B)"><i class="fa fa-bold"></i></a>
            <a class="btn" data-edit="italic" title="Italic (Ctrl/Cmd+I)"><i class="fa fa-italic"></i></a>
            <a class="btn" data-edit="strikethrough" title="Strikethrough"><i class="fa fa-strikethrough"></i></a>
            <a class="btn" data-edit="underline" title="Underline (Ctrl/Cmd+U)"><i class="fa fa-underline"></i></a>
          </div>

          <div class="btn-group">
            <a class="btn" data-edit="insertunorderedlist" title="Bullet list"><i class="fa fa-list-ul"></i></a>
            <a class="btn" data-edit="insertorderedlist" title="Number list"><i class="fa fa-list-ol"></i></a>
            <a class="btn" data-edit="outdent" title="Reduce indent (Shift+Tab)"><i class="fa fa-dedent"></i></a>
            <a class="btn" data-edit="indent" title="Indent (Tab)"><i class="fa fa-indent"></i></a>
          </div>

          <div class="btn-group">
            <a class="btn" data-edit="justifyleft" title="Align Left (Ctrl/Cmd+L)"><i class="fa fa-align-left"></i></a>
            <a class="btn" data-edit="justifycenter" title="Center (Ctrl/Cmd+E)"><i class="fa fa-align-center"></i></a>
            <a class="btn" data-edit="justifyright" title="Align Right (Ctrl/Cmd+R)"><i class="fa fa-align-right"></i></a>
            <a class="btn" data-edit="justifyfull" title="Justify (Ctrl/Cmd+J)"><i class="fa fa-align-justify"></i></a>
          </div>

          <div class="btn-group">
            <a class="btn dropdown-toggle" data-toggle="dropdown" title="Hyperlink"><i class="fa fa-link"></i></a>
            <div class="dropdown-menu input-append">
              <input class="span2" placeholder="URL" type="text" data-edit="createLink" />
              <button class="btn" type="button">Add</button>
            </div>
            <a class="btn" data-edit="unlink" title="Remove Hyperlink"><i class="fa fa-cut"></i></a>
          </div>

          <div class="btn-group">
            <a class="btn" title="Insert picture (or just drag & drop)" id="pictureBtn"><i class="fa fa-picture-o"></i></a>
            <input type="file" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage" />
          </div>

          <div class="btn-group">
            <a class="btn" data-edit="undo" title="Undo (Ctrl/Cmd+Z)"><i class="fa fa-undo"></i></a>
            <a class="btn" data-edit="redo" title="Redo (Ctrl/Cmd+Y)"><i class="fa fa-repeat"></i></a>
          </div>
        </div>

        <div id="editor" class="editor-wrapper"></div>
      </div>

      <div class="compose-footer">
        <button id="send" class="btn btn-sm btn-success" type="button">Send</button>
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
      <div class="animated flipInY col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <div class="tile-stats">
          <div class="icon"><i class="fa fa-caret-square-o-right"></i></div>
          <div class="count"><span data-bind="text: dataStore.data()[0].users"></span></div>
          <h3>Active Users</h3>
          <p><a href="#">Add User</a></p>
        </div>
      </div>
      <div class="animated flipInY col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <div class="tile-stats">
          <div class="icon"><i class="fa fa-caret-square-o-right"></i></div>
          <div class="count"><span data-bind="text: dataStore.data()[0].users"></span></div>
          <h3>Subscribed</h3>
          <p>Modules/Apps</p>
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
            <div class="x_title">
              <h2>User List</h2>
              
              <div class="clearfix"></div>
            </div>
            <div class="x_content">

              <p><button data-bind="click: showForm">Create user</button></p>

              <!-- start project list -->
              <table class="table table-striped projects">
                <thead>
                  <tr>
                    <th style="width: 1%">#</th>
                    <th>Photo</th>
                    <th style="width: 10%">Full Name</th>
                    <th>Email</th>
                    <th>Mobile Number</th>
                    <th style="width: 30%">Action</th>
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
                      <button type="submit" class="btn btn-primary">Cancel</button>
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
                <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
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
                      <button type="submit" class="btn btn-primary">Cancel</button>
                      <button id="userConfirm" class="btn btn-success">Confirm</button>
                    </div>
                  </div>

                </form>
              </div>
            </div>     
        </div>      
      </div>
    </script>
    <script type="text/x-kendo-template" id="template-userlist-item-page">
      <tr>
        <td>#=id#</td>
        <td><img src="#=profile_photo#" alt="" class='avatar'></td>
        <td>
          #=last_name#&nbsp;#=first_name#
        </td>
        <td>
          #=email#
        </td>
        <td>
        #=mobile#
        </td>
        <td>
          <button class="btn btn-default btn-xs" data-bind="click: showFormEdit"><i class="fa fa-pencil"></i> Edit </button>
          <button class="btn btn-default btn-xs" data-bind="click: showModule"><i class="fa fa-pencil"></i> Modules </button>
          <button class="btn btn-primary btn-xs" data-bind="invisible: is_confirmed, events: {click: showConfirm}"><i class="fa fa-folder"></i> Confirm </button>
          <button class="btn btn-info btn-xs" data-bind="visible: is_confirmed"><i class="fa fa-pencil"></i> Disable </button>
          <button class="btn btn-danger btn-xs" data-bind="visible: is_confirmed"><i class="fa fa-trash-o"></i> Delete </button>
        </td>
      </tr>
    </script>

    <script type="text/x-kendo-template" id="template-createcompany-page">
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
      </div>
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
      <div class="col-sm-12">
        <table class="table">
          <tbody>
            <tr>
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
              <th scope="row">Fiscal Year</th>
              <td><span data-bind="text: dataStore.data()[0].fiscal_date"></span></td>
            </tr>
            <tr>
              <th scope="row">Year Founded</th>
              <td><span data-bind="text: dataStore.data()[0].year_founded"></span></td>
            </tr>
            <tr>
              <th scope="row">Reporting Currency</th>
              <td><span data-bind="text: dataStore.data()[0].reportCurrency.name"></span></td>
            </tr>
            <tr>
              <th scope="row">Fiscal Report Date</th>
              <td><span data-bind="text: dataStore.data()[0].financial_report_date"></span></td>
            </tr>
            <tr>
              <th scope="row">Country</th>
              <td><span data-bind="text: dataStore.data()[0].country.name"></span></td>
            </tr>
            <tr>
              <th scope="row">Industry</th>
              <td><span data-bind="text: dataStore.data()[0].industry.type"></span></td>
            </tr>
            <tr>
              <th scope="row" width="150">Tax Regime</th>
              <td><span data-bind="text: dataStore.data()[0].tax_regime"></span></td>
            </tr>
            <tr>
              <th scope="row">Currency</th>
              <td><span data-bind="text: dataStore.data()[0].currency.code"></span></td>
            </tr>
            <tr><td colspan="2"></td></tr>
          </tbody>
        </table>
        <button data-bind="click: edit">Edit</button>
      </div>
    </script>
    <script type="text/x-kendo-template" id="template-createcompany-info-edit-page">
      <div class="col-sm-12">
        <table class="table">
          <thead>
            <tr>
              <th colspan="2">
                Company Information
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
              <td><input type="text" data-bind="value: dataStore.data()[0].name" class="form-control col-md-7 col-xs-12"></td>
            </tr>
            <tr>
              <th scope="row" width="150">Email</th>
              <td><input type="text" data-bind="value: dataStore.data()[0].email" class="form-control col-md-7 col-xs-12"></td>
            </tr>
            <tr>
              <th scope="row">address</th>
              <td><input type="text" data-bind="value: dataStore.data()[0].address" class="form-control col-md-7 col-xs-12"></td>
            </tr>
            <tr>
              <th scope="row">Fiscal Year</th>
              <td><input type="text"
                         data-role="datepicker"
                         data-bind="value: dataStore.data()[0].fiscal_date" 
                         data-format="dd-MM"
                         class="form-control col-md-7 col-xs-12"></td>
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
              <th scope="row">Fiscal Report Date</th>
              <td><input type="text"
                         data-role="datepicker"
                         data-format="dd-MM" 
                         data-bind="value: dataStore.data()[0].financial_report_date" 
                         class="form-control col-md-7 col-xs-12"></td>
            </tr>
            <tr>
              <th scope="row">Country</th>
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
              <th scope="row" width="150">Tax Regime</th>
              <td><input type="text" data-role="dropdownlist" 
                         data-bind="source: taxRegimes, value: dataStore.data()[0].tax_regime"
                         data-text-field="value"
                         data-value-field="id"
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
    <script type="text/x-kendo-template" id="template-modules-page">
      <div class="row">
        <divclass="col-md-12 col-sm-12="" col-xs-12"=""></divclass="col-md-12></div>
          <div class="x_panel" style="width: 94%">
            <div class="x_title">
              <h2>Modules</h2>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <div data-role="listview" data-bind="source: dataStore" data-template="template-modules-list-page" style="border: 0"></div>
            </div>
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
        <divclass="col-md-12 col-sm-12="" col-xs-12"=""></divclass="col-md-12></div>
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
        <h1>You don't have access to this page!</h1>
        <a href="<?php echo base_url(); ?>demo/">Banhji Application</a>
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
          modules: new kendo.data.DataSource({
            transport: {
              read  : {
                url: baseUrl + 'api/users/modules',
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
            filter: {
              field: 'username',
              value: userPool.getCurrentUser().username
            },
            serverPaging: true,
            pageSize: 50
          }),
          code  : '',
          upload: function(e) {
            e.preventDefault();
            var fileChooser = document.getElementById('image');
            // var button = document.getElementById('upload-button');
            var results = document.getElementById('results');
            // button.addEventListener('click', function() {
              var file = fileChooser.files[0];
              if (file) {
                results.innerHTML = '';
                var params = {Key: Math.floor(Math.random() * 100000000000000001)+ '_' +file.name , ContentType: file.type, Body: file};
                bucket.upload(params, function (err, data) {
                  results.innerHTML = err ? 'ERROR!' : 'UPLOADED.';
                  var loc = data.Location;
                  banhji.users.get('current').set('profile_photo', loc);
                });
              } else {
                results.innerHTML = 'Nothing to upload.';
              }
            // }, false);
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
              title: "User Confirmation",
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
                  win.close();
              });
            });              
          },
          confirm: function(e) {
            e.preventDefault();

            var userData = {
                Username : this.get('current').username,
                Pool : userPool
            };
            var cognitoUser = new AWSCognito.CognitoIdentityServiceProvider.CognitoUser(userData);
            cognitoUser.confirmRegistration(this.get('code'), true, function(err, result) {
                if (err) {
                    alert(err);
                    return;
                }
                banhji.users.set('code', '');
            });
          },
          save: function(e) {
            e.preventDefault();
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

              userPool.signUp(this.get('current').username, this.get('current').password, attributeList, null, function(err, result){
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
              }
            });
          }
        });

        banhji.company = kendo.observable({
          dataStore: banhji.companyDS,
          data: '',
          countries: banhji.countries,
          industries: banhji.industry,
          currencies: banhji.currencies,
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
            institute.showIn('#companyInfoPlaceholder', instEdit);
          },
          cancel: function() {
            if(this.dataStore.hasChanges()) {
              this.dataStore.cancelChanges();
            }
            institute.showIn('#companyInfoPlaceholder', instInfo);
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
        var userlist= new kendo.View('#template-userlist-page', {model: banhji.users});
        var userlMod= new kendo.View('#template-modules-users-page', {model: banhji.users});
        var institute = new kendo.Layout('#template-createcompany-page', {model: banhji.company});
        var instInfo = new kendo.View('#template-createcompany-info-page', {model: banhji.company});
        var instEdit = new kendo.View('#template-createcompany-info-edit-page', {model: banhji.company});
        var loading = new kendo.View('#template-waiting-page');
        var unthau = new kendo.View('#template-unauth-page');
        var modeleView = new kendo.View('#template-modules-page', { model: banhji.module});
        // router initization
        banhji.router = new kendo.Router({
            init: function() {
                layout.render("#main-display");
                if(!banhji.companyDS.data()[0]) {
                  banhji.companyDS.fetch(function() {
                    banhji.company.set('data', banhji.companyDS.data()[0]);
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
            },
            routeMissing: function(e) {
                // banhji.view.layout.showIn("#layout-view", banhji.view.missing);
                console.log("no resource found.")
            }
        });

        // start here
        banhji.router.route('/', function() {
          if(!banhji.company.get('data')) {
            banhji.company.dataStore.fetch(function() {
              layout.showIn("#main-display-container", index);
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
              // chart
              var el = $('#template-admin-page'),
              effect = kendo.fx(el).fadeIn().duration(700);
              // preparing file for uploading to AWS S3
            });
          }
        });

        banhji.router.route('userlist', function() {
          banhji.companyDS.fetch(function(e){
            if(banhji.companyDS.data()[0] === undefined) {
              layout.showIn("#main-display-container", company);
            } else {
              banhji.userDS.filter({field: 'id', value: banhji.companyDS.data()[0].id});
              layout.showIn("#main-display-container", userlist);
            }
          }); 
        });

        banhji.router.route('apps', function() {
          layout.showIn("#main-display-container", modeleView);
        });

        banhji.router.route('apps/:id', function(id) {
          console.log(id);
        });

        banhji.router.route('company', function() {
          layout.showIn("#main-display-container", loading);
          layout.showIn("#main-display-container", institute);
          institute.showIn('#companyInfoPlaceholder', instInfo);
        });

        $(document).ready(function() {
            banhji.router.start();
        });
    </script>
    <!-- /bootstrap-wysiwyg -->

    <!-- compose -->
    <script>
      // $('#compose, .compose-close').click(function(){
      //   $('.compose').slideToggle();
      // });
    </script>
    <!-- /compose -->
  </body>
</html>