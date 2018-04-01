<div id="wrapperApplication" class="wrapper" style="background: none;"></div>
<!--load before somthing not yet done -->
<div id="holdpageloadhide" style="display:block;text-align: center;position: fixed;top: 0; left: 0;width: 100%; height: 100%;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
    <i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 45%;left: 45%"></i>
</div>
<!-- template section starts -->
<script type="text/x-kendo-template" id="layout">
    <div id="content" style=" background: none;"></div>
</script>
<script type="text/x-kendo-template" id="blank-tmpl">
</script>
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
            border-radius: 0;
        }
        .pk2 {padding-top: 7.4px;}
        html {
            height: 100%;
            width: 100%;
        }
    </style>
    <div class="container" style="margin-top: 30px;padding-top: 30px;">
        <div class="row">
            <div class="col-md-10">
                <div class="col-md-12" style="padding: 0;padding-right: 5px;">
                    <div class="cash-bg " style="padding: 5px;background: #0eac00;">
                        <div class="col-md-8">
                            <div class="col-md-12" style="margin-top: 10px;">
                                <a href="<?php echo base_url(); ?>choulr" style="float:left;">
                                    <img src="<?php echo base_url();?>assets/choulr/img/logo.png" style="float: left;" width="50">
                                    <span><b style="color: #fff;font-size: 20px;float: left;padding-top: 15px;">Choulr</b></span>
                                </a>
                                <form class="navbar-form pull-left hidden-xs">
                                    <input id="search-placeholder" class="span2 search-query" type="text" placeholder="Search" data-bind="value: searchText" style="width: 220px;" />
                                    <button class="btn btn-inverse" type="submit" data-bind="click: search" style="background-color: #56882e !important;border-radius: 2px;">
                                        <i class="icon-search iconsearch"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-4" style="padding-left: 0px;padding-right: 10px;">
                            <div class="col-md-4"> 
                                <a href="#/contract" class="hvr-float">
                                    <img title="add contract" src="<?php echo base_url(); ?>assets/choulr/img/add-contract.png" width="60">
                                </a>
                            </div>
                            <div class="col-md-4"> 
                                <a href="#/lease_unit" class="hvr-float">
                                    <img title="add lease unit" src="<?php echo base_url(); ?>assets/choulr/img/add-lease-unit.png" width="60">
                                </a>
                            </div>
                            <div class="col-md-4"> 
                                <a href="#/meter" class="hvr-float">
                                    <img title="add mater" src="<?php echo base_url(); ?>assets/choulr/img/add_mater.png" width="60">
                                </a>
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="col-md-6" >
                    <div class="cash-bg " style="padding-left: 25px;">
                        <div class="row-fluid">
                            <div class="col-md-4 pk1">
                                <a href="#/contract_center" class="hvr-float">
                                    <img title="contract" src="<?php echo base_url();?>assets/choulr/img/contract-01.png" height="153" style="width: auto;" />
                                </a>
                            </div>
                            <div class="col-md-8 pk1" style="padding-left: 50px;padding-top: 5px">
                                <a href="#/contract_center" class="hvr-float">
                                    <h1 style="font-size: 22px;font-weight: bold;color: #fff !important;">CONTRACT</h1>
                                    <h2 style="font-size: 18px;color: #fff !important;margin-top: 15px;">Number of Contract</h2>
                                    <h3 style="font-size: 30px;color: #72ec7f !important;margin-top: 15px;" data-bind="text: totalContract"></h3>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6" >
                    <div class="cash-bg " style="padding-left: 25px;">
                        <div class="row-fluid">
                            <div class="col-md-4 pk1">
                                <a href="#/lease_unit_center" class="hvr-float">
                                    <img title="lease unit" src="<?php echo base_url();?>assets/choulr/img/lish-01.png" height="153" style="width: auto;" />
                                </a>
                            </div>
                            <div class="col-md-8 pk1" style="padding-left: 50px;padding-top: 5px">
                                <a href="#/lease_unit_center" class="hvr-float">
                                    <h1 style="font-size: 22px;font-weight: bold;color: #fff !important;text-transform: uppercase;">lease unit</h1>
                                    <h2 style="font-size: 18px;color: #fff !important;margin-top: 15px;">Number of Lease Unit</h2>
                                    <h3 style="font-size: 30px;color: #72ec7f !important;margin-top: 15px;" data-bind="text: totalLeaseUnit"></h3>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6" >
                    <div class="cash-bg " style="padding-left: 25px;">
                        <div class="row-fluid">
                            <div class="col-md-4 pk1">
                                <a href="#/run_bill" class="hvr-float">
                                    <img title="run bill" src="<?php echo base_url();?>assets/choulr/img/run-bill.png" height="153" style="width: auto;" />
                                </a>
                            </div>
                            <div class="col-md-4 pk1">
                                <a href="#/print_bill" class="hvr-float">
                                    <img title="Add Print Invoice" src="<?php echo base_url();?>assets/choulr/img/print-bill-V1.png" height="153" style="width: auto;" />
                                </a>
                            </div>
                            <div class="col-md-4 pk1">
                                <a href="#/receipt" class="hvr-float">
                                    <img title="receipt" src="<?php echo base_url();?>assets/choulr/img/receipt-V1.png" height="153" style="width: auto;" />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="cash-bg " style="padding-left: 25px;">
                        <div class="row-fluid">
                            <div class="col-md-4 pk1">
                                <a href="#/utility_center" class="hvr-float">
                                    <img title="add meter" src="<?php echo base_url();?>assets/choulr/img/mater-center.png" height="153" style="width: auto;" />
                                </a>
                            </div>
                            <div class="col-md-8 pk1" style="padding-left: 50px;padding-top: 5px">
                                <a href="#/utility_center" class="hvr-float">
                                    <h1 style="font-size: 22px;font-weight: bold;color: #fff !important;text-transform: uppercase;">meter center</h1>
                                    <h2 style="font-size: 18px;color: #fff !important;margin-top: 15px;">Number of Meter</h2>
                                    <h3 style="font-size: 30px;color: #72ec7f !important;margin-top: 15px;" data-bind="text: totalMeter"></h3>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="cash-bg " style="padding: 0;">
                        <a href="#/customer_deposit_report">
                            <div class="cash-invoice" style="margin-bottom: 0;background:#45ce54;color: #fff;padding: 17px;">
                                <div class="span3" style="padding-left: 0;">
                                    <span data-bind="text: lang.lang.deposit" style="font-weight: 600;font-size: 16px;color: #fff; ">DEPOSIT</span>
                                    <br>
                                    <p style="margin: 0;"><span style="color: ##fff;" data-bind="text: totalUser"></span>
                                        <span style="color: #fff;" data-bind="text: lang.lang.meter">Meters</span>
                                    </p>
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
                            <div class="cash-invoice" style="margin-bottom: 0;background: #72ec7f;color: #fff;padding: 17px;">
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
            </div>
            <div class="col-md-2">
                <div class="cash-bg pk" style="background: #0eac00;">
                    <div class="row-fluid">
                        <div class="col-xs-12 col-sm-12 col-md-12 pk2">
                            <a href="#/setting" class="hvr-shrink">
                                <img title="setting" src="<?php echo base_url();?>assets/choulr/img/setting.png" width="90">
                                <span style="text-transform: uppercase; color: #fff; font-weight: 600; margin-top: 8px; display: inline-block;">Setting</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="cash-bg pk" style="background: #45ce54;">
                    <div class="row-fluid">
                        <div class="col-xs-12 col-sm-12 col-md-12 pk2">
                            <a href="#/reports" class="hvr-shrink">
                                <img title="reports" src="<?php echo base_url();?>assets/choulr/img/report.png" width="90">
                                <span style="text-transform: uppercase; color: #fff; font-weight: 600; margin-top: 8px; display: inline-block;">Reports</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="cash-bg pk" style="background: #72ec7f;">
                    <div class="row-fluid">
                        <div class="col-xs-12 col-sm-12 col-md-12 pk2">
                            <a href="./rrd" target="_blank" class="hvr-shrink">
                                <img title="center" src="<?php echo base_url();?>assets/choulr/img/go-to-banhji.png" width="90">
                                <span style="text-transform: uppercase; color: #fff; font-weight: 600; margin-top: 8px; display: inline-block;font-size: 12px;">Go To Banhji</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="cash-bg pk" style="background: #ec4d4d;">
                    <div class="row-fluid">
                        <div class="col-xs-12 col-sm-12 col-md-12 pk2">
                            <a href="#/setting" class="hvr-shrink">
                                <img title="feedback" src="<?php echo base_url();?>assets/choulr/img/feedback.png" width="90">
                                <span style="text-transform: uppercase; color: #fff; font-weight: 600; margin-top: 8px; display: inline-block;">Feedback</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
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
                                        <a href="<?php echo base_url(); ?>rrd#/item_service" target="_blank" class="glyphicons rotation_lock">
                                            <i></i><span class="strong"><span>Services</span></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tab6" data-bind="click: goDeposit" class="glyphicons wallet" data-toggle="tab">
                                            <i></i><span class="strong"><span data-bind="text: lang.lang.deposit">Deposit</span></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#fine" data-bind="click: goFine" class="glyphicons more" data-toggle="tab">
                                            <i></i><span class="strong"><span data-bind="text: lang.lang.fine">Fine</span></span>
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
                                                   data-value-primitive="true"
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
    <style>
        /*.col-md-3{box-shadow: 2px 0px 12px 0px rgba(68,68,68,1);}*/
        .cash-bg {
            border-radius: 0;
        }
        .col-md-3 {
            float: left;
            position: relative;
            width: 151px;
            height: 258px;
            padding: 0px;
            cursor: pointer;
            background: #fff;
            margin-right: 5.5px;
            margin-bottom: 5.5px;
        }
        .col-md-5 {
            background: #fff;
        }
        h3  {
            font-size: 14px;
            text-align: center;
        }
        .col-md-3 p  {
            font-size: 14px;
            text-align: center;
            margin-bottom: 0px;
        }
        h1{
            font-size: 17px;
            color:#0eac00!important; 
        }
        .col-md-3 form  {
            padding-right: 0px;
            padding-left: 4px;
        }
        .col-md-2 p  {
            font-size: 12px;
            margin-top: 5px;
        }
        h4{
            font-size: 14px ;
        }
        .pk1{
            padding: 1px;
        }
        .btn {
            padding: 6px 11px;
        }
        .k-pager-wrap {
            background: #0eac00!important;
        }
        h4 span {
            font-style: normal;
            color: #000;
            font-weight: bold;
        }
    </style>
    <div class="container" style="margin-top: 100px;">
        <div class="row">
            <div class="col-md-10">
                <div class="col-md-12" style="padding: 0;padding-right: 5px;">
                    <div class="cash-bg " style="padding: 5px;background: #0eac00;">
                        <div class="col-md-8">
                            <div class="col-md-12" style="margin-top: 10px;">
                                <a href="<?php echo base_url(); ?>choulr" style="float:left;">
                                    <img src="<?php echo base_url();?>assets/choulr/img/logo.png" style="float: left;" width="50">
                                    <span><b style="color: #fff;font-size: 20px;float: left;padding-top: 15px;">Choulr</b></span>
                                </a>
                                <form class="navbar-form pull-left hidden-xs">
                                    <input id="search-placeholder" class="span2 search-query" type="text" placeholder="Search" data-bind="value: searchText" style="width: 220px;" />
                                    <button class="btn btn-inverse" type="submit" data-bind="click: search" style="background-color: #56882e !important;border-radius: 2px;">
                                        <i class="icon-search iconsearch"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-4" style="padding-left: 0px;padding-right: 10px;">
                            <div class="col-md-4"> 
                                <a href="#/contract" class="hvr-float">
                                    <img title="add contract" src="<?php echo base_url(); ?>assets/choulr/img/add-contract.png" width="60">
                                </a>
                            </div>
                            <div class="col-md-4"> 
                                <a href="#/lease_unit" class="hvr-float">
                                    <img title="add lease unit" src="<?php echo base_url(); ?>assets/choulr/img/add-lease-unit.png" width="60">
                                </a>
                            </div>
                            <div class="col-md-4"> 
                                <a href="#/meter" class="hvr-float">
                                    <img title="add mater" src="<?php echo base_url(); ?>assets/choulr/img/add_mater.png" width="60">
                                </a>
                            </div>
                        </div> 
                    </div>
                </div>
                <div data-role="listview"
                    data-template="lease-unit-item-list"
                    data-bind="source: leaseUnitDS"
                    style="height: 535px; overflow: auto;width: 99.3%;margin-left: 0;">
                </div>
                <div class="col-md-12" style="padding-left: 0px;padding-right: 5px;margin-bottom: 5px;" >
                    <div style="background: #0eac00;height: 40px;">
                        <div id="pager" class="k-pager-wrap"
                             data-role="pager"
                             data-auto-bind="true"
                             data-bind="source: leaseUnitDS">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2" style="background: #fff;padding: 10px;height: 669px;">
                <div style="margin-bottom: 25px;overflow:hidden;max-height: 150px; height: 150px; width: 150px;max-width: 150px;">
                    <img data-bind="attr: { src: obj.img1, alt: obj.name, title: obj.name }" />
                </div>
                <div>
                    <h1 style="margin-bottom: 20px;"><b>LEASE UNIT INFO</b></h1>
                    <h4>
                        <b>Lease Unit</b>
                        Lease Unit No: <span data-bind="text: obj.name"></span><br>
                        Property: <span data-bind="text: obj.property_name"></span><br>
                        Contract No: <span data-bind="text: contractobj.name"></span><br>
                        Customer Name: <span data-bind="text: contactobj.name"></span><br></p>
                    </h4>
                    <h4><b>Area</b>
                        <p>Vacant From:  <br>Contract End:<br>Statue: Rented, Vacant, <br>Maintenance<br>Object Area : 60 m2<br>Amenity :<br>Other :</p>
                    </h4>
                    <h4><b>Lease Unit Statistic</b>
                        <p>Turn Over :<br>Balance : 60 m2<br>Invoice :<br>Avg Invoice :<br>Rent Num :</p>
                    </h4>
                </div>
            </div>
        </div>
    </div>
</script>
<script id="lease-unit-item-list" type="text/x-kendo-template">
    <div class="col-md-3">
        <div class="row-fluid" style="overflow: hidden;">
            <div class="col-xs-12 col-sm-12 col-md-12 pk1 hvr-shrink" data-bind="click: selectedRow">
                <div style="overflow:hidden;max-height: 150px; height: 150px; width: 150px;max-width: 150px;">
                    <img style="height: 100%;height: auto;width: 100%;width: auto;" src="#if(img1){# #=img1# #}else{#<?php echo base_url();?>/assets/choulr/img/no_image.png #}#"/>
                </div>
                <p>Name: #= name#</p>
                <p>Status: #= status#</p>
                <p>Contract: #= contract_id#</p>
            </div>
            <a href="\#/lease_unit/#= id#" class="btn btn-inverse" type="edit" style="background-color: \#254809 !important;border-radius: 1px;">
                <i class="icon-idit">Edit</i>
            </a>
            <a class="btn btn-inverse" type="edit" style="background-color: \#45ce54 !important;border-radius: 1px;margin-left: 0px;">
                <i class="icon-idit">Maintenance</i>
            </a>
        </div>
    </div>
</script>
<script id="leaseUnit" type="text/x-kendo-template">
    <div class="container">
        <div class="row-fluid">
            <div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
                <i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
            </div>
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
            <div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
                <i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
            </div>
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
            <div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
                <i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
            </div>
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
                                                required
                                                class="k-invalid"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="control-group">
                                            <label for="ddlContactType">
                                                <span data-bind="text: lang.lang.register_date"></span> <span style="color:red">*</span>
                                            </label>
                                            <input id="issuedDate" name="issuedDate" 
                                                data-role="datepicker"
                                                data-format="dd-MM-yyyy"
                                                data-parse-formats="yyyy-MM-dd"
                                                data-bind="value: obj.issued_date" 
                                                required
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
                                                required
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
                                       required 
                                       style="width: 100%;" /> 
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12">
                                        <div class="control-group"> 
                                            <label for="fullname">
                                                <span>Memo</span>
                                            </label>
                                            <input id="fullname" 
                                                name="fullname" 
                                                class="k-textbox" 
                                                data-bind="value: obj.memo"
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
                                                <span>Start</span>
                                            </label>
                                            <input id="issuedDate" name="issuedDate" 
                                                data-role="datepicker"
                                                data-format="dd-MM-yyyy"
                                                data-parse-formats="yyyy-MM-dd"
                                                data-bind="value: obj.start_date"
                                                style="width:100%;" />
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="control-group">
                                            <label for="ddlContactType">
                                                <span>End</span>
                                            </label>
                                            <input id="issuedDate" name="issuedDate" 
                                                data-role="datepicker"
                                                data-format="dd-MM-yyyy"
                                                data-parse-formats="yyyy-MM-dd"
                                                data-bind="value: obj.end_date"
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
                                        <li class="span2 glyphicons parents">
                                            <a href="#Deposit" data-toggle="tab"><i></i> <span><span data-bind="text: lang.lang.deposit"></span></span></a>
                                        </li>
                                        <li class="span2 glyphicons parents">
                                            <a href="#Fine" data-toggle="tab"><i></i> <span><span data-bind="text: lang.lang.fine"></span></span></a>
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
                                        <br />
                                        <table class="table-fixed table-customer table table-bordered table-primary table-striped table-vertical-center">
                                            <thead>
                                                <tr>
                                                    <th style="vertical-align: top;" data-bind="text: lang.lang.no_"></th>
                                                    <th style="vertical-align: top;" data-bind="text: lang.lang.name"></th>
                                                    <th style="vertical-align: top;" data-bind="text: lang.lang.price"></th>
                                                </tr>
                                            </thead>
                                            <tbody data-role="listview" 
                                                data-template="rent-list-tmpl" 
                                                data-auto-bind="false"
                                                data-bind="source: rentAR">
                                            </tbody>
                                        </table>
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
                                                    title: 'SERVICES', 
                                                    editor: itemEditor, 
                                                    template: '#=item.name#', 
                                                    width: '170px'
                                                },
                                                { 
                                                    field: 'description', title:'DESCRIPTION',
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
                                                    format: '{0:n}',
                                                    editor: numberTextboxEditor,
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
                                                }
                                             ]"
                                             data-auto-bind="false"
                                             data-bind="source: lineDS" > 
                                        </div>
                                        <br />
                                        <a class="btn btn-inverse" data-bind="click: addRow">
                                            <i class="icon-plus icon-white"></i> Add
                                        </a>
                                    </div>
                                    <div class="tab-pane" id="Utility">
                                        <div class="control-group">
                                            <label for="ddlContactType">
                                                <span>Water Meter</span>
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
                                                <span>Eeletricity Meter</span>
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
                                    <div class="tab-pane" id="Deposit" style="position: relative;overflow: hidden;">
                                        <div data-bind="visible: isEdit" style="padding-top: 40px;display:none;text-align: center;position: absolute;width: 100%; height: 100%;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
                                           <span style="color: #fff;margin-top: 40px;font-size: 20px;font-weight: bold;">You can not edit deposit</span>
                                        </div>
                                        <div class="control-group">
                                            <label for="ddlContactType">
                                                <span data-bind="text: lang.lang.deposit"></span>
                                            </label>
                                            <input 
                                               data-role="dropdownlist"
                                               data-template="rent_price-list-tmpl"
                                               data-text-field="name"
                                               data-value-primitive="true"
                                               data-value-field="id"
                                               data-bind="value: obj.deposit_id,
                                                          source: contractDepositDS,
                                                          events: {change: depositChange}"
                                               data-option-label="(----select----)"
                                               required data-required-msg="required" style="width: 100%;margin-bottom: 20px;" />
                                        </div>
                                        <table class="table-fixed table-customer table table-bordered table-primary table-striped table-vertical-center">
                                            <thead>
                                                <tr>
                                                    <th style="vertical-align: top;" data-bind="text: lang.lang.no_"></th>
                                                    <th style="vertical-align: top;" data-bind="text: lang.lang.name"></th>
                                                    <th style="vertical-align: top;" data-bind="text: lang.lang.price"></th>
                                                </tr>
                                            </thead>
                                            <tbody data-role="listview" 
                                                data-template="deposit-list-tmpl" 
                                                data-auto-bind="false"
                                                data-bind="source: depositAR">
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane" id="Fine">
                                        <div class="control-group">
                                            <label for="ddlContactType">
                                                <span data-bind="text: lang.lang.fine"></span>
                                            </label>
                                            <input 
                                               data-role="dropdownlist"
                                               data-template="rent_price-list-tmpl"
                                               data-text-field="name"
                                               data-value-primitive="true"
                                               data-value-field="id"
                                               data-bind="value: obj.fine_id,
                                                          source: fineDS"
                                               data-option-label="(----select----)"
                                               required data-required-msg="required" style="width: 100%;" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="box-generic bg-action-button">
                                <div id="ntf1" data-role="notification"></div>
                                <div class="row">
                                    <div class="col-sm-3">
                                    </div>
                                    <div class="col-sm-9" align="right">
                                        <span class="btn-btn" data-bind="click: openConfirm, visible: isEdit"><span data-bind="text: lang.lang.delete"></span></span>
                                        <span id="saveClose" data-bind="click: cancel" class="btn-btn"><span data-bind="text: lang.lang.cancel">Cancel</span></span>
                                        <span id="saveNew" class="btn-btn" data-bind="click: save" >
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
                            </div>  
                            <div class="col-sx-12 col-sm-2">
                                <div class="control-group">                             
                                    <label ><span data-bind="text: lang.lang.property">License</span></label>
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
                                <div class="span4" style="padding-left: 15px;">
                                    <input data-role="dropdownlist"
                                           data-value-primitive="true"
                                           data-text-field="name"
                                           data-value-field="id"
                                           data-bind="value: txnForm,
                                                      source: txnTemplateDS"
                                           data-option-label="Select Template..." />
                                </div>
                                <div class="span8" align="right">
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
<script id="printBill" type="text/x-kendo-template">
    <div class="container">
        <div class="row-fluid">
            <div class="background">
                <div class="row-fluid">
                    <div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
                        <i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
                    </div>
                    <div id="example" class="k-content">
                        <h2 data-bind="text: lang.lang.print_bill">Print Bill</h2>
                        <div class="hidden-print pull-right">
                            <span class="glyphicons no-js remove_2" 
                                data-bind="click: cancel"><i></i></span>
                        </div>
                        <div class="clear"></div>

                        <div class=" row" style="clear:both;">
                            <div class="col-sx-12 col-sm-2"">
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
                            <div class="col-sx-12 col-sm-2"" >
                                <div class="control-group">
                                    <label ><span data-bind="text: lang.lang.property">License</span></label>
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
                            
                            <div class="col-sx-12 col-sm-2"">
                                <div class="control-group"> 
                                    <label ><span data-bind="text: lang.lang.action">Action</span></label>  
                                    <div class="row" style="margin: 0;">             
                                        <button type="button" data-role="button" data-bind="click: search" class="k-button" role="button" aria-disabled="false" tabindex="0"><i class="icon-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row saleSummaryCustomer" style="margin-top: 15px;">
                            <div class="col-sm-6" >
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="total-customer" style="width: 100%; background: #f4f5f8; padding: 15px; margin-bottom: 15px;">
                                            <p data-bind="text: lang.lang.total_invoice">Total Invoice</p>
                                            <span data-bind="text: totalInv"></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="total-customer" style="width: 100%; background: #f4f5f8; padding: 15px; margin-bottom: 15px;">
                                            <p data-bind="text: lang.lang.no_print">No Print</p>
                                            <span data-bind="text: noPrint, click: goNoPrint" style="cursor: pointer;"></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="total-customer" style="width: 100%; background: #f4f5f8; padding: 15px; margin-bottom: 15px;">
                                            <p>m<sup>3</sup>/kWh</p>
                                            <span data-bind="text: totalMeter"></span>                                              
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6" >
                                <div class="total-customer" style="background: #203864; color: #fff; padding: 15px;">
                                    <p data-bind="text: lang.lang.amount">Amount</p>
                                    <span data-bind="text: amountTotal"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row-fluid" style="margin-bottom: 15px" data-bind="visible: selectInv">
                            <table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs">
                                <thead>
                                    <tr>
                                        <th style="text-align:center"><input type="checkbox" data-bind="checked: chkAll, events: {change : checkAll}" /></th>                
                                        <th><span data-bind="text: lang.lang.customer">Contract</span></th>              
                                        <th><span data-bind="text: lang.lang.number">Customer</span></th>
                                        <th align="center"><span >Number</span></th>
                                        <th align="right"><span data-bind="text: lang.lang.amount">Amount</span></th>
                                    </tr>
                                </thead>
                                <tbody data-role="listview" 
                                        data-template="printbill-row-template" 
                                        data-auto-bind="false" 
                                        data-bind="source: invoiceCollection"></tbody>
                                <tfoot data-template="printbill-footer-template" 
                                            data-bind="source: this"></tfoot>            
                            </table>                        
                        </div>

                        <div class="box-generic bg-action-button">
                            <div id="ntf1" data-role="notification"></div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <input data-role="dropdownlist"
                                           data-value-primitive="true"
                                           data-text-field="name"
                                           data-value-field="id"
                                           data-auto-bind="false"
                                           data-bind="value: TemplateSelect,
                                                      source: txnTemplateDS"
                                           data-option-label="Select Template..." />
                                </div>
                                <div class="col-sm-9" align="right">
                                    <span class="btn-btn" data-bind="click: cancel" ><i></i> <span data-bind="text: lang.lang.cancel"></span></span>
                                    <span class="btn-btn" data-bind="click: printBill" ><i></i> <span data-bind="text: lang.lang.print_bill">Print Bill</span></span>                                   
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>      
</script>
<script id="previewInvoice" type="text/x-kendo-template">
    <div class="container">
        <div class="row-fluid">
            <div class="background">
                <div class="row-fluid">
                    <div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
                        <i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
                    </div>
                    <div id="example" class="k-content">
                        <div style="clear:both;position: relative;">
                            <h2 data-bind="text: lang.lang.invoice_preview">Invoice Preview</h2>
                            <div class="hidden-print pull-right">
                                <span class="glyphicons no-js remove_2" 
                                    data-bind="click: cancel"><i></i></span>
                            </div>
                        </div>

                        <span id="savePrint" class="btn btn-icon btn-primary glyphicons print" data-bind="click: printGrid" style="width: 120px; margin-bottom: 15px; float: none; clear: both;"><i></i><span data-bind="text: lang.lang.save_pdf">Save PDF</span></span>
                        <div class="clear"></div>

                        <div id="wInvoiceContent" style="margin-bottom: 15px;"></div>

                        <!-- Form actions -->
                        <div class="box-generic bg-action-button" align="right">
                            <span id="notification"></span>
                            <span class="btn-btn" data-bind="click: cancel" ><span data-bind="text: lang.lang.cancel">Cancel </span></span> 
                            <span id="savePrint" class="btn-btn" data-bind="click: printGrid"><span data-bind="text: lang.lang.save_pdf">Save PDF</span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</script>
<!-- Invoice Form-->
<script id="commercialInvoice" type="text/x-kendo-template">
    <!-- <div class="inv1">
        <div class="head" style="width: 90%">
            <div class="logo">
                <img class="logoP" style="position: absolute;left: 0;top: 20px;width: auto;height: 90px;" src="#: banhji.institute.logo.url#" alt="#: banhji.institute.name#" title="#: banhji.institute.name#" />
            </div>
            <div class="cover-name-company" style="margin-left: 20px;width: 50%;float: left;">              
                <h3 style="text-align:left;">#: banhji.institute.name#</h3>
                <div class="vattin">
                    <p>លេខ​អត្ត​សញ្ញាណ​កម្ម អតប (VATTIN)</p><span id="vat_number" >#: banhji.institute.vat_number#</span>
                </div>
                <div class="clear">                 
                    <p style="font-size: 10px;">ទូរស័ព្ទលេខ HP <span style="font-size: 12px;">#: banhji.institute.telephone#</span></p>
                    <p style="font-size: 10px;">អាស័យ​ដ្ឋាន Address: <span>#: banhji.institute.address#</span></p>
                </div>
            </div>
        </div>
        <div class="content">
            <div style="overflow: hidden;padding:10px 0;">
                <h1>វិក្កយបត្រ</h1>
                <h2>Invoice</h2>
            </div>
            <div class="clear mid-header" style="padding: 10px;background: \#dce6f2;padding-bottom: 10px;">
                <div class="cover-customer">
                    <h5>ព័ត៌មានអតិថិជន​ CUSTOMER INFO:</h5>
                    <div class="clear">
                        <div class="left dotted-ruler" style="width: 62%;">
                            <p style="font-size: 12px; line-height: 20px;">ឈ្មោះ Name : <span>#: contactar.name#</span><br>
                            អាស័យ​ដ្ឋាន Address : <span>#: contactar.address#</span><br>
                            លេខទូរស័ព្ទ Tel : <span>#: contactar.phone#</span>
                            </p>
                        </div>
                    </div>
                    <div class="vattin">
                    <p>លេខ​អត្ត​សញ្ញាណ​កម្ម អតប (VATTIN)</p><span id="vat_number">#: contactar.vat_no#</span><p style="font-size:8px;font-weight:normal;margin-left: 8px;">(ប្រសិន​បើ​មាន / If any)</p>
                    </div>
                </div>
                <div class="cover-inv-number" style="width: 42%;">
                    <div class="clear">
                        <div class="left">
                            <p>លេខ No. :</p>
                        </div>
                        <div class="left dotted-ruler" style="width: 42%;">
                            <span>#: number#</span>-<span style="font-weight:bold">#: banhji.institute.id#</span>
                        </div>
                    </div>
                    <div class="clear">
                        <div class="left">
                            <p>កាល​បរិច្ឆេទ Date:</p>
                        </div>
                        <div class="left dotted-ruler" style="width: 57%;">
                            <p style="font-weight:bold">#: issued_date#</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clear">
                <table cellpadding="0" cellspacing="0" border="1" class="span12">
                    <thead>
                        <tr class="main-color" style="height: 45px;">
                            <th style="text-align: center;">ល.រ<br />N<sup>0</sup></th>
                            <th style="text-align: center;">បរិយាយ​មុខ​ទំនិញ<br />Description</th>
                            <th style="text-align: center;">បរិមាណ<br />Quantity</th>
                            <th style="text-align: center;">ថ្លៃឯកតា​<br />Unit Price</th>
                            <th style="text-align: center;">ថ្លៃ​ទំនិញ<br />Amount</th>
                        </tr>
                    </thead>
                    <tbody style="margin-top: 2px" id="formListView">
                        #$.each(invoice_lines, function(i,v){#
                            #if(v.type == 'electricity_meter'){#
                                <tr>
                                    <td><i>#:i+1#</i>&nbsp;</td>
                                    <td class="lside">#: name# (#: usage#kwh)</td>
                                    <td>1</td>
                                    <td class="rside" width="70">#= kendo.toString(v.price, "c", locale) #</td>
                                    <td class="rside">#= kendo.toString(v.amount, "c", locale) #</td>
                                </tr>
                            #}else if(v.type == 'water_meter'){#
                                <tr>
                                    <td><i>#:i+1#</i>&nbsp;</td>
                                    <td class="lside">#: name# (#: usage#kwh)</td>
                                    <td>1</td>
                                    <td class="rside" width="70">#= kendo.toString(v.price, "c", locale) #</td>
                                    <td class="rside">#= kendo.toString(v.amount, "c", locale) #</td>
                                </tr>
                            #}else{#
                                <tr>
                                    <td><i>#:i+1#</i>&nbsp;</td>
                                    <td class="lside">#: name#</td>
                                    <td>1</td>
                                    <td class="rside" width="70">#= kendo.toString(v.price, "c", locale) #</td>
                                    <td class="rside">#= kendo.toString(v.amount, "c", locale) #</td>
                                </tr>
                            #}#
                        #})#
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4" style="text-align:right;padding:5px;font-weight: bold;">បញ្ចុះតម្លៃ Discount</td>
                            <td style="text-align: right; padding-right: 5px;"></td>
                        </tr>
                        <tr>
                            <td colspan="4" style="text-align:right;padding:5px;font-weight: bold;">សរុប (បូក​បញ្ចូល​ទាំង​អាករ)​ Total (VAT included)</td>
                            <td style="text-align: right; padding-right: 5px;">#: amount#</td>
                        </tr>
                        <tr>
                            <td colspan="4" style="text-align:right;padding:5px;font-weight: bold;">ប្រាក់កក់ Deposit</td>
                            <td style="text-align: right; padding-right: 5px;"></td>
                        </tr>
                        <tr>
                            <td colspan="4" style="text-align:right;padding:5px;font-weight: bold;">សាច់ប្រាក់ត្រូវទូទាត់ Amount Due</td>
                            <td style="text-align: right; padding-right: 5px;"></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="foot">
            <div class="cover-signature">
                <div class="singature" style="float:left">
                    <p>ហត្ថលេខា និងឈ្មោះ​អ្នក​ទិញ<br />Customer's Signature & Name</p>
                </div>
                <div class="singature" style="float:right">
                    <p>ហត្ថលេខា និងឈ្មោះ​អ្នកលក់<br />Seller's Signature & Name</p>
                </div>
            </div>
            <h6 style="padding-left: 35px;">សម្គាល់៖ <span>ច្បាប់​ដើម​សម្រាប់​អ្នក​ទិញ ច្បាប់​ចម្លង​សម្រាប់​អ្នក​លក់</span><br /><span style="font-size: 10px"><strong>Note:</strong> Original invoice for customer, copied invoice for seller</span></h6>
        </div>
    </div> -->
    <style>
        body {
            color: \#333;
            font-family: "Open Sans", 'Battambang';
            font-size: 12px;
            background: \#fff;
        }
        *{
          margin: 0 auto;
          padding: 0;
          -webkit-print-color-adjust:exact;
          font-size: 12px;
          color: \#000;
        }
        .clear{
            clear: both;
        }
        table td {
            padding: 5px;
        }
    </style>
    <div class="inv1" style="width: 100%; background-color: \#fff!important; position: relative; overflow: hidden;padding-top: 40px;page-break-after: always;">
        <div class="head" style="width: 90%;">
            <div class="logo" style="width: 20%; float: left;">
                <img class="logoP" style="width: 100%;" src="#: banhji.institute.logo.url#" alt="#: banhji.institute.name#" title="#: banhji.institute.name#" />
            </div>
            <div class="cover-name-company" style="margin-left: 20px;width: 72%;float: left;">
                <h3 style="float: left;font-size: 20px; font-family: 'Preahvihear', 'Roboto Slab' !important;" >#: banhji.institute.name#</h3>
                <div class="vattin" style="float: left; width: 100%">
                    <p style="float: left; width: 100%">
                        <span style="float: left; margin-left:0;font-size: 14px; line-height: 20px;">លេខ​អត្ត​សញ្ញាណ​កម្ម អតប (VAT TIN) </span>
                        <span style="float: left; margin-left:0;font-size:14px;line-height: 20px;" >#: banhji.institute.vat_no#</span>
                    </p>
                </div>
                <div class="clear" style="float: left;">
                    <p style="float: left; text-align: left;font-size: 14px;margin: 0;">អាស័យ​ដ្ឋាន Address: <span >#: banhji.institute.address#</span></p>
                    <p style="float: left;width: 100%">ទូរស័ព្ទលេខ HP: <span >#: banhji.institute.telephone# </span> <br/> Email: <span >#: banhji.institute.email#</span></p>
                </div>
            </div>
        </div>
        <div class="content" style="padding: 1% 5%; position: relative; clear: both; overflow: hidden;">
            <div style="overflow: hidden; padding:10px 0; background: \#001F5F!important;-webkit-print-color-adjust:exact; color: \#fff; margin-bottom: 15px;">
                <div class="span5" style="width: 41.66666667%; float: left;">
                    <h1 style="float: left; color: \#fff!important;margin-top: 5px;padding-left: 30px; text-align: left;text-transform: uppercase;font-family: 'Preahvihear', 'Roboto Slab'!important;font-size: 23px;">វិក្កយបត្រ Invoice</h1>
                </div>
                <div class="span6" style="float: right; width: 51%;">
                    <table style="float: left; width: 100%;margin-top: 10px;">
                        <tr>
                            <td style="border:0;text-align: left; width: 40%;text-transform: uppercase;color: \#fff!important;">លេខវិក្កយបត្រ (Invoice N0.) :</td>
                            <td style="border:0;text-align: left;font-weight: bold;color: \#fff!important;">#: number#</td>
                        </tr>
                        <tr>
                            <td style="border:0;text-align: left; text-transform: uppercase;color: \#fff!important;">កាលបរិច្ឆេទ (Date) :</td>
                            <td style="border:0;text-align: left;font-weight: bold;color: \#fff!important;">#= issued_date#</td>
                        </tr>
                    </table>
                </div>              
            </div>
            <div class="span12 pcg2" style="margin-bottom: 15px;padding: 0;">
                <div class="span6" style="padding-right: 10px; width: 48%; float: left;padding: 0;">
                    <table style="float: left; width: 100%; border: 1px solid \#000;border-collapse: collapse; margin-bottom: 0px;">
                        <!-- <tr>
                            <td style="padding: 5px; border: 1px solid \#000; text-align: left; width: 35%; background: \#F1F1F1!important;">អ្នកគិតលុយ (Cashier) </td>
                            <td style="padding: 5px; border: 1px solid \#000; text-align: left;">#: cashier_name#</td>
                        </tr> -->
                        <tr>
                            <td style="padding: 5px; border: 1px solid \#000; text-align: left; width: 35%; background: \#F1F1F1!important;">ឈ្មោះអតិថិជន (Customer Name) </td>
                            <td style="padding: 5px; border: 1px solid \#000; text-align: left;">#: contactar.name#</td>
                        </tr>
                        <tr>
                            <td style="padding: 5px; border: 1px solid \#000; text-align: left; width: 35%; background: \#F1F1F1!important;">លេខកុងត្រា (Contract No.) :</td>
                            <td style="padding: 5px; border: 1px solid \#000; text-align: left;">#: contract#</td>
                        </tr>
                    </table>
                </div>
                <div class="span6" style=" width: 51%; padding-left: 0; float: right;padding: 0;">
                    <table style="float: left; width: 100%; border: 1px solid \#000; border-collapse: collapse;">
                        <!-- <tr>
                            <td style="padding: 5px; border: 1px solid \#000; text-align: left; width: 35%; background: \#F1F1F1!important;">កាលបរិច្ឆេទ (Date) </td>
                            <td style="padding: 5px; border: 1px solid \#000; text-align: left;">#= kendo.toString(new Date(issued_date), "F")#</td>
                        </tr> -->
                        <tr>
                            <td style="padding: 5px; border: 1px solid \#000; text-align: left; width: 35%; background: \#F1F1F1!important;">អ្នកគិតលុយ (Cashier) :</td>
                            <td style="padding: 5px; border: 1px solid \#000; text-align: left;"></td>
                        </tr>
                        <tr>
                            <td style="padding: 5px; border: 1px solid \#000; text-align: left; width: 35%; background: \#F1F1F1!important;">បុគ្គលិក (Staff) :</td>
                            <td style="padding: 5px; border: 1px solid \#000; text-align: left;" ></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="clear inv2" style="margin-bottom:20px;" > 
                <table cellpadding="0" cellspacing="0" border="1" style="width:100%;">
                    <thead>
                        <tr class="main-color" style="height: 45px;">
                            <th style="text-align: center;">ល.រ<br />N<sup>0</sup></th>
                            <th style="text-align: center;">បរិយាយ​មុខ​ទំនិញ<br />Description</th>
                            <th style="text-align: center;">បរិមាណ<br />Quantity</th>
                            <th style="text-align: center;">ថ្លៃឯកតា​<br />Unit Price</th>
                            <th style="text-align: center;">ថ្លៃ​ទំនិញ<br />Amount</th>
                        </tr>
                    </thead>
                    <tbody style="margin-top: 2px" id="formListView">
                        #$.each(invoice_lines, function(i,v){#
                            #if(v.type == 'electricity_meter'){#
                                <tr>
                                    <td><i>#:i+1#</i>&nbsp;</td>
                                    <td class="lside">#: name# (#: usage#kwh)</td>
                                    <td>1</td>
                                    <td class="rside" width="70">#= kendo.toString(v.price, "c", locale) #</td>
                                    <td class="rside">#= kendo.toString(v.amount, "c", locale) #</td>
                                </tr>
                            #}else if(v.type == 'water_meter'){#
                                <tr>
                                    <td><i>#:i+1#</i>&nbsp;</td>
                                    <td class="lside">#: name# (#: usage#kwh)</td>
                                    <td>1</td>
                                    <td class="rside" width="70">#= kendo.toString(v.price, "c", locale) #</td>
                                    <td class="rside">#= kendo.toString(v.amount, "c", locale) #</td>
                                </tr>
                            #}else{#
                                <tr>
                                    <td><i>#:i+1#</i>&nbsp;</td>
                                    <td class="lside">#: name#</td>
                                    <td>1</td>
                                    <td class="rside" width="70">#= kendo.toString(v.price, "c", locale) #</td>
                                    <td class="rside">#= kendo.toString(v.amount, "c", locale) #</td>
                                </tr>
                            #}#
                        #})#
                    </tbody>
                    <tfoot>
                        <tr>
                            <td style="height:40px!important;"></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="4" style="padding-right: 10px;text-align: right;">សរុប (បូកបញ្ចូលទាំងអាករ) GRAND TOTAL (VAT INCLUSIVE)</td>
                            <td style="border: 1px solid;text-align: right"><strong>#= kendo.toString(amount, locale=="km-KH"?"c0":"c", locale)#</strong></td>
                        </tr>
                    </tfoot>
                </table>
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
                   data-value-primitive="true"
                   data-text-field="name"
                   data-value-field="id"
                   data-bind="value: account_id,
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
                   data-value-primitive="true"
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
                   data-value-primitive="true"
                   data-text-field="name"
                   data-auto-bind="true"
                   data-value-field="id"
                   data-bind="value: account_id,
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
    <span> #= kendo.toString(amount, _currency.locale=="km-KH"?"c0":"c", _currency.locale)#</span>
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
<script id="rent-list-tmpl" type="text/x-kendo-tmpl">
    <tr data-uid="#: uid #">
        <td>
            <i class="icon-trash" data-bind="events: { click: rmRent }"></i>
            #:banhji.Contract.rentAR.indexOf(data)+1#      
        </td>
        <td>#= name#</td>
        <td>#= kendo.toString(price, _currency.locale=="km-KH"?"c0":"c", _currency.locale)#</td>
    </tr>
</script>
<script id="deposit-list-tmpl" type="text/x-kendo-tmpl">
    <tr data-uid="#: uid #">
        <td>
            <i class="icon-trash" data-bind="events: { click: rmDeposit }"></i>
            #:banhji.Contract.depositAR.indexOf(data)+1#      
        </td>
        <td>#= name#</td>
        <td>#= kendo.toString(amount, locale=="km-KH"?"c0":"c", locale)#</td>
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
<script id="printbill-row-template" type="text/x-kendo-tmpl">
    <tr>
        <td align="center"><input type="checkbox" data-bind="checked: printed, events: {change: isCheck}" /></td>
        <td>#= contract#</td>       
        <td>#= contactar.name#</td>
        <td class="right">#= number#</td>
        <td class="right">#= kendo.toString(amount, locale=="km-KH"?"c0":"c", locale)#</td>
    </tr>
</script>
<script id="printbill-footer-template" type="text/x-kendo-template">
    <tr>        
        <td class="right" colspan="8" style="font-size:30px;">
            <span data-bind="text: lang.lang.total"></span>: <span data-bind="text: totalMeter"></span>m<sup>3</sup>/kWh
        </td>
    </tr>
</script>
<script id="segment-list-tmpl" type="text/x-kendo-tmpl">
    <span>#=code#</span> <span>#=name#</span>
</script>
<!--Cash Reciept-->
<script id="Receipt" type="text/x-kendo-template">
    <div class="container">
        <div class="row-fluid">
            <div class="background">
                <div class="row-fluid">
                    <div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
                        <i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
                    </div>
                    <div id="example" class="k-content">
                        <div class="hidden-print hidden-lg hidden-md pull-right">
                            <span class="glyphicons no-js remove_2" 
                                data-bind="click: cancel"><i></i></span>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-4">
                                <table width="100%" cellpadding="10">
                                    <tr>
                                        <td>
                                            <h2 style="width: 100%" data-bind="text: lang.lang.wreceipt">Receipt</h2>
                                            <p>
                                                <span data-bind="text: lang.lang.in_here"></span>
                                            </p>
                                            <p style="width: 100%; float: left; margin-top: 8px;">
                                                <span style="position: relative; height: 35px; line-height: 35px;  float: left; display: block; ">
                                                    <a data-bind="text: lang.lang.reconcile_transfer" style="color: #203864; line-height: 17px; background: #fff; width: 100%; padding: 10px 13px; font-size: 18px; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1; float: left;" href="#/reconcile">
                                                        Reconcile & Transfer
                                                    </a>
                                                </span>
                                            </p>
                                        </td>
                                    </tr>
                                </table>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12">
                                        <div class="innerAll padding-bottom-none-phone" style="padding: 0 !important; margin: 8px 0 15px 0;">
                                            <a href="javascript:void(0)" class="widget-stats widget-stats-gray widget-stats-4" style="background: #fff; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1; "> 
                                                <span class="txt" style="color: #203864;"><span data-bind="text: lang.lang.customer">Customer</span></span>
                                                <span class="count" style="color: #203864;" data-bind="text: numCustomer">0</span>
                                                <span class="glyphicons user userss"><i></i></span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12">
                                        <div class="innerAll padding-bottom-none-phone" style="background: #fff; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1; margin: 0 0 15px 0">
                                            <a href="#/wPayment_summary" class="widget-stats widget-stats-primary widget-stats-4" style="background: #fff; padding-left: 15px !important;">
                                                <span class="txt" style="color: #203864;"><span data-bind="text: lang.lang.today_payment">Today Payment</span></span>
                                                <span class="count"><span style="font-size: 35px; color: #203864;" data-bind="text: paymentReceiptToday">0៛</span></span>
                                                <span class="glyphicons coins addcolors"><i></i></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="cover-block" style="padding-left: 15px; padding-right: 15px;">
                                    <h2 data-bind="text: lang.lang.reports" style="width: 100%;">Report</h2>
                                    <p data-bind="text: lang.lang.summary_and_detail_cash">
                                        Summary and detail cash receipt reports grouped by sources/ methods of receipts
                                    </p>
                                    <ul >
                                        <li><a href="#/cash_receipt_detail"><span data-bind="text: lang.lang.cash_receipt_by_detail">Cash Receipt By Detail</span></a></li>  
                                        <li><a href="#/cash_receipt_source_summary"><span data-bind="text: lang.lang.cash_receipt_by_sources_summary">Cash Receipt By Sources Summary</span></a></li>
                                        <li><a href="#/cash_receipt_source_detail"><span data-bind="text: lang.lang.cash_receipt_by_sources_detail">Cash Receipt By Sources Detail</span></a></li> 
                                    </ul>
                                </div>
                                <!-- <span class="btn btn-icon btn-warning glyphicons remove" data-bind="visible: haveSession ,click: endSession" style="width: 100%;background: #a22314; border-radius: 0;"><i></i> <span data-bind="text: lang.lang.end_session">End Session</span></span> -->
                            </div>
                            <div class="col-xs-12 col-sm-8" style="padding-right: 0">
                                <div class="hidden-print hidden-xs hidden-sm pull-right">
                                    <span class="glyphicons no-js remove_2" 
                                        data-bind="click: cancel"><i></i></span>
                                </div>
                                <!--Session-->
                                <div class="row-fluid" data-bind="invisible: haveSession" style="width:100%;background: #fff; float: left; padding: 15px; margin-left: -15px;">
                                    <h2 style="padding:0 15px 0 0;" data-bind="text: lang.lang.start_session">Start Session</h2><br><br>
                                    <table class="table table-bordered table-primary table-striped table-vertical-center">
                                        <thead>
                                            <tr>
                                                <th class="center" style="width: 50px;"><span data-bind="text: lang.lang.no_">No.</span></th> 
                                                <th><span data-bind="text: lang.lang.amount">Amount</span></th>
                                                <th><span data-bind="text: lang.lang.currency">Currency</span></th>
                                            </tr> 
                                        </thead>
                                        <tbody data-role="listview" 
                                            data-template="cashier-session-template" 
                                            data-auto-bind="false"
                                            data-bind="source: cashierItemDS"></tbody>
                                    </table>
                                    <span class="btn btn-icon btn-primary glyphicons ok_2" style="width: 135px;float: left; margin-bottom: 0px;"><i></i><span data-bind="text: lang.lang.add_session, click: addSession">Save</span></span>
                                </div>
                                <!--End Session-->
                                <div id="loadING" style="display:none;text-align: center;position: absolute;top: 0; left: 0;width: 100%; height: 100%;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
                                    <i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 45%;left: 45%"></i>
                                </div>
                                <div class="row" data-bind="visible: haveSession" style="background: #fff; float: left; width: 100%; padding: 15px 0 0;">
                                    <div class="col-sm-12" style="padding-right: 0;/">
                                        <!-- Upper Part -->
                                        <div class="row" >
                                            <div class="col-sm-12" style="display: none;">
                                                <div class="box-generic-noborder" >
                                                    <div class="tab-content" style="padding-top: 12px;">
                                                        <div class="col-sm-3" style="padding-left: 0;">
                                                            <div class="control-group">
                                                                <label ><span data-bind="text: lang.lang.license">License</span></label>
                                                                <input 
                                                                    data-role="dropdownlist" 
                                                                    style="width: 100%;" 
                                                                    data-option-label="License ..." 
                                                                    data-auto-bind="false" 
                                                                    data-value-primitive="true" 
                                                                    data-text-field="name" 
                                                                    data-value-field="id" 
                                                                    data-bind="
                                                                        value: licenseSelect,
                                                                        source: licenseDS,
                                                                        events: {change: licenseChange}">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3" style="padding-left: 0;">
                                                            <div class="control-group">                             
                                                                <label ><span data-bind="text: lang.lang.location">Bloc</span></label>
                                                                <input 
                                                                    data-role="dropdownlist" 
                                                                    style="width: 100%;" 
                                                                    data-option-label="Location ..." 
                                                                    data-auto-bind="false" 
                                                                    data-value-primitive="true" 
                                                                    data-text-field="name" 
                                                                    data-value-field="id" 
                                                                    data-bind="
                                                                        value: locationSelect,
                                                                        source: locationDS,
                                                                        events: {change: blocChange},
                                                                        enabled: slocation">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3" style="padding-left: 0;">
                                                            <div class="control-group">                             
                                                                <label ><span data-bind="text: lang.lang.month_of">Month Of</span></label>
                                                                <input type="text" 
                                                                    style="width: 100%;" 
                                                                    data-role="datepicker"
                                                                    data-format="MM-yyyy"
                                                                    data-start="year" 
                                                                    data-depth="year" 
                                                                    placeholder="Moth of ..." 
                                                                    data-bind="value: monthSelect,
                                                                                enabled: haveMonth,
                                                                                events: {change: monthChange}" />
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-1" style="padding-left: 0;">
                                                            <div class="control-group">
                                                                <label ><span data-bind="text: lang.lang.action">Action</span></label>  
                                                                <div class="row" style="margin: 0;">
                                                                    <button type="button" data-role="button" data-bind="click: searchINV" class="k-button" role="button" aria-disabled="false" tabindex="0"><i class="icon-search"></i></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-2" data-bind="visible: downloadView" style="padding-left: 0;">
                                                            <div class="control-group">
                                                                <label ><span data-bind="text: lang.lang.download">Download</span></label>  
                                                                <div class="row" style="margin: 0;">
                                                                    <button type="button" data-role="button" data-bind="click: ExportExcel" class="k-button" role="button" aria-disabled="false" tabindex="0"><i class="download_alt"></i> <span data-bind="text: lang.lang.download"></span></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-2" data-bind="visible: balanceView" style="padding-left: 0;">
                                                            <div class="control-group">
                                                                <label ><span data-bind="text: lang.lang.balance">Download</span></label>   
                                                                <div class="row" style="margin: 0;">
                                                                    <button type="button" data-role="button" data-bind="click: serachBalance" class="k-button" role="button" aria-disabled="false" tabindex="0"><i class="download_alt"></i> <span data-bind="text: lang.lang.balance"></span></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" >
                                            <div class="col-xs-12 col-sm-6">
                                                <div class="widget widget-heading-simple widget-body-primary widget-employees">
                                                    <div class="widget-body padding-none" style="background: none; width: 100%; float: left; border: none; padding: 0;">
                                                        <div class="row-fluid row-merge">
                                                            <div class="listWrapper" style="min-height: 0; margin-bottom: 15px; padding: 0;">
                                                                <div style="margin-bottom: 10px;">
                                                                    <input id="ddlPaymentMethod" name="ddlPaymentMethod"
                                                                            data-role="dropdownlist"
                                                                            data-value-primitive="true"
                                                                            data-text-field="name" 
                                                                            data-value-field="id"
                                                                            data-bind="
                                                                                value: searchSelect,
                                                                                source: searchSelectDS,
                                                                                events: { change: changeSearchMethod}"
                                                                            required data-required-msg="required" 
                                                                            style="width: 100%" />
                                                                </div>
                                                                <div class="innerAll" style="padding: 15px 15px 0;overflow: hidden;">
                                                                    <div class="widget-search separator bottom" data-bind="visible: haveSearchInv">
                                                                        <button class="btn btn-default pull-right" data-bind="click: search"><i class="icon-search"></i></button>
                                                                        <div class="overflow-hidden">
                                                                            <input style="line-height: 26px;" type="text" placeholder="Invoice Number..." data-bind="
                                                                                value: searchText,
                                                                                events: {change: search}
                                                                            ">
                                                                        </div>
                                                                    </div>
                                                                    <div style="margin-bottom: 15px;" data-bind="visible: haveSearchCus">
                                                                        <input data-role="combobox"
                                                                                data-placeholder="Customer Name"
                                                                                data-value-primitive="true"
                                                                                data-text-field="name"
                                                                                data-value-field="id"
                                                                                data-filter="contains"
                                                                                data-min-length="3"
                                                                                data-bind="
                                                                                    value: selectedCustomer,
                                                                                    source: customerDS,
                                                                                    events: {
                                                                                        change: search
                                                                                    }"
                                                                               style="width: 100%;"
                                                                        />
                                                                    </div>
                                                                    <div style="margin-bottom: 15px;" data-bind="visible: haveSearchMet">
                                                                        <input data-role="combobox"
                                                                                data-placeholder="Meter Number"
                                                                                data-value-primitive="true"
                                                                                data-text-field="number"
                                                                                data-value-field="id"
                                                                                data-filter="contains"
                                                                                data-min-length="3"
                                                                                data-bind="
                                                                                    value: selectedMeter,
                                                                                    source: searchMeterDS,
                                                                                    events: {
                                                                                        change: search
                                                                                    }"
                                                                               style="width: 100%;"
                                                                        />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="strong" style="margin-bottom: 15px; width: 100%; padding: 10px; float: left;" align="center"
                                                    data-bind="style: { backgroundColor: amtDueColor}">
                                                    <div align="left"><span data-bind="text: lang.lang.amount_received"></span></div>
                                                    <h2 data-bind="text: total_received" align="right"></h2>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-6">
                                                <div class="box-generic-noborder" >
                                                    <div class="tab-content">
                                                        <!-- Options Tab content -->
                                                        <div class="tab-pane active" id="tab1-1">
                                                            <table style="margin-bottom: 0;" class="table table-borderless table-condensed cart_total">
                                                                <tr>
                                                                    <td><span data-bind="text: lang.lang.date"></span></td>
                                                                    <td class="right">
                                                                        <input id="issuedDate" name="issuedDate" 
                                                                            data-role="datepicker"
                                                                            data-format="dd-MM-yyyy"
                                                                            data-parse-formats="yyyy-MM-dd HH:mm:ss"
                                                                            data-bind="value: obj.issued_date, 
                                                                                        events:{ change : issuedDateChanges }" 
                                                                            required data-required-msg="required"
                                                                            style="width:100%;" />
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <span data-bind="text: lang.lang.payment_term"></span>
                                                                    </td>
                                                                    <td>
                                                                        <input id="ddlPaymentMethod" name="ddlPaymentMethod"
                                                                            data-role="dropdownlist"
                                                                            data-value-primitive="true"
                                                                            data-text-field="name" 
                                                                            data-value-field="id"
                                                                            data-bind="value: obj.payment_method_id,
                                                                                        source: paymentMethodDS"
                                                                            data-option-label="Select Method..."
                                                                            required data-required-msg="required" 
                                                                            style="width: 100%" />
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><span data-bind="text: lang.lang.cash_account"></span></td>
                                                                    <td>
                                                                        <input id="ddlCashAccount" name="ddlCashAccount" 
                                                                            data-role="dropdownlist"
                                                                            data-template="account-list-tmpl"
                                                                            data-value-primitive="true"
                                                                            data-text-field="name" 
                                                                            data-value-field="id"
                                                                            data-bind="value: obj.account_id,
                                                                                        source: accountDS"
                                                                            data-option-label="Select Account..."
                                                                            required data-required-msg="required" 
                                                                            style="width: 100%" />
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><span data-bind="text: lang.lang.segment"></span></td>
                                                                    <td>
                                                                        <select data-role="multiselect"
                                                                           data-value-primitive="true"
                                                                           data-item-template="segment-list-tmpl" 
                                                                           data-value-field="id" 
                                                                           data-text-field="code"
                                                                           data-bind="value: obj.segments, 
                                                                                    source: segmentItemDS,
                                                                                    events:{ change: segmentChanges }"
                                                                           data-placeholder="Add Segment.."
                                                                           style="width: 100%" /></select>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <table class="table table-bordered table-primary table-striped table-vertical-center" style="margin-top: 15px;">
                                            <thead>
                                                <tr>
                                                    <th style="vertical-align: top;" data-bind="text: lang.lang.no_"></th>
                                                    <th style="vertical-align: top;" data-bind="text: lang.lang.date"></th>
                                                    <th style="vertical-align: top;" data-bind="text: lang.lang.name"></th>
                                                    <th style="vertical-align: top;" data-bind="text: lang.lang.number"></th>
                                                    <th style="vertical-align: top;" data-bind="text: lang.lang.meter"></th>
                                                    <th style="vertical-align: top;" data-bind="text: lang.lang.amount"></th>
                                                    <th style="vertical-align: top;" data-bind="visible: chhDiscount, text: lang.lang.discount"></th>
                                                    <th style="vertical-align: top;" data-bind="text: lang.lang.receive"></th>
                                                </tr>
                                            </thead>
                                            <tbody data-role="listview" 
                                                data-template="cashReceipt-list-template" 
                                                data-auto-bind="false"
                                                data-bind="source: dataSource"></tbody>
                                        </table>
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-5"> 
                                                <div class="btn-group">
                                                    <div class="leadcontainer">
                                                    </div>
                                                    <a style="margin-bottom: 15px" class="btn btn-default dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-list"></i> </a>
                                                    <ul class="dropdown-menu" style="padding: 5px; border-radius:0;">
                                                        <li>
                                                            <input type="checkbox" id="chhDiscount" class="k-checkbox" data-bind="checked: chhDiscount">
                                                            <label class="k-checkbox-label" for="chhDiscount"><span data-bind="text: lang.lang.discount"></span></label>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <br>
                                            </div>
                                            <div class="col-xs-12 col-sm-7">
                                                <table class="table table-condensed table-striped table-white">
                                                    <tbody>
                                                        <tr>
                                                            <td class="right"><span data-bind="text: lang.lang.total_received"></span>:</td>
                                                            <td class="right strong"><span data-bind="text: total_received"></span></td>
                                                            <td class="right"><span data-bind="text: lang.lang.subtotal"></span>:</td>
                                                            <td class="right strong" width="40%"><span data-format="n2" data-bind="text: obj.sub_total"></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="right"><span data-bind="text: lang.lang.remaining"></span>:</td>
                                                            <td class="right strong"><span data-format="n2" data-bind="text: obj.remaining"></span></td>
                                                            <td class="right"><span data-bind="text: lang.lang.total_discount"></span>:</td>
                                                            <td class="right strong">
                                                                <span data-format="n2" data-bind="text: obj.discount"></span>
                                                            </td>
                                                        </tr>
                                                        <tr data-bind="visible: haveFine">
                                                            <td></td>
                                                            <td></td>
                                                            <td class="right">
                                                                <span data-bind="text: lang.lang.fine"></span>
                                                            </td>
                                                            <td class="right strong">
                                                                <span data-format="n2" data-bind="text: amountFine"></span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td class="right"><h4 data-bind="text: lang.lang.total"></h4></td>
                                                            <td class="right strong"><h4 data-bind="text: total"></h4></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-5" >
                                                <div class="well" style="overflow: hidden;">
                                                    <textarea cols="0" rows="2" class="k-textbox" style="width:100% !important;" data-bind="value: obj.memo" placeholder="memo for external ..."></textarea>
                                                    <textarea cols="0" rows="2" class="k-textbox" style="width:100% !important;" data-bind="value: obj.memo2" placeholder="memo for internal ..."></textarea>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-7" data-bind="visible: btnActive">
                                                <table class="table table-bordered table-primary table-striped table-vertical-center">
                                                    <thead>
                                                        <tr>
                                                            <th style="vertical-align: top;"><span data-bind="text: lang.lang.no_">No.</span></th>
                                                            <th style="vertical-align: top;"><span data-bind="text: lang.lang.currency">Currency</span></th>
                                                            <th style="vertical-align: top;"><span data-bind="text: lang.lang.cash_receipt">Cash Receipt</span></th>
                                                        </tr> 
                                                    </thead>
                                                    <tbody data-role="listview" 
                                                        data-template="cash-currency-template" 
                                                        data-auto-bind="false"
                                                        data-bind="source: receipCurrencyDS"></tbody>
                                                </table>
                                                <div class="row-fluid" data-bind="visible: haveChangeMoney">
                                                    <h5 data-bind="text: lang.lang.change_currency"></h5><br>
                                                    <table class="table table-bordered table-primary table-striped table-vertical-center">
                                                        <thead>
                                                            <tr>
                                                                <th class="center" style="width: 50px;"><span data-bind="text: lang.lang.no_">No.</span></th>
                                                                <th><span data-bind="text: lang.lang.currency">Currency</span></th>
                                                                <th><span data-bind="text: lang.lang.cash_receipt">Cash Receipt</span></th>
                                                            </tr> 
                                                        </thead>
                                                        <tbody data-role="listview" 
                                                            data-template="change-currency-receipt-template" 
                                                            data-auto-bind="false"
                                                            data-bind="source: receipChangeDS"></tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="box-generic bg-action-button">
                                            <div id="ntf1" data-role="notification"></div>
                                            <div class="row">
                                                <div class="col-sm-12" align="right">
                                                    <span class="btn-btn" data-bind="click: cancel" ><span data-bind="text: lang.lang.cancel"></span></span>
                                                    <span id="saveNew" class="btn-btn" data-bind="visible: btnActive, click: save" ><span data-bind="text: lang.lang.save"></span></span>       
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
        </div>
    </div>
</script>
<script id="cashier-session-template" type="text/x-kendo-template">
    <tr>
        <td>
            #:banhji.Receipt.cashierItemDS.indexOf(data)+1# 
        </td>
        <td>
            <input style="text-align: right;" id="numeric" class="k-formatted-value k-input" type="number" value="17" min="0" data-bind="value: amount" step="1" />
        </td>
        <td>
            <p> #: currency# </p>
        </td>
    </tr>
</script>
<script id="cashReceipt-template" type="text/x-kendo-template">
    <tr data-uid="#: uid #">        
        <td>
            <i class="icon-trash" data-bind="events: { click: removeRow }"></i>
            #:banhji.Receipt.dataSource.indexOf(data)+1#            
        </td>       
        <td>#=kendo.toString(new Date(due_date), "dd-MM-yyyy")#</td>
        <td>#=contact.name#</td>        
        <td>#=number#</td>
        <td data-bind="visible: showCheckNo">
            <input type="text" class="k-textbox" 
                    data-bind="value: check_no"
                    style="width: 100%; margin-bottom: 0;" />
        </td>   
        <td class="center">
            #=amount#
        </td>   
        <td> 
            <input data-role="numerictextbox"
                   data-spinners="false"
                   data-culture=""
                   data-decimals="2"
                   data-min="0"                   
                   data-bind="value: discount"
                   style="width: 100%;">
        </td>
        <td class="center">
            <input data-role="numerictextbox"
                   data-spinners="false"
                   data-culture=""
                   data-format="c"
                   data-decimals="3"
                   data-min="0"                   
                   data-bind="value: received,
                              events: { change: changes }"
                   style="width: 100%;">            
        </td>
    </tr> 
</script>
<script id="cashReceipt" type="text/x-kendo-template">
    <div id="slide-form">
        <div class="customer-background">
            <div class="container-960">                 
                <div id="example" class="k-content">                    
                    
                    <span class="glyphicons no-js remove_2 pull-right" 
                            onclick="javascript:window.history.back()"
                            data-bind="click: cancel"><i></i></span>

                    <h2 data-bind="text: lang.lang.cash_receipt"></h2>                         

                    <br>                                
                        
                    <!-- Upper Part -->
                <div class="row-fluid">
                    <div class="span4">
                        <div class="widget widget-heading-simple widget-body-primary widget-employees">     
                            <div class="widget-body padding-none">          
                                <div class="row-fluid row-merge">
                                    <div class="listWrapper">
                                        <div class="innerAll" style="padding: 15px 15px 19px;">                         
                                            <form autocomplete="off" class="form-inline">
                                                <div class="widget-search separator bottom" style="padding-bottom: 0;">
                                                    <button type="button" class="btn btn-default pull-right" data-bind="click: search"><i class="icon-search"></i></button>
                                                    <div class="overflow-hidden">
                                                        <input type="search" placeholder="Invoice Number..." data-bind="value: searchText, events:{change: search}">
                                                    </div>
                                                </div>
                                            </form>                 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="strong" style="margin-bottom:0; width: 100%; padding: 10px; background: #D5DBDB;" align="center">
                            <div align="left"><span >AMOUNT RECEIVED</span></div>
                            <h2 align="right">0</h2>
                        </div>                                              
                    </div>                     

                    <div class="span8" style="padding-right: 0; padding-left: 0;">

                        <div class="box-generic-noborder" style="padding: 10px 10px 10px 10px">
                                
                            <table style="margin-bottom: 0;" class="table table-borderless table-condensed cart_total">
                                <tr>
                                    <td><span >Date</span></td>
                                    <td class="right">
                                        <input id="issuedDate" name="issuedDate" 
                                                data-role="datepicker"
                                                data-format="dd-MM-yyyy"
                                                data-parse-formats="yyyy-MM-dd" 
                                                data-bind="value: obj.issued_date, 
                                                           events:{ change : issuedDateChanges }" 
                                                required data-required-msg="required"
                                                style="width:100%;" />
                                    </td>
                                </tr>                                       
                                <tr>
                                    <td>
                                        <span >Payment Term</span>
                                    </td>               
                                    <td>
                                        <input id="ddlPaymentMethod" name="ddlPaymentMethod"
                                                data-role="dropdownlist"                                
                                                data-header-template="customer-payment-method-header-tmpl"
                                                data-value-primitive="true"
                                                data-text-field="name" 
                                                data-value-field="id"
                                                data-bind="value: obj.payment_method_id,
                                                            source: paymentMethodDS"
                                                data-option-label="Select Method..."
                                                required data-required-msg="required" 
                                                style="width: 100%" />
                                    </td>
                                </tr>
                                <tr>
                                    <td><span >Cash Account</span></td>                                         
                                    <td>
                                        <input id="ddlCashAccount" name="ddlCashAccount" 
                                            data-role="dropdownlist"
                                            data-header-template="account-header-tmpl"
                                            data-template="account-list-tmpl"
                                            data-value-primitive="true"
                                            data-text-field="name" 
                                            data-value-field="id"
                                            data-bind="value: obj.account_id,
                                                        source: accountDS"
                                            data-option-label="Select Account..."
                                            required data-required-msg="required" 
                                            style="width: 100%" />
                                    </td>                                           
                                </tr>                                       
                                <tr>
                                    <td><span >Segment</span></td>
                                    <td>
                                        <select data-role="multiselect"
                                               data-value-primitive="true"
                                               data-header-template="segment-header-tmpl"
                                               data-item-template="segment-list-tmpl"                   
                                               data-value-field="id" 
                                               data-text-field="code"
                                               data-bind="value: obj.segments, 
                                                        source: segmentItemDS,
                                                        events:{ change: segmentChanges }"
                                               data-placeholder="Add Segment.."                
                                               style="width: 100%" /></select>
                                    </td>
                                </tr>                                           
                            </table>                                    
                               
                        </div>         
                    </div>
                </div>

                <!-- Item List -->
                <table class="table table-bordered table-primary table-striped table-vertical-center">
                    <thead>
                        <tr>
                            <th class="center" style="width: 50px;" data-bind="text: lang.lang.no_"></th>                           
                            <th data-bind="text: lang.lang.date"></th>
                            <th data-bind="text: lang.lang.name"></th>
                            <th data-bind="text: lang.lang.invoice"></th>
                            <th style="width: 15%" data-bind="text: lang.lang.amount"></th>
                            <th style="width: 15%" data-bind="text: lang.lang.discount"></th>
                            <th style="width: 15%">RECEIVE</th>
                        </tr> 
                    </thead>
                    <tbody data-role="listview" 
                            data-template="cashReceipt-template" 
                            data-auto-bind="false"
                            data-bind="source: dataSource"></tbody>                 
                </table>                
                                
                <!-- Bottom part -->
                <div class="row-fluid">
        
                    <!-- Column -->
                    <div class="span5" style="padding-left: 0;">
                        
                        <div class="btn-group">
                            <div class="leadcontainer">
                                
                            </div>
                            <a class="btn btn-default dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-list"></i> </a>
                            <ul class="dropdown-menu" style="padding: 5px; border-radius:0;">
                                <li>
                                    <input type="checkbox" id="chbCheckNo" class="k-checkbox" data-bind="checked: showCheckNo">
                                    <label class="k-checkbox-label" for="chbCheckNo"><span data-bind="text: lang.lang.check_number"></span></label>
                                </li>                                                           
                            </ul>
                        </div>

                        <br>
                        <div class="well" style="overflow: hidden;">
                            <textarea cols="0" rows="2" class="k-textbox" style="width:100% !important;" data-bind="value: obj.memo" placeholder="memo for external ..."></textarea>                                                
                            <textarea cols="0" rows="2" class="k-textbox" style="width:100% !important;" data-bind="value: obj.memo2" placeholder="memo for internal ..."></textarea>
                        </div>
                    </div>
                    <!-- Column END -->
                    
                    <!-- Column -->
                    <div class="span7" style="padding-left: 0;">
                        <table class="table table-condensed table-striped table-white">
                            <tbody>
                                <tr>
                                    <td class="right"data-bind="text: lang.lang.total_received"></td>
                                    <td class="right strong" data-bind="text: pay"></td>
                                    <td class="right" data-bind="text: lang.lang.subtotal"></td>
                                    <td class="right strong" width="40%" data-bind="text: sub_total"></td>
                                </tr>                               
                                <tr>
                                    <td class="right" data-bind="text: lang.lang.remaining"></td>
                                    <td class="right strong"><span data-bind="text: remain"></span></td>
                                    <td class="right" data-bind="text: lang.lang.total_discount"></td>
                                    <td class="right strong">
                                        <span data-bind="text: discount"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="right"><span >Fine</span>:</td>
                                    <td class="right strong"><span data-bind="text: fine"></span></td>
                                    <td></td>
                                    <td></td>                           
                            </tbody>
                        </table>

                        <table class="table table-bordered table-primary table-striped table-vertical-center">
                            <thead>
                                <tr>
                                    <th class="center" style="width: 50px;"><span >No.</span></th>             
                                    <th><span >Currency</span></th>
                                    <th><span >Cash Receipt</span></th>                                                                                                             
                                </tr> 
                            </thead>
                            <tbody data-role="listview" 
                                data-template="cash-currency-template" 
                                data-auto-bind="false"
                                data-bind="source: reconReceipt.dataSource"></tbody>                    
                        </table>

                        <button style="margin-bottom: 15px;" class="btn btn-inverse" data-bind="click: reconReceipt.addRow"><i class="icon-plus icon-white"></i></button>
                        
                        <table class="table table-condensed table-striped table-white">
                            <tbody>                                                             
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td class="right"><h4><span >Total Due</span>:</h4></td>
                                    <td class="right strong"><h4 data-bind="text: total"></h4></td>
                                </tr>                               
                            </tbody>
                        </table>
                        
                    </div>
                    <!-- // Column END -->
                    
                </div>             
                
                <!-- Form actions -->
                <div class="box-generic bg-action-button">
                    <div id="ntf1" data-role="notification"></div>

                    <div class="row">
                        <div class="span3">
                            <input data-role="dropdownlist"
                                   data-value-primitive="true"
                                   data-text-field="name"
                                   data-value-field="id"
                                   data-bind="value: obj.transaction_template_id,
                                              source: txnTemplateDS"
                                   data-option-label="Select Template..." />
                        </div>
                        <div class="span9" align="right">
                            <span class="btn btn-icon btn-default glyphicons print" style="width: 120px;color:#444;margin-bottom: 0;"><i></i><span data-bind="click:printReciept, text: lang.lang.save_print">Save Print</span></span>
                            <span class="btn btn-icon btn-primary glyphicons ok_2" data-bind="invisible: isEdit, click: save" style="width: 100px;"><i></i><span >Save</span></span>            
                        </div>
                    </div>
                </div>
                <!-- // Form actions END -->
                <!-- Upper Part -->                             

                </div>                          
            </div>
        </div>
    </div>
</script>
<script id="cashReceipt-list-template" type="text/x-kendo-tmpl">
    <tr data-uid="#: uid #">
        <td>
            <i class="icon-trash" data-bind="events: { click: removeRow }"></i>
            #:banhji.Receipt.dataSource.indexOf(data)+1#            
        </td>
        <td>#=kendo.toString(new Date(invissued_date), "dd-MMMM-yyyy", "km-KH")#</td>
        <td>#=contact_name#</td>
        <td>#=invnumber#</td>
        <td>#=meter#</td>
        <td class="center">
            #=kendo.toString(amountshow, locale=="km-KH"?"c0":"c", locale)#     
        </td>
        <td class="center" data-bind="visible: chhDiscount">
            <input data-role="numerictextbox"
                   data-spinners="false"
                   data-format="c0"
                   data-culture="#:locale#"
                   data-min="0"                   
                   data-bind="value: discount,
                              events: { change: changes }"
                   style="width: 100%; text-align: right;">         
        </td>
        
        <td class="center">
            <input data-role="numerictextbox"
                   data-spinners="false"
                   data-format="c"
                   data-culture="#:locale#"
                   data-min="0"
                   data-decimals="3"               
                   data-bind="value: amount,
                              events: { change: changes }"
                   style="width: 100%; text-align: right;">         
        </td>
    </tr>   
</script>
<script id="customerDeposit" type="text/x-kendo-template">
    <div id="slide-form">
        <div class="customer-background">
            <div class="container-960">                 
                <div id="example" class="k-content">                    
                    
                    <span class="glyphicons no-js remove_2 pull-right" 
                            onclick="javascript:window.history.back()"
                            data-bind="click: cancel"><i></i></span>

                    <h2 data-bind="text: lang.lang.customer_deposit"></h2>                         

                    <br>                                
                        
                    <!-- Upper Part -->
                    <div class="row-fluid">
                        <div class="span4">
                            <div class="box-generic well" style="height: 150px;">               
                                <table class="table table-borderless table-condensed cart_total" style="margin-bottom:10;">     
                                    <tr data-bind="visible: isEdit">                
                                        <td><span data-bind="text: lang.lang.no_"></span></td>
                                        <td><input class="k-textbox" data-bind="value: obj.number" style="width:100%;" /></td>
                                    </tr>
                                    <tr>
                                        <td><span data-bind="text: lang.lang.date"></span></td>
                                        <td class="right">
                                            <input id="issuedDate" name="issuedDate" 
                                                    data-role="datepicker"
                                                    data-format="dd-MM-yyyy"
                                                    data-parse-formats="yyyy-MM-dd" 
                                                    data-bind="value: obj.issued_date, 
                                                                events:{ change : setRate }" 
                                                    required data-required-msg="required"
                                                    style="width:100%;" />
                                        </td>
                                    </tr>
                                </table>

                                <div class="strong" style="margin-bottom:0; width: 100%; padding: 10px;" align="left"
                                    data-bind="style: {backgroundColor: amtDueColor}">
                                    <div align="left"><span>Customer Infomation</span></div>
                                    <p style="font-weight: lighter;">Name: <span data-bind="text: contact.name"></span></p>
                                </div>

                            </div>
                        </div>                     

                        <div class="span8">

                            <div class="box-generic-noborder" style="height: 155px;">

                                <!-- Tabs Heading -->
                                <div class="tabsbar tabsbar-2">
                                    <ul class="row-fluid row-merge">
                                        <li class="span1 glyphicons notes active"><a href="#tab1" data-toggle="tab"><i></i> </a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- // Tabs Heading END -->

                                <div class="tab-content">
                                        <p style="font-weight: bold;">Amount Deposit</p>
                                        <h2 style="font-size: 35px;margin-top: 22px;">$123,123.00</h2>  
                                </div>
                            </div>

                        </div>
                        <!-- Form actions -->
                    <div class="box-generic bg-action-button">
                        <div id="ntf1" data-role="notification"></div>
                        <div class="row">
                            <div class="span3">
                                
                            </div>
                            <div class="span9" align="right">
                                <span id="saveNew" class="btn btn-icon btn-primary glyphicons ok_2" data-bind="visible: obj.isNew" style="width: 80px;margin:0;"><i></i> Deposit</span>

                                <span id="saveClose" class="btn btn-icon btn-success glyphicons power" style="width: 80px;"><i></i> <span>Print</span></span>

                                <span class="btn btn-icon btn-warning glyphicons remove_2" onclick="javascript:window.history.back()" data-bind="click: cancel" style="width: 80px;"><i></i> <span data-bind="text: lang.lang.cancel"></span></span>
                            </div>
                        </div>
                    </div>      
                </div>                          
            </div>
        </div>
    </div>
</script>
<script id="cash-currency-template" type="text/x-kendo-template">
    <tr>
        <td> #:banhji.Receipt.receipCurrencyDS.indexOf(data) +1#</td>
        <td>
            <input style="text-align: left;background: none;border:none;" id="numeric" class="k-formatted-value k-input" type="text" data-bind="value: currency, enabled: false"  />
        </td>
        <td>
            <input style="text-align: right;" id="numeric" class="k-formatted-value k-input" type="number" value="17" min="0" data-format="n0" data-bind="value: amount, events: {change: checkChange}" step="1" />
        </td>
    </tr>
</script>
<script id="change-currency-receipt-template" type="text/x-kendo-template">
    <tr>
        <td>
            #:banhji.Receipt.receipChangeDS.indexOf(data) +1#</td>
        <td>
            <input style="text-align: left;background: none;border: none;" id="numeric" class="k-formatted-value k-input" type="text" data-bind="value: currency, enabled: false"  />
        </td>
        <td>
            <input style="text-align: right;" id="numeric" class="k-formatted-value k-input" type="number" value="17" min="0" data-bind="value: amount, events: {change: checkChangeMoney}" step="1" />
        </td>
    </tr>
</script>
<!-- Report -->
<script id="temp-meter-template" type="text/x-kendo-tmpl">
    <tr>
        <td style="text-align: left;">#= contact_name#</td>
        <td style="text-align: left;">#= meter_number#</td>
        <td style="text-align: left;">#= location_name#</td>
        <td style="text-align: left;">#= previous#</td>
        <td style="text-align: left;">#= month_of#</td>
        <td style="text-align: left;">#= balance#</td>
    </tr>
</script>
<script id="Reports" type="text/x-kendo-template">
    <div class="container">
        <div class="row-fluid">
            <h2 style="font-family: 'Open Sans', sans-serif;margin: 15px 0 10px;font-weight: 400; color: #4d4d4d; font-size: 26px; text-transform: uppercase;" data-bind="text: lang.lang.reports">Reports</h2>
            <!-- <input id="ddlCashAccount" name="ddlCashAccount" 
                data-role="dropdownlist"
                data-value-primitive="true"
                data-text-field="name" 
                data-value-field="id"
                data-bind="value: licenseSelect,
                            source: licenseDS, events: {change: onLicenseChange}"
                data-option-label="Select Licenses..." style="margin-bottom: 15px" /> -->


            <!-- <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <div class="widget widget-3 customer-border" style="padding: 15px;">
                        <div class="widget-head header-custome" style="display: none;">
                            <h4 class="heading">
                                How efficient is your working capital management?
                            </h4>
                        </div>                  
                        <div class="widget-body alert alert-primary" style="min-height: 178px; background: #203864; color: #fff; margin-bottom: 0; border-radius: 0;">
                            <a href="#/customer_deposit_report">
                                <div align="center" class="text-large strong" style="font-size: 35px;">
                                    <span style="color: #fff;" data-bind="text: totalDeposit"></span>
                                    <br>
                                    <p style="font-size: 14px; color: #fff;" data-bind="text: lang.lang.total_deposit" >Total Deposit</p>
                                </div>
                            </a>
                            <table width="100%">
                                <tbody>
                                    <tr align="center" style="vertical-align: top;">
                                        <td width="33%">
                                            <a href="#/customer_list">                                      
                                                <span style="font-size: 18px; color: #fff;" data-bind="text: activeCustomer"></span>
                                                <br>
                                                <span style="font-size: 12px; color: #fff;" data-bind="text: lang.lang.active_customer_ratio">Active Customer Ratio</span>
                                            </a>
                                        </td>
                                        <td width="33%">
                                            <a href="#/customer_list">
                                                <span style="font-size: 18px; color: #fff;" data-bind="text: nCustomer"></span>
                                                <br>
                                                <span style="font-size: 12px; color: #fff;" data-bind="text: lang.lang.total_customer_ratio">Total Customer Ratio</span>
                                            </a>
                                        </td>
                                        <td width="33%">
                                            <a href="#/customer_list">
                                                <span style="font-size: 18px; color: #fff;" data-bind="text: tCustomer"></span>
                                                <br>
                                                <span style="font-size: 12px; color: #fff;" data-bind="text: lang.lang.total_no_of_customer">Total No. of Customer</span>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>                                  
                    </div>              
                </div>

                <div class="col-xs-12 col-sm-6">
                    <div class="widget widget-3 customer-border" style="padding: 15px;">
                        <div class="widget-head header-custome" style="display: none;">
                            <h4 class="heading">
                                How efficient is your working capital management?
                            </h4>
                        </div>                  
                        <div class="widget-body alert alert-primary" style="min-height: 178px; background: #337ab7; color: #fff; margin-bottom: 0; border-radius: 0;">
                            <a href="#/sale_summary">
                                <div align="center" class="text-large strong" style="font-size: 35px;">
                                    <span style="color: #fff;" data-bind="text: waterRevenue"></span>
                                    <br>
                                    <p style="font-size: 14px; color: #fff;" data-bind="text: lang.lang.total_water_revenue">Total Water Revenue</p>
                                </div>
                            </a>                            
                            <table width="100%">
                                <tbody>
                                    <tr align="center" style="vertical-align: top;">
                                        <td width="33%">
                                            <a href="#/sale_summary">                                       
                                                <span style="font-size: 18px; color: #fff;" data-bind="text: avgRevenue"></span>
                                                <br>
                                                <span style="font-size: 12px; color: #fff;" data-bind="text: lang.lang.avarage_reveune_per_connection">Average Reveune Per Connection</span>
                                            </a>
                                        </td>
                                        <td width="33%">
                                            <a href="#/sale_summary">
                                                <span style="font-size: 18px; color: #fff;" data-bind="text: avgUsage"></span>
                                                <br>
                                                <span style="font-size: 12px; color: #fff;" data-bind="text: lang.lang.avarage_water_usage_per_connection">Average Water Usage Per Connection</span>
                                            </a>
                                        </td>
                                        <td width="33%">
                                            <a href="#/sale_summary">
                                                <span style="font-size: 18px; color: #fff;" data-bind="text: waterSold"></span>
                                                <br>
                                                <span style="font-size: 12px; color: #fff;" data-bind="text: lang.lang.quantity_sold">Quantity Sold</span><span style="color: #fff;"> m<sup>3</sup>/kWh</span>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>                                  
                    </div>              
                </div>

            </div> -->

            <!-- <div class="row" >
                <div class="col-xs-12 col-sm-4" >
                    <div class="cover-block ">
                        <div class="row-fluid">
                            <div class="col-xs-12 col-sm-6" >
                        
                                <span class="widget-stats widget-stats-gray widget-stats-2" style="background: #203864;">
                                    <span class="count" style="font-size: 25px;"><a href="#/customer_list" style="color: #fff;" data-format="p" ><span data-bind="text: activeCustomer"></span></a></span>
                                    <span class="txt" style="font-size: small; color: #fff;" data-bind="text: lang.lang.active_customer_ratio">Active Customer Ratio</span>                 
                                </span>
                                
                            </div>

                            <div class="col-xs-12 col-sm-6" >
                                
                                <span class="widget-stats widget-stats-2" style="background: #0077c5;">
                                    <span class="count" style="font-size: 25px;"><a href="#/customer_list" style="color: #fff;" data-format="p"><span data-bind="text: nCustomer"></span></a></span>
                                    <span class="txt" style="font-size: small; color: #fff;" data-bind="text: lang.lang.total_customer_ratio">Total Customer Ratio</span>
                                </span>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-3" >
                    <div class="cover-block ">
                        <div class="row-fluid">
                            <div class="col-xs-12 col-sm-12" >
                                
                                <span class="widget-stats widget-stats-gray widget-stats-2" style="background: #21abf6; ">
                                    <span class="count" style="font-size: 25px; "><a href="#/customer_list" style="color: #fff;"><span data-bind="text: tCustomer"></span></a></span>
                                    <span class="txt" style="font-size: small; color: #fff;" data-bind="text: lang.lang.total_no_of_customer">Total No. of Customer</span>
                                </span>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-5" >
                    <div class="cover-block ">
                        <div class="row-fluid">
                            <div class="col-xs-12 col-sm-12" >
                            
                                <span class="widget-stats widget-stats-2" style="background: #fff; ">
                                    <span class="count" style="font-size: 25px; "><a href="#/sale_summary" style="color: #203864;" data-format="c0" ><span data-bind="text: waterRevenue"></span></a></span>
                                    <span class="txt" style="font-size: small; color: #203864;" data-bind="text: lang.lang.total_water_revenue">Total Water Revenue</span>
                                </span>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-4" >
                    <div class="cover-block ">
                        <div class="row-fluid">
                            <div class="col-xs-12 col-sm-6" >
                                
                                <span class="widget-stats widget-stats-default widget-stats-2"  style="background: #203864; padding: 0 5px 0 5px;">
                                    <span class="count" style="font-size: 25px;"><a href="#/sale_summary" style="color: #fff;" data-format="c0" ><span data-bind="text: avgRevenue"></span></a></span>
                                    <span class="txt" style="font-size: small; color: #fff; " data-bind="text: lang.lang.avarage_reveune_per_connection">Average Reveune Per Connection</span>
                                </span>
                                
                            </div>

                            <div class="col-xs-12 col-sm-6" >
                                
                                <span class="widget-stats widget-stats-2" style="background: #0077c5;  padding: 0 5px 0 5px;">
                                    <span class="count" style="font-size: 25px;"><a href="#/sale_summary" data-format="n2" style="color: #fff;"><span data-bind="text: avgUsage"></span></a></span>
                                    <span class="txt" style="font-size: small; color: #fff;" data-bind="text: lang.lang.avarage_water_usage_per_connection">Average Water Usage Per Connection</span></span>
                                </span>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-3" >
                    <div class="cover-block ">
                        <div class="row-fluid">
                            <div class="col-xs-12 col-sm-12" >
                                
                                <span class="widget-stats widget-stats-default widget-stats-2" style="background: #21abf6;">                
                                    <span class="count" style="font-size: 25px; "><a href="#/sale_summary" style="color: #fff;"><span data-bind="text: waterSold"></span></a></span>
                                    <span class="txt" style="font-size: small;"><span data-bind="text: lang.lang.quantity_sold">Quantity Sold</span> m<sup>3</sup>/kWh</span>                   
                                </span>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-5" >
                    <div class="cover-block ">
                        <div class="row-fluid">
                            <div class="col-xs-12 col-sm-12" >
                                
                                <span class="widget-stats widget-stats-2" style="background: #fff; ">
                                    <span class="count" style="font-size: 25px;"><a href="#/customer_deposit_report" style="color: #203864;" data-format="c0" ><span data-bind="text: totalDeposit"></span></a></span>
                                    <span class="txt" style="font-size: small; color: #203864;" data-bind="text: lang.lang.total_deposit" >Total Deposit</span>
                                </span>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->

            <!-- <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <div class="cover-block" style="width: 100%; min-height: 175px; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1; padding-left: 15px;">
                        <div class="row-fluid sale-report">
                            <h2 data-bind="text: lang.lang.customer_management_report">Customer Management Report</h2>
                            <p data-bind="text: lang.lang.these_reports_are_useful">
                                These reports are useful for customer information management, meter connections, and usage managements 
                            </p>
                            <div class="row-fluid">
                                <table class="table table-borderless table-condensed" style="margin-bottom: 0;">
                                    <tr>
                                        <td width="50%">
                                            <h3><a href="#/customer_list" data-bind="text: lang.lang.customer_list"></a></h3>
                                        </td>
                                        <td width="50%">
                                            <h3><a href="#/disconnect_list" data-bind="text: lang.lang.disconnected_list">Disconnected List</a></h3>
                                        </td>                       
                                    </tr>
                                    <tr>
                                        <td width="50%">
                                            <p></p>
                                        </td>
                                        <td width="50%">
                                            <p></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="50%">                                            
                                            <h3><a href="#/mini_usage_list" data-bind="text: lang.lang.minimum_water_usage_list">Minimum Water Usage List</a></h3>
                                        </td>
                                        <td width="50%">
                                            <h3><a href="#/to_be_disconnect_list">To Be Disconnect List</a></h3>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="50%">
                                            <p></p>
                                        </td>
                                        <td width="50%">
                                            <p></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="50%">
                                            <p></p>
                                        </td>
                                        <td width="50%">
                                            <p></p>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div class="cover-block" style="width: 100%; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1; padding-left: 15px;">
                        <div class="row-fluid sale-report">
                            <h2 data-bind="text: lang.lang.receiveable_and_deposits">Receiveable and Deposits</h2>
                            <p data-bind="text: lang.lang.these_would_be_the_most">
                                These would be the most common reports that you will be using. It includes receivables balance and its aging in both summary and detail list and the security deposit made by the customers for their water connection.
                            </p>
                            <div class="row-fluid">
                                <table class="table table-borderless table-condensed">
                                    <tr>
                                        <td >
                                            <h3><a href="#/account_receivable_list" data-bind="text: lang.lang.accounts_receivable_listing">Accounts Receivable Listing</a></h3>
                                        </td>
                                        <td >
                                            <h3><a href="#/customer_deposit_report" data-bind="text: lang.lang.customer_deposit">Customer Deposit</a></h3>                              
                                        </td>                       
                                    </tr>
                                    <tr>
                                        <td >
                                            <p></p>
                                            
                                        </td>
                                        <td >
                                            <p></p>
                                        </td>                           
                                    </tr>
                                    <tr>
                                        <td >
                                                <h3><a href="#/customer_balance_summary" data-bind="text: lang.lang.customer_balance_summary">Customer Balance Summary</a></h3>
                                            
                                        </td>
                                        <td >
                                            <h3><a href="#/customer_balance_detail" data-bind="text: lang.lang.customer_balance_detail">Customer Balance Detail</a></h3>
                                        </td>                           
                                    </tr>
                                    <tr>
                                        <td >
                                            <p></p>
                                            
                                        </td>
                                        <td >
                                            <p></p>
                                        </td>                           
                                    </tr>

                                    <tr>
                                        <td >
                                            <h3><a href="#/customer_aging_sum_list" data-bind="text: lang.lang.customer_aging_summary_list">Customer Aging Summary List</a></h3>
                                        </td>
                                        <td >
                                            <h3><a href="#/customer_aging_detail" data-bind="text: lang.lang.customer_aging_detail_list">Customer Aging Detail List</a></h3>                                
                                        </td>                       
                                    </tr>
                                    <tr>
                                        <td >
                                            <p></p>
                                            
                                        </td>
                                        <td >
                                            <p></p>
                                        </td>                           
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <div class="cover-block" style="width: 100%; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1; padding-left: 15px;">
                        <div class="row-fluid sale-report">
                            <h2 data-bind="text: lang.lang.sale_report">Sale Report</h2>
                            <p data-bind="text: lang.lang.summary_and_detail_sale">
                                Summary and detail sale report broken down by Licenses, bloc, and types of reveneues.   
                            </p>
                            <div class="row-fluid">
                                <table class="table table-borderless table-condensed">
                                    <tr>
                                        <td>
                                            <h3><a href="#/sale_summary" data-bind="text: lang.lang.sale_summary_report">Sale Summary Report</a></h3>
                                        </td>
                                        <td >
                                            <h3><a href="#/sale_detail" data-bind="text: lang.lang.sale_detail_report">Sale Detail Report</a></h3>                              
                                        </td>                       
                                    </tr>
                                    <tr>
                                        <td >
                                            <p></p>
                                            
                                        </td>
                                        <td >
                                            <p></p>
                                        </td>                           
                                    </tr>
                                    <tr>
                                        <td >
                                            <h3><a href="#/connect_service_revenue" data-bind="text: lang.lang.connection_service_revenue_report">Connection Service Revenue Report</a></h3>
                                        </td>
                                        <td >
                                            <h3><a href="#/fine_collect">Fine Collection Report</a></h3>
                                            
                                        </td>
                                    </tr>
                                    <tr>
                                        <td >
                                            <p></p>
                                        </td>
                                        <td >
                                            <p></p>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div class="cover-block" style="width: 100%; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1; padding-left: 15px;">
                        <div class="row-fluid sale-report">
                            <h2 data-bind="text: lang.lang.cash_receipt_report">Cash Receipt Report</h2>
                            <p data-bind="text: lang.lang.summary_and_detail_cash">
                                Summary and detail cash receipt reports grouped by sources/ methods of receipts 
                            </p>
                            <div class="row-fluid">
                                <table class="table table-borderless table-condensed">
                                    <tr>
                                        <td>
                                            <h3><a href="#/cash_receipt_detail" data-bind="text: lang.lang.cash_receipt_detail">Cash Receipt Detail</a></h3>
                                        </td>
                                        <td >
                                            <h3><a href="#/cash_receipt_source_detail" data-bind="text: lang.lang.cash_receipt_by_sources_detail">Cash Receipt By Sources Detail</a></h3>                               
                                        </td>
                                    </tr>
                                    <tr>
                                        <td >
                                            <p></p>
                                            
                                        </td>
                                        <td >
                                            <p></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td >
                                            
                                        </td>
                                        <td >
                                            
                                        </td>
                                    </tr>
                                    <tr>
                                        <td >
                                            <p></p>
                                        </td>
                                        <td >
                                            <p></p>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->


            <div class="row">
                <div class="col-xs-12 col-sm-12">
                    <div class="box-generic" >
                        <!-- //Tabs Heading -->
                        <div class="tabsbar tabsbar-1" style="background: #203864 !important; color: #fff;">
                            <ul class="row-fluid row-merge">
                                <li class="active">
                                    <a href="#tab1" data-toggle="tab"><span data-bind="text: lang.lang.summary_report"></span></a>
                                </li>
                                <li>
                                    <a href="#tab2" data-toggle="tab"><span data-bind="text: lang.lang.kpi_report"></span></a>
                                </li>
                                <li>
                                    <a href="#tab3" data-toggle="tab"><span data-bind="text: lang.lang.customer_report"></span></a>
                                </li>
                                <li >
                                    <a href="#tab4" data-toggle="tab"><span data-bind="text: lang.lang.receivable_reports"></span></a>
                                </li>
                                <li >
                                    <a href="#tab5" data-toggle="tab"><span data-bind="text: lang.lang.sale_report"></span></a>
                                </li>                               
                                <li >
                                    <a href="#tab6" data-toggle="tab"><span data-bind="text: lang.lang.cash_receipt_report"></span></a>
                                </li>
                               <!--  <li data-bind="click: viewMap">
                                    <a href="#tab7" data-toggle="tab"><span data-bind="text: lang.lang.meter_report_map" ></span></a>
                                </li> -->
                            </ul>
                        </div>
                        <!-- // Tabs Heading END -->

                        <div class="tab-content">
                            <!-- //Summary Report -->
                            <div class="tab-pane active" id="tab1">
                                <div class="row-fluid sale-report">
                                               <div class="col-md-12 water-tableList hidden-xs">
                                <input id="ddlCashAccount" name="ddlCashAccount" 
                                    data-role="dropdownlist"
                                    data-value-primitive="true"
                                    data-text-field="name" 
                                    data-value-field="id"
                                    data-bind="value: summarySelect,
                                                source: licenseDS, events: {change: onLicenseChange}"
                                    data-option-label="Select Licenses..." style="margin-bottom: 15px" />
                                <table style="margin-bottom: 0;" class="table table-bordered table-condensed table-striped table-primary table-vertical-center">
                                    <thead>
                                        <tr>
                                            <th style="vertical-align: top; text-align: center; font-size: 12px;"><span data-bind="text: lang.lang.no">No.</span></th>
                                            <th style="vertical-align: top; text-align: center; font-size: 12px;"><span data-bind="text: lang.lang.bloc">bloc</span></th>
                                            <th style="vertical-align: top; text-align: center; font-size: 12px;"><span data-bind="text: lang.lang.active_meter">Active Meter</span></th>
                                            <th style="vertical-align: top; text-align: center; font-size: 12px;"><span data-bind="text: lang.lang.inactive_meter">Inactive Meter</span></th>
                                            <th style="vertical-align: top; text-align: center; font-size: 12px;"><span data-bind="text: lang.lang.deposit">Deposit</span></th>
                                            <th style="vertical-align: top; text-align: center; font-size: 12px;"><span data-bind="text: lang.lang.quantity_sold"></span><span>m<sup>3</sup>/kWh
                                            </span></th>
                                            <th style="vertical-align: top; text-align: center; font-size: 12px;"><span data-bind="text: lang.lang.sale_amount">Sale Amount</span></th>
                                            <th style="vertical-align: top; text-align: center"><span data-bind="text: lang.lang.balance">Balance</span></th>
                                        </tr>
                                    </thead>
                                    <tbody style="border: none;" data-role="listview" data-bind="source: dataSource" data-template="summary-template-table-list" data-auto-bind="false">                
                                    </tbody>
                                </table>
                            </div>
                                </div>
                            </div>
                            <!-- //Summary Report END -->   

                            <!-- //Summary Report -->
                            <div class="tab-pane" id="tab2">
                                <div class="row-fluid sale-report">
                                               <div class="col-md-12 water-tableList hidden-xs">
                                <input id="ddlCashAccount" name="ddlCashAccount" 
                                    data-role="dropdownlist"
                                    data-value-primitive="true"
                                    data-text-field="name" 
                                    data-value-field="id"
                                    data-bind="value: licenseKPISelect,
                                                source: licenseDS, events: {change: onLicenseChangeKPI}"
                                    data-option-label="Select Licenses..." style="margin-bottom: 15px" />
                                <table style="margin-bottom: 0;" class="table table-bordered table-condensed table-striped table-primary table-vertical-center">
                                    <thead>
                                        <tr>
                                            <th style="vertical-align: top; text-align: center; font-size: 12px;"><span data-bind="text: lang.lang.no">No.</span></th>
                                            <th style="vertical-align: top; text-align: center; font-size: 12px;"><span data-bind="text: lang.lang.license">License</span></th>
                                            <th style="vertical-align: top; text-align: center; font-size: 12px;"><span data-bind="text: lang.lang.active_customer_ratio">Active Customer Ratio</span></th>
                                            <th style="vertical-align: top; text-align: center; font-size: 12px;"><span data-bind="text: lang.lang.total_customer_ratio">Total Customer Ratio</span></th>
                                            <th style="vertical-align: top; text-align: center; font-size: 12px;"><span data-bind="text: lang.lang.total_no_of_customer">Total No. of Customer</span></th>
                                            <th style="vertical-align: top; text-align: center; font-size: 12px;"><span data-bind="text: lang.lang.avarage_reveune_per_connection">Average Reveune Per Connection</span></th>
                                            <th style="vertical-align: top; text-align: center; font-size: 12px;"><span data-bind="text: lang.lang.avarage_water_usage_per_connection">Average Water Usage Per Connection</span></th>
                                            <th style="vertical-align: top; text-align: center; font-size: 12px;"><span data-bind="text: lang.lang.quantity_sold"></span><span>m<sup>3</sup>/kWh
                                            </span></th>
                                            <th style="vertical-align: top; text-align: center"><span data-bind="text: lang.lang.total_water_revenue">Water Revenue</span></th>
                                        </tr>
                                    </thead>
                                    <tbody style="border: none;" data-role="listview" data-bind="source: dataSourceKPI" data-template="kpi-template-table-list" data-auto-bind="false">             
                                    </tbody>
                                </table>
                            </div>
                                </div>
                            </div>
                            <!-- //Summary Report END -->

                            <!-- //GENERAL INFO -->
                            <div class="tab-pane" id="tab3">
                                <div class="row-fluid sale-report">
                                    <h2 style="margin-bottom: 10px;" data-bind="text: lang.lang.customer_management_report">Customer Management Report</h2>
                                    <p data-bind="text: lang.lang.these_reports_are_useful">
                                        These reports are useful for customer information management, meter connections, and usage managements 
                                    </p>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <table class="table table-borderless table-condensed">
                                                <tr>
                                                    <td style="width: 50%">
                                                        <h3 ><a href="#/customer_list" data-bind="text: lang.lang.customer_list"></a></h3>
                                                    </td>
                                                    <td>
                                                        <h3 ><a href="#/to_be_connection_list" data-bind="text: lang.lang.connect_list"></a></h3>
                                                    </td>
                                                    
                                                </tr>

                                                <tr>
                                                    <td >
                                                        <p style="padding-right: 25px;"  data-bind="text: lang.lang.list_of_all_active_customers">
                                                            List of all active customers
                                                        </p>
                                                    </td>
                                                    <td >
                                                        <p style="padding-right: 25px;"  data-bind="text: lang.lang.list_connect_customers">
                                                            List of all customers to be connected
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td >
                                                        <h3><a href="#/disconnect_list" data-bind="text: lang.lang.disconnected_list">Disconnected List</a></h3>
                                                    </td>
                                                    <td >                                                   
                                                        <h3><a href="#/connection_list" data-bind="text: lang.lang.connected_list"></a></h3>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td >
                                                        <p style="vertical-align: top;" data-bind="text: lang.lang.to_be_disconnect_description"> 
                                                            List of the customer to be disconnect 
                                                        </p>
                                                    </td>
                                                    <td >
                                                        <p style="padding-right: 25px;"  data-bind="text: lang.lang.connected_description">
                                                            list of the customer have been connected
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td >
                                                        <h3><a href="#/inactive_list" data-bind="text: lang.lang.inactive_customer"></a></h3>
                                                    </td>
                                                    <td >                                                   
                                                        <h3><a href="#/to_be_disconnect_list" data-bind="text: lang.lang.to_be_disconnect_list"></a></h3>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td >
                                                        <p style="vertical-align: top;" data-bind="text: lang.lang.inactive_customer_description">
                                                            list of each customer have been inactive
                                                        </p>
                                                    </td>
                                                    <td >
                                                        <p style="vertical-align: top;" data-bind="text: lang.lang.to_be_disconnect_description">
                                                            List of the customer to be disconnect 
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td >
                                                        <h3 ><a href="#/mini_usage_list" data-bind="text: lang.lang.minimum_water_usage_list">Minimum Water Usage List</a></h3>
                                                    </td>
                                                    <td >                                                   
                                                        
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td >
                                                        <p style="vertical-align: top;" data-bind="text: lang.lang.minimum_water_usage_description">
                                                            list of each customer individual usage minimum water
                                                        </p>
                                                    </td>
                                                    <td>
                                                        
                                                    </td>
                                                </tr>
                                                <tr>
                                                    
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="home-chart">
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
                                                                         { field: 'amount', name: langVM.lang.active_meter, categoryField:'month', color: '#203864', overlay:{ gradient: 'none'}  }
                                                                     ]"
                                                         data-bind="source: graphCustomer"
                                                         style="height: 240px; " >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- //GENERAL INFO END -->

                            <!-- //RECEIVEABLE AND DEPOSIT INFO -->
                            <div class="tab-pane" id="tab4">
                                <div class="row-fluid sale-report">
                                    <h2 style="margin-bottom: 10px;" data-bind="text: lang.lang.receiveable_and_deposits">Receiveable and Deposits</h2>
                                    <p data-bind="text: lang.lang.these_would_be_the_most">
                                        These would be the most common reports that you will be using. It includes receivables balance and its aging in both summary and detail list and the security deposit made by the customers for their water connection.
                                    </p>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <table class="table table-borderless table-condensed">
                                                <tr>
                                                    <td style="width: 50%">
                                                        <h3><a href="#/account_receivable_list" data-bind="text: lang.lang.accounts_receivable_listing">Accounts Receivable Listing</a></h3>
                                                    </td>
                                                    <td >
                                                        <h3><a href="#/customer_deposit_report" data-bind="text: lang.lang.customer_deposit">Customer Deposit</a></h3>                              
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td >
                                                        <p style="padding-right: 25px;"  data-bind="text: lang.lang.shows_a_chronological_list_of_all_your_invoices_for_a_selected_date_range">
                                                            Shows a chronological list of all your invoices for a selected date range.
                                                        </p>
                                                    </td>
                                                    <td style="vertical-align: top;" data-bind="text: lang.lang.provides_detailed_information_about_customer_deposit">
                                                        <p>
                                                            Provides detailed information about customer deposit for specific order, prepayment, or credit.
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td >
                                                        <h3><a href="#/customer_balance_summary" data-bind="text: lang.lang.customer_balance_summary">Customer Balance Summary</a></h3>
                                                    </td>
                                                    <td >
                                                        <h3><a href="#/customer_balance_detail" data-bind="text: lang.lang.customer_balance_detail">Customer Balance Detail</a></h3>
                                                    </td>                           
                                                </tr>
                                                <tr>
                                                    <td >
                                                        <p style="padding-right: 25px;"  data-bind="text: lang.lang.show_each_customers_total_outstanding_balances">
                                                            Show each customer’s total outstanding balances.
                                                        </p>
                                                    </td>
                                                    <td style="vertical-align: top;" data-bind="text: lang.lang.lists_individual_unpaid_invoices_for_each_customer">
                                                        <p>
                                                            Lists individual unpaid invoices for each customer
                                                        </p>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td >
                                                        <h3><a href="#/customer_aging_sum_list" data-bind="text: lang.lang.customer_aging_summary_list">Customer Aging Summary List</a></h3>
                                                    </td>
                                                    <td >
                                                        <h3><a href="#/customer_aging_detail" data-bind="text: lang.lang.customer_aging_detail_list">Customer Aging Detail List</a></h3>                                
                                                    </td>                       
                                                </tr>
                                                <tr>
                                                    <td >
                                                        <p style="padding-right: 25px;"  data-bind="text: lang.lang.lists_all_unpaid_invoices1">
                                                            Lists all unpaid invoices for the current period, 30, 60, 90, 
                                                        and more than 90 days, grouped by individual customers.
                                                        </p>
                                                    </td>
                                                    <td style="vertical-align: top;" data-bind="text: lang.lang.lists_individual_unpaid_invoices_grouped_by_customer">
                                                        <p>
                                                            Lists individual unpaid invoices, grouped by customer. This includes due date, outstanding days (aging days), and amount.
                                                        </p>
                                                    </td>
                                                </tr>                                               
                                            </table>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="home-chart">
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
                                                                         { field: 'amount', name: langVM.lang.expected_due, categoryField:'month', color: '#203864', overlay:{ gradient: 'none'}  }
                                                                     ]"
                                                         data-bind="source: graphBalance"
                                                         style="height: 240px; " >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <!-- //RECEIVEABLE AND DEPOSIT INFO END -->
                            <!-- //ACCOUNTING -->
                            <div class="tab-pane" id="tab5">
                                <div class="row-fluid sale-report">
                                    <h2 style="margin-bottom: 10px;" data-bind="text: lang.lang.sale_report">Sale Report</h2>
                                    <p data-bind="text: lang.lang.summary_and_detail_sale">
                                        Summary and detail sale report broken down by Licenses, bloc, and types of reveneues.   
                                    </p>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <table class="table table-borderless table-condensed">
                                                <tr>
                                                    <td style="width: 50%">
                                                        <h3><a href="#/sale_summary" data-bind="text: lang.lang.sale_summary_report">Sale Summary Report</a></h3>
                                                    </td>
                                                    <td >
                                                        <h3><a href="#/sale_detail" data-bind="text: lang.lang.sale_detail_report">Sale Detail Report</a></h3>                              
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td >
                                                        <p style="padding-right: 25px;"  data-bind="text: lang.lang.summarizes_total_sales">
                                                        Summarizes total sales for each customer within a period 
                                                        of time so you can see which ones generate the most revenue for you.
                                                        </p>
                                                    </td>
                                                    <td style="vertical-align: top;" data-bind="text: lang.lang.lists_individual_sale">
                                                        <p>
                                                            Lists individual sale transactions by date for each customer with a period of time.
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td >
                                                        <h3><a href="#/connect_service_revenue" data-bind="text: lang.lang.connection_service_revenue_report">Connection Service Revenue Report</a></h3>
                                                    </td>
                                                    <td >
                                                        <h3><a href="#/fine_collect" data-bind="text: lang.lang.fine_collection_report">Fine Collection Report</a></h3>
                                                        
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td >
                                                        <p style="padding-right: 25px;"  data-bind="text: lang.lang.connection_service_revenue_description">
                                                        Lists individual connection revenue service by date for each customer with a period of time.
                                                        </p>
                                                    </td>
                                                    <td style="vertical-align: top;" data-bind="text: lang.lang.fine_collection_description">
                                                        <p>
                                                            list individual fine by date for each customer with a period of time.
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h3><a href="#/discount_report" data-bind="text: lang.lang.discount_report">Discount Report</a></h3>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td >
                                                        <p style="padding-right: 25px;"  data-bind="text: lang.lang.discount_report_description">
                                                        Lists individual discount by date for each customer with a period of time.
                                                        </p>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="home-chart">
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
                                                         data-bind="source: graphSale"
                                                         style="height: 240px; " >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- //ACCOUNTING END -->                           

                            <!-- //ACCOUNTING -->
                            <div class="tab-pane" id="tab6">
                                <div class="row-fluid sale-report">
                                    <h2 style="margin-bottom: 10px;" data-bind="text: lang.lang.cash_receipt_report">Cash Receipt Report</h2>
                                    <p data-bind="text: lang.lang.summary_and_detail_cash">
                                        Summary and detail cash receipt reports grouped by sources/ methods of receipts 
                                    </p>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <table class="table table-borderless table-condensed">
                                                <tr>
                                                    <td style="width: 50%">
                                                        <h3><a href="#/cash_receipt_detail" data-bind="text: lang.lang.cash_receipt_detail">Cash Receipt Detail</a></h3>
                                                    </td>
                                                    <td >
                                                        <h3><a href="#/cash_receipt_source_detail" data-bind="text: lang.lang.cash_receipt_by_sources_detail">Cash Receipt By Sources Detail</a></h3>                               
                                                    </td>
                                                    <td>

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td >
                                                        <p style="padding-right: 25px;"  data-bind="text: lang.lang.cash_receipt_description">
                                                        Lists of cash receipt for the select period of time, group by method of payment.
                                                        </p>
                                                    </td>
                                                    <td style="vertical-align: top;" data-bind="text: lang.lang.cash_receipt_sources_description">
                                                        <p>
                                                            Lists of cash receipt by sources for the select period of time, group by method of payment.
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 50%">
                                                        <h3><a href="#/cash_receipt_user" data-bind="text: lang.lang.cash_receipt_by_employee">Cash Receipt By Employee</a></h3>
                                                    </td>                   
                                                    <td>

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td >
                                                        <p style="padding-right: 25px;"  data-bind="text: lang.lang.cash_receipt_description_by_employee">
                                                        Lists of cash receipt for the select period of time, group by method of employee.
                                                        </p>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="home-chart">
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
                                                                         { field: 'amount', name: langVM.lang.moneyCollection, categoryField:'month', color: '#203864', overlay:{ gradient: 'none'}  }
                                                                     ]"
                                                         data-bind="source: graphMoney"
                                                         style="height: 240px; " >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- //ACCOUNTING END -->


                           <!--  <div class="tab-pane" id="tab7" >
                                <div class="row-fluid sale-report">
                                    <h1 style="text-align: center; padding: 20px;">Coming Soon !!</h1>
                                    <h2 style="margin-bottom: 10px;" data-bind="text: lang.lang.meter_report_map"></h2>
                                    <div id="map" style="border: 1px solid green; height: 70%; width: 100%">
                                        sdklasdj
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</script>
<script id="summary-template-table-list" type="text/x-kendo-tmpl">
    <tr>
        <td style="text-align: center;">#=banhji.Reports.dataSource.indexOf(banhji.Reports.dataSource.get(id)) +1 #</td>
        <td style="text-align: left;">#=bloc_name#</td>
        <td style="text-align: center; padding-right: 5px !important;">#=kendo.toString(activeCount, "n0", banhji.locale)#</td>
        <td style="text-align: center; padding-right: 5px !important;">#=kendo.toString(inactiveCount, "n0", banhji.locale)#</td>
        <td style="text-align: right; padding-right: 5px !important;">#= kendo.toString(totalDeposit, banhji.locale=="km-KH"?"c0":"c", banhji.locale)#</td>
        <td style="text-align: center; padding-right: 5px !important;">#=kendo.toString(totalUsage, "n0", banhji.locale)# m3/kwh</td>
        <td style="text-align: right; padding-right: 5px !important;">#= kendo.toString(totalSale, banhji.locale=="km-KH"?"c0":"c", banhji.locale)#</td>
        <td style="text-align: right; padding-right: 5px !important;">#= kendo.toString(totalBalance, banhji.locale=="km-KH"?"c0":"c", banhji.locale)#</td>
    </tr>
</script>
<script id="kpi-template-table-list" type="text/x-kendo-tmpl">
    <tr>
        <td style="text-align: center;">#=banhji.Reports.dataSourceKPI.indexOf(banhji.Reports.dataSourceKPI.get(id)) +1 #</td>
        <td style="text-align: left;">#=name#</td>
        <td style="text-align: center; padding-right: 5px !important;">#=kendo.toString(totalActiveCustomer, "p", banhji.locale)#</td>
        <td style="text-align: center; padding-right: 5px !important;">#=kendo.toString(totalAllowCustomer, "p", banhji.locale)#</td>
        <td style="text-align: center; padding-right: 5px !important;">#=kendo.toString(totalCustomer, "n0", banhji.locale)#</td>
        <td style="text-align: right; padding-right: 5px !important;">#= kendo.toString(avgIncome, banhji.locale=="km-KH"?"c0":"c", banhji.locale)#</td>
        <td style="text-align: center; padding-right: 5px !important;">#=kendo.toString(avgUsage, "n0", banhji.locale)# m3</td>
        <td style="text-align: right; padding-right: 5px !important;">#=kendo.toString(totalUsage, "n0", banhji.locale)# m3</td>
        <td style="text-align: right; padding-right: 5px !important;">#= kendo.toString(totalAmount, banhji.locale=="km-KH"?"c0":"c", banhji.locale)#</td>
    </tr>
</script>
<script id="customerList" type="text/x-kendo-template">
    <div class="container">
        <div class="row-fluid">
            <div id="waterreport" class="background">
                <div class="row-fluid">
                    <div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
                        <i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
                    </div>
                    <div id="example" class="k-content">
                        <div class="hidden-print pull-right" style="margin-bottom: 15px;">
                            <span class="pull-right glyphicons no-js remove_2"
                        onclick="javascript:window.history.back()"><i></i></span>
                        </div>
                        <div class="clear"></div>

                        <!-- Tabs -->
                        <div class="relativeWrap" data-toggle="source-code">
                            <div class="widget widget-tabs widget-tabs-gray report-tab">
                                <!-- Tabs Heading -->
                                <div class="widget-head">
                                    <ul>
                                        <li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i>Date</a></li>                                      
                                        <li><a class="glyphicons print" href="#tab-2" data-toggle="tab"><i></i><span data-bind="text: lang.lang.print_export">Print/Export</span></a></li>
                                    </ul>
                                </div>
                                <!-- // Tabs Heading END -->                                
                                <div class="widget-body">
                                    <div class="tab-content">

                                        <!-- //Date -->
                                        <div class="tab-pane active" id="tab-1">
                                                <div class="col-sm-12 row" style="padding:20px 0;padding-top: 0;">
                                            <div class="col-xs-12 col-sm-2" >
                                                <div class="control-group"> 
                                                    <label ><span data-bind="text: lang.lang.license">License</span></label>
                                                    <input 
                                                        data-role="dropdownlist" 
                                                        style="width: 100%;" 
                                                        data-option-label="License ..." 
                                                        data-auto-bind="false" 
                                                        data-value-primitive="true" 
                                                        data-text-field="name" 
                                                        data-value-field="id" 
                                                        data-bind="
                                                            value: licenseSelect,
                                                            source: licenseDS,
                                                            events: {change: licenseChange}">
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-2" >
                                                <div class="control-group">                             
                                                    <label ><span data-bind="text: lang.lang.location">Location</span></label>
                                                    <input 
                                                        data-role="dropdownlist" 
                                                        style="width: 100%;" 
                                                        data-option-label="Location ..." 
                                                        data-auto-bind="false" 
                                                        data-value-primitive="true" 
                                                        data-text-field="name" 
                                                        data-value-field="id" 
                                                        data-bind="
                                                            value: blocSelect,
                                                            enabled: haveLicense,
                                                            events: {change: onLocationChange},
                                                            source: blocDS">
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-3">
                                                <div class="control-group">                             
                                                    <label ><span data-bind="text: lang.lang.sub_location">Location</span></label>
                                                    <input 
                                                        data-role="dropdownlist" 
                                                        style="width: 100%;" 
                                                        data-option-label="Sub Location ..." 
                                                        data-auto-bind="false" 
                                                        data-value-primitive="true" 
                                                        data-text-field="name" 
                                                        data-value-field="id" 
                                                        data-bind="
                                                            value: subLocationSelect,
                                                            enabled: haveLocation,
                                                            events: {change: onSubLocationChange},
                                                            source: subLocationDS">
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-2" >
                                                <div class="control-group">                             
                                                    <label ><span data-bind="text: lang.lang.box">Box</span></label>
                                                    <input 
                                                        data-role="dropdownlist" 
                                                        style="width: 100%;" 
                                                        data-option-label="Box ..." 
                                                        data-auto-bind="false" 
                                                        data-value-primitive="true" 
                                                        data-text-field="name" 
                                                        data-value-field="id" 
                                                        data-bind="
                                                            value: boxSelect,
                                                            enabled: haveSubLocation,
                                                            source: boxDS">
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-2">
                                                <div class="control-group"> 
                                                    <label ><span data-bind="text: lang.lang.month_of">Month Of</span></label>
                                                    <input type="text" 
                                                        style="width: 100%;" 
                                                        data-role="datepicker"
                                                        data-format="MM-yyyy"
                                                        data-start="year" 
                                                        data-depth="year"
                                                        placeholder="Moth of ..." 
                                                        data-bind="value: monthOfUpload" />
                                                </div>
                                            </div>  
                                            <div class="col-xs-12 col-sm-1" >
                                                <div class="control-group"> 
                                                    <label ><span data-bind="text: lang.lang.search">search</span></label>  
                                                    <div class="row" style="margin: 0;">                    
                                                        <button type="button" data-role="button" data-bind="click: search" class="k-button" role="button" aria-disabled="false" tabindex="0"><i class="icon-search"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                            
                                        </div>
                                        <!-- Filter -->
                                        <div class="tab-pane" id="tab-2">
                                            <span id="savePrint" class="btn btn-icon btn-default glyphicons print print1" data-bind="click: printGrid" ><i></i> Print</span>
                                            <span id="excel" class="btn btn-icon btn-default execl" data-bind="click: ExportExcel" >
                                            <i class="fa fa-file-excel-o"></i>
                                            Export to Excel
                                            </span> 
                                        </div>
                                    </div>
                                </div>                              
                            </div>
                        </div>

                        <!-- // Tabs END -->
                        <div id="invFormContent">
                            <div class="block-title">
                                <h3 data-bind="text: institute.name"></h3>
                                <h2 data-bind="text: lang.lang.customer_list">Customer List</h2>
                                <p data-bind="text: monthOf"></p>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-6">
                                    <div class="total-sale">
                                        <p data-bind="text: lang.lang.number_of_customer">Number of Customer</p>
                                        <span data-bind="text: dataSource.total" ></span>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-bordered table-condensed table-striped table-primary table-vertical-center">
                                <thead>
                                    <tr>
                                        <th style="vertical-align: top;"><span data-bind="">code</span></th>
                                        <th style="vertical-align: top;"><span data-bind="text: lang.lang.customer"></span></th>
                                        <th style="text-align: center"><span data-bind="text:lang.lang.meter_number"></span></th>
                                        <th style="text-align: center"><span data-bind="">Previous</span></th>
                                        <th style="text-align: center"><span data-bind="">Current</span></th>
                                        <th style="text-align: center"><span data-bind="">Status</span></th>
                                        <th style="text-align: right"><span data-bind="text:lang.lang.address"></span></th>
                                        <th style="text-align: right"><span data-bind="text:lang.lang.license"></span></th>
                                    </tr>
                                </thead>
                                <tbody data-role="listview"
                                             data-bind="source: dataSource"
                                            
                                             data-template="customerList-temp"
                                ></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</script>
<script id="customerList-temp" type="text/x-kendo-template" >
    <tr>
        <td  style="font-weight: bold; color: black;">#: number #</td>
        <td  style="font-weight: bold; color: black;">#: name #</td>
    </tr>
    #for(var i= 0; i <line.length; i++) {#
        <tr>
            <td></td>
            <td></td>
            <td style="text-align: center">#=line[i].meter#</td>
            <td style="text-align: right">#=line[i].previous#</td>
            <td style="text-align: right">#=line[i].current#</td>
            <td style="text-align: right">#=line[i].status#</td>
            <td style="text-align: right">#=line[i].location#</td>
            <td style="text-align: right">#=line[i].branch#</td>
        </tr>

    #}#
</script>
<script id="customerNoConnection" type="text/x-kendo-template">
    <div class="container">
        <div class="row-fluid">
            <div id="waterreport" class="background">
                <div class="row-fluid">
                    <div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
                        <i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
                    </div>
                    <div id="example" class="k-content">
                        <div class="hidden-print pull-right" style="margin-bottom: 15px;">
                            <span class="pull-right glyphicons no-js remove_2"
                        onclick="javascript:window.history.back()"><i></i></span>
                        </div>
                        <div class="clear"></div>

                        <!-- Tabs -->
                        <div class="relativeWrap" data-toggle="source-code">
                            <div class="widget widget-tabs widget-tabs-gray report-tab">
                                <!-- Tabs Heading -->
                                <div class="widget-head">
                                    <ul>
                                        <li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i>Date</a></li>                                      
                                        <li><a class="glyphicons print" href="#tab-2" data-toggle="tab" data-bind="click: printGrid"><i></i>Print/Export</a></li
                                    </ul>
                                </div>
                                <!-- // Tabs Heading END -->                                
                                <div class="widget-body">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab-1">
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-2">
                                                    <input 
                                                        data-role="dropdownlist" 
                                                        data-option-label="License ..." 
                                                        data-auto-bind="false" 
                                                        data-value-primitive="true" 
                                                        data-text-field="name" 
                                                        data-value-field="id" 
                                                        data-bind="
                                                            value: licenseSelect,
                                                            source: licenseDS,
                                                            events: {change: licenseChange}" style="width: 100%;">
                                                </div>
                                                <div class="col-xs-12 col-sm-2">
                                                    <input 
                                                        data-role="dropdownlist" 
                                                        data-option-label="Location ..." 
                                                        data-auto-bind="false" 
                                                        data-value-primitive="false" 
                                                        data-text-field="name" 
                                                        data-value-field="id" 
                                                        data-bind="
                                                            value: blocSelect,
                                                            source: blocDS" style="width: 100%;">
                                                </div>
                                                <div class="col-xs-12 col-sm-2">
                                                     <button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>                            
                                                </div>
                                            </div>
                                        </div>                                                                             
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- // Tabs END -->
                        <div id="invFormContent">
                            <div class="block-title">
                                <h3 data-bind="text: institute.name"></h3>
                                <h2>Customer No Connection List</h2>
                            </div>
                            <table class="table table-borderless table-condensed ">
                                <thead>
                                    <tr>
                                        <th style="vertical-align: top;"><span>Customer Name</span></th>
                                        <th style="vertical-align: top;"><span>License</span></th>
                                        <th style="vertical-align: top;"><span>Location</span></th>
                                        <th style="vertical-align: top;"><span>Address</span></th>
                                        <th style="vertical-align: top;"><span style="text-align: right;">Phone</span></th>
                                        <th style="vertical-align: top;"><span>E-Mail</span></th>
                                    </tr>
                                </thead>
                                <tbody data-role="listview"
                                             data-bind="source: dataSource"
                                             data-template="customerNoConnection-temp"
                                ></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</script>
<script id="customerNoConnection-temp" type="text/x-kendo-template" >
    <tr>
        <td>#=name#</td>
        <td>#=branch#</td>
        <td>#=location#</td>
        <td>#=address#</td>
        <td style="text-align: right;">#=phone#</td>
        <td style="text-align: right;">#=email#</td>
    </tr>
</script>
<script id="disconnectList" type="text/x-kendo-template">
    <div class="container">
        <div class="row-fluid">
            <div id="waterreport" class="background">
                <div class="row-fluid">
                    <div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
                        <i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
                    </div>
                    <div id="example" class="k-content">
                        <div class="hidden-print pull-right" style="margin-bottom: 15px;">
                            <span class="pull-right glyphicons no-js remove_2"
                        onclick="javascript:window.history.back()"><i></i></span>
                        </div>
                        <div class="clear"></div>

                        <!-- Tabs -->
                        <div class="relativeWrap" data-toggle="source-code">
                            <div class="widget widget-tabs widget-tabs-gray report-tab">
                                <!-- Tabs Heading -->
                                <div class="widget-head">
                                    <ul>
                                        <li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i>Date</a></li>                                      
                                        <li><a class="glyphicons print" href="#tab-2" data-toggle="tab" data-bind="click: printGrid"><i></i>Print/Export</a></li
                                    </ul>
                                </div>
                                <!-- // Tabs Heading END -->                                
                                <div class="widget-body">
                                            <div class="col-sm-12 row" style="padding:20px 0;padding-top: 0;">
                                                <div class="col-xs-12 col-sm-2" >
                                                    <div class="control-group"> 
                                                        <label ><span data-bind="text: lang.lang.license">License</span></label>
                                                        <input 
                                                            data-role="dropdownlist" 
                                                            style="width: 100%;" 
                                                            data-option-label="License ..." 
                                                            data-auto-bind="false" 
                                                            data-value-primitive="true" 
                                                            data-text-field="name" 
                                                            data-value-field="id" 
                                                            data-bind="
                                                                value: licenseSelect,
                                                                source: licenseDS,
                                                                events: {change: licenseChange}">
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-2" >
                                                    <div class="control-group">                             
                                                        <label ><span data-bind="text: lang.lang.location">Location</span></label>
                                                        <input 
                                                            data-role="dropdownlist" 
                                                            style="width: 100%;" 
                                                            data-option-label="Location ..." 
                                                            data-auto-bind="false" 
                                                            data-value-primitive="true" 
                                                            data-text-field="name" 
                                                            data-value-field="id" 
                                                            data-bind="
                                                                value: blocSelect,
                                                                enabled: haveLicense,
                                                                events: {change: onLocationChange},
                                                                source: blocDS">
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-3">
                                                    <div class="control-group">                             
                                                        <label ><span data-bind="text: lang.lang.sub_location">Location</span></label>
                                                        <input 
                                                            data-role="dropdownlist" 
                                                            style="width: 100%;" 
                                                            data-option-label="Sub Location ..." 
                                                            data-auto-bind="false" 
                                                            data-value-primitive="true" 
                                                            data-text-field="name" 
                                                            data-value-field="id" 
                                                            data-bind="
                                                                value: subLocationSelect,
                                                                enabled: haveLocation,
                                                                events: {change: onSubLocationChange},
                                                                source: subLocationDS">
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-2" >
                                                    <div class="control-group">                             
                                                        <label ><span data-bind="text: lang.lang.box">Box</span></label>
                                                        <input 
                                                            data-role="dropdownlist" 
                                                            style="width: 100%;" 
                                                            data-option-label="Box ..." 
                                                            data-auto-bind="false" 
                                                            data-value-primitive="true" 
                                                            data-text-field="name" 
                                                            data-value-field="id" 
                                                            data-bind="
                                                                value: boxSelect,
                                                                enabled: haveSubLocation,
                                                                source: boxDS">
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-2">
                                                    <div class="control-group"> 
                                                        <label ><span data-bind="text: lang.lang.month_of">Month Of</span></label>
                                                        <input type="text" 
                                                            style="width: 100%;" 
                                                            data-role="datepicker"
                                                            data-format="MM-yyyy"
                                                            data-start="year" 
                                                            data-depth="year"
                                                            placeholder="Moth of ..." 
                                                            data-bind="value: monthOfUpload" />
                                                    </div>
                                                </div>  
                                                <div class="col-xs-12 col-sm-1" >
                                                    <div class="control-group"> 
                                                        <label ><span data-bind="text: lang.lang.search">search</span></label>  
                                                        <div class="row" style="margin: 0;">                    
                                                            <button type="button" data-role="button" data-bind="click: search" class="k-button" role="button" aria-disabled="false" tabindex="0"><i class="icon-search"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" data-bind="visible: selectMeter">
                                                <a data-bind="visible: haveData, click: exportEXCEL">
                                                    <span id="saveClose" class="btn btn-icon btn-success glyphicons download" style="width: 250px!important;">
                                                        <i></i> 
                                                        <span data-bind="text: lang.lang.download_reading_book">Download Reading Book</span>
                                                    </span>
                                                </a>
                                                <br>
                                                <table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs">
                                                    <thead>
                                                        <tr>
                                                            <th style="vertical-align: top;"><span data-bind="text: lang.lang.name">name</span></th>
                                                            <th style="vertical-align: top;"><span data-bind="text: lang.lang.meter_number">Meter Number</span></th>
                                                            <th style="vertical-align: top;"><span data-bind="text: lang.lang.from_date">From Date</span></th>
                                                            <th style="vertical-align: top;"><span data-bind="text: lang.lang.to_date">To Date</span></th>
                                                            <th style="vertical-align: top;"><span data-bind="text: lang.lang.month_of">Month Of</span></th>
                                                            <th style="vertical-align: top;"><span data-bind="text: lang.lang.previous">Previouse</span></th>
                                                            <th style="vertical-align: top;"><span data-bind="text: lang.lang.current">Current</span></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody 
                                                        data-bind="source: uploadDS" 
                                                        data-auto-bind="false" 
                                                        data-role="listview" 
                                                        data-template="reading-template">
                                                    </tbody>
                                                </table>
                                            </div>
                                </div>
                            </div>
                        </div>

                        <!-- // Tabs END -->
                        <div id="invFormContent">
                            <div class="block-title">
                                <h3 data-bind="text: institute.name"></h3>
                                <h2 data-bind="text: lang.lang.disconnect_customer_list">Disconnect Customer List</h2>
                                <p data-bind="text: monthOf"></p>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-6">
                                    <div class="total-sale">
                                        <p data-bind="text: lang.lang.number_of_customer">Number of Customer</p>
                                        <span data-bind="text: dataSource.total" ></span>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-bordered table-condensed table-striped table-primary table-vertical-center">
                                <thead>
                                    <tr>
                                        <th style="vertical-align: top;"><span data-bind="">code</span></th>
                                        <th style="vertical-align: top;"><span data-bind="text: lang.lang.customer"></span></th>
                                        <th style="text-align: center"><span data-bind="text:lang.lang.meter_number"></span></th>
                                        <th style="text-align: center"><span data-bind="">Previous</span></th>
                                        <th style="text-align: center"><span data-bind="">Current</span></th>
                                        <th style="text-align: center"><span data-bind="">Status</span></th>
                                        <th style="text-align: right"><span data-bind="text:lang.lang.address"></span></th>
                                        <th style="text-align: right"><span data-bind="text:lang.lang.license"></span></th>
                                    </tr>
                                </thead>
                                <tbody data-role="listview"
                                             data-bind="source: dataSource"                                         
                                             data-template="disconnectList-temp"
                                ></tbody>
                            </table>
                            <div id="pager" class="k-pager-wrap"
                                 data-role="pager"
                                 data-auto-bind="false"
                                 data-bind="source: dataSource"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</script>
<script id="disconnectList-temp" type="text/x-kendo-template" >
    <tr>
        <td  style="font-weight: bold; color: black;">#: number #</td>
        <td  style="font-weight: bold; color: black;">#: name #</td>
    </tr>
    #for(var i= 0; i <line.length; i++) {#
        <tr>
            <td></td>
            <td></td>
            <td style="text-align: center">#=line[i].meter#</td>
            <td style="text-align: right">#=line[i].previous#</td>
            <td style="text-align: right">#=line[i].current#</td>
            <td style="text-align: right">#=line[i].status#</td>
            <td style="text-align: right">#=line[i].location#</td>
            <td style="text-align: right">#=line[i].branch#</td>
        </tr>

    #}#
</script>
<script id="to_be_connectionList" type="text/x-kendo-template">
    <div class="container">
        <div class="row-fluid">
            <div id="waterreport" class="background">
                <div class="row-fluid">
                    <div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
                        <i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
                    </div>
                    <div id="example" class="k-content">
                        <div class="hidden-print pull-right" style="margin-bottom: 15px;">
                            <span class="pull-right glyphicons no-js remove_2"
                        onclick="javascript:window.history.back()"><i></i></span>
                        </div>
                        <div class="clear"></div>

                        <!-- Tabs -->
                        <div class="relativeWrap" data-toggle="source-code" style="margin: 15px 0;">
                            <div class="widget widget-tabs widget-tabs-gray report-tab">
                                <!-- Tabs Heading -->
                                <div class="widget-head" style="background: #203864 !important; color: #fff;">
                                    <ul>
                                        <li class="active"><a class="glyphicons filter" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text: lang.lang.filter">Filter</span></a></li>  
                                        <li><a class="glyphicons print" href="#tab-2" data-toggle="tab"><i></i><span data-bind="text: lang.lang.print_export">Print/Export</span></a></li>
                                    </ul>
                                </div>
                                <!-- // Tabs Heading END -->                                
                                <div class="widget-body">
                                            <div class="col-sm-12 row" style="padding:20px 0;padding-top: 0;">
                                                <div class="col-xs-12 col-sm-2" >
                                                    <div class="control-group"> 
                                                        <label ><span data-bind="text: lang.lang.license">License</span></label>
                                                        <input 
                                                            data-role="dropdownlist" 
                                                            style="width: 100%;" 
                                                            data-option-label="License ..." 
                                                            data-auto-bind="false" 
                                                            data-value-primitive="true" 
                                                            data-text-field="name" 
                                                            data-value-field="id" 
                                                            data-bind="
                                                                value: licenseSelect,
                                                                source: licenseDS,
                                                                events: {change: licenseChange}">
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-2" >
                                                    <div class="control-group">                             
                                                        <label ><span data-bind="text: lang.lang.location">Location</span></label>
                                                        <input 
                                                            data-role="dropdownlist" 
                                                            style="width: 100%;" 
                                                            data-option-label="Location ..." 
                                                            data-auto-bind="false" 
                                                            data-value-primitive="true" 
                                                            data-text-field="name" 
                                                            data-value-field="id" 
                                                            data-bind="
                                                                value: blocSelect,
                                                                enabled: haveLicense,
                                                                events: {change: onLocationChange},
                                                                source: blocDS">
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-3">
                                                    <div class="control-group">                             
                                                        <label ><span data-bind="text: lang.lang.sub_location">Location</span></label>
                                                        <input 
                                                            data-role="dropdownlist" 
                                                            style="width: 100%;" 
                                                            data-option-label="Sub Location ..." 
                                                            data-auto-bind="false" 
                                                            data-value-primitive="true" 
                                                            data-text-field="name" 
                                                            data-value-field="id" 
                                                            data-bind="
                                                                value: subLocationSelect,
                                                                enabled: haveLocation,
                                                                events: {change: onSubLocationChange},
                                                                source: subLocationDS">
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-2" >
                                                    <div class="control-group">                             
                                                        <label ><span data-bind="text: lang.lang.box">Box</span></label>
                                                        <input 
                                                            data-role="dropdownlist" 
                                                            style="width: 100%;" 
                                                            data-option-label="Box ..." 
                                                            data-auto-bind="false" 
                                                            data-value-primitive="true" 
                                                            data-text-field="name" 
                                                            data-value-field="id" 
                                                            data-bind="
                                                                value: boxSelect,
                                                                enabled: haveSubLocation,
                                                                source: boxDS">
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-2">
                                                    <div class="control-group"> 
                                                        <label ><span data-bind="text: lang.lang.month_of">Month Of</span></label>
                                                        <input type="text" 
                                                            style="width: 100%;" 
                                                            data-role="datepicker"
                                                            data-format="MM-yyyy"
                                                            data-start="year" 
                                                            data-depth="year"
                                                            placeholder="Moth of ..." 
                                                            data-bind="value: monthOfUpload" />
                                                    </div>
                                                </div>  
                                                <div class="col-xs-12 col-sm-1" >
                                                    <div class="control-group"> 
                                                        <label ><span data-bind="text: lang.lang.search">search</span></label>  
                                                        <div class="row" style="margin: 0;">                    
                                                            <button type="button" data-role="button" data-bind="click: search" class="k-button" role="button" aria-disabled="false" tabindex="0"><i class="icon-search"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" data-bind="visible: selectMeter">
                                                <a data-bind="visible: haveData, click: exportEXCEL">
                                                    <span id="saveClose" class="btn btn-icon btn-success glyphicons download" style="width: 250px!important;">
                                                        <i></i> 
                                                        <span data-bind="text: lang.lang.download_reading_book">Download Reading Book</span>
                                                    </span>
                                                </a>
                                                <br>
                                                <table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs">
                                                    <thead>
                                                        <tr>
                                                            <th style="vertical-align: top;"><span data-bind="text: lang.lang.name">name</span></th>
                                                            <th style="vertical-align: top;"><span data-bind="text: lang.lang.meter_number">Meter Number</span></th>
                                                            <th style="vertical-align: top;"><span data-bind="text: lang.lang.from_date">From Date</span></th>
                                                            <th style="vertical-align: top;"><span data-bind="text: lang.lang.to_date">To Date</span></th>
                                                            <th style="vertical-align: top;"><span data-bind="text: lang.lang.month_of">Month Of</span></th>
                                                            <th style="vertical-align: top;"><span data-bind="text: lang.lang.previous">Previouse</span></th>
                                                            <th style="vertical-align: top;"><span data-bind="text: lang.lang.current">Current</span></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody 
                                                        data-bind="source: uploadDS" 
                                                        data-auto-bind="false" 
                                                        data-role="listview" 
                                                        data-template="reading-template">
                                                    </tbody>
                                                </table>
                                            </div>
                                </div>
                            </div>
                        </div>
                        <!-- // Tabs END -->

                        <div id="invFormContent">
                            <div class="block-title" style="">
                                <h3 data-bind="text: institute.name"></h3>
                                <h2 data-bind="text: lang.lang.connect_list"></h2>
                            </div>
                            <table style="margin-bottom: 0;" class="table table-bordered table-condensed table-striped table-primary table-vertical-center">
                                <thead>
                                    <tr>
                                        <th style="vertical-align: top;"><span data-bind="text: lang.lang.customer_name">Customer Name</span></th>
                                        <th style="vertical-align: top;"><span data-bind="text:lang.lang.license"></span></th>
                                        <th style="vertical-align: top;"><span data-bind="text: lang.lang.number">Number</span></th>
                                        <th style="vertical-align: top;"><span data-bind="text: lang.lang.date">Date</span></th>
                                        <th style="vertical-align: top;"><span data-bind="text: lang.lang.phone">Phone</span></th>
                                        <th style="vertical-align: top;"><span data-bind="text: lang.lang.address">Address</span></th>
                                    </tr>
                                </thead>
                                <tbody data-role="listview"
                                             data-bind="source: dataSource"
                                             data-template="connectionList-temp"
                                ></tbody>
                            </table>
                            <div id="pager" class="k-pager-wrap"
                                 data-role="pager"
                                 data-auto-bind="false"
                                 data-bind="source: dataSource"></div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</script>
<script id="to_be_connectionList-temp" type="text/x-kendo-template" >
    <tr>
        <td>#=name#</td>
        <td>#=license#</td>
        <td>#=number#</td>
        <td>#=dataUsed#</td>
        <td>#=phone#</td>
        <td style="text-align: right;">#=address#</td>
    </tr>
</script>
<script id="connectionList" type="text/x-kendo-template">
    <div class="container">
        <div class="row-fluid">
            <div id="waterreport" class="background">
                <div class="row-fluid">
                    <div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
                        <i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
                    </div>
                    <div id="example" class="k-content">
                        <div class="hidden-print pull-right" style="margin-bottom: 15px;">
                            <span class="pull-right glyphicons no-js remove_2"
                        onclick="javascript:window.history.back()"><i></i></span>
                        </div>
                        <div class="clear"></div>

                        <!-- Tabs -->
                        <div class="relativeWrap" data-toggle="source-code" style="margin: 15px 0;">
                            <div class="widget widget-tabs widget-tabs-gray report-tab">
                                <!-- Tabs Heading -->
                                <div class="widget-head" style="background: #203864 !important; color: #fff;">
                                    <ul>
                                        <li class="active"><a class="glyphicons filter" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text: lang.lang.filter">Filter</span></a></li>  
                                        <li><a class="glyphicons print" href="#tab-2" data-toggle="tab"><i></i><span data-bind="text: lang.lang.print_export">Print/Export</span></a></li>
                                    </ul>
                                </div>
                                <!-- // Tabs Heading END -->                                
                                <div class="widget-body">
                                            <div class="col-sm-12 row" style="padding:20px 0;padding-top: 0;">
                                                <div class="col-xs-12 col-sm-2" >
                                                    <div class="control-group"> 
                                                        <label ><span data-bind="text: lang.lang.license">License</span></label>
                                                        <input 
                                                            data-role="dropdownlist" 
                                                            style="width: 100%;" 
                                                            data-option-label="License ..." 
                                                            data-auto-bind="false" 
                                                            data-value-primitive="true" 
                                                            data-text-field="name" 
                                                            data-value-field="id" 
                                                            data-bind="
                                                                value: licenseSelect,
                                                                source: licenseDS,
                                                                events: {change: licenseChange}">
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-2" >
                                                    <div class="control-group">                             
                                                        <label ><span data-bind="text: lang.lang.location">Location</span></label>
                                                        <input 
                                                            data-role="dropdownlist" 
                                                            style="width: 100%;" 
                                                            data-option-label="Location ..." 
                                                            data-auto-bind="false" 
                                                            data-value-primitive="true" 
                                                            data-text-field="name" 
                                                            data-value-field="id" 
                                                            data-bind="
                                                                value: blocSelect,
                                                                enabled: haveLicense,
                                                                events: {change: onLocationChange},
                                                                source: blocDS">
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-3">
                                                    <div class="control-group">                             
                                                        <label ><span data-bind="text: lang.lang.sub_location">Location</span></label>
                                                        <input 
                                                            data-role="dropdownlist" 
                                                            style="width: 100%;" 
                                                            data-option-label="Sub Location ..." 
                                                            data-auto-bind="false" 
                                                            data-value-primitive="true" 
                                                            data-text-field="name" 
                                                            data-value-field="id" 
                                                            data-bind="
                                                                value: subLocationSelect,
                                                                enabled: haveLocation,
                                                                events: {change: onSubLocationChange},
                                                                source: subLocationDS">
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-2" >
                                                    <div class="control-group">                             
                                                        <label ><span data-bind="text: lang.lang.box">Box</span></label>
                                                        <input 
                                                            data-role="dropdownlist" 
                                                            style="width: 100%;" 
                                                            data-option-label="Box ..." 
                                                            data-auto-bind="false" 
                                                            data-value-primitive="true" 
                                                            data-text-field="name" 
                                                            data-value-field="id" 
                                                            data-bind="
                                                                value: boxSelect,
                                                                enabled: haveSubLocation,
                                                                source: boxDS">
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-2">
                                                    <div class="control-group"> 
                                                        <label ><span data-bind="text: lang.lang.month_of">Month Of</span></label>
                                                        <input type="text" 
                                                            style="width: 100%;" 
                                                            data-role="datepicker"
                                                            data-format="MM-yyyy"
                                                            data-start="year" 
                                                            data-depth="year"
                                                            placeholder="Moth of ..." 
                                                            data-bind="value: monthOfUpload" />
                                                    </div>
                                                </div>  
                                                <div class="col-xs-12 col-sm-1" >
                                                    <div class="control-group"> 
                                                        <label ><span data-bind="text: lang.lang.search">search</span></label>  
                                                        <div class="row" style="margin: 0;">                    
                                                            <button type="button" data-role="button" data-bind="click: search" class="k-button" role="button" aria-disabled="false" tabindex="0"><i class="icon-search"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" data-bind="visible: selectMeter">
                                                <a data-bind="visible: haveData, click: exportEXCEL">
                                                    <span id="saveClose" class="btn btn-icon btn-success glyphicons download" style="width: 250px!important;">
                                                        <i></i> 
                                                        <span data-bind="text: lang.lang.download_reading_book">Download Reading Book</span>
                                                    </span>
                                                </a>
                                                <br>
                                                <table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs">
                                                    <thead>
                                                        <tr>
                                                            <th style="vertical-align: top;"><span data-bind="text: lang.lang.name">name</span></th>
                                                            <th style="vertical-align: top;"><span data-bind="text: lang.lang.meter_number">Meter Number</span></th>
                                                            <th style="vertical-align: top;"><span data-bind="text: lang.lang.from_date">From Date</span></th>
                                                            <th style="vertical-align: top;"><span data-bind="text: lang.lang.to_date">To Date</span></th>
                                                            <th style="vertical-align: top;"><span data-bind="text: lang.lang.month_of">Month Of</span></th>
                                                            <th style="vertical-align: top;"><span data-bind="text: lang.lang.previous">Previouse</span></th>
                                                            <th style="vertical-align: top;"><span data-bind="text: lang.lang.current">Current</span></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody 
                                                        data-bind="source: uploadDS" 
                                                        data-auto-bind="false" 
                                                        data-role="listview" 
                                                        data-template="reading-template">
                                                    </tbody>
                                                </table>
                                            </div>
                                </div>
                            </div>
                        </div>
                        <!-- // Tabs END -->

                        <div id="invFormContent">
                            <div class="block-title" style="">
                                <h3 data-bind="text: institute.name"></h3>
                                <h2 data-bind="text: lang.lang.connected_list"></h2>
                            </div>
                            <table style="margin-bottom: 0;" class="table table-bordered table-condensed table-striped table-primary table-vertical-center">
                                <thead>
                                    <tr>
                                        <th style="vertical-align: top;"><span data-bind="text: lang.lang.customer_name">Customer Name</span></th>
                                        <th style="vertical-align: top;"><span data-bind="text:lang.lang.license"></span></th>
                                        <th style="vertical-align: top;"><span data-bind="text: lang.lang.number">Number</span></th>
                                        <th style="vertical-align: top;"><span data-bind="text: lang.lang.date">Date</span></th>
                                        <th style="vertical-align: top;"><span data-bind="text: lang.lang.phone">Phone</span></th>
                                        <th style="vertical-align: top;"><span data-bind="text: lang.lang.address">Address</span></th>
                                    </tr>
                                </thead>
                                <tbody data-role="listview"
                                             data-bind="source: dataSource"
                                             data-template="connectionList-temp"
                                ></tbody>
                            </table>
                            <div id="pager" class="k-pager-wrap"
                                 data-role="pager"
                                 data-auto-bind="false"
                                 data-bind="source: dataSource"></div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</script>
<script id="connectionList-temp" type="text/x-kendo-template" >
    <tr>
        <td>#=name#</td>
        <td>#=location#</td>
        <td>#=number#</td>
        <td>#=dataUsed#</td>
        <td>#=phone#</td>
        <td style="text-align: right;">#=address#</td>
    </tr>
</script>
<script id="inactiveList" type="text/x-kendo-template">
    <div class="container">
        <div class="row-fluid">
            <div id="waterreport" class="background">
                <div class="row-fluid">
                    <div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
                        <i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
                    </div>
                    <div id="example" class="k-content">
                        <div class="hidden-print pull-right" style="margin-bottom: 15px;">
                            <span class="pull-right glyphicons no-js remove_2"
                        onclick="javascript:window.history.back()"><i></i></span>
                        </div>
                        <div class="clear"></div>

                        <!-- Tabs -->
                        <div class="relativeWrap" data-toggle="source-code">
                            <div class="widget widget-tabs widget-tabs-gray report-tab">
                                <!-- Tabs Heading -->
                                <div class="widget-head">
                                    <ul>
                                        <li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i>Date</a></li>                                      
                                        <li><a class="glyphicons print" href="#tab-2" data-toggle="tab" data-bind="click: printGrid"><i></i>Print/Export</a></li
                                    </ul>
                                </div>
                                <!-- // Tabs Heading END -->                                
                                <div class="widget-body">
                                            <div class="col-sm-12 row" style="padding:20px 0;padding-top: 0;">
                                                <div class="col-xs-12 col-sm-2" >
                                                    <div class="control-group"> 
                                                        <label ><span data-bind="text: lang.lang.license">License</span></label>
                                                        <input 
                                                            data-role="dropdownlist" 
                                                            style="width: 100%;" 
                                                            data-option-label="License ..." 
                                                            data-auto-bind="false" 
                                                            data-value-primitive="true" 
                                                            data-text-field="name" 
                                                            data-value-field="id" 
                                                            data-bind="
                                                                value: licenseSelect,
                                                                source: licenseDS,
                                                                events: {change: licenseChange}">
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-2" >
                                                    <div class="control-group">                             
                                                        <label ><span data-bind="text: lang.lang.location">Location</span></label>
                                                        <input 
                                                            data-role="dropdownlist" 
                                                            style="width: 100%;" 
                                                            data-option-label="Location ..." 
                                                            data-auto-bind="false" 
                                                            data-value-primitive="true" 
                                                            data-text-field="name" 
                                                            data-value-field="id" 
                                                            data-bind="
                                                                value: blocSelect,
                                                                enabled: haveLicense,
                                                                events: {change: onLocationChange},
                                                                source: blocDS">
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-3">
                                                    <div class="control-group">                             
                                                        <label ><span data-bind="text: lang.lang.sub_location">Location</span></label>
                                                        <input 
                                                            data-role="dropdownlist" 
                                                            style="width: 100%;" 
                                                            data-option-label="Sub Location ..." 
                                                            data-auto-bind="false" 
                                                            data-value-primitive="true" 
                                                            data-text-field="name" 
                                                            data-value-field="id" 
                                                            data-bind="
                                                                value: subLocationSelect,
                                                                enabled: haveLocation,
                                                                events: {change: onSubLocationChange},
                                                                source: subLocationDS">
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-2" >
                                                    <div class="control-group">                             
                                                        <label ><span data-bind="text: lang.lang.box">Box</span></label>
                                                        <input 
                                                            data-role="dropdownlist" 
                                                            style="width: 100%;" 
                                                            data-option-label="Box ..." 
                                                            data-auto-bind="false" 
                                                            data-value-primitive="true" 
                                                            data-text-field="name" 
                                                            data-value-field="id" 
                                                            data-bind="
                                                                value: boxSelect,
                                                                enabled: haveSubLocation,
                                                                source: boxDS">
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-2">
                                                    <div class="control-group"> 
                                                        <label ><span data-bind="text: lang.lang.month_of">Month Of</span></label>
                                                        <input type="text" 
                                                            style="width: 100%;" 
                                                            data-role="datepicker"
                                                            data-format="MM-yyyy"
                                                            data-start="year" 
                                                            data-depth="year"
                                                            placeholder="Moth of ..." 
                                                            data-bind="value: monthOfUpload" />
                                                    </div>
                                                </div>  
                                                <div class="col-xs-12 col-sm-1" >
                                                    <div class="control-group"> 
                                                        <label ><span data-bind="text: lang.lang.search">search</span></label>  
                                                        <div class="row" style="margin: 0;">                    
                                                            <button type="button" data-role="button" data-bind="click: search" class="k-button" role="button" aria-disabled="false" tabindex="0"><i class="icon-search"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" data-bind="visible: selectMeter">
                                                <a data-bind="visible: haveData, click: exportEXCEL">
                                                    <span id="saveClose" class="btn btn-icon btn-success glyphicons download" style="width: 250px!important;">
                                                        <i></i> 
                                                        <span data-bind="text: lang.lang.download_reading_book">Download Reading Book</span>
                                                    </span>
                                                </a>
                                                <br>
                                                <table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs">
                                                    <thead>
                                                        <tr>
                                                            <th style="vertical-align: top;"><span data-bind="text: lang.lang.name">name</span></th>
                                                            <th style="vertical-align: top;"><span data-bind="text: lang.lang.meter_number">Meter Number</span></th>
                                                            <th style="vertical-align: top;"><span data-bind="text: lang.lang.from_date">From Date</span></th>
                                                            <th style="vertical-align: top;"><span data-bind="text: lang.lang.to_date">To Date</span></th>
                                                            <th style="vertical-align: top;"><span data-bind="text: lang.lang.month_of">Month Of</span></th>
                                                            <th style="vertical-align: top;"><span data-bind="text: lang.lang.previous">Previouse</span></th>
                                                            <th style="vertical-align: top;"><span data-bind="text: lang.lang.current">Current</span></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody 
                                                        data-bind="source: uploadDS" 
                                                        data-auto-bind="false" 
                                                        data-role="listview" 
                                                        data-template="reading-template">
                                                    </tbody>
                                                </table>
                                            </div>
                                </div>
                            </div>
                        </div>

                        <!-- // Tabs END -->
                        <div id="invFormContent">
                            <div class="block-title">
                                <h3 data-bind="text: institute.name"></h3>
                                <h2 data-bind="text: lang.lang.inactive_customer">Inactive Customer List</h2>
                                <p data-bind="text: monthOf"></p>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-6">
                                    <div class="total-sale">
                                        <p data-bind="text: lang.lang.number_of_customer">Number of Customer</p>
                                        <span data-bind="text: dataSource.total" ></span>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-bordered table-condensed table-striped table-primary table-vertical-center">
                                <thead>
                                    <tr>
                                        <th style="vertical-align: top;"><span data-bind="">code</span></th>
                                        <th style="vertical-align: top;"><span data-bind="text: lang.lang.customer"></span></th>
                                        <th style="text-align: center"><span data-bind="text:lang.lang.meter_number"></span></th>
                                        <th style="text-align: center"><span data-bind="">Previous</span></th>
                                        <th style="text-align: center"><span data-bind="">Current</span></th>
                                        <th style="text-align: center"><span data-bind="">Status</span></th>
                                        <th style="text-align: right"><span data-bind="text:lang.lang.address"></span></th>
                                        <th style="text-align: right"><span data-bind="text:lang.lang.license"></span></th>
                                    </tr>
                                </thead>
                                <tbody data-role="listview"
                                             data-bind="source: dataSource"                                         
                                             data-template="inactiveList-temp"
                                ></tbody>
                            </table>
                            <div id="pager" class="k-pager-wrap"
                                 data-role="pager"
                                 data-auto-bind="false"
                                 data-bind="source: dataSource"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</script>
<script id="inactiveList-temp" type="text/x-kendo-template" >
    <tr>
        <td  style="font-weight: bold; color: black;">#: number #</td>
        <td  style="font-weight: bold; color: black;">#: name #</td>
    </tr>
    #for(var i= 0; i <line.length; i++) {#
        <tr>
            <td></td>
            <td></td>
            <td style="text-align: center">#=line[i].meter#</td>
            <td style="text-align: right">#=line[i].previous#</td>
            <td style="text-align: right">#=line[i].current#</td>
            <td style="text-align: right">#=line[i].status#</td>
            <td style="text-align: right">#=line[i].location#</td>
            <td style="text-align: right">#=line[i].branch#</td>
        </tr>

    #}#
</script>
<script id="to_be_disconnectList" type="text/x-kendo-template">
    <div class="container">
        <div class="row-fluid">
            <div id="waterreport" class="background">
                <div class="row-fluid">
                    <div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
                        <i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
                    </div>
                    <div id="example" class="k-content">
                        <div class="hidden-print pull-right" style="margin-bottom: 15px;">
                            <span class="pull-right glyphicons no-js remove_2"
                        onclick="javascript:window.history.back()"><i></i></span>
                        </div>
                        <div class="clear"></div>

                        <!-- Tabs -->
                        <div class="relativeWrap" data-toggle="source-code">
                            <div class="widget widget-tabs widget-tabs-gray report-tab">
                                <!-- Tabs Heading -->
                                <div class="widget-head">
                                    <ul>
                                        <li class="active"><a class="glyphicons filter" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text: lang.lang.filter">Filter</span></a></li>  
                                        <li><a class="glyphicons print" href="#tab-2" data-toggle="tab"><i></i><span data-bind="text: lang.lang.print_export">Print/Export</span></a></li>
                                    </ul>
                                </div>
                                <!-- // Tabs Heading END -->                                
                                <div class="widget-body">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab-1">
                                            <div class="row">
                                                <div class="col-xs-12-3 col-sm-2">
                                                    <label ><span data-bind="text: lang.lang.license">License</span></label>
                                                    <input 
                                                        data-role="dropdownlist" 
                                                        style="width: 100%;" 
                                                        data-option-label="License ..." 
                                                        data-auto-bind="false" 
                                                        data-value-primitive="true" 
                                                        data-text-field="name" 
                                                        data-value-field="id" 
                                                        data-bind="
                                                            value: licenseSelect,
                                                            source: licenseDS,
                                                            events: {change: licenseChange}">
                                                </div>
                                                <div class="col-xs-12-3 col-sm-2">
                                                    <label ><span data-bind="text: lang.lang.location">Location</span></label>
                                                    <input 
                                                        data-role="dropdownlist" 
                                                        style="width: 100%;" 
                                                        data-option-label="Location ..." 
                                                        data-auto-bind="false" 
                                                        data-value-primitive="true" 
                                                        data-text-field="name" 
                                                        data-value-field="id" 
                                                        data-bind="
                                                            value: blocSelect,
                                                            enabled: haveLicense,
                                                            source: blocDS,
                                                            events: {change: onLocationChange}">
                                                </div>
                                                <div class="col-xs-12 col-sm-3">
                                                    <div class="control-group">                             
                                                        <label ><span data-bind="text: lang.lang.sub_location">Location</span></label>
                                                        <input 
                                                            data-role="dropdownlist" 
                                                            style="width: 100%;" 
                                                            data-option-label="Sub Location ..." 
                                                            data-auto-bind="false" 
                                                            data-value-primitive="true" 
                                                            data-text-field="name" 
                                                            data-value-field="id" 
                                                            data-bind="
                                                                value: subLocationSelect,
                                                                enabled: haveLocation,
                                                                source: subLocationDS">
                                                    </div>
                                                </div>
                                                <div class="col-xs-12-3 col-sm-1">
                                                    <label ><span data-bind="text: lang.lang.search">search</span></label>  
                                                    <button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>                         
                                                </div>
                                            </div>
                                        </div>  
                                        <!-- PRINT/EXPORT  -->
                                        <div class="tab-pane report" id="tab-2">                                            
                                            <span id="savePrint" class="btn btn-icon btn-default glyphicons print print1" data-bind="click: printGrid" ><i></i> Print</span>
                                            <span id="excel" class="btn btn-icon btn-default execl" data-bind="click: ExportExcel" >
                                                <i class="fa fa-file-excel-o"></i>
                                                Export to Excel
                                            </span>
                                        </div>                                                                             
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- // Tabs END -->
                        <div id="invFormContent">
                            <div class="block-title">
                                <h3 data-bind="text: company.name"></h3>
                                <h2 data-bind="text: lang.lang.to_be_disconnect_list">To Be Disconnect Customer List</h2>
                                <p data-bind="text: displayDate"></p>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-sm-5">
                                    <div class="total-sale">
                                        <p data-bind="text: lang.lang.number_of_customer"></p>
                                        <span data-bind="text: dataSource.total"></span>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-7">
                                    <div class="total-sale">
                                        <p data-bind="text: lang.lang.total_customer_balance"></p>
                                        <span data-bind="text: total"></span>                       
                                    </div>
                                </div>
                            </div>

                            <table style="margin-bottom: 0;" class="table table-bordered table-condensed table-striped table-primary table-vertical-center">
                                <thead>
                                    <tr>                                        
                                        <th style="vertical-align: top;" data-bind="text: lang.lang.customer_name"></th>
                                        <th style="text-align: left; vertical-align: top;" data-bind="text: lang.lang.phone"></th>
                                        <th style="text-align: left; vertical-align: top;" data-bind="text: lang.lang.box"></th>        
                                        <th style="text-align: left; vertical-align: top;" data-bind="text: lang.lang.meter_number"></th>   
                                        <th style="text-align: right; vertical-align: top; text-align: center;" data-bind="text: lang.lang.due_date"></th>  
                                        <th style="text-align: right; vertical-align: top; text-align: center;" data-bind="text: lang.lang.status"></th>
                                        <th style="vertical-align: top; text-align: right;" data-bind="text: lang.lang.balance"></th>
                                    </tr>
                                </thead>
                                <tbody data-role="listview"
                                     data-auto-bind="false"
                                     data-bind="source: dataSource"                                      
                                     data-template="to_be_disconnectList-template"
                                ></tbody>
                            </table>
                            <div id="pager" class="k-pager-wrap"
                                 data-role="pager"
                                 data-auto-bind="false"
                                 data-bind="source: dataSource"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</script>
<script id="to_be_disconnectList-template" type="text/x-kendo-template">
    <tr style="font-weight: bold">
        <td colspan="7">
        #=location_name#</td>
    </tr>   
    <tr>
        <td colspan="7">#=name#</td>
    </tr>
    # var amount = 0;#
    # var contactCount = 0;#
    #for(var i= 0; i < line.length; i++) {#
        # amount += kendo.parseFloat(line[i].amount);#
        # contactCount += kendo.parseFloat(line[i].contactCount);#
        <tr>
            <td></td>
            <td style="text-align: left;">#=line[i].phone#</td> 
            <td style="text-align: left;">#=line[i].box#</td>
            <td style="text-align: left;">#=line[i].meter_number#</td>  
            <td style="text-align: left;">#=kendo.toString(new Date(line[i].due_date), "dd-MM-yyyy")#</td>  
            <td style="text-align: center;">
                # var date = new Date(), dueDates = new Date(line[i].due_date).getTime(), toDay = new Date(date).getTime(); #
                #if(dueDates < toDay) {#
                    Over Due #:Math.floor((toDay - dueDates)/(1000*60*60*24))# days
                #} else {#
                    #:Math.floor((dueDates - toDay)/(1000*60*60*24))# days to pay
                #}#
            </td>   
            <td style="text-align: right;">#=kendo.toString(line[i].amount, "c2", banhji.locale)#</td>
        </tr>
    #}#
</script>
<script id="newCustomerList" type="text/x-kendo-template">
    <div class="container">
        <div class="row-fluid">
            <div id="waterreport" class="background">
                <div class="row-fluid">
                    <div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
                        <i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
                    </div>
                    <div id="example" class="k-content">
                        <div class="hidden-print pull-right" style="margin-bottom: 15px;">
                            <span class="pull-right glyphicons no-js remove_2"
                        onclick="javascript:window.history.back()"><i></i></span>
                        </div>
                        <div class="clear"></div>

                        <!-- Tabs -->
                        <div class="relativeWrap" data-toggle="source-code">
                            <div class="widget widget-tabs widget-tabs-gray report-tab">
                            
                                <!-- Tabs Heading -->
                                <div class="widget-head">
                                    <ul>
                                        <li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text: lang.lang.date">Date</span></a></li>    
                                        <li><a class="glyphicons filter" href="#tab-2" data-toggle="tab"><i></i><span data-bind="text: lang.lang.filter">Filter</span></a></li>
                                        <li><a class="glyphicons print" href="#tab-3" data-toggle="tab" data-bind="click: printGrid"><i></i><span data-bind="text: lang.lang.print_export">Print/Export</span></a></li>
                                    </ul>
                                </div>
                                <!-- // Tabs Heading END -->                                
                                <div class="widget-body">
                                    <div class="tab-content">
                                        <!-- Date -->
                                        <div class="tab-pane active" id="tab-1">
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-2">
                                                    <input data-role="dropdownlist"
                                                           class="sorter"                  
                                                           data-value-primitive="true"
                                                           data-text-field="text"
                                                           data-value-field="value"
                                                           data-bind="value: sorter,
                                                                      source: sortList,                              
                                                                      events: { change: sorterChanges }" style="width: 100%" />
                                                </div>
                                                <div class="col-xs-12 col-sm-2">
                                                    <input data-role="datepicker"
                                                           class="sdate"
                                                           data-format="dd-MM-yyyy"
                                                           data-bind="value: sdate,
                                                                      max: edate"
                                                           placeholder="From ..." style="width: 100%" >
                                                </div>
                                                <div class="col-xs-12 col-sm-2">
                                                    <input data-role="datepicker"
                                                           class="edate"
                                                           data-format="dd-MM-yyyy"
                                                           data-bind="value: edate,
                                                                      min: sdate"
                                                           placeholder="To ..." style="width: 100%" >
                                                </div>
                                                <div class="col-xs-12 col-sm-1">
                                                    <button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Filter -->
                                        <div class="tab-pane" id="tab-2">
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-3">
                                                    <span data-bind="text: lang.lang.license">Licenses</span>
                                                    <input 
                                                        data-role="dropdownlist" 
                                                        data-option-label="License ..." 
                                                        data-auto-bind="false" 
                                                        data-value-primitive="true" 
                                                        data-text-field="name" 
                                                        data-value-field="id" 
                                                        data-bind="
                                                            value: licenseSelect,
                                                                source: licenseDS,
                                                                events: {change: licenseChange}" style="width: 100%">
                                                </div>
                                                <div class="col-xs-12 col-sm-3">
                                                    <span data-bind="text: lang.lang.location">Locations</span>
                                                        <input 
                                                            data-role="dropdownlist" 
                                                            data-option-label="Location ..." 
                                                            data-auto-bind="false" 
                                                            data-value-primitive="false" 
                                                            data-text-field="name" 
                                                            data-value-field="id" 
                                                            data-bind="
                                                                value: blocSelect,
                                                                    source: blocDS" style="width: 100%">
                                                </div>
                                                <div class="col-xs-12 col-sm-3">
                                                    <span data-bind="text: lang.lang.customers"></span>
                                                    <select data-role="multiselect"
                                                           data-value-primitive="true"
                                                           data-header-template="customer-header-tmpl"
                                                           data-item-template="contact-list-tmpl"
                                                           data-value-field="id"
                                                           data-text-field="name"
                                                           data-bind="value: obj.contactIds, 
                                                                    source: contactDS"
                                                           data-placeholder="Select Customer.."
                                                           style="width: 100%" /></select>
                                                </div>
                                                <div class="col-xs-12 col-sm-1">                                            
                                                    <button style="margin-top: 20px;" type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
                                                </div>                                                      
                                            </div>      
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- // Tabs END -->

                        <div id="invFormContent">
                            <div class="block-title">
                                <h3 data-bind="text: company.name"></h3>
                                <h2 data-bind="text: lang.lang.new_customer_list">New Customer List</h2>
                                <p data-bind="text: displayDate"></p>
                            </div>
                            <table style="margin-bottom: 0;" class="table table-bordered table-condensed table-striped table-primary table-vertical-center">
                                <thead>
                                    <tr>
                                        <th style="vertical-align: top;"><span data-bind="text: lang.lang.customer_name">Customer Name</span></th>
                                        <th style="vertical-align: top;"><span data-bind="text: ">Abbr</span></th>
                                        <th style="vertical-align: top;"><span data-bind="text: lang.lang.address">Address</span></th>
                                    </tr>
                                </thead>
                                <tbody  data-role="listview"
                                        data-auto-bind="false"
                                        data-template="newCustomerList-template"
                                        data-bind="source: dataSource" >
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</script>
<script id="new_CustomerList-template" type="text/x-kendo-template">
    <tr>
        <td>#=name#</td>
        <td style="text-align: right;">#=abbr#</td>
        <td style="text-align: right;">#=address#</td>  
    </tr>
</script>
<script id="miniUsageList" type="text/x-kendo-template">
    <div class="container">
        <div class="row-fluid">
            <div id="waterreport" class="background">
                <div class="row-fluid">
                    <div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
                        <i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
                    </div>
                    <div id="example" class="k-content">
                        <div class="hidden-print pull-right" style="margin-bottom: 15px;">
                            <span class="pull-right glyphicons no-js remove_2"
                        onclick="javascript:window.history.back()"><i></i></span>
                        </div>
                        <div class="clear"></div>

                        <!-- Tabs -->
                        <div class="relativeWrap" data-toggle="source-code">
                            <div class="widget widget-tabs widget-tabs-gray report-tab">                            
                                <!-- Tabs Heading -->
                                <div class="widget-head">
                                    <ul>
                                        <li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text: lang.lang.date">Date</span></a></li>    
                                        <li><a class="glyphicons filter" href="#tab-2" data-toggle="tab"><i></i><span data-bind="text: lang.lang.filter">Filter</span></a></li>
                                        <li><a class="glyphicons print" href="#tab-3" data-toggle="tab" ><i></i><span data-bind="text: lang.lang.print_export">Print/Export</span></a></li>
                                    </ul>
                                </div>
                                <!-- // Tabs Heading END -->                                
                                <div class="widget-body">
                                    <div class="tab-content">
                                        <!-- //Date -->
                                        <div class="tab-pane active" id="tab-1">                                                
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-2">
                                                    <input data-role="dropdownlist"
                                                           class="sorter"                  
                                                           data-value-primitive="true"
                                                           data-text-field="text"
                                                           data-value-field="value"
                                                           data-bind="value: sorter,
                                                                      source: sortList,                              
                                                                      events: { change: sorterChanges }" style="width: 100%" />
                                                </div>
                                                <div class="col-xs-12 col-sm-2">  
                                                    <input data-role="datepicker"
                                                           class="sdate"
                                                           data-format="dd-MM-yyyy"
                                                           data-bind="value: sdate,
                                                                      max: edate"
                                                           placeholder="From ..." style="width: 100%" >
                                                </div>
                                                <div class="col-xs-12 col-sm-2">
                                                    <input data-role="datepicker"
                                                           class="edate"
                                                           data-format="dd-MM-yyyy"
                                                           data-bind="value: edate,
                                                                      min: sdate"
                                                           placeholder="To ..." style="width: 100%" >
                                                </div>
                                                <div class="col-xs-12 col-sm-1">
                                                    <button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Filter -->
                                        <div class="tab-pane" id="tab-2">
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-3">
                                                    <span data-bind="text: lang.lang.license">Licenses</span>
                                                    <input 
                                                        data-role="dropdownlist" 
                                                        data-option-label="License ..." 
                                                        data-auto-bind="false" 
                                                        data-value-primitive="true" 
                                                        data-text-field="name" 
                                                        data-value-field="id" 
                                                        data-bind="
                                                            value: licenseSelect,
                                                                source: licenseDS,
                                                                events: {change: licenseChange}" style="width: 100%">
                                                </div>
                                                <div class="col-xs-12 col-sm-3">
                                                    <span data-bind="text: lang.lang.location">Locations</span>
                                                        <input 
                                                            data-role="dropdownlist" 
                                                            data-option-label="Location ..." 
                                                            data-auto-bind="false" 
                                                            data-value-primitive="false" 
                                                            data-text-field="name" 
                                                            data-value-field="id" 
                                                            data-bind="
                                                                value: blocSelect,
                                                                enabled: haveBloc,
                                                                source: blocDS" style="width: 100%">
                                                </div>
                                                <div class="col-xs-12 col-sm-3">
                                                    <span data-bind="text: lang.lang.customers"></span>
                                                    <select data-role="multiselect"
                                                           data-value-primitive="true"
                                                           data-header-template="customer-header-tmpl"
                                                           data-item-template="contact-list-tmpl"
                                                           data-value-field="id"
                                                           data-text-field="name"
                                                           data-bind="value: obj.contactIds, 
                                                                    source: contactDS"
                                                           data-placeholder="Select Customer.."
                                                           style="width: 100%" /></select>
                                                </div>
                                                <div class="col-xs-12 col-sm-1">                                            
                                                    <button style="margin-top: 20px;" type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
                                                </div>                                                      
                                            </div>      
                                        </div>
                                         <!-- PRINT/EXPORT  -->
                                        <div class="tab-pane report" id="tab-3">                                            
                                            <span id="savePrint" class="btn btn-icon btn-default glyphicons print print1" data-bind="click: printGrid" ><i></i> Print</span>
                                            <span id="excel" class="btn btn-icon btn-default execl" data-bind="click: ExportExcel" >
                                                <i class="fa fa-file-excel-o"></i>
                                                Export to Excel
                                            </span>
                                        </div>  
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- // Tabs END -->

                        <div id="invFormContent">
                            <div class="block-title">
                                <h3 data-bind="text: company.name"></h3>
                                <h2 data-bind="text: lang.lang.minimum_water_usage_list">Minimum Water Usage List</h2>
                                <p data-bind="text: displayDate"></p>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-3">
                                    <div class="total-sale">
                                        <p data-bind="text: lang.lang.number_of_customer">Number of Customer</p>
                                        <span data-bind="text: dataSource.count"></span>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-9">
                                    <div class="total-sale">
                                        <p>Total Usage</p>
                                        <span data-bind="text: amount"></sapn>
                                    </div>
                                </div>
                            </div>
                            <table style="margin-bottom: 0;" class="table table-bordered table-condensed table-striped table-primary table-vertical-center">
                                <thead>
                                    <tr>
                                        <th style="vertical-align: top;"><span data-bind="text:lang.lang.meter_number">Meter Number</span></th>
                                        <th style="vertical-align: top;"><span data-bind="text:lang.lang.date">Date</span></th>
                                        <th style="text-align: right;"><span data-bind="text:lang.lang.license">License</span></th>
                                        <th style="text-align: right;"><span data-bind="text:lang.lang.address">Address</span></th>
                                        <th style="text-align: right;"><span data-bind="text:lang.lang.usage">Usage</span></th>
                                    </tr>
                                </thead>
                                <tbody  data-role="listview"
                                        data-auto-bind="false"
                                        data-template="miniUsageList-template"
                                        data-bind="source: dataSource" >
                                </tbody>
                            </table>
                        </div>
                    </span>
                </div>
            </div>
        </div>
    </div>  
</script>
<script id="miniUsageList-template" type="text/x-kendo-template">
    <tr>
        <td>#=meter_number#</td>
        <td>#=from_date# - #=to_date#</td>
        <td style="text-align: right;">#=license#</td>
        <td style="text-align: right;">#=address#</td>
        <td style="text-align: right;">#=usage#</td>
    </tr>
</script>
<script id="saleSummary" type="text/x-kendo-template">
    <div class="container">
        <div class="row-fluid">
            <div id="waterreport" class="background">
                <div class="row-fluid">
                    <div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
                        <i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
                    </div>
                    <div id="example" class="k-content">
                        <div class="hidden-print pull-right" style="margin-bottom: 15px;">
                            <span class="pull-right glyphicons no-js remove_2"
                        onclick="javascript:window.history.back()"><i></i></span>
                        </div>
                        <div class="clear"></div>

                        <!-- Tabs -->
                        <div class="relativeWrap" data-toggle="source-code">
                            <div class="widget widget-tabs widget-tabs-gray report-tab">                            
                                <!-- Tabs Heading -->
                                <div class="widget-head">
                                    <ul>
                                        <li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text: lang.lang.date">Date</span></a></li>    
                                        <li><a class="glyphicons filter" href="#tab-2" data-toggle="tab"><i></i><span data-bind="text: lang.lang.filter">Filter</span></a></li>
                                        <li><a class="glyphicons print" href="#tab-3" data-toggle="tab" ><i></i><span data-bind="text: lang.lang.print_export">Print/Export</span></a></li>
                                    </ul>
                                </div>
                                <!-- // Tabs Heading END -->                                
                                <div class="widget-body">
                                    <div class="tab-content">
                                        <!-- //Date -->
                                        <div class="tab-pane active" id="tab-1">                                                
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-2">
                                                    <input data-role="dropdownlist"
                                                           class="sorter"                  
                                                           data-value-primitive="true"
                                                           data-text-field="text"
                                                           data-value-field="value"
                                                           data-bind="value: sorter,
                                                                      source: sortList,                              
                                                                      events: { change: sorterChanges }" style="width: 100%" />
                                                </div>
                                                <div class="col-xs-12 col-sm-2">  
                                                    <input data-role="datepicker"
                                                           class="sdate"
                                                           data-format="dd-MM-yyyy"
                                                           data-bind="value: sdate,
                                                                      max: edate"
                                                           placeholder="From ..." style="width: 100%" >
                                                </div>
                                                <div class="col-xs-12 col-sm-2">
                                                    <input data-role="datepicker"
                                                           class="edate"
                                                           data-format="dd-MM-yyyy"
                                                           data-bind="value: edate,
                                                                      min: sdate"
                                                           placeholder="To ..." style="width: 100%" >
                                                </div>
                                                <div class="col-xs-12 col-sm-1">
                                                    <button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Filter -->
                                        <div class="tab-pane" id="tab-2">
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-3">
                                                    <span data-bind="text: lang.lang.license">Licenses</span>
                                                    <input 
                                                        data-role="dropdownlist" 
                                                        data-option-label="License ..." 
                                                        data-auto-bind="false" 
                                                        data-value-primitive="true" 
                                                        data-text-field="name" 
                                                        data-value-field="id" 
                                                        data-bind="
                                                            value: licenseSelect,
                                                                source: licenseDS,
                                                                events: {change: licenseChange}" style="width: 100%">
                                                </div>
                                                <div class="col-xs-12 col-sm-3">
                                                    <span data-bind="text: lang.lang.location">Locations</span>
                                                        <input 
                                                            data-role="dropdownlist" 
                                                            data-option-label="Location ..." 
                                                            data-auto-bind="false" 
                                                            data-value-primitive="false" 
                                                            data-text-field="name" 
                                                            data-value-field="id" 
                                                            data-bind="
                                                                value: blocSelect,
                                                                enabled: haveBloc,
                                                                source: blocDS" style="width: 100%">
                                                </div>
                                                <div class="col-xs-12 col-sm-3">
                                                    <span data-bind="text: lang.lang.customers"></span>
                                                    <select data-role="multiselect"
                                                           data-value-primitive="true"
                                                           data-header-template="customer-header-tmpl"
                                                           data-item-template="contact-list-tmpl"
                                                           data-value-field="id"
                                                           data-text-field="name"
                                                           data-bind="value: obj.contactIds, 
                                                                    source: contactDS"
                                                           data-placeholder="Select Customer.."
                                                           style="width: 100%" /></select>
                                                </div>
                                                <div class="col-xs-12 col-sm-1">                                            
                                                    <button style="margin-top: 20px;" type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
                                                </div>                                                      
                                            </div>      
                                        </div>
                                         <!-- PRINT/EXPORT  -->
                                        <div class="tab-pane report" id="tab-3">                                            
                                            <span id="savePrint" class="btn btn-icon btn-default glyphicons print print1" data-bind="click: printGrid" ><i></i> Print</span>
                                            <span id="excel" class="btn btn-icon btn-default execl" data-bind="click: ExportExcel" >
                                                <i class="fa fa-file-excel-o"></i>
                                                Export to Excel
                                            </span>
                                        </div>  
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- // Tabs END -->

                        <div id="invFormContent">
                            <div class="block-title">
                                <h3 data-bind="text: company.name"></h3>
                                <h2 data-bind="text: lang.lang.sale_summary_report">Sale Summary</h2>
                                <p data-bind="text: displayDate"></p>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-3">
                                    <div class="total-sale">
                                        <p data-bind="text: lang.lang.number_of_customer">Number of Customer</p>
                                        <span data-bind="text: dataSource.total"></span>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-9">
                                    <div class="total-sale">
                                        <p data-bind="text: lang.lang.total_sale">Total Sale</p>
                                        <span data-bind="text: totalAmount"></sapn>
                                    </div>
                                </div>
                            </div>
                            <table style="margin-bottom: 0;" class="table table-bordered table-condensed table-striped table-primary table-vertical-center">
                                <thead>
                                    <tr>
                                        <th style="vertical-align: top;"><span data-bind="text: lang.lang.customer">Customer</span></th>
                                        <th style="text-align: right; vertical-align: top;"><span data-bind="text: lang.lang.location">Location</span></th>
                                        <th style="text-align: right; vertical-align: top;"><span data-bind="text: lang.lang.usage">Usage</span></th>
                                        <th style="text-align: right; vertical-align: top;"><span data-bind="text: lang.lang.number_invoice">Number Invoice</span></th>
                                        <th style="text-align: right; vertical-align: top;"><span data-bind="text: lang.lang.total_sale">Total Sale</span></th>
                                    </tr>
                                </thead>
                                <tbody  data-role="listview"
                                        data-auto-bind="false"
                                        data-template="saleSummary-template"
                                        data-bind="source: dataSource" >
                                </tbody>
                            </table>
                        </div>
                    </span>
                </div>
            </div>
        </div>
    </div>  
</script>
<script id="saleSummary-template" type="text/x-kendo-template">
    <tr>
        <td>#=name#</td>
        <td style="text-align: right;">#=location#</td>
        <td style="text-align: right;">#=usage#</td>
        <td style="text-align: right;">#=invoice#</td>
        <td style="text-align: right;">#=kendo.toString(amount, banhji.locale=="km-KH"?"c0":"c", banhji.locale)#</td>
    </tr>
</script>
<script id="connectServiceRevenue" type="text/x-kendo-template">
    <div class="container">
        <div class="row-fluid">
            <div id="waterreport" class="background">
                <div class="row-fluid">
                    <div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
                        <i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
                    </div>
                    <div id="example" class="k-content">
                        <div class="hidden-print pull-right" style="margin-bottom: 15px;">
                            <span class="pull-right glyphicons no-js remove_2"
                        onclick="javascript:window.history.back()"><i></i></span>
                        </div>
                        <div class="clear"></div>

                        <!-- Tabs -->
                        <div class="relativeWrap" data-toggle="source-code">
                            <div class="widget widget-tabs widget-tabs-gray report-tab">
                            
                                <!-- Tabs Heading -->
                                <div class="widget-head">
                                    <ul>
                                        <li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text: lang.lang.date">Date</span></a></li>    
                                        <li><a class="glyphicons filter" href="#tab-2" data-toggle="tab"><i></i><span data-bind="text: lang.lang.filter">Filter</span></a></li>
                                        <li><a class="glyphicons print" href="#tab-3" data-toggle="tab"><i></i><span data-bind="text: lang.lang.print_export">Print/Export</span></a></li>
                                    </ul>
                                </div>
                                <!-- // Tabs Heading END -->                                
                                <div class="widget-body">
                                    <div class="tab-content">
                                        <!-- //Date -->
                                        <div class="tab-pane active" id="tab-1">                                                
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-2">
                                                    <input data-role="dropdownlist"
                                                           class="sorter"                  
                                                           data-value-primitive="true"
                                                           data-text-field="text"
                                                           data-value-field="value"
                                                           data-bind="value: sorter,
                                                                      source: sortList,                              
                                                                      events: { change: sorterChanges }" style="width: 100%;" />
                                                </div>
                                                <div class="col-xs-12 col-sm-2">                      
                                                    <input data-role="datepicker"
                                                           class="sdate"
                                                           data-format="dd-MM-yyyy"
                                                           data-bind="value: sdate,
                                                                      max: edate"
                                                           placeholder="From ..." style="width: 100%;" >
                                                </div>
                                                <div class="col-xs-12 col-sm-2"> 
                                                    <input data-role="datepicker"
                                                           class="edate"
                                                           data-format="dd-MM-yyyy"
                                                           data-bind="value: edate,
                                                                      min: sdate"
                                                           placeholder="To ..." style="width: 100%;" >
                                                </div>
                                                <div class="col-xs-12 col-sm-1">
                                                    <button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Filter -->
                                        <div class="tab-pane" id="tab-2">
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-3">
                                                    <span data-bind="text: lang.lang.license">Licenses</span>
                                                    <input 
                                                        data-role="dropdownlist" 
                                                        data-option-label="License ..." 
                                                        data-auto-bind="false" 
                                                        data-value-primitive="true" 
                                                        data-text-field="name" 
                                                        data-value-field="id" 
                                                        data-bind="
                                                            value: licenseSelect,
                                                                source: licenseDS,
                                                                events: {change: licenseChange}" style="width: 100%">
                                                </div>
                                                <div class="col-xs-12 col-sm-3">                                                    
                                                    <span data-bind="text: lang.lang.location">Locations</span>
                                                        <input 
                                                            data-role="dropdownlist" 
                                                            data-option-label="Location ..." 
                                                            data-auto-bind="false" 
                                                            data-value-primitive="false" 
                                                            data-text-field="name" 
                                                            data-value-field="id" 
                                                            data-bind="
                                                                value: blocSelect,
                                                                enabled: haveBloc,
                                                                source: blocDS" style="width: 100%">
                                                </div>
                                                <div class="col-xs-12 col-sm-1">                                            
                                                    <button style="margin-top: 20px;" type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
                                                </div>                                                      
                                            </div>      
                                        </div>
                                        <!-- PRINT/EXPORT  -->
                                        <div class="tab-pane report" id="tab-3">                                            
                                            <span id="savePrint" class="btn btn-icon btn-default glyphicons print print1" data-bind="click: printGrid" ><i></i> Print</span>
                                            <span id="excel" class="btn btn-icon btn-default execl" data-bind="click: ExportExcel" >
                                                <i class="fa fa-file-excel-o"></i>
                                                Export to Excel
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- // Tabs END -->                        
                    

                        <div id="invFormContent">
                            <div class="block-title">
                                <h3 data-bind="text: company.name"></h3>
                                <h2 data-bind="text: lang.lang.connection_service_revenue_report">Connect Service Revenue</h2>
                                <p data-bind="text: displayDate"></p>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-sm-3">
                                    <div class="total-sale">
                                        <p data-bind="text: lang.lang.number_of_customer">Number of Customers</p>
                                        <span data-bind="text: dataSource.total"></span>
                                    </div>

                                </div>
                                <div class="col-xs-12 col-sm-9">
                                    <div class="total-sale">
                                        <p data-bind="text: lang.lang.amount">Amount</p>
                                        <span data-bind="text: total"></sapn>
                                    </div>
                                </div>
                            </div>

                            <table style="margin-bottom: 0;" class="table table-bordered table-condensed table-striped table-primary table-vertical-center">
                                <thead>
                                    <tr>                                    
                                        <th style="vertical-align: top;"><span data-bind="text: lang.lang.type">Type</span></th>
                                        <th style="text-align: left; vertical-align: top;"><span data-bind="text: lang.lang.date">Date</span></th>
                                        <th style="text-align: left; vertical-align: top;"><span data-bind="text: lang.lang.location">Location</span></th>
                                        <th style="text-align: left; vertical-align: top;"><span data-bind="text: lang.lang.reference">Reference</span></th>
                                        <th style="vertical-align: top; text-align: right;"><span data-bind="text: lang.lang.revenue">Revenue</span></th>
                                    </tr>
                                </thead>
                                <tbody data-role="listview"
                                        data-template="connectServiceRevenue-template"
                                        data-auto-bind="false" 
                                        data-bind="source: dataSource">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</script>
<script id="connectServiceRevenue-template" type="text/x-kendo-template">
    <tr style="font-weight: bold">
        <td>#=name#</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>   
    # var amount = 0;#
    #for(var i= 0; i <line.length; i++) {#
        # amount += line[i].amount;#
        <tr>
            <td style="padding-left: 20px !important;">#=line[i].type#</td>
            <td style="text-align: left;">#=kendo.toString(new Date(line[i].date), "dd-MM-yyyy")#</td>
            <td style="text-align: left;">#=line[i].location#</td>
            <td style="text-align: left;">
                <a href="\#/#=line[i].type.toLowerCase()#/#=line[i].id#">#=line[i].number#</a>
            </td>       
            <td style="text-align: right;">#=kendo.toString(line[i].amount, banhji.locale=="km-KH"?"c0":"c", banhji.locale)#</td>
        </tr>
    #}#
    <tr>
        <td style="font-weight: bold; color: black;">Total</td>
        <td></td>
        <td></td>
        <td></td>
        <td class="right" style="font-weight: bold; border-top: 1px solid black !important; color: black;">
            #=kendo.toString(amount, banhji.locale=="km-KH"?"c0":"c", banhji.locale)#
        </td>
    </tr>
    <tr>
        <td colspan="4">&nbsp;</td>
    </tr>
</script>
<script id="saleDetail" type="text/x-kendo-template">
    <div class="container">
        <div class="row-fluid">
            <div id="waterreport" class="background">
                <div class="row-fluid">
                    <div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
                        <i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
                    </div>
                    <div id="example" class="k-content">
                        <div class="hidden-print pull-right" style="margin-bottom: 15px;">
                            <span class="pull-right glyphicons no-js remove_2"
                        onclick="javascript:window.history.back()"><i></i></span>
                        </div>
                        <div class="clear"></div>

                        <!-- Tabs -->
                        <div class="relativeWrap" data-toggle="source-code">
                            <div class="widget widget-tabs widget-tabs-gray report-tab">
                            
                                <!-- Tabs Heading -->
                                <div class="widget-head">
                                    <ul>
                                        <li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text: lang.lang.date">Date</span></a></li>    
                                        <li><a class="glyphicons filter" href="#tab-2" data-toggle="tab"><i></i><span data-bind="text: lang.lang.filter">Filter</span></a></li>
                                        <li><a class="glyphicons print" href="#tab-3" data-toggle="tab" ><i></i><span data-bind="text: lang.lang.print_export">Print/Export</span></a></li>
                                    </ul>
                                </div>
                                <!-- // Tabs Heading END -->
                                <div class="widget-body">
                                    <div class="tab-content">
                                        <!-- //Date -->
                                        <div class="tab-pane active" id="tab-1">
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-2">
                                                    <input data-role="dropdownlist"
                                                           class="sorter"
                                                           data-value-primitive="true"
                                                           data-text-field="text"
                                                           data-value-field="value"
                                                           data-bind="value: sorter,
                                                                      source: sortList,
                                                                      events: { change: sorterChanges }" style="width: 100%" />
                                                </div>
                                                <div class="col-xs-12 col-sm-2">
                                                    <input data-role="datepicker"
                                                           class="sdate"
                                                           data-format="dd-MM-yyyy"
                                                           data-bind="value: sdate,
                                                                      max: edate"
                                                           placeholder="From ..." style="width: 100%" >
                                                </div>
                                                <div class="col-xs-12 col-sm-2">
                                                    <input data-role="datepicker"
                                                           class="edate"
                                                           data-format="dd-MM-yyyy"
                                                           data-bind="value: edate,
                                                                      min: sdate"
                                                           placeholder="To ..." style="width: 100%" >
                                                </div>
                                                <div class="col-xs-12 col-sm-1">
                                                    <button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Filter -->
                                        <div class="tab-pane" id="tab-2">
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-3">
                                                    <span data-bind="text: lang.lang.license">Licenses</span>
                                                    <input 
                                                        data-role="dropdownlist" 
                                                        data-option-label="License ..." 
                                                        data-auto-bind="false" 
                                                        data-value-primitive="true" 
                                                        data-text-field="name" 
                                                        data-value-field="id" 
                                                        data-bind="
                                                            value: licenseSelect,
                                                                source: licenseDS,
                                                                events: {change: licenseChange}" style="width: 100%">
                                                </div>
                                                <div class="col-xs-12 col-sm-3">
                                                    <span data-bind="text: lang.lang.location">Locations</span>
                                                        <input 
                                                            data-role="dropdownlist" 
                                                            data-option-label="Location ..." 
                                                            data-auto-bind="false" 
                                                            data-value-primitive="false" 
                                                            data-text-field="name" 
                                                            data-value-field="id" 
                                                            data-bind="
                                                                value: blocSelect,
                                                                enabled: haveBloc,
                                                                source: blocDS" style="width: 100%">
                                                </div>
                                                <div class="col-xs-12 col-sm-1">                                            
                                                    <button style="margin-top: 20px;" type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
                                                </div>                                                      
                                            </div>      
                                        </div>
                                        <!-- PRINT/EXPORT  -->
                                        <div class="tab-pane report" id="tab-3">
                                            <span id="savePrint" class="btn btn-icon btn-default glyphicons print print1" data-bind="click: printGrid" ><i></i> Print</span>
                                            <span id="excel" class="btn btn-icon btn-default execl" data-bind="click: ExportExcel" >
                                                <i class="fa fa-file-excel-o"></i>
                                                Export to Excel
                                            </span>
                                        </div>  
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- // Tabs END -->                        
                    

                        <div id="invFormContent">
                            <div class="block-title">
                                <h3 data-bind="text: company.name"></h3>
                                <h2 data-bind="text: lang.lang.sale_detail_report">Sale Detail</h2>
                                <p data-bind="text: displayDate"></p>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-sm-3">
                                    <div class="total-sale">
                                        <p data-bind="text: lang.lang.number_of_customer">Number of Customers</p>
                                        <span data-bind="text: dataSource.total"></span>
                                    </div>

                                </div>
                                <div class="col-xs-12 col-sm-9">
                                    <div class="total-sale">
                                        <p data-bind="text: lang.lang.amount">Amount</p>
                                        <span data-bind="text: total"></sapn>
                                    </div>
                                </div>
                            </div>

                            <table style="margin-bottom: 0;" class="table table-bordered table-condensed table-striped table-primary table-vertical-center">
                                <thead>
                                    <tr>                                    
                                        <th style="vertical-align: top;"><span data-bind="text: lang.lang.type">Type</span></th>
                                        <th style="vertical-align: top;"><span data-bind="text: lang.lang.date">Date</span></th>
                                        <th style="vertical-align: top;"><span data-bind="text: lang.lang.location">Location</span></th>
                                        <th style="vertical-align: top;"><span data-bind="text: lang.lang.reference">Reference</span></th>
                                        <th style="vertical-align: top; text-align: right;"><span data-bind="text: lang.lang.usage">Usage</span></th>
                                        <th style="vertical-align: top; text-align: right;"><span data-bind="text: lang.lang.amount">Amount</span></th>
                                    </tr>
                                </thead>
                                <tbody data-role="listview"
                                        data-template="saleDetail-template"
                                        data-auto-bind="false" 
                                        data-bind="source: dataSource">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</script>
<script id="saleDetail-template" type="text/x-kendo-template">
    <tr style="font-weight: bold">
        <td>#=name#</td>
        <td></td>
        <td></td>
        <td></td>
    </tr>   
    # var amount = 0;#
    #for(var i= 0; i <line.length; i++) {#
        # amount += line[i].amount;#
        <tr>
            <td style="padding-left: 20px !important;">#=line[i].type#</td>
            <td>#=kendo.toString(new Date(line[i].date), "dd-MM-yyyy")#</td>
            <td>#=line[i].location#</td>
            <td>#=line[i].number#</td>      
            <td style="text-align: right;">#=line[i].usage#</td>    
            <td style="text-align: right;">#=kendo.toString(line[i].amount, banhji.locale=="km-KH"?"c0":"c", banhji.locale)#</td>
        </tr>
    #}#
    <tr>
        <td style="font-weight: bold; color: black;">Total</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td class="right" style="font-weight: bold; border-top: 1px solid black !important; color: black;">
            #=kendo.toString(amount, banhji.locale=="km-KH"?"c0":"c", banhji.locale)#
        </td>
    </tr>
    <tr>
        <td colspan="6">&nbsp;</td>
    </tr>
</script>
<script id="totalSale" type="text/x-kendo-template">
    <div class="container">
        <div class="row-fluid">
            <div id="waterreport" class="background">
                <div class="row-fluid">
                    <div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
                        <i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
                    </div>
                    <div id="example" class="k-content">
                        <div class="hidden-print pull-right" style="margin-bottom: 15px;">
                            <span class="pull-right glyphicons no-js remove_2"
                        data-bind="click: cancel"><i></i></span>
                        </div>
                        <div class="clear"></div>
                        <div class="relativeWrap" data-toggle="source-code">
                            <div class="widget widget-tabs widget-tabs-gray report-tab">
                                <div class="widget-head">
                                    <ul>
                                        <li class="active">
                                            <a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text: lang.lang.date">Date</span></a>
                                        </li>   
                                        <!-- <li>
                                            <a class="glyphicons filter" href="#tab-2" data-toggle="tab"><i></i><span data-bind="text: lang.lang.filter">Filter</span></a>
                                        </li> -->
                                        <li>
                                            <a class="glyphicons print" href="#tab-3" data-toggle="tab" ><i></i><span data-bind="text: lang.lang.print_export">Print/Export</span></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="widget-body">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab-1">
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-2">
                                                    <input 
                                                        data-role="dropdownlist" 
                                                        style="width: 100%;" 
                                                        data-option-label="License ..." 
                                                        data-auto-bind="false" 
                                                        data-value-primitive="true" 
                                                        data-text-field="name" 
                                                        data-value-field="id" 
                                                        data-bind="
                                                            value: licenseSelect,
                                                            source: licenseDS">
                                                </div>
                                                <div class="col-xs-12 col-sm-2">
                                                    <input type="text" 
                                                        style="width: 100%;" 
                                                        data-role="datepicker"
                                                        data-format="MM-yyyy"
                                                        data-start="year" 
                                                        data-depth="year"
                                                        placeholder="Moth of ..."
                                                        data-bind="
                                                            value: monthOfSelect" />
                                                </div>
                                                <div class="col-xs-12 col-sm-1">
                                                    <button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Filter -->
                                        <div class="tab-pane" id="tab-2">
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-3">
                                                    <span data-bind="text: lang.lang.license">Licenses</span>
                                                    <input 
                                                        data-role="dropdownlist" 
                                                        data-option-label="License ..." 
                                                        data-auto-bind="false" 
                                                        data-value-primitive="true" 
                                                        data-text-field="name" 
                                                        data-value-field="id" 
                                                        data-bind="
                                                            value: licenseSelect,
                                                                source: licenseDS,
                                                                events: {change: licenseChange}" style="width: 100%">
                                                </div>
                                                <div class="col-xs-12 col-sm-3">
                                                    <span data-bind="text: lang.lang.location">Locations</span>
                                                        <input 
                                                            data-role="dropdownlist" 
                                                            data-option-label="Location ..." 
                                                            data-auto-bind="false" 
                                                            data-value-primitive="false" 
                                                            data-text-field="name" 
                                                            data-value-field="id" 
                                                            data-bind="
                                                                value: blocSelect,
                                                                enabled: haveBloc,
                                                                source: blocDS" style="width: 100%">
                                                </div>
                                                <div class="col-xs-12 col-sm-1">                                            
                                                    <button style="margin-top: 20px;" type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
                                                </div>                                                      
                                            </div>      
                                        </div>
                                        <!-- PRINT/EXPORT  -->
                                        <div class="tab-pane report" id="tab-3">
                                            <span id="savePrint" class="btn btn-icon btn-default glyphicons print print1" data-bind="click: printGrid" ><i></i> Print</span>
                                            <span id="excel" class="btn btn-icon btn-default execl" data-bind="click: ExportExcel" >
                                                <i class="fa fa-file-excel-o"></i>
                                                Export to Excel
                                            </span>
                                        </div>  
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- // Tabs END -->                        
                    

                        <div id="invFormContent">
                            <div class="block-title">
                                <h3 data-bind="text: company.name"></h3>
                                <h2 data-bind="text: lang.lang.total_sale">Sale Detail</h2>
                                <p data-bind="text: displayDate"></p>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-sm-3">
                                    <div class="total-sale">
                                        <p data-bind="text: lang.lang.number_of_bloc">Number of Customers</p>
                                        <span data-bind="text: dataSource.total"></span>
                                    </div>

                                </div>
                                <div class="col-xs-12 col-sm-9">
                                    <div class="total-sale">
                                        <p data-bind="text: lang.lang.amount">Amount</p>
                                        <span data-bind="text: total"></sapn>
                                    </div>
                                </div>
                            </div>
                            <div style="overflow-x: scroll;">
                                <div data-role="grid" class="costom-grid"
                                     data-column-menu="true"
                                     data-reorderable="true"
                                     data-scrollable="false"
                                     data-resizable="true"
                                     data-editable="true"
                                     data-columns="[
                                        { 
                                            field: 'bloc_name',
                                            title: langVM.lang.bloc,
                                            editable: 'false', 
                                            attributes: { style: 'text-align: left;' }
                                        },
                                        { 
                                            field: 'total_customer',
                                            title: langVM.lang.customer,
                                            editable: 'false', 
                                            attributes: { style: 'text-align: center;' }
                                        },
                                        { 
                                            field: 'void_customer',
                                            title: langVM.lang.void,
                                            hidden: true,
                                            editable: 'false', 
                                            attributes: { style: 'text-align: center;' }
                                        },
                                        { 
                                            field: 'total_usage',
                                            title: langVM.lang.usage,
                                            editable: 'false', 
                                            attributes: { style: 'text-align: center;' }
                                        },
                                        { 
                                            field: 'amount_invoice',
                                            title: langVM.lang.cash,
                                            format: '{0:n}',
                                            editable: 'false', 
                                            attributes: { style: 'text-align: right;' }
                                        },
                                        { 
                                            field: 'amount_maintenance',
                                            title: langVM.lang.maintenance,
                                            editable: 'false', 
                                            format: '{0:n}',
                                            hidden: true,
                                            attributes: { style: 'text-align: right;' } 
                                        },
                                        { 
                                            field: 'amount_int',
                                            title: langVM.lang.installment,
                                            format: '{0:n}',
                                            hidden: true,
                                            editable: 'false', 
                                            attributes: { style: 'text-align: right;' }
                                        },
                                        { 
                                            field: 'amount_other_service',
                                            title: langVM.lang.other_charge,
                                            format: '{0:n}',
                                            editable: 'false', 
                                            attributes: { style: 'text-align: right;' }
                                        },
                                        { 
                                            field: 'amount_exemption',
                                            title: langVM.lang.exemption,
                                            editable: 'false',
                                            format: '{0:n}',
                                            attributes: { style: 'text-align: right;' }
                                        },
                                        { 
                                            field: 'amount_fine',
                                            title: langVM.lang.fine,
                                            format: '{0:n}',
                                            editable: 'false', 
                                            hidden: true,
                                            attributes: { style: 'text-align: right;' }
                                        },
                                        { 
                                            field: 'balance_last_month',
                                            title: langVM.lang.balance_last_month,
                                            editable: 'false', 
                                            hidden: true,
                                            format: '{0:n}',
                                            attributes: { style: 'text-align: right;' }
                                        },
                                        { 
                                            field: 'subtotal_amount',
                                            title: langVM.lang.subtotal,
                                            editable: 'false', 
                                            format: '{0:n}',
                                            attributes: { style: 'text-align: right;' }
                                        },
                                        { 
                                            field: 'amount_receive',
                                            title: langVM.lang.amount_received,
                                            format: '{0:n}',
                                            editable: 'false', 
                                            attributes: { style: 'text-align: right;' }
                                        },
                                        { 
                                            field: 'discount',
                                            title: langVM.lang.discount,
                                            hidden: true,
                                            format: '{0:n}',
                                            editable: 'false', 
                                            attributes: { style: 'text-align: right;' }
                                        },
                                        { 
                                            field: 'ending_balance',
                                            title: langVM.lang.ending_balance,
                                            format: '{0:n}',
                                            editable: 'false', 
                                            attributes: { style: 'text-align: right;' },
                                        }
                                     ]"
                                     data-auto-bind="false"
                                     data-bind="source: dataSource" >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</script>
<script id="fineCollect" type="text/x-kendo-template">
    <div class="container">
        <div class="row-fluid">
            <div id="waterreport" class="background">
                <div class="row-fluid">
                    <div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
                        <i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
                    </div>
                    <div id="example" class="k-content">
                        <div class="hidden-print pull-right" style="margin-bottom: 15px;">
                            <span class="pull-right glyphicons no-js remove_2"
                        onclick="javascript:window.history.back()"><i></i></span>
                        </div>
                        <div class="clear"></div>

                        <!-- Tabs -->
                        <div class="relativeWrap" data-toggle="source-code">
                            <div class="widget widget-tabs widget-tabs-gray report-tab">
                            
                                <!-- Tabs Heading -->
                                <div class="widget-head">
                                    <ul>
                                        <li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text: lang.lang.date">Date</span></a></li>    
                                        <li><a class="glyphicons filter" href="#tab-2" data-toggle="tab"><i></i><span data-bind="text: lang.lang.filter">Filter</span></a></li>
                                        <li><a class="glyphicons print" href="#tab-3" data-toggle="tab" ><i></i><span data-bind="text: lang.lang.print_export">Print/Export</span></a></li>
                                    </ul>
                                </div>
                                <!-- // Tabs Heading END -->
                                <div class="widget-body">
                                    <div class="tab-content">
                                        <!-- //Date -->
                                        <div class="tab-pane active" id="tab-1">
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-2">
                                                    <input data-role="dropdownlist"
                                                           class="sorter"
                                                           data-value-primitive="true"
                                                           data-text-field="text"
                                                           data-value-field="value"
                                                           data-bind="value: sorter,
                                                                      source: sortList,
                                                                      events: { change: sorterChanges }" style="width: 100%" />
                                                </div>
                                                <div class="col-xs-12 col-sm-2">
                                                    <input data-role="datepicker"
                                                           class="sdate"
                                                           data-format="dd-MM-yyyy"
                                                           data-bind="value: sdate,
                                                                      max: edate"
                                                           placeholder="From ..." style="width: 100%" >
                                                </div>
                                                <div class="col-xs-12 col-sm-2">
                                                    <input data-role="datepicker"
                                                           class="edate"
                                                           data-format="dd-MM-yyyy"
                                                           data-bind="value: edate,
                                                                      min: sdate"
                                                           placeholder="To ..." style="width: 100%" >
                                                </div>
                                                <div class="col-xs-12 col-sm-1">
                                                    <button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Filter -->
                                        <div class="tab-pane" id="tab-2">
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-3">
                                                    <span data-bind="text: lang.lang.license">Licenses</span>
                                                    <input 
                                                        data-role="dropdownlist" 
                                                        data-option-label="License ..." 
                                                        data-auto-bind="false" 
                                                        data-value-primitive="true" 
                                                        data-text-field="name" 
                                                        data-value-field="id" 
                                                        data-bind="
                                                            value: licenseSelect,
                                                                source: licenseDS,
                                                                events: {change: licenseChange}" style="width: 100%">
                                                </div>
                                                <div class="col-xs-12 col-sm-3">
                                                    <span data-bind="text: lang.lang.location">Locations</span>
                                                        <input 
                                                            data-role="dropdownlist" 
                                                            data-option-label="Location ..." 
                                                            data-auto-bind="false" 
                                                            data-value-primitive="false" 
                                                            data-text-field="name" 
                                                            data-value-field="id" 
                                                            data-bind="
                                                                value: blocSelect,
                                                                enabled: haveBloc,
                                                                source: blocDS" style="width: 100%">
                                                </div>
                                                <div class="col-xs-12 col-sm-1">                                            
                                                    <button style="margin-top: 20px;" type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
                                                </div>                                                      
                                            </div>      
                                        </div>
                                        <!-- PRINT/EXPORT  -->
                                        <div class="tab-pane report" id="tab-3">
                                            <span id="savePrint" class="btn btn-icon btn-default glyphicons print print1" data-bind="click: printGrid" ><i></i> Print</span>
                                            <span id="excel" class="btn btn-icon btn-default execl" data-bind="click: ExportExcel" >
                                                <i class="fa fa-file-excel-o"></i>
                                                Export to Excel
                                            </span>
                                        </div>  
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- // Tabs END -->                        
                    

                        <div id="invFormContent">
                            <div class="block-title">
                                <h3 data-bind="text: company.name"></h3>
                                <h2 data-bind="text: lang.lang.fine_collection_report">Fine Collection</h2>
                                <p data-bind="text: displayDate"></p>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-sm-3">
                                    <div class="total-sale">
                                        <p data-bind="text: lang.lang.number_of_customer">Number of Customers</p>
                                        <span data-bind="text: dataSource.total"></span>
                                    </div>

                                </div>
                                <div class="col-xs-12 col-sm-9">
                                    <div class="total-sale">
                                        <p data-bind="text: lang.lang.amount">Amount</p>
                                        <span data-bind="text: total"></sapn>
                                    </div>
                                </div>
                            </div>

                            <table style="margin-bottom: 0;" class="table table-bordered table-condensed table-striped table-primary table-vertical-center">
                                <thead>
                                    <tr>                                    
                                        <th style="vertical-align: top;"><span data-bind="text: lang.lang.type">Type</span></th>
                                        <th style="vertical-align: top;"><span data-bind="text: lang.lang.date">Date</span></th>
                                        <th style="vertical-align: top;"><span data-bind="text: lang.lang.location">Location</span></th>
                                        <th style="vertical-align: top;"><span data-bind="text: lang.lang.reference">Reference</span></th>
                                        <th style="vertical-align: top;"><span data-bind="text: lang.lang.amount">Amount</span></th>
                                    </tr>
                                </thead>
                                <tbody data-role="listview"
                                        data-template="fineCollect-template"
                                        data-auto-bind="false" 
                                        data-bind="source: dataSource">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</script>
<script id="fineCollect-template" type="text/x-kendo-template">
    <tr style="font-weight: bold">
        <td>#=name#</td>
        <td></td>
        <td></td>
    </tr>   
    # var amount = 0;#
    #for(var i= 0; i <line.length; i++) {#
        # amount += line[i].amount;#
        <tr>
            <td style="padding-left: 20px !important;">#=line[i].type#</td>
            <td>#=kendo.toString(new Date(line[i].date), "dd-MM-yyyy")#</td>
            <td>#=line[i].location#</td>
            <td>#=line[i].number#</td>      
            <td style="text-align: right;">#=kendo.toString(line[i].amount, banhji.locale=="km-KH"?"c0":"c", banhji.locale)#</td>
        </tr>
    #}#
    <tr>
        <td style="font-weight: bold; color: black;">Total</td>
        <td></td>
        <td></td>
        <td></td>
        <td class="right" style="font-weight: bold; border-top: 1px solid black !important; color: black;">
            #=kendo.toString(amount, banhji.locale=="km-KH"?"c0":"c", banhji.locale)#
        </td>
    </tr>
    <tr>
        <td colspan="6">&nbsp;</td>
    </tr>
</script>
<script id="discountReport" type="text/x-kendo-template">
    <div class="container">
        <div class="row-fluid">
            <div id="waterreport" class="background">
                <div class="row-fluid">
                    <div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
                        <i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
                    </div>
                    <div id="example" class="k-content">
                        <div class="hidden-print pull-right" style="margin-bottom: 15px;">
                            <span class="pull-right glyphicons no-js remove_2"
                        onclick="javascript:window.history.back()"><i></i></span>
                        </div>
                        <div class="clear"></div>

                        <!-- Tabs -->
                        <div class="relativeWrap" data-toggle="source-code">
                            <div class="widget widget-tabs widget-tabs-gray report-tab">
                            
                                <!-- Tabs Heading -->
                                <div class="widget-head">
                                    <ul>
                                        <li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text: lang.lang.date">Date</span></a></li>    
                                        <li><a class="glyphicons filter" href="#tab-2" data-toggle="tab"><i></i><span data-bind="text: lang.lang.filter">Filter</span></a></li>
                                        <li><a class="glyphicons print" href="#tab-3" data-toggle="tab" ><i></i><span data-bind="text: lang.lang.print_export">Print/Export</span></a></li>
                                    </ul>
                                </div>
                                <!-- // Tabs Heading END -->
                                <div class="widget-body">
                                    <div class="tab-content">
                                        <!-- //Date -->
                                        <div class="tab-pane active" id="tab-1">
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-2">
                                                    <input data-role="dropdownlist"
                                                           class="sorter"
                                                           data-value-primitive="true"
                                                           data-text-field="text"
                                                           data-value-field="value"
                                                           data-bind="value: sorter,
                                                                      source: sortList,
                                                                      events: { change: sorterChanges }" style="width: 100%" />
                                                </div>
                                                <div class="col-xs-12 col-sm-2">
                                                    <input data-role="datepicker"
                                                           class="sdate"
                                                           data-format="dd-MM-yyyy"
                                                           data-bind="value: sdate,
                                                                      max: edate"
                                                           placeholder="From ..." style="width: 100%" >
                                                </div>
                                                <div class="col-xs-12 col-sm-2">
                                                    <input data-role="datepicker"
                                                           class="edate"
                                                           data-format="dd-MM-yyyy"
                                                           data-bind="value: edate,
                                                                      min: sdate"
                                                           placeholder="To ..." style="width: 100%" >
                                                </div>
                                                <div class="col-xs-12 col-sm-1">
                                                    <button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Filter -->
                                        <div class="tab-pane" id="tab-2">
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-3">
                                                    <span data-bind="text: lang.lang.license">Licenses</span>
                                                    <input 
                                                        data-role="dropdownlist" 
                                                        data-option-label="License ..." 
                                                        data-auto-bind="false" 
                                                        data-value-primitive="true" 
                                                        data-text-field="name" 
                                                        data-value-field="id" 
                                                        data-bind="
                                                            value: licenseSelect,
                                                                source: licenseDS,
                                                                events: {change: licenseChange}" style="width: 100%">
                                                </div>
                                                <div class="col-xs-12 col-sm-3">
                                                    <span data-bind="text: lang.lang.location">Locations</span>
                                                        <input 
                                                            data-role="dropdownlist" 
                                                            data-option-label="Location ..." 
                                                            data-auto-bind="false" 
                                                            data-value-primitive="false" 
                                                            data-text-field="name" 
                                                            data-value-field="id" 
                                                            data-bind="
                                                                value: blocSelect,
                                                                enabled: haveBloc,
                                                                source: blocDS" style="width: 100%">
                                                </div>
                                                <div class="col-xs-12 col-sm-1">                                            
                                                    <button style="margin-top: 20px;" type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
                                                </div>                                                      
                                            </div>      
                                        </div>
                                        <!-- PRINT/EXPORT  -->
                                        <div class="tab-pane report" id="tab-3">
                                            <span id="savePrint" class="btn btn-icon btn-default glyphicons print print1" data-bind="click: printGrid" ><i></i> Print</span>
                                            <span id="excel" class="btn btn-icon btn-default execl" data-bind="click: ExportExcel" >
                                                <i class="fa fa-file-excel-o"></i>
                                                Export to Excel
                                            </span>
                                        </div>  
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- // Tabs END -->                        
                    

                        <div id="invFormContent">
                            <div class="block-title">
                                <h3 data-bind="text: company.name"></h3>
                                <h2 data-bind="text: lang.lang.discount_report">Discount Report</h2>
                                <p data-bind="text: displayDate"></p>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-sm-3">
                                    <div class="total-sale">
                                        <p data-bind="text: lang.lang.number_of_customer">Number of Customers</p>
                                        <span data-bind="text: dataSource.total"></span>
                                    </div>

                                </div>
                                <div class="col-xs-12 col-sm-9">
                                    <div class="total-sale">
                                        <p data-bind="text: lang.lang.amount">Amount</p>
                                        <span data-bind="text: total"></sapn>
                                    </div>
                                </div>
                            </div>

                            <table style="margin-bottom: 0;" class="table table-bordered table-condensed table-striped table-primary table-vertical-center">
                                <thead>
                                    <tr>                                    
                                        <th style="vertical-align: top;"><span data-bind="text: lang.lang.type">Type</span></th>
                                        <th style="vertical-align: top;"><span data-bind="text: lang.lang.date">Date</span></th>
                                        <th style="vertical-align: top;"><span data-bind="text: lang.lang.location">Location</span></th>
                                        <th style="vertical-align: top;"><span data-bind="text: lang.lang.reference">Reference</span></th>
                                        <th style="vertical-align: top;"><span data-bind="text: lang.lang.amount">Amount</span></th>
                                    </tr>
                                </thead>
                                <tbody data-role="listview"
                                        data-template="discountReport-template"
                                        data-auto-bind="false" 
                                        data-bind="source: dataSource">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</script>
<script id="discountReport-template" type="text/x-kendo-template">
    <tr style="font-weight: bold">
        <td>#=name#</td>
        <td></td>
        <td></td>
    </tr>   
    # var amount = 0;#
    #for(var i= 0; i <line.length; i++) {#
        # amount += line[i].amount;#
        <tr>
            <td style="padding-left: 20px !important;">#=line[i].type#</td>
            <td>#=kendo.toString(new Date(line[i].date), "dd-MM-yyyy")#</td>
            <td>#=line[i].location#</td>
            <td>#=line[i].number#</td>      
            <td style="text-align: right;">#=kendo.toString(line[i].amount, banhji.locale=="km-KH"?"c0":"c", banhji.locale)#</td>
        </tr>
    #}#
    <tr>
        <td style="font-weight: bold; color: black;">Total</td>
        <td></td>
        <td></td>
        <td></td>
        <td class="right" style="font-weight: bold; border-top: 1px solid black !important; color: black;">
            #=kendo.toString(amount, banhji.locale=="km-KH"?"c0":"c", banhji.locale)#
        </td>
    </tr>
    <tr>
        <td colspan="6">&nbsp;</td>
    </tr>
</script>
<script id="report-sale-detail-template" type="text/x-kendo-template">
    <tr>
        <td>#=contact_number#</td>
        <td>#=fullname#</td>
        <td>#=contact_type_name#</td>
        <td>#=location_name#</td>
        <td>#=kendo.toString(usage, "n0")#</td>
        <td>#=kendo.toString(amount, "c0", banhji.institute.locale)#</td>
    </tr>
</script>
<script id="otherRevenues" type="text/x-kendo-template">
    <div class="container">
        <div class="row-fluid">
            <div id="waterreport" class="background">
                <div class="row-fluid">
                    <div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
                        <i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
                    </div>
                    <div id="example" class="k-content">
                        <div class="hidden-print pull-right" style="margin-bottom: 15px;">
                            <span class="pull-right glyphicons no-js remove_2"
                        onclick="javascript:window.history.back()"><i></i></span>
                        </div>
                        <div class="clear"></div>

                        <!-- Tabs -->
                        <div class="relativeWrap" data-toggle="source-code">
                            <div class="widget widget-tabs widget-tabs-gray report-tab">
                            
                                <!-- Tabs Heading -->
                                <div class="widget-head">
                                    <ul>
                                        <li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text: lang.lang.date">Date</span></a></li>    
                                        <li><a class="glyphicons filter" href="#tab-2" data-toggle="tab"><i></i><span data-bind="text: lang.lang.filter">Filter</span></a></li>
                                        <li><a class="glyphicons print" href="#tab-3" data-toggle="tab" ><i></i><span data-bind="text: lang.lang.print_export">Print/Export</span></a></li>
                                    </ul>
                                </div>
                                <!-- // Tabs Heading END -->
                                <div class="widget-body">
                                    <div class="tab-content">
                                        <!-- //Date -->
                                        <div class="tab-pane active" id="tab-1">
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-2">
                                                    <input data-role="dropdownlist"
                                                           class="sorter"
                                                           data-value-primitive="true"
                                                           data-text-field="text"
                                                           data-value-field="value"
                                                           data-bind="value: sorter,
                                                                      source: sortList,
                                                                      events: { change: sorterChanges }" style="width: 100%" />
                                                </div>
                                                <div class="col-xs-12 col-sm-2">
                                                    <input data-role="datepicker"
                                                           class="sdate"
                                                           data-format="dd-MM-yyyy"
                                                           data-bind="value: sdate,
                                                                      max: edate"
                                                           placeholder="From ..." style="width: 100%" >
                                                </div>
                                                <div class="col-xs-12 col-sm-2">
                                                    <input data-role="datepicker"
                                                           class="edate"
                                                           data-format="dd-MM-yyyy"
                                                           data-bind="value: edate,
                                                                      min: sdate"
                                                           placeholder="To ..." style="width: 100%" >
                                                </div>
                                                <div class="col-xs-12 col-sm-1">
                                                    <button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Filter -->
                                        <div class="tab-pane" id="tab-2">
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-3">
                                                    <span data-bind="text: lang.lang.license">Licenses</span>
                                                    <input 
                                                        data-role="dropdownlist" 
                                                        data-option-label="License ..." 
                                                        data-auto-bind="false" 
                                                        data-value-primitive="true" 
                                                        data-text-field="name" 
                                                        data-value-field="id" 
                                                        data-bind="
                                                            value: licenseSelect,
                                                                source: licenseDS,
                                                                events: {change: licenseChange}" style="width: 100%">
                                                </div>
                                                <div class="col-xs-12 col-sm-3">
                                                    <span data-bind="text: lang.lang.location">Locations</span>
                                                        <input 
                                                            data-role="dropdownlist" 
                                                            data-option-label="Location ..." 
                                                            data-auto-bind="false" 
                                                            data-value-primitive="false" 
                                                            data-text-field="name" 
                                                            data-value-field="id" 
                                                            data-bind="
                                                                value: blocSelect,
                                                                enabled: haveBloc,
                                                                source: blocDS" style="width: 100%">
                                                </div>
                                                <div class="col-xs-12 col-sm-1">                                            
                                                    <button style="margin-top: 20px;" type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
                                                </div>                                                      
                                            </div>      
                                        </div>
                                        <!-- PRINT/EXPORT  -->
                                        <div class="tab-pane report" id="tab-3">
                                            <span id="savePrint" class="btn btn-icon btn-default glyphicons print print1" data-bind="click: printGrid" ><i></i> Print</span>
                                            <span id="excel" class="btn btn-icon btn-default execl" data-bind="click: ExportExcel" >
                                                <i class="fa fa-file-excel-o"></i>
                                                Export to Excel
                                            </span>
                                        </div>  
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- // Tabs END -->                        
                    

                        <div id="invFormContent">
                            <div class="block-title">
                                <h3 data-bind="text: company.name"></h3>
                                <h2 data-bind="text: lang.lang.fine_collection_report">Fine Collection</h2>
                                <p data-bind="text: displayDate"></p>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-sm-3">
                                    <div class="total-sale">
                                        <p data-bind="text: lang.lang.number_of_customer">Number of Customers</p>
                                        <span data-bind="text: dataSource.total"></span>
                                    </div>

                                </div>
                                <div class="col-xs-12 col-sm-9">
                                    <div class="total-sale">
                                        <p data-bind="text: lang.lang.amount">Amount</p>
                                        <span data-bind="text: total"></sapn>
                                    </div>
                                </div>
                            </div>

                            <table style="margin-bottom: 0;" class="table table-bordered table-condensed table-striped table-primary table-vertical-center">
                                <thead>
                                    <tr>                                    
                                        <th style="vertical-align: top;"><span data-bind="text: lang.lang.type">Type</span></th>
                                        <th style="vertical-align: top;"><span data-bind="text: lang.lang.date">Date</span></th>
                                        <th style="vertical-align: top;"><span data-bind="text: lang.lang.location">Location</span></th>
                                        <th style="vertical-align: top;"><span data-bind="text: lang.lang.reference">Reference</span></th>
                                        <th style="vertical-align: top;"><span data-bind="text: lang.lang.amount">Amount</span></th>
                                    </tr>
                                </thead>
                                <tbody data-role="listview"
                                        data-template="otherRevenues-template"
                                        data-auto-bind="false" 
                                        data-bind="source: dataSource">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</script>
<script id="otherRevenues-template" type="text/x-kendo-template">
    <tr style="font-weight: bold">
        <td>#=name#</td>
        <td></td>
        <td></td>
    </tr>   
    # var amount = 0;#
    #for(var i= 0; i <line.length; i++) {#
        # amount += line[i].amount;#
        <tr>
            <td style="padding-left: 20px !important;">#=line[i].type#</td>
            <td>#=kendo.toString(new Date(line[i].date), "dd-MM-yyyy")#</td>
            <td>#=line[i].location#</td>
            <td>#=line[i].number#</td>      
            <td style="text-align: right;">#=kendo.toString(line[i].amount, banhji.locale=="km-KH"?"c0":"c", banhji.locale)#</td>
        </tr>
    #}#
    <tr>
        <td style="font-weight: bold; color: black;">Total</td>
        <td></td>
        <td></td>
        <td></td>
        <td class="right" style="font-weight: bold; border-top: 1px solid black !important; color: black;">
            #=kendo.toString(amount, banhji.locale=="km-KH"?"c0":"c", banhji.locale)#
        </td>
    </tr>
    <tr>
        <td colspan="6">&nbsp;</td>
    </tr>
</script>
<script id="accountReceivableList" type="text/x-kendo-template">
    <div class="container">
        <div class="row-fluid">
            <div id="waterreport" class="background">
                <div class="row-fluid">
                    <div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
                        <i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
                    </div>
                    <div id="example" class="k-content">
                        <div class="hidden-print pull-right" style="margin-bottom: 15px;">
                            <span class="pull-right glyphicons no-js remove_2"
                        onclick="javascript:window.history.back()"><i></i></span>
                        </div>
                        <div class="clear"></div>
                        <!-- Tabs -->
                        <div class="relativeWrap" data-toggle="source-code">
                            <div class="widget widget-tabs widget-tabs-gray report-tab">
                            
                                <!-- Tabs Heading -->
                                <div class="widget-head">
                                    <ul>
                                        <li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text: lang.lang.date">Date</span></a></li>    
                                        <li><a class="glyphicons filter" href="#tab-2" data-toggle="tab"><i></i><span data-bind="text: lang.lang.filter">Filter</span></a></li>
                                        <li><a class="glyphicons print" href="#tab-3" data-toggle="tab"><i></i><span data-bind="text: lang.lang.print_export">Print/Export</span></a></li>
                                    </ul>
                                </div>
                                <!-- // Tabs Heading END -->                                
                                <div class="widget-body">
                                    <div class="tab-content">

                                        <!-- //Date -->
                                        <div class="tab-pane active" id="tab-1">
                                            <span data-bind="text: lang.lang.as_of"></span>:
                                            <input data-role="datepicker"
                                                    data-format="dd-MM-yyyy"
                                                    data-parse-formats="yyyy-MM-dd" 
                                                    data-bind="value: as_of" />

                                            <button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
                            
                                        </div>
                                        <!-- Filter -->
                                        <div class="tab-pane" id="tab-2">
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-2" style="padding-left: 15px;">
                                                    <span data-bind="text: lang.lang.license">Licenses</span>
                                                    <input 
                                                        data-role="dropdownlist" 
                                                        data-option-label="License ..." 
                                                        data-auto-bind="false" 
                                                        data-value-primitive="true" 
                                                        data-text-field="name" 
                                                        data-value-field="id" 
                                                        data-bind="
                                                            value: licenseSelect,
                                                                source: licenseDS,
                                                                events: {change: licenseChange}" style="width: 100%">
                                                </div>
                                                <div class="col-xs-12 col-sm-2">                                                    
                                                    <span data-bind="text: lang.lang.location">Locations</span>
                                                        <input 
                                                            data-role="dropdownlist" 
                                                            data-option-label="Location ..." 
                                                            data-auto-bind="false" 
                                                            data-value-primitive="false" 
                                                            data-text-field="name" 
                                                            data-value-field="id" 
                                                            data-bind="
                                                                value: blocSelect,
                                                                enabled: haveBloc,
                                                                source: blocDS" style="width: 100%">
                                                </div>
                                                <div class="col-xs-12 col-sm-2">
                                                    <span data-bind="text: lang.lang.customers"></span>
                                                    <select data-role="multiselect"
                                                           data-value-primitive="true"
                                                           data-header-template="customer-header-tmpl"
                                                           data-item-template="contact-list-tmpl"
                                                           data-value-field="id"
                                                           data-text-field="name"
                                                           data-bind="value: obj.contactIds, 
                                                                    source: contactDS"
                                                           data-placeholder="Select Customer.."
                                                           style="width: 100%" /></select>
                                                </div>
                                                <div class="col-xs-12 col-sm-1">                                            
                                                    <button style="margin-top: 20px;" type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
                                                </div>                                                      
                                            </div>      
                                        </div>
                                                                                <!-- PRINT/EXPORT  -->
                                        <div class="tab-pane report" id="tab-3">                                            
                                            <span id="savePrint" class="btn btn-icon btn-default glyphicons print print1" data-bind="click: printGrid" ><i></i> Print</span>
                                            <span id="excel" class="btn btn-icon btn-default execl" data-bind="click: ExportExcel" >
                                                <i class="fa fa-file-excel-o"></i>
                                                Export to Excel
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- // Tabs END -->
                        <div id="invFormContent">
                            <div class="block-title">
                                <h3 data-bind="text: company.name"></h3>
                                <h2 data-bind="text: lang.lang.accounts_receivable_listing">List Of Invoice To Be Collected</h2>
                                <p data-bind="text: displayDate"></p>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-sm-3">
                                    <div class="total-sale">                                    
                                        <p data-bind="text: lang.lang.number_of_customer">Number of Customer</p>
                                        <span data-format="n0" data-bind="text: dataSource.total"></span>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-9">
                                    <div class="total-sale">
                                        <p data-bind="text: lang.lang.total_amount">Total Amount</p>
                                        <span data-bind="text: totalAmount"></span>
                                    </div>
                                </div>
                            </div>

                            <table style="margin-bottom: 0;" class="table table-bordered table-condensed table-striped table-primary table-vertical-center">
                                <thead>
                                    <tr>
                                        <th style="vertical-align: top;"><span data-bind="text: lang.lang.type">Type</span></th>
                                        <th style="vertical-align: top;"><span data-bind="text: lang.lang.date">Date</span></th>
                                        <th style="vertical-align: top;"><span data-bind="text: lang.lang.name">Name</span></th>
                                        <th style="vertical-align: top;"><span data-bind="text: lang.lang.reference">Reference</span></th>
                                        <th style="vertical-align: top;"><span data-bind="text: lang.lang.location">Location</span></th>
                                        <th style="vertical-align: top; text-align: center;"><span data-bind="text: lang.lang.status">Status</span></th>    
                                        <th style="vertical-align: top; text-align: right;" ><span data-bind="text: lang.lang.amount">Amount</span></th>
                                    </tr>
                                </thead>
                                <tbody data-role="listview"
                                        data-auto-bind="false"
                                        data-bind="source: dataSource"
                                        data-template="accountReceivableList-template"
                                ></tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</script>
<script id="accountReceivableList-template" type="text/x-kendo-template">
    <tr>
        <td>
            <a href="\#/#=type.toLowerCase()#/#=id#">#=type#</a>
        </td>
        <td>#=kendo.toString(new Date(issued_date),"dd-MM-yyyy")#</td>
        <td>#=name#</td>
        <td>
            <a href="\#/#=type.toLowerCase()#/#=id#">#=number#</a>
        </td>
        <td>#=location#</td>
        <td style="text-align: center;">
            # var date = new Date(), dueDates = new Date(due_date).getTime(), toDay = new Date(date).getTime(); #
            #if(dueDates < toDay) {#
                Over Due #:Math.floor((toDay - dueDates)/(1000*60*60*24))# days
            #} else {#
                #:Math.floor((dueDates - toDay)/(1000*60*60*24))# days to pay
            #}#
        </td>
        <td style="text-align: right;">#=kendo.toString(amount, banhji.locale=="km-KH"?"c0":"c", banhji.locale)#</td>
    </tr>
</script>
<script id="agingSummary" type="text/x-kendo-template">
    <div class="container">
        <div class="row-fluid">
            <div id="waterreport" class="background">
                <div class="row-fluid">
                    <div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
                        <i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
                    </div>
                    <div id="example" class="k-content">
                        <div class="hidden-print pull-right" style="margin-bottom: 15px;">
                            <span class="pull-right glyphicons no-js remove_2"
                        onclick="javascript:window.history.back()"><i></i></span>
                        </div>
                        <div class="clear"></div>

                        <!-- Tabs -->
                        <div class="relativeWrap" data-toggle="source-code">
                            <div class="widget widget-tabs widget-tabs-gray report-tab">
                            
                                <!-- Tabs Heading -->
                                <div class="widget-head">
                                    <ul>
                                        <li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text: lang.lang.date">Date</span></a></li>    
                                        <li><a class="glyphicons filter" href="#tab-2" data-toggle="tab"><i></i><span data-bind="text: lang.lang.filter">Filter</span></a></li>
                                        <li><a class="glyphicons print" href="#tab-3" data-toggle="tab"><i></i><span data-bind="text: lang.lang.print_export">Print/Export</span></a></li>
                                    </ul>
                                </div>
                                <!-- // Tabs Heading END -->                                
                                <div class="widget-body">
                                    <div class="tab-content">

                                        <!-- //Date -->
                                        <div class="tab-pane active" id="tab-1">
                                            <span data-bind="text: lang.lang.as_of"></span>:
                                            <input data-role="datepicker"
                                                    data-format="dd-MM-yyyy"
                                                    data-parse-formats="yyyy-MM-dd" 
                                                    data-bind="value: as_of" />

                                            <button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
                            
                                        </div>
                                        <!-- Filter -->
                                        <div class="tab-pane" id="tab-2">
                                            <div class="row">
                                                <div class="xol-xs-12 col-sm-3">
                                                    <span data-bind="text: lang.lang.license">Licenses</span>
                                                    <input 
                                                        data-role="dropdownlist" 
                                                        data-option-label="License ..." 
                                                        data-auto-bind="false" 
                                                        data-value-primitive="true" 
                                                        data-text-field="name" 
                                                        data-value-field="id" 
                                                        data-bind="
                                                            value: licenseSelect,
                                                                source: licenseDS,
                                                                events: {change: licenseChange}" style="width: 100%">
                                                </div>
                                                <div class="xol-xs-12 col-sm-3">
                                                    <span data-bind="text: lang.lang.location">Locations</span>
                                                        <input 
                                                            data-role="dropdownlist" 
                                                            data-option-label="Location ..." 
                                                            data-auto-bind="false" 
                                                            data-value-primitive="false" 
                                                            data-text-field="name" 
                                                            data-value-field="id" 
                                                            data-bind="
                                                                value: blocSelect,
                                                                enabled: haveBloc,
                                                                source: blocDS" style="width: 100%">
                                                </div>
                                                <div class="xol-xs-12 col-sm-3">
                                                    <span data-bind="text: lang.lang.customers"></span>
                                                    <select data-role="multiselect"
                                                           data-value-primitive="true"
                                                           data-header-template="customer-header-tmpl"
                                                           data-item-template="contact-list-tmpl"
                                                           data-value-field="id"
                                                           data-text-field="name"
                                                           data-bind="value: obj.contactIds, 
                                                                    source: contactDS"
                                                           data-placeholder="Select Customer.."
                                                           style="width: 100%" /></select>
                                                </div>
                                                <div class="xol-xs-12 col-sm-1">                                            
                                                    <button style="margin-top: 20px;" type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
                                                </div>                                                      
                                            </div>      
                                        </div>
                                        <!-- PRINT/EXPORT  -->
                                        <div class="tab-pane report" id="tab-3">                                            
                                            <span id="savePrint" class="btn btn-icon btn-default glyphicons print print1" data-bind="click: printGrid" ><i></i> Print</span>
                                            <span id="excel" class="btn btn-icon btn-default execl" data-bind="click: ExportExcel" >
                                                <i class="fa fa-file-excel-o"></i>
                                                Export to Excel
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- // Tabs END -->                        
                    
                        <div id="invFormContent">
                            <div class="block-title">
                                <h3 data-bind="text: company.name"></h3>
                                <h2 data-bind="text: lang.lang.receivable_aging_summary">Receivable Aging Summary</h2>
                                <p data-bind="text: displayDate"></p>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-sm-3">
                                    <div class="total-sale">                                    
                                        <p data-bind="text: lang.lang.number_of_customer">Number of Customer</p>
                                        <span data-format="n0" data-bind="text: dataSource.total"></span>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-9">
                                    <div class="total-sale">
                                        <p data-bind="text: lang.lang.total_customer_balance">Total Customer Balance</p>
                                        <span data-bind="text: totalBalance"></span>
                                    </div>
                                </div>
                            </div>

                            <table style="margin-bottom: 0;" class="table table-bordered table-condensed table-striped table-primary table-vertical-center">
                                <thead>
                                    <tr>
                                        <th style="vertical-align: top;"><span data-bind="text: lang.lang.name">Name</span></th>
                                        <th style="text-align: right; vertical-align: top;"><span data-bind="text: lang.lang.current">CURRENT</span></th>
                                        <th style="text-align: right; vertical-align: top;"><span>1-30</span></th>
                                        <th style="text-align: right; vertical-align: top;"><span>31-60</span></th>
                                        <th style="text-align: right; vertical-align: top;"><span>61-90</span></th>
                                        <th style="text-align: right; vertical-align: top;"><span data-bind="text: lang.lang.over_90"></span></th>
                                        <th style="text-align: right; vertical-align: top;"><span data-bind="text: lang.lang.total">TOTAL</span></th>                           
                                    </tr>
                                </thead>
                                <tbody data-role="listview"
                                        data-auto-bind="false"
                                        data-bind="source: dataSource"
                                        data-template="agingSummary-template"
                                ></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</script>
<script id="agingSummary-template" type="text/x-kendo-template" >
    <tr>
        <td>#=name#</td>
        <td style="text-align: right;">#=kendo.toString(current, banhji.locale=="km-KH"?"c0":"c", banhji.locale)#</td>
        <td style="text-align: right;">#=kendo.toString(in30, banhji.locale=="km-KH"?"c0":"c", banhji.locale)#</td>
        <td style="text-align: right;">#=kendo.toString(in60, banhji.locale=="km-KH"?"c0":"c", banhji.locale)#</td>
        <td style="text-align: right;">#=kendo.toString(in90, banhji.locale=="km-KH"?"c0":"c", banhji.locale)#</td>
        <td style="text-align: right;">#=kendo.toString(over90, banhji.locale=="km-KH"?"c0":"c", banhji.locale)#</td>
        <td style="text-align: right;">#=kendo.toString(total, banhji.locale=="km-KH"?"c0":"c", banhji.locale)#</td>
    </tr>
</script>
<script id="customerDepositReport" type="text/x-kendo-template">
    <div class="container">
        <div class="row-fluid">
            <div id="waterreport" class="background">
                <div class="row-fluid">
                    <div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
                        <i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
                    </div>
                    <div id="example" class="k-content">
                        <div class="hidden-print pull-right" style="margin-bottom: 15px;">
                            <span class="pull-right glyphicons no-js remove_2"
                        onclick="javascript:window.history.back()"><i></i></span>
                        </div>
                        <div class="clear"></div>

                        <!-- Tabs -->
                        <div class="relativeWrap" data-toggle="source-code">
                            <div class="widget widget-tabs widget-tabs-gray report-tab">
                            
                                <!-- Tabs Heading -->
                                <div class="widget-head">
                                    <ul>
                                        <li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text: lang.lang.date">Date</span></a></li>    
                                        <li><a class="glyphicons filter" href="#tab-2" data-toggle="tab"><i></i><span data-bind="text: lang.lang.filter">Filter</span></a></li>
                                        <li><a class="glyphicons print" href="#tab-3" data-toggle="tab"><i></i><span data-bind="text: lang.lang.print_export">Print/Export</span></a></li>
                                    </ul>
                                </div>
                                <!-- // Tabs Heading END -->                                
                                <div class="widget-body">
                                    <div class="tab-content">
                                        <!-- Date -->
                                        <div class="tab-pane active" id="tab-1">
                                            <div class="row">                                               
                                                <div class="col-xs-12 col-sm-2">
                                                    <input data-role="dropdownlist"
                                                           class="sorter"                  
                                                           data-value-primitive="true"
                                                           data-text-field="text"
                                                           data-value-field="value"
                                                           data-bind="value: sorter,
                                                                      source: sortList,
                                                                      events: { change: sorterChanges }" style="width: 100%" />
                                                </div>
                                                <div class="col-xs-12 col-sm-2">
                                                    <input data-role="datepicker"
                                                           class="sdate"
                                                           data-format="dd-MM-yyyy"
                                                           data-bind="value: sdate,
                                                                      max: edate"
                                                           placeholder="From ..." style="width: 100%">
                                                </div>
                                                <div class="col-xs-12 col-sm-2">
                                                    <input data-role="datepicker"
                                                           class="edate"
                                                           data-format="dd-MM-yyyy"
                                                           data-bind="value: edate,
                                                                      min: sdate"
                                                           placeholder="To ..." style="width: 100%">
                                                </div>
                                                <div class="col-xs-12 col-sm-1">
                                                    <button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Filter -->
                                        <div class="tab-pane" id="tab-2">
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-2">
                                                    <span data-bind="text: lang.lang.license">Licenses</span>
                                                    <input 
                                                        data-role="dropdownlist" 
                                                        data-option-label="License ..." 
                                                        data-auto-bind="false" 
                                                        data-value-primitive="true" 
                                                        data-text-field="name" 
                                                        data-value-field="id" 
                                                        data-bind="
                                                            value: licenseSelect,
                                                                source: licenseDS,
                                                                events: {change: licenseChange}" style="width: 100%">
                                                </div>
                                                <div class="col-xs-12 col-sm-2">
                                                    <span data-bind="text: lang.lang.location">Locations</span>
                                                        <input 
                                                            data-role="dropdownlist" 
                                                            data-option-label="Location ..." 
                                                            data-auto-bind="false" 
                                                            data-value-primitive="false" 
                                                            data-text-field="name" 
                                                            data-value-field="id" 
                                                            data-bind="
                                                                value: blocSelect,
                                                                enabled: haveBloc,
                                                                source: blocDS" style="width: 100%">
                                                </div>
                                                <div class="col-xs-12 col-sm-2">
                                                    <span data-bind="text: lang.lang.customers"></span>
                                                    <select data-role="multiselect"
                                                           data-value-primitive="true"
                                                           data-header-template="customer-header-tmpl"
                                                           data-item-template="contact-list-tmpl"
                                                           data-value-field="id"
                                                           data-text-field="name"
                                                           data-bind="value: obj.contactIds, 
                                                                    source: contactDS"
                                                           data-placeholder="Select Customer.."
                                                           style="width: 100%" /></select>
                                                </div>
                                                <div class="col-xs-12 col-sm-1">                                            
                                                    <button style="margin-top: 20px;" type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
                                                </div>                                                      
                                            </div>      
                                        </div>
                                        <div class="tab-pane report" id="tab-3">                                            
                                            <span id="savePrint" class="btn btn-icon btn-default glyphicons print print1" data-bind="click: printGrid" ><i></i> Print</span>
                                            <span id="excel" class="btn btn-icon btn-default execl" data-bind="click: ExportExcel" >
                                                <i class="fa fa-file-excel-o"></i>
                                                Export to Excel
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- // Tabs END -->                        
                    

                        <div id="invFormContent">
                            <div class="block-title">
                                <h3 data-bind="text: company.name"></h3>
                                <h2 data-bind="text: lang.lang.customer_deposit_detail">Customer Deposit Detail</h2>
                                <p data-bind="text: displayDate"></p>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-sm-5">
                                    <div class="total-sale">
                                        <p data-bind="text: lang.lang.number_of_customer">Number of Customer</p>
                                        <span data-bind="text: dataSource.total"></span>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-7">
                                    <div class="total-sale">
                                        <p data-bind="text: lang.lang.deposit_balance">Deposit Balance</p>
                                        <span data-bind="text: totalAmount"></span>
                                    </div>
                                </div>
                            </div>

                            <table style="margin-bottom: 0;" class="table table-bordered table-condensed table-striped table-primary table-vertical-center">
                                <thead>
                                    <tr>
                                        <th style="vertical-align: top;"><span data-bind="text: lang.lang.type">Type</span></th>
                                        <th style="vertical-align: top;"><span data-bind="text: lang.lang.date">Date</span></th>
                                        <th style="vertical-align: top;"><span data-bind="text: lang.lang.number">Number</span></th>
                                        <th style="vertical-align: top;"><span data-bind="text: lang.lang.reference">Reference</span></th>
                                        <th style="vertical-align: top;"><span data-bind="text: lang.lang.location">Location</span></th>
                                        <th style="vertical-align: top; text-align: right;"><span data-bind="text: lang.lang.amount">Amount</span></th>
                                        <th style="vertical-align: top; text-align: right;"><span data-bind="text: lang.lang.balance">Balance</span></th>
                                    </tr>
                                </thead>
                                <tbody data-role="listview"
                                         data-bind="source: dataSource"
                                         data-auto-bind="false"
                                         data-template="customerDepositReport-template"
                                ></tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</script>
<script id="customerDepositReport-template" type="text/x-kendo-tmpl">
    <tr>
        <td colspan="6" style="font-weight: bold;">#: name #</td>
        <td class="right strong" style="color: black;">
            #=kendo.toString(balance_forward)#
        </td>
    </tr>
    #var balance = balance_forward;#
    #for(var i=0; i<line.length; i++){#
        #balance += line[i].amount;#
        <tr>
            <td style="padding-left: 20px !important; color: black;">
                <a href="\#/#=line[i].type.toLowerCase()#/#=line[i].id#"><i></i> #=line[i].type#</a>
            </td>       
            <td style="color: black;">
                #=kendo.toString(new Date(line[i].issued_date), "dd-MM-yyyy")#
            </td>
            <td style="color: black;">
                <a href="\#/#=line[i].type.toLowerCase()#/#=line[i].id#"><i></i> #=line[i].number#</a>
            </td>
            <td style="color: black;">
                #if(line[i].reference.length>0){#
                    <a href="\#/#=line[i].reference[0].type.toLowerCase()#/#=line[i].reference[0].id#"><i></i> #=line[i].reference[0].number#</a>
                #}#
            </td>
            <td>#=line[i].location#</td>
            <td align="right" style="color: black;">
                #=kendo.toString(line[i].amount, banhji.locale=="km-KH"?"c0":"c", banhji.locale)#
            </td>
            <td class="right" style="color: black;">
                #=kendo.toString(balance, banhji.locale=="km-KH"?"c0":"c", banhji.locale)#
            </td>           
        </tr>    
    #}# 
    <tr>
        <td colspan="6" style="font-weight: bold; color: black;">Total #: name #</td>
        <td class="right" style="font-weight: bold; border-top: 1px solid black !important; color: black;">
            #=kendo.toString(balance, banhji.locale=="km-KH"?"c0":"c", banhji.locale)#
        </td>
    </tr>
    <tr>
        <td colspan="7">&nbsp;</td>
    </tr>  
</script>
<script id="agingDetail" type="text/x-kendo-template">
    <div class="container">
        <div class="row-fluid">
            <div id="waterreport" class="background">
                <div class="row-fluid">
                    <div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
                        <i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
                    </div>
                    <div id="example" class="k-content">
                        <div class="hidden-print pull-right" style="margin-bottom: 15px;">
                            <span class="pull-right glyphicons no-js remove_2"
                        onclick="javascript:window.history.back()"><i></i></span>
                        </div>
                        <div class="clear"></div>

                        <!-- Tabs -->
                        <div class="relativeWrap" data-toggle="source-code">
                            <div class="widget widget-tabs widget-tabs-gray report-tab">
                            
                                <!-- Tabs Heading -->
                                <div class="widget-head">
                                    <ul>
                                        <li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text: lang.lang.date">Date</span></a></li>    
                                        <li><a class="glyphicons filter" href="#tab-2" data-toggle="tab"><i></i><span data-bind="text: lang.lang.filter">Filter</span></a></li>
                                        <li><a class="glyphicons print" href="#tab-3" data-toggle="tab"><i></i><span data-bind="text: lang.lang.print_export">Print/Export</span></a></li>
                                    </ul>
                                </div>
                                <!-- // Tabs Heading END -->                                
                                <div class="widget-body">
                                    <div class="tab-content">

                                        <!-- //Date -->
                                        <div class="tab-pane active" id="tab-1">
                                            <span data-bind="text: lang.lang.as_of"></span>:
                                            <input data-role="datepicker"
                                                    data-format="dd-MM-yyyy"
                                                    data-parse-formats="yyyy-MM-dd" 
                                                    data-bind="value: as_of" />

                                            <button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
                            
                                        </div>
                                        <!-- Filter -->
                                        <div class="tab-pane" id="tab-2">
                                            <div class="row">
                                                <div class="xol-xs-12 col-sm-3">
                                                    <span data-bind="text: lang.lang.license">Licenses</span>
                                                    <input 
                                                        data-role="dropdownlist" 
                                                        data-option-label="License ..." 
                                                        data-auto-bind="false" 
                                                        data-value-primitive="true" 
                                                        data-text-field="name" 
                                                        data-value-field="id" 
                                                        data-bind="
                                                            value: licenseSelect,
                                                                source: licenseDS,
                                                                events: {change: licenseChange}" style="width: 100%">
                                                </div>
                                                <div class="xol-xs-12 col-sm-3">
                                                    <span data-bind="text: lang.lang.location">Locations</span>
                                                        <input 
                                                            data-role="dropdownlist" 
                                                            data-option-label="Location ..." 
                                                            data-auto-bind="false" 
                                                            data-value-primitive="false" 
                                                            data-text-field="name" 
                                                            data-value-field="id" 
                                                            data-bind="
                                                                value: blocSelect,
                                                                enabled: haveBloc,
                                                                source: blocDS" style="width: 100%">
                                                </div>
                                                <div class="xol-xs-12 col-sm-3">
                                                    <span data-bind="text: lang.lang.customers"></span>
                                                    <select data-role="multiselect"
                                                           data-value-primitive="true"
                                                           data-header-template="customer-header-tmpl"
                                                           data-item-template="contact-list-tmpl"
                                                           data-value-field="id"
                                                           data-text-field="name"
                                                           data-bind="value: obj.contactIds, 
                                                                    source: contactDS"
                                                           data-placeholder="Select Customer.."
                                                           style="width: 100%" /></select>
                                                </div>
                                                <div class="xol-xs-12 col-sm-1">                                            
                                                    <button style="margin-top: 20px;" type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
                                                </div>                                                      
                                            </div>      
                                        </div>
                                        <!-- PRINT/EXPORT  -->
                                        <div class="tab-pane report" id="tab-3">                                            
                                            <span id="savePrint" class="btn btn-icon btn-default glyphicons print print1" data-bind="click: printGrid" ><i></i> Print</span>
                                            <span id="excel" class="btn btn-icon btn-default execl" data-bind="click: ExportExcel" >
                                                <i class="fa fa-file-excel-o"></i>
                                                Export to Excel
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- // Tabs END -->                        
                    
                        <div id="invFormContent">
                            <div class="block-title">
                                <h3 data-bind="text: company.name"></h3>
                                <h2 data-bind="text: lang.lang.customer_aging_detail_list">Receivable Aging Summary</h2>
                                <p data-bind="text: displayDate"></p>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-sm-3">
                                    <div class="total-sale">                                    
                                        <p data-bind="text: lang.lang.number_of_customer">Number of Customer</p>
                                        <span data-format="n0" data-bind="text: dataSource.total"></span>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-9">
                                    <div class="total-sale">
                                        <p data-bind="text: lang.lang.total_customer_balance">Total Customer Balance</p>
                                        <span data-bind="text: totalBalance"></span>
                                    </div>
                                </div>
                            </div>

                            <table style="margin-bottom: 0;" class="table table-bordered table-condensed table-striped table-primary table-vertical-center">
                                <thead>
                                    <tr>
                                        <th><span data-bind="text: lang.lang.type">Type</span></th>
                                        <th><span data-bind="text: lang.lang.invoice_date">Invoice Date</span></th>
                                        <th><span data-bind="text: lang.lang.due_date">Due Date</span></th>
                                        <th><span data-bind="text: lang.lang.reference">Reference</span></th>
                                        <th><span data-bind="text: lang.lang.location">Location</span></th>
                                        <th style="text-align: center;"><span data-bind="text: lang.lang.status">Status</span></th>
                                        <th style="text-align: right;"><span data-bind="text: lang.lang.amount">Amount</span></th>
                                        <th style="text-align: right;"><span data-bind="text: lang.lang.balance">Balance</span></th>
                                    </tr>
                                </thead>
                                <tbody data-role="listview"
                                 data-auto-bind="false"
                                 data-bind="source: dataSource"
                                 data-template="agingDetail-template"
                            ></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</script>
<script id="agingDetail-template" type="text/x-kendo-tmpl">
    <tr>
        <td colspan="8" style="font-weight: bold; color: black;">#: name #</td>
    </tr>
    #var totalBalance = 0;#
    #for(var i=0; i<line.length; i++){#
    #totalBalance += line[i].amount;#
    <tr>
        <td style="padding-left: 20px !important;">
            <a href="\#/#=line[i].type.toLowerCase()#/#=line[i].id#"><i></i> #=line[i].type#</a>
        </td>
        <td>#=kendo.toString(new Date(line[i].issued_date), "dd-MM-yyyy")#</td>
        <td>#=kendo.toString(new Date(line[i].due_date), "dd-MM-yyyy")#</td>
        <td><a href="\#/#=line[i].type.toLowerCase()#/#=line[i].id#"><i></i> #=line[i].number#</a></td>     
        <td>#=line[i].location#</td>
        <td style="text-align: center;"> 
            #if(line[i].type==="Cash_Receipt"){#
                PMT
            #}else if(line[i].type==="Sale_Return"){#
                Returned
            #}else{#
                #if(line[i].status==="0" || line[i].status==="2") {#
                    # var date = new Date(), dueDates = new Date(line[i].due_date).getTime(), toDay = new Date(date).getTime(); #
                    #if(dueDates < toDay) {#
                        Over Due #:Math.floor((toDay - dueDates)/(1000*60*60*24))# days
                    #} else {#
                        #:Math.floor((dueDates - toDay)/(1000*60*60*24))# days to pay
                    #}#
                #}else{#
                    Paid
                #}#
            #}#
        </td>
        <td style="text-align: right;">
            #=kendo.toString(line[i].amount, banhji.locale=="km-KH"?"c0":"c", banhji.locale)#
        </td>
        <td style="text-align: right;">
            #=kendo.toString(totalBalance, banhji.locale=="km-KH"?"c0":"c", banhji.locale)#
        </td>
    </tr>
    #}#
    <tr>
        <td colspan="7" style="font-weight: bold; color: black;">Total</td>
        <td class="right" style="font-weight: bold; border-top: 1px solid black !important; color: black;">
            #=kendo.toString(totalBalance, banhji.locale=="km-KH"?"c0":"c", banhji.locale)#
        </td>
    </tr>
    <tr>
        <td colspan="7">&nbsp;</td>
    </tr>  
</script>
<script id="customerBalanceSummary" type="text/x-kendo-template">
    <div class="container">
        <div class="row-fluid">
            <div id="waterreport" class="background">
                <div class="row-fluid">
                    <div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
                        <i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
                    </div>
                    <div id="example" class="k-content">
                        <div class="hidden-print pull-right" style="margin-bottom: 15px;">
                            <span class="pull-right glyphicons no-js remove_2"
                        onclick="javascript:window.history.back()"><i></i></span>
                        </div>
                        <div class="clear"></div>

                        <!-- Tabs -->
                        <div class="relativeWrap" data-toggle="source-code">
                            <div class="widget widget-tabs widget-tabs-gray report-tab">
                            
                                <!-- Tabs Heading -->
                                <div class="widget-head">
                                    <ul>
                                        <li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text: lang.lang.date"></span></a></li>    
                                        <li><a class="glyphicons print" href="#tab-3" data-toggle="tab"><i></i><span data-bind="text: lang.lang.print_export"></span></a></li>
                                    </ul>
                                </div>
                                <!-- // Tabs Heading END -->                                
                                <div class="widget-body">
                                    <div class="tab-content">
                                        <!-- //Date -->
                                        <div class="tab-pane active" id="tab-1">
                                            <span data-bind="text: lang.lang.as_of"></span>:
                                            <input data-role="datepicker"
                                                    data-format="dd-MM-yyyy"
                                                    data-parse-formats="yyyy-MM-dd" 
                                                    data-bind="value: as_of" />

                                            <button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
                            
                                        </div>
                                        <div class="tab-pane report" id="tab-3">                                            
                                            <span id="savePrint" class="btn btn-icon btn-default glyphicons print print1" data-bind="click: printGrid" ><i></i> Print</span>
                                            <span id="excel" class="btn btn-icon btn-default execl" data-bind="click: ExportExcel" >
                                                <i class="fa fa-file-excel-o"></i>
                                                Export to Excel
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- // Tabs END -->                        
                    
                        <div id="invFormContent">
                            <div class="block-title">
                                <h3 data-bind="text: company.name"></h3>
                                <h2 data-bind="text: lang.lang.customer_balance_summary"></h2>
                                <p data-bind="text: displayDate"></p>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-sm-5">
                                    <div class="total-sale">    
                                        <p data-bind="text: lang.lang.number_of_customer"></p>
                                        <span data-bind="text: dataSource.total"></span>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-7">
                                    <div class="total-sale">
                                        <p data-bind="text: lang.lang.total_customer_balance"></p>
                                        <span data-bind="text: total_balance"></span>                                   
                                    </div>
                                </div>
                            </div>

                            <table style="margin-bottom: 0;" class="table table-bordered table-condensed table-striped table-primary table-vertical-center">
                                <thead>
                                    <tr>
                                        <th style="text-transform: uppercase; vertical-align: top;" data-bind="text: lang.lang.customer_name"></th>
                                        <th style="text-align: right; text-transform: uppercase; vertical-align: top;" data-bind="text: lang.lang.No_of_invoice"></th>
                                        <th style="vertical-align: top; text-align: right;" data-bind="text: lang.lang.account_receivable_balance"></th>
                                    </tr>
                                </thead>
                                <tbody data-role="listview"
                                        data-auto-bind="false"
                                        data-template="customerBalanceSummary-template"
                                        data-bind="source: dataSource" >
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</script>
<script id="customerBalanceSummary-template" type="text/x-kendo-template">
    <tr>
        <td>#=name#</td>
        <td style="text-align: right;">#=number#</td>
        <td align="right">#=kendo.toString(amount, "c2", banhji.locale)#</td>
    </tr>
</script>   
<script id="customerBalanceDetail" type="text/x-kendo-template">
    <div class="container">
        <div class="row-fluid">
            <div id="waterreport" class="background">
                <div class="row-fluid">
                    <div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
                        <i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
                    </div>
                    <div id="example" class="k-content">
                        <div class="hidden-print pull-right" style="margin-bottom: 15px;">
                            <span class="pull-right glyphicons no-js remove_2"
                        onclick="javascript:window.history.back()"><i></i></span>
                        </div>
                        <div class="clear"></div>

                        <!-- Tabs -->
                        <div class="relativeWrap" data-toggle="source-code">
                            <div class="widget widget-tabs widget-tabs-gray report-tab">
                            
                                <!-- Tabs Heading -->
                                <div class="widget-head">
                                    <ul>
                                        <li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text: lang.lang.date"></span></a></li>                                        
                                    </ul>
                                </div>
                                <!-- // Tabs Heading END -->                                
                                <div class="widget-body">
                                    <div class="tab-content">
                                        <!-- //Date -->
                                        <div class="tab-pane active" id="tab-1">
                                            <span data-bind="text: lang.lang.as_of"></span>:
                                            <input data-role="datepicker"
                                                    data-format="dd-MM-yyyy"
                                                    data-parse-formats="yyyy-MM-dd" 
                                                    data-bind="value: as_of" />

                                            <button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>                         
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- // Tabs END -->
                        <div id="invFormContent">
                            <div class="block-title">
                                <h3 data-bind="text: company.name"></h3>
                                <h2 data-bind="text: lang.lang.customer_balance_detail"></h2>
                                <p data-bind="text: displayDate"></p>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-sm-5">
                                    <div class="total-sale">
                                        <p data-bind="text: lang.lang.number_of_customer"></p>
                                        <span data-bind="text: dataSource.total"></span>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-7">
                                    <div class="total-sale">
                                        <p data-bind="text: lang.lang.total_customer_balance"></p>
                                        <span data-bind="text: total_balance"></span>                       
                                    </div>
                                </div>
                            </div>

                            <table style="margin-bottom: 0;" class="table table-bordered table-condensed table-striped table-primary table-vertical-center">
                                <thead>
                                    <tr>
                                        <th style="vertical-align: top;" data-bind="text: lang.lang.type"></th>
                                        <th style="text-align: left; vertical-align: top;" data-bind="text: lang.lang.date"></th>
                                        <th style="text-align: left; vertical-align: top;" data-bind="text: lang.lang.reference"></th>      
                                        <th style="text-align: left; vertical-align: top;" data-bind="text: lang.lang.location"></th>   
                                        <th style="text-align: right; vertical-align: top; text-align: center;" data-bind="text: lang.lang.status"></th>    
                                        <th style="vertical-align: top; text-align: right;" data-bind="text: lang.lang.balance"></th>
                                    </tr>
                                </thead>
                                <tbody data-role="listview"
                                             data-auto-bind="false"
                                             data-bind="source: dataSource"                                      
                                             data-template="customerBalanceDetail-template"
                                ></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</script>
<script id="customerBalanceDetail-template" type="text/x-kendo-template">
    <tr style="font-weight: bold">
        <td colspan="6">#=name#</td>
    </tr>   
    # var amount = 0;#
    #for(var i= 0; i <line.length; i++) {#
        # amount += kendo.parseFloat(line[i].amount);#
        <tr>
            <td style="padding-left: 20px !important; text-align: left">
                <a href="\#/#=line[i].type.toLowerCase()#/#=line[i].id#"><i></i> #=line[i].type#</a>
            </td>
            <td style="text-align: left;">#=kendo.toString(new Date(line[i].issued_date), "dd-MM-yyyy")#</td>
            <td style="text-align: left;">#=line[i].number#</td>    
            <td style="text-align: left;">#=line[i].location#</td>      
            <td style="text-align: center;">
                # var date = new Date(), dueDates = new Date(line[i].due_date).getTime(), toDay = new Date(date).getTime(); #
                #if(dueDates < toDay) {#
                    Over Due #:Math.floor((toDay - dueDates)/(1000*60*60*24))# days
                #} else {#
                    #:Math.floor((dueDates - toDay)/(1000*60*60*24))# days to pay
                #}#
            </td>   
            <td style="text-align: right;">#=kendo.toString(line[i].amount, "c2", banhji.locale)#</td>
        </tr>
    #}#
    <tr>
        <td style="font-weight: bold; color: black;" data-bind="text: lang.lang.total"></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td class="right" style="font-weight: bold; border-top: 1px solid black !important; color: black;">
            #=kendo.toString(amount, "c", banhji.locale)#
        </td>
    </tr>
    <tr>
        <td colspan="6">&nbsp;</td>
    </tr>
</script>
<script id="cashReceiptSummary" type="text/x-kendo-template">
    <div id="slide-form">
        <div class="customer-background" style="margin-top: 15px;">
            <div class="container-960">
                <div id="example" class="k-content saleSummaryCustomer">
                    <span class="pull-right glyphicons no-js remove_2" data-bind="click: cancel"><i></i></span>
                    <br>
                    <br>
                    <div class="row-fluid">
                        <!-- Tabs -->
                        <div class="relativeWrap" data-toggle="source-code">
                            <div class="widget widget-tabs widget-tabs-gray report-tab">
                                <!-- Tabs Heading -->
                                <div class="widget-head">
                                    <ul>
                                        <li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i>Date</a></li>                                      
                                        <li><a class="glyphicons print" href="#tab-2" data-toggle="tab" data-bind="click: printGrid"><i></i>Print/Export</a></li
                                    </ul>
                                </div>
                                <!-- // Tabs Heading END -->                                
                                <div class="widget-body">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab-1">
                                            <input data-role="dropdownlist"
                                               data-value-primitive="true"
                                               data-text-field="text"
                                               data-value-field="value"
                                               data-bind="value: sorter,
                                                          source: sortList,             
                                                          events: { change: sorterChanges }" />
                                                                       
                                            <input data-role="datepicker"
                                               data-format="dd-MM-yyyy"
                                               data-parse-formats="yyyy-MM-dd"
                                               data-bind="value: sdate"
                                               placeholder="From" />

                                            <input data-role="datepicker"
                                               data-format="dd-MM-yyyy"
                                               data-parse-formats="yyyy-MM-dd"
                                               data-bind="value: edate"
                                               placeholder="To" />

                                            <button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>                         
                                        </div>                                                                             
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- // Tabs END -->                        
                    </div>
                    <br>
                    <div id="invFormContent">
                        <div class="block-title">
                            <h3 data-bind="text: institute.name"></h3>
                            <h2>Cash Receipt Summary</h2>
                        </div>
                    </div>
                    <div data-role="grid" data-bind="source: dataSource" data-pageable="true"></div>
                </div>
            </div>
        </div>
    </div>
</script>
<script id="cashReceiptSourceSummary" type="text/x-kendo-template">
    <div id="slide-form">
        <div class="customer-background" style="margin-top: 15px;">
            <div class="container-960">
                <div id="example" class="k-content saleSummaryCustomer">
                    <span class="pull-right glyphicons no-js remove_2" data-bind="click: cancel"><i></i></span>
                    <br>
                    <br>
                    <div class="row-fluid">
                        <!-- Tabs -->
                        <div class="relativeWrap" data-toggle="source-code">
                            <div class="widget widget-tabs widget-tabs-gray report-tab">
                                <!-- Tabs Heading -->
                                <div class="widget-head">
                                    <ul>
                                        <li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text:lang.lang.date">Date</span></a></li>                                 
                                        <li><a class="glyphicons print" href="#tab-2" data-toggle="tab" data-bind="click: printGrid"><i></i><span data-bind="text:lang.lang.print_export">Print/Export</span></a></li>
                                    </ul>
                                </div>
                                <!-- // Tabs Heading END -->                                
                                <div class="widget-body">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab-1">
                                            <input data-role="dropdownlist"
                                               data-value-primitive="true"
                                               data-text-field="text"
                                               data-value-field="value"
                                               data-bind="value: sorter,
                                                          source: sortList,             
                                                          events: { change: sorterChanges }" />
                                                                       
                                            <input data-role="datepicker"
                                               data-format="dd-MM-yyyy"
                                               data-parse-formats="yyyy-MM-dd"
                                               data-bind="value: sdate"
                                               placeholder="From" />

                                            <input data-role="datepicker"
                                               data-format="dd-MM-yyyy"
                                               data-parse-formats="yyyy-MM-dd"
                                               data-bind="value: edate"
                                               placeholder="To" />

                                            <button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>                         
                                        </div>                                                                             
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- // Tabs END -->                        
                    </div>
                    <br>
                    <div id="invFormContent">
                        <div class="block-title">
                            <h3 data-bind="text: institute.name"></h3>
                            <h2 data-bind="text:lang.lang.cash_receipt_by_sources_detail">Cash Receipt by Source Summary</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</script>
<script id="cashReceiptDetail" type="text/x-kendo-template">
    <div class="container">
        <div class="row-fluid">
            <div id="waterreport" class="background">
                <div class="row-fluid">
                    <div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
                        <i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
                    </div>
                    <div id="example" class="k-content">
                        <div class="hidden-print pull-right" style="margin-bottom: 15px;">
                            <span class="pull-right glyphicons no-js remove_2"
                        onclick="javascript:window.history.back()"><i></i></span>
                        </div>
                        <div class="clear"></div>

                        <!-- Tabs -->
                        <div class="relativeWrap" data-toggle="source-code">
                            <div class="widget widget-tabs widget-tabs-gray report-tab">
                            
                                <!-- Tabs Heading -->
                                <div class="widget-head">
                                    <ul>
                                        <li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text: lang.lang.date">Date</span></a></li>    
                                        <li><a class="glyphicons filter" href="#tab-2" data-toggle="tab"><i></i><span data-bind="text: lang.lang.filter">Filter</span></a></li>
                                        <li><a class="glyphicons print" href="#tab-3" data-toggle="tab"><i></i><span data-bind="text: lang.lang.print_export" style="text-transform: capitalize;"></span></a></li>
                                    </ul>
                                </div>
                                <!-- // Tabs Heading END -->                                
                                <div class="widget-body">
                                    <div class="tab-content">
                                        <!-- //Date -->
                                        <div class="tab-pane active" id="tab-1">
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-2">                                            
                                                    <input data-role="dropdownlist"
                                                           class="sorter"                  
                                                           data-value-primitive="true"
                                                           data-text-field="text"
                                                           data-value-field="value"
                                                           data-bind="value: sorter,
                                                                      source: sortList,                              
                                                                      events: { change: sorterChanges }" style="width: 100%" />
                                                </div>
                                                <div class="col-xs-12 col-sm-2">                    
                                                    <input data-role="datepicker"
                                                           class="sdate"
                                                           data-format="dd-MM-yyyy"
                                                           data-bind="value: sdate,
                                                                      max: edate"
                                                           placeholder="From ..." style="width: 100%" >
                                                </div>
                                                <div class="col-xs-12 col-sm-2">
                                                    <input data-role="datepicker"
                                                           class="edate"
                                                           data-format="dd-MM-yyyy"
                                                           data-bind="value: edate,
                                                                      min: sdate"
                                                           placeholder="To ..." style="width: 100%" >
                                                </div>
                                                <div class="col-xs-12 col-sm-1">
                                                    <button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Filter -->
                                        <div class="tab-pane" id="tab-2">
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-3">
                                                    <span data-bind="text: lang.lang.license">Licenses</span>
                                                    <input 
                                                        data-role="dropdownlist" 
                                                        data-option-label="License ..." 
                                                        data-auto-bind="false" 
                                                        data-value-primitive="true" 
                                                        data-text-field="name" 
                                                        data-value-field="id" 
                                                        data-bind="
                                                            value: licenseSelect,
                                                                source: licenseDS,
                                                                events: {change: licenseChange}" style="width: 100%">
                                                </div>
                                                <div class="col-xs-12 col-sm-3">
                                                    <span data-bind="text: lang.lang.location">Locations</span>
                                                        <input 
                                                            data-role="dropdownlist" 
                                                            data-option-label="Location ..." 
                                                            data-auto-bind="false" 
                                                            data-value-primitive="false" 
                                                            data-text-field="name" 
                                                            data-value-field="id" 
                                                            data-bind="
                                                                value: blocSelect,
                                                                enabled: haveBloc,
                                                                source: blocDS" style="width: 100%">
                                                </div>
                                                <div class="col-xs-12 col-sm-1">                                            
                                                    <button style="margin-top: 20px;" type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
                                                </div>                                                      
                                            </div>      
                                        </div>
                                        <!-- PRINT/EXPORT  -->
                                        <div class="tab-pane report" id="tab-3">                                            
                                            <span id="savePrint" class="btn btn-icon btn-default glyphicons print print1" data-bind="click: printGrid" ><i></i> Print</span>
                                            <span id="excel" class="btn btn-icon btn-default execl" data-bind="click: ExportExcel" >
                                                <i class="fa fa-file-excel-o"></i>
                                                Export to Excel
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- // Tabs END -->
                        <div id="invFormContent">
                            <div class="block-title">
                                <h3 data-bind="text: company.name"></h3>
                                <h2 data-bind="text: lang.lang.cash_receipt_detail">Cash Receipt Detail</h2>
                                <p data-bind="text: displayDate"></p>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-sm-3">
                                    <div class="total-sale">                                    
                                        <p data-bind="text: lang.lang.no_of_cashReceipt">Number of Cash Receipt</p>
                                        <span data-format="n0" data-bind="text: cashReceipt"></span>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-9">
                                    <div class="total-sale">
                                        <p data-bind="text: lang.lang.total_amount">Total Amount</p>
                                        <span data-bind="text: total"></span>
                                    </div>
                                </div>
                            </div>

                            <table style="margin-bottom: 0;" class="table table-bordered table-condensed table-striped table-primary table-vertical-center">
                                <thead>
                                    <tr>
                                        <th style="vertical-align: top;"><span data-bind="text: lang.lang.receipt_date">Receipt Date</span></th>
                                        <th style="vertical-align: top;"><span data-bind="text: lang.lang.receipt_number">Receipt Number</span></th>
                                        <th style="vertical-align: top;"><span data-bind="text: lang.lang.receipt_amount">Receipt Amount</span></th>
                                        <th style="vertical-align: top;"><span data-bind="text: lang.lang.invoice_date">Invoice Date</span></th>
                                        <th style="vertical-align: top;"><span data-bind="text: lang.lang.invoice_number">Invoice Number</span></th>
                                        <th style="vertical-align: top;"><span data-bind="text: lang.lang.invoice_amount">Invoice Amount</span></th>                                    
                                    </tr>
                                </thead>
                                <tbody data-role="listview"
                                             data-auto-bind="false"
                                             data-bind="source: dataSource"
                                             data-template="cashReceiptDetail-template"
                                ></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</script>
<script id="cashReceiptDetail-template" type="text/x-kendo-template">
    <tr>
        <td colspan="6" style="font-weight: bold; color: black;">#: name #</td>
    </tr>
    # var totalReceived = 0;#   
    # var totalInvoice = 0;#
    #for(var i=0; i<line.length; i++){#
        #totalReceived += line[i].amount;#
        #totalInvoice += line[i].reference_amount;#
        <tr>
            <td>#=kendo.toString(new Date(line[i].issued_date), "dd-MM-yyyy")#</td>
            <td><a href="\#/#=line[i].type.toLowerCase()#/#=line[i].id#">#=line[i].number#</a></td>
            <td style="text-align: right;">#=kendo.toString(line[i].amount, "c2", banhji.locale)#</td>      
            <td>#=kendo.toString(new Date(line[i].reference_issued_date), "dd-MM-yyyy")#</td>
            <td><a href="\#/#=line[i].reference_type.toLowerCase()#/#=line[i].id#">#=line[i].reference_number#</a></td>
            <td style="text-align: right;">#=kendo.toString(line[i].reference_amount, "c2", banhji.locale)#</td>                
        </tr>
    #}#
    <tr>
        <td colspan="2" style="font-weight: bold; color: black;" data-bind="text: lang.lang.total">Total</td>
        <td style="text-align: right; font-weight: bold; border-top: 1px solid black !important; color: black;">
            #=kendo.toString(totalReceived, "c2", banhji.locale)#
        </td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td colspan="6">&nbsp;</td>
    </tr>
</script>
<script id="cashReceiptSourceDetail" type="text/x-kendo-template">
    <div class="container">
        <div class="row-fluid">
            <div id="waterreport" class="background">
                <div class="row-fluid">
                    <div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
                        <i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
                    </div>
                    <div id="example" class="k-content">
                        <div class="hidden-print pull-right" style="margin-bottom: 15px;">
                            <span class="pull-right glyphicons no-js remove_2"
                        onclick="javascript:window.history.back()"><i></i></span>
                        </div>
                        <div class="clear"></div>
                        <!-- Tabs -->
                        <div class="relativeWrap" data-toggle="source-code">
                            <div class="widget widget-tabs widget-tabs-gray report-tab">
                            
                                <!-- Tabs Heading -->
                                <div class="widget-head">
                                    <ul>
                                        <li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text: lang.lang.date">Date</span></a></li>    
                                        <li><a class="glyphicons filter" href="#tab-2" data-toggle="tab"><i></i><span data-bind="text: lang.lang.filter">Filter</span></a></li>
                                        <li><a class="glyphicons print" href="#tab-3" data-toggle="tab"><i></i><span data-bind="text: lang.lang.print_export" style="text-transform: capitalize;"></span></a></li>
                                    </ul>
                                </div>
                                <!-- // Tabs Heading END -->                                
                                <div class="widget-body">
                                    <div class="tab-content">
                                        <!-- //Date -->
                                        <div class="tab-pane active" id="tab-1">
                                            <div class="row">                                               
                                                <div class="col-xs-12 col-sm-2">
                                                    <input data-role="dropdownlist"
                                                           class="sorter"                  
                                                           data-value-primitive="true"
                                                           data-text-field="text"
                                                           data-value-field="value"
                                                           data-bind="value: sorter,
                                                                      source: sortList,                              
                                                                      events: { change: sorterChanges }" style="width: 100%">
                                                </div>                                          
                                                <div class="col-xs-12 col-sm-2">                     
                                                    <input data-role="datepicker"
                                                           class="sdate"
                                                           data-format="dd-MM-yyyy"
                                                           data-bind="value: sdate,
                                                                      max: edate"
                                                           placeholder="From ..."  style="width: 100%">
                                                </div>                                          
                                                <div class="col-xs-12 col-sm-2">          
                                                    <input data-role="datepicker"
                                                           class="edate"
                                                           data-format="dd-MM-yyyy"
                                                           data-bind="value: edate,
                                                                      min: sdate"
                                                           placeholder="To ..."  style="width: 100%">
                                                </div>                                          
                                                <div class="col-xs-12 col-sm-1">
                                                    <button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Filter -->
                                        <div class="tab-pane" id="tab-2">
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-3" >
                                                    <span data-bind="text: lang.lang.license">Licenses</span>
                                                    <input 
                                                        data-role="dropdownlist" 
                                                        data-option-label="License ..." 
                                                        data-auto-bind="false" 
                                                        data-value-primitive="true" 
                                                        data-text-field="name" 
                                                        data-value-field="id" 
                                                        data-bind="
                                                            value: licenseSelect,
                                                                source: licenseDS,
                                                                events: {change: licenseChange}" style="width: 100%">
                                                </div>
                                                <div class="col-xs-12 col-sm-3">
                                                    <span data-bind="text: lang.lang.location">Locations</span>
                                                        <input 
                                                            data-role="dropdownlist" 
                                                            data-option-label="Location ..." 
                                                            data-auto-bind="false" 
                                                            data-value-primitive="false" 
                                                            data-text-field="name" 
                                                            data-value-field="id" 
                                                            data-bind="
                                                                value: blocSelect,
                                                                enabled: haveBloc,
                                                                source: blocDS" style="width: 100%">
                                                </div>
                                                <div class="col-xs-12 col-sm-1">                                            
                                                    <button style="margin-top: 20px;" type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
                                                </div>                                                      
                                            </div>      
                                        </div>

                                        <!-- PRINT/EXPORT  -->
                                        <div class="tab-pane report" id="tab-3">                                            
                                            <span id="savePrint" class="btn btn-icon btn-default glyphicons print print1" data-bind="click: printGrid" ><i></i> Print</span>
                                            <span id="excel" class="btn btn-icon btn-default execl" data-bind="click: ExportExcel" >
                                                <i class="fa fa-file-excel-o"></i>
                                                Export to Excel
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- // Tabs END -->                        
                    

                        <div id="invFormContent">
                            <div class="block-title">
                                <h3 data-bind="text: company.name"></h3>
                                <h2 data-bind="text: lang.lang.cash_receipt_by_sources_detail">Cash Receipt by Source Detail</h2>
                                <p data-bind="text: displayDate"></p>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-sm-3">
                                    <div class="total-sale">
                                        <p data-bind="text: lang.lang.number_of_customer">Number of Customers</p>
                                        <span data-bind="text: dataSource.total"></span>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-9">
                                    <div class="total-sale">
                                        <p data-bind="text: lang.lang.total">Total</p>
                                        <span data-bind="text: total"></sapn>
                                    </div>
                                </div>
                            </div>

                            <table style="margin-bottom: 0;" class="table table-bordered table-condensed table-striped table-primary table-vertical-center">
                                <thead>
                                    <tr>                                    
                                        <th style="vertical-align: top;"><span data-bind="text: lang.lang.name">Name</span></th>
                                        <th style="text-align: left; vertical-align: top;"><span data-bind="text: lang.lang.date">Date</span></th>                                  
                                        <th style="text-align: left; vertical-align: top;"><span data-bind="text: lang.lang.reference">Reference</span></th>
                                        <th style="vertical-align: top; text-align: right"><span data-bind="text: lang.lang.amount">Amount</span></th>
                                    </tr>
                                </thead>
                                <tbody data-role="listview"
                                        data-template="cashReceiptSourceDetail-template"
                                        data-auto-bind="false" 
                                        data-bind="source: dataSource">
                                </tbody>
                            </table>
                        </div>
                    </span>
                </div>
            </div>
        </div>
    </div>
</script>
<script id="cashReceiptSourceDetail-template" type="text/x-kendo-template">
    <tr style="font-weight: bold">
        <td>#=payment#</td>
        <td></td>
        <td></td>
        <td></td>
    </tr>   
    # var amount = 0;#
    #for(var i= 0; i <line.length; i++) {#
        # amount += line[i].amount;#
        <tr>
            <td style="padding-left: 20px !important;">#=line[i].name#</td>
            <td style="text-align: left;">#=kendo.toString(new Date(line[i].date), "dd-MM-yyyy")#</td>
            <td style="text-align: left;">#=line[i].number#</td>        
            <td style="text-align: right;">#=kendo.toString(line[i].amount, banhji.locale=="km-KH"?"c0":"c", banhji.locale)#</td>
        </tr>
    #}#
    <tr>
        <td style="font-weight: bold; color: black;">Total</td>
        <td></td>
        <td></td>
        <td class="right" style="font-weight: bold; border-top: 1px solid black !important; color: black;">
            #=kendo.toString(amount, banhji.locale=="km-KH"?"c0":"c", banhji.locale)#
        </td>
    </tr>
    <tr>
        <td colspan="4">&nbsp;</td>
    </tr>
</script>
<script id="cashReceiptbyuser" type="text/x-kendo-template">
    <div class="container">
        <div class="row-fluid">
            <div id="waterreport" class="background">
                <div class="row-fluid">
                    <div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
                        <i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
                    </div>
                    <div id="example" class="k-content">
                        <div class="hidden-print pull-right" style="margin-bottom: 15px;">
                            <span class="pull-right glyphicons no-js remove_2"
                        onclick="javascript:window.history.back()"><i></i></span>
                        </div>
                        <div class="clear"></div>
                        <!-- Tabs -->
                        <div class="relativeWrap" data-toggle="source-code">
                            <div class="widget widget-tabs widget-tabs-gray report-tab">
                            
                                <!-- Tabs Heading -->
                                <div class="widget-head">
                                    <ul>
                                        <li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text: lang.lang.date">Date</span></a></li>    
                                        <li><a class="glyphicons filter" href="#tab-2" data-toggle="tab"><i></i><span data-bind="text: lang.lang.filter">Filter</span></a></li>
                                        <li><a class="glyphicons print" href="#tab-3" data-toggle="tab"><i></i><span data-bind="text: lang.lang.print_export" style="text-transform: capitalize;"></span></a></li>
                                    </ul>
                                </div>
                                <!-- // Tabs Heading END -->                                
                                <div class="widget-body">
                                    <div class="tab-content">
                                        <!-- //Date -->
                                        <div class="tab-pane active" id="tab-1">
                                            <div class="row">                                               
                                                <div class="col-xs-12 col-sm-2">
                                                    <input data-role="dropdownlist"
                                                           class="sorter"                  
                                                           data-value-primitive="true"
                                                           data-text-field="text"
                                                           data-value-field="value"
                                                           data-bind="value: sorter,
                                                                      source: sortList,                              
                                                                      events: { change: sorterChanges }" style="width: 100%">
                                                </div>                                          
                                                <div class="col-xs-12 col-sm-2">                     
                                                    <input data-role="datepicker"
                                                           class="sdate"
                                                           data-format="dd-MM-yyyy"
                                                           data-bind="value: sdate,
                                                                      max: edate"
                                                           placeholder="From ..."  style="width: 100%">
                                                </div>                                          
                                                <div class="col-xs-12 col-sm-2">          
                                                    <input data-role="datepicker"
                                                           class="edate"
                                                           data-format="dd-MM-yyyy"
                                                           data-bind="value: edate,
                                                                      min: sdate"
                                                           placeholder="To ..."  style="width: 100%">
                                                </div>                                          
                                                <div class="col-xs-12 col-sm-1">
                                                    <button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Filter -->
                                        <div class="tab-pane" id="tab-2">
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-3" >
                                                    <span data-bind="text: lang.lang.license">Licenses</span>
                                                    <input 
                                                        data-role="dropdownlist" 
                                                        data-option-label="License ..." 
                                                        data-auto-bind="false" 
                                                        data-value-primitive="true" 
                                                        data-text-field="name" 
                                                        data-value-field="id" 
                                                        data-bind="
                                                            value: licenseSelect,
                                                                source: licenseDS,
                                                                events: {change: licenseChange}" style="width: 100%">
                                                </div>
                                                <div class="col-xs-12 col-sm-3">
                                                    <span data-bind="text: lang.lang.location">Locations</span>
                                                        <input 
                                                            data-role="dropdownlist" 
                                                            data-option-label="Location ..." 
                                                            data-auto-bind="false" 
                                                            data-value-primitive="false" 
                                                            data-text-field="name" 
                                                            data-value-field="id" 
                                                            data-bind="
                                                                value: blocSelect,
                                                                enabled: haveBloc,
                                                                source: blocDS" style="width: 100%">
                                                </div>
                                                <div class="col-xs-12 col-sm-1">                                            
                                                    <button style="margin-top: 20px;" type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
                                                </div>                                                      
                                            </div>      
                                        </div>

                                        <!-- PRINT/EXPORT  -->
                                        <div class="tab-pane report" id="tab-3">                                            
                                            <span id="savePrint" class="btn btn-icon btn-default glyphicons print print1" data-bind="click: printGrid" ><i></i> Print</span>
                                            <span id="excel" class="btn btn-icon btn-default execl" data-bind="click: ExportExcel" >
                                                <i class="fa fa-file-excel-o"></i>
                                                Export to Excel
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- // Tabs END -->                        
                    

                        <div id="invFormContent">
                            <div class="block-title">
                                <h3 data-bind="text: company.name"></h3>
                                <h2 data-bind="text: lang.lang.cash_receipt_by_employee">Cash Receipt by Empoloyee</h2>
                                <p data-bind="text: displayDate"></p>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-sm-3">
                                    <div class="total-sale">
                                        <p data-bind="text: lang.lang.number_of_employee">Number of Customers</p>
                                        <span data-bind="text: dataSource.total"></span>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-9">
                                    <div class="total-sale">
                                        <p data-bind="text: lang.lang.total">Total</p>
                                        <span data-bind="text: total"></sapn>
                                    </div>
                                </div>
                            </div>

                            <table style="margin-bottom: 0;" class="table table-bordered table-condensed table-striped table-primary table-vertical-center">
                                <thead>
                                    <tr>                                    
                                        <th style="vertical-align: top;"><span data-bind="text: lang.lang.name">Name</span></th>
                                        <th style="text-align: left; vertical-align: top;"><span data-bind="text: lang.lang.date">Date</span></th>                                  
                                        <th style="text-align: left; vertical-align: top;"><span data-bind="text: lang.lang.reference">Reference</span></th>
                                        <th style="vertical-align: top; text-align: right"><span data-bind="text: lang.lang.amount">Amount</span></th>
                                    </tr>
                                </thead>
                                <tbody data-role="listview"
                                        data-template="cashReceiptbyuser-template"
                                        data-auto-bind="false" 
                                        data-bind="source: dataSource">
                                </tbody>
                            </table>
                        </div>
                    </span>
                </div>
            </div>
        </div>
    </div>
</script>
<script id="cashReceiptbyuser-template" type="text/x-kendo-template">
    <tr style="font-weight: bold">
        <td>#=payment#</td>
        <td></td>
        <td></td>
        <td></td>
    </tr>   
    # var amount = 0;#
    #for(var i= 0; i <line.length; i++) {#
        # amount += line[i].amount;#
        <tr>
            <td style="padding-left: 20px !important;">#=line[i].name#</td>
            <td style="text-align: left;">#=kendo.toString(new Date(line[i].date), "dd-MM-yyyy")#</td>
            <td style="text-align: left;">#=line[i].number#</td>        
            <td style="text-align: right;">#=kendo.toString(line[i].amount, banhji.locale=="km-KH"?"c0":"c", banhji.locale)#</td>
        </tr>
    #}#
    <tr>
        <td style="font-weight: bold; color: black;">Total</td>
        <td></td>
        <td></td>
        <td class="right" style="font-weight: bold; border-top: 1px solid black !important; color: black;">
            #=kendo.toString(amount, banhji.locale=="km-KH"?"c0":"c", banhji.locale)#
        </td>
    </tr>
    <tr>
        <td colspan="4">&nbsp;</td>
    </tr>
</script>