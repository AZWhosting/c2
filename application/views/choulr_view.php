<div id="wrapperApplication" class="wrapper" style="background: none;"></div>
<!--load before somthing not yet done -->
<div id="holdpageloadhide" style="display:block;text-align: center;position: fixed;top: 0; left: 0;width: 100%; height: 100%;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
    <i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 45%;left: 45%"></i>
</div>
<!-- template section starts -->
<script type="text/x-kendo-template" id="layout">
    <!-- <div id="menu" class="menu" style="background: rgba(68, 174, 79, 1.2);"></div> -->


    
    <div id="content" class="container" style=" background: none;"></div>
</script>
<script type="text/x-kendo-template" id="blank-tmpl">
</script>
<!-- <script type="text/x-kendo-template" id="menu-tmpl">
    <!-- <nav class="navbar navbar-inverse " role="navigation">
        <div class="container-fluid"> -->
            <!-- Brand and toggle get grouped for better mobile display -->
         <!--    <div class="navbar-header" style="margin: 0;">
           -->      <!-- Menu Phone -->
              <!--   <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
 -->
                <!-- Menu Phone Multipel Task-->
               <!--  <button type="button" class="navbar-toggle phone-multitasklist" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
                    <span class="icon-th-list"></span>
                </button>
 -->
                <!-- Menu Phone Langauge-->
               <!--  <button type="button" class="navbar-toggle phone-lang" data-toggle="collapse" data-target="#bs-example-navbar-collapse-4">
                    <span data-bind="text: lang.localeCode"></span>
                </button> -->

                <!-- Menu Phone Search-->
             <!--    <button type="button" class="navbar-toggle phone-search" data-toggle="collapse" data-target="#bs-example-navbar-collapse-3">
                    <span class="icon-search"></span>
                </button> -->

                <!--Logo-->
           <!--      <a class="navbar-brand" href="#/" style="padding-left: 15px;">
                    <img src="<?php echo base_url();?>/assets/choulr/img/logo.png" >
                </a>
            </div> -->

            <!-- Search Desktop-->
          <!--   <form class="navbar-form pull-left hidden-xs">
                <input id="search-placeholder" class="span2 search-query" type="text" placeholder="Search" data-bind="value: searchText" />
                <button class="btn btn-inverse" type="submit" data-bind="click: search" style="background-color: #56882e !important;border-radius: 2px;">
                    <i class="icon-search iconsearch"></i>
                </button>
            </form> -->

            <!-- Secondary Menu -->
         <!--    <ul class="topnav hidden-xs hidden-sm" id="secondary-menu">
            </ul>
 -->
            <!-- Menu rigth Desktop -->
        <!--     <ul class="menu-right col-sm-3 topnav pull-right hidden-xs">
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
            </ul> -->
            <!-- Menu Phone -->
           <!--  <div class="menu-phone collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav hidden-lg hidden-md hidden-sm">
                    <li><a href='#/' class='glyphicons show_big_thumbnails'><i></i><span >Dashnboard</span></a></li>
                    <li><a href='#/center'><span data-bind="text: lang.lang.center"></span></a></li>
                    <li role='presentation' class='dropdown'>
                        <a class='dropdown-toggle glyphicons text_bigger' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'><i class="text-t"></i> <span style="margin-top: 12px;" class='caret'></span></a>
                        <ul class='dropdown-menu'>
                            <li><a href='#/contract_center'><span >Contract Center</span></a></li>
                            <li><span class="li-line"></span></li>
                            <li><a href='#/customer_center'><span >Costomer Center</span></a></li>
                            <li><span class="li-line"></span></li>
                            <li><a href='#/lease_unit_center'><span >Lease Unit Center</span></a></li>
                            <li><span class="li-line"></span></li>
                            <li><a href='#/utility_center'><span >Utility Center</span></a></li>
                            <li><span class="li-line"></span></li>
                            <li><a href='#/run_bill'><span >1. Run Bill</span></a></li>
                            <li><a href='#/print_bill'><span >2. Print Bill</span></a></li>
                            <li><a href='#/make_invoice'><span >3. Make Invoice</span></a></li>
                            <li><a href='#/cash_receipt'><span >4. Cash Receipt</span></a></li>
                            <li><span class="li-line"></span></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#/reports">
                            <span>REPORTS</span>
                        </a>
                    </li>
                    <li style="width: 92px;">
                        <a style="font-size: 17px;font-weight: 700;" href='#/setting' class='glyphicons settings'>
                            <i></i>
                            <span>Setting</span>
                        </a>
                    </li>
                    <li>
                        <a href="#/manage" data-bind="click: logout">
                            <i class="icon-power-off"></i>
                            <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="hidden-lg hidden-md collapse navbar-collapse" id="bs-example-navbar-collapse-2">
                <ul class="dropdown-menu ul-multiTaskList" data-template="multiTaskList-row-template" data-bind="source: multiTaskList">
                </ul>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-3">
                <form class="navbar-form pull-left hidden-lg hidden-md hidden-sm">
                    <input id="search-placeholder" class="span2 search-query" type="text" placeholder="Search" data-bind="value: searchText" />
                    <button class="btn btn-inverse" type="submit" data-bind="click: search">
                        <i class="icon-search "></i>
                    </button>
                </form>
            </div>
            <div class="menu-phone collapse navbar-collapse" id="bs-example-navbar-collapse-4">
                <ul class=" nav navbar-nav hidden-lg hidden-md hidden-sm phone-language">
                    <li>
                        <a href="#" data-bind="click: lang.changeToKh">
                            <img class="kh-flag" src="https://lipis.github.io/flag-icon-css/flags/4x3/kh.svg">
                            <span style="margin-left: 0;">ភាសាខ្មែរ</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" data-bind="click: lang.changeToEn">
                            <img class="en-flag" src="https://lipis.github.io/flag-icon-css/flags/4x3/gb.svg">
                            <span>English</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav> -->
<!-- </script> --> 
<script id="multiTaskList-row-template" type="text/x-kendo-template">
    <li>
        <a href="\#/#=url#">
            <span>#=name#</span>
            <span title="Remove" class="multiTaskList glyphicons remove_2 pull-right" data-bind="click: removeLink">
                <i></i>
            </span>
        </a>
    </li>
</script>
<!-- Dashboard -->
<script id="dashBoard" type="text/x-kendo-template">
    <style type="text/css">
        .cash-bg {
            background: rgba(255, 255, 255, .15);
        }
    </style>
    <div class="container" style="margin-top: 100px;">
        <div class="row">
            <div class="col-md-10">
                <div class="col-md-12" style="padding: 0;padding-right: 5px;">
                <div class="cash-bg " style="padding: 5px;background: #45ce54;">
                <div class="col-md-6"> 
                    <div class="col-md-12" style="margin-top: 10px;">
                    <a " href="/" style="float:left;">
                    <img src="<?php echo base_url();?>/assets/choulr/img/logo.png" width="50">
                     </a>
                     <span><b style="color: #fff;font-size: 20px;float: left;padding-top: 15px;">Choulr</b></span> 
                   
                      
                    <form class="navbar-form pull-left hidden-xs">
                    <input id="search-placeholder" class="span2 search-query" type="text" placeholder="Search" data-bind="value: searchText" style="width: 220px;" />
                    <button class="btn btn-inverse" type="submit" data-bind="click: search" style="background-color: #56882e !important;border-radius: 2px;">
                        <i class="icon-search iconsearch"></i>
                    </button>
                    </form>
                    </div>
                  
                </div>
                <div class="col-md-6">
                    <div class="col-md-2"> 
                    <a href="#/contract" class="hvr-float">
                        <img title="add contract" src="assets/choulr/img/add-contract.png" width="60">
                     </a>
                    </div>
                    <div class="col-md-2"> 
                    <a href="#/lease_unit" class="hvr-float">
                        <img title="add lease unit" src="assets/choulr/img/add-lease-unit.png" width="60">
                     </a>
                    </div>
                </div> 
               
                         
                </div>
                </div>

                <div class="col-md-6">
                <div class="cash-bg ">
                    
                    <div class="row-fluid">

                        <div class="col-xs-12 col-sm-12 col-md-12 pk1">
                            <a href="#/contract" class="hvr-float">
                                <img title="contract" src="assets/choulr/img/contract-01.png" width="355">
                            </a>
                        </div>
     
                    </div>
                </div>
                </div>
            
                <div class="col-md-6">
                <div class="cash-bg ">
                    <div class="row-fluid">
                    
                        <div class="col-xs-12 col-sm-12 col-md-12 pk1">
                            <a href="#/lease_unit_center" class="hvr-float">
                                <img title="Add Create Invoice" src="assets/choulr/img/lish-01.png" width="355">
                            </a>
                        </div>
     
                    </div>
                </div>
                </div>

                <div class="col-md-6">
                <div class="cash-bg ">
                    <div class="row-fluid">
                    
                        <div class="col-xs-12 col-sm-12 col-md-12 pk1">
                             <a href="#/print_bill" class="hvr-float">
                                <img title="Add Print Invoice" src="assets/choulr/img/print-bill-01.png" width="355" >
                                
                            </a>
                        </div>
     
                    </div>
                </div>
                </div>

             
            
                    <div class="col-md-6">
                    <div class="cash-bg ">
                        <div class="row-fluid">
                        
                            <div class="col-xs-12 col-sm-12 col-md-12 pk1">
                                <a href="#/receipt" class="hvr-float" >
                                    <img title="Receive Water Bill Payment" src="assets/choulr/img/receipt-01.png" width="355">
                                   
                                </a>
                            </div>
         
                        </div>
                    </div>
                    </div>


                <div class="col-md-6">
                <div class="cash-bg " style="padding: 0;">
                    <a href="#/customer_deposit_report">
                        <div class="cash-invoice" style="margin-bottom: 0;background:#45ce54;color: #fff;">
                            <div class="span3" style="padding-left: 0;">
                                <span data-bind="text: lang.lang.deposit" style="font-weight: 600;font-size: 16px;color: #fff; ">DEPOSIT</span>
                                <br>
                                <p style="margin: 0;"><span style="color: ##fff;" data-bind="text: totalUser"></span>
                                    <span style="color: #fff;" data-bind="text: lang.lang.meter">Meters</span></p>
                            </div>
                            <div class="span9" style=" text-align: center; font-size: 34px; font-weight: 600; padding: 0;">
                                <span style="float: right;" data-bind="text: totalDeposit"></span>
                            </div>
                        </div>
                    </a>
                </div> 
                </div> 

                <div class="col-md-6">
                <div class="cash-bg " style="padding: 0;">    

                    <a href="#/sale_summary">
                        <div class="cash-invoice" style="margin-bottom: 0;background: #72ec7f;color: #fff;">
                            <div class="span4" style="padding-left: 0;">
                               <span data-bind="text: lang.lang.total_sale" style=" text-transform: uppercase;font-weight: 600;font-size: 16px; color: #fff;">TOTAL SALE</span>
                                <br>
                                <span style="color: #fff;" data-bind="text: totalUsage"></span>
                                <span style="color: #fff;">Usage</span>
                            </div>
                            <div class="span8" style="color: #fff; text-align: center; font-size: 34px; font-weight: 600; padding: 0;">
                                <span style="float: right;" data-bind="text: totalSale"></span>
                            </div>
                        </div>
                    </a>
                </div>
                </div>
                <div class="col-md-6" style="padding: 0;padding-right: 5px;">
                <div class="cash-bg " style="padding: 5px;">


                <div class="col-md-12">

                    <div style="color: #fff;"><p>Address<br> #134 , 7 th Floor, St.230, Sangkat Tuek Laork III,Khan Toul Kork, Phnom Penh, Cambodia
                     </p></div>
                </div>    

               
                 
               
                         
                </div>
                </div>

          

            </div>

            <div class="col-md-2">

                <div class="cash-bg pk" style="background: #379a6a;">
                    <div class="row-fluid">
                    
                        <div class="col-xs-12 col-sm-12 col-md-12 pk1">
                            <a href="#/reports" class="hvr-shrink">
                                <img title="reports" src="assets/choulr/img/report.png" width="90">
                                <span style="text-transform: uppercase; color: #fff; font-weight: 600; margin-top: 8px; display: inline-block;">Reports</span>
                            </a>
                        </div>
     
                    </div>
                </div>
                <div class="cash-bg pk" style="background: #45ce54;">
                    <div class="row-fluid">
                    
                        <div class="col-xs-12 col-sm-12 col-md-12 pk1">
                            <a href="#/center" class="hvr-shrink">
                                <img title="center" src="assets/choulr/img/center.png" width="90">
                                <span style="text-transform: uppercase; color: #fff; font-weight: 600; margin-top: 8px; display: inline-block;">Center</span>
                            </a>
                        </div>
     
                    </div>
                </div>
                <div class="cash-bg pk" style="background: #72ec7f;">
                    <div class="row-fluid">
                    
                        <div class="col-xs-12 col-sm-12 col-md-12 pk1">
                            <a href="#/setting" class="hvr-shrink" >
                                <img title="setting" src="assets/choulr/img/setting.png" width="90">
                                <span style="text-transform: uppercase; color: #fff; font-weight: 600; margin-top: 8px; display: inline-block;">Setting</span>
                            </a>
                        </div>
     
                    </div>
                </div>
                

                <div class="cash-bg pk" style="background: #ec4d4d;">
                    <div class="row-fluid">
                    
                        <div class="col-xs-12 col-sm-12 col-md-12 pk1">
                            <a href="#/setting" class="hvr-shrink" >
                                <img title="feedback" src="assets/choulr/img/feedback.png" width="90">
                                <span style="text-transform: uppercase; color: #fff; font-weight: 600; margin-top: 8px; display: inline-block;">Feedback</span>
                            </a>
                        </div>
     
                    </div>
                </div>
                <div class="cash-bg pk" style="background: #2e879e;">
                    <div class="row-fluid">
                    
                        <div class="col-xs-12 col-sm-12 col-md-12 pk1">
                            <a href="#/setting" class="hvr-shrink"  >
                                
                                <span style="text-transform: uppercase; color: #fff; font-weight: 600; margin-top: 8px; display: inline-block;text-align: center;font-size: 11px;">
                                    Contact us by<br> 078 79 33 22<br> Mon-Fri<br>09:00-18:00am
                                </span>
                            </a>
                        </div>
     
                    </div>
                </div>
    
            </div>

           
        </div>

       
            <!-- <div class="cash-bg pk" style="margin-bottom: 10px;">
                <div class="row-fluid">
                    <div class="col-xs-12 col-sm-6 col-md-7" style="background: rgba(68, 174, 79, 0.5); padding-bottom: 15px; padding-top: 15px; padding-right: 0;">
                        <a href="#/customer_aging_sum_list">
                            <div class="widget-body alert-info welcome-nopadding" style="width: 100%; background: none;">
                                <p style="color: #fff;font-size: 16px;"><span data-bind="text: lang.lang.expected_due">Expected due</span></p>

                                <div class="strong" align="center" style="color: #fff; font-size: 40px; margin-top: 23px; margin-bottom:  23px;"><span data-bind="text: totalAmount"></span></div>

                                <table width="100%" style="color: #fff;">
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
                    <div class="col-xs-12 col-sm-6 col-md-5" style="background: rgba(68, 174, 79, 0.2); padding-bottom: 15px; padding-top: 15px; padding-right: 0;">
                        <a href="#/customer_list">
                            <div class="widget-body alert-info welcome-nopadding" style="width: 100%; background: none;">
                                <p style="color: #fff;font-size: 16px;"><span data-bind="text: lang.lang.active_meter">Active Meter</span></p>

                                <div class="strong" align="center" style="color: #fff; font-size: 40px; margin-top:  23px; margin-bottom: 23px;"><span data-bind="text: activeCust"></span></div>

                                <table width="100%" style="color: #fff;">
                                    <tbody>
                                        <tr align="center">
                                            <td>
                                                <span style="font-size: 25px;" data-bind="text: totalCust"></span>
                                                <br>
                                                <span data-bind="text: lang.lang.meter">Meter</span>
                                            </td>
                                            <td>
                                                <span style="font-size: 25px;" data-bind="text: voidCust"></span>
                                                <br>
                                                <span data-bind="text: lang.lang.customers">Customers</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- 
           <div class="col-md-12 water-tableList hidden-xs">
                <table class=" table table-borderless table-condensed " style="margin-left: 15.5px;width: 97.5%;">
                    <thead>
                        <tr>
                            <th style="vertical-align: top;"><span data-bind="text: lang.lang.no">No.</span></th>
                            <th style="vertical-align: top;"><span data-bind="text: lang.lang.license">License</span></th>
                            <th style="vertical-align: top;"><span data-bind="text: lang.lang.no_of_bloc">No.of Bloc</span></th>
                            <th style="vertical-align: top;"><span data-bind="text: lang.lang.active_meter">Active Meter</span></th>
                            <th style="vertical-align: top;"><span data-bind="text: lang.lang.inactive_meter">Inactive Meter</span></th>
                            <th style="vertical-align: top;"><span data-bind="text: lang.lang.deposit">Deposit</span></th>
                            <th style="vertical-align: top;">m<sup>3</sup>/kWh</th>
                            <th style="vertical-align: top;"><span data-bind="text: lang.lang.sale_amount">Sale Amount</span></th>
                            <th style="vertical-align: top;"><span data-bind="text: lang.lang.balance">Balance</span></th>
                        </tr>
                    </thead>
                    <tbody style="border: none;" data-role="listview" data-bind="source: dataSource" data-template="dashboard-template-table-list">             
                    </tbody>
                </table>
            </div> -->
    </div>
    </div>
</script>
<!--Setting-->
<script id="Setting" type="text/x-kendo-template">
    <div class="container">
        <div class="row-fluid">
            <div class="background">
                <div class="row-fluid">
                    <div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
                        <i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
                    </div>
                    <div id="example" class="k-content">
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
                                            <i></i><span class="strong"><span>Properties</span></span>
                                        </a>
                                    </li>  
                                     <li>
                                        <a href="#tab2" class="glyphicons pushpin" data-toggle="tab">
                                            <i></i><span class="strong"><span >Areas</span></span>
                                        </a>
                                    </li>  
                                    <li>
                                        <a href="#tab3" class="glyphicons old_man" data-toggle="tab">
                                            <i></i><span class="strong"><span data-bind="text: lang.lang.customer_types">Customer Types</span></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tab4" class="glyphicons retweet_2" data-toggle="tab">
                                            <i></i><span class="strong"><span data-bind="text: lang.lang.category">Category</span></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#Amenity" class="glyphicons retweet_2" data-toggle="tab">
                                            <i></i><span class="strong"><span >Amenityitem</span></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#Space" class="glyphicons retweet_2" data-toggle="tab">
                                            <i></i><span class="strong"><span >spaceitem</span></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tab5" data-bind="click: goTariff" class="glyphicons calculator" data-toggle="tab">
                                            <i></i><span class="strong"><span data-bind="text: lang.lang.tariff">Tariff</span></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tab8" data-bind="click: goMaintenance" class="glyphicons rotation_lock" data-toggle="tab">
                                            <i></i><span class="strong"><span>Services</span></span>
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
                                        <a href="#tab12" data-bind="click: goRent" class="glyphicons certificate" data-toggle="tab">
                                            <i></i><span class="strong"><span>Rent</span></span>
                                        </a>
                                    </li>                        
                                </ul>
                            </div>
                            <!-- // Tabs Heading END -->
                            <div class="widget-body col-xs-12 col-sm-9 setting">
                                <div class="row-fluid">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab1">
                                            <a class="btn-icon btn-primary glyphicons circle_plus" style="width: 80px; padding: 5px 7px 5px 35px !important; text-align: left;" href="#/property"><i></i><span data-bind="text: lang.lang.add">Add</span></a>
                                            <table style="width: 100%;" class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs">
                                                <thead>
                                                    <tr>
                                                        <th style="vertical-align: top; text-align: center;" ><span data-bind="text: lang.lang.number">Number</span></th>
                                                        <th style="vertical-align: top; text-align: center;" ><span data-bind="text: lang.lang.name">Name</span></th>
                                                        <th style="vertical-align: top; text-align: center;" ><span data-bind="text: lang.lang.abbr">Abbr</span></th>
                                                        <th style="vertical-align: top; text-align: center;" ><span data-bind="text: lang.lang.mobile">Mobile</span></th>
                                                        <th style="vertical-align: top; text-align: center;" ><span data-bind="text: lang.lang.status">Status</span></th>
                                                    </tr>
                                                </thead>
                                                <tbody data-role="listview"
                                                        data-template="property-setting-template"
                                                        data-bind="source: propertyDS"></tbody>
                                            </table>
                                        </div>
                                        <div class="tab-pane" id="tab2">
                                            <div style="clear: both;">
                                                <input data-role="dropdownlist"
                                                   class="span3"
                                                   style="padding-right: 1px;height: 32px;" 
                                                   data-option-label="(--- Select ---)"
                                                   data-auto-bind="false"  
                                                   data-value-primitive="true"
                                                   data-text-field="name"
                                                   data-value-field="id"
                                                   data-bind="value: areaProperty,
                                                              source: propertyDS" />
                                                <input data-bind="
                                                    value: areaName" type="text" placeholder="Location" style="height: 32px; padding: 5px; margin-right: 10px; margin-left: 10px;"  class="span3 k-textbox k-invalid" />
                                                <input data-bind="
                                                    value: areaAbbr" type="text" placeholder="Abbr" style="height: 32px; padding: 5px; margin-right: 10px;" class="span3 k-textbox k-invalid" />
                                                <a class="btn-icon btn-primary glyphicons circle_plus cutype-icon" style="width: 80px; padding: 5px 7px 5px 35px !important; text-align: left;" data-bind="click: addArea"><i></i><span data-bind="text: lang.lang.add">Add</span></a>
                                            </div>
                                            <table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align: center;"><span>Property</span></th>
                                                        <th style="text-align: center;"><span data-bind="text: lang.lang.location">Location</span></th>
                                                        <th style="text-align: center;"><span data-bind="text: lang.lang.abbr">Abbr</span></th>
                                                        <th style="text-align: center;"><span data-bind="text: lang.lang.action">Action</span></th>
                                                    </tr>
                                                </thead>
                                                <tbody data-role="listview"     
                                                    data-template="area-setting-template"
                                                    data-edit-template="area-edit-template"
                                                    data-auto-bind="false"
                                                    data-bind="source: areaDS"></tbody>
                                            </table>

                                            <br>
                                            <p data-bind="visible: blocSelect"><span >Location Name</span>: <span data-bind="text: blocNameShow"></span></p>
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
                                            <p data-bind="visible: poleSelect"><span>Zone Name</span>: <span data-bind="text: poleNameShow"></span></p>
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
                                            <!-- Pole Item Window -->
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
                                            <div class="input-append">
                                                <input class="span4" id="appendedInputButtons" type="text" placeholder="input customer type ..." data-bind="value: contactTypeName">
                                                <input class="span4" id="appendedInputButtons" type="text" placeholder="input abbr ..." data-bind="value: contactTypeAbbr">
                                                <select class="span3" id="appendedInputButtons" data-bind="value: contactTypeCompany" >
                                                    <option value="0"><span data-bind="text: lang.lang.not_a_company"></span></option>
                                                    <option value="1"><span data-bind="text: lang.lang.it_is_a_company"></span></option>                            
                                                </select>
                                                <button class="btn btn-default" type="button" data-bind="click: addContactType"><i class="icon-plus"></i> <span data-bind="text: lang.lang.add_type"></span></button>
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
                                                <input data-bind="value: cateName, attr: {placeholder: lang.lang.name}" type="text" placeholder="Name" style="height: 32px; padding: 5px; margin-right: 10px;"  class="span2 k-textbox k-invalid" />
                                                
                                                <a class="btn-icon btn-primary glyphicons circle_plus cutype-icon" style="width: 80px; padding: 5px 7px 5px 35px !important; text-align: left;" data-bind="click: addCate"><i></i><span data-bind="text: lang.lang.add">Add</span></a>
                                            </div>
                                            <table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align: center;"><span data-bind="text: lang.lang.name">Name</span></th>
                                                        <th style="text-align: center;"><span data-bind="text: lang.lang.action">Action</span></th>
                                                    </tr>
                                                </thead>
                                                <tbody data-role="listview"
                                                        data-template="categorySetting-template"
                                                        data-auto-bind="true"
                                                        data-edit-template="category-edit-template"
                                                        data-bind="source: categoryDS"></tbody>
                                            </table>
                                        </div>
                                        <div class="tab-pane" id="Amenity">
                                            <div style="clear: both;">
                                                <input data-bind="value: amenName, attr: {placeholder: lang.lang.name}" type="text" placeholder="Name" style="height: 32px; padding: 5px; margin-right: 10px;"  class="span2 k-textbox k-invalid" />
                                                
                                                <a class="btn-icon btn-primary glyphicons circle_plus cutype-icon" style="width: 80px; padding: 5px 7px 5px 35px !important; text-align: left;" data-bind="click: addAmen"><i></i><span data-bind="text: lang.lang.add">Add</span></a>
                                            </div>
                                            <table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align: center;"><span data-bind="text: lang.lang.name">Name</span></th>
                                                        <th style="text-align: center;"><span data-bind="text: lang.lang.action">Action</span></th>
                                                    </tr>
                                                </thead>
                                                <tbody data-role="listview"
                                                        data-template="amenSetting-template"
                                                        data-auto-bind="true"
                                                        data-edit-template="amen-edit-template"
                                                        data-bind="source: amenityDS"></tbody>
                                            </table>
                                        </div>
                                        <div class="tab-pane" id="Space">
                                            <div style="clear: both;">
                                                <input data-bind="value: spaceName, attr: {placeholder: lang.lang.name}" type="text" placeholder="Name" style="height: 32px; padding: 5px; margin-right: 10px;"  class="span2 k-textbox k-invalid" />
                                                
                                                <a class="btn-icon btn-primary glyphicons circle_plus cutype-icon" style="width: 80px; padding: 5px 7px 5px 35px !important; text-align: left;" data-bind="click: addspace"><i></i><span data-bind="text: lang.lang.add">Add</span></a>
                                            </div>
                                            <table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align: center;"><span data-bind="text: lang.lang.name">Name</span></th>
                                                        <th style="text-align: center;"><span data-bind="text: lang.lang.action">Action</span></th>
                                                    </tr>
                                                </thead>
                                                <tbody data-role="listview"
                                                        data-template="spaceSetting-template"
                                                        data-auto-bind="true"
                                                        data-edit-template="space-edit-template"
                                                        data-bind="source: spaceDS"></tbody>
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
                                                   data-value-primitive="false"
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
                                                     data-height="225"
                                                     data-resizable="false"
                                                     data-actions="{}"
                                                     data-position="{top: '30%', left: '37%'}"
                                                     data-bind="visible: windowTariffItemVisible">
                                                <table>
                                                    <tr style="border-bottom: 8px solid #fff;">
                                                        <td width="35%"><span data-bind="text: lang.lang.name"></span></td>
                                                        <td>
                                                            <input class="k-textbox" placeholder="Item Name ..." data-bind="attr :{placeholder: lang.lang.name}, value: tariffItemName" style="width: 100%;" />
                                                        </td>
                                                    </tr>
                                                    <tr style="border-bottom: 8px solid #fff;">
                                                        <td><span data-bind="text: lang.lang.usage">Usage</span></td>
                                                        <td>
                                                            <input class="k-textbox" placeholder="Usage ..." data-bind="attr:{placeholder: lang.lang.usage},value: tariffItemUsage" style="width: 100%;" />
                                                        </td>
                                                    </tr>
                                                    <tr style="border-bottom: 8px solid #fff;">
                                                        <td><span data-bind="text: lang.lang.type">Usage</span></td>
                                                        <td>
                                                        <input data-role="dropdownlist"
                                                               style="padding-right: 1px; height: 32px; margin-right: 10px;" 
                                                               data-option-label="(--- Type ---)"
                                                               data-auto-bind="false"       
                                                               data-value-primitive="true"
                                                               data-text-field="name"
                                                               data-value-field="id"
                                                               data-bind="value: tariffItemUnit,
                                                                          source: utiType"/>
                                                        </td>
                                                    </tr>
                                                    <tr style="border-bottom: 8px solid #fff;">
                                                        <td><span data-bind="text: lang.lang.price">Price</span></td>
                                                        <td>
                                                            <input class="k-textbox" placeholder="Price ..." data-bind="attr:{placeholder: lang.lang.price}, value: tariffItemAmount" style="width: 100%;" />
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
                                                   data-value-primitive="false"
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
                                                <input data-bind="value: serviceName, attr: {placeholder: lang.lang.name}" type="text" placeholder="Name" style="height: 32px; padding: 5px; margin-right: 10px;"  class="span2 k-textbox k-invalid" />

                                                <input data-role="dropdownlist"
                                                   class="span2"
                                                   style="padding-right: 1px; height: 32px; margin-right: 10px;" 
                                                   data-option-label="(--- Acount ---)"
                                                   data-auto-bind="false"                              
                                                   data-value-primitive="false"
                                                   data-text-field="name"
                                                   data-value-field="id"
                                                   data-bind="value: serviceAccount,
                                                              source: tariffAccDS"/>
                                                <input data-role="dropdownlist"
                                                   class="span2"
                                                   style="padding-right: 1px; height: 32px; margin-right: 10px;" 
                                                   data-option-label="(--- Currency ---)"
                                                   data-auto-bind="false"                              
                                                   data-value-primitive="true"
                                                   data-text-field="code"
                                                   data-value-field="id"
                                                   data-bind="value: serviceCurrency,
                                                              source: currencyDS"/>

                                                <input data-bind="value: servicePrice, attr: {placeholder: lang.lang.price}" type="text" placeholder="Price" style="height: 32px; padding: 5px; margin-right: 10px;" class="span2 k-textbox k-invalid" />

                                                <a class="btn-icon btn-primary glyphicons circle_plus cutype-icon" style="width: 80px; padding: 5px 7px 5px 35px !important; text-align: left;" data-bind="click: addService"><i></i><span data-bind="text: lang.lang.add">Add</span></a>
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
                                                        data-template="serviceSetting-template"
                                                        data-edit-template="service-edit-template"
                                                        data-auto-bind="false"
                                                        data-bind="source: planItemDS"></tbody>
                                            </table>
                                        </div>
                                        <div class="tab-pane" id="tab8">
                                            <div style="clear: both;">
                                                <input data-bind="value: maintenanceName, attr: {placeholder: lang.lang.name}" type="text" placeholder="Name" style="height: 32px; padding: 5px; margin-right: 10px;"  class="span2 k-textbox k-invalid" />
                                                <input data-role="dropdownlist"
                                                   class="span2"
                                                   style="padding-right: 1px; height: 32px; margin-right: 10px;" 
                                                   data-option-label="(--- Acount ---)"
                                                   data-auto-bind="false"                              
                                                   data-value-primitive="false"
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
                                                   data-value-primitive="false"
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
                                                <input data-role="dropdownlist"
                                                   class="span2"
                                                   style="padding-right: 1px; height: 32px; margin-right: 10px;" 
                                                   data-option-label="(--- Type ---)"
                                                   data-auto-bind="false"
                                                   data-value-primitive="true"
                                                   data-text-field="name"
                                                   data-value-field="id"
                                                   data-bind="value: rentType,
                                                              source: rentTypeDS"/>

                                                <input data-bind="value: rentName, attr: {placeholder: lang.lang.name}" type="text" placeholder="Name ..." style="height: 32px; padding: 5px; margin-right: 10px;"  class="span2 k-textbox k-invalid" />

                                                <input data-role="dropdownlist"
                                                   class="span2"
                                                   style="padding-right: 1px; height: 32px; margin-right: 10px;" 
                                                   data-option-label="(--- Currency ---)"
                                                   data-auto-bind="false"                              
                                                   data-value-primitive="true"
                                                   data-text-field="code"
                                                   data-value-field="id"
                                                   data-bind="value: rentCurrency,
                                                              source: currencyDS"/>

                                                <input data-role="dropdownlist"
                                                   class="span2"
                                                   style="padding-right: 1px; height: 32px; margin-right: 10px;" 
                                                   data-option-label="(--- Acount ---)"
                                                   data-auto-bind="false"       
                                                   data-value-primitive="false"
                                                   data-text-field="name"
                                                   data-value-field="id"
                                                   data-bind="value: rentAccount,
                                                              source: tariffAccDS"/>

                                                <input data-bind="value: rentPrice, attr: {placeholder: lang.lang.price}" type="text" placeholder="Name ..." style="height: 32px; padding: 5px; margin-right: 10px;"  class="span2 k-textbox k-invalid" />

                                                <a class="btn-icon btn-primary glyphicons circle_plus cutype-icon" style="width: 80px; padding: 5px 7px 5px 35px !important; text-align: left;" data-bind="click: addRent"><i></i><span data-bind="text: lang.lang.add">Add</span></a>

                                            </div>
                                            <table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align: center; vertical-align: top;"><span data-bind="text: lang.lang.type">Code</span></th>
                                                        <th style="text-align: center; vertical-align: top;"><span data-bind="text: lang.lang.name">Name</span></th>
                                                        <th style="text-align: center; vertical-align: top;"><span data-bind="text: lang.lang.currency">Abbr</span></th>
                                                        <th style="text-align: center; vertical-align: top;"><span data-bind="text: lang.lang.account">Action</span></th>
                                                        <th style="text-align: center; vertical-align: top;"><span data-bind="text: lang.lang.price">Action</span></th>
                                                        <th style="text-align: center; vertical-align: top;"><span data-bind="text: lang.lang.action">Action</span></th>
                                                    </tr>
                                                </thead>
                                                <tbody data-role="listview"     
                                                    data-template="rent-setting-template"
                                                    data-edit-template="rent-edit-template"
                                                    data-auto-bind="false"
                                                    data-bind="source: rentDS"></tbody>
                                            </table>
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
<!--Plan-->
<script id="Plan" type="text/x-kendo-template">
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
<!--Properties-->
<script id="Property" type="text/x-kendo-template">
    <div class="container">
        <div class="row-fluid">
            <div class="background">
                <div class="row-fluid">
                    <div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
                        <i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
                    </div>
                    <div id="example" class="k-content">
                        <h2 >Property</h2>
                        <div class="hidden-print pull-right">
                            <span class="glyphicons no-js remove_2" 
                                data-bind="click: cancel"><i></i></span>
                        </div>
                        <div class="clear"></div>
                        <div class="row-fluid">
                            <div class="col-xs-6 col-sm-6 well">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="control-group">
                                            <label >
                                                <span data-bind="text: lang.lang.type">Type</span> <span style="color:red">*</span>
                                            </label>
                                            <select data-role="dropdownlist"
                                               data-value-primitive="true"
                                               data-text-field="name"
                                               data-value-field="id"
                                               data-option-label="( ... Select ... )"
                                               data-bind="
                                                source: selectPropertyType,
                                                value: obj.type_id"
                                               style="width: 100%;" ></select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="control-group">
                                            <label >
                                                <span>No.</span> <span style="color:red">*</span>
                                            </label>
                                            <input 
                                                class="k-textbox" 
                                                data-bind="
                                                    value: obj.number"
                                                placeholder="No." 
                                                required data-required-msg="required"
                                                style="width: 100%;" >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6" >
                                        <div class="control-group">
                                            <label ><span>Name</span> <span style="color:red">*</span></label>          
                                            <br>
                                            <input
                                                class="k-textbox" 
                                                data-bind="
                                                    value: obj.name" 
                                                placeholder="Name" 
                                                style="width: 100%;" />
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="control-group">
                                            <div class="col-xs-5" style="padding-left: 0;">
                                                <label ><span data-bind="text: lang.lang.abbr">Abbr</span></label>
                                                <input 
                                                    class="k-textbox" 
                                                    placeholder="Abbr" 
                                                    data-bind="
                                                        value: obj.abbr" 
                                                    style="width: 100%;" />
                                            </div>
                                            <div class="col-xs-7" style="padding-left:0;padding-right: 0;">
                                                <label ><span>Code</span></label>
                                                <input 
                                                    class="k-textbox"
                                                    placeholder="Code" 
                                                    data-bind="value: obj.code" 
                                                    style="width: 100%;" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="control-group">
                                            <label ><span data-bind="text: lang.lang.currency">Currency</span></label>
                                            <select data-role="dropdownlist"
                                               data-value-primitive="true"
                                               data-text-field="code"
                                               data-value-field="id"
                                               data-bind="
                                                source: selectCurrency,
                                                value: obj.currency"
                                               style="width: 100%; margin-bottom: 15px;" ></select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
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
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6">
                                <div class="row-fluid">
                                    <div id="map" class="col-xs-12 col-sm-12" style="height: 155px;"></div>
                                </div>
                                <div class="separator line bottom"></div>
                                <div class="row-fluid"> 
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="control-group">
                                            <label for="latitute"><span data-bind="text: lang.lang.latitute"></span> </label>
                                            <div class="input-prepend">
                                                <span style="float: left;" class="add-on glyphicons direction"><i></i></span>
                                                <input style="float: left;  width: 77%; padding: 4px 8px; border: 1px solid #efefef; line-height: 20px; box-shadow: none;" type="text" class="input-large span12" data-bind="value: obj.latitute, events:{change: loadMap}" placeholder="012345.67897">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="control-group">
                                            <label for="longtitute"><span data-bind="text: lang.lang.longtitute"></span> </label>
                                            <div class="input-prepend">
                                                <span style="float: left;" class="add-on glyphicons google_maps"><i></i></span>
                                                <input style="float: left;  width: 77%;  box-shadow: none;padding: 4px 8px; border: 1px solid #efefef; line-height: 20px; box-shadow: none;" type="text" class="input-large span12" data-bind="value: obj.longtitute, events:{change: loadMap}" placeholder="012345.67897">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="box-generic" >
                                <div class="tabsbar tabsbar-1" style="background: #203864 !important; color: #fff;">
                                    <ul class="row-fluid row-merge">
                                        <li class="span2 glyphicons nameplate_alt active">
                                            <a href="#tab1" data-toggle="tab"><i></i> <span data-bind="text: lang.lang.info">Info</span></a>
                                        </li>
                                        <li class="span2 glyphicons nameplate" style="width: 21%;">
                                            <a href="#tab2" data-toggle="tab"><i></i> <span data-bind="text: lang.lang.terms_condition">Terms Condition</span></a>
                                        </li>
                                        <li class="span2 glyphicons paperclip">
                                            <a href="#tab3" data-toggle="tab"><i></i> <span>Gallery</span></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab1">
                                        <div class="row" style="margin-bottom: 15px;">
                                            <div class="col-xs-12 col-sm-3">
                                                <span data-bind="text: lang.lang.address">Address</span>
                                            </div>
                                            <div class="col-xs-12 col-sm-9">
                                                <input class="k-textbox" 
                                                    data-bind="value: obj.address" 
                                                    placeholder="Address ..." style="width: 100%;" />
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom: 15px;">
                                            <div class="col-sm-3 col-sx-12"><span data-bind="text: lang.lang.country"></span></div>
                                            <div class="col-sm-3 col-sx-12">
                                                <input data-role="dropdownlist"
                                                   data-option-label="Country ..."
                                                   data-value-primitive="true"
                                                   data-text-field="name"
                                                   data-value-field="id"
                                                   data-bind="value: obj.country_id,
                                                              source: countryDS" style="width: 100%;" />
                                            </div>
                                            <div class="col-xs-12 col-sm-3">
                                                <span data-bind="text: lang.lang.mobile">Mobile</span>
                                            </div>
                                            <div class="col-xs-12 col-sm-3">
                                                <input class="k-textbox" 
                                                    data-bind="value: obj.mobile" 
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
                                                        value: obj.province_id,
                                                        source: provinceSelect,
                                                        events: {change: provinceChange}">
                                            </div>
                                            <div class="col-xs-12 col-sm-3">
                                                <span data-bind="text: lang.lang.telephone">Telephone</span>
                                            </div>
                                            <div class="col-xs-12 col-sm-3">
                                                <input class="k-textbox" 
                                                    data-bind="
                                                        value: obj.telephone" 
                                                    placeholder="Telephone ..." style="width: 100%;" />
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
                                                        value: obj.district_id,
                                                        source: districtDS" style="width: 100%;">
                                            </div>
                                            <div class="col-xs-12 col-sm-3">
                                                <span data-bind="text: lang.lang.email">Email</span>
                                            </div>
                                            <div class="col-xs-12 col-sm-3">
                                                <input class="k-textbox" 
                                                    data-bind="value: obj.email" 
                                                    placeholder="Email ..." style="width: 100%;" />
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom: 15px;">
                                            <div class="col-xs-12 col-sm-3">
                                                <span>Total Area</span>
                                            </div>
                                            <div class="col-xs-12 col-sm-3">
                                                <input class="k-textbox" 
                                                    data-bind=" value: obj.total_area" 
                                                    placeholder="Total Area ..." 
                                                    style="width: 100%;" />
                                            </div>
                                            <div class="col-xs-12 col-sm-3">
                                                <span >Area for Rent</span>
                                            </div>
                                            <div class="col-xs-12 col-sm-3">
                                                <input class="k-textbox" 
                                                    data-bind=" value: obj.area_for_rent" 
                                                    placeholder="Area for Rent ..." 
                                                    style="width: 100%;" />
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom: 15px;">
                                            <div class="col-xs-12 col-sm-3">
                                                <span>Area of Service</span>
                                            </div>
                                            <div class="col-xs-12 col-sm-3">
                                                <input class="k-textbox" 
                                                    data-bind=" value: obj.area_of_service" 
                                                    placeholder="Area of Service ..." 
                                                    style="width: 100%;" />
                                            </div>
                                            <div class="col-xs-12 col-sm-3">
                                                <span>Common Area</span>
                                            </div>
                                            <div class="col-xs-12 col-sm-3">
                                                <input class="k-textbox" 
                                                    data-bind=" value: obj.common_area" 
                                                    placeholder="Common Area ..." 
                                                    style="width: 100%;" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-3">
                                                <span>Building Type</span>
                                            </div>
                                            <div class="col-xs-12 col-sm-3">
                                                <input 
                                                    data-role="dropdownlist" 
                                                    style="width: 100%;" 
                                                    data-option-label="Building Type ..." 
                                                    data-auto-bind="true" 
                                                    data-value-primitive="true" 
                                                    data-text-field="type"
                                                    data-value-field="id"
                                                    data-bind="
                                                        value: obj.building_type,
                                                        source: buildingTypeDS" style="width: 100%;">
                                            </div>
                                            <div class="col-xs-12 col-sm-3">
                                                <span>Near By</span>
                                            </div>
                                            <div class="col-xs-12 col-sm-3">
                                                <input class="k-textbox" 
                                                    data-bind=" value: obj.near_by" 
                                                    placeholder="Near By ..." 
                                                    style="width: 100%;" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab2">
                                        <div class="row-fluid">
                                            <div class="controls">
                                                <textarea 
                                                    class="span12" 
                                                    placeholder="Terms & Condition..." 
                                                    data-bind="value: obj.terms_condition"
                                                    style="height: 200px;">
                                                </textarea>
                                            </div>                                          
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab3">
                                        <div class="col-xs-12 col-sm-4">
                                            <img style="width: 100%;margin-bottom: 15px;" data-bind="attr: { src: proImg1 } ">
                                            <input class="k-textbox" 
                                                    data-bind=" value: obj.img1" 
                                                    placeholder="Url ..." 
                                                    style="width: 100%;" />
                                        </div>
                                        <div class="col-xs-12 col-sm-4">
                                            <img style="width: 100%;margin-bottom: 15px;" data-bind="attr: { src: proImg2 } ">
                                            <input class="k-textbox" 
                                                    data-bind=" value: obj.img2" 
                                                    placeholder="Url ..." 
                                                    style="width: 100%;" />
                                        </div>
                                        <div class="col-xs-12 col-sm-4">
                                            <img style="width: 100%;margin-bottom: 15px;" data-bind="attr: { src: proImg3 } ">
                                            <input class="k-textbox" 
                                                    data-bind=" value: obj.img3" 
                                                    placeholder="Url ..." 
                                                    style="width: 100%;" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-generic bg-action-button">
                            <div id="ntf1" data-role="notification"></div>
                            <div class="row">
                                <div class="col-sm-12" align="right">
                                    <span id="cancel" data-bind="click: cancel" class="btn-btn">
                                        <span data-bind="text: lang.lang.cancel">Cancel</span>
                                    </span>
                                    <span id="saveNew" class="btn-btn" data-bind="invisible: isEdit, click: save">
                                        <span data-bind="text: lang.lang.save">Save</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>      
                </div>                      
            </div>
        </div>
    </div>
</script>
<!--End Setting-->
<!-- Lease Unit Center -->
<script id="leaseUnitCenter" type="text/x-kendo-template">  
    <div class="container">
        <div class="row" style="margin-top: 30px;">
            <div class="col-xs-12 col-sm-4 col-md-3" >
                <div class="listWrapper" style="border: 1px solid #ddd;">
                    <a href="#/lease_unit" style="width: 100%;clear: both;position: relative;text-align: center;float: none!important;padding: 10px 0;font-weight: bold;" class="btn btn-primary btn-icon glyphicons edit pull-right">Add Lease Unit</a>
                    <div class="innerAll" style="height: 55px;">
                        <div class="widget-search separator bottom" style="padding: 0;">
                            <a class="btn btn-default pull-right" data-bind="click: search"><i class="icon-search"></i></a>
                            <div class="overflow-hidden">
                                <input style="line-height: 26px;" type="search" placeholder="Number or Name..." data-bind="value: searchText, events:{change: search}">
                            </div>
                        </div>
                    </div>
                    <span class="results"><span data-bind="text: contactDS.total"></span> <span data-bind="text: lang.lang.found_search"></span></span>
                    <div class="table table-condensed" id="listContact" style="height: 580px; margin-bottom: 0;"
                         data-role="grid"
                         data-bind="source: leaseUnitDS"
                         data-row-template="lease-unit-list-tmpl"
                         data-columns="[{title: 'Lease Units'}]"
                         data-selectable="true"
                         data-height="475"
                         data-auto-bind="true"
                         data-scrollable="{virtual: true}">
                    </div>
                </div>  
            </div>
            <div class="col-xs-12 col-sm-8 col-md-9 ">
                <div class="listWrapper" style="border: 1px solid #ddd;min-height: 652px;width: 50%;">
                    <div class="row" style="margin-bottom: 15px;">
                        <div class="col-xs-12 col-xs-6" style="margin-bottom: 15px;">
                            <button style="width: 100% !important; float: left; margin-right: 8px;" class="btn-btn btn-width-100 btn-center-text btn-md margin" data-bind="click: goLU">Edit Lease Unit
                            </button>
                            <table>
                                <tr>
                                    <td data-bind="text: lang.lang.name"></td>
                                    <td data-bind="text: obj.name"></td>
                                </tr>
                                <tr>
                                    <td data-bind="text: lang.lang.status"></td>
                                    <td data-bind="text: obj.status_detail"></td>
                                </tr>
                                <tr>
                                    <td>Visitor Number</td>
                                    <td data-bind="text: obj.visitor_number"></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</script>
<script id="leaseUnit" type="text/x-kendo-template">
    <div class="container">
        <div class="row-fluid">
            <div class="background">
                <div class="row-fluid">
                    <div id="example" class="k-content">
                        <h2>Lease Unit</h2>
                        <div class="hidden-print pull-right">
                            <span class="glyphicons no-js remove_2" 
                                data-bind="click: cancel"><i></i></span>
                        </div>
                        <div class="clear"></div>
                        <div class="row-fluid">
                            <div class="col-sm-6 well">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="control-group">
                                            <label for="ddlContactType">
                                                <span>Properties</span> <span style="color:red">*</span>
                                            </label>
                                            <input id="ddlContactType" name="ddlContactType"
                                               data-role="dropdownlist"
                                               data-value-primitive="true"
                                               data-text-field="name"
                                               data-value-field="id"
                                               data-bind="value: obj.property_id,
                                                          source: luPropertyDS,
                                                          events:{change: luProperyChanges}"
                                               data-option-label="(--- Select ---)"
                                               required data-required-msg="required" style="width: 100%;" /> 
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="control-group"> 
                                            <label for="txtAbbr">
                                                <span>Number</span> <span style="color:red">*</span></label>
                                            <br>
                                            <input id="txtAbbr" 
                                                name="txtAbbr" 
                                                class="k-textbox"
                                                data-bind="value: obj.abbr" 
                                                placeholder="eg. AB" 
                                                required 
                                                data-required-msg="required"
                                                style="width: 48%; float: left;" />
                                            <span style="float: left;">-</span> 
                                            <input id="txtNumber" 
                                                name="txtNumber"
                                                class="k-textbox"       
                                                data-bind="value: obj.code,
                                                          events:{change: checkExistingNumber}"
                                                placeholder="eg. 001" 
                                                required data-required-msg="required"
                                                style="width: 48%; float: left;" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12">
                                        <div class="control-group"> 
                                            <label for="fullname">
                                                <span>Name</span> <span style="color:red">*</span>
                                            </label>
                                            <input id="fullname" 
                                                name="fullname" 
                                                class="k-textbox" 
                                                data-bind="value: obj.name" 
                                                placeholder="eg. A168" 
                                                required data-required-msg="required"
                                                style="width: 100%;" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="control-group">
                                            <label for="customerStatus"><span data-bind="text: lang.lang.status"></span> <span style="color:red">*</span></label>
                                            <input id="customerStatus" name="customerStatus" 
                                                data-role="dropdownlist"
                                                data-text-field="name"
                                                data-value-field="id"
                                                data-value-primitive="true" 
                                                data-bind="source: luStatusList, value: obj.status"
                                                data-option-label="(--- Select ---)"
                                                required data-required-msg="required" style="width: 100%;" />
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="control-group">
                                            <label for="registeredDate"><span data-bind="text: lang.lang.register_date"></span> <span style="color:red">*</span></label>
                                            <input id="registeredDate" name="registeredDate" 
                                                data-role="datepicker"
                                                data-bind="value: obj.register_date" 
                                                data-format="dd-MM-yyyy"
                                                data-parse-formats="yyyy-MM-dd" 
                                                placeholder="dd-MM-yyyy" required data-required-msg="required" style="width: 100%;" />
                                        </div>
                                    </div>
                                </div>                      
                            </div>
                            <div class="col-sm-6">
                                <div class="row-fluid">
                                    <div class="span4">
                                        <a data-bind="attr: {href: img1 }" target="_blank">
                                            <img style="width: 100%;" data-bind="attr: { src: img1 }" />
                                        </a>
                                    </div>
                                    <div class="span4">
                                        <a data-bind="attr: {href: img2 }" target="_blank">
                                            <img style="width: 100%;" data-bind="attr: { src: img2 }" />
                                        </a>
                                    </div>
                                    <div class="span4" style="padding-left: 0;">
                                        <a data-bind="attr: {href: img3 }" target="_blank">
                                            <img style="width: 100%;" data-bind="attr: { src: img3 }" />
                                        </a>
                                    </div>
                                </div>
                                <div class="row-fluid">
                                    <div class="span4">
                                        <a data-bind="attr: {href: img4 }" target="_blank">
                                            <img style="width: 100%;" data-bind="attr: { src: img4 }" />
                                        </a>
                                    </div>
                                    <div class="span4">
                                        <a data-bind="attr: {href: img5 }" target="_blank">
                                            <img style="width: 100%;" data-bind="attr: { src: img5 }" />
                                        </a>
                                    </div>
                                    <div class="span4" style="padding-left: 0;">
                                        <a data-bind="attr: {href: img6 }" target="_blank">
                                            <img style="width: 100%;" data-bind="attr: { src: img6 }" />
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="box-generic">
                                <div class="tabsbar tabsbar-1" style="background: #203864 !important; color: #fff;">
                                    <ul class="row-fluid row-merge">
                                        <li class="span2 glyphicons nameplate_alt active">
                                            <a href="#tabInfo" data-toggle="tab"><i></i> <span><span data-bind="text: lang.lang.info"></span></span></a>
                                        </li>
                                        <li class="span2 glyphicons usd">
                                            <a href="#tabAmen" data-toggle="tab"><i></i> <span><span>Amenities
                                            </span></span></a>
                                        </li>
                                        <li class="span2 glyphicons parents">
                                            <a href="#tabSpace" data-toggle="tab"><i></i> <span><span >Space
                                            </span></span></a>
                                        </li>
                                        <li class="span2 glyphicons parents">
                                            <a href="#tabGallery" data-toggle="tab"><i></i> <span><span >Gallery</span></span></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tabInfo">
                                        <div class="row" style="margin-bottom: 15px;">
                                            <div class="col-sm-3 col-sx-12">
                                                <span>Select Area</span>
                                            </div>
                                            <div class="col-sm-3 col-sx-12">
                                                <input data-role="dropdownlist"
                                                   data-option-label="(--- Area ---)"
                                                   data-value-primitive="true"
                                                   data-text-field="name"
                                                   data-value-field="id"
                                                   data-bind="
                                                        value: obj.area_id,
                                                        enabled: haveProperty,
                                                        events: { change: areaChange},
                                                        source: areaDS" 
                                                   style="width: 100%;" />
                                            </div>
                                            <div class="col-sm-3 col-sx-12">
                                                <span>Category</span>
                                            </div>
                                            <div class="col-sm-3 col-sx-12">
                                                <input data-role="dropdownlist"
                                                   data-option-label="(--- Category ---)"
                                                   data-value-primitive="true"
                                                   data-text-field="name"
                                                   data-value-field="id"
                                                   data-bind="
                                                        value: obj.category_id,
                                                        source: categoryDS" 
                                                   style="width: 100%;" />
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom: 15px;">
                                            <div class="col-sm-3 col-sx-12">
                                                <span>Zone</span>
                                            </div>
                                            <div class="col-sm-3 col-sx-12">
                                                <input data-role="dropdownlist"
                                                   data-option-label="(--- Zone ---)"
                                                   data-value-primitive="true"
                                                   data-text-field="name"
                                                   data-value-field="id"
                                                   data-bind="
                                                        value: obj.zone_id,
                                                        enabled: haveArea,
                                                        events: {change: zoneChange}
                                                        source: zoneDS" 
                                                   style="width: 100%;" />
                                            </div>
                                            <div class="col-sm-3 col-sx-12">
                                                <span> Visitor Number</span>
                                            </div>
                                            <div class="col-sm-3 col-sx-12">
                                                <input class="k-textbox" data-bind="value: obj.visitor_number"  style="width: 100%;" />
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom: 15px;">
                                            <div class="col-sm-3 col-sx-12">
                                                <span></span>
                                            </div>
                                            <div class="col-sm-3 col-sx-12">
                                                <input data-role="dropdownlist"
                                                   data-option-label="(--- Sub Zone ---)"
                                                   data-value-primitive="true"
                                                   data-text-field="name"
                                                   data-value-field="id"
                                                   data-bind="
                                                        value: obj.sub_zone_id,
                                                        enabled: haveZone,
                                                        source: subZoneDS" 
                                                   style="width: 100%;" />
                                            </div>
                                            <div class="col-sm-3 col-sx-12">
                                                <span>Total Area</span>
                                            </div>
                                            <div class="col-sm-3 col-sx-12">
                                                <input class="k-textbox" data-bind="value: obj.total_area" placeholder="e.g. 100sqm" style="width: 100%;" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tabAmen">
                                        <div class="row-fluid" style="overflow: hidden;">
                                            <div 
                                                data-role="listview" 
                                                data-bind="source: amenityDS" 
                                                data-template="amenity-template-list"
                                                data-auto-bind="true"
                                                style="border-color: #fff;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tabSpace">
                                        <div class="row-fluid" style="overflow: hidden;">
                                            <div 
                                                data-role="listview"  
                                                data-bind="source: spaceDS" 
                                                data-template="space-template-list"
                                                data-auto-bind="true"
                                                style="border-color: #fff;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tabUti">
                                        Under Construction
                                    </div>
                                    <div class="tab-pane" id="tabGallery">
                                        <div class="row-fluid">
                                            <div class="span4">
                                                <p>Image Link 1</p>
                                                <input type="text" class="k-textbox" style="width: 100%;" data-bind="value: obj.img1" name="">
                                            </div>
                                            <div class="span4">
                                                <p>Image Link 2</p>
                                                <input type="text" class="k-textbox" style="width: 100%;" data-bind="value: obj.img2" name="">
                                            </div>
                                            <div class="span4">
                                                <p>Image Link 3</p>
                                                <input type="text" class="k-textbox" style="width: 100%;" data-bind="value: obj.img3" name="">
                                            </div>
                                        </div>
                                        <div class="row-fluid">
                                            <div class="span4">
                                                <p>Image Link 4</p>
                                                <input type="text" class="k-textbox" style="width: 100%;" data-bind="value: obj.img4" name="">
                                            </div>
                                            <div class="span4">
                                                <p>Image Link 5</p>
                                                <input type="text" class="k-textbox" style="width: 100%;" data-bind="value: obj.img5" name="">
                                            </div>
                                            <div class="span4">
                                                <p>Image Link 6</p>
                                                <input type="text" class="k-textbox" style="width: 100%;" data-bind="value: obj.img6" name="">
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <div class="box-generic bg-action-button">
                            <div id="ntf1" data-role="notification"></div>
                            <div class="row">
                                <div class="col-sm-12" align="right">
                                    <span class="btn-btn" onclick="javascript:window.history.back()" data-bind="click: cancel" ><span data-bind="text: lang.lang.cancel"></span></span>
                                    <span id="saveNew" data-bind="click: save" class="btn-btn" ><span data-bind="text: lang.lang.save"></span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</script>
<!--End Lease Unit-->
<!-- Utility Center -->
<script id="utilityCenter" type="text/x-kendo-template">    
    <div class="container">
        <div class="row" style="margin-top: 30px;">
            <div class="col-xs-12 col-sm-4 col-md-3" >
                <div class="listWrapper" style="border: 1px solid #ddd;">
                    <a href="#/meter" style="width: 100%;clear: both;position: relative;text-align: center;float: none!important;padding: 10px 0;font-weight: bold;" class="btn btn-primary btn-icon glyphicons edit pull-right">Add Meter</a>
                    <div class="innerAll" style="height: 55px;">
                        <div class="widget-search separator bottom" style="padding: 0;">
                            <a class="btn btn-default pull-right" data-bind="click: search"><i class="icon-search"></i></a>
                            <div class="overflow-hidden">
                                <input style="line-height: 26px;" type="search" placeholder="Number or Name..." data-bind="value: searchText, events:{change: search}">
                            </div>
                        </div>
                    </div>
                    <span class="results"><span data-bind="text: meterDS.total"></span> <span data-bind="text: lang.lang.found_search"></span></span>
                    <div class="table table-condensed" id="listContact" style="height: 580px; margin-bottom: 0;"
                         data-role="grid"
                         data-bind="source: meterListDS"
                         data-row-template="meter-list-tmpl"
                         data-columns="[{title: 'Meters'}]"
                         data-selectable=true
                         data-height="475"
                         data-scrollable="{virtual: true}"></div>
                </div>  
            </div>
            <div class="col-xs-12 col-sm-8 col-md-9 ">
                <div class="listWrapper" style="border: 1px solid #ddd;min-height: 652px;width: 100%;">
                    <div class="row-fluid">
                        <div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
                            <i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
                        </div>
                        <div id="example" class="k-content">
                            <div class="clear"></div>
                            <div class="relativeWrap" data-toggle="source-code">
                                <div class="widget widget-tabs widget-tabs-double-2 widget-tabs-gray">
                                    <div class="widget-head" style="background: #203864 !important; color: #fff;">
                                        <ul style="padding-left: 0px;">
                                            <li class="active" style="width: 210px;"><a style="text-transform: capitalize;" href="#tabDownload" data-toggle="tab"><span style="line-height: 23px;"><span data-bind="text: lang.lang.step1">Step 1:</span><b><span  data-bind="text: lang.lang.download_reading_book">Download Reading Book</span></b></span></a></li>
                                            <li style="width: 210px;"><a style="text-transform: capitalize;" href="#tabReading" data-toggle="tab"><span style="line-height: 23px;"><span data-bind="text: lang.lang.step2">Step 2:</span> <b><span data-bind="text: lang.lang.upload_reading_book">Upload Reading Book</span> </b></span></a></li>
                                        </ul>
                                    </div>
                                    <div class="widget-body">
                                        <div class="tab-content">
                                            <div id="tabDownload" style="border: 1px solid #ccc; overflow: hidden; padding: 15px" class="tab-pane active widget-body-regular" >
                                                <h4 class="separator bottom" style="margin-top: 10px;" data-bind="text: lang.lang.please_select_license">Please Select License and Location to download reading book</h4>
                                                <div class="row">
                                                    <a data-bind="click: exportEXCEL">
                                                        <span id="saveClose" class="btn btn-icon btn-success glyphicons download" style="width: 250px!important;">
                                                            <i></i> 
                                                            <span data-bind="text: lang.lang.download_reading_book">Download Reading Book</span>
                                                        </span>
                                                    </a>
                                                    <br>
                                                    <table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs">
                                                        <thead>
                                                            <tr>
                                                                <th style="vertical-align: top;"><span data-bind="text: lang.lang.meter_number">Meter Number</span></th>
                                                                <th style="vertical-align: top;"><span data-bind="text: lang.lang.from_date">From Date</span></th>
                                                                <th style="vertical-align: top;"><span data-bind="text: lang.lang.to_date">To Date</span></th>
                                                                <th style="vertical-align: top;"><span data-bind="text: lang.lang.month_of">Month Of</span></th>
                                                                <th style="vertical-align: top;"><span data-bind="text: lang.lang.previous">Previouse</span></th>
                                                                <th style="vertical-align: top;"><span data-bind="text: lang.lang.current">Current</span></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody 
                                                            data-bind="source: meterRecordDS" 
                                                            data-auto-bind="true" 
                                                            data-role="listview" 
                                                            data-template="reading-template">
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div id="tabReading" style="border: 1px solid #ccc; padding: 15px" class="tab-pane widget-body-regular">
                                                <h4 class="separator bottom" style="margin-top: 10px;" data-bind="text: lang.lang.please_upload_reading_book">Please upload reading book</h4>
                                                <div class="row clear" style="overflow: hidden; ">
                                                    <div class="col-xs-12 col-sm-4">
                                                        <div class="control-group"> 
                                                            <label ><span data-bind="text: lang.lang.month_of">Month Of</span></label>
                                                            <input type="text" 
                                                                style="width: 100%;" 
                                                                data-role="datepicker"
                                                                data-format="MM-yyyy"
                                                                data-start="year" 
                                                                data-depth="year"
                                                                placeholder="Moth of ..." 
                                                                data-bind="value: monthOfUpload,
                                                                        events: {change: monthOfUSelect}" />
                                                        </div>
                                                    </div>                                          
                                                    <div class="col-xs-12 col-sm-4">
                                                        <div class="control-group"> 
                                                            <label ><span data-bind="text: lang.lang.to_date">To Date</span></label>
                                                            <input type="text" 
                                                                style="width: 100%;" 
                                                                data-role="datepicker"
                                                                placeholder="To Date ..." 
                                                                data-bind="value: toDateUpload,
                                                                    events: {change: selectMonthTo}" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div style="margin-top: 20px;" class="fileupload fileupload-new margin-none" data-provides="fileupload" data-bind="visible: MonthTo">
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
                                                        data-template="reading-Error11-template">
                                                    </tbody>
                                                </table>
                                                <div data-bind="visible: existShow" style="overflow: hidden;">
                                                    <p data-bind="text: lang.lang.exist_meter">Exist Meter</p>
                                                    <table  class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs">
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
                                                            data-bind="source: ExistRUpload" 
                                                            data-auto-bind="true" 
                                                            data-role="listview" 
                                                            data-template="reading-Exist-template">
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <br>
                                                <span data-bind="visible: fullCorrect" class="btn btn-icon btn-primary glyphicons ok_2" style="margin-top: 3px;width: 160px!important;"><i></i><span data-bind="click: save" data-bind="text: lang.lang.start_reading">Start Reading</span></span>
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
            <div class="clear"></div>
        </div>
    </div>
</script>
<script id="Meter" type="text/x-kendo-template">
    <div class="container">
        <div class="row-fluid">
            <div class="background">
                <div class="row-fluid">
                    <div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
                        <i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
                    </div>
                    <div id="example" class="k-content">
                        <h2 data-bind="text: lang.lang.meter" >Meter</h2>
                        <div class="hidden-print pull-right">
                            <span class="glyphicons no-js remove_2" 
                                data-bind="click: cancel"><i></i></span>
                        </div>

                        <div class="clear"></div>

                        <!-- Top Part -->
                        <div class="row-fluid">
                            <div class="col-xs-12 col-sm-6 well">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6">
                                        <!-- Group -->
                                        <div class="control-group">                         
                                            <label><span data-bind="text: lang.lang.type">Type</span> <span style="color:red">*</span></label>          
                                            <br>
                                            <select data-role="dropdownlist"
                                               data-value-primitive="true"
                                               data-option-label="(--- Select ---)"
                                               data-text-field="name"
                                               data-value-field="id"
                                               data-bind="
                                                source: typeAR,
                                                value: obj.type"
                                               style="width: 100%;" ></select>
                                        </div>
                                        <!-- // Group END -->
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <!-- Group -->
                                        <div class="control-group">                         
                                            <label><span data-bind="text: lang.lang.multiplier">Multiplier</span></label>           
                                            <br>
                                            <input class="k-textbox"                        
                                                data-bind="value: obj.multiplier"
                                                placeholder="eg. 1" required data-required-msg="required"
                                                style="width: 100%" />
                                        </div>
                                        <!-- // Group END -->       
                                    </div>
                                </div>                              
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6">
                                        <!-- Group -->
                                        <div class="control-group">                         
                                            <label><span data-bind="text: lang.lang.meter_code">Meter Code</span> <span style="color:red">*</span></label>          
                                            <br>
                                            <input class="k-textbox"                        
                                                data-bind="value: obj.number, events: {change: meterNumberChange}"
                                                placeholder="eg. 1" required data-required-msg="required"
                                                style="width: 100%" />
                                        </div>
                                        <!-- // Group END -->   
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <!-- Group -->
                                        <div class="control-group">                         
                                            <label for="txtAbbr"><span data-bind="text: lang.lang.meter_no_digit">Meter No. Digit</span> <span style="color:red">*</span></label>           
                                            <br>
                                            <input class="k-textbox"                        
                                                data-bind="value: obj.number_digit"
                                                placeholder="eg. 1" required data-required-msg="required"
                                                style="width: 100%" />
                                        </div>
                                        <!-- // Group END -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6">
                                        <!-- Group -->
                                        <div class="control-group">                         
                                            <label for="txtAbbr"><span data-bind="text: lang.lang.tariff">Plan</span> <span style="color:red">*</span></label>  
                                            <br>
                                            <input data-role="dropdownlist"
                                               data-option-label="(--- Select ---)"       
                                               data-value-primitive="true"
                                               data-text-field="name"
                                               data-value-field="id"
                                               data-bind="
                                                source: tariffDS, 
                                                value: obj.tariff_id"
                                               style="width: 100%;" />
                                        </div>
                                        <!-- // Group END -->   
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <!-- Group -->
                                        <div class="control-group">                         
                                            <label for="txtAbbr"><span data-bind="text: lang.lang.starting_meter_no">Starting Meter No.</span></label>
                                            <br>
                                            <input class="k-textbox" data-bind="value: obj.starting_number" 
                                                        placeholder="e.g. 0" style="width: 100%;" />
                                        </div>
                                        <!-- // Group END -->   
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6">
                                        <!-- Group -->
                                        <div class="control-group">
                                            <label for="customerStatus"><span data-bind="text: lang.lang.status"></span> <span style="color:red">*</span></label>
                                            <select data-role="dropdownlist"
                                               data-value-primitive="true"
                                               data-text-field="name"
                                               data-value-field="id"
                                               data-bind="
                                                source: selectType,
                                                value: obj.status"
                                               style="width: 100%; " ></select>
                                        </div>              
                                        <!-- // Group END -->
                                        <div class="control-group" data-bind="visible: electricMeter">  
                                            <input type="checkbox" data-bind="checked: chkRe, events: {change : checkRe}">
                                            <label for="registeredDate"><span data-bind="text: lang.lang.reactive_meter"></span></label>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <!-- Group -->
                                        <div class="control-group">
                                            <label for="registeredDate"><span data-bind="text: lang.lang.register_date"></span></label>
                                            <input
                                                data-role="datepicker"
                                                data-bind="value: obj.register_date" 
                                                data-format="dd-MM-yyyy"
                                                placeholder="Register Date" 
                                                style="width: 100%;" />
                                        </div>                  
                                        <!-- // Group END -->
                                    </div>
                                </div>                      
                            </div>
                            <!-- <div class="col-xs-12 col-sm-6">
                                <div class="row-fluid"> 
                                    
                                    <div id="map" class="span12" style="height: 225px;"></div>
                                </div>
                                <div class="separator line bottom"></div>
                                <div class="row-fluid"> 
                                    <div class="col-xs-12 col-sm-6">                                    
                                        
                                        <div class="control-group">
                                            <label for="latitute"><span data-bind="text: lang.lang.latitute"></span> </label>
                                            <div class="input-prepend">
                                                <span class="add-on glyphicons direction"><i></i></span>
                                                <input style="width: 84%;" type="text" class="input-large span12" data-bind="value: obj.latitute, events:{change: loadMap}" placeholder="012345.67897">
                                            </div>
                                        </div>                                  
                        
                                    </div>
                                    <div class="col-xs-12 col-sm-6">    
                            
                                        <div class="control-group">
                                            <label for="longtitute"><span data-bind="text: lang.lang.longtitute"></span> </label>
                                            <div class="input-prepend">
                                                <span class="add-on glyphicons google_maps"><i></i></span>
                                                <input style="width: 84%;" type="text" class="input-large span12" data-bind="value: obj.longtitute, events:{change: loadMap}" placeholder="012345.67897">
                                            </div>                                      
                                        </div>
                                        
                                    </div>                                      
                                </div>
                            </div> -->
                            <div class="col-sm-6">
                                <div class="row-fluid"> 
                                    <!-- Map -->
                                    <div id="map" class="col-xs-12 col-sm-12" style="height: 200px;"></div>
                                </div>
                                <div class="separator line bottom"></div>
                                <div class="row-fluid"> 
                                    <div class="col-xs-12 col-sm-6">
                                        <!-- Group -->
                                        <div class="control-group">
                                            <label for="latitute"><span data-bind="text: lang.lang.latitute"></span> </label>
                                            <div class="input-prepend">
                                                <span style="float: left;" class="add-on glyphicons direction"><i></i></span>
                                                <input style="float: left;  width: 77%; padding: 4px 8px; border: 1px solid #efefef; line-height: 20px; box-shadow: none;" type="text" class="input-large span12" data-bind="value: obj.latitute, events:{change: loadMap}" placeholder="012345.67897">
                                            </div>
                                        </div>                                  
                                        <!-- // Group END -->
                                    </div>  
                                    
                                    <div class="col-xs-12 col-sm-6">    
                                        <!-- Group -->
                                        <div class="control-group">
                                            <label for="longtitute"><span data-bind="text: lang.lang.longtitute"></span> </label>
                                            <div class="input-prepend">
                                                <span style="float: left;" class="add-on glyphicons google_maps"><i></i></span>
                                                <input style="float: left;  width: 77%;  box-shadow: none;padding: 4px 8px; border: 1px solid #efefef; line-height: 20px; box-shadow: none;" type="text" class="input-large span12" data-bind="value: obj.longtitute, events:{change: loadMap}" placeholder="012345.67897">
                                            </div>                                      
                                        </div>
                                        <!-- // Group END -->
                                    </div>                                      
                                </div>
                            </div>
                        </div>

                        <!-- // Bottom Part -->
                        <div class="row-fluid" data-bind="visible: otherINFO">
                            <div class="box-generic">
                                <!-- //Tabs Heading -->
                                <div class="tabsbar tabsbar-1" style="background: #203864 !important; color: #fff;">
                                    <ul class="row-fluid row-merge">
                                        <li class="span2 glyphicons nameplate_alt active">
                                            <a href="#tab1" data-toggle="tab"><i></i> <span data-bind="text: lang.lang.info"></span></a>
                                        </li>
                                        <li class="span2 glyphicons cardio" data-bind="visible: electricMeter">
                                            <a href="#tab2" data-toggle="tab"><i></i> <span data-bind="text: lang.lang.electricity_meter"></span></a>
                                        </li>
                                        <li class="span2 glyphicons compass" data-bind="visible: visibleReMeter">
                                            <a href="#tab3" data-toggle="tab"><i></i> <span data-bind="text: lang.lang.reactive_meter"></span></a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- // Tabs Heading END -->
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab1">
                                        <div class="row">   
                                            <div class="col-xs-12 col-sm-6" style="margin-bottom: 15px;">
                                                <!-- Group -->
                                                <div class="control-group">
                                                    <label for="latitute"><span data-bind="text: lang.lang.location">Location</span> <span style="color:red">*</span></label>
                                                    <div class="input-prepend">
                                                        <input data-role="dropdownlist"
                                                           data-option-label="(--- Select ---)"        
                                                           data-value-primitive="true"
                                                           data-auto-bind="false"
                                                           data-text-field="name"
                                                           data-value-field="id"
                                                           data-bind="
                                                            source: locationDS, 
                                                            value: locationSelect,
                                                            events: {change: onLocationChange}" 
                                                           style="width: 100%;" />
                                                    </div>
                                                </div>
                                                <div class="control-group" >
                                                    <label for="latitute"><span data-bind="text: lang.lang.sub_location">Sub Location</span> <span data-bind="visible: electricMeter" style="color:red"></span></label>
                                                    <div class="input-prepend">
                                                        <input data-role="dropdownlist"
                                                           data-option-label="(--- Select ---)"        
                                                           data-value-primitive="true"
                                                           data-auto-bind="false"
                                                           data-text-field="name"
                                                           data-value-field="id"
                                                           data-bind="
                                                            source: poleDS, 
                                                            value: subLocationSelect,
                                                            events: {change: onSubLocationChange},
                                                            enabled: haveLocation" 
                                                           style="width: 100%;" />
                                                    </div>
                                                </div>
                                                <div class="control-group" >
                                                    <label for="latitute"><span data-bind="text: lang.lang.box">Box</span> <span data-bind="visible: electricMeter" style="color:red"></span></label>
                                                    <div class="input-prepend">
                                                        <input data-role="dropdownlist"
                                                           data-option-label="(--- Select ---)"        
                                                           data-value-primitive="true"
                                                           data-auto-bind="false"
                                                           data-text-field="name"
                                                           data-value-field="id"
                                                           data-bind="
                                                            source: boxDS, 
                                                            value: boxSelect,
                                                            enabled: haveSubLocation" 
                                                           style="width: 100%;" />
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label for="latitute"><span data-bind="text: lang.lang.brand">Brands</span> </label>
                                                    <div class="input-prepend">
                                                        <input data-role="dropdownlist"
                                                           data-option-label="(--- Select ---)" 
                                                           data-value-primitive="true"
                                                           data-auto-bind="false"
                                                           data-text-field="name"
                                                           data-value-field="id"
                                                           data-bind="value: obj.brand_id, source: brandDS" style="width: 100%;" />
                                                    </div>
                                                </div>                                  
                                                <!-- // Group END -->
                                            </div>  
                                            <div class="col-xs-12 col-sm-6">
                                                <!-- Group -->
                                                <div class="control-group">
                                                    <img data-bind="attr: { src: obj.image_url, alt: obj.name, title: obj.name }" width="120px" style="margin-bottom: 15px; border: 1px solid #ddd;">
                                                    <input id="files" name="files"
                                                        type="file"
                                                        data-role="upload"
                                                        data-multiple="false"
                                                        data-show-file-list="false"
                                                        data-bind="events: { 
                                                            select: onSelect
                                                        }">
                                                </div>
                                                <!-- // Group END -->
                                            </div>                                      
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab2">
                                        <div class="row-fluid"> 
                                            <div class="col-xs-12 col-sm-6">
                                                <div class="control-group">
                                                    <label for="latitute"><span data-bind="text: lang.lang.phase">Phase</span> </label>
                                                    <div class="input-prepend">
                                                        <input data-role="dropdownlist"
                                                           data-option-label="(--- Select ---)" 
                                                           data-value-primitive="true"
                                                           data-auto-bind="false"
                                                           data-text-field="name"
                                                           data-value-field="id"
                                                           data-bind="value: phaseSelect, source: phaseDS" style="width: 100%;" />
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label for="latitute"><span data-bind="text: lang.lang.voltage">Voltage</span> </label>
                                                    <div class="input-prepend">
                                                        <input data-role="dropdownlist"
                                                           data-option-label="(--- Select ---)" 
                                                           data-value-primitive="true"
                                                           data-auto-bind="false"
                                                           data-text-field="name"
                                                           data-value-field="id"
                                                           data-bind="value: voltageSelect, source: voltageDS" style="width: 100%;" />
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label for="latitute"><span data-bind="text: lang.lang.ampere">Ampere</span> </label>
                                                    <div class="input-prepend">
                                                        <input data-role="dropdownlist"
                                                           data-option-label="(--- Select ---)" 
                                                           data-value-primitive="true"
                                                           data-auto-bind="false"
                                                           data-text-field="name"
                                                           data-value-field="id"
                                                           data-bind="value: ampereSelect, source: ampereDS" style="width: 100%;" />
                                                    </div>
                                                </div>
                                            </div>                              
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab3" data-bind="visible: visibleReMeter">
                                        <div class="row-fluid"> 
                                            <div class="col-xs-12 col-sm-6">
                                                <!-- Group -->
                                                <div class="control-group">
                                                    <label for="latitute"><span data-bind="text: lang.lang.meter_number">Meter Number</span> </label>
                                                    <div class="input-prepend">
                                                        <input type="text"
                                                            class="k-textbox" 
                                                           data-bind="
                                                            value: objReactive.meter_number,
                                                            attr: {placeholder: objReactive.meter_number},
                                                            enabled: false"
                                                           style="width: 100%;" />
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label for="latitute"><span data-bind="text: lang.lang.startup_number">Startup Number</span> </label>
                                                    <div class="input-prepend">
                                                        <input type="text"
                                                            class="k-textbox" 
                                                           data-bind="
                                                            value: objReactive.starting_no,
                                                            attr: {placeholder: lang.lang.startup_number}"
                                                           style="width: 100%;" />
                                                    </div>
                                                </div>                              
                                                <!-- // Group END -->
                                            </div>                              
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- Form actions -->
                        <div class="box-generic bg-action-button">
                            <div id="ntf1" data-role="notification"></div>
                            <div class="row">
                                <div class="col-sm-3">
                                </div>
                                <div class="col-sm-9" align="right">                                    
                                    <span id="saveClose" data-bind="click: cancel" class="btn-btn"><span data-bind="text: lang.lang.cancel">Cancel</span></span>
                                    <span id="saveNew" class="btn-btn" data-bind="click: save" ><span data-bind="text: lang.lang.save">Save</span></span>       
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
<!-- End Utility-->
<!-- Contract -->
<script id="contractCenter" type="text/x-kendo-template">   
    <div class="container">
        <div class="row" style="margin-top: 30px;">
            <div class="col-xs-12 col-sm-4 col-md-3" >
                <div class="listWrapper" style="border: 1px solid #ddd;">
                    <a href="#/contract" style="width: 100%;clear: both;position: relative;text-align: center;float: none!important;padding: 10px 0;font-weight: bold;" class="btn btn-primary btn-icon glyphicons edit pull-right">Add Contract</a>
                    <div class="innerAll" style="height: 55px;">
                        <div class="widget-search separator bottom" style="padding: 0;">
                            <a class="btn btn-default pull-right" data-bind="click: search"><i class="icon-search"></i></a>
                            <div class="overflow-hidden">
                                <input style="line-height: 26px;" type="search" placeholder="Number or Name..." data-bind="value: searchText, events:{change: search}">
                            </div>
                        </div>
                    </div>
                    <span class="results"><span data-bind="text: contactDS.total"></span> <span data-bind="text: lang.lang.found_search"></span></span>
                    <div class="table table-condensed" id="listContact" style="height: 580px; margin-bottom: 0;"
                         data-role="grid"
                         data-bind="source: contractDS"
                         data-row-template="contract-list-tmpl"
                         data-columns="[{title: 'Lease Units'}]"
                         data-selectable="true"
                         data-height="475"
                         data-auto-bind="true"
                         data-scrollable="{virtual: true}">
                    </div>
                </div>  
            </div>
            <div class="col-xs-12 col-sm-8 col-md-9 ">
                <div class="listWrapper" style="border: 1px solid #ddd;min-height: 652px;width: 50%;">
                    <div class="row" style="margin-bottom: 15px;">
                        <div class="col-xs-12 col-xs-6" style="margin-bottom: 15px;">
                            <button style="width: 100% !important; float: left; margin-right: 8px;" class="btn-btn btn-width-100 btn-center-text btn-md margin" data-bind="click: goLU">Edit Lease Unit
                            </button>
                            <table>
                                <tr>
                                    <td data-bind="text: lang.lang.name"></td>
                                    <td data-bind="text: obj.name"></td>
                                </tr>
                                <tr>
                                    <td data-bind="text: lang.lang.status"></td>
                                    <td data-bind="text: obj.status_detail"></td>
                                </tr>
                                <tr>
                                    <td>Visitor Number</td>
                                    <td data-bind="text: obj.visitor_number"></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</script>
<script id="Contract" type="text/x-kendo-template">
    <style type="text/css"></style>
    <div class="container">
        <div class="row-fluid">
            <div class="background">
                <div class="row-fluid">
                    <div id="example" class="k-content">
                        <h2>Contract</h2>
                        <div class="hidden-print pull-right">
                            <span class="glyphicons no-js remove_2" 
                                data-bind="click: cancel"><i></i></span>
                        </div>
                        <div class="clear"></div>
                        <div class="row-fluid">
                            <div class="col-sm-6 well">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="control-group">
                                            <label for="ddlContactType">
                                                <span>Customer</span> <span style="color:red">*</span>
                                            </label>
                                            <input 
                                                data-role="dropdownlist"
                                                data-auto-bind="true" 
                                                data-value-primitive="true"
                                                data-filter="startswith" 
                                                data-text-field="name" 
                                                data-value-field="id"
                                                data-option-label="Select Customer..."
                                                data-bind="
                                                    value: obj.customer_id,
                                                    source: contactDS"
                                                style="width: 100%; float: left;margin-right: 2%;" 
                                                aria-invalid="true" 
                                                class="k-invalid"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="control-group">
                                            <label for="ddlContactType">
                                                <span data-bind="text: lang.lang.registered_date"></span> <span style="color:red">*</span>
                                            </label>
                                            <input id="issuedDate" name="issuedDate" 
                                                data-role="datepicker"
                                                data-format="dd-MM-yyyy"
                                                data-parse-formats="yyyy-MM-dd"
                                                data-bind="value: obj.issued_date" 
                                                required data-required-msg="required"
                                                style="width:100%;" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12">
                                        <div class="control-group"> 
                                            <label for="fullname">
                                                <span>Name</span> <span style="color:red">*</span>
                                            </label>
                                            <input id="fullname" 
                                                name="fullname" 
                                                class="k-textbox" 
                                                data-bind="value: obj.name" 
                                                required data-required-msg="required"
                                                style="width: 100%;" />
                                        </div>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label for="ddlContactType">
                                        <span>Lease Unit</span> <span style="color:red">*</span>
                                    </label>
                                    <input 
                                       data-role="dropdownlist"
                                       data-value-primitive="true"
                                       data-text-field="name"
                                       data-value-field="id"
                                       data-bind="value: obj.lease_unit_id,
                                                  source: leaseunitDS,
                                                  events: {change: onLeaseUnitChange}"
                                       data-option-label="(--- Select ---)"
                                       required data-required-msg="required" style="width: 100%;" /> 
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12">
                                        <div class="control-group"> 
                                            <label for="fullname">
                                                <span>Memo</span> <span style="color:red">*</span>
                                            </label>
                                            <input id="fullname" 
                                                name="fullname" 
                                                class="k-textbox" 
                                                data-bind="value: obj.memo" 
                                                required data-required-msg="required"
                                                style="width: 100%;" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="control-group">
                                            <label for="ddlContactType">
                                                <span>Start</span> <span style="color:red">*</span>
                                            </label>
                                            <input id="issuedDate" name="issuedDate" 
                                                data-role="datepicker"
                                                data-format="dd-MM-yyyy"
                                                data-parse-formats="yyyy-MM-dd"
                                                data-bind="value: obj.start_date" 
                                                required data-required-msg="required"
                                                style="width:100%;" />
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="control-group">
                                            <label for="ddlContactType">
                                                <span>End</span> <span style="color:red">*</span>
                                            </label>
                                            <input id="issuedDate" name="issuedDate" 
                                                data-role="datepicker"
                                                data-format="dd-MM-yyyy"
                                                data-parse-formats="yyyy-MM-dd"
                                                data-bind="value: obj.end_date" 
                                                required data-required-msg="required"
                                                style="width:100%;" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clear"></div>
                        <!-- // Bottom Tabs -->
                        <div class="row-fluid">
                            <div class="box-generic">
                                <!-- //Tabs Heading -->
                                <div class="tabsbar tabsbar-1">
                                    <ul class="row-fluid row-merge">
                                        <li class="span2 glyphicons nameplate_alt active">
                                            <a href="#Rent" data-toggle="tab"><i></i> <span><span>Rent Price</span></span></a>
                                        </li>        
                                        <li class="span2 glyphicons usd">
                                            <a href="#Other" data-toggle="tab"><i></i> <span><span>Other Service</span></span></a>
                                        </li>
                                        <li class="span2 glyphicons parents">
                                            <a href="#Utility" data-toggle="tab"><i></i> <span><span ></span>Utility</span></a>
                                        </li>             
                                    </ul>
                                </div>
                                <!-- // Tabs Heading END -->
                                <div class="tab-content">
                                    <div class="tab-pane active" id="Rent">
                                        <div class="control-group">
                                            <label for="ddlContactType">
                                                <span>Rent Price</span> <span style="color:red">*</span>
                                            </label>
                                            <input 
                                               data-role="dropdownlist"
                                               data-template="rent_price-list-tmpl"
                                               data-text-field="name"
                                               data-value-primitive="true"
                                               data-value-field="id"
                                               data-bind="value: obj.rent_price_id,
                                                          source: rentDS,
                                                          events: {change: priceChange}"
                                               data-option-label="(----select----)"
                                               required data-required-msg="required" style="width: 100%;" />
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="Other">
                                        <!-- Item List -->
                                        <div data-role="grid" class="costom-grid"
                                             data-column-menu="true"
                                             data-reorderable="true"
                                             data-scrollable="false"
                                             data-resizable="true"
                                             data-editable="true"
                                             data-columns="[
                                                { 
                                                    title:'NO',
                                                    width: '50px', 
                                                    attributes: { style: 'text-align: center;' }, 
                                                    template: function (dataItem) {
                                                        var rowIndex = banhji.Contract.lineDS.indexOf(dataItem)+1;
                                                        return '<i class=icon-trash data-bind=click:removeRow></i>' + ' ' + rowIndex;
                                                    }
                                                },
                                                { 
                                                    field: 'item', 
                                                    title: 'PRODUCTS/SERVICES', 
                                                    editor: itemEditor, 
                                                    template: '#=item.name#', 
                                                    width: '170px' 
                                                },
                                                { 
                                                    field: 'description', title:'DESCRIPTION', 
                                                    hidden: true,
                                                    width: '250px' 
                                                },                            
                                                {
                                                    field: 'quantity',
                                                    title: 'QTY',
                                                    format: '{0:n}',
                                                    editor: numberTextboxEditor,
                                                    width: '120px',
                                                    attributes: { style: 'text-align: right;' }
                                                },
                                                { 
                                                    field: 'measurement', 
                                                    title: 'UOM', 
                                                    editor: measurementEditor, 
                                                    template: '#=measurement?measurement.measurement:banhji.emptyString#', 
                                                    width: '80px' 
                                                },
                                                {
                                                    field: 'price',
                                                    title: 'PRICE',
                                                    hidden: true,
                                                    format: '{0:n}',
                                                    editor: numberTextboxEditor,
                                                    width: '120px',
                                                    attributes: { style: 'text-align: right;' }
                                                },
                                                {
                                                    field: 'discount',
                                                    title: 'DISCOUNT VALUE',
                                                    hidden: true,
                                                    format: '{0:n}',
                                                    editor: numberTextboxEditor,
                                                    width: '120px',
                                                    attributes: { style: 'text-align: right;' }
                                                },
                                                {
                                                    field: 'discount_percentage',
                                                    title: 'DISCOUNT %',
                                                    hidden: true,
                                                    format: '{0:p}',
                                                    editor: discountEditor,
                                                    width: '120px',
                                                    attributes: { style: 'text-align: right;' }
                                                },
                                                { 
                                                    field: 'amount', 
                                                    title:'AMOUNT', 
                                                    format: '{0:n}', 
                                                    editable: 'false', 
                                                    attributes: { style: 'text-align: right;' }, 
                                                    width: '120px' 
                                                },
                                                { 
                                                    field: 'tax_item', 
                                                    title:'TAX',
                                                    hidden: true,
                                                    editor: taxForSaleEditor, 
                                                    template: '#=tax_item.name#', width: '90px' 
                                                },
                                                { 
                                                    field: 'reference_no', title:'REFERENCE NO.', 
                                                    hidden: true, width: '120px' 
                                                }
                                             ]"
                                             data-auto-bind="false"
                                             data-bind="source: lineDS" > 
                                        </div>
                                        <button class="btn btn-inverse" data-bind="click: addRow">
                                            <i class="icon-plus icon-white"></i> Add
                                        </button>
                                    </div>
                                    <div class="tab-pane" id="Utility">
                                        <div class="control-group">
                                            <label for="ddlContactType">
                                                <span>Water Meter</span> <span style="color:red">*</span>
                                            </label>
                                            <input 
                                                data-role="dropdownlist"
                                                data-auto-bind="false" 
                                                data-value-primitive="true" 
                                                data-filter="startswith" 
                                                data-text-field="number" 
                                                data-value-field="id"
                                                data-option-label="Select Water Meter..."
                                                data-bind="
                                                    value: obj.water_meter_id,
                                                    source: waterMeterDS"
                                                style="width: 100%; float: left;margin-right: 2%;" 
                                                aria-invalid="true" 
                                                class="k-invalid"
                                            />
                                        </div>
                                        <div class="control-group">
                                            <label for="ddlContactType">
                                                <span>Eeletricity Meter</span> <span style="color:red">*</span>
                                            </label>
                                            <input 
                                                data-role="dropdownlist"
                                                data-auto-bind="false" 
                                                data-value-primitive="true" 
                                                data-filter="startswith" 
                                                data-text-field="number
                                                " 
                                                data-value-field="id"
                                                data-option-label="Select Water Meter..."
                                                data-bind="
                                                    value: obj.electrictiy_meter_id,
                                                    source: eleMeterDS"
                                                style="width: 100%; float: left;margin-right: 2%;" 
                                                aria-invalid="true" 
                                                class="k-invalid"
                                            />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="box-generic bg-action-button">
                                <div id="ntf1" data-role="notification"></div>
                                <div data-role="window"
                                     data-title="Delete Confirmation"
                                     data-width="350"
                                     data-height="200"
                                     data-iframe="true"
                                     data-modal="true"
                                     data-visible="false"
                                     data-position="{top:'40%',left:'35%'}"
                                     data-actions="{}"
                                     data-resizable="false"
                                     data-bind="visible: showConfirm"
                                     style="text-align:center;">
                                    <p style="font-size:25px; margin: 15px 0 25px;" class="delete-message" data-bind="text: confirmMessage"></p>
                                    <button style="font-size:14px; border:none; background:#496cad; color:#fff; padding:5px 25px;" data-bind="click:delete"><span data-bind="text: lang.lang.yes"></span></button> 
                                    <button style="font-size:14px; border:none; background:red; color:#fff; padding:5px 25px;" data-bind="click:closeConfirm"><span data-bind="text: lang.lang.no"></span></button>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                    </div>
                                    <div class="col-sm-9" align="right">
                                        <span class="btn-btn" data-bind="click: openConfirm, visible: isEdit"><span data-bind="text: lang.lang.delete"></span></span>
                                        <span id="saveClose" data-bind="click: cancel" class="btn-btn"><span data-bind="text: lang.lang.cancel">Cancel</span></span>
                                        <span id="saveNew" class="btn-btn" data-bind="click: save" ><span data-bind="text: lang.lang.save">Save</span></span>
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
<!-- Customer -->
<script id="customerCenter" type="text/x-kendo-template">
    <div class="widget widget-heading-simple widget-body-gray widget-employees">        
        <div class="widget-body padding-none">          
            <div class="row-fluid row-merge">
                <div class="span3 listWrapper" >
                    <div class="innerAll">                          
                        <form autocomplete="off" class="form-inline">
                            <a href="#/customer" style="width: 100%;clear: both;position: relative;text-align: center;float: none!important;padding: 10px 0;font-weight: bold;" class="btn btn-primary btn-icon glyphicons edit pull-right">Add Customer</a>
                            <div class="widget-search separator bottom">
                                <button type="button" class="btn btn-default pull-right" data-bind="click: search"><i class="icon-search"></i></button>
                                <div class="overflow-hidden">
                                    <input type="search" placeholder="Number or Name..." data-bind="value: searchText">
                                </div>
                            </div>                      
                            <div class="select2-container" style="width: 100%;  margin-bottom: 10px;">
                                <input data-role="dropdownlist"
                                       data-option-label="Select Type..."
                                       data-value-primitive="true"
                                       data-text-field="name"
                                       data-value-field="id"
                                       data-bind="value: contact_type_id,
                                                  source: contactTypeDS"
                                       style="width: 100%;" />                          
                            </div>
                        </form>                 
                    </div>
                    
                    <span class="results"><span data-bind="text: contactDS.total"></span> <span data-bind="text: lang.lang.found_search"></span></span>

                    <div class="table table-condensed" style="height: 580px;"                        
                         data-role="grid"
                         data-bind="source: contactDS"
                         data-row-template="customerCenter-customer-list-tmpl"
                         data-columns="[{title: ''}]"
                         data-selectable=true
                         data-height="600"                       
                         data-scrollable="{virtual: true}"></div>                                   
                </div>
                <div class="span9 detailsWrapper">
                    <div class="row-fluid">
                        <div class="span6">
                            <div class="widget widget-4 widget-tabs-icons-only margin-bottom-none">

                                <!-- Widget Heading -->
                                <div class="widget-head">
                                    <input type="text" name="" data-bind="value: obj.name" disabled="disabled" style="border: none; width: 69%; font-size: 20px; font-weight: 600; margin-top: -11px; margin-left: 11px; background: #fff;">
                                    <!-- Tabs -->
                                    <ul class="pull-right">

                                        <li class="glyphicons text_bigger active"><span data-toggle="tab" data-target="#tab1-4"><i></i></span>
                                        </li>                                                                               
                                        <li class="glyphicons circle_info"><span data-toggle="tab" data-target="#tab2-4"><i></i></span>
                                        </li>                                       
                                        <li class="glyphicons pen"><span data-toggle="tab" data-target="#tab3-4"><i></i></span>
                                        </li>
                                        <li class="glyphicons paperclip"><span data-toggle="tab" data-target="#tab4-4"><i></i></span>
                                        </li>                                                                               
                                    </ul>
                                    <div class="clearfix"></div>
                                    <!-- // Tabs END -->

                                </div>
                                <!-- Widget Heading END -->

                                <div class="widget-body">
                                    <div class="tab-content">

                                        <!-- Transactions Tab content -->
                                        <div id="tab1-4" class="tab-pane active box-generic">
                                            <table class="table table-borderless table-condensed cart_total cash-table">
                                                <tr>
                                                    <td width="50%">
                                                        <span class="btn btn-block btn-inverse" data-bind="click: goQuote"><span><span data-bind="text: lang.lang.quote"></span></span>
                                                    </td>
                                                    <td width="50%">
                                                        <span class="btn btn-block btn-primary" data-bind="click: goDeposit"><span><span data-bind="text: lang.lang.c_deposit"></span></span>                                                       
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <span class="btn btn-block btn-inverse" data-bind="click: goSaleOrder"><span><span data-bind="text: lang.lang.sale_order"></span></span>
                                                    </td>
                                                    <td>
                                                        <span class="btn btn-block btn-primary" data-bind="click: goCashSale"><span><span data-bind="text: lang.lang.cash_sale"></span></span>                                                                                                              
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <span class="btn btn-block btn-primary" data-bind="click: goSaleReturn"><span data-bind="text: lang.lang.sale_return1"></span></span>
                                                    </td>
                                                    <td>
                                                        <span class="btn btn-block btn-primary" data-bind="click: goInvoice"><span data-bind="text: lang.lang.invoice"></span></span>                                                                                                               
                                                    </td>
                                                </tr>
                                                <tr>                                                    
                                                    <td>
                                                        <span class="btn btn-block btn-inverse" data-bind="click: goGDN"><span data-bind="text:lang.lang.c_gdn"></span></span>
                                                    </td>
                                                    <td class="center">
                                                        <span class="btn btn-block btn-primary" data-bind="click: goCashReceipt"><span data-bind="text: lang.lang.cash_receipt"></span></span>                                                      

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <span class="btn btn-block btn-inverse" data-bind="click: goStatement"><span data-bind="text: lang.lang.statement"></span></span>
                                                    </td>
                                                    <td>
                                                        <span class="btn btn-block btn-primary" data-bind="click: goCashRefound"><span >CASH REFUND</span></span>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <!-- // Transactions Tab content END -->                                                                    

                                        <!-- INFO Tab content -->
                                        <div id="tab2-4" class="tab-pane box-generic" style="float: left; margin-bottom: 0;">
                                            <div class="row-fluid">
                                                <div class="span6" style="padding: 0 15px 0 0;">
                                                    <img class="main-image" data-bind="attr: { src: obj.image_url, alt: obj.name, title: obj.name }" style="border: 1px solid #ddd; height: auto !important;">
                                                </div>
                                                <div class="span6">
                                                    <div class="accounCetner-textedit">
                                                        <table width="100%">
                                                            <tr>
                                                                <td width="40%"><span data-bind="text: lang.lang.customer_type"></span></td>
                                                                <td width="60%">
                                                                    <span class="strong" data-bind="text: obj.contact_type"></span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><span data-bind="text: lang.lang.number"></span></td>
                                                                <td>
                                                                    <span class="strong" data-bind="text: obj.abbr"></span>
                                                                    <span class="strong" data-bind="text: obj.number"></span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><span data-bind="text: lang.lang.name"></span></td>
                                                                <td>
                                                                    <span data-bind="text: obj.name"></span>
                                                                </td>
                                                            </tr>
                                                            <!-- <tr>
                                                                <td><span data-bind="text: lang.lang.billed_address"></span></td>
                                                                <td>
                                                                    <span data-bind="text: obj.address"></span>
                                                                </td>
                                                            </tr> -->                               
                                                            <tr>
                                                                <td><span data-bind="text: lang.lang.phone"></span></td>
                                                                <td>
                                                                    <span data-bind="text: obj.phone"></span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><span data-bind="text: lang.lang.currency"></span></td>
                                                                <td>                                        
                                                                    <span data-bind="text: currencyCode"></span>
                                                                </td>
                                                            </tr>
                                                        </table>

                                                        <span class="btn btn-primary btn-icon glyphicons edit pull-right" data-bind="click: goEdit"><i></i><span data-bind="text: lang.lang.view_edit_profile"></span></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- // INFO Tab content END -->

                                        <!-- NOTE Tab content -->
                                        <div id="tab3-4" class="tab-pane">

                                            <div>
                                                <input type="text" class="k-textbox" 
                                                        data-bind="value: note" 
                                                        placeholder="Add memo ..." 
                                                        style="width: 366px;" />
                                                <span class="btn btn-primary" data-bind="click: saveNote"><span data-bind="text: lang.lang.add"></span></span>
                                            </div>

                                            <br>

                                            <div class="table table-condensed" style="height: 100;"                      
                                                 data-role="grid"
                                                 data-auto-bind="false"                      
                                                 data-bind="source: noteDS"
                                                 data-row-template="customerCenter-note-tmpl"
                                                 data-columns="[{title: ''}]"
                                                 data-height="100"                       
                                                 data-scrollable="{virtual: true}"></div>
                                            
                                        </div>
                                        <!-- // NOTE Tab content END -->

                                        <!-- Attach Tab content -->
                                        <div id="tab4-4" class="tab-pane" >                                         
                                            <p><span data-bind="text: lang.lang.file_type"></span> [PDF, JPG, JPEG, TIFF, PNG, GIF]</p>
                                            <input id="files" name="files"
                                               type="file"
                                               data-role="upload"
                                               data-show-file-list="false"
                                               data-bind="events: { 
                                                    select: onSelect
                                               }">

                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>                            
                                                        <th><span data-bind="text: lang.lang.file_name"></span></th>
                                                        <th><span data-bind="text: lang.lang.description"></span></th>
                                                        <th><span data-bind="text: lang.lang.date"></span></th>
                                                        <th style="width: 13%;"></th>                                           
                                                    </tr> 
                                                </thead>
                                                <tbody data-role="listview" 
                                                        data-template="attachment-list-tmpl" 
                                                        data-auto-bind="false"
                                                        data-bind="source: attachmentDS"></tbody>                   
                                            </table>

                                            <div id="pager" class="k-pager-wrap"
                                                 data-role="pager"
                                                 data-auto-bind="false"
                                                 data-bind="source: attachmentDS"></div>

                                            <span class="btn btn-icon btn-success glyphicons ok_2" data-bind="click: uploadFile" style="color: #fff; padding: 5px 38px; text-align: left; width: 98px !important; display: inline-block; margin-top: 10px;"><i></i> <span data-bind="text: lang.lang.save"></span></span>

                                        </div>
                                        <!-- // Attach Tab content END -->                                                                                  

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="span6" style="margin-bottom: 10px;">
                            <div class="row-fluid">
                                <div class="span6">
                                    <div class="widget-stats widget-stats-primary widget-stats-5" data-bind="click: loadBalance" style="cursor: pointer; background: #0077c5">
                                        <span class="glyphicons coins"><i></i></span>
                                        <span class="txt" style="padding-right: 18px;"><span data-bind="text: lang.lang.balance"></span><span data-bind="text: balance" style="font-size:medium;"></span></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="span6">
                                    <div class="widget-stats widget-stats-inverse widget-stats-5" data-bind="click: loadDeposit" style="cursor: pointer; ">
                                        <span class="glyphicons briefcase"><i></i></span>
                                        <span class="txt"><span data-bind="text: lang.lang.deposit"></span><span data-bind="text: deposit" style="font-size:medium;"></span></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>                          
                            
                            <div class="row-fluid">
                                <div class="span6">
                                    <div class="widget-stats widget-stats-info widget-stats-5" data-bind="click: loadBalance" style="cursor: pointer; background: #21abf6;">
                                        <span class="glyphicons circle_exclamation_mark"><i></i></span>
                                        <span class="txt"><span data-bind="text: outInvoice"></span> <span data-bind="text: lang.lang.open_invoice"></span></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="span6">
                                    <div class="widget-stats widget-stats-default widget-stats-5" data-bind="click: loadOverInvoice" style="cursor: pointer;"> 
                                        <span class="glyphicons turtle"><i></i></span>
                                        <span class="txt"><span data-bind="text: overInvoice"></span> <span data-bind="text: lang.lang.over_due"></span></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>                                                      
                        </div>
                    </div>
                    
                    <div>
                        <input data-role="dropdownlist"
                               class="sorter"                  
                               data-value-primitive="true"
                               data-text-field="text"
                               data-value-field="value"
                               data-bind="value: sorter,
                                          source: sortList,                              
                                          events: { change: sorterChanges }" />

                        <input data-role="datepicker"
                               class="sdate"
                               data-format="dd-MM-yyyy"
                               data-bind="value: sdate,
                                          max: edate"
                               placeholder="From ..." >

                        <input data-role="datepicker"
                               class="edate"
                               data-format="dd-MM-yyyy"
                               data-bind="value: edate,
                                          min: sdate"
                               placeholder="To ..." >

                        <button type="button" data-role="button" data-bind="click: searchTransaction"><i class="icon-search"></i></button>
                    </div>

                    <table class="table table-bordered table-striped table-white">
                        <thead>
                            <tr>
                                <th><span data-bind="text: lang.lang.date"></span></th>
                                <th><span data-bind="text: lang.lang.type"></span></th>                             
                                <th><span data-bind="text: lang.lang.reference_no"></span></th>
                                <th><span data-bind="text: lang.lang.amount"></span></th>
                                <th><span data-bind="text: lang.lang.status"></span></th>
                                <th><span data-bind="text: lang.lang.action"></span></th>
                            </tr>
                        </thead>
                        <tbody data-role="listview"
                                data-auto-bind="false"
                                data-template="customerCenter-transaction-tmpl"
                                data-bind="source: transactionDS" >
                        </tbody>
                    </table>

                    <div id="pager" class="k-pager-wrap"
                         data-role="pager"
                         data-auto-bind="false"
                         data-bind="source: transactionDS"></div>                   
                </div>
            </div>          
        </div>
    </div>      
</script> 
<script id="customer" type="text/x-kendo-template">
    <div id="slide-form">
        <div class="customer-background">
            <div class="container-960">                 
                <div id="example" class="k-content">                    
                
                    <span class="glyphicons no-js remove_2 pull-right" 
                        onclick="javascript:window.history.back()"
                        data-bind="click: cancel"><i></i></span>                        
                    
                    <h2 span data-bind="text: lang.lang.customers"></h2>                           

                    <br>

                    <!-- Top Part -->
                    <div class="row-fluid">
                        <div class="span6 well">                                    
                            <div class="row">
                                <div class="span6">                                                     
                                    <!-- Group -->
                                    <div class="control-group">                                     
                                        <label for="ddlContactType"><span data-bind="text: lang.lang.customer_type"></span> <span style="color:red">*</span></label>
                                        <input id="ddlContactType" name="ddlContactType"
                                                   data-role="dropdownlist"
                                                   data-header-template="customer-type-header-tmpl"       
                                                   data-value-primitive="true"
                                                   data-text-field="name"
                                                   data-value-field="id"
                                                   data-bind="value: obj.contact_type_id,
                                                              disabled: obj.is_pattern,
                                                              source: contactTypeDS,
                                                              events:{change: typeChanges}"
                                                   data-option-label="(--- Select ---)"
                                                   required data-required-msg="required" style="width: 100%;" />                                                                                            
                                    </div>
                                    <!-- // Group END -->
                                </div>

                                <div class="span6" style="padding-right: 0;">   
                                    <!-- Group -->
                                    <div class="control-group">                         
                                        <label for="txtAbbr"><span data-bind="text: lang.lang.number"></span> <span style="color:red">*</span></label>                                      
                                        <br>
                                        <input id="txtAbbr" name="txtAbbr" class="k-textbox"
                                                data-bind="value: obj.abbr, 
                                                           disabled: obj.is_pattern" 
                                                placeholder="eg. AB" required data-required-msg="required"
                                                style="width: 55px;" />
                                        -                                       
                                        <input id="txtNumber" name="txtNumber"
                                               class="k-textbox"                                                                                   
                                               data-bind="value: obj.number, 
                                                          disabled: obj.is_pattern,
                                                          events:{change:checkExistingNumber}"
                                               placeholder="eg. 001" required data-required-msg="required"
                                               style="width: 143px;" />
                                    </div>
                                    <!-- // Group END -->                                           
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="span12">    
                                    <!-- Group -->
                                    <div class="control-group">                             
                                        <label for="fullname"><span data-bind="text: lang.lang.full_name"></span> <span style="color:red">*</span></label>
                                        <input id="fullname" name="fullname" class="k-textbox" 
                                                data-bind="value: obj.name, 
                                                            disabled: obj.is_pattern,
                                                            attr: { placeholder: phFullname }" 
                                                required data-required-msg="required"
                                                style="width: 100%;" />
                                    </div>                                                                      
                                    <!-- // Group END -->
                                </div>
                            </div>

                            <div class="row">
                                <div class="span6"> 
                                    <!-- Group -->
                                    <div class="control-group">                             
                                        <label for="customerStatus"><span data-bind="text: lang.lang.status"></span> <span style="color:red">*</span></label>
                                        <input id="customerStatus" name="customerStatus" 
                                                data-role="dropdownlist"
                                                data-text-field="name"
                                                data-value-field="id"
                                                data-value-primitive="true" 
                                                data-bind="source: statusList, value: obj.status"
                                                data-option-label="(--- Select ---)"
                                                required data-required-msg="required" style="width: 100%;" />
                                    </div>                                                                      
                                    <!-- // Group END -->
                                </div>

                                <div class="span6"> 
                                    <!-- Group -->
                                    <div class="control-group">                             
                                        <label for="registeredDate"><span data-bind="text: lang.lang.register_date"></span> <span style="color:red">*</span></label>
                                        <input id="registeredDate" name="registeredDate" 
                                                    data-role="datepicker"
                                                    data-bind="value: obj.registered_date, disabled: obj.is_pattern" 
                                                    data-format="dd-MM-yyyy"
                                                    data-parse-formats="yyyy-MM-dd" 
                                                    placeholder="dd-MM-yyyy" required data-required-msg="required" style="width: 100%;" />
                                    </div>                                                                      
                                    <!-- // Group END -->
                                </div>
                            </div>                                                                                  
                        </div>
                        <div class="span6">
                            <div class="row-fluid"> 
                                <!-- Map -->
                                <div id="map" class="span12" style="height: 130px;"></div>
                            </div>

                            <div class="separator line bottom"></div>

                            <div class="row-fluid"> 
                                <div class="span6">                                 
                                    <!-- Group -->
                                    <div class="control-group">
                                        <label for="latitute"><span data-bind="text: lang.lang.latitute"></span> </label>
                                        <div class="input-prepend">
                                            <span class="add-on glyphicons direction"><i></i></span>
                                            <input type="text" class="input-large span12" data-bind="value: obj.latitute, events:{change: loadMap}" placeholder="012345.67897">
                                        </div>
                                    </div>                                  
                                    <!-- // Group END -->
                                </div>  
                                
                                <div class="span6"> 
                                    <!-- Group -->
                                    <div class="control-group">
                                        <label for="longtitute"><span data-bind="text: lang.lang.longtitute"></span> </label>
                                        <div class="input-prepend">
                                            <span class="add-on glyphicons google_maps"><i></i></span>
                                            <input type="text" class="input-large span12" data-bind="value: obj.longtitute, events:{change: loadMap}" placeholder="012345.67897">
                                        </div>                                      
                                    </div>
                                    <!-- // Group END -->
                                </div>                                      
                            </div>
                        </div>
                    </div>                              
                            
                    <!-- // Bottom Tabs -->
                    <div class="row-fluid">
                        <div class="box-generic">
                            <!-- //Tabs Heading -->
                            <div class="tabsbar tabsbar-1">
                                <ul class="row-fluid row-merge">
                                    <li class="span2 glyphicons nameplate_alt active">
                                        <a href="#tab1" data-toggle="tab"><i></i> <span><span data-bind="text: lang.lang.info"></span></span></a>
                                    </li>                                           
                                    <li class="span2 glyphicons usd">
                                        <a href="#tab2" data-toggle="tab"><i></i> <span><span data-bind="text: lang.lang.account"></span></span></a>
                                    </li>
                                    <li class="span2 glyphicons parents">
                                        <a href="#tab3" data-toggle="tab"><i></i> <span><span ></span>Contact</span></a>
                                    </li>
                                    <li class="span2 glyphicons notes">
                                        <a href="#tab4" data-toggle="tab"><i></i> <span>Invoice Note</span></a>
                                    </li>   
                                    <li class="span2 glyphicons picture">
                                        <a href="#tab5" data-toggle="tab"><i></i> <span>Images</span></a>
                                    </li>                                                                   
                                </ul>
                            </div>
                            <!-- // Tabs Heading END -->

                            <div class="tab-content">

                                <!-- //GENERAL INFO -->
                                <div class="tab-pane active" id="tab1">
                                    <table class="table table-borderless table-condensed cart_total">                                       
                                        <tr>
                                            <td>Gender</td>
                                            <td>
                                                <input data-role="dropdownlist"
                                                    data-bind="source: genders, value: obj.gender" 
                                                    style="width: 100%;" />
                                            </td>
                                            <td>Date Of Birth</td>
                                            <td>
                                                <input data-role="datepicker"
                                                    data-bind="value: obj.dob" 
                                                    data-format="dd-MM-yyyy"
                                                    data-parse-formats="yyyy-MM-dd" 
                                                    placeholder="dd-MM-yyyy" style="width: 100%;" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span data-bind="text: lang.lang.vat_no"></span></td>
                                            <td>
                                                <input class="k-textbox" data-bind="value: obj.vat_no" 
                                                    placeholder="e.g. 01234567897" style="width: 100%;" />
                                            </td>
                                            <td><span data-bind="text: lang.lang.phone"></span></td>
                                            <td><input class="k-textbox" data-bind="value: obj.phone" placeholder="e.g. 012 333 444" style="width: 100%;" /></td>
                                        </tr>
                                        <tr>
                                            <td><span data-bind="text: lang.lang.country"></span></td>
                                            <td>
                                                <input data-role="dropdownlist"
                                                       data-option-label="(--- Select ---)"
                                                       data-value-primitive="true"
                                                       data-text-field="name"
                                                       data-value-field="id"
                                                       data-bind="value: obj.country_id,
                                                                  source: countryDS" style="width: 100%;" />
                                            </td>                                                                                       
                                            <td><span data-bind="text: lang.lang.email"></span></td>
                                            <td><input class="k-textbox" data-bind="value: obj.email" placeholder="e.g. me@email.com" style="width: 100%;" />                                           
                                        </tr>
                                        <tr>
                                            <td><span data-bind="text: lang.lang.city"></span></td>
                                            <td><input class="k-textbox" data-bind="value: obj.city" placeholder="city name ..." style="width: 100%;" /></td>                                           
                                            <td><span data-bind="text: lang.lang.post_code"></span></td>
                                            <td><input class="k-textbox" data-bind="value: obj.post_code" placeholder="e.g. 12345" style="width: 100%;" /></td>
                                        </tr>                                       
                                        <tr style="vertical-align: top;">
                                            <td><span data-bind="text: lang.lang.address"></span></td>
                                            <td><textarea class="k-textbox" data-bind="value: obj.address" placeholder="where you live ..." style="width: 100%;" /></textarea></td>                                                                                             
                                            <td><span data-bind="text: lang.lang.memo"></span></td>
                                            <td><textarea rows="2" class="k-textbox" data-bind="value: obj.memo" placeholder="memo ..." style="width: 100%;" ></textarea></td>                                          
                                        </tr>                                               
                                        <tr  style="vertical-align: top;">
                                            <td>
                                                <span for="txtBillTo" data-bind="click: copyBillTo"><span data-bind="text: lang.lang.bill_to"></span> </span>                                                       
                                            </td>
                                            <td>
                                                <textarea rows="2" class="k-textbox" style="width:100%" data-bind="value: obj.bill_to" placeholder="billed to ..."></textarea>
                                            </td>
                                            <td><span data-bind="text: lang.lang.delivered_to"></span></td>
                                            <td>
                                                <textarea rows="2" class="k-textbox" style="width:100%" data-bind="value: obj.ship_to" placeholder="delivered to ..."></textarea>
                                            </td>
                                        </tr>                                                                                                                                                                                                                                       
                                    </table>
                                </div>
                                <!-- //GENERAL INFO END -->

                                <!-- //ACCOUNTING -->
                                <div class="tab-pane" id="tab2">
                                    <div class="row-fluid">                                             
                                        <div class="span3">
                                            <label for="ddlAR"><span data-bind="text: lang.lang.account_receiveable"></span> <span style="color:red">*</span></label>
                                            <input id="ddlAR" name="ddlAR"
                                                   data-role="dropdownlist"
                                                   data-header-template="account-header-tmpl"
                                                   data-template="account-list-tmpl"      
                                                   data-value-primitive="true"
                                                   data-text-field="name"
                                                   data-value-field="id"
                                                   data-bind="value: obj.account_id,
                                                              source: arDS"
                                                   data-option-label="(--- Select ---)"
                                                   required data-required-msg="required" style="width: 100%;" />                                                    
                                        </div>
                                        <div class="span3">
                                            <label for="ddlRA"><span data-bind="text: lang.lang.revenue_account"></span> <span style="color:red">*</span></label>
                                            <input id="ddlRA" name="ddlRA"
                                                   data-role="dropdownlist"
                                                   data-header-template="account-header-tmpl"
                                                   data-template="account-list-tmpl" 
                                                   data-value-primitive="true"
                                                   data-text-field="name"
                                                   data-value-field="id"
                                                   data-bind="value: obj.ra_id,
                                                              source: raDS"
                                                   data-option-label="(--- Select ---)"
                                                   required data-required-msg="required" style="width: 100%;" />                                                    
                                        </div>
                                        <div class="span3">
                                            <label for="ddlDepositAccount"><span data-bind="text: lang.lang.deposit_account"></span> <span style="color:red">*</span></label>
                                            <input id="ddlDepositAccount" name="ddlDepositAccount"
                                                   data-role="dropdownlist"
                                                   data-header-template="account-header-tmpl"
                                                   data-template="account-list-tmpl"      
                                                   data-value-primitive="true"
                                                   data-text-field="name"
                                                   data-value-field="id"
                                                   data-bind="value: obj.deposit_account_id,
                                                              source: depositDS"
                                                   data-option-label="(--- Select ---)"
                                                   required data-required-msg="required" style="width: 100%;" />                                                    
                                        </div>
                                        <div class="span3">
                                            <label for="ddlTradeDiscount"><span data-bind="text: lang.lang.trade_discount"></span> <span style="color:red">*</span></label>
                                            <input id="ddlTradeDiscount" name="ddlTradeDiscount"
                                                   data-role="dropdownlist"
                                                   data-header-template="account-header-tmpl"
                                                   data-template="account-list-tmpl"      
                                                   data-value-primitive="true"
                                                   data-text-field="name"
                                                   data-value-field="id"
                                                   data-bind="value: obj.trade_discount_id,
                                                              source: tradeDiscountDS"
                                                   data-option-label="(--- Select ---)"
                                                   required data-required-msg="required" style="width: 100%;" />                                                        
                                        </div>                                              
                                    </div>

                                    <div class="separator line bottom"></div>

                                    <div class="row-fluid">
                                        <div class="span3">                     
                                            <label for="currency"><span data-bind="text: lang.lang.currency"></span> <span style="color:red">*</span></label>
                                            <input id="currency" name="currency" 
                                                data-role="dropdownlist"
                                                data-template="currency-list-tmpl"
                                                data-value-primitive="true"
                                                data-text-field="code"
                                                data-value-field="locale"
                                                data-bind="value: obj.locale,
                                                            disabled: isProtected, 
                                                            source: currencyDS"
                                                data-option-label="(--- Select ---)" 
                                                required data-required-msg="required" style="width: 100%;" />
                                        </div>
                                        <div class="span3">
                                            <label for="ddlPaymentTerm"><span data-bind="text: lang.lang.payment_term"></span></label>
                                            <input id="ddlPaymentTerm" name="ddlPaymentTerm"
                                                data-header-template="customer-term-header-tmpl"
                                                data-role="dropdownlist"
                                                data-value-primitive="true"
                                                data-text-field="name"
                                                data-value-field="id"
                                                data-bind="value: obj.payment_term_id, source: paymentTermDS" 
                                                data-option-label="(--- Select ---)"
                                                style="width: 100%;" />
                                        </div>
                                        <div class="span3">
                                            <label for="ddlPaymentMethod"><span data-bind="text: lang.lang.payment_method"></span></label>
                                            <input id="ddlPaymentMethod" name="ddlPaymentMethod"
                                                data-header-template="customer-payment-method-header-tmpl"
                                                data-role="dropdownlist"
                                                data-value-primitive="true"
                                                data-text-field="name"
                                                data-value-field="id"
                                                data-bind="value: obj.payment_method_id, source: paymentMethodDS"
                                                data-option-label="(--- Select ---)" 
                                                style="width: 100%;" />
                                        </div>
                                        <div class="span3">
                                            <label for="ddlSettlementDiscount"><span data-bind="text: lang.lang.settlement_discount"></span> <span style="color:red">*</span></label>
                                            <input id="ddlSettlementDiscount" name="ddlSettlementDiscount"
                                                   data-role="dropdownlist"
                                                   data-header-template="account-header-tmpl"
                                                   data-template="account-list-tmpl"      
                                                   data-value-primitive="true"
                                                   data-text-field="name"
                                                   data-value-field="id"
                                                   data-bind="value: obj.settlement_discount_id,
                                                              source: settlementDiscountDS"
                                                   data-option-label="(--- Select ---)"
                                                   required data-required-msg="required" style="width: 100%;" />                                                        
                                        </div>                                              
                                    </div>

                                    <div class="separator line bottom"></div>

                                    <div class="row-fluid">
                                        <div class="span3">
                                            <label for="ddlTaxItem"><span data-bind="text: lang.lang.tax"></span></label>
                                            <input id="ddlTaxItem" name="ddlTaxItem"
                                                   data-role="dropdownlist"                             
                                                   data-header-template="tax-header-tmpl"
                                                   data-value-primitive="true"
                                                   data-text-field="name"
                                                   data-value-field="id"
                                                   data-bind="value: obj.tax_item_id,
                                                              source: taxItemDS"
                                                   data-option-label="(--- Select ---)"
                                                   style="width: 100%;" />
                                        </div>  
                                        <div class="span3">
                                            <label for="txtCreditLimit"><span data-bind="text: lang.lang.credit_limit"></span> </label>                                                 
                                            <input data-role="numerictextbox"
                                                   data-format="n"
                                                   data-min="0"                                                        
                                                   data-bind="value: obj.credit_limit"                                                        
                                                   style="width: 100%;">
                                        </div>                                                                                          
                                    </div>
                                </div>
                                <!-- //ACCOUNTING END -->                              

                                <!-- //CONTACT PERSON -->
                                <div class="tab-pane" id="tab3">
                                    <span style="margin-bottom: 15px;" class="btn btn-primary btn-icon glyphicons circle_plus" data-bind="click: addEmptyContactPerson"><i></i><span data-bind="text: lang.lang.new_contact_person"></span></span>

                                    <table class="table table-bordered table-white">
                                        <thead>
                                            <tr>
                                                <th><span data-bind="text: lang.lang.name"></span></th>
                                                <th><span data-bind="text: lang.lang.department"></span></th>                                       
                                                <th><span data-bind="text: lang.lang.phone"></span></th>
                                                <th><span data-bind="text: lang.lang.email"></span></th>
                                                <th width="20px"></th>                                                     
                                            </tr>
                                        </thead>
                                        <tbody data-role="listview"                                                     
                                                data-auto-bind="false"                                                                                       
                                                data-template="contact-person-row-tmpl" 
                                                data-bind="source: contactPersonDS">
                                        </tbody>                                                                                
                                    </table>
                                </div>
                                <!-- //CONTACT PERSON END -->

                                <!-- //INVOICE NOTE -->
                                <div class="tab-pane" id="tab4">
                                    <textarea data-role="editor"
                                          data-tools="['bold',
                                                       'italic',
                                                       'underline',
                                                       'strikethrough',
                                                       'justifyLeft',
                                                       'justifyCenter',
                                                       'justifyRight',
                                                       'justifyFull']"
                                          data-bind="value: obj.invoice_note"
                                          style="height: 200px;"></textarea>
                                </div>
                                <!-- //INVOICE NOTE END -->

                                <!-- //IMAGE -->
                                <div class="tab-pane" id="tab5">
                                    <div class="row">   
                                        <div class="span12">
                                            <img width="120px" data-bind="attr: { src: obj.image_url }" style="margin-bottom: 15px; border: 1px solid #ddd;">
                                                    
                                                    <input id="files" name="files"
                                                        type="file"
                                                        data-role="upload"
                                                        data-multiple="false"
                                                        data-show-file-list="false"
                                                        data-bind="events: { 
                                                            select: onSelect
                                                        }">
                                        </div>
                                    </div>
                                </div>
                                <!-- //IMAGE END -->

                            </div>
                        </div>
                    </div>

                    <br>                                            
                    
                    <!-- Form actions -->
                    <div class="box-generic bg-action-button">
                        <div id="ntf1" data-role="notification"></div>

                        <!-- Delete Confirmation -->
                        <div data-role="window"
                             data-title="Delete Confirmation"
                             data-width="350"
                             data-height="200"
                             data-iframe="true"
                             data-modal="true"
                             data-visible="false"
                             data-position="{top:'40%',left:'35%'}"
                             data-actions="{}"
                             data-resizable="false"
                             data-bind="visible: showConfirm"
                             style="text-align:center;">
                            <p style="font-size:25px; margin: 15px 0 25px;" class="delete-message" data-bind="text: confirmMessage"></p>
                            <button style="font-size:14px; border:none; background:#496cad; color:#fff; padding:5px 25px;" data-bind="click:delete">Yes</button> 
                            <button style="font-size:14px; border:none; background:red; color:#fff; padding:5px 25px;" data-bind="click:closeConfirm">No</button>
                        </div>
                        <div class="row">
                            <div class="span4" style="padding-left: 15px;"><a style="color: #fff; float: left;">Print Preview</a></div>
                            <div class="span8" align="right">
                                <span class="btn-btn" onclick="javascript:window.history.back()" data-bind="click: cancel"><i></i> <span data-bind="text: lang.lang.cancel"></span></span>
                                <span class="btn-btn" data-bind="click: openConfirm, visible: isEdit"><span data-bind="text: lang.lang.delete"></span></span>
                                <span role='presentation' class='dropdown btn-btn' style="padding: 0 0 0 15px; float: right; height: 32px; line-height: 30px;">
                                    <a style="color: #fff; padding: 0;" class='dropdown-toggle glyphicons' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'>
                                        <span data-bind="text: lang.lang.save_option"></span>
                                        <span class="small-btn"><i class='caret '></i></span>
                                    </a>
                                    <ul class='dropdown-menu'>
                                        <li id="saveNew" data-bind="invisible: isEdit"><span data-bind="text: lang.lang.save_new"></span></li>
                                        <!-- <li id="savePrint"><span data-bind="text: lang.lang.save_print"></span></li> -->
                                    </ul>
                                </span>
                                <span class="btn-btn" id="saveClose"><span data-bind="text: lang.lang.save_close"></span></span>
                                <span class="btn-btn" id="saveDraft"><span data-bind="text: lang.lang.save_draft"></span></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</script>
<!-- Bill -->
<script id="runBill" type="text/x-kendo-template">
    <div class="container">
        <div class="row-fluid">
            <div class="background">
                <div class="row-fluid">
                    <div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
                        <i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
                    </div>
                    <div id="example" class="k-content">
                        <h2 data-bind="text: lang.lang.run_bill"></h2>
                        <div class="hidden-print pull-right">
                            <span class="glyphicons no-js remove_2" 
                                data-bind="click: cancel"><i></i></span>
                        </div>
                        <div class="clear"></div>

                        <div class="row" style="clear:both;">
                            <div class="col-sx-12 col-sm-2">
                                <!-- Group -->
                                <div class="control-group">                             
                                    <label ><span data-bind="text: lang.lang.month_of">Month Of</span></label>
                                    <input type="text" 
                                        style="width: 100%;" 
                                        data-role="datepicker"
                                        data-format="MM-yyyy"
                                        data-start="year" 
                                        data-depth="year" 
                                        placeholder="Moth of ..." 
                                        data-bind="value: monthSelect" />
                                </div>
                                                                                                    
                                    <!-- // Group END -->
                            </div>  
                            <div class="col-sx-12 col-sm-2">
                                <div class="control-group">                             
                                    <label ><span data-bind="text: lang.lang.license">License</span></label>
                                    <input 
                                        data-role="dropdownlist" 
                                        style="width: 100%;" 
                                        data-option-label="Property ..." 
                                        data-auto-bind="true" 
                                        data-value-primitive="true" 
                                        data-text-field="name" 
                                        data-value-field="id" 
                                        data-bind="
                                            value: propertySelect,
                                            source: propertyDS">
                                </div>
                            </div>
                            <div class="col-sx-12 col-sm-1">
                                <div class="control-group"> 
                                    <label ><span data-bind="text: lang.lang.action">Action</span></label>  
                                    <div class="row" style="margin: 0;">                    
                                        <button type="button" data-role="button" data-bind="click: search" class="k-button" role="button" aria-disabled="false" tabindex="0"><i class="icon-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row saleSummaryCustomer" style="margin-top: 15px;">
                            <div class="col-sm-12" >
                                <div class="row">
                                    <div class="col-xs-12 col-sm-4">
                                        <div class="total-customer" style="width: 100%; background: #f4f5f8; padding: 15px; margin-bottom: 15px;">                                          
                                            <p data-bind="text: lang.lang.total_number_of_invoice">Total Number of Invoices</p>
                                            <span data-bind="text: totalOfInv"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-4">
                                        <div class="total-customer" style="width: 100%; background: #f4f5f8; padding: 15px; margin-bottom: 15px;">
                                            <p>m<sup>3</sup>/kWh <span style="font-size: 12px;font-weight: normal;" data-bind="text: lang.lang.sold">Sold</span></p>
                                            <span data-bind="text: meterSold"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-4">
                                        <div class="total-customer" style="width: 100%; background: #f4f5f8; padding: 15px;">                                           
                                            <p data-bind="text: lang.lang.amount">Amount</p>
                                            <span data-bind="text: amountSold"></span>                                          
                                        </div>
                                    </div>
                                </div>
                            </div>                          
                        </div>

                        <div class="row-fluid" style="margin-bottom: 15px">
                            <table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs">
                                <thead>
                                    <tr>
                                        <th align="center" style="text-align: center; vertical-align: top;"><input type="checkbox" data-bind="checked: chkAll, events: {change : checkAll}" /></th>
                                        <th style="vertical-align: top;"><span >Contract</span></th>    
                                        <th style="vertical-align: top;"><span data-bind="text: lang.lang.customer">Customer</span></th>                 
                                        <th style="vertical-align: top;"><span>Meter m3</span></th>
                                        <th style="vertical-align: top;"><span>Meter kwh</span></th>
                                        <th style="vertical-align: top;"><span >Rent</span></th>
                                        <th style="vertical-align: top;"><span data-bind="text: lang.lang.total">Total</span></th>                      
                                    </tr>
                                </thead>
                                <tbody data-role="listview" 
                                        data-template="runbill-row-template" 
                                        data-auto-bind="false" 
                                        data-bind="source: invoiceDS"></tbody>
                                <tfoot data-template="runbill-footer-template" 
                                            data-bind="source: this"></tfoot>               
                            </table>
                            <div id="pager" class="k-pager-wrap"
                                 data-auto-bind="false"
                                 data-role="pager" data-bind="source: invoiceDS"></div>
                        </div>

                        <div class="row" style="margin-bottom: 15px;">
                            <div class="col-xs-12 col-sm-3">
                                <!-- Group -->
                                <div class="control-group">                             
                                    <label ><span data-bind="text: lang.lang.month_of">Month Of</span></label>
                                    <input type="text" 
                                        style="width: 100%;" 
                                        data-role="datepicker"
                                        data-format="MM-yyyy"
                                        data-start="year" 
                                        data-depth="year" 
                                        data-parse-formats="yyyy-MM-dd HH:mm:ss"
                                        placeholder="Moth of ..." 
                                        data-bind="value: FmonthSelect,
                                                events: {change: makeBilled}" />
                                </div>  
                            </div>
                            <div class="col-xs-12 col-sm-3">
                                <div class="control-group">                             
                                    <label ><span data-bind="text: lang.lang.billing_date">Billing Date</span></label>
                                    <input type="text" 
                                        style="width: 100%;" 
                                        data-role="datepicker"
                                        data-format="dd-MM-yyyy"
                                        placeholder="Bill Date ..." 
                                        data-parse-formats="yyyy-MM-dd HH:mm:ss"
                                        data-bind="value: BillingDate,
                                        events: {change: makeBilled}" />
                                </div>
                            </div>  
                            <div class="col-xs-12 col-sm-3">
                                <div class="control-group">                             
                                    <label ><span data-bind="text: lang.lang.due_date">Due Date</span></label>
                                    <input type="text" 
                                        style="width: 100%;" 
                                        data-role="datepicker"
                                        data-format="dd-MM-yyyy"
                                        placeholder="Due Date ..." 
                                        data-parse-formats="yyyy-MM-dd HH:mm:ss"
                                        data-bind="value: DueDate,
                                        events: {change: makeBilled}" />
                                </div>
                            </div>  
                            <div class="col-xs-12 col-sm-3">
                                <div class="control-group">                             
                                    <label ><span data-bind="text: lang.lang.issue_date">Issue Date</span></label>
                                    <input type="text" 
                                        style="width: 100%;" 
                                        data-role="datepicker"
                                        data-format="dd-MM-yyyy"
                                        data-parse-formats="yyyy-MM-dd HH:mm:ss"
                                        placeholder="Issue Date ..." 
                                        data-bind="value: IssueDate,
                                        events: {change: makeBilled}" />
                                </div>
                            </div>
                        </div>

                        <div class="box-generic bg-action-button">
                            <div id="ntf1" data-role="notification"></div>
                            <div class="row">
                                <div class="span12" align="right">
                                    <span class="btn-btn" data-bind="click: save, visible: showButton" ><i></i> <span data-bind="text: lang.lang.run_bill">Run Bill</span></span>                                   
                                    <span class="btn-btn" data-bind="click: cancel" ><i></i> <span data-bind="text: lang.lang.cancel"></span></span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>          
</script>
<!--Template-->
<!-- General -->
<script id="customer-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
        <a href="<?php echo base_url();?>rrd\#/customer">+ Add New Customer</a></li>
    </strong>
</script>
<script id="contact-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
        <a href="\#/customer">+ Add New Customer</a></li>
    </strong>
</script>
<script id="contact-list-tmpl" type="text/x-kendo-tmpl">
    <span>#=abbr##=number#</span>   
    <span>#=name#</span>    
</script>
<!-- Setting -->
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
<script id="property-setting-template" type="text/x-kendo-tmpl">
    <tr>
        <td>#= number #</td>
        <td>#= name #</td>
        <td>#= abbr #</td>
        <td>#= mobile #</td>
        <td style="text-align: center;">
            #if(status==1){#
                <span class="btn-action glyphicons ok_2 btn-success" title="Active"><i></i> </span>
            #}else if(status==2){#
                <span class="btn-action glyphicons lock btn-danger" title="Void"><i></i> </span>
            #}else{#
                <span class="btn-action glyphicons unlock btn-danger" title="Inactive"><i></i> </span>
            #}#
            <a class="btn-action glyphicons pencil btn-success" title="Edit" href="\#/property/#= id #"><i></i></a>
        </td>
    </tr>
</script>
<script id="area-setting-template" type="text/x-kendo-tmpl">
    <tr>
        <td>#= property_name #</td>
        <td>#= name #</td>
        <td>#= abbr #</td>
        <td align="center">                
            <span style="cursor: pointer;" class="k-edit-button"><i class="icon-edit"></i> <span data-bind="text: lang.lang.edit">Edit</span></span>
            |
            <span style="cursor: pointer;" data-bind="click: viewPole"><i class="icon-view"></i> <span data-bind="text: lang.lang.view_item">View Item</span></span>
            |
            <span style="cursor: pointer;" data-bind="click: showPole"><i class="icon-plus icon-white"></i> <span data-bind="text: lang.lang.add_sub_location">Add Zone</span></span>
        </td> 
    </tr>
</script>
<script id="area-edit-template" type="text/x-kendo-tmpl">
    <tr>
        <td>
            <input data-role="dropdownlist"
                   data-option-label="(--- Select ---)"       
                   data-value-primitive="true"
                   data-text-field="name"
                   data-value-field="id"
                   data-bind="value: property_id,
                              source: propertyDS" />
        </td>
            <td align="center">
    
            <input type="text" class="k-textbox" data-bind="value: name" name="ProductName" required="required" validationMessage="required" />
        </td>
            <td align="center">
            <input type="text" class="k-textbox" data-bind="value: abbr" name="abbr" required="required" validationMessage="required" />
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
            <span style="cursor: pointer;" data-bind="click: showBox"><i class="icon-plus icon-white"></i> <span >Add Sub Zone</span></span>
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
            # if(is_flat == 0){# #: banhji.Setting.lang.lang.not_flat# #}else{# #: banhji.Setting.lang.lang.flat# #}#
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
                   data-value-primitive="false"
                   data-text-field="name"
                   data-auto-bind="true"
                   data-value-field="id"
                   data-bind="value: account,
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
<script id="categorySetting-template" type="text/x-kendo-tmpl">
    <tr>
        <td>#= name #</td>
        <td align="center">
            <a class="btn-action glyphicons pencil btn-success k-edit-button"><i></i></a>
            # if(is_system == 0) {#
                <a data-bind="click: deleteCate" class="btn-action glyphicons remove_2 btn-danger"><i></i></a>
            # } #
        </td>
    </tr>
</script>
<script id="category-edit-template" type="text/x-kendo-tmpl">
    <tr>
        <td align="center">
            <input type="text" class="k-textbox" data-bind="value: name" name="ProductName" required="required" validationMessage="required" />
        </td>
        <td align="center">
            <div class="edit-buttons">
                <a class="k-button k-update-button" href="\\#"><span class="k-icon k-i-check"></span></a>
                <a class="k-button k-cancel-button" href="\\#"><span class="k-icon k-i-cancel"></span></a>
            </div>
        </td>
    </tr>
</script>
<script id="amenSetting-template" type="text/x-kendo-tmpl">
    <tr>
        <td>#= name #</td>
        <td align="center">
            <a class="btn-action glyphicons pencil btn-success k-edit-button"><i></i></a>
            # if(is_system == 0) {#
                <a data-bind="click: deleteAmen" class="btn-action glyphicons remove_2 btn-danger"><i></i></a>
            # } #
        </td>
    </tr>
</script>
<script id="amen-edit-template" type="text/x-kendo-tmpl">
    <tr>
        <td align="center">
            <input type="text" class="k-textbox" data-bind="value: name" name="ProductName" required="required" validationMessage="required" />
        </td>
        <td align="center">
            <div class="edit-buttons">
                <a class="k-button k-update-button" href="\\#"><span class="k-icon k-i-check"></span></a>
                <a class="k-button k-cancel-button" href="\\#"><span class="k-icon k-i-cancel"></span></a>
            </div>
        </td>
    </tr>
</script>
<script id="spaceSetting-template" type="text/x-kendo-tmpl">
    <tr>
        <td>#= name #</td>
        <td align="center">
            <a class="btn-action glyphicons pencil btn-success k-edit-button"><i></i></a>
            # if(is_system == 0) {#
                <a data-bind="click: deleteAmen" class="btn-action glyphicons remove_2 btn-danger"><i></i></a>
            # } #
        </td>
    </tr>
</script>
<script id="space-edit-template" type="text/x-kendo-tmpl">
    <tr>
        <td align="center">
            <input type="text" class="k-textbox" data-bind="value: name" name="ProductName" required="required" validationMessage="required" />
        </td>
        <td align="center">
            <div class="edit-buttons">
                <a class="k-button k-update-button" href="\\#"><span class="k-icon k-i-check"></span></a>
                <a class="k-button k-cancel-button" href="\\#"><span class="k-icon k-i-cancel"></span></a>
            </div>
        </td>
    </tr>
</script>
<script id="tariff-item-template" type="text/x-kendo-tmpl">
    <tr>
        <td>#= name#</td>
        <td align="center">#= usage#</td>
        <td align="right">#= kendo.toString(amount, _currency.locale=="km-KH"?"c0":"c", _currency.locale)#</td>
        <td align="center">
            <span class="k-edit-button"><i class="icon-edit"></i> Edit</span>
        </td>
    </tr>
</script>
<script id="tariff-edit-item-template" type="text/x-kendo-tmpl">
    <tr>
        <td><input style="width: 100%;" type="text" class="k-textbox" data-bind="value:name" /></td>
        <td>
            #if(banhji.Setting.tariffItemDS.indexOf(data) != 0){#
                <input style="width: 100%;" type="text" class="k-textbox" data-bind="value:usage" />
            #}else{# #:usage# #}#
        </td>
        <td><input style="width: 100%;" type="text" class="k-textbox" data-bind="value:amount" /></td>
        <td class="edit-buttons" style="text-align: center;">
            <a class="k-button k-update-button" href="\\#"><span class="k-icon k-i-check"></span></a>
            <a class="k-button k-cancel-button" href="\\#"><span class="k-icon k-i-cancel"></span></a>
        </td>
    </tr>
</script>
<script id="rent-setting-template" type="text/x-kendo-tmpl">
    <tr>
        <td>
            # if(unit == "ls"){#Lump Sum #}else{# m2 #}#
        </td>
        <td>
            #= name#
        </td>
        <td align="center">
            #= _currency.code#
        </td>
        <td align="center" >
            #= account.name#
        </td>
        <td align="right">#= kendo.toString(amount, _currency.locale=="km-KH"?"c0":"c", _currency.locale)#</td>
        <td align="center">                
            <a class="btn-action glyphicons pencil btn-success k-edit-button"><i></i></a>
        </td>           
    </tr>
</script>
<script id="rent-edit-template" type="text/x-kendo-tmpl">
    <tr>                       
        <td>
            <input style="width: 100%;" data-role="dropdownlist"      
                   data-value-primitive="false"
                   data-text-field="name"
                   data-auto-bind="true"
                   data-value-field="id"
                   data-bind="value: unit,
                              source: rentTypeDS" />
        </td>    
        <td>       
            <input style="width: 100%;" type="text" class="k-textbox" data-bind="value:name" />     
            
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
            <input style="width: 100%;" data-role="dropdownlist"      
                   data-value-primitive="false"
                   data-text-field="name"
                   data-value-field="id"
                   data-bind="value: account,
                              source: tariffAccDS" />
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
                   data-bind="value: account,
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
            # if(is_flat == 0){# #: banhji.Setting.lang.lang.not_flat# #}else{# #: banhji.Setting.lang.lang.flat# #}#
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
                                                <input type="text" placeholder="Abbr" class="k-textbox k-invalid span4" data-bind="value: obj.abbr" style="width: 100px;" />
                                            </td>
                                            <td>
                                                <input type="text" placeholder="Starting Number" class="k-textbox k-invalid span2" data-bind="value: obj.startup_number" style="width: 100px;" />
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
<script id="property-template-list" type="text/x-kendo-template">
    <tr>
        <td>#=abbr#</td>
        <td>#=code#</td>
        <td>#=name#</td>
        <td>#=address#</td>
        <td align="center"><span style="cursor: pointer;" class="k-edit-button"><i class="icon-edit"></i> <span data-bind="text: lang.lang.edit">Edit</span></span></td>
    </tr>
</script>
<script id="property-edit-template-list" type="text/x-kendo-template">
    <tr>
        <td>
            <input type="text" style="width:70px" class="k-textbox" data-bind="value:abbr" name="ProductName" required="required" validationMessage="required" />
        </td>
        <td>
            <input type="text"  style="width:100px" class="k-textbox" data-bind="value:code" name="ProductName" required="required" validationMessage="required" />
        </td>
        <td>
            <input type="text" class="k-textbox" data-bind="value:name" name="ProductName" required="required" validationMessage="required" />
        </td>
        <td>
            <input type="text"  style="width:100px" class="k-textbox" data-bind="value:address" name="ProductName" required="required" validationMessage="required" />
        </td>
        <td align="center">
            <div class="edit-buttons">
                <a class="k-button k-update-button" href="\\#"><span class="k-icon k-i-check"></span></a>
                <a class="k-button k-cancel-button" href="\\#"><span class="k-icon k-i-cancel"></span></a>
            </div>
        </td>
    </tr>
</script>
<!--Dash Board-->
<script id="dashboard-template-table-list" type="text/x-kendo-tmpl">
    <tr>
        <td>#=banhji.wDashBoard.dataSource.indexOf(banhji.wDashBoard.dataSource.get(id)) +1 #</td>
        <td>#=name#</td>
        <td style="text-align: right; padding-right: 5px !important;">#=blocCount#</td>
        <td style="text-align: right; padding-right: 5px !important;">#=activeCustomer#</td>
        <td style="text-align: right; padding-right: 5px !important;">#=inActiveCustomer#</td>
        <td style="text-align: right; padding-right: 5px !important;">#= kendo.toString(deposit, banhji.locale=="km-KH"?"c0":"c", banhji.locale)#</td>
        <td style="text-align: right; padding-right: 5px !important;">#=usage#</td>
        <td style="text-align: right; padding-right: 5px !important;">#= kendo.toString(sale, banhji.locale=="km-KH"?"c0":"c", banhji.locale)#</td>
        <td style="text-align: right; padding-right: 5px !important;">#= kendo.toString(balance, banhji.locale=="km-KH"?"c0":"c", banhji.locale)#</td>
    </tr>
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
<!-- Lease Unit -->
<script id="lu-center-transaction-tmpl" type="text/x-kendo-tmpl">
    <tr>            
        <td>#=kendo.toString(new Date(issued_date), "dd-MM-yyyy")#</td>
        <td>#=type#</td>
        <td>
            #if(type=="Customer_Deposit" && amount<0){#         
                <a data-bind="click: goReference">#=number#</a>         
            #}else{#
                <a href="\#/#=type.toLowerCase()#/#=id#"><i></i> #=number#</a>
            #}#         
        </td>
        <td class="right">
            #if(type=="GDN"){#
                #=kendo.toString(amount, "n0")#
            #}else if(type=="Commercial_Invoice" || type=="Vat_Invoice" || type=="Invoice" || type=="Commercial_Cash_Sale" || type=="Vat_Cash_Sale" || type=="Cash_Sale"){#
                #=kendo.toString(amount-deposit, locale=="km-KH"?"c0":"c", locale)#
            #}else{#
                #=kendo.toString(amount, locale=="km-KH"?"c0":"c", locale)#
            #}#
        </td>
        <td align="center">
            #if(status=="4") {#
                #=progress#
            #}#

            #if(type=="Quote"){#            
                #if(status=="0"){#
                    Open                
                #}#
            #}else if(type=="Sale_Order"){#
                #if(status=="0"){#
                    Open
                #}else{#
                    Done                    
                #}#
            #}else if(type=="GDN"){#
                Delivered
            #}else if(type=="Commercial_Invoice" || type=="Vat_Invoice" || type=="Invoice"){#
                #if(status=="0" || status=="2") {#
                    # var date = new Date(), dueDate = new Date(due_date).getTime(), toDay = new Date(date).getTime(); #
                    #if(dueDate < toDay) {#
                        Over Due #:Math.floor((toDay - dueDate)/(1000*60*60*24))# days
                    #} else {#
                        #:Math.floor((dueDate - toDay)/(1000*60*60*24))# days to pay
                    #}#
                #} else if(status=="1") {#
                    Paid
                #} else if(status=="3") {#
                    Returned
                #}#         
            #}#                     
        </td>
        <td align="center">
            #if(type=="Commercial_Invoice" || type=="Vat_Invoice" || type=="Invoice"){#
                #if(status=="0" || status=="2") {#
                    <a data-bind="click: payInvoice"><i></i> <span data-bind="text: lang.lang.receive_payment"></span></a>
                #}#
            #}#
            #if(status=="4") {#
                <a href="\#/#=type.toLowerCase()#/#=id#"><i></i> Use</a>
            #}#
        </td>       
    </tr>
</script>
<script id="lease-unit-list-tmpl" type="text/x-kendo-tmpl">
    <tr data-bind="click: selectedRow">
        <td>
            <div class="media-body strong" style="position: relative;">             
                <span>#=abbr##=code#</span>
                <span>
                    #=name#     
                </span>
            </div>
        </td>
    </tr>
</script>
<script id="amenity-template-list" type="text/x-kendo-tmpl">
    <div class="span4" style="padding: 10px; background: \\#ccc;margin-right: 2px;width: 31%;margin-bottom: 2px;">
        <input type="checkbox" name="items" style="margin-right: 5px;" data-bind="checked: obj.amenity_line" value="#= id #"/> #= name #
    </div>
</script>
<script id="space-template-list" type="text/x-kendo-tmpl">
    <div class="span4" style="padding: 10px; background: \\#ccc;margin-right: 2px;width: 31%;margin-bottom: 2px;">
        <input type="checkbox" name="items" style="margin-right: 5px;" data-bind="checked: obj.space_line" value="#= id #"/> #= name #
    </div>
</script>
<!-- Utility -->
<script id="meter-plan-item-list" type="text/x-kendo-template">
    <tr>
        <td>#=type#</td>
        <td>#=name#</td>
        <td>#= kendo.toString(amount, banhji.locale=="km-KH"?"c0":"c", banhji.locale)#</td>
        <td><input style="width: 100%" type="number" class="k-textbox k-input k-formatted-value" data-bind="value: received, events: {change: onAmountChange}">
    </tr>
</script>
<script id="meter-list-tmpl" type="text/x-kendo-tmpl">
    <tr data-bind="click: selectedRow">
        <td>
            <div class="media-body strong" style="position: relative;">             
                <span>#=number#</span><a style="float: right;" href="\#/meter/#=id#">Edit</a>
            </div>
        </td>
    </tr>
</script>
<script id="reading-template" type="text/x-kendo-tmpl">
    <tr>
        <td>
            #= meter_number#
        </td>
        <td align="center">
            #= kendo.toString(new Date(from_date), "dd-MMM-yyyy")#
        </td>
        <td align="center">
            #= kendo.toString(new Date(to_date), "dd-MMM-yyyy")#
        </td>
        <td align="center">
            #= kendo.toString(new Date(month_of), "MMM-yyyy")#
        </td>
        <td align="center">
            #= previous#
        </td>
        <td align="center">
            #= current#
        </td>       
    </tr>
</script>
<script id="reading-Error11-template" type="text/x-kendo-tmpl">
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
<script id="reading-Exist-template" type="text/x-kendo-tmpl">
    <tr>
        <td align="center">
            #= line#
        </td>
        <td style="font-weight: bold;color:red">
            #= meter_number#
        </td>
        <td align="center">
            #= previous#
        </td>
        <td align="center" >
            #= current#
        </td>
        <td align="center">
            <span><i class="icon-remove"></i></span>
        </td>   
    </tr>
</script>
<script id="EditReading" type="text/x-kendo-template">
    <div id="slide-form">
        <div class="customer-background">
            <div class="container-960">                 
                <div id="example" class="k-content">                    
                    
                    <span class="glyphicons no-js remove_2 pull-right" 
                            data-bind="click: cancel"><i></i></span>

                    <h2>Edit Reading</h2>

                    <br>
                        
                    <!-- Upper Part -->
                    <div class="row-fluid">
                        <div class="span12 row-fluid" style="padding:20px 0;padding-top: 0;">
                                <div class="span5" style="padding-left: 0;">
                                    <div class="span6"> 
                                        <!-- Group -->
                                        <div class="control-group">                             
                                            <label ><span >Month Of</span></label>
                                            <input type="text" 
                                                style="width: 100%;" 
                                                data-role="datepicker"
                                                data-format="MM-yyyy"
                                                data-start="year" 
                                                data-depth="year" 
                                                placeholder="Moth of ..." 
                                                data-bind="value: monthOfSelect" />
                                        </div>
                                                                                                        
                                        <!-- // Group END -->
                                    </div>
                                    <div class="span6" style="padding-left: 0;">
                                        <div class="control-group">                             
                                            <label ><span >License</span></label>
                                            <input 
                                                data-role="dropdownlist" 
                                                style="width: 100%;" 
                                                data-option-label="License ..." 
                                                data-auto-bind="false" 
                                                data-value-primitive="false" 
                                                data-text-field="name" 
                                                data-value-field="id" 
                                                data-bind="
                                                    value: licenseSelect,
                                                    source: licenseDS,
                                                    events: {change: onLicenseChange}">
                                        </div>
                                    </div>  
                                </div>
                                <div class="span7" style="padding-left: 0;">
                                    <div class="span4">
                                        <div class="control-group">                             
                                            <label ><span >Location</span></label>
                                            <input 
                                                data-role="dropdownlist" 
                                                style="width: 100%;" 
                                                data-option-label="Location ..." 
                                                data-auto-bind="false" 
                                                data-value-primitive="false" 
                                                data-text-field="name" 
                                                data-value-field="id" 
                                                data-bind="
                                                    value: blocSelect,
                                                    source: blocDS,
                                                    events: {change: blocChange}">
                                        </div>
                                    </div>
                                    <div class="span4">
                                        <div class="control-group"> 
                                            <label ><span >Action</span></label>    
                                            <div class="row" style="margin: 0;">                    
                                                <button type="button" data-role="button" data-bind="click: search" class="k-button" role="button" aria-disabled="false" tabindex="0"><i class="icon-search"></i></button>
                                            </div>
                                        </div>
                                    </div>      
                                </div>
                            </div>
                            <br>
                            <table class="table table-borderless table-condensed cart_total table-primary">
                                <thead>
                                    <tr>
                                        <th>Meter Number</th>
                                        <th style="text-align: center">From Date</th>
                                        <th style="text-align: center">To Date</th>
                                        <th>Previous</th>
                                        <th>Current</th>
                                        <th style="text-align: center">Action</th>
                                    </tr>
                                </thead>
                                <tbody 
                                    data-bind="source: dataSource" 
                                    data-auto-bind="true" 
                                    data-role="listview" 
                                    data-edit-template="readding-edit-template"
                                    data-template="reading-list-template">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</script>
<script id="reading-list-template" type="text/x-kendo-tmpl">
    <tr>
        <td>
            #= meter_number#
        </td>
        <td align="center">
            #= from_date#
        </td>
        <td align="center">
            #= to_date#
        </td>
        <td align="center">
            #= previous#
        </td>
        <td align="center">
            #= current#
        </td>
        <td align="center">                
            <a class="btn-action glyphicons pencil btn-success k-edit-button" ><i></i></a>
        </td>           
    </tr>
</script>
<script id="readding-edit-template" type="text/x-kendo-tmpl">
    <tr>
        <td>
            #= meter_number#
        </td>
        <td align="center">
            #= date#
        </td>
        <td align="center">
            #= previous#
        </td>
        <td align="center">
            <input type="text" class="k-textbox" data-bind="value:current" name="current" required="required" validationMessage="required" />
        </td>
        <td align="center">
            #= current - previous#
        </td>
        <td align="center">
            <div class="edit-buttons">
                <a class="k-button k-update-button" href="\\#"><span class="k-icon k-i-check"></span></a>
                <a class="k-button k-cancel-button" href="\\#"><span class="k-icon k-i-cancel"></span></a>
            </div>
        </td>
    </tr>
</script>
<!-- Contract -->
<script id="rent_price-list-tmpl" type="text/x-kendo-tmpl">
    <span>#=name#</span>    
    <span>#=amount#</span>
</script>
<script id="contract-list-tmpl" type="text/x-kendo-tmpl">
    <tr data-bind="click: selectedRow">
        <td>
            <div class="media-body strong" style="position: relative;">             
                <span>#=name#</span><a style="float: right;" href="\#/contract/#=id#">Edit</a>
            </div>
        </td>
    </tr>
</script>
<script id="other-charge-template" type="text/x-kendo-tmpl">
    <tr>
        <th style="vertical-align: top;">#= name#</th>
        <th style="vertical-align: top;">#= price#</th>              
        <th style="vertical-align: top;">#= quantity#</span></th>
        <th style="vertical-align: top;">#= amount#</th>
        <th style="vertical-align: top;">#= condition#</th>
        <td align="center">                
            <span style="cursor: pointer;" class="k-edit-button"><i class="icon-edit"></i> <span data-bind="text: lang.lang.edit">Edit</span></span>
            |
            <a class="k-button k-delete-button"><span class="k-icon k-i-delete"></span></a>
        </td> 
    </tr>
</script>
<script id="other-charge-edit-template" type="text/x-kendo-tmpl">
    <tr>
        <td align="center">
            <input type="text" class="k-textbox" data-bind="value: name" name="ProductName" required="required" validationMessage="required" />
        </td>
        <td align="center">
            <input type="text" class="k-textbox" data-bind="value: price" name="ProductName" required="required" validationMessage="required" />
        </td>
        <td align="center">
            <input type="text" class="k-textbox" data-bind="value: quantity" name="ProductName" required="required" validationMessage="required" />
        </td>
        <td align="center">
            <span data-bind="text: amount">asdfashdfkljasldfkjas;lk</span>
        </td>
        <td>
            <input data-role="dropdownlist"
               data-option-label="(--- Condition ---)"       
               data-value-primitive="true"
               data-text-field="name"
               data-value-field="id"
               data-bind="value: condition,
                          source: conditionAR" />
        </td>
        <td align="center">
            <div class="edit-buttons">
                <a class="k-button k-update-button" href="\\#"><span class="k-icon k-i-check"></span></a>
                <a class="k-button k-cancel-button" href="\\#"><span class="k-icon k-i-cancel"></span></a>
            </div>
        </td>
    </tr>
</script>
<!-- Customer -->
<script id="attachment-list-tmpl" type="text/x-kendo-tmpl">
    <tr>
        <td>
            <input id="txtName-#:uid#" name="txtName-#:uid#" 
                    type="text" class="k-textbox" 
                    data-bind="value: name" />
        </td>
        <td>
            <input id="txtDescription-#:uid#" name="txtDescription-#:uid#" 
                    type="text" class="k-textbox" 
                    data-bind="value: description"
                    style="width: 100%; margin-bottom: 0;" />
        </td>
        <td>#=kendo.toString(created_at, "dd-MM-yyyy")#</td>
        <td>
            #if(id){#
                <a href="#=url#" target="_blank" class="btn-action glyphicons download btn-default"><i></i></a>
            #}#
            <span class="btn-action glyphicons remove_2 btn-danger" data-bind="click: removeFile"><i></i></span>            
        </td>
    </tr>
</script>
<script id="customerCenter-transaction-tmpl" type="text/x-kendo-tmpl">
    <tr>            
        <td>#=kendo.toString(new Date(issued_date), "dd-MM-yyyy")#</td>
        <td>#=type#</td>
        <!-- Reference -->
        <td>
            #if(type=="Customer_Deposit" && amount<0){#         
                <a data-bind="click: goReference">#=number#</a>         
            #}else{#
                <a href="\#/#=type.toLowerCase()#/#=id#"><i></i> #=number#</a>
            #}#         
        </td>
        <!-- Amount -->
        <td class="right">
            #if(type=="GDN"){#
                #=kendo.toString(amount, "n0")#
            #}else if(type=="Commercial_Invoice" || type=="Vat_Invoice" || type=="Invoice" || type=="Commercial_Cash_Sale" || type=="Vat_Cash_Sale" || type=="Cash_Sale"){#
                #=kendo.toString(amount-deposit, locale=="km-KH"?"c0":"c", locale)#
            #}else{#
                #=kendo.toString(amount, locale=="km-KH"?"c0":"c", locale)#
            #}#
        </td>
        <!-- Status -->
        <td align="center">
            #if(status=="4") {#
                #=progress#
            #}#

            #if(type=="Quote"){#            
                #if(status=="0"){#
                    Open                
                #}#
            #}else if(type=="Sale_Order"){#
                #if(status=="0"){#
                    Open
                #}else{#
                    Done                    
                #}#
            #}else if(type=="GDN"){#
                Delivered
            #}else if(type=="Commercial_Invoice" || type=="Vat_Invoice" || type=="Invoice"){#
                #if(status=="0" || status=="2") {#
                    # var date = new Date(), dueDate = new Date(due_date).getTime(), toDay = new Date(date).getTime(); #
                    #if(dueDate < toDay) {#
                        Over Due #:Math.floor((toDay - dueDate)/(1000*60*60*24))# days
                    #} else {#
                        #:Math.floor((dueDate - toDay)/(1000*60*60*24))# days to pay
                    #}#
                #} else if(status=="1") {#
                    Paid
                #} else if(status=="3") {#
                    Returned
                #}#         
            #}#                     
        </td>
        <!-- Actions -->
        <td align="center">
            #if(type=="Commercial_Invoice" || type=="Vat_Invoice" || type=="Invoice"){#
                #if(status=="0" || status=="2") {#
                    <a data-bind="click: payInvoice"><i></i> <span data-bind="text: lang.lang.receive_payment"></span></a>
                #}#
            #}#

            #if(status=="4") {#
                <a href="\#/#=type.toLowerCase()#/#=id#"><i></i> Use</a>
            #}#
        </td>       
    </tr>
</script>
<script id="customerCenter-customer-list-tmpl" type="text/x-kendo-tmpl">
    <tr data-bind="click: selectedRow">
        <td>
            <div class="media-body strong">             
                <span>#=abbr##=number#</span>
                <span>#=name#</span>
            </div>
        </td>
    </tr>
</script>
<script id="customerCenter-note-tmpl" type="text/x-kendo-template">
    <tr>
        <td>            
            <blockquote>
                <small class="author">
                    <span class="strong">#=creator#</span> :
                    <cite>#=kendo.toString(new Date(noted_date), "g")#</cite>
                </small>                    
                <p>#=note#</p>
            </blockquote>               
        </td>
    </tr>   
</script>
<script id="contact-person-row-tmpl" type="text/x-kendo-tmpl">
    <tr>        
        <td>
            <input id="name" name="name" 
                    type="text" class="k-textbox" 
                    data-bind="value: name"
                    placeholder="eg: Mr. John" 
                    required="required" validationMessage="required" style="width: 190px;" />
            <span data-for="name" class="k-invalid-msg"></span>
        </td>
        <td>
            <input type="text" class="k-textbox" data-bind="value: department" placeholder="eg: Accounting" style="width: 190px;" />
        </td>       
        <td>
            <input type="text" class="k-textbox" data-bind="value: phone" placeholder="eg: 012 333 444" style="width: 190px;" />
        </td>
        <td>
            <input type="text" class="k-textbox" data-bind="value: email" placeholder="eg: john@email.com" style="width: 190px;" />
        </td>       
        <td align="center">            
            <span class="glyphicons no-js delete" data-bind="click: deleteContactPerson"><i></i></span>                                 
        </td>       
    </tr>
</script>
<script id="customer-type-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
        <a href="\#/customer_setting">+ Add New Customer Type</a>
    </strong>
</script>
<script id="account-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
        <a href="\#/account">+ Add New Account</a>
    </strong>
</script>
<script id="account-list-tmpl" type="text/x-kendo-tmpl">    
    <span>
        #=number#               
    </span>
    -
    <span>#=name#</span>
</script>
<script id="account-type-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
        <a href="\#/customer_setting">+ Add New Customer Type</a>
    </strong>
</script>
<script id="account-type-list-tmpl" type="text/x-kendo-tmpl">   
    <span>
        #=number#               
    </span>
    -
    <span>#=name#</span>
</script>
<script id="currency-list-tmpl" type="text/x-kendo-tmpl">
    <span>
        #=code# - #=country#
    </span>
</script>
<script id="customer-term-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
        <a href="\#/customer_setting">+ Add New Term</a>
    </strong>
</script>
<script id="customer-payment-method-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
        <a href="\#/customer_setting">+ Add New Payment Method</a>
    </strong>   
</script>
<script id="tax-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
        <a href="\#/tax">+ Add New Tax</a>
    </strong>   
</script>
<!-- Bill -->
<script id="runbill-row-template" type="text/x-kendo-tmpl">
    <tr>
        <td align="center">
           <input type="checkbox" data-bind="checked: invoiced, events: {change: makeInvoice}" />
        </td>                       
        <td>#= contract#</td>       
        <td>#= customer#</td>
        <td class="right">#= wusage_total #m2 x #= water_ar.price# = #= kendo.toString(water_ar.amount, water_ar.locale=="km-KH"?"c0":"c", water_ar.locale)#</td>
        <td class="right">#= eusage_total #kwh x #= ele_ar.price# = #= kendo.toString(ele_ar.amount, ele_ar.locale=="km-KH"?"c0":"c", ele_ar.locale)#</td>
        <td class="right">#= kendo.toString(rent_price, rent_locale=="km-KH"?"c0":"c", rent_locale)#</td>           
        <td class="right">#= kendo.toString(total, locale=="km-KH"?"c0":"c", locale)#</td>  
    </tr>
</script>
<script id="runbill-footer-template" type="text/x-kendo-template">
    <tr>        
        <td class="right" colspan="8" style="font-size:30px;">
            <span data-bind="text: lang.lang.total"></span>: <span data-bind="text: meterSold"></span>  m<sup>3</sup>/kWh
        </td>
    </tr>
</script>