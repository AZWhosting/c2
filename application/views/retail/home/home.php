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
*	Water Section      	  *
**************************** -->
<script id="Index" type="text/x-kendo-template">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="min-height: 799px;">
        <!-- Content Header (Page header) -->
        <!-- <section class="content-header">
            <h1>
                Page Header
                <small>Optional description</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                <li class="active">Here</li>
            </ol>
        </section> -->

        <!-- Main content -->
        <section class="content container-fluid">
       		<div class="row">
			    <div class="col-md-12">
			        <!-- Custom Tabs -->
			        <div class="nav-tabs-custom">
			            <ul class="nav nav-tabs">
			                <li class="active"><a href="#tab_1" data-toggle="tab">Reports</a></li>
			                <li><a href="#tab_2" data-toggle="tab">Transaction</a></li>
			                <li><a href="#tab_3" data-toggle="tab">Customers</a></li>
			            </ul>
			            <div class="tab-content">
			                <div class="tab-pane active" id="tab_1">
			                	<div class="row">
			    					<div class="col-md-4">
			    						<div class="saleOverview">
			    							<h2>SALE OVERVIEW</h2>
			    							<p>$65.00</p>
			    							<div class="row">
			    								<div class="col-md-4">
			    									<p>1</p>
			    									<p>Customer</p>
			    								</div>
			    								<div class="col-md-4">
			    									<p>7</p>
			    									<p>Products</p>
			    								</div>
			    								<div class="col-md-4">
			    									<p>3</p>
			    									<p>Order</p>
			    								</div>
			    							</div>
			    						</div>
			    					</div>
			    					<div class="col-md-4">
			    					</div>
			    					<div class="col-md-4">
			    					</div>
			    				</div>
			                </div>
			                <!-- /.tab-pane -->
			                <div class="tab-pane" id="tab_2">
			                    The European languages are members of the same family. Their separate existence is a myth. For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ in their grammar, their pronunciation and their most common words. Everyone realizes why a new common language would be desirable: one could refuse to pay expensive translators. To achieve this, it would be necessary to have uniform grammar, pronunciation and more common words. If several languages coalesce, the grammar of the resulting language is more simple and regular than that of the individual languages.
			                </div>
			                <!-- /.tab-pane -->
			                <div class="tab-pane" id="tab_3">
			                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
			                </div>
			                <!-- /.tab-pane -->
			            </div>
			            <!-- /.tab-content -->
			        </div>
			        <!-- nav-tabs-custom -->
			    </div>
			    <!-- /.col -->

			</div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
</script>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       