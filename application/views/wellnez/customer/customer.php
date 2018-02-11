<div id="wrapperApplication" class="wrapper"></div>
<!--load before somthing not yet done -->
<div id="holdpageloadhide" style="display:block;text-align: center;position: fixed;top: 0; left: 0;width: 100%; height: 100%;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
	<i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 45%;left: 45%"></i>
</div>
<!-- template section starts -->
<script type="text/x-kendo-template" id="layout">	
	<div id="content"></div>
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
                <a class="navbar-brand" href="<?php echo base_url();?>wellnez" >
                    <img src="<?php echo base_url();?>assets/spa/logo.png" >
                </a>
            </div>
            <div class="row" style="margin-right:0 ;">
	            <div class="col-sm-4 col-md-4" style="padding: 0;">
		            <form class="navbar-form pull-left  hidden-xs" >
					  	<input type="text" class="span2 search-query" placeholder="Search" id="search-placeholder" 
					  			data-bind="value: searchText" 
					  			style="background-color: #fff; color: #ffffff; border-color: #333333; height: 33px;">
					  	<button type="submit" class="btn btn-inverse" data-bind="click: search"><i class="icon-search"></i></button>
					</form>
				</div>
				<div class="hidden-sm col-md-3">
				</div>
				<!-- Menu rigth Desktop -->
				<div class="col-sm-4 col-md-3" style="float: right; padding: 0;">
					<ul class="menu-right  topnav pull-right hidden-xs">
						<li role="presentation" class="setting dropdown">
					  		<a style="color: #fff;" class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><span class="right-user-name" data-bind="text: getUsername"></span></a>
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
		    					<!-- <li>
									<a href='#/setting' >
										<i class="icon-power-off"></i>
										<span>Setting</span>
									</a>
								</li> -->
								<li class="divider"></li>
								<li>
									<a href="#/manage" data-bind="click: logout">
										<i class="icon-power-off"></i>
										<span>Logout</span>
									</a>
								</li>
				  			</ul>
					  	</li>
					  	<!-- <li role="presentation" class="dropdown multitasklist">
					  		<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
					  			<i class="icon-th-list"></i>
					  		</a>
				  			<ul class="dropdown-menu ul-multiTaskList" data-template="multiTaskList-row-template" data-bind="source: multiTaskList">  				  				
				  			</ul>
					  	</li> -->
					  	<li class="question">
					  		<a style="padding-top: 0;" class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
					  			<i class="icon-question icon-question1"></i>
					  		</a>
					  		<ul class="dropdown-menu" style="width: 408px !important; left: -295px !important; margin-top: 0; padding-bottom: 0; border: none;">
					  			
					  			<div class="middle-help" style="background: #f4f4f4; padding: 20px 20px 20px; text-align: left; display: inline-block; width: 100%;">
					  				<div class="more-help" style="border-bottom: 1px solid #ddd; margin-bottom: 10px; width: 100%; float: left; padding-bottom: 10px;">
				  						<div class="help-img" style="margin-right: 20px; float: left;">
				  							<img src="http://fpoimg.com/51x51?text=Picture%201">
				  						</div>
				  						<div class="help-desc" style="float: left;">
				  							<p>Need more help?</p>
				  							<a href="" target="_blank">Help Center</a>
				  						</div>
				  					</div>
				  					<div class="what-help" style="width: 100%; float: left;">
				  						<div class="help-img" style="margin-right: 20px; float: left;">
				  							<img src="http://fpoimg.com/51x51?text=Picture%202">
				  						</div>
				  						<div class="help-desc">
				  							<p>Check out what's new</p>
				  							<a href="" target="_blank">Learn about new product features</a>
				  						</div>
				  					</div>
					  			</div>
					  			
					  		</ul>
					  	</li>
					  	<li class="icon-setting">
					  		<a href="#/setting" class="glyphicons settings">
					  			<i class="text-t"></i>
					  		</a>
					  	</li>
					  	<li class="iconbell">
					  		<a href="">
					  			<i class="icon-bell"></i>
					  		</a>
					  	</li>
					  	
					</ul>
				</div>
			</div>
			<!-- Secondary Menu -->
			<!-- <ul class="topnav hidden-xs " id="secondary-menu">
			</ul> -->

            <!-- Menu Phone -->
            <div class="menu-phone collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav hidden-lg hidden-md hidden-sm">
                	<li><a data-toggle="collapse" data-target=".navbar-collapse.in" href='#/' class='glyphicons show_big_thumbnails'><i></i><span >Dashnboard</span></a></li>
				  	<!-- <li><a data-toggle="collapse" data-target=".navbar-collapse.in" href='#/center'><span data-bind="text: lang.lang.center"></span></a></li>
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
				  	</li> -->
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
<style >
	#productListView{
		border: none;
	}
	.demo-section.span12{
		padding: 15px;
		margin-bottom: 1px;
		background: #0eac00;
	}
	.product {
	    float: left;
	    position: relative;
	    width: 99px;
	    height: 180px;
	    padding: 15px;
	    cursor: pointer;
	    background: #fff;
	    margin-right: 2px;
	    margin-bottom: 1px;
	}
	.listWrapper{
		padding-right: 0;
		width: 47%;
	}
	.product img {	    
	    height: 110px;
	    margin-bottom: 5px;
	    border-bottom: 1px solid #0eac00;
	    width: 100%;
	    padding-bottom: 15px;
	}
	.product h3 {
	    margin: 0 auto;
	    width: 75%;
	    overflow: hidden;
	    line-height: 1.5em;
	    font-size: .9em;
	    text-transform: uppercase;
	    color: #333;
	    font-weight: 700;
	    text-align: center;
	    height: 35px;
	}
	.topnav.addNew {
	    display: inline-block;
	    background: #203864;
	    padding: 3px 10px 3px 10px;
	    margin: 0;
	    line-height: 23px;
	    border: 1px solid #fff;
	    border-radius: 3px;
	}
	.topnav.addNew li {
	    list-style: none;
	}
	.topnav.addNew li a {
	    color: #fff;
	}
	#posProductList {
	    overflow: scroll;
	    border: #ccc 1px solid;
	    background: #fff;
	    padding: 15px;
	    box-shadow: 2px 0px 12px 0px rgba(68,68,68,1);
	}
	.costom-grid {
	    clear: both;
	    margin-bottom: 15px;
	    border-radius: 0px;
	    border-width: 1px 0px 2px 0px;
	    border-style: solid;
	    border-color: rgb(221, 221, 221);
	    overflow-x: auto;
	    overflow-y: auto;
	}
	.costom-grid table tr th {
	    font-weight: 700 !important;
	    font-size: 13px !important;
	    background: #1c3b19 !important;
	    color: #fff;
	}
	.table-condensed tr td {
	    border: none !important;
	}
	.table-condensed th, .table-condensed td {
	    padding: 5px 5px 5px 10px !important;
	}
	.table-striped tbody tr:nth-child(odd) td, 
	.table-striped tbody tr:nth-child(odd) th {
	    background: #f4f5f8 !important;
	}
	.btn-center-text {
	    background: #213863;
	    display: flex;
	    align-items: center;
	    justify-content: space-around;
	    border-radius: 5px !important;
	}
	#pager{
		margin-top: 15px;
	    float: left;
	    width: 98.2%;
	}
	.pos table.table-customer th{
		background: #1c3b19;
		
	}
	.pos table th{
		background: #203864 ;
	}
	@media (min-width: 768px){
		html.no-touch.sticky-top:not(.animations-gpu) #content {
		    padding-top: 0;
		}
	}
	.botton .button-service{
		background: #0eac00;
	    padding: 10px;
	    float: left;
	    width: 100%;
	    border-radius: 5px 5px 0 0;
	    margin-bottom: 1px;
	    cursor: pointer;
	    box-shadow: 2px 0px 12px 0px rgba(68,68,68,1);
	}
	.botton .button-service .img{
		width: 40px;
	    float: left;
	    margin-right: 15px;
	    margin-left: 30px;
	}
	.botton .button-service .img img{
		width: 100%
	}
	.botton .button-service p{
		font-size: 27px;
	}
	
	.botton .button-book{
		background: #0eac00;
	    padding: 13px;
	    border-radius: 0 0 0 5px;
	    cursor: pointer;
	    box-shadow: 2px 0px 12px 0px rgba(68,68,68,1);
	}
	.botton .button-book .img{
		width: 38px;
	    margin-left: 8px;
	    margin-bottom: 4px;
	}
	.botton .button-book .img img{
		width: 100%
	}
	.botton .button-book p{
		margin-bottom: 0;
	}

	.botton .button-pay{
		background: #0eac00;
	    padding: 17px 17px 10px 17px;
	    text-align: center;
	    margin-left: 1px;
	    text-align: center;
	    cursor: pointer;
	    box-shadow: 2px 0px 12px 0px rgba(68,68,68,1);
	}
	.botton .button-pay .img{
		width: 38px;
	    margin-left: 8px;
	    margin-bottom: 4px;
	}
	.botton .button-pay .img img{
		width: 100%
	}
	.botton .button-pay p{
		margin-bottom: 0
	}
	.button-cancel{
		background: #1c3b19;
	    width: 100%;
	    text-align: center;
	    margin-left: 1px;
	    margin-bottom: 0;
	    border-radius: 0 0 5px 0;
	    line-height: 39px;
	    cursor: pointer;
	    box-shadow: 2px 0px 12px 0px rgba(68,68,68,1);
	}
	.button-cancel span{
		font-size: 45px;
	    padding: 5px;
	    float: left;
	    width: 100%;
	}
	.listWrapper{
		background: #0eac00;
	    padding: 0 0 15px 0;
	    margin-bottom: 1px;
	    width: 100%;
	    float: left;
	    border-radius: 20px 20px 0 0;
	    box-shadow: 2px 0px 12px 0px rgba(68,68,68,1);
	}
	.table.table-white {
	    background: #fff;
	    color: #333;
	}
</style>
<!-- ***************************
*	Water Section      	  *
**************************** -->
<script id="customerCenter" type="text/x-kendo-template">
	<div class="widget widget-heading-simple widget-body-gray widget-employees">		
		<div class="widget-body padding-none">			
			<div class="row-fluid row-merge">
				<div class="span3 listWrapper" >
					<div class="innerAll">							
						<form autocomplete="off" class="form-inline">
							
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
			            <!-- // Delete Confirmation -->

						<div class="row">
							<div class="span4"></div>
							<!-- <div class="span4" style="padding-left: 15px;"><a style="color: #fff; float: left;">Print Preview</a></div> -->
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
								<!-- <span class="btn-btn" data-bind="invisible: isEdit"><span data-bind="text: lang.lang.save_new"></span></span>
								<span class="btn-btn"><span data-bind="text: lang.lang.save_close"></span></span>
								<span class="btn-btn"><span data-bind="text: lang.lang.save_print"></span></span> -->
							</div>
						</div>
					</div>
					<!-- // Form actions END -->

				</div>
			</div>
		</div>
	</div>
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
<script id="account-list-tmpl" type="text/x-kendo-tmpl">	
	<span>
		#=number#				
	</span>
	-
	<span>#=name#</span>
</script>