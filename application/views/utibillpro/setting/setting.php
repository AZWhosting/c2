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
                <li style="list-style: none;">
                    <a onclick="fullScreen(); return false;" class="fullscreen " href="#" role="button" aria-haspopup="true" aria-expanded="false"> <i class="icon-fullscreen"></i></a>
                    <a onclick="exitFullScreen(); return false;" class="exitfullscreen " style="display: none;"  href="#" role="button" aria-haspopup="true" aria-expanded="false"> <i class="icon-resize-small"></i></a>
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
<script type="text/javascript">
    
    function fullScreen(){
        var docElm = document.documentElement;
        if (docElm.requestFullscreen) {
            docElm.requestFullscreen();
        }
        else if (docElm.mozRequestFullScreen) {
            docElm.mozRequestFullScreen();
        }
        else if (docElm.webkitRequestFullScreen) {
            docElm.webkitRequestFullScreen();
        }
        $('.exitfullscreen').show();
        $('.fullscreen').hide();
    }
    function exitFullScreen(){
        var docElm = document.documentElement;
        if (document.exitFullscreen) {
                document.exitFullscreen();
            } else if (document.webkitExitFullscreen) {
                document.webkitExitFullscreen();
            } else if (document.mozCancelFullScreen) {
                document.mozCancelFullScreen();
            } else if (document.msExitFullscreen) {
                document.msExitFullscreen();
            }
        $('.exitfullscreen').hide();
        $('.fullscreen').show();
    }
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
<script id="wDashBoard" type="text/x-kendo-template">
    <div class="container">
        <!-- <img style="margin: 0 0 5px -21px;" src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/water_logo/utibill_logo.png" width="300" > -->
        <div class="row" style="margin-top: 30px;">
            <div class="col-md-6">
                <div class="cash-bg" style="margin-bottom: 10px; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1;">               
                    <div class="row-fluid" >
                        <div class="col-xs-3 col-sm-3 col-md-3" style="text-align: center;">
                            <a href="#/reading">
                                <img width="100%" title="Add Reading" src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/water_logo/reading.png"   />
                                <span data-bind="text: lang.lang.reading" style="text-transform: uppercase; color: #000; font-weight: 600; margin-top: 8px; display: inline-block;">Readings</span>
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
                                    <!-- <li data-target="#carousel-1" data-slide-to="2"></li> -->  
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
                                    <!-- <div class="item ">
                                        <div class="carousel-caption" style="position: relative; right: 0; left: 0; padding: 0; top: 0; background: none;">
                                             <img style="width: 100%; min-width: auto;" src="<?php echo base_url();?>assets/water/banner/reachs_banner.png" >
                                        </div>
                                    </div> -->
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
                                    <span data-bind="text: lang.lang.meter_to_be_connected" style="font-size: 15px; "></span>
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
                                                    <span style="font-size: 25px;" data-bind="text: totalInactive"></span>
                                                    <br>
                                                    <span data-bind="text: lang.lang.meter_void">Void</span>
                                                </td>
                                                <td>
                                                    <span style="font-size: 25px;" data-bind="text: voidCust"></span>
                                                    <br>
                                                    <span data-bind="text: lang.lang.void">Inactive</span>
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
        <div class="row">
            <div class='col-sm-6'>
                <div class="home-chart row-fluid" style="margin-bottom: 15px; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1; float: left; width: 100%; background: #fff;">
                    <div class="col-xs-12 col-sm-12">
                        <div class="chart" >
                            <div data-role="chart"
                                 data-auto-bind="true"
                                 data-legend="{ position: 'top' }"
                                 data-series-defaults="{ type: 'column' }"
                                 data-tooltip='{
                                    visible: true,
                                    format: "{0}%",
                                    template: "#= series.name #: #= kendo.toString(value, &#39;c&#39;, banhji.locale) #"
                                 }'                 
                                 data-series="[
                                                 { field: 'amount', name: langVM.lang.sale, categoryField:'month', color: '#203864', overlay:{ gradient: 'none'}  }
                                             ]"
                                 data-bind="source: graphDS"
                                 style="height: 240px; " >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class='col-sm-6'>
                <div class="home-chart row-fluid" style="margin-bottom: 15px; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1; float: left; width: 100%; background: #fff;">
                    <div class="col-xs-12 col-sm-12">
                        <div class="chart" >
                            <div data-role="chart"
                                 data-auto-bind="true"
                                 data-legend="{ position: 'top' }"
                                 data-series-defaults="{ type: 'column' }"
                                 data-tooltip='{
                                    visible: true,
                                    format: "{0}%",
                                    template: "#= series.name #: #= kendo.toString(value) #"
                                 }'                 
                                 data-series="[
                                                 { field: 'amount', name: langVM.lang.waterSale, categoryField:'month', color: '#203864', overlay:{ gradient: 'none'}  }
                                             ]"
                                 data-bind="source: graphWater"
                                 style="height: 240px; " >
                            </div>
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

<!--Setting-->
<script id="setting" type="text/x-kendo-template">
    <div class="container">
        <div class="row-fluid">
            <div class="background">
                <div class="row-fluid">
                    <div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
                        <i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
                    </div>
                    <div id="example" data-bind="invisible: havePassword" class="k-content">
                        <input 
                            data-bind="value: settingPassword" 
                            type="password" 
                            placeholder="******" 
                            style="height: 32px; padding: 5px; margin-right: 10px;" class="span3 k-textbox k-invalid" 
                        />
                        <a class="btn-icon btn-primary glyphicons circle_plus cutype-icon" style="width: 80px; padding: 5px 7px 5px 35px !important; text-align: left;" data-bind="click: addPassword"><i></i><span data-bind="text: lang.lang.save">Add</span></a>
                    </div>
                    <div id="example" data-bind="visible: havePassword" class="k-content">
                        <h2 data-bind="text: lang.lang.settings">Setting</h2>
                        <div class="hidden-print pull-right">
                            <span class="glyphicons no-js remove_2" 
                                data-bind="click: cancel"><i></i></span>
                        </div>
                        <div class="clear"></div>
                        <div style="float: left; width: 100%; " class="widget widget-tabs widget-tabs-double widget-tabs-vertical row-fluid row-merge widget-tabs-gray">
                            <div id="setting" class="widget-head col-xs-12 col-sm-3">
                                <ul>
                                    <li class="active">
                                        <a href="#tab1" class="glyphicons notes_2" data-toggle="tab">
                                            <i></i><span class="strong"><span data-bind="text: lang.lang.license">License</span></span>
                                        </a>
                                    </li>  
                                     <li>
                                        <a href="#tab2" class="glyphicons pushpin" data-toggle="tab">
                                            <i></i><span class="strong"><span data-bind="text: lang.lang.location">Location</span></span>
                                        </a>
                                    </li>  
                                    <li>
                                        <a href="#tab3" class="glyphicons old_man" data-toggle="tab">
                                            <i></i><span class="strong"><span data-bind="text: lang.lang.customer_types">Customer Types</span></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tab4" data-bind="click: goExemption" class="glyphicons retweet_2" data-toggle="tab">
                                            <i></i><span class="strong"><span data-bind="text: lang.lang.exemption">Exemption</span></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tab5" data-bind="click: goTariff" class="glyphicons calculator" data-toggle="tab">
                                            <i></i><span class="strong"><span data-bind="text: lang.lang.tariff">Tariff</span></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tab6" data-bind="click: goDeposit" class="glyphicons wallet" data-toggle="tab">
                                            <i></i><span class="strong"><span data-bind="text: lang.lang.deposit">Deposit</span></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tab7" data-bind="click: goService" class="glyphicons cleaning" data-toggle="tab">
                                            <i></i><span class="strong"><span data-bind="text: lang.lang.service">Service</span></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tab8" data-bind="click: goMaintenance" class="glyphicons rotation_lock" data-toggle="tab">
                                            <i></i><span class="strong"><span data-bind="text: lang.lang.other_charge">Other Charge</span></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#fine" data-bind="click: goFine" class="glyphicons more" data-toggle="tab">
                                            <i></i><span class="strong"><span data-bind="text: lang.lang.fine">Fine</span></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tab9" data-bind="click: goPlan" class="glyphicons list" data-toggle="tab">
                                            <i></i><span class="strong"><span data-bind="text: lang.lang.plans">Plans</span></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#offline" class="glyphicons lock" data-toggle="tab">
                                            <i></i><span class="strong" data-bind="text: lang.lang.offline"><span>Offline</span></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tab10" class="glyphicons nameplate_alt" data-toggle="tab">
                                            <i></i><span class="strong"><span data-bind="text: lang.lang.custom_forms">Custom Forms</span></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tab11" class="glyphicons building" data-toggle="tab">
                                            <i></i><span class="strong"><span data-bind="text: lang.lang.prefix_setting">Prefix Setting</span></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tab12" data-bind="click: goBrand" class="glyphicons certificate" data-toggle="tab">
                                            <i></i><span class="strong"><span data-bind="text: lang.lang.brand">Brand</span></span>
                                        </a>
                                    </li>                        
                                </ul>
                            </div>
                            <div class="widget-body col-xs-12 col-sm-9 setting">
                                <div class="row-fluid">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab1">
                                            <a class="btn-icon btn-primary glyphicons circle_plus" style="width: 80px; padding: 5px 7px 5px 35px !important; text-align: left;" href="#/add_license"><i></i><span data-bind="text: lang.lang.add">Add</span></a>
                                            <table style="width: 100%;" class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs">
                                                <thead>
                                                    <tr>
                                                        <th style="vertical-align: top; text-align: center;" ><span data-bind="text: lang.lang.number">Number</span></th>
                                                        <th style="vertical-align: top; text-align: center;" ><span data-bind="text: lang.lang.name">Name</span></th>
                                                        <th style="vertical-align: top; text-align: center;" ><span data-bind="text: lang.lang.abbr">Abbr</span></th>
                                                        <th style="vertical-align: top; text-align: center;" ><span data-bind="text: lang.lang.representive">Representive</span></th>
                                                        <th style="vertical-align: top; text-align: center;" ><span data-bind="text: lang.lang.expire_date">Expire Date</span></th>
                                                        <th style="vertical-align: top; text-align: center;" ><span data-bind="text: lang.lang.max_con">Max Con.</span></th>
                                                        <th style="vertical-align: top; text-align: center;" ><span data-bind="text: lang.lang.status">Status</span></th>
                                                    </tr>
                                                </thead>
                                                <tbody data-role="listview"                             
                                                        data-template="licenseSetting-template"
                                                        data-bind="source: licenseDS"></tbody>
                                            </table>
                                        </div>
                                        <div class="tab-pane" id="tab2">
                                            <div style="clear: both;">
                                                <input data-role="dropdownlist"
                                                   class="span3"
                                                   style="padding-right: 1px;height: 32px;"
                                                   data-option-label="(--- Select ---)"
                                                   data-auto-bind="false"
                                                   data-value-primitive="false"
                                                   data-text-field="name"
                                                   data-value-field="id"
                                                   data-bind="value: blockCompanyId,
                                                              source: licenseDS,
                                                              events: {change: onLicenseChange}"/>
                                                <input data-bind="value: blocName, attr: {placeholder: lang.lang.location}" type="text" placeholder="Location" style="height: 32px; padding: 5px; margin-right: 10px; margin-left: 10px;"  class="span3 k-textbox k-invalid" />
                                                <input data-bind="value: blocAbbr, attr: {placeholder: lang.lang.abbr}" type="text" placeholder="Abbr" style="height: 32px; padding: 5px; margin-right: 10px;" class="span3 k-textbox k-invalid" />
                                                <a class="btn-icon btn-primary glyphicons circle_plus cutype-icon" style="width: 80px; padding: 5px 7px 5px 35px !important; text-align: left;" data-bind="click: addBloc"><i></i><span data-bind="text: lang.lang.add">Add</span></a>
                                            </div>
                                            <table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align: center;"><span data-bind="text: lang.lang.license">License</span></th>
                                                        <th style="text-align: center;"><span data-bind="text: lang.lang.location">Location</span></th>
                                                        <th style="text-align: center;"><span data-bind="text: lang.lang.abbr">Abbr</span></th>
                                                        <th style="text-align: center;"><span data-bind="text: lang.lang.action">Action</span></th>
                                                    </tr>
                                                </thead>
                                                <tbody data-role="listview"     
                                                    data-template="blocSetting-template"
                                                    data-edit-template="bloc-edit-template"
                                                    data-auto-bind="false"
                                                    data-bind="source: blocDS"></tbody>
                                            </table>

                                            <br>
                                            <p data-bind="visible: blocSelect"><span data-bind="text: lang.lang.location_name">Location Name</span>: <span data-bind="text: blocNameShow"></span></p>
                                            <table data-bind="visible: blocSelect" class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs">
                                                <thead>
                                                    <tr>
                                                        <th style="vertical-align: top;"><span data-bind="text: lang.lang.name">Name</span></th>
                                                        <th style="vertical-align: top;"><span data-bind="text: lang.lang.action">Action</span></th>
                                                    </tr>
                                                </thead>
                                                <tbody data-role="listview"                             
                                                        data-template="pole-template"
                                                        data-auto-bind="false"
                                                        data-edit-template="pole-edit-template"
                                                        data-bind="source: poleDS"></tbody>
                                            </table>

                                            <br>
                                            <p data-bind="visible: poleSelect"><span data-bind="text: lang.lang.sub_location_name">Pole Name</span>: <span data-bind="text: poleNameShow"></span></p>
                                            <table data-bind="visible: poleSelect" class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs">
                                                <thead>
                                                    <tr>
                                                        <th style="vertical-align: top;"><span data-bind="text: lang.lang.name">Name</span></th>
                                                        <th style="vertical-align: top;"><span data-bind="text: lang.lang.action">Action</span></th>
                                                    </tr>
                                                </thead>
                                                <tbody data-role="listview"                             
                                                        data-template="box-template"
                                                        data-auto-bind="false"
                                                        data-edit-template="box-edit-template"
                                                        data-bind="source: boxDS"></tbody>
                                            </table>
                                            <div id="addPole"
                                                data-role="window"
                                                     data-width="250"
                                                     data-height="120"
                                                     data-actions="{}"
                                                     data-resizable="false"
                                                     data-position="{top: '30%', left: '37%'}"                       
                                                     data-bind="visible: poleVisible">
                                                <table>
                                                    <tr style="border-bottom: 8px solid #fff;">
                                                        <td width="35%"><span data-bind="text: lang.lang.name"></span></td>
                                                        <td>
                                                            <input class="k-textbox" placeholder="Name ..." data-bind="attr: {placeholder: lang.lang.name}, value: poleName" style="width: 100%;">
                                                        </td>
                                                    </tr>
                                                </table>

                                                <br>
                                                <div style="text-align: center;">
                                                    <span style="margin-bottom: 0;" class="btn btn-success btn-icon glyphicons ok_2" data-bind="click: savePole"><i></i><span data-bind="text: lang.lang.save"></span></span>

                                                    <span class="btn btn-danger btn-icon glyphicons remove_2" data-bind="click: closePoleWin"><i></i><span data-bind="text: lang.lang.close"></span></span>  
                                                </div>
                                            </div>
                                            <!-- Box Item Window -->
                                            <div id="addBox"
                                                data-role="window"
                                                     data-width="250"
                                                     data-height="120"
                                                     data-actions="{}"
                                                     data-resizable="false"
                                                     data-position="{top: '30%', left: '37%'}"
                                                     data-bind="visible: boxVisible">
                                                <table>
                                                    <tr style="border-bottom: 8px solid #fff;">
                                                        <td width="35%"><span data-bind="text: lang.lang.name"></span></td>
                                                        <td>
                                                            <input class="k-textbox" placeholder="Name ..." data-bind="attr: {placeholder: lang.lang.name}, value: boxName" style="width: 100%;">
                                                        </td>
                                                    </tr>
                                                </table>

                                                <br>
                                                <div style="text-align: center;">
                                                    <span style="margin-bottom: 0;" class="btn btn-success btn-icon glyphicons ok_2" data-bind="click: saveBox"><i></i><span data-bind="text: lang.lang.save"></span></span>
                                                    <span class="btn btn-danger btn-icon glyphicons remove_2" data-bind="click: closeBoxWin"><i></i><span data-bind="text: lang.lang.close"></span></span>  
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab3">
                                            <div style="clear: both;">
                                                <input type="text" class="span3 k-textbox k-invalid" style="height: 32px; padding: 5px; margin-right: 10px;" data-bind="value: contactTypeName, attr: {placeholder: lang.lang.type}" placeholder="Type" />
                                                <input type="text" placeholder="Abbr" data-bind="value: contactTypeAbbr, attr: {placeholder: lang.lang.abbr}" style="height: 32px; padding: 5px; margin-right: 10px;"  class="span3 k-textbox k-invalid" />
                                                <select class="span3" style="height: 32px; border-radius: 0; background: #fff;" id="appendedInputButtons" data-bind="value: contactTypeCompany" >
                                                    <option value="0" data-bind="text: lang.lang.not_a_company">Not A Company</option>
                                                    <option value="1" data-bind="text: lang.lang.it_is_a_company">It is A Company</option>           
                                                </select>
                                                <a class="btn-icon btn-primary glyphicons circle_plus cutype-icon" style="width: 80px; padding: 5px 7px 5px 35px !important; text-align: left;" data-bind="click: addContactType"><i></i><span data-bind="text: lang.lang.add">Add</span></a>
                                            </div>
                                            <table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs">
                                                <thead>
                                                    <tr>
                                                        <th class="center"><span data-bind="text: lang.lang.type"></span></th>
                                                        <th class="center"><span data-bind="text: lang.lang.abbr"></span></th>
                                                        <th class="center"><span data-bind="text: lang.lang.is_company"></span></th>
                                                        <th class="center"></th>
                                                    </tr>
                                                </thead>
                                                <tbody data-role="listview"
                                                        data-auto-bind="false"      
                                                        data-edit-template="customerSetting-edit-contact-type-template"
                                                        data-template="customerSetting-contact-type-template"
                                                        data-bind="source: contactTypeDS"></tbody>
                                            </table>
                                        </div>
                                        <div class="tab-pane" id="tab4">
                                            <div style="clear: both;">
                                                <input data-bind="value: exName, attr: {placeholder: lang.lang.name}" type="text" placeholder="Name" style="height: 32px; padding: 5px; margin-right: 10px;"  class="span2 k-textbox k-invalid" />

                                                <input data-role="dropdownlist"
                                                   class="span2"
                                                   style="padding-right: 1px; height: 32px; margin-right: 10px;" 
                                                   data-option-label="(--- Acount ---)"
                                                   data-auto-bind="false"                              
                                                   data-value-primitive="true"
                                                   data-text-field="name"
                                                   data-value-field="id"
                                                   data-bind="value: exAccount,
                                                              source: exAccountDS"/>

                                                <input data-role="dropdownlist"
                                                   class="span2"
                                                   style="padding-right: 1px; height: 32px; margin-right: 10px;" 
                                                   data-option-label="(--- Unit ---)"
                                                   data-auto-bind="false"                              
                                                   data-value-primitive="true"
                                                   data-text-field="name"
                                                   data-value-field="id"
                                                   data-bind="value: exUnit,
                                                              source: typeUnit,
                                                              events: {change: unitChange}" />

                                                <input data-role="dropdownlist"
                                                   class="span2"
                                                   style="padding-right: 1px; height: 32px; margin-right: 10px;" 
                                                   data-option-label="(--- Currency ---)"                      
                                                   data-value-primitive="true"
                                                   data-text-field="code"
                                                   data-value-field="id"
                                                   data-bind="value: exCurrency,
                                                              source: currencyDS"/>

                                                <input data-bind="visible: priceUnit, value: exPrice, attr: {placeholder: lang.lang.price}" type="text" placeholder="Price" style="height: 32px; padding: 5px; margin-right: 10px;" class="span2 k-textbox k-invalid" />
                                                <input data-bind="visible: percentUnit, value: exPrice" type="text" placeholder="%" data-spinners="false" data-role="numerictextbox" max="100" min="1" style="padding:0;" class="span2 k-input k-valid" />
                                                <input data-bind="visible: meterUnit, value: exPrice" type="text" placeholder="0" data-spinners="false" data-role="numerictextbox" max="100" min="1" style="padding:0;" class="span2 k-input k-valid" />

                                                <a class="btn-icon btn-primary glyphicons circle_plus cutype-icon" style="width: 80px; padding: 5px 7px 5px 35px !important; text-align: left;" data-bind="click: addEx"><i></i><span data-bind="text: lang.lang.add">Add</span></a>
                                            </div>
                                            <table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align: center;"><span data-bind="text: lang.lang.name">Name</span></th>
                                                        <th style="text-align: center;"><span data-bind="text: lang.lang.account">Account</span></th>
                                                        <th style="text-align: center;"><span data-bind="text: lang.lang.unit">Unit</span></th>
                                                        <th style="text-align: center;"><span data-bind="text: lang.lang.currency">Currency</span></th>
                                                        <th style="text-align: center;"><span data-bind="text: lang.lang.exemption">Exemption</span></th>
                                                        <th style="text-align: center;"><span data-bind="text: lang.lang.action">Action</span></th>
                                                    </tr>
                                                </thead>
                                                <tbody data-role="listview"                             
                                                        data-template="exemptionSetting-template"
                                                        data-auto-bind="false"
                                                        data-edit-template="exemption-edit-template"
                                                        data-bind="source: planItemDS"></tbody>
                                            </table>
                                        </div>
                                        <div class="tab-pane" id="tab5">
                                            <div style="clear: both; ">
                                                <input data-bind="value: tariffName, attr: {placeholder: lang.lang.name}" type="text" placeholder="Name" style="height: 32px; padding: 5px; margin-right: 10px;"  class="span3 k-textbox k-invalid" />

                                                <input data-role="dropdownlist"
                                                   class="span2"
                                                   style="padding-right: 1px; height: 32px; margin-right: 10px;" 
                                                   data-option-label="(--- Flat ---)"
                                                   data-auto-bind="false"                              
                                                   data-value-primitive="true"
                                                   data-text-field="name"
                                                   data-value-field="id"
                                                   data-bind="value: tariffFlat,
                                                              source: tariffFlatType"/>

                                                <input data-role="dropdownlist"
                                                   class="span3"
                                                   style="padding-right: 1px; height: 32px; margin-right: 10px;" 
                                                   data-option-label="(--- Acount ---)"
                                                   data-auto-bind="false"
                                                   data-value-primitive="true"
                                                   data-text-field="name"
                                                   data-value-field="id"
                                                   data-bind="value: tariffAccount,
                                                              source: tariffAccDS"/>

                                                <input data-role="dropdownlist"
                                                   class="span2"
                                                   style="padding-right: 1px; height: 32px; margin-right: 10px;" 
                                                   data-option-label="(--- Currency ---)"
                                                   data-auto-bind="false"                              
                                                   data-value-primitive="true"
                                                   data-text-field="code"
                                                   data-value-field="id"
                                                   data-bind="value: tariffCurrency,
                                                              source: currencyDS"/>

                                                <a class="btn-icon btn-primary glyphicons circle_plus cutype-icon" style="width: 80px; padding: 5px 7px 5px 35px !important; text-align: left;" data-bind="click: addTariff"><i></i><span data-bind="text: lang.lang.add">Add</span></a>
                                            </div>
                                            <table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align: center; vertical-align: top;"><span data-bind="text: lang.lang.name">Name</span></th>
                                                        <th style="text-align: center; vertical-align: top;"><span data-bind="text: lang.lang.flat">Flat</span></th>
                                                        <th style="text-align: center; vertical-align: top;"><span data-bind="text: lang.lang.account">Account</span></th>
                                                        <th style="text-align: center; vertical-align: top;"><span data-bind="text: lang.lang.currency">Currency</span></th>
                                                        <th style="text-align: center; vertical-align: top;"><span data-bind="text: lang.lang.action">Action</span></th>
                                                    </tr>
                                                </thead>
                                                <tbody data-role="listview"                             
                                                        data-template="tariffSetting-template"
                                                        data-edit-template="tariff-edit-template"
                                                        data-auto-bind="false"
                                                        data-bind="source: planItemDS"></tbody>
                                            </table>
                                            
                                            <br>
                                            <p data-bind="visible: tariffSelect"><span data-bind="text: lang.lang.tariff_name"></span>: <span data-bind="text: tariffNameShow"></span></p>
                                            <table data-bind="visible: tariffSelect" class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align: center; vertical-align: top;"><span data-bind="text: lang.lang.name">Name</span></th>
                                                        <th style="text-align: center; vertical-align: top;"><span data-bind="text: lang.lang.usage">Usage</span></th>
                                                        <th style="text-align: center; vertical-align: top;"><span data-bind="text: lang.lang.price">Price</span></th>
                                                        <th style="text-align: center; vertical-align: top;"><span data-bind="text: lang.lang.action">Action</span></th>
                                                    </tr>
                                                </thead>
                                                <tbody data-role="listview"                             
                                                        data-template="tariff-item-template"
                                                        data-auto-bind="false"
                                                        data-edit-template="tariff-edit-item-template"
                                                        data-bind="source: tariffItemDS"></tbody>
                                            </table>
                                            <!-- Tariff Item Window -->
                                            <div id="addTariffItem"
                                                    data-role="window"                       
                                                     data-width="250"
                                                     data-height="190"
                                                     data-resizable="false"
                                                     data-actions="{}"
                                                     data-position="{top: '30%', left: '37%'}"
                                                     data-bind="visible: windowTariffItemVisible">
                                                <table>
                                                    <tr style="border-bottom: 8px solid #fff;">
                                                        <td width="35%"><span data-bind="text: lang.lang.name"></span></td>
                                                        <td>
                                                            <input class="k-textbox" placeholder="Item Name ..." data-bind="attr :{placeholder: lang.lang.name}, value: tariffItemName" style="width: 100%;">
                                                        </td>
                                                    </tr>
                                                    <tr style="border-bottom: 8px solid #fff;">
                                                        <td><span data-bind="text: lang.lang.usage">Usage</span></td>
                                                        <td>
                                                            <input class="k-textbox" placeholder="Usage ..." data-bind="attr:{placeholder: lang.lang.usage},value: tariffItemUsage" style="width: 100%;">
                                                        </td>
                                                    </tr>
                                                    <tr style="border-bottom: 8px solid #fff;">
                                                        <td><span data-bind="text: lang.lang.price">Price</span></td>
                                                        <td>
                                                            <input 
                                                            class="k-textbox" placeholder="Price ..." 
                                                            data-bind="attr:{placeholder: lang.lang.price}, value: tariffItemAmount" style="width: 100%;">
                                                        </td>
                                                    </tr>
                                                </table>

                                                <br>
                                                <div style="text-align: center;">
                                                    <span style="margin-bottom: 0;" class="btn btn-success btn-icon glyphicons ok_2" data-bind="click: saveTariffItem"><i></i><span data-bind="text: lang.lang.save"></span></span>

                                                    <span class="btn btn-danger btn-icon glyphicons remove_2" data-bind="click: closeTariffWindowItem"><i></i><span data-bind="text: lang.lang.close"></span></span>  
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab6">
                                            <div style="clear: both;">
                                                <input data-bind="value: depositName, attr: {placeholder: lang.lang.name}" type="text" placeholder="Name" style="height: 32px; padding: 5px; margin-right: 10px;"  class="span2 k-textbox k-invalid" />
                                                <input data-role="dropdownlist"
                                                   class="span2"
                                                   style="padding-right: 1px; height: 32px; margin-right: 10px;" 
                                                   data-option-label="(--- Acount ---)"
                                                   data-auto-bind="false"                              
                                                   data-value-primitive="true"
                                                   data-text-field="name"
                                                   data-value-field="id"
                                                   data-bind="value: depositAccount,
                                                              source: depositAccDS"/>

                                                <input data-role="dropdownlist"
                                                   class="span2"
                                                   style="padding-right: 1px; height: 32px; margin-right: 10px;" 
                                                   data-option-label="(--- Currency ---)"
                                                   data-auto-bind="false"                              
                                                   data-value-primitive="true"
                                                   data-text-field="code"
                                                   data-value-field="id"
                                                   data-bind="value: depositCurrency,
                                                              source: currencyDS"/>

                                                <input data-bind="value: depositPrice, attr: {placeholder: lang.lang.price}" type="text" placeholder="Price" style="height: 32px; padding: 5px; margin-right: 10px;" class="span2 k-textbox k-invalid" />

                                                <a class="btn-icon btn-primary glyphicons circle_plus cutype-icon" style="width: 80px; padding: 5px 7px 5px 35px !important; text-align: left;" data-bind="click: addDeposit"><i></i><span data-bind="text: lang.lang.add">Add</span></a>
                                            </div>
                                            <table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align: center;"><span data-bind="text: lang.lang.name">Name</span></th>
                                                        <th style="text-align: center;"><span data-bind="text: lang.lang.account">Account</span></th>
                                                        <th style="text-align: center;"><span data-bind="text: lang.lang.currency">Currency</span></th>
                                                        <th style="text-align: center;"><span data-bind="text: lang.lang.price">Price</span></th>
                                                        <th style="text-align: center;"><span data-bind="text: lang.lang.action">Action</span></th>
                                                    </tr>
                                                </thead>
                                                <tbody data-role="listview"                             
                                                        data-template="depositSetting-template"
                                                        data-edit-template="deposit-edit-template"
                                                        data-auto-bind="false"
                                                        data-bind="source: planItemDS"></tbody>
                                            </table>
                                        </div>
                                        <div class="tab-pane" id="tab7">
                                            <div style="clear: both;">
                                                <!-- <input data-bind="value: serviceName, attr: {placeholder: lang.lang.name}" type="text" placeholder="Name" style="height: 32px; padding: 5px; margin-right: 10px;"  class="span2 k-textbox k-invalid" />
                                                <input data-role="dropdownlist"
                                                   class="span2"
                                                   style="padding-right: 1px; height: 32px; margin-right: 10px;" 
                                                   data-option-label="(--- Select Item ---)"
                                                   data-auto-bind="false"
                                                   data-value-primitive="true"
                                                   data-text-field="name"
                                                   data-value-field="id"
                                                   data-bind="value: serviceAss,
                                                      source: serviceAssDS,
                                                      events: {change: serviceAssChange}"/>
                                                <input data-role="dropdownlist"
                                                   class="span2"
                                                   style="padding-right: 1px; height: 32px; margin-right: 10px;" 
                                                   data-option-label="(--- Currency ---)"
                                                   data-auto-bind="false"
                                                   data-value-primitive="true"
                                                   data-text-field="code"
                                                   data-value-field="id"
                                                   data-bind="enabled: sFalse, value: serviceCurrency,
                                                      source: scurrencyDS"/>
                                                <input data-bind="enabled: sFalse,value: servicePrice, attr: {placeholder: lang.lang.price}" type="text" placeholder="Price" style="height: 32px; padding: 5px; margin-right: 10px;" class="span2 k-textbox k-invalid" /> -->
                                                <a class="btn-icon btn-primary glyphicons circle_plus cutype-icon" style="width: 80px; padding: 5px 7px 5px 35px !important; text-align: left;" href="#/item_assembly" ><i></i><span data-bind="text: lang.lang.add">Add</span></a>
                                            </div>
                                            <table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align: center;"><span data-bind="text: lang.lang.name">Name</span></th>
                                                        <th style="text-align: center;"><span data-bind="text: lang.lang.item">Assembly</span></th>
                                                        <th style="text-align: center;"><span data-bind="text: lang.lang.currency">Currency</span></th>
                                                        <th style="text-align: center;"><span data-bind="text: lang.lang.price">Price</span></th>
                                                        <th style="text-align: center;"><span data-bind="text: lang.lang.action">Action</span></th>
                                                    </tr>
                                                </thead>
                                                <tbody data-role="listview"
                                                    data-template="serviceSetting-template"
                                                    data-edit-template="service-edit-template"
                                                    data-auto-bind="false"
                                                    data-bind="source: serviceItemDS"></tbody>
                                            </table>
                                        </div>
                                        <div class="tab-pane" id="tab8">
                                            <div style="clear: both;">
                                                <input data-bind="value: maintenanceName, attr: {placeholder: lang.lang.name}" type="text" placeholder="Name" style="height: 32px; padding: 5px; margin-right: 10px;"  class="span2 k-textbox k-invalid" />
                                                <input data-role="dropdownlist"
                                                   class="span2"
                                                   style="padding-right: 1px; height: 32px; margin-right: 10px;" 
                                                   data-option-label="(--- Account ---)"
                                                   data-auto-bind="false"
                                                   data-value-primitive="true"
                                                   data-text-field="name"
                                                   data-value-field="id"
                                                   data-bind="value: maintenanceAccount,
                                                              source: tariffAccDS"/>
                                                <input data-role="dropdownlist"
                                                   class="span2"
                                                   style="padding-right: 1px; height: 32px; margin-right: 10px;" 
                                                   data-option-label="(--- Currency ---)"
                                                   data-auto-bind="false"
                                                   data-value-primitive="true"
                                                   data-text-field="code"
                                                   data-value-field="id"
                                                   data-bind="value: maintenanceCurrency,
                                                              source: currencyDS"/>
                                                <input data-bind="value: maintenancePrice, attr: {placeholder: lang.lang.price}" type="text" placeholder="Price" style="height: 32px; padding: 5px; margin-right: 10px;" class="span2 k-textbox k-invalid" />

                                                <a class="btn-icon btn-primary glyphicons circle_plus cutype-icon" style="width: 80px; padding: 5px 7px 5px 35px !important; text-align: left;" data-bind="click: addMaintenance"><i></i><span data-bind="text: lang.lang.add">Add</span></a>
                                            </div>
                                            <table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align: center;"><span data-bind="text: lang.lang.name">Name</span></th>
                                                        <th style="text-align: center;"><span data-bind="text: lang.lang.account">Account</span></th>
                                                        <th style="text-align: center;"><span data-bind="text: lang.lang.currency">Currency</span></th>
                                                        <th style="text-align: center;"><span data-bind="text: lang.lang.price">Price</span></th>
                                                        <th style="text-align: center;"><span data-bind="text: lang.lang.action">Action</span></th>
                                                    </tr>
                                                </thead>
                                                <tbody data-role="listview"                             
                                                        data-template="maintenanceSetting-template"
                                                        data-auto-bind="false"
                                                        data-edit-template="maintenance-edit-template"
                                                        data-bind="source: planItemDS"></tbody>
                                            </table>
                                        </div>
                                        <div class="tab-pane" id="fine">
                                            <div style="clear: both;">
                                                <input data-bind="value: fineName, attr: {placeholder: lang.lang.name}" type="text" placeholder="Name" style="height: 32px; padding: 5px; margin-right: 10px;"  class="span2 k-textbox k-invalid" />

                                                <input data-role="dropdownlist"
                                                   class="span2"
                                                   style="padding-right: 1px; height: 32px; margin-right: 10px;" 
                                                   data-option-label="-Acount-"
                                                   data-auto-bind="false"                              
                                                   data-value-primitive="true"
                                                   data-text-field="name"
                                                   data-value-field="id"
                                                   data-bind="value: fineAccount,
                                                              source: tariffAccDS"/>

                                                <input data-role="dropdownlist"
                                                   class="span2"
                                                   style="padding-right: 1px; height: 32px; margin-right: 10px;" 
                                                   data-option-label="-Currency-"
                                                   data-auto-bind="false"                              
                                                   data-value-primitive="true"
                                                   data-text-field="code"
                                                   data-value-field="id"
                                                   data-bind="value: fineCurrency,
                                                              source: currencyDS"/>

                                                <input data-bind="value: fineDay, attr: {placeholder: lang.lang.day}" type="text" placeholder="Day" style="height: 32px; padding: 5px; margin-right: 10px;" class="span2 k-textbox k-invalid" />

                                                <input data-bind="value: finePrice, attr: {placeholder: lang.lang.price}" type="text" placeholder="Price" style="height: 32px; padding: 5px; margin-right: 10px;" class="span2 k-textbox k-invalid" />

                                                <a class="btn-icon btn-primary glyphicons circle_plus cutype-icon" style="width: 80px; padding: 5px 7px 5px 35px !important; text-align: left;" data-bind="click: addFine"><i></i><span data-bind="text: lang.lang.add">Add</span></a>
                                            </div>
                                            <table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align: center;"><span data-bind="text: lang.lang.name">Name</span></th>
                                                        <th style="text-align: center;"><span data-bind="text: lang.lang.account">Account</span></th>
                                                        <th style="text-align: center;"><span data-bind="text: lang.lang.currency">Currency</span></th>
                                                        <th style="text-align: center;"><span data-bind="text: lang.lang.flat">Flat</span></th>
                                                        <th style="text-align: center;"><span data-bind="text: lang.lang.day">Day</span></th>
                                                        <th style="text-align: center;"><span data-bind="text: lang.lang.price">Price</span></th>
                                                        <th style="text-align: center;"><span data-bind="text: lang.lang.action">Action</span></th>
                                                    </tr>
                                                </thead>
                                                <tbody data-role="listview"     
                                                        data-template="findSetting-template"
                                                        data-auto-bind="false"
                                                        data-edit-template="find-edit-template"
                                                        data-bind="source: planItemDS"></tbody>
                                            </table>
                                        </div>
                                        <div class="tab-pane" id="tab9">
                                            <a class="btn-icon btn-primary glyphicons circle_plus cutype-icon" style="width: 80px; padding: 5px 7px 5px 35px !important; text-align: left;" href="#/plan"><i></i><span data-bind="text: lang.lang.add">Add</span></a>
                                            <table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align: center; vertical-align: top;"><span data-bind="text: lang.lang.name">Name</span></th>
                                                        <th style="text-align: center; vertical-align: top;"><span data-bind="text: lang.lang.code">Code</span></th>
                                                        <th style="text-align: center; vertical-align: top;"><span data-bind="text: lang.lang.currency">Currency</span></th>
                                                        <th style="text-align: center; vertical-align: top;"><span data-bind="text: lang.lang.action">Action</span></th>
                                                    </tr>
                                                </thead>
                                                <tbody data-role="listview"                             
                                                        data-template="planSetting-template"
                                                        data-auto-bind="false"
                                                        data-bind="source: planDS"></tbody>
                                            </table>
                                            <p data-bind="visible: planSelect"><span data-bind="text: lang.lang.plan_name"></span>: <span data-bind="text: planNameShow"></span></p>
                                            <table data-bind="visible: planSelect" class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align: center; vertical-align: top;"><span data-bind="text: lang.lang.name">Name</span></th>
                                                        <th style="text-align: center; vertical-align: top;"><span data-bind="text: lang.lang.type">Type</span></th>
                                                        <th style="text-align: center; vertical-align: top;"><span data-bind="text: lang.lang.amout">Amount</span></th>
                                                    </tr>
                                                </thead>
                                                <tbody data-role="listview"                             
                                                        data-template="plan-item-template"
                                                        data-auto-bind="false"
                                                        data-bind="source: planItemDS"></tbody>
                                            </table>
                                        </div>
                                        <div class="tab-pane" id="tab10">
                                            <table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs">
                                                <thead>
                                                    <tr class="widget-head">
                                                        <th style="text-align: center; vertical-align: top;"><span data-bind="text: lang.lang.name"></span></th>
                                                        <th style="text-align: center; vertical-align: top;"><span data-bind="text: lang.lang.form_type"></span></th>
                                                        <th style="text-align: center; vertical-align: top;"><span data-bind="text: lang.lang.last_edited"></span></th>
                                                        <th style="text-align: center; vertical-align: top;"><span data-bind="text: lang.lang.action"></span></th>
                                                    </tr>
                                                </thead>
                                                <tbody data-role="listview"
                                                         data-selectable="false"
                                                         data-auto-bind="false"
                                                         data-template="customerSetting-form-template"
                                                         data-bind="source: txnTemplateDS">                         
                                                </tbody>
                                            </table>
                                            <a id="addNew" href="#/invoice_custom" class="btn-icon btn-primary glyphicons circle_plus cutype-icon" style="width: 80px; padding: 5px 7px 5px 35px !important; text-align: left;"><i></i><span data-bind="text: lang.lang.add">Add</span></a>
                                        </div>
                                        <div class="tab-pane" id="tab11">
                                            <table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs">
                                                <thead>
                                                    <tr class="widget-head">
                                                        <th style="text-align: center; vertical-align: top;" data-bind="text: lang.lang.type"></th>
                                                        <th style="text-align: center; vertical-align: top;" data-bind="text: lang.lang.abbr"></th>
                                                        <th style="text-align: center; vertical-align: top;" data-bind="text: lang.lang.startup_number"></th>
                                                        <th style="text-align: center; vertical-align: top;" data-bind="text: lang.lang.name"></th>
                                                        <th style="text-align: center; vertical-align: top;"><span data-bind="text: lang.lang.action"></span></th>
                                                    </tr>
                                                </thead>
                                                <tbody data-role="listview"
                                                         data-selectable="false"
                                                         data-template="accountSetting-prefix-template"
                                                         data-bind="source: prefixDS">                          
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="tab-pane" id="tab12">
                                            <div style="clear: both;">
                                                <input data-bind="value: brandCode, attr: {placeholder: lang.lang.code}" type="text" placeholder="Code ..." style="height: 32px; padding: 5px; margin-right: 10px;"  class="span3 k-textbox k-invalid" />
                                                <input data-bind="value: brandName, attr: {placeholder: lang.lang.name}" type="text" placeholder="Name ..." style="height: 32px; padding: 5px; margin-right: 10px;"  class="span3 k-textbox k-invalid" />
                                                <input data-bind="value: brandAbbr, attr: {placeholder: lang.lang.abbr}" type="text" placeholder="Abbr ..." style="height: 32px; padding: 5px; margin-right: 10px;" class="span3 k-textbox k-invalid" />
                                                <a class="btn-icon btn-primary glyphicons circle_plus cutype-icon" style="width: 80px; padding: 5px 7px 5px 35px !important; text-align: left;" data-bind="click: addBrand"><i></i><span data-bind="text: lang.lang.add">Add</span></a>
                                            </div>
                                            <table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align: center; vertical-align: top;"><span data-bind="text: lang.lang.code">Code</span></th>
                                                        <th style="text-align: center; vertical-align: top;"><span data-bind="text: lang.lang.name">Name</span></th>
                                                        <th style="text-align: center; vertical-align: top;"><span data-bind="text: lang.lang.abbr">Abbr</span></th>
                                                        <th style="text-align: center; vertical-align: top;"><span data-bind="text: lang.lang.action">Action</span></th>
                                                    </tr>
                                                </thead>
                                                <tbody data-role="listview"     
                                                    data-template="brandSetting-template"
                                                    data-edit-template="brand-edit-template"
                                                    data-auto-bind="true"
                                                    data-bind="source: brandDS"></tbody>
                                            </table>
                                        </div>
                                        <div class="tab-pane" id="offline">
                                            <h2 data-bind="text: lang.lang.reader"></h2>
                                            <div style="clear: both;">
                                                <div data-role="grid" class="costom-grid"
                                                     data-column-menu="false"
                                                     data-reorderable="true"
                                                     data-scrollable="false"
                                                     data-resizable="true"
                                                     data-editable="true"
                                                     data-toolbar="['create', 'save']"
                                                     data-columns="[
                                                        { 
                                                            field: 'code', title: banhji.setting.lang.lang.code, 
                                                            width: '170px' 
                                                        },
                                                        { 
                                                            field: 'name', title: banhji.setting.lang.lang.name,
                                                            width: '170px' 
                                                        },
                                                        { 
                                                            field: 'abbr', title: banhji.setting.lang.lang.abbr,
                                                            width: '170px'
                                                        },
                                                     ]"
                                                     data-auto-bind="true"
                                                     data-bind="source: readerDS" ></div>
                                            </div>
                                            <hr></hr>
                                            <h2 data-bind="text: lang.lang.tablet"></h2>
                                            <div style="clear: both;">
                                                <div data-role="grid" class="costom-grid"
                                                     data-column-menu="false"
                                                     data-reorderable="true"
                                                     data-scrollable="false"
                                                     data-resizable="true"
                                                     data-editable="true"
                                                     data-toolbar="['create', 'save']"
                                                     data-columns="[
                                                        { 
                                                            field: 'code', title: banhji.setting.lang.lang.code, 
                                                            width: '170px' 
                                                        },
                                                        { 
                                                            field: 'name', title: banhji.setting.lang.lang.name,
                                                            width: '170px' 
                                                        },
                                                        { 
                                                            field: 'abbr', title: banhji.setting.lang.lang.abbr,
                                                            width: '170px'
                                                        },
                                                     ]"
                                                     data-auto-bind="true"
                                                     data-bind="source: tabletDS" ></div>
                                            </div>
                                            <hr></hr>
                                            <h2 data-bind="text: lang.lang.reading_device" style="display: none;"></h2>
                                            <div style="clear: both; display: none;">
                                                <div data-role="grid" class="costom-grid"
                                                     data-column-menu="false"
                                                     data-reorderable="true"
                                                     data-scrollable="false"
                                                     data-resizable="true"
                                                     data-editable="true"
                                                     data-value-primitive="true"
                                                     data-toolbar="['create', 'save']"
                                                     data-columns="[
                                                        { 
                                                            field: 'code', title: banhji.setting.lang.lang.code, 
                                                            width: '170px' 
                                                        },
                                                        { 
                                                            field: 'name', title: banhji.setting.lang.lang.name,
                                                            width: '170px' 
                                                        },
                                                        { 
                                                            field: 'device_id', title: 'Device ID',
                                                            width: '170px'
                                                        },
                                                        { 
                                                            field: 'status',
                                                            editor: deviceStatus,
                                                            template: deviceFormatter,
                                                            title: langVM.lang.status,
                                                            width: '170px'
                                                        },
                                                     ]"
                                                     data-auto-bind="true"
                                                     data-bind="source: readingDeviceDS" ></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="ntf1" data-role="notification"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</script>

<script id="licenseSetting-template" type="text/x-kendo-tmpl">
    <tr>
        <td>#= number #</td>
        <td>#= name #</td>
        <td>#= abbr #</td>
        <td>#= representative #</td>
        <td align="center">#= kendo.toString(new Date(expire_date), "dd-MM-yyyy") #</td>
        <td align="right">#= max_customer #</td>
        <td style="text-align: center;">
            #if(status==1){#
                <span class="btn-action glyphicons ok_2 btn-success" title="Active"><i></i></span>
            #}else if(status==2){#
                <span class="btn-action glyphicons lock btn-danger" title="Void"><i></i></span>
            #}else{#
                <span class="btn-action glyphicons unlock btn-danger" title="Inactive"><i></i></span>
            #}#
            <a class="btn-action glyphicons pencil btn-success" title="Edit" href="\#/add_license/#= id #"><i></i></a>
        </td>
    </tr>
</script>
<script id="custType-template" type="text/x-kendo-tmpl">
    <tr>
        <td>
            #= name#
        </td>
        <td align="center">
            #= abbr#
        </td>
        <td align="center">
            #if(is_company=="1"){#
                Yes
            #}else{#
                No
            #}#
        </td>
        <td align="center">                
            <a class="btn-action glyphicons pencil btn-success k-edit-button" href="\\#"><i></i></a>
        </td>           
    </tr>
</script>
<script id="customerSetting-contact-type-template" type="text/x-kendo-tmpl">
    <tr>
        <td>
            #:name#
        </td>
        <td align="center">
            #:abbr#
        </td>
        <td align="center">
            #if(is_company=="1"){#
                Yes
            #}else{#
                No
            #}#
        </td>
        <td align="center">             
            <div class="edit-buttons">       
                <a class="k-button k-edit-button" href="\\#"><span class="k-icon k-i-edit"></span></a>
                #if(is_system=="0"){#
                    <a class="k-button k-delete-button" href="\\#"><span class="k-icon k-i-delete"></span></a>                      
                #}#
                <a class="k-button" href="\#/customer/0/#=id#"><span data-bind="text: lang.lang.pattern"></span></a>
            </div>          
        </td>           
    </tr>
</script>
<script id="customerSetting-edit-contact-type-template" type="text/x-kendo-tmpl">
    <div class="product-view k-widget">
        <dl>                
            <dd>
                <input type="text" class="k-textbox" data-bind="value:name" name="ProductName" required="required" validationMessage="required" />
                <span data-for="ProductName" class="k-invalid-msg"></span>
            </dd>               
        </dl>
        <dl>                
            <dd>
                <input type="text" class="k-textbox" data-bind="value:abbr" name="abbr" required="required" validationMessage="required" />
                <span data-for="abbr" class="k-invalid-msg"></span>
            </dd>               
        </dl>
        <dl>                
            <dd>
                <select data-bind="value: is_company" >
                    <option value="0"><span data-bind="text: lang.lang.not_a_company"></span></option>
                    <option value="1"><span data-bind="text: lang.lang.it_is_a_company"></span></option>                            
                </select>
            </dd>              
        </dl>
        <div class="edit-buttons">
            <a class="k-button k-update-button" href="\\#"><span class="k-icon k-i-check"></span></a>
            <a class="k-button k-cancel-button" href="\\#"><span class="k-icon k-i-cancel"></span></a>
        </div>
    </div>
</script>
<script id="blocSetting-template" type="text/x-kendo-tmpl">
    <tr>
        <td>
            #= branch.name#
        </td>
        <td>
            #= name#
        </td>
        <td align="center">
            #= abbr#
        </td>
        <td align="center">                
            <span style="cursor: pointer;" class="k-edit-button"><i class="icon-edit"></i> <span data-bind="text: lang.lang.edit">Edit</span></span>
            |
            <span style="cursor: pointer;" data-bind="click: viewPole"><i class="icon-view"></i> <span data-bind="text: lang.lang.view_item">View Item</span></span>
            |
            <span style="cursor: pointer;" data-bind="click: showPole"><i class="icon-plus icon-white"></i> <span data-bind="text: lang.lang.add_sub_location">Add Sub Location</span></span>
        </td>           
    </tr>
</script>
<script id="bloc-edit-template" type="text/x-kendo-tmpl">
    <tr>
        <td>
            <input data-role="dropdownlist"
                   data-option-label="(--- Select ---)"       
                   data-value-primitive="true"
                   data-text-field="name"
                   data-value-field="id"
                   data-bind="value: branch.id,
                              source: licenseDS" />
        </td>
            <td align="center">
    
            <input type="text" class="k-textbox" data-bind="value:name" name="ProductName" required="required" validationMessage="required" />
        </td>
            <td align="center">
            <input type="text" class="k-textbox" data-bind="value:abbr" name="abbr" required="required" validationMessage="required" />
            <span data-for="abbr" class="k-invalid-msg"></span>
        </td>
        <td align="center">
    
            <div class="edit-buttons">
                <a class="k-button k-update-button" href="\\#"><span class="k-icon k-i-check"></span></a>
                <a class="k-button k-cancel-button" href="\\#"><span class="k-icon k-i-cancel"></span></a>
            </div>
        </td>
    </tr>
</script>
<script id="pole-template" type="text/x-kendo-tmpl">
    <tr>
        <td>
            #= name#
        </td>
        <td align="center">                
            <span style="cursor: pointer;" class="k-edit-button"><i class="icon-edit"></i> <span data-bind="text: lang.lang.edit">Edit</span></span>
            |
            <span style="cursor: pointer;" data-bind="click: viewBox"><i class="icon-view"></i> <span data-bind="text: lang.lang.view_item">View Item</span></span>
            |
            <span style="cursor: pointer;" data-bind="click: showBox"><i class="icon-plus icon-white"></i> <span data-bind="text: lang.lang.add_box">Add Box</span></span>
        </td>           
    </tr>
</script>
<script id="pole-edit-template" type="text/x-kendo-tmpl">
    <tr>
        <td>
            <input type="text" class="k-textbox" data-bind="value:name" name="ProductName" required="required" validationMessage="required" />
        </td>
        <td align="center">
    
            <div class="edit-buttons">
                <a class="k-button k-update-button" href="\\#"><span class="k-icon k-i-check"></span></a>
                <a class="k-button k-cancel-button" href="\\#"><span class="k-icon k-i-cancel"></span></a>
            </div>
        </td>
    </tr>
</script>
<script id="box-template" type="text/x-kendo-tmpl">
    <tr>
        <td>
            #= name#
        </td>
        <td align="center">                
            <span style="cursor: pointer;" class="k-edit-button"><i class="icon-edit"></i> <span data-bind="text: lang.lang.edit">Edit</span></span>
        </td>           
    </tr>
</script>
<script id="box-edit-template" type="text/x-kendo-tmpl">
    <tr>
        <td>
            <input type="text" class="k-textbox" data-bind="value:name" name="ProductName" required="required" validationMessage="required" />
        </td>
        <td align="center">
    
            <div class="edit-buttons">
                <a class="k-button k-update-button" href="\\#"><span class="k-icon k-i-check"></span></a>
                <a class="k-button k-cancel-button" href="\\#"><span class="k-icon k-i-cancel"></span></a>
            </div>
        </td>
    </tr>
</script>
<script id="exemptionSetting-template" type="text/x-kendo-tmpl">
    <tr>
        <td>
            #= name#
        </td>
        <td>
            #= account.name#
        </td>
        <td align="center">
            #if(unit == "money"){#
                #: langVM.lang.money#
            #}else if(unit == "usage"){#
                #: langVM.lang.usage#
            #}else{#
                #= unit#
            #}#
        </td>
        <td align="center">
            #= _currency.code#
        </td>
        <td align="right" >
        #if(unit == "money"){#
            #= kendo.toString(amount, _currency.locale=="km-KH"?"c0":"c", _currency.locale)#
        #}else if(unit == "usage"){#
            #= amount#
        #}else{#
            #= amount#%
        #}#
        </td>
        <td align="center">                
            <a class="btn-action glyphicons pencil btn-success k-edit-button"><i></i></a>
        </td>           
    </tr>
</script>
<script id="exemption-edit-template" type="text/x-kendo-tmpl">
    <tr>                       
        <td>
            <input style="width: 100%;" type="text" class="k-textbox" data-bind="value:name" />
        </td>    
        <td>            
            <input style="width: 100%;" data-role="dropdownlist"      
                   data-value-primitive="false"
                   data-text-field="name"
                   data-value-field="id"
                   data-bind="value: account,
                              source: exAccountDS" />
        </td> 
        <td>            
            <input style="width: 100%;" data-role="dropdownlist"      
                   data-value-primitive="false"
                   data-text-field="name"
                   data-auto-bind="true"
                   data-value-field="id"
                   data-bind="value: unit,
                              source: typeUnit" />
        </td>    
        <td>
            <input data-role="dropdownlist"
                   style="padding-right: 1px;height: 32px;" 
                   data-auto-bind="true"                               
                   data-value-primitive="true"
                   data-text-field="code"
                   data-value-field="id"
                   data-bind="value: currency,
                              source: currencyDS"/>
        </td>  
        <td>
            <input style="width: 100%;" type="text" class="k-textbox" data-bind="value:amount" />
        </td>
        <td class="edit-buttons" style="text-align: center;">
            <a class="k-button k-update-button" href="\\#"><span class="k-icon k-i-check"></span></a>
            <a class="k-button k-cancel-button" href="\\#"><span class="k-icon k-i-cancel"></span></a>
        </td>
    </tr>
</script>
<script id="tariffSetting-template" type="text/x-kendo-tmpl">
    <tr>
        <td>
            #= name#
        </td>
        <td>
            # if(is_flat == 0){# #: banhji.setting.lang.lang.not_flat# #}else{# #: banhji.setting.lang.lang.flat# #}#
        </td>
        <td>
            #= account.name#
        </td>
        <td align="center">
            #= _currency.code#
        </td>
        <td style="text-align: center;">   
            <span style="cursor: pointer;" class="k-edit-button"><i class="icon-edit"></i> <span data-bind="text: lang.lang.edit">Edit</span></span>
            |
            <span style="cursor: pointer;" data-bind="click: viewTariffItem"><i class="icon-view"></i> <span data-bind="text: lang.lang.view_tariff">View Tariff</span></span>
            |
            <span style="cursor: pointer;" data-bind="click: showTariffItem"><i class="icon-plus icon-white"></i> <span data-bind="text: lang.lang.add_tariff">Add Tariff</span></span>
        </td>           
    </tr>
</script>
<script id="tariff-edit-template" type="text/x-kendo-tmpl">
    <tr>                       
        <td>
            <input type="text" class="k-textbox" data-bind="value:name" />
        </td>
        <td align="center">
            <input data-role="dropdownlist"
               style="padding-right: 1px;height: 32px;" 
               data-auto-bind="false"                              
               data-value-primitive="true"
               data-text-field="name"
               data-value-field="id"
               data-bind="value: is_flat,
               source: tariffFlatType"/>
        </td> 
        <td>            
            <input data-role="dropdownlist"
                   data-value-primitive="true"
                   data-text-field="name"
                   data-auto-bind="true"
                   data-value-field="id"
                   data-bind="value: account_id,
                   source: tariffAccDS" />
        </td>
        <td>
            <input data-role="dropdownlist"
                   style="padding-right: 1px; height: 32px;" 
                   data-auto-bind="true"                               
                   data-value-primitive="false"
                   data-text-field="code"
                   data-value-field="id"
                   data-bind="value: currency,
                   source: currencyDS"/>
        </td>  
        <td class="edit-buttons" style="text-align: center;">
            <a class="k-button k-update-button" href="\\#"><span class="k-icon k-i-check"></span></a>
            <a class="k-button k-cancel-button" href="\\#"><span class="k-icon k-i-cancel"></span></a>
        </td>
    </tr>
</script>

<script id="tariff-item-template" type="text/x-kendo-tmpl">
    <tr>
        <td>#= name#</td>
        <td align="center">#= usage#</td>
        <td align="right">#= kendo.toString(amount, _currency.locale=="km-KH"?"c0":"n3", _currency.locale)#</td>
        <td align="center">
            <span class="k-edit-button"><i class="icon-edit"></i> Edit</span>
        </td>
    </tr>
</script>
<script id="tariff-edit-item-template" type="text/x-kendo-tmpl">
    <tr>
        <td><input style="width: 100%;" type="text" class="k-textbox" data-bind="value:name" /></td>
        <td>
            #if(usage != 0){#
                <input style="width: 100%;" type="text" class="k-textbox" data-bind="value:usage" />
            #}else{# #:usage# #}#
        </td>
        <td><input style="width: 100%;" type="text"  data-format class="k-textbox" data-bind="value:amount" /></td>
        <td class="edit-buttons" style="text-align: center;">
            <a class="k-button k-update-button" href="\\#"><span class="k-icon k-i-check"></span></a>
            <a class="k-button k-cancel-button" href="\\#"><span class="k-icon k-i-cancel"></span></a>
        </td>
    </tr>
</script>
<script id="depositSetting-template" type="text/x-kendo-tmpl">
    <tr>
        <td>
            #= name#
        </td>
        <td align="left">
            #= account.name#
        </td>
        <td align="center">
            #= _currency.code #
        </td>
        <td align="right">
            #= kendo.toString(amount, _currency.locale=="km-KH"?"c0":"c", _currency.locale)#
        </td>
        <td align="center">                
            <a class="btn-action glyphicons pencil btn-success k-edit-button"><i></i></a>
        </td>           
    </tr>
</script>
<script id="deposit-edit-template" type="text/x-kendo-tmpl">
    <tr>                       
        <td>
            <input style="width: 100%;" type="text" class="k-textbox" data-bind="value:name" />
        </td>  
        <td>
            <input style="width: 100%;" data-role="dropdownlist"      
                   data-value-primitive="false"
                   data-text-field="name"
                   data-auto-bind="true"
                   data-value-field="id"
                   data-bind="value: account_id,
                              source: depositAccDS" />
        </td>    
        <td>
            <input data-role="dropdownlist"
                   style="padding-right: 1px;height: 32px;" 
                   data-auto-bind="true"                               
                   data-value-primitive="true"
                   data-text-field="code"
                   data-value-field="id"
                   data-bind="value: currency,
                              source: currencyDS"/>
        </td>    
        <td>
            <input style="width: 100%;" type="text" class="k-textbox" data-bind="value:amount" />
        </td>

        <td class="edit-buttons" style="text-align: center;">
            <a class="k-button k-update-button" href="\\#"><span class="k-icon k-i-check"></span></a>
            <a class="k-button k-cancel-button" href="\\#"><span class="k-icon k-i-cancel"></span></a>
        </td>
    </tr>
</script>
<script id="serviceSetting-template" type="text/x-kendo-tmpl">
    <tr>
        <td>
            #= name#
        </td>
        <td align="left">
            #= assembly.name#
        </td>
        <td align="center">
            #= _currency.code #
        </td>
        <td align="right">
            #= kendo.toString(amount, _currency.locale=="km-KH"?"c0":"c", _currency.locale)#
        </td>
        <td align="center">
            <a href="\\#/item_assembly/#:assembly.id#" class="btn-action glyphicons pencil btn-success"><i></i></a>
        </td>
    </tr>
</script>
<script id="service-edit-template" type="text/x-kendo-tmpl">
    <tr>                       
        <td>
            <input style="width: 100%;" type="text" class="k-textbox" data-bind="value:name" />
        </td>  
        <td>
            <input style="width: 100%;" data-role="dropdownlist"      
                   data-value-primitive="false"
                   data-text-field="name"
                   data-value-field="id"
                   data-bind="value: assembly_id,
                              source: serviceAssDS" />
        </td>   
        <td>
            <input data-role="dropdownlist"
                   style="padding-right: 1px;height: 32px;" 
                   data-auto-bind="true"                               
                   data-value-primitive="true"
                   data-text-field="code"
                   data-value-field="id"
                   data-bind="value: currency,
                              enabled: banhji.setting.sFalse,
                              source: currencyDS"/>
        </td>      
        <td>
            <input style="width: 100%;" type="text" class="k-textbox" data-bind="value:amount, enabled: banhji.setting.sFalse," />
        </td>

        <td class="edit-buttons" style="text-align: center;">
            <a class="k-button k-update-button" href="\\#"><span class="k-icon k-i-check"></span></a>
            <a class="k-button k-cancel-button" href="\\#"><span class="k-icon k-i-cancel"></span></a>
        </td>
    </tr>
</script>
<script id="maintenanceSetting-template" type="text/x-kendo-tmpl">
    <tr>
        <td>
            #= name#
        </td>
        <td>
            #= account.name#
        </td>
        <td align="center">
            #= _currency.code #
        </td>
        <td align="right">
            #= kendo.toString(amount, _currency.locale=="km-KH"?"c0":"c", _currency.locale)#
        </td>
        <td align="center">
            <a class="btn-action glyphicons pencil btn-success k-edit-button"><i></i>
            </a>
        </td>
    </tr>
</script>
<script id="maintenance-edit-template" type="text/x-kendo-tmpl">
    <tr>                       
        <td>
            <input style="width: 100%;" type="text" class="k-textbox" data-bind="value:name" />
        </td>       
        <td>
            <input style="width: 100%;" data-role="dropdownlist"      
                   data-value-primitive="false"
                   data-text-field="name"
                   data-auto-bind="true"
                   data-value-field="id"
                   data-bind="value: account,
                              source: tariffAccDS" />
        </td>  
        <td>
            <input data-role="dropdownlist"
                   style="padding-right: 1px;height: 32px;" 
                   data-auto-bind="true"                               
                   data-value-primitive="true"
                   data-text-field="code"
                   data-value-field="id"
                   data-bind="value: currency,
                              source: currencyDS"/>
        </td>  
        <td>
            <input style="width: 100%;" type="text" class="k-textbox" data-bind="value:amount" />
        </td>

        <td class="edit-buttons" style="text-align: center;">
            <a class="k-button k-update-button" href="\\#"><span class="k-icon k-i-check"></span></a>
            <a class="k-button k-cancel-button" href="\\#"><span class="k-icon k-i-cancel"></span></a>
        </td>
    </tr>
</script>
<script id="findSetting-template" type="text/x-kendo-tmpl">
    <tr>
        <td>
            #= name#
        </td>
        <td>
            #= account.name#
        </td>
        <td align="center">
            #= _currency.code #
        </td>
        <td>
            # if(is_flat == 0){# #: banhji.setting.lang.lang.not_flat# #}else{# #: banhji.setting.lang.lang.flat# #}#
        </td>
        <td align="right">
            #= usage#
        </td>
        <td align="right">
            #= kendo.toString(amount, _currency.locale=="km-KH"?"c0":"c", _currency.locale)#
        </td>
        <td align="center">
            <a class="btn-action glyphicons pencil btn-success k-edit-button"><i></i>
            </a>
        </td>
    </tr>
</script>
<script id="find-edit-template" type="text/x-kendo-tmpl">
    <tr>                       
        <td>
            <input style="width: 100%;" type="text" class="k-textbox" data-bind="value:name" />
        </td>       
        <td>
            <input style="width: 100%;" data-role="dropdownlist"      
                   data-value-primitive="false"
                   data-text-field="name"
                   data-auto-bind="true"
                   data-value-field="id"
                   data-bind="value: account,
                              source: tariffAccDS" />
        </td>  
        <td>
            <input data-role="dropdownlist"
                   style="padding-right: 1px;height: 32px;" 
                   data-auto-bind="true"                               
                   data-value-primitive="true"
                   data-text-field="code"
                   data-value-field="id"
                   data-bind="value: currency,
                              source: currencyDS"/>
        </td>  
        <td align="center">
            <input data-role="dropdownlist"
               style="padding-right: 1px;height: 32px;" 
               data-auto-bind="false"                              
               data-value-primitive="true"
               data-text-field="name"
               data-value-field="id"
               data-bind="value: is_flat,
                          source: tariffFlatType"/>
        </td> 
        <td>
            <input style="width: 100%;" type="text" class="k-textbox" data-bind="value:usage" />
        </td>
        <td>
            <input style="width: 100%;" type="text" class="k-textbox" data-bind="value:amount" />
        </td>

        <td class="edit-buttons" style="text-align: center;">
            <a class="k-button k-update-button" href="\\#"><span class="k-icon k-i-check"></span></a>
            <a class="k-button k-cancel-button" href="\\#"><span class="k-icon k-i-cancel"></span></a>
        </td>
    </tr>
</script>
<script id="plan-item-template" type="text/x-kendo-tmpl">
    <tr>
        <td>#= name#</td>
        <td>
            #= type#
        </td>
        <td align="right">#= kendo.toString(amount, _currency.locale=="km-KH"?"c0":"c", _currency.locale)#</td>
    </tr>
</script>
<script id="accountSetting-prefix-template" type="text/x-kendo-template">
    <tr>
        <td > #=type#  </td>
        <td style="text-align: center; "> 
            #= abbr# 
        </td>
        <td > 
            #= startup_number#
        </td>
        <td style="text-align: center;">
            <a href="\\#/add_accountingprefix/#= id # ">#= name# </a>
        </td>
        <td style="text-align: center;">
            <a class="btn-action glyphicons pencil btn-success" href="\\#/add_accountingprefix/#= id # "><i></i></a>
        </td>
    </tr>
</script>
<script id="addAccountingprefix" type="text/x-kendo-template">
    <div class="container">
        <div class="row-fluid">
            <div id="waterreport" class="background">
                <div class="row-fluid">
                    <div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
                        <i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
                    </div>
                    <div id="example" class="k-content">
                        <h2 data-bind="text: lang.lang.transaction_prefix">Transaction Prefix</h2>
                        <div class="hidden-print pull-right" style="margin-bottom: 15px;">
                            <span class="glyphicons no-js remove_2" 
                                data-bind="click: cancel"><i></i></span>
                        </div>
                        <div class="clear"></div>

                        <div class="row-fluid">

                            <div class="col-xs-12 col-sm-6">
                                <p style="margin-bottom: 0">At the begining of every fiscal year, all the reference numbers will start at 1. 
                                    If you donot start using BanhJi at the beginning of your fiscal year, 
                                    please use Starting Number to determine you next number for each transaction reference. 
                                    This is important for your transaction reference number.</p>
                            </div>

                            <div class="col-xs-12 col-sm-6">
                                <table class="table table-bordered table-condensed table-striped table-primary table-vertical-center">  
                                    <thead>
                                        <tr>
                                            <th style="vertical-align: top;" data-bind="text: lang.lang.name">Name</th>
                                            <th style="vertical-align: top;" data-bind="text: lang.lang.abbr">Abbr</th>
                                            <th style="vertical-align: top;" data-bind="text: lang.lang.starting_no">Starting Number</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><span data-bind="text: obj.type"></span></td>
                                            <td>
                                                <input type="text" placeholder="Abbr" class="k-textbox k-invalid span4" data-bind="value: obj.abbr" style="width: 100px;" >
                                            </td>
                                            <td>
                                                <input type="text" placeholder="Starting Number" class="k-textbox k-invalid span2" data-bind="value: obj.startup_number" style="width: 100px;" >
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="box-generic bg-action-button">
                            <div id="ntf1" data-role="notification"></div>
                            <div class="row">
                                <div class="span12" align="right">
                                    <span id="saveClose" class="btn-btn" >Save Close</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>                          
            </div>
        </div>
    </div>
</script>
<script id="customerSetting-form-template" type="text/x-kendo-template">
    <tr>
        <td ><a style="text-align: left;" href="\\#/invoice_custom/#= id # "> #=name#  </a></td>
        <td style="text-align: left; padding-left: 10px!important;"> 
            #= type.replace("_"," ")# 
        </td>
        <td style="text-align: left; padding-left: 10px!important;"> #if( updated_at ){ # 
                #=kendo.toString(new Date(updated_at),"D")# 
             #}else{ #
                #=kendo.toString(new Date(created_at),"D")# 
             #}#
        </td>
        <td class="center">
            #if( status == 0){ #
            <a style="cursor: pointer;" class="btn-action glyphicons pencil btn-success" href="\\#/invoice_custom/#= id # "><i></i></a>
            <a style="cursor: pointer;" data-bind="click: deleteForm" class="btn-action glyphicons remove_2 btn-danger"><i></i></a>
            # } #
        </td>
    </tr>
</script>
<script id="brandSetting-template" type="text/x-kendo-tmpl">
    <tr>
        <td>
            #= code#
        </td>
        <td align="left">
            #= name#
        </td>
        <td align="center">
            #= abbr#
        </td>
        <td align="center">
            <a class="btn-action glyphicons pencil btn-success k-edit-button" href="\\#"><i></i></a>
        </td>
    </tr>
</script>
<script id="brand-edit-template" type="text/x-kendo-tmpl">
    <tr>
        <td>
            <input type="text" class="k-textbox" data-bind="value:code" name="ProductName" required="required" validationMessage="required" />
        </td>
            <td align="center">
    
            <input type="text" class="k-textbox" data-bind="value:name" name="ProductName" required="required" validationMessage="required" />
        </td>
            <td align="center">
            <input type="text" class="k-textbox" data-bind="value:abbr" name="abbr" required="required" validationMessage="required" />
            <span data-for="abbr" class="k-invalid-msg"></span>
        </td>
            <td align="center">
    
            <div class="edit-buttons">
                <a class="k-button k-update-button" href="\\#"><span class="k-icon k-i-check"></span></a>
                <a class="k-button k-cancel-button" href="\\#"><span class="k-icon k-i-cancel"></span></a>
            </div>
        </td>
    </tr>
</script>

<script id="customerSetting-edit-contact-type-template" type="text/x-kendo-tmpl">
    <tr>
        <td>
            <input style="width: 100%" type="text" class="k-textbox" data-bind="value:name" name="ProductName" required="required" validationMessage="required" />
            <span data-for="ProductName" class="k-invalid-msg"></span>
        </td>               
                   
        <td>
            <input  style="width: 100%" type="text" class="k-textbox" data-bind="value:abbr" name="abbr" required="required" validationMessage="required" />
            <span data-for="abbr" class="k-invalid-msg"></span>
        </td>               
                   
        <td>
            <select  style="width: 100%; " data-bind="value: is_company" >
                <option value="0">#: banhji.setting.lang.lang.not_a_company#</option>
                <option value="1">#: banhji.setting.lang.lang.it_is_a_company#</option>    
            </select>
        </td>              
 
        <td class="edit-buttons" style="text-align: center;">
            <a class="k-button k-update-button" href="\\#"><span class="k-icon k-i-check"></span></a>
            <a class="k-button k-cancel-button" href="\\#"><span class="k-icon k-i-cancel"></span></a>
        </td>
    </tr>  
</script>
<script id="planSetting-template" type="text/x-kendo-tmpl">
    <tr>
        <td>#= name #</td>
        <td style="text-align: center;">#= code #</td>
        <td style="text-align: center;">#= _currency.code #</td>
        <td style="text-align: center;">
            <a href="\#/plan/#: id#"><i class="icon-edit"></i><span data-bind="text: lang.lang.edit"> Edit</span></a>
            |
            <span style="cursor: pointer;" data-bind="click: viewPlanItem"><i class="icon-view"></i> <span data-bind="text: lang.lang.view_item">View Item</span></span>
        </td>
    </tr>
</script>

<script id="plan" type="text/x-kendo-template">
    <div class="container">
        <div class="row-fluid">
            <div class="background">
                <div class="row-fluid">
                    <div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
                        <i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
                    </div>
                    <div id="example" class="k-content">
                        <h2 data-bind="text: lang.lang.add_plan"></h2>
                        <div class="hidden-print pull-right">
                            <span class="glyphicons no-js remove_2" 
                                data-bind="click: cancel"><i></i></span>
                        </div>
                        <div class="clear"></div>
                        <div class="row-fluid">
                            <div id="plan" class="box-generic well" style="margin-bottom: 0;">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-1">
                                        <span data-bind="text: lang.lang.name">Name</span>
                                    </div>
                                    <div class="col-xs-12 col-sm-3">
                                        <input
                                            class="k-textbox k-invalid"
                                            data-required-msg="required" 
                                            style="width: 100%;" 
                                            placeholder="Name ..." 
                                            aria-invalid="true"
                                            data-bind="value: current.name, attr: {placeholder: lang.lang.name}" />
                                    </div>
                                    <div class="col-xs-12 col-sm-1">
                                        <span data-bind="text: lang.lang.code">Code</span>
                                    </div>
                                    <div class="col-xs-12 col-sm-3">
                                        <input 
                                            class="k-textbox k-invalid" 
                                            data-required-msg="required" 
                                            style="width: 100%;" 
                                            placeholder="Code ..." 
                                            aria-invalid="true"
                                            data-bind="value: current.code, attr: {placeholder: lang.lang.code}" />
                                    </div>
                                    <div class="col-xs-12 col-sm-1">
                                        <span data-bind="visible: currencyEnable"><span data-bind="text: lang.lang.currency">Currency</span></span>
                                    </div>
                                    <div class="col-xs-12 col-sm-3">
                                        <input data-role="dropdownlist"
                                           style="width: 100%; height: 32px;" 
                                           data-option-label="(--- Currency ---)"
                                           data-auto-bind="false"
                                           data-value-primitive="true"
                                           data-text-field="code"
                                           data-value-field="id"
                                           data-bind="value: current.currency,
                                                    source: currencyDS,
                                                    enabled: currencyEnable,
                                                    events: {change: currencyChange}"/>
                                    </div>
                                </div>      
                            </div>
                        </div>

                        <table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs" style="margin-top: 15px;">
                            <thead>
                                <tr>
                                    <th style="vertical-align: top;" ><span data-bind="text: lang.lang.item">Item</span></th>
                                    <th style="vertical-align: top;" ><span data-bind="text: lang.lang.type">Type</span></th>
                                    <th style="vertical-align: top;" ><span data-bind="text: lang.lang.name">Name</span></th>
                                    <th style="vertical-align: top;" ><span data-bind="text: lang.lang.rate">Rate</span></th>
                                    <th style="vertical-align: top;" ><span data-bind="text: lang.lang.action">Action</span></th>
                                </tr>
                            </thead>
                            <tbody 
                                data-bind="source: current.items" 
                                data-auto-bind="true" 
                                data-role="listview" 
                                data-template="planItem-list-item">
                            </tbody>
                        </table>

                         <!-- Bottom part -->
                        <div class="row" style="margin-bottom: 15px;">
                            <!-- Column -->
                            <div class="col-sm-4">
                                <button style="float: left" class="btn btn-inverse" data-bind="click: addItem">
                                    <i class="icon-plus icon-white"></i>
                                </button>
                            </div>
                            <!-- Column END -->
                        </div>

                        <!-- Form actions -->
                        <div class="box-generic bg-action-button">
                            <div id="ntf1" data-role="notification"></div>
                            <div class="row">
                                <div class="span3">
                                </div>
                                <div class="col-sm-9" align="right">
                                    <span id="cancel" data-bind="click: cancel" class="btn-btn">
                                        <span data-bind="text: lang.lang.cancel">Cancel</span>
                                    </span>
                                    <span id="saveNew" class="btn-btn" data-bind="invisible: isEdit, click: save">
                                        <span data-bind="text: lang.lang.save">Save</span>
                                    </span>                                 
                                </div>
                            </div>
                        </div>
                        <!-- // Form actions END -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</script>
<script id="planItem-list-item" type="text/x-kendo-tmpl">
    <tr>
        <td>
            <input id="ccbItem" name="ccbItem-#:uid#"
               data-role="combobox"
               data-template="item-list-tmpl"
               data-text-field="name"
               data-auto-bind="true"
               data-value-field="id"
               data-bind="value: item, 
                          source: itemDS,
                          events:{ change: onChange }"
               placeholder="Select ..." 
               required data-required-msg="required" style="width: 100%" /> 
        </td>
        <td><span data-bind="text: type"></span></td>
        <td><span data-bind="text: name"></span></td>
        <td><input type="text" style="text-align:right;" class="k-textbox" data-bind="value: amount" /></td>
        <td align="center">
            <a class="btn-action glyphicons remove_2 btn-danger k-delete-button"><i></i></a>
        </td>
    </tr>
</script>
<script id="item-list-tmpl" type="text/x-kendo-tmpl">
    <span style="width:55%; float: left">
        #=name#
    </span>
    <span style="width:15%; text-align: right; float: right; padding-right: 15px; text-transform: capitalize;">#=type#</span>
</script>
<script id="item-list-tmpl-purchase" type="text/x-kendo-tmpl">
    <div class="pull-left">
        #=abbr##=number# #=name#
        &nbsp;&nbsp;
        #if(variant.length>0){#
            [
            #for(var i=0; i < variant.length; i++){#
                #=variant[i].name#,
            #}#
            ]
        #}#
    </div>
    <div class="pull-right">
        #=category#
    </div>
</script>
<script id="item-list-tmpl-1" type="text/x-kendo-tmpl">
    <div class="pull-left">
        #= code#
    </div>
</script>

<script id="addLicense" type="text/x-kendo-template">
    <div class="container">
        <div class="row-fluid">
            <div class="background">
                <div class="row-fluid">
                    <div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
                        <i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
                    </div>
                    <div id="example" class="k-content">
                        <h2 data-bind="text: lang.lang.add_license">Add License</h2>
                        <div class="hidden-print pull-right">
                            <span class="glyphicons no-js remove_2" 
                                data-bind="click: cancel"><i></i></span>
                        </div>

                        <div class="clear"></div>
                    
                        <div class="row">
                            <div class="col-xs-12 col-sm-3">
                                <!-- Group -->
                                <div class="control-group">
                                    <label><span data-bind="text: lang.lang.type">Type</span> <span style="color:red">*</span></label>
                                    <br>
                                    <select data-role="dropdownlist"
                                       data-value-primitive="true"
                                       data-text-field="name"
                                       data-value-field="id"
                                       data-bind="
                                        source: selectMeterType,
                                        value: obj.type"
                                       style="width: 100%; margin-bottom: 15px;" ></select>
                                </div>
                                <!-- // Group END -->                                           
                            </div>
                        </div>
                        <!-- Top Part -->
                        <div class="row-fluid">
                            <div class="col-xs-12 col-sm-12 well">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-3">
                                        <!-- Group -->
                                        <div class="control-group">
                                            <label ><span data-bind="text: lang.lang.license_no">License No.</span> <span style="color:red">*</span></label>
                                            <input 
                                                class="k-textbox" 
                                                data-bind="value: obj.number, attr: {placeholder: lang.lang.license_no}"
                                                placeholder="License No." 
                                                required data-required-msg="required"
                                                style="width: 100%;" />
                                        </div>
                                        <!-- // Group END -->
                                    </div>

                                    <div class="col-xs-12 col-sm-3" >   
                                        <!-- Group -->
                                        <div class="control-group">
                                            <label ><span data-bind="text: lang.lang.license_name">License Name</span></label>                                      
                                            <br>
                                            <input
                                                class="k-textbox" 
                                                data-bind="value: obj.name, attr: {placeholder: lang.lang.name}" 
                                                placeholder="Name" 
                                                style="width: 100%;" />
                                        </div>
                                        <!-- // Group END -->
                                    </div>

                                    <div class="col-xs-12 col-sm-3">
                                        <!-- Group -->
                                        <div class="control-group">
                                            <label ><span data-bind="text: lang.lang.abbr">Abbr</span></label>
                                            <input 
                                                class="k-textbox" 
                                                placeholder="Abbr" 
                                                data-bind="value: obj.abbr, attr: {placeholder: lang.lang.abbr}" 
                                                style="width: 100%;" />
                                        </div>
                                        <!-- // Group END -->
                                    </div>

                                    <div class="col-xs-12 col-sm-3">
                                        <div class="control-group">
                                            <label ><span data-bind="text: lang.lang.representative">Representative</span></label>
                                            <input 
                                                class="k-textbox" 
                                                placeholder="Representative" 
                                                data-bind="value: obj.representative, attr: {placeholder: lang.lang.representative}" 
                                                style="width: 100%;" />
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-3">
                                        <div class="control-group">
                                            <label ><span data-bind="text: lang.lang.segment">Segment</span></label>
                                            <select data-role="dropdownlist"
                                               data-value-primitive="true"
                                               data-text-field="name"
                                               data-value-field="id"
                                               data-bind="
                                                source: segmentItemDS,
                                                value: obj.segment_item_id"
                                               style="width: 100%; margin-bottom: 15px;" ></select>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    
                                    <div class="col-xs-12 col-sm-3">
                                        <!-- Group -->
                                        <div class="control-group">
                                            <label ><span data-bind="text: lang.lang.currency">Currency</span></label>
                                            <select data-role="dropdownlist"
                                               data-value-primitive="true"
                                               data-text-field="name"
                                               data-value-field="id"
                                               data-bind="
                                                source: selectCurrency,
                                                value: obj.currency"
                                               style="width: 100%; margin-bottom: 15px;" ></select>
                                        </div>
                                        <!-- // Group END -->
                                    </div>

                                    <div class="col-xs-12 col-sm-3">
                                        <!-- Group -->
                                        <div class="control-group">
                                            <label ><span data-bind="text: lang.lang.status">Status</span> </label>
                                            <select data-role="dropdownlist"
                                               data-value-primitive="true"
                                               data-text-field="name"
                                               data-value-field="id"
                                               data-bind="
                                                source: selectType,
                                                value: obj.status"
                                               style="width: 100%;" ></select>
                                        </div>
                                        <!-- // Group END -->
                                    </div>

                                    <div class="col-xs-12 col-sm-3">
                                        <!-- Group -->
                                        <div class="control-group">
                                            <label ><span data-bind="text: lang.lang.expire_date">Expire Date</span></label>
                                            <input type="text" 
                                                style="width: 100%;" 
                                                data-role="datepicker"
                                                data-format="dd-MM-yyyy"
                                                placeholder="dd-mm-yyyy" 
                                                data-bind="value: obj.expire_date,
                                                            min: toDay" />
                                        </div>
                                        <!-- // Group END -->
                                    </div>

                                    <div class="col-xs-12 col-sm-3">
                                        <div class="control-group">
                                            <label ><span data-bind="text: lang.lang.maximum_household">Maximum Household</span> <span style="color:red">*</span></label>
                                            <input 
                                                class="k-textbox" 
                                                placeholder="Maximum Houshold" 
                                                data-bind="value: obj.max_customer, attr: {placeholder: lang.lang.maximum_household}" 
                                                style="width: 100%;" />
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-12 col-sm-12">
                                        <div class="control-group">
                                            <label ><span data-bind="text: lang.lang.description">Description</span></label>
                                            <textarea rows="3" class="k-textbox k-valid" 
                                                style="width:100%" 
                                                data-bind="value: obj.description, attr: {placeholder: lang.lang.description}" 
                                                placeholder="Description ..."></textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            
                        </div>
                                
                        <!-- // Bottom Tabs -->
                        <div class="row-fluid">
                            <div class="box-generic" >
                                <!-- //Tabs Heading -->
                                <div class="tabsbar tabsbar-1" style="background: #203864 !important; color: #fff;">
                                    <ul class="row-fluid row-merge">
                                        <li class="span2 glyphicons nameplate_alt active">
                                            <a href="#tab1" data-toggle="tab"><i></i> <span data-bind="text: lang.lang.info">Info</span></a>
                                        </li>
                                        <li class="span2 glyphicons nameplate" style="width: 21%;">
                                            <a href="#tab2" data-toggle="tab"><i></i> <span data-bind="text: lang.lang.terms_condition">Terms & Condition</span></a>
                                        </li>
                                        <li class="span2 glyphicons paperclip">
                                            <a href="#tab3" data-toggle="tab"><i></i> <span data-bind="text: lang.lang.logo">LOGO</span></a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- // Tabs Heading END -->

                                <div class="tab-content">

                                    <!-- //GENERAL INFO -->
                                    <div class="tab-pane active" id="tab1">
                                        <div class="row" style="margin-bottom: 15px;">
                                            <div class="col-xs-12 col-sm-3">
                                                <span data-bind="text: lang.lang.address">Address</span>
                                            </div>
                                            <div class="col-xs-12 col-sm-9">
                                                <input class="k-textbox" 
                                                    data-bind="value: obj.address, attr: {placeholder: lang.lang.address}" 
                                                    placeholder="Address ..." style="width: 100%;" />
                                            </div>
                                        </div>

                                        <div class="row" style="margin-bottom: 15px;">
                                            <div class="col-xs-12 col-sm-3">
                                                <span data-bind="text: lang.lang.districts">District</span>
                                            </div>
                                            <div class="col-xs-12 col-sm-3">
                                                <input 
                                                    data-role="dropdownlist" 
                                                    style="width: 100%;" 
                                                    data-option-label="District ..." 
                                                    data-auto-bind="true" 
                                                    data-value-primitive="true" 
                                                    data-text-field="name_local" 
                                                    data-value-field="id" 
                                                    data-bind="
                                                        value: obj.district,
                                                        source: districtDS" style="width: 100%;">
                                                
                                            </div>
                                            <div class="col-xs-12 col-sm-3">
                                                <span data-bind="text: lang.lang.mobile">Mobile</span>
                                            </div>
                                            <div class="col-xs-12 col-sm-3">
                                                <input class="k-textbox" 
                                                    data-bind="value: obj.mobile, attr: {placeholder: lang.lang.mobile}" 
                                                    placeholder="Mobile ..." 
                                                    style="width: 100%;" /></td>
                                            </div>
                                        </div>

                                        <div class="row" style="margin-bottom: 15px;">
                                            <div class="col-xs-12 col-sm-3">
                                                <span data-bind="text: lang.lang.provinces">Province</span>
                                            </div>
                                            <div class="col-xs-12 col-sm-3">
                                                <input 
                                                    data-role="dropdownlist" 
                                                    style="width: 100%;" 
                                                    data-option-label="Province ..." 
                                                    data-auto-bind="true" 
                                                    data-value-primitive="true" 
                                                    data-text-field="name" 
                                                    data-value-field="id" 
                                                    data-bind="
                                                        value: obj.province,
                                                        source: provinceSelect,
                                                        events: {change: provinceChange}">
                                            </div>
                                            <div class="col-xs-12 col-sm-3">
                                                <span data-bind="text: lang.lang.telephone">Telephone</span>
                                            </div>
                                            <div class="col-xs-12 col-sm-3">
                                                <input class="k-textbox" 
                                                    data-bind="value: obj.telephone, attr: {placeholder: lang.lang.telephone}" 
                                                    placeholder="Telephone ..." style="width: 100%;" />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-xs-12 col-sm-3">
                                                <span data-bind="text: lang.lang.email">Email</span>
                                            </div>
                                            <div class="col-xs-12 col-sm-3">
                                                <input class="k-textbox" 
                                                    data-bind="value: obj.email, attr: {placeholder: lang.lang.email}" 
                                                    placeholder="Email ..." style="width: 100%;" />
                                            </div>
                                        </div>
                                    </div>
                                    <!-- //GENERAL INFO END -->

                                    <!-- //ACCOUNTING -->
                                    <div class="tab-pane" id="tab2">
                                        <div class="row-fluid">
                                            <div class="controls">
                                                <textarea 
                                                    class="span12" 
                                                    placeholder="Terms & Condition..." 
                                                    data-bind="value: obj.term_of_condition"
                                                    style="height: 200px;">
                                                </textarea>
                                            </div>                          
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-3">
                                                <span data-bind="text: lang.lang.day_to_be_disconnected">ចំនួនថ្ងៃដែលត្រូវប្តាច់</span>
                                            </div>
                                            <div class="col-xs-12 col-sm-3">
                                                <input class="k-textbox" 
                                                    data-bind="value: obj.day_disconnect, attr: {placeholder: lang.lang.day}" placeholder="Mobile" 
                                                    style="width: 100%;">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- //ACCOUNTING END -->

                                    <!-- //CONTACT PERSON -->
                                    <div class="tab-pane" id="tab3">
                                        <p><span >File Type</span>: [PDF, JPG, JPEG, TIFF, PNG, GIF]</p>    
                                        <img data-bind="attr: { src: obj.image_url, alt: obj.name, title: obj.name }" width="120px" style="margin-bottom: 15px; border: 1px solid #ddd;">   
                                        <input id="files" name="files"
                                               type="file"
                                               data-role="upload"
                                               data-show-file-list="false"
                                               data-bind="events: { 
                                                    select: onSelect
                                               }">
                                    </div>
                                    <!-- //CONTACT PERSON END -->
                                </div>
                            </div>
                        </div>

                        <!-- Form actions -->
                        <div class="box-generic bg-action-button">
                            <div id="ntf1" data-role="notification"></div>
                            <div class="row">
                                <div class="span3">
                                </div>
                                <div class="col-sm-9" align="right">
                                    <span id="cancel" data-bind="click: cancel" class="btn-btn">
                                        <span data-bind="text: lang.lang.cancel">Cancel</span>
                                    </span>
                                    <span id="saveNew" class="btn-btn" data-bind="invisible: isEdit, click: save">
                                        <span data-bind="text: lang.lang.save">Save</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <!-- // Form actions END -->
                    </div>      
                </div>                      
            </div>
        </div>
    </div>
</script>
<!--End Setting-->