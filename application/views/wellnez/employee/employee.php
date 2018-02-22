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
	.customerCenter .listWrapper {
	    background: #fff;
	    border: none;
	    box-shadow: 2px 0px 12px 0px rgba(68,68,68,1);
	    margin-bottom: 0;
	    border-radius: 10px;
	    float: left;
	    width: 100%;
	    padding: 15px;
	}
	.customerCenter .detailsWrapper {
		background: #fff;
	    border: none;
	    box-shadow: 2px 0px 12px 0px rgba(68,68,68,1);
	    margin-bottom: 0;
	    border-radius: 10px;
	    padding: 15px;
	}
	.customerCenter .k-icon.k-i-arrow-60-down{
		margin-top:  7px;
	}
	.customerCenter .listWrapper .results {
	    float: left;
	    height: 25px;
	    width: 100%;
	    background: #0077c5;
	    text-align: center;
	    line-height: 23px;
	}
	.customerCenter .listWrapper .table.table-condensed{
		float: left;
	    width: 99.3%;
	    color: #333;
	}
	.customerCenter .listWrapper .k-grid-content .k-virtual-scrollable-wrap table tr td .media-body span:first-child {
	    font-size: 12.5px;
	    color: #333;
	    text-align: left;
	}
	.customerCenter .listWrapper .k-grid-content .k-virtual-scrollable-wrap table tr td .media-body span:last-child {
	    font-size: 12.5px;
	    color: #333;
	    text-align: left;
	}
	.customerCenter .listWrapper .k-grid-content.k-auto-scrollable .k-virtual-scrollable-wrap table tr:hover .media-body span{
	    background: #0077c5 !important;
	    color: #fff;
	}
	.customerCenter .detailsWrapper .table.table-white {
	    background: #fff;
	    color: #333;
	    font-size: 13px;
	    margin-top: 15px;
	}
	.customerCenter .detailsWrapper .table.table-white tr th{
		text-transform: uppercase !important;
		background: #1c3b19;
		color: #fff;
	}
	.customerCenter .detailsWrapper .widget-head{
		margin-bottom: 10px;
	    float: left;
	    width: 100%;
	}
	.customerCenter .detailsWrapper .btn-inverse:hover,
	.customerCenter .detailsWrapper .btn-inverse:focus {
	    background: #424242;
   		border-color: #424242;
	    color: #fff;
	}
	.k-icon.k-i-seek-w,
	.k-icon.k-i-arrow-w,
	.k-icon.k-i-arrow-e,
	.k-icon.k-i-seek-e{
		margin-top: 5px;
	}
	.k-header .k-i-calendar{
		margin-top: 6px;
	}
	.customerCenter .detailsWrapper button{
		height: 30px;
		cursor: pointer;
	}
	.customerCenter .listWrapper a.addCustomer{
		padding: 8px;
	    width: 100%;
	    background: #0077c5;
	    color: #fff;
	    float: left;
	    text-align: center;
	}
</style>
<!-- ***************************
*	Water Section      	  *
**************************** -->
<script id="customerCenter" type="text/x-kendo-template">
	<div class="container">
		<div class="row customerCenter">
			<div class="span3">
				<div class="listWrapper">
					<div class="innerAll" style="width: 100%;float: left;background: #424242;">
						<form autocomplete="off" class="form-inline" style="margin-bottom: 0;">
							<div class="widget-search separator bottom"  style="padding-bottom: 0;">
								<button style="height: 34px;" type="button" class="btn btn-default pull-right" data-bind="click: search"><i class="icon-search"></i></button>
								<div class="overflow-hidden">
									<input style="height: 34px;" type="search" placeholder="Employee ..." data-bind="value: searchText, events:{change: enterSearch}">
								</div>
							</div>
							<!-- <div class="select2-container" style="width: 100%;">
							</div> -->
						</form>					
					</div>
					
					<div class="results">
						<span data-bind="text: contactDS.total"></span>
						<span data-bind="text: lang.lang.found_search"></span>
					</div>

					<div class="table table-condensed" style="height: 580px;"
						 data-role="grid" 
						 data-bind="source: contactDS"
						 data-auto-bind="false" 
						 data-row-template="employeeCenter-customer-list-tmpl"
						 data-columns="[{title: ''}]"
						 data-selectable=true
						 data-height="600"
						 data-scrollable="{virtual: true}">
						 
					</div>
				</div>
			</div>
			<div class="span9" style="padding-left: 0">
				<div class="detailsWrapper">
					<div class="row">
						<div class="span6">
							<div class="widget widget-4 widget-tabs-icons-only margin-bottom-none">

							    <!-- Widget Heading -->
							    <div class="widget-head">

							        <!-- Tabs -->
							        <ul class="pull-right">
							        	<li style="font-size: large; color: black; font-weight: bold;">
							            	<span data-bind="text: obj.number"></span>
							            	
							            	<span data-bind="text: obj.fullname"></span>
							            </li>
							            <li class="glyphicons text_bigger active"><span data-toggle="tab" data-target="#tab1-7"><i></i></span>
							            </li>							           
							            <li class="glyphicons riflescope"><span data-toggle="tab" data-target="#tab2-7"><i></i></span>
							            </li>							            
							            <li class="glyphicons circle_info"><span data-toggle="tab" data-target="#tab3-7"><i></i></span>
							            </li>							            
							            <li class="glyphicons pen"><span data-toggle="tab" data-target="#tab4-7"><i></i></span>
							            </li>
							            <li class="glyphicons edit"><span data-bind="click: goEditContact"><i></i></span>
							            </li>							            							            							            
							        </ul>
							        <div class="clearfix"></div>
							        <!-- // Tabs END -->

							    </div>
							    <!-- Widget Heading END -->

							    <div class="widget-body">
							        <div class="tab-content">

							            <!-- Transactions Tab content -->
							            <div id="tab1-7" class="tab-pane active ">
							            	<div class="box-generic" style="padding: 5px;">
								            	<table class="table table-borderless table-condensed cart_total">
									            	<tr>
									            		<td width="50%">
									            			<span class="btn btn-block btn-primary" data-bind="click: goCashadvance">Cash Advance</span>
									            		</td>
									            		<td width="50%">
									            			<span class="btn btn-block btn-primary" data-bind="click: goExpense">Expense</span>								            			
									            		</td>
									            	</tr>
								            	</table>
								            </div>
							            </div>
							            <!-- // Transactions Tab content END -->

							            <!-- SEARCH Tab content -->
							            <div id="tab2-7" class="tab-pane ">
							            	<div class="box-generic" style="padding: 10px;">
								                <input data-role="dropdownlist"
								                	   data-auto-bind="false"
							            			   data-option-label="Select Customer Type..."					            			   		                   
									                   data-value-primitive="true"
									                   data-text-field="name"
									                   data-value-field="id"
									                   data-bind="value: contact_type_id,
									                              source: contactTypeDS"
									                   style="width: 100%; height: 35px;"/>

								                <input data-role="dropdownlist"
							            			   data-option-label="Select Currency..."
							            			   data-template="currency-list-tmpl"					            			   		                   
									                   data-value-primitive="true"
									                   data-text-field="code"
									                   data-value-field="id"
									                   data-bind="value: currency_id,
									                              source: currencyDS"
									                   style="width: 100%; margin: 15px 0;height: 35px; "/>
									            <span style="width: 100px;" class="btn btn-primary btn-icon glyphicons search pull-right" data-bind="click: search"><i></i> <span data-bind="text: lang.lang.search">Search</span></span>
								        	</div>
								        </div>
							            <!-- // SEARCH Tab content END -->

							            <!-- INFO Tab content -->
							            <div id="tab3-7" class="tab-pane">
							            	<div class=" box-generic">
								            	<div class="row">
									            	<div class="span6">
											
														<!-- Bio -->
														<div class="widget widget-heading-simple widget-body-gray margin-none">
															<div class="widget-head">
																<h4 class="heading glyphicons user"><i></i> <span data-bind="text: obj.wnumber"></span> <span data-bind="text: obj.fullname"></span></h4>
															</div>
															<div class="widget-body">
																<ul class="unstyled icons margin-none">
																	<li class="glyphicons group"><i></i> <span data-bind="text: obj.contact_type"></span></li>
																	<li class="glyphicons phone"><i></i> <span data-bind="text: obj.phone"></span></li>
																	<li class="glyphicons envelope"><i></i> <span data-bind="text: obj.email"></span></li>
																	<li class="glyphicons calendar"><i></i> <span data-bind="text: obj.registered_date"></span></li>
																</ul>
															</div>
														</div>
														<!-- // Bio END -->
														
													</div>
													<div class="span6">
														<!-- Bio -->
														<div class="widget widget-heading-simple widget-body-gray margin-none">
															<div class="widget-head">
																<h4 class="heading glyphicons edit" data-bind="click: goEditContact"><i></i> <span data-bind="text: lang.lang.edit"></span></h4>
															</div>
															<div class="widget-body">
																<p><i class="icon-home"></i> <span data-bind="text: obj.address"></span></p>
															</div>
														</div>
														<!-- // Bio END -->
													</div>
												</div>
											</div>
							            </div>
							            <!-- // INFO Tab content END -->

							            <!-- NOTE Tab content -->
							            <div id="tab4-7" class="tab-pane ">
							            	<div class="box-generic">
											    <div class="chat-controls">
													<form class="margin-none">
														<div class="row">
															<div class="span10" style="padding-right: 0; width: 77% !important;">
																<input style="width: 100%; border: 1px solid #ccc; padding: 5px; float: left;" type="text" name="message" class="input-block-level margin-none" data-bind="value: note" placeholder="កំណត់Memo ...">
															</div>
															<div class="span2" style="width: 23%;">
																<span style="padding: 4px 15px; width: 100%; margin: 0;" class="btn btn-block btn-primary" data-bind="click: saveNote"><span data-bind="text: lang.lang.save">Save</span></span>
															</div>
														</div>
													</form>
												</div>
										    	<div data-role="grid"
										    	 	 data-height="100"
						 							 data-scrollable="{virtual: true}"
									                 data-row-template="customerCenter-note-tmpl"
									                 data-bind="source: noteDS"
									                 data-columns="[{title: ''}]">
									            </div>
											</div>
							            </div>
							            <!-- // NOTE Tab content END -->

							        </div>
							    </div>
							</div>
						</div>

						<div class="span6" style="padding-left: 0px;">
							<div class="row">
								<div class="span6" style="padding-right: 0">
									<div class="widget-stats widget-stats-primary widget-stats-5" data-bind="click: loadBalance" style="cursor: pointer; background: #0077c5; margin-left: 0; margin-bottom: 1px;">
										<span class="glyphicons coins"><i></i></span>
										<span class="txt">Total Advance<span data-bind="text: balance" style="font-size:medium;"></span></span>
										<div class="clearfix"></div>
									</div>
								</div>
								<div class="span6" style="padding-left: 0;">
									<div class="widget-stats widget-stats-inverse widget-stats-5" data-bind="click: loadDeposit" style="cursor: pointer; margin-left: 1px;">
										<span class="glyphicons briefcase"><i></i></span>
										<span class="txt">Sale<span data-bind="text: deposit" style="font-size:medium;"></span></span>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
								
							<div class="row">
								<div class="span6" style="padding-right: 0">
									<div class="widget-stats widget-stats-info widget-stats-5" data-bind="click: loadBalance" style="cursor: pointer; background: #21abf6; margin-left: 0; margin-bottom: 15px;">
										<span class="glyphicons circle_exclamation_mark"><i></i></span>
										<span class="txt"><span data-bind="text: outInvoice"></span> Open</span>
										<div class="clearfix"></div>
									</div>
								</div>
								<div class="span6" style="padding-left: 0;">
									<div class="widget-stats widget-stats-default widget-stats-5" data-bind="click: loadOverInvoice" style="cursor: pointer; margin-left: 1px;">
										<span class="glyphicons turtle"><i></i></span>
										<span class="txt"><span data-bind="text: overInvoice"></span> Over Due</span>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<div>
						<input id="sorter" name="sorter"
				    	   data-role="dropdownlist"
				           data-value-primitive="true"
				           data-text-field="text"
				           data-value-field="value"
				           data-bind="value: sorter,
				                      source: sortList" style="width: 17%" />
				                                   
				        <input id="sdate" name="sdate"
					           data-bind="value: sdate"
					           placeholder="From ..." />
				        
				       	<input id="edate" name="edate"
					           data-bind="value: edate"
					           placeholder="To ..." />

			            <button id="search" type="button" data-role="button" data-bind="click: searchTransaction"><i class="icon-search"></i></button>
					</div>

					<table class="table table-bordered table-striped table-white">
						<thead>
							<tr>
								<th>Date</th>
								<th>Type</th>
								<th>Reference No</th>
								<th>Amount</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
	            		<tbody data-role="listview"
	            				data-auto-bind="false"
				                data-template="customerCenter-transaction-tmpl"
				                data-bind="source: transactionDS" >
				        </tbody>
	            	</table>

		            <div id="pager" class="k-pager-wrap"
				    	 data-auto-bind="false"
			             data-role="pager" data-bind="source: transactionDS">
					</div>
				</div>			
			</div>
		</div>
	</div>	
</script>
<script id="employeeCenter-transaction-tmpl" type="text/x-kendo-tmpl">
    <tr>    	  	
    	<td>#=kendo.toString(new Date(issued_date), "dd-MM-yyyy")#</td>
    	<td>#=type#</td>
        <td>
        	#if(type=="Invoice" || type=="Cash_Sale" || type=="Quote" || type=="Sale_Order" || type=="GDN" || type=="Sale_Return"){#
				<a href="\#/#=type.toLowerCase()#/#=id#"><i></i> #=number#</a>						
			#}else{#
				#=number#
			#}#        	
        </td>
    	<td class="right">
    		#if(type=="GDN"){#
    			#=kendo.toString(amount, "n0")#
    		#}else{#
    			#=kendo.toString(amount, locale=="km-KH"?"c0":"c", locale)#
    		#}#
    	</td>
    	<td>        	
        	#if(type==="Invoice"){#
        		#if(status==="0" || status==="2") {#
        			# var date = new Date(), dueDate = new Date(due_date).getTime(), toDay = new Date(date).getTime(); #
					#if(dueDate < toDay) {#
						Over Due #:Math.floor((toDay - dueDate)/(1000*60*60*24))# days
					#} else {#
						#:Math.floor((dueDate - toDay)/(1000*60*60*24))# days to pay
					#}#
				#} else {#
					Paid
				#}#
        	#}else if(type==="Sale_Order" || type==="GDN"){#
        		#if(status==="0"){#
        			Open
        		#}else{#
        			Done        			
        		#}#
        	#}else if(type==="Quote"){#        		
        		#if(status==="0"){#
        			Open
        		#}else{#
        			Approved        			
        		#}#
        	#}#			
		</td>    	
    	<td align="center">
			#if(type==="Invoice"){#
				<a href="\#/invoice/#=id#"><i></i> Send</a>

				#if(status==="0" || status==="2"){#					
					| <a href="\#/cashier/#=id#"><i></i> Pay</a>
				#}#        	
			#}else if(type==="Sale_Order"){#
        		#if(status==="0"){#
        			
        		#}#
        	#}else if(type==="Quote"){#
        		<a href="\#/quote/#=id#"><i></i> Send</a>        		
        		#if(status==="0"){#
        			
        		#}#
        	#}else if(type==="GDN"){#        		
        		#if(status==="0"){#
        			
        		#}#
        	#}#
		</td>     	
    </tr>
</script>
<script id="employeeCenter-customer-list-tmpl" type="text/x-kendo-tmpl">
	<tr data-bind="click: selectedRow">
		<td>
			<div class="media-body">
				<span class="strong">
					#=number# #=fullname#				
				</span>
			</div>
		</td>
	</tr>
</script>
<script id="employeeCenter-note-tmpl" type="text/x-kendo-template">
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
<script id="employee" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">				
				<div id="example" class="k-content">

					<span class="glyphicons no-js remove_2 pull-right" 
	    				onclick="javascript:window.history.back()"
						data-bind="click: cancel"><i></i></span>

			        <h2>Employee</h2>

			        <br>				

			    	<div class="row-fluid">
			    		<div class="span6 well">

							<div class="row-fluid">

								<div class="span6">														
									<!-- Group -->
									<div class="control-group">										
										<label for="ddlContactType">Employee Type<span style="color:red">*</span></label>
										<input id="ddlContactType" name="ddlContactType"
											   data-role="dropdownlist"
											   data-option-label="(--- Select ---)"									                   
							                   data-value-primitive="true"
							                   data-text-field="name"
							                   data-value-field="id"
							                   data-bind="value: obj.contact_type_id,
							                   			  disabled: obj.is_pattern, 
							                              source: contactTypeDS,
							                              events:{change: contactTypeChanges}"
							                   required data-required-msg="required"
							                   style="width: 100%;" />									            
									</div>
									<!-- // Group END -->
								</div>

								<div class="span6">	
									<!-- Group -->
									<div class="control-group">							
										<label for="number"><span data-bind="text: lang.lang.number"></span> <span style="color:red">*</span></label>
				              			<input id="number" name="number" class="k-textbox"
					              				data-bind="value: obj.number, disabled: obj.is_pattern" 
					              				placeholder="e.g. ID0001" required data-required-msg="required"
					              				style="width: 100%;" />
					              		<span data-bind="visible: isDuplicateNumber" style="color: red;"><span data-bind="text: lang.lang.duplicate_number"></span></span>
									</div>
									<!-- // Group END -->											
								</div>
							</div>
							
							<div class="row-fluid">
								<div class="span6">						
									<!-- Group -->
									<div class="control-group">
										<label for="surname"><span data-bind="text: lang.lang.surname"></span> <span style="color:red">*</span></label>
					              		<input id="surname" name="surname" class="k-textbox" data-bind="value: obj.surname, disabled: obj.is_pattern" 
							              		placeholder="surname ..." required data-required-msg="required"
							              		style="width: 100%;" />
									</div>
									<!-- // Group END -->
								</div>

								<div class="span6">	
									<!-- Group -->
									<div class="control-group">								
										<label for="name"><span data-bind="text: lang.lang.name"></span> <span style="color:red">*</span></label>
							            <input id="name" name="name" class="k-textbox" data-bind="value: obj.name, disabled: obj.is_pattern" 
							              		placeholder="name ..." required data-required-msg="required"
							              		style="width: 100%;" />
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

						
						</div>
					</div>								
							
					<!-- // Inner Tabs -->
					<div class="row-fluid">								
						<div class="box-generic">
						    <!-- //Tabs Heading -->
						    <div class="tabsbar tabsbar-1">
						        <ul class="row-fluid row-merge">						            
						            <li class="span2 glyphicons usd active">
						            	<a href="#tab1" data-toggle="tab"><i></i> <span data-bind="text: lang.lang.account"></span></a>
						            </li>								           							            
						            <li class="span2 glyphicons nameplate_alt">
						            	<a href="#tab2" data-toggle="tab"><i></i> <span data-bind="text: lang.lang.info"></span></a>
						            </li>
						            <li class="span2 glyphicons paperclip">
						            	<a href="#tab3" data-toggle="tab"><i></i> <span data-bind="text: lang.lang.info"></span></a>
						            </li>
						            									           						            					            
						        </ul>
						    </div>
						    <!-- // Tabs Heading END -->

						    <div class="tab-content">
						        <!-- //ACCOUNTING INFO -->
						        <div class="tab-pane active" id="tab1">
						        	
						        	<div class="row-fluid">

						            	<div class="span3">													
											<!-- Group -->
											<div class="control-group">										
												<label for="ddlAD">Advance Account<span style="color:red">*</span></label>
												<input id="ddlAD" name="ddlAD"
													   data-role="dropdownlist"
													   data-header-template="account-header-tmpl"
													   data-option-label="(--- Select ---)"											                   
									                   data-value-primitive="true"
									                   data-text-field="name"
									                   data-value-field="id"
									                   data-bind="value: obj.account_id,
									                              source: adDS"
									                   required data-required-msg="required"											                              
									                   style="width: 100%;" />									            
											</div>
											<!-- // Group END -->													
										</div>												
										<div class="span3">
											<!-- Group -->
											<div class="control-group">
												<label for="ddlSA">Salary Account<span style="color:red">*</span></label>
												<input id="ddlSA" name="ddlSA"
													   data-role="dropdownlist"
													   data-option-label="(--- Select ---)"											                   
									                   data-value-primitive="true"
									                   data-text-field="name"
									                   data-header-template="account-header-tmpl"
									                   data-value-field="id"
									                   data-bind="value: obj.salary_account_id,
									                              source: saDS"
									                   required data-required-msg="required"											                              
									                   style="width: 100%;" />
										    </div>
											<!-- // Group END -->	
										</div>
										<div class="span3">
											<!-- Group -->
											<div class="control-group">
												<label for="currency"><span data-bind="text: lang.lang.currency"></span> <span style="color:red">*</span></label>
									            <input id="currency" name="currency" 
									            	data-role="dropdownlist"
									            	data-value-primitive="true"
									                data-text-field="code"
									                data-value-field="id"
													data-bind="value: obj.currency_id, source: currencyDS"
													data-option-label="(--- Select ---)" 
													required data-required-msg="required" style="width: 100%;" />
											</div>													
										</div>																																				
							        </div>	
							        <div class="separator line bottom"></div>
					        	</div>
						        <!-- //ACCOUNTING INFO END -->								        

						        <!-- //GENERAL INFO -->
						        <div class="tab-pane" id="tab2">
					            	<table class="table table-borderless table-condensed cart_total">						            	
					            		<tr>
							                <td><span data-bind="text: lang.lang.status"></span> <span style="color:red">*</span></td>
							              	<td>
							              		<input id="customerStatus" name="customerStatus" 
							              				data-role="dropdownlist"
									            		data-text-field="name"
						           						data-value-field="id"
						           						data-value-primitive="true" 
									            		data-bind="source: statusList, value: obj.status"
									            		data-option-label="(--- Select ---)"
									            		required data-required-msg="ត្រូវការ ស្ថានភាព" />
							              	</td>							              	
							            	<td><span data-bind="text: lang.lang.register_date"></span> <span style="color:red">*</span></td>
							              	<td>
							              		<input id="registered_date" name="registered_date" 
								            		data-role="datepicker"			            		
					            					data-bind="value: obj.registered_date" 
					            					data-format="dd-MM-yyyy"
					            					data-parse-formats="yyyy-MM-dd" 
					            					placeholder="dd-MM-yyyy" required data-required-msg="required" />
							              	</td>
							            </tr>									            
							            <tr>
							                <td><span data-bind="text: lang.lang.email"></span></td>
							              	<td><input class="k-textbox" data-bind="value: obj.email" placeholder="e.g. me@email.com" /></td>							              	
							            	<td><span data-bind="text: lang.lang.phone"></span></td>
							              	<td><input class="k-textbox" data-bind="value: obj.phone" placeholder="e.g. 012 333 444" /></td>
							            </tr>									           							            
							            <tr>
							            	<td><span data-bind="text: lang.lang.address"></span></td>
							              	<td><input class="k-textbox" data-bind="value: obj.address" placeholder="where you live ..." />							              	
							            	<td><span data-bind="text: lang.lang.memo"></span></td>
							              	<td><input class="k-textbox" data-bind="value: obj.memo" placeholder="memo ..." /></td>
							            </tr>
							            <tr>
							            	<td><label for="txtBillTo" data-bind="click: copyBillTo"><span data-bind="text: lang.lang.bill_to"></span> <i class="icon-share"></i></label></td>
							              	<td><input class="k-textbox" data-bind="value: obj.bill_to" placeholder="bill to ..." />							              	
							            	<td><span data-bind="text: lang.lang.ship_to"></span></td>
							              	<td><input class="k-textbox" data-bind="value: obj.ship_to" placeholder="ship to ..." /></td>									              	
							            </tr>							            							            								            								            			            
							        </table>
					        	</div>
						        <!-- //GENERAL INFO END -->	
						        <div class="tab-pane" id="tab3">	
						        	<input name="files"
					                   type="file"
					                   data-role="upload"
					                   data-async="{ saveUrl: 'save', removeUrl: 'remove', autoUpload: false }">								     
						        </div>						        
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
							<div class="span3">
								
							</div>
							<div class="span9" align="right">
								<span id="saveNew" class="btn btn-icon btn-primary glyphicons ok_2" data-bind="invisible: isEdit" style="width: 80px;"><i></i> Save New</span>
								<span id="saveClose" class="btn btn-icon btn-success glyphicons power" style="width: 80px;"><i></i> Save Close</span>
								<span class="btn btn-icon btn-warning glyphicons remove_2" onclick="javascript:window.history.back()" data-bind="click: cancel" style="width: 80px;"><i></i> Cancel</span>
								<span class="btn btn-danger btn-icon glyphicons bin" data-bind="click: openConfirm, visible: isEdit" style="width: 80px;"><i></i> Delete</span>					
							</div>
						</div>
					</div>
					<!-- // Form actions END -->	          					                
			    											
				</div> <!-- // End div example-->  
			</div> <!-- // End div span12-->
		</div> <!-- // End div row-fluid-->	
	</div> 	 
</script>
<script id="employee-contact-person-row-tmpl" type="text/x-kendo-tmpl">
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