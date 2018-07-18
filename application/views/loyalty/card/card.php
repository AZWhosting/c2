<link rel="stylesheet" href="<?php echo base_url()?>assets/micro/tab-page.css">
<div id="wrapperApplication" class="wrapper"></div>
<script type="text/x-kendo-template" id="layout">
    <!-- <div id="menu" class="menu"></div> -->
    <div id="content"></div>
</script>
<script type="text/x-kendo-template" id="blank-tmpl">
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
*   Section           *
**************************** -->
<script id="Index" type="text/x-kendo-template">
    <div class="row" id="customers">
        <div class="col-md-3">
            <div class="listWrapper">
                <a href="#/card" style="padding: 5px 0; font-size: 18px;" class="btn waves-effect waves-light btn-block btn-info btnAddCustomer"><i class="icon-user-follow marginRight"></i><span>Add Card</span></a>
                <div class="innerAll">
                    <form autocomplete="off" class="form-inline">
                        <div class="widget-search">
                            <div class="overflow-hidden">
                                <input type="search" placeholder="Card Number..." data-bind="value: searchText" style="padding: 6px;">
                            </div>
                            <button style="background: #009efb; color: #fff;" type="button" class="btn btn-default pull-right" data-bind="click: search"><i class="ti-search"></i></button>
                        </div>
                    </form>
                </div>

                <span class="results"><span data-bind="text: cardDS.total"></span> <span data-bind="text: lang.lang.found_search"></span></span>

                <div class="table table-condensed"
                     data-role="grid"
                     data-bind="source: cardDS"
                     data-row-template="card-list-tmpl"
                     data-columns="[{title: ''}]"
                     data-selectable="true"
                     data-scrollable="{virtual: true}"></div>
            </div>
        </div>
        
    </div>
</script>
<script id="card-list-tmpl" type="text/x-kendo-tmpl">
    <tr data-bind="click: selectedRow">
        <td>
            <div class="media-body">
                <span>#=number#</span>
            </div>
        </td>
    </tr>
</script>
<script id="bbbb">
    <div class="col-md-9">
            <div class="detailsWrapper">
                <div class="row">
                    <div class="col-md-6 marginBottom">
                        <input class="customerName" type="text" name="" data-bind="value: obj.name" disabled="disabled" style="background: #fff;" />
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#cutomerTransaction" role="tab" aria-selected="true"><span><i class="ti-text"></i></span></a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#customerInformation" role="tab" aria-selected="false"><span><i class="icon-info"></i></span></a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#customerMemo" role="tab" aria-selected="false"><span><i class="ti-pencil-alt"></i></span></a> </li>
                        </ul>
                        <div class="tab-content tabcontent-border">
                            <!--Tab Cutomer Transaction -->
                            <div class="tab-pane active show" id="cutomerTransaction" role="tabpanel">
                                <div class="p-10">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <a class="btn waves-effect waves-light btn-block btn-info" data-bind="click: goSaleOrder"><span data-bind="text: lang.lang.sale_order"></span></a>
                                        </div>
                                        <div class="col-sm-6">
                                            <a class="btn waves-effect waves-light btn-block btn-info" data-bind="click: goDeposit"><span data-bind="text: lang.lang.c_deposit"></span></a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <a class="btn waves-effect waves-light btn-block btn-info" data-bind="click: goCashSale"><span data-bind="text: lang.lang.cash_sale"></span></a>
                                        </div>
                                        <div class="col-sm-6">
                                            <a class="btn waves-effect waves-light btn-block btn-info" data-bind="click: goInvoice"><span data-bind="text: lang.lang.invoice"></span></a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        
                                        <div class="col-sm-6">
                                            <a class="btn waves-effect waves-light btn-block btn-info" data-bind="click: goCashReceipt"><span data-bind="text: lang.lang.cash_receipt"></span></a>
                                        </div>
                                        <div class="col-sm-6">
                                            <a class="btn waves-effect waves-light btn-block btn-info" data-bind="click: goCashRefound"><span data-bind="text: lang.lang.cash_refund"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End -->

                            <!--Tab Customer Information -->
                            <div class="tab-pane" id="customerInformation" role="tabpanel">
                                <div class="p-10">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <img class="main-image" data-bind="attr: { src: obj.image_url, alt: obj.name, title: obj.name }">
                                        </div>
                                        <div class="col-md-6">
                                            <div class="accounCetner-textedit">
                                                <table width="100%">
                                                    <tr>
                                                        <td width="40%"><span data-bind="text: lang.lang.name"></span></td>
                                                        <td width="60%">
                                                            <span data-bind="text: obj.name"></span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><span data-bind="text: lang.lang.phone"></span></td>
                                                        <td>
                                                            <span data-bind="text: obj.phone"></span>
                                                        </td>
                                                    </tr>
                                                </table>

                                                <a class="btn waves-effect waves-light btn-block btn-info btnViewEditCustomer" data-bind="click: goEdit"><i class="ti-pencil-alt marginRight"></i><span data-bind="text: lang.lang.view_edit_profile_micro"></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End -->

                            <!--Tab Customer Memo -->
                            <div class="tab-pane" id="customerMemo" role="tabpanel">
                                 <div class="p-10">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <input type="text" class="k-textbox marginBottom"
                                                data-bind="value: note"
                                                placeholder="Add memo ..."/>
                                        </div>
                                        <div class="col-md-3">
                                            <a class="btn waves-effect waves-light btn-block btn-info btnAddMemo" data-bind="click: saveNote"><i class="mdi mdi-message-plus marginRight"></i><span data-bind="text: lang.lang.add"></span></a>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="table table-condensed blockShowMemo"
                                                 data-role="grid"
                                                 data-auto-bind="false"
                                                 data-bind="source: noteDS"
                                                 data-row-template="customerCenter-note-tmpl"
                                                 data-columns="[{title: ''}]"
                                                 data-height="150"
                                                 data-scrollable="{virtual: true}" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End -->


                            <!--Tab Customer Attachment -->
                            <div class="tab-pane" id="customerAttachment" role="tabpanel">
                                <div class="p-10">
                                    <div class="row">
                                        <div class="col-md-12 ">
                                            <p><span data-bind="text: lang.lang.file_type"></span> [PDF, JPG, JPEG, TIFF, PNG, GIF]</p>
                                            <input id="files" name="files"
                                               type="file"
                                               data-role="upload"
                                               data-show-file-list="false"
                                               data-bind="events: {
                                                    select: onSelect
                                               }">
                                            <div class="table-responsive">
                                                <table class="table color-table dark-table">
                                                    <thead>
                                                        <tr>
                                                            <th data-bind="text: lang.lang.file_name"></th>
                                                            <th data-bind="text: lang.lang.description"></th>
                                                            <th data-bind="text: lang.lang.date"></th>
                                                            <th data-bind="text: lang.lang.action"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody data-role="listview"
                                                            data-template="attachment-list-tmpl"
                                                            data-auto-bind="false"
                                                            data-bind="source: attachmentDS"></tbody>
                                                </table>
                                            </div>
                                            <div id="pager" class="k-pager-wrap"
                                                 data-role="pager"
                                                 data-auto-bind="false"
                                                 data-bind="source: attachmentDS"></div>

                                            <a hre="" class="btn waves-effect waves-light btn-block btn-info btnAddAttachment col-md-3" data-bind="click: uploadFile" ><i class="ti-check marginRight"></i><span data-bind="text: lang.lang.save"></span></a>
                                        </div>
                                    </div>
                                </div>  
                            </div>
                            <!-- End -->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="blockBalance" data-bind="click: loadBalance" style="background: #FFCA00; box-shadow: 0 10px 16px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19) !important;">
                                    <div class="coverIcon"><i class="ti-server"></i></div>
                                    <div class="txt">
                                        <span style="color: #333;" data-bind="text: lang.lang.balance"></span>
                                        <span data-bind="text: balance"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="blockDeposit" data-bind="click: loadDeposit" style="background: #424242; box-shadow: 0 10px 16px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19) !important;">
                                    <div class="coverIcon"><i class=" ti-briefcase"></i></div>
                                    <div class="txt" style="width: 70%;">
                                        <span data-bind="text: lang.lang.deposit"></span>
                                        <span style="font-size: 15px;" data-bind="text: deposit" ></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="blockOpenInvoice" data-bind="click: loadBalance" style="background: #FAD5BB; box-shadow: 0 10px 16px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19) !important;">
                                    <div class="coverIcon"><i class="icon-info"></i></div>
                                    <div class="txt">
                                        <span style="font-size: 25px; color: #333;" data-bind="text: outInvoice"></span>
                                        <span style="color: #333;" data-bind="text: lang.lang.open_invoice"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="blockOverDue" data-bind="click: loadOverInvoice" style="background: #CE1C00; box-shadow: 0 10px 16px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19) !important;">
                                    <div class="coverIcon"><i class="ti-alarm-clock"></i></div>
                                    <div class="txt" >
                                        <span style="font-size: 25px;" data-bind="text: overInvoice"></span>
                                        <span  data-bind="text: lang.lang.over_due"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Block Search -->
                <div class="row">
                    <div class="col-md-12">
                        <input data-role="dropdownlist"
                               class="sorter marginRight marginBottom"
                               data-value-primitive="true"
                               data-text-field="text"
                               data-value-field="value"
                               data-bind="value: sorter,
                                          source: sortList,
                                          events: { change: sorterChanges }" />

                        <input data-role="datepicker"
                               class="sdate marginRight marginBottom"
                               data-format="dd-MM-yyyy"
                               data-bind="value: sdate,
                                          max: edate"
                               placeholder="From ..." >

                        <input data-role="datepicker"
                               class="edate marginRight marginBottom"
                               data-format="dd-MM-yyyy"
                               data-bind="value: edate,
                                          min: sdate"
                               placeholder="To ..." >

                        <button style="background: #009efb; color: #fff;" class="btnSearch" type="button" class="marginBottom" data-role="button" data-bind="click: searchTransaction"><i class="ti-search"></i></button>
                    </div>
                </div>
                <!-- End -->

                <!-- Block Table -->
                <div class="row">
                    <div class="col-md-12 table-responsive">
                        <table class="table color-table dark-table" style="border-bottom: 3px solid #1F4774;">
                            <thead>
                                <tr>
                                    <th style="border-top: 2px solid #1F4774; border-bottom: 3px solid #1F4774; background-color: #fff !important; color: #333 !important; " data-bind="text: lang.lang.date"></th>
                                    <th style="border-top: 2px solid #1F4774; border-bottom: 3px solid #1F4774; background-color: #fff !important; color: #333 !important; " data-bind="text: lang.lang.type"></th>
                                    <th style="border-top: 2px solid #1F4774; border-bottom: 3px solid #1F4774; background-color: #fff !important; color: #333 !important; " data-bind="text: lang.lang.reference_no"></th>
                                    <th style="border-top: 2px solid #1F4774; border-bottom: 3px solid #1F4774; background-color: #fff !important; color: #333 !important; " data-bind="text: lang.lang.amount"></th>
                                    <th style="border-top: 2px solid #1F4774; border-bottom: 3px solid #1F4774; background-color: #fff !important; color: #333 !important; " data-bind="text: lang.lang.status"></th>
                                    <th style="border-top: 2px solid #1F4774; border-bottom: 3px solid #1F4774; background-color: #fff !important; color: #333 !important; " data-bind="text: lang.lang.action"></th>
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
                <!-- End -->
            </div>
        </div>
</script>
