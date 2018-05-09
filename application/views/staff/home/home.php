<div id="wrapperApplication" class="wrapper"></div>
<!--load before somthing not yet done -->
<div id="holdpageloadhide" style="display:block;text-align: center;position: fixed;top: 0; left: 0;width: 100%; height: 100%;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
    <i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 45%;left: 45%"></i>
</div>
<!-- template section starts -->
<script type="text/x-kendo-template" id="layout">
    <div id="menu" class="menu"></div>
    <div id="content" class="container" style="padding-top: 45px !important;"></div>
</script>
<script type="text/x-kendo-template" id="blank-tmpl">
</script>
<script type="text/x-kendo-template" id="menu-tmpl">
    <nav class="navbar navbar-inverse " role="navigation">
        <div class="container-fluid">   
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header" style="margin: 0">
                <!-- Menu Phone -->
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Menu Phone Multipel Task-->
                <button type="button" class="navbar-toggle phone-multitasklist" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">                    
                    <span class="icon-th-list"></span>
                </button>

                <!-- Menu Phone Langauge-->
                <button type="button" class="navbar-toggle phone-lang" data-toggle="collapse" data-target="#bs-example-navbar-collapse-4">
                    <span data-bind="text: lang.localeCode"></span>
                </button>

                <!--Logo-->
                <!-- <a class="navbar-brand" href="#/" data-bind="click: checkRole"> -->
                <a class="navbar-brand" href="<?php echo base_url();?>utibill" >
                    <img src="<?php echo base_url();?>assets/water/utibill_logo.png" >
                </a>
            </div>

            <!-- Secondary Menu -->
            <ul class="topnav hidden-xs " id="secondary-menu">
            </ul>

            <!-- Menu rigth Desktop -->
            <ul class="menu-right col-sm-3 topnav pull-right hidden-xs">
                <li role="presentation" class="setting dropdown">
                    <a style="color: #fff;" class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">[<span data-bind="text: getUsername"></span>]</a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#" data-bind="click: lang.changeToKh">
                                <img class="kh-flag" src="https://lipis.github.io/flag-icon-css/flags/4x3/kh.svg">
                                <span>ភាសាខ្មែរ</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" data-bind="click: lang.changeToEn">
                                <img class="en-flag" src="https://lipis.github.io/flag-icon-css/flags/4x3/gb.svg">
                                <span>English</span>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#/manage" data-bind="click: logout">
                                <i class="icon-power-off"></i>
                                <span>Logout</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li role="presentation" class="dropdown multitasklist">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        <i class="icon-th-list"></i>
                    </a>
                    <ul class="dropdown-menu ul-multiTaskList" data-template="multiTaskList-row-template" data-bind="source: multiTaskList">                                
                    </ul>
                </li>
            </ul>

            <!-- Menu Phone -->
            <div class="menu-phone collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav hidden-lg hidden-md hidden-sm">
                    <li><a data-toggle="collapse" data-target=".navbar-collapse.in" href='#/' class='glyphicons show_big_thumbnails'><i></i><span >Dashnboard</span></a></li>
                    <li><a data-toggle="collapse" data-target=".navbar-collapse.in" href='#/center'><span data-bind="text: lang.lang.center"></span></a></li>
                    <li role='presentation' class='dropdown'>
                        <a class='dropdown-toggle glyphicons text_bigger' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'><i class="text-t"></i> <span style="margin-top: 12px;" class='caret'></span></a>
                        <ul class='dropdown-menu'>
                            <li><a data-toggle="collapse" data-target=".navbar-collapse.in" href='#/customer'><span >Add New Customer</span></a></li>
                            <li><a data-toggle="collapse" data-target=".navbar-collapse.in" href='#/property'><span >Add New Property</span></a></li> 
                            <li ><a data-toggle="collapse" data-target=".navbar-collapse.in" href='#/reorder'><span >Reading Route Management</span></a></li>               
                            <li><span class="li-line"></span></li>
                            <li><a data-toggle="collapse" data-target=".navbar-collapse.in" href='#/reading'><span >1. Meter Reading</span></a></li>
                            <li><a data-toggle="collapse" data-target=".navbar-collapse.in" href='#/run_bill'><span >2. Run Bill</span></a></li> 
                            <li><a data-toggle="collapse" data-target=".navbar-collapse.in" href='#/print_bill'><span >3. Print Bill</span></a></li>
                            <li><a data-toggle="collapse" data-target=".navbar-collapse.in" href='#/receipt'><span >4. Cash Receipt</span></a></li>
                            <li><span class="li-line"></span></li>
                            <li><a data-toggle="collapse" data-target=".navbar-collapse.in" href='#/imports'><span >Import</span></a></li>
                            <li><span class="li-line"></span></li>
                            <li><a data-toggle="collapse" data-target=".navbar-collapse.in" data-toggle="collapse" data-target=".navbar-collapse" href='#/backup'><span>Back Up</span></a></li>
                            <li><a data-toggle="collapse" data-target=".navbar-collapse.in" href='#/offline'><span>Offline</span></a></li>
                        </ul>
                    </li>
                    <li>
                        <a data-toggle="collapse" data-target=".navbar-collapse.in" href="#/reports">
                            <span>REPORTS</span>
                        </a>
                    </li>
                    <li>
                        <a data-toggle="collapse" data-target=".navbar-collapse.in" href='#/setting' class='glyphicons settings'>
                            <i ></i>
                            <span>Setting</span>
                        </a>
                    </li>
                    <li>
                        <a data-toggle="collapse" data-target=".navbar-collapse.in" href="#/manage" data-bind="click: logout">
                            <i class="icon-power-off"></i>
                            <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Menu Phone Multipel Task-->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
                <ul class="hidden-lg hidden-md hidden-sm ul-multiTaskList nav navbar-nav phone-multiTaskList" data-template="multiTaskList-row-template" data-bind="source: multiTaskList">                                 
                </ul>
            </div>

            <!-- Menu Phone Search-->
            <!-- <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-3">
                <form class="navbar-form pull-left hidden-lg hidden-md hidden-sm">
                    <input id="search-placeholder" class="span2 search-query" 
                        type="text" 
                        placeholder="Search" 
                        data-bind="value: searchText" />
                    <button data-toggle="collapse" data-target=".navbar-collapse" class="btn btn-inverse"
                        type="submit" 
                        data-bind="click: search" >
                            <i class="icon-search "></i>
                    </button>
                </form>
            </div> -->

            <!-- Menu Phone Langauge-->
            <div class="menu-phone collapse navbar-collapse" id="bs-example-navbar-collapse-4">
                <ul class=" nav navbar-nav hidden-lg hidden-md hidden-sm phone-language">
                    <li>
                        <a  href="#" data-bind="click: lang.changeToKh">
                            <img class="kh-flag" src="https://lipis.github.io/flag-icon-css/flags/4x3/kh.svg">
                            <span style="margin-left: 0;">ភាសាខ្មែរ</span>
                        </a>
                    </li>
                    <li>
                        <a  href="#" data-bind="click: lang.changeToEn">
                            <img class="en-flag" src="https://lipis.github.io/flag-icon-css/flags/4x3/gb.svg">
                            <span>English</span>
                        </a>
                    </li>   
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>  
</script>
<script id="multiTaskList-row-template" type="text/x-kendo-template">
    <li >
        <a data-toggle="collapse" data-target=".navbar-collapse.in" href="\#/#=url#">
            <span >#=name#</span>
            <span title="Remove" class="multiTaskList glyphicons remove_2 pull-right" data-bind="click: removeLink">
                <i></i>
            </span>
        </a>
    </li>   
</script>

<!-- ***************************
*   Water Section         *
**************************** -->
<script id="DashBoard" type="text/x-kendo-template">
    <div class="container">
        <div class="row" style="margin-top: 30px;">
            <div class="col-md-6">
                <div class="cash-bg" style="margin-bottom: 10px; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1;">               
                    <div class="row-fluid" >
                        <div class="col-xs-3 col-sm-3 col-md-3" style="text-align: center;">
                            <a href="#/employee">
                                <img width="100%" title="Add Reading" src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/water_logo/reading.png"   />
                                <span style="text-transform: uppercase; color: #000; font-weight: 600; margin-top: 8px; display: inline-block;">Add Employee</span>
                            </a>
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-3" style="text-align: center;">
                            <a href="#/run_bill">
                                <img width="100%" title="Add Create Invoice" src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/water_logo/run_bill.png"  />
                                <span data-bind="text: lang.lang.run_bill" style=" text-transform: uppercase; color: #000; font-weight: 600; margin-top: 8px; display: inline-block;">Run Bill</span>
                            </a>
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-3" style="text-align: center;">
                            <a href="#/print_bill">
                                <img width="100%" title="Add Print Invoice" src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/water_logo/print_bill.png"  />
                                <span data-bind="text: lang.lang.print_bill" style="text-transform: uppercase; color: #000; font-weight: 600; margin-top: 8px; display: inline-block;">Print Bill</span>
                            </a>
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-3" style="text-align: center;">
                            <a href="<?php echo base_url(); ?>cashier" target="_blank">
                                <img width="100%" title="Receive Water Bill Payment" src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/water_logo/receipt.png"  />
                                <span data-bind="text: lang.lang.wreceipt"  style=" text-transform: uppercase; color: #000; font-weight: 600; margin-top: 8px; display: inline-block;">Receipt</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-md-6">
                        <div class="cash-bg" style="margin-bottom: 10px; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1;">
                            
                            <a href="http://app.banhji.com/c2/rrd/">
                                <div class="col-md-12" style="padding-left: 0;">
                                    <img style="height: 50px" src="<?php echo base_url();?>assets/water/banhji-logo.png" >
                                </div>
                            </a>
                        </div>
                        
                    </div>
                    <div class="col-xs-12 col-md-6" style="padding-left: 0">
                        <div class="cash-bg" style="margin-bottom: 10px; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1;">
                            <a href="http://market.utibill.com/" target="_blank"><img style="width: 100%" src="<?php echo base_url();?>assets/water/market.png"></a>
                        </div>
                    </div>
                </div>
                <div class="row-fluid" style="display: inline-block; margin-bottom: 15px;">
                    <div style="width: 100%; float: left; ">
                        <div style="width: 100%; background: #f4f4f4; float: left; text-align: left; overflow: hidden;">
                            <div id="carousel-1" class="carousel slide" data-ride="carousel" data-interval="6000" style="margin-bottom: 0; float: left;">
                                <ol class="carousel-indicators" style="bottom: 5px; left: 96%;">
                                    <li data-target="#carousel-1" data-slide-to="0" class="active"></li>
                                    <li data-target="#carousel-1" data-slide-to="1"></li>
                                </ol>
                                <div class="carousel-inner" style=" float: left;">
                                    <div class="item active">
                                        <a href="http://pro-cg.com/" target="_blank">
                                            <div class="carousel-caption" style="position: relative; right: 0; left: 0; padding: 0; top: 0; background: none;">
                                                 <img style="width: 100%; min-width: auto;" src="<?php echo base_url();?>assets/update/pcg-banner-banhji.png" >
                                            </div>
                                        </a>
                                    </div>
                                    <div class="item ">
                                        <div class="carousel-caption" style="position: relative; right: 0; left: 0; padding: 0; top: 0; background: none;">
                                             <img style="width: 100%; min-width: auto;" src="<?php echo base_url();?>assets/update/reachs-banner.png" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6" >
                <div class="cash-bg" style="margin-bottom: 10px; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1;">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <a href="#/to_be_connection_list">
                            <div class="cash-invoice" style="background: #203864; color: #fff; width: 98%">
                                <div class="span9" style="padding-left: 0; text-align: left;">
                                    <span style="font-size: 15px; ">A</span>
                                </div>
                                <div class="span3" style=" text-align: center; font-size: 18px; font-weight: 600; padding: 0;">
                                    <span style="float: right;" data-bind="text: totalConnect"></span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6" >
                        <a href="#/to_be_disconnect_list">
                            <div class="cash-invoice" style="background: #203864; color: #fff; width: 98%; float: right;">
                                <div class="span10" style="padding-left: 0; text-align: left;">
                                    <span data-bind="text: lang.lang.disconnect_meter" style="font-size:15px; "></span>
                                </div>
                                <div class="span2" style=" text-align: center; font-size: 18px; font-weight: 600; padding: 0;" data-bind="text: totalDisconnect" >
                                    
                                </div>
                            </div>
                        </a>
                    </div>
                    <a href="#/sale_summary">
                        <div class="cash-invoice" style="margin-bottom: 0; background: #203864; color: #fff;">
                            <div class="span4" style="padding-left: 0;">
                                <span data-bind="text: lang.lang.total_sale" style="font-size: 24px; color: #fff;">TOTAL SALE</span><br>
                            </div>
                            <div class="span8" style="color: #fff; text-align: center; font-size: 30px; font-weight: 600; padding: 0;">
                                <span style="float: right;" data-bind="text: totalSale"></span>
                            </div>                                      
                        </div>
                    </a>
                </div>
                <div class="cash-bg" style="margin-bottom: 10px; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1;">
                    <div class="row-fluid" >
                        <div class="col-xs-12 col-sm-6 col-md-7" style="background: #0077c5; padding-bottom: 15px; padding-top: 15px; padding-right: 0;">
                            <a href="#/customer_aging_sum_list">
                                <div class="widget-body alert-info welcome-nopadding" style="width: 100%; background: #0077c5; height: 182px;">
                                    <p style="color: #fff;"><span data-bind="text: lang.lang.expected_due">Expected due</span></p>
                            
                                    <div class="strong" align="center" style="color: #fff; font-size: 27px; line-height: 57px; margin-top: 20px; margin-bottom: 0;"><span data-bind="text: totalAmount"></span></div>
                                
                                    <table width="100%" style="color: #fff; margin-top: 20px;">
                                        <tbody>
                                            <tr align="center">
                                                <td>
                                                    <span style="font-size: 25px;"><span data-bind="text: invoice"></span></span>
                                                    <br>
                                                    <span data-bind="text: lang.lang.invoice">Invoices</span>
                                                </td>
                                                <td>
                                                    <span style="font-size: 25px;"><span data-bind="text: invCust"></span></span>
                                                    <br>
                                                    <span data-bind="text: lang.lang.customers">Customers</span>
                                                </td>
                                                <td>
                                                    <span style="font-size: 25px;"><span data-bind="text: overDue"></span></span>
                                                    <br>
                                                    <span data-bind="text: lang.lang.overdue">Overdue</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </a>
                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-5" style="background: #21abf6; padding-bottom: 15px; padding-top: 15px; padding-right: 0;">
                            <a href="#/customer_list">
                                <div class="widget-body alert-info welcome-nopadding" style="width: 100%; background: #21abf6; height: 182px;">
                                    <p style="color: #fff;"><span data-bind="text: lang.lang.active_meter">Active Meter</span></p>
                            
                                    <div class="strong" align="center" style="color: #fff; font-size: 40px; margin-top: 20px; margin-bottom: 0;"><span data-bind="text: activeCust"></span></div>
                                
                                    <table width="100%" style="color: #fff; margin-top: 20px;">
                                        <tbody>
                                            <tr align="center">
                                                <td>
                                                    <span style="font-size: 25px;" data-bind="text: totalMeter"></span>
                                                    <br>
                                                    <span data-bind="text: lang.lang.meter">Meter</span>
                                                </td>
                                                <td>
                                                    <span style="font-size: 25px;" data-bind="text: voidCust"></span>
                                                    <br>
                                                    <span data-bind="text: lang.lang.void">Void</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</script>
<script id="wsale-by-branch-row-template" type="text/x-kendo-tmpl">
    <tr>        
        <td class="sno">1</td>
        <td>#=name#</td>
        <td>#=location#</td>        
        <td >#=kendo.toString(active_customer, "n0")#</td>
        <td >#=kendo.toString(inactive_customer, "n0")#​</td>               
        <td >#=kendo.toString(deposit, "c0", banhji.institute.locale)#</td>
        <td >#=kendo.toString(usage, "n0")# </td>       
        <td style="text-align: right; padding-right: 5px !important;">#=kendo.toString(sale, "c0", banhji.institute.locale)#</td>
        <td style="text-align: right; padding-right: 5px !important;">#=kendo.toString(unpaid, "c0", banhji.institute.locale)#</td>                 
    </tr>   
</script>
<script id="wsale-by-location-row-template" type="text/x-kendo-tmpl">
    <tr>        
        <td class="snoo">1</td>
        <td>#=branch_name#</td>
        <td>#=location_name#</td>       
        <td >#=kendo.toString(active_customer, "n0")# </td>
        <td >#=kendo.toString(inactive_customer, "n0")#​ </td>              
        <td >#=kendo.toString(deposit, "c0", banhji.eDashBoard.locale)#</td>
        <td >#=kendo.toString(usage, "n0")# </td>       
        <td style="text-align: right; padding-right: 5px !important;" >#=kendo.toString(sale, "c0", banhji.eDashBoard.locale)#</td>
        <td style="text-align: right; padding-right: 5px !important;" >#=kendo.toString(unpaid, "c0", banhji.eDashBoard.locale)#</td>                       
    </tr>   
</script>
<script id="Attendance" type="text/x-kendo-template">
    <div class="container">
        <div class="row-fluid">
            <div class="background">
                <div class="row-fluid">
                    <div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
                        <i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
                    </div>
                    <div id="example" class="k-content">
                        <h2 data-bind="text: lang.lang.reading">Reading</h2>
                        <div class="hidden-print pull-right">
                            <span class="glyphicons no-js remove_2" 
                                data-bind="click: cancel"><i></i></span>
                        </div>
                        <div class="clear"></div>
                        <div class="relativeWrap" data-toggle="source-code">
                            <div class="widget widget-tabs widget-tabs-double-2 widget-tabs-gray">
                                <div class="widget-head" style="background: #203864 !important; color: #fff;">
                                    <ul style="padding-left: 0px;">
                                        <li class="active" style="width: 210px;"><a style="text-transform: capitalize;" href="#tabDownload" data-toggle="tab"><span style="line-height: 23px;"><span>Upload your file</span></b></span></a></li>
                                    </ul>
                                </div>
                                <div class="widget-body">
                                    <div class="tab-content">
                                        <!-- Tab content -->
                                        <div id="tabReading" style="border: 1px solid #ccc; padding: 15px" class="tab-pane active widget-body-regular">
                                            <h4 class="separator bottom" style="margin-top: 10px;" data-bind="text: lang.lang.please_upload_reading_book">Please upload reading book</h4>
                                            <div class="row clear" style="overflow: hidden; ">
                                               
                                            </div>
                                            <div style="margin-top: 20px;" class="fileupload fileupload-new margin-none" data-provides="fileupload">
                                                <input type="file"  data-role="upload" data-show-file-list="true" data-bind="events: {select: onSelected}" id="myFile"  class="margin-none" />
                                            </div>
                                            <table data-bind="visible: errorShow" class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs">
                                                <thead>
                                                    <tr>
                                                        <th class="center"><span data-bind="text: lang.lang.line">Line</span></th>
                                                        <th class="center"><span data-bind="text: lang.lang.meter_number">Meter Number</span></th>
                                                        <th class="center"><span data-bind="text: lang.lang.previous">Previus</span></th>
                                                        <th class="center"><span data-bind="text: lang.lang.current">Current</span></th>
                                                        <th class="center"><span data-bind="text: lang.lang.status">Status</span></th>
                                                    </tr>
                                                </thead>
                                                <tbody 
                                                    data-bind="source: Uploaderror" 
                                                    data-auto-bind="true" 
                                                    data-role="listview" 
                                                    data-template="row-template">
                                                </tbody>
                                            </table>
                                            <br>

                                            <span data-bind="click: calculate" class="btn btn-icon btn-primary glyphicons ok_2" style="margin-top: 3px;width: 160px!important;"><i></i><span  >Start</span></span>
                                        </div>
                                        <!-- // Tab content END -->
                                    </div>
                                </div>
                                <div id="ntf1" data-role="notification"></div>
                            </div>
                        </div>
                        <!-- // Tabs END -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</script>
<script id="row-template" type="text/x-kendo-tmpl">
    <tr>
        <td align="center">
            #= line#
        </td>
        <td>
            #= meter_number#
        </td>
        <td align="center">
            #= previous#
        </td>
        <td align="center" style="font-weight: bold;color:red">
            #= current#
        </td>
        <td align="center">
            <span><i class="icon-remove"></i></span>
        </td>   
    </tr>
</script>
<!-- ***************************
*   Menu Section              *
**************************** -->
<script id="staffMenu" type="text/x-kendo-template">
    <ul class="topnav pull-left">
        <li><a href='#/center'><span data-bind="text: lang.lang.center"></span></a></li>
        <li role='presentation' class='dropdown'>
            <a class='dropdown-toggle glyphicons text_bigger' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'><i class="text-t"></i> <span class='caret'></span></a>
            <ul class='dropdown-menu'>
                <li><a href='#/employee'><span >Add Employee</span></a></li>
                <li><a href='#/attendance'><span >Attendance</span></a></li>
            </ul>
        </li>
        <li><a href="#/reports" style="color: #fff">REPORTS</a></li>
        <li style="width: 47px"><a style="width: 47px;" href='#/setting' class='glyphicons settings'><i class="text-t"></i></a></li>
    </ul>
</script>