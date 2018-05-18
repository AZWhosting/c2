<div id="wrapperApplication" class="wrapper"></div>
<!--load before somthing not yet done -->
<div id="holdpageloadhide" style="display:block;text-align: center;position: fixed;top: 0; left: 0;width: 100%; height: 100%;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
	<i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 45%;left: 45%"></i>
</div>
<!-- template section starts -->
<script type="text/x-kendo-template" id="layout">
	<!-- <div id="menu" class="menu"></div> -->
	<div id="content" ></div>
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
								<li class="divider"></li>
								<li>
									<a href="#/manage" data-bind="click: logout">
										<i class="icon-power-off"></i>
										<span>Logout</span>
									</a>
								</li>
				  			</ul>
					  	</li>
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
<style>
	@media (min-width: 768px){
		html.no-touch.sticky-top:not(.animations-gpu) #content {
		    padding-top: 0;
		}
	}
	.pay .example{
		background: #0eac00;
	    width: 100%;
	    text-align: center;
	    position: relative; 
	    padding: 15px;
	    border-radius: 10px;
	    float: left;
	    box-shadow: 2px 0px 12px 0px rgba(68,68,68,1);	    
	}
	.pay .example table{
		width: 100%;
	    background: #fff;
	    float: left;
	    color: #333;
	    border: 1px solid #ddd;
	    text-align: left;
	}
	.pay .example table tr th, 
	.pay .example table tr td {
	    padding: 8px;
	    border: 1px solid #ddd;
	}
	.pay .example table th {
	    text-transform: uppercase;
	    background: #1c3b19;
	    color: #fff;
	}
	
</style>
<!-- ***************************
*	Water Section      	  *
**************************** -->
<script id="Index" type="text/x-kendo-template">
	<div class="container">
		<div class="row ">
			<style type="text/css">
				.table-striped tbody tr.k-state-selected td {
					background: #ccc!important;
				}
				.table-white th span, .table-white td {
					font-size: 12px;
				}
			</style>
			<div class="span12">
				<div class="hidden-print hidden-lg hidden-md pull-right">
		    		<span class="glyphicons no-js remove_2" 
						data-bind="click: cancel"><i></i></span>
				</div>
				<div class="row" style="overflow: hidden;background: #fff; float: left; width: 100%; padding: 15px; border-radius: 10px;position: relative;">
					<div id="loadING" style="display:none;text-align: center;position: absolute;top: 0; left: 0;width: 100%; height: 100%;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
						<i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 45%;left: 45%">Loading</i>
					</div>
					<div class="span6">
						<div class="row" >
							<div class="widget widget-heading-simple widget-body-primary widget-employees">
								<div class="widget-body padding-none" style="background: none; width: 100%; float: left; border: none; padding: 0;">
									<div class="row-fluid row-merge">
										<div class="listWrapper" style="min-height: 0; margin-bottom: 15px; padding: 0;">
											<div class="innerAll" style="padding: 15px 15px 0;overflow: hidden; background: #424242;">
												<div class="widget-search separator bottom" data-bind="visible: haveSearchInv">
													<button class="btn btn-default pull-right" data-bind="click: search" style="padding: 3px 12px;"><i class="icon-search"></i></button>
													<div class="overflow-hidden">
														<input style="line-height: 11px; padding: 5px;" type="text" placeholder="Invoice Number..." data-bind="
															value: searchText,
															events: {change: search}
														">
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<table class="table table-bordered table-primary table-striped table-vertical-center" style="margin-top: 0px; color: #333;">
						        <thead>
						            <tr>
						            	<th style="vertical-align: top; background: #1c3b19;" data-bind="text: lang.lang.number"></th>
						            	<th style="vertical-align: top; background: #1c3b19;" >Room</th>
						            	<th style="vertical-align: top; background: #1c3b19;" data-bind="text: lang.lang.amount"></th>
						            </tr>
						        </thead>
						        <tbody data-role="listview" 
					        		data-template="invoice-list-template" 
					        		data-auto-bind="true"
					        		data-selectable="true"
					        		data-bind="source: invoiceDS">
					        	</tbody>
						    </table>
						</div>
					</div>
					<div class="span6" style="padding-right: 0;">
						<!--Show Card-->
						<div class="rowloyalty" data-bind="visible: haveLoyalty" style="width: 97.3%; height: 100%; background: #fff; position: absolute; z-index: 1;">
							<div class="strong" style="margin-bottom: 15px; width: 100%; padding: 15px; float: left;" align="center"
								data-bind="style: { backgroundColor: amtDueColor}">
								<div>
								    <div class="tab-content">
								        <div class="tab-pane active" id="tab1">
							            	<div class="row">
												<div class="span7">
													<p style="float: left;color: #333;">Card</p>
													<input type="text" name="" style="width: 100%; font-weight: 500; border: 1px solid #ccc; padding: 5px; height: 35px; color: #333;"
														data-role="maskedtextbox"
							                   			data-mask="LL0-000-000-000"
							                   			data-bind="
							                        		value: cardNum"
													/>
												</div>
												<div class="span5" style="padding-left: 0;">
													<p style="float: left;color: #333;">Serial Number</p>
													<input type="number" style="width: 100%; font-weight: 500; border: 1px solid #ccc; padding: 5px; height: 35px; color: #333;"
														data-role="maskedtextbox"
							                   			data-mask="0000"
														data-bind="value: serialNum"
													/>
												</div>
												<div style="overflow: hidden;position: relative;clear: both;">
													<a style="background: #0eac00; padding: 10px 15px; float: left; margin-right: 10px; color: #fff; margin-top: 10px; margin-left: 15px;" class="btnApply" data-bind="click: searchLoyalty" >
											  			<span>Search</span>
											  		</a>
											  		<a style="background: #0eac00; padding: 10px 15px; float: left; color: #fff; margin-top: 10px;" class="btnCancel" data-bind="click: cancelLoyalty" >
											  			<span>Cancel</span>
											  		</a>
											  	</div>
										  		<div class="span12" style="overflow: hidden;position: relative;clear: both;margin-top: 15px;" data-bind="visible: haveCardLoyalty">
													<table class="table table-bordered table-striped table-white">
														<thead>
															<tr>
																<th style="background: #1c3b19;"><span style="color: #fff;">No.</span></th>
																<th style="background: #1c3b19;"><span style="color: #fff;">Name</span></th>
																<th style="background: #1c3b19;"><span style="color: #fff;">Base</span></th>
																<th style="background: #1c3b19;"><span style="color: #fff;">Rewards</span></th>
																<th style="background: #1c3b19;"><span style="color: #fff;">Action</span></th>
															</tr>
														</thead>
														<tbody data-role="listview"
									            				data-auto-bind="false"
												                data-template="card-loyalty-list-tmpl"
												                data-bind="source: loyaltyDS" >
												        </tbody>
									            	</table>
												</div>
											</div>
							        	</div>

								        <div class="tab-pane" id="tab2">
								        	<div class="row">
												<div class="span12">
													<input type="text" name="" style="width: 100%; font-weight: 500; border: 1px solid #ccc; padding: 5px; height: 35px; color: #333;" data-bind="value: promoNum">
												</div>
												<a style="background: #0eac00; padding: 10px 15px; float: left; margin-right: 10px; color: #fff; margin-top: 10px; margin-left: 15px;" class="btnApply" data-bind="click: applyLoyaltyPromo" >
										  			<span>Apply</span>
										  		</a>
										  		<a style="background: #0eac00; padding: 10px 15px; float: left; color: #fff; margin-top: 10px;" class="btnCancel" data-bind="click: cancelLoyalty" >
										  			<span>Cancel</span>
										  		</a>
											</div>
							        	</div>								        
								    </div>
								</div>								
							</div>
						</div>	
						<!--Show Delete-->
						<div class="rowloyalty" data-bind="visible: haveDelete" style="width: 97.3%; height: 100%; background: #fff; position: absolute; z-index: 1;">
							<div class="strong" style="margin-bottom: 15px; width: 100%; padding: 15px; float: left;" align="center"
								data-bind="style: { backgroundColor: amtDueColor}">
								<div>
								    <div class="tab-content">
								        <div class="tab-pane active" id="tab1">
							            	<div class="row">
												<div class="span7">
													<p style="float: left;color: #333;">Password</p>
													<input type="password" name="" style="width: 100%; font-weight: 500; border: 1px solid #ccc; padding: 5px; height: 35px; color: #333;"
							                   			data-bind="value: delPassword"
													/>
												</div>
												<div class="span5" style="padding-left: 0;">
													<p style="float: left;color: #333;">Invoice Number</p>
													<input type="number" style="width: 100%; font-weight: 500; border: 1px solid #ccc; padding: 5px; height: 35px; color: #333;"
														data-bind="value: delInvNumber, enabled: False"
													/>
												</div>
												<div style="overflow: hidden;position: relative;clear: both;">
													<a style="background: #0eac00; padding: 10px 15px; float: left; margin-right: 10px; color: #fff; margin-top: 10px; margin-left: 15px;" class="btnApply" data-bind="click: delApply" >
											  			<span>Submit</span>
											  		</a>
											  		<a style="background: #0eac00; padding: 10px 15px; float: left; color: #fff; margin-top: 10px;" class="btnCancel" data-bind="click: delCancel" >
											  			<span>Cancel</span>
											  		</a>
											  	</div>
										  		<div class="span12" style="overflow: hidden;position: relative;clear: both;margin-top: 15px;" data-bind="visible: haveCardLoyalty">
													<table class="table table-bordered table-striped table-white">
														<thead>
															<tr>
																<th style="background: #1c3b19;"><span style="color: #fff;">No.</span></th>
																<th style="background: #1c3b19;"><span style="color: #fff;">Name</span></th>
																<th style="background: #1c3b19;"><span style="color: #fff;">Base</span></th>
																<th style="background: #1c3b19;"><span style="color: #fff;">Rewards</span></th>
																<th style="background: #1c3b19;"><span style="color: #fff;">Action</span></th>
															</tr>
														</thead>
														<tbody data-role="listview"
									            				data-auto-bind="false"
												                data-template="card-loyalty-list-tmpl"
												                data-bind="source: loyaltyDS" >
												        </tbody>
									            	</table>
												</div>
											</div>
							        	</div>

								        <div class="tab-pane" id="tab2">
								        	<div class="row">
												<div class="span12">
													<input type="text" name="" style="width: 100%; font-weight: 500; border: 1px solid #ccc; padding: 5px; height: 35px; color: #333;" data-bind="value: promoNum">
												</div>
												<a style="background: #0eac00; padding: 10px 15px; float: left; margin-right: 10px; color: #fff; margin-top: 10px; margin-left: 15px;" class="btnApply" data-bind="click: applyLoyaltyPromo" >
										  			<span>Apply</span>
										  		</a>
										  		<a style="background: #0eac00; padding: 10px 15px; float: left; color: #fff; margin-top: 10px;" class="btnCancel" data-bind="click: cancelLoyalty" >
										  			<span>Cancel</span>
										  		</a>
											</div>
							        	</div>								        
								    </div>
								</div>								
							</div>
						</div>	
						<div class="strong" style="margin-bottom: 15px; width: 100%; padding: 10px; float: left;" align="center"
							data-bind="style: { backgroundColor: amtDueColor}">
							<p style="float: left;color: #333;">Amount Recevied</p>
							<input type="text" name="" style="width: 100%; font-weight: 500; border: 1px solid #ccc; padding: 5px; height: 35px; color: #333;" data-bind="value: amountReciept, enabled: False">
						</div>

						<div class="box-generic-noborder" style="margin-bottom: 15px; padding-bottom: 0; float: left;width: 100%">
						    <div class="tab-content" style="padding: 10px;">
						    	<!-- Options Tab content -->
						        <div class="tab-pane active" id="tab1-1">
						            <table style="margin-bottom: 0; color: #333;" class="table table-borderless table-condensed cart_total">
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
							            	<td><span data-bind="text: lang.lang.cash_account"></span></td>
						            		<td>
												<input
													data-role="dropdownlist"
						              				data-value-primitive="true"
													data-text-field="name" 
						              				data-value-field="id"
						              				data-bind="value: account_id,
						              					source: accountDS"
						              				data-option-label="Select Account..."
						              				required data-required-msg="required" 
						              				style="width: 100%" />
											</td>
							            </tr>
						            </table>
						        </div>
						    </div>
						</div>
			            <div class="row">
							<div class="col-xs-12 col-sm-5"> 
								<div class="btn-group">
									<div class="leadcontainer">
									</div>
								</div>
								<br>
							</div>
							<div class="col-xs-12 col-sm-7">
								<table class="table table-condensed table-striped table-white" style="color: #333;">
									<tbody>
										<tr>
											<td class="right"><span data-bind="text: lang.lang.total_received"></span>:</td>
											<td class="right strong"><span data-bind="text: amountReciept"></span></td>
											<td class="right"><span data-bind="text: lang.lang.total_discount"></span>:</td>
											<td class="right strong">
												<span data-format="n2" data-bind="text: invobj.discount"></span>
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
							<div class="col-xs-12 col-sm-12 col-md-12">
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
							    <div class="row-fluid">
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
						<div class="box-generic bg-action-button" data-bind="visible: btnActive">
							<div id="ntf1" data-role="notification"></div>
							<div class="row">
								<div class="col-sm-12" align="right">
									<span class="btn-btn" data-bind="visible: btnActive, click: payBill" ><span data-bind="text: lang.lang.pay"></span></span>
									<span class="btn-btn" data-bind="visible: btnActive, click: addLoyalty" ><span>Apply Card</span></span>
									<span class="btn-btn" data-bind="visible: btnActive, click: splitBill" ><span>Split Bill</span></span>
									<span class="btn-btn" data-bind="visible: btnActive, click: printBill" ><span>Print Bill</span></span>
									<span class="btn-btn" data-bind="click: cancelInvoice" ><span data-bind="text: lang.lang.delete"></span></span>	
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="splitBill" type="text/x-kendo-template">
	<div class="container">
		<div class="row ">
			<div class="span12">
				<div class="box-generic" style="border-radius: 10px;padding: 0px;overflow: hidden;">
					<div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;background: rgba(142, 159, 167, 0.8);z-index: 999999;border-radius: 10px;">
						<i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 40%;left: 40%">Loading</i>
					</div>
				    <div class="tabsbar tabsbar-1">
				        <ul class="row-fluid row-merge">
				            <li class="span2 glyphicons nameplate_alt active">
				            	<a href="#tab1" data-toggle="tab"><i></i> <span>Item</span></a>
				            </li>
				            <li class="span2 glyphicons usd">
				            	<a href="#tab2" data-toggle="tab"><i></i> <span>Person</span></a>
				            </li>
				        </ul>
				    </div>
				    
				    <div class="tab-content">
				        <div class="tab-pane active" id="tab1" style="overflow: hidden;position: relative;">
				        	<div  data-bind="visible: stopItemM" style="border-radius: 10px;text-align: center;position: absolute;width: 100%; height: 100%;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
								<i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 40%;left: 25%">You can't use this module...</i>
							</div>
			            	<div class="span12">
			            		<div class="rows">
				            		<select id="listbox1" 
				            			data-role="listbox"
						                data-text-field="item.name"
						                data-value-field="id" 
						                data-toolbar='{
						                	tools: ["moveUp", "moveDown", "transferTo", "transferFrom", "transferAllTo", "transferAllFrom", "remove"]
						            	}'
						                data-connect-with="listbox2"
						                data-auto-bind="true"
						                data-draggable="true"
						                data-bind="source: itemDS" style="width: 20%; min-height: 400px;float: left;">
						            </select>
						           	
						            <select id="listbox2" 
						            	data-role="listbox"
						                data-connect-with="listbox3, listbox1"
						                data-text-field="item.name"
						                data-draggable="true"
						                data-value-field="id"
						                data-toolbar='{
						                	tools: ["moveUp", "moveDown", "transferTo", "transferFrom", "transferAllTo", "transferAllFrom", "remove"]
						            	}'
						                data-auto-bind="true"
						                data-bind="source: item1"
						                style="width: 20%; min-height: 400px;float: left;">
						            </select>

						            <select id="listbox3" 
						            	data-role="listbox"
						                data-connect-with="listbox4, listbox2"
						                data-text-field="item.name"
						                data-draggable="true"
						                data-value-field="id"
						                data-toolbar='{
						                	tools: ["moveUp", "moveDown", "transferTo", "transferFrom", "transferAllTo", "transferAllFrom", "remove"]
						            	}'
						                data-auto-bind="true"
						                data-bind="source: item2"
						                style="width: 20%; min-height: 400px;float: left;">
						            </select>

						            <select id="listbox4" 
						            	data-role="listbox"
						                data-connect-with="listbox5, listbox3"
						                data-text-field="item.name"
						                data-draggable="true"
						                data-value-field="id"
						                data-toolbar='{
						                	tools: ["moveUp", "moveDown", "transferTo", "transferFrom", "transferAllTo", "transferAllFrom", "remove"]
						            	}'
						                data-auto-bind="false"
						                data-bind="source: item3"
						                style="width: 20%; min-height: 400px;float: left;">
						            </select>

						            <select id="listbox5" 
						            	data-role="listbox"
						                data-connect-with="listbox4"
						                data-text-field="item.name"
						                data-draggable="true"
						                data-value-field="id"
						                data-auto-bind="false"
						                data-bind="source: item4"
						                style="width: 20%; min-height: 400px;float: left;">
						            </select>
				           		</div>
			            		<!-- <a style="float: left; padding: 5px 80px; margin-bottom: 20px;background: red; color: #fff; margin-top: 5px;" data-bind="click: saveItem">Save</a> -->
			            		<div class="box-generic bg-action-button" style="margin-top: 15px;">
									<div class="row">
										<div class="col-sm-12" align="right">											
											<span class="btn-btn" data-bind="click: cancel" ><span>Cancel</span></span>	
											<span class="btn-btn" data-bind="click: saveItem"><span>Save</span></span>
										</div>
									</div>
								</div>
			            	</div>
			        	</div>
				        <div class="tab-pane" id="tab2">
				        	<div class="span12">
					        	<div class="rows">
						        	<div class="span5" style="padding-left: 0;">
						        		<input type="text" 
						                	style="width: 80%;float: left; border: 1px solid #c5c5c5; padding: 3px; height: 30px;" 
						                	placeholder="Phone Number" 
								           	data-bind="
								           		value: numPeople
								           	" /><span style="float: left; color: #333; margin-left:  10px;"> Persons</span>
								        <!-- <a style="float: left; padding: 5px 80px; margin-bottom: 20px;background: red; color: #fff; margin-top: 5px;" data-bind="click: savePerson">Save</a> -->

					            	</div>
					            	<div class="box-generic bg-action-button" style="margin-top: 15px; ">
										<div class="row">
											<div class="col-sm-12" align="right">												
												<span class="btn-btn" data-bind="click: cancel" ><span >Cancel</span></span>
												<span class="btn-btn" data-bind="click: savePerson"><span>Save</span></span>	
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
<script id="split-template" type="text/x-kendo-template">
	<select id="list#=id"></select>
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
			#:banhji.Index.dataSource.indexOf(data)+1#			
		</td>
		<td>#=kendo.toString(new Date(invissued_date), "dd-MMMM-yyyy", "km-KH")#</td>
		<td>#=contact_name#</td>
		<td>#=invnumber#</td>
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
<script id="invoice-list-template" type="text/x-kendo-tmpl">
	<tr data-uid="#: uid #" style="cursor: pointer;" data-bind="click: invClick">
		<td style="padding: 5px !important;">#= number#</td>
		<td style="padding: 5px !important;">#= room#</td>
		<td style="text-align: right; padding: 5px !important;">#=kendo.toString(amount, locale=="km-KH"?"c0":"c2", locale)#</td>
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
		<td style="padding: 5px !important;"> #:banhji.Index.receipCurrencyDS.indexOf(data) +1#</td>
		<td style="padding: 5px !important;">
			<input style="text-align: left; background: none; border:none; padding: 0;" id="numeric" class="k-formatted-value k-input" type="text" data-bind="value: currency, enabled: false"  />
		</td>
		<td style="padding: 5px !important;">
			<input style="text-align: right; width: 98%;" id="numeric" class="k-formatted-value k-input" type="number" value="17" min="0" data-format="n0" data-bind="value: amount, events: {change: checkChange}" step="1" />
		</td>
	</tr>
</script>
<script id="change-currency-receipt-template" type="text/x-kendo-template">
	<tr>
		<td style="padding: 5px !important;">
			#:banhji.Index.receipChangeDS.indexOf(data) +1#</td>
		<td style="padding: 5px !important;">
			<input style="text-align: left; background: none; border: none; padding: 0;" id="numeric" class="k-formatted-value k-input" type="text" data-bind="value: currency, enabled: false"  />
		</td>
		<td style="padding: 5px !important;">
			<input style="text-align: right; width: 98%;" id="numeric" class="k-formatted-value k-input" type="number" value="17" min="0" data-bind="value: amount, events: {change: checkChangeMoney}" step="1" />
		</td>
	</tr>
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
	<span>
		#if(name.length>25){#
			#=name.substring(0, 25)#..
		#}else{#
			#=name#
		#}#
	</span>
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
<script id="segment-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="\#/segment">+ Add New Segment</a>
    </strong>
</script>
<script id="segment-list-tmpl" type="text/x-kendo-tmpl">
	<span>#=code#</span> <span>#=name#</span>
</script>
<script id="customer-payment-method-header-tmpl" type="text/x-kendo-tmpl">
	<strong>
    	<a href="\#/customer_setting">+ Add New Payment Method</a>
    </strong>	
</script>
<script id="card-loyalty-list-tmpl" type="text/x-kendo-tmpl">
	<tr data-bind="click: selectedRow">
		<td align="center">
			#= banhji.Index.loyaltyDS.indexOf(data)+1#
		</td>
		<td>
			#=name#
		</td>
		<td align="center">
			#= base#
		</td>
		<td align="right">
			#= reward#
		</td>
		<td align="center">
			#if(status == 'Active'){#
				#if(base == 'Point'){#
					<a data-bind="click: earnPoint" style="color: red;">Earn</a> | #if(reward_amount > 0){# <a data-bind="click: applyPoint">Apply</a> #}#
				#}else{#
					<a data-bind="click: applyLoyalty">Apply</a>
				#}#
			#}else{#
				#: status#
			#}#
		</td>
	</tr>
</script>
<!-- Invoice Form -->
<script id="printBill" type="text/x-kendo-template">
	<div class="container">
		<div class="row-fluid">
			<div class="background">
				<div class="row-fluid">
					<div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
						<i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
					</div>
					<div id="example" class="k-content">
						<div style="overflow: hidden;position: relative;padding: 15px;">
							<div style="clear:both;position: relative;">
								<div class="hidden-print pull-right">
						    		<span class="glyphicons no-js remove_2" 
										data-bind="click: cancel"><i></i></span>
								</div>
							</div>

							<span id="savePrint" class="btn btn-icon btn-primary glyphicons print" data-bind="click: printGrid" style="width: 120px; margin-bottom: 15px; float: none; clear: both;"><i></i><span data-bind="text: lang.lang.save_pdf">Print</span></span>
						</div>
						<div class="clear"></div>

						<div id="invoiceContent" style="margin-bottom: 15px;"></div>

						<!-- Form actions -->
						<div class="box-generic bg-action-button" align="right">
							<span id="notification"></span>
							<span class="btn-btn" data-bind="click: cancel" ><span data-bind="text: lang.lang.cancel">Cancel </span></span>	
							<span id="savePrint" class="btn-btn" data-bind="click: printGrid"><span>Print</span></span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="invoiceForm" type="text/x-kendo-tmpl">	
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
        					<td style="border:0;text-align: left;font-weight: bold;color: \#fff!important;">#= kendo.toString(new Date(issued_date), "F")#</td>
        				</tr>
        			</table>
        		</div>        		
        	</div>
        	<div class="span12 pcg2" style="margin-bottom: 15px;padding: 0;">
        		<div class="span6" style="padding-right: 10px; width: 48%; float: left;padding: 0;">
        			<table style="float: left; width: 100%; border: 1px solid \#000;border-collapse: collapse; margin-bottom: 0px;">
        				<tr>
        					<td style="padding: 5px; border: 1px solid \#000; text-align: left; width: 35%; background: \#F1F1F1!important;">ឈ្មោះអតិថិជន (Customer Name) </td>
        					<td style="padding: 5px; border: 1px solid \#000; text-align: left;">#: contact.name#</td>
        				</tr>
        				<tr>
        					<td style="padding: 5px; border: 1px solid \#000; text-align: left; width: 35%; background: \#F1F1F1!important;">លេខបន្ទប់ (Room No.) :</td>
        					<td style="padding: 5px; border: 1px solid \#000; text-align: left;">#: room_number#</td>
        				</tr>
        			</table>
        		</div>
        		<div class="span6" style=" width: 51%; padding-left: 0; float: right;padding: 0;">
        			<table style="float: left; width: 100%; border: 1px solid \#000; border-collapse: collapse;">
        				<tr>
        					<td style="padding: 5px; border: 1px solid \#000; text-align: left; width: 35%; background: \#F1F1F1!important;">អ្នកគិតលុយ (Cashier) :</td>
        					<td style="padding: 5px; border: 1px solid \#000; text-align: left;">#: cashier_name#</td>
        				</tr>
        				<tr>
        					<td style="padding: 5px; border: 1px solid \#000; text-align: left; width: 35%; background: \#F1F1F1!important;">បុគ្គលិក (Staff) :</td>
        					<td style="padding: 5px; border: 1px solid \#000; text-align: left;" >#= employee_name#</td>
        				</tr>
        			</table>
        		</div>
        	</div>
        	<div class="clear inv2" style="margin-bottom:20px;" > 
            	<table cellpadding="0" cellspacing="0" border="1" style="width:100%;">
                	<thead>
                        <tr class="main-color" style="height: 45px;">
                            <th style="width: 8%;text-align: center;background: \#F1F1F1!important; color: \#333!important;">ល.រ<br />N<sup>o</sup></th>
                            <th style="text-align: center;background: \#F1F1F1!important; color: \#333!important;">បរិយាយមុខទំនិញ<br />Description</th>
                            <th style="width: 12%;text-align: center;background: \#F1F1F1!important; color: \#333!important;">បរិមាណ<br />QTY</th>
                            <th style="text-align: center;background: \#F1F1F1!important; color: \#333!important;">ឯកតា​<br />UOM</th>
                            <th style="text-align: center;background: \#F1F1F1!important; color: \#333!important;">ថ្លៃឯកតា​<br />Unit Price</th>
                            <th style="width: 20%;text-align: center;background: \#F1F1F1!important; color: \#333!important;">តម្លៃ<br> Amount</th>
                        </tr>
                    </thead>
					<tbody style="margin-top: 2px" id="formListView">
						#$.each(items, function(i,v){#
							<tr>
								<td align="center">#: i+ 1#</td>
								<td>#: v.item.name#</td>
								<td align="center"><strong>#: v.quantity #</strong></td>
								<td align="center"><strong>#: v.measurement.measurement#</strong></td>
								<td align="right">#= kendo.toString(v.price, v.locale=="km-KH"?"c0":"c", v.locale)#</td>
								<td align="right"><strong>#= kendo.toString(v.amount, v.locale=="km-KH"?"c0":"c", v.locale)#</strong></td>
							</tr>
						#})#
					</tbody>
                    <tfoot>
                    	<tr>
							<td style="height:40px!important;"></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td colspan="5" style="padding-right: 10px;text-align: right;">សរុប (បូកបញ្ចូលទាំងអាករ) GRAND TOTAL (VAT INCLUSIVE)</td>
							<td style="border: 1px solid;text-align: right"><strong>#= kendo.toString(amount, locale=="km-KH"?"c0":"c", locale)#</strong></td>
						</tr>
						#if(banhji.printBill.amountperson > 0){#
							<tr>
								<td colspan="5" style="padding-right: 10px;text-align: right;">ទឹកប្រាក់ត្រូវបង់</td>
								<td style="border: 1px solid;text-align: right"><strong>#= kendo.toString(banhji.printBill.amountperson, locale=="km-KH"?"c0":"c", locale)#</strong></td>
							</tr>
						#}#
                    </tfoot>
                </table>
            </div>
            <div class="clear">
            	<div class="span6">
            		<span class="secondwnumber#= id#" style="margin-left: -14px; float: left;"></span>
            	</div>
            </div>
        </div>
    </div>
</script>