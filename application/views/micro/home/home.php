
<div id="wrapperApplication" class="wrapper"></div>
<!--load before somthing not yet done -->
<!-- <div id="holdpageloadhide" style="display:block;text-align: center;position: fixed;top: 0; left: 0;width: 100%; height: 100%;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
	<i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 45%;left: 45%"></i>
</div> -->
<!-- template section starts -->
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
*	Home Section      	  *
**************************** -->
<script id="Index" type="text/x-kendo-template">
	<div class="page-wrapper ">
        <div class="container-fluid">
            <div class="row marginTop15 home">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="home-chart">
                                <div data-role="chart"
                                     data-legend="{ position: 'top' }"
                                     data-series-defaults="{ type: 'column' }"
                                     data-tooltip='{
                                        visible: true,
                                        format: "{0}%",
                                        template: "#= series.name #: #= kendo.toString(value, &#39;c&#39;, banhji.locale) #"
                                     }'
                                     data-series="[
                                                     { field: 'sale', name: langVM.lang.monthly_sale, categoryField:'month', color: '#203864', overlay:{ gradient: 'none'} },
                                                     { field: 'order', name: langVM.lang.monthly_order, categoryField:'month', color: '#9CB9D9', overlay:{ gradient: 'none'} }
                                                 ]"
                                     data-auto-bind="false"
                                     data-bind="source: graphDS"
                                     style="height: 280px;" ></div>
                                </div>
                            
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <div class=" col-lg-6">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card" >
                                <div class="card-body">
                                    <div class="saleOverview" >
                                        <h2 data-bind="text: lang.lang.sale"></h2>
                                        <p data-format="n" data-bind="text: obj.sale"></p>
                                        <div class="col-md-12">
                                            <div class="col-md-4">
                                                <span data-bind="text: obj.sale_customer"></span>
                                                <span data-bind="text: lang.lang.customer"></span>
                                            </div>
                                            <div class="col-md-4">
                                                <span data-bind="text: obj.sale_product"></span>
                                                <span data-bind="text: lang.lang.product"></span>
                                            </div>
                                            <div class="col-md-4">
                                                <span data-bind="text: obj.sale_ordered"></span>
                                                <span data-bind="text: lang.lang.order"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="saleOverview">
                                        <h2 data-bind="text: lang.lang.receivable"></h2>
                                        <p data-format="n" data-bind="text: obj.ar"></p>
                                        <div class="col-md-12">
                                            <div class="col-md-4">
                                                <span data-bind="text: obj.ar_open"></span>
                                                <span data-bind="text: lang.lang.open"></span>
                                            </div>
                                            <div class="col-md-4">
                                                <span data-bind="text: obj.ar_customer"></span>
                                                <span data-bind="text: lang.lang.customers"></span>
                                            </div>
                                            <div class="col-md-4">
                                                <span data-bind="text: obj.ar_overdue"></span>
                                                <span data-bind="text: lang.lang.overdue"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                               <div class="card-body" >
                                    <div class="saleOverview" >
                                        <h2 data-bind="text: lang.lang.purchase"></h2>
                                        <p data-format="n" data-bind="text: objVendor.purchase"></p>
                                        <div class="col-md-12">
                                            <div class="col-md-4">
                                                <span data-bind="text: objVendor.purchase_supplier"></span>
                                                <span data-bind="text: lang.lang.supplier"></span>
                                            </div>
                                            <div class="col-md-4">
                                                <span data-bind="text: objVendor.purchase_product"></span>
                                                <span data-bind="text: lang.lang.product"></span>
                                            </div>
                                            <div class="col-md-4">
                                                <span data-bind="text: objVendor.purchase_ordered"></span>
                                                <span data-bind="text: lang.lang.order"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="saleOverview" >
                                        <h2 data-bind="text: lang.lang.payables"></h2>
                                        <p data-format="n" data-bind="text: objVendor.ap"></p>
                                        <div class="col-md-12">
                                            <div class="col-md-4">
                                                <span data-bind="text: objVendor.ap_open"></span>
                                                <span data-bind="text: lang.lang.open"></span>
                                            </div>
                                            <div class="col-md-4">
                                                <span data-bind="text: objVendor.ap_supplier"></span>
                                                <span data-bind="text: lang.lang.supplier"></span>
                                            </div>
                                            <div class="col-md-4">
                                                <span  data-bind="text: objVendor.ap_overdue"></span>
                                                <span data-bind="text: lang.lang.overdue"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Column -->
            </div>
            
            <div class="row home-footer">
                <!-- Column -->
                <div class="col-lg-3">
                    <div class="card card-body">
                        <div class="top5" >
                            <table class="table color-table dark-table">
                                <thead>
                                    <tr>
                                        <th colspan="2" class="center">
                                            <span data-bind="text: lang.lang.top_5_customers"></span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody data-role="listview"
                                     data-auto-bind="false"
                                     data-template="top-contact-template"
                                     data-bind="source: objInventory.top_customer"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <!-- Column -->
                <div class="col-lg-3">
                    <div class="card card-body">
                        <div class="top5" >
                            <table class="table color-table dark-table">
                                <thead>
                                    <tr>
                                        <th colspan="2" class="center">
                                            <span data-bind="text: lang.lang.top_5_suppliers"></span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody data-role="listview"
                                     data-auto-bind="false"
                                     data-template="top-contact-template"
                                     data-bind="source: objInventory.top_supplier"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <!-- Column -->
                <div class="col-lg-3">
                    <div class="card card-body">
                        <div class="top5" >
                            <table class="table color-table dark-table">
                                <thead>
                                    <tr>
                                        <th colspan="2" class="center">
                                            <span data-bind="text: lang.lang.top_5_best_selling_products"></span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody data-role="listview"
                                     data-auto-bind="false"
                                     data-template="top-product-template"
                                     data-bind="source: objInventory.top_product"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <!-- Column -->
                <div class="col-lg-3">
                    <div class="card card-body">
                        <table class="table color-table dark-table">
                            <thead>
                                <tr>
                                    <th class="center" colspan="2">
                                        <span data-bind="text: lang.lang.top_5_Receipt"></span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody data-role="listview"
                                 data-auto-bind="false"
                                 data-template="top-contact-template"
                                 data-bind="source: obj.top_cash_receipt"></tbody>
                        </table>
                    </div>
                </div>
                <!-- Column -->
            </div>

        </div>
    </div>
</script>


<!-- Template -->
<script id="top-product-template" type="text/x-kendo-tmpl">
    <tr>
        <td>
            <span>
                #if(name.length>15){#
                    #=name.substring(0, 10)#...
                #}else{#
                    #=name#
                #}#
            </span>
            <span class="pull-right">#:kendo.toString(kendo.parseInt(total), "n0")#</span>
        </td>
    </tr>
</script>
<script id="top-contact-template" type="text/x-kendo-tmpl">
    <tr data-uid="#: uid #">
        <td>
            <span>
                #if(name){#
                    #if(name.length>15){#
                        #=name.substring(0, 10)#...
                    #}else{#
                        #=name#
                    #}#
                #}#
            </span>
            <span class="pull-right">#=kendo.toString(kendo.parseFloat(total), banhji.locale=="km-KH"?"c0":"c2", banhji.locale)#</span>
        </td>
    </tr>
</script>
<!-- End -->