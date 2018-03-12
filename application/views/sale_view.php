<style >
	/*@media (min-width: 768px){
		html.no-touch.sticky-top:not(.animations-gpu) #content {
		    
		}
	}*/
	.home .bg-green{
		background: #0eac00;
		width: 100%;
		text-align: center;
		position: relative;
		box-shadow: 2px 0px 12px 0px rgba(68,68,68,1);
	}
	.height250{
		height: 200px;
	}
	.height100{
		height: 100px;
	}
	.no-padding{
		padding: 0;
	}
	.no-paddingLeft{
		padding-left: 0;
		padding-right: 2px;
	}
	.nopadding-right{
		padding-right: 0
	}
	.nopadding-left{
		padding-left: 0
	}
	.paddingLeftRigth{
		padding: 0 2px;
	}
	.paddingTopBottom{
		padding: 2px 0;
	}
	.top-left{
		border-radius: 20px 0 0 0;
	}
	.top-rigth{
		border-radius: 0 20px 0 0;
	}
	.bottom-left{
		border-radius: 0 0 0 20px ;
	}
	.bottom-rigth{
		border-radius: 0 0 20px 0;
	}
	.paddingLeft{
		padding-left: 2px;
	}	
	.nopadding-right .height250.top-left .img img,
	.nopadding-left .height250.top-left .img img,
	.nopadding-right .height250 .img img,
	.paddingLeft .height250 .img img{
		width: 120px;
	    margin-top: 40px;
	    float: left;
	    margin-left: 70px;
	}
	.paddingLeftRigth .height250 .img,
	.nopadding-left .height250.top-rigth .img,
	.nopadding-left .height250 .img{
		width: 100%;
	    float: left;
	    padding: 18% 0 20px 32%;
	    text-align: center;
	}
	.paddingLeftRigth .height250 .img img,
	.nopadding-left .height250.top-rigth .img img,
	.nopadding-left .height250 .img img{
		width: 100px;
	    float: left;
	}
	.bg-green.height250.top-left .textBig{
		float: right;
	    padding: 35px 35px 0 0;
	    font-size: 50px;
	    width: 245px;
	    text-align: left;
	}
	.nopadding-right .height250 .textBig{
		float: right;
	    padding: 35px 35px 0 0;
	    font-size: 35px;
	    width: 245px;
	    text-align: left;
	}
	.paddingLeft .height250 .textBig{
		float: right;
	    padding: 27px 35px 0 0;
	    font-size: 35px;
	    width: 245px;
	    text-align: left;
	}
	.paddingLeftRigth .height250 .textSmall,
	.nopadding-left .height250.top-rigth .textSmall,
	.nopadding-left .height250 .textSmall{
		font-size: 17px;
	    margin-bottom: 0;
	    float: left;
	    text-align: center;
	    width: 100%;
	}
	.nopadding-right .height100.bottom-left .img,
	.paddingLeftRigth .height100 .img,
	.no-padding .height100 .img,
	.paddingLeft .height100.bottom-rigth .img{
		width: 100%;
	    float: left;
	    padding: 7% 0 8px 36%;
	    text-align: center;
	}

	.nopadding-right .height100.bottom-left .img img,
	.paddingLeftRigth .height100 .img img, 
	.no-padding .height100 .img img,
	.paddingLeft .height100.bottom-rigth .img img{
		width: 50px;
	    float: left;
	}
	.paddingLeft .height100.bottom-rigth .img{
		padding: 3% 0 0 32%;
	    width: 50%;
	    text-align: center;
	}
	.paddingLeft .height100.bottom-rigth .img img{
		width:  70px;
	}

	@media only screen 
	and (min-device-width : 768px) 
	and (max-device-width : 1024px) 
	and (orientation : landscape) {
		.nopadding-right .height250.top-left .textBig{
			padding: 20px 0 0 0;
		    font-size: 55px;
		    width: 202px;
		}
		.nopadding-right .height250 .textBig {
			padding-top: 45px;
    		font-size: 35px;
    		width: 195px
		}
	}

	@media only screen 
	and (min-device-width : 768px) 
	and (max-device-width : 1024px) 
	and (orientation : portrait) {
		.menu .span9 {
		    margin-top: 12px;
		}
		.search-menu .search-query{
			width: 210px;
		}
		.nopadding-right .height250.top-left .img img,
		.nopadding-right .height250 .img img{
			width: 140px;
		    margin-top: 35px;
		    margin-left: 55px;
		}
		.nopadding-right .height250.top-left .textBig{
			padding: 45px 0 0 0;
		    font-size: 40px;
		    width: 146px;
		}
		.nopadding-right .height250 .textBig{
		    padding: 70px 0 0 0;
		    font-size: 25px;
		    width: 146px;
		}
		.paddingLeftRigth .height250 .img, 
		.nopadding-left .height250.top-rigth .img, 
		.nopadding-left .height250 .img{
			padding: 20px 0 10px 25%;
		}
		.paddingLeftRigth .height250 .textSmall, 
		.nopadding-left .height250.top-rigth .textSmall, 
		.nopadding-left .height250 .textSmall{
			font-size: 22px;
		}
		.paddingLeft .height100.bottom-rigth .img{
			padding: 3% 0 0 24%;
		}
		.nopadding-right .height100.bottom-left .img, 
		.paddingLeftRigth .height100 .img, 
		.no-padding .height100 .img, 
		.paddingLeft .height100.bottom-rigth .img{
			padding: 5% 0 8px 28%;
		}
	}
	@media (min-width: 1200px){
		.container {
		    width: 1024px;
		}
	}
	.fixed-bottom{
		position: fixed;
	    bottom: 20px;
	    text-align: center;
	    margin: 0 auto;
	    width: 78%;
	}
	.span6 .row a p{
		color: #333;
	}
</style>
<div id="wrapperApplication" class="container-fluid"></div>
<!-- template section starts -->
<script type="text/x-kendo-template" id="layout">
	<div id="menu"></div>			
	<div id="content" class="row-fluid container"></div>
</script>
<script type="text/x-kendo-template" id="blank-tmpl">
</script>
<script type="text/x-kendo-template" id="menu-tmpl">   
	<div class="menu-hidden sidebar-hidden-phone menu-left hidden-print">
		<div class="navbar main navbar-fixed-top" id="main-menu">
			<ul class="topnav">
				<li><a href="#" data-bind="click: checkRole"><img src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/banhji-logo.png" style="height: 40px;"></a></li>
			</ul>
			<form class="navbar-form pull-left">				
			  	<input type="text" class="span2 search-query" placeholder="Search" id="search-placeholder" 
			  			data-bind="value: searchText" 
			  			style="background-color: #555555; color: #ffffff; border-color: #333333; height: 22px;">
			  	<button type="submit" class="btn btn-inverse" data-bind="click: search"><i class="icon-search"></i></button>
			</form>
			<ul class="topnav" id="secondary-menu">
			</ul> 
			<ul class="topnav pull-right">
				<li role="presentation" class="dropdown">
			  		<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"> <i class="icon-th-list"></i></a>
		  			<ul class="dropdown-menu ul-multiTaskList" data-template="multiTaskList-row-template" data-bind="source: multiTaskList">  				  				
		  			</ul>
			  	</li>
				<li role="presentation" class="dropdown">
			  		<a style="color: #fff;" class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">[<span data-bind="text: getUsername"></span>]</a>
		  			<ul class="dropdown-menu">  				  				
		  				<li><a href="#" data-bind="click: lang.changeToKh">ភាសាខ្មែរ</a></li>
    					<li><a href="#" data-bind="click: lang.changeToEn">English</a></li>
						<li class="divider"></li>
					<!-- 	<li><a href="<?php echo base_url(); ?>admin">Setting</a></li> -->
						<li><a href="#/manage" data-bind="click: logout"><i class="icon-power-off"></i> Logout</a></li> 				
		  			</ul>
			  	</li>				
			</ul>
		</div>
	</div>
</script>
<script id="multiTaskList-row-template" type="text/x-kendo-template">
    <li>
    	<a href="\#/#=url#">
    		#=name#
    		<span title="Remove" class="multiTaskList glyphicons remove_2 pull-right" data-bind="click: removeLink">
    			<i></i>
    		</span>
    	</a>

    </li>	
</script>
<script type="text/x-kendo-template" id="index">
	
	<!-- <a href="#/sale_center"><h1>WELCOME</h1></a> -->
	<div class="container" >
		<div class="row home" style="padding-top: 100px !important;">
			<div class="span12">
				<div class="row">
					<div class="span6 nopadding-right">
						<a href="#/sale_center">
							<div class="bg-green height250 top-left" style="background: #fff; color: #0eac00; box-shadow: none; box-shadow: 2px 0px 12px 0px rgba(68,68,68,1);">
								<div class="img">
									<img src="<?php echo base_url();?>assets/spa/icon/pos-green.png" >
								</div>
								<p class="textBig">Sale Module</p>
							</div>
						</a>
					</div>
					<div class="span6" >
						<div class="row">
							<div class="span6 paddingLeftRigth">
								<div class="bg-green height250">
									<div class="img">
										<img src="<?php echo base_url();?>assets/spa/icon/session.png" >
									</div>
									<p class="textSmall">Outlet</p>
								</div>
							</div>
							<a href="rrd/#/inventory_position_summary">
								<div class="span6 nopadding-left">
									<div class="bg-green height250 top-rigth">
										<div class="img">
											<img src="<?php echo base_url();?>assets/spa/icon/book.png" >
										</div>
										<p class="textSmall">Inventory</p>
									</div>
								</div>
							</a>
						</div>
					</div>
				</div>
			</div>

			<div class="span12">
				<div class="row paddingTopBottom">
					<div class="span6 nopadding-right">
						<div class="bg-green height250">
							<div class="img">
								<img src="<?php echo base_url();?>assets/spa/icon/serving.png" >
							</div>
							<p class="textBig">Employee</p>
						</div>
					</div>
					<div class="span6 paddingLeft">
						<div class="bg-green height250 bottom-rigth" >							
							<div class="img">
								<img src="<?php echo base_url();?>assets/spa/icon/report.png">
							</div>
							<p class="textBig">Sale Management Reports</p>
						</div>
					</div>
				</div>
			</div>

			<!-- <div class="span12">
				<div class="row">
					<div class="span6" >
						<div class="row">
							<div class="span4 nopadding-right">
								<div class="bg-green height100 bottom-left">
									<div class="img">
										<img src="<?php echo base_url();?>assets/spa/icon/customers.png" >
									</div>
									<p>Customer</p>
								</div>
							</div>
							<div class="span4 paddingLeftRigth">
								<div class="bg-green height100">
									<div class="img">
										<img src="<?php echo base_url();?>assets/spa/icon/rooms-facilities.png" >
									</div>
									<p>Rooms/ facilities</p>
								</div>
							</div>
							<div class="span4 no-padding">
								<div class="bg-green height100">
									<div class="img">
										<img src="<?php echo base_url();?>assets/spa/icon/serving.png" >
									</div>
									<p>Therapist</p>
								</div>
							</div>
						</div>
					</div>
					<div class="span6 paddingLeft">
						<div class="bg-green height100 bottom-rigth" >							
							<div class="img">
								<img src="<?php echo base_url();?>assets/spa/icon/report.png">
							</div>
							<p style="margin-bottom: 0; font-size: 40px; padding: 20px 0 0;  width: 50%; float: left; text-align: left; ">Reports</p>
						</div>
					</div>
				</div>
			</div> -->

			<div class="span12" style="margin-top: 20px;">
				<p data-bind="text: today"></span>
			</div>
		</div>
	</div>
	
	<div class="row-fluid">
		<div class="fixed-bottom">
			<p>&copy; <?php echo date('Y'); ?><span data-bind="text: lang.lang.all_rights_reserved"></span></p>
		</div>	
	</div>		
</script>
<!-- ADVANCE SEARCH -->
<script id="searchAdvanced" type="text/x-kendo-template">
    <div id="slide-form">
		<div class="customer-background">
			<div class="container-960">					
				<div id="example" class="k-content">
			    	<div class="hidden-print pull-right">
			    		<span class="glyphicons no-js remove_2" onclick="javascript:window.history.back()"><i></i></span>						
					</div>
			        
			        <h2>SEARCH</h2>
				    
				    <br>	
				    
				    <!-- Result -->
				    <span class="results"><span data-format="n0" data-bind="text: found"></span> result found <i class="icon-circle-arrow-down"></i></span>
					
					<div data-role="listview"
						 data-auto-bind="false"
						 data-selectable="true"				                 
		                 data-template="searchAdvanced-contact-template"
		                 data-bind="source: contactDS"></div>
		            <div data-role="listview"
						 data-auto-bind="false"
						 data-selectable="true"				                 
		                 data-template="searchAdvanced-transaction-template"
		                 data-bind="source: transactionDS"></div>
		            <div data-role="listview"
						 data-auto-bind="false"
						 data-selectable="true"				                 
		                 data-template="searchAdvanced-item-template"
		                 data-bind="source: itemDS"></div>
		            <div data-role="listview"
						 data-auto-bind="false"
						 data-selectable="true"				                 
		                 data-template="searchAdvanced-account-template"
		                 data-bind="source: accountDS"></div>					
					<!-- End Result -->

				</div>							
			</div>
		</div>
	</div>
</script>
<script id="searchAdvanced-contact-template" type="text/x-kendo-template">
	<dl data-bind="click: selectedContact">			
		<dt>
			<div class="widget widget-heading-simple widget-body-multiple widget-offers">
				<div class="widget-body">
					
					<!-- Media item -->
					<div class="media">
						<img class="media-object pull-left thumb hidden-tablet hidden-phone" 
							src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/contact.ico" 
							style="width: 100px; height: 100px;">
						<div class="media-body">
							<h5>#=surname# #=name#</h5>							
							<span>#=abbr# #=number#</span>							
							<br>
							<span>#=company#</span>
							<br>
							<span>#=contact_type#</span>
														
						</div>
					</div>
					<!-- // Media item END -->
						
				</div>
			</div>
		</dt>											
	</dl>	
</script>
<script id="searchAdvanced-transaction-template" type="text/x-kendo-template">
	<dl data-bind="click: selectedTransaction">			
		<dt>
			<div class="widget widget-heading-simple widget-body-multiple widget-offers">
				<div class="widget-body">
					
					<!-- Media item -->
					<div class="media">
						<img class="media-object pull-left thumb hidden-tablet hidden-phone" 
							src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/transaction.ico" 
							style="width: 100px; height: 100px;">
						<div class="media-body">
							<h5>#=number#</h5>
							<span>#=amount#</span>
							<br>
							<span>#=issued_date#</span>					
						</div>
					</div>
					<!-- // Media item END -->
						
				</div>
			</div>
		</dt>											
	</dl>	
</script>
<script id="searchAdvanced-item-template" type="text/x-kendo-template">
	<dl data-bind="click: selectedItem">			
		<dt>
			<div class="widget widget-heading-simple widget-body-multiple widget-offers">
				<div class="widget-body">
					
					<!-- Media item -->
					<div class="media">
						<img class="media-object pull-left thumb hidden-tablet hidden-phone" 
							src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/item.ico" 
							style="width: 100px; height: 100px;">
						<div class="media-body">
							<h5>#=name#</h5>
							<span>#=number#</span>
							<br>
							<span>#=on_hand#</span>					
						</div>
					</div>
					<!-- // Media item END -->
						
				</div>
			</div>
		</dt>											
	</dl>	
</script>
<script id="searchAdvanced-account-template" type="text/x-kendo-template">
	<dl data-bind="click: selectedAccount">			
		<dt>
			<div class="widget widget-heading-simple widget-body-multiple widget-offers">
				<div class="widget-body">
					
					<!-- Media item -->
					<div class="media">
						<img class="media-object pull-left thumb hidden-tablet hidden-phone" 
							src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/journal.ico" 
							style="width: 100px; height: 100px;">
						<div class="media-body">
							<h5>#=name#</h5>
							<span>#=number#</span>				
						</div>
					</div>
					<!-- // Media item END -->
						
				</div>
			</div>
		</dt>											
	</dl>	
</script>


<script id="saleCenter" type="text/x-kendo-template">	
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
						 data-auto-bind="true"
						 data-bind="source: contactDS"
						 data-row-template="saleCenter-customer-list-tmpl"
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

							        <!-- Tabs -->
							        <ul class="pull-right">
							        	<li style="font-size: large; color: black; font-weight: bold;">							            	
							            	<span data-bind="text: obj.name"></span>
							            </li>
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
								            			<span class="btn btn-block btn-inverse" data-bind="click: goSaleOrder"><span><span data-bind="text: lang.lang.sale_order"></span></span>								            			
								            		</td>
								            	</tr>
								            	<tr>
								            		<td width="50%">
								            			<span class="btn btn-block btn-inverse" data-bind="click: goDeposit"><span><span data-bind="text: lang.lang.c_deposit"></span></span>
								            		</td>
								            		<td width="50%">
								            			<span class="btn btn-block btn-inverse" data-bind="click: goCashSale"><span><span data-bind="text: lang.lang.cash_sale"></span></span>								            											            			
								            		</td>
								            	</tr>
							            	</table>
							            </div>
							            <!-- // Transactions Tab content END -->							           					            

							            <!-- INFO Tab content -->
							            <div id="tab2-4" class="tab-pane box-generic">
							            	<div class="row-fluid">
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
														<tr>
															<td><span data-bind="text: lang.lang.billed_address"></span></td>
															<td>
																<span data-bind="text: obj.address"></span>
															</td>
														</tr>								
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
												 data-row-template="saleCenter-note-tmpl"
												 data-columns="[{title: ''}]"
												 data-height="100"						 
												 data-scrollable="{virtual: true}"></div>
											
							            </div>
							            <!-- // NOTE Tab content END -->

							            <!-- Attach Tab content -->
								        <div id="tab4-4" class="tab-pane">							            	
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
									<div class="widget-stats widget-stats-primary widget-stats-5" data-bind="click: loadQuote">
										<span class="glyphicons shopping_cart"><i></i></span>
										<span class="txt"><span data-bind="text: lang.lang.quote"></span><span data-bind="text: quote" style="font-size:medium;"></span></span>
										<div class="clearfix"></div>
									</div>
								</div>
								<div class="span6">
									<div class="widget-stats widget-stats-inverse widget-stats-5" data-bind="click: loadSO">
										<span class="glyphicons cart_in"><i></i></span>
										<span class="txt"><span data-bind="text: lang.lang.sale_order"></span><span data-bind="text: so" style="font-size:medium;"></span></span>
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
				                data-template="saleCenter-transaction-tmpl"
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
<script id="saleCenter-transaction-tmpl" type="text/x-kendo-tmpl">
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
<script id="saleCenter-customer-list-tmpl" type="text/x-kendo-tmpl">
	<tr data-bind="click: selectedRow">
		<td>
			<div class="media-body strong">				
				<span>#=abbr##=number#</span>
				<span>#=name#</span>
			</div>
		</td>
	</tr>
</script>
<script id="saleCenter-note-tmpl" type="text/x-kendo-template">
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
						        </ul>
						    </div>
						    <!-- // Tabs Heading END -->

						    <div class="tab-content">

						    	<!-- //GENERAL INFO -->
						        <div class="tab-pane active" id="tab1">
					            	<table class="table table-borderless table-condensed cart_total">					            		
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
<!-- FUNCTIONS -->
<script id="sale" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">					
				<div id="example" class="k-content">
					<span class="pull-right glyphicons no-js remove_2" 
						onclick="javascript:window.history.back()"><i></i></span>

					<br>
					<br>

					<div class="row-fluid">
					    <!-- Tabs -->
						<div class="relativeWrap" data-toggle="source-code">
							<div class="widget widget-tabs widget-tabs-gray report-tab">
							
								<!-- Tabs Heading -->
								<div class="widget-head widget-custome" style="background: #203864 !important;">
									<ul>
										<li class="active"><a  class="glyphicons search" href="#tab-1" data-toggle="tab"><i></i>Search</a></li>
										<li><a  class="glyphicons cargo" href="#tab-2" data-toggle="tab"><i></i>Category</a></li>
										<li><a  class="glyphicons heart" data-toggle="tab" data-bind="click: favorite"><i></i>Favorite</a></li>
									</ul>
									<div style="float: right;">
										<span style="position: relative; height: 35px; line-height: 35px; padding-right: 15px; float: left; display: block; ">
											<a style="color: #fff; margin-top: 4px; line-height: 17px;" class="glyphicons shopping_cart" href="#/quote" >
												<i></i><span class="badge fix badge-primary" style="color: #fff; position: absolute; left: -8px; top: -9px; background: red;" data-bind="text: quoteLineDS.total()"></span>
												Quote												
											</a>
										</span>
										<sapn style="position: relative; height: 35px; line-height: 35px; padding-left: 15px; float: left; display: block; border-left: 1px solid #efefef;">
											<a style="color: #fff; margin-top: 4px; line-height: 17px;" class="glyphicons cart_in" href="#/sale_order" >
												<i></i><span class="badge fix badge-primary" style="color: #fff; position: absolute; left: -12px; top: -9px; background: red;" data-bind="text: soLineDS.total()"></span>
												Sale Order
											</a>
										</span>
									</div>

									
								</div>
								<!-- // Tabs Heading END -->								
								<div class="widget-body">
									<div class="tab-content">
								        <div class="tab-pane active" id="tab-1">
											<input type="text" class="span2 search-query" placeholder="Search" id="search-placeholder" data-bind="value: searchText" style="background-color: #fff; color: #333; border-color: #ddd; height: 33px; width: 192px;">
											<button type="submit" class="btn btn-inverse" data-bind="click: search"><i class="icon-search"></i></button>					
									    </div>
									    <div class="tab-pane" id="tab-2">

									    	<ul data-role="listview"
									    		 data-auto-bind="false"
									    		 data-selectable="true"
								                 data-template="sale-category-template"
								                 data-bind="source: categoryDS,"
								                 style="overflow: auto; padding-top: 15px; padding-left: 15px; padding-bottom: 15px;"></ul>
									    	
									    </div>
									   								        							       
								    </div>
								</div>
							</div>
						</div>
						<!-- // Tabs END -->						
					</div>

					<div class="row-fluid" id="main-section" style="overflow: hidden;margin-top: 15px;">
						<ul data-role="listview"
							 data-auto-bind="false"
			                 data-template="sale-template"
			                 data-bind="source: dataSource"
			                 style="height: 300px; "></ul>
			        </div>

			        <div id="pager" class="k-pager-wrap"
				    	 data-auto-bind="false"
			             data-role="pager" data-bind="source: dataSource"></div>


			        <!--  Top Up Sale Detail -->
			        <div class="modal fade popRightBlog-saleDetail" id="saleDetail">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="margin-right: 15px; font-size: 35px; color: #000;">×</button>
						<div class="row-fluid sale-detail">
							<div id="details">
				                <a id="navigate-prev" data-bind="click: prevItem"></a>
			                	
			                	<div id="detail-info" style="background: none;">
			                		<img class="main-image" width="200px" data-bind="attr: { src: obj.image_url, alt: obj.name, title: obj.name }" style="border: 1px solid #ddd;">
			                		<div id="description">
										<h1 data-bind="text:obj.name"></h1>
										<p data-bind="text:obj.sale_description"></p>
										<div id="details-total">
											<p id="price-quantity" data-bind="text:obj.item_prices[0].price" style="font-weight: 600;color: #333;background: none; font-size: 30px;padding-left: 0;"></p>												
										</div>
									</div>
								</div>
								<div id="nutrition-info" style="border: 1px solid #ddd;">
									<h2 style="padding-top: 15PX;padding-bottom: 5px;padding-left: 10px;font-size: 20px;font-weight: 600;">Information</h2>
									<dl>
										<dt style="padding-left: 10px;">Categories:</dt>
										<dd data-bind="text:obj.category"></dd>
										<dt style="padding-left: 10px;">UOM</dt>
										<dd data-bind="text:obj.measurement_id"></dd>
										<dt style="padding-left: 10px;">On Hand</dt>
										<dd data-bind="text:on_hand"></dd>
										<dt style="padding-left: 10px;">On SO</dt>
										<dd data-bind="text:on_so"></dd>
										<dt style="padding-left: 10px;">On PO</dt>
										<dd data-bind="text:on_po"></dd>
									</dl>
								</div>

								<a data-bind="click: nextItem" id="navigate-next"></a>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</script>
<script id="sale-category-template" type="text/x-kendo-tmpl">
    <li class="btn btn-primary" 
    	data-bind="text: name, click: selectedType"
    	style="width: auto !important; text-align: center; padding:5px 10px !important; margin-bottom: 10px;">
    </li>
</script>
<script id="sale-template" type="text/x-kendo-tmpl">	
	<li class="products span2" aria-selected="false" >
	    <a class="view-details" href="\#saleDetail" data-toggle="modal" data-bind="click:loadDetail">
	        <img class="main-image" src="#= image_url!==null ? image_url : banhji.no_image #" alt="#=name#" title="#=name#">
	    </a>
	    <div style=" padding-bottom: 49px;">
	        <strong style="color: \#2B569A;">#=name#</strong>
	        <span style="color: \#2B569A;" class="price"><span>$</span><span data-bind="text: price"></span></span>

		    <div class="add-to-cart row-fluid""> 
		    	<span class="span5" data-bind="click: addQuote" style="background: \#203864; padding: 5px; cursor: pointer; width: 60px; margin-left: 7px; color: \#fff;"> Quote </span>
		    	<span class="span6" data-bind="click: addSO" style="background: \#1b8330; padding: 5px; margin-left: 5px; cursor: pointer; width: 58px; color: \#fff;"> Order </span>
		    </div>
		</div>
	</li>
</script>
<script id="quote" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">					
				<div id="example" class="k-content">					
				    
			    	<span class="glyphicons no-js remove_2 pull-right" 
		    				onclick="javascript:window.history.back()"
							data-bind="click: cancel"><i></i></span>

			        <h2 data-bind="text: lang.lang.quote"></h2>

				    <br>

					<!-- Upper Part -->
					<div class="row-fluid">
						<div class="span4">
							<div class="box-generic well" style="height: 190px;">				
								<table class="table table-borderless table-condensed cart_total">									
									<tr>
										<td style="width: 50px;"><span data-bind="text: lang.lang.no_"></span></td>
										<td>
											<input id="txtNumber" name="txtNumber" class="k-textbox" 
													data-bind="value: obj.number,
																disabled: obj.is_recurring,
																events:{change:checkExistingNumber}" 
													required data-required-msg="required" 
													placeholder="eg. ABC00001" style="width: 83%; float: left; margin-right: 5px;" />
											<div style="padding-left: 0; width: 25px; float: left;">
												<a class="glyphicons no-js qrcode" data-bind="click: generateNumber" title="Generate Number" style="float: left; margin: 2px 0 0 0 ;"><i></i></a>
											</div>
										</td>
									</tr>
									<tr>
										<td><span data-bind="text: lang.lang.date"></span></td>
										<td class="right">
											<input id="issuedDate" name="issuedDate" 
													data-role="datepicker"
													data-format="dd-MM-yyyy"
													data-parse-formats="yyyy-MM-dd HH:mm:ss" 
													data-bind="value: obj.issued_date, 
																events:{ change : setRate }" 
													required data-required-msg="required"
													style="width: 210px;" />
										</td>
									</tr>								
									<tr>
										<td><span data-bind="text: lang.lang.customers"></span></td>
										<td>
											<input id="cbbContact" name="cbbContact"
												   data-role="dropdownlist"
												   data-header-template="contact-header-tmpl"
								                   data-template="contact-list-tmpl"
								                   data-auto-bind="false"
								                   data-value-primitive="false"
								                   data-filter="startswith"
								                   data-text-field="name"
								                   data-value-field="id"
								                   data-bind="value: obj.contact,
								                              source: contactDS,
								                              events: {change: contactChanges}"
								                   data-option-label="Select Customer..."
								                   required data-required-msg="required" style="width: 210px;" />
										</td>
									</tr>																															
								</table>

								<div class="strong" style="background: #eee;  border: 1px solid #ddd; width: 100%; padding: 10px;" align="center"
									data-bind="style: { backgroundColor: amtDueColor}">
									<div align="left"><span data-bind="text: lang.lang.amount_quoted"></span></div>
									<h2 data-bind="text: total" align="right"></h2>
								</div>

							</div>						
						</div>					   

						<div class="span8">

							<div class="box-generic-noborder" style="min-height: 234px !important">

							    <!-- Tabs Heading -->
							    <div class="tabsbar tabsbar-2">
							        <ul class="row-fluid row-merge">
							        	<li class="span1 glyphicons cogwheels active"><a href="#tab1-5" data-toggle="tab"><i></i> </a>
							            </li>
							            <li class="span1 glyphicons adress_book"><a href="#tab2-5" data-toggle="tab"><i></i> </a>
							            </li>
							            <li class="span1 glyphicons circle_info"><a href="#tab3-5" data-toggle="tab"><i></i> </a>
							            </li>
							            <li class="span1 glyphicons paperclip"><a href="#tab4-5" data-toggle="tab"><i></i></a>
							            </li>						            
							            <li class="span1 glyphicons history"><a href="#tab5-5" data-toggle="tab"><i></i> <span data-bind="text: lang.lang.recuring"></span></a>
							            </li>						            								            
							        </ul>
							    </div>
							    <!-- // Tabs Heading END -->

							    <div class="tab-content">

							    	<!-- Options Tab content -->
							        <div class="tab-pane active" id="tab1-5">						            
							            <table style="margin-bottom: 0;" class="table table-borderless table-condensed cart_total">							            
											<tr>
												<td>
													<span data-bind="text: lang.lang.balance"></span> <span data-bind="text: balance"></span>
												</td>										
												<td>
													<span data-bind="text: lang.lang.credit_allowed"></span> <span data-format="n" data-bind="text: obj.credit_allowed"></span>
												</td>
											</tr>
								            <tr>
								            	<td><span data-bind="text: lang.lang.validity_date"></span></td>
								            	<td>
								            		<input id="txtDueDate" name="txtDueDate" 
															data-role="datepicker"
															data-format="dd-MM-yyyy"
															data-parse-formats="yyyy-MM-dd" 
															data-bind="value: obj.due_date" 
															required data-required-msg="required"
															style="width:100%;" />
								            	</td>
								            </tr>							           
											<tr>							            				
												<td>
								            		<span data-bind="text: lang.lang.refrence"></span>	            						            		
								            	</td>
								            </tr>
								            <tr>
								            	<td>
								            		<span data-bind="text: lang.lang.term"></span>     		
								            	</td>				
												<td>
													<input data-role="dropdownlist"														
								              				data-value-primitive="true"
															data-text-field="name" 
								              				data-value-field="id"	
								              				data-header-template='customer-term-header-tmpl'					              				 
								              				data-bind="value: obj.payment_term_id,
								              							source: paymentTermDS,
								              							events:{ change: setTerm }"
								              				data-option-label="Select Term..." 
								              				style="width: 100%" />
												</td>
											</tr>
							            </table>						            
							        </div>
							        <!-- // Options Tab content END -->

							        <!-- Address Tab content -->
							        <div class="tab-pane" id="tab2-5">
							        	<span data-bind="text: lang.lang.billing_address"></span>
										<textarea cols="0" rows="2" class="k-textbox" style="width:100%" data-bind="value: obj.bill_to" placeholder="Billing to ..."></textarea>								
										
										<span data-bind="text: lang.lang.delivery_address"></span>
										<textarea cols="0" rows="2" class="k-textbox" style="width:100%" data-bind="value: obj.ship_to" placeholder="Shipping to ..."></textarea>	
												
							        </div>
							        <!-- // Address Tab content END -->

							        <!-- Info Tab content -->
							        <div class="tab-pane" id="tab3-5">
							        	
										<table class="table table-borderless table-condensed cart_total">
											<tr>
												<td><span data-bind="text: lang.lang.segments"></span></td>
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
											<tr>
												<td><span data-bind="text: lang.lang.job"></span></td>
												<td>
													<input id="ddlJob" name="ddlJob"
														   data-role="dropdownlist"
														   data-header-template="job-header-tmpl"
														   data-template="job-list-tmpl"
														   data-auto-bind="false"				                
										                   data-value-primitive="true"		   
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.job_id, 
										                   			source: jobDS"
										                   data-option-label="Select job..." 
										                   style="width: 100%" />										
												</td>
											</tr>											
							            </table>
												
							        </div>
							        <!-- // Info Tab content END -->

							        <!-- Attach Tab content -->
							        <div class="tab-pane" id="tab4-5">
							         	<p><span data-bind="text: lang.lang.file_type"></span>: [PDF, JPG, JPEG, TIFF, PNG, GIF]</p>							            	
							            
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

							        </div>
							        <!-- // Attach Tab content END -->						        

							        <!-- Recurring Tab content -->
							        <div class="tab-pane" id="tab5-5">
							            <table style="width: 100%" class="table borderless">
							            	<tr align="right">
							            		<td style="border-top: 0;">
							            			<span data-bind="text: lang.lang.name"></span>
							            		</td>
							            		<td style="border-top: 0;">
							            			<input id="txtRecurringName" name="txtRecurringName"
							            					class="k-textbox" 
							            					data-bind="value: obj.recurring_name" 
							            					placeholder="Recurring name.." 
							            					style="width: 43%; " />

							            			<span data-bind="text: lang.lang.start"></span>

									                <input data-role="datepicker"
															data-format="dd-MM-yyyy"
															data-parse-formats="yyyy-MM-dd"
															data-bind="value: obj.start_date"
															style="width: 40%; " />
							            		</td>
							            	</tr>
							            	<tr align="right">
							            		<td style="border-top: 0;">
								            		<span data-bind="text: lang.lang.every"></span>
								            	</td>
							            		<td style="border-top: 0;">
								            		<input data-role="numerictextbox"
									                   data-format="n0"
									                   data-min="0"								                   
									                   data-bind="value: obj.interval"
									                   style="width: 45%; " />

								            		<input data-role="dropdownlist"									                   
										                   data-value-primitive="true"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.frequency,
										                              source: frequencyList,
										                              events: { change: frequencyChanges }"
										                   style="width: 45%;" />
								            	</td>
							            	</tr>
								            <tr align="right">
								            	<td style="border-top: 0;">
								            		<span data-bind="text: lang.lang.on"></span>
								            	</td>							            	
								            	<td style="border-top: 0;">

								            		<input data-role="dropdownlist"									                   
										                   data-value-primitive="true"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.month,
										                   			  visible: showMonth,
										                              source: monthList"										                   
										                   style="width: 45%;" />

								            		<input data-role="dropdownlist"									                   
										                   data-value-primitive="true"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.month_option,
										                   			  visible: showMonthOption,
										                              source: monthOptionList,
										                              events: { change: monthOptionChanges }"										                   
										                   style="width: 45%;" />

								            		<input data-role="dropdownlist"									                   
										                   data-value-primitive="true"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.week,
										                   			  visible: showWeek,
										                              source: weekDayList"										                  
										                   style="width: 45%;" />										            
										        
								            		<input data-role="dropdownlist"									                   
										                   data-value-primitive="true"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.day,
										                   			  visible: showDay,
										                              source: dayList"										                   
										                   style="width: 45%;" />

								            	</td>
								            </tr>
							            </table>

							            <span id="saveRecurring" class="btn btn-icon btn-default glyphicons history" data-bind="visible: obj.isNew" style="float: right; margin-top: -12px;"><i></i> <span data-bind="text: lang.lang.save_recurring"></span></span>
							        </div>
							        <!-- // Recuring Tab content END -->						        								        

							    </div>
							</div>

					    </div>
					</div>

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
						        	var rowIndex = banhji.quote.lineDS.indexOf(dataItem)+1;
						        	return '<i class=icon-trash data-bind=click:removeRow></i>' + ' ' + rowIndex;
						      	}
						    },
		                 	{ field: 'item', title: 'PRODUCTS/SERVICES', editor: itemEditor, template: '#=item.name#', width: '170px' },
                            { field: 'description', title:'DESCRIPTION', width: '250px' },                            
                            {
							    field: 'quantity',
							    title: 'QTY',
							    format: '{0:n}',
							    editor: numberTextboxEditor,
							    width: '120px',
							    attributes: { style: 'text-align: right;' }
							},
                            { field: 'measurement', title: 'UOM', editor: measurementEditor, template: '#=measurement.measurement#', width: '80px' },
                            {
							    field: 'price',
							    title: 'PRICE',
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
                            { field: 'amount', title:'AMOUNT', format: '{0:n}', editable: 'false', attributes: { style: 'text-align: right;' }, width: '120px' },
                            { field: 'tax_item', title:'TAX', editor: taxForSaleEditor, template: '#=tax_item.name#', width: '90px' }
                         ]"
                         data-auto-bind="false"
		                 data-bind="source: lineDS" ></div>	
									
		            <!-- Bottom part -->
		            <div class="row-fluid">
			
						<!-- Column -->
						<div class="span4">
							<button class="btn btn-inverse" data-bind="click: addRow"><i class="icon-plus icon-white"></i></button>												

							<!-- Add New Item -->
							<ul class="topnav addNew">
								<li role="presentation" class="dropdown ">
							  		<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
							  			<span data-bind="text: lang.lang.add_new_item"></span>
				    					<span class="caret"></span>
							  		</a>
						  			<ul class="dropdown-menu addNewItem">  				  				
						  				<li><a href='#/item'><span data-bind="text: lang.lang.add_inventory_for_sale"></span></a></li>
						  				<li><a href='#/non_inventory_part'><span data-bind="text: lang.lang.add_noninventory_for_sale"></span></a></li>						  				
						  				<li><a href='#/item_service'><span data-bind="text: lang.lang.add_services"></span></a></li>
						  				<li><a href='#/txn_item'><span data-bind="text: lang.lang.add_transaction_item"></span></a></li>  				
						  				 				
						  			</ul>
							  	</li>				
							</ul>
							<!--End Add New Item -->

							<br><br>
							<div class="well">
								<textarea cols="0" rows="2" class="k-textbox" style="width:100%" data-bind="value: obj.memo2" placeholder="memo for internal ..."></textarea>
								<br>
								<textarea cols="0" rows="2" class="k-textbox" style="width:100%" data-bind="value: obj.memo" placeholder="memo for external ..."></textarea>
							</div>
						</div>
						<!-- Column END -->

						<!-- Column -->
						<div class="span4" align="center">
							<div data-bind="visible: isEdit" style="margin-top: 10%;">
								<h2 data-bind="text: statusObj.text" style="text-transform: uppercase;"></h2>
								<p data-bind="text: statusObj.date"></p>
								<a data-bind="text: statusObj.number,
											attr: { href: statusObj.url }"></a>
							</div>
						</div>
						<!-- Column END -->
						
						<!-- Column -->
						<div class="span4">
							<table class="table table-condensed table-striped table-white">
								<tbody>
									<tr>
										<td class="right" style="width: 60%;"><span data-bind="text: lang.lang.subtotal" style="font-size: 15px; font-weight: 700;"></span></td>
										<td class="right strong" width="40%"><span data-format="n" data-bind="text: obj.sub_total" style="font-size: 15px; font-weight: 700;"></span></td>
									</tr>								
									<tr>
										<td class="right"><span data-bind="text: lang.lang.total_discount"></span></td>
										<td class="right ">
											<span data-format="n" data-bind="text: obj.discount"></span>
	                   					</td>
									</tr>								
									<tr>
										<td class="right"><span data-bind="text: lang.lang.total_tax"></span></td>
										<td class="right "><span data-format="n" data-bind="text: obj.tax"></span></td>
									</tr>															
									<tr>
										<td class="right"><h4 span data-bind="text: lang.lang.total" style="font-weight: 700;"></h4></td>
										<td class="right strong"><h4 data-bind="text: total" style="font-weight: 700;"></h4></td>
									</tr>								
								</tbody>
							</table>
						</div>
						<!-- // Column END -->
						
					</div>	           
					
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
							<div class="span4" style="padding-left: 15px;">
								<input data-role="dropdownlist"
					                   data-value-primitive="true"
					                   data-text-field="name"
					                   data-value-field="id"
					                   data-bind="value: obj.transaction_template_id,
					                              source: txnTemplateDS"
					                   data-option-label="Select Template..." />
					         	
							</div>
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
						  				<li id="savePrint"><span data-bind="text: lang.lang.save_print"></span></li>
						  			</ul>
							  	</span>
							  	<span class="btn-btn" id="saveClose"><span data-bind="text: lang.lang.save_close"></span></span>
							  	<span class="btn-btn" id="saveDraft1" data-bind="invisible: isEdit"><span data-bind="text: lang.lang.save_draft"></span></span>
							</div>
						</div>
					</div>
					<!-- // Form actions END -->								

				</div>							
			</div>
		</div>
	</div>
</script>
<script id="quote-template" type="text/x-kendo-tmpl">
	<tr data-uid="#: uid #">
		<td>
			<i class="icon-trash" data-bind="events: { click: removeRow }"></i>
			#:banhji.quote.lineDS.indexOf(data)+1#
		</td>
		<td>
			<input id="ccbItem" name="ccbItem-#:uid#"
				   data-role="combobox"
				   data-template="item-list-tmpl"
				   data-value-primitive="true"
                   data-text-field="name"
                   data-value-field="id"
                   data-filter="contains"
                   data-min-length="3"
                   data-bind="value: item_id, 
                   			  source: itemDS,
                   			  events:{ change: itemChanges }"
                   placeholder="Add Item..." 
                   required data-required-msg="required" style="width: 100%" />			
		</td>		
		<td>
			<input id="txtDescription-#:uid#" name="txtDescription-#:uid#" 
					type="text" class="k-textbox" 
					data-bind="value: description"
					style="width: 100%; margin-bottom: 0;" />
		</td>
		<td>
			<input id="txtQuantity-#:uid#" name="txtQuantity-#:uid#"
            	   type="number" class="k-textbox"
            	   min="0"
                   data-bind="value: quantity, events: {change : changes}"
                   required data-required-msg="required"
                   placeholder="Qty..." 
                   style="text-align: right; width: 40%;" />

			<input id="ddlMesurement"
					data-role="dropdownlist"
					data-value-primitive="true"                 
                	data-text-field="measurement"
                   	data-value-field="measurement_id"
                   	data-bind="value: measurement_id,
                   			  source: item_prices,
                   			  events:{ change: measurementChanges }"
                   data-option-label="UM"
                   style="width: 57%;" />
		</td>					
		<td>
			<input id="txtPrice-#:uid#" name="txtPrice-#:uid#"
            	   type="number" class="k-textbox"
            	   min="0"
                   data-bind="value: price, events: {change : changes}"
                   required data-required-msg="required"
                   placeholder="Price..." 
                   style="text-align: right; width: 100%;" />
		</td>
		<td class="center" data-bind="visible: showDiscount">
			<input data-role="numerictextbox"
                   data-format="p0"
                   data-min="0"
                   data-max="0.99"
                   data-step="0.1"                   
                   data-bind="value: discount,
                              events: { change: changes }"
                   style="width: 100%;">			
		</td>				
		<td class="right">
			<span data-format="n" data-bind="text: amount"></span> 						
		</td>
		<td>
			<input 	id="ccbTaxItem" 
					name="ccbTaxItem-#:uid#"
					data-header-template="tax-header-tmpl"
				   	data-role="combobox"   
				   	data-value-primitive="true"
                   	data-text-field="name"
                   	data-value-field="id"
                   	data-bind="value: tax_item_id, 
                   			  source: taxItemDS,
                   			  events:{ change: changes }"
                   	style="width: 100%" />			
		</td>						
    </tr>
</script>
<script id="saleOrder" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">
				<div id="example" class="k-content">

		    		<span class="glyphicons no-js remove_2 pull-right" 
		    				onclick="javascript:window.history.back()"
							data-bind="click: cancel"><i></i></span>

			        <h2>Sale Order</h2>

				    <br>

					<!-- Upper Part -->
					<div class="row-fluid">
						<div class="span4">
							<div class="box-generic well" style="height: 190px;">				
								<table class="table table-borderless table-condensed cart_total">									
									<tr>
										<td style="width: 50px;"><span data-bind="text: lang.lang.no_"></span></td>
										<td>
											<input id="txtNumber" name="txtNumber" class="k-textbox" 
													data-bind="value: obj.number,
																disabled: obj.is_recurring,
																events:{change:checkExistingNumber}" 
													required data-required-msg="required" 
													placeholder="eg. ABC00001" style="width: 83%; float: left; margin-right: 5px;"" />
											<div style="padding-left: 0; width: 25px; float: left;">
												<a class="glyphicons no-js qrcode" data-bind="click: generateNumber" title="Generate Number" style="float: left; margin: 2px 0 0 0 ;"><i></i></a>
											</div>
										</td>
									</tr>
									<tr>
										<td><span data-bind="text: lang.lang.date"></span></td>
										<td class="right">
											<input id="issuedDate" name="issuedDate" 
													data-role="datepicker"
													data-format="dd-MM-yyyy"
													data-parse-formats="yyyy-MM-dd HH:mm:ss"
													data-bind="value: obj.issued_date, 
																events:{ change : setRate }" 
													required data-required-msg="required"
													style="width:100%;" />
										</td>
									</tr>								
									<tr>
										<td><span data-bind="text: lang.lang.customers"></span></td>
										<td>
											<input id="cbbContact" name="cbbContact"
												   data-role="dropdownlist"
												   data-header-template="contact-header-tmpl"
								                   data-template="contact-list-tmpl"
								                   data-auto-bind="false"
								                   data-value-primitive="false"
								                   data-filter="startswith"
								                   data-text-field="name"
								                   data-value-field="id"
								                   data-bind="value: obj.contact,
								                              source: contactDS,
								                              events: {change: contactChanges}"
								                   data-option-label="Select Customer..."
								                   required data-required-msg="required" style="width: 100%;" />
										</td>
									</tr>																															
								</table>

								<div class="strong" style="background: #eee;  border: 1px solid #ddd; width: 100%; padding: 10px;" align="center"
									data-bind="style: {backgroundColor: amtDueColor}">
									<div align="left"><span data-bind="text: lang.lang.amount_ordered"></span></div>
									<h2 data-bind="text: total" align="right"></h2>
								</div>

							</div>						
						</div>					   

						<div class="span8">

							<div class="box-generic-noborder" style="min-height: 234px !important">

							    <!-- Tabs Heading -->
							    <div class="tabsbar tabsbar-2">
							        <ul class="row-fluid row-merge">
							        	<li class="span1 glyphicons cogwheels active"><a href="#tab1-5" data-toggle="tab"><i></i> </a>
							            </li>
							            <li class="span1 glyphicons adress_book"><a href="#tab2-5" data-toggle="tab"><i></i> </a>
							            </li>
							            <li class="span1 glyphicons circle_info"><a href="#tab3-5" data-toggle="tab"><i></i> </a>
							            </li>
							            <li class="span1 glyphicons paperclip"><a href="#tab4-5" data-toggle="tab"><i></i></a>
							            </li>						            
							            <li class="span1 glyphicons history"><a href="#tab5-5" data-toggle="tab"><i></i> Recuring</a>
							            </li>						            								            
							        </ul>
							    </div>
							    <!-- // Tabs Heading END -->

							    <div class="tab-content">

							    	<!-- Options Tab content -->
							        <div class="tab-pane active" id="tab1-5">						            
							            <table class="table table-borderless table-condensed cart_total">							            
											<tr>
												<td>
													<span data-bind="text: lang.lang.balance"></span> <span data-bind="text: balance"></span>
												</td>										
												<td>
													<span data-bind="text: lang.lang.credit_allowed"></span> <span data-format="n" data-bind="text: obj.credit_allowed"></span>
												</td>
											</tr>
								            <tr>
								            	<td><span data-bind="text: lang.lang.expected_date"></span></td>
								            	<td>
								            		<input id="txtDueDate" name="txtDueDate" 
															data-role="datepicker"
															data-format="dd-MM-yyyy"
															data-parse-formats="yyyy-MM-dd" 
															data-bind="value: obj.due_date" 
															required data-required-msg="required"
															style="width:100%;" />
								            	</td>
								            </tr>							           
											<tr>							            				
												<td>
								            		<span data-bind="text: lang.lang.reference"></span>	                    		
								            	</td>
								            	<td>
													<input data-role="combobox"
															data-template="reference-list-tmpl"
								              				data-value-primitive="true"
								              				data-auto-bind="false"
															data-text-field="number" 
								              				data-value-field="id"						              				 
								              				data-bind="value: obj.reference_id,
								              							enabled: enableRef,
								              							source: referenceDS,						              							
								              							events:{change: referenceChanges}" 
								              				style="width: 100%" />
												</td>
											</tr>	
							            </table>						            
							        </div>
							        <!-- // Options Tab content END -->

							        <!-- Address Tab content -->
							        <div class="tab-pane" id="tab2-5">
							        	<span data-bind="text: lang.lang.billing_address"></span>
										<textarea cols="0" rows="2" class="k-textbox" style="width:100%" data-bind="value: obj.bill_to" placeholder="Billing to ..."></textarea>								
										
										<span data-bind="text: lang.lang.delivery_address"></span>
										<textarea cols="0" rows="2" class="k-textbox" style="width:100%" data-bind="value: obj.ship_to" placeholder="Shipping to ..."></textarea>	
												
							        </div>
							        <!-- // Address Tab content END -->

							        <!-- Info Tab content -->
							        <div class="tab-pane" id="tab3-5">
							        	
										<table class="table table-borderless table-condensed cart_total">
											<tr>
												<td><span data-bind="text: lang.lang.segments"></span></td>
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
											<tr>
												<td><span data-bind="text: lang.lang.job"></span></td>
												<td>
													<input id="ddlJob" name="ddlJob"
														   data-role="dropdownlist"
														   data-header-template="job-header-tmpl"
														   data-template="job-list-tmpl"
														   data-auto-bind="false"				                
										                   data-value-primitive="true"		   
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.job_id, 
										                   			source: jobDS"
										                   data-option-label="Select job..." 
										                   style="width: 100%" />										
												</td>
											</tr>											
							            </table>
												
							        </div>
							        <!-- // Info Tab content END -->

							        <!-- Attach Tab content -->
							        <div class="tab-pane" id="tab4-5">
							         	<p><span data-bind="text: lang.lang.file_type"></span>: [PDF, JPG, JPEG, TIFF, PNG, GIF]</p>		
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

							        </div>
							        <!-- // Attach Tab content END -->						        

							        <!-- Recuring Tab content -->
							        <div class="tab-pane" id="tab5-5">							            	
							            
							             <table style="width: 100%" class="table borderless">
							            	<tr align="right">
							            		<td style="border-top: 0;">
							            			<span data-bind="text: lang.lang.name"></span>
							            		</td>
							            		<td style="border-top: 0;">
							            			<input id="txtRecurringName" name="txtRecurringName"
							            					class="k-textbox" 
							            					data-bind="value: obj.recurring_name" 
							            					placeholder="Recurring name.." 
							            					style="width: 43%; " />

							            			<span data-bind="text: lang.lang.start"></span>

									                <input data-role="datepicker"
															data-format="dd-MM-yyyy"
															data-parse-formats="yyyy-MM-dd"
															data-bind="value: obj.start_date"
															style="width: 40%; " />
							            		</td>
							            	</tr>
							            	<tr align="right">
							            		<td style="border-top: 0;">
								            		<span data-bind="text: lang.lang.every"></span>
								            	</td>
							            		<td style="border-top: 0;">
								            		<input data-role="numerictextbox"
									                   data-format="n0"
									                   data-min="0"								                   
									                   data-bind="value: obj.interval"
									                   style="width: 45%; " />

								            		<input data-role="dropdownlist"									                   
										                   data-value-primitive="true"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.frequency,
										                              source: frequencyList,
										                              events: { change: frequencyChanges }"
										                   style="width: 45%;" />
								            	</td>
							            	</tr>
								            <tr align="right">
								            	<td style="border-top: 0;">
								            		<span data-bind="text: lang.lang.on"></span>
								            	</td>							            	
								            	<td style="border-top: 0;">

								            		<input data-role="dropdownlist"									                   
										                   data-value-primitive="true"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.month,
										                   			  visible: showMonth,
										                              source: monthList"										                   
										                   style="width: 45%;" />

								            		<input data-role="dropdownlist"									                   
										                   data-value-primitive="true"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.month_option,
										                   			  visible: showMonthOption,
										                              source: monthOptionList,
										                              events: { change: monthOptionChanges }"										                   
										                   style="width: 45%;" />

								            		<input data-role="dropdownlist"									                   
										                   data-value-primitive="true"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.week,
										                   			  visible: showWeek,
										                              source: weekDayList"										                  
										                   style="width: 45%;" />										            
										        
								            		<input data-role="dropdownlist"									                   
										                   data-value-primitive="true"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.day,
										                   			  visible: showDay,
										                              source: dayList"										                   
										                   style="width: 45%;" />

								            	</td>
								            </tr>
							            </table>

							            <span id="saveRecurring" class="btn btn-icon btn-default glyphicons history" data-bind="visible: obj.isNew" style="float: right; margin-top: -12px;"><i></i> <span data-bind="text: lang.lang.save_recurring"></span></span>									     
							            
							        </div>
							        <!-- // Recuring Tab content END -->						        								        

							    </div>
							</div>

					    </div>
					</div>

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
						        	var rowIndex = banhji.saleOrder.lineDS.indexOf(dataItem)+1;
						        	return '<i class=icon-trash data-bind=click:removeRow></i>' + ' ' + rowIndex;
						      	}
						    },
		                 	{ field: 'item', title: 'PRODUCTS/SERVICES', editor: itemEditor, template: '#=item.name#', width: '170px' },
                            { field: 'description', title:'DESCRIPTION', width: '250px' },                            
                            {
							    field: 'quantity',
							    title: 'QTY',
							    format: '{0:n}',
							    editor: numberTextboxEditor,
							    width: '120px',
							    attributes: { style: 'text-align: right;' }
							},
                            { field: 'measurement', title: 'UOM', editor: measurementEditor, template: '#=measurement.measurement#', width: '80px' },
                            {
							    field: 'price',
							    title: 'PRICE',
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
                            { field: 'amount', title:'AMOUNT', format: '{0:n}', editable: 'false', attributes: { style: 'text-align: right;' }, width: '120px' },
                            { field: 'tax_item', title:'TAX', editor: taxForSaleEditor, template: '#=tax_item.name#', width: '90px' },
                         	{ field: 'required_date', title:'DELIVERY DATE', format: '{0: dd-MM-yyyy}', hidden: true, editor: dateEditor, width: '120px' },
                         	{ field: 'contact', title:'SUPPLIER', hidden: true, editor: supplierEditor, template: '#=contact.name#', width: '150px' },
                         	{
							    field: 'cost',
							    title: 'COST',
							    format: '{0:n}',
							    hidden: true,
							    editor: numberTextboxEditor,
							    width: '120px',
							    attributes: { style: 'text-align: right;' }
							}
                         ]"
                         data-auto-bind="false"
		                 data-bind="source: lineDS" ></div>			    

		            <!-- Bottom part -->
		            <div class="row-fluid">
			
						<!-- Column -->
						<div class="span4">
							<button class="btn btn-inverse" data-bind="click: addRow"><i class="icon-plus icon-white"></i></button>												

							<!-- Add New Item -->
							<ul class="topnav addNew">
								<li role="presentation" class="dropdown ">
							  		<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
							  			<span data-bind="text: lang.lang.add_new_item"></span>
				    					<span class="caret"></span>
							  		</a>
						  			<ul class="dropdown-menu addNewItem">  				  				
						  				<li><a href='#/item'><span data-bind="text: lang.lang.add_inventory_for_sale"></span></a></li>
						  				<li><a href='#/non_inventory_part'><span data-bind="text: lang.lang.add_noninventory_for_sale"></span></a></li>						  				
						  				<li><a href='#/item_service'><span data-bind="text: lang.lang.add_services"></span></a></li>
						  				<li><a href='#/txn_item'><span data-bind="text: lang.lang.add_transaction_item"></span></a></li>	
						  			</ul>
							  	</li>				
							</ul>
							<!--End Add New Item -->
							
							<br><br>
							<div class="well">
								<textarea cols="0" rows="2" class="k-textbox" style="width:100%" data-bind="value: obj.memo2" placeholder="memo for internal ..."></textarea>
								<br>						
								<textarea cols="0" rows="2" class="k-textbox" style="width:100%" data-bind="value: obj.memo" placeholder="memo for external ..."></textarea>
							</div>
						</div>
						<!-- Column END -->

						<!-- Column -->
						<div class="span4" align="center">
							<div data-bind="visible: isEdit" style="margin-top: 10%;">
								<h2 data-bind="text: statusObj.text" style="text-transform: uppercase;"></h2>
								<p data-bind="text: statusObj.date"></p>
								<a data-bind="text: statusObj.number,
											attr: { href: statusObj.url }"></a>
							</div>
						</div>
						<!-- Column END -->
						
						<!-- Column -->
						<div class="span4">
							<table class="table table-condensed table-striped table-white">
								<tbody>
									<tr>
										<td class="right" style="width: 60%"><span data-bind="text: lang.lang.subtotal" style="font-size: 15px; font-weight: 700;"></span></td>
										<td class="right "><span data-format="n" data-bind="text: obj.sub_total" style="font-size: 15px; font-weight: 700;"></span></td>
									</tr>								
									<tr>
										<td class="right"><span data-bind="text: lang.lang.total_discount"></span></td>
										<td class="right ">
											<span data-format="n" data-bind="text: obj.discount"></span>
	                   					</td>
									</tr>								
									<tr>
										<td class="right"><span data-bind="text: lang.lang.total_tax"></span></td>
										<td class="right "><span data-format="n" data-bind="text: obj.tax"></span></td>
									</tr>
									<tr>
										<td class="right"><h4 data-bind="text: lang.lang.total" style="font-weight: 700;"></h4></td>
										<td class="right "><h4 data-bind="text: total" style="font-weight: 700;"></h4></td>
									</tr>								
								</tbody>
							</table>
						</div>
						<!-- // Column END -->

					</div>
					
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
							<div class="span4" style="padding-left: 15px;">
								<input data-role="dropdownlist"
					                   data-value-primitive="true"
					                   data-text-field="name"
					                   data-value-field="id"
					                   data-bind="value: obj.transaction_template_id,
					                              source: txnTemplateDS"
					                   data-option-label="Select Template..." />
								
							</div>
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
						  				<li id="savePrint"><span data-bind="text: lang.lang.save_print"></span></li>
						  			</ul>
							  	</span>
							  	<span class="btn-btn" id="saveClose"><span data-bind="text: lang.lang.save_close"></span></span>
							  	<span class="btn-btn" id="saveDraft1" data-bind="invisible: isEdit"><span data-bind="text: lang.lang.save_draft"></span></span>								
							</div>
						</div>
					</div>
					<!-- // Form actions END -->

				</div>
			</div>
		</div>
	</div>
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
								<table class="table table-borderless table-condensed cart_total">									
									<tr>
										<td style="width: 50px;"><span data-bind="text: lang.lang.no_"></span></td>
										<td>
											<input id="txtNumber" name="txtNumber" class="k-textbox" 
													data-bind="value: obj.number,
																disabled: obj.is_recurring,
																events:{change:checkExistingNumber}" 
													required data-required-msg="required" 
													placeholder="eg. ABC00001" style="width: 83%; float: left; margin-right: 5px;"" />
											<div style="padding-left: 0; width: 25px; float: left;">
												<a class="glyphicons no-js qrcode" data-bind="click: generateNumber" title="Generate Number" style="float: left; margin: 2px 0 0 0 ;"><i></i></a>
											</div>
										</td>
									</tr>
									<tr>
										<td><span data-bind="text: lang.lang.date"></span></td>
										<td class="right">
											<input id="issuedDate" name="issuedDate" 
													data-role="datepicker"
													data-format="dd-MM-yyyy"
													data-parse-formats="yyyy-MM-dd HH:mm:ss"
													data-bind="value: obj.issued_date, 
																events:{ change : setRate }" 
													required data-required-msg="required"
													style="width: 210px;" />
										</td>
									</tr>
									<tr>
										<td><span data-bind="text: lang.lang.customers"></span></td>
										<td>
											<input id="cbbContact" name="cbbContact"
												   data-role="dropdownlist"
												   data-header-template="contact-header-tmpl"
								                   data-template="contact-list-tmpl"
								                   data-auto-bind="false"
								                   data-value-primitive="false"
								                   data-filter="startswith"
								                   data-text-field="name"
								                   data-value-field="id"
								                   data-bind="value: obj.contact,
								                              source: contactDS,
								                              events: {change: contactChanges}"
								                   data-option-label="Select Customer..."
								                   required data-required-msg="required" style="width: 210px;" />
										</td>
									</tr>
								</table>

								<div class="strong" style="background: #eee;  border: 1px solid #ddd; width: 100%; padding: 10px;" align="center"
									data-bind="style: {backgroundColor: amtDueColor}">
									<div align="left"><span data-bind="text: lang.lang.amount_deposited"></span></div>
									<h2 data-bind="text: total" align="right"></h2>
								</div>

							</div>
						</div>					   

						<div class="span8">

							<div class="box-generic-noborder" style="min-height: 234px !important">

							    <!-- Tabs Heading -->
							    <div class="tabsbar tabsbar-2">
							        <ul class="row-fluid row-merge">
							        	<li class="span1 glyphicons cogwheels active"><a href="#tab1-5" data-toggle="tab"><i></i> </a>
							            </li>
							            <li class="span1 glyphicons adress_book"><a href="#tab2-5" data-toggle="tab"><i></i> </a>
							            </li>
							            <li class="span1 glyphicons circle_info"><a href="#tab3-5" data-toggle="tab"><i></i> </a>
							            </li>
							            <li class="span1 glyphicons paperclip"><a href="#tab4-5" data-toggle="tab"><i></i></a>
							            </li>						            
							            <li class="span1 glyphicons history"><a href="#tab5-5" data-toggle="tab"><i></i> <span data-bind="text: lang.lang.recurring"></span></a>
							            </li>
							            <!-- <li class="span1 glyphicons show_liness"><a href="#tab5-6" data-toggle="tab"><i></i></a>
							            </li> -->						            								            
							        </ul>
							    </div>
							    <!-- // Tabs Heading END -->

							    <div class="tab-content">

							    	<!-- Options Tab content -->
							        <div class="tab-pane active" id="tab1-5">						            
							            <table class="table table-borderless table-condensed cart_total">							            
											<tr>
												<td>
													<span data-bind="text: lang.lang.balance"></span> <span data-bind="text: balance"></span>
												</td>										
												<td>
													<span data-bind="text: lang.lang.credit_allowed"></span> <span data-format="n" data-bind="text: obj.credit_allowed"></span>
												</td>
											</tr> 
											<tr>
												<td style="width: 15%"><span data-bind="text: lang.lang.deposit_to"></span></td>
												<td style="width: 40%">
													<input id="cbbAccount" name="cbbAccount"
														   data-role="combobox"
										                   data-value-primitive="true"
										                   data-header-template="account-header-tmpl"
										                   data-template="account-list-tmpl"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.account_id,
										                   			  source: depositAccountDS"
										                   data-placeholder="Add Account.."
										                   required data-required-msg="required" style="width: 100%" />
												</td>
											</tr>  
											<tr>							            				
												<td>
								            		<span data-bind="text: lang.lang.reference"></span>   						     		
								            	</td>
								            	<td>
													<input data-role="combobox"
															data-template="reference-list-tmpl"
								              				data-value-primitive="true"
												            data-auto-bind="false"
															data-text-field="number" 
								              				data-value-field="id"						              				 
								              				data-bind="value: obj.reference_id,
								              							enabled: enableRef,
								              							source: referenceDS,						              							
								              							events:{change: referenceChanges}" 
								              				style="width: 100%" />
												</td>
											</tr>	
							            </table>						            
							        </div>
							        <!-- // Options Tab content END -->

							        <!-- Address Tab content -->
							        <div class="tab-pane" id="tab2-5">
							        	<span data-bind="text: lang.lang.billing_address"></span>
										<textarea cols="0" rows="2" class="k-textbox" style="width:100%" data-bind="value: obj.bill_to" placeholder="Billing to ..."></textarea>								
										
										<span data-bind="text: lang.lang.delivery_address"></span>
										<textarea cols="0" rows="2" class="k-textbox" style="width:100%" data-bind="value: obj.ship_to" placeholder="Shipping to ..."></textarea>	
												
							        </div>
							        <!-- // Address Tab content END -->

							        <!-- Info Tab content -->
							        <div class="tab-pane" id="tab3-5">
							        	
										<table class="table table-borderless table-condensed cart_total">							                        	
											<tr>
												<td><span data-bind="text: lang.lang.segments"></span></td>
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
											<tr>
												<td><span data-bind="text: lang.lang.job"></span></td>
												<td>
													<input id="ddlJob" name="ddlJob"
														   data-role="dropdownlist"
														   data-header-template="job-header-tmpl"
														   data-template="job-list-tmpl"
														   data-auto-bind="false"				                
										                   data-value-primitive="true"		   
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.job_id, 
										                   			source: jobDS"
										                   data-option-label="Select job..." 
										                   style="width: 100%" />										
												</td>
											</tr>											
							            </table>
												
							        </div>
							        <!-- // Info Tab content END -->

							        <!-- Attach Tab content -->
							        <div class="tab-pane" id="tab4-5">
							         	<p><span data-bind="text: lang.lang.file_type"></span>: [PDF, JPG, JPEG, TIFF, PNG, GIF]</p> 
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

							        </div>
							        <!-- // Attach Tab content END -->						        

							        <!-- Recuring Tab content -->
							        <div class="tab-pane" id="tab5-5">							            	
							            
							            <table style="width: 100%" class="table borderless">
							            	<tr align="right">
							            		<td style="border-top: 0;">
							            			<span data-bind="text: lang.lang.name"></span>
							            		</td>
							            		<td style="border-top: 0;">
							            			<input id="txtRecurringName" name="txtRecurringName"
							            					class="k-textbox" 
							            					data-bind="value: obj.recurring_name" 
							            					placeholder="Recurring name.." 
							            					style="width: 43%; " />

							            			<span data-bind="text: lang.lang.start"></span>

									                <input data-role="datepicker"
															data-format="dd-MM-yyyy"
															data-parse-formats="yyyy-MM-dd"
															data-bind="value: obj.start_date"
															style="width: 40%; " />
							            		</td>
							            	</tr>
							            	<tr align="right">
							            		<td style="border-top: 0;">
								            		<span data-bind="text: lang.lang.every"></span>
								            	</td>
							            		<td style="border-top: 0;">
								            		<input data-role="numerictextbox"
									                   data-format="n0"
									                   data-min="0"								                   
									                   data-bind="value: obj.interval"
									                   style="width: 45%; " />

								            		<input data-role="dropdownlist"									                   
										                   data-value-primitive="true"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.frequency,
										                              source: frequencyList,
										                              events: { change: frequencyChanges }"
										                   style="width: 45%;" />
								            	</td>
							            	</tr>
								            <tr align="right">
								            	<td style="border-top: 0;">
								            		<span data-bind="text: lang.lang.on"></span>
								            	</td>							            	
								            	<td style="border-top: 0;">

								            		<input data-role="dropdownlist"									                   
										                   data-value-primitive="true"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.month,
										                   			  visible: showMonth,
										                              source: monthList"										                   
										                   style="width: 45%;" />

								            		<input data-role="dropdownlist"									                   
										                   data-value-primitive="true"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.month_option,
										                   			  visible: showMonthOption,
										                              source: monthOptionList,
										                              events: { change: monthOptionChanges }"										                   
										                   style="width: 45%;" />

								            		<input data-role="dropdownlist"									                   
										                   data-value-primitive="true"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.week,
										                   			  visible: showWeek,
										                              source: weekDayList"										                  
										                   style="width: 45%;" />										            
										        
								            		<input data-role="dropdownlist"									                   
										                   data-value-primitive="true"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.day,
										                   			  visible: showDay,
										                              source: dayList"										                   
										                   style="width: 45%;" />

								            	</td>
								            </tr>
							            </table>

							            <span id="saveRecurring" class="btn btn-icon btn-default glyphicons history" data-bind="visible: obj.isNew" style="float: right; margin-top: -12px;"><i></i> <span data-bind="text: lang.lang.save_recurring"></span></span>								     
							            
							        </div>
							        <!-- // Recuring Tab content END -->						        								        

							        <div class="tab-pane saleSummaryCustomer" id="tab5-6">
										<table class="table table-borderless table-condensed">
									        <thead>
									            <tr>
									                <th>NUMBER</th>
									                <th>ACCOUNT</th>                		                
									                <th class="right">DEBITS (Dr)</th>
									                <th class="right">CREDITS (Cr)</th>		                
									            </tr>
									        </thead> 
									        <tbody>
									        	<tr>
									        		<td>1</td>
									        		<td>2</td>
									        		<td class="right">3</td>
									        		<td class="right">4</td>
									        	</tr>
									        	<tr>
									        		<td>1</td>
									        		<td>2</td>
									        		<td class="right">3</td>
									        		<td class="right">4</td>
									        	</tr>
									        </tbody>			        
									    </table>
									</div>

							    </div>
							</div>

					    </div>
					</div>

					<!-- Item List -->
					<table class="table table-bordered table-primary table-striped table-vertical-center">
				        <thead>
				            <tr>
				                <th style="width: 50px;"><span data-bind="text: lang.lang.no_"></span></th>			               
				                <th style="width: 30%;"><span data-bind="text: lang.lang.account"></span></th>
				                <th><span data-bind="text: lang.lang.description"></span></th>
				                <th style="width: 15%;"><span data-bind="text: lang.lang.reference"></span></th>			                
				                <th style="width: 15%;"><span data-bind="text: lang.lang.amount"></span></th>			                
				            </tr> 
				        </thead>
				        <tbody data-role="listview" 
				        		data-template="customerDeposit-template" 
				        		data-auto-bind="false"
				        		data-bind="source: lineDS"></tbody>			        
				    </table>			    
									
		            <!-- Bottom part -->
		            <div class="row">
			
						<!-- Column -->
						<div class="span6">
							<button class="btn btn-inverse" data-bind="click: addRow"><i class="icon-plus icon-white"></i></button>
							
							<!-- Add New Item -->
							<!-- <ul class="topnav addNew">
								<li role="presentation" class="dropdown ">
							  		<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
							  			<span data-bind="text: lang.lang.add_new_item"></span>
				    					<span class="caret"></span>
							  		</a>
						  			<ul class="dropdown-menu addNewItem">  				  				
						  				<li><a href='#/item'><span data-bind="text: lang.lang.add_inventory_for_sale"></span></a></li>
						  				<li><a href='#/non_inventory_part'><span data-bind="text: lang.lang.add_noninventory_for_sale"></span></a></li>
						  				<li><a href='#/fixed_assets'><span data-bind="text: lang.lang.add_fixed_assets"></span></a></li>
						  				<li><a href='#/item_service'><span data-bind="text: lang.lang.add_services"></span></a></li>
						  				<li><a href='#/txn_item'><span data-bind="text: lang.lang.add_transaction_item"></span></a></li> 
						  			</ul>
							  	</li>				
							</ul> -->
							<!--End Add New Item -->

							<!--Add Account -->
							<a href="#/account" class="btn btn-default" style="background: #203864; color: #fff;"><span data-bind="text: lang.lang.add_account"></span></a>

						</div>
						<!-- Column END -->


						
						<!-- Column -->
						<div class="span6">
							<table class="table table-borderless table-condensed cart_total">
								<tbody>								
									<tr>
										<td class="right" style="width: 60%"><span data-bind="text: lang.lang.total" style="font-size: 15px; font-weight: 700;"></span>:</td>
										<td class="right "><span data-bind="text: total" style="font-size: 15px; font-weight: 700;"></span></td>
									</tr>								
								</tbody>
							</table>
						</div>
						<!-- // Column END -->
						
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
							<div class="span4" style="padding-left: 15px;">
								<input data-role="dropdownlist"
					                   data-value-primitive="true"
					                   data-text-field="name"
					                   data-value-field="id"
					                   data-bind="value: obj.transaction_template_id,
					                              source: txnTemplateDS"
					                   data-option-label="Select Template..." />
								
							</div>
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
						  				<li id="savePrint"><span data-bind="text: lang.lang.save_print"></span></li>
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
<script id="customerDeposit-template" type="text/x-kendo-tmpl">
	<tr data-uid="#: uid #">		
		<td class="center">
			<i class="icon-trash" data-bind="events: { click: removeRow }"></i>
			#:banhji.customerDeposit.lineDS.indexOf(data)+1#			
		</td>				
		<td>
			<input id="cbbAccounts" name="cbbAccounts"
				   data-role="combobox"
                   data-header-template="account-header-tmpl"                   
                   data-template="account-list-tmpl"
                   data-value-primitive="true"
                   data-text-field="name"
                   data-value-field="id"
                   data-bind="value: account_id,
                              source: accountDS"
                   data-placeholder="Add Account.."
                   required data-required-msg="required" style="width: 100%" />	
		</td>		
		<td>
			<input name="description" 
					type="text" class="k-textbox" 
					data-bind="value: description"					
					style="width: 100%; margin-bottom: 0;" />
		</td>
		<td>
			<input type="text" class="k-textbox" 
					data-bind="value: reference_no"				
					style="width: 100%; margin-bottom: 0;" />		
		</td>		
		<td>
			<input id="txtAmount-#:uid#" name="txtAmount-#:uid#"
			   type="number" class="k-textbox"
			   min="0"
		       data-bind="value: amount, events: {change : changes}"
		       required data-required-msg="required"
		       placeholder="Amount..." 
		       style="text-align: right; width: 100%;" />
		</td>			
    </tr>   
</script>
<script id="cashSale" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">					
				<div id="example" class="k-content">					
				    
			    	<span class="glyphicons no-js remove_2 pull-right" 
		    				onclick="javascript:window.history.back()"
							data-bind="click: cancel"><i></i></span>

			        <h2 data-bind="text: lang.lang.cash_sale"></h2>			    		   

				    <br>				   				
						
					<!-- Upper Part -->
					<div class="row-fluid">
						<div class="span4">
							<div class="box-generic well" style="height: 190px;">				
								<table class="table table-borderless table-condensed cart_total">									
									<tr>
										<td style="width: 50px;"><span data-bind="text: lang.lang.no_"></span></td>
										<td>
											<input id="txtNumber" name="txtNumber" class="k-textbox" 
													data-bind="value: obj.number,
																disabled: obj.is_recurring,
																events:{change:checkExistingNumber}" 
													required data-required-msg="required" 
													placeholder="eg. ABC00001" style="width: 83%; float: left; margin-right: 5px;"" />
											<div style="padding-left: 0; width: 25px; float: left;">
												<a class="glyphicons no-js qrcode" data-bind="click: generateNumber" title="Generate Number" style="float: left; margin: 2px 0 0 0 ;"><i></i></a>
											</div>
										</td>
									</tr>
									<tr>
										<td><span data-bind="text: lang.lang.date"></span></td>
										<td class="right">
											<input id="issuedDate" name="issuedDate" 
													data-role="datepicker"
													data-format="dd-MM-yyyy"
													data-parse-formats="yyyy-MM-dd HH:mm:ss"
													data-bind="value: obj.issued_date, 
																events:{ change : setRate }" 
													required data-required-msg="required"
													style="width: 210px;" />
										</td>
									</tr>
									<tr>
										<td><span data-bind="text: lang.lang.type"></span></td>
										<td>
											<input id="cbbType" name="cbbType"
												   data-role="dropdownlist"											                    
								                   data-value-primitive="true"
								                   data-text-field="name"
								                   data-value-field="type"
								                   data-bind="value: obj.type,
								                              source: typeList,
								                              events:{ change: typeChanges }"
								                   required data-required-msg="required" style="width: 210px" />
										</td>
									</tr>								
									<tr>
										<td><span data-bind="text: lang.lang.customers"></span></td>
										<td>
											<input id="cbbContact" name="cbbContact"
												   data-role="dropdownlist"
												   data-header-template="contact-header-tmpl"
								                   data-template="contact-list-tmpl"
								                   data-auto-bind="false"
								                   data-value-primitive="false"
								                   data-filter="startswith"
								                   data-text-field="name"
								                   data-value-field="id"
								                   data-bind="value: obj.contact,
								                              source: contactDS,
								                              events: {change: contactChanges}"
								                   data-option-label="Select Customer..."
								                   required data-required-msg="required" style="width: 210px;" />
										</td>
									</tr>																															
								</table>

								<div class="strong" style="background: #eee;  border: 1px solid #ddd; width: 100%; padding: 10px;" align="center"
									data-bind="style: { backgroundColor: amtDueColor}">
									<div align="left"><span data-bind="text: lang.lang.amount_received"></span></div>
									<h2 data-bind="text: amount_due" align="right"></h2>
								</div>

							</div>						
						</div>					   

						<div class="span8">

							<div class="box-generic-noborder" style="min-height: 234px !important">

							    <!-- Tabs Heading -->
							    <div class="tabsbar tabsbar-2">
							        <ul class="row-fluid row-merge">
							        	<li class="span1 glyphicons cogwheels active"><a href="#tab1-7" data-toggle="tab"><i></i></a>
							            </li>
							            <li class="span1 glyphicons adress_book"><a href="#tab2-7" data-toggle="tab"><i></i></a>
							            </li>
							            <li class="span1 glyphicons circle_info"><a href="#tab3-7" data-toggle="tab"><i></i></a>
							            </li>
							            <li class="span1 glyphicons link"><a href="#tab4-7" data-toggle="tab"><i></i></a>
							            </li>
							            <li class="span1 glyphicons sort"><a href="#tab5-7" data-toggle="tab"><i></i></a>
							            </li>
							            <li class="span1 glyphicons paperclip"><a href="#tab6-7" data-toggle="tab"><i></i></a>
							            </li>
							            <li class="span1 glyphicons history"><a href="#tab7-7" data-toggle="tab"><i></i></a>
							            </li>
							        </ul>
							    </div>
							    <!-- // Tabs Heading END -->

							    <div class="tab-content">

							    	<!-- Options Tab content -->
							        <div class="tab-pane active" id="tab1-7">						            
							            <table style="margin-bottom: 0;" class="table table-borderless table-condensed cart_total">							            
											<tr>
												<td>
													<span data-bind="text: lang.lang.balance"></span>
													<span data-bind="text: balance"></span>
												</td>
												<td>
													<span data-bind="text: lang.lang.credit_allowed"></span>
													<span data-format="n" data-bind="text: obj.credit_allowed"></span>
												</td>
											</tr>
											<tr>
								            	<td><span data-bind="text: lang.lang.payment_method"></span></td>				
												<td>
													<input data-role="dropdownlist"
								              				data-value-primitive="true"
								              				data-header-template="customer-payment-method-header-tmpl"
															data-text-field="name" 
								              				data-value-field="id"
								              				data-bind="value: obj.payment_method_id,
								              							source: paymentMethodDS"
								              				data-option-label="Select method..."							              				 
								              				style="width: 100%" />
												</td>
											</tr>
								            <tr>
								            	<td><span data-bind="text: lang.lang.cash_account"></span></td>
							            		<td>
							            			<input id="ddlCash" name="ddlCash"
							            				data-role="dropdownlist"
							            				data-header-template="account-header-tmpl"
							            				data-template="account-list-tmpl"
							              				data-value-primitive="true"
														data-text-field="name" 
							              				data-value-field="id"
							              				data-bind="value: obj.account_id,
							              							source: cashAccountDS"
							              				data-option-label="Select Account..." 
							              				required data-required-msg="required" 
							              				style="width: 100%" />
												</td>
								            </tr>
								            <tr>
								            	<td><span data-bind="text: lang.lang.trade_discount"></span></td>
							            		<td>
							            			<input id="ddlDiscountAccount" name="ddlDiscountAccount"
							            				data-role="dropdownlist"
							            				data-header-template="account-header-tmpl"
							            				data-template="account-list-tmpl"
							              				data-value-primitive="true"
														data-text-field="name" 
							              				data-value-field="id"
							              				data-bind="value: obj.discount_account_id,
							              							source: discountAccountDS"
							              				data-option-label="Select Account..." 
							              				required data-required-msg="required" 
							              				style="width: 100%" />
												</td>
								            </tr>
								            <tr>
								            	<td><span data-bind="text: lang.lang.check_no"></span></td>							            	
							            		<td>
													<input class="k-textbox" placeholder="type check number ..." data-bind="value: obj.check_no" style="width: 100%;">
												</td>							            	
								            </tr>
							            </table>						            
							        </div>
							        <!-- // Options Tab content END -->

							        <!-- Address Tab content -->
							        <div class="tab-pane" id="tab2-7">
							        	<span data-bind="text: lang.lang.billing_address"></span>
										<textarea cols="0" rows="2" class="k-textbox" style="width:100%" data-bind="value: obj.bill_to" placeholder="Billing to ..."></textarea>								
										
										<span data-bind="text: lang.lang.delivery_address"></span>
										<textarea cols="0" rows="2" class="k-textbox" style="width:100%" data-bind="value: obj.ship_to" placeholder="Shipping to ..."></textarea>	
												
							        </div>
							        <!-- // Address Tab content END -->

							        <!-- Info Tab content -->
							        <div class="tab-pane" id="tab3-7">
							        	
										<table class="table table-borderless table-condensed cart_total">
											<tr>
												<td><span data-bind="text: lang.lang.sale_rep"></span></td>
												<td>
													<input id="cbbContact" name="cbbContact"
														   data-role="dropdownlist"
														   data-header-template="employee-header-tmpl"
										                   data-template="contact-list-tmpl"
										                   data-auto-bind="false"
										                   data-value-primitive="false"
										                   data-filter="startswith"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.employee,
										                              source: employeeDS,
										                              events: {change: employeeChanges}"
										                   data-option-label="Select Sale Rep..."
										                   style="width: 100%;" />
												</td>
											</tr>
											<tr>
												<td><span data-bind="text: lang.lang.job"></span></td>
												<td>
													<input id="ddlJob" name="ddlJob"
														   data-role="dropdownlist"
														   data-header-template="job-header-tmpl"
														   data-template="job-list-tmpl"
														   data-auto-bind="false"				                
										                   data-value-primitive="true"	   
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.job_id, 
										                   			source: jobDS"
										                   data-option-label="Add job..." 
										                   style="width: 100%" />										
												</td>
											</tr>											
							            </table>
												
							        </div>
							        <!-- // Info Tab content END -->

							        <!-- References -->
							        <div class="tab-pane" id="tab4-7">
							            <table style="margin-bottom: 0;" class="table table-borderless table-condensed cart_total">											
								            <tr>
												<td style="vertical-align: top;">
								            		<span data-bind="text: lang.lang.reference"></span>
								            	</td>
								            	<td>
								            		<input data-role="dropdownlist"
								            			   data-item-template="reference-list-tmpl"
										                   data-auto-bind="false"
										                   data-value-primitive="true"
										                   data-filter="startswith"
										                   data-text-field="number"
										                   data-value-field="id"
										                   data-bind="value: reference_id,
										                              source: referenceDS,
										                              events: { change: referenceChanges }"
										                   data-option-label="Add Reference..."
										                   style="width: 100%;" />
										            <br>
										            <table class="table table-bordered">
												        <tbody data-template="invoice-reference-template"
												        		data-bind="source: obj.references"></tbody>
												    </table>
												</td>
											</tr>
							            </table>
							        </div>
							        <!-- // References END -->

							        <!-- Segment -->
							        <div class="tab-pane" id="tab5-7">

							        	<input id="cbbSegment" name="cbbSegment"
							        		   data-role="combobox"
							                   data-value-primitive="true"
							                   data-filter="startswith"
							                   data-text-field="name"
							                   data-value-field="id"
							                   data-bind="value: segment_id,
							                              source: segmentDS"
							                   data-placeholder="Select segment..."
							                   style="width: 46%" />

							            <input id="cbbSegmentItem" name="cbbSegmentItem"
							            	   data-role="combobox"
							            	   data-cascade-from="cbbSegment"
							            	   data-cascade-from-field="segment_id"
							                   data-value-primitive="true"
							                   data-text-field="name"
							                   data-value-field="id"
							                   data-auto-bind="false"
							                   data-bind="value: segmentitem_id,
							                              source: segItemDS"
							                   data-placeholder="Select segment item..."
							                   style="width: 46%" />

							            <button class="btn btn-inverse" data-bind="click: addSegmentItem"><i class="icon-plus icon-white"></i></button>

							            <br><br>

							            <div data-role="grid" class="costom-grid"
							            	 data-editable="true"
							                 data-columns="[
							                 	{ field: 'segment', 
							                 		title: 'SEGMENT',
							                 		editable: 'false',
							                 		template: '#=segment.name#'
							                 	},
							                 	{ field: 'name', 
							                 		title: 'SEGMENT ITEM',
							                 		editable: 'false',
							                 		template: '#=code# #=name#'
							                 	},
							                 	{ command: 'destroy', title: '&nbsp;', width: 150 }
					                         ]"
					                         data-auto-bind="false"
							                 data-bind="source: segmentItemDS"></div>

							        </div>
							        <!-- // Segment END -->

							        <!-- Attach Tab content -->
							        <div class="tab-pane" id="tab6-7">

							        	<p><span data-bind="text: lang.lang.file_type"></span>: [PDF, JPG, JPEG, TIFF, PNG, GIF]</p>		
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

							        </div>
							        <!-- // Attach Tab content END -->						        

							        <!-- Recuring Tab content -->
							        <div class="tab-pane" id="tab7-7">							            	
							            
							            <table style="width: 100%" class="table borderless">
							            	<tr align="right">
							            		<td style="border-top: 0;">
							            			<span data-bind="text: lang.lang.name"></span>
							            		</td>
							            		<td style="border-top: 0;">
							            			<input id="txtRecurringName" name="txtRecurringName"
							            					class="k-textbox" 
							            					data-bind="value: obj.recurring_name" 
							            					placeholder="Recurring name.." 
							            					style="width: 43%; " />

							            			<span data-bind="text: lang.lang.start"></span>

									                <input data-role="datepicker"
															data-format="dd-MM-yyyy"
															data-parse-formats="yyyy-MM-dd"
															data-bind="value: obj.start_date"
															style="width: 40%; " />
							            		</td>
							            	</tr>
							            	<tr align="right">
							            		<td style="border-top: 0;">
								            		<span data-bind="text: lang.lang.every"></span>
								            	</td>
							            		<td style="border-top: 0;">
								            		<input data-role="numerictextbox"
									                   data-format="n0"
									                   data-min="0"								                   
									                   data-bind="value: obj.interval"
									                   style="width: 45%; " />

								            		<input data-role="dropdownlist"									                   
										                   data-value-primitive="true"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.frequency,
										                              source: frequencyList,
										                              events: { change: frequencyChanges }"
										                   style="width: 45%;" />
								            	</td>
							            	</tr>
								            <tr align="right">
								            	<td style="border-top: 0;">
								            		<span data-bind="text: lang.lang.on"></span>
								            	</td>							            	
								            	<td style="border-top: 0;">

								            		<input data-role="dropdownlist"									                   
										                   data-value-primitive="true"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.month,
										                   			  visible: showMonth,
										                              source: monthList"										                   
										                   style="width: 45%;" />

								            		<input data-role="dropdownlist"									                   
										                   data-value-primitive="true"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.month_option,
										                   			  visible: showMonthOption,
										                              source: monthOptionList,
										                              events: { change: monthOptionChanges }"										                   
										                   style="width: 45%;" />

								            		<input data-role="dropdownlist"									                   
										                   data-value-primitive="true"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.week,
										                   			  visible: showWeek,
										                              source: weekDayList"										                  
										                   style="width: 45%;" />										            
										        
								            		<input data-role="dropdownlist"									                   
										                   data-value-primitive="true"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.day,
										                   			  visible: showDay,
										                              source: dayList"										                   
										                   style="width: 45%;" />

								            	</td>
								            </tr>
							            </table>

							            <span id="saveRecurring" class="btn btn-icon btn-default glyphicons history" data-bind="visible: obj.isNew" style="float: right; margin-top: -12px;"><i></i> <span data-bind="text: lang.lang.save_recurring"></span></span>								     
							            
							        </div>
							        <!-- // Recuring Tab content END -->						        								        

							        <div class="tab-pane saleSummaryCustomer" id="tab5-6">
										<table class="table table-borderless table-condensed">
									        <thead>
									            <tr>
									                <th>NUMBER</th>
									                <th>ACCOUNT</th>                		                
									                <th class="right">DEBITS (Dr)</th>
									                <th class="right">CREDITS (Cr)</th>		                
									            </tr>
									        </thead> 
									        <tbody>
									        	<tr>
									        		<td>1</td>
									        		<td>2</td>
									        		<td class="right">3</td>
									        		<td class="right">4</td>
									        	</tr>
									        	<tr>
									        		<td>1</td>
									        		<td>2</td>
									        		<td class="right">3</td>
									        		<td class="right">4</td>
									        	</tr>
									        </tbody>			        
									    </table>
									</div>

							    </div>
							</div>

					    </div>
					</div>

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
						        	var rowIndex = banhji.cashSale.lineDS.indexOf(dataItem)+1;
						        	return '<i class=icon-trash data-bind=click:removeRow></i>' + ' ' + rowIndex;
						      	}
						    },
		                 	{ field: 'item', title: 'PRODUCTS/SERVICES', editor: itemEditor, template: '#=item.name#', width: '170px' },
                            { field: 'description', title:'DESCRIPTION', width: '250px' },                            
                            {
							    field: 'quantity',
							    title: 'QTY',
							    format: '{0:n}',
							    editor: numberTextboxEditor,
							    width: '120px',
							    attributes: { style: 'text-align: right;' }
							},
                            { 
                            	field: 'item_price', 
                            	title: 'UOM', 
                            	editor: measurementEditor, 
                            	template: '#=item_price?item_price.measurement:banhji.emptyString#', 
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
                            { field: 'amount', title:'AMOUNT', format: '{0:n}', editable: 'false', attributes: { style: 'text-align: right;' }, width: '120px' },                            
                            { field: 'tax_item', title:'TAX', editor: taxForSaleEditor, template: '#=tax_item.name#', width: '90px' },
                         	{ field: 'reference_no', title:'REFERENCE NO.', hidden: true, width: '120px' }
                         ]"
                         data-auto-bind="false"
		                 data-bind="source: lineDS" ></div>
					

					<!-- Window Barcode -->
					<div data-role="window"
		                 data-title="Barcode"
		                 data-width="600"
		                 data-height="400"
		                 data-iframe="true"
		                 data-modal="true"
		                 data-visible="false"
		                 data-position="{top:'30%',left:'30%'}"
		                 data-actions="{}"
		                 data-resizable="false"
		                 data-bind="visible: barcodeVisible"
		                 style="text-align:center;">

		                <table style="margin-bottom: 0;" class="table table-borderless table-condensed cart_total">
			        		<tr>
			        			<td>
			        				<input type="text" class="k-textbox" 
			        						data-bind="value: barcode,
			        									events: {change: searchByBarcode}"
			        						placeholder="Scan barcode ..." style="width: 100%;" />
			        			</td>
			        			<td>
			        				<input id="ddlCategory" id="ddlCategory"
									   data-role="dropdownlist"
									   data-option-label="Select Category..."
									   data-header-template="item-category-header-tmpl"
					                   data-value-primitive="true"
					                   data-text-field="name"
					                   data-value-field="id"
					                   data-bind="value: category_id,
					                              source: categoryDS,
					                              events: {change: search}"
					                   style="width: 100%;" />
			        			</td>
			        			<td>
			        				<input id="ddlItemGroup" id="ddlItemGroup"
									   data-role="dropdownlist"
									   data-header-template="item-group-header-tmpl"
									   data-option-label="Select Group..."
									   data-cascade-from="ddlCategory"
									   data-cascade-from-field="category_id"
					                   data-value-primitive="true"
					                   data-text-field="name"
					                   data-value-field="id"
					                   data-bind="value: item_group_id,
					                              source: itemGroupDS,
					                              events: {change: search}"
					                   style="width: 100%;" />
			        			</td>
			        		</tr>
			        	</table>

			        	<div data-role="grid"
			                 data-auto-bind="false"
			                 data-columns='[
                                { field: "number", title: "NUMBER", template:"#=abbr##=number#" },
                                { field: "name", title: "NAME" },
                                { field: "category", title: "CATEGORY" },
                                { title: "", template:"<button class=k-button data-bind=click:addSearchItem style=min-width:30px><i class=icon-plus></i></button>", width:"50px" }
                             ]'
			                 data-bind="source: itemDS"
			                 style="height: 212px;"></div>

			            <div id="pager" class="k-pager-wrap"
				             data-role="pager" 
				             data-auto-bind="false"
							 data-bind="source: itemDS"></div>
						<br>

						<div class="box-generic bg-action-button">
							<div class="row">
								<div class="span10">
									
								</div>
								<div class="span2" align="right">
									<span class="btn-btn" data-bind="click: closeBarcodeWindow"><i></i> <span data-bind="text: lang.lang.close"></span></span>
								</div>
							</div>
						</div>

		            </div>
		            <!-- // End Window Barcode -->

		            <!-- Bottom part -->
		            <div class="row-fluid">
			
						<!-- Column -->
						<div class="span4">
							<button class="btn btn-inverse" data-bind="click: addRow"><i class="icon-plus icon-white"></i></button>												
							<button class="btn btn-inverse" data-bind="click: openBarcodeWindow" style="background: green !important; margin-left: 0 !important;"><i class="icon-barcode icon-white" style="margin-right: 10px;"></i> Barcode</button>

							<!-- Add New Item -->
							<ul class="topnav addNew">
								<li role="presentation" class="dropdown ">
							  		<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
							  			<span data-bind="text: lang.lang.add_new_item"></span>
				    					<span class="caret"></span>
							  		</a>
						  			<ul class="dropdown-menu addNewItem">  				  				
						  				<li><a href='#/item'><span data-bind="text: lang.lang.add_inventory_for_sale"></span></a></li>
						  				<li><a href='#/non_inventory_part'><span data-bind="text: lang.lang.add_noninventory_for_sale"></span></a></li>
						  				<li><a href='#/item_service'><span data-bind="text: lang.lang.add_services"></span></a></li>
						  				<li><a href='#/txn_item'><span data-bind="text: lang.lang.add_transaction_item"></span></a></li> 	
						  			</ul>
							  	</li>				
							</ul>
							<!--End Add New Item -->
							
							<br><br>
							<div class="well">
								<textarea cols="0" rows="2" class="k-textbox" style="width:100%" data-bind="value: obj.memo2" placeholder="memo for internal ..."></textarea>
								<br>						
								<textarea cols="0" rows="2" class="k-textbox" style="width:100%" data-bind="value: obj.memo" placeholder="memo for external ..."></textarea>
							</div>
						</div>
						<!-- Column END -->

						<!-- Column -->
						<div class="span4" align="center">
							<div data-bind="visible: isEdit" style="margin-top: 10%;">
								<h2 data-bind="text: statusObj.text" style="text-transform: uppercase;"></h2>
								<p data-bind="text: statusObj.date"></p>
								<a data-bind="text: statusObj.number,
											attr: { href: statusObj.url }"></a>
							</div>
						</div>
						<!-- Column END -->
						
						<!-- Column -->
						<div class="span4">
							<table class="table table-condensed table-striped table-white">
								<tbody>
									<tr>
										<td class="right" style="width: 60%;"><span data-bind="text: lang.lang.subtotal" style="font-size: 15px; font-weight: 700;"></span></td>
										<td class="right" width="40%"><span data-format="n" data-bind="text: obj.sub_total" style="font-size: 15px; font-weight: 700;"></span></td>
									</tr>								
									<tr>
										<td class="right"><span data-bind="text: lang.lang.total_discount"></span></td>
										<td class="right"><span data-format="n" data-bind="text: obj.discount"></span></td>
									</tr>
									<tr>
										<td class="right"><span data-bind="text: lang.lang.total_tax"></span></td>
										<td class="right"><span data-format="n" data-bind="text: obj.tax"></span></td>
									</tr>						
									<tr>
										<td class="right" ><h4 data-bind="text: lang.lang.total" style="font-weight: 700;"></h4></td>
										<td class="right" ><h4 data-bind="text: total" style=" font-weight: 700;"></h4></td>
									</tr>
									<tr>
										<td class="right">
											<span data-bind="text: lang.lang.deposit"></span>
											<span data-format="n" data-bind="text: total_deposit"></span>										
										</td>
										<td class="right">
											<input data-role="numerictextbox"
								                   data-format="n"
								                   data-spinners="false"
								                   data-min="0"							                                      
								                   data-bind="value: obj.deposit,
								                              events: { change: changes }"
								                   style="width: 90%; text-align: right;">
										</td>
									</tr>
									<tr>
										<td class="right">
											<span data-bind="text: lang.lang.remaining" style="font-size: 15px; font-weight: 700;"></span>
										</td>
										<td class="right">
											<span data-format="n" data-bind="text: obj.remaining" style="font-size: 15px; font-weight: 700;"></span>
										</td>
									</tr>								
								</tbody>
							</table>
						</div>
						<!-- // Column END -->
						
					</div>	           
					
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
							<div class="span4" style="padding-left: 15px;">
								<input data-role="dropdownlist"
					                   data-value-primitive="true"
					                   data-text-field="name"
					                   data-value-field="id"
					                   data-bind="value: obj.transaction_template_id,
					                              source: txnTemplateDS"
					                   data-option-label="Select Template..." />
								
							</div>
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
						  				<li id="savePrint"><span data-bind="text: lang.lang.save_print"></span></li>
						  			</ul>
							  	</span>
							  	<span class="btn-btn" id="saveClose"><span data-bind="text: lang.lang.save_close"></span></span>
							  	<span class="btn-btn" id="saveDraft1" data-bind="invisible: isEdit"><span data-bind="text: lang.lang.save_draft"></span></span>
							</div>
						</div>
					</div>
					<!-- // Form actions END -->								

				</div>							
			</div>
		</div>
	</div>
</script>
<script id="invoice-reference-template" type="text/x-kendo-tmpl">
	<tr>
		<td>
			<i class="icon-trash" data-bind="events: { click: referenceRemoveRow }"></i>
			#=number#
		</td>
		<td align="right">
			#if(type=="GDN"){# 
				#=kendo.toString(kendo.parseFloat(amount), "n2")#
			#}else{#
				#=kendo.toString(kendo.parseFloat(amount), "c2", locale)#
			#}#
		</td>
    </tr>   
</script>
<script id="saleRecurring" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">					
				<div id="example" class="k-content">

		    		<span class="glyphicons no-js remove_2 pull-right" 
		    				onclick="javascript:window.history.back()"
							data-bind="click: cancel"><i></i></span>

				    <h2>Sale Recurring</h2>

				    <br>

				    <div class="row-fluid">
						<!-- Tabs -->
						<div class="relativeWrap" data-toggle="source-code">
							<div class="widget widget-tabs widget-tabs-gray report-tab">	
							    <!-- Tabs Heading -->
								<div class="widget-head">
									<ul>
										<li class="active"><a class="glyphicons user" href="#tab-1" data-toggle="tab"><i></i>Select Customer</a></li>
									</ul>
								</div>
							    <!-- // Tabs Heading END -->
								<div class="widget-body">
								    <div class="tab-content">

								    	<!-- //GENERAL INFO -->
								        <div class="tab-pane active" id="tab-1">									
									       <input id="ccbItem" name="cbbContact"
												   data-role="combobox"
								                   data-header-template="contact-header-tmpl"
								                   data-template="contact-list-tmpl"
								                   data-value-primitive="true"
								                   data-text-field="name"
								                   data-value-field="id"
								                   data-bind="value: contact_id,
								                              source: contactDS,
								                              events:{change: search}"
								                   data-placeholder="Customer..." style="width: 200px;" />
							        	</div>
								        <!-- //GENERAL INFO END -->

								    </div>
								</div>
							</div>
						</div>
					</div>
					                           					
	            	<table class="table table-bordered table-primary table-striped table-vertical-center">
	            		<thead style="background-color: blue; color: #fff; font-weight: bold">
			                <th>TYPE</th>
			                <th>RECURRING NAME</th>
			                <th>CUSTOMER</th>
			                <th>START DATE</th>
			                <th class="center">FREQUENCY</th>
			                <th></th>
	            		</thead>
	            		<tbody data-role="listview" 
				        		data-template="saleRecurring-template" 
				        		data-auto-bind="false"
				        		data-bind="source: dataSource"></tbody>
	            	</table>

	            	<div id="pager" class="k-pager-wrap"
			             data-role="pager" 
			             data-auto-bind="false"
			             data-bind="source: dataSource"></div>

	            </div>	            						
			</div>
		</div>
	</div>
</script>
<script id="saleRecurring-template" type="text/x-kendo-tmpl">
	<tr data-uid="#: uid #">
		<td>#=type#</td>
		<td>#=recurring_name#</td>
		<td>#=contact.abbr##=contact.number# #=contact.name#</td>
		<td>#=kendo.toString(new Date(start_date), "dd-MM-yyyy")#</td>
		<td class="center">#=frequency#</td>
		<td class="center">
			<a class="btn btn-warning" data-bind="click: edit,text: lang.lang.edit"><i></i></a>
			<a class="btn btn-success" data-bind="click: use, text: lang.lang.use"><i></i></a>
		</td>		
    </tr>   
</script>
<!-- SALES REPORT -->
<script id="saleReportCenter" type="text/x-kendo-template">
	<div class="row-fluid customer-report-center">
		<div class="span7">
			<div class="row-fluid sale-report">				
				<h2>SALE MANAGEMENT REPORTS</h2>
				<p>
					The following reports provide summary and detailed reports in 
					different ways to help analyze your revenue performance.
				</p>
				<div class="row-fluid">
					<table class="table table-borderless table-condensed">						
						<tr>
							<td width="50%">
								<h3><a href="#/quotation_list">Quotation List</a></h3>
							</td>
							<td width="50%">
								<h3><a href="#/sale_order_list">Sale Order List</a></h3>
							</td>
						</tr>
						<tr>
							<td >
								<h3><a href="#/sale_order_by_job_engagement">Sale Order By Job/Engagement</a></h3>
							</td>
							<!-- <td >
								<h3><a href="#/customer_list">Customer List</a></h3>
							</td> -->
						</tr>
						<!-- <tr>
							<td >
							</td>
							<td >
								<p>
									List of all active customers
								</p>
							</td>
						</tr> -->
						<!-- <tr>
							<td>
								<h3><a href="#/sale_inventory_position_summary">Inventory Position Summary</a></h3>
							</td>
							<td>
								
							</td>

						</tr> -->
						<tr>
							<td>
								<p>
									Summarizes each inventory balance by quantity on hand, on purchase order and sale order. In addition, it also includes average cost and price.
								</p>
							</td>
							<td>
								
							</td>

						</tr>
					</table>
				</div>
			</div>

			
			<!-- <div class="row-fluid recevable-report">
				<h2>OTHER REPORTS/ LISTS</h2>
				<div class="row-fluid">
					<table class="table table-borderless table-condensed">
						<tr>
							<td style="width: 48%; padding-right: 8px !important;">
								<h3><a href="#/customer_recurring">Recurring Customer Template List</a></h3>
							</td>
							<td >
								<h3><a href="#/customer_setting">Payment Method & Term List</a></h3>								
							</td>						
						</tr>
						<tr>
							<td style="width: 48%; padding-right: 8px !important;">
								<p></p>								
							</td>
							<td>
								<p>
									List the types of payments and the term that determine due date for payment from customers.
								</p>
							</td>
							
						</tr>
						<tr >
							<td></td>														
						</tr>

					</table>
				</div>
			</div> -->
		</div>
		<div class="span5">
			<span class="pull-right glyphicons no-js remove_2" 
						onclick="javascript:window.history.back()"><i></i></span>
			<br>
			<br>
			<div class="report-chart">
				<div class="widget-body alert alert-primary sale-overview">
					<h2>SALE ORDER</h2>
					<div align="center" class="text-large strong" data-bind="text: sale"></div>
					<table width="100%">
						<tr align="center">
							<td>										
								<span data-bind="text: sale_customer"></span>
								<br>
								<span>Customer</span>
							</td>
							<td>
								<span data-bind="text: sale_product"></span>
								<br>
								<span>Product</span>
							</td>
							<td>
								<span data-bind="text: order"></span>
								<br>
								<span>Order</span>
							</td>
							<td >
								<span data-bind="text: sale_order"></span>
								<br>
								<span>Sale Order</span>
							</td>

						</tr>
					</table>
				</div>
				<!-- Graph -->
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
		                                 { field: 'sale', name: 'Monthly Sale', categoryField:'month', color: '#236DA4' },
		                                 { field: 'order', name: 'Monthly Order', categoryField:'month', color: '#A6C9E3' }
		                             ]"	                             
		                 data-bind="source: graphDS"
		                 style="height: 250px;" ></div>
	            <!-- End Graph -->
	            </div>
			</div>
			
			</div>
		</div>
	</div>
</script>
<script id="quotationList" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">
				<div id="example" class="k-content saleSummaryCustomer">		
			    	<span class="pull-right glyphicons no-js remove_2" 
						onclick="javascript:window.history.back()"><i></i></span>
					<br>
					<br>

					<div class="row-fluid">
					    <!-- Tabs -->
						<div class="relativeWrap" data-toggle="source-code">
							<div class="widget widget-tabs widget-tabs-gray report-tab">
							
								<!-- Tabs Heading -->
								<div class="widget-head">
									<ul>
										<li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text: lang.lang.date"></span></a></li>	
										<li><a class="glyphicons filter" href="#tab-2" data-toggle="tab"><i></i><span data-bind="text: lang.lang.filter"></span></a></li>
										<li><a class="glyphicons print" href="#tab-3" data-toggle="tab"><i></i><span data-bind="text: lang.lang.print_export"></span></a></li>
									</ul>
								</div>
								<!-- // Tabs Heading END -->								
								<div class="widget-body">
									<div class="tab-content">

								        <!-- Date -->
								        <div class="tab-pane active" id="tab-1">									        	
											
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

										  	<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
							
							        	</div>

								    	<!-- Filter -->
								        <div class="tab-pane" id="tab-2">
											<table class="table table-condensed">
												<tr>
									            	<td style="padding: 8px 0 0 0 !important; ">
														<span data-bind="text: lang.lang.customers"></span>
														<select data-role="multiselect"
															   data-value-primitive="true"
															   data-header-template="contact-header-tmpl"
															   data-item-template="contact-list-tmpl"
															   data-value-field="id"
															   data-text-field="name"
															   data-bind="value: obj.contactIds, 
															   			source: contactDS"
															   data-placeholder="Select Customer.."
															   style="width: 100%" /></select>
													</td>													
													<td style="padding-top: 31px !important; float: left;">
										  				<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
													</td>
												</tr>
											</table>
							        	</div>
							        	<!-- PRINT/EXPORT  -->
								        <div class="tab-pane" id="tab-3">								        	
								        	<span id="savePrint" class="btn btn-icon btn-default glyphicons print print1" data-bind="click: printGrid" style="width: 80px;"><i></i><span data-bind="text: lang.lang.print"></span></span>
								        	<!-- <span id="" class="btn btn-icon btn-default pdf" data-bind="click: cancel" style="width: 80px;">
								        		<i class="fa fa-file-pdf-o"></i>
								        		Print as PDF
								        	</span> -->
								        	<span id="" class="btn btn-icon btn-default execl" data-bind="click: ExportExcel" style="width: 80px;">
								        		<i class="fa fa-file-excel-o"></i>
								        		<span data-bind="text: lang.lang.export_to_excel"></span>
								        	</span>
							        	</div>
								    </div>
								</div>
							</div>
						</div>
						<!-- // Tabs END -->						
					</div>

					<div id="invFormContent">
						<div class="block-title">
							<h3 data-bind="text: company.name"></h3>
							<h2>Quotation List</h2>
							<p data-bind="text: displayDate"></p>
						</div>

						<div class="row-fluid">
							<div class="span5">
								<div class="total-customer">
									<div class="span6">
										<p data-bind="text: lang.lang.number_of_customer"></p>
										<span data-bind="text: dataSource.total"></span>
									</div>
									<div class="span6">
										<p data-bind="text: lang.lang.order"></p>
										<span data-bind="text: orderCount"></span>
									</div>
								</div>
							</div>
							<div class="span7">
								<div class="total-customer">									
									<p data-bind="text: lang.lang.amount"></p>
									<span data-bind="text: totalAmount"></span>
								</div>
							</div>
						</div>

						<table class="table table-borderless table-condensed">
							<thead>
								<tr>
									<th data-bind="text: lang.lang.number"></th>
									<th data-bind="text: lang.lang.reference"></th>
									<th data-bind="text: lang.lang.date"></th>
									<th style="text-align: center;" data-bind="text: lang.lang.status"></th>
									<th style="text-align: right;" data-bind="text: lang.lang.amount"></th>
								</tr>
							</thead>
							<tbody data-role="listview"
									data-template="quotationList-template"
									data-auto-bind="false"
									data-bind="source: dataSource"
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
</script>
<script id="quotationList-template" type="text/x-kendo-template">
	<tr style="font-weight: bold; color: black;">
		<td colspan="5">#=name#</td>
	</tr>	
	# var amount = 0;#
	#for(var i= 0; i <line.length; i++) {#
		# amount += line[i].amount;#
		<tr>
			<td style="padding-left: 20px !important;">
				<a href="\#/#=line[i].type.toLowerCase()#/#=line[i].id#">#=line[i].number#</a>
			</td>
			<td>
				#if(line[i].reference.length>0){#
					<a href="\#/#=line[i].reference[0].type.toLowerCase()#/#=line[i].reference[0].id#"><i></i> #=line[i].reference[0].number#</a>
				#}#
			</td>
			<td>#=kendo.toString(new Date(line[i].issued_date), "dd-MM-yyyy")#</td>
			<td style="text-align: center;">
        		#if(line[i].status==="0"){#
        			Open
        		#}else{#
        			Used
        		#}#
			</td>
			<td style="text-align: right;">#=kendo.toString(line[i].amount, "c2", banhji.locale)#</td>
		</tr>
	#}#
	<tr>
    	<td colspan="4" style="font-weight: bold; color: black;"><span data-bind="text: lang.lang.total"></span> #=name#</td>    	
    	<td style="text-align: right; font-weight: bold; border-top: 1px solid black !important; color: black;">
    		#=kendo.toString(amount, "c2", banhji.locale)#
    	</td>
    </tr>
    <tr>
    	<td colspan="5">&nbsp;</td>
    </tr>
</script>
<script id="saleOrderList" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">
				<div id="example" class="k-content saleSummaryCustomer">		
			    	<span class="pull-right glyphicons no-js remove_2" 
						onclick="javascript:window.history.back()"><i></i></span>
					<br>
					<br>

					<div class="row-fluid">
					    <!-- Tabs -->
						<div class="relativeWrap" data-toggle="source-code">
							<div class="widget widget-tabs widget-tabs-gray report-tab">
							
								<!-- Tabs Heading -->
								<div class="widget-head">
									<ul>
										<li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text: lang.lang.date"></span></a></li>	
										<li><a class="glyphicons filter" href="#tab-2" data-toggle="tab"><i></i><span data-bind="text: lang.lang.filter"></span></a></li>
										<li><a class="glyphicons print" href="#tab-3" data-toggle="tab"><i></i><span data-bind="text: lang.lang.print_export"></span></a></li>
									</ul>
								</div>
								<!-- // Tabs Heading END -->								
								<div class="widget-body">
									<div class="tab-content">

								        <!-- Date -->
								        <div class="tab-pane active" id="tab-1">									        	
											
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

										  	<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
							
							        	</div>

								    	<!-- Filter -->
								        <div class="tab-pane" id="tab-2">
											<table class="table table-condensed">
												<tr>
									            	<td style="padding: 8px 0 0 0 !important; ">
														<span data-bind="text: lang.lang.customers"></span>
														<select data-role="multiselect"
															   data-value-primitive="true"
															   data-header-template="contact-header-tmpl"
															   data-item-template="contact-list-tmpl"
															   data-value-field="id"
															   data-text-field="name"
															   data-bind="value: obj.contactIds, 
															   			source: contactDS"
															   data-placeholder="Select Customer.."
															   style="width: 100%" /></select>
													</td>													
													<td style="padding-top: 31px !important; float: left;">
										  				<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
													</td>
												</tr>
											</table>
							        	</div>
							        	<!-- PRINT/EXPORT  -->
								        <div class="tab-pane" id="tab-3">								        	
								        	<span id="savePrint" class="btn btn-icon btn-default glyphicons print print1" data-bind="click: printGrid" style="width: 80px;"><i></i><span data-bind="text: lang.lang.print"></span></span>
								        	<!-- <span id="" class="btn btn-icon btn-default pdf" data-bind="click: cancel" style="width: 80px;">
								        		<i class="fa fa-file-pdf-o"></i>
								        		Print as PDF
								        	</span> -->
								        	<span id="" class="btn btn-icon btn-default execl" data-bind="click: ExportExcel" style="width: 80px;">
								        		<i class="fa fa-file-excel-o"></i>
								        		<span data-bind="text: lang.lang.export_to_excel"></span>
								        	</span>
							        	</div>
								    </div>
								</div>
							</div>
						</div>
						<!-- // Tabs END -->						
					</div>

					<div id="invFormContent">
						<div class="block-title">
							<h3 data-bind="text: company.name"></h3>
							<h2 data-bind="text: lang.lang.sale_order_list"></h2>
							<p data-bind="text: displayDate"></p>
						</div>

						<div class="row-fluid">
							<div class="span5">
								<div class="total-customer">
									<div class="span6">
										<p data-bind="text: lang.lang.number_of_customer"></p>
										<span data-bind="text: dataSource.total"></span>
									</div>
									<div class="span6">
										<p data-bind="text: lang.lang.order"></p>
										<span data-bind="text: orderCount"></span>
									</div>
								</div>
							</div>
							<div class="span7">
								<div class="total-customer">									
									<p data-bind="text: lang.lang.amount"></p>
									<span data-bind="text: totalAmount"></span>
								</div>
							</div>
						</div>

						<table class="table table-borderless table-condensed">
							<thead>
								<tr>
									<th data-bind="text: lang.lang.number"></th>
									<th data-bind="text: lang.lang.reference"></th>
									<th data-bind="text: lang.lang.date"></th>
									<th style="text-align: center;" data-bind="text: lang.lang.status"></th>
									<th style="text-align: right;" data-bind="text: lang.lang.amount"></th>
								</tr>
							</thead>
							<tbody data-role="listview"
									data-template="saleOrderList-template"
									data-auto-bind="false"
									data-bind="source: dataSource"
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
</script>
<script id="saleOrderList-template" type="text/x-kendo-template">
	<tr style="font-weight: bold; color: black;">
		<td colspan="5">#=name#</td>
	</tr>	
	# var amount = 0;#
	#for(var i= 0; i <line.length; i++) {#
		# amount += line[i].amount;#
		<tr>
			<td style="padding-left: 20px !important;">
				<a href="\#/#=line[i].type.toLowerCase()#/#=line[i].id#">#=line[i].number#</a>
			</td>
			<td>
				#if(line[i].reference.length>0){#
					<a href="\#/#=line[i].reference[0].type.toLowerCase()#/#=line[i].reference[0].id#"><i></i> #=line[i].reference[0].number#</a>
				#}#
			</td>
			<td>#=kendo.toString(new Date(line[i].issued_date), "dd-MM-yyyy")#</td>
			<td style="text-align: center;">
        		#if(line[i].status==="0"){#
        			Open
        		#}else{#
        			Used
        		#}#
			</td>
			<td style="text-align: right;">#=kendo.toString(line[i].amount, "c2", banhji.locale)#</td>
		</tr>
	#}#
	<tr>
    	<td colspan="4" style="font-weight: bold; color: black;"><span data-bind="text: lang.lang.total"></span> #=name#</td>    	
    	<td style="text-align: right; font-weight: bold; border-top: 1px solid black !important; color: black;">
    		#=kendo.toString(amount, "c2", banhji.locale)#
    	</td>
    </tr>
    <tr>
    	<td colspan="5">&nbsp;</td>
    </tr>
</script>
<script id="saleOrderByJobEngagment" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">
				<div id="example" class="k-content saleSummaryCustomer">		
			    	<span class="pull-right glyphicons no-js remove_2" 
						onclick="javascript:window.history.back()"><i></i></span>
					<br>
					<br>
					<div class="row-fluid">
					    <!-- Tabs -->
						<div class="relativeWrap" data-toggle="source-code">
							<div class="widget widget-tabs widget-tabs-gray report-tab">
							
								<!-- Tabs Heading -->
								<div class="widget-head">
									<ul>
										<li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text: lang.lang.date"></span></a></li>	
										<li><a class="glyphicons filter" href="#tab-2" data-toggle="tab"><i></i><span data-bind="text: lang.lang.filter"></span></a></li>
										<li><a class="glyphicons print" href="#tab-3" data-toggle="tab"><i></i><span data-bind="text: lang.lang.print_export"></span></a></li>
									</ul>
								</div>
								<!-- // Tabs Heading END -->								
								<div class="widget-body">
									<div class="tab-content">

								        <!-- Date -->
								        <div class="tab-pane active" id="tab-1">									        	
											
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

										  	<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
							
							        	</div>

								    	<!-- Filter -->
								        <div class="tab-pane" id="tab-2">
											<table class="table table-condensed">
												<tr>
									            	<td style="padding: 8px 0 0 0 !important; ">
														<span data-bind="text: lang.lang.customers"></span>
														<select data-role="multiselect"
															   data-value-primitive="true"
															   data-header-template="contact-header-tmpl"
															   data-item-template="contact-list-tmpl"
															   data-value-field="id"
															   data-text-field="name"
															   data-bind="value: obj.contactIds, 
															   			source: contactDS"
															   data-placeholder="Select Customer.."
															   style="width: 100%" /></select>
													</td>													
													<td style="padding-top: 31px !important; float: left;">
										  				<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
													</td>
												</tr>
											</table>
							        	</div>
							        	<!-- PRINT/EXPORT  -->
								        <div class="tab-pane" id="tab-3">								        	
								        	<span id="savePrint" class="btn btn-icon btn-default glyphicons print print1" data-bind="click: printGrid" style="width: 80px;"><i></i><span data-bind="text: lang.lang.print"></span></span>
								        	<!-- <span id="" class="btn btn-icon btn-default pdf" data-bind="click: cancel" style="width: 80px;">
								        		<i class="fa fa-file-pdf-o"></i>
								        		Print as PDF
								        	</span> -->
								        	<span id="" class="btn btn-icon btn-default execl" data-bind="click: ExportExcel" style="width: 80px;">
								        		<i class="fa fa-file-excel-o"></i>
								        		<span data-bind="text: lang.lang.export_to_excel"></span>
								        	</span>
							        	</div>
								    </div>
								</div>
							</div>
						</div>
						<!-- // Tabs END -->						
					</div>

					<div id="invFormContent">
						<div class="block-title">
							<h3 data-bind="text: company.name"></h3>
							<h2>Sale Order by Job/Engagement</h2>
							<p data-bind="text: displayDate"></p>
						</div>

						<div class="row-fluid">
							<div class="span5">
								<div class="total-customer">
									<p>Number of Job Ordered</p>
									<span data-format="n0" data-bind="text: dataSource.total()"></span>
								</div>
							</div>
							<div class="span7">
								<div class="total-customer">
										<p>Amount</p>
										<span data-bind="text: total"></span>							
								</div>
							</div>
						</div>

						<table class="table table-borderless table-condensed ">
							<thead>
								<tr>
									<th><span>Name</span></th>
									<th><span>Date</span></th>
									<th><span>Reference</span></th>
									<th><span>Status</span></th>
									<th style="text-align: right;"><span>Amount</span></th>
								</tr>
							</thead>
							<tbody data-role="listview"
									 data-auto-bind="false"
									 data-bind="source: dataSource"
									 data-template="saleOrderByJobEngagment-template"
							></tbody>
						</table>					
					</div>	
				</div>		
			</div>
		</div>
	</div>
</script>
<script id="saleOrderByJobEngagment-template" type="text/x-kendo-template">
	<tr style="font-weight: bold; color: black;">
		<td colspan="5">#=job#</td>
	</tr>	
	# var amount = 0;#
	#for(var i= 0; i < line.length; i++) {#
		#amount += line[i].amount;#
		<tr>
			<td>#=line[i].name#</td>
			<td>#=kendo.toString(new Date(line[i].issued_date), "dd-MM-yyyy")#</td>
			<td style="padding-left: 20px !important;">
				<a href="\#/#=line[i].type.toLowerCase()#/#=line[i].id#">#=line[i].number#</a>
			</td>
			<td style="text-align: center;">
        		#if(line[i].status==="0"){#
        			Open
        		#}else{#
        			Used
        		#}#
			</td>
			<td style="text-align: right;">#=kendo.toString(line[i].amount, "c2", banhji.locale)#</td>
		</tr>
	#}#
	<tr>
    	<td colspan="4" style="font-weight: bold; color: black;"><span data-bind="text: lang.lang.total"></span>Total #=job#</td>    	
    	<td style="text-align: right; font-weight: bold; border-top: 1px solid black !important; color: black;">
    		#=kendo.toString(amount, "c2", banhji.locale)#
    	</td>
    </tr>
    <tr>
    	<td colspan="5">&nbsp;</td>
    </tr>
</script>


<!-- #############################################
##################################################
#	TEMPLATE LIST VIEW 					 		 #
##################################################
############################################## -->
<script id="contact-list-tmpl" type="text/x-kendo-tmpl">
	<span>#=abbr##=number#</span>	
	<span>#=name#</span>	
</script>
<script id="contact-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="\#/customer">+ Add New Customer</a></li>
    </strong>
</script>
<script id="supplier-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="\#/vendor">+ Add New Supplier</a></li>
    </strong>
</script>
<script id="currency-list-tmpl" type="text/x-kendo-tmpl">
	<span>
		#=code# - #=country#
	</span>
</script>
<script id="segment-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="\#/segment">+ Add New Segment</a>
    </strong>
</script>
<script id="segment-list-tmpl" type="text/x-kendo-tmpl">
	<span>#=code#</span> <span>#=name#</span>
</script>
<script id="job-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="\#/job">+ Add New Job</a>
    </strong>
</script>
<script id="job-list-tmpl" type="text/x-kendo-tmpl">
	<span>
		#=number# #=name#
	</span>
</script>

<script id="customer-type-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="\#/customer_setting">+ Add New Customer Type</a>
    </strong>
</script>
<script id="customer-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="\#/customer">+ Add New Customer</a>
    </strong>
</script>
<script id="customer-payment-method-header-tmpl" type="text/x-kendo-tmpl">
	<strong>
    	<a href="\#/customer_setting">+ Add New Payment Method</a>
    </strong>	
</script>
<script id="customer-term-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="\#/customer_setting">+ Add New Term</a>
    </strong>
</script>

<script id="employee-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="<?php echo base_url(); ?>admin\#employeelist">+ Add New Employee</a>
    </strong>
</script>

<script id="item-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="\#/item">+ Add New Item</a> &nbsp;&nbsp;
    	<a href="\#/item_service">+ Add New Service</a>
    </strong>
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
<script id="item-group-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="\#/item_setting">+ Add New Group</a>
    </strong>
</script>
<script id="item-category-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="\#/item_setting">+ Add New Category</a>
    </strong>
</script>
<script id="item-brand-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="\#/item_setting">+ Add New Brand</a>
    </strong>
</script>
<script id="item-measurement-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="\#/item_setting">+ Add New Measurement</a>
    </strong>
</script>

<script id="vendor-type-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="\#/vendor_setting">+ Add New Supplier Type</a>
    </strong>
</script>
<script id="vendor-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="\#/vendor">+ Add New Supplier</a>
    </strong>
</script>
<script id="vendor-payment-method-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="\#/vendor_setting">+ Add New Payment Method</a>
    </strong>
</script>
<script id="vendor-payment-term-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="\#/vendor_setting">+ Add New Payment Term</a>
    </strong>
</script>

<script id="cash-payment-method-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="\#/cash_seting">+ Add New Payment Method</a>
    </strong>
</script>
<script id="cash-payment-term-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="\#/cash_seting">+ Add New Payment Term</a>
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

<script id="tax-header-tmpl" type="text/x-kendo-tmpl">
	<strong>
    	<a href="\#/tax">+ Add New Tax</a>
    </strong>	
</script>

<script id="reference-list-tmpl" type="text/x-kendo-tmpl">
	<span>
		#=number# :
		#if(type=="GDN" || type=="GRN"){# 
			#=kendo.toString(amount, "n")#
		#}else{#
			#=kendo.toString(amount - amount_paid, "c", locale)#
		#}#
	</span>
	<span class="pull-right">
		#if(type=="GDN" || type=="GRN" || type=="Quote" || type=="Sale_Order"){# 
			#if(status==1){#
				Used
			#}else{#
				Open
			#}#
		#}else{#
			#if(status==1){#
				Paid
			#}else if(status==2){#
				Partially Paid
			#}else{#
				Open
			#}#
		#}#		
	</span>
</script>
<script id="attachment-rith-list-tmpl" type="text/x-kendo-tmpl">
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
			<span class="btn-action glyphicons remove_2 btn-danger" data-bind="click: onRemove"><i></i></span>			
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
<script id="errorTemplate" type="text/x-kendo-template">
    <div class="wrong-pass">
        <img style="float: left; cursor: pointer;" src="http://demos.telerik.com/kendo-ui/content/web/notification/error-icon.png" />        
        <h3>#= message #</h3>
    </div>
</script>
<script id="successTemplate" type="text/x-kendo-template">
    <div class="upload-success">
        <img src="http://demos.telerik.com/kendo-ui/content/web/notification/success-icon.png" />
        <h3>#= message #</h3>
    </div>
</script>

<!--  List Templates -->
<script>
	function itemComboBoxEditor(container, options) {
        $('<input name="' + options.field + '"/>')
        .appendTo(container)
        .kendoComboBox({
        	placeholder: "Select Item",
            dataTextField: "name",
            dataValueField: "id",
            autoWidth: true,
            height: 200,
            template: kendo.template($("#item-list-tmpl").html()),
            dataSource: banhji.source.itemList
        });
    }

    function itemEditor(container, options) {
        $('<input name="' + options.field + '" />')
        .appendTo(container)
        .kendoDropDownList({
        	filter: "contains",        	
            dataTextField: "name",
            dataValueField: "id",
            autoWidth: true,
            height: 200,
            template: kendo.template($("#item-list-tmpl").html()),
            dataSource: {
            	transport: {
					read 	: {
						url: apiUrl + "items",
						type: "GET",
						headers: banhji.header,
						dataType: 'json'
					},
					parameterMap: function(options, operation) {
						if(operation === 'read') {
							return {
								page: options.page,
								limit: options.pageSize,
								filter: options.filter,
								sort: options.sort
							};
						} else {
							return {models: kendo.stringify(options.models)};
						}
					}
				},
				schema 	: {
					model: {
						id: 'id'
					},
					data: 'results',
					total: 'count'
				},
				filter:{ field: "item_type_id <>", value: 3 },
				sort: [
					{ field:"item_type_id", dir:"asc" },
					{ field:"number", dir:"asc" }
				],
				batch: true,
				serverFiltering: true,
				serverSorting: true,
				serverPaging: true,
				page: 1,
				pageSize: 50
            }
        });
    }

    function variantAttributeEditor(container, options) {
        $('<input name="' + options.field + '" />')
        .appendTo(container)
        .kendoDropDownList({
        	valuePrimitive: false,
        	filter: "startswith",        	
            dataTextField: "name",
            dataValueField: "id",
            autoWidth: true,
            height: 200,
            dataSource: dataStore(apiUrl + "variant_attributes")
        });
    }

    function attributeValueEditor(container, options) {
        $('<input name="' + options.field + '" />')
        .appendTo(container)
        .kendoMultiSelect({
        	valuePrimitive: false,
            dataTextField: "name",
            dataValueField: "id",
            autoBind: false,
            dataSource: {
            	transport: {
					read 	: {
						url: apiUrl + "attribute_values",
						type: "GET",
						headers: banhji.header,
						dataType: 'json'
					},
					parameterMap: function(options, operation) {
						if(operation === 'read') {
							return {
								page: options.page,
								limit: options.pageSize,
								filter: options.filter,
								sort: options.sort
							};
						} else {
							return {models: kendo.stringify(options.models)};
						}
					}
				},
				schema 	: {
					model: {
						id: 'id'
					},
					data: 'results',
					total: 'count'
				},
				filter:{ field: "variant_attribute_id", value: options.model.variant_attribute.id },
				sort: { field:"name", dir:"asc" },
				batch: true,
				serverFiltering: true,
				serverSorting: true,
				serverPaging: true,
				page: 1,
				pageSize: 100
            }
        });
    }

    function locationTypeEditor(container, options) {
        $('<input name="' + options.field + '" />')
        .appendTo(container)
        .kendoDropDownList({
            dataTextField: "name",
            dataValueField: "id",
            autoWidth: true,
            height: 200,
            dataSource: {
            	transport: {
					read 	: {
						url: apiUrl + "location_types",
						type: "GET",
						headers: banhji.header,
						dataType: 'json'
					},
					parameterMap: function(options, operation) {
						if(operation === 'read') {
							return {
								page: options.page,
								limit: options.pageSize,
								filter: options.filter,
								sort: options.sort
							};
						} else {
							return {models: kendo.stringify(options.models)};
						}
					}
				},
				schema 	: {
					model: {
						id: 'id'
					},
					data: 'results',
					total: 'count'
				},
				batch: true,
				serverFiltering: true,
				serverSorting: true,
				serverPaging: true,
				page: 1,
				pageSize: 100
            }
        });
    }

    function inventoryForSaleEditor(container, options) {
        $('<input name="' + options.field + '" />')
        .appendTo(container)
        .kendoDropDownList({
        	filter: "contains",        	
            dataTextField: "name",
            dataValueField: "id",
            autoWidth: true,
            height: 200,
            template: kendo.template($("#item-list-tmpl").html()),
            dataSource: {
            	transport: {
					read 	: {
						url: apiUrl + "items",
						type: "GET",
						headers: banhji.header,
						dataType: 'json'
					},
					parameterMap: function(options, operation) {
						if(operation === 'read') {
							return {
								page: options.page,
								limit: options.pageSize,
								filter: options.filter,
								sort: options.sort
							};
						} else {
							return {models: kendo.stringify(options.models)};
						}
					}
				},
				schema 	: {
					model: {
						id: 'id'
					},
					data: 'results',
					total: 'count'
				},
				filter:{ field: "item_type_id", value: 1 },
				sort: { field:"number", dir:"asc" },
				batch: true,
				serverFiltering: true,
				serverSorting: true,
				serverPaging: true,
				page: 1,
				pageSize: 100
            }
        });
    }

    function accountEditor(container, options) {
        $('<input name="' + options.field + '" />')
        .appendTo(container)
        .kendoDropDownList({
        	filter: "contains",        	
            dataTextField: "name",
            dataValueField: "id",
            autoWidth: true,
            height: 200,
            template: kendo.template($("#account-list-tmpl").html()),
            dataSource: {
            	data: banhji.source.accountList,
			  	sort: [
				  	{ field: "account_type_id", dir: "asc" },
				  	{ field: "number", dir: "asc" }
				]
            }
        });
    }

    function toAccountEditor(container, options) {
        $('<input name="' + options.field + '" />')
        .appendTo(container)
        .kendoDropDownList({
        	filter: "contains",        	
            dataTextField: "name",
            dataValueField: "id",
            autoWidth: true,
            height: 200,
            template: kendo.template($("#account-list-tmpl").html()),
            dataSource: {
            	data: banhji.source.accountList,
            	filter: [
			      	{ field: "account_type_id", operator:"neq", value: 10 },
			      	{ field: "account_type_id", operator:"neq", value: 11 },
			      	{ field: "account_type_id", operator:"neq", value: 12 }
			    ],
			  	sort: [
				  	{ field: "account_type_id", dir: "asc" },
				  	{ field: "number", dir: "asc" }
				]
            }
        });
    }

    function whtAccountEditor(container, options) {
        $('<input name="' + options.field + '" />')
        .appendTo(container)
        .kendoDropDownList({
        	filter: "contains",        	
            dataTextField: "name",
            dataValueField: "id",
            autoWidth: true,
            height: 200,
            template: kendo.template($("#account-list-tmpl").html()),
            dataSource: {
            	data: banhji.source.accountList,
            	filter: {
		      		logic: "or",
				    filters: [
				      	{ field: "account_type_id", value: 13 },//Inventory
				      	{ field: "account_type_id", value: 16 },//Fixed Asset
				      	{ field: "account_type_id", value: 17 },//Intangible Assets
				      	{ field: "account_type_id", value: 36 },//Expense
				      	{ field: "account_type_id", value: 37 },
				      	{ field: "account_type_id", value: 38 },
				      	{ field: "account_type_id", value: 40 },
				      	{ field: "account_type_id", value: 41 },
				      	{ field: "account_type_id", value: 42 },
				      	{ field: "account_type_id", value: 43 }
				    ]
				},
			  	sort: [
				  	{ field: "account_type_id", dir: "asc" },
				  	{ field: "number", dir: "asc" }
				]
            }
        });
    }    

    function measurementEditor(container, options) {
        $('<input name="' + options.field + '"/>')
        .appendTo(container)
        .kendoDropDownList({       	
            dataTextField: "measurement",
            dataValueField: "measurement_id",
            autoWidth: true,
            height: 200,
            dataSource: {
            	transport: {
					read 	: {
						url: apiUrl + "item_prices",
						type: "GET",
						headers: banhji.header,
						dataType: 'json'
					},
					parameterMap: function(options, operation) {
						if(operation === 'read') {
							return {
								page: options.page,
								limit: options.pageSize,
								filter: options.filter,
								sort: options.sort
							};
						} else {
							return {models: kendo.stringify(options.models)};
						}
					}
				},
				schema 	: {
					model: {
						id: 'id'
					},
					data: 'results',
					total: 'count'
				},
				filter:[
					{ field:"item_id", value: options.model.item_id },
					{ field:"assembly_id", value: 0 }
				],
				batch: true,
				serverFiltering: true,
				serverSorting: true,
				serverPaging: true,
				page: 1,
				pageSize: 100
            }
        });
    }

    function discountEditor(container, options) {
        $('<input name="' + options.field + '" type="number" class="k-textbox" style="width: 95%;" min="0" max="1" />')
        .appendTo(container);
    }

    function taxForSaleEditor(container, options) {
        $('<input name="' + options.field + '"/>')
        .appendTo(container)
        .kendoDropDownList({
            dataTextField: "name",
            dataValueField: "id",
            autoWidth: true,
            height: 200,
            dataSource: {
            	data: banhji.source.taxList,
			  	filter:{
				    logic: "or",
				    filters: [
				      	{ field: "tax_type_id", value: 3 },//Customer Tax
				      	{ field: "tax_type_id", value: 9 }
				    ]
				},
			  	sort: [
				  	{ field: "tax_type_id", dir: "asc" },
				  	{ field: "name", dir: "asc" }
				]
            }
        });
    }

    function taxForPurchaseEditor(container, options) {
        $('<input name="' + options.field + '"/>')
        .appendTo(container)
        .kendoDropDownList({
            dataTextField: "name",
            dataValueField: "id",
            autoWidth: true,
            height: 200,
            dataSource: {
            	data: banhji.source.taxList,
			  	filter:{
				    logic: "or",
				    filters: [
				      	{ field: "tax_type_id", value: 1 },//Supplier Tax
				      	{ field: "tax_type_id", value: 2 },
				      	{ field: "tax_type_id", value: 3 },
				      	{ field: "tax_type_id", value: 9 }
				    ]
				},
			  	sort: [
				  	{ field: "tax_type_id", dir: "asc" },
				  	{ field: "name", dir: "asc" }
				]
            }
        });
    } 

    function segmentEditor(container, options) {
        $('<input name="' + options.field + '" />')
        .appendTo(container)
        .kendoDropDownList({
        	filter: "startswith",        	
            dataTextField: "name",
            dataValueField: "id",
            autoWidth: true,
            height: 200,
            dataSource: {
            	transport: {
					read 	: {
						url: apiUrl + "segments",
						type: "GET",
						headers: banhji.header,
						dataType: 'json'
					},
					parameterMap: function(options, operation) {
						if(operation === 'read') {
							return {
								page: options.page,
								limit: options.pageSize,
								filter: options.filter,
								sort: options.sort
							};
						} else {
							return {models: kendo.stringify(options.models)};
						}
					}
				},
				schema 	: {
					model: {
						id: 'id'
					},
					data: 'results',
					total: 'count'
				},
				serverFiltering: true,
				serverSorting: true,
				serverPaging: true,
				page: 1,
				pageSize: 100
            }
        });
    }

    function segmentItemEditor(container, options) {
        $('<input name="' + options.field + '" />')
        .appendTo(container)
        .kendoDropDownList({
        	filter: "startswith",        	
            dataTextField: "name",
            dataValueField: "id",
            autoWidth: true,
            height: 200,
            template: kendo.template($("#segment-list-tmpl").html()),
            dataSource: {
            	transport: {
					read 	: {
						url: apiUrl + "segments/item",
						type: "GET",
						headers: banhji.header,
						dataType: 'json'
					},
					parameterMap: function(options, operation) {
						if(operation === 'read') {
							return {
								page: options.page,
								limit: options.pageSize,
								filter: options.filter,
								sort: options.sort
							};
						} else {
							return {models: kendo.stringify(options.models)};
						}
					}
				},
				schema 	: {
					model: {
						id: 'id'
					},
					data: 'results',
					total: 'count'
				},
				filter:{ field: "segment_id", value: options.model.segment.id },
				serverFiltering: true,
				serverSorting: true,
				serverPaging: true,
				page: 1,
				pageSize: 100
            }
        });
    }

    function numberTextboxEditor(container, options) {
        $('<input name="' + options.field + '" type="number" class="k-textbox" style="width: 95%;" />')
        .appendTo(container);
    }

    function dateEditor(container, options) {
        $('<input name="' + options.field + '" />')
        .appendTo(container)
        .kendoDatePicker({
        	format: "dd-MM-yyyy",
        	parseFormats: ["yyyy-MM-dd"]
        });
    }

    function customBoolEditor(container, options) {
        $('<input class="k-checkbox" type="checkbox" name="applyAdditionalCostChk" data-type="boolean" data-bind="checked:additional_applied">').appendTo(container);
        $('<label class="k-checkbox-label">&#8203;</label>').appendTo(container);
    }

    function supplierEditor(container, options) {
        $('<input name="' + options.field + '" />')
        .appendTo(container)
        .kendoDropDownList({
        	filter: "contains",        	
            dataTextField: "name",
            dataValueField: "id",
            autoWidth: true,
            height: 200,
            template: kendo.template($("#contact-list-tmpl").html()),
            dataSource: {
            	transport: {
					read 	: {
						url: apiUrl + "contacts",
						type: "GET",
						headers: banhji.header,
						dataType: 'json'
					},
					parameterMap: function(options, operation) {
						if(operation === 'read') {
							return {
								page: options.page,
								limit: options.pageSize,
								filter: options.filter,
								sort: options.sort
							};
						} else {
							return {models: kendo.stringify(options.models)};
						}
					}
				},
				schema 	: {
					model: {
						id: 'id'
					},
					data: 'results',
					total: 'count'
				},
				filter:{ field: "parent_id", operator:"where_related_contact_type", value: 2 },
				sort: [
					{ field:"contact_type_id", dir:"asc" },
					{ field:"number", dir:"asc" }
				],
				batch: true,
				serverFiltering: true,
				serverSorting: true,
				serverPaging: true,
				page: 1,
				pageSize: 100
            }
        });
    }
    
</script>





<!-- #############################################
##################################################
#	MENU VIEW 					 			 	#
##################################################
############################################## -->
<script id="saleMenu" type="text/x-kendo-template">
	<ul class="topnav">
	  	<!-- <li><a href='#/sale_center' class='glyphicons show_big_thumbnails'><i></i></a></li> -->
	  	<li><a href='#/sale_center'><span data-bind="text: lang.lang.center" style="color: #fff;"></span></a></li>
	  	<li role='presentation' class='dropdown'>
	  		<a class='dropdown-toggle glyphicons text_bigger' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'><i class="text-t"></i> <span class='caret'></span></a>
  			<ul class='dropdown-menu'>
  				<li><a href='#/customer'><span data-bind="text: lang.lang.add_customer"></span></a></li> 
  				<li ><a href='rrd/#/job'><span data-bind="text: lang.lang.add_job"></span></a></li>	
  				<!-- <li><a href='#/item_catalog'><span data-bind="text: lang.lang.add_new_catalog"></span></a></li> -->
  				<li><a href='rrd/#/item_assembly'><span data-bind="text: lang.lang.build_assembly"></span></a></li>
  				<li> <span class="li-line"></span></li>
  				<!-- <li ><a href='#/sale'>Mobile Sale</a></li> -->
  				<li ><a href='#/quote'><span data-bind="text: lang.lang.create_quotation"></span></a></li>
  				<li><a href='#/sale_order'><span data-bind="text: lang.lang.create_sale_order"></span></a></li>
  				<li><a href='#/cash_sale'><span data-bind="text: lang.lang.create_cash_sale"></span></a></li>
  				<li><a href='#/customer_deposit'><span data-bind="text: lang.lang.create_customer_deposit"></span></a></li>
  				<li> <span class="li-line"></span></li>
  				<li><a href='#/sale_recurring'>Recurring</a></li>
  				<!-- <li><a href='#/imports'><span ></span>Imports</a></li> -->
  			</ul>
	  	</li>
	  	<li><a href="#/sale_report_center" style="color: #fff;">Reports</a></li>
	</ul>
</script>

<script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/js/libs/localforage.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jszip/2.4.0/jszip.js"></script>
<script src="https://maps.googleapis.com/maps/api/js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.8.0/xlsx.js"></script>

<script>
	localforage.config({
		driver: localforage.LOCALSTORAGE,
		name: 'userData'
	});
	var banhji = banhji || {};
	var baseUrl = "<?php echo base_url(); ?>";
	var apiUrl = baseUrl + 'api/';
	banhji.s3 = "https://banhji.s3.amazonaws.com/";	
	banhji.token = null;
	banhji.no_image = "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/no_image.jpg";
	// custom widget for min and max
	kendo.data.binders.widget.max = kendo.data.Binder.extend({
		init: function(widget, bindings, options) {//call the base constructor
            kendo.data.Binder.fn.init.call(this, widget.element[0], bindings, options);
        },
        refresh: function() {
            var that = this,
            value = that.bindings["max"].get(); //get the value from the View-Model
            $(that.element).data("kendoDatePicker").max(value); //update the widget
        }
    });
    kendo.data.binders.widget.min = kendo.data.Binder.extend({
        init: function(widget, bindings, options) {
            //call the base constructor
            kendo.data.Binder.fn.init.call(this, widget.element[0], bindings, options);
        },
        refresh: function() {
            var that = this,
            value = that.bindings["min"].get(); //get the value from the View-Model
            $(that.element).data("kendoDatePicker").min(value); //update the widget
        }
    });
	// end of custom widget
	banhji.fileManagement = kendo.observable({
        dataSource: new kendo.data.DataSource({
          transport: {
            read  : {
              url: baseUrl + 'api/attachments',
              type: "GET",
              dataType: 'json',
              headers: { Institute: JSON.parse(localStorage.getItem('userData/user')).institute.id }
            },
            create  : {
              url: baseUrl + 'api/attachments',
              type: "POST",
              dataType: 'json',
              headers: { Institute: JSON.parse(localStorage.getItem('userData/user')).institute.id }
            },
            update  : {
              url: baseUrl + 'api/attachments',
              type: "PUT",
              dataType: 'json',
              headers: { Institute: JSON.parse(localStorage.getItem('userData/user')).institute.id }
            },
            destroy  : {
              url: baseUrl + 'api/attachments',
              type: "DELETE",
              dataType: 'json',
              headers: { Institute: JSON.parse(localStorage.getItem('userData/user')).institute.id }
            },
            parameterMap: function(options, operation) {
              if(operation === 'read') {
                return {
                  limit: options.take,
                  page: options.page,
                  filter: options.filter
                };
              } else {
                return {models: kendo.stringify(options.models)};
              }
            }
          },
          schema  : {
            model: {
              id: 'id'
            },
            data: 'results',
            total: 'count'
          },
          batch: true,
          serverFiltering: true,
          serverPaging: true,
          pageSize: 50
        }),
        fileArray     : [],
        onRemove      : function(e) {
          banhji.fileManagement.dataSource.remove(e.data);
        },
        onSelected    : function(e) {
          var files = e.files;
          var key = 'ATTACH_' + JSON.parse(localStorage.getItem('userData/user')).institute.id + "_" + Math.floor(Math.random() * 100000000000000001) +'_'+ files[0].name;
          banhji.fileManagement.dataSource.add({
            transaction_id  : 0,
            type            : "Transaction",
            name            : files[0].name,
            contact_id      : null,
            description     : "",
            key             : key,
            url             : "https://s3-ap-southeast-1.amazonaws.com/banhji/"+key,
            created_at      : new Date(),
            file            : files[0].rawFile
          });
        },
        allowSize	  : 0,
        transactionSize: 0,
        contactSize   : 0,
        totalSize 	  : 0,
        transactionNu : 0,
        contactNu 	  : 0,
        save                : function(contact_id){
          $.each(banhji.fileManagement.dataSource.data(), function(index, value){ 
            banhji.fileManagement.dataSource.at(index).set("transaction_id", contact_id);
            if(!value.id){
              var params = { 
                Body: value.file, 
                Key: value.key
              };
              bucket.upload(params, function (err, data) {                    
                  // console.log(err, data);
                  // var url = data.Location;
              });
            }
          });

          banhji.fileManagement.dataSource.sync();
          var saved = false;
          banhji.fileManagement.dataSource.bind("requestEnd", function(e){
            //Delete File
            if(e.type=="destroy"){
              if(saved==false && e.response){
                saved = true;
                var response = e.response.results;
                $.each(response, function(index, value){
                  var params = {
                    Delete: { /* required */
                      Objects: [ /* required */
                        {
                          Key: value.data.key
                        }
                      ]
                    }
                  };
                  bucket.deleteObjects(params, function(err, data) {
                    //console.log(err, data);
                  });
                });
              }
            }
            banhji.fileManagement.dataSource.data([]);
          });
        }
    });
	banhji.pageLoaded = {};
	// Initializing AWS Cognito service
	var userPool = new AWSCognito.CognitoIdentityServiceProvider.CognitoUserPool(poolData);
	// Initializing AWS S3 Service
	var bucket = new AWS.S3({params: {Bucket: 'banhji'}});
	banhji.accessMod = new kendo.data.DataSource({
      transport: {
        read  : {
          url: baseUrl + 'api/users/access',
          type: "GET",
          dataType: 'json'
        },
        parameterMap: function(options, operation) {
          if(operation === 'read') {
            return {
              limit: options.pageSize,
              page: options.page,
              filter: options.filter
            };
          } else {
            return {models: kendo.stringify(options.models)};
          }
        }
      },
      schema  : {
        model: {
          id: 'id'
        },
        data: 'results',
        total: 'count'
      },
      batch: true,
      serverFiltering: true,
      serverPaging: true,
      filter: {field: 'username', value: userPool.getCurrentUser() == null ? '': userPool.getCurrentUser().username},
      pageSize: 1
    });
    banhji.accessPage = new kendo.data.DataSource({
	    transport: {
	        read  : {
	          	url: baseUrl + 'api/users/access_role',
	          	type: "GET",
	          	dataType: 'json'
	        },
	        parameterMap: function(options, operation) {
	          	if(operation === 'read') {
	            	return {
	              		limit: options.pageSize,
	              		page: options.page,
	              		filter: options.filter
	            	};
	          	} else {
	            	return {models: kendo.stringify(options.models)};
	          	}
	        }
	    },
	    schema  : {
	        model: {
	          id: 'id'
	        },
	        data: 'results',
	        total: 'count'
	    },
	    batch: true,
	    serverFiltering: true,
	    serverPaging: true,
	    page:1,
	    pageSize: 1
    });
    banhji.allowed;
	function checkRole(arg) {
		var dfd = $.Deferred();
		// var roleName = $(location).attr('hash').substr(2);
		// loop through roles if this has in the role list
		banhji.accessMod.query({
			filter: {field: 'username', value: JSON.parse(localStorage.getItem('userData/user')).username}
		}).then(function(e){
				if(banhji.accessMod.data().length > 0) {
					for(var i = 0; i < banhji.accessMod.data().length; i++) {
						if(arg == banhji.accessMod.data()[i].name.toLowerCase()) {
							dfd.resolve(true);
							break;
						}
					}
				}
			}
		);
	}
	banhji.companyDS = new kendo.data.DataSource({
      transport: {
        read  : {
          url: baseUrl + 'api/profiles/company',
          type: "GET",
          dataType: 'json'
        },
        update  : {
          url: baseUrl + 'api/profiles/company',
          type: "PUT",
          dataType: 'json'
        },
        parameterMap: function(options, operation) {
          if(operation === 'read') {
            return {
              limit: options.pageSize,
              page: options.page,
              filter: options.filter
            };
          } else {
            return {models: kendo.stringify(options.models)};
          }
        }
      },
      schema  : {
        model: {
          id: 'id'
        },
        data: 'results',
        total: 'count'
      },
      batch: true,
      serverFiltering: true,
      serverPaging: true,
      filter: {field: 'username', value: userPool.getCurrentUser() == null ? '': userPool.getCurrentUser().username},
      pageSize: 1
    });
	banhji.profileDS = new kendo.data.DataSource({
      transport: {
        read  : {
          url: baseUrl + 'api/profiles',
          type: "GET",
          dataType: 'json',
          headers: banhji.header,
        },
        parameterMap: function(options, operation) {
          if(operation === 'read') {
            return {
              limit: options.pageSize,
              page: options.page,
              filter: options.filter
            };
          } else {
            return {models: kendo.stringify(options.models)};
          }
        }
      },
      schema  : {
        model: {
          id: 'id'
        },
        data: 'results',
        total: 'count'
      },
      batch: true,
      serverFiltering: true,
      serverPaging: true,
      filter: {field: 'username', value: userPool.getCurrentUser() == null ? '':userPool.getCurrentUser().username},
      pageSize: 100
    });
	banhji.aws = kendo.observable({
        password: null,
        confirm: null,
        email: null,
        verificationCode: null,
        cognitoUser: null,
        newPass: null,
        oldPass: null,
        image: "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/blank.png",
        getImage: function() {
          banhji.profileDS.fetch(function(e){
            banhji.aws.set('image', banhji.profileDS.data()[0].profile_photo);
          });
        },
        signUp: function() {
          // e.preventDefault();
          if(this.get('password') != this.get('confirm')) {
            alert('Passwords do not match');
          } else {
            // using cognito to sign up
            var attributeList = [];

            var dataEmail = {
                Name : 'email',
                Value : this.get('email')
            };

            var attributeEmail = new AWSCognito.CognitoIdentityServiceProvider.CognitoUserAttribute(dataEmail);

            attributeList.push(attributeEmail);

            userPool.signUp(this.get('email'), this.get('password'), attributeList, null, function(err, result){
                if (err) {
                    alert(err);
                    return;
                }
                // update attribute
                // 2. move to admin page
                // banhji.awsCognito.set('cognitoUser', result.user);
                banhji.router.navigate('confirm');
            });
          }
        },
        comfirmCode: function(e) {
           e.preventDefault();
            // confirm user verification code after signed up
            var userData = {
                Username : userPool.getCurrentUser().username,
                Pool : userPool
            };
            var cognitoUser = new AWSCognito.CognitoIdentityServiceProvider.CognitoUser(userData);
            cognitoUser.confirmRegistration(this.get('verificationCode'), true, function(err, result) {
                if (err) {
                    alert(err);
                    return;
                }
                banhji.router.navigate('index');
            });
        },
        resendCode: function(e) {
          e.preventDefault();
          alert('code resent');
        },
        signIn: function() {
            var authenticationData = {
                Username : this.get('email'),
                Password : this.get('password'),
            };
            var authenticationDetails = new AWSCognito.CognitoIdentityServiceProvider.AuthenticationDetails(authenticationData);
            
            var userData = {
                Username : this.get('email'),
                Pool : userPool
            };
            var cognitoUser = new AWSCognito.CognitoIdentityServiceProvider.CognitoUser(userData);
            cognitoUser.authenticateUser(authenticationDetails, {
                onSuccess: function (result) {
                    banhji.awsCognito.set('cognitoUser', cognitoUser);
                },

                onFailure: function(err) {
                    alert(err);
                },

            });
        },
        signOut: function(e){
          e.preventDefault();
          var userData = {
              Username : userPool.getCurrentUser().username,
              Pool : userPool
          };
          var cognitoUser = new AWSCognito.CognitoIdentityServiceProvider.CognitoUser(userData);
          if(cognitoUser != null) {
              cognitoUser.signOut();
              localforage.clear().then(function(){
              	window.location.replace("<?php base_url(); ?>login");
              });              
          } else {
              console.log('No user');
          }
        },
        changePassword: function() {
            var userData = {
                Username : this.get('email'),
                Pool : userPool
            };
            var cognitoUser = new AWSCognito.CognitoIdentityServiceProvider.CognitoUser(userData);
            cognitoUser.changePassword('oldPassword', 'newPassword', function(err, result) {
                if (err) {
                    alert(err);
                    return;
                }
                console.log('call result: ' + result);
            });
        },
        forgotPassword: function(e) {
            e.preventDefault();
            var userData = {
                Username : this.get('email'),
                Pool : userPool
            };
            var cognitoUser = new AWSCognito.CognitoIdentityServiceProvider.CognitoUser(userData);
            cognitoUser.forgotPassword({
                onSuccess: function (result) {
                    console.log('call result: ' + result);
                },
                onFailure: function(err) {
                    alert(err);
                },
                inputVerificationCode() {
                    var verificationCode = prompt('Please input verification code ' ,'');
                    var newPassword = prompt('Enter new password ' ,'');
                    cognitoUser.confirmPassword(verificationCode, newPassword, this);
                }
            });
        },
        getCurrentUser: function() {
            var cognitoUser = null;
            if (userPool.getCurrentUser() != null) {
                cognitoUser = userPool.getCurrentUser();
            }
            return cognitoUser;
        }
    });
	// Check if user is logged and authenticated via cognito service
	if(userPool.getCurrentUser() == null) {
		// if not login return to login page		
	  	//window.location.replace('http://localhost/aws/login.html');
	} else {
	  	var cognitoUser = userPool.getCurrentUser();
	  	if(cognitoUser !== null) {
	    	// banhji.aws.getImage();
	    	cognitoUser.getSession(function(err, result) {
	      		if(result) {
	        		AWS.config.credentials = new AWS.CognitoIdentityCredentials({
	          			IdentityPoolId: 'us-east-1:35445541-da4c-4dbb-b83f-d1d0301a26a9',
	          			Logins: {
	            			'cognito-idp.us-east-1.amazonaws.com/us-east-1_56S0nUDS4' : result.getIdToken().getJwtToken()
	          			}
	        		});
	     		}
	    	});
	  	}
	}
	var langVM = kendo.observable({
		lang 		: null,
		localeCode 	: null,
		changeToEn 	: function() {
			localforage.setItem("lang", "EN").then(function(value){
				location.reload(false);
			});
		},
		changeToKh 	: function() {
			localforage.setItem("lang", "KH").then(function(value){
				location.reload(false);
			});
		}
	});
	banhji.userData = JSON.parse(localStorage.getItem('userData/user')) ? JSON.parse(localStorage.getItem('userData/user')) : "";
	if(banhji.userData == "") {
		banhji.companyDS.fetch(function() {
			banhji.profileDS.fetch(function(){
				var data = banhji.companyDS.data();
				var id = 0;
				id = banhji.profileDS.data()[0].id;
				if(data.length > 0) {
					var user = {
						id: id,
						username: userPool.getCurrentUser().username,
						institute: data
					};
					localforage.setItem('user', user);
				}
				banhji.userData = JSON.parse(localStorage.getItem('userData/user'));
			});
		});
	}
	banhji.institute = banhji.userData ? banhji.userData.institute : "";
	banhji.locale = banhji.institute.currency.locale;
	kendo.culture(banhji.locale);
	banhji.localeReport = banhji.institute.reportCurrency.locale;
	banhji.header = { Institute: banhji.institute.id };	
	var dataStore = function(url) {
		var o = new kendo.data.DataSource({
			transport: {
				read 	: {
					url: url,
					type: "GET",
					headers: banhji.header,
					dataType: 'json'
				},
				create 	: {
					url: url,
					type: "POST",
					headers: banhji.header,
					dataType: 'json'
				},
				update 	: {
					url: url,
					type: "PUT",
					headers: banhji.header,
					dataType: 'json'
				},
				destroy 	: {
					url: url,
					type: "DELETE",
					headers: banhji.header,
					dataType: 'json'
				},
				parameterMap: function(options, operation) {
					if(operation === 'read') {
						return {
							page: options.page,
							limit: options.pageSize,
							filter: options.filter,
							sort: options.sort
						};
					} else {
						return {models: kendo.stringify(options.models)};
					}
				}
			},
			schema 	: {
				model: {
					id: 'id'
				},
				data: 'results',
				total: 'count'
			},
			batch: true,
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page: 1,
			pageSize: 100
		});
		return o;
	};
	banhji.userManagement = kendo.observable({
		lang : langVM,
		multiTaskList 		: [],
		searchText : "",
		searchType : "contacts",
		checkRole  : function(e) {
			e.preventDefault();
		if(JSON.parse(localStorage.getItem('userData/user')).role == 1) {
            banhji.router.navigate("");
          } else {
           	window.location.replace("<?php echo base_url(); ?>admin");
          }
		},
		searchContact: function() {
			this.set("searchType", "contacts");

			$("#search-placeholder").attr('placeholder', "Search Contact");
		},
		searchTransaction: function() {
			this.set("searchType", "transactions");

			$("#search-placeholder").attr('placeholder', "Search Transaction");
		},
		searchItem: function() {
			this.set("searchType", "items");

			$("#search-placeholder").attr('placeholder', "Search Item");
		},
		search: function(e) {
			e.preventDefault();
			
			banhji.searchAdvanced.set("searchText", this.get("searchText"));
			banhji.searchAdvanced.set("searchType", this.get("searchType"));
			banhji.searchAdvanced.search();
			banhji.router.navigate('/search_advanced');
		},
		removeLink 			: function(e){
			e.preventDefault();

			var data = e.data,
			index = this.multiTaskList.indexOf(data);
			
			if(data.vm!==null){
				data.vm.cancel();
			}
			this.multiTaskList.splice(index, 1);
		},
		removeMultiTask		: function(url){
			var self = this;

			$.each(this.multiTaskList, function(index, value){
				if(value.url==url){
					self.multiTaskList.splice(index, 1);

					return false;
				}
			});
		},
		addMultiTask 		: function(name, url, vm){
			var isExisting = false;
			$.each(this.multiTaskList, function(index, value){
				if(value.url==url){
					isExisting = true;

					return false;
				}
			});

			if(isExisting==false){
				this.multiTaskList.push({ name:name, url:url, vm:vm });
			}
		},
		auth : new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + 'authentication',
					type: "GET",
					dataType: 'json'
				},
				create 	: {
					url: apiUrl + 'authentication',
					type: "POST",
					dataType: 'json'
				},
				update 	: {
					url: apiUrl + 'authentication',
					type: "PUT",
					dataType: 'json'
				},
				destroy : {
					url: apiUrl + 'authentication',
					type: "DELETE",
					dataType: 'json'
				},
				parameterMap: function(options, operation) {
					if(operation === 'read') {
						return {
							limit: options.pageSize,
							page: options.page,
							filter: options.filter
						};
					} else {
						return {models: kendo.stringify(options.models)};
					}
				}
			},
			schema 	: {
				model: {
					id: 'id'
				},
				data: 'results',
				total: 'count'
			},
			batch: true,
			serverFiltering: true,
			serverPaging: true,
			// pageSize: 100
		}),
		inst 	 : new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + 'banhji/company',
					type: "GET",
					dataType: 'json'
				},
				create 	: {
					url: apiUrl + 'banhji/company',
					type: "POST",
					dataType: 'json'
				},
				update 	: {
					url: apiUrl + 'banhji/company',
					type: "PUT",
					dataType: 'json'
				},
				destroy : {
					url: apiUrl + 'banhji/company',
					type: "DELETE",
					dataType: 'json'
				},
				parameterMap: function(options, operation) {
					if(operation === 'read') {
						return {
							limit: options.pageSize,
							page: options.page,
							filter: options.filter
						};
					} else {
						return {models: kendo.stringify(options.models)};
					}
				}
			},
			schema 	: {
				model: {
					id: 'id'
				},
				data: 'results',
				total: 'count'
			},
			batch: true,
			serverFiltering: true,
			serverPaging: true,
			// pageSize: 100
		}),
		industry : new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + 'banhji/industry',
					type: "GET",
					dataType: 'json'
				},
				parameterMap: function(options, operation) {
					if(operation === 'read') {
						return {
							limit: options.pageSize,
							page: options.page,
							filter: options.filter
						};
					} else {
						return {models: kendo.stringify(options.models)};
					}
				}
			},
			schema 	: {
				model: {
					id: 'id'
				},
				data: 'results',
				total: 'count'
			},
			batch: true,
			serverFiltering: true,
			serverPaging: true,
			// pageSize: 100
		}),
		countries: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + 'banhji/countries',
					type: "GET",
					dataType: 'json'
				},
				parameterMap: function(options, operation) {
					if(operation === 'read') {
						return {
							limit: options.pageSize,
							page: options.page,
							filter: options.filter
						};
					} else {
						return {models: kendo.stringify(options.models)};
					}
				}
			},
			schema 	: {
				model: {
					id: 'id'
				},
				data: 'results',
				total: 'count'
			},
			batch: true,
			serverFiltering: true,
			serverPaging: true,
			// pageSize: 100
		}),
		provinces: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + 'banhji/provinces',
					type: "GET",
					dataType: 'json'
				},
				parameterMap: function(options, operation) {
					if(operation === 'read') {
						return {
							limit: options.pageSize,
							page: options.page,
							filter: options.filter
						};
					} else {
						return {models: kendo.stringify(options.models)};
					}
				}
			},
			schema 	: {
				model: {
					id: 'id'
				},
				data: 'results',
				total: 'count'
			},
			batch: true,
			serverFiltering: true,
			serverPaging: true,
			// pageSize: 100
		}),
		types 	 : new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + 'banhji/types',
					type: "GET",
					dataType: 'json'
				},
				parameterMap: function(options, operation) {
					if(operation === 'read') {
						return {
							limit: options.pageSize,
							page: options.page,
							filter: options.filter
						};
					} else {
						return {models: kendo.stringify(options.models)};
					}
				}
			},
			schema 	: {
				model: {
					id: 'id'
				},
				data: 'results',
				total: 'count'
			},
			batch: true,
			serverFiltering: true,
			serverPaging: true,
			// pageSize: 100
		}),
		instMod 	: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + 'admin/modules_institute',
					type: "GET",
					dataType: 'json'
				},
				create 	: {
					url: apiUrl + 'admin/modules_institute',
					type: "POST",
					dataType: 'json'
				},
				update 	: {
					url: apiUrl + 'admin/modules_institute',
					type: "PUT",
					dataType: 'json'
				},
				destroy : {
					url: apiUrl + 'admin/modules_institute',
					type: "DELETE",
					dataType: 'json'
				},
				parameterMap: function(options, operation) {
					if(operation === 'read') {
						return {
							limit: options.pageSize,
							page: options.page,
							filter: options.filter
						};
					} else {
						return {models: kendo.stringify(options.models)};
					}
				}
			},
			schema 	: {
				model: {
					id: 'id'
				},
				data: 'results',
				total: 'count'
			},
			batch: true,
			serverFiltering: true,
			serverPaging: true,
			filter: {field: 'id', value: 1}
			// pageSize: 100
		}),
		onSuccessUpload: function(e){
			var logo = e.response.results.url;
			this.get('newInst').set('logo', logo);
			this.saveIntitute();
			// console.log(logo);
		},
		close 		: function() {
			window.history.back(-1);
			if(this.inst.hasChanges()) {
				this.inst.cancelChanges();
			}
			if(this.auth.hasChanges()) {
				this.auth.cancelChanges();
			}
		},
		getUsername : function() {
			var x = banhji.userData.username.substring(0,2);
			return x.toUpperCase();
		},
		taxRegimes: [
			{ code: 'small', type: 'ខ្នាតតូច'},
			{ code: 'medium', type: 'ខ្នាតមធ្យម'},
			{ code: 'large', type: 'ខ្នាតធំ'}
		],
		currency : [
			{ code: 'KHR', locale: 'km-KH'},
			{ code: 'USD', locale: 'us-US'},
			{ code: 'VND', locale: 'vn-VN'}
		],
		username : null,
		password : null,
		_password: null,
		pwdDS 	 : new kendo.data.DataSource({
			transport: {
				create 	: {
					url: apiUrl + 'banhji/password',
					type: "POST",
					dataType: 'json'
				},
				parameterMap: function(options, operation) {
					if(operation === 'read') {
						return {
							limit: options.pageSize,
							page: options.page,
							filter: options.filter
						};
					} else {
						return {models: kendo.stringify(options.models)};
					}
				}
			},
			schema 	: {
				model: {
					id: 'id'
				},
				data: 'results',
				total: 'count'
			},
			batch: true,
			serverFiltering: true,
			serverPaging: true,
			pageSize: 100
		}),
		validateEmail: function() {
			var sQtext = '[^\\x0d\\x22\\x5c\\x80-\\xff]';
		  	var sDtext = '[^\\x0d\\x5b-\\x5d\\x80-\\xff]';
		  	var sAtom = '[^\\x00-\\x20\\x22\\x28\\x29\\x2c\\x2e\\x3a-\\x3c\\x3e\\x40\\x5b-\\x5d\\x7f-\\xff]+';
		  	var sQuotedPair = '\\x5c[\\x00-\\x7f]';
		  	var sDomainLiteral = '\\x5b(' + sDtext + '|' + sQuotedPair + ')*\\x5d';
		  	var sQuotedString = '\\x22(' + sQtext + '|' + sQuotedPair + ')*\\x22';
		  	var sDomain_ref = sAtom;
		  	var sSubDomain = '(' + sDomain_ref + '|' + sDomainLiteral + ')';
		  	var sWord = '(' + sAtom + '|' + sQuotedString + ')';
		  	var sDomain = sSubDomain + '(\\x2e' + sSubDomain + ')*';
		  	var sLocalPart = sWord + '(\\x2e' + sWord + ')*';
		  	var sAddrSpec = sLocalPart + '\\x40' + sDomain; // complete RFC822 email address spec
		  	var sValidEmail = '^' + sAddrSpec + '$'; // as whole string

		  	var reValidEmail = new RegExp(sValidEmail);

		  	if(!reValidEmail.test(this.get('username'))){
		  		alert("Please enter valid address");
				this.set('passed', false);
		  	}
		  	this.set('passed', false);
		},
		loginBtn : function() {
			banhji.view.layout.showIn('#content', banhji.view.loginView);
		},
		login  	 : function() {
			this.auth.query({
				filter: [
					{field: 'username', value: banhji.userManagement.get('username')},
					{field: 'password', value: banhji.userManagement.get('password')}
				]
			}).done(function(e){
				var data = banhji.userManagement.auth.data();
				if(data.length > 0) {
					var user = banhji.userManagement.auth.data()[0];
					localforage.setItem('user', user);
					if(user.institute.length === 0) {
						banhji.router.navigate('/no-page');
					} else {
						banhji.router.navigate('/');
					}
				} else {
					console.log('bad');
				}
			});
		},
		registerBtn: function() {
			banhji.view.layout.showIn('#content', banhji.view.signupView);	
		},
		logout 		: function(e) {
			e.preventDefault();
			var userData = {
              	Username : userPool.getCurrentUser().username,
              	Pool : userPool
	        };
          	var cognitoUser = new AWSCognito.CognitoIdentityServiceProvider.CognitoUser(userData);
          	if(cognitoUser != null) {
              	cognitoUser.signOut();
              	localforage.removeItem('user').then(function() {
				    // Run this code once the key has been removed.
				    console.log('Key is cleared!');
				}).catch(function(err) {
				    // This code runs if there were any errors
				    console.log(err);
				});
              	window.location.replace("<?php echo base_url(); ?>login");
          	} else {
              	console.log('No user');
          	}
		},
		setCurrent : function(current) {
			this.set('current', current);
		},
		changePwd  : function() {
			if(this.get('password') !== this.get('_password')) {
				alert("Password does not match");
			} else {
				this.pwdDS.sync();
			}
		},
		getLogin 	: function() {
			return JSON.parse(localStorage.getItem('userData/user'));
		},
		page 	 : function() {
			if(banhji.userManagement.getLogin()) {
				if(banhji.userManagement.getLogin().perm === 1) {
					return 'admin';
				}
			} else {
				return 'home';
			}
			// if(this.getLogin()) {
			// 	return '\#/page';
			// } else {
			// 	return '\#/page/';
			// }
		},
		createComp : function() {
			banhji.router.navigate('/create_company');
		},
		setInstitute: function(newIns) {
			this.set('newInst', newIns);
		},
		addInst    : function() {
			this.inst.insert(0, {
				name: "",
				email: "",
				address: "",
				description: "",
				industry: {id: null, name: null},
				type: {id: null, name: null},
				country: {id: null, code: null, name: null},
				province: {id: null, local: null, english: null},
				vat_no: null,
				fiscal_date: null,
				tax_regime: null,
				locale : null,
				legal_name: null,
				date_founded: null,
				logo: ""
			});
			this.setInstitute(this.inst.at(0));
		},
		cancelInst : function() {
			this.inst.cancelChanges();
		},
		saveIntitute: function() {
			if(this.get('newInst').industry.id !== null || this.get('newInst').province.id || this.get('newInst').country.id) {
				this.inst.sync();
				this.inst.bind('requestEnd', function(e){
					var type = e.type, res = e.response.results;
					if(e.response.error === false) {
						if(e.type === 'create') {
							$('#createComMessage').text("created. Please wait till site admin created database for you.");
						} else {
							localforage.removeItem('company', function(err){
							});
							localforage.setItem('company', res);
							$('#createComMessage').text("Updated");
						}
					} else {
						$('#createComMessage').text("error creating company.");
					}
				});
			} else {
				alert('filling all fields');
			}
		},
		signup 	   : function() {
			this.auth.add({username: this.get('username'), password: this.get('password')});
			this.sync();
			this.auth.bind('requestEnd', function(e){
				if(e.type === 'create' && e.response.error === false) {
					alert("អ្នកបានចុះឈ្មោះរួច");
					banhji.router.route('')
				}
			});
		},
		onFileSelect: function(e) {
			console.log(e.files[0]);
		},
		sync: function() {
			this.auth.sync();
			this.auth.bind('requestEnd', function(e){
				var type = e.type;
				var result = e.response.results;
				if(type === "read" && e.error !== true) {
					// get login info
					console.log('true');
				} else if(type === "create") {
					if(e.response.error === true) {
						banhji.userManagement.auth.cancelChanges();
						alert('មានរួចហើយ');
					} else {
						var user = banhji.userManagement.auth.data()[0];
						localforage.setItem('user', user);
						if(!user.institute) {
							banhji.router.navigate('/page', false);
						} else {
							banhji.router.navigate('/app', false);
						}
					}
				}
			});
		}
	});
	function getDB() {
		var entity = null;
		if(banhji.userManagement.getLogin()) {
			if(banhji.userManagement.getLogin().institute) {
				if(banhji.userManagement.getLogin().institute.length > 0) {
					entity = banhji.userManagement.getLogin().institute.name
				}
			} else {
				entity = false
			}
		}
		return entity;
	}
	banhji.currency = kendo.observable({
		dataSource 			: dataStore(apiUrl + 'currencies'),
		getCurrencyID 		: function(locale){
			var currency_id = 0;

			$.each(this.dataSource.data(), function(index, value){
				if(value.locale===locale){
					currency_id = value.id;
					return false;
				}
			});

			return currency_id;
		}
	});
	banhji.users = kendo.observable({
		dataStore	: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + 'banhji/users',
					type: "GET",
					headers: {
						"Entity": getDB(),
						"User": banhji.userManagement.getLogin() === null ? '': banhji.userManagement.getLogin().id
					},
					dataType: 'json'
				},
				create 	: {
					url: apiUrl + 'banhji/users',
					type: "POST",
					headers: {
						"Entity": getDB(),
						"User": banhji.userManagement.getLogin() === null ? '': banhji.userManagement.getLogin().id
					},
					dataType: 'json'
				},
				update 	: {
					url: apiUrl + 'banhji/users',
					type: "PUT",
					headers: {
						"Entity": getDB(),
						"User": banhji.userManagement.getLogin() === null ? '': banhji.userManagement.getLogin().id
					},
					dataType: 'json'
				},
				destroy : {
					url: apiUrl + 'banhji/users',
					type: "DELETE",
					headers: {
						"Entity": getDB(),
						"User": banhji.userManagement.getLogin() === null ? '': banhji.userManagement.getLogin().id
					},
					dataType: 'json'
				},
				parameterMap: function(options, operation) {
					if(operation === 'read') {
						return {
							limit: options.pageSize,
							page: options.page,
							filter: options.filter
						};
					} else {
						return {models: kendo.stringify(options.models)};
					}
				}
			},
			schema 	: {
				model: {
					id: 'id'
				},
				data: 'results',
				total: 'count'
			},
			batch: true,
			serverFiltering: true,
			serverPaging: true,
			pageSize: 100
		}),
		roleDS 		: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + 'banhji/roles',
					type: "GET",
					headers: {
						"Entity": getDB(),
						"User": banhji.userManagement.getLogin() === null ? '': banhji.userManagement.getLogin().id
					},
					dataType: 'json'
				},
				parameterMap: function(options, operation) {
					if(operation === 'read') {
						return {
							limit: options.pageSize,
							page: options.page,
							filter: options.filter
						};
					} else {
						return {models: kendo.stringify(options.models)};
					}
				}
			},
			schema 	: {
				model: {
					id: 'id'
				},
				data: 'results',
				total: 'count'
			},
			batch: true,
			serverFiltering: true,
			serverPaging: true,
			pageSize: 100
		}),
		add 		: function() {
			banhji.view.pageAdmin.showIn('#col2', banhji.view.addUserView);
			this.dataStore.insert(0, {username: '', password: null, permission: {id: null, name: null}});
			this.setCurrent(this.dataStore.at(0));
		},
		remove 		: function(e) {
			var user = confirm('Are you sure you want to remove this user?');
			if(user === true) {
				this.dataStore.remove(e.data);
				this.sync();
			}
		},
		editRight 	: function(e) {
			banhji.view.pageAdmin.showIn('#col2', banhji.view.editRoleView);
			this.setCurrent(e.data);
		},
		cancelAdd 	: function() {
			banhji.view.pageAdmin.showIn('#col2', banhji.view.userListView);
			this.dataStore.cancelChanges();
		},
		setCurrent 	: function(current) {
			this.set('current', current);
		},
		sync 		: function() {
			this.dataStore.sync();
			this.dataStore.bind('requestEnd', function(e){
				var type = e.type;
				var data = e.response.results;
				if(type !== 'read') {
					console.log('data recorded');
				}
			});
		}
	});
	banhji.people = kendo.observable({
		dataSource : new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + "people",
					type: "GET",
					headers: {
						"Entity": banhji.userManagement.getLogin() !== null ? banhji.userManagement.getLogin().institute.name:""
					},
					dataType: 'json'
				},
				create 	: {
					url: apiUrl + "people",
					type: "POST",
					headers: {
						"Entity": banhji.userManagement.getLogin() !== null ? banhji.userManagement.getLogin().institute.name:""
					},
					dataType: 'json'
				},
				update 	: {
					url: apiUrl + "people",
					type: "PUT",
					headers: {
						"Entity": banhji.userManagement.getLogin() !== null ? banhji.userManagement.getLogin().institutename:""
					},
					dataType: 'json'
				},
				destroy : {
					url: apiUrl + "people",
					type: "DELETE",
					headers: {
						"Entity": banhji.userManagement.getLogin() !== null ? banhji.userManagement.getLogin().institute.name:""
					},
					dataType: 'json'
				},
				parameterMap: function(options, operation) {
					if(operation === 'read') {
						return {
							limit: options.pageSize,
							offset: options.skip,
							filter: options.filter
						};
					} else {
						return {models: kendo.stringify(options.models)};
					}
				}
			},
			schema 	: {
				model: {
					id: 'id'
				},
				data: 'results',
				total: 'count',
				errors: 'error'
			},
			batch: true,
			serverFiltering: true,
			serverPaging: true,
			pageSize: 20
		}),
		filterBy   : function() {},
		save 	   : function() {}
	});
	// end TEst offline
	var obj = function(url) {
		var o = kendo.observable({
			dataStore: new kendo.data.DataSource({
				transport: {
					read 	: {
						url: url,
						type: "GET",
						headers: {
							"Entity": getDB()
						},
						dataType: 'json'
					},
					create 	: {
						url: url,
						type: "POST",
						headers: {
							"Entity": getDB()
						},
						dataType: 'json'
					},
					update 	: {
						url: url,
						type: "PUT",
						headers: {
							"Entity": getDB()
						},
						dataType: 'json'
					},
					destroy : {
						url: url,
						type: "DELETE",
						headers: {
							"Entity": getDB()
						},
						dataType: 'json'
					},
					parameterMap: function(options, operation) {
						if(operation === 'read') {
							return {
								limit: options.pageSize,
								offset: options.skip,
								filter: options.filter
							};
						} else {
							return {models: kendo.stringify(options.models)};
						}
					}
				},
				schema 	: {
					model: {
						id: 'id'
					},
					data: 'results',
					total: 'count',
					errors: 'error'
				},
				batch: true,
				serverFiltering: true,
				serverPaging: true,
				pageSize: 20
			}),
			findById: function(id) {},
			findBy 	: function(arr) {},
			insert 	: function(data) {},
			remove 	: function(model) {
				this.dataStore.remove(model);
				this.save();
			},
			save 	: function() {
				this.dataStore.sync();
				this.dataStore.bind('requestEnd', function(e){
					var type = e.type, res = e.response.results;
					console.log(type + " operation is successful.");
				});
			}
		});
		return o;
	}
	banhji.Layout = kendo.observable({
		locale: "km-KH",
		menu 	: [],
		// isShown : true,
		// isAdmin : auth.isAdmin(),
		// logout 	: function(e) {
		// 	e.preventDefault();
		// 	auth.logout();
		// },
		// isLogin : function(){
		// 	if(banhji.userManagement.getLogin()) {
		// 		return true;
		// 	} else {
		// 		return false;
		// 	}
		// },
		// init: function() {
		// 	// initialize when the whole page load
		// },
		// ui: function() {
		// 	// get UI information from source base on locale
		// }
	});
	var role = kendo.observable({
		dataStore 	: new kendo.data.DataSource({
			transport: {
				read: {
					url: apiUrl + 'roles',
					dataType: 'json',
					headers: {
						"Entity": getDB()
					},
					type: 'GET'
				},
				create: {
					url: apiUrl + 'roles',
					dataType: 'json',
					headers: {
						"Entity": getDB()
					},
					type: 'GET'
				},
				update: {
					url: apiUrl + 'roles',
					dataType: 'json',
					headers: {
						"Entity": getDB()
					},
					type: 'GET'
				},
				destroy: {
					url: apiUrl + 'roles',
					dataType: 'json',
					headers: {
						"Entity": getDB()
					},
					type: 'GET'
				},
				parameterMap: function(data, operation) {
					if(operation === 'read') {
						return {
							limit: data.pageSize,
							offset: data.skip,
							filter: data.filter
						};
					}
					return {models: kendo.stringify(data.models)};
				}
			},
			schema: {
	        	model: {
	        		id: "id"
	        	},
	        	data: "results"
	        },
			pageSize: 20,
			serverPaging: true,
			serverFiltering: true,
			batch: true
		}),
		roleUserDs 	: new kendo.data.DataSource({
			transport: {
				read: {
					url: apiUrl + 'roles/user',
					dataType: 'json',
					headers: {
						"Entity": getDB()
					},
					type: 'GET'
				},
				create: {
					url: apiUrl + 'roles/user',
					dataType: 'json',
					headers: {
						"Entity": getDB()
					},
					type: 'POST'
				},
				update: {
					url: apiUrl + 'roles/user',
					dataType: 'json',
					headers: {
						"Entity": getDB()
					},
					type: 'PUT'
				},
				destroy: {
					url: apiUrl + 'roles/user',
					dataType: 'json',
					headers: {
						"Entity": getDB()
					},
					type: 'DELETE'
				},
				parameterMap: function(data, operation) {
					if(operation === 'read') {
						return {
							limit: data.pageSize,
							offset: data.skip,
							filter: data.filter
						};
					}
					return {models: kendo.stringify(data.models)};
				}
			},
			schema: {
	        	model: {
	        		id: "id"
	        	},
	        	data: "results"
	        },
			pageSize: 20,
			serverPaging: true,
			serverFiltering: true,
			batch: true
		}),
		find 		: function(arg) {},
		setCurrent 	: function(currentRole) {},
		save 		: function() {}
	});

	// SOURCE #############################################################################################
	banhji.source = kendo.observable({
		lang 						: langVM,
		countryDS					: dataStore(apiUrl + "countries"),
		//Contact
		customerDS					: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + "contacts",
					type: "GET",
					headers: banhji.header,
					dataType: 'json'
				},				
				parameterMap: function(options, operation) {
					if(operation === 'read') {
						return {
							page: options.page,
							limit: options.pageSize,
							filter: options.filter,
							sort: options.sort
						};
					} else {
						return {models: kendo.stringify(options.models)};
					}
				}
			},
			schema 	: {
				model: {
					id: 'id'
				},
				data: 'results',
				total: 'count'
			},
			filter:{ field:"assignee_id", operator:"by_user_id", value:banhji.userData.id },
			sort:{ field:"number", dir:"asc" },
			batch: true,
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page:1,
			pageSize: 100
		}),
		employeeUserDS				: dataStore(apiUrl + "contacts"),
		//Contact Type
		contactTypeList 			: [],
		contactTypeDS				: dataStore(apiUrl + "contacts/type"),
		//Job
		jobList 					: [],
		jobDS						: dataStore(apiUrl + "jobs"),
		//Currency
		currencyList 				: [],
		currencyDS					: dataStore(apiUrl + "currencies"),
		currencyRateDS				: dataStore(apiUrl + "currencies/rate"),
		//Item
		itemList 					: [],
		itemDS						: dataStore(apiUrl + "items"),
		itemTypeDS					: dataStore(apiUrl + "item_types"),
		itemGroupList 				: [],
		itemGroupDS					: dataStore(apiUrl + "items/group"),
		brandDS						: dataStore(apiUrl + "brands"),
		categoryList 				: [],
		categoryDS					: dataStore(apiUrl + "categories"),		
		itemPriceList 				: [],
		itemPriceDS					: dataStore(apiUrl + "item_prices"),
		measurementList 			: [],
		measurementDS				: dataStore(apiUrl + "measurements"),
		//Tax
		taxTypeDS					: dataStore(apiUrl + "tax_types"),
		taxList 					: [],
		taxItemDS					: dataStore(apiUrl + "tax_items"),
		//Accounting
		accountList 				: [],
		accountDS					: dataStore(apiUrl + "accounts"),
		accountTypeDS				: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + "accounts/type",
					type: "GET",
					headers: banhji.header,
					dataType: 'json'
				},
				parameterMap: function(options, operation) {
					if(operation === 'read') {
						return {
							page: options.page,
							limit: options.pageSize,	
							filter: options.filter,
							sort: options.sort
						};
					} else {
						return {models: kendo.stringify(options.models)};
					}
				}
			},
			schema 	: {
				model: {
					id: 'id'
				},
				data: 'results',
				total: 'count'
			},
			filter:{ field:"id >", value:9 },
			batch: true,
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page:1,
			pageSize: 100
		}),
		//Payment Term, Method, Segment
		paymentTermDS				: dataStore(apiUrl + "payment_terms"),
		paymentMethodDS				: dataStore(apiUrl + "payment_methods"),
		//Segment
		segmentDS					: dataStore(apiUrl + "segments"),
		segmentItemList 			: [],
		segmentItemDS				: dataStore(apiUrl + "segments/item"),
		//Txn Template
		txnTemplateList 			: [],
		txnTemplateDS				: dataStore(apiUrl + "transaction_templates"),
		//Prefixes
		prefixList 					: [],
		prefixDS					: dataStore(apiUrl + "prefixes"),
		frequencyList 				: [
			{ id: 'Daily', name: 'Day' },
			{ id: 'Weekly', name: 'Week' },
			{ id: 'Monthly', name: 'Month' },
			{ id: 'Annually', name: 'Annual' }
		],
		monthOptionList 			: [
			{ id: 'Day', name: 'Day' },
			{ id: '1st', name: '1st' },
			{ id: '2nd', name: '2nd' },
			{ id: '3rd', name: '3rd' },
			{ id: '4th', name: '4th' }
		],
		monthList 					: [
			{ id: 0, name: 'January' },
			{ id: 1, name: 'February' },
			{ id: 2, name: 'March' },
			{ id: 3, name: 'April' },
			{ id: 4, name: 'May' },
			{ id: 5, name: 'June' },
			{ id: 6, name: 'July' },
			{ id: 7, name: 'August' },
			{ id: 8, name: 'September' },
			{ id: 9, name: 'October' },
			{ id: 10, name: 'November' },
			{ id: 11, name: 'December' }
		],
		weekDayList 				: [
			{ id: 0, name: 'Sunday' },
			{ id: 1, name: 'Monday' },
			{ id: 2, name: 'Tuesday' },
			{ id: 3, name: 'Wednesday' },
			{ id: 4, name: 'Thurday' },
			{ id: 5, name: 'Friday' },
			{ id: 6, name: 'Saturday' }
		],
		dayList 					: [
			{ id: 1, name: '1st' },
			{ id: 2, name: '2nd' },
			{ id: 3, name: '3rd' },
			{ id: 4, name: '4th' },
			{ id: 5, name: '5th' },
			{ id: 6, name: '6th' },
			{ id: 7, name: '7th' },
			{ id: 8, name: '8th' },
			{ id: 9, name: '9th' },
			{ id: 10, name: '10th' },
			{ id: 11, name: '11st' },
			{ id: 12, name: '12nd' },
			{ id: 13, name: '13rd' },
			{ id: 14, name: '14th' },
			{ id: 15, name: '15th' },
			{ id: 16, name: '16th' },
			{ id: 17, name: '17th' },
			{ id: 18, name: '18th' },
			{ id: 19, name: '19th' },
			{ id: 20, name: '20th' },
			{ id: 21, name: '21st' },
			{ id: 22, name: '22nd' },
			{ id: 23, name: '23rd' },
			{ id: 24, name: '24th' },
			{ id: 25, name: '25th' },
			{ id: 26, name: '26th' },
			{ id: 27, name: '27th' },
			{ id: 28, name: '28th' },
			{ id: 0, name: 'Last' }
		],
		sortList					: [
	 		{ text:"All", value: "all" },
	 		{ text:"Today", value: "today" },
	 		{ text:"This Week", value: "week" },
	 		{ text:"This Month", value: "month" },
	 		{ text:"This Year", value: "year" }
		],
		statusList 					: [
			{ "id": 1, "name": "Active" },
			{ "id": 0, "name": "Inactive" },
			{ "id": 2, "name": "Void" }
        ],
        customerFormList 			: [
	    	{ id: "Quote", name: "Quotation" },
			{ id: "Sale_Order", name: "Sale Order" },
			{ id: "Deposit", name: "Deposit" },
			{ id: "Cash_Sale", name: "Cash Sale" },
			{ id: "Invoice", name: "Invoice" },
			{ id: "Cash_Receipt", name: "Cash Receipt" },
			//{ id: "Sale_Return", name: "Sale Return" },
			{ id: "GDN", name: "Delivered Note" }
	    ],
	    vendorFormList 				: [
	    	{ id: "Purchase_Order", name: "Purchase Order" },
	    	{ id: "GRN", name: "GRN" },
			// { id: "Deposit", name: "Deposit" },
			// { id: "Purchase", name: "Purchase" },
			// { id: "Pur_Return", name: "Pur.Return" },
			{ id: "Cash_Payment", name: "Cash Payment" }
	    ],
	    cashFormList 				: [
	    	{ id: "Cash_Transfer", name: "Cash Transaction" },
	    	{ id: "Cash_Receipt", name: "Cash Receipt" },
			{ id: "Cash_Payment", name: "Cash Payment" },
			{ id: "Cash_Advance", name: "Cash Advance" },
			{ id: "Reimbursement", name: "Reimbursement" },
			{ id: "Advance_Settlement", name: "Advance Settlement" }
	    ],
	    cashMGTFormList				: [
	    	{ id: "Cash_Transfer", name: "Transfer" },
	    	{ id: "Deposit", name: "Deposit" },
			{ id: "Withdraw", name: "Withdraw" },
			{ id: "Cash_Advance", name: "Advance" },
			{ id: "Cash_Payment", name: "Payment" },
			{ id: "Reimbursement", name: "Reimbursement" },
			{ id: "Journal", name: "Journal" }
	    ],
	    statusObj 					: { text:"", date:"", number:"", url:"" },
	    defaultLines 				: 2,
		genderList					: ["M", "F"],
		typeList 					: ['Invoice','Commercial_Invoice','Vat_Invoice','Electricity_Invoice','Water_Invoice','Cash_Sale','Commercial_Cash_Sale','Vat_Cash_Sale','Receipt_Allocation','Sale_Order','Quote','GDN','Sale_Return','Purchase_Order','GRN','Cash_Purchase','Credit_Purchase','Purchase_Return','Payment_Allocation','Deposit','Electricty_Deposit','Water_Deposit','Customer_Deposit','Vendor_Deposit','Withdraw','Transfer','Journal','Item_Adjustment','Cash_Advance','Reimbursement','Direct_Expense','Advance_Settlement','Additional_Cost','Cash_Payment','Cash_Receipt','Credit_Note','Debit_Note','Offset_Bill','Offset_Invoice','Cash_Transfer','Internal_Usage'],
		user_id						: banhji.userData.id,
		amtDueColor 				: "#eee",
		acceptedSrc					: "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/accepted.ico",
		approvedSrc					: "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/approved.ico",
		cancelSrc					: "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/cancel.ico",
		openSrc 					: "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/open.ico",
		paidSrc 					: "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/paid.ico",
		partialyPaidSrc 			: "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/partialy_paid.ico",
		usedSrc 					: "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/used.ico",
		receivedSrc 				: "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/received.ico",
		deliveredSrc 				: "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/delivered.ico",
		successMessage 				: "Saved Successful!",
		errorMessage 				: "Warning, please review it again!",
		confirmMessage 				: "Are you sure, you want to delete it?",
		requiredMessage 			: "Required",
		duplicateNumber 			: "Duplicate Number!",
		duplicateInvoice 			: "Duplicate Invoice!",
		selectCustomerMessage 		: "Please select a customer.",
		selectSupplierMessage 		: "Please select a supplier.",
		selectItemMessage 			: "Please select an item.",
		duplicateMeasurementMessage	: "Sorry, you can not use the same measurement.",
		duplicateSelectedItemMessage: "You already selected this item.",
		testDS						: dataStore(apiUrl + "item_locations/test"),
		employee 					: [],
		pageLoad 					: function(){
			this.setEmployeeByUser();
			this.loadAccounts();
			this.accountTypeDS.read();
			this.taxTypeDS.read();
			this.loadTaxes();
			this.loadJobs();
			this.loadSegmentItems();
			this.loadCurrencies();
			this.loadRates();
			this.loadPrefixes();
			this.loadTxnTemplates();

			this.loadCategories();
			this.loadItemGroups();
			this.loadItems();
			this.itemTypeDS.read();
			this.loadItemPrices();
			this.loadMeasurements();

			this.loadContactTypes();
		},
		setEmployeeByUser 			: function(){
			var self = this;

			this.employeeUserDS.query({
				filter: { field:"user_id", value:banhji.source.user_id }
			}).then(function(){
				var view = self.employeeUserDS.view();

				if(view.length>0){
					self.set("employee", view[0]);
				}
			});
		},
		checkAccessModule 			: function(moduleName){
			banhji.accessMod.query({
				filter: {field: 'username', value: JSON.parse(localStorage.getItem('userData/user')).username}
			}).then(function(e){
				var allowed = false;
				if(banhji.accessMod.data().length > 0) {
					for(var i = 0; i < banhji.accessMod.data().length; i++) {
						if(moduleName.toLowerCase() == banhji.accessMod.data()[i].name.toLowerCase()) {
							allowed = true;
							break;
						}
					}
				}
				return allowed;
			});
		},
		getFiscalDate 				: function(){
			var today = new Date(),	
			fDate = new Date(today.getFullYear() +"-"+ banhji.institute.fiscal_date);

			if(today < fDate){
				fDate.setFullYear(today.getFullYear()-1);
			}		

			return fDate;
		},
		loadPrefixes 				: function(){
			var self = this, raw = this.get("prefixList");

			//Clear array
			if(raw.length>0){
				raw.splice(0,raw.length);
			}

			this.prefixDS.query({
				filter: [],
			}).then(function(){
				var view = self.prefixDS.view();

				$.each(view, function(index, value){
					raw.push(value);
				});
			});
		},
		loadTxnTemplates 			: function(){
			var self = this, raw = this.get("txnTemplateList");

			//Clear array
			if(raw.length>0){
				raw.splice(0,raw.length);
			}

			this.txnTemplateDS.query({
				filter:[]
			}).then(function(){
				var view = self.txnTemplateDS.view();

				$.each(view, function(index, value){
					raw.push(value);
				});
			});
		},
		loadCurrencies 				: function(){
			var self = this, raw = this.get("currencyList");

			//Clear array
			if(raw.length>0){
				raw.splice(0,raw.length);
			}

			this.currencyDS.query({
				filter:[]
			}).then(function(){
				var view = self.currencyDS.view();

				$.each(view, function(index, value){
					raw.push(value);
				});
			});
		},
		loadRates 					: function(){
			this.currencyRateDS.query({
				filter:[],
				sort:{ field:"date", dir:"desc"}
			});
		},
		getRate						: function(locale, date){
			var rate = 0, lastRate = 1;
			$.each(this.currencyRateDS.data(), function(index, value){
				if(value.locale == locale){
					lastRate = kendo.parseFloat(value.rate);

					if(date >= new Date(value.date)){
						rate = kendo.parseFloat(value.rate);

						return false;
					}
				}
			});

			//If no rate, use the last rate
			if(rate==0){
				rate = lastRate;
			}

			return rate;
		},
		loadTaxes 					: function(){
			var self = this, raw = this.get("taxList");

			//Clear array
			if(raw.length>0){
				raw.splice(0,raw.length);
			}

			this.taxItemDS.query({
				filter:[]
			}).then(function(){
				var view = self.taxItemDS.view();

				$.each(view, function(index, value){
					raw.push(value);
				});
			});
		},
		checkWHT 					: function(tax_type_id){
			var result = false,
				types = this.taxTypeDS.get(tax_type_id);

			if(types.sub_of_id==12){
				result = true;
			}

			return result;
		},
		loadJobs 					: function(){
			var self = this, raw = this.get("jobList");

			//Clear array
			if(raw.length>0){
				raw.splice(0,raw.length);
			}

			this.jobDS.query({
				filter:[]
			}).then(function(){
				var view = self.jobDS.view();

				$.each(view, function(index, value){
					raw.push(value);
				});
			});
		},
		loadSegmentItems 			: function(){
			var self = this, raw = this.get("segmentItemList");

			//Clear array
			if(raw.length>0){
				raw.splice(0,raw.length);
			}

			this.segmentItemDS.query({
				filter:{ field:"segment_id >", value: 0 }
			}).then(function(){
				var view = self.segmentItemDS.view();

				$.each(view, function(index, value){
					raw.push(value);
				});
			});
		},
		loadAccounts 				: function(){
			var self = this, raw = this.get("accountList");

			//Clear array
			if(raw.length>0){
				raw.splice(0,raw.length);
			}

			this.accountDS.query({
				filter: { field:"status", value:1 },
				sort: [
				  	{ field: "account_type_id", dir: "asc" },
				  	{ field: "number", dir: "asc" }
				]
			}).then(function(){
				var view = self.accountDS.view();

				$.each(view, function(index, value){
					raw.push(value);
				});
			});
		},
		loadCategories 				: function(){
			var self = this, raw = this.get("categoryList");

			//Clear array
			if(raw.length>0){
				raw.splice(0,raw.length);
			}

			this.categoryDS.query({
				filter:[]
			}).then(function(){
				var view = self.categoryDS.view();

				$.each(view, function(index, value){
					raw.push(value);
				});
			});
		},
		loadItemGroups 				: function(){
			var self = this, raw = this.get("itemGroupList");

			//Clear array
			if(raw.length>0){
				raw.splice(0,raw.length);
			}

			this.itemGroupDS.query({
				filter:[]
			}).then(function(){
				var view = self.itemGroupDS.view();

				$.each(view, function(index, value){
					raw.push(value);
				});
			});
		},
		loadItems 					: function(){
			var self = this, raw = this.get("itemList");

			//Clear array
			if(raw.length>0){
				raw.splice(0,raw.length);
			}

			this.itemDS.query({
				filter:{ field:"status", value:1 }
			}).then(function(){
				var view = self.itemDS.view();

				$.each(view, function(index, value){
					raw.push(value);
				});
			});
		},
		loadItemPrices 				: function(){
			var self = this, raw = this.get("itemPriceList");

			//Clear array
			if(raw.length>0){
				raw.splice(0,raw.length);
			}

			this.itemPriceDS.query({
				filter:[
					{ field:"assembly_id", value:0 },
					{ field:"status", operator:"where_related_item", value:1 }
				]
			}).then(function(){
				var view = self.itemPriceDS.view();

				$.each(view, function(index, value){
					raw.push(value);
				});
			});
		},
		loadMeasurements 			: function(){
			var self = this, raw = this.get("measurementList");

			//Clear array
			if(raw.length>0){
				raw.splice(0,raw.length);
			}

			this.measurementDS.query({
				filter:[],
			}).then(function(){
				var view = self.measurementDS.view();

				$.each(view, function(index, value){
					raw.push(value);
				});
			});
		},
		loadContactTypes			: function(){
			var self = this, raw = this.get("contactTypeList");

			//Clear array
			if(raw.length>0){
				raw.splice(0,raw.length);
			}

			this.contactTypeDS.query({
				filter:[]
			}).then(function(){
				var view = self.contactTypeDS.view();

				$.each(view, function(index, value){
					raw.push(value);
				});
			});
		},
		getPaymentTerm 				: function(id){
			var data = this.paymentTermDS.get(id);
			return data.name;
		},
		getPrefixAbbr 				: function(type){
			var abbr = "";
			$.each(this.prefixList, function(index, value){
				if(value.type==type){
					abbr = value.abbr;

					return false;
				}
			});

			return abbr;
		},
		getCurrencyCode 			: function(locale){
			var code = "";

			$.each(this.currencyDS.data(), function(index, value){
				if(value.locale==locale){
					code = value.code;

					return false;
				}
			});

			return code;
		},
		getPriceList 				: function(id){
			var priceList = [],
				item = this.itemDS.get(id),
				measurement = this.measurementDS.get(item.measurement_id);

			$.each(this.itemPriceList, function(index, value){
				if(value.item_id==id){
					priceList.push(value);
				}
			});

			return priceList;
		}
	});
	
	/*************************************************
	*   HOME PAGE MVVM		  						 *
	*************************************************/
	banhji.index = kendo.observable({
		lang 				: langVM,
		dataSource			: dataStore(apiUrl+"accounting_modules/apar"),
		summaryDS			: dataStore(apiUrl+"accounting_modules/financial_snapshot"),
		graphDS 			: dataStore(apiUrl+"cash_modules/cash_in_out"),
		modules 			: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + 'admin/modules',
					type: "GET",
					dataType: 'json'
				},
				create 	: {
					url: apiUrl + 'admin/modules',
					type: "POST",
					dataType: 'json'
				},
				update 	: {
					url: apiUrl + 'admin/modules',
					type: "PUT",
					dataType: 'json'
				},
				destroy : {
					url: apiUrl + 'admin/modules',
					type: "DELETE",
					dataType: 'json'
				},
				parameterMap: function(options, operation) {
					if(operation === 'read') {
						return {
							limit: options.pageSize,
							page: options.page,
							filter: options.filter
						};
					} else {
						return {models: kendo.stringify(options.models)};
					}
				}
			},
			schema 	: {
				model: {
					id: 'id'
				},
				data: 'results',
				total: 'count'
			},
			batch: true,
			serverFiltering: true,
			serverPaging: true,
			// pageSize: 100
		}),
		companyInf 			: function() {
			var company = JSON.parse(localStorage.getItem('userData/user'));
			return company;
		},
		getLogo   			: function() {
			banhji.companyDS.fetch(function(){
				if(banhji.companyDS.data().length > 0) {
					banhji.index.set('companyLogo', banhji.companyDS.data()[0].logo);
				}
			});
		},
		obj 				: {},
		today 				: new Date(),
		companyName 		: null,
		companyLogo 		: "",
		pageLoad 			: function(){
			
		},
		setObj 		: function(){
			this.set("obj", {
				//AR
				ar 					: 0,
				ar_open 			: 0,
				ar_customer 		: 0,
				ar_overdue 			: 0,
				//AP
				ap 					: 0,
				ap_open 			: 0,
				ap_vendor 			: 0,
				ap_overdue 			: 0,
				//Performance
				income 				: 0,
				expense 			: 0,
				net_income 			: 0,
				//Position
				asset 				: 0,
				liability 	 		: 0,
				equity 	 			: 0
			});
		},
		loadData 			: function(){
			var self = this, obj = this.get("obj");

			this.graphDS.read();

			this.dataSource.query({
				filter: [],
				page: 1,
				pageSize: 5
			}).then(function(){
				var view = self.dataSource.view();
				
				obj.set("ar", kendo.toString(view[0].ar, banhji.locale=="km-KH"?"c0":"c2", banhji.locale));
				obj.set("ar_open", kendo.toString(view[0].ar_open, "n0"));
				obj.set("ar_customer", kendo.toString(view[0].ar_customer, "n0"));
				obj.set("ar_overdue", kendo.toString(view[0].ar_overdue, "n0"));

				obj.set("ap", kendo.toString(view[0].ap, banhji.locale=="km-KH"?"c0":"c2", banhji.locale));
				obj.set("ap_open", kendo.toString(view[0].ap_open, "n0"));
				obj.set("ap_vendor", kendo.toString(view[0].ap_vendor, "n0"));
				obj.set("ap_overdue", kendo.toString(view[0].ap_overdue, "n0"));
			});

			this.summaryDS.query({
				filter: [],
				page: 1,
				pageSize: 5
			}).then(function(){
				var view = self.summaryDS.view();
				
				obj.set("income", kendo.toString(view[0].income, banhji.locale=="km-KH"?"c0":"c2", banhji.locale));
				obj.set("expense", kendo.toString(view[0].expense, banhji.locale=="km-KH"?"c0":"c2", banhji.locale));
				obj.set("net_income", kendo.toString(view[0].net_income, banhji.locale=="km-KH"?"c0":"c2", banhji.locale));
				
				obj.set("asset", kendo.toString(view[0].asset, banhji.locale=="km-KH"?"c0":"c2", banhji.locale));
				obj.set("liability", kendo.toString(view[0].liability, banhji.locale=="km-KH"?"c0":"c2", banhji.locale));
				obj.set("equity", kendo.toString(view[0].equity, banhji.locale=="km-KH"?"c0":"c2", banhji.locale));
			});
		}
	});
	banhji.searchAdvanced = kendo.observable({
    	lang 				: langVM,
    	contactDS 			: dataStore(apiUrl+"contacts"),
    	contactTypeDS 		: dataStore(apiUrl+"contacts/type"),
    	transactionDS 		: dataStore(apiUrl+"transactions"),
    	itemDS 				: dataStore(apiUrl+"items"),
    	accountDS 			: dataStore(apiUrl+"accounts"),
    	searchType 			: "",
    	searchText 			: "",
    	found 				: 0,
    	pageLoad 			: function(){
		},
		search 				: function(){
			var self = this, 
			searchText = this.get("searchText");
			this.set("found", 0);

			if(searchText){
				this.contactDS.query({
					filter:[
						{ field:"number", operator:"like", value: searchText },
						{ field:"surname", operator:"or_like", value: searchText },
						{ field:"name", operator:"or_like", value: searchText },
						{ field:"company", operator:"or_like", value: searchText }
					],
					page:1,
					pageSize: 10
				}).then(function(){
					var found = self.get("found") + self.contactDS.total();
					self.set("found", found);
				});

				this.transactionDS.query({
					filter:[
						{ field:"number", operator:"like", value: searchText }
					],
					page:1,
					pageSize: 10
				}).then(function(){
					var found = self.get("found") + self.transactionDS.total();
					self.set("found", found);
				});

				this.itemDS.query({
					filter:[
						{ field:"number", operator:"like", value: searchText },
						{ field:"name", operator:"or_like", value: searchText }
					],
					page:1,
					pageSize: 10
				}).then(function(){
					var found = self.get("found") + self.itemDS.total();
					self.set("found", found);
				});

				this.accountDS.query({
					filter:[
						{ field:"number", operator:"like", value: searchText },
						{ field:"name", operator:"or_like", value: searchText }
					],
					page:1,
					pageSize: 10
				}).then(function(){
					var found = self.get("found") + self.accountDS.total();
					self.set("found", found);
				});
			}
		},
		selectedContact 	: function(e){
			e.preventDefault();

			var data = e.data, 
			type = this.contactTypeDS.get(data.contact_type_id);
			
			if(type.parent_id==1){
				banhji.customerCenter.loadContact(data.id);
				banhji.router.navigate('/customer_center', false);
			}else{
				banhji.vendorCenter.loadContact(data.id);
				banhji.router.navigate('/vendor_center', false);
			}
		},
		selectedTransaction : function(e){
			e.preventDefault();

			var data = e.data;
			banhji.router.navigate('/'+data.type.toLowerCase()+'/'+data.id);
		},
		selectedItem 		: function(e){
			e.preventDefault();

			var data = e.data;
			banhji.router.navigate('/item_center/'+e.data.id);
		},
		selectedAccount 		: function(e){
			e.preventDefault();

			var data = e.data;
			banhji.router.navigate('/accounting_center/'+e.data.id);
		}
    });


	banhji.saleCenter = kendo.observable({
		lang 				: langVM,
		transactionDS  		: dataStore(apiUrl + 'transactions'),
		contactDS			: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + "contacts",
					type: "GET",
					headers: banhji.header,
					dataType: 'json'
				},				
				parameterMap: function(options, operation) {
					if(operation === 'read') {
						return {
							page: options.page,
							limit: options.pageSize,
							filter: options.filter,
							sort: options.sort
						};
					} else {
						return {models: kendo.stringify(options.models)};
					}
				}
			},
			schema 	: {
				model: {
					id: 'id'
				},
				data: 'results',
				total: 'count'
			},
			filter:{ field:"assignee_id", operator:"by_user_id", value:banhji.source.user_id },
			sort:{ field:"number", dir:"asc" },
			batch: true,
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page:1,
			pageSize: 100
		}),
		contactTypeDS 		: new kendo.data.DataSource({
		  	data: banhji.source.contactTypeList,
		  	filter: { field:"parent_id", value: 1 }//Customer
		}),
		noteDS 				: dataStore(apiUrl + 'notes'),
		attachmentDS	 	: dataStore(apiUrl + "attachments"),
		summaryDS 			: dataStore(apiUrl + "transactions"),
		txnDS 				: dataStore(apiUrl + "transactions"),
		sortList			: banhji.source.sortList,
		sorter 				: "all",
		sdate 				: "",
		edate 				: "",
		obj 				: {id:0},
		note 				: "",
		searchText 			: "",
		contact_type_id 	: null,
		currency_id 		: 0,
		quote 				: 0,
		so 					: 0,
		currencyCode 		: "",
		pageLoad 			: function(id){
			if(id){
				this.loadObj(id);
			}

			//Refresh
			if(this.contactDS.total()>0){
				this.contactDS.fetch();
				this.searchTransaction();
				this.loadSummary();
			}
		},
		sorterChanges 		: function(){
	        var today = new Date(),
        	sdate = "",
        	edate = "",
        	sorter = this.get("sorter");
        	
			switch(sorter){
				case "today":								
					this.set("sdate", today);
					this.set("edate", "");
													  					
				  	break;
				case "week":			  	
					var first = today.getDate() - today.getDay(),
					last = first + 6;

					this.set("sdate", new Date(today.setDate(first)));
					this.set("edate", new Date(today.setDate(last)));						
					
				  	break;
				case "month":							  	
					this.set("sdate", new Date(today.getFullYear(), today.getMonth(), 1));
					this.set("edate", new Date(today.getFullYear(), today.getMonth() + 1, 0));

				  	break;
				case "year":				
				  	this.set("sdate", new Date(today.getFullYear(), 0, 1));
				  	this.set("edate", new Date(today.getFullYear(), 11, 31));

				  	break;
				default:
					this.set("sdate", "");
				  	this.set("edate", "");									  
			}
		},
		setCurrencyCode 	: function(){
			var code = "", obj = this.get("obj");

			$.each(banhji.source.currencyDS.data(), function(index, value){				
				if(value.locale == obj.locale){
					code = value.code;					

					return false;					
				}
			});

			this.set("currencyCode", code);
		},
		loadObj 			: function(id){
			var self = this;

			this.contactDS.query({
				filter: { field:"id", value:id},
				page:1,
				pageSize:100
			}).then(function(){
				var view = self.contactDS.view();

				if(view.length>0){
					self.set("obj", view[0]);
					self.loadData();
				}
			});
		},
		loadData 			: function(){
			var obj = this.get("obj");

			this.searchTransaction();
			this.loadSummary(obj.id);
			this.setCurrencyCode();

			this.attachmentDS.filter({ field:"contact_id", value: obj.id });
			this.noteDS.query({
				filter: { field:"contact_id", value: obj.id },
				sort: { field:"noted_date", dir:"desc" },
				page: 1,
				pageSize: 10
			});
		},
		//Upload
		onSelect 			: function(e){
	        // Array with information about the uploaded files
	        var self = this, 
	        files = e.files,
	        obj = this.get("obj");
			
			if(obj!==null){
		        // Check the extension of each file and abort the upload if it is not .jpg
		        $.each(files, function(index, value){
		            if (value.extension.toLowerCase() === ".jpg"
		            	|| value.extension.toLowerCase() === ".jpeg"
		            	|| value.extension.toLowerCase() === ".tiff"
		            	|| value.extension.toLowerCase() === ".png" 
		            	|| value.extension.toLowerCase() === ".gif"
		            	|| value.extension.toLowerCase() === ".pdf"){

		            	var key = 'ATTACH_' + banhji.institute.id + "_" + Math.floor(Math.random() * 100000000000000001) +'_'+ value.name;

		            	self.attachmentDS.add({
		            		user_id 		: self.get("user_id"),
		            		contact_id 		: obj.id,
		            		type 			: "Contact",
		            		name 			: value.name,
		            		description 	: "",
		            		key 			: key,
		            		url 			: banhji.s3 + key,
		            		size 			: value.size,
		            		created_at 		: new Date(),
		            		file 			: value.rawFile
		            	});
		            }else{
		            	alert("This type of file is not allowed to attach.");
		            }
		        });
	    	}
	    },
	    removeFile 			: function(e){
	    	var data = e.data;

	    	if (confirm(banhji.source.confirmMessage)) {
	    		this.attachmentDS.remove(data);
	    		this.attachmentDS.sync();
	    	}	    	
	    },
	    uploadFile 			: function(){
	    	$.each(this.attachmentDS.data(), function(index, value){	    		
		    	if(!value.id){
			    	var params = { 
		            	Body: value.file, 
		            	Key: value.key 
		            };
		            bucket.upload(params, function (err, data) {		                
	                	// console.log(err, data);
	                	// var url = data.Location;                
	            	});
            	}	            
            });

            this.attachmentDS.sync();
            var saved = false;
            this.attachmentDS.bind("requestEnd", function(e){
            	//Delete File
            	if(e.type=="destroy"){
	            	if(saved==false && e.response){
	            		saved = true;
	            	
	            		var response = e.response.results;
	            		$.each(response, function(index, value){            			
		            		var params = {
							  	//Bucket: 'STRING_VALUE', /* required */
							 	Delete: { /* required */
								    Objects: [ /* required */
								      	{
									        Key: value.data.key /* required */
								      	}
								      /* more items */
								    ]
							  	}
							};
							bucket.deleteObjects(params, function(err, data) {
							  	//console.log(err, data);
							});
						});
	            	}
            	}
            });
	    },
	    //Summary
		loadContact 		: function(id){
			var self = this;
			
			this.contactDS.query({
			  	filter:[
			  		{ field:"id", value:id }
			  	],
			  	page: 1,
			  	pageSize: 50
			}).then(function(e) {
			    var view = self.contactDS.data();
			    
			    if(view.length>0){
			    	self.set("obj", view[0]);
			    	self.loadData();
			    }
			});
		},
		loadSummary 		: function(id){
			var self = this, obj = this.get("obj");

			this.summaryDS.query({
			  	filter: [
			  		{ field:"contact_id", value: obj.id },
			  		{ field:"type", operator:"where_in", value: ["Quote","Sale_Order"] },
			  		{ field:"status", value: 0 }
			  	],
			  	sort: { field: "issued_date", dir: "desc" },
			  	page: 1,
			  	pageSize: 1000
			}).then(function(){
				var view = self.summaryDS.view(),
				quote = 0, so = 0;

				$.each(view, function(index, value){
					if(value.type=="Quote"){
						quote++;
					}else{
						so++;
					}									
				});
				
				self.set("quote", kendo.toString(quote, "n0"));
				self.set("so", kendo.toString(so, "n0"));
			});
		},
		loadQuote 			: function(){
			var obj = this.get("obj");

			this.transactionDS.query({
			  	filter: [
			  		{ field:"contact_id", value: obj.id },
			  		{ field:"type", value:"Quote" },
			  		{ field:"status", value: 0 }
			  	],
			  	sort: [
			  		{ field: "issued_date", dir: "desc" },
			  		{ field: "id", dir: "desc" }
			  	],
			  	page: 1,
			  	pageSize: 10
			});
		},
		loadSO 				: function(){
			var obj = this.get("obj");

			this.transactionDS.query({
			  	filter: [
			  		{ field:"contact_id", value: obj.id },
			  		{ field:"type", value:"Sale_Order" }
			  	],
			  	sort: [
			  		{ field: "issued_date", dir: "desc" },
			  		{ field: "id", dir: "desc" }
			  	],
			  	page: 1,
			  	pageSize: 10
			});
		},
		selectedRow			: function(e){
			var data = e.data;
			
			this.set("obj", data);
			this.loadData();
		},
		//Search
		search 				: function(){
			var self = this, 
			para = [],
      		searchText = this.get("searchText"),
      		contact_type_id = this.get("contact_type_id");
      		
      		if(searchText){
      			var textParts = searchText.replace(/([a-z]+)/i, "$1 ").split(/[^0-9a-z]+/ig);

      			para.push(
      				{ field: "abbr", value: textParts[0] },
      				{ field: "number", value: textParts[1] },
					{ field: "name", operator: "or_like", value: searchText }
      			);
      		}

      		if(contact_type_id){
      			para.push({ field: "contact_type_id", value: contact_type_id });
      		}else{
      			para.push({ field: "parent_id", operator:"where_related_contact_type", value: 1 });
      		}

      		para.push({ field:"assignee_id", operator:"by_user_id", value:banhji.source.user_id });

      		this.contactDS.filter(para);
			
			//Clear search filters
      		self.set("searchText", "");
      		self.set("contact_type_id", 0);
		},
		searchTransaction	: function(){
			var self = this,
				start = kendo.toString(this.get("sdate"), "yyyy-MM-dd"),
        		end = kendo.toString(this.get("edate"), "yyyy-MM-dd"),
        		para = [], obj = this.get("obj");

        	if(obj!==null){
        		para.push({ field:"contact_id", value: obj.id });
        	
	        	//Dates
	        	if(start && end){
	            	para.push({ field:"issued_date >=", value: start });
	            	para.push({ field:"issued_date <=", value: end });
	            }else if(start){
	            	para.push({ field:"issued_date", value: start });
	            }else if(end){
	            	para.push({ field:"issued_date <=", value: end });
	            }else{
	            	
	            }

	            para.push({ field:"employee_id", value: banhji.source.get("employee").id });
	            para.push({ field:"type", operator:"where_in", value: ["Quote","Sale_Order","Customer_Deposit"] });

	            this.transactionDS.query({
	            	filter: para,
	            	sort: [
				  		{ field: "issued_date", dir: "desc" },
				  		{ field: "id", dir: "desc" }
				  	],
	            	page: 1,
	            	pageSize: 10
	            });
	        }            
		},
		//Links	
		goEdit 		 		: function(){
			var obj = this.get("obj");

			if(obj!==null){
				banhji.router.navigate('/customer/'+obj.id);
			}
		},
		goReference 		: function(e){
			var self = this, data = e.data;

			this.txnDS.query({
				filter:{ field:"id", value:data.reference_id}
			}).then(function(){
				var view = self.txnDS.view();

				banhji.router.navigate('/' + view[0].type.toLowerCase() +'/'+ data.reference_id);
			});
		},
		goQuote				: function(){
			var obj = this.get("obj");

			if(obj!==null){
				banhji.router.navigate('/quote');
				banhji.quote.setContact(obj);
			}
		},
		goDeposit			: function(){
			var obj = this.get("obj");

			if(obj!==null){
				banhji.router.navigate('/customer_deposit');
				banhji.customerDeposit.setContact(obj);
			}
		},
		goSaleOrder			: function(){
			var obj = this.get("obj");

			if(obj!==null){
				banhji.router.navigate('/sale_order');
				banhji.saleOrder.setContact(obj);
			}
		},
		goCashSale			: function(){
			var obj = this.get("obj");

			if(obj!==null){
				banhji.router.navigate('/cash_sale');
				banhji.cashSale.setContact(obj);
			}
		},
		//Note
		saveNoteEnter 		: function(e){
			e.preventDefault();
			this.saveNote();
		},
		saveNote 			: function(){
			var obj = this.get("obj");

			if(obj!==null && this.get("note")!==""){
				this.noteDS.insert(0, {
					contact_id 	: obj.id,
					note 		: this.get("note"),
					noted_date	: new Date(),
					created_by 	: this.get("user_id"),

					creator 	: ""
				});

				this.noteDS.sync();
				this.set("note", "");					
			}else{
				alert("Please select a customer and Memo is required");
			}
		}
	});
	banhji.customer = kendo.observable({
		lang 					: langVM,
		dataSource 				: dataStore(apiUrl + "contacts"),
		patternDS 				: dataStore(apiUrl + "contacts"),
		numberDS 				: dataStore(apiUrl + "contacts"),
		deleteDS 				: dataStore(apiUrl + "transactions"),
		existingDS 				: dataStore(apiUrl + "contacts"),
		contactPersonDS			: dataStore(apiUrl + "contact_persons"),
		contactAssigneeDS		: dataStore(apiUrl + "contact_assignees"),
		paymentTermDS			: banhji.source.paymentTermDS,
		paymentMethodDS			: banhji.source.paymentMethodDS,
		countryDS 				: banhji.source.countryDS,
		currencyDS  			: new kendo.data.DataSource({
		  	data: banhji.source.currencyList,
		  	filter: { field:"status", value: 1 }
		}),
		contactTypeDS 			: new kendo.data.DataSource({
		  	data: banhji.source.contactTypeList,
		  	filter: { field:"parent_id", value: 1 }//Customer
		}),
		arDS 		  			: new kendo.data.DataSource({
		  	data: banhji.source.accountList,
		  	filter: { field:"account_type_id", value: 12 },
		  	sort: { field:"number", dir:"asc" }
		}),
		raDS 		  			: new kendo.data.DataSource({
		  	data: banhji.source.accountList,
		  	filter:{
	      		logic: "or",
			    filters: [
			      	{ field: "account_type_id", value: 35 },
		      		{ field: "account_type_id", value: 39 }
			    ]
			},
			sort: { field:"number", dir:"asc" }
		}),
		depositDS 		  		: new kendo.data.DataSource({
		  	data: banhji.source.accountList,
		  	filter: {
	      		logic: "or",
			    filters: [
			      	{ field: "account_type_id", value: 25 },
	      			{ field: "account_type_id", value: 30 }
			    ]
			},
			sort: { field:"number", dir:"asc" }
		}),
		tradeDiscountDS 		: new kendo.data.DataSource({
		  	data: banhji.source.accountList,
		  	filter: { field:"id", value: 72 },
		  	sort: { field:"number", dir:"asc" }
		}),
		settlementDiscountDS 	: new kendo.data.DataSource({
		  	data: banhji.source.accountList,
		  	// filter: { field:"id", value: 99 },
		  	filter: {
	      		logic: "or",
			    filters: [
			      	{ field: "account_type_id", value: 36 },
	      			{ field: "account_type_id", value: 37 },
	      			{ field: "account_type_id", value: 38 },
	      			{ field: "account_type_id", value: 40 },
	      			{ field: "account_type_id", value: 41 },
	      			{ field: "account_type_id", value: 42 },
	      			{ field: "account_type_id", value: 43 }
			    ]
			},
		  	sort: { field:"number", dir:"asc" }
		}),
		taxItemDS 				: new kendo.data.DataSource({
		  	data: banhji.source.taxList,
		  	filter:{
			    logic: "or",
			    filters: [
			      	{ field: "tax_type_id", value: 3 },//Customer Tax
			      	{ field: "tax_type_id", value: 9 }
			    ]
			},
		  	sort: [
			  	{ field: "tax_type_id", dir: "asc" },
			  	{ field: "name", dir: "asc" }
			]
		}),
		genders					: banhji.source.genderList,
		statusList 				: banhji.source.statusList,
		confirmMessage 			: banhji.source.confirmMessage,
		isEdit 					: false,
		isProtected 			: false,
        obj 					: null,
        saveClose 				: false,
		showConfirm 			: false,
		notDuplicateNumber 		: true,
		phFullname 				: "Customer Name ...",
		contact_type_id 		: 0,
		pageLoad 				: function(id, contact_type_id){
			if(id){
				this.set("isEdit", true);
				this.loadObj(id, contact_type_id);
			}else{
				if(this.get("isEdit") || this.dataSource.total()==0){
					this.addEmpty();
				}
			}	
		},
		//Contact Person
		addEmptyContactPerson 	: function(){
			var obj = this.get("obj");
			
			this.contactPersonDS.add({
				contact_id 			: obj.id,
      			prefix 				: "",
				name 				: "",
				department			: "",
				phone				: "",
				email				: ""
			});
		},
		deleteContactPerson 	: function(e){
			if (confirm("Are you sure, you want to delete it?")) {
				var d = e.data,
				obj = this.contactPersonDS.getByUid(d.uid);

				this.contactPersonDS.remove(obj);
			}
		},
		//Map
		loadMap 				: function(){
			var obj = this.get("obj"), lat = kendo.parseFloat(obj.latitute),
			lng = kendo.parseFloat(obj.longtitute);
			
			if(lat && lng){
				var myLatLng = {lat:lat, lng:lng};
				var mapOptions = {
					zoom: 17,
					center: myLatLng,
					mapTypeControl: false,
					zoomControl: false,
					scaleControl: false,
					streetViewControl: false
				};
				var map = new google.maps.Map(document.getElementById('map'),mapOptions);
				var marker = new google.maps.Marker({
					position: myLatLng,
					map: map,
					title: obj.number
				});
			} 
		},
		copyBillTo 				: function(){
			var obj = this.get("obj");

			obj.set("ship_to", obj.bill_to);
		},
		//Number      	
		checkExistingNumber 	: function(){
			var self = this, para = [], 
			obj = this.get("obj");
			
			if(obj.number!==""){

				if(obj.isNew()==false){
					para.push({ field:"id", operator:"where_not_in", value: [obj.id] });
				}

				para.push({ field:"abbr", value: obj.abbr });
				para.push({ field:"number", value: obj.number });
				para.push({ field:"contact_type_id", value: obj.contact_type_id });
				
				this.existingDS.query({
					filter: para,
					page: 1,
					pageSize: 1
				}).then(function(e){
					var view = self.existingDS.view();
					
					if(view.length>0){
				 		self.set("notDuplicateNumber", false);
					}else{
						self.set("notDuplicateNumber", true);
					}
				});
			}
		},
		generateNumber 			: function(){
			var self = this, obj = this.get("obj");

			this.numberDS.query({
				filter:[
					{ field:"contact_type_id", value:obj.contact_type_id }
				],
				sort: { field:"number", dir:"desc" },
				page:1,
				pageSize:1
			}).then(function(){
				var view = self.numberDS.view();

				var lastNo = 0;
				if(view.length>0){
					lastNo = kendo.parseInt(view[0].number);
				}
				lastNo++;
				obj.set("number",kendo.toString(lastNo, "00000"));
			});
		},
		checkExistingTxn		: function(){
			var self = this, obj = this.get("obj");
			
			this.deleteDS.query({
				filter: { field:"contact_id", value: obj.id },
				page: 1,
				pageSize: 1
			}).then(function(e){
				var view = self.deleteDS.view();
				
				if(view.length>0){
					self.set("isProtected", true);
				}else{
					self.set("isProtected", false);
				}
			});
		},
		//Obj
		loadObj 				: function(id, contact_type_id){
			var self = this, para = [];

			if(id>0){
				para.push({ field:"id", value: id });
			}

			if(contact_type_id){
				para.push({ field:"contact_type_id", value: contact_type_id });
				para.push({ field:"is_pattern", value: 1 });
			}

			this.dataSource.query({
				filter: para,
				page: 1,
				pageSize: 100
			}).then(function(e){
				var view = self.dataSource.view();
				
				self.set("obj", view[0]);
				self.loadMap();
				self.checkExistingTxn();
			});

			this.contactPersonDS.filter({ field:"contact_id", value: id });
		},
      	addEmpty 				: function(){
      		this.dataSource.data([]);
      		this.contactPersonDS.data([]);
      		
      		this.set("isEdit", false);
      		this.set("isProtected", false);
      		this.set("notDuplicateNumber", true);
      		this.set("obj", null);
      		
  			this.dataSource.insert(0, {
				"country_id" 			: 0,
				"user_id" 				: 0,
				"contact_type_id" 		: 4, //General Customer
				"abbr"					: "",
				"number"				: "",
				"surname"				: "",
				"name"					: "",
				"gender"				: "",
				"phone" 				: "",
				"email" 				: "",
				"company"				: "",
				"vat_no"				: "",
				"memo"					: "",
				"city"					: "",
				"post_code"				: "",
				"address" 				: "",
				"bill_to" 				: "",
				"ship_to" 				: "",
				"latitute" 				: "",
				"longtitute" 			: "",
				"credit_limit"			: 0,
				"locale" 				: banhji.locale,
				"invoice_note" 			: "",
				"payment_term_id"		: 0,
				"payment_method_id"		: 0,
				"registered_date" 		: new Date(),
				"account_id"			: 0,
				"ra_id"					: 0,
				"tax_item_id"			: 0,
				"deposit_account_id"	: 0,
				"trade_discount_id"		: 0,
				"settlement_discount_id": 0,
				"is_pattern" 			: 0,
				"status"				: 1
			});

			var obj = this.dataSource.at(0);
			this.set("obj", obj);
			this.typeChanges();
		},
	    objSync 				: function(){
	    	var dfd = $.Deferred();

	    	this.dataSource.sync();
		    this.dataSource.bind("requestEnd", function(e){
		    	if(e.response){
					dfd.resolve(e.response.results);
				}
		    });
		    this.dataSource.bind("error", function(e){
				dfd.reject(e.errorThrown);
		    });

		    return dfd;
	    },
		save 					: function(){
			var self = this, obj = this.get("obj");

			//Edit Mode
	    	if(this.get("isEdit")){
	    		//Contact Person has changes
		    	if(this.contactPersonDS.hasChanges()){
		    		obj.set("dirty", true);
		    	}
	    	}

			//Save Obj
			this.objSync()
			.then(function(data){ //Success
				if(self.get("isEdit")==false){
					//Contact Person
					$.each(self.contactPersonDS.data(), function(index, value) {
						value.set("contact_id", data[0].id);
					});

					self.addAssignee(data[0].id);
				}
				self.contactPersonDS.sync();
				
				return data;
			}, function(reason) { //Error
				$("#ntf1").data("kendoNotification").error(reason);
			}).then(function(result){
				$("#ntf1").data("kendoNotification").success(banhji.source.successMessage);

				if(self.get("saveClose")){
					//Save Close
					self.set("saveClose", false);
					self.cancel();
					window.history.back();
				}else{
					//Save New
					self.addEmpty();
				}
			});
		},
		cancel 					: function(){
			this.dataSource.cancelChanges();
			this.contactPersonDS.cancelChanges();
			this.dataSource.data([]);
			this.contactPersonDS.data([]);
			this.set("contact_type_id", 0);

			banhji.userManagement.removeMultiTask("customer");
		},
		delete 					: function(){
			var obj = this.get("obj");
			this.set("showConfirm",false);

			if(!obj.is_system==1){
				if(this.get("isProtected")){
					alert("Sorry, this data is protected!");
				}else{
					obj.set("deleted", 1);
			        this.dataSource.sync();
			        banhji.source.customerDS.fetch();

			        window.history.back();
				}
			}	
		},
		openConfirm 			: function(){
			this.set("showConfirm", true);
		},
		closeConfirm 			: function(){
			this.set("showConfirm", false);
		},
		//Assignee
		addAssignee 			: function(id){
			var self = this, 
				employee = banhji.source.get("employee");

			this.contactAssigneeDS.add({
				"assignee_id" 	: employee.id,
				"contact_id" 	: id
			});

			this.contactAssigneeDS.sync();
			this.contactAssigneeDS.bind("requestEnd", function(e){
				if(e.type=="create"){
					self.contactAssigneeDS.data([]);
				}
			});
		},
		//Pattern
		typeChanges 			: function(){
			var obj = this.get("obj");

			if(obj.contact_type_id && obj.isNew()){
				this.applyPattern();
				this.generateNumber();
			}
		},
		applyPattern 			: function(){
			var self = this, obj = self.get("obj");

			this.patternDS.query({
				filter: [
					{ field:"contact_type_id", value: obj.contact_type_id },
					{ field:"is_pattern", value: 1 }
				],
				page: 1,
				pageSize: 1
			}).then(function(data){
				var view = self.patternDS.view(),
				type = self.contactTypeDS.get(view[0].contact_type_id);
				if(view.length>0){
					obj.set("country_id", view[0].country_id);
					obj.set("abbr", type.abbr);
					obj.set("gender", view[0].gender);
					obj.set("company", view[0].company);
					obj.set("vat_no", view[0].vat_no);
					obj.set("memo", view[0].memo);
					obj.set("city", view[0].city);
					obj.set("post_code", view[0].post_code);
					obj.set("address", view[0].address);
					obj.set("bill_to", view[0].bill_to);
					obj.set("ship_to", view[0].ship_to);
					obj.set("invoice_note", view[0].invoice_note);
					obj.set("payment_term_id", view[0].payment_term_id);
					obj.set("payment_method_id", view[0].payment_method_id);
					obj.set("credit_limit", view[0].credit_limit);
					obj.set("locale", view[0].locale);
					obj.set("account_id", view[0].account_id);
					obj.set("ra_id", view[0].ra_id);
					obj.set("tax_item_id", view[0].tax_item_id);
					obj.set("deposit_account_id", view[0].deposit_account_id);
					obj.set("trade_discount_id", view[0].trade_discount_id);
					obj.set("settlement_discount_id", view[0].settlement_discount_id);
				}
			});
		}
	});
	// SALE FUNCTIONS
	banhji.quote =  kendo.observable({
		lang 				: langVM,
		dataSource 			: dataStore(apiUrl + "transactions"),
		lineDS  			: dataStore(apiUrl + "item_lines"),
		assemblyLineDS  	: dataStore(apiUrl + "item_lines"),
		recurringDS 		: dataStore(apiUrl + "transactions"),
		recurringLineDS 	: dataStore(apiUrl + "item_lines"),
		txnDS 				: dataStore(apiUrl + "transactions"),
		balanceDS 			: dataStore(apiUrl + "transactions/balance"),
		attachmentDS	 	: dataStore(apiUrl + "attachments"),
		assemblyDS			: dataStore(apiUrl + "item_prices"),
		wacDS				: dataStore(apiUrl + "items/weighted_average_costing"),
		jobDS 				: new kendo.data.DataSource({
		  	data: banhji.source.jobList,
		  	sort: { field: "name", dir: "asc" }
		}),
		segmentItemDS 		: new kendo.data.DataSource({
		  	data: banhji.source.segmentItemList,
		  	sort: [
			  	{ field: "segment_id", dir: "asc" },
			  	{ field: "code", dir: "asc" }
			]
		}),
		txnTemplateDS 		: new kendo.data.DataSource({
		  	data: banhji.source.txnTemplateList,
		  	filter:{ field: "type", value: "Quote" }
		}),
		contactDS			: banhji.source.customerDS,
		paymentTermDS 		: banhji.source.paymentTermDS,
		statusObj 			: banhji.source.statusObj,		
		amtDueColor 		: banhji.source.amtDueColor,
	    confirmMessage 		: banhji.source.confirmMessage,
		frequencyList 		: banhji.source.frequencyList,
		monthOptionList 	: banhji.source.monthOptionList,
		monthList 			: banhji.source.monthList,
		weekDayList 		: banhji.source.weekDayList,
		dayList 			: banhji.source.dayList,
		showMonthOption 	: false,
		showMonth 			: false,
		showWeek 			: false,
		showDay 			: false,
		obj 				: null,
		isEdit 				: false,
		saveDraft 			: false,
		saveClose 			: false,
		savePrint 			: false,
		saveRecurring 		: false,
		showConfirm 		: false,
		notDuplicateNumber 	: true,
		recurring 			: "",
		recurring_validate 	: false,
		balance 			: 0,
		total 				: 0,
		user_id				: banhji.source.user_id,
		pageLoad 			: function(id){
			if(id){
				this.set("isEdit", true);
				this.loadObj(id);
			}else{
				if(this.get("isEdit") || this.dataSource.total()==0){
					this.addEmpty();
				}
			}
		},
		//Upload
		onSelect 			: function(e){
	        // Array with information about the uploaded files
	        var self = this, 
	        files = e.files,
	        obj = this.get("obj");
			
	        // Check the extension of each file and abort the upload if it is not .jpg
	        $.each(files, function(index, value){
	            if (value.extension.toLowerCase() === ".jpg"
	            	|| value.extension.toLowerCase() === ".jpeg"
	            	|| value.extension.toLowerCase() === ".tiff"
	            	|| value.extension.toLowerCase() === ".png" 
	            	|| value.extension.toLowerCase() === ".gif"
	            	|| value.extension.toLowerCase() === ".pdf"){

	            	var key = 'ATTACH_' + banhji.institute.id + "_" + Math.floor(Math.random() * 100000000000000001) +'_'+ value.name;

	            	self.attachmentDS.add({
	            		user_id 		: self.get("user_id"),
	            		transaction_id 	: obj.id,
	            		type 			: "Transaction",
	            		name 			: value.name,
	            		description 	: "",
	            		key 			: key,
	            		url 			: banhji.s3 + key,
	            		size 			: value.size,
	            		created_at 		: new Date(),

	            		file 			: value.rawFile
	            	});
	            }else{
	            	alert("This type of file is not allowed to attach.");
	            }
	        });
	    },
	    removeFile 			: function(e){
	    	var data = e.data;

	    	if (confirm(banhji.source.confirmMessage)) {
	    		this.attachmentDS.remove(data);
	    	}
	    },
	    uploadFile 			: function(){
	    	$.each(this.attachmentDS.data(), function(index, value){
		    	if(!value.id){
			    	var params = { 
		            	Body: value.file, 
		            	Key: value.key 
		            };
		            bucket.upload(params, function (err, data) {
	                	// console.log(err, data);
	                	// var url = data.Location;
	            	});
            	}
            });

            this.attachmentDS.sync();
            var saved = false;
            this.attachmentDS.bind("requestEnd", function(e){
            	//Delete File
            	if(e.type=="destroy"){
	            	if(saved==false && e.response){
	            		saved = true;
	            	
	            		var response = e.response.results;
	            		$.each(response, function(index, value){
		            		var params = {
							  	//Bucket: 'STRING_VALUE', /* required */
							 	Delete: { /* required */
								    Objects: [ /* required */
								      	{
									        Key: value.data.key /* required */
								      	}
								      /* more items */
								    ]
							  	}
							};
							bucket.deleteObjects(params, function(err, data) {
							  	//console.log(err, data);
							});
						});
	            	}
            	}
            });
	    },   
		//Contact
		setContact 			: function(contact){
			var obj = this.get("obj");

		    obj.set("contact", contact);
		    this.contactChanges();
	    },
		contactChanges 		: function(){
			var self = this, obj = this.get("obj");

	    	if(obj.contact){
		    	var contact = obj.contact;

		    	obj.set("contact_id", contact.id);
		    	obj.set("payment_term_id", contact.payment_term_id);
		    	obj.set("locale", contact.locale);
		    	obj.set("bill_to", contact.bill_to);
		    	obj.set("ship_to", contact.ship_to);

		    	this.setRate();
		    	this.setTerm();
		    	this.loadBalance();
		    	this.jobDS.filter({ field:"contact_id", value: contact.id });
	    	}
	    	
		    this.changes();
	    },
	    loadBalance 		: function(){
			var self = this, obj = this.get("obj");

			this.balanceDS.query({
				filter:[
					{ field:"contact_id", value:obj.contact_id },
					{ field:"type", operator:"where_in", value:["Commercial_Invoice", "Vat_Invoice", "Invoice"] }
				]
		    }).then(function(){
		    	var view = self.balanceDS.view(),
		  			contact = obj.contact, 
					balance = view[0].amount,
					creditAllowed = 0;

		    	if(contact.credit_limit > balance){
					creditAllowed = contact.credit_limit - balance;
				}

		    	self.set("balance", kendo.toString(balance, "c", obj.locale));
		    	obj.set("credit_allowed", creditAllowed);
			});
		},
	    //Currency Rate
		setRate 			: function(){
			var obj = this.get("obj"), 
			rate = banhji.source.getRate(obj.locale, new Date(obj.issued_date));
			
			obj.set("rate", rate);

			//Item Lines
			$.each(this.lineDS.data(), function(index, value){
				var itemRate = rate / banhji.source.getRate(value.locale, new Date(obj.issued_date));
				value.set("rate", itemRate);
			});

			//Assembly Lines
			$.each(this.assemblyLineDS.data(), function(index, value){
				var itemRate = rate / banhji.source.getRate(value.locale, new Date(obj.issued_date));
				value.set("rate", itemRate);
			});
		},
		//Payment Term
		setTerm 			: function(){
			var duedate = new Date(), obj = this.get("obj");

			if(obj.payment_term_id>0){
				var term = this.paymentTermDS.get(obj.payment_term_id);

				duedate.setDate(duedate.getDate() + term.net_due);

				obj.set("due_date", duedate);
			}else{
				obj.set("due_date", new Date());
			}
		},
		//Segment
	    segmentChanges 		: function(e) {
			var dataArr = this.get("obj").segments,
			lastIndex = dataArr.length - 1,
			last = this.segmentItemDS.get(dataArr[lastIndex]);
			
			if(dataArr.length > 1) {
				for(var i = 0; i < dataArr.length - 1; i++) {
					var current_index = dataArr[i],
					current = this.segmentItemDS.get(current_index);

					if(current.segment_id === last.segment_id) {
						dataArr.splice(lastIndex, 1);
						break;
					}
				}
			}
		},
		//Item
		addItem 			: function(uid){
			var self = this,
				row = this.lineDS.getByUid(uid),
				obj = this.get("obj"),
				item = row.item,
				rate = obj.rate / banhji.source.getRate(item.locale, new Date(obj.issued_date));

			row.set("item_id", item.id);
			row.set("description", item.sale_description);
			// row.set("cost", item.cost * rate);
			row.set("rate", rate);
			row.set("locale", item.locale);

			//Get cost
			this.wacDS.query({
				filter:[
					{ field:"item_id", value: item.id },
					{ field:"issued_date <=", operator:"where_related_transaction", value: kendo.toString(new Date(obj.issued_date),"yyyy-MM-dd HH:mm:ss") }
				]
			}).then(function(){
	        	var wac = self.wacDS.view();
	        	row.set("cost", wac[0].cost * rate);
			});

			//Get first price
			this.assemblyDS.query({
	        	filter:[
	        		{ field:"item_id", value:item.id },
	        		{ field:"assembly_id", value:0 }
	        	],
	        	page: 1,
	        	pageSize: 1
	        }).then(function(){
	        	var view = self.assemblyDS.view();

	        	if(view.length>0){
	        		var measurement = { 
	        			measurement_id 	: view[0].measurement_id,
	        			price 			: kendo.parseFloat(view[0].price),
	        			conversion_ratio: view[0].conversion_ratio, 
	        			measurement 	: view[0].measurement 
	        		};
	        		row.set("measurement", measurement);
	        	}
	        });
		},
		addItemCatalog 		: function(uid){
			var self = this,
				row = this.lineDS.getByUid(uid),
				obj = this.get("obj"),
				item = row.item;

			this.lineDS.remove(row);

        	$.each(item.catalogs, function(index, value){
				var catalogItem = banhji.source.itemDS.get(value);

				if(catalogItem){
					var rate = obj.rate / banhji.source.getRate(catalogItem.locale, new Date(obj.issued_date));

					self.lineDS.add({
						transaction_id 		: obj.id,
						tax_item_id 		: 0,
						item_id 			: catalogItem.id,
						measurement_id 		: 0,
						description 		: catalogItem.sale_description,
						quantity 	 		: 1,
						conversion_ratio 	: 1,
						cost 				: catalogItem.cost * rate,
						price 				: 0,
						amount 				: 0,
						discount 			: 0,
						rate				: rate,
						locale				: catalogItem.locale,
						movement 			: 0,

						discount_percentage : 0,
						item 				: catalogItem,
						measurement 		: { measurement_id:"", measurement:"" },
						tax_item 			: { id:"", name:"" }
					});
				}
			});
		},
		addItemAssembly 	: function(uid){
			var self = this,
				row = this.lineDS.getByUid(uid),
				obj = this.get("obj"),
				item = row.item,
				rate = obj.rate / banhji.source.getRate(item.locale, new Date(obj.issued_date));

			var notExist = true;
			$.each(this.assemblyLineDS.data(), function(index, value){
				if(value.assembly_id==item.id){
					notExist = false;

					return false;
				}
			});

			if(notExist){
				row.set("item_id", item.id);
	        	row.set("measurement_id", item.measurement_id);
	    		row.set("description", item.sale_description);
	    		row.set("conversion_ratio", 1);
		        row.set("cost", item.cost * rate);
		        row.set("price", item.price * rate);
		        row.set("rate", rate);
		        row.set("locale", item.locale);

		        this.assemblyDS.query({
		        	filter:{ field:"assembly_id", value:row.item_id }
		        }).then(function(){
		        	var view = self.assemblyDS.view();

		        	$.each(view, function(index, value){
		        		var itemAssembly = banhji.source.itemDS.get(value.item_id),
		        			itemAssemblyRate = obj.rate / banhji.source.getRate(itemAssembly.locale, new Date(obj.issued_date));

						self.assemblyLineDS.add({
							transaction_id 		: obj.id,
							item_id 			: value.item_id,
							assembly_id 		: value.assembly_id,
							measurement_id 		: value.measurement_id,
							description 		: itemAssembly.sale_description,
							quantity 	 		: value.quantity,
							conversion_ratio 	: value.conversion_ratio,
							cost 				: itemAssembly.cost * rate,
							price 				: value.price * itemAssemblyRate,
							amount 				: value.price * itemAssemblyRate,
							rate				: itemAssemblyRate,
							locale				: value.locale,
							movement 			: 0,

							item 				: itemAssembly
						});
			        });
		        });
	    	}else{
	    		alert("Duplicate Item Assembly!");
	    		row.set("item_id", 0);
	    		row.set("item", { id:"", name:"" });
	    	}
		},
		changes				: function(){
			var self = this, obj = this.get("obj"),
				total = 0, subTotal = 0, discount =0, tax = 0, remaining = 0, amount_due = 0, itemIds = [];

			$.each(this.lineDS.data(), function(index, value) {
				var amt = value.quantity * value.price;
				subTotal += amt;

				//Discount by line
				if(value.discount>0){
					amt -= value.discount;
					discount += value.discount;
				}

				//Tax by line
				if(value.tax_item_id>0){
					var taxAmount = amt * value.tax_item.rate;
					tax += taxAmount;
					value.set("tax", taxAmount);
				}else{
					value.set("tax", 0);
				}

				value.set("amount", amt);

				if(value.item_id>0){
					itemIds.push(value.item_id);
				}
	        });

	    	//Total
	        total = (subTotal + tax) - discount;

	        //Warning over credit allowed
	        if(obj.credit_allowed>0 && total>obj.credit_allowed){
	        	this.set("amtDueColor", "Gold");
	        }else{
	        	this.set("amtDueColor", banhji.source.amtDueColor);
	        }

	        obj.set("sub_total", subTotal);
	        obj.set("discount", discount);
	        obj.set("tax", tax);
			obj.set("amount", total);

			this.set("total", kendo.toString(total, "c", obj.locale));
	    	
	    	//Remove Assembly Item List
			var raw = this.assemblyLineDS.data();
		    var item, i;
		    for(i=raw.length-1; i>=0; i--){
		    	item = raw[i];

		    	if (jQuery.inArray(kendo.parseInt(item.assembly_id), itemIds)==-1) {
			       	this.assemblyLineDS.remove(item);
			    }
		    }
		},
		lineDSChanges 		: function(arg){
			var self = banhji.quote;

			if(arg.field){
				if(arg.field=="item"){
					var dataRow = arg.items[0],
						item = dataRow.item;

					if(item.is_catalog=="1"){
						self.addItemCatalog(dataRow.uid);
					}else if(item.is_assembly=="1"){
						self.addItemAssembly(dataRow.uid);
					}else{
						self.addItem(dataRow.uid);
					}

					self.addExtraRow(dataRow.uid);
				}else if(arg.field=="quantity" || arg.field=="price" || arg.field=="discount"){
					self.changes();
				}else if(arg.field=="measurement"){
					var dataRow = arg.items[0];
					
					dataRow.set("measurement_id", dataRow.measurement.measurement_id);
			        dataRow.set("price", dataRow.measurement.price * dataRow.rate);
			        dataRow.set("conversion_ratio", dataRow.measurement.conversion_ratio);
			    }else if(arg.field=="discount_percentage"){
			    	var dataRow = arg.items[0],
			    		percentageAmount = dataRow.quantity * dataRow.price * dataRow.discount_percentage;

			    	dataRow.set("discount", percentageAmount);
				}else if(arg.field=="tax_item"){
					var dataRow = arg.items[0];
					
					dataRow.set("tax_item_id", dataRow.tax_item.id);
					dataRow.set("tax", 0);

					self.changes();
				}
			}
		},
		//Number      	
		checkExistingNumber 	: function(){
			var self = this, para = [], 
			obj = this.get("obj");
			
			if(obj.number!==""){

				if(obj.isNew()==false){
					para.push({ field:"id", operator:"where_not_in", value: [obj.id] });
				}
				
				para.push({ field:"number", value: obj.number });
				para.push({ field:"type", value: obj.type });

				this.txnDS.query({
					filter: para,
					page: 1,
					pageSize: 1
				}).then(function(e){
					var view = self.txnDS.view();
					
					if(view.length>0){
				 		self.set("notDuplicateNumber", false);
					}else{
						self.set("notDuplicateNumber", true);
					}
				});
			}
		},
		generateNumber 			: function(){
			var self = this, obj = this.get("obj"),
			issueDate = new Date(obj.issued_date),
			startDate = new Date(obj.issued_date),
			endDate = new Date(obj.issued_date);

			this.set("notDuplicateNumber", true);

			startDate.setDate(1);
			startDate.setMonth(0);//Set to January
			endDate.setDate(31);
			endDate.setMonth(11);//Set to November

			this.txnDS.query({
				filter:[
					{ field:"type", value:obj.type },
					{ field:"issued_date >=", value:kendo.toString(startDate, "yyyy-MM-dd") },
					{ field:"issued_date <=", value:kendo.toString(endDate, "yyyy-MM-dd") }
				],
				sort: { field:"number", dir:"desc" },
				page:1,
				pageSize:1
			}).then(function(){
				var view = self.txnDS.view(),
				number = 0, str = "";

				if(view.length>0){
					str = view[0].number;
					str = str.substring(str.length-4, str.length);
					number = kendo.parseInt(str);
				}
				
				number++;
				str = banhji.source.getPrefixAbbr(obj.type) + kendo.toString(issueDate, "yy") + kendo.toString(issueDate, "MM") + kendo.toString(number, "00000");
				
				obj.set("number", str);
			});
		},
		setStatus 			: function(){
			var self = this,
				obj = this.get("obj"), 
				statusObj = this.get("statusObj");

			statusObj.set("text", "");
	        statusObj.set("date", "");
	        statusObj.set("number", "");
	        statusObj.set("url", "");

			switch(obj.status) {
				case 1:
			    	statusObj.set("text", "used");

			    	this.txnDS.query({
			    		filter:{ field:"reference_id", value: obj.id },
			    		sort: { field:"issued_date", dir:"desc" },
			    		page:1,
			    		pageSize:1
			    	}).then(function(){
			    		var view = self.txnDS.view();

			    		if(view.length>0){
			    			statusObj.set("date", kendo.toString(new Date(view[0].issued_date), "dd-MM-yyyy h:mm:ss tt"));
			    			statusObj.set("number", view[0].number);

			    			var url = "#/" + view[0].type.toLowerCase() + "/" + view[0].id;
			    			statusObj.set("url", url);
			    		}
			    	});
			        break;
			    case 3:
			        statusObj.set("text", "return");
			        break;
			    case 4:
			        statusObj.set("text", "draft");
			        break;
			    default:
			        //Default here
			}
		},
		//Obj
		loadObj 			: function(id){
			var self = this, para = [];

			para.push({ field:"id", value: id });

			if(this.get("recurring")=="use"){
				this.set("recurring","");
				this.addEmpty();
				this.loadRecurring(id);
			}else{
				if(this.get("recurring")=="edit"){
					this.set("recurring","");
					para.push({ field:"is_recurring", value: 1 });
				}

				this.dataSource.query({
					filter: para,
					page: 1,
					pageSize: 1
				}).then(function(e){
					var view = self.dataSource.view();

					self.set("obj", view[0]);
					self.set("total", kendo.toString(view[0].amount, "c2", view[0].locale));
					self.setStatus();

					self.lineDS.query({
						filter: [
							{ field: "transaction_id", value: id },
							{ field: "assembly_id", value: 0 }
						],
					});

					self.assemblyLineDS.filter([
						{ field: "transaction_id", value: id },
						{ field: "assembly_id >", value: 0 }
					]);

					self.attachmentDS.filter({ field: "transaction_id", value: id });
				});
			}
		},
		addEmpty 		 	: function(){
			this.dataSource.data([]);
			this.lineDS.data([]);
			this.assemblyLineDS.data([]);
			this.attachmentDS.data([]);
			
			this.set("isEdit", false);
			this.set("obj", null);
			this.set("total", 0);
			this.set("amtDueColor", banhji.source.amtDueColor);

			//Set Date
			var duedate = new Date();
			duedate.setDate(duedate.getDate() + 30);

			this.dataSource.insert(0, {
				contact_id 			: "",
				transaction_template_id : 1,
				payment_term_id 	: 0,
				reference_id 		: "",
				recurring_id 		: "",
				job_id 				: 0,
				user_id 			: this.get("user_id"),
				employee_id			: banhji.source.get("employee").id,
			   	type				: "Quote",//Required
			   	number 				: "",
			   	sub_total 			: 0,
			   	amount				: 0,
			   	credit_allowed 		: 0,
			   	discount 			: 0,
			   	tax 				: 0,
			   	rate				: 1,
			   	locale 				: banhji.locale,
			   	issued_date 		: new Date(),
			   	due_date 			: duedate,
			   	bill_to 			: "",
			   	ship_to 			: "",
			   	memo 				: "",
			   	memo2 				: "",
			   	status 				: 0,
			   	segments 			: [],
			   	//Recurring
			   	recurring_name 		: "",
			   	start_date 			: new Date(),
			   	frequency 			: "Daily",
			   	month_option 		: "Day",
			   	interval 			: 1,
			   	day 				: 1,
			   	week 				: 0,
			   	month 				: 0,
			   	is_recurring 		: 0,

			   	contact 			: { id:"", name:"" }
	    	});
			
			var obj = this.dataSource.at(0);
			this.set("obj", obj);
			this.setRate();
			this.generateNumber();

			//Default rows
			for (var i = 0; i < banhji.source.defaultLines; i++) {
				this.addRow();
			}
		},
		addRow 				: function(){
			var obj = this.get("obj");

			this.lineDS.add({
				transaction_id 		: obj.id,
				tax_item_id 		: "",
				item_id 			: "",
				assembly_id 		: 0,
				measurement_id 		: 0,
				description 		: "",
				quantity 	 		: 1,
				conversion_ratio 	: 0,
				cost 				: 0,
				price 				: 0,
				amount 				: 0,
				discount 			: 0,
				rate				: obj.rate,
				locale				: obj.locale,
				movement 			: 0,

				discount_percentage : 0,
				item 				: { id:"", name:"" },
				measurement 		: { measurement_id:"", measurement:"" },
				tax_item 			: { id:"", name:"" }
			});
		},
		addExtraRow 		: function(uid){
			var row = this.lineDS.getByUid(uid),
				index = this.lineDS.indexOf(row);

			if(index==this.lineDS.total()-1){
				this.addRow();
			}
		},
		removeEmptyRow 		: function(){
			var raw = this.lineDS.data();
		    var item, i;
		    for(i=raw.length-1; i>=0; i--){
		    	item = raw[i];

		    	if (item.item_id==0) {
			       	this.lineDS.remove(item);
			    }
		    }
	    },
		removeRow 			: function(e){
			var data = e.data;
			if(this.lineDS.total()>1){
				this.lineDS.remove(data);
		        this.changes();
	        }
		},
	    objSync 			: function(){
	    	var dfd = $.Deferred();

	    	this.dataSource.sync();
		    this.dataSource.bind("requestEnd", function(e){
		    	if(e.response){
					dfd.resolve(e.response.results);
				}
		    });
		    this.dataSource.bind("error", function(e){
				dfd.reject(e.errorThrown);
		    });

		    return dfd;
	    },
		save 				: function(){
	    	var self = this, obj = this.get("obj");

	    	obj.set("issued_date", kendo.toString(new Date(obj.issued_date), "s"));
	    	obj.set("due_date", kendo.toString(new Date(obj.due_date), "yyyy-MM-dd"));

	    	//Warning over credit allowed
	        if(obj.credit_limit>0 && obj.amount>obj.credit_allowed){
	        	alert("Over credit allowed!");
	        }

	        this.removeEmptyRow();

	        //Save Draft
	        if(this.get("saveDraft")){
	        	obj.set("status", 4); //In progress
	        	obj.set("progress", "Draft");
	        	obj.set("is_journal", 0);//No Journal
	        }

	        //Recurring
	    	if(this.get("saveRecurring")){
	    		this.set("saveRecurring", false);
	    		
	    		obj.set("number", "");
	    		obj.set("is_recurring", 1);
	    	}

	        //Edit Mode
	    	if(obj.isNew()==false){
	    		//Use draft
	    		if(obj.status==4){
	    			obj.set("status", 0);//Open
	    			obj.set("progress", "");
	    			obj.set("is_journal", 1);//Add Journal
	    		}
	    	}	
	    	
			//Save Obj
			this.objSync()
			.then(function(data){ //Success
				if(self.get("isEdit")==false){
					//Item line
					$.each(self.lineDS.data(), function(index, value){
						value.set("transaction_id", data[0].id);
					});

					//Assembly Item line
					$.each(self.assemblyLineDS.data(), function(index, value){
						value.set("transaction_id", data[0].id);
					});

					//Attachment
					$.each(self.attachmentDS.data(), function(index, value){
			    		value.set("transaction_id", data[0].id);
		            });
				}	

				self.lineDS.sync();
				self.assemblyLineDS.sync();
				self.uploadFile();

				return data;
			}, function(reason) { //Error
				$("#ntf1").data("kendoNotification").error(reason);
			}).then(function(result){
				$("#ntf1").data("kendoNotification").success(banhji.source.successMessage);

				if(self.get("saveDraft") || self.get("saveClose")){
					//Save Draft or Save Close
					self.set("saveDraft", false);
					self.set("saveClose", false);
					self.cancel();
				}else if(self.get("savePrint")){
					//Save Print
					self.set("savePrint", false);
					self.clear();
					if(result[0].transaction_template_id>0){
						banhji.router.navigate("/invoice_form/"+result[0].id);
					}
				}else{
					//Save New
					self.addEmpty();
				}
			});
		},
		clear 				: function(){
			this.dataSource.cancelChanges();
			this.lineDS.cancelChanges();
			this.assemblyLineDS.cancelChanges();
			this.attachmentDS.cancelChanges();
			
			this.dataSource.data([]);
			this.lineDS.data([]);
			this.assemblyLineDS.data([]);
			this.attachmentDS.data([]);

			banhji.userManagement.removeMultiTask("quote");
		},
		cancel 				: function(){
			this.clear();
			window.history.back();
		},
		delete 				: function(){
			var self = this, obj = this.get("obj");
			this.set("showConfirm",false);

			this.txnDS.query({
	        	filter:[
	        		{ field:"reference_id", value:obj.id },
	        	],
	        	page:1,
	        	pageSize:1
	        }).then(function(){
	        	var view = self.txnDS.view();

	        	if(view.length>0){
	        		alert("Sorry, you can not delete it.");
	        	}else{
	        		obj.set("deleted", 1);

			        self.dataSource.sync();
			        self.dataSource.bind("requestEnd", function(e){
			        	if(e.type==="update"){
			        		window.history.back();
			        	}
			        });
	        	}
	        });
		},
		openConfirm 		: function(){
			this.set("showConfirm", true);
		},
		closeConfirm 		: function(){
			this.set("showConfirm", false);
		},
		validating 			: function(){
			var result = true, nonItem = true;

			//Check select non item
			$.each(this.lineDS.data(), function(index, value){
				if(value.item_id>0){
					nonItem = false;
				}
			});

			if(nonItem){
				$("#ntf1").data("kendoNotification").error("Please select at least one item!");

				result = false;
			}

			return result;
		},
		//Recurring
		loadRecurring 		: function(id){
			var self = this;

			this.recurringDS.query({
				filter:[
					{ field:"id", value:id },
					{ field:"is_recurring", value:1 }
				],
				page: 1,
				pageSize: 100
			}).then(function(){
				var view = self.recurringDS.view(),
				obj = self.get("obj");
				
				obj.set("contact", view[0].contact);
				obj.set("contact_id", view[0].contact.id);
				obj.set("recurring_id", id);
				obj.set("payment_term_id", view[0].payment_term_id);
				obj.set("employee_id", view[0].employee_id);//Sale Rep
				obj.set("job_id", view[0].job_id);
				obj.set("segments", view[0].segments);
				obj.set("locale", view[0].locale);
				obj.set("memo", view[0].memo);
				obj.set("memo2", view[0].memo2);
				obj.set("bill_to", view[0].bill_to);
				obj.set("ship_to", view[0].ship_to);

				// self.setContact(view[0].contact);
			});

			this.recurringLineDS.query({
				filter:[
					{ field: "transaction_id", value: id },
					{ field: "assembly_id", value: 0 }
				]
			}).then(function(){
				var view = self.recurringLineDS.view();
				self.lineDS.data([]);

				$.each(view, function(index, value){
					self.lineDS.add({
						transaction_id 		: 0,
						tax_item_id 		: value.tax_item_id,
						item_id 			: value.item_id,
						measurement_id 		: value.measurement_id,
						description 		: value.description,
						quantity 	 		: value.quantity,
						cost 				: value.cost,
						price 				: value.price,
						amount 				: value.amount,
						discount 			: value.discount,
						rate				: value.rate,
						locale				: value.locale,
						movement 			: 0,

						item 				: value.item,
						measurement 		: value.measurement,
						tax_item 			: value.tax_item
					});
				});

				self.changes();
			});
		},
		frequencyChanges 	: function(){
			var obj = this.get("obj");

			switch(obj.frequency) {
			    case "Daily":
			        this.set("showMonthOption", false);
			        this.set("showMonth", false);
			        this.set("showWeek", false);
			        this.set("showDay", false);
			       
			        break;
			    case "Weekly":
			        this.set("showMonthOption", false);
			        this.set("showMonth", false);
			        this.set("showWeek", true);
			        this.set("showDay", false);

			        break;
			    case "Monthly":
			        this.set("showMonthOption", true);
			        this.set("showMonth", false);
			        this.set("showWeek", false);
			        this.set("showDay", true);

			        break;
			    case "Annually":
			        this.set("showMonthOption", false);
			        this.set("showMonth", true);
			        this.set("showWeek", false);
			        this.set("showDay", true);

			        break;
			    default:
			        //Default here..
			}
		},
		monthOptionChanges 	: function(){
			var obj = this.get("obj");

			switch(obj.month_option) {
			    case "Day":
			        this.set("showWeek", false);
			        this.set("showDay", true);
			       
			        break;
			    default:
			        this.set("showWeek", true);
			        this.set("showDay", false);
			}
		},
		recurringSync 		: function(){
	    	var dfd = $.Deferred();

	    	this.recurringDS.sync();
		    this.recurringDS.bind("requestEnd", function(e){
		    	if(e.response){
					dfd.resolve(e.response.results);
				}
		    });
		    this.recurringDS.bind("error", function(e){
				dfd.reject(e.errorThrown);
		    });

		    return dfd;
	    }
	});
	banhji.saleOrder =  kendo.observable({
		lang 				: langVM,
		dataSource 			: dataStore(apiUrl + "transactions"),
		poDS 				: dataStore(apiUrl + "transactions/with_line"),
		txnDS 				: dataStore(apiUrl + "transactions"),
		lineDS  			: dataStore(apiUrl + "item_lines"),
		assemblyLineDS  	: dataStore(apiUrl + "item_lines"),
		recurringDS 		: dataStore(apiUrl + "transactions"),
		recurringLineDS 	: dataStore(apiUrl + "item_lines"),
		referenceDS			: dataStore(apiUrl + "transactions"),
		referenceLineDS		: dataStore(apiUrl + "item_lines"),
		balanceDS 			: dataStore(apiUrl + "transactions/balance"),
		attachmentDS	 	: dataStore(apiUrl + "attachments"),
		assemblyDS			: dataStore(apiUrl + "item_prices"),
		txnTemplateDS 		: new kendo.data.DataSource({
		  	data: banhji.source.txnTemplateList,
		  	filter:{ field: "type", value: "Sale_Order" }
		}),
		jobDS 				: new kendo.data.DataSource({
		  	data: banhji.source.jobList,
		  	sort: { field: "name", dir: "asc" }
		}),
		segmentItemDS 		: new kendo.data.DataSource({
		  	data: banhji.source.segmentItemList,
		  	sort: [
			  	{ field: "segment_id", dir: "asc" },
			  	{ field: "code", dir: "asc" }
			]
		}),
		contactDS			: banhji.source.customerDS,
		statusObj 			: banhji.source.statusObj,
		amtDueColor 		: banhji.source.amtDueColor,
		confirmMessage 		: banhji.source.confirmMessage,
		frequencyList 		: banhji.source.frequencyList,
		monthOptionList 	: banhji.source.monthOptionList,
		monthList 			: banhji.source.monthList,
		weekDayList 		: banhji.source.weekDayList,
		dayList 			: banhji.source.dayList,
		showMonthOption 	: false,
		showMonth 			: false,
		showWeek 			: false,
		showDay 			: false,
		obj 				: null,
		isEdit 				: false,
		saveDraft 			: false,
		saveClose 			: false,
		savePrint 			: false,
		saveRecurring 		: false,
		showConfirm 		: false,
		notDuplicateNumber  : true,
		recurring 			: "",
		recurring_validate 	: false,
		enableRef 	 		: false,
		balance 			: 0,
		total 				: 0,
		user_id				: banhji.source.user_id,
		pageLoad 			: function(id){
			if(id){
				this.set("isEdit", true);
				this.loadObj(id);
			}else{				
				if(this.get("isEdit") || this.dataSource.total()==0){
					this.addEmpty();
				}								
			}
		},
		//Upload
		onSelect 			: function(e){
	        // Array with information about the uploaded files
	        var self = this, 
	        files = e.files,
	        obj = this.get("obj");
			
	        // Check the extension of each file and abort the upload if it is not .jpg
	        $.each(files, function(index, value){
	            if (value.extension.toLowerCase() === ".jpg"
	            	|| value.extension.toLowerCase() === ".jpeg"
	            	|| value.extension.toLowerCase() === ".tiff"
	            	|| value.extension.toLowerCase() === ".png" 
	            	|| value.extension.toLowerCase() === ".gif"
	            	|| value.extension.toLowerCase() === ".pdf"){

	            	var key = 'ATTACH_' + banhji.institute.id + "_" + Math.floor(Math.random() * 100000000000000001) +'_'+ value.name;

	            	self.attachmentDS.add({
	            		user_id 		: self.get("user_id"),
	            		transaction_id 	: obj.id,
	            		type 			: "Transaction",
	            		name 			: value.name,
	            		description 	: "",
	            		key 			: key,
	            		url 			: banhji.s3 + key,
	            		size 			: value.size,
	            		created_at 		: new Date(),

	            		file 			: value.rawFile
	            	});
	            }else{
	            	alert("This type of file is not allowed to attach.");
	            }
	        });
	    },
	    removeFile 			: function(e){
	    	var data = e.data;

	    	if (confirm(banhji.source.confirmMessage)) {
	    		this.attachmentDS.remove(data);
	    	}	    	
	    },
	    uploadFile 			: function(){
	    	$.each(this.attachmentDS.data(), function(index, value){	    		
		    	if(!value.id){
			    	var params = { 
		            	Body: value.file, 
		            	Key: value.key 
		            };
		            bucket.upload(params, function (err, data) {		                
	                	// console.log(err, data);
	                	// var url = data.Location;                
	            	});
	        	}	            
	        });

	        this.attachmentDS.sync();
	        var saved = false;
	        this.attachmentDS.bind("requestEnd", function(e){
	        	//Delete File
	        	if(e.type=="destroy"){
	            	if(saved==false && e.response){
	            		saved = true;
	            	
	            		var response = e.response.results;
	            		$.each(response, function(index, value){            			
		            		var params = {
							  	//Bucket: 'STRING_VALUE', /* required */
							 	Delete: { /* required */
								    Objects: [ /* required */
								      	{
									        Key: value.data.key /* required */
								      	}
								      /* more items */
								    ]
							  	}
							};
							bucket.deleteObjects(params, function(err, data) {
							  	//console.log(err, data);
							});
						});
	            	}
	        	}
	        });
	    },
		//Contact
		setContact 			: function(contact){
			var obj = this.get("obj");

		    obj.set("contact", contact);
		    this.contactChanges();
	    },
		contactChanges 		: function(){
			var self = this, obj = this.get("obj");

	    	if(obj.contact){	    				    			    	
		    	var contact = obj.contact;
		    	
		    	obj.set("contact_id", contact.id);
		    	obj.set("locale", contact.locale);
		    	obj.set("bill_to", contact.bill_to);
		    	obj.set("ship_to", contact.ship_to);

		    	this.setRate();
		    	this.loadBalance();
		    	this.loadReference();
		    	this.jobDS.filter({ field:"contact_id", value: contact.id });
	    	}
	    	
		    this.changes();
	    },
	    loadBalance 		: function(){
			var self = this, obj = this.get("obj");

			this.balanceDS.query({
				filter:[
					{ field:"contact_id", value:obj.contact_id },
					{ field:"type", operator:"where_in", value:["Commercial_Invoice", "Vat_Invoice", "Invoice"] }
				]
		    }).then(function(){
		    	var view = self.balanceDS.view(),
		  			contact = obj.contact, 
					balance = view[0].amount,
					creditAllowed = 0;

		    	if(contact.credit_limit > balance){
					creditAllowed = contact.credit_limit - balance;
				}

		    	self.set("balance", kendo.toString(balance, "c", obj.locale));
		    	obj.set("credit_allowed", creditAllowed);
			});				
		},
	    //Currency Rate
		setRate 			: function(){
			var obj = this.get("obj"), 
			rate = banhji.source.getRate(obj.locale, new Date(obj.issued_date));
			
			obj.set("rate", rate);

			//Item Lines
			$.each(this.lineDS.data(), function(index, value){
				var itemRate = rate / banhji.source.getRate(value.locale, new Date(obj.issued_date));
				value.set("rate", itemRate);
			});

			//Assembly Lines
			$.each(this.assemblyLineDS.data(), function(index, value){
				var itemRate = rate / banhji.source.getRate(value.locale, new Date(obj.issued_date));
				value.set("rate", itemRate);
			});
		},
		//Segment
	    segmentChanges 		: function(e) {
			var dataArr = this.get("obj").segments,
			lastIndex = dataArr.length - 1,
			last = this.segmentItemDS.get(dataArr[lastIndex]);
			
			if(dataArr.length > 1) {
				for(var i = 0; i < dataArr.length - 1; i++) {
					var current_index = dataArr[i],
					current = this.segmentItemDS.get(current_index);

					if(current.segment_id === last.segment_id) {
						dataArr.splice(lastIndex, 1);
						break;
					}
				}
			}				
		},
		//Item
		addItem 			: function(uid){
			var self = this,
				row = this.lineDS.getByUid(uid),
				obj = this.get("obj"),
				item = row.item,
				rate = obj.rate / banhji.source.getRate(item.locale, new Date(obj.issued_date));

			row.set("item_id", item.id);			
			row.set("description", item.sale_description);
			row.set("cost", item.cost * rate);
			row.set("rate", rate);
			row.set("locale", item.locale);

			//Get first price
			this.assemblyDS.query({
	        	filter:[
	        		{ field:"item_id", value:item.id },
	        		{ field:"assembly_id", value:0 }
	        	],
	        	page: 1,
	        	pageSize: 1
	        }).then(function(){
	        	var view = self.assemblyDS.view();

	        	if(view.length>0){
	        		var measurement = { 
	        			measurement_id 	: view[0].measurement_id,
	        			price 			: kendo.parseFloat(view[0].price),
	        			conversion_ratio: view[0].conversion_ratio, 
	        			measurement 	: view[0].measurement 
	        		};
	        		row.set("measurement", measurement);
	        	}
	        });
		},
		addItemCatalog 		: function(uid){
			var self = this,
				row = this.lineDS.getByUid(uid),
				obj = this.get("obj"),
				item = row.item;

			this.lineDS.remove(row);

        	$.each(item.catalogs, function(index, value){
				var catalogItem = banhji.source.itemDS.get(value);

				if(catalogItem){
					var rate = obj.rate / banhji.source.getRate(catalogItem.locale, new Date(obj.issued_date));

					self.lineDS.add({
						transaction_id 		: obj.id,
						tax_item_id 		: 0,
						item_id 			: catalogItem.id,
						measurement_id 		: 0,
						description 		: catalogItem.sale_description,
						quantity 	 		: 1,
						conversion_ratio 	: 1,
						cost 				: catalogItem.cost * rate,
						price 				: 0,
						amount 				: 0,
						discount 			: 0,
						rate				: rate,
						locale				: catalogItem.locale,
						movement 			: 0,

						discount_percentage : 0,
						item 				: catalogItem,
						measurement 		: { measurement_id:"", measurement:"" },
						tax_item 			: { id:"", name:"" }
					});
				}
			});
		},
		addItemAssembly 	: function(uid){
			var self = this,
				row = this.lineDS.getByUid(uid),
				obj = this.get("obj"),
				item = row.item,
				rate = obj.rate / banhji.source.getRate(item.locale, new Date(obj.issued_date));

			var notExist = true;
			$.each(this.assemblyLineDS.data(), function(index, value){
				if(value.assembly_id==item.id){
					notExist = false;

					return false;
				}
			});

			if(notExist){
				row.set("item_id", item.id);
	        	row.set("measurement_id", item.measurement_id);
	    		row.set("description", item.sale_description);
	    		row.set("conversion_ratio", 1);
		        row.set("cost", item.cost * rate);
		        row.set("price", item.price * rate);
		        row.set("rate", rate);
		        row.set("locale", item.locale);

		        this.assemblyDS.query({
		        	filter:{ field:"assembly_id", value:row.item_id }
		        }).then(function(){
		        	var view = self.assemblyDS.view();

		        	$.each(view, function(index, value){
		        		var itemAssembly = banhji.source.itemDS.get(value.item_id),
		        			itemAssemblyRate = obj.rate / banhji.source.getRate(itemAssembly.locale, new Date(obj.issued_date));

						self.assemblyLineDS.add({
							transaction_id 		: obj.id,
							item_id 			: value.item_id,
							assembly_id 		: value.assembly_id,
							measurement_id 		: value.measurement_id,
							description 		: itemAssembly.sale_description,
							quantity 	 		: value.quantity,
							conversion_ratio 	: value.conversion_ratio,
							cost 				: itemAssembly.cost * rate,
							price 				: value.price * itemAssemblyRate,
							amount 				: value.price * itemAssemblyRate,
							rate				: itemAssemblyRate,
							locale				: value.locale,
							movement 			: 0,

							item 				: itemAssembly
						});
			        });
		        });
	    	}else{
	    		alert("Duplicate Item Assembly!");
	    		row.set("item_id", 0);
	    		row.set("item", { id:"", name:"" });
	    	}
		},
		changes				: function(){
			var self = this, obj = this.get("obj"),
				total = 0, subTotal = 0, discount =0, tax = 0, remaining = 0, amount_due = 0, itemIds = [];

			$.each(this.lineDS.data(), function(index, value) {
				var amt = value.quantity * value.price;
				subTotal += amt;
				
				//Discount by line
				if(value.discount>0){
					amt -= value.discount;
					discount += value.discount;
				}

				//Tax by line
				if(value.tax_item_id>0){
					var taxAmount = amt * value.tax_item.rate;
					tax += taxAmount;
					value.set("tax", taxAmount);
				}else{
					value.set("tax", 0);
				}

				value.set("amount", amt);

				if(value.item_id>0){
					itemIds.push(value.item_id);
				}
	        });

	    	//Total
	        total = (subTotal + tax) - discount;

	        //Warning over credit allowed
	        if(obj.credit_allowed>0 && total>obj.credit_allowed){
	        	this.set("amtDueColor", "Gold");		        	
	        }else{
	        	this.set("amtDueColor", banhji.source.amtDueColor);
	        }

	        obj.set("sub_total", subTotal);
	        obj.set("discount", discount);
	        obj.set("tax", tax);			
			obj.set("amount", total);

			this.set("total", kendo.toString(total, "c", obj.locale));
	    	
	    	//Remove Assembly Item List
			var raw = this.assemblyLineDS.data();
		    var item, i;
		    for(i=raw.length-1; i>=0; i--){
		    	item = raw[i];

		    	if (jQuery.inArray(kendo.parseInt(item.assembly_id), itemIds)==-1) {
			       	this.assemblyLineDS.remove(item);
			    }
		    }
		},
		lineDSChanges 		: function(arg){
			var self = banhji.saleOrder;

			if(arg.field){
				if(arg.field=="item"){
					var dataRow = arg.items[0],
						item = dataRow.item;

					if(item.is_catalog=="1"){
						self.addItemCatalog(dataRow.uid);
					}else if(item.is_assembly=="1"){
						self.addItemAssembly(dataRow.uid);
					}else{
						self.addItem(dataRow.uid);
					}

					self.addExtraRow(dataRow.uid);
				}else if(arg.field=="quantity" || arg.field=="price" || arg.field=="discount"){
					self.changes();					
				}else if(arg.field=="measurement"){
					var dataRow = arg.items[0];
					
					dataRow.set("measurement_id", dataRow.measurement.measurement_id);
			        dataRow.set("price", dataRow.measurement.price * dataRow.rate);
			        dataRow.set("conversion_ratio", dataRow.measurement.conversion_ratio);
			    }else if(arg.field=="discount_percentage"){
			    	var dataRow = arg.items[0],
			    		percentageAmount = dataRow.quantity * dataRow.price * dataRow.discount_percentage;

			    	dataRow.set("discount", percentageAmount);
				}else if(arg.field=="tax_item"){
					var dataRow = arg.items[0];
					
					dataRow.set("tax_item_id", dataRow.tax_item.id);
					dataRow.set("tax", 0);

					self.changes();
				}
			}
		},
		//Number
		checkExistingNumber 	: function(){
			var self = this, para = [], 
			obj = this.get("obj");
			
			if(obj.number!==""){

				if(obj.isNew()==false){
					para.push({ field:"id", operator:"where_not_in", value: [obj.id] });
				}
				
				para.push({ field:"number", value: obj.number });
				para.push({ field:"type", value: obj.type });

				this.txnDS.query({
					filter: para,
					page: 1,
					pageSize: 1
				}).then(function(e){
					var view = self.txnDS.view();
					
					if(view.length>0){
				 		self.set("notDuplicateNumber", false);
					}else{
						self.set("notDuplicateNumber", true);
					}
				});
			}
		},
		generateNumber 			: function(){
			var self = this, obj = this.get("obj"),
			issueDate = new Date(obj.issued_date),
			startDate = new Date(obj.issued_date),
			endDate = new Date(obj.issued_date);

			this.set("notDuplicateNumber", true);

			startDate.setDate(1);
			startDate.setMonth(0);//Set to January
			endDate.setDate(31);
			endDate.setMonth(11);//Set to November

			this.txnDS.query({
				filter:[
					{ field:"type", value:obj.type },
					{ field:"issued_date >=", value:kendo.toString(startDate, "yyyy-MM-dd") },
					{ field:"issued_date <=", value:kendo.toString(endDate, "yyyy-MM-dd") }
				],
				sort: { field:"number", dir:"desc" },
				page:1,
				pageSize:1
			}).then(function(){
				var view = self.txnDS.view(),				
				number = 0, str = "";

				if(view.length>0){
					str = view[0].number;
					str = str.substring(str.length-4, str.length);
					number = kendo.parseInt(str);
				}
				
				number++;
				str = banhji.source.getPrefixAbbr(obj.type) + kendo.toString(issueDate, "yy") + kendo.toString(issueDate, "MM") + kendo.toString(number, "00000");
				
				obj.set("number", str);
			});
		},
		setStatus 			: function(){
			var self = this,
				obj = this.get("obj"), 
				statusObj = this.get("statusObj");

			statusObj.set("text", "");
	        statusObj.set("date", "");
	        statusObj.set("number", "");
	        statusObj.set("url", "");

			switch(obj.status) {
				case 0:
			        statusObj.set("text", "open");
			        break;
				case 1:
			    	statusObj.set("text", "used");

			    	this.txnDS.query({
			    		filter:{ field:"reference_id", value: obj.id },
			    		sort: { field:"issued_date", dir:"desc" },
			    		page:1,
			    		pageSize:1
			    	}).then(function(){
			    		var view = self.txnDS.view();

			    		if(view.length>0){
			    			statusObj.set("date", kendo.toString(new Date(view[0].issued_date), "dd-MM-yyyy h:mm:ss tt"));
			    			statusObj.set("number", view[0].number);
		    				
		    				var url = "#/" + view[0].type.toLowerCase() + "/" + view[0].id;
		    				statusObj.set("url", url);
			    		}
			    	});
			        break;
			    case 2:
			        statusObj.set("text", "partialy used");
			        break;
			    case 4:
			        statusObj.set("text", "draft");
			        break;
			    default:
			        //Default here
			}
		},
		//Create PO
		addPO 				: function(id){
			var obj = this.get("obj"), vendorIds = [];

			$.each(this.lineDS.data(), function(index, value){
				if(value.contact.id>0){
					vendorIds.push(value.contact.id);
				}
			});

			vendorIds = jQuery.unique( vendorIds );

			for(var i = 0; i < vendorIds.length; i++){
				var lines = [], subTotal = 0, discount = 0, tax = 0, total = 0;

				$.each(this.lineDS.data(), function(index, value){
					if(value.contact.id==vendorIds[i]){
						var amt = value.quantity * value.cost;
						subTotal += amt;

						//Discount by line
						if(value.discount>0){
							amt -= value.discount;
							discount += value.discount;
						}

						//Tax by line
						if(value.tax_item_id>0){
							var taxAmount = amt * value.tax_item.rate;

							if(banhji.source.checkWHT(value.tax_item.tax_type_id) && value.wht_account_id==0){
								tax -= taxAmount;
							}else{
								tax += taxAmount;
							}
						}

						lines.push({
							transaction_id 		: 0,
							tax_item_id 		: value.tax_item_id,
							item_id 			: value.item_id,
							assembly_id 		: value.assembly_id,
							measurement_id 		: value.measurement_id,
							description 		: value.description,
							quantity 	 		: value.quantity,
							conversion_ratio 	: value.conversion_ratio,
							cost 				: value.cost,
							price 				: value.price,
							amount 				: value.amount,
							discount 			: value.discount,
							rate				: value.rate,
							locale				: value.locale,
							movement 			: 0,
							required_date 		: value.required_date,

							discount_percentage : value.discount_percentage,
							item 				: value.item,
							measurement 		: value.measurement,
							tax_item 			: value.tax_item,
							wht_account 		: value.wht_account
						});
					}
				});

				total = (subTotal + tax) - discount;

				this.poDS.insert(0, {
					contact_id 			: vendorIds[i],
					transaction_template_id : 11,
					reference_id 		: id,
					recurring_id 		: "",
					job_id 				: 0,
					user_id 			: this.get("user_id"),
					employee_id			: obj.employee_id,
				   	type				: "Purchase_Order",//Required
				   	number 				: "",
				   	sub_total 			: subTotal,
				   	discount 			: discount,
				   	amount				: total,
				   	tax 				: tax,
				   	rate				: obj.rate,
				   	locale 				: obj.locale,
				   	issued_date 		: obj.issued_date,
				   	due_date 			: obj.due_date,
				   	bill_to 			: obj.bill_to,
				   	ship_to 			: obj.ship_to,
				   	memo 				: obj.memo,
				   	memo2 				: obj.memo2,
				   	status 				: 0,
				   	segments 			: [],
				   	lines 				: lines
	  		  	});
			}

			this.poDS.sync();			
		},
		//Obj
		loadObj 			: function(id){
			var self = this, para = [], referenceIds = [];

			para.push({ field:"id", value: id });

			if(this.get("recurring")=="use"){
				this.set("recurring","");
				this.addEmpty();
				this.loadRecurring(id);
			}else{
				if(this.get("recurring")=="edit"){
					this.set("recurring","");
					para.push({ field:"is_recurring", value: 1 });
				}

				this.dataSource.query({
					filter: para,
					page: 1,
					pageSize: 100
				}).then(function(e){
					var view = self.dataSource.view();

					self.set("obj", view[0]);
					self.set("total", kendo.toString(view[0].amount, "c2", view[0].locale));					
					self.setStatus();
					
					self.lineDS.query({
						filter: [
							{ field: "transaction_id", value: id },
							{ field: "assembly_id", value: 0 }
						],
					});

					self.assemblyLineDS.filter([
						{ field: "transaction_id", value: id },
						{ field: "assembly_id >", value: 0 }
					]);
					
					self.attachmentDS.filter({ field: "transaction_id", value: id });
					self.referenceDS.filter({ field: "id", value: view[0].reference_id });					
				});
			}				
		},
		addEmpty 		 	: function(){
			this.dataSource.data([]);
			this.lineDS.data([]);
			this.assemblyLineDS.data([]);
			this.attachmentDS.data([]);
			
			this.set("isEdit", false);
			this.set("obj", null);
			this.set("total", 0);
			this.set("amtDueColor", banhji.source.amtDueColor);

			//Set Date
			var duedate = new Date();
			duedate.setDate(duedate.getDate() + 30);

			this.dataSource.insert(0, {
				contact_id 			: "",
				transaction_template_id : 2,
				reference_id 		: "",
				recurring_id 		: "",
				job_id 				: 0,
				user_id 			: this.get("user_id"),
				employee_id			: banhji.source.get("employee").id,
			   	type				: "Sale_Order",//Required
			   	number 				: "",
			   	sub_total 			: 0,
			   	amount				: 0,
			   	credit_allowed 		: 0,
			   	discount 			: 0,
			   	tax 				: 0,
			   	rate				: 1,
			   	locale 				: banhji.locale,
			   	issued_date 		: new Date(),
			   	due_date 			: duedate,
			   	bill_to 			: "",
			   	ship_to 			: "",
			   	memo 				: "",
			   	memo2 				: "",
			   	status 				: 0,
			   	segments 			: [],
			   	//Recurring
			   	recurring_name 		: "",
			   	start_date 			: new Date(),
			   	frequency 			: "Daily",
			   	month_option 		: "Day",
			   	interval 			: 1,
			   	day 				: 1,
			   	week 				: 0,
			   	month 				: 0,
			   	is_recurring 		: 0,

			   	contact 			: { id:"", name:"" }
	    	});
			
			var obj = this.dataSource.at(0);
			this.set("obj", obj);
			this.setRate();
			this.generateNumber();

			//Default rows
			for (var i = 0; i < banhji.source.defaultLines; i++) {
				this.addRow();
			}
		},
		addRow 				: function(){
			var obj = this.get("obj");

			this.lineDS.add({
				transaction_id 		: obj.id,
				contact_id 			: 0,
				tax_item_id 		: "",
				item_id 			: "",
				assembly_id 		: 0,
				measurement_id 		: 0,
				description 		: "",
				quantity 	 		: 1,
				conversion_ratio 	: 0,
				cost 				: 0,
				price 				: 0,
				amount 				: 0,
				discount 			: 0,
				rate				: obj.rate,
				locale				: obj.locale,
				movement 			: 0,
				required_date 		: "",

				discount_percentage : 0,
				item 				: { id:"", name:"" },
				measurement 		: { measurement_id:"", measurement:"" },
				tax_item 			: { id:"", name:"" },
				contact 			: { id:"", name:"" }
			});
		},
		addExtraRow 		: function(uid){
			var row = this.lineDS.getByUid(uid),
				index = this.lineDS.indexOf(row);

			if(index==this.lineDS.total()-1){
				this.addRow();
			}
		},
		removeEmptyRow 		: function(){
			var raw = this.lineDS.data();
		    var item, i;
		    for(i=raw.length-1; i>=0; i--){
		    	item = raw[i];

		    	if (item.item_id==0) {
			       	this.lineDS.remove(item);
			    }
		    }
	    },
		removeRow 			: function(e){
			var data = e.data;
			if(this.lineDS.total()>1){
				this.lineDS.remove(data);
		        this.changes();
	        }
		},
	    objSync 			: function(){
	    	var dfd = $.Deferred();	        

	    	this.dataSource.sync();
		    this.dataSource.bind("requestEnd", function(e){
		    	if(e.response){				
					dfd.resolve(e.response.results);
				}				  				
		    });
		    this.dataSource.bind("error", function(e){		    		    	
				dfd.reject(e.errorThrown);    				
		    });

		    return dfd;	    		    	
	    },
		save 				: function(){
	    	var self = this, obj = this.get("obj");

	    	obj.set("issued_date", kendo.toString(new Date(obj.issued_date), "s"));
	    	obj.set("due_date", kendo.toString(new Date(obj.due_date), "yyyy-MM-dd"));

	    	//Warning over credit allowed
	        if(obj.credit_limit>0 && obj.amount>obj.credit_allowed){
	        	alert("Over credit allowed!");
	        }

	        this.removeEmptyRow();

	        //Save Draft
	        if(this.get("saveDraft")){
	        	obj.set("status", 4); //In progress
	        	obj.set("progress", "Draft");
	        	obj.set("is_journal", 0);//No Journal
	        }

	        //Recurring
	    	if(this.get("saveRecurring")){
	    		this.set("saveRecurring", false);
	    		
	    		obj.set("number", "");
	    		obj.set("is_recurring", 1);
	    	}

	        //Edit Mode
	    	if(obj.isNew()==false){
	    		//Use draft
	    		if(obj.status==4){
	    			obj.set("status", 0);//Open
	    			obj.set("progress", "");
	    			obj.set("is_journal", 1);//Add Journal
	    		}
	    	}

	    	//Reference
	    	if(obj.reference_id>0){
	    		var ref = this.referenceDS.get(obj.reference_id);
	    		ref.set("status", 1);
	    		this.referenceDS.sync();
	    	}else{
	    		obj.set("reference_id", 0);
	    	}
	    	
			//Save Obj
			this.objSync()
			.then(function(data){ //Success
				if(self.get("isEdit")==false){
					//Item line
					$.each(self.lineDS.data(), function(index, value){
						value.set("transaction_id", data[0].id);
					});

					//Assembly Item line
					$.each(self.assemblyLineDS.data(), function(index, value){
						value.set("transaction_id", data[0].id);
					});

					//Attachment
					$.each(self.attachmentDS.data(), function(index, value){
			    		value.set("transaction_id", data[0].id);
		            });
				}

				self.addPO(data[0].id);
				self.lineDS.sync();
				self.assemblyLineDS.sync();				
				self.uploadFile();
				
				return data;
			}, function(reason) { //Error
				$("#ntf1").data("kendoNotification").error(reason);
			}).then(function(result){
				$("#ntf1").data("kendoNotification").success(banhji.source.successMessage);

				if(self.get("saveDraft") || self.get("saveClose")){
					//Save Draft or Save Close
					self.set("saveDraft", false);
					self.set("saveClose", false);
					self.cancel();
				}else if(self.get("savePrint")){
					//Save Print
					self.set("savePrint", false);
					self.clear();
					if(result[0].transaction_template_id>0){
						banhji.router.navigate("/invoice_form/"+result[0].id);
					}
				}else{
					//Save New
					self.addEmpty();
				}
			});
		},
		clear 				: function(){
			this.dataSource.cancelChanges();
			this.lineDS.cancelChanges();
			this.assemblyLineDS.cancelChanges();
			this.attachmentDS.cancelChanges();
			this.referenceDS.cancelChanges();
			this.poDS.cancelChanges();
			
			this.dataSource.data([]);
			this.lineDS.data([]);
			this.assemblyLineDS.data([]);
			this.attachmentDS.data([]);
			this.referenceDS.data([]);
			this.poDS.data([]);

			banhji.userManagement.removeMultiTask("sale_order");
		},
		cancel 				: function(){
			this.clear();
			window.history.back();
		},
		delete 				: function(){
			var self = this, obj = this.get("obj");
			this.set("showConfirm",false);			
			
	        this.txnDS.query({
	        	filter:[
	        		{ field:"reference_id", value:obj.id },
	        	],
	        	page:1,
	        	pageSize:1
	        }).then(function(){
	        	var view = self.txnDS.view();

	        	if(view.length>0){
	        		alert("Sorry, you can not delete it.");
	        	}else{
	        		obj.set("deleted", 1);

			        self.dataSource.sync();
			        self.dataSource.bind("requestEnd", function(e){
			        	if(e.type==="update"){
			        		window.history.back();
			        	}
			        });
	        	}
	        });		    	    	
		},
		openConfirm 		: function(){
			this.set("showConfirm", true);
		},
		closeConfirm 		: function(){
			this.set("showConfirm", false);
		},
		validating 			: function(){
			var result = true, nonItem = true;

			//Check select non item
			$.each(this.lineDS.data(), function(index, value){
				if(value.item_id>0){
					nonItem = false;
				}
			});
			
			if(nonItem){
				$("#ntf1").data("kendoNotification").error("Please select at least one item!");

				result = false;
			}

			return result;
		},
		//Reference					
		loadReference 		: function(){
			var obj = this.get("obj");

			if(obj.contact_id>0){
				this.set("enableRef", true);

				this.referenceDS.filter([
					{ field: "contact_id", value: obj.contact_id },
					{ field: "status", value: 0 },
					{ field: "type", value: "Quote" },
					{ field: "due_date >=", value: kendo.toString(obj.issued_date, "yyyy-MM-dd") }
				]);
			}else{
				this.set("enableRef", false);
				obj.set("reference_id", "");
			}
		},
		referenceChanges 	: function(){
			var self = this, obj = this.get("obj");

			if(obj.reference_id>0){
				var data = this.referenceDS.get(obj.reference_id);

				obj.set("employee_id", data.employee_id);
				obj.set("reference_no", data.number);
				obj.set("segments", data.segments);
								
			 	this.referenceLineDS.query({
			 		filter:[
			 			{ field: "transaction_id", value: obj.reference_id },
			 			{ field: "assembly_id", value: 0 }
			 		],
			 		page: 1,
			 		pageSize: 100
			 	}).then(function(){
			 		var view = self.referenceLineDS.view();

			 		self.lineDS.data([]);
			 		$.each(view, function(index, value){
			 			self.lineDS.add({					
							transaction_id 		: 0,
							item_id 			: value.item_id,
							tax_item_id 		: value.tax_item_id,
							measurement_id 		: value.measurement_id,							
							description 		: value.description,				
							quantity 	 		: value.quantity,
							cost 				: value.cost,
							price 				: value.price,												
							amount 				: value.amount,
							discount 			: value.discount,
							conversion_ratio 	: value.conversion_ratio,
							rate				: value.rate,
							locale				: value.locale,
							movement 			: 0,
							required_date 		: value.required_date,

							item 				: value.item,
							measurement 		: value.measurement,
							tax_item 			: value.tax_item,
							contact 			: value.contact
						});
			 		});

			 		self.changes();
			 	});
		 	}
		},
		//Recurring		
		loadRecurring 		: function(id){
			var self = this;

			this.recurringDS.query({
				filter:[
					{ field:"id", value:id },
					{ field:"is_recurring", value:1 }
				],
				page: 1,
				pageSize: 100
			}).then(function(){
				var view = self.recurringDS.view(),
				obj = self.get("obj");
				
				obj.set("contact", view[0].contact);
				obj.set("recurring_id", id);
				obj.set("employee_id", view[0].employee_id);//Sale Rep
				obj.set("job_id", view[0].job_id);
				obj.set("segments", view[0].segments);
				obj.set("locale", view[0].locale);
				obj.set("memo", view[0].memo);
				obj.set("memo2", view[0].memo2);
				obj.set("bill_to", view[0].bill_to);
				obj.set("ship_to", view[0].ship_to);

				self.setContact(view[0].contact);
			});

			this.recurringLineDS.query({
				filter:[
					{ field: "transaction_id", value: id },
					{ field: "assembly_id", value: 0 }
				]
			}).then(function(){
				var view = self.recurringLineDS.view();
				self.lineDS.data([]);

				$.each(view, function(index, value){
					self.lineDS.add({
						transaction_id 		: 0,
						tax_item_id 		: value.tax_item_id,
						item_id 			: value.item_id,
						measurement_id 		: value.measurement_id,
						description 		: value.description,
						quantity 	 		: value.quantity,
						cost 				: value.cost,
						price 				: value.price,
						amount 				: value.amount,
						discount 			: value.discount,
						rate				: value.rate,
						locale				: value.locale,
						movement 			: 0,
						required_date 		: value.required_date,

						item 				: value.item,
						measurement 		: value.measurement,
						tax_item 			: value.tax_item
					});
				});

				self.changes();
			});
		},
		frequencyChanges 	: function(){
			var obj = this.get("obj");

			switch(obj.frequency) {
			    case "Daily":
			        this.set("showMonthOption", false);
			        this.set("showMonth", false);
			        this.set("showWeek", false);
			        this.set("showDay", false);
			       
			        break;
			    case "Weekly":
			        this.set("showMonthOption", false);
			        this.set("showMonth", false);
			        this.set("showWeek", true);
			        this.set("showDay", false);

			        break;
			    case "Monthly":
			        this.set("showMonthOption", true);
			        this.set("showMonth", false);
			        this.set("showWeek", false);
			        this.set("showDay", true);

			        break;
			    case "Annually":
			        this.set("showMonthOption", false);
			        this.set("showMonth", true);
			        this.set("showWeek", false);
			        this.set("showDay", true);

			        break;
			    default:
			        //Default here..
			}
		},
		monthOptionChanges 	: function(){
			var obj = this.get("obj");

			switch(obj.month_option) {
			    case "Day":			       
			        this.set("showWeek", false);
			        this.set("showDay", true);
			       
			        break;			    
			    default:			        
			        this.set("showWeek", true);
			        this.set("showDay", false);
			}
		},
		recurringSync 		: function(){
	    	var dfd = $.Deferred();	        

	    	this.recurringDS.sync();
		    this.recurringDS.bind("requestEnd", function(e){
		    	if(e.response){				
					dfd.resolve(e.response.results);
				}				  				
		    });
		    this.recurringDS.bind("error", function(e){		    		    	
				dfd.reject(e.errorThrown);    				
		    });

		    return dfd;	    		    	
	    }
	});
	banhji.customerDeposit =  kendo.observable({
		lang 				: langVM,
		dataSource 			: dataStore(apiUrl + "transactions"),
		txnDS 				: dataStore(apiUrl + "transactions"),
		lineDS  			: dataStore(apiUrl + "account_lines"),
		referenceDS			: dataStore(apiUrl + "transactions"),
		referenceLineDS		: dataStore(apiUrl + "account_lines"),
		recurringDS 		: dataStore(apiUrl + "transactions"),
		recurringLineDS 	: dataStore(apiUrl + "account_lines"),
		journalLineDS		: dataStore(apiUrl + "journal_lines"),
		attachmentDS	 	: dataStore(apiUrl + "attachments"),
		txnTemplateDS 		: new kendo.data.DataSource({
		  	data: banhji.source.txnTemplateList,
		  	filter:{ field: "type", value: "Deposit" }
		}),
		accountDS 			: new kendo.data.DataSource({
		  	data: banhji.source.accountList,
		  	filter: {
	      		logic: "or",
			    filters: [
			      	{ field: "account_type_id", value: 10 },//Cash
			      	{ field: "account_type_id", value: 34 },//Retained Earning
			      	{ field: "account_type_id", value: 36 },//Expense
			      	{ field: "account_type_id", value: 37 },
			      	{ field: "account_type_id", value: 38 },
			      	{ field: "account_type_id", value: 40 },
			      	{ field: "account_type_id", value: 41 },
			      	{ field: "account_type_id", value: 42 },
			      	{ field: "account_type_id", value: 43 }
			    ]
			},
			sort: { field:"number", dir:"asc" }
		}),
		depositAccountDS 	: new kendo.data.DataSource({
		  	data: banhji.source.accountList,
		  	filter: {
	      		logic: "or",
			    filters: [
			      	{ field: "account_type_id", value: 25 },
	      			{ field: "account_type_id", value: 30 }
			    ]
			},
			sort: { field:"number", dir:"asc" }
		}),
		jobDS 				: new kendo.data.DataSource({
		  	data: banhji.source.jobList,
		  	sort: { field: "name", dir: "asc" }
		}),
		segmentItemDS 		: new kendo.data.DataSource({
		  	data: banhji.source.segmentItemList,
		  	sort: [
			  	{ field: "segment_id", dir: "asc" },
			  	{ field: "code", dir: "asc" }
			]
		}),
		contactDS			: banhji.source.customerDS,
		amtDueColor 		: banhji.source.amtDueColor,
	    confirmMessage 		: banhji.source.confirmMessage,
		frequencyList 		: banhji.source.frequencyList,
		monthList 			: banhji.source.monthList,	
		monthOptionList 	: banhji.source.monthOptionList,
		weekDayList 		: banhji.source.weekDayList,
		dayList 			: banhji.source.dayList,
		showMonthOption 	: false,
		showMonth 			: false,
		showWeek 			: false,
		showDay 			: false,
		obj 				: null,
		isEdit 				: false,
		saveClose 			: false,
		savePrint 			: false,
		saveRecurring 		: false,
		showConfirm 		: false,
		notDuplicateNumber  : true,
		statusSrc 			: "",
		recurring 			: "",
		recurring_validate 	: false,
		enableRef 	 		: false,
		total				: 0,
		original_total 		: 0,
		user_id				: banhji.source.user_id,
		pageLoad 			: function(id){
			if(id){
				this.set("isEdit", true);
				this.loadObj(id);
			}else{				
				if(this.get("isEdit") || this.dataSource.total()==0){
					this.addEmpty();
				}
			}
		},
		//Upload
		onSelect 			: function(e){
	        // Array with information about the uploaded files
	        var self = this, 
	        files = e.files,
	        obj = this.get("obj");
			
	        // Check the extension of each file and abort the upload if it is not .jpg
	        $.each(files, function(index, value){
	            if (value.extension.toLowerCase() === ".jpg"
	            	|| value.extension.toLowerCase() === ".jpeg"
	            	|| value.extension.toLowerCase() === ".tiff"
	            	|| value.extension.toLowerCase() === ".png" 
	            	|| value.extension.toLowerCase() === ".gif"
	            	|| value.extension.toLowerCase() === ".pdf"){

	            	var key = 'ATTACH_' + banhji.institute.id + "_" + Math.floor(Math.random() * 100000000000000001) +'_'+ value.name;

	            	self.attachmentDS.add({
	            		user_id 		: self.get("user_id"),
	            		transaction_id 	: obj.id,
	            		type 			: "Transaction",
	            		name 			: value.name,
	            		description 	: "",
	            		key 			: key,
	            		url 			: banhji.s3 + key,
	            		size 			: value.size,
	            		created_at 		: new Date(),

	            		file 			: value.rawFile
	            	});
	            }else{
	            	alert("This type of file is not allowed to attach.");
	            }
	        });
	    },
	    removeFile 			: function(e){
	    	var data = e.data;

	    	if (confirm(banhji.source.confirmMessage)) {
	    		this.attachmentDS.remove(data);
	    	}	    	
	    },
	    uploadFile 			: function(){
	    	$.each(this.attachmentDS.data(), function(index, value){
		    	if(!value.id){
			    	var params = { 
		            	Body: value.file, 
		            	Key: value.key 
		            };
		            bucket.upload(params, function (err, data) {
	                	// console.log(err, data);
	                	// var url = data.Location;
	            	});
	        	}
	        });

	        this.attachmentDS.sync();
	        var saved = false;
	        this.attachmentDS.bind("requestEnd", function(e){
	        	//Delete File
	        	if(e.type=="destroy"){
	            	if(saved==false && e.response){
	            		saved = true;
	            	
	            		var response = e.response.results;
	            		$.each(response, function(index, value){
		            		var params = {
							  	//Bucket: 'STRING_VALUE', /* required */
							 	Delete: { /* required */
								    Objects: [ /* required */
								      	{
									        Key: value.data.key /* required */
								      	}
								      /* more items */
								    ]
							  	}
							};
							bucket.deleteObjects(params, function(err, data) {
							  	//console.log(err, data);
							});
						});
	            	}
	        	}
	        });
	    },
		//Contact
		setContact 			: function(contact){
			var obj = this.get("obj");

		    obj.set("contact", contact);
		    this.contactChanges();
	    },
		contactChanges 		: function(){
			var self = this, obj = this.get("obj");

	    	if(obj.contact){
		    	var contact = obj.contact;

		    	obj.set("contact_id", contact.id);
		    	obj.set("account_id", contact.deposit_account_id);
		    	obj.set("locale", contact.locale);

		    	this.setRate();
		    	this.loadReference();
		    	this.jobDS.filter({ field:"contact_id", value: contact.id });
	    	}

		    this.changes();
	    },
	    employeeChanges 		: function(){
			var obj = this.get("obj");

	    	if(obj.employee){
		    	var employee = obj.employee;
		    	
		    	obj.set("employee_id", employee.id);
	    	}else{
	    		obj.set("employee_id", 0);
	    	}
	    },
		//Currency Rate
		setRate 			: function(){
			var obj = this.get("obj"), 
			rate = banhji.source.getRate(obj.locale, new Date(obj.issued_date));

			obj.set("rate", rate);

			$.each(this.lineDS.data(), function(index, value){
				value.set("rate", rate);
				value.set("locale", obj.locale);
			});
		},
		//Segment
		segmentChanges 		: function(e) {
			var dataArr = this.get("obj").segments,
			lastIndex = dataArr.length - 1,
			last = this.segmentItemDS.get(dataArr[lastIndex]);
			
			if(dataArr.length > 1) {
				for(var i = 0; i < dataArr.length - 1; i++) {
					var current_index = dataArr[i],
					current = this.segmentItemDS.get(current_index);

					if(current.segment_id === last.segment_id) {
						dataArr.splice(lastIndex, 1);
						break;
					}
				}
			}
		},
		//Number      	
		checkExistingNumber 	: function(){
			var self = this, para = [], 
			obj = this.get("obj");
			
			if(obj.number!==""){

				if(obj.isNew()==false){
					para.push({ field:"id", operator:"where_not_in", value: [obj.id] });
				}
				
				para.push({ field:"number", value: obj.number });
				para.push({ field:"type", value: obj.type });

				this.txnDS.query({
					filter: para,
					page: 1,
					pageSize: 1
				}).then(function(e){
					var view = self.txnDS.view();
					
					if(view.length>0){
				 		self.set("notDuplicateNumber", false);
					}else{
						self.set("notDuplicateNumber", true);
					}
				});
			}
		},
		generateNumber 			: function(){
			var self = this, obj = this.get("obj"),
			issueDate = new Date(obj.issued_date),
			startDate = new Date(obj.issued_date),
			endDate = new Date(obj.issued_date);

			this.set("notDuplicateNumber", true);

			startDate.setDate(1);
			startDate.setMonth(0);//Set to January
			endDate.setDate(31);
			endDate.setMonth(11);//Set to November

			this.txnDS.query({
				filter:[
					{ field:"type", value:obj.type },
					{ field:"issued_date >=", value:kendo.toString(startDate, "yyyy-MM-dd") },
					{ field:"issued_date <=", value:kendo.toString(endDate, "yyyy-MM-dd") }
				],
				sort: { field:"number", dir:"desc" },
				page:1,
				pageSize:1
			}).then(function(){
				var view = self.txnDS.view(),
				number = 0, str = "";

				if(view.length>0){
					str = view[0].number;
					str = str.substring(str.length-4, str.length);
					number = kendo.parseInt(str);
				}
				
				number++;
				str = banhji.source.getPrefixAbbr(obj.type) + kendo.toString(issueDate, "yy") + kendo.toString(issueDate, "MM") + kendo.toString(number, "00000");
				
				obj.set("number", str);
			});
		},
		//Obj
		loadObj 			: function(id){
			var self = this, para = [];

			para.push({ field:"id", value: id });

			if(this.get("recurring")=="use"){
				this.set("recurring","");
				this.addEmpty();
				this.loadRecurring(id);
			}else{
				if(this.get("recurring")=="edit"){
					this.set("recurring","");
					para.push({ field:"is_recurring", value: 1 });
				}

				this.dataSource.query({
					filter: para,
					page: 1,
					pageSize: 1
				}).then(function(e){
					var view = self.dataSource.view();

					self.set("obj", view[0]);
					self.set("original_total", view[0].amount);
					self.set("total", kendo.toString(view[0].amount, "c", view[0].locale));
					
					self.lineDS.filter({ field: "transaction_id", value: id });				
					self.journalLineDS.filter({ field: "transaction_id", value: id });
					self.referenceDS.filter({ field: "id", value: view[0].reference_id });
				});
			}
		},
		changes				: function(){
			var obj = this.get("obj");
			
			if(this.lineDS.total()>0){
				var sum = 0;
				
				$.each(this.lineDS.data(), function(index, value) {
					sum += value.amount;
		        });

		        this.set("total", kendo.toString(sum, "c", obj.locale));
		        obj.set("amount", sum);
	    	}else{
	    		this.set("total", 0);
		        obj.set("amount", 0);
	    	}
		},
		addEmpty 		 	: function(){
			this.dataSource.data([]);
			this.lineDS.data([]);
			this.attachmentDS.data([]);
			this.journalLineDS.data([]);

			this.set("isEdit", false);
			this.set("obj", null);
			this.set("total", 0);

			this.dataSource.insert(0, {
				contact_id 				: "",
				transaction_template_id : 7,
				recurring_id 			: "",
				reference_id	 		: "",
				account_id 				: "",
				employee_id 			: banhji.source.get("employee").id,
				user_id 				: this.get("uer_id"),
			   	type					: "Customer_Deposit", //required
			   	number 					: "",
			   	amount					: 0,
			   	rate					: 1,
			   	locale 					: banhji.locale,
			   	issued_date 			: new Date(),
			   	memo 					: "",
			   	memo2 					: "",
			   	segments 				: [],
			   	is_journal 				: 1,
			   	//Recurring
			   	recurring_name 			: "",
			   	start_date 				: new Date(),
			   	frequency 				: "Daily",
			   	month_option 			: "Day",
			   	interval 				: 1,
			   	day 					: 1,
			   	week 					: 0,
			   	month 					: 0,
			   	is_recurring 			: 0,

			   	contact					: { id:"", name:"" }
	    	});

			var obj = this.dataSource.at(0);
			this.set("obj", obj);

			this.setRate();
			this.addRow();
			this.generateNumber();
		},
		addRow 				: function(){
			var obj = this.get("obj");
			this.lineDS.add({
				transaction_id 		: obj.id,
				account_id 			: "",
				description 		: "",
				reference_no 		: "",
				amount 	 			: 0,
				rate				: obj.rate,
				locale				: obj.locale
			});
		},
		removeRow  			: function(e){
			var data = e.data;
			if(this.lineDS.total()>1){
				this.lineDS.remove(data);
		        this.changes();
	        }
		},
		objSync 			: function(){
	    	var dfd = $.Deferred();	        

	    	this.dataSource.sync();
		    this.dataSource.bind("requestEnd", function(e){
		    	if(e.response){
					dfd.resolve(e.response.results);
				}
		    });
		    this.dataSource.bind("error", function(e){
				dfd.reject(e.errorThrown);
		    });

		    return dfd;
	    },
		save 				: function(){
	    	var self = this, obj = this.get("obj");
	    	obj.set("issued_date", kendo.toString(new Date(obj.issued_date), "s"));

	    	//Recurring
	    	if(this.get("saveRecurring")){
	    		this.set("saveRecurring", false);

	    		obj.set("number", "");
	    		obj.set("is_recurring", 1);
	    	}

	    	//Mode
	    	if(obj.isNew()==false){
	    		//Line has changed
		    	if(this.lineDS.hasChanges() && obj.is_recurring==0){
			    	$.each(this.journalLineDS.data(), function(index, value){
						value.set("deleted", 1);
					});

					this.addJournal(obj.id);
		    	}
	    	}

	    	//Reference
	    	if(obj.reference_id>0){
				var ref = this.referenceDS.get(obj.reference_id);
				ref.set("deposit", obj.amount);
				this.referenceDS.sync();
			}else{
				obj.set("reference_id", 0);
			}

			//Save Obj
			this.objSync()
			.then(function(data){ //Success
				if(self.get("isEdit")==false){
					//Item line
					$.each(self.lineDS.data(), function(index, value){
						value.set("transaction_id", data[0].id);
					});

					//Attachment
					$.each(self.attachmentDS.data(), function(index, value){
			    		value.set("transaction_id", data[0].id);
		            });

					//Journal
					if(data[0].is_recurring==0){
			            self.addJournal(data[0].id);
			        }
				}

				self.lineDS.sync();
				self.uploadFile();
				
				return data;
			}, function(reason) { //Error
				$("#ntf1").data("kendoNotification").error(reason);
			}).then(function(result){
				$("#ntf1").data("kendoNotification").success(banhji.source.successMessage);

				if(self.get("saveClose")){
					//Save Close
					self.set("saveClose", false);
					self.cancel();
					window.history.back();
				}else if(self.get("savePrint")){
					//Save Print
					self.set("savePrint", false);
					self.cancel();
					if(result[0].transaction_template_id>0){
						banhji.router.navigate("/invoice_form/"+result[0].id);
					}
				}else{
					//Save New
					self.addEmpty();
				}
			});
		},
		cancel 				: function(){
			this.dataSource.cancelChanges();
			this.lineDS.cancelChanges();
			this.attachmentDS.cancelChanges();

			this.dataSource.data([]);
			this.lineDS.data([]);
			this.attachmentDS.data([]);

			banhji.userManagement.removeMultiTask("customer_deposit");
		},
		delete 				: function(){
			var self = this, obj = this.get("obj");
			this.set("showConfirm",false);

	        this.txnDS.query({
	        	filter:[
	        		{ field:"reference_id", value:obj.id }
	        	],
	        	page:1,
	        	pageSize:1
	        }).then(function(){
	        	var view = self.txnDS.view();

	        	if(view.length>0){
	        		alert("Sorry, you can not delete it.");
	        	}else{
	        		obj.set("deleted", 1);
			        
			        self.dataSource.sync();
			        self.dataSource.bind("requestEnd", function(e){
			        	if(e.type==="update"){
			        		window.history.back();
			        	}
			        });
	        	}
	        });
		},
		openConfirm 		: function(){
			this.set("showConfirm", true);
		},
		closeConfirm 		: function(){
			this.set("showConfirm", false);
		},
		validating 			: function(){
			var result = true, nonItem = true;

			//Check select non item
			$.each(this.lineDS.data(), function(index, value){
				if(value.account_id>0){
					nonItem = false;
				}
			});

			if(nonItem){
				$("#ntf1").data("kendoNotification").error("Please select at least one account!");

				result = false;
			}

			return result;
		},
		//Journal
		addJournal 			: function(transaction_id){
	    	var self = this,
	    	sum = 0,
	    	obj = this.get("obj");

			//Cash account on DR
			$.each(this.lineDS.data(), function(index, value){
				sum += value.amount;

				self.journalLineDS.add({
					transaction_id 		: transaction_id,
					account_id 			: value.account_id,
					contact_id 			: value.contact_id,
					description 		: "",
					reference_no 		: value.reference_no,
					segments 	 		: obj.segments,
					dr 	 				: value.amount,
					cr 					: 0,
					rate				: value.rate,
					locale				: value.locale
				});
			});

			//Deposit on CR
			this.journalLineDS.add({
				transaction_id 		: transaction_id,
				account_id 			: obj.account_id,
				contact_id 			: obj.contact_id,
				description 		: "",
				reference_no 		: "",
				segments 	 		: obj.segments,
				dr 	 				: 0,
				cr 					: sum,
				rate				: obj.rate,
				locale				: obj.locale
			});

			this.journalLineDS.sync();
		},
		//Reference
		loadReference 		: function(){
			var obj = this.get("obj");

			if(obj.contact_id>0){
				this.set("enableRef", true);

				this.referenceDS.filter([
					{ field: "contact_id", value: obj.contact_id },
					{ field: "status", value: 0 },
					{ field: "deposit", value: 0 },
					{ field: "type", value: "Sale_Order" },
					{ field: "due_date >=", value: kendo.toString(obj.issued_date, "yyyy-MM-dd") }
				]);
			}else{
				this.set("enableRef", false);
				obj.set("reference_id", "");
			}
		},
		referenceChanges 	: function(){
			var obj = this.get("obj");

			if(obj.reference_id>0){
				var data = this.referenceDS.get(obj.reference_id);

				obj.set("reference_no", data.number);
				obj.set("segments", data.segments);
				obj.set("amount", data.amount);

				this.lineDS.data([]);
				this.lineDS.add({
					transaction_id 		: obj.id,
					account_id 			: "",
					description 		: "",
					reference_no 		: data.number,
					amount 	 			: data.amount,
					conversion_ratio 	: data.conversion_ratio,
					rate				: data.rate,
					locale				: data.locale
				});
			 	this.set("total", kendo.toString(data.amount, "c", data.locale));
		 	}
		},
		//Recurring
		loadRecurring 		: function(id){
			var self = this;

			this.recurringDS.query({
				filter:[
					{ field:"id", value:id },
					{ field:"is_recurring", value:1 }
				],
				page: 1,
				pageSize: 100
			}).then(function(){
				var view = self.recurringDS.view(),
				obj = self.get("obj");

				obj.set("contact", view[0].contact);
				obj.set("contact_id", view[0].contact.id);
				obj.set("recurring_id", id);
				obj.set("employee_id", view[0].employee_id);//Sale Rep
				obj.set("job_id", view[0].job_id);
				obj.set("segments", view[0].segments);
				obj.set("locale", view[0].locale);
				obj.set("memo", view[0].memo);
				obj.set("memo2", view[0].memo2);
				obj.set("bill_to", view[0].bill_to);
				obj.set("ship_to", view[0].ship_to);

				// self.setContact(view[0].contact);
			});

			this.recurringLineDS.query({
				filter: { field:"transaction_id", value:id },
				page: 1,
				pageSize: 100
			}).then(function(){
				var view = self.recurringLineDS.view();
				self.lineDS.data([]);

				$.each(view, function(index, value){
					self.lineDS.add({
						transaction_id 		: 0,
						account_id 			: value.account_id,
						description 		: value.description,
						reference_no 		: value.reference_no,
						amount 	 			: value.amount,
						rate				: value.rate,
						locale				: value.locale
					});
				});

				self.changes();
			});
		},
		frequencyChanges 	: function(){
			var obj = this.get("obj");

			switch(obj.frequency) {
			    case "Daily":
			        this.set("showMonthOption", false);
			        this.set("showMonth", false);
			        this.set("showWeek", false);
			        this.set("showDay", false);

			        break;
			    case "Weekly":
			        this.set("showMonthOption", false);
			        this.set("showMonth", false);
			        this.set("showWeek", true);
			        this.set("showDay", false);

			        break;
			    case "Monthly":
			        this.set("showMonthOption", true);
			        this.set("showMonth", false);
			        this.set("showWeek", false);
			        this.set("showDay", true);

			        break;
			    case "Annually":
			        this.set("showMonthOption", false);
			        this.set("showMonth", true);
			        this.set("showWeek", false);
			        this.set("showDay", true);

			        break;
			    default:
			        //Default here..
			}
		},
		monthOptionChanges 	: function(){
			var obj = this.get("obj");

			switch(obj.month_option) {
			    case "Day":
			        this.set("showWeek", false);
			        this.set("showDay", true);
			       
			        break;
			    default:
			        this.set("showWeek", true);
			        this.set("showDay", false);
			}
		},
		recurringSync 		: function(){
	    	var dfd = $.Deferred();	        

	    	this.recurringDS.sync();
		    this.recurringDS.bind("requestEnd", function(e){
		    	if(e.response){
					dfd.resolve(e.response.results);
				}
		    });
		    this.recurringDS.bind("error", function(e){
				dfd.reject(e.errorThrown);
		    });

		    return dfd;
	    }
	});
	banhji.cashSale =  kendo.observable({
		lang 				: langVM,
		dataSource 			: dataStore(apiUrl + "transactions"),
		lineDS  			: dataStore(apiUrl + "item_lines"),
		assemblyLineDS  	: dataStore(apiUrl + "item_lines"),
		txnDS 				: dataStore(apiUrl + "transactions"),
		numberDS 			: dataStore(apiUrl + "transactions/number"),
		balanceDS 			: dataStore(apiUrl + "transactions/balance"),
		journalLineDS		: dataStore(apiUrl + "journal_lines"),
		recurringDS 		: dataStore(apiUrl + "transactions"),
		recurringLineDS 	: dataStore(apiUrl + "item_lines"),
		referenceDS			: dataStore(apiUrl + "transactions"),
		referenceLineDS		: dataStore(apiUrl + "item_lines"),
		depositDS  			: dataStore(apiUrl + "transactions"),
		attachmentDS	 	: dataStore(apiUrl + "attachments"),
		itemDS 				: dataStore(apiUrl + "items"),
		itemPriceDS			: dataStore(apiUrl + "item_prices"),
		assemblyDS			: dataStore(apiUrl + "item_assemblies"),
		wacDS				: dataStore(apiUrl + "items/weighted_average_costing"),
		segmentDS 			: dataStore(apiUrl + "segments"),
		segItemDS 			: dataStore(apiUrl + "segments/item"),
		segmentItemDS 		: dataStore(apiUrl + "segments/item"),
		typeList  			: new kendo.data.DataSource({
		  	data: banhji.source.prefixList,
		  	filter:{
			    logic: "or",
			    filters: [
			      	{ field: "type", value: "Commercial_Cash_Sale" },
			      	{ field: "type", value: "Vat_Cash_Sale" },
			      	{ field: "type", value: "Cash_Sale" }
			    ]
			}
		}),
		txnTemplateDS 		: new kendo.data.DataSource({
		  	data: banhji.source.txnTemplateList,
		  	filter:{
			    logic: "or",
			    filters: [
			      	{ field: "type", value: "Commercial_Cash_Sale" },
			      	{ field: "type", value: "Vat_Cash_Sale" },
			      	{ field: "type", value: "Cash_Sale" }
			    ]
			}
		}),
		cashAccountDS  		: new kendo.data.DataSource({
		  	data: banhji.source.accountList,
		  	filter:{ field:"account_type_id", value: 10 },
		  	sort: { field:"number", dir:"asc" }
		}),
		discountAccountDS 	: new kendo.data.DataSource({
		  	data: banhji.source.accountList,
		  	filter: { field:"id", value: 72 },
		  	sort: { field:"number", dir:"asc" }
		}),
		jobDS 				: new kendo.data.DataSource({
		  	data: banhji.source.jobList,
		  	sort: { field: "name", dir: "asc" }
		}),
		categoryDS 			: new kendo.data.DataSource({
		  	data: banhji.source.categoryList,
		  	filter: [
		  		{ field:"item_type_id", value: 1 },
		  		{ field:"id", operator:"neq", value: 5 },
		  		{ field:"id", operator:"neq", value: 6 }
		  	]
		}),
		itemGroupDS 		: banhji.source.itemGroupDS,
		employeeDS  		: banhji.source.employeeDS,
		contactDS  			: banhji.source.customerDS,
		statusObj 			: banhji.source.statusObj,		
		paymentMethodDS 	: banhji.source.paymentMethodDS,
		amtDueColor 		: banhji.source.amtDueColor,
	    confirmMessage 		: banhji.source.confirmMessage,
		frequencyList 		: banhji.source.frequencyList,
		monthOptionList 	: banhji.source.monthOptionList,
		monthList 			: banhji.source.monthList,
		weekDayList 		: banhji.source.weekDayList,
		dayList 			: banhji.source.dayList,
		showMonthOption 	: false,
		showMonth 			: false,
		showWeek 			: false,
		showDay 			: false,
		obj 				: null,
		isEdit 				: false,
		saveDraft 			: false,
		saveClose 			: false,
		savePrint 			: false,
		saveRecurring 		: false,
		showConfirm 		: false,
		notDuplicateNumber  : true,
		recurring 			: "",
		recurring_validate 	: false,
		reference_id 		: 0,
		balance 			: 0,
		total_deposit		: 0,
		total 				: 0,
		amount_due 			: 0,
		barcode 			: "",
		barcodeVisible 		: false,
		category_id 		: 0,
		item_group_id 		: 0,
		segment_id 			: "",
		segmentitem_id 		: "",
		user_id				: banhji.source.user_id,
		pageLoad 			: function(id){
			if(id){
				this.set("isEdit", true);
				this.loadObj(id);
			}else{				
				if(this.get("isEdit") || this.dataSource.total()==0){
					this.addEmpty();
				}
			}
		},
		loadData 			: function(){
			var obj = this.get("obj");

			this.setRate();
	    	this.loadDeposit();
	    	this.loadBalance();
	    	this.loadReference();
		},
		//Barcode
		search 				: function(){
			var self = this, para = [],
				obj = this.get("obj"),
				category_id = this.get("category_id"),
				item_group_id = this.get("item_group_id");

			if(item_group_id>0){
				para.push({ field:"number", value:item_group_id });
			}else{
				if(category_id>0){
					para.push({ field:"category_id", value:category_id });
				}
			}

			this.itemDS.query({
				filter: para,
				page:1,
				pageSize: 10
			});
			
			this.set("category_id", 0);
			this.set("item_group_id", 0);
		},
		searchByBarcode		: function(){
			var self = this, para = [],
				obj = this.get("obj"),
				barcode = this.get("barcode");

			if(barcode!==""){
				this.itemDS.query({
					filter: { field: "barcode", value: barcode },
					page:1,
					pageSize: 1
				}).then(function(){
					var view = self.itemDS.view();

					if(view.length>0){
						self.insertItem(view[0]);
					}
				});

				this.set("barcode", "");
			}
		},
		addSearchItem		: function(e){
			var data = e.data;

			this.insertItem(data);
		},
		openBarcodeWindow 	: function(){
			this.set("barcodeVisible", true);
		},
		closeBarcodeWindow 	: function(){
			this.set("barcodeVisible", false);
		},
		insertItem 		: function(data){
			var self = this, 
				obj = this.get("obj"),
				rate = obj.rate / banhji.source.getRate(data.locale, new Date(obj.issued_date));

			//Get cost
			this.wacDS.query({
				filter:[
					{ field:"item_id", value: data.id },
					{ field:"issued_date <=", operator:"where_related_transaction", value: kendo.toString(new Date(obj.issued_date),"yyyy-MM-dd  HH:mm:ss") }
				]
			}).then(function(){
	        	var wac = self.wacDS.view();
	        	
	        	var item_price = { 
        			measurement_id 	: data.measurement_id,
        			price 			: kendo.parseFloat(data.price),
        			conversion_ratio: 1, 
        			measurement 	: data.measurement.name 
        		};

	        	self.lineDS.insert(0, {
					transaction_id 		: obj.id,
					tax_item_id 		: 0,
					item_id 			: data.id,
					assembly_id 		: 0,
					measurement_id 		: data.measurement_id,
					description 		: data.sale_description,
					quantity 	 		: 1,
					conversion_ratio 	: 1,
					cost 				: wac[0].cost * rate,
					price 				: data.price,
					amount 				: data.price,
					discount 			: 0,
					discount_percentage : 0,
					tax 				: 0,
					rate				: rate,
					locale				: data.locale,
					movement 			: -1,
					reference_no  		: "",

					item 				: data,
					item_price 			: item_price,
					tax_item 			: { id:"", name:"" }
				});
			});
		},
		//Upload
		onSelect 			: function(e){
	        // Array with information about the uploaded files
	        var self = this, 
	        files = e.files,
	        obj = this.get("obj");

	        // Check the extension of each file and abort the upload if it is not .jpg
	        $.each(files, function(index, value){
	            if (value.extension.toLowerCase() === ".jpg"
	            	|| value.extension.toLowerCase() === ".jpeg"
	            	|| value.extension.toLowerCase() === ".tiff"
	            	|| value.extension.toLowerCase() === ".png" 
	            	|| value.extension.toLowerCase() === ".gif"
	            	|| value.extension.toLowerCase() === ".pdf"){

	            	var key = 'ATTACH_' + banhji.institute.id + "_" + Math.floor(Math.random() * 100000000000000001) +'_'+ value.name;

	            	self.attachmentDS.add({
	            		user_id 		: self.get("user_id"),
	            		transaction_id 	: obj.id,
	            		type 			: "Transaction",
	            		name 			: value.name,
	            		description 	: "",
	            		key 			: key,
	            		url 			: banhji.s3 + key,
	            		size 			: value.size,
	            		created_at 		: new Date(),

	            		file 			: value.rawFile
	            	});
	            }else{
	            	alert("This type of file is not allowed to attach.");
	            }
	        });
	    },
	    removeFile 			: function(e){
	    	var data = e.data;

	    	if (confirm(banhji.source.confirmMessage)) {
	    		this.attachmentDS.remove(data);
	    	}	    	
	    },
	    uploadFile 			: function(){
	    	$.each(this.attachmentDS.data(), function(index, value){
		    	if(!value.id){
			    	var params = { 
		            	Body: value.file, 
		            	Key: value.key 
		            };
		            bucket.upload(params, function (err, data) {
	                	// console.log(err, data);
	                	// var url = data.Location;                
	            	});
	        	}
	        });

	        this.attachmentDS.sync();
	        var saved = false;
	        this.attachmentDS.bind("requestEnd", function(e){
	        	//Delete File
	        	if(e.type=="destroy"){
	            	if(saved==false && e.response){
	            		saved = true;

	            		var response = e.response.results;
	            		$.each(response, function(index, value){
		            		var params = {
							  	//Bucket: 'STRING_VALUE', /* required */
							 	Delete: { /* required */
								    Objects: [ /* required */
								      	{
									        Key: value.data.key /* required */
								      	}
								      /* more items */
								    ]
							  	}
							};
							bucket.deleteObjects(params, function(err, data) {
							  	//console.log(err, data);
							});
						});
	            	}
	        	}
	        });
	    },
		//Deposit
		loadDeposit 		: function(){
			var self = this, obj = this.get("obj");

			//Deposits on Edit Mode
			if(this.get("isEdit")){
				this.depositDS.filter([
					{ field:"type", value:"Customer_Deposit" },
					{ field:"reference_id", value:obj.id }
				]);
			}

			if(obj.contact_id>0){
		    	this.txnDS.query({
		    		filter:[
		    			{ field:"amount", operator:"select_sum", value:"amount" },
		    			{ field:"contact_id", value: obj.contact_id },
		    			{ field:"type", value: "Customer_Deposit" }
		    		]
		    	}).then(function(){
		    		var view = self.txnDS.view();

		    		self.set("total_deposit", view[0].amount + obj.deposit);
		    	});
	    	}
		},
		addDeposit 			: function(id){
			var obj = this.get("obj");
			
			this.depositDS.data([]);

			if(obj.deposit>0){
				this.depositDS.add({
					contact_id 			: obj.contact_id,
					reference_id 		: id,
					user_id 			: this.get("user_id"),
				   	type				: "Customer_Deposit",
				   	amount				: obj.deposit*-1,
				   	rate				: obj.rate,
				   	locale 				: obj.locale,
				   	issued_date 		: obj.issued_date
		    	});
			}
		},
		saveDeposit 		: function(id){
			var obj = this.get("obj");
			
    		if(this.get("isEdit")){
    			if(this.depositDS.total()>0){
					var deposit = this.depositDS.at(0);
					deposit.set("amount", obj.deposit*-1);
				}else{
					this.addDeposit(id);
				}
    		}else{
				this.addDeposit(id);
    		}

			this.depositDS.sync();
		},
		//Contact
		setContact 		: function(contact){
			var obj = this.get("obj");

		    obj.set("contact", contact);
		    this.contactChanges();
	    },
		contactChanges 		: function(){
			var self = this, obj = this.get("obj");

	    	if(obj.contact){
		    	var contact = obj.contact;
		    	
		    	obj.set("contact_id", contact.id);
		    	obj.set("discount_account_id", contact.trade_discount_id);
		    	obj.set("payment_method_id", contact.payment_method_id);
		    	obj.set("locale", contact.locale);
		    	obj.set("bill_to", contact.bill_to);
		    	obj.set("ship_to", contact.ship_to);

		    	this.loadData();
		    	this.jobDS.filter({ field:"contact_id", value: contact.id });
	    	}
	    	
		    this.changes();
	    },
	    employeeChanges 		: function(){
			var obj = this.get("obj");

	    	if(obj.employee){
		    	var employee = obj.employee;
		    	
		    	obj.set("employee_id", employee.id);
	    	}else{
	    		obj.set("employee_id", 0);
	    	}
	    },
	    loadBalance 		: function(){
			var self = this, obj = this.get("obj");

			this.balanceDS.query({
				filter:[
					{ field:"contact_id", value:obj.contact_id },
					{ field:"type", operator:"where_in", value:["Commercial_Invoice", "Vat_Invoice", "Invoice"] }
				]
		    }).then(function(){
		    	var view = self.balanceDS.view(),
		  			contact = obj.contact, 
					balance = view[0].amount,
					creditAllowed = 0;

		    	if(contact.credit_limit > balance){
					creditAllowed = contact.credit_limit - balance;
				}

		    	self.set("balance", kendo.toString(balance, "c", obj.locale));
		    	obj.set("credit_allowed", creditAllowed);
			});
		},
	    //Currency Rate
		setRate 			: function(){
			var obj = this.get("obj"), 
			rate = banhji.source.getRate(obj.locale, new Date(obj.issued_date));
			
			obj.set("rate", rate);

			//Item Lines
			$.each(this.lineDS.data(), function(index, value){
				var itemRate = rate / banhji.source.getRate(value.locale, new Date(obj.issued_date));
				value.set("rate", itemRate);
			});

			//Assembly Lines
			$.each(this.assemblyLineDS.data(), function(index, value){
				var itemRate = rate / banhji.source.getRate(value.locale, new Date(obj.issued_date));
				value.set("rate", itemRate);
			});

			//Deposit
			$.each(this.depositDS.data(), function(index, value){
				var itemRate = rate / banhji.source.getRate(value.locale, new Date(obj.issued_date));
				value.set("rate", itemRate);
			});
		},
		//Segment	
	    addSegmentItem 		: function(){
			var obj = this.get("obj"),
				notExisting = true,
				segment_id = this.get("segment_id"),
				segmentitem_id = this.get("segmentitem_id");

			if(segment_id && segmentitem_id){
				$.each(this.segmentItemDS.data(), function(index, value){
					if(value.segment_id==segment_id){
						notExisting = false;

						return false;
					}
				});

				if(notExisting){
					var segments = this.segmentDS.get(segment_id),
						segmentitems = this.segItemDS.get(segmentitem_id);

					this.segmentItemDS.add({
						id : segmentitems.id,
						segment_id: segment_id,
						code: segmentitems.code,
						name: segmentitems.name,
						segment: { id : segment_id, name : segments.name}
					});
				}else{
					$("#ntf1").data("kendoNotification").warning("This segment is already selected!");
				}
			}

			this.set("segment_id", ""),
			this.set("segmentitem_id", "");
		},
		//Item
		addItem 			: function(uid){
			var self = this,
				row = this.lineDS.getByUid(uid),
				obj = this.get("obj"),
				item = row.item,
				rate = obj.rate / banhji.source.getRate(item.locale, new Date(obj.issued_date));

			row.set("item_id", item.id);
			row.set("description", item.sale_description);
			row.set("rate", rate);
			row.set("locale", item.locale);

			//Item base price
			var item_price = { 
    			measurement_id 	: item.measurement_id,
    			price 			: kendo.parseFloat(item.price),
    			conversion_ratio: 1, 
    			measurement 	: item.measurement.name
    		};
    		row.set("item_price", item_price);

			//Get cost
			this.wacDS.query({
				filter:[
					{ field:"item_id", value: item.id },
					{ field:"issued_date <=", operator:"where_related_transaction", value: kendo.toString(new Date(obj.issued_date),"yyyy-MM-dd  HH:mm:ss") }
				]
			}).then(function(){
	        	var wac = self.wacDS.view();
	        	row.set("cost", wac[0].cost * rate);
			});
		},
		addItemCatalog 		: function(uid){
			var self = this,
				row = this.lineDS.getByUid(uid),
				obj = this.get("obj"),
				item = row.item;

			this.lineDS.remove(row);

        	$.each(item.catalogs, function(index, value){
				var catalogItem = banhji.source.itemDS.get(value);

				if(catalogItem){
					var rate = obj.rate / banhji.source.getRate(catalogItem.locale, new Date(obj.issued_date));

					self.lineDS.add({
						transaction_id 		: obj.id,
						tax_item_id 		: 0,
						item_id 			: catalogItem.id,
						measurement_id 		: 0,
						description 		: catalogItem.sale_description,
						quantity 	 		: 1,
						conversion_ratio 	: 1,
						cost 				: catalogItem.cost * rate,
						price 				: 0,
						amount 				: 0,
						discount 			: 0,
						rate				: rate,
						locale				: catalogItem.locale,
						movement 			: -1,

						discount_percentage : 0,
						item 				: catalogItem,
						measurement 		: { measurement_id:"", measurement:"" },
						tax_item 			: { id:"", name:"" }
					});
				}
			});
		},
		addItemAssembly 	: function(uid){
			var self = this,
				row = this.lineDS.getByUid(uid),
				obj = this.get("obj"),
				item = row.item,
				rate = obj.rate / banhji.source.getRate(item.locale, new Date(obj.issued_date));

			var notExist = true;
			$.each(this.assemblyLineDS.data(), function(index, value){
				if(value.assembly_id==item.id){
					notExist = false;

					return false;
				}
			});

			if(notExist){
				row.set("item_id", item.id);
	    		row.set("description", item.sale_description);
		        row.set("rate", rate);
		        row.set("locale", item.locale);

		        var measurement = { 
        			measurement_id 	: item.measurement_id,
        			price 			: kendo.parseFloat(item.price * rate),
        			conversion_ratio: 1, 
        			measurement 	: item.measurement.name 
        		};
        		row.set("measurement", measurement);

		        this.assemblyDS.query({
		        	filter:{ field:"assembly_id", value:row.item_id }
		        }).then(function(){
		        	var view = self.assemblyDS.view();

		        	$.each(view, function(index, value){
		        		var itemAssembly = value.item, 
		        			itemAssemblyRate = obj.rate / banhji.source.getRate(itemAssembly.locale, new Date(obj.issued_date));

						self.assemblyLineDS.add({
							transaction_id 		: obj.id,
							item_id 			: value.item_id,
							assembly_id 		: value.assembly_id,
							measurement_id 		: value.measurement_id,
							description 		: itemAssembly.sale_description,
							quantity 	 		: value.quantity,
							conversion_ratio 	: value.conversion_ratio,
							cost 				: value.cost,
							rate				: itemAssemblyRate,
							locale				: itemAssembly.locale,
							movement 			: -1,

							item 				: itemAssembly
						});
			        });
		        });
	    	}else{
	    		alert("Duplicate Item Assembly!");
	    		row.set("item_id", 0);
	    		row.set("item", { id:"", name:"" });
	    	}
		},
		changes				: function(){
			var self = this, obj = this.get("obj"),
				total = 0, subTotal = 0, discount =0, tax = 0, remaining = 0, amount_due = 0, itemIds = [];

			$.each(this.lineDS.data(), function(index, value) {
				var amt = value.quantity * value.price;
				subTotal += amt;

				//Discount by line
				if(value.discount>0){
					amt -= value.discount;
					discount += value.discount;
				}

				//Tax by line
				if(value.tax_item_id>0){
					var taxAmount = amt * value.tax_item.rate;
					tax += taxAmount;
					value.set("tax", taxAmount);
				}else{
					value.set("tax", 0);
				}

				value.set("amount", amt);

				if(value.item_id>0){
					itemIds.push(value.item_id);
				}
	        });

	    	//Total
	        total = (subTotal + tax) - discount;

	        //Apply Deposit
	        if(obj.deposit>0){
	        	if(obj.deposit <= this.get("total_deposit")){
		        	if(obj.deposit <= total){
		        		remaining = total - obj.deposit;
		        	}else{
		        		obj.set("deposit", total);
		        	}
		        }else{
		        	obj.set("deposit", 0);
	        		alert("Over deposit to apply!");
	        	}

	        	//Status
		        if(remaining==0){
		    		obj.set("status", 1);
		    	}else if(remaining==total){
		    		obj.set("status", 0);
		    	}else{
		    		obj.set("status", 2);
		    	}
	        }

	        //Warning over credit allowed
	        if(obj.credit_allowed>0 && total>obj.credit_allowed){
	        	this.set("amtDueColor", "Gold");
	        }else{
	        	this.set("amtDueColor", banhji.source.amtDueColor);
	        }

	        amount_due = total - obj.deposit;

	        obj.set("sub_total", subTotal);
	        obj.set("discount", discount);
	        obj.set("tax", tax);
			obj.set("amount", total);
			obj.set("remaining", remaining);

			this.set("total", kendo.toString(total, "c", obj.locale));
	        this.set("amount_due", kendo.toString(amount_due, "c", obj.locale));
	    	
	    	//Remove Assembly Item List
			var raw = this.assemblyLineDS.data();
		    var item, i;
		    for(i=raw.length-1; i>=0; i--){
		    	item = raw[i];

		    	if (jQuery.inArray(kendo.parseInt(item.assembly_id), itemIds)==-1) {
			       	this.assemblyLineDS.remove(item);
			    }
		    }
		},
		lineDSChanges 		: function(arg){
			var self = banhji.cashSale;

			if(arg.field){
				if(arg.field=="item"){
					var dataRow = arg.items[0],
						item = dataRow.item;

					if(item.is_catalog=="1"){
						self.addItemCatalog(dataRow.uid);
					}else if(item.is_assembly=="1"){
						self.addItemAssembly(dataRow.uid);
					}else{
						self.addItem(dataRow.uid);
					}

					self.addExtraRow(dataRow.uid);
				}else if(arg.field=="quantity" || arg.field=="price" || arg.field=="discount"){
					self.changes();
				}else if(arg.field=="item_price"){
					var dataRow = arg.items[0];
					
					dataRow.set("measurement_id", dataRow.item_price.measurement_id);
			        dataRow.set("price", dataRow.item_price.price * dataRow.rate);
			        dataRow.set("conversion_ratio", dataRow.item_price.conversion_ratio);
			    }else if(arg.field=="discount_percentage"){
			    	var dataRow = arg.items[0],
			    		percentageAmount = dataRow.quantity * dataRow.price * dataRow.discount_percentage;

			    	dataRow.set("discount", percentageAmount);
				}else if(arg.field=="tax_item"){
					var dataRow = arg.items[0];
					
					dataRow.set("tax_item_id", dataRow.tax_item.id);
					dataRow.set("tax", 0);

					self.changes();
				}
			}
		},
		typeChanges 		: function(){
			var obj = this.get("obj");

			$.each(this.txnTemplateDS.data(), function(index, value){
				if(value.type==obj.type){
					obj.set("transaction_template_id", value.id);

					return false;
				}
			});
		},
		//Number
		checkExistingNumber 	: function(){
			var self = this, para = [], 
			obj = this.get("obj");
			
			if(obj.number!==""){

				if(obj.isNew()==false){
					para.push({ field:"id", operator:"where_not_in", value: [obj.id] });
				}
				
				para.push({ field:"number", value: obj.number });
				para.push({ field:"type", value: obj.type });

				this.txnDS.query({
					filter: para,
					page: 1,
					pageSize: 1
				}).then(function(e){
					var view = self.txnDS.view();
					
					if(view.length>0){
				 		self.set("notDuplicateNumber", false);
					}else{
						self.set("notDuplicateNumber", true);
					}
				});
			}
		},
		generateNumber 		: function(){
			var self = this, obj = this.get("obj"),
				issueDate = new Date(obj.issued_date),
				startDate = new Date(obj.issued_date),
				endDate = new Date(obj.issued_date);

			this.set("notDuplicateNumber", true);

			startDate.setDate(1);
			startDate.setMonth(0);//Set to January
			endDate.setDate(31);
			endDate.setMonth(11);//Set to November

			this.numberDS.query({
				filter:[
					{ field:"type", value:obj.type },
					{ field:"issued_date >=", value:kendo.toString(startDate, "yyyy-MM-dd") },
					{ field:"issued_date <=", value:kendo.toString(endDate, "yyyy-MM-dd") }
				]
			}).then(function(){
				var view = self.numberDS.view(),
				number = 0, str = "";

				if(view.length>0){
					number = view[0].number.match(/\d+/g).map(Number);
				}

				number++;
				str = banhji.source.getPrefixAbbr(obj.type) + kendo.toString(issueDate, "yy") + kendo.toString(issueDate, "MM") + kendo.toString(number, "00000");
				
				obj.set("number", str);
			});
		},
		setStatus 			: function(){
			var self = this,
				obj = this.get("obj"), 
				statusObj = this.get("statusObj");

			statusObj.set("text", "");
	        statusObj.set("date", "");
	        statusObj.set("number", "");
	        statusObj.set("url", "");

			switch(obj.status) {
			    case 3:
			        statusObj.set("text", "return");
			        break;
			    case 4:
			        statusObj.set("text", "draft");
			        break;
			    default:
			        statusObj.set("text", "paid");
			}
		},
		//Obj
		loadObj 			: function(id){
			var self = this, para = [], referenceIds = [];

			para.push({ field:"id", value: id });

			if(this.get("recurring")=="use"){
				this.set("recurring","");
				this.addEmpty();
				this.loadRecurring(id);
			}else{
				if(this.get("recurring")=="edit"){
					this.set("recurring","");
					para.push({ field:"is_recurring", value: 1 });
				}

				this.dataSource.query({
					filter: para,
					page: 1,
					pageSize: 100
				}).then(function(e){
					var view = self.dataSource.view();

					self.set("obj", view[0]);
					self.set("total", kendo.toString(view[0].amount, "c2", view[0].locale));
			        self.set("amount_due", kendo.toString(view[0].amount - view[0].deposit, "c2", view[0].locale));					
					self.setStatus();
					self.loadDeposit();

					self.lineDS.query({
						filter: [
							{ field: "transaction_id", value: id },
							{ field: "assembly_id", value: 0 }
						]
					});

					self.assemblyLineDS.query({
						filter:[
							{ field: "transaction_id", value: id },
							{ field: "assembly_id >", value: 0 }
						]
					});

					self.journalLineDS.query({
						filter: { field: "transaction_id", value: id }
					});

					self.attachmentDS.filter({ field: "transaction_id", value: id });

					//Segment
					var segments = [];
					$.each(view[0].segments, function(index, value){
						segments.push(value);
					});
					self.segmentItemDS.filter({ field: "id", operator:"where_in", value: segments });

					self.loadReference();
				});
			}
		},
		addEmpty 		 	: function(){
			this.dataSource.data([]);
			this.lineDS.data([]);
			this.assemblyLineDS.data([]);
			this.depositDS.data([]);
			this.journalLineDS.data([]);
			this.attachmentDS.data([]);
			this.referenceDS.data([]);

			this.set("isEdit", false);
			this.set("obj", null);
			this.set("total", 0);
			this.set("total_deposit", 0);
			this.set("amount_due", 0);
			this.set("amtDueColor", banhji.source.amtDueColor);

			this.dataSource.insert(0, {
				transaction_template_id: 10,
				contact_id 			: "",//Customer
				payment_method_id	: 0,
				reference_id 		: "",
				recurring_id 		: "",
				account_id 			: 1,
				discount_account_id : 0,
				job_id 				: 0,
				user_id 			: this.get("user_id"),
				employee_id			: "",//Sale Rep
			   	type				: "Commercial_Cash_Sale",//Required
			   	number 				: "",
			   	sub_total 			: 0,
			   	discount 			: 0,
			   	tax 				: 0,
			   	amount				: 0,
			   	deposit 			: 0,
			   	remaining 			: 0,
			   	credit_allowed 		: 0,
			   	credit 				: 0,
			   	check_no 			: "",
			   	rate				: 1,
			   	locale 				: banhji.locale,
			   	issued_date 		: new Date(),
			   	bill_to 			: "",
			   	ship_to 			: "",
			   	memo 				: "",
			   	memo2 				: "",
			   	status 				: 0,
			   	segments 			: [],
			   	is_journal 			: 1,
			   	//Recurring
			   	recurring_name 		: "",
			   	start_date 			: new Date(),
			   	frequency 			: "Daily",
			   	month_option 		: "Day",
			   	interval 			: 1,
			   	day 				: 1,
			   	week 				: 0,
			   	month 				: 0,
			   	is_recurring 		: 0,

			   	contact 			: { id:"", name:"" },
			   	references 			: []
	    	});
			
			var obj = this.dataSource.at(0);
			this.set("obj", obj);
			this.setRate();
			this.generateNumber();

			//Default rows
			for (var i = 0; i < banhji.source.defaultLines; i++) {
				this.addRow();
			}
		},
		addRow 				: function(){
			var obj = this.get("obj");

			this.lineDS.add({
				transaction_id 		: obj.id,
				tax_item_id 		: "",
				item_id 			: "",
				assembly_id 		: 0,
				measurement_id 		: 0,
				description 		: "",
				quantity 	 		: 1,
				conversion_ratio 	: 0,
				price 				: 0,
				amount 				: 0,
				discount 			: 0,
				rate				: obj.rate,
				locale				: obj.locale,
				movement 			: -1,
				reference_no  		: "",

				discount_percentage : 0,
				item 				: { id:"", name:"" },
				item_price 			: { measurement_id:"", measurement:"" },
				tax_item 			: { id:"", name:"" }
			});
		},
		addExtraRow 		: function(uid){
			var row = this.lineDS.getByUid(uid),
				index = this.lineDS.indexOf(row);

			if(index==this.lineDS.total()-1){
				this.addRow();
			}
		},
		removeRow 			: function(e){
			var data = e.data;
			if(this.lineDS.total()>1){
				this.lineDS.remove(data);
		        this.changes();
	        }
		},
		removeEmptyRow 		: function(){
			var raw = this.lineDS.data();
		    var item, i;
		    for(i=raw.length-1; i>=0; i--){
		    	item = raw[i];

		    	if (item.item_id==0) {
			       	this.lineDS.remove(item);
			    }
		    }
	    },
	    objSync 			: function(){
	    	var dfd = $.Deferred();	        

	    	this.dataSource.sync();
		    this.dataSource.bind("requestEnd", function(e){
		    	if(e.response){				
					dfd.resolve(e.response.results);
				}
		    });
		    this.dataSource.bind("error", function(e){
				dfd.reject(e.errorThrown);
		    });

		    return dfd;
	    },
		save 				: function(){
	    	var self = this, obj = this.get("obj"), segments = [];

	    	obj.set("issued_date", kendo.toString(new Date(obj.issued_date), "s"));
	    	obj.set("due_date", kendo.toString(new Date(obj.due_date), "yyyy-MM-dd"));

	    	//Warning over credit allowed
	        if(obj.credit_limit>0 && obj.amount>obj.credit_allowed){
	        	alert("Over credit allowed!");
	        }

	        this.removeEmptyRow();

	        //Segment
	        $.each(this.segmentItemDS.data(), function(index, value){
	        	segments.push(value.id);
	        });
	        obj.set("segments", segments);

	        //Save Draft
	        if(this.get("saveDraft")){
	        	obj.set("status", 4); //In progress
	        	obj.set("progress", "Draft");
	        	obj.set("is_journal", 0);//No Journal
	        }

	        //Recurring
	    	if(this.get("saveRecurring")){
	    		this.set("saveRecurring", false);
	    		
	    		obj.set("number", "");
	    		obj.set("is_recurring", 1);
	    	}

	        //Edit Mode
	    	if(obj.isNew()==false){
	    		//Use draft
	    		if(obj.status==4){
	    			obj.set("status", 0);//Open
	    			obj.set("progress", "");
	    			obj.set("is_journal", 1);//Add Journal
	    		}
	    	}
	    	
			//Save Obj
			this.objSync()
			.then(function(data){ //Success
				if(self.get("isEdit")==false){
					//Item line
					$.each(self.lineDS.data(), function(index, value){
						value.set("transaction_id", data[0].id);
					});

					//Assembly Item line
					$.each(self.assemblyLineDS.data(), function(index, value){
						value.set("transaction_id", data[0].id);
					});

					//Attachment
					$.each(self.attachmentDS.data(), function(index, value){
			    		value.set("transaction_id", data[0].id);
		            });
				}

				//Journal
				if(data[0].is_recurring==0 && data[0].is_journal==1){
		            self.addJournal(data[0].id);
		            self.saveDeposit(data[0].id);
	        	}

				self.lineDS.sync();
				self.assemblyLineDS.sync();
				self.uploadFile();
				
				return data;
			}, function(reason) { //Error
				$("#ntf1").data("kendoNotification").error(reason);
			}).then(function(result){
				$("#ntf1").data("kendoNotification").success(banhji.source.successMessage);

				if(self.get("saveDraft") || self.get("saveClose")){
					//Save Draft or Save Close
					self.set("saveDraft", false);
					self.set("saveClose", false);
					self.cancel();
				}else if(self.get("savePrint")){
					//Save Print
					self.set("savePrint", false);
					self.clear();
					if(result[0].transaction_template_id>0){
						banhji.router.navigate("/invoice_form/"+result[0].id);
					}
				}else{
					//Save New
					self.addEmpty();
				}
			});
		},
		clear 				: function(){
			this.dataSource.cancelChanges();
			this.lineDS.cancelChanges();
			this.assemblyLineDS.cancelChanges();
			this.segmentItemDS.cancelChanges();
			this.attachmentDS.cancelChanges();
			this.referenceDS.cancelChanges();
			
			this.dataSource.data([]);
			this.lineDS.data([]);
			this.assemblyLineDS.data([]);
			this.segmentItemDS.data([]);
			this.attachmentDS.data([]);
			this.referenceDS.data([]);

			banhji.userManagement.removeMultiTask("cash_sale");
		},
		cancel 				: function(){
			this.clear();
			window.history.back();
		},
		delete 				: function(){
			var self = this, obj = this.get("obj");
			this.set("showConfirm",false);

	        this.txnDS.query({
	        	filter:[
	        		{ field:"reference_id", value:obj.id }
	        	],
	        	page:1,
	        	pageSize:1
	        }).then(function(){
	        	var view = self.txnDS.view();

	        	if(view.length>0){
	        		alert("Sorry, you can not delete it.");
	        	}else{
	        		obj.set("deleted", 1);

			        self.dataSource.sync();
			        self.dataSource.bind("requestEnd", function(e){
			        	if(e.type==="update"){
			        		window.history.back();
			        	}
			        });
	        	}
	        });
		},
		openConfirm 		: function(){
			this.set("showConfirm", true);
		},
		closeConfirm 		: function(){
			this.set("showConfirm", false);
		},
		validating 			: function(){
			var result = true, nonItem = true;

			//Check select non item
			$.each(this.lineDS.data(), function(index, value){
				if(value.item_id>0){
					nonItem = false;
				}
			});
			
			if(nonItem){
				$("#ntf1").data("kendoNotification").error("Please select at least one item!");

				result = false;
			}

			return result;
		},
	    //Journal
	    addJournal 			: function(transaction_id){
	    	var self = this,
		    	obj = this.get("obj"),
		    	contact = obj.contact,
		    	raw = "", entries = {};

		    //Edit Mode
		    if(obj.isNew()==false){
		    	//Delete previous journal
			    $.each(this.journalLineDS.data(), function(index, value){
					value.set("deleted", 1);
				});
			}

			//Item lines
			$.each(this.lineDS.data(), function(index, value){
				var item = value.item;

				//COGS on Dr
				if(item.item_type_id==1){
					var cogsID = kendo.parseInt(item.expense_account_id);
					if(cogsID>0){
						raw = "dr"+cogsID;

						var cogsAmount = value.amount;
						if(item.item_type_id==1 || item.item_type_id==4){
							cogsAmount = (value.quantity*value.conversion_ratio)*value.cost;
						}

						if(entries[raw]===undefined){
							entries[raw] = {
								transaction_id 		: transaction_id,
								account_id 			: cogsID,
								contact_id 			: obj.contact_id,
								description 		: value.description,
								reference_no 		: "",
								segments 	 		: obj.segments,
								dr 	 				: cogsAmount * value.rate,
								cr 					: 0,
								rate				: value.rate,
								locale				: item.locale
							};
						}else{
							entries[raw].dr += cogsAmount;
						}
					}
				}

				//Inventory on Cr
				var inventoryID = kendo.parseInt(item.inventory_account_id);
				if(inventoryID>0){
					raw = "cr"+inventoryID;

					var inventoryAmount = value.amount;
					if(item.item_type_id==1 || item.item_type_id==4){
						inventoryAmount = (value.quantity*value.conversion_ratio)*value.cost;
					}
					
					if(entries[raw]===undefined){
						entries[raw] = {
							transaction_id 		: transaction_id,
							account_id 			: inventoryID,
							contact_id 			: obj.contact_id,
							description 		: value.description,
							reference_no 		: "",
							segments 	 		: obj.segments,
							dr 	 				: 0,
							cr 					: inventoryAmount * value.rate,
							rate				: value.rate,
							locale				: item.locale
						};
					}else{
						entries[raw].cr += inventoryAmount;
					}
				}

				//Sale on Cr
				var incomeID = kendo.parseInt(item.income_account_id);
				if(incomeID>0){
					raw = "cr"+incomeID;
					
					var saleAmount = value.quantity * value.price;
					if(entries[raw]===undefined){
						entries[raw] = {
							transaction_id 		: transaction_id,
							account_id 			: incomeID,
							contact_id 			: obj.contact_id,
							description 		: value.description,
							reference_no 		: "",
							segments 	 		: obj.segments,
							dr 	 				: 0,
							cr 					: saleAmount,
							rate				: obj.rate,
							locale				: obj.locale
						};
					}else{
						entries[raw].cr += saleAmount;
					}
				}

				//Tax on Cr
				if(value.tax_item_id>0){
					var taxItem = value.tax_item,
						raw = "cr"+taxItem.account_id;

					if(entries[raw]===undefined){
						entries[raw] = {
							transaction_id 		: transaction_id,
							account_id 			: taxItem.account_id,
							contact_id 			: obj.contact_id,
							description 		: value.description,
							reference_no 		: "",
							segments 	 		: obj.segments,
							dr 	 				: 0,
							cr 					: value.tax,
							rate				: obj.rate,
							locale				: obj.locale
						};
					}else{
						entries[raw].cr += value.tax;
					}
				}
			});

			//Assembly Item
			$.each(this.assemblyLineDS.data(), function(index, value){
				var item = value.item;

				//COGS on Dr
				if(item.item_type_id==1){
					var cogsID = kendo.parseInt(item.expense_account_id);
					if(cogsID>0){
						raw = "dr"+cogsID;
						
						var cogsAmount = value.amount;
						if(item.item_type_id==1 || item.item_type_id==4){
							cogsAmount = (value.quantity*value.conversion_ratio)*value.cost;
						}

						if(entries[raw]===undefined){
							entries[raw] = {
								transaction_id 		: transaction_id,
								account_id 			: cogsID,
								contact_id 			: obj.contact_id,
								description 		: value.description,
								reference_no 		: "",
								segments 	 		: obj.segments,
								dr 	 				: cogsAmount * value.rate,
								cr 					: 0,
								rate				: value.rate,
								locale				: item.locale
							};
						}else{
							entries[raw].dr += cogsAmount;
						}
					}
				}

				//Inventory on Cr
				var inventoryID = kendo.parseInt(item.inventory_account_id);
				if(inventoryID>0){
					raw = "cr"+inventoryID;

					var inventoryAmount = value.amount;
					if(item.item_type_id==1 || item.item_type_id==4){
						inventoryAmount = (value.quantity*value.conversion_ratio)*value.cost;
					}
					
					if(entries[raw]===undefined){
						entries[raw] = {
							transaction_id 		: transaction_id,
							account_id 			: inventoryID,
							contact_id 			: obj.contact_id,
							description 		: value.description,
							reference_no 		: "",
							segments 	 		: obj.segments,
							dr 	 				: 0,
							cr 					: inventoryAmount * value.rate,
							rate				: value.rate,
							locale				: item.locale
						};
					}else{
						entries[raw].cr += inventoryAmount;
					}
				}
			});

			//Obj Account, Cash on Dr
			var objAccountID = kendo.parseInt(obj.account_id);
			if(objAccountID>0){
				raw = "dr"+objAccountID;

				var objAmount = obj.amount - obj.deposit;
				if(entries[raw]===undefined){
					entries[raw] = {
						transaction_id 		: transaction_id,
						account_id 			: objAccountID,
						contact_id 			: obj.contact_id,
						description 		: obj.memo,
						reference_no 		: obj.reference_no,
						segments 	 		: obj.segments,
						dr 	 				: objAmount,
						cr 					: 0,
						rate				: obj.rate,
						locale				: obj.locale
					};
				}else{
					entries[raw].dr += objAmount;
				}
			}

			//Discount on Dr			
			if(obj.discount > 0){
				var discountAccountId = kendo.parseInt(obj.discount_account_id);
				if(discountAccountId>0){
					raw = "dr"+discountAccountId;

					if(entries[raw]===undefined){
						entries[raw] = {
							transaction_id 		: transaction_id,
							account_id 			: discountAccountId,
							contact_id 			: obj.contact_id,
							description 		: obj.memo,
							reference_no 		: obj.reference_no,
							segments 	 		: obj.segments,
							dr 	 				: obj.discount,
							cr 					: 0,
							rate				: obj.rate,
							locale				: obj.locale
						};
					}else{
						entries[raw].dr += obj.discount;
					}
				}
			}

			//Deposit on Dr
			if(obj.deposit > 0){
				var depositAccountId = kendo.parseInt(contact.deposit_account_id);
				if(depositAccountId>0){
					raw = "dr"+depositAccountId;

					if(entries[raw]===undefined){
						entries[raw] = {
							transaction_id 		: transaction_id,
							account_id 			: depositAccountId,
							contact_id 			: obj.contact_id,
							description 		: obj.memo,
							reference_no 		: obj.reference_no,
							segments 	 		: obj.segments,
							dr 	 				: obj.deposit,
							cr 					: 0,
							rate				: obj.rate,
							locale				: obj.locale
						};
					}else{
						entries[raw].dr += obj.deposit;
					}
				}
			}

			//Add to journal entry
			if(!jQuery.isEmptyObject(entries)){
				$.each(entries, function(index, value){
					self.journalLineDS.add(value);
				});
			}

			this.journalLineDS.sync();
		},
		//Reference
		loadReference 		: function(){
			var self = this, obj = this.get("obj");

			if(obj.contact_id>0){
				this.referenceDS.filter([
					{ field: "contact_id", value: obj.contact_id },
					{ field: "type", operator:"where_in", value:["Sale_Order", "Quote", "GDN"] },
					{ field: "status", value:0 },
					{ field: "reuse", operator:"or_where", value:1 },
					{ field: "due_date >=", value: kendo.toString(obj.issued_date, "yyyy-MM-dd") }
				]);
			}
		},
		referenceChanges 	: function(e){
			var self = this,
				isExisting = false,
				obj = this.get("obj"), 
				reference_id = this.get("reference_id");

			$.each(obj.references, function(index, value){
				if(value.id==reference_id){
					isExisting = true;

					return false;
				}
			});

			if(reference_id>0 && isExisting==false){
				var reference = this.referenceDS.get(reference_id),
					deposit = kendo.parseFloat(reference.deposit) + kendo.parseFloat(obj.deposit);

				obj.set("deposit", deposit);
				obj.references.push(reference);

			 	this.referenceLineDS.query({
			 		filter:[
			 			{ field:"transaction_id", value: reference_id },
						{ field: "assembly_id", value: 0 }
					]
			 	}).then(function(){
			 		var view = self.referenceLineDS.view();

			 		$.each(view, function(index, value){
			 			self.lineDS.insert(index, {
							transaction_id 		: obj.id,
							reference_id 		: reference.id,
							tax_item_id 		: value.tax_item_id,
							item_id 			: value.item_id,
							measurement_id 		: value.measurement_id,
							description 		: value.description,
							quantity 	 		: value.quantity,
							conversion_ratio 	: value.conversion_ratio,
							price 				: value.price,
							amount 				: value.amount,
							discount 			: value.discount,
							rate				: value.rate,
							locale				: value.locale,
							movement 			: -1,
							reference_no 		: reference.number,

							item 				: value.item,
							item_price 			: value.item_price,
							tax_item 			: value.tax_item
						});
			 		});

			 		self.changes();
			 	});
		 	}

		 	this.set("reference_id", 0);
		},
		referenceRemoveRow 	: function(e){
			var data = e.data,
				obj = this.get("obj"),
				index = obj.references.indexOf(data), 
				deposit = kendo.parseFloat(obj.deposit) - kendo.parseFloat(data.deposit);
			
			obj.set("deposit", deposit);

			obj.references.splice(index, 1);
		},
		//Recurring
		loadRecurring 		: function(id){
			var self = this;

			this.recurringDS.query({
				filter:[
					{ field:"id", value:id },
					{ field:"is_recurring", value:1 }
				],
				page: 1,
				pageSize: 100
			}).then(function(){
				var view = self.recurringDS.view(),
				obj = self.get("obj");
				
				obj.set("contact", view[0].contact);
				obj.set("contact_id", view[0].contact.id);
				obj.set("recurring_id", id);
				obj.set("payment_method_id", view[0].payment_method_id);
				obj.set("account_id", view[0].account_id);
				obj.set("employee_id", view[0].employee_id);//Sale Rep
				obj.set("job_id", view[0].job_id);
				obj.set("segments", view[0].segments);
				obj.set("locale", view[0].locale);
				obj.set("memo", view[0].memo);
				obj.set("memo2", view[0].memo2);
				obj.set("bill_to", view[0].bill_to);
				obj.set("ship_to", view[0].ship_to);

				// self.setContact(view[0].contact);
			});

			this.recurringLineDS.query({
				filter:[
					{ field: "transaction_id", value: id },
					{ field: "assembly_id", value: 0 }
				]
			}).then(function(){
				var view = self.recurringLineDS.view();
				self.lineDS.data([]);

				$.each(view, function(index, value){
					self.lineDS.add({
						transaction_id 		: 0,
						tax_item_id 		: value.tax_item_id,
						item_id 			: value.item_id,
						measurement_id 		: value.measurement_id,
						description 		: value.description,
						quantity 	 		: value.quantity,
						price 				: value.price,
						amount 				: value.amount,
						discount 			: value.discount,
						rate				: value.rate,
						locale				: value.locale,
						movement 			: -1,

						item 				: value.item,
						item_price 			: value.item_price,
						tax_item 			: value.tax_item
					});
				});

				self.changes();
			});
		},
		frequencyChanges 	: function(){
			var obj = this.get("obj");

			switch(obj.frequency) {
			    case "Daily":
			        this.set("showMonthOption", false);
			        this.set("showMonth", false);
			        this.set("showWeek", false);
			        this.set("showDay", false);
			       
			        break;
			    case "Weekly":
			        this.set("showMonthOption", false);
			        this.set("showMonth", false);
			        this.set("showWeek", true);
			        this.set("showDay", false);

			        break;
			    case "Monthly":
			        this.set("showMonthOption", true);
			        this.set("showMonth", false);
			        this.set("showWeek", false);
			        this.set("showDay", true);

			        break;
			    case "Annually":
			        this.set("showMonthOption", false);
			        this.set("showMonth", true);
			        this.set("showWeek", false);
			        this.set("showDay", true);

			        break;
			    default:
			        //Default here..
			}
		},
		monthOptionChanges 	: function(){
			var obj = this.get("obj");

			switch(obj.month_option) {
			    case "Day":
			        this.set("showWeek", false);
			        this.set("showDay", true);
			       
			        break;
			    default:
			        this.set("showWeek", true);
			        this.set("showDay", false);
			}
		},
		recurringSync 		: function(){
	    	var dfd = $.Deferred();

	    	this.recurringDS.sync();
		    this.recurringDS.bind("requestEnd", function(e){
		    	if(e.response){
					dfd.resolve(e.response.results);
				}
		    });
		    this.recurringDS.bind("error", function(e){
				dfd.reject(e.errorThrown);
		    });

		    return dfd;
	    }
	});
	banhji.saleRecurring = kendo.observable({
		lang 				: langVM,
		dataSource 			: dataStore(apiUrl + "transactions"),
		contactDS			: banhji.source.customerDS,
		contact_id 			: "",
		pageLoad 			: function(){
		},
		search 				: function(){
			var contact_id = this.get("contact_id");

			if(contact_id){
				this.dataSource.filter([
					{ field:"type", operator:"where_in", value:["Quote","Sale_Order"] },
					{ field:"contact_id", value: contact_id },
					{ field:"is_recurring", value: 1 }
				]);
			}

			this.set("contact_id", "");
		},
		edit 				: function(e){
			var data = e.data;
			
			switch(data.type) {
			    case "Quote":
			        banhji.quote.set("recurring", "edit");
			        banhji.router.navigate('/quote/' + data.id);
			        break;
			    case "Sale_Order":
			        banhji.saleOrder.set("recurring", "edit");
			        banhji.router.navigate('/sale_order/' + data.id);

			        break;
			    case "Customer_Deposit":
			        banhji.customerDeposit.set("recurring", "edit");
			        banhji.router.navigate('/customer_deposit/' + data.id);

			        break;
			    default:
			        // default code block
			}
		},
		use 				: function(e){
			var data = e.data;
			
			switch(data.type) {
			    case "Quote":
			        banhji.quote.set("recurring", "use");
			        banhji.router.navigate('/quote/' + data.id);
			        break;
			    case "Sale_Order":
			        banhji.saleOrder.set("recurring", "use");
			        banhji.router.navigate('/sale_order/' + data.id);
			        break;
			    case "Customer_Deposit":
			        banhji.customerDeposit.set("recurring", "use");
			        banhji.router.navigate('/customer_deposit/' + data.id);

			        break;
			    default:
			        // default code block
			}
		}
	});
	banhji.sale = kendo.observable({
		lang 				: langVM,
		dataSource  		: dataStore(apiUrl + 'items'),
		txnDS  				: dataStore(apiUrl + 'item_lines'),
		quoteLineDS  		: banhji.quote.lineDS,
		soLineDS  			: banhji.saleOrder.lineDS,
		categoryDS 			: dataStore(apiUrl + 'categories'),
		obj 				: null,
		searchText 			: "",
		isFavorite 			: false,
		on_hand 			: 0,
		on_so 				: 0,
		on_po 				: 0,
		user_id 			: banhji.source.user_id,
		pageLoad 			: function(){
			if(this.categoryDS.total()==0){
				this.categoryDS.filter({ field:"item_type_id", operator:"where_in", value:[1,4] });
				this.search();
			}
		},
		search 				: function(){
			var para = [], searchText = this.get("searchText");

			if(searchText){
      			var textParts = searchText.replace(/([a-z]+)/i, "$1 ").split(/[^0-9a-z]+/ig);

      			para.push(
      				{ field: "abbr", value: textParts[0] },
      				{ field: "number", value: textParts[1] },
					{ field: "name", operator: "or_like", value: searchText }
      			);
      		}

      		if(this.get("isFavorite")){
      			para.push({ field:"favorite", value:true });
      			this.set("isFavorite", false);
      		}

			para.push({ field:"item_type_id", operator:"where_in", value:[1,4] });

			this.dataSource.query({
				filter: para,
				page:1,
				pageSize:100
			});
		},
		favorite 			: function(){
			this.set("isFavorite", true);
			this.search();
		},
		selectedType 		: function(e){
			var data = e.data;

			this.dataSource.query({
				filter: { field:"category_id", value:data.id },
				page:1,
				pageSize:100
			});
		},
		addQuote 			: function(e){
			var data = e.data, price = 0;

			if(data.item_prices.length>0){
				price = data.item_prices[0].price;
			}

			var isExisting = false;
			$.each(banhji.quote.lineDS.data(), function(index, value){
				if(value.item_id==data.id){
					isExisting = true;
					value.set("quantity", value.quantity+1);

					return false;
				}
			});

			if(isExisting==false){
				banhji.quote.lineDS.add({
					transaction_id 		: 0,
					tax_item_id 		: "",
					item_id 			: data.id,				
					measurement_id 		: 0,				
					description 		: data.sale_description,				
					quantity 	 		: 1,
					price 				: price,												
					amount 				: price,
					rate				: 1,
					locale				: banhji.locale,
					movement 			: -1,

					item_prices 		: data.item_prices
				});
			}			
		},
		addSO 				: function(e){
			var data = e.data, price = 0;

			if(data.item_prices.length>0){
				price = data.item_prices[0].price;
			}

			var isExisting = false;
			$.each(banhji.quote.lineDS.data(), function(index, value){
				if(value.item_id==data.id){
					isExisting = true;
					value.set("quantity", value.quantity+1);

					return false;
				}
			});

			if(isExisting==false){
				banhji.saleOrder.lineDS.add({
					transaction_id 		: 0,
					tax_item_id 		: "",
					item_id 			: data.id,				
					measurement_id 		: 0,				
					description 		: data.sale_description,				
					quantity 	 		: 1,
					price 				: price,												
					amount 				: price,
					rate				: 1,
					locale				: banhji.locale,
					movement 			: -1,

					item_prices 		: data.item_prices
				});
			}			
		},
		loadDetail			: function(e){
			var data = e.data;
			this.set("obj", data);
			this.loadData();
		},
		loadData 			: function(){
			var self = this, obj = this.get("obj"), on_so = 0, on_po = 0;

			this.txnDS.query({
				filter:[
					{ field:"item_id", value:obj.id },
					{ field:"type", operator:"where_related_transaction", value:"Purchase_Order" },
					{ field:"status", operator:"where_related_transaction", value:0 },
					{ field:"is_recurring", operator:"where_related_transaction", value:0 },
					{ field:"deleted", operator:"where_related_transaction", value:0 }
				],
				page:1,
				pageSize:1000
			}).then(function(){
				var view = self.txnDS.view();

				$.each(view, function(index, value){
					on_po += value.quantity;
				});

				self.set("on_po", on_po);
			});

			this.txnDS.query({
				filter:[
					{ field:"item_id", value:obj.id },
					{ field:"type", operator:"where_related_transaction", value:"Sale_Order" },
					{ field:"status", operator:"where_related_transaction", value:0 },
					{ field:"is_recurring", operator:"where_related_transaction", value:0 },
					{ field:"deleted", operator:"where_related_transaction", value:0 }
				],
				page:1,
				pageSize:1000
			}).then(function(){
				var view = self.txnDS.view();

				$.each(view, function(index, value){
					on_so += value.quantity;
				});
				
				self.set("on_so", on_so);
			});
		},
		prevItem 			: function(){
			var obj = this.get("obj"), 
			index = this.dataSource.indexOf(obj);

			index--;

	        if (index === -1) {
	        	
	           	index = this.dataSource.data().length - 1;
	        }

	        var data = this.dataSource.at(index);
			this.set("obj", data);
			this.loadData();
		},
		nextItem 			: function(){
			var obj = this.get("obj"), 
			index = this.dataSource.indexOf(obj);

			index++;

			if (index === this.dataSource.data().length) {
	           	index = 0;
	        }

	        var data = this.dataSource.at(index);
			this.set("obj", data);
			this.loadData();
		}
	});
	// SALE REPORTS
	banhji.quotationList =  kendo.observable({
		lang 				: langVM,
		dataSource 			: dataStore(apiUrl + "sales/transaction_list"),
		contactDS  			: banhji.source.customerDS,
		sortList			: banhji.source.sortList,
		sorter 				: "month",
		sdate 				: "",
		edate 				: "",
		obj 				: { contactIds: [] },
		company 			: banhji.institute,
		displayDate 		: "",
		orderCount 			: 0,
		totalAmount 		: 0,
		exArray 			: [],
		pageLoad 			: function(){
			this.search();
		},
		sorterChanges 		: function(){
	        var today = new Date(),
        	sdate = "",
        	edate = "",
        	sorter = this.get("sorter");
        	
			switch(sorter){
				case "today":								
					this.set("sdate", today);
					this.set("edate", "");
													  					
				  	break;
				case "week":			  	
					var first = today.getDate() - today.getDay(),
					last = first + 6;

					this.set("sdate", new Date(today.setDate(first)));
					this.set("edate", new Date(today.setDate(last)));						
					
				  	break;
				case "month":							  	
					this.set("sdate", new Date(today.getFullYear(), today.getMonth(), 1));
					this.set("edate", new Date(today.getFullYear(), today.getMonth() + 1, 0));

				  	break;
				case "year":				
				  	this.set("sdate", new Date(today.getFullYear(), 0, 1));
				  	this.set("edate", new Date(today.getFullYear(), 11, 31));

				  	break;
				default:
					this.set("sdate", "");
				  	this.set("edate", "");									  
			}
		},
		search				: function(){
			var self = this, para = [],
				obj = this.get("obj"),
				start = this.get("sdate"),
        		end = this.get("edate"),
        		displayDate = "";

        	para.push({ field:"type", value:"Quote" });

        	//Customer
            if(obj.contactIds.length>0){
            	var contactIds = [];
            	$.each(obj.contactIds, function(index, value){
            		contactIds.push(value);
            	});          	
	            para.push({ field:"contact_id", operator:"where_in", value:contactIds });
	        }
    	
        	//Dates
        	if(start && end){
        		start = new Date(start);
        		end = new Date(end);
        		displayDate = "From " + kendo.toString(start, "dd-MM-yyyy") + " To " + kendo.toString(end, "dd-MM-yyyy");
        		end.setDate(end.getDate()+1);

            	para.push({ field:"issued_date >=", value: kendo.toString(start, "yyyy-MM-dd") });
            	para.push({ field:"issued_date <", value: kendo.toString(end, "yyyy-MM-dd") });
            }else if(start){
            	start = new Date(start);
            	displayDate = "On " + kendo.toString(start, "dd-MM-yyyy");

            	para.push({ field:"issued_date", value: kendo.toString(start, "yyyy-MM-dd") });
            }else if(end){
            	end = new Date(end);
            	displayDate = "As Of " + kendo.toString(end, "dd-MM-yyyy");
        		end.setDate(end.getDate()+1);
        		
            	para.push({ field:"issued_date <", value: kendo.toString(end, "yyyy-MM-dd") });
            }else{
            	
            }
            this.set("displayDate", displayDate);

            this.dataSource.query({
            	filter:para
            }).then(function(){
            	var view = self.dataSource.view();

            	var amount = 0, orderCount = 0;
            	$.each(view, function(index, value){ 
            		$.each(value.line, function(ind, val){
            			orderCount++; 
	            		amount += val.amount;
	            	});
            	});
            	
            	self.set("orderCount", kendo.toString(orderCount, "n0"));
            	self.set("totalAmount", kendo.toString(amount, "c2", banhji.locale));
            });
            this.dataSource.bind("requestEnd", function(e){				
				if(e.type=="read"){
					var response = e.response, balanceCal = 0, balance= 0;
					self.exArray = [];

					self.exArray.push({
	            		cells: [
	            			{ value: self.company.name, textAlign: "center", colSpan: 5}
	            		]
	            	});
	            	self.exArray.push({
	            		cells: [
	            			{ value: "Sale Order List",bold: true, fontSize: 20, textAlign: "center", colSpan: 5 }
	            		]
	            	});
	            	if(self.displayDate){
		            	self.exArray.push({
		            		cells: [
		            			{ value: self.displayDate, textAlign: "center", colSpan: 5 }
		            		]
		            	});
		            }
	            	self.exArray.push({
	            		cells: [
	            			{ value: "", colSpan: 4 }
	            		]
	            	});
	            	self.exArray.push({ 
	            		cells: [
							{ value: "Number", background: "#496cad", color: "#ffffff" },
							{ value: "Reference", background: "#496cad", color: "#ffffff" },
							{ value: "Date", background: "#496cad", color: "#ffffff" },
							{ value: "Status", background: "#496cad", color: "#ffffff" },
							{ value: "Amount", background: "#496cad", color: "#ffffff" },
						]
					});
					for (var i = 0; i < response.results.length; i++){
						self.exArray.push({
					        cells: [
					          	{ value: response.results[i].name, bold: true, },
					            { value: "" },
					            { value: "" },
					            { value: "" },
					            { value: "" },
					        ]
					        
					    });
					    for(var j = 0; j < response.results[i].line.length; j++){
					    	var status = response.results[i].line[j].status
					    	if (status==0){
					    		status = "Open"
					    	}else{
					    		status = "Used"
					    	}
				          	self.exArray.push({
				          		cells: [
				          	  		{ value: response.results[i].line[j].number },
				              		{ value: response.results[i].line[j].number },
				              		{ value: response.results[i].line[j].issued_date},
				              		{ value: status },
				              		{ value: response.results[i].line[j].amount},
				            	]
				          	});
				        }
				    	self.exArray.push({
					        cells: [
					          	{ value: "", colSpan: 4 }
					        ]
					    });
					}
				}
			});
		},
		printGrid			: function() {
			var gridElement = $('#grid'),
		        printableContent = '',
		        win = window.open('', '', 'width=990, height=900'),
		        doc = win.document.open();
		    var htmlStart =
		            '<!DOCTYPE html>' +
		            '<html>' +
		            '<head>' +
		            '<meta charset="utf-8" />' +
		            '<title></title>' +
		            '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />'+
		            '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
		            '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/responsive.css">' +
		            '<link href="<?php echo base_url(); ?>assets/invoice/invoice.css" rel="stylesheet" />'+
		            '<link href="https://fonts.googleapis.com/css?family=Content:400,700" rel="stylesheet" type="text/css">' +
		            '<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">' +
		            '<style>' +
		            'html { font: 11pt sans-serif; }' +
		            '.k-grid { border-top-width: 0; }' +
		            '.k-grid, .k-grid-content { height: auto !important; }' +
		            '.k-grid-content { overflow: visible !important; }' +
		            'div.k-grid table { table-layout: auto; width: 100% !important; }' +
		            '.k-grid .k-grid-header th { border-top: 1px solid; }' +
		            '.k-grid-toolbar, .k-grid-pager > .k-link { display: none; }' +
		            '</style><style type="text/css" media="print"> @page { size: portrait; margin:1mm; }'+
		            	'.inv1 .main-color {' +
		            		
		            		'-webkit-print-color-adjust:exact; ' +
		            	'} ' +
		            	'.table.table-borderless.table-condensed  tr th { background-color: #1E4E78!important;' +
		            	'-webkit-print-color-adjust:exact; color:#fff!important;}' +
		            	'.table.table-borderless.table-condensed  tr th * { color: #fff!important; -webkit-print-color-adjust:exact;}' +
		            	'.inv1 .light-blue-td { ' +
		            		'background-color: #c6d9f1!important;' +
		            		'text-align: left;' +
		            		'padding-left: 5px;' +
		            		'-webkit-print-color-adjust:exact; ' +
		            	'}' +
		            	'.saleSummaryCustomer .table.table-borderless.table-condensed tr td { ' +
    						'background-color: #F2F2F2!important; -webkit-print-color-adjust:exact;' +
						'}'+
						'.saleSummaryCustomer .table.table-borderless.table-condensed tr:nth-child(2n+1) td { ' +
    						' background-color: #fff!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.journal_block1>.span2 *, .journal_block1>.span5 * {color: #fff!important;}' +
		            	'.journal_block1>.span2:first-child { ' +
    						'background-color: #bbbbbb!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.journal_block1>.span5:last-child {' +
							'background-color: #496cad!important; color: #fff!important; -webkit-print-color-adjust:exact; ' +
						'}' +
						'.journal_block1>.span5 {' +
							'background-color: #5cc7dd!important; color: #fff!important; -webkit-print-color-adjust:exact;' +
						'}' +
		            	'.saleSummaryCustomer .table.table-borderless.table-condensed tfoot .bg-total td {' +
		            		'background-color: #1C2633!important;' +
		            		'color: #fff!important; ' + 
		            		'-webkit-print-color-adjust:exact;' +
		            	'}' +
		            	'</style>' +
		            '</head>' +
		            '<body><div class="saleSummaryCustomer" style="padding: 0 10px;">';
		    var htmlEnd =
		            '</div></body>' +
		            '</html>';
		    
		    printableContent = $('#invFormContent').html();
		    doc.write(htmlStart + printableContent + htmlEnd);
		    doc.close();
		    setTimeout(function(){
		    	win.print();
		    	win.close();
		    },2000);
		},
		ExportExcel 		: function(){
	        var workbook = new kendo.ooxml.Workbook({
	          sheets: [
	            {
	              columns: [
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	              ],
	              title: "Sale Order List",
	              rows: this.exArray
	            }
	          ]
	        });
	        //save the file as Excel file with extension xlsx
	        kendo.saveAs({dataURI: workbook.toDataURL(), fileName: "saleOrderList.xlsx"});
		}
	});
	banhji.saleOrderList =  kendo.observable({
		lang 				: langVM,
		dataSource 			: dataStore(apiUrl + "sales/transaction_list"),
		contactDS  			: banhji.source.customerDS,
		sortList			: banhji.source.sortList,
		sorter 				: "month",
		sdate 				: "",
		edate 				: "",
		obj 				: { contactIds: [] },
		company 			: banhji.institute,
		displayDate 		: "",
		orderCount 			: 0,
		totalAmount 		: 0,
		exArray 			: [],
		pageLoad 			: function(){
			this.search();
		},
		sorterChanges 		: function(){
	        var today = new Date(),
        	sdate = "",
        	edate = "",
        	sorter = this.get("sorter");
        	
			switch(sorter){
				case "today":								
					this.set("sdate", today);
					this.set("edate", "");
													  					
				  	break;
				case "week":			  	
					var first = today.getDate() - today.getDay(),
					last = first + 6;

					this.set("sdate", new Date(today.setDate(first)));
					this.set("edate", new Date(today.setDate(last)));						
					
				  	break;
				case "month":							  	
					this.set("sdate", new Date(today.getFullYear(), today.getMonth(), 1));
					this.set("edate", new Date(today.getFullYear(), today.getMonth() + 1, 0));

				  	break;
				case "year":				
				  	this.set("sdate", new Date(today.getFullYear(), 0, 1));
				  	this.set("edate", new Date(today.getFullYear(), 11, 31));

				  	break;
				default:
					this.set("sdate", "");
				  	this.set("edate", "");									  
			}
		},
		search				: function(){
			var self = this, para = [],
				obj = this.get("obj"),
				start = this.get("sdate"),
        		end = this.get("edate"),
        		displayDate = "";

        	para.push({ field:"type", value:"Sale_Order" });

        	//Customer
            if(obj.contactIds.length>0){
            	var contactIds = [];
            	$.each(obj.contactIds, function(index, value){
            		contactIds.push(value);
            	});          	
	            para.push({ field:"contact_id", operator:"where_in", value:contactIds });
	        }
    	
        	//Dates
        	if(start && end){
        		start = new Date(start);
        		end = new Date(end);
        		displayDate = "From " + kendo.toString(start, "dd-MM-yyyy") + " To " + kendo.toString(end, "dd-MM-yyyy");
        		end.setDate(end.getDate()+1);

            	para.push({ field:"issued_date >=", value: kendo.toString(start, "yyyy-MM-dd") });
            	para.push({ field:"issued_date <", value: kendo.toString(end, "yyyy-MM-dd") });
            }else if(start){
            	start = new Date(start);
            	displayDate = "On " + kendo.toString(start, "dd-MM-yyyy");

            	para.push({ field:"issued_date", value: kendo.toString(start, "yyyy-MM-dd") });
            }else if(end){
            	end = new Date(end);
            	displayDate = "As Of " + kendo.toString(end, "dd-MM-yyyy");
        		end.setDate(end.getDate()+1);
        		
            	para.push({ field:"issued_date <", value: kendo.toString(end, "yyyy-MM-dd") });
            }else{
            	
            }
            this.set("displayDate", displayDate);

            this.dataSource.query({
            	filter:para
            }).then(function(){
            	var view = self.dataSource.view();

            	var amount = 0, orderCount = 0;
            	$.each(view, function(index, value){ 
            		$.each(value.line, function(ind, val){
            			orderCount++; 
	            		amount += val.amount;
	            	});
            	});
            	
            	self.set("orderCount", kendo.toString(orderCount, "n0"));
            	self.set("totalAmount", kendo.toString(amount, "c2", banhji.locale));
            });
            this.dataSource.bind("requestEnd", function(e){				
				if(e.type=="read"){
					var response = e.response, balanceCal = 0, balance= 0;
					self.exArray = [];

					self.exArray.push({
	            		cells: [
	            			{ value: self.company.name, textAlign: "center", colSpan: 5}
	            		]
	            	});
	            	self.exArray.push({
	            		cells: [
	            			{ value: "Sale Order List",bold: true, fontSize: 20, textAlign: "center", colSpan: 5 }
	            		]
	            	});
	            	if(self.displayDate){
		            	self.exArray.push({
		            		cells: [
		            			{ value: self.displayDate, textAlign: "center", colSpan: 5 }
		            		]
		            	});
		            }
	            	self.exArray.push({
	            		cells: [
	            			{ value: "", colSpan: 4 }
	            		]
	            	});
	            	self.exArray.push({ 
	            		cells: [
							{ value: "Number", background: "#496cad", color: "#ffffff" },
							{ value: "Reference", background: "#496cad", color: "#ffffff" },
							{ value: "Date", background: "#496cad", color: "#ffffff" },
							{ value: "Status", background: "#496cad", color: "#ffffff" },
							{ value: "Amount", background: "#496cad", color: "#ffffff" },
						]
					});
					for (var i = 0; i < response.results.length; i++){
						self.exArray.push({
					        cells: [
					          	{ value: response.results[i].name, bold: true, },
					            { value: "" },
					            { value: "" },
					            { value: "" },
					            { value: "" },
					        ]
					        
					    });
					    for(var j = 0; j < response.results[i].line.length; j++){
					    	var status = response.results[i].line[j].status
					    	if (status==0){
					    		status = "Open"
					    	}else{
					    		status = "Used"
					    	}
				          	self.exArray.push({
				          		cells: [
				          	  		{ value: response.results[i].line[j].number },
				              		{ value: response.results[i].line[j].number },
				              		{ value: response.results[i].line[j].issued_date},
				              		{ value: status },
				              		{ value: response.results[i].line[j].amount},
				            	]
				          	});
				        }
				    	self.exArray.push({
					        cells: [
					          	{ value: "", colSpan: 4 }
					        ]
					    });
					}
				}
			});
		},
		printGrid			: function() {
			var gridElement = $('#grid'),
		        printableContent = '',
		        win = window.open('', '', 'width=990, height=900'),
		        doc = win.document.open();
		    var htmlStart =
		            '<!DOCTYPE html>' +
		            '<html>' +
		            '<head>' +
		            '<meta charset="utf-8" />' +
		            '<title></title>' +
		            '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />'+
		            '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
		            '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/responsive.css">' +
		            '<link href="<?php echo base_url(); ?>assets/invoice/invoice.css" rel="stylesheet" />'+
		            '<link href="https://fonts.googleapis.com/css?family=Content:400,700" rel="stylesheet" type="text/css">' +
		            '<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">' +
		            '<style>' +
		            'html { font: 11pt sans-serif; }' +
		            '.k-grid { border-top-width: 0; }' +
		            '.k-grid, .k-grid-content { height: auto !important; }' +
		            '.k-grid-content { overflow: visible !important; }' +
		            'div.k-grid table { table-layout: auto; width: 100% !important; }' +
		            '.k-grid .k-grid-header th { border-top: 1px solid; }' +
		            '.k-grid-toolbar, .k-grid-pager > .k-link { display: none; }' +
		            '</style><style type="text/css" media="print"> @page { size: portrait; margin:1mm; }'+
		            	'.inv1 .main-color {' +
		            		
		            		'-webkit-print-color-adjust:exact; ' +
		            	'} ' +
		            	'.table.table-borderless.table-condensed  tr th { background-color: #1E4E78!important;' +
		            	'-webkit-print-color-adjust:exact; color:#fff!important;}' +
		            	'.table.table-borderless.table-condensed  tr th * { color: #fff!important; -webkit-print-color-adjust:exact;}' +
		            	'.inv1 .light-blue-td { ' +
		            		'background-color: #c6d9f1!important;' +
		            		'text-align: left;' +
		            		'padding-left: 5px;' +
		            		'-webkit-print-color-adjust:exact; ' +
		            	'}' +
		            	'.saleSummaryCustomer .table.table-borderless.table-condensed tr td { ' +
    						'background-color: #F2F2F2!important; -webkit-print-color-adjust:exact;' +
						'}'+
						'.saleSummaryCustomer .table.table-borderless.table-condensed tr:nth-child(2n+1) td { ' +
    						' background-color: #fff!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.journal_block1>.span2 *, .journal_block1>.span5 * {color: #fff!important;}' +
		            	'.journal_block1>.span2:first-child { ' +
    						'background-color: #bbbbbb!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.journal_block1>.span5:last-child {' +
							'background-color: #496cad!important; color: #fff!important; -webkit-print-color-adjust:exact; ' +
						'}' +
						'.journal_block1>.span5 {' +
							'background-color: #5cc7dd!important; color: #fff!important; -webkit-print-color-adjust:exact;' +
						'}' +
		            	'.saleSummaryCustomer .table.table-borderless.table-condensed tfoot .bg-total td {' +
		            		'background-color: #1C2633!important;' +
		            		'color: #fff!important; ' + 
		            		'-webkit-print-color-adjust:exact;' +
		            	'}' +
		            	'</style>' +
		            '</head>' +
		            '<body><div class="saleSummaryCustomer" style="padding: 0 10px;">';
		    var htmlEnd =
		            '</div></body>' +
		            '</html>';
		    
		    printableContent = $('#invFormContent').html();
		    doc.write(htmlStart + printableContent + htmlEnd);
		    doc.close();
		    setTimeout(function(){
		    	win.print();
		    	win.close();
		    },2000);
		},
		ExportExcel 		: function(){
	        var workbook = new kendo.ooxml.Workbook({
	          sheets: [
	            {
	              columns: [
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	              ],
	              title: "Sale Order List",
	              rows: this.exArray
	            }
	          ]
	        });
	        //save the file as Excel file with extension xlsx
	        kendo.saveAs({dataURI: workbook.toDataURL(), fileName: "saleOrderList.xlsx"});
		}
	});
	banhji.saleOrderByJobEngagment =  kendo.observable({
		lang 				: langVM,
		dataSource 			: dataStore(apiUrl + "sales/transaction_by_job_engagement"),
		contactDS  			: banhji.source.customerDS,
		sortList			: banhji.source.sortList,
		sorter 				: "month",
		sdate 				: "",
		edate 				: "",
		obj 				: { contactIds: [] },
		company 			: banhji.institute,
		displayDate 		: "",
		orderCount 			: 0,
		totalAmount 		: 0,
		exArray 			: [],
		pageLoad 			: function(){
			this.search();
		},
		sorterChanges 		: function(){
	        var today = new Date(),
        	sdate = "",
        	edate = "",
        	sorter = this.get("sorter");
        	
			switch(sorter){
				case "today":								
					this.set("sdate", today);
					this.set("edate", "");
													  					
				  	break;
				case "week":			  	
					var first = today.getDate() - today.getDay(),
					last = first + 6;

					this.set("sdate", new Date(today.setDate(first)));
					this.set("edate", new Date(today.setDate(last)));						
					
				  	break;
				case "month":							  	
					this.set("sdate", new Date(today.getFullYear(), today.getMonth(), 1));
					this.set("edate", new Date(today.getFullYear(), today.getMonth() + 1, 0));

				  	break;
				case "year":				
				  	this.set("sdate", new Date(today.getFullYear(), 0, 1));
				  	this.set("edate", new Date(today.getFullYear(), 11, 31));

				  	break;
				default:
					this.set("sdate", "");
				  	this.set("edate", "");									  
			}
		},
		search				: function(){
			var self = this, para = [],
				obj = this.get("obj"),
				start = this.get("sdate"),
        		end = this.get("edate"),
        		displayDate = "";

        	//Customer
            if(obj.contactIds.length>0){
            	var contactIds = [];
            	$.each(obj.contactIds, function(index, value){
            		contactIds.push(value);
            	});          	
	            para.push({ field:"contact_id", operator:"where_in", value:contactIds });
	        }
    	
        	//Dates
        	if(start && end){
        		start = new Date(start);
        		end = new Date(end);
        		displayDate = "From " + kendo.toString(start, "dd-MM-yyyy") + " To " + kendo.toString(end, "dd-MM-yyyy");
        		end.setDate(end.getDate()+1);

            	para.push({ field:"issued_date >=", value: kendo.toString(start, "yyyy-MM-dd") });
            	para.push({ field:"issued_date <", value: kendo.toString(end, "yyyy-MM-dd") });
            }else if(start){
            	start = new Date(start);
            	displayDate = "On " + kendo.toString(start, "dd-MM-yyyy");

            	para.push({ field:"issued_date", value: kendo.toString(start, "yyyy-MM-dd") });
            }else if(end){
            	end = new Date(end);
            	displayDate = "As Of " + kendo.toString(end, "dd-MM-yyyy");
        		end.setDate(end.getDate()+1);
        		
            	para.push({ field:"issued_date <", value: kendo.toString(end, "yyyy-MM-dd") });
            }else{
            	
            }
            this.set("displayDate", displayDate);

            para.push({ field:"type", value:"Sale_Order" });
            para.push({ field:"employee_id", value: banhji.source.get("employee").id });

            this.dataSource.query({
            	filter:para
            }).then(function(){
            	var view = self.dataSource.view();

            	var amount = 0;
            	$.each(view, function(index, value){ 
            		$.each(value.line, function(ind, val){
	            		amount += val.amount;
	            	});
            	});

            	self.set("total", kendo.toString(amount, "c2", banhji.locale));
            });
            this.dataSource.bind("requestEnd", function(e){				
				if(e.type=="read"){
					var response = e.response, balanceCal = 0, balance= 0;
					self.exArray = [];

					self.exArray.push({
	            		cells: [
	            			{ value: self.company.name, textAlign: "center", colSpan: 5}
	            		]
	            	});
	            	self.exArray.push({
	            		cells: [
	            			{ value: "Sale Order List",bold: true, fontSize: 20, textAlign: "center", colSpan: 5 }
	            		]
	            	});
	            	if(self.displayDate){
		            	self.exArray.push({
		            		cells: [
		            			{ value: self.displayDate, textAlign: "center", colSpan: 5 }
		            		]
		            	});
		            }
	            	self.exArray.push({
	            		cells: [
	            			{ value: "", colSpan: 4 }
	            		]
	            	});
	            	self.exArray.push({ 
	            		cells: [
							{ value: "Number", background: "#496cad", color: "#ffffff" },
							{ value: "Reference", background: "#496cad", color: "#ffffff" },
							{ value: "Date", background: "#496cad", color: "#ffffff" },
							{ value: "Status", background: "#496cad", color: "#ffffff" },
							{ value: "Amount", background: "#496cad", color: "#ffffff" },
						]
					});
					for (var i = 0; i < response.results.length; i++){
						self.exArray.push({
					        cells: [
					          	{ value: response.results[i].name, bold: true, },
					            { value: "" },
					            { value: "" },
					            { value: "" },
					            { value: "" },
					        ]
					        
					    });
					    for(var j = 0; j < response.results[i].line.length; j++){
					    	var status = response.results[i].line[j].status
					    	if (status==0){
					    		status = "Open"
					    	}else{
					    		status = "Used"
					    	}
				          	self.exArray.push({
				          		cells: [
				          	  		{ value: response.results[i].line[j].number },
				              		{ value: response.results[i].line[j].number },
				              		{ value: response.results[i].line[j].issued_date},
				              		{ value: status },
				              		{ value: response.results[i].line[j].amount},
				            	]
				          	});
				        }
				    	self.exArray.push({
					        cells: [
					          	{ value: "", colSpan: 4 }
					        ]
					    });
					}
				}
			});
		},
		printGrid			: function() {
			var gridElement = $('#grid'),
		        printableContent = '',
		        win = window.open('', '', 'width=990, height=900'),
		        doc = win.document.open();
		    var htmlStart =
		            '<!DOCTYPE html>' +
		            '<html>' +
		            '<head>' +
		            '<meta charset="utf-8" />' +
		            '<title></title>' +
		            '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />'+
		            '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
		            '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/responsive.css">' +
		            '<link href="<?php echo base_url(); ?>assets/invoice/invoice.css" rel="stylesheet" />'+
		            '<link href="https://fonts.googleapis.com/css?family=Content:400,700" rel="stylesheet" type="text/css">' +
		            '<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">' +
		            '<style>' +
		            'html { font: 11pt sans-serif; }' +
		            '.k-grid { border-top-width: 0; }' +
		            '.k-grid, .k-grid-content { height: auto !important; }' +
		            '.k-grid-content { overflow: visible !important; }' +
		            'div.k-grid table { table-layout: auto; width: 100% !important; }' +
		            '.k-grid .k-grid-header th { border-top: 1px solid; }' +
		            '.k-grid-toolbar, .k-grid-pager > .k-link { display: none; }' +
		            '</style><style type="text/css" media="print"> @page { size: portrait; margin:1mm; }'+
		            	'.inv1 .main-color {' +
		            		
		            		'-webkit-print-color-adjust:exact; ' +
		            	'} ' +
		            	'.table.table-borderless.table-condensed  tr th { background-color: #1E4E78!important;' +
		            	'-webkit-print-color-adjust:exact; color:#fff!important;}' +
		            	'.table.table-borderless.table-condensed  tr th * { color: #fff!important; -webkit-print-color-adjust:exact;}' +
		            	'.inv1 .light-blue-td { ' +
		            		'background-color: #c6d9f1!important;' +
		            		'text-align: left;' +
		            		'padding-left: 5px;' +
		            		'-webkit-print-color-adjust:exact; ' +
		            	'}' +
		            	'.saleSummaryCustomer .table.table-borderless.table-condensed tr td { ' +
    						'background-color: #F2F2F2!important; -webkit-print-color-adjust:exact;' +
						'}'+
						'.saleSummaryCustomer .table.table-borderless.table-condensed tr:nth-child(2n+1) td { ' +
    						' background-color: #fff!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.journal_block1>.span2 *, .journal_block1>.span5 * {color: #fff!important;}' +
		            	'.journal_block1>.span2:first-child { ' +
    						'background-color: #bbbbbb!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.journal_block1>.span5:last-child {' +
							'background-color: #496cad!important; color: #fff!important; -webkit-print-color-adjust:exact; ' +
						'}' +
						'.journal_block1>.span5 {' +
							'background-color: #5cc7dd!important; color: #fff!important; -webkit-print-color-adjust:exact;' +
						'}' +
		            	'.saleSummaryCustomer .table.table-borderless.table-condensed tfoot .bg-total td {' +
		            		'background-color: #1C2633!important;' +
		            		'color: #fff!important; ' + 
		            		'-webkit-print-color-adjust:exact;' +
		            	'}' +
		            	'</style>' +
		            '</head>' +
		            '<body><div class="saleSummaryCustomer" style="padding: 0 10px;">';
		    var htmlEnd =
		            '</div></body>' +
		            '</html>';
		    
		    printableContent = $('#invFormContent').html();
		    doc.write(htmlStart + printableContent + htmlEnd);
		    doc.close();
		    setTimeout(function(){
		    	win.print();
		    	win.close();
		    },2000);
		},
		ExportExcel 		: function(){
	        var workbook = new kendo.ooxml.Workbook({
	          sheets: [
	            {
	              columns: [
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	                { autoWidth: true },
	              ],
	              title: "Sale Order List",
	              rows: this.exArray
	            }
	          ]
	        });
	        //save the file as Excel file with extension xlsx
	        kendo.saveAs({dataURI: workbook.toDataURL(), fileName: "saleOrderList.xlsx"});
		}
	});
	

    /*************************************************
	*   VIEW & LAYOUT	  				 		 	 *
	*************************************************/
	banhji.view = {
		layout 		: new kendo.Layout('#layout', {model: banhji.Layout}),
		blank		: new kendo.View('<div></div>'),
		index  		: new kendo.Layout("#index", {model: banhji.index}),
		menu 		: new kendo.Layout('#menu-tmpl', {model: banhji.userManagement}),
		searchAdvanced: new kendo.Layout("#searchAdvanced", {model: banhji.searchAdvanced}),

		saleCenter: new kendo.Layout("#saleCenter", {model: banhji.saleCenter}),
		customer: new kendo.Layout("#customer", {model: banhji.customer}),
		quote: new kendo.Layout("#quote", {model: banhji.quote}),
		saleOrder: new kendo.Layout("#saleOrder", {model: banhji.saleOrder}),
		customerDeposit: new kendo.Layout("#customerDeposit", {model: banhji.customerDeposit}),
		cashSale: new kendo.Layout("#cashSale", {model: banhji.cashSale}),
		sale: new kendo.Layout("#sale", {model: banhji.sale}),
		saleReportCenter: new kendo.Layout("#saleReportCenter", {model: banhji.saleReportCenter}),
		saleRecurring : new kendo.Layout("#saleRecurring", {model: banhji.saleRecurring}),
		saleInventoryPositionSummary: new kendo.Layout("#saleInventoryPositionSummary", {model: banhji.inventoryPositionSummary}),
		quotationList : new kendo.Layout("#quotationList", {model: banhji.quotationList}),
		saleOrderList : new kendo.Layout("#saleOrderList", {model: banhji.saleOrderList}),
		saleOrderByJobEngagment : new kendo.Layout("#saleOrderByJobEngagment", {model: banhji.saleOrderByJobEngagment}),

		//Menu
		saleMenu: new kendo.View("#saleMenu", {model: langVM})
	};
	banhji.router = new kendo.Router({
		init: function() {	
			var language = JSON.parse(localStorage.getItem('userData/lang'));	
			switch(language) {
				case "KH": 
					langVM.set('lang', km_KH);
					localforage.setItem("lang", language);
					langVM.set('localeCode', language);
					break;
				case "EN":
					langVM.set('lang', en_US);
					localforage.setItem("lang", language);
					langVM.set('localeCode', language);
					break;
				default: 
					langVM.set('lang', en_US);
					localforage.setItem("lang", language);
					langVM.set('localeCode', language);
			}
			localforage.getItem('user', function(err, data){
				if (err) {
					
				} else {
					$('#current-section').html('|&nbsp;Company');
					$('#home-menu').addClass('active');
					banhji.view.layout.render("#wrapperApplication");
					banhji.index.set('companyName', data.institute.name);
					banhji.index.set('companyLogo', data.institute.logo);
					var blank = new kendo.View('#blank-tmpl');
					banhji.view.layout.showIn('#menu', banhji.view.menu);
					if(userPool.getCurrentUser() == null) {
						window.location.replace(baseUrl + "login");
					}
					banhji.aws.getImage();
				}
			});
		},
		routeMissing: function(e) {
			// banhji.view.layout.showIn("#layout-view", banhji.view.missing);
			console.log("no resource found.")
		}
	});

	/* Index Page */
	banhji.router.route('/', function(){
		var blank = new kendo.View('#blank-tmpl');
		var admin = JSON.parse(localStorage.getItem('userData/user')) != null ? JSON.parse(localStorage.getItem('userData/user')).role : 0;
        // if(admin != 1) {
        // 	window.location.replace("<?php echo base_url(); ?>admin");
        // } else {
        	banhji.view.layout.showIn('#content', banhji.view.index);
			banhji.view.layout.showIn('#menu', banhji.view.menu);
			$('#main-top-navigation').append('<li><a href="\#">Home</a></li>');
			$('#current-section').text("");
			$("#secondary-menu").html("");
			banhji.index.getLogo();
			banhji.index.pageLoad();
			banhji.pageLoaded["index"] = true;
        // }
	});
	banhji.router.route("/search_advanced", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			var vm = banhji.searchAdvanced;
			banhji.view.layout.showIn("#content", banhji.view.searchAdvanced);
			
			if(banhji.pageLoaded["search_advanced"]==undefined){
				banhji.pageLoaded["search_advanced"] = true;
			}

			vm.pageLoad();
		}
	});

	
	/*************************************************
	*   SALE ROUTER  						 		 *
	*************************************************/
	banhji.router.route("/sale_center", function(){
		// banhji.accessMod.query({
		// 	filter: {field: 'username', value: JSON.parse(localStorage.getItem('userData/user')).username}
		// }).then(function(e){
		// 	var allowed = false;
		// 	if(banhji.accessMod.data().length > 0) {
		// 		for(var i = 0; i < banhji.accessMod.data().length; i++) {
		// 			if("Sales" == banhji.accessMod.data()[i].name.toLowerCase()) {
		// 				allowed = true;
		// 				break;
		// 			}
		// 		}
		// 	} 
		// 	if(allowed) {
				banhji.view.layout.showIn("#content", banhji.view.saleCenter);
				banhji.view.layout.showIn('#menu', banhji.view.menu);
				banhji.view.menu.showIn('#secondary-menu', banhji.view.saleMenu);

				var vm = banhji.saleCenter;
				if(banhji.pageLoaded["sale_center"]==undefined){
					banhji.pageLoaded["sale_center"] = true;
				}
				vm.pageLoad();
		// 	} else {
		// 		window.location.replace(baseUrl + "admin");
		// 	}
		// });
	});
	banhji.router.route("/customer(/:id)(/:is_pattern)", function(id,is_pattern){
		banhji.accessMod.query({
			filter: {field: 'username', value: JSON.parse(localStorage.getItem('userData/user')).username}
		}).then(function(e){
			var allowed = false;
			if(banhji.accessMod.data().length > 0) {
				for(var i = 0; i < banhji.accessMod.data().length; i++) {
					if("customer" == banhji.accessMod.data()[i].name.toLowerCase()) {
						allowed = true;
						break;
					}
				}
			} 
			if(allowed) {
				banhji.view.layout.showIn("#content", banhji.view.customer);
				kendo.fx($("#slide-form")).slideIn("down").play();

				var vm = banhji.customer;
				banhji.userManagement.addMultiTask("Customer","customer",vm);
				if(banhji.pageLoaded["customer"]==undefined){
					banhji.pageLoaded["customer"] = true;

			        var validator = $("#example").kendoValidator({
			        	rules: {
					        customRule1: function(input){
					          	if (input.is("[name=txtNumber]")) {	
						            return vm.get("notDuplicateNumber");
						        }
						        return true;
					        }
					    },
					    messages: {
					        customRule1: banhji.source.duplicateNumber
					    }
			        }).data("kendoValidator");

			        $("#saveNew").click(function(e){
						e.preventDefault();

						if(validator.validate()){
			            	vm.save();
				        }else{
				        	$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
				        }
					});

					$("#saveClose").click(function(e){
						e.preventDefault();

						if(validator.validate()){
							vm.set("saveClose", true);
			            	vm.save();
				        }else{
				        	$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
				        }
					});
				}

				vm.pageLoad(id, is_pattern);
			} else {
				window.location.replace(baseUrl + "admin");
			}
		});
	});
	banhji.router.route("/quote(/:id)", function(id){
		banhji.accessPage.query({
			filter:[
				{ field:"name", value:"quote" },
				{ field:'username', operator:"where_related_user", value: JSON.parse(localStorage.getItem('userData/user')).username }
			]
		}).then(function(e){
			if(banhji.accessPage.data().length > 0) {

				banhji.view.layout.showIn("#content", banhji.view.quote);
				kendo.fx($("#slide-form")).slideIn("down").play();

				var vm = banhji.quote;
				banhji.userManagement.addMultiTask("Quotation","quote",vm);

				if(banhji.pageLoaded["quote"]==undefined){
					banhji.pageLoaded["quote"] = true;

					vm.lineDS.bind("change", vm.lineDSChanges);

					var validator = $("#example").kendoValidator({
			        	rules: {
					        customRule1: function(input) {
					          	if (input.is("[name=txtRecurringName]") && vm.recurring_validate) {
					          		vm.set("recurring_validate", false);
					            	return $.trim(input.val()) !== "";
					          	}
					          	return true;
					        },
					        customRule2: function(input){
					          	if (input.is("[name=txtNumber]")) {	
						            return vm.get("notDuplicateNumber");
						        }
						        return true;
					        }
					    },
					    messages: {
					        customRule1: banhji.source.requiredMessage,
					        customRule2: banhji.source.duplicateNumber
					    }
			        }).data("kendoValidator");

			        $("#saveDraft1").click(function(e){
						e.preventDefault();

						if(validator.validate() && vm.validating()){
							vm.set("saveDraft", true);
			            	vm.save();
				        }else{
				        	$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
				        }
					});
			        
			        $("#saveNew").click(function(e){
						e.preventDefault();

						if(validator.validate() && vm.validating()){
			            	vm.save();
				        }else{
				        	$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
				        }
					});

					$("#saveClose").click(function(e){
						e.preventDefault();

						if(validator.validate() && vm.validating()){
							vm.set("saveClose", true);
			            	vm.save();
				        }else{
				        	$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
				        }
					});

					$("#savePrint").click(function(e){
						e.preventDefault();
						
						if(validator.validate() && vm.validating()){
							vm.set("savePrint", true);
			            	vm.save();
				        }else{
				        	$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
				        }
					});

					$("#saveRecurring").click(function(e){
						e.preventDefault();

						vm.set("recurring_validate", true);

						if(validator.validate() && vm.validating()){
							vm.set("saveRecurring", true);			            	
			            	vm.save();
				        }else{
				        	$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
				        }
					});
				}

				vm.pageLoad(id);

			} else {
				window.location.replace(baseUrl + "admin");
			}
		});
	});
	banhji.router.route("/sale_order(/:id)", function(id){
		banhji.accessPage.query({
			filter:[
				{ field:"name", value:"sale_order" },
				{ field:'username', operator:"where_related_user", value: JSON.parse(localStorage.getItem('userData/user')).username }
			]
		}).then(function(e){
			if(banhji.accessPage.data().length > 0) {
				banhji.view.layout.showIn("#content", banhji.view.saleOrder);
				kendo.fx($("#slide-form")).slideIn("down").play();

				var vm = banhji.saleOrder;
				banhji.userManagement.addMultiTask("Sale Order","sale_order",vm);

				if(banhji.pageLoaded["sale_order"]==undefined){
					banhji.pageLoaded["sale_order"] = true;

					vm.lineDS.bind("change", vm.lineDSChanges);

					var validator = $("#example").kendoValidator({
			        	rules: {
					        customRule1: function(input) {
					          	if (input.is("[name=txtRecurringName]") && vm.recurring_validate) {
					          		vm.set("recurring_validate", false);
					            	return $.trim(input.val()) !== "";
					          	}
					          	return true;
					        },
					        customRule2: function(input){
					          	if (input.is("[name=txtNumber]")) {	
						            return vm.get("notDuplicateNumber");
						        }
						        return true;
					        }
					    },
					    messages: {
					        customRule1: banhji.source.requiredMessage,
					        customRule2: banhji.source.duplicateNumber
					    }
			        }).data("kendoValidator");

			        $("#saveDraft1").click(function(e){
						e.preventDefault();

						if(validator.validate() && vm.validating()){
							vm.set("saveDraft", true);
			            	vm.save();
				        }else{
				        	$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
				        }
					});

			        $("#saveNew").click(function(e){
						e.preventDefault();

						if(validator.validate() && vm.validating()){
			            	vm.save();
				        }else{
				        	$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
				        }
					});

					$("#saveClose").click(function(e){
						e.preventDefault();

						if(validator.validate() && vm.validating()){
							vm.set("saveClose", true);
			            	vm.save();
				        }else{
				        	$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
				        }
					});

					$("#savePrint").click(function(e){
						e.preventDefault();
						
						if(validator.validate() && vm.validating()){
							vm.set("savePrint", true);
			            	vm.save();
				        }else{
				        	$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
				        }
					});

					$("#saveRecurring").click(function(e){
						e.preventDefault();

						vm.set("recurring_validate", true);

						if(validator.validate() && vm.validating()){
			            	vm.set("saveRecurring", true);
			            	vm.save();
				        }else{
				        	$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
				        }
					});
				}

				vm.pageLoad(id);
			} else {
				window.location.replace(baseUrl + "admin");
			}
	});
	banhji.router.route("/customer_deposit(/:id)", function(id){
		banhji.accessPage.query({
			filter:[
				{ field:"name", value:"deposit" },
				{ field:'username', operator:"where_related_user", value: JSON.parse(localStorage.getItem('userData/user')).username }
			]
		}).then(function(e){
			if(banhji.accessPage.data().length > 0) {
				banhji.view.layout.showIn("#content", banhji.view.customerDeposit);
				kendo.fx($("#slide-form")).slideIn("down").play();

				var vm = banhji.customerDeposit;
				banhji.userManagement.addMultiTask("Customer Deposit","customer_deposit",vm);

				if(banhji.pageLoaded["customer_deposit"]==undefined){
					banhji.pageLoaded["customer_deposit"] = true;

			        var validator = $("#example").kendoValidator({
			        	rules: {
					        customRule1: function(input) {
					          	if (input.is("[name=txtRecurringName]") && vm.recurring_validate) {
					          		vm.set("recurring_validate", false);
					            	return $.trim(input.val()) !== "";
					          	}
					          	return true;
					        },
					        customRule2: function(input){
					          	if (input.is("[name=txtNumber]")) {	
						            return vm.get("notDuplicateNumber");
						        }
						        return true;
					        }
					    },
					    messages: {
					        customRule1: banhji.source.requiredMessage,
					        customRule2: banhji.source.duplicateNumber
					    }
			        }).data("kendoValidator");

			        $("#saveNew").click(function(e){
						e.preventDefault();

						if(validator.validate() && vm.validating()){
			            	vm.save();
				        }else{
				        	$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
				        }
					});

					$("#saveClose").click(function(e){
						e.preventDefault();

						if(validator.validate() && vm.validating()){
							vm.set("saveClose", true);
			            	vm.save();
				        }else{
				        	$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
				        }
					});

					$("#savePrint").click(function(e){
						e.preventDefault();
						
						if(validator.validate() && vm.validating()){
							vm.set("savePrint", true);
			            	vm.save();
				        }else{
				        	$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
				        }
					});

					$("#saveRecurring").click(function(e){
						e.preventDefault();

						vm.set("recurring_validate", true);

						if(validator.validate() && vm.validating()){
			            	vm.set("saveRecurring", true);
			            	vm.save();
				        }else{
				        	$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
				        }
					});
				}

				vm.pageLoad(id);
		} else {
				window.location.replace(baseUrl + "admin");
		}
	});
	banhji.router.route("/cash_sale(/:id)", function(id){
		banhji.accessPage.query({
			filter:[
				{ field:"name", value:"cash_sale" },
				{ field:'username', operator:"where_related_user", value: JSON.parse(localStorage.getItem('userData/user')).username }
			]
		}).then(function(e){
			if(banhji.accessPage.data().length > 0) {
				banhji.view.layout.showIn("#content", banhji.view.cashSale);
				kendo.fx($("#slide-form")).slideIn("down").play();

				var vm = banhji.cashSale;
				banhji.userManagement.addMultiTask("Cash Sale","cash_sale",vm);

				if(banhji.pageLoaded["cash_sale"]==undefined){
					banhji.pageLoaded["cash_sale"] = true;

					vm.lineDS.bind("change", vm.lineDSChanges);

					var validator = $("#example").kendoValidator({
			        	rules: {
					        customRule1: function(input) {
					          	if (input.is("[name=txtRecurringName]") && vm.recurring_validate) {
					          		vm.set("recurring_validate", false);
					            	return $.trim(input.val()) !== "";
					          	}
					          	return true;
					        },
					        customRule2: function(input){
					          	if (input.is("[name=txtNumber]")) {	
						            return vm.get("notDuplicateNumber");
						        }
						        return true;
					        }
					    },
					    messages: {
					        customRule1: banhji.source.requiredMessage,
					        customRule2: banhji.source.duplicateNumber
					    }
			        }).data("kendoValidator");

			        $("#saveDraft1").click(function(e){
						e.preventDefault();

						if(validator.validate() && vm.validating()){
							vm.set("saveDraft", true);
			            	vm.save();
				        }else{
				        	$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
				        }
					});

			        $("#saveNew").click(function(e){
						e.preventDefault();

						if(validator.validate() && vm.validating()){
			            	vm.save();
				        }else{
				        	$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
				        }
					});

					$("#saveClose").click(function(e){
						e.preventDefault();

						if(validator.validate() && vm.validating()){
							vm.set("saveClose", true);
			            	vm.save();
				        }else{
				        	$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
				        }
					});

					$("#savePrint").click(function(e){
						e.preventDefault();
						
						if(validator.validate() && vm.validating()){
							vm.set("savePrint", true);
			            	vm.save();
				        }else{
				        	$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
				        }
					});

					$("#saveRecurring").click(function(e){
						e.preventDefault();

						vm.set("recurring_validate", true);

						if(validator.validate() && vm.validating()){
			            	vm.set("saveRecurring", true);
			            	vm.save();
				        }else{
				        	$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
				        }
					});
				}

				vm.pageLoad(id);

			} else {
				window.location.replace(baseUrl + "admin");
			}
		});
	});
	banhji.router.route("/sale", function(){
		banhji.view.layout.showIn("#content", banhji.view.sale);
		banhji.view.layout.showIn('#menu', banhji.view.menu);
		banhji.view.menu.showIn('#secondary-menu', banhji.view.saleMenu);
		
		var vm = banhji.sale;
		banhji.userManagement.addMultiTask("Sale","sale",null);
		if(banhji.pageLoaded["sale"]==undefined){
			banhji.pageLoaded["sale"] = true;
		}
		vm.pageLoad();
	});
	banhji.router.route("/sale_recurring", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			banhji.view.layout.showIn("#content", banhji.view.saleRecurring);
			banhji.view.layout.showIn('#menu', banhji.view.menu);
			banhji.view.menu.showIn('#secondary-menu', banhji.view.saleMenu);

			var vm = banhji.saleRecurring;
			banhji.userManagement.addMultiTask("Sale Recurring","sale_recurring",null);
			if(banhji.pageLoaded["sale_recurring"]==undefined){
				banhji.pageLoaded["sale_recurring"] = true;

			}

			vm.pageLoad();
		}
	});
	// SALE REPORTS
	banhji.router.route("/sale_report_center", function(){
		banhji.accessMod.query({
			filter: {field: 'username', value: JSON.parse(localStorage.getItem('userData/user')).username}
		}).then(function(e){
			var allowed = false;
			if(banhji.accessMod.data().length > 0) {
				for(var i = 0; i < banhji.accessMod.data().length; i++) {
					if("customer" == banhji.accessMod.data()[i].name.toLowerCase()) {
						allowed = true;
						break;
					}
				}
			} 
			if(allowed) {
				banhji.view.layout.showIn("#content", banhji.view.saleReportCenter);
				banhji.view.layout.showIn('#menu', banhji.view.menu);
				banhji.view.menu.showIn('#secondary-menu', banhji.view.saleMenu);
				
				var vm = banhji.saleReportCenter;
				banhji.userManagement.addMultiTask("Sale Report Center","sale_report_center",null);
				if(banhji.pageLoaded["sale_report_center"]==undefined){
					banhji.pageLoaded["sale_report_center"] = true;
				}
			} else {
				window.location.replace(baseUrl + "admin");
			}
		});
	});
	banhji.router.route("/quotation_list", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			banhji.view.layout.showIn("#content", banhji.view.quotationList);

			var vm = banhji.quotationList;
			banhji.userManagement.addMultiTask("List of Quotation","quotation_list",null);
			
			if(banhji.pageLoaded["quotation_list"]==undefined){
				banhji.pageLoaded["quotation_list"] = true;
				vm.sorterChanges();
			}
			vm.pageLoad();
		}
	});
	banhji.router.route("/sale_order_list", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			banhji.view.layout.showIn("#content", banhji.view.saleOrderList);

			var vm = banhji.saleOrderList;
			banhji.userManagement.addMultiTask("List of Sale Order","sale_order_list",null);
			
			if(banhji.pageLoaded["sale_order_list"]==undefined){
				banhji.pageLoaded["sale_order_list"] = true;
				vm.sorterChanges();
			}
			vm.pageLoad();
		}
	});
	banhji.router.route("/sale_order_by_job_engagement", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			banhji.view.layout.showIn("#content", banhji.view.saleOrderByJobEngagment);

			var vm = banhji.saleOrderByJobEngagment;
			banhji.userManagement.addMultiTask("Sale Order By Job Engagement","sale_order_by_job_engagement",null);

			if(banhji.pageLoaded["sale_order_by_job_engagement"]==undefined){
				banhji.pageLoaded["sale_order_by_job_engagement"] = true;
				vm.sorterChanges();
			}
			vm.pageLoad();			
		}
	});


	$(function() {
		banhji.router.start();
		banhji.source.pageLoad();
		console.log($(location).attr('hash').substr(1));

		var cognitoUser = userPool.getCurrentUser();
		cognitoUser.getSession(function(err, session) {
          	if(session) {
            	// window.location.replace(baseUrl + "rrd/");
          	} else {
            	window.location.replace(baseUrl + "login/");
          	}
        });

		function createCookie(name,value,days) {
		    if (days) {
		        var date = new Date();
		        date.setTime(date.getTime()+(days*24*60*60*1000000000000000));
		        var expires = "; expires="+date.toGMTString();
		    }
		    else var expires = "";
		    document.cookie = name+"="+value+expires+"; path=/";
		}
		function readCookie(name) {
		    var nameEQ = name + "=";
		    var ca = document.cookie.split(';');
		    for(var i=0;i < ca.length;i++) {
		        var c = ca[i];
		        while (c.charAt(0)==' ') c = c.substring(1,c.length);
		        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
		    }
		    return null;
		}
		function eraseCookie(name) {
		    createCookie(name,"");
		}
	});
</script>