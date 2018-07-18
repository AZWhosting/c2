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
	<div class="page-wrapper " style="margin-left: 0;">
        <div class="container-fluid">
            <div class="row marginTop15 home">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class=" board-chart hidden-sm-down" style="margin-bottom: 19px; box-shadow: 0 10px 16px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19) !important; border-radius: 3px;padding: 22px 15px;">
                        <div class="row ">
                            <div class="col-3 col-md-3" >
                                <div class="marginBottom" style=" height: 117px; text-align: center;">
                                    <img style="width: auto; height: auto; max-width: 100%; max-height: 100%" data-bind="attr: { src: companyLogo, alt: companyName, title: companyName }" />
                                </div>
                            </div>
                            <div class="col-9 col-md-9" style="text-align: center;">
                                <h4 data-bind="html: companyName"></h4>
                                <h3 data-bind="text: lang.lang.financial_snapshot"></h3>
                                <span style="color: #000000;"><span data-bind="text: lang.lang.as_of"></span>:&nbsp;<span id="today-date" data-bind="text: today"></span></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6">
                    <div style="float: left; width: 100%">
                        <div class="row">
                            <div class="col-6 col-md-6">
                                <a href="<?php echo base_url()?>loyalty/card/">
                                    <div class="functionHome" style="padding: 18px; box-shadow: 0 10px 16px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19) !important; border-radius: 3px;">
                                        <img src="<?php echo base_url()?>assets/micro/sale.png " style="width: 40%" />
                                        <p>Card Center</p>
                                    </div>
                                </a>
                            </div>

                            <div class="col-6 col-md-6">
                                <a href="<?php echo base_url()?>loyalty/loyalty/">
                                    <div class="functionHome" style="padding: 18px; box-shadow: 0 10px 16px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19) !important; border-radius: 3px;">
                                        <img src="<?php echo base_url()?>assets/micro/inventory.png" style="width: 40%" />
                                        <p>Loyalty Center</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row home">
                <div class="col-12 col-md-3">
                    <div class="card" >
                        <div class="card-body">
                            <a href="<?php echo base_url()?>micro/sales#/sale_summary_by_customer">
                                <div class="saleOverview" style="box-shadow: 0 10px 16px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19) !important; border-radius: 3px; padding: 10px 0;">
                                    <h2 data-bind="text: lang.lang.sale"></h2>
                                    <p data-format="n" data-bind="text: obj.sale"></p>
                                    <div class="row">
                                        <div class="col">
                                            <span data-bind="text: obj.sale_customer"></span> <br/>
                                            <span data-bind="text: lang.lang.customer"></span>
                                        </div>
                                        <div class="col">
                                            <span data-bind="text: obj.sale_product"></span><br/>
                                            <span data-bind="text: lang.lang.product"></span>
                                        </div>
                                        
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <a href="<?php echo base_url()?>micro/sales#/customer_balance_summary">
                                <div class="saleOverview" style="box-shadow: 0 10px 16px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19) !important; border-radius: 3px; padding: 10px 0;">
                                    <h2 data-bind="text: lang.lang.receivable"></h2>
                                    <p data-format="n" data-bind="text: obj.ar"></p>
                                    <div class="row">
                                        <div class="col">
                                            <span data-bind="text: obj.ar_open"></span>
                                            <span data-bind="text: lang.lang.open"></span>
                                        </div>
                                        <div class="col">
                                            <span data-bind="text: obj.ar_overdue"></span>
                                            <span data-bind="text: lang.lang.overdue"></span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="card">
                       <div class="card-body" >
                            <a href="<?php echo base_url()?>micro/purchases#/purchase_summary_product_services">
                                <div class="saleOverview" style="box-shadow: 0 10px 16px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19) !important; border-radius: 3px; padding: 10px 0;">
                                    <h2 data-bind="text: lang.lang.purchase"></h2>
                                    <p data-format="n" data-bind="text: objVendor.purchase"></p>
                                    <div class="row">
                                        <div class="col">
                                            <span data-bind="text: objVendor.purchase_supplier"></span>
                                            <span data-bind="text: lang.lang.supplier"></span>
                                        </div>
                                        <div class="col">
                                            <span data-bind="text: objVendor.purchase_product"></span>
                                            <span data-bind="text: lang.lang.product"></span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <a href="<?php echo base_url()?>micro/purchases#/suppliers_balance_summary">
                                <div class="saleOverview" style="box-shadow: 0 10px 16px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19) !important; border-radius: 3px; padding: 10px 0;">
                                    <h2 data-bind="text: lang.lang.payables"></h2>
                                    <p data-format="n" data-bind="text: objVendor.ap"></p>
                                    <div class="row">
                                        <div class="col">
                                            <span data-bind="text: objVendor.ap_open"></span>
                                            <span data-bind="text: lang.lang.open"></span>
                                        </div>
                                        <div class="col">
                                            <span  data-bind="text: objVendor.ap_overdue"></span>
                                            <span data-bind="text: lang.lang.overdue"></span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row home">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="saleOverview" data-bind="click: loadCashIn" style="margin-bottom: 15px; background: #2ca01c; box-shadow: 0 10px 16px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19) !important; border-radius: 3px; padding:8px 0">
                                <h2 style=" color: #99de8f; font-size: 17px;"  data-bind="text: lang.lang.cash_in">Cash In</h2>
                                <p style="margin-bottom: 0;color: #fff; font-size: 17px;" data-format="n0" data-bind="text: checkin"></p>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="saleOverview" data-bind="click: loadCashOut" style="margin-bottom: 15px; background: #2ca01c; box-shadow: 0 10px 16px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19) !important; border-radius: 3px; padding: 8px 0">
                                <h2 style=" color: #99de8f; font-size: 17px;"  data-bind="text: lang.lang.cash_out">Cash Out</h2>
                                <p style="margin-bottom: 0;color: #fff; font-size: 17px;" data-format="n0" data-bind="text: checkout"></p>
                            </div>        
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="saleOverview" data-bind="click: loadCashBalance" style="margin-bottom: 15px; background: #2ca01c; box-shadow: 0 10px 16px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19) !important; border-radius: 3px; padding: 8px 0">
                                <h2 style=" color: #99de8f; font-size: 17px;" data-bind="text: lang.lang.cash_balance">Cash Balance</h2>
                                <p style="margin-bottom: 0; color: #fff; font-size: 17px;" data-format="n0" data-bind="text: cashbalance"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</script>